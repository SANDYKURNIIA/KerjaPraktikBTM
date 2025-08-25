<?php
class M_Formulir_resume_pulang extends CI_Model
{
    public function insert_data_pasien($data)
    {
        $this->db->insert('resume_pulang', $data);
    }

    public function getAktifRuangan()
    {
        $this->db->select('tipe');
        $this->db->from('ruangan');
        $this->db->where('keterangan', 'aktif');
        $this->db->order_by('tipe', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    public function update_data_pasien($id_pelayanan, $data)
    {
        // Melakukan pembaruan data berdasarkan id_pelayanan
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->update('resume_pulang', $data);
    }

    public function CekId($id_pelayanan)
    {
        $query = $this->db->get_where('resume_pulang', array('id_pelayanan' => $id_pelayanan));
        return $query->row();
    }
    public function getDataMedisById($id_pelayanan)
    {
        $query = $this->db->get_where('resume_pulang', array('id_pelayanan' => $id_pelayanan));
        return $query->result();
    }

    public function getData($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->from('resume_pulang');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->row();
    }

    public function getDiagnosa($cari)
    {
        $this->db->select("*");
        $this->db->from('list_diagnosa');
        $this->db->like('id_diagnosa', $cari, 'both');
        $this->db->or_like('nama_diagnosa', $cari, 'both');

        $this->db->limit(10);
        return $this->db->get()->result_array();
    }
}
