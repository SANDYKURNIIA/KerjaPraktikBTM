<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No driect script access allowed');

class M_Layar_Poli extends CI_Model
{
    
    public function POLI_UMUM()
    {
        //kode U
        $tanggal = date('Y-m-d');
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', 'RZE28J1098');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }

    public function selectPlay($poli)
    {
        $where = [];
        foreach ($poli as $productId) {
            $kodePoli=$this->db->get_where('list_poli',['kdpoli_bpjs'=>$productId])->row()->inisial;
            $where[] = "kode = '$kodePoli'";
        }
        $this->db->where(implode(' OR ', $where));
        return $this->db->get('temp_panggil_antrian')->row_array();
    }
    public function getAntrianPoli($poli)
    {
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $tgl = date('Y-m-d');

        $this->db->select('ifnull(a.no_antri,"3") no_antri, l.inisial,l.nmpoli_bpjs nama');
        $this->db->from('antrian_poli a');
        
        // Subquery untuk mendapatkan waktu panggil maksimum per inisial
        $this->db->join("(
            SELECT inisial, MAX(waktu_play) AS max_waktu_panggil
            FROM antrian_poli
            WHERE tanggal = '$tgl'
            GROUP BY inisial
        ) b", "a.inisial = b.inisial AND a.waktu_play = b.max_waktu_panggil");
        
        // Join dengan tabel list_poli
        $this->db->join('list_poli l', 'a.poli = l.id_list_poli and b.inisial = l.inisial','inner');
        
        // Kondisi WHERE
        $this->db->where('a.tanggal', $tgl);
        $this->db->where('a.inisial !=', '-');
        $this->db->where('a.status', 0);
        $where = [];
        foreach ($poli as $productId) {
            $where[] = "l.kdpoli_bpjs = '$productId'";
        }
       
        $this->db->where(implode(' OR ', $where));
        // $this->db->group_by('l.kdpoli_bpjs');
        // $this->db->order_by('a.waktu_play desc');
        return $this->db->get()->result_array();
    }

    public function deleteplaySuara()
    {
        $this->db->limit(1);
        $this->db->empty_Table('temp_panggil_antrian');
    }


    public function selectAntrianPoli()
    {
        return $this->db->get('admin_poli')->row_array();
    }

    
}
=======
<?php
defined('BASEPATH') or exit('No driect script access allowed');

class M_Layar_Poli extends CI_Model
{
    
    public function POLI_UMUM()
    {
        //kode U
        $tanggal = date('Y-m-d');
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', 'RZE28J1098');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }

    public function selectPlay($poli)
    {
        $where = [];
        foreach ($poli as $productId) {
            $kodePoli=$this->db->get_where('list_poli',['kdpoli_bpjs'=>$productId])->row()->inisial;
            $where[] = "kode = '$kodePoli'";
        }
        $this->db->where(implode(' OR ', $where));
        return $this->db->get('temp_panggil_antrian')->row_array();
    }
    public function getAntrianPoli($poli)
    {
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $tgl = date('Y-m-d');

        $this->db->select('ifnull(a.no_antri,"3") no_antri, l.inisial,l.nmpoli_bpjs nama');
        $this->db->from('antrian_poli a');
        
        // Subquery untuk mendapatkan waktu panggil maksimum per inisial
        $this->db->join("(
            SELECT inisial, MAX(waktu_play) AS max_waktu_panggil
            FROM antrian_poli
            WHERE tanggal = '$tgl'
            GROUP BY inisial
        ) b", "a.inisial = b.inisial AND a.waktu_play = b.max_waktu_panggil");
        
        // Join dengan tabel list_poli
        $this->db->join('list_poli l', 'a.poli = l.id_list_poli and b.inisial = l.inisial','inner');
        
        // Kondisi WHERE
        $this->db->where('a.tanggal', $tgl);
        $this->db->where('a.inisial !=', '-');
        $this->db->where('a.status', 0);
        $where = [];
        foreach ($poli as $productId) {
            $where[] = "l.kdpoli_bpjs = '$productId'";
        }
       
        $this->db->where(implode(' OR ', $where));
        // $this->db->group_by('l.kdpoli_bpjs');
        // $this->db->order_by('a.waktu_play desc');
        return $this->db->get()->result_array();
    }

    public function deleteplaySuara()
    {
        $this->db->limit(1);
        $this->db->empty_Table('temp_panggil_antrian');
    }


    public function selectAntrianPoli()
    {
        return $this->db->get('admin_poli')->row_array();
    }

    
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
