<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testing extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Jurnal_keuangan');
        $this->load->model('M_Jurnal_pendapatan');
        $this->load->model('M_Jurnal_pendapatan_nontunai');
        $this->load->model('M_Kasir');
    }


    public function update_coa_1($bulan)
    {

        // $page_data = $this->db->query("SELECT b.id_pelayanan, date(b.tgl_masuk) tgl_masuk, date(b.tgl_keluar) tgl_keluar
        // from v_kunjungan b
        // where date(b.tgl_keluar) like '$bulan%' 
        // and b.cara_bayar not like '%BPJS%'
        // and b.status_rawat='selesai' and b.id_pelayanan not in (select distinct(id_pelayanan) from akun_tindakan)

        // group by b.id_pelayanan  
        // ORDER BY `tgl_masuk` asc
        // ")->result();

             $page_data = $this->db->query("SELECT b.id_pelayanan
        FROM pelayanan b
        WHERE b.tgl_keluar like '$bulan%' and b.status = 1
        and b.id_pelayanan not in (select distinct(id_pelayanan) from akun_tindakan where tgl_input >= '2025-05-01')
        and b.status_rawat ='selesai' and b.cara_bayar !='30'
        group by b.id_pelayanan
        order by b.tgl_keluar asc
        ")->result();

        for ($i = 0; $i < count($page_data); $i++) {
            // updateTglPulang_pendapatan($page_data[$i]->id_pelayanan);
            jurnal($page_data[$i]->id_pelayanan, 'web');

            // jurnal_ijd($page_data[$i]->id_pelayanan);

            echo $page_data[$i]->id_pelayanan . '<br>';
        }

        // updateTglPulang_pendapatan('pl_139660');

        echo "selesai";
    }
    public function update_coa_obat_bebas($bulan)
    {

        $page_data = $this->db->query("SELECT b.id_obat_bebas id_pelayanan
        from obat_bebas b, cara_bayar c
        where b.cara_bayar = c.id_cara_bayar and date(b.tanggal) like '$bulan%' 
        and b.id_obat_bebas not in (select distinct(id_pelayanan) from akun_non_pelayanan)

        ")->result();

        for ($i = 0; $i < count($page_data); $i++) {
            // updateTglPulang_pendapatan($page_data[$i]->id_pelayanan);
            jurnal_obat_bebas($page_data[$i]->id_pelayanan);

            echo $page_data[$i]->id_pelayanan . '<br>';
        }

        // updateTglPulang_pendapatan('pl_139660');

        echo "selesai";
    }
    public function update_coa_mcu($bulan)
    {

        $page_data = $this->db->query("SELECT b.id_mcu id_pelayanan
        from mcu b, cara_bayar c
        where b.cara_bayar = c.id_cara_bayar and date(b.tanggal) like '$bulan%' 
        and b.id_mcu not in (select distinct(id_pelayanan) from akun_non_pelayanan)

        ")->result();

        for ($i = 0; $i < count($page_data); $i++) {
            // updateTglPulang_pendapatan($page_data[$i]->id_pelayanan);
            jurnal_mcu($page_data[$i]->id_pelayanan);

            echo $page_data[$i]->id_pelayanan . '<br>';
        }

        $page_data_1 = $this->db->query("SELECT b.id_pasien id_pelayanan
        from homecare b, cara_bayar c
        where b.cara_bayar = c.id_cara_bayar and date(b.tanggal) like '$bulan%' 
        and b.id_pasien not in (select distinct(id_pelayanan) from akun_non_pelayanan)

        ")->result();

        foreach ($page_data_1 as $row) {
            // updateTglPulang_pendapatan($page_data[$i]->id_pelayanan);
            jurnal_homecare($row->id_pelayanan);

            echo $row->id_pelayanan . '<br>';
        }

        // updateTglPulang_pendapatan('pl_139660');

        echo "selesai";
    }
    public function update_coa_mcu_1()
    {

        $page_data = $this->db->query("SELECT id_pasien id_pelayanan  FROM `detail_kasir_mcu` WHERE `diskon` != 0 AND `tgl` LIKE '%2023-12-30%' ORDER BY `diskon`  DESC

        ")->result();

        for ($i = 0; $i < count($page_data); $i++) {
            // updateTglPulang_pendapatan($page_data[$i]->id_pelayanan);
            jurnal_mcu($page_data[$i]->id_pelayanan);

            echo $page_data[$i]->id_pelayanan . '<br>';
        }



        echo "selesai";
    }
   
    public function update_coa_2($tgl)
    {

        $page_data = $this->db->query("SELECT b.id_pelayanan, date(b.tgl_masuk) tgl_masuk, date(b.tgl_keluar) tgl_keluar
        from v_kunjungan b
        where date(b.tgl_keluar) like '$tgl%' 
        and b.cara_bayar like '%BPJS%'
        and b.status_rawat='selesai' and b.id_pelayanan not in (select distinct(id_pelayanan) from akun_tindakan)

        group by b.id_pelayanan  
        ORDER BY `tgl_masuk` asc
        ")->result();

        for ($i = 0; $i < count($page_data); $i++) {
            // updateTglPulang_pendapatan($page_data[$i]->id_pelayanan);
            jurnal($page_data[$i]->id_pelayanan, 'web');

            // jurnal_ijd($page_data[$i]->id_pelayanan);

            echo $page_data[$i]->id_pelayanan . '<br>';
        }

        // updateTglPulang_pendapatan('pl_139660');

        echo "selesai";
    }
   


    public function jurnal_testing()
    {

        $no_jurnal = '0955/GL-306/1123';

        $db = $this->db->query("SELECT j.*,ifnull(p.cara_bayar,42) cara_bayar,SUBSTRING_INDEX(j.deskripsi,'Deposite ',-1) nama , ifnull(c.kode_pelanggan,'AR4001') id_vendor
        FROM jurnal_testing j 
        left join pelayanan p on j.id_jurnal = p.id_pelayanan  
        left join cara_bayar c on c.id_cara_bayar = p.cara_bayar 
        ")->result();

        foreach ($db as $row) {

            if ($row->id_vendor != 'AR4001') {
                $desk = 'DEPOSITE SELISIH ' . $row->nama;
            } else {
                $desk = $row->deskripsi;
            }
            $data = [
                'id_jurnal' => $row->id_jurnal,
                'jk' => '15',
                'rekening' => $row->rekening,
                'deskripsi' => $desk,
                'no_jurnal' => $no_jurnal,
                'kredit' => 0,
                'debet' => $row->kredit,
                'lap' => '01',
                'jb' => '',
                'cj' => '101',
                'pk' => $row->pk,
                'tgl' => date('Y-m-d H:i:s'),
                'des_rek' => $desk,
                'staff' => 'keuangan',
                'id_fk' => 'DEBIT',
                'id_vendor' => $row->id_vendor,

            ];
        }

        $this->M_Kasir->insert_tindakan($data, 'detail_jurnal_rupa');
    }

    public function update_reduksi()
    {
        $staff = $this->session->userdata('data_auth');
        $id_staff = $staff->id_staff;
        $data_diskon = $this->db->query("SELECT p.*
        FROM detail_kasir_diskon p
        where id_pelayanan not in (select id_pelayanan from akun_reduksi)")->result();

        foreach ($data_diskon as $rows) {

            $id_pelayanan = $rows->id_pelayanan;
            $this->M_Kasir->delete_tindakan(['id_pelayanan' => $id_pelayanan, 'status' => 0], 'akun_reduksi');
            $check = $this->db->get_where('akun_reduksi', ['id_pelayanan' => $id_pelayanan, 'status' => 1])->result();

            if (count($check) == 0) { //jika belum jurnal

                $kunjungan = $this->db->query("SELECT p.*
                FROM detail_kasir_diskon p
                where p.id_pelayanan = '$id_pelayanan'")->result();
                $db_pel = $this->db->query("SELECT cara_bayar FROM pelayanan where id_pelayanan ='$id_pelayanan'")->row();

                foreach ($kunjungan as $row) {
                    $jenis = explode('_', $row->id_history);

                    if ($jenis[0] == 'ranap') {

                        $ruangan = $this->db->query("SELECT h.id_kamar,r.kode_coa FROM history_pelayanan_ranap h, ruangan r
                        where h.id_kamar = r.id_ruangan and h.id_history ='$row->id_history'")->row();
                        $poli = $ruangan->id_kamar;


                        if ($row->diskon_tindakan != 0) {
                            $coa = '722.' . $ruangan->kode_coa . '.131';
                            $jenis_akun = 'Reduksi Pendapatan Tindakan Rawat Inap';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_tindakan,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        } else if ($row->diskon_konsul != 0) {
                            $coa = '722.' . $ruangan->kode_coa . '.151';
                            $jenis_akun = 'Reduksi Pendapatan Konsultasi Rawat Inap';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_konsul,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        } else if ($row->diskon_visite != 0) {
                            $coa = '722.' . $ruangan->kode_coa . '.120';
                            $jenis_akun = 'Reduksi Pendapatan Visite Rawat Inap';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_visite,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        } else if ($row->diskon_kamar != 0) {
                            $coa = '722.' . $ruangan->kode_coa . '.210';
                            $jenis_akun = 'Reduksi Pendapatan Sewa Kamar Perawatan Rawat Inap';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_kamar,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        } else if ($row->diskon_labor != 0) {
                            $coa = '722.' . $ruangan->kode_coa . '.811';
                            $jenis_akun = 'Reduksi Pendapatan Laboratorium Rawat Inap';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_labor,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        } else if ($row->diskon_radio != 0) {
                            $coa = '722.' . $ruangan->kode_coa . '.721';
                            $jenis_akun = 'Reduksi Pendapatan Radiodiagnostik Rawat Inap';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_radio,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        }
                    } else if ($jenis[0] == 'ugd') {

                        $poli = 'IGD';

                        if ($row->diskon_tindakan != 0) {
                            $coa = '721.14.130';
                            $jenis_akun = 'Reduksi Pendapatan Tindakan Rawat Jalan';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_tindakan,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        } else if ($row->diskon_konsul != 0) {
                            $coa = '721.14.150';
                            $jenis_akun = 'Reduksi Pendapatan Konsultasi Rawat Jalan';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_konsul,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        } else if ($row->diskon_labor != 0) {
                            $coa = '721.14.810';
                            $jenis_akun = 'Reduksi Pendapatan Laboratorium Rawat Jalan';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_labor,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        } else if ($row->diskon_radio != 0) {
                            $coa = '721.14.720';
                            $jenis_akun = 'Reduksi Pendapatan Radiodiagnostik Rawat Jalan';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_radio,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        }
                    } else {
                        $ruangan = $this->db->query("SELECT h.nama_poli,h.jenis_pelayanan,r.kode_coa FROM history_pelayanan h, list_poli r
                        where h.nama_poli = r.id_list_poli and h.id_history ='$row->id_history'")->row();

                        if ($ruangan->nama_poli == '146582') {
                            $poli = $ruangan->nama_poli;
                            $jenis_akun = 'Reduksi Pendapatan Penunjang Laboratorium';
                            $coa = '723.02.810';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_labor,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        } else if ($ruangan->nama_poli == '15487956') {
                            $poli = $ruangan->nama_poli;
                            $jenis_akun = 'Reduksi Pendapatan Penunjang Radiologi';
                            $coa = '723.11.720';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_radio,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        } else {
                            if ($ruangan->jenis_pelayanan == 'POLI PRIORITAS') {
                                $lap = lap . 'P';
                            } else {
                                $lap = lap;
                            }

                            $poli = $ruangan->nama_poli;
                            if ($row->diskon_tindakan != 0) {
                                $coa = '721.' . $ruangan->kode_coa . '.130';
                                $jenis_akun = 'Reduksi Pendapatan Tindakan Rawat Jalan';

                                $akun_apelkes = [
                                    'id_staff' => $id_staff,
                                    'id_pelayanan' => $id_pelayanan,
                                    'id_poli' => $poli,
                                    'lap' => $lap,
                                    'cara_bayar' => $db_pel->cara_bayar,
                                    'total_akun' => $row->diskon_tindakan,
                                    'jenis_akun' => $jenis_akun,
                                    'kode_akun' => $coa
                                ];

                                $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                            } else if ($row->diskon_konsul != 0) {
                                $coa = '721.' . $ruangan->kode_coa . '.150';
                                $jenis_akun = 'Reduksi Pendapatan Konsultasi Rawat Jalan';

                                $akun_apelkes = [
                                    'id_staff' => $id_staff,
                                    'id_pelayanan' => $id_pelayanan,
                                    'id_poli' => $poli,
                                    'lap' => $lap,
                                    'cara_bayar' => $db_pel->cara_bayar,
                                    'total_akun' => $row->diskon_konsul,
                                    'jenis_akun' => $jenis_akun,
                                    'kode_akun' => $coa
                                ];

                                $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                            } else if ($row->diskon_labor != 0) {
                                $coa = '721.' . $ruangan->kode_coa . '.810';
                                $jenis_akun = 'Reduksi Pendapatan Laboratorium Rawat Jalan';

                                $akun_apelkes = [
                                    'id_staff' => $id_staff,
                                    'id_pelayanan' => $id_pelayanan,
                                    'id_poli' => $poli,
                                    'lap' => $lap,
                                    'cara_bayar' => $db_pel->cara_bayar,
                                    'total_akun' => $row->diskon_labor,
                                    'jenis_akun' => $jenis_akun,
                                    'kode_akun' => $coa
                                ];

                                $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                            } else if ($row->diskon_radio != 0) {
                                $coa = '721.' . $ruangan->kode_coa . '.720';
                                $jenis_akun = 'Reduksi Pendapatan Radiodiagnostik Rawat Jalan';

                                $akun_apelkes = [
                                    'id_staff' => $id_staff,
                                    'id_pelayanan' => $id_pelayanan,
                                    'id_poli' => $poli,
                                    'lap' => $lap,
                                    'cara_bayar' => $db_pel->cara_bayar,
                                    'total_akun' => $row->diskon_radio,
                                    'jenis_akun' => $jenis_akun,
                                    'kode_akun' => $coa
                                ];

                                $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                            }
                        }
                    }
                }
            }
        }
    }

    public function print_bill()
    {
        $db = $this->db->query("SELECT a.id_pelayanan, h.id_history 
        FROM akun_tindakan a, history_pelayanan h 
        WHERE a.id_pelayanan = h.id_pelayanan and a.no_jurnal = '0425/GL-304/1223' and a.kode_akun ='701.15.130'
        group by a.id_pelayanan
        -- limit 1
        ")->result();
        // print_r($db);

        foreach ($db as $row) {
            $id_pelayanan = $row->id_pelayanan;
            $id_history = $row->id_history;
            $pendapatan = get_list_pendapatan($id_pelayanan);
            $pasien_pulang = $this->M_Kasir->getDataPasienPulangPoli($id_pelayanan, $id_history);

            $data = $pendapatan;
            $data['pasien'] = $pasien_pulang;
            $data['tgl_keluar_rajal'] = $pasien_pulang['tgl_keluar'];
            $data['action'] = 'cetak_ulang';
            $data['inPel'] = $id_pelayanan;
            $data['inHis'] = $id_history;
    

            $kasir = $this->M_Kasir->getDetailKasir($id_pelayanan);
            $data['selisih'] = isset($kasir->selisih) ? $kasir->selisih : 0;
            $data['dp'] = isset($kasir->dp) ? $kasir->dp : 0;
            $data['diskon'] = isset($kasir->diskon) ? $kasir->diskon : 0;
            $data['note'] = isset($kasir->note) ? $kasir->note : '';

            $this->load->view('print/cetak_pembayaran_poli', $data);
        }
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testing extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Jurnal_keuangan');
        $this->load->model('M_Jurnal_pendapatan');
        $this->load->model('M_Jurnal_pendapatan_nontunai');
        $this->load->model('M_Kasir');
    }


    public function update_coa_1($bulan)
    {

        // $page_data = $this->db->query("SELECT b.id_pelayanan, date(b.tgl_masuk) tgl_masuk, date(b.tgl_keluar) tgl_keluar
        // from v_kunjungan b
        // where date(b.tgl_keluar) like '$bulan%' 
        // and b.cara_bayar not like '%BPJS%'
        // and b.status_rawat='selesai' and b.id_pelayanan not in (select distinct(id_pelayanan) from akun_tindakan)

        // group by b.id_pelayanan  
        // ORDER BY `tgl_masuk` asc
        // ")->result();

             $page_data = $this->db->query("SELECT b.id_pelayanan
        FROM pelayanan b
        WHERE b.tgl_keluar like '$bulan%' and b.status = 1
        and b.id_pelayanan not in (select distinct(id_pelayanan) from akun_tindakan where tgl_input >= '2025-05-01')
        and b.status_rawat ='selesai' and b.cara_bayar !='30'
        group by b.id_pelayanan
        order by b.tgl_keluar asc
        ")->result();

        for ($i = 0; $i < count($page_data); $i++) {
            // updateTglPulang_pendapatan($page_data[$i]->id_pelayanan);
            jurnal($page_data[$i]->id_pelayanan, 'web');

            // jurnal_ijd($page_data[$i]->id_pelayanan);

            echo $page_data[$i]->id_pelayanan . '<br>';
        }

        // updateTglPulang_pendapatan('pl_139660');

        echo "selesai";
    }
    public function update_coa_obat_bebas($bulan)
    {

        $page_data = $this->db->query("SELECT b.id_obat_bebas id_pelayanan
        from obat_bebas b, cara_bayar c
        where b.cara_bayar = c.id_cara_bayar and date(b.tanggal) like '$bulan%' 
        and b.id_obat_bebas not in (select distinct(id_pelayanan) from akun_non_pelayanan)

        ")->result();

        for ($i = 0; $i < count($page_data); $i++) {
            // updateTglPulang_pendapatan($page_data[$i]->id_pelayanan);
            jurnal_obat_bebas($page_data[$i]->id_pelayanan);

            echo $page_data[$i]->id_pelayanan . '<br>';
        }

        // updateTglPulang_pendapatan('pl_139660');

        echo "selesai";
    }
    public function update_coa_mcu($bulan)
    {

        $page_data = $this->db->query("SELECT b.id_mcu id_pelayanan
        from mcu b, cara_bayar c
        where b.cara_bayar = c.id_cara_bayar and date(b.tanggal) like '$bulan%' 
        and b.id_mcu not in (select distinct(id_pelayanan) from akun_non_pelayanan)

        ")->result();

        for ($i = 0; $i < count($page_data); $i++) {
            // updateTglPulang_pendapatan($page_data[$i]->id_pelayanan);
            jurnal_mcu($page_data[$i]->id_pelayanan);

            echo $page_data[$i]->id_pelayanan . '<br>';
        }

        $page_data_1 = $this->db->query("SELECT b.id_pasien id_pelayanan
        from homecare b, cara_bayar c
        where b.cara_bayar = c.id_cara_bayar and date(b.tanggal) like '$bulan%' 
        and b.id_pasien not in (select distinct(id_pelayanan) from akun_non_pelayanan)

        ")->result();

        foreach ($page_data_1 as $row) {
            // updateTglPulang_pendapatan($page_data[$i]->id_pelayanan);
            jurnal_homecare($row->id_pelayanan);

            echo $row->id_pelayanan . '<br>';
        }

        // updateTglPulang_pendapatan('pl_139660');

        echo "selesai";
    }
    public function update_coa_mcu_1()
    {

        $page_data = $this->db->query("SELECT id_pasien id_pelayanan  FROM `detail_kasir_mcu` WHERE `diskon` != 0 AND `tgl` LIKE '%2023-12-30%' ORDER BY `diskon`  DESC

        ")->result();

        for ($i = 0; $i < count($page_data); $i++) {
            // updateTglPulang_pendapatan($page_data[$i]->id_pelayanan);
            jurnal_mcu($page_data[$i]->id_pelayanan);

            echo $page_data[$i]->id_pelayanan . '<br>';
        }



        echo "selesai";
    }
   
    public function update_coa_2($tgl)
    {

        $page_data = $this->db->query("SELECT b.id_pelayanan, date(b.tgl_masuk) tgl_masuk, date(b.tgl_keluar) tgl_keluar
        from v_kunjungan b
        where date(b.tgl_keluar) like '$tgl%' 
        and b.cara_bayar like '%BPJS%'
        and b.status_rawat='selesai' and b.id_pelayanan not in (select distinct(id_pelayanan) from akun_tindakan)

        group by b.id_pelayanan  
        ORDER BY `tgl_masuk` asc
        ")->result();

        for ($i = 0; $i < count($page_data); $i++) {
            // updateTglPulang_pendapatan($page_data[$i]->id_pelayanan);
            jurnal($page_data[$i]->id_pelayanan, 'web');

            // jurnal_ijd($page_data[$i]->id_pelayanan);

            echo $page_data[$i]->id_pelayanan . '<br>';
        }

        // updateTglPulang_pendapatan('pl_139660');

        echo "selesai";
    }
   


    public function jurnal_testing()
    {

        $no_jurnal = '0955/GL-306/1123';

        $db = $this->db->query("SELECT j.*,ifnull(p.cara_bayar,42) cara_bayar,SUBSTRING_INDEX(j.deskripsi,'Deposite ',-1) nama , ifnull(c.kode_pelanggan,'AR4001') id_vendor
        FROM jurnal_testing j 
        left join pelayanan p on j.id_jurnal = p.id_pelayanan  
        left join cara_bayar c on c.id_cara_bayar = p.cara_bayar 
        ")->result();

        foreach ($db as $row) {

            if ($row->id_vendor != 'AR4001') {
                $desk = 'DEPOSITE SELISIH ' . $row->nama;
            } else {
                $desk = $row->deskripsi;
            }
            $data = [
                'id_jurnal' => $row->id_jurnal,
                'jk' => '15',
                'rekening' => $row->rekening,
                'deskripsi' => $desk,
                'no_jurnal' => $no_jurnal,
                'kredit' => 0,
                'debet' => $row->kredit,
                'lap' => '01',
                'jb' => '',
                'cj' => '101',
                'pk' => $row->pk,
                'tgl' => date('Y-m-d H:i:s'),
                'des_rek' => $desk,
                'staff' => 'keuangan',
                'id_fk' => 'DEBIT',
                'id_vendor' => $row->id_vendor,

            ];
        }

        $this->M_Kasir->insert_tindakan($data, 'detail_jurnal_rupa');
    }

    public function update_reduksi()
    {
        $staff = $this->session->userdata('data_auth');
        $id_staff = $staff->id_staff;
        $data_diskon = $this->db->query("SELECT p.*
        FROM detail_kasir_diskon p
        where id_pelayanan not in (select id_pelayanan from akun_reduksi)")->result();

        foreach ($data_diskon as $rows) {

            $id_pelayanan = $rows->id_pelayanan;
            $this->M_Kasir->delete_tindakan(['id_pelayanan' => $id_pelayanan, 'status' => 0], 'akun_reduksi');
            $check = $this->db->get_where('akun_reduksi', ['id_pelayanan' => $id_pelayanan, 'status' => 1])->result();

            if (count($check) == 0) { //jika belum jurnal

                $kunjungan = $this->db->query("SELECT p.*
                FROM detail_kasir_diskon p
                where p.id_pelayanan = '$id_pelayanan'")->result();
                $db_pel = $this->db->query("SELECT cara_bayar FROM pelayanan where id_pelayanan ='$id_pelayanan'")->row();

                foreach ($kunjungan as $row) {
                    $jenis = explode('_', $row->id_history);

                    if ($jenis[0] == 'ranap') {

                        $ruangan = $this->db->query("SELECT h.id_kamar,r.kode_coa FROM history_pelayanan_ranap h, ruangan r
                        where h.id_kamar = r.id_ruangan and h.id_history ='$row->id_history'")->row();
                        $poli = $ruangan->id_kamar;


                        if ($row->diskon_tindakan != 0) {
                            $coa = '722.' . $ruangan->kode_coa . '.131';
                            $jenis_akun = 'Reduksi Pendapatan Tindakan Rawat Inap';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_tindakan,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        } else if ($row->diskon_konsul != 0) {
                            $coa = '722.' . $ruangan->kode_coa . '.151';
                            $jenis_akun = 'Reduksi Pendapatan Konsultasi Rawat Inap';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_konsul,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        } else if ($row->diskon_visite != 0) {
                            $coa = '722.' . $ruangan->kode_coa . '.120';
                            $jenis_akun = 'Reduksi Pendapatan Visite Rawat Inap';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_visite,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        } else if ($row->diskon_kamar != 0) {
                            $coa = '722.' . $ruangan->kode_coa . '.210';
                            $jenis_akun = 'Reduksi Pendapatan Sewa Kamar Perawatan Rawat Inap';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_kamar,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        } else if ($row->diskon_labor != 0) {
                            $coa = '722.' . $ruangan->kode_coa . '.811';
                            $jenis_akun = 'Reduksi Pendapatan Laboratorium Rawat Inap';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_labor,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        } else if ($row->diskon_radio != 0) {
                            $coa = '722.' . $ruangan->kode_coa . '.721';
                            $jenis_akun = 'Reduksi Pendapatan Radiodiagnostik Rawat Inap';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_radio,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        }
                    } else if ($jenis[0] == 'ugd') {

                        $poli = 'IGD';

                        if ($row->diskon_tindakan != 0) {
                            $coa = '721.14.130';
                            $jenis_akun = 'Reduksi Pendapatan Tindakan Rawat Jalan';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_tindakan,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        } else if ($row->diskon_konsul != 0) {
                            $coa = '721.14.150';
                            $jenis_akun = 'Reduksi Pendapatan Konsultasi Rawat Jalan';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_konsul,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        } else if ($row->diskon_labor != 0) {
                            $coa = '721.14.810';
                            $jenis_akun = 'Reduksi Pendapatan Laboratorium Rawat Jalan';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_labor,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        } else if ($row->diskon_radio != 0) {
                            $coa = '721.14.720';
                            $jenis_akun = 'Reduksi Pendapatan Radiodiagnostik Rawat Jalan';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_radio,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        }
                    } else {
                        $ruangan = $this->db->query("SELECT h.nama_poli,h.jenis_pelayanan,r.kode_coa FROM history_pelayanan h, list_poli r
                        where h.nama_poli = r.id_list_poli and h.id_history ='$row->id_history'")->row();

                        if ($ruangan->nama_poli == '146582') {
                            $poli = $ruangan->nama_poli;
                            $jenis_akun = 'Reduksi Pendapatan Penunjang Laboratorium';
                            $coa = '723.02.810';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_labor,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        } else if ($ruangan->nama_poli == '15487956') {
                            $poli = $ruangan->nama_poli;
                            $jenis_akun = 'Reduksi Pendapatan Penunjang Radiologi';
                            $coa = '723.11.720';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_radio,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        } else {
                            if ($ruangan->jenis_pelayanan == 'POLI PRIORITAS') {
                                $lap = lap . 'P';
                            } else {
                                $lap = lap;
                            }

                            $poli = $ruangan->nama_poli;
                            if ($row->diskon_tindakan != 0) {
                                $coa = '721.' . $ruangan->kode_coa . '.130';
                                $jenis_akun = 'Reduksi Pendapatan Tindakan Rawat Jalan';

                                $akun_apelkes = [
                                    'id_staff' => $id_staff,
                                    'id_pelayanan' => $id_pelayanan,
                                    'id_poli' => $poli,
                                    'lap' => $lap,
                                    'cara_bayar' => $db_pel->cara_bayar,
                                    'total_akun' => $row->diskon_tindakan,
                                    'jenis_akun' => $jenis_akun,
                                    'kode_akun' => $coa
                                ];

                                $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                            } else if ($row->diskon_konsul != 0) {
                                $coa = '721.' . $ruangan->kode_coa . '.150';
                                $jenis_akun = 'Reduksi Pendapatan Konsultasi Rawat Jalan';

                                $akun_apelkes = [
                                    'id_staff' => $id_staff,
                                    'id_pelayanan' => $id_pelayanan,
                                    'id_poli' => $poli,
                                    'lap' => $lap,
                                    'cara_bayar' => $db_pel->cara_bayar,
                                    'total_akun' => $row->diskon_konsul,
                                    'jenis_akun' => $jenis_akun,
                                    'kode_akun' => $coa
                                ];

                                $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                            } else if ($row->diskon_labor != 0) {
                                $coa = '721.' . $ruangan->kode_coa . '.810';
                                $jenis_akun = 'Reduksi Pendapatan Laboratorium Rawat Jalan';

                                $akun_apelkes = [
                                    'id_staff' => $id_staff,
                                    'id_pelayanan' => $id_pelayanan,
                                    'id_poli' => $poli,
                                    'lap' => $lap,
                                    'cara_bayar' => $db_pel->cara_bayar,
                                    'total_akun' => $row->diskon_labor,
                                    'jenis_akun' => $jenis_akun,
                                    'kode_akun' => $coa
                                ];

                                $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                            } else if ($row->diskon_radio != 0) {
                                $coa = '721.' . $ruangan->kode_coa . '.720';
                                $jenis_akun = 'Reduksi Pendapatan Radiodiagnostik Rawat Jalan';

                                $akun_apelkes = [
                                    'id_staff' => $id_staff,
                                    'id_pelayanan' => $id_pelayanan,
                                    'id_poli' => $poli,
                                    'lap' => $lap,
                                    'cara_bayar' => $db_pel->cara_bayar,
                                    'total_akun' => $row->diskon_radio,
                                    'jenis_akun' => $jenis_akun,
                                    'kode_akun' => $coa
                                ];

                                $this->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                            }
                        }
                    }
                }
            }
        }
    }

    public function print_bill()
    {
        $db = $this->db->query("SELECT a.id_pelayanan, h.id_history 
        FROM akun_tindakan a, history_pelayanan h 
        WHERE a.id_pelayanan = h.id_pelayanan and a.no_jurnal = '0425/GL-304/1223' and a.kode_akun ='701.15.130'
        group by a.id_pelayanan
        -- limit 1
        ")->result();
        // print_r($db);

        foreach ($db as $row) {
            $id_pelayanan = $row->id_pelayanan;
            $id_history = $row->id_history;
            $pendapatan = get_list_pendapatan($id_pelayanan);
            $pasien_pulang = $this->M_Kasir->getDataPasienPulangPoli($id_pelayanan, $id_history);

            $data = $pendapatan;
            $data['pasien'] = $pasien_pulang;
            $data['tgl_keluar_rajal'] = $pasien_pulang['tgl_keluar'];
            $data['action'] = 'cetak_ulang';
            $data['inPel'] = $id_pelayanan;
            $data['inHis'] = $id_history;
    

            $kasir = $this->M_Kasir->getDetailKasir($id_pelayanan);
            $data['selisih'] = isset($kasir->selisih) ? $kasir->selisih : 0;
            $data['dp'] = isset($kasir->dp) ? $kasir->dp : 0;
            $data['diskon'] = isset($kasir->diskon) ? $kasir->diskon : 0;
            $data['note'] = isset($kasir->note) ? $kasir->note : '';

            $this->load->view('print/cetak_pembayaran_poli', $data);
        }
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
