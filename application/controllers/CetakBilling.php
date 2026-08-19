<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CetakBilling extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_CetakBilling');
        $this->load->model('M_Kasir');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_CetakBilling';
        // $page_data['url'] = 'CetakBilling/tampil_jasmed';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function print_bill($first_date,$second_date,$jenis_pelayanan,$jenis_klaim)
    {
        // $first_date = $this->input->post('mulai');
        // $second_date = $this->input->post('akhir');
        // $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        // $jenis_klaim = $this->input->post('jenis_klaim');
        $db = $this->M_CetakBilling->selectLaporanRangeBilling($first_date, $second_date, $jenis_pelayanan, $jenis_klaim);

        // print_arr($db);
        foreach ($db as $row) {
            $id_pelayanan = $row->id_pelayanan;
            $id_history = $row->id_history;
            $pendapatan = get_list_pendapatan($id_pelayanan);

            $data = $pendapatan;
            $data['action'] = 'cetak_ulang';
            $data['opsi'] = '-';
            $data['inPel'] = $id_pelayanan;
            $data['inHis'] = $id_history;


            $kasir = $this->M_Kasir->getDetailKasir($id_pelayanan);
            $data['selisih'] = isset($kasir->selisih) ? $kasir->selisih : 0;
            $data['dp'] = isset($kasir->dp) ? $kasir->dp : 0;
            $data['note'] = isset($kasir->note) ? $kasir->note : '';
            $db_diskon = $this->M_Kasir->getDpDiskon($id_history);
            if (!empty($db_diskon)) {
                $data['diskon'] = $db_diskon[0]->diskon_konsul + $db_diskon[0]->diskon_tindakan + $db_diskon[0]->diskon_labor + $db_diskon[0]->diskon_radio + $db_diskon[0]->diskon_visite + $db_diskon[0]->diskon_kamar;
                $data['diskon_konsul'] = $db_diskon[0]->diskon_konsul;
                $data['diskon_tindakan'] = $db_diskon[0]->diskon_tindakan;
                $data['diskon_labor'] = $db_diskon[0]->diskon_labor;
                $data['diskon_radio'] = $db_diskon[0]->diskon_radio;
                $data['diskon_visite'] = $db_diskon[0]->diskon_visite;
                $data['diskon_kamar'] = $db_diskon[0]->diskon_kamar;
            } else {
                $data['diskon'] = 0;
                $data['diskon_konsul'] = 0;
                $data['diskon_tindakan'] = 0;
                $data['diskon_labor'] = 0;
                $data['diskon_radio'] = 0;
                $data['diskon_visite'] = 0;
                $data['diskon_kamar'] = 0;
            }
            $pasien_pulang = $this->db->get_where('v_kunjungan',['id_pelayanan'=>$id_pelayanan, 'id_history'=>$id_history])->row_array();

            if ($jenis_pelayanan == 'POLI') {
                // $pasien_pulang = $this->M_Kasir->getDataPasienPulangPoli($id_pelayanan, $id_history);
                $data['pasien'] = $pasien_pulang;
                $data['tgl_keluar_rajal'] = ($pasien_pulang['tgl_keluar']!=NULL)?$pasien_pulang['tgl_keluar']:'-';

                $response = $this->load->view('print/cetak_pembayaran_poli', $data, TRUE);
            } else if ($jenis_pelayanan == 'RANAP') {
                // $pasien_pulang = $this->M_Kasir->getDataPasienPulang($id_pelayanan, $id_history);
                $data['pasien'] = $pasien_pulang;
                $data['tgl_keluar_ranap'] = ($pasien_pulang['tgl_keluar']!=NULL)?$pasien_pulang['tgl_keluar']:'-';

                $response = $this->load->view('print/cetak_bayar_ranap', $data, TRUE);
            } else {
                // $pasien_pulang = $this->M_Kasir->getDataPasienPulangIGD($id_pelayanan, $id_history);

                $data['pasien'] = $pasien_pulang;
                $data['tgl_keluar_rajal'] = ($pasien_pulang['tgl_keluar']!=NULL)?$pasien_pulang['tgl_keluar']:'-';

                $response = $this->load->view('print/cetak_pembayaran', $data, TRUE);
            }
            echo $response;
        }
    }
}
