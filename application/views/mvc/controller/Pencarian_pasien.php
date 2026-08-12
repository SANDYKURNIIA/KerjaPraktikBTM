<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pencarian_pasien extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pencarian_pasien';
        // $page_data['data_pasien'] = $this->M_Pencarian_Pasien->selectDataPasien();
        $page_data['no_rm'] = $this->M_Pencarian_Pasien->getMax();
        $page_data['tipe_masuk'] = $this->M_Pencarian_Pasien->getTipeMasuk();
        $page_data['asal_pasien'] = $this->M_Pencarian_Pasien->getAsalPasien();
        $page_data['cara_bayar'] = $this->M_Pencarian_Pasien->getCaraBayar();
        $page_data['nama_dpjp'] = $this->M_Pencarian_Pasien->getNamaDPJP();
        $page_data['poli'] = $this->M_Pencarian_Pasien->getPoli();
        $page_data['poli_sore'] = $this->M_Pencarian_Pasien->getPoliSore();
        $page_data['kelas'] = $this->M_Pencarian_Pasien->getKelas();
        $page_data['pendidikan'] = $this->M_Pencarian_Pasien->getPendidikan();
        $page_data['pekerjaan'] = $this->M_Pencarian_Pasien->getPekerjaan();
        $page_data['prov'] = $this->M_Pencarian_Pasien->getProvinsi();
        $page_data['kota'] = $this->M_Pencarian_Pasien->getKota();
        $page_data['kec'] = $this->M_Pencarian_Pasien->getKec();
        $page_data['kel'] = $this->M_Pencarian_Pasien->getKel();
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function getDataPasien()
    {
        $no_rm = $this->input->post('pasien');
        $data = $this->M_Pencarian_Pasien->get_tgl_masuk($no_rm);
        $data1 = $this->M_Pencarian_Pasien->select_by_no_rm($no_rm);
        if (empty($data)) {
            $db = $data1;
        } else {
            $db = $data;
        }
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }

    public function check_rm()
    {
        $no_rm = $this->input->post("no_rm");

        $tmp_data = $this->M_Pencarian_Pasien->get_rm($no_rm);

        if (count($tmp_data) > 0) {
            echo '<label class="text-danger pt-10"><span><i class="fa fa-times" aria-hidden="true">
            </i> No RM tidak tersedia</span></label>';
        } else {
            echo '<label class="text-success pt-10"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> No RM tersedia</span></label>';
        }
    }


    public function tampil_riwayat_kunjungan()
    {
        $no_rm = $this->input->post('no_rm');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        if ($jenis_pelayanan == 'UGD') {
            $page_data = $this->M_Pencarian_Pasien->getRiwayatKunjunganUgd($no_rm);
        } else  if ($jenis_pelayanan == 'POLI') {
            $page_data = $this->M_Pencarian_Pasien->getRiwayatKunjunganPoli($no_rm);
        } else  if ($jenis_pelayanan == 'RANAP') {
            $page_data = $this->M_Pencarian_Pasien->getRiwayatKunjunganRanap($no_rm);
        } else {
            $page_data = $this->M_Pencarian_Pasien->getRiwayatKunjunganRanap('');
        }

        // kakak mau buat yang else disini, tapi gak tau gimana, karena get riwayatnya ada tiga
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $date = strftime("%A, %d %B %Y ", $time);
            $time1 = strtotime($page_data[$i]->tgl_keluar);
            $date1 = strftime("%A, %d %B %Y ", $time1);
            $tgl_masuk = $date;
            $tgl_keluar = $date1;
            $nama_pjg = $this->M_Pencarian_Pasien->getNamaPanjang($page_data[$i]->id_history);
            if ($jenis_pelayanan == 'POLI') {
                $unit = $nama_pjg->nama_panjang;
            } else {
                $unit = $page_data[$i]->jenis_pelayanan;
            }
            $cara_bayar = $page_data[$i]->caraBayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $status = $page_data[$i]->status_rawat;
            if ($status == "dirawat") {
                $tombol = "<span class='label label-warning'>DIRAWAT</span>";
            } else {
                $tombol = "<span class='label label-success'>SELESAI</span>";
            }

            $out[$i] = array($no,  $tgl_masuk,  $tgl_keluar,  $unit,  $cara_bayar,  $diagnosa, $tombol);
        }

        if ($out == null || $out == "") {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }

    public function identitas_pasien()
    {
        $this->load->view('assets/_header');
        $data = $this->session->userdata('data_auth');
        $page_data['sso_user_data'] = $data;
        $page_data['page_content'] = 'page_content/Identitas_pasien';
        $id = $this->input->post('username');
        $page_data['data'] = $this->M_Pencarian_Pasien->getDataPasienById($id);
        $id_history = $this->M_Pencarian_Pasien->getIdHistory($id)->id_history;

        $page_data['tgl_masuk'] = $this->M_Pencarian_Pasien->get_tgl_masuk($id);
        $page_data['asal_pasien'] = $this->M_Pencarian_Pasien->getAsalPasien();
        $page_data['cara_bayar'] = $this->M_Pencarian_Pasien->getCaraBayar();
        $page_data['nama_dpjp'] = $this->M_Pencarian_Pasien->getNamaDPJP();
        $page_data['poli'] = $this->M_Pencarian_Pasien->getPoli();
        $page_data['kelas'] = $this->M_Pencarian_Pasien->getKelas();
        $page_data['pendidikan'] = $this->M_Pencarian_Pasien->getPendidikan();
        $page_data['pekerjaan'] = $this->M_Pencarian_Pasien->getPekerjaan();
        $page_data['prov'] = $this->M_Pencarian_Pasien->getProvinsi();
        $page_data['kota'] = $this->M_Pencarian_Pasien->getKota();
        $page_data['kec'] = $this->M_Pencarian_Pasien->getKec();
        $page_data['kel'] = $this->M_Pencarian_Pasien->getKel();
        $page_data['history'] = $this->M_Pencarian_Pasien->getRiwayatKunjungan($id);
        $page_data['nama_pjg'] = $this->M_Pencarian_Pasien->getNamaPanjang($id_history);
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tambah_pasien()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_ktp', 'Nomor KTP', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('no_rm', 'No RM', 'required');
        if ($this->form_validation->run()) {
            $data = $this->session->userdata('data_auth');
            $username = $data->username;
            $id_staff = $this->M_Pencarian_Pasien->getIdStaff($username);
            $now = new DateTime();
            $id =  $this->input->post('no_rm');
            $data = array(
                'no_rm' => $id,
                'nama' => $this->input->post('nama'),
                'no_ktp' => $this->input->post('no_ktp'),
                'agama' => $this->input->post('agama'),
                'jenis_kelamin' => $this->input->post('jk'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                // 'nama_ayah' => $this->input->post('nama_ayah'),
                'no_bpjs' => $this->input->post('no_bpjs'),
                'nama_kepala_keluarga' => $this->input->post('namaKK'),
                'telp' => $this->input->post('telp'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'status' => $this->input->post('status'),
                'pendidikan' => $this->input->post('pendidikan'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'no_hp' => $this->input->post('no_hp'),
                'kota' => $this->input->post('kota'),
                'alamat' => $this->input->post('alamat'),
                'kecamatan' => $this->input->post('kec'),
                'kelurahan' => $this->input->post('kel'),
                'provinsi' => $this->input->post('prov'),
                'no_id_lain' => $this->input->post('no_id_lain'),
                'tgl_daftar' => $now->format('Y-m-d H:i:s'),
                'id_staff' => $id_staff->id_staff,
            );
            $this->M_Pencarian_Pasien->tambah_pasien($data);
            $out['status'] = "success";
        } else {
            $out = array(
                'error'   => true,
                'noRM_error' => form_error('no_rm'),
                'name_error' => form_error('nama'),
                'ktp_error' => form_error('no_ktp'),
                'tgl_error' => form_error('tgl_lahir')
            );
        }
        echo json_encode($out);
    }

    public function tambah_kunjungan()
    {
        $data = $this->session->userdata('data_auth');
        $username = $data->username;
        $id_staff = $this->M_Pencarian_Pasien->getIdStaff($username);

        $id_kamar = $this->input->post('tempat_tidur');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        $id_pelayanan = $this->M_Pencarian_Pasien->get_ai_tbl_pelayanan();

        $data_pelayanan = array(
            'id_pelayanan' => $id_pelayanan,
            'id_pasien' =>  $this->input->post('id_pasien'),
            'asal_pasien' => $this->input->post('asal_pasien'),
            'no_sep' => $this->input->post('no_sep'),
            'status_rawat' => "dirawat",
            'total_bayar' => 0,
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'tgl_keluar' => NULL,
            'cara_bayar' => $this->input->post('cara_bayar'),
            'diagnosa' => $this->input->post('diagnosa'),
            'cara_keluar' => "-",
            'keadaan_keluar' => "-",
            'keterangan' => $this->input->post('keterangan'),
            'no_jaminan' => "-",
            'tipe' => "LANGSUNG",
            'status' => "1",
            'biaya_jasa' =>  $this->input->post('biaya_jasa'),
            'biaya_rs' =>  $this->input->post('biaya_rs'),
            'biaya_admin' =>  $this->input->post('biaya_admin'),
            'id_staff' => $id_staff->id_staff,
        );
        $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);
        $out['status'] = "success";
        if ($jenis_pelayanan == "1") {
            $data_history = array(
                'id_history' => $this->M_Pencarian_Pasien->get_ai_tbl_history_ugd(),
                'jenis_pelayanan' => 'UGD',
                'tgl_masuk' => date("Y-m-d H:i:s"),
                'tgl_keluar' => NULL,
                'dpjp' => $this->input->post('dpjp'),
                'id_pelayanan' => $id_pelayanan,
                'id_staff' => $id_staff->id_staff,
            );
            $this->M_Pencarian_Pasien->tambah_history_ugd($data_history);
            $out['status'] = "success";
        } elseif ($jenis_pelayanan == "2") {
            if ($this->input->post('nama_poli') == '111111') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
               
                if ( $antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'i',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
            } elseif ($this->input->post('nama_poli') == '146582') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'l',//lab
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            } elseif ($this->input->post('nama_poli') == '15487956') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'r',//rad
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == '24QRNLX29R') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'p',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == '2JZ09X4K22') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'k',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == '6E975PL694') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'r',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'AX1520L18') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'a',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'E00RX703') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'f',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'HLGI4176K8') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'o',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'I9NXY5VNQG') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'j',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'MWK205D30K') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'd',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'O782EGU4PR') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'l',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'ODI8643C27') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'g',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'RZE28J1098') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'u',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'UQ81K76373') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'm',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }
            $data_history = array(
                'id_history' => $this->M_Pencarian_Pasien->get_ai_tbl_history_poli(), 
                'jenis_pelayanan' => 'POLI',
                'tgl_masuk' => date("Y-m-d H:i:s"),
                'tgl_keluar' => NULL,
                'dpjp' => $this->input->post('dpjp'),
                'nama_poli' => $this->input->post('nama_poli'),
                'id_pelayanan' => $id_pelayanan,
                'id_staff' => $id_staff->id_staff,
            );
            $this->M_Pencarian_Pasien->tambah_history_poli($data_history); 
            $out['status'] = "success";
        } elseif ($jenis_pelayanan == "3") {
            $out['status'] = "success";
            $data_history = array(
                'id_history' => $this->M_Pencarian_Pasien->get_ai_tbl_history_ranap(), 
                'jenis_pelayanan' => 'RAWAT INAP',
                'tgl_masuk' => date("Y-m-d H:i:s"),
                'tgl_keluar' => NULL,
                'dpjp' => $this->input->post('dpjp'),
                'id_pelayanan' => $id_pelayanan,
                'id_kamar' => $id_kamar,
                'id_staff' => $id_staff->id_staff,
            );
            $this->M_Pencarian_Pasien->tambah_history_ranap($data_history); 
            $data_kamar = array(
                'id_riwayat' => $this->M_Pencarian_Pasien->get_ai_tbl_riwayat(),
                'id_pelayanan' => $id_pelayanan,
                'id_kamar' => $id_kamar,
                'tanggal_masuk' => date("Y-m-d H:i:s"),
                'tanggal_keluar' => NULL,
                'status' => "AKTIF",
                'id_staff' => $id_staff->id_staff,
            );
            $this->M_Pencarian_Pasien->tambah_kamar($data_kamar);
            //  Update ruangan menggunakan trigger update
            //  Triger insert id_kamar di riwayat kamar

            // $data_status_kamar = array(
            //     'status' => "dipakai",
            // );

            // $this->M_Pencarian_Pasien->ubah_status_kamar($id_kamar, $data_status_kamar);
        }
        $data_erm = array(
            'id_erm' =>  $this->M_Pencarian_Pasien->get_ai_tbl_erm(),
            'id_pelayanan' => $id_pelayanan,
            'id_pasien' => $this->input->post('id_pasien'),
            'id_form_antar_poli' => NULL,
            'id_form_permintaan_rontgen' => NULL,
            'id_form_permintaan_labor' => NULL,
            'id_form_rujukan' => NULL,
            'id_form_persetujuan_tindakan' => NULL,
            'id_form_penolakan_tindakan' => NULL,
            'id_form_penundaan_pelayanan' => NULL,
            'id_form_asesmen_awal_rajal' => NULL,
            'id_form_resume_medis' => NULL,
            'tgl_masuk' => date("Y-m-d H:i:s"),
            'status' => 'AKTIF',
        );
        


        $this->M_Pencarian_Pasien->tambah_erm($data_erm);
        $out['status'] = "success";

        echo json_encode($out);
    }
    public function tambah_kunjungan_sore()
    {
        $data = $this->session->userdata('data_auth');
        $username = $data->username;
        $id_staff = $this->M_Pencarian_Pasien->getIdStaff($username);

        $id_kamar = $this->input->post('tempat_tidur');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        $id_pelayanan = $this->M_Pencarian_Pasien->get_ai_tbl_pelayanan();

        $data_pelayanan = array(
            'id_pelayanan' => $id_pelayanan,
            'id_pasien' =>  $this->input->post('id_pasien'),
            'asal_pasien' => $this->input->post('asal_pasien'),
            'no_sep' => $this->input->post('no_sep'),
            'status_rawat' => "dirawat",
            'total_bayar' => 0,
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'tgl_keluar' => NULL,
            'cara_bayar' => $this->input->post('cara_bayar'),
            'diagnosa' => $this->input->post('diagnosa'),
            'cara_keluar' => "-",
            'keadaan_keluar' => "-",
            'keterangan' => $this->input->post('keterangan'),
            'no_jaminan' => "-",
            'tipe' => "POLI SORE",
            'status' => "1",
            'biaya_jasa' =>  $this->input->post('biaya_jasa'),
            'biaya_rs' =>  $this->input->post('biaya_rs'),
            'biaya_admin' =>  $this->input->post('biaya_admin'),
            'id_staff' => $id_staff->id_staff,
        );

        if ($jenis_pelayanan == "1") {
            $data_history = array(
                'id_history' => $this->M_Pencarian_Pasien->get_ai_tbl_history_ugd(),
                'jenis_pelayanan' => 'UGD',
                'tgl_masuk' => date("Y-m-d H:i:s"),
                'tgl_keluar' => NULL,
                'dpjp' => $this->input->post('dpjp'),
                'id_pelayanan' => $id_pelayanan,
                'id_staff' => $id_staff->id_staff,
            );
            $this->M_Pencarian_Pasien->tambah_history_ugd($data_history);
            $out['status'] = "success";
        } elseif ($jenis_pelayanan == "2") {
            if ($this->input->post('nama_poli') == '111111') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
               
                if ( $antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'i',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
            } elseif ($this->input->post('nama_poli') == '146582') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'l',//lab
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            } elseif ($this->input->post('nama_poli') == '15487956') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'r',//rad
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == '24QRNLX29R') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'p',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == '2JZ09X4K22') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'k',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == '6E975PL694') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'r',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'AX1520L18') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'a',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'E00RX703') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'f',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'HLGI4176K8') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'o',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'I9NXY5VNQG') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'j',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'MWK205D30K') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'd',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'O782EGU4PR') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'l',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'ODI8643C27') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'g',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'RZE28J1098') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'u',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'UQ81K76373') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'm',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }
            $data_history = array(
                'id_history' => $this->M_Pencarian_Pasien->get_ai_tbl_history_poli(), // yang ini ubah lagi
                'jenis_pelayanan' => 'POLI',
                'tgl_masuk' => date("Y-m-d H:i:s"),
                'tgl_keluar' => NULL,
                'dpjp' => $this->input->post('dpjp'),
                'nama_poli' => $this->input->post('nama_poli'),
                'id_pelayanan' => $id_pelayanan,
                'id_staff' => $id_staff->id_staff,
            );
            $this->M_Pencarian_Pasien->tambah_history_poli($data_history); // ini juga
            $out['status'] = "success";
        } elseif ($jenis_pelayanan == "3") {
            $out['status'] = "success";
            $data_history = array(
                'id_history' => $this->M_Pencarian_Pasien->get_ai_tbl_history_ranap(), // ini ganti ranap
                'jenis_pelayanan' => 'RAWAT INAP',
                'tgl_masuk' => date("Y-m-d H:i:s"),
                'tgl_keluar' => NULL,
                'dpjp' => $this->input->post('dpjp'),
                'id_pelayanan' => $id_pelayanan,
                'id_kamar' => $id_kamar,
                'id_staff' => $id_staff->id_staff,
            );
            $this->M_Pencarian_Pasien->tambah_history_ranap($data_history); //dah selesai dah kerjanya, s
            $data_kamar = array(
                'id_riwayat' => $this->M_Pencarian_Pasien->get_ai_tbl_riwayat(),
                'id_pelayanan' => $id_pelayanan,
                'id_kamar' => $id_kamar,
                'tanggal_masuk' => date("Y-m-d H:i:s"),
                'tanggal_keluar' => NULL,
                'status' => "AKTIF",
                'id_staff' => $id_staff->id_staff,
            );
            $this->M_Pencarian_Pasien->tambah_kamar($data_kamar);
            //  Update ruangan menggunakan trigger update
            //  Triger insert id_kamar di riwayat kamar

            // $data_status_kamar = array(
            //     'status' => "dipakai",
            // );

            // $this->M_Pencarian_Pasien->ubah_status_kamar($id_kamar, $data_status_kamar);
        }
        $data_erm = array(
            'id_erm' =>  $this->M_Pencarian_Pasien->get_ai_tbl_erm(),
            'id_pelayanan' => $id_pelayanan,
            'id_pasien' => $this->input->post('id_pasien'),
            'id_form_antar_poli' => NULL,
            'id_form_permintaan_rontgen' => NULL,
            'id_form_permintaan_labor' => NULL,
            'id_form_rujukan' => NULL,
            'id_form_persetujuan_tindakan' => NULL,
            'id_form_penolakan_tindakan' => NULL,
            'id_form_penundaan_pelayanan' => NULL,
            'id_form_asesmen_awal_rajal' => NULL,
            'id_form_resume_medis' => NULL,
            'tgl_masuk' => date("Y-m-d H:i:s"),
            'status' => 'AKTIF',
        );
        $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);


        $this->M_Pencarian_Pasien->tambah_erm($data_erm);
        $out['status'] = "success";

        echo json_encode($out);
    }
    public function edit_pasien()
    {
        $id = $this->input->post('no_rm');
        $data = array(
            'no_rm' => $id,
            'nama' => $this->input->post('nama'),
            'no_ktp' => $this->input->post('no_ktp'),
            'agama' => $this->input->post('agama'),
            'jenis_kelamin' => $this->input->post('jk'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            //'nama_ayah' => $this->input->post('nama_ayah'),
            'no_bpjs' => $this->input->post('no_bpjs'),
            'nama_kepala_keluarga' => $this->input->post('namaKK'),
            'telp' => $this->input->post('telp'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'status' => $this->input->post('status'),
            'pendidikan' => $this->input->post('pendidikan'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'no_hp' => $this->input->post('no_hp'),
            'kota' => $this->input->post('kota'),
            'alamat' => $this->input->post('alamat'),
            'kecamatan' => $this->input->post('kec'),
            'kelurahan' => $this->input->post('kel'),
            'provinsi' => $this->input->post('prov'),
            'no_id_lain' => $this->input->post('no_id_lain'),

        );

        $this->M_Pencarian_Pasien->ubah_pasien($id, $data);
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function getKota()
    {
        $nm_prov = $this->input->post('prov');
        $data = $this->M_Pencarian_Pasien->getKotaByProv($nm_prov);
        echo json_encode($data);
    }
    public function getKec()
    {
        $nm_kab = $this->input->post('kota');
        $data = $this->M_Pencarian_Pasien->getKecByKota($nm_kab);
        echo json_encode($data);
    }
    public function getKel()
    {
        $nm_kec = $this->input->post('kec');
        $data = $this->M_Pencarian_Pasien->getKelByKec($nm_kec);
        echo json_encode($data);
    }
    public function getKamar()
    {
        $kelas = $this->input->post('kelas');
        $data = $this->M_Pencarian_Pasien->getKamar($kelas);
        echo json_encode($data);
    }

    //Antrian
    public function getAntrian()
    {
        $poli = $this->input->post('poli');
        $db = $this->M_Pencarian_Pasien->getAntrian($poli);

        $i = 0;
        if($db[$i]->no_antri == 0){
            $db = array(3);
        }else{
            $db = array(
                $id_max = $db[$i]->no_antri + 1
            );
        }

        echo json_encode($db);
        exit;
    }

    //Dokter
    public function getDokter()
    {
        $tipe = $this->input->post('tipe_masuk');
        $poli = $this->input->post('poli');
        if ($tipe == 1) {
            $spes = "umum";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($tipe == 3) {
            $data = $this->M_Pencarian_Pasien->getNamaDPJP();
        } elseif ($poli == '111111') {
            $spes = "rehabilitasi";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == '146582') {
            $spes = "labor";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == '15487956') {
            $spes = "radiologi";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == '24QRNLX29R') {
            $spes = "internis";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == '2JZ09X4K22') {
            $spes = "kulit";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == '6E975PL694') {
            $spes = "rehabilitasi";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == 'AX1520L18') {
            $spes = "anestesi";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == 'E00RX703') {
            $spes = "anak";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == 'HLGI4176K8') {
            $spes = "obgyn";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == 'I9NXY5VNQG') {
            $spes = "jantung";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == 'MWK205D30K') {
            $spes = "bedah";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == 'O782EGU4PR') {
            $spes = "tht";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == 'ODI8643C27') {
            $spes = "gigi";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == 'RZE28J1098') {
            $spes = "umum";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == 'UQ81K76373') {
            $spes = "mata";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        }
        echo json_encode($data);
    }

    public function getNamaPoli()
    {
        $data = $this->M_Pencarian_Pasien->getPoli();
        echo json_encode($data);
    }

    public function check_data()
    {
        $cari_data = $this->input->post('cari_data');
        if ($cari_data == '-999' || $cari_data == '0099') {
            $out = "";
        } else {
            $page_data = $this->M_Pencarian_Pasien->get_cek_like($cari_data);
            $out = null;

            for ($i = 0; $i < count($page_data); $i++) {
                $tombol = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_pasien(\"" . $page_data[$i]->no_rm . "\")'><i class='fa fa-pencil'></i></button>";
                $birthDate = $page_data[$i]->tgl_lahir;
                $date = new DateTime($birthDate);
                $now = new DateTime();
                $interval = $now->diff($date);

                $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";
                $tgl = strtotime($page_data[$i]->tgl_lahir);
                $no = $i + 1;
                $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
                $nama = $page_data[$i]->nama;
                $jenis_kelamin = $page_data[$i]->jenis_kelamin;
                $tgl_lahir = strftime(" %d %B %Y ", $tgl);
                $page_data[$i]->tgl_lahir;
                $kota = $page_data[$i]->kota;
                $umur = $umur;
                $alamat = $page_data[$i]->alamat;
                $aksi = $tombol;

                $out[$i] = array($no, $aksi, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $kota, $alamat);
            }

            if ($out == null || $out == "") {
                echo '{"data":""}';
                exit;
            } else {
                $page_data['data'] = $out;
                echo json_encode($page_data);
                exit;
            }
        }
    }
    // public function getDiagnosa(){
    //     $data = $this->M_Pencarian_Pasien->getDiagnosa();
    //     echo json_encode($data);
    // }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pencarian_pasien extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pencarian_pasien';
        // $page_data['data_pasien'] = $this->M_Pencarian_Pasien->selectDataPasien();
        $page_data['no_rm'] = $this->M_Pencarian_Pasien->getMax();
        $page_data['tipe_masuk'] = $this->M_Pencarian_Pasien->getTipeMasuk();
        $page_data['asal_pasien'] = $this->M_Pencarian_Pasien->getAsalPasien();
        $page_data['cara_bayar'] = $this->M_Pencarian_Pasien->getCaraBayar();
        $page_data['nama_dpjp'] = $this->M_Pencarian_Pasien->getNamaDPJP();
        $page_data['poli'] = $this->M_Pencarian_Pasien->getPoli();
        $page_data['poli_sore'] = $this->M_Pencarian_Pasien->getPoliSore();
        $page_data['kelas'] = $this->M_Pencarian_Pasien->getKelas();
        $page_data['pendidikan'] = $this->M_Pencarian_Pasien->getPendidikan();
        $page_data['pekerjaan'] = $this->M_Pencarian_Pasien->getPekerjaan();
        $page_data['prov'] = $this->M_Pencarian_Pasien->getProvinsi();
        $page_data['kota'] = $this->M_Pencarian_Pasien->getKota();
        $page_data['kec'] = $this->M_Pencarian_Pasien->getKec();
        $page_data['kel'] = $this->M_Pencarian_Pasien->getKel();
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function getDataPasien()
    {
        $no_rm = $this->input->post('pasien');
        $data = $this->M_Pencarian_Pasien->get_tgl_masuk($no_rm);
        $data1 = $this->M_Pencarian_Pasien->select_by_no_rm($no_rm);
        if (empty($data)) {
            $db = $data1;
        } else {
            $db = $data;
        }
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }

    public function check_rm()
    {
        $no_rm = $this->input->post("no_rm");

        $tmp_data = $this->M_Pencarian_Pasien->get_rm($no_rm);

        if (count($tmp_data) > 0) {
            echo '<label class="text-danger pt-10"><span><i class="fa fa-times" aria-hidden="true">
            </i> No RM tidak tersedia</span></label>';
        } else {
            echo '<label class="text-success pt-10"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> No RM tersedia</span></label>';
        }
    }


    public function tampil_riwayat_kunjungan()
    {
        $no_rm = $this->input->post('no_rm');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        if ($jenis_pelayanan == 'UGD') {
            $page_data = $this->M_Pencarian_Pasien->getRiwayatKunjunganUgd($no_rm);
        } else  if ($jenis_pelayanan == 'POLI') {
            $page_data = $this->M_Pencarian_Pasien->getRiwayatKunjunganPoli($no_rm);
        } else  if ($jenis_pelayanan == 'RANAP') {
            $page_data = $this->M_Pencarian_Pasien->getRiwayatKunjunganRanap($no_rm);
        } else {
            $page_data = $this->M_Pencarian_Pasien->getRiwayatKunjunganRanap('');
        }

        // kakak mau buat yang else disini, tapi gak tau gimana, karena get riwayatnya ada tiga
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tgl_masuk);
            $date = strftime("%A, %d %B %Y ", $time);
            $time1 = strtotime($page_data[$i]->tgl_keluar);
            $date1 = strftime("%A, %d %B %Y ", $time1);
            $tgl_masuk = $date;
            $tgl_keluar = $date1;
            $nama_pjg = $this->M_Pencarian_Pasien->getNamaPanjang($page_data[$i]->id_history);
            if ($jenis_pelayanan == 'POLI') {
                $unit = $nama_pjg->nama_panjang;
            } else {
                $unit = $page_data[$i]->jenis_pelayanan;
            }
            $cara_bayar = $page_data[$i]->caraBayar;
            $diagnosa = $page_data[$i]->diagnosa;

            $status = $page_data[$i]->status_rawat;
            if ($status == "dirawat") {
                $tombol = "<span class='label label-warning'>DIRAWAT</span>";
            } else {
                $tombol = "<span class='label label-success'>SELESAI</span>";
            }

            $out[$i] = array($no,  $tgl_masuk,  $tgl_keluar,  $unit,  $cara_bayar,  $diagnosa, $tombol);
        }

        if ($out == null || $out == "") {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }

    public function identitas_pasien()
    {
        $this->load->view('assets/_header');
        $data = $this->session->userdata('data_auth');
        $page_data['sso_user_data'] = $data;
        $page_data['page_content'] = 'page_content/Identitas_pasien';
        $id = $this->input->post('username');
        $page_data['data'] = $this->M_Pencarian_Pasien->getDataPasienById($id);
        $id_history = $this->M_Pencarian_Pasien->getIdHistory($id)->id_history;

        $page_data['tgl_masuk'] = $this->M_Pencarian_Pasien->get_tgl_masuk($id);
        $page_data['asal_pasien'] = $this->M_Pencarian_Pasien->getAsalPasien();
        $page_data['cara_bayar'] = $this->M_Pencarian_Pasien->getCaraBayar();
        $page_data['nama_dpjp'] = $this->M_Pencarian_Pasien->getNamaDPJP();
        $page_data['poli'] = $this->M_Pencarian_Pasien->getPoli();
        $page_data['kelas'] = $this->M_Pencarian_Pasien->getKelas();
        $page_data['pendidikan'] = $this->M_Pencarian_Pasien->getPendidikan();
        $page_data['pekerjaan'] = $this->M_Pencarian_Pasien->getPekerjaan();
        $page_data['prov'] = $this->M_Pencarian_Pasien->getProvinsi();
        $page_data['kota'] = $this->M_Pencarian_Pasien->getKota();
        $page_data['kec'] = $this->M_Pencarian_Pasien->getKec();
        $page_data['kel'] = $this->M_Pencarian_Pasien->getKel();
        $page_data['history'] = $this->M_Pencarian_Pasien->getRiwayatKunjungan($id);
        $page_data['nama_pjg'] = $this->M_Pencarian_Pasien->getNamaPanjang($id_history);
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tambah_pasien()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_ktp', 'Nomor KTP', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('no_rm', 'No RM', 'required');
        if ($this->form_validation->run()) {
            $data = $this->session->userdata('data_auth');
            $username = $data->username;
            $id_staff = $this->M_Pencarian_Pasien->getIdStaff($username);
            $now = new DateTime();
            $id =  $this->input->post('no_rm');
            $data = array(
                'no_rm' => $id,
                'nama' => $this->input->post('nama'),
                'no_ktp' => $this->input->post('no_ktp'),
                'agama' => $this->input->post('agama'),
                'jenis_kelamin' => $this->input->post('jk'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                // 'nama_ayah' => $this->input->post('nama_ayah'),
                'no_bpjs' => $this->input->post('no_bpjs'),
                'nama_kepala_keluarga' => $this->input->post('namaKK'),
                'telp' => $this->input->post('telp'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'status' => $this->input->post('status'),
                'pendidikan' => $this->input->post('pendidikan'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'no_hp' => $this->input->post('no_hp'),
                'kota' => $this->input->post('kota'),
                'alamat' => $this->input->post('alamat'),
                'kecamatan' => $this->input->post('kec'),
                'kelurahan' => $this->input->post('kel'),
                'provinsi' => $this->input->post('prov'),
                'no_id_lain' => $this->input->post('no_id_lain'),
                'tgl_daftar' => $now->format('Y-m-d H:i:s'),
                'id_staff' => $id_staff->id_staff,
            );
            $this->M_Pencarian_Pasien->tambah_pasien($data);
            $out['status'] = "success";
        } else {
            $out = array(
                'error'   => true,
                'noRM_error' => form_error('no_rm'),
                'name_error' => form_error('nama'),
                'ktp_error' => form_error('no_ktp'),
                'tgl_error' => form_error('tgl_lahir')
            );
        }
        echo json_encode($out);
    }

    public function tambah_kunjungan()
    {
        $data = $this->session->userdata('data_auth');
        $username = $data->username;
        $id_staff = $this->M_Pencarian_Pasien->getIdStaff($username);

        $id_kamar = $this->input->post('tempat_tidur');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        $id_pelayanan = $this->M_Pencarian_Pasien->get_ai_tbl_pelayanan();

        $data_pelayanan = array(
            'id_pelayanan' => $id_pelayanan,
            'id_pasien' =>  $this->input->post('id_pasien'),
            'asal_pasien' => $this->input->post('asal_pasien'),
            'no_sep' => $this->input->post('no_sep'),
            'status_rawat' => "dirawat",
            'total_bayar' => 0,
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'tgl_keluar' => NULL,
            'cara_bayar' => $this->input->post('cara_bayar'),
            'diagnosa' => $this->input->post('diagnosa'),
            'cara_keluar' => "-",
            'keadaan_keluar' => "-",
            'keterangan' => $this->input->post('keterangan'),
            'no_jaminan' => "-",
            'tipe' => "LANGSUNG",
            'status' => "1",
            'biaya_jasa' =>  $this->input->post('biaya_jasa'),
            'biaya_rs' =>  $this->input->post('biaya_rs'),
            'biaya_admin' =>  $this->input->post('biaya_admin'),
            'id_staff' => $id_staff->id_staff,
        );
        $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);
        $out['status'] = "success";
        if ($jenis_pelayanan == "1") {
            $data_history = array(
                'id_history' => $this->M_Pencarian_Pasien->get_ai_tbl_history_ugd(),
                'jenis_pelayanan' => 'UGD',
                'tgl_masuk' => date("Y-m-d H:i:s"),
                'tgl_keluar' => NULL,
                'dpjp' => $this->input->post('dpjp'),
                'id_pelayanan' => $id_pelayanan,
                'id_staff' => $id_staff->id_staff,
            );
            $this->M_Pencarian_Pasien->tambah_history_ugd($data_history);
            $out['status'] = "success";
        } elseif ($jenis_pelayanan == "2") {
            if ($this->input->post('nama_poli') == '111111') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
               
                if ( $antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'i',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
            } elseif ($this->input->post('nama_poli') == '146582') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'l',//lab
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            } elseif ($this->input->post('nama_poli') == '15487956') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'r',//rad
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == '24QRNLX29R') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'p',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == '2JZ09X4K22') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'k',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == '6E975PL694') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'r',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'AX1520L18') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'a',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'E00RX703') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'f',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'HLGI4176K8') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'o',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'I9NXY5VNQG') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'j',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'MWK205D30K') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'd',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'O782EGU4PR') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'l',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'ODI8643C27') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'g',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'RZE28J1098') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'u',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'UQ81K76373') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'm',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }
            $data_history = array(
                'id_history' => $this->M_Pencarian_Pasien->get_ai_tbl_history_poli(), 
                'jenis_pelayanan' => 'POLI',
                'tgl_masuk' => date("Y-m-d H:i:s"),
                'tgl_keluar' => NULL,
                'dpjp' => $this->input->post('dpjp'),
                'nama_poli' => $this->input->post('nama_poli'),
                'id_pelayanan' => $id_pelayanan,
                'id_staff' => $id_staff->id_staff,
            );
            $this->M_Pencarian_Pasien->tambah_history_poli($data_history); 
            $out['status'] = "success";
        } elseif ($jenis_pelayanan == "3") {
            $out['status'] = "success";
            $data_history = array(
                'id_history' => $this->M_Pencarian_Pasien->get_ai_tbl_history_ranap(), 
                'jenis_pelayanan' => 'RAWAT INAP',
                'tgl_masuk' => date("Y-m-d H:i:s"),
                'tgl_keluar' => NULL,
                'dpjp' => $this->input->post('dpjp'),
                'id_pelayanan' => $id_pelayanan,
                'id_kamar' => $id_kamar,
                'id_staff' => $id_staff->id_staff,
            );
            $this->M_Pencarian_Pasien->tambah_history_ranap($data_history); 
            $data_kamar = array(
                'id_riwayat' => $this->M_Pencarian_Pasien->get_ai_tbl_riwayat(),
                'id_pelayanan' => $id_pelayanan,
                'id_kamar' => $id_kamar,
                'tanggal_masuk' => date("Y-m-d H:i:s"),
                'tanggal_keluar' => NULL,
                'status' => "AKTIF",
                'id_staff' => $id_staff->id_staff,
            );
            $this->M_Pencarian_Pasien->tambah_kamar($data_kamar);
            //  Update ruangan menggunakan trigger update
            //  Triger insert id_kamar di riwayat kamar

            // $data_status_kamar = array(
            //     'status' => "dipakai",
            // );

            // $this->M_Pencarian_Pasien->ubah_status_kamar($id_kamar, $data_status_kamar);
        }
        $data_erm = array(
            'id_erm' =>  $this->M_Pencarian_Pasien->get_ai_tbl_erm(),
            'id_pelayanan' => $id_pelayanan,
            'id_pasien' => $this->input->post('id_pasien'),
            'id_form_antar_poli' => NULL,
            'id_form_permintaan_rontgen' => NULL,
            'id_form_permintaan_labor' => NULL,
            'id_form_rujukan' => NULL,
            'id_form_persetujuan_tindakan' => NULL,
            'id_form_penolakan_tindakan' => NULL,
            'id_form_penundaan_pelayanan' => NULL,
            'id_form_asesmen_awal_rajal' => NULL,
            'id_form_resume_medis' => NULL,
            'tgl_masuk' => date("Y-m-d H:i:s"),
            'status' => 'AKTIF',
        );
        


        $this->M_Pencarian_Pasien->tambah_erm($data_erm);
        $out['status'] = "success";

        echo json_encode($out);
    }
    public function tambah_kunjungan_sore()
    {
        $data = $this->session->userdata('data_auth');
        $username = $data->username;
        $id_staff = $this->M_Pencarian_Pasien->getIdStaff($username);

        $id_kamar = $this->input->post('tempat_tidur');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        $id_pelayanan = $this->M_Pencarian_Pasien->get_ai_tbl_pelayanan();

        $data_pelayanan = array(
            'id_pelayanan' => $id_pelayanan,
            'id_pasien' =>  $this->input->post('id_pasien'),
            'asal_pasien' => $this->input->post('asal_pasien'),
            'no_sep' => $this->input->post('no_sep'),
            'status_rawat' => "dirawat",
            'total_bayar' => 0,
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'tgl_keluar' => NULL,
            'cara_bayar' => $this->input->post('cara_bayar'),
            'diagnosa' => $this->input->post('diagnosa'),
            'cara_keluar' => "-",
            'keadaan_keluar' => "-",
            'keterangan' => $this->input->post('keterangan'),
            'no_jaminan' => "-",
            'tipe' => "POLI SORE",
            'status' => "1",
            'biaya_jasa' =>  $this->input->post('biaya_jasa'),
            'biaya_rs' =>  $this->input->post('biaya_rs'),
            'biaya_admin' =>  $this->input->post('biaya_admin'),
            'id_staff' => $id_staff->id_staff,
        );

        if ($jenis_pelayanan == "1") {
            $data_history = array(
                'id_history' => $this->M_Pencarian_Pasien->get_ai_tbl_history_ugd(),
                'jenis_pelayanan' => 'UGD',
                'tgl_masuk' => date("Y-m-d H:i:s"),
                'tgl_keluar' => NULL,
                'dpjp' => $this->input->post('dpjp'),
                'id_pelayanan' => $id_pelayanan,
                'id_staff' => $id_staff->id_staff,
            );
            $this->M_Pencarian_Pasien->tambah_history_ugd($data_history);
            $out['status'] = "success";
        } elseif ($jenis_pelayanan == "2") {
            if ($this->input->post('nama_poli') == '111111') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
               
                if ( $antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'i',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
            } elseif ($this->input->post('nama_poli') == '146582') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'l',//lab
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            } elseif ($this->input->post('nama_poli') == '15487956') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'r',//rad
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == '24QRNLX29R') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'p',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == '2JZ09X4K22') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'k',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == '6E975PL694') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'r',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'AX1520L18') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'a',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'E00RX703') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'f',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'HLGI4176K8') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'o',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'I9NXY5VNQG') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'j',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'MWK205D30K') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'd',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'O782EGU4PR') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'l',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'ODI8643C27') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'g',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'RZE28J1098') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'u',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }elseif ($this->input->post('nama_poli') == 'UQ81K76373') {
                $tgl =  date("Y-m-d");
                $jam = date("H:i:s");
                $id_antrian = uniqid();
                $poli = $this->input->post('nama_poli');
                $no_antri= $this->input->post('antrian');
                $antrian = $this->M_Pencarian_Pasien->cekAntrian($poli, $no_antri);
    
                if ($antrian == $no_antri || !empty($antrian) ) {
                    $out['status'] = "error";
                }else if($antrian == NULL){
                    $page_data = array(
                        'id_antrian' => $id_antrian,
                        'inisial' => 'm',
                        'no_antri' =>    $no_antri,
                        'poli' => $this->input->post('nama_poli'),
                        'tanggal' => $tgl,
                        'jam' => $jam,
                        'status' => 0,
                        'jenis_antrian' => 'LANGSUNG',
                        'id_pelayanan' => $id_pelayanan,
                        'id_akun' => '-',
                        'rujukan' => '-',
                    );
                    $this->M_Pencarian_Pasien->insert_antrian_poli($page_data);
                    $out['status'] = "success";
                }
    
            }
            $data_history = array(
                'id_history' => $this->M_Pencarian_Pasien->get_ai_tbl_history_poli(), // yang ini ubah lagi
                'jenis_pelayanan' => 'POLI',
                'tgl_masuk' => date("Y-m-d H:i:s"),
                'tgl_keluar' => NULL,
                'dpjp' => $this->input->post('dpjp'),
                'nama_poli' => $this->input->post('nama_poli'),
                'id_pelayanan' => $id_pelayanan,
                'id_staff' => $id_staff->id_staff,
            );
            $this->M_Pencarian_Pasien->tambah_history_poli($data_history); // ini juga
            $out['status'] = "success";
        } elseif ($jenis_pelayanan == "3") {
            $out['status'] = "success";
            $data_history = array(
                'id_history' => $this->M_Pencarian_Pasien->get_ai_tbl_history_ranap(), // ini ganti ranap
                'jenis_pelayanan' => 'RAWAT INAP',
                'tgl_masuk' => date("Y-m-d H:i:s"),
                'tgl_keluar' => NULL,
                'dpjp' => $this->input->post('dpjp'),
                'id_pelayanan' => $id_pelayanan,
                'id_kamar' => $id_kamar,
                'id_staff' => $id_staff->id_staff,
            );
            $this->M_Pencarian_Pasien->tambah_history_ranap($data_history); //dah selesai dah kerjanya, s
            $data_kamar = array(
                'id_riwayat' => $this->M_Pencarian_Pasien->get_ai_tbl_riwayat(),
                'id_pelayanan' => $id_pelayanan,
                'id_kamar' => $id_kamar,
                'tanggal_masuk' => date("Y-m-d H:i:s"),
                'tanggal_keluar' => NULL,
                'status' => "AKTIF",
                'id_staff' => $id_staff->id_staff,
            );
            $this->M_Pencarian_Pasien->tambah_kamar($data_kamar);
            //  Update ruangan menggunakan trigger update
            //  Triger insert id_kamar di riwayat kamar

            // $data_status_kamar = array(
            //     'status' => "dipakai",
            // );

            // $this->M_Pencarian_Pasien->ubah_status_kamar($id_kamar, $data_status_kamar);
        }
        $data_erm = array(
            'id_erm' =>  $this->M_Pencarian_Pasien->get_ai_tbl_erm(),
            'id_pelayanan' => $id_pelayanan,
            'id_pasien' => $this->input->post('id_pasien'),
            'id_form_antar_poli' => NULL,
            'id_form_permintaan_rontgen' => NULL,
            'id_form_permintaan_labor' => NULL,
            'id_form_rujukan' => NULL,
            'id_form_persetujuan_tindakan' => NULL,
            'id_form_penolakan_tindakan' => NULL,
            'id_form_penundaan_pelayanan' => NULL,
            'id_form_asesmen_awal_rajal' => NULL,
            'id_form_resume_medis' => NULL,
            'tgl_masuk' => date("Y-m-d H:i:s"),
            'status' => 'AKTIF',
        );
        $this->M_Pencarian_Pasien->tambah_pelayanan($data_pelayanan);


        $this->M_Pencarian_Pasien->tambah_erm($data_erm);
        $out['status'] = "success";

        echo json_encode($out);
    }
    public function edit_pasien()
    {
        $id = $this->input->post('no_rm');
        $data = array(
            'no_rm' => $id,
            'nama' => $this->input->post('nama'),
            'no_ktp' => $this->input->post('no_ktp'),
            'agama' => $this->input->post('agama'),
            'jenis_kelamin' => $this->input->post('jk'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            //'nama_ayah' => $this->input->post('nama_ayah'),
            'no_bpjs' => $this->input->post('no_bpjs'),
            'nama_kepala_keluarga' => $this->input->post('namaKK'),
            'telp' => $this->input->post('telp'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'status' => $this->input->post('status'),
            'pendidikan' => $this->input->post('pendidikan'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'no_hp' => $this->input->post('no_hp'),
            'kota' => $this->input->post('kota'),
            'alamat' => $this->input->post('alamat'),
            'kecamatan' => $this->input->post('kec'),
            'kelurahan' => $this->input->post('kel'),
            'provinsi' => $this->input->post('prov'),
            'no_id_lain' => $this->input->post('no_id_lain'),

        );

        $this->M_Pencarian_Pasien->ubah_pasien($id, $data);
        $out['status'] = "success";
        echo json_encode($out);
    }

    public function getKota()
    {
        $nm_prov = $this->input->post('prov');
        $data = $this->M_Pencarian_Pasien->getKotaByProv($nm_prov);
        echo json_encode($data);
    }
    public function getKec()
    {
        $nm_kab = $this->input->post('kota');
        $data = $this->M_Pencarian_Pasien->getKecByKota($nm_kab);
        echo json_encode($data);
    }
    public function getKel()
    {
        $nm_kec = $this->input->post('kec');
        $data = $this->M_Pencarian_Pasien->getKelByKec($nm_kec);
        echo json_encode($data);
    }
    public function getKamar()
    {
        $kelas = $this->input->post('kelas');
        $data = $this->M_Pencarian_Pasien->getKamar($kelas);
        echo json_encode($data);
    }

    //Antrian
    public function getAntrian()
    {
        $poli = $this->input->post('poli');
        $db = $this->M_Pencarian_Pasien->getAntrian($poli);

        $i = 0;
        if($db[$i]->no_antri == 0){
            $db = array(3);
        }else{
            $db = array(
                $id_max = $db[$i]->no_antri + 1
            );
        }

        echo json_encode($db);
        exit;
    }

    //Dokter
    public function getDokter()
    {
        $tipe = $this->input->post('tipe_masuk');
        $poli = $this->input->post('poli');
        if ($tipe == 1) {
            $spes = "umum";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($tipe == 3) {
            $data = $this->M_Pencarian_Pasien->getNamaDPJP();
        } elseif ($poli == '111111') {
            $spes = "rehabilitasi";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == '146582') {
            $spes = "labor";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == '15487956') {
            $spes = "radiologi";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == '24QRNLX29R') {
            $spes = "internis";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == '2JZ09X4K22') {
            $spes = "kulit";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == '6E975PL694') {
            $spes = "rehabilitasi";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == 'AX1520L18') {
            $spes = "anestesi";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == 'E00RX703') {
            $spes = "anak";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == 'HLGI4176K8') {
            $spes = "obgyn";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == 'I9NXY5VNQG') {
            $spes = "jantung";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == 'MWK205D30K') {
            $spes = "bedah";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == 'O782EGU4PR') {
            $spes = "tht";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == 'ODI8643C27') {
            $spes = "gigi";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == 'RZE28J1098') {
            $spes = "umum";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        } elseif ($poli == 'UQ81K76373') {
            $spes = "mata";
            $data = $this->M_Pencarian_Pasien->getDokter($spes);
        }
        echo json_encode($data);
    }

    public function getNamaPoli()
    {
        $data = $this->M_Pencarian_Pasien->getPoli();
        echo json_encode($data);
    }

    public function check_data()
    {
        $cari_data = $this->input->post('cari_data');
        if ($cari_data == '-999' || $cari_data == '0099') {
            $out = "";
        } else {
            $page_data = $this->M_Pencarian_Pasien->get_cek_like($cari_data);
            $out = null;

            for ($i = 0; $i < count($page_data); $i++) {
                $tombol = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='edit_pasien(\"" . $page_data[$i]->no_rm . "\")'><i class='fa fa-pencil'></i></button>";
                $birthDate = $page_data[$i]->tgl_lahir;
                $date = new DateTime($birthDate);
                $now = new DateTime();
                $interval = $now->diff($date);

                $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";
                $tgl = strtotime($page_data[$i]->tgl_lahir);
                $no = $i + 1;
                $no_rm =  " " . sprintf('%06d', $page_data[$i]->no_rm);
                $nama = $page_data[$i]->nama;
                $jenis_kelamin = $page_data[$i]->jenis_kelamin;
                $tgl_lahir = strftime(" %d %B %Y ", $tgl);
                $page_data[$i]->tgl_lahir;
                $kota = $page_data[$i]->kota;
                $umur = $umur;
                $alamat = $page_data[$i]->alamat;
                $aksi = $tombol;

                $out[$i] = array($no, $aksi, $no_rm, $nama, $jenis_kelamin, $tgl_lahir, $umur, $kota, $alamat);
            }

            if ($out == null || $out == "") {
                echo '{"data":""}';
                exit;
            } else {
                $page_data['data'] = $out;
                echo json_encode($page_data);
                exit;
            }
        }
    }
    // public function getDiagnosa(){
    //     $data = $this->M_Pencarian_Pasien->getDiagnosa();
    //     echo json_encode($data);
    // }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
