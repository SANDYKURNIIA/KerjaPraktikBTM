<<<<<<< HEAD
<?php

class M_Keuangan_ijd extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function Select_ijd($dokter, $jenis, $first_date, $second_date, $status)
    {

        $this->db->select('j.*');
        $this->db->from('akun_jasa_dokter j, akun_tindakan a,dokter d');
        $this->db->where('j.id_pelayanan = a.id_pelayanan');
        $this->db->where('j.dokter = d.id_dokter');
        $this->db->where('a.status = 1');
        $this->db->where('d.nama', $dokter);
        $this->db->where('j.jenis_rawat', $jenis);
        $this->db->where('j.verifikasi', $status);
        $this->db->where("(DATE(j.tgl) BETWEEN '$first_date' and '$second_date')");
        $this->db->group_by('j.id_akun');

        return $this->db->get()->result();
    }

    ////////////////Jurnal IJD\\\\\\\\\\\\\\\\\\\

    public function getAkunlIJD($first_date, $second_date, $dokter)
    {

        $this->db->select('j.*');
        $this->db->from('akun_jasa_dokter j, dokter d');
        $this->db->where('j.dokter = d.id_dokter');
        $this->db->where('j.verifikasi = 1');
        $this->db->where('j.dokter', $dokter);

        $this->db->where("(DATE(j.tgl) BETWEEN '$first_date' and '$second_date')");

        return $this->db->get()->result();
    }
    public function SelectJurnalIJD($first_date, $second_date, $dokter)
    {
        $tgl = date("Y-m-d");

        $this->db->select('j.id_pelayanan,j.nama,j.tgl,j.tipe_pasien,sum(j.jumlah) jumlah');
        $this->db->from('akun_jasa_dokter j, dokter d');
        $this->db->where('j.dokter = d.id_dokter');
        $this->db->where('j.verifikasi = 1');
        $this->db->where('j.status = 0');
        $this->db->where('d.nama', $dokter);
        if ($first_date != '' || $second_date != '') {
            $this->db->where("j.tgl BETWEEN '$first_date' and '$second_date'");
        } else {
            $this->db->like("j.tgl", $tgl);
        }
        $this->db->group_by('j.id_pelayanan');

        return $this->db->get()->result();
    }
    public function SelectPembayaran_IJD($id_pel,$dokter)
    {
        $tgl = date("Y-m-d");

        $this->db->select('j.id_pelayanan,j.nama,j.tgl,j.tipe_pasien,sum(j.jumlah) jumlah,j.no_jurnal');
        $this->db->from('akun_jasa_dokter j, dokter d');
        $this->db->where('j.dokter = d.id_dokter');
        $this->db->where('j.verifikasi = 1');
        $this->db->where('j.status_pembayaran',null);
        $this->db->where('j.id_pelayanan', $id_pel);
        $this->db->where('d.nama', $dokter);
       
        $this->db->group_by('j.id_pelayanan,d.nama');

        return $this->db->get()->row();
    }
    public function setJurnalIJD($id_pel)
    {
        $tgl = date("Y-m-d");

        $this->db->select('j.*');
        $this->db->from('akun_jasa_dokter j');
        $this->db->where('j.verifikasi = 1');
        $this->db->where('j.status = 0');
        $this->db->where('j.id_pelayanan', $id_pel);
        
        return $this->db->get()->result();
    }
   
    public function selectJurnalBebanIJD($noDokR)
    {
        return $this->db->query("SELECT sum(debet) total, id_fk, no_jurnal,pk FROM jurnal_ijd where no_jurnal = '$noDokR'  group by no_jurnal")->row();
    }

    public function SelectLaporanIjd($first_date, $second_date)
    {
        $tgl = date("Y-m-d");

        $this->db->select('tgl,no_jurnal,sum(kredit) total, staff,jk,pk,id_fk');
        $this->db->from('jurnal_ijd');
        if ($first_date != '' || $second_date != '') {
            $this->db->where("(DATE(tgl) BETWEEN '$first_date' and '$second_date')");
        } else {
            $this->db->like('tgl', $tgl);
        }
        $this->db->group_by('id_fk');
        return $this->db->get()->result();
    }
    public function getJurnalIJD($id_fk)
    {
        return $this->db->query("SELECT * FROM (
            SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,debet, kredit,no_jurnal, id_fk
            FROM jurnal_ijd 
            union ALL
            SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,debet, kredit,no_jurnal, id_fk 
            FROM jurnal_hutang_ijd
            ) as gabung
            where id_fk = '$id_fk'
            ")->result_array();
    }

    /////////////////////VERIFIKASI JURNAL FARMASI/////////////////////////////////////////////////////////////////////////
    public function Select_akun_persediaan_farmasi($first_date, $second_date, $tipe)
    {
        $tgl = date("Y-m-d");
        if ($tipe == "persediaan") {
            $this->db->select('j.*,s.index_dok,s.tgl_buat');
            $this->db->from('akun_persediaan_farmasi j, struk_logistik s');
            $this->db->where('j.no_faktur = s.no_faktur');
            $this->db->where('j.tgl_faktur = s.tgl_masuk');
            $this->db->where('j.verifikasi', 0);
            $this->db->where('s.ket', 0);
            $this->db->where('j.tipe_akun', $tipe);

            if ($first_date != '' || $second_date != '') {
                $this->db->where("DATE(s.tgl_buat) BETWEEN '$first_date' and '$second_date'");
            } else {
                $this->db->like('s.tgl_buat', $tgl);
            }
        } else {
            $this->db->select('s.no_jurnal,s.pk,s.tgl,s.id_jurnal, sum(s.kredit) total,s.des_rek');
            $this->db->from('jurnal_pembayaran_farmasi s');
            $this->db->where('s.verifikasi_hutang', 0);
            $this->db->where('s.status', 'DITERIMA');
            $this->db->where('s.jenis_jurnal', 'persediaan');

            if ($first_date != '' || $second_date != '') {
                $this->db->where("DATE(s.tgl) BETWEEN '$first_date' and '$second_date'");
            } else {
                $this->db->like('s.tgl', $tgl);
            }
            $this->db->group_by('s.no_jurnal');
        }

        return $this->db->get()->result();
    }
    public function Select_pelacakan($first_date, $second_date)
    {
        $tgl = date("Y-m-d");

        $this->db->select('j.*,s.index_dok,s.tgl_buat,a.status status_jurnal,a.verifikasi_hutang,a.ket_jurnal jurnal_utang');
        $this->db->from('akun_persediaan_farmasi j');
        $this->db->join('struk_logistik s', ' j.no_faktur = s.no_faktur');
        $this->db->where('s.ket', 0);
        $this->db->join('jurnal_pembayaran_farmasi a', ' a.no_jurnal = j.no_jurnal and a.jenis_jurnal = "persediaan"', 'left');

        if ($first_date != '' || $second_date != '') {
            $this->db->where("DATE(s.tgl_buat) BETWEEN '$first_date' and '$second_date'");
        } else {
            $this->db->like('s.tgl_buat', $tgl);
        }

        return $this->db->get()->result();
    }
    public function getNpb_pelacakan($npb)
    {
        $dat = $this->db->query("SELECT *
        from jurnal_pembayaran_farmasi a, jurnal_farmasi b
        where a.no_jurnal =b.no_jurnal  and b.no_po like'%$npb%'
        and a.status ='DITERIMA'");
        return $dat->num_rows();
    }
    public function getBuktiKas_pelacakan($npb)
    {
        $dat = $this->db->query("SELECT *
        from jurnal_pembayaran_farmasi a, jurnal_farmasi b,jurnal_pembayaran_farmasi c
        where a.kode_check =c.id_fk and c.pk =a.pk and c.pk = b.no_po and b.no_jurnal = a.no_jurnal  and b.pk ='$npb'
        and c.ket_jurnal ='1'");
        return $dat->num_rows();
    }
    public function get_akun($id_akun)
    {
        $this->db->select('j.*');
        $this->db->from('akun_persediaan_farmasi j');
        $this->db->where('j.id_akun', $id_akun);
        return $this->db->get()->row();
    }

    //////////////////JURNAL FARMASI/////////////////////////////////////////////
    public function SelectJurnalFarmasi($first_date, $second_date, $tipe)
    {
        $tgl = date("Y-m-d");
        if ($tipe == "persediaan") {
            $this->db->select('j.*,co.coa,co.desk,v.kode id_produsen,sum(((d.harga - d.harga * (d.diskon_rs / 100))*d.frek))total,d.ppn,s.index_dok,s.tgl_buat');
            $this->db->from('akun_persediaan_farmasi j');
            $this->db->join('detail_struk d', 'j.no_faktur = d.id_struk');
            $this->db->join('struk_logistik s', 'j.no_faktur = s.no_faktur');
            $this->db->join('list_logistik l', 'd.id_logistik = l.id_logistik');
            $this->db->join('produsen v', 'j.vendor = v.nama_produsen');
            $this->db->join('list_coa co', 'l.golongan_sediaan = co.nama');
            $this->db->join('detail_po po', ' d.id_detail_po=po.id_detail');
            $this->db->where('j.verifikasi', 1);
            $this->db->where('s.ket', 0);
            $this->db->where('j.status', 0);
            $this->db->where('j.tipe_akun', $tipe);
            if ($first_date != '' || $second_date != '') {
                $this->db->where("(DATE(j.tgl_verifikasi) BETWEEN '$first_date' and '$second_date')");
            } else {
                $this->db->like('j.tgl_verifikasi', $tgl);
            }
            $this->db->group_by('j.no_faktur');
            $this->db->order_by('index_dok');
        } else {
            $this->db->select('s.*, sum(s.kredit) total');
            $this->db->from('jurnal_pembayaran_farmasi s');
            $this->db->where('s.verifikasi_hutang', 1);
            $this->db->where('s.ket_jurnal', 0);
            $this->db->where('s.status', 'DITERIMA');

            if ($first_date != '' || $second_date != '') {
                $this->db->where("DATE(s.tgl_verif_hutang) BETWEEN '$first_date' and '$second_date'");
            } else {
                $this->db->like('s.tgl_verif_hutang', $tgl);
            }
            $this->db->group_by('s.no_jurnal');
        }

        return $this->db->get()->result();
    }

    public function SetJurnalFarmasi($id_akun, $tipe)
    {
        $tgl = date("Y-m-d");

        if ($tipe == "persediaan") {
            $this->db->select('j.*');
            $this->db->from('akun_persediaan_farmasi j');
            $this->db->join('detail_struk d', 'j.no_faktur = d.id_struk');
            $this->db->join('struk_logistik s', 'j.no_faktur = s.no_faktur');
            $this->db->join('list_logistik l', 'd.id_logistik = l.id_logistik');
            $this->db->join('produsen v', 'j.vendor = v.nama_produsen');
            $this->db->join('list_coa co', 'l.golongan_sediaan = co.nama');
            $this->db->join('detail_po po', ' d.id_detail_po=po.id_detail');
            $this->db->where('j.verifikasi', 1);
            $this->db->where('j.status', 0);
            $this->db->where('s.ket', 0);
            $this->db->where('j.tipe_akun', $tipe);
            $this->db->where('j.kode_check', $id_akun);
            $this->db->group_by('j.no_po');
        } else {
            $this->db->select('s.*, sum(s.kredit) total');
            $this->db->from('jurnal_pembayaran_farmasi s');
            $this->db->where('s.verifikasi_hutang', 1);
            $this->db->where('s.ket_jurnal', 0);
            $this->db->where('s.kode_check', $id_akun);

            $this->db->group_by('s.pk');
        }

        return $this->db->get()->result();
    }
    public function SelectJurnalFarmasiByNopo($id_akun, $tipe, $no_po)
    {
        $tgl = date("Y-m-d");
        if ($tipe == "persediaan") {
            $this->db->select('j.*,co.coa,co.desk,v.kode id_produsen,l.golongan_sediaan,sum(((d.harga - d.harga * (d.diskon_rs / 100))*d.frek)) total,d.ppn,d.id_struk');
            $this->db->from('akun_persediaan_farmasi j, detail_struk d, list_logistik l,produsen v,list_coa co,detail_po po');
            $this->db->where('j.no_faktur = d.id_struk');
            $this->db->where('d.id_logistik = l.id_logistik');
            $this->db->where('j.vendor = v.nama_produsen');
            $this->db->where('l.golongan_sediaan = co.nama');
            $this->db->where(' d.id_detail_po=po.id_detail');
            $this->db->where('j.verifikasi = 1');
            $this->db->where('j.status = 0');
            $this->db->where('j.tipe_akun', $tipe);
            $this->db->where('j.no_po', $no_po);
            $this->db->where('j.kode_check', $id_akun);

            $this->db->group_by('j.no_faktur,co.coa');
        } else {
            $this->db->select('s.*, (s.kredit) total');
            $this->db->from('jurnal_pembayaran_farmasi s');
            $this->db->where('s.verifikasi_hutang', 1);
            $this->db->where('s.ket_jurnal', 0);
            $this->db->where('s.kode_check', $id_akun);
        }
        return $this->db->get()->result();
    }
    public function SelectJurnalFarmasiVerifikasi($mulai, $akhir, $tipe)
    {
        $tgl = date('Y-m-d');
        $this->db->select("j.*");
        $this->db->from("jurnal_pembayaran_farmasi j");
        $this->db->where("j.jenis_jurnal", $tipe);
        // $this->db->where("j.status !=", 'BATAL');
        if ($mulai != '' && $akhir != '') {
            $this->db->where("DATE(j.tgl) BETWEEN '$mulai' and '$akhir'");
        } else {
            $this->db->like("j.tgl", $tgl);
        }
        // $this->db->group_by('j.no_jurnal');
        return $this->db->get()->result();
    }
    public function selectJurnalPembayaranFarmasi($tipe)
    {
        return $this->db->query("SELECT sum(debet) total, id_fk, no_jurnal,pk,id_vendor,no_po 
        FROM jurnal_farmasi where status=0 and jenis_jurnal = '$tipe'  group by no_jurnal
        ")->result();
    }
    public function SelectLaporanJurnalFarmasi($first_date, $second_date, $tipe)
    {
        $tgl = date("Y-m-d");

        $this->db->select('tgl,no_jurnal,sum(kredit) total, staff,jk,pk,des_rek,id_fk');
        $this->db->from('jurnal_pembayaran_farmasi');
        $this->db->where('jenis_jurnal', $tipe);
        $this->db->where('status', "DITERIMA");

        if ($first_date != '' || $second_date != '') {
            $this->db->where("(DATE(tgl) BETWEEN '$first_date' and '$second_date')");
        } else {
            $this->db->like('tgl', $tgl);
        }
        $this->db->group_by('no_jurnal');
        return $this->db->get()->result();
    }
    public function getJurnalFarmasi($no_po, $no_jurnal, $tipe)
    {
        if ($tipe == "persediaan") {
            return $this->db->query("SELECT * FROM (
             SELECT tgl, lap,pk,jb,cj,rekening,deskripsi, debet, kredit,no_jurnal,id_vendor,'1' as urut 
            FROM jurnal_farmasi
            where jenis_jurnal = '$tipe' and no_po = '$no_po' and no_jurnal = '$no_jurnal'
            -- group by rekening
            union all
            SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,sum(debet) debet, sum(kredit) kredit,no_jurnal,id_vendor,'2' as urut
            FROM jurnal_pembayaran_farmasi 
            where jenis_jurnal = '$tipe' and pk = '$no_po' and no_jurnal = '$no_jurnal'
            group by rekening
           
            ) as gabung
           
            order by urut
            ")->result_array();
        } else {
            return $this->db->query("SELECT * FROM (
                SELECT tgl, lap,pk,jb,cj,rekening,deskripsi, debet, kredit,no_jurnal,id_vendor,'1' as urut 
               FROM jurnal_farmasi
               where jenis_jurnal = '$tipe' and pk = '$no_po' and no_jurnal = '$no_jurnal'
               -- group by rekening
               union all
               SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,sum(debet) debet, sum(kredit) kredit,no_jurnal,id_vendor,'2' as urut
               FROM jurnal_pembayaran_farmasi 
               where jenis_jurnal = '$tipe' and pk = '$no_po' and no_jurnal = '$no_jurnal'
               group by rekening
              
               ) as gabung
              
               order by urut
               ")->result_array();
        }
    }
    public function SelectBuktiKas($first_date, $second_date)
    {
        $tgl = date("Y-m-d");

        $this->db->select('b.tgl,b.no_dokumen,d.vendor,b.staff,d.status_direktur,d.status_verifikasi,b.save,sum(d.debet) total,sum(d.kredit) kredit,d.tipe');
        $this->db->from('bukti_kas b');
        $this->db->join('detail_hutang_bukti_kas d', 'd.no_dokumen = b.no_dokumen and b.tipe = d.tipe and d.save !=0', 'left');
        $this->db->where_not_in('b.save', 0);
        if ($first_date != '' || $second_date != '') {
            $this->db->where("(DATE(b.tgl) BETWEEN '$first_date' and '$second_date')");
        } else {
            $this->db->like('b.tgl', $tgl);
        }
        $this->db->group_by('d.no_dokumen,d.tipe');
        $this->db->order_by('b.indeks asc');
        return $this->db->get()->result();
    }
    public function SelectBuktiKas1($first_date, $second_date)
    {
        $data_staff = $this->session->userdata('data_auth');

        $tgl = date("Y-m-d");

        $this->db->select('tgl,no_dokumen,vendor,staff,status_direktur,status_verifikasi,pembayaran,sum(debet) total,sum(kredit) kredit,tipe');
        $this->db->from('detail_hutang_bukti_kas');
        if ($data_staff->tipe == "direktur") {
            $this->db->where('save', 2);
        } else {
            $this->db->where('status_direktur', 'DISETUJUI');
        }
        if ($first_date != '' || $second_date != '') {
            $this->db->where("(DATE(tgl) BETWEEN '$first_date' and '$second_date')");
        } else {
            $this->db->like('tgl', $tgl);
        }
        $this->db->group_by('no_dokumen');
        return $this->db->get()->result();
    }
    public function getBuktiKas($no_dokumen)
    {
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT d.*,j.ket_jurnal
        from detail_hutang_bukti_kas d
        left join jurnal_pembayaran_farmasi j on j.id_jurnal = d.id_jurnal
        where d.no_dokumen =  '$no_dokumen' and d.akun != ''");

        // $this->db->group_by('no_dokumen');
        return $query->result();
    }
    public function getAgingUtang($id_vendor)
    {
        $data_staff = $this->session->userdata('data_auth');
        $tgl = date("Y-m-d");

        $this->db->query("SELECT DATEDIFF('$tgl',j.tgl ) hari, sum(j.kredit) kredit,IFNULL(sum(d.total),0) total
        from jurnal_pembayaran_farmasi j
        left join (SELECT sum(debet) total, id_jurnal 
                 from detail_hutang_bukti_kas 
                 where save = 2
                 group by id_jurnal
                 ) d on j.id_jurnal= d.id_jurnal
        where j.jenis_jurnal = 'hutang' and j.status='DITERIMA'
        and j.id_vendor = '$id_vendor'
        group by hari
        having (kredit-total) != 0
        ")->result();
    }
    public function update($first_date, $second_date)
    {
        $this->db->select('j.*,s.index_dok,s.tgl_buat');
        $this->db->from('akun_persediaan_farmasi j,jurnal_pembayaran_farmasi p, struk_logistik s');
        $this->db->where('j.no_faktur = s.no_faktur');
        $this->db->where('j.no_jurnal = p.no_jurnal');

        $this->db->where("DATE(s.tgl_buat) BETWEEN '$first_date' and '$second_date'");

        return $this->db->get()->result();
    }

    public function SelectRekapLogFar($mulai, $akhir, $tipe)
    {
        if ($tipe == 'hutang') {
            return $this->db->query(" SELECT jk,rekening,deskripsi,no_jurnal, kredit, debet, lap ,cj, jb, pk, des_rek,date(tgl) tgl,staff ,id_vendor ,'' as kelompok_pelanggan
            FROM (
                    SELECT jk,des_rek,staff,tgl, lap,pk,jb,cj,rekening,deskripsi, debet, kredit,no_jurnal,id_vendor,'1' as urut 
                   FROM jurnal_farmasi
                   where jenis_jurnal = 'hutang' and tgl >= '$mulai' and tgl <='$akhir' and no_jurnal in (SELECT no_jurnal from jurnal_pembayaran_farmasi where status='DITERIMA')
                   -- group by rekening
                   union all
                   SELECT * FROM (SELECT jk,des_rek,staff,tgl, lap,pk,jb,cj,rekening,deskripsi,sum(debet) debet, sum(kredit) kredit,no_jurnal,id_vendor,'2' as urut
                   FROM jurnal_pembayaran_farmasi 
                   where jenis_jurnal = 'hutang' and tgl >= '$mulai' and tgl <='$akhir' and status='DITERIMA'
                   group by no_jurnal,rekening
                   ) as pembayaran2
                    order by no_jurnal,urut
    
            ) as gabung2")->result();
        } else if ($tipe == 'persediaan') {
            return $this->db->query(" SELECT jk,rekening,deskripsi,no_jurnal, kredit, debet, lap ,cj, jb, pk, des_rek,date(tgl) tgl,staff,id_vendor,'' as kelompok_pelanggan
            FROM (
                 SELECT jk,staff,tgl, lap,pk,jb,cj,rekening,deskripsi,des_rek, debet, kredit,no_jurnal,id_vendor,'1' as urut
                FROM jurnal_farmasi
                where jenis_jurnal = 'persediaan' and tgl >= '$mulai' and tgl <='$akhir' and no_jurnal in (SELECT no_jurnal from jurnal_pembayaran_farmasi where status='DITERIMA')
                
                union all
                SELECT * FROM (SELECT jk,staff ,tgl, lap,pk,jb,cj,rekening,deskripsi,des_rek,sum(debet) debet, sum(kredit) kredit,no_jurnal,id_vendor,'2' as urut
                FROM jurnal_pembayaran_farmasi 
                where jenis_jurnal = 'persediaan' and tgl >= '$mulai' and tgl <='$akhir' and status='DITERIMA'
                group by no_jurnal,rekening
                ) as pembayaran1
                order by no_jurnal, urut
               
            ) as gabung1")->result();
        } else if ($tipe == 'kas_bank_utang') {
            return $this->db->query(" SELECT * from(
                select d.jk, d.rekening,d.deskripsi, d.no_jurnal, d.kredit, d.debet, d.lap, d.cj, d.jb, d.pk, d.des_rek,(j.tgl_verifikasi) tgl, d.staff,'' as id_vendor,'' as kelompok_pelanggan, d.id_jurnal,d.pk_bukti
                from detail_jurnal_kas_bank d, jurnal_kas_bank j, detail_hutang_bukti_kas k
                where d.no_jurnal = j.no_jurnal and d.no_jurnal=k.no_jurnal and k.tipe='UTANG' 
                and DATE(j.tgl_verifikasi) >= '$mulai' and date(j.tgl_verifikasi) <='$akhir' and j.verifikasi='DITERIMA'
                group by d.id_detail
                order by no_jurnal
                ) as f")->result();
        }
    }
    public function get_IJD_by_dokter($dokter)
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT v.id_pelayanan,b.id_pasien no_rm,v.nama,v.tgl,v.tipe_pasien,sum(v.jumlah) total,IFNULL(d.piutang,0) piutang
        from akun_jasa_dokter v
        join dokter d on v.dokter = d.id_dokter
        join pelayanan b on v.id_pelayanan = b.id_pelayanan
        left join (SELECT sum(debet) piutang, id_pelayanan 
                 from detail_pembayaran_utang 
                 where save != 99
                 group by id_pelayanan
                 ) d on v.id_pelayanan= d.id_pelayanan
        where d.nama = '$dokter' and v.status = 1 and v.status_pembayaran is null
        group by v.id_pelayanan
        having (total-piutang) != 0
        order by tgl_masuk desc
        ")->result();

       
    }
     public function select_pembayaran_IJD($mulai,$akhir){
        return $this->db->query("SELECT d.tgl,d.no_dokumen,d.vendor,d.staff,d.status_direktur,d.status_verifikasi,d.save,sum(d.debet) total,sum(d.kredit) kredit,d.tipe
        from detail_hutang_bukti_kas d, akun_jasa_dokter a 
        where d.id_jurnal = a.id_pelayanan and a.no_jurnal = d.pk
        and (d.tgl between '$mulai' and '$akhir')
        group by d.no_dokumen
        ")->result();
     }
}
=======
<?php

class M_Keuangan_ijd extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function Select_ijd($dokter, $jenis, $first_date, $second_date, $status)
    {

        $this->db->select('j.*');
        $this->db->from('akun_jasa_dokter j, akun_tindakan a,dokter d');
        $this->db->where('j.id_pelayanan = a.id_pelayanan');
        $this->db->where('j.dokter = d.id_dokter');
        $this->db->where('a.status = 1');
        $this->db->where('d.nama', $dokter);
        $this->db->where('j.jenis_rawat', $jenis);
        $this->db->where('j.verifikasi', $status);
        $this->db->where("(DATE(j.tgl) BETWEEN '$first_date' and '$second_date')");
        $this->db->group_by('j.id_akun');

        return $this->db->get()->result();
    }

    ////////////////Jurnal IJD\\\\\\\\\\\\\\\\\\\

    public function getAkunlIJD($first_date, $second_date, $dokter)
    {

        $this->db->select('j.*');
        $this->db->from('akun_jasa_dokter j, dokter d');
        $this->db->where('j.dokter = d.id_dokter');
        $this->db->where('j.verifikasi = 1');
        $this->db->where('j.dokter', $dokter);

        $this->db->where("(DATE(j.tgl) BETWEEN '$first_date' and '$second_date')");

        return $this->db->get()->result();
    }
    public function SelectJurnalIJD($first_date, $second_date, $dokter)
    {
        $tgl = date("Y-m-d");

        $this->db->select('j.id_pelayanan,j.nama,j.tgl,j.tipe_pasien,sum(j.jumlah) jumlah');
        $this->db->from('akun_jasa_dokter j, dokter d');
        $this->db->where('j.dokter = d.id_dokter');
        $this->db->where('j.verifikasi = 1');
        $this->db->where('j.status = 0');
        $this->db->where('d.nama', $dokter);
        if ($first_date != '' || $second_date != '') {
            $this->db->where("j.tgl BETWEEN '$first_date' and '$second_date'");
        } else {
            $this->db->like("j.tgl", $tgl);
        }
        $this->db->group_by('j.id_pelayanan');

        return $this->db->get()->result();
    }
    public function SelectPembayaran_IJD($id_pel,$dokter)
    {
        $tgl = date("Y-m-d");

        $this->db->select('j.id_pelayanan,j.nama,j.tgl,j.tipe_pasien,sum(j.jumlah) jumlah,j.no_jurnal');
        $this->db->from('akun_jasa_dokter j, dokter d');
        $this->db->where('j.dokter = d.id_dokter');
        $this->db->where('j.verifikasi = 1');
        $this->db->where('j.status_pembayaran',null);
        $this->db->where('j.id_pelayanan', $id_pel);
        $this->db->where('d.nama', $dokter);
       
        $this->db->group_by('j.id_pelayanan,d.nama');

        return $this->db->get()->row();
    }
    public function setJurnalIJD($id_pel)
    {
        $tgl = date("Y-m-d");

        $this->db->select('j.*');
        $this->db->from('akun_jasa_dokter j');
        $this->db->where('j.verifikasi = 1');
        $this->db->where('j.status = 0');
        $this->db->where('j.id_pelayanan', $id_pel);
        
        return $this->db->get()->result();
    }
   
    public function selectJurnalBebanIJD($noDokR)
    {
        return $this->db->query("SELECT sum(debet) total, id_fk, no_jurnal,pk FROM jurnal_ijd where no_jurnal = '$noDokR'  group by no_jurnal")->row();
    }

    public function SelectLaporanIjd($first_date, $second_date)
    {
        $tgl = date("Y-m-d");

        $this->db->select('tgl,no_jurnal,sum(kredit) total, staff,jk,pk,id_fk');
        $this->db->from('jurnal_ijd');
        if ($first_date != '' || $second_date != '') {
            $this->db->where("(DATE(tgl) BETWEEN '$first_date' and '$second_date')");
        } else {
            $this->db->like('tgl', $tgl);
        }
        $this->db->group_by('id_fk');
        return $this->db->get()->result();
    }
    public function getJurnalIJD($id_fk)
    {
        return $this->db->query("SELECT * FROM (
            SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,debet, kredit,no_jurnal, id_fk
            FROM jurnal_ijd 
            union ALL
            SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,debet, kredit,no_jurnal, id_fk 
            FROM jurnal_hutang_ijd
            ) as gabung
            where id_fk = '$id_fk'
            ")->result_array();
    }

    /////////////////////VERIFIKASI JURNAL FARMASI/////////////////////////////////////////////////////////////////////////
    public function Select_akun_persediaan_farmasi($first_date, $second_date, $tipe)
    {
        $tgl = date("Y-m-d");
        if ($tipe == "persediaan") {
            $this->db->select('j.*,s.index_dok,s.tgl_buat');
            $this->db->from('akun_persediaan_farmasi j, struk_logistik s');
            $this->db->where('j.no_faktur = s.no_faktur');
            $this->db->where('j.tgl_faktur = s.tgl_masuk');
            $this->db->where('j.verifikasi', 0);
            $this->db->where('s.ket', 0);
            $this->db->where('j.tipe_akun', $tipe);

            if ($first_date != '' || $second_date != '') {
                $this->db->where("DATE(s.tgl_buat) BETWEEN '$first_date' and '$second_date'");
            } else {
                $this->db->like('s.tgl_buat', $tgl);
            }
        } else {
            $this->db->select('s.no_jurnal,s.pk,s.tgl,s.id_jurnal, sum(s.kredit) total,s.des_rek');
            $this->db->from('jurnal_pembayaran_farmasi s');
            $this->db->where('s.verifikasi_hutang', 0);
            $this->db->where('s.status', 'DITERIMA');
            $this->db->where('s.jenis_jurnal', 'persediaan');

            if ($first_date != '' || $second_date != '') {
                $this->db->where("DATE(s.tgl) BETWEEN '$first_date' and '$second_date'");
            } else {
                $this->db->like('s.tgl', $tgl);
            }
            $this->db->group_by('s.no_jurnal');
        }

        return $this->db->get()->result();
    }
    public function Select_pelacakan($first_date, $second_date)
    {
        $tgl = date("Y-m-d");

        $this->db->select('j.*,s.index_dok,s.tgl_buat,a.status status_jurnal,a.verifikasi_hutang,a.ket_jurnal jurnal_utang');
        $this->db->from('akun_persediaan_farmasi j');
        $this->db->join('struk_logistik s', ' j.no_faktur = s.no_faktur');
        $this->db->where('s.ket', 0);
        $this->db->join('jurnal_pembayaran_farmasi a', ' a.no_jurnal = j.no_jurnal and a.jenis_jurnal = "persediaan"', 'left');

        if ($first_date != '' || $second_date != '') {
            $this->db->where("DATE(s.tgl_buat) BETWEEN '$first_date' and '$second_date'");
        } else {
            $this->db->like('s.tgl_buat', $tgl);
        }

        return $this->db->get()->result();
    }
    public function getNpb_pelacakan($npb)
    {
        $dat = $this->db->query("SELECT *
        from jurnal_pembayaran_farmasi a, jurnal_farmasi b
        where a.no_jurnal =b.no_jurnal  and b.no_po like'%$npb%'
        and a.status ='DITERIMA'");
        return $dat->num_rows();
    }
    public function getBuktiKas_pelacakan($npb)
    {
        $dat = $this->db->query("SELECT *
        from jurnal_pembayaran_farmasi a, jurnal_farmasi b,jurnal_pembayaran_farmasi c
        where a.kode_check =c.id_fk and c.pk =a.pk and c.pk = b.no_po and b.no_jurnal = a.no_jurnal  and b.pk ='$npb'
        and c.ket_jurnal ='1'");
        return $dat->num_rows();
    }
    public function get_akun($id_akun)
    {
        $this->db->select('j.*');
        $this->db->from('akun_persediaan_farmasi j');
        $this->db->where('j.id_akun', $id_akun);
        return $this->db->get()->row();
    }

    //////////////////JURNAL FARMASI/////////////////////////////////////////////
    public function SelectJurnalFarmasi($first_date, $second_date, $tipe)
    {
        $tgl = date("Y-m-d");
        if ($tipe == "persediaan") {
            $this->db->select('j.*,co.coa,co.desk,v.kode id_produsen,sum(((d.harga - d.harga * (d.diskon_rs / 100))*d.frek))total,d.ppn,s.index_dok,s.tgl_buat');
            $this->db->from('akun_persediaan_farmasi j');
            $this->db->join('detail_struk d', 'j.no_faktur = d.id_struk');
            $this->db->join('struk_logistik s', 'j.no_faktur = s.no_faktur');
            $this->db->join('list_logistik l', 'd.id_logistik = l.id_logistik');
            $this->db->join('produsen v', 'j.vendor = v.nama_produsen');
            $this->db->join('list_coa co', 'l.golongan_sediaan = co.nama');
            $this->db->join('detail_po po', ' d.id_detail_po=po.id_detail');
            $this->db->where('j.verifikasi', 1);
            $this->db->where('s.ket', 0);
            $this->db->where('j.status', 0);
            $this->db->where('j.tipe_akun', $tipe);
            if ($first_date != '' || $second_date != '') {
                $this->db->where("(DATE(j.tgl_verifikasi) BETWEEN '$first_date' and '$second_date')");
            } else {
                $this->db->like('j.tgl_verifikasi', $tgl);
            }
            $this->db->group_by('j.no_faktur');
            $this->db->order_by('index_dok');
        } else {
            $this->db->select('s.*, sum(s.kredit) total');
            $this->db->from('jurnal_pembayaran_farmasi s');
            $this->db->where('s.verifikasi_hutang', 1);
            $this->db->where('s.ket_jurnal', 0);
            $this->db->where('s.status', 'DITERIMA');

            if ($first_date != '' || $second_date != '') {
                $this->db->where("DATE(s.tgl_verif_hutang) BETWEEN '$first_date' and '$second_date'");
            } else {
                $this->db->like('s.tgl_verif_hutang', $tgl);
            }
            $this->db->group_by('s.no_jurnal');
        }

        return $this->db->get()->result();
    }

    public function SetJurnalFarmasi($id_akun, $tipe)
    {
        $tgl = date("Y-m-d");

        if ($tipe == "persediaan") {
            $this->db->select('j.*');
            $this->db->from('akun_persediaan_farmasi j');
            $this->db->join('detail_struk d', 'j.no_faktur = d.id_struk');
            $this->db->join('struk_logistik s', 'j.no_faktur = s.no_faktur');
            $this->db->join('list_logistik l', 'd.id_logistik = l.id_logistik');
            $this->db->join('produsen v', 'j.vendor = v.nama_produsen');
            $this->db->join('list_coa co', 'l.golongan_sediaan = co.nama');
            $this->db->join('detail_po po', ' d.id_detail_po=po.id_detail');
            $this->db->where('j.verifikasi', 1);
            $this->db->where('j.status', 0);
            $this->db->where('s.ket', 0);
            $this->db->where('j.tipe_akun', $tipe);
            $this->db->where('j.kode_check', $id_akun);
            $this->db->group_by('j.no_po');
        } else {
            $this->db->select('s.*, sum(s.kredit) total');
            $this->db->from('jurnal_pembayaran_farmasi s');
            $this->db->where('s.verifikasi_hutang', 1);
            $this->db->where('s.ket_jurnal', 0);
            $this->db->where('s.kode_check', $id_akun);

            $this->db->group_by('s.pk');
        }

        return $this->db->get()->result();
    }
    public function SelectJurnalFarmasiByNopo($id_akun, $tipe, $no_po)
    {
        $tgl = date("Y-m-d");
        if ($tipe == "persediaan") {
            $this->db->select('j.*,co.coa,co.desk,v.kode id_produsen,l.golongan_sediaan,sum(((d.harga - d.harga * (d.diskon_rs / 100))*d.frek)) total,d.ppn,d.id_struk');
            $this->db->from('akun_persediaan_farmasi j, detail_struk d, list_logistik l,produsen v,list_coa co,detail_po po');
            $this->db->where('j.no_faktur = d.id_struk');
            $this->db->where('d.id_logistik = l.id_logistik');
            $this->db->where('j.vendor = v.nama_produsen');
            $this->db->where('l.golongan_sediaan = co.nama');
            $this->db->where(' d.id_detail_po=po.id_detail');
            $this->db->where('j.verifikasi = 1');
            $this->db->where('j.status = 0');
            $this->db->where('j.tipe_akun', $tipe);
            $this->db->where('j.no_po', $no_po);
            $this->db->where('j.kode_check', $id_akun);

            $this->db->group_by('j.no_faktur,co.coa');
        } else {
            $this->db->select('s.*, (s.kredit) total');
            $this->db->from('jurnal_pembayaran_farmasi s');
            $this->db->where('s.verifikasi_hutang', 1);
            $this->db->where('s.ket_jurnal', 0);
            $this->db->where('s.kode_check', $id_akun);
        }
        return $this->db->get()->result();
    }
    public function SelectJurnalFarmasiVerifikasi($mulai, $akhir, $tipe)
    {
        $tgl = date('Y-m-d');
        $this->db->select("j.*");
        $this->db->from("jurnal_pembayaran_farmasi j");
        $this->db->where("j.jenis_jurnal", $tipe);
        // $this->db->where("j.status !=", 'BATAL');
        if ($mulai != '' && $akhir != '') {
            $this->db->where("DATE(j.tgl) BETWEEN '$mulai' and '$akhir'");
        } else {
            $this->db->like("j.tgl", $tgl);
        }
        // $this->db->group_by('j.no_jurnal');
        return $this->db->get()->result();
    }
    public function selectJurnalPembayaranFarmasi($tipe)
    {
        return $this->db->query("SELECT sum(debet) total, id_fk, no_jurnal,pk,id_vendor,no_po 
        FROM jurnal_farmasi where status=0 and jenis_jurnal = '$tipe'  group by no_jurnal
        ")->result();
    }
    public function SelectLaporanJurnalFarmasi($first_date, $second_date, $tipe)
    {
        $tgl = date("Y-m-d");

        $this->db->select('tgl,no_jurnal,sum(kredit) total, staff,jk,pk,des_rek,id_fk');
        $this->db->from('jurnal_pembayaran_farmasi');
        $this->db->where('jenis_jurnal', $tipe);
        $this->db->where('status', "DITERIMA");

        if ($first_date != '' || $second_date != '') {
            $this->db->where("(DATE(tgl) BETWEEN '$first_date' and '$second_date')");
        } else {
            $this->db->like('tgl', $tgl);
        }
        $this->db->group_by('no_jurnal');
        return $this->db->get()->result();
    }
    public function getJurnalFarmasi($no_po, $no_jurnal, $tipe)
    {
        if ($tipe == "persediaan") {
            return $this->db->query("SELECT * FROM (
             SELECT tgl, lap,pk,jb,cj,rekening,deskripsi, debet, kredit,no_jurnal,id_vendor,'1' as urut 
            FROM jurnal_farmasi
            where jenis_jurnal = '$tipe' and no_po = '$no_po' and no_jurnal = '$no_jurnal'
            -- group by rekening
            union all
            SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,sum(debet) debet, sum(kredit) kredit,no_jurnal,id_vendor,'2' as urut
            FROM jurnal_pembayaran_farmasi 
            where jenis_jurnal = '$tipe' and pk = '$no_po' and no_jurnal = '$no_jurnal'
            group by rekening
           
            ) as gabung
           
            order by urut
            ")->result_array();
        } else {
            return $this->db->query("SELECT * FROM (
                SELECT tgl, lap,pk,jb,cj,rekening,deskripsi, debet, kredit,no_jurnal,id_vendor,'1' as urut 
               FROM jurnal_farmasi
               where jenis_jurnal = '$tipe' and pk = '$no_po' and no_jurnal = '$no_jurnal'
               -- group by rekening
               union all
               SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,sum(debet) debet, sum(kredit) kredit,no_jurnal,id_vendor,'2' as urut
               FROM jurnal_pembayaran_farmasi 
               where jenis_jurnal = '$tipe' and pk = '$no_po' and no_jurnal = '$no_jurnal'
               group by rekening
              
               ) as gabung
              
               order by urut
               ")->result_array();
        }
    }
    public function SelectBuktiKas($first_date, $second_date)
    {
        $tgl = date("Y-m-d");

        $this->db->select('b.tgl,b.no_dokumen,d.vendor,b.staff,d.status_direktur,d.status_verifikasi,b.save,sum(d.debet) total,sum(d.kredit) kredit,d.tipe');
        $this->db->from('bukti_kas b');
        $this->db->join('detail_hutang_bukti_kas d', 'd.no_dokumen = b.no_dokumen and b.tipe = d.tipe and d.save !=0', 'left');
        $this->db->where_not_in('b.save', 0);
        if ($first_date != '' || $second_date != '') {
            $this->db->where("(DATE(b.tgl) BETWEEN '$first_date' and '$second_date')");
        } else {
            $this->db->like('b.tgl', $tgl);
        }
        $this->db->group_by('d.no_dokumen,d.tipe');
        $this->db->order_by('b.indeks asc');
        return $this->db->get()->result();
    }
    public function SelectBuktiKas1($first_date, $second_date)
    {
        $data_staff = $this->session->userdata('data_auth');

        $tgl = date("Y-m-d");

        $this->db->select('tgl,no_dokumen,vendor,staff,status_direktur,status_verifikasi,pembayaran,sum(debet) total,sum(kredit) kredit,tipe');
        $this->db->from('detail_hutang_bukti_kas');
        if ($data_staff->tipe == "direktur") {
            $this->db->where('save', 2);
        } else {
            $this->db->where('status_direktur', 'DISETUJUI');
        }
        if ($first_date != '' || $second_date != '') {
            $this->db->where("(DATE(tgl) BETWEEN '$first_date' and '$second_date')");
        } else {
            $this->db->like('tgl', $tgl);
        }
        $this->db->group_by('no_dokumen');
        return $this->db->get()->result();
    }
    public function getBuktiKas($no_dokumen)
    {
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT d.*,j.ket_jurnal
        from detail_hutang_bukti_kas d
        left join jurnal_pembayaran_farmasi j on j.id_jurnal = d.id_jurnal
        where d.no_dokumen =  '$no_dokumen' and d.akun != ''");

        // $this->db->group_by('no_dokumen');
        return $query->result();
    }
    public function getAgingUtang($id_vendor)
    {
        $data_staff = $this->session->userdata('data_auth');
        $tgl = date("Y-m-d");

        $this->db->query("SELECT DATEDIFF('$tgl',j.tgl ) hari, sum(j.kredit) kredit,IFNULL(sum(d.total),0) total
        from jurnal_pembayaran_farmasi j
        left join (SELECT sum(debet) total, id_jurnal 
                 from detail_hutang_bukti_kas 
                 where save = 2
                 group by id_jurnal
                 ) d on j.id_jurnal= d.id_jurnal
        where j.jenis_jurnal = 'hutang' and j.status='DITERIMA'
        and j.id_vendor = '$id_vendor'
        group by hari
        having (kredit-total) != 0
        ")->result();
    }
    public function update($first_date, $second_date)
    {
        $this->db->select('j.*,s.index_dok,s.tgl_buat');
        $this->db->from('akun_persediaan_farmasi j,jurnal_pembayaran_farmasi p, struk_logistik s');
        $this->db->where('j.no_faktur = s.no_faktur');
        $this->db->where('j.no_jurnal = p.no_jurnal');

        $this->db->where("DATE(s.tgl_buat) BETWEEN '$first_date' and '$second_date'");

        return $this->db->get()->result();
    }

    public function SelectRekapLogFar($mulai, $akhir, $tipe)
    {
        if ($tipe == 'hutang') {
            return $this->db->query(" SELECT jk,rekening,deskripsi,no_jurnal, kredit, debet, lap ,cj, jb, pk, des_rek,date(tgl) tgl,staff ,id_vendor ,'' as kelompok_pelanggan
            FROM (
                    SELECT jk,des_rek,staff,tgl, lap,pk,jb,cj,rekening,deskripsi, debet, kredit,no_jurnal,id_vendor,'1' as urut 
                   FROM jurnal_farmasi
                   where jenis_jurnal = 'hutang' and tgl >= '$mulai' and tgl <='$akhir' and no_jurnal in (SELECT no_jurnal from jurnal_pembayaran_farmasi where status='DITERIMA')
                   -- group by rekening
                   union all
                   SELECT * FROM (SELECT jk,des_rek,staff,tgl, lap,pk,jb,cj,rekening,deskripsi,sum(debet) debet, sum(kredit) kredit,no_jurnal,id_vendor,'2' as urut
                   FROM jurnal_pembayaran_farmasi 
                   where jenis_jurnal = 'hutang' and tgl >= '$mulai' and tgl <='$akhir' and status='DITERIMA'
                   group by no_jurnal,rekening
                   ) as pembayaran2
                    order by no_jurnal,urut
    
            ) as gabung2")->result();
        } else if ($tipe == 'persediaan') {
            return $this->db->query(" SELECT jk,rekening,deskripsi,no_jurnal, kredit, debet, lap ,cj, jb, pk, des_rek,date(tgl) tgl,staff,id_vendor,'' as kelompok_pelanggan
            FROM (
                 SELECT jk,staff,tgl, lap,pk,jb,cj,rekening,deskripsi,des_rek, debet, kredit,no_jurnal,id_vendor,'1' as urut
                FROM jurnal_farmasi
                where jenis_jurnal = 'persediaan' and tgl >= '$mulai' and tgl <='$akhir' and no_jurnal in (SELECT no_jurnal from jurnal_pembayaran_farmasi where status='DITERIMA')
                
                union all
                SELECT * FROM (SELECT jk,staff ,tgl, lap,pk,jb,cj,rekening,deskripsi,des_rek,sum(debet) debet, sum(kredit) kredit,no_jurnal,id_vendor,'2' as urut
                FROM jurnal_pembayaran_farmasi 
                where jenis_jurnal = 'persediaan' and tgl >= '$mulai' and tgl <='$akhir' and status='DITERIMA'
                group by no_jurnal,rekening
                ) as pembayaran1
                order by no_jurnal, urut
               
            ) as gabung1")->result();
        } else if ($tipe == 'kas_bank_utang') {
            return $this->db->query(" SELECT * from(
                select d.jk, d.rekening,d.deskripsi, d.no_jurnal, d.kredit, d.debet, d.lap, d.cj, d.jb, d.pk, d.des_rek,(j.tgl_verifikasi) tgl, d.staff,'' as id_vendor,'' as kelompok_pelanggan, d.id_jurnal,d.pk_bukti
                from detail_jurnal_kas_bank d, jurnal_kas_bank j, detail_hutang_bukti_kas k
                where d.no_jurnal = j.no_jurnal and d.no_jurnal=k.no_jurnal and k.tipe='UTANG' 
                and DATE(j.tgl_verifikasi) >= '$mulai' and date(j.tgl_verifikasi) <='$akhir' and j.verifikasi='DITERIMA'
                group by d.id_detail
                order by no_jurnal
                ) as f")->result();
        }
    }
    public function get_IJD_by_dokter($dokter)
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT v.id_pelayanan,b.id_pasien no_rm,v.nama,v.tgl,v.tipe_pasien,sum(v.jumlah) total,IFNULL(d.piutang,0) piutang
        from akun_jasa_dokter v
        join dokter d on v.dokter = d.id_dokter
        join pelayanan b on v.id_pelayanan = b.id_pelayanan
        left join (SELECT sum(debet) piutang, id_pelayanan 
                 from detail_pembayaran_utang 
                 where save != 99
                 group by id_pelayanan
                 ) d on v.id_pelayanan= d.id_pelayanan
        where d.nama = '$dokter' and v.status = 1 and v.status_pembayaran is null
        group by v.id_pelayanan
        having (total-piutang) != 0
        order by tgl_masuk desc
        ")->result();

       
    }
     public function select_pembayaran_IJD($mulai,$akhir){
        return $this->db->query("SELECT d.tgl,d.no_dokumen,d.vendor,d.staff,d.status_direktur,d.status_verifikasi,d.save,sum(d.debet) total,sum(d.kredit) kredit,d.tipe
        from detail_hutang_bukti_kas d, akun_jasa_dokter a 
        where d.id_jurnal = a.id_pelayanan and a.no_jurnal = d.pk
        and (d.tgl between '$mulai' and '$akhir')
        group by d.no_dokumen
        ")->result();
     }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
