<?php

class M_Poli extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }
    public function getDiagnosa()
    {
        $this->db->select('id_diagnosa,nama_diagnosa');
        $this->db->from('list_diagnosa');
        return $this->db->get()->result_array();
    }
    public function selectDataPasien($tipe)
    {
        if ($tipe == 'poliinternis') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status status_kasir 
            FROM v_pasien_internis v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'poliobgyne') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status status_kasir 
            FROM v_pasien_obgyne v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'politht') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_tht v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polimata') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_mata v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polikulit') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_kulit v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm != 1
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'poliumum') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_umum v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polianak') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_anak v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'poligigi') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_gigi v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polijantung') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_jantung v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polibedah') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_bedah v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polifisio') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_fisio v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'rehab') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_rehab_medik v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polihemodialisa') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_hemodialisa v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'poliakupuntur') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_akupuntur v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polibedahmulut') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_bedah_mulut v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polikesjiwa') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_kesehatan_jiwa v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'poliorthopedi') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_orthopedi v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'poliparu') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_paru v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polisaraf') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_saraf v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'poliurologi') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_urologi v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            order by v.tgl_masuk desc");
            return $query->result();
        }
    }
    public function selectDataPasienby_id($id_pelayanan, $id_history, $table)
    {
        $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));
        $this->db->from($table);
        return $this->db->get()->result();
    }
    public function selectNamaTindakan($tbTindakan)
    {
        $this->db->select('nama nama_tindakan,id_list_tindakan, harga_jasa, harga_sarana');
        $this->db->where('status', 'AKTIF');
        $this->db->from($tbTindakan);
        $this->db->order_by('nama_tindakan');
        return $this->db->get()->result_array();
    }
    public function selectDokter($spes)
    {
        $this->db->select('nama, id_dokter');
        $this->db->where('dokter_spes', $spes);
        $this->db->where('status', 'aktif');
        $this->db->from('dokter');
        $this->db->order_by('nama');
        return $this->db->get()->result();
    }
    public function insert_tindakan($page_data, $table)
    {
        $this->db->insert($table, $page_data);
    }
    public function update_tindakan($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function selectDataTindakanByIdPel($id_pelayanan, $table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function delete_tindakan($id, $table, $where)
    {
        $this->db->delete($table, array($where => $id));
    }
    public function harga_total($idPelayanan, $table)
    {
        $this->db->select('SUM(total) as total');
        $this->db->from($table);
        $this->db->where('id_pelayanan', $idPelayanan);
        return $this->db->get()->row()->total;
    }
    public function Total_Harga_Byid($id_pelayanan, $table)
    {
        $this->db->select_sum('total');
        $this->db->from($table);
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    //   Radiologi
    public function selectDataRadiologiById($id_pelayanan) //isi tabel radiologi
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

    public function selectDataRadiologiPrioritasById($id_pelayanan) //isi tabel radiologi prioritas
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_radiologi_pp t, list_tindakan_radiologi_prioritas l, pelayanan p, staff s');
        $this->db->where('t.id_daftar_tindakan=l.id_daftar_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function Total_Radiologi_Byid($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_radiologi');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function Total_Radiologi_Prioritas_Byid($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_radiologi_pp');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function delete_radiologi($id_tindakan_radiologi)
    {
        $this->db->delete('tindakan_radiologi', array('id_tindakan_radiologi' => $id_tindakan_radiologi));
    }

    // End


    //   Labor
    public function selectNamaRadiologi() // list tindakan radiologi
    {
        $this->db->select('nama, id_daftar_tindakan, harga');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe_kamar', 'KELAS III');
        $this->db->from('list_tindakan_radiologi');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }

    public function selectNamaRadiologiPrioritas() // list tindakan radiologi prioritas
    {
        $this->db->select('nama, id_daftar_tindakan, harga');
        $this->db->where('status', 'AKTIF');
        $this->db->from('list_tindakan_radiologi_prioritas');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }

    public function selectDataLaborById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama, s.nama staff, pa.tgl_lahir, f.status');
        $this->db->from('tindakan_labor t, list_tindakan_labor l, pelayanan p, staff s, pasien pa, form_labor f');
        $this->db->where('t.id_list_tindakan=l.id_daftar_tindakan');
        $this->db->where('pa.no_rm=p.id_pasien');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_form_labor=f.id_form_labor');
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

    public function selectNamaLabor() //tindakan labor
    {
        $this->db->select('nama, id_daftar_tindakan, harga, kode_lis');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe_kamar', 'KELAS III');
        $this->db->from('list_tindakan_labor');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }

    public function selectNamaLaborPrioritas() //tindakan labor prioritas
    {
        $this->db->select('nama, id_daftar_tindakan, harga');
        $this->db->where('status', 'AKTIF');
        $this->db->from('list_tindakan_labor_prioritas');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    // End


    //   Labor Prioritas
    public function selectDataLaborPrioritasById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama, s.nama staff, pa.tgl_lahir, f.status');
        $this->db->from('tindakan_labor_pp t, list_tindakan_labor_prioritas l, pelayanan p, staff s, pasien pa, form_labor f');
        $this->db->where('t.id_list_tindakan=l.id_daftar_tindakan');
        $this->db->where('pa.no_rm=p.id_pasien');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_form_labor=f.id_form_labor');
        $this->db->where('t.id_form_labor', $id_pelayanan);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function Total_Labor_Prioritas_Byid($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_labor_pp t, form_labor f');
        $this->db->where('t.id_form_labor=f.id_form_labor');
        $this->db->where('t.id_form_labor', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function delete_labor_prioritas($id_tindakan_radiologi)
    {
        $this->db->delete('tindakan_labor_pp', array('id_tindakan_labor' => $id_tindakan_radiologi));
    }
    // End Labor Prioritas


    //  Antrian

    public function selectAntrian($poli)
    {
        $tanggal = date('Y-m-d');
        $hasil = $this->db->query("SELECT a.*, p.nama,c.nama cara_bayar,p.no_rm,pel.id_pelayanan 
        FROM antrian_poli a, pelayanan pel, pasien p, cara_bayar c 
        WHERE a.poli='$poli' and a.tanggal='$tanggal' and a.status!=2 and p.no_rm=pel.id_pasien and c.id_cara_bayar=pel.cara_bayar and a.id_pelayanan=pel.id_pelayanan and a.jenis_antrian='ONLINE' 
        UNION all 
        SELECT a.*, p.nama,c.nama cara_bayar,p.no_rm,pel.id_pelayanan FROM antrian_poli a, pelayanan pel, pasien p, cara_bayar c 
        WHERE a.poli='$poli' and a.tanggal='$tanggal' and a.status!=2 and p.no_rm=pel.id_pasien and c.id_cara_bayar=pel.cara_bayar and a.id_pelayanan=pel.id_pelayanan and a.jenis_antrian='LANGSUNG' order by status ,no_antri");
        return $hasil->result();
    }

    public function updateskip($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function updatenext($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function insertplaySuara($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function selectCountData($poli)
    {
        $tanggal = date('Y-m-d');
        $this->db->select('poli, count(poli) as jumlah');
        $this->db->where('poli', $poli);
        $this->db->where_Not_In('status', '2');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }

    public function getAntrianPoli($poli)
    {
        $tanggal = date('Y-m-d');
        $hasil = $this->db->query("SELECT a.*, p.nama,c.nama cara_bayar,p.no_rm,pel.id_pelayanan 
        FROM antrian_poli a, pelayanan pel, pasien p, cara_bayar c 
        WHERE a.poli='$poli' and a.tanggal='$tanggal' and a.status!=2 and p.no_rm=pel.id_pasien and c.id_cara_bayar=pel.cara_bayar and a.id_pelayanan=pel.id_pelayanan and a.jenis_antrian='ONLINE' 
        UNION all 
        SELECT a.*, p.nama,c.nama cara_bayar,p.no_rm,pel.id_pelayanan FROM antrian_poli a, pelayanan pel, pasien p, cara_bayar c 
        WHERE a.poli='$poli' and a.tanggal='$tanggal' and a.status!=2 and p.no_rm=pel.id_pasien and c.id_cara_bayar=pel.cara_bayar and a.id_pelayanan=pel.id_pelayanan and a.jenis_antrian='LANGSUNG' order by status ,no_antri");
        return $hasil->row_array();
    }
    public function selectResepById($id_pelayanan)
    {
        $this->db->select('r.*, p.cara_bayar');
        $this->db->from('resep_obat r, pelayanan p');
        $this->db->where('r.id_pelayanan = p.id_pelayanan');
        $this->db->where('r.id_pelayanan', $id_pelayanan);
        $this->db->order_by('r.tanggal', 'desc');
        return $this->db->get()->result();
    }
    public function request_resep($where, $data)
    {
        $this->db->where('id_resep', $where);
        $this->db->update('resep_obat', $data);
    }
    public function selectObatByResep($id_resep)
    {
        $this->db->select('t.*, l.nama, s.nama staff,r.jenis_resep,r.status, so.tindakan, c.cara_pemakaian');
        $this->db->from('resep_obat r, tindakan_farmasi t, list_logistik l , staff s, signa_obat so,cara_pemakaian_obat c');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_resep = r.id_resep');
        $this->db->where('t.id_signa = so.id_signa');
        $this->db->where('t.id_cara_pakai = c.id_cara_pemakaian');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('r.id_resep', $id_resep);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }
    // public function selectRacikanByResep($id_resep)
    // {
    //     $this->db->select('ra.resep, s.tindakan, c.cara_pemakaian');
    //     $this->db->from('resep_obat r, resep_racikan ra, tindakan_farmasi t, signa_obat s, cara_pemakaian_obat c');
    //     $this->db->where('r.id_resep = ra.id_resep');

    //     $this->db->where ('t.id_resep=r.id_resep');
    //     $this->db->where ('t.id_signa=s.id_signa'); 
    //     $this->db->where ('c.id_cara_pemakaian=t.id_cara_pakai');

    //     $this->db->where('r.id_resep', $id_resep);
    //     $this->db->order_by('ra.tanggal desc');

    //     return $this->db->get()->result();
    // }
    public function selectRacikanByResep($id_resep)
    {
        $this->db->select('ra.*, s.tindakan, c.cara_pemakaian,r.status');
        $this->db->from('resep_obat r, resep_racikan ra, cara_pemakaian_obat c, signa_obat s');
        $this->db->where('r.id_resep = ra.id_resep');
        $this->db->where('ra.id_signa = s.id_signa');
        $this->db->where('ra.id_cara_pakai = c.id_cara_pemakaian');
        $this->db->where('ra.id_resep', $id_resep);
        $this->db->order_by('ra.tanggal desc');

        return $this->db->get()->result();
    }
    public function getNamaObat()
    {
        // $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
        // $this->db->from('stok_apotik sl, list_logistik l');
        // $this->db->where(' sl.id_logistik=l.id_logistik');
        // $this->db->group_by('sl.id_logistik');
        // $this->db->having('stok>0');
        $this->db->order_by('nama');
        return $this->db->get('v_stok_apotik')->result_array();
    }
    public function getNamaObatByDepo($depo)
    {
        if ($depo == 'APOTIK') {
            $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
            $this->db->from('stok_apotik sl, list_logistik l');
            $this->db->where(' sl.id_logistik=l.id_logistik');
            $this->db->group_by('sl.id_logistik');
            $this->db->having('stok>0');
            $this->db->order_by('nama');
            return $this->db->get()->result_array();
        } elseif ($depo == 'IGD') {
            $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
            $this->db->from('stok_igd sl, list_logistik l');
            $this->db->where(' sl.id_logistik=l.id_logistik');
            $this->db->group_by('sl.id_logistik');
            $this->db->having('stok>0');
            $this->db->order_by('nama');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
            $this->db->from('stok_depo sl, list_logistik l');
            $this->db->where(' sl.id_logistik=l.id_logistik');
            $this->db->group_by('sl.id_logistik');
            $this->db->having('stok>0');
            $this->db->order_by('nama');
            return $this->db->get()->result_array();
        }
    }
    public function getNamaObatReturn($id_pelayanan)
    {

        $this->db->select('l.id_logistik,l.nama , SUM(t.frek) stok,SUM(t.total) total,t.depo,t.kadaluarsa,l.margin,l.harga_cost');
        $this->db->from('list_logistik l,tindakan_farmasi t, resep_obat r');
        $this->db->where(' t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_resep = r.id_resep');
        $this->db->where(' r.id_pelayanan', $id_pelayanan);
        $this->db->group_by('t.id_list_tindakan');
        $this->db->having('stok>0');
        $this->db->order_by('nama');

        return $this->db->get()->result_array();
    }
    public function delete_resep($id_resep)
    {
        $this->db->delete('resep_obat', array('id_resep' => $id_resep));
        $this->db->delete('tindakan_farmasi', array('id_resep' => $id_resep));
        $this->db->delete('stok_apotik', array('id_resep' => $id_resep));
        $this->db->delete('stok_igd', array('id_resep' => $id_resep));
        $this->db->delete('stok_depo', array('id_resep' => $id_resep));
    }
    public function delete_racikan($id_racikan)
    {
        $this->db->delete('resep_racikan', array('id_racikan' => $id_racikan));
    }
    public function delete_obat($id_tindakan, $depo)
    {
        $this->db->delete('tindakan_farmasi', array('id_tindakan_farmasi' => $id_tindakan));
        if ($depo == 'APOTIK') {
            $this->db->delete('stok_apotik', array('id_req' => $id_tindakan));
            $sql = "DELETE s.* from stok_apotik s , tindakan_farmasi f  WHERE s.id_req = f.id_tindakan_farmasi and s.id_req=?";
            $this->db->query($sql, array($id_tindakan));
        } else if ($depo == 'IGD') {
            $this->db->delete('stok_igd', array('id_req' => $id_tindakan));
            $sql = "DELETE s.* from stok_igd s , tindakan_farmasi f  WHERE s.id_req = f.id_tindakan_farmasi and s.id_req=?";
            $this->db->query($sql, array($id_tindakan));
        } else {
            $this->db->delete('stok_depo', array('id_req' => $id_tindakan));
            $sql = "DELETE s.* from stok_depo s , tindakan_farmasi f  WHERE s.id_req = f.id_tindakan_farmasi and s.id_req=?";
            $this->db->query($sql, array($id_tindakan));
        }
    }
    public function getAntrian()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select_max('no_antri');
        $this->db->from('antrian_farmasi');
        $this->db->like('tanggal', $tgl);
        return $this->db->get()->result();
    }

    public function selectDataFormById($id_pelayanan, $id_tindakan) //get untuk detail data
    {
        $this->db->select('t.*, l.nama');
        $this->db->from('tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p');
        $this->db->where('t.id_tindakan=l.id_daftar_tindakan');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->where('t.id_tindakan_radiologi', $id_tindakan);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function selectDataFormPrioritasById($id_pelayanan, $id_tindakan) //get untuk detail data prioritas
    {
        $this->db->select('t.*, l.nama');
        $this->db->from('tindakan_radiologi_pp t, list_tindakan_radiologi_prioritas l, pelayanan p');
        $this->db->where('t.id_tindakan=l.id_daftar_tindakan');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->where('t.id_tindakan_radiologi', $id_tindakan);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
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

    public function cekJumTindakan($id_pelayanan, $tbTindakan)
    {
        $this->db->select('id_tindakan');
        $this->db->from($tbTindakan);
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function cekJumTindakanObat($id_pelayanan, $tipe)
    {
        if ($tipe == 'poliinternis') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_internis v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliobgyne') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_obgyne v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'politht') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_tht v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polimata') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_mata v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polikulit') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_kulit v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliumum') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_umum v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polianak') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_anak v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poligigi') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_gigi v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polijantung') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_jantung v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polibedah') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_bedah v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polifisio') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_fisio v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'rehab') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_rehab_medik v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polihemodialisa') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_hemodialisa v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliakupuntur') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_akupuntur v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polibedahmulut') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_bedah_mulut v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polikesjiwa') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_kesehatan_jiwa v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliorthopedi') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_orthopedi v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliparu') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_paru v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polisaraf') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_saraf v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliurologi') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_urologi v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        }
    }
    public function cekJumTindakanRad($id_pelayanan, $tipe)
    {
        if ($tipe == 'poliinternis') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_internis v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliobgyne') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_obgyne v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'politht') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_tht v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polimata') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_mata v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polikulit') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_kulit v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliumum') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_umum v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polianak') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_anak v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poligigi') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_gigi v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polijantung') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_jantung v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polibedah') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_bedah v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polifisio') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_fisio v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'rehab') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_rehab_medik v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polihemodialisa') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_hemodialisa v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliakupuntur') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_akupuntur v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polibedahmulut') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_bedah_mulut v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polikesjiwa') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_kesehatan_jiwa v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliorthopedi') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_orthopedi v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliparu') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_paru v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polisaraf') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_saraf v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliurologi') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_urologi v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        }
    }
    public function cekJumTindakanLab($id_pelayanan, $tipe)
    {
        if ($tipe == 'poliinternis') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_internis v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliobgyne') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_obgyne v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'politht') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_tht v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polimata') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_mata v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polikulit') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_kulit v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliumum') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_umum v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polianak') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_anak v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poligigi') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_gigi v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polijantung') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_jantung v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polibedah') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_bedah v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polifisio') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_fisio v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'rehab') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_rehab_medik v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polihemodialisa') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_hemodialisa v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliakupuntur') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_akupuntur v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polibedahmulut') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_bedah_mulut v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polikesjiwa') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_kesehatan_jiwa v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliorthopedi') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_orthopedi v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliparu') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_paru v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polisaraf') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_saraf v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliurologi') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_urologi v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        }
    }
    function req_kasir($id_pelayanan, $id_history)
    {
        $this->db->select('*');
        $this->db->from('req_kasir');
        $this->db->where('id_history', $id_history);
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->row_array();
    }
    function insert_req_kasir($id_pelayanan, $id_history, $data)
    {
        $this->db->where('id_history', $id_history);
        $this->db->where('id_pelayanan', $id_pelayanan);
        $q = $this->db->get('req_kasir');

        if (
            $q->num_rows() > 0
        ) {
            $this->db->where('id_history', $id_history);
            $this->db->where('id_pelayanan', $id_pelayanan);
            $this->db->update('req_kasir', $data);
        } else {
            $this->db->set('id_history', $id_history);
            $this->db->set('id_pelayanan', $id_pelayanan);
            $this->db->insert('req_kasir', $data);
        }
    }
    public function selectDataPasienIGD($poli)
    {

        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT v.*
        FROM v_erm_poli v where  v.nama_poli = '$poli' and v.status_erm=1
        and v.tgl_masuk like '$tgl%'
        ORDER BY v.tgl_masuk desc");
        return $query->result();
    }
    public function selectDataPasienIGDRange($mulai, $akhir, $poli)
    {
        $query = $this->db->query("SELECT v.*
        FROM v_erm_poli v where v.id_pelayanan in (Select id_pelayanan from history_pelayanan where nama_poli = '$poli' and status_erm=1) 
        and v.tgl_masuk >= '$mulai' and v.tgl_masuk <= '$akhir'
        ORDER BY v.tgl_masuk desc");
        return $query->result();
    }
}
