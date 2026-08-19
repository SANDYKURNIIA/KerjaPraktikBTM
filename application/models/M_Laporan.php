<?php

class M_Laporan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function cek_id($id_pelayanan)
    {
        $this->db->select('nama_diagnosa');
        $this->db->from('diagnosa_utama');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    public function selectDataPasienRajal($first_date, $second_date, $jenis_pelayanan)
    {
        if ($jenis_pelayanan == 'RAWAT INAP') {
            $this->db->select('*');
            $this->db->from('v_kunjungan_ranap');
            $this->db->where("tgl_masuk BETWEEN '$first_date' AND '$second_date'");
            return $this->db->get()->result();
        } else if ($jenis_pelayanan == 'UGD') {
            $this->db->select('*');
            $this->db->from('v_kunjungan_igd');
            $this->db->where("tgl_masuk BETWEEN '$first_date' AND '$second_date'");
            return $this->db->get()->result();
        } else if ($jenis_pelayanan == 'POLI') {
            $this->db->select('*');
            $this->db->from('v_kunjungan_poli');
            $this->db->where("tgl_masuk BETWEEN '$first_date' AND '$second_date'");
            return $this->db->get()->result();
        } else {
            $this->db->select('*');
            $this->db->from('v_kunjungan_poli');
            $this->db->where("tgl_masuk BETWEEN '$first_date' AND '$second_date'");
            return $this->db->get()->result();
        }
    }
    // public function selectDataPasienKunjungan($first_date, $second_date, $jenis_pelayanan)
    // {
    //    $this->db->select('*');
    //     $this->db->where("tgl_masuk BETWEEN '$first_date' AND '$second_date'");
    //     $this->db->from('v_kunjungan');
    //     $this->db->where('jenis_pelayanan', $jenis_pelayanan);
    //   return $this->db->get()->result();
    // }

    public function selectDataPasienKunjungan($first_date, $second_date, $jenis_pelayanan)
    {
        if ($jenis_pelayanan == 'POLI') {
            $this->db->select('p.nama nama_pasien, p.no_rm, p.no_hp, p.alamat, c.nama bayar, p.no_ktp, hu.jenis_pelayanan, d.nama nama_dokter, pl.tgl_masuk, pl.tgl_keluar, pl.id_pelayanan, lp.nama_panjang kamar, hu.id_history,pl.status_rawat, du.kode, du.nama_diagnosa diagnosa, p.tgl_lahir ');
            $this->db->from('pelayanan pl');
            $this->db->join('pasien p', 'p.no_rm = pl.id_pasien');
            $this->db->join('cara_bayar c', 'c.id_cara_bayar = pl.cara_bayar');
            $this->db->join('history_pelayanan hu', 'pl.id_pelayanan = hu.id_pelayanan');
            $this->db->join('list_poli lp', 'lp.id_list_poli = hu.nama_poli');
            $this->db->join('dokter d', 'hu.dpjp = d.id_dokter');
            $this->db->join('diagnosa_utama du', 'du.id_history = hu.id_history', 'left');
            $this->db->where('pl.status', 1);
            $this->db->where('hu.status', 1);
            $this->db->where("DATE(pl.tgl_masuk) BETWEEN '$first_date' AND '$second_date'");
            $this->db->order_by('pl.tgl_masuk asc');
            return $this->db->get()->result();
        } else if ($jenis_pelayanan == 'RAWAT INAP') {
            $this->db->select('p.nama nama_pasien, p.no_rm, p.no_hp, p.alamat, c.nama bayar, p.no_ktp, hu.jenis_pelayanan, d.nama nama_dokter, pl.tgl_masuk, r.tipe kamar, pl.tgl_keluar, pl.id_pelayanan, hu.id_history,pl.status_rawat, du.kode, du.nama_diagnosa diagnosa, p.tgl_lahir ');
            $this->db->from('pelayanan pl');
            $this->db->join('pasien p', 'p.no_rm = pl.id_pasien');
            $this->db->join('cara_bayar c', 'c.id_cara_bayar = pl.cara_bayar');
            $this->db->join('history_pelayanan_ranap hu', 'pl.id_pelayanan = hu.id_pelayanan');
            $this->db->join('ruangan r', 'r.id_ruangan = hu.id_kamar');
            $this->db->join('dokter d', 'hu.dpjp = d.id_dokter');
            $this->db->join('diagnosa_utama du', 'du.id_history = hu.id_history', 'left');
            $this->db->where('pl.status', 1);
            $this->db->where('hu.status', 1);
            $this->db->where("DATE(pl.tgl_masuk) BETWEEN '$first_date' AND '$second_date'");
            $this->db->order_by('pl.tgl_masuk asc');
            return $this->db->get()->result();
        } else {
            $this->db->select('p.nama nama_pasien, p.no_rm, p.no_hp, p.alamat, c.nama bayar, p.no_ktp, hu.jenis_pelayanan, d.nama nama_dokter, pl.tgl_masuk, pl.tgl_keluar, pl.id_pelayanan, "-" kamar, hu.id_history,pl.status_rawat, f.asesment_triase triase, du.kode, du.nama_diagnosa diagnosa, p.tgl_lahir ');
            // $this->db->from('pasien p, pelayanan pl, cara_bayar c, history_pelayanan_ugd hu, dokter d, form_ass_per_igd f, diagnosa_utama du');
            $this->db->from('pelayanan pl');
            $this->db->join('pasien p', 'p.no_rm = pl.id_pasien');
            $this->db->join('cara_bayar c', 'c.id_cara_bayar = pl.cara_bayar');
            $this->db->join('history_pelayanan_ugd hu', 'pl.id_pelayanan = hu.id_pelayanan');
            $this->db->join('dokter d', 'hu.dpjp = d.id_dokter');
            $this->db->join('diagnosa_utama du', 'du.id_history = hu.id_history', 'left');
            $this->db->join('form_ass_per_igd f', 'f.id_history = hu.id_history', 'left');
            $this->db->where('pl.status', 1);
            $this->db->where('hu.status', 1);
            $this->db->where("DATE(pl.tgl_masuk) BETWEEN '$first_date' AND '$second_date'");
            $this->db->order_by('pl.tgl_masuk asc');
            return $this->db->get()->result();
        }
    }
    // public function getTriase($id_pelayanan)
    // {
    //     $tgl = date("Y-m-d");
    //     $query = $this->db->query("SELECT f.id_pelayanan, f.asesment_triase triase
    //     FROM form_ass_per_igd f, pelayanan p
    //     WHERE p.id_pelayanan=f.id_pelayanan
    //     AND p.status = 1
    //     AND p.tgl_masuk like '%$tgl%'
    //     and f.id_pelayanan ='$id_pelayanan'");
    //     return $query->row();
    // }
    // public function getTriaseRange($id_pelayanan, $mulai, $akhir)
    // {
    //     $query = $this->db->query("SELECT f.id_pelayanan, f.asesment_triase triase
    //     FROM form_ass_per_igd f, pelayanan p
    //     WHERE p.id_pelayanan=f.id_pelayanan
    //     AND p.status = 1
    //     AND p.tgl_masuk between '$mulai' and '$akhir'
    //     and f.id_pelayanan ='$id_pelayanan'");
    //     return $query->row();
    // }

    public function selectDataKunjunganIgdPonek()
    {
        $tgl = date("Y-m-d");
        $this->db->select('p.nama nama_pasien, p.no_rm, p.no_hp, p.alamat, c.nama bayar, hu.jenis_pelayanan, d.nama nama_dokter, pl.tgl_masuk, pl.tgl_keluar, pl.id_pelayanan, hu.id_history,pl.status_rawat, f.asesment_triase triase');
        $this->db->from('pasien p, pelayanan pl, cara_bayar c, history_pelayanan_ugd hu, dokter d, form_ass_per_igd f,tindakan_apelkes t, staff s');
        $this->db->where('p.no_rm = pl.id_pasien');
        $this->db->where('pl.id_pelayanan=hu.id_pelayanan');
        $this->db->where('pl.id_pelayanan=t.id_pelayanan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('pl.id_pelayanan=f.id_pelayanan');
        $this->db->where('hu.dpjp = d.id_dokter');
        $this->db->where('c.id_cara_bayar = pl.cara_bayar');
        $this->db->where('s.tipe', 'igdponek');
        $this->db->where('pl.status', 1);
        $this->db->where('hu.status', 1);
        $this->db->like('pl.tgl_masuk', $tgl);
        $this->db->group_by('pl.id_pelayanan');
        return $this->db->get()->result();
    }

    public function selectDataKunjunganRangeIgdPonek($mulai, $akhir)
    {
        $tgl = date("Y-m-d");
        $this->db->select('p.nama nama_pasien, p.no_rm, p.no_hp, p.alamat, c.nama bayar, hu.jenis_pelayanan, d.nama nama_dokter, pl.tgl_masuk, pl.tgl_keluar, pl.id_pelayanan, hu.id_history,pl.status_rawat, f.asesment_triase triase');
        $this->db->from('pasien p, pelayanan pl, cara_bayar c, history_pelayanan_ugd hu, dokter d, form_ass_per_igd f,tindakan_apelkes t, staff s');
        $this->db->where('p.no_rm = pl.id_pasien');
        $this->db->where('pl.id_pelayanan=hu.id_pelayanan');
        $this->db->where('pl.id_pelayanan=t.id_pelayanan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('pl.id_pelayanan=f.id_pelayanan');
        $this->db->where('hu.dpjp = d.id_dokter');
        $this->db->where('c.id_cara_bayar = pl.cara_bayar');
        $this->db->where('s.tipe', 'igdponek');
        $this->db->where('pl.status', 1);
        $this->db->where('hu.status', 1);
        $this->db->where('pl.tgl_masuk >=', $mulai);
        $this->db->where('pl.tgl_masuk <=', $akhir);
        $this->db->group_by('pl.id_pelayanan');
        return $this->db->get()->result();
    }

    public function selectDataPasienKunjunganById($id_pelayanan)
    {
        $this->db->select('hu.id_pelayanan  ');
        $this->db->from('history_pelayanan_ugd hu, history_pelayanan_ranap hr');
        $this->db->where('hr.id_pelayanan = hu.id_pelayanan');
        $this->db->where('hu.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function selectDataPasienPt($first_date, $second_date)
    {
        $sql = "SELECT count(d.kode) total, l.nama_diagnosa, d.kode , l.id_dtd, 
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)   < 29 and pas.jenis_kelamin='LAKI-LAKI' THEN 1 ELSE 0 END) AS '0-28 hr lk',
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)   < 29 and pas.jenis_kelamin='PEREMPUAN' THEN 1 ELSE 0 END) AS '0-28 hr pr',
        
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)   BETWEEN 29 AND 365 and pas.jenis_kelamin='LAKI-LAKI'   THEN 1 ELSE 0 END) AS '28<1 th lk', 
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)   BETWEEN 29 AND 365 and pas.jenis_kelamin='PEREMPUAN'   THEN 1 ELSE 0 END) AS '28<1 th pr', 
        
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 1 AND 5 and pas.jenis_kelamin='LAKI-LAKI'  THEN 1 ELSE 0 END) AS '1-4 th lk', 
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 1 AND 5 and pas.jenis_kelamin='PEREMPUAN'  THEN 1 ELSE 0 END) AS '1-4 th pr', 
        
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 5 AND 15 and pas.jenis_kelamin='LAKI-LAKI'  THEN 1 ELSE 0 END) AS '5-14 th lk',  
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 5 AND 15 and pas.jenis_kelamin='PEREMPUAN'  THEN 1 ELSE 0 END) AS '5-14 th pr', 
        
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 15 AND 25 and pas.jenis_kelamin='LAKI-LAKI'  THEN 1 ELSE 0 END) AS '15-24 th lk',
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 15 AND 25 and pas.jenis_kelamin='PEREMPUAN'  THEN 1 ELSE 0 END) AS '15-24 th pr',
        
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 25 AND 45 and pas.jenis_kelamin='LAKI-LAKI'  THEN 1 ELSE 0 END) AS '25-44 th lk',
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 25 AND 45 and pas.jenis_kelamin='PEREMPUAN'  THEN 1 ELSE 0 END) AS '25-44 th pr', 
        
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 45 AND 64 and pas.jenis_kelamin='LAKI-LAKI'  THEN 1 ELSE 0 END) AS '45-64 th lk', 
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 45 AND 64 and pas.jenis_kelamin='PEREMPUAN'  THEN 1 ELSE 0 END) AS '45-64 th pr',
         
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365   > 64  and pas.jenis_kelamin='LAKI-LAKI' THEN 1 ELSE 0 END) AS '65+ lk',
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365   > 64 and pas.jenis_kelamin='PEREMPUAN'  THEN 1 ELSE 0 END) AS '65+ pr'
        
        FROM

                (
                    (
                        (
                            (`diagnosa` `d`
                            JOIN `list_diagnosa` `l` on `d`.`kode` = `l`.`id_diagnosa`
                            )
                        JOIN `pelayanan` `p` on `p`.`id_pelayanan` = `d`.`id_pelayanan`
                        )
                    JOIN `history_pelayanan_ranap` `h` on `h`.`id_pelayanan` = `p`.`id_pelayanan`
                    )
                JOIN `pasien` `pas` on  `pas`.`no_rm` = `p`.`id_pasien`
                )
  
        WHERE p.tgl_masuk BETWEEN '$first_date' AND '$second_date'
        GROUP BY d.kode 
        ORDER BY total desc 
        ";

        $hasil = $this->db->query($sql, array($first_date, $second_date))->result();
        return $hasil;
    }
    public function selectDataPasienPt_poli($first_date, $second_date)
    {
        $sql = "SELECT count(d.kode) total, l.nama_diagnosa, d.kode , l.id_dtd, 
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)   < 29 and pas.jenis_kelamin='LAKI-LAKI' THEN 1 ELSE 0 END) AS '0-28 hr lk',
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)   < 29 and pas.jenis_kelamin='PEREMPUAN' THEN 1 ELSE 0 END) AS '0-28 hr pr',
        
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)   BETWEEN 29 AND 365 and pas.jenis_kelamin='LAKI-LAKI'   THEN 1 ELSE 0 END) AS '28<1 th lk', 
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)   BETWEEN 29 AND 365 and pas.jenis_kelamin='PEREMPUAN'   THEN 1 ELSE 0 END) AS '28<1 th pr', 
        
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 1 AND 5 and pas.jenis_kelamin='LAKI-LAKI'  THEN 1 ELSE 0 END) AS '1-4 th lk', 
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 1 AND 5 and pas.jenis_kelamin='PEREMPUAN'  THEN 1 ELSE 0 END) AS '1-4 th pr', 
        
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 5 AND 15 and pas.jenis_kelamin='LAKI-LAKI'  THEN 1 ELSE 0 END) AS '5-14 th lk',  
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 5 AND 15 and pas.jenis_kelamin='PEREMPUAN'  THEN 1 ELSE 0 END) AS '5-14 th pr', 
        
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 15 AND 25 and pas.jenis_kelamin='LAKI-LAKI'  THEN 1 ELSE 0 END) AS '15-24 th lk',
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 15 AND 25 and pas.jenis_kelamin='PEREMPUAN'  THEN 1 ELSE 0 END) AS '15-24 th pr',
        
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 25 AND 45 and pas.jenis_kelamin='LAKI-LAKI'  THEN 1 ELSE 0 END) AS '25-44 th lk',
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 25 AND 45 and pas.jenis_kelamin='PEREMPUAN'  THEN 1 ELSE 0 END) AS '25-44 th pr', 
        
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 45 AND 64 and pas.jenis_kelamin='LAKI-LAKI'  THEN 1 ELSE 0 END) AS '45-64 th lk', 
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 45 AND 64 and pas.jenis_kelamin='PEREMPUAN'  THEN 1 ELSE 0 END) AS '45-64 th pr',
         
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365   > 64  and pas.jenis_kelamin='LAKI-LAKI' THEN 1 ELSE 0 END) AS '65+ lk',
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365   > 64 and pas.jenis_kelamin='PEREMPUAN'  THEN 1 ELSE 0 END) AS '65+ pr'
        
        FROM

                (
                    (
                        (
                            (`diagnosa` `d`
                            JOIN `list_diagnosa` `l` on `d`.`kode` = `l`.`id_diagnosa`
                            )
                        JOIN `pelayanan` `p` on `p`.`id_pelayanan` = `d`.`id_pelayanan`
                        )
                    JOIN `history_pelayanan` `h` on `h`.`id_pelayanan` = `p`.`id_pelayanan`
                    )
                JOIN `pasien` `pas` on  `pas`.`no_rm` = `p`.`id_pasien`
                )
  
        WHERE p.tgl_masuk BETWEEN '$first_date' AND '$second_date'
        GROUP BY d.kode 
        ORDER BY total desc 
        ";

        $hasil = $this->db->query($sql, array($first_date, $second_date))->result();
        return $hasil;
    }
    public function selectDataPasienPt_igd($first_date, $second_date)
    {
        $sql = "SELECT count(e.kode) total, l.nama_diagnosa, e.kode , l.id_dtd, 
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)   < 29 and pas.jenis_kelamin='LAKI-LAKI' THEN 1 ELSE 0 END) AS '0-28 hr lk',
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)   < 29 and pas.jenis_kelamin='PEREMPUAN' THEN 1 ELSE 0 END) AS '0-28 hr pr',
        
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)   BETWEEN 29 AND 365 and pas.jenis_kelamin='LAKI-LAKI'   THEN 1 ELSE 0 END) AS '28<1 th lk', 
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)   BETWEEN 29 AND 365 and pas.jenis_kelamin='PEREMPUAN'   THEN 1 ELSE 0 END) AS '28<1 th pr', 
        
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 1 AND 5 and pas.jenis_kelamin='LAKI-LAKI'  THEN 1 ELSE 0 END) AS '1-4 th lk', 
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 1 AND 5 and pas.jenis_kelamin='PEREMPUAN'  THEN 1 ELSE 0 END) AS '1-4 th pr', 
        
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 5 AND 15 and pas.jenis_kelamin='LAKI-LAKI'  THEN 1 ELSE 0 END) AS '5-14 th lk',  
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 5 AND 15 and pas.jenis_kelamin='PEREMPUAN'  THEN 1 ELSE 0 END) AS '5-14 th pr', 
        
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 15 AND 25 and pas.jenis_kelamin='LAKI-LAKI'  THEN 1 ELSE 0 END) AS '15-24 th lk',
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 15 AND 25 and pas.jenis_kelamin='PEREMPUAN'  THEN 1 ELSE 0 END) AS '15-24 th pr',
        
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 25 AND 45 and pas.jenis_kelamin='LAKI-LAKI'  THEN 1 ELSE 0 END) AS '25-44 th lk',
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 25 AND 45 and pas.jenis_kelamin='PEREMPUAN'  THEN 1 ELSE 0 END) AS '25-44 th pr', 
        
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 45 AND 64 and pas.jenis_kelamin='LAKI-LAKI'  THEN 1 ELSE 0 END) AS '45-64 th lk', 
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365  BETWEEN 45 AND 64 and pas.jenis_kelamin='PEREMPUAN'  THEN 1 ELSE 0 END) AS '45-64 th pr',
         
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365   > 64  and pas.jenis_kelamin='LAKI-LAKI' THEN 1 ELSE 0 END) AS '65+ lk',
        SUM(CASE WHEN DATEDIFF(p.tgl_masuk, pas.tgl_lahir)/365   > 64 and pas.jenis_kelamin='PEREMPUAN'  THEN 1 ELSE 0 END) AS '65+ pr'
        
        FROM

                (
                    (
                        (
                            (`erm_diagnosa_dokter` `e`
                            JOIN `list_diagnosa` `l` on `e`.`kode` = `l`.`id_diagnosa`
                            )
                        JOIN `pelayanan` `p` on `p`.`id_pelayanan` = `e`.`id_pelayanan`
                        )
                    JOIN `history_pelayanan_ugd` `h` on `h`.`id_pelayanan` = `p`.`id_pelayanan`
                    )
                JOIN `pasien` `pas` on  `pas`.`no_rm` = `p`.`id_pasien`
                )
  
        WHERE p.tgl_masuk BETWEEN '$first_date' AND '$second_date'
        GROUP BY e.kode 
        ORDER BY total desc 
        ";

        $hasil = $this->db->query($sql, array($first_date, $second_date))->result();
        return $hasil;
    }

    public function selectDataPasienBor($year)
    {
        $sql = "SELECT DISTINCT
    r.nama_ruangan AS ruangan,
    r.kelas AS nama_kelas,
    YEAR(h.tgl_masuk) AS thn,
    MONTH(h.tgl_masuk) AS bulan,
    SUM(
        DATEDIFF(h.tgl_keluar, h.tgl_masuk) +1
    ) AS hp,
    SUM(
        IF(
            DATEDIFF(h.tgl_keluar, h.tgl_masuk) = 0,
            DATEDIFF(h.tgl_keluar, h.tgl_masuk) + 1,
            DATEDIFF(h.tgl_keluar, h.tgl_masuk)
        )
    ) AS lamarawat,
    SUM(
        (
            p.status_rawat = 'selesai' OR p.status_rawat = 'dikembalikan' OR h.ket_keluar = 'Meninggal < 48 JAM' OR h.ket_keluar = 'Meninggal > 48 JAM' OR h.ket_keluar = 'MENINGGAL'
        )
    ) - SUM(
        h.ket_keluar = 'Meninggal < 48 JAM' OR h.ket_keluar = 'Meninggal > 48 JAM' OR h.ket_keluar = 'MENINGGAL'
    ) AS pasienkeluar,
    SUM(
        h.ket_keluar = 'Meninggal < 48 JAM'
    ) AS Kurang48Jam,
    SUM(
        h.ket_keluar = 'Meninggal > 48 JAM' OR h.ket_keluar = 'MENINGGAL'
    ) AS Lebih48Jam,
    SUM(
        (
            p.status_rawat = 'selesai' OR p.status_rawat = 'dikembalikan'
        )
    ) AS HPlusM,
    DAY(LAST_DAY(h.tgl_masuk)) AS periode,
    (
    SELECT
        COUNT(kelas)
    FROM
        ruangan
    WHERE
        kelas = nama_kelas AND
    keterangan
        = 'AKTIF'
) AS tt,
LEFT((SUM(
        DATEDIFF(h.tgl_keluar, h.tgl_masuk) +1
    )/((
    SELECT
        COUNT(kelas)
    FROM
        ruangan
    WHERE   
        kelas = nama_kelas AND
    keterangan
        = 'AKTIF'
)*DAY(LAST_DAY(h.tgl_masuk)))),4) AS bor,
LEFT(SUM(
        IF(
            DATEDIFF(h.tgl_keluar, h.tgl_masuk) = 0,
            DATEDIFF(h.tgl_keluar, h.tgl_masuk) + 1,
            DATEDIFF(h.tgl_keluar, h.tgl_masuk)
        )
    )/  SUM(
        (
            p.status_rawat = 'selesai' OR p.status_rawat = 'dikembalikan'
        )
    ),3) AS avlos,
    LEFT((((
        SELECT
            COUNT(kelas)
        FROM
            ruangan
        WHERE
            kelas = nama_kelas AND
        keterangan
        = 'AKTIF'
    ) * DAY(LAST_DAY(h.tgl_masuk)))- SUM(
        DATEDIFF(h.tgl_keluar, h.tgl_masuk) +1
    ))/(SUM(
        (
            p.status_rawat = 'selesai' OR p.status_rawat = 'dikembalikan'
        )
    )),4) AS toi,
    LEFT(SUM(
        (
            p.status_rawat = 'selesai' OR p.status_rawat = 'dikembalikan'
        )
    ) /  (
            SELECT
                COUNT(kelas)
            FROM
                ruangan
            WHERE
                kelas = nama_kelas AND
            keterangan
        = 'AKTIF'
        ),4) AS bto,
        LEFT((SUM(
            h.ket_keluar = 'Meninggal > 48 JAM' OR h.ket_keluar = 'MENINGGAL'
            ) / SUM(
                (
                    p.status_rawat = 'selesai' OR p.status_rawat = 'dikembalikan'
                )
            ))*1000,6) AS ndr,
            
            LEFT((SUM(
                    h.ket_keluar = 'Meninggal < 48 JAM'
                ) + SUM(
                    h.ket_keluar = 'Meninggal > 48 JAM' OR h.ket_keluar = 'MENINGGAL'
                ))/SUM(
        (
            p.status_rawat = 'selesai' OR p.status_rawat = 'dikembalikan'
        )
    )*1000,6) AS gdr
FROM
    history_pelayanan_ranap h
JOIN pelayanan p ON
    p.id_pelayanan = h.id_pelayanan
JOIN ruangan r ON
    r.id_ruangan = h.id_kamar
WHERE
    YEAR(h.tgl_masuk) = $year AND h.jenis_pelayanan = 'rawat inap' AND(
        p.status_rawat = 'selesai' OR p.status_rawat = 'dikembalikan'
    ) AND p.status = 1 AND h.status = 1 AND r.kelas_ruangan != 'BOX BAYI' AND r.kelas != 'OK' AND r.kelas != 'RUANG ISOLASI'
GROUP BY
    bulan,
    nama_kelas
ORDER BY
    bulan ASC,
    nama_kelas ASC
        ";

        $hasil = $this->db->query($sql, array($year))->result();
        return $hasil;
    }



    public function selectDataPasienBor_new($year)
    {
        $sql = "SELECT
                r.kelas_ruangan AS kelas_ruangan,
                p.id_pelayanan,
                rw.id_riwayat,
                r.nama_ruangan AS ruangan,
                r.kelas AS nama_kelas,
                YEAR(h.tgl_masuk) AS thn,
                MONTH(h.tgl_masuk) AS bulan,
                SUM(
                    DATEDIFF(
                        rw.tanggal_keluar,
                        rw.tanggal_masuk
                    ) + 1
                ) AS hp,
                SUM(
                    IF(
                        DATEDIFF(
                            rw.tanggal_keluar,
                            rw.tanggal_masuk
                        ) = 0,
                        DATEDIFF(
                            rw.tanggal_keluar,
                            rw.tanggal_masuk
                        ) + 1,
                        DATEDIFF(
                            rw.tanggal_keluar,
                            rw.tanggal_masuk
                        )
                    )
                ) AS lamarawat,
                
                SUM(
                    (
                        SELECT
                            COUNT(rwt.status)
                        FROM
                            riwayat_kamar rwt
                        WHERE
                            rwt.id_pelayanan = p.id_pelayanan AND rw.id_kamar = rwt.id_kamar AND rwt.status = 'KELUAR' AND h.ket_keluar NOT LIKE '%Meninggal%'
                    )
                ) AS pasienkeluar,
                
                SUM(
                    (
                        SELECT
                            COUNT(rwt.status)
                        FROM
                            riwayat_kamar rwt
                        WHERE
                            rwt.id_pelayanan = p.id_pelayanan AND rw.id_kamar = rwt.id_kamar AND h.ket_keluar = 'Meninggal < 48 JAM' AND rwt.status = 'KELUAR'
                    )
                ) AS Kurang48Jam,
                
                SUM(
                    (
                        SELECT
                            COUNT(rwt.status)
                        FROM
                            riwayat_kamar rwt
                        WHERE
                            rwt.id_pelayanan = p.id_pelayanan AND rw.id_kamar = rwt.id_kamar AND(
                                h.ket_keluar = 'Meninggal > 48 JAM' OR h.ket_keluar = 'Meninggal'
                            ) AND rwt.status = 'KELUAR'
                    )
                ) AS Lebih48Jam,
                
                SUM(
                    (
                        SELECT
                            COUNT(rwt.status)
                        FROM
                            riwayat_kamar rwt
                        WHERE
                            rwt.id_pelayanan = p.id_pelayanan AND rw.id_kamar = rwt.id_kamar AND(
                                h.ket_keluar LIKE '%Meninggal%' OR h.ket_keluar NOT LIKE '%Meninggal%'
                            ) AND rwt.status = 'KELUAR'
                    )
                ) AS HPlusM,
                
                DAY(LAST_DAY(rw.tanggal_masuk)) AS periode,
                    (
                        SELECT COUNT(id_ruangan)  FROM ruangan WHERE 
                        kelas_ruangan NOT IN('BOX BAYI', 'KAMAR OPERASI') AND keterangan = 'AKTIF' AND kelas = r.kelas 
                    ) AS tt,
                SUM(
                    DATEDIFF(
                            rw.tanggal_keluar,
                            rw.tanggal_masuk
                        ) + 1
                    ) /(
                        (
                            SELECT COUNT(id_ruangan)  FROM ruangan WHERE 
                            kelas_ruangan NOT IN('BOX BAYI', 'KAMAR OPERASI') AND keterangan = 'AKTIF' AND kelas = r.kelas 
                    ) * DAY(LAST_DAY(rw.tanggal_masuk))
                    ) * 100 AS bor,
                IFNULL(
                    ROUND(
                        SUM(
                            IF(
                                DATEDIFF(
                                    rw.tanggal_keluar,
                                    rw.tanggal_masuk
                                ) = 0,
                                DATEDIFF(
                                    rw.tanggal_keluar,
                                    rw.tanggal_masuk
                                ) + 1,
                                DATEDIFF(
                                    rw.tanggal_keluar,
                                    rw.tanggal_masuk
                                )
                            ) /(
                            SELECT
                                COUNT(rwt.status)
                            FROM
                                riwayat_kamar rwt
                            WHERE
                                rwt.id_pelayanan = p.id_pelayanan AND rw.id_kamar = rwt.id_kamar AND(
                                    h.ket_keluar LIKE '%Meninggal%' OR h.ket_keluar NOT LIKE '%meninggal%'
                                ) AND rwt.status = 'KELUAR'
                        )
                        ),
                        2
                    ),
                    0
                ) AS avlos,
                IFNULL(
                    ROUND(
                        SUM(
                            (
                                (
                                    (
                                        SELECT COUNT(id_ruangan)  
                                        FROM ruangan 
                                        WHERE 
                                        kelas_ruangan NOT IN('BOX BAYI', 'KAMAR OPERASI') AND 
                                        keterangan = 'AKTIF' AND kelas = r.kelas 
                                ) * DAY(LAST_DAY(rw.tanggal_masuk))
                                ) -(
                                    DATEDIFF(
                                        rw.tanggal_keluar,
                                        rw.tanggal_masuk
                                    ) + 1
                                )
                            ) /(
                            SELECT
                                COUNT(rwt.status)
                            FROM
                                riwayat_kamar rwt
                            WHERE
                                rwt.id_pelayanan = p.id_pelayanan AND rw.id_kamar = rwt.id_kamar AND(
                                    h.ket_keluar LIKE '%Meninggal%' OR h.ket_keluar NOT LIKE '%Meninggal%'
                                ) AND rwt.status = 'KELUAR'
                        )
                        ),
                        2
                    ),
                    0
                ) AS toi,
                IFNULL(
                    ROUND(
                        SUM(
                            (
                                (
                                SELECT
                                    COUNT(rwt.status)
                                FROM
                                    riwayat_kamar rwt
                                WHERE
                                    rwt.id_pelayanan = p.id_pelayanan AND rw.id_kamar = rwt.id_kamar AND(
                                        h.ket_keluar LIKE '%Meninggal%' OR h.ket_keluar NOT LIKE '%meninggal%'
                                    ) AND rwt.status = 'KELUAR'
                            )
                            ) /(
                                (
                                    SELECT COUNT(id_ruangan)  
                                    FROM ruangan 
                                    WHERE 
                                    kelas_ruangan NOT IN('BOX BAYI', 'KAMAR OPERASI') AND 
                                    keterangan = 'AKTIF' AND kelas = r.kelas 

                                )
                            )
                        ),
                        2
                    ),
                    0
                ) AS bto,
                IFNULL(
                    ROUND(
                        SUM(
                            (
                                (
                                    (
                                    SELECT
                                        COUNT(rwt.status)
                                    FROM
                                        riwayat_kamar rwt
                                    WHERE
                                        rwt.id_pelayanan = p.id_pelayanan AND rw.id_kamar = rwt.id_kamar AND(
                                            h.ket_keluar = 'Meninggal > 48 JAM' OR h.ket_keluar = 'Meninggal'
                                        ) AND rwt.status = 'KELUAR'
                                )
                                ) /(
                                    (
                                    SELECT
                                        COUNT(rwt.status)
                                    FROM
                                        riwayat_kamar rwt
                                    WHERE
                                        rwt.id_pelayanan = p.id_pelayanan AND rw.id_kamar = rwt.id_kamar AND(
                                            h.ket_keluar LIKE '%Meninggal%' OR h.ket_keluar NOT LIKE '%Meninggal%'
                                        ) AND rwt.status = 'KELUAR'
                                )
                                )
                            ) * 1000
                        ),
                        2
                    ),
                    0
                ) AS ndr,
                IFNULL(
                    ROUND(
                        SUM(
                            (
                                (
                                SELECT
                                    COUNT(rwt.status)
                                FROM
                                    riwayat_kamar rwt
                                WHERE
                                    rwt.id_pelayanan = p.id_pelayanan AND rw.id_kamar = rwt.id_kamar AND(h.ket_keluar LIKE '%Meninggal%') AND rwt.status = 'KELUAR'
                            )
                            ) /(
                                (
                                SELECT
                                    COUNT(rwt.status)
                                FROM
                                    riwayat_kamar rwt
                                WHERE
                                    rwt.id_pelayanan = p.id_pelayanan AND rw.id_kamar = rwt.id_kamar AND(
                                        h.ket_keluar LIKE '%Meninggal%' OR h.ket_keluar NOT LIKE '%Meninggal%'
                                    ) AND rwt.status = 'KELUAR'
                            )
                            ) * 1000
                        ),
                        2
                    ),
                    0
                ) AS gdr
            FROM
                history_pelayanan_ranap h
            JOIN pelayanan p ON
                p.id_pelayanan = h.id_pelayanan
            JOIN riwayat_kamar rw ON
                p.id_pelayanan = rw.id_pelayanan
            JOIN ruangan r ON
                r.id_ruangan = rw.id_kamar
            WHERE
                YEAR(h.tgl_masuk) = $year AND h.jenis_pelayanan = 'rawat inap' AND p.status_rawat = 'selesai' AND p.status = 1 AND h.status = 1 AND r.kelas_ruangan NOT IN('BOX BAYI', 'KAMAR OPERASI') AND r.KETERANGAN = 'AKTIF' 
                -- YEAR(h.tgl_masuk) = $year AND MONTH(h.tgl_masuk) = 11 AND h.jenis_pelayanan = 'rawat inap' AND p.status_rawat = 'selesai' AND p.status = 1 AND h.status = 1 AND r.kelas_ruangan NOT IN('BOX BAYI', 'KAMAR OPERASI') AND r.KETERANGAN = 'AKTIF' 
            GROUP BY
                nama_kelas
            ORDER BY
                nama_kelas ASC

        ";

        $hasil = $this->db->query($sql, array($year))->result();
        return $hasil;
    }


    public function selectLaporanJasaPoli()
    {
        $this->db->select('d.id_dokter, sum(p.biaya_jasa) total, d.nama, l.nama_panjang poli');
        $this->db->from('pelayanan p, history_pelayanan h, dokter d, list_poli l');
        $this->db->where('p.id_pelayanan=h.id_pelayanan and h.dpjp=d.id_dokter and d.dokter_spes=l.kdpoli_bpjs and p.status_rawat="selesai" and p.status=1 and d.nama!="-"');
        $this->db->group_by('h.dpjp');
        return $this->db->get()->result();
    }
    public function selectLaporanJasaUgd()
    {
        $this->db->select('d.id_dokter, sum(p.biaya_jasa) total, d.nama dokter');
        $this->db->from('pelayanan p, history_pelayanan_ugd h, dokter d');
        $this->db->where('p.id_pelayanan=h.id_pelayanan and h.dpjp=d.id_dokter and p.status_rawat="selesai" and p.status=1');
        $this->db->group_by('h.dpjp');
        return $this->db->get()->result();
    }
    public function selectLaporanCaraBayar()
    {
        $this->db->select('d.nama, d.id_dokter, l.nama_panjang poli,l.id_list_poli id_poli,d.dokter_spes');
        $this->db->from('dokter d');
        $this->db->join(' list_poli l', ' d.dokter_spes = l.kdpoli_bpjs');
        $this->db->where('d.id_dokter !=', '-');
        $this->db->group_by('d.id_dokter');
        return $this->db->get()->result();
    }
    public function getJumlahPasienByCB($dok, $jenis, $id_poli)
    {
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT COUNT(p.id_pelayanan) total
        FROM pelayanan p, history_pelayanan h, list_poli l, cara_bayar c
        WHERE p.id_pelayanan=h.id_pelayanan 
        and h.nama_poli=l.id_list_poli 
        AND p.cara_bayar=c.id_cara_bayar
        AND p.status = 1 and h.status=1
        AND p.tgl_masuk like '%$tgl%'
        and h.nama_poli ='$id_poli'
        and c.jenis = '$jenis' and h.dpjp = '$dok'");
        return $query->row();
    }
    public function getJumlahPasienByCBRange($dok, $jenis, $mulai, $akhir, $id_poli)
    {
        $query = $this->db->query("SELECT COUNT(p.id_pelayanan) total
        FROM pelayanan p, history_pelayanan h, list_poli l, cara_bayar c
        WHERE p.id_pelayanan=h.id_pelayanan 
        and h.nama_poli=l.id_list_poli 
        AND p.cara_bayar=c.id_cara_bayar
        AND p.status = 1 and h.status=1
        AND p.tgl_masuk between '$mulai' and '$akhir'
        and h.nama_poli ='$id_poli'
        and c.jenis = '$jenis' and h.dpjp = '$dok'");
        return $query->row();
    }
    //LAPORAN MUTU POLI
    public function selectLaporanMutuPoli()
    {
        $tgl = date("Y-m-d");
        $this->db->select('p.nama,p.no_rm,b.tgl_masuk, b.tgl_keluar, timediff(b.tgl_keluar,b.tgl_masuk) lama_berobat, c.nama cara_bayar');
        $this->db->from('pasien p, pelayanan b, history_pelayanan h, cara_bayar c ');
        $this->db->where(' p.no_rm = b.id_pasien and b.id_pelayanan = h.id_pelayanan and b.cara_bayar = c.id_cara_bayar');
        $this->db->where(' h.status', 1);
        $this->db->where(' b.status', 1);
        $this->db->where(' b.status_rawat', 'selesai');
        $this->db->where('b.tgl_masuk', $tgl);
        return $this->db->get()->result();
    }
    public function selectLaporanMutuPoliRange($mulai, $akhir)
    {
        $tgl = date("Y-m-d");
        $this->db->select('p.nama,p.no_rm,b.tgl_masuk, b.tgl_keluar, timediff(b.tgl_keluar,b.tgl_masuk) lama_berobat, c.nama cara_bayar');
        $this->db->from('pasien p, pelayanan b, history_pelayanan h, cara_bayar c ');
        $this->db->where(' p.no_rm = b.id_pasien and b.id_pelayanan = h.id_pelayanan and b.cara_bayar = c.id_cara_bayar');
        $this->db->where(' h.status', 1);
        $this->db->where(' b.status', 1);
        $this->db->where(' b.status_rawat', 'selesai');
        $this->db->where('b.tgl_masuk >=', $mulai);
        $this->db->where('b.tgl_masuk <=', $akhir);
        return $this->db->get()->result();
    }


    //LAPORAN BEROBAT PASIEN BARU
    public function selectLaporanBerobatPasienBaru()
    {
        $tgl = date("Y-m-d");
        $this->db->select('p.nama,p.no_rm,b.tgl_masuk, b.tgl_keluar, timediff(b.tgl_keluar,b.tgl_masuk) lama_berobat, c.nama cara_bayar');
        $this->db->from('pasien p, pelayanan b, history_pelayanan h, cara_bayar c ');
        $this->db->where(' p.no_rm = b.id_pasien and b.id_pelayanan = h.id_pelayanan and b.cara_bayar = c.id_cara_bayar');
        $this->db->where(' h.status', 1);
        $this->db->where(' b.status', 1);
        $this->db->where(' b.status_rawat', 'selesai');
        $this->db->where('p.tgl_daftar', $tgl);
        return $this->db->get()->result();
    }
    public function selectLaporanBerobatPasienBaruRange($mulai, $akhir)
    {
        $tgl = date("Y-m-d");
        $this->db->select('p.nama,p.no_rm,b.tgl_masuk, b.tgl_keluar, timediff(b.tgl_keluar,b.tgl_masuk) lama_berobat, c.nama cara_bayar');
        $this->db->from('pasien p, pelayanan b, history_pelayanan h, cara_bayar c ');
        $this->db->where(' p.no_rm = b.id_pasien and b.id_pelayanan = h.id_pelayanan and b.cara_bayar = c.id_cara_bayar');
        $this->db->where(' h.status', 1);
        $this->db->where(' b.status', 1);
        $this->db->where(' b.status_rawat', 'selesai');
        $this->db->where('p.tgl_daftar>=', $mulai);
        $this->db->where('p.tgl_daftar <=', $akhir);
        return $this->db->get()->result();
    }


    public function SelectLaporanPenyakitTertinggiRajal()
    {
        $tgl = date("Y-m-d");
        $this->db->select('e.kode, e.nama_diagnosa, count(e.nama_diagnosa) jumlah, c.nama jenis_klaim');
        $this->db->from('diagnosa_utama e, pelayanan p, cara_bayar c ');
        $this->db->where('p.id_pelayanan=e.id_pelayanan');
        $this->db->where('p.cara_bayar=c.id_cara_bayar');
        $this->db->like('e.tanggal', $tgl);
        $this->db->group_by('e.kode ');
        $this->db->limit(10);
        $this->db->order_by('jumlah ', 'desc');
        return $this->db->get()->result();
    }
    public function SelectLaporanRangePenyakitTertinggiRajal($first_date, $second_date, $jenis_klaim)
    {
        if ($jenis_klaim == 'BPJS') {
            $this->db->select('e.kode, e.nama_diagnosa, count(e.nama_diagnosa) jumlah, c.nama jenis_klaim');
            $this->db->from('diagnosa_utama e, pelayanan p, cara_bayar c ');
            $this->db->where('p.id_pelayanan=e.id_pelayanan');
            $this->db->where('p.cara_bayar=c.id_cara_bayar');
            $this->db->where('c.jenis', 'BPJS');
            $this->db->where("e.tanggal BETWEEN '$first_date' AND '$second_date'");
            $this->db->group_by('e.kode');
            $this->db->order_by('jumlah desc');
            $this->db->limit(10);
            return $this->db->get()->result();
        } else if ($jenis_klaim == 'UMUM') {
            $this->db->select('e.kode, e.nama_diagnosa, count(e.nama_diagnosa) jumlah, c.nama jenis_klaim');
            $this->db->from('diagnosa_utama e, pelayanan p, cara_bayar c ');
            $this->db->where('p.id_pelayanan=e.id_pelayanan');
            $this->db->where('p.cara_bayar=c.id_cara_bayar');
            $this->db->where('c.jenis', 'UMUM');
            $this->db->where("e.tanggal BETWEEN '$first_date' AND '$second_date'");
            $this->db->group_by('e.kode ');
            $this->db->order_by('jumlah desc');
            $this->db->limit(10);
            return $this->db->get()->result();
        } else if ($jenis_klaim == 'MITRA') {
            $this->db->select('e.kode, e.nama_diagnosa, count(e.nama_diagnosa) jumlah, c.nama jenis_klaim');
            $this->db->from('diagnosa_utama e, pelayanan p, cara_bayar c ');
            $this->db->where('p.id_pelayanan=e.id_pelayanan');
            $this->db->where('p.cara_bayar=c.id_cara_bayar');
            $this->db->where('c.jenis', 'MITRA');
            $this->db->where("e.tanggal BETWEEN '$first_date' AND '$second_date'");
            $this->db->group_by('e.kode ');
            $this->db->order_by('jumlah desc');
            $this->db->limit(10);
            return $this->db->get()->result();
        } else if ($jenis_klaim == 'TIMAH') {
            $this->db->select('e.kode, e.nama_diagnosa, count(e.nama_diagnosa) jumlah, c.nama jenis_klaim');
            $this->db->from('diagnosa_utama e, pelayanan p, cara_bayar c ');
            $this->db->where('p.id_pelayanan=e.id_pelayanan');
            $this->db->where('p.cara_bayar=c.id_cara_bayar');
            $this->db->where('c.jenis', 'TIMAH');
            $this->db->where("e.tanggal BETWEEN '$first_date' AND '$second_date'");
            $this->db->group_by('e.kode ');
            $this->db->order_by('jumlah desc');
            $this->db->limit(10);
            return $this->db->get()->result();
        } else if ($jenis_klaim == 'INTERNAL') {
            $this->db->select('e.kode, e.nama_diagnosa, count(e.nama_diagnosa) jumlah, c.nama jenis_klaim');
            $this->db->from('diagnosa_utama e, pelayanan p, cara_bayar c ');
            $this->db->where('p.id_pelayanan=e.id_pelayanan');
            $this->db->where('p.cara_bayar=c.id_cara_bayar');
            $this->db->where('c.jenis', 'INTERNAL');
            $this->db->where("e.tanggal BETWEEN '$first_date' AND '$second_date'");
            $this->db->group_by('e.kode ');
            $this->db->order_by('jumlah desc');
            $this->db->limit(10);
            return $this->db->get()->result();
        } else {
            $this->db->select('e.kode, e.nama_diagnosa, count(e.nama_diagnosa) jumlah, c.nama jenis_klaim');
            $this->db->from('diagnosa_utama e, pelayanan p, cara_bayar c ');
            $this->db->where('p.id_pelayanan=e.id_pelayanan');
            $this->db->where('p.cara_bayar=c.id_cara_bayar');
            $this->db->where('c.jenis', 'LAINNYA');
            $this->db->where("e.tanggal BETWEEN '$first_date' AND '$second_date'");
            $this->db->group_by('e.kode ');
            $this->db->order_by('jumlah desc');
            $this->db->limit(10);
            return $this->db->get()->result();
        }
    }

    public function selectDataJumlahPasienPoli($tgl)
    {
        // $tgl = date("Y-m-d");
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT *
        FROM v_kunjungan
        where jenis_pelayanan = 'POLI' and tgl_masuk LIKE '%$tgl%' and poli != 'LABORATORIUM' and poli != 'RADIOLOGI' and id_pelayanan in (select id_pelayanan from history_pelayanan_ranap )
        order by tgl_masuk asc ")->result();
    }

    public function selectDataJumlahPasienPoliRange($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT *
        FROM v_kunjungan v
        where jenis_pelayanan = 'POLI' and tgl_masuk>='$mulai' and tgl_masuk<='$akhir' and poli != 'LABORATORIUM' and poli != 'RADIOLOGI' and id_pelayanan in (select id_pelayanan from history_pelayanan_ranap )
        order by tgl_masuk asc ")->result();
    }

    public function selectLaporanKesehatanGigiMulut()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT l.nama tindakan, count(l.id_list_tindakan) jml
        FROM pelayanan p, pasien pas, cara_bayar c, tindakan_poli_bedah_mulut t, list_tindakan_poli_bedah_mulut l
        WHERE l.id_list_tindakan=t.id_list_tindakan AND p.id_pelayanan=t.id_pelayanan AND c.id_cara_bayar=p.cara_bayar AND pas.no_rm=p.id_pasien and p.status=1 and t.tanggal LIKE '$tgl'
        UNION 
        SELECT l.nama tindakan, count(l.id_list_tindakan) jml
        FROM pelayanan p, pasien pas, cara_bayar c, tindakan_poli_penyakit_mulut t, list_tindakan_poli_penyakit_mulut l
        WHERE l.id_list_tindakan=t.id_list_tindakan AND p.id_pelayanan=t.id_pelayanan AND c.id_cara_bayar=p.cara_bayar AND pas.no_rm=p.id_pasien and p.status=1 and t.tanggal LIKE '$tgl'
        UNION
        SELECT l.nama tindakan, count(l.id_list_tindakan) jml
        FROM pelayanan p, pasien pas, cara_bayar c, tindakan_poli_gigi t, list_tindakan_poli_gigi l
        WHERE l.id_list_tindakan=t.id_list_tindakan AND p.id_pelayanan=t.id_pelayanan AND c.id_cara_bayar=p.cara_bayar AND pas.no_rm=p.id_pasien and p.status=1 and t.tanggal LIKE '$tgl'
        GROUP by l.nama");
        return $hasil->result();
    }

    public function selectRangeLaporanKesehatanGigiMulut($mulai, $akhir, $poli)
    {
        if ($poli == 'BEDAH MULUT') {
            $this->db->select(' l.nama tindakan, count(t.id_tindakan) jml');
            $this->db->from('pelayanan p, pasien pas, cara_bayar c, tindakan_poli_bedah_mulut t, list_tindakan_poli_bedah_mulut l');
            $this->db->where('p.id_pelayanan=t.id_pelayanan');
            $this->db->where('l.id_list_tindakan=t.id_list_tindakan');
            $this->db->where('p.cara_bayar=c.id_cara_bayar');
            $this->db->where('pas.no_rm=p.id_pasien');
            $this->db->where('p.status', 1);
            $this->db->where('p.status_rawat', 'selesai');
            $this->db->group_by('l.nama');
            $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        } else if ($poli == 'PENYAKIT MULUT') {
            $this->db->select(' l.nama tindakan, count(t.id_tindakan) jml');
            $this->db->from('pelayanan p, pasien pas, cara_bayar c, tindakan_poli_penyakit_mulut t, list_tindakan_poli_penyakit_mulut l, history_pelayanan h, list_poli lp');
            $this->db->where('p.id_pelayanan=t.id_pelayanan');
            $this->db->where('l.id_list_tindakan=t.id_list_tindakan');
            $this->db->where('h.nama_poli=lp.id_list_poli');
            $this->db->where('h.id_pelayanan=p.id_pelayanan');
            $this->db->where('p.cara_bayar=c.id_cara_bayar');
            $this->db->where('pas.no_rm=p.id_pasien');
            $this->db->where('p.status', 1);
            $this->db->where('p.status_rawat', 'selesai');
            $this->db->group_by('l.nama');
            $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        } else if ($poli == 'GIGI') {
            $this->db->select(' l.nama tindakan, count(t.id_tindakan) jml');
            $this->db->from('pelayanan p, pasien pas, cara_bayar c, tindakan_poli_gigi t, list_tindakan_poli_gigi l, history_pelayanan h, list_poli lp');
            $this->db->where('p.id_pelayanan=t.id_pelayanan');
            $this->db->where('h.nama_poli=lp.id_list_poli');
            $this->db->where('h.id_pelayanan=p.id_pelayanan');
            $this->db->where('l.id_list_tindakan=t.id_list_tindakan');
            $this->db->where('p.cara_bayar=c.id_cara_bayar');
            $this->db->where('pas.no_rm=p.id_pasien');
            $this->db->where('p.status', 1);
            $this->db->where('p.status_rawat', 'selesai');
            $this->db->group_by('l.nama');
            $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        }
        return $this->db->get()->result();
    }
    public function selectStaff()
    {
        $this->db->select('id_staff, nama');
        $this->db->where('tipe', 'kasir');
        $this->db->where('nama !=', 'kasir');
        $this->db->where('status', 'aktif');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('staff')->result();
    }

    public function selectLaporanRehabMedik()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT l.nama tindakan, count(l.id_list_tindakan) jml
        FROM pelayanan p, pasien pas, cara_bayar c, tindakan_poli_bedah_mulut t, list_tindakan_poli_bedah_mulut l
        WHERE l.id_list_tindakan=t.id_list_tindakan AND p.id_pelayanan=t.id_pelayanan AND c.id_cara_bayar=p.cara_bayar AND pas.no_rm=p.id_pasien and p.status=1 and t.tanggal LIKE '$tgl'
        UNION 
        SELECT l.nama tindakan, count(l.id_list_tindakan) jml
        FROM pelayanan p, pasien pas, cara_bayar c, tindakan_poli_penyakit_mulut t, list_tindakan_poli_penyakit_mulut l
        WHERE l.id_list_tindakan=t.id_list_tindakan AND p.id_pelayanan=t.id_pelayanan AND c.id_cara_bayar=p.cara_bayar AND pas.no_rm=p.id_pasien and p.status=1 and t.tanggal LIKE '$tgl'
        UNION
        SELECT l.nama tindakan, count(l.id_list_tindakan) jml
        FROM pelayanan p, pasien pas, cara_bayar c, tindakan_poli_gigi t, list_tindakan_poli_gigi l
        WHERE l.id_list_tindakan=t.id_list_tindakan AND p.id_pelayanan=t.id_pelayanan AND c.id_cara_bayar=p.cara_bayar AND pas.no_rm=p.id_pasien and p.status=1 and t.tanggal LIKE '$tgl'
        GROUP by l.nama");
        return $hasil->result();
    }

    public function selectRangeLaporanRehabMedik($mulai, $akhir, $poli)
    {
        if ($poli == 'KESEHATAN JIWA') {
            $this->db->select(' l.nama tindakan, count(t.id_tindakan) jml');
            $this->db->from('pelayanan p, tindakan_poli_kes_jiwa t, list_tindakan_poli_kes_jiwa l');
            $this->db->where('p.id_pelayanan=t.id_pelayanan');
            $this->db->where('l.id_list_tindakan=t.id_list_tindakan');
            $this->db->where('p.cara_bayar=c.id_cara_bayar');
            $this->db->where('pas.no_rm=p.id_pasien');
            $this->db->where('p.status', 1);
            $this->db->where('p.status_rawat', 'selesai');
            $this->db->group_by('l.nama');
            $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        } else if ($poli == 'FISIOTERAPI') {
            $this->db->select(' l.nama tindakan, count(t.id_tindakan) jml');
            $this->db->from('pelayanan p, tindakan_poli_fisio t, list_tindakan_poli_fisio l');
            $this->db->where('p.id_pelayanan=t.id_pelayanan');
            $this->db->where('l.id_list_tindakan=t.id_list_tindakan');
            // $this->db->where('h.nama_poli=lp.id_list_poli');
            // $this->db->where('h.id_pelayanan=p.id_pelayanan');
            // $this->db->where('p.cara_bayar=c.id_cara_bayar');
            // $this->db->where('pas.no_rm=p.id_pasien');
            $this->db->where('p.status', 1);
            $this->db->where('p.status_rawat', 'selesai');
            $this->db->group_by('l.nama');
            $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        } else if ($poli == 'TERAPI WICARA') {
            $this->db->select(' l.nama tindakan, count(t.id_tindakan) jml');
            $this->db->from('pelayanan p, tindakan_poli_terapi_bicara t, list_tindakan_poli_terapi_bicara l');
            $this->db->where('p.id_pelayanan=t.id_pelayanan');
            // $this->db->where('h.nama_poli=lp.id_list_poli');
            // $this->db->where('h.id_pelayanan=p.id_pelayanan');
            $this->db->where('l.id_list_tindakan=t.id_list_tindakan');
            $this->db->where('p.cara_bayar=c.id_cara_bayar');
            $this->db->where('pas.no_rm=p.id_pasien');
            $this->db->where('p.status', 1);
            $this->db->where('p.status_rawat', 'selesai');
            $this->db->group_by('l.nama');
            $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        } else if ($poli == 'REHAB') {
            $this->db->select(' l.nama tindakan, count(t.id_tindakan) jml');
            $this->db->from('pelayanan p, tindakan_poli_rehab t, list_tindakan_poli_rehab l');
            $this->db->where('p.id_pelayanan=t.id_pelayanan');
            // $this->db->where('h.nama_poli=lp.id_list_poli');
            // $this->db->where('h.id_pelayanan=p.id_pelayanan');
            $this->db->where('l.id_list_tindakan=t.id_list_tindakan');
            $this->db->where('p.cara_bayar=c.id_cara_bayar');
            $this->db->where('pas.no_rm=p.id_pasien');
            $this->db->where('p.status', 1);
            $this->db->where('p.status_rawat', 'selesai');
            $this->db->group_by('l.nama');
            $this->db->where("t.tanggal BETWEEN '$mulai' AND '$akhir'");
        }
        return $this->db->get()->result();
    }

    public function selectPoli()
    {
        $this->db->select('l.*');
        $this->db->from('list_poli l');
        // $this->db->join(' list_poli l', ' d.dokter_spes = l.kdpoli_bpjs');
        // $this->db->where('l.status_dokter', 'ADA');
        $this->db->where_not_in('l.no_urut', 0);
        $this->db->order_by('l.no_urut asc');
        return $this->db->get()->result();
    }
    public function selectKunjunganRajal($id_poli)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT l.nama_panjang poli, COUNT(p.id_pelayanan) jumlah 
        FROM pelayanan p, history_pelayanan h, list_poli l, cara_bayar c 
        WHERE p.id_pelayanan=h.id_pelayanan 
        and h.nama_poli=l.id_list_poli 
        AND p.cara_bayar=c.id_cara_bayar 
        AND h.status=1 and p.status = 1 and l.id_list_poli = '$id_poli'
        AND p.tgl_masuk like '%$tgl%'");
        return $hasil->row();
    }

    public function selectRangeKunjunganRajal($mulai, $akhir, $id_poli)
    {
        $hasil = $this->db->query("SELECT l.nama_panjang poli, COUNT(p.id_pelayanan) jumlah 
        FROM pelayanan p, history_pelayanan h, list_poli l, cara_bayar c 
        WHERE p.id_pelayanan=h.id_pelayanan 
        and h.nama_poli=l.id_list_poli 
        AND p.cara_bayar=c.id_cara_bayar 
        AND h.status=1 and p.status = 1 and l.id_list_poli = '$id_poli'
        AND p.tgl_masuk >= '$mulai' and p.tgl_masuk <= '$akhir' ");
        return $hasil->row();
    }

    public function selectKunjunganRs()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT  'Pengunjung Baru' as jenis, COUNT(b.id_pelayanan) jumlah 
        FROM pelayanan b, pasien p
        WHERE b.id_pasien=p.no_rm 
        AND b.status = 1 
        and date(b.tgl_masuk) = date(p.tgl_daftar)
        AND b.tgl_masuk like '%$tgl%'
        UNION ALL
        SELECT  'Pengunjung Lama' as jenis, COUNT(b.id_pelayanan) jumlah 
        FROM pelayanan b, pasien p
        WHERE b.id_pasien=p.no_rm 
        AND b.status = 1 
        and date(b.tgl_masuk) != date(p.tgl_daftar)
        AND b.tgl_masuk like '%$tgl%'");
        return $hasil->result();
    }

    public function selectRangeKunjunganRs($mulai, $akhir)
    {
        $hasil = $this->db->query("SELECT  'Pengunjung Baru' as jenis, COUNT(b.id_pelayanan) jumlah 
        FROM pelayanan b, pasien p
        WHERE b.id_pasien=p.no_rm 
        AND b.status = 1 
        and date(b.tgl_masuk) = date(p.tgl_daftar)
        AND b.tgl_masuk >= '$mulai' and b.tgl_masuk <= '$akhir'
        UNION ALL
        SELECT  'Pengunjung Lama' as jenis, COUNT(b.id_pelayanan) jumlah 
        FROM pelayanan b, pasien p
        WHERE b.id_pasien=p.no_rm 
        AND b.status = 1 
        and date(b.tgl_masuk) != date(p.tgl_daftar)
        AND b.tgl_masuk >= '$mulai' and b.tgl_masuk <= '$akhir'");
        return $hasil->result();
    }

    public function selectLaporanKunjunganCaraBayar()
    {
        $this->db->select('c.*');
        $this->db->from('cara_bayar c');
        // $this->db->join(' list_poli l', ' d.dokter_spes = l.kdpoli_bpjs');
        $this->db->where('c.id_cara_bayar !=', '-');
        return $this->db->get()->result();
    }
    public function selectLaporanIgd()
    {
        $tgl = date("Y-m-d");
        $this->db->select('count(p.id_pelayanan) total, c.jenis');
        $this->db->from('pelayanan p, history_pelayanan_ugd h, cara_bayar c');
        // $this->db->join(' list_poli l', ' d.dokter_spes = l.kdpoli_bpjs');
        $this->db->where('c.id_cara_bayar !=', '-');
        $this->db->where('p.id_pelayanan=h.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('c.id_cara_bayar !=', '-');
        $this->db->where('p.status', 1);
        $this->db->like('p.tgl_masuk', $tgl);
        $this->db->group_by('c.jenis');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanIgd($mulai, $akhir)
    {
        $tgl = date("Y-m-d");
        $this->db->select('count(p.id_pelayanan) total, c.jenis');
        $this->db->from('pelayanan p, history_pelayanan_ugd h, cara_bayar c');
        // $this->db->join(' list_poli l', ' d.dokter_spes = l.kdpoli_bpjs');
        $this->db->where('c.id_cara_bayar !=', '-');
        $this->db->where('p.id_pelayanan=h.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('c.id_cara_bayar !=', '-');
        $this->db->where('p.status', 1);
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->group_by('c.jenis');
        return $this->db->get()->result();
    }

    public function getJumlahKunjunganbyCB($id_cara_bayar, $tabel)
    {
        $tgl = date("Y-m-d");
        $this->db->select('COUNT(h.id_history) total');
        $this->db->from('pelayanan b,' . $tabel . ' h');
        $this->db->where('b.id_pelayanan = h.id_pelayanan');
        $this->db->where('b.cara_bayar', $id_cara_bayar);
        $this->db->where('b.status', 1);
        // $this->db->where('b.status_rawat', 'selesai');
        $this->db->where('h.status', 1);
        $this->db->like('b.tgl_masuk', $tgl);
        return $this->db->get()->row();
    }

    public function getJumlahKunjunganByCBRange($id_cara_bayar, $tabel, $mulai, $akhir)
    {
        $this->db->select('COUNT(b.id_pelayanan) total');
        $this->db->from('pelayanan b,' . $tabel . ' h');
        $this->db->where('b.id_pelayanan = h.id_pelayanan');
        $this->db->where('b.cara_bayar', $id_cara_bayar);
        $this->db->where('b.status', 1);
        // $this->db->where('b.status_rawat', 'selesai');
        $this->db->where('h.status', 1);
        // $this->db->where('b.tgl_masuk >=', $mulai);            
        $this->db->where("b.tgl_masuk BETWEEN '$mulai' AND '$akhir'");
        // $this->db->where('b.tgl_masuk <=', $akhir);
        return $this->db->get()->row();
    }

    public function selectPengadaanObat()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT  'Pengunjung Baru' as jenis, COUNT(b.id_pelayanan) jumlah 
        FROM pelayanan b, pasien p
        WHERE b.id_pasien=p.no_rm 
        AND b.status = 1 
        and date(b.tgl_masuk) = date(p.tgl_daftar)
        AND b.tgl_masuk like '%$tgl%'
        UNION ALL
        SELECT  'Pengunjung Lama' as jenis, COUNT(b.id_pelayanan) jumlah 
        FROM pelayanan b, pasien p
        WHERE b.id_pasien=p.no_rm 
        AND b.status = 1 
        and date(b.tgl_masuk) != date(p.tgl_daftar)
        AND b.tgl_masuk like '%$tgl%'");
        return $hasil->result();
    }

    public function selectRangePengadaanObat($mulai, $akhir)
    {
        $hasil = $this->db->query("SELECT  'Pengunjung Baru' as jenis, COUNT(b.id_pelayanan) jumlah 
        FROM pelayanan b, pasien p
        WHERE b.id_pasien=p.no_rm 
        AND b.status = 1 
        and date(b.tgl_masuk) = date(p.tgl_daftar)
        AND b.tgl_masuk >= '$mulai' and b.tgl_masuk <= '$akhir'
        UNION ALL
        SELECT  'Pengunjung Lama' as jenis, COUNT(b.id_pelayanan) jumlah 
        FROM pelayanan b, pasien p
        WHERE b.id_pasien=p.no_rm 
        AND b.status = 1 
        and date(b.tgl_masuk) != date(p.tgl_daftar)
        AND b.tgl_masuk >= '$mulai' and b.tgl_masuk <= '$akhir'");
        return $hasil->result();
    }

    public function selectLaporanPasienBatal()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT ps.no_rm, ps.nama pasien, ps.jenis_kelamin, lp.nama_panjang poli, d.nama dokter, p.tgl_masuk
        FROM pelayanan p, history_pelayanan h, pasien ps, list_poli lp, dokter d
        WHERE p.id_pelayanan=h.id_pelayanan and ps.no_rm=p.id_pasien and h.nama_poli=lp.id_list_poli and d.id_dokter=h.dpjp and (p.status=0 or h.status=0) and p.tgl_masuk like '%$tgl%'
        UNION ALL
        SELECT ps.no_rm, ps.nama pasien, ps.jenis_kelamin, 'UGD' poli, d.nama dokter, p.tgl_masuk
        FROM pelayanan p, history_pelayanan_ugd h, pasien ps, dokter d
        WHERE p.id_pelayanan=h.id_pelayanan and ps.no_rm=p.id_pasien and d.id_dokter=h.dpjp and (p.status=0 or h.status=0) and p.tgl_masuk like '%$tgl%'");
        return $hasil->result();
    }

    public function selectLaporanRangePasienBatal($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $hasil = $this->db->query("SELECT ps.no_rm, ps.nama pasien, ps.jenis_kelamin, lp.nama_panjang poli, d.nama dokter, p.tgl_masuk
        FROM pelayanan p, history_pelayanan h, pasien ps, list_poli lp, dokter d
        WHERE p.id_pelayanan=h.id_pelayanan and ps.no_rm=p.id_pasien and h.nama_poli=lp.id_list_poli and d.id_dokter=h.dpjp and (p.status=0 or h.status=0) and p.tgl_masuk >= '$mulai' and p.tgl_masuk <= '$akhir'
        UNION ALL
        SELECT ps.no_rm, ps.nama pasien, ps.jenis_kelamin, 'UGD' poli, d.nama dokter, p.tgl_masuk
        FROM pelayanan p, history_pelayanan_ugd h, pasien ps, dokter d
        WHERE p.id_pelayanan=h.id_pelayanan and ps.no_rm=p.id_pasien and d.id_dokter=h.dpjp and (p.status=0 or h.status=0) and p.tgl_masuk >= '$mulai' and p.tgl_masuk <= '$akhir'");
        return $hasil->result();
    }

    public function selectLaporanPendapatanRajal()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT ps.no_rm, ps.nama pasien, lp.nama_panjang poli, d.nama dokter, p.tgl_masuk, p.id_pelayanan, c.nama cara_bayar, sum(dk.total_bayar) total
        FROM pelayanan p, history_pelayanan h, pasien ps, list_poli lp, dokter d, cara_bayar c, deatail_kasir dk
        WHERE p.id_pelayanan=h.id_pelayanan and ps.no_rm=p.id_pasien and h.nama_poli=lp.id_list_poli and dk.id_pelayanan=p.id_pelayanan
        and c.id_cara_bayar=p.cara_bayar and d.id_dokter=h.dpjp and p.status=1 and p.tgl_masuk like '%$tgl%'");
        return $hasil->result();
    }

    public function selectRangeLaporanPendapatanRajal($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT ps.no_rm, ps.nama pasien, lp.nama_panjang poli, d.nama dokter, p.tgl_masuk, p.id_pelayanan, c.nama cara_bayar, sum(dk.total_bayar) total
        FROM pelayanan p, history_pelayanan h, pasien ps, list_poli lp, dokter d, cara_bayar c, deatail_kasir dk
        WHERE p.id_pelayanan=h.id_pelayanan and ps.no_rm=p.id_pasien and h.nama_poli=lp.id_list_poli and dk.id_pelayanan=p.id_pelayanan 
        and c.id_cara_bayar=p.cara_bayar 
        and d.id_dokter=h.dpjp and p.status=1 and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir') and p.status=1 and h.status=1");
        return $hasil->result();
    }

    public function getKonsulRajal($id_pelayanan)
    {
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT sum(p.biaya_jasa) total, p.id_pelayanan
        FROM pelayanan p, history_pelayanan h
        WHERE p.id_pelayanan=h.id_pelayanan  and p.status=1 and p.id_pelayanan='$id_pelayanan'");
        return $hasil->row();
    }

    public function selectLaporanTotalIgd()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT ps.no_rm, ps.nama pasien, 'UGD' poli, d.nama dokter, p.tgl_masuk, p.id_pelayanan, c.nama cara_bayar
        FROM pelayanan p, history_pelayanan_ugd h, pasien ps, dokter d, cara_bayar c
        WHERE p.id_pelayanan=h.id_pelayanan and ps.no_rm=p.id_pasien and c.id_cara_bayar=p.cara_bayar and d.id_dokter=h.dpjp and p.status=1 and p.tgl_masuk like '%$tgl%'");
        return $hasil->result();
    }

    public function selectRangeLaporanTotalIgd($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT ps.no_rm, ps.nama pasien, 'UGD' poli, d.nama dokter, p.tgl_masuk, p.id_pelayanan, c.nama cara_bayar
        FROM pelayanan p, history_pelayanan_ugd h, pasien ps, dokter d, cara_bayar c
        WHERE p.id_pelayanan=h.id_pelayanan and ps.no_rm=p.id_pasien and c.id_cara_bayar=p.cara_bayar and d.id_dokter=h.dpjp and p.status=1 and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1");
        return $hasil->result();
    }

    public function getKonsulIgd($id_pelayanan)
    {
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT sum(p.biaya_jasa) total, p.id_pelayanan
        FROM pelayanan p, history_pelayanan_ugd h
        WHERE p.id_pelayanan=h.id_pelayanan  and p.status=1 
        and p.id_pelayanan='$id_pelayanan'");
        return $hasil->row();
    }

    public function getKonsul($id_pelayanan)
    {
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT sum(p.biaya_jasa) total, p.id_pelayanan
        FROM pelayanan p
        WHERE p.status=1 
        and p.id_pelayanan='$id_pelayanan'");
        return $hasil->row();
    }
    // public function getTotalRajal($id_pelayanan)
    // {
    //     $tgl = date("Y-m-d");
    //     $hasil = $this->db->query("SELECT sum(d.total_bayar) total, d.id_pelayanan
    //     FROM deatail kasir d
    //     WHERE id_pelayanan='$id_pelayanan'");
    //     return $hasil->row();
    // }

    //total ranap
    public function selectLaporanTotalRanap()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT ps.no_rm, ps.nama pasien, r.kelas_ruangan ruangan, d.nama dokter, p.tgl_masuk, p.id_pelayanan, c.nama cara_bayar
        FROM pelayanan p, history_pelayanan_ranap h, pasien ps, ruangan r, dokter d, cara_bayar c
        WHERE p.id_pelayanan=h.id_pelayanan and ps.no_rm=p.id_pasien and h.id_kamar=r.id_ruangan and c.id_cara_bayar=p.cara_bayar 
        and d.id_dokter=h.dpjp and p.status=1 and p.tgl_masuk like '%$tgl%'");
        return $hasil->result();
    }
    public function getVisiteRanap($id_pelayanan)
    {
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT sum(t.total) total, p.id_pelayanan
        FROM tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p
        WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and t.id_pelayanan=p.id_pelayanan 
        and p.status=1 and l.nama LIKE '%VISIT%' ");
        return $hasil->row();
    }

    public function SelectLaporanPenyakitTertinggiIgd()
    {
        $tgl = date("Y-m-d");
        $this->db->select('e.kode, e.nama_diagnosa, count(e.nama_diagnosa) jumlah');
        $this->db->from('diagnosa_utama e, pelayanan p, history_pelayanan_ugd h ');
        $this->db->where('p.id_pelayanan=e.id_pelayanan');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where(' e.id_history=h.id_history');
        $this->db->like('e.tanggal', $tgl);
        $this->db->group_by('e.kode ');
        $this->db->order_by('jumlah ', 'desc');
        return $this->db->get()->result();
    }
    public function SelectLaporanRangePtIgd($mulai, $akhir)
    {
        $tgl = date("Y-m-d");
        $this->db->select('e.kode, e.nama_diagnosa, count(e.nama_diagnosa) jumlah');
        $this->db->from('diagnosa_utama e, pelayanan p, history_pelayanan_ugd h ');
        $this->db->where('p.id_pelayanan=e.id_pelayanan');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where(' e.id_history=h.id_history');
        $this->db->where('e.tanggal>=', $mulai);
        $this->db->where('e.tanggal<=', $akhir);
        $this->db->group_by('e.kode ');
        $this->db->order_by('jumlah ', 'desc');
        return $this->db->get()->result();
    }

    public function SelectLaporanPenyakitTertinggiIgdRanap()
    {
        $tgl = date("Y-m-d");
        $this->db->select('e.kode, e.nama_diagnosa, count(e.nama_diagnosa) jumlah');
        $this->db->from('diagnosa_utama e, pelayanan p, history_pelayanan_ugd h, history_pelayanan_ranap hr ');
        $this->db->where('p.id_pelayanan=e.id_pelayanan');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('h.id_pelayanan=hr.id_pelayanan');
        $this->db->where(' e.id_history=h.id_history');
        $this->db->like('e.tanggal', $tgl);
        $this->db->group_by('e.kode ');
        $this->db->order_by('jumlah ', 'desc');
        return $this->db->get()->result();
    }
    public function SelectLaporanRangePtIgdRanap($mulai, $akhir)
    {
        $tgl = date("Y-m-d");
        $this->db->select('e.kode, e.nama_diagnosa, count(e.nama_diagnosa) jumlah');
        $this->db->from('diagnosa_utama e, pelayanan p, history_pelayanan_ugd h, history_pelayanan_ranap hr ');
        $this->db->where('p.id_pelayanan=e.id_pelayanan');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('h.id_pelayanan=hr.id_pelayanan');
        $this->db->where(' e.id_history=h.id_history');
        $this->db->where('e.tanggal>=', $mulai);
        $this->db->where('e.tanggal<=', $akhir);
        $this->db->group_by('e.kode ');
        $this->db->order_by('jumlah ', 'desc');
        return $this->db->get()->result();
    }

    public function selectLaporanRangeJasmed($mulai, $akhir, $jenis_pelayanan)
    {
        // date_default_timezone_set('Asia/Jakarta');
        if ($jenis_pelayanan == 'POLI') {
            $hasil = $this->db->query("SELECT date(p.tgl_masuk) tgl_masuk, date(p.tgl_keluar) tgl_keluar, ps.no_rm, ps.nama pasien, l.nama tindakan, sum(l.harga_jasa) jasa_dokter, sum(l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_anak l, tindakan_poli_anak t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan
            UNION ALL
            SELECT date(p.tgl_masuk) tgl_masuk, date(p.tgl_keluar) tgl_keluar, ps.no_rm, ps.nama pasien, l.nama tindakan, sum(l.harga_jasa) jasa_dokter, sum(l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_bedah_umum l, tindakan_poli_bedah t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan
            UNION ALL
            SELECT date(p.tgl_masuk) tgl_masuk, date(p.tgl_keluar) tgl_keluar, ps.no_rm, ps.nama pasien, l.nama tindakan, sum(l.harga_jasa) jasa_dokter, sum(l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_fisio l, tindakan_poli_fisio t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan
            UNION ALL
            SELECT date(p.tgl_masuk) tgl_masuk, date(p.tgl_keluar) tgl_keluar, ps.no_rm, ps.nama pasien, l.nama tindakan, sum(l.harga_jasa) jasa_dokter, sum(l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_gigi l, tindakan_poli_gigi t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan
            UNION ALL
            SELECT date(p.tgl_masuk) tgl_masuk, date(p.tgl_keluar) tgl_keluar, ps.no_rm, ps.nama pasien, l.nama tindakan, sum(l.harga_jasa) jasa_dokter, sum(l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_internis l, tindakan_poli_internis t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan
            UNION ALL
            SELECT date(p.tgl_masuk) tgl_masuk, date(p.tgl_keluar) tgl_keluar, ps.no_rm, ps.nama pasien, l.nama tindakan, sum(l.harga_jasa) jasa_dokter, sum(l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_jantung l, tindakan_poli_jantung t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan
            UNION ALL
            SELECT date(p.tgl_masuk) tgl_masuk, date(p.tgl_keluar) tgl_keluar, ps.no_rm, ps.nama pasien, l.nama tindakan, sum(l.harga_jasa) jasa_dokter, sum(l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_kulit l, tindakan_poli_kulit t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan
            UNION ALL
            SELECT date(p.tgl_masuk) tgl_masuk, date(p.tgl_keluar) tgl_keluar, ps.no_rm, ps.nama pasien, l.nama tindakan, sum(l.harga_jasa) jasa_dokter, sum(l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_mata l, tindakan_poli_mata t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan
            UNION ALL
            SELECT date(p.tgl_masuk) tgl_masuk, date(p.tgl_keluar) tgl_keluar, ps.no_rm, ps.nama pasien, l.nama tindakan, sum(l.harga_jasa) jasa_dokter, sum(l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total,c.nama cara_bayar, d.nama dokter
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_obgyne l, tindakan_poli_obgyne t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan
            UNION ALL
            SELECT date(p.tgl_masuk) tgl_masuk, date(p.tgl_keluar) tgl_keluar, ps.no_rm, ps.nama pasien, l.nama tindakan, sum(l.harga_jasa) jasa_dokter, sum(l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_tht l, tindakan_poli_tht t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan
            UNION ALL
            SELECT date(p.tgl_masuk) tgl_masuk, date(p.tgl_keluar) tgl_keluar, ps.no_rm, ps.nama pasien, l.nama tindakan, sum(l.harga_jasa) jasa_dokter, sum(l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar,d.nama dokter
            FROM pelayanan p, pasien ps,history_pelayanan h, list_tindakan_poli_umum l, tindakan_poli_umum t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan
            order by pasien asc");
            return $hasil->result();
        } else if ($jenis_pelayanan == 'RANAP') {
            $hasil = $this->db->query("SELECT date(p.tgl_masuk) tgl_masuk, date(p.tgl_keluar) tgl_keluar, ps.no_rm, ps.nama pasien, l.nama tindakan, sum(l.harga_jasa) jasa_dokter, sum(l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter
            FROM pelayanan p, pasien ps,history_pelayanan_ranap h, list_tindakan_apelkes l, tindakan_apelkes t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_list_tindakan_apelkes=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1
            GROUP by t.id_pelayanan,l.id_list_tindakan_apelkes
            order by pasien asc");
            return $hasil->result();
        } else {
            $hasil = $this->db->query("SELECT date(p.tgl_masuk) tgl_masuk, date(p.tgl_keluar) tgl_keluar, ps.no_rm, ps.nama pasien, l.nama tindakan, sum(l.harga_jasa) jasa_dokter, sum(l.harga_sarana) biaya_rs, (l.harga_jasa+l.harga_sarana) total, c.nama cara_bayar, d.nama dokter
            FROM pelayanan p, pasien ps,history_pelayanan_ugd h, list_tindakan_igd l, tindakan_igd t, cara_bayar c, dokter d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=t.id_pelayanan and p.cara_bayar=c.id_cara_bayar and l.id_tindakan_igd=t.id_list_tindakan and p.id_pasien=ps.no_rm and d.id_dokter=h.dpjp and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')  and p.status=1
            GROUP by t.id_pelayanan,l.id_tindakan_igd
            order by pasien asc");
            return $hasil->result();
        }
    }

    public function selectLaporanTotalKasir($id_staff)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT p.tgl_masuk,p.tgl_keluar, ps.nama pasien, ps.no_rm, l.nama_panjang poli, c.nama cara_bayar, (d.total_bayar + d.dp) total, s.nama staff
        FROM pelayanan p, history_pelayanan h, pasien ps, cara_bayar c, list_poli l, deatail_kasir d, staff s
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and c.id_cara_bayar=p.cara_bayar and s.id_staff=d.id_staff and h.nama_poli=l.id_list_poli and d.id_pelayanan=p.id_pelayanan and p.tgl_masuk like '%$tgl%' and p.status=1 and h.status=1 and s.id_staff = '$id_staff'
        and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap )
        UNION ALL
        SELECT p.tgl_masuk,p.tgl_keluar, ps.nama pasien, ps.no_rm, 'UGD' poli, c.nama cara_bayar, (d.total_bayar + d.dp) total, s.nama staff
        FROM pelayanan p, history_pelayanan_ugd h, pasien ps, cara_bayar c,  deatail_kasir d, staff s
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and c.id_cara_bayar=p.cara_bayar and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan and p.tgl_masuk like '%$tgl%' and p.status=1 and h.status=1 and s.id_staff = '$id_staff'
        and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap)
        UNION all
        SELECT p.tgl_masuk,p.tgl_keluar, ps.nama pasien, ps.no_rm, r.kelas_ruangan poli, c.nama cara_bayar, (d.total_bayar + d.dp) total, s.nama staff
        FROM pelayanan p, history_pelayanan_ranap h, pasien ps, cara_bayar c,ruangan r, deatail_kasir d, staff s
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and c.id_cara_bayar=p.cara_bayar and s.id_staff=d.id_staff and h.id_kamar=r.id_ruangan and d.id_pelayanan=p.id_pelayanan and p.tgl_masuk like '%$tgl%' and p.status=1 and h.status=1 and s.id_staff = '$id_staff'
        ORDER by pasien asc");
        return $hasil->result();
    }


    public function selectRangeLaporanTotalKasir($mulai, $akhir, $id_staff)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        if ($id_staff = '-') {
            $hasil = $this->db->query("SELECT g.*,b.nama_bank from (
                SELECT d.tgl_input, ps.nama pasien, ps.no_rm, l.nama_panjang poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
                FROM pelayanan p, history_pelayanan h, pasien ps, list_poli l, staff s,pendapatan_kasir d
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and h.nama_poli=l.id_list_poli and d.id_pelayanan=p.id_pelayanan 
                and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir')  and p.status=1 and h.status=1
                and p.cara_bayar = '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) and d.total_bayar != 0 and d.status=1
                group by d.id_pendapatan
                
                UNION ALL
                SELECT d.tgl_input, ps.nama pasien, ps.no_rm, 'UGD' poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
                FROM pelayanan p, history_pelayanan_ugd h, pasien ps, staff s,pendapatan_kasir d
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
                and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir')  and p.status=1 and h.status=1 
                and p.cara_bayar = '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) and d.total_bayar != 0 and d.status=1
                UNION all
                SELECT d.tgl_input, ps.nama pasien, ps.no_rm, r.kelas_ruangan poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
                FROM pelayanan p, history_pelayanan_ranap h, pasien ps, ruangan r, staff s,pendapatan_kasir d
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm  and s.id_staff=d.id_staff and h.id_kamar=r.id_ruangan and d.id_pelayanan=p.id_pelayanan 
                and p.cara_bayar = '42' and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir') and p.status=1 and h.status=1 and d.total_bayar != 0 and d.status=1
                UNION all
                SELECT d.tgl_input, p.nama pasien, '' as no_rm, 'OBAT BEBAS' as poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
                FROM obat_bebas p, staff s,pendapatan_kasir d
                WHERE p.id_obat_bebas=d.id_pelayanan  and s.id_staff=d.id_staff
                and p.cara_bayar = '42' and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir') and d.total_bayar != 0 and d.status=1
                
                UNION all
                SELECT d.tgl_input, p.nama_pasien pasien, p.no_rm, 'MCU' as poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
                FROM mcu p, staff s,pendapatan_kasir d
                WHERE p.id_mcu=d.id_pelayanan  and s.id_staff=d.id_staff and d.tipe ='MCU'
                and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir')  and d.total_bayar != 0 and d.status=1
                UNION all
                SELECT d.tgl_input, p.nama pasien, '' as no_rm, 'HOMECARE' as poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
                FROM homecare p, staff s,pendapatan_kasir d
                WHERE p.id_pasien =d.id_pelayanan  and s.id_staff=d.id_staff and d.tipe ='HOMECARE' and p.jenis_layanan='HOMECARE'
                and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir') and d.total_bayar != 0 and d.status=1
                UNION ALL
                SELECT d.tgl_input, ps.nama pasien, ps.no_rm, l.nama_panjang poli, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan
                FROM pelayanan p, history_pelayanan h, pasien ps, list_poli l, staff s,pendapatan_kasir d
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and h.nama_poli=l.id_list_poli and d.id_pelayanan=p.id_pelayanan 
                and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir')  and p.status=1 and h.status=1 
                and p.cara_bayar != '42' and d.selisih != 0 and d.status=0 and d.tipe='SELISIH'
                and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) 
                UNION ALL
                SELECT d.tgl_input, ps.nama pasien, ps.no_rm, 'UGD' poli, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan
                FROM pelayanan p, history_pelayanan_ugd h, pasien ps, staff s,pendapatan_kasir d
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
                and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir')  and p.status=1 and h.status=1 
                and p.cara_bayar != '42' and d.selisih != 0 and d.status=1 and d.tipe='SELISIH' 
                and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) 
                
                UNION all
                SELECT d.tgl_input, ps.nama pasien, ps.no_rm, r.kelas_ruangan poli, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan
                FROM pelayanan p, history_pelayanan_ranap h, pasien ps, ruangan r, staff s,pendapatan_kasir d
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm  and s.id_staff=d.id_staff and h.id_kamar=r.id_ruangan and d.id_pelayanan=p.id_pelayanan 
                and p.cara_bayar != '42' and d.selisih != 0 and d.status=1 and d.tipe='SELISIH' 
                and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir') and p.status=1 and h.status=1 
                group by id_pendapatan
        
                ) as g
                    left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
                    as b on g.id_pendapatan = b.id_pendapatan
                ORDER by pasien asc
                ")->result();
        } else {
            $hasil = $this->db->query("SELECT g.*,b.nama_bank from (
                SELECT d.tgl_input, ps.nama pasien, ps.no_rm, l.nama_panjang poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
                FROM pelayanan p, history_pelayanan h, pasien ps, list_poli l, staff s,pendapatan_kasir d
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and h.nama_poli=l.id_list_poli and d.id_pelayanan=p.id_pelayanan 
                and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir')  and p.status=1 and h.status=1 and d.id_staff = '$id_staff'
                and p.cara_bayar = '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) and d.total_bayar != 0 and d.status=1
                group by d.id_pendapatan
                
                UNION ALL
                SELECT d.tgl_input, ps.nama pasien, ps.no_rm, 'UGD' poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
                FROM pelayanan p, history_pelayanan_ugd h, pasien ps, staff s,pendapatan_kasir d
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
                and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir')  and p.status=1 and h.status=1 and d.id_staff = '$id_staff'
                and p.cara_bayar = '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) and d.total_bayar != 0 and d.status=1
                UNION all
                SELECT d.tgl_input, ps.nama pasien, ps.no_rm, r.kelas_ruangan poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
                FROM pelayanan p, history_pelayanan_ranap h, pasien ps, ruangan r, staff s,pendapatan_kasir d
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm  and s.id_staff=d.id_staff and h.id_kamar=r.id_ruangan and d.id_pelayanan=p.id_pelayanan 
                and p.cara_bayar = '42' and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir') and p.status=1 and h.status=1 and d.id_staff = '$id_staff' and d.total_bayar != 0 and d.status=1
                UNION all
                SELECT d.tgl_input, p.nama pasien, '' as no_rm, 'OBAT BEBAS' as poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
                FROM obat_bebas p, staff s,pendapatan_kasir d
                WHERE p.id_obat_bebas=d.id_pelayanan  and s.id_staff=d.id_staff
                and p.cara_bayar = '42' and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir') and d.id_staff = '$id_staff' and d.total_bayar != 0 and d.status=1
                
                UNION all
                SELECT d.tgl_input, p.nama_pasien pasien, p.no_rm, 'MCU' as poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
                FROM mcu p, staff s,pendapatan_kasir d
                WHERE p.id_mcu=d.id_pelayanan  and s.id_staff=d.id_staff and d.tipe ='MCU'
                and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir') and d.id_staff = '$id_staff' and d.total_bayar != 0 and d.status=1
                UNION all
                SELECT d.tgl_input, p.nama pasien, '' as no_rm, 'HOMECARE' as poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
                FROM homecare p, staff s,pendapatan_kasir d
                WHERE p.id_pasien =d.id_pelayanan  and s.id_staff=d.id_staff and d.tipe ='HOMECARE' and p.jenis_layanan='HOMECARE'
                and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir') and d.id_staff = '$id_staff' and d.total_bayar != 0 and d.status=1
                UNION ALL
                SELECT d.tgl_input, ps.nama pasien, ps.no_rm, l.nama_panjang poli, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan
                FROM pelayanan p, history_pelayanan h, pasien ps, list_poli l, staff s,pendapatan_kasir d
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and h.nama_poli=l.id_list_poli and d.id_pelayanan=p.id_pelayanan 
                and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir')  and p.status=1 and h.status=1 and d.id_staff = '$id_staff'
                and p.cara_bayar != '42' and d.selisih != 0 and d.status=0 and d.tipe='SELISIH'
                and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) 
                UNION ALL
                SELECT d.tgl_input, ps.nama pasien, ps.no_rm, 'UGD' poli, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan
                FROM pelayanan p, history_pelayanan_ugd h, pasien ps, staff s,pendapatan_kasir d
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
                and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir')  and p.status=1 and h.status=1 and d.id_staff = '$id_staff'
                and p.cara_bayar != '42' and d.selisih != 0 and d.status=1 and d.tipe='SELISIH' 
                and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) 
                
                UNION all
                SELECT d.tgl_input, ps.nama pasien, ps.no_rm, r.kelas_ruangan poli, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan
                FROM pelayanan p, history_pelayanan_ranap h, pasien ps, ruangan r, staff s,pendapatan_kasir d
                WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm  and s.id_staff=d.id_staff and h.id_kamar=r.id_ruangan and d.id_pelayanan=p.id_pelayanan 
                and p.cara_bayar != '42' and d.selisih != 0 and d.status=1 and d.tipe='SELISIH' 
                and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir') and p.status=1 and h.status=1 and d.id_staff = '$id_staff' 
                group by id_pendapatan
        
                ) as g
                    left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
                    as b on g.id_pendapatan = b.id_pendapatan
                ORDER by pasien asc
                ")->result();
        }


        return $hasil;
    }

    public function selectLaporanStaffKasir()
    {
        $this->db->select('s.nama, s.id_staff');
        $this->db->from('staff s');
        $this->db->join(' deatail_kasir d', 'd.id_staff=s.id_staff');
        // $this->db->where('s.nama !=', 'kasir');
        $this->db->where('s.tipe', 'kasir');
        $this->db->where('s.status', 'aktif');
        $this->db->group_by('s.id_staff');
        return $this->db->get()->result();
    }

    public function getJumlahApotikByKasir($id_staff)
    {
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT sum(t.total) total
        FROM pelayanan p, tindakan_farmasi t, staff s, deatail_kasir d
        WHERE p.id_pelayanan=t.id_pelayanan 
        and d.id_pelayanan=p.id_pelayanan 
        and s.id_staff=d.id_staff 
        and p.tgl_masuk like '%$tgl%' and s.tipe='kasir'
        and s.id_staff='$id_staff'
        GROUP by s.id_staff");
        return $query->row();
    }
    public function getJumlahLabor($id_staff)
    {
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT sum(t.total) total
        FROM pelayanan p, tindakan_labor t, staff s, deatail_kasir d
        WHERE p.id_pelayanan=t.id_pelayanan 
        and d.id_pelayanan=p.id_pelayanan 
        and s.id_staff=d.id_staff 
        and p.tgl_masuk like '%$tgl%' and s.tipe='kasir'
        and s.id_staff='$id_staff'
        GROUP by s.id_staff");
        return $query->row();
    }

    public function getJumlahRad($id_staff)
    {
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT sum(t.total) total
        FROM pelayanan p, tindakan_radiologi t, staff s, deatail_kasir d
        WHERE p.id_pelayanan=t.id_pelayanan 
        and d.id_pelayanan=p.id_pelayanan 
        and s.id_staff=d.id_staff 
        and p.tgl_masuk like '%$tgl%' 
        and s.tipe='kasir' and s.id_staff='$id_staff'
        GROUP by s.id_staff");
        return $query->row();
    }

    public function getJumlahJasdok($id_staff)
    {
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT sum(p.biaya_jasa) total
        FROM pelayanan p, staff s, deatail_kasir d
        WHERE d.id_pelayanan=p.id_pelayanan 
        and s.id_staff=d.id_staff 
        and p.tgl_masuk like '%$tgl%' and s.tipe='kasir'
        and s.id_staff='$id_staff'
        GROUP by s.id_staff");
        return $query->row();
    }

    public function getJumlahPendaftaran($id_staff)
    {
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT sum(p.biaya_rs) total
        FROM pelayanan p, staff s, deatail_kasir d
        WHERE d.id_pelayanan=p.id_pelayanan 
        and s.id_staff=d.id_staff 
        and p.tgl_masuk like '%$tgl%' and s.tipe='kasir'
        and s.id_staff='$id_staff'
        GROUP by s.id_staff");
        return $query->row();
    }

    public function getJumlahEkgUsg($id_staff)
    {
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT sum(t.total) total
        FROM pelayanan p, tindakan_radiologi t, staff s, deatail_kasir d, list_tindakan_radiologi l
        WHERE p.id_pelayanan=t.id_pelayanan 
        and d.id_pelayanan=p.id_pelayanan
        and t.id_tindakan=l.id_daftar_tindakan
        and s.id_staff=d.id_staff
        and (l.nama like '%audiometri%' or l.nama like '%usg%')
        and t.tanggal like '%$tgl%'
        and s.tipe='kasir'
        and s.id_staff='$id_staff'
        GROUP by s.id_staff
        UNION ALL
        SELECT sum(t.total) total
        FROM pelayanan p, tindakan_igd t, staff s, deatail_kasir d, list_tindakan_igd l
        WHERE p.id_pelayanan=t.id_pelayanan 
        and d.id_pelayanan=p.id_pelayanan
        and t.id_list_tindakan=l.id_tindakan_igd
        and s.id_staff=d.id_staff
        and l.nama like '%ekg%' 
        and t.tanggal like '%$tgl%'
        and s.tipe='kasir'
        and s.id_staff='$id_staff'
        GROUP by s.id_staff");
        return $query->row();
    }

    //total pasien
    // public function selectPasienTotal()
    // {
    //     $tgl = date("Y-m-d");
    //     $query = $this->db->query("SELECT p.tgl_masuk,p.tgl_keluar, ps.nama pasien, ps.no_rm, s.nama staff, lp.nama_panjang poli, p.id_pelayanan, p.status_rawat
    //     FROM pelayanan p, staff s, deatail_kasir d, pasien ps, history_pelayanan h, list_poli lp
    //     WHERE p.id_pelayanan=d.id_pelayanan and d.id_staff=s.id_staff and h.id_pelayanan=p.id_pelayanan and lp.id_list_poli=h.nama_poli and ps.no_rm=p.id_pasien and p.tgl_masuk like '%$tgl%' and p.status=1 and s.tipe = 'kasir'
    //     GROUP by p.id_pelayanan
    //     UNION ALL
    //     SELECT p.tgl_masuk,p.tgl_keluar, ps.nama pasien, ps.no_rm, s.nama staff, 'UGD' poli, p.id_pelayanan, p.status_rawat
    //     FROM pelayanan p, staff s, deatail_kasir d, pasien ps, history_pelayanan_ugd h
    //     WHERE p.id_pelayanan=d.id_pelayanan and d.id_staff=s.id_staff and h.id_pelayanan=p.id_pelayanan and ps.no_rm=p.id_pasien and p.tgl_masuk like '%$tgl%' and p.status=1 and s.tipe = 'kasir'
    //     GROUP by p.id_pelayanan
    //     UNION ALL
    //     SELECT p.tgl_masuk,p.tgl_keluar, ps.nama pasien, ps.no_rm, s.nama staff, r.tipe poli, p.id_pelayanan, p.status_rawat
    //     FROM pelayanan p, staff s, deatail_kasir d, pasien ps, history_pelayanan_ranap h, ruangan r
    //     WHERE p.id_pelayanan=d.id_pelayanan and d.id_staff=s.id_staff and h.id_pelayanan=p.id_pelayanan and r.id_ruangan=h.id_kamar and ps.no_rm=p.id_pasien and p.tgl_masuk like '%$tgl%' and p.status=1 and s.tipe = 'kasir'
    //     GROUP by p.id_pelayanan
    //     order by tgl_masuk asc");
    //     return $query->result();
    // }

    public function selectRangePasienTotal($mulai, $akhir, $id_staff)
    {
        $tgl = date("Y-m-d");
        date_default_timezone_set('Asia/Jakarta');
        if ($mulai != '' && $akhir != '' && $id_staff != '') {
            $query = $this->db->query("SELECT p.tgl_masuk,p.tgl_keluar, ps.nama pasien, ps.no_rm, s.nama staff, lp.nama_panjang poli, p.id_pelayanan, p.status_rawat
        FROM pelayanan p, staff s, pendapatan_kasir d, pasien ps, history_pelayanan h, list_poli lp
        WHERE p.id_pelayanan=d.id_pelayanan and d.id_staff=s.id_staff and h.id_pelayanan=p.id_pelayanan and d.id_staff = '$id_staff'
        and lp.id_list_poli=h.nama_poli and ps.no_rm=p.id_pasien and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir') 
        and p.status=1 and h.status=1
        GROUP by p.id_pelayanan
        UNION ALL
        SELECT p.tgl_masuk,p.tgl_keluar, ps.nama pasien, ps.no_rm, s.nama staff, 'UGD' poli, p.id_pelayanan, p.status_rawat
        FROM pelayanan p, staff s, pendapatan_kasir d, pasien ps, history_pelayanan_ugd h
        WHERE p.id_pelayanan=d.id_pelayanan and d.id_staff=s.id_staff and h.id_pelayanan=p.id_pelayanan and d.id_staff = '$id_staff'
        and ps.no_rm=p.id_pasien and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir') 
        and p.status=1 and h.status=1
        GROUP by p.id_pelayanan
        UNION ALL
        SELECT p.tgl_masuk,p.tgl_keluar, ps.nama pasien, ps.no_rm, s.nama staff, r.tipe poli, p.id_pelayanan, p.status_rawat
        FROM pelayanan p, staff s, pendapatan_kasir d, pasien ps, history_pelayanan_ranap h, ruangan r
        WHERE p.id_pelayanan=d.id_pelayanan and d.id_staff=s.id_staff 
        and h.id_pelayanan=p.id_pelayanan and r.id_ruangan=h.id_kamar and d.id_staff = '$id_staff'
        and ps.no_rm=p.id_pasien and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir') 
        and p.status=1 and h.status=1
        GROUP by p.id_pelayanan
        order by tgl_masuk");
        } else {
            $query = $this->db->query("SELECT p.tgl_masuk,p.tgl_keluar, ps.nama pasien, ps.no_rm, s.nama staff, lp.nama_panjang poli, p.id_pelayanan, p.status_rawat
            FROM pelayanan p, staff s, pendapatan_kasir d, pasien ps, history_pelayanan h, list_poli lp
            WHERE p.id_pelayanan=d.id_pelayanan and d.id_staff=s.id_staff and h.id_pelayanan=p.id_pelayanan 
            and lp.id_list_poli=h.nama_poli and ps.no_rm=p.id_pasien and p.tgl_masuk like '%$tgl%' 
            and p.status=1 and s.tipe = 'kasir' and h.status=1
            GROUP by p.id_pelayanan
            UNION ALL
            SELECT p.tgl_masuk,p.tgl_keluar, ps.nama pasien, ps.no_rm, s.nama staff, 'UGD' poli, p.id_pelayanan, p.status_rawat
            FROM pelayanan p, staff s, pendapatan_kasir d, pasien ps, history_pelayanan_ugd h
            WHERE p.id_pelayanan=d.id_pelayanan and d.id_staff=s.id_staff and h.id_pelayanan=p.id_pelayanan 
            and ps.no_rm=p.id_pasien and p.tgl_masuk like '%$tgl%' 
            and p.status=1 and s.tipe = 'kasir' and h.status=1
            GROUP by p.id_pelayanan
            UNION ALL
            SELECT p.tgl_masuk,p.tgl_keluar, ps.nama pasien, ps.no_rm, s.nama staff, r.tipe poli, p.id_pelayanan, p.status_rawat
            FROM pelayanan p, staff s, pendapatan_kasir d, pasien ps, history_pelayanan_ranap h, ruangan r
            WHERE p.id_pelayanan=d.id_pelayanan and d.id_staff=s.id_staff 
            and h.id_pelayanan=p.id_pelayanan and r.id_ruangan=h.id_kamar 
            and ps.no_rm=p.id_pasien and p.tgl_masuk like '%$tgl%' 
            and p.status=1 and s.tipe = 'kasir' and h.status=1
            GROUP by p.id_pelayanan
            order by tgl_masuk");
        }
        return $query->result();
    }

    public function getJumlahApotikByPasien($id_pelayanan)
    {
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT sum(t.total) total
        FROM tindakan_farmasi t, list_logistik l
        WHERE l.id_logistik=t.id_list_tindakan
        -- and d.id_pelayanan=p.id_pelayanan 
        -- and s.id_staff=d.id_staff 
        -- and p.tgl_masuk like '%$tgl%' 
        -- and s.tipe='kasir'
        and t.id_pelayanan='$id_pelayanan'");
        return $query->row();
    }

    public function total_labor($id_pelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_labor t, list_tindakan_labor l, pelayanan p 
        WHERE t.id_list_tindakan=l.id_daftar_tindakan 
        and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$id_pelayanan'
        ");
        return $query->row();
    }

    public function total_radio($id_pelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total
        from tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p
        WHERE t.id_tindakan=l.id_daftar_tindakan  and p.id_pelayanan=t.id_pelayanan
        and t.id_pelayanan='$id_pelayanan'");
        return $query->row();
    }

    public function getSaranaPasien($id_pelayanan)
    {
        $query =  $this->db->query("SELECT sum(p.biaya_rs) total
        FROM pelayanan p
        where p.status=1 and p.id_pelayanan='$id_pelayanan'");
        return $query->row();
    }

    public function selectDataJumlahUgdRanap($tgl)
    {
        // $tgl = date("Y-m-d");
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT *
        FROM v_kunjungan
        where jenis_pelayanan = 'UGD' and tgl_masuk LIKE '%$tgl%' and id_pelayanan in (select id_pelayanan from history_pelayanan_ranap )
        order by tgl_masuk asc")->result();
    }

    public function selectDataJumlahUgdRanapRange($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT *
        FROM v_kunjungan v
        where jenis_pelayanan = 'POLI' and tgl_masuk>='$mulai' and tgl_masuk<='$akhir' and poli != 'LABORATORIUM' and poli != 'RADIOLOGI' and id_pelayanan in (select id_pelayanan from history_pelayanan_ranap )
        order by tgl_masuk asc ")->result();
    }

    public function selectLaporanFisio()
    {
        $tgl = date("Y-m-d");
        $this->db->select('c.jenis, COUNT(t.id_pelayanan) total');
        $this->db->from('tindakan_poli_fisio t, pelayanan p, cara_bayar c');
        // $this->db->join(' list_poli l', ' d.dokter_spes = l.kdpoli_bpjs');
        $this->db->where('c.id_cara_bayar !=', '-');
        $this->db->where('t.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('p.status', 1);
        $this->db->like('p.tgl_masuk', $tgl);
        $this->db->group_by('c.jenis');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanFisio($mulai, $akhir)
    {
        $tgl = date("Y-m-d");
        $this->db->select('c.jenis, COUNT(t.id_pelayanan) total');
        $this->db->from('tindakan_poli_fisio t, pelayanan p, cara_bayar c');
        // $this->db->join(' list_poli l', ' d.dokter_spes = l.kdpoli_bpjs');
        $this->db->where('c.id_cara_bayar !=', '-');
        $this->db->where('t.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('c.id_cara_bayar !=', '-');
        $this->db->where('p.status', 1);
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->group_by('c.jenis');
        return $this->db->get()->result();
    }

    public function selectDataLaporanTindakanFisio()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('l.nama tindakan, COUNT(l.id_list_tindakan) total');
        $this->db->from('list_tindakan_poli_fisio l, tindakan_poli_fisio t');
        $this->db->where('l.id_list_tindakan=t.id_list_tindakan');
        $this->db->like('t.tanggal', $tgl);
        $this->db->group_by('l.nama');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }

    public function selectDataRangeLaporanTindakanFisio($mulai, $akhir)
    {
        $this->db->select('l.nama tindakan, COUNT(l.id_list_tindakan) total');
        $this->db->from('list_tindakan_poli_fisio l, tindakan_poli_fisio t');
        $this->db->where('l.id_list_tindakan=t.id_list_tindakan');
        $this->db->where('t.tanggal >= ', $mulai);
        $this->db->where('t.tanggal <= ', $akhir);
        $this->db->group_by('l.nama');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }

    public function selectLaporanPasienRitl()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT ps.nama pasien,ps.no_rm, ps.no_bpjs, ps.no_hp, p.tgl_masuk, r.tipe ruangan
        FROM pelayanan p, history_pelayanan_ranap h, pasien ps, ruangan r
        where p.id_pelayanan=h.id_pelayanan and ps.no_rm=p.id_pasien and r.id_ruangan=h.id_kamar and p.status=1 and h.status=1 and p.tgl_masuk like '%$tgl%'");
        return $hasil->result();
    }

    public function selectLaporanRangePasienRitl($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $hasil = $this->db->query("SELECT ps.nama pasien,ps.no_rm, ps.no_bpjs, ps.no_hp, p.tgl_masuk, r.tipe ruangan
        FROM pelayanan p, history_pelayanan_ranap h, pasien ps, ruangan r
        where p.id_pelayanan=h.id_pelayanan and ps.no_rm=p.id_pasien and r.id_ruangan=h.id_kamar and p.status=1 and h.status=1 and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')");
        return $hasil->result();
    }

    public function selectLaporanPasienRjtl()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT ps.nama pasien,ps.no_rm, ps.no_bpjs, ps.no_hp, p.tgl_masuk, r.nama_panjang ruangan
        FROM pelayanan p, history_pelayanan h, pasien ps, list_poli r
        where p.id_pelayanan=h.id_pelayanan and ps.no_rm=p.id_pasien and r.id_list_poli=h.nama_poli and p.status=1 and h.status=1 and p.tgl_masuk like '%$tgl%'
        union all
        SELECT ps.nama pasien,ps.no_rm, ps.no_bpjs, ps.no_hp, p.tgl_masuk, 'UGD' ruangan
        FROM pelayanan p, history_pelayanan_ugd h, pasien ps
        where p.id_pelayanan=h.id_pelayanan and ps.no_rm=p.id_pasien and p.status=1 and h.status=1 and p.tgl_masuk like '%$tgl%'");
        return $hasil->result();
    }

    public function selectLaporanRangePasienRjtl($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $hasil = $this->db->query("SELECT ps.nama pasien,ps.no_rm, ps.no_bpjs, ps.no_hp, p.tgl_masuk, r.nama_panjang ruangan
        FROM pelayanan p, history_pelayanan h, pasien ps, list_poli r
        where p.id_pelayanan=h.id_pelayanan and ps.no_rm=p.id_pasien and r.id_list_poli=h.nama_poli and p.status=1 and h.status=1 and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')
        union all
        SELECT ps.nama pasien,ps.no_rm, ps.no_bpjs, ps.no_hp, p.tgl_masuk, 'UGD' ruangan
        FROM pelayanan p, history_pelayanan_ugd h, pasien ps
        where p.id_pelayanan=h.id_pelayanan and ps.no_rm=p.id_pasien and p.status=1 and h.status=1 and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')");
        return $hasil->result();
    }

    public function selectRangePenunjang($mulai, $akhir, $poli)
    {

        if ($poli == 'ECHO') {
            $query = $this->db->query("SELECT p.no_rm,p.nama,c.nama cara_bayar,d.nama dokter,s.nama_panjang poli,l.nama tindakan, t.tanggal, l.harga_sarana sarana, l.harga_jasa jasa
            FROM tindakan_poli_jantung t, list_tindakan_poli_jantung l, pelayanan b, pasien p, cara_bayar c, dokter d, history_pelayanan h, list_poli s
            where t.id_list_tindakan = l.id_list_tindakan and t.id_pelayanan = b.id_pelayanan and t.id_dokter = d.id_dokter and b.id_pasien = p.no_rm and b.cara_bayar = c.id_cara_bayar and b.id_pelayanan =h.id_pelayanan and h.nama_poli = s.id_list_poli
            and date(t.tanggal) >='$mulai' and date(t.tanggal) <='$akhir' and (l.nama like '%echo%' or l.nama like '%treadmil%' or l.nama like '%ekg%' or l.nama like '%usg%')
            UNION ALL
            SELECT p.no_rm,p.nama,c.nama cara_bayar,d.nama dokter,'UGD' poli,l.nama tindakan, t.tanggal, l.harga_sarana sarana, l.harga_jasa jasa
            FROM tindakan_igd t, list_tindakan_igd l, pelayanan b, pasien p, cara_bayar c,history_pelayanan_ugd h, dokter d
            where t.id_list_tindakan = l.id_tindakan_igd and t.id_pelayanan = b.id_pelayanan and b.id_pasien = p.no_rm and d.id_dokter=h.dpjp and b.cara_bayar = c.id_cara_bayar and b.id_pelayanan =h.id_pelayanan
            and date(t.tanggal) >='$mulai' and date(t.tanggal) <='$akhir' and l.nama like '%ekg%'");
        } else if ($poli == 'USG') {
            $query = $this->db->query("SELECT p.no_rm,p.nama,c.nama cara_bayar,d.nama dokter,s.nama_panjang poli,l.nama tindakan, t.tanggal, l.harga_sarana sarana, l.harga_jasa jasa
            FROM tindakan_poli_obgyne t, list_tindakan_poli_obgyne l, pelayanan b, pasien p, cara_bayar c, dokter d, history_pelayanan h, list_poli s
            where t.id_list_tindakan = l.id_list_tindakan and t.id_pelayanan = b.id_pelayanan and t.id_dokter = d.id_dokter and b.id_pasien = p.no_rm and b.cara_bayar = c.id_cara_bayar and b.id_pelayanan =h.id_pelayanan and h.nama_poli = s.id_list_poli
            and date(t.tanggal) >='$mulai' and date(t.tanggal) <='$akhir' and l.nama like '%usg%'
            group by t.id_tindakan");
        } else if ($poli == 'AUDIOMETRI') {
            $query = $this->db->query("SELECT * FROM(SELECT p.no_rm,p.nama,c.nama cara_bayar,d.nama dokter,r.kelas_ruangan poli,l.nama tindakan, t.tanggal, l.harga_sarana sarana, l.harga_jasa jasa
            FROM tindakan_penunjang_lain t, list_tindakan_apelkes l, pelayanan b, pasien p, cara_bayar c, dokter d, history_pelayanan_ranap h,ruangan r
            where t.id_list_tindakan = l.id_list_tindakan_apelkes and t.id_pelayanan = b.id_pelayanan and b.id_pasien = p.no_rm and r.id_ruangan=h.id_kamar and b.cara_bayar = c.id_cara_bayar and b.id_pelayanan =h.id_pelayanan
            and date(t.tanggal) >='$mulai' and date(t.tanggal) <='$akhir' and l.nama like '%Audiometri%'
            group by t.id_tindakan
            ) as a
            UNION ALL
            SELECT no_rm,nama, cara_bayar, dokter,'MCU' poli, tindakan, tanggal,  sarana, '-' jasa 
            FROM (
            SELECT p.no_rm,p.nama,c.nama cara_bayar,d.nama dokter,l.nama tindakan, t.tanggal, l.harga sarana
            FROM tindakan_mcu t, list_tindakan_mcu l, mcu b, pasien p, cara_bayar c, dokter d
            where t.id_list_tindakan = l.id_list_tindakan_mcu and t.id_mcu = b.id_mcu and t.id_dokter = d.id_dokter and b.no_rm = p.no_rm and b.cara_bayar = c.id_cara_bayar
            and date(t.tanggal) >='$mulai' and date(t.tanggal) <='$akhir' and l.nama like '%Audiometri%'
            group by t.id_tindakan_mcu
            ) as b
            ");
        } else if ($poli == 'RANAP') {
            $query = $this->db->query("SELECT p.no_rm,p.nama,c.nama cara_bayar,s.nama dokter,r.kelas_ruangan poli,l.nama tindakan, t.tanggal, l.harga_sarana sarana, l.harga_jasa jasa
            FROM tindakan_penunjang_lain t, list_tindakan_apelkes l, pelayanan b, pasien p, cara_bayar c,history_pelayanan_ranap h, ruangan r, staff s
            where t.id_list_tindakan = l.id_list_tindakan_apelkes and t.id_pelayanan = b.id_pelayanan and b.id_pasien = p.no_rm and t.id_staff=s.id_staff and r.id_ruangan=h.id_kamar and b.cara_bayar = c.id_cara_bayar and b.id_pelayanan =h.id_pelayanan
            and date(t.tanggal) >='$mulai' and date(t.tanggal) <='$akhir' and l.kelompok like '%penunjang%'
            group by t.id_tindakan");
        } else if ($poli == 'EKG') {
            $query = $this->db->query("SELECT p.no_rm,p.nama,c.nama cara_bayar,'-' dokter,r.kelas_ruangan poli,l.nama tindakan, t.tanggal, l.harga_sarana sarana, l.harga_jasa jasa
            FROM tindakan_apelkes t, list_tindakan_apelkes l, pelayanan b, pasien p, cara_bayar c,history_pelayanan_ranap h, ruangan r
            where t.id_list_tindakan = l.id_list_tindakan_apelkes and t.id_pelayanan = b.id_pelayanan and b.id_pasien = p.no_rm and r.id_ruangan=h.id_kamar and b.cara_bayar = c.id_cara_bayar and b.id_pelayanan =h.id_pelayanan
            and date(t.tanggal) >='$mulai' and date(t.tanggal) <='$akhir' and l.nama like '%ekg%'
            group by t.id_tindakan_apelkes");
        } else if ($poli == 'MATA') {
            $query = $this->db->query("SELECT p.no_rm,p.nama,c.nama cara_bayar,d.nama dokter,s.nama_panjang poli,l.nama tindakan, t.tanggal, l.harga_sarana sarana, l.harga_jasa jasa
            FROM tindakan_poli_mata t, list_tindakan_poli_mata l, pelayanan b, pasien p, cara_bayar c, dokter d, history_pelayanan h, list_poli s
            where t.id_list_tindakan = l.id_list_tindakan and t.id_pelayanan = b.id_pelayanan and t.id_dokter = d.id_dokter 
            and b.id_pasien = p.no_rm and b.cara_bayar = c.id_cara_bayar and b.id_pelayanan =h.id_pelayanan and h.nama_poli = s.id_list_poli
            and date(t.tanggal) >='$mulai' and date(t.tanggal) <='$akhir'
            group by t.id_tindakan");
        } else if ($poli == 'UROLOGI') {
            $query = $this->db->query("SELECT p.no_rm,p.nama,c.nama cara_bayar,d.nama dokter,s.nama_panjang poli,l.nama tindakan, t.tanggal, l.harga_sarana sarana, l.harga_jasa jasa
            FROM tindakan_poli_urologi t, list_tindakan_poli_urologi l, pelayanan b, pasien p, cara_bayar c, dokter d, history_pelayanan h, list_poli s
            where t.id_list_tindakan = l.id_list_tindakan and t.id_pelayanan = b.id_pelayanan and t.id_dokter = d.id_dokter 
            and b.id_pasien = p.no_rm and b.cara_bayar = c.id_cara_bayar and b.id_pelayanan =h.id_pelayanan and h.nama_poli = s.id_list_poli
            and date(t.tanggal) >='$mulai' and date(t.tanggal) <='$akhir'
            group by t.id_tindakan");
        } else if ($poli == 'INTERNIS') {
            $query = $this->db->query("SELECT p.no_rm,p.nama,c.nama cara_bayar,d.nama dokter,s.nama_panjang poli,l.nama tindakan, t.tanggal, l.harga_sarana sarana, l.harga_jasa jasa
            FROM tindakan_poli_internis t, list_tindakan_poli_internis l, pelayanan b, pasien p, cara_bayar c, dokter d, history_pelayanan h, list_poli s
            where t.id_list_tindakan = l.id_list_tindakan and t.id_pelayanan = b.id_pelayanan and t.id_dokter = d.id_dokter 
            and b.id_pasien = p.no_rm and b.cara_bayar = c.id_cara_bayar and b.id_pelayanan =h.id_pelayanan and h.nama_poli = s.id_list_poli
            and date(t.tanggal) >='$mulai' and date(t.tanggal) <='$akhir'
            group by t.id_tindakan");
        } else if ($poli == 'SPIRO') {
            $query = $this->db->query("SELECT p.no_rm,p.nama,c.nama cara_bayar,d.nama dokter,'MCU' poli,l.nama tindakan, t.tanggal
            FROM tindakan_mcu t, list_tindakan_mcu l, mcu b, pasien p, cara_bayar c, dokter d
            where t.id_list_tindakan = l.id_list_tindakan_mcu and t.id_mcu = b.id_mcu and t.id_dokter = d.id_dokter and b.no_rm = p.no_rm and b.cara_bayar = c.id_cara_bayar
            and date(t.tanggal) >='$mulai' and date(t.tanggal) <='$akhir' and l.nama like '%spiro%'
            group by t.id_tindakan_mcu
            ) as b
            ");
        } else if ($poli == 'USGPRIORITAS') {
            $query = $this->db->query("SELECT p.no_rm,p.nama,c.nama cara_bayar,d.nama dokter,s.nama_panjang poli,l.nama tindakan, t.tanggal, l.harga_sarana sarana, l.harga_jasa jasa
            FROM tindakan_poli_obgyne t, list_tindakan_poli_obgyne l, pelayanan b, pasien p, cara_bayar c, dokter d, history_pelayanan h, list_poli s
            where t.id_list_tindakan = l.id_list_tindakan and t.id_pelayanan = b.id_pelayanan and t.id_dokter = d.id_dokter 
            and b.id_pasien = p.no_rm and b.cara_bayar = c.id_cara_bayar and b.id_pelayanan =h.id_pelayanan and h.nama_poli = s.id_list_poli and h.jenis_pelayanan like '%prioritas%'
            and date(t.tanggal) >='$mulai' and date(t.tanggal) <='$akhir' and l.nama like '%usg%'
            group by t.id_tindakan");
        } else if ($poli == 'ECHOPRIORITAS') {
            $query = $this->db->query("SELECT p.no_rm,p.nama,c.nama cara_bayar,d.nama dokter,s.nama_panjang poli,l.nama tindakan, t.tanggal, l.harga_sarana sarana, l.harga_jasa jasa
            FROM tindakan_poli_jantung t, list_tindakan_poli_jantung l, pelayanan b, pasien p, cara_bayar c, dokter d, history_pelayanan h, list_poli s
            where t.id_list_tindakan = l.id_list_tindakan and t.id_pelayanan = b.id_pelayanan and t.id_dokter = d.id_dokter and b.id_pasien = p.no_rm 
            and b.cara_bayar = c.id_cara_bayar and b.id_pelayanan =h.id_pelayanan and h.nama_poli = s.id_list_poli and h.jenis_pelayanan like '%prioritas%'
            and date(t.tanggal) >='$mulai' and date(t.tanggal) <='$akhir' and l.nama like '%echo%'");
        }
        return $query->result();
    }

    public function selectRangeOprasional($mulai, $akhir, $poli)
    {

        if ($poli == 'LABRANAP') {
            $query = $this->db->query("SELECT p.no_rm, p.nama pasien,p.tgl_lahir, pl.tgl_masuk, t.nama_tindakan tindakan, t.tanggal tgl_periksa, d.nama dokter, c.nama cara_bayar, r.tipe poli
            FROM pasien p, pelayanan pl, history_pelayanan_ranap h, dokter d, cara_bayar c, tindakan_labor t, ruangan r
            WHERE p.no_rm=pl.id_pasien and pl.id_pelayanan=h.id_pelayanan and r.id_ruangan=h.id_kamar 
            and h.dpjp=d.id_dokter  and pl.cara_bayar=c.id_cara_bayar 
            and h.id_history=t.poli and date(t.tanggal) BETWEEN '$mulai' and '$akhir' and t.cara_masuk ='RAWAT INAP'
            ");
        } else if ($poli == 'LABRAJAL') {
            $query = $this->db->query("SELECT p.no_rm, p.nama pasien,p.tgl_lahir, pl.tgl_masuk, t.nama_tindakan tindakan, t.tanggal tgl_periksa, d.nama dokter, c.nama cara_bayar, 'UGD' poli
            FROM pasien p, pelayanan pl, history_pelayanan_ugd h, dokter d, cara_bayar c, tindakan_labor t
            WHERE p.no_rm=pl.id_pasien and pl.id_pelayanan=h.id_pelayanan  and h.dpjp=d.id_dokter and pl.cara_bayar=c.id_cara_bayar and h.id_history=t.poli 
            and date(t.tanggal) BETWEEN '$mulai' and '$akhir' and t.cara_masuk ='UGD'
            UNION ALL
            SELECT p.no_rm, p.nama pasien,p.tgl_lahir, pl.tgl_masuk, t.nama_tindakan tindakan, t.tanggal tgl_periksa, d.nama dokter, c.nama cara_bayar, l.nama poli
            FROM pasien p, pelayanan pl, history_pelayanan h, dokter d, cara_bayar c, tindakan_labor t, list_poli l
            WHERE p.no_rm=pl.id_pasien and pl.id_pelayanan=h.id_pelayanan  and h.dpjp=d.id_dokter and pl.cara_bayar=c.id_cara_bayar and h.nama_poli=l.id_list_poli
            and h.id_history=t.poli and date(t.tanggal) BETWEEN '$mulai' and '$akhir' and t.cara_masuk !='RAWAT INAP'
            ");
        } else if ($poli == 'RADRANAP') {
            $query = $this->db->query("SELECT b.no_rm, b.nama pasien, b.tgl_lahir, p.tgl_masuk, l.nama tindakan, t.tanggal tgl_periksa, d.nama dokter, c.nama cara_bayar, lp.tipe poli
            FROM pelayanan p, history_pelayanan_ranap h, ruangan lp, tindakan_radiologi t, list_tindakan_radiologi l, dokter d, cara_bayar c, pasien b
            WHERE p.id_pelayanan=h.id_pelayanan and h.id_history=t.poli 
            and l.id_daftar_tindakan=t.id_tindakan and d.id_dokter=h.dpjp and b.no_rm=p.id_pasien and c.id_cara_bayar=p.cara_bayar and lp.id_ruangan=h.id_kamar 
            and date(t.tanggal) BETWEEN '$mulai' and '$akhir'
            ORDER by t.tanggal asc
            ");
        } else if ($poli == 'RADRAJAL') {
            $query = $this->db->query("SELECT b.no_rm, b.nama pasien, b.tgl_lahir, p.tgl_masuk, l.nama tindakan, t.tanggal tgl_periksa, d.nama dokter, c.nama cara_bayar, lp.nama poli
            FROM pelayanan p, history_pelayanan h, list_poli lp, tindakan_radiologi t, list_tindakan_radiologi l, dokter d, cara_bayar c, pasien b
            WHERE p.id_pelayanan=h.id_pelayanan and h.id_history=t.poli and l.id_daftar_tindakan=t.id_tindakan 
            and d.id_dokter=h.dpjp and b.no_rm=p.id_pasien and c.id_cara_bayar=p.cara_bayar and lp.id_list_poli=h.nama_poli 
            and date(t.tanggal) BETWEEN '$mulai' and '$akhir'
            UNION ALL
            SELECT b.no_rm, b.nama pasien, b.tgl_lahir, p.tgl_masuk, l.nama tindakan, t.tanggal tgl_periksa, d.nama dokter, c.nama cara_bayar, 'UGD' poli
            FROM pelayanan p, history_pelayanan_ugd h, tindakan_radiologi t, list_tindakan_radiologi l, dokter d, cara_bayar c, pasien b
            WHERE p.id_pelayanan=h.id_pelayanan and h.id_history=t.poli and l.id_daftar_tindakan=t.id_tindakan 
            and d.id_dokter=h.dpjp and b.no_rm=p.id_pasien and c.id_cara_bayar=p.cara_bayar and date(t.tanggal) BETWEEN '$mulai' and '$akhir'
            ORDER by tgl_periksa asc");
        } else if ($poli == 'FISIORAJAL') {
            $query = $this->db->query("SELECT ps.no_rm, ps.nama pasien,ps.tgl_lahir, p.tgl_masuk, l.nama tindakan,t.tanggal tgl_periksa, d.nama dokter, lp.nama poli, c.nama cara_bayar
            FROM pelayanan p, tindakan_poli_fisio t, list_tindakan_poli_fisio l, pasien ps, cara_bayar c,history_pelayanan h, list_poli lp, dokter d
            WHERE p.id_pelayanan=t.id_pelayanan and l.id_list_tindakan=t.id_list_tindakan and ps.no_rm=p.id_pasien 
            and d.id_dokter=h.dpjp and h.id_history=t.poli and h.nama_poli=lp.id_list_poli 
            and c.id_cara_bayar=p.cara_bayar and t.tanggal>='$mulai' and t.tanggal<='$akhir'
            GROUP BY t.id_tindakan
            UNION ALL
            SELECT ps.no_rm, ps.nama pasien, ps.tgl_lahir, p.tgl_masuk, l.nama tindakan,t.tanggal tgl_periksa, d.nama dokter,  c.nama cara_bayar, 'UGD' poli
            FROM pelayanan p, tindakan_poli_fisio t, list_tindakan_poli_fisio l, pasien ps, cara_bayar c,history_pelayanan_ugd h, dokter d
            WHERE  h.id_history=t.poli and l.id_list_tindakan=t.id_list_tindakan and ps.no_rm=p.id_pasien and d.id_dokter=h.dpjp and h.id_pelayanan=p.id_pelayanan 
            and c.id_cara_bayar=p.cara_bayar and t.tanggal>='$mulai' and t.tanggal<='$akhir'
            GROUP BY t.id_tindakan
            ORDER BY tgl_periksa asc");
        } else if ($poli == 'FISIORANAP') {
            $query = $this->db->query("SELECT ps.no_rm, ps.nama pasien, ps.tgl_lahir, p.tgl_masuk, l.nama tindakan,t.tanggal tgl_periksa, d.nama dokter,  c.nama cara_bayar, r.tipe poli
            FROM pelayanan p, tindakan_poli_fisio t, list_tindakan_poli_fisio l, pasien ps, cara_bayar c,history_pelayanan_ranap h, dokter d, ruangan r
            WHERE h.id_history=t.poli and l.id_list_tindakan=t.id_list_tindakan and ps.no_rm=p.id_pasien and d.id_dokter=h.dpjp and r.id_ruangan=h.id_kamar
            and h.id_pelayanan=p.id_pelayanan and c.id_cara_bayar=p.cara_bayar and t.tanggal>='$mulai' and t.tanggal<='$akhir'
            GROUP BY t.id_tindakan
            ORDER BY t.tanggal asc");
        } else if ($poli == 'OKRAJAL') {
            $query = $this->db->query("SELECT ps.no_rm, ps.nama pasien, ps.tgl_lahir, p.tgl_masuk, lp.nama poli, l.nama tindakan, t.tanggal tgl_periksa, c.nama cara_bayar, d.nama dokter
            FROM pelayanan p, history_pelayanan h, pasien ps, dokter d, cara_bayar c, list_kamar_ok l, tindakan_ok t, list_poli lp
            WHERE p.id_pelayanan=h.id_pelayanan and ps.no_rm=p.id_pasien and c.id_cara_bayar=p.cara_bayar and lp.id_list_poli=h.nama_poli and h.id_history=t.poli
            and l.id_list_kamar_ok=t.id_tindakan and d.id_dokter=h.dpjp and t.tanggal>='$mulai' and t.tanggal<='$akhir'
            GROUP by t.id_tindakan_ok
            ORDER by t.tanggal asc");
        } else if ($poli == 'OKRANAP') {
            $query = $this->db->query("SELECT ps.no_rm, ps.nama pasien, ps.tgl_lahir, p.tgl_masuk, lp.tipe poli, l.nama tindakan, t.tanggal tgl_periksa, c.nama cara_bayar, d.nama dokter
            FROM pelayanan p, history_pelayanan_ranap h, pasien ps, dokter d, cara_bayar c, list_kamar_ok l, tindakan_ok t, ruangan lp
            WHERE p.id_pelayanan=h.id_pelayanan and ps.no_rm=p.id_pasien and c.id_cara_bayar=p.cara_bayar and lp.id_ruangan=h.id_kamar 
            and h.id_history=t.poli and l.id_list_kamar_ok=t.id_tindakan and d.id_dokter=h.dpjp and t.tanggal>='$mulai' and t.tanggal<='$akhir'
            GROUP by t.id_tindakan_ok
            ORDER by t.tanggal asc");
        } else if ($poli == 'FISIORANAP') {
            $query = $this->db->query("SELECT ps.no_rm, ps.nama pasien, ps.tgl_lahir, p.tgl_masuk, l.nama tindakan,t.tanggal tgl_periksa, d.nama dokter,  c.nama cara_bayar, r.tipe poli
            FROM pelayanan p, tindakan_poli_fisio t, list_tindakan_poli_fisio l, pasien ps, cara_bayar c,history_pelayanan_ranap h, dokter d, ruangan r
            WHERE h.id_history=t.poli and l.id_list_tindakan=t.id_list_tindakan and ps.no_rm=p.id_pasien and d.id_dokter=h.dpjp and r.id_ruangan=h.id_kamar
            and h.id_pelayanan=p.id_pelayanan and c.id_cara_bayar=p.cara_bayar and t.tanggal>='$mulai' and t.tanggal<='$akhir'
            GROUP BY t.id_tindakan
            ORDER BY t.tanggal asc");
        } else if ($poli == 'HEMO') {
            $query = $this->db->query("SELECT ps.no_rm, ps.nama pasien, ps.tgl_lahir, p.tgl_masuk, l.nama tindakan,t.tanggal tgl_periksa, d.nama dokter,  c.nama cara_bayar, t.jenis_pelayanan poli
            FROM pelayanan p, tindakan_poli_hemodialisa t, list_tindakan_poli_hemodialisa l, pasien ps, cara_bayar c, dokter d
            WHERE  h.id_history=t.poli and l.id_list_tindakan=t.id_list_tindakan and ps.no_rm=p.id_pasien and d.id_dokter=t.id_dokter 
            and c.id_cara_bayar=p.cara_bayar and t.tanggal>='$mulai' and t.tanggal<='$akhir'
            GROUP BY t.id_pelayanan
            ORDER BY t.tanggal asc");
        }
        return $query->result();
    }

    public function selectLaporanPasienBelumCO()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT b.nama pasien, b.no_rm, c.nama cara_bayar, 'POLI' jenis_pelayanan, lp.nama poli, h.tgl_masuk
        FROM pelayanan p, history_pelayanan h, cara_bayar c, pasien b, list_poli lp
        WHERE p.id_pelayanan=h.id_pelayanan and b.no_rm=p.id_pasien and lp.id_list_poli=h.nama_poli and c.id_cara_bayar=p.cara_bayar 
        and p.status_rawat like '%dirawat%' and p.status=1 and h.status=1 and p.tgl_masuk like '%$tgl%' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap)
        UNION ALL
        SELECT b.nama pasien, b.no_rm, c.nama cara_bayar, 'RAWAT INAP' jenis_pelayanan, r.tipe poli, h.tgl_masuk
        FROM pelayanan p, history_pelayanan_ranap h, cara_bayar c, pasien b, ruangan r
        WHERE p.id_pelayanan=h.id_pelayanan and b.no_rm=p.id_pasien and r.id_ruangan=h.id_kamar and c.id_cara_bayar=p.cara_bayar and p.status_rawat like '%dirawat%' 
        and p.status=1 and h.status=1 and p.tgl_masuk like '%$tgl%' 
        UNION ALL
        SELECT b.nama pasien, b.no_rm, c.nama cara_bayar, h.jenis_pelayanan, '-' poli, h.tgl_masuk
        FROM pelayanan p, history_pelayanan_ugd h, cara_bayar c, pasien b
        WHERE p.id_pelayanan=h.id_pelayanan and b.no_rm=p.id_pasien and c.id_cara_bayar=p.cara_bayar and p.status_rawat like '%dirawat%' and p.status=1 and h.status=1 and p.tgl_masuk like '%$tgl%' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap)
        ORDER by tgl_masuk asc");
        return $hasil->result();
    }

    public function selectLaporanRangePasienBelumCO($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $hasil = $this->db->query("SELECT b.nama pasien, b.no_rm, c.nama cara_bayar, 'POLI' jenis_pelayanan, lp.nama poli, h.tgl_masuk
        FROM pelayanan p, history_pelayanan h, cara_bayar c, pasien b, list_poli lp
        WHERE p.id_pelayanan=h.id_pelayanan and b.no_rm=p.id_pasien and lp.id_list_poli=h.nama_poli and c.id_cara_bayar=p.cara_bayar 
        and p.status_rawat like '%dirawat%' and p.status=1 and h.status=1 and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir') and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap)
        UNION ALL
        SELECT b.nama pasien, b.no_rm, c.nama cara_bayar, 'RAWAT INAP' jenis_pelayanan, r.tipe poli, h.tgl_masuk
        FROM pelayanan p, history_pelayanan_ranap h, cara_bayar c, pasien b, ruangan r
        WHERE p.id_pelayanan=h.id_pelayanan and b.no_rm=p.id_pasien and r.id_ruangan=h.id_kamar and c.id_cara_bayar=p.cara_bayar 
        and p.status_rawat like '%dirawat%' and p.status=1 and h.status=1 and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir') 
        UNION ALL
        SELECT b.nama pasien, b.no_rm, c.nama cara_bayar, h.jenis_pelayanan, '-' poli, h.tgl_masuk
        FROM pelayanan p, history_pelayanan_ugd h, cara_bayar c, pasien b
        WHERE p.id_pelayanan=h.id_pelayanan and b.no_rm=p.id_pasien and c.id_cara_bayar=p.cara_bayar and p.status_rawat like '%dirawat%' and p.status=1 and h.status=1 and (DATE(p.tgl_masuk) BETWEEN '$mulai' and '$akhir')
        and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap)
        ORDER by tgl_masuk asc
        ");
        return $hasil->result();
    }
}
