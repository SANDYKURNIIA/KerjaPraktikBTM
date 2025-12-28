<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_TransferPasien extends CI_Model
{
    public function get_dokter_aktif()
    {
        $this->db->select('id_dokter, nama, kode_dokter');
        $this->db->from('dokter');
        $this->db->where('tipe', 'DOKTER');
        $this->db->where('status', 'AKTIF');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get()->result();
    }

    public function get_perawat_by_status($tipe)
    {
        $this->db->select('id_staff, nama, status,qr_code');
        $this->db->from('staff');
        $this->db->where('status', 'aktif');      // contoh: 'igd' atau 'rawatinap'
        // kalau mau batasi hanya perawat:
        $this->db->where('tipe', $tipe);
        $this->db->order_by('nama', 'ASC');

        return $this->db->get()->result();
    }

    public function get_dokter($dokter)
    {
        $this->db->select('id_dokter, nama, foto');
        $this->db->from('dokter');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe', $dokter);
        $this->db->order_by('nama', 'ASC');
        return $this->db->get()->result();
    }
    public function get_dokter_staff($status)
    {
        $this->db->select('id_staff, nama');
        $this->db->from('staff');
        $this->db->where('status', $status);
        // $this->db->where('tipe', $dokter);
        $this->db->order_by('id_staff', 'ASC');
        return $this->db->get()->result();
    }

    // M_TransferPasien.php
    // M_TransferPasien.php
    public function get_by_history($id_history)
    {
        return $this->db
            ->from('form_transfer_pasien_igd')
            ->where('id_history', $id_history)
            ->get()
            ->row();   // 1 baris
    }

    // UPSERT TRANSFER (insert kalau belum ada, update kalau sudah)
    public function save_transfer($data)
    {
        $cek = $this->get_by_history($data['id_history']);

        if ($cek) {
            $this->db->where('id_history', $data['id_history']);
            $this->db->update('form_transfer_pasien_igd', $data);
        } else {
            $this->db->insert('form_transfer_pasien_igd', $data);
        }
    }

    // UPSERT CATATAN DOKTER JAGA DI catatan_perkembangan_terintegrasi
    public function upsert_catatan_dokter_jaga($id_history, $id_staff, $verif, $id_pelayanan, $no_rm, $staff_input)
    {
        $this->db->from('form_transfer_pasien_igd');
        $this->db->where('id_history', $id_history);
        $this->db->where('instruksi', 'Dokter jaga IGD dari form transfer');
        $cek = $this->db->get()->row();

        $data = [
            'id_pelayanan' => $id_pelayanan,
            'id_history'   => $id_history,
            'no_rm'        => $no_rm,
            'instruksi'    => 'Dokter jaga IGD dari form transfer',
            'dokter_verif' => $id_staff,        // simpan id_staff dokter
            'verif'        => $verif,            // 'Belum' atau 'Ya'
            'tanggal'      => date('Y-m-d H:i:s'),
            'staff'        => $staff_input       // staff yang input / approve
        ];

        if ($cek) {
            $this->db->where('id_catatan', $cek->id_catatan);
            $this->db->update('form_transfer_pasien_igd', $data);
        } else {
            $this->db->insert('form_transfer_pasien_igd', $data);
        }
    }

    // UPDATE VERIF TRANSFER
    public function update_verif_transfer($id_history, $status)
    {
        $this->db->where('id_history', $id_history);
        $this->db->update('form_transfer_pasien_igd', ['verif' => $status]);
    }

    // UPDATE VERIF CATATAN
    public function update_verif_catatan($id_history, $status)
    {
        $this->db->where('id_history', $id_history);
        // $this->db->where('instruksi', 'Dokter jaga IGD dari form transfer');
        $this->db->update('form_transfer_pasien_igd', [
            'verif'    => $status,
            'tgl_verif' => date('Y-m-d H:i:s')
        ]);
    }

    // di M_TransferPasien
    public function get_by_history_with_verif($id_history)
    {
        $this->db->select("
        form_transfer_pasien_igd.*,
        catatan_perkembangan_terintegrasi.verif
    ");
        $this->db->from('form_transfer_pasien_igd');
        $this->db->join(
            'catatan_perkembangan_terintegrasi',
            "catatan_perkembangan_terintegrasi.id_history = form_transfer_pasien_igd.id_history
         AND catatan_perkembangan_terintegrasi.instruksi = 'Dokter jaga IGD dari form transfer'",
            'left'
        );
        $this->db->where('form_transfer_pasien_igd.id_history', $id_history);
        return $this->db->get()->row();
    }

    public function update_catatan($id, $data)
    {
        $this->db->where('id_transfer_pasien', $id);
        return $this->db->update('form_transfer_pasien_igd', $data);
    }

    public function getTriaseAssesment($id_history)
    {
        $this->db->select('id_form_transfer, gcs, e, m, v,tekanan_darah,frequensi_nadi,frequensi_nafas,suhu,spo2');
        $this->db->from('form_transfer_pasien_igd');
        $this->db->where('id_history', $id_history);
        return $this->db->get()->result();
    }
}
