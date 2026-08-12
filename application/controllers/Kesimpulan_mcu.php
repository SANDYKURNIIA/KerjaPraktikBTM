<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kesimpulan_mcu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_mcu');
        $this->load->library('curl');
    }


    public function form($jenis, $id_mcu)
    {
        $this->load->view('assets/_header');
        // $page_data['data_dokter'] = $this->M_mcu->selectNamaDokter();
        $page_data['data_mcu'] = $this->M_mcu->getMCUById($id_mcu);
        $page_data['page_content'] = 'modal_mcu/' . $jenis;
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function get_data_pemeriksaan()
    {
        $id = $this->input->post('id');
        $db = $this->db->query("SELECT a.imt, a.rpp, a.sistol,a.diastol, a.kesimpulan_umum,a.skor_step, k.catatan cttn_keadaan_umum, m.catatan cttn_mata, t.catatan cttn_tht, l.catatan cttn_leher, d.catatan cttn_dada, p.catatan cttn_paru, j.catatan cttn_jantung, r.catatan cttn_perut, u.catatan cttn_urogenital, ag.catatan cttn_anggota_gerak, n.catatan cttn_neurologi
from antropometri a 
left join keadaan_umum_mcu k on a.id_mcu=k.id_mcu
left join pemeriksaan_mata_mcu m on a.id_mcu=m.id_mcu
left join pemeriksaan_tht_mcu t on a.id_mcu=t.id_mcu
left join pemeriksaan_leher_mcu l on a.id_mcu=l.id_mcu
left join pemeriksaan_dada_mcu d on a.id_mcu=d.id_mcu
left join penyakit_paru p on a.id_mcu=p.id_mcu
left join penyakit_jantung j on a.id_mcu=j.id_mcu
left join rongga_perut_mcu r on a.id_mcu=r.id_mcu
left join urogenital_mcu u on a.id_mcu=u.id_mcu
left join anggota_gerak_mcu ag on a.id_mcu=ag.id_mcu
left join pemeriksaan_neurologi n on a.id_mcu=n.id_mcu

        where a.id_mcu = '$id'")->result();
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
    }
    public function get_data_labor()
    {
        $id = $this->input->post('id');
        $labor1 = $this->db->get_where('form_labor', ['id_pelayanan' => $id])->result_array();
        if (count($labor1) > 0) {
            $groupall = array();

            foreach ($labor1 as $data2) {

                $param = array('ono' => 'A' . $data2['id_form_labor']);
                $labor = json_decode($this->curl->simple_get("http://192.168.87.2:8181/" . 'RESULTS', $param));

                if ($labor != "") {
                    // print_arr($labor);
                    // echo "<br>-------------------------------<br>";
                    $group = array();
                    $group1 = array();
                    foreach ($labor[0]->RESULT as $row) {
                        $group[$row->GROUP][] = $row;
                    }
                    foreach ($group as $key => $value) {
                        foreach ($value as $k) {
                            $flag = ($k->FLAG != "null") ? $k->FLAG : "";
                            if ($flag != "" && $flag != "N") {
                                $group1[] = $k;
                            }
                        }
                    }
                    $groupall = array_merge($groupall, $group1);
                } else {
                    $group1 = null;
                    $group1['status_dt'] = 'not found';
                    $groupall = array_merge($groupall, $group1);
                }
            }
            // print_arr($groupall);
            $db = $groupall;
            $db['status_dt'] = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }


        echo json_encode($db);
    }
    public function get_data_expertise()
    {
        $id = $this->input->post('id');
        $db = $this->db->query("SELECT l.nama, t.hasil_pemeriksaan FROM tindakan_radiologi_mcu m,list_tindakan_radiologi_mcu l, table_expertise t 
        where m.id_tindakan_radiologi=t.id_tindakan_radiologi and m.id_daftar_tindakan = l.id_daftar_tindakan
        and m.id_mcu = '$id'")->result_array();
        if (count($db) > 0) {
            $db = $db;
            $db['status_dt'] = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
    }
    public function simpan_okupasi()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');


        $mcu = $this->db->query("SELECT * from kesimpulan_okupasi where id_mcu ='$id'")->row();
        if (empty($mcu)) {

            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'kesimpulan_okupasi' => $this->input->post('kesimpulan_okupasi'),
                'rekomendasi_okupasi' => $this->input->post('rekomendasi_okupasi'),
                'status_kesehatan' => $this->input->post('status_kesehatan'),
                'resiko_skj' => $this->input->post('resiko_skj'),
                'saran_okupasi' => $this->input->post('saran_okupasi'),
                'hindari_tempat' => $this->input->post('hindari_tempat'),
                'hindari_kerja' => $this->input->post('hindari_kerja'),
                'ulangi_pemeriksaan' => $this->input->post('ulangi_pemeriksaan'),
                'staff' => $staff,

            ];
            $this->M_mcu->insert_tindakan($db, 'kesimpulan_okupasi');
        } else {

            $db = [
                'kesimpulan_okupasi' => $this->input->post('kesimpulan_okupasi'),
                'rekomendasi_okupasi' => $this->input->post('rekomendasi_okupasi'),
                'status_kesehatan' => $this->input->post('status_kesehatan'),
                'resiko_skj' => $this->input->post('resiko_skj'),
                'saran_okupasi' => $this->input->post('saran_okupasi'),
                'hindari_tempat' => $this->input->post('hindari_tempat'),
                'hindari_kerja' => $this->input->post('hindari_kerja'),
                'ulangi_pemeriksaan' => $this->input->post('ulangi_pemeriksaan'),
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];

            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'kesimpulan_okupasi');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function simpan_klinis()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');

        $pemeriksaan_fisik = [];
        $pemeriksaan_fisik_array = $this->input->post('pemeriksaan_fisik');
        foreach ($pemeriksaan_fisik_array as $key => $value) {
            if ($value != "") {
                $pemeriksaan_fisik[$key] = $value;
            }
        }
        // print_arr($pemeriksaan_tidak_kosong);
        $kesimpulan_spesialis = [];
        $kesimpulan_spesialis_array = $this->input->post('kesimpulan_spesialis');
        foreach ($kesimpulan_spesialis_array as $key1 => $value1) {
            if ($value1 != "") {
                $kesimpulan_spesialis[$key1] = $value1;
            }
        }
        // echo json_encode($pemeriksaan_fisik);
        $mcu = $this->db->query("SELECT * from kesimpulan_klinis where id_mcu ='$id'")->row();
        if (empty($mcu)) {

            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'KelebihanBB' => $this->input->post('KelebihanBB'),
                'ObesitasSentral' => $this->input->post('ObesitasSentral'),
                'TekananDarah' => $this->input->post('TekananDarah'),
                'KesimpulanAntropometri' => $this->input->post('KesimpulanAntropometri'),
                'Os' => $this->input->post('Os'),
                'Od' => $this->input->post('Od'),
                'StepTest' => $this->input->post('StepTest'),
                'pemeriksaan_fisik' => json_encode($pemeriksaan_fisik),
                'kesimpulan_spesialis' => json_encode($kesimpulan_spesialis),

                'kesimpulan_labor' => json_encode($this->input->post('kesimpulan_labor')),
                'kesimpulan_radiologi' => json_encode($this->input->post('kesimpulan_radiologi')),
                'saran_klinis' => $this->input->post('saran_klinis'),
                'kurangi' => $this->input->post('kurangi'),
                'konsul_ke' => $this->input->post('konsul_ke'),
                'ulangi_pemeriksaan' => $this->input->post('ulangi_pemeriksaan'),
                'pemeriksaan_lanjut' => $this->input->post('pemeriksaan_lanjut'),
                'staff' => $staff,

            ];
            $this->M_mcu->insert_tindakan($db, 'kesimpulan_klinis');
        } else {

            $db = [
                'KelebihanBB' => $this->input->post('KelebihanBB'),
                'ObesitasSentral' => $this->input->post('ObesitasSentral'),
                'TekananDarah' => $this->input->post('TekananDarah'),
                'KesimpulanAntropometri' => $this->input->post('KesimpulanAntropometri'),
                'Os' => $this->input->post('Os'),
                'Od' => $this->input->post('Od'),
                'StepTest' => $this->input->post('StepTest'),
                'pemeriksaan_fisik' => $pemeriksaan_fisik == [] ? "" : json_encode($pemeriksaan_fisik),
                'kesimpulan_spesialis' => $kesimpulan_spesialis == [] ? "" : json_encode($kesimpulan_spesialis),

                'kesimpulan_labor' => json_encode($this->input->post('kesimpulan_labor')),
                'kesimpulan_radiologi' => json_encode($this->input->post('kesimpulan_radiologi')),
                'saran_klinis' => $this->input->post('saran_klinis'),
                'kurangi' => $this->input->post('kurangi'),
                'konsul_ke' => $this->input->post('konsul_ke'),
                'ulangi_pemeriksaan' => $this->input->post('ulangi_pemeriksaan'),
                'pemeriksaan_lanjut' => $this->input->post('pemeriksaan_lanjut'),
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];

            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'kesimpulan_klinis');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function buku_mcu($id)
    {
        $this->load->library('pdf');
        $this->load->library('qrgenerator');

        $this->data['title']    = 'Buku MCU';
        $pasien = $this->M_mcu->getMCUById($id);
        $date = new DateTime($pasien['tgl_lahir']);
        $now = new DateTime();
        $interval = $now->diff($date);
        $page_data['pasien'] = $pasien['nama_pasien'] . ' (' . $pasien['jenis_kelamin'][0] . ',' . $interval->y . ' Th)';
        $page_data['identitas'] = $pasien;

        $page_data['antropometri'] = $this->db->get_where('antropometri', ['id_mcu' => $id])->row_array();
        $page_data['pemeriksaan_fisik'] = $this->get_data_pemeriksaan_id($id);
        $page_data['labor'] = $this->get_data_labor_id($id);
        $page_data['radiologi'] = $this->db->query("SELECT l.nama, t.*, m.dokter, m.gambar FROM tindakan_radiologi_mcu m
        join list_tindakan_radiologi_mcu l on m.id_daftar_tindakan = l.id_daftar_tindakan
        left join table_expertise t on m.id_tindakan_radiologi=t.id_tindakan_radiologi
        where m.id_mcu = '$id'")->result_array();
        
        $page_data['gigi'] = $this->db->get_where('gigi_mcu', ['id_mcu' => $id])->row_array();
        $page_data['kardiologi'] = $this->db->get_where('kardiologi_mcu', ['id_mcu' => $id])->row_array();
        $page_data['tht'] = $this->db->get_where('tht_mcu', ['id_mcu' => $id])->row_array();
        $page_data['audiometri'] = $this->db->get_where('audiometri_mcu', ['id_mcu' => $id])->row_array();
        $page_data['paru'] = $this->db->get_where('paru_mcu', ['id_mcu' => $id])->row_array();
        $page_data['spirometri'] = $this->db->get_where('spirometri_mcu', ['id_mcu' => $id])->row_array();
        $page_data['mata'] = $this->db->get_where('mata_mcu', ['id_mcu' => $id])->row_array();
        $page_data['neurologi'] = $this->db->get_where('neurologi_mcu', ['id_mcu' => $id])->row_array();
        $page_data['bedah'] = $this->db->get_where('bedah_mcu', ['id_mcu' => $id])->row_array();
        $page_data['kebidanan'] = $this->db->get_where('kebidanan_mcu', ['id_mcu' => $id])->row_array();
        $page_data['quiz_pemeriksaan_pribadi'] = $this->db->get_where('quiz_pemeriksaan_pribadi', ['id_mcu' => $id])->row_array();
        $page_data['klinis'] = $this->db->get_where('kesimpulan_klinis', ['id_mcu' => $id])->row_array();
        $page_data['klinis_col'] = $this->db->query("SELECT kelebihanBB, ObesitasSentral, TekananDarah, KesimpulanAntropometri, os, od, stepTest, pemeriksaan_fisik, kesimpulan_spesialis, kesimpulan_labor, kesimpulan_radiologi FROM kesimpulan_klinis where id_mcu='$id'")->row_array();
        $page_data['okupasi'] = $this->db->get_where('kesimpulan_okupasi', ['id_mcu' => $id])->row_array();
        $staff =  isset($page_data['okupasi']['staff'])?$this->db->get_where("staff", ['id_staff' => $page_data['okupasi']['staff']])->row():'';
        $page_data['staff'] = ($staff=='')?'-':$staff->nama;
        $page_data['qr_code_image'] = $this->qrgenerator->generate($page_data['staff'], 100, 5);

        $this->load->view('mcu_print/buku_mcu', $page_data);

        $this->dompdf->setPaper('A4', 'landscape');
        $html = $this->load->view('mcu_print/buku_mcu', $page_data, true);
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'potrait');
        $this->dompdf->set_option('isRemoteEnabled', true); // <-- object ini yang perlu kita tambahkan 
        $this->dompdf->render();
        $this->dompdf->stream("Buku MCU.pdf", array("Attachment" => 0));
    }
    public function get_data_pemeriksaan_id($id)
    {
        $db = $this->db->query("SELECT k.*, m.catatan cttn_mata,t.telinga,t.hidung,t.mulut, t.catatan cttn_tht, l.catatan cttn_leher, d.catatan cttn_dada, p.catatan cttn_paru, j.catatan cttn_jantung, r.catatan cttn_perut, u.catatan cttn_urogenital, ag.catatan cttn_anggota_gerak, n.catatan cttn_neurologi
from mcu a 
left join keadaan_umum_mcu k on a.id_mcu=k.id_mcu
left join pemeriksaan_mata_mcu m on a.id_mcu=m.id_mcu
left join pemeriksaan_tht_mcu t on a.id_mcu=t.id_mcu
left join pemeriksaan_leher_mcu l on a.id_mcu=l.id_mcu
left join pemeriksaan_dada_mcu d on a.id_mcu=d.id_mcu
left join penyakit_paru p on a.id_mcu=p.id_mcu
left join penyakit_jantung j on a.id_mcu=j.id_mcu
left join rongga_perut_mcu r on a.id_mcu=r.id_mcu
left join urogenital_mcu u on a.id_mcu=u.id_mcu
left join anggota_gerak_mcu ag on a.id_mcu=ag.id_mcu
left join pemeriksaan_neurologi n on a.id_mcu=n.id_mcu

        where a.id_mcu = '$id'")->row_array();

        return $db;
    }
    public function get_data_labor_id($id)
    {
        $labor1 = $this->db->get_where('form_labor', ['id_pelayanan' => $id])->result_array();
        if (count($labor1) > 0) {
            $groupall = array();

            foreach ($labor1 as $data2) {

                $param = array('ono' => 'A' . $data2['id_form_labor']);
                $labor = json_decode($this->curl->simple_get("http://192.168.87.2:8181/" . 'RESULTS', $param));

                if ($labor != "") {
                    // print_arr($labor);
                    // echo "<br>-------------------------------<br>";
                    $group = array();
                    $group1 = array();
                    foreach ($labor[0]->RESULT as $row) {
                        $group[$row->GROUP][] = $row;
                    }

                    $groupall = array_merge($groupall, $group);
                } else {
                    $groupall = null;
                }
            }
            // print_arr($groupall);
            $db = $groupall;
        } else {
            $db = null;
        }


        return $db;
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kesimpulan_mcu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_mcu');
        $this->load->library('curl');
    }


    public function form($jenis, $id_mcu)
    {
        $this->load->view('assets/_header');
        // $page_data['data_dokter'] = $this->M_mcu->selectNamaDokter();
        $page_data['data_mcu'] = $this->M_mcu->getMCUById($id_mcu);
        $page_data['page_content'] = 'modal_mcu/' . $jenis;
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function get_data_pemeriksaan()
    {
        $id = $this->input->post('id');
        $db = $this->db->query("SELECT a.imt, a.rpp, a.sistol,a.diastol, a.kesimpulan_umum,a.skor_step, k.catatan cttn_keadaan_umum, m.catatan cttn_mata, t.catatan cttn_tht, l.catatan cttn_leher, d.catatan cttn_dada, p.catatan cttn_paru, j.catatan cttn_jantung, r.catatan cttn_perut, u.catatan cttn_urogenital, ag.catatan cttn_anggota_gerak, n.catatan cttn_neurologi
from antropometri a 
left join keadaan_umum_mcu k on a.id_mcu=k.id_mcu
left join pemeriksaan_mata_mcu m on a.id_mcu=m.id_mcu
left join pemeriksaan_tht_mcu t on a.id_mcu=t.id_mcu
left join pemeriksaan_leher_mcu l on a.id_mcu=l.id_mcu
left join pemeriksaan_dada_mcu d on a.id_mcu=d.id_mcu
left join penyakit_paru p on a.id_mcu=p.id_mcu
left join penyakit_jantung j on a.id_mcu=j.id_mcu
left join rongga_perut_mcu r on a.id_mcu=r.id_mcu
left join urogenital_mcu u on a.id_mcu=u.id_mcu
left join anggota_gerak_mcu ag on a.id_mcu=ag.id_mcu
left join pemeriksaan_neurologi n on a.id_mcu=n.id_mcu

        where a.id_mcu = '$id'")->result();
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
    }
    public function get_data_labor()
    {
        $id = $this->input->post('id');
        $labor1 = $this->db->get_where('form_labor', ['id_pelayanan' => $id])->result_array();
        if (count($labor1) > 0) {
            $groupall = array();

            foreach ($labor1 as $data2) {

                $param = array('ono' => 'A' . $data2['id_form_labor']);
                $labor = json_decode($this->curl->simple_get("http://192.168.87.2:8181/" . 'RESULTS', $param));

                if ($labor != "") {
                    // print_arr($labor);
                    // echo "<br>-------------------------------<br>";
                    $group = array();
                    $group1 = array();
                    foreach ($labor[0]->RESULT as $row) {
                        $group[$row->GROUP][] = $row;
                    }
                    foreach ($group as $key => $value) {
                        foreach ($value as $k) {
                            $flag = ($k->FLAG != "null") ? $k->FLAG : "";
                            if ($flag != "" && $flag != "N") {
                                $group1[] = $k;
                            }
                        }
                    }
                    $groupall = array_merge($groupall, $group1);
                } else {
                    $group1 = null;
                    $group1['status_dt'] = 'not found';
                    $groupall = array_merge($groupall, $group1);
                }
            }
            // print_arr($groupall);
            $db = $groupall;
            $db['status_dt'] = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }


        echo json_encode($db);
    }
    public function get_data_expertise()
    {
        $id = $this->input->post('id');
        $db = $this->db->query("SELECT l.nama, t.hasil_pemeriksaan FROM tindakan_radiologi_mcu m,list_tindakan_radiologi_mcu l, table_expertise t 
        where m.id_tindakan_radiologi=t.id_tindakan_radiologi and m.id_daftar_tindakan = l.id_daftar_tindakan
        and m.id_mcu = '$id'")->result_array();
        if (count($db) > 0) {
            $db = $db;
            $db['status_dt'] = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
    }
    public function simpan_okupasi()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');


        $mcu = $this->db->query("SELECT * from kesimpulan_okupasi where id_mcu ='$id'")->row();
        if (empty($mcu)) {

            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'kesimpulan_okupasi' => $this->input->post('kesimpulan_okupasi'),
                'rekomendasi_okupasi' => $this->input->post('rekomendasi_okupasi'),
                'status_kesehatan' => $this->input->post('status_kesehatan'),
                'resiko_skj' => $this->input->post('resiko_skj'),
                'saran_okupasi' => $this->input->post('saran_okupasi'),
                'hindari_tempat' => $this->input->post('hindari_tempat'),
                'hindari_kerja' => $this->input->post('hindari_kerja'),
                'ulangi_pemeriksaan' => $this->input->post('ulangi_pemeriksaan'),
                'staff' => $staff,

            ];
            $this->M_mcu->insert_tindakan($db, 'kesimpulan_okupasi');
        } else {

            $db = [
                'kesimpulan_okupasi' => $this->input->post('kesimpulan_okupasi'),
                'rekomendasi_okupasi' => $this->input->post('rekomendasi_okupasi'),
                'status_kesehatan' => $this->input->post('status_kesehatan'),
                'resiko_skj' => $this->input->post('resiko_skj'),
                'saran_okupasi' => $this->input->post('saran_okupasi'),
                'hindari_tempat' => $this->input->post('hindari_tempat'),
                'hindari_kerja' => $this->input->post('hindari_kerja'),
                'ulangi_pemeriksaan' => $this->input->post('ulangi_pemeriksaan'),
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];

            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'kesimpulan_okupasi');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function simpan_klinis()
    {
        $data = $this->session->userdata('data_auth');
        $staff = $data->id_staff;
        $id = $this->input->post('id_mcu');

        $pemeriksaan_fisik = [];
        $pemeriksaan_fisik_array = $this->input->post('pemeriksaan_fisik');
        foreach ($pemeriksaan_fisik_array as $key => $value) {
            if ($value != "") {
                $pemeriksaan_fisik[$key] = $value;
            }
        }
        // print_arr($pemeriksaan_tidak_kosong);
        $kesimpulan_spesialis = [];
        $kesimpulan_spesialis_array = $this->input->post('kesimpulan_spesialis');
        foreach ($kesimpulan_spesialis_array as $key1 => $value1) {
            if ($value1 != "") {
                $kesimpulan_spesialis[$key1] = $value1;
            }
        }
        // echo json_encode($pemeriksaan_fisik);
        $mcu = $this->db->query("SELECT * from kesimpulan_klinis where id_mcu ='$id'")->row();
        if (empty($mcu)) {

            $db = [
                'id_mcu' => $this->input->post('id_mcu'),
                'KelebihanBB' => $this->input->post('KelebihanBB'),
                'ObesitasSentral' => $this->input->post('ObesitasSentral'),
                'TekananDarah' => $this->input->post('TekananDarah'),
                'KesimpulanAntropometri' => $this->input->post('KesimpulanAntropometri'),
                'Os' => $this->input->post('Os'),
                'Od' => $this->input->post('Od'),
                'StepTest' => $this->input->post('StepTest'),
                'pemeriksaan_fisik' => json_encode($pemeriksaan_fisik),
                'kesimpulan_spesialis' => json_encode($kesimpulan_spesialis),

                'kesimpulan_labor' => json_encode($this->input->post('kesimpulan_labor')),
                'kesimpulan_radiologi' => json_encode($this->input->post('kesimpulan_radiologi')),
                'saran_klinis' => $this->input->post('saran_klinis'),
                'kurangi' => $this->input->post('kurangi'),
                'konsul_ke' => $this->input->post('konsul_ke'),
                'ulangi_pemeriksaan' => $this->input->post('ulangi_pemeriksaan'),
                'pemeriksaan_lanjut' => $this->input->post('pemeriksaan_lanjut'),
                'staff' => $staff,

            ];
            $this->M_mcu->insert_tindakan($db, 'kesimpulan_klinis');
        } else {

            $db = [
                'KelebihanBB' => $this->input->post('KelebihanBB'),
                'ObesitasSentral' => $this->input->post('ObesitasSentral'),
                'TekananDarah' => $this->input->post('TekananDarah'),
                'KesimpulanAntropometri' => $this->input->post('KesimpulanAntropometri'),
                'Os' => $this->input->post('Os'),
                'Od' => $this->input->post('Od'),
                'StepTest' => $this->input->post('StepTest'),
                'pemeriksaan_fisik' => $pemeriksaan_fisik == [] ? "" : json_encode($pemeriksaan_fisik),
                'kesimpulan_spesialis' => $kesimpulan_spesialis == [] ? "" : json_encode($kesimpulan_spesialis),

                'kesimpulan_labor' => json_encode($this->input->post('kesimpulan_labor')),
                'kesimpulan_radiologi' => json_encode($this->input->post('kesimpulan_radiologi')),
                'saran_klinis' => $this->input->post('saran_klinis'),
                'kurangi' => $this->input->post('kurangi'),
                'konsul_ke' => $this->input->post('konsul_ke'),
                'ulangi_pemeriksaan' => $this->input->post('ulangi_pemeriksaan'),
                'pemeriksaan_lanjut' => $this->input->post('pemeriksaan_lanjut'),
                'staff' => $staff,
                'tgl_input' => date('Y-m-d H:i:s'),
            ];

            $where = ['id_mcu' => $this->input->post('id_mcu')];
            $this->M_mcu->update($db, $where, 'kesimpulan_klinis');
        }

        $response['status'] = "success";
        echo json_encode($response);
    }

    public function buku_mcu($id)
    {
        $this->load->library('pdf');
        $this->load->library('qrgenerator');

        $this->data['title']    = 'Buku MCU';
        $pasien = $this->M_mcu->getMCUById($id);
        $date = new DateTime($pasien['tgl_lahir']);
        $now = new DateTime();
        $interval = $now->diff($date);
        $page_data['pasien'] = $pasien['nama_pasien'] . ' (' . $pasien['jenis_kelamin'][0] . ',' . $interval->y . ' Th)';
        $page_data['identitas'] = $pasien;

        $page_data['antropometri'] = $this->db->get_where('antropometri', ['id_mcu' => $id])->row_array();
        $page_data['pemeriksaan_fisik'] = $this->get_data_pemeriksaan_id($id);
        $page_data['labor'] = $this->get_data_labor_id($id);
        $page_data['radiologi'] = $this->db->query("SELECT l.nama, t.*, m.dokter, m.gambar FROM tindakan_radiologi_mcu m
        join list_tindakan_radiologi_mcu l on m.id_daftar_tindakan = l.id_daftar_tindakan
        left join table_expertise t on m.id_tindakan_radiologi=t.id_tindakan_radiologi
        where m.id_mcu = '$id'")->result_array();
        
        $page_data['gigi'] = $this->db->get_where('gigi_mcu', ['id_mcu' => $id])->row_array();
        $page_data['kardiologi'] = $this->db->get_where('kardiologi_mcu', ['id_mcu' => $id])->row_array();
        $page_data['tht'] = $this->db->get_where('tht_mcu', ['id_mcu' => $id])->row_array();
        $page_data['audiometri'] = $this->db->get_where('audiometri_mcu', ['id_mcu' => $id])->row_array();
        $page_data['paru'] = $this->db->get_where('paru_mcu', ['id_mcu' => $id])->row_array();
        $page_data['spirometri'] = $this->db->get_where('spirometri_mcu', ['id_mcu' => $id])->row_array();
        $page_data['mata'] = $this->db->get_where('mata_mcu', ['id_mcu' => $id])->row_array();
        $page_data['neurologi'] = $this->db->get_where('neurologi_mcu', ['id_mcu' => $id])->row_array();
        $page_data['bedah'] = $this->db->get_where('bedah_mcu', ['id_mcu' => $id])->row_array();
        $page_data['kebidanan'] = $this->db->get_where('kebidanan_mcu', ['id_mcu' => $id])->row_array();
        $page_data['quiz_pemeriksaan_pribadi'] = $this->db->get_where('quiz_pemeriksaan_pribadi', ['id_mcu' => $id])->row_array();
        $page_data['klinis'] = $this->db->get_where('kesimpulan_klinis', ['id_mcu' => $id])->row_array();
        $page_data['klinis_col'] = $this->db->query("SELECT kelebihanBB, ObesitasSentral, TekananDarah, KesimpulanAntropometri, os, od, stepTest, pemeriksaan_fisik, kesimpulan_spesialis, kesimpulan_labor, kesimpulan_radiologi FROM kesimpulan_klinis where id_mcu='$id'")->row_array();
        $page_data['okupasi'] = $this->db->get_where('kesimpulan_okupasi', ['id_mcu' => $id])->row_array();
        $staff =  isset($page_data['okupasi']['staff'])?$this->db->get_where("staff", ['id_staff' => $page_data['okupasi']['staff']])->row():'';
        $page_data['staff'] = ($staff=='')?'-':$staff->nama;
        $page_data['qr_code_image'] = $this->qrgenerator->generate($page_data['staff'], 100, 5);

        $this->load->view('mcu_print/buku_mcu', $page_data);

        $this->dompdf->setPaper('A4', 'landscape');
        $html = $this->load->view('mcu_print/buku_mcu', $page_data, true);
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'potrait');
        $this->dompdf->set_option('isRemoteEnabled', true); // <-- object ini yang perlu kita tambahkan 
        $this->dompdf->render();
        $this->dompdf->stream("Buku MCU.pdf", array("Attachment" => 0));
    }
    public function get_data_pemeriksaan_id($id)
    {
        $db = $this->db->query("SELECT k.*, m.catatan cttn_mata,t.telinga,t.hidung,t.mulut, t.catatan cttn_tht, l.catatan cttn_leher, d.catatan cttn_dada, p.catatan cttn_paru, j.catatan cttn_jantung, r.catatan cttn_perut, u.catatan cttn_urogenital, ag.catatan cttn_anggota_gerak, n.catatan cttn_neurologi
from mcu a 
left join keadaan_umum_mcu k on a.id_mcu=k.id_mcu
left join pemeriksaan_mata_mcu m on a.id_mcu=m.id_mcu
left join pemeriksaan_tht_mcu t on a.id_mcu=t.id_mcu
left join pemeriksaan_leher_mcu l on a.id_mcu=l.id_mcu
left join pemeriksaan_dada_mcu d on a.id_mcu=d.id_mcu
left join penyakit_paru p on a.id_mcu=p.id_mcu
left join penyakit_jantung j on a.id_mcu=j.id_mcu
left join rongga_perut_mcu r on a.id_mcu=r.id_mcu
left join urogenital_mcu u on a.id_mcu=u.id_mcu
left join anggota_gerak_mcu ag on a.id_mcu=ag.id_mcu
left join pemeriksaan_neurologi n on a.id_mcu=n.id_mcu

        where a.id_mcu = '$id'")->row_array();

        return $db;
    }
    public function get_data_labor_id($id)
    {
        $labor1 = $this->db->get_where('form_labor', ['id_pelayanan' => $id])->result_array();
        if (count($labor1) > 0) {
            $groupall = array();

            foreach ($labor1 as $data2) {

                $param = array('ono' => 'A' . $data2['id_form_labor']);
                $labor = json_decode($this->curl->simple_get("http://192.168.87.2:8181/" . 'RESULTS', $param));

                if ($labor != "") {
                    // print_arr($labor);
                    // echo "<br>-------------------------------<br>";
                    $group = array();
                    $group1 = array();
                    foreach ($labor[0]->RESULT as $row) {
                        $group[$row->GROUP][] = $row;
                    }

                    $groupall = array_merge($groupall, $group);
                } else {
                    $groupall = null;
                }
            }
            // print_arr($groupall);
            $db = $groupall;
        } else {
            $db = null;
        }


        return $db;
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
