<?php

class M_Polionline extends CI_Model{


    public function selectKonfirmasiKehadiran(){
        $this->db->from('v_konfirmasi_kehadiran');
        $this->db->where_not_in('status','1');
        $this->db->limit(300);
        return $this->db->get()->result();
    }

    public function getPoli()
	{
		$this->db->select('DISTINCT(id_list_poli), nama_panjang');
		$this->db->where('status_dokter', 'ADA');
		$this->db->group_by('nama_panjang', 'ASC');
		return $this->db->get('list_poli')->result_array();
    }
    
    public function getKamar(){
        $kelas = $this->input->post('kelas');
        $data = $this->M_Pelayanan_masuk->getKamar($kelas);
        echo json_encode($data);
    }

    public function getDokter($spes)
	{
		$this->db->select('nama, id_dokter');
		$this->db->where('status', 'AKTIF');
		$this->db->where('dokter_spes', $spes);
		$this->db->group_by('dokter_spes,id_dokter');
		$this->db->order_by('nama');
		return $this->db->get('dokter')->result_array();
	}

    public function selectAntrianPoli(){
        return $this->db->get('admin_poli')->result();
    }

    public function selectDataAkun(){
        return $this->db->get('akun_online')->result();
    }

    public function selectDataStaff(){
        return $this->db->get('staff')->result();
    }

    public function selectPoliOnlineAll(){
        return $this->db->get('list_poli')->result();
    }
    
    public function selectPoliOnline(){
        $this->db->where('buka >', 0);
        $this->db->where('kuota >', 0);
        $this->db->order_by('nama_panjang');
        $query = $this->db->get('list_poli');
        return $query->result();
    }

    public function selectDataPendaftaranby_id($username){
        $this->db->where('username',$username);
        $this->db->from('akun_online');
        return $this->db->get()->result();
    }

    public function selectDataStaffby_id($username){
        $this->db->where('username',$username);
        $this->db->from('staff');
        return $this->db->get()->result();
    }
    

    public function selectDataUbahby_id($id_pelayanan){
        $this->db->where('id_pelayanan',$id_pelayanan);
        $this->db->from('v_konfirmasi_kehadiran');
        return $this->db->get()->result();
    }

    public function selectAsalPasien()
    {
      $this->db->select('DISTINCT(nama) nama_asal, id_asal_pasien');
      $this->db->order_by('nama_asal', 'ASC');
      return $this->db->get('asal_pasien')->result();
    }

    public function selectNamaDPJP()
    {
      $this->db->select('nama, id_dokter');
      $this->db->where_not_in('id_dokter');
      $this->db->where('status','AKTIF');
      $this->db->from('dokter');
      $this->db->order_by('nama');
      return $this->db->get()->result();
    }

    public function selectCaraBayar()
    {
      $this->db->select('DISTINCT(nama) nama_bayar, id_cara_bayar ');
      $this->db->order_by('nama_bayar', 'ASC');
      return $this->db->get('cara_bayar')->result();
    }
  

        // Insert

    public function insertAkun($data,$table){
        $this->db->insert($table,$data);
    }

    public function insert_data_rm($data,$table){
        $this->db->insert($table,$data);
    }

        // Get

    public function get_username($username){
        $this->db->where('username',$username);
        $query = $this->db->get('akun_online');
        return $query->result();
    }

    public function get_usernamestaff($username){
        $this->db->where('username',$username);
        $query = $this->db->get('staff');
        return $query->result();
    }

    public function get_norm_like($no_rm){
        $this->db->like('no_rm', $no_rm, 'both');
        $result = $this->db->get('pasien')->result();

        return $result;
    }

    public function selectDataKonfirmasiby_id($id_pelayanan){
        $this->db->where('id_pelayanan',$id_pelayanan);
        $this->db->from('v_konfirmasi_kehadiran');
        return $this->db->get()->result();
    }

    public function selectDeleteKonfirmasiby_id($id_pelayanan){
        $this->db->where('id_pelayanan',$id_pelayanan);
        $this->db->from('v_konfirmasi_kehadiran');
        return $this->db->get()->result();
    }


    public function get_ai_tbl_id(){
        return $this->db->query('select generate_id_akun_online() as id from dual')->row()->id;
    }


    public function get_list($id_akun){
        $hasil= $this->db->query("SELECT p.nama, p.tgl_lahir, p.no_rm
            from akun_online a, list_rm_online l, pasien p
            WHERE a.id_akun=l.id_akun and p.no_rm=l.no_rm and a.id_akun='$id_akun'
            order by nama");
        return $hasil->result();
    }

    public function get_listby_id_rm($id_akun,$no_rm){
        $hasil= $this->db->query("SELECT p.nama, p.tgl_lahir, p.no_rm
            from akun_online a, list_rm_online l, pasien p
            WHERE a.id_akun=l.id_akun and p.no_rm=l.no_rm and a.id_akun='$id_akun' and l.no_rm='$no_rm'
            order by nama");
        return $hasil->result();
    }

        //Update

    public function update_akunonline($where,$page_data,$table){
        $this->db->where($where);
        $this->db->update($table,$page_data);
    }
    
    public function update_staff($where,$page_data,$table){
        $this->db->where($where);
        $this->db->update($table,$page_data);
    }

    public function update_konfirmasi($where,$page_data,$table){
        $this->db->where($where);
        $this->db->update($table,$page_data);
    }	

    public function update_kehadirankonfirmasi1($idPelayanan,$data1){
        $this->db->where('id_pelayanan',$idPelayanan);
        $this->db->update('pelayanan',$data1);
    }

    public function update_kehadirankonfirmasi2($idHis,$data2){
        $this->db->where('id_history',$idHis);
        $this->db->update('history_pelayanan',$data2);
    }
    
    public function update_poli_online($where,$page_data,$table){
        $this->db->where($where);
        $this->db->update($table,$page_data);
    }	

     
    public function update_antrian_poli($where,$page_data,$table){
        $this->db->where($where);
        $this->db->update($table,$page_data);
    }	

        // Delete

    public function delete_rm($id_akun,$no_rm){
        $this->db->delete('list_rm_online', array('id_akun' => $id_akun,'no_rm' => $no_rm)); 
    }

    public function delete_konfirm($where,$page_data,$table){
        $this->db->where($where);
        $this->db->update($table,$page_data);
      }




}

?>
