<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Keperawatan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        if (isset($data['tanggal'])) {
            $data['tanggal'] = date('Y-m-d H:i:s', strtotime($data['tanggal']));
        }
        return $this->db->insert('catatan_keperawatan', $data);
    }

    public function getByPelayanan($id_pelayanan)
    {
        $this->db->select("
            ck.id_catatan_keperawatan as id,
            DATE_FORMAT(ck.tanggal, '%d-%m-%Y %H:%i') as tanggal,
            ck.jam,
            ck.masalah,
            ck.instruksi,
            ck.tindakan,
            COALESCE(s.nama, ck.staff) as nama_staff
        ", false);
        $this->db->from('catatan_keperawatan ck');
        $this->db->join('staff s', 's.id_staff = ck.staff', 'left');
        $this->db->where('ck.id_pelayanan', $id_pelayanan);
        $this->db->order_by('ck.tanggal', 'ASC');
        return $this->db->get()->result();
    }

    public function delete($id)
    {
        return $this->db->delete('catatan_keperawatan', ['id_catatan_keperawatan' => $id]);
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Keperawatan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        if (isset($data['tanggal'])) {
            $data['tanggal'] = date('Y-m-d H:i:s', strtotime($data['tanggal']));
        }
        return $this->db->insert('catatan_keperawatan', $data);
    }

    public function getByPelayanan($id_pelayanan)
    {
        $this->db->select("
            ck.id_catatan_keperawatan as id,
            DATE_FORMAT(ck.tanggal, '%d-%m-%Y %H:%i') as tanggal,
            ck.jam,
            ck.masalah,
            ck.instruksi,
            ck.tindakan,
            COALESCE(s.nama, ck.staff) as nama_staff
        ", false);
        $this->db->from('catatan_keperawatan ck');
        $this->db->join('staff s', 's.id_staff = ck.staff', 'left');
        $this->db->where('ck.id_pelayanan', $id_pelayanan);
        $this->db->order_by('ck.tanggal', 'ASC');
        return $this->db->get()->result();
    }

    public function delete($id)
    {
        return $this->db->delete('catatan_keperawatan', ['id_catatan_keperawatan' => $id]);
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
