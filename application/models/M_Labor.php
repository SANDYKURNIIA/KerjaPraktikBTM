<?php

class M_Labor extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }

    /////////////////////////////////////////////////// Ranap
    public function selectDataPasienRanap()
    {
        $this->db->order_by('tgl_request', 'DESC');
        $this->db->where('status', '1');
        $this->db->where_not_in('status', '2');
        // $this->db->where('status_labor','1');
        $this->db->from('v_rawatinap_labor');
        return $this->db->get()->result();
    }

    ///////////////////////////////////////////////////  Rajal
    public function selectDataPasienRawatJalan()
    {
        $query = $this->db->query("SELECT *
        FROM v_rawat_jalan_labor
        where status = 1 and status_labor = 1
        and poli !='LABOR'
        and status_rawat !='selesai'
        and id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)
        order by tgl_request desc
        ");
        return $query->result();
    }

    public function selectDataPasienMcu()
    {
        $query = $this->db->query("SELECT * FROM (SELECT m.*, f.tgl_request
        from mcu m, form_labor_mcu f
        where m.id_mcu = f.id_mcu  
        and f.status = 1
        union all
        SELECT m.*, f.tgl_request
        from mcu m, form_labor f
        where m.id_mcu = f.id_pelayanan  
        and f.status = 1) as gabung
        order by tgl_request desc
        ");
        return $query->result();
    }
    public function selectDataPasienMcuById($id)
    {
        $query = $this->db->query("SELECT * FROM (
        SELECT f.id_form_labor,f.diagnosa, f.ringkasan, f.keterangan, f.tgl,f.status,f.id_mcu
        from form_labor_mcu f
        where  f.status = 1
        union all
        SELECT f.id_form_labor,f.diagnosa, f.ringkasan, f.keterangan, f.tgl,f.status,f.id_pelayanan id_mcu
        from form_labor f
        where  f.status = 1) as gabung
        where id_mcu = '$id'
        ");
        return $query->result();
    }

    // END


    /////////////////////////////////////////////////// PASIEN LABOR
    public function selectDataPasienLabor()
    {
        $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  
            FROM v_pasien_labor v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history and v.status = 1");
        return $query->result();
    }

    //function get data di labor

    public function selectDataPasienLabor2()
    {
        $query = $this->db->query("SELECT v.*, t.tgl_request
            FROM v_pasien_labor v, form_labor t
            where v.id_pelayanan = t.id_pelayanan
            and t.status = 1
            group by v.id_pelayanan
            order by t.tgl_request desc");
        return $query->result();
    }

    public function selectDataPasienLaborBy_id($id_pelayanan, $id_history)
    {
        $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));
        $this->db->from('v_pasien_labor');
        return $this->db->get()->result();
    }

    // END

    // Labor
    public function Total_Labor_Byid($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_labor');
        $this->db->where('id_form_labor', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function Total_Labor_Sendiri_Byid($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_labor');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }


    public function getLaborById($id_pelayanan, $id_tindakan_labor)
    {
        $this->db->select('t.*, l.nama');
        $this->db->from('tindakan_labor t, list_tindakan_labor l, pelayanan p');
        $this->db->where('t.id_list_tindakan=l.id_daftar_tindakan');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->where('t.id_tindakan_labor', $id_tindakan_labor);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function selectNamaLabor()
    {
        $this->db->select('DISTINCT(nama), id_daftar_tindakan, harga');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe_kamar', 'KELAS III');
        $this->db->from('list_tindakan_labor');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }

    public function insert_tindakan($page_data, $table)
    {
        $this->db->insert($table, $page_data);
    }

    public function delete_labor($id_tindakan_labor)
    {
        $this->db->where('id_tindakan_labor', $id_tindakan_labor);
        $this->db->delete('tindakan_labor');
    }

    public function selectDataLaborById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_labor t, list_tindakan_labor l, pelayanan p, staff s');
        $this->db->where('t.id_list_tindakan=l.id_daftar_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_form_labor', $id_pelayanan);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }
    public function selectDataLaborSendiriById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_labor t, list_tindakan_labor l, pelayanan p, staff s');
        $this->db->where('t.id_list_tindakan=l.id_daftar_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }
    public function selectDataLaborMcuById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_labor_mcu t, list_tindakan_labor_mcu l, mcu p, staff s');
        $this->db->where('t.id_daftar_tindakan=l.id_daftar_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('p.id_mcu=t.id_mcu');
        $this->db->where('t.id_form_labor', $id_pelayanan);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function insert_labor($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // Insert Tindakan Laboratorium Request
    public function insert_labor_request($id_tindakan_labor, $data)
    {
        $this->db->where('id_form_labor', $id_tindakan_labor);
        $this->db->update('form_labor', $data);
    }

    // Laporan Labor
    public function selectDataLaporanLabor()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT pas.nama,pas.no_rm, c.nama caraBayar, l.nama tindakan, l.harga_cost, t.harga, t.frek, t.tanggal, t.total
        FROM pelayanan p, pasien pas, cara_bayar c, tindakan_labor t, list_tindakan_labor l
        WHERE l.id_daftar_tindakan=t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and c.id_cara_bayar=p.cara_bayar 
        AND pas.no_rm=p.id_pasien
        and t.tanggal like '%$tgl%'
        UNION 
        SELECT pas.nama,pas.no_rm, p.perusahaan caraBayar, l.nama tindakan, l.harga_cost, t.harga, t.frek, t.tanggal, t.total
        FROM mcu p, pasien pas, tindakan_labor_mcu t, list_tindakan_labor l
        WHERE l.id_daftar_tindakan=t.id_daftar_tindakan and p.id_mcu=t.id_mcu 
        AND pas.no_rm=p.no_rm
        and t.tanggal like '%$tgl%'
        ORDER by tanggal desc ");
        return $hasil->result();
    }

    public function selectDataRangeLaporanLabor($mulai, $akhir)
    {
        $hasil = $this->db->query("SELECT pas.nama,pas.no_rm, c.nama caraBayar, l.nama tindakan, l.harga_cost, t.harga, t.frek, t.tanggal, t.total
        FROM pelayanan p, pasien pas, cara_bayar c, tindakan_labor t, list_tindakan_labor l
        WHERE l.id_daftar_tindakan=t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan and c.id_cara_bayar=p.cara_bayar 
        AND pas.no_rm=p.id_pasien
        and t.tanggal >= '$mulai' and t.tanggal<='$akhir'
        UNION 
        SELECT pas.nama,pas.no_rm, p.perusahaan caraBayar, l.nama tindakan, l.harga_cost, t.harga, t.frek, t.tanggal, t.total
        FROM mcu p, pasien pas, tindakan_labor_mcu t, list_tindakan_labor l
        WHERE l.id_daftar_tindakan=t.id_daftar_tindakan and p.id_mcu=t.id_mcu 
        AND pas.no_rm=p.no_rm
        and t.tanggal >= '$mulai' and t.tanggal<='$akhir'
        ORDER by tanggal desc ");
        return $hasil->result();
    }

    // Laporan Tindakan Labor
    public function selectDataLaporanTindakanLabor()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(l.id_daftar_tindakan) jml, l.nama tindakan, sum(t.total) total ');
        $this->db->from('pelayanan p, pasien pas, cara_bayar c, tindakan_labor t, list_tindakan_labor l');
        $this->db->where('l.id_daftar_tindakan=t.id_list_tindakan');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('pas.no_rm=p.id_pasien');
        $this->db->like('t.tanggal', $tgl);
        $this->db->group_by('l.id_daftar_tindakan');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }

    public function selectDataRangeLaporanTindakanLabor($mulai, $akhir)
    {
        $this->db->select('count(l.id_daftar_tindakan) jml, l.nama tindakan, sum(t.total) total ');
        $this->db->from('pelayanan p, pasien pas, cara_bayar c, tindakan_labor t, list_tindakan_labor l');
        $this->db->where('l.id_daftar_tindakan=t.id_list_tindakan');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('c.id_cara_bayar=p.cara_bayar');
        $this->db->where('pas.no_rm=p.id_pasien');
        $this->db->where('t.tanggal >= ', $mulai);
        $this->db->where('t.tanggal <= ', $akhir);
        $this->db->group_by('l.id_daftar_tindakan');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }

    //Riwayat Pasien
    public function selectDataRiwayatLabor()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT p.alamat,b.id_pelayanan,h.id_history,c.id_cara_bayar,h.nama_poli,h.dpjp, h.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar, pl.nama poli 
        FROM pasien p, pelayanan b, history_pelayanan h, cara_bayar c, list_poli pl, dokter dok 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar AND pl.id_list_poli=h.nama_poli and h.dpjp=dok.id_dokter and h.jenis_pelayanan='POLI' and b.status_rawat='selesai'
        and  p.no_rm not like '-999%' and  p.no_rm not like '-0099%'
        and b.tgl_masuk like '$tgl%'
        UNION 
        SELECT p.alamat,b.id_pelayanan,h.id_history,c.id_cara_bayar,h.nama_poli,h.dpjp, h.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,'-' 
        FROM pasien p, pelayanan b, history_pelayanan h, cara_bayar c , dokter dok 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar and h.dpjp=dok.id_dokter and h.jenis_pelayanan='UGD'  and b.status_rawat='selesai'
        and  p.no_rm not like '-999%' and  p.no_rm not like '-0099%'
        and b.tgl_masuk like '$tgl%'
        UNION
        SELECT p.alamat,b.id_pelayanan,h.id_history,c.id_cara_bayar,h.id_kamar,h.dpjp, h.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,r.tipe poli 
        FROM pasien p, pelayanan b, history_pelayanan h, cara_bayar c,  ruangan r, dokter dok 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar and r.id_ruangan=h.id_kamar and h.dpjp=dok.id_dokter and h.jenis_pelayanan='RAWAT INAP' and b.status_rawat='selesai'
        and  p.no_rm not like '-999%' and  p.no_rm not like '-0099%'
        and b.tgl_masuk like '$tgl%'
         
        ORDER by tgl_masuk desc ");
        return $hasil->result();
    }

    public function selectDataRiwayatLaborRange($mulai, $akhir)
    {
        $hasil = $this->db->query("SELECT p.alamat,b.id_pelayanan,h.id_history,c.id_cara_bayar,h.nama_poli,h.dpjp, h.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar, pl.nama poli 
        FROM pasien p, pelayanan b, history_pelayanan h, cara_bayar c, list_poli pl, dokter dok 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar AND pl.id_list_poli=h.nama_poli and h.dpjp=dok.id_dokter and h.jenis_pelayanan='POLI' and b.status_rawat='selesai'
        and  p.no_rm not like '-999%' and  p.no_rm not like '-0099%'
        and b.tgl_masuk >= '$mulai' and b.tgl_masuk <= '$akhir'
        UNION 
        SELECT p.alamat,b.id_pelayanan,h.id_history,c.id_cara_bayar,h.nama_poli,h.dpjp, h.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,'-' 
        FROM pasien p, pelayanan b, history_pelayanan h, cara_bayar c , dokter dok 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar and h.dpjp=dok.id_dokter and h.jenis_pelayanan='UGD'  and b.status_rawat='selesai'
        and  p.no_rm not like '-999%' and  p.no_rm not like '-0099%'
        and b.tgl_masuk >= '$mulai' and b.tgl_masuk <= '$akhir'
        UNION
        SELECT p.alamat,b.id_pelayanan,h.id_history,c.id_cara_bayar,h.id_kamar,h.dpjp, h.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,r.tipe poli 
        FROM pasien p, pelayanan b, history_pelayanan h, cara_bayar c,  ruangan r, dokter dok 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar and r.id_ruangan=h.id_kamar and h.dpjp=dok.id_dokter and h.jenis_pelayanan='RAWAT INAP' and b.status_rawat='selesai'
        and  p.no_rm not like '-999%' and  p.no_rm not like '-0099%'
        and b.tgl_masuk >= '$mulai' and b.tgl_masuk <= '$akhir' 
         
        ORDER by tgl_masuk desc ");
        return $hasil->result();
    }

    public function selectDataFormById_Labor($id_tindakan)
    {
        $this->db->select('t.*, l.nama');
        $this->db->from('tindakan_labor t, list_tindakan_labor l');
        $this->db->where('t.id_list_tindakan=l.id_daftar_tindakan');
        $this->db->where('t.id_tindakan_labor', $id_tindakan);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }


    // Print

    public function Labor_PrintById_Rajal($id_tindakan_labor)
    {
        $this->db->select('t.*, l.nama, pa.nama pasien, pa.jenis_kelamin, p.id_pasien, r.nama cara_bayar');
        $this->db->from('tindakan_labor t, list_tindakan_labor l, pelayanan p, pasien pa, cara_bayar r');
        $this->db->where('t.id_list_tindakan=l.id_daftar_tindakan');
        $this->db->where('pa.no_rm=p.id_pasien');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('p.cara_bayar=r.id_cara_bayar');
        $this->db->where('t.id_tindakan_labor', $id_tindakan_labor);
        $this->db->order_by('t.tanggal', 'desc');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function Labor_PrintById_All($id_pelayanan)
    {
        $this->db->select('t.*, l.nama, pa.nama pasien, pa.jenis_kelamin, p.id_pasien, r.nama cara_bayar');
        $this->db->from('tindakan_labor t, list_tindakan_labor l, pelayanan p, pasien pa, cara_bayar r');
        $this->db->where('t.id_list_tindakan=l.id_daftar_tindakan');
        $this->db->where('pa.no_rm=p.id_pasien');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('p.cara_bayar=r.id_cara_bayar');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function Labor_PrintById_All2($id_pelayanan)
    {
        $this->db->select('t.*, l.nama, pa.nama pasien, pa.jenis_kelamin, p.id_pasien, r.nama cara_bayar');
        $this->db->from('tindakan_labor t, list_tindakan_labor l, pelayanan p, pasien pa, cara_bayar r');
        $this->db->where('t.id_list_tindakan=l.id_daftar_tindakan');
        $this->db->where('pa.no_rm=p.id_pasien');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('p.cara_bayar=r.id_cara_bayar');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->order_by('t.tanggal');
        $query = $this->db->get();
        return $query->row_array();
    }

    // public function Labor_PrintById_All3($id_pelayanan){
    //     $this->db->select('t.*, l.nama, pa.nama pasien, pa.jenis_kelamin, p.id_pasien, p.status_rawat');
    //     $this->db->from('tindakan_labor t, list_tindakan_labor l, pelayanan p, pasien pa');
    //     $this->db->where('t.id_list_tindakan=l.id_daftar_tindakan');
    //     $this->db->where('pa.no_rm=p.id_pasien');
    //     $this->db->where('p.id_pelayanan=t.id_pelayanan');
    //     $this->db->where('t.id_pelayanan',$id_pelayanan);
    //     $this->db->order_by('t.tanggal_req');
    //     $query = $this->db->get();
    //     return $query->row_array();
    // }
    public function cekJumTindakan($id_pelayanan)
    {
        $this->db->select('id_tindakan_labor');
        $this->db->from('tindakan_labor');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function selectTindakanLabor()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query = $this->db->query(
            "SELECT count(l.id_daftar_tindakan) jml, l.nama tindakan,l.tipe_kamar kamar, l.harga,  sum(t.total) total 
            FROM pelayanan p, pasien pas, cara_bayar c, tindakan_labor t, list_tindakan_labor l
            WHERE l.id_daftar_tindakan=t.id_list_tindakan 
            AND p.id_pelayanan=t.id_pelayanan 
            AND c.id_cara_bayar=p.cara_bayar 
            AND pas.no_rm=p.id_pasien 
            AND t.tanggal LIKE '%$tgl%' 
            GROUP BY l.nama ORDER by l.nama "
        );
        return $query->result();
    }
    public function selectRangeTindakanLabor($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query = $this->db->query(
            "SELECT count(l.id_daftar_tindakan) jml, l.nama tindakan, l.tipe_kamar kamar,  l.harga, sum(t.total) total 
            FROM pelayanan p, pasien pas, cara_bayar c, tindakan_labor t, list_tindakan_labor l 
            WHERE l.id_daftar_tindakan=t.id_list_tindakan 
            AND p.id_pelayanan=t.id_pelayanan 
            AND c.id_cara_bayar=p.cara_bayar 
            AND pas.no_rm=p.id_pasien 
            AND t.tanggal >= '$mulai'
            AND t.tanggal <= '$akhir' 
            GROUP BY l.nama ORDER by l.nama "
        );
        return $query->result();
    }
    public function selectLaporanLaboratorium()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query = $this->db->query(
            "SELECT pas.nama,pas.no_rm, c.nama caraBayar, l.nama tindakan, l.harga_cost, t.harga, t.frek, t.tanggal, t.total 
            FROM pelayanan p, pasien pas, cara_bayar c, tindakan_labor t, list_tindakan_labor l 
            WHERE l.id_daftar_tindakan=t.id_list_tindakan 
            AND p.id_pelayanan=t.id_pelayanan 
            AND c.id_cara_bayar=p.cara_bayar 
            AND pas.no_rm=p.id_pasien  
            AND t.tanggal like '%$tgl%' ORDER by t.tanggal"
        );
        return $query->result();
    }
    public function selectRangeLaporanLaboratorium($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query = $this->db->query(
            "SELECT pas.nama,pas.no_rm, c.nama caraBayar, l.nama tindakan, l.harga_cost, t.harga, t.frek, t.tanggal, t.total 
            FROM pelayanan p, pasien pas, cara_bayar c, tindakan_labor t, list_tindakan_labor l 
            WHERE l.id_daftar_tindakan=t.id_list_tindakan 
            AND p.id_pelayanan=t.id_pelayanan 
            AND c.id_cara_bayar=p.cara_bayar 
            AND pas.no_rm=p.id_pasien  
            AND t.tanggal >= '$mulai'
            AND t.tanggal <= '$akhir' 
            ORDER by t.tanggal"
        );
        return $query->result();
    }
    public function update($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function selectLaporanKunjunganLabor()
    {
        $tgl = date("Y-m-d");
        $this->db->select('date(p.tgl_masuk) tgl_masuk');
        $this->db->from(' pelayanan p');
        $this->db->like('p.tgl_masuk', $tgl);
        $this->db->group_by('date(p.tgl_masuk)');
        return $this->db->get()->result();
    }
    public function selectRangeLaporanKunjunganLabor($mulai, $akhir)
    {
        $tgl = date("Y-m-d");
        $this->db->select('date(p.tgl_masuk) tgl_masuk');
        $this->db->from(' pelayanan p');
        // $this->db->join(' tindakan_labor t',' d.dokter_spes = l.kdpoli_bpjs');
        $this->db->where('p.tgl_masuk>=', $mulai);
        $this->db->where('p.tgl_masuk<=', $akhir);
        //$this->db->join(' v_kunjungan v', ' v.dpjp = d.id_dokter','left');
        $this->db->group_by('date(p.tgl_masuk)');
        return $this->db->get()->result();
    }
    public function getJumlahPasienLabor($jenis, $tgl)
    {
        return $this->db->query("SELECT COUNT(t.id_pelayanan) total
        FROM pelayanan p, form_labor t, cara_bayar c, history_pelayanan h
        WHERE p.id_pelayanan=t.id_pelayanan 
        and p.cara_bayar=c.id_cara_bayar 
        and p.id_pelayanan=h.id_pelayanan 
        AND p.status = 1
        AND h.status = 1
        AND t.status != 0
        AND p.tgl_masuk like '%$tgl%'
        and c.jenis = '$jenis' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status=1)")->row();
    }

    public function getRangeJumlahPasienLabor($jenis, $mulai, $akhir)
    {
        return $this->db->query("SELECT COUNT(t.id_pelayanan) total
        FROM pelayanan p, form_labor t, cara_bayar c, history_pelayanan h
        WHERE p.id_pelayanan=t.id_pelayanan 
        and p.cara_bayar=c.id_cara_bayar 
        and p.id_pelayanan=h.id_pelayanan 
        AND p.status = 1
        AND h.status = 1
        AND t.status != 0
        AND p.tgl_masuk >= '$mulai' and p.tgl_masuk<='$akhir'
        and c.jenis = '$jenis' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status=1)")->row();
    }

    public function selectLaporanKunjunganLaborIgd()
    {
        $tgl = date("Y-m-d");
        $this->db->select('date(p.tgl_masuk) tgl_masuk');
        $this->db->from(' pelayanan p');
        $this->db->like('p.tgl_masuk', $tgl);
        $this->db->group_by('date(p.tgl_masuk)');
        return $this->db->get()->result();
    }
    public function selectRangeLaporanKunjunganLaborIgd($mulai, $akhir)
    {
        $tgl = date("Y-m-d");
        $this->db->select('date(p.tgl_masuk) tgl_masuk');
        $this->db->from(' pelayanan p');
        // $this->db->join(' tindakan_labor t',' d.dokter_spes = l.kdpoli_bpjs');
        $this->db->where('p.tgl_masuk>=', $mulai);
        $this->db->where('p.tgl_masuk<=', $akhir);
        //$this->db->join(' v_kunjungan v', ' v.dpjp = d.id_dokter','left');
        $this->db->group_by('date(p.tgl_masuk)');
        return $this->db->get()->result();
    }
    public function getJumlahPasienLaborIgd($jenis, $tgl)
    {
        return $this->db->query("SELECT COUNT(t.id_pelayanan) total
        FROM pelayanan p, form_labor t, cara_bayar c, history_pelayanan_ugd h
        WHERE p.id_pelayanan=t.id_pelayanan 
        and p.cara_bayar=c.id_cara_bayar 
        and p.id_pelayanan=h.id_pelayanan 
        AND p.status = 1
        AND h.status = 1
        AND t.status != 0
        AND p.tgl_masuk like '%$tgl%'
        and c.jenis = '$jenis' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status=1)")->row();
    }

    public function getRangeJumlahPasienLaborIgd($jenis, $mulai, $akhir)
    {
        return $this->db->query("SELECT COUNT(t.id_pelayanan) total
        FROM pelayanan p, form_labor t, cara_bayar c, history_pelayanan_ugd h
        WHERE p.id_pelayanan=t.id_pelayanan 
        and p.cara_bayar=c.id_cara_bayar 
        and p.id_pelayanan=h.id_pelayanan 
        AND p.status = 1
        AND h.status = 1
        AND t.status != 0
        AND p.tgl_masuk >= '$mulai' and p.tgl_masuk<='$akhir'
        and c.jenis = '$jenis' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status=1)")->row();
    }

    public function selectLaporanKunjunganLaborMcu()
    {
       date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query = $this->db->query(
            "SELECT 
    date(p.tanggal) AS tanggal,
    SUM(CASE WHEN c.jenis = 'BPJS' THEN 1 ELSE 0 END) AS BPJS,
    SUM(CASE WHEN c.jenis = 'UMUM' THEN 1 ELSE 0 END) AS UMUM,
    SUM(CASE WHEN c.jenis = 'TIMAH' THEN 1 ELSE 0 END) AS TIMAH,
    SUM(CASE WHEN c.jenis = 'MITRA' THEN 1 ELSE 0 END) AS PERUSAHAAN_MITRA,
    SUM(CASE WHEN c.jenis = 'INTERNAL' THEN 1 ELSE 0 END) AS INTERNAL_RSBT,
    SUM(CASE WHEN c.jenis = 'LAINNYA' THEN 1 ELSE 0 END) AS ASURANSI_LAIN,
    sum(t.total) AS pendapatan
FROM 
    mcu p
JOIN 
    form_labor f ON p.id_mcu = f.id_pelayanan
JOIN 
    tindakan_labor_mcu t ON p.id_mcu = t.id_mcu
JOIN 
    cara_bayar c ON p.cara_bayar = c.id_cara_bayar
WHERE 
    f.status != 0
    AND p.tanggal LIKE '%$tgl%'
GROUP BY 
    date(p.tanggal)
ORDER BY 
    p.tanggal"
        );
        return $query->result();
    }
    public function selectRangeLaporanKunjunganLaborMcu($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query = $this->db->query(
            "SELECT 
    date(p.tanggal) tanggal,
    SUM(CASE WHEN c.jenis = 'BPJS' THEN 1 ELSE 0 END) AS BPJS,
    SUM(CASE WHEN c.jenis = 'UMUM' THEN 1 ELSE 0 END) AS UMUM,
    SUM(CASE WHEN c.jenis = 'TIMAH' THEN 1 ELSE 0 END) AS TIMAH,
    SUM(CASE WHEN c.jenis = 'MITRA' THEN 1 ELSE 0 END) AS PERUSAHAAN_MITRA,
    SUM(CASE WHEN c.jenis = 'INTERNAL' THEN 1 ELSE 0 END) AS INTERNAL_RSBT,
    SUM(CASE WHEN c.jenis = 'LAINNYA' THEN 1 ELSE 0 END) AS ASURANSI_LAIN,
    sum(t.total) pendapatan
FROM 
    mcu p
JOIN 
    form_labor f ON p.id_mcu = f.id_pelayanan
JOIN 
    tindakan_labor_mcu t ON p.id_mcu = t.id_mcu
JOIN 
    cara_bayar c ON p.cara_bayar = c.id_cara_bayar
WHERE 
    f.status != 0
    AND p.tanggal BETWEEN '$mulai' AND '$akhir'
GROUP BY 
    date(p.tanggal)
ORDER BY 
    p.tanggal"
        );
        return $query->result();
    }
    public function getJumlahPasienLaborMcu($jenis, $tgl)
    {
        return $this->db->query("SELECT COUNT(t.id_pelayanan) total
        FROM mcu p, form_labor t, cara_bayar c
        WHERE p.id_mcu=t.id_pelayanan 
        and p.cara_bayar=c.id_cara_bayar 
        AND t.status != 0
        AND p.tanggal like '%$tgl%'
        and c.jenis = '$jenis'")->row();
    }

    public function getRangeJumlahPasienLaborMcu($jenis, $mulai, $akhir)
    {
        return $this->db->query("SELECT COUNT(t.id_pelayanan) total
        FROM mcu p, form_labor t, cara_bayar c
        WHERE p.id_mcu=t.id_pelayanan 
        and p.cara_bayar=c.id_cara_bayar 
        AND t.status != 0
        AND p.tanggal >= '$mulai' and p.tanggal<='$akhir'
        and c.jenis = '$jenis'")->row();
    }

    public function selectLaporanKunjunganLaborRanap()
    {
        $tgl = date("Y-m-d");
        $this->db->select('date(p.tgl_masuk) tgl_masuk');
        $this->db->from(' pelayanan p');
        $this->db->like('p.tgl_masuk', $tgl);
        $this->db->group_by('date(p.tgl_masuk)');
        return $this->db->get()->result();
    }
    public function selectRangeLaporanKunjunganLaborRanap($mulai, $akhir)
    {
        $tgl = date("Y-m-d");
        $this->db->select('date(p.tgl_masuk) tgl_masuk');
        $this->db->from(' pelayanan p');
        // $this->db->join(' tindakan_labor t',' d.dokter_spes = l.kdpoli_bpjs');
        $this->db->where('p.tgl_masuk>=', $mulai);
        $this->db->where('p.tgl_masuk<=', $akhir);
        //$this->db->join(' v_kunjungan v', ' v.dpjp = d.id_dokter','left');
        $this->db->group_by('date(p.tgl_masuk)');
        return $this->db->get()->result();
    }
    public function getJumlahPasienLaborRanap($jenis, $tgl)
    {
        return $this->db->query("SELECT COUNT(t.id_pelayanan) total
        FROM pelayanan p, form_labor t, cara_bayar c, history_pelayanan_ranap h
        WHERE p.id_pelayanan=t.id_pelayanan 
        and p.cara_bayar=c.id_cara_bayar 
        and p.id_pelayanan=h.id_pelayanan 
        AND p.status = 1
        AND h.status = 1
        AND t.status != 0
        AND p.tgl_masuk like '%$tgl%'
        and c.jenis = '$jenis' ")->row();
    }

    public function getRangeJumlahPasienLaborRanap($jenis, $mulai, $akhir)
    {
        return $this->db->query("SELECT COUNT(t.id_pelayanan) total
        FROM pelayanan p, form_labor t, cara_bayar c, history_pelayanan_ugd h
        WHERE p.id_pelayanan=t.id_pelayanan 
        and p.cara_bayar=c.id_cara_bayar 
        and p.id_pelayanan=h.id_pelayanan 
        AND p.status = 1
        AND h.status = 1
        AND t.status != 0
        AND p.tgl_masuk >= '$mulai' and p.tgl_masuk<='$akhir'
        and c.jenis = '$jenis' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status=1)")->row();
    }
    //pendapatan labor
    public function selectLaporanPendapatanLabor()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT tanggal, jml_pemeriksaan, pendapatan from (
            SELECT date(t.tanggal) tanggal, COUNT(t.id_tindakan_labor) jml_pemeriksaan, sum(t.total) pendapatan
            FROM pelayanan p,list_tindakan_labor l, tindakan_labor t, cara_bayar c
            WHERE p.id_pelayanan=t.id_pelayanan and l.id_daftar_tindakan=t.id_list_tindakan and p.cara_bayar=c.id_cara_bayar and p.status_rawat='selesai' and p.status=1 and c.jenis='BPJS'
            UNION 
            SELECT date(t.tanggal) tanggal, COUNT(t.id_tindakan_labor) jml_pemeriksaan, sum(t.total) pendapatan
            FROM pelayanan p,list_tindakan_labor l, tindakan_labor t, cara_bayar c
            WHERE p.id_pelayanan=t.id_pelayanan and l.id_daftar_tindakan=t.id_list_tindakan and p.cara_bayar=c.id_cara_bayar and p.status_rawat='selesai' and p.status=1 and c.jenis='UMUM'
            UNION
            SELECT date(t.tanggal) tanggal, COUNT(t.id_tindakan_labor) jml_pemeriksaan, sum(t.total) pendapatan
            FROM pelayanan p,list_tindakan_labor l, tindakan_labor t, cara_bayar c
            WHERE p.id_pelayanan=t.id_pelayanan and l.id_daftar_tindakan=t.id_list_tindakan and p.cara_bayar=c.id_cara_bayar and p.status_rawat='selesai' and p.status=1 and c.jenis='LAINNYA'
            GROUP by date(t.tanggal))
            AS gabung WHERE tanggal LIKE '%$tgl%' ")->result();
    }

    public function selectRangeLaporanpendapatanLabor($mulai, $akhir, $cara_bayar, $jenis_pelayanan)
    {
        $this->db->select(' date(t.tanggal) tanggal, COUNT(t.id_tindakan_labor) jml_pemeriksaan, sum(t.total)pendapatan ');
        $this->db->from('pelayanan p');
        $this->db->join('tindakan_labor t', 'p.id_pelayanan=t.id_pelayanan');
        $this->db->join('list_tindakan_labor l', 'l.id_daftar_tindakan=t.id_list_tindakan');
        $this->db->join('cara_bayar c', 'p.cara_bayar=c.id_cara_bayar');
        $this->db->where('p.status', 1);
        $this->db->where("(t.tanggal BETWEEN '$mulai' AND '$akhir')");
        if ($jenis_pelayanan == 'RANAP') {
            $this->db->join('history_pelayanan_ranap h', 'p.id_pelayanan=h.id_pelayanan and h.status =1');
        } else {
            $this->db->where("p.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status =1)");
        }
        // $this->db->where('p.status_rawat', 'selesai');
        if ($cara_bayar == 'BPJS') {
            $this->db->where('c.id_cara_bayar', '30');
        } else if ($cara_bayar == 'UMUM') {
            $this->db->where('c.id_cara_bayar', '42');
        } else if ($cara_bayar == 'INTERNAL') {
            $this->db->where('c.jenis', 'INTERNAL');
        } else if ($cara_bayar == 'MITRA') {
            $this->db->where('c.jenis', 'MITRA');
        } else if ($cara_bayar == 'TIMAH') {
            $this->db->where('c.jenis', 'TIMAH');
        } else {
            $this->db->where('c.jenis', 'LAINNYA');
        }


        $this->db->group_by('date(t.tanggal)');
        $this->db->order_by('tanggal', 'desc');

        return $this->db->get()->result();
    }

    //pasien hiv
    public function selectLaporanPasienhiv()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, CONCAT('', ps.no_ktp) as nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='AHIVR' and f.status != 0 and p.tgl_masuk like '%$tgl%'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, CONCAT('', ps.no_ktp) as nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ugd h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='AHIVR' and f.status != 0 and p.tgl_masuk like '%$tgl%'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, CONCAT('', ps.no_ktp) as nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ranap h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='AHIVR' and f.status != 0 and p.tgl_masuk like '%$tgl%'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tanggal) tanggal, p.no_rm ,p.nama_pasien pasien, '' as nik, date(p.tgl_lahir) tgl_lahir, p.sex jenis_kelamin, p.alamat, 'MCU' as jenis_pelayanan, f.id_form_labor, '' as dokter
        FROM mcu p, form_labor_mcu f, tindakan_labor_mcu t
        WHERE p.id_mcu=f.id_mcu and  t.id_form_labor=f.id_form_labor and t.kode_lis ='AHIVR' and f.status != 0 and p.tanggal like '%$tgl%'
        GROUP BY f.id_form_labor ")->result();
    }

    public function selectRangeLaporanPasienhiv($mulai, $akhir)
    {
        return $this->db->query(
            "SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, CONCAT('', ps.no_ktp) as nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='AHIVR' and f.status != 0 and p.tgl_masuk>='$mulai' and p.tgl_masuk<='$akhir'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, CONCAT('', ps.no_ktp) as nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ugd h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='AHIVR' and f.status != 0 and p.tgl_masuk>='$mulai' and p.tgl_masuk<='$akhir'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, CONCAT('', ps.no_ktp) as nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ranap h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='AHIVR' and f.status != 0 and p.tgl_masuk>='$mulai' and p.tgl_masuk<='$akhir'
        GROUP BY f.id_form_labor 
        UNION ALL
        SELECT date(p.tanggal) tanggal, p.no_rm ,p.nama_pasien pasien, '' as nik, date(p.tgl_lahir) tgl_lahir, p.sex jenis_kelamin, p.alamat, 'MCU' as jenis_pelayanan, f.id_form_labor, '' as dokter
        FROM mcu p, form_labor_mcu f, tindakan_labor_mcu t
        WHERE p.id_mcu=f.id_mcu and  t.id_form_labor=f.id_form_labor and t.kode_lis ='AHIVR' and f.status != 0 and p.tanggal >= '$mulai' and p.tanggal<='$akhir' 
        GROUP BY f.id_form_labor
        order by tanggal asc
        "
        )->result();
    }

    public function selectLaporanPasienGram()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, CONCAT('', ps.no_ktp) as nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='PWGR' and f.status != 0 and p.tgl_masuk like '%$tgl%'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, CONCAT('', ps.no_ktp) as nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ugd h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='PWGR' and f.status != 0 and p.tgl_masuk like '%$tgl%'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, CONCAT('', ps.no_ktp) as nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ranap h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='PWGR' and f.status != 0 and p.tgl_masuk like '%$tgl%'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tanggal) tanggal, p.no_rm ,p.nama_pasien pasien, '' as nik, date(p.tgl_lahir) tgl_lahir, p.sex jenis_kelamin, p.alamat, 'MCU' as jenis_pelayanan, f.id_form_labor, '' as dokter
        FROM mcu p, form_labor_mcu f, tindakan_labor_mcu t
        WHERE p.id_mcu=f.id_mcu and  t.id_form_labor=f.id_form_labor and t.kode_lis ='PWGR' and f.status != 0 and p.tanggal like '%$tgl%'
        GROUP BY f.id_form_labor ")->result();
    }

    public function selectRangeLaporanPasienGram($mulai, $akhir)
    {
        return $this->db->query(
            "SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, CONCAT('', ps.no_ktp) as nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='PWGR' and f.status != 0 and p.tgl_masuk>='$mulai' and p.tgl_masuk<='$akhir'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, CONCAT('', ps.no_ktp) as nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ugd h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='PWGR' and f.status != 0 and p.tgl_masuk>='$mulai' and p.tgl_masuk<='$akhir'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, CONCAT('', ps.no_ktp) as nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ranap h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='PWGR' and f.status != 0 and p.tgl_masuk>='$mulai' and p.tgl_masuk<='$akhir'
        GROUP BY f.id_form_labor 
        UNION ALL
        SELECT date(p.tanggal) tanggal, p.no_rm ,p.nama_pasien pasien, '' as nik, date(p.tgl_lahir) tgl_lahir, p.sex jenis_kelamin, p.alamat, 'MCU' as jenis_pelayanan, f.id_form_labor, '' as dokter
        FROM mcu p, form_labor_mcu f, tindakan_labor_mcu t
        WHERE p.id_mcu=f.id_mcu and  t.id_form_labor=f.id_form_labor and t.kode_lis ='PWGR' and f.status != 0 and p.tanggal >= '$mulai' and p.tanggal<='$akhir' 
        GROUP BY f.id_form_labor
        order by tanggal asc
        "
        )->result();
    }

    public function selectLaporanPasienMalaria()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='MALER' and f.status != 0 and p.tgl_masuk like '%$tgl%'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ugd h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='MALER' and f.status != 0 and p.tgl_masuk like '%$tgl%'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ranap h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='MALER' and f.status != 0 and p.tgl_masuk like '%$tgl%'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tanggal) tanggal, p.no_rm ,p.nama_pasien pasien, '' as nik, date(p.tgl_lahir) tgl_lahir, p.sex jenis_kelamin, p.alamat, 'MCU' as jenis_pelayanan, f.id_form_labor, '' as dokter
        FROM mcu p, form_labor_mcu f, tindakan_labor_mcu t
        WHERE p.id_mcu=f.id_mcu and  t.id_form_labor=f.id_form_labor and t.kode_lis ='MALER' and f.status != 0 and p.tanggal like '%$tgl%'
        GROUP BY f.id_form_labor ")->result();
    }

    public function selectRangeLaporanPasienMalaria($mulai, $akhir)
    {
        return $this->db->query(
            "SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='MALER' and f.status != 0 and p.tgl_masuk>='$mulai' and p.tgl_masuk<='$akhir'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ugd h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='MALER' and f.status != 0 and p.tgl_masuk>='$mulai' and p.tgl_masuk<='$akhir'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ranap h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='MALER' and f.status != 0 and p.tgl_masuk>='$mulai' and p.tgl_masuk<='$akhir'
        GROUP BY f.id_form_labor 
        UNION ALL
        SELECT date(p.tanggal) tanggal, p.no_rm ,p.nama_pasien pasien, '' as nik, date(p.tgl_lahir) tgl_lahir, p.sex jenis_kelamin, p.alamat, 'MCU' as jenis_pelayanan, f.id_form_labor, '' as dokter
        FROM mcu p, form_labor_mcu f, tindakan_labor_mcu t
        WHERE p.id_mcu=f.id_mcu and  t.id_form_labor=f.id_form_labor and t.kode_lis ='MALER' and f.status != 0 and p.tanggal >= '$mulai' and p.tanggal<='$akhir' 
        GROUP BY f.id_form_labor
        order by tanggal asc
        "
        )->result();
    }

    public function selectLaporanPasienCovid()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter, c.nama cara_bayar
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan h, dokter d, tindakan_labor t, cara_bayar c
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and c.id_cara_bayar=p.cara_bayar and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='COVIDA' and f.status != 0 and p.tgl_masuk like '%$tgl%'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter, c.nama cara_bayar
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ugd h, dokter d, tindakan_labor t, cara_bayar c
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and c.id_cara_bayar=p.cara_bayar and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='COVIDA' and f.status != 0 and p.tgl_masuk like '%$tgl%'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter, c.nama cara_bayar
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ranap h, dokter d, tindakan_labor t, cara_bayar c
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and c.id_cara_bayar=p.cara_bayar and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='COVIDA' and f.status != 0 and p.tgl_masuk like '%$tgl%'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tanggal) tanggal, p.no_rm ,p.nama_pasien pasien, '' as nik, date(p.tgl_lahir) tgl_lahir, p.sex jenis_kelamin, p.alamat, 'MCU' as jenis_pelayanan, f.id_form_labor, '' as dokter, '-' cara_bayar
        FROM mcu p, form_labor_mcu f, tindakan_labor_mcu t
        WHERE p.id_mcu=f.id_mcu and  t.id_form_labor=f.id_form_labor and t.kode_lis ='COVIDA' and f.status != 0 and p.tanggal like '%$tgl%'
        GROUP BY f.id_form_labor ")->result();
    }

    public function selectRangeLaporanPasienCovid($mulai, $akhir)
    {
        return $this->db->query(
            "SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter,c.nama cara_bayar
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan h, dokter d, tindakan_labor t, cara_bayar c
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and c.id_cara_bayar=p.cara_bayar and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='COVIDA' and f.status != 0 and p.tgl_masuk>='$mulai' and p.tgl_masuk<='$akhir'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter,c.nama cara_bayar
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ugd h, dokter d, tindakan_labor t, cara_bayar c
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and c.id_cara_bayar=p.cara_bayar and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='COVIDA' and f.status != 0 and p.tgl_masuk>='$mulai' and p.tgl_masuk<='$akhir'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter,c.nama cara_bayar
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ranap h, dokter d, tindakan_labor t, cara_bayar c
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and c.id_cara_bayar=p.cara_bayar and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='COVIDA' and f.status != 0 and p.tgl_masuk>='$mulai' and p.tgl_masuk<='$akhir'
        GROUP BY f.id_form_labor 
        UNION ALL
        SELECT date(p.tanggal) tanggal, p.no_rm ,p.nama_pasien pasien, '' as nik, date(p.tgl_lahir) tgl_lahir, p.sex jenis_kelamin, p.alamat, 'MCU' as jenis_pelayanan, f.id_form_labor, '' as dokter, '-' cara_bayar
        FROM mcu p, form_labor_mcu f, tindakan_labor_mcu t
        WHERE p.id_mcu=f.id_mcu and  t.id_form_labor=f.id_form_labor and t.kode_lis ='COVIDA' and f.status != 0 and p.tanggal >= '$mulai' and p.tanggal<='$akhir' 
        GROUP BY f.id_form_labor
        order by tanggal asc
        "
        )->result();
    }

    public function selectLaporanPasienBta()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter, t.nama_tindakan
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and (t.kode_lis ='BTA1' or t.kode_lis ='BTAS3X') and f.status != 0 and p.tgl_masuk like '%$tgl%'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter, t.nama_tindakan
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ugd h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and (t.kode_lis ='BTA1' or t.kode_lis ='BTAS3X') and f.status != 0 and p.tgl_masuk like '%$tgl%'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter, t.nama_tindakan
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ranap h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and (t.kode_lis ='BTA1' or t.kode_lis ='BTAS3X') and f.status != 0 and p.tgl_masuk like '%$tgl%'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tanggal) tanggal, p.no_rm ,p.nama_pasien pasien, '' as nik, date(p.tgl_lahir) tgl_lahir, p.sex jenis_kelamin, p.alamat, 'MCU' as jenis_pelayanan, f.id_form_labor, '' as dokter, t.nama_tindakan
        FROM mcu p, form_labor_mcu f, tindakan_labor_mcu t
        WHERE p.id_mcu=f.id_mcu and  t.id_form_labor=f.id_form_labor and (t.kode_lis ='BTA1' or t.kode_lis ='BTAS3X') and f.status != 0 and p.tanggal like '%$tgl%'
        GROUP BY f.id_form_labor ")->result();
    }

    public function selectRangeLaporanPasienBta($mulai, $akhir)
    {
        return $this->db->query(
            "SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter, t.nama_tindakan
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and (t.kode_lis ='BTA1' or t.kode_lis ='BTAS3X') and f.status != 0 and p.tgl_masuk>='$mulai' and p.tgl_masuk<='$akhir'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter, t.nama_tindakan
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ugd h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and (t.kode_lis ='BTA1' or t.kode_lis ='BTAS3X') and f.status != 0 and p.tgl_masuk>='$mulai' and p.tgl_masuk<='$akhir'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter, t.nama_tindakan
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ranap h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and (t.kode_lis ='BTA1' or t.kode_lis ='BTAS3X') and f.status != 0 and p.tgl_masuk>='$mulai' and p.tgl_masuk<='$akhir'
        GROUP BY f.id_form_labor 
        UNION ALL
        SELECT date(p.tanggal) tanggal, p.no_rm ,p.nama_pasien pasien, '' as nik, date(p.tgl_lahir) tgl_lahir, p.sex jenis_kelamin, p.alamat, 'MCU' as jenis_pelayanan, f.id_form_labor, '' as dokter, t.nama_tindakan
        FROM mcu p, form_labor_mcu f, tindakan_labor_mcu t
        WHERE p.id_mcu=f.id_mcu and  t.id_form_labor=f.id_form_labor and (t.kode_lis ='BTA1' or t.kode_lis ='BTAS3X') and f.status != 0 and p.tanggal >= '$mulai' and p.tanggal<='$akhir' 
        GROUP BY f.id_form_labor
        order by tanggal asc
        "
        )->result();
    }

    public function selectLaporanPasienBiopsi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='BIOPK' and f.status != 0 and p.tgl_masuk like '%$tgl%'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ugd h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='BIOPK' and f.status != 0 and p.tgl_masuk like '%$tgl%'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ranap h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='BIOPK' and f.status != 0 and p.tgl_masuk like '%$tgl%'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tanggal) tanggal, p.no_rm ,p.nama_pasien pasien, '' as nik, date(p.tgl_lahir) tgl_lahir, p.sex jenis_kelamin, p.alamat, 'MCU' as jenis_pelayanan, f.id_form_labor, '' as dokter
        FROM mcu p, form_labor_mcu f, tindakan_labor_mcu t
        WHERE p.id_mcu=f.id_mcu and  t.id_form_labor=f.id_form_labor and t.kode_lis ='BIOPK' and f.status != 0 and p.tanggal like '%$tgl%'
        UNION ALL
        SELECT date(p.tanggal) tanggal, p.no_rm ,p.nama_pasien pasien, '' as nik, date(p.tgl_lahir) tgl_lahir, p.sex jenis_kelamin, p.alamat, 'MCU' as jenis_pelayanan, f.id_form_labor, '' as dokter
        FROM mcu p, form_labor f, tindakan_labor_mcu t
        WHERE p.id_mcu=f.id_pelayanan and t.id_form_labor=f.id_form_labor and t.kode_lis ='BIOPK' and f.status != 0 and p.tanggal like '%$tgl%'
        GROUP BY f.id_form_labor ")->result();
    }

    public function selectRangeLaporanPasienBiopsi($mulai, $akhir)
    {
        return $this->db->query(
            "SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='BIOPK' and f.status != 0 and p.tgl_masuk>='$mulai' and p.tgl_masuk<='$akhir'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ugd h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='BIOPK' and f.status != 0 and p.tgl_masuk>='$mulai' and p.tgl_masuk<='$akhir'
        GROUP BY f.id_form_labor
        UNION ALL
        SELECT date(p.tgl_masuk) tanggal, ps.no_rm ,ps.nama pasien, ps.no_ktp nik, date(ps.tgl_lahir) tgl_lahir, ps.jenis_kelamin, ps.alamat, h.jenis_pelayanan, f.id_form_labor, d.nama dokter
        FROM pelayanan p, pasien ps,form_labor f, history_pelayanan_ranap h, dokter d, tindakan_labor t
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pelayanan=f.id_pelayanan and h.id_history=f.id_history and h.dpjp=d.id_dokter and p.id_pasien=ps.no_rm and f.id_form_labor=t.id_form_labor and t.kode_lis ='BIOPK' and f.status != 0 and p.tgl_masuk>='$mulai' and p.tgl_masuk<='$akhir'
        GROUP BY f.id_form_labor 
        UNION ALL
        SELECT date(p.tanggal) tanggal, p.no_rm ,p.nama_pasien pasien, '' as nik, date(p.tgl_lahir) tgl_lahir, p.sex jenis_kelamin, p.alamat, 'MCU' as jenis_pelayanan, f.id_form_labor, '' as dokter
        FROM mcu p, form_labor_mcu f, tindakan_labor_mcu t
        WHERE p.id_mcu=f.id_mcu and  t.id_form_labor=f.id_form_labor and t.kode_lis ='BIOPK' and f.status != 0 and p.tanggal >= '$mulai' and p.tanggal<='$akhir' 
        UNION ALL
        SELECT date(p.tanggal) tanggal, p.no_rm ,p.nama_pasien pasien, '' as nik, date(p.tgl_lahir) tgl_lahir, p.sex jenis_kelamin, p.alamat, 'MCU' as jenis_pelayanan, f.id_form_labor, '' as dokter
        FROM mcu p, form_labor f, tindakan_labor_mcu t
        WHERE p.id_mcu=f.id_pelayanan and t.id_form_labor=f.id_form_labor and t.kode_lis ='BIOPK' and f.status != 0 and p.tanggal >= '$mulai' and p.tanggal<='$akhir' 
        GROUP BY f.id_form_labor
        order by tanggal asc
        "
        )->result();
    }
}
