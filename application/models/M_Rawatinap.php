<<<<<<< HEAD
<?php

class M_Rawatinap extends CI_Model
{

    public function selectDataPasienRanapby_id($id_pelayanan, $id_history) // RANAP
    {
        $this->db->select('v.*,r.kelas');
        $this->db->from('v_apelkes v, ruangan r');
        $this->db->where('v.id_kamar = r.id_ruangan');
        $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
        return $this->db->get()->result();
    }
    public function getDokterById($id_dokter)
    {
        // Query untuk mendapatkan data dokter berdasarkan id_dokter
        $query = $this->db->get_where('dokter', array('id_dokter' => $id_dokter));

        // Mengembalikan hasil query sebagai array
        return $query->row_array();
    }


    public function selectDataPasienRanap($jenis) //RANAP
    {
        $data_staff = $this->session->userdata('data_auth');
        // $perawat = $this->db->get_where('staff',"ruangan LIKE '%$data_staff->ruangan%'")->row()->ruangan;
        if ($data_staff->tipe == 'rawatinap' && $data_staff->ruangan != '') {
            $ruangan = $data_staff->ruangan;
            if ($jenis == 'ranap') {
                $this->db->where("(nama_ruangan like '%$ruangan%')");
            } else {
                $this->db->where("(nama_ruangan ='ODC')");
            }
            // $this->db->where("(nama_ruangan like '%$ruangan%' or nama_ruangan ='ODC')");
            
            // $this->db->or_like('nama_ruangan','ODC');
            $this->db->where('keluar_kamar', NULL);
            $this->db->where('status_rawat !=', 'selesai');
            $this->db->from('v_perawat_ranap');
            return $this->db->get()->result();
        } else {
            if ($jenis == 'ranap') {
                $this->db->where("(nama_ruangan !='ODC')");
            } else {
                $this->db->where("(nama_ruangan ='ODC')");
            }
            $this->db->where('keluar_kamar', NULL);
            $this->db->where('status_rawat  !=', 'selesai');
            $this->db->from('v_perawat_ranap');
            return $this->db->get()->result();
        }
    }
    public function selectDataPasienRanap_riwayat($mulai, $akhir) //RANAP
    {
        $data_staff = $this->session->userdata('data_auth');
        $this->db->where('keluar_kamar !=', NULL);
        $this->db->where('status_rawat !=', 'selesai');
        $this->db->where("(date(keluar_kamar) between '$mulai' and '$akhir')");
        $this->db->from('v_perawat_ranap');
        return $this->db->get()->result();
    }
    public function selectDataPasienRanapDokter() //RANAP
    {
        $data_staff = $this->session->userdata('data_auth');
        // if ($data_staff->username == "20181004") {
        $dok = $this->db->get_where('dokter', ['username' => $data_staff->username])->row()->id_dokter;
        // var_dump($dok);
        $this->db->where('dpjp', $dok);
        // }
        $this->db->where('keluar_kamar', NULL);
        $this->db->where('status_rawat !=', 'selesai');
        $this->db->from('v_perawat_ranap');
        return $this->db->get()->result();
    }
    public function selectDataPasienRanapById($id_pelayanan) //RANAP
    {
        // $this->db->where('status', '1');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->from('v_perawat_ranap');
        return $this->db->get()->result();
    }

    public function selectKamar() // Ranap
    {
        $this->db->select('DISTINCT(kelas_ruangan) nama');
        $this->db->where('keterangan', 'AKTIF');
        $this->db->where('status', 'tersedia');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('ruangan')->result();
    }

    public function selectDataKamarByIdPel($id_pelayanan) //Ranap
    {
        $this->db->select('*');
        $this->db->from('v_kamar_apelkes');

        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('ket', '0');
        $this->db->order_by('tanggal_masuk', 'desc');
        return $this->db->get()->result();
    }

