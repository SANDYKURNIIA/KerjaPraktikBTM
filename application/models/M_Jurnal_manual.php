<?php

class M_Jurnal_manual extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getVendor()
    {
        return $this->db->query("SELECT * from(
            SELECT nama, kode_pelanggan id_vendor from cara_bayar 
            union all
            SELECT nama_produsen nama, kode id_vendor from produsen
        )as a
        group by id_vendor  
        ORDER BY nama  ASC 
        ")->result_array();
    }
    public function SelectJurnalRupa($mulai, $akhir)
    {
        $tgl = date('Y-m-d');
        $this->db->select("j.*,s.nama staff");
        $this->db->from("jurnal_rupa j, staff s");
        $this->db->where("j.id_staff = s.id_staff");
        if ($mulai != '' && $akhir != '') {
            $this->db->where("DATE(j.tanggal) BETWEEN '$mulai' and '$akhir'");
        } else {
            $this->db->like("j.tanggal", $tgl);
        }
        return $this->db->get()->result();
    }
    public function SelectJurnalRupaVerifikasi($mulai, $akhir)
    {
        $tgl = date('Y-m-d');
        $this->db->select("j.*,s.nama staff");
        $this->db->from("jurnal_rupa j, staff s");
        $this->db->where("j.id_staff = s.id_staff");
        $this->db->where("j.ket", 1);
        if ($mulai != '' && $akhir != '') {
            $this->db->where("DATE(j.tanggal) BETWEEN '$mulai' and '$akhir'");
        } else {
            $this->db->like("j.tgl_simpan", $tgl);
        }
        return $this->db->get()->result();
    }
    public function TampilJurnalRupa($id_fk)
    {
        return $this->db->query(" SELECT j.*,s.nama staff
            FROM jurnal_rupa j, staff s
            where j.id_staff = s.id_staff and no_jurnal = '$id_fk'
            ")->row_array();
    }

    public function getJurnalRupa($id_fk)
    {
        return $this->db->query(" SELECT *
            FROM detail_jurnal_rupa
            where no_jurnal = '$id_fk'
            order by id_fk,tgl asc
            ")->result_array();
    }
    //KAS BANK
    public function SelectJurnalKasBank($mulai, $akhir, $tipe_jurnal)
    {
        $tgl = date('Y-m-d');
        $this->db->select("j.*");
        $this->db->from("jurnal_kas_bank j");
        // $this->db->where("j.id_staff = s.id_staff");
        if ($mulai != '' && $akhir != '') {
            $this->db->where("DATE(j.tanggal) BETWEEN '$mulai' and '$akhir'");
        } else {
            $this->db->like("j.tanggal", $tgl);
        }
        $this->db->where("j.tipe_jurnal", $tipe_jurnal);
        return $this->db->get()->result();
    }
    public function SelectJurnalKasBankVerifikasi($mulai, $akhir, $tipe_jurnal)
    {
        $tgl = date('Y-m-d');
        $this->db->select("j.*");
        $this->db->from("jurnal_kas_bank j");
        // $this->db->where("j.id_staff = s.id_staff");
        $this->db->where("j.ket", 1);
        if ($mulai != '' && $akhir != '') {
            $this->db->where("DATE(j.tanggal) BETWEEN '$mulai' and '$akhir'");
        } else {
            $this->db->like("j.tanggal", $tgl);
        }
        $this->db->where("j.tipe_jurnal", $tipe_jurnal);
        return $this->db->get()->result();
    }
    public function SelectJurnalKasBankLaporan($mulai, $akhir, $tipe_jurnal)
    {
        $tgl = date('Y-m-d');
        $this->db->select("j.*");
        $this->db->from("jurnal_kas_bank j");
        // $this->db->where("j.id_staff = s.id_staff");
        $this->db->where("j.verifikasi", 'DITERIMA');
        if ($mulai != '' && $akhir != '') {
            $this->db->where("DATE(j.tanggal) BETWEEN '$mulai' and '$akhir'");
        } else {
            $this->db->like("j.tanggal", $tgl);
        }
        $this->db->where("j.tipe_jurnal", $tipe_jurnal);
        return $this->db->get()->result();
    }
    public function TampilJurnalKasBank($id_fk)
    {
        return $this->db->query(" SELECT j.*,j.id_staff staff, j.tanggal
            FROM jurnal_kas_bank j
            where no_jurnal = '$id_fk'
            ")->row_array();
    }

    public function getJurnalKasBank($id_fk,$tipe)
    {
        if($tipe == 'MIT'){
            return $this->db->query(" SELECT b.id_jurnal_bank id_detail, k.id_jurnal, b.jk, b.rekening, b.deskripsi, b.no_jurnal, b.kredit, b.debet, b.pk, b.des_rek, b.lap,b.jb,b.cj
            FROM jurnal_bank b, jurnal_kas_bank k 
            where b.no_jurnal = k.no_jurnal and k.no_jurnal = '$id_fk'
            and k.source = 'MIT'
            -- order by id_fk asc
            ")->result_array();
        }else{
            return $this->db->query(" SELECT *
            FROM detail_jurnal_kas_bank
            where no_jurnal = '$id_fk'
            order by id_fk asc
            ")->result_array();
        }
        
    }
    // /////SALDO AWAL
    public function SelectSaldoAwal()
    {
        $tgl = date('Y');
        $this->db->select("j.*,s.nama staff");
        $this->db->from("jurnal_saldo_awal j, staff s");
        $this->db->where("j.id_staff = s.id_staff");

        return $this->db->get()->result();
    }
    public function TampilSaldoAwal($id_fk)
    {
        return $this->db->query("SELECT * FROM (
        SELECT d.kode, IFNULL(j.nilai,0) nilai,j.d_k, d.deskripsi
        FROM daftar_akun_saldo_awal d
        left join detail_jurnal_saldo_awal j on j.rekening = d.kode and j.id_jurnal ='$id_fk'
        where SUBSTRING_INDEX(SUBSTRING_INDEX(d.kode, '.', 2),'.',-1) != '00'
        UNION ALL
        SELECT CONCAT(d.kode,s.kode) kode,0 as nilai,'' as d_k, IFNULL(CONCAT(d.ket,' = ',d.deskripsi,' = ',s.deskripsi),CONCAT(d.deskripsi,' = ',s.deskripsi)) deskripsi
        from daftar_sub_saldo_awal d, sub_detail_daftar_akun s 
        where d.id_fk = s.id_fk) as gabung
        order by kode asc
        ")->result();
    }

    public function getSaldoAwal($id_fk)
    {
        return $this->db->query("SELECT *
            FROM detail_jurnal_saldo_awal
            where id_jurnal = '$id_fk'
            order by SUBSTRING_INDEX(rekening, '.',1),SUBSTRING_INDEX(SUBSTRING_INDEX(rekening, '.', 2),'.',-1),SUBSTRING_INDEX(rekening, '.',-1)
            ")->result_array();
    }
    public function getBuktiKas($no_jurnal)
    {
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT d.*,j.pk,j.ket_jurnal
        from detail_hutang_bukti_kas d
        left join jurnal_pembayaran_farmasi j on j.id_jurnal = d.id_jurnal
        where d.no_jurnal =  '$no_jurnal'");

        // $this->db->group_by('no_dokumen');
        return $query->result();
    }
    
}
