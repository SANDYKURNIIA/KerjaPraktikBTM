<<<<<<< HEAD
<?php

class M_Jurnal_keuangan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    ///////Tampil laporan jurnal//////////////////////////////

    public function SelectLaporanRajal_pasien($first_date, $second_date) ////pasien tunai
    {
        if ($first_date != '' && $second_date != '') {
            return $this->db->query("SELECT * FROM(SELECT l.nama_panjang jenis_pelayanan ,'PENDAPATAN' as keterangan, c.nama cara_bayar, sum(a.total_akun) total_akun, p.tgl_keluar,p.id_pasien no_rm,p.id_pelayanan,ps.nama pasien
                FROM akun_tindakan a, pelayanan p, cara_bayar c,pasien ps,list_poli l
                WHERE ps.no_rm = p.id_pasien and a.id_pelayanan=p.id_pelayanan and a.id_poli = l.id_list_poli  and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar  
                and c.jenis='UMUM' and (DATE(p.tgl_keluar) BETWEEN '$first_date' and '$second_date') and a.status = 0 
                and p.id_pelayanan not in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
                -- and p.id_pelayanan not in  (select id_pelayanan from pendapatan_kasir where status = 0) 
                group by id_pelayanan
                having total_akun !=0
                ) as rajal_tunai
                
                UNION ALL

                SELECT * FROM ( SELECT g.poli jenis_pelayanan, CONCAT('DEPOSITE ', g.keterangan) keterangan, b.nama_bank as cara_bayar,(g.total) total_akun,g.tgl_input tgl_keluar,g.no_rm,g.id_pelayanan,g.pasien  from (
                    SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, l.nama_panjang poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
                    FROM pelayanan p, history_pelayanan h, pasien ps, list_poli l, staff s,pendapatan_kasir d
                    WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and h.nama_poli=l.id_list_poli and d.id_pelayanan=p.id_pelayanan 
                    and (DATE(d.tgl_verifikasi) BETWEEN '$first_date' and '$second_date')  and p.status=1 and h.status=1  
                    and p.cara_bayar = '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status = 1)
                    and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ugd where status = 1) and d.total_bayar != 0 and d.status=1 and d.no_jurnal_deposite is null
                    and (p.tgl_keluar is null or date(d.tgl_verifikasi) != date(p.tgl_keluar))
                    
                    UNION ALL
                    SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, 'UGD' poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
                    FROM pelayanan p, history_pelayanan_ugd h, pasien ps, staff s,pendapatan_kasir d
                    WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
                    and (DATE(d.tgl_verifikasi) BETWEEN '$first_date' and '$second_date')  and p.status=1 and h.status=1 
                    and p.cara_bayar = '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) and d.total_bayar != 0 and d.status=1 and d.no_jurnal_deposite is null
                    and (p.tgl_keluar is null or date(d.tgl_verifikasi) != date(p.tgl_keluar))
                    
                    ORDER by pasien asc
                ) as g
                    left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
                    as b on g.id_pendapatan = b.id_pendapatan
                    group by g.id_pendapatan
                    -- group by g.id_pelayanan
                ) as deposite_rajal
                
                UNION ALL

                SELECT * FROM ( SELECT g.poli jenis_pelayanan, CONCAT('SELISIH ', g.keterangan) keterangan ,b.nama_bank as cara_bayar,(g.total) total_akun,g.tgl_input tgl_keluar,g.no_rm,g.id_pelayanan,g.pasien  from (
                    SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, l.nama_panjang poli, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
                    FROM pelayanan p, history_pelayanan h, pasien ps, list_poli l, staff s,pendapatan_kasir d
                    WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and h.nama_poli=l.id_list_poli and d.id_pelayanan=p.id_pelayanan 
                    and (DATE(d.tgl_verifikasi) BETWEEN '$first_date' and '$second_date')  and p.status=1 and h.status=1 
                    and p.cara_bayar != '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status = 1)
                    and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ugd where status = 1) and d.selisih != 0 and d.status=1 and d.status_jurnal =0
                    and d.tipe ='SELISIH'
                    -- and p.status_rawat != 'selesai'
                    UNION ALL
                    SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, 'UGD' poli, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
                    FROM pelayanan p, history_pelayanan_ugd h, pasien ps, staff s,pendapatan_kasir d
                    WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
                    and (DATE(d.tgl_verifikasi) BETWEEN '$first_date' and '$second_date')  and p.status=1 and h.status=1 
                    and p.cara_bayar != '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap ) and d.selisih != 0 and d.status=1 and d.status_jurnal =0
                    and d.tipe ='SELISIH'
                    -- and p.status_rawat != 'selesai'
                    
                    ORDER by pasien asc
                ) as g
                    left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
                    as b on g.id_pendapatan = b.id_pendapatan
                    group by g.id_pendapatan
                    -- group by g.id_pelayanan
                ) as deposite_rajal_selisih

                UNION ALL

                SELECT jenis_pelayanan ,'PENDAPATAN' as keterangan, 'BAYAR SENDIRI/UMUM' as cara_bayar, total_akun, tgl_keluar,'' as no_rm,'' as id_pelayanan,pasien FROM(
                    SELECT a.id_poli jenis_pelayanan,sum(a.total_akun) total_akun, d.tgl_verifikasi tgl_keluar,a.nama_pasien pasien
                    FROM akun_non_pelayanan a, pendapatan_kasir d
                    WHERE a.id_pelayanan = d.id_pelayanan and d.keterangan != 'asuransi'
                    and (DATE(d.tgl_verifikasi) BETWEEN '$first_date' and '$second_date') and a.status = 0 and d.status =1 and a.kode_akun !='704.02.421'
                    group by a.id_poli, a.id_pelayanan
                ) as non_pelayanan

                

                order by date(tgl_keluar),pasien asc
                ")->result();
        } else {
            $tgl = date("Y-m-d");
            return $this->db->query(" SELECT * FROM(SELECT l.nama_panjang jenis_pelayanan ,'PENDAPATAN' as keterangan,c.nama cara_bayar, sum(a.total_akun) total_akun, p.tgl_keluar,p.id_pasien no_rm,p.id_pelayanan,ps.nama pasien
                FROM akun_tindakan a, pelayanan p, cara_bayar c,pasien ps, list_poli l
                WHERE ps.no_rm = p.id_pasien and a.id_pelayanan=p.id_pelayanan and a.id_poli = l.id_list_poli  and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar  and c.jenis='UMUM' 
                and p.tgl_keluar like '%$tgl%' and a.status = 0 and p.id_pelayanan not in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
                group by id_pelayanan
                having total_akun !=0
                ) as rajal_tunai

                UNION ALL

                SELECT * FROM ( SELECT g.poli jenis_pelayanan, CONCAT('DEPOSITE ', g.keterangan) keterangan,b.nama_bank as cara_bayar,(g.total) total_akun,g.tgl_input tgl_keluar,g.no_rm,g.id_pelayanan,g.pasien  from (
                    
                    SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, l.nama_panjang poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
                    FROM pelayanan p, history_pelayanan h, pasien ps, list_poli l, staff s,pendapatan_kasir d
                    WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and h.nama_poli=l.id_list_poli and d.id_pelayanan=p.id_pelayanan 
                    and d.tgl_verifikasi like '%$tgl%'  and p.status=1 and h.status=1 
                    and p.cara_bayar = '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status = 1)
                    and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ugd where status = 1) and d.total_bayar != 0 and d.status=1 and d.status_jurnal =0
                    and p.status_rawat != 'selesai'

                    UNION ALL
                    SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, 'UGD' poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
                    FROM pelayanan p, history_pelayanan_ugd h, pasien ps, staff s,pendapatan_kasir d
                    WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
                    and d.tgl_verifikasi like '%$tgl%'  and p.status=1 and h.status=1 
                    and p.cara_bayar = '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap ) and d.total_bayar != 0 and d.status=1 and d.status_jurnal =0
                    and p.status_rawat != 'selesai'
                ) as g
                    left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
                    as b on g.id_pendapatan = b.id_pendapatan
                    group by g.id_pendapatan

                    -- group by g.id_pelayanan
                ) as deposite_rajal

                UNION ALL

            SELECT * FROM ( SELECT g.poli jenis_pelayanan, CONCAT('SELISIH ', g.keterangan) keterangan,b.nama_bank as cara_bayar,(g.total) total_akun,g.tgl_input tgl_keluar,g.no_rm,g.id_pelayanan,g.pasien  from (
                SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, l.nama_panjang poli, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
                FROM pelayanan p, history_pelayanan h, pasien ps, list_poli l, staff s,pendapatan_kasir d
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and h.nama_poli=l.id_list_poli and d.id_pelayanan=p.id_pelayanan 
                and (DATE(d.tgl_verifikasi) = '$tgl')  and p.status=1 and h.status=1 
                and p.cara_bayar != '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status = 1)
                and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ugd where status = 1) and d.selisih != 0 and d.status=1 and d.status_jurnal =0
                and d.tipe ='SELISIH'
                -- and p.status_rawat != 'selesai'
                UNION ALL
                SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, 'UGD' poli, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
                FROM pelayanan p, history_pelayanan_ugd h, pasien ps, staff s,pendapatan_kasir d
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
                and (DATE(d.tgl_verifikasi) = '$tgl')  and p.status=1 and h.status=1 
                and p.cara_bayar != '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap ) and d.selisih != 0 and d.status=1 and d.status_jurnal =0
                and d.tipe ='SELISIH'
                -- and p.status_rawat != 'selesai'
                
                ORDER by pasien asc
                ) as g
                    left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
                    as b on g.id_pendapatan = b.id_pendapatan
                    group by g.id_pendapatan
                    -- group by g.id_pelayanan
            ) as deposite_rajal_selisih

                UNION ALL

                SELECT jenis_pelayanan ,'PENDAPATAN' as keterangan, 'BAYAR SENDIRI/UMUM' as cara_bayar, total_akun, tgl_keluar,'' as no_rm,'' as id_pelayanan,pasien FROM(
                    SELECT a.id_poli jenis_pelayanan,sum(a.total_akun) total_akun, d.tgl_verifikasi tgl_keluar,a.nama_pasien pasien
                    FROM akun_non_pelayanan a, pendapatan_kasir d
                    WHERE a.id_pelayanan = d.id_pelayanan and d.keterangan != 'asuransi'
                    and d.tgl_verifikasi like '%$tgl%' and a.status = 0 and d.status =1
                    group by a.id_poli, a.id_pelayanan
                ) as non_pelayanan
               
                order by date(tgl_keluar),pasien asc
        ")->result();
        }
    }

    ////////////////////////RAJAL NON TUNAI////////////////////////////////////////////////////
    public function SelectLaporanRajalNonTunai_pasien($first_date, $second_date, $jenis_klaim) ////pasien non tunai
    {
        if ($first_date != '' && $second_date != '') {
            return $this->db->query("SELECT * FROM (SELECT lp.nama_panjang jenis_pelayanan, c.nama cara_bayar, sum(a.total_akun) total_akun, p.tgl_keluar,p.id_pasien no_rm,p.id_pelayanan,ps.nama pasien,c.diskon
                FROM akun_tindakan a, pelayanan p, cara_bayar c, list_poli lp,pasien ps
                WHERE p.id_pasien = ps.no_rm and a.id_pelayanan=p.id_pelayanan  and c.id_cara_bayar=a.cara_bayar and a.id_poli=lp.id_list_poli 
                and c.id_cara_bayar='$jenis_klaim' and (DATE(p.tgl_keluar) BETWEEN '$first_date' and '$second_date') and a.status = 0 and p.id_pelayanan not in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
        
                group by id_pelayanan
                ) as rajal_nontunai
                
                UNION ALL
                SELECT 'OBAT BEBAS' jenis_pelayanan , cara_bayar, total_akun, tgl_keluar,'' no_rm,id_pelayanan,pasien,diskon
                from(
                SELECT c.nama cara_bayar, sum(a.total_akun) total_akun, o.tanggal tgl_keluar, a.nama_pasien pasien, a.id_pelayanan,c.diskon
                FROM akun_non_pelayanan a, cara_bayar c, obat_bebas o
                WHERE a.id_pelayanan = o.id_obat_bebas and c.id_cara_bayar='$jenis_klaim' and c.id_cara_bayar=a.cara_bayar and a.kode_akun !='704.02.421'
                and a.status =0
                and (DATE(o.tanggal) BETWEEN '$first_date' and '$second_date')
                group by id_pelayanan

                ) as bebas_rajal

                UNION ALL
                SELECT jenis_pelayanan ,cara_bayar, total_akun, tgl_keluar,'' no_rm,id_pelayanan,pasien,diskon FROM (
                SELECT a.id_poli jenis_pelayanan ,c.nama cara_bayar, sum(a.total_akun) total_akun, m.tanggal tgl_keluar,a.nama_pasien pasien,a.id_pelayanan,c.diskon
                FROM akun_non_pelayanan a, cara_bayar c,mcu m
                WHERE a.id_pelayanan = m.id_mcu and c.id_cara_bayar='$jenis_klaim' and c.id_cara_bayar=a.cara_bayar and a.id_poli ='MCU'
                and a.status =0
                and (DATE(m.tanggal) BETWEEN '$first_date' and '$second_date')
                group by m.id_mcu
                ) as mcu
                UNION ALL
                SELECT jenis_pelayanan ,cara_bayar, total_akun, tgl_keluar,'' no_rm,id_pelayanan,pasien,diskon FROM (
                SELECT a.id_poli jenis_pelayanan ,c.nama cara_bayar, sum(a.total_akun) total_akun, m.tanggal tgl_keluar,a.nama_pasien pasien,a.id_pelayanan,c.diskon
                FROM akun_non_pelayanan a, cara_bayar c,homecare m
                WHERE a.id_pelayanan = m.id_pasien and c.id_cara_bayar='$jenis_klaim' and c.id_cara_bayar=a.cara_bayar and a.id_poli ='HOMECARE'
                and a.status =0
                and (DATE(m.tanggal) BETWEEN '$first_date' and '$second_date')
                group by m.id_pasien
                ) as mcu

                order by date(tgl_keluar),pasien asc
        ")->result();
        } else {
            $tgl = date("Y-m-d");
            return $this->db->query("SELECT * FROM (SELECT lp.nama_panjang jenis_pelayanan, c.nama cara_bayar, sum(a.total_akun) total_akun, p.tgl_keluar,p.id_pasien no_rm,p.id_pelayanan,ps.nama pasien,c.diskon
                FROM akun_tindakan a, pelayanan p, cara_bayar c, list_poli lp,pasien ps
                WHERE p.id_pasien = ps.no_rm and a.id_pelayanan=p.id_pelayanan  and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar and a.id_poli=lp.id_list_poli 
                and c.id_cara_bayar='$jenis_klaim' and p.tgl_keluar like '%$tgl%' and a.status = 0 and p.id_pelayanan not in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
                
                group by id_pelayanan
                ) as rajal_nontunai
                UNION ALL
                SELECT 'OBAT BEBAS' jenis_pelayanan ,c.nama cara_bayar, sum(a.total_akun) total_akun, o.tanggal tgl_keluar,'' no_rm,a.id_pelayanan,a.nama_pasien pasien,c.diskon
                FROM akun_non_pelayanan a, cara_bayar c, obat_bebas o
                WHERE a.id_pelayanan = o.id_obat_bebas and c.id_cara_bayar='$jenis_klaim' and c.id_cara_bayar=a.cara_bayar and a.kode_akun !='704.02.421'
                and a.status =0
                and o.tanggal like '%$tgl%' 

                UNION ALL
                SELECT a.id_poli jenis_pelayanan ,c.nama cara_bayar, sum(a.total_akun) total_akun, m.tgl_keluar,'' no_rm,a.id_pelayanan,a.nama_pasien pasien,c.diskon
                FROM akun_non_pelayanan a, cara_bayar c,mcu m
                WHERE a.id_pelayanan = m.id_mcu and c.id_cara_bayar='$jenis_klaim' and c.id_cara_bayar=a.cara_bayar and a.id_poli ='MCU'
                and a.status =0
                and m.tanggal like '%$tgl%' 
                group by m.id_mcu

               

                order by date(tgl_keluar),pasien asc
        ")->result();
        }
    }


    public function caraBayar_RajalNonTunai()
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT * from (SELECT c.*
        FROM akun_tindakan a,cara_bayar c
        WHERE c.id_cara_bayar=a.cara_bayar and a.id_pelayanan not in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
        UNION ALL
        SELECT c.*
        FROM akun_non_pelayanan a, cara_bayar c
        WHERE c.id_cara_bayar=a.cara_bayar and (a.id_poli ='MCU' or a.id_poli ='HOMECARE')
        UNION ALL
        SELECT c.*
        FROM akun_non_pelayanan a, cara_bayar c
        WHERE c.id_cara_bayar=a.cara_bayar and a.kode_akun ='704.01.420'
        ) as gabung
        group by id_cara_bayar
        having jenis!='UMUM'
        order by nama
       ")->result();
    }
    ///////Tampil laporan jurnal ranap//////////////////////////////
    public function SelectLaporanRanap_pasien($first_date, $second_date) //pasien
    {
        if ($first_date != '' && $second_date != '') {
            return $this->db->query("SELECT * FROM (
                SELECT 'RANAP' jenis_pelayanan ,'PENDAPATAN' as keterangan,c.nama cara_bayar, sum(a.total_akun) total_akun, p.tgl_keluar,p.id_pasien no_rm,p.id_pelayanan,ps.nama pasien
                FROM akun_tindakan a, pelayanan p, cara_bayar c,pasien ps, history_pelayanan_ranap h
                WHERE ps.no_rm = p.id_pasien and a.id_pelayanan=p.id_pelayanan  and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar  and c.jenis='UMUM' 
                and (DATE(p.tgl_keluar) BETWEEN '$first_date' and '$second_date') and a.status = 0 and p.id_pelayanan = h.id_pelayanan and h.status = 1 and p.status =1
                group by id_pelayanan
                ) as ranap_tunai
                UNION ALL
                SELECT * FROM (SELECT 'RANAP' jenis_pelayanan , CONCAT('DEPOSITE ', g.keterangan) keterangan , b.nama_bank as cara_bayar,(g.total) total_akun,g.tgl_input tgl_keluar,g.no_rm,g.id_pelayanan,g.pasien from (
                SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, (d.total_bayar) total,d.keterangan,d.id_pendapatan,d.id_pelayanan
                FROM pelayanan p, history_pelayanan_ranap h, pasien ps,pendapatan_kasir d
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm  and d.id_pelayanan=p.id_pelayanan 
                and p.cara_bayar = '42' 
                and (DATE(d.tgl_verifikasi) BETWEEN '$first_date' and '$second_date')  and p.status=1 and h.status=1  
                and (DATE(p.tgl_keluar) not BETWEEN '$first_date' and '$second_date' or p.tgl_keluar is null)
                and d.total_bayar != 0 and d.status=1 and d.no_jurnal_deposite is null
                -- and d.tgl_pulang is null
                and (d.tgl_pulang is null or (DATE(d.tgl_verifikasi) != DATE(d.tgl_pulang)))
                ) as g
                    left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
                    as b on g.id_pendapatan = b.id_pendapatan
                    group by g.id_pendapatan
                ) as deposite_ranap
                UNION ALL
                SELECT * FROM (SELECT 'RANAP' jenis_pelayanan , CONCAT('SELISIH ', g.keterangan) keterangan, b.nama_bank as cara_bayar,(g.total) total_akun,g.tgl_input tgl_keluar,g.no_rm,g.id_pelayanan,g.pasien from (
                SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, (d.selisih) total,d.keterangan,d.id_pendapatan,d.id_pelayanan
                FROM pelayanan p, history_pelayanan_ranap h, pasien ps,pendapatan_kasir d
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm  and d.id_pelayanan=p.id_pelayanan 
                and p.cara_bayar != '42' and (DATE(d.tgl_verifikasi) BETWEEN '$first_date' and '$second_date') and p.status=1 and h.status=1  and d.selisih != 0 and d.status=1 and d.status_jurnal =0
                and d.tipe='SELISIH'
                ) as g
                    left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
                    as b on g.id_pendapatan = b.id_pendapatan
                    group by g.id_pendapatan
                ) as deposite_ranap_selisih

                UNION ALL
                SELECT 'OBAT BEBAS' jenis_pelayanan ,'PENDAPATAN' as keterangan, c.nama cara_bayar, (a.total_akun) total_akun, a.tgl_masuk tgl_keluar,'' no_rm,'' id_pelayanan,a.nama_pasien pasien
                FROM akun_non_pelayanan a, cara_bayar c, pendapatan_kasir d
                WHERE a.id_pelayanan = d.id_pelayanan and c.jenis='UMUM' and c.id_cara_bayar=a.cara_bayar and a.kode_akun ='704.02.421' and a.status = 0 and d.status =1
                and (DATE(d.tgl_verifikasi) BETWEEN '$first_date' and '$second_date')

                order by date(tgl_keluar),pasien asc
        ")->result();
        } else {
            $tgl = date("Y-m-d");
            return $this->db->query("SELECT 'RANAP' jenis_pelayanan ,'PENDAPATAN' as keterangan,c.nama cara_bayar, sum(a.total_akun) total_akun, p.tgl_keluar,p.id_pasien no_rm,p.id_pelayanan,ps.nama pasien
                FROM akun_tindakan a, pelayanan p, cara_bayar c,pasien ps, history_pelayanan_ranap h
                WHERE ps.no_rm = p.id_pasien and a.id_pelayanan=p.id_pelayanan  and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar  and c.jenis='UMUM' 
                and p.tgl_keluar like '%$tgl%' and a.status = 0 and p.id_pelayanan = h.id_pelayanan and h.status = 1
                group by id_pelayanan
                
                UNION ALL
                SELECT * FROM (SELECT 'RANAP' jenis_pelayanan , CONCAT('DEPOSITE ', g.keterangan) keterangan, b.nama_bank as cara_bayar,(g.total) total_akun,g.tgl_input tgl_keluar,g.no_rm,g.id_pelayanan,g.pasien 
                from (
                    SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, (d.total_bayar) total,d.keterangan,d.id_pendapatan,d.id_pelayanan
                    FROM pelayanan p, history_pelayanan_ranap h, pasien ps, pendapatan_kasir d
                    WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm  and d.id_pelayanan=p.id_pelayanan 
                    and p.cara_bayar = '42' and d.tgl_verifikasi like '%$tgl%' and p.status=1 and h.status=1  and d.total_bayar != 0 and d.status=1 and d.status_jurnal =0
                    and p.status_rawat != 'selesai'
                    ORDER by pasien asc
                ) as g
                left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
                as b on g.id_pendapatan = b.id_pendapatan
                group by g.id_pendapatan
                ) as gabung

                UNION ALL
                SELECT * FROM (SELECT 'RANAP' jenis_pelayanan , CONCAT('SELISIH ', g.keterangan) keterangan, b.nama_bank as cara_bayar,(g.total) total_akun,g.tgl_input tgl_keluar,g.no_rm,g.id_pelayanan,g.pasien from (
                SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, (d.selisih) total,d.keterangan,d.id_pendapatan,d.id_pelayanan
                FROM pelayanan p, history_pelayanan_ranap h, pasien ps,pendapatan_kasir d
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm  and d.id_pelayanan=p.id_pelayanan 
                and p.cara_bayar != '42' and (DATE(d.tgl_verifikasi) = '$tgl') and p.status=1 and h.status=1  and d.selisih != 0 and d.status=1 and d.status_jurnal =0
                and d.tipe='SELISIH'
                ) as g
                    left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
                    as b on g.id_pendapatan = b.id_pendapatan
                    group by g.id_pendapatan
                ) as deposite_ranap_selisih

                UNION ALL
                SELECT 'OBAT BEBAS' jenis_pelayanan ,'PENDAPATAN' as keterangan, c.nama cara_bayar, (a.total_akun) total_akun, a.tgl_masuk tgl_keluar,'' no_rm,'' id_pelayanan,a.nama_pasien pasien
                FROM akun_non_pelayanan a, cara_bayar c, pendapatan_kasir d
                WHERE a.id_pelayanan = d.id_pelayanan and c.jenis='UMUM' and c.id_cara_bayar=a.cara_bayar and a.kode_akun ='704.02.421' and a.status = 0 and d.status =1
                and d.tgl_verifikasi like '%$tgl%' 

                order by date(tgl_keluar),pasien asc
                ")->result();
        }
    }


    public function caraBayar_RanapNonTunai()
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT * FROM (SELECT c.*
        FROM akun_tindakan a,cara_bayar c
        WHERE c.id_cara_bayar=a.cara_bayar and a.id_pelayanan in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
        UNION ALL
        SELECT c.*
        FROM akun_non_pelayanan a, cara_bayar c
        WHERE c.id_cara_bayar=a.cara_bayar and a.kode_akun ='704.02.421'
       
        ) as gabung
        group by id_cara_bayar
        having jenis!='UMUM'
        order by nama

       ")->result();
    }
    //////////////NO dokumen/////////////////////
    public function selectNoDokumen($jenis)
    {
        date_default_timezone_set('Asia/Jakarta');

        $this->db->select('MAX(no_index) max');
        $this->db->from('jurnal_pendapatan');
        $this->db->where('jenis', $jenis);
        return $this->db->get()->row();
    }

    public function selectNoDokumenPau($kode, $tgl)
    {
        date_default_timezone_set('Asia/Jakarta');
        if ($tgl == "") {
            $tgl = date("Y-m");
        } else {
            $tgl = date("Y-m", strtotime($tgl));
        }
        $this->db->select('MAX(no_index) max');
        $this->db->from('dokumen_jurnal');
        $this->db->where('kode', $kode);
        $this->db->like('tgl', $tgl);

        return $this->db->get()->row();
    }

    ////////////////Jurnal Bank\\\\\\\\\\\\\\\\\\\

    public function SelectJurnalBank($first_date, $second_date)
    {
        $tgl = date("Y-m-d");

        $this->db->select('j.*, d.nama_bank,p.jenis_pembayaran');
        $this->db->from('jurnal_cara_pembayaran j, daftar_bank d,pendapatan_bank p');
        $this->db->where('j.cara_klaim = d.id_bank');
        $this->db->where('j.id_jurnal = p.id_pelayanan');
        // $this->db->where('j.verifikasi = 1');
        $this->db->where('j.status = 0');
        $this->db->where('SUBSTRING_INDEX(j.rekening, ".", 1) = 114');
        $this->db->group_by('j.id_jurnal_bayar');
        if ($first_date != '' || $second_date != '') {
            $this->db->where('tgl >=', $first_date);
            $this->db->where('tgl <=', $second_date);
        } else {
            $this->db->like('tgl', $tgl);
        }
        $this->db->order_by('tgl desc');
        return $this->db->get()->result();
    }
    public function getForJurnalBank($id)
    {
        $tgl = date("Y-m-d");

        $this->db->select('j.*, p.jenis_pembayaran');
        $this->db->from('jurnal_cara_pembayaran j,pendapatan_bank p');
        $this->db->where('j.id_jurnal = p.id_pelayanan');
        $this->db->where('j.id_jurnal_bayar', $id);
        $this->db->group_by('j.id_jurnal_bayar');
        return $this->db->get()->row();
    }
    ////////////////Jurnal PAU\\\\\\\\\\\\\\\\\\\

    public function SelectJurnalPAU($first_date, $second_date)
    {
        $tgl = date("Y-m-d");

        $this->db->select('j.*');
        $this->db->from('jurnal_cara_pembayaran j');
        $this->db->where('j.status = 0');
        $this->db->where('j.ket_bayar', 'non tunai');
        if ($first_date != '' || $second_date != '') {
            $this->db->where('tgl >=', $first_date);
            $this->db->where('tgl <=', $second_date);
        } else {
            $this->db->like('tgl', $tgl);
        }

        return $this->db->get()->result();
    }

    ///////////////////////////////verifikasi jurnal pendapatan//////////////////////////////////////
    public function SelectJurnalPendapatan($first_date, $second_date)
    {
        $auth = $this->session->userdata("data_auth");
        $tgl = date("Y-m");
        if ($auth->tipe == 'vp finance') {
            if ($first_date != '' && $second_date != '') {
                return $this->db->query("SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk from jurnal_cara_pembayaran where tgl >= '$first_date' and tgl<='$second_date' and verifikasi =0 group by no_jurnal
            UNION ALL
            SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk from jurnal_piutang where tgl >= '$first_date' and tgl<='$second_date' and verifikasi =0 group by no_jurnal
            ")->result();
            } else {
                return $this->db->query("SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk,ket_bayar from jurnal_cara_pembayaran where  verifikasi =0 and tgl like '$tgl%' group by no_jurnal
            UNION ALL
            SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk,ket_bayar from jurnal_piutang where  verifikasi =0 and tgl like '$tgl%' group by no_jurnal
            ")->result();
            }
        } else {
            if ($first_date != '' && $second_date != '') {
                return $this->db->query("SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk from jurnal_cara_pembayaran where tgl >= '$first_date' and tgl<='$second_date' and verifikasi =0 and no_jurnal like'%GL-301%' group by no_jurnal
           
            ")->result();
            } else {
                return $this->db->query("SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk,ket_bayar from jurnal_cara_pembayaran where  verifikasi =0 and tgl like '$tgl%' and no_jurnal like'%GL-301%' group by no_jurnal
           
            ")->result();
            }
        }
    }
    public function SelectJurnalPiutang($first_date, $second_date, $jenis)
    {
        $tgl = date("Y-m-d");
        if ($first_date != '' && $second_date != '') {
            if ($jenis == 'PYMHD') {
                return $this->db->query("SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk, verifikasi from jurnal_cara_pembayaran where tgl >= '$first_date' and tgl<='$second_date' and no_jurnal like'%GL-304%' group by no_jurnal, verifikasi
            ")->result();
            } else {
                return $this->db->query(" SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk, verifikasi from jurnal_piutang where tgl >= '$first_date' and tgl<='$second_date' group by no_jurnal, verifikasi
                ")->result();
            }
        } else {
            if ($jenis == 'PYMHD') {
                return $this->db->query("SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk,ket_bayar, verifikasi from jurnal_cara_pembayaran where tgl like '$tgl%' and no_jurnal like'%GL-304%' group by no_jurnal, verifikasi
           ")->result();
            } else {
                return $this->db->query(" SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk,ket_bayar, verifikasi from jurnal_piutang where tgl like '$tgl%' group by no_jurnal, verifikasi
                ")->result();
            }
        }
    }

    ///////////////////////////////Laporan summary//////////////////////////////////////
    public function SelectLaporanSummary()
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT * FROM(SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk,ket_bayar 
        from jurnal_cara_pembayaran where tgl like '$tgl%'  and verifikasi =1 
        group by no_jurnal
        ) as a
        UNION ALL
        SELECT * FROM(
        SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk,ket_bayar 
        from jurnal_piutang where tgl like '$tgl%'  and verifikasi =1 
        group by no_jurnal
        ) as b")->result();
    }
    public function SelectRangeLaporanSummary($first_date, $second_date)
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT * FROM(SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk,ket_bayar 
        from jurnal_cara_pembayaran where tgl >= '$first_date' and tgl<='$second_date' and verifikasi =1 
        group by no_jurnal
        ) as a
        UNION ALL
        SELECT * FROM(
        SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk,ket_bayar 
        from jurnal_piutang where tgl >= '$first_date' and tgl<='$second_date' and verifikasi =1 
        group by no_jurnal
        ) as b
       ")->result();
    }
    public function getSummary($no_jurnal)
    {
        return $this->db->query("SELECT * FROM (
            SELECT * FROM (SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,sum(debet) debet, sum(kredit) kredit,no_jurnal, id_jurnal id_fk, '1' as urut 
            FROM jurnal_cara_pembayaran 
            where no_jurnal = '$no_jurnal' and rekening ='101.01.100'
            -- and id_jurnal in (select id_fk from jurnal_pendapatan where status = 1)

            group by deskripsi,rekening
            )as kas
            UNION ALL
    
            SELECT * FROM (SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,sum(debet) debet, sum(kredit) kredit,no_jurnal, id_jurnal id_fk, '1' as urut 
            FROM jurnal_cara_pembayaran 
            where no_jurnal = '$no_jurnal' and rekening !='101.01.100'
            -- and id_jurnal in (select id_fk from jurnal_pendapatan where status = 1)

            group by deskripsi,rekening,id_jurnal
            )as db
            
            union ALL
            SELECT * FROM(
            SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,sum(debet) debet, sum(kredit) kredit,no_jurnal, id_fk , '2' as urut 
            FROM jurnal_pendapatan
            where no_jurnal = '$no_jurnal'
            group by deskripsi,id_fk,rekening
            
            ) as kd
            
            ) as gabung

            UNION ALL 
            SELECT * from (SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,sum(debet) debet, sum(kredit) kredit,no_jurnal, id_jurnal id_fk, '1' as urut 
            FROM jurnal_piutang 
            where no_jurnal = '$no_jurnal'
            -- and id_jurnal in (select id_fk from jurnal_pendapatan where status = 1)

            group by deskripsi,rekening
            )as piutang
            order by rekening,urut
            ")->result_array();
    }

    public function getDetail($no_jurnal)
    {
        return $this->db->query("SELECT g.*,b.tgl_masuk,b.tgl_keluar,p.no_rm,p.nama from (
        SELECT id_pelayanan,no_jurnal, sum(total_bayar) total from pendapatan_kasir
        where status_jurnal =1 and no_jurnal = '$no_jurnal' and (no_jurnal = no_jurnal_deposite or no_jurnal_deposite is null)
        and tipe !='SELISIH'
        group by id_pelayanan
        ) as g, pelayanan b, pasien p
        where g.id_pelayanan = b.id_pelayanan and b.id_pasien = p.no_rm and b.status_rawat ='selesai'
        and b.cara_bayar = 42
        UNION ALL

        SELECT g.*,b.tgl_masuk,b.tgl_keluar,p.no_rm,p.nama from (
        SELECT id_pelayanan,no_jurnal_deposite no_jurnal, sum(total_bayar) total from pendapatan_kasir
        where status_jurnal =1 and no_jurnal_deposite = '$no_jurnal' and (no_jurnal != no_jurnal_deposite or no_jurnal is null)
        group by id_pelayanan
        ) as g, pelayanan b, pasien p
        where g.id_pelayanan = b.id_pelayanan and b.id_pasien = p.no_rm
        and b.cara_bayar = 42

        UNION ALL

        SELECT id_pelayanan,no_jurnal,  sum(total), tgl_masuk, tgl_keluar, '' as no_rm, nama from (
        SELECT a.id_pelayanan,a.no_jurnal, (a.total_akun) total, j.tgl tgl_masuk, j.tgl tgl_keluar, a.nama_pasien nama    
        from akun_non_pelayanan a, jurnal_cara_pembayaran j
        where a.no_jurnal = j.no_jurnal and a.no_jurnal = '$no_jurnal' and a.status = 1
        group by a.id_akun
        ) as a group by id_pelayanan


        UNION ALL

        SELECT * FROM(
        SELECT a.id_pelayanan,j.no_jurnal, sum(j.kredit) total, j.tgl tgl_masuk, j.tgl tgl_keluar,  p.no_rm, p.nama
        from pelayanan a,pasien p, jurnal_pendapatan j
        where a.id_pelayanan = j.id_fk and a.id_pasien = p.no_rm and j.id_fk in (SELECT id_pelayanan from pendapatan_kasir where tipe ='SELISIH')
        and a.cara_bayar != 42
        and j.no_jurnal = '$no_jurnal' and j.rekening ='403.01.000' 
        group by j.id_fk
        ) as d

        UNION ALL
        SELECT * FROM(
        SELECT a.id_pelayanan,j.no_jurnal, sum(j.kredit) total, j.tgl tgl_masuk, j.tgl tgl_keluar,  p.no_rm, p.nama
        from pelayanan a,pasien p, jurnal_pendapatan j
        where a.id_pelayanan = j.id_fk and a.id_pasien = p.no_rm
        and a.cara_bayar != 42
        and j.no_jurnal = '$no_jurnal'
        group by j.id_fk
        ) as e
        
        UNION ALL
        SELECT * FROM(
        SELECT a.id_pelayanan,j.no_jurnal, sum(j.total_akun) total, a.tgl_masuk, a.tgl_keluar,  p.no_rm, p.nama
        from pelayanan a,pasien p, akun_tindakan j
        where a.id_pelayanan = j.id_pelayanan and a.id_pasien = p.no_rm 
        and a.cara_bayar != 42
        and j.no_jurnal = '$no_jurnal'
        group by j.id_pelayanan
        ) as e
        UNION ALL
        SELECT * FROM(
        SELECT a.id_pelayanan,j.no_jurnal, sum(j.total_akun) total, a.tgl_masuk, a.tgl_keluar,  p.no_rm, p.nama
        from pelayanan a,pasien p, akun_tindakan j
        where a.id_pelayanan = j.id_pelayanan and a.id_pasien = p.no_rm 
        and a.cara_bayar != 42
        and j.no_jurnal in (select id_fk from jurnal_piutang where no_jurnal ='$no_jurnal')
        group by j.id_pelayanan
        ) as f

        

       order by tgl_masuk

        ")->result_array();
    }

    public function getDataJurnal($no_jurnal)
    {
        return $this->db->query("SELECT ifnull(sum(debet),0) debet,ifnull(sum(kredit),0) kredit,cara_klaim, jenis_jurnal, tgl,staff,staff_verifikasi,jk,pk,id_vendor
                                FROM jurnal_cara_pembayaran WHERE no_jurnal ='$no_jurnal' 
                                UNION ALL
                                SELECT  ifnull(sum(debet),0) debet,ifnull(sum(kredit),0) kredit,cara_klaim, jenis_jurnal,tgl,staff,staff_verifikasi,jk,pk,id_vendor
                                FROM jurnal_piutang WHERE no_jurnal ='$no_jurnal' and  cara_klaim != 'REDUKSI'
                                order by debet desc")->row();
    }
    public function get_data_kwitansi($no_jurnal)
    {
        return $this->db->query("SELECT * FROM(SELECT max(tgl_masuk) maxx, min(tgl_masuk) minn from (SELECT tgl_masuk,no_jurnal from (
           
            SELECT p.*,a.no_jurnal FROM akun_tindakan a,pelayanan p
            where a.id_pelayanan=p.id_pelayanan and a.status =1
            ) as gabung  
            group by id_pelayanan
        having no_jurnal = '$no_jurnal'
             ) as gabung1
             group by no_jurnal = '$no_jurnal') as a
             UNION ALL
        SELECT * FROM(SELECT max(tgl_masuk) maxx, min(tgl_masuk) minn from (SELECT tgl_masuk,no_jurnal from (   
           SELECT p.*,j.no_jurnal FROM akun_tindakan a,pelayanan p, jurnal_piutang j
           where a.id_pelayanan=p.id_pelayanan and a.status =1 and a.no_jurnal = j.id_fk
           ) as gabung  
           group by id_pelayanan
       having no_jurnal = '$no_jurnal'
            ) as gabung1
            group by no_jurnal = '$no_jurnal') as b
            UNION ALL
            SELECT * FROM(SELECT max(tgl_masuk) maxx, min(tgl_masuk) minn from (SELECT tgl_masuk,no_jurnal from (
           
           SELECT a.no_jurnal,a.id_pelayanan,a.tgl_masuk tgl_masuk FROM akun_non_pelayanan a,jurnal_cara_pembayaran j
           where a.no_jurnal = j.no_jurnal and a.status = 1
           ) as gabung  
           group by id_pelayanan
       having no_jurnal = '$no_jurnal'
            ) as gabung1
            group by no_jurnal = '$no_jurnal') as c
            UNION ALL
       SELECT * FROM(SELECT max(tgl_masuk) maxx, min(tgl_masuk) minn from (SELECT tgl_masuk,no_jurnal from (   
          SELECT j.no_jurnal,a.id_pelayanan,a.tgl_masuk tgl_masuk FROM akun_non_pelayanan a, jurnal_piutang j,jurnal_cara_pembayaran p
          where  a.status =1 and p.no_jurnal = j.id_fk and a.no_jurnal = p.no_jurnal
          ) as gabung  
          group by id_pelayanan
      having no_jurnal = '$no_jurnal'
           ) as gabung1
           group by no_jurnal = '$no_jurnal') as d
        ")->row();
    }

    public function SelectSummaryBank($first_date, $second_date)
    {
        $tgl = date("Y-m-d");

        $this->db->select('tgl,no_jurnal,sum(debet) total, staff,jk,id_fk');
        $this->db->from('jurnal_bank');
        if ($first_date != '' || $second_date != '') {
            $this->db->where('tgl >=', $first_date);
            $this->db->where('tgl <=', $second_date);
        } else {
            $this->db->like('tgl', $tgl);
        }
        $this->db->group_by('no_jurnal');
        return $this->db->get()->result();
    }
    public function getJurnalBank($no_jurnal, $id_fk)
    {
        $jenis = $this->db->get_where('jurnal_bank', ['id_fk' => $id_fk])->row()->keterangan;
        if ($jenis == 'transfer') {
            $query = $this->db->query("SELECT * FROM (
                SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,debet, kredit,no_jurnal, id_fk
                FROM jurnal_bank
                where no_jurnal = '$no_jurnal' 
               
                ) as gabung
                ")->result_array();
        } else {
            $query = $this->db->query("SELECT * FROM (
                SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,(debet) debet, (kredit) kredit,no_jurnal, id_fk
                FROM jurnal_bank
                where no_jurnal = '$no_jurnal' 
              
                ) as gabung
                ")->result_array();
        }
        return $query;
    }


    public function SelectLaporanRangeRekap($mulai, $akhir)
    {
        return $this->db->query("SELECT * from(
            select d.jk, d.rekening,d.deskripsi, d.no_jurnal, d.kredit, d.debet, d.lap, d.cj, d.jb, d.pk, d.des_rek,(j.tgl_verifikasi) tgl, d.staff,'-' as id_vendor,'' as kelompok_pelanggan, '' as no_reg
            from detail_jurnal_kas_bank d, jurnal_kas_bank j
            where d.no_jurnal = j.no_jurnal and DATE(j.tgl_verifikasi) >= '$mulai' and date(j.tgl_verifikasi) <='$akhir' and j.verifikasi='DITERIMA' and d.pk not in (select no_dokumen from pembayaran_piutang)
            -- group by d.id_detail
            ) as f
        UNION ALL
            SELECT * from(
            select d.jk, d.rekening,d.deskripsi, d.no_jurnal, d.kredit, d.debet, d.lap, d.cj, d.jb, d.pk, d.des_rek,(j.tgl_verifikasi) tgl, d.staff,p.id_vendor,c.kelompok_pelanggan, '' as no_reg
            from detail_jurnal_kas_bank d, jurnal_kas_bank j,pembayaran_piutang p, cara_bayar c
            where d.no_jurnal = j.no_jurnal and d.pk = p.no_dokumen and p.id_vendor = c.kode_pelanggan and DATE(j.tgl_verifikasi) >= '$mulai' and date(j.tgl_verifikasi) <='$akhir' and j.verifikasi='DITERIMA' and j.source ='PEMBAYARAN PIUTANG'
            -- group by d.id_detail
            ) as b
        UNION ALL
        SELECT * from(
            SELECT '10' as jk, rekening, deskripsi, no_jurnal, kredit, debet, lap, cj, jb, pk, des_rek, tgl, staff, id_vendor, kelompok_pelanggan  , no_reg
            FROM (
                SELECT *
                FROM (
                    SELECT jc.jk, jc.rekening, jc.deskripsi, jc.no_jurnal, sum(jc.kredit) kredit, sum(jc.debet) debet, jc.lap, jc.cj, jc.jb, jc.pk, jc.des_rek,date(jc.tgl) tgl, jc.staff, jc.id_vendor, c.kelompok_pelanggan, '1' as urut ,if(jc.rekening = '403.01.000',concat('RS01',jc.id_jurnal),'') as no_reg 
                    FROM jurnal_cara_pembayaran jc, cara_bayar c
                    where date(jc.tgl) >= '$mulai' and date(jc.tgl) <='$akhir' and verifikasi =1 
                    and jc.id_vendor = c.kode_pelanggan and jc.rekening ='101.01.100'
                    group by no_jurnal,deskripsi,rekening
                    )as kas
                UNION ALL
                SELECT *
                FROM (
                    SELECT jc.jk, jc.rekening, jc.deskripsi, jc.no_jurnal, sum(jc.kredit) kredit, sum(jc.debet) debet, jc.lap, jc.cj, jc.jb, jc.pk, jc.des_rek,date(jc.tgl) tgl, jc.staff, jc.id_vendor, c.kelompok_pelanggan, '1' as urut ,if(jc.rekening = '403.01.000',concat('RS01',jc.id_jurnal),'') as no_reg 
                    FROM jurnal_cara_pembayaran jc, cara_bayar c
                    where date(jc.tgl) >= '$mulai' and date(jc.tgl) <='$akhir' and verifikasi =1 
                    and jc.id_vendor = c.kode_pelanggan and jc.rekening !='101.01.100'
                    group by no_jurnal,deskripsi,rekening,id_jurnal
                    )as db
            
                UNION ALL

                SELECT * FROM(
                    SELECT jp.jk, jp.rekening, jp.deskripsi, jp.no_jurnal, sum(jp.kredit) kredit, sum(jp.debet) debet, jp.lap, jp.cj, jp.jb, jp.pk, jp.des_rek,date(jp.tgl) tgl, jp.staff, jp.id_vendor, c.kelompok_pelanggan, '2' as urut ,if(jp.rekening = '403.01.000',concat('RS01',jp.id_fk),'') as no_reg 
                    FROM jurnal_pendapatan jp, cara_bayar c
                    where date(tgl) >= '$mulai' and date(tgl) <='$akhir'
                    and jp.id_vendor = c.kode_pelanggan and jp.no_jurnal in(SELECT no_jurnal from jurnal_cara_pembayaran where verifikasi = 1)
                    group by no_jurnal,deskripsi,id_fk,rekening

                ) as kd
            
            ) as gabung
            order by rekening,urut
        
        ) as a
        

        UNION ALL
        SELECT * from(
        select jk, rekening,deskripsi, no_jurnal, kredit, debet, lap, cj, jb, pk, des_rek,date(tgl) tgl, staff,'-' as id_vendor,'' as kelompok_pelanggan, '' as no_reg
        from jurnal_pau
        where tgl >= '$mulai' and tgl <='$akhir'
        ) as d

        UNION ALL
        SELECT * from(
        select d.jk, d.rekening,d.deskripsi, d.no_jurnal, d.kredit, d.debet, d.lap, d.cj, d.jb, d.pk, d.des_rek,(j.tanggal) tgl, d.staff,d.id_vendor,'' as kelompok_pelanggan, '' as no_reg
        from detail_jurnal_rupa d, jurnal_rupa j
        where d.no_jurnal = j.no_jurnal and j.tanggal >= '$mulai' and j.tanggal <='$akhir' 
        and j.verifikasi='DITERIMA'
        ) as e
        
        UNION ALL
        
        SELECT * from(
        select jk, rekening,deskripsi, no_jurnal, kredit, debet, lap, cj, jb, pk, des_rek,date(tgl) tgl, staff,'-' as id_vendor,'' as kelompok_pelanggan, '' as no_reg
        from jurnal_material
        where tgl >= '$mulai' and tgl <='$akhir' and status='DITERIMA'
        ) as g

        UNION ALL
        SELECT * from(
        select jk, rekening,deskripsi, no_jurnal, kredit, debet, lap, cj, jb, pk, des_rek,date(tgl) tgl, staff,'-' as id_vendor,'' as kelompok_pelanggan, '' as no_reg
        from jurnal_material_persediaan
        where tgl >= '$mulai' and tgl <='$akhir' and status='DITERIMA'
        ) as h   

        UNION ALL
        SELECT jk,rekening,deskripsi,no_jurnal, kredit, debet, lap ,cj, jb, pk, des_rek,date(tgl) tgl,staff,id_vendor,'' as kelompok_pelanggan, '' as no_reg
        FROM (
             SELECT jk,staff,tgl, lap,pk,jb,cj,rekening,deskripsi,des_rek, debet, kredit,no_jurnal,id_vendor,'1' as urut 
            FROM jurnal_farmasi
            where jenis_jurnal = 'persediaan' and tgl >= '$mulai' and tgl <='$akhir' and no_jurnal in (SELECT no_jurnal from jurnal_pembayaran_farmasi where status='DITERIMA')
            
            union all
            SELECT * FROM (SELECT jk,staff ,tgl, lap,pk,jb,cj,rekening,deskripsi,des_rek,sum(debet) debet, sum(kredit) kredit,no_jurnal,id_vendor,'2' as urut
            FROM jurnal_pembayaran_farmasi 
            where jenis_jurnal = 'persediaan' and tgl >= '$mulai' and tgl <='$akhir' and status='DITERIMA'
            group by no_jurnal,rekening
            ) as pembayaran1
            order by no_jurnal, urut
           
        ) as gabung1
        
        UNION ALL

        SELECT jk,rekening,deskripsi,no_jurnal, kredit, debet, lap ,cj, jb, pk, des_rek,date(tgl) tgl,staff ,id_vendor ,'' as kelompok_pelanggan, '' as no_reg
        FROM (
                SELECT jk,des_rek,staff,tgl, lap,pk,jb,cj,rekening,deskripsi, debet, kredit,no_jurnal,id_vendor,'1' as urut 
               FROM jurnal_farmasi
               where jenis_jurnal = 'hutang' and tgl >= '$mulai' and tgl <='$akhir' and no_jurnal in (SELECT no_jurnal from jurnal_pembayaran_farmasi where status='DITERIMA')
               -- group by rekening
               union all
               SELECT * FROM (SELECT jk,des_rek,staff,tgl, lap,pk,jb,cj,rekening,deskripsi,sum(debet) debet, sum(kredit) kredit,no_jurnal,id_vendor,'2' as urut
               FROM jurnal_pembayaran_farmasi 
               where jenis_jurnal = 'hutang' and tgl >= '$mulai' and tgl <='$akhir' and status='DITERIMA'
               group by no_jurnal,rekening
               ) as pembayaran2
                order by no_jurnal,urut

        ) as gabung2

        UNION ALL  

        SELECT jk,rekening,deskripsi,no_jurnal, kredit, debet, lap ,cj, jb, pk, des_rek,date(tgl) tgl,staff ,'-' as id_vendor ,'' as kelompok_pelanggan , '' as no_reg
        FROM (
            SELECT jk,des_rek,staff,tgl, lap,pk,jb,cj,rekening,deskripsi, debet, kredit,no_jurnal,'1' as urut 
            FROM jurnal_penyusutan 
            where date(tgl) >= '$mulai' and date(tgl) <='$akhir'
            union ALL
            SELECT jk,des_rek,staff,tgl, lap,pk,jb,cj,rekening,deskripsi, debet, kredit,no_jurnal,'2' as urut 
            FROM jurnal_akumulasi_penyusutan
            where date(tgl) >= '$mulai' and date(tgl) <='$akhir'
        ) as gabung3

        UNION ALL
        SELECT * , '' as no_reg FROM(
        SELECT  jk,rekening,deskripsi,no_jurnal, kredit, debet, lap ,cj, jb, pk, des_rek,date(tgl) tgl,staff ,id_vendor ,'' as kelompok_pelanggan 
        FROM (
                SELECT j.tanggal tgl, b.lap,b.pk,b.jk,b.jb,b.cj,b.rekening,b.deskripsi,b.des_rek,b.debet, b.kredit,b.no_jurnal, b.id_fk,b.staff,b.id_vendor
                FROM jurnal_bank b, jurnal_kas_bank j
                where b.no_jurnal = j.no_jurnal AND date(j.tanggal) >= '$mulai' and date(j.tanggal) <='$akhir' and j.verifikasi ='DITERIMA'
                
                ) as gabung
                UNION all
                SELECT tgl, lap,pk,jk,jb,cj,rekening,deskripsi,des_rek,debet, kredit,no_jurnal, id_fk,staff,id_vendor
                FROM jurnal_bank 
                where date(tgl) >= '$mulai' and date(tgl) <='$akhir' 
                and tgl_input < '2023-09-01'
                -- order by urut asc
        ) as i

        UNION ALL
        SELECT * from(
        select j.jk, j.rekening,j.deskripsi, j.no_jurnal, j.kredit, j.debet, j.lap, j.cj, j.jb, j.pk, j.des_rek,date(j.tgl) tgl, j.staff,id_vendor,c.kelompok_pelanggan, '' as no_reg
        from jurnal_piutang j, cara_bayar c
        where j.tgl >= '$mulai' and j.tgl <='$akhir' and j.id_vendor = c.kode_pelanggan and j.verifikasi =1
        ) as j

        ")->result();
    }
    public function SelectLaporanRangeRekapByJenis($mulai, $akhir,$jenis)
    {
        if($jenis=='PYMHD'){return $this->db->query("SELECT * from(
            SELECT '10' as jk, rekening, deskripsi, no_jurnal, kredit, debet, lap, cj, jb, pk, des_rek, tgl, staff, id_vendor, kelompok_pelanggan  , no_reg
            FROM (
                
                SELECT *
                FROM (
                    SELECT jc.jk, jc.rekening, jc.deskripsi, jc.no_jurnal, sum(jc.kredit) kredit, sum(jc.debet) debet, jc.lap, jc.cj, jc.jb, jc.pk, jc.des_rek,date(jc.tgl) tgl, jc.staff, jc.id_vendor, c.kelompok_pelanggan, '1' as urut ,if(jc.rekening = '403.01.000',concat('RS01',jc.id_jurnal),'') as no_reg 
                    FROM jurnal_cara_pembayaran jc, cara_bayar c
                    where date(jc.tgl) >= '$mulai' and date(jc.tgl) <='$akhir' and verifikasi =1 
                    and jc.id_vendor = c.kode_pelanggan and jc.rekening !='101.01.100' and jc.no_jurnal like '%GL-304%'
                    group by no_jurnal,deskripsi,rekening,id_jurnal
                    )as db
            
                UNION ALL

                SELECT * FROM(
                    SELECT jp.jk, jp.rekening, jp.deskripsi, jp.no_jurnal, sum(jp.kredit) kredit, sum(jp.debet) debet, jp.lap, jp.cj, jp.jb, jp.pk, jp.des_rek,date(jp.tgl) tgl, jp.staff, jp.id_vendor, c.kelompok_pelanggan, '2' as urut ,if(jp.rekening = '403.01.000',concat('RS01',jp.id_fk),'') as no_reg 
                    FROM jurnal_pendapatan jp, cara_bayar c
                    where date(tgl) >= '$mulai' and date(tgl) <='$akhir' and jp.no_jurnal like '%GL-304%'
                    and jp.id_vendor = c.kode_pelanggan and jp.no_jurnal in(SELECT no_jurnal from jurnal_cara_pembayaran where verifikasi = 1)
                    group by no_jurnal,deskripsi,id_fk,rekening

                ) as kd
            
            ) as gabung
            order by rekening,urut
        
        ) as a
        ")->result();
        }else{
        return $this->db->query("SELECT * from(
        select j.jk, j.rekening,j.deskripsi, j.no_jurnal, j.kredit, j.debet, j.lap, j.cj, j.jb, j.pk, j.des_rek,date(j.tgl) tgl, j.staff,id_vendor,c.kelompok_pelanggan, '' as no_reg
        from jurnal_piutang j, cara_bayar c
        where j.tgl >= '$mulai' and j.tgl <='$akhir' and j.id_vendor = c.kode_pelanggan and j.verifikasi =1
        ) as j

        ")->result();
        }
    }
    public function SelectSummaryPau($first_date, $second_date)
    {
        $tgl = date("Y-m-d");

        $this->db->select('tgl,no_jurnal,sum(debet) total, staff,jk,id_fk');
        $this->db->from('jurnal_pau');
        if ($first_date != '' || $second_date != '') {
            $this->db->where('tgl >=', $first_date);
            $this->db->where('tgl <=', $second_date);
        } else {
            $this->db->like('tgl', $tgl);
        }
        $this->db->group_by('id_fk');
        return $this->db->get()->result();
    }
    public function getJurnalPau($no_jurnal, $id_fk)
    {
        return $this->db->query("SELECT * FROM (
            SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,debet, kredit,no_jurnal, id_fk,'1' as urut
            FROM jurnal_pau
            where no_jurnal = '$no_jurnal' and id_fk = '$id_fk'
            UNION ALL
            SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,kredit,debet,no_jurnal, id_fk,'2' as urut
            FROM jurnal_cara_pembayaran 
            where no_jurnal = '$no_jurnal' and id_fk = '$id_fk'
            
            ) as gabung
            order by urut asc
            ")->result_array();
    }
    public function get_jurnal_pendapatan_bypelayanan()
    {
        return $this->db->query("SELECT * from akun_farmasi where status = 1
        group by id_pelayanan
            ")->result();
    }
    public function getDetailPiutang($no_jurnal)
    {
        return $this->db->query("SELECT v.*,IFNULL(d.piutang,0) piutang
        from v_total_piutang v
        left join (SELECT sum(t.debet) piutang, t.id_pelayanan 
                 from detail_pembayaran_piutang t, pembayaran_piutang p
                 where t.id_fk=p.no_dokumen and p.save != 99
                 group by t.id_pelayanan
                 ) d on v.id_pelayanan= d.id_pelayanan
        where v.no_jurnal = '$no_jurnal'
        having (tagihan-piutang) != 0
        order by tgl_masuk desc
        ")->result();
    }
    public function getNama_pasien($id_pelayanan)
    {
        return $this->db->query("SELECT * from (
        SELECT p.nama,p.no_rm,b.status_rawat, b.tgl_keluar, b.cara_bayar FROM pelayanan b, pasien p
        where p.no_rm = b.id_pasien and b.id_pelayanan = '$id_pelayanan'
        union all
        SELECT p.nama,'' as no_rm,'selesai' status_rawat, '-' tgl_keluar, 'cara_bayar' cara_bayar FROM obat_bebas p
        where p.id_obat_bebas = '$id_pelayanan'
        union all
        SELECT p.nama_pasien nama,'' as no_rm,'selesai' status_rawat, '-' tgl_keluar, '42' cara_bayar FROM mcu p
        where p.id_mcu = '$id_pelayanan'
        
        ) as g
        ")->row();
    }
    public function getNama_pasien_tipe($id_pelayanan, $jenis)
    {
        if ($jenis == 'OBAT BEBAS') {
            return $this->db->query("SELECT p.nama,'' as no_rm,'selesai' status_rawat 
                FROM obat_bebas p
                where p.id_obat_bebas = '$id_pelayanan'
                ")->row();
        } else if ($jenis == 'MCU') {
            return $this->db->query("SELECT p.nama_pasien nama,'' as no_rm,'selesai' status_rawat 
                FROM mcu p
                where p.id_mcu = '$id_pelayanan'
                ")->row();
        } else if ($jenis == 'HOMECARE') {
            return $this->db->query("SELECT p.nama,'' as no_rm,'selesai' status_rawat 
            FROM homecare p
            where p.id_pasien = '$id_pelayanan'
                ")->row();
        } else {
            return $this->db->query("SELECT p.nama,p.no_rm,b.status_rawat 
                FROM pelayanan b, pasien p
                where p.no_rm = b.id_pasien and b.id_pelayanan = '$id_pelayanan'
                ")->row();
        }
    }
    //////////////////////ranap non tunai/////////////////////////////
    public function SelectLaporanRanapNonTunai_pasien($first_date, $second_date, $jenis_klaim)
    {
        if ($first_date != '' && $second_date != '') {
            return $this->db->query("SELECT * FROM( SELECT 'RANAP' jenis_pelayanan ,c.nama cara_bayar, sum(a.total_akun) total_akun,p.tgl_keluar,p.id_pasien no_rm,p.id_pelayanan,ps.nama pasien, c.diskon
         FROM akun_tindakan a, pelayanan p, cara_bayar c, pasien ps
         WHERE ps.no_rm = p.id_pasien and a.id_pelayanan=p.id_pelayanan  and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar  and c.id_cara_bayar='$jenis_klaim' and (DATE(p.tgl_keluar) BETWEEN '$first_date' and '$second_date') and a.status = 0 and p.id_pelayanan in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
         
         group by id_pelayanan
         )as ranap_nontunai
         
         UNION ALL
         SELECT 'OBAT BEBAS' jenis_pelayanan , c.nama cara_bayar, (a.total_akun) total_akun, o.tanggal tgl_keluar,'' no_rm,a.id_pelayanan,a.nama_pasien pasien, c.diskon
         FROM akun_non_pelayanan a, cara_bayar c, obat_bebas o
         WHERE a.id_pelayanan = o.id_obat_bebas and c.id_cara_bayar='$jenis_klaim' and c.id_cara_bayar=a.cara_bayar and a.kode_akun ='704.02.421'
         and (DATE(o.tanggal) BETWEEN '$first_date' and '$second_date')
 
         order by date(tgl_keluar),pasien asc
         ")->result();
        } else {
            $tgl = date("Y-m-d");
            return $this->db->query("SELECT * FROM (
         SELECT 'RANAP' jenis_pelayanan ,c.nama cara_bayar, sum(a.total_akun) total_akun,p.tgl_keluar,p.id_pasien no_rm,p.id_pelayanan,ps.nama pasien, c.diskon
         FROM akun_tindakan a, pelayanan p, cara_bayar c, pasien ps
         WHERE ps.no_rm = p.id_pasien and a.id_pelayanan=p.id_pelayanan  and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar  and c.id_cara_bayar='$jenis_klaim' and p.tgl_keluar like '%$tgl%' and a.status = 0 and p.id_pelayanan in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
        
         group by id_pelayanan
         ) as ranap_nontunai
         
         UNION ALL
         SELECT 'OBAT BEBAS' jenis_pelayanan ,c.nama cara_bayar, (a.total_akun) total_akun, a.tgl_input tgl_keluar,'' no_rm,a.id_pelayanan,a.nama_pasien pasien, c.diskon
         FROM akun_non_pelayanan a, cara_bayar c, pendapatan_kasir d
         WHERE a.id_pelayanan = d.id_pelayanan and c.id_cara_bayar='$jenis_klaim' and c.id_cara_bayar=a.cara_bayar and a.kode_akun ='704.02.421'
         and d.tgl_verifikasi like '%$tgl%' 
 
         order by date(tgl_keluar),pasien asc
         ")->result();
        }
    }

    public function jumlah_pasien_per_poli($alias_poli, $jenis_kelamin)
    {
        $poli_codes = array(
            'anak' => 'E00RX703',
            'paru' => 'ZX2016T39',
            'dalam' => '24QRNLX29R',
            'umum' => 'MWK205D30K',
            'obgyn' => 'HLGI4176K8'
        );
        if (array_key_exists($alias_poli, $poli_codes)) {
            $id_poli = $poli_codes[$alias_poli];
            $this->db->select('COUNT(DISTINCT p.id_pelayanan) as jumlah_pasien');
            $this->db->from('pelayanan p');
            $this->db->join('history_pelayanan hp', 'p.id_pelayanan = hp.id_pelayanan', 'inner');
            $this->db->join('list_poli lp', 'hp.nama_poli = lp.id_list_poli', 'inner');
            $this->db->join('pasien_TBC pt', 'p.id_pelayanan = pt.id_pelayanan', 'inner');

            // Filter by poli and jenis_kelamin
            $this->db->where('lp.id_list_poli', $id_poli);
            $this->db->where('pt.jenis_kelamin', $jenis_kelamin);

            $query = $this->db->get();
            return $query->row()->jumlah_pasien;
        }
        return 0;
    }

    public function jumlah_skrining($alias_poli, $jenis_kelamin)
    {
        $poli_codes = array(
            'anak' => 'E00RX703',
            'paru' => 'ZX2016T39',
            'dalam' => '24QRNLX29R',
            'umum' => 'MWK205D30K',
            'obgyn' => 'HLGI4176K8'
        );
        if (array_key_exists($alias_poli, $poli_codes)) {
            $id_poli = $poli_codes[$alias_poli];

            $this->db->select("COUNT(id_pasien) as jumlah_skrining");
            $this->db->from("pasien_TBC");
            $this->db->where("id_poli", $id_poli);
            $this->db->where("jenis_kelamin", $jenis_kelamin);

            $query = $this->db->get();
            return $query->row()->jumlah_skrining;
        }
        return 0;
    }

    public function jumlah_terduga_per_poli($alias_poli, $jenis_kelamin)
    {
        // Membuat map dari alias ke kode poli yang sebenarnya
        $kode_poli_map = array(
            'anak' => 'E00RX703',
            'paru' => 'ZX2016T39',
            'dalam' => '24QRNLX29R',
            'umum' => 'MWK205D30K',
            'obgyn' => 'HLGI4176K8'
        );

        // Mengecek apakah alias poli yang diberikan ada dalam map
        if (array_key_exists($alias_poli, $kode_poli_map)) {
            $id_poli = $kode_poli_map[$alias_poli];

            // Ambil jumlah terduga hanya untuk kode poli yang diinginkan dan berdasarkan jenis kelamin
            $this->db->select("COUNT(pt.id_pasien) as jumlah_terduga");
            $this->db->from("pasien_TBC pt");
            $this->db->join("list_poli lp", "pt.id_poli = lp.id_list_poli", "inner");
            $this->db->where("pt.keterangan", "terduga TBC");
            $this->db->where("lp.id_list_poli", $id_poli);
            $this->db->where("pt.jenis_kelamin", $jenis_kelamin);

            $query = $this->db->get();

            // Simpan jumlah terduga untuk poli yang diproses dalam array hasil
            return $query->row()->jumlah_terduga;
        } else {
            // Jika alias poli yang diberikan tidak ada dalam map, kembalikan pesan error atau nilai default
            return "Alias poli tidak valid.";
        }
    }

    public function SelectRekapBche($first_date, $second_date)
    {
        $this->db->select('p.tgl_masuk');
        $this->db->from('pelayanan p,pasien_TBC tb');
        $this->db->where('p.id_pelayanan = tb.id_pelayanan');
        $this->db->where('p.tgl_masuk >=', $first_date);
        $this->db->where('p.tgl_masuk <=', $second_date);

        return $this->db->get()->result();
    }
}
=======
<?php

class M_Jurnal_keuangan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    ///////Tampil laporan jurnal//////////////////////////////

    public function SelectLaporanRajal_pasien($first_date, $second_date) ////pasien tunai
    {
        if ($first_date != '' && $second_date != '') {
            return $this->db->query("SELECT * FROM(SELECT l.nama_panjang jenis_pelayanan ,'PENDAPATAN' as keterangan, c.nama cara_bayar, sum(a.total_akun) total_akun, p.tgl_keluar,p.id_pasien no_rm,p.id_pelayanan,ps.nama pasien
                FROM akun_tindakan a, pelayanan p, cara_bayar c,pasien ps,list_poli l
                WHERE ps.no_rm = p.id_pasien and a.id_pelayanan=p.id_pelayanan and a.id_poli = l.id_list_poli  and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar  
                and c.jenis='UMUM' and (DATE(p.tgl_keluar) BETWEEN '$first_date' and '$second_date') and a.status = 0 
                and p.id_pelayanan not in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
                -- and p.id_pelayanan not in  (select id_pelayanan from pendapatan_kasir where status = 0) 
                group by id_pelayanan
                having total_akun !=0
                ) as rajal_tunai
                
                UNION ALL

                SELECT * FROM ( SELECT g.poli jenis_pelayanan, CONCAT('DEPOSITE ', g.keterangan) keterangan, b.nama_bank as cara_bayar,(g.total) total_akun,g.tgl_input tgl_keluar,g.no_rm,g.id_pelayanan,g.pasien  from (
                    SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, l.nama_panjang poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
                    FROM pelayanan p, history_pelayanan h, pasien ps, list_poli l, staff s,pendapatan_kasir d
                    WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and h.nama_poli=l.id_list_poli and d.id_pelayanan=p.id_pelayanan 
                    and (DATE(d.tgl_verifikasi) BETWEEN '$first_date' and '$second_date')  and p.status=1 and h.status=1  
                    and p.cara_bayar = '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status = 1)
                    and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ugd where status = 1) and d.total_bayar != 0 and d.status=1 and d.no_jurnal_deposite is null
                    and (p.tgl_keluar is null or date(d.tgl_verifikasi) != date(p.tgl_keluar))
                    
                    UNION ALL
                    SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, 'UGD' poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
                    FROM pelayanan p, history_pelayanan_ugd h, pasien ps, staff s,pendapatan_kasir d
                    WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
                    and (DATE(d.tgl_verifikasi) BETWEEN '$first_date' and '$second_date')  and p.status=1 and h.status=1 
                    and p.cara_bayar = '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) and d.total_bayar != 0 and d.status=1 and d.no_jurnal_deposite is null
                    and (p.tgl_keluar is null or date(d.tgl_verifikasi) != date(p.tgl_keluar))
                    
                    ORDER by pasien asc
                ) as g
                    left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
                    as b on g.id_pendapatan = b.id_pendapatan
                    group by g.id_pendapatan
                    -- group by g.id_pelayanan
                ) as deposite_rajal
                
                UNION ALL

                SELECT * FROM ( SELECT g.poli jenis_pelayanan, CONCAT('SELISIH ', g.keterangan) keterangan ,b.nama_bank as cara_bayar,(g.total) total_akun,g.tgl_input tgl_keluar,g.no_rm,g.id_pelayanan,g.pasien  from (
                    SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, l.nama_panjang poli, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
                    FROM pelayanan p, history_pelayanan h, pasien ps, list_poli l, staff s,pendapatan_kasir d
                    WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and h.nama_poli=l.id_list_poli and d.id_pelayanan=p.id_pelayanan 
                    and (DATE(d.tgl_verifikasi) BETWEEN '$first_date' and '$second_date')  and p.status=1 and h.status=1 
                    and p.cara_bayar != '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status = 1)
                    and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ugd where status = 1) and d.selisih != 0 and d.status=1 and d.status_jurnal =0
                    and d.tipe ='SELISIH'
                    -- and p.status_rawat != 'selesai'
                    UNION ALL
                    SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, 'UGD' poli, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
                    FROM pelayanan p, history_pelayanan_ugd h, pasien ps, staff s,pendapatan_kasir d
                    WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
                    and (DATE(d.tgl_verifikasi) BETWEEN '$first_date' and '$second_date')  and p.status=1 and h.status=1 
                    and p.cara_bayar != '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap ) and d.selisih != 0 and d.status=1 and d.status_jurnal =0
                    and d.tipe ='SELISIH'
                    -- and p.status_rawat != 'selesai'
                    
                    ORDER by pasien asc
                ) as g
                    left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
                    as b on g.id_pendapatan = b.id_pendapatan
                    group by g.id_pendapatan
                    -- group by g.id_pelayanan
                ) as deposite_rajal_selisih

                UNION ALL

                SELECT jenis_pelayanan ,'PENDAPATAN' as keterangan, 'BAYAR SENDIRI/UMUM' as cara_bayar, total_akun, tgl_keluar,'' as no_rm,'' as id_pelayanan,pasien FROM(
                    SELECT a.id_poli jenis_pelayanan,sum(a.total_akun) total_akun, d.tgl_verifikasi tgl_keluar,a.nama_pasien pasien
                    FROM akun_non_pelayanan a, pendapatan_kasir d
                    WHERE a.id_pelayanan = d.id_pelayanan and d.keterangan != 'asuransi'
                    and (DATE(d.tgl_verifikasi) BETWEEN '$first_date' and '$second_date') and a.status = 0 and d.status =1 and a.kode_akun !='704.02.421'
                    group by a.id_poli, a.id_pelayanan
                ) as non_pelayanan

                

                order by date(tgl_keluar),pasien asc
                ")->result();
        } else {
            $tgl = date("Y-m-d");
            return $this->db->query(" SELECT * FROM(SELECT l.nama_panjang jenis_pelayanan ,'PENDAPATAN' as keterangan,c.nama cara_bayar, sum(a.total_akun) total_akun, p.tgl_keluar,p.id_pasien no_rm,p.id_pelayanan,ps.nama pasien
                FROM akun_tindakan a, pelayanan p, cara_bayar c,pasien ps, list_poli l
                WHERE ps.no_rm = p.id_pasien and a.id_pelayanan=p.id_pelayanan and a.id_poli = l.id_list_poli  and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar  and c.jenis='UMUM' 
                and p.tgl_keluar like '%$tgl%' and a.status = 0 and p.id_pelayanan not in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
                group by id_pelayanan
                having total_akun !=0
                ) as rajal_tunai

                UNION ALL

                SELECT * FROM ( SELECT g.poli jenis_pelayanan, CONCAT('DEPOSITE ', g.keterangan) keterangan,b.nama_bank as cara_bayar,(g.total) total_akun,g.tgl_input tgl_keluar,g.no_rm,g.id_pelayanan,g.pasien  from (
                    
                    SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, l.nama_panjang poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
                    FROM pelayanan p, history_pelayanan h, pasien ps, list_poli l, staff s,pendapatan_kasir d
                    WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and h.nama_poli=l.id_list_poli and d.id_pelayanan=p.id_pelayanan 
                    and d.tgl_verifikasi like '%$tgl%'  and p.status=1 and h.status=1 
                    and p.cara_bayar = '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status = 1)
                    and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ugd where status = 1) and d.total_bayar != 0 and d.status=1 and d.status_jurnal =0
                    and p.status_rawat != 'selesai'

                    UNION ALL
                    SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, 'UGD' poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
                    FROM pelayanan p, history_pelayanan_ugd h, pasien ps, staff s,pendapatan_kasir d
                    WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
                    and d.tgl_verifikasi like '%$tgl%'  and p.status=1 and h.status=1 
                    and p.cara_bayar = '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap ) and d.total_bayar != 0 and d.status=1 and d.status_jurnal =0
                    and p.status_rawat != 'selesai'
                ) as g
                    left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
                    as b on g.id_pendapatan = b.id_pendapatan
                    group by g.id_pendapatan

                    -- group by g.id_pelayanan
                ) as deposite_rajal

                UNION ALL

            SELECT * FROM ( SELECT g.poli jenis_pelayanan, CONCAT('SELISIH ', g.keterangan) keterangan,b.nama_bank as cara_bayar,(g.total) total_akun,g.tgl_input tgl_keluar,g.no_rm,g.id_pelayanan,g.pasien  from (
                SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, l.nama_panjang poli, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
                FROM pelayanan p, history_pelayanan h, pasien ps, list_poli l, staff s,pendapatan_kasir d
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and h.nama_poli=l.id_list_poli and d.id_pelayanan=p.id_pelayanan 
                and (DATE(d.tgl_verifikasi) = '$tgl')  and p.status=1 and h.status=1 
                and p.cara_bayar != '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status = 1)
                and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ugd where status = 1) and d.selisih != 0 and d.status=1 and d.status_jurnal =0
                and d.tipe ='SELISIH'
                -- and p.status_rawat != 'selesai'
                UNION ALL
                SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, 'UGD' poli, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
                FROM pelayanan p, history_pelayanan_ugd h, pasien ps, staff s,pendapatan_kasir d
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
                and (DATE(d.tgl_verifikasi) = '$tgl')  and p.status=1 and h.status=1 
                and p.cara_bayar != '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap ) and d.selisih != 0 and d.status=1 and d.status_jurnal =0
                and d.tipe ='SELISIH'
                -- and p.status_rawat != 'selesai'
                
                ORDER by pasien asc
                ) as g
                    left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
                    as b on g.id_pendapatan = b.id_pendapatan
                    group by g.id_pendapatan
                    -- group by g.id_pelayanan
            ) as deposite_rajal_selisih

                UNION ALL

                SELECT jenis_pelayanan ,'PENDAPATAN' as keterangan, 'BAYAR SENDIRI/UMUM' as cara_bayar, total_akun, tgl_keluar,'' as no_rm,'' as id_pelayanan,pasien FROM(
                    SELECT a.id_poli jenis_pelayanan,sum(a.total_akun) total_akun, d.tgl_verifikasi tgl_keluar,a.nama_pasien pasien
                    FROM akun_non_pelayanan a, pendapatan_kasir d
                    WHERE a.id_pelayanan = d.id_pelayanan and d.keterangan != 'asuransi'
                    and d.tgl_verifikasi like '%$tgl%' and a.status = 0 and d.status =1
                    group by a.id_poli, a.id_pelayanan
                ) as non_pelayanan
               
                order by date(tgl_keluar),pasien asc
        ")->result();
        }
    }

    ////////////////////////RAJAL NON TUNAI////////////////////////////////////////////////////
    public function SelectLaporanRajalNonTunai_pasien($first_date, $second_date, $jenis_klaim) ////pasien non tunai
    {
        if ($first_date != '' && $second_date != '') {
            return $this->db->query("SELECT * FROM (SELECT lp.nama_panjang jenis_pelayanan, c.nama cara_bayar, sum(a.total_akun) total_akun, p.tgl_keluar,p.id_pasien no_rm,p.id_pelayanan,ps.nama pasien,c.diskon
                FROM akun_tindakan a, pelayanan p, cara_bayar c, list_poli lp,pasien ps
                WHERE p.id_pasien = ps.no_rm and a.id_pelayanan=p.id_pelayanan  and c.id_cara_bayar=a.cara_bayar and a.id_poli=lp.id_list_poli 
                and c.id_cara_bayar='$jenis_klaim' and (DATE(p.tgl_keluar) BETWEEN '$first_date' and '$second_date') and a.status = 0 and p.id_pelayanan not in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
        
                group by id_pelayanan
                ) as rajal_nontunai
                
                UNION ALL
                SELECT 'OBAT BEBAS' jenis_pelayanan , cara_bayar, total_akun, tgl_keluar,'' no_rm,id_pelayanan,pasien,diskon
                from(
                SELECT c.nama cara_bayar, sum(a.total_akun) total_akun, o.tanggal tgl_keluar, a.nama_pasien pasien, a.id_pelayanan,c.diskon
                FROM akun_non_pelayanan a, cara_bayar c, obat_bebas o
                WHERE a.id_pelayanan = o.id_obat_bebas and c.id_cara_bayar='$jenis_klaim' and c.id_cara_bayar=a.cara_bayar and a.kode_akun !='704.02.421'
                and a.status =0
                and (DATE(o.tanggal) BETWEEN '$first_date' and '$second_date')
                group by id_pelayanan

                ) as bebas_rajal

                UNION ALL
                SELECT jenis_pelayanan ,cara_bayar, total_akun, tgl_keluar,'' no_rm,id_pelayanan,pasien,diskon FROM (
                SELECT a.id_poli jenis_pelayanan ,c.nama cara_bayar, sum(a.total_akun) total_akun, m.tanggal tgl_keluar,a.nama_pasien pasien,a.id_pelayanan,c.diskon
                FROM akun_non_pelayanan a, cara_bayar c,mcu m
                WHERE a.id_pelayanan = m.id_mcu and c.id_cara_bayar='$jenis_klaim' and c.id_cara_bayar=a.cara_bayar and a.id_poli ='MCU'
                and a.status =0
                and (DATE(m.tanggal) BETWEEN '$first_date' and '$second_date')
                group by m.id_mcu
                ) as mcu
                UNION ALL
                SELECT jenis_pelayanan ,cara_bayar, total_akun, tgl_keluar,'' no_rm,id_pelayanan,pasien,diskon FROM (
                SELECT a.id_poli jenis_pelayanan ,c.nama cara_bayar, sum(a.total_akun) total_akun, m.tanggal tgl_keluar,a.nama_pasien pasien,a.id_pelayanan,c.diskon
                FROM akun_non_pelayanan a, cara_bayar c,homecare m
                WHERE a.id_pelayanan = m.id_pasien and c.id_cara_bayar='$jenis_klaim' and c.id_cara_bayar=a.cara_bayar and a.id_poli ='HOMECARE'
                and a.status =0
                and (DATE(m.tanggal) BETWEEN '$first_date' and '$second_date')
                group by m.id_pasien
                ) as mcu

                order by date(tgl_keluar),pasien asc
        ")->result();
        } else {
            $tgl = date("Y-m-d");
            return $this->db->query("SELECT * FROM (SELECT lp.nama_panjang jenis_pelayanan, c.nama cara_bayar, sum(a.total_akun) total_akun, p.tgl_keluar,p.id_pasien no_rm,p.id_pelayanan,ps.nama pasien,c.diskon
                FROM akun_tindakan a, pelayanan p, cara_bayar c, list_poli lp,pasien ps
                WHERE p.id_pasien = ps.no_rm and a.id_pelayanan=p.id_pelayanan  and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar and a.id_poli=lp.id_list_poli 
                and c.id_cara_bayar='$jenis_klaim' and p.tgl_keluar like '%$tgl%' and a.status = 0 and p.id_pelayanan not in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
                
                group by id_pelayanan
                ) as rajal_nontunai
                UNION ALL
                SELECT 'OBAT BEBAS' jenis_pelayanan ,c.nama cara_bayar, sum(a.total_akun) total_akun, o.tanggal tgl_keluar,'' no_rm,a.id_pelayanan,a.nama_pasien pasien,c.diskon
                FROM akun_non_pelayanan a, cara_bayar c, obat_bebas o
                WHERE a.id_pelayanan = o.id_obat_bebas and c.id_cara_bayar='$jenis_klaim' and c.id_cara_bayar=a.cara_bayar and a.kode_akun !='704.02.421'
                and a.status =0
                and o.tanggal like '%$tgl%' 

                UNION ALL
                SELECT a.id_poli jenis_pelayanan ,c.nama cara_bayar, sum(a.total_akun) total_akun, m.tgl_keluar,'' no_rm,a.id_pelayanan,a.nama_pasien pasien,c.diskon
                FROM akun_non_pelayanan a, cara_bayar c,mcu m
                WHERE a.id_pelayanan = m.id_mcu and c.id_cara_bayar='$jenis_klaim' and c.id_cara_bayar=a.cara_bayar and a.id_poli ='MCU'
                and a.status =0
                and m.tanggal like '%$tgl%' 
                group by m.id_mcu

               

                order by date(tgl_keluar),pasien asc
        ")->result();
        }
    }


    public function caraBayar_RajalNonTunai()
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT * from (SELECT c.*
        FROM akun_tindakan a,cara_bayar c
        WHERE c.id_cara_bayar=a.cara_bayar and a.id_pelayanan not in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
        UNION ALL
        SELECT c.*
        FROM akun_non_pelayanan a, cara_bayar c
        WHERE c.id_cara_bayar=a.cara_bayar and (a.id_poli ='MCU' or a.id_poli ='HOMECARE')
        UNION ALL
        SELECT c.*
        FROM akun_non_pelayanan a, cara_bayar c
        WHERE c.id_cara_bayar=a.cara_bayar and a.kode_akun ='704.01.420'
        ) as gabung
        group by id_cara_bayar
        having jenis!='UMUM'
        order by nama
       ")->result();
    }
    ///////Tampil laporan jurnal ranap//////////////////////////////
    public function SelectLaporanRanap_pasien($first_date, $second_date) //pasien
    {
        if ($first_date != '' && $second_date != '') {
            return $this->db->query("SELECT * FROM (
                SELECT 'RANAP' jenis_pelayanan ,'PENDAPATAN' as keterangan,c.nama cara_bayar, sum(a.total_akun) total_akun, p.tgl_keluar,p.id_pasien no_rm,p.id_pelayanan,ps.nama pasien
                FROM akun_tindakan a, pelayanan p, cara_bayar c,pasien ps, history_pelayanan_ranap h
                WHERE ps.no_rm = p.id_pasien and a.id_pelayanan=p.id_pelayanan  and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar  and c.jenis='UMUM' 
                and (DATE(p.tgl_keluar) BETWEEN '$first_date' and '$second_date') and a.status = 0 and p.id_pelayanan = h.id_pelayanan and h.status = 1 and p.status =1
                group by id_pelayanan
                ) as ranap_tunai
                UNION ALL
                SELECT * FROM (SELECT 'RANAP' jenis_pelayanan , CONCAT('DEPOSITE ', g.keterangan) keterangan , b.nama_bank as cara_bayar,(g.total) total_akun,g.tgl_input tgl_keluar,g.no_rm,g.id_pelayanan,g.pasien from (
                SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, (d.total_bayar) total,d.keterangan,d.id_pendapatan,d.id_pelayanan
                FROM pelayanan p, history_pelayanan_ranap h, pasien ps,pendapatan_kasir d
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm  and d.id_pelayanan=p.id_pelayanan 
                and p.cara_bayar = '42' 
                and (DATE(d.tgl_verifikasi) BETWEEN '$first_date' and '$second_date')  and p.status=1 and h.status=1  
                and (DATE(p.tgl_keluar) not BETWEEN '$first_date' and '$second_date' or p.tgl_keluar is null)
                and d.total_bayar != 0 and d.status=1 and d.no_jurnal_deposite is null
                -- and d.tgl_pulang is null
                and (d.tgl_pulang is null or (DATE(d.tgl_verifikasi) != DATE(d.tgl_pulang)))
                ) as g
                    left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
                    as b on g.id_pendapatan = b.id_pendapatan
                    group by g.id_pendapatan
                ) as deposite_ranap
                UNION ALL
                SELECT * FROM (SELECT 'RANAP' jenis_pelayanan , CONCAT('SELISIH ', g.keterangan) keterangan, b.nama_bank as cara_bayar,(g.total) total_akun,g.tgl_input tgl_keluar,g.no_rm,g.id_pelayanan,g.pasien from (
                SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, (d.selisih) total,d.keterangan,d.id_pendapatan,d.id_pelayanan
                FROM pelayanan p, history_pelayanan_ranap h, pasien ps,pendapatan_kasir d
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm  and d.id_pelayanan=p.id_pelayanan 
                and p.cara_bayar != '42' and (DATE(d.tgl_verifikasi) BETWEEN '$first_date' and '$second_date') and p.status=1 and h.status=1  and d.selisih != 0 and d.status=1 and d.status_jurnal =0
                and d.tipe='SELISIH'
                ) as g
                    left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
                    as b on g.id_pendapatan = b.id_pendapatan
                    group by g.id_pendapatan
                ) as deposite_ranap_selisih

                UNION ALL
                SELECT 'OBAT BEBAS' jenis_pelayanan ,'PENDAPATAN' as keterangan, c.nama cara_bayar, (a.total_akun) total_akun, a.tgl_masuk tgl_keluar,'' no_rm,'' id_pelayanan,a.nama_pasien pasien
                FROM akun_non_pelayanan a, cara_bayar c, pendapatan_kasir d
                WHERE a.id_pelayanan = d.id_pelayanan and c.jenis='UMUM' and c.id_cara_bayar=a.cara_bayar and a.kode_akun ='704.02.421' and a.status = 0 and d.status =1
                and (DATE(d.tgl_verifikasi) BETWEEN '$first_date' and '$second_date')

                order by date(tgl_keluar),pasien asc
        ")->result();
        } else {
            $tgl = date("Y-m-d");
            return $this->db->query("SELECT 'RANAP' jenis_pelayanan ,'PENDAPATAN' as keterangan,c.nama cara_bayar, sum(a.total_akun) total_akun, p.tgl_keluar,p.id_pasien no_rm,p.id_pelayanan,ps.nama pasien
                FROM akun_tindakan a, pelayanan p, cara_bayar c,pasien ps, history_pelayanan_ranap h
                WHERE ps.no_rm = p.id_pasien and a.id_pelayanan=p.id_pelayanan  and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar  and c.jenis='UMUM' 
                and p.tgl_keluar like '%$tgl%' and a.status = 0 and p.id_pelayanan = h.id_pelayanan and h.status = 1
                group by id_pelayanan
                
                UNION ALL
                SELECT * FROM (SELECT 'RANAP' jenis_pelayanan , CONCAT('DEPOSITE ', g.keterangan) keterangan, b.nama_bank as cara_bayar,(g.total) total_akun,g.tgl_input tgl_keluar,g.no_rm,g.id_pelayanan,g.pasien 
                from (
                    SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, (d.total_bayar) total,d.keterangan,d.id_pendapatan,d.id_pelayanan
                    FROM pelayanan p, history_pelayanan_ranap h, pasien ps, pendapatan_kasir d
                    WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm  and d.id_pelayanan=p.id_pelayanan 
                    and p.cara_bayar = '42' and d.tgl_verifikasi like '%$tgl%' and p.status=1 and h.status=1  and d.total_bayar != 0 and d.status=1 and d.status_jurnal =0
                    and p.status_rawat != 'selesai'
                    ORDER by pasien asc
                ) as g
                left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
                as b on g.id_pendapatan = b.id_pendapatan
                group by g.id_pendapatan
                ) as gabung

                UNION ALL
                SELECT * FROM (SELECT 'RANAP' jenis_pelayanan , CONCAT('SELISIH ', g.keterangan) keterangan, b.nama_bank as cara_bayar,(g.total) total_akun,g.tgl_input tgl_keluar,g.no_rm,g.id_pelayanan,g.pasien from (
                SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, (d.selisih) total,d.keterangan,d.id_pendapatan,d.id_pelayanan
                FROM pelayanan p, history_pelayanan_ranap h, pasien ps,pendapatan_kasir d
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm  and d.id_pelayanan=p.id_pelayanan 
                and p.cara_bayar != '42' and (DATE(d.tgl_verifikasi) = '$tgl') and p.status=1 and h.status=1  and d.selisih != 0 and d.status=1 and d.status_jurnal =0
                and d.tipe='SELISIH'
                ) as g
                    left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
                    as b on g.id_pendapatan = b.id_pendapatan
                    group by g.id_pendapatan
                ) as deposite_ranap_selisih

                UNION ALL
                SELECT 'OBAT BEBAS' jenis_pelayanan ,'PENDAPATAN' as keterangan, c.nama cara_bayar, (a.total_akun) total_akun, a.tgl_masuk tgl_keluar,'' no_rm,'' id_pelayanan,a.nama_pasien pasien
                FROM akun_non_pelayanan a, cara_bayar c, pendapatan_kasir d
                WHERE a.id_pelayanan = d.id_pelayanan and c.jenis='UMUM' and c.id_cara_bayar=a.cara_bayar and a.kode_akun ='704.02.421' and a.status = 0 and d.status =1
                and d.tgl_verifikasi like '%$tgl%' 

                order by date(tgl_keluar),pasien asc
                ")->result();
        }
    }


    public function caraBayar_RanapNonTunai()
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT * FROM (SELECT c.*
        FROM akun_tindakan a,cara_bayar c
        WHERE c.id_cara_bayar=a.cara_bayar and a.id_pelayanan in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
        UNION ALL
        SELECT c.*
        FROM akun_non_pelayanan a, cara_bayar c
        WHERE c.id_cara_bayar=a.cara_bayar and a.kode_akun ='704.02.421'
       
        ) as gabung
        group by id_cara_bayar
        having jenis!='UMUM'
        order by nama

       ")->result();
    }
    //////////////NO dokumen/////////////////////
    public function selectNoDokumen($jenis)
    {
        date_default_timezone_set('Asia/Jakarta');

        $this->db->select('MAX(no_index) max');
        $this->db->from('jurnal_pendapatan');
        $this->db->where('jenis', $jenis);
        return $this->db->get()->row();
    }

    public function selectNoDokumenPau($kode, $tgl)
    {
        date_default_timezone_set('Asia/Jakarta');
        if ($tgl == "") {
            $tgl = date("Y-m");
        } else {
            $tgl = date("Y-m", strtotime($tgl));
        }
        $this->db->select('MAX(no_index) max');
        $this->db->from('dokumen_jurnal');
        $this->db->where('kode', $kode);
        $this->db->like('tgl', $tgl);

        return $this->db->get()->row();
    }

    ////////////////Jurnal Bank\\\\\\\\\\\\\\\\\\\

    public function SelectJurnalBank($first_date, $second_date)
    {
        $tgl = date("Y-m-d");

        $this->db->select('j.*, d.nama_bank,p.jenis_pembayaran');
        $this->db->from('jurnal_cara_pembayaran j, daftar_bank d,pendapatan_bank p');
        $this->db->where('j.cara_klaim = d.id_bank');
        $this->db->where('j.id_jurnal = p.id_pelayanan');
        // $this->db->where('j.verifikasi = 1');
        $this->db->where('j.status = 0');
        $this->db->where('SUBSTRING_INDEX(j.rekening, ".", 1) = 114');
        $this->db->group_by('j.id_jurnal_bayar');
        if ($first_date != '' || $second_date != '') {
            $this->db->where('tgl >=', $first_date);
            $this->db->where('tgl <=', $second_date);
        } else {
            $this->db->like('tgl', $tgl);
        }
        $this->db->order_by('tgl desc');
        return $this->db->get()->result();
    }
    public function getForJurnalBank($id)
    {
        $tgl = date("Y-m-d");

        $this->db->select('j.*, p.jenis_pembayaran');
        $this->db->from('jurnal_cara_pembayaran j,pendapatan_bank p');
        $this->db->where('j.id_jurnal = p.id_pelayanan');
        $this->db->where('j.id_jurnal_bayar', $id);
        $this->db->group_by('j.id_jurnal_bayar');
        return $this->db->get()->row();
    }
    ////////////////Jurnal PAU\\\\\\\\\\\\\\\\\\\

    public function SelectJurnalPAU($first_date, $second_date)
    {
        $tgl = date("Y-m-d");

        $this->db->select('j.*');
        $this->db->from('jurnal_cara_pembayaran j');
        $this->db->where('j.status = 0');
        $this->db->where('j.ket_bayar', 'non tunai');
        if ($first_date != '' || $second_date != '') {
            $this->db->where('tgl >=', $first_date);
            $this->db->where('tgl <=', $second_date);
        } else {
            $this->db->like('tgl', $tgl);
        }

        return $this->db->get()->result();
    }

    ///////////////////////////////verifikasi jurnal pendapatan//////////////////////////////////////
    public function SelectJurnalPendapatan($first_date, $second_date)
    {
        $auth = $this->session->userdata("data_auth");
        $tgl = date("Y-m");
        if ($auth->tipe == 'vp finance') {
            if ($first_date != '' && $second_date != '') {
                return $this->db->query("SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk from jurnal_cara_pembayaran where tgl >= '$first_date' and tgl<='$second_date' and verifikasi =0 group by no_jurnal
            UNION ALL
            SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk from jurnal_piutang where tgl >= '$first_date' and tgl<='$second_date' and verifikasi =0 group by no_jurnal
            ")->result();
            } else {
                return $this->db->query("SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk,ket_bayar from jurnal_cara_pembayaran where  verifikasi =0 and tgl like '$tgl%' group by no_jurnal
            UNION ALL
            SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk,ket_bayar from jurnal_piutang where  verifikasi =0 and tgl like '$tgl%' group by no_jurnal
            ")->result();
            }
        } else {
            if ($first_date != '' && $second_date != '') {
                return $this->db->query("SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk from jurnal_cara_pembayaran where tgl >= '$first_date' and tgl<='$second_date' and verifikasi =0 and no_jurnal like'%GL-301%' group by no_jurnal
           
            ")->result();
            } else {
                return $this->db->query("SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk,ket_bayar from jurnal_cara_pembayaran where  verifikasi =0 and tgl like '$tgl%' and no_jurnal like'%GL-301%' group by no_jurnal
           
            ")->result();
            }
        }
    }
    public function SelectJurnalPiutang($first_date, $second_date, $jenis)
    {
        $tgl = date("Y-m-d");
        if ($first_date != '' && $second_date != '') {
            if ($jenis == 'PYMHD') {
                return $this->db->query("SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk, verifikasi from jurnal_cara_pembayaran where tgl >= '$first_date' and tgl<='$second_date' and no_jurnal like'%GL-304%' group by no_jurnal, verifikasi
            ")->result();
            } else {
                return $this->db->query(" SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk, verifikasi from jurnal_piutang where tgl >= '$first_date' and tgl<='$second_date' group by no_jurnal, verifikasi
                ")->result();
            }
        } else {
            if ($jenis == 'PYMHD') {
                return $this->db->query("SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk,ket_bayar, verifikasi from jurnal_cara_pembayaran where tgl like '$tgl%' and no_jurnal like'%GL-304%' group by no_jurnal, verifikasi
           ")->result();
            } else {
                return $this->db->query(" SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk,ket_bayar, verifikasi from jurnal_piutang where tgl like '$tgl%' group by no_jurnal, verifikasi
                ")->result();
            }
        }
    }

    ///////////////////////////////Laporan summary//////////////////////////////////////
    public function SelectLaporanSummary()
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT * FROM(SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk,ket_bayar 
        from jurnal_cara_pembayaran where tgl like '$tgl%'  and verifikasi =1 
        group by no_jurnal
        ) as a
        UNION ALL
        SELECT * FROM(
        SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk,ket_bayar 
        from jurnal_piutang where tgl like '$tgl%'  and verifikasi =1 
        group by no_jurnal
        ) as b")->result();
    }
    public function SelectRangeLaporanSummary($first_date, $second_date)
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT * FROM(SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk,ket_bayar 
        from jurnal_cara_pembayaran where tgl >= '$first_date' and tgl<='$second_date' and verifikasi =1 
        group by no_jurnal
        ) as a
        UNION ALL
        SELECT * FROM(
        SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk,ket_bayar 
        from jurnal_piutang where tgl >= '$first_date' and tgl<='$second_date' and verifikasi =1 
        group by no_jurnal
        ) as b
       ")->result();
    }
    public function getSummary($no_jurnal)
    {
        return $this->db->query("SELECT * FROM (
            SELECT * FROM (SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,sum(debet) debet, sum(kredit) kredit,no_jurnal, id_jurnal id_fk, '1' as urut 
            FROM jurnal_cara_pembayaran 
            where no_jurnal = '$no_jurnal' and rekening ='101.01.100'
            -- and id_jurnal in (select id_fk from jurnal_pendapatan where status = 1)

            group by deskripsi,rekening
            )as kas
            UNION ALL
    
            SELECT * FROM (SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,sum(debet) debet, sum(kredit) kredit,no_jurnal, id_jurnal id_fk, '1' as urut 
            FROM jurnal_cara_pembayaran 
            where no_jurnal = '$no_jurnal' and rekening !='101.01.100'
            -- and id_jurnal in (select id_fk from jurnal_pendapatan where status = 1)

            group by deskripsi,rekening,id_jurnal
            )as db
            
            union ALL
            SELECT * FROM(
            SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,sum(debet) debet, sum(kredit) kredit,no_jurnal, id_fk , '2' as urut 
            FROM jurnal_pendapatan
            where no_jurnal = '$no_jurnal'
            group by deskripsi,id_fk,rekening
            
            ) as kd
            
            ) as gabung

            UNION ALL 
            SELECT * from (SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,sum(debet) debet, sum(kredit) kredit,no_jurnal, id_jurnal id_fk, '1' as urut 
            FROM jurnal_piutang 
            where no_jurnal = '$no_jurnal'
            -- and id_jurnal in (select id_fk from jurnal_pendapatan where status = 1)

            group by deskripsi,rekening
            )as piutang
            order by rekening,urut
            ")->result_array();
    }

    public function getDetail($no_jurnal)
    {
        return $this->db->query("SELECT g.*,b.tgl_masuk,b.tgl_keluar,p.no_rm,p.nama from (
        SELECT id_pelayanan,no_jurnal, sum(total_bayar) total from pendapatan_kasir
        where status_jurnal =1 and no_jurnal = '$no_jurnal' and (no_jurnal = no_jurnal_deposite or no_jurnal_deposite is null)
        and tipe !='SELISIH'
        group by id_pelayanan
        ) as g, pelayanan b, pasien p
        where g.id_pelayanan = b.id_pelayanan and b.id_pasien = p.no_rm and b.status_rawat ='selesai'
        and b.cara_bayar = 42
        UNION ALL

        SELECT g.*,b.tgl_masuk,b.tgl_keluar,p.no_rm,p.nama from (
        SELECT id_pelayanan,no_jurnal_deposite no_jurnal, sum(total_bayar) total from pendapatan_kasir
        where status_jurnal =1 and no_jurnal_deposite = '$no_jurnal' and (no_jurnal != no_jurnal_deposite or no_jurnal is null)
        group by id_pelayanan
        ) as g, pelayanan b, pasien p
        where g.id_pelayanan = b.id_pelayanan and b.id_pasien = p.no_rm
        and b.cara_bayar = 42

        UNION ALL

        SELECT id_pelayanan,no_jurnal,  sum(total), tgl_masuk, tgl_keluar, '' as no_rm, nama from (
        SELECT a.id_pelayanan,a.no_jurnal, (a.total_akun) total, j.tgl tgl_masuk, j.tgl tgl_keluar, a.nama_pasien nama    
        from akun_non_pelayanan a, jurnal_cara_pembayaran j
        where a.no_jurnal = j.no_jurnal and a.no_jurnal = '$no_jurnal' and a.status = 1
        group by a.id_akun
        ) as a group by id_pelayanan


        UNION ALL

        SELECT * FROM(
        SELECT a.id_pelayanan,j.no_jurnal, sum(j.kredit) total, j.tgl tgl_masuk, j.tgl tgl_keluar,  p.no_rm, p.nama
        from pelayanan a,pasien p, jurnal_pendapatan j
        where a.id_pelayanan = j.id_fk and a.id_pasien = p.no_rm and j.id_fk in (SELECT id_pelayanan from pendapatan_kasir where tipe ='SELISIH')
        and a.cara_bayar != 42
        and j.no_jurnal = '$no_jurnal' and j.rekening ='403.01.000' 
        group by j.id_fk
        ) as d

        UNION ALL
        SELECT * FROM(
        SELECT a.id_pelayanan,j.no_jurnal, sum(j.kredit) total, j.tgl tgl_masuk, j.tgl tgl_keluar,  p.no_rm, p.nama
        from pelayanan a,pasien p, jurnal_pendapatan j
        where a.id_pelayanan = j.id_fk and a.id_pasien = p.no_rm
        and a.cara_bayar != 42
        and j.no_jurnal = '$no_jurnal'
        group by j.id_fk
        ) as e
        
        UNION ALL
        SELECT * FROM(
        SELECT a.id_pelayanan,j.no_jurnal, sum(j.total_akun) total, a.tgl_masuk, a.tgl_keluar,  p.no_rm, p.nama
        from pelayanan a,pasien p, akun_tindakan j
        where a.id_pelayanan = j.id_pelayanan and a.id_pasien = p.no_rm 
        and a.cara_bayar != 42
        and j.no_jurnal = '$no_jurnal'
        group by j.id_pelayanan
        ) as e
        UNION ALL
        SELECT * FROM(
        SELECT a.id_pelayanan,j.no_jurnal, sum(j.total_akun) total, a.tgl_masuk, a.tgl_keluar,  p.no_rm, p.nama
        from pelayanan a,pasien p, akun_tindakan j
        where a.id_pelayanan = j.id_pelayanan and a.id_pasien = p.no_rm 
        and a.cara_bayar != 42
        and j.no_jurnal in (select id_fk from jurnal_piutang where no_jurnal ='$no_jurnal')
        group by j.id_pelayanan
        ) as f

        

       order by tgl_masuk

        ")->result_array();
    }

    public function getDataJurnal($no_jurnal)
    {
        return $this->db->query("SELECT ifnull(sum(debet),0) debet,ifnull(sum(kredit),0) kredit,cara_klaim, jenis_jurnal, tgl,staff,staff_verifikasi,jk,pk,id_vendor
                                FROM jurnal_cara_pembayaran WHERE no_jurnal ='$no_jurnal' 
                                UNION ALL
                                SELECT  ifnull(sum(debet),0) debet,ifnull(sum(kredit),0) kredit,cara_klaim, jenis_jurnal,tgl,staff,staff_verifikasi,jk,pk,id_vendor
                                FROM jurnal_piutang WHERE no_jurnal ='$no_jurnal' and  cara_klaim != 'REDUKSI'
                                order by debet desc")->row();
    }
    public function get_data_kwitansi($no_jurnal)
    {
        return $this->db->query("SELECT * FROM(SELECT max(tgl_masuk) maxx, min(tgl_masuk) minn from (SELECT tgl_masuk,no_jurnal from (
           
            SELECT p.*,a.no_jurnal FROM akun_tindakan a,pelayanan p
            where a.id_pelayanan=p.id_pelayanan and a.status =1
            ) as gabung  
            group by id_pelayanan
        having no_jurnal = '$no_jurnal'
             ) as gabung1
             group by no_jurnal = '$no_jurnal') as a
             UNION ALL
        SELECT * FROM(SELECT max(tgl_masuk) maxx, min(tgl_masuk) minn from (SELECT tgl_masuk,no_jurnal from (   
           SELECT p.*,j.no_jurnal FROM akun_tindakan a,pelayanan p, jurnal_piutang j
           where a.id_pelayanan=p.id_pelayanan and a.status =1 and a.no_jurnal = j.id_fk
           ) as gabung  
           group by id_pelayanan
       having no_jurnal = '$no_jurnal'
            ) as gabung1
            group by no_jurnal = '$no_jurnal') as b
            UNION ALL
            SELECT * FROM(SELECT max(tgl_masuk) maxx, min(tgl_masuk) minn from (SELECT tgl_masuk,no_jurnal from (
           
           SELECT a.no_jurnal,a.id_pelayanan,a.tgl_masuk tgl_masuk FROM akun_non_pelayanan a,jurnal_cara_pembayaran j
           where a.no_jurnal = j.no_jurnal and a.status = 1
           ) as gabung  
           group by id_pelayanan
       having no_jurnal = '$no_jurnal'
            ) as gabung1
            group by no_jurnal = '$no_jurnal') as c
            UNION ALL
       SELECT * FROM(SELECT max(tgl_masuk) maxx, min(tgl_masuk) minn from (SELECT tgl_masuk,no_jurnal from (   
          SELECT j.no_jurnal,a.id_pelayanan,a.tgl_masuk tgl_masuk FROM akun_non_pelayanan a, jurnal_piutang j,jurnal_cara_pembayaran p
          where  a.status =1 and p.no_jurnal = j.id_fk and a.no_jurnal = p.no_jurnal
          ) as gabung  
          group by id_pelayanan
      having no_jurnal = '$no_jurnal'
           ) as gabung1
           group by no_jurnal = '$no_jurnal') as d
        ")->row();
    }

    public function SelectSummaryBank($first_date, $second_date)
    {
        $tgl = date("Y-m-d");

        $this->db->select('tgl,no_jurnal,sum(debet) total, staff,jk,id_fk');
        $this->db->from('jurnal_bank');
        if ($first_date != '' || $second_date != '') {
            $this->db->where('tgl >=', $first_date);
            $this->db->where('tgl <=', $second_date);
        } else {
            $this->db->like('tgl', $tgl);
        }
        $this->db->group_by('no_jurnal');
        return $this->db->get()->result();
    }
    public function getJurnalBank($no_jurnal, $id_fk)
    {
        $jenis = $this->db->get_where('jurnal_bank', ['id_fk' => $id_fk])->row()->keterangan;
        if ($jenis == 'transfer') {
            $query = $this->db->query("SELECT * FROM (
                SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,debet, kredit,no_jurnal, id_fk
                FROM jurnal_bank
                where no_jurnal = '$no_jurnal' 
               
                ) as gabung
                ")->result_array();
        } else {
            $query = $this->db->query("SELECT * FROM (
                SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,(debet) debet, (kredit) kredit,no_jurnal, id_fk
                FROM jurnal_bank
                where no_jurnal = '$no_jurnal' 
              
                ) as gabung
                ")->result_array();
        }
        return $query;
    }


    public function SelectLaporanRangeRekap($mulai, $akhir)
    {
        return $this->db->query("SELECT * from(
            select d.jk, d.rekening,d.deskripsi, d.no_jurnal, d.kredit, d.debet, d.lap, d.cj, d.jb, d.pk, d.des_rek,(j.tgl_verifikasi) tgl, d.staff,'-' as id_vendor,'' as kelompok_pelanggan, '' as no_reg
            from detail_jurnal_kas_bank d, jurnal_kas_bank j
            where d.no_jurnal = j.no_jurnal and DATE(j.tgl_verifikasi) >= '$mulai' and date(j.tgl_verifikasi) <='$akhir' and j.verifikasi='DITERIMA' and d.pk not in (select no_dokumen from pembayaran_piutang)
            -- group by d.id_detail
            ) as f
        UNION ALL
            SELECT * from(
            select d.jk, d.rekening,d.deskripsi, d.no_jurnal, d.kredit, d.debet, d.lap, d.cj, d.jb, d.pk, d.des_rek,(j.tgl_verifikasi) tgl, d.staff,p.id_vendor,c.kelompok_pelanggan, '' as no_reg
            from detail_jurnal_kas_bank d, jurnal_kas_bank j,pembayaran_piutang p, cara_bayar c
            where d.no_jurnal = j.no_jurnal and d.pk = p.no_dokumen and p.id_vendor = c.kode_pelanggan and DATE(j.tgl_verifikasi) >= '$mulai' and date(j.tgl_verifikasi) <='$akhir' and j.verifikasi='DITERIMA' and j.source ='PEMBAYARAN PIUTANG'
            -- group by d.id_detail
            ) as b
        UNION ALL
        SELECT * from(
            SELECT '10' as jk, rekening, deskripsi, no_jurnal, kredit, debet, lap, cj, jb, pk, des_rek, tgl, staff, id_vendor, kelompok_pelanggan  , no_reg
            FROM (
                SELECT *
                FROM (
                    SELECT jc.jk, jc.rekening, jc.deskripsi, jc.no_jurnal, sum(jc.kredit) kredit, sum(jc.debet) debet, jc.lap, jc.cj, jc.jb, jc.pk, jc.des_rek,date(jc.tgl) tgl, jc.staff, jc.id_vendor, c.kelompok_pelanggan, '1' as urut ,if(jc.rekening = '403.01.000',concat('RS01',jc.id_jurnal),'') as no_reg 
                    FROM jurnal_cara_pembayaran jc, cara_bayar c
                    where date(jc.tgl) >= '$mulai' and date(jc.tgl) <='$akhir' and verifikasi =1 
                    and jc.id_vendor = c.kode_pelanggan and jc.rekening ='101.01.100'
                    group by no_jurnal,deskripsi,rekening
                    )as kas
                UNION ALL
                SELECT *
                FROM (
                    SELECT jc.jk, jc.rekening, jc.deskripsi, jc.no_jurnal, sum(jc.kredit) kredit, sum(jc.debet) debet, jc.lap, jc.cj, jc.jb, jc.pk, jc.des_rek,date(jc.tgl) tgl, jc.staff, jc.id_vendor, c.kelompok_pelanggan, '1' as urut ,if(jc.rekening = '403.01.000',concat('RS01',jc.id_jurnal),'') as no_reg 
                    FROM jurnal_cara_pembayaran jc, cara_bayar c
                    where date(jc.tgl) >= '$mulai' and date(jc.tgl) <='$akhir' and verifikasi =1 
                    and jc.id_vendor = c.kode_pelanggan and jc.rekening !='101.01.100'
                    group by no_jurnal,deskripsi,rekening,id_jurnal
                    )as db
            
                UNION ALL

                SELECT * FROM(
                    SELECT jp.jk, jp.rekening, jp.deskripsi, jp.no_jurnal, sum(jp.kredit) kredit, sum(jp.debet) debet, jp.lap, jp.cj, jp.jb, jp.pk, jp.des_rek,date(jp.tgl) tgl, jp.staff, jp.id_vendor, c.kelompok_pelanggan, '2' as urut ,if(jp.rekening = '403.01.000',concat('RS01',jp.id_fk),'') as no_reg 
                    FROM jurnal_pendapatan jp, cara_bayar c
                    where date(tgl) >= '$mulai' and date(tgl) <='$akhir'
                    and jp.id_vendor = c.kode_pelanggan and jp.no_jurnal in(SELECT no_jurnal from jurnal_cara_pembayaran where verifikasi = 1)
                    group by no_jurnal,deskripsi,id_fk,rekening

                ) as kd
            
            ) as gabung
            order by rekening,urut
        
        ) as a
        

        UNION ALL
        SELECT * from(
        select jk, rekening,deskripsi, no_jurnal, kredit, debet, lap, cj, jb, pk, des_rek,date(tgl) tgl, staff,'-' as id_vendor,'' as kelompok_pelanggan, '' as no_reg
        from jurnal_pau
        where tgl >= '$mulai' and tgl <='$akhir'
        ) as d

        UNION ALL
        SELECT * from(
        select d.jk, d.rekening,d.deskripsi, d.no_jurnal, d.kredit, d.debet, d.lap, d.cj, d.jb, d.pk, d.des_rek,(j.tanggal) tgl, d.staff,d.id_vendor,'' as kelompok_pelanggan, '' as no_reg
        from detail_jurnal_rupa d, jurnal_rupa j
        where d.no_jurnal = j.no_jurnal and j.tanggal >= '$mulai' and j.tanggal <='$akhir' 
        and j.verifikasi='DITERIMA'
        ) as e
        
        UNION ALL
        
        SELECT * from(
        select jk, rekening,deskripsi, no_jurnal, kredit, debet, lap, cj, jb, pk, des_rek,date(tgl) tgl, staff,'-' as id_vendor,'' as kelompok_pelanggan, '' as no_reg
        from jurnal_material
        where tgl >= '$mulai' and tgl <='$akhir' and status='DITERIMA'
        ) as g

        UNION ALL
        SELECT * from(
        select jk, rekening,deskripsi, no_jurnal, kredit, debet, lap, cj, jb, pk, des_rek,date(tgl) tgl, staff,'-' as id_vendor,'' as kelompok_pelanggan, '' as no_reg
        from jurnal_material_persediaan
        where tgl >= '$mulai' and tgl <='$akhir' and status='DITERIMA'
        ) as h   

        UNION ALL
        SELECT jk,rekening,deskripsi,no_jurnal, kredit, debet, lap ,cj, jb, pk, des_rek,date(tgl) tgl,staff,id_vendor,'' as kelompok_pelanggan, '' as no_reg
        FROM (
             SELECT jk,staff,tgl, lap,pk,jb,cj,rekening,deskripsi,des_rek, debet, kredit,no_jurnal,id_vendor,'1' as urut 
            FROM jurnal_farmasi
            where jenis_jurnal = 'persediaan' and tgl >= '$mulai' and tgl <='$akhir' and no_jurnal in (SELECT no_jurnal from jurnal_pembayaran_farmasi where status='DITERIMA')
            
            union all
            SELECT * FROM (SELECT jk,staff ,tgl, lap,pk,jb,cj,rekening,deskripsi,des_rek,sum(debet) debet, sum(kredit) kredit,no_jurnal,id_vendor,'2' as urut
            FROM jurnal_pembayaran_farmasi 
            where jenis_jurnal = 'persediaan' and tgl >= '$mulai' and tgl <='$akhir' and status='DITERIMA'
            group by no_jurnal,rekening
            ) as pembayaran1
            order by no_jurnal, urut
           
        ) as gabung1
        
        UNION ALL

        SELECT jk,rekening,deskripsi,no_jurnal, kredit, debet, lap ,cj, jb, pk, des_rek,date(tgl) tgl,staff ,id_vendor ,'' as kelompok_pelanggan, '' as no_reg
        FROM (
                SELECT jk,des_rek,staff,tgl, lap,pk,jb,cj,rekening,deskripsi, debet, kredit,no_jurnal,id_vendor,'1' as urut 
               FROM jurnal_farmasi
               where jenis_jurnal = 'hutang' and tgl >= '$mulai' and tgl <='$akhir' and no_jurnal in (SELECT no_jurnal from jurnal_pembayaran_farmasi where status='DITERIMA')
               -- group by rekening
               union all
               SELECT * FROM (SELECT jk,des_rek,staff,tgl, lap,pk,jb,cj,rekening,deskripsi,sum(debet) debet, sum(kredit) kredit,no_jurnal,id_vendor,'2' as urut
               FROM jurnal_pembayaran_farmasi 
               where jenis_jurnal = 'hutang' and tgl >= '$mulai' and tgl <='$akhir' and status='DITERIMA'
               group by no_jurnal,rekening
               ) as pembayaran2
                order by no_jurnal,urut

        ) as gabung2

        UNION ALL  

        SELECT jk,rekening,deskripsi,no_jurnal, kredit, debet, lap ,cj, jb, pk, des_rek,date(tgl) tgl,staff ,'-' as id_vendor ,'' as kelompok_pelanggan , '' as no_reg
        FROM (
            SELECT jk,des_rek,staff,tgl, lap,pk,jb,cj,rekening,deskripsi, debet, kredit,no_jurnal,'1' as urut 
            FROM jurnal_penyusutan 
            where date(tgl) >= '$mulai' and date(tgl) <='$akhir'
            union ALL
            SELECT jk,des_rek,staff,tgl, lap,pk,jb,cj,rekening,deskripsi, debet, kredit,no_jurnal,'2' as urut 
            FROM jurnal_akumulasi_penyusutan
            where date(tgl) >= '$mulai' and date(tgl) <='$akhir'
        ) as gabung3

        UNION ALL
        SELECT * , '' as no_reg FROM(
        SELECT  jk,rekening,deskripsi,no_jurnal, kredit, debet, lap ,cj, jb, pk, des_rek,date(tgl) tgl,staff ,id_vendor ,'' as kelompok_pelanggan 
        FROM (
                SELECT j.tanggal tgl, b.lap,b.pk,b.jk,b.jb,b.cj,b.rekening,b.deskripsi,b.des_rek,b.debet, b.kredit,b.no_jurnal, b.id_fk,b.staff,b.id_vendor
                FROM jurnal_bank b, jurnal_kas_bank j
                where b.no_jurnal = j.no_jurnal AND date(j.tanggal) >= '$mulai' and date(j.tanggal) <='$akhir' and j.verifikasi ='DITERIMA'
                
                ) as gabung
                UNION all
                SELECT tgl, lap,pk,jk,jb,cj,rekening,deskripsi,des_rek,debet, kredit,no_jurnal, id_fk,staff,id_vendor
                FROM jurnal_bank 
                where date(tgl) >= '$mulai' and date(tgl) <='$akhir' 
                and tgl_input < '2023-09-01'
                -- order by urut asc
        ) as i

        UNION ALL
        SELECT * from(
        select j.jk, j.rekening,j.deskripsi, j.no_jurnal, j.kredit, j.debet, j.lap, j.cj, j.jb, j.pk, j.des_rek,date(j.tgl) tgl, j.staff,id_vendor,c.kelompok_pelanggan, '' as no_reg
        from jurnal_piutang j, cara_bayar c
        where j.tgl >= '$mulai' and j.tgl <='$akhir' and j.id_vendor = c.kode_pelanggan and j.verifikasi =1
        ) as j

        ")->result();
    }
    public function SelectLaporanRangeRekapByJenis($mulai, $akhir,$jenis)
    {
        if($jenis=='PYMHD'){return $this->db->query("SELECT * from(
            SELECT '10' as jk, rekening, deskripsi, no_jurnal, kredit, debet, lap, cj, jb, pk, des_rek, tgl, staff, id_vendor, kelompok_pelanggan  , no_reg
            FROM (
                
                SELECT *
                FROM (
                    SELECT jc.jk, jc.rekening, jc.deskripsi, jc.no_jurnal, sum(jc.kredit) kredit, sum(jc.debet) debet, jc.lap, jc.cj, jc.jb, jc.pk, jc.des_rek,date(jc.tgl) tgl, jc.staff, jc.id_vendor, c.kelompok_pelanggan, '1' as urut ,if(jc.rekening = '403.01.000',concat('RS01',jc.id_jurnal),'') as no_reg 
                    FROM jurnal_cara_pembayaran jc, cara_bayar c
                    where date(jc.tgl) >= '$mulai' and date(jc.tgl) <='$akhir' and verifikasi =1 
                    and jc.id_vendor = c.kode_pelanggan and jc.rekening !='101.01.100' and jc.no_jurnal like '%GL-304%'
                    group by no_jurnal,deskripsi,rekening,id_jurnal
                    )as db
            
                UNION ALL

                SELECT * FROM(
                    SELECT jp.jk, jp.rekening, jp.deskripsi, jp.no_jurnal, sum(jp.kredit) kredit, sum(jp.debet) debet, jp.lap, jp.cj, jp.jb, jp.pk, jp.des_rek,date(jp.tgl) tgl, jp.staff, jp.id_vendor, c.kelompok_pelanggan, '2' as urut ,if(jp.rekening = '403.01.000',concat('RS01',jp.id_fk),'') as no_reg 
                    FROM jurnal_pendapatan jp, cara_bayar c
                    where date(tgl) >= '$mulai' and date(tgl) <='$akhir' and jp.no_jurnal like '%GL-304%'
                    and jp.id_vendor = c.kode_pelanggan and jp.no_jurnal in(SELECT no_jurnal from jurnal_cara_pembayaran where verifikasi = 1)
                    group by no_jurnal,deskripsi,id_fk,rekening

                ) as kd
            
            ) as gabung
            order by rekening,urut
        
        ) as a
        ")->result();
        }else{
        return $this->db->query("SELECT * from(
        select j.jk, j.rekening,j.deskripsi, j.no_jurnal, j.kredit, j.debet, j.lap, j.cj, j.jb, j.pk, j.des_rek,date(j.tgl) tgl, j.staff,id_vendor,c.kelompok_pelanggan, '' as no_reg
        from jurnal_piutang j, cara_bayar c
        where j.tgl >= '$mulai' and j.tgl <='$akhir' and j.id_vendor = c.kode_pelanggan and j.verifikasi =1
        ) as j

        ")->result();
        }
    }
    public function SelectSummaryPau($first_date, $second_date)
    {
        $tgl = date("Y-m-d");

        $this->db->select('tgl,no_jurnal,sum(debet) total, staff,jk,id_fk');
        $this->db->from('jurnal_pau');
        if ($first_date != '' || $second_date != '') {
            $this->db->where('tgl >=', $first_date);
            $this->db->where('tgl <=', $second_date);
        } else {
            $this->db->like('tgl', $tgl);
        }
        $this->db->group_by('id_fk');
        return $this->db->get()->result();
    }
    public function getJurnalPau($no_jurnal, $id_fk)
    {
        return $this->db->query("SELECT * FROM (
            SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,debet, kredit,no_jurnal, id_fk,'1' as urut
            FROM jurnal_pau
            where no_jurnal = '$no_jurnal' and id_fk = '$id_fk'
            UNION ALL
            SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,kredit,debet,no_jurnal, id_fk,'2' as urut
            FROM jurnal_cara_pembayaran 
            where no_jurnal = '$no_jurnal' and id_fk = '$id_fk'
            
            ) as gabung
            order by urut asc
            ")->result_array();
    }
    public function get_jurnal_pendapatan_bypelayanan()
    {
        return $this->db->query("SELECT * from akun_farmasi where status = 1
        group by id_pelayanan
            ")->result();
    }
    public function getDetailPiutang($no_jurnal)
    {
        return $this->db->query("SELECT v.*,IFNULL(d.piutang,0) piutang
        from v_total_piutang v
        left join (SELECT sum(t.debet) piutang, t.id_pelayanan 
                 from detail_pembayaran_piutang t, pembayaran_piutang p
                 where t.id_fk=p.no_dokumen and p.save != 99
                 group by t.id_pelayanan
                 ) d on v.id_pelayanan= d.id_pelayanan
        where v.no_jurnal = '$no_jurnal'
        having (tagihan-piutang) != 0
        order by tgl_masuk desc
        ")->result();
    }
    public function getNama_pasien($id_pelayanan)
    {
        return $this->db->query("SELECT * from (
        SELECT p.nama,p.no_rm,b.status_rawat, b.tgl_keluar, b.cara_bayar FROM pelayanan b, pasien p
        where p.no_rm = b.id_pasien and b.id_pelayanan = '$id_pelayanan'
        union all
        SELECT p.nama,'' as no_rm,'selesai' status_rawat, '-' tgl_keluar, 'cara_bayar' cara_bayar FROM obat_bebas p
        where p.id_obat_bebas = '$id_pelayanan'
        union all
        SELECT p.nama_pasien nama,'' as no_rm,'selesai' status_rawat, '-' tgl_keluar, '42' cara_bayar FROM mcu p
        where p.id_mcu = '$id_pelayanan'
        
        ) as g
        ")->row();
    }
    public function getNama_pasien_tipe($id_pelayanan, $jenis)
    {
        if ($jenis == 'OBAT BEBAS') {
            return $this->db->query("SELECT p.nama,'' as no_rm,'selesai' status_rawat 
                FROM obat_bebas p
                where p.id_obat_bebas = '$id_pelayanan'
                ")->row();
        } else if ($jenis == 'MCU') {
            return $this->db->query("SELECT p.nama_pasien nama,'' as no_rm,'selesai' status_rawat 
                FROM mcu p
                where p.id_mcu = '$id_pelayanan'
                ")->row();
        } else if ($jenis == 'HOMECARE') {
            return $this->db->query("SELECT p.nama,'' as no_rm,'selesai' status_rawat 
            FROM homecare p
            where p.id_pasien = '$id_pelayanan'
                ")->row();
        } else {
            return $this->db->query("SELECT p.nama,p.no_rm,b.status_rawat 
                FROM pelayanan b, pasien p
                where p.no_rm = b.id_pasien and b.id_pelayanan = '$id_pelayanan'
                ")->row();
        }
    }
    //////////////////////ranap non tunai/////////////////////////////
    public function SelectLaporanRanapNonTunai_pasien($first_date, $second_date, $jenis_klaim)
    {
        if ($first_date != '' && $second_date != '') {
            return $this->db->query("SELECT * FROM( SELECT 'RANAP' jenis_pelayanan ,c.nama cara_bayar, sum(a.total_akun) total_akun,p.tgl_keluar,p.id_pasien no_rm,p.id_pelayanan,ps.nama pasien, c.diskon
         FROM akun_tindakan a, pelayanan p, cara_bayar c, pasien ps
         WHERE ps.no_rm = p.id_pasien and a.id_pelayanan=p.id_pelayanan  and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar  and c.id_cara_bayar='$jenis_klaim' and (DATE(p.tgl_keluar) BETWEEN '$first_date' and '$second_date') and a.status = 0 and p.id_pelayanan in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
         
         group by id_pelayanan
         )as ranap_nontunai
         
         UNION ALL
         SELECT 'OBAT BEBAS' jenis_pelayanan , c.nama cara_bayar, (a.total_akun) total_akun, o.tanggal tgl_keluar,'' no_rm,a.id_pelayanan,a.nama_pasien pasien, c.diskon
         FROM akun_non_pelayanan a, cara_bayar c, obat_bebas o
         WHERE a.id_pelayanan = o.id_obat_bebas and c.id_cara_bayar='$jenis_klaim' and c.id_cara_bayar=a.cara_bayar and a.kode_akun ='704.02.421'
         and (DATE(o.tanggal) BETWEEN '$first_date' and '$second_date')
 
         order by date(tgl_keluar),pasien asc
         ")->result();
        } else {
            $tgl = date("Y-m-d");
            return $this->db->query("SELECT * FROM (
         SELECT 'RANAP' jenis_pelayanan ,c.nama cara_bayar, sum(a.total_akun) total_akun,p.tgl_keluar,p.id_pasien no_rm,p.id_pelayanan,ps.nama pasien, c.diskon
         FROM akun_tindakan a, pelayanan p, cara_bayar c, pasien ps
         WHERE ps.no_rm = p.id_pasien and a.id_pelayanan=p.id_pelayanan  and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar  and c.id_cara_bayar='$jenis_klaim' and p.tgl_keluar like '%$tgl%' and a.status = 0 and p.id_pelayanan in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
        
         group by id_pelayanan
         ) as ranap_nontunai
         
         UNION ALL
         SELECT 'OBAT BEBAS' jenis_pelayanan ,c.nama cara_bayar, (a.total_akun) total_akun, a.tgl_input tgl_keluar,'' no_rm,a.id_pelayanan,a.nama_pasien pasien, c.diskon
         FROM akun_non_pelayanan a, cara_bayar c, pendapatan_kasir d
         WHERE a.id_pelayanan = d.id_pelayanan and c.id_cara_bayar='$jenis_klaim' and c.id_cara_bayar=a.cara_bayar and a.kode_akun ='704.02.421'
         and d.tgl_verifikasi like '%$tgl%' 
 
         order by date(tgl_keluar),pasien asc
         ")->result();
        }
    }

    public function jumlah_pasien_per_poli($alias_poli, $jenis_kelamin)
    {
        $poli_codes = array(
            'anak' => 'E00RX703',
            'paru' => 'ZX2016T39',
            'dalam' => '24QRNLX29R',
            'umum' => 'MWK205D30K',
            'obgyn' => 'HLGI4176K8'
        );
        if (array_key_exists($alias_poli, $poli_codes)) {
            $id_poli = $poli_codes[$alias_poli];
            $this->db->select('COUNT(DISTINCT p.id_pelayanan) as jumlah_pasien');
            $this->db->from('pelayanan p');
            $this->db->join('history_pelayanan hp', 'p.id_pelayanan = hp.id_pelayanan', 'inner');
            $this->db->join('list_poli lp', 'hp.nama_poli = lp.id_list_poli', 'inner');
            $this->db->join('pasien_TBC pt', 'p.id_pelayanan = pt.id_pelayanan', 'inner');

            // Filter by poli and jenis_kelamin
            $this->db->where('lp.id_list_poli', $id_poli);
            $this->db->where('pt.jenis_kelamin', $jenis_kelamin);

            $query = $this->db->get();
            return $query->row()->jumlah_pasien;
        }
        return 0;
    }

    public function jumlah_skrining($alias_poli, $jenis_kelamin)
    {
        $poli_codes = array(
            'anak' => 'E00RX703',
            'paru' => 'ZX2016T39',
            'dalam' => '24QRNLX29R',
            'umum' => 'MWK205D30K',
            'obgyn' => 'HLGI4176K8'
        );
        if (array_key_exists($alias_poli, $poli_codes)) {
            $id_poli = $poli_codes[$alias_poli];

            $this->db->select("COUNT(id_pasien) as jumlah_skrining");
            $this->db->from("pasien_TBC");
            $this->db->where("id_poli", $id_poli);
            $this->db->where("jenis_kelamin", $jenis_kelamin);

            $query = $this->db->get();
            return $query->row()->jumlah_skrining;
        }
        return 0;
    }

    public function jumlah_terduga_per_poli($alias_poli, $jenis_kelamin)
    {
        // Membuat map dari alias ke kode poli yang sebenarnya
        $kode_poli_map = array(
            'anak' => 'E00RX703',
            'paru' => 'ZX2016T39',
            'dalam' => '24QRNLX29R',
            'umum' => 'MWK205D30K',
            'obgyn' => 'HLGI4176K8'
        );

        // Mengecek apakah alias poli yang diberikan ada dalam map
        if (array_key_exists($alias_poli, $kode_poli_map)) {
            $id_poli = $kode_poli_map[$alias_poli];

            // Ambil jumlah terduga hanya untuk kode poli yang diinginkan dan berdasarkan jenis kelamin
            $this->db->select("COUNT(pt.id_pasien) as jumlah_terduga");
            $this->db->from("pasien_TBC pt");
            $this->db->join("list_poli lp", "pt.id_poli = lp.id_list_poli", "inner");
            $this->db->where("pt.keterangan", "terduga TBC");
            $this->db->where("lp.id_list_poli", $id_poli);
            $this->db->where("pt.jenis_kelamin", $jenis_kelamin);

            $query = $this->db->get();

            // Simpan jumlah terduga untuk poli yang diproses dalam array hasil
            return $query->row()->jumlah_terduga;
        } else {
            // Jika alias poli yang diberikan tidak ada dalam map, kembalikan pesan error atau nilai default
            return "Alias poli tidak valid.";
        }
    }

    public function SelectRekapBche($first_date, $second_date)
    {
        $this->db->select('p.tgl_masuk');
        $this->db->from('pelayanan p,pasien_TBC tb');
        $this->db->where('p.id_pelayanan = tb.id_pelayanan');
        $this->db->where('p.tgl_masuk >=', $first_date);
        $this->db->where('p.tgl_masuk <=', $second_date);

        return $this->db->get()->result();
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
