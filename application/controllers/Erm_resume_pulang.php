<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erm_resume_pulang extends CI_Controller
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
        $this->load->model('M_Erm_poli');
        $this->load->model('M_Formulir_resume_pulang');
        $this->load->model('M_Apelkes');
    }
    public function insert($data)
    {

        $this->load->model('M_Formulir_resume_pulang');
        // Fungsi ini digunakan untuk menyimpan data ke tabel laporan_operasi
        $this->db->insert('resume_pulang', $data);
        $this->load->view('erm_form/Ranap/view_resume_pulang');
        return $this->db->insert_id();
    }

    public function form_resume_pulang($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        // $selectPasien2 = $this->M_Erm->selectPasienIGDById($id_rm);
        $staff = $this->session->userdata('data_auth');
        $page_data['nama'] = $selectPasien->nama;
        $page_data['status'] = $selectPasien->status;
        $page_data['nama_ruangan'] = $selectPasien->nama_ruangan;
        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['agama'] = $selectPasien->agama;
        $page_data['kelas'] = $selectPasien->kelas;
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
        $page_data['alamat'] = $selectPasien->alamat;
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history'] = $id_history;
        $page_data['ruangan'] = $this->M_Formulir_resume_pulang->getAktifRuangan();
        $page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $page_data['dokter'] = $selectPasien->nama_dokter;
        $page_data['poli'] = $selectPasien->poli;
        $page_data['alamat'] = $selectPasien->alamat;
        $page_data['kelas'] = $selectPasien->kelas;
        $page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
        $page_data['staff'] = $staff->id_staff;
        $page_data['agama'] = $selectPasien->agama;
        $page_data['status'] = $selectPasien->status;
        // $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();


        $page_data['pasien'] = $selectPasien;


        // Memanggil method getDataDokter dari model Dokter_model
        // $data['dokterOptions'] = $this->Dokter_Model->getDokterOptions();


        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Ranap/view_resume_pulang';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function simpan()
    {
        $staff = $this->session->userdata('data_auth');

        // Ambil input utama
        $id_pelayanan = $this->input->post('id_pelayanan');
        $no_rm        = $this->input->post('no_rm');
        $id_history   = $this->input->post('id_history');

        $alasan          = $this->input->post('alasan');
        $riwayat         = $this->input->post('riwayat');
        $prosedur_terapi = $this->input->post('prosedur_terapi');
        $diagnosa2 = $this->input->post('diagnosa2');
        $keadaan_pulang  = $this->input->post('keadaan_pulang');
        $edukasi         = $this->input->post('edukasi');

        // Diagnosa bisa dikirim array; simpan sebagai JSON
        $diagnosa_post = $this->input->post('diagnosa');
        $diagnosa_json = is_array($diagnosa_post) ? json_encode($diagnosa_post, JSON_UNESCAPED_UNICODE) : (string)$diagnosa_post;

        // Diagnostik bisa dikirim sebagai string gabungan atau array checkbox → normalisasi ke string
        $diagnostik_post = $this->input->post('diagnostik');
        if (is_array($diagnostik_post)) {
            $diagnostik_post = implode(', ', $diagnostik_post);
        }
        $diagnostik = (string)$diagnostik_post;

        // Normalisasi tgl_kontrol → YYYY-MM-DD atau NULL
        $tgl_kontrol_post = trim((string)$this->input->post('tgl_kontrol'));
        if ($tgl_kontrol_post === '') {
            $tgl_kontrol = null;
        } else {
            $ts = strtotime($tgl_kontrol_post);
            $tgl_kontrol = $ts ? date('Y-m-d', $ts) : null;
        }

        // Cek apakah data resume_pulang untuk id_pelayanan ini sudah ada
        $cek = $this->db->query(
            "SELECT COUNT(*) AS count FROM resume_pulang WHERE id_pelayanan = ?",
            [$id_pelayanan]
        )->row();

        $id_list_poli = $this->input->post('id_list_poli') ?: null;

        // Payload untuk INSERT / UPDATE
        $payload = [
            'no_rm'           => $no_rm,
            'id_pelayanan'    => $id_pelayanan,
            'id_history'      => $id_history,
            'alasan'          => $alasan,
            'riwayat'         => $riwayat,
            'diagnostik'      => $diagnostik,      // ← BARU
            'diagnosa'        => $diagnosa_json,
            'prosedur_terapi' => $prosedur_terapi,
            'diagnosa2'       => $diagnosa2,
            'keadaan_pulang'  => $keadaan_pulang,
            'edukasi'         => $edukasi,
            'tgl_kontrol'     => $tgl_kontrol,     // ← BARU
            'id_list_poli' => $id_list_poli,
            'staff'           => isset($staff->id_staff) ? $staff->id_staff : null,
        ];

        if (empty($cek) || (int)$cek->count === 0) {
            // INSERT
            $this->M_Erm->insert($payload, 'resume_pulang');
        } else {
            // UPDATE
            $payload['created_at'] = date('Y-m-d H:i:s'); // mengikuti pola yang sudah ada di kode kamu
            $where = ['id_pelayanan' => $id_pelayanan];
            $this->M_Erm->update($payload, $where, 'resume_pulang');
        }

        echo json_encode(['status' => 'success']);
    }

    public function get_data_resume()
    {
        $id = $this->input->post('id');
        $id_history = $this->input->post('id_history');


        $poli = $this->db->query("SELECT d_ranap.keluhan_utama, d_ranap.riwayat_sekarang,u.kode,u.nama_diagnosa from diagnosa_utama u
        left join form_assesmen_dokter d on u.id_history = d.id_history
        left join  form_assesmen_awal_rajal f on f.id_history = u.id_history
        left join form_ass_dokter_ranap d_ranap on u.id_history = d_ranap.id_history
        where u.id_pelayanan = '$id'  and SUBSTRING_INDEX(u.id_history, '_', 1) ='ranap'")->row();

        $dataResumePulang = $this->db->query("SELECT u.alasan , u.diagnostik , u.tgl_kontrol ,u.id_list_poli , d.nama_panjang from resume_pulang u
        left join list_poli d on u.id_list_poli = d.id_list_poli

        where u.id_history = '$id_history'")->row();


        // Jika tidak ada history ranap
        if (!$poli) {
            $poli = $this->db->query("SELECT rp.alasan as alasan_pulang , keluhan_utama, u.kode,u.nama_diagnosa from diagnosa_utama u
            left join form_assesmen_dokter d on u.id_history = d.id_history
            left join  form_assesmen_awal_rajal f on f.id_history = u.id_history
            left join resume_pulang rp on  rp.id_history = u.id_history
            where u.id_pelayanan = '$id'  and SUBSTRING_INDEX(u.id_history, '_', 1) !='ranap'")->row();
        }








        $igd = $this->db->query("SELECT keluhan, u.kode,u.nama_diagnosa from diagnosa_utama u
        left join form_ass_dokter_igd d on u.id_history = d.id_history
        left join  form_ass_per_igd f  on f.id_history = u.id_history
        where u.id_pelayanan = '$id'  and SUBSTRING_INDEX(u.id_history, '_', 1) !='ranap'")->row();




        $resume = $this->M_Erm_ranap->getResumePulangById($id, $id_history);


        if (!empty($resume)) {
            $resume = $resume;
            $diagnosa = json_decode($resume->diagnosa);
        } else {
            $resume = $this->M_Erm_ranap->getResumePulang($id, $id_history);
            $diagnosa = $this->db->query("SELECT concat(d.kode,' - ',d.nama_diagnosa) diagnosa,'Primer' ket
        from diagnosa_utama d
        where d.id_history='$id_history'
        UNION ALL
        SELECT concat(e.kode,' - ',e.nama_diagnosa) diagnosa, 'Sekunder' ket
        from erm_diagnosa_dokter e
        where e.id_history='$id_history'")->result();
        }
        if (isset($poli) || (isset($poli) && isset($igd))) {
            $db = [
                'alasan' => $poli->keluhan_utama,
                'diagnosa' => $poli->kode . ' - ' . $poli->nama_diagnosa,
                'resume' => $resume,
                'diagnosa_ranap' => $diagnosa,
                'alasan_pulang' => $dataResumePulang->alasan,
                'riwayat_sekarang' => $poli->riwayat_sekarang,
                'terlampir' => $dataResumePulang->diagnostik,
                'tgl_kontrol' => $dataResumePulang->tgl_kontrol,
                'nama_panjang' => $dataResumePulang->nama_panjang,
                'status' => 'success'
            ];
        } else {
            if (isset($igd)) {
                $db = [
                    'alasan' => $igd->keluhan,
                    'diagnosa' => $igd->kode . ' - ' . $igd->nama_diagnosa,
                    'riwayat_sekarang' => 'coba',
                    'resume' => $resume,
                    'diagnosa_ranap' => $diagnosa,
                    'status' => 'success'
                ];
            } else {
                $db = [
                    'status' => 'failed',
                    'message' => 'tidak ada data Resume '
                ];
            }
        }
        if ($db == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data = $db;
            echo json_encode($page_data);
            exit;
        }
    }





    public function print_out($id_pelayanan, $id_history)
    {
        // $data['data'] = $this->M_laporan_operasi_model->getData($id_pelayanan);
        $data['pasien'] = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        $data['resume'] = $this->M_Erm_ranap->getResumePulang($id_pelayanan, $id_history);
        $data['id_pelayanan'] = $id_pelayanan;
        $data['id_history'] = $id_history;
        $data['diagnosa_sekunder'] = $this->M_Erm->selectDataDiagnosaByIdPel($id_history);
        $data['terapi'] = $this->M_Erm->selectTerapiByIdPel($id_pelayanan);

        // $this->load->view('assets/_header');

        $visite = $this->M_Apelkes->getDokterPendamping($id_pelayanan);

        $dokter_list = array_map(function ($v) {
            $nama = str_replace(['<br>', '<br/>', '<br />'], ' ', $v->dokter);
            $nama = preg_replace("/(\r\n|\r|\n)/", " ", $nama);

            $nama = preg_replace('/\s+/', ' ', $nama);

            return trim($nama);
        }, $visite);

        $dokter_list = array_unique($dokter_list);
        $nama_dokter_utama = trim($data['pasien']->nama_dokter ?? '');

        $dokter_list = array_filter($dokter_list, function ($dok) use ($nama_dokter_utama) {
            return strtolower(trim($dok)) !== strtolower($nama_dokter_utama);
        });

        $data['dokter_pendamping'] = $dokter_list;

        $this->load->view('erm_print/view_resume_pulang_print', $data);
        // $this->load->view('assets/_footer');

    }

    public function store()
    {
        $this->load->model('M_Formulir_resume_pulang');
        $id_pelayanan = $this->input->post('id_pelayanan');
        $existing_data = $this->M_Formulir_resume_pulang->CekId($id_pelayanan);
        // Menangani pengiriman data dari form ke database
        {
            $data = array(
                // 'Ruang' => $this->input->post('Ruang'),
                'no_rm' => $this->input->post('no_rm'),


                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'id_history' => $this->input->post('id_history'),
                // 'kelas' => $this->input->post('kelas'),
                // 'nama_pasien' => $this->input->post('nama_pasien'),
                // 'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                // 'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'tgl_keluar' => $this->input->post('tgl_keluar'),
                'alasan' => $this->input->post('alasan'),
                'riwayat' => $this->input->post('riwayat'),
                'p_fisik' => $this->input->post('p_fisik'),
                'hasil' => $this->input->post('hasil'),
                'diagnosa' => $this->input->post('diagnosa'),
                'diagnosa_utama' => $this->input->post('diagnosa_utama'),
                'prosedur_terapi' => $this->input->post('prosedur_terapi'),
                'terapi_obat' => $this->input->post('terapi_obat'),
                'keadaan' => $this->input->post('keadaan'),
                'edukasi' => $this->input->post('edukasi'),
                'diagnosa_sekunder' => $this->input->post('diagnosa_sekunder'),
                'kondisi_bayi' => $this->input->post('kondisi_bayi'),
                'jenis_kelamin_bayi' => $this->input->post('jenis_kelamin_bayi'),
                'bb_pb' => $this->input->post('bb_pb'),
                'apgar_score' => $this->input->post('apgar_score'),
                'kontrol_kembali' => $this->input->post('kontrol_kembali'),
                'pukul' => $this->input->post('pukul'),

                // Kemudian, Anda dapat mengirimkan data ini ke view atau melakukan hal lain sesuai kebutuhan
                // $this->load->view('erm_form/Ranap/view_data_dokter_aktif', $data);

                // $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
                // $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;


            );
            if ($existing_data) {
                // Data sudah ada, gunakan perintah update
                $this->M_Formulir_resume_pulang->update_data_pasien($id_pelayanan, $data);
            } else {
                // Data belum ada, gunakan perintah insert
                $this->M_Formulir_resume_pulang->insert_data_pasien($data);
            }
        }
        $out['status'] = "success";

        echo json_encode($out);
    }
    public function formresumepulang($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        $staff = $this->session->userdata('data_auth');

        $page_data['nama'] = $selectPasien->nama;
        $page_data['status'] = $selectPasien->status;
        $page_data['nama_ruangan'] = $selectPasien->nama_ruangan;
        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['alamat'] = $selectPasien->alamat;
        $page_data['kelas'] = $selectPasien->kelas;
        $page_data['agama'] = $selectPasien->agama;
        $page_data['dokter'] = $selectPasien->nama_dokter;
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
        $page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history'] = $id_history;
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $page_data['pasien'] = $selectPasien;

        // Memanggil method getDataDokter dari model Dokter_model
        // $data['dokterOptions'] = $this->Dokter_Model->getDokterOptions();

        $page_data['per'] = empty($asses_per_igd) ? null : $asses_per_igd;
        $asses_dokter_igd = $this->M_Erm_poli->checkData($id_history, 'form_assesmen_dokter');
        $diagnosa1 = $this->db->query("SELECT * from diagnosa_utama where id_history='$id_history'")->row_array();
        // $diagnosa2 = $this->db->query("SELECT * from erm_diagnosa_dokter where id_pelayanan='$id_pelayanan'")->row_array();

        $page_data['diagnosa_utama'] = $diagnosa1;
        // $page_data['diagnosa_utama'] = $diagnosa2;
        $page_data['dok'] = empty($asses_dokter_igd) ? null : $asses_dokter_igd;
        $page_data['form_perawat'] = $this->db->get_where('form_assesmen_awal_rajal', ['id_pelayanan' => $id_pelayanan])->row();
        $page_data['form_dokter'] = $this->db->get_where('form_assesmen_dokter', ['id_pelayanan' => $id_pelayanan])->row();

        // Kemudian, Anda dapat mengirimkan data ini ke view atau melakukan hal lain sesuai kebutuhan
        // $this->load->view('erm_form/Ranap/view_data_dokter_aktif', $data);

        // $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
        // $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Ranap/view_resume_pulang';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function formresumepulang_riwayat($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        $staff = $this->session->userdata('data_auth');

        $page_data['nama'] = $selectPasien->nama;
        $page_data['status'] = $selectPasien->status;
        $page_data['nama_ruangan'] = $selectPasien->nama_ruangan;
        $page_data['alamat'] = $selectPasien->alamat;
        $page_data['agama'] = $selectPasien->agama;
        $page_data['dokter'] = $selectPasien->nama_dokter;
        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['kelas'] = $selectPasien->kelas;
        $page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history'] = $id_history;

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Ranap/view_resume_pulang';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function formedit($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        $staff = $this->session->userdata('data_auth');
        $page_data['resume_pulang'] = $this->db->get_where("resume_pulang", ["id_pelayanan" => $id_pelayanan])->row_array();
        $page_data['status'] = $selectPasien->status;
        $page_data['nama'] = $selectPasien->nama;
        $page_data['alamat'] = $selectPasien->alamat;
        $page_data['agama'] = $selectPasien->agama;
        $page_data['dokter'] = $selectPasien->nama_dokter;
        $page_data['diagnosa'] = $selectPasien->diagnosa;
        $page_data['nama_ruangan'] = $selectPasien->nama_ruangan;
        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['kelas'] = $selectPasien->kelas;
        $page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history'] = $id_history;
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $page_data['pasien'] = $selectPasien;

        // Memanggil method getDataDokter dari model Dokter_model
        // $data['dokterOptions'] = $this->Dokter_Model->getDokterOptions();

        $page_data['per'] = empty($asses_per_igd) ? null : $asses_per_igd;
        $asses_dokter_igd = $this->M_Erm_poli->checkData($id_history, 'form_assesmen_dokter');
        $diagnosa1 = $this->db->query("SELECT * from diagnosa_utama where id_pelayanan='$id_pelayanan'")->row_array();
        $diagnosa2 = $this->db->query("SELECT * from erm_diagnosa_dokter where id_pelayanan='$id_pelayanan'")->row_array();

        $page_data['diagnosa_utama'] = $diagnosa1;
        $page_data['diagnosa_sekunder'] = $diagnosa2;
        $page_data['dok'] = empty($asses_dokter_igd) ? null : $asses_dokter_igd;
        $page_data['form_perawat'] = $this->db->get_where('form_assesmen_awal_rajal', ['id_pelayanan' => $id_pelayanan])->row();
        $page_data['form_dokter'] = $this->db->get_where('form_assesmen_dokter', ['id_pelayanan' => $id_pelayanan])->row();

        // Kemudian, Anda dapat mengirimkan data ini ke view atau melakukan hal lain sesuai kebutuhan
        // $this->load->view('erm_form/Ranap/view_data_dokter_aktif', $data);

        // $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
        // $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;


        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Ranap_Edit/view_resume_pulang';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function riwayat_resumepulang($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
        $staff = $this->session->userdata('data_auth');

        $page_data['nama'] = $selectPasien->nama;
        $page_data['status'] = $selectPasien->status;
        $page_data['nama_ruangan'] = $selectPasien->nama_ruangan;
        $page_data['alamat'] = $selectPasien->alamat;
        $page_data['agama'] = $selectPasien->agama;
        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
        $page_data['dokter'] = $selectPasien->nama_dokter;
        $page_data['kelas'] = $selectPasien->kelas;
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history'] = $id_history;
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $page_data['pasien'] = $selectPasien;

        // Memanggil method getDataDokter dari model Dokter_model
        // $data['dokterOptions'] = $this->Dokter_Model->getDokterOptions();

        $page_data['per'] = empty($asses_per_igd) ? null : $asses_per_igd;
        $asses_dokter_igd = $this->M_Erm_poli->checkData($id_history, 'form_assesmen_dokter');
        $diagnosa1 = $this->db->query("SELECT * from diagnosa_utama where id_pelayanan='$id_pelayanan'")->row_array();
        $diagnosa2 = $this->db->query("SELECT * from erm_diagnosa_dokter where id_pelayanan='$id_pelayanan'")->row_array();

        $page_data['diagnosa_utama'] = $diagnosa1;
        $page_data['diagnosa_sekunder'] = $diagnosa2;
        $page_data['dok'] = empty($asses_dokter_igd) ? null : $asses_dokter_igd;
        $page_data['form_perawat'] = $this->db->get_where('form_assesmen_awal_rajal', ['id_pelayanan' => $id_pelayanan])->row();
        $page_data['form_dokter'] = $this->db->get_where('form_assesmen_dokter', ['id_pelayanan' => $id_pelayanan])->row();

        // Kemudian, Anda dapat mengirimkan data ini ke view atau melakukan hal lain sesuai kebutuhan
        // $this->load->view('erm_form/Ranap/view_data_dokter_aktif', $data);

        // $asses_per_igd = $this->M_Erm->checkData($id_pelayanan, 'form_ass_per_igd');
        // $page_data['data'] = empty($asses_per_igd) ? null : $asses_per_igd;


        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Ranap_edit/view_resume_pulang';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }


    public function get_ass_per()
    {
        $id = $this->input->post('id');
        $db = $this->db->get_where('resume_bayi', ['id_history' => $id])->row_array();
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

    public function tampil_list_diagnosa_sekunder()
    {
        // $id_akun = 'dgok8itaesm';
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->db->query("SELECT * from erm_diagnosa_dokter where id_history='$id_pelayanan'")->result();

        // $page_data = null;
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            // $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-trash '></i></button>";
            // $tombol =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa(\""  . $page_data[$i]->no_diagnosa . "\")' '><i class='fa fa-trash '></i></button>";

            $nama_dokter = $page_data[$i]->no_diagnosa;
            $kode = $page_data[$i]->kode;
            $nama_diagnosa = $page_data[$i]->nama_diagnosa;
            // $tombol = $tombol;

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


    // public function tampil_list_diagnosa_sekunder()
    // {
    //     // Ambil id_pelayanan dari input POST
    //     $id_pelayanan = $this->input->post('id_pelayanan');

    //     // Query untuk mengambil data dari tabel erm_diagnosa_dokter untuk diagnosa sekunder
    //     $page_data = $this->db->query("SELECT * FROM erm_diagnosa_dokter WHERE id_history = '$id_pelayanan' AND jenis_diagnosa = 'sekunder'")->result();

    //     $out = null;
    //     for ($i = 0; $i < count($page_data); $i++) {

    //         // Buat tombol hapus dengan onclick yang mengarah ke fungsi hapus_data_diagnosa_sekunder
    //         $tombol = "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_data_diagnosa_sekunder(\"" . $page_data[$i]->no_diagnosa . "\")'><i class='fa fa-trash '></i></button>";

    //         // Ambil informasi diagnosa sekunder
    //         $nama_dokter = $page_data[$i]->no_diagnosa;
    //         $kode = $page_data[$i]->kode;
    //         $nama_diagnosa = $page_data[$i]->nama_diagnosa;

    //         // Tambahkan data diagnosa sekunder ke array output
    //         $out[$i] = array($nama_dokter, $kode, $nama_diagnosa, $tombol);
    //     }

    //     // Cek jika tidak ada data
    //     if ($out == null) {
    //         echo '{"data":""}';
    //         exit;
    //     } else {
    //         $page_data['data'] = $out;
    //         echo json_encode($page_data);
    //         exit;
    //     }
    // }


    public function update_bayi()
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

            $this->M_Erm_ranap->update_bayi($id, $data);
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
    public function getDiagnosa()
    {
        $query =  $this->input->post('query');
        $cari = $query['term'];
        $db = $this->M_Formulir_resume_pulang->getDiagnosa($cari);
        foreach ($db as $row) {
            $data[] = array(
                'id' => "" . $row['id_diagnosa'] . " - " .  $row['nama_diagnosa'] . "",
                'value' => "" . $row['id_diagnosa'] . " - " .  $row['nama_diagnosa'] . "",
                'id_diagnosa' => "" . $row['id_diagnosa'] . "",
                'nama_diagnosa' => "" . $row['nama_diagnosa'] . "",
            );
        }
        echo json_encode($data);
    }

    public function get_list_poli()
    {
        $rows = $this->db->select('id_list_poli, nama_panjang')
            ->from('list_poli')
            ->where('status_dokter', 'ADA')   // hanya yang ADA
            ->order_by('nama_panjang', 'ASC')
            ->get()
            ->result();

        echo json_encode($rows);
    }

    public function last_draft()
    {
        $no_rm        = $this->input->get('no_rm');
        $id_pelayanan = $this->input->get('id_pelayanan'); // opsional

        if (!$no_rm) {
            echo json_encode(null);
            return;
        }

        $this->db->select('r.*, p.nama_panjang AS nama_poli');
        $this->db->from('resume_pulang r');
        $this->db->join('list_poli p', 'p.id_list_poli = r.id_list_poli', 'left');
        $this->db->where('r.no_rm', $no_rm);
        if ($id_pelayanan) {
            $this->db->where('r.id_pelayanan', $id_pelayanan); // kalau mau filter layanan yang sama
        }
        $this->db->order_by('r.created_at', 'DESC');
        $this->db->order_by('r.id', 'DESC');
        $this->db->limit(1);

        $row = $this->db->get()->row();
        echo json_encode($row ?: null);
    }
}
