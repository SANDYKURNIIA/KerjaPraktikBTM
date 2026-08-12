<<<<<<< HEAD
<?php

class M_Master extends CI_Model
{
    public function selectDataPoli($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by('nama ASC');
        return $this->db->get()->result();
    }
    
    public function insert_tindakan($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function selectDataTindakan($where,$table)
    {
        $this->db->where($where);
        return $this->db->get($table)->result();
    }
    public function delete_tindakan($id, $table, $where)
    {
        $this->db->delete($table, array($where => $id));
    }
}
=======
<?php

class M_Master extends CI_Model
{
    public function selectDataPoli($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by('nama ASC');
        return $this->db->get()->result();
    }
    
    public function insert_tindakan($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function selectDataTindakan($where,$table)
    {
        $this->db->where($where);
        return $this->db->get($table)->result();
    }
    public function delete_tindakan($id, $table, $where)
    {
        $this->db->delete($table, array($where => $id));
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
