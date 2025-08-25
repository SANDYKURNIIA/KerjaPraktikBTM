<?php

class M_Logistik_umum extends CI_Model
{

    // Laporan Mutasi
    public function selectLaporanmutasiUmum()
    {
        date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
        $this->db->select('l.nama,d.jumlah_terima frek,s1.tipe tipe, d.tgl_acc tgl, l.harga,l.satuan, l.jenis_beban');
        $this->db->from('list_logistik_umum l , request_logistik_umum r, detail_req_logistik_umum d , staff s1');
        $this->db->where('d.id_req=r.id_req');
        $this->db->where('l.id_list=d.id_list');
        $this->db->where('s1.id_staff=d.id_staff_req');
        $this->db->where('d.status','DITERIMA');
        $this->db->like('d.tgl_acc',$tgl);
        $this->db->order_by('tipe');
        return $this->db->get()->result();
    }

    public function selectRangeLaporanmutasiUmum($mulai,$akhir){
        $this->db->select('l.nama,d.jumlah_terima frek,s1.tipe tipe, d.tgl_acc tgl, l.harga,l.satuan, l.jenis_beban');
        $this->db->from('list_logistik_umum l , request_logistik_umum r, detail_req_logistik_umum d , staff s1');
        $this->db->where('d.id_req=r.id_req');
        $this->db->where('l.id_list=d.id_list');
        $this->db->where('s1.id_staff=d.id_staff_req');
        $this->db->where('d.status','DITERIMA');
        $this->db->where('d.tgl_acc >=', $mulai);
        $this->db->where('d.tgl_acc <=', $akhir);
        $this->db->order_by('tipe');
        return $this->db->get()->result();
    }
    // End

    

    // Daftar Barang
    public function selectDataMasterBarang()
    {
        $this->db->select('*');
        $this->db->from('list_logistik_umum');
        $this->db->order_by('nama');
        return $this->db->get()->result();
    }
    
    public function getSatuan(){
        $this->db->select('DISTINCT(satuan)');
		$this->db->group_by('satuan', 'ASC');
		return $this->db->get('list_logistik_umum')->result_array();
    }

    public function getTipe(){
        $this->db->select('DISTINCT(tipe)');
		$this->db->group_by('tipe', 'ASC');
		return $this->db->get('list_logistik_umum')->result_array();
    }

    public function getJenisBeban(){
        $this->db->select('DISTINCT(jenis_beban)');
		$this->db->group_by('jenis_beban', 'ASC');
		return $this->db->get('list_logistik_umum')->result_array();
    }

    public function insert_barang($data)
    {
        return $this->db->insert('list_logistik_umum', $data);
    }

    public function selectDataById($id)
    {
        $this->db->where('id_list', $id);
        return $this->db->get('list_logistik_umum')->result();
    }

    public function update_barang($id, $data)
    {
        $this->db->where('id_list', $id);
        return $this->db->update('list_logistik_umum', $data);
    }

    public function getMutasi($id){
        $this->db->select('l.nama,d.jumlah_terima frek,s1.tipe tipe, d.tgl_acc tgl ,l.harga,l.satuan, l.jenis_beban');
        $this->db->from('list_logistik_umum l , request_logistik_umum r, detail_req_logistik_umum d , staff s1');
        $this->db->where('d.id_req=r.id_req');
        $this->db->where('s1.id_staff=d.id_staff_req');
        $this->db->where('d.status','DITERIMA');
        $this->db->where('l.id_list',$id);
        $this->db->order_by('tgl_acc desc');
        return $this->db->get()->result();
    }

    public function getPembelian($id){
        $this->db->select('f.no_faktur ,d.id_list,l.nama,l.satuan, v.nama vendor, d.jumlah, d.harga,d.total, f.tgl_faktur , d.diskon, d.ppn , f.no_dokumen');
        $this->db->from('faktur_logistik_umum f , detail_faktur_logistik_umum d , list_logistik_umum l ,   vendor_logistik_umum v ');
        $this->db->where('f.id_faktur=d.id_faktur');
        $this->db->where('d.id_list=l.id_list');
        $this->db->where('f.id_vendor=v.id_vendor');
        $this->db->where('l.id_list',$id);
        $this->db->order_by('tgl_faktur desc');
        return $this->db->get()->result();
    }
    // End

    // Konfirmasi Permintaan 
    public function selectRequest()
    {
        $this->db->select(' r.*, s.nama staff');
        $this->db->from('request_logistik_umum r, staff s');
        $this->db->where('s.id_staff=r.id_staff_req');
        $this->db->where('r.unit', 'sungairaya');
        $this->db->order_by('nama');
        return $this->db->get()->result();
    }
    // End

    // Admin Permintaan
    public function selectDataPermintaan()
    {
        $this->db->select('*');
        $this->db->from('admin_logistik_umum');
        $this->db->order_by('unit ASC');
        return $this->db->get()->result();
    }
    public function update_buka($where,$page_data,$table){
        $this->db->where($where);
        $this->db->update($table,$page_data);
    }
    public function update_tutup($where,$page_data,$table){
        $this->db->where($where);
        $this->db->update($table,$page_data);
    }
    // End

    // Daftar Vendor 
    public function selectDataVendor()
    {
        $this->db->select('*');
        $this->db->from('vendor_logistik_umum');
        $this->db->where('status', 'AKTIF');
        $this->db->order_by('nama');
        return $this->db->get()->result();
    }

    public function insert_vendor($data)
    {
        return $this->db->insert('vendor_logistik_umum', $data);
    }

    public function selectDataVendorById($id)
    {
        $this->db->where('id_vendor', $id);
        return $this->db->get('vendor_logistik_umum')->result();
    }

    public function update_vendor($id, $data)
    {
        $this->db->where('id_vendor', $id);
        return $this->db->update('vendor_logistik_umum', $data);
    }

    public function delete_vendor($id)
    {
        $this->db->delete('vendor_logistik_umum', array('id_vendor' => $id));
    }
}
