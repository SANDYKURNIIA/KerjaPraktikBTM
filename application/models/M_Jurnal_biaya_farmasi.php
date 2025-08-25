<?php

class M_Jurnal_biaya_farmasi extends CI_Model
{

    public function getHargaBeli($tgl, $id_log)
    {
        date_default_timezone_set('Asia/Jakarta');

        return $this->db->query("SELECT ifnull((harga_beli),0) harga_beli, tgl_input from(
            SELECT (d.harga * (1-(d.diskon_rs/100))) harga_beli,d.tgl_input
            FROM detail_struk d, struk_logistik s
            where d.id_struk = s.no_faktur and d.id_logistik= $id_log and d.tgl_input <='$tgl'
            UNION ALL
            SELECT (d.harga * (1-(d.diskon_rs/100))) harga_beli,d.tgl_input
            FROM detail_struk_bebas d, struk_logistik_bebas s
            where d.id_struk = s.id_struk and d.id_logistik= $id_log and d.tgl_input <='$tgl'
            )as g
            order by tgl_input desc
            limit 1
            ")->row();
    }
    public function update_tindakan($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function insert_tindakan($page_data, $table)
    {
        $this->db->insert($table, $page_data);
        return $this->db->insert_id();
    }
    public function delete_tindakan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function SelectJurnalMaterial($tgl)
    {
        // return $this->db->query("SELECT * FROM (
        //     SELECT  ifnull(t.jenis_pelayanan,(if((t.depo ='APOTIK'),'FARMASI RAJAL','FARMASI RANAP'))) jenis_pelayanan,  ifnull(t.poli,(if((t.depo ='APOTIK'),'FARMASI RAJAL','FARMASI RANAP'))) poli,(sum(t.frek * t.harga_persediaan)) total, c.coa_pendapatan,c.desk,t.tipe, (if((t.jenis_pelayanan = null),(if((t.depo ='APOTIK'),'804.01.','804.02.')),r.kode_coa)) kode_coa,r.kelas
        //     from tindakan_farmasi t
        //     join list_logistik l on t.id_list_tindakan=l.id_logistik
        //     join list_coa c on l.golongan_sediaan=c.nama
        //     left join ruangan r on t.tipe = r.id_ruangan and SUBSTRING_INDEX(poli,'_',1)='ranap' and t.tipe !='NON'
        //     where t.tanggal like '$tgl%'
        //     group by poli,t.tipe, c.coa_pendapatan 
        //     ) as a 

        //     ")->result();
        return $this->db->query("SELECT * FROM (
                            SELECT  t.jenis_pelayanan, t.poli,round(sum(t.frek * t.harga_persediaan)) total, c.coa_pendapatan,c.desk,t.tipe, r.kode_coa,r.kelas
                            from tindakan_farmasi t
                            join list_logistik l on t.id_list_tindakan=l.id_logistik
                            join list_coa c on l.golongan_sediaan=c.nama
                            left join ruangan r on t.tipe = r.id_ruangan and SUBSTRING_INDEX(poli,'_',1)='ranap' and t.tipe !='NON'
                            where t.tanggal like '$tgl%' and  jenis_pelayanan is not null
                            group by t.poli,t.tipe, c.coa_pendapatan 
                        ) as a 
                        UNION ALL
                        SELECT (if((b.depo ='APOTIK'),'FARMASI RAJAL','FARMASI RANAP')) jenis_pelayanan,b.poli,b.total,b.coa_pendapatan,b.desk,b.tipe, (if((b.depo ='APOTIK'),'804.01.','804.02.')) as kode_coa,(if((b.depo ='APOTIK'),'FARMASI LOKET A','FARMASI LOKET B')) as kelas FROM (
                            SELECT depo, id_pelayanan poli,round(sum(t.frek * t.harga_persediaan)) total, c.coa_pendapatan,c.desk,t.tipe
                            from tindakan_farmasi t
                            join list_logistik l on t.id_list_tindakan=l.id_logistik
                            join list_coa c on l.golongan_sediaan=c.nama
                            where t.tanggal like '$tgl%' and jenis_pelayanan is null
                            group by t.tipe, c.coa_pendapatan 
                         ) as b

           ")->result();
    }
    public function SelectBiayaFarmasi($bulan, $tahun)
    {
        $this->db->select('a.kode_akun,a.lap,sum(total_akun) total, a.jenis_akun, a.status');
        $this->db->from('akun_biaya_farmasi a');
        $this->db->where('a.bulan', $bulan);
        $this->db->where('a.tahun ', $tahun);
        $this->db->where('a.status ', 0);
        $this->db->group_by('a.kode_akun,a.lap ');
        return $this->db->get()->result();
    }

    public function material_persediaan($tgl)
    {
        //     return $this->db->query("SELECT round(sum(t.frek * t.harga_persediaan)) total, c.coa,c.desk
        //     from tindakan_farmasi t, list_logistik l, list_coa c
        //     where t.id_list_tindakan=l.id_logistik and l.golongan_sediaan = c.nama
        //     and t.tanggal like '$tgl%'
        //     group by c.coa
        //    ")->result();

        return $this->db->query(" SELECT sum(total) total, coa, desk from(
            SELECT * FROM (
                                    SELECT  t.jenis_pelayanan, t.poli,round(sum(t.frek * t.harga_persediaan)) total, c.coa,c.desk,t.tipe, r.kode_coa,r.kelas
                                    from tindakan_farmasi t
                                    join list_logistik l on t.id_list_tindakan=l.id_logistik
                                    join list_coa c on l.golongan_sediaan=c.nama
                                    left join ruangan r on t.tipe = r.id_ruangan and SUBSTRING_INDEX(poli,'_',1)='ranap' and t.tipe !='NON'
                                    where t.tanggal like '$tgl%' and  jenis_pelayanan is not null
                                    group by t.poli,t.tipe, c.coa
                                ) as a 
                                UNION ALL
                                SELECT (if((b.depo ='APOTIK'),'FARMASI RAJAL','FARMASI RANAP')) jenis_pelayanan,b.poli,b.total,b.coa,b.desk,b.tipe, (if((b.depo ='APOTIK'),'804.01.','804.02.')) as kode_coa,(if((b.depo ='APOTIK'),'FARMASI LOKET A','FARMASI LOKET B')) as kelas FROM (
                                    SELECT depo, id_pelayanan poli,round(sum(t.frek * t.harga_persediaan)) total, c.coa,c.desk,t.tipe
                                    from tindakan_farmasi t
                                    join list_logistik l on t.id_list_tindakan=l.id_logistik
                                    join list_coa c on l.golongan_sediaan=c.nama
                                    where t.tanggal like '$tgl%' and jenis_pelayanan is null
                                    group by t.tipe, c.coa 
                                 ) as b 
                ) as g
                group by coa
        ")->result();
    }
    public function SelectVerifMaterial($first_date, $second_date)
    {
        return $this->db->query("SELECT tgl,no_jurnal,sum(kredit) total, staff,jk,pk,status from jurnal_material_persediaan where tgl >= '$first_date' and tgl<='$second_date'  group by no_jurnal")->result();
    }
}
