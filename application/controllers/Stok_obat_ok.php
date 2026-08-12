<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_obat_ok extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Stok_obat_ok');
        $this->load->model('M_Apotik');
        $this->load->model('M_Logistik_farmasi');
    }

    public function index()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Stok_obat_ok';
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
        $stok = $data_adm->stok;


        $page_data['obat'] = $this->M_Stok_obat_ok->getObatApotik();
        $page_data['obat_stok'] = $this->M_Stok_obat_ok->getEditObatApotik($stok);
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_stok_obat()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
        $stok = $data_adm->stok;

        $page_data = $this->M_Stok_obat_ok->selectStok($stok);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $tombol =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='detailStokObat(\"" . $page_data[$i]->id_logistik . "\",\"" . $page_data[$i]->tipe . "\")' '><i class='fa fa-rocket '></i></button>";
            $no = $i + 1;
            $id_logistik = $page_data[$i]->id_logistik;
            $nama = $page_data[$i]->nama;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $produsen = $page_data[$i]->produsen;
            $hna = "Rp " . number_format($page_data[$i]->harga_cost, 0, ',', '.');
            $harga = "Rp " . number_format(($page_data[$i]->harga_cost * (1 + ($page_data[$i]->ppn / 100)) *  $page_data[$i]->margin), 0, ',', '.');

            // if ($perequest == "rawatinap") {
            //     $stok1 = number_format($this->M_Stok_obat_ok->getStokRanap($page_data[$i]->id_logistik)->stok);
            //     $stok2 = number_format($this->M_Stok_obat_ok->getStokRanap1($page_data[$i]->id_logistik)->stok);
            //     $stok = intval($stok1) + intval($stok2);
            //     $stok = intval($stok1);
            // } else {
            if ($page_data[$i]->stok == -0) {
                $stok = 0;
            } else {
                $stok  = $page_data[$i]->stok;
            }
            // }

            $tipe = $page_data[$i]->tipe;

            if ($perequest == "deporanap") {
                $retur =   "<button class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='retur_ruangan(\"" . $page_data[$i]->id_logistik . "\",\"" . $nama . "\")' '><i class='fa fa-rocket '></i></button>";
                $out[$i] = array($no, $tombol, $retur, $id_logistik, $nama, $hna, $harga, $golongan_obat, $produsen, $stok, $tipe);
            } else {
                $out[$i] = array($no, $tombol, $id_logistik, $nama, $hna, $harga, $golongan_obat, $produsen, $stok, $tipe);
            }
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

    public function kosongkan_stok($perequest)
    {
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
        $stok = $data_adm->stok;

        $page_data = $this->M_Stok_obat_ok->selectStok($stok);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            if ($page_data[$i]->stok == -0) {
                $stok = 0;
            } else {
                $stok  = $page_data[$i]->stok;
            }

            if ($perequest == "apotik") {
                if ($stok != 0) {
                    $data_stok = array(
                        'id_stok' => uniqid(),
                        'id_logistik' => $page_data[$i]->id_logistik,
                        'tgl' => date("Y-m-d H:i:s"),
                        'keterangan' => "MASUK",
                        'frek' => $stok * -1,
                        'kadaluarsa' => $page_data[$i]->kadaluarsa,
                        'asal_tujuan' => "BASE",
                        'id_req' =>  '-',
                        'id_staff' => 'AKIL',
                    );
                    $this->M_Apotik->insert_tindakan($data_stok, 'stok_apotik');
                }
            }
        }
        echo "success";
    }
    public function tampil_detail_stok()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
        $stok = $data_adm->stok;

        $id_logistik = $this->input->post('id_logistik');
        $page_data = $this->M_Stok_obat_ok->selectDetailStok($id_logistik, $stok);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // if ($perequest == "rawatinap") {
            //     $stok1 = number_format($this->M_Stok_obat_ok->getStokRanap($page_data[$i]->id_logistik)->stok);
            //     $stok2 = number_format($this->M_Stok_obat_ok->getStokRanap1($page_data[$i]->id_logistik)->stok);
            //     $frek = intval($stok1) + intval($stok2);
            // } else {
            $frek  = $page_data[$i]->stok;
            // }

            $tombol =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='tampilKurang(\"" . $page_data[$i]->id_logistik . "\",\"" . $page_data[$i]->nama . "\",\"" . $frek . "\",\"" . $page_data[$i]->kadaluarsa . "\")' '><i class='fa fa-rocket '></i></button>";
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $kadaluarsa = $page_data[$i]->kadaluarsa;

            $out[$i] = array($no, $tombol, $nama, $kadaluarsa, $frek);
        }

        $page_data['data'] = $out;
        echo json_encode($page_data);
    }
    public function tambah_stok_ok()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");
        $id_logistik = $this->input->post('id_logistik');
        $perequest = $data->tipe;
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
        $stok = $data_adm->stok;

        if ($perequest == "apotik" || $perequest == "deporanap") {
            $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaanFarmasi($id_logistik)->stok;

            $datastok = array(
                'id_stok' => uniqid(),
                'id_logistik' => $this->input->post('id_logistik'),
                'tgl' => $tgl,
                'keterangan' => "MASUK",
                'frek' => $this->input->post('frek'),
                'saldo' => $getStok + ($this->input->post('frek')),
                'kadaluarsa' => $this->input->post('tglExp'),
                'asal_tujuan' => "BASE",
                'id_req' =>  '',
                'id_staff' => $data->id_staff,
            );
        } else if ($perequest == "rawatinap") {

            $datastok = array(
                'id_stok' => uniqid(),
                'id_logistik' => $this->input->post('id_logistik'),
                'tgl' => $tgl,
                'keterangan' => "MASUK",
                'frek' => $this->input->post('frek'),
                'kadaluarsa' => $this->input->post('tglExp'),
                'asal_tujuan' => "BASE",
                'id_req' =>  '-',
                'id_resep' =>  $data->ruangan,
                'id_staff' => $data->id_staff,
            );
        } else {

            $datastok = array(
                'id_stok' => uniqid(),
                'id_logistik' => $this->input->post('id_logistik'),
                'tgl' => $tgl,
                'keterangan' => "MASUK",
                'frek' => $this->input->post('frek'),
                'kadaluarsa' => $this->input->post('tglExp'),
                'asal_tujuan' => "BASE",
                'id_req' =>  '-',
                'id_staff' => $data->id_staff,
            );
        }
        if ($perequest == "apotik") {
            $stok = "stok_apotik";
            $this->M_Stok_obat_ok->insert_tindakan($datastok, $stok);
            $this->M_Apotik->update_perencanaan($id_logistik, $stok, 'pr_apotik');
            $out['status'] = "success";
        } else if ($perequest == "bpjs") {
            $stok = "stok_bpjs";
            $this->M_Stok_obat_ok->insert_tindakan($datastok, $stok);
        } else if ($perequest == "deporanap") {
            $stok = "stok_depo";
            $this->M_Stok_obat_ok->insert_tindakan($datastok, $stok);
            $this->M_Apotik->update_perencanaan($id_logistik, $stok, 'pr_depo');
        } else if ($perequest == "igdapotik" || $perequest == "igd" || $perequest == "igdponek") {
            $stok = "stok_igd";
            $this->M_Stok_obat_ok->insert_tindakan($datastok, $stok);

            $this->M_Apotik->update_perencanaan($id_logistik, $stok, 'pr_igd');
        } else {
            $this->M_Stok_obat_ok->insert_tindakan($datastok, $stok);
        }


        $out['status'] = "success";
        echo json_encode($out);
    }
    public function getExpStok()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
        $stok = $data_adm->stok;

        $obat = $this->input->post('obat');
        $data = $this->M_Stok_obat_ok->getExpByObat($obat, $stok);

        echo json_encode($data);
    }
    public function retur_stok_ok()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");
        $id_logistik = $this->input->post('id_logistik');
        $perequest = $data->tipe;
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
        $stok = $data_adm->stok;


        $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaanFarmasi($id_logistik);

        $datastok = array(
            'id_stok' => uniqid(),
            'id_logistik' => $this->input->post('id_logistik'),
            'tgl' => $tgl,
            'keterangan' => "RETUR RUANGAN",
            'frek' => $this->input->post('frek'),
            'saldo' => $getStok->stok + ($this->input->post('frek')),
            'kadaluarsa' => $getStok->kadaluarsa,
            'asal_tujuan' => $this->input->post('ruangan'),
            'id_req' =>  '-',
            'id_staff' => $data->id_staff,
        );

        $this->M_Stok_obat_ok->insert_tindakan($datastok, $stok);



        $out['status'] = "success";
        echo json_encode($out);
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_obat_ok extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Stok_obat_ok');
        $this->load->model('M_Apotik');
        $this->load->model('M_Logistik_farmasi');
    }

    public function index()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Stok_obat_ok';
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
        $stok = $data_adm->stok;


        $page_data['obat'] = $this->M_Stok_obat_ok->getObatApotik();
        $page_data['obat_stok'] = $this->M_Stok_obat_ok->getEditObatApotik($stok);
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_stok_obat()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
        $stok = $data_adm->stok;

        $page_data = $this->M_Stok_obat_ok->selectStok($stok);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $tombol =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='detailStokObat(\"" . $page_data[$i]->id_logistik . "\",\"" . $page_data[$i]->tipe . "\")' '><i class='fa fa-rocket '></i></button>";
            $no = $i + 1;
            $id_logistik = $page_data[$i]->id_logistik;
            $nama = $page_data[$i]->nama;
            $golongan_obat = $page_data[$i]->golongan_obat;
            $produsen = $page_data[$i]->produsen;
            $hna = "Rp " . number_format($page_data[$i]->harga_cost, 0, ',', '.');
            $harga = "Rp " . number_format(($page_data[$i]->harga_cost * (1 + ($page_data[$i]->ppn / 100)) *  $page_data[$i]->margin), 0, ',', '.');

            // if ($perequest == "rawatinap") {
            //     $stok1 = number_format($this->M_Stok_obat_ok->getStokRanap($page_data[$i]->id_logistik)->stok);
            //     $stok2 = number_format($this->M_Stok_obat_ok->getStokRanap1($page_data[$i]->id_logistik)->stok);
            //     $stok = intval($stok1) + intval($stok2);
            //     $stok = intval($stok1);
            // } else {
            if ($page_data[$i]->stok == -0) {
                $stok = 0;
            } else {
                $stok  = $page_data[$i]->stok;
            }
            // }

            $tipe = $page_data[$i]->tipe;

            if ($perequest == "deporanap") {
                $retur =   "<button class='btn btn-info btn-icon-anim btn-square' data-toggle='modal' onclick='retur_ruangan(\"" . $page_data[$i]->id_logistik . "\",\"" . $nama . "\")' '><i class='fa fa-rocket '></i></button>";
                $out[$i] = array($no, $tombol, $retur, $id_logistik, $nama, $hna, $harga, $golongan_obat, $produsen, $stok, $tipe);
            } else {
                $out[$i] = array($no, $tombol, $id_logistik, $nama, $hna, $harga, $golongan_obat, $produsen, $stok, $tipe);
            }
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

    public function kosongkan_stok($perequest)
    {
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
        $stok = $data_adm->stok;

        $page_data = $this->M_Stok_obat_ok->selectStok($stok);

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            if ($page_data[$i]->stok == -0) {
                $stok = 0;
            } else {
                $stok  = $page_data[$i]->stok;
            }

            if ($perequest == "apotik") {
                if ($stok != 0) {
                    $data_stok = array(
                        'id_stok' => uniqid(),
                        'id_logistik' => $page_data[$i]->id_logistik,
                        'tgl' => date("Y-m-d H:i:s"),
                        'keterangan' => "MASUK",
                        'frek' => $stok * -1,
                        'kadaluarsa' => $page_data[$i]->kadaluarsa,
                        'asal_tujuan' => "BASE",
                        'id_req' =>  '-',
                        'id_staff' => 'AKIL',
                    );
                    $this->M_Apotik->insert_tindakan($data_stok, 'stok_apotik');
                }
            }
        }
        echo "success";
    }
    public function tampil_detail_stok()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
        $stok = $data_adm->stok;

        $id_logistik = $this->input->post('id_logistik');
        $page_data = $this->M_Stok_obat_ok->selectDetailStok($id_logistik, $stok);
        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // if ($perequest == "rawatinap") {
            //     $stok1 = number_format($this->M_Stok_obat_ok->getStokRanap($page_data[$i]->id_logistik)->stok);
            //     $stok2 = number_format($this->M_Stok_obat_ok->getStokRanap1($page_data[$i]->id_logistik)->stok);
            //     $frek = intval($stok1) + intval($stok2);
            // } else {
            $frek  = $page_data[$i]->stok;
            // }

            $tombol =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='tampilKurang(\"" . $page_data[$i]->id_logistik . "\",\"" . $page_data[$i]->nama . "\",\"" . $frek . "\",\"" . $page_data[$i]->kadaluarsa . "\")' '><i class='fa fa-rocket '></i></button>";
            $no = $i + 1;
            $nama = $page_data[$i]->nama;
            $kadaluarsa = $page_data[$i]->kadaluarsa;

            $out[$i] = array($no, $tombol, $nama, $kadaluarsa, $frek);
        }

        $page_data['data'] = $out;
        echo json_encode($page_data);
    }
    public function tambah_stok_ok()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");
        $id_logistik = $this->input->post('id_logistik');
        $perequest = $data->tipe;
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
        $stok = $data_adm->stok;

        if ($perequest == "apotik" || $perequest == "deporanap") {
            $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaanFarmasi($id_logistik)->stok;

            $datastok = array(
                'id_stok' => uniqid(),
                'id_logistik' => $this->input->post('id_logistik'),
                'tgl' => $tgl,
                'keterangan' => "MASUK",
                'frek' => $this->input->post('frek'),
                'saldo' => $getStok + ($this->input->post('frek')),
                'kadaluarsa' => $this->input->post('tglExp'),
                'asal_tujuan' => "BASE",
                'id_req' =>  '',
                'id_staff' => $data->id_staff,
            );
        } else if ($perequest == "rawatinap") {

            $datastok = array(
                'id_stok' => uniqid(),
                'id_logistik' => $this->input->post('id_logistik'),
                'tgl' => $tgl,
                'keterangan' => "MASUK",
                'frek' => $this->input->post('frek'),
                'kadaluarsa' => $this->input->post('tglExp'),
                'asal_tujuan' => "BASE",
                'id_req' =>  '-',
                'id_resep' =>  $data->ruangan,
                'id_staff' => $data->id_staff,
            );
        } else {

            $datastok = array(
                'id_stok' => uniqid(),
                'id_logistik' => $this->input->post('id_logistik'),
                'tgl' => $tgl,
                'keterangan' => "MASUK",
                'frek' => $this->input->post('frek'),
                'kadaluarsa' => $this->input->post('tglExp'),
                'asal_tujuan' => "BASE",
                'id_req' =>  '-',
                'id_staff' => $data->id_staff,
            );
        }
        if ($perequest == "apotik") {
            $stok = "stok_apotik";
            $this->M_Stok_obat_ok->insert_tindakan($datastok, $stok);
            $this->M_Apotik->update_perencanaan($id_logistik, $stok, 'pr_apotik');
            $out['status'] = "success";
        } else if ($perequest == "bpjs") {
            $stok = "stok_bpjs";
            $this->M_Stok_obat_ok->insert_tindakan($datastok, $stok);
        } else if ($perequest == "deporanap") {
            $stok = "stok_depo";
            $this->M_Stok_obat_ok->insert_tindakan($datastok, $stok);
            $this->M_Apotik->update_perencanaan($id_logistik, $stok, 'pr_depo');
        } else if ($perequest == "igdapotik" || $perequest == "igd" || $perequest == "igdponek") {
            $stok = "stok_igd";
            $this->M_Stok_obat_ok->insert_tindakan($datastok, $stok);

            $this->M_Apotik->update_perencanaan($id_logistik, $stok, 'pr_igd');
        } else {
            $this->M_Stok_obat_ok->insert_tindakan($datastok, $stok);
        }


        $out['status'] = "success";
        echo json_encode($out);
    }
    public function getExpStok()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
        $stok = $data_adm->stok;

        $obat = $this->input->post('obat');
        $data = $this->M_Stok_obat_ok->getExpByObat($obat, $stok);

        echo json_encode($data);
    }
    public function retur_stok_ok()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");
        $id_logistik = $this->input->post('id_logistik');
        $perequest = $data->tipe;
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
        $stok = $data_adm->stok;


        $getStok = $this->M_Logistik_farmasi->getStokByRiwayatPermintaanFarmasi($id_logistik);

        $datastok = array(
            'id_stok' => uniqid(),
            'id_logistik' => $this->input->post('id_logistik'),
            'tgl' => $tgl,
            'keterangan' => "RETUR RUANGAN",
            'frek' => $this->input->post('frek'),
            'saldo' => $getStok->stok + ($this->input->post('frek')),
            'kadaluarsa' => $getStok->kadaluarsa,
            'asal_tujuan' => $this->input->post('ruangan'),
            'id_req' =>  '-',
            'id_staff' => $data->id_staff,
        );

        $this->M_Stok_obat_ok->insert_tindakan($datastok, $stok);



        $out['status'] = "success";
        echo json_encode($out);
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
