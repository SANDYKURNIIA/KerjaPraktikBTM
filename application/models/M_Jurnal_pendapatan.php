<?php

class M_Jurnal_pendapatan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    //////////////////Data coa pasien RAJAL/////////////////////////////
    public function SelectLaporanRangeJurnalRajal($first_date, $second_date)
    {
        return $this->db->query("SELECT * FROM (SELECT a.id_akun,a.kode_akun,d.id_pelayanan
        FROM akun_tindakan a, pelayanan p, cara_bayar c, list_poli lp, pendapatan_kasir d
        WHERE a.id_pelayanan=p.id_pelayanan and a.id_pelayanan = d.id_pelayanan and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar and a.id_poli=lp.id_list_poli and c.jenis='UMUM' 
        and (DATE(p.tgl_keluar) BETWEEN '$first_date' and '$second_date') and a.status = 0 and p.id_pelayanan not in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
        and d.status = 1
        group by a.id_akun
        ) AS a
        UNION ALL
       
        SELECT * FROM ( SELECT a.id_akun,a.kode_akun,d.id_pelayanan
        FROM akun_non_pelayanan a, pendapatan_kasir d
        WHERE a.id_pelayanan=d.id_pelayanan  and d.keterangan != 'asuransi' 
        and (DATE(d.tgl_verifikasi) BETWEEN '$first_date' and '$second_date') and a.status = 0 and a.kode_akun !='704.02.421'
        and d.status = 1
        group by a.id_akun
        ) as b
        ")->result();
    }
    public function SelectLaporanJurnalRajal()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT * FROM (SELECT a.id_akun,a.kode_akun,d.id_pelayanan
        FROM akun_tindakan a, pelayanan p, cara_bayar c, list_poli lp, pendapatan_kasir d
        WHERE a.id_pelayanan=p.id_pelayanan and a.id_pelayanan = d.id_pelayanan and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar and a.id_poli=lp.id_list_poli and c.jenis='UMUM' 
        and (DATE(p.tgl_keluar) = '$tgl') and a.status = 0 and p.id_pelayanan not in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
        group by a.id_akun
        ) AS a
        UNION ALL
       
        SELECT * FROM ( SELECT a.id_akun,a.kode_akun,d.id_pelayanan
        FROM akun_non_pelayanan a, pendapatan_kasir d
        WHERE a.id_pelayanan=d.id_pelayanan  and d.keterangan != 'asuransi' 
        and (DATE(d.tgl_verifikasi) = '$tgl') and a.status = 0 and a.kode_akun !='704.02.421'
        and d.status =1
        group by a.id_akun
        ) as b
        ")->result();
    }

    ////////////////////Set jurnal pendapatan//////////////////////////
    public function selectPendapatanKasir($mulai, $akhir) //RAJAL deposite untuk set jurnal
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");

        if ($mulai == '' && $akhir == '') {
            $mulai = $tgl;
            $akhir = $tgl;
        }
        $hasil = $this->db->query("SELECT '403.01.000' kode_akun,(total_akun) total_akun, keterangan, bank,id_pelayanan, id_bank,pasien FROM(
            SELECT g.total total_akun, g.keterangan,IFNULL(b.nama_bank,'') as bank,g.id_pelayanan,IFNULL(b.id_bank,'') as id_bank,g.pasien, g.id_pendapatan FROM (
            SELECT (d.tgl_verifikasi) tgl_input, ps.nama pasien, ps.no_rm, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
            FROM pelayanan p, staff s,pendapatan_kasir d,pasien ps
            WHERE p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
            and (DATE(d.tgl_verifikasi) BETWEEN '$mulai' and '$akhir')  
            -- and p.status=1 
            and p.cara_bayar = '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) 
            and d.total_bayar != 0 and d.status=1 and d.no_jurnal_deposite is null and p.status_rawat != 'selesai'
            -- and (DATE(p.tgl_keluar) not BETWEEN '$mulai' and '$akhir')
            -- and (d.tgl_pulang is null or date(d.tgl_verifikasi) != date(d.tgl_pulang))
            group by d.id_pendapatan

            UNION ALL
            SELECT (d.tgl_verifikasi) tgl_input, ps.nama pasien, ps.no_rm, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
            FROM pelayanan p, staff s,pendapatan_kasir d,pasien ps
            WHERE p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
            and (DATE(d.tgl_verifikasi) BETWEEN '$mulai' and '$akhir')  
            -- and p.status=1 
            and p.cara_bayar = '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) 
            and p.id_pelayanan in(select id_pelayanan from akun_tindakan) 
            and d.total_bayar != 0 and d.status=1 and d.no_jurnal_deposite is null and p.status_rawat = 'selesai'
            and (DATE(p.tgl_keluar) not BETWEEN '$mulai' and '$akhir')
            -- and (d.tgl_pulang is null or date(d.tgl_verifikasi) != date(d.tgl_pulang))
            group by d.id_pendapatan

            UNION ALL
            SELECT (d.tgl_verifikasi) tgl_input, ps.nama pasien, ps.no_rm, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
            FROM pelayanan p, staff s,pendapatan_kasir d,pasien ps
            WHERE p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
            and (DATE(d.tgl_verifikasi) BETWEEN '$mulai' and '$akhir')  
            -- and p.status=1 
            and p.cara_bayar = '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) 
            -- and p.id_pelayanan not in(select id_pelayanan from akun_tindakan) 
            and d.total_bayar != 0 and d.status=1 and d.no_jurnal_deposite is null and p.status_rawat = 'selesai'
            -- and (DATE(p.tgl_keluar) not BETWEEN '$mulai' and '$akhir')
            -- and (d.tgl_pulang is null or date(d.tgl_verifikasi) != date(d.tgl_pulang))
            group by d.id_pendapatan

            UNION ALL

            SELECT (d.tgl_verifikasi) tgl_input, ps.nama pasien, ps.no_rm, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
            FROM pelayanan p, staff s,pendapatan_kasir d,pasien ps
            WHERE p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
            and (DATE(d.tgl_verifikasi) BETWEEN '$mulai' and '$akhir')  
            -- and p.status=1
            and p.cara_bayar != '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status = 1) 
            and d.selisih != 0 and d.status=1 and d.status_jurnal =0
            and d.tipe ='SELISIH'
            group by d.id_pendapatan
            UNION ALL

            SELECT (d.tgl_verifikasi) tgl_input, ps.nama pasien, ps.no_rm, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
            FROM pelayanan p, staff s,pendapatan_kasir d,pasien ps
            WHERE p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
            and (DATE(d.tgl_verifikasi) BETWEEN '$mulai' and '$akhir')  
            -- and p.status=1
            and p.cara_bayar != '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status = 1) 
            and d.status=1 and d.status_jurnal =0
           
            group by d.id_pendapatan
        ) as g
            left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
            as b on g.id_pendapatan = b.id_pendapatan
        ) as data
       
        -- group by id_pelayanan, keterangan
        group by id_pendapatan
        ")->result();


        return $hasil;
    }
    public function getDepositeNonPel($no_jurnal) //RAJAL deposite untuk set jurnal
    {
        date_default_timezone_set('Asia/Jakarta');

        $hasil = $this->db->query("SELECT '403.01.000' kode_akun,(total_akun) total_akun, keterangan, bank,id_pelayanan, id_bank,pasien FROM(
            SELECT g.total total_akun, g.keterangan,IFNULL(b.nama_bank,'') as bank,g.id_pelayanan,IFNULL(b.id_bank,'') as id_bank,g.pasien, g.id_pendapatan FROM (
            SELECT (d.tgl_verifikasi) tgl_input, a.nama_pasien pasien, (d.total_bayar) total, d.keterangan,d.id_pendapatan,d.id_pelayanan
            FROM pendapatan_kasir d, akun_non_pelayanan a
            WHERE d.id_pelayanan=a.id_pelayanan 
            and d.total_bayar != 0 and d.status=1 and a.no_jurnal ='$no_jurnal'
            group by d.id_pendapatan
           
        ) as g
            left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
            as b on g.id_pendapatan = b.id_pendapatan
        ) as data
       
        -- group by id_pelayanan, keterangan
        group by id_pendapatan
        ")->result();


        return $hasil;
    }
    public function Set_jurnal_rajal()
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT kode_akun, total_akun , jenis_akun,'-' as id_pelayanan,'tunai' as jenis_bayar, lap
        FROM (SELECT a.kode_akun,sum(a.total_akun) total_akun , a.jenis_akun, a.lap
            FROM akun_tindakan a, pelayanan p, cara_bayar c, list_poli lp
            WHERE a.id_pelayanan=p.id_pelayanan  and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar and a.id_poli=lp.id_list_poli and c.jenis='UMUM' 
            and (DATE(p.tgl_keluar) = '$tgl') and a.status = 0 
            and p.id_pelayanan not in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
            and p.id_pelayanan in  (select id_pelayanan from pendapatan_kasir where status = 1)
            GROUP BY a.kode_akun,a.lap
        )as data_cash

        UNION ALL

        SELECT kode_akun, total_akun , jenis_akun,'-' as id_pelayanan,'tunai' as jenis_bayar, '01' as lap
        FROM (SELECT  kode_akun,sum(total_akun) total_akun , jenis_akun from(
            SELECT a.kode_akun,a.total_akun , a.jenis_akun
            FROM akun_non_pelayanan a, pendapatan_kasir d
            WHERE  a.id_pelayanan = d.id_pelayanan and d.keterangan !='asuransi' and a.status = 0 and d.status=1
            and (DATE(d.tgl_verifikasi) = '$tgl')  and a.kode_akun !='704.02.421'
            GROUP BY a.id_akun
            ) as a  
            GROUP BY kode_akun 
        ) as non_pel_cash
       
        ")->result();
    }



    public function Set_jurnal_rajal_range($first_date, $second_date)
    {
        return $this->db->query(" SELECT kode_akun, total_akun , jenis_akun,'-' as id_pelayanan,'tunai' as jenis_bayar, lap
        FROM (SELECT a.kode_akun,sum(a.total_akun) total_akun , a.jenis_akun, a.lap
            FROM akun_tindakan a, pelayanan p, cara_bayar c, list_poli lp
            WHERE a.id_pelayanan=p.id_pelayanan  and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar and a.id_poli=lp.id_list_poli and c.jenis='UMUM' 
            and (DATE(p.tgl_keluar) BETWEEN '$first_date' and '$second_date') and a.status = 0 
            and p.id_pelayanan not in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
            and p.id_pelayanan in  (select id_pelayanan from pendapatan_kasir where status = 1) 
            GROUP BY a.kode_akun,a.lap
        )as data_cash

        UNION ALL

        SELECT kode_akun, total_akun , jenis_akun,'-' as id_pelayanan,'tunai' as jenis_bayar, '01' as lap
        FROM (SELECT  kode_akun,sum(total_akun) total_akun , jenis_akun from(
            SELECT a.kode_akun,a.total_akun , a.jenis_akun
            FROM akun_non_pelayanan a, pendapatan_kasir d
            WHERE  a.id_pelayanan = d.id_pelayanan and d.keterangan !='asuransi' and a.status = 0 and d.status=1
            and (DATE(d.tgl_verifikasi) BETWEEN '$first_date' and '$second_date') and a.kode_akun !='704.02.421'
            GROUP BY a.id_akun
            ) as a  
            GROUP BY kode_akun 
        ) as non_pel_cash
       
        ")->result();
    }


    //////////////////Data coa pasien RAJAL/////////////////////////////

    public function SelectLaporanJurnalRanap()
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT a.id_akun, a.kode_akun,'RANAP' jenis_pelayanan,  c.nama cara_bayar, a.total_akun, a.jenis_akun, d.keterangan
        FROM akun_tindakan a, pelayanan p, cara_bayar c, pendapatan_kasir d
        WHERE a.id_pelayanan=p.id_pelayanan and a.id_pelayanan = d.id_pelayanan and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar  and c.jenis='UMUM' 
        and p.tgl_keluar like '%$tgl%' and a.status = 0 and p.id_pelayanan in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
        UNION ALL
        SELECT a.id_akun, a.kode_akun, 'OBAT BEBAS' jenis_pelayanan, c.nama cara_bayar, a.total_akun, a.jenis_akun,d.keterangan
        FROM akun_non_pelayanan a, cara_bayar c, pendapatan_kasir d
        WHERE a.id_pelayanan = d.id_pelayanan and c.jenis='UMUM' and c.id_cara_bayar=a.cara_bayar and a.kode_akun ='704.02.421'
        and d.tgl_verifikasi like '%$tgl%' and a.status = 0
        ")->result();
    }
    public function SelectLaporanRangeJurnalRanap($first_date, $second_date)
    {
        return $this->db->query("SELECT * FROM (SELECT a.id_akun,a.kode_akun,d.id_pelayanan
        FROM akun_tindakan a, pelayanan p, cara_bayar c, pendapatan_kasir d
        WHERE a.id_pelayanan=p.id_pelayanan and a.id_pelayanan = d.id_pelayanan and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar and c.jenis='UMUM' 
        and (DATE(p.tgl_keluar) BETWEEN '$first_date' and '$second_date') and a.status = 0 and d.status =1 and p.status_rawat = 'selesai'
        and p.id_pelayanan in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
        group by a.id_akun
        ) AS a
        UNION ALL
       
        SELECT * FROM ( SELECT a.id_akun,a.kode_akun,d.id_pelayanan
        FROM akun_non_pelayanan a, pendapatan_kasir d
        WHERE a.id_pelayanan=d.id_pelayanan  and d.keterangan != 'asuransi' and d.status =1
        and (DATE(d.tgl_verifikasi) BETWEEN '$first_date' and '$second_date') and a.status = 0 and a.kode_akun ='704.02.421'
        group by a.id_akun
        ) as b
        ")->result();
    }

    //////////////////Set jurnal pendapatan ranap////////////////////////////
    public function selectPendapatanKasirRanap($mulai, $akhir) //RANAP
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");

        if ($mulai == '' && $akhir == '') {
            $mulai = $tgl;
            $akhir = $tgl;
        }
        $hasil = $this->db->query("SELECT '403.01.000' kode_akun,(total_akun) total_akun, keterangan, bank,id_pelayanan, id_bank,pasien FROM(
            SELECT g.total total_akun, g.keterangan,IFNULL(b.nama_bank,'') as bank,g.id_pelayanan,IFNULL(b.id_bank,'') as id_bank,g.pasien, g.id_pendapatan FROM (
            SELECT (d.tgl_verifikasi) tgl_input, ps.nama pasien, ps.no_rm, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
            FROM pelayanan p, staff s,pendapatan_kasir d,pasien ps
            WHERE p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
            and (DATE(d.tgl_verifikasi) BETWEEN '$mulai' and '$akhir')  
            -- and p.status=1 
            and p.cara_bayar = '42' and p.id_pelayanan in(select id_pelayanan from history_pelayanan_ranap where status =1) 
            and d.total_bayar != 0 and d.status=1 and d.no_jurnal_deposite is null and p.status_rawat != 'selesai'
            -- and (DATE(p.tgl_keluar) not BETWEEN '$mulai' and '$akhir')
            -- and (d.tgl_pulang is null or date(d.tgl_verifikasi) != date(d.tgl_pulang))
            group by d.id_pendapatan

            UNION ALL
            SELECT (d.tgl_verifikasi) tgl_input, ps.nama pasien, ps.no_rm, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
            FROM pelayanan p, staff s,pendapatan_kasir d,pasien ps
            WHERE p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
            and (DATE(d.tgl_verifikasi) BETWEEN '$mulai' and '$akhir')  
            -- and p.status=1 
            and p.cara_bayar = '42' and p.id_pelayanan in(select id_pelayanan from history_pelayanan_ranap where status =1) 
            and p.id_pelayanan in(select id_pelayanan from akun_tindakan) 
            and d.total_bayar != 0 and d.status=1 and d.no_jurnal_deposite is null and p.status_rawat = 'selesai'
            and (DATE(p.tgl_keluar) not BETWEEN '$mulai' and '$akhir')
            -- and (d.tgl_pulang is null or date(d.tgl_verifikasi) != date(d.tgl_pulang))
            group by d.id_pendapatan

            UNION ALL
            SELECT (d.tgl_verifikasi) tgl_input, ps.nama pasien, ps.no_rm, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
            FROM pelayanan p, staff s,pendapatan_kasir d,pasien ps
            WHERE p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
            and (DATE(d.tgl_verifikasi) BETWEEN '$mulai' and '$akhir')  
            -- and p.status=1 
            and p.cara_bayar = '42' and p.id_pelayanan in(select id_pelayanan from history_pelayanan_ranap where status =1) 
            -- and p.id_pelayanan in(select id_pelayanan from akun_tindakan) 
            and d.total_bayar != 0 and d.status=1 and d.no_jurnal_deposite is null and p.status_rawat = 'selesai'
            -- and (DATE(p.tgl_keluar) not BETWEEN '$mulai' and '$akhir')
            -- and (d.tgl_pulang is null or date(d.tgl_verifikasi) != date(d.tgl_pulang))
            group by d.id_pendapatan

            UNION ALL

            SELECT (d.tgl_verifikasi) tgl_input, ps.nama pasien, ps.no_rm, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
            FROM pelayanan p, staff s,pendapatan_kasir d,pasien ps
            WHERE p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
            and (DATE(d.tgl_verifikasi) BETWEEN '$mulai' and '$akhir')  
            -- and p.status=1
            and p.cara_bayar != '42' and p.id_pelayanan in(select id_pelayanan from history_pelayanan_ranap where status = 1) 
            and d.selisih != 0 and d.status=1 and d.status_jurnal =0
            and d.tipe ='SELISIH'
            group by d.id_pendapatan
            UNION ALL

            SELECT (d.tgl_verifikasi) tgl_input, ps.nama pasien, ps.no_rm, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan
            FROM pelayanan p, staff s,pendapatan_kasir d,pasien ps
            WHERE p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
            and (DATE(d.tgl_verifikasi) BETWEEN '$mulai' and '$akhir')  
            -- and p.status=1
            and p.cara_bayar != '42' and p.id_pelayanan in(select id_pelayanan from history_pelayanan_ranap where status = 1) 
            and d.status=1 and d.status_jurnal =0
           
            group by d.id_pendapatan
        ) as g
            left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
            as b on g.id_pendapatan = b.id_pendapatan
        ) as data
       
        -- group by id_pelayanan, keterangan
        group by id_pendapatan
        ")->result();


        return $hasil;
    }

    public function Set_jurnal_ranap()
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT kode_akun, total_akun , jenis_akun,'-' as id_pelayanan,'tunai' as jenis_bayar, lap
        FROM (SELECT a.kode_akun,sum(a.total_akun) total_akun , a.jenis_akun, a.lap
            FROM akun_tindakan a, pelayanan p, cara_bayar c
            WHERE a.id_pelayanan=p.id_pelayanan  and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar and c.jenis='UMUM' 
            and (DATE(p.tgl_keluar) = '$tgl') and a.status = 0 and p.status_rawat ='selesai'
            and p.id_pelayanan in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
            and p.id_pelayanan in  (select id_pelayanan from pendapatan_kasir where status = 1)
            GROUP BY a.kode_akun,a.lap
        )as data_cash 
       
        UNION ALL

         SELECT kode_akun, total_akun , jenis_akun,'-' as id_pelayanan,'tunai' as jenis_bayar, '01' as lap
        FROM (SELECT  kode_akun,sum(total_akun) total_akun , jenis_akun from(
            SELECT a.kode_akun,a.total_akun, a.jenis_akun
            FROM akun_non_pelayanan a, pendapatan_kasir d
            WHERE  a.id_pelayanan = d.id_pelayanan and d.keterangan !='asuransi' and a.status = 0 and d.status=1
            and (DATE(d.tgl_verifikasi) = '$tgl') and a.kode_akun ='704.02.421'
            GROUP BY a.id_akun

             ) as a
             GROUP BY kode_akun
        )as non_pel_cash

        ")->result();
    }

    public function Set_jurnal_ranap_range($first_date, $second_date)
    {
        return $this->db->query("SELECT kode_akun, total_akun , jenis_akun,'-' as id_pelayanan,'tunai' as jenis_bayar, lap
        FROM (SELECT a.kode_akun,sum(a.total_akun) total_akun , a.jenis_akun, a.lap
            FROM akun_tindakan a, pelayanan p, cara_bayar c
            WHERE a.id_pelayanan=p.id_pelayanan  and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar and c.jenis='UMUM' 
            and (DATE(p.tgl_keluar) BETWEEN '$first_date' and '$second_date') and a.status = 0 and p.status_rawat ='selesai'
            and p.id_pelayanan in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
            and p.id_pelayanan in  (select id_pelayanan from pendapatan_kasir where status = 1)
            GROUP BY a.kode_akun,a.lap
        )as data_cash 
       
        UNION ALL

       SELECT kode_akun, total_akun , jenis_akun,'-' as id_pelayanan,'tunai' as jenis_bayar, '01' as lap
        FROM (SELECT  kode_akun,sum(total_akun) total_akun , jenis_akun from(
            SELECT a.kode_akun,a.total_akun, a.jenis_akun
            FROM akun_non_pelayanan a, pendapatan_kasir d
            WHERE  a.id_pelayanan = d.id_pelayanan and d.keterangan !='asuransi' and a.status = 0 and d.status=1
            and (DATE(d.tgl_verifikasi) BETWEEN '$first_date' and '$second_date') and a.kode_akun ='704.02.421'
            GROUP BY a.id_akun

             ) as a
             GROUP BY kode_akun
        )as non_pel_cash

        ")->result();
    }




    ///////////////////////////////SET JURNAL CARA PEMBAYARAN////////////////////////////

    public function selectJurnal($no_jurnal, $tgl)
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT * from(
            SELECT sum(total_bayar) total, id_pelayanan id_fk, no_jurnal,'301' as jenis,keterangan,'' as nama_bank, 'CASH' id_bank, tipe
            FROM pendapatan_kasir where status=1 and keterangan !='asuransi' and keterangan = 'cash' and tipe != 'SELISIH'
            and no_jurnal = '$no_jurnal' and status_jurnal = 1 and id_pelayanan in (select id_pelayanan from pelayanan where  status_rawat ='selesai')
            and (no_jurnal = no_jurnal_deposite or no_jurnal_deposite is null)
            GROUP by id_pelayanan
        ) as a
        UNION ALL
        SELECT * from(
            SELECT sum(p.total_bayar) total, p.id_pelayanan id_fk, no_jurnal,'301' as jenis,p.keterangan, d.nama_bank, b.cara_bayar id_bank, p.tipe
            FROM pendapatan_kasir p, pendapatan_bank b, daftar_bank d
            where p.id_pendapatan = b.id_pendapatan and b.cara_bayar = d.id_bank and p.status=1 and p.keterangan !='asuransi' and p.keterangan != 'cash' and tipe != 'SELISIH'
            and p.no_jurnal = '$no_jurnal' and p.status_jurnal = 1 and p.id_pelayanan in (select id_pelayanan from pelayanan where status_rawat ='selesai')
            and (no_jurnal = no_jurnal_deposite or no_jurnal_deposite is null)
            group by p.id_pendapatan
        ) as b
        UNION ALL
        SELECT * from(
            SELECT sum(total_bayar) total, id_pelayanan id_fk, no_jurnal,'301' as jenis,keterangan,'' as nama_bank, 'CASH' id_bank, tipe
            FROM pendapatan_kasir where status=1 and keterangan !='asuransi' and keterangan = 'cash' and tipe != 'SELISIH'
            and no_jurnal = '$no_jurnal' and status_jurnal = 1 and id_pelayanan not in (select id_pelayanan from pelayanan)
            GROUP by id_pelayanan
        ) as c
        UNION ALL
        SELECT * from(
            SELECT sum(p.total_bayar) total, p.id_pelayanan id_fk, no_jurnal,'301' as jenis,p.keterangan, d.nama_bank, b.cara_bayar id_bank, p.tipe
            FROM pendapatan_kasir p, pendapatan_bank b, daftar_bank d
            where p.id_pendapatan = b.id_pendapatan and b.cara_bayar = d.id_bank and p.status=1 and p.keterangan !='asuransi' and p.keterangan != 'cash' and tipe != 'SELISIH'
            and p.no_jurnal = '$no_jurnal' and p.status_jurnal = 1 and p.id_pelayanan not in (select id_pelayanan from pelayanan)
            group by p.id_pendapatan
        ) as d
        
        ")->result();
    }
    public function getData_akun($id_pelayanan)
    {
        return $this->db->query("SELECT * from (
        SELECT status,id_pelayanan FROM akun_tindakan
        where id_pelayanan = '$id_pelayanan' and status =1
        union all
        SELECT status,id_pelayanan FROM akun_non_pelayanan
        where id_pelayanan = '$id_pelayanan' and status =1
        
        ) as g
        group by id_pelayanan

        ")->row();
    }
    public function selectJurnalDeposite($no_jurnal)
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT total, id_fk, no_jurnal,jenis,pk,jk,deskripsi ,id_bank from(
        SELECT sum(kredit) total, id_fk, no_jurnal,jenis,pk,jk,deskripsi ,id_bank
        FROM jurnal_pendapatan
        where jenis !='304' and rekening = '403.01.000' and (id_bank ='' or id_bank is null)
        and no_jurnal = '$no_jurnal' 
        group by id_fk,deskripsi 
        ) as a
        union all
        SELECT (kredit) total, id_fk, no_jurnal,jenis,pk,jk,deskripsi ,id_bank
        FROM jurnal_pendapatan
        where jenis !='304' and rekening = '403.01.000' and id_bank in (select id_bank from daftar_bank)
        and no_jurnal = '$no_jurnal' 
        ")->result();
    }
    public function selectJurnalDeposite_selesai($no_jurnal)
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT * from(
            SELECT (total_bayar) total, id_pelayanan id_fk, no_jurnal,'301' as jenis,keterangan,'' as nama_bank, 'CASH' id_bank, tipe
            FROM pendapatan_kasir where status=1 and keterangan !='asuransi' and keterangan = 'cash' and tipe != 'SELISIH'
            and no_jurnal = '$no_jurnal' and status_jurnal = 1 and id_pelayanan in (select id_pelayanan from pelayanan where status = 1 and status_rawat ='selesai')
            and  no_jurnal != no_jurnal_deposite
           
        ) as a
        UNION ALL
        SELECT * from(
            SELECT sum(p.total_bayar) total, p.id_pelayanan id_fk, no_jurnal,'301' as jenis,p.keterangan, d.nama_bank, b.cara_bayar id_bank, p.tipe
            FROM pendapatan_kasir p, pendapatan_bank b, daftar_bank d
            where p.id_pendapatan = b.id_pendapatan and b.cara_bayar = d.id_bank and p.status=1 and p.keterangan !='asuransi' and p.keterangan != 'cash' and tipe != 'SELISIH'
            and p.no_jurnal = '$no_jurnal' and p.status_jurnal = 1 and p.id_pelayanan in (select id_pelayanan from pelayanan where status = 1 and status_rawat ='selesai')
            and no_jurnal != no_jurnal_deposite
            group by p.id_pendapatan
        ) as b
        ")->result();
    }


    public function Set_jurnal_rajal_reduksi()
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT  id_akun,kode_akun,total_akun, jenis_akun,id_pelayanan,id_pelayanan as id_fk, lap, pasien
        FROM (SELECT a.id_akun, a.kode_akun, lp.nama_panjang jenis_pelayanan, c.nama cara_bayar, a.total_akun, a.jenis_akun, p.tgl_keluar, p.id_pelayanan,a.lap, ps.nama pasien
        FROM akun_reduksi a, pelayanan p, cara_bayar c, list_poli lp, pasien ps
        WHERE a.id_pelayanan=p.id_pelayanan  and c.id_cara_bayar=a.cara_bayar and p.id_pasien = ps.no_rm  and p.cara_bayar=c.id_cara_bayar and a.id_poli=lp.id_list_poli and c.jenis='UMUM' 
        and (DATE(p.tgl_keluar) = '$tgl') and a.status = 0 
        and p.id_pelayanan not in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
        group by a.id_akun
        ) as gabung1

        UNION ALL
        SELECT * from(
        SELECT a.id_akun, a.kode_akun, a.total_akun, a.jenis_akun,a.id_pelayanan,a.id_pelayanan as id_fk,a.lap, p.nama_pasien pasien
        FROM akun_reduksi a, akun_non_pelayanan p, pendapatan_kasir k 
        WHERE a.id_pelayanan=p.id_pelayanan and a.id_pelayanan = k.id_pelayanan a.cara_bayar =42 and p.status =1
        and (DATE(k.tgl_input) = '$tgl') and a.status = 0 
        group by a.id_akun
        ) as gabung
        ")->result();
    }
    public function Set_jurnal_rajal_range_reduksi($first_date, $second_date)
    {
        return $this->db->query("SELECT  id_akun,kode_akun,total_akun, jenis_akun,id_pelayanan,id_pelayanan as id_fk, lap, pasien
        FROM (SELECT a.id_akun, a.kode_akun, lp.nama_panjang jenis_pelayanan, c.nama cara_bayar, a.total_akun, a.jenis_akun, p.tgl_keluar, p.id_pelayanan,a.lap, ps.nama pasien
        FROM akun_reduksi a, pelayanan p, cara_bayar c, list_poli lp, pasien ps
        WHERE a.id_pelayanan=p.id_pelayanan  and c.id_cara_bayar=a.cara_bayar and p.id_pasien = ps.no_rm  and p.cara_bayar=c.id_cara_bayar and a.id_poli=lp.id_list_poli and c.jenis='UMUM' 
        and (DATE(p.tgl_keluar) BETWEEN '$first_date' and '$second_date') and a.status = 0 
        and p.id_pelayanan not in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
        group by a.id_akun
        ) as gabung1
        UNION ALL
        SELECT * from(
        SELECT a.id_akun, a.kode_akun, a.total_akun, a.jenis_akun,a.id_pelayanan,a.id_pelayanan as id_fk,a.lap, p.nama_pasien pasien
        FROM akun_reduksi a, akun_non_pelayanan p, pendapatan_kasir k 
        WHERE a.id_pelayanan=p.id_pelayanan and a.id_pelayanan = k.id_pelayanan and p.status =1
        and (DATE(k.tgl_input) BETWEEN '$first_date' and '$second_date') and a.status = 0 
        group by a.id_akun
        ) as gabung
        ")->result();
    }

    public function Set_jurnal_ranap_reduksi()
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT  id_akun,kode_akun,total_akun, jenis_akun,id_pelayanan,id_pelayanan as id_fk, lap, pasien
        FROM (SELECT a.id_akun, a.kode_akun, lp.nama_panjang jenis_pelayanan, c.nama cara_bayar, a.total_akun, a.jenis_akun, p.tgl_keluar, p.id_pelayanan,a.lap, ps.nama pasien
        FROM akun_reduksi a, pelayanan p, cara_bayar c, list_poli lp, pasien ps
        WHERE a.id_pelayanan=p.id_pelayanan  and c.id_cara_bayar=a.cara_bayar and p.id_pasien = ps.no_rm  and p.cara_bayar=c.id_cara_bayar and a.id_poli=lp.id_list_poli and c.jenis='UMUM' 
        and (DATE(p.tgl_keluar) = '$tgl') and a.status = 0 
        and p.id_pelayanan in  (select id_pelayanan from history_pelayanan_ranap where status = 1) 
        group by a.id_akun
        ) as gabung1
        ")->result();
    }
    public function Set_jurnal_ranap_range_reduksi($first_date, $second_date)
    {
        return $this->db->query("SELECT  id_akun,kode_akun,total_akun, jenis_akun,id_pelayanan,id_pelayanan as id_fk, lap, pasien
        FROM (SELECT a.id_akun, a.kode_akun, c.nama cara_bayar, a.total_akun, a.jenis_akun, p.tgl_keluar, p.id_pelayanan,a.lap, ps.nama pasien
        FROM akun_reduksi a, pelayanan p, cara_bayar c, pasien ps, history_pelayanan_ranap h
        WHERE a.id_pelayanan=p.id_pelayanan  and c.id_cara_bayar=a.cara_bayar and p.id_pasien = ps.no_rm  and p.cara_bayar=c.id_cara_bayar and c.jenis='UMUM' 
        and (DATE(p.tgl_keluar) BETWEEN '$first_date' and '$second_date') and a.status = 0  
        and p.id_pelayanan = h.id_pelayanan and  h.status = 1
        group by a.id_akun
        ) as gabung1
        ")->result();
    }


    public function selectJurnalNontunai()
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT sum(kredit) total, id_fk, no_jurnal,jenis,pk,jk FROM jurnal_pendapatan where status=0 and jenis ='304' group by id_fk")->result();
    }
    public function get_total_revenue($no_jurnal)
    {
        return $this->db->query("SELECT sum(if(rekening like'70%',kredit,0)) total,sum(if(rekening ='409.01.000',kredit,0)) ppn FROM jurnal_pendapatan where  no_jurnal='$no_jurnal'")->row();
    }
    public function get_total_reduksi($no_jurnal)
    {
        return $this->db->query("SELECT sum(if(rekening like'72%',debet,0)) reduksi FROM jurnal_cara_pembayaran where  no_jurnal='$no_jurnal'")->row();
    }

    public function get_selisih($id_pelayanan)
    {
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('tipe', 'SELISIH');
        $this->db->where('(total_bayar != 0 OR selisih != 0)'); // Menggabungkan kondisi dengan OR
        return $this->db->get('pendapatan_kasir')->row();
    }
}
