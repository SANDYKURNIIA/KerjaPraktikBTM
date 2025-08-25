<?php

class M_IGD extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }

    public function selectDataPasienIGD()
    {
        $query = $this->db->query("SELECT v.*
    FROM v_igd v
   
    where v.total_bayar != 1
    
     ORDER BY v.tgl_masuk desc");
        return $query->result();
    }

    public function selectDataPasienIGDby_id($id_pelayanan, $id_history)
    {
        $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));
        $this->db->from('v_igd');
        return $this->db->get()->result();
    }


    public function selectNamaDPJP()
    {
        $this->db->select('nama, id_dokter');
        // $this->db->where_not_in('id_dokter');
        $this->db->where('status', 'AKTIF');
        $this->db->from('dokter');
        $this->db->group_by('nama');
        $this->db->order_by('nama');
        return $this->db->get()->result();
    }

    public function selectDataTindakanByIdPel($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->from('v_tindakan_igd');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function selectDataTotalByIdPel($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('v_tindakan_igd');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function delete_tindakan($id_tindakan_igd)
    {
        $this->db->delete('tindakan_igd', array('id_tindakan_igd' => $id_tindakan_igd));
    }

    public function insert_tindakan($page_data, $table)
    {
        $this->db->insert($table, $page_data);
    }

    public function selectNamaTindakan()
    {
        $this->db->select('DISTINCT(nama) nama_bayar, id_tindakan_igd, harga_jasa, harga_sarana');
        $this->db->where('status', 'AKTIF');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('list_tindakan_igd')->result_array();
    }
    public function selectNamaTindakan_lama()
    {
        $this->db->select('DISTINCT(nama) nama_bayar, id_tindakan_igd, harga_jasa, harga_sarana');
        $this->db->where('status', 'LAMA');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('list_tindakan_igd')->result_array();
    }
    public function selectDataLaporanUGD()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('h.*, d.nama,  ps.nama pasien');
        $this->db->from('history_pelayanan h, dokter d, pelayanan p, pasien ps');
        $this->db->where('jenis_pelayanan', 'UGD');
        $this->db->where('h.dpjp=d.id_dokter');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('p.id_pasien= ps.no_rm');
        $this->db->where('h.tgl_masuk', $tgl);
        $this->db->order_by('h.tgl_masuk');
        return $this->db->get()->result();
    }
    public function selectDataRangeLaporanUGD($mulai, $akhir)
    {
        $this->db->select('h.*, d.nama,  ps.nama pasien');
        $this->db->from('history_pelayanan_ugd h, dokter d, pelayanan p, pasien ps');
        $this->db->where('h.dpjp=d.id_dokter');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('p.id_pasien= ps.no_rm');
        $this->db->where('p.status_rawat', 'selesai');
        $this->db->where('p.status', 1);
        $this->db->where('h.status', 1);
        $this->db->where('p.tgl_masuk>=', $mulai);
        $this->db->where('p.tgl_masuk <=', $akhir);
        $this->db->order_by('p.tgl_masuk');
        return $this->db->get()->result();
    }



    public function selectDataLaporanUGDranap()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT h.*, d.nama
       from history_pelayanan h, dokter d
       WHERE jenis_pelayanan='UGD' and h.dpjp=d.id_dokter and tgl_masuk ='$tgl' and  id_pelayanan IN (
       SELECT h.id_pelayanan
       FROM history_pelayanan h
       WHERE jenis_pelayanan='RAWAT INAP' and tgl_masuk ='$tgl'
       )
       ORDER BY tgl_masuk");
        return $hasil->result();
    }

    public function selectDataRangeLaporanUGDranap($mulai, $akhir)
    {
        $hasil = $this->db->query("SELECT h.*, d.nama
   from history_pelayanan_ugd h, dokter d, pelayanan p
   WHERE p.id_pelayanan=h.id_pelayanan and h.dpjp=d.id_dokter and p.tgl_masuk >='$mulai' and p.tgl_masuk <='$akhir' and p.status=1 and p.status_rawat='selesai' and  h.id_pelayanan IN (
   SELECT id_pelayanan
   FROM history_pelayanan_ranap 
   )
   ORDER BY tgl_masuk");
        return $hasil->result();
    }


    //   Radiologi
    public function selectDataRadiologiById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p, staff s');
        $this->db->where('t.id_tindakan=l.id_daftar_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function insert_radiologi($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function Total_Radiologi_Byid($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_radiologi');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function delete_radiologi($id_tindakan_radiologi)
    {
        $this->db->delete('tindakan_radiologi', array('id_tindakan_radiologi' => $id_tindakan_radiologi));
    }

    // End


    //   Labor
    public function selectNamaRadiologi()
    {
        $this->db->select('nama, id_daftar_tindakan, harga');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe_kamar', 'KELAS III');
        $this->db->from('list_tindakan_radiologi');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function selectNamaRadiologi_lama()
    {
        $this->db->select('nama, id_daftar_tindakan, harga');
        $this->db->where('status', 'LAMA');
        $this->db->where('tipe_kamar', 'KELAS III');
        $this->db->from('list_tindakan_radiologi');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
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

    public function Total_Labor_Byid($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_labor');
        $this->db->where('id_form_labor', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function delete_labor($id_tindakan_radiologi)
    {
        $this->db->delete('tindakan_labor', array('id_tindakan_labor' => $id_tindakan_radiologi));
    }

    public function insert_labor($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function selectNamaLabor()
    {
        $this->db->select('*');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe_kamar', 'KELAS III');
        $this->db->from('list_tindakan_labor');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function selectNamaLabor_lama()
    {
        $this->db->select('*');
        $this->db->where('status', 'LAMA');
        $this->db->where('tipe_kamar', 'KELAS III');
        $this->db->from('list_tindakan_labor');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }

    //   End
    public function getAntrian()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select_max('no_antri');
        $this->db->from('antrian_farmasi');
        $this->db->like('tanggal', $tgl);
        return $this->db->get()->result();
    }
    public function getNamaObat()
    {
        $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,sl.kadaluarsa,l.margin,l.harga_cost,l.ppn');
        $this->db->from('stok_apotik sl, list_logistik l');
        $this->db->where(' sl.id_logistik=l.id_logistik');
        $this->db->group_by('sl.id_logistik');
        $this->db->having('stok>0');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function getNamaObat1()
    {
        $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,sl.kadaluarsa,l.margin,l.harga_cost,l.ppn');
        $this->db->from('stok_igd sl, list_logistik l');
        $this->db->where(' sl.id_logistik=l.id_logistik');
        $this->db->group_by('sl.id_logistik');
        $this->db->having('stok>0');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function selectObatById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from(' tindakan_farmasi t, list_logistik l , staff s');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.id_resep', 'OBAT RUANG');
        $this->db->where("(t.jenis_pelayanan ='IGD' or t.jenis_pelayanan ='UGD')");
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }

    public function getResepById($id_pelayanan)
    {
        $this->db->select('sum(t.total) total, sum(t.frek) frek, l.nama obat, si.tindakan,c.cara_pemakaian');
        $this->db->from('tindakan_farmasi t, list_logistik l,signa_obat si, cara_pemakaian_obat c');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_signa=si.id_signa');
        $this->db->where('t.id_cara_pakai=c.id_cara_pemakaian');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->where('t.id_resep', 'OBAT RUANG');
        $this->db->where("(t.jenis_pelayanan ='IGD' or t.jenis_pelayanan ='UGD')");
        $this->db->group_by('t.id_list_tindakan');
        return $this->db->get()->result_array();
    }
    public function getDataByIdResep($id_pelayanan, $id_history)
    {
        $query =  $this->db->query("SELECT pa.nama,pa.no_rm,pa.tgl_lahir, pa.alamat,c.nama  cara_bayar,a.nama asal,d.nama dokter, d.foto,'IGD' as ruang
        from pasien pa, pelayanan p, dokter d,cara_bayar c,   asal_pasien  a, history_pelayanan_ugd h
        WHERE pa.no_rm=p.id_pasien and p.asal_pasien=a.id_asal_pasien and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter
        and p.id_pelayanan=h.id_pelayanan and p.id_pelayanan = '$id_pelayanan' and h.id_history = '$id_history'
        ");
        return $query->row_array();
    }

    public function cekJumTindakan($id_pelayanan, $tbTindakan)
    {
        $this->db->select('id_tindakan_igd');
        $this->db->from($tbTindakan);
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function cekJumTindakanObat($id_pelayanan)
    {

        $this->db->select('t.id_tindakan_farmasi');
        $this->db->from('v_igd v, tindakan_farmasi t');
        $this->db->where('v.id_pelayanan = t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function cekJumTindakanRad($id_pelayanan)
    {

        $this->db->select('t.id_tindakan_radiologi');
        $this->db->from('v_igd v, tindakan_radiologi t');
        $this->db->where('v.id_pelayanan = t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function cekJumTindakanLab($id_pelayanan)
    {
        $this->db->select('t.id_tindakan_labor');
        $this->db->from('v_igd v, tindakan_labor t');
        $this->db->where('v.id_pelayanan = t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function selectERM()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('v.*');
        $this->db->from('v_igd v');
        $this->db->where('v.total_bayar != 0');
        $this->db->like('v.tgl_masuk', $tgl);
        return $this->db->get()->result();
    }
    public function selectERMRange($mulai, $akhir)
    {
        $query = $this->db->query("SELECT v.*
        FROM v_igd v where v.tgl_masuk >= '$mulai' and v.tgl_masuk <= '$akhir'
        and v.total_bayar != 0
        ORDER BY v.tgl_masuk desc");
        return $query->result();
    }
    public function getTotalObat($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_farmasi');
        $this->db->where('id_resep', 'OBAT RUANG');
        $this->db->where('jenis_pelayanan', 'IGD');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function selectDataLaporanTindakanIgd()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('count(l.id_tindakan_igd) jml, sum(t.total) total, l.nama tindakan');
        $this->db->from('pelayanan p, pasien pas, cara_bayar r, tindakan_igd t, list_tindakan_igd l');
        $this->db->where('l.id_tindakan_igd=t.id_list_tindakan');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('r.id_cara_bayar=p.cara_bayar');
        $this->db->where('pas.no_rm=p.id_pasien');
        $this->db->like('t.tanggal', $tgl);
        $this->db->group_by('l.nama');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }

    public function selectDataRangeLaporanTindakanIgd($mulai, $akhir)
    {
        $this->db->select('count(l.id_tindakan_igd) jml, sum(t.total) total, l.nama tindakan');
        $this->db->from('pelayanan p, pasien pas, cara_bayar r, tindakan_igd t, list_tindakan_igd l');
        $this->db->where('l.id_tindakan_igd=t.id_list_tindakan');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('r.id_cara_bayar=p.cara_bayar');
        $this->db->where('pas.no_rm=p.id_pasien');
        $this->db->where('t.tanggal >= ', $mulai);
        $this->db->where('t.tanggal <= ', $akhir);
        $this->db->group_by('l.nama');
        $this->db->order_by('l.nama');
        return $this->db->get()->result();
    }

    public function selectTriase()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT 'Kuning' as jenis, COUNT(f.id_pelayanan) jumlah 
        FROM pelayanan b, form_ass_per_igd f
        WHERE b.id_pelayanan=f.id_pelayanan
        AND b.status = 1 
        and f.asesment_triase like '%kuning%'
        AND b.tgl_masuk like '%$tgl%'
        UNION ALL
        SELECT  'Hijau' as jenis, COUNT(f.id_pelayanan) jumlah 
        FROM pelayanan b, form_ass_per_igd f
        WHERE b.id_pelayanan=f.id_pelayanan
        AND b.status = 1 
        and f.asesment_triase like '%hijau%'
        AND b.tgl_masuk like '%$tgl%'
        UNION ALL
        SELECT  'Merah' as jenis, COUNT(f.id_pelayanan) jumlah 
        FROM pelayanan b, form_ass_per_igd f
        WHERE b.id_pelayanan=f.id_pelayanan
        AND b.status = 1 
        and f.asesment_triase like '%merah%'
        AND b.tgl_masuk like '%$tgl%'
        UNION ALL
        SELECT  'Hitam' as jenis, COUNT(f.id_pelayanan) jumlah 
        FROM pelayanan b, form_ass_per_igd f
        WHERE b.id_pelayanan=f.id_pelayanan
        AND b.status = 1 
        and f.asesment_triase like '%hitam%'
        AND b.tgl_masuk like '%$tgl%'");
        return $hasil->result();
    }

    public function selectRangeTriase($mulai, $akhir)
    {
        $hasil = $this->db->query("SELECT 'Kuning' as jenis, COUNT(f.id_pelayanan) jumlah 
        FROM pelayanan b, form_ass_per_igd f
        WHERE b.id_pelayanan=f.id_pelayanan
        AND b.status = 1 
        and f.asesment_triase like '%kuning%'
        AND b.tgl_masuk>= '$mulai' AND b.tgl_masuk<='$akhir'
        UNION ALL
        SELECT  'Hijau' as jenis, COUNT(f.id_pelayanan) jumlah 
        FROM pelayanan b, form_ass_per_igd f
        WHERE b.id_pelayanan=f.id_pelayanan
        AND b.status = 1 
        and f.asesment_triase like '%hijau%'
        AND b.tgl_masuk>= '$mulai' AND b.tgl_masuk<='$akhir'
        UNION ALL
        SELECT  'Merah' as jenis, COUNT(f.id_pelayanan) jumlah 
        FROM pelayanan b, form_ass_per_igd f
        WHERE b.id_pelayanan=f.id_pelayanan
        AND b.status = 1 
        and f.asesment_triase like '%merah%'
        AND b.tgl_masuk>= '$mulai' AND b.tgl_masuk<='$akhir'
        UNION ALL
        SELECT  'Hitam' as jenis, COUNT(f.id_pelayanan) jumlah 
        FROM pelayanan b, form_ass_per_igd f
        WHERE b.id_pelayanan=f.id_pelayanan
        AND b.status = 1 
        and f.asesment_triase like '%hitam%'
        AND b.tgl_masuk>= '$mulai' AND b.tgl_masuk<='$akhir'");
        return $hasil->result();
    }
    function getDatadiagRange($mulai, $akhir)
    {
        $this->db->select('p.id_pelayanan,pt.nama, pt.jenis_kelamin, pt.no_rm,lp.nama_panjang, pt.keterangan,pt.tgl_dinyatakan tgl_skrining,p.tgl_masuk,d.nama dpjp');
        $this->db->from('pasien_TBC pt, pelayanan p, history_pelayanan hp, list_poli lp, dokter d');
        $this->db->where('pt.id_pelayanan = p.id_pelayanan');
        $this->db->where('p.id_pelayanan = hp.id_pelayanan');
        $this->db->where('pt.id_poli = lp.id_list_poli');
        $this->db->where('hp.dpjp = d.id_dokter');

        // Tambahkan klausa WHERE untuk filter tanggal
        $this->db->where('pt.tgl_dinyatakan >=', $mulai);
        $this->db->where('pt.tgl_dinyatakan <=', $akhir);
        $this->db->order_by('pt.tgl_dinyatakan', 'asc');

        return $this->db->get()->result();
    }
    function getDatadiag()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('p.id_pelayanan,pt.nama, pt.jenis_kelamin, pt.no_rm,lp.nama_panjang, pt.keterangan,pt.tgl_dinyatakan tgl_skrining,p.tgl_masuk,d.nama dpjp');
        $this->db->from('pasien_TBC pt, pelayanan p, history_pelayanan hp, list_poli lp, dokter d');
        $this->db->where('pt.id_pelayanan = p.id_pelayanan');
        $this->db->where('p.id_pelayanan = hp.id_pelayanan');
        $this->db->where('pt.id_poli = lp.id_list_poli');
        $this->db->where('hp.dpjp = d.id_dokter');
        $this->db->like('pt.tgl_dinyatakan', $tgl);
        $this->db->order_by('pt.tgl_dinyatakan', 'asc');
        return $this->db->get()->result();
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

    public function getBhceRange($first_date, $second_date)
    {
        $this->db->select('p.tgl_masuk');
        $this->db->from('pelayanan p,pasien_TBC tb');
        $this->db->where('p.id_pelayanan = tb.id_pelayanan');
        $this->db->where('p.tgl_masuk >=', $first_date);
        $this->db->where('p.tgl_masuk <=', $second_date);

        return $this->db->get()->result();
    }

    public function getBhce()
    {
        $this->db->select('p.tgl_masuk');
        $this->db->from('pelayanan p,pasien_TBC tb');
        $this->db->where('p.id_pelayanan = tb.id_pelayanan');
        
        return $this->db->get()->result();
    }
}
