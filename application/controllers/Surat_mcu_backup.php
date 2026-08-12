<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Surat_mcu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_mcu');
    }
    public function checkData()
    {
        $id_mcu = $this->input->post('id_mcu');
        $surat_sehat = $this->M_mcu->checkData($id_mcu, 'surat_sehat');
        $medic_sertif = $this->M_mcu->checkData($id_mcu, 'medic_sertif');
        $sehat_rohani = $this->M_mcu->checkData($id_mcu, 'sehat_rohani');
        $buta_warna = $this->M_mcu->checkData($id_mcu, 'buta_warna');
        $buta_warna_visus = $this->M_mcu->checkData($id_mcu, 'buta_warna_visus');
        $surat_mantoux = $this->M_mcu->checkData($id_mcu, 'surat_mantoux');
        $bebas_tato = $this->M_mcu->checkData($id_mcu, 'bebas_tato');
        $bebas_narkoba = $this->M_mcu->checkData($id_mcu, 'bebas_narkoba');


        $db['surat_sehat'] = empty($surat_sehat) ? 'not-found' : ['status' => 'found', 'data' => $surat_sehat];
        $db['medic_sertif'] = empty($medic_sertif) ? 'not-found' : ['status' => 'found', 'data' => $medic_sertif];
        $db['sehat_rohani'] = empty($sehat_rohani) ? 'not-found' : ['status' => 'found', 'data' => $sehat_rohani];
        $db['buta_warna'] = empty($buta_warna) ? 'not-found' : ['status' => 'found', 'data' => $buta_warna];
        $db['buta_warna_visus'] = empty($buta_warna_visus) ? 'not-found' : ['status' => 'found', 'data' => $buta_warna_visus];
        $db['surat_mantoux'] = empty($surat_mantoux) ? 'not-found' : ['status' => 'found', 'data' => $surat_mantoux];
        $db['bebas_tato'] = empty($bebas_tato) ? 'not-found' : ['status' => 'found', 'data' => $bebas_tato];
        $db['bebas_narkoba'] = empty($bebas_narkoba) ? 'not-found' : ['status' => 'found', 'data' => $bebas_narkoba];

        echo json_encode($db);
        exit;
    }

    public function cetak_surat_sehat()
    {
        $staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from surat_sehat where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_surat' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'berat_badan' => $this->input->post('inWeight'),
                'tinggi_badan' => $this->input->post('inHigh'),
                'tekanan_darah' => $this->input->post('tekanan_darah'),
                'dokter' => $this->input->post('inDokter'),
                'kebutuhan' => $this->input->post('kebutuhan'),
                'tgl' => date("Y-m-d H:i:s"),
                'staff' => $staff->id_staff,
            ];
            $this->M_mcu->insert_tindakan($db, 'surat_sehat');
        } else {
            $db = [
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'berat_badan' => $this->input->post('inWeight'),
                'tinggi_badan' => $this->input->post('inHigh'),
                'tekanan_darah' => $this->input->post('tekanan_darah'),
                'dokter' => $this->input->post('inDokter'),
                'kebutuhan' => $this->input->post('kebutuhan'),
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'surat_sehat');
        }

        $data = $this->db->query("SELECT * from surat_sehat s, mcu m where s.id_mcu = m.id_mcu and s.id_mcu = '$id'")->row();



        $this->load->view('mcu_print/cetak_surat_sehat', $data);
    }
    public function cetak_medic_sertif()
    {
        $staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from medic_sertif where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_surat' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'berat_badan' => $this->input->post('inWeight'),
                'tinggi_badan' => $this->input->post('inHigh'),
                'tekanan_darah' => $this->input->post('tekanan_darah'),
                'dokter' => $this->input->post('inDokter'),
                'kebutuhan' => $this->input->post('kebutuhan'),
                'blind' => $this->input->post('blind'),
                'tgl' => date("Y-m-d H:i:s"),
                'staff' => $staff->id_staff,
            ];
            $this->M_mcu->insert_tindakan($db, 'medic_sertif');
        } else {
            $db = [
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'berat_badan' => $this->input->post('inWeight'),
                'tinggi_badan' => $this->input->post('inHigh'),
                'tekanan_darah' => $this->input->post('tekanan_darah'),
                'dokter' => $this->input->post('inDokter'),
                'kebutuhan' => $this->input->post('kebutuhan'),
                'blind' => $this->input->post('blind'),
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'medic_sertif');
        }

        $data = $this->db->query("SELECT * from medic_sertif s, mcu m where s.id_mcu = m.id_mcu and s.id_mcu = '$id'")->row();
        $this->load->view('mcu_print/cetak_medic_sertif', $data);
    }
    public function cetak_sehat_rohani()
    {
        $staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from sehat_rohani where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_surat' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
                'kebutuhan' => $this->input->post('inPerlu'),
                'tgl' => date("Y-m-d H:i:s"),
                'staff' => $staff->id_staff,
            ];
            $this->M_mcu->insert_tindakan($db, 'sehat_rohani');
        } else {
            $db = [
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
                'kebutuhan' => $this->input->post('inPerlu'),
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'sehat_rohani');
        }

        $data = $this->db->query("SELECT * from sehat_rohani s, mcu m where s.id_mcu = m.id_mcu and s.id_mcu = '$id'")->row();
        $this->load->view('mcu_print/cetak_sehat_rohani', $data);
    }
    public function cetak_buta_warna()
    {
        $staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from buta_warna where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_surat' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
                // 'kebutuhan' => $this->input->post('inPerlu'),
                'tgl' => date("Y-m-d H:i:s"),
                'staff' => $staff->id_staff,
            ];
            $this->M_mcu->insert_tindakan($db, 'buta_warna');
        } else {
            $db = [
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'buta_warna');
        }

        $data = $this->db->query("SELECT * from buta_warna s, mcu m where s.id_mcu = m.id_mcu and s.id_mcu = '$id'")->row();
        $this->load->view('mcu_print/cetak_buta_warna', $data);
    }
    public function cetak_buta_warna_visus()
    {
        $staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from buta_warna_visus where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_surat' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
                'dekat' => $this->input->post('dekat'),
                'jauh' => $this->input->post('jauh'),
                'tgl' => date("Y-m-d H:i:s"),
                'staff' => $staff->id_staff,
            ];
            $this->M_mcu->insert_tindakan($db, 'buta_warna_visus');
        } else {
            $db = [
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
                'dekat' => $this->input->post('dekat'),
                'jauh' => $this->input->post('jauh'),
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'buta_warna_visus');
        }

        $data = $this->db->query("SELECT * from buta_warna_visus s, mcu m where s.id_mcu = m.id_mcu and s.id_mcu = '$id'")->row();
        $this->load->view('mcu_print/cetak_buta_warna_visus', $data);
    }
    public function cetak_mantoux()
    {
        $staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from surat_mantoux where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_surat' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
                'tgl' => date("Y-m-d H:i:s"),
                'staff' => $staff->id_staff,
            ];
            $this->M_mcu->insert_tindakan($db, 'surat_mantoux');
        } else {
            $db = [
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'surat_mantoux');
        }

        $data = $this->db->query("SELECT * from surat_mantoux s, mcu m where s.id_mcu = m.id_mcu and s.id_mcu = '$id'")->row();
        $this->load->view('mcu_print/cetak_mantoux', $data);
    }
    public function cetak_bebas_tato()
    {
        $staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from bebas_tato where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_surat' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
                'labor' => $this->input->post('inPeriksa'),
                'hasil' => $this->input->post('jauh'),
                'tgl' => date("Y-m-d H:i:s"),
                'staff' => $staff->id_staff,
            ];
            $this->M_mcu->insert_tindakan($db, 'bebas_tato');
        } else {
            $db = [
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
                'labor' => $this->input->post('inPeriksa'),
                'hasil' => $this->input->post('jauh'),
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'bebas_tato');
        }

        $data = $this->db->query("SELECT * from bebas_tato s, mcu m where s.id_mcu = m.id_mcu and s.id_mcu = '$id'")->row();
        $this->load->view('mcu_print/cetak_bebas_tato', $data);
    }
    public function cetak_bebas_narkoba()
    {
        $staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from bebas_narkoba where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_surat' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
                'metamphetamine' => $this->input->post('metamphetamine'),
                'morphine' => $this->input->post('morphine'),
                'benzodiazepam' => $this->input->post('benzodiazepam'),
                'marijuana' => $this->input->post('marijuana'),
                'cocain' => $this->input->post('cocain'),
                'tgl' => date("Y-m-d H:i:s"),
                'staff' => $staff->id_staff,
            ];
            $this->M_mcu->insert_tindakan($db, 'bebas_narkoba');
        } else {
            $db = [
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
                'metamphetamine' => $this->input->post('metamphetamine'),
                'morphine' => $this->input->post('morphine'),
                'benzodiazepam' => $this->input->post('benzodiazepam'),
                'marijuana' => $this->input->post('marijuana'),
                'cocain' => $this->input->post('cocain'),
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'bebas_narkoba');
        }

        $data = $this->db->query("SELECT * from bebas_narkoba s, mcu m where s.id_mcu = m.id_mcu and s.id_mcu = '$id'")->row();
        $this->load->view('mcu_print/cetak_bebas_narkoba', $data);
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Surat_mcu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_mcu');
    }
    public function checkData()
    {
        $id_mcu = $this->input->post('id_mcu');
        $surat_sehat = $this->M_mcu->checkData($id_mcu, 'surat_sehat');
        $medic_sertif = $this->M_mcu->checkData($id_mcu, 'medic_sertif');
        $sehat_rohani = $this->M_mcu->checkData($id_mcu, 'sehat_rohani');
        $buta_warna = $this->M_mcu->checkData($id_mcu, 'buta_warna');
        $buta_warna_visus = $this->M_mcu->checkData($id_mcu, 'buta_warna_visus');
        $surat_mantoux = $this->M_mcu->checkData($id_mcu, 'surat_mantoux');
        $bebas_tato = $this->M_mcu->checkData($id_mcu, 'bebas_tato');
        $bebas_narkoba = $this->M_mcu->checkData($id_mcu, 'bebas_narkoba');


        $db['surat_sehat'] = empty($surat_sehat) ? 'not-found' : ['status' => 'found', 'data' => $surat_sehat];
        $db['medic_sertif'] = empty($medic_sertif) ? 'not-found' : ['status' => 'found', 'data' => $medic_sertif];
        $db['sehat_rohani'] = empty($sehat_rohani) ? 'not-found' : ['status' => 'found', 'data' => $sehat_rohani];
        $db['buta_warna'] = empty($buta_warna) ? 'not-found' : ['status' => 'found', 'data' => $buta_warna];
        $db['buta_warna_visus'] = empty($buta_warna_visus) ? 'not-found' : ['status' => 'found', 'data' => $buta_warna_visus];
        $db['surat_mantoux'] = empty($surat_mantoux) ? 'not-found' : ['status' => 'found', 'data' => $surat_mantoux];
        $db['bebas_tato'] = empty($bebas_tato) ? 'not-found' : ['status' => 'found', 'data' => $bebas_tato];
        $db['bebas_narkoba'] = empty($bebas_narkoba) ? 'not-found' : ['status' => 'found', 'data' => $bebas_narkoba];

        echo json_encode($db);
        exit;
    }

    public function cetak_surat_sehat()
    {
        $staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from surat_sehat where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_surat' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'berat_badan' => $this->input->post('inWeight'),
                'tinggi_badan' => $this->input->post('inHigh'),
                'tekanan_darah' => $this->input->post('tekanan_darah'),
                'dokter' => $this->input->post('inDokter'),
                'kebutuhan' => $this->input->post('kebutuhan'),
                'tgl' => date("Y-m-d H:i:s"),
                'staff' => $staff->id_staff,
            ];
            $this->M_mcu->insert_tindakan($db, 'surat_sehat');
        } else {
            $db = [
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'berat_badan' => $this->input->post('inWeight'),
                'tinggi_badan' => $this->input->post('inHigh'),
                'tekanan_darah' => $this->input->post('tekanan_darah'),
                'dokter' => $this->input->post('inDokter'),
                'kebutuhan' => $this->input->post('kebutuhan'),
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'surat_sehat');
        }

        $data = $this->db->query("SELECT * from surat_sehat s, mcu m where s.id_mcu = m.id_mcu and s.id_mcu = '$id'")->row();



        $this->load->view('mcu_print/cetak_surat_sehat', $data);
    }
    public function cetak_medic_sertif()
    {
        $staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from medic_sertif where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_surat' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'berat_badan' => $this->input->post('inWeight'),
                'tinggi_badan' => $this->input->post('inHigh'),
                'tekanan_darah' => $this->input->post('tekanan_darah'),
                'dokter' => $this->input->post('inDokter'),
                'kebutuhan' => $this->input->post('kebutuhan'),
                'blind' => $this->input->post('blind'),
                'tgl' => date("Y-m-d H:i:s"),
                'staff' => $staff->id_staff,
            ];
            $this->M_mcu->insert_tindakan($db, 'medic_sertif');
        } else {
            $db = [
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'berat_badan' => $this->input->post('inWeight'),
                'tinggi_badan' => $this->input->post('inHigh'),
                'tekanan_darah' => $this->input->post('tekanan_darah'),
                'dokter' => $this->input->post('inDokter'),
                'kebutuhan' => $this->input->post('kebutuhan'),
                'blind' => $this->input->post('blind'),
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'medic_sertif');
        }

        $data = $this->db->query("SELECT * from medic_sertif s, mcu m where s.id_mcu = m.id_mcu and s.id_mcu = '$id'")->row();
        $this->load->view('mcu_print/cetak_medic_sertif', $data);
    }
    public function cetak_sehat_rohani()
    {
        $staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from sehat_rohani where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_surat' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
                'kebutuhan' => $this->input->post('inPerlu'),
                'tgl' => date("Y-m-d H:i:s"),
                'staff' => $staff->id_staff,
            ];
            $this->M_mcu->insert_tindakan($db, 'sehat_rohani');
        } else {
            $db = [
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
                'kebutuhan' => $this->input->post('inPerlu'),
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'sehat_rohani');
        }

        $data = $this->db->query("SELECT * from sehat_rohani s, mcu m where s.id_mcu = m.id_mcu and s.id_mcu = '$id'")->row();
        $this->load->view('mcu_print/cetak_sehat_rohani', $data);
    }
    public function cetak_buta_warna()
    {
        $staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from buta_warna where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_surat' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
                // 'kebutuhan' => $this->input->post('inPerlu'),
                'tgl' => date("Y-m-d H:i:s"),
                'staff' => $staff->id_staff,
            ];
            $this->M_mcu->insert_tindakan($db, 'buta_warna');
        } else {
            $db = [
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'buta_warna');
        }

        $data = $this->db->query("SELECT * from buta_warna s, mcu m where s.id_mcu = m.id_mcu and s.id_mcu = '$id'")->row();
        $this->load->view('mcu_print/cetak_buta_warna', $data);
    }
    public function cetak_buta_warna_visus()
    {
        $staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from buta_warna_visus where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_surat' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
                'dekat' => $this->input->post('dekat'),
                'jauh' => $this->input->post('jauh'),
                'tgl' => date("Y-m-d H:i:s"),
                'staff' => $staff->id_staff,
            ];
            $this->M_mcu->insert_tindakan($db, 'buta_warna_visus');
        } else {
            $db = [
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
                'dekat' => $this->input->post('dekat'),
                'jauh' => $this->input->post('jauh'),
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'buta_warna_visus');
        }

        $data = $this->db->query("SELECT * from buta_warna_visus s, mcu m where s.id_mcu = m.id_mcu and s.id_mcu = '$id'")->row();
        $this->load->view('mcu_print/cetak_buta_warna_visus', $data);
    }
    public function cetak_mantoux()
    {
        $staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from surat_mantoux where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_surat' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
                'tgl' => date("Y-m-d H:i:s"),
                'staff' => $staff->id_staff,
            ];
            $this->M_mcu->insert_tindakan($db, 'surat_mantoux');
        } else {
            $db = [
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'surat_mantoux');
        }

        $data = $this->db->query("SELECT * from surat_mantoux s, mcu m where s.id_mcu = m.id_mcu and s.id_mcu = '$id'")->row();
        $this->load->view('mcu_print/cetak_mantoux', $data);
    }
    public function cetak_bebas_tato()
    {
        $staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from bebas_tato where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_surat' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
                'labor' => $this->input->post('inPeriksa'),
                'hasil' => $this->input->post('jauh'),
                'tgl' => date("Y-m-d H:i:s"),
                'staff' => $staff->id_staff,
            ];
            $this->M_mcu->insert_tindakan($db, 'bebas_tato');
        } else {
            $db = [
                'sehat' => $this->input->post('sehat'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
                'labor' => $this->input->post('inPeriksa'),
                'hasil' => $this->input->post('jauh'),
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'bebas_tato');
        }

        $data = $this->db->query("SELECT * from bebas_tato s, mcu m where s.id_mcu = m.id_mcu and s.id_mcu = '$id'")->row();
        $this->load->view('mcu_print/cetak_bebas_tato', $data);
    }
    public function cetak_bebas_narkoba()
    {
        $staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from bebas_narkoba where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_surat' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
                'metamphetamine' => $this->input->post('metamphetamine'),
                'morphine' => $this->input->post('morphine'),
                'benzodiazepam' => $this->input->post('benzodiazepam'),
                'marijuana' => $this->input->post('marijuana'),
                'cocain' => $this->input->post('cocain'),
                'tgl' => date("Y-m-d H:i:s"),
                'staff' => $staff->id_staff,
            ];
            $this->M_mcu->insert_tindakan($db, 'bebas_narkoba');
        } else {
            $db = [
                'tgl_periksa' => $this->input->post('inTanggal'),
                'dokter' => $this->input->post('inDokter'),
                'metamphetamine' => $this->input->post('metamphetamine'),
                'morphine' => $this->input->post('morphine'),
                'benzodiazepam' => $this->input->post('benzodiazepam'),
                'marijuana' => $this->input->post('marijuana'),
                'cocain' => $this->input->post('cocain'),
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'bebas_narkoba');
        }

        $data = $this->db->query("SELECT * from bebas_narkoba s, mcu m where s.id_mcu = m.id_mcu and s.id_mcu = '$id'")->row();
        $this->load->view('mcu_print/cetak_bebas_narkoba', $data);
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
