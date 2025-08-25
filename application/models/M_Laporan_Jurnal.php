<?php

class M_Laporan_Jurnal extends CI_Model
{

        public function trial_balance($mulai, $akhir)
        {
                date_default_timezone_set('Asia/Jakarta');

                // $vbulan = date("m", strtotime($mulai)); //format bulan 
                // $vtahun = date('Y', strtotime($mulai)); //format tahun 

                $date1 = strtotime($mulai . '-01');
                $date2 = strtotime($akhir . '-01');

                $result = strtotime('-1 second', $date1);
                $lastYear = date("Y", $result); //tahun akhir bulan sebelumnya
                $lastmonth = date("m", $result); //bulan akhir bulan sebelumnya

                $akhir_bulan = strtotime('-1 second', strtotime('+1 month', $date2)); //tgl akhir bulan
                $tgl_akhir_bulan = date("Y-m-d", $akhir_bulan); //format bulan 
                $tgl_awal_bulan = date("Y-m-d", $date1); //format bulan 


                return $this->db->query("SELECT rekening, sum(saldo_awal) saldo_awal, sum(debet) debet, sum(kredit) kredit, (sum(saldo_awal) + sum(debet) - sum(kredit)) saldo_akhir from(
                SELECT rekening , saldo_akhir as saldo_awal, 0 as debet, 0 as kredit,0 as saldo_akhir 
                from trial_balance
                where bulan ='$lastmonth' and tahun ='$lastYear' and (rekening not like'7%' and rekening not like'8%')
                union all
                SELECT if(rekening like '7%' or rekening like '8%','605.01.000',rekening) rekening,0 as saldo_awal, debet, kredit, 0 as saldo_akhir from (
                select rekening,sum(debet)debet, sum(kredit) kredit from(
                        select d.rekening, debet, d.kredit
                        from detail_jurnal_kas_bank d, jurnal_kas_bank j
                        where d.no_jurnal = j.no_jurnal and (date(j.tgl_verifikasi) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and j.verifikasi='DITERIMA'               
                UNION ALL
                        SELECT rekening, debet, kredit
                        FROM jurnal_cara_pembayaran
                        where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and verifikasi =1            
                UNION ALL        
                                SELECT rekening, debet, kredit
                                FROM jurnal_pendapatan
                        where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan')
                        and no_jurnal in(SELECT no_jurnal from jurnal_cara_pembayaran where verifikasi = 1)         
                UNION ALL
                        select rekening, debet , kredit
                        from jurnal_pau
                        where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan')     
                UNION ALL
                        select d.rekening, d.debet , d.kredit
                        from detail_jurnal_rupa d, jurnal_rupa j
                        where d.id_jurnal = j.id_jurnal and (date(j.tanggal) between '$tgl_awal_bulan' and '$tgl_akhir_bulan')
                        and j.verifikasi='DITERIMA'         
                UNION ALL             
                        select rekening, debet, kredit
                        from jurnal_material
                        where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and status='DITERIMA'  
                UNION ALL
                        select rekening, debet, kredit
                        from jurnal_material_persediaan
                        where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and status='DITERIMA'   
                UNION ALL
                        SELECT rekening, debet, kredit
                        FROM jurnal_farmasi
                        where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and no_jurnal in (SELECT no_jurnal from jurnal_pembayaran_farmasi where status='DITERIMA')
                union all
                SELECT rekening,debet,  kredit
                FROM jurnal_pembayaran_farmasi 
                where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and status='DITERIMA'           
                UNION ALL
                SELECT rekening, debet, kredit
                FROM jurnal_penyusutan 
                where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan')
                union ALL
                        SELECT rekening, debet, kredit
                        FROM jurnal_akumulasi_penyusutan
                        where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') 
                UNION ALL
                        SELECT rekening, debet, kredit
                        FROM jurnal_bank b, jurnal_kas_bank j
                        where b.no_jurnal = j.no_jurnal AND (date(j.tanggal) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and j.verifikasi='DITERIMA'                      
                UNION ALL
                        select rekening, debet,kredit
                        from jurnal_piutang j
                        where (date(j.tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and j.verifikasi =1    
                ) as a
                group by rekening
                ) as gabung
                ) as gabungall
                group by rekening
                order by rekening asc")->result_array();
        }
        public function pendapatan_layanan($mulai, $akhir)
        {
                date_default_timezone_set('Asia/Jakarta');

                // $vbulan = date("m", strtotime($mulai)); //format bulan 
                // $vtahun = date('Y', strtotime($mulai)); //format tahun 

                $date1 = strtotime($mulai . '-01');
                $date2 = strtotime($akhir . '-01');

                $result = strtotime('-1 second', $date1);
                $lastYear = date("Y", $result); //tahun akhir bulan sebelumnya
                $lastmonth = date("m", $result); //bulan akhir bulan sebelumnya

                $akhir_bulan = strtotime('-1 second', strtotime('+1 month', $date2)); //tgl akhir bulan
                $tgl_akhir_bulan = date("Y-m-d", $akhir_bulan); //format bulan 
                $tgl_awal_bulan = date("Y-m-d", $date1); //format bulan 


                return $this->db->query("SELECT rekening, sum(saldo_awal) saldo_awal, sum(debet) debet, sum(kredit) kredit, (sum(saldo_awal) + sum(debet) - sum(kredit)) saldo_akhir from(
                SELECT rekening , saldo_akhir as saldo_awal, 0 as debet, 0 as kredit,0 as saldo_akhir 
                from trial_balance
                where bulan ='$lastmonth' and tahun ='$lastYear' and (rekening like'7%' or rekening like'8%') and (rekening not like'7xx%' and rekening not like'8xx%')
                union all
                SELECT if(rekening = '707.02.040' or rekening ='707.02.966',rekening,concat(SUBSTRING_INDEX(rekening, '.',1),'.xx.xxx')) rekening,0 as saldo_awal, debet, kredit, 0 as saldo_akhir from (
                select rekening,sum(debet)debet, sum(kredit) kredit from(
                        select d.rekening, debet, d.kredit
                        from detail_jurnal_kas_bank d, jurnal_kas_bank j
                        where d.no_jurnal = j.no_jurnal and (date(j.tgl_verifikasi) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and j.verifikasi='DITERIMA'               
                UNION ALL
                        SELECT rekening, debet, kredit
                        FROM jurnal_cara_pembayaran
                        where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and verifikasi =1            
                UNION ALL        
                                SELECT rekening, debet, kredit
                                FROM jurnal_pendapatan
                        where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan')
                        and no_jurnal in(SELECT no_jurnal from jurnal_cara_pembayaran where verifikasi = 1)         
                UNION ALL
                        select rekening, debet , kredit
                        from jurnal_pau
                        where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan')     
                UNION ALL
                        select d.rekening, d.debet , d.kredit
                        from detail_jurnal_rupa d, jurnal_rupa j
                        where d.id_jurnal = j.id_jurnal and (date(j.tanggal) between '$tgl_awal_bulan' and '$tgl_akhir_bulan')
                        and j.verifikasi='DITERIMA'         
                UNION ALL             
                        select rekening, debet, kredit
                        from jurnal_material
                        where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and status='DITERIMA'  
                UNION ALL
                        select rekening, debet, kredit
                        from jurnal_material_persediaan
                        where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and status='DITERIMA'   
                UNION ALL
                        SELECT rekening, debet, kredit
                        FROM jurnal_farmasi
                        where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and no_jurnal in (SELECT no_jurnal from jurnal_pembayaran_farmasi where status='DITERIMA')
                union all
                SELECT rekening,debet,  kredit
                FROM jurnal_pembayaran_farmasi 
                where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and status='DITERIMA'           
                UNION ALL
                SELECT rekening, debet, kredit
                FROM jurnal_penyusutan 
                where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan')
                union ALL
                        SELECT rekening, debet, kredit
                        FROM jurnal_akumulasi_penyusutan
                        where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') 
                UNION ALL
                        SELECT rekening, debet, kredit
                        FROM jurnal_bank b, jurnal_kas_bank j
                        where b.no_jurnal = j.no_jurnal AND (date(j.tanggal) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and j.verifikasi='DITERIMA'                      
                UNION ALL
                        select rekening, debet,kredit
                        from jurnal_piutang j
                        where (date(j.tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and j.verifikasi =1    
                ) as a
                where rekening like'7%' or rekening like'8%'
                group by rekening
                ) as gabung
                ) as gabungall
                group by rekening
                order by rekening asc")->result_array();
        }
        public function pendapatan_jenis($mulai, $akhir)
        {
                date_default_timezone_set('Asia/Jakarta');

                // $vbulan = date("m", strtotime($mulai)); //format bulan 
                // $vtahun = date('Y', strtotime($mulai)); //format tahun 

                $date1 = strtotime($mulai . '-01');
                $date2 = strtotime($akhir . '-01');

                $result = strtotime('-1 second', $date1);
                $lastYear = date("Y", $result); //tahun akhir bulan sebelumnya
                $lastmonth = date("m", $result); //bulan akhir bulan sebelumnya

                $akhir_bulan = strtotime('-1 second', strtotime('+1 month', $date2)); //tgl akhir bulan
                $tgl_akhir_bulan = date("Y-m-d", $akhir_bulan); //format bulan 
                $tgl_awal_bulan = date("Y-m-d", $date1); //format bulan 


                return $this->db->query("SELECT rekening, sum(saldo_awal) saldo_awal, sum(debet) debet, sum(kredit) kredit, (sum(saldo_awal) + sum(debet) - sum(kredit)) saldo_akhir from(
                SELECT rekening , saldo_akhir as saldo_awal, 0 as debet, 0 as kredit,0 as saldo_akhir 
                from trial_balance
                where bulan ='$lastmonth' and tahun ='$lastYear' and (rekening like'7xx%' or rekening like'8xx%')
                union all
                SELECT concat(SUBSTRING(SUBSTRING_INDEX(rekening, '.',1),1,1),'xx.xx.',SUBSTRING_INDEX(rekening, '.',-1)) rekening,0 as saldo_awal, debet, kredit, 0 as saldo_akhir from (
                select rekening,sum(debet)debet, sum(kredit) kredit from(
                        select d.rekening, debet, d.kredit
                        from detail_jurnal_kas_bank d, jurnal_kas_bank j
                        where d.no_jurnal = j.no_jurnal and (date(j.tgl_verifikasi) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and j.verifikasi='DITERIMA'               
                UNION ALL
                        SELECT rekening, debet, kredit
                        FROM jurnal_cara_pembayaran
                        where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and verifikasi =1            
                UNION ALL        
                                SELECT rekening, debet, kredit
                                FROM jurnal_pendapatan
                        where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan')
                        and no_jurnal in(SELECT no_jurnal from jurnal_cara_pembayaran where verifikasi = 1)         
                UNION ALL
                        select rekening, debet , kredit
                        from jurnal_pau
                        where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan')     
                UNION ALL
                        select d.rekening, d.debet , d.kredit
                        from detail_jurnal_rupa d, jurnal_rupa j
                        where d.id_jurnal = j.id_jurnal and (date(j.tanggal) between '$tgl_awal_bulan' and '$tgl_akhir_bulan')
                        and j.verifikasi='DITERIMA'         
                UNION ALL             
                        select rekening, debet, kredit
                        from jurnal_material
                        where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and status='DITERIMA'  
                UNION ALL
                        select rekening, debet, kredit
                        from jurnal_material_persediaan
                        where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and status='DITERIMA'   
                UNION ALL
                        SELECT rekening, debet, kredit
                        FROM jurnal_farmasi
                        where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and no_jurnal in (SELECT no_jurnal from jurnal_pembayaran_farmasi where status='DITERIMA')
                union all
                SELECT rekening,debet,  kredit
                FROM jurnal_pembayaran_farmasi 
                where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and status='DITERIMA'           
                UNION ALL
                SELECT rekening, debet, kredit
                FROM jurnal_penyusutan 
                where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan')
                union ALL
                        SELECT rekening, debet, kredit
                        FROM jurnal_akumulasi_penyusutan
                        where (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') 
                UNION ALL
                        SELECT rekening, debet, kredit
                        FROM jurnal_bank b, jurnal_kas_bank j
                        where b.no_jurnal = j.no_jurnal AND (date(j.tanggal) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and j.verifikasi='DITERIMA'                      
                UNION ALL
                        select rekening, debet,kredit
                        from jurnal_piutang j
                        where (date(j.tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and j.verifikasi =1    
                ) as a
                where rekening like'7%' or rekening like'8%'
                group by rekening
                ) as gabung
                ) as gabungall
                group by rekening
                order by rekening asc")->result_array();
        }

        public function pendapatan_kelompok($mulai, $akhir)
        {
                date_default_timezone_set('Asia/Jakarta');

                // $vbulan = date("m", strtotime($mulai)); //format bulan 
                // $vtahun = date('Y', strtotime($mulai)); //format tahun 

                $date1 = strtotime($mulai . '-01');
                $date2 = strtotime($akhir . '-01');

                $result = strtotime('-1 second', $date1);
                $lastYear = date("Y", $result); //tahun akhir bulan sebelumnya
                $lastmonth = date("m", $result); //bulan akhir bulan sebelumnya

                $akhir_bulan = strtotime('-1 second', strtotime('+1 month', $date2)); //tgl akhir bulan
                $tgl_akhir_bulan = date("Y-m-d", $akhir_bulan); //format bulan 
                $tgl_awal_bulan = date("Y-m-d", $date1); //format bulan 


                return $this->db->query("SELECT kelompok_LAI,sum(saldo_awal) saldo_awal, sum(debet) debet, sum(kredit) kredit, (sum(saldo_awal) + sum(debet) - sum(kredit)) saldo_akhir from(
                 SELECT keterangan kelompok_LAI, saldo_akhir as saldo_awal, 0 as debet, 0 as kredit,0 as saldo_akhir 
                from trial_balance
                where bulan ='$lastmonth' and tahun ='$lastYear' and rekening='net'
                union all
                SELECT kelompok_LAI,0 as saldo_awal, debet, kredit, 0 as saldo_akhir from (
                SELECT sum(debet)debet, sum(kredit) kredit, kelompok_pelanggan from(
                SELECT d.rekening, d.debet, d.kredit, c.kelompok_pelanggan
                         from detail_jurnal_kas_bank d, jurnal_kas_bank j,pembayaran_piutang p, cara_bayar c
                        where d.no_jurnal = j.no_jurnal and d.pk = p.no_dokumen and p.id_vendor = c.kode_pelanggan 
                        AND (date(j.tanggal) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and j.verifikasi='DITERIMA' 
                        UNION ALL
                        SELECT j.rekening, j.debet, j.kredit, c.kelompok_pelanggan 
                        FROM jurnal_cara_pembayaran j,cara_bayar c
                        where j.id_vendor = c.kode_pelanggan and (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and j.verifikasi =1 
                UNION ALL
                        SELECT j.rekening, j.debet, j.kredit, c.kelompok_pelanggan 
                        FROM jurnal_pendapatan j,cara_bayar c
                        where j.id_vendor = c.kode_pelanggan and (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and no_jurnal in(SELECT no_jurnal from jurnal_cara_pembayaran where verifikasi = 1)   
                UNION ALL
                        select d.rekening, d.debet , d.kredit, c.kelompok_pelanggan
                        from detail_jurnal_rupa d, jurnal_rupa j,cara_bayar c
                        where d.id_jurnal = j.id_jurnal and d.id_vendor = c.kode_pelanggan and (date(j.tanggal) between '$tgl_awal_bulan' and '$tgl_akhir_bulan')
                        and j.verifikasi='DITERIMA'
                UNION ALL
                        SELECT b.rekening, b.debet, b.kredit, c.kelompok_pelanggan
                        FROM jurnal_bank b, jurnal_kas_bank j, cara_bayar c
                        where b.no_jurnal = j.no_jurnal and b.id_vendor=c.kode_pelanggan AND (date(j.tanggal) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and j.verifikasi='DITERIMA'  
                ) as a
                where rekening like'70%'  
                group by kelompok_pelanggan
    
                ) as gabung
                 join coa_unit on gabung.kelompok_pelanggan = coa_unit.unit_rs

                ) as gabungall
                group by kelompok_LAI
                order by kelompok_LAI asc")->result_array();
        }
        public function pendapatan_kelompok_net($mulai, $akhir)
        {
                date_default_timezone_set('Asia/Jakarta');

                // $vbulan = date("m", strtotime($mulai)); //format bulan 
                // $vtahun = date('Y', strtotime($mulai)); //format tahun 

                $date1 = strtotime($mulai . '-01');
                $date2 = strtotime($akhir . '-01');

                $result = strtotime('-1 second', $date1);
                $lastYear = date("Y", $result); //tahun akhir bulan sebelumnya
                $lastmonth = date("m", $result); //bulan akhir bulan sebelumnya

                $akhir_bulan = strtotime('-1 second', strtotime('+1 month', $date2)); //tgl akhir bulan
                $tgl_akhir_bulan = date("Y-m-d", $akhir_bulan); //format bulan 
                $tgl_awal_bulan = date("Y-m-d", $date1); //format bulan 


                return $this->db->query("SELECT kelompok_LAI, sum(saldo_awal) saldo_awal, sum(debet) debet, sum(kredit) kredit, (sum(saldo_awal) + sum(debet) - sum(kredit)) saldo_akhir from(
                SELECT keterangan kelompok_LAI, saldo_akhir as saldo_awal, 0 as debet, 0 as kredit,0 as saldo_akhir 
                from trial_balance
                where bulan ='$lastmonth' and tahun ='$lastYear' and rekening='net'
                union all
                SELECT kelompok_LAI,0 as saldo_awal, debet, kredit, 0 as saldo_akhir from (
                SELECT sum(debet)debet, sum(kredit) kredit, kelompok_pelanggan from(
                SELECT d.rekening, d.debet, d.kredit, c.kelompok_pelanggan
                         from detail_jurnal_kas_bank d, jurnal_kas_bank j,pembayaran_piutang p, cara_bayar c
                        where d.no_jurnal = j.no_jurnal and d.pk = p.no_dokumen and p.id_vendor = c.kode_pelanggan 
                        AND (date(j.tanggal) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and j.verifikasi='DITERIMA' 
                        UNION ALL
                        SELECT j.rekening, j.debet, j.kredit, c.kelompok_pelanggan 
                        FROM jurnal_cara_pembayaran j,cara_bayar c
                        where j.id_vendor = c.kode_pelanggan and (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and j.verifikasi =1 
                UNION ALL
                        SELECT j.rekening, j.debet, j.kredit, c.kelompok_pelanggan 
                        FROM jurnal_pendapatan j,cara_bayar c
                        where j.id_vendor = c.kode_pelanggan and (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and no_jurnal in(SELECT no_jurnal from jurnal_cara_pembayaran where verifikasi = 1)   
                UNION ALL
                        select d.rekening, d.debet , d.kredit, c.kelompok_pelanggan
                        from detail_jurnal_rupa d, jurnal_rupa j,cara_bayar c
                        where d.id_jurnal = j.id_jurnal and d.id_vendor = c.kode_pelanggan and (date(j.tanggal) between '$tgl_awal_bulan' and '$tgl_akhir_bulan')
                        and j.verifikasi='DITERIMA'
                UNION ALL
                        SELECT b.rekening, b.debet, b.kredit, c.kelompok_pelanggan
                        FROM jurnal_bank b, jurnal_kas_bank j, cara_bayar c
                        where b.no_jurnal = j.no_jurnal and b.id_vendor=c.kode_pelanggan AND (date(j.tanggal) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and j.verifikasi='DITERIMA'  
                ) as a
                where rekening like'7%'  
                group by kelompok_pelanggan
    
                ) as gabung
                 join coa_unit on gabung.kelompok_pelanggan = coa_unit.unit_rs
                ) as gabungall
               
                group by kelompok_LAI
                order by kelompok_LAI asc")->result_array();
        }

        public function reduksi($mulai, $akhir)
        {
                date_default_timezone_set('Asia/Jakarta');

                // $vbulan = date("m", strtotime($mulai)); //format bulan 
                // $vtahun = date('Y', strtotime($mulai)); //format tahun 

                $date1 = strtotime($mulai . '-01');
                $date2 = strtotime($akhir . '-01');

                $result = strtotime('-1 second', $date1);
                $lastYear = date("Y", $result); //tahun akhir bulan sebelumnya
                $lastmonth = date("m", $result); //bulan akhir bulan sebelumnya

                $akhir_bulan = strtotime('-1 second', strtotime('+1 month', $date2)); //tgl akhir bulan
                $tgl_akhir_bulan = date("Y-m-d", $akhir_bulan); //format bulan 
                $tgl_awal_bulan = date("Y-m-d", $date1); //format bulan 


                return $this->db->query("SELECT 'Reduksi Pendapatan (Discount)' kelompok_LAI, sum(saldo_awal) saldo_awal, sum(debet) debet, sum(kredit) kredit, (sum(saldo_awal) + sum(debet) - sum(kredit)) saldo_akhir from(
                 SELECT saldo_akhir as saldo_awal, 0 as debet, 0 as kredit,0 as saldo_akhir 
                from trial_balance
                where bulan ='$lastmonth' and tahun ='$lastYear' and keterangan='Reduksi Pendapatan (Discount)'
                union all
                SELECT 0 as saldo_awal, debet, kredit, 0 as saldo_akhir from (
                SELECT 0 as saldo_awal,sum(debet)debet, sum(kredit) kredit, kelompok_pelanggan from(
                SELECT d.rekening, d.debet, d.kredit, c.kelompok_pelanggan
                         from detail_jurnal_kas_bank d, jurnal_kas_bank j,pembayaran_piutang p, cara_bayar c
                        where d.no_jurnal = j.no_jurnal and d.pk = p.no_dokumen and p.id_vendor = c.kode_pelanggan 
                        AND (date(j.tanggal) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and j.verifikasi='DITERIMA' 
                        UNION ALL
                        SELECT j.rekening, j.debet, j.kredit, c.kelompok_pelanggan 
                        FROM jurnal_cara_pembayaran j,cara_bayar c
                        where j.id_vendor = c.kode_pelanggan and (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and j.verifikasi =1 
                UNION ALL
                        SELECT j.rekening, j.debet, j.kredit, c.kelompok_pelanggan 
                        FROM jurnal_pendapatan j,cara_bayar c
                        where j.id_vendor = c.kode_pelanggan and (date(tgl) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and no_jurnal in(SELECT no_jurnal from jurnal_cara_pembayaran where verifikasi = 1)   
                UNION ALL
                        select d.rekening, d.debet , d.kredit, c.kelompok_pelanggan
                        from detail_jurnal_rupa d, jurnal_rupa j,cara_bayar c
                        where d.id_jurnal = j.id_jurnal and d.id_vendor = c.kode_pelanggan and (date(j.tanggal) between '$tgl_awal_bulan' and '$tgl_akhir_bulan')
                        and j.verifikasi='DITERIMA'
                UNION ALL
                        SELECT b.rekening, b.debet, b.kredit, c.kelompok_pelanggan
                        FROM jurnal_bank b, jurnal_kas_bank j, cara_bayar c
                        where b.no_jurnal = j.no_jurnal and b.id_vendor=c.kode_pelanggan AND (date(j.tanggal) between '$tgl_awal_bulan' and '$tgl_akhir_bulan') and j.verifikasi='DITERIMA'  
                ) as a
                where rekening like'72%'  
                ) as gabung
                ) as gabungall
                ")->result_array();
        }

        public function insert($page_data, $table)
        {
                $this->db->insert($table, $page_data);
                return $this->db->insert_id();
        }
        public function update($data, $where, $table)
        {
                $this->db->where($where);
                $this->db->update($table, $data);
        }
        public function delete($where, $table)
        {
                $this->db->where($where);
                $this->db->delete($table);
        }

        public function trial_balance_bulan($bulan)
        {
                date_default_timezone_set('Asia/Jakarta');

                $vbulan = date("m", strtotime($bulan)); //format bulan 
                $vtahun = date('Y', strtotime($bulan)); //format tahun 

                $date1 = strtotime($bulan . '-01');

                $result = strtotime('-1 second', $date1);
                $lastYear = date("Y", $result); //tahun akhir bulan sebelumnya
                $lastmonth = date("m", $result); //bulan akhir bulan sebelumnya

                return $this->db->query("SELECT rekening, sum(saldo_awal) saldo_awal, sum(debet) debet, sum(kredit) kredit, (sum(saldo_awal) + sum(debet) - sum(kredit)) saldo_akhir from(
                SELECT rekening , saldo_akhir as saldo_awal, 0 as debet, 0 as kredit,0 as saldo_akhir 
                from trial_balance
                where bulan ='$lastmonth' and tahun ='$lastYear'
                union all
                SELECT if(rekening like '7%' or rekening like '8%','605.01.000',rekening) rekening,0 as saldo_awal, debet, kredit, 0 as saldo_akhir from (
                select rekening,sum(debet)debet, sum(kredit) kredit from(
                        select d.rekening, debet, d.kredit
                        from detail_jurnal_kas_bank d, jurnal_kas_bank j
                        where d.no_jurnal = j.no_jurnal and j.tgl_verifikasi like '$bulan%' and j.verifikasi='DITERIMA'               
                UNION ALL
                        SELECT rekening, debet, kredit
                        FROM jurnal_cara_pembayaran
                        where tgl like '$bulan%' and verifikasi =1            
                UNION ALL        
                                SELECT rekening, debet, kredit
                                FROM jurnal_pendapatan
                        where tgl like '$bulan%'
                        and no_jurnal in(SELECT no_jurnal from jurnal_cara_pembayaran where verifikasi = 1)         
                UNION ALL
                        select rekening, debet , kredit
                        from jurnal_pau
                        where tgl like '$bulan%'     
                UNION ALL
                        select d.rekening, d.debet , d.kredit
                        from detail_jurnal_rupa d, jurnal_rupa j
                        where d.id_jurnal = j.id_jurnal and j.tanggal like '$bulan%'
                        and j.verifikasi='DITERIMA'         
                UNION ALL             
                        select rekening, debet, kredit
                        from jurnal_material
                        where tgl like '$bulan%' and status='DITERIMA'  
                UNION ALL
                        select rekening, debet, kredit
                        from jurnal_material_persediaan
                        where tgl like '$bulan%' and status='DITERIMA'   
                UNION ALL
                        SELECT rekening, debet, kredit
                        FROM jurnal_farmasi
                        where tgl like '$bulan%'and no_jurnal in (SELECT no_jurnal from jurnal_pembayaran_farmasi where status='DITERIMA')
                union all
                SELECT rekening,debet,  kredit
                FROM jurnal_pembayaran_farmasi 
                where tgl like '$bulan%' and status='DITERIMA'           
                UNION ALL
                SELECT rekening, debet, kredit
                FROM jurnal_penyusutan 
                where tgl like '$bulan%'
                union ALL
                        SELECT rekening, debet, kredit
                        FROM jurnal_akumulasi_penyusutan
                        where tgl like '$bulan%' 
                UNION ALL
                        SELECT rekening, debet, kredit
                        FROM jurnal_bank b, jurnal_kas_bank j
                        where b.no_jurnal = j.no_jurnal AND (j.tanggal) like '$bulan%' and j.verifikasi='DITERIMA'                      
                UNION ALL
                        select rekening, debet,kredit
                        from jurnal_piutang j
                        where j.tgl like '$bulan%' and j.verifikasi =1    
                ) as a
                group by rekening
                ) as gabung
                ) as gabungall
                group by rekening
                order by rekening asc")->result_array();
        }
}
