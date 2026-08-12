<<<<<<< HEAD
<?php

class M_Pembelian_obat extends CI_Model
{



    public function insertProdusen($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function insertFaktur($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function get_ai_tbl_id()
    {
        return $this->db->query('select generate_id_produsen1() as id from dual')->row()->id;
    }

    public function get_ai_tbl_id1()
    {
        return $this->db->query('select generate_id_struk1() as id from dual')->row()->id;
    }

    public function getAllData()
    {
        return $this->db->get('produsen')->result();
    }

    public function selectDataJoin()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('s.*, k.no_dokumen, s.ket');
        $this->db->from('struk_logistik s, faktur_logistik_farmasi k');
        $this->db->where('s.id_faktur = k.id_faktur');
        $this->db->where('s.ket !=',1);
        $this->db->like('s.tgl_buat', $tgl);
        $this->db->order_by('s.tgl_buat desc');
        return $this->db->get()->result();
    }
    //test

    public function get_nofaktur($no_faktur)
    {
        $this->db->where('no_faktur', $no_faktur);
        $this->db->where('ket !=',1);
        $query = $this->db->get('struk_logistik');
        return $query->result();
    }

    public function getDataPO()
    {
        $this->db->select('k.*,p.nama_produsen');
        $this->db->from('produsen p, faktur_logistik_farmasi k');
        return $this->db->get()->result_array();
    }

    public function getDataFaktur21($idFaktur)
    {
       
        $this->db->select('l.nama,l.harga_cost,l.diskon disc,  f.harga, f.status, f.jumlah,f.diskon,f.ppn,f.total, f.id_detail, f.status');
        $this->db->from('list_logistik l, detail_po f');
        $this->db->where('f.id_list=l.id_logistik');
        $this->db->where('f.status',0);
        $this->db->where('f.id_faktur', $idFaktur);
        $this->db->order_by('f.tgl');
        return $this->db->get()->result();
        
        // return $this->db->get()->result();
    }

    public function selectRangePo($mulai,$akhir){
        $this->db->select('s.*, k.no_dokumen');
        $this->db->from('struk_logistik s, faktur_logistik_farmasi k');
        $this->db->where('s.id_faktur = k.id_faktur');
        $this->db->where('s.tgl_buat >=',$mulai);
        $this->db->where('s.tgl_buat <=',$akhir);
        $this->db->where('s.ket !=',1);
        $this->db->like('s.tgl_buat');
        $this->db->order_by('s.tgl_buat', 'desc');
        return $this->db->get()->result();

      }
    

    public function getDataFaktur1($idFaktur)
    {
       
        $this->db->select('s.no_faktur, l.nama,fa.id_vendor,ds.ppn,ds.ongkir, ds.id_prod_obat, l.tipe, f.jumlah, ds.frek, ds.harga, ds.total, ds.diskon, ds.tgl_input, fa.no_dokumen, f.tgl, fa.tgl_faktur');
        $this->db->from(' faktur_logistik_farmasi fa');
        $this->db->join('struk_logistik s',' fa.id_faktur=s.id_faktur');
        $this->db->join('detail_po f',' fa.id_faktur=f.id_faktur');
        $this->db->join('detail_struk ds ' , 'f.id_detail=ds.id_detail');
        $this->db->join('list_logistik l ', 'ds.id_logistik=l.id_logistik');
        $this->db->where('f.status',1);
        $this->db->where('fa.id_faktur', $idFaktur);
        $this->db->group_by('f.id_detail');
        $this->db->order_by('f.tgl desc');
        return $this->db->get()->result_array();
    }

    public function getDataFaktur123($idFaktur)
    {
        $this->db->distinct();
        $this->db->select('s.no_dp, s.no_faktur,f.tgl,,fa.id_vendor, fa.tgl_faktur, l.nama, ds.id_prod_obat, l.tipe, f.jumlah, ds.frek, ds.harga, ds.total, ds.diskon, ds.tgl_input, fa.no_dokumen');
        $this->db->from(' faktur_logistik_farmasi fa');
        $this->db->join('struk_logistik s',' fa.id_faktur=s.id_faktur');
        $this->db->join('detail_po f',' fa.id_faktur=f.id_faktur');
        $this->db->join('detail_struk ds ' , 'f.id_detail=ds.id_detail');
        $this->db->join('list_logistik l ', 'ds.id_logistik=l.id_logistik');
        $this->db->where('f.status',1);
        $this->db->where('fa.id_faktur', $idFaktur);
        $this->db->group_by('fa.id_faktur');
        $this->db->order_by('f.tgl desc');
        return $this->db->get()->result_array();
    }

    public function selectNoDp()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('MAX(index_dok) max');
        $this->db->from('faktur_logistik_farmasi');
        $this->db->like('tgl_input', $tgl);
        return $this->db->get()->result();
    }

