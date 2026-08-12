<<<<<<< HEAD
<?php

class M_discharger extends CI_Model
{

    public function saveData($table, $data)
    {
        $result = $this->db->insert($table, $data);
        if ($result) {
            return $this->db->insert_id(); // Mengembalikan ID baru jika berhasil
        } else {
            return $this->db->error(); // Mengembalikan informasi error jika gagal
        }
    }

    public function update($data, $where, $table)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    // public function updateData($table, $data)
    // {
    //     // $this->db->where($where);
    //     $result = $this->db->update($table, $data);

    //     // Opsi untuk mengembalikan status atau error jika ada
    //     if ($result) {
    //         // Jika berhasil, Anda bisa mengembalikan true atau jumlah baris yang terpengaruh
    //         return $this->db->affected_rows();
    //     } else {
    //         // Jika gagal, Anda bisa memilih untuk mengembalikan informasi error
    //         return $this->db->error();
    //     }
    // }

    // public function updateData($table, $data, $where)
    // {
    //     // Lakukan update data ke tabel yang ditentukan dengan data dan kondisi tertentu
    //     $this->db->update($table, $data, $where);

    //     // Periksa apakah update berhasil dengan mengembalikan jumlah baris yang terpengaruh
    //     return $this->db->affected_rows() > 0;
    // }

    // public function updateData($table, $data, $where)
    // {
    //     $this->db->where($id, $where);
    //     $this->db->update($table, $data);
    //     echo $this->db->last_query(); // Debug query SQL
    //     return $this->db->update('discharger', $data);
    // }


    // public function updateData($id, $data)
    // {
    //     $this->db->where('id_form', $id);
    //     return $this->db->update('discharger', $data);
    // }





    public function get_discharge($id_pelayanan)
    {
        $this->db->select('v.*, d.*'); // Select data from both tables
        $this->db->from('discharger d');
        $this->db->join('v_perawat_ranap v', 'd.no_rm = v.no_rm', 'left'); // Join v_perawat_ranap table
        $this->db->where('d.id_pelayanan', $id_pelayanan);
        $query = $this->db->get();
        return $query->row();
    }
}
=======
<?php

class M_discharger extends CI_Model
{

    public function saveData($table, $data)
    {
        $result = $this->db->insert($table, $data);
        if ($result) {
            return $this->db->insert_id(); // Mengembalikan ID baru jika berhasil
        } else {
            return $this->db->error(); // Mengembalikan informasi error jika gagal
        }
    }

    public function update($data, $where, $table)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    // public function updateData($table, $data)
    // {
    //     // $this->db->where($where);
    //     $result = $this->db->update($table, $data);

    //     // Opsi untuk mengembalikan status atau error jika ada
    //     if ($result) {
    //         // Jika berhasil, Anda bisa mengembalikan true atau jumlah baris yang terpengaruh
    //         return $this->db->affected_rows();
    //     } else {
    //         // Jika gagal, Anda bisa memilih untuk mengembalikan informasi error
    //         return $this->db->error();
    //     }
    // }

    // public function updateData($table, $data, $where)
    // {
    //     // Lakukan update data ke tabel yang ditentukan dengan data dan kondisi tertentu
    //     $this->db->update($table, $data, $where);

    //     // Periksa apakah update berhasil dengan mengembalikan jumlah baris yang terpengaruh
    //     return $this->db->affected_rows() > 0;
    // }

    // public function updateData($table, $data, $where)
    // {
    //     $this->db->where($id, $where);
    //     $this->db->update($table, $data);
    //     echo $this->db->last_query(); // Debug query SQL
    //     return $this->db->update('discharger', $data);
    // }


    // public function updateData($id, $data)
    // {
    //     $this->db->where('id_form', $id);
    //     return $this->db->update('discharger', $data);
    // }





    public function get_discharge($id_pelayanan)
    {
        $this->db->select('v.*, d.*'); // Select data from both tables
        $this->db->from('discharger d');
        $this->db->join('v_perawat_ranap v', 'd.no_rm = v.no_rm', 'left'); // Join v_perawat_ranap table
        $this->db->where('d.id_pelayanan', $id_pelayanan);
        $query = $this->db->get();
        return $query->row();
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
