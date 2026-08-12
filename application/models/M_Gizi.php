<<<<<<< HEAD
<?php

class M_Gizi extends CI_Model
{

    public function selectDataMakanByNoRm($id_pelayanan, $id_history, $no_rm) // RANAP
    {
        $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history, 'no_rm' => $no_rm));
        $this->db->from('v_gizi');
        return $this->db->get()->result();
    }

    public function getMenuSarapan($id_tindakan_gizi)
    {
        $this->db->select('*');
        $this->db->where('id_tindakan_gizi', $id_tindakan_gizi);
        $this->db->from('v_gizi_sarapan');
        return $this->db->get()->result();
    }

    public function selectDataPasienGizi()
    {
        $this->db->where('ket', '0');
        $this->db->from('v_gizi_sarapan');
        return $this->db->get()->result();
    }
    public function selectDataPasienGiziDiet()
    {
        $this->db->where('status', '1');
        $this->db->from('v_gizi');
        return $this->db->get()->result();
    }
    public function getDataGizi($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get('tindakan_gizi')->result();
    }

    public function selectBentukMakanan()
    {
        $this->db->select('*');
        $this->db->where('status', 'aktif');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('bentuk_makanan')->result_array();
    }
    public function selectBentukTindakan()
    {
        $this->db->select('*');
        $this->db->where('status', 'aktif');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('bentuk_tindakan_makanan')->result_array();
    }
    public function delete_tindakan($where, $page_data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function selectBentukSarapan()
    {
        $this->db->select('DISTINCT(kelompok_menu)');
        return $this->db->get('menu_sarapan_gizi')->result_array();
    }
    public function selectBentukMenuSarapan($menu)
    {
        $this->db->select('DISTINCT(nama_makanan) as nama_makanan');
        $this->db->where('kelompok_menu', $menu);
        return $this->db->get('menu_sarapan_gizi')->result_array();
    }

    public function selectDietMakanan()
    {
        $this->db->select('*');
        $this->db->where('status', 'aktif');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('diet_makanan')->result_array();
    }

    public function selectDataMakanByNoRmPel($no_rm)
    {
        $this->db->select('*');
        $this->db->from('v_tindakan_makanan');


        $this->db->where('no_rm', $no_rm);
        $this->db->where('ket', '0');
        $this->db->order_by('tgl_masuk', 'desc');
        return $this->db->get()->result();
    }

    public function selectDataTindakanByNoRmPel($no_rm)
    {
        $this->db->select('*');
        $this->db->from('v_tindakan_gizi');


        $this->db->where('no_rm', $no_rm);
        $this->db->where('ket', '0');
        $this->db->order_by('tanggal_gizi', 'ASC');
        return $this->db->get()->result();
    }

    public function update_tindakan_gizi($where, $page_data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }
    public function insert_tindakan_gizi($page_data, $table)
    {
        $this->db->insert($table, $page_data);
    }

    public function update_print_diet($where, $page_data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function update_print_tindakan($where, $page_data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }
}
=======
<?php

class M_Gizi extends CI_Model
{

    public function selectDataMakanByNoRm($id_pelayanan, $id_history, $no_rm) // RANAP
    {
        $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history, 'no_rm' => $no_rm));
        $this->db->from('v_gizi');
        return $this->db->get()->result();
    }

    public function getMenuSarapan($id_tindakan_gizi)
    {
        $this->db->select('*');
        $this->db->where('id_tindakan_gizi', $id_tindakan_gizi);
        $this->db->from('v_gizi_sarapan');
        return $this->db->get()->result();
    }

    public function selectDataPasienGizi()
    {
        $this->db->where('ket', '0');
        $this->db->from('v_gizi_sarapan');
        return $this->db->get()->result();
    }
    public function selectDataPasienGiziDiet()
    {
        $this->db->where('status', '1');
        $this->db->from('v_gizi');
        return $this->db->get()->result();
    }
    public function getDataGizi($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get('tindakan_gizi')->result();
    }

    public function selectBentukMakanan()
    {
        $this->db->select('*');
        $this->db->where('status', 'aktif');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('bentuk_makanan')->result_array();
    }
    public function selectBentukTindakan()
    {
        $this->db->select('*');
        $this->db->where('status', 'aktif');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('bentuk_tindakan_makanan')->result_array();
    }
    public function delete_tindakan($where, $page_data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function selectBentukSarapan()
    {
        $this->db->select('DISTINCT(kelompok_menu)');
        return $this->db->get('menu_sarapan_gizi')->result_array();
    }
    public function selectBentukMenuSarapan($menu)
    {
        $this->db->select('DISTINCT(nama_makanan) as nama_makanan');
        $this->db->where('kelompok_menu', $menu);
        return $this->db->get('menu_sarapan_gizi')->result_array();
    }

    public function selectDietMakanan()
    {
        $this->db->select('*');
        $this->db->where('status', 'aktif');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('diet_makanan')->result_array();
    }

    public function selectDataMakanByNoRmPel($no_rm)
    {
        $this->db->select('*');
        $this->db->from('v_tindakan_makanan');


        $this->db->where('no_rm', $no_rm);
        $this->db->where('ket', '0');
        $this->db->order_by('tgl_masuk', 'desc');
        return $this->db->get()->result();
    }

    public function selectDataTindakanByNoRmPel($no_rm)
    {
        $this->db->select('*');
        $this->db->from('v_tindakan_gizi');


        $this->db->where('no_rm', $no_rm);
        $this->db->where('ket', '0');
        $this->db->order_by('tanggal_gizi', 'ASC');
        return $this->db->get()->result();
    }

    public function update_tindakan_gizi($where, $page_data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }
    public function insert_tindakan_gizi($page_data, $table)
    {
        $this->db->insert($table, $page_data);
    }

    public function update_print_diet($where, $page_data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }

    public function update_print_tindakan($where, $page_data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $page_data);
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
