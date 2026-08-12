<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan_diagnosa_tbc extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('bhce_helper');
        $this->load->model('M_IGD');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Riwayat_diagnosa_tbc';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_diag()
    {
        $data = $this->session->userdata('data_auth');
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_IGD->getDatadiagRange($first_date, $second_date);
        } else {
            $page_data = $this->M_IGD->getDatadiag();
        }
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tgl_masuk = indo_date2($page_data[$i]->tgl_masuk);
            $tgl_skrining = indo_date2($page_data[$i]->tgl_skrining);

            $id_pelayanan = $page_data[$i]->id_pelayanan;
            $nama = $page_data[$i]->nama;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $poli = $page_data[$i]->nama_panjang;
            $dpjp = $page_data[$i]->dpjp;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $nama, $jenis_kelamin, $no_rm, $poli, $dpjp, $keterangan, $tgl_masuk, $tgl_skrining);
        }

        // Jika hasil kosong, kirimkan respons JSON dengan data kosong
        if (empty($out)) {
            echo json_encode(array("data" => array()));
        } else {
            echo json_encode(array("data" => $out));
        }
        exit;
    }

    public function tampil_bhce()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Riwayat_bhce';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_bhce()
    {
        $data = $this->session->userdata('data_auth');
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $jenis_kelamin_list = array('LAKI-LAKI', 'PEREMPUAN'); // Memisahkan jenis kelamin menjadi array
        $poli_list = array("paru", "anak", "dalam", "umum", "obgyn");

        // Mengambil data berdasarkan tanggal atau semua data
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_IGD->getBhceRange($first_date, $second_date);
        }

        // Menyiapkan array output
        $out = array();

        // Iterasi melalui data page_data
        for ($i = 0; $i < count($page_data); $i++) {
            $tanggal = $page_data[$i]->tgl_masuk;

            for ($j = 0; $j < count($poli_list); $j++) {
                $poli = $poli_list[$j];

                for ($k = 0; $k < count($jenis_kelamin_list); $k++) {
                    $jenis_kelamin = $jenis_kelamin_list[$k];

                    $jumlah_pasien = $this->M_IGD->jumlah_pasien_per_poli($poli, $jenis_kelamin);
                    $jumlah_skrin = $this->M_IGD->jumlah_skrining($poli, $jenis_kelamin);
                    $jumlah_terduga_per = $this->M_IGD->jumlah_terduga_per_poli($poli, $jenis_kelamin);

                    $out[] = array(
                        $tanggal,
                        $poli,
                        $jenis_kelamin,
                        $jumlah_pasien,
                        $jumlah_skrin,
                        $jumlah_terduga_per
                    );
                }
            }
        }


        // Jika hasil kosong, kirimkan respons JSON dengan data kosong
        if (empty($out)) {
            echo json_encode(array("data" => array()));
        } else {
            echo json_encode(array("data" => $out));
        }
        exit;
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan_diagnosa_tbc extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('bhce_helper');
        $this->load->model('M_IGD');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Riwayat_diagnosa_tbc';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_diag()
    {
        $data = $this->session->userdata('data_auth');
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_IGD->getDatadiagRange($first_date, $second_date);
        } else {
            $page_data = $this->M_IGD->getDatadiag();
        }
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $tgl_masuk = indo_date2($page_data[$i]->tgl_masuk);
            $tgl_skrining = indo_date2($page_data[$i]->tgl_skrining);

            $id_pelayanan = $page_data[$i]->id_pelayanan;
            $nama = $page_data[$i]->nama;
            $no_rm =  "'" . sprintf('%06d', $page_data[$i]->no_rm);
            $jenis_kelamin = $page_data[$i]->jenis_kelamin;
            $poli = $page_data[$i]->nama_panjang;
            $dpjp = $page_data[$i]->dpjp;
            $keterangan = $page_data[$i]->keterangan;

            $out[$i] = array($no, $nama, $jenis_kelamin, $no_rm, $poli, $dpjp, $keterangan, $tgl_masuk, $tgl_skrining);
        }

        // Jika hasil kosong, kirimkan respons JSON dengan data kosong
        if (empty($out)) {
            echo json_encode(array("data" => array()));
        } else {
            echo json_encode(array("data" => $out));
        }
        exit;
    }

    public function tampil_bhce()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Riwayat_bhce';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function tampil_data_bhce()
    {
        $data = $this->session->userdata('data_auth');
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        $jenis_kelamin_list = array('LAKI-LAKI', 'PEREMPUAN'); // Memisahkan jenis kelamin menjadi array
        $poli_list = array("paru", "anak", "dalam", "umum", "obgyn");

        // Mengambil data berdasarkan tanggal atau semua data
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->M_IGD->getBhceRange($first_date, $second_date);
        }

        // Menyiapkan array output
        $out = array();

        // Iterasi melalui data page_data
        for ($i = 0; $i < count($page_data); $i++) {
            $tanggal = $page_data[$i]->tgl_masuk;

            for ($j = 0; $j < count($poli_list); $j++) {
                $poli = $poli_list[$j];

                for ($k = 0; $k < count($jenis_kelamin_list); $k++) {
                    $jenis_kelamin = $jenis_kelamin_list[$k];

                    $jumlah_pasien = $this->M_IGD->jumlah_pasien_per_poli($poli, $jenis_kelamin);
                    $jumlah_skrin = $this->M_IGD->jumlah_skrining($poli, $jenis_kelamin);
                    $jumlah_terduga_per = $this->M_IGD->jumlah_terduga_per_poli($poli, $jenis_kelamin);

                    $out[] = array(
                        $tanggal,
                        $poli,
                        $jenis_kelamin,
                        $jumlah_pasien,
                        $jumlah_skrin,
                        $jumlah_terduga_per
                    );
                }
            }
        }


        // Jika hasil kosong, kirimkan respons JSON dengan data kosong
        if (empty($out)) {
            echo json_encode(array("data" => array()));
        } else {
            echo json_encode(array("data" => $out));
        }
        exit;
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
