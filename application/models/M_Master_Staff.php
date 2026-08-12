<?php

class M_Master_Staff extends CI_Model
{

    ////tindakan masterstaff 
    public function selectmaster_staff()
    {
        $this->db->select('*');
        // $this->db->where('status', 'AKTIF');
        $this->db->from('staff');
        // $this->db->order_by('');
        return $this->db->get()->result();
    }
    public function selectDatamaster_staff($id)
    {
        $this->db->where('id_staff', $id);
        return $this->db->get('staff')->result();
    }

    public function update($where, $data, $table)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }
    public function insert_master_staff($data, $table)
    {
        // Pastikan data yang akan dimasukkan valid (bisa dilakukan validasi di sini)
        if (!empty($data)) {
            // Melakukan insert data ke dalam tabel yang ditentukan
            $this->db->insert($table, $data);
        } else {
            return false;  // Mengembalikan false jika data kosong
        }
    }

    public function get_staff_by_username($username) {
        // Menggunakan query builder untuk mencari staff berdasarkan username
        $this->db->where('username', $username);
        $query = $this->db->get('staff'); // 'staff' adalah nama tabel Anda
        
        // Jika data ditemukan, kembalikan hasilnya, jika tidak kembalikan null
        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan satu baris data (object)
        } else {
            return null; // Tidak ada data ditemukan
        }
    }

    public function delete_master_staff($id_staff)
    {
        // Pastikan id_staff ada
        if (!empty($id_staff)) {
            $this->db->where('id_staff', $id_staff);  // Menambahkan kondisi WHERE untuk ID
            $this->db->delete('staff');  // Menggunakan delete() untuk menghapus data berdasarkan id_staff

            // Mengecek apakah ada baris yang terhapus
            if ($this->db->affected_rows() > 0) {
                return true;  // Berhasil dihapus
            } else {
                return false; // ID tidak ditemukan atau gagal menghapus
            }
        }
        return false; // Jika id_staff tidak valid
    }

    public function get_tipe() {
        $query = $this->db->query('SELECT DISTINCT tipe FROM staff');
        return $query->result(); // returns the result as an array of objects
    }
}
