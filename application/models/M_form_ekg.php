<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_form_ekg extends CI_Model
{
    public function selectDataPasienRanapby_id($id_pelayanan, $id_history)
    {
        $this->db->select('
    v.*,
    p.pekerjaan,
    p.agama,
    p.status perkawinan,
    p.alamat,

    d.foto as foto_dokter
');

        $this->db->from('v_kunjungan v, pasien p');

        $this->db->join('dokter d', 'v.dpjp = d.id_dokter', 'left');

        $this->db->where('v.no_rm = p.no_rm');

        $this->db->where(array(
            'v.id_pelayanan' => $id_pelayanan,
            'id_history' => $id_history
        ));

        return $this->db->get()->row();
    }

    public function get_by_histori($id_histori)
    {
        return $this->db->get_where('form_ekg', ['id_history' => $id_histori])->row();
    }
}
