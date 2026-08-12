<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan_keuangan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }

    public function Jasa_service()
    {
        $this->load->view('assets/_header');
        $page_data['url'] = 'Laporan_keuangan/get_jasa_service';
        $page_data['page_content'] = 'Jurnal/Laporan_jasa_service';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function get_jasa_service()
    {
        $out = null;
        // $staff = $this->session->userdata('data_auth');
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->db->query("SELECT a.*,'UMUM' as vendor FROM(
            SELECT b.tgl_keluar tgl, p.no_rm, p.nama , a.no_jurnal, t.total
            FROM akun_tindakan a 
            join tindakan_apelkes t on a.id_pelayanan = t.id_pelayanan 
            join pelayanan b on a.id_pelayanan = b.id_pelayanan 
            join pasien p on p.no_rm = b.id_pasien 
            join jurnal_cara_pembayaran j on a.no_jurnal = j.no_jurnal 
            where (j.tgl between '$first_date' and '$second_date') and t.id_list_tindakan='1413' and a.cara_bayar ='42'
            group by t.id_tindakan_apelkes
            ) as a
            union all
            SELECT * from (
            SELECT u.tgl, p.no_rm, p.nama , a.invoice no_jurnal, t.total, u.vendor
            FROM detail_pembayaran_piutang a 
            join pembayaran_piutang u on a.id_fk = u.no_dokumen
            join tindakan_apelkes t on a.id_pelayanan = t.id_pelayanan 
            join pelayanan b on a.id_pelayanan = b.id_pelayanan 
            join pasien p on p.no_rm = b.id_pasien 

            where (u.tgl between '$first_date' and '$second_date') and t.id_list_tindakan='1413'
            group by t.id_tindakan_apelkes
            ) as b
            order by tgl asc
            ")->result();
            for ($i = 0; $i < count($page_data); $i++) {
                $tgl = indo_date($page_data[$i]->tgl);

                $no = $i + 1;
                $out[$i] = array(
                    $no,
                    date('d-m-Y', strtotime($page_data[$i]->tgl)),
                    $page_data[$i]->no_rm,
                    $page_data[$i]->nama,
                    $page_data[$i]->no_jurnal,
                    $page_data[$i]->total,
                    $page_data[$i]->vendor,
                );
            }
        } else {
            // $page_data = $this->M_Jurnal_keuangan->SelectLaporanRekapJurnal();
            $out = null;
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
}
