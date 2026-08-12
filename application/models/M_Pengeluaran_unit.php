<<<<<<< HEAD
<?php

class M_Pengeluaran_unit extends CI_Model
{
    public function selectObatBebas($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;


        $this->db->select('o.*');
        $this->db->from('pengeluaran_obat_unit o');
        $this->db->where('o.unit', $perequest);

        if ($mulai != '' && $akhir != '') {
            $this->db->where('tanggal >=', $mulai);
            $this->db->where('tanggal <=', $akhir);
        } else {
            $this->db->like(' tanggal ', $tgl);
        }
        $this->db->order_by('tanggal desc');
        return $this->db->get()->result();
    }

    public function selectObatBebasById($id)
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
        $stok = $data_adm->stok;

        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from($stok . ' t, pengeluaran_obat_unit o, list_logistik l , staff s');
        $this->db->where('t.id_logistik=l.id_logistik');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.id_req=o.id_obat_bebas');
        // $this->db->where('t.frek>0');
        $this->db->where('o.id_obat_bebas', $id);
        $this->db->where('t.asal_tujuan', 'PENGELUARAN SENDIRI');
        $this->db->order_by('t.tgl desc');

        return $this->db->get()->result();
    }

    public function delete_tindakan($id, $table, $where)
    {
        $this->db->delete($table, array($where => $id));
    }

    public function delete_obat($id_tindakan, $stok)
    {
        $staff = $this->session->userdata('data_auth');

        //$date = new DateTime('+1 day');
        $this->db->where(array('id_tindakan_farmasi' => $id_tindakan));
        $this->db->update('tindakan_farmasi_kronis', ['staff_hapus' => $staff->id_staff, 'tgl_hapus' => date('Y-m-d H:i:s')]);
        $this->db->delete('tindakan_farmasi', array('id_tindakan_farmasi' => $id_tindakan));

        $this->db->delete($stok, array('id_req' => $id_tindakan));
        // $sql = "DELETE s.* from stok_apotik s , tindakan_farmasi f  WHERE s.id_req = f.id_tindakan_farmasi and s.id_req=?";
        // $this->db->query($sql, array($id_tindakan));
    }
}
=======
<?php

class M_Pengeluaran_unit extends CI_Model
{
    public function selectObatBebas($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;


        $this->db->select('o.*');
        $this->db->from('pengeluaran_obat_unit o');
        $this->db->where('o.unit', $perequest);

        if ($mulai != '' && $akhir != '') {
            $this->db->where('tanggal >=', $mulai);
            $this->db->where('tanggal <=', $akhir);
        } else {
            $this->db->like(' tanggal ', $tgl);
        }
        $this->db->order_by('tanggal desc');
        return $this->db->get()->result();
    }

    public function selectObatBebasById($id)
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
        $stok = $data_adm->stok;

        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from($stok . ' t, pengeluaran_obat_unit o, list_logistik l , staff s');
        $this->db->where('t.id_logistik=l.id_logistik');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('t.id_req=o.id_obat_bebas');
        // $this->db->where('t.frek>0');
        $this->db->where('o.id_obat_bebas', $id);
        $this->db->where('t.asal_tujuan', 'PENGELUARAN SENDIRI');
        $this->db->order_by('t.tgl desc');

        return $this->db->get()->result();
    }

    public function delete_tindakan($id, $table, $where)
    {
        $this->db->delete($table, array($where => $id));
    }

    public function delete_obat($id_tindakan, $stok)
    {
        $staff = $this->session->userdata('data_auth');

        //$date = new DateTime('+1 day');
        $this->db->where(array('id_tindakan_farmasi' => $id_tindakan));
        $this->db->update('tindakan_farmasi_kronis', ['staff_hapus' => $staff->id_staff, 'tgl_hapus' => date('Y-m-d H:i:s')]);
        $this->db->delete('tindakan_farmasi', array('id_tindakan_farmasi' => $id_tindakan));

        $this->db->delete($stok, array('id_req' => $id_tindakan));
        // $sql = "DELETE s.* from stok_apotik s , tindakan_farmasi f  WHERE s.id_req = f.id_tindakan_farmasi and s.id_req=?";
        // $this->db->query($sql, array($id_tindakan));
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
