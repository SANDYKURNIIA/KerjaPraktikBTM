<?php

class M_Erm_poli extends CI_Model
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
    public function getErm($no_rm)
    {
        $this->db->select('v.tgl_masuk, v.tgl_keluar,d.nama_diagnosa, v.id_pelayanan,v.id_history, v.nama_dokter dpjp, v.jenis_pelayanan,d.kode ');
        $this->db->from('v_erm_poli v,diagnosa_utama d ');
        $this->db->where('v.id_history = d.id_history');
        $this->db->where('status_erm',1);
        $this->db->where('no_rm', $no_rm);
        $this->db->order_by('tgl_masuk desc');
        $this->db->limit(5);
        return $this->db->get()->result();
        // $this->db->select('p.tgl_masuk, p.tgl_keluar,p.diagnosa, p.id_pelayanan,h.id_history, d.nama dpjp, h.jenis_pelayanan ');
        // $this->db->from('pelayanan p, history_pelayanan h, dokter d');
        // $this->db->where('p.id_pelayanan = h.id_pelayanan');
        // $this->db->where('h.dpjp = d.id_dokter');
        // $this->db->where('h.status_erm = 1');
        // $this->db->where('p.id_pasien', $no_rm);
        // $this->db->order_by('p.tgl_masuk desc');
        // $this->db->limit(7);
        // return $this->db->get()->result();
    }

    public function getDataEval($id_pelayanan, $id_history)
    {
        $this->db->select("evaluasi");
        $this->db->from("form_lembar_evaluasi");
        $this->db->where("id_pelayanan", $id_pelayanan);
        $this->db->where("id_history", $id_history);
        return $this->db->get()->row();
    }
    public function selectDataPasienPoliby_id($id_pelayanan, $id_history)
    {
        $this->db->select('b.id_pelayanan,h.id_history ,c.id_cara_bayar ,h.tgl_masuk ,p.no_rm ,p.nama ,p.jenis_kelamin ,p.tgl_lahir ,dok.nama AS nama_dokter,b.no_sep ,b.diagnosa,c.nama AS cara_bayar,b.status,l.nama AS poli,h.jenis_pelayanan ,h.status_erm ,h.dpjp ,h.nama_poli , p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar,b.total_bayar');
        $this->db->from('pelayanan b');
        $this->db->join('pasien p','b.id_pasien = p.no_rm');
        $this->db->join('history_pelayanan h','b.id_pelayanan = h.id_pelayanan');
        $this->db->join('cara_bayar c','b.cara_bayar = c.id_cara_bayar');
        $this->db->join('list_poli l','h.nama_poli = l.id_list_poli');
        $this->db->join('dokter dok','h.dpjp = dok.id_dokter');
        $this->db->where(array('b.id_pelayanan' => $id_pelayanan, 'h.id_history' => $id_history));
        return $this->db->get()->row();
    }

    public function selectDataPasienIGDby_id($id_pelayanan, $id_history)
    {
        $data = $this->session->userdata('data_auth');
        $tipe = $data->tipe;
        if ($tipe == 'poliinternis') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_internis v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'poliobgyne') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_obgyne v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'politht') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_tht v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'polimata') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_mata v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'polikulit') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_kulit v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'poliumum') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_umum v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'polianak') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_anak v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'poligigi') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_gigi v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'polijantung') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_jantung v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'polibedah') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_bedah v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'polifisio') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_fisio v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'rehab') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_rehab_medik v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'polihemodialisa') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_hemodialisa v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'polipenyakitmulut') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_penyakit_mulut v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'poliginjal') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_ginjal v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'polisaraf') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_saraf v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'poliurologi') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_urologi v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'polibedahmulut') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_bedah_mulut v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'poliorthopedi') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_orthopedi v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'poliparu') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_paru v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'polikesjiwa') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_kesehatan_jiwa v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'poliakupuntur') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_akupuntur v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'polipsikolog') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_psikolog v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'poligizi') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_gizi v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'terapiwicara') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_terapi_bicara v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'kemoterapi') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_kemo v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'polistifin') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_stifin v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'poliorthodonti') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_orthodenti v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'konservasigigi') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_konservasi_gigi v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        } elseif ($tipe == 'okupasi') {
            $this->db->select('v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar');
            $this->db->from('v_pasien_okupasi v, pasien p,history_pelayanan h');
            $this->db->where('v.no_rm = p.no_rm');
            $this->db->where('v.id_history = h.id_history');
            $this->db->where(array('v.id_pelayanan' => $id_pelayanan, 'v.id_history' => $id_history));
            return $this->db->get()->row();
        }
    }

    public function selectDataPasienAllby_id($id_pelayanan, $id_history)
    {

        $query = $this->db->query("SELECT * FROM ( 
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_internis v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL 
            SELECT  v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_obgyne v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL 
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_obgyne v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL 
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_tht v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL 
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_mata v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL 
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_kulit v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL 
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_umum v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL 
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_anak v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL 
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_gigi v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_jantung v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_bedah v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_fisio v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_rehab_medik v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_hemodialisa v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_penyakit_mulut v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_ginjal v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_saraf v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_urologi v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_bedah_mulut v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_orthopedi v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_paru v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_kesehatan_jiwa v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_terapi_bicara v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_kemo v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_stifin v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_orthodenti v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            UNION ALL
            SELECT v.*, p.pekerjaan, p.agama,p.no_hp,p.alamat,p.kelurahan, p.kecamatan, p.provinsi,h.tgl_keluar
            FROM v_pasien_okupasi v, pasien p,history_pelayanan h
            WHERE v.no_rm = p.no_rm AND v.id_history = h.id_history AND v.id_pelayanan = '$id_pelayanan' AND v.id_history = '$id_history'
            ) AS gabung ");
            return $query->row_array();
    }
    public function selectDataPasienIGDbyid($id_pelayanan, $id_history) //riwayat erm
    {
        $this->db->select('v.*');
        $this->db->from('v_erm_poli v');
        //$this->db->where('v.nama_poli');
        $this->db->where('v.id_pelayanan', $id_pelayanan);
        $this->db->where('v.id_history', $id_history);

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

    public function cetakTindakanOpr($id_pelayanan){
        $this->db->select('f.*, p.nama, p.tgl_lahir, p.jenis_kelamin');
        $this->db->from('form_tindakan_operasi f, pasien p');
        $this->db->where('p.no_rm = f.no_rm');
        $this->db->where('f.id_pelayanan', $id_pelayanan);
        return $this->db->get()->row_array();
    }
    public function checkData($id_histori, $table)
    {
        return $this->db->get_where($table, ['id_history' => $id_histori])->row_array();
    }
    public function selectDataDiagnosaByIdPel($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->from('erm_diagnosa_dokter');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function selectTerapiByIdPel($id_pelayanan)
    {
        $this->db->select('l.nama,sum(t.frek) frek,t.tanggal, s.tindakan,c.cara_pemakaian');
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
        $this->db->from('form_assesmen_awal_rajal f, pelayanan b,pasien p,cara_bayar c, form_assesmen_dokter d, diagnosa_utama u, history_pelayanan h, dokter dok');
        $this->db->where('f.id_pelayanan = b.id_pelayanan');
        $this->db->where('d.id_pelayanan = b.id_pelayanan');
        $this->db->where('u.id_pelayanan = b.id_pelayanan');
        $this->db->where('h.id_pelayanan = b.id_pelayanan');
        $this->db->where('h.dpjp = dok.id_dokter');
        $this->db->where('f.no_rm = p.no_rm');
        $this->db->where('d.no_rm = p.no_rm');
        $this->db->where('b.cara_bayar = c.id_cara_bayar');
        $this->db->where('h.id_history', $id);
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
    function insert_update($id_pelayanan, $id_history, $data)
    {
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
    public function selectSoap($id_pelayanan)
    {
        $this->db->select('f.*, p.tgl_masuk');
        $this->db->from('form_soap_rehab f, pelayanan p');
        $this->db->where('f.id_pelayanan = p.id_pelayanan');
        $this->db->where('f.id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
 //YANG NI YA BANG, AMPE BWAWAAHHHHH//
        public function get_data_print_soap($id_catatan)
        {
            $soap = $this->db->get_where('form_soap_rehab', ['id_catatan' => $id_catatan])->row();

            if (!$soap) {
                return null;
            }

            // 🔹 Ambil data pasien
            $pasien = $this->db
                ->select('no_rm, nama AS nama_pasien, jenis_kelamin')
                ->from('pasien')
                ->where('no_rm', $soap->no_rm)
                ->get()
                ->row();

            if (!$pasien) {
                $pasien = (object)[
                    'nama_pasien' => '-',
                    'jenis_kelamin' => '-'
                ];
            }

            $history_pelayanan = $this->db->select("h.dpjp, h.id_pelayanan")
            ->from('history_pelayanan h')
            ->where('h.id_pelayanan', $soap->id_pelayanan)
            ->get()
            ->row();
            

            // 🔹 Ambil nama dokter (DPJP) dari tabel staff lewat id_staff di tabel pelayanan
            $dokter = $this->db
                ->select('d.nama AS nama_dokter')
                ->from('dokter d')
                ->where('id_dokter', $history_pelayanan->dpjp)
                ->get()
                ->row();

            // if (!$dokter) {
            //     $dokter = (object)['nama_dokter' => '-'];
            // }

            // 🔹 Return semua data ke controller
            return [
                'soap' => $soap,
                'pasien' => $pasien,
                'dokter' => $dokter
            ];
        }
}
