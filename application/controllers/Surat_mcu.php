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
                'nadi' => $this->input->post('nadi'),
                'respirasi' => $this->input->post('respirasi'),
                'suhu' => $this->input->post('suhu'),
                'pf_kea_umum' => $this->input->post('keadaan'),
                'pf_kpl_leher' => $this->input->post('kepala'),
                'pf_thorax' => $this->input->post('thorax'),
                'pf_abdomen' => $this->input->post('abdomen'),
                'pf_extremitas' => $this->input->post('extremitas'),
                'pf_neurologis' => $this->input->post('neurologis'),
                'pf_bwarna' => $this->input->post('bwarna'),
                'dokter' => $this->input->post('inDokter'),
                'dok_sip' => $this->input->post('dok_sip'),
                'dok_jabatan' =>$this->input->post('dok_jabatan'),
                'kebutuhan' => $this->input->post('kebutuhan'),
                'ket' => $this->input->post('ket'),
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
                'nadi' => $this->input->post('nadi'),
                'respirasi' => $this->input->post('respirasi'),
                'suhu' => $this->input->post('suhu'),
                'pf_kea_umum' => $this->input->post('keadaan'),
                'pf_kpl_leher' => $this->input->post('kepala'),
                'pf_thorax' => $this->input->post('thorax'),
                'pf_abdomen' => $this->input->post('abdomen'),
                'pf_extremitas' => $this->input->post('extremitas'),
                'pf_neurologis' => $this->input->post('neurologis'),
                'pf_bwarna' => $this->input->post('bwarna'),
                'dokter' => $this->input->post('inDokter'),
                'dok_sip' => $this->input->post('dok_sip'),
                'dok_jabatan' =>$this->input->post('dok_jabatan'),
                'kebutuhan' => $this->input->post('kebutuhan'),
                'ket' => $this->input->post('ket'),
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
                'kebutuhan' => $this->input->post('inKebutuhan'),   
                'tinggi_badan' => $this->input->post('tinggi'),
                'berat_badan' => $this->input->post('berat'),
                'tekanan_darah' => $this->input->post('tekanan'),
                'nadi' =>$this->input->post('nadi'),
                'dokter' => $this->input->post('inDokter'),
                'amphetamine' => $this->input->post('amphetamine'),
                'cocain' => $this->input->post('cocain'),
                'morphine' => $this->input->post('morphine'),
                'benzodiazepam' => $this->input->post('benzodiazepam'),
                'metamphetamine' => $this->input->post('metamphetamine'),
                'marijuana' => $this->input->post('marijuana'),
                'tanda_narkoba' => $this->input->post('tanda_narkoba'),
               
                'tgl' => date("Y-m-d H:i:s"),
                'staff' => $staff->id_staff,
            ];
            $this->M_mcu->insert_tindakan($db, 'bebas_narkoba');
        } else {
            $db = [
                'tgl_periksa' => $this->input->post('inTanggal'),
                'kebutuhan' => $this->input->post('inKebutuhan'),
                'tinggi_badan' => $this->input->post('tinggi'),
                'berat_badan' => $this->input->post('berat'),
                'tekanan_darah' => $this->input->post('tekanan'),
                'nadi' =>$this->input->post('nadi'),
                'dokter' => $this->input->post('inDokter'),
                'amphetamine' => $this->input->post('amphetamine'),
                'cocain' => $this->input->post('cocain'),
                'morphine' => $this->input->post('morphine'),
                'benzodiazepam' => $this->input->post('benzodiazepam'),
                'metamphetamine' => $this->input->post('metamphetamine'),
                'marijuana' => $this->input->post('marijuana'),
                'tanda_narkoba' => $this->input->post('tanda_narkoba'),
                
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'bebas_narkoba');
        }

        $data = $this->db->query("SELECT * from bebas_narkoba s, mcu m where s.id_mcu = m.id_mcu and s.id_mcu = '$id'")->row();
        $this->load->view('mcu_print/cetak_bebas_narkoba', $data);
    }
    public function pemeriksaan_fisik($id_mcu)
    {
        $this->load->view('assets/_header');
        $page_data['data_dokter'] = $this->M_mcu->selectNamaDokter();
        $page_data['data_mcu'] = $this->M_mcu->getMCUById($id_mcu);
        $this->load->view('page_content/Pemeriksaan_Fisik', $page_data);
        $this->load->view('assets/_footer');
    }
    
    public function form_pemeriksa($id_mcu)
    {
        $this->load->view('assets/_header');

        $page_data['data_mcu'] = $this->M_mcu->getMCUById($id_mcu);
        $page_data['data_penyakit'] = $this->M_mcu->getPYKById($id_mcu);
        $page_data['data_kandungan'] = $this->M_mcu->getKDGById($id_mcu);
        $page_data['data_EKG'] = $this->M_mcu->getEkgById($id_mcu);
        $page_data['data_bpjantung'] = $this->M_mcu->getJANById($id_mcu);
        $page_data['data_bpgigi'] = $this->M_mcu->getGIGIById($id_mcu);
        $page_data['data_doktersb'] = $this->M_mcu->getDKTRById($id_mcu);
        $page_data['data_pneurologi'] = $this->M_mcu->getNeuById($id_mcu);
        $page_data['data_spirometri'] = $this->M_mcu->getSpriById($id_mcu);
        $page_data['data_bpparu'] = $this->M_mcu->getPARUById($id_mcu);
        $page_data['data_bprehab'] = $this->M_mcu->getREHABById($id_mcu);
		$page_data['gambar'] = base_url("assets/dist/img/gambar.png");
        
        // $page_data['data_mcu'] = $this->M_mcu->getMCUById($id_mcu);
        // $page_data['data_penyakit'] = $this->M_mcu->getPYKById($id_mcu);
        // $page_data['data_kandungan'] = $this->M_mcu->getKDGById($id_mcu);
        // $page_data['data_EKG'] = $this->M_mcu->getEkgById($id_mcu);
        // $page_data['data_bpjantung'] = $this->M_mcu->getJANById($id_mcu);
        // $page_data['data_doktersb'] = $this->M_mcu->getDKTRById($id_mcu);
        // $page_data['data_pneurologi'] = $this->M_mcu->getNeuById($id_mcu);
        // $page_data['data_spirometri'] = $this->M_mcu->getSpriById($id_mcu);

       
        $page_data['page_content']='page_content/form_periksa';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function form_pemeriksaan($form)
    {
        $view_path = 'pemeriksaan_mcu/' . $form;
        $response = $this->load->view($view_path, [], true); // Tambahkan parameter ketiga 'true'
        echo $response;
    }
   public function simpan_pemeriksaan_fisik()
    {
        // $data = $this->session->userdata('data_auth');
        $staff = $this->session->userdata('data_auth');
        // $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from antropometri where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'berat_badan' => $this->input->post('berat_badan'),
                'tinggi_badan' => $this->input->post('tinggi_badan'),
                'lingkar_pinggang' => $this->input->post('lingkar_pinggang'),
                'lingkar_panggul' => $this->input->post('lingkar_panggul'),
                'imt' => $this->input->post('imt'),
                'rpp' => $this->input->post('rpp'),
                'suhu' => $this->input->post('suhu'),
                'nadi' => $this->input->post('nadi'),
                'irama' => $this->input->post('irama'),
                'isi_nadi' => $this->input->post('isi_nadi'),
                'pernapasan' => $this->input->post('pernapasan'),
                'irama_nafas' => $this->input->post('irama_nafas'),
                'sistol' => $this->input->post('sistol'),
                'diastol' => $this->input->post('diastol'),
                'nadi_1' => $this->input->post('nadi_1'),
                'nadi_2' => $this->input->post('nadi_2'),
                'nadi_3' => $this->input->post('nadi_3'),
                'skor_step' => $this->input->post('skor_step'),
                'tes_kebugaran' => $this->input->post('tes_kebugaran'),
                'menit_tes_bugar' => $this->input->post('menit_tes_bugar'),
                'detik_tes_bugar' => $this->input->post('detik_tes_bugar'),
                'nadi_tes_bugar' => $this->input->post('nadi_tes_bugar'),
                'vo2max' => $this->input->post('vo2max'),
                'kesimpulan_fit' => $this->input->post('kesimpulan_fit'),
                'ap_kanan' => $this->input->post('ap_kanan'),
                'ap_kiri' => $this->input->post('ap_kiri'),
                'dp_kanan' => $this->input->post('dp_kanan'),
                'dp_kiri' => $this->input->post('dp_kiri'),
                'tp_kanan' => $this->input->post('tp_kanan'),
                'tp_kiri' => $this->input->post('tp_kiri'),
                'skor_angkle_kanan' => $this->input->post('skor_angkle_kanan'),
                'skor_angkle_kiri' => $this->input->post('skor_angkle_kiri'),
                'kesimpulan' => $this->input->post('kesimpulan'),
                'kesimpulan_umum' => $this->input->post('kesimpulan_umum'),
                'tgl' => date("Y-m-d H:i:s"), 
                'staff' => $staff->id_staff,
            ];
            $this->M_mcu->insert_tindakan($db, 'antropometri');
        } else {
            $db = [
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'berat_badan' => $this->input->post('berat_badan'),
                'tinggi_badan' => $this->input->post('tinggi_badan'),
                'lingkar_pinggang' => $this->input->post('lingkar_pinggang'),
                'lingkar_panggul' => $this->input->post('lingkar_panggul'),
                'imt' => $this->input->post('imt'),
                'rpp' => $this->input->post('rpp'),
                'suhu' => $this->input->post('suhu'),
                'nadi' => $this->input->post('nadi'),
                'irama' => $this->input->post('irama'),
                'isi_nadi' => $this->input->post('isi_nadi'),
                'pernapasan' => $this->input->post('pernapasan'),
                'irama_nafas' => $this->input->post('irama_nafas'),
                'sistol' => $this->input->post('sistol'),
                'diastol' => $this->input->post('diastol'),
                'nadi_1' => $this->input->post('nadi_1'),
                'nadi_2' => $this->input->post('nadi_2'),
                'nadi_3' => $this->input->post('nadi_3'),
                'skor_step' => $this->input->post('skor_step'),
                'tes_kebugaran' => $this->input->post('tes_kebugaran'),
                'menit_tes_bugar' => $this->input->post('menit_tes_bugar'),
                'detik_tes_bugar' => $this->input->post('detik_tes_bugar'),
                'nadi_tes_bugar' => $this->input->post('nadi_tes_bugar'),
                'vo2max' => $this->input->post('vo2max'),
                'kesimpulan_fit' => $this->input->post('kesimpulan_fit'),
                'ap_kanan' => $this->input->post('ap_kanan'),
                'ap_kiri' => $this->input->post('ap_kiri'),
                'dp_kanan' => $this->input->post('dp_kanan'),
                'dp_kiri' => $this->input->post('dp_kiri'),
                'tp_kanan' => $this->input->post('tp_kanan'),
                'tp_kiri' => $this->input->post('tp_kiri'),
                'skor_angkle_kanan' => $this->input->post('skor_angkle_kanan'),
                'skor_angkle_kiri' => $this->input->post('skor_angkle_kiri'),
                'kesimpulan' => $this->input->post('kesimpulan'),
                'kesimpulan_umum' => $this->input->post('kesimpulan_umum'),
                'tgl' => date("Y-m-d H:i:s"), 
                'staff' => $staff->id_staff,
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'antropometri');
        }

        // $data = $this->db->query("SELECT * from antropometri s, mcu m where s.id_mcu = m.id_mcu and s.id_mcu = '$id'")->row();
        // $response = $this->load->view('mcu_print/cetak_pemeriksaan_fisik', $data,TRUE);
        // echo $response;
        echo json_encode(['status'=>'success']);
        
    }

    public function cetak_bagian_paru()
    {
        $data = $this->session->userdata('data_auth');
		$staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from penyakit_paru where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_pparu' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'anamnesis' => $this->input->post('anamnesis'),
                'pemeriksaan_fisik' => $this->input->post('pemeriksaan_fisik'),
                'inspeksi' => $this->input->post('inspeksi'),
                'palapasi' => $this->input->post('palapasi'),
                'perkusi' => $this->input->post('perkusi'),
                'aukultasi' => $this->input->post('aukultasi'),
                'penunjang' => $this->input->post('penunjang'),
                'kesan' => $this->input->post('kesan'),
                'saran' => $this->input->post('saran'),
                'tgl_periksad' => $this->input->post('tgl_periksad'),
                'staff' => $staff,
                
            ];
            $this->M_mcu->insert_tindakan($db, 'penyakit_paru');
        } else {
            $db = [
                'anamnesis' => $this->input->post('anamnesis'),
                'pemeriksaan_fisik' => $this->input->post('pemeriksaan_fisik'),
                'inspeksi' => $this->input->post('inspeksi'),
                'palapasi' => $this->input->post('palapasi'),
                'perkusi' => $this->input->post('perkusi'),
                'aukultasi' => $this->input->post('aukultasi'),
                'penunjang' => $this->input->post('penunjang'),
                'kesan' => $this->input->post('kesan'),
                'saran' => $this->input->post('saran'),
                'tgl_periksad' => $this->input->post('tgl_periksad'),
                'staff' => $staff,
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'penyakit_paru');
        }

        $page_data = $this->db->query("SELECT * from penyakit_paru pd, mcu m where pd.id_mcu = m.id_mcu and pd.id_mcu = '$id'")->row();
        $response = $this->load->view('mcu_print/cetak_bagian_paru', $page_data,TRUE);
        echo $response;
    }

    public function cetak_bagian_gigi()
    {
        $img = $this->input->post('gambar_gigi');
		if ($img != "") {
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			$file = "assets/images/" . uniqid(time(), true) . ".png";
			$success = file_put_contents($file, $data);
		} else {
			$file = "";
		}
        
        $data = $this->session->userdata('data_auth');
		$staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from periksa_gigi where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_pgigi' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'pemeriksaan_kebersihan' => $this->input->post('pemeriksaan_kebersihan'),
                'gambar_gigi' => $file,
                'lain_lain_gigi' => $this->input->post('lain_lain_gigi'),
                'kesimpulan_gigi' => $this->input->post('kesimpulan_gigi'),
                'tgl_periksaG' => $this->input->post('tgl_periksaG'),
                'staff' => $staff,
                
            ];
            $this->M_mcu->insert_tindakan($db, 'periksa_gigi');
        } else {
            $db = [
                'pemeriksaan_kebersihan' => $this->input->post('pemeriksaan_kebersihan'),
                'gambar_gigi' => $file,
                'lain_lain_gigi' => $this->input->post('lain_lain_gigi'),
                'kesimpulan_gigi' => $this->input->post('kesimpulan_gigi'),
                'tgl_periksaG' => $this->input->post('tgl_periksaG'),
                'staff' => $staff,
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'periksa_gigi');
        }
        $page_data = $this->db->query("SELECT * from periksa_gigi pd, mcu m where pd.id_mcu = m.id_mcu and pd.id_mcu = '$id'")->row();
        $response = $this->load->view('mcu_print/cetak_bagian_gigi', $page_data,TRUE);
        echo $response;
    }

    public function cetak_periksa_ekg()
    {
        $data = $this->session->userdata('data_auth');
		$staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from periksa_ekg where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_ekg' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'rithme' => $this->input->post('rithme'),
                'pathologis	' => $this->input->post('pathologis	'),
                'depresi' => $this->input->post('depresi'),
                'inverted' => $this->input->post('inverted'),
                'saran' => $this->input->post('saran'),
                'tgl_periksa' => $this->input->post('tgl_periksa'),
                'staff' => $staff,
                
            ];
            $this->M_mcu->insert_tindakan($db, 'periksa_ekg');
        } else {
            $db = [
                'rithme' => $this->input->post('rithme'),
                'pathologis	' => $this->input->post('pathologis'),
                'depresi' => $this->input->post('depresi'),
                'inverted' => $this->input->post('inverted'),
                'diagnosa' => $this->input->post('diagnosa'),
                'saran' => $this->input->post('saran'),
                'tgl_periksa' => $this->input->post('tgl_periksa'),
                'staff' => $staff,
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'periksa_ekg');
        }

        $page_data = $this->db->query("SELECT * from periksa_ekg pd, mcu m where pd.id_mcu = m.id_mcu and pd.id_mcu = '$id'")->row();
        $response = $this->load->view('mcu_print/cetak_surat_ekg', $page_data,TRUE);
        echo $response;
        // $this->load->view('mcu_print/cetak_periksa_kandungan', $data);
    }
    public function cetak_bagian_spirometri()
    {
        $data = $this->session->userdata('data_auth');
		$staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from periksa_spirometri where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_periksa' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'pihak' => $this->input->post('pihak'),
                'kesimpulan' => $this->input->post('kesimpulan'),
                'saran' => $this->input->post('saran'),
                'tgl_periksa' => $this->input->post('tgl_periksa'),
                'tgl_sekarang' => $this->input->post('tgl_sekarang'),
                'staff' => $staff,
                
            ];
            $this->M_mcu->insert_tindakan($db, 'periksa_spirometri');
        } else {
            $db = [
                'pihak' => $this->input->post('pihak'),
                'kesimpulan' => $this->input->post('kesimpulan'),
                'saran' => $this->input->post('saran'),
                'tgl_periksa' => $this->input->post('tgl_periksa'),
                'tgl_sekarang' => $this->input->post('tgl_sekarang'),
                'staff' => $staff,
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'periksa_spirometri');
        }

        $page_data = $this->db->query("SELECT * from periksa_spirometri pd, mcu m where pd.id_mcu = m.id_mcu and pd.id_mcu = '$id'")->row();
        $response = $this->load->view('mcu_print/cetak_surat_spirometri', $page_data,TRUE);
        echo $response;
    }
    public function cetak_penyakit_dalam()
    {
        $data = $this->session->userdata('data_auth');
		$staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from penyakit_dalam where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_periksa' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'anamnesis' => $this->input->post('anamnesis'),
                'per_fisik' => $this->input->post('per_fisik'),
                'penunjang' => $this->input->post('penunjang'),
                'kesan' => $this->input->post('kesan'),
                'saran' => $this->input->post('saran'),
                'tgl_periksad' => $this->input->post('tgl_periksad'),
                'staff' => $staff,
                
            ];
            $this->M_mcu->insert_tindakan($db, 'penyakit_dalam');
        } else {
            $db = [
                'anamnesis' => $this->input->post('anamnesis'),
                'per_fisik' => $this->input->post('per_fisik'),
                'penunjang' => $this->input->post('penunjang'),
                'kesan' => $this->input->post('kesan'),
                'saran' => $this->input->post('saran'),
                'tgl_periksad' => $this->input->post('tgl_periksad'),
                'staff' => $staff,
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'penyakit_dalam');
        }

        $page_data = $this->db->query("SELECT * from penyakit_dalam pd, mcu m where pd.id_mcu = m.id_mcu and pd.id_mcu = '$id'")->row();
        $response = $this->load->view('mcu_print/cetak_penyakit_dalam', $page_data,TRUE);
        echo $response;
    }

    public function cetak_periksa_kandungan()
    {
        $data = $this->session->userdata('data_auth');
		$staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from periksa_kandungan where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_periksa' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'anamnesa' => $this->input->post('anamnesa'),
                'per_gyne' => $this->input->post('per_gyne'),
                'penunjang' => $this->input->post('penunjang'),
                'kesan' => $this->input->post('kesan'),
                'saran' => $this->input->post('saran'),
                'tgl_periksa' => $this->input->post('tgl_periksa'),
                'staff' => $staff,
                
            ];
            $this->M_mcu->insert_tindakan($db, 'periksa_kandungan');
        } else {
            $db = [
                'anamnesa' => $this->input->post('anamnesa'),
                'per_gyne' => $this->input->post('per_gyne'),
                'penunjang' => $this->input->post('penunjang'),
                'kesan' => $this->input->post('kesan'),
                'saran' => $this->input->post('saran'),
                'tgl_periksa' => $this->input->post('tgl_periksa'),
                'staff' => $staff,
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'periksa_kandungan');
        }

        $page_data = $this->db->query("SELECT * from periksa_kandungan pd, mcu m where pd.id_mcu = m.id_mcu and pd.id_mcu = '$id'")->row();
        $response = $this->load->view('mcu_print/cetak_periksa_kandungan', $page_data,TRUE);
        echo $response;
        // $this->load->view('mcu_print/cetak_periksa_kandungan', $data);
    }

    public function cetak_bagian_jantung()
    {
        $data = $this->session->userdata('data_auth');
		$staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from penyakit_jantung where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_pjantung' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'anamnesis' => $this->input->post('anamnesis'),
                'pemeriksaan_fisik' => $this->input->post('pemeriksaan_fisik'),
                'inspeksi' => $this->input->post('inspeksi'),
                'palapasi' => $this->input->post('palapasi'),
                'perkusi' => $this->input->post('perkusi'),
                'aukultasi' => $this->input->post('aukultasi'),
                'penunjang' => $this->input->post('penunjang'),
                'kesan' => $this->input->post('kesan'),
                'saran' => $this->input->post('saran'),
                'tgl_periksad' => $this->input->post('tgl_periksad'),
                'staff' => $staff,
                
            ];
            $this->M_mcu->insert_tindakan($db, 'penyakit_jantung');
        } else {
            $db = [
                'anamnesis' => $this->input->post('anamnesis'),
                'pemeriksaan_fisik' => $this->input->post('pemeriksaan_fisik'),
                'inspeksi' => $this->input->post('inspeksi'),
                'palapasi' => $this->input->post('palapasi'),
                'perkusi' => $this->input->post('perkusi'),
                'aukultasi' => $this->input->post('aukultasi'),
                'penunjang' => $this->input->post('penunjang'),
                'kesan' => $this->input->post('kesan'),
                'saran' => $this->input->post('saran'),
                'tgl_periksad' => $this->input->post('tgl_periksad'),
                'staff' => $staff,
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'penyakit_jantung');
        }

        $page_data = $this->db->query("SELECT * from penyakit_jantung pd, mcu m where pd.id_mcu = m.id_mcu and pd.id_mcu = '$id'")->row();
        $response = $this->load->view('mcu_print/cetak_bagian_jantung', $page_data,TRUE);
        echo $response;
    }
    
    // public function cetak_bagian_jantung()
    // {
    //     $data = $this->session->userdata('data_auth');
	// 	$staff = $data->id_staff;
    //     $id = $this->input->post('id_mcu');
    //     $mcu = $this->db->query("SELECT count(*) count from penyakit_jantung where id_mcu ='$id'")->row();
    //     if ($mcu->count == 0) {
    //         $db = [
    //             'id_pjantung' => uniqid(),
    //             'id_mcu' => $this->input->post('id_mcu'),
    //             'anamnesis' => $this->input->post('anamnesis'),
    //             'pemeriksaan_fisik' => $this->input->post('pemeriksaan_fisik'),
    //             'inspeksi' => $this->input->post('inspeksi'),
    //             'palapasi' => $this->input->post('palapasi'),
    //             'perkusi' => $this->input->post('perkusi'),
    //             'aukultasi' => $this->input->post('aukultasi'),
    //             'penunjang' => $this->input->post('penunjang'),
    //             'kesan' => $this->input->post('kesan'),
    //             'saran' => $this->input->post('saran'),
    //             'tgl_periksad' => $this->input->post('tgl_periksad'),
    //             'staff' => $staff,
                
    //         ];
    //         $this->M_mcu->insert_tindakan($db, 'penyakit_jantung');
    //     } else {
    //         $db = [
    //             'anamnesis' => $this->input->post('anamnesis'),
    //             'pemeriksaan_fisik' => $this->input->post('pemeriksaan_fisik'),
    //             'inspeksi' => $this->input->post('inspeksi'),
    //             'palapasi' => $this->input->post('palapasi'),
    //             'perkusi' => $this->input->post('perkusi'),
    //             'aukultasi' => $this->input->post('aukultasi'),
    //             'penunjang' => $this->input->post('penunjang'),
    //             'kesan' => $this->input->post('kesan'),
    //             'saran' => $this->input->post('saran'),
    //             'tgl_periksad' => $this->input->post('tgl_periksad'),
    //             'staff' => $staff,
    //         ];
    //         $where =['id_mcu' => $this->input->post('id_mcu')];
    //         $this->M_mcu->update($db,$where, 'penyakit_jantung');
    //     }

    //     $page_data = $this->db->query("SELECT * from penyakit_jantung pd, mcu m where pd.id_mcu = m.id_mcu and pd.id_mcu = '$id'")->row();
    //     $response = $this->load->view('mcu_print/cetak_bagian_jantung', $page_data,TRUE);
    //     echo $response;
    // }

    public function cetak_dokter_spesialis()
    {
        $data = $this->session->userdata('data_auth');
		$staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from dokterspesialis_bedah where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_dokters' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'hasil_rec' => $this->input->post('hasil_rec'),
                'tgl_periksad' => $this->input->post('tgl_periksad'),
                'staff' => $staff,
                
            ];
            $this->M_mcu->insert_tindakan($db, 'dokterspesialis_bedah');
        } else {
            $db = [
                'hasil_rec' => $this->input->post('hasil_rec'),
                'tgl_periksad' => $this->input->post('tgl_periksad'),
                'staff' => $staff,
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'dokterspesialis_bedah');
        }
        
        $page_data = $this->db->query("SELECT * from dokterspesialis_bedah pd, mcu m where pd.id_mcu = m.id_mcu and pd.id_mcu = '$id'")->row();
        $response = $this->load->view('mcu_print/cetak_dokter_spesialis', $page_data,TRUE);
        echo $response;
    }

    

    public function cetak_bagian_neurologi()
    {
        $data = $this->session->userdata('data_auth');
		$staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from pemeriksaan_neurologi where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_neurologi' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'motorik_neu' => $this->input->post('motorik_neu'),
                'sensorik_neu' => $this->input->post('sensorik_neu'),
                'koordinasi_neu' => $this->input->post('koordinasi_neu'),
                'reflek_fisiologis' => $this->input->post('reflek_fisiologis'),
                'reflek_patologis' => $this->input->post('reflek_patologis'),
                'fungsi_leher' => $this->input->post('fungsi_leher'),
                'keterangan_neu' => $this->input->post('keterangan_neu'),
                'kesan_neu' => $this->input->post('kesan_neu'),
                'tgl_periksad' => $this->input->post('tgl_periksad'),
                'staff' => $staff,
                
            ];
            $this->M_mcu->insert_tindakan($db, 'pemeriksaan_neurologi');
        } else {
            $db = [
                'motorik_neu' => $this->input->post('motorik_neu'),
                'sensorik_neu' => $this->input->post('sensorik_neu'),
                'koordinasi_neu' => $this->input->post('koordinasi_neu'),
                'reflek_fisiologis' => $this->input->post('reflek_fisiologis'),
                'reflek_patologis' => $this->input->post('reflek_patologis'),
                'fungsi_leher' => $this->input->post('fungsi_leher'),
                'keterangan_neu' => $this->input->post('keterangan_neu'),
                'kesan_neu' => $this->input->post('kesan_neu'),
                'tgl_periksad' => $this->input->post('tgl_periksad'),
                'staff' => $staff,
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'pemeriksaan_neurologi');
        }

        $page_data = $this->db->query("SELECT * from pemeriksaan_neurologi pd, mcu m where pd.id_mcu = m.id_mcu and pd.id_mcu = '$id'")->row();
        $response = $this->load->view('mcu_print/cetak_bagian_neurologi', $page_data,TRUE);
        echo $response;
    }

    public function cetak_bagian_rehab()
    {
        $data = $this->session->userdata('data_auth');
		$staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from rehab where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_prehab' => uniqid(),
                'id_mcu' => $this->input->post('id_mcu'),
                'anamnesis' => $this->input->post('anamnesis'),
                'pemeriksaan_fisik' => $this->input->post('pemeriksaan_fisik'),
                'status_lokasi' => $this->input->post('status_lokasi'), 
                'inspeksi' => $this->input->post('inspeksi'),
                'palapasi' => $this->input->post('palapasi'),
                'movement' => $this->input->post('movement'),
                'tes_provokasi' => $this->input->post('tes_provokasi'),
                'penunjang' => $this->input->post('penunjang'),
                'kesan' => $this->input->post('kesan'),
                'saran' => $this->input->post('saran'),
                'tgl_periksad' => $this->input->post('tgl_periksad'),
                'staff' => $staff,
                
            ];
            $this->M_mcu->insert_tindakan($db, 'rehab');
        } else {
            $db = [
                'anamnesis' => $this->input->post('anamnesis'),
                'pemeriksaan_fisik' => $this->input->post('pemeriksaan_fisik'),
                'status_lokasi' => $this->input->post('status_lokasi'), 
                'inspeksi' => $this->input->post('inspeksi'),
                'palapasi' => $this->input->post('palapasi'),
                'movement' => $this->input->post('movement'),
                'tes_provokasi' => $this->input->post('tes_provokasi'),
                'penunjang' => $this->input->post('penunjang'),
                'kesan' => $this->input->post('kesan'),
                'saran' => $this->input->post('saran'),
                'tgl_periksad' => $this->input->post('tgl_periksad'),
                'staff' => $staff,
            ];
            $where =['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db,$where, 'rehab');
        }

        $page_data = $this->db->query("SELECT * from rehab pd, mcu m where pd.id_mcu = m.id_mcu and pd.id_mcu = '$id'")->row();
        $response = $this->load->view('mcu_print/cetak_bagian_rehab', $page_data,TRUE);
        echo $response;
    }

    
}
