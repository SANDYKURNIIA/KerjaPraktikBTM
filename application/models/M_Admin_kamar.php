<<<<<<< HEAD
<?php

class M_Admin_kamar extends CI_Model
{

    public function selectKamar()
    {
        $this->db->where('keterangan', 'AKTIF');
        return $this->db->get('ruangan')->result();
    }

    //Update


    public function update($where, $page_data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }
    public function selectRuang()
    {
        $query = $this->db->query("SELECT a.kelas_ruangan namaruang,a.lantai,count(a.tipe) kapasitas,sum(if((a.status = 'tersedia'),1,0)) tersedia ,ifnull(v.pria,0) as pria, ifnull(v.wanita,0) as wanita
       from ruangan a 
       left join v_gender_room v on a.kelas_ruangan = v.namaruang
       group by a.kelas_ruangan ");

        return $query->result();
    }
}
=======
<?php

class M_Admin_kamar extends CI_Model
{

    public function selectKamar()
    {
        $this->db->where('keterangan', 'AKTIF');
        return $this->db->get('ruangan')->result();
    }

    //Update


    public function update($where, $page_data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }
    public function selectRuang()
    {
        $query = $this->db->query("SELECT a.kelas_ruangan namaruang,a.lantai,count(a.tipe) kapasitas,sum(if((a.status = 'tersedia'),1,0)) tersedia ,ifnull(v.pria,0) as pria, ifnull(v.wanita,0) as wanita
       from ruangan a 
       left join v_gender_room v on a.kelas_ruangan = v.namaruang
       group by a.kelas_ruangan ");

        return $query->result();
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
