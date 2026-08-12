<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pemeriksaan_fisik_mcu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_mcu');
    }

    public function form_pemeriksa($id_mcu)
    {
        $this->load->view('assets/_header');

        $page_data['data_mcu'] = $this->M_mcu->getMCUById($id_mcu);
        $page_data['gambar'] = base_url("assets/dist/img/gambar.png");

        $page_data['page_content'] = 'page_content/form_periksa';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function form_pemeriksaan($form)
    {
        $page_data['gambar'] = base_url("assets/dist/img/gambar.png");

        $view_path = 'pemeriksaan_mcu/' . $form;
        $response = $this->load->view($view_path, [], true); // Tambahkan parameter ketiga 'true'
        echo $response;
    }

    public function cetak_keadaan_umum()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from keadaan_umum_mcu where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'keadaan_umum' => $this->input->post('keadaan_umum'),
                'kesadaran' => $this->input->post('kesadaran'),
                'gizi' => $this->input->post('gizi'),
                'sesak_nafas' => $this->input->post('sesak_nafas'),
                'cyanosis' => $this->input->post('cyanosis'),
                'kulit' => $this->input->post('kulit'),
                'kepala' => $this->input->post('kepala'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,

            ];
            $this->M_mcu->insert_tindakan($db, 'keadaan_umum_mcu');
        } else {
            $db = [
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'keadaan_umum' => $this->input->post('keadaan_umum'),
                'kesadaran' => $this->input->post('kesadaran'),
                'gizi' => $this->input->post('gizi'),
                'sesak_nafas' => $this->input->post('sesak_nafas'),
                'cyanosis' => $this->input->post('cyanosis'),
                'kulit' => $this->input->post('kulit'),
                'kepala' => $this->input->post('kepala'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];
            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'keadaan_umum_mcu');
        }

     
        $response['status'] = "success";
        echo json_encode($response);
    }

    public function cetak_mata()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from pemeriksaan_mata_mcu where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'sklera_kiri' => $this->input->post('sklera_kiri'),
                'sklera_kanan' => $this->input->post('sklera_kanan'),
                'tajam_kiri' => $this->input->post('tajam_kiri'),
                'tajam_kanan' => $this->input->post('tajam_kanan'),
                'bola_mata_kiri' => $this->input->post('bola_mata_kiri'),
                'bola_mata_kanan' => $this->input->post('bola_mata_kanan'),
                'konjungtive_kiri' => $this->input->post('konjungtive_kiri'),
                'konjungtive_kanan' => $this->input->post('konjungtive_kanan'),
                'kornea_kiri' => $this->input->post('kornea_kiri'),
                'kornea_kanan' => $this->input->post('kornea_kanan'),
                'iris_kiri' => $this->input->post('iris_kiri'),
                'iris_kanan' => $this->input->post('iris_kanan'),
                'pupil_kiri' => $this->input->post('pupil_kiri'),
                'pupil_kanan' => $this->input->post('pupil_kanan'),
                'lensa_kiri' => $this->input->post('lensa_kiri'),
                'lensa_kanan' => $this->input->post('lensa_kanan'),
                'lapang_pandang_kiri' => $this->input->post('lapang_pandang_kiri'),
                'lapang_pandang_kanan' => $this->input->post('lapang_pandang_kanan'),
                'kedalaman_penglihatan_kiri' => $this->input->post('kedalaman_penglihatan_kiri'),
                'kedalaman_penglihatan_kanan' => $this->input->post('kedalaman_penglihatan_kanan'),
                'jaeger_test_kiri' => $this->input->post('jaeger_test_kiri'),
                'jaeger_test_kanan' => $this->input->post('jaeger_test_kanan'),
                'buta_warna' => $this->input->post('buta_warna'),
                'lain_lain_kiri' => $this->input->post('lain_lain_kiri'),
                'lain_lain_kanan' => $this->input->post('lain_lain_kanan'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,

            ];
            $this->M_mcu->insert_tindakan($db, 'pemeriksaan_mata_mcu');
        } else {
            $db = [
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'sklera_kiri' => $this->input->post('sklera_kiri'),
                'sklera_kanan' => $this->input->post('sklera_kanan'),
                'tajam_kiri' => $this->input->post('tajam_kiri'),
                'tajam_kanan' => $this->input->post('tajam_kanan'),
                'bola_mata_kiri' => $this->input->post('bola_mata_kiri'),
                'bola_mata_kanan' => $this->input->post('bola_mata_kanan'),
                'konjungtive_kiri' => $this->input->post('konjungtive_kiri'),
                'konjungtive_kanan' => $this->input->post('konjungtive_kanan'),
                'kornea_kiri' => $this->input->post('kornea_kiri'),
                'kornea_kanan' => $this->input->post('kornea_kanan'),
                'iris_kiri' => $this->input->post('iris_kiri'),
                'iris_kanan' => $this->input->post('iris_kanan'),
                'pupil_kiri' => $this->input->post('pupil_kiri'),
                'pupil_kanan' => $this->input->post('pupil_kanan'),
                'lensa_kiri' => $this->input->post('lensa_kiri'),
                'lensa_kanan' => $this->input->post('lensa_kanan'),
                'lapang_pandang_kiri' => $this->input->post('lapang_pandang_kiri'),
                'lapang_pandang_kanan' => $this->input->post('lapang_pandang_kanan'),
                'kedalaman_penglihatan_kiri' => $this->input->post('kedalaman_penglihatan_kiri'),
                'kedalaman_penglihatan_kanan' => $this->input->post('kedalaman_penglihatan_kanan'),
                'jaeger_test_kiri' => $this->input->post('jaeger_test_kiri'),
                'jaeger_test_kanan' => $this->input->post('jaeger_test_kanan'),
                'buta_warna' => $this->input->post('buta_warna'),
                'lain_lain_kiri' => $this->input->post('lain_lain_kiri'),
                'lain_lain_kanan' => $this->input->post('lain_lain_kanan'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];
            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'pemeriksaan_mata_mcu');
        }

        
        $response['status'] = "success";
        echo json_encode($response);
    }

    public function cetak_tht()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from pemeriksaan_tht_mcu where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'telinga' => $this->input->post('telinga'),
                'hidung' => $this->input->post('hidung'),
                'gigi' => $this->input->post('gigi'),
                'mulut' => $this->input->post('mulut'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,

            ];
            $this->M_mcu->insert_tindakan($db, 'pemeriksaan_tht_mcu');
        } else {
            $db = [
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'telinga' => $this->input->post('telinga'),
                'hidung' => $this->input->post('hidung'),
                'gigi' => $this->input->post('gigi'),
                'mulut' => $this->input->post('mulut'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];
            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'pemeriksaan_tht_mcu');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function cetak_leher()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from pemeriksaan_leher_mcu where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'kelenjar_limfe' => $this->input->post('kelenjar_limfe'),
                'kelenjar_gondok' => $this->input->post('kelenjar_gondok'),
                'jvp' => $this->input->post('jvp'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,

            ];
            $this->M_mcu->insert_tindakan($db, 'pemeriksaan_leher_mcu');
        } else {
            $db = [
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'kelenjar_limfe' => $this->input->post('kelenjar_limfe'),
                'kelenjar_gondok' => $this->input->post('kelenjar_gondok'),
                'jvp' => $this->input->post('jvp'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];
            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'pemeriksaan_leher_mcu');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }
    public function cetak_dada()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from pemeriksaan_dada_mcu where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'bentuk' => $this->input->post('bentuk'),
                'pembuluh_darah_melebar' => $this->input->post('pembuluh_darah_melebar'),
                'buah_dada' => $this->input->post('buah_dada'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,

            ];
            $this->M_mcu->insert_tindakan($db, 'pemeriksaan_dada_mcu');
        } else {
            $db = [
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'bentuk' => $this->input->post('bentuk'),
                'pembuluh_darah_melebar' => $this->input->post('pembuluh_darah_melebar'),
                'buah_dada' => $this->input->post('buah_dada'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];
            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'pemeriksaan_dada_mcu');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function cetak_bagian_paru()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from penyakit_paru where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'suara_perkusi' => $this->input->post('suara_perkusi'),
                'rhonkhi' => $this->input->post('rhonkhi'),
                'wheezing' => $this->input->post('wheezing'),
                'krepitas' => $this->input->post('krepitas'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),

            ];
            $this->M_mcu->insert_tindakan($db, 'penyakit_paru');
        } else {
            $db = [
                'suara_perkusi' => $this->input->post('suara_perkusi'),
                'rhonkhi' => $this->input->post('rhonkhi'),
                'wheezing' => $this->input->post('wheezing'),
                'krepitas' => $this->input->post('krepitas'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'tgl_input' => date('Y-m-d H:i:s'),

            ];
            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'penyakit_paru');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function cetak_rongga_perut()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from rongga_perut_mcu where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'bentuk' => $this->input->post('Bentuk'),
                'hati' => $this->input->post('hati'),
                'limpa' => $this->input->post('limpa'),
                'asites' => $this->input->post('asites'),
                'vena_melebar' => $this->input->post('vena_melebar'),
                'peristaltik_usus' => $this->input->post('peristaltik_usus'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),

            ];
            $this->M_mcu->insert_tindakan($db, 'rongga_perut_mcu');
        } else {
            $db = [
                'bentuk' => $this->input->post('Bentuk'),
                'hati' => $this->input->post('hati'),
                'limpa' => $this->input->post('limpa'),
                'asites' => $this->input->post('asites'),
                'vena_melebar' => $this->input->post('vena_melebar'),
                'peristaltik_usus' => $this->input->post('peristaltik_usus'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'tgl_input' => date('Y-m-d H:i:s'),

            ];
            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'rongga_perut_mcu');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function cetak_urogenital()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from urogenital_mcu where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'hemoroid' => $this->input->post('hemoroid'),
                'nyeri_ketok_cva' => $this->input->post('nyeri_ketok_cva'),
                'kelenjar_getah_bening' => $this->input->post('kelenjar_getah_bening'),
                'alat_kelamin' => $this->input->post('alat_kelamin'),
                'hernia' => $this->input->post('hernia'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),

            ];
            $this->M_mcu->insert_tindakan($db, 'urogenital_mcu');
        } else {
            $db = [
                'hemoroid' => $this->input->post('hemoroid'),
                'nyeri_ketok_cva' => $this->input->post('nyeri_ketok_cva'),
                'kelenjar_getah_bening' => $this->input->post('kelenjar_getah_bening'),
                'alat_kelamin' => $this->input->post('alat_kelamin'),
                'hernia' => $this->input->post('hernia'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'tgl_input' => date('Y-m-d H:i:s'),

            ];
            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'urogenital_mcu');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function cetak_anggota_gerak()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from anggota_gerak_mcu where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'kekuatan' => $this->input->post('kekuatan'),
                'refleks_fisiologis' => $this->input->post('refleks_fisiologis'),
                'refleks_patologis' => $this->input->post('refleks_patologis'),
                'tremor' => $this->input->post('tremor'),
                'motorik_kasar' => $this->input->post('motorik_kasar'),
                'motorik_halus' => $this->input->post('motorik_halus'),
                'varices' => $this->input->post('varices'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),

            ];
            $this->M_mcu->insert_tindakan($db, 'anggota_gerak_mcu');
        } else {
            $db = [
                'kekuatan' => $this->input->post('kekuatan'),
                'refleks_fisiologis' => $this->input->post('refleks_fisiologis'),
                'refleks_patologis' => $this->input->post('refleks_patologis'),
                'tremor' => $this->input->post('tremor'),
                'motorik_kasar' => $this->input->post('motorik_kasar'),
                'motorik_halus' => $this->input->post('motorik_halus'),
                'varices' => $this->input->post('varices'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'tgl_input' => date('Y-m-d H:i:s'),

            ];
            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'anggota_gerak_mcu');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }




    public function cetak_bagian_jantung()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from penyakit_jantung where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'irama' => $this->input->post('irama'),
                'bunyi_jantung' => $this->input->post('bunyi_jantung'),
                'heart_rate' => $this->input->post('heart_rate'),
                'bising' => $this->input->post('bising'),
                'galop' => $this->input->post('galop'),
                'besar_jantung' => $this->input->post('besar_jantung'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),
            ];
            $this->M_mcu->insert_tindakan($db, 'penyakit_jantung');
        } else {
            $db = [
                'irama' => $this->input->post('irama'),
                'bunyi_jantung' => $this->input->post('bunyi_jantung'),
                'heart_rate' => $this->input->post('heart_rate'),
                'bising' => $this->input->post('bising'),
                'galop' => $this->input->post('galop'),
                'besar_jantung' => $this->input->post('besar_jantung'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'tgl_input' => date('Y-m-d H:i:s'),
            ];
            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'penyakit_jantung');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }


    public function cetak_bagian_neurologi()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from pemeriksaan_neurologi where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'sensibilitas' => $this->input->post('sensibilitas'),
                'romberg' => $this->input->post('romberg'),
                'tinnel' => $this->input->post('tinnel'),
                'phalen' => $this->input->post('phalen'),
                'laseque' => $this->input->post('laseque'),
                'patrick' => $this->input->post('patrick'),
                'finkelstein' => $this->input->post('finkelstein'),
                'muskuloskeletal' => $this->input->post('muskuloskeletal'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),

            ];
            $this->M_mcu->insert_tindakan($db, 'pemeriksaan_neurologi');
        } else {
            $db = [
                'sensibilitas' => $this->input->post('sensibilitas'),
                'romberg' => $this->input->post('romberg'),
                'tinnel' => $this->input->post('tinnel'),
                'phalen' => $this->input->post('phalen'),
                'laseque' => $this->input->post('laseque'),
                'patrick' => $this->input->post('patrick'),
                'finkelstein' => $this->input->post('finkelstein'),
                'muskuloskeletal' => $this->input->post('muskuloskeletal'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'tgl_input' => date('Y-m-d H:i:s'),
            ];
            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'pemeriksaan_neurologi');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function get_data_pemeriksaan()
	{
		$id = $this->input->post('id');
		$table = $this->input->post('table');
		$db = $this->db->get_where($table, ['id_mcu' => $id])->result();
		if (count($db) > 0) {
			$db = $db[0];
			$db->status_dt = 'found';
		} else {
			$db = null;
			$db['status_dt'] = 'not found';
		}
		echo json_encode($db);
	}
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pemeriksaan_fisik_mcu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_mcu');
    }

    public function form_pemeriksa($id_mcu)
    {
        $this->load->view('assets/_header');

        $page_data['data_mcu'] = $this->M_mcu->getMCUById($id_mcu);
        $page_data['gambar'] = base_url("assets/dist/img/gambar.png");

        $page_data['page_content'] = 'page_content/form_periksa';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function form_pemeriksaan($form)
    {
        $page_data['gambar'] = base_url("assets/dist/img/gambar.png");

        $view_path = 'pemeriksaan_mcu/' . $form;
        $response = $this->load->view($view_path, [], true); // Tambahkan parameter ketiga 'true'
        echo $response;
    }

    public function cetak_keadaan_umum()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from keadaan_umum_mcu where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'keadaan_umum' => $this->input->post('keadaan_umum'),
                'kesadaran' => $this->input->post('kesadaran'),
                'gizi' => $this->input->post('gizi'),
                'sesak_nafas' => $this->input->post('sesak_nafas'),
                'cyanosis' => $this->input->post('cyanosis'),
                'kulit' => $this->input->post('kulit'),
                'kepala' => $this->input->post('kepala'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,

            ];
            $this->M_mcu->insert_tindakan($db, 'keadaan_umum_mcu');
        } else {
            $db = [
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'keadaan_umum' => $this->input->post('keadaan_umum'),
                'kesadaran' => $this->input->post('kesadaran'),
                'gizi' => $this->input->post('gizi'),
                'sesak_nafas' => $this->input->post('sesak_nafas'),
                'cyanosis' => $this->input->post('cyanosis'),
                'kulit' => $this->input->post('kulit'),
                'kepala' => $this->input->post('kepala'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];
            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'keadaan_umum_mcu');
        }

     
        $response['status'] = "success";
        echo json_encode($response);
    }

    public function cetak_mata()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from pemeriksaan_mata_mcu where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'sklera_kiri' => $this->input->post('sklera_kiri'),
                'sklera_kanan' => $this->input->post('sklera_kanan'),
                'tajam_kiri' => $this->input->post('tajam_kiri'),
                'tajam_kanan' => $this->input->post('tajam_kanan'),
                'bola_mata_kiri' => $this->input->post('bola_mata_kiri'),
                'bola_mata_kanan' => $this->input->post('bola_mata_kanan'),
                'konjungtive_kiri' => $this->input->post('konjungtive_kiri'),
                'konjungtive_kanan' => $this->input->post('konjungtive_kanan'),
                'kornea_kiri' => $this->input->post('kornea_kiri'),
                'kornea_kanan' => $this->input->post('kornea_kanan'),
                'iris_kiri' => $this->input->post('iris_kiri'),
                'iris_kanan' => $this->input->post('iris_kanan'),
                'pupil_kiri' => $this->input->post('pupil_kiri'),
                'pupil_kanan' => $this->input->post('pupil_kanan'),
                'lensa_kiri' => $this->input->post('lensa_kiri'),
                'lensa_kanan' => $this->input->post('lensa_kanan'),
                'lapang_pandang_kiri' => $this->input->post('lapang_pandang_kiri'),
                'lapang_pandang_kanan' => $this->input->post('lapang_pandang_kanan'),
                'kedalaman_penglihatan_kiri' => $this->input->post('kedalaman_penglihatan_kiri'),
                'kedalaman_penglihatan_kanan' => $this->input->post('kedalaman_penglihatan_kanan'),
                'jaeger_test_kiri' => $this->input->post('jaeger_test_kiri'),
                'jaeger_test_kanan' => $this->input->post('jaeger_test_kanan'),
                'buta_warna' => $this->input->post('buta_warna'),
                'lain_lain_kiri' => $this->input->post('lain_lain_kiri'),
                'lain_lain_kanan' => $this->input->post('lain_lain_kanan'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,

            ];
            $this->M_mcu->insert_tindakan($db, 'pemeriksaan_mata_mcu');
        } else {
            $db = [
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'sklera_kiri' => $this->input->post('sklera_kiri'),
                'sklera_kanan' => $this->input->post('sklera_kanan'),
                'tajam_kiri' => $this->input->post('tajam_kiri'),
                'tajam_kanan' => $this->input->post('tajam_kanan'),
                'bola_mata_kiri' => $this->input->post('bola_mata_kiri'),
                'bola_mata_kanan' => $this->input->post('bola_mata_kanan'),
                'konjungtive_kiri' => $this->input->post('konjungtive_kiri'),
                'konjungtive_kanan' => $this->input->post('konjungtive_kanan'),
                'kornea_kiri' => $this->input->post('kornea_kiri'),
                'kornea_kanan' => $this->input->post('kornea_kanan'),
                'iris_kiri' => $this->input->post('iris_kiri'),
                'iris_kanan' => $this->input->post('iris_kanan'),
                'pupil_kiri' => $this->input->post('pupil_kiri'),
                'pupil_kanan' => $this->input->post('pupil_kanan'),
                'lensa_kiri' => $this->input->post('lensa_kiri'),
                'lensa_kanan' => $this->input->post('lensa_kanan'),
                'lapang_pandang_kiri' => $this->input->post('lapang_pandang_kiri'),
                'lapang_pandang_kanan' => $this->input->post('lapang_pandang_kanan'),
                'kedalaman_penglihatan_kiri' => $this->input->post('kedalaman_penglihatan_kiri'),
                'kedalaman_penglihatan_kanan' => $this->input->post('kedalaman_penglihatan_kanan'),
                'jaeger_test_kiri' => $this->input->post('jaeger_test_kiri'),
                'jaeger_test_kanan' => $this->input->post('jaeger_test_kanan'),
                'buta_warna' => $this->input->post('buta_warna'),
                'lain_lain_kiri' => $this->input->post('lain_lain_kiri'),
                'lain_lain_kanan' => $this->input->post('lain_lain_kanan'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];
            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'pemeriksaan_mata_mcu');
        }

        
        $response['status'] = "success";
        echo json_encode($response);
    }

    public function cetak_tht()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from pemeriksaan_tht_mcu where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'telinga' => $this->input->post('telinga'),
                'hidung' => $this->input->post('hidung'),
                'gigi' => $this->input->post('gigi'),
                'mulut' => $this->input->post('mulut'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,

            ];
            $this->M_mcu->insert_tindakan($db, 'pemeriksaan_tht_mcu');
        } else {
            $db = [
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'telinga' => $this->input->post('telinga'),
                'hidung' => $this->input->post('hidung'),
                'gigi' => $this->input->post('gigi'),
                'mulut' => $this->input->post('mulut'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];
            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'pemeriksaan_tht_mcu');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function cetak_leher()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from pemeriksaan_leher_mcu where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'kelenjar_limfe' => $this->input->post('kelenjar_limfe'),
                'kelenjar_gondok' => $this->input->post('kelenjar_gondok'),
                'jvp' => $this->input->post('jvp'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,

            ];
            $this->M_mcu->insert_tindakan($db, 'pemeriksaan_leher_mcu');
        } else {
            $db = [
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'kelenjar_limfe' => $this->input->post('kelenjar_limfe'),
                'kelenjar_gondok' => $this->input->post('kelenjar_gondok'),
                'jvp' => $this->input->post('jvp'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];
            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'pemeriksaan_leher_mcu');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }
    public function cetak_dada()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from pemeriksaan_dada_mcu where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'bentuk' => $this->input->post('bentuk'),
                'pembuluh_darah_melebar' => $this->input->post('pembuluh_darah_melebar'),
                'buah_dada' => $this->input->post('buah_dada'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,

            ];
            $this->M_mcu->insert_tindakan($db, 'pemeriksaan_dada_mcu');
        } else {
            $db = [
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'bentuk' => $this->input->post('bentuk'),
                'pembuluh_darah_melebar' => $this->input->post('pembuluh_darah_melebar'),
                'buah_dada' => $this->input->post('buah_dada'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];
            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'pemeriksaan_dada_mcu');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function cetak_bagian_paru()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from penyakit_paru where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'suara_perkusi' => $this->input->post('suara_perkusi'),
                'rhonkhi' => $this->input->post('rhonkhi'),
                'wheezing' => $this->input->post('wheezing'),
                'krepitas' => $this->input->post('krepitas'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),

            ];
            $this->M_mcu->insert_tindakan($db, 'penyakit_paru');
        } else {
            $db = [
                'suara_perkusi' => $this->input->post('suara_perkusi'),
                'rhonkhi' => $this->input->post('rhonkhi'),
                'wheezing' => $this->input->post('wheezing'),
                'krepitas' => $this->input->post('krepitas'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'tgl_input' => date('Y-m-d H:i:s'),

            ];
            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'penyakit_paru');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function cetak_rongga_perut()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from rongga_perut_mcu where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'bentuk' => $this->input->post('Bentuk'),
                'hati' => $this->input->post('hati'),
                'limpa' => $this->input->post('limpa'),
                'asites' => $this->input->post('asites'),
                'vena_melebar' => $this->input->post('vena_melebar'),
                'peristaltik_usus' => $this->input->post('peristaltik_usus'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),

            ];
            $this->M_mcu->insert_tindakan($db, 'rongga_perut_mcu');
        } else {
            $db = [
                'bentuk' => $this->input->post('Bentuk'),
                'hati' => $this->input->post('hati'),
                'limpa' => $this->input->post('limpa'),
                'asites' => $this->input->post('asites'),
                'vena_melebar' => $this->input->post('vena_melebar'),
                'peristaltik_usus' => $this->input->post('peristaltik_usus'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'tgl_input' => date('Y-m-d H:i:s'),

            ];
            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'rongga_perut_mcu');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function cetak_urogenital()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from urogenital_mcu where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'hemoroid' => $this->input->post('hemoroid'),
                'nyeri_ketok_cva' => $this->input->post('nyeri_ketok_cva'),
                'kelenjar_getah_bening' => $this->input->post('kelenjar_getah_bening'),
                'alat_kelamin' => $this->input->post('alat_kelamin'),
                'hernia' => $this->input->post('hernia'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),

            ];
            $this->M_mcu->insert_tindakan($db, 'urogenital_mcu');
        } else {
            $db = [
                'hemoroid' => $this->input->post('hemoroid'),
                'nyeri_ketok_cva' => $this->input->post('nyeri_ketok_cva'),
                'kelenjar_getah_bening' => $this->input->post('kelenjar_getah_bening'),
                'alat_kelamin' => $this->input->post('alat_kelamin'),
                'hernia' => $this->input->post('hernia'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'tgl_input' => date('Y-m-d H:i:s'),

            ];
            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'urogenital_mcu');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function cetak_anggota_gerak()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from anggota_gerak_mcu where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'kekuatan' => $this->input->post('kekuatan'),
                'refleks_fisiologis' => $this->input->post('refleks_fisiologis'),
                'refleks_patologis' => $this->input->post('refleks_patologis'),
                'tremor' => $this->input->post('tremor'),
                'motorik_kasar' => $this->input->post('motorik_kasar'),
                'motorik_halus' => $this->input->post('motorik_halus'),
                'varices' => $this->input->post('varices'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),

            ];
            $this->M_mcu->insert_tindakan($db, 'anggota_gerak_mcu');
        } else {
            $db = [
                'kekuatan' => $this->input->post('kekuatan'),
                'refleks_fisiologis' => $this->input->post('refleks_fisiologis'),
                'refleks_patologis' => $this->input->post('refleks_patologis'),
                'tremor' => $this->input->post('tremor'),
                'motorik_kasar' => $this->input->post('motorik_kasar'),
                'motorik_halus' => $this->input->post('motorik_halus'),
                'varices' => $this->input->post('varices'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'tgl_input' => date('Y-m-d H:i:s'),

            ];
            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'anggota_gerak_mcu');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }




    public function cetak_bagian_jantung()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from penyakit_jantung where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'irama' => $this->input->post('irama'),
                'bunyi_jantung' => $this->input->post('bunyi_jantung'),
                'heart_rate' => $this->input->post('heart_rate'),
                'bising' => $this->input->post('bising'),
                'galop' => $this->input->post('galop'),
                'besar_jantung' => $this->input->post('besar_jantung'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),
            ];
            $this->M_mcu->insert_tindakan($db, 'penyakit_jantung');
        } else {
            $db = [
                'irama' => $this->input->post('irama'),
                'bunyi_jantung' => $this->input->post('bunyi_jantung'),
                'heart_rate' => $this->input->post('heart_rate'),
                'bising' => $this->input->post('bising'),
                'galop' => $this->input->post('galop'),
                'besar_jantung' => $this->input->post('besar_jantung'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'tgl_input' => date('Y-m-d H:i:s'),
            ];
            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'penyakit_jantung');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }


    public function cetak_bagian_neurologi()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');
        $mcu = $this->db->query("SELECT count(*) count from pemeriksaan_neurologi where id_mcu ='$id'")->row();
        if ($mcu->count == 0) {
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'sensibilitas' => $this->input->post('sensibilitas'),
                'romberg' => $this->input->post('romberg'),
                'tinnel' => $this->input->post('tinnel'),
                'phalen' => $this->input->post('phalen'),
                'laseque' => $this->input->post('laseque'),
                'patrick' => $this->input->post('patrick'),
                'finkelstein' => $this->input->post('finkelstein'),
                'muskuloskeletal' => $this->input->post('muskuloskeletal'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),

            ];
            $this->M_mcu->insert_tindakan($db, 'pemeriksaan_neurologi');
        } else {
            $db = [
                'sensibilitas' => $this->input->post('sensibilitas'),
                'romberg' => $this->input->post('romberg'),
                'tinnel' => $this->input->post('tinnel'),
                'phalen' => $this->input->post('phalen'),
                'laseque' => $this->input->post('laseque'),
                'patrick' => $this->input->post('patrick'),
                'finkelstein' => $this->input->post('finkelstein'),
                'muskuloskeletal' => $this->input->post('muskuloskeletal'),
                'catatan' => $this->input->post('catatan'),
                'staff' => $staff,
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'tgl_input' => date('Y-m-d H:i:s'),
            ];
            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'pemeriksaan_neurologi');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function get_data_pemeriksaan()
	{
		$id = $this->input->post('id');
		$table = $this->input->post('table');
		$db = $this->db->get_where($table, ['id_mcu' => $id])->result();
		if (count($db) > 0) {
			$db = $db[0];
			$db->status_dt = 'found';
		} else {
			$db = null;
			$db['status_dt'] = 'not found';
		}
		echo json_encode($db);
	}
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