    public function selectNoDokumen()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m");
        $this->db->select('MAX(index_dok) max');
        $this->db->from('struk_logistik');
        $this->db->like('(tgl_buat)', $tgl);
        return $this->db->get()->row();
    }


    public function getNamaObat()
    {
        $this->db->select('*');
        $this->db->from('list_logistik');
        $this->db->where('status', 'AKTIF');
        $this->db->where_not_in('id_logistik', 'setrip1');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    //

    public function getObatNama()
    {
        $this->db->select('*');
        $this->db->from('list_logistik');
        $this->db->where('status', 'AKTIF');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function select_data_list_faktur($id_detail)
    {
        $this->db->select('l.nama, l.harga_cost,l.harga_persediaan,l.diskon disc, f.harga, f.jumlah,f.diskon,f.ppn,f.total, f.id_detail, l.margin, l.produsen, l.id_logistik');
        $this->db->from('list_logistik l, detail_po f');
        $this->db->where('f.id_list=l.id_logistik');
        $this->db->where('id_detail', $id_detail);
        return $this->db->get()->result();
    }

    public function getTotalById($id_struk){
        return $this->db->query("SELECT count(total) total, ppn from detail_struk where id_struk = '$id_struk'")->row();
    }


    //
    public function insert_detail_struk($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function insert_stok_logistik($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function update_list_logistik($id, $data)
    {
        $this->db->where('id_logistik', $id);
        return $this->db->update('list_logistik', $data);
    }

    public function getDataFaktur($idFaktur)
    {
        $this->db->select('d.*,l.produsen, l.nama obat');
        $this->db->from('detail_struk d,   list_logistik l, struk_logistik s');
        $this->db->where('d.id_logistik=l.id_logistik');
        $this->db->where('s.id_struk=d.id_struk');
        $this->db->where('d.id_struk', $idFaktur);
        $this->db->order_by('d.tgl_input', 'desc');
        return $this->db->get()->result();
    }
    public function delete_list_faktur($id_detail_struk)
    {
        $this->db->delete('detail_struk', array('id_detail_struk' => $id_detail_struk));
        $this->db->delete('stok_logistik', array('id_struk' => 'F_'.$id_detail_struk));
    }
    public function upload_detail_total($data)
    {
       $this->db->insert('total_faktur_logistik_farmasi', $data);
       $this->db->insert('total_faktur_utang', $data);
    }

    public function update_ket_faktur($no_faktur, $data2)
    {
        $this->db->where('no_faktur', $no_faktur);
        return $this->db->update('struk_logistik', $data2);
    }

    public function getTotal()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('*');
        $this->db->from('total_faktur_logistik_farmasi');
        $this->db->where('ket',0);
        $this->db->like('tanggal_masuk', $tgl);
        return $this->db->get()->result();
    }

    public function getTotaltRangePo($mulai,$akhir)
    {
        $this->db->select('*');
        $this->db->from('total_faktur_logistik_farmasi');
        $this->db->where('ket',0);
        $this->db->where('tanggal_masuk >=',$mulai);
        $this->db->where('tanggal_masuk <=',$akhir);
        $this->db->like('tanggal_masuk');
        $this->db->order_by('tanggal_masuk', 'desc');
        return $this->db->get()->result();
    }

    public function update_detail_total($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function update_logistik_farmasi($where, $page_data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function getpoObat()
    {
        $this->db->select('*');
        $this->db->from('faktur_logistik_farmasi');
        $this->db->where('ket',0);
        // $this->db->where('status','DITERIMA');
        return $this->db->get()->result_array();
    }

    public function cekPO($id_faktur, $data2)
    {
        // $this->db->select('d.*, f.id_faktur');
        // $this->db->from('detail_po d, faktur_logistik_farmasi f');
        // $this->db->where('d.id_faktur', $id_faktur);
        // $this->db->where('d.id_faktur = f.id_faktur');
        // $this->db->where('d.status',0);
        
        $query = $this->db->query("SELECT d.*, f.id_faktur FROM detail_po d, faktur_logistik_farmasi f where d.id_faktur='$id_faktur' AND d.id_faktur = f.id_faktur AND d.status = '0'");

        if($query->num_rows() == 0){
            $this->db->where('id_faktur',$id_faktur);
            $this->db->update('faktur_logistik_farmasi', $data2);
        }
    }

    public function getIdFaktur($no_faktur){
        $this->db->select('id_faktur');
        $this->db->from('struk_logistik');
        $this->db->where('no_faktur',$no_faktur);
        return $this->db->get()->row_array();
    }

    public function insertObatRetur($data,$table)
    {
        $this->db->insert($table, $data);
    }

    public function getDataCetak($id_faktur, $no_faktur)
    {
        //$this->db->distinct();
        // $this->db->select('s.no_faktur, l.nama,fa.id_vendor,ds.ppn, ds.id_prod_obat, l.tipe, f.jumlah, ds.frek, ds.harga, ds.total, ds.diskon, ds.tgl_input, fa.no_dokumen, f.tgl, fa.tgl_faktur');
        // $this->db->from(' faktur_logistik_farmasi fa');
        // $this->db->join('struk_logistik s',' fa.id_faktur=s.id_faktur');
        // $this->db->join('detail_po f',' fa.id_faktur=f.id_faktur');
        // $this->db->join('detail_struk ds ' , 'f.id_detail=ds.id_detail');
        // $this->db->join('list_logistik l ', 'ds.id_logistik=l.id_logistik');
        // $this->db->where('f.status',1);
        // $this->db->where('fa.id_faktur', $id_faktur);
        // $this->db->group_by('f.id_detail');
        // $this->db->order_by('f.tgl desc');
        // return $this->db->get()->result_array();

        $this->db->select("f.no_dokumen, f.id_vendor, l.nama, ds.ppn, ds.harga, ds.harga_beli, ds.frek, (dp.jumlah * dp.diskon) pc, s.tipe, ds.diskon_rs, f.tgl_input, ds.id_prod_obat,l.satuan_terkecil satuan, dp.status,ds.suhu,l.standar, ds.sisa");
        $this->db->from('faktur_logistik_farmasi f, detail_po dp, staff s, list_logistik l, struk_logistik sl, detail_struk ds');
        $this->db->where('f.id_faktur = dp.id_faktur');
        $this->db->where('f.id_faktur = sl.id_faktur');
        $this->db->where('sl.no_faktur = ds.id_struk');
        $this->db->where('dp.id_list = l.id_logistik');
        $this->db->where('ds.id_logistik = l.id_logistik');
        $this->db->where('dp.id_staff = s.id_staff');
        $this->db->where('dp.id_detail = ds.id_detail_po');
        $this->db->where('sl.ket',0);
        $this->db->where('f.id_faktur', $id_faktur);
        $this->db->where('sl.id_struk', $no_faktur);
        $this->db->order_by('dp.tgl');
        $this->db->group_by('ds.id_detail_struk');
        return $this->db->get()->result_array();
    }

    public function insert_cetak($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_cetak($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function selectNo()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y");
        $this->db->select('MAX(no_index) max2');
        $this->db->from('cetak_dp');
        $this->db->like('tgl_input', $tgl);
        return $this->db->get()->result();
    }

    public function getTgl($id_faktur)
    {
        $this->db->select('f.tgl_faktur, dp.tgl');
        $this->db->from('faktur_logistik_farmasi f, detail_po dp');
        $this->db->where('f.id_faktur = dp.id_faktur');
        $this->db->where('f.id_faktur', $id_faktur);
        return $this->db->get()->result();
    }

    public function getTotalDiskon($id_faktur, $no_faktur)
    {
        $this->db->distinct();
        $this->db->select("SUM(ds.total) total, SUM(((ds.diskon_rs*ds.total)/100)) totdiskon, SUM((ds.harga*ds.frek)*(ds.diskon_rs/100)) diskontotal, SUM((ds.harga*ds.frek)) nilaidp");
        $this->db->from('faktur_logistik_farmasi f, detail_po dp, staff s, list_logistik l, struk_logistik sl, detail_struk ds, produsen v');
        $this->db->where('f.id_faktur = dp.id_faktur');
        $this->db->where('f.id_faktur = sl.id_faktur');
        $this->db->where('v.nama_produsen=f.id_vendor');
        $this->db->where('sl.no_faktur = ds.id_struk');
        $this->db->where('dp.id_list = l.id_logistik');
        $this->db->where('ds.id_logistik = l.id_logistik');
        $this->db->where('dp.id_staff = s.id_staff');
        $this->db->where('sl.ket',0);
        $this->db->where('f.id_faktur', $id_faktur);
        $this->db->where('sl.no_faktur', $no_faktur);
        return $this->db->get()->result();
    }

    // public function cekCetakDp($id_faktur)
    // {
    //     $this->db->select('*');
    //     $this->db->from('cetak_dp');
    //     $this->db->where('id_faktur', $id_faktur);
    // }

// PEMBELIAN BEBAS
    public function selectNoDokumenBebas()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m");
        $this->db->select('MAX(index_dok) max');
        $this->db->from('struk_logistik_bebas');
        $this->db->like('(tgl_buat)', $tgl);
        return $this->db->get()->row();
    }
  
    public function selectNoDokumenHibah()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m");
        $this->db->select('MAX(index_dok) max');
        $this->db->from('struk_obat_hibah');
        $this->db->like('(tgl_buat)', $tgl);
        return $this->db->get()->row();
    }
   
    public function selectDataBebas()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('*');
        $this->db->from('struk_logistik_bebas ');
        //$this->db->where('s.id_faktur = k.id_faktur');
        $this->db->where('ket !=', 1);
        $this->db->like('tgl_buat', $tgl);
        $this->db->order_by('tgl_buat desc');
        return $this->db->get()->result();
    }
    public function selectDataBebasRange($mulai,$akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('*');
        $this->db->from('struk_logistik_bebas ');
        //$this->db->where('s.id_faktur = k.id_faktur');
        $this->db->where('ket !=', 1);
        $this->db->where('tgl_buat >=', $mulai);
        $this->db->where('tgl_buat <=', $akhir);
        $this->db->order_by('tgl_buat desc');
        return $this->db->get()->result();
    }
    public function getDataFaktur1Bebas($id_struk)
    {
        
        $this->db->select('d.*,l.produsen, l.nama obat, f.id_struk');
        $this->db->from('detail_struk_bebas d, list_logistik l, struk_logistik_bebas f');
        $this->db->where('d.id_logistik=l.id_logistik');
        $this->db->where('d.id_struk', $id_struk);
        $this->db->group_by('d.id_detail_struk');
        $this->db->order_by('d.tgl_input', 'desc');
        return $this->db->get()->result();
    }
    public function get_nofaktur_bebas($no_faktur)
    {
        $this->db->where('no_faktur', $no_faktur);
        $query = $this->db->get('struk_logistik_bebas');
        return $query->result();
    }
    public function getDataFaktur21Bebas($idFaktur)
    {

        $this->db->select('l.nama,l.harga_cost,  f.harga, f.status, f.jumlah,f.diskon,f.ppn,f.total, f.id_detail, f.status');
        $this->db->from('list_logistik l, detail_po_bebas f');
        $this->db->where('f.id_list=l.id_logistik');
        $this->db->where('f.status', 0);
        $this->db->where('f.id_faktur', $idFaktur);
        $this->db->order_by('f.tgl');
        return $this->db->get()->result();

        // return $this->db->get()->result();
    }
    public function select_data_list_faktur_bebas($id_detail)
    {
        $this->db->select('l.nama, l.harga_cost,l.harga_persediaan, f.harga, f.jumlah,f.diskon,f.ppn,f.total, f.id_detail, l.margin, l.produsen, l.id_logistik');
        $this->db->from('list_logistik l, detail_po_bebas f');
        $this->db->where('f.id_list=l.id_logistik');
        $this->db->where('id_detail', $id_detail);
        return $this->db->get()->result();
    }

    public function selectRangePoBebas($mulai, $akhir)
    {
        $this->db->select('s.*, k.no_dokumen');
        $this->db->from('struk_logistik_bebas s, faktur_bebas_logistik_farmasi k');
        $this->db->where('s.id_faktur = k.id_faktur');
        $this->db->where('s.tgl_buat >=', $mulai);
        $this->db->where('s.tgl_buat <=', $akhir);
        $this->db->where('s.ket !=', 1);
        $this->db->like('s.tgl_buat');
        $this->db->order_by('s.tgl_buat', 'desc');
        return $this->db->get()->result();
    }
    public function getTglBebas($id_faktur)
    {
        $this->db->select('f.tgl_faktur, dp.tgl');
        $this->db->from('faktur_bebas_logistik_farmasi f, detail_po_bebas dp');
        $this->db->where('f.id_faktur = dp.id_faktur');
        $this->db->where('f.id_faktur', $id_faktur);
        return $this->db->get()->result();
    }
    public function getDataCetakBebas($id_faktur)
    {
        $this->db->select("sl.no_faktur, sl.id_produsen, l.nama, ds.ppn, ds.harga, ds.harga_beli, ds.frek, s.tipe, ds.diskon_rs, sl.tgl_buat, ds.id_prod_obat,l.satuan_terkecil satuan, ds.total");
        $this->db->from(' staff s, list_logistik l, struk_logistik_bebas sl, detail_struk_bebas ds');
        
        $this->db->where('sl.id_struk = ds.id_struk');
        $this->db->where('ds.id_logistik = l.id_logistik');
        $this->db->where('sl.ket', 0);
        $this->db->where('sl.id_struk', $id_faktur);
        // $this->db->where('sl.no_faktur', $no_faktur);
        $this->db->group_by('ds.id_detail_struk');
        return $this->db->get()->result_array();
    }
    public function getDataCetakHibah($id_faktur)
    {
        $this->db->select("sl.no_faktur, sl.id_produsen, l.nama, ds.ppn, ds.harga, ds.harga_beli, ds.frek, s.tipe, ds.diskon_rs, sl.tgl_buat, ds.id_prod_obat,l.satuan_terkecil satuan, ds.total");
        $this->db->from(' staff s, list_logistik l, struk_obat_hibah sl, detail_struk_obat_hibah ds');
        
        $this->db->where('sl.id_struk = ds.id_struk');
        $this->db->where('ds.id_logistik = l.id_logistik');
        $this->db->where('sl.ket', 0);
        $this->db->where('sl.id_struk', $id_faktur);
        // $this->db->where('sl.no_faktur', $no_faktur);
        $this->db->group_by('ds.id_detail_struk');
        return $this->db->get()->result_array();
    }
    public function getTotalDiskonBebas($id_faktur, $no_faktur)
    {
        $this->db->distinct();
        $this->db->select("SUM(ds.total) total, SUM(((ds.diskon_rs*ds.total)/100)) totdiskon, SUM((ds.harga*ds.frek)*(ds.diskon_rs/100)) diskontotal, SUM((ds.harga*ds.frek)) nilaidp");
        $this->db->from('faktur_bebas_logistik_farmasi f, detail_po_bebas dp, staff s, list_logistik l, struk_logistik_bebas sl, detail_struk_bebas ds, produsen v');
        $this->db->where('f.id_faktur = dp.id_faktur');
        $this->db->where('f.id_faktur = sl.id_faktur');
        $this->db->where('v.nama_produsen=f.id_vendor');
        $this->db->where('sl.no_faktur = ds.id_struk');
        $this->db->where('dp.id_list = l.id_logistik');
        $this->db->where('ds.id_logistik = l.id_logistik');
        $this->db->where('dp.id_staff = s.id_staff');
        $this->db->where('sl.ket', 0);
        $this->db->where('f.id_faktur', $id_faktur);
        $this->db->where('sl.no_faktur', $no_faktur);
        return $this->db->get()->result();
    }
    public function delete_tindakan($id,$table,$where)
    {
        $this->db->delete($table, array($where => $id));
    }
    // OBAT HIBAH
    public function selectDataObatHibah()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('*');
        $this->db->from('struk_obat_hibah ');
        //$this->db->where('s.id_faktur = k.id_faktur');
        $this->db->where('ket !=', 1);
        $this->db->like('tgl_buat', $tgl);
        $this->db->order_by('tgl_buat desc');
        return $this->db->get()->result();
    }
    public function selectRangeDataObatHibah($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('*');
        $this->db->from('struk_obat_hibah ');
        //$this->db->where('s.id_faktur = k.id_faktur');
        $this->db->where('ket !=', 1);
        $this->db->where("tgl_buat BETWEEN '$mulai' AND '$akhir'");
        // $this->db->like('tgl_buat', $tgl);
        $this->db->order_by('tgl_buat desc');
        return $this->db->get()->result();
    }
    public function get_nofaktur_hibah($no_faktur)
    {
        $this->db->where('no_faktur', $no_faktur);
        $query = $this->db->get('struk_obat_hibah');
        return $query->result();
    }
    public function getDataFaktur1Hibah($id_struk)
    {
        
        $this->db->select('d.*,l.produsen, l.nama obat, f.id_struk');
        $this->db->from('detail_struk_obat_hibah d, list_logistik l, struk_obat_hibah f');
        $this->db->where('d.id_logistik=l.id_logistik');
        $this->db->where('d.id_struk', $id_struk);
        $this->db->group_by('d.no_batch');
        $this->db->order_by('d.tgl_input', 'desc');
        return $this->db->get()->result();
    }

}
=======
<?php

class M_Pembelian_obat extends CI_Model
{



    public function insertProdusen($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function insertFaktur($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function get_ai_tbl_id()
    {
        return $this->db->query('select generate_id_produsen1() as id from dual')->row()->id;
    }

    public function get_ai_tbl_id1()
    {
        return $this->db->query('select generate_id_struk1() as id from dual')->row()->id;
    }

    public function getAllData()
    {
        return $this->db->get('produsen')->result();
    }

    public function selectDataJoin()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('s.*, k.no_dokumen, s.ket');
        $this->db->from('struk_logistik s, faktur_logistik_farmasi k');
        $this->db->where('s.id_faktur = k.id_faktur');
        $this->db->where('s.ket !=',1);
        $this->db->like('s.tgl_buat', $tgl);
        $this->db->order_by('s.tgl_buat desc');
        return $this->db->get()->result();
    }
    //test

    public function get_nofaktur($no_faktur)
    {
        $this->db->where('no_faktur', $no_faktur);
        $this->db->where('ket !=',1);
        $query = $this->db->get('struk_logistik');
        return $query->result();
    }

    public function getDataPO()
    {
        $this->db->select('k.*,p.nama_produsen');
        $this->db->from('produsen p, faktur_logistik_farmasi k');
        return $this->db->get()->result_array();
    }

    public function getDataFaktur21($idFaktur)
    {
       
        $this->db->select('l.nama,l.harga_cost,l.diskon disc,  f.harga, f.status, f.jumlah,f.diskon,f.ppn,f.total, f.id_detail, f.status');
        $this->db->from('list_logistik l, detail_po f');
        $this->db->where('f.id_list=l.id_logistik');
        $this->db->where('f.status',0);
        $this->db->where('f.id_faktur', $idFaktur);
        $this->db->order_by('f.tgl');
        return $this->db->get()->result();
        
        // return $this->db->get()->result();
    }

    public function selectRangePo($mulai,$akhir){
        $this->db->select('s.*, k.no_dokumen');
        $this->db->from('struk_logistik s, faktur_logistik_farmasi k');
        $this->db->where('s.id_faktur = k.id_faktur');
        $this->db->where('s.tgl_buat >=',$mulai);
        $this->db->where('s.tgl_buat <=',$akhir);
        $this->db->where('s.ket !=',1);
        $this->db->like('s.tgl_buat');
        $this->db->order_by('s.tgl_buat', 'desc');
        return $this->db->get()->result();

      }
    

    public function getDataFaktur1($idFaktur)
    {
       
        $this->db->select('s.no_faktur, l.nama,fa.id_vendor,ds.ppn,ds.ongkir, ds.id_prod_obat, l.tipe, f.jumlah, ds.frek, ds.harga, ds.total, ds.diskon, ds.tgl_input, fa.no_dokumen, f.tgl, fa.tgl_faktur');
        $this->db->from(' faktur_logistik_farmasi fa');
        $this->db->join('struk_logistik s',' fa.id_faktur=s.id_faktur');
        $this->db->join('detail_po f',' fa.id_faktur=f.id_faktur');
        $this->db->join('detail_struk ds ' , 'f.id_detail=ds.id_detail');
        $this->db->join('list_logistik l ', 'ds.id_logistik=l.id_logistik');
        $this->db->where('f.status',1);
        $this->db->where('fa.id_faktur', $idFaktur);
        $this->db->group_by('f.id_detail');
        $this->db->order_by('f.tgl desc');
        return $this->db->get()->result_array();
    }

    public function getDataFaktur123($idFaktur)
    {
        $this->db->distinct();
        $this->db->select('s.no_dp, s.no_faktur,f.tgl,,fa.id_vendor, fa.tgl_faktur, l.nama, ds.id_prod_obat, l.tipe, f.jumlah, ds.frek, ds.harga, ds.total, ds.diskon, ds.tgl_input, fa.no_dokumen');
        $this->db->from(' faktur_logistik_farmasi fa');
        $this->db->join('struk_logistik s',' fa.id_faktur=s.id_faktur');
        $this->db->join('detail_po f',' fa.id_faktur=f.id_faktur');
        $this->db->join('detail_struk ds ' , 'f.id_detail=ds.id_detail');
        $this->db->join('list_logistik l ', 'ds.id_logistik=l.id_logistik');
        $this->db->where('f.status',1);
        $this->db->where('fa.id_faktur', $idFaktur);
        $this->db->group_by('fa.id_faktur');
        $this->db->order_by('f.tgl desc');
        return $this->db->get()->result_array();
    }

    public function selectNoDp()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('MAX(index_dok) max');
        $this->db->from('faktur_logistik_farmasi');
        $this->db->like('tgl_input', $tgl);
        return $this->db->get()->result();
    }

    public function selectNoDokumen()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m");
        $this->db->select('MAX(index_dok) max');
        $this->db->from('struk_logistik');
        $this->db->like('(tgl_buat)', $tgl);
        return $this->db->get()->row();
    }


    public function getNamaObat()
    {
        $this->db->select('*');
        $this->db->from('list_logistik');
        $this->db->where('status', 'AKTIF');
        $this->db->where_not_in('id_logistik', 'setrip1');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    //

    public function getObatNama()
    {
        $this->db->select('*');
        $this->db->from('list_logistik');
        $this->db->where('status', 'AKTIF');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function select_data_list_faktur($id_detail)
    {
        $this->db->select('l.nama, l.harga_cost,l.harga_persediaan,l.diskon disc, f.harga, f.jumlah,f.diskon,f.ppn,f.total, f.id_detail, l.margin, l.produsen, l.id_logistik');
        $this->db->from('list_logistik l, detail_po f');
        $this->db->where('f.id_list=l.id_logistik');
        $this->db->where('id_detail', $id_detail);
        return $this->db->get()->result();
    }

    public function getTotalById($id_struk){
        return $this->db->query("SELECT count(total) total, ppn from detail_struk where id_struk = '$id_struk'")->row();
    }


    //
    public function insert_detail_struk($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function insert_stok_logistik($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function update_list_logistik($id, $data)
    {
        $this->db->where('id_logistik', $id);
        return $this->db->update('list_logistik', $data);
    }

    public function getDataFaktur($idFaktur)
    {
        $this->db->select('d.*,l.produsen, l.nama obat');
        $this->db->from('detail_struk d,   list_logistik l, struk_logistik s');
        $this->db->where('d.id_logistik=l.id_logistik');
        $this->db->where('s.id_struk=d.id_struk');
        $this->db->where('d.id_struk', $idFaktur);
        $this->db->order_by('d.tgl_input', 'desc');
        return $this->db->get()->result();
    }
    public function delete_list_faktur($id_detail_struk)
    {
        $this->db->delete('detail_struk', array('id_detail_struk' => $id_detail_struk));
        $this->db->delete('stok_logistik', array('id_struk' => 'F_'.$id_detail_struk));
    }
    public function upload_detail_total($data)
    {
       $this->db->insert('total_faktur_logistik_farmasi', $data);
       $this->db->insert('total_faktur_utang', $data);
    }

    public function update_ket_faktur($no_faktur, $data2)
    {
        $this->db->where('no_faktur', $no_faktur);
        return $this->db->update('struk_logistik', $data2);
    }

    public function getTotal()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('*');
        $this->db->from('total_faktur_logistik_farmasi');
        $this->db->where('ket',0);
        $this->db->like('tanggal_masuk', $tgl);
        return $this->db->get()->result();
    }

    public function getTotaltRangePo($mulai,$akhir)
    {
        $this->db->select('*');
        $this->db->from('total_faktur_logistik_farmasi');
        $this->db->where('ket',0);
        $this->db->where('tanggal_masuk >=',$mulai);
        $this->db->where('tanggal_masuk <=',$akhir);
        $this->db->like('tanggal_masuk');
        $this->db->order_by('tanggal_masuk', 'desc');
        return $this->db->get()->result();
    }

    public function update_detail_total($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function update_logistik_farmasi($where, $page_data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function getpoObat()
    {
        $this->db->select('*');
        $this->db->from('faktur_logistik_farmasi');
        $this->db->where('ket',0);
        // $this->db->where('status','DITERIMA');
        return $this->db->get()->result_array();
    }

    public function cekPO($id_faktur, $data2)
    {
        // $this->db->select('d.*, f.id_faktur');
        // $this->db->from('detail_po d, faktur_logistik_farmasi f');
        // $this->db->where('d.id_faktur', $id_faktur);
        // $this->db->where('d.id_faktur = f.id_faktur');
        // $this->db->where('d.status',0);
        
        $query = $this->db->query("SELECT d.*, f.id_faktur FROM detail_po d, faktur_logistik_farmasi f where d.id_faktur='$id_faktur' AND d.id_faktur = f.id_faktur AND d.status = '0'");

        if($query->num_rows() == 0){
            $this->db->where('id_faktur',$id_faktur);
            $this->db->update('faktur_logistik_farmasi', $data2);
        }
    }

    public function getIdFaktur($no_faktur){
        $this->db->select('id_faktur');
        $this->db->from('struk_logistik');
        $this->db->where('no_faktur',$no_faktur);
        return $this->db->get()->row_array();
    }

    public function insertObatRetur($data,$table)
    {
        $this->db->insert($table, $data);
    }

    public function getDataCetak($id_faktur, $no_faktur)
    {
        //$this->db->distinct();
        // $this->db->select('s.no_faktur, l.nama,fa.id_vendor,ds.ppn, ds.id_prod_obat, l.tipe, f.jumlah, ds.frek, ds.harga, ds.total, ds.diskon, ds.tgl_input, fa.no_dokumen, f.tgl, fa.tgl_faktur');
        // $this->db->from(' faktur_logistik_farmasi fa');
        // $this->db->join('struk_logistik s',' fa.id_faktur=s.id_faktur');
        // $this->db->join('detail_po f',' fa.id_faktur=f.id_faktur');
        // $this->db->join('detail_struk ds ' , 'f.id_detail=ds.id_detail');
        // $this->db->join('list_logistik l ', 'ds.id_logistik=l.id_logistik');
        // $this->db->where('f.status',1);
        // $this->db->where('fa.id_faktur', $id_faktur);
        // $this->db->group_by('f.id_detail');
        // $this->db->order_by('f.tgl desc');
        // return $this->db->get()->result_array();

        $this->db->select("f.no_dokumen, f.id_vendor, l.nama, ds.ppn, ds.harga, ds.harga_beli, ds.frek, (dp.jumlah * dp.diskon) pc, s.tipe, ds.diskon_rs, f.tgl_input, ds.id_prod_obat,l.satuan_terkecil satuan, dp.status,ds.suhu,l.standar, ds.sisa");
        $this->db->from('faktur_logistik_farmasi f, detail_po dp, staff s, list_logistik l, struk_logistik sl, detail_struk ds');
        $this->db->where('f.id_faktur = dp.id_faktur');
        $this->db->where('f.id_faktur = sl.id_faktur');
        $this->db->where('sl.no_faktur = ds.id_struk');
        $this->db->where('dp.id_list = l.id_logistik');
        $this->db->where('ds.id_logistik = l.id_logistik');
        $this->db->where('dp.id_staff = s.id_staff');
        $this->db->where('dp.id_detail = ds.id_detail_po');
        $this->db->where('sl.ket',0);
        $this->db->where('f.id_faktur', $id_faktur);
        $this->db->where('sl.id_struk', $no_faktur);
        $this->db->order_by('dp.tgl');
        $this->db->group_by('ds.id_detail_struk');
        return $this->db->get()->result_array();
    }

    public function insert_cetak($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_cetak($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function selectNo()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y");
        $this->db->select('MAX(no_index) max2');
        $this->db->from('cetak_dp');
        $this->db->like('tgl_input', $tgl);
        return $this->db->get()->result();
    }

    public function getTgl($id_faktur)
    {
        $this->db->select('f.tgl_faktur, dp.tgl');
        $this->db->from('faktur_logistik_farmasi f, detail_po dp');
        $this->db->where('f.id_faktur = dp.id_faktur');
        $this->db->where('f.id_faktur', $id_faktur);
        return $this->db->get()->result();
    }

    public function getTotalDiskon($id_faktur, $no_faktur)
    {
        $this->db->distinct();
        $this->db->select("SUM(ds.total) total, SUM(((ds.diskon_rs*ds.total)/100)) totdiskon, SUM((ds.harga*ds.frek)*(ds.diskon_rs/100)) diskontotal, SUM((ds.harga*ds.frek)) nilaidp");
        $this->db->from('faktur_logistik_farmasi f, detail_po dp, staff s, list_logistik l, struk_logistik sl, detail_struk ds, produsen v');
        $this->db->where('f.id_faktur = dp.id_faktur');
        $this->db->where('f.id_faktur = sl.id_faktur');
        $this->db->where('v.nama_produsen=f.id_vendor');
        $this->db->where('sl.no_faktur = ds.id_struk');
        $this->db->where('dp.id_list = l.id_logistik');
        $this->db->where('ds.id_logistik = l.id_logistik');
        $this->db->where('dp.id_staff = s.id_staff');
        $this->db->where('sl.ket',0);
        $this->db->where('f.id_faktur', $id_faktur);
        $this->db->where('sl.no_faktur', $no_faktur);
        return $this->db->get()->result();
    }

    // public function cekCetakDp($id_faktur)
    // {
    //     $this->db->select('*');
    //     $this->db->from('cetak_dp');
    //     $this->db->where('id_faktur', $id_faktur);
    // }

// PEMBELIAN BEBAS
    public function selectNoDokumenBebas()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m");
        $this->db->select('MAX(index_dok) max');
        $this->db->from('struk_logistik_bebas');
        $this->db->like('(tgl_buat)', $tgl);
        return $this->db->get()->row();
    }
  
    public function selectNoDokumenHibah()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m");
        $this->db->select('MAX(index_dok) max');
        $this->db->from('struk_obat_hibah');
        $this->db->like('(tgl_buat)', $tgl);
        return $this->db->get()->row();
    }
   
    public function selectDataBebas()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('*');
        $this->db->from('struk_logistik_bebas ');
        //$this->db->where('s.id_faktur = k.id_faktur');
        $this->db->where('ket !=', 1);
        $this->db->like('tgl_buat', $tgl);
        $this->db->order_by('tgl_buat desc');
        return $this->db->get()->result();
    }
    public function selectDataBebasRange($mulai,$akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('*');
        $this->db->from('struk_logistik_bebas ');
        //$this->db->where('s.id_faktur = k.id_faktur');
        $this->db->where('ket !=', 1);
        $this->db->where('tgl_buat >=', $mulai);
        $this->db->where('tgl_buat <=', $akhir);
        $this->db->order_by('tgl_buat desc');
        return $this->db->get()->result();
    }
    public function getDataFaktur1Bebas($id_struk)
    {
        
        $this->db->select('d.*,l.produsen, l.nama obat, f.id_struk');
        $this->db->from('detail_struk_bebas d, list_logistik l, struk_logistik_bebas f');
        $this->db->where('d.id_logistik=l.id_logistik');
        $this->db->where('d.id_struk', $id_struk);
        $this->db->group_by('d.id_detail_struk');
        $this->db->order_by('d.tgl_input', 'desc');
        return $this->db->get()->result();
    }
    public function get_nofaktur_bebas($no_faktur)
    {
        $this->db->where('no_faktur', $no_faktur);
        $query = $this->db->get('struk_logistik_bebas');
        return $query->result();
    }
    public function getDataFaktur21Bebas($idFaktur)
    {

        $this->db->select('l.nama,l.harga_cost,  f.harga, f.status, f.jumlah,f.diskon,f.ppn,f.total, f.id_detail, f.status');
        $this->db->from('list_logistik l, detail_po_bebas f');
        $this->db->where('f.id_list=l.id_logistik');
        $this->db->where('f.status', 0);
        $this->db->where('f.id_faktur', $idFaktur);
        $this->db->order_by('f.tgl');
        return $this->db->get()->result();

        // return $this->db->get()->result();
    }
    public function select_data_list_faktur_bebas($id_detail)
    {
        $this->db->select('l.nama, l.harga_cost,l.harga_persediaan, f.harga, f.jumlah,f.diskon,f.ppn,f.total, f.id_detail, l.margin, l.produsen, l.id_logistik');
        $this->db->from('list_logistik l, detail_po_bebas f');
        $this->db->where('f.id_list=l.id_logistik');
        $this->db->where('id_detail', $id_detail);
        return $this->db->get()->result();
    }

    public function selectRangePoBebas($mulai, $akhir)
    {
        $this->db->select('s.*, k.no_dokumen');
        $this->db->from('struk_logistik_bebas s, faktur_bebas_logistik_farmasi k');
        $this->db->where('s.id_faktur = k.id_faktur');
        $this->db->where('s.tgl_buat >=', $mulai);
        $this->db->where('s.tgl_buat <=', $akhir);
        $this->db->where('s.ket !=', 1);
        $this->db->like('s.tgl_buat');
        $this->db->order_by('s.tgl_buat', 'desc');
        return $this->db->get()->result();
    }
    public function getTglBebas($id_faktur)
    {
        $this->db->select('f.tgl_faktur, dp.tgl');
        $this->db->from('faktur_bebas_logistik_farmasi f, detail_po_bebas dp');
        $this->db->where('f.id_faktur = dp.id_faktur');
        $this->db->where('f.id_faktur', $id_faktur);
        return $this->db->get()->result();
    }
    public function getDataCetakBebas($id_faktur)
    {
        $this->db->select("sl.no_faktur, sl.id_produsen, l.nama, ds.ppn, ds.harga, ds.harga_beli, ds.frek, s.tipe, ds.diskon_rs, sl.tgl_buat, ds.id_prod_obat,l.satuan_terkecil satuan, ds.total");
        $this->db->from(' staff s, list_logistik l, struk_logistik_bebas sl, detail_struk_bebas ds');
        
        $this->db->where('sl.id_struk = ds.id_struk');
        $this->db->where('ds.id_logistik = l.id_logistik');
        $this->db->where('sl.ket', 0);
        $this->db->where('sl.id_struk', $id_faktur);
        // $this->db->where('sl.no_faktur', $no_faktur);
        $this->db->group_by('ds.id_detail_struk');
        return $this->db->get()->result_array();
    }
    public function getDataCetakHibah($id_faktur)
    {
        $this->db->select("sl.no_faktur, sl.id_produsen, l.nama, ds.ppn, ds.harga, ds.harga_beli, ds.frek, s.tipe, ds.diskon_rs, sl.tgl_buat, ds.id_prod_obat,l.satuan_terkecil satuan, ds.total");
        $this->db->from(' staff s, list_logistik l, struk_obat_hibah sl, detail_struk_obat_hibah ds');
        
        $this->db->where('sl.id_struk = ds.id_struk');
        $this->db->where('ds.id_logistik = l.id_logistik');
        $this->db->where('sl.ket', 0);
        $this->db->where('sl.id_struk', $id_faktur);
        // $this->db->where('sl.no_faktur', $no_faktur);
        $this->db->group_by('ds.id_detail_struk');
        return $this->db->get()->result_array();
    }
    public function getTotalDiskonBebas($id_faktur, $no_faktur)
    {
        $this->db->distinct();
        $this->db->select("SUM(ds.total) total, SUM(((ds.diskon_rs*ds.total)/100)) totdiskon, SUM((ds.harga*ds.frek)*(ds.diskon_rs/100)) diskontotal, SUM((ds.harga*ds.frek)) nilaidp");
        $this->db->from('faktur_bebas_logistik_farmasi f, detail_po_bebas dp, staff s, list_logistik l, struk_logistik_bebas sl, detail_struk_bebas ds, produsen v');
        $this->db->where('f.id_faktur = dp.id_faktur');
        $this->db->where('f.id_faktur = sl.id_faktur');
        $this->db->where('v.nama_produsen=f.id_vendor');
        $this->db->where('sl.no_faktur = ds.id_struk');
        $this->db->where('dp.id_list = l.id_logistik');
        $this->db->where('ds.id_logistik = l.id_logistik');
        $this->db->where('dp.id_staff = s.id_staff');
        $this->db->where('sl.ket', 0);
        $this->db->where('f.id_faktur', $id_faktur);
        $this->db->where('sl.no_faktur', $no_faktur);
        return $this->db->get()->result();
    }
    public function delete_tindakan($id,$table,$where)
    {
        $this->db->delete($table, array($where => $id));
    }
    // OBAT HIBAH
    public function selectDataObatHibah()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('*');
        $this->db->from('struk_obat_hibah ');
        //$this->db->where('s.id_faktur = k.id_faktur');
        $this->db->where('ket !=', 1);
        $this->db->like('tgl_buat', $tgl);
        $this->db->order_by('tgl_buat desc');
        return $this->db->get()->result();
    }
    public function selectRangeDataObatHibah($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('*');
        $this->db->from('struk_obat_hibah ');
        //$this->db->where('s.id_faktur = k.id_faktur');
        $this->db->where('ket !=', 1);
        $this->db->where("tgl_buat BETWEEN '$mulai' AND '$akhir'");
        // $this->db->like('tgl_buat', $tgl);
        $this->db->order_by('tgl_buat desc');
        return $this->db->get()->result();
    }
    public function get_nofaktur_hibah($no_faktur)
    {
        $this->db->where('no_faktur', $no_faktur);
        $query = $this->db->get('struk_obat_hibah');
        return $query->result();
    }
    public function getDataFaktur1Hibah($id_struk)
    {
        
        $this->db->select('d.*,l.produsen, l.nama obat, f.id_struk');
        $this->db->from('detail_struk_obat_hibah d, list_logistik l, struk_obat_hibah f');
        $this->db->where('d.id_logistik=l.id_logistik');
        $this->db->where('d.id_struk', $id_struk);
        $this->db->group_by('d.no_batch');
        $this->db->order_by('d.tgl_input', 'desc');
        return $this->db->get()->result();
    }

}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
