<?php
class M_Resume_medis extends CI_Model
{
    public function delete_data($id)
    {
        // Tambahkan logika penghapusan data berdasarkan ID di sini
        // Misalnya, jika tabel data Anda bernama 'resume_medis', Anda bisa melakukan sesuatu seperti ini:
        $this->db->where('id_resume', $id);
        $this->db->delete('resume_medis');

        // Kembalikan true jika penghapusan berhasil
        return $this->db->affected_rows() > 0;
    }
    public function insert_data_pasien($data)
    {
        $this->db->insert('resume_medis', $data);
    }
    public function CekId($id_pelayanan)
    {
        $query = $this->db->get_where('resume_medis', array('id_pelayanan' => $id_pelayanan));
        return $query->row();
    }
    public function getAktifDokter()
    {
        $sql = "SELECT nama FROM dokter WHERE status = 'aktif' ORDER BY nama ASC";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    public function getBukaPoli()
    {
        $sql = "SELECT id_list_poli, nama_panjang FROM list_poli WHERE status = 'buka' ORDER BY nama_panjang ASC";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getDataMedisById($id_pelayanan)
    {
        $query = $this->db->get_where('resume_medis', array('id_pelayanan' => $id_pelayanan));
        return $query->result();
    }
    public function getDataMedis()
    {
        $query = $this->db->get('resume_medis'); // 'resume_medis' adalah nama tabel Anda
        return $query->result();
    }
    public function get_data_by_id($id)
    {
        // Fungsi ini mengambil data berdasarkan ID
        $query = $this->db->get_where('resume_medis', array('id_pelayanan' => $id));
        return $query->row_array();
    }

    public function update_data_pasien($id_pelayanan, $data)
    {
        // Melakukan pembaruan data berdasarkan id_pelayanan
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->update('resume_medis', $data);
    }
    // public function getDataById($id)
    // {
    //     // Gantilah 'nama_tabel' dengan nama tabel Anda
    //     $this->db->where('id', $id);
    //     $query = $this->db->get('resume_medis');

    //     if ($query->num_rows() > 0) {
    //         return $query->row();
    //     }

    //     return null;
    // }

}
