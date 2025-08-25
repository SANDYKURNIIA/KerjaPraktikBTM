<?php

class M_Jurnal_pembayaran_utang extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function SelectBuktiKas($first_date, $second_date)
    {
        $data_staff = $this->session->userdata('data_auth');

        $tgl = date("Y-m-d");

        $this->db->select('tgl,no_dokumen,vendor,staff,status_direktur,status_verifikasi,pembayaran,sum(debet) total,sum(kredit) kredit');
        $this->db->from('detail_hutang_bukti_kas');

        $this->db->where('pembayaran is not null');
        $this->db->where('ket_jurnal', 0);

        if ($first_date != '' || $second_date != '') {
            $this->db->where("(DATE(tgl) BETWEEN '$first_date' and '$second_date')");
        } else {
            $this->db->like('tgl', $tgl);
        }
        $this->db->group_by('no_dokumen');
        return $this->db->get()->result();
    }
    public function selectPembayaranUtang($first_date, $second_date)
    {
        $data_staff = $this->session->userdata('data_auth');

        $tgl = date("Y-m-d");

        $this->db->select('tgl,no_jurnal,staff,pk,jk,sum(debet) total,sum(kredit) kredit');
        $this->db->from('jurnal_pembayaran_utang');

        // $this->db->where('pembayaran is not null');
        $this->db->where('status', 0);

        if ($first_date != '' || $second_date != '') {
            $this->db->where("(DATE(tgl) BETWEEN '$first_date' and '$second_date')");
        } else {
            $this->db->like('tgl', $tgl);
        }
        $this->db->group_by('no_jurnal');
        return $this->db->get()->result();
    }
    public function get_PembayaranUtang($no_dokumen)
    {
        return $this->db->query("SELECT akun,debet,kredit,deskripsi,'' as ket,pk,no_dokumen,pembayaran
        from detail_hutang_bukti_kas
        where no_dokumen = '$no_dokumen' and pembayaran is not null
        UNION
        select * from(select d.pembayaran akun,0 as debet,(sum(d.debet) - SUM(d.kredit)) as kredit,s.deskripsi,'' as ket, d.no_dokumen pk,d.no_dokumen,'' as pembayaran
        from detail_hutang_bukti_kas d, daftar_akun_saldo_awal s
        where d.pembayaran = s.kode and d.no_dokumen = '$no_dokumen' and pembayaran is not null
             group by no_dokumen)
        as tabel1
        ")->result();
    }
    public function getJurnalPembayaranUtang($no_dokumen)
    {
        return $this->db->query("SELECT * from jurnal_pembayaran_utang
        where no_jurnal = '$no_dokumen'
        order by  rekening
        ")->result_array();
    }
    public function selectLaporanPembayaranUtang($first_date, $second_date)
    {
        $data_staff = $this->session->userdata('data_auth');

        $tgl = date("Y-m-d");

        $this->db->select('tgl,no_jurnal,staff,pk,jk,sum(debet) total,sum(kredit) kredit');
        $this->db->from('jurnal_pembayaran_utang');

        // $this->db->where('pembayaran is not null');
        $this->db->where('status', 1);

        if ($first_date != '' || $second_date != '') {
            $this->db->where("(DATE(tgl) BETWEEN '$first_date' and '$second_date')");
        } else {
            $this->db->like('tgl', $tgl);
        }
        $this->db->group_by('no_jurnal');
        return $this->db->get()->result();
    }
    public function SelectPembayaranPiutang($first_date, $second_date, $tipe)
    {
        $tgl = date("Y-m-d");

        $this->db->select('p.tgl,p.no_dokumen,p.vendor,p.staff,p.status_verifikasi,p.save,p.pembayaran,ifnull(sum(d.debet),0) total,ifnull(sum(d.kredit),0) kredit');
        $this->db->from('pembayaran_piutang p');
        $this->db->join('detail_pembayaran_piutang d', 'd.id_fk = p.no_dokumen', 'left');
        if ($tipe == 'verif') {
            $this->db->where('p.save', 2);
        } else {
            if ($tipe == 'non_verif') {
                $this->db->where('p.tipe', 'non_verif');
            } else {
                $this->db->where('p.tipe', 'kasbank');
            }
            $this->db->where_not_in('p.save', 0);
        }
        if ($first_date != '' || $second_date != '') {
            $this->db->where("(DATE(p.tgl) BETWEEN '$first_date' and '$second_date')");
        } else {
            $this->db->like('p.tgl', $tgl);
        }
        $this->db->group_by('p.no_dokumen');
        return $this->db->get()->result();
    }
    public function Select_aging($jenis, $bulan)
    {
        $date = date("Y-m-d", strtotime('-1 second', strtotime('+1 month', strtotime($bulan . '-01'))));
        if ($jenis == 'pymhd') {
            return $this->db->query("SELECT id_vendor,cara_klaim, 
                SUM(IF(days_past_due BETWEEN 0 AND 30, amount_due, 0)) as `0_30`,
                SUM(IF(days_past_due BETWEEN 31 AND 90, amount_due, 0)) as `31_90`,
                SUM(IF(days_past_due BETWEEN 91 AND 180, amount_due, 0)) as `91_180`,    
                SUM(IF(days_past_due BETWEEN 181 AND 365, amount_due, 0)) as `181_365`,
                SUM(IF(days_past_due BETWEEN 366 AND 730, amount_due, 0)) as `366_730`,
                SUM(IF(days_past_due > 730, amount_due, 0)) as `>730`
                FROM (
                    SELECT j.no_jurnal, sum(j.debet) amount_due,c.nama cara_klaim, j.id_vendor,DATEDIFF(CURDATE(), j.tgl ) AS days_past_due
                    from jurnal_cara_pembayaran j, cara_bayar c
                    where j.id_vendor = c.kode_pelanggan
                    and j.status_piutang != 1 and j.ket_bayar = 'non tunai'
                    group by j.no_jurnal
            
                )as gabung
                GROUP BY id_vendor
            ")->result_array();
        }
        if ($jenis == 'utang') {
            return $this->db->query("SELECT id_vendor,cara_klaim, 
            SUM(IF(days_past_due BETWEEN 0 AND 30, amount_due, 0)) as `0_30`,
            SUM(IF(days_past_due BETWEEN 31 AND 90, amount_due, 0)) as `31_90`,
            SUM(IF(days_past_due BETWEEN 91 AND 180, amount_due, 0)) as `91_180`,    
            SUM(IF(days_past_due BETWEEN 181 AND 365, amount_due, 0)) as `181_365`,
            SUM(IF(days_past_due BETWEEN 366 AND 730, amount_due, 0)) as `366_730`,
            SUM(IF(days_past_due > 730, amount_due, 0)) as `>730`
            FROM (
                SELECT j.no_jurnal, sum(j.kredit) utang,sum(IFNULL(d.total,0)) dibayar,(sum(j.kredit)-sum(IFNULL(d.total,0))) amount_due,c.nama_produsen cara_klaim, j.id_vendor,DATEDIFF('2024-12-31', j.tgl ) AS days_past_due
                from jurnal_pembayaran_farmasi j
                join produsen c on j.id_vendor = c.kode
                left join (SELECT sum(debet) total, id_jurnal 
                 from detail_hutang_bukti_kas 
                 where save =2 and  ket_jurnal =1 and tgl_verifikasi<='$date'
                 group by id_jurnal
                 ) d on j.id_jurnal= d.id_jurnal
                where j.jenis_jurnal = 'hutang' and j.tgl between '2024-07-01' and '$date' and j.status='DITERIMA'
                group by j.no_jurnal
                having amount_due >0
        
            )as gabung
            GROUP BY id_vendor  
            ")->result_array();
        } else {
            return $this->db->query("SELECT id_vendor,cara_klaim, 
                SUM(IF(days_past_due BETWEEN 0 AND 30, amount_due, 0)) as `0_30`,
                SUM(IF(days_past_due BETWEEN 31 AND 90, amount_due, 0)) as `31_90`,
                SUM(IF(days_past_due BETWEEN 91 AND 180, amount_due, 0)) as `91_180`,    
                SUM(IF(days_past_due BETWEEN 181 AND 365, amount_due, 0)) as `181_365`,
                SUM(IF(days_past_due BETWEEN 366 AND 730, amount_due, 0)) as `366_730`,
                SUM(IF(days_past_due > 730, amount_due, 0)) as `>730`
                FROM (
                    SELECT j.no_jurnal, sum(j.debet) amount_due,c.nama cara_klaim, j.id_vendor,DATEDIFF(CURDATE(), j.tgl ) AS days_past_due
                    from jurnal_piutang j, cara_bayar c
                    where j.id_vendor = c.kode_pelanggan
                    and j.status_piutang != 1
                    group by j.no_jurnal
            
                )as gabung
                GROUP BY id_vendor
            ")->result_array();
        }
    }
}
