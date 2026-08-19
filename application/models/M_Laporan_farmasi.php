<?php
defined('BASEPATH') or exit('No driect script access allowed');

class M_Laporan_farmasi extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }
    public function kartu_persediaan($tahun, $id_log, $stok)
    {
        date_default_timezone_set('Asia/Jakarta');


        return $this->db->query("SELECT a.tahun, b.nama,b.id,sum(a.debit) masuk,sum(a.credit) keluar, (sum(SUM(a.Debit)) OVER(ORDER BY b.id ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW))-(sum(SUM(a.Credit)) OVER(ORDER BY b.id ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW)) sisa
                FROM(
                SELECT *, (SUM(Debit) OVER(ORDER BY tahun, bulan ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW))-(SUM(Credit) OVER(ORDER BY tahun, bulan ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW)) Balance
                FROM (
                SELECT year(tgl) tahun, month(tgl) bulan,sum(frek) AS Debit,0 AS Credit FROM `$stok`
                    where frek > 0 and id_logistik =$id_log and year(tgl) =$tahun
                    group by year(tgl), month(tgl)
                UNION ALL
                SELECT year(tgl) tahun, month(tgl) bulan,0 AS Debit,sum(frek*-1) AS Credit FROM `$stok`
                    where frek < 0  and id_logistik =$id_log and year(tgl) =$tahun
                    group by year(tgl), month(tgl)
                )X 
                    ) as a 
            right join bulan b on a.bulan = b.id
            group by b.nama
         
        ")->result();
    }
    public function getHargaBeli($bulan, $id_log)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = strtotime($bulan);

        $vbulan = date("m", $date); //format bulan 
        $vtahun = date('Y', $date); //format tahun 

        return $this->db->query("SELECT ifnull(AVG(harga_beli),0) harga_beli, max(tgl_struk) tgl_struk, min(kadaluarsa) tgl_exp, id_produsen from(
            SELECT (d.harga * (1-(d.diskon_rs/100))) harga_beli,s.tgl_struk, d.kadaluarsa , s.id_produsen
            FROM detail_struk d, struk_logistik s
            where d.id_struk = s.no_faktur and d.id_logistik= $id_log and month(d.tgl_input) ='$vbulan' and year(d.tgl_input)='$vtahun'
            UNION ALL
            SELECT (d.harga * (1-(d.diskon_rs/100))) harga_beli,s.tgl_masuk tgl_struk,d.kadaluarsa, s.id_produsen 
            FROM detail_struk_bebas d, struk_logistik_bebas s
            where d.id_struk = s.id_struk and d.id_logistik= $id_log and month(d.tgl_input) ='$vbulan' and year(d.tgl_input)='$vtahun'
            )as g")->row();
    }

    public function selectLaporan_Persediaan($bulan, $stok)
    {
        date_default_timezone_set('Asia/Jakarta');

        $vbulan = date("m", strtotime($bulan)); //format bulan 
        $vtahun = date('Y', strtotime($bulan)); //format tahun 

        $date1 = strtotime($bulan . '-01');

        $result = strtotime('-1 second', $date1);
        $lastmonth = date("m", $result); //akhir bulan sebelumnya
        $lastyear = date("Y", $result); //akhir bulan sebelumnya


        $this->db->select('l.id_logistik, l.produsen, l.nama, l.satuan_terbesar, l.golongan_sediaan, l.standar, l.kode, a.*,ifnull(s.harga_persediaan,l.harga_persediaan) harga_persediaan_last');
        $this->db->from('list_logistik l');
        $this->db->join('stop_opname_gudang a', 'l.id_logistik = a.id_logistik');
        $this->db->join('stop_opname_gudang s', "l.id_logistik = s.id_logistik and s.bulan = '$lastmonth' and s.tahun ='$lastyear'", 'left');
        $this->db->where('a.bulan', $vbulan);
        $this->db->where('a.tahun', $vtahun);
        if ($stok != '') {
            $this->db->where('a.stok', $stok);
        }
        return $this->db->get()->result();
    }

    public function selectLaporan_Material($bulan, $stok)
    {
        date_default_timezone_set('Asia/Jakarta');

        $vbulan = date("m", strtotime($bulan)); //format bulan 
        $vtahun = date('Y', strtotime($bulan)); //format tahun 

        $date1 = strtotime($bulan . '-01');

        $result = strtotime('-1 second', $date1);
        $lastmonth = date("Y-m-d", $result); //akhir bulan sebelumnya

        $akhir_bulan = strtotime('-1 second', strtotime('+1 month', $date1)); //tgl akhir bulan
        $nowmonth = date("Y-m-d", $akhir_bulan); //format bulan 


        return $this->db->query("SELECT l.id_logistik,l.kode,l.standar,l.nama,l.satuan_terkecil,ifnull(a.awal,0) awal, ifnull(x.masuk,0) masuk, ifnull(x.keluar,0)keluar, ifnull(s.akhir,0) akhir
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
                   SUM(CASE
            WHEN frek>0 AND asal_tujuan='Logistik' THEN frek
            ELSE 0
          END) as masuk,
                    SUM(CASE
            WHEN frek<0 AND asal_tujuan='PENJUALAN' THEN frek
            ELSE 0
          END)  as keluar
                
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
        where l.golongan_sediaan='MEDICAL SUPPLY' or l.golongan_sediaan ='BAHAN KIMIA'
        group by l.id_logistik
        ")->result();
    }
    public function selectLaporan_Obat($bulan, $stok)
    {
        date_default_timezone_set('Asia/Jakarta');

        $vbulan = date("m", strtotime($bulan)); //format bulan 
        $vtahun = date('Y', strtotime($bulan)); //format tahun 

        $date1 = strtotime($bulan . '-01');

        $result = strtotime('-1 second', $date1);
        $lastmonth = date("Y-m-d", $result); //akhir bulan sebelumnya

        $akhir_bulan = strtotime('-1 second', strtotime('+1 month', $date1)); //tgl akhir bulan
        $nowmonth = date("Y-m-d", $akhir_bulan); //format bulan 


        return $this->db->query("SELECT l.id_logistik,l.kode,l.standar,l.nama,l.satuan_terkecil,ifnull(a.awal,0) awal, ifnull(x.masuk,0) masuk, ifnull(x.keluar,0)keluar, ifnull(s.akhir,0) akhir
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
                   SUM(CASE
            WHEN frek>0 AND asal_tujuan='Logistik' THEN frek
            ELSE 0
          END) as masuk,
                    SUM(CASE
            WHEN frek<0 AND asal_tujuan='PENJUALAN' THEN frek
            ELSE 0
          END)  as keluar
                
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
        where l.golongan_sediaan!='MEDICAL SUPPLY' and l.golongan_sediaan !='BAHAN KIMIA'
        group by l.id_logistik
        ")->result();
    }
    public function select_laporan_apotik_luar($periode, $tipe)
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->db->select('s.id_produsen, d.tgl_input, l.nama,l.zat_aktif,l.zat_lain,l.golongan_farmakologi,l.produsen,l.satuan_terkecil,d.frek,d.harga_beli');
        $this->db->from('struk_logistik_bebas s , detail_struk_bebas d , list_logistik l ');
        $this->db->where('s.id_struk=d.id_struk');
        $this->db->where('d.id_logistik=l.id_logistik');
        $this->db->where("date(d.tgl_input) like '$periode%'");
        if ($tipe == 'bmhp') {
            $this->db->where("(l.golongan_sediaan='MEDICAL SUPPLY' or l.golongan_sediaan ='BAHAN KIMIA')");
        } else {
            $this->db->where("(l.golongan_sediaan!='MEDICAL SUPPLY' and l.golongan_sediaan !='BAHAN KIMIA')");
        }
        // $this->db->group_by('d.id_detail_struk');
        return $this->db->get()->result();
    }

    public function selectLaporan_BillingListingObat($bulan)
    {
        date_default_timezone_set('Asia/Jakarta');

        $date1 = strtotime($bulan . '-01');

        $akhir_bulan = strtotime('-1 second', strtotime('+1 month', $date1)); //tgl akhir bulan
        $nowmonth = date("Y-m-d", $akhir_bulan); //format tgl 


        return $this->db->query("SELECT kode_sibatik, kode, nama, produsen, penjamin, sum(harga_cost) hna, sum(frek) frek, sum(ifnull(harga_jual,0)) harga_jual, sum(ifnull(diskon_rs,0)) diskon from(
            SELECT * from(
            SELECT l.id_logistik kode_sibatik,l.kode,l.nama,l.produsen,c.nama penjamin,l.harga_cost, t.frek, (t.total/t.frek) harga_jual
            from tindakan_farmasi t, list_logistik l, pelayanan p, cara_bayar c 
            where t.id_list_tindakan = l.id_logistik and t.id_pelayanan = p.id_pelayanan and c.id_cara_bayar = p.cara_bayar and t.tanggal like '$bulan%'
                UNION ALL
                SELECT l.id_logistik kode_sibatik,l.kode,l.nama,l.produsen,c.nama penjamin,l.harga_cost, t.frek, (t.total/t.frek) harga_jual
            from tindakan_farmasi t, list_logistik l, obat_bebas p, cara_bayar c 
            where t.id_list_tindakan = l.id_logistik and t.id_pelayanan = p.id_obat_bebas and c.id_cara_bayar = p.cara_bayar and t.tanggal like '$bulan%'
                ) as a 
               left join 
            (SELECT diskon_rs, max(tgl_input) tgl, id_logistik from(
                 SELECT diskon_rs, tgl_input, id_logistik
                        FROM detail_struk
                        where tgl_input <='$nowmonth'
                        UNION ALL
                        SELECT diskon_rs, tgl_input, id_logistik
                        FROM detail_struk_bebas 
                        where tgl_input <='$nowmonth'
                ) as d
             group by d.id_logistik
            ) as b on b.id_logistik = a.kode_sibatik
                ) as gabung
                group by kode_sibatik, penjamin
                having frek >0
        ")->result();
    }
    public function Select_aging_bmhp_scm($bulan, $stok)
    {
        date_default_timezone_set('Asia/Jakarta');

        $date1 = strtotime($bulan . '-01');

        $akhir_bulan = strtotime('-1 second', strtotime('+1 month', $date1)); //tgl akhir bulan
        $nowmonth = date("Y-m-d", $akhir_bulan); //format tgl 


        return $this->db->query("SELECT l.id_logistik kode_sibatik,l.standar,l.kode,l.nama,l.satuan_terkecil, ifnull(s.akhir,0) akhir, ifnull(b.harga_beli,l.harga_persediaan) harga_beli, ifnull(b.tgl,'-') tgl,b.id_produsen
        FROM list_logistik l 
       
        LEFT JOIN (
            SELECT id_logistik, 
                    sum(frek) as akhir
                    
            FROM `$stok`
            WHERE date(tgl) <= '$nowmonth'
            GROUP BY id_logistik   
        ) s ON s.id_logistik = l.id_logistik
        left join 
        (SELECT ifnull(AVG(harga_beli),0) harga_beli, max(tgl_input) tgl, id_logistik,id_produsen from(
            SELECT (d.harga * (1-(d.diskon_rs/100))) harga_beli, d.tgl_input, d.id_logistik,s.id_produsen
                    FROM detail_struk d, struk_logistik s
                    where d.id_struk = s.no_faktur and d.tgl_input <='$nowmonth'
                    UNION ALL
                    SELECT (d.harga * (1-(d.diskon_rs/100))) harga_beli, d.tgl_input, d.id_logistik,s.id_produsen
                    FROM detail_struk_bebas d, struk_logistik s
                    where d.id_struk = s.id_struk and d.tgl_input <='$nowmonth'
            ) as d
        group by d.id_logistik
        ) as b on b.id_logistik = l.id_logistik
        where l.golongan_sediaan='MEDICAL SUPPLY' or l.golongan_sediaan ='BAHAN KIMIA'
        having tgl !='-'

        ")->result();
    }
    public function Select_aging_obat_scm($bulan, $stok)
    {
        date_default_timezone_set('Asia/Jakarta');

        $date1 = strtotime($bulan . '-01');

        $akhir_bulan = strtotime('-1 second', strtotime('+1 month', $date1)); //tgl akhir bulan
        $nowmonth = date("Y-m-d", $akhir_bulan); //format tgl 


        return $this->db->query("SELECT l.id_logistik kode_sibatik,l.standar,l.kode,l.nama,l.satuan_terkecil, ifnull(s.akhir,0) akhir, ifnull(b.harga_beli,l.harga_persediaan) harga_beli, ifnull(b.tgl,'-') tgl,b.id_produsen
        FROM list_logistik l 
       
        LEFT JOIN (
            SELECT id_logistik, 
                    sum(frek) as akhir
                    
            FROM `$stok`
            WHERE date(tgl) <= '$nowmonth'
            GROUP BY id_logistik   
        ) s ON s.id_logistik = l.id_logistik
        left join 
        (SELECT ifnull(AVG(harga_beli),0) harga_beli, max(tgl_input) tgl, id_logistik,id_produsen from(
            SELECT (d.harga * (1-(d.diskon_rs/100))) harga_beli, d.tgl_input, d.id_logistik,s.id_produsen
                    FROM detail_struk d, struk_logistik s
                    where d.id_struk = s.no_faktur and d.tgl_input <='$nowmonth'
                    UNION ALL
                    SELECT (d.harga * (1-(d.diskon_rs/100))) harga_beli, d.tgl_input, d.id_logistik,s.id_produsen
                    FROM detail_struk_bebas d, struk_logistik s
                    where d.id_struk = s.id_struk and d.tgl_input <='$nowmonth'
            ) as d
        group by d.id_logistik
        ) as b on b.id_logistik = l.id_logistik
        where l.golongan_sediaan!='MEDICAL SUPPLY' and l.golongan_sediaan !='BAHAN KIMIA'
        having tgl !='-'

        ")->result();
    }

    public function selectLaporanResponTimeNon()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT ps.no_rm, ps.nama pasien, ifnull(a.tanggal_resep,'-') tanggal_resep,ifnull(a.tgl_proses,'-') tgl_proses, ifnull(a.tgl_selesai,'-') tgl_selesai, ifnull(a.tgl_diberikan,'-') tgl_diberikan
        FROM antrian_farmasi a, pelayanan p, pasien ps, resep_obat r
        WHERE a.id_pelayanan=p.id_pelayanan and ps.no_rm=p.id_pasien and r.id_resep=a.id_resep and r.jenis_resep=1 and a.tanggal_resep like '%$tgl%' 
        GROUP BY p.id_pelayanan
        order by a.tanggal_resep asc");
        return $hasil->result();
    }

    public function selectRangeResponTimeNon($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $hasil = $this->db->query("SELECT ps.no_rm, ps.nama pasien, ifnull(a.tanggal_resep,'-') tanggal_resep,ifnull(a.tgl_proses,'-') tgl_proses, ifnull(a.tgl_selesai,'-') tgl_selesai, ifnull(a.tgl_diberikan,'-') tgl_diberikan
                FROM antrian_farmasi a, pelayanan p, pasien ps, resep_obat r
                WHERE a.id_pelayanan=p.id_pelayanan and ps.no_rm=p.id_pasien and r.id_resep=a.id_resep and r.jenis_resep=1 and (DATE(a.tanggal_resep) BETWEEN '$mulai' and '$akhir') 
                GROUP BY p.id_pelayanan
                order by a.tanggal_resep asc");
        return $hasil->result();
    }

    public function selectLaporanResponTimeRacikan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT ps.no_rm, ps.nama pasien, ifnull(a.tanggal_resep,'-') tanggal_resep,ifnull(a.tgl_proses,'-') tgl_proses, ifnull(a.tgl_selesai,'-') tgl_selesai, ifnull(a.tgl_diberikan,'-') tgl_diberikan
        FROM antrian_farmasi a, pelayanan p, pasien ps, resep_obat r
        WHERE a.id_pelayanan=p.id_pelayanan and ps.no_rm=p.id_pasien and r.id_resep=a.id_resep and r.jenis_resep=2 and a.tanggal_resep like '%$tgl%' 
        GROUP BY p.id_pelayanan
        order by a.tanggal_resep asc");
        return $hasil->result();
    }

    public function selectRangeResponTimeRacikan($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $hasil = $this->db->query("SELECT ps.no_rm, ps.nama pasien, ifnull(a.tanggal_resep,'-') tanggal_resep,ifnull(a.tgl_proses,'-') tgl_proses, ifnull(a.tgl_selesai,'-') tgl_selesai, ifnull(a.tgl_diberikan,'-') tgl_diberikan
                FROM antrian_farmasi a, pelayanan p, pasien ps, resep_obat r
                WHERE a.id_pelayanan=p.id_pelayanan and ps.no_rm=p.id_pasien and r.id_resep=a.id_resep and r.jenis_resep=2 and (DATE(a.tanggal_resep) BETWEEN '$mulai' and '$akhir') 
                GROUP BY p.id_pelayanan
                order by a.tanggal_resep asc");
        return $hasil->result();
    }

    public function insert_data($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function get_target()
    {
        $this->db->select('*');
        $this->db->from('target_poli_bulanan');
        return $this->db->get()->result();
    }

    public function get_data_update_target($id)
    {
        $this->db->select('*');
        $this->db->from('target_poli_bulanan');
        $this->db->where('id_target_poli', $id);
        return $this->db->get()->row();
    }

    public function update_data($id, $data)
    {
        $this->db->where('id_target_poli', $id);
        $this->db->update('target_poli_bulanan', $data);
        return $this->db->affected_rows(); // Update data observasi
    }

    public function delete_data($table, $id)
    {
        $this->db->where('id_target_poli', $id);
        $this->db->delete($table);
        return $this->db->affected_rows() > 0;
    }


    public function poli()
    {
        // Daftar ID Poli
        $poli_ids = [
            'bedah' => 'MWK205D30K',
            'dalam' => '24QRNLX29R',
            'kulit' => '2JZ09X4K22',
            'fisio' => '6E975PL694',
            'anak' => 'E00RX703',
            'gizi' => 'CV3RN1X29R',
            'obgyne' => 'HLGI4176K8',
            'jantung' => 'I9NXY5VNQG',
            'tht' => 'O782EGU4PR',
            'gigi' => 'ODI8643C27',
            'umum' => 'RZE28J1098',
            'mata' => 'UQ81K76373',
            'akupuntur' => 'SC3120P87',
            'ginjal' => 'UG4424O51',
            'hd' => 'NM3075J78',
            'kemo' => 'EM4488C53',
            'kesjiwa' => 'WT5092N25',
            'kia' => 'KASE14',
            'ortopedi' => 'YR6435H21',
            'paru' => 'ZX2016T39',
            'penmul' => 'FE1400Y26',
            'bedmul' => 'JG6142E66',
            'psikiatri' => 'HK81U92373',
            'rehabilitasi' => '111111',
            'saraf' => 'XN5395D61',
            'stif' => 'STF56NI',
            'terwic' => '6E9TWC694',
            'urologi' => 'EV7719I53',
        ];

        // Mendapatkan bulan dan tahun saat ini
        $thn = date("Y-m");

        // Array untuk menyimpan hasil perhitungan rata-rata tiap poli
        $result = [];

        // Looping melalui seluruh daftar poli
        foreach ($poli_ids as $target_poli => $id_poli) {
            // Query untuk menghitung rata-rata jumlah pasien per hari untuk setiap poli
            $query = "
        SELECT IFNULL(ROUND(AVG(total)), 0) AS avg
        FROM (
            SELECT COUNT(*) AS total, DAY(h.tgl_masuk) AS hari
            FROM history_pelayanan h
            JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
            WHERE p.status = 1 
            AND h.status = 1 
            AND h.nama_poli = ? 
            AND h.tgl_masuk LIKE ? 
            GROUP BY hari
        ) AS subquery;
        ";

            // Eksekusi query dengan binding parameter
            $hasil = $this->db->query($query, [$id_poli, "$thn%"])->row_array();

            // Menambahkan hasil rata-rata ke dalam array result
            $result[$target_poli] = isset($hasil['avg']) ? $hasil['avg'] : 0;
        }

        // Mengembalikan hasil rata-rata untuk semua poli
        return $result;
    }

    public function get_latest_tanggal()
    {
        $this->db->select_max('tanggal'); // Ambil tanggal terbaru
        $query = $this->db->get('target_poli_bulanan'); // Sesuaikan nama tabel
        $result = $query->row();

        return $result ? $result->tanggal : null; // Kembalikan tanggal terbaru
    }

    public function check_existing_target_in_range($tanggal_mulai, $tanggal_selesai)
    {
        $this->db->select('id_target_poli');
        $this->db->from('target_poli_bulanan');
        $this->db->where('tanggal >=', $tanggal_mulai); // Tanggal mulai (30 hari sebelumnya)
        $this->db->where('tanggal <=', $tanggal_selesai); // Tanggal akhir
        $query = $this->db->get();

        return $query->num_rows() > 0; // Mengembalikan true jika ada data
    }
}
