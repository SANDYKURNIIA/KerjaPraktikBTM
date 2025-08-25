<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_ranap_bayi_baru_lahir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_IGD');
        $this->load->model('M_Erm');
        $this->load->model('M_Assembling');
        $this->load->model('M_Poli');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_Erm_ranap');
        $this->load->model('M_ranap_bayi_baru_lahir');
    }


    public function simpan()
    {
        $staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id_pelayanan');
        $db = $this->db->query("SELECT count(*) count from ass_bayi_baru_lahir where id_pelayanan ='$id'")->row();
        if ($db->count == 0) {
            $db = [
                'id_form' => $this->input->post('id_form'),
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'id_history' => $this->input->post('id_history'),
                'skor_akhir' => $this->input->post('skor_akhir'),
                'tgl_pengkajian' => $this->input->post('tgl_pengkajian'),
                'cara_masuk' => $this->input->post('cara_masuk'),
                'g_ibu' => $this->input->post('g_ibu'),
                'p_ibu' => $this->input->post('p_ibu'),
                'a_ibu' => $this->input->post('a_ibu'),
                'usia_kehamilan_ibu' => $this->input->post('usia_kehamilan_ibu'),
                'pres_bayi_ibu' => $this->input->post('pres_bayi_ibu'),
                'komp_antenatal_ibu' => $this->input->post('komp_antenatal_ibu'),
                'pem_antenatal_ibu' => $this->input->post('pem_antenatal_ibu'),
                'berat_ibu' => $this->input->post('berat_ibu'),
                'tinggi_ibu' => $this->input->post('tinggi_ibu'),
                'kead_um_ibu' => $this->input->post('kead_um_ibu'),
                'jenis_persalinan' => $this->input->post('jenis_persalinan'),
                'indikasi' => $this->input->post('indikasi'),
                'komp_persalinan' => $this->input->post('komp_persalinan'),
                'lam_ketu_pec' => $this->input->post('lam_ketu_pec'),
                'persalinan_di' => $this->input->post('persalinan_di'),
                'td_vital' => $this->input->post('td_vital'),
                'n_vital' => $this->input->post('n_vital'),
                'rr_vital' => $this->input->post('rr_vital'),
                's_vital' => $this->input->post('s_vital'),
                'fetus_vital' => $this->input->post('fetus_vital'),
                'kond_ketu_vital' => $this->input->post('kond_ketu_vital'),
                'pros_persalinan_vital' => $this->input->post('pros_persalinan_vital'),
                'keb_ibu_terdahulu' => $this->input->post('keb_ibu_terdahulu'),
                'lahir_bayi' => $this->input->post('lahir_bayi'),
                'jam_lahir_bayi' => $this->input->post('jam_lahir_bayi'),
                'jenkel_lahir_bayi' => $this->input->post('jenkel_lahir_bayi'),
                'kelahiran_bayi' => $this->input->post('kelahiran_bayi'),
                'nilai_APGAR_bayi' => $this->input->post('nilai_APGAR_bayi'),
                'deny_jantung_bayi' => $this->input->post('deny_jantung_bayi'),
                'usaha_nafas_bayi' => $this->input->post('usaha_nafas_bayi'),
                'tonus_otot_bayi' => $this->input->post('tonus_otot_bayi'),
                'reflek_bayi' => $this->input->post('reflek_bayi'),
                'warna_kulit_bayi' => $this->input->post('warna_kulit_bayi'),
                'total' => $this->input->post('total'),
                'cap_succedaneum' => $this->input->post('cap_succedaneum'),
                'cap_haematoma' => $this->input->post('cap_haematoma'),
                'cacat_bawaan' => $this->input->post('cacat_bawaan'),
                'rangsangan' => $this->input->post('rangsangan'),
                'peng_lendir' => $this->input->post('peng_lendir'),
                'ambu_bag' => $this->input->post('ambu_bag'),
                'mass_jantung' => $this->input->post('mass_jantung'),
                'intu_endo' => $this->input->post('intu_endo'),
                'o2' => $this->input->post('o2'),
                'umur_pf' => $this->input->post('umur_pf'),
                'hari_pf' => $this->input->post('hari_pf'),
                'jam_pf' => $this->input->post('jam_pf'),
                'suhu_pf' => $this->input->post('suhu_pf'),
                'berat_pf' => $this->input->post('berat_pf'),
                'panjang_pf' => $this->input->post('panjang_pf'),
                'lingkar_pf' => $this->input->post('lingkar_pf'),
                'kepala_pf' => $this->input->post('kepala_pf'),
                'ubun_pf' => $this->input->post('ubun_pf'),
                'sutura_pf' => $this->input->post('sutura_pf'),
                'telinga_pf' => $this->input->post('telinga_pf'),
                'hidung_pf' => $this->input->post('hidung_pf'),
                'leher_pf' => $this->input->post('leher_pf'),
                'mata_pf' => $this->input->post('mata_pf'),
                'dada_pf' => $this->input->post('dada_pf'),
                'tubuh_pf' => $this->input->post('tubuh_pf'),
                'mulut_pf' => $this->input->post('mulut_pf'),
                'pengerakan_pf' => $this->input->post('pengerakan_pf'),
                'bunyi_nafas_pf' => $this->input->post('bunyi_nafas_pf'),
                'pernapasan_pf' => $this->input->post('pernapasan_pf'),
                'denyut_jantung_pf' => $this->input->post('denyut_jantung_pf'),
                'perut_pf' => $this->input->post('perut_pf'),
                'bising_usus_pf' => $this->input->post('bising_usus_pf'),
                'mekonium_pf' => $this->input->post('mekonium_pf'),
                'punggung_pf' => $this->input->post('punggung_pf'),
                'kead_punggung_pf' => $this->input->post('kead_punggung_pf'),
                'laki_gene_pf' => $this->input->post('laki_gene_pf'),
                'testis_gene_pf' => $this->input->post('testis_gene_pf'),
                'perem_gene_pf' => $this->input->post('perem_gene_pf'),
                'anus_gene_pf' => $this->input->post('anus_gene_pf'),
                'jari_tangan_eks_pf' => $this->input->post('jari_tangan_eks_pf'),
                'jari_kaki_eks_pf' => $this->input->post('jari_kaki_eks_pf'),
                'pergerakan_eks_pf' => $this->input->post('pergerakan_eks_pf'),
                'tendon_sn_pf' => $this->input->post('tendon_sn_pf'),
                'moro_sn_pf' => $this->input->post('moro_sn_pf'),
                'rooting_sn_pf' => $this->input->post('rooting_sn_pf'),
                'menghisap_sn_pf' => $this->input->post('menghisap_sn_pf'),
                'babinski_sn_pf' => $this->input->post('babinski_sn_pf'),
                'menggenggam_sn_pf' => $this->input->post('menggenggam_sn_pf'),
                'menangis_sn_pf' => $this->input->post('menangis_sn_pf'),
                'berjalan_sn_pf' => $this->input->post('berjalan_sn_pf'),
                'tonic_sn_pf' => $this->input->post('tonic_sn_pf'),
                'nutrisi_sn_pf' => $this->input->post('nutrisi_sn_pf'),
                'tgl_bab_eliminasi' => $this->input->post('tgl_bab_eliminasi'),
                'jam_bab_eliminasi' => $this->input->post('jam_bab_eliminasi'),
                'tgl_bab2_eliminasi' => $this->input->post('tgl_bab2_eliminasi'),
                'jam_bab2_eliminasi' => $this->input->post('jam_bab2_eliminasi'),
                'meconium_eliminasi' => $this->input->post('meconium_eliminasi'),
                'lingkar_eliminasi' => $this->input->post('lingkar_eliminasi'),
                'dada_eliminasi' => $this->input->post('dada_eliminasi'),
                'perut_eliminasi' => $this->input->post('perut_eliminasi'),
                'dasar_imunisasi' => $this->input->post('dasar_imunisasi'),
                'hepatitis_imunisasi' => $this->input->post('hepatitis_imunisasi'),
                'dpt_imunisasi' => $this->input->post('dpt_imunisasi'),
                'polio_imunisasi' => $this->input->post('polio_imunisasi'),
                'campak_imunisasi' => $this->input->post('campak_imunisasi'),
                'wajah' => $this->input->post('wajah'),
                'ekstremitas' => $this->input->post('ekstremitas'),
                'gerakan' => $this->input->post('gerakan'),
                'menangis' => $this->input->post('menangis'),
                'kemampuan_ditenangkan' => $this->input->post('kemampuan_ditenangkan'),
                'staff' => $staff->id_staff,
            ];

            $this->M_ranap_bayi_baru_lahir->formopedit($db, 'ass_bayi_baru_lahir');
        } else {
            $db = [
                'id_form' => $this->input->post('id_form'),
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'id_history' => $this->input->post('id_history'),
                'skor_akhir' => $this->input->post('skor_akhir'),
                'tgl_pengkajian' => $this->input->post('tgl_pengkajian'),
                'cara_masuk' => $this->input->post('cara_masuk'),
                'g_ibu' => $this->input->post('g_ibu'),
                'p_ibu' => $this->input->post('p_ibu'),
                'a_ibu' => $this->input->post('a_ibu'),
                'usia_kehamilan_ibu' => $this->input->post('usia_kehamilan_ibu'),
                'pres_bayi_ibu' => $this->input->post('pres_bayi_ibu'),
                'komp_antenatal_ibu' => $this->input->post('komp_antenatal_ibu'),
                'pem_antenatal_ibu' => $this->input->post('pem_antenatal_ibu'),
                'berat_ibu' => $this->input->post('berat_ibu'),
                'tinggi_ibu' => $this->input->post('tinggi_ibu'),
                'kead_um_ibu' => $this->input->post('kead_um_ibu'),
                'jenis_persalinan' => $this->input->post('jenis_persalinan'),
                'indikasi' => $this->input->post('indikasi'),
                'komp_persalinan' => $this->input->post('komp_persalinan'),
                'lam_ketu_pec' => $this->input->post('lam_ketu_pec'),
                'persalinan_di' => $this->input->post('persalinan_di'),
                'td_vital' => $this->input->post('td_vital'),
                'n_vital' => $this->input->post('n_vital'),
                'rr_vital' => $this->input->post('rr_vital'),
                's_vital' => $this->input->post('s_vital'),
                'fetus_vital' => $this->input->post('fetus_vital'),
                'kond_ketu_vital' => $this->input->post('kond_ketu_vital'),
                'pros_persalinan_vital' => $this->input->post('pros_persalinan_vital'),
                'keb_ibu_terdahulu' => $this->input->post('keb_ibu_terdahulu'),
                'lahir_bayi' => $this->input->post('lahir_bayi'),
                'jam_lahir_bayi' => $this->input->post('jam_lahir_bayi'),
                'jenkel_lahir_bayi' => $this->input->post('jenkel_lahir_bayi'),
                'kelahiran_bayi' => $this->input->post('kelahiran_bayi'),
                'nilai_APGAR_bayi' => $this->input->post('nilai_APGAR_bayi'),
                'deny_jantung_bayi' => $this->input->post('deny_jantung_bayi'),
                'usaha_nafas_bayi' => $this->input->post('usaha_nafas_bayi'),
                'tonus_otot_bayi' => $this->input->post('tonus_otot_bayi'),
                'reflek_bayi' => $this->input->post('reflek_bayi'),
                'warna_kulit_bayi' => $this->input->post('warna_kulit_bayi'),
                'total' => $this->input->post('total'),
                'cap_succedaneum' => $this->input->post('cap_succedaneum'),
                'cap_haematoma' => $this->input->post('cap_haematoma'),
                'cacat_bawaan' => $this->input->post('cacat_bawaan'),
                'rangsangan' => $this->input->post('rangsangan'),
                'peng_lendir' => $this->input->post('peng_lendir'),
                'ambu_bag' => $this->input->post('ambu_bag'),
                'mass_jantung' => $this->input->post('mass_jantung'),
                'intu_endo' => $this->input->post('intu_endo'),
                'o2' => $this->input->post('o2'),
                'umur_pf' => $this->input->post('umur_pf'),
                'hari_pf' => $this->input->post('hari_pf'),
                'jam_pf' => $this->input->post('jam_pf'),
                'suhu_pf' => $this->input->post('suhu_pf'),
                'berat_pf' => $this->input->post('berat_pf'),
                'panjang_pf' => $this->input->post('panjang_pf'),
                'lingkar_pf' => $this->input->post('lingkar_pf'),
                'kepala_pf' => $this->input->post('kepala_pf'),
                'ubun_pf' => $this->input->post('ubun_pf'),
                'sutura_pf' => $this->input->post('sutura_pf'),
                'telinga_pf' => $this->input->post('telinga_pf'),
                'hidung_pf' => $this->input->post('hidung_pf'),
                'leher_pf' => $this->input->post('leher_pf'),
                'mata_pf' => $this->input->post('mata_pf'),
                'dada_pf' => $this->input->post('dada_pf'),
                'tubuh_pf' => $this->input->post('tubuh_pf'),
                'mulut_pf' => $this->input->post('mulut_pf'),
                'pengerakan_pf' => $this->input->post('pengerakan_pf'),
                'bunyi_nafas_pf' => $this->input->post('bunyi_nafas_pf'),
                'pernapasan_pf' => $this->input->post('pernapasan_pf'),
                'denyut_jantung_pf' => $this->input->post('denyut_jantung_pf'),
                'perut_pf' => $this->input->post('perut_pf'),
                'bising_usus_pf' => $this->input->post('bising_usus_pf'),
                'mekonium_pf' => $this->input->post('mekonium_pf'),
                'punggung_pf' => $this->input->post('punggung_pf'),
                'kead_punggung_pf' => $this->input->post('kead_punggung_pf'),
                'laki_gene_pf' => $this->input->post('laki_gene_pf'),
                'testis_gene_pf' => $this->input->post('testis_gene_pf'),
                'perem_gene_pf' => $this->input->post('perem_gene_pf'),
                'anus_gene_pf' => $this->input->post('anus_gene_pf'),
                'jari_tangan_eks_pf' => $this->input->post('jari_tangan_eks_pf'),
                'jari_kaki_eks_pf' => $this->input->post('jari_kaki_eks_pf'),
                'pergerakan_eks_pf' => $this->input->post('pergerakan_eks_pf'),
                'tendon_sn_pf' => $this->input->post('tendon_sn_pf'),
                'moro_sn_pf' => $this->input->post('moro_sn_pf'),
                'rooting_sn_pf' => $this->input->post('rooting_sn_pf'),
                'menghisap_sn_pf' => $this->input->post('menghisap_sn_pf'),
                'babinski_sn_pf' => $this->input->post('babinski_sn_pf'),
                'menggenggam_sn_pf' => $this->input->post('menggenggam_sn_pf'),
                'menangis_sn_pf' => $this->input->post('menangis_sn_pf'),
                'berjalan_sn_pf' => $this->input->post('berjalan_sn_pf'),
                'tonic_sn_pf' => $this->input->post('tonic_sn_pf'),
                'nutrisi_sn_pf' => $this->input->post('nutrisi_sn_pf'),
                'tgl_bab_eliminasi' => $this->input->post('tgl_bab_eliminasi'),
                'jam_bab_eliminasi' => $this->input->post('jam_bab_eliminasi'),
                'tgl_bab2_eliminasi' => $this->input->post('tgl_bab2_eliminasi'),
                'jam_bab2_eliminasi' => $this->input->post('jam_bab2_eliminasi'),
                'meconium_eliminasi' => $this->input->post('meconium_eliminasi'),
                'lingkar_eliminasi' => $this->input->post('lingkar_eliminasi'),
                'dada_eliminasi' => $this->input->post('dada_eliminasi'),
                'perut_eliminasi' => $this->input->post('perut_eliminasi'),
                'dasar_imunisasi' => $this->input->post('dasar_imunisasi'),
                'hepatitis_imunisasi' => $this->input->post('hepatitis_imunisasi'),
                'dpt_imunisasi' => $this->input->post('dpt_imunisasi'),
                'polio_imunisasi' => $this->input->post('polio_imunisasi'),
                'campak_imunisasi' => $this->input->post('campak_imunisasi'),
                'wajah' => $this->input->post('wajah'),
                'ekstremitas' => $this->input->post('ekstremitas'),
                'gerakan' => $this->input->post('gerakan'),
                'menangis' => $this->input->post('menangis'),
                'kemampuan_ditenangkan' => $this->input->post('kemampuan_ditenangkan'),
                'staff' => $staff->id_staff,
            ];
            $where = array('id_pelayanan' => $this->input->post('id_pelayanan'));
            $this->M_ranap_bayi_baru_lahir->formopedit($db, $where, 'form_laporan');
        }
        $out['status'] = "success";
        echo json_encode($out);
    }


    public function formbayibarulahir($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        $staff = $this->session->userdata('data_auth');

        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['nama'] = $selectPasien->nama;
        $page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
        $page_data['staff'] = $staff->id_staff;
        $page_data['nama_dokter'] = $selectPasien->nama_dokter;
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history'] = $id_history;



        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Ranap/view_bayi_baru_lahir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function store()
    {
        $this->load->model('M_ranap_bayi_baru_lahir');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $existing_data = $this->M_ranap_bayi_baru_lahir->CekId($id_pelayanan);
        $staff = $this->session->userdata('data_auth');
        // Menangani pengiriman data dari form ke database


        if ($existing_data) {
            $id_form = $this->input->post('id_form');

            $data = array(
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'id_history' => $this->input->post('id_history'),
                'tgl_pengkajian' => $this->input->post('tgl_pengkajian'),
                'cara_masuk' => $this->input->post('cara_masuk'),
                'g_ibu' => $this->input->post('g_ibu'),
                'p_ibu' => $this->input->post('p_ibu'),
                'a_ibu' => $this->input->post('a_ibu'),
                'usia_kehamilan_ibu' => $this->input->post('usia_kehamilan_ibu'),
                'pres_bayi_ibu' => $this->input->post('pres_bayi_ibu'),
                'komp_antenatal_ibu' => $this->input->post('komp_antenatal_ibu'),
                'pem_antenatal_ibu' => $this->input->post('pem_antenatal_ibu'),
                'berat_ibu' => $this->input->post('berat_ibu'),
                'tinggi_ibu' => $this->input->post('tinggi_ibu'),
                'kead_um_ibu' => $this->input->post('kead_um_ibu'),
                'jenis_persalinan' => $this->input->post('jenis_persalinan'),
                'indikasi' => $this->input->post('indikasi'),
                'komp_persalinan' => $this->input->post('komp_persalinan'),
                'lam_ketu_pec' => $this->input->post('lam_ketu_pec'),
                'persalinan_di' => $this->input->post('persalinan_di'),
                'td_vital' => $this->input->post('td_vital'),
                'n_vital' => $this->input->post('n_vital'),
                'rr_vital' => $this->input->post('rr_vital'),
                's_vital' => $this->input->post('s_vital'),
                'fetus_vital' => $this->input->post('fetus_vital'),
                'kond_ketu_vital' => $this->input->post('kond_ketu_vital'),
                'pros_persalinan_vital' => $this->input->post('pros_persalinan_vital'),
                'keb_ibu_terdahulu' => $this->input->post('keb_ibu_terdahulu'),
                'staff' => $staff->id_staff,
            );

            $data1 = array(
                'lahir_bayi' => $this->input->post('lahir_bayi'),
                'jam_lahir_bayi' => $this->input->post('jam_lahir_bayi'),
                'jenkel_lahir_bayi' => $this->input->post('jenkel_lahir_bayi'),
                'kelahiran_bayi' => $this->input->post('kelahiran_bayi'),
                'nilai_APGAR_bayi' => $this->input->post('nilai_APGAR_bayi'),
                'deny_jantung_bayi' => $this->input->post('deny_jantung_bayi'),
                'usaha_nafas_bayi' => $this->input->post('usaha_nafas_bayi'),
                'tonus_otot_bayi' => $this->input->post('tonus_otot_bayi'),
                'reflek_bayi' => $this->input->post('reflek_bayi'),
                'warna_kulit_bayi' => $this->input->post('warna_kulit_bayi'),
                'total' => $this->input->post('total'),
                'cap_succedaneum' => $this->input->post('cap_succedaneum'),
                'cap_haematoma' => $this->input->post('cap_haematoma'),
                'cacat_bawaan' => $this->input->post('cacat_bawaan'),
                'rangsangan' => $this->input->post('rangsangan'),
                'peng_lendir' => $this->input->post('peng_lendir'),
                'ambu_bag' => $this->input->post('ambu_bag'),
                'mass_jantung' => $this->input->post('mass_jantung'),
                'intu_endo' => $this->input->post('intu_endo'),
                'o2' => $this->input->post('o2'),
            );

            $data2 = array(
                'umur_pf' => $this->input->post('umur_pf'),
                'hari_pf' => $this->input->post('hari_pf'),
                'jam_pf' => $this->input->post('jam_pf'),
                'suhu_pf' => $this->input->post('suhu_pf'),
                'berat_pf' => $this->input->post('berat_pf'),
                'panjang_pf' => $this->input->post('panjang_pf'),
                'lingkar_pf' => $this->input->post('lingkar_pf'),
                'kepala_pf' => $this->input->post('kepala_pf'),
                'ubun_pf' => $this->input->post('ubun_pf'),
                'sutura_pf' => $this->input->post('sutura_pf'),
                'telinga_pf' => $this->input->post('telinga_pf'),
                'hidung_pf' => $this->input->post('hidung_pf'),
                'leher_pf' => $this->input->post('leher_pf'),
                'mata_pf' => $this->input->post('mata_pf'),
                'dada_pf' => $this->input->post('dada_pf'),
                'tubuh_pf' => $this->input->post('tubuh_pf'),
                'mulut_pf' => $this->input->post('mulut_pf'),
                'pengerakan_pf' => $this->input->post('pengerakan_pf'),
                'bunyi_nafas_pf' => $this->input->post('bunyi_nafas_pf'),
                'pernapasan_pf' => $this->input->post('pernapasan_pf'),
                'denyut_jantung_pf' => $this->input->post('denyut_jantung_pf'),
                'perut_pf' => $this->input->post('perut_pf'),
                'bising_usus_pf' => $this->input->post('bising_usus_pf'),
                'mekonium_pf' => $this->input->post('mekonium_pf'),
                'punggung_pf' => $this->input->post('punggung_pf'),
                'kead_punggung_pf' => $this->input->post('kead_punggung_pf'),
                'laki_gene_pf' => $this->input->post('laki_gene_pf'),
                'testis_gene_pf' => $this->input->post('testis_gene_pf'),
                'perem_gene_pf' => $this->input->post('perem_gene_pf'),
                'anus_gene_pf' => $this->input->post('anus_gene_pf'),
                'jari_tangan_eks_pf' => $this->input->post('jari_tangan_eks_pf'),
                'jari_kaki_eks_pf' => $this->input->post('jari_kaki_eks_pf'),
                'pergerakan_eks_pf' => $this->input->post('pergerakan_eks_pf'),
                'tendon_sn_pf' => $this->input->post('tendon_sn_pf'),
                'moro_sn_pf' => $this->input->post('moro_sn_pf'),
                'rooting_sn_pf' => $this->input->post('rooting_sn_pf'),
                'menghisap_sn_pf' => $this->input->post('menghisap_sn_pf'),
                'babinski_sn_pf' => $this->input->post('babinski_sn_pf'),
                'menggenggam_sn_pf' => $this->input->post('menggenggam_sn_pf'),
                'menangis_sn_pf' => $this->input->post('menangis_sn_pf'),
                'berjalan_sn_pf' => $this->input->post('berjalan_sn_pf'),
                'tonic_sn_pf' => $this->input->post('tonic_sn_pf'),
                'nutrisi_sn_pf' => $this->input->post('nutrisi_sn_pf'),
                'tgl_bab_eliminasi' => $this->input->post('tgl_bab_eliminasi'),
                'jam_bab_eliminasi' => $this->input->post('jam_bab_eliminasi'),
                'tgl_bab2_eliminasi' => $this->input->post('tgl_bab2_eliminasi'),
                'jam_bab2_eliminasi' => $this->input->post('jam_bab2_eliminasi'),
                'meconium_eliminasi' => $this->input->post('meconium_eliminasi'),
                'lingkar_eliminasi' => $this->input->post('lingkar_eliminasi'),
                'dada_eliminasi' => $this->input->post('dada_eliminasi'),
                'perut_eliminasi' => $this->input->post('perut_eliminasi'),
                'dasar_imunisasi' => $this->input->post('dasar_imunisasi'),
                'hepatitis_imunisasi' => $this->input->post('hepatitis_imunisasi'),
                'dpt_imunisasi' => $this->input->post('dpt_imunisasi'),
                'polio_imunisasi' => $this->input->post('polio_imunisasi'),
                'campak_imunisasi' => $this->input->post('campak_imunisasi'),
                'wajah' => $this->input->post('wajah'),
                'ekstremitas' => $this->input->post('ekstremitas'),
                'gerakan' => $this->input->post('gerakan'),
                'menangis' => $this->input->post('menangis'),
                'kemampuan_ditenangkan' => $this->input->post('kemampuan_ditenangkan'),
                'skor_akhir' => $this->input->post('skor_akhir'),
                
            );
            // Data sudah ada, gunakan perintah update

            $this->M_ranap_bayi_baru_lahir->update_data($data, ['id_form' => $id_form], 'ass_bayi_baru_lahir');
            $this->M_ranap_bayi_baru_lahir->update_data($data1, ['id_fk' => $id_form], 'fk1_bayi_baru_lahir');
            $this->M_ranap_bayi_baru_lahir->update_data($data2, ['id_fk' => $id_form], 'fk2_bayi_baru_lahir');
        } else {
            $id_form = uniqid();

            $data = array(
                'id_form' => $id_form,
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'id_history' => $this->input->post('id_history'),
                'tgl_pengkajian' => $this->input->post('tgl_pengkajian'),
                'cara_masuk' => $this->input->post('cara_masuk'),
                'g_ibu' => $this->input->post('g_ibu'),
                'p_ibu' => $this->input->post('p_ibu'),
                'a_ibu' => $this->input->post('a_ibu'),
                'usia_kehamilan_ibu' => $this->input->post('usia_kehamilan_ibu'),
                'pres_bayi_ibu' => $this->input->post('pres_bayi_ibu'),
                'komp_antenatal_ibu' => $this->input->post('komp_antenatal_ibu'),
                'pem_antenatal_ibu' => $this->input->post('pem_antenatal_ibu'),
                'berat_ibu' => $this->input->post('berat_ibu'),
                'tinggi_ibu' => $this->input->post('tinggi_ibu'),
                'kead_um_ibu' => $this->input->post('kead_um_ibu'),
                'jenis_persalinan' => $this->input->post('jenis_persalinan'),
                'indikasi' => $this->input->post('indikasi'),
                'komp_persalinan' => $this->input->post('komp_persalinan'),
                'lam_ketu_pec' => $this->input->post('lam_ketu_pec'),
                'persalinan_di' => $this->input->post('persalinan_di'),
                'td_vital' => $this->input->post('td_vital'),
                'n_vital' => $this->input->post('n_vital'),
                'rr_vital' => $this->input->post('rr_vital'),
                's_vital' => $this->input->post('s_vital'),
                'fetus_vital' => $this->input->post('fetus_vital'),
                'kond_ketu_vital' => $this->input->post('kond_ketu_vital'),
                'pros_persalinan_vital' => $this->input->post('pros_persalinan_vital'),
                'keb_ibu_terdahulu' => $this->input->post('keb_ibu_terdahulu'),
                'staff' => $staff->id_staff,
            );

            $data1 = array(
                'id_fk' => $id_form,
                'lahir_bayi' => $this->input->post('lahir_bayi'),
                'jam_lahir_bayi' => $this->input->post('jam_lahir_bayi'),
                'jenkel_lahir_bayi' => $this->input->post('jenkel_lahir_bayi'),
                'kelahiran_bayi' => $this->input->post('kelahiran_bayi'),
                'nilai_APGAR_bayi' => $this->input->post('nilai_APGAR_bayi'),
                'deny_jantung_bayi' => $this->input->post('deny_jantung_bayi'),
                'usaha_nafas_bayi' => $this->input->post('usaha_nafas_bayi'),
                'tonus_otot_bayi' => $this->input->post('tonus_otot_bayi'),
                'reflek_bayi' => $this->input->post('reflek_bayi'),
                'warna_kulit_bayi' => $this->input->post('warna_kulit_bayi'),
                'total' => $this->input->post('total'),
                'cap_succedaneum' => $this->input->post('cap_succedaneum'),
                'cap_haematoma' => $this->input->post('cap_haematoma'),
                'cacat_bawaan' => $this->input->post('cacat_bawaan'),
                'rangsangan' => $this->input->post('rangsangan'),
                'peng_lendir' => $this->input->post('peng_lendir'),
                'ambu_bag' => $this->input->post('ambu_bag'),
                'mass_jantung' => $this->input->post('mass_jantung'),
                'intu_endo' => $this->input->post('intu_endo'),
                'o2' => $this->input->post('o2'),
            );

            $data2 = array(
                'id_fk' => $id_form,
                'umur_pf' => $this->input->post('umur_pf'),
                'hari_pf' => $this->input->post('hari_pf'),
                'jam_pf' => $this->input->post('jam_pf'),
                'suhu_pf' => $this->input->post('suhu_pf'),
                'berat_pf' => $this->input->post('berat_pf'),
                'panjang_pf' => $this->input->post('panjang_pf'),
                'lingkar_pf' => $this->input->post('lingkar_pf'),
                'kepala_pf' => $this->input->post('kepala_pf'),
                'ubun_pf' => $this->input->post('ubun_pf'),
                'sutura_pf' => $this->input->post('sutura_pf'),
                'telinga_pf' => $this->input->post('telinga_pf'),
                'hidung_pf' => $this->input->post('hidung_pf'),
                'leher_pf' => $this->input->post('leher_pf'),
                'mata_pf' => $this->input->post('mata_pf'),
                'dada_pf' => $this->input->post('dada_pf'),
                'tubuh_pf' => $this->input->post('tubuh_pf'),
                'mulut_pf' => $this->input->post('mulut_pf'),
                'pengerakan_pf' => $this->input->post('pengerakan_pf'),
                'bunyi_nafas_pf' => $this->input->post('bunyi_nafas_pf'),
                'pernapasan_pf' => $this->input->post('pernapasan_pf'),
                'denyut_jantung_pf' => $this->input->post('denyut_jantung_pf'),
                'perut_pf' => $this->input->post('perut_pf'),
                'bising_usus_pf' => $this->input->post('bising_usus_pf'),
                'mekonium_pf' => $this->input->post('mekonium_pf'),
                'punggung_pf' => $this->input->post('punggung_pf'),
                'kead_punggung_pf' => $this->input->post('kead_punggung_pf'),
                'laki_gene_pf' => $this->input->post('laki_gene_pf'),
                'testis_gene_pf' => $this->input->post('testis_gene_pf'),
                'perem_gene_pf' => $this->input->post('perem_gene_pf'),
                'anus_gene_pf' => $this->input->post('anus_gene_pf'),
                'jari_tangan_eks_pf' => $this->input->post('jari_tangan_eks_pf'),
                'jari_kaki_eks_pf' => $this->input->post('jari_kaki_eks_pf'),
                'pergerakan_eks_pf' => $this->input->post('pergerakan_eks_pf'),
                'tendon_sn_pf' => $this->input->post('tendon_sn_pf'),
                'moro_sn_pf' => $this->input->post('moro_sn_pf'),
                'rooting_sn_pf' => $this->input->post('rooting_sn_pf'),
                'menghisap_sn_pf' => $this->input->post('menghisap_sn_pf'),
                'babinski_sn_pf' => $this->input->post('babinski_sn_pf'),
                'menggenggam_sn_pf' => $this->input->post('menggenggam_sn_pf'),
                'menangis_sn_pf' => $this->input->post('menangis_sn_pf'),
                'berjalan_sn_pf' => $this->input->post('berjalan_sn_pf'),
                'tonic_sn_pf' => $this->input->post('tonic_sn_pf'),
                'nutrisi_sn_pf' => $this->input->post('nutrisi_sn_pf'),
                'tgl_bab_eliminasi' => $this->input->post('tgl_bab_eliminasi'),
                'jam_bab_eliminasi' => $this->input->post('jam_bab_eliminasi'),
                'tgl_bab2_eliminasi' => $this->input->post('tgl_bab2_eliminasi'),
                'jam_bab2_eliminasi' => $this->input->post('jam_bab2_eliminasi'),
                'meconium_eliminasi' => $this->input->post('meconium_eliminasi'),
                'lingkar_eliminasi' => $this->input->post('lingkar_eliminasi'),
                'dada_eliminasi' => $this->input->post('dada_eliminasi'),
                'perut_eliminasi' => $this->input->post('perut_eliminasi'),
                'dasar_imunisasi' => $this->input->post('dasar_imunisasi'),
                'hepatitis_imunisasi' => $this->input->post('hepatitis_imunisasi'),
                'dpt_imunisasi' => $this->input->post('dpt_imunisasi'),
                'polio_imunisasi' => $this->input->post('polio_imunisasi'),
                'campak_imunisasi' => $this->input->post('campak_imunisasi'),
                'wajah' => $this->input->post('wajah'),
                'ekstremitas' => $this->input->post('ekstremitas'),
                'gerakan' => $this->input->post('gerakan'),
                'menangis' => $this->input->post('menangis'),
                'kemampuan_ditenangkan' => $this->input->post('kemampuan_ditenangkan'),
                'skor_akhir' => $this->input->post('skor_akhir'),
            );
            // Data belum ada, gunakan perintah insert
            $this->M_ranap_bayi_baru_lahir->insert_data('ass_bayi_baru_lahir', $data);
            $this->M_ranap_bayi_baru_lahir->insert_data('fk1_bayi_baru_lahir', $data1);
            $this->M_ranap_bayi_baru_lahir->insert_data('fk2_bayi_baru_lahir', $data2);
        }
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function print_out($id_pelayanan, $id_history)
    {
        $data['data'] = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        $data['ass_bayi_baru_lahir'] = $this->M_ranap_bayi_baru_lahir->getDataMedisById($id_pelayanan);
        $data['diagnosa_utama'] = $this->db->get_where("diagnosa_utama", ["id_history" => $id_history])->row();
        $this->load->view('erm_ranap_print/view_bayi_baru_lahir_print', $data);
    }


    public function formopedit($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        $staff = $this->session->userdata('data_auth');
        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['nama'] = $selectPasien->nama;
        $page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
        $page_data['nama_dokter'] = $selectPasien->nama_dokter;
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history'] = $id_history;
        $page_data['staff'] = $staff->id_staff;

        $page_data['ass_bayi_baru_lahir'] = $this->M_ranap_bayi_baru_lahir->CekId($id_pelayanan);

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Ranap_Edit/view_bayi_baru_lahir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function edit_bayi_baru_lahir($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        $selectPasien2 = $this->M_Erm_ranap->selectPasienPulang($id_pelayanan, $id_history);
        $staff = $this->session->userdata('data_auth');

        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['nama'] = $selectPasien->nama;
        $page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
        $page_data['nama_dokter'] = $selectPasien->nama_dokter;
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history'] = $id_history;
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $page_data['staff'] = $staff->id_staff;

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Ranap_Edit/view_bayi_baru_lahir';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function bayi_baru_lahir()
    {
        $data = $this->session->userdata('data_auth');
        $tgl = date("Y-m-d h:i:s");
        $staff = $data->id_staff;
        $img = $this->input->post('ttd');
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = "assets/images/" . uniqid(time(), true) . ".png";
        $success = file_put_contents($file, $data);
        $img1 = $this->input->post('ttd1');
        $img1 = str_replace('data:image/png;base64,', '', $img1);
        $img1 = str_replace(' ', '+', $img1);
        $data1 = base64_decode($img1);
        $file1 = "assets/images/" . uniqid(time(), true) . ".png";
        $success1 = file_put_contents($file1, $data1);
        $this->form_validation->set_rules('catatan', 'Catatan', 'required');
        $this->form_validation->set_rules('alasan', 'Alasan', 'required');
        $this->form_validation->set_rules('sectio', 'Sectio', 'required');
        $this->form_validation->set_rules('pervagina', 'Pervagina', 'required');
        $this->form_validation->set_rules('jenis_persalinan', 'Jenis Persalinan', 'required');
        $this->form_validation->set_rules('rawat_gabung', 'Waktu Mulai', 'required');
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
        if ($this->form_validation->run()) {
            $data = array(
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'id_history' => $this->input->post('id_history'),
                'no_rm' => $this->input->post('no_rm'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                'no_rm' => $this->input->post('no_rm'),
                'pervagina' => $this->input->post('pervagina'),
                'caesaria' => $this->input->post('sectio'),
                'jenis_persalinan' => $this->input->post('jenis_persalinan'),
                'waktu_mulai' => $this->input->post('rawat_gabung'),
                'alasan' => $this->input->post('alasan'),
                'catatan' => $this->input->post('catatan'),
                'ttd' => $file,
                'ttd1' => $file1,
                'tanggal' => $tgl,
                'staff' => $staff,
            );
            // $data2 = array(
            // 	'id_pelayanan' => $this->input->post('id_pelayanan'),
            // 	'id_history' => $this->input->post('id_history'),
            // 	'no_rm' => $this->input->post('no_rm'),
            // );
            $this->M_Erm_ranap->insert($data, 'resume_pasien_pulang');
            // $this->M_Erm_ranap->insert($data2, 'riwayat_erm_ranap');
            $out['status'] = "success";
        } else {
            $out = array(
                'error'   => true,
                'nama_ibu' => form_error('nama_ibu'),
                'waktu_mulai' => form_error('waktu_mulai'),
                'jenis_persalinan' => form_error('jenis_persalinan'),
                'sectio' => form_error('sectio'),
                'rawat_gabung' => form_error('rawat_gabung'),
                'alasan' => form_error('alasan'),
                'pervagina' => form_error('pervagina'),
                'catatan' => form_error('catatan'),
            );
        }
        echo json_encode($out);
    }
    public function get_ass_per()
    {
        $id = $this->input->post('id');
        $db = $this->db->get_where('resume_pasien_pulang', ['id_history' => $id])->row_array();
        if ($db == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data = $db;
            echo json_encode($page_data);
            exit;
        }
    }
    public function tampil_list_diagnosa_ranap()
    {
        // $id_akun = 'dgok8itaesm';
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Erm->selectDataDiagnosaByIdPel($id_pelayanan);

        // $page_data = null;
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            // $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
            $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa1(\"" . $page_data[$i]->no_diagnosa . "\")' '><i class='fa fa-trash '></i></button>";


            $nama_dokter = $page_data[$i]->no_diagnosa;
            $kode = $page_data[$i]->kode;
            $nama_diagnosa = $page_data[$i]->nama_diagnosa;
            $tombol = $tombol;



            $out[$i] = array($nama_dokter, $kode, $nama_diagnosa, $tombol);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function tampil_list_diagnosa1()
    {
        // $id_akun = 'dgok8itaesm';
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->db->query("SELECT * from diagnosa_utama where id_history='$id_pelayanan'")->result();

        // $page_data = null;
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            // $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
            $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\""  . $page_data[$i]->no_diagnosa . "\")' '><i class='fa fa-trash '></i></button>";


            $nama_dokter = $page_data[$i]->no_diagnosa;
            $kode = $page_data[$i]->kode;
            $nama_diagnosa = $page_data[$i]->nama_diagnosa;
            $tombol = $tombol;



            $out[$i] = array($nama_dokter, $kode, $nama_diagnosa, $tombol);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function update_pasien_pulang()
    {
        $data = $this->session->userdata('data_auth');
        $tgl = date("Y-m-d h:i:s");
        $staff = $data->id_staff;
        $id = $this->input->post('id');
        $img = $this->input->post('ttd');
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = "assets/images/" . uniqid(time(), true) . ".png";
        $success = file_put_contents($file, $data);
        $img1 = $this->input->post('ttd1');
        $img1 = str_replace('data:image/png;base64,', '', $img1);
        $img1 = str_replace(' ', '+', $img1);
        $data1 = base64_decode($img1);
        $file1 = "assets/images/" . uniqid(time(), true) . ".png";
        $success1 = file_put_contents($file1, $data1);
        $this->form_validation->set_rules('catatan', 'Catatan', 'required');
        $this->form_validation->set_rules('alasan', 'Alasan', 'required');
        $this->form_validation->set_rules('sectio', 'Sectio', 'required');
        $this->form_validation->set_rules('pervagina', 'Pervagina', 'required');
        $this->form_validation->set_rules('jenis_persalinan', 'Jenis Persalinan', 'required');
        $this->form_validation->set_rules('rawat_gabung', 'Waktu Mulai', 'required');
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
        if ($this->form_validation->run()) {
            $data = array(
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'id_history' => $this->input->post('id_history'),
                'no_rm' => $this->input->post('no_rm'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                'no_rm' => $this->input->post('no_rm'),
                'pervagina' => $this->input->post('pervagina'),
                'caesaria' => $this->input->post('sectio'),
                'jenis_persalinan' => $this->input->post('jenis_persalinan'),
                'waktu_mulai' => $this->input->post('rawat_gabung'),
                'alasan' => $this->input->post('alasan'),
                'catatan' => $this->input->post('catatan'),
                'ttd' => $file,
                'ttd1' => $file1,
                'tanggal' => $tgl,
                'staff' => $staff,
            );

            $this->M_Erm_ranap->update_pasien_pulang($id, $data);
            $out['status'] = "success";
        } else {
            $out = array(
                'error'   => true,
                'nama_ibu' => form_error('nama_ibu'),
                'waktu_mulai' => form_error('waktu_mulai'),
                'jenis_persalinan' => form_error('jenis_persalinan'),
                'sectio' => form_error('sectio'),
                'rawat_gabung' => form_error('rawat_gabung'),
                'alasan' => form_error('alasan'),
                'pervagina' => form_error('pervagina'),
                'catatan' => form_error('catatan'),
            );
        }
        echo json_encode($out);
    }
}
