<<<<<<< HEAD
<?php

class M_Jurnal_onuse extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function Select_penyusutan()
    {
        return $this->db->query("SELECT p.*,k.nama ket_kondisi, j.jenis,j.masa,j.coa_debit 
        FROM list_asset p , list_kondisi_asset k, list_jenis_asset j
        where p.kondisi = k.kode and p.jenis_asset = j.id
        and p.status ='AKTIF'
        order by p.tgl desc
        ")->result();
    }
    // public function Select_penyusutan_perjenis()
    // {
    //     return $this->db->query("SELECT j.jenis, sum(r.harga_penyusutan) total,sum(r.akumulasi) akumulasi, sum(r.nilai_buku) nilai_buku
    //     FROM list_asset p , list_kondisi_asset k, list_jenis_asset j,rekap_asset r
    //     where p.kondisi = k.kode and p.jenis_asset = j.id and r.id = p.id
    //     p.jenis_asset = 
    //     ")->result();
    // }
    public function SelectJurnalPenyusutan()
    {
        return $this->db->query("SELECT j.coa_debit,j.coa_kredit,sum(r.harga_penyusutan) total,j.jenis ,sum(r.akumulasi) akumulasi, sum(r.nilai_buku) nilai_buku
        FROM list_asset p , list_kondisi_asset k, list_jenis_asset j,rekap_asset r
        where p.kondisi = k.kode and p.jenis_asset = j.id and r.id = p.id
        and r.nilai_buku !=0  and p.status ='AKTIF'
        group by p.jenis_asset
        ")->result();
    }
    public function selectJurnalAkumulasiPenyusutan($id_fk)
    {
        return $this->db->query("SELECT sum(debet) total, id_fk, no_jurnal,pk FROM jurnal_penyusutan where status=0 and id_fk = '$id_fk'")->row();
    }
    public function SelectLaporanJurnalPenyusutan()
    {
        $year = date('Y');
        $this->db->select('tgl,no_jurnal,sum(debet) total, staff,jk,pk,id_fk');
        $this->db->from('jurnal_penyusutan');
        // if ($first_date != '' || $second_date != '') {
        //     $this->db->where('tgl >=', $first_date);
        // $this->db->where('YEAR(tgl)', $year);
        // } else {
        //     $this->db->like('tgl', $tgl);
        // }
        $this->db->group_by('id_fk');
        return $this->db->get()->result();
    }
    public function getJurnalPenyusutan($id_fk)
    {
        return $this->db->query("SELECT * FROM (
            SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,debet, kredit,no_jurnal, id_fk
            FROM jurnal_penyusutan 
            union ALL
            SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,debet, kredit,no_jurnal, id_fk 
            FROM jurnal_akumulasi_penyusutan
            ) as gabung
            where id_fk = '$id_fk'
            ")->result_array();
    }
  
    ///////////////////////////////Laporan summary//////////////////////////////////////
  
    public function SelectRangeLaporanMaterial($first_date, $second_date)
    {
        return $this->db->query("SELECT tgl,no_jurnal,sum(kredit) total, staff,jk,pk from jurnal_material_persediaan where tgl >= '$first_date' and tgl<='$second_date' and status ='DITERIMA'  group by no_jurnal")->result();
    }
    public function getMaterial($no_jurnal)
    {
        return $this->db->query("SELECT * FROM (
            SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,debet, kredit,no_jurnal, id_jurnal id_fk
            FROM jurnal_material 
            union ALL
            SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,debet, kredit,no_jurnal, id_fk 
            FROM jurnal_material_persediaan
            group by no_jurnal,rekening
            ) as gabung
            where no_jurnal = '$no_jurnal'
            ")->result_array();
    }
}
=======
<?php

class M_Jurnal_onuse extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function Select_penyusutan()
    {
        return $this->db->query("SELECT p.*,k.nama ket_kondisi, j.jenis,j.masa,j.coa_debit 
        FROM list_asset p , list_kondisi_asset k, list_jenis_asset j
        where p.kondisi = k.kode and p.jenis_asset = j.id
        and p.status ='AKTIF'
        order by p.tgl desc
        ")->result();
    }
    // public function Select_penyusutan_perjenis()
    // {
    //     return $this->db->query("SELECT j.jenis, sum(r.harga_penyusutan) total,sum(r.akumulasi) akumulasi, sum(r.nilai_buku) nilai_buku
    //     FROM list_asset p , list_kondisi_asset k, list_jenis_asset j,rekap_asset r
    //     where p.kondisi = k.kode and p.jenis_asset = j.id and r.id = p.id
    //     p.jenis_asset = 
    //     ")->result();
    // }
    public function SelectJurnalPenyusutan()
    {
        return $this->db->query("SELECT j.coa_debit,j.coa_kredit,sum(r.harga_penyusutan) total,j.jenis ,sum(r.akumulasi) akumulasi, sum(r.nilai_buku) nilai_buku
        FROM list_asset p , list_kondisi_asset k, list_jenis_asset j,rekap_asset r
        where p.kondisi = k.kode and p.jenis_asset = j.id and r.id = p.id
        and r.nilai_buku !=0  and p.status ='AKTIF'
        group by p.jenis_asset
        ")->result();
    }
    public function selectJurnalAkumulasiPenyusutan($id_fk)
    {
        return $this->db->query("SELECT sum(debet) total, id_fk, no_jurnal,pk FROM jurnal_penyusutan where status=0 and id_fk = '$id_fk'")->row();
    }
    public function SelectLaporanJurnalPenyusutan()
    {
        $year = date('Y');
        $this->db->select('tgl,no_jurnal,sum(debet) total, staff,jk,pk,id_fk');
        $this->db->from('jurnal_penyusutan');
        // if ($first_date != '' || $second_date != '') {
        //     $this->db->where('tgl >=', $first_date);
        // $this->db->where('YEAR(tgl)', $year);
        // } else {
        //     $this->db->like('tgl', $tgl);
        // }
        $this->db->group_by('id_fk');
        return $this->db->get()->result();
    }
    public function getJurnalPenyusutan($id_fk)
    {
        return $this->db->query("SELECT * FROM (
            SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,debet, kredit,no_jurnal, id_fk
            FROM jurnal_penyusutan 
            union ALL
            SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,debet, kredit,no_jurnal, id_fk 
            FROM jurnal_akumulasi_penyusutan
            ) as gabung
            where id_fk = '$id_fk'
            ")->result_array();
    }
  
    ///////////////////////////////Laporan summary//////////////////////////////////////
  
    public function SelectRangeLaporanMaterial($first_date, $second_date)
    {
        return $this->db->query("SELECT tgl,no_jurnal,sum(kredit) total, staff,jk,pk from jurnal_material_persediaan where tgl >= '$first_date' and tgl<='$second_date' and status ='DITERIMA'  group by no_jurnal")->result();
    }
    public function getMaterial($no_jurnal)
    {
        return $this->db->query("SELECT * FROM (
            SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,debet, kredit,no_jurnal, id_jurnal id_fk
            FROM jurnal_material 
            union ALL
            SELECT tgl, lap,pk,jb,cj,rekening,deskripsi,debet, kredit,no_jurnal, id_fk 
            FROM jurnal_material_persediaan
            group by no_jurnal,rekening
            ) as gabung
            where no_jurnal = '$no_jurnal'
            ")->result_array();
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