    public function Total_Harga_Byid($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('v_tindakan_apelkes');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function selectDataTindakanByIdPel($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->from('v_tindakan_apelkes');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function update_history($where, $page_data, $table) // Ranap
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function update_kamar_sekarang($where, $page_data, $table) // Ranap
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function update_kamar_baru($where, $page_data, $table) // Ranap
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function update_riwayat_kamar($where, $page_data, $table) // Ranap
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function insert_kamar($page_data, $table) // Ranap
    {
        $this->db->insert($table, $page_data);
    }

    public function getMaxKamar($id_pelayanan) // Ranap
    {
        $this->db->select('MAX(tanggal_keluar) max');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('ket', '0');

        return $this->db->get('riwayat_kamar')->result();
    }

    public function getMaxId($id_pelayanan, $try) // Ranap
    {
        $this->db->select('id_riwayat, id_kamar');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('tanggal_keluar', $try);
        $this->db->where('ket', '0');
        return $this->db->get('riwayat_kamar')->result();
    }

    public function update_riwayat_kamar_prev($where, $page_data, $table) // Ranap
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function update_riwayat_kamar_now($where, $page_data, $table) // Ranap
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function getTempatTidur($spes) //Ranap
    {
        $this->db->select('DISTINCT(tipe), id_ruangan');
        $this->db->where('keterangan', 'AKTIF');
        $this->db->where('status', 'tersedia');
        $this->db->where('kelas_ruangan', $spes);
        return $this->db->get('ruangan')->result();
    }
    public function get_ai_tbl_riwayat()
    {
        return $this->db->query('select generate_id_riwayat() as id from dual')->row()->id;
    }
    public function selectResepById($id_pelayanan)
    {
        $this->db->select('r.*, p.cara_bayar');
        $this->db->from('resep_obat r, pelayanan p');
        $this->db->where('r.id_pelayanan = p.id_pelayanan');
        $this->db->where('r.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function request_resep($where, $data)
    {
        $this->db->where('id_resep', $where);
        $this->db->update('resep_obat', $data);
    }
    public function selectObatByResep($id_resep)
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('resep_obat r, tindakan_farmasi t, list_logistik l , staff s');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_resep = r.id_resep');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('r.id_resep', $id_resep);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }
    public function selectRacikanByResep($id_resep)
    {
        $this->db->select('*');
        $this->db->from('resep_obat r, resep_racikan ra');
        $this->db->where('r.id_resep = ra.id_resep');
        $this->db->where('ra.id_resep', $id_resep);
        $this->db->order_by('ra.tanggal desc');

        return $this->db->get()->result();
    }
    public function getNamaObat()
    {
        $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
        $this->db->from('stok_depo sl, list_logistik l');
        $this->db->where(' sl.id_logistik=l.id_logistik');
        $this->db->group_by('sl.id_logistik');
        $this->db->having('stok>0');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function getNamaObatRuang($stok)
    {
        $staff = $this->session->userdata('data_auth');

        $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn,l.satuan_ok');
        $this->db->from($stok . ' sl, list_logistik l');
        $this->db->where(' sl.id_logistik=l.id_logistik');
        if ($stok == 'stok_ranap' && $staff->ruangan != '') {
            $this->db->where(' sl.id_resep', $staff->ruangan);
        }
        $this->db->group_by('sl.id_logistik');
        $this->db->having('stok>0');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function selectObatById($id_pelayanan)
    {
        $staff = $this->session->userdata('data_auth');
        if ($staff->tipe == 'kemoterapi') {
            $this->db->select('t.*, l.nama, s.nama staff');
            $this->db->from(' tindakan_farmasi t, list_logistik l,stok_kemo k , staff s');
            $this->db->where('t.id_tindakan_farmasi = k.id_req');
            $this->db->where('t.id_list_tindakan=l.id_logistik');
            $this->db->where('s.id_staff=t.id_staff');
            $this->db->where('t.id_resep', 'OBAT RUANG');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            $this->db->order_by('t.tanggal desc');
        } else {
            $this->db->select('t.*, l.nama, s.nama staff');
            $this->db->from(' tindakan_farmasi t, list_logistik l , staff s');
            $this->db->where('t.id_list_tindakan=l.id_logistik');
            $this->db->where('s.id_staff=t.id_staff');
            $this->db->where('t.id_resep', 'OBAT RUANG');

            $this->db->where("((t.jenis_pelayanan ='RANAP' or t.jenis_pelayanan ='RAWAT INAP') or s.tipe='rawatinap')");

            $this->db->where('t.id_pelayanan', $id_pelayanan);
            $this->db->order_by('t.tanggal desc');
        }


        return $this->db->get()->result();
    }
    public function getTotalObat($id_pelayanan)
    {
        $staff = $this->session->userdata('data_auth');
        if ($staff->tipe == 'kemoterapi') {
            $this->db->select_sum('t.total');
            $this->db->from('tindakan_farmasi t,stok_kemo k ');
            $this->db->where('t.id_tindakan_farmasi = k.id_req');
            $this->db->where('t.id_resep', 'OBAT RUANG');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
        } else {
            $this->db->select_sum('total');
            $this->db->from('tindakan_farmasi');
            $this->db->where('id_resep', 'OBAT RUANG');
            $this->db->where("(jenis_pelayanan ='RANAP' or jenis_pelayanan ='RAWAT INAP')");
            $this->db->where('id_pelayanan', $id_pelayanan);
        }

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
        $this->db->where("(t.jenis_pelayanan ='RANAP' or t.jenis_pelayanan ='RAWAT INAP')");
        $this->db->group_by('t.id_list_tindakan');
        return $this->db->get()->result_array();
    }
    public function getDataByIdResep($id_pelayanan, $id_history)
    {
        $query =  $this->db->query("SELECT pa.nama,pa.no_rm,pa.tgl_lahir, pa.alamat,c.nama  cara_bayar,a.nama asal,d.nama dokter, d.foto,r1.tipe ruang
        from pasien pa, pelayanan p, dokter d,cara_bayar c,   asal_pasien  a, history_pelayanan_ranap h,  ruangan r1  
        WHERE pa.no_rm=p.id_pasien and p.asal_pasien=a.id_asal_pasien and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter
        and p.id_pelayanan=h.id_pelayanan and h.id_kamar=r1.id_ruangan and p.id_pelayanan = '$id_pelayanan' and h.id_history = '$id_history'
        ");
        return $query->row_array();
    }
    public function getSumObat($obat, $stok)
    {
        $staff = $this->session->userdata('data_auth');
        $this->db->select('sum(frek) stok');
        $this->db->from($stok);
        if ($stok == 'stok_ranap' && $staff->ruangan != '') {
            $this->db->where('id_resep', $staff->ruangan);
        }
        $this->db->where('id_logistik', $obat);
        return $this->db->get()->row_array();
    }
    public function getNamaObatByDepo($depo)
    {
        if ($depo == 'APOTIK') {
            $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,sl.kadaluarsa,l.margin,l.harga_cost');
            $this->db->from('stok_apotik sl, list_logistik l');
            $this->db->where(' sl.id_logistik=l.id_logistik');
            $this->db->group_by('sl.id_logistik');
            $this->db->having('stok>0');
            $this->db->order_by('nama');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,sl.kadaluarsa,l.margin,l.harga_cost');
            $this->db->from('stok_igd sl, list_logistik l');
            $this->db->where(' sl.id_logistik=l.id_logistik');
            $this->db->group_by('sl.id_logistik');
            $this->db->having('stok>0');
            $this->db->order_by('nama');
            return $this->db->get()->result_array();
        }
    }
    public function getExpByObatApotik($obat)
    {
        $this->db->select('sum(s.frek) stok, s.kadaluarsa,l.margin,l.harga_cost,l.id_logistik,l.nama');
        $this->db->from('stok_apotik s, list_logistik l');
        $this->db->where(' s.id_logistik=l.id_logistik');
        $this->db->where(' s.id_logistik', $obat);
        $this->db->group_by('s.id_stok');
        $this->db->having('sum(s.frek)>0');
        return $this->db->get()->result_array();
    }
    public function getExpByObatIGD($obat)
    {
        $this->db->select('sum(s.frek) stok, s.kadaluarsa,l.margin,l.harga_cost,l.id_logistik,l.nama');
        $this->db->from('stok_igd s, list_logistik l');
        $this->db->where(' s.id_logistik=l.id_logistik');
        $this->db->where(' s.id_logistik', $obat);
        $this->db->group_by('s.id_stok');
        $this->db->having('sum(s.frek)>0');
        return $this->db->get()->result_array();
    }
    public function delete_resep($id_resep)
    {
        $this->db->delete('resep_obat', array('id_resep' => $id_resep));
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
        } else {
            $this->db->delete('stok_igd', array('id_req' => $id_tindakan));
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
    public function insert_tindakan($page_data, $table)
    {
        $this->db->insert($table, $page_data);
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

    public function selectDataFormById($id_pelayanan, $id_tindakan)
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

    public function delete_radiologi($id_tindakan_radiologi)
    {
        $this->db->delete('tindakan_radiologi', array('id_tindakan_radiologi' => $id_tindakan_radiologi));
    }

    public function delete_gizi($id_form)
    {
        $this->db->delete('pasien_gizi', array('id_form' => $id_form));
    }

    public function selectNamaRadiologi()
    {
        $this->db->select('nama, id_daftar_tindakan, harga');
        $this->db->where('status', 'AKTIF');
        $this->db->from('list_tindakan_radiologi');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }

    // End

    //fisio
    public function selectNamaTindakan($table)
    {
        $this->db->select('nama nama_tindakan,id_list_tindakan, harga_jasa, harga_sarana');
        $this->db->where('status', 'AKTIF');
        $this->db->from($table);
        $this->db->order_by('nama_tindakan');
        return $this->db->get()->result_array();
    }

    public function selectNamaDPJP()
    {
        $this->db->select('nama, id_dokter');
        //$this->db->where_not_in('id_dokter');
        $this->db->where('status', 'AKTIF');
        $this->db->from('dokter');
        $this->db->group_by('nama');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }

    public function selectNamaStaff()
    {
        $this->db->select('nama, id_staff');
        //$this->db->where_not_in('id_dokter');
        $this->db->where('tipe', 'ok');
        $this->db->from('staff');
        $this->db->group_by('nama');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    //  Labor


    public function selectDataLaborById($id_pelayanan)
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

    public function Total_Labor_Byid($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_labor');
        $this->db->where('id_pelayanan', $id_pelayanan);
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
        $this->db->select('nama, id_daftar_tindakan, harga');
        $this->db->where('status', 'AKTIF');
        $this->db->from('list_tindakan_labor');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    // End
    public function select($id_resep)
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('resep_obat r, tindakan_farmasi t, list_logistik l , staff s');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_resep = r.id_resep');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('r.id_resep', $id_resep);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }
    public function selectDataPasienIGD()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT v.*
        FROM v_erm_igd v, form_ass_dokter_igd d, form_ass_per_igd f
        where v.id_pelayanan = d.id_pelayanan and v.id_pelayanan = f.id_pelayanan 
         and v.tgl_masuk = '$tgl' and v.total_bayar=1
        ORDER BY v.tgl_masuk desc");
        return $query->result();
    }
    public function selectDataPasienIGDRange($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT v.tgl_lahir, v.tgl_masuk, v.no_rm, v.id_pelayanan, v.id_history, v.nama, v.jenis_kelamin,v.jenis_pelayanan, v.cara_bayar 
        FROM v_erm_igd v, form_ass_dokter_igd d, form_ass_per_igd f
        where v.id_pelayanan = d.id_pelayanan and v.id_pelayanan = f.id_pelayanan 
        and v.tgl_masuk >= '$mulai' and v.tgl_masuk <= '$akhir' and  v.total_bayar=1
        ORDER BY v.tgl_masuk desc");
        return $query->result();
    }
    // RIWAYAT ERM
    public function selectRiwayatIGD()
    {

        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT v.*
        FROM v_erm_igd v where v.id_pelayanan in (Select id_pelayanan from history_pelayanan_ranap where status=1) 
        and v.tgl_masuk = '$tgl'
        ORDER BY v.tgl_masuk desc");
        return $query->result();
    }
    public function selectRiwayatIGDRange($mulai, $akhir)
    {
        $query = $this->db->query("SELECT v.*
        FROM v_erm_igd v where v.id_pelayanan in (Select id_pelayanan from history_pelayanan_ranap where status=1) 
        and v.tgl_masuk >= '$mulai' and v.tgl_masuk <= '$akhir'
        ORDER BY v.tgl_masuk desc");
        return $query->result();
    }
    public function selectDataPasienRetur() //RETUR
    {
        $this->db->select('v.*');
        $this->db->from('v_perawat_ranap v, resep_obat r');
        $this->db->where('v.id_pelayanan = r.id_pelayanan');
        $this->db->where('r.jenis_resep = 3');
        $this->db->group_by('v.id_pelayanan');
        return $this->db->get()->result();
    }
    public function getNamaObatReturn($id_pelayanan)
    {

        $this->db->select('l.id_logistik,l.nama , t.frek,t.total,t.depo,t.kadaluarsa,l.margin,l.harga_cost,t.id_tindakan_farmasi,t.keterangan,s.nama staff, t.tanggal');
        $this->db->from('list_logistik l,tindakan_farmasi t, resep_obat r,staff s');
        $this->db->where(' t.id_list_tindakan=l.id_logistik');
        $this->db->where(' t.id_staff=s.id_staff');
        $this->db->where('t.id_resep = r.id_resep');
        $this->db->where('r.jenis_resep = 3');
        $this->db->where(' r.id_pelayanan', $id_pelayanan);
        // $this->db->group_by('t.id_list_tindakan');
        // $this->db->having('frek>0');
        $this->db->order_by('nama');

        return $this->db->get()->result();
    }

    public function getObatReturById($id)
    {

        $this->db->select('l.id_logistik,l.nama , t.frek,t.total,t.depo,t.kadaluarsa,l.margin,l.harga_cost,t.id_tindakan_farmasi,t.keterangan,t.id_staff staff');
        $this->db->from('list_logistik l,tindakan_farmasi t');
        $this->db->where(' t.id_list_tindakan=l.id_logistik');
        $this->db->where(' t.id_tindakan_farmasi', $id);
        return $this->db->get()->result();
    }
    public function selectPaketCendrawasih()
    {
        $this->db->select('*');
        $this->db->where('status', 'AKTIF');
        $this->db->where('jenis', 'Cendrawasih');
        $this->db->from('list_paket_mcu');
        $this->db->order_by('nama_paket');
        return $this->db->get()->result();
    }
    public function selectPaketObatById($id_pelayanan)
    {
        $this->db->select('l.nama_paket,l.harga,,s.nama,r.*');
        $this->db->from('resep_obat r, list_paket_mcu l,staff s');
        $this->db->where('r.id_paket = l.id_paket_mcu');
        $this->db->where('r.id_staff = s.id_staff');
        $this->db->where('r.id_pelayanan', $id_pelayanan);
        $this->db->order_by('r.tanggal', 'desc');

        return $this->db->get()->result();
    }
    public function getObat($cari)
    {
        $this->db->select('l.id_logistik,l.nama , l.margin,l.harga_cost,l.ppn');
        $this->db->from('list_logistik l');
        $this->db->where('l.status', 'AKTIF');
        $this->db->like('l.nama', $cari, 'both');
        $this->db->group_by('l.id_logistik');
        //$this->db->having('stok>0');
        $this->db->order_by('l.nama asc');
        // $this->db->limit(10);
        return $this->db->get()->result_array();
    }
    public function selectTipeKamarFisio() //Fisio
    {
        $this->db->select('DISTINCT(tipe_kamar) nama');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('list_tindakan_poli_fisio')->result();
    }
    public function selectTipeKamarHd() //Fisio
    {
        $this->db->select('DISTINCT(tipe_kamar) nama');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('list_tindakan_poli_hemodialisa')->result();
    }
    public function getTipeKamarFisio($spes) //fisio
    {
        if ($spes == 'ICU') {
            $spes = 'KELAS II';
        } else {
            $spes = $spes;
        }
        $this->db->select('*');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe_kamar', $spes);

        $this->db->order_by('nama');
        return $this->db->get('list_tindakan_poli_fisio')->result_array();
    }
    public function getTipeKamarFisio_lama($spes) //fisio
    {
        if ($spes == 'ICU') {
            $spes = 'KELAS II';
        } else {
            $spes = $spes;
        }
        $this->db->select('*');
        $this->db->where('status', 'LAMA');
        $this->db->where('tipe_kamar', $spes);

        $this->db->order_by('nama');
        return $this->db->get('list_tindakan_poli_fisio')->result_array();
    }
    public function getTipeKamarHD($spes) //fisio
    {
        $this->db->select('*');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe_kamar', $spes);

        $this->db->order_by('nama');
        return $this->db->get('list_tindakan_poli_hemodialisa')->result_array();
    }

    public function selectDataPasienGizi() //GIZI
    {
        $data_staff = $this->session->userdata('data_auth');
        $this->db->from('v_perawat_ranap');
        return $this->db->get()->result();
    }

    public function selectRiwayatDataPasienGizi()
    {
        $data_staff = $this->session->userdata('data_auth');
        $this->db->from('v_perawat_ranap');
        $this->db->where('keluar_kamar IS NOT NULL', null, false);
        return $this->db->get()->result();
    }


    public function selectDataDietGizi($id_pelayanan) //Diet
    {
        $data_staff = $this->session->userdata('data_auth');
        $this->db->select('p.*, s.nama');
        $this->db->from('pasien_gizi p, staff s');
        $this->db->where('p.id_staff = s.id_staff');
        $this->db->where('p.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function selectDataGiziby_id($id_pelayanan, $id_history)
    {
        $this->db->select('v.*, p.pekerjaan, p.agama');
        $this->db->from('v_perawat_ranap v, pasien p'); //total bayar 1
        $this->db->where('v.no_rm = p.no_rm');
        $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));

        return $this->db->get()->row();
    }

    public function getDataGizi($id_form)
    {
        $this->db->select('*');
        $this->db->from('pasien_gizi'); //total bayar 1
        $this->db->where('id_form', $id_form);
        return $this->db->get()->result();
    }


    public function getRiwayat($id_form)
    {
        $this->db->select('*');
        $this->db->from('history_pelayanan_ranap');
        $this->db->where('id_history', $id_form);
        $this->db->where('tgl_keluar IS NOT NULL', null, false); // Menambahkan kondisi not null pada tanggal keluar
        return $this->db->get()->result();
    }


    public function update_gizi($where,  $editData, $table) // gizi
    {
        $this->db->where($where);
        $this->db->update($table, $editData);
    }

    public function selectDataPerawatRanap() //RANAP
    {
        $data_staff = $this->session->userdata('data_auth');
        $this->db->from('staff');
        $this->db->where('ruangan !=', '');
        $this->db->where('tipe', 'rawatinap');
        return $this->db->get()->result();
    }

    public function getDataPerawat($id_staff)
    {
        $this->db->select('*');
        $this->db->from('staff');
        $this->db->where('id_staff', $id_staff);
        return $this->db->get()->result();
    }

    public function selectRuangan()
    {
        $this->db->select('distinct(nama_ruangan)');
        $this->db->from('ruangan');
        $this->db->order_by('nama_ruangan');
        return $this->db->get()->result_array();
    }
    public function update_ruangan($where, $page_data, $table) // Ranap
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function get_pemantauanTd_by_historyNpelayanan($id_history, $id_pelayanan)
    {
        return $this->db->get_where('catatan_tekanan_darah', ['id_history' => $id_history , 'id_pelayanan' => $id_pelayanan])->result();
    }

    public function get_pemantauanTd_by_hisNPelNTgl($id_history, $id_pelayanan, $tgl_data = null)
    {
        // Default pakai tanggal hari ini jika tidak dikirim
        if ($tgl_data === null) {
            $tgl_data = date('Y-m-d');
        }

        // Buat rentang tanggal
        $start = $tgl_data . ' 00:00:00';
        $end   = $tgl_data . ' 23:59:59';

        return $this->db
            ->where('id_history', $id_history)
            ->where('id_pelayanan', $id_pelayanan)
            ->where('tgl_input >=', $start)
            ->where('tgl_input <=', $end)
            ->get('catatan_tekanan_darah')
            ->result();
    }


    public function get_pemantauanTd_by_id($id)
    {
        return $this->db->get_where('catatan_tekanan_darah', ['id_catatan_tekanan_darah' => $id])->result();
    }

    public function get_pemantauanTd_Today($id_history , $id_pelayanan, $date)
    {
       return $this->db
        ->where('id_history', $id_history)
        ->where('id_pelayanan', $id_pelayanan)
        ->where('DATE(tgl_input)', $date)  // filter untuk tanggal hari ini
        ->get('catatan_tekanan_darah')
        ->result_array();
    }

    public function update_pemantauanTd($id, $data)
    {
        $this->db->where('id_catatan_tekanan_darah', $id);
        return $this->db->update('catatan_tekanan_darah', $data);
    }

    public function insert_pemantauanTd($data)
    {
        return $this->db->insert('catatan_tekanan_darah', $data);
    }

    public function hapus_pematauanTd($id)
    {
        // Pastikan parameter tidak kosong
        if (empty($id)) {
            return false;
        }

        $this->db->where('id_catatan_tekanan_darah', $id);
        $query = $this->db->delete('catatan_tekanan_darah');

        // Mengembalikan true/false sesuai hasil
        if ($query) {
            return true;
        } else {
            log_message('error', 'Gagal menghapus data catatan_tekanan_darah untuk id_pelayanan: '.$id_pelayanan.' dan id_history: '.$id_history);
            return false;
        }
    }

    public function get_riwayat_kamar_by_id($id_riwayat)
    {
        $this->db->select('*');
        $this->db->from('riwayat_kamar'); 
        $this->db->where('id_riwayat', $id_riwayat);
        return $this->db->get()->row();
    }

    public function get_kamar_terakhir_by_id_pel($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->from('riwayat_kamar');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('ket', '0');
        $this->db->order_by('tanggal_keluar', 'DESC');
        $this->db->limit(1);
        return $this->db->get()->row();
    }

}
=======
<?php

class M_Rawatinap extends CI_Model
{

    public function selectDataPasienRanapby_id($id_pelayanan, $id_history) // RANAP
    {
        $this->db->select('v.*,r.kelas');
        $this->db->from('v_apelkes v, ruangan r');
        $this->db->where('v.id_kamar = r.id_ruangan');
        $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
        return $this->db->get()->result();
    }
    public function getDokterById($id_dokter)
    {
        // Query untuk mendapatkan data dokter berdasarkan id_dokter
        $query = $this->db->get_where('dokter', array('id_dokter' => $id_dokter));

        // Mengembalikan hasil query sebagai array
        return $query->row_array();
    }


    public function selectDataPasienRanap($jenis) //RANAP
    {
        $data_staff = $this->session->userdata('data_auth');
        // $perawat = $this->db->get_where('staff',"ruangan LIKE '%$data_staff->ruangan%'")->row()->ruangan;
        if ($data_staff->tipe == 'rawatinap' && $data_staff->ruangan != '') {
            $ruangan = $data_staff->ruangan;
            if ($jenis == 'ranap') {
                $this->db->where("(nama_ruangan like '%$ruangan%')");
            } else {
                $this->db->where("(nama_ruangan ='ODC')");
            }
            // $this->db->where("(nama_ruangan like '%$ruangan%' or nama_ruangan ='ODC')");
            
            // $this->db->or_like('nama_ruangan','ODC');
            $this->db->where('keluar_kamar', NULL);
            $this->db->where('status_rawat !=', 'selesai');
            $this->db->from('v_perawat_ranap');
            return $this->db->get()->result();
        } else {
            if ($jenis == 'ranap') {
                $this->db->where("(nama_ruangan !='ODC')");
            } else {
                $this->db->where("(nama_ruangan ='ODC')");
            }
            $this->db->where('keluar_kamar', NULL);
            $this->db->where('status_rawat  !=', 'selesai');
            $this->db->from('v_perawat_ranap');
            return $this->db->get()->result();
        }
    }
    public function selectDataPasienRanap_riwayat($mulai, $akhir) //RANAP
    {
        $data_staff = $this->session->userdata('data_auth');
        $this->db->where('keluar_kamar !=', NULL);
        $this->db->where('status_rawat !=', 'selesai');
        $this->db->where("(date(keluar_kamar) between '$mulai' and '$akhir')");
        $this->db->from('v_perawat_ranap');
        return $this->db->get()->result();
    }
    public function selectDataPasienRanapDokter() //RANAP
    {
        $data_staff = $this->session->userdata('data_auth');
        // if ($data_staff->username == "20181004") {
        $dok = $this->db->get_where('dokter', ['username' => $data_staff->username])->row()->id_dokter;
        // var_dump($dok);
        $this->db->where('dpjp', $dok);
        // }
        $this->db->where('keluar_kamar', NULL);
        $this->db->where('status_rawat !=', 'selesai');
        $this->db->from('v_perawat_ranap');
        return $this->db->get()->result();
    }
    public function selectDataPasienRanapById($id_pelayanan) //RANAP
    {
        // $this->db->where('status', '1');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->from('v_perawat_ranap');
        return $this->db->get()->result();
    }

    public function selectKamar() // Ranap
    {
        $this->db->select('DISTINCT(kelas_ruangan) nama');
        $this->db->where('keterangan', 'AKTIF');
        $this->db->where('status', 'tersedia');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('ruangan')->result();
    }

    public function selectDataKamarByIdPel($id_pelayanan) //Ranap
    {
        $this->db->select('*');
        $this->db->from('v_kamar_apelkes');

        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('ket', '0');
        $this->db->order_by('tanggal_masuk', 'desc');
        return $this->db->get()->result();
    }

    public function Total_Harga_Byid($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('v_tindakan_apelkes');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function selectDataTindakanByIdPel($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->from('v_tindakan_apelkes');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function update_history($where, $page_data, $table) // Ranap
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function update_kamar_sekarang($where, $page_data, $table) // Ranap
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function update_kamar_baru($where, $page_data, $table) // Ranap
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function update_riwayat_kamar($where, $page_data, $table) // Ranap
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function insert_kamar($page_data, $table) // Ranap
    {
        $this->db->insert($table, $page_data);
    }

    public function getMaxKamar($id_pelayanan) // Ranap
    {
        $this->db->select('MAX(tanggal_keluar) max');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('ket', '0');

        return $this->db->get('riwayat_kamar')->result();
    }

    public function getMaxId($id_pelayanan, $try) // Ranap
    {
        $this->db->select('id_riwayat, id_kamar');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('tanggal_keluar', $try);
        $this->db->where('ket', '0');
        return $this->db->get('riwayat_kamar')->result();
    }

    public function update_riwayat_kamar_prev($where, $page_data, $table) // Ranap
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function update_riwayat_kamar_now($where, $page_data, $table) // Ranap
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function getTempatTidur($spes) //Ranap
    {
        $this->db->select('DISTINCT(tipe), id_ruangan');
        $this->db->where('keterangan', 'AKTIF');
        $this->db->where('status', 'tersedia');
        $this->db->where('kelas_ruangan', $spes);
        return $this->db->get('ruangan')->result();
    }
    public function get_ai_tbl_riwayat()
    {
        return $this->db->query('select generate_id_riwayat() as id from dual')->row()->id;
    }
    public function selectResepById($id_pelayanan)
    {
        $this->db->select('r.*, p.cara_bayar');
        $this->db->from('resep_obat r, pelayanan p');
        $this->db->where('r.id_pelayanan = p.id_pelayanan');
        $this->db->where('r.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function request_resep($where, $data)
    {
        $this->db->where('id_resep', $where);
        $this->db->update('resep_obat', $data);
    }
    public function selectObatByResep($id_resep)
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('resep_obat r, tindakan_farmasi t, list_logistik l , staff s');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_resep = r.id_resep');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('r.id_resep', $id_resep);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }
    public function selectRacikanByResep($id_resep)
    {
        $this->db->select('*');
        $this->db->from('resep_obat r, resep_racikan ra');
        $this->db->where('r.id_resep = ra.id_resep');
        $this->db->where('ra.id_resep', $id_resep);
        $this->db->order_by('ra.tanggal desc');

        return $this->db->get()->result();
    }
    public function getNamaObat()
    {
        $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
        $this->db->from('stok_depo sl, list_logistik l');
        $this->db->where(' sl.id_logistik=l.id_logistik');
        $this->db->group_by('sl.id_logistik');
        $this->db->having('stok>0');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function getNamaObatRuang($stok)
    {
        $staff = $this->session->userdata('data_auth');

        $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn,l.satuan_ok');
        $this->db->from($stok . ' sl, list_logistik l');
        $this->db->where(' sl.id_logistik=l.id_logistik');
        if ($stok == 'stok_ranap' && $staff->ruangan != '') {
            $this->db->where(' sl.id_resep', $staff->ruangan);
        }
        $this->db->group_by('sl.id_logistik');
        $this->db->having('stok>0');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function selectObatById($id_pelayanan)
    {
        $staff = $this->session->userdata('data_auth');
        if ($staff->tipe == 'kemoterapi') {
            $this->db->select('t.*, l.nama, s.nama staff');
            $this->db->from(' tindakan_farmasi t, list_logistik l,stok_kemo k , staff s');
            $this->db->where('t.id_tindakan_farmasi = k.id_req');
            $this->db->where('t.id_list_tindakan=l.id_logistik');
            $this->db->where('s.id_staff=t.id_staff');
            $this->db->where('t.id_resep', 'OBAT RUANG');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            $this->db->order_by('t.tanggal desc');
        } else {
            $this->db->select('t.*, l.nama, s.nama staff');
            $this->db->from(' tindakan_farmasi t, list_logistik l , staff s');
            $this->db->where('t.id_list_tindakan=l.id_logistik');
            $this->db->where('s.id_staff=t.id_staff');
            $this->db->where('t.id_resep', 'OBAT RUANG');

            $this->db->where("((t.jenis_pelayanan ='RANAP' or t.jenis_pelayanan ='RAWAT INAP') or s.tipe='rawatinap')");

            $this->db->where('t.id_pelayanan', $id_pelayanan);
            $this->db->order_by('t.tanggal desc');
        }


        return $this->db->get()->result();
    }
    public function getTotalObat($id_pelayanan)
    {
        $staff = $this->session->userdata('data_auth');
        if ($staff->tipe == 'kemoterapi') {
            $this->db->select_sum('t.total');
            $this->db->from('tindakan_farmasi t,stok_kemo k ');
            $this->db->where('t.id_tindakan_farmasi = k.id_req');
            $this->db->where('t.id_resep', 'OBAT RUANG');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
        } else {
            $this->db->select_sum('total');
            $this->db->from('tindakan_farmasi');
            $this->db->where('id_resep', 'OBAT RUANG');
            $this->db->where("(jenis_pelayanan ='RANAP' or jenis_pelayanan ='RAWAT INAP')");
            $this->db->where('id_pelayanan', $id_pelayanan);
        }

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
        $this->db->where("(t.jenis_pelayanan ='RANAP' or t.jenis_pelayanan ='RAWAT INAP')");
        $this->db->group_by('t.id_list_tindakan');
        return $this->db->get()->result_array();
    }
    public function getDataByIdResep($id_pelayanan, $id_history)
    {
        $query =  $this->db->query("SELECT pa.nama,pa.no_rm,pa.tgl_lahir, pa.alamat,c.nama  cara_bayar,a.nama asal,d.nama dokter, d.foto,r1.tipe ruang
        from pasien pa, pelayanan p, dokter d,cara_bayar c,   asal_pasien  a, history_pelayanan_ranap h,  ruangan r1  
        WHERE pa.no_rm=p.id_pasien and p.asal_pasien=a.id_asal_pasien and p.cara_bayar=c.id_cara_bayar and h.dpjp=d.id_dokter
        and p.id_pelayanan=h.id_pelayanan and h.id_kamar=r1.id_ruangan and p.id_pelayanan = '$id_pelayanan' and h.id_history = '$id_history'
        ");
        return $query->row_array();
    }
    public function getSumObat($obat, $stok)
    {
        $staff = $this->session->userdata('data_auth');
        $this->db->select('sum(frek) stok');
        $this->db->from($stok);
        if ($stok == 'stok_ranap' && $staff->ruangan != '') {
            $this->db->where('id_resep', $staff->ruangan);
        }
        $this->db->where('id_logistik', $obat);
        return $this->db->get()->row_array();
    }
    public function getNamaObatByDepo($depo)
    {
        if ($depo == 'APOTIK') {
            $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,sl.kadaluarsa,l.margin,l.harga_cost');
            $this->db->from('stok_apotik sl, list_logistik l');
            $this->db->where(' sl.id_logistik=l.id_logistik');
            $this->db->group_by('sl.id_logistik');
            $this->db->having('stok>0');
            $this->db->order_by('nama');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,sl.kadaluarsa,l.margin,l.harga_cost');
            $this->db->from('stok_igd sl, list_logistik l');
            $this->db->where(' sl.id_logistik=l.id_logistik');
            $this->db->group_by('sl.id_logistik');
            $this->db->having('stok>0');
            $this->db->order_by('nama');
            return $this->db->get()->result_array();
        }
    }
    public function getExpByObatApotik($obat)
    {
        $this->db->select('sum(s.frek) stok, s.kadaluarsa,l.margin,l.harga_cost,l.id_logistik,l.nama');
        $this->db->from('stok_apotik s, list_logistik l');
        $this->db->where(' s.id_logistik=l.id_logistik');
        $this->db->where(' s.id_logistik', $obat);
        $this->db->group_by('s.id_stok');
        $this->db->having('sum(s.frek)>0');
        return $this->db->get()->result_array();
    }
    public function getExpByObatIGD($obat)
    {
        $this->db->select('sum(s.frek) stok, s.kadaluarsa,l.margin,l.harga_cost,l.id_logistik,l.nama');
        $this->db->from('stok_igd s, list_logistik l');
        $this->db->where(' s.id_logistik=l.id_logistik');
        $this->db->where(' s.id_logistik', $obat);
        $this->db->group_by('s.id_stok');
        $this->db->having('sum(s.frek)>0');
        return $this->db->get()->result_array();
    }
    public function delete_resep($id_resep)
    {
        $this->db->delete('resep_obat', array('id_resep' => $id_resep));
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
        } else {
            $this->db->delete('stok_igd', array('id_req' => $id_tindakan));
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
    public function insert_tindakan($page_data, $table)
    {
        $this->db->insert($table, $page_data);
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

    public function selectDataFormById($id_pelayanan, $id_tindakan)
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

    public function delete_radiologi($id_tindakan_radiologi)
    {
        $this->db->delete('tindakan_radiologi', array('id_tindakan_radiologi' => $id_tindakan_radiologi));
    }

    public function delete_gizi($id_form)
    {
        $this->db->delete('pasien_gizi', array('id_form' => $id_form));
    }

    public function selectNamaRadiologi()
    {
        $this->db->select('nama, id_daftar_tindakan, harga');
        $this->db->where('status', 'AKTIF');
        $this->db->from('list_tindakan_radiologi');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }

    // End

    //fisio
    public function selectNamaTindakan($table)
    {
        $this->db->select('nama nama_tindakan,id_list_tindakan, harga_jasa, harga_sarana');
        $this->db->where('status', 'AKTIF');
        $this->db->from($table);
        $this->db->order_by('nama_tindakan');
        return $this->db->get()->result_array();
    }

    public function selectNamaDPJP()
    {
        $this->db->select('nama, id_dokter');
        //$this->db->where_not_in('id_dokter');
        $this->db->where('status', 'AKTIF');
        $this->db->from('dokter');
        $this->db->group_by('nama');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }

    public function selectNamaStaff()
    {
        $this->db->select('nama, id_staff');
        //$this->db->where_not_in('id_dokter');
        $this->db->where('tipe', 'ok');
        $this->db->from('staff');
        $this->db->group_by('nama');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    //  Labor


    public function selectDataLaborById($id_pelayanan)
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

    public function Total_Labor_Byid($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_labor');
        $this->db->where('id_pelayanan', $id_pelayanan);
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
        $this->db->select('nama, id_daftar_tindakan, harga');
        $this->db->where('status', 'AKTIF');
        $this->db->from('list_tindakan_labor');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    // End
    public function select($id_resep)
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('resep_obat r, tindakan_farmasi t, list_logistik l , staff s');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_resep = r.id_resep');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('r.id_resep', $id_resep);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }
    public function selectDataPasienIGD()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT v.*
        FROM v_erm_igd v, form_ass_dokter_igd d, form_ass_per_igd f
        where v.id_pelayanan = d.id_pelayanan and v.id_pelayanan = f.id_pelayanan 
         and v.tgl_masuk = '$tgl' and v.total_bayar=1
        ORDER BY v.tgl_masuk desc");
        return $query->result();
    }
    public function selectDataPasienIGDRange($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT v.tgl_lahir, v.tgl_masuk, v.no_rm, v.id_pelayanan, v.id_history, v.nama, v.jenis_kelamin,v.jenis_pelayanan, v.cara_bayar 
        FROM v_erm_igd v, form_ass_dokter_igd d, form_ass_per_igd f
        where v.id_pelayanan = d.id_pelayanan and v.id_pelayanan = f.id_pelayanan 
        and v.tgl_masuk >= '$mulai' and v.tgl_masuk <= '$akhir' and  v.total_bayar=1
        ORDER BY v.tgl_masuk desc");
        return $query->result();
    }
    // RIWAYAT ERM
    public function selectRiwayatIGD()
    {

        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT v.*
        FROM v_erm_igd v where v.id_pelayanan in (Select id_pelayanan from history_pelayanan_ranap where status=1) 
        and v.tgl_masuk = '$tgl'
        ORDER BY v.tgl_masuk desc");
        return $query->result();
    }
    public function selectRiwayatIGDRange($mulai, $akhir)
    {
        $query = $this->db->query("SELECT v.*
        FROM v_erm_igd v where v.id_pelayanan in (Select id_pelayanan from history_pelayanan_ranap where status=1) 
        and v.tgl_masuk >= '$mulai' and v.tgl_masuk <= '$akhir'
        ORDER BY v.tgl_masuk desc");
        return $query->result();
    }
    public function selectDataPasienRetur() //RETUR
    {
        $this->db->select('v.*');
        $this->db->from('v_perawat_ranap v, resep_obat r');
        $this->db->where('v.id_pelayanan = r.id_pelayanan');
        $this->db->where('r.jenis_resep = 3');
        $this->db->group_by('v.id_pelayanan');
        return $this->db->get()->result();
    }
    public function getNamaObatReturn($id_pelayanan)
    {

        $this->db->select('l.id_logistik,l.nama , t.frek,t.total,t.depo,t.kadaluarsa,l.margin,l.harga_cost,t.id_tindakan_farmasi,t.keterangan,s.nama staff, t.tanggal');
        $this->db->from('list_logistik l,tindakan_farmasi t, resep_obat r,staff s');
        $this->db->where(' t.id_list_tindakan=l.id_logistik');
        $this->db->where(' t.id_staff=s.id_staff');
        $this->db->where('t.id_resep = r.id_resep');
        $this->db->where('r.jenis_resep = 3');
        $this->db->where(' r.id_pelayanan', $id_pelayanan);
        // $this->db->group_by('t.id_list_tindakan');
        // $this->db->having('frek>0');
        $this->db->order_by('nama');

        return $this->db->get()->result();
    }

    public function getObatReturById($id)
    {

        $this->db->select('l.id_logistik,l.nama , t.frek,t.total,t.depo,t.kadaluarsa,l.margin,l.harga_cost,t.id_tindakan_farmasi,t.keterangan,t.id_staff staff');
        $this->db->from('list_logistik l,tindakan_farmasi t');
        $this->db->where(' t.id_list_tindakan=l.id_logistik');
        $this->db->where(' t.id_tindakan_farmasi', $id);
        return $this->db->get()->result();
    }
    public function selectPaketCendrawasih()
    {
        $this->db->select('*');
        $this->db->where('status', 'AKTIF');
        $this->db->where('jenis', 'Cendrawasih');
        $this->db->from('list_paket_mcu');
        $this->db->order_by('nama_paket');
        return $this->db->get()->result();
    }
    public function selectPaketObatById($id_pelayanan)
    {
        $this->db->select('l.nama_paket,l.harga,,s.nama,r.*');
        $this->db->from('resep_obat r, list_paket_mcu l,staff s');
        $this->db->where('r.id_paket = l.id_paket_mcu');
        $this->db->where('r.id_staff = s.id_staff');
        $this->db->where('r.id_pelayanan', $id_pelayanan);
        $this->db->order_by('r.tanggal', 'desc');

        return $this->db->get()->result();
    }
    public function getObat($cari)
    {
        $this->db->select('l.id_logistik,l.nama , l.margin,l.harga_cost,l.ppn');
        $this->db->from('list_logistik l');
        $this->db->where('l.status', 'AKTIF');
        $this->db->like('l.nama', $cari, 'both');
        $this->db->group_by('l.id_logistik');
        //$this->db->having('stok>0');
        $this->db->order_by('l.nama asc');
        // $this->db->limit(10);
        return $this->db->get()->result_array();
    }
    public function selectTipeKamarFisio() //Fisio
    {
        $this->db->select('DISTINCT(tipe_kamar) nama');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('list_tindakan_poli_fisio')->result();
    }
    public function selectTipeKamarHd() //Fisio
    {
        $this->db->select('DISTINCT(tipe_kamar) nama');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('list_tindakan_poli_hemodialisa')->result();
    }
    public function getTipeKamarFisio($spes) //fisio
    {
        if ($spes == 'ICU') {
            $spes = 'KELAS II';
        } else {
            $spes = $spes;
        }
        $this->db->select('*');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe_kamar', $spes);

        $this->db->order_by('nama');
        return $this->db->get('list_tindakan_poli_fisio')->result_array();
    }
    public function getTipeKamarFisio_lama($spes) //fisio
    {
        if ($spes == 'ICU') {
            $spes = 'KELAS II';
        } else {
            $spes = $spes;
        }
        $this->db->select('*');
        $this->db->where('status', 'LAMA');
        $this->db->where('tipe_kamar', $spes);

        $this->db->order_by('nama');
        return $this->db->get('list_tindakan_poli_fisio')->result_array();
    }
    public function getTipeKamarHD($spes) //fisio
    {
        $this->db->select('*');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe_kamar', $spes);

        $this->db->order_by('nama');
        return $this->db->get('list_tindakan_poli_hemodialisa')->result_array();
    }

    public function selectDataPasienGizi() //GIZI
    {
        $data_staff = $this->session->userdata('data_auth');
        $this->db->from('v_perawat_ranap');
        return $this->db->get()->result();
    }

    public function selectRiwayatDataPasienGizi()
    {
        $data_staff = $this->session->userdata('data_auth');
        $this->db->from('v_perawat_ranap');
        $this->db->where('keluar_kamar IS NOT NULL', null, false);
        return $this->db->get()->result();
    }


    public function selectDataDietGizi($id_pelayanan) //Diet
    {
        $data_staff = $this->session->userdata('data_auth');
        $this->db->select('p.*, s.nama');
        $this->db->from('pasien_gizi p, staff s');
        $this->db->where('p.id_staff = s.id_staff');
        $this->db->where('p.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function selectDataGiziby_id($id_pelayanan, $id_history)
    {
        $this->db->select('v.*, p.pekerjaan, p.agama');
        $this->db->from('v_perawat_ranap v, pasien p'); //total bayar 1
        $this->db->where('v.no_rm = p.no_rm');
        $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));

        return $this->db->get()->row();
    }

    public function getDataGizi($id_form)
    {
        $this->db->select('*');
        $this->db->from('pasien_gizi'); //total bayar 1
        $this->db->where('id_form', $id_form);
        return $this->db->get()->result();
    }


    public function getRiwayat($id_form)
    {
        $this->db->select('*');
        $this->db->from('history_pelayanan_ranap');
        $this->db->where('id_history', $id_form);
        $this->db->where('tgl_keluar IS NOT NULL', null, false); // Menambahkan kondisi not null pada tanggal keluar
        return $this->db->get()->result();
    }


    public function update_gizi($where,  $editData, $table) // gizi
    {
        $this->db->where($where);
        $this->db->update($table, $editData);
    }

    public function selectDataPerawatRanap() //RANAP
    {
        $data_staff = $this->session->userdata('data_auth');
        $this->db->from('staff');
        $this->db->where('ruangan !=', '');
        $this->db->where('tipe', 'rawatinap');
        return $this->db->get()->result();
    }

    public function getDataPerawat($id_staff)
    {
        $this->db->select('*');
        $this->db->from('staff');
        $this->db->where('id_staff', $id_staff);
        return $this->db->get()->result();
    }

    public function selectRuangan()
    {
        $this->db->select('distinct(nama_ruangan)');
        $this->db->from('ruangan');
        $this->db->order_by('nama_ruangan');
        return $this->db->get()->result_array();
    }
    public function update_ruangan($where, $page_data, $table) // Ranap
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function get_pemantauanTd_by_historyNpelayanan($id_history, $id_pelayanan)
    {
        return $this->db->get_where('catatan_tekanan_darah', ['id_history' => $id_history , 'id_pelayanan' => $id_pelayanan])->result();
    }

    public function get_pemantauanTd_by_hisNPelNTgl($id_history, $id_pelayanan, $tgl_data = null)
    {
        // Default pakai tanggal hari ini jika tidak dikirim
        if ($tgl_data === null) {
            $tgl_data = date('Y-m-d');
        }

        // Buat rentang tanggal
        $start = $tgl_data . ' 00:00:00';
        $end   = $tgl_data . ' 23:59:59';

        return $this->db
            ->where('id_history', $id_history)
            ->where('id_pelayanan', $id_pelayanan)
            ->where('tgl_input >=', $start)
            ->where('tgl_input <=', $end)
            ->get('catatan_tekanan_darah')
            ->result();
    }


    public function get_pemantauanTd_by_id($id)
    {
        return $this->db->get_where('catatan_tekanan_darah', ['id_catatan_tekanan_darah' => $id])->result();
    }

    public function get_pemantauanTd_Today($id_history , $id_pelayanan, $date)
    {
       return $this->db
        ->where('id_history', $id_history)
        ->where('id_pelayanan', $id_pelayanan)
        ->where('DATE(tgl_input)', $date)  // filter untuk tanggal hari ini
        ->get('catatan_tekanan_darah')
        ->result_array();
    }

    public function update_pemantauanTd($id, $data)
    {
        $this->db->where('id_catatan_tekanan_darah', $id);
        return $this->db->update('catatan_tekanan_darah', $data);
    }

    public function insert_pemantauanTd($data)
    {
        return $this->db->insert('catatan_tekanan_darah', $data);
    }

    public function hapus_pematauanTd($id)
    {
        // Pastikan parameter tidak kosong
        if (empty($id)) {
            return false;
        }

        $this->db->where('id_catatan_tekanan_darah', $id);
        $query = $this->db->delete('catatan_tekanan_darah');

        // Mengembalikan true/false sesuai hasil
        if ($query) {
            return true;
        } else {
            log_message('error', 'Gagal menghapus data catatan_tekanan_darah untuk id_pelayanan: '.$id_pelayanan.' dan id_history: '.$id_history);
            return false;
        }
    }

    public function get_riwayat_kamar_by_id($id_riwayat)
    {
        $this->db->select('*');
        $this->db->from('riwayat_kamar'); 
        $this->db->where('id_riwayat', $id_riwayat);
        return $this->db->get()->row();
    }

    public function get_kamar_terakhir_by_id_pel($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->from('riwayat_kamar');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('ket', '0');
        $this->db->order_by('tanggal_keluar', 'DESC');
        $this->db->limit(1);
        return $this->db->get()->row();
    }

}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
