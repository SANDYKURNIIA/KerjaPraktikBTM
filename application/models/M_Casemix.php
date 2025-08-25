<?php

class M_Casemix extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }

    public function selectDataPasienIGDby_id($id_pelayanan, $id_history)
    {
        $this->db->select('p.nama, p.no_rm, c.nama cara_bayar, a.nama asal, d.nama nama_dokter, b.tgl_masuk, b.tgl_keluar');
        $this->db->from('pelayanan b, pasien p, history_pelayanan_ugd h, cara_bayar c, asal_pasien a, dokter d'); //total bayar 1
        $this->db->where('b.id_pasien = p.no_rm and b.id_pelayanan = h.id_pelayanan and b.cara_bayar = c.id_cara_bayar and b.asal_pasien = a.id_asal_pasien and h.dpjp = d.id_dokter 
        and b.status = 1 and h.status= 1 and b.total_bayar = 1');
        $this->db->where(array('b.id_pelayanan' => $id_pelayanan, 'h.id_history' => $id_history));

        return $this->db->get()->row_array();
    }
    public function selectDataPasienby_id($id_pelayanan, $id_history)
    {
        $this->db->select('v.nama, v.no_rm, v.bayar as cara_bayar, a.nama asal, d.nama nama_dokter, v.tgl_masuk, v.tgl_keluar,b.no_sep');
        $this->db->from('v_kunjungan v, asal_pasien a,dokter d,pelayanan b'); //total bayar 1
        $this->db->where('v.id_pelayanan = b.id_pelayanan and b.asal_pasien = a.id_asal_pasien and v.dpjp = d.id_dokter');
        $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));

        return $this->db->get()->row_array();
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
    public function selectRajal()
    {
        $query =  $this->db->query("SELECT   b.id_pelayanan,h.id_history,c.id_cara_bayar,h.nama_poli,h.dpjp, b.tgl_masuk, p.no_rm,p.no_bpjs, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar, pl.nama poli , b.no_sep
            FROM pasien p, pelayanan b, history_pelayanan h, cara_bayar c, list_poli pl, dokter dok 
            WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar AND pl.id_list_poli=h.nama_poli and h.dpjp=dok.id_dokter and h.jenis_pelayanan='POLI' and b.status_rawat='selesai' and c.nama like '%bpjs%' 
            and h.status_eklaim = 0
            UNION 
            SELECT   b.id_pelayanan,h.id_history,c.id_cara_bayar,'-',h.dpjp, b.tgl_masuk, p.no_rm, p.no_bpjs,p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,'-' , b.no_sep
            FROM pasien p, pelayanan b, history_pelayanan_ugd h, cara_bayar c , dokter dok 
            WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar and h.dpjp=dok.id_dokter and h.jenis_pelayanan='UGD'  and b.status_rawat='selesai' and c.nama like '%bpjs%'
            and  h.status_eklaim = 0
            ORDER by tgl_masuk desc
            limit 100");
        return $query->result();
    }
    public function selectRanap($mulai, $akhir)
    {
        $query =  $this->db->query("SELECT b.id_pelayanan,h.id_history,c.id_cara_bayar,h.id_kamar,h.dpjp, b.tgl_masuk, p.no_rm,p.no_bpjs, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,r.tipe poli 
            FROM pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c,  ruangan r, dokter dok 
            WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar and r.id_ruangan=h.id_kamar and h.dpjp=dok.id_dokter and b.status_rawat='selesai'  and c.nama like '%bpjs%'
            and h.status_eklaim = 0 and b.status=1 and h.status=1
            and DATE(b.tgl_keluar) BETWEEN '$mulai' and '$akhir'
            ORDER by tgl_masuk desc");
        return $query->result();
    }
    public function selectControlBiaya()
    {
        $query =  $this->db->query("SELECT b.id_pelayanan,h.id_history,c.id_cara_bayar,h.id_kamar,h.dpjp, b.tgl_masuk, p.no_rm,p.no_bpjs, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,r.tipe poli 
            FROM pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c,  ruangan r, dokter dok 
            WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar and r.id_ruangan=h.id_kamar and h.dpjp=dok.id_dokter and h.jenis_pelayanan='RAWAT INAP' and (b.status_rawat='dirawat' or b.status_rawat='dikembalikan') and c.nama like '%bpjs%'
            and h.status_eklaim = 0  and b.status=1 and h.status=1
            ORDER by tgl_masuk desc
            limit 1000");
        return $query->result();
    }

    //Assembling
    public function cek_id($id_pelayanan)
    {
        $this->db->select('kode');
        $this->db->from('diagnosa');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function selectDataAssembling($first_date, $second_date, $jenis_pelayanan)
    {

        $this->db->select('*');
        $this->db->from('v_assembling');
        $this->db->where("tgl_masuk BETWEEN '$first_date' AND '$second_date'");
        $this->db->where('jenis_pelayanan', $jenis_pelayanan);
        return $this->db->get()->result();
    }

    public function selectDataDiagnosa()
    {

        $this->db->select('*');
        $this->db->from('diagnosa');

        return $this->db->get()->result();
    }

    public function selectDataAllDiagnosa()
    {

        $this->db->select('*');
        $this->db->from('list_diagnosa');

        return $this->db->get()->result();
    }

    public function selectDataAllProsedur()
    {

        $this->db->select('*');
        $this->db->from('list_prosedur');

        return $this->db->get()->result();
    }


    public function selectDataDiagnosaByIdPel($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->from('diagnosa');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function selectDataProsedurByIdPel($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->from('prosedur');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function selectDataPendaftaranby_id($id_pelayanan, $id_history)
    {
        $this->db->select('p.id_pelayanan,p.tgl_masuk, p.tgl_keluar, d.nama, p.diagnosa, p.keterangan, p.no_jaminan, p.no_sep, p.cara_keluar, p.keadaan_keluar');
        $this->db->from('pelayanan p');
        $this->db->join('history_pelayanan h', 'h.id_pelayanan=p.id_pelayanan');
        $this->db->join('dokter d', 'd.id_dokter=h.dpjp');
        $this->db->where('p.id_pelayanan', $id_pelayanan);
        $this->db->where('h.id_history', $id_history);


        return $this->db->get()->result();
    }

    public function update_akunonline($where, $page_data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }
    public function insert_diagnosa($page_data, $table)
    {

        $this->db->insert($table, $page_data);
    }
    public function insert_prosedur($page_data, $table)
    {

        $this->db->insert($table, $page_data);
    }
    public function delete_dignosa_byId($id_pelayanan, $no_diagnosa)
    {
        $this->db->delete('diagnosa', array('id_pelayanan' => $id_pelayanan, 'no_diagnosa' => $no_diagnosa));
    }
    public function delete_prosedur_byId($id_pelayanan, $no_prosedur)
    {
        $this->db->delete('prosedur', array('id_pelayanan' => $id_pelayanan, 'no_prosedur' => $no_prosedur));
    }
    public function edit_cara_keluar($idp, $data)
    {
        $this->db->where('id_pelayanan', $idp);
        $this->db->update('pelayanan', $data);
    }
    public function update_cara_keluar($where, $page_data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function update_keadaan_keluar($where, $page_data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }
    public function selectMonevHarian()
    {
        $query =  $this->db->query("SELECT b.id_pelayanan,h.id_history,c.id_cara_bayar,h.id_kamar,h.dpjp, b.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,r.tipe poli 
        FROM pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c,  ruangan r, dokter dok 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar and r.id_ruangan=h.id_kamar and h.dpjp=dok.id_dokter and h.jenis_pelayanan='RAWAT INAP' and b.status_rawat='dirawat'  and b.cara_bayar = 'WA14BJ84'
        ORDER by tgl_masuk desc limit 500");
        return $query->result();
    }
    public function selectMonevRanap()
    {
        $query =  $this->db->query("SELECT  p.status_rawat, p.diagnosa,p.id_pelayanan,pas.nama,pas.no_rm, c.nama cara_bayar,p.tgl_masuk, p.tgl_keluar, p.status_rawat  , d.nama dokter, pas.jenis_kelamin
        from pelayanan p, pasien pas, cara_bayar c, history_pelayanan_ranap h , dokter d
        where  p.id_pasien=pas.no_rm and p.cara_bayar=c.id_cara_bayar and d.id_dokter=h.dpjp  and h.id_pelayanan=p.id_pelayanan and p.status=1 and p.cara_bayar=30 and p.tgl_masuk>='2023-02-01' and p.tgl_masuk<='2023-03-01'
        GROUP by p.id_pelayanan");
        return $query->result();
    }
    public function selectMonevControlBiaya()
    {
        $query =  $this->db->query("SELECT  p.status_rawat, p.diagnosa,p.id_pelayanan,pas.nama,pas.no_rm, c.nama cara_bayar,p.tgl_masuk, p.tgl_keluar, p.status_rawat  , d.nama dokter, pas.jenis_kelamin
        from pelayanan p, pasien pas, cara_bayar c, history_pelayanan_ranap h , dokter d
        where  p.id_pasien=pas.no_rm and p.cara_bayar=c.id_cara_bayar and d.id_dokter=h.dpjp  and h.id_pelayanan=p.id_pelayanan and h.jenis_pelayanan='RAWAT INAP' and (p.status_rawat='dirawat' or p.status_rawat ='dikembalikan') and p.cara_bayar='WA14BJ84'
        
        GROUP by p.id_pelayanan");
        return $query->result();
    }
    public function selectMonevRajal()
    {
        $tgl = date("Y-m-d");
        $query =  $this->db->query("SELECT p.status_rawat,p.diagnosa,p.id_pelayanan,pas.nama,pas.no_rm, c.nama caraBayar,p.tgl_masuk, p.tgl_keluar, p.status_rawat  , poli.nama poli
        from pelayanan p, pasien pas, cara_bayar c, history_pelayanan h , list_poli poli
        where  p.id_pasien=pas.no_rm and p.cara_bayar=c.id_cara_bayar and h.id_pelayanan=p.id_pelayanan and h.nama_poli=poli.id_list_poli and h.jenis_pelayanan='POLI' and poli.nama!='APOTIK'  and poli.nama!='LABOR'  and poli.nama!='RADIOLOGI' 
        and p.tgl_masuk LIKE '%$tgl%' 
        GROUP by p.id_pelayanan 
        UNION ALL
        SELECT  p.status_rawat,p.diagnosa,p.id_pelayanan,pas.nama,pas.no_rm, c.nama caraBayar,p.tgl_masuk, p.tgl_keluar, p.status_rawat  , 'UGD'
        from pelayanan p, pasien pas, cara_bayar c, history_pelayanan_ugd h  
        where  p.id_pasien=pas.no_rm and p.cara_bayar=c.id_cara_bayar and h.id_pelayanan=p.id_pelayanan  and h.jenis_pelayanan='UGD' 
        and p.tgl_masuk LIKE '%$tgl%' 
        GROUP by p.id_pelayanan");
        return $query->result();
    }
    public function selectRangeMonevRajal($mulai, $akhir)
    {
        $tgl = date("Y-m-d");
        $query =  $this->db->query("SELECT p.status_rawat,p.diagnosa,p.id_pelayanan,pas.nama,pas.no_rm, c.nama cara_bayar,p.tgl_masuk, p.tgl_keluar, p.status_rawat  , poli.nama poli
        from pelayanan p, pasien pas, cara_bayar c, history_pelayanan h , list_poli poli
        where  p.id_pasien=pas.no_rm and p.cara_bayar=c.id_cara_bayar and h.id_pelayanan=p.id_pelayanan and h.nama_poli=poli.id_list_poli and h.jenis_pelayanan='POLI' and poli.nama!='APOTIK'  and poli.nama!='LABOR'  and poli.nama!='RADIOLOGI' 
        and p.tgl_masuk >= '$mulai' and p.tgl_masuk <= '$akhir' 
        GROUP by p.id_pelayanan 
        UNION ALL
        SELECT  p.status_rawat,p.diagnosa,p.id_pelayanan,pas.nama,pas.no_rm, c.nama cara_bayar,p.tgl_masuk, p.tgl_keluar, p.status_rawat  , 'UGD'
        from pelayanan p, pasien pas, cara_bayar c, history_pelayanan_ugd h  
        where  p.id_pasien=pas.no_rm and p.cara_bayar=c.id_cara_bayar and h.id_pelayanan=p.id_pelayanan  and h.jenis_pelayanan='UGD' 
        and p.tgl_masuk >= '$mulai' and p.tgl_masuk <= '$akhir' 
        GROUP by p.id_pelayanan");
        return $query->result();
    }
    public function selectKlaim()
    {
        $query =  $this->db->query("SELECT s.*,b.*,f.*,r.* 
        FROM klaim s, klaim_ba b, klaim_fpk f, klaim_rek r  
        WHERE b.id_klaim=s.id_klaim and f.id_klaim=s.id_klaim and r.id_klaim=s.id_klaim order by s.tanggal desc  ");
        return $query->result();
    }
    public function getLabor($id_pelayanan)
    {
        return $this->db->query("SELECT   SUM(l.harga_cost * t.frek)  total, sum(t.total) tarif
        from pelayanan p, tindakan_labor t, list_tindakan_labor l
        WHERE p.id_pelayanan=t.id_pelayanan and t.id_list_tindakan=l.id_daftar_tindakan and p.id_pelayanan='$id_pelayanan'")->row();
    }
    public function getRadio($id_pelayanan)
    {
        return $this->db->query("SELECT   SUM(l.harga_cost * t.frek)  total, sum(t.total) tarif
        from pelayanan p, tindakan_radiologi t, list_tindakan_radiologi l
        WHERE p.id_pelayanan=t.id_pelayanan and t.id_tindakan=l.id_daftar_tindakan and p.id_pelayanan='$id_pelayanan'")->row();
    }
    public function getApelkes($id_pelayanan)
    {
        return $this->db->query("SELECT   SUM(l.harga_cost * t.frek)  total, sum(t.total) tarif 
            from pelayanan p, tindakan_apelkes t, list_tindakan_apelkes l
            WHERE p.id_pelayanan=t.id_pelayanan and t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan='$id_pelayanan'")->row();
    }
    public function getOk($id_pelayanan)
    {
        return $this->db->query("SELECT   SUM(l.harga_cost * t.frek)  total, sum(t.total) tarif 
            from pelayanan p, tindakan_ok t, list_kamar_ok l
            WHERE p.id_pelayanan=t.id_pelayanan  and t.id_tindakan=l.id_list_kamar_ok and p.id_pelayanan='$id_pelayanan'")->row();
    }
    public function getObatOk($id_pelayanan)
    {
        return $this->db->query("SELECT    SUM(l.harga_cost * t.frek)  total, sum(t.total) tarif
            from pelayanan p, tindakan_obat_ok t, list_logistik l
            WHERE p.id_pelayanan=t.id_pelayanan and t.id_list_tindakan=l.id_logistik and p.id_pelayanan='$id_pelayanan'")->row();
    }
    public function getApotik($id_pelayanan)
    {
        return $this->db->query("SELECT    SUM(l.harga_cost * t.frek)  total, sum(t.total) tarif
            from pelayanan p, tindakan_farmasi t, list_logistik l
            WHERE p.id_pelayanan=t.id_pelayanan and t.id_list_tindakan=l.id_logistik and p.id_pelayanan='$id_pelayanan'")->row();
    }
    public function getJasa($idPelayanan)
    {
        $non_poli = $this->db->query("SELECT sum(total) hasil from ( 
                SELECT SUM(l.harga_jasa * t.frek) total FROM list_tindakan_apelkes l, tindakan_apelkes t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and p.id_pelayanan='$idPelayanan'
                UNION all
                SELECT SUM(l.harga_jasa * t.frek) total FROM list_tindakan_igd l, tindakan_igd t, pelayanan p WHERE t.id_list_tindakan=l.id_tindakan_igd and p.id_pelayanan=t.id_pelayanan and p.id_pelayanan='$idPelayanan'
                UNION all  
                SELECT SUM(l.harga_jasa * t.frek)  total FROM list_kamar_ok l, tindakan_ok t, pelayanan p WHERE t.id_tindakan=l.id_list_kamar_ok and p.id_pelayanan=t.id_pelayanan   and p.id_pelayanan='$idPelayanan'
            
                ) as gabung")->row();
        $a = array();
        $poli = $this->db->query("SELECT l.tindakan, l.list_tindakan, a.id_pelayanan, l.id_list_poli poli, l.kode_coa 
                from history_pelayanan a, list_poli l 
                where a.nama_poli = l.id_list_poli and a.status = 1 
                and a.id_pelayanan = '$idPelayanan'
                ")->result();
        foreach ($poli as $row) {
            $a[] = $this->db->query("SUM(l.harga_jasa * t.frek) total
                         FROM `$row->tindakan` t, `$row->list_tindakan` l, pelayanan p 
                         where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan
                         and l.kelompok_eklaim='prosedur non bedah'
                        and t.id_pelayanan = '$idPelayanan'
                         ")->result();
        }
        $total = 0;
        if (is_array($a)) {
            foreach ($a as $pelayanan => $key) {
                foreach ($key as  $row) {
                    $total += $row->total;
                }
            }
        } else {
            $total = 0;
        }

        // print_arr($a);
        $pages_array = (object) array('hasil' => $total + $non_poli->hasil);
        // print_arr($data->hasil=$total);
        return $pages_array;
    }
    public function getSarana($idPelayanan)
    {

        $non_poli = $this->db->query("SELECT sum(total) hasil from ( 
                SELECT SUM(l.harga_sarana * t.frek) total FROM list_tindakan_apelkes l, tindakan_apelkes t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and p.id_pelayanan='$idPelayanan'
                UNION all
                SELECT SUM(l.harga_sarana * t.frek) total FROM list_tindakan_igd l, tindakan_igd t, pelayanan p WHERE t.id_list_tindakan=l.id_tindakan_igd and p.id_pelayanan=t.id_pelayanan  and p.id_pelayanan='$idPelayanan'
                UNION ALL
                SELECT SUM(l.harga_sarana * t.frek)  total FROM list_kamar_ok l, tindakan_ok t, pelayanan p WHERE t.id_tindakan=l.id_list_kamar_ok and p.id_pelayanan=t.id_pelayanan   and p.id_pelayanan='$idPelayanan'
                ) as gabung")->row();
        $a = array();
        $poli = $this->db->query("SELECT l.tindakan, l.list_tindakan, a.id_pelayanan, l.id_list_poli poli, l.kode_coa 
                from history_pelayanan a, list_poli l 
                where a.nama_poli = l.id_list_poli and a.status = 1 
                and a.id_pelayanan = '$idPelayanan'
                ")->result();
        foreach ($poli as $row) {
            $a[] = $this->db->query("SELECT SUM(l.harga_sarana * t.frek) total
                         FROM `$row->tindakan` t, `$row->list_tindakan` l, pelayanan p 
                         where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan
                         and l.kelompok_eklaim='prosedur non bedah'
                        and t.id_pelayanan = '$idPelayanan'
                         ")->result();
        }
        $total = 0;
        if (is_array($a)) {
            foreach ($a as $pelayanan => $key) {
                foreach ($key as  $row) {
                    $total += $row->total;
                }
            }
        } else {
            $total = 0;
        }

        // print_arr($a);
        $pages_array = (object) array('hasil' => $total + $non_poli->hasil);
        // print_arr($data->hasil=$total);
        return $pages_array;
    }

    public function getTotalNonBedah($idPelayanan)
    {
        $non_poli = $this->db->query("SELECT sum(total) hasil from ( 
            SELECT SUM(t.total) total FROM list_tindakan_apelkes l, tindakan_apelkes t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and l.kelompok='prosedur non bedah' and p.id_pelayanan='$idPelayanan'
            UNION all
            SELECT SUM(t.total) total FROM list_tindakan_apelkes l, tindakan_pelayanan_tambahan t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and l.kelompok='prosedur non bedah' and p.id_pelayanan='$idPelayanan' and t.status_pembayaran !='tidak'
            UNION all
            SELECT SUM(t.total) total FROM list_tindakan_igd l, tindakan_igd t, pelayanan p WHERE t.id_list_tindakan=l.id_tindakan_igd and p.id_pelayanan=t.id_pelayanan and l.kelompok_eklaim='prosedur non bedah' and p.id_pelayanan='$idPelayanan'
            ) as gabung")->row();
        $a = array();
        $poli = $this->db->query("SELECT l.tindakan, l.list_tindakan, a.id_pelayanan, l.id_list_poli poli, l.kode_coa 
            from history_pelayanan a, list_poli l 
            where a.nama_poli = l.id_list_poli and a.status = 1 
            and a.nama_poli != '146582'
            and a.id_pelayanan = '$idPelayanan'
            ")->result();
        foreach ($poli as $row) {
            $a[] = $this->db->query("SELECT SUM(t.total) total
                     FROM `$row->tindakan` t, `$row->list_tindakan` l, pelayanan p 
                     where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan
                     and l.kelompok_eklaim='prosedur non bedah'
                    and t.id_pelayanan = '$idPelayanan'
                     ")->result();
        }
        $total = 0;
        if (is_array($a)) {
            foreach ($a as $pelayanan => $key) {
                foreach ($key as  $row) {
                    $total += $row->total;
                }
            }
        } else {
            $total = 0;
        }

        // print_arr($a);
        $pages_array = (object) array('hasil' => $total + $non_poli->hasil);
        // print_arr($data->hasil=$total);
        return $pages_array;
    }
    public function getTotalKonsul($idPelayanan)
    {
        $non_poli = $this->db->query("SELECT sum(total) hasil from ( 
            SELECT SUM(t.total) total FROM list_tindakan_apelkes l, tindakan_apelkes t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and l.kelompok='konsultasi' and p.id_pelayanan='$idPelayanan'
            UNION all
            SELECT SUM(t.total) total FROM list_tindakan_igd l, tindakan_igd t, pelayanan p WHERE t.id_list_tindakan=l.id_tindakan_igd and p.id_pelayanan=t.id_pelayanan and l.kelompok_eklaim='konsultasi' and p.id_pelayanan='$idPelayanan'
            UNION all
            SELECT sum(biaya_rs + biaya_admin) total from pelayanan WHERE id_pelayanan='$idPelayanan' and status=1
            UNION ALL
            SELECT sum(biaya_jasa) total from history_pelayanan WHERE id_pelayanan='$idPelayanan' and status=1
            UNION ALL
            SELECT sum(biaya_jasa) total from history_pelayanan_ugd WHERE id_pelayanan='$idPelayanan' and status=1
            ) as gabung ")->row();
        $a = array();

        $poli = $this->db->query("SELECT l.tindakan, l.list_tindakan, a.id_pelayanan, l.id_list_poli poli, l.kode_coa 
            from history_pelayanan a, list_poli l 
            where a.nama_poli = l.id_list_poli and a.status = 1 
            and a.nama_poli != '146582'
            and a.id_pelayanan = '$idPelayanan' 
            ")->result();
        foreach ($poli as $row) {
            $a[] = $this->db->query("SELECT SUM(t.total) total
                     FROM `$row->tindakan` t, `$row->list_tindakan` l, pelayanan p 
                     where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan
                     and l.kelompok_eklaim='konsultasi'
                    and t.id_pelayanan = '$idPelayanan'
                     ")->result();
        }
        $total = 0;
        if (is_array($a)) {
            foreach ($a as $pelayanan => $key) {
                foreach ($key as  $row) {
                    $total += $row->total;
                }
            }
        } else {
            $total = 0;
        }

        // print_arr($a);
        $pages_array = (object) array('hasil' => $total + $non_poli->hasil);
        // print_arr($data->hasil=$total);
        return $pages_array;
    }
    public function getTotalKamar($idPelayanan)
    {
        $non_poli = $this->db->query("SELECT sum(total) hasil from ( 
                SELECT SUM(t.total) total FROM list_tindakan_apelkes l, tindakan_apelkes t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and l.kelompok='kamar' and p.id_pelayanan='$idPelayanan'
                UNION all
                SELECT SUM(t.total) total FROM list_tindakan_apelkes l, tindakan_pelayanan_tambahan t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and l.kelompok='kamar' and p.id_pelayanan='$idPelayanan' and t.status_pembayaran != 'tidak'
                UNION all
                SELECT SUM(t.total) total FROM list_tindakan_igd l, tindakan_igd t, pelayanan p WHERE t.id_list_tindakan=l.id_tindakan_igd and p.id_pelayanan=t.id_pelayanan and l.kelompok_eklaim='kamar' and p.id_pelayanan='$idPelayanan'
                UNION ALL
                SELECT sum(biaya_ruangan) total from history_pelayanan_ranap WHERE id_pelayanan='$idPelayanan' and status=1
                ) as gabung")->row();
        $a = array();
        $poli = $this->db->query("SELECT l.tindakan, l.list_tindakan, a.id_pelayanan, l.id_list_poli poli, l.kode_coa 
                from history_pelayanan a, list_poli l 
                where a.nama_poli = l.id_list_poli and a.status = 1 
                and a.nama_poli != '146582'
                and a.id_pelayanan = '$idPelayanan'
                ")->result();
        foreach ($poli as $row) {
            $a[] = $this->db->query("SELECT SUM(t.total) total
                         FROM `$row->tindakan` t, `$row->list_tindakan` l, pelayanan p 
                         where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan
                         and l.kelompok_eklaim='kamar'
                        and t.id_pelayanan = '$idPelayanan'
                         ")->result();
        }
        $total = 0;
        if (is_array($a)) {
            foreach ($a as $pelayanan => $key) {
                foreach ($key as  $row) {
                    $total += $row->total;
                }
            }
        } else {
            $total = 0;
        }

        // print_arr($a);
        $pages_array = (object) array('hasil' => $total + $non_poli->hasil);
        // print_arr($data->hasil=$total);
        return $pages_array;
    }
    public function getTotalPenunjang($idPelayanan)
    {
        $non_poli = $this->db->query("SELECT sum(total) hasil from (
        SELECT SUM(t.total) total FROM list_tindakan_apelkes l, tindakan_apelkes t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and l.kelompok='penunjang' and p.id_pelayanan='$idPelayanan'
        UNION all
        SELECT SUM(t.total) total FROM list_tindakan_apelkes l, tindakan_penunjang_lain t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and l.kelompok='penunjang' and (t.status_pembayaran !='tidak' or t.status_pembayaran is null) and p.id_pelayanan='$idPelayanan'
        UNION all
        SELECT SUM(t.total) total FROM list_tindakan_poli_hemodialisa l, tindakan_poli_hemodialisa t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.id_pelayanan='$idPelayanan'
        UNION all
        SELECT SUM(t.total) total FROM list_tindakan_igd l, tindakan_igd t, pelayanan p WHERE t.id_list_tindakan=l.id_tindakan_igd and p.id_pelayanan=t.id_pelayanan and l.kelompok_eklaim='penunjang' and p.id_pelayanan='$idPelayanan'
        ) as gabung")->row();

        //////POLI
        $a = array();
        $poli = $this->db->query("SELECT l.tindakan, l.list_tindakan, a.id_pelayanan, l.id_list_poli poli, l.kode_coa 
        from history_pelayanan a, list_poli l 
        where a.nama_poli = l.id_list_poli and a.status = 1 
        and a.nama_poli != '146582'
        and a.id_pelayanan = '$idPelayanan'
        ")->result();
        foreach ($poli as $row) {
            $a[] = $this->db->query("SELECT SUM(t.total) total
                 FROM `$row->tindakan` t, `$row->list_tindakan` l, pelayanan p 
                 where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan
                 and l.kelompok_eklaim='penunjang'
                and t.id_pelayanan = '$idPelayanan'
                 ")->result();
        }
        $total = 0;

        if (is_array($a)) {
            foreach ($a as $pelayanan => $key) {
                foreach ($key as  $row) {
                    $total += $row->total;
                }
            }
        } else {
            $total = 0;
        }

        // print_arr($a);
        $pages_array = (object) array('hasil' => $total + $non_poli->hasil);
        // print_arr($data->hasil=$total);
        return $pages_array;
    }
    public function getTotalTenagaAhli($idPelayanan)
    {
        $non_poli = $this->db->query("SELECT sum(total) hasil from ( 
            SELECT SUM(t.total) total FROM list_tindakan_apelkes l, tindakan_apelkes t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and l.kelompok='tenaga ahli' and p.id_pelayanan='$idPelayanan'
            UNION all
            SELECT SUM(t.total) total FROM list_tindakan_igd l, tindakan_igd t, pelayanan p WHERE t.id_list_tindakan=l.id_tindakan_igd and p.id_pelayanan=t.id_pelayanan and l.kelompok_eklaim='tenaga ahli' and p.id_pelayanan='$idPelayanan'
            ) as gabung")->row();
        $a = array();
        $poli = $this->db->query("SELECT l.tindakan, l.list_tindakan, a.id_pelayanan, l.id_list_poli poli, l.kode_coa 
                from history_pelayanan a, list_poli l 
                where a.nama_poli = l.id_list_poli and a.status = 1 
                and a.nama_poli != '146582'
                and a.id_pelayanan = '$idPelayanan'
                ")->result();
        foreach ($poli as $row) {
            $a[] = $this->db->query("SELECT SUM(t.total) total
                         FROM `$row->tindakan` t, `$row->list_tindakan` l, pelayanan p 
                         where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan
                         and l.kelompok_eklaim='tenaga ahli'
                        and t.id_pelayanan = '$idPelayanan'
                         ")->result();
        }
        $total = 0;
        if (is_array($a)) {
            foreach ($a as $pelayanan => $key) {
                foreach ($key as  $row) {
                    $total += $row->total;
                }
            }
        } else {
            $total = 0;
        }

        // print_arr($a);
        $pages_array = (object) array('hasil' => $total + $non_poli->hasil);
        // print_arr($data->hasil=$total);
        return $pages_array;
    }
    public function getTotalRadio($idPelayanan)
    {
        $non_poli = $this->db->query("SELECT sum(total) hasil from ( 
            SELECT SUM(t.total) total FROM list_tindakan_apelkes l, tindakan_apelkes t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and l.kelompok='radiologi' and p.id_pelayanan='$idPelayanan'
            UNION all
            SELECT SUM(t.total) total FROM list_tindakan_igd l, tindakan_igd t, pelayanan p WHERE t.id_list_tindakan=l.id_tindakan_igd and p.id_pelayanan=t.id_pelayanan and l.kelompok_eklaim='radiologi' and p.id_pelayanan='$idPelayanan'
            UNION all
            SELECT SUM(t.total) total FROM list_tindakan_radiologi l, tindakan_radiologi t, pelayanan p WHERE t.id_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan and (t.status_pembayaran !='tidak' or t.status_pembayaran is null)  and p.id_pelayanan='$idPelayanan'
            ) as gabung")->row();

        $a = array();
        $poli = $this->db->query("SELECT l.tindakan, l.list_tindakan, a.id_pelayanan, l.id_list_poli poli, l.kode_coa 
                from history_pelayanan a, list_poli l 
                where a.nama_poli = l.id_list_poli and a.status = 1 and a.nama_poli != '15487956'
                and a.nama_poli != '146582'
                and a.id_pelayanan = '$idPelayanan'
                ")->result();
        foreach ($poli as $row) {
            $a[] = $this->db->query("SELECT SUM(t.total) total
                         FROM `$row->tindakan` t, `$row->list_tindakan` l, pelayanan p 
                         where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan
                         and l.kelompok_eklaim='radiologi'
                          and t.id_pelayanan = '$idPelayanan'
                         ")->result();
        }
        $total = 0;
        if (is_array($a)) {
            foreach ($a as $pelayanan => $key) {
                foreach ($key as  $row) {
                    $total += $row->total;
                }
            }
        } else {
            $total = 0;
        }

        // print_arr($a);
        $pages_array = (object) array('hasil' => $total + $non_poli->hasil);
        // print_arr($data->hasil=$total);
        return $pages_array;
    }
    public function getTotalLabor($idPelayanan)
    {
        $non_poli = $this->db->query("SELECT sum(total) hasil from (
            SELECT SUM(t.total) total FROM list_tindakan_apelkes l, tindakan_apelkes t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and l.kelompok='labor' and p.id_pelayanan='$idPelayanan'
            UNION all
            SELECT SUM(t.total) total FROM list_tindakan_igd l, tindakan_igd t, pelayanan p WHERE t.id_list_tindakan=l.id_tindakan_igd and p.id_pelayanan=t.id_pelayanan and l.kelompok_eklaim='labor' and p.id_pelayanan='$idPelayanan'
            UNION all
            SELECT SUM(t.total) total FROM list_tindakan_labor l, tindakan_labor t, form_labor f, pelayanan p 
            WHERE t.id_list_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan and t.id_form_labor = f.id_form_labor and (f.status_pembayaran !='tidak' or f.status_pembayaran is null) and f.status != 99
            and p.id_pelayanan='$idPelayanan'
            ) as gabung")->row();
        $a = array();
        $poli = $this->db->query("SELECT l.tindakan, l.list_tindakan, a.id_pelayanan, l.id_list_poli poli, l.kode_coa 
                    from history_pelayanan a, list_poli l 
                    where a.nama_poli = l.id_list_poli and a.status = 1 and a.nama_poli != '146582'
                    and a.id_pelayanan = '$idPelayanan'
                    ")->result();
        foreach ($poli as $row) {
            $a[] = $this->db->query("SELECT SUM(t.total) total
                             FROM `$row->tindakan` t, `$row->list_tindakan` l, pelayanan p 
                             where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan
                             and l.kelompok_eklaim='labor'
                             and t.id_pelayanan = '$idPelayanan'
                             ")->result();
        }
        $total = 0;
        if (is_array($a)) {
            foreach ($a as $pelayanan => $key) {
                foreach ($key as  $row) {
                    $total += $row->total;
                }
            }
        } else {
            $total = 0;
        }

        // print_arr($a);
        $pages_array = (object) array('hasil' => $total + $non_poli->hasil);
        // print_arr($data->hasil=$total);
        return $pages_array;
    }
    public function getTotalKeperawatan($idPelayanan)
    {
        $non_poli = $this->db->query("SELECT sum(total) hasil from ( 
            SELECT SUM(t.total) total FROM list_tindakan_apelkes l, tindakan_apelkes t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and l.kelompok='keperawatan' and p.id_pelayanan='$idPelayanan'
            UNION all
            SELECT SUM(t.total) total FROM list_tindakan_igd l, tindakan_igd t, pelayanan p WHERE t.id_list_tindakan=l.id_tindakan_igd and p.id_pelayanan=t.id_pelayanan and l.kelompok_eklaim='keperawatan' and p.id_pelayanan='$idPelayanan'
            UNION all
            SELECT SUM(t.total) total FROM list_tindakan_poli_kemoterapi l, tindakan_poli_kemoterapi t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.id_pelayanan='$idPelayanan'
            ) as gabung")->row();
        $a = array();
        $poli = $this->db->query("SELECT l.tindakan, l.list_tindakan, a.id_pelayanan, l.id_list_poli poli, l.kode_coa 
                    from history_pelayanan a, list_poli l 
                    where a.nama_poli = l.id_list_poli and a.status = 1 and a.nama_poli != '15487956'
                    and a.nama_poli != '146582' and a.nama_poli != 'EM4488C53'
                    and a.id_pelayanan = '$idPelayanan'
                    ")->result();
        foreach ($poli as $row) {
            $a[] = $this->db->query("SELECT SUM(t.total) total
                             FROM `$row->tindakan` t, `$row->list_tindakan` l, pelayanan p 
                             where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan
                             and l.kelompok_eklaim='keperawatan'
                            and t.id_pelayanan = '$idPelayanan'
                             ")->result();
        }
        $total = 0;
        if (is_array($a)) {
            foreach ($a as $pelayanan => $key) {
                foreach ($key as  $row) {
                    $total += $row->total;
                }
            }
        } else {
            $total = 0;
        }

        // print_arr($a);
        $pages_array = (object) array('hasil' => $total + $non_poli->hasil);
        // print_arr($data->hasil=$total);
        return $pages_array;
    }
    public function getTotalBedah($idPelayanan)
    {
        return $this->db->query("SELECT sum(total) hasil from ( 
            SELECT SUM(t.total) total FROM list_kamar_ok l, tindakan_ok t, pelayanan p WHERE t.id_tindakan=l.id_list_kamar_ok and p.id_pelayanan=t.id_pelayanan and p.id_pelayanan='$idPelayanan'
            UNION all 
            SELECT SUM(t.total) total FROM tindakan_ok t, pelayanan p WHERE p.id_pelayanan=t.id_pelayanan  and t.tipe_tindakan is not null and p.id_pelayanan='$idPelayanan'
            UNION ALL
            SELECT SUM(t.total) total FROM list_tindakan_apelkes l, tindakan_apelkes t, pelayanan p 
            WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and l.kelompok='prosedur bedah' and p.id_pelayanan='$idPelayanan'
            ) as gabung")->row();
    }
    public function getTotalSewaAlat($idPelayanan)
    {

        $non_poli = $this->db->query("SELECT sum(total) hasil from ( 
            SELECT SUM(t.total) total FROM list_tindakan_apelkes l, tindakan_apelkes t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and l.kelompok='sewa alat' and p.id_pelayanan='$idPelayanan'
            UNION all
            SELECT SUM(t.total) total FROM list_tindakan_igd l, tindakan_igd t, pelayanan p WHERE t.id_list_tindakan=l.id_tindakan_igd and p.id_pelayanan=t.id_pelayanan and l.kelompok_eklaim='sewa alat' and p.id_pelayanan='$idPelayanan'
            ) as gabung")->row();
        $a = array();
        $poli = $this->db->query("SELECT l.tindakan, l.list_tindakan, a.id_pelayanan, l.id_list_poli poli, l.kode_coa 
            from history_pelayanan a, list_poli l 
            where a.nama_poli = l.id_list_poli and a.status = 1 
            and a.nama_poli != '146582'
            and a.id_pelayanan = '$idPelayanan'
            ")->result();
        foreach ($poli as $row) {
            $a[] = $this->db->query("SELECT SUM(t.total) total
                     FROM `$row->tindakan` t, `$row->list_tindakan` l, pelayanan p 
                     where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan
                     and l.kelompok_eklaim='sewa alat'
                    and t.id_pelayanan = '$idPelayanan'
                     ")->result();
        }
        $total = 0;
        if (is_array($a)) {
            foreach ($a as $pelayanan => $key) {
                foreach ($key as  $row) {
                    $total += $row->total;
                }
            }
        } else {
            $total = 0;
        }

        // print_arr($a);
        $pages_array = (object) array('hasil' => $total + $non_poli->hasil);
        // print_arr($data->hasil=$total);
        return $pages_array;
    }
    public function getTotalRehab($idPelayanan)
    {
        $non_poli = $this->db->query("SELECT sum(total) hasil from (
            SELECT SUM(t.total) total FROM list_tindakan_poli_fisio l, tindakan_poli_fisio t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and p.id_pelayanan='$idPelayanan'
            UNION all 
            SELECT SUM(t.total) total FROM list_tindakan_apelkes l, tindakan_apelkes t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and l.kelompok='rehabilitasi' and p.id_pelayanan='$idPelayanan'
            UNION all
            SELECT SUM(t.total) total FROM list_tindakan_igd l, tindakan_igd t, pelayanan p WHERE t.id_list_tindakan=l.id_tindakan_igd and p.id_pelayanan=t.id_pelayanan and l.kelompok_eklaim='rehabilitasi' and p.id_pelayanan='$idPelayanan'
            ) as gabung")->row();
        $a = array();
        $poli = $this->db->query("SELECT l.tindakan, l.list_tindakan, a.id_pelayanan, l.id_list_poli poli, l.kode_coa 
                    from history_pelayanan a, list_poli l 
                    where a.nama_poli = l.id_list_poli and a.status = 1 and a.nama_poli != '6E975PL694'
                    and a.nama_poli != '146582'
                    and a.id_pelayanan = '$idPelayanan'
                    ")->result();
        foreach ($poli as $row) {
            $a[] = $this->db->query("SELECT SUM(t.total) total
                             FROM `$row->tindakan` t, `$row->list_tindakan` l, pelayanan p 
                             where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan
                             and l.kelompok_eklaim='rehabilitasi'
                            and t.id_pelayanan = '$idPelayanan'
                             ")->result();
        }
        $total = 0;
        if (is_array($a)) {
            foreach ($a as $pelayanan => $key) {
                foreach ($key as  $row) {
                    $total += $row->total;
                }
            }
        } else {
            $total = 0;
        }

        // print_arr($a);
        $pages_array = (object) array('hasil' => $total + $non_poli->hasil);
        // print_arr($data->hasil=$total);
        return $pages_array;
    }
    public function getTotalBmhp($idPelayanan)
    {
        $non_poli = $this->db->query("SELECT sum(total) hasil from (
            SELECT SUM(t.total) total FROM list_tindakan_apelkes l, tindakan_apelkes t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and l.kelompok='bmhp' and p.id_pelayanan='$idPelayanan'
            UNION all
            SELECT SUM(t.total) total FROM list_tindakan_igd l, tindakan_igd t, pelayanan p WHERE t.id_list_tindakan=l.id_tindakan_igd and p.id_pelayanan=t.id_pelayanan and l.kelompok_eklaim='bmhp' and p.id_pelayanan='$idPelayanan'
            ) as gabung")->row();
        $a = array();
        $poli = $this->db->query("SELECT l.tindakan, l.list_tindakan, a.id_pelayanan, l.id_list_poli poli, l.kode_coa 
                    from history_pelayanan a, list_poli l 
                    where a.nama_poli = l.id_list_poli and a.status = 1
                    and a.nama_poli != '146582'
                    and a.id_pelayanan = '$idPelayanan'
                    ")->result();
        foreach ($poli as $row) {
            $a[] = $this->db->query("SELECT SUM(t.total) total
                             FROM `$row->tindakan` t, `$row->list_tindakan` l, pelayanan p 
                             where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan
                             and l.kelompok_eklaim='bmhp'
                            and t.id_pelayanan = '$idPelayanan'
                             ")->result();
        }
        $total = 0;
        if (is_array($a)) {
            foreach ($a as $pelayanan => $key) {
                foreach ($key as  $row) {
                    $total += $row->total;
                }
            }
        } else {
            $total = 0;
        }

        // print_arr($a);
        $pages_array = (object) array('hasil' => $total + $non_poli->hasil);
        // print_arr($data->hasil=$total);
        return $pages_array;
    }
    public function getTotalPelDarah($idPelayanan)
    {
        $non_poli = $this->db->query("SELECT sum(total) hasil from ( 
            SELECT SUM(t.total) total FROM list_tindakan_apelkes l, tindakan_apelkes t, pelayanan p WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and l.kelompok='pelayanan darah' and p.id_pelayanan='$idPelayanan'
            UNION all
            SELECT SUM(t.total) total FROM list_tindakan_igd l, tindakan_igd t, pelayanan p WHERE t.id_list_tindakan=l.id_tindakan_igd and p.id_pelayanan=t.id_pelayanan and l.kelompok_eklaim='pelayanan darah' and p.id_pelayanan='$idPelayanan'
            ) as gabung")->row();
        $a = array();
        $poli = $this->db->query("SELECT l.tindakan, l.list_tindakan, a.id_pelayanan, l.id_list_poli poli, l.kode_coa 
                        from history_pelayanan a, list_poli l 
                        where a.nama_poli = l.id_list_poli and a.status = 1
                        and a.nama_poli != '146582'
                        and a.id_pelayanan = '$idPelayanan'
                        ")->result();
        foreach ($poli as $row) {
            $a[] = $this->db->query("SELECT SUM(t.total) total
                                 FROM `$row->tindakan` t, `$row->list_tindakan` l, pelayanan p 
                                 where t.id_list_tindakan = l.id_list_tindakan and p.id_pelayanan = t.id_pelayanan
                                 and l.kelompok_eklaim='pelayanan darah'
                                and t.id_pelayanan = '$idPelayanan'
                                 ")->result();
        }
        $total = 0;
        if (is_array($a)) {
            foreach ($a as $pelayanan => $key) {
                foreach ($key as  $row) {
                    $total += $row->total;
                }
            }
        } else {
            $total = 0;
        }

        // print_arr($a);
        $pages_array = (object) array('hasil' => $total + $non_poli->hasil);
        // print_arr($data->hasil=$total);
        return $pages_array;
    }
    public function getTotalObat($idPelayanan)
    {
        return $this->db->query("SELECT round(sum(total),0) hasil from ( 
            SELECT SUM(t.total) total FROM tindakan_farmasi t, resep_obat r WHERE r.id_resep=t.id_resep and r.jenis_resep != 3 and  r.id_pelayanan='$idPelayanan' and frek != 0
            UNION all
            SELECT SUM(t.total) total FROM tindakan_farmasi t WHERE (t.id_resep ='OBAT RUANGAN' or t.id_resep ='OBAT RUANG' or t.id_resep ='obat farmasi' or t.id_resep = 'obat retur') and t.id_pelayanan='$idPelayanan'
            UNION ALL
            SELECT SUM(t.total) total FROM tindakan_obat_ok t  WHERE  t.id_pelayanan='$idPelayanan'
            ) as gabung")->row();
    }
    public function getDataPasien($idPelayanan, $idHis)
    {
        return $this->db->query("SELECT h.id_kamar,h.dpjp,p.cara_bayar,p.tgl_masuk,p.tgl_keluar,p.diagnosa,p.keterangan,p.no_jaminan,p.no_sep,p.cara_keluar,p.keadaan_keluar,p.no_sep,h.jenis_pelayanan,pas.no_bpjs, pas.no_rm,pas.nama pasien,pas.tgl_lahir, pas.jenis_kelamin, d.nama, c.nama caraBayar,r.kelas_ruangan, p.asal_pasien
        FROM pelayanan p, history_pelayanan_ranap h, pasien pas, dokter d, cara_bayar c , ruangan r
        WHERE pas.no_rm = p.id_pasien and p.id_pelayanan = h.id_pelayanan and d.id_dokter = h.dpjp and c.id_cara_bayar=p.cara_bayar and r.id_ruangan=h.id_kamar and p.id_pelayanan='$idPelayanan' and h.id_history='$idHis'")->result();
    }
    public function selectDiagnosaById($idPelayanan)
    {
        return $this->db->query("SELECT * from diagnosa WHERE id_pelayanan='$idPelayanan'  order by tanggal")->result();
    }
    public function selectProsedurById($idPelayanan)
    {
        return $this->db->query("SELECT * from prosedur  WHERE id_pelayanan='$idPelayanan' order by tanggal")->result();
    }
    public function getDataPasienRajal($idPelayanan, $idHis)
    {
        return $this->db->query("SELECT b.id_pelayanan,h.id_history,c.id_cara_bayar,h.nama_poli,h.dpjp, b.tgl_masuk,b.tgl_keluar, p.no_rm,p.no_bpjs, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar, pl.nama poli , b.no_sep
            FROM pasien p, pelayanan b, history_pelayanan h, cara_bayar c, list_poli pl, dokter dok
            WHERE p.no_rm = b.id_pasien and b.id_pelayanan = h.id_pelayanan and dok.id_dokter = h.dpjp and c.id_cara_bayar=b.cara_bayar and b.id_pelayanan='$idPelayanan' and h.id_history='$idHis' and pl.id_list_poli=h.nama_poli
            UNION 
            SELECT   b.id_pelayanan,h.id_history,c.id_cara_bayar,'-',h.dpjp, b.tgl_masuk,b.tgl_keluar, p.no_rm, p.no_bpjs,p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,'-' , b.no_sep
            FROM pasien p, pelayanan b, history_pelayanan_ugd h, cara_bayar c , dokter dok 
            WHERE p.no_rm = b.id_pasien and b.id_pelayanan = h.id_pelayanan and dok.id_dokter = h.dpjp and c.id_cara_bayar=b.cara_bayar and b.id_pelayanan='$idPelayanan' and h.id_history='$idHis'")->result();
    }
    // public function selectDataPasienIGD()
    // {
    //     $query = $this->db->query("SELECT v.*, p.*, dok.nama nama_dokter
    // FROM v_kunjungan v, form_ass_dokter_igd d, form_ass_per_igd f, pasien p, dokter dok
    // where v.id_pelayanan = d.id_pelayanan and v.id_pelayanan = f.id_pelayanan and v.no_rm = p.no_rm and v.dpjp = dok.id_dokter
    //  ORDER BY v.tgl_masuk desc");
    //     return $query->result();
    // }
    // public function selectDataPasienIGD()
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $tgl = date("Y-m-d");
    //     $query = $this->db->query("SELECT v.*,'' as tipe_poli,'-'as '-','-' as poli 
    //     FROM v_erm_igd v, form_ass_dokter_igd d, form_ass_per_igd f 
    //     where v.id_pelayanan = d.id_pelayanan and v.id_pelayanan = f.id_pelayanan 
    //     and v.total_bayar = 1 and v.tgl_masuk like '%$tgl%' 
    //     union all 
    //     SELECT v.*,'-'as '-','-' as poli 
    //     FROM v_erm_poli v, form_assesmen_dokter d, form_assesmen_awal_rajal f 
    //     where v.id_pelayanan = d.id_pelayanan and v.id_pelayanan = f.id_pelayanan 
    //     and v.status_erm = 1 and v.tgl_masuk like '%$tgl%' ORDER BY tgl_masuk desc");
    //     return $query->result();
    // }
    public function selectDataPasienIGDRange($mulai, $akhir)
    {
        $query = $this->db->query("SELECT a.*, '-' as poli from 
        (SELECT v.id_pelayanan,v.id_history, v.no_rm, v.nama,v.tgl_lahir, v.tgl_masuk,v.jenis_kelamin, v.jenis_pelayanan,v.cara_bayar
        FROM v_erm_igd v, form_ass_dokter_igd d, form_ass_per_igd f 
        where v.id_pelayanan = d.id_pelayanan and v.id_pelayanan = f.id_pelayanan 
        and v.total_bayar = 1 and (date(v.tgl_masuk) between '$mulai' and '$akhir') 
        group by v.id_history
        ) as a
        union all 
        SELECT b.* from
        (SELECT v.id_pelayanan,v.id_history, v.no_rm, v.nama,v.tgl_lahir, v.tgl_masuk,v.jenis_kelamin, v.jenis_pelayanan,v.cara_bayar,  v.poli
        FROM v_erm_poli v, form_assesmen_dokter d, form_assesmen_awal_rajal f 
        where v.id_pelayanan = d.id_pelayanan and v.id_pelayanan = f.id_pelayanan 
        and v.status_erm = 1 and (date(v.tgl_masuk) between '$mulai' and '$akhir') 
        group by v.id_history
        ) as b
        union all 
        SELECT c.* from
        (SELECT v.id_pelayanan,v.id_history, v.no_rm, v.nama,v.tgl_lahir, v.tgl_masuk,v.jenis_kelamin, v.jenis_pelayanan,v.cara_bayar,  v.poli
        FROM v_erm_ranap v, form_ass_dokter_ranap d, form_ass_per_ranap f, diagnosa_utama u 
        where v.id_history = d.id_history and v.id_history = f.id_history and v.id_history = u.id_history
        and (date(v.tgl_masuk) between '$mulai' and '$akhir') 
        group by v.id_history
        ) as c
        ORDER BY tgl_masuk desc");
        return $query->result();
    }
    public function selectDataPasienIGDbyid($id_pelayanan, $id_history) //riwayat erm
    {
        $this->db->select('v.*, p.pekerjaan');
        $this->db->from('v_erm_igd v, pasien p'); //total bayar 1
        $this->db->where('v.no_rm = p.no_rm');
        $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));

        return $this->db->get()->row();
    }
    public function cetakPenunjang($id)
    {
        $this->db->select('f.*, p.nama pasien,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,p.alamat almt,p.kelurahan,p.kecamatan,p.provinsi');
        $this->db->from('hasil_penunjang_diagnostik f, pelayanan b,pasien p,cara_bayar c');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        $this->db->where('f.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('f.id_pelayanan', $id);
        return $this->db->get()->result_array();
    }
    public function selectTerapiByIdPel($id_pelayanan)
    {
        $this->db->select('l.nama,sum(t.frek) frek,t.tanggal, t.id_signa,t.id_cara_pakai, c.cara_pemakaian, s.tindakan signa');
        $this->db->from('tindakan_farmasi t, list_logistik l, cara_pemakaian_obat c, signa_obat s, resep_obat r');
        $this->db->where('t.id_list_tindakan = l.id_logistik');
        $this->db->where('t.id_resep = r.id_resep');
        $this->db->where('t.id_signa = s.id_signa');
        $this->db->where('t.id_cara_pakai = c.id_cara_pemakaian');
        $this->db->where('r.id_pelayanan', $id_pelayanan);
        $this->db->where_not_in('r.jenis_resep', 4);
        $this->db->group_by('l.id_logistik');
        return $this->db->get()->result_array();
    }
    public function getDpDisc($id_pelayanan)
    {
        $this->db->select('d.*,s.nama staff');
        $this->db->from('deatail_kasir d,staff s');
        $this->db->where('d.id_staff = s.id_staff');
        $this->db->where('d.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result_array();
    }

    public function selectLaporanPasienRanap()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ranap h , pasien ps, dokter d, cara_bayar c, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
        $this->db->where("(p.cara_bayar = 'AN48QN57' or p.cara_bayar = 'JC93NV93' or p.cara_bayar = 'UJ35AP93')");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->order_by('ps.nama, t.tanggal ');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanPasienRanap($mulai, $akhir)
    {
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ranap h , pasien ps, dokter d, cara_bayar c, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
        $this->db->where("(p.cara_bayar = 'AN48QN57' or p.cara_bayar = 'JC93NV93' or p.cara_bayar = 'UJ35AP93')");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->order_by('t.tanggal ');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanObatRanap($mulai, $akhir)
    {
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(p.cara_bayar = 'AN48QN57' or p.cara_bayar = 'JC93NV93')");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->order_by('ps.nama, t.tanggal');
        return $this->db->get()->result();
    }


    public function selectLaporanPasienRanapSanbe()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where("(l.produsen='SANBE FARMA' )");
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
        $this->db->where("(p.cara_bayar = 'AN48QN57' or p.cara_bayar = 'JC93NV93' or p.cara_bayar = 'UJ35AP93')");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->order_by('ps.nama, t.tanggal ');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanPasienRanapSanbe($mulai, $akhir)
    {
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where("(l.produsen='SANBE FARMA' )");
        $this->db->where("(p.cara_bayar = 'AN48QN57' or p.cara_bayar = 'JC93NV93' or p.cara_bayar = 'UJ35AP93')");
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->order_by('ps.nama, t.tanggal ');
        return $this->db->get()->result();
    }

    //LAPORAN_PASIEN_POLI

    public function selectRangeLaporanPasienRajal($mulai, $akhir)
    {
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where("(p.cara_bayar = 'AN48QN57' or p.cara_bayar = 'JC93NV93' or p.cara_bayar = 'UJ35AP93')");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->order_by('t.tanggal ');
        return $this->db->get()->result();
    }

    public function selectLaporanPasienRajal()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.tipe,l.produsen,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan h , pasien ps, dokter d, cara_bayar c, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(h.jenis_pelayanan='UGD' or h.jenis_pelayanan='POLI' )");
        $this->db->where("(p.cara_bayar = 'AN48QN57' or p.cara_bayar = 'JC93NV93' or p.cara_bayar = 'UJ35AP93')");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->order_by('t.tanggal ');
        return $this->db->get()->result();
    }


    //igd
    public function selectLaporanPasienIgd()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.tipe,l.produsen, l.distributor, l.kode, l.standar,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ugd h , pasien ps, dokter d, cara_bayar c,resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(p.cara_bayar = 'AN48QN57' or p.cara_bayar = 'JC93NV93' or p.cara_bayar = 'UJ35AP93')");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->like(' p.tgl_masuk ', $tgl);
        $this->db->order_by('t.tanggal ');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanPasienIgd($mulai, $akhir)
    {
        $this->db->select('ps.nama pasien,ps.no_rm,c.nama caraBayar, ps.jenis_kelamin,d.nama dokter, l.nama,l.golongan_obat,l.tipe,l.produsen, l.standar, l.kode, l.distributor,t.harga, t.margin, t.frek ,t.frek total, t.total total_jual,p.tgl_masuk,t.tanggal,t.keterangan,t.hna, t.disc');
        $this->db->from('list_logistik l, tindakan_farmasi t, pelayanan p, history_pelayanan_ugd h , pasien ps, dokter d, cara_bayar c, resep_obat r');
        $this->db->where('p.id_pelayanan=r.id_pelayanan');
        $this->db->where('t.id_resep=r.id_resep');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('ps.no_rm=p.id_pasien');
        $this->db->where('d.id_dokter=h.dpjp');
        $this->db->where('l.id_logistik=t.id_list_tindakan');
        $this->db->where("(p.cara_bayar = 'AN48QN57' or p.cara_bayar = 'JC93NV93' or p.cara_bayar = 'UJ35AP93')");
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where_not_in('l.id_logistik', 'setrip1');
        $this->db->where('p.tgl_masuk >=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->order_by('t.tanggal ');
        return $this->db->get()->result();
    }
    public function selectSEP($id_pelayanan)
    {
        $this->db->select('u.sep, g.file_path');
        $this->db->from('upload_sep u , general_concent g, pelayanan p');
        $this->db->where('u.id_pelayanan=p.id_pelayanan');
        $this->db->where('p.id_pasien=g.no_rm');
        $this->db->where('u.id_pelayanan', $id_pelayanan);

        return $this->db->get()->result_array();
    }
}
