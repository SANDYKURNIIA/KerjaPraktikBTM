<?php

class M_Erm_ranap extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }
    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
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

    public function insert_rencana($data, $table)
    {
        $result = $this->db->insert($table, $data);
        return $result; // Mengembalikan true jika berhasil, false jika gagal
    }




    public function selectDataPasien($no_rm)
    {
        $query = $this->db->query("SELECT * FROM (
        SELECT p.id_pasien no_rm,p.tgl_masuk,p.tgl_keluar,d.nama dokter,p.diagnosa,l.nama_panjang jenis_pelayanan
        from pelayanan p , dokter d , history_pelayanan h , list_poli l
        where h.dpjp = d.id_dokter and p.id_pelayanan = h.id_pelayanan and h.nama_poli = l.id_list_poli and p.status_rawat = 'selesai' and p.id_pasien ='$no_rm'
        union 
        select p.id_pasien no_rm,p.tgl_masuk,p.tgl_keluar,d.nama dokter,p.diagnosa,h.jenis_pelayanan
        from pelayanan p , dokter d , history_pelayanan_ugd h 
        where h.dpjp = d.id_dokter and p.id_pelayanan = h.id_pelayanan and p.status_rawat = 'selesai' and p.id_pasien ='$no_rm'
        union 
        select p.id_pasien AS no_rm,p.tgl_masuk,p.tgl_keluar,d.nama AS dokter,p.diagnosa,h.jenis_pelayanan
        from pelayanan p , dokter d , history_pelayanan_ranap h 
        where h.dpjp = d.id_dokter and p.id_pelayanan = h.id_pelayanan and p.status_rawat = 'selesai' and p.id_pasien ='$no_rm'
        ) as gabung
        order by tgl_keluar
        limit 3
        ");
        return $query->result_array();
    }
    public function getErm($no_rm)
    {
        $this->db->select('p.tgl_masuk, p.tgl_keluar,p.diagnosa, p.id_pelayanan,h.id_history, d.nama dpjp ');
        $this->db->from('pelayanan p, history_pelayanan_ugd h, dokter d, form_ass_dokter_igd fd, form_ass_per_igd f');
        $this->db->where('p.id_pelayanan = h.id_pelayanan');
        $this->db->where('fd.id_history = h.id_history');
        $this->db->where('f.id_history = h.id_history');
        $this->db->where('h.dpjp = d.id_dokter');
        $this->db->where('p.total_bayar = 1');
        $this->db->where('p.id_pasien', $no_rm);
        $this->db->order_by('p.tgl_keluar');
        $this->db->limit(3);
        return $this->db->get()->result();
    }

    public function selectPemcairaninfus($id_pelayanan)
    {
        $this->db->select('i.*, p.tgl_masuk, s.nama staff');
        $this->db->from('catatan_pemakaian_cairan_infus i, pelayanan p, staff s');
        $this->db->where('i.id_pelayanan = p.id_pelayanan');
        $this->db->where('i.staff = s.id_staff');
        $this->db->where('i.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }


    public function selectDataPasienRanapby_id($id_pelayanan, $id_history)
    {
        $this->db->select('v.*, p.pekerjaan, p.agama, p.status perkawinan, p.alamat');
        $this->db->from('v_kunjungan v, pasien p'); //total bayar 1
        $this->db->where('v.no_rm = p.no_rm');
        $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));

        return $this->db->get()->row();
    }

    public function getRuangByRiwayatKamar($id_pelayanan)
    {
        $this->db->select('rk.id_pelayanan, rk.id_kamar,  r.tipe nama_ruangan');
        $this->db->from('riwayat_kamar rk');
        $this->db->join('ruangan r', 'rk.id_kamar = r.id_ruangan');
        $this->db->where('rk.id_pelayanan', $id_pelayanan);

        return $this->db->get()->row();
    }

    public function getCetakSuperRanap($id_pelayanan)
    {
        $this->db->select('f.*, p.nama, p.tgl_lahir, p.jenis_kelamin');
        $this->db->from('form_perintah_ranap f, pasien p');
        $this->db->where('p.no_rm = f.no_rm');
        $this->db->where('f.id_pelayanan', $id_pelayanan);
        return $this->db->get()->row_array();
    }
    public function checkData($where, $table)
    {
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get()->row_array();
    }


    public function selectNamaRadiologi($kelas)
    {
        $this->db->select('nama, id_daftar_tindakan, harga');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe_kamar', $kelas);
        $this->db->from('list_tindakan_radiologi');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function selectNamaRadiologi_lama($kelas)
    {
        $this->db->select('nama, id_daftar_tindakan, harga');
        $this->db->where('status', 'LAMA');
        $this->db->where('tipe_kamar', $kelas);
        $this->db->from('list_tindakan_radiologi');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function selectNamaLabor($kelas)
    {
        $this->db->select('*');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe_kamar', $kelas);
        $this->db->from('list_tindakan_labor');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function selectNamaLabor_lama($kelas)
    {
        $this->db->select('*');
        $this->db->where('status', 'LAMA');
        $this->db->where('tipe_kamar', $kelas);
        $this->db->from('list_tindakan_labor');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function selectDataImd($id_pelayanan, $id_history)
    {
        $this->db->select('i.*');
        $this->db->from('imd_asi_eksklusif i'); //total bayar 1
        // $this->db->where('v.no_rm = p.no_rm');
        $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));

        return $this->db->get()->row();
    }
    public function selectBayi($id_pelayanan, $id_history)
    {
        $this->db->select('i.*');
        $this->db->from('bayi_rawat_gabung i'); //total bayar 1
        // $this->db->where('v.no_rm = p.no_rm');
        $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));

        return $this->db->get()->row();
    }
    public function selectRencanaKep($id_pelayanan)
    {
        $this->db->select('r.*, p.tgl_masuk');
        $this->db->from('rencana_keperawatan r, pelayanan p');
        $this->db->where('r.id_pelayanan = p.id_pelayanan');
        $this->db->where('r.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function selectCatatanPer($id_pelayanan)
    {
        $this->db->select('c.*, p.tgl_masuk, s.nama');
        $this->db->from('catatan_perkembangan_terintegrasi c');
        $this->db->join('pelayanan p', 'c.id_pelayanan = p.id_pelayanan');
        $this->db->join('staff s', 'c.staff = s.id_staff');
        // $this->db->join('staff s', 'c.staff = s.id_staff');
        $this->db->where('c.id_pelayanan', $id_pelayanan);
        $this->db->order_by('c.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function selectUlangGeriatri($id_pelayanan)
    {
        $this->db->select('ug.*, p.tgl_masuk, s.nama');
        $this->db->from('asesmen_ulang_geriatri ug,pelayanan p,staff s');
        $this->db->where('ug.id_pelayanan = p.id_pelayanan');
        $this->db->where('p.id_staff = s.id_staff');
        return $this->db->get()->result();
    }

    public function getResikoUlangJatuhDewasa($id_asesmen)
    {
        $query = $this->db->get_where('resiko_ulang_jatuh_dewasa', ['id_asesmen' => $id_asesmen]);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }


    // public function selectUlangJatuh($id_pelayanan)
    // {
    //     $this->db->select('ud.*, p.tgl_masuk, s.nama'); 
    //     $this->db->from('asesmen_ulang_dewasa ud');
    //     $this->db->join('pelayanan p', 'ud.id_pelayanan = p.id_pelayanan');
    //     $this->db->join('staff s', 'ud.staff = s.id_staff'); 
    //     $this->db->where('ud.id_pelayanan', $id_pelayanan);
    //     return $this->db->get()->result();
    // }

    public function selectUlangJatuh($id_pelayanan)
    {
        $this->db->select('ud.*, p.tgl_masuk, s.*, s.nama');
        $this->db->from('asesmen_ulang_dewasa ud,pelayanan p,staff s');
        $this->db->where('ud.id_pelayanan = p.id_pelayanan');
        $this->db->where('p.id_staff = s.id_staff');
        $this->db->where('ud.id_pelayanan', $id_pelayanan);
        // $this->db->where('s.id_staff', 0);
        return $this->db->get()->result();
    }
    public function update_rencana($id, $data)
    {
        $this->db->where('id_rencana', $id);
        return $this->db->update('rencana_keperawatan', $data);
    }
    public function update_infus($id, $data)
    {
        $this->db->where('id_infus', $id);
        return $this->db->update('daftar_infus_sehari', $data);
    }
    public function selectAnalisis($id_pelayanan)
    {
        $this->db->select('a.*, p.tgl_masuk');
        $this->db->from('analisis_data a, pelayanan p');
        $this->db->where('a.id_pelayanan = p.id_pelayanan');
        $this->db->where('a.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function update_analisis($id, $data)
    {
        $this->db->where('id_analisis', $id);
        return $this->db->update('analisis_data', $data);
    }
    public function selectPerTindakanDok($id_pelayanan)
    {
        $this->db->select('f.*, p.tgl_masuk');
        $this->db->from('form_ranap_persetujuan_tindakan_dokter f, pelayanan p');
        $this->db->where('f.id_pelayanan = p.id_pelayanan');
        $this->db->where('f.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function selectInfusSehari($id_pelayanan)
    {
        $this->db->select('d.*, p.tgl_masuk');
        $this->db->from('daftar_infus_sehari d, pelayanan p');
        $this->db->where('d.id_pelayanan = p.id_pelayanan');
        $this->db->where('d.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function selectPemantauanSehari($id_pelayanan)
    {
        $this->db->select('d.*, p.tgl_masuk');
        $this->db->from('data_pemantauan_vital d, pelayanan p');
        $this->db->where('d.id_pelayanan = p.id_pelayanan');
        $this->db->where('d.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function selectPengobatan($id_pelayanan)
    {
        $this->db->select('d.*, p.tgl_masuk, s.nama staff');
        $this->db->from('daftar_pengobatan d, pelayanan p, staff s');
        $this->db->where('d.id_pelayanan = p.id_pelayanan');
        $this->db->where('d.staff = s.id_staff');
        $this->db->where('d.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function update_pengobatan($id, $data)
    {
        $this->db->where('id_pengobatan', $id);
        return $this->db->update('daftar_pengobatan', $data);
    }
    public function update_catatan($id, $data)
    {
        $this->db->where('id_catatan', $id);
        return $this->db->update('catatan_perkembangan_terintegrasi', $data);
    }
    public function update_asesmen($id, $data)
    {
        $this->db->where('id_form', $id);
        return $this->db->update('form_ass_per_ranap', $data);
    }
    public function update_evaluasi($id, $data)
    {
        $this->db->where('id_evaluasi', $id);
        return $this->db->update('lembar_evaluasi_dpjp', $data);
    }
    public function update_awal_dewasa($id, $data)
    {
        $this->db->where('id_asesmen', $id);
        return $this->db->update('asesmen_awal_dewasa', $data);
    }
    public function update_ulang_dewasa($id, $data)
    {
        $this->db->where('id_asesmen', $id);
        return $this->db->update('asesmen_ulang_dewasa', $data);
    }
    public function update_resiko_ulang_jatuh($id, $data)
    {
        $this->db->where('id_asesmen', $id);
        return $this->db->update('resiko_ulang_jatuh_dewasa', $data);
    }
    public function update_awal_geriatri($id, $data)
    {
        $this->db->where('id_asesmen', $id);
        return $this->db->update('asesmen_awal_geriatri', $data);
    }
    public function update_ulang_geriatri($id, $data)
    {
        $this->db->where('id_asesmen', $id);
        return $this->db->update('asesmen_ulang_geriatri', $data);
    }
    public function update_imd_asi($id, $data)
    {
        $this->db->where('id_imd', $id);
        return $this->db->update('imd_asi_eksklusif', $data);
    }
    public function update_bayi($id, $data)
    {
        $this->db->where('id_gabung', $id);
        return $this->db->update('bayi_rawat_gabung', $data);
    }
    public function update_ass_dokter($id, $data)
    {
        $this->db->where('id_form', $id);
        return $this->db->update('form_ass_dokter_ranap', $data);
    }
    public function cetakPersetujuan($id)
    {
        // $this->db->select('f.*, p.nama pasien,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,p.alamat almt,p.kelurahan,p.kecamatan,p.provinsi,dok.nama dpjp');
        // $this->db->from('form_ranap_persetujuan_tindakan_dokter f, pelayanan b,pasien p,cara_bayar c,history_pelayanan_ugd h, dokter dok');
        // $this->db->where('f.id_pelayanan = b.id_pelayanan');
        // $this->db->where('f.no_rm = p.no_rm');
        // $this->db->where('b.cara_bayar = c.id_cara_bayar');
        // $this->db->where('h.id_pelayanan = b.id_pelayanan');
        // $this->db->where('h.dpjp = dok.id_dokter');
        // $this->db->where('f.id_form_persetujuan_tindakan_dokter', $id);
        // return $this->db->get()->row_array();
        $this->db->select('f.*, p.nama pasien,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,p.agama,dok.nama dpjp');
        $this->db->from('form_ranap_persetujuan_tindakan_dokter f, pelayanan b,pasien p,cara_bayar c, dokter dok');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        $this->db->where('f.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('f.id_form_persetujuan_tindakan_dokter', $id);
        return $this->db->get()->row_array();
    }
    public function cetakImdAsi($id)
    {

        $this->db->select('i.*, p.nama pasien,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,p.agama');
        $this->db->from('imd_asi_eksklusif i, pelayanan b,pasien p,cara_bayar c');
        $this->db->where('i.id_pelayanan = b.id_pelayanan');
        $this->db->where('i.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('i.id_imd', $id);
        return $this->db->get()->row_array();
    }
    public function cetakBayiGabung($id)
    {

        $this->db->select('ba.*, p.nama pasien,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,p.agama');
        $this->db->from('bayi_rawat_gabung ba, pelayanan b,pasien p,cara_bayar c');
        $this->db->where('ba.id_pelayanan = b.id_pelayanan');
        $this->db->where('ba.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('ba.id_gabung', $id);
        return $this->db->get()->row_array();
    }
    public function cetakAnalisis($id)
    {

        $this->db->select('ad.*, p.nama pasien,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,p.agama');
        $this->db->from('analisis_data ad, pelayanan b,pasien p,cara_bayar c');
        $this->db->where('ad.id_pelayanan = b.id_pelayanan');
        $this->db->where('ad.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('ad.id_analisis', $id);
        return $this->db->get()->row_array();
    }
    public function cetakEvaluasi($id)
    {
        // $this->db->select('le.*, p.nama pasien,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,dok.nama dpjp');
        // $this->db->from('lembar_evaluasi_dpjp le, pelayanan b,pasien p,cara_bayar c,history_pelayanan_ugd h, dokter dok');
        // $this->db->where('le.id_pelayanan = b.id_pelayanan');
        // $this->db->where('le.no_rm = p.no_rm');
        // $this->db->where('b.cara_bayar = c.id_cara_bayar');
        // $this->db->where('h.id_pelayanan = b.id_pelayanan');
        // $this->db->where('h.dpjp = dok.id_dokter');
        // $this->db->where('le.id_evaluasi', $id);
        // return $this->db->get()->row_array();
        $this->db->select('le.*, p.nama pasien,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,p.agama');
        $this->db->from('lembar_evaluasi_dpjp le, pelayanan b,pasien p,cara_bayar c');
        $this->db->where('le.id_pelayanan = b.id_pelayanan');
        $this->db->where('le.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('le.id_evaluasi', $id);
        return $this->db->get()->row_array();
    }
    public function cetakAwalDewasa($id)
    {
        // $this->db->select('ad.*, p.nama pasien,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,dok.nama dpjp');
        // $this->db->from('asesmen_awal_dewasa ad, pelayanan b,pasien p,cara_bayar c,history_pelayanan_ugd h, dokter dok');
        // $this->db->where('ad.id_pelayanan = b.id_pelayanan');
        // $this->db->where('ad.no_rm = p.no_rm');
        // $this->db->where('b.cara_bayar = c.id_cara_bayar');
        // $this->db->where('h.id_pelayanan = b.id_pelayanan');
        // $this->db->where('h.dpjp = dok.id_dokter');
        // $this->db->where('ad.id_asesmen', $id);
        // return $this->db->get()->row_array();
        $this->db->select('ad.*, p.nama pasien,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,p.agama');
        $this->db->from('asesmen_awal_dewasa ad, pelayanan b,pasien p,cara_bayar c');
        $this->db->where('ad.id_pelayanan = b.id_pelayanan');
        $this->db->where('ad.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('ad.id_asesmen', $id);
        return $this->db->get()->row_array();
    }
    public function cetakUlangDewasa($id)
    {
        $this->db->select('ud.*, p.nama pasien,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,p.agama');
        $this->db->from('asesmen_ulang_dewasa ud, pelayanan b,pasien p,cara_bayar c');
        $this->db->where('ud.id_pelayanan = b.id_pelayanan');
        $this->db->where('ud.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('ud.id_asesmen', $id);
        return $this->db->get()->row_array();
        // $this->db->select('ud.*, p.nama pasien,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,dok.nama dpjp');
        // $this->db->from('asesmen_ulang_dewasa ud, pelayanan b,pasien p,cara_bayar c,history_pelayanan_ugd h, dokter dok');
        // $this->db->where('ud.id_pelayanan = b.id_pelayanan');
        // $this->db->where('ud.no_rm = p.no_rm');
        // $this->db->where('b.cara_bayar = c.id_cara_bayar');
        // $this->db->where('h.id_pelayanan = b.id_pelayanan');
        // $this->db->where('h.dpjp = dok.id_dokter');
        // $this->db->where('ud.id_asesmen', $id);
        // return $this->db->get()->row_array();
    }
    public function cetakAwalGeriatri($id)
    {
        $this->db->select('ag.*, p.nama pasien,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,p.agama');
        $this->db->from('asesmen_awal_geriatri ag, pelayanan b,pasien p,cara_bayar c');
        $this->db->where('ag.id_pelayanan = b.id_pelayanan');
        $this->db->where('ag.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('ag.id_asesmen', $id);
        return $this->db->get()->row_array();
    }
    public function cetakUlangGeriatri($id)
    {
        $this->db->select('ug.*, p.nama pasien,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,p.agama');
        $this->db->from('asesmen_ulang_geriatri ug, pelayanan b,pasien p,cara_bayar c');
        $this->db->where('ug.id_pelayanan = b.id_pelayanan');
        $this->db->where('ug.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('ug.id_asesmen', $id);
        return $this->db->get()->row_array();
    }
    public function cetakAssPerRanap($id)
    {
        // $this->db->select('fap.*, p.nama,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,dok.nama dpjp,p.agama');
        // $this->db->from('form_ass_per_ranap fap, pelayanan b,pasien p,cara_bayar c,history_pelayanan_ugd h, dokter dok');
        // $this->db->where('fap.id_pelayanan = b.id_pelayanan');
        // $this->db->where('fap.no_rm = p.no_rm');
        // $this->db->where('b.cara_bayar = c.id_cara_bayar');
        // $this->db->where('h.id_pelayanan = b.id_pelayanan');
        // // $this->db->where('h.dpjp = dok.id_dokter');
        // $this->db->where('fap.id_form', $id);
        // return $this->db->get()->row_array();
        $this->db->select('f.*, p.nama,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,p.agama');
        $this->db->from('form_ass_per_ranap f, pelayanan b,pasien p,cara_bayar c');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        $this->db->where('f.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('f.id_form', $id);
        return $this->db->get()->row_array();
    }
    public function cetakAssDokRanap($id)
    {
        // $this->db->select('fad.*,fap.*, p.nama,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,dok.nama dpjp,p.agama');
        // $this->db->from('form_ass_dokter_ranap fad,form_ass_per_ranap fap, pelayanan b,pasien p,cara_bayar c,history_pelayanan_ugd h, dokter dok');
        // $this->db->where('fad.id_pelayanan = b.id_pelayanan');
        // $this->db->where('fad.no_rm = p.no_rm');
        // $this->db->where('b.cara_bayar = c.id_cara_bayar');
        // $this->db->where('h.id_pelayanan = b.id_pelayanan');
        // $this->db->where('h.dpjp = dok.id_dokter');
        // $this->db->where('fad.id_pelayanan', $id);
        // $this->db->where('fap.id_pelayanan', $id);
        // return $this->db->get()->row_array();
        $this->db->select('f.*,fap.*, p.nama,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,p.agama');
        $this->db->from('form_ass_dokter_ranap f,form_ass_per_ranap fap, pelayanan b,pasien p,cara_bayar c');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        $this->db->where('f.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('f.id_pelayanan', $id);
        $this->db->where('fap.id_pelayanan', $id);
        return $this->db->get()->row_array();
    }
    public function getDataPerawat($id2)
    {
        $this->db->select('fad.*, fap.*');
        $this->db->from('form_ass_dokter_ranap fad, form_ass_per_ranap fap');
        $this->db->where('fad.id_pel', $id2);
        return $this->db->get()->row_array();
    }

    // public function getIdMasalahKepByNoRM($id_history)
    // {
    //     $this->db->select('form_ass_per_ranap.id_masalah_kep, masalah_keperawatan.nama');
    //     $this->db->from('form_ass_per_ranap');
    //     $this->db->join('masalah_keperawatan', 'masalah_keperawatan.id_masalah_kep = form_ass_per_ranap.id_masalah_kep');
    //     $this->db->where('form_ass_per_ranap.id_history', $id_history);
    //     $query = $this->db->get();

    //     if ($query->num_rows() > 0) {
    //         return $query->result(); // Mengembalikan semua data yang ditemukan
    //     }
    //     return null;
    // }

    public function getIdMasalahKepByNoRM($id_history)
    {
        $this->db->select('id_masalah_kep');
        $this->db->from('form_ass_per_ranap');
        $this->db->where('id_history', $id_history);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data = $query->row();
            $ids = explode(',', $data->id_masalah_kep);
            $this->db->select('id_masalah_kep, nama');
            $this->db->from('masalah_keperawatan');
            $this->db->where_in('id_masalah_kep', $ids);
            $result = $this->db->get();

            if ($result->num_rows() > 0) {
                return $result->result();
            }
        }
        return null;
    }


    public function getResumePulang($id_pelayanan, $id_history)
    {
        $this->db->select('p.*,d.*,"-" as keadaan_pulang');
        $this->db->from('history_pelayanan_ranap h');
        $this->db->join('form_ass_per_ranap p', 'h.id_history = p.id_history', 'left');
        $this->db->join('form_ass_dokter_ranap d', 'h.id_history = d.id_history', 'left');
        $this->db->where(array('h.id_pelayanan' => $id_pelayanan, 'h.id_history' => $id_history));
        $this->db->group_by('h.id_history');

        return $this->db->get()->row();
    }

    public function getResumeRanap($id_pelayanan, $id_history)
    {
        $this->db->select('p.*,d.*');
        $this->db->from('history_pelayanan_ranap h');
        $this->db->join('form_ass_per_ranap p', 'h.id_history = p.id_history', 'left');
        $this->db->join('form_ass_dokter_ranap d', 'h.id_history = d.id_history', 'left');
        $this->db->where(array('h.id_pelayanan' => $id_pelayanan, 'h.id_history' => $id_history));
        $this->db->group_by('h.id_history');

        return $this->db->get()->row();
    }

    public function getResumePulangById($id_pelayanan, $id_history)
    {
        $this->db->select('r.riwayat riwayat_sekarang, r.prosedur_terapi terapi, r.edukasi konsul,r.diagnosa,r.keadaan_pulang, p.gcs,p.e,p.m,p.v, p.tekanan_darah, p.suhu,p.frequensi_nadi, p.frequensi_nafas, p.spo2,p.berat_badan, p.tinggi_badan, d.kepala,d.hidung,d.mulut, d.leher, d.thorax, d.jantung, d.paru, d.andomen,d.punggung,d.ekstremitas ');
        $this->db->from('resume_pulang r');
        $this->db->join('form_ass_per_ranap p', 'r.id_history = p.id_history', 'left');
        $this->db->join('form_ass_dokter_ranap d', 'r.id_history = d.id_history', 'left');
        $this->db->where(array('r.id_pelayanan' => $id_pelayanan, 'r.id_history' => $id_history));
        $this->db->group_by('r.id_history');

        return $this->db->get()->row();
    }



    public function get_nama_obat($id_pelayanan)
    {
        $this->db->select('l.nama');
        $this->db->from('tindakan_farmasi tf');
        $this->db->join('list_logistik l', 'tf.id_list_tindakan = l.id_logistik');
        $this->db->where('tf.id_pelayanan', $id_pelayanan);
        $this->db->where('tf.frek !=', 0);
        $this->db->where_not_in('l.golongan_sediaan', ['BAHAN KIMIA', 'MEDICAL SUPPLY']);
        $this->db->group_by('l.nama');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return [];
        }
    }




    public function get_signa_obat($id_pelayanan)
    {
        $this->db->select('so.tindakan AS signa_obat, l.nama AS nama_obat');
        $this->db->from('tindakan_farmasi tf');
        $this->db->join('list_logistik l', 'tf.id_list_tindakan = l.id_logistik', 'left');
        $this->db->join('signa_obat so', 'tf.id_signa = so.id_signa', 'left');
        $this->db->where('tf.id_pelayanan', $id_pelayanan);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_dosis_by_obat($nama_obat)
    {
        $this->db->select('so.tindakan AS signa_obat, l.nama AS nama_obat');
        $this->db->from('tindakan_farmasi tf');
        $this->db->join('list_logistik l', 'tf.id_list_tindakan = l.id_logistik', 'left');
        $this->db->join('signa_obat so', 'tf.id_signa = so.id_signa', 'left');
        $this->db->where('l.nama', $nama_obat);
        $query = $this->db->get();

        return $query->row();
    }

    public function cek_skrining($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->from('pasien_TBC'); // Ganti dengan nama tabel Anda
        $this->db->where('id_pelayanan', $id_pelayanan);
        $query = $this->db->get();

        // Jika data ditemukan, kembalikan true, jika tidak kembalikan false
        return $query->num_rows() > 0;
    }

    public function selectMasalahFormAssPerRanap()
    {
        $this->db->select('form_ass_per_ranap.*, masalah_keperawatan.nama AS masalah_nama');
        $this->db->from('form_ass_per_ranap');
        $this->db->join('masalah_keperawatan', 'form_ass_per_ranap.id_masalah_kep = masalah_keperawatan.id_masalah_kep', 'left');
        return $this->db->get()->result_array();
    }

    public function selectMasalahRencanaKep()
    {
        $this->db->select('rencana_keperawatan.*, masalah_keperawatan.nama AS masalah_nama');
        $this->db->from('rencana_keperawatan');
        $this->db->join('masalah_keperawatan', 'rencana_keperawatan.id_masalah_kep = masalah_keperawatan.id_masalah_kep', 'left');
        return $this->db->get()->result_array();
    }

    public function selectERM($mulai, $akhir, $tipe)
    {
        $data_staff = $this->session->userdata('data_auth');
        $ruangan = $data_staff->ruangan;

        $this->db->select('v.*'); // SELECT v.*
        $this->db->from('v_perawat_ranap v'); // FROM v_kunjungan v
        $this->db->where('date(v.tgl_masuk) >=', $mulai); // WHERE date(v.tgl_masuk) >= '$mulai'
        $this->db->where('date(v.tgl_masuk) <=', $akhir); // AND date(v.tgl_masuk) <= '$akhir'
        $this->db->where('keluar_kamar !=', NULL);

        if ($data_staff->ruangan != '') {
            if ($tipe == 'ranap') {
                $this->db->where("(nama_ruangan like '%$ruangan%')");
            } else {
                $this->db->where("(nama_ruangan ='ODC')");
            }
        }
        $this->db->order_by('v.tgl_masuk', 'desc'); // ORDER BY v.tgl_masuk DESC
        return $this->db->get()->result();
    }
    public function get_perkembangan($id_array)
    {
        $this->db->select('c.*, v.*, s.nama as nama_staff');
        $this->db->from('catatan_perkembangan_terintegrasi c');
        $this->db->join('v_perawat_ranap v', 'c.no_rm = v.no_rm', 'left');
        $this->db->join('staff s', 'c.staff = s.id_staff', 'left');
        $this->db->where_in('c.id_catatan', $id_array);
        $this->db->order_by('c.tgl_verif', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_last_total_ews_by_pel_id($id_pelayanan)
    {
        $this->db->select('total_ews');
        $this->db->from('data_pemantauan_vital');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->row(); // row() karena hanya 1 data
    }
    
    public function get_last_total_pews_by_pel_id($id_pelayanan)
    {
        $this->db->select('skor');
        $this->db->from('pews_anak');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->order_by('id', 'DESC'); // ambil data paling baru
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row(); // return skor terakhir
        }

        return null; // jika tidak ada data
    }

    public function getRiwayatAsesmenAnak($id_pelayanan, $id_history)
    {
        return $this->db
            ->where('id_pelayanan', $id_pelayanan)
            ->where('id_history', $id_history)
            ->order_by('id_asesmen', 'DESC')
            ->get('asesmen_ulang_anak')
            ->result();
    }

    public function update_ulang_anak($id, $data)
    {
        $this->db->where('id_asesmen', $id);
        return $this->db->update('asesmen_ulang_anak', $data);
    }

    public function update_resiko_ulang_jatuh_anak($id, $data)
    {
        $this->db->where('id_asesmen', $id);
        return $this->db->update('resiko_ulang_jatuh_anak', $data);
    }

    public function selectUlangJatuhAnak($id_pelayanan)
{
    $this->db->select('*');
    $this->db->from('asesmen_ulang_anak');
    $this->db->where('id_pelayanan', $id_pelayanan);
    $this->db->group_by('skor_resiko');
    $this->db->order_by('tanggal', 'DESC');

    return $this->db->get()->result();
}

public function update_resiko_ulang_jatuh_lansia($id_asesmen, $data)
    {
        $this->db->where('id_asesmen', $id_asesmen);
        return $this->db->update('resiko_ulang_jatuh_lansia', $data);
    }

    // INSERT DATA ASESMENT ULANG LANSIA (UNTUK CONTROLLER INSERT)
    public function insert_asesmen_ulang_lansia($data)
    {
        $this->db->insert('asesmen_ulang_lansia', $data);
        return $this->db->insert_id();
    }

    // INSERT DATA RESIKO ULANG JATUH LANSIA (SETELAH INSERT ASESMENT)
    public function insert_resiko_ulang_jatuh_lansia($data)
    {
        return $this->db->insert('resiko_ulang_jatuh_lansia', $data);
    }

    // SELECT LIST DATA ULANG JATUH LANSIA
    // UNTUK DATATABLE VIEW (VIEW_ULANG_JATUH_LANSIA)
    public function selectUlangJatuhLansia($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->from('asesmen_ulang_lansia');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->order_by('id_asesmen', 'DESC');
        return $this->db->get()->result();
    }

    // GET DETAIL DATA ASESMENT + RESIKO (JOIN UNTUK EDIT / PRINT)
    public function getDetailUlangJatuhLansia($id_asesmen)
    {
        $this->db->select('a.*, b.*');
        $this->db->from('asesmen_ulang_lansia a');
        $this->db->join('resiko_ulang_jatuh_lansia b', 'a.id_asesmen = b.id_asesmen', 'left');
        $this->db->where('a.id_asesmen', $id_asesmen);

        return $this->db->get()->row_array();
    }

    public function upsertStatusRespirasi(array $data)
    {
        $exists = $this->db
            ->where('id_pelayanan', $data['id_pelayanan'])
            ->where('id_history', $data['id_history'])
            ->get('status_respirasi')
            ->row_array();

        if ($exists) {
            return $this->db
                ->where('id_pelayanan', $data['id_pelayanan'])
                ->where('id_history', $data['id_history'])
                ->update('status_respirasi', $data);
        }

        return $this->db->insert('status_respirasi', $data);
    }

    public function getEwsMaternityByPelayanan($id_pelayanan, $id_history)
    {
        return $this->db
            ->where('id_pelayanan', $id_pelayanan)
            ->where('id_history', $id_history)
            ->get('ews_maternity')
            ->row();
    }

    public function selectPemantauanEwsMaternitySehari($id_pelayanan)
    {
        $this->db->select('d.*, p.tgl_masuk');
        $this->db->from('ews_maternity d, pelayanan p');
        $this->db->where('d.id_pelayanan = p.id_pelayanan');
        $this->db->where('d.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }



}
