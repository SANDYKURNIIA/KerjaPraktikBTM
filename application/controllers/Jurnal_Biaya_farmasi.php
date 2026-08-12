<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Jurnal_Biaya_farmasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Jurnal_biaya_farmasi', 'jurnal');
        $this->load->model('M_Jurnal_keuangan');
        $this->load->model('M_Jurnal');
    }

    public function Tampil_laporan_persediaan($tgl)
    {
        // $tgl =  date('Y-m-d');
        $out = null;
        $page_data = $this->db->query("SELECT tindakan_farmasi.id_tindakan_farmasi,tindakan_farmasi.frek,list_logistik.harga_persediaan,tindakan_farmasi.id_list_tindakan ,tindakan_farmasi.tanggal 
        from tindakan_farmasi 
        join list_logistik on tindakan_farmasi.id_list_tindakan = list_logistik.id_logistik
        where tanggal like '$tgl%'")->result();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $id_logistik = $page_data[$i]->id_list_tindakan;
            $date = $page_data[$i]->tanggal;


            $data_struk = $this->jurnal->getHargaBeli($date, $id_logistik);


            $harga_beli = isset($data_struk->harga_beli) ? round($data_struk->harga_beli, 2) : $page_data[$i]->harga_persediaan;

            $harga_beli = $harga_beli;

            $this->jurnal->update_tindakan(['harga_persediaan' => $harga_beli], ['id_tindakan_farmasi' => $page_data[$i]->id_tindakan_farmasi, 'harga_persediaan' => 0], 'tindakan_farmasi');


            // $out[$i] = array(
            //     'id_tindakan' => $page_data[$i]->id_tindakan_farmasi,
            //     'id' => $id_logistik,
            //     'harga' => $harga_beli,
            // );
        }

        // print_arr($out);
    }



    public function tampil_jurnal_material()
    {
        $out = null;
        $tgl = $this->input->post('bulan');
        $bulan = date('m', strtotime($tgl));
        $tahun = date('Y', strtotime($tgl));

        // $this->Tampil_laporan_persediaan($tgl);
        $akun_apotik = array();
        $dt = $this->db->get_where('akun_biaya_farmasi', ['bulan' => $bulan, 'tahun'=>$tahun,'status'=>1])->num_rows();
        if ($dt==0) {
            $this->jurnal->delete_tindakan(['bulan' => $bulan, 'tahun' => $tahun, 'status' => 0], 'akun_biaya_farmasi');

            $page_data = $this->jurnal->SelectJurnalMaterial($tgl);

            for ($i = 0; $i < count($page_data); $i++) {
                // echo  $page_data[$i]->total;

                if ($page_data[$i]->jenis_pelayanan == "RAWAT INAP" || $page_data[$i]->jenis_pelayanan == "RANAP" || $page_data[$i]->jenis_pelayanan == "ONE DAY CARE (ODC)") {
                    if ($page_data[$i]->jenis_pelayanan == "ONE DAY CARE (ODC)") {
                        $coa = '10';
                        $kelas = 'ONE DAY CARE (ODC)';
                    } else {
                        $coa = $page_data[$i]->kode_coa;
                        $kelas = $page_data[$i]->kelas;
                    }
                    if ($page_data[$i]->coa_pendapatan == "OBAT") {
                        $kode_coa_far = '802' . '.' . $coa . '.421';
                        $jenis_akun = 'OBAT FARMASI RAWAT INAP';
                    } else {
                        $kode_coa_far = '802' . '.' . $coa . '.431';
                        $jenis_akun = 'MEDICAL SUPPLIES RAWAT INAP';
                    }

                    $akun_apotik[] = [

                        'lap' => lap,
                        'total_akun' => $page_data[$i]->total,
                        'jenis_akun' => $jenis_akun . ' ' . $kelas,
                        'kode_akun' => $kode_coa_far
                    ];
                } else {
                    $jenis = explode('_', $page_data[$i]->poli);
                    if ($page_data[$i]->jenis_pelayanan == "POLI" || $page_data[$i]->jenis_pelayanan == "POLI PRIORITAS" || $jenis[0] == 'his') {
                        $db_list_poli = $this->M_Jurnal->poli_apotik($page_data[$i]->poli);
                        $kode_coa_poli = $db_list_poli->row()->kode_coa;
                        $jenis_poli = $db_list_poli->row()->jenis_pelayanan;
                        $nama_poli = $db_list_poli->row()->nama_panjang;
                        if ($jenis_poli == 'POLI PRIORITAS') {
                            $lap = lap . 'P';
                        } else {
                            $lap = lap;
                        }

                        if ($page_data[$i]->coa_pendapatan == "OBAT") {
                            $kode_coa_far =  '801' . '.' . $kode_coa_poli . '.' . '420';
                            $jenis_akun = 'OBAT FARMASI RAWAT JALAN';
                        } else {
                            $kode_coa_far =  '801' . '.' . $kode_coa_poli . '.' . '430';
                            $jenis_akun = 'MEDICAL SUPPLIES RAWAT JALAN';
                        }
                    } else if ($page_data[$i]->jenis_pelayanan == "IGD" || $page_data[$i]->jenis_pelayanan == "UGD") {

                        $nama_poli = 'IGD';
                        if ($page_data[$i]->coa_pendapatan == "OBAT") {
                            $kode_coa_far =  '801.14.421';
                            $jenis_akun = 'OBAT FARMASI RAWAT JALAN';
                        } else {
                            $kode_coa_far =  '801.14.431';
                            $jenis_akun = 'MEDICAL SUPPLIES RAWAT JALAN';
                        }
                        $lap = lap;
                    } else if ($page_data[$i]->jenis_pelayanan == "FARMASI RAJAL" || $page_data[$i]->jenis_pelayanan == "FARMASI RANAP") {

                        $nama_poli = $page_data[$i]->kelas;
                        if ($page_data[$i]->coa_pendapatan == "OBAT") {

                            $kode_coa_far = ($nama_poli == 'LOKET B') ? $page_data[$i]->kode_coa . '421' : $page_data[$i]->kode_coa . '420';
                            $jenis_akun = 'OBAT FARMASI RAWAT JALAN';
                        } else {
                            $kode_coa_far = ($nama_poli == 'LOKET A') ? $page_data[$i]->kode_coa . '431' : $page_data[$i]->kode_coa . '430';
                            $jenis_akun = 'MEDICAL SUPPLIES RAWAT JALAN';
                        }
                        $lap = lap;
                    }

                    $akun_apotik[] = [
                        'lap' => $lap,

                        'total_akun' => $page_data[$i]->total,
                        'jenis_akun' => $jenis_akun . ' ' . $nama_poli,
                        'kode_akun' => $kode_coa_far
                    ];
                }
            }
            foreach ($akun_apotik as $item) {

                $this->jurnal->insert_tindakan(
                    [
                        'bulan' => $bulan,
                        'tahun' => $tahun,
                        'total_akun' => $item['total_akun'],
                        'jenis_akun' => $item['jenis_akun'],
                        'kode_akun' => $item['kode_akun'],
                        'lap' => $item['lap'],
                    ],
                    'akun_biaya_farmasi'
                );
            }
        }


        $dt = $this->jurnal->SelectBiayaFarmasi($bulan, $tahun);

        for ($j = 0; $j < count($dt); $j++) {
            $no = $j + 1;
            $kode_akun = $dt[$j]->kode_akun;
            $lap = $dt[$j]->lap;
            $total = number_format($dt[$j]->total, 2, ',', '.');
            $jenis_akun = "BIAYA FARMASI " . $dt[$j]->jenis_akun;
            $out[$j] = array($no, $kode_akun, $jenis_akun, $total);
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

    public function setJurnalMaterial()
    {
        $staff = $this->session->userdata('data_auth');

        $tgl = $this->input->post('bulan');
        $bulan = date('m', strtotime($tgl));
        $tahun = date('Y', strtotime($tgl));
        $date = strtotime($tgl . '-01');
        $tgl_jurnal = strtotime('-1 second', strtotime('+1 month', $date));

        $page_data = $this->jurnal->SelectBiayaFarmasi($bulan, $tahun);



        $id_fk = implode("", [uniqid(), $staff->username]);
        $kode = '306';
        $maxR = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, '')->max;
        $noValidR =  sprintf('%04d', $maxR + 1, 'dyhtdyu');
        $noDokR = $noValidR . "/" . "GL-" . $kode . "/" . date('my');
        $dokumen = ['no_dokumen' => $noDokR, 'no_index' => $maxR + 1, 'kode' => $kode, 'tgl' => date('Y-m-d H:i:s'), 'staff' => $staff->nama];
        $this->jurnal->insert_tindakan($dokumen, 'dokumen_jurnal');

        for ($i = 0; $i < count($page_data); $i++) {
            $arr = explode(".", $page_data[$i]->kode_akun);


            $jurnal_pendapatan = [
                'id_fk' => $id_fk,
                'jk' => '15',
                'rekening' => $page_data[$i]->kode_akun,
                'deskripsi' => "BIAYA FARMASI " . $page_data[$i]->jenis_akun,
                'no_jurnal' => $noDokR,
                'no_index' => $maxR + 1,
                'jenis' => $kode,
                'kredit' => 0,
                'debet' => $page_data[$i]->total,
                'lap' => $page_data[$i]->lap,
                'jb' => $arr[2],
                'cj' => '101',
                'pk' => date('dmy', $tgl_jurnal),
                'tgl' => date('Y-m-d', $tgl_jurnal),
                'des_rek' => "BIAYA FARMASI " . $page_data[$i]->jenis_akun,
                'staff' => $staff->nama

            ];
            $this->jurnal->insert_tindakan($jurnal_pendapatan, 'jurnal_material');
        }

        $dj = $this->db->get_where('jurnal_material', ['no_jurnal' => $noDokR])->num_rows();
        if ($dj > 0) {
            $persediaan = $this->jurnal->material_persediaan($tgl);
            for ($k = 0; $k < count($persediaan); $k++) {
                $jurnal_1 = [
                    'id_fk' => $id_fk,
                    'jk' => '15',
                    'rekening' => $persediaan[$k]->coa,
                    'deskripsi' => $persediaan[$k]->desk,
                    'no_jurnal' => $noDokR,
                    'no_index' => $maxR + 1,
                    'jenis' => $kode,
                    'kredit' => $persediaan[$k]->total,
                    'debet' => 0,
                    'lap' => lap,
                    'jb' => '011',
                    'cj' => '101',
                    'pk' => date('dmy', $tgl_jurnal),
                    'tgl' => date('Y-m-d', $tgl_jurnal),
                    'des_rek' => $persediaan[$k]->desk,
                    'staff' => $staff->nama

                ];
                $this->jurnal->insert_tindakan($jurnal_1, 'jurnal_material_persediaan');
            }

            $this->jurnal->update_tindakan(['status' => 1, 'no_jurnal' => $noDokR], ['bulan' => $bulan, 'tahun' => $tahun], 'akun_biaya_farmasi');
            $out['status'] = 'success';
        } else {
            $out['status'] = 'Jurnal sudah pernah terbuat untuk bulan ini';
        }
        echo json_encode($out);
    }
    public function Verifikasi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Jurnal_material_verifikasi';
        $page_data['url_cetak'] = 'Jurnal_onuse/cetak_jurnal_material';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_jurnal_verifikasi()
    {

        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->jurnal->SelectVerifMaterial($first_date, $second_date);
        } else {
            $page_data = $this->jurnal->SelectVerifMaterial($tgl, $tgl);
        }


        for ($i = 0; $i < count($page_data); $i++) {

            $tgl = indo_date2($page_data[$i]->tgl);

            $no = $i + 1;


            $no_jurnal = $page_data[$i]->no_jurnal;
            $debet = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            $jk = $page_data[$i]->jk;
            $pk = $page_data[$i]->pk;
            if ($page_data[$i]->status == null || $page_data[$i]->status == '') {
                $verif = "<button style='font-size:14px;color:white;' onclick='verifikasi(\"" .  $page_data[$i]->no_jurnal .  "\")' class='badge bg-pink'>VERIFIKASI</button>";
            } elseif ($page_data[$i]->status == 'DITERIMA') {
                $verif = '<span class="label label-success">' . $page_data[$i]->status . '</span>';
            } elseif ($page_data[$i]->status == 'DITOLAK') {
                $verif = '<span class="label label-danger">' . $page_data[$i]->status . '</span>';
            } else {
                $verif = "<button style='font-size:14px;color:white;' onclick='verifikasi(\"" .  $page_data[$i]->no_jurnal .  "\")' class='badge bg-pink'>VERIFIKASI</button>";
            }
            $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='setJurnal(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $jk . "\")' '><i class='icon-printer '></i></button>";


            $out[$i] = array($no, $verif, $cetak, $tgl, $no_jurnal, $debet, $staff);
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
    public function verifikasi_jurnal()
    {
        $data_staff = $this->session->userdata('data_auth');
        $noDok = $this->input->post('id_jurnal');
        $data = [
            'staff_verifikasi' => $data_staff->nama,
            'tgl_verif' => date('Y-m-d H:i:s'),
            'status' => $this->input->post('acc'),
        ];

        if ($this->input->post('acc') == '-') {
            $out['status'] = "Status Verifikasi Dipilih terlebih dahulu";
        } else {
            $this->jurnal->update_tindakan($data, ['no_jurnal' => $noDok], 'jurnal_material_persediaan');
            $out['status'] = "success";
        }


        echo json_encode($out);
    }
    public function laporan_persediaan_material()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_persediaan_material';
        $page_data['url'] = 'Jurnal_Biaya_farmasi/Tampil_persediaan';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_persediaan()
    {
        // $tgl =  date('Y-m-d');
        $out = null;
        $page_data = $this->db->query("SELECT * from laporan_persediaan")->result();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $coa = $page_data[$i]->coa;
            $desk = $page_data[$i]->desk;
            $total = number_format($page_data[$i]->total, 2, ',', '.');

          
            $out[$i] = array($no, $coa, $desk, $total);

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
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Jurnal_Biaya_farmasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Jurnal_biaya_farmasi', 'jurnal');
        $this->load->model('M_Jurnal_keuangan');
        $this->load->model('M_Jurnal');
    }

    public function Tampil_laporan_persediaan($tgl)
    {
        // $tgl =  date('Y-m-d');
        $out = null;
        $page_data = $this->db->query("SELECT tindakan_farmasi.id_tindakan_farmasi,tindakan_farmasi.frek,list_logistik.harga_persediaan,tindakan_farmasi.id_list_tindakan ,tindakan_farmasi.tanggal 
        from tindakan_farmasi 
        join list_logistik on tindakan_farmasi.id_list_tindakan = list_logistik.id_logistik
        where tanggal like '$tgl%'")->result();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {

            $id_logistik = $page_data[$i]->id_list_tindakan;
            $date = $page_data[$i]->tanggal;


            $data_struk = $this->jurnal->getHargaBeli($date, $id_logistik);


            $harga_beli = isset($data_struk->harga_beli) ? round($data_struk->harga_beli, 2) : $page_data[$i]->harga_persediaan;

            $harga_beli = $harga_beli;

            $this->jurnal->update_tindakan(['harga_persediaan' => $harga_beli], ['id_tindakan_farmasi' => $page_data[$i]->id_tindakan_farmasi, 'harga_persediaan' => 0], 'tindakan_farmasi');


            // $out[$i] = array(
            //     'id_tindakan' => $page_data[$i]->id_tindakan_farmasi,
            //     'id' => $id_logistik,
            //     'harga' => $harga_beli,
            // );
        }

        // print_arr($out);
    }



    public function tampil_jurnal_material()
    {
        $out = null;
        $tgl = $this->input->post('bulan');
        $bulan = date('m', strtotime($tgl));
        $tahun = date('Y', strtotime($tgl));

        // $this->Tampil_laporan_persediaan($tgl);
        $akun_apotik = array();
        $dt = $this->db->get_where('akun_biaya_farmasi', ['bulan' => $bulan, 'tahun'=>$tahun,'status'=>1])->num_rows();
        if ($dt==0) {
            $this->jurnal->delete_tindakan(['bulan' => $bulan, 'tahun' => $tahun, 'status' => 0], 'akun_biaya_farmasi');

            $page_data = $this->jurnal->SelectJurnalMaterial($tgl);

            for ($i = 0; $i < count($page_data); $i++) {
                // echo  $page_data[$i]->total;

                if ($page_data[$i]->jenis_pelayanan == "RAWAT INAP" || $page_data[$i]->jenis_pelayanan == "RANAP" || $page_data[$i]->jenis_pelayanan == "ONE DAY CARE (ODC)") {
                    if ($page_data[$i]->jenis_pelayanan == "ONE DAY CARE (ODC)") {
                        $coa = '10';
                        $kelas = 'ONE DAY CARE (ODC)';
                    } else {
                        $coa = $page_data[$i]->kode_coa;
                        $kelas = $page_data[$i]->kelas;
                    }
                    if ($page_data[$i]->coa_pendapatan == "OBAT") {
                        $kode_coa_far = '802' . '.' . $coa . '.421';
                        $jenis_akun = 'OBAT FARMASI RAWAT INAP';
                    } else {
                        $kode_coa_far = '802' . '.' . $coa . '.431';
                        $jenis_akun = 'MEDICAL SUPPLIES RAWAT INAP';
                    }

                    $akun_apotik[] = [

                        'lap' => lap,
                        'total_akun' => $page_data[$i]->total,
                        'jenis_akun' => $jenis_akun . ' ' . $kelas,
                        'kode_akun' => $kode_coa_far
                    ];
                } else {
                    $jenis = explode('_', $page_data[$i]->poli);
                    if ($page_data[$i]->jenis_pelayanan == "POLI" || $page_data[$i]->jenis_pelayanan == "POLI PRIORITAS" || $jenis[0] == 'his') {
                        $db_list_poli = $this->M_Jurnal->poli_apotik($page_data[$i]->poli);
                        $kode_coa_poli = $db_list_poli->row()->kode_coa;
                        $jenis_poli = $db_list_poli->row()->jenis_pelayanan;
                        $nama_poli = $db_list_poli->row()->nama_panjang;
                        if ($jenis_poli == 'POLI PRIORITAS') {
                            $lap = lap . 'P';
                        } else {
                            $lap = lap;
                        }

                        if ($page_data[$i]->coa_pendapatan == "OBAT") {
                            $kode_coa_far =  '801' . '.' . $kode_coa_poli . '.' . '420';
                            $jenis_akun = 'OBAT FARMASI RAWAT JALAN';
                        } else {
                            $kode_coa_far =  '801' . '.' . $kode_coa_poli . '.' . '430';
                            $jenis_akun = 'MEDICAL SUPPLIES RAWAT JALAN';
                        }
                    } else if ($page_data[$i]->jenis_pelayanan == "IGD" || $page_data[$i]->jenis_pelayanan == "UGD") {

                        $nama_poli = 'IGD';
                        if ($page_data[$i]->coa_pendapatan == "OBAT") {
                            $kode_coa_far =  '801.14.421';
                            $jenis_akun = 'OBAT FARMASI RAWAT JALAN';
                        } else {
                            $kode_coa_far =  '801.14.431';
                            $jenis_akun = 'MEDICAL SUPPLIES RAWAT JALAN';
                        }
                        $lap = lap;
                    } else if ($page_data[$i]->jenis_pelayanan == "FARMASI RAJAL" || $page_data[$i]->jenis_pelayanan == "FARMASI RANAP") {

                        $nama_poli = $page_data[$i]->kelas;
                        if ($page_data[$i]->coa_pendapatan == "OBAT") {

                            $kode_coa_far = ($nama_poli == 'LOKET B') ? $page_data[$i]->kode_coa . '421' : $page_data[$i]->kode_coa . '420';
                            $jenis_akun = 'OBAT FARMASI RAWAT JALAN';
                        } else {
                            $kode_coa_far = ($nama_poli == 'LOKET A') ? $page_data[$i]->kode_coa . '431' : $page_data[$i]->kode_coa . '430';
                            $jenis_akun = 'MEDICAL SUPPLIES RAWAT JALAN';
                        }
                        $lap = lap;
                    }

                    $akun_apotik[] = [
                        'lap' => $lap,

                        'total_akun' => $page_data[$i]->total,
                        'jenis_akun' => $jenis_akun . ' ' . $nama_poli,
                        'kode_akun' => $kode_coa_far
                    ];
                }
            }
            foreach ($akun_apotik as $item) {

                $this->jurnal->insert_tindakan(
                    [
                        'bulan' => $bulan,
                        'tahun' => $tahun,
                        'total_akun' => $item['total_akun'],
                        'jenis_akun' => $item['jenis_akun'],
                        'kode_akun' => $item['kode_akun'],
                        'lap' => $item['lap'],
                    ],
                    'akun_biaya_farmasi'
                );
            }
        }


        $dt = $this->jurnal->SelectBiayaFarmasi($bulan, $tahun);

        for ($j = 0; $j < count($dt); $j++) {
            $no = $j + 1;
            $kode_akun = $dt[$j]->kode_akun;
            $lap = $dt[$j]->lap;
            $total = number_format($dt[$j]->total, 2, ',', '.');
            $jenis_akun = "BIAYA FARMASI " . $dt[$j]->jenis_akun;
            $out[$j] = array($no, $kode_akun, $jenis_akun, $total);
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

    public function setJurnalMaterial()
    {
        $staff = $this->session->userdata('data_auth');

        $tgl = $this->input->post('bulan');
        $bulan = date('m', strtotime($tgl));
        $tahun = date('Y', strtotime($tgl));
        $date = strtotime($tgl . '-01');
        $tgl_jurnal = strtotime('-1 second', strtotime('+1 month', $date));

        $page_data = $this->jurnal->SelectBiayaFarmasi($bulan, $tahun);



        $id_fk = implode("", [uniqid(), $staff->username]);
        $kode = '306';
        $maxR = $this->M_Jurnal_keuangan->selectNoDokumenPau($kode, '')->max;
        $noValidR =  sprintf('%04d', $maxR + 1, 'dyhtdyu');
        $noDokR = $noValidR . "/" . "GL-" . $kode . "/" . date('my');
        $dokumen = ['no_dokumen' => $noDokR, 'no_index' => $maxR + 1, 'kode' => $kode, 'tgl' => date('Y-m-d H:i:s'), 'staff' => $staff->nama];
        $this->jurnal->insert_tindakan($dokumen, 'dokumen_jurnal');

        for ($i = 0; $i < count($page_data); $i++) {
            $arr = explode(".", $page_data[$i]->kode_akun);


            $jurnal_pendapatan = [
                'id_fk' => $id_fk,
                'jk' => '15',
                'rekening' => $page_data[$i]->kode_akun,
                'deskripsi' => "BIAYA FARMASI " . $page_data[$i]->jenis_akun,
                'no_jurnal' => $noDokR,
                'no_index' => $maxR + 1,
                'jenis' => $kode,
                'kredit' => 0,
                'debet' => $page_data[$i]->total,
                'lap' => $page_data[$i]->lap,
                'jb' => $arr[2],
                'cj' => '101',
                'pk' => date('dmy', $tgl_jurnal),
                'tgl' => date('Y-m-d', $tgl_jurnal),
                'des_rek' => "BIAYA FARMASI " . $page_data[$i]->jenis_akun,
                'staff' => $staff->nama

            ];
            $this->jurnal->insert_tindakan($jurnal_pendapatan, 'jurnal_material');
        }

        $dj = $this->db->get_where('jurnal_material', ['no_jurnal' => $noDokR])->num_rows();
        if ($dj > 0) {
            $persediaan = $this->jurnal->material_persediaan($tgl);
            for ($k = 0; $k < count($persediaan); $k++) {
                $jurnal_1 = [
                    'id_fk' => $id_fk,
                    'jk' => '15',
                    'rekening' => $persediaan[$k]->coa,
                    'deskripsi' => $persediaan[$k]->desk,
                    'no_jurnal' => $noDokR,
                    'no_index' => $maxR + 1,
                    'jenis' => $kode,
                    'kredit' => $persediaan[$k]->total,
                    'debet' => 0,
                    'lap' => lap,
                    'jb' => '011',
                    'cj' => '101',
                    'pk' => date('dmy', $tgl_jurnal),
                    'tgl' => date('Y-m-d', $tgl_jurnal),
                    'des_rek' => $persediaan[$k]->desk,
                    'staff' => $staff->nama

                ];
                $this->jurnal->insert_tindakan($jurnal_1, 'jurnal_material_persediaan');
            }

            $this->jurnal->update_tindakan(['status' => 1, 'no_jurnal' => $noDokR], ['bulan' => $bulan, 'tahun' => $tahun], 'akun_biaya_farmasi');
            $out['status'] = 'success';
        } else {
            $out['status'] = 'Jurnal sudah pernah terbuat untuk bulan ini';
        }
        echo json_encode($out);
    }
    public function Verifikasi()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Jurnal_material_verifikasi';
        $page_data['url_cetak'] = 'Jurnal_onuse/cetak_jurnal_material';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_jurnal_verifikasi()
    {

        $out = null;
        $tgl = date("Y-m-d");
        $first_date = $this->input->post('mulai');
        $second_date = $this->input->post('akhir');
        if ($first_date != '' || $second_date != '') {
            $page_data = $this->jurnal->SelectVerifMaterial($first_date, $second_date);
        } else {
            $page_data = $this->jurnal->SelectVerifMaterial($tgl, $tgl);
        }


        for ($i = 0; $i < count($page_data); $i++) {

            $tgl = indo_date2($page_data[$i]->tgl);

            $no = $i + 1;


            $no_jurnal = $page_data[$i]->no_jurnal;
            $debet = number_format($page_data[$i]->total, 2, ',', '.');
            $staff = $page_data[$i]->staff;
            $jk = $page_data[$i]->jk;
            $pk = $page_data[$i]->pk;
            if ($page_data[$i]->status == null || $page_data[$i]->status == '') {
                $verif = "<button style='font-size:14px;color:white;' onclick='verifikasi(\"" .  $page_data[$i]->no_jurnal .  "\")' class='badge bg-pink'>VERIFIKASI</button>";
            } elseif ($page_data[$i]->status == 'DITERIMA') {
                $verif = '<span class="label label-success">' . $page_data[$i]->status . '</span>';
            } elseif ($page_data[$i]->status == 'DITOLAK') {
                $verif = '<span class="label label-danger">' . $page_data[$i]->status . '</span>';
            } else {
                $verif = "<button style='font-size:14px;color:white;' onclick='verifikasi(\"" .  $page_data[$i]->no_jurnal .  "\")' class='badge bg-pink'>VERIFIKASI</button>";
            }
            $cetak = "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='setJurnal(\"" . $page_data[$i]->no_jurnal . "\",\"" .  $tgl . "\",\"" .  $staff . "\",\"" .  $jk . "\")' '><i class='icon-printer '></i></button>";


            $out[$i] = array($no, $verif, $cetak, $tgl, $no_jurnal, $debet, $staff);
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
    public function verifikasi_jurnal()
    {
        $data_staff = $this->session->userdata('data_auth');
        $noDok = $this->input->post('id_jurnal');
        $data = [
            'staff_verifikasi' => $data_staff->nama,
            'tgl_verif' => date('Y-m-d H:i:s'),
            'status' => $this->input->post('acc'),
        ];

        if ($this->input->post('acc') == '-') {
            $out['status'] = "Status Verifikasi Dipilih terlebih dahulu";
        } else {
            $this->jurnal->update_tindakan($data, ['no_jurnal' => $noDok], 'jurnal_material_persediaan');
            $out['status'] = "success";
        }


        echo json_encode($out);
    }
    public function laporan_persediaan_material()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Laporan_persediaan_material';
        $page_data['url'] = 'Jurnal_Biaya_farmasi/Tampil_persediaan';

        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function Tampil_persediaan()
    {
        // $tgl =  date('Y-m-d');
        $out = null;
        $page_data = $this->db->query("SELECT * from laporan_persediaan")->result();

        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $no = $i + 1;
            $coa = $page_data[$i]->coa;
            $desk = $page_data[$i]->desk;
            $total = number_format($page_data[$i]->total, 2, ',', '.');

          
            $out[$i] = array($no, $coa, $desk, $total);

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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
