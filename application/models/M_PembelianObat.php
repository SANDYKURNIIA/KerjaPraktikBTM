<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_PembelianObat extends CI_model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }

    public function selectRiwayat()
    {   
        $this->db->select('l.nama, l.harga_cost, l.golongan_obat,d.kadaluarsa, l.produsen, d.frek, l.tipe, s.tgl_struk,s.tgl_buat');
        $this->db->from('list_logistik l, detail_struk d, struk_logistik s');
        $this->db->where('l.id_logistik=d.id_logistik');
        $this->db->where('d.id_struk=s.id_struk');
        $this->db->group_by('s.tgl_buat','desc');
        return $this->db->get()->result();
    }

}
