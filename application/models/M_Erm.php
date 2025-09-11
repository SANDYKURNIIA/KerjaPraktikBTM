<?php

class M_Erm extends CI_Model
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
	public function insert_rajal($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function delete($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function selectPembatalan($date1,$date2){
        $sql = "SELECT konfirmasi_batal.*, pelayanan.tgl_hapus FROM konfirmasi_batal,pelayanan WHERE pelayanan.id_pelayanan = konfirmasi_batal.id_pelayanan
         AND pelayanan.tgl_hapus between \"$date1\" AND \"$date2\" ORDER BY tgl_hapus DESC";
         $query = $this->db->query($sql);
        //$this->db->select("konfirmasi_batal.*");
        //$this->db->from("konfirmasi_batal");
        //return $this->db->get()->result();
       return $query->result();
    }

        //select data untuk surveiInfeksi
        public function selectSurveiInfeksi($id_pelayanan)
        {
            $this->db->select('*');
            $this->db->from('form_survei_infeksi f');
            $this->db->where('f.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        }
        //end select data

    public function selectPembatalanDateRange($mulai,$hingga){
            $this->db->select("*");
            $this->db->from("konfirmasi_batal");
            $this->db->where('tgl_masuk >=', $mulai);
            $this->db->where('tgl_masuk <=', $hingga); 
            return $this->db->get()->result();
    }
    public function selectDataPasien($no_rm)
    {
        $query =  $this->db->query("SELECT * FROM (
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
        order by tgl_keluar desc
        limit 3
        ");
        return $query->result_array();
    }
    public function selectDataTBC($idpel){
        $this->db->select("*");
        $this->db->from("pasien_TBC");
        $this->db->where("id_pelayanan",$idpel);
        return $this->db->get()->result();
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
        $this->db->order_by('p.tgl_masuk desc');
        $this->db->limit(3);
        return $this->db->get()->result();
    }

    public function selectDataPasienIGDby_id($id_pelayanan, $id_history)
    {
        $this->db->select('v.*, p.pekerjaan, p.agama');
        $this->db->from('v_igd v, pasien p');//total bayar 0
        $this->db->where('v.no_rm = p.no_rm');
        $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));

        return $this->db->get()->row();
    }
    public function selectDataPasienIGDbyid($id_pelayanan, $id_history)//riwayat erm
    {
        $this->db->select('v.*, p.pekerjaan, p.agama');
        $this->db->from('v_igd v, pasien p');//total bayar 0
        $this->db->where('v.no_rm = p.no_rm');
        $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));

        return $this->db->get()->row();
    }
    public function selectDataPasienbyid($id_pelayanan, $id_history)//riwayat erm
    {
        $this->db->select('v.*, p.pekerjaan, p.agama,p.kecamatan,p.kelurahan,p.provinsi,p.alamat');
        $this->db->from('v_kunjungan v, pasien p');//total bayar 0
        $this->db->where('v.no_rm = p.no_rm');
        $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));

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
    public function checkData($id_pelayanan, $table)
    {
        $this->db->from($table);
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->row_array();
    }
    public function selectDataDiagnosaByIdPel($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->from('erm_diagnosa_dokter');
        $this->db->where('id_history', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function selectTerapiByIdPel($id_pelayanan)
    {
        $this->db->select('l.nama,t.frek,t.tanggal, s.tindakan,c.cara_pemakaian');
        $this->db->from('tindakan_farmasi t, list_logistik l, cara_pemakaian_obat c, signa_obat s, resep_obat r');
        $this->db->where('t.id_list_tindakan = l.id_logistik');
        $this->db->where('t.id_resep = r.id_resep');
        $this->db->where('t.id_signa = s.id_signa');
        $this->db->where('t.id_cara_pakai = c.id_cara_pemakaian');
        $this->db->where('r.id_pelayanan', $id_pelayanan);
        $this->db->where_not_in('r.jenis_resep', 4);
        return $this->db->get()->result();
    }
    public function selectPerPenRujukan($id_pelayanan)
    {
        $this->db->select('f.*, p.tgl_masuk');
        $this->db->from('form_per_pen_rujukan f, pelayanan p');
        $this->db->where('f.id_pelayanan = p.id_pelayanan');
        $this->db->where('f.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function selectPenunjangDiag($id_pelayanan)
    {
        $this->db->select('f.*, p.tgl_masuk');
        $this->db->from('hasil_penunjang_diagnostik f, pelayanan p');
        $this->db->where('f.id_pelayanan = p.id_pelayanan');
        $this->db->where('f.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function selectPerTindakanDok($id_pelayanan)
    {
        $this->db->select('f.*, p.tgl_masuk');
        $this->db->from('form_persetujuan_tindakan_dokter f, pelayanan p');
        $this->db->where('f.id_pelayanan = p.id_pelayanan');
        $this->db->where('f.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function selectPenTindakanDok($id_pelayanan)
    {
        $this->db->select('f.*, p.tgl_masuk');
        $this->db->from('form_penolakan_tindakan_dokter f, pelayanan p');
        $this->db->where('f.id_pelayanan = p.id_pelayanan');
        $this->db->where('f.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    // public function selectPengawasan($id_pelayanan)
    // {
    //     $this->db->select('f.*, p.tgl_masuk');
    //     $this->db->from('form_peng_khusus f, pelayanan p');
    //     $this->db->where('f.id_pelayanan = p.id_pelayanan');
    //     $this->db->where('f.id_pelayanan', $id_pelayanan);
    //     return $this->db->get()->result();
    // }
    public function selectListPengawasan($id_history)
    {
        $this->db->select('f.*, p.tgl_masuk');
        $this->db->from('form_peng_khusus f, pelayanan p');
        $this->db->where('f.id_pelayanan = p.id_pelayanan');
        $this->db->where('f.id_history', $id_history);
        return $this->db->get()->result();
    }

    public function selectListAnamnesa($id_history)
    {
        $this->db->select('f.*, p.tgl_masuk');
        $this->db->from('form_lembar_anam f, pelayanan p');
        $this->db->where('f.id_pelayanan = p.id_pelayanan');
        $this->db->where('f.id_history', $id_history);
        return $this->db->get()->result();
    }
    public function cetakAssPer($id)
    {
        $this->db->select('f.*, p.nama,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar');
        $this->db->from('form_ass_per_igd f, pelayanan b,pasien p,cara_bayar c');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        $this->db->where('f.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('f.id_form_ass_per_igd', $id);
        return $this->db->get()->row_array();
    }
    public function cetakResumeMed($id)
    {
        $this->db->select('f.*,d.*,u.nama_diagnosa,b.diagnosa, p.nama,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar, dok.nama dpjp, dok.foto');
        $this->db->from('form_ass_per_igd f, pelayanan b,pasien p,cara_bayar c, form_ass_dokter_igd d, diagnosa_utama u, history_pelayanan_ugd h, dokter dok');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        $this->db->where('d.id_pelayanan = b.id_pelayanan');
        $this->db->where('u.id_history = f.id_history');
        $this->db->where('h.id_pelayanan = b.id_pelayanan');
        $this->db->where('h.dpjp = dok.id_dokter');
        $this->db->where('f.no_rm = p.no_rm');
        $this->db->where('d.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('b.id_pelayanan', $id);
        return $this->db->get()->row_array();
    }
    public function cetakObservasi($id)
    {
        $this->db->select('f.*, p.nama,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar');
        $this->db->from('form_observasi f, pelayanan b,pasien p,cara_bayar c');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        $this->db->where('f.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('f.id_form_observasi', $id);
        return $this->db->get()->row_array();
    }
    public function cetakSebabKematian($id)
    {
        $this->db->select('f.*, p.nama,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,p.alamat,p.kelurahan,p.kecamatan,p.provinsi');
        $this->db->from('form_sebab_kematian f, pelayanan b,pasien p,cara_bayar c');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        $this->db->where('f.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('f.id_form_sebab_kematian', $id);
        return $this->db->get()->row_array();
    }
    public function cetakIntra($id)
    {
        $this->db->select('f.*,b.diagnosa, p.nama,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,p.alamat,p.kelurahan,p.kecamatan,p.provinsi,dok.nama dpjp');
        $this->db->from('form_transfer_intra_rs f, pelayanan b,pasien p,cara_bayar c,history_pelayanan_ugd h, dokter dok');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        $this->db->where('f.no_rm = p.no_rm');
        $this->db->where('h.id_pelayanan = b.id_pelayanan');
        $this->db->where('h.dpjp = dok.id_dokter');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('f.id_form_transfer_intra_rs', $id);
        return $this->db->get()->row_array();
    }
    public function cetakAntar($id)
    {
        $this->db->select('f.*,b.diagnosa, p.nama,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,p.alamat,p.kelurahan,p.kecamatan,p.provinsi,dok.nama dpjp');
        $this->db->from('form_transfer_antar_rs f, pelayanan b,pasien p,cara_bayar c,history_pelayanan_ugd h, dokter dok');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        $this->db->where('f.no_rm = p.no_rm');
        $this->db->where('h.id_pelayanan = b.id_pelayanan');
        $this->db->where('h.dpjp = dok.id_dokter');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('f.id_form_transfer_antar_rs', $id);
        return $this->db->get()->row_array();
    }
    public function cetakPengKhusus($id)
    {
        $this->db->select('f.*,b.diagnosa, p.nama,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,p.alamat,p.kelurahan,p.kecamatan,p.provinsi,dok.nama dpjp');
        $this->db->from('form_peng_khusus f, pelayanan b,pasien p,cara_bayar c,history_pelayanan_ugd h, dokter dok');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        $this->db->where('f.no_rm = p.no_rm');
        $this->db->where('h.id_pelayanan = b.id_pelayanan');
        $this->db->where('h.dpjp = dok.id_dokter');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('f.id_history', $id);
        return $this->db->get()->row_array();
    }
    public function cetakPerPenRujuk($id)
    {
        $this->db->select('f.*, p.nama pasien,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,p.alamat almt,p.kelurahan,p.kecamatan,p.provinsi');
        $this->db->from('form_per_pen_rujukan f, pelayanan b,pasien p,cara_bayar c');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        $this->db->where('f.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('f.id_form_per_pen_rujukan', $id);
        return $this->db->get()->row_array();
    }
    public function cetakPenunjang($id)
    {
        $this->db->select('f.*, p.nama pasien,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,p.alamat almt,p.kelurahan,p.kecamatan,p.provinsi');
        $this->db->from('hasil_penunjang_diagnostik f, pelayanan b,pasien p,cara_bayar c');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        $this->db->where('f.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('f.id_penunjang', $id);
        return $this->db->get()->row_array();
    }
    public function cetakPenolakan($id)
    {
        $this->db->select('f.*, p.nama pasien,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,p.alamat almt,p.kelurahan,p.kecamatan,p.provinsi,dok.nama dpjp');
        $this->db->from('form_penolakan_tindakan_dokter f, pelayanan b,pasien p,cara_bayar c,history_pelayanan_ugd h, dokter dok');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        $this->db->where('f.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('h.id_pelayanan = b.id_pelayanan');
        $this->db->where('h.dpjp = dok.id_dokter');
        $this->db->where('f.id_form_penolakan_tindakan_dokter', $id);
        return $this->db->get()->row_array();
    }
    public function cetakPersetujuan($id)
    {
        $this->db->select('f.*, p.nama pasien,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar,p.alamat almt,p.kelurahan,p.kecamatan,p.provinsi,dok.nama dpjp');
        $this->db->from('form_persetujuan_tindakan_dokter f, pelayanan b,pasien p,cara_bayar c,history_pelayanan_ugd h, dokter dok');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        $this->db->where('f.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('h.id_pelayanan = b.id_pelayanan');
        $this->db->where('h.dpjp = dok.id_dokter');
        $this->db->where('f.id_form_persetujuan_tindakan_dokter', $id);
        return $this->db->get()->row_array();
    }
    public function cetakRujukan($id)
    {
        $this->db->select('f.*, p.nama,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar, p.alamat');
        $this->db->from('form_lembar_rujukan f, pelayanan b,pasien p,cara_bayar c');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        $this->db->where('f.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('f.id_history', $id);
        return $this->db->get()->row_array();
    }
    public function cetakSuperRanap($id)
    {
        $this->db->select('f.*, p.nama,p.tgl_lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar, p.alamat');
        $this->db->from('form_perintah_ranap f, pelayanan b,pasien p,cara_bayar c');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        $this->db->where('f.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('f.id_history', $id);
        return $this->db->get()->row_array();
    }
    public function cetakPenundaan($id)
    {
        $this->db->select('f.*, p.nama pasien,p.tgl_lahir lahir,p.jenis_kelamin,b.tgl_masuk,c.nama cara_bayar, p.alamat, dok.nama dpjp');
        $this->db->from('form_penundaan_pelayanan_obat f, pelayanan b,pasien p,cara_bayar c,history_pelayanan_ugd h, dokter dok');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        $this->db->where('f.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('h.id_pelayanan = b.id_pelayanan');
        $this->db->where('h.dpjp = dok.id_dokter');
        $this->db->where('f.id_history', $id);
        return $this->db->get()->row_array();
    }
    function insert_update($id_pelayanan, $id_history, $data){
        $this->db->where('id_history', $id_history);
        $this->db->where('id_pelayanan', $id_pelayanan);
        $q = $this->db->get('hasil_penunjang_diagnostik');

        if (
            $q->num_rows() > 0
        ) {
            $this->db->where('id_history', $id_history);
            $this->db->where('id_pelayanan', $id_pelayanan);
            $this->db->update('hasil_penunjang_diagnostik', $data);
        } else {
            $this->db->set('id_history', $id_history);
            $this->db->set('id_pelayanan', $id_pelayanan);
            $this->db->insert('hasil_penunjang_diagnostik', $data);
        }
    }

    public function insert_and_get_id($data, $table)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id(); 
    }
    
    public function get_triase($id_pelayanan)
    {
        $this->db->select('
        p.no_rm,
        p.nama AS pasien,
        p.tgl_lahir,
        dokter.keluhan AS keluhan_utama,
        perawat.tekanan_darah,
        perawat.frequensi_nadi,
        perawat.frequensi_nafas,
        perawat.spo2,
        perawat.suhu,
        perawat.gcs,
        triase.mata,
        triase.skala_nyeri,
        triase.verbal,
        triase.motorik,
        triase.airway,
        triase.breathing,
        triase.cyrculation,
        triase.disability,
        triase.exposure
    ');

        $this->db->from('form_ass_per_igd per');
        $this->db->join('pasien p', 'per.no_rm = p.no_rm', 'left');
        $this->db->join('form_ass_dokter_igd dokter', 'per.id_history = dokter.id_history', 'left');
        $this->db->join('form_ass_per_igd perawat', 'per.id_history = perawat.id_history', 'left');
        $this->db->join('form_ass_triase_ugd triase', 'per.id_history = triase.id_history', 'left');
        $this->db->where('per.id_pelayanan', $id_pelayanan);
        return $this->db->get()->row_array();
    }
}
