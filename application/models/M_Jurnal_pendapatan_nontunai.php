<?php

class M_Jurnal_pendapatan_nontunai extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getSelisih($id_pel)
    {
        return $this->db->query("SELECT sum(total) total,sum(luar_bill) luar_bill from(SELECT selisih total,if(jenis_bill='LUAR TANGGUNGAN',total_bayar,0) luar_bill,id_pelayanan
        from pendapatan_kasir where id_pelayanan ='$id_pel' and tipe ='SELISIH' and status =1
        UNION ALL
        SELECT total_bayar total,0 luar_bill,id_pelayanan
        from pendapatan_kasir where id_pelayanan ='$id_pel' and keterangan!='asuransi' and status =1 and selisih = 0
        ) as b
        group by id_pelayanan
        ")->row();
    }
    public function Set_jurnal_nontunai($id_pel)
    {
        return $this->db->query("SELECT kode_akun, (total_akun) total_akun,jenis_akun, id_pelayanan, jenis_bayar, id_fk, lap, kode_pelanggan
        FROM (SELECT a.kode_akun, (total_akun) total_akun,a.jenis_akun, '-' as id_pelayanan,'asuransi' as jenis_bayar, UNIX_TIMESTAMP() as id_fk,a.lap, c.kode_pelanggan
        FROM akun_tindakan a, pelayanan p, cara_bayar c
        WHERE a.id_pelayanan=p.id_pelayanan  and c.id_cara_bayar=a.cara_bayar and p.cara_bayar=c.id_cara_bayar
        and a.id_pelayanan='$id_pel' and a.status = 0 
      
        union all
        
        SELECT a.kode_akun,(a.total_akun) total_akun , a.jenis_akun, '-' as id_pelayanan,'non tunai' as jenis_bayar, UNIX_TIMESTAMP() as id_fk, '01' as lap,c.kode_pelanggan
        FROM akun_non_pelayanan a, cara_bayar c
        WHERE a.id_pelayanan='$id_pel' and c.id_cara_bayar=a.cara_bayar and a.status = 0 
        
        ) as data_non_tunai
      
        
        ")->result();
    }
    public function Set_jurnal_reduksi($no_dok)
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT  id_akun,kode_akun,total_akun, jenis_akun,id_pelayanan,id_pelayanan as id_fk, lap, pasien, kode_pelanggan
        FROM (SELECT a.id_akun, a.kode_akun, c.nama cara_bayar, a.total_akun, a.jenis_akun, p.tgl_keluar, p.id_pelayanan,a.lap, ps.nama pasien, c.kode_pelanggan
        FROM akun_reduksi a, pelayanan p, cara_bayar c, pasien ps,akun_tindakan t
        WHERE a.id_pelayanan=p.id_pelayanan  and c.id_cara_bayar=a.cara_bayar and p.id_pasien = ps.no_rm  and p.cara_bayar=c.id_cara_bayar and c.jenis !='UMUM' 
        and a.id_pelayanan = t.id_pelayanan and t.no_jurnal ='$no_dok' and a.status = 0 
        group by a.id_akun
        ) as gabung1

        UNION ALL
        SELECT * from(
        SELECT a.id_akun, a.kode_akun, a.total_akun, a.jenis_akun,a.id_pelayanan,a.id_pelayanan as id_fk,a.lap, p.nama_pasien pasien, c.kode_pelanggan
        FROM akun_reduksi a, akun_non_pelayanan p , cara_bayar c
        WHERE a.id_pelayanan=p.id_pelayanan and a.cara_bayar !=42 and c.id_cara_bayar=a.cara_bayar
         and p.no_jurnal ='$no_dok' and a.status = 0 
        group by a.id_akun
        ) as gabung
        ")->result();
    }

    public function reduksi_carabayar_rajal($no_dok)
    {
        $a = array();
        $b = array();
        $a[] = $this->db->query("SELECT a.*,ifnull(b.selisih,0) selisih from (
            SELECT if(t.id_poli ='146582' ,
            concat('723.',l.kode_coa,'.810'),
                if(t.id_poli ='6E975PL694',
                concat('723.',l.kode_coa,'.310'),
                    if(t.id_poli ='15487956', 
                    concat('723.',l.kode_coa,'.720'),
                        if(t.id_poli ='NM3075J78',
                        concat('723.',l.kode_coa,'.350'),
                        concat('721.',l.kode_coa,'.110')
                        )
                    )
                )
            ) as kode_akun, c.nama cara_bayar, (sum(t.total_akun)) total,
            
            if(t.id_poli ='146582' ,
            'Reduksi Pendapatan Laboratorium klinik Rawat Jalan',
                if(t.id_poli ='6E975PL694',
                'Reduksi Pendapatan Fisioterapi[ klinik Rawat Jalan',
                    if(t.id_poli ='15487956', 
                    'Reduksi Pendapatan Radiodiagnostik klinik Rawat Jalan',
                        if(t.id_poli ='NM3075J78',
                        'Reduksi Pendapatan Hemodialisa',
                        concat('Reduksi Pendapatan Konsul ',l.nama_panjang)
                        )
                    )
                )
            ) as jenis_akun, p.tgl_keluar, p.id_pelayanan,t.lap, ps.nama pasien, c.kode_pelanggan
                    FROM pelayanan p, cara_bayar c, pasien ps,akun_tindakan t, list_poli l
                    WHERE p.id_pasien = ps.no_rm and p.id_pelayanan=t.id_pelayanan  and p.cara_bayar=c.id_cara_bayar and c.diskon !=0 
                    and t.id_poli =l.id_list_poli
                    and t.no_jurnal ='$no_dok'
                    group by t.id_pelayanan
                    ) as a 
                    LEFT JOIN ( SELECT sum(debet) selisih,no_jurnal,id_jurnal 
                    FROM jurnal_cara_pembayaran where no_jurnal='$no_dok' and cara_klaim ='SELISIH' group by id_jurnal
                    ) as b on a.id_pelayanan = b.id_jurnal

        ")->result();
        $a = (is_array($a)) ? $a : array();
        $b[] = $this->db->query("SELECT a.kode_akun,a.cara_bayar,a.total,a.jenis_akun,a.tgl_input, a.id_pelayanan,'01' as lap, a.pasien, a.kode_pelanggan,ifnull(b.selisih,0) selisih from (
            SELECT if(t.id_poli ='OBAT BEBAS' ,'724.01.420','721.41.130') as kode_akun, c.nama cara_bayar, (sum(t.total_akun)) total, if(t.id_poli ='OBAT BEBAS' ,'Reduksi Pendapatan Farmasi Rawat Jalan','Pendapatan Tindakan Poli Home Care') as jenis_akun, t.tgl_input, t.id_pelayanan, t.nama_pasien pasien, c.kode_pelanggan
                    FROM cara_bayar c, akun_non_pelayanan t
                    WHERE t.cara_bayar=c.id_cara_bayar and c.diskon !=0 
                    and t.no_jurnal ='$no_dok'
                    and t.id_poli != 'MCU'
                    group by t.id_pelayanan
                    ) as a 
                    LEFT JOIN ( SELECT sum(debet) selisih,no_jurnal,id_jurnal 
                    FROM jurnal_cara_pembayaran where no_jurnal='$no_dok' and cara_klaim ='SELISIH' group by id_jurnal
                    ) as b on a.id_pelayanan = b.id_jurnal

        ")->result();
        $b = (is_array($b)) ? $b : array();
        return array_merge($a, $b);
    }
    public function reduksi_carabayar_ranap($no_dok)
    {
        $a = array();
        $b = array();
        $a[] = $this->db->query("SELECT a.*,b.selisih from (
    SELECT concat('722.',l.kode_coa,'.210') as kode_akun, c.nama cara_bayar,sum(t.total_akun) total,  'Reduksi Pendapatan Kamar Rawat Inap' as jenis_akun, p.tgl_keluar, p.id_pelayanan,t.lap, ps.nama pasien, c.kode_pelanggan
            FROM akun_tindakan t
            join pelayanan p on p.id_pelayanan=t.id_pelayanan
            join cara_bayar c on t.cara_bayar=c.id_cara_bayar
            join pasien ps on p.id_pasien = ps.no_rm
            left join ruangan l on t.id_poli =l.id_ruangan
            WHERE c.diskon !=0
            and t.no_jurnal ='$no_dok' and c.nama not like'%PLN%'
            group by t.id_pelayanan
            ) as a 
            LEFT JOIN ( SELECT sum(debet) selisih,no_jurnal,id_jurnal 
            FROM jurnal_cara_pembayaran where no_jurnal='$no_dok' and cara_klaim ='SELISIH' group by id_jurnal
            ) as b on a.id_pelayanan = b.id_jurnal

")->result();
        $a = (is_array($a)) ? $a : array();
        $b[] = $this->db->query("SELECT a.*,ifnull(b.selisih,0) selisih from (
    SELECT '724.02.421' as kode_akun, c.nama cara_bayar, (sum(t.total_akun)) total, 'Reduksi Pendapatan Farmasi Rawat Inap' as jenis_akun, t.tgl_input, t.id_pelayanan,'01' as lap, t.nama_pasien pasein, c.kode_pelanggan
            FROM cara_bayar c, akun_non_pelayanan t
            WHERE t.cara_bayar=c.id_cara_bayar and c.diskon !=0 
            and t.no_jurnal ='$no_dok' and t.id_poli ='OBAT BEBAS'  and c.nama not like'%PLN%'
            group by t.id_pelayanan
            ) as a 
            LEFT JOIN ( SELECT sum(debet) selisih,no_jurnal,id_jurnal 
            FROM jurnal_cara_pembayaran where no_jurnal='$no_dok' and cara_klaim ='SELISIH' group by id_jurnal
            ) as b on a.id_pelayanan = b.id_jurnal

")->result();
        $b = (is_array($b)) ? $b : array();
        return array_merge($a, $b);
    }

    public function selectPendapatanKasir($id) //RAJAL deposite untuk set jurnal
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");


        $hasil = $this->db->query("SELECT '403.01.000' kode_akun,(total_akun) total_akun, keterangan, bank,id_pelayanan, id_bank,pasien, kode_pelanggan FROM(
            SELECT g.total total_akun, g.keterangan,IFNULL(b.nama_bank,'') as 	bank,g.id_pelayanan,IFNULL(b.id_bank,'') as id_bank,g.pasien, g.id_pendapatan, g.kode_pelanggan FROM (	
                
                SELECT (d.tgl_verifikasi) tgl_input, ps.nama pasien, ps.no_rm, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan, c.kode_pelanggan
                FROM pelayanan p, staff s,pendapatan_kasir d,pasien ps, cara_bayar c
                WHERE p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan and c.id_cara_bayar = p.cara_bayar
                and p.status=1
                and p.cara_bayar != '42'
                and d.selisih != 0 and d.status=1 
                and d.tipe ='SELISIH'
                and d.id_pelayanan ='$id'
                group by d.id_pendapatan
                ) as g
                
                left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
                as b on g.id_pendapatan = b.id_pendapatan
          
            UNION ALL
    
            SELECT h.total total_akun, h.keterangan,IFNULL(c.nama_bank,' ') as bank,h.id_pelayanan,IFNULL(c.id_bank,' ') as id_bank,h.pasien, h.id_pendapatan, h.kode_pelanggan FROM (
                
                SELECT (d.tgl_verifikasi) tgl_input, ps.nama pasien, ps.no_rm, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan,d.id_pelayanan, c.kode_pelanggan
                FROM pelayanan p, staff s,pendapatan_kasir d,pasien ps, cara_bayar c
                WHERE p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan and c.id_cara_bayar = p.cara_bayar
                and p.status=1
                and p.cara_bayar != '42'
                and d.status=1 
                and d.tipe !='SELISIH' and d.keterangan !='asuransi'
                and d.id_pelayanan ='$id'
                group by d.id_pendapatan
                ) as h
                left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
                as c on h.id_pendapatan = c.id_pendapatan
             ) as data
    
            group by id_pendapatan
        ")->result();


        return $hasil;
    }
    public function select_selisih_nontunai($no_dok)
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT sum(debet) total FROM jurnal_cara_pembayaran where cara_klaim ='SELISIH' and no_jurnal='$no_dok'")->row();
    }
    public function select_selisih_idpel($no_dok, $id_pel)
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT sum(debet) total FROM jurnal_cara_pembayaran where cara_klaim ='SELISIH' and no_jurnal='$no_dok' and id_jurnal ='$id_pel' group by no_jurnal,id_jurnal")->row();
    }
    public function selectJurnalNontunai($no_dok)
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT a.*,ifnull(b.selisih_diskon,0) selisih_diskon, (a.total-ifnull(b.selisih_diskon,0)) sisa, id_vendor FROM
        (SELECT sum(kredit) total, id_fk, no_jurnal,jenis,pk,jk,id_vendor FROM jurnal_pendapatan where jenis ='304' and no_jurnal='$no_dok') as a 
        left join 
        (SELECT sum(debet) selisih_diskon,no_jurnal FROM jurnal_cara_pembayaran where no_jurnal='$no_dok' and rekening != '113.01.000') as b
        on a.no_jurnal = b.no_jurnal
        having sisa is not null
        ")->row();
    }
    public function SelectRajalNonTunai_pasien($mulai, $akhir, $jenis)
    {
        return $this->db->query("SELECT a.*, c.nama vendor from jurnal_cara_pembayaran a, cara_bayar c 
        where a.id_vendor = c.kode_pelanggan and (date(a.tgl) between '$mulai' and '$akhir') 
        and a.rekening ='113.01.000' and a.status_piutang = 0 and a.jenis_jurnal='$jenis'")->result();
    }


    ////////JURNAL PIUTANG///////////////////////////////////////////////////
    public function SelectJurnal_NonTunai($id)
    {
        return $this->db->query("SELECT a.*, c.nama vendor from jurnal_cara_pembayaran a, cara_bayar c 
        where a.id_vendor = c.kode_pelanggan and a.rekening ='113.01.000' and a.no_jurnal = '$id'")->row();
    }
    public function Select_Sum_Jurnal_NonTunai($id)
    {
        return $this->db->query("SELECT sum(kredit) total, cara_klaim, id_vendor from jurnal_piutang 
        where no_jurnal = '$id'")->row();
    }

    public function SelectRangeLaporanSummary($first_date, $second_date, $jenis)
    {
        $tgl = date("Y-m-d");
        if ($jenis == 'PYMHD') {
            return $this->db->query("SELECT * FROM(SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk,ket_bayar, c.nama cara_klaim 
            from jurnal_cara_pembayaran j
            join cara_bayar c on j.id_vendor = c.kode_pelanggan
            where (date(tgl) BETWEEN '$first_date' and '$second_date') and ket_bayar ='non tunai' and verifikasi =1 
            group by no_jurnal
            ) as a
            
           ")->result();
        } else {
            return $this->db->query("SELECT * FROM(
            SELECT tgl,no_jurnal,sum(debet) total, staff,jk,pk,ket_bayar , cara_klaim
            from jurnal_piutang where (date(tgl) BETWEEN '$first_date' and '$second_date') and verifikasi =1 
            group by no_jurnal
            ) as b
           ")->result();
        }
    }

    public function getDetail($no_jurnal)
    {
        return $this->db->query("SELECT a.*,(a.total-a.selisih-a.reduksi) tagihan FROM(
            SELECT a.id_pelayanan,j.no_jurnal , a.tgl_masuk, u.tgl tgl_keluar,  p.no_rm, p.nama,p.no_id_lain,p.nama_ibu,p.nama_ayah, (j.total_akun) total, sum(if(c.cara_klaim ='SELISIH',c.debet,0)) selisih,sum(if(c.cara_klaim ='REDUKSI',c.debet,if(u.cara_klaim ='REDUKSI',u.debet,0))) reduksi, j.konsul, j.tindakan, j.adm, j.radiologi, j.labor,j.obat,j.obat_ranap,j.ppn_obat,j.visite, u.jenis_jurnal, j.dokter, j.poli
            from pelayanan a
            join pasien p on a.id_pasien = p.no_rm
            join (
                select id_pelayanan,no_jurnal,sum(total_akun) total_akun,
                sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='910' or SUBSTRING_INDEX(kode_akun, '.', -1) ='911' or SUBSTRING_INDEX(kode_akun, '.', -1) ='210' or SUBSTRING_INDEX(kode_akun, '.', -1) ='221' or SUBSTRING_INDEX(kode_akun, '.', -1) ='230',total_akun,0)) adm,
                sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='110' or SUBSTRING_INDEX(kode_akun, '.', -1) ='111',total_akun,0)) konsul,
                sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='121',total_akun,0)) visite,
                sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='130' or SUBSTRING_INDEX(kode_akun, '.', -1) ='131' or SUBSTRING_INDEX(kode_akun, '.', -1) ='310' or SUBSTRING_INDEX(kode_akun, '.', -1) ='311' or SUBSTRING_INDEX(kode_akun, '.', -1) ='941',total_akun,0)) tindakan, 
                
                sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='720' or SUBSTRING_INDEX(kode_akun, '.', -1) ='721' or SUBSTRING_INDEX(kode_akun, '.', -1) ='710' or SUBSTRING_INDEX(kode_akun, '.', -1) ='711',total_akun,0)) radiologi,
                sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='810' or SUBSTRING_INDEX(kode_akun, '.', -1) ='811',total_akun,0)) labor,
                sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='420' or SUBSTRING_INDEX(kode_akun, '.', -1) ='430' ,total_akun,0)) obat ,
                sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='421' or SUBSTRING_INDEX(kode_akun, '.', -1) ='431' or SUBSTRING_INDEX(kode_akun, '.', -1) ='424' or SUBSTRING_INDEX(kode_akun, '.', -1) ='434',total_akun,0)) obat_ranap ,
                sum(if(kode_akun ='409.01.000',total_akun,0)) ppn_obat,
                SUBSTRING(GROUP_CONCAT(DISTINCT if(SUBSTRING_INDEX(kode_akun, '.', -1) ='110' or SUBSTRING_INDEX(kode_akun, '.', -1) ='111' or SUBSTRING_INDEX(kode_akun, '.', -1) ='810' or SUBSTRING_INDEX(kode_akun, '.', -1) ='720' or SUBSTRING_INDEX(kode_akun, '.', -1) ='121' or SUBSTRING_INDEX(kode_akun, '.', -1) ='210',dokter,'') SEPARATOR ', '),3) dokter,
                SUBSTRING(GROUP_CONCAT(DISTINCT  if(SUBSTRING_INDEX(kode_akun, '.', -1) ='110' or SUBSTRING_INDEX(kode_akun, '.', -1) ='111' or SUBSTRING_INDEX(kode_akun, '.', -1) ='810' or SUBSTRING_INDEX(kode_akun, '.', -1) ='720' or SUBSTRING_INDEX(kode_akun, '.', -1) ='121' or SUBSTRING_INDEX(kode_akun, '.', -1) ='210',poli,'') SEPARATOR ', '),3) poli
                
                from akun_tindakan
                where status = 1 and cara_bayar != 42
                group by id_pelayanan) j on a.id_pelayanan = j.id_pelayanan
                
            join jurnal_piutang u on j.no_jurnal=u.id_fk
            left join jurnal_cara_pembayaran c on a.id_pelayanan = c.id_jurnal and c.no_jurnal = j.no_jurnal
    
            where a.cara_bayar != 42
            and u.no_jurnal ='$no_jurnal'
            group by a.id_pelayanan
            
            ) as a
                
                UNION ALL
            SELECT b.*,'-' as dokter, '-' as poli,(b.total-b.selisih-b.reduksi) tagihan FROM(
                SELECT a.id_pelayanan,a.no_jurnal , a.tgl_masuk, u.tgl tgl_keluar,  '' as no_rm, a.nama_pasien nama,'-' as no_id_lain,'' as nama_ibu,'' as nama_ayah, (a.total_akun) total, sum(if(c.cara_klaim ='SELISIH',c.debet,0)) selisih,(if(c.cara_klaim ='REDUKSI',(c.debet),if(t.cara_klaim ='REDUKSI',(t.debet),0))) reduksi, a.konsul, a.tindakan, a.adm, a.radiologi, a.labor,a.obat,a.obat_ranap,a.ppn_obat, a.visite, u.jenis_jurnal
            from jurnal_piutang u  
            
            join (
                select id_pelayanan,nama_pasien,tgl_masuk,no_jurnal,sum(total_akun) total_akun,
                sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='910' or SUBSTRING_INDEX(kode_akun, '.', -1) ='911' or SUBSTRING_INDEX(kode_akun, '.', -1) ='210' or SUBSTRING_INDEX(kode_akun, '.', -1) ='221' or SUBSTRING_INDEX(kode_akun, '.', -1) ='230',total_akun,0)) adm,
                  sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='110' or SUBSTRING_INDEX(kode_akun, '.', -1) ='111',total_akun,0)) konsul, 
                sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='121',total_akun,0)) visite,
                sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='130' or SUBSTRING_INDEX(kode_akun, '.', -1) ='131' or SUBSTRING_INDEX(kode_akun, '.', -1) ='310' or SUBSTRING_INDEX(kode_akun, '.', -1) ='941' or SUBSTRING_INDEX(kode_akun, '.', -1) ='340',total_akun,0)) tindakan, 
                
                sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='720' or SUBSTRING_INDEX(kode_akun, '.', -1) ='721' or SUBSTRING_INDEX(kode_akun, '.', -1) ='710' or SUBSTRING_INDEX(kode_akun, '.', -1) ='711',total_akun,0)) radiologi,
                sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='810' or SUBSTRING_INDEX(kode_akun, '.', -1) ='811',total_akun,0)) labor,
                sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='420' or SUBSTRING_INDEX(kode_akun, '.', -1) ='430' ,total_akun,0)) obat ,
                sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='421' or SUBSTRING_INDEX(kode_akun, '.', -1) ='431' or SUBSTRING_INDEX(kode_akun, '.', -1) ='424' or SUBSTRING_INDEX(kode_akun, '.', -1) ='434',total_akun,0)) obat_ranap ,
                sum(if(kode_akun ='409.01.000',total_akun,0)) ppn_obat
                from akun_non_pelayanan 
                where status = 1 and cara_bayar != 42
                group by id_pelayanan) a on a.no_jurnal=u.id_fk
                
            left join jurnal_cara_pembayaran c on a.id_pelayanan = c.id_jurnal and c.no_jurnal = a.no_jurnal
            left join jurnal_piutang t on a.no_jurnal=t.id_fk and a.id_pelayanan = t.id_jurnal and t.cara_klaim ='REDUKSI'

            where u.no_jurnal ='$no_jurnal'
            group by a.id_pelayanan
            ) as b

            -- UNION ALL
            -- SELECT * FROM(
            -- SELECT a.id_pelayanan,j.no_jurnal , a.tgl_masuk, c.tgl tgl_keluar,  p.no_rm, p.nama, (j.total_akun) total, sum(if(c.cara_klaim ='SELISIH',c.debet,0)) selisih,sum(if(c.cara_klaim ='REDUKSI',c.debet,0)) reduksi, j.konsul, j.tindakan, j.adm, j.radiologi, j.labor,j.obat,j.ppn_obat,j.visite
            -- from pelayanan a
            -- join pasien p on a.id_pasien = p.no_rm
            -- join (
            --     select id_pelayanan,no_jurnal,sum(total_akun) total_akun,
            --     sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='910' or SUBSTRING_INDEX(kode_akun, '.', -1) ='911' or SUBSTRING_INDEX(kode_akun, '.', -1) ='210',total_akun,0)) adm,
            --     sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='110' or SUBSTRING_INDEX(kode_akun, '.', -1) ='111',total_akun,0)) konsul,
            --     sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='121',total_akun,0)) visite,
            --     sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='130' or SUBSTRING_INDEX(kode_akun, '.', -1) ='131' or SUBSTRING_INDEX(kode_akun, '.', -1) ='310',total_akun,0)) tindakan, 
                
            --     sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='720' or SUBSTRING_INDEX(kode_akun, '.', -1) ='721',total_akun,0)) radiologi,
            --     sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='810' or SUBSTRING_INDEX(kode_akun, '.', -1) ='811',total_akun,0)) labor,
            --     sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='420' or SUBSTRING_INDEX(kode_akun, '.', -1) ='421' or SUBSTRING_INDEX(kode_akun, '.', -1) ='430' or SUBSTRING_INDEX(kode_akun, '.', -1) ='431' or SUBSTRING_INDEX(kode_akun, '.', -1) ='424' or SUBSTRING_INDEX(kode_akun, '.', -1) ='434',total_akun,0)) obat ,
            --     sum(if(kode_akun ='409.01.000',total_akun,0)) ppn_obat
            --     from akun_tindakan
            --     where status = 1 and cara_bayar != 42
            --     group by id_pelayanan) j on a.id_pelayanan = j.id_pelayanan
         
            -- join jurnal_cara_pembayaran c on a.id_pelayanan = c.id_jurnal and c.no_jurnal = j.no_jurnal
    
            -- where a.cara_bayar != 42
            -- and c.no_jurnal ='$no_jurnal'
            -- group by a.id_pelayanan
            
            -- ) as z
                
            --     UNION ALL
            -- SELECT * FROM(
            --     SELECT a.id_pelayanan,a.no_jurnal , a.tgl_masuk, c.tgl tgl_keluar,  '' as no_rm, a.nama_pasien nama, (a.total_akun) total, sum(if(c.cara_klaim ='SELISIH',c.debet,0)) selisih,sum(if(c.cara_klaim ='REDUKSI',c.debet,0)) reduksi, a.konsul, a.tindakan, a.adm, a.radiologi, a.labor,a.obat,a.ppn_obat, a.visite
            -- from jurnal_cara_pembayaran c  
            
            -- join (
            --     select id_pelayanan,nama_pasien,tgl_masuk,no_jurnal,sum(total_akun) total_akun,
            --     sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='910' or SUBSTRING_INDEX(kode_akun, '.', -1) ='911' or SUBSTRING_INDEX(kode_akun, '.', -1) ='210',total_akun,0)) adm,
            --       sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='110' or SUBSTRING_INDEX(kode_akun, '.', -1) ='111',total_akun,0)) konsul, 
            --     sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='121',total_akun,0)) visite,
            --     sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='130' or SUBSTRING_INDEX(kode_akun, '.', -1) ='131' or SUBSTRING_INDEX(kode_akun, '.', -1) ='310',total_akun,0)) tindakan, 
                
            --     sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='720' or SUBSTRING_INDEX(kode_akun, '.', -1) ='721',total_akun,0)) radiologi,
            --     sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='810' or SUBSTRING_INDEX(kode_akun, '.', -1) ='811',total_akun,0)) labor,
            --     sum(if(SUBSTRING_INDEX(kode_akun, '.', -1) ='420' or SUBSTRING_INDEX(kode_akun, '.', -1) ='421' or SUBSTRING_INDEX(kode_akun, '.', -1) ='430' or SUBSTRING_INDEX(kode_akun, '.', -1) ='431' or SUBSTRING_INDEX(kode_akun, '.', -1) ='424' or SUBSTRING_INDEX(kode_akun, '.', -1) ='434',total_akun,0)) obat ,
            --     sum(if(kode_akun ='409.01.000',total_akun,0)) ppn_obat
            --     from akun_non_pelayanan 
            --     where status = 1 and cara_bayar != 42
            --     group by id_pelayanan) a on a.no_jurnal=c.no_jurnal
                
            --  where c.no_jurnal ='$no_jurnal'
            -- group by a.id_pelayanan
            -- ) as y

           
       order by tgl_masuk

        ")->result_array();
    }

    public function getKelas($id_pel)
    {
        return $this->db->query("SELECT r.kelas from history_pelayanan_ranap h, ruangan r where h.id_kamar = r.id_ruangan and h.id_pelayanan ='$id_pel'")->row();
    }
}
