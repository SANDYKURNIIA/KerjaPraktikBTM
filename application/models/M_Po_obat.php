<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Po_obat extends CI_model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }


    public function getAllData()
    {
        return $this->db->get('faktur_logistik_farmasi')->result_array();
    }

    public function selectData()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->distinct();
        $this->db->select('r.*, p.no_dokumen no_perencanaan');
        $this->db->from('faktur_logistik_farmasi r, faktur_perencanaan_logfar p');
        $this->db->where('r.id_pr_obat=p.id_faktur');
        $this->db->where('r.ket !=', 2);
        $this->db->like('r.tgl_input', $tgl);
        $this->db->order_by('r.tgl_input desc');
        return $this->db->get()->result();
    }

    public function getDataPo($idFaktur)
    {


        $this->db->select('no_dokumen, tgl_faktur, id_vendor,keterangan');
        $this->db->from('faktur_logistik_farmasi ');
        $this->db->where('id_faktur', $idFaktur);
        return $this->db->get()->result_array();
    }

    public function getDataPo2($idFaktur)
    {

        // $this->db->distinct();
        $this->db->select('f.no_dokumen, f.tgl_faktur,f.id_vendor,l.nama item ,l.produsen, l.satuan_terbesar tipe, d.jumlah, d.harga, d.diskon,d.total, d.disc');
        $this->db->from('detail_po d, faktur_logistik_farmasi f , list_logistik l');
        $this->db->where('d.id_faktur= f.id_faktur');
        $this->db->where('l.id_logistik=d.id_list');
        $this->db->where('f.id_faktur', $idFaktur);
        $this->db->order_by('l.nama');
        //$this->db->where('d.status',0);
        return $this->db->get()->result_array();
    }

    //range 

    public function selectRangePo($mulai, $akhir)
    {
        $this->db->distinct();
        $this->db->select('r.*, p.no_dokumen no_perencanaan');
        $this->db->from('faktur_logistik_farmasi r, faktur_perencanaan_logfar p');
        $this->db->where('r.id_pr_obat=p.id_faktur');
        $this->db->where('r.ket !=', 2);
        $this->db->where('r.tgl_input >=', $mulai);
        $this->db->where('r.tgl_input <=', $akhir);
        $this->db->order_by('r.tgl_input');
        return $this->db->get()->result();
    }

    //end range

    public function getDataFaktur($idFaktur)
    {
        $this->db->select('l.nama, f.harga, f.status, f.jumlah,f.diskon,f.ppn,f.total, f.id_detail, f.status, l.produsen');
        $this->db->from('list_logistik l, detail_po f');
        $this->db->where('f.id_list=l.id_logistik');
        $this->db->where('f.id_faktur', $idFaktur);
        return $this->db->get()->result();
    }



    public function getNamaObat()
    {
        $this->db->select('*');
        $this->db->from('list_logistik');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }

    public function getNoFaktur($idFaktur)
    {
        $this->db->select('no_dokumen');
        $this->db->from('faktur_logistik_farmasi');
        $this->db->where('id_faktur', $idFaktur);
        return $this->db->get()->result();
    }

    //hapus

    public function delete_po($id_detail)
    {
        $this->db->delete('detail_po', array('id_detail' => $id_detail));
        //$this->db->delete('list_logistik', array('id_list' => 'F_'.$id_detail));
    }

    public function delete_isi_po($id_detail, $id_faktur, $id_detail_struk, $data, $data2)
    {

        $this->db->where('id_detail', $id_detail);
        $this->db->update('detail_po', $data);

        $this->db->where('id_faktur', $id_faktur);
        $this->db->update('faktur_logistik_farmasi', $data2);

        $this->db->delete('stok_logistik', array('id_struk' => 'F_' . $id_detail_struk));
        $this->db->delete('detail_struk', array('id_detail_struk' => $id_detail_struk));
        //$this->db->delete('list_logistik', array('id_list' => 'F_'.$id_detail));
    }

    //

    public function HitungPO($idFaktur)
    {
        $this->db->select('sum(total) total');
        $this->db->from('detail_po');
        // $this->db->where('status', 0);
        $this->db->where('id_faktur', $idFaktur);
        //$this->db->group_by('d.id_faktur');

        return $this->db->get()->result();
    }

    //hapus 

    public function delete_faktur($id_faktur)
    {
        $db = $this->db->query("SELECT d.* from struk_logistik s, detail_struk d where s.no_faktur = d.id_struk and s.id_faktur ='$id_faktur'")->result();
        $this->db->delete('akun_persediaan_farmasi', array('no_faktur' => $db[0]->id_struk, 'verifikasi' => 0));

        foreach ($db as $row) {

            $this->db->delete('stok_logistik', array('id_struk' => 'F_' . $row->id_detail_struk));
            $this->db->delete('detail_struk', array('id_detail_struk' => $row->id_detail_struk));
        }
        $this->db->delete('struk_logistik', array('id_faktur' => $id_faktur));
    }
    public function delete_faktur_po($id_faktur)
    {
        $this->db->where('id_faktur', $id_faktur);
        $this->db->update('faktur_logistik_farmasi', array('ket' => 2));
    }

    //end hapus





    public function getSatuanObat()
    {
        $this->db->select('*');
        $this->db->from('satuan_obat');
        $this->db->order_by('satuan', 'ASC');
        return $this->db->get()->result_array();
    }

    public function selectNoDokumen()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m");
        $this->db->select('MAX(index_dok) max');
        $this->db->from('faktur_logistik_farmasi');
        $this->db->like('tgl_input', $tgl);
        return $this->db->get()->result();
    }

    /*public function getMax()
    {
        $this->db->select_max('index_dok');
        $this->db->from('faktur_logistik_farmasi');
        return $this->db->get()->row_array();
    }*/

    public function insertFaktur($data, $table)
    {
        $this->db->insert($table, $data);
    }

    //

    public function insertDetail($data, $table)
    {
        $this->db->insert($table, $data);
    }

    //

    public function select_data_list_faktur($id_detail)
    {
        $this->db->select('l.nama, f.harga, f.jumlah,f.diskon,f.ppn,f.total, f.id_detail, l.margin, l.produsen, l.id_logistik');
        $this->db->from('list_logistik l, detail_po f');
        $this->db->where('f.id_list=l.id_logistik');
        $this->db->where('id_detail', $id_detail);
        return $this->db->get()->result();
    }
    public function get_ai_tbl_id1()
    {
        return $this->db->query('select generate_id_struk1() as id from dual')->row()->id;
    }
    public function insert_detail_struk($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function insert_stok_logistik($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function update_list_logistik($id, $data_list)
    {
        $this->db->where('id_logistik', $id);
        return $this->db->update('list_logistik', $data_list);
    }

    public function update_po($id_faktur, $id_detail, $data_po)
    {
        $this->db->where('id_faktur', $id_faktur);
        $this->db->where('id_detail', $id_detail);
        return $this->db->update('detail_po', $data_po);
    }

    public function update_pembelian($id_detail, $data)
    {
        $this->db->where('id_detail', $id_detail);
        return $this->db->update('detail_po', $data);
    }

    public function get_nofaktur($no_faktur)
    {
        $this->db->where('no_faktur', $no_faktur);
        $query = $this->db->get('detail_struk');
        return $query->result();
    }

    public function getDataFaktur1($id_faktur, $id_struk)
    {
        // $this->db->distinct();
        $this->db->select('d.*,l.produsen, l.nama obat, f.id_faktur, dp.id_detail');
        $this->db->from('detail_struk d, list_logistik l, detail_po dp, faktur_logistik_farmasi f');
        $this->db->where('d.id_logistik=l.id_logistik');
        $this->db->where('d.id_logistik=dp.id_list');
        $this->db->where('d.id_detail_po=dp.id_detail');
        $this->db->where('f.id_faktur = dp.id_faktur');
        $this->db->where('d.id_struk', $id_struk);
        $this->db->where('dp.id_faktur ', $id_faktur);
        // $this->db->where('dp.status', '1');
        $this->db->group_by('d.id_detail_struk');
        $this->db->order_by('d.tgl_input', 'desc');
        return $this->db->get()->result();
    }
    public function getTotalStruk($id_faktur, $id_struk)
    {
        // $this->db->distinct();
        $this->db->select('SUM(d.total) total');
        $this->db->from('detail_struk d, list_logistik l, detail_po dp, faktur_logistik_farmasi f');
        $this->db->where('d.id_logistik=l.id_logistik');
        $this->db->where('d.id_logistik=dp.id_list');
        $this->db->where('d.id_detail_po=dp.id_detail');
        $this->db->where('f.id_faktur = dp.id_faktur');
        $this->db->where('d.id_struk', $id_struk);
        $this->db->where('dp.id_faktur ', $id_faktur);
        return $this->db->get()->result();
    }


    //DISTRIBUTOR OBAT

    public function get_ai_tbl_id()
    {
        return $this->db->query('select generate_id_produsen1() as id from dual')->row()->id;
    }

    public function insertDistributor($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function selectDistributor()
    {
        $this->db->select('*');
        $this->db->from('produsen');
        return $this->db->get()->result();
    }

    public function selectDataDistributorById($id)
    {
        $this->db->where('id_produsen', $id);
        return $this->db->get('produsen')->result();
    }

    public function update_distributor($id, $data)
    {
        $this->db->where('id_produsen', $id);
        return $this->db->update('produsen', $data);
    }

    public function delete_distributor($id_produsen)
    {
        $this->db->delete('produsen', array('id_produsen' => $id_produsen));
    }


    //END DISTRIBUTOR OBAT

    //PRODUSEN OBAT

    public function insertProdusenObat($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function get_ai_tbl_id2()
    {
        return $this->db->query('select generate_id_pro_obat() as id from dual')->row()->id;
    }

    public function selectProdusen()
    {
        $this->db->select('*');
        $this->db->from('prod_obat');
        return $this->db->get()->result();
    }

    public function selectDataProdusenById($id)
    {
        $this->db->where('id_pro_obat', $id);
        return $this->db->get('prod_obat')->result();
    }

    public function update_produsen($id, $data)
    {
        $this->db->where('id_pro_obat', $id);
        return $this->db->update('prod_obat', $data);
    }

    public function delete_produsen($id_pro_obat)
    {
        $this->db->delete('prod_obat', array('id_pro_obat' => $id_pro_obat));
    }


    //END PRODUSEN OBAT

    //OBAT
    public function selectObat()
    {
        $this->db->select('*');
        $this->db->from('list_logistik');
        return $this->db->get()->result();
    }

    public function insertObat($data, $table)
    {
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }

    public function selectDataObatById($id)
    {
        $this->db->where('id_logistik', $id);
        return $this->db->get('list_logistik')->result();
    }

    public function update_obat($id, $data)
    {
        $this->db->where('id_logistik', $id);
        return $this->db->update('list_logistik', $data);
    }

    public function get_ai_tbl_id3()
    {
        return $this->db->query('select generate_id_logistik() as id from dual')->row()->id;
    }

    public function delete_obat($id_logistik)
    {
        $this->db->delete('list_logistik', array('id_logistik' => $id_logistik));
    }

    //END OBAT

    // PEMBELIAN BEBAS
    public function selectDataBebas()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->distinct();
        $this->db->select('r.* , v.nama_produsen');
        $this->db->from('faktur_bebas_logistik_farmasi r, produsen v');
        $this->db->where('r.id_vendor=v.nama_produsen');
        $this->db->where('ket !=', 2);
        $this->db->like('r.tgl_input', $tgl);
        $this->db->order_by('tgl_input desc');
        return $this->db->get()->result();
    }
    public function selectRangePoBebas($mulai, $akhir)
    {
        $this->db->distinct();
        $this->db->select('f.* , v.nama_produsen');
        $this->db->from('faktur_logistik_farmasi f, produsen v');
        $this->db->where('f.id_vendor=v.nama_produsen');
        $this->db->where('f.tgl_input >=', $mulai);
        $this->db->where('f.tgl_input <=', $akhir);
        $this->db->where('ket !=', 2);
        $this->db->order_by('f.tgl_input');
        return $this->db->get()->result();
    }
    public function getDataFakturBebas($idFaktur)
    {
        $this->db->select('l.nama, f.harga, f.status, f.jumlah,f.diskon,f.ppn,f.total, f.id_detail, f.status');
        $this->db->from('list_logistik l, detail_po_bebas f');
        $this->db->where('f.id_list=l.id_logistik');
        $this->db->where('f.id_faktur', $idFaktur);
        return $this->db->get()->result();
    }
    public function delete_faktur_po_bebas($id_faktur)
    {
        $this->db->where('id_faktur', $id_faktur);
        $this->db->update('faktur_bebas_logistik_farmasi', array('ket' => 2));
    }

    public function HitungPOBebas($idFaktur)
    {
        $this->db->select('sum(total) total');
        $this->db->from('detail_po_bebas');
        // $this->db->where('status', 0);
        $this->db->where('id_faktur', $idFaktur);
        //$this->db->group_by('d.id_faktur');

        return $this->db->get()->result();
    }
    public function update($where, $data, $table)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }
    public function getpoObat()
    {
        $this->db->select('*');
        $this->db->from('faktur_perencanaan_logfar');
        $this->db->where('status', 'DITERIMA');
        return $this->db->get()->result_array();
    }
    public function getDataFakturPR($idFaktur)
    {
        $this->db->select('f.id_list,l.*, f.harga, f.status, f.jumlah,f.total, f.id_detail, f.status,f.frek,f.diskon');
        $this->db->from('list_logistik l, detail_perencanaan_logfar f, faktur_perencanaan_logfar e');
        $this->db->where('f.id_list=l.id_logistik');
        $this->db->where('f.id_faktur=e.id_faktur');
        $this->db->where('f.status', 0);
        $this->db->where('e.id_faktur', $idFaktur);
        return $this->db->get()->result();
    }

    public function getTotalPO($id_detail)
    {
        $this->db->select("SUM(d.diskon*d.jumlah) frek, (p.jumlah*p.frek) jumlah");
        $this->db->from('detail_po d, detail_perencanaan_logfar p');
        $this->db->where('d.id_detail_pr = p.id_detail');
        $this->db->where('d.id_detail_pr', $id_detail);
        return $this->db->get()->row_array();
    }

    //  APPROVE
    public function selectDataApprove()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data_staff = $this->session->userdata('data_auth');
        $this->db->distinct();
        $this->db->select('r.*');
        $this->db->from('faktur_logistik_farmasi r');
        //$this->db->where('ket !=', 2);
        // if($data_staff->tipe == "logistik farmasi" && $data_staff->izin_akses == "admin") {
        //     $this->db->where('r.status_kains', 'DIAJUKAN');
        // }
        if ($data_staff->tipe == "direktur" && $data_staff->izin_akses == "admin") {
            // $this->db->where('r.status_kains', 'DITERIMA');
            $this->db->where('r.status_direktur', 'DIAJUKAN');
        }
        $this->db->order_by('tgl_input desc');
        return $this->db->get()->result();
    }


    // Pelacakan obat
    public function selectPelacakan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        // $this->db->distinct();
        $this->db->select('d.id_detail,f.id_faktur,f.no_dokumen, f.tgl_faktur,f.id_vendor,l.nama ,l.produsen, l.harga_cost hna, l.satuan_terkecil tipe,l.jml_satuan_terkecil,l.id_logistik, d.jumlah, d.harga, d.diskon,d.total, p.no_dokumen no_pr,p.tgl_faktur tgl_pr, u.no_dokumen no_usulan,u.tgl_faktur tgl_usulan, d.status, p.tgl_acc_kains,p.tgl_acc_direktur,p.status status_pr,l.diskon disc');
        $this->db->from('detail_po d, faktur_logistik_farmasi f , list_logistik l, faktur_perencanaan_logfar p, faktur_usulan_logfar u');
        $this->db->where('d.id_faktur= f.id_faktur');
        $this->db->where('f.id_pr_obat= p.id_faktur');
        $this->db->where('p.id_usulan= u.id_faktur');
        $this->db->where('l.id_logistik=d.id_list');
        $this->db->like('f.tgl_input', $tgl);
        $this->db->order_by('f.tgl_input desc');
        $this->db->group_by('d.id_detail');
        return $this->db->get()->result();
    }


    //range 

    public function selectRangePelacakan($mulai, $akhir)
    {
        $tgl = date("Y-m-d");
        // $this->db->distinct();
        // $this->db->select('du.id_list id_logistik,l.nama ,l.produsen, l.satuan_terkecil tipe,l.jml_satuan_terkecil, u.no_dokumen no_usulan,u.tgl_faktur tgl_usulan,u.id_faktur,du.id_detail');
        // $this->db->from('list_logistik l, faktur_usulan_logfar u, detail_usulan_logfar du');
        // $this->db->where('du.id_faktur= u.id_faktur');
        // $this->db->where('l.id_logistik=du.id_list');
        // // $this->db->where('u.tgl_faktur >=', '2022-09-28');
        // if($mulai !='' && $akhir != ''){
        //     $this->db->where('u.tgl_faktur >=', $mulai);
        //     $this->db->where('u.tgl_faktur <=', $akhir);
        // }else{
        //     $this->db->like('u.tgl_faktur ', $tgl);
        // }

        // $this->db->order_by('u.tgl_faktur desc');
        // // $this->db->group_by('du.id_detail');
        // return $this->db->get()->result();

        $this->db->select('d.id_detail,d.id_list id_logistik,f.id_faktur,f.no_dokumen, f.tgl_faktur,f.id_vendor,l.nama ,l.produsen, , l.harga_cost hna, l.satuan_terkecil tipe,l.jml_satuan_terkecil, d.jumlah, d.harga, d.diskon,d.total, p.no_dokumen no_pr,p.tgl_faktur tgl_pr, u.no_dokumen no_usulan,u.tgl_faktur tgl_usulan, d.status, p.tgl_acc_kains,p.tgl_acc_direktur,p.status status_pr, dp.diskon disc,f.keterangan');
        $this->db->from('detail_po d');
        $this->db->join(' faktur_logistik_farmasi f','d.id_faktur= f.id_faktur');
        $this->db->join('faktur_perencanaan_logfar p','f.id_pr_obat= p.id_faktur');
        $this->db->join('detail_perencanaan_logfar dp','d.id_detail_pr= dp.id_detail');
        $this->db->join('faktur_usulan_logfar u','p.id_usulan= u.id_faktur');
        $this->db->join('list_logistik l','l.id_logistik=d.id_list');

        if ($mulai != '' && $akhir != '') {
            $this->db->where('f.tgl_input >=', $mulai);
            $this->db->where('f.tgl_input <=', $akhir);
        } else {
            $this->db->like('f.tgl_input ', $tgl);
        }
        $this->db->order_by('f.tgl_input desc');
        $this->db->group_by('d.id_detail');
        return $this->db->get()->result();
    }
}
