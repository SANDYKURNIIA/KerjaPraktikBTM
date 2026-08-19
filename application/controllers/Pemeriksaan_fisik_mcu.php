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

    public function form_periksa_tambahan($jenis, $id_mcu)
    {
        $this->load->view('assets/_header');
        // $page_data['data_dokter'] = $this->M_mcu->selectNamaDokter();
        $page_data['data_mcu'] = $this->M_mcu->getMCUById($id_mcu);
        $page_data['page_content'] = 'modal_mcu/' . $jenis;
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function simpan_audiometri()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');

        $config['upload_path'] = './assets/upload_mcu/';
        $config['allowed_types'] = 'pdf|doc|docx|jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $this->load->library('upload', $config);

        $mcu = $this->db->query("SELECT * from audiometri_mcu where id_mcu ='$id'")->row();
        if (empty($mcu)) {
            $this->upload->do_upload('dokumen_periksa');

            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];

            $db = [
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'kelainan' => $this->input->post('kelainan'), // Asumsi input radio button dengan name 'kelainan'
                'telinga_kanan' => $this->input->post('telinga_kanan'), // Asumsi input radio button dengan name 'telinga_kanan'
                'telinga_kiri' => $this->input->post('telinga_kiri'), // Asumsi input radio button dengan name 'telinga_kiri'
                'kesimpulan' => $this->input->post('kesimpulan'), // Asumsi input radio button dengan name 'kesimpulan'
                'dokumen_periksa' => $file_name,
                'staff' => $staff,
                'id_mcu' => $id,

            ];
            $this->M_mcu->insert_tindakan($db, 'audiometri_mcu');
        } else {
            $file_path = './assets/upload_mcu/' . $mcu->dokumen_periksa;
            if (file_exists($file_path)) {
                unlink($file_path); // Hapus file
            }

            $this->upload->do_upload('dokumen_periksa');
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $db = [
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'kelainan' => $this->input->post('kelainan'), // Asumsi input radio button dengan name 'kelainan'
                'telinga_kanan' => $this->input->post('telinga_kanan'), // Asumsi input radio button dengan name 'telinga_kanan'
                'telinga_kiri' => $this->input->post('telinga_kiri'), // Asumsi input radio button dengan name 'telinga_kiri'
                'kesimpulan' => $this->input->post('kesimpulan'), // Asumsi input radio button dengan name 'kesimpulan'
                'dokumen_periksa' => $file_name,
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];

            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'audiometri_mcu');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function simpan_bedah()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');


        $mcu = $this->db->query("SELECT * from bedah_mcu where id_mcu ='$id'")->row();
        if (empty($mcu)) {

            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'keluhan' => $this->input->post('keluhan'),
                'status_lokalis' => $this->input->post('status_lokalis'),
                'hernia' => $this->input->post('hernia'),
                'varices_tungkai' => $this->input->post('varices_tungkai'),
                'haemorrhoids' => $this->input->post('haemorrhoids'),
                'benjolan' => $this->input->post('benjolan'),
                'kesimpulan' => $this->input->post('kesimpulan'),
                'staff' => $staff,

            ];
            $this->M_mcu->insert_tindakan($db, 'bedah_mcu');
        } else {

            $db = [
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'keluhan' => $this->input->post('keluhan'),
                'status_lokalis' => $this->input->post('status_lokalis'),
                'hernia' => $this->input->post('hernia'),
                'varices_tungkai' => $this->input->post('varices_tungkai'),
                'haemorrhoids' => $this->input->post('haemorrhoids'),
                'benjolan' => $this->input->post('benjolan'),
                'kesimpulan' => $this->input->post('kesimpulan'),
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];

            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'bedah_mcu');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function simpan_kardiologi()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');

        $config['upload_path'] = './assets/upload_mcu/';
        $config['allowed_types'] = 'pdf|doc|docx|jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $this->load->library('upload', $config);

        $mcu = $this->db->query("SELECT * from kardiologi_mcu where id_mcu ='$id'")->row();
        if (empty($mcu)) {
            // Proses upload untuk 'ekg'
            if ($this->upload->do_upload('dokumen_periksa_ekg')) {
                $upload_data_ekg = $this->upload->data();
                $file_name_ekg = $upload_data_ekg['file_name'];
            } else {
                $file_name_ekg = ''; // Atau nilai default lainnya jika upload gagal
                // Anda mungkin ingin menambahkan penanganan error di sini
            }

            // Proses upload untuk 'echo'
            if ($this->upload->do_upload('dokumen_periksa_echo')) {
                $upload_data_echo = $this->upload->data();
                $file_name_echo = $upload_data_echo['file_name'];
            } else {
                $file_name_echo = ''; // Atau nilai default lainnya jika upload gagal
                // Anda mungkin ingin menambahkan penanganan error di sini
            }

            // Proses upload untuk 'treadmil'
            if ($this->upload->do_upload('dokumen_periksa_treadmil')) {
                $upload_data_treadmil = $this->upload->data();
                $file_name_treadmil = $upload_data_treadmil['file_name'];
            } else {
                $file_name_treadmil = ''; // Atau nilai default lainnya jika upload gagal
                // Anda mungkin ingin menambahkan penanganan error di sini
            }

            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'kelainan' => $this->input->post('kelainan'),
                'nadi' => $this->input->post('nadi'),
                'irama' => $this->input->post('irama'),
                'isi_nadi' => $this->input->post('isi_nadi'),
                'sistol' => $this->input->post('sistol'),
                'diastol' => $this->input->post('diastol'),
                'tekanan_venajugularis' => $this->input->post('tekanan_venajugularis'),
                'sianosis' => $this->input->post('sianosis'),
                'inspeksi' => $this->input->post('inspeksi'),
                'perkusi' => $this->input->post('perkusi'),
                'auskultasi' => $this->input->post('auskultasi'),
                'irama_ecg' => $this->input->post('irama_ecg'),
                'axis_ecg' => $this->input->post('axis_ecg'),
                'rotation_ecg' => $this->input->post('rotation_ecg'),
                'atrail_rate' => $this->input->post('atrail_rate'),
                'ventricular_rate_ecg' => $this->input->post('ventricular_rate_ecg'),
                'pr_interval_ecg' => $this->input->post('pr_interval_ecg'),
                'qrs_interval_ecg' => $this->input->post('qrs_interval_ecg'),
                'qt_interval_ecg' => $this->input->post('qt_interval_ecg'),
                'gelombang_p_ecg' => $this->input->post('gelombang_p_ecg'),
                'gelombang_qrs_ecg' => $this->input->post('gelombang_qrs_ecg'),
                'gelombang_st_ecg' => $this->input->post('gelombang_st_ecg'),
                'gelombang_t_ecg' => $this->input->post('gelombang_t_ecg'),
                'gelombang_u_ecg' => $this->input->post('gelombang_u_ecg'),
                'hasil_treadmill' => $this->input->post('hasil_treadmill'),
                'hasil_ekokardiografi' => $this->input->post('hasil_ekokardiografi'),
                'kesimpulan' => $this->input->post('kesimpulan'),
                'saran' => $this->input->post('saran'),
                'dokumen_periksa_ekg' => $file_name_ekg,
                'dokumen_periksa_echo' => $file_name_echo,
                'dokumen_periksa_treadmil' => $file_name_treadmil,
                'staff' => $staff,


            ];
            $this->M_mcu->insert_tindakan($db, 'kardiologi_mcu');
        } else {
            $files_to_upload = [
                'dokumen_periksa_ekg',
                'dokumen_periksa_echo',
                'dokumen_periksa_treadmil'
            ];
            $uploaded_files = [];
            foreach ($files_to_upload as $file_input_name) {
                // Ambil nama file lama dari database (jika ada)
                $old_file_name = $mcu->$file_input_name;
                $file_path = './assets/upload_mcu/' . $old_file_name;
        
                // Hapus file lama jika ada
                if (!empty($old_file_name) && file_exists($file_path)) {
                    unlink($file_path);
                }
        
                // Proses upload file baru
                if ($this->upload->do_upload($file_input_name)) {
                    $upload_data = $this->upload->data();
                    $uploaded_files[$file_input_name] = $upload_data['file_name'];
                } else {
                    $uploaded_files[$file_input_name] = ''; // Atau nilai default lainnya jika upload gagal
                    // Anda mungkin ingin menambahkan penanganan error di sini
                }
            }
            // print_arr($uploaded_files);
          
            $db = [
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'kelainan' => $this->input->post('kelainan'),
                'nadi' => $this->input->post('nadi'),
                'irama' => $this->input->post('irama'),
                'isi_nadi' => $this->input->post('isi_nadi'),
                'sistol' => $this->input->post('sistol'),
                'diastol' => $this->input->post('diastol'),
                'tekanan_venajugularis' => $this->input->post('tekanan_venajugularis'),
                'sianosis' => $this->input->post('sianosis'),
                'inspeksi' => $this->input->post('inspeksi'),
                'perkusi' => $this->input->post('perkusi'),
                'auskultasi' => $this->input->post('auskultasi'),
                'irama_ecg' => $this->input->post('irama_ecg'),
                'axis_ecg' => $this->input->post('axis_ecg'),
                'rotation_ecg' => $this->input->post('rotation_ecg'),
                'atrail_rate' => $this->input->post('atrail_rate'),
                'ventricular_rate_ecg' => $this->input->post('ventricular_rate_ecg'),
                'pr_interval_ecg' => $this->input->post('pr_interval_ecg'),
                'qrs_interval_ecg' => $this->input->post('qrs_interval_ecg'),
                'qt_interval_ecg' => $this->input->post('qt_interval_ecg'),
                'gelombang_p_ecg' => $this->input->post('gelombang_p_ecg'),
                'gelombang_qrs_ecg' => $this->input->post('gelombang_qrs_ecg'),
                'gelombang_st_ecg' => $this->input->post('gelombang_st_ecg'),
                'gelombang_t_ecg' => $this->input->post('gelombang_t_ecg'),
                'gelombang_u_ecg' => $this->input->post('gelombang_u_ecg'),
                'hasil_treadmill' => $this->input->post('hasil_treadmill'),
                'hasil_ekokardiografi' => $this->input->post('hasil_ekokardiografi'),
                'kesimpulan' => $this->input->post('kesimpulan'),
                'saran' => $this->input->post('saran'),
                'dokumen_periksa_ekg' => $uploaded_files['dokumen_periksa_ekg'],
                'dokumen_periksa_echo' => $uploaded_files['dokumen_periksa_echo'],
                'dokumen_periksa_treadmil' => $uploaded_files['dokumen_periksa_treadmil'],
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];

            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'kardiologi_mcu');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function simpan_kebidanan()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');


        $mcu = $this->db->query("SELECT * from kebidanan_mcu where id_mcu ='$id'")->row();
        if (empty($mcu)) {

            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'temuan' => $this->input->post('temuan'),
                'kesimpulan' => $this->input->post('kesimpulan'),
                'staff' => $staff,

            ];
            $this->M_mcu->insert_tindakan($db, 'kebidanan_mcu');
        } else {

            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'temuan' => $this->input->post('temuan'),
                'kesimpulan' => $this->input->post('kesimpulan'),
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];

            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'kebidanan_mcu');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function simpan_mata()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');


        $mcu = $this->db->query("SELECT * from mata_mcu where id_mcu ='$id'")->row();
        if (empty($mcu)) {

            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'kelainan' => $this->input->post('kelainan'),
                'tajam_kiri' => $this->input->post('tajam_kiri'),
                'tajam_kanan' => $this->input->post('tajam_kanan'),
                'binokularitas_kiri' => $this->input->post('binokularitas_kiri'),
                'binokularitas_kanan' => $this->input->post('binokularitas_kanan'),
                'kedalaman_kiri' => $this->input->post('kedalaman_kiri'),
                'kedalaman_kanan' => $this->input->post('kedalaman_kanan'),
                'lapang_pandang_kiri' => $this->input->post('lapang_pandang_kiri'),
                'lapang_pandang_kanan' => $this->input->post('lapang_pandang_kanan'),
                'diferensiasi_warna_kiri' => $this->input->post('diferensiasi_warna_kiri'),
                'diferensiasi_warna_kanan' => $this->input->post('diferensiasi_warna_kanan'),
                'stereognosis_kiri' => $this->input->post('stereognosis_kiri'),
                'stereognosis_kanan' => $this->input->post('stereognosis_kanan'),
                'fundus_kiri' => $this->input->post('fundus_kiri'),
                'fundus_kanan' => $this->input->post('fundus_kanan'),
                'media_refraksi_kiri' => $this->input->post('media_refraksi_kiri'),
                'media_refraksi_kanan' => $this->input->post('media_refraksi_kanan'),
                'papil_optik_kiri' => $this->input->post('papil_optik_kiri'),
                'papil_optik_kanan' => $this->input->post('papil_optik_kanan'),
                'makula_lutea_kiri' => $this->input->post('makula_lutea_kiri'),
                'makula_lutea_kanan' => $this->input->post('makula_lutea_kanan'),
                'retina_kiri' => $this->input->post('retina_kiri'),
                'retina_kanan' => $this->input->post('retina_kanan'),
                'tekanan_bola_mata_kiri' => $this->input->post('tekanan_bola_mata_kiri'),
                'tekanan_bola_mata_kanan' => $this->input->post('tekanan_bola_mata_kanan'),
                'ishihara_kiri' => $this->input->post('ishihara_kiri'),
                'ishihara_kanan' => $this->input->post('ishihara_kanan'),
                'amsler_grid_kiri' => $this->input->post('amsler_grid_kiri'),
                'amsler_grid_kanan' => $this->input->post('amsler_grid_kanan'),
                'balik_mata_depan_kiri' => $this->input->post('balik_mata_depan_kiri'),
                'balik_mata_depan_kanan' => $this->input->post('balik_mata_depan_kanan'),
                'kesimpulan' => $this->input->post('kesimpulan'),
                'saran' => $this->input->post('saran'),
                'staff' => $staff,

            ];
            $this->M_mcu->insert_tindakan($db, 'mata_mcu');
        } else {

            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'kelainan' => $this->input->post('kelainan'),
                'tajam_kiri' => $this->input->post('tajam_kiri'),
                'tajam_kanan' => $this->input->post('tajam_kanan'),
                'binokularitas_kiri' => $this->input->post('binokularitas_kiri'),
                'binokularitas_kanan' => $this->input->post('binokularitas_kanan'),
                'kedalaman_kiri' => $this->input->post('kedalaman_kiri'),
                'kedalaman_kanan' => $this->input->post('kedalaman_kanan'),
                'lapang_pandang_kiri' => $this->input->post('lapang_pandang_kiri'),
                'lapang_pandang_kanan' => $this->input->post('lapang_pandang_kanan'),
                'diferensiasi_warna_kiri' => $this->input->post('diferensiasi_warna_kiri'),
                'diferensiasi_warna_kanan' => $this->input->post('diferensiasi_warna_kanan'),
                'stereognosis_kiri' => $this->input->post('stereognosis_kiri'),
                'stereognosis_kanan' => $this->input->post('stereognosis_kanan'),
                'fundus_kiri' => $this->input->post('fundus_kiri'),
                'fundus_kanan' => $this->input->post('fundus_kanan'),
                'media_refraksi_kiri' => $this->input->post('media_refraksi_kiri'),
                'media_refraksi_kanan' => $this->input->post('media_refraksi_kanan'),
                'papil_optik_kiri' => $this->input->post('papil_optik_kiri'),
                'papil_optik_kanan' => $this->input->post('papil_optik_kanan'),
                'makula_lutea_kiri' => $this->input->post('makula_lutea_kiri'),
                'makula_lutea_kanan' => $this->input->post('makula_lutea_kanan'),
                'retina_kiri' => $this->input->post('retina_kiri'),
                'retina_kanan' => $this->input->post('retina_kanan'),
                'tekanan_bola_mata_kiri' => $this->input->post('tekanan_bola_mata_kiri'),
                'tekanan_bola_mata_kanan' => $this->input->post('tekanan_bola_mata_kanan'),
                'ishihara_kiri' => $this->input->post('ishihara_kiri'),
                'ishihara_kanan' => $this->input->post('ishihara_kanan'),
                'amsler_grid_kiri' => $this->input->post('amsler_grid_kiri'),
                'amsler_grid_kanan' => $this->input->post('amsler_grid_kanan'),
                'balik_mata_depan_kiri' => $this->input->post('balik_mata_depan_kiri'),
                'balik_mata_depan_kanan' => $this->input->post('balik_mata_depan_kanan'),
                'kesimpulan' => $this->input->post('kesimpulan'),
                'saran' => $this->input->post('saran'),
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];

            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'mata_mcu');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function simpan_neurologi()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');


        $mcu = $this->db->query("SELECT * from neurologi_mcu where id_mcu ='$id'")->row();
        if (empty($mcu)) {

            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'kelainan' => $this->input->post('kelainan'),
                'kaku_duduk' => $this->input->post('kaku_duduk'),
                'laseque' => $this->input->post('laseque'),
                'kernig' => $this->input->post('kernig'),
                'bruzinskiI' => $this->input->post('bruzinskiI'),
                'bruzinski2' => $this->input->post('bruzinskiII'),
                'olfaktorius' => $this->input->post('olfaktorius'),
                'optikus' => $this->input->post('optikus'),
                'okulomotorius' => $this->input->post('okulomotorius'),
                'troklearis' => $this->input->post('troklearis'),
                'trigeminus' => $this->input->post('trigeminus'),
                'abducens' => $this->input->post('abducens'),
                'fasialis' => $this->input->post('fasialis'),
                'vestibulo_koklearis' => $this->input->post('vestibulo_koklearis'),
                'glosofaringeus' => $this->input->post('glosofaringeus'),
                'vagus' => $this->input->post('vagus'),
                'asesorius' => $this->input->post('asesorius'),
                'hipoglosus' => $this->input->post('hipoglosus'),
                'motorik_anggota_gerak_atas' => $this->input->post('motorik_anggota_gerak_atas'),
                'motorik_anggota_gerak_bawah' => $this->input->post('motorik_anggota_gerak_bawah'),
                'sensibilitas_anggota_gerak_atas' => $this->input->post('sensibilitas_anggota_gerak_atas'),
                'sensibilitas_anggota_gerak_bawah' => $this->input->post('sensibilitas_anggota_gerak_bawah'),
                'refleks_fisiologis' => $this->input->post('refleks_fisiologis'),
                'refleks_patologis' => $this->input->post('refleks_patologis'),
                'koordinasi' => $this->input->post('koordinasi'),
                'vegetatif' => $this->input->post('vegetatif'),
                'bicara_spontan' => $this->input->post('bicara_spontan'),
                'mengerti_pembicaraan' => $this->input->post('mengerti_pembicaraan'),
                'menghitung' => $this->input->post('menghitung'),
                'daya_ingat' => $this->input->post('daya_ingat'),
                'tandaRegresi' => $this->input->post('tandaRegresi'),
                'kesimpulan' => $this->input->post('kesimpulan'),
                'staff' => $staff,

            ];
            $this->M_mcu->insert_tindakan($db, 'neurologi_mcu');
        } else {

            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'kelainan' => $this->input->post('kelainan'),
                'kaku_duduk' => $this->input->post('kaku_duduk'),
                'laseque' => $this->input->post('laseque'),
                'kernig' => $this->input->post('kernig'),
                'bruzinskiI' => $this->input->post('bruzinskiI'),
                'bruzinski2' => $this->input->post('bruzinskiII'),
                'olfaktorius' => $this->input->post('olfaktorius'),
                'optikus' => $this->input->post('optikus'),
                'okulomotorius' => $this->input->post('okulomotorius'),
                'troklearis' => $this->input->post('troklearis'),
                'trigeminus' => $this->input->post('trigeminus'),
                'abducens' => $this->input->post('abducens'),
                'fasialis' => $this->input->post('fasialis'),
                'vestibulo_koklearis' => $this->input->post('vestibulo_koklearis'),
                'glosofaringeus' => $this->input->post('glosofaringeus'),
                'vagus' => $this->input->post('vagus'),
                'asesorius' => $this->input->post('asesorius'),
                'hipoglosus' => $this->input->post('hipoglosus'),
                'motorik_anggota_gerak_atas' => $this->input->post('motorik_anggota_gerak_atas'),
                'motorik_anggota_gerak_bawah' => $this->input->post('motorik_anggota_gerak_bawah'),
                'sensibilitas_anggota_gerak_atas' => $this->input->post('sensibilitas_anggota_gerak_atas'),
                'sensibilitas_anggota_gerak_bawah' => $this->input->post('sensibilitas_anggota_gerak_bawah'),
                'refleks_fisiologis' => $this->input->post('refleks_fisiologis'),
                'refleks_patologis' => $this->input->post('refleks_patologis'),
                'koordinasi' => $this->input->post('koordinasi'),
                'vegetatif' => $this->input->post('vegetatif'),
                'bicara_spontan' => $this->input->post('bicara_spontan'),
                'mengerti_pembicaraan' => $this->input->post('mengerti_pembicaraan'),
                'menghitung' => $this->input->post('menghitung'),
                'daya_ingat' => $this->input->post('daya_ingat'),
                'tandaRegresi' => $this->input->post('tandaRegresi'),
                'kesimpulan' => $this->input->post('kesimpulan'),
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];

            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'neurologi_mcu');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function simpan_paru()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');


        $mcu = $this->db->query("SELECT * from paru_mcu where id_mcu ='$id'")->row();
        if (empty($mcu)) {

            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'kelainan' => $this->input->post('kelainan'),
                'statis' => $this->input->post('statis'),
                'dinamis' => $this->input->post('dinamis'),
                'premitus' => $this->input->post('premitus'),
                'bunyi_ketok_dada' => $this->input->post('bunyi_ketok_dada'),
                'suara_nafas_utama' => $this->input->post('suara_nafas_utama'),
                'suara_nafas_tambahan' => $this->input->post('suara_nafas_tambahan'),
                'rhonki' => $this->input->post('rhonki'),
                'wheezing' => $this->input->post('wheezing'),
                'lainLain' => $this->input->post('lainLain'),
                'kesimpulan' => $this->input->post('kesimpulan'),
                'staff' => $staff,

            ];
            $this->M_mcu->insert_tindakan($db, 'paru_mcu');
        } else {

            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'kelainan' => $this->input->post('kelainan'),
                'statis' => $this->input->post('statis'),
                'dinamis' => $this->input->post('dinamis'),
                'premitus' => $this->input->post('premitus'),
                'bunyi_ketok_dada' => $this->input->post('bunyi_ketok_dada'),
                'suara_nafas_utama' => $this->input->post('suara_nafas_utama'),
                'suara_nafas_tambahan' => $this->input->post('suara_nafas_tambahan'),
                'rhonki' => $this->input->post('rhonki'),
                'wheezing' => $this->input->post('wheezing'),
                'lainLain' => $this->input->post('lainLain'),
                'kesimpulan' => $this->input->post('kesimpulan'),
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];

            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'paru_mcu');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function simpan_tht()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');


        $mcu = $this->db->query("SELECT * from tht_mcu where id_mcu ='$id'")->row();
        if (empty($mcu)) {

            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'kelainan' => $this->input->post('kelainan'),
                'auricula' => $this->input->post('auricula'),
                'canalis_auditorius_externus' => $this->input->post('canalis_auditorius_externus'),
                'kulit_canalis' => $this->input->post('kulit_canalis'),
                'discharge' => $this->input->post('discharge'),
                'membran_tympani' => $this->input->post('membran_tympani'),
                'cavum_tympani' => $this->input->post('cavum_tympani'),
                'mucosa_cavum_nasi' => $this->input->post('mucosa_cavum_nasi'),
                'concha' => $this->input->post('concha'),
                'septum_nasi' => $this->input->post('septum_nasi'),
                'dishcarge' => $this->input->post('dishcarge'),
                'pharynx' => $this->input->post('pharynx'),
                'naso_pharynx' => $this->input->post('naso_pharynx'),
                'oro_pharynx' => $this->input->post('oro_pharynx'),
                'laryngo_pharynx' => $this->input->post('laryngo_pharynx'),
                'supra_glotis' => $this->input->post('supra_glotis'),
                'glotis' => $this->input->post('glotis'),
                'sub_glotis' => $this->input->post('sub_glotis'),
                'pure_tone_audiometri' => $this->input->post('pure_tone_audiometri'),
                'sisi_test' => $this->input->post('sisi_test'),
                'tone_decay' => $this->input->post('tone_decay'),
                'impedance' => $this->input->post('impedance'),
                'speech_audiometri' => $this->input->post('speech_audiometri'),
                'kesimpulan' => $this->input->post('kesimpulan'),
                'staff' => $staff,

            ];
            $this->M_mcu->insert_tindakan($db, 'tht_mcu');
        } else {

            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'kelainan' => $this->input->post('kelainan'),
                'auricula' => $this->input->post('auricula'),
                'canalis_auditorius_externus' => $this->input->post('canalis_auditorius_externus'),
                'kulit_canalis' => $this->input->post('kulit_canalis'),
                'discharge' => $this->input->post('discharge'),
                'membran_tympani' => $this->input->post('membran_tympani'),
                'cavum_tympani' => $this->input->post('cavum_tympani'),
                'mucosa_cavum_nasi' => $this->input->post('mucosa_cavum_nasi'),
                'concha' => $this->input->post('concha'),
                'septum_nasi' => $this->input->post('septum_nasi'),
                'dishcarge' => $this->input->post('dishcarge'),
                'pharynx' => $this->input->post('pharynx'),
                'naso_pharynx' => $this->input->post('naso_pharynx'),
                'oro_pharynx' => $this->input->post('oro_pharynx'),
                'laryngo_pharynx' => $this->input->post('laryngo_pharynx'),
                'supra_glotis' => $this->input->post('supra_glotis'),
                'glotis' => $this->input->post('glotis'),
                'sub_glotis' => $this->input->post('sub_glotis'),
                'pure_tone_audiometri' => $this->input->post('pure_tone_audiometri'),
                'sisi_test' => $this->input->post('sisi_test'),
                'tone_decay' => $this->input->post('tone_decay'),
                'impedance' => $this->input->post('impedance'),
                'speech_audiometri' => $this->input->post('speech_audiometri'),
                'kesimpulan' => $this->input->post('kesimpulan'),
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];

            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'tht_mcu');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function simpan_gigi_geligi()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;

        $odontogramData = $this->input->post('odontogramData');
        // echo json_encode($odontogramData);

        $id = $this->input->post('id_mcu');


        $mcu = $this->db->query("SELECT * from gigi_mcu where id_mcu ='$id'")->row();
        if (empty($mcu)) {

            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'penyakit_jantung' => $this->input->post('penyakit_jantung'),
                'hipertensi' => $this->input->post('hipertensi'),
                'diabetes_militus' => $this->input->post('diabetes_militus'),
                'alergi' => $this->input->post('alergi'),
                'asma' => $this->input->post('asma'),
                'kelainan_darah' => $this->input->post('kelainan_darah'),
                'penyakit_lambung' => $this->input->post('penyakit_lambung'),
                'psikis' => $this->input->post('psikis'),
                'hepatitis' => $this->input->post('hepatitis'),
                'lain_lain' => $this->input->post('lain_lain'),
                'lidah' => $this->input->post('lidah'),
                'gingiva' => $this->input->post('gingiva'),
                'mukosa_pipi' => $this->input->post('mukosa_pipi'),
                'pallatum' => $this->input->post('pallatum'),
                'kesimpulan' => $this->input->post('kesimpulan'),
                'odontogram' => json_encode($odontogramData),
                'staff' => $staff,

            ];
            $this->M_mcu->insert_tindakan($db, 'gigi_mcu');
        } else {

            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'penyakit_jantung' => $this->input->post('penyakit_jantung'),
                'hipertensi' => $this->input->post('hipertensi'),
                'diabetes_militus' => $this->input->post('diabetes_militus'),
                'alergi' => $this->input->post('alergi'),
                'asma' => $this->input->post('asma'),
                'kelainan_darah' => $this->input->post('kelainan_darah'),
                'penyakit_lambung' => $this->input->post('penyakit_lambung'),
                'psikis' => $this->input->post('psikis'),
                'hepatitis' => $this->input->post('hepatitis'),
                'lain_lain' => $this->input->post('lain_lain'),
                'lidah' => $this->input->post('lidah'),
                'gingiva' => $this->input->post('gingiva'),
                'mukosa_pipi' => $this->input->post('mukosa_pipi'),
                'pallatum' => $this->input->post('pallatum'),
                'kesimpulan' => $this->input->post('kesimpulan'),
                'odontogram' => json_encode($odontogramData),
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];

            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'gigi_mcu');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function simpan_spirometri()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');

        $config['upload_path'] = './assets/upload_mcu/';
        $config['allowed_types'] = 'pdf|doc|docx|jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $this->load->library('upload', $config);

        $mcu = $this->db->query("SELECT * from spirometri_mcu where id_mcu ='$id'")->row();
        if (empty($mcu)) {
            $this->upload->do_upload('dokumen_periksa');

            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];

            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'prediksi_fvc' => $this->input->post('prediksi_fvc'),
                'hasil_fvc' => $this->input->post('hasil_fvc'),
                'prediksi_FEV1' => $this->input->post('prediksi_FEV1'),
                'hasil_FEV1' => $this->input->post('hasil_FEV1'),
                'prediksi_fvc_fev' => $this->input->post('prediksi_fvc_fev'),
                'hasil_fvc_fev' => $this->input->post('hasil_fvc_fev'),

                'persen_fvc' => $this->input->post('persen_fvc'),
                'persen_FEV1' => $this->input->post('persen_FEV1'),
                'persen_fvc_fev' => $this->input->post('persen_fvc_fev'),

                'kesimpulan' => $this->input->post('kesimpulan'),
                'dokumen_periksa' => $file_name,
                'staff' => $staff,


            ];
            $this->M_mcu->insert_tindakan($db, 'spirometri_mcu');
        } else {
            $file_path = './assets/upload_mcu/' . $mcu->dokumen_periksa;
            if (file_exists($file_path)) {
                unlink($file_path); // Hapus file
            }

            $this->upload->do_upload('dokumen_periksa');
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'dokter_periksa' => $this->input->post('dokter_periksa'),
                'prediksi_fvc' => $this->input->post('prediksi_fvc'),
                'hasil_fvc' => $this->input->post('hasil_fvc'),
                'prediksi_FEV1' => $this->input->post('prediksi_FEV1'),
                'hasil_FEV1' => $this->input->post('hasil_FEV1'),
                'prediksi_fvc_fev' => $this->input->post('prediksi_fvc_fev'),
                'hasil_fvc_fev' => $this->input->post('hasil_fvc_fev'),

                'persen_fvc' => $this->input->post('persen_fvc'),
                'persen_FEV1' => $this->input->post('persen_FEV1'),
                'persen_fvc_fev' => $this->input->post('persen_fvc_fev'),

                'kesimpulan' => $this->input->post('kesimpulan'),
                'dokumen_periksa' => $file_name,
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];

            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'spirometri_mcu');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }
}
