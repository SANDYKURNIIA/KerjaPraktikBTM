<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AgingObat_Scm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_Laporan_farmasi');
    }

    public function Menu($tipe)
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Aging_ObatScm';
        $page_data['url'] = 'AgingObat_Scm/Tampil_laporan';
        $page_data['tipe'] = $tipe;

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan()
    {
        $data_staff = $this->session->userdata('data_auth');

        $periode = $this->input->post('periode');
        $tipe = $this->input->post('tipe');
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $data_staff->tipe])->row();
        $stok = $data_adm->stok;

        if($tipe=='obat'){
            $page_data = $this->M_Laporan_farmasi->Select_aging_obat_scm($periode, $stok);

        }else{
            $page_data = $this->M_Laporan_farmasi->Select_aging_bmhp_scm($periode, $stok);

        }


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $id_logistik = $page_data[$i]->kode_sibatik;
            $nama = $page_data[$i]->nama;
            $distributor = $page_data[$i]->id_produsen;
            $standar = $page_data[$i]->standar;
            $kode = $page_data[$i]->kode;
            $frek = round($page_data[$i]->akhir, 2);
            $harga_beli = round($page_data[$i]->harga_beli, 2);
            $nilai = round($harga_beli * $frek, 2);

            $date1 = strtotime($periode . '-01');

            $akhir_bulan = strtotime('-1 second', strtotime('+1 month', $date1)); //tgl akhir bulan
            $tgl_cut_off = date("Y-m-d", $akhir_bulan); //format tgl 
            $tgl = date("Y-m-d", strtotime($page_data[$i]->tgl)); //format tgl 

            $date1 = new DateTime($tgl);
            $date2 = new DateTime($tgl_cut_off);
            $interval = $date1->diff($date2);
            $aging_persediaan_hari = $interval->days;
            $aging_persediaan_bulan = round($interval->y * 12 + $interval->m + $interval->d / 30);
            $frek_3bulan = ($aging_persediaan_bulan<3)?$frek:0;
            $frek_3_6bulan = ($aging_persediaan_bulan>=3 && $aging_persediaan_bulan<=3)?$frek:0;
            $frek_6bulan = ($aging_persediaan_bulan>6)?$frek:0;

            $val_3bulan = ($aging_persediaan_bulan<3)?$nilai:0;
            $val_3_6bulan = ($aging_persediaan_bulan>=3 && $aging_persediaan_bulan<=3)?$nilai:0;
            $val_6bulan = ($aging_persediaan_bulan>6)?$nilai:0;

            $frek_total = $frek_3bulan + $frek_3_6bulan + $frek_6bulan;
            $val_total = $val_3bulan + $val_3_6bulan + $val_6bulan;

            $tgl_cut_off = date('d/m/Y', $akhir_bulan);
            $tgl = date('d/m/Y', strtotime($page_data[$i]->tgl));


            $out[$i] = array($no, $id_logistik, $kode, $nama, $distributor, $standar, $frek, $harga_beli, $nilai, $tgl,$tgl_cut_off,$aging_persediaan_hari,$aging_persediaan_bulan,$frek_3bulan,$val_3bulan,$frek_3_6bulan,$val_3_6bulan,$frek_6bulan,$val_6bulan,$frek_total,$val_total,'Logistik Farmasi');
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
        }
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AgingObat_Scm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_Laporan_farmasi');
    }

    public function Menu($tipe)
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Aging_ObatScm';
        $page_data['url'] = 'AgingObat_Scm/Tampil_laporan';
        $page_data['tipe'] = $tipe;

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_laporan()
    {
        $data_staff = $this->session->userdata('data_auth');

        $periode = $this->input->post('periode');
        $tipe = $this->input->post('tipe');
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $data_staff->tipe])->row();
        $stok = $data_adm->stok;

        if($tipe=='obat'){
            $page_data = $this->M_Laporan_farmasi->Select_aging_obat_scm($periode, $stok);

        }else{
            $page_data = $this->M_Laporan_farmasi->Select_aging_bmhp_scm($periode, $stok);

        }


        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $id_logistik = $page_data[$i]->kode_sibatik;
            $nama = $page_data[$i]->nama;
            $distributor = $page_data[$i]->id_produsen;
            $standar = $page_data[$i]->standar;
            $kode = $page_data[$i]->kode;
            $frek = round($page_data[$i]->akhir, 2);
            $harga_beli = round($page_data[$i]->harga_beli, 2);
            $nilai = round($harga_beli * $frek, 2);

            $date1 = strtotime($periode . '-01');

            $akhir_bulan = strtotime('-1 second', strtotime('+1 month', $date1)); //tgl akhir bulan
            $tgl_cut_off = date("Y-m-d", $akhir_bulan); //format tgl 
            $tgl = date("Y-m-d", strtotime($page_data[$i]->tgl)); //format tgl 

            $date1 = new DateTime($tgl);
            $date2 = new DateTime($tgl_cut_off);
            $interval = $date1->diff($date2);
            $aging_persediaan_hari = $interval->days;
            $aging_persediaan_bulan = round($interval->y * 12 + $interval->m + $interval->d / 30);
            $frek_3bulan = ($aging_persediaan_bulan<3)?$frek:0;
            $frek_3_6bulan = ($aging_persediaan_bulan>=3 && $aging_persediaan_bulan<=3)?$frek:0;
            $frek_6bulan = ($aging_persediaan_bulan>6)?$frek:0;

            $val_3bulan = ($aging_persediaan_bulan<3)?$nilai:0;
            $val_3_6bulan = ($aging_persediaan_bulan>=3 && $aging_persediaan_bulan<=3)?$nilai:0;
            $val_6bulan = ($aging_persediaan_bulan>6)?$nilai:0;

            $frek_total = $frek_3bulan + $frek_3_6bulan + $frek_6bulan;
            $val_total = $val_3bulan + $val_3_6bulan + $val_6bulan;

            $tgl_cut_off = date('d/m/Y', $akhir_bulan);
            $tgl = date('d/m/Y', strtotime($page_data[$i]->tgl));


            $out[$i] = array($no, $id_logistik, $kode, $nama, $distributor, $standar, $frek, $harga_beli, $nilai, $tgl,$tgl_cut_off,$aging_persediaan_hari,$aging_persediaan_bulan,$frek_3bulan,$val_3bulan,$frek_3_6bulan,$val_3_6bulan,$frek_6bulan,$val_6bulan,$frek_total,$val_total,'Logistik Farmasi');
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
        }
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
