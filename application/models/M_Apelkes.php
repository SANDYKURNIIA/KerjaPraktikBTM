<<<<<<< HEAD
<?php

class M_Apelkes extends CI_Model
{

    public function selectDataPasienRawatJalan() //Apelkes
    {
        $this->db->where('status', '1');
        $this->db->from('v_apelkes');
        return $this->db->get()->result();
    }

    public function selectDataApelkesJalanby_id($id_pelayanan, $id_history) //apelkes
    {
        $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));
        $this->db->from('v_apelkes');
        return $this->db->get()->result();
    }


    public function selectDokter() // Apelkes
    {
        $this->db->select('nama, id_dokter');

        $this->db->where('status', 'AKTIF');
        $this->db->from('dokter');
        $this->db->group_by('nama');
        $this->db->order_by('nama');
        return $this->db->get()->result();
    }
    public function insert_tindakan($page_data, $table) //Apelkes
    {
        $this->db->insert($table, $page_data);
    }
    public function Total_Harga_Byid($id_pelayanan) //apelkes
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_apelkes ');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function Total_Harga_Byid_visite($id_pelayanan) //apelkes
    {
        $this->db->select_sum('t.total');
        $this->db->from('tindakan_apelkes t, list_tindakan_apelkes l');
        $this->db->where('l.id_list_tindakan_apelkes = t.id_list_tindakan');
        $this->db->like('l.nama', 'visite rutin');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function selectTipeKamar() //Apelkes
    {
        $this->db->select('DISTINCT(tipe_kamar) nama');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('list_tindakan_apelkes')->result();
    }
    public function getTipeKamarLabor($spes) //apelkes
    {
        $this->db->select('*');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe_kamar', $spes);

        $this->db->order_by('nama');
        return $this->db->get('list_tindakan_labor')->result_array();
    }
    public function getTipeKamarLabor_lama($spes) //apelkes
    {
        $this->db->select('*');
        $this->db->where('status', 'LAMA');
        $this->db->where('tipe_kamar', $spes);

        $this->db->order_by('nama');
        return $this->db->get('list_tindakan_labor')->result_array();
    }
    public function getTipeKamarRadiologi($spes) //apelkes
    {
        $this->db->select('*');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe_kamar', $spes);

        $this->db->order_by('nama');
        return $this->db->get('list_tindakan_radiologi')->result_array();
    }
    public function getTipeKamarRadiologi_lama($spes) //apelkes
    {
        $this->db->select('*');
        $this->db->where('status', 'LAMA');
        $this->db->where('tipe_kamar', $spes);

        $this->db->order_by('nama');
        return $this->db->get('list_tindakan_radiologi')->result_array();
    }

    public function getTipeKamar($spes) //apelkes
    {
        $query =  $this->db->query("SELECT * FROM list_tindakan_apelkes l where l.status= 'AKTIF' and l.tipe_kamar='$spes' 
        and l.nama not like '%visite%' and l.nama not like '%sewa ruang%' and l.kelompok not like '%penunjang%'
        order by l.nama ");
        return $query->result_array();
        // $this->db->select('*');
        // $this->db->where('status', 'AKTIF');
        // $this->db->where('tipe_kamar', $spes);
        // $this->db->order_by('nama');
        // return $this->db->get('list_tindakan_apelkes')->result_array();
    }
    public function getTipeKamar_lama($spes) //apelkes
    {
        $query =  $this->db->query("SELECT * FROM list_tindakan_apelkes l where l.status= 'LAMA' and l.tipe_kamar='$spes' 
        and l.nama not like '%visite%' and l.nama not like '%sewa ruang%' and l.kelompok not like '%penunjang%'
        order by l.nama ");
        return $query->result_array();
        // $this->db->select('*');
        // $this->db->where('status', 'AKTIF');
        // $this->db->where('tipe_kamar', $spes);
        // $this->db->order_by('nama');
        // return $this->db->get('list_tindakan_apelkes')->result_array();
    }
    public function getVisite($spes, $id_pelayanan, $dpjp) //apelkes
    {
        $dokter = $this->db->get_where('dokter', ['id_dokter' => $dpjp])->row();
        $cara_bayar = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row()->cara_bayar;
        $this->db->select('*');
        // if ($cara_bayar == '30' && !preg_match('/BPJS/i', $spes)) {
        //     $this->db->where('tipe_kamar', 'BPJS ' . $spes);
        // } else {
        $this->db->where('tipe_kamar', $spes);
        // }
        if ($cara_bayar == '333'  || $cara_bayar == 'a74' || $cara_bayar == 'b1' || $cara_bayar == 'b4' || $cara_bayar == 'b5') {
            $this->db->where('status', 'LAMA');
        } else {
            $this->db->where('status', 'AKTIF');
        }
        if ($dokter->dokter_spes == 'UMU') {
            $this->db->like('nama', 'Dokter umum visite rutin');
        } else {
            if ($dokter->izin_akses == 'sub spesialis') {
                $this->db->like('nama', 'Dokter sub spesialis visite rutin');
            } else {
                $this->db->like('nama', 'Dokter spesialis visite rutin');
            }
        }
        return $this->db->get('list_tindakan_apelkes')->row_array();
    }
    public function getVisite_diskon($spes, $id_pelayanan, $dpjp) //apelkes
    {
        $dokter = $this->db->get_where('dokter', ['id_dokter' => $dpjp])->row();
        $cara_bayar = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row()->cara_bayar;

        if ($cara_bayar == '30' && !preg_match('/BPJS/i', $spes)) {
            $this->db->select('a.*');
            $this->db->where('l.tipe_kamar', $spes);
        } else if ($cara_bayar == '333') {
            $this->db->select('a.id_list_tindakan_apelkes, a.nama, a.harga_sarana,(l.harga_jasa * (50/100)) harga_jasa');

            $this->db->where('l.tipe_kamar', $spes);
        } else {
            $this->db->select('a.id_list_tindakan_apelkes, a.nama, a.harga_sarana,(l.harga_jasa * (28/100)) harga_jasa');

            $this->db->where('l.tipe_kamar', $spes);
        }
        $this->db->from('list_tindakan_apelkes l, list_tindakan_apelkes a');
        $this->db->where('l.tipe_kamar = SUBSTRING_INDEX(a.tipe_kamar, "-",-1)');
        $this->db->where('l.nama = SUBSTRING_INDEX(a.nama, " - ",1)');
        $this->db->where('SUBSTRING_INDEX(a.nama, " - ",-1)="DISKON"');

        if ($cara_bayar == '333' || $cara_bayar == 'a74' || $cara_bayar == 'b1' || $cara_bayar == 'b4' || $cara_bayar == 'b5') {
            $this->db->where('status', 'LAMA');
        } else {
            $this->db->where('status', 'AKTIF');
        }
        if ($dokter->dokter_spes == 'UMU') {
            $this->db->like('a.nama', 'Dokter umum visite rutin');
        } else {
            if ($dokter->izin_akses == 'sub spesialis') {
                $this->db->like('a.nama', 'Dokter sub spesialis visite rutin');
            } else {
                $this->db->like('a.nama', 'Dokter spesialis visite rutin');
            }
        }
        return $this->db->get()->row_array();
    }
    public function selectDataTindakanByIdPel($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->from('v_tindakan_apelkes');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function selectDataTindakanByIdPelVisite($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->from('v_tindakan_apelkes');
        $this->db->like('nama', 'visite rutin');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->order_by('tanggal desc');

        return $this->db->get()->result();
    }

    public function getDokterPendamping($id_pelayanan)
    {
        $this->db->select("SUBSTRING_INDEX(dokter, ' Sp', 1) as dokter");
        $this->db->distinct();
        $this->db->from('v_tindakan_apelkes');
        $this->db->where('nama', 'Dokter spesialis visite rutin');

        $this->db->where('id_pelayanan', $id_pelayanan);

        return $this->db->get()->result();
    }
    
    public function selectDataKamarByIdPel($id_pelayanan) //Apelkes
    {
        $this->db->select('*');
        $this->db->from('v_kamar_apelkes');
        $this->db->where('ket', '0');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->order_by('tanggal_masuk', 'DESC');
        return $this->db->get()->result();
    }
    public function delete_tindakan($id_tindakan_apelkes) //Apelkes
    {
        $this->db->delete('tindakan_apelkes', array('id_tindakan_apelkes' => $id_tindakan_apelkes));

        $staff = $this->session->userdata('data_auth')->id_staff;
        $this->db->where(array('id_tindakan_apelkes' => $id_tindakan_apelkes));
        $this->db->update('tindakan_apelkes_backup', ['tgl_hapus' => date('Y-m-d H:i:s'), 'staff_hapus' => $staff]);
    }
    public function selectRiwayatPasien()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query =  $this->db->query("SELECT b.tgl_keluar,b.id_pelayanan,h.id_history,c.id_cara_bayar,h.id_kamar,h.dpjp, b.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,r.tipe poli 
        FROM pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c,  ruangan r, dokter dok 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar and r.id_ruangan=h.id_kamar and h.dpjp=dok.id_dokter and h.jenis_pelayanan='RAWAT INAP' 
        and b.tgl_keluar like '$tgl%' 
        ORDER by tgl_masuk desc ");
        return $query->result();
    }
    public function getDataPasienById($id_pelayanan, $id_history)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query =  $this->db->query("SELECT b.id_pelayanan,h.id_history,c.id_cara_bayar,h.id_kamar,h.dpjp, b.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,r.tipe poli 
        FROM pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c,  ruangan r, dokter dok 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar and r.id_ruangan=h.id_kamar and h.dpjp=dok.id_dokter and h.jenis_pelayanan='RAWAT INAP' 
        and b.id_pelayanan='$id_pelayanan' and h.id_history='$id_history'");
        return $query->result();
    }
    public function selectRangeRiwayatPasien($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query =  $this->db->query("SELECT b.id_pelayanan,h.id_history,c.id_cara_bayar,h.id_kamar,h.dpjp, b.tgl_masuk, b.tgl_keluar,p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,r.tipe poli 
        FROM pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c,  ruangan r, dokter dok 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar and r.id_ruangan=h.id_kamar and h.dpjp=dok.id_dokter and h.jenis_pelayanan='RAWAT INAP' 
        and b.tgl_keluar >= '$mulai' and b.tgl_keluar <= '$akhir'
        ORDER by tgl_masuk desc");
        return $query->result();
    }
    public function selectKamarById($id_pelayanan)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query =  $this->db->query("SELECT r.kelas_ruangan,r.tipe,k.tanggal_masuk,k.tanggal_keluar,k.status FROM riwayat_kamar k, ruangan r, pelayanan p WHERE p.id_pelayanan=k.id_pelayanan and k.id_kamar=r.id_ruangan and p.id_pelayanan='$id_pelayanan' ");
        return $query->result();
    }
    public function selectTindakan($id_pelayanan)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query =  $this->db->query("SELECT t.*, l.nama,l.tipe_kamar, d.nama dokter, s.nama staff from tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p,dokter d , staff s WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and d.id_dokter=t.id_dokter   and s.id_staff=t.id_staff and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$id_pelayanan'  ");
        return $query->result();
    }
    public function getTotalTindakanById($id_pelayanan)
    {
        $this->db->select('sum(total) total');
        $this->db->from('tindakan_apelkes');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function selectPasienLaborPulang() //Apelkes ranap
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('f.id_form_labor,p.*,b.id_pelayanan, b.tgl_masuk, b.tgl_keluar,b.keterangan,b.no_sep,b.diagnosa,h.id_history, h.jenis_pelayanan,c.nama cara_bayar, d.nama nama_dokter,r.tipe poli, f.tgl');
        $this->db->from('pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c, ruangan r, dokter d, form_labor f');
        $this->db->where('p.no_rm = b.id_pasien');
        $this->db->where('b.id_pelayanan = h.id_pelayanan');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('h.id_kamar = r.id_ruangan');
        $this->db->where('h.dpjp = d.id_dokter');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        // $this->db->where('h.jenis_pelayanan', 'RAWAT INAP');
        //$this->db->where('b.status_rawat', 'selesai');
        $this->db->where('b.status', 1);
        $this->db->where('h.status', 1);
        $this->db->where('f.status', 2);
        $this->db->like("f.tgl", $tgl);
        $this->db->order_by('b.tgl_masuk', 'DESC');
        return $this->db->get()->result();
    }
    public function selectPasienLaborPulangRange($mulai, $akhir) //Apelkes ranap
    {
        $this->db->select('f.id_form_labor,p.*,b.id_pelayanan, b.tgl_masuk, b.tgl_keluar,b.keterangan,b.no_sep,b.diagnosa,h.id_history, h.jenis_pelayanan,c.nama cara_bayar, d.nama nama_dokter,r.tipe poli, f.tgl');
        $this->db->from('pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c, ruangan r, dokter d, form_labor f ');
        $this->db->where('p.no_rm = b.id_pasien');
        $this->db->where('b.id_pelayanan = h.id_pelayanan');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('h.id_kamar = r.id_ruangan');
        $this->db->where('h.dpjp = d.id_dokter');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        // $this->db->where('h.jenis_pelayanan', 'RAWAT INAP');
        //$this->db->where('b.status_rawat', 'selesai');
        $this->db->where('b.status', 1);
        $this->db->where('h.status', 1);
        $this->db->where('f.status', 2);

        $this->db->where("f.tgl >=", $mulai);
        $this->db->where("f.tgl <=", $akhir);
        $this->db->order_by('b.tgl_masuk', 'DESC');
        return $this->db->get()->result();
    }
    public function selectPasienLaborPulangUGD() //Apelkes ugd
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select("f.id_form_labor,p.*,b.id_pelayanan, b.tgl_masuk, b.tgl_keluar,b.keterangan,b.no_sep,b.diagnosa,h.id_history, h.jenis_pelayanan,c.nama cara_bayar, d.nama nama_dokter, '-' poli, f.tgl");
        $this->db->from('pasien p, pelayanan b, history_pelayanan_ugd h, cara_bayar c, dokter d, form_labor f');
        $this->db->where('p.no_rm = b.id_pasien');
        $this->db->where('b.id_pelayanan = h.id_pelayanan');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('h.dpjp = d.id_dokter');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        // $this->db->where('h.jenis_pelayanan', 'UGD');
        //$this->db->where('b.status_rawat', 'selesai');
        $this->db->where('b.status', 1);
        $this->db->where('h.status', 1);
        $this->db->where('f.status', 2);

        $this->db->like("f.tgl ", $tgl);
        $this->db->order_by('b.tgl_masuk', 'DESC');
        return $this->db->get()->result();
    }
    public function selectPasienLaborPulangUGDRange($mulai, $akhir) //Apelkes ugd
    {
        $this->db->select("f.id_form_labor,p.*,b.id_pelayanan, b.tgl_masuk, b.tgl_keluar,b.keterangan,b.no_sep,b.diagnosa,h.id_history, h.jenis_pelayanan,c.nama cara_bayar, d.nama nama_dokter, '-' poli, f.tgl");
        $this->db->from('pasien p, pelayanan b, history_pelayanan_ugd h, cara_bayar c, dokter d, form_labor f');
        $this->db->where('p.no_rm = b.id_pasien');
        $this->db->where('b.id_pelayanan = h.id_pelayanan');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('h.dpjp = d.id_dokter');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        // $this->db->where('h.jenis_pelayanan', 'UGD');
        //$this->db->where('b.status_rawat', 'selesai');
        $this->db->where('b.status', 1);
        $this->db->where('h.status', 1);
        $this->db->where('f.status', 2);

        $this->db->where("f.tgl >=", $mulai);
        $this->db->where("f.tgl <=", $akhir);
        $this->db->order_by('b.tgl_masuk', 'DESC');
        return $this->db->get()->result();
    }
    public function selectPasienLaborPulangPoli() //Apelkes poli
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('f.id_form_labor,p.*,b.id_pelayanan, b.tgl_masuk, b.tgl_keluar,b.keterangan,b.no_sep,b.diagnosa,h.id_history, h.jenis_pelayanan,c.nama cara_bayar, d.nama nama_dokter, l.nama_panjang poli, f.tgl');
        $this->db->from('pasien p, pelayanan b, history_pelayanan h, cara_bayar c, dokter d, list_poli l,form_labor f');
        $this->db->where('p.no_rm = b.id_pasien');
        $this->db->where('b.id_pelayanan = h.id_pelayanan');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('h.dpjp = d.id_dokter');
        $this->db->where('h.nama_poli = l.id_list_poli');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        // $this->db->where('h.jenis_pelayanan', 'POLI');
        // $this->db->where('b.status_rawat', 'selesai');
        $this->db->where('b.status', 1);
        $this->db->where('h.status', 1);
        $this->db->where('f.status', 2);
        $this->db->like("f.tgl ", $tgl);
        $this->db->order_by('b.tgl_masuk', 'DESC');
        return $this->db->get()->result();
    }
    public function selectPasienLaborPulangPoliRange($mulai, $akhir) //Apelkes poli
    {
        $this->db->select('f.id_form_labor,p.*,b.id_pelayanan, b.tgl_masuk, b.tgl_keluar,b.keterangan,b.no_sep,b.diagnosa,h.id_history, h.jenis_pelayanan,c.nama cara_bayar, d.nama nama_dokter, l.nama_panjang poli, f.tgl');
        $this->db->from('pasien p, pelayanan b, history_pelayanan h, cara_bayar c, dokter d, list_poli l,form_labor f');
        $this->db->where('p.no_rm = b.id_pasien');
        $this->db->where('b.id_pelayanan = h.id_pelayanan');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('h.dpjp = d.id_dokter');
        $this->db->where('h.nama_poli = l.id_list_poli');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        //$this->db->where('b.status_rawat', 'selesai');
        $this->db->where('b.status', 1);
        $this->db->where('h.status', 1);
        $this->db->where('f.status', 2);
        $this->db->where("f.tgl >=", $mulai);
        $this->db->where("f.tgl <=", $akhir);
        $this->db->order_by('b.tgl_masuk', 'DESC');
        return $this->db->get()->result();
    }

    public function selectPasienLabor() //Apelkes
    {
        $this->db->select('p.*,b.*,h.*,c.nama cara_bayar, d.nama nama_dokter,r.tipe poli');
        $this->db->from('pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c, ruangan r, dokter d');
        $this->db->where('p.no_rm = b.id_pasien');
        $this->db->where('b.id_pelayanan = h.id_pelayanan');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('h.id_kamar = r.id_ruangan');
        $this->db->where('h.dpjp = d.id_dokter');
        // $this->db->where('h.jenis_pelayanan', 'RAWAT INAP');
        // $this->db->where('b.status_rawat', 'dirawat');
        $this->db->where("(b.status_rawat='dirawat' OR b.status_rawat='dikembalikan')");
        $this->db->where('b.status', 1);
        $this->db->where('h.status', 1);
        $this->db->order_by('b.tgl_masuk', 'DESC');
        return $this->db->get()->result();
    }
    public function selectDataRiwayatRadiologi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT p.alamat,b.id_pelayanan,h.id_history,c.id_cara_bayar,h.nama_poli,h.dpjp, h.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar, pl.nama poli 
        FROM pasien p, pelayanan b, history_pelayanan h, cara_bayar c, list_poli pl, dokter dok 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar AND pl.id_list_poli=h.nama_poli and h.dpjp=dok.id_dokter and h.jenis_pelayanan='POLI' 
        and  p.no_rm not like '-999%' and  p.no_rm not like '-0099%'
        and b.tgl_masuk like '$tgl%'
         
        ORDER by tgl_masuk desc ");
        return $hasil->result();
    }

    public function selectDataRiwayatRadiologiRange($mulai, $akhir)
    {
        $hasil = $this->db->query("SELECT p.alamat,b.id_pelayanan,h.id_history,c.id_cara_bayar,h.nama_poli,h.dpjp, h.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar, pl.nama poli 
        FROM pasien p, pelayanan b, history_pelayanan h, cara_bayar c, list_poli pl, dokter dok 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar AND pl.id_list_poli=h.nama_poli and h.dpjp=dok.id_dokter and h.jenis_pelayanan='POLI' 
          and b.tgl_masuk >= '$mulai' and b.tgl_masuk <= '$akhir' and  p.no_rm not like '-999%' and  p.no_rm not like '-0099%' and b.id_pelayanan in (SELECT id_pelayanan from tindakan_radiologi group by id_pelayanan)
       
        ORDER by tgl_masuk desc  ");
        return $hasil->result();
    }
    public function getDataRiwayatRadiologi($id_pelayanan, $id_history)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT p.alamat,b.id_pelayanan,h.id_history,c.id_cara_bayar,h.nama_poli,h.dpjp, h.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar, pl.nama poli 
        FROM pasien p, pelayanan b, history_pelayanan h, cara_bayar c, list_poli pl, dokter dok 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar AND pl.id_list_poli=h.nama_poli and h.dpjp=dok.id_dokter and h.jenis_pelayanan='POLI' 
        and  p.no_rm not like '-999%' and  p.no_rm not like '-0099%' 
        and b.id_pelayanan = '$id_pelayanan' and h.id_history = '$id_history'
         
        ORDER by tgl_masuk desc ");
        return $hasil->result();
    }
    public function cekSewaKamar($id_pelayanan, $tgl)
    {
        return $this->db->query("SELECT *
        from tindakan_apelkes t, list_tindakan_apelkes l
        where t.id_list_tindakan=l.id_list_tindakan_apelkes and l.nama like '%sewa ruang%' and t.id_pelayanan='$id_pelayanan' and t.tanggal like '%$tgl%'")->result();
    }
    public function countVisiteBpjs($id_pelayanan, $id_dokter)
    {
        $this->db->select('count(*) count');
        $this->db->from('v_tindakan_apelkes');
        $this->db->where_not_in("tipe_kamar = 'ICU' and tipe_kamar = 'HCU'");
        $this->db->like('nama', 'visite rutin');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('id_dokter', $id_dokter);
        // $this->db->group_by('id_dokter');

        return $this->db->get()->row();
    }
    public function countVisiteBpjsICU($id_pelayanan, $id_dokter)
    {
        $this->db->select('count(*) count');
        $this->db->from('v_tindakan_apelkes');
        $this->db->where("(tipe_kamar = 'ICU' or tipe_kamar = 'HCU')");
        $this->db->like('nama', 'visite rutin');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('id_dokter', $id_dokter);
        // $this->db->group_by('id_dokter');

        return $this->db->get()->row();
    }
    public function apelkes()
    {
        $this->db->select('v.*');
        $this->db->from('v_tindakan_apelkes v,v_perawat_ranap p');
        $this->db->where('v.id_pelayanan = p.id_pelayanan');
        $this->db->like('v.nama', 'visite rutin');
        $this->db->like('v.tipe_kamar', 'BPJS');
        $this->db->where('p.id_cara_bayar', '30');
        $this->db->where('p.keluar_kamar', NULL);
        $this->db->order_by('tanggal');

        return $this->db->get()->result();
    }
    public function getKamarById($id_pelayanan)
    {
        return $this->db->query("SELECT r.tipe
        from history_pelayanan_ranap h, ruangan r
        where h.id_kamar = r.id_ruangan and h.id_pelayanan ='$id_pelayanan'")->row();
    }
}
=======
<?php

class M_Apelkes extends CI_Model
{

    public function selectDataPasienRawatJalan() //Apelkes
    {
        $this->db->where('status', '1');
        $this->db->from('v_apelkes');
        return $this->db->get()->result();
    }

    public function selectDataApelkesJalanby_id($id_pelayanan, $id_history) //apelkes
    {
        $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));
        $this->db->from('v_apelkes');
        return $this->db->get()->result();
    }


    public function selectDokter() // Apelkes
    {
        $this->db->select('nama, id_dokter');

        $this->db->where('status', 'AKTIF');
        $this->db->from('dokter');
        $this->db->group_by('nama');
        $this->db->order_by('nama');
        return $this->db->get()->result();
    }
    public function insert_tindakan($page_data, $table) //Apelkes
    {
        $this->db->insert($table, $page_data);
    }
    public function Total_Harga_Byid($id_pelayanan) //apelkes
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_apelkes ');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function Total_Harga_Byid_visite($id_pelayanan) //apelkes
    {
        $this->db->select_sum('t.total');
        $this->db->from('tindakan_apelkes t, list_tindakan_apelkes l');
        $this->db->where('l.id_list_tindakan_apelkes = t.id_list_tindakan');
        $this->db->like('l.nama', 'visite rutin');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function selectTipeKamar() //Apelkes
    {
        $this->db->select('DISTINCT(tipe_kamar) nama');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('list_tindakan_apelkes')->result();
    }
    public function getTipeKamarLabor($spes) //apelkes
    {
        $this->db->select('*');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe_kamar', $spes);

        $this->db->order_by('nama');
        return $this->db->get('list_tindakan_labor')->result_array();
    }
    public function getTipeKamarLabor_lama($spes) //apelkes
    {
        $this->db->select('*');
        $this->db->where('status', 'LAMA');
        $this->db->where('tipe_kamar', $spes);

        $this->db->order_by('nama');
        return $this->db->get('list_tindakan_labor')->result_array();
    }
    public function getTipeKamarRadiologi($spes) //apelkes
    {
        $this->db->select('*');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe_kamar', $spes);

        $this->db->order_by('nama');
        return $this->db->get('list_tindakan_radiologi')->result_array();
    }
    public function getTipeKamarRadiologi_lama($spes) //apelkes
    {
        $this->db->select('*');
        $this->db->where('status', 'LAMA');
        $this->db->where('tipe_kamar', $spes);

        $this->db->order_by('nama');
        return $this->db->get('list_tindakan_radiologi')->result_array();
    }

    public function getTipeKamar($spes) //apelkes
    {
        $query =  $this->db->query("SELECT * FROM list_tindakan_apelkes l where l.status= 'AKTIF' and l.tipe_kamar='$spes' 
        and l.nama not like '%visite%' and l.nama not like '%sewa ruang%' and l.kelompok not like '%penunjang%'
        order by l.nama ");
        return $query->result_array();
        // $this->db->select('*');
        // $this->db->where('status', 'AKTIF');
        // $this->db->where('tipe_kamar', $spes);
        // $this->db->order_by('nama');
        // return $this->db->get('list_tindakan_apelkes')->result_array();
    }
    public function getTipeKamar_lama($spes) //apelkes
    {
        $query =  $this->db->query("SELECT * FROM list_tindakan_apelkes l where l.status= 'LAMA' and l.tipe_kamar='$spes' 
        and l.nama not like '%visite%' and l.nama not like '%sewa ruang%' and l.kelompok not like '%penunjang%'
        order by l.nama ");
        return $query->result_array();
        // $this->db->select('*');
        // $this->db->where('status', 'AKTIF');
        // $this->db->where('tipe_kamar', $spes);
        // $this->db->order_by('nama');
        // return $this->db->get('list_tindakan_apelkes')->result_array();
    }
    public function getVisite($spes, $id_pelayanan, $dpjp) //apelkes
    {
        $dokter = $this->db->get_where('dokter', ['id_dokter' => $dpjp])->row();
        $cara_bayar = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row()->cara_bayar;
        $this->db->select('*');
        // if ($cara_bayar == '30' && !preg_match('/BPJS/i', $spes)) {
        //     $this->db->where('tipe_kamar', 'BPJS ' . $spes);
        // } else {
        $this->db->where('tipe_kamar', $spes);
        // }
        if ($cara_bayar == '333'  || $cara_bayar == 'a74' || $cara_bayar == 'b1' || $cara_bayar == 'b4' || $cara_bayar == 'b5') {
            $this->db->where('status', 'LAMA');
        } else {
            $this->db->where('status', 'AKTIF');
        }
        if ($dokter->dokter_spes == 'UMU') {
            $this->db->like('nama', 'Dokter umum visite rutin');
        } else {
            if ($dokter->izin_akses == 'sub spesialis') {
                $this->db->like('nama', 'Dokter sub spesialis visite rutin');
            } else {
                $this->db->like('nama', 'Dokter spesialis visite rutin');
            }
        }
        return $this->db->get('list_tindakan_apelkes')->row_array();
    }
    public function getVisite_diskon($spes, $id_pelayanan, $dpjp) //apelkes
    {
        $dokter = $this->db->get_where('dokter', ['id_dokter' => $dpjp])->row();
        $cara_bayar = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row()->cara_bayar;

        if ($cara_bayar == '30' && !preg_match('/BPJS/i', $spes)) {
            $this->db->select('a.*');
            $this->db->where('l.tipe_kamar', $spes);
        } else if ($cara_bayar == '333') {
            $this->db->select('a.id_list_tindakan_apelkes, a.nama, a.harga_sarana,(l.harga_jasa * (50/100)) harga_jasa');

            $this->db->where('l.tipe_kamar', $spes);
        } else {
            $this->db->select('a.id_list_tindakan_apelkes, a.nama, a.harga_sarana,(l.harga_jasa * (28/100)) harga_jasa');

            $this->db->where('l.tipe_kamar', $spes);
        }
        $this->db->from('list_tindakan_apelkes l, list_tindakan_apelkes a');
        $this->db->where('l.tipe_kamar = SUBSTRING_INDEX(a.tipe_kamar, "-",-1)');
        $this->db->where('l.nama = SUBSTRING_INDEX(a.nama, " - ",1)');
        $this->db->where('SUBSTRING_INDEX(a.nama, " - ",-1)="DISKON"');

        if ($cara_bayar == '333' || $cara_bayar == 'a74' || $cara_bayar == 'b1' || $cara_bayar == 'b4' || $cara_bayar == 'b5') {
            $this->db->where('status', 'LAMA');
        } else {
            $this->db->where('status', 'AKTIF');
        }
        if ($dokter->dokter_spes == 'UMU') {
            $this->db->like('a.nama', 'Dokter umum visite rutin');
        } else {
            if ($dokter->izin_akses == 'sub spesialis') {
                $this->db->like('a.nama', 'Dokter sub spesialis visite rutin');
            } else {
                $this->db->like('a.nama', 'Dokter spesialis visite rutin');
            }
        }
        return $this->db->get()->row_array();
    }
    public function selectDataTindakanByIdPel($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->from('v_tindakan_apelkes');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function selectDataTindakanByIdPelVisite($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->from('v_tindakan_apelkes');
        $this->db->like('nama', 'visite rutin');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->order_by('tanggal desc');

        return $this->db->get()->result();
    }

    public function getDokterPendamping($id_pelayanan)
    {
        $this->db->select("SUBSTRING_INDEX(dokter, ' Sp', 1) as dokter");
        $this->db->distinct();
        $this->db->from('v_tindakan_apelkes');
        $this->db->where('nama', 'Dokter spesialis visite rutin');

        $this->db->where('id_pelayanan', $id_pelayanan);

        return $this->db->get()->result();
    }
    
    public function selectDataKamarByIdPel($id_pelayanan) //Apelkes
    {
        $this->db->select('*');
        $this->db->from('v_kamar_apelkes');
        $this->db->where('ket', '0');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->order_by('tanggal_masuk', 'DESC');
        return $this->db->get()->result();
    }
    public function delete_tindakan($id_tindakan_apelkes) //Apelkes
    {
        $this->db->delete('tindakan_apelkes', array('id_tindakan_apelkes' => $id_tindakan_apelkes));

        $staff = $this->session->userdata('data_auth')->id_staff;
        $this->db->where(array('id_tindakan_apelkes' => $id_tindakan_apelkes));
        $this->db->update('tindakan_apelkes_backup', ['tgl_hapus' => date('Y-m-d H:i:s'), 'staff_hapus' => $staff]);
    }
    public function selectRiwayatPasien()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query =  $this->db->query("SELECT b.tgl_keluar,b.id_pelayanan,h.id_history,c.id_cara_bayar,h.id_kamar,h.dpjp, b.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,r.tipe poli 
        FROM pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c,  ruangan r, dokter dok 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar and r.id_ruangan=h.id_kamar and h.dpjp=dok.id_dokter and h.jenis_pelayanan='RAWAT INAP' 
        and b.tgl_keluar like '$tgl%' 
        ORDER by tgl_masuk desc ");
        return $query->result();
    }
    public function getDataPasienById($id_pelayanan, $id_history)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query =  $this->db->query("SELECT b.id_pelayanan,h.id_history,c.id_cara_bayar,h.id_kamar,h.dpjp, b.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,r.tipe poli 
        FROM pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c,  ruangan r, dokter dok 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar and r.id_ruangan=h.id_kamar and h.dpjp=dok.id_dokter and h.jenis_pelayanan='RAWAT INAP' 
        and b.id_pelayanan='$id_pelayanan' and h.id_history='$id_history'");
        return $query->result();
    }
    public function selectRangeRiwayatPasien($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query =  $this->db->query("SELECT b.id_pelayanan,h.id_history,c.id_cara_bayar,h.id_kamar,h.dpjp, b.tgl_masuk, b.tgl_keluar,p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,r.tipe poli 
        FROM pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c,  ruangan r, dokter dok 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar and r.id_ruangan=h.id_kamar and h.dpjp=dok.id_dokter and h.jenis_pelayanan='RAWAT INAP' 
        and b.tgl_keluar >= '$mulai' and b.tgl_keluar <= '$akhir'
        ORDER by tgl_masuk desc");
        return $query->result();
    }
    public function selectKamarById($id_pelayanan)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query =  $this->db->query("SELECT r.kelas_ruangan,r.tipe,k.tanggal_masuk,k.tanggal_keluar,k.status FROM riwayat_kamar k, ruangan r, pelayanan p WHERE p.id_pelayanan=k.id_pelayanan and k.id_kamar=r.id_ruangan and p.id_pelayanan='$id_pelayanan' ");
        return $query->result();
    }
    public function selectTindakan($id_pelayanan)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query =  $this->db->query("SELECT t.*, l.nama,l.tipe_kamar, d.nama dokter, s.nama staff from tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p,dokter d , staff s WHERE t.id_list_tindakan=l.id_list_tindakan_apelkes and d.id_dokter=t.id_dokter   and s.id_staff=t.id_staff and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$id_pelayanan'  ");
        return $query->result();
    }
    public function getTotalTindakanById($id_pelayanan)
    {
        $this->db->select('sum(total) total');
        $this->db->from('tindakan_apelkes');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function selectPasienLaborPulang() //Apelkes ranap
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('f.id_form_labor,p.*,b.id_pelayanan, b.tgl_masuk, b.tgl_keluar,b.keterangan,b.no_sep,b.diagnosa,h.id_history, h.jenis_pelayanan,c.nama cara_bayar, d.nama nama_dokter,r.tipe poli, f.tgl');
        $this->db->from('pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c, ruangan r, dokter d, form_labor f');
        $this->db->where('p.no_rm = b.id_pasien');
        $this->db->where('b.id_pelayanan = h.id_pelayanan');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('h.id_kamar = r.id_ruangan');
        $this->db->where('h.dpjp = d.id_dokter');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        // $this->db->where('h.jenis_pelayanan', 'RAWAT INAP');
        //$this->db->where('b.status_rawat', 'selesai');
        $this->db->where('b.status', 1);
        $this->db->where('h.status', 1);
        $this->db->where('f.status', 2);
        $this->db->like("f.tgl", $tgl);
        $this->db->order_by('b.tgl_masuk', 'DESC');
        return $this->db->get()->result();
    }
    public function selectPasienLaborPulangRange($mulai, $akhir) //Apelkes ranap
    {
        $this->db->select('f.id_form_labor,p.*,b.id_pelayanan, b.tgl_masuk, b.tgl_keluar,b.keterangan,b.no_sep,b.diagnosa,h.id_history, h.jenis_pelayanan,c.nama cara_bayar, d.nama nama_dokter,r.tipe poli, f.tgl');
        $this->db->from('pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c, ruangan r, dokter d, form_labor f ');
        $this->db->where('p.no_rm = b.id_pasien');
        $this->db->where('b.id_pelayanan = h.id_pelayanan');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('h.id_kamar = r.id_ruangan');
        $this->db->where('h.dpjp = d.id_dokter');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        // $this->db->where('h.jenis_pelayanan', 'RAWAT INAP');
        //$this->db->where('b.status_rawat', 'selesai');
        $this->db->where('b.status', 1);
        $this->db->where('h.status', 1);
        $this->db->where('f.status', 2);

        $this->db->where("f.tgl >=", $mulai);
        $this->db->where("f.tgl <=", $akhir);
        $this->db->order_by('b.tgl_masuk', 'DESC');
        return $this->db->get()->result();
    }
    public function selectPasienLaborPulangUGD() //Apelkes ugd
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select("f.id_form_labor,p.*,b.id_pelayanan, b.tgl_masuk, b.tgl_keluar,b.keterangan,b.no_sep,b.diagnosa,h.id_history, h.jenis_pelayanan,c.nama cara_bayar, d.nama nama_dokter, '-' poli, f.tgl");
        $this->db->from('pasien p, pelayanan b, history_pelayanan_ugd h, cara_bayar c, dokter d, form_labor f');
        $this->db->where('p.no_rm = b.id_pasien');
        $this->db->where('b.id_pelayanan = h.id_pelayanan');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('h.dpjp = d.id_dokter');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        // $this->db->where('h.jenis_pelayanan', 'UGD');
        //$this->db->where('b.status_rawat', 'selesai');
        $this->db->where('b.status', 1);
        $this->db->where('h.status', 1);
        $this->db->where('f.status', 2);

        $this->db->like("f.tgl ", $tgl);
        $this->db->order_by('b.tgl_masuk', 'DESC');
        return $this->db->get()->result();
    }
    public function selectPasienLaborPulangUGDRange($mulai, $akhir) //Apelkes ugd
    {
        $this->db->select("f.id_form_labor,p.*,b.id_pelayanan, b.tgl_masuk, b.tgl_keluar,b.keterangan,b.no_sep,b.diagnosa,h.id_history, h.jenis_pelayanan,c.nama cara_bayar, d.nama nama_dokter, '-' poli, f.tgl");
        $this->db->from('pasien p, pelayanan b, history_pelayanan_ugd h, cara_bayar c, dokter d, form_labor f');
        $this->db->where('p.no_rm = b.id_pasien');
        $this->db->where('b.id_pelayanan = h.id_pelayanan');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('h.dpjp = d.id_dokter');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        // $this->db->where('h.jenis_pelayanan', 'UGD');
        //$this->db->where('b.status_rawat', 'selesai');
        $this->db->where('b.status', 1);
        $this->db->where('h.status', 1);
        $this->db->where('f.status', 2);

        $this->db->where("f.tgl >=", $mulai);
        $this->db->where("f.tgl <=", $akhir);
        $this->db->order_by('b.tgl_masuk', 'DESC');
        return $this->db->get()->result();
    }
    public function selectPasienLaborPulangPoli() //Apelkes poli
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('f.id_form_labor,p.*,b.id_pelayanan, b.tgl_masuk, b.tgl_keluar,b.keterangan,b.no_sep,b.diagnosa,h.id_history, h.jenis_pelayanan,c.nama cara_bayar, d.nama nama_dokter, l.nama_panjang poli, f.tgl');
        $this->db->from('pasien p, pelayanan b, history_pelayanan h, cara_bayar c, dokter d, list_poli l,form_labor f');
        $this->db->where('p.no_rm = b.id_pasien');
        $this->db->where('b.id_pelayanan = h.id_pelayanan');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('h.dpjp = d.id_dokter');
        $this->db->where('h.nama_poli = l.id_list_poli');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        // $this->db->where('h.jenis_pelayanan', 'POLI');
        // $this->db->where('b.status_rawat', 'selesai');
        $this->db->where('b.status', 1);
        $this->db->where('h.status', 1);
        $this->db->where('f.status', 2);
        $this->db->like("f.tgl ", $tgl);
        $this->db->order_by('b.tgl_masuk', 'DESC');
        return $this->db->get()->result();
    }
    public function selectPasienLaborPulangPoliRange($mulai, $akhir) //Apelkes poli
    {
        $this->db->select('f.id_form_labor,p.*,b.id_pelayanan, b.tgl_masuk, b.tgl_keluar,b.keterangan,b.no_sep,b.diagnosa,h.id_history, h.jenis_pelayanan,c.nama cara_bayar, d.nama nama_dokter, l.nama_panjang poli, f.tgl');
        $this->db->from('pasien p, pelayanan b, history_pelayanan h, cara_bayar c, dokter d, list_poli l,form_labor f');
        $this->db->where('p.no_rm = b.id_pasien');
        $this->db->where('b.id_pelayanan = h.id_pelayanan');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('h.dpjp = d.id_dokter');
        $this->db->where('h.nama_poli = l.id_list_poli');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        //$this->db->where('b.status_rawat', 'selesai');
        $this->db->where('b.status', 1);
        $this->db->where('h.status', 1);
        $this->db->where('f.status', 2);
        $this->db->where("f.tgl >=", $mulai);
        $this->db->where("f.tgl <=", $akhir);
        $this->db->order_by('b.tgl_masuk', 'DESC');
        return $this->db->get()->result();
    }

    public function selectPasienLabor() //Apelkes
    {
        $this->db->select('p.*,b.*,h.*,c.nama cara_bayar, d.nama nama_dokter,r.tipe poli');
        $this->db->from('pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c, ruangan r, dokter d');
        $this->db->where('p.no_rm = b.id_pasien');
        $this->db->where('b.id_pelayanan = h.id_pelayanan');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('h.id_kamar = r.id_ruangan');
        $this->db->where('h.dpjp = d.id_dokter');
        // $this->db->where('h.jenis_pelayanan', 'RAWAT INAP');
        // $this->db->where('b.status_rawat', 'dirawat');
        $this->db->where("(b.status_rawat='dirawat' OR b.status_rawat='dikembalikan')");
        $this->db->where('b.status', 1);
        $this->db->where('h.status', 1);
        $this->db->order_by('b.tgl_masuk', 'DESC');
        return $this->db->get()->result();
    }
    public function selectDataRiwayatRadiologi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT p.alamat,b.id_pelayanan,h.id_history,c.id_cara_bayar,h.nama_poli,h.dpjp, h.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar, pl.nama poli 
        FROM pasien p, pelayanan b, history_pelayanan h, cara_bayar c, list_poli pl, dokter dok 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar AND pl.id_list_poli=h.nama_poli and h.dpjp=dok.id_dokter and h.jenis_pelayanan='POLI' 
        and  p.no_rm not like '-999%' and  p.no_rm not like '-0099%'
        and b.tgl_masuk like '$tgl%'
         
        ORDER by tgl_masuk desc ");
        return $hasil->result();
    }

    public function selectDataRiwayatRadiologiRange($mulai, $akhir)
    {
        $hasil = $this->db->query("SELECT p.alamat,b.id_pelayanan,h.id_history,c.id_cara_bayar,h.nama_poli,h.dpjp, h.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar, pl.nama poli 
        FROM pasien p, pelayanan b, history_pelayanan h, cara_bayar c, list_poli pl, dokter dok 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar AND pl.id_list_poli=h.nama_poli and h.dpjp=dok.id_dokter and h.jenis_pelayanan='POLI' 
          and b.tgl_masuk >= '$mulai' and b.tgl_masuk <= '$akhir' and  p.no_rm not like '-999%' and  p.no_rm not like '-0099%' and b.id_pelayanan in (SELECT id_pelayanan from tindakan_radiologi group by id_pelayanan)
       
        ORDER by tgl_masuk desc  ");
        return $hasil->result();
    }
    public function getDataRiwayatRadiologi($id_pelayanan, $id_history)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT p.alamat,b.id_pelayanan,h.id_history,c.id_cara_bayar,h.nama_poli,h.dpjp, h.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar, pl.nama poli 
        FROM pasien p, pelayanan b, history_pelayanan h, cara_bayar c, list_poli pl, dokter dok 
        WHERE p.no_rm=b.id_pasien and h.id_pelayanan=b.id_pelayanan and c.id_cara_bayar=b.cara_bayar AND pl.id_list_poli=h.nama_poli and h.dpjp=dok.id_dokter and h.jenis_pelayanan='POLI' 
        and  p.no_rm not like '-999%' and  p.no_rm not like '-0099%' 
        and b.id_pelayanan = '$id_pelayanan' and h.id_history = '$id_history'
         
        ORDER by tgl_masuk desc ");
        return $hasil->result();
    }
    public function cekSewaKamar($id_pelayanan, $tgl)
    {
        return $this->db->query("SELECT *
        from tindakan_apelkes t, list_tindakan_apelkes l
        where t.id_list_tindakan=l.id_list_tindakan_apelkes and l.nama like '%sewa ruang%' and t.id_pelayanan='$id_pelayanan' and t.tanggal like '%$tgl%'")->result();
    }
    public function countVisiteBpjs($id_pelayanan, $id_dokter)
    {
        $this->db->select('count(*) count');
        $this->db->from('v_tindakan_apelkes');
        $this->db->where_not_in("tipe_kamar = 'ICU' and tipe_kamar = 'HCU'");
        $this->db->like('nama', 'visite rutin');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('id_dokter', $id_dokter);
        // $this->db->group_by('id_dokter');

        return $this->db->get()->row();
    }
    public function countVisiteBpjsICU($id_pelayanan, $id_dokter)
    {
        $this->db->select('count(*) count');
        $this->db->from('v_tindakan_apelkes');
        $this->db->where("(tipe_kamar = 'ICU' or tipe_kamar = 'HCU')");
        $this->db->like('nama', 'visite rutin');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('id_dokter', $id_dokter);
        // $this->db->group_by('id_dokter');

        return $this->db->get()->row();
    }
    public function apelkes()
    {
        $this->db->select('v.*');
        $this->db->from('v_tindakan_apelkes v,v_perawat_ranap p');
        $this->db->where('v.id_pelayanan = p.id_pelayanan');
        $this->db->like('v.nama', 'visite rutin');
        $this->db->like('v.tipe_kamar', 'BPJS');
        $this->db->where('p.id_cara_bayar', '30');
        $this->db->where('p.keluar_kamar', NULL);
        $this->db->order_by('tanggal');

        return $this->db->get()->result();
    }
    public function getKamarById($id_pelayanan)
    {
        return $this->db->query("SELECT r.tipe
        from history_pelayanan_ranap h, ruangan r
        where h.id_kamar = r.id_ruangan and h.id_pelayanan ='$id_pelayanan'")->row();
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
