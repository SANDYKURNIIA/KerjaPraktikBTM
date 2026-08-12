<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Trial_balance extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Laporan_Jurnal');
    }
    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Trial_balance';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function export($mulai, $akhir)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $hijau = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => '00FF00' // Warna kuning
                ]
            ]
        ];
        $jingga = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'FFCC00' // Warna kuning
                ]
            ]
        ];
        $biru = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => '99CCFF' // Warna kuning
                ]
            ]
        ];
        $merah = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'FF0000' // Warna kuning
                ]
            ]
        ];


        $sheet->setCellValue('A1', "Index");
        $sheet->mergeCells('A1:B4');
        $sheet->setCellValue('C1', "KETERANGAN");
        $sheet->mergeCells('C1:D4');
        $sheet->setCellValue('E1', "Kode Akun");
        $sheet->setCellValue('F1', "Saldo Awal");
        $sheet->setCellValue('G1', "Debit");
        $sheet->setCellValue('H1', "Kredit");
        $sheet->setCellValue('I1', "Saldo Akhir");
        $sheet->getStyle('A1:I1')->getFont()->setBold(true);
        $sheet->mergeCells('E1:E4');
        $sheet->mergeCells('F1:F4');
        $sheet->mergeCells('G1:G4');
        $sheet->mergeCells('H1:H4');
        $sheet->mergeCells('I1:I4');

        $sheet->setCellValue('A5', "A");
        $sheet->getStyle('A5')->getFont()->setBold(true);
        $sheet->setCellValue('C5', "ASET LANCAR");
        $sheet->getStyle('C5')->getFont()->setBold(true);
        $sheet->setCellValue('A6', "A1");
        $sheet->getStyle('A6')->getFont()->setBold(true);
        $sheet->setCellValue('C6', "KAS&SETARA KAS");
        $sheet->getStyle('C6')->getFont()->setBold(true);
        $sheet->setCellValue('B7', "A1.1");
        $sheet->getStyle('B7')->getFont()->setBold(true);
        $sheet->setCellValue('C7', "KAS");
        $sheet->getStyle('C7')->getFont()->setBold(true);
        $sheet->setCellValue('D8', "Kas Rupiah");
        $sheet->setCellValue('E8', "101.01.100");
        $sheet->setCellValue('D9', "kas Kecil - Adm Medis");
        $sheet->setCellValue('E9', "101.02.101");
        $sheet->setCellValue('D10', "kas Kecil - Teknik/Umum");
        $sheet->setCellValue('E10', "101.02.102");
        $sheet->setCellValue('D11', "kas Kecil - Logistik");
        $sheet->setCellValue('E11', "101.02.103");
        $sheet->setCellValue('D12', "kas Kecil - SDM");
        $sheet->setCellValue('E12', "101.02.104");
        $sheet->setCellValue('D13', "kas Kecil - Sesuai Lokasi");
        $sheet->setCellValue('E13', "101.02.1xx");
        $sheet->setCellValue('D14', "TOTAL KAS ");
        $sheet->getStyle('D14:I14')->applyFromArray($hijau);

        $sheet->setCellValue('B16', "A1.2");
        $sheet->getStyle('B16')->getFont()->setBold(true);
        $sheet->setCellValue('C16', "BANK");
        $sheet->getStyle('C16')->getFont()->setBold(true);
        $sheet->setCellValue('D17', "Bank Mandiri - Rupiah - korporat(OPS)");
        $sheet->setCellValue('E17', "102.01.101");
        $sheet->setCellValue('D18', "Bank Mandiri - Rupiah - korporat(PBM Peduli)");
        $sheet->setCellValue('E18', "102.01.102");
        $sheet->setCellValue('D19', "Bank Mandiri - Rupiah - RSPP(Sweeping)");
        $sheet->setCellValue('E19', "102.01.103");
        $sheet->setCellValue('D20', "Bank Mandiri - Rupiah - RSPP(Sweeping)");
        $sheet->setCellValue('E20', "102.01.104");
        $sheet->setCellValue('D21', "Bank Mandiri - Rupiah - RSPP(Dropping)");
        $sheet->setCellValue('E21', "102.01.105");
        $sheet->setCellValue('D22', "Bank Mandiri - Rupiah - RSPJ(Sweeping)");
        $sheet->setCellValue('E22', "102.01.106");
        $sheet->setCellValue('D23', "Bank Mandiri - Rupiah - RSPJ(Sweeping)");
        $sheet->setCellValue('E23', "102.01.107");
        $sheet->setCellValue('D24', "Bank Mandiri - Rupiah - RSPJ(Dropping)");
        $sheet->setCellValue('E24', "102.01.108");
        $sheet->setCellValue('D25', "Bank Mandiri - Rupiah - RSPB(Sweeping)");
        $sheet->setCellValue('E25', "102.01.109");
        $sheet->setCellValue('D26', "Bank Mandiri - Rupiah - RSPB(Dropping)");
        $sheet->setCellValue('E26', "102.01.110");
        $sheet->setCellValue('D27', "Bank Mandiri - Rupiah - RSPC");
        $sheet->setCellValue('E27', "102.01.111");
        $sheet->setCellValue('D28', "Bank Mandiri - Rupiah - RSPC");
        $sheet->setCellValue('E28', "102.01.112");
        $sheet->setCellValue('D29', "Bank Mandiri - Rupiah - RSPPBM");
        $sheet->setCellValue('E29', "102.01.113");
        $sheet->setCellValue('D30', "Bank Mandiri - Rupiah - RSPPBM");
        $sheet->setCellValue('E30', "102.01.114");
        $sheet->setCellValue('D31', "Bank Mandiri - Rupiah - RSPTr");
        $sheet->setCellValue('E31', "102.01.115");
        $sheet->setCellValue('D32', "Bank Mandiri - Rupiah - RSPTr");
        $sheet->setCellValue('E32', "102.01.116");
        $sheet->setCellValue('D33', "Bank Mandiri - Rupiah - RSPT");
        $sheet->setCellValue('E33', "102.01.117");
        $sheet->setCellValue('D34', "Bank Mandiri - Rupiah - RSPT");
        $sheet->setCellValue('E34', "102.01.118");
        $sheet->setCellValue('D35', "Bank Mandiri - Rupiah - RSPS");
        $sheet->setCellValue('E35', "102.01.119");
        $sheet->setCellValue('D36', "Bank Mandiri - Rupiah - RSPS");
        $sheet->setCellValue('E36', "102.01.120");
        $sheet->setCellValue('D37', "Bank Mandiri - Rupiah - RSPPBR");
        $sheet->setCellValue('E37', "102.01.121");
        $sheet->setCellValue('D38', "Bank Mandiri - Rupiah - RSPPBR");
        $sheet->setCellValue('E38', "102.01.122");
        $sheet->setCellValue('D39', "Bank Mandiri - Rupiah - RSPPLJ");
        $sheet->setCellValue('E39', "102.01.123");
        $sheet->setCellValue('D40', "Bank Mandiri - Rupiah - RSPPLJ");
        $sheet->setCellValue('E40', "102.01.124");
        $sheet->setCellValue('D41', "Bank Mandiri - Rupiah - RSP.Balongan");
        $sheet->setCellValue('E41', "102.01.125");
        $sheet->setCellValue('D42', "Bank Mandiri - Rupiah - RSP.Balongan");
        $sheet->setCellValue('E42', "102.01.126");
        $sheet->setCellValue('D43', "Bank Mandiri - Rupiah - RSP.Cilacap");
        $sheet->setCellValue('E43', "102.01.127");
        $sheet->setCellValue('D44', "Bank Mandiri - Rupiah - RSP.Cilacap");
        $sheet->setCellValue('E44', "102.01.128");
        $sheet->setCellValue('D45', "Bank Mandiri - Rupiah - RSP.Dumai");
        $sheet->setCellValue('E45', "102.01.129");
        $sheet->setCellValue('D46', "Bank Mandiri - Rupiah - RSP.Dumai");
        $sheet->setCellValue('E46', "102.01.130");
        $sheet->setCellValue('D47', "Bank Mandiri - Rupiah - RSP.Rantau");
        $sheet->setCellValue('E47', "102.01.131");
        $sheet->setCellValue('D48', "Bank Mandiri - Rupiah - RSP.Rantau");
        $sheet->setCellValue('E48', "102.01.132");
        $sheet->setCellValue('D49', "Bank Mandiri - Rupiah - Korporat");
        $sheet->setCellValue('E49', "102.01.133");
        $sheet->setCellValue('D50', "Bank Mandiri - Rupiah - .....(ANAK PERUSAHAAN/OPERASIONAL)");
        $sheet->setCellValue('E50', "102.01.134");
        $sheet->setCellValue('D51', "Bank Mandiri - Rupiah - .....(ANAK PERUSAHAAN/SWEEPING)");
        $sheet->setCellValue('E51', "102.01.135");
        $sheet->setCellValue('D52', "Bank Mandiri - Rupiah - KLINIK (Sweeping)");
        $sheet->setCellValue('E52', "102.01.136");
        $sheet->setCellValue('D53', "Bank Mandiri - Rupiah - KLINIK (Dropping)");
        $sheet->setCellValue('E53', "102.01.137");
        $sheet->setCellValue('D54', "Bank Mandiri - Rupiah - Korporat");
        $sheet->setCellValue('E54', "102.01.138");
        $sheet->setCellValue('D55', "Bank Mandiri - Rupiah - RSP Royal Biringkanaya (Sweeping)");
        $sheet->setCellValue('E55', "102.01.139");
        $sheet->setCellValue('D55', "Bank Mandiri - Rupiah - RSP Royal Biringkanaya (Sweeping)");
        $sheet->setCellValue('E55', "102.01.139");
        $sheet->setCellValue('D57', "Bank BNI - Korporat(Melawai)");
        $sheet->setCellValue('E57', "102.02.101");
        $sheet->setCellValue('D58', "Bank BNI - Korporat(Mayestik)");
        $sheet->setCellValue('E58', "102.02.102");
        $sheet->setCellValue('D59', "Bank BNI - RSPP");
        $sheet->setCellValue('E59', "102.02.103");
        $sheet->setCellValue('D60', "Bank BNI - RSPB");
        $sheet->setCellValue('E60', "102.02.104");
        $sheet->setCellValue('D61', "Bank BNI - RSPTr");
        $sheet->setCellValue('E61', "102.02.105");
        $sheet->setCellValue('D62', "Bank BNI - Rupiah - .....(ANAK PERUSAHAAN/OPERASIONAL)");
        $sheet->setCellValue('E62', "102.02.106");
        $sheet->setCellValue('D63', "Bank BNI - Rupiah - .....(ANAK PERUSAHAAN/SWEEPING)");
        $sheet->setCellValue('E63', "102.02.107");
        $sheet->setCellValue('D64', "Bank BNI - Rupiah - RSPJ");
        $sheet->setCellValue('E64', "102.02.108");
        $sheet->setCellValue('D65', "Bank BNI - Rupiah - KLINIK");
        $sheet->setCellValue('E65', "1102.02.109");
        $sheet->setCellValue('D66', "Bank BNI - Rupiah - RSP Royal Biringkanaya (Sweeping)");
        $sheet->setCellValue('E66', "102.02.110");
        $sheet->setCellValue('D67', "Bank BNI - Rupiah - RSP Royal Biringkanaya (Dropping)");
        $sheet->setCellValue('E67', "102.02.111");
        $sheet->setCellValue('D69', "Bank BNI - Dollar - Korporat");
        $sheet->setCellValue('E69', "102.02.201");
        $sheet->setCellValue('D70', "Bank BNI - Dollar ....(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E70', "102.02.202");
        $sheet->setCellValue('D72', "Bank BRI - Korporat");
        $sheet->setCellValue('E72', "102.03.101");
        $sheet->setCellValue('D73', "Bank BRI - RSPP");
        $sheet->setCellValue('E73', "102.03.102");
        $sheet->setCellValue('D74', "Bank BRI - RSPP");
        $sheet->setCellValue('E74', "102.03.103");
        $sheet->setCellValue('D75', "Bank BRI - RSPJ");
        $sheet->setCellValue('E75', "102.03.104");
        $sheet->setCellValue('D76', "Bank BRI - RSPC");
        $sheet->setCellValue('E76', "102.03.105");
        $sheet->setCellValue('D77', "Bank BRI - RSPT");
        $sheet->setCellValue('E77', "102.03.106");
        $sheet->setCellValue('D78', "Bank BRI - RSPPBR");
        $sheet->setCellValue('E78', "102.03.107");
        $sheet->setCellValue('D79', "Bank BRI -RSPB");
        $sheet->setCellValue('E79', "102.03.108");
        $sheet->setCellValue('D80', "Bank BRI AGRO - KORPORAT");
        $sheet->setCellValue('E80', "102.03.109");
        $sheet->setCellValue('D81', "Bank BRI - RSPPBM");
        $sheet->setCellValue('E81', "102.03.110");
        $sheet->setCellValue('D82', "Bank BRI - RSPTr");
        $sheet->setCellValue('E82', "102.03.111");
        $sheet->setCellValue('D83', "Bank BRI - RSPS");
        $sheet->setCellValue('E83', "102.03.112");
        $sheet->setCellValue('D84', "Bank BRI - RSP.Balongan");
        $sheet->setCellValue('E84', "102.03.113");
        $sheet->setCellValue('D85', "Bank BRI - RSP.Cilacap");
        $sheet->setCellValue('E85', "102.03.114");
        $sheet->setCellValue('D86', "Bank BRI - RSP.Dumai");
        $sheet->setCellValue('E86', "102.03.115");
        $sheet->setCellValue('D87', "Bank BRI - RSP.rantau");
        $sheet->setCellValue('E87', "102.03.116");
        $sheet->setCellValue('D88', "Bank BRI - Korporat");
        $sheet->setCellValue('E88', "102.03.117");
        $sheet->setCellValue('D89', "Bank BRI - Rupiah - ...(ANAK PERUSAHAAN/OPERASIONAL)");
        $sheet->setCellValue('E89', "102.03.118");
        $sheet->setCellValue('D90', "Bank BRI - Rupiah - ...(ANAK PERUSAHAAN/SWEEPING)");
        $sheet->setCellValue('E90', "102.03.119");
        $sheet->setCellValue('D91', "Bank BRI - KLINIK");
        $sheet->setCellValue('E91', "102.03.120");
        $sheet->setCellValue('D92', "Bank BRI - RSP Royal Biringkanaya");
        $sheet->setCellValue('E92', "102.03.121");
        $sheet->setCellValue('D93', "Bank BRI - Korporat(Donasi");
        $sheet->setCellValue('E93', "102.03.122");
        $sheet->setCellValue('D95', "Bank Syariah Mandiri - Korporat");
        $sheet->setCellValue('E95', "102.04.101");
        $sheet->setCellValue('D96', " Bank Syariah Mandiri - ….(ANAK PERUSAHAAN/OPERASIONAL)");
        $sheet->setCellValue('E96', "102.04.102");
        $sheet->setCellValue('D97', " Bank Syariah Mandiri - ….(ANAK PERUSAHAAN/SWEEPING)");
        $sheet->setCellValue('E97', "102.04.103");
        $sheet->setCellValue('D98', " Bank Syariah Mandiri - Rantau (Sweeping)");
        $sheet->setCellValue('E98', "102.04.104");
        $sheet->setCellValue('D99', " Bank Syariah Mandiri - Rantau (Dropping)");
        $sheet->setCellValue('E99', "102.04.105");
        $sheet->setCellValue('D100', " Bank Syariah Mandiri - ….");
        $sheet->setCellValue('E100', "102.04.107");
        $sheet->setCellValue('D102', "Bank BNI Syariah - Korporat");
        $sheet->setCellValue('E102', "102.05.101");
        $sheet->setCellValue('D103', " Bank BNI Syariah - ….(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E103', "102.05.102");
        $sheet->setCellValue('D104', " Bank BNI Syariah - ….");
        $sheet->setCellValue('D106', "Bank BRI Syariah - Korporat");
        $sheet->setCellValue('E106', "102.06.100");
        $sheet->setCellValue('D107', " Bank BRI Syariah - ….(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E107', "102.06.101");
        $sheet->setCellValue('D108', " Bank BRI Syariah - ….");
        $sheet->setCellValue('D110', "Bank Syariah Indonesia - Korporat");
        $sheet->setCellValue('D111', "Bank Syariah Indonesia - ….");
        $sheet->setCellValue('D112', "Bank Syariah Indonesia - ….");
        $sheet->setCellValue('D113', "Bank Syariah Indonesia - ….");
        $sheet->setCellValue('D114', "Bank Syariah Indonesia - ….");
        $sheet->setCellValue('D115', "Bank Syariah Indonesia - ….");
        $sheet->setCellValue('D117', "Bank BCA - Korporat");
        $sheet->setCellValue('E117', "102.11.101");
        $sheet->setCellValue('D118', "Bank BCA - RSPP");
        $sheet->setCellValue('E118', "102.11.102");
        $sheet->setCellValue('D119', "Bank BCA- RSPB");
        $sheet->setCellValue('E119', "102.11.103");
        $sheet->setCellValue('D120', "Bank BCA - RSPTr");
        $sheet->setCellValue('E120', "102.11.104");
        $sheet->setCellValue('D121', "Bank BCA - ….(ANAK PERUSAHAAN )");
        $sheet->setCellValue('E121', "102.11.105");
        $sheet->setCellValue('D123', "Bank Bukopin - Korporat");
        $sheet->setCellValue('E123', "102.19.101");
        $sheet->setCellValue('D124', "Bank Kaltim-RSPB");
        $sheet->setCellValue('E124', "102.21.101");
        $sheet->setCellValue('D125', "Bank DKI - RSPP");
        $sheet->setCellValue('E125', "102.22.101");
        $sheet->setCellValue('D126', "Bank DKI - RSPJ");
        $sheet->setCellValue('E126', "102.22.102");
        $sheet->setCellValue('D127', "Bank DKI - ….(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E127', "102.22.103");
        $sheet->setCellValue('D128', "Bank Panin - ….(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E128', "102.23.101");
        $sheet->setCellValue('D129', "Bank Permata - ….(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E129', "102.24.101");
        $sheet->setCellValue('D130', "Bank BJB - ….(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E130', "102.25.101");
        $sheet->setCellValue('D131', "Bank Muamalat - ….(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E131', "102.26.101");
        $sheet->setCellValue('D132', "Bank Jatim - ….(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E132', "102.27.101");
        $sheet->setCellValue('D133', "Bank BTN - ….(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E133', "102.28.101");
        $sheet->setCellValue('D134', "Bank CIMB NIAGA - ….(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E134', "102.29.101");
        $sheet->setCellValue('D135', "Bank Lainnya - ….(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E135', "102.30.101");
        $sheet->setCellValue('D137', "Bank Mandiri - Kartu Kredit");
        $sheet->setCellValue('E137', "102.01.300");
        $sheet->setCellValue('D138', "Bank Mandiri - Kartu Debit");
        $sheet->setCellValue('E138', "102.01.400");
        $sheet->setCellValue('D139', "Bank BNI - Kartu Kredit");
        $sheet->setCellValue('E139', "102.02.300");
        $sheet->setCellValue('D140', "Bank BNI - Kartu Debit");
        $sheet->setCellValue('E140', "102.02.400");
        $sheet->setCellValue('D141', "Bank BRI - Kartu Kredit");
        $sheet->setCellValue('E141', "102.03.300");
        $sheet->setCellValue('D142', "Bank BRI - Kartu Debit");
        $sheet->setCellValue('E142', "102.03.400");
        $sheet->setCellValue('D143', "Bank BCA - Kartu Kredit");
        $sheet->setCellValue('E143', "102.11.300");
        $sheet->setCellValue('D144', "Bank BCA - Kartu Debit");
        $sheet->setCellValue('E144', "102.11.400");
        $sheet->setCellValue('D145', "Bank Bukopin - Kartu Kredit");
        $sheet->setCellValue('E145', "102.19.300");
        $sheet->setCellValue('D146', "Bank Bukopin - Kartu Debit");
        $sheet->setCellValue('E146', "102.19.400");
        $sheet->setCellValue('D147', "Bank Kaltim - Kartu Kredit");
        $sheet->setCellValue('E147', "102.21.300");
        $sheet->setCellValue('D148', "Bank Kaltim - Kartu Debit");
        $sheet->setCellValue('E148', "102.21.400");
        $sheet->setCellValue('D149', "Bank DKI - Kartu Kredit");
        $sheet->setCellValue('E149', "102.21.300");
        $sheet->setCellValue('D150', "Bank DKI - Kartu Debit");
        $sheet->setCellValue('E150', "102.21.400");
        $sheet->setCellValue('D152', "Bank BRI Cash Card - Korporat");
        $sheet->setCellValue('E152', "102.03.501");
        $sheet->setCellValue('D153', "Bank BRI Cash Card - Korporat");
        $sheet->setCellValue('E153', "102.03.502");
        $sheet->setCellValue('D154', "Bank BRI Cash Card - Korporat");
        $sheet->setCellValue('E154', "102.03.503");
        $sheet->setCellValue('D156', "Bank BRI Fleet Card - Korporat");
        $sheet->setCellValue('E156', "102.11.600");
        $sheet->setCellValue('D157', "Bank Mandiri Fleet Card - Korporat");
        $sheet->setCellValue('E157', "102.01.600");
        $sheet->setCellValue('D158', "TOTAL BANK");
        $sheet->getStyle('D158:I158')->applyFromArray($hijau);

        $sheet->setCellValue('B160', "A1.3");
        $sheet->getStyle('B160')->getFont()->setBold(true);
        $sheet->setCellValue('C160', "DEPOSITO");
        $sheet->getStyle('C160')->getFont()->setBold(true);
        $sheet->setCellValue('D161', "Deposito Mandiri - Rupiah");
        $sheet->setCellValue('E161', "103.01.100");
        $sheet->setCellValue('D162', "Deposito Mandiri - Dollar");
        $sheet->setCellValue('E162', "103.01.200");
        $sheet->setCellValue('D163', "Deposito BNI");
        $sheet->setCellValue('E163', "103.02.100");
        $sheet->setCellValue('D164', "Deposito BRI");
        $sheet->setCellValue('E164', "103.03.100");
        $sheet->setCellValue('D165', "Deposito Mandiri Syariah");
        $sheet->setCellValue('E165', "103.04.100");
        $sheet->setCellValue('D166', "Deposito BCA");
        $sheet->setCellValue('E166', "103.11.100");
        $sheet->setCellValue('D167', "Deposito Bank Jabar");
        $sheet->setCellValue('E167', "103.20.100");
        $sheet->setCellValue('D168', "Deposito Bank Bukopin");
        $sheet->setCellValue('E168', "103.21.100");
        $sheet->setCellValue('D169', "Deposito Bank BTPN");
        $sheet->setCellValue('E169', "103.22.100");
        $sheet->setCellValue('D170', "Deposito Bank BTN");
        $sheet->setCellValue('E170', "103.24.100");
        $sheet->setCellValue('D171', "Deposito Bank Jateng");
        $sheet->setCellValue('E171', "103.27.100");
        $sheet->setCellValue('D172', "Deposito Bank Permata");
        $sheet->setCellValue('E172', "103.28.100");
        $sheet->setCellValue('D173', "Deposito BJB Syariah");
        $sheet->setCellValue('E173', "103.30.100");
        $sheet->setCellValue('D174', "Deposito BRI Agroniaga ");
        $sheet->setCellValue('E174', "103.31.100");
        $sheet->setCellValue('D175', "Deposito BNI Syariah");
        $sheet->setCellValue('E175', "103.32.100");
        $sheet->setCellValue('D176', "Deposito BRI Syariah");
        $sheet->setCellValue('E176', "103.33.100");
        $sheet->setCellValue('D177', "Deposito Bank Muamalat - Anak Perusahaan");
        $sheet->setCellValue('E177', "103.19.100");
        $sheet->setCellValue('D178', "Deposito Syariah Indonesia (BSI)");
        $sheet->setCellValue('E178', "103.34.100");
        $sheet->setCellValue('D179', "Deposito Bank Jatim");
        $sheet->setCellValue('E179', "103.35.100");
        $sheet->setCellValue('D180', "Deposito Bank Mandiri Taspen");
        $sheet->setCellValue('E180', "103.36.100");
        $sheet->setCellValue('D181', "Deposito Bank DKI");
        $sheet->setCellValue('E181', "103.37.100");
        $sheet->setCellValue('D182', "Deposito Bank Lain-lain");
        $sheet->setCellValue('D183', "TOTAL DEPOSITO");
        $sheet->getStyle('D183:I183')->applyFromArray($hijau);

        $sheet->setCellValue('B185', "A1.4");
        $sheet->getStyle('B185')->getFont()->setBold(true);
        $sheet->setCellValue('C185', "MONEY IN TRANSIT");
        $sheet->getStyle('C185')->getFont()->setBold(true);
        $sheet->setCellValue('D186', "Money In Transit");
        $sheet->setCellValue('E186', "114.01.000");
        $sheet->setCellValue('D187', "Money In Transit - Pasien Cash Rawat Jalan");
        $sheet->setCellValue('E187', "114.02.000");
        $sheet->setCellValue('D188', "Money In Transit - Pasien Cash Rawat Inap");
        $sheet->setCellValue('E188', "114.03.000");
        $sheet->setCellValue('D189', "Total Money In Transit");
        $sheet->getStyle('D189:I189')->applyFromArray($hijau);

        $sheet->setCellValue('C190', "TOTAL KAS & SETARA KAS");
        $sheet->getStyle('C190:I190')->applyFromArray($jingga);

        $sheet->setCellValue('B192', "A1.5");
        $sheet->getStyle('B192')->getFont()->setBold(true);
        $sheet->setCellValue('C192', "PENYISIHAN PIUTANG KAS & SETARA KAS (PSAK 71)");
        $sheet->getStyle('C192')->getFont()->setBold(true);
        $sheet->setCellValue('D193', "Bank");
        $sheet->setCellValue('E193', "172.01.000");
        $sheet->setCellValue('D194', "Deposito");
        $sheet->setCellValue('E194', "173.01.000");
        $sheet->setCellValue('D195', "Total Penyisihan Piutang Kas & Setara Kas");
        $sheet->getStyle('D195:I195')->applyFromArray($hijau);

        $sheet->setCellValue('C197', "TOTAL KAS & SETARA KAS (NET)");
        $sheet->getStyle('C197:I197')->applyFromArray($jingga);

        $sheet->setCellValue('A199', "A2");
        $sheet->getStyle('A199')->getFont()->setBold(true);
        $sheet->setCellValue('C199', "KERTAS BERHARGA");
        $sheet->getStyle('C199')->getFont()->setBold(true);
        $sheet->setCellValue('D200', "Saham");
        $sheet->setCellValue('E200', "104.01.000");
        $sheet->setCellValue('D201', "Obligasi");
        $sheet->setCellValue('E201', "104.02.000");
        $sheet->setCellValue('D202', "Reksadana");
        $sheet->setCellValue('E202', "104.03.000");
        $sheet->setCellValue('D203', "Wesel Tagih");
        $sheet->setCellValue('E203', "104.04.000");
        $sheet->setCellValue('D204', "Deposito Berjangka > 3 Bulan");
        $sheet->setCellValue('E204', "104.05.000");
        $sheet->setCellValue('C205', "TOTAL KERTAS BERHARGA");
        $sheet->getStyle('C205:I205')->applyFromArray($jingga);

        $sheet->setCellValue('A207', "A3");
        $sheet->getStyle('A207')->getFont()->setBold(true);
        $sheet->setCellValue('C207', "PIUTANG USAHA");
        $sheet->getStyle('C207')->getFont()->setBold(true);
        $sheet->setCellValue('B208', "A3.1");
        $sheet->getStyle('B208')->getFont()->setBold(true);
        $sheet->setCellValue('C208', "PIUTANG USAHA (sebelum Penyisihan)");
        $sheet->getStyle('C208')->getFont()->setBold(true);
        $sheet->setCellValue('C209', "A3.1.1");
        $sheet->setCellValue('D209', "PIUTANG HUBUNGAN ISTIMEWA (ICT)");
        $sheet->getStyle('D209')->getFont()->setBold(true);
        $sheet->setCellValue('D210', "PERTAMINA (Persero) - Kantor Pusat ==> FFS");
        $sheet->setCellValue('E210', "105.01.100");
        $sheet->setCellValue('D211', "PERTAMINA (Persero) - Kantor Pusat ==> Kapitasi");
        $sheet->setCellValue('E211', "105.02.100");
        $sheet->setCellValue('D212', "PERTAMINA (Persero) - Unit Wilayah ==> FFS");
        $sheet->setCellValue('E212', "105.01.200");
        $sheet->setCellValue('D213', "PERTAMINA (Persero) - Unit Wilayah ==> Kapitasi");
        $sheet->setCellValue('E213', "105.02.200");
        $sheet->setCellValue('D214', "Anak Perusahaan PERTAMINA ==> FFS");
        $sheet->setCellValue('E214', "105.01.300");
        $sheet->setCellValue('D215', "Anak Perusahaan PERTAMINA ==> Kapitasi");
        $sheet->setCellValue('E215', "105.02.300");
        $sheet->setCellValue('D216', "TOTAL PIUTANG HUBUNGAN ISTIMEWA (ICT)");
        $sheet->getStyle('D216:I216')->applyFromArray($hijau);


        $sheet->getStyle('D216')->getFont()->setBold(true);
        $sheet->setCellValue('C217', "A3.1.2");
        $sheet->setCellValue('D217', "PIUTANG PIHAK YANG BERELASI");
        $sheet->getStyle('D217')->getFont()->setBold(true);
        $sheet->setCellValue('D218', "Piutang Asosiasi, Joint Venture dan Afiliasi ==> FFS");
        $sheet->setCellValue('E218', "105.01.400");
        $sheet->setCellValue('D219', "Piutang Asosiasi, Joint Venture dan Afiliasi ==> Kapitasi");
        $sheet->setCellValue('E219', "105.02.400");
        $sheet->setCellValue('D220', "Piutang Entitas yang Berelasi dengan BUMN ==> FFS");
        $sheet->setCellValue('E220', '105.01.700');
        $sheet->setCellValue('D221', "Piutang Entitas yang Berelasi dengan Pemerintah ==> FFS");
        $sheet->setCellValue('E221', "105.01.701");
        $sheet->setCellValue('D222', "Piutang Entitas yang Berelasi dengan Pemerintah ==> Kapitasi");
        $sheet->setCellValue('E222', "105.02.700");
        $sheet->setCellValue('D223', "Piutang Entitas yang Berelasi dengan BPJS ==> FFS");
        $sheet->setCellValue('E223', "105.01.900");
        $sheet->setCellValue('D224', "Piutang Entitas yang Berelasi dengan BPJS ==> Kapitasi");
        $sheet->setCellValue('E224', "105.02.900");
        $sheet->setCellValue('D225', "Piutang Entitas yang Berelasi Lainnya (Others) ==> FFS");
        $sheet->setCellValue('E225', "105.01.800");
        $sheet->setCellValue('D226', "Piutang Entitas yang Berelasi Lainnya (Others) ==> Kapitasi");
        $sheet->setCellValue('E226', "105.02.800");
        $sheet->setCellValue('D227', "TOTAL PIUTANG PIHAK YANG BERELASI");
        $sheet->getStyle('D227:I227')->applyFromArray($hijau);

        $sheet->setCellValue('C228', "A3.1.3");
        $sheet->setCellValue('D228', "PIUTANG PIHAK KETIGA");
        $sheet->getStyle('D228')->getFont()->setBold(true);
        $sheet->setCellValue('D229', "Piutang Pihak Ketiga ==> FFS");
        $sheet->setCellValue('E229', "105.01.500");
        $sheet->setCellValue('D230', "Piutang Pihak Ketiga ==> Kapitasi");
        $sheet->setCellValue('E230', "105.02.500");
        $sheet->setCellValue('D231', "Piutang Perorangan");
        $sheet->setCellValue('E231', "105.01.600");
        $sheet->setCellValue('D232', "TOTAL PIUTANG PIHAK KE III");
        $sheet->getStyle('D232:I232')->applyFromArray($hijau);

        $sheet->setCellValue('D233', "TOTAL PIUTANG USAHA (sebelum Penyisihan)");
        $sheet->getStyle('D233:I233')->applyFromArray($hijau);

        $sheet->setCellValue('B235', "A3.2");
        $sheet->getStyle('B235')->getFont()->setBold(true);
        $sheet->setCellValue('C235', "PENYISIHAN PIUTANG");
        $sheet->getStyle('C235')->getFont()->setBold(true);
        $sheet->setCellValue('D236', "PERTAMINA (Persero) - Kantor Pusat");
        $sheet->setCellValue('E236', "r");
        $sheet->setCellValue('D237', "PERTAMINA (Persero) - Unit Wilayah");
        $sheet->setCellValue('E237', "175.01.200");
        $sheet->setCellValue('D238', "Anak Perusahaan PERTAMINA");
        $sheet->setCellValue('E238', "175.01.300");
        $sheet->setCellValue('D239', "Piutang Asosiasi, Joint Venture dan Afiliasi");
        $sheet->setCellValue('E239', "175.01.400");
        $sheet->setCellValue('D240', "Piutang Entitas yang Berelasi dengan BUMN");
        $sheet->setCellValue('E240', "175.01.700");
        $sheet->setCellValue('D241', "Piutang Entitas yang Berelasi dengan Pemerintah");
        $sheet->setCellValue('E241', "175.01.701");
        $sheet->setCellValue('D242', "Piutang Entitas yang Berelasi dengan BPJS");
        $sheet->setCellValue('E242', "175.01.900");
        $sheet->setCellValue('D243', "Piutang Entitas yang Berelasi Lainnya (Others)");
        $sheet->setCellValue('E243', "175.01.800");
        $sheet->setCellValue('D244', "Piutang Pihak Ketiga");
        $sheet->setCellValue('E244', "175.01.500");
        $sheet->setCellValue('D245', "Piutang Perorangan");
        $sheet->setCellValue('E245', "175.01.600");
        $sheet->setCellValue('D246', "Total Penyisihan Piutang");
        $sheet->getStyle('D246:I246')->applyFromArray($hijau);

        $sheet->setCellValue('B248', "A3.3");
        $sheet->getStyle('B248')->getFont()->setBold(true);
        $sheet->setCellValue('C248', "PIUTANG UNBILL");
        $sheet->getStyle('C248')->getFont()->setBold(true);
        $sheet->setCellValue('C249', "A3.3.1");
        $sheet->setCellValue('D249', "PIUTANG UNBILL – HUBUNGAN ISTIMEWA (ICT)");
        $sheet->getStyle('D249')->getFont()->setBold(true);
        $sheet->setCellValue('D250', "PERTAMINA (Persero) - Kantor Pusat");
        $sheet->setCellValue('E250', "105.03.100");
        $sheet->setCellValue('D251', "PERTAMINA (Persero) - Unit Wilayah");
        $sheet->setCellValue('E251', "105.03.200");
        $sheet->setCellValue('D252', "Anak Perusahaan PERTAMINA");
        $sheet->setCellValue('E252', "105.03.300");
        $sheet->setCellValue('D253', "TOTAL PIUTANG UNBILL – HUBUNGAN ISTIMEWA (ICT)");
        $sheet->getStyle('D253:I253')->applyFromArray($hijau);

        $sheet->setCellValue('C254', "A3.3.2");
        $sheet->setCellValue('D254', "PIUTANG UNBILL – PIHAK YANG BERELASI");
        $sheet->getStyle('D254')->getFont()->setBold(true);
        $sheet->setCellValue('D255', "Piutang Asosiasi, Joint Venture dan Afiliasi");
        $sheet->setCellValue('E255', "105.03.400");
        $sheet->setCellValue('D256', "Piutang Entitas yang Berelasi dengan BUMN");
        $sheet->setCellValue('E256', "105.03.700");
        $sheet->setCellValue('D257', "Piutang Entitas yang Berelasi dengan Pemerintah");
        $sheet->setCellValue('E257', "105.03.701");
        $sheet->setCellValue('D258', "Piutang Entitas yang Berelasi dengan BPJS");
        $sheet->setCellValue('E258', "105.03.900");
        $sheet->setCellValue('D259', "Piutang Entitas yang Berelasi Others");
        $sheet->setCellValue('E259', "105.03.800");
        $sheet->setCellValue('C260', "A3.3.3");
        $sheet->setCellValue('D260', "TOTAL PIUTANG UNBILL – PIHAK YANG BERELASI");
        $sheet->getStyle('D260:I260')->applyFromArray($hijau);

        $sheet->setCellValue('D261', "PIUTANG UNBILL – PIHAK KETIGA");
        $sheet->getStyle('D261')->getFont()->setBold(true);
        $sheet->setCellValue('D262', "Piutang Pihak Ketiga");
        $sheet->setCellValue('E262', "105.03.500");
        $sheet->setCellValue('D263', "Piutang Perorangan");
        $sheet->setCellValue('E263', "105.03.600");
        $sheet->setCellValue('C264', "A3.3.4");
        $sheet->setCellValue('D264', "TOTAL PIUTANG UNBILL – PIHAK KE III");
        $sheet->getStyle('D264:I264')->applyFromArray($hijau);

        $sheet->setCellValue('D265', "TOTAL PIUTANG UNBILL");
        $sheet->getStyle('D265:I265')->applyFromArray($hijau);

        $sheet->setCellValue('C267', "TOTAL PIUTANG USAHA (NET)");
        $sheet->getStyle('C267:I267')->applyFromArray($jingga);

        $sheet->setCellValue('A269', "A4");
        $sheet->getStyle('A269')->getFont()->setBold(true);
        $sheet->setCellValue('C269', "PENDAPATAN YANG MASIH AKAN DITERIMA");
        $sheet->getStyle('C269')->getFont()->setBold(true);
        $sheet->setCellValue('D270', "Pendapatan yang masih akan diterima");
        $sheet->setCellValue('E270', "113.01.000");
        $sheet->setCellValue('D271', "Pendapatan yang masih akan diterima Cut Off Layanan");
        $sheet->setCellValue('E271', "113.02.000");
        $sheet->setCellValue('D272', "Pendapatan yang masih akan diterima lainnya");
        $sheet->setCellValue('E272', "113.03.000");
        $sheet->setCellValue('C273', "TOTAL PENDAPATAN YANG MASIH AKAN DITERIMA");
        $sheet->getStyle('C273:I273')->applyFromArray($jingga);

        $sheet->setCellValue('A275', "A5");
        $sheet->getStyle('A275')->getFont()->setBold(true);
        $sheet->setCellValue('C275', "PIUTANG LAIN-LAIN");
        $sheet->getStyle('C275')->getFont()->setBold(true);
        $sheet->setCellValue('B276', "A5.1");
        $sheet->getStyle('B276')->getFont()->setBold(true);
        $sheet->setCellValue('C276', "PIUTANG LAIN-LAIN");
        $sheet->getStyle('C276')->getFont()->setBold(true);
        $sheet->setCellValue('D277', "Piutang Pekerja");
        $sheet->setCellValue('E277', "106.01.000");
        $sheet->setCellValue('D278', "Piutang STIKES");
        $sheet->setCellValue('E278', "107.05.000");
        $sheet->setCellValue('D279', "Piutang Lain-lain");
        $sheet->setCellValue('E279', "107.99.000");
        $sheet->setCellValue('C280', "TOTAL PIUTANG LAIN-LAIN");
        $sheet->getStyle('C280:I280')->applyFromArray($jingga);

        $sheet->setCellValue('B282', "A5.2");
        $sheet->getStyle('B276')->getFont()->setBold(true);
        $sheet->setCellValue('C282', "PENYISIHAN PIUTANG LAIN-LAIN (PSAK 71)");
        $sheet->getStyle('C282')->getFont()->setBold(true);
        $sheet->setCellValue('D283', "Piutang Pekerja");
        $sheet->setCellValue('E283', "176.01.000");
        $sheet->setCellValue('D284', "Piutang STIKES");
        $sheet->setCellValue('E284', "177.05.000");
        $sheet->setCellValue('D285', "Piutang Lain-lain");
        $sheet->setCellValue('E285', "177.99.000");
        $sheet->setCellValue('C286', "TOTAL PENYISIHAN PIUTANG LAIN-LAIN");
        $sheet->getStyle('C286')->getFont()->setBold(true);
        $sheet->getStyle('C286:I286')->applyFromArray($jingga);
        $sheet->setCellValue('C288', "TOTAL PIUTANG LAIN-LAIN (NET)");
        $sheet->getStyle('C288:I288')->applyFromArray($jingga);

        $sheet->setCellValue('A290', "A6");
        $sheet->getStyle('A290')->getFont()->setBold(true);
        $sheet->setCellValue('C290', "PERSEDIAAN");
        $sheet->getStyle('C290')->getFont()->setBold(true);
        $sheet->setCellValue('B291', "A6.1");
        $sheet->getStyle('B291')->getFont()->setBold(true);
        $sheet->setCellValue('C291', "PERSEDIAAN OBAT & ALKES");
        $sheet->getStyle('C291')->getFont()->setBold(true);
        $sheet->setCellValue('D292', "Persediaan Obat Jadi");
        $sheet->setCellValue('E292', "109.01.000");
        $sheet->setCellValue('D293', "Persediaan Bahan Obat");
        $sheet->setCellValue('E293', "109.02.000");
        $sheet->setCellValue('D294', "Persediaan Medical supplies");
        $sheet->setCellValue('E294', "109.03.000");
        $sheet->setCellValue('D295', "TOTAL PERSEDIAAN OBAT & ALKES");
        $sheet->getStyle('D295:I295')->applyFromArray($hijau);

        $sheet->setCellValue('B297', "A6.2");
        $sheet->getStyle('B297')->getFont()->setBold(true);
        $sheet->setCellValue('C297', "PERSEDIAAN BARANG UMUM");
        $sheet->getStyle('C297')->getFont()->setBold(true);
        $sheet->setCellValue('D298', "Persediaan Barang Umum");
        $sheet->setCellValue('E298', "109.04.000");
        $sheet->setCellValue('D299', "Persediaan Barang Teknik");
        $sheet->setCellValue('E299', "109.05.000");
        $sheet->setCellValue('D300', "Persediaan Komputer Supplies");
        $sheet->setCellValue('E300', "109.06.000");
        $sheet->setCellValue('D301', "Persediaan Lainnya");
        $sheet->setCellValue('E301', "109.99.000");
        $sheet->setCellValue('D302', "TOTAL PERSEDIAAN BARANG UMUM");
        $sheet->getStyle('D302:I302')->applyFromArray($hijau);

        $sheet->setCellValue('B304', "A6.3");
        $sheet->getStyle('B304')->getFont()->setBold(true);
        $sheet->setCellValue('C304', "SELISIH PERHITUNGAN PERSEDIAAN");
        $sheet->getStyle('C304')->getFont()->setBold(true);
        $sheet->setCellValue('D305', "Rekening Sementara Selisih Perhitungan Obat Jadi ");
        $sheet->setCellValue('E305', "303.11.000");
        $sheet->setCellValue('D306', "Rekening Sementara Selisih Perhitungan Bahan Obat");
        $sheet->setCellValue('E306', "303.12.000");
        $sheet->setCellValue('D307', "Rekening Sementara Selisih Perhitungan Medical Supplies");
        $sheet->setCellValue('E307', "303.13.000");
        $sheet->setCellValue('D308', "Rekening Sementara Selisih Perhitungan Barang Umum");
        $sheet->setCellValue('E308', "303.14.000");
        $sheet->setCellValue('D309', "Rekening Sementara Selisih Perhitungan Barang Teknik");
        $sheet->setCellValue('E309', "303.15.000");
        $sheet->setCellValue('D310', "Rekening Sementara Selisih Perhitungan Komputer");
        $sheet->setCellValue('E310', "303.16.000");
        $sheet->setCellValue('D311', "TOTAL SELISIH PERHITUNGAN PERSEDIAAN");
        $sheet->getStyle('D311:I311')->applyFromArray($hijau);

        $sheet->setCellValue('C313', "TOTAL PERSEDIAAN");
        $sheet->getStyle('C313:I313')->applyFromArray($jingga);

        $sheet->setCellValue('A315', "A7");
        $sheet->getStyle('A315')->getFont()->setBold(true);
        $sheet->setCellValue('C315', "UANG MUKA / PANJAR KERJA");
        $sheet->getStyle('C315')->getFont()->setBold(true);
        $sheet->setCellValue('D316', "Perjalanan Dinas");
        $sheet->setCellValue('E316', "108.01.000");
        $sheet->setCellValue('D317', "Operasional");
        $sheet->setCellValue('E317', "108.02.000");
        $sheet->setCellValue('D318', "Layanan Kesehatan");
        $sheet->setCellValue('E318', "108.03.000");
        $sheet->setCellValue('D319', "Survey, Study & Pengembangan");
        $sheet->setCellValue('E319', "108.04.000");
        $sheet->setCellValue('D320', "Pendidikan");
        $sheet->setCellValue('E320', "108.05.000");
        $sheet->setCellValue('D321', "Perawatan /Pekerjaan Teknik");
        $sheet->setCellValue('E321', "108.06.000");
        $sheet->setCellValue('D322', "Perijinan");
        $sheet->setCellValue('E322', "108.07.000 ");
        $sheet->setCellValue('D323', "Lain-lain");
        $sheet->setCellValue('E323', "108.99.000");
        $sheet->setCellValue('C324', "TOTAL UANG MUKA / PANJAR KERJA");
        $sheet->getStyle('C324:I324')->applyFromArray($jingga);

        $sheet->setCellValue('A326', "A8");
        $sheet->getStyle('A326')->getFont()->setBold(true);
        $sheet->setCellValue('C326', "BEBAN DIBAYAR DIMUKA");
        $sheet->getStyle('C326')->getFont()->setBold(true);
        $sheet->setCellValue('D327', "Biaya Pegawai");
        $sheet->setCellValue('E327', "112.01.000");
        $sheet->setCellValue('D328', "Biaya Operasional");
        $sheet->setCellValue('E328', "112.02.000");
        $sheet->setCellValue('D329', "Biaya Pemeliharaan");
        $sheet->setCellValue('E329', "112.03.000");
        $sheet->setCellValue('D330', "Biaya Asuransi");
        $sheet->setCellValue('E330', "112.04.000");
        $sheet->setCellValue('D331', "Biaya Sewa");
        $sheet->setCellValue('E331', "112.05.000");
        $sheet->setCellValue('D332', "Biaya Administrasi");
        $sheet->setCellValue('E332', "112.06.000");
        $sheet->setCellValue('D333', "Biaya Umum");
        $sheet->setCellValue('E333', "112.07.000");
        $sheet->setCellValue('D334', "Biaya lainnya");
        $sheet->setCellValue('E334', "112.99.000");
        $sheet->setCellValue('C335', "TOTAL BEBAN DIBAYAR DIMUKA");
        $sheet->getStyle('C335:I335')->applyFromArray($jingga);

        $sheet->setCellValue('A337', "A9");
        $sheet->getStyle('A337')->getFont()->setBold(true);
        $sheet->setCellValue('C337', "PAJAK DIBAYAR DIMUKA");
        $sheet->getStyle('C337')->getFont()->setBold(true);
        $sheet->setCellValue('D338', "PPH Pasal 21");
        $sheet->setCellValue('E338', "110.01.000");
        $sheet->setCellValue('D339', "PPH Pasal 22");
        $sheet->setCellValue('E339', "110.02.000");
        $sheet->setCellValue('D340', "PPH Pasal 23/ 26");
        $sheet->setCellValue('E340', "110.03.000");
        $sheet->setCellValue('D341', "PPH Pasal 25");
        $sheet->setCellValue('E341', "110.04.000");
        $sheet->setCellValue('D342', "PPH Pasal 4 (2)");
        $sheet->setCellValue('E342', "110.06.000");
        $sheet->setCellValue('D343', "Prepaid PPN Wapu");
        $sheet->setCellValue('E343', "110.07.000");
        $sheet->setCellValue('D344', "PPN Dibebaskan");
        $sheet->setCellValue('E344', "110.08.000");
        $sheet->setCellValue('D345', "PPN Masukan Yang Dikreditkan (Tukar Faktur)");
        $sheet->setCellValue('E345', "111.01.000");
        $sheet->setCellValue('D346', "PPN Masukan Yang Dikreditkan Non Faktur");
        $sheet->setCellValue('E346', "111.02.000");
        $sheet->setCellValue('C347', "TOTAL PAJAK DIBAYAR DIMUKA");
        $sheet->getStyle('C347:I347')->applyFromArray($jingga);

        $sheet->setCellValue('C349', "TOTAL ASET LANCAR");
        $sheet->getStyle('C349:I349')->applyFromArray($biru);

        $sheet->setCellValue('A351', "B");
        $sheet->getStyle('A351')->getFont()->setBold(true);
        $sheet->setCellValue('C351', "ASET TIDAK LANCAR");
        $sheet->getStyle('C351')->getFont()->setBold(true);
        $sheet->setCellValue('A352', "B1");
        $sheet->getStyle('A352')->getFont()->setBold(true);
        $sheet->setCellValue('C352', "INVESTASI PADA ENTITAS ASOSIASI / SUBSIDIARY");
        $sheet->getStyle('C352')->getFont()->setBold(true);
        $sheet->setCellValue('D353', "Investasi pada  Entitas Asosiasi / Subsidiary");
        $sheet->setCellValue('E353', "311.01.000");
        $sheet->setCellValue('D354', "Investasi pada Entitas Asosiasi / Subsidiary");
        $sheet->setCellValue('E354', "311.02.000");
        $sheet->setCellValue('C355', "TOTAL INVESTASI PADA ENTITAS ASOSIASI / SUBSIDIARY");
        $sheet->getStyle('C355:I355')->applyFromArray($jingga);

        $sheet->setCellValue('A357', "B2");
        $sheet->getStyle('A357')->getFont()->setBold(true);
        $sheet->setCellValue('C357', "PIUTANG LAIN-LAIN JANGKA PANJANG");
        $sheet->getStyle('C357')->getFont()->setBold(true);
        $sheet->setCellValue('D358', "Piutang Jangka Panjang");
        $sheet->setCellValue('E358', "309.01.000");
        $sheet->setCellValue('D359', "Wesel Tagih Jangka Panjang");
        $sheet->setCellValue('E359', "309.02.000");
        $sheet->setCellValue('C360', "TOTAL PIUTANG LAIN-LAIN JANGKA PANJANG");
        $sheet->getStyle('C360:I360')->applyFromArray($jingga);

        $sheet->setCellValue('A362', "B3");
        $sheet->getStyle('A362')->getFont()->setBold(true);
        $sheet->setCellValue('C362', "PROPERTI INVESTASI");
        $sheet->getStyle('C362')->getFont()->setBold(true);
        $sheet->setCellValue('B363', "B3.1");
        $sheet->getStyle('B363')->getFont()->setBold(true);
        $sheet->setCellValue('C363', "PROPERTI INVESTASI - HARGA PEROLEHAN");
        $sheet->getStyle('C363')->getFont()->setBold(true);
        $sheet->setCellValue('D364', "Properti Investasi - Tanah");
        $sheet->setCellValue('E364', "203.01.000");
        $sheet->setCellValue('D365', "Properti Investasi - Gedung dan Bangunan");
        $sheet->setCellValue('E365', "203.02.000");
        $sheet->setCellValue('D366', "TOTAL PROPERTI INVESTASI - HARGA PEROLEHAN");
        $sheet->getStyle('D366:I366')->applyFromArray($hijau);

        $sheet->setCellValue('B368', "B3.2");
        $sheet->getStyle('B368')->getFont()->setBold(true);
        $sheet->setCellValue('C368', "PROPERTI INVESTASI - AKUMULASI PENYUSUTAN");
        $sheet->getStyle('C368')->getFont()->setBold(true);
        $sheet->setCellValue('D369', "Properti Investasi - Gedung dan Bangunan");
        $sheet->setCellValue('E369', "243.01.000");
        $sheet->setCellValue('D370', "TOTAL PROPERTI INVESTASI - AKUMULASI PENYUSUTAN");
        $sheet->getStyle('D370:I370')->applyFromArray($hijau);

        $sheet->setCellValue('C372', "TOTAL NILAI BUKU PROPERTI INVESTASI");
        $sheet->getStyle('C372:I372')->applyFromArray($jingga);

        $sheet->setCellValue('A374', "B4");
        $sheet->getStyle('A374')->getFont()->setBold(true);
        $sheet->setCellValue('C374', "ASET TETAP");
        $sheet->getStyle('C374')->getFont()->setBold(true);
        $sheet->setCellValue('B375', "B4.1");
        $sheet->getStyle('B375')->getFont()->setBold(true);
        $sheet->setCellValue('C375', "ASET TETAP - HARGA PEROLEHAN");
        $sheet->getStyle('C375')->getFont()->setBold(true);
        $sheet->setCellValue('D376', "Tanah");
        $sheet->setCellValue('E376', "201.01.000");
        $sheet->setCellValue('D377', "Gedung dan Bangunan");
        $sheet->setCellValue('E377', "201.02.000");
        $sheet->setCellValue('D378', "Kendaraan dan Ambulance");
        $sheet->setCellValue('E378', "201.03.000");
        $sheet->setCellValue('D379', "Alat Telekomunikasi");
        $sheet->setCellValue('E379', "201.04.000");
        $sheet->setCellValue('D380', "Peralatan Kantor");
        $sheet->setCellValue('E380', "201.05.000");
        $sheet->setCellValue('D381', "Komputer");
        $sheet->setCellValue('E381', "201.06.000");
        $sheet->setCellValue('D382', "Alat Listrik");
        $sheet->setCellValue('E382', "201.07.000");
        $sheet->setCellValue('D383', "Alat Mekanik");
        $sheet->setCellValue('E383', "201.08.000");
        $sheet->setCellValue('D384', "Alat AC");
        $sheet->setCellValue('E384', "201.09.000");
        $sheet->setCellValue('D385', "Alat Lift");
        $sheet->setCellValue('E385', "201.10.000");
        $sheet->setCellValue('D386', "Alat Medis");
        $sheet->setCellValue('E386', "201.11.000");
        $sheet->setCellValue('D387', "TOTAL ASET TETAP - HARGA PEROLEHAN");
        $sheet->getStyle('D387:I387')->applyFromArray($hijau);

        $sheet->setCellValue('B389', "B4.2");
        $sheet->getStyle('B389')->getFont()->setBold(true);
        $sheet->setCellValue('C389', "ASET TETAP - AKUMULASI PENYUSUTAN");
        $sheet->getStyle('C389')->getFont()->setBold(true);
        $sheet->setCellValue('D390', "Gedung dan Bangunan");
        $sheet->setCellValue('E390', "241.02.000");
        $sheet->setCellValue('D391', "Kendaraan dan Ambulance");
        $sheet->setCellValue('E391', "241.03.000");
        $sheet->setCellValue('D392', "Alat Telekomunikasi");
        $sheet->setCellValue('E392', "241.04.000");
        $sheet->setCellValue('D393', "Peralatan Kantor");
        $sheet->setCellValue('E393', "241.05.000");
        $sheet->setCellValue('D394', "Komputer");
        $sheet->setCellValue('E394', "241.06.000");
        $sheet->setCellValue('D395', "Alat Listrik");
        $sheet->setCellValue('E395', "241.07.000");
        $sheet->setCellValue('D396', "Alat Mekanik");
        $sheet->setCellValue('E396', "241.08.000");
        $sheet->setCellValue('D397', "Alat AC");
        $sheet->setCellValue('E397', "241.09.000");
        $sheet->setCellValue('D398', "Alat Lift");
        $sheet->setCellValue('E398', "241.10.000");
        $sheet->setCellValue('D399', "Alat Medis");
        $sheet->setCellValue('E398', "241.11.000");
        $sheet->setCellValue('D400', "TOTAL ASET TETAP - AKUMULASI PENYUSUTAN");
        $sheet->getStyle('D400:I400')->applyFromArray($hijau);

        $sheet->setCellValue('D401', "TOTAL NILAI BUKU ASET TETAP");
        $sheet->getStyle('D401:I401')->applyFromArray($hijau);

        $sheet->setCellValue('D402', "STATUS (Aktiva Tetap)");
        $sheet->getStyle('D402')->getFont()->setBold(true);
        $sheet->setCellValue('B403', "B4.3");
        $sheet->getStyle('B403')->getFont()->setBold(true);
        $sheet->setCellValue('C403', "ASET TETAP LEASING - HARGA PEROLEHAN");
        $sheet->getStyle('C403')->getFont()->setBold(true);
        $sheet->setCellValue('D404', "Aktiva Leasing - Tanah");
        $sheet->setCellValue('E404', "202.01.000");
        $sheet->setCellValue('D405', "Aktiva Leasing - Gedung dan Bangunan");
        $sheet->setCellValue('E405', "202.02.000");
        $sheet->setCellValue('D406', "Aktiva Leasing - Kendaraan dan Ambulance");
        $sheet->setCellValue('E406', "202.03.000");
        $sheet->setCellValue('D407', "Aktiva Leasing - Alat Telekomunikasi");
        $sheet->setCellValue('E407', "202.04.000");
        $sheet->setCellValue('D408', "Aktiva Leasing - Peralatan Kantor");
        $sheet->setCellValue('E408', "202.05.000");
        $sheet->setCellValue('D409', "Aktiva Leasing - Komputer");
        $sheet->setCellValue('E409', "202.06.000");
        $sheet->setCellValue('D410', "Aktiva Leasing - Alat Listrik");
        $sheet->setCellValue('E410', "202.07.000");
        $sheet->setCellValue('D411', "Aktiva Leasing - Alat Mekanik");
        $sheet->setCellValue('E411', "202.08.000");
        $sheet->setCellValue('D412', "Aktiva Leasing - Alat AC");
        $sheet->setCellValue('E412', "202.09.000");
        $sheet->setCellValue('D413', "Aktiva Leasing - Alat Lift");
        $sheet->setCellValue('E413', "202.10.000");
        $sheet->setCellValue('D414', "Aktiva Leasing - Alat Medis");
        $sheet->setCellValue('E414', "202.11.000");
        $sheet->setCellValue('D415', "TOTAL ASET TETAP LEASING - HARGA PEROLEHAN");
        $sheet->getStyle('D415:I415')->applyFromArray($hijau);

        $sheet->setCellValue('B417', "B4.4");
        $sheet->getStyle('B417')->getFont()->setBold(true);
        $sheet->setCellValue('C417', "ASET TETAP LEASING - AKUMULASI PENYUSUTAN");
        $sheet->getStyle('C417')->getFont()->setBold(true);
        $sheet->setCellValue('D418', "Aktiva Leasing - Tanah");
        $sheet->setCellValue('E418', "242.01.000");
        $sheet->setCellValue('D419', "Aktiva Leasing - Gedung dan Bangunan");
        $sheet->setCellValue('E419', "242.02.000");
        $sheet->setCellValue('D420', "Aktiva Leasing - Kendaraan dan Ambulance");
        $sheet->setCellValue('E420', "242.03.000");
        $sheet->setCellValue('D421', "Aktiva Leasing - Alat Telekomunikasi");
        $sheet->setCellValue('E421', "242.04.000");
        $sheet->setCellValue('D422', "Aktiva Leasing - Peralatan Kantor");
        $sheet->setCellValue('E422', "242.05.000");
        $sheet->setCellValue('D423', "Aktiva Leasing - Komputer");
        $sheet->setCellValue('E423', "242.06.000");
        $sheet->setCellValue('D424', "Aktiva Leasing - Alat Listrik");
        $sheet->setCellValue('E424', "242.07.000");
        $sheet->setCellValue('D425', "Aktiva Leasing - Alat Mekanik");
        $sheet->setCellValue('E425', "242.08.000");
        $sheet->setCellValue('D426', "Aktiva Leasing - Alat AC");
        $sheet->setCellValue('E426', "242.09.000");
        $sheet->setCellValue('D427', "Aktiva Leasing - Alat Lift");
        $sheet->setCellValue('E427', "242.10.000");
        $sheet->setCellValue('D428', "Aktiva Leasing - Alat Medis");
        $sheet->setCellValue('E428', "242.11.000");
        $sheet->setCellValue('D429', "TOTAL ASET TETAP LEASING - HARGA PEROLEHAN");
        $sheet->getStyle('D429:I429')->applyFromArray($hijau);

        $sheet->setCellValue('D430', "TOTAL NILAI BUKU ASET LEASING");
        $sheet->getStyle('D430:I430')->applyFromArray($hijau);

        $sheet->setCellValue('B432', "B4.5");
        $sheet->getStyle('B432')->getFont()->setBold(true);
        $sheet->setCellValue('C432', " ASET TETAP DALAM PENYELESAIAN");
        $sheet->getStyle('C432')->getFont()->setBold(true);
        $sheet->setCellValue('D433', " Gedung dan Bangunan");
        $sheet->setCellValue('E433', " 301.01.000");
        $sheet->setCellValue('D434', " Kendaraan dan Ambulance");
        $sheet->setCellValue('E434', " 301.02.000");
        $sheet->setCellValue('D435', " Alat Telekomunikasi");
        $sheet->setCellValue('E435', " 301.03.000");
        $sheet->setCellValue('D436', " Peralatan Kantor ");
        $sheet->setCellValue('E436', " 301.04.000 ");
        $sheet->setCellValue('D437', " Komputer ");
        $sheet->setCellValue('E437', " 301.05.000 ");
        $sheet->setCellValue('D438', " Alat Listrik");
        $sheet->setCellValue('E438', " 301.06.000 ");
        $sheet->setCellValue('D439', " Alat Mekanik");
        $sheet->setCellValue('E439', " 301.07.000 ");
        $sheet->setCellValue('D440', " Alat AC");
        $sheet->setCellValue('E440', " 301.08.000 ");
        $sheet->setCellValue('D441', " Alat Lift");
        $sheet->setCellValue('E441', " 301.09.000 ");
        $sheet->setCellValue('D442', " Alat Medis");
        $sheet->setCellValue('E442', " 301.10.000 ");
        $sheet->setCellValue('D443', " TOTAL ASET TETAP DALAM PENYELESAIAN");
        $sheet->getStyle('D443:I443')->applyFromArray($hijau);

        $sheet->setCellValue('B445', "B4.6");
        $sheet->getStyle('B445')->getFont()->setBold(true);
        $sheet->setCellValue('C445', " ASET TETAP DICADANGKAN (IMPAIRMENT)");
        $sheet->getStyle('C445')->getFont()->setBold(true);
        $sheet->setCellValue('D446', " Tanah");
        $sheet->setCellValue('E446', " 271.01.000");
        $sheet->setCellValue('D447', " Gedung dan Bangunan");
        $sheet->setCellValue('E447', "271.02.000");
        $sheet->setCellValue('D448', " Kendaraan dan Ambulance");
        $sheet->setCellValue('E448', "271.03.000");
        $sheet->setCellValue('D449', "Alat Telekomunikasi");
        $sheet->setCellValue('E449', "271.04.000");
        $sheet->setCellValue('D450', "Peralatan Kantor");
        $sheet->setCellValue('E450', "271.05.000");
        $sheet->setCellValue('D451', "Komputer");
        $sheet->setCellValue('E451', "271.06.000");
        $sheet->setCellValue('D452', "Alat Listrik");
        $sheet->setCellValue('E452', "271.07.000");
        $sheet->setCellValue('D453', "Alat Mekanik");
        $sheet->setCellValue('E453', "271.08.000");
        $sheet->setCellValue('D454', "Alat AC");
        $sheet->setCellValue('E454', "271.09.000");
        $sheet->setCellValue('D455', "Alat Lift");
        $sheet->setCellValue('E455', "271.10.000");
        $sheet->setCellValue('D456', "Alat Medis");
        $sheet->setCellValue('E456', "271.11.000");
        $sheet->setCellValue('D457', "TOTAL ASET TETAP DICADANGKAN (IMPAIRMENT)");
        $sheet->getStyle('D457:I457')->applyFromArray($hijau);

        $sheet->setCellValue('C459', " TOTAL ASET TETAP");
        $sheet->getStyle('C459:I459')->applyFromArray($jingga);

        $sheet->setCellValue('A461', "B5");
        $sheet->getStyle('B432')->getFont()->setBold(true);
        $sheet->setCellValue('C432', " ASET PAJAK TANGGUHAN");
        $sheet->getStyle('C432')->getFont()->setBold(true);
        $sheet->setCellValue('D462', " Aset Pajak Tangguhan");
        $sheet->setCellValue('E462', " 305.01.000");
        $sheet->setCellValue('C463', " TOTAL ASET PAJAK TANGGUHAN");
        $sheet->getStyle('C463:I463')->applyFromArray($jingga);

        $sheet->setCellValue('A465', "B6");
        $sheet->getStyle('A465')->getFont()->setBold(true);
        $sheet->setCellValue('C465', " ASET YANG DIBATASI PENGGUNAANNYA");
        $sheet->getStyle('C465')->getFont()->setBold(true);
        $sheet->setCellValue('D466', " Aset Yang Dibatasi Penggunaanya - Bank Mandiri");
        $sheet->setCellValue('E466', " 310.01.100");
        $sheet->setCellValue('D467', "Aset Yang Dibatasi Penggunaanya - Bank Mandiri");
        $sheet->setCellValue('E467', " 310.01.101");
        $sheet->setCellValue('D468', "Aset Yang Dibatasi Penggunaanya - Bank BNI");
        $sheet->setCellValue('E468', " 310.01.200");
        $sheet->setCellValue('D469', "Aset Yang Dibatasi Penggunaanya - Bank BRI AGRO");
        $sheet->setCellValue('E469', " 310.01.300");
        $sheet->setCellValue('D470', "Aset Yang Dibatasi Penggunaanya - Bank Syariah Mandiri (J.A PBM-PELNI)");
        $sheet->setCellValue('E470', "310.01.400");
        $sheet->setCellValue('D471', "Aset Yang Dibatasi Penggunaanya - Deposito");
        $sheet->setCellValue('E471', " 310.02.100");
        $sheet->setCellValue('D472', "Aset Yang Dibatasi Penggunaanya - Obligasi ");
        $sheet->setCellValue('E472', " 310.03.100");
        $sheet->setCellValue('C473', " TOTAL ASET YANG DIBATASI PENGGUNAANNYA");
        $sheet->getStyle('C473:I473')->applyFromArray($jingga);

        $sheet->setCellValue('A475', "B7");
        $sheet->getStyle('A475')->getFont()->setBold(true);
        $sheet->setCellValue('C475', " ASET TIDAK LANCAR LAINNYA");
        $sheet->getStyle('C475')->getFont()->setBold(true);
        $sheet->setCellValue('D476', "Biaya yang ditangguhkan ");
        $sheet->setCellValue('E476', "304.01.000");
        $sheet->setCellValue('D477', "Aset Tak Berwujud ");
        $sheet->setCellValue('E477', "306.01.000");
        $sheet->setCellValue('D478', "Amortisasi Aset Tak Berwujud ");
        $sheet->setCellValue('E478', "346.01.000");
        $sheet->setCellValue('D479', "Bank Garansi ");
        $sheet->setCellValue('E479', "308.01.000");
        $sheet->setCellValue('D480', "Aset Lainnya - Penyesuaian Kurs Translasi ");
        $sheet->setCellValue('E480', "399.01.000");
        $sheet->setCellValue('C481', " TOTAL ASET TIDAK LANCAR LAINNYA");
        $sheet->getStyle('C481:I481')->applyFromArray($jingga);

        $sheet->setCellValue('A483', "B8");
        $sheet->getStyle('A483')->getFont()->setBold(true);
        $sheet->setCellValue('C483', "TAKSIRAN TAGIHAN PAJAK PENGHASILAN");
        $sheet->getStyle('C483')->getFont()->setBold(true);
        $sheet->setCellValue('D484', "PPH Badan (lebih bayar) ");
        $sheet->setCellValue('E484', "110.05.000");
        $sheet->setCellValue('C485', "TOTAL TAKSIRAN TAGIHAN PAJAK PENGHASILAN");
        $sheet->getStyle('C485:I485')->applyFromArray($jingga);

        $sheet->setCellValue('C487', "TOTAL ASET TIDAK LANCAR");
        $sheet->getStyle('C487:I487')->applyFromArray($biru);

        $sheet->setCellValue('C488', "TOTAL ASET");
        $sheet->getStyle('C488:I488')->applyFromArray($merah);

        $sheet->setCellValue('A490', "C");
        $sheet->getStyle('A490')->getFont()->setBold(true);
        $sheet->setCellValue('C490', "LIABILITAS JANGKA PENDEK");
        $sheet->getStyle('C490')->getFont()->setBold(true);
        $sheet->setCellValue('A491', "C1");
        $sheet->getStyle('A491')->getFont()->setBold(true);
        $sheet->setCellValue('C491', "UTANG USAHA");
        $sheet->getStyle('C491')->getFont()->setBold(true);
        $sheet->setCellValue('D492', "Utang Obat dan Medical supplies");
        $sheet->setCellValue('E492', "401.01.000");
        $sheet->setCellValue('D493', "Utang Kontrak");
        $sheet->setCellValue('E493', "401.02.000");
        $sheet->setCellValue('D494', "Utang Material/ Umum");
        $sheet->setCellValue('E494', "401.03.000");
        $sheet->setCellValue('D495', "Utang HBM");
        $sheet->setCellValue('E495', "401.04.000");
        $sheet->setCellValue('D496', "Utang Usaha lainnya");
        $sheet->setCellValue('E496', "401.05.000");
        $sheet->setCellValue('D497', "Utang Hubungan Istimewa Lainnya (khusus ICT)");
        $sheet->setCellValue('E497', "419.02.000");
        $sheet->setCellValue('C498', "TOTAL UTANG USAHA");
        $sheet->getStyle('C498:I498')->applyFromArray($jingga);

        $sheet->setCellValue('A500', "C2");
        $sheet->getStyle('A500')->getFont()->setBold(true);
        $sheet->setCellValue('C500', "UTANG LAIN-LAIN");
        $sheet->getStyle('C500')->getFont()->setBold(true);
        $sheet->setCellValue('B501', "C2.1");
        $sheet->getStyle('B501')->getFont()->setBold(true);
        $sheet->setCellValue('C501', "UANG TITIPAN");
        $sheet->getStyle('C501')->getFont()->setBold(true);
        $sheet->setCellValue('D502', "Potongan BDI (Badan Dakwah Islam)");
        $sheet->setCellValue('E502', "404.01.000");
        $sheet->setCellValue('D503', "Potongan PWP (Persatuan Wanita Patra)");
        $sheet->setCellValue('E503', "404.02.000");
        $sheet->setCellValue('D504', "Potongan Koperasi Karyawan");
        $sheet->setCellValue('E504', "404.03.000");
        $sheet->setCellValue('D505', "WKP (Wadah Komunikasi Pekerja)");
        $sheet->setCellValue('E505', "404.04.000");
        $sheet->setCellValue('D506', "KPR (Kredit Pemilikan Rumah)");
        $sheet->setCellValue('E506', "404.05.000");
        $sheet->setCellValue('D507', "Pertamina Dana Ventura (PDV)");
        $sheet->setCellValue('E507', "404.06.000");
        $sheet->setCellValue('D508', "Potongan Hari Proporsional");
        $sheet->setCellValue('E508', "404.07.000");
        $sheet->setCellValue('D509', "Potongan Gaji lainnya");
        $sheet->setCellValue('E509', "404.08.000");
        $sheet->setCellValue('D510', "Sisa Bulan Berjalan");
        $sheet->setCellValue('E510', "404.09.000");
        $sheet->setCellValue('E511', "Dana Kesehatan Pensiun PERTAMEDIKA");
        $sheet->setCellValue('E511', "404.10.000");
        $sheet->setCellValue('E512', "Lainnya");
        $sheet->setCellValue('E512', "404.99.000");
        $sheet->setCellValue('D513', "TOTAL UANG TITIPAN");
        $sheet->getStyle('D513:I513')->applyFromArray($hijau);

        $sheet->setCellValue('B515', "C2.2");
        $sheet->getStyle('B515')->getFont()->setBold(true);
        $sheet->setCellValue('D515', "UTANG DANA JAMINAN");
        $sheet->getStyle('D515')->getFont()->setBold(true);
        $sheet->setCellValue('D516', "DPLK (Pensiun)");
        $sheet->setCellValue('E516', "411.01.000");
        $sheet->setCellValue('D517', "BPJS Ketenagakerjaan");
        $sheet->setCellValue('E517', "411.02.000");
        $sheet->setCellValue('D518', "BPJS Kesehatan");
        $sheet->setCellValue('E518', "411.03.000");
        $sheet->setCellValue('D519', "TOTAL UTANG DANA JAMINAN");
        $sheet->getStyle('D519:I519')->applyFromArray($hijau);

        $sheet->setCellValue('B521', "C2.3");
        $sheet->getStyle('B521')->getFont()->setBold(true);
        $sheet->setCellValue('C521', "UTANG PEKERJA");
        $sheet->getStyle('C521')->getFont()->setBold(true);
        $sheet->setCellValue('D522', "Utang Jasa Produksi (Bonus)");
        $sheet->setCellValue('E522', "406.01.000");
        $sheet->setCellValue('D523', "Utang Gaji");
        $sheet->setCellValue('E523', "415.01.000");
        $sheet->setCellValue('D524', "Utang Imbalan Jasa Dokter");
        $sheet->setCellValue('E524', "415.02.000");
        $sheet->setCellValue('D525', "TOTAL UTANG PEKERJA");
        $sheet->getStyle('D525:I525')->applyFromArray($hijau);

        $sheet->setCellValue('B527', "C2.4");
        $sheet->getStyle('B527')->getFont()->setBold(true);
        $sheet->setCellValue('C527', "UTANG HUBUNGAN ISTIMEWA");
        $sheet->getStyle('C527')->getFont()->setBold(true);
        $sheet->setCellValue('D528', "Deviden");
        $sheet->setCellValue('E528', "418.01.000");
        $sheet->setCellValue('D529', "Sewa Kelola Aset ");
        $sheet->setCellValue('E529', "419.01.000");
        $sheet->setCellValue('D530', "TOTAL UTANG HUBUNGAN ISTIMEWA");
        $sheet->getStyle('D530:I530')->applyFromArray($hijau);

        $sheet->setCellValue('C532', "TOTAL UTANG LAIN-LAIN");
        $sheet->getStyle('C532:I532')->applyFromArray($jingga);

        $sheet->setCellValue('A534', "C3");
        $sheet->getStyle('A534')->getFont()->setBold(true);
        $sheet->setCellValue('C535', "UTANG PAJAK");
        $sheet->getStyle('C535')->getFont()->setBold(true);
        $sheet->setCellValue('B535', "C3.1");
        $sheet->getStyle('B535')->getFont()->setBold(true);
        $sheet->setCellValue('C535', "PAJAK PENGHASILAN BADAN");
        $sheet->getStyle('C535')->getFont()->setBold(true);
        $sheet->setCellValue('D536', "Utang Pajak Penghasilan Badan");
        $sheet->setCellValue('E536', "408.01.000");
        $sheet->setCellValue('D537', "TOTAL UTANG PAJAK PENGHASILAN BADAN");
        $sheet->getStyle('D537:I537')->applyFromArray($hijau);

        $sheet->setCellValue('B539', "C3.2");
        $sheet->getStyle('B539')->getFont()->setBold(true);
        $sheet->setCellValue('C539', "PPN KELUARAN");
        $sheet->getStyle('C539')->getFont()->setBold(true);
        $sheet->setCellValue('D540', "PPN Keluaran (Obat Non Wapu)");
        $sheet->setCellValue('E540', "409.01.000");
        $sheet->setCellValue('D541', "PPN Keluaran (Obat Wapu dan Tidak Dipungut)");
        $sheet->setCellValue('E541', "409.02.000");
        $sheet->setCellValue('D542', "PPN Keluaran (Lainnya Non Wapu)");
        $sheet->setCellValue('E542', "409.03.000");
        $sheet->setCellValue('D543', "PPN Keluaran (Lainnya Wapu dan Tidak Dipungut)");
        $sheet->setCellValue('E543', "409.04.000");
        $sheet->setCellValue('D544', "PPN Keluaran Dibebaskan");
        $sheet->setCellValue('E544', "409.05.000");
        $sheet->setCellValue('D545', "TOTAL PPN KELUARAN");
        $sheet->getStyle('D545:I545')->applyFromArray($hijau);


        $sheet->setCellValue('B547', "C3.2");
        $sheet->getStyle('B547')->getFont()->setBold(true);
        $sheet->setCellValue('C547', "UTANG PAJAK LAINNYA");
        $sheet->getStyle('C547')->getFont()->setBold(true);
        $sheet->setCellValue('D548', "PPH Pasal 21");
        $sheet->setCellValue('E548', "410.01.000");
        $sheet->setCellValue('D549', "PPH Pasal 23");
        $sheet->setCellValue('E549', "410.02.000");
        $sheet->setCellValue('D550', "PPH Pasal 26");
        $sheet->setCellValue('E550', "410.03.000");
        $sheet->setCellValue('D551', "Pajak Bumi dan Bangunan");
        $sheet->setCellValue('E551', "410.04.000");
        $sheet->setCellValue('D552', "PPH Pasal 4 ayat 2");
        $sheet->setCellValue('E552', "410.05.000");
        $sheet->setCellValue('D553', "PPH Pasal 29 (ganti keterangan dari sebelumnya Pasal 25)");
        $sheet->setCellValue('E553', "410.06.000");
        $sheet->setCellValue('D554', "Utang Pajak Lainnya");
        $sheet->setCellValue('E554', "410.99.000");
        $sheet->setCellValue('D555', "TOTAL UTANG PAJAK LAINNYA");
        $sheet->getStyle('D555:I555')->applyFromArray($hijau);

        $sheet->setCellValue('C557', "TOTAL UTANG PAJAK");
        $sheet->getStyle('C557:I557')->applyFromArray($jingga);

        $sheet->setCellValue('A559', "C4");
        $sheet->getStyle('A559')->getFont()->setBold(true);
        $sheet->setCellValue('C559', "BIAYA YANG MASIH HARUS DIBAYAR");
        $sheet->getStyle('C559')->getFont()->setBold(true);
        $sheet->setCellValue('D560', "Biaya Pekerja");
        $sheet->setCellValue('E560', "412.01.000");
        $sheet->setCellValue('D561', "Biaya Operasional");
        $sheet->setCellValue('E561', "412.02.000");
        $sheet->setCellValue('D562', "Biaya Pemeliharaan");
        $sheet->setCellValue('E562', "412.03.000");
        $sheet->setCellValue('D563', "Biaya Asuransi");
        $sheet->setCellValue('E563', "412.04.000");
        $sheet->setCellValue('D564', "Biaya sewa");
        $sheet->setCellValue('E564', "412.05.000");
        $sheet->setCellValue('D565', "Biaya Administrasi");
        $sheet->setCellValue('E565', "412.06.000");
        $sheet->setCellValue('D566', "Biaya Umum");
        $sheet->setCellValue('E566', "412.07.000");
        $sheet->setCellValue('D567', "Biaya Pengelolaan Aset");
        $sheet->setCellValue('E567', "412.08.000");
        $sheet->setCellValue('D568', "Biaya Bunga");
        $sheet->setCellValue('E568', "412.09.000");
        $sheet->setCellValue('D569', "Termin Invoice Aset Tetap");
        $sheet->setCellValue('E569', "412.10.000");
        $sheet->setCellValue('D570', "Biaya Lainnya");
        $sheet->setCellValue('E570', "412.99.000");
        $sheet->setCellValue('C571', "TOTAL BIAYA YANG MASIH HARUS DIBAYAR");
        $sheet->getStyle('C571:I571')->applyFromArray($jingga);

        $sheet->setCellValue('A573', "C5");
        $sheet->getStyle('A573')->getFont()->setBold(true);
        $sheet->setCellValue('C573', "PENDAPATAN DITERIMA DI MUKA & DEPOSIT PASIEN");
        $sheet->getStyle('C573')->getFont()->setBold(true);
        $sheet->setCellValue('D574', "Deposit / Panjar Pasien");
        $sheet->setCellValue('E574', "403.01.000");
        $sheet->setCellValue('D575', "Pendapatan Yang Diterima Dimuka Kapitasi");
        $sheet->setCellValue('E575', "413.01.000");
        $sheet->setCellValue('D576', "Pendapatan yang diterima dimuka lainnya");
        $sheet->setCellValue('E576', "413.02.000");
        $sheet->setCellValue('D577', "Pendapatan Yang Diterima Dimuka Sewa");
        $sheet->setCellValue('E577', "413.03.000");
        $sheet->setCellValue('D578', "Pendapatan Yang Diterima Dimuka Donasi");
        $sheet->setCellValue('E578', "413.04.000");
        $sheet->setCellValue('C579', "TOTAL PENDAPATAN DITERIMA DI MUKA & DEPOSIT PASIEN");
        $sheet->getStyle('C579:I579')->applyFromArray($jingga);

        $sheet->setCellValue('A581', "C6");
        $sheet->getStyle('A581')->getFont()->setBold(true);
        $sheet->setCellValue('C581', "UTANG PINJAMAN JANGKA PENDEK");
        $sheet->getStyle('C581')->getFont()->setBold(true);
        $sheet->setCellValue('D582', " Utang Bank Jangka Pendek");
        $sheet->setCellValue('E582', " 421.01.000");
        $sheet->setCellValue('D583', "Utang Non Bank Jangka Pendek");
        $sheet->setCellValue('E583', " 421.02.000");
        $sheet->setCellValue('C584', "TOTAL UTANG PINJAMAN JANGKA PENDEK");
        $sheet->getStyle('C584:I584')->applyFromArray($jingga);

        $sheet->setCellValue('A586', "C7");
        $sheet->getStyle('A586')->getFont()->setBold(true);
        $sheet->setCellValue('C586', "BAGIAN LIABILITAS JANGKA PANJANG YANG JATUH TEMPO DALAM WAKTU 1 TAHUN");
        $sheet->getStyle('C586')->getFont()->setBold(true);
        $sheet->setCellValue('B587', "C7.1");
        $sheet->getStyle('B587')->getFont()->setBold(true);
        $sheet->setCellValue('C587', "PIHAK KETIGA");
        $sheet->getStyle('C587')->getFont()->setBold(true);
        $sheet->setCellValue('D588', "Utang Pertamina Jangka Panjang yang akan jatuh tempo");
        $sheet->setCellValue('E588', "405.01.000");
        $sheet->setCellValue('D589', "Utang Non Bank Jangka Panjang yang akan jatuh tempo - Investasi");
        $sheet->setCellValue('E589', "405.02.100");
        $sheet->setCellValue('D590', "Utang Non Bank Jangka Panjang yang akan jatuh tempo - Non Investasi");
        $sheet->setCellValue('E590', "405.02.200");
        $sheet->setCellValue('D591', "Utang Bank Jangka Panjang yang akan jatuh tempo – Investasi");
        $sheet->setCellValue('E591', "405.03.100");
        $sheet->setCellValue('D592', "Utang Bank Jangka Panjang yang akan jatuh tempo - Non Investasi");
        $sheet->setCellValue('E592', "405.03.200");
        $sheet->setCellValue('D593', "Utang Leasing Jangka Panjang yang akan jatuh tempo");
        $sheet->setCellValue('E593', "405.04.000");
        $sheet->setCellValue('D594', "Wesel Bayar");
        $sheet->setCellValue('E594', "480.01.000");
        $sheet->setCellValue('D595', "TOTAL PIHAK KETIGA");
        $sheet->getStyle('D595:I595')->applyFromArray($hijau);

        $sheet->setCellValue('B597', "C7.2");
        $sheet->getStyle('B597')->getFont()->setBold(true);
        $sheet->setCellValue('C597', "IMBALAN PASKA KERJA - PSAK 24");
        $sheet->getStyle('C597')->getFont()->setBold(true);
        $sheet->setCellValue('D598', "Utang Imbalan Kerja Jangka Pendek - Pesangon");
        $sheet->setCellValue('E598', "416.01.000");
        $sheet->setCellValue('D599', "Utang Imbalan Kerja Jangka Pendek - Kesehatan");
        $sheet->setCellValue('E599', "416.02.000");
        $sheet->setCellValue('D600', "Utang Imbalan Kerja Jangka Pendek - Cuti Besar");
        $sheet->setCellValue('E600', "416.03.000");
        $sheet->setCellValue('D601', "TOTAL IMBALAN PASKA KERJA - PSAK 24");
        $sheet->getStyle('D601:I601')->applyFromArray($hijau);

        $sheet->setCellValue('B603', "C7.3");
        $sheet->getStyle('B603')->getFont()->setBold(true);
        $sheet->setCellValue('C603', "PENDAPATAN BUNGA TANGGUHAN (PSAK 73)");
        $sheet->getStyle('C603')->getFont()->setBold(true);
        $sheet->setCellValue('D604', "Pendapatan Bunga Tangguhan yang akan Jatuh tempo");
        $sheet->setCellValue('E604', "420.01.000");
        $sheet->setCellValue('D605', "TOTAL PENDAPATAN BUNGA TANGGUHAN");
        $sheet->getStyle('D605:I605')->applyFromArray($hijau);

        $sheet->setCellValue('C607', "TOTAL BAGIAN LIABILITAS JANGKA PANJANG YANG JATUH TEMPO DALAM WAKTU 1 TAHUN");
        $sheet->getStyle('C607:I607')->applyFromArray($jingga);

        $sheet->setCellValue('C609', "TOTAL LIABILITAS JANGKA PENDEK");
        $sheet->getStyle('C609:I609')->applyFromArray($biru);

        $sheet->setCellValue('A611', "D");
        $sheet->getStyle('A611')->getFont()->setBold(true);
        $sheet->setCellValue('C611', "LIABILITAS JANGKA PANJANG");
        $sheet->getStyle('C611')->getFont()->setBold(true);
        $sheet->setCellValue('A612', "D1");
        $sheet->getStyle('A612')->getFont()->setBold(true);
        $sheet->setCellValue('C612', "LIABILITAS JANGKA PANJANG SETELAH DIKURANGI BAGIAN YANG JATUH TEMPO DALAM WAKTU 1 TAHUN");
        $sheet->getStyle('C612')->getFont()->setBold(true);
        $sheet->setCellValue('B613', "D1.1");
        $sheet->getStyle('B613')->getFont()->setBold(true);
        $sheet->setCellValue('C613', "PIHAK KETIGA");
        $sheet->getStyle('C613')->getFont()->setBold(true);
        $sheet->setCellValue('D614', "Utang Non Bank Jangka Panjang - Investasi");
        $sheet->setCellValue('E614', "502.01.100");
        $sheet->setCellValue('D615', "Utang Non Bank Jangka Panjang - Non Investasi");
        $sheet->setCellValue('E615', "502.01.200");
        $sheet->setCellValue('D616', "Utang Bank Jangka Panjang - Investasi");
        $sheet->setCellValue('E616', "503.01.100");
        $sheet->setCellValue('D617', "Utang Bank Jangka Panjang - Non Investasi");
        $sheet->setCellValue('E617', "503.01.200");
        $sheet->setCellValue('D618', "Utang Leasing");
        $sheet->setCellValue('E618', "516.01.000");
        $sheet->setCellValue('D619', "Wesel Bayar Jangka Panjang");
        $sheet->setCellValue('E619', "580.01.000");
        $sheet->setCellValue('D620', "TOTAL PIHAK KETIGA");
        $sheet->getStyle('D620:I620')->applyFromArray($hijau);

        $sheet->setCellValue('B622', "D1.2");
        $sheet->getStyle('B622')->getFont()->setBold(true);
        $sheet->setCellValue('C622', "IMBALAN PASKA KERJA - PSAK 24");
        $sheet->getStyle('C622')->getFont()->setBold(true);
        $sheet->setCellValue('D623', "Utang Imbalan Kerja Jangka Panjang");
        $sheet->setCellValue('E623', "517.01.000");
        $sheet->setCellValue('D624', "Utang Imbalan Kerja Jangka Panjang - Pesangon");
        $sheet->setCellValue('E624', "517.01.100");
        $sheet->setCellValue('D625', "Utang Imbalan Kerja Jangka Panjang - Cuti Besar");
        $sheet->setCellValue('E625', "517.01.200");
        $sheet->setCellValue('D626', "Utang Imbalan Kerja Jangka Panjang - Kesehatan");
        $sheet->setCellValue('E626', "517.01.300");
        $sheet->setCellValue('D627', "TOTAL IMBALAN PASKA KERJA - PSAK 24");
        $sheet->getStyle('D627:I627')->applyFromArray($hijau);

        $sheet->setCellValue('A629', "D1.3");
        $sheet->getStyle('A629')->getFont()->setBold(true);
        $sheet->setCellValue('C629', "PENDAPATAN BUNGA TANGGUHAN (PSAK 73)");
        $sheet->getStyle('C629')->getFont()->setBold(true);
        $sheet->setCellValue('D630', "Pendapatan Bunga Tangguhan Jangka Panjang");
        $sheet->setCellValue('E630', "504.01.000");
        $sheet->setCellValue('D631', "TOTAL PENDAPATAN BUNGA TANGGUHAN");
        $sheet->getStyle('D631:I631')->applyFromArray($hijau);

        $sheet->setCellValue('C632', "TOTAL LIABILITAS JANGKA PANJANG SETELAH DIKURANGI BAGIAN YANG JATUH TEMPO DALAM WAKTU 1 TAHUN");
        $sheet->getStyle('C632:I632')->applyFromArray($jingga);

        $sheet->setCellValue('A634', "D2");
        $sheet->getStyle('A634')->getFont()->setBold(true);
        $sheet->setCellValue('C634', "UTANG PAJAK TANGGUHAN");
        $sheet->getStyle('C634')->getFont()->setBold(true);
        $sheet->setCellValue('D635', "Utang Pajak Tangguhan");
        $sheet->setCellValue('E635', "417.01.000");
        $sheet->setCellValue('C636', "TOTAL UTANG PAJAK TANGGUHAN");
        $sheet->getStyle('C636:I636')->applyFromArray($jingga);

        $sheet->setCellValue('A638', "D3");
        $sheet->getStyle('A638')->getFont()->setBold(true);
        $sheet->setCellValue('C638', "UTANG LAINNYA");
        $sheet->getStyle('C638')->getFont()->setBold(true);
        $sheet->setCellValue('D639', "Penyesuaian Kurs Translasi");
        $sheet->setCellValue('E639', "590.01.000");
        $sheet->setCellValue('C640', "TOTAL UTANG LAINNYA");
        $sheet->getStyle('C640:I640')->applyFromArray($jingga);

        $sheet->setCellValue('C642', "TOTAL LIABILITAS JANGKA PANJANG");
        $sheet->getStyle('C642:I642')->applyFromArray($biru);

        $sheet->setCellValue('A643', "E");
        $sheet->getStyle('A643')->getFont()->setBold(true);
        $sheet->setCellValue('C643', "EKUITAS");
        $sheet->getStyle('C643')->getFont()->setBold(true);
        $sheet->setCellValue('D644', "Modal Saham ");
        $sheet->setCellValue('E644', "601.02.000");
        $sheet->setCellValue('D645', "Modal Saham Belum Disetor");
        $sheet->setCellValue('E645', "601.03.000");
        $sheet->setCellValue('D646', "Modal Donasi ");
        $sheet->setCellValue('E646', "602.01.000");
        $sheet->setCellValue('D647', "Cadangan Umum ");
        $sheet->setCellValue('E647', "603.01.000");
        $sheet->setCellValue('D648', "Cadangan Khusus (Ditentukan Penggunaannya)");
        $sheet->setCellValue('E648', "603.02.000");
        $sheet->setCellValue('D649', "Tambahan Modal Disetor ");
        $sheet->setCellValue('E649', "604.01.000");
        $sheet->setCellValue('D650', "Tambahan Modal Disetor ");
        $sheet->setCellValue('E650', "604.02.000");
        $sheet->setCellValue('D651', "Selisih lebih/ (kurang) setoran modal ke anak perusahaan");
        // $sheet->setCellValue('A652', "BANGKE");
        // $sheet->getStyle('A652')->getFont()->setBold(true);
        $sheet->setCellValue('D652', "Laba Tahun Berjalan ");
        $sheet->setCellValue('E652', "605.01.000");
        $sheet->setCellValue('D653', "Dividen");
        $sheet->setCellValue('D654', "Laba Ditahan ");
        $sheet->setCellValue('E654', "605.02.000");
        $sheet->setCellValue('D655', "Other Comprehensive Income");
        $sheet->setCellValue('E655', "606.01.000");
        $sheet->setCellValue('D656', "OCI - Selisih Revaluasi Aset Tetap");
        $sheet->setCellValue('E656', "606.01.100");
        $sheet->setCellValue('D657', "OCI - Pengukuran Kembali Program Imbalan Pasti");
        $sheet->setCellValue('E657', "606.01.200");
        $sheet->setCellValue('D658', "OCI - Laba Rugi dampak dari Penjabaran Laporan Keuangan");
        $sheet->setCellValue('E658', "606.01.300");
        $sheet->setCellValue('D659', "OCI - Perubahan Nilai Investasi Available For Sale");
        $sheet->setCellValue('E659', "606.01.400");
        $sheet->setCellValue('D660', "OCI - Bagian Efektif dari Keuntungan Lindung Nilai Arus Kas");
        $sheet->setCellValue('E660', "606.01.500");
        $sheet->setCellValue('D661', "OCI - Selisih Nilai Wajar Saham Penyertaan Langsung");
        $sheet->setCellValue('E661', "606.01.600");
        $sheet->setCellValue('D662', "OCI - Serap Pendapatan OCI dari Anak Perusahaan");
        $sheet->setCellValue('D663', "OCI - Tahun berjalan");
        $sheet->setCellValue('D664', "OCI - Selisih Revaluasi Aset Tetap");
        $sheet->setCellValue('E664', "606.01.100");
        $sheet->setCellValue('D665', "OCI - Pengukuran Kembali Program Imbalan Pasti");
        $sheet->setCellValue('E665', "606.01.200");
        $sheet->setCellValue('D666', "OCI - Laba Rugi dampak dari Penjabaran Laporan Keuangan");
        $sheet->setCellValue('E666', "606.01.300");
        $sheet->setCellValue('D667', "OCI - Perubahan Nilai Investasi Available For Sale");
        $sheet->setCellValue('E667', "606.01.400");
        $sheet->setCellValue('D668', "OCI - Bagian Efektif dari Keuntungan Lindung Nilai Arus Kas");
        $sheet->setCellValue('E668', "606.01.500");
        $sheet->setCellValue('D669', "OCI - Selisih Nilai Wajar Saham Penyertaan Langsung");
        $sheet->setCellValue('E669', "606.01.600");
        $sheet->setCellValue('D670', "Selisih Transaksi Restrukturisasi Entitas Sepengendali");
        $sheet->getStyle('D670')->getFont()->setBold(true);
        $sheet->setCellValue('D671', "NCI - Laba Tahun Berjalan - Kepentingan Non Pengendali");
        $sheet->setCellValue('E671', "606.01.501");
        $sheet->setCellValue('D672', "NCI - Laba Ditahan - Kepentingan Non Pengendali");
        $sheet->setCellValue('E672', "606.01.502");
        $sheet->setCellValue('D673', "NCI - Deviden - Kepentingan Non Pengendali");
        $sheet->setCellValue('E673', "607.01.300");
        $sheet->setCellValue('D674', "NCI - Ekuitas selain Laba tahun berjalan");
        $sheet->setCellValue('E674', "607.01.400");
        $sheet->setCellValue('D675', "NCI - Laba Tahun Berjalan - Kepentingan Non Pengendali Yang Dipisah dari Laba Konsolidasi");
        $sheet->setCellValue('E675', "607.01.101");
        $sheet->setCellValue('D676', "NCI (Awal) Tahun");
        $sheet->setCellValue('D677', "NCI (Akhir) Tahun");
        $sheet->setCellValue('D678', "NCI - OCI awal Tahun");
        $sheet->setCellValue('D679', "NCI - OCI akhir Tahun");
        $sheet->setCellValue('D680', "NCI - OCI tahun berjalan");
        $sheet->setCellValue('C681', "TOTAL EKUITAS");
        $sheet->getStyle('C681:I681')->applyFromArray($biru);

        $sheet->setCellValue('A683', "F");
        $sheet->getStyle('A683')->getFont()->setBold(true);
        $sheet->setCellValue('C683', "R/K ANTAR UNIT USAHA");
        $sheet->getStyle('C683')->getFont()->setBold(true);
        $sheet->setCellValue('D684', "R/K Antar Unit Usaha Korporat BTM");
        $sheet->setCellValue('E684', "950.00.000");
        $sheet->setCellValue('D685', "R/K Antar Unit Usaha – RSBT Pangkalpinang");
        $sheet->setCellValue('E685', "950.01.000");
        $sheet->setCellValue('D686', "R/K Antar Unit Usaha – RSBT Sungailiat");
        $sheet->setCellValue('E686', "950.02.000");
        $sheet->setCellValue('D687', "R/K Antar Unit Usaha – RSBT Karimun");
        $sheet->setCellValue('E687', "950.03.000");
        $sheet->setCellValue('D688', "R/K Antar Unit Usaha – RSBT Muntok");
        $sheet->setCellValue('E688', "950.04.000");
        $sheet->setCellValue('D689', "R/K Antar Unit Usaha – MCC");
        $sheet->setCellValue('E688', "950.05.000");
        $sheet->setCellValue('D689', "R/K Antar Unit Usaha – Klinik Jebus");
        $sheet->setCellValue('E689', "950.06.000");
        $sheet->setCellValue('D690', "R/K Antar Unit Usaha – Klinik Toboali");
        $sheet->setCellValue('E690', "950.07.000");
        $sheet->setCellValue('D691', "R/K Antar Unit Usaha – Klinik Tanjung Pandan");
        $sheet->setCellValue('E691', "950.08.000");
        $sheet->setCellValue('D692', "R/K Antar Unit Usaha – Klinik Belinyu");
        $sheet->setCellValue('E692', "950.09.000");
        $sheet->setCellValue('D693', "R/K Antar Unit Usaha – FKTP PKL Balam");
        $sheet->setCellValue('E693', "950.10.000");
        $sheet->setCellValue('D694', "R/K Antar Unit Usaha – FKTP KS Tubun");
        $sheet->setCellValue('E694', "950.11.000");
        $sheet->setCellValue('D695', "R/K Antar Unit Usaha – FKTP Kundur");
        $sheet->setCellValue('E695', "950.12.000");
        $sheet->setCellValue('D696', "R/K Antar Unit Usaha – FKTP Manggar");
        $sheet->setCellValue('E696', "950.13.000");
        $sheet->setCellValue('D697', "R/K Antar Unit Usaha – PT BTSM");
        $sheet->setCellValue('E697', "950.14.000");

        $sheet->setCellValue('C698', "TOTAL R/K ANTAR UNIT USAHA");
        $sheet->getStyle('C698:I698')->applyFromArray($biru);

        $sheet->setCellValue('A700', "TOTAL LIABILITAS & EKUITAS");
        $sheet->getStyle('A700:I700')->applyFromArray($merah);

        $sheet->setCellValue('A701', "KONTROL BALANCE");
        $sheet->getStyle('A701:I701')->applyFromArray($merah);

        $sheet->setCellValue('A703', "G");
        $sheet->getStyle('A703')->getFont()->setBold(true);
        $sheet->setCellValue('C703', "PENDAPATAN USAHA");
        $sheet->getStyle('C703')->getFont()->setBold(true);
        $sheet->mergeCells('C703:D703');
        $sheet->setCellValue('A704', "G1");
        $sheet->getStyle('A704')->getFont()->setBold(true);
        $sheet->setCellValue('C704', "PENDAPATAN USAHA PER KELOMPOK PELANGGAN");
        $sheet->getStyle('C704')->getFont()->setBold(true);
        $sheet->mergeCells('C704:D704');
        $sheet->setCellValue('D705', "PERTAMINA (Persero) - Kantor Pusat ==> FFS");
        $sheet->setCellValue('D706', "PERTAMINA (Persero) - Wilayah ==> FFS");
        $sheet->setCellValue('D707', "Pendapatan Anak Perusahaan");
        $sheet->setCellValue('D708', "Pendapatan Selisih Rekonsiliasi ICT Pertamina Group");
        $sheet->setCellValue('D709', "Pendapatan Entitas Asosiasi, Joint Venture dan Afiliasi ");
        $sheet->setCellValue('D710', "Pendapatan Entitas Asosiasi, Joint Venture dan Afiliasi - FFS");
        $sheet->setCellValue('D711', "Pendapatan Entitas Asosiasi, Joint Venture dan Afiliasi - KAPITASI");
        $sheet->setCellValue('D712', "Pendapatan Entitas yang Berelasi dengan BUMN");
        $sheet->setCellValue('D713', "Pendapatan Entitas yang Berelasi dengan Pemerintah");
        $sheet->setCellValue('D714', "Pendapatan Entitas yang Berelasi BPJS Kesehatan");
        $sheet->setCellValue('D715', "Pendapatan Entitas yang Berelasi Others");
        $sheet->setCellValue('D716', "Pendapatan Pihak ke III");
        $sheet->setCellValue('D717', "Pendapatan Cash");
        $sheet->setCellValue('D718', "Pendapatan Inter Segmen (PAU)");
        $sheet->setCellValue('D719', "Selisih Kapitasi");
        $sheet->setCellValue('D720', "Selisih BPJS (Kesehatan)");
        $sheet->setCellValue('D721', "Selisih BPJS (Covid-19)");
        $sheet->setCellValue('D722', "Reduksi Pendapatan (Discount)");
        $sheet->getStyle('D714:D717')->applyFromArray($jingga);
        $sheet->setCellValue('C723', "TOTAL PENDAPATAN USAHA PER KELOMPOK PELANGGAN");
        $sheet->getStyle('C723')->getFont()->setBold(true);
        $sheet->mergeCells('C723:D723');
        $sheet->getStyle('C723:I723')->applyFromArray($biru);
        $sheet->setCellValue('A725', "G2");
        $sheet->getStyle('A725')->getFont()->setBold(true);
        $sheet->setCellValue('C725', "PENDAPATAN USAHA PER KELOMPOK PELANGGAN (NET)");
        $sheet->getStyle('C725')->getFont()->setBold(true);
        $sheet->mergeCells('C725:D725');
        $sheet->setCellValue('D726', "PERTAMINA (Persero) - Kantor Pusat ==> FFS");
        $sheet->setCellValue('D727', "PERTAMINA (Persero) - Wilayah ==> FFS");
        $sheet->setCellValue('D728', "Pendapatan Anak Perusahaan");
        $sheet->setCellValue('D729', "Pendapatan Selisih Rekonsiliasi ICT Pertamina Group");
        $sheet->setCellValue('D730', "Pendapatan Entitas Asosiasi, Joint Venture dan Afiliasi ");
        $sheet->setCellValue('D731', "Pendapatan Entitas Asosiasi, Joint Venture dan Afiliasi - FFS");
        $sheet->setCellValue('D732', "Pendapatan Entitas Asosiasi, Joint Venture dan Afiliasi - KAPITASI");
        $sheet->setCellValue('D733', "Pendapatan Entitas yang Berelasi dengan BUMN");
        $sheet->setCellValue('D734', "Pendapatan Entitas yang Berelasi dengan Pemerintah");
        $sheet->setCellValue('D735', "Pendapatan Entitas yang Berelasi BPJS Kesehatan");
        $sheet->setCellValue('D736', "Pendapatan Entitas yang Berelasi Others");
        $sheet->setCellValue('D737', "Pendapatan Pihak ke III");
        $sheet->setCellValue('D738', "Pendapatan Cash");
        $sheet->setCellValue('D739', "Pendapatan Inter Segmen (PAU)");
        $sheet->setCellValue('D740', "Selisih Kapitasi");
        $sheet->setCellValue('D741', "Selisih BPJS (Kesehatan)");
        $sheet->setCellValue('D742', "Selisih BPJS (Covid-19)");
        $sheet->getStyle('D735:D738')->applyFromArray($jingga);
        $sheet->setCellValue('C743', "TOTAL PENDAPATAN USAHA PER KELOMPOK PELANGGAN(NET)");
        $sheet->getStyle('C743')->getFont()->setBold(true);
        $sheet->mergeCells('C743:D743');
        $sheet->getStyle('B743:I743')->applyFromArray($biru);
        $sheet->setCellValue('A744', "KONTROL PENDAPATAN USAHA");
        $sheet->getStyle('A744:I744')->applyFromArray($merah);
        $sheet->mergeCells('A744:D744');
        $sheet->setCellValue('A746', "G3");
        $sheet->getStyle('A746')->getFont()->setBold(true);
        $sheet->setCellValue('C746', "PENDAPATAN USAHA PER KELOMPOK LAYANAN");
        $sheet->getStyle('C746')->getFont()->setBold(true);
        $sheet->mergeCells('C746:D746');
        $sheet->setCellValue('D747', "Layanan Rawat Jalan");
        $sheet->setCellValue('E747', "701.xx.xxx");
        $sheet->setCellValue('D748', "Reduksi (Discount) Layanan Rawat Jalan ");
        $sheet->setCellValue('E748', "721.xx.xxx");
        $sheet->setCellValue('D749', "Layanan Rawat Inap");
        $sheet->setCellValue('E749', "702.xx.xxx");
        $sheet->setCellValue('D750', "Reduksi (Discount) Layanan Rawat Inap ");
        $sheet->setCellValue('E750', "722.xx.xxx");
        $sheet->setCellValue('D751', "Layanan Penunjang Medis");
        $sheet->setCellValue('E751', "703.xx.xxx");
        $sheet->setCellValue('D752', "Reduksi (Discount) Layanan Penunjang Medis");
        $sheet->setCellValue('E752', "723.xx.xxx");
        $sheet->setCellValue('D753', "Layanan Farmasi");
        $sheet->setCellValue('E753', "704.xx.xxx");
        $sheet->setCellValue('D754', "Reduksi (Discount) Layanan Farmasi");
        $sheet->setCellValue('E754', "724.xx.xxx");
        $sheet->setCellValue('D755', "Pendapatan Umum Lainnya");
        $sheet->setCellValue('E755', "705.xx.xxx");
        $sheet->setCellValue('D756', "Reduksi (Discount) Pendapatan Umum Lainnya");
        $sheet->setCellValue('E756', "725.xx.xxx");
        $sheet->setCellValue('D757', "Pendapatan Kapitasi");
        $sheet->setCellValue('E757', "706.xx.xxx");
        $sheet->setCellValue('D758', "Selisih Kapitasi");
        $sheet->setCellValue('E758', "707.xx.xxx");
        $sheet->setCellValue('D759', "Selisih BPJS (Kesehatan)");
        $sheet->setCellValue('E759', "707 02 040");
        $sheet->setCellValue('D760', "Selisih BPJS (Covid-19)");
        $sheet->setCellValue('E760', "707 02 966");
        $sheet->setCellValue('D761', "Diluar Rumah Sakit");
        $sheet->setCellValue('E761', "708.xx.xxx");
        $sheet->setCellValue('D762', "Reduksi (Discount) Diluar Rumah Sakit");
        $sheet->setCellValue('E762', "728.xx.xxx");
        $sheet->setCellValue('D763', "Pendapatan Managed Care");
        $sheet->setCellValue('E763', "740.xx.xxx");
        $sheet->setCellValue('C764', "TOTAL PENDAPATAN USAHA PER KELOMPOK LAYANAN");
        $sheet->getStyle('C764')->getFont()->setBold(true);
        $sheet->getStyle('C764:I764')->applyFromArray($biru);
        $sheet->mergeCells('C764:D764');
        $sheet->setCellValue('A766', "G4");
        $sheet->getStyle('A766')->getFont()->setBold(true);
        $sheet->setCellValue('C766', "PENDAPATAN USAHA PER JENIS PENDAPATAN");
        $sheet->getStyle('C766')->getFont()->setBold(true);
        $sheet->mergeCells('C766:D766');
        $sheet->setCellValue('B767', "G4.1");
        $sheet->getStyle('B767')->getFont()->setBold(true);
        $sheet->setCellValue('D767', "MANAGED CARE & KAPITASI");
        $sheet->getStyle('D767')->getFont()->setBold(true);
        $sheet->setCellValue('D768', "Kapitasi");
        $sheet->setCellValue('E768', "7xx.xx.010");
        $sheet->setCellValue('D769', "Selisih Kapitasi");
        $sheet->setCellValue('E769', "7xx.xx.040");
        $sheet->setCellValue('D770', "ASO");
        $sheet->setCellValue('E770', "7xx.xx.030");
        $sheet->setCellValue('D771', "Selisih BPJS (Kesehatan)");
        $sheet->setCellValue('E771', "7xx.xx.040");
        $sheet->setCellValue('D772', "Selisih BPJS (Covid-19)");
        $sheet->setCellValue('E772', "7xx.xx.966");
        $sheet->setCellValue('D773', "TOTAL MANAGED CARE & KAPITASI");
        $sheet->getStyle('D773')->getFont()->setBold(true);
        $sheet->getStyle('C773:I773')->applyFromArray($hijau);
        $sheet->setCellValue('B775', "G4.1");
        $sheet->getStyle('B775')->getFont()->setBold(true);
        $sheet->setCellValue('D775', "KONSULTASI, VISITE & TINDAKAN");
        $sheet->getStyle('D775')->getFont()->setBold(true);
        $sheet->setCellValue('D776', "Konsul Rawat Jalan - Jasa Dokter");
        $sheet->setCellValue('E776', "7xx.xx.110");
        $sheet->setCellValue('D777', "Konsul Rawat Inap - Jasa Dokter");
        $sheet->setCellValue('E777', "7xx.xx.111");
        $sheet->setCellValue('D778', "Visite Rawat Jalan - Jasa Dokter");
        $sheet->setCellValue('E778', "7xx.xx.120");
        $sheet->setCellValue('D779', "Visite Rawat Inap - Jasa Dokter");
        $sheet->setCellValue('E779', "7xx.xx.121");
        $sheet->setCellValue('D780', "Tindakan Rawat Jalan - Jasa Dokter");
        $sheet->setCellValue('E780', "7xx.xx.130");
        $sheet->getStyle('D780')->applyFromArray($jingga);
        $sheet->setCellValue('D781', "Tindakan Rawat Inap - Jasa Dokter");
        $sheet->setCellValue('E781', "7xx.xx.131");
        $sheet->setCellValue('D782', "Pemeriksaan Rawat Jalan");
        $sheet->setCellValue('E782', "7xx.xx.140");
        $sheet->setCellValue('D783', "Pemeriksaan Rawat Inap");
        $sheet->setCellValue('E783', "7xx.xx.141");
        $sheet->setCellValue('D784', "Konsul Luar Rawat Jalan");
        $sheet->setCellValue('E784', "7xx.xx.150");
        $sheet->setCellValue('D785', "Konsul Luar Rawat Inap");
        $sheet->setCellValue('E785', "7xx.xx.151");
        $sheet->setCellValue('D786', "Tindakan Penunjang Rawat Jalan");
        $sheet->setCellValue('E786', "7xx.xx.160");
        $sheet->setCellValue('D787', "Tindakan Penunjang Rawat Inap");
        $sheet->setCellValue('E787', "7xx.xx.161");
        $sheet->setCellValue('D788', "Konsul Rawat Jalan - Jasa Sarana");
        $sheet->setCellValue('E788', "7xx.xx.170");
        $sheet->setCellValue('D789', "Konsul Rawat Inap - Jasa Sarana");
        $sheet->setCellValue('E789', "7xx.xx.171");
        $sheet->setCellValue('D790', "Visite Rawat Jalan - Jasa Sarana");
        $sheet->setCellValue('E790', "7xx.xx.172");
        $sheet->setCellValue('D791', "Visite Rawat Inap - Jasa Sarana");
        $sheet->setCellValue('E791', "7xx.xx.173");
        $sheet->setCellValue('D792', "Tindakan Rawat Jalan - Jasa Sarana");
        $sheet->setCellValue('E792', "7xx.xx.174");
        $sheet->setCellValue('D793', "Tindakan Rawat Inap - Jasa Sarana");
        $sheet->setCellValue('E793', "7xx.xx.175");
        $sheet->setCellValue('D794', "Pemeriksaan Rawat Jalan - Jasa Sarana");
        $sheet->setCellValue('E794', "7xx.xx.176");
        $sheet->setCellValue('D795', "Pemeriksaan Rawat Inap - Jasa Sarana");
        $sheet->setCellValue('E795', "7xx.xx.177");
        $sheet->setCellValue('D796', "Tindakan Penunjang Rawat Jalan - Jasa Sarana");
        $sheet->setCellValue('E796', "7xx.xx.178");
        $sheet->setCellValue('D797', "Tindakan Penunjang Rawat Inap - Jasa Sarana");
        $sheet->setCellValue('E797', "7xx.xx.179");
        $sheet->setCellValue('D798', "TOTAL KONSULTASI, VISITE & TINDAKAN");
        $sheet->getStyle('D798')->getFont()->setBold(true);
        $sheet->getStyle('C798:I798')->applyFromArray($hijau);
        $sheet->setCellValue('B800', "G4.3");
        $sheet->getStyle('B800')->getFont()->setBold(true);
        $sheet->setCellValue('D800', "SEWA KAMAR");
        $sheet->getStyle('D800')->getFont()->setBold(true);
        $sheet->setCellValue('D801', "Sewa Kamar Perawatan");
        $sheet->setCellValue('E801', "7xx.xx.210");
        $sheet->setCellValue('D802', "Sewa Kamar Bedah Rawat Jalan");
        $sheet->setCellValue('E802', "7xx.xx.220");
        $sheet->setCellValue('D803', "Sewa Kamar Bedah Rawat Inap");
        $sheet->setCellValue('E803', "7xx.xx.221");
        $sheet->setCellValue('D804', "Sewa Kamar Bersalin");
        $sheet->setCellValue('E804', "7xx.xx.230");
        $sheet->setCellValue('D805', "One Day Care");
        $sheet->setCellValue('E805', "7xx.xx.240");
        $sheet->setCellValue('D806', "ICU/ICCU/NICU/PICU");
        $sheet->setCellValue('E806', "7xx.xx.250");
        $sheet->setCellValue('D807', "TOTAL SEWA KAMAR");
        $sheet->getStyle('D807')->getFont()->setBold(true);
        $sheet->getStyle('C807:I807')->applyFromArray($hijau);
        $sheet->setCellValue('B809', "G4.4");
        $sheet->getStyle('B809')->getFont()->setBold(true);
        $sheet->setCellValue('D809', "SEWA ALAT");
        $sheet->getStyle('D809')->getFont()->setBold(true);
        $sheet->setCellValue('D810', "Sewa Alat Rawat Jalan ");
        $sheet->setCellValue('E810', "7xx.xx.410");
        $sheet->setCellValue('D811', "Sewa Alat Rawat Inap ");
        $sheet->setCellValue('E811', "7xx.xx.411");
        $sheet->setCellValue('D812', "TOTAL SEWA ALAT");
        $sheet->getStyle('D812')->getFont()->setBold(true);
        $sheet->getStyle('C812:I812')->applyFromArray($hijau);
        $sheet->setCellValue('B814', "G4.5");
        $sheet->getStyle('B814')->getFont()->setBold(true);
        $sheet->setCellValue('D814', "OBAT-OBATAN");
        $sheet->getStyle('D814')->getFont()->setBold(true);
        $sheet->setCellValue('D815', "Obat Farmasi Rawat Jalan");
        $sheet->setCellValue('E815', "7xx.xx.420");
        $sheet->setCellValue('D816', "Obat Farmasi Rawat Inap ");
        $sheet->setCellValue('E816', "7xx.xx.421");
        $sheet->setCellValue('D817', "Obat produksi Rawat Jalan ");
        $sheet->setCellValue('E817', "7xx.xx.422");
        $sheet->setCellValue('D818', "Obat produksi Rawat Inap ");
        $sheet->setCellValue('E818', "7xx.xx.423");
        $sheet->setCellValue('D819', "Apotik Luar");
        $sheet->setCellValue('E819', "7xx.xx.440");
        $sheet->setCellValue('D820', "Obat Non Resep Rawat Jalan");
        $sheet->setCellValue('E820', "7xx.xx.510");
        $sheet->setCellValue('D821', "Obat Non Resep Rawat Inap ");
        $sheet->setCellValue('E821', "7xx.xx.511");
        $sheet->getStyle('D821')->applyFromArray($jingga);
        $sheet->setCellValue('D822', "TOTAL OBAT-OBATAN");
        $sheet->getStyle('D822')->getFont()->setBold(true);
        $sheet->getStyle('C822:I822')->applyFromArray($hijau);
        $sheet->setCellValue('B824', "G4.6");
        $sheet->getStyle('B824')->getFont()->setBold(true);
        $sheet->setCellValue('D824', "MEDICAL SUPPLY");
        $sheet->getStyle('D824')->getFont()->setBold(true);
        $sheet->setCellValue('D825', "Medical supplies Rawat Jalan");
        $sheet->setCellValue('E825', "7xx.xx.430");
        $sheet->setCellValue('D826', "Medical supplies Rawat Inap");
        $sheet->setCellValue('E826', "7xx.xx.431");
        $sheet->setCellValue('D827', "Medical supplies Non Resep Rawat Jalan");
        $sheet->setCellValue('E827', "7xx.xx.520");
        $sheet->setCellValue('D828', "Medical supplies Non Resep Rawat Inap");
        $sheet->setCellValue('E828', "7xx.xx.521");
        $sheet->setCellValue('D829', "TOTAL MEDICAL SUPPLY");
        $sheet->getStyle('D829')->getFont()->setBold(true);
        $sheet->getStyle('C829:I829')->applyFromArray($hijau);
        $sheet->setCellValue('B831', "G4.7");
        $sheet->getStyle('B831')->getFont()->setBold(true);
        $sheet->setCellValue('D831', "PENUNJANG MEDIS");
        $sheet->getStyle('D831')->getFont()->setBold(true);
        $sheet->setCellValue('D832', "Fisioterapi Rawat Jalan");
        $sheet->setCellValue('E832', "7xx.xx.310");
        $sheet->setCellValue('D833', "Fisioterapi Rawat Inap");
        $sheet->setCellValue('E833', "7xx.xx.311");
        $sheet->setCellValue('D834', "Patologi/Sitologi Rawat Jalan");
        $sheet->setCellValue('E834', "7xx.xx.320");
        $sheet->setCellValue('D835', "Patologi/Sitologi Rawat Inap");
        $sheet->setCellValue('E835', "7xx.xx.321");
        $sheet->setCellValue('D836', "Kedokteran Nuklir Rawat Jalan");
        $sheet->setCellValue('E836', "7xx.xx.330");
        $sheet->setCellValue('D837', "Kedokteran Nuklir Rawat Inap");
        $sheet->setCellValue('E837', "7xx.xx.331");
        $sheet->setCellValue('D838', "Kedokteran Nuklir Luar");
        $sheet->setCellValue('E838', "7xx.xx.332");
        $sheet->setCellValue('D839', "MCU (insite)");
        $sheet->setCellValue('E839', "7xx.xx.340");
        $sheet->setCellValue('D840', "Haemodialisa");
        $sheet->setCellValue('E840', "7xx.xx.350");
        $sheet->setCellValue('D841', "Anaesthesi Rawat Jalan");
        $sheet->setCellValue('E841', "7xx.xx.530");
        $sheet->setCellValue('D842', "Anaesthesi Rawat Inap");
        $sheet->setCellValue('E842', "7xx.xx.531");
        $sheet->setCellValue('D843', "Radioterapi Rawat Jalan");
        $sheet->setCellValue('E843', "7xx.xx.710");
        $sheet->setCellValue('D844', "Radioterapi Rawat Inap");
        $sheet->setCellValue('E844', "7xx.xx.711");
        $sheet->setCellValue('D845', "Radioterapi Luar");
        $sheet->setCellValue('E845', "7xx.xx.712");
        $sheet->setCellValue('D846', "Radiodiagnostik Rawat Jalan");
        $sheet->setCellValue('E846', "7xx.xx.720");
        $sheet->setCellValue('D847', "Radiodiagnostik Rawat Inap");
        $sheet->setCellValue('E847', "7xx.xx.721");
        $sheet->setCellValue('D848', "Radiodiagnostik Luar");
        $sheet->setCellValue('E848', "7xx.xx.722");
        $sheet->setCellValue('D849', "MRI RJ");
        $sheet->setCellValue('E849', "7xx.xx.723");
        $sheet->setCellValue('D850', "MRI RI");
        $sheet->setCellValue('E850', "7xx.xx.724");
        $sheet->setCellValue('D851', "CT SCANNING RJ");
        $sheet->setCellValue('E851', "7xx.xx.725");
        $sheet->setCellValue('D852', "CT SCANNING RI");
        $sheet->setCellValue('E852', "7xx.xx.726");
        $sheet->setCellValue('D853', "USG RJ");
        $sheet->setCellValue('E853', "7xx.xx.727");
        $sheet->setCellValue('D854', "USG RI");
        $sheet->setCellValue('E854', "7xx.xx.728");
        $sheet->setCellValue('D855', "BONE MATERIAL DENSITOMETRI RJ");
        $sheet->setCellValue('E855', "7xx.xx.740");
        $sheet->setCellValue('D856', "BONE MATERIAL DENSITOMETRI RI");
        $sheet->setCellValue('E856', "7xx.xx.741");
        $sheet->setCellValue('D857', "Laboratorium klinik Rawat Jalan");
        $sheet->setCellValue('E857', "7xx.xx.810");
        $sheet->setCellValue('D858', "Laboratorium klinik Rawat Inap");
        $sheet->setCellValue('E858', "7xx.xx.811");
        $sheet->setCellValue('D859', "Bank Darah RJ");
        $sheet->setCellValue('E859', "7xx.xx.820");
        $sheet->setCellValue('D860', "Bank Darah RI");
        $sheet->setCellValue('E860', "7xx.xx.821");
        $sheet->setCellValue('D861', "Lab Rujukan/ Luar Rawat Jalan");
        $sheet->setCellValue('E861', "7xx.xx.830");
        $sheet->setCellValue('D862', "Lab Rujukan/ Luar Rawat Inap");
        $sheet->setCellValue('E862', "7xx.xx.831");
        $sheet->setCellValue('D863', "Laboratorium Patologi Anatomi R. Jalan");
        $sheet->setCellValue('E863', "7xx.xx.840");
        $sheet->setCellValue('D864', "Laboratorium Patologi Anatomi R. Inap");
        $sheet->setCellValue('E864', "7xx.xx.841");
        $sheet->getStyle('D859')->applyFromArray($jingga);
        $sheet->getStyle('D862')->applyFromArray($jingga);
        $sheet->setCellValue('D865', "TOTAL PENUNJANG MEDIS");
        $sheet->getStyle('D865')->getFont()->setBold(true);
        $sheet->getStyle('C865:I865')->applyFromArray($hijau);
        $sheet->setCellValue('B867', "G4.8");
        $sheet->getStyle('B867')->getFont()->setBold(true);
        $sheet->setCellValue('D867', "PENDAPATAN USAHA LAINNYA");
        $sheet->getStyle('D867')->getFont()->setBold(true);
        $sheet->setCellValue('D868', "Kamar Jenazah Rawat Jalan");
        $sheet->setCellValue('E868', "7xx.xx.610");
        $sheet->setCellValue('D869', "Kamar Jenazah Rawat Inap");
        $sheet->setCellValue('E869', "7xx.xx.611");
        $sheet->setCellValue('D870', "Ambulance Rawat Jalan");
        $sheet->setCellValue('E870', "7xx.xx.620");
        $sheet->setCellValue('D871', "Ambulance Rawat Inap");
        $sheet->setCellValue('E871', "7xx.xx.621");
        $sheet->setCellValue('D872', "Administrasi Medis Rawat Jalan");
        $sheet->setCellValue('E872', "7xx.xx.910");
        $sheet->setCellValue('D873', "Administrasi Medis Rawat Inap");
        $sheet->setCellValue('E873', "7xx.xx.911");
        $sheet->setCellValue('D874', "Extra fooding");
        $sheet->setCellValue('E874', "7xx.xx.920");
        $sheet->setCellValue('D875', "Oksigen Rawat Jalan");
        $sheet->setCellValue('E875', "7xx.xx.940");
        $sheet->setCellValue('D876', "Oksigen Rawat Inap");
        $sheet->setCellValue('E876', "7xx.xx.941");
        $sheet->setCellValue('D877', "Oksigen UGD");
        $sheet->setCellValue('E877', "7xx.xx.942");
        $sheet->setCellValue('D878', "Bakti Sosial (PKBL)");
        $sheet->setCellValue('E878', "7xx.xx.943");
        $sheet->setCellValue('D879', "Incenerator");
        $sheet->setCellValue('E879', "7xx.xx.957");
        $sheet->setCellValue('D880', "Laundry");
        $sheet->setCellValue('E880', "7xx.xx.972");
        $sheet->setCellValue('D881', "CSR (Corporate Social Responsibility)");
        $sheet->setCellValue('E881', "7xx.xx.947");
        $sheet->setCellValue('D882', "TOTAL PENDAPATAN USAHA LAINNYA");
        $sheet->getStyle('D882')->getFont()->setBold(true);
        $sheet->getStyle('C882:I882')->applyFromArray($hijau);
        $sheet->setCellValue('B884', "G4.9");
        $sheet->getStyle('B884')->getFont()->setBold(true);
        $sheet->setCellValue('D884', "PENDAPATAN USAHA DILUAR RUMAH SAKIT");
        $sheet->getStyle('D884')->getFont()->setBold(true);
        $sheet->setCellValue('D885', "MCU Onsite");
        $sheet->setCellValue('E885', "7xx.xx.341");
        $sheet->setCellValue('D886', "MCU Turn Around");
        $sheet->setCellValue('E886', "7xx.xx.342");
        $sheet->setCellValue('D887', "Daily Check Up");
        $sheet->setCellValue('E887', "7xx.xx.343");
        $sheet->setCellValue('D888', "Sewa Alat Onsite");
        $sheet->setCellValue('E888', "7xx.xx.412");
        $sheet->setCellValue('D889', "Obat Farmasi Onsite");
        $sheet->setCellValue('E889', "7xx.xx.424");
        $sheet->setCellValue('D890', "Ambulance Onsite");
        $sheet->setCellValue('E890', "7xx.xx.622");
        $sheet->setCellValue('D891', "Fooging");
        $sheet->setCellValue('E891', "7xx.xx.990");
        $sheet->setCellValue('D892', "Spraying");
        $sheet->setCellValue('E892', "7xx.xx.991");
        $sheet->setCellValue('D893', "Termite Kontrol");
        $sheet->setCellValue('E893', "7xx.xx.992");
        $sheet->setCellValue('D894', "Pest Kontrol");
        $sheet->setCellValue('E894', "7xx.xx.993");
        $sheet->setCellValue('D895', "Evakuasi Medis");
        $sheet->setCellValue('E895', "7xx.xx.946");
        $sheet->setCellValue('D896', "On Site Klinik");
        $sheet->setCellValue('E896', "7xx.xx.948");
        $sheet->setCellValue('D897', "Medical Onsite");
        $sheet->setCellValue('E897', "7xx.xx.949");
        $sheet->setCellValue('D898', "First Aid Trainning");
        $sheet->setCellValue('E898', "7xx.xx.994");
        $sheet->setCellValue('D899', "Health Risk Assessment (HRA)");
        $sheet->setCellValue('E899', "7xx.xx.995");
        $sheet->setCellValue('D900', "Promotif Program (Corporate Wellness Program)");
        $sheet->setCellValue('E900', "7xx.xx.996");
        $sheet->setCellValue('D901', "TOTAL PENDAPATAN USAHA LAINNYA");
        $sheet->getStyle('D901')->getFont()->setBold(true);
        $sheet->getStyle('C901:I901')->applyFromArray($hijau);
        $sheet->setCellValue('C903', "TOTAL PENDAPATAN USAHA PER JENIS PENDAPATAN)");
        $sheet->getStyle('C903')->getFont()->setBold(true);
        $sheet->mergeCells('C903:D903');
        $sheet->getStyle('B903:I903')->applyFromArray($biru);
        $sheet->setCellValue('A904', "KONTROL PENDAPATAN USAHA");
        $sheet->getStyle('A904:I904')->applyFromArray($merah);
        $sheet->mergeCells('A904:D904');
        $sheet->setCellValue('A905', "KONTROL PENDAPATAN USAHA (PENDAPATAN LAYANAN VS PELANGGAN)");
        $sheet->getStyle('A905:I905')->applyFromArray($merah);
        $sheet->mergeCells('A905:D905');

        $sheet->setCellValue('A907', "H");
        $sheet->getStyle('A907')->getFont()->setBold(true);
        $sheet->setCellValue('C907', "BEBAN USAHA");
        $sheet->getStyle('C907')->getFont()->setBold(true);
        $sheet->mergeCells('C907:D907');
        $sheet->setCellValue('A908', "H1");
        $sheet->getStyle('A908')->getFont()->setBold(true);
        $sheet->setCellValue('C908', "BEBAN USAHA PER KELOMPOK LAYANAN");
        $sheet->getStyle('C908')->getFont()->setBold(true);
        $sheet->mergeCells('C908:D908');
        $sheet->setCellValue('D909', "Layanan Rawat Jalan");
        $sheet->setCellValue('E909', "801.xx.xxx");
        $sheet->setCellValue('D910', "Layanan Rawat Inap");
        $sheet->setCellValue('E910', "802.xx.xxx");
        $sheet->setCellValue('D911', "Layanan Penunjang Medis");
        $sheet->setCellValue('E911', "803.xx.xxx");
        $sheet->setCellValue('D912', "Layanan Farmasi");
        $sheet->setCellValue('E912', "804.xx.xxx");
        $sheet->setCellValue('D913', "Beban Umum Lainnya");
        $sheet->setCellValue('E913', "805.xx.xxx");
        $sheet->setCellValue('D914', "Beban Kapitasi");
        $sheet->setCellValue('E914', "806.xx.xxx");
        $sheet->setCellValue('D915', "Beban Usaha Diluar RS");
        $sheet->setCellValue('E915', "807.xx.xxx");
        $sheet->setCellValue('D916', "Beban Pelayanan Keperawatan");
        $sheet->setCellValue('E916', "808.xx.xxx");
        $sheet->setCellValue('D917', "Beban Staf Medis Fungsional");
        $sheet->setCellValue('E917', "822.xx.xxx");
        $sheet->setCellValue('D918', "Beban Managed Care");
        $sheet->setCellValue('E918', "823.xx.xxx");
        $sheet->setCellValue('D919', "Beban Manajemen");
        $sheet->setCellValue('E919', "831.xx.xxx");
        $sheet->setCellValue('D920', "Beban Penunjang Operasional");
        $sheet->setCellValue('E920', "832.xx.xxx");
        $sheet->setCellValue('C921', "TOTAL BEBAN USAHA PER KELOMPOK LAYANAN");
        $sheet->getStyle('C921')->getFont()->setBold(true);
        $sheet->mergeCells('C921:D921');
        $sheet->getStyle('B921:I921')->applyFromArray($biru);
        $sheet->setCellValue('A923', "H2");
        $sheet->getStyle('A923')->getFont()->setBold(true);
        $sheet->setCellValue('C923', "BEBAN USAHA PER JENIS BIAYA");
        $sheet->getStyle('C923')->getFont()->setBold(true);
        $sheet->mergeCells('C923:D923');
        $sheet->setCellValue('B924', "H2.1  ");
        $sheet->getStyle('B924')->getFont()->setBold(true);
        $sheet->setCellValue('D924', "BIAYA PEKERJA");
        $sheet->getStyle('D924')->getFont()->setBold(true);
        $sheet->setCellValue('D925', "Upah tetap");
        $sheet->setCellValue('E925', "8xx.xx.101");
        $sheet->setCellValue('D926', "Upah PWT");
        $sheet->setCellValue('E926', "8xx.xx.102");
        $sheet->setCellValue('D927', "Tunjangan Jabatan ");
        $sheet->setCellValue('E927', "8xx.xx.103");
        $sheet->setCellValue('D928', "Tunjangan daerah");
        $sheet->setCellValue('E928', "8xx.xx.104");
        $sheet->setCellValue('D929', "Tunjangan hari raya ");
        $sheet->setCellValue('E929', "8xx.xx.105");
        $sheet->setCellValue('D930', "Tunjangan Perumahan Pekerja");
        $sheet->setCellValue('E930', "8xx.xx.106");
        $sheet->setCellValue('D931', "Tunjangan Fungsional ");
        $sheet->setCellValue('E931', "8xx.xx.107");
        $sheet->setCellValue('D932', "Tunjangan Radiasi ");
        $sheet->setCellValue('E932', "8xx.xx.108");
        $sheet->setCellValue('D933', "Tunjangan Dokter Jaga Ruangan");
        $sheet->setCellValue('E933', "8xx.xx.109");
        $sheet->setCellValue('D934', "Tunjangan Transport ");
        $sheet->setCellValue('E934', "8xx.xx.110");
        $sheet->setCellValue('D935', "Tunjangan Kasir");
        $sheet->setCellValue('E935', "8xx.xx.111");
        $sheet->setCellValue('D936', "Tunjangan Pajak Penghasilan ");
        $sheet->setCellValue('E936', "8xx.xx.112");
        $sheet->setCellValue('D937', "Honor Dokter ");
        $sheet->setCellValue('E937', "8xx.xx.113");
        $sheet->setCellValue('D938', "Insentif Praktek Sore ");
        $sheet->setCellValue('E938', "8xx.xx.114");
        $sheet->setCellValue('D939', "Imbalan Jasa Pelayanan ");
        $sheet->setCellValue('E939', "8xx.xx.115");
        $sheet->setCellValue('D940', "Imbalan Pasca Kerja ");
        $sheet->setCellValue('E940', "8xx.xx.116");
        $sheet->setCellValue('D941', "Iuran Jamsostek");
        $sheet->setCellValue('E941', "8xx.xx.117");
        $sheet->setCellValue('D942', "Iuran Dana Pensiun (DPLK)");
        $sheet->setCellValue('E942', "8xx.xx.118");
        $sheet->setCellValue('D943', "Bantuan Kehadiran");
        $sheet->setCellValue('E943', "8xx.xx.119");
        $sheet->setCellValue('D944', "Uang Shift");
        $sheet->setCellValue('E944', "8xx.xx.120");
        $sheet->setCellValue('D945', "Uang makan /On call");
        $sheet->setCellValue('E945', "8xx.xx.121");
        $sheet->setCellValue('D946', "Uang Lembur");
        $sheet->setCellValue('E946', "8xx.xx.122");
        $sheet->setCellValue('D947', "Uang Cuti");
        $sheet->setCellValue('E947', "8xx.xx.123");
        $sheet->setCellValue('D948', "Tabungan Kesehatan");
        $sheet->setCellValue('E948', "8xx.xx.124");
        $sheet->setCellValue('D949', "Magang Akper");
        $sheet->setCellValue('E949', "8xx.xx.125");
        $sheet->setCellValue('D950', "Jasa Produksi (Bonus)  ");
        $sheet->setCellValue('E950', "8xx.xx.126");
        $sheet->setCellValue('D951', "Biaya Pesangon");
        $sheet->setCellValue('E951', "8xx.xx.127");
        $sheet->setCellValue('D952', "Honor (all in)");
        $sheet->setCellValue('E952', "8xx.xx.128");
        $sheet->setCellValue('D953', "Ulang Tahun Dinas ");
        $sheet->setCellValue('E953', "8xx.xx.129");
        $sheet->setCellValue('D954', "Imbalan Jasa Dokter");
        $sheet->setCellValue('E954', "8xx.xx.130");
        $sheet->setCellValue('D955', "Tantiem");
        $sheet->setCellValue('E955', "8xx.xx.131");
        $sheet->setCellValue('D956', "Perjalanan Dinas ");
        $sheet->setCellValue('E956', "8xx.xx.812");
        $sheet->setCellValue('D957', "Pendidikan (Simposium/Training/Kursus)");
        $sheet->setCellValue('E957', "8xx.xx.813");
        $sheet->setCellValue('D958', "Pengobatan/Kacamata ");
        $sheet->setCellValue('E958', "8xx.xx.817");
        $sheet->getStyle('D934')->applyFromArray($jingga);
        $sheet->getStyle('D944')->applyFromArray($jingga);
        $sheet->setCellValue('D959', "TOTAL BIAYA PEKERJA");
        $sheet->getStyle('D959')->getFont()->setBold(true);
        $sheet->getStyle('C959:I959')->applyFromArray($hijau);
        $sheet->setCellValue('B961', "H2.2");
        $sheet->getStyle('B961')->getFont()->setBold(true);
        $sheet->setCellValue('D961', "BIAYA OPERASIONAL (MATERIAL OBAT)");
        $sheet->getStyle('D961')->getFont()->setBold(true);
        $sheet->setCellValue('D962', "Obat obatan jadi");
        $sheet->setCellValue('E962', "8xx.xx.208");
        $sheet->setCellValue('D963', "Bahan Obat");
        $sheet->setCellValue('E963', "8xx.xx.209");
        $sheet->setCellValue('D964', "Susu");
        $sheet->setCellValue('E964', "8xx.xx.210");
        $sheet->setCellValue('D965', "Sera /Vaksin");
        $sheet->setCellValue('E965', "8xx.xx.211");
        $sheet->setCellValue('D966', "Infuse");
        $sheet->setCellValue('E966', "8xx.xx.212");
        $sheet->setCellValue('D967', "Obat Produksi ");
        $sheet->setCellValue('E967', "8xx.xx.240");
        $sheet->setCellValue('D968', "Obat Inhealth ");
        $sheet->setCellValue('E968', "8xx.xx.241");
        $sheet->setCellValue('D969', "Obat BPJS");
        $sheet->setCellValue('E969', "8xx.xx.244");
        $sheet->setCellValue('D970', "TOTAL BIAYA OPERASIONAL (MATERIAL OBAT)");
        $sheet->getStyle('D970')->getFont()->setBold(true);
        $sheet->getStyle('C970:I970')->applyFromArray($hijau);
        $sheet->setCellValue('B972', "H2.3");
        $sheet->getStyle('B972')->getFont()->setBold(true);
        $sheet->setCellValue('D972', "BIAYA OPERASIONAL (MATERIAL ALAT KESEHATAN)");
        $sheet->getStyle('D972')->getFont()->setBold(true);
        $sheet->setCellValue('D973', "Embalage");
        $sheet->setCellValue('E973', "8xx.xx.205");
        $sheet->setCellValue('D974', "Alat Suntik");
        $sheet->setCellValue('E974', "8xx.xx.213");
        $sheet->setCellValue('D975', "Bahan Pembalut");
        $sheet->setCellValue('E975', "8xx.xx.214");
        $sheet->setCellValue('D976', "Benang bedah dan keperluan OK");
        $sheet->setCellValue('E976', "8xx.xx.215");
        $sheet->setCellValue('D977', "Glass ware");
        $sheet->setCellValue('E977', "8xx.xx.216");
        $sheet->setCellValue('D978', "Instrumen Kedokteran");
        $sheet->setCellValue('E978', "8xx.xx.217");
        $sheet->setCellValue('D979', "Barang keperluan gigi");
        $sheet->setCellValue('E979', "8xx.xx.218");
        $sheet->setCellValue('D980', "Barang keperluan orthopedi");
        $sheet->setCellValue('E980', "8xx.xx.219");
        $sheet->setCellValue('D981', "Bedah jantung & Pace maker");
        $sheet->setCellValue('E981', "8xx.xx.220");
        $sheet->setCellValue('D982', "Electrode, ECG Paper,Jelly");
        $sheet->setCellValue('E982', "8xx.xx.221");
        $sheet->setCellValue('D983', "Haemodialise");
        $sheet->setCellValue('E983', "8xx.xx.222");
        $sheet->setCellValue('D984', "X Ray Film");
        $sheet->setCellValue('E984', "8xx.xx.223");
        $sheet->setCellValue('D985', "Radio Isotop");
        $sheet->setCellValue('E985', "8xx.xx.224");
        $sheet->setCellValue('D986', "Kimia Laboratorium");
        $sheet->setCellValue('E986', "8xx.xx.225");
        $sheet->setCellValue('D987', "Alkes Inhealth");
        $sheet->setCellValue('E987', "8xx.xx.242");
        $sheet->setCellValue('D988', "Beras Organic");
        $sheet->setCellValue('E988', "8xx.xx.243");
        $sheet->setCellValue('D989', "Alkes BPJS");
        $sheet->setCellValue('E989', "8xx.xx.245");
        $sheet->getStyle('D982')->applyFromArray($jingga);
        $sheet->setCellValue('D990', "TOTAL BIAYA OPERASIONAL (MATERIAL ALAT KESEHATAN)");
        $sheet->getStyle('D990')->getFont()->setBold(true);
        $sheet->getStyle('C990:I990')->applyFromArray($hijau);
        $sheet->setCellValue('B992', "H2.4");
        $sheet->getStyle('B992')->getFont()->setBold(true);
        $sheet->setCellValue('D992', "BIAYA OPERASIONAL (MATERIAL UMUM LAINNYA)");
        $sheet->getStyle('D992')->getFont()->setBold(true);
        $sheet->setCellValue('D993', "Pakaian Bedah");
        $sheet->setCellValue('E993', "8xx.xx.201");
        $sheet->setCellValue('D994', "Pakaian Pasien");
        $sheet->setCellValue('E994', "8xx.xx.202");
        $sheet->setCellValue('D995', "Linen Perawatan/ Bed Cover");
        $sheet->setCellValue('E995', "8xx.xx.203");
        $sheet->setCellValue('D996', "Micro film");
        $sheet->setCellValue('E996', "8xx.xx.204");
        $sheet->setCellValue('D997', "Bahan Insektisida & Rodent Control");
        $sheet->setCellValue('E997', "8xx.xx.206");
        $sheet->setCellValue('D998', "Bahan makanan");
        $sheet->setCellValue('E998', "8xx.xx.207");
        $sheet->setCellValue('D999', "BBM Bensin, Solar & Pelumas");
        $sheet->setCellValue('E999', "8xx.xx.226");
        $sheet->setCellValue('D1000', "Gas Medis");
        $sheet->setCellValue('E1000', "8xx.xx.227");
        $sheet->setCellValue('D1001', "Bahan Kimia Pembersih");
        $sheet->setCellValue('E1001', "8xx.xx.228");
        $sheet->setCellValue('D1002', "Material K3 LL");
        $sheet->setCellValue('E1002', "8xx.xx.229");
        $sheet->setCellValue('D1003', "Material Pemasaran");
        $sheet->setCellValue('E1003', "8xx.xx.230");
        $sheet->setCellValue('D1004', "Komite Medik");
        $sheet->setCellValue('E1004', "8xx.xx.231");
        $sheet->setCellValue('D1005', "Komputer Supplies");
        $sheet->setCellValue('E1005', "8xx.xx.232");
        $sheet->setCellValue('D1006', "Barang Pecah Belah");
        $sheet->setCellValue('E1006', "8xx.xx.233");
        $sheet->setCellValue('D1007', "Rumah Tangga Kantor (RTK)");
        $sheet->setCellValue('E1007', "8xx.xx.234");
        $sheet->setCellValue('D1008', "Alat Tulis Kantor (ATK)");
        $sheet->setCellValue('E1008', "8xx.xx.235");
        $sheet->setCellValue('D1009', "Barang Tehnik Listrik & Mekanik");
        $sheet->setCellValue('E1009', "8xx.xx.236");
        $sheet->setCellValue('D1010', "Barang Tehnik Sipil");
        $sheet->setCellValue('E1010', "8xx.xx.237");
        $sheet->setCellValue('D1011', "Barang Tehnik Medical Equipment");
        $sheet->setCellValue('E1011', "8xx.xx.238");
        $sheet->setCellValue('D1012', "Barang Telekomunikasi dan elektronika");
        $sheet->setCellValue('E1012', "8xx.xx.239");
        $sheet->setCellValue('D1013', "Konsul Luar");
        $sheet->setCellValue('E1013', "8xx.xx.840");
        $sheet->setCellValue('D1014', "KLB (Covid-19)");
        $sheet->setCellValue('E1014', "8xx.xx.866");
        $sheet->setCellValue('D1015', "TOTAL BIAYA OPERASIONAL (MATERIAL UMUM LAINNYA)");
        $sheet->getStyle('D1015')->getFont()->setBold(true);
        $sheet->getStyle('C1015:I1015')->applyFromArray($hijau);
        $sheet->setCellValue('B1017', "H2.5");
        $sheet->getStyle('B1017')->getFont()->setBold(true);
        $sheet->setCellValue('D1017', "BIAYA KAPITASI");
        $sheet->getStyle('D1017')->getFont()->setBold(true);
        $sheet->setCellValue('D1018', "Biaya Pensiunan");
        $sheet->setCellValue('E1018', "8xx.xx.001");
        $sheet->setCellValue('D1019', "Biaya PISA");
        $sheet->setCellValue('E1019', "8xx.xx.002");
        $sheet->setCellValue('D1020', "TOTAL BIAYA KAPITASI");
        $sheet->getStyle('D1020')->getFont()->setBold(true);
        $sheet->getStyle('C1020:I1020')->applyFromArray($hijau);
        $sheet->setCellValue('B1022', "H2.6");
        $sheet->getStyle('B1022')->getFont()->setBold(true);
        $sheet->setCellValue('D1022', "BIAYA PEMELIHARAAN");
        $sheet->getStyle('D1022')->getFont()->setBold(true);
        $sheet->setCellValue('D1023', "Gedung & Bangunan");
        $sheet->setCellValue('E1023', "8xx.xx.301");
        $sheet->setCellValue('D1024', "Kendaraan dan Ambulance");
        $sheet->setCellValue('E1024', "8xx.xx.302");
        $sheet->setCellValue('D1025', "Alat Telekomunikasi");
        $sheet->setCellValue('E1025', "8xx.xx.303");
        $sheet->setCellValue('D1026', "Perlengkapan Kantor ");
        $sheet->setCellValue('E1026', "8xx.xx.304");
        $sheet->setCellValue('D1027', "Komputer");
        $sheet->setCellValue('E1027', "8xx.xx.305");
        $sheet->setCellValue('D1028', "Alat Listrik");
        $sheet->setCellValue('E1028', "8xx.xx.306");
        $sheet->setCellValue('D1029', "Alat Mekanik");
        $sheet->setCellValue('E1029', "8xx.xx.307");
        $sheet->setCellValue('D1030', "Alat AC");
        $sheet->setCellValue('E1030', "8xx.xx.308");
        $sheet->setCellValue('D1031', "Alat Lift");
        $sheet->setCellValue('E1031', "8xx.xx.309");
        $sheet->setCellValue('D1032', "Alat Medis");
        $sheet->setCellValue('E1032', "8xx.xx.310");
        $sheet->setCellValue('D1033', "Alat Rumah Tangga");
        $sheet->setCellValue('E1033', "8xx.xx.311");
        $sheet->setCellValue('D1034', "Kebersihan gedung & halaman");
        $sheet->setCellValue('E1034', "8xx.xx.312");
        $sheet->setCellValue('D1035', "Barang K3 LL");
        $sheet->setCellValue('E1035', "8xx.xx.313");
        $sheet->getStyle('D1032')->applyFromArray($jingga);
        $sheet->setCellValue('D1036', "TOTAL BIAYA PEMELIHARAAN");
        $sheet->getStyle('D1036')->getFont()->setBold(true);
        $sheet->getStyle('C1036:I1036')->applyFromArray($hijau);
        $sheet->setCellValue('B1038', "H2.7");
        $sheet->getStyle('B1038')->getFont()->setBold(true);
        $sheet->setCellValue('D1038', "BIAYA PENYUSUTAN & AMORTISASI");
        $sheet->getStyle('D1038')->getFont()->setBold(true);
        $sheet->setCellValue('D1039', "Tanah");
        $sheet->setCellValue('E1039', "8xx.xx.401");
        $sheet->setCellValue('D1040', "Gedung dan Bangunan");
        $sheet->setCellValue('E1040', "8xx.xx.402");
        $sheet->setCellValue('D1041', "Kendaraan dan Ambulance");
        $sheet->setCellValue('E1041', "8xx.xx.403");
        $sheet->setCellValue('D1042', "Alat Telekomunikasi");
        $sheet->setCellValue('E1042', "8xx.xx.404");
        $sheet->setCellValue('D1043', "Peralatan Kantor");
        $sheet->setCellValue('E1043', "8xx.xx.405");
        $sheet->setCellValue('D1044', "Komputer");
        $sheet->setCellValue('E1044', "8xx.xx.406");
        $sheet->setCellValue('D1045', "Alat Listrik");
        $sheet->setCellValue('E1045', "8xx.xx.407");
        $sheet->setCellValue('D1046', "Alat Mekanik");
        $sheet->setCellValue('E1046', "8xx.xx.408");
        $sheet->setCellValue('D1047', "Alat AC");
        $sheet->setCellValue('E1047', "8xx.xx.409");
        $sheet->setCellValue('D1048', "Alat Lift");
        $sheet->setCellValue('E1048', "8xx.xx.410");
        $sheet->setCellValue('D1049', "Alat Medis");
        $sheet->setCellValue('E1049', "8xx.xx.411");
        $sheet->setCellValue('D1050', "Tanah - sewa");
        $sheet->setCellValue('E1050', "8xx.xx.421");
        $sheet->setCellValue('D1051', "Gedung dan Bangunan - sewa");
        $sheet->setCellValue('E1051', "8xx.xx.422");
        $sheet->setCellValue('D1052', "Kendaraan dan Ambulance - sewa");
        $sheet->setCellValue('E1052', "8xx.xx.423");
        $sheet->setCellValue('D1053', "Alat Telekomunikasi - sewa");
        $sheet->setCellValue('E1053', "8xx.xx.424");
        $sheet->setCellValue('D1054', "Peralatan Kantor - sewa");
        $sheet->setCellValue('E1054', "8xx.xx.425");
        $sheet->setCellValue('D1055', "Komputer - sewa");
        $sheet->setCellValue('E1055', "8xx.xx.426");
        $sheet->setCellValue('D1056', "Alat Listrik - sewa");
        $sheet->setCellValue('E1056', "8xx.xx.427");
        $sheet->setCellValue('D1057', "Alat Mekanik - sewa");
        $sheet->setCellValue('E1057', "8xx.xx.428");
        $sheet->setCellValue('D1058', "Alat AC - sewa");
        $sheet->setCellValue('E1058', "8xx.xx.429");
        $sheet->setCellValue('D1059', "Alat Lift - sewa");
        $sheet->setCellValue('E1059', "8xx.xx.430");
        $sheet->setCellValue('D1060', "Alat Medis - sewa");
        $sheet->setCellValue('E1060', "8xx.xx.431");
        $sheet->setCellValue('D1061', "Aktiva Tidak Berwujud");
        $sheet->setCellValue('E1061', "8xx.xx.413");
        $sheet->setCellValue('D1062', "Property Investasi -Tanah");
        $sheet->setCellValue('E1062', "8xx.xx.441");
        $sheet->setCellValue('D1063', "Property Investasi - Gedung & Bangunan");
        $sheet->setCellValue('E1063', "8xx.xx.442");
        $sheet->setCellValue('D1064', "TOTAL BIAYA PENYUSUTAN & AMORTISASI");
        $sheet->getStyle('D1064')->getFont()->setBold(true);
        $sheet->getStyle('C1064:I1064')->applyFromArray($hijau);
        $sheet->setCellValue('B1066', "H2.8");
        $sheet->getStyle('B1066')->getFont()->setBold(true);
        $sheet->setCellValue('D1066', "BIAYA ASURANSI");
        $sheet->getStyle('D1066')->getFont()->setBold(true);
        $sheet->setCellValue('D1067', "Asuransi Profesi");
        $sheet->setCellValue('E1067', "8xx.xx.501");
        $sheet->setCellValue('D1068', "Gedung & Bangunan ");
        $sheet->setCellValue('E1068', "8xx.xx.511");
        $sheet->setCellValue('D1069', "Kendaraan dan Ambulance");
        $sheet->setCellValue('E1069', "8xx.xx.512");
        $sheet->setCellValue('D1070', "Alat Telekomunikasi ");
        $sheet->setCellValue('E1070', "8xx.xx.513");
        $sheet->setCellValue('D1071', "Alat Kantor & Komputer ");
        $sheet->setCellValue('E1071', "8xx.xx.514");
        $sheet->setCellValue('D1072', "Alat Listrik ");
        $sheet->setCellValue('E1072', "8xx.xx.515");
        $sheet->setCellValue('D1073', "Alat mekanik ");
        $sheet->setCellValue('E1073', "8xx.xx.516");
        $sheet->setCellValue('D1074', "Alat AC ");
        $sheet->setCellValue('E1074', "8xx.xx.517");
        $sheet->setCellValue('D1075', "Alat Lift ");
        $sheet->setCellValue('E1075', "8xx.xx.518");
        $sheet->setCellValue('D1076', "Alat Medis ");
        $sheet->setCellValue('E1076', "8xx.xx.519");
        $sheet->setCellValue('D1077', "TOTAL BIAYA ASURANSI");
        $sheet->getStyle('D1077')->getFont()->setBold(true);
        $sheet->getStyle('C1077:I1077')->applyFromArray($hijau);
        $sheet->setCellValue('B1079', "H2.9");
        $sheet->getStyle('B1079')->getFont()->setBold(true);
        $sheet->setCellValue('D1079', "BIAYA SEWA/KONTRAK");
        $sheet->getStyle('D1079')->getFont()->setBold(true);
        $sheet->setCellValue('D1080', "Sewa Gedung/ Lahan");
        $sheet->setCellValue('E1080', "8xx.xx.601");
        $sheet->setCellValue('D1081', "Sewa Kendaraan ");
        $sheet->setCellValue('E1081', "8xx.xx.602");
        $sheet->setCellValue('D1082', "Sewa Komputer & Perlengkapannya");
        $sheet->setCellValue('E1082', "8xx.xx.603");
        $sheet->setCellValue('D1083', "Sewa Medical supplies ");
        $sheet->setCellValue('E1083', "8xx.xx.604");
        $sheet->setCellValue('D1084', "Sewa Telekomunikasi & Elektronika");
        $sheet->setCellValue('E1084', "8xx.xx.605");
        $sheet->setCellValue('D1085', "Sewa Kelola Aset Pertamina");
        $sheet->setCellValue('E1085', "8xx.xx.606");
        $sheet->setCellValue('D1086', "Sewa Tabung Oksigen");
        $sheet->setCellValue('E1086', "8xx.xx.607");
        $sheet->setCellValue('D1087', "Sewa Alat Kantor (ATK)");
        $sheet->setCellValue('E1087', "8xx.xx.608");
        $sheet->setCellValue('D1088', "Sewa Rumah Tangga Kantor (RTK)");
        $sheet->setCellValue('E1088', "8xx.xx.609");
        $sheet->setCellValue('D1089', "Kontrak Micro Film ");
        $sheet->setCellValue('E1089', "8xx.xx.610");
        $sheet->setCellValue('D1090', "Penyajian Cucian (Laundry)");
        $sheet->setCellValue('E1090', "8xx.xx.611");
        $sheet->setCellValue('D1091', "Kontrak Pengemudi");
        $sheet->setCellValue('E1091', "8xx.xx.612");
        $sheet->setCellValue('D1092', "Kontrak Keamanan");
        $sheet->setCellValue('E1092', "8xx.xx.613");
        $sheet->setCellValue('D1093', "Kontrak Kebersihan");
        $sheet->setCellValue('E1093', "8xx.xx.614");
        $sheet->setCellValue('D1094', "Kontrak Nurse Aid");
        $sheet->setCellValue('E1094', "8xx.xx.615");
        $sheet->setCellValue('D1095', "Kontrak Operator");
        $sheet->setCellValue('E1095', "8xx.xx.616");
        $sheet->setCellValue('D1096', "Kontrak Administrasi");
        $sheet->setCellValue('E1096', "8xx.xx.617");
        $sheet->setCellValue('D1097', "Kontrak Kerja Sama Layanan Kesehatan");
        $sheet->setCellValue('E1097', "8xx.xx.618");
        $sheet->setCellValue('D1098', "Kontrak Pemasaran");
        $sheet->setCellValue('E1098', "8xx.xx.619");
        $sheet->setCellValue('D1099', "Kontrak Resepsionis");
        $sheet->setCellValue('E1099', "8xx.xx.620");
        $sheet->setCellValue('D1100', "Penyajian Makanan Pasien");
        $sheet->setCellValue('E1100', "8xx.xx.621");
        $sheet->setCellValue('D1101', "Penyajian Makanan Pekerja");
        $sheet->setCellValue('E1101', "8xx.xx.622");
        $sheet->setCellValue('D1102', "Kontrak Kerja Sama (KSO/ KBH)");
        $sheet->setCellValue('E1102', "8xx.xx.623");
        $sheet->setCellValue('D1103', "Kontrak Konsultan");
        $sheet->setCellValue('E1103', "8xx.xx.624");
        $sheet->setCellValue('D1104', "Kontrak Parkir");
        $sheet->setCellValue('E1104', "8xx.xx.625");
        $sheet->setCellValue('D1105', "TOTAL BIAYA SEWA/KONTRAK");
        $sheet->getStyle('D1105')->getFont()->setBold(true);
        $sheet->getStyle('C1105:I1105')->applyFromArray($hijau);
        $sheet->setCellValue('B1107', "H2.10");
        $sheet->getStyle('B1107')->getFont()->setBold(true);
        $sheet->setCellValue('D1107', "BIAYA SEWA/KONTRAK");
        $sheet->getStyle('D1107')->getFont()->setBold(true);
        $sheet->setCellValue('D1108', "Pos, Materai, Perangko, Telex, Iuran TV");
        $sheet->setCellValue('E1108', "8xx.xx.701");
        $sheet->setCellValue('D1109', "Biaya Keuangan(Premi,Dll)");
        $sheet->setCellValue('E1109', "8xx.xx.702");
        $sheet->setCellValue('D1110', "Perijinan, Dokumentasi, Rapat dll");
        $sheet->setCellValue('E1110', "8xx.xx.703");
        $sheet->setCellValue('D1111', "Perpustakaan (Buku,Majalah/Koran)");
        $sheet->setCellValue('E1111', "8xx.xx.704");
        $sheet->setCellValue('D1112', "TOTAL ADMINISTRASI KANTOR");
        $sheet->getStyle('D1112')->getFont()->setBold(true);
        $sheet->getStyle('C1112:I1112')->applyFromArray($hijau);
        $sheet->setCellValue('D1114', "BIAYA UMUM");
        $sheet->getStyle('D1114')->getFont()->setBold(true);
        $sheet->setCellValue('D1115', "Pengembangan Sistem ");
        $sheet->setCellValue('E1115', "8xx.xx.801");
        $sheet->setCellValue('D1116', "Alat Rumah tangga");
        $sheet->setCellValue('E1116', "8xx.xx.802");
        $sheet->setCellValue('D1117', "Reproduksi");
        $sheet->setCellValue('E1117', "8xx.xx.803");
        $sheet->setCellValue('D1118', "Biaya Managemen & Jasa");
        $sheet->setCellValue('E1118', "8xx.xx.804");
        $sheet->setCellValue('D1119', "Civic Mission");
        $sheet->setCellValue('E1119', "8xx.xx.805");
        $sheet->setCellValue('D1120', "Riset");
        $sheet->setCellValue('E1120', "8xx.xx.806");
        $sheet->setCellValue('D1121', "Bagian Umum");
        $sheet->setCellValue('E1121', "8xx.xx.807");
        $sheet->setCellValue('D1122', "Pemeriksaan Air");
        $sheet->setCellValue('E1122', "8xx.xx.808");
        $sheet->setCellValue('D1123', "TQC/GKM ");
        $sheet->setCellValue('E1123', "8xx.xx.809");
        $sheet->setCellValue('D1124', "Promosi /Pemasaran ");
        $sheet->setCellValue('E1124', "8xx.xx.810");
        $sheet->setCellValue('D1125', "Rumah Dinas");
        $sheet->setCellValue('E1125', "8xx.xx.811");
        $sheet->setCellValue('D1126', "Pakaian dinas ");
        $sheet->setCellValue('E1126', "8xx.xx.814");
        $sheet->setCellValue('D1127', "Bina Karyawan ");
        $sheet->setCellValue('E1127', "8xx.xx.815");
        $sheet->setCellValue('D1128', "Biaya Penagihan");
        $sheet->setCellValue('E1128', "8xx.xx.816");
        $sheet->setCellValue('D1129', "Tiket Perjalanan");
        $sheet->setCellValue('E1129', "8xx.xx.818");
        $sheet->setCellValue('D1130', "Pelayanan Ambulance ");
        $sheet->setCellValue('E1130', "8xx.xx.819");
        $sheet->setCellValue('D1131', "Listrik (PLN)");
        $sheet->setCellValue('E1131', "8xx.xx.820");
        $sheet->setCellValue('D1132', "Air (PAM)");
        $sheet->setCellValue('E1132', "8xx.xx.821");
        $sheet->setCellValue('D1133', "Pulsa Telephone");
        $sheet->setCellValue('E1133', "8xx.xx.822");
        $sheet->setCellValue('D1134', "Pemondokan/ Makan Perawat");
        $sheet->setCellValue('E1134', "8xx.xx.828");
        $sheet->setCellValue('D1135', "Dewan Penyantun");
        $sheet->setCellValue('E1135', "8xx.xx.829");
        $sheet->setCellValue('D1136', "Perjalanan Tahunan/ Haji");
        $sheet->setCellValue('E1136', "8xx.xx.830");
        $sheet->setCellValue('D1137', "Pemasaran & Humas");
        $sheet->setCellValue('E1137', "8xx.xx.831");
        $sheet->setCellValue('D1138', "Penyisihan Piutang");
        $sheet->setCellValue('E1138', "8xx.xx.832");
        $sheet->setCellValue('D1139', "K3 LL");
        $sheet->setCellValue('E1139', "8xx.xx.833");
        $sheet->setCellValue('D1140', "Hukum");
        $sheet->setCellValue('E1140', "8xx.xx.834");
        $sheet->setCellValue('D1141', "PBB (Pajak Bumi & Bangunan)");
        $sheet->setCellValue('E1141', "8xx.xx.838");
        $sheet->setCellValue('D1142', "Biaya Tes Kesehatan");
        $sheet->setCellValue('E1142', "8xx.xx.839");
        $sheet->setCellValue('D1143', "Transport (Tol, parkir dll)");
        $sheet->setCellValue('E1143', "8xx.xx.841");
        $sheet->setCellValue('D1144', "Fogging");
        $sheet->setCellValue('E1144', "8xx.xx.842");
        $sheet->setCellValue('D1145', "Spraying");
        $sheet->setCellValue('E1145', "8xx.xx.843");
        $sheet->setCellValue('D1146', "Termite Kontrol");
        $sheet->setCellValue('E1146', "8xx.xx.844");
        $sheet->setCellValue('D1147', "Pest Kontrol");
        $sheet->setCellValue('E1147', "8xx.xx.845");
        $sheet->setCellValue('D1148', "Barang Hilang");
        $sheet->setCellValue('E1148', "8xx.xx.846");
        $sheet->setCellValue('D1149', "Barang Rusak");
        $sheet->setCellValue('E1149', "8xx.xx.847");
        $sheet->setCellValue('D1150', "Barang Kadaluarsa");
        $sheet->setCellValue('E1150', "8xx.xx.848");
        $sheet->setCellValue('D1151', "Biaya Bakti Sosial / PKBL");
        $sheet->setCellValue('E1151', "8xx.xx.849");
        $sheet->setCellValue('D1152', "Biaya CSR (Corporate Social Responsibility)");
        $sheet->setCellValue('E1152', "8xx.xx.850");
        $sheet->setCellValue('D1153', "Biaya Pengelolaan RS KSO");
        $sheet->setCellValue('E1153', "8xx.xx.851");
        $sheet->setCellValue('D1154', "Pengobatan Pensiunan PERTAMEDIKA");
        $sheet->setCellValue('E1154', "8xx.xx.852");
        $sheet->setCellValue('D1155', "Biaya Internet");
        $sheet->setCellValue('E1155', "8xx.xx.856");
        $sheet->setCellValue('D1156', "Biaya Referral");
        $sheet->setCellValue('E1156', "8xx.xx.857");
        $sheet->setCellValue('D1157', "TOTAL BIAYA UMUM");
        $sheet->getStyle('D1157')->getFont()->setBold(true);
        $sheet->getStyle('C1157:I1157')->applyFromArray($hijau);
        $sheet->setCellValue('C1159', "TOTAL BEBAN USAHA PER JENIS BIAYA");
        $sheet->getStyle('C1159')->getFont()->setBold(true);
        $sheet->mergeCells('C1159:D1159');
        $sheet->getStyle('B1159:I1159')->applyFromArray($biru);
        $sheet->setCellValue('A1160', "KONTROL BEBAN USAHA");
        $sheet->getStyle('A1160:I1160')->applyFromArray($merah);
        $sheet->mergeCells('A1160:D1160');
        $sheet->setCellValue('A1162', "I");
        $sheet->getStyle('A1162')->getFont()->setBold(true);
        $sheet->setCellValue('C1162', "(LABA) / RUGI USAHA");
        $sheet->getStyle('C1162')->getFont()->setBold(true);
        $sheet->mergeCells('C1162:D1162');
        $sheet->getStyle('B1162:I1162')->applyFromArray($biru);
        $sheet->setCellValue('A1164', "J");
        $sheet->getStyle('A1164')->getFont()->setBold(true);
        $sheet->setCellValue('C1164', "PENDAPATAN DILUAR USAHA");
        $sheet->getStyle('C1164')->getFont()->setBold(true);
        $sheet->setCellValue('D1165', "Telephone");
        $sheet->setCellValue('E1165', "8xx.xx.930");
        $sheet->setCellValue('D1166', "Management & Branding Fee");
        $sheet->setCellValue('E1166', "8xx.xx.944");
        $sheet->setCellValue('D1167', "Profit Sharing");
        $sheet->setCellValue('E1167', "8xx.xx.945");
        $sheet->setCellValue('D1168', "Jasa Giro");
        $sheet->setCellValue('E1168', "8xx.xx.951");
        $sheet->setCellValue('D1169', "Bunga Deposito");
        $sheet->setCellValue('E1169', "8xx.xx.952");
        $sheet->setCellValue('D1170', "Deviden/ Investasi");
        $sheet->setCellValue('E1170', "8xx.xx.953");
        $sheet->setCellValue('D1171', "Denda Material");
        $sheet->setCellValue('E1171', "8xx.xx.954");
        $sheet->setCellValue('D1172', "Denda keterlambatan Investasi");
        $sheet->setCellValue('E1172', "8xx.xx.955");
        $sheet->setCellValue('D1173', "Sewa");
        $sheet->setCellValue('E1173', "8xx.xx.956");
        $sheet->setCellValue('D1174', "Selisih Kurs");
        $sheet->setCellValue('E1174', "8xx.xx.958");
        $sheet->setCellValue('D1175', "Bunga Obligasi / Surat Berharga");
        $sheet->setCellValue('E1175', "8xx.xx.959");
        $sheet->setCellValue('D1176', "Laba/Rugi Penyertaan Investasi");
        $sheet->setCellValue('E1176', "8xx.xx.961");
        $sheet->setCellValue('D1177', "Laba/Rugi Penjualan Asset");
        $sheet->setCellValue('E1177', "8xx.xx.962");
        $sheet->setCellValue('D1178', "Pendapatan KSO - Graha ");
        $sheet->setCellValue('E1178', "8xx.xx.963");
        $sheet->setCellValue('D1179', "Pendapatan KSO - Parkir");
        $sheet->setCellValue('E1179', "8xx.xx.964");
        $sheet->setCellValue('D1180', "Laba (Rugi) Penjualan Saham Penyertaan Langsung");
        $sheet->setCellValue('E1180', "8xx.xx.965");
        $sheet->setCellValue('D1181', "Pendapatan IT (Software/Sistem)");
        $sheet->setCellValue('E1181', "8xx.xx.967");
        $sheet->setCellValue('D1182', "(Laba)/Rugi Selisih Modifikasi");
        $sheet->setCellValue('E1182', "8xx.xx.968");
        $sheet->setCellValue('D1183', "Pendapatan Bunga STL");
        $sheet->setCellValue('E1183', "8xx.xx.969");
        $sheet->setCellValue('D1184', "Discount");
        $sheet->setCellValue('E1184', "8xx.xx.970");
        $sheet->setCellValue('D1185', "(Laba)/Rugi Impairment Aktiva Tetap");
        $sheet->setCellValue('E1185', "8xx.xx.971");
        $sheet->setCellValue('D1186', "Donasi");
        $sheet->setCellValue('E1186', "8xx.xx.997");
        $sheet->setCellValue('D1187', "Laba/Rugi Penyertaan Investasi di Anak Perusahaan");
        $sheet->setCellValue('E1187', "8xx.xx.998");
        $sheet->setCellValue('D1188', "Lain Lain");
        $sheet->setCellValue('E1188', "8xx.xx.999");
        $sheet->setCellValue('C1189', "TOTAL PENDAPATAN DILUAR USAHA");
        $sheet->getStyle('C1189')->getFont()->setBold(true);
        $sheet->mergeCells('C1189:D1189');
        $sheet->getStyle('B1189:I1189')->applyFromArray($biru);
        $sheet->setCellValue('A1191', "K");
        $sheet->getStyle('A1191')->getFont()->setBold(true);
        $sheet->setCellValue('C1191', "BIAYA DILUAR USAHA");
        $sheet->getStyle('C1191')->getFont()->setBold(true);
        $sheet->setCellValue('D1192', "Kartu Kredit");
        $sheet->setCellValue('E1192', "8xx.xx.823");
        $sheet->setCellValue('D1193', "Biaya Bank");
        $sheet->setCellValue('E1193', "8xx.xx.824");
        $sheet->setCellValue('D1194', "Pajak Bunga deposito");
        $sheet->setCellValue('E1194', "8xx.xx.825");
        $sheet->setCellValue('D1195', "Pajak Jasa giro");
        $sheet->setCellValue('E1195', "8xx.xx.826");
        $sheet->setCellValue('D1196', "Biaya Pajak");
        $sheet->setCellValue('E1196', "8xx.xx.835");
        $sheet->setCellValue('D1197', "Pajak Tangguhan");
        $sheet->setCellValue('E1197', "xxx.xx.836");
        $sheet->setCellValue('D1198', "Denda Pajak");
        $sheet->setCellValue('E1198', "8xx.xx.837");
        $sheet->setCellValue('D1199', "Bunga Pinjaman Dari Long Term Loan (LTL)");
        $sheet->setCellValue('E1199', "8xx.xx.827");
        $sheet->setCellValue('D1200', "Bunga Dari Aset Leasing");
        $sheet->setCellValue('E1200', "8xx.xx.858");
        $sheet->setCellValue('D1201', "Bunga Dari Short Term Loan (STL)");
        $sheet->setCellValue('E1201', "8xx.xx.859");
        $sheet->setCellValue('D1202', "Bunga Obligasi (Bonds)");
        $sheet->setCellValue('E1202', "8xx.xx.860");
        $sheet->setCellValue('D1203', "Bunga Obligasi Konversi (Convertible Bonds)");
        $sheet->setCellValue('E1203', "8xx.xx.861");
        $sheet->setCellValue('C1204', "TOTAL BIAYA DILUAR USAHA");
        $sheet->getStyle('C1204')->getFont()->setBold(true);
        $sheet->mergeCells('C1204:D1204');
        $sheet->getStyle('B1204:I1204')->applyFromArray($biru);

        $sheet->setCellValue('A1206', "L");
        $sheet->getStyle('A1206')->getFont()->setBold(true);
        $sheet->setCellValue('C1206', "(LABA) / RUGI SEBELUM PAJAK");
        $sheet->getStyle('C1206')->getFont()->setBold(true);
        $sheet->mergeCells('C1206:D1206');
        $sheet->getStyle('B1206:I1206')->applyFromArray($biru);
        $sheet->setCellValue('A1208', "M");
        $sheet->getStyle('A1208')->getFont()->setBold(true);
        $sheet->setCellValue('C1208', "PAJAK");
        $sheet->getStyle('C1208')->getFont()->setBold(true);
        $sheet->setCellValue('D1209', "Pajak Kini");
        $sheet->setCellValue('E1209', "8xx.xx.890");
        $sheet->setCellValue('D1210', "(Lebih)/ Kurang pengakuan pajak tahun sebelumnya");
        $sheet->setCellValue('E1210', "8xx.xx.891");
        $sheet->setCellValue('D1211', "Beban Pajak Tangguhan");
        $sheet->setCellValue('E1211', "8xx.xx.836");
        $sheet->setCellValue('D1212', "Manfaat Pajak Tangguhan");
        $sheet->setCellValue('E1212', "8xx.xx.860");
        $sheet->setCellValue('C1213', "TOTAL PAJAK");
        $sheet->getStyle('C1213')->getFont()->setBold(true);
        $sheet->mergeCells('C1213:D1213');
        $sheet->getStyle('B1213:I1213')->applyFromArray($biru);
        $sheet->setCellValue('A1215', "(LABA) / RUGI SETELAH PAJAK");
        $sheet->getStyle('A1215:I1215')->applyFromArray($merah);
        $sheet->mergeCells('A1215:D1215');
        $sheet->setCellValue('A1216', "KONTROL LABA");
        $sheet->getStyle('A1216:I1216')->applyFromArray($merah);
        $sheet->mergeCells('A1216:D1216');



        ///////////////////SET VALUE FROM DATABASE///////////////////////////////////////////////

        $page_data = $this->M_Laporan_Jurnal->trial_balance($mulai, $akhir);
        $page_data1 = $this->M_Laporan_Jurnal->pendapatan_layanan($mulai, $akhir);
        $page_data2 = $this->M_Laporan_Jurnal->pendapatan_jenis($mulai, $akhir);
        $gabungan_data = array_merge($page_data, $page_data1, $page_data2);
        // print_arr($gabungan_data);


        $page_data3 = $this->M_Laporan_Jurnal->pendapatan_kelompok_net($mulai, $akhir);
        $page_data4 = $this->M_Laporan_Jurnal->pendapatan_kelompok($mulai, $akhir);
        $page_data5 = $this->M_Laporan_Jurnal->reduksi($mulai, $akhir);
        $gabungan_pendapatan = array_merge($page_data4, $page_data5);

        $highestRow = $sheet->getHighestRow();
        for ($row = 8; $row <= $highestRow; $row++) {
            $rekening = $sheet->getCell('E' . $row)->getValue();
            $keterangan = $sheet->getCell('D' . $row)->getValue();

            if ($rekening == '' && !($row >= 705 && $row <= 722) && !($row >= 726 && $row <= 742)) {
                $sheet->setCellValue('F' . $row, '');
                $sheet->setCellValue('G' . $row, '');
                $sheet->setCellValue('H' . $row, '');
                $sheet->setCellValue('I' . $row, '');
            } else {

                $filtered_list = array_filter($gabungan_data, function ($data_jurnal) use ($rekening) {
                    return $data_jurnal['rekening'] == $rekening;
                });
                $filtered_data = reset($filtered_list);

                if (!empty($filtered_data)) {
                    $data = $filtered_data;
                    $sheet->setCellValue('F' . $row, ($data['saldo_awal']));
                    $sheet->setCellValue('G' . $row, ($data['debet']));
                    $sheet->setCellValue('H' . $row, ($data['kredit']));
                    $sheet->setCellValue('I' . $row, ($data['saldo_akhir']));
                } else {

                    $data = null;
                    $sheet->setCellValue('F' . $row, 0);
                    $sheet->setCellValue('G' . $row, 0);
                    $sheet->setCellValue('H' . $row, 0);
                    $sheet->setCellValue('I' . $row, 0);
                }
                if ($row >= 705 && $row <= 722) {
                    $list1 = array_filter($gabungan_pendapatan, function ($data_jurnal1) use ($keterangan) {
                        return $data_jurnal1['kelompok_LAI'] == $keterangan;
                    });
                    $filtered_data_1 = reset($list1);
                    if (!empty($filtered_data_1)) {
                        $data1 = $filtered_data_1;
                        $sheet->setCellValue('F' . $row, ($data1['saldo_awal']));
                        $sheet->setCellValue('G' . $row, ($data1['debet']));
                        $sheet->setCellValue('H' . $row, ($data1['kredit']));
                        $sheet->setCellValue('I' . $row, ($data1['saldo_akhir']));
                    }
                }
                if ($row >= 726 && $row <= 739) {
                    $list2 = array_filter($page_data3, function ($data_jurnal2) use ($keterangan) {
                        return $data_jurnal2['kelompok_LAI'] == $keterangan;
                    });
                    $filtered_data_2 = reset($list2);
                    if (!empty($filtered_data_2)) {
                        $data2 = $filtered_data_2;
                        $sheet->setCellValue('F' . $row, ($data2['saldo_awal']));
                        $sheet->setCellValue('G' . $row, ($data2['debet']));
                        $sheet->setCellValue('H' . $row, ($data2['kredit']));
                        $sheet->setCellValue('I' . $row, ($data2['saldo_akhir']));
                    }
                }
            }
        }


        $startColumn = 'F';
        $endColumn = 'I';

        $columnCount = PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($endColumn) - PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + 1;

        $this->generateFormulaSum($sheet, '8', '13', '14');
        $this->generateFormulaSum($sheet, '17', '157', '158');
        $this->generateFormulaSum($sheet, '161', '182', '183');
        $this->generateFormulaSum($sheet, '186', '188', '189');

        // Iterate through each column
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "14+" . $column . "158+" . $column . "183+" . $column . "189)";
            $sheet->setCellValue($column . '190', $formula);
        }

        $this->generateFormulaSum($sheet, '192', '194', '195');

        // Iterate through each column
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "195+" . $column . "190)";
            $sheet->setCellValue($column . '197', $formula);
        }

        $this->generateFormulaSum($sheet, '200', '204', '205');
        $this->generateFormulaSum($sheet, '210', '215', '216');
        $this->generateFormulaSum($sheet, '218', '226', '227');
        $this->generateFormulaSum($sheet, '218', '226', '227');
        $this->generateFormulaSum($sheet, '229', '231', '232');


        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "216+" . $column . "227+" . $column . "232)";
            $sheet->setCellValue($column . '233', $formula);
        }

        $this->generateFormulaSum($sheet, '236', '245', '246');
        $this->generateFormulaSum($sheet, '250', '252', '253');
        $this->generateFormulaSum($sheet, '255', '259', '260');
        $this->generateFormulaSum($sheet, '262', '263', '264');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "253+" . $column . "260+" . $column . "264)";
            $sheet->setCellValue($column . '265', $formula);
        }

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "233+" . $column . "246+" . $column . "265)";
            $sheet->setCellValue($column . '267', $formula);
        }


        $this->generateFormulaSum($sheet, '270', '272', '273');
        $this->generateFormulaSum($sheet, '277', '279', '280');
        $this->generateFormulaSum($sheet, '283', '285', '286');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "286+" . $column . "280)";
            $sheet->setCellValue($column . '288', $formula);
        }

        $this->generateFormulaSum($sheet, '292', '294', '295');
        $this->generateFormulaSum($sheet, '298', '301', '302');
        $this->generateFormulaSum($sheet, '305', '310', '311');


        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "295+" . $column . "302+" . $column . "311)";
            $sheet->setCellValue($column . '313', $formula);
        }

        $this->generateFormulaSum($sheet, '316', '323', '324');
        $this->generateFormulaSum($sheet, '327', '334', '335');
        $this->generateFormulaSum($sheet, '338', '346', '347');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "190+" . $column . "205+" . $column . "267+" . $column . "273+" . $column . "280+" . $column . "286+" . $column . "313+" . $column . "324+" . $column . "335+" . $column . "347)";
            $sheet->setCellValue($column . '349', $formula);
        }

        $this->generateFormulaSum($sheet, '353', '354', '355');
        $this->generateFormulaSum($sheet, '358', '359', '360');
        $this->generateFormulaSum($sheet, '364', '365', '366');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "369)";
            $sheet->setCellValue($column . '370', $formula);
        }

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "366+" . $column . "370)";
            $sheet->setCellValue($column . '372', $formula);
        }

        $this->generateFormulaSum($sheet, '376', '386', '387');
        $this->generateFormulaSum($sheet, '390', '399', '400');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "387+" . $column . "400)";
            $sheet->setCellValue($column . '401', $formula);
        }

        $this->generateFormulaSum($sheet, '404', '414', '415');
        $this->generateFormulaSum($sheet, '418', '428', '429');


        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "415+" . $column . "429)";
            $sheet->setCellValue($column . '430', $formula);
        }

        $this->generateFormulaSum($sheet, '433', '442', '443');
        $this->generateFormulaSum($sheet, '446', '456', '457');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "401+" . $column . "430+" . $column . "443+" . $column . "457)";
            $sheet->setCellValue($column . '459', $formula);
        }

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "462)";
            $sheet->setCellValue($column . '463', $formula);
        }

        $this->generateFormulaSum($sheet, '466', '472', '473');
        $this->generateFormulaSum($sheet, '476', '480', '481');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "484)";
            $sheet->setCellValue($column . '485', $formula);
        }

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "355+" . $column . "360+" . $column . "372+" . $column . "459+" . $column . "463+" . $column . "473+" . $column . "481+" . $column . "485)";
            $sheet->setCellValue($column . '487', $formula);
        }

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "349+" . $column . "487)";
            $sheet->setCellValue($column . '488', $formula);
        }

        $this->generateFormulaSum($sheet, '492', '497', '498');
        $this->generateFormulaSum($sheet, '502', '512', '513');
        $this->generateFormulaSum($sheet, '516', '518', '519');
        $this->generateFormulaSum($sheet, '522', '524', '525');
        $this->generateFormulaSum($sheet, '528', '529', '530');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "513+" . $column . "519+" . $column . "525+" . $column . "530)";
            $sheet->setCellValue($column . '532', $formula);
        }
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "536)";
            $sheet->setCellValue($column . '537', $formula);
        }

        $this->generateFormulaSum($sheet, '540', '544', '545');
        $this->generateFormulaSum($sheet, '548', '554', '555');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "537+" . $column . "545+" . $column . "555)";
            $sheet->setCellValue($column . '557', $formula);
        }

        $this->generateFormulaSum($sheet, '560', '570', '571');
        $this->generateFormulaSum($sheet, '574', '578', '579');
        $this->generateFormulaSum($sheet, '581', '583', '584');
        $this->generateFormulaSum($sheet, '588', '594', '595');
        $this->generateFormulaSum($sheet, '598', '600', '601');
        $this->generateFormulaSum($sheet, '604', '604', '605');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "595+" . $column . "601+" . $column . "605)";
            $sheet->setCellValue($column . '607', $formula);
        }
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "498+" . $column . "532+" . $column . "557+" . $column . "571+" . $column . "579+" . $column . "607+" . $column . "584)";
            $sheet->setCellValue($column . '609', $formula);
        }

        $this->generateFormulaSum($sheet, '614', '619', '620');
        $this->generateFormulaSum($sheet, '623', '626', '627');
        $this->generateFormulaSum($sheet, '629', '629', '631');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "620+" . $column . "627+" . $column . "631)";
            $sheet->setCellValue($column . '632', $formula);
        }

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "635)";
            $sheet->setCellValue($column . '636', $formula);
        }

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "639)";
            $sheet->setCellValue($column . '640', $formula);
        }

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "632+" . $column . "636+" . $column . "640)";
            $sheet->setCellValue($column . '642', $formula);
        }
        $this->generateFormulaSum($sheet, '644', '680', '681');
        $this->generateFormulaSum($sheet, '684', '697', '698');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "609+" . $column . "642+" . $column . "681+" . $column . "698)";
            $sheet->setCellValue($column . '700', $formula);
        }
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "488+" . $column . "700)";
            $sheet->setCellValue($column . '701', $formula);
        }
       
        //////////////////////////////////////////////////////////////////////////
        $this->generateFormulaSum($sheet, '705', '722', '723');
        $this->generateFormulaSum($sheet, '726', '742', '743');
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "723-" . $column . "743)";
            $sheet->setCellValue($column . '744', $formula);
        }
        $this->generateFormulaSum($sheet, '747', '763', '764');
        $this->generateFormulaSum($sheet, '768', '772', '773');
        $this->generateFormulaSum($sheet, '776', '797', '798');
        $this->generateFormulaSum($sheet, '801', '806', '807');
        $this->generateFormulaSum($sheet, '810', '811', '812');
        $this->generateFormulaSum($sheet, '815', '821', '822');
        $this->generateFormulaSum($sheet, '825', '828', '829');
        $this->generateFormulaSum($sheet, '832', '864', '865');
        $this->generateFormulaSum($sheet, '868', '881', '882');
        $this->generateFormulaSum($sheet, '885', '900', '901');
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "773+" . $column . "798+". $column . "807+". $column . "812+". $column . "822+". $column . "829+". $column . "865+". $column . "882+". $column . "901)";
            $sheet->setCellValue($column . '903', $formula);
        }
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "764-" . $column . "903)";
            $sheet->setCellValue($column . '904', $formula);
        }
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "903-" . $column . "743)";
            $sheet->setCellValue($column . '905', $formula);
        }
        $this->generateFormulaSum($sheet, '909', '920', '921');
        $this->generateFormulaSum($sheet, '925', '958', '959');
        $this->generateFormulaSum($sheet, '962', '969', '970');
        $this->generateFormulaSum($sheet, '973', '989', '990');
        $this->generateFormulaSum($sheet, '993', '1014', '1015');
        $this->generateFormulaSum($sheet, '1018', '1019', '1020');
        $this->generateFormulaSum($sheet, '1023', '1035', '1036');
        $this->generateFormulaSum($sheet, '1039', '1063', '1064');
        $this->generateFormulaSum($sheet, '1067', '1076', '1077');
        $this->generateFormulaSum($sheet, '1080', '1104', '1105');
        $this->generateFormulaSum($sheet, '1108', '1111', '1112');
        $this->generateFormulaSum($sheet, '1115', '1156', '1157');
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "959+" . $column . "970+". $column . "990+". $column . "1015+". $column . "1020+". $column . "1036+". $column . "1064+". $column . "1077+" . $column . "1105+". $column . "1112+". $column . "1157)";
            $sheet->setCellValue($column . '1159', $formula);
        }
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "921-" . $column . "1159)";
            $sheet->setCellValue($column . '1160', $formula);
        }
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "903+" . $column . "1159)";
            $sheet->setCellValue($column . '1162', $formula);
        }
        $this->generateFormulaSum($sheet, '1165', '1188', '1189');
        $this->generateFormulaSum($sheet, '1192', '1203', '1204');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "1162+". $column . "1189+" . $column . "1204)";
            $sheet->setCellValue($column . '1206', $formula);
        }
        $this->generateFormulaSum($sheet, '1209', '1212', '1213');
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "1206+" . $column . "1213)";
            $sheet->setCellValue($column . '1215', $formula);
        }
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "652-" . $column . "1215)";
            $sheet->setCellValue($column . '1216', $formula);
        }

        $spreadsheet->getActiveSheet()->getStyle('F8:I1216')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_ACCOUNTING);

        /////////////////////////////////////////////////////////////////////////////////////////
        // Set width kolom
        $sheet->getDefaultColumnDimension()->setWidth(-1); // Set width kolom A
        // $sheet->getColumnDimension('B')->setWidth(15); // Set width kolom B
        // $sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
        // $sheet->getColumnDimension('D')->setWidth(20); // Set width kolom D
        // $sheet->getColumnDimension('E')->setWidth(30); // Set width kolom E
        $sheet->getStyle('A1:I1216')->applyFromArray(['borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, // Ganti dengan jenis border yang diinginkan
                'color' => ['argb' => '000000'] // Ganti dengan warna border yang diinginkan
            ],
        ],]);


        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Trial Balance");

        // Membuat sheet kedua
        $spreadsheet->createSheet();
        $this->export_neraca($spreadsheet, $akhir);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Trial Balance.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function export_neraca($spreadsheet, $akhir)
    {

        // $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->setActiveSheetIndex(1);
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel

        $sheet->setCellValue('A1', "PT BAKTI TIMAH MEDIKA");
        $sheet->setCellValue('A2', "Laporan Posisi Keuangan(Neraca)");
        $sheet->setCellValue('A3', "Rp 000,000");

        $sheet->getStyle('A1:A2')->getFont()->setBold(true);
        $sheet->setCellValue('A4', "Uraian");
        $sheet->mergeCells('A4:C6');
        $sheet->getStyle('A4')->getFont()->setBold(true);
        $text = "Audited " . (date('Y', strtotime($akhir)) - 1);
        $sheet->setCellValue('D4', $text); //tahun saldo tahun sebelumnya
        $sheet->mergeCells('D4:D6');
        $sheet->getStyle('D4')->getFont()->setBold(true);
        $text2 = "s.d " . bulan(date('m', strtotime($akhir . '-01'))) . " " . date('Y', strtotime($akhir . '-01'));
        $sheet->setCellValue('E4', $text2); //tahun dan bulan yang ditarik data nya
        $sheet->mergeCells('E4:E6');
        $sheet->getStyle('E4')->getFont()->setBold(true);

        $sheet->setCellValue('A7', "Aset");
        $sheet->setCellValue('A8', "Aset Lancar");
        $sheet->setCellValue('B9', "Kas & Setara Kas");
        $sheet->setCellValue('B10', "Aset Keuangan tersedia untuk dijual");
        $sheet->setCellValue('B11', "Piutang Usaha");
        $sheet->setCellValue('B12', "Pendapatan yang masih harus diterima");
        $sheet->setCellValue('B13', "Piutang Lain-lain");
        $sheet->setCellValue('B14', "Persediaan");
        $sheet->setCellValue('B15', "Uang Muka & Beban dibayar dimuka");
        $sheet->setCellValue('B16', "Pajak dibayar dimuka");
        $sheet->setCellValue('A17', "Total Aset Lancar");
        $sheet->getStyle('A17')->getFont()->setBold(true);
        $sheet->setCellValue('A18', "Aset Tidak Lancar");
        $sheet->setCellValue('B19', "Investasi pada entitas asosiasi");
        $sheet->setCellValue('B20', "Piutang Lain-lain");
        $sheet->setCellValue('B21', "Properti Investasi");
        $sheet->setCellValue('B22', "Aset Tetap");
        $sheet->setCellValue('B23', "Aset Tetap dalam Penyelesaian");
        $sheet->setCellValue('B24', "Aset Pajak Tangguhan");
        $sheet->setCellValue('B25', "Aset yang dibatasi penggunaannya");
        $sheet->setCellValue('B26', "Aset tidak lancar lainnya");
        $sheet->setCellValue('B27', "Taksiran tagihan pajak penghasilan");
        $sheet->setCellValue('A28', "Total Aset Tidak Lancar");
        $sheet->getStyle('A28')->getFont()->setBold(true);
        $sheet->setCellValue('A29', "Total Aset");
        $sheet->getStyle('A29')->getFont()->setBold(true);
        $sheet->setCellValue('A30', "Liabilitas & Ekuitas");
        $sheet->setCellValue('A31', "Liabilitas Jangka Pendek");
        $sheet->setCellValue('B32', "Utang Pinjaman Jangka Pendek");
        $sheet->setCellValue('B33', "Utang Usaha");
        $sheet->setCellValue('B34', "Utang Usaha");
        $sheet->setCellValue('B35', "Utang Usaha");
        $sheet->setCellValue('C36', "PPh Badan");
        $sheet->setCellValue('C37', "PPh lainnya");
        $sheet->setCellValue('B38', "Beban yang masih harus dibayar");
        $sheet->setCellValue('B39', "Pend. diterima dimuka & deposit pasien");
        $sheet->setCellValue('B40', "Liabilitas jangka panjang yg jatuh tempo");
        $sheet->setCellValue('C41', "Non Bank");
        $sheet->setCellValue('C42', "Bank");
        $sheet->setCellValue('C43', "Sewa Pembiayaan");
        $sheet->setCellValue('C44', "Imbalan Paska Kerja");
        $sheet->setCellValue('C45', "Lainnya");
        $sheet->setCellValue('A46', "Total Liabilitas Jangka Pendek");
        $sheet->getStyle('A46')->getFont()->setBold(true);
        $sheet->setCellValue('A47', "Liabilitas Jangka Panjang");
        $sheet->setCellValue('B48', "Liabilitas jk panjang yg belum jatuh tempo");
        $sheet->setCellValue('C49', "Non Bank");
        $sheet->setCellValue('C50', "Bank");
        $sheet->setCellValue('C51', "Sewa Pembiayaan");
        $sheet->setCellValue('C52', "Lainnya");
        $sheet->setCellValue('B53', "Imbalan Paska Kerja");
        $sheet->setCellValue('A54', "Total Liabilitas Jangka Panjang");
        $sheet->getStyle('A54')->getFont()->setBold(true);
        $sheet->setCellValue('A55', "Total Liabilitas");
        $sheet->getStyle('A55')->getFont()->setBold(true);
        $sheet->setCellValue('A56', "Ekuitas");
        $sheet->setCellValue('B57', "Modal Saham ");
        $sheet->setCellValue('B58', "Modal Donasi ");
        $sheet->setCellValue('B59', "Cadangan Umum ");
        $sheet->setCellValue('B60', "Cadangan Khusus ");
        $sheet->setCellValue('B61', "Tambahan Modal Disetor ");
        $sheet->setCellValue('B62', "OCI");
        $sheet->setCellValue('B63', "NCI");
        $sheet->setCellValue('B64', "Laba Ditahan");
        $sheet->setCellValue('B65', "Laba Tahun Berjalan");
        $sheet->setCellValue('A66', "Total Ekuitas");
        $sheet->setCellValue('A67', "R/K Antar Unit Usaha");
        $sheet->setCellValue('A68', "Total Liabilitas & Ekuitas");
        $sheet->getStyle('A68')->getFont()->setBold(true);
        $sheet->setCellValue('A69', "Kontrol Balance");

        $styleArray = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ];
        $styleArray_top = [
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ];
        $sheet->getStyle('A4:E68')->applyFromArray($styleArray);
        $sheet->getStyle('E4:E68')->applyFromArray($styleArray);
        $sheet->getStyle('D4:D68')->applyFromArray($styleArray);
        $sheet->getStyle('A4:E6')->applyFromArray($styleArray);
        $sheet->getStyle('A17:E17')->applyFromArray($styleArray);
        $sheet->getStyle('A28:E28')->applyFromArray($styleArray);
        $sheet->getStyle('A29:E29')->applyFromArray($styleArray);
        $sheet->getStyle('A46:E46')->applyFromArray($styleArray);
        $sheet->getStyle('A54:E54')->applyFromArray($styleArray);
        $sheet->getStyle('A55:E55')->applyFromArray($styleArray);
        $sheet->getStyle('D66:E66')->applyFromArray($styleArray_top);
        $sheet->getStyle('A68:E68')->applyFromArray($styleArray);

        $sheet->getColumnDimension('A')->setWidth(3);
        $sheet->getColumnDimension('B')->setWidth(3);
        $sheet->getColumnDimension('C')->setWidth(36);
        $sheet->getColumnDimension('D')->setWidth(13);
        $sheet->getColumnDimension('E')->setWidth(13);
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        ////////////SET NILAI UNTUK EXCEL SHEET 2///////////////////////////////////////////////////////////////////////////////////////////


        // Ambil nilai dari sel A1 pada sheet "Sheet2"
        // $cellValue = $sheet1->getCell('A1')->getValue();
        $sheet->setCellValue('D9', "='Trial Balance'!F197/1000000");
        $sheet->setCellValue('E9', "='Trial Balance'!I197/1000000");
        $sheet->setCellValue('D10', "='Trial Balance'!F205/1000000");
        $sheet->setCellValue('E10', "='Trial Balance'!I205/1000000");
        $sheet->setCellValue('D11', "='Trial Balance'!F267/1000000");
        $sheet->setCellValue('E11', "='Trial Balance'!I267/1000000");
        $sheet->setCellValue('D12', "='Trial Balance'!F273/1000000");
        $sheet->setCellValue('E12', "='Trial Balance'!I273/1000000");
        $sheet->setCellValue('D13', "='Trial Balance'!F288/1000000");
        $sheet->setCellValue('E13', "='Trial Balance'!I288/1000000");
        $sheet->setCellValue('D14', "='Trial Balance'!F313/1000000");
        $sheet->setCellValue('E14', "='Trial Balance'!I313/1000000");
        $sheet->setCellValue('D15', "=('Trial Balance'!F324+'Trial Balance'!F335)/1000000");
        $sheet->setCellValue('E15', "=('Trial Balance'!I324+'Trial Balance'!I335)/1000000");
        $sheet->setCellValue('D16', "='Trial Balance'!F347/1000000");
        $sheet->setCellValue('E16', "='Trial Balance'!I347/1000000");

        $this-> generateFormula($sheet, 'D' ,'E', '9', '16', '17');

        $sheet->setCellValue('D19', "='Trial Balance'!F355/1000000");
        $sheet->setCellValue('E19', "='Trial Balance'!I355/1000000");
        $sheet->setCellValue('D20', "='Trial Balance'!F360/1000000");
        $sheet->setCellValue('E20', "='Trial Balance'!I360/1000000");
        $sheet->setCellValue('D21', "='Trial Balance'!F372/1000000");
        $sheet->setCellValue('E21', "='Trial Balance'!I372/1000000");
        $sheet->setCellValue('D22', "=('Trial Balance'!F401+'Trial Balance'!F430)/1000000");
        $sheet->setCellValue('E22', "=('Trial Balance'!I401+'Trial Balance'!I430)/1000000");
        $sheet->setCellValue('D23', "='Trial Balance'!F443/1000000");
        $sheet->setCellValue('E23', "='Trial Balance'!I443/1000000");
        $sheet->setCellValue('D24', "='Trial Balance'!F463/1000000");
        $sheet->setCellValue('E24', "='Trial Balance'!I463/1000000");
        $sheet->setCellValue('D25', "='Trial Balance'!F473/1000000");
        $sheet->setCellValue('E25', "='Trial Balance'!I473/1000000");
        $sheet->setCellValue('D26', "='Trial Balance'!F481/1000000");
        $sheet->setCellValue('E26', "='Trial Balance'!I481/1000000");
        $sheet->setCellValue('D27', "='Trial Balance'!F485/1000000");
        $sheet->setCellValue('E27', "='Trial Balance'!I485/1000000");

        $this-> generateFormula($sheet, 'D' ,'E', '19', '27', '28');

        $sheet->setCellValue('D29', "=D17+D28");
        $sheet->setCellValue('E29', "=E17+E28");
        $sheet->setCellValue('D32', 0);
        $sheet->setCellValue('E32', 0);

        $sheet->setCellValue('D33', "=-('Trial Balance'!F498)/1000000");
        $sheet->setCellValue('E33', "=-('Trial Balance'!I498)/1000000");
        $sheet->setCellValue('D34', "=-('Trial Balance'!F532)/1000000");
        $sheet->setCellValue('E34', "=-('Trial Balance'!I532)/1000000");
        $sheet->setCellValue('D36', "=-('Trial Balance'!F537)/1000000");
        $sheet->setCellValue('E36', "=-('Trial Balance'!I537)/1000000");
        $sheet->setCellValue('D37', "=-('Trial Balance'!F557)/1000000-'Neraca'!F36");
        $sheet->setCellValue('E37', "=-('Trial Balance'!I557)/1000000-'Neraca'!I36");
        $sheet->setCellValue('D38', "=-('Trial Balance'!F571)/1000000");
        $sheet->setCellValue('E38', "=-('Trial Balance'!I571)/1000000");
        $sheet->setCellValue('D39', "=-('Trial Balance'!F579)/1000000");
        $sheet->setCellValue('E39', "=-('Trial Balance'!I579)/1000000");
        $sheet->setCellValue('D41', "=-('Trial Balance'!F589+'Trial Balance'!F590)/1000000");
        $sheet->setCellValue('E41', "=-('Trial Balance'!I589+'Trial Balance'!I590)/1000000");
        $sheet->setCellValue('D42', "=-('Trial Balance'!F591+'Trial Balance'!F592)/1000000");
        $sheet->setCellValue('E42', "=-('Trial Balance'!I591+'Trial Balance'!I592)/1000000");
        $sheet->setCellValue('D43', "=-('Trial Balance'!F593)/1000000");
        $sheet->setCellValue('E43', "=-('Trial Balance'!I593)/1000000");
        $sheet->setCellValue('D44', "=-('Trial Balance'!F601)/1000000");
        $sheet->setCellValue('E44', "=-('Trial Balance'!I601)/1000000");
        $sheet->setCellValue('D45', 0);
        $sheet->setCellValue('E45', 0);
        $this-> generateFormula($sheet, 'D' ,'E', '32', '45', '46');
        $sheet->setCellValue('D49', "=-('Trial Balance'!F614+'Trial Balance'!F615)/1000000");
        $sheet->setCellValue('E49', "=-('Trial Balance'!I614+'Trial Balance'!I615)/1000000");
        $sheet->setCellValue('D50', "=-('Trial Balance'!F616+'Trial Balance'!F617)/1000000");
        $sheet->setCellValue('E50', "=-('Trial Balance'!I616+'Trial Balance'!I617)/1000000");
        $sheet->setCellValue('D51', "=-('Trial Balance'!F618)/1000000");
        $sheet->setCellValue('E51', "=-('Trial Balance'!I618)/1000000");
        $sheet->setCellValue('D52', 0);
        $sheet->setCellValue('E52', 0);
        $sheet->setCellValue('D53', "=-('Trial Balance'!F627)/1000000");
        $sheet->setCellValue('E53', "=-('Trial Balance'!I627)/1000000");
        $this-> generateFormula($sheet, 'D' ,'E', '49', '53', '54');
        $sheet->setCellValue('D55', "=D46+D54");
        $sheet->setCellValue('E55', "=E46+E54");
        $sheet->setCellValue('D57', "=-('Trial Balance'!F644)/1000000");
        $sheet->setCellValue('E57', "=-('Trial Balance'!I644)/1000000");
        $sheet->setCellValue('D58', "=-('Trial Balance'!F646)/1000000");
        $sheet->setCellValue('E58', "=-('Trial Balance'!I646)/1000000");
        $sheet->setCellValue('D59', "=-('Trial Balance'!F647)/1000000");
        $sheet->setCellValue('E59', "=-('Trial Balance'!I647)/1000000");
        $sheet->setCellValue('D60', "=-('Trial Balance'!F648)/1000000");
        $sheet->setCellValue('E60', "=-('Trial Balance'!I648)/1000000");
        $sheet->setCellValue('D61', "=-('Trial Balance'!F650)/1000000");
        $sheet->setCellValue('E61', "=-('Trial Balance'!I650)/1000000");
        $sheet->setCellValue('D62', "=-SUM('Trial Balance'!F664:F669)/1000000");
        $sheet->setCellValue('E62', "=-SUM('Trial Balance'!I664:I669)/1000000");
        $sheet->setCellValue('D63', "=-('Trial Balance'!F671+'Trial Balance'!F674)/1000000");
        $sheet->setCellValue('E63', "=-('Trial Balance'!I671+'Trial Balance'!I674)/1000000");
        $sheet->setCellValue('D64', "=-('Trial Balance'!F654)/1000000");
        $sheet->setCellValue('E64', "=-('Trial Balance'!I654)/1000000");
        $sheet->setCellValue('D65', "=-('Trial Balance'!F652)/1000000");
        $sheet->setCellValue('E65', "=-('Trial Balance'!I652)/1000000");
        $this-> generateFormula($sheet, 'D' ,'E', '57', '65', '66');
        $sheet->setCellValue('D67', "=-('Trial Balance'!F698)/1000000");
        $sheet->setCellValue('E67', "=-('Trial Balance'!I698)/1000000");
        $sheet->setCellValue('D68', "=D55+D66+D67");
        $sheet->setCellValue('E68', "=E55+E66+E67");
        $sheet->setCellValue('D69', "=D29-D68");
        $sheet->setCellValue('E69', "=E29-E68");






        $spreadsheet->getActiveSheet(1)->getStyle('D9:E69')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

        //////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Neraca");
        // Proses file excel

    }

    function generateFormulaSum($sheet, $startRow, $endRow, $cellset)
    {
        $startColumn = 'F';
        $endColumn = 'I';

        $columnCount = PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($endColumn) - PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + 1;

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=SUM(" . $column . $startRow . ":" . $column . $endRow . ")";
            $sheet->setCellValue($column . $cellset, $formula);
        }
    }
    function generateFormula($sheet, $startColumn ,$endColumn, $startRow, $endRow, $cellset)
    {
       
        $columnCount = PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($endColumn) - PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + 1;

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=SUM(" . $column . $startRow . ":" . $column . $endRow . ")";
            $sheet->setCellValue($column . $cellset, $formula);
        }
    }

    public function kunci_saldo_bulan($bulan)
    {
        $vbulan = date("m", strtotime($bulan)); //format bulan 
        $vtahun = date('Y', strtotime($bulan)); //format tahun 

        $page_data = $this->M_Laporan_Jurnal->trial_balance_bulan($bulan);

        $check = $this->db->get_where('trial_balance', ['bulan' => $vbulan, 'tahun' => $vtahun])->result();
        if (count($check) < 0) {
            foreach ($page_data as $row) {
                $data = [
                    'rekening' => $row['rekening'],
                    'saldo_awal' => $row['saldo_awal'],
                    'debet' => $row['debet'],
                    'kredit' => $row['kredit'],
                    'saldo_akhir' => $row['saldo_akhir'],
                    'bulan' => $vbulan,
                    'tahun' => $vtahun,
                ];
                $this->M_Laporan_Jurnal->insert($data, 'trial_balance');
            }
        } else {
            $this->M_Laporan_Jurnal->delete(['bulan' => $vbulan, 'tahun' => $vtahun], 'trial_balance');
            foreach ($page_data as $row) {
                $data = [
                    'rekening' => $row['rekening'],
                    'saldo_awal' => $row['saldo_awal'],
                    'debet' => $row['debet'],
                    'kredit' => $row['kredit'],
                    'saldo_akhir' => $row['saldo_akhir'],
                    'bulan' => $vbulan,
                    'tahun' => $vtahun,
                ];
                $this->M_Laporan_Jurnal->insert($data, 'trial_balance');
            }
        }
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Trial_balance extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Laporan_Jurnal');
    }
    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Jurnal/Trial_balance';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function export($mulai, $akhir)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $hijau = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => '00FF00' // Warna kuning
                ]
            ]
        ];
        $jingga = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'FFCC00' // Warna kuning
                ]
            ]
        ];
        $biru = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => '99CCFF' // Warna kuning
                ]
            ]
        ];
        $merah = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'FF0000' // Warna kuning
                ]
            ]
        ];


        $sheet->setCellValue('A1', "Index");
        $sheet->mergeCells('A1:B4');
        $sheet->setCellValue('C1', "KETERANGAN");
        $sheet->mergeCells('C1:D4');
        $sheet->setCellValue('E1', "Kode Akun");
        $sheet->setCellValue('F1', "Saldo Awal");
        $sheet->setCellValue('G1', "Debit");
        $sheet->setCellValue('H1', "Kredit");
        $sheet->setCellValue('I1', "Saldo Akhir");
        $sheet->getStyle('A1:I1')->getFont()->setBold(true);
        $sheet->mergeCells('E1:E4');
        $sheet->mergeCells('F1:F4');
        $sheet->mergeCells('G1:G4');
        $sheet->mergeCells('H1:H4');
        $sheet->mergeCells('I1:I4');

        $sheet->setCellValue('A5', "A");
        $sheet->getStyle('A5')->getFont()->setBold(true);
        $sheet->setCellValue('C5', "ASET LANCAR");
        $sheet->getStyle('C5')->getFont()->setBold(true);
        $sheet->setCellValue('A6', "A1");
        $sheet->getStyle('A6')->getFont()->setBold(true);
        $sheet->setCellValue('C6', "KAS&SETARA KAS");
        $sheet->getStyle('C6')->getFont()->setBold(true);
        $sheet->setCellValue('B7', "A1.1");
        $sheet->getStyle('B7')->getFont()->setBold(true);
        $sheet->setCellValue('C7', "KAS");
        $sheet->getStyle('C7')->getFont()->setBold(true);
        $sheet->setCellValue('D8', "Kas Rupiah");
        $sheet->setCellValue('E8', "101.01.100");
        $sheet->setCellValue('D9', "kas Kecil - Adm Medis");
        $sheet->setCellValue('E9', "101.02.101");
        $sheet->setCellValue('D10', "kas Kecil - Teknik/Umum");
        $sheet->setCellValue('E10', "101.02.102");
        $sheet->setCellValue('D11', "kas Kecil - Logistik");
        $sheet->setCellValue('E11', "101.02.103");
        $sheet->setCellValue('D12', "kas Kecil - SDM");
        $sheet->setCellValue('E12', "101.02.104");
        $sheet->setCellValue('D13', "kas Kecil - Sesuai Lokasi");
        $sheet->setCellValue('E13', "101.02.1xx");
        $sheet->setCellValue('D14', "TOTAL KAS ");
        $sheet->getStyle('D14:I14')->applyFromArray($hijau);

        $sheet->setCellValue('B16', "A1.2");
        $sheet->getStyle('B16')->getFont()->setBold(true);
        $sheet->setCellValue('C16', "BANK");
        $sheet->getStyle('C16')->getFont()->setBold(true);
        $sheet->setCellValue('D17', "Bank Mandiri - Rupiah - korporat(OPS)");
        $sheet->setCellValue('E17', "102.01.101");
        $sheet->setCellValue('D18', "Bank Mandiri - Rupiah - korporat(PBM Peduli)");
        $sheet->setCellValue('E18', "102.01.102");
        $sheet->setCellValue('D19', "Bank Mandiri - Rupiah - RSPP(Sweeping)");
        $sheet->setCellValue('E19', "102.01.103");
        $sheet->setCellValue('D20', "Bank Mandiri - Rupiah - RSPP(Sweeping)");
        $sheet->setCellValue('E20', "102.01.104");
        $sheet->setCellValue('D21', "Bank Mandiri - Rupiah - RSPP(Dropping)");
        $sheet->setCellValue('E21', "102.01.105");
        $sheet->setCellValue('D22', "Bank Mandiri - Rupiah - RSPJ(Sweeping)");
        $sheet->setCellValue('E22', "102.01.106");
        $sheet->setCellValue('D23', "Bank Mandiri - Rupiah - RSPJ(Sweeping)");
        $sheet->setCellValue('E23', "102.01.107");
        $sheet->setCellValue('D24', "Bank Mandiri - Rupiah - RSPJ(Dropping)");
        $sheet->setCellValue('E24', "102.01.108");
        $sheet->setCellValue('D25', "Bank Mandiri - Rupiah - RSPB(Sweeping)");
        $sheet->setCellValue('E25', "102.01.109");
        $sheet->setCellValue('D26', "Bank Mandiri - Rupiah - RSPB(Dropping)");
        $sheet->setCellValue('E26', "102.01.110");
        $sheet->setCellValue('D27', "Bank Mandiri - Rupiah - RSPC");
        $sheet->setCellValue('E27', "102.01.111");
        $sheet->setCellValue('D28', "Bank Mandiri - Rupiah - RSPC");
        $sheet->setCellValue('E28', "102.01.112");
        $sheet->setCellValue('D29', "Bank Mandiri - Rupiah - RSPPBM");
        $sheet->setCellValue('E29', "102.01.113");
        $sheet->setCellValue('D30', "Bank Mandiri - Rupiah - RSPPBM");
        $sheet->setCellValue('E30', "102.01.114");
        $sheet->setCellValue('D31', "Bank Mandiri - Rupiah - RSPTr");
        $sheet->setCellValue('E31', "102.01.115");
        $sheet->setCellValue('D32', "Bank Mandiri - Rupiah - RSPTr");
        $sheet->setCellValue('E32', "102.01.116");
        $sheet->setCellValue('D33', "Bank Mandiri - Rupiah - RSPT");
        $sheet->setCellValue('E33', "102.01.117");
        $sheet->setCellValue('D34', "Bank Mandiri - Rupiah - RSPT");
        $sheet->setCellValue('E34', "102.01.118");
        $sheet->setCellValue('D35', "Bank Mandiri - Rupiah - RSPS");
        $sheet->setCellValue('E35', "102.01.119");
        $sheet->setCellValue('D36', "Bank Mandiri - Rupiah - RSPS");
        $sheet->setCellValue('E36', "102.01.120");
        $sheet->setCellValue('D37', "Bank Mandiri - Rupiah - RSPPBR");
        $sheet->setCellValue('E37', "102.01.121");
        $sheet->setCellValue('D38', "Bank Mandiri - Rupiah - RSPPBR");
        $sheet->setCellValue('E38', "102.01.122");
        $sheet->setCellValue('D39', "Bank Mandiri - Rupiah - RSPPLJ");
        $sheet->setCellValue('E39', "102.01.123");
        $sheet->setCellValue('D40', "Bank Mandiri - Rupiah - RSPPLJ");
        $sheet->setCellValue('E40', "102.01.124");
        $sheet->setCellValue('D41', "Bank Mandiri - Rupiah - RSP.Balongan");
        $sheet->setCellValue('E41', "102.01.125");
        $sheet->setCellValue('D42', "Bank Mandiri - Rupiah - RSP.Balongan");
        $sheet->setCellValue('E42', "102.01.126");
        $sheet->setCellValue('D43', "Bank Mandiri - Rupiah - RSP.Cilacap");
        $sheet->setCellValue('E43', "102.01.127");
        $sheet->setCellValue('D44', "Bank Mandiri - Rupiah - RSP.Cilacap");
        $sheet->setCellValue('E44', "102.01.128");
        $sheet->setCellValue('D45', "Bank Mandiri - Rupiah - RSP.Dumai");
        $sheet->setCellValue('E45', "102.01.129");
        $sheet->setCellValue('D46', "Bank Mandiri - Rupiah - RSP.Dumai");
        $sheet->setCellValue('E46', "102.01.130");
        $sheet->setCellValue('D47', "Bank Mandiri - Rupiah - RSP.Rantau");
        $sheet->setCellValue('E47', "102.01.131");
        $sheet->setCellValue('D48', "Bank Mandiri - Rupiah - RSP.Rantau");
        $sheet->setCellValue('E48', "102.01.132");
        $sheet->setCellValue('D49', "Bank Mandiri - Rupiah - Korporat");
        $sheet->setCellValue('E49', "102.01.133");
        $sheet->setCellValue('D50', "Bank Mandiri - Rupiah - .....(ANAK PERUSAHAAN/OPERASIONAL)");
        $sheet->setCellValue('E50', "102.01.134");
        $sheet->setCellValue('D51', "Bank Mandiri - Rupiah - .....(ANAK PERUSAHAAN/SWEEPING)");
        $sheet->setCellValue('E51', "102.01.135");
        $sheet->setCellValue('D52', "Bank Mandiri - Rupiah - KLINIK (Sweeping)");
        $sheet->setCellValue('E52', "102.01.136");
        $sheet->setCellValue('D53', "Bank Mandiri - Rupiah - KLINIK (Dropping)");
        $sheet->setCellValue('E53', "102.01.137");
        $sheet->setCellValue('D54', "Bank Mandiri - Rupiah - Korporat");
        $sheet->setCellValue('E54', "102.01.138");
        $sheet->setCellValue('D55', "Bank Mandiri - Rupiah - RSP Royal Biringkanaya (Sweeping)");
        $sheet->setCellValue('E55', "102.01.139");
        $sheet->setCellValue('D55', "Bank Mandiri - Rupiah - RSP Royal Biringkanaya (Sweeping)");
        $sheet->setCellValue('E55', "102.01.139");
        $sheet->setCellValue('D57', "Bank BNI - Korporat(Melawai)");
        $sheet->setCellValue('E57', "102.02.101");
        $sheet->setCellValue('D58', "Bank BNI - Korporat(Mayestik)");
        $sheet->setCellValue('E58', "102.02.102");
        $sheet->setCellValue('D59', "Bank BNI - RSPP");
        $sheet->setCellValue('E59', "102.02.103");
        $sheet->setCellValue('D60', "Bank BNI - RSPB");
        $sheet->setCellValue('E60', "102.02.104");
        $sheet->setCellValue('D61', "Bank BNI - RSPTr");
        $sheet->setCellValue('E61', "102.02.105");
        $sheet->setCellValue('D62', "Bank BNI - Rupiah - .....(ANAK PERUSAHAAN/OPERASIONAL)");
        $sheet->setCellValue('E62', "102.02.106");
        $sheet->setCellValue('D63', "Bank BNI - Rupiah - .....(ANAK PERUSAHAAN/SWEEPING)");
        $sheet->setCellValue('E63', "102.02.107");
        $sheet->setCellValue('D64', "Bank BNI - Rupiah - RSPJ");
        $sheet->setCellValue('E64', "102.02.108");
        $sheet->setCellValue('D65', "Bank BNI - Rupiah - KLINIK");
        $sheet->setCellValue('E65', "1102.02.109");
        $sheet->setCellValue('D66', "Bank BNI - Rupiah - RSP Royal Biringkanaya (Sweeping)");
        $sheet->setCellValue('E66', "102.02.110");
        $sheet->setCellValue('D67', "Bank BNI - Rupiah - RSP Royal Biringkanaya (Dropping)");
        $sheet->setCellValue('E67', "102.02.111");
        $sheet->setCellValue('D69', "Bank BNI - Dollar - Korporat");
        $sheet->setCellValue('E69', "102.02.201");
        $sheet->setCellValue('D70', "Bank BNI - Dollar ....(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E70', "102.02.202");
        $sheet->setCellValue('D72', "Bank BRI - Korporat");
        $sheet->setCellValue('E72', "102.03.101");
        $sheet->setCellValue('D73', "Bank BRI - RSPP");
        $sheet->setCellValue('E73', "102.03.102");
        $sheet->setCellValue('D74', "Bank BRI - RSPP");
        $sheet->setCellValue('E74', "102.03.103");
        $sheet->setCellValue('D75', "Bank BRI - RSPJ");
        $sheet->setCellValue('E75', "102.03.104");
        $sheet->setCellValue('D76', "Bank BRI - RSPC");
        $sheet->setCellValue('E76', "102.03.105");
        $sheet->setCellValue('D77', "Bank BRI - RSPT");
        $sheet->setCellValue('E77', "102.03.106");
        $sheet->setCellValue('D78', "Bank BRI - RSPPBR");
        $sheet->setCellValue('E78', "102.03.107");
        $sheet->setCellValue('D79', "Bank BRI -RSPB");
        $sheet->setCellValue('E79', "102.03.108");
        $sheet->setCellValue('D80', "Bank BRI AGRO - KORPORAT");
        $sheet->setCellValue('E80', "102.03.109");
        $sheet->setCellValue('D81', "Bank BRI - RSPPBM");
        $sheet->setCellValue('E81', "102.03.110");
        $sheet->setCellValue('D82', "Bank BRI - RSPTr");
        $sheet->setCellValue('E82', "102.03.111");
        $sheet->setCellValue('D83', "Bank BRI - RSPS");
        $sheet->setCellValue('E83', "102.03.112");
        $sheet->setCellValue('D84', "Bank BRI - RSP.Balongan");
        $sheet->setCellValue('E84', "102.03.113");
        $sheet->setCellValue('D85', "Bank BRI - RSP.Cilacap");
        $sheet->setCellValue('E85', "102.03.114");
        $sheet->setCellValue('D86', "Bank BRI - RSP.Dumai");
        $sheet->setCellValue('E86', "102.03.115");
        $sheet->setCellValue('D87', "Bank BRI - RSP.rantau");
        $sheet->setCellValue('E87', "102.03.116");
        $sheet->setCellValue('D88', "Bank BRI - Korporat");
        $sheet->setCellValue('E88', "102.03.117");
        $sheet->setCellValue('D89', "Bank BRI - Rupiah - ...(ANAK PERUSAHAAN/OPERASIONAL)");
        $sheet->setCellValue('E89', "102.03.118");
        $sheet->setCellValue('D90', "Bank BRI - Rupiah - ...(ANAK PERUSAHAAN/SWEEPING)");
        $sheet->setCellValue('E90', "102.03.119");
        $sheet->setCellValue('D91', "Bank BRI - KLINIK");
        $sheet->setCellValue('E91', "102.03.120");
        $sheet->setCellValue('D92', "Bank BRI - RSP Royal Biringkanaya");
        $sheet->setCellValue('E92', "102.03.121");
        $sheet->setCellValue('D93', "Bank BRI - Korporat(Donasi");
        $sheet->setCellValue('E93', "102.03.122");
        $sheet->setCellValue('D95', "Bank Syariah Mandiri - Korporat");
        $sheet->setCellValue('E95', "102.04.101");
        $sheet->setCellValue('D96', " Bank Syariah Mandiri - ….(ANAK PERUSAHAAN/OPERASIONAL)");
        $sheet->setCellValue('E96', "102.04.102");
        $sheet->setCellValue('D97', " Bank Syariah Mandiri - ….(ANAK PERUSAHAAN/SWEEPING)");
        $sheet->setCellValue('E97', "102.04.103");
        $sheet->setCellValue('D98', " Bank Syariah Mandiri - Rantau (Sweeping)");
        $sheet->setCellValue('E98', "102.04.104");
        $sheet->setCellValue('D99', " Bank Syariah Mandiri - Rantau (Dropping)");
        $sheet->setCellValue('E99', "102.04.105");
        $sheet->setCellValue('D100', " Bank Syariah Mandiri - ….");
        $sheet->setCellValue('E100', "102.04.107");
        $sheet->setCellValue('D102', "Bank BNI Syariah - Korporat");
        $sheet->setCellValue('E102', "102.05.101");
        $sheet->setCellValue('D103', " Bank BNI Syariah - ….(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E103', "102.05.102");
        $sheet->setCellValue('D104', " Bank BNI Syariah - ….");
        $sheet->setCellValue('D106', "Bank BRI Syariah - Korporat");
        $sheet->setCellValue('E106', "102.06.100");
        $sheet->setCellValue('D107', " Bank BRI Syariah - ….(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E107', "102.06.101");
        $sheet->setCellValue('D108', " Bank BRI Syariah - ….");
        $sheet->setCellValue('D110', "Bank Syariah Indonesia - Korporat");
        $sheet->setCellValue('D111', "Bank Syariah Indonesia - ….");
        $sheet->setCellValue('D112', "Bank Syariah Indonesia - ….");
        $sheet->setCellValue('D113', "Bank Syariah Indonesia - ….");
        $sheet->setCellValue('D114', "Bank Syariah Indonesia - ….");
        $sheet->setCellValue('D115', "Bank Syariah Indonesia - ….");
        $sheet->setCellValue('D117', "Bank BCA - Korporat");
        $sheet->setCellValue('E117', "102.11.101");
        $sheet->setCellValue('D118', "Bank BCA - RSPP");
        $sheet->setCellValue('E118', "102.11.102");
        $sheet->setCellValue('D119', "Bank BCA- RSPB");
        $sheet->setCellValue('E119', "102.11.103");
        $sheet->setCellValue('D120', "Bank BCA - RSPTr");
        $sheet->setCellValue('E120', "102.11.104");
        $sheet->setCellValue('D121', "Bank BCA - ….(ANAK PERUSAHAAN )");
        $sheet->setCellValue('E121', "102.11.105");
        $sheet->setCellValue('D123', "Bank Bukopin - Korporat");
        $sheet->setCellValue('E123', "102.19.101");
        $sheet->setCellValue('D124', "Bank Kaltim-RSPB");
        $sheet->setCellValue('E124', "102.21.101");
        $sheet->setCellValue('D125', "Bank DKI - RSPP");
        $sheet->setCellValue('E125', "102.22.101");
        $sheet->setCellValue('D126', "Bank DKI - RSPJ");
        $sheet->setCellValue('E126', "102.22.102");
        $sheet->setCellValue('D127', "Bank DKI - ….(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E127', "102.22.103");
        $sheet->setCellValue('D128', "Bank Panin - ….(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E128', "102.23.101");
        $sheet->setCellValue('D129', "Bank Permata - ….(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E129', "102.24.101");
        $sheet->setCellValue('D130', "Bank BJB - ….(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E130', "102.25.101");
        $sheet->setCellValue('D131', "Bank Muamalat - ….(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E131', "102.26.101");
        $sheet->setCellValue('D132', "Bank Jatim - ….(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E132', "102.27.101");
        $sheet->setCellValue('D133', "Bank BTN - ….(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E133', "102.28.101");
        $sheet->setCellValue('D134', "Bank CIMB NIAGA - ….(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E134', "102.29.101");
        $sheet->setCellValue('D135', "Bank Lainnya - ….(ANAK PERUSAHAAN)");
        $sheet->setCellValue('E135', "102.30.101");
        $sheet->setCellValue('D137', "Bank Mandiri - Kartu Kredit");
        $sheet->setCellValue('E137', "102.01.300");
        $sheet->setCellValue('D138', "Bank Mandiri - Kartu Debit");
        $sheet->setCellValue('E138', "102.01.400");
        $sheet->setCellValue('D139', "Bank BNI - Kartu Kredit");
        $sheet->setCellValue('E139', "102.02.300");
        $sheet->setCellValue('D140', "Bank BNI - Kartu Debit");
        $sheet->setCellValue('E140', "102.02.400");
        $sheet->setCellValue('D141', "Bank BRI - Kartu Kredit");
        $sheet->setCellValue('E141', "102.03.300");
        $sheet->setCellValue('D142', "Bank BRI - Kartu Debit");
        $sheet->setCellValue('E142', "102.03.400");
        $sheet->setCellValue('D143', "Bank BCA - Kartu Kredit");
        $sheet->setCellValue('E143', "102.11.300");
        $sheet->setCellValue('D144', "Bank BCA - Kartu Debit");
        $sheet->setCellValue('E144', "102.11.400");
        $sheet->setCellValue('D145', "Bank Bukopin - Kartu Kredit");
        $sheet->setCellValue('E145', "102.19.300");
        $sheet->setCellValue('D146', "Bank Bukopin - Kartu Debit");
        $sheet->setCellValue('E146', "102.19.400");
        $sheet->setCellValue('D147', "Bank Kaltim - Kartu Kredit");
        $sheet->setCellValue('E147', "102.21.300");
        $sheet->setCellValue('D148', "Bank Kaltim - Kartu Debit");
        $sheet->setCellValue('E148', "102.21.400");
        $sheet->setCellValue('D149', "Bank DKI - Kartu Kredit");
        $sheet->setCellValue('E149', "102.21.300");
        $sheet->setCellValue('D150', "Bank DKI - Kartu Debit");
        $sheet->setCellValue('E150', "102.21.400");
        $sheet->setCellValue('D152', "Bank BRI Cash Card - Korporat");
        $sheet->setCellValue('E152', "102.03.501");
        $sheet->setCellValue('D153', "Bank BRI Cash Card - Korporat");
        $sheet->setCellValue('E153', "102.03.502");
        $sheet->setCellValue('D154', "Bank BRI Cash Card - Korporat");
        $sheet->setCellValue('E154', "102.03.503");
        $sheet->setCellValue('D156', "Bank BRI Fleet Card - Korporat");
        $sheet->setCellValue('E156', "102.11.600");
        $sheet->setCellValue('D157', "Bank Mandiri Fleet Card - Korporat");
        $sheet->setCellValue('E157', "102.01.600");
        $sheet->setCellValue('D158', "TOTAL BANK");
        $sheet->getStyle('D158:I158')->applyFromArray($hijau);

        $sheet->setCellValue('B160', "A1.3");
        $sheet->getStyle('B160')->getFont()->setBold(true);
        $sheet->setCellValue('C160', "DEPOSITO");
        $sheet->getStyle('C160')->getFont()->setBold(true);
        $sheet->setCellValue('D161', "Deposito Mandiri - Rupiah");
        $sheet->setCellValue('E161', "103.01.100");
        $sheet->setCellValue('D162', "Deposito Mandiri - Dollar");
        $sheet->setCellValue('E162', "103.01.200");
        $sheet->setCellValue('D163', "Deposito BNI");
        $sheet->setCellValue('E163', "103.02.100");
        $sheet->setCellValue('D164', "Deposito BRI");
        $sheet->setCellValue('E164', "103.03.100");
        $sheet->setCellValue('D165', "Deposito Mandiri Syariah");
        $sheet->setCellValue('E165', "103.04.100");
        $sheet->setCellValue('D166', "Deposito BCA");
        $sheet->setCellValue('E166', "103.11.100");
        $sheet->setCellValue('D167', "Deposito Bank Jabar");
        $sheet->setCellValue('E167', "103.20.100");
        $sheet->setCellValue('D168', "Deposito Bank Bukopin");
        $sheet->setCellValue('E168', "103.21.100");
        $sheet->setCellValue('D169', "Deposito Bank BTPN");
        $sheet->setCellValue('E169', "103.22.100");
        $sheet->setCellValue('D170', "Deposito Bank BTN");
        $sheet->setCellValue('E170', "103.24.100");
        $sheet->setCellValue('D171', "Deposito Bank Jateng");
        $sheet->setCellValue('E171', "103.27.100");
        $sheet->setCellValue('D172', "Deposito Bank Permata");
        $sheet->setCellValue('E172', "103.28.100");
        $sheet->setCellValue('D173', "Deposito BJB Syariah");
        $sheet->setCellValue('E173', "103.30.100");
        $sheet->setCellValue('D174', "Deposito BRI Agroniaga ");
        $sheet->setCellValue('E174', "103.31.100");
        $sheet->setCellValue('D175', "Deposito BNI Syariah");
        $sheet->setCellValue('E175', "103.32.100");
        $sheet->setCellValue('D176', "Deposito BRI Syariah");
        $sheet->setCellValue('E176', "103.33.100");
        $sheet->setCellValue('D177', "Deposito Bank Muamalat - Anak Perusahaan");
        $sheet->setCellValue('E177', "103.19.100");
        $sheet->setCellValue('D178', "Deposito Syariah Indonesia (BSI)");
        $sheet->setCellValue('E178', "103.34.100");
        $sheet->setCellValue('D179', "Deposito Bank Jatim");
        $sheet->setCellValue('E179', "103.35.100");
        $sheet->setCellValue('D180', "Deposito Bank Mandiri Taspen");
        $sheet->setCellValue('E180', "103.36.100");
        $sheet->setCellValue('D181', "Deposito Bank DKI");
        $sheet->setCellValue('E181', "103.37.100");
        $sheet->setCellValue('D182', "Deposito Bank Lain-lain");
        $sheet->setCellValue('D183', "TOTAL DEPOSITO");
        $sheet->getStyle('D183:I183')->applyFromArray($hijau);

        $sheet->setCellValue('B185', "A1.4");
        $sheet->getStyle('B185')->getFont()->setBold(true);
        $sheet->setCellValue('C185', "MONEY IN TRANSIT");
        $sheet->getStyle('C185')->getFont()->setBold(true);
        $sheet->setCellValue('D186', "Money In Transit");
        $sheet->setCellValue('E186', "114.01.000");
        $sheet->setCellValue('D187', "Money In Transit - Pasien Cash Rawat Jalan");
        $sheet->setCellValue('E187', "114.02.000");
        $sheet->setCellValue('D188', "Money In Transit - Pasien Cash Rawat Inap");
        $sheet->setCellValue('E188', "114.03.000");
        $sheet->setCellValue('D189', "Total Money In Transit");
        $sheet->getStyle('D189:I189')->applyFromArray($hijau);

        $sheet->setCellValue('C190', "TOTAL KAS & SETARA KAS");
        $sheet->getStyle('C190:I190')->applyFromArray($jingga);

        $sheet->setCellValue('B192', "A1.5");
        $sheet->getStyle('B192')->getFont()->setBold(true);
        $sheet->setCellValue('C192', "PENYISIHAN PIUTANG KAS & SETARA KAS (PSAK 71)");
        $sheet->getStyle('C192')->getFont()->setBold(true);
        $sheet->setCellValue('D193', "Bank");
        $sheet->setCellValue('E193', "172.01.000");
        $sheet->setCellValue('D194', "Deposito");
        $sheet->setCellValue('E194', "173.01.000");
        $sheet->setCellValue('D195', "Total Penyisihan Piutang Kas & Setara Kas");
        $sheet->getStyle('D195:I195')->applyFromArray($hijau);

        $sheet->setCellValue('C197', "TOTAL KAS & SETARA KAS (NET)");
        $sheet->getStyle('C197:I197')->applyFromArray($jingga);

        $sheet->setCellValue('A199', "A2");
        $sheet->getStyle('A199')->getFont()->setBold(true);
        $sheet->setCellValue('C199', "KERTAS BERHARGA");
        $sheet->getStyle('C199')->getFont()->setBold(true);
        $sheet->setCellValue('D200', "Saham");
        $sheet->setCellValue('E200', "104.01.000");
        $sheet->setCellValue('D201', "Obligasi");
        $sheet->setCellValue('E201', "104.02.000");
        $sheet->setCellValue('D202', "Reksadana");
        $sheet->setCellValue('E202', "104.03.000");
        $sheet->setCellValue('D203', "Wesel Tagih");
        $sheet->setCellValue('E203', "104.04.000");
        $sheet->setCellValue('D204', "Deposito Berjangka > 3 Bulan");
        $sheet->setCellValue('E204', "104.05.000");
        $sheet->setCellValue('C205', "TOTAL KERTAS BERHARGA");
        $sheet->getStyle('C205:I205')->applyFromArray($jingga);

        $sheet->setCellValue('A207', "A3");
        $sheet->getStyle('A207')->getFont()->setBold(true);
        $sheet->setCellValue('C207', "PIUTANG USAHA");
        $sheet->getStyle('C207')->getFont()->setBold(true);
        $sheet->setCellValue('B208', "A3.1");
        $sheet->getStyle('B208')->getFont()->setBold(true);
        $sheet->setCellValue('C208', "PIUTANG USAHA (sebelum Penyisihan)");
        $sheet->getStyle('C208')->getFont()->setBold(true);
        $sheet->setCellValue('C209', "A3.1.1");
        $sheet->setCellValue('D209', "PIUTANG HUBUNGAN ISTIMEWA (ICT)");
        $sheet->getStyle('D209')->getFont()->setBold(true);
        $sheet->setCellValue('D210', "PERTAMINA (Persero) - Kantor Pusat ==> FFS");
        $sheet->setCellValue('E210', "105.01.100");
        $sheet->setCellValue('D211', "PERTAMINA (Persero) - Kantor Pusat ==> Kapitasi");
        $sheet->setCellValue('E211', "105.02.100");
        $sheet->setCellValue('D212', "PERTAMINA (Persero) - Unit Wilayah ==> FFS");
        $sheet->setCellValue('E212', "105.01.200");
        $sheet->setCellValue('D213', "PERTAMINA (Persero) - Unit Wilayah ==> Kapitasi");
        $sheet->setCellValue('E213', "105.02.200");
        $sheet->setCellValue('D214', "Anak Perusahaan PERTAMINA ==> FFS");
        $sheet->setCellValue('E214', "105.01.300");
        $sheet->setCellValue('D215', "Anak Perusahaan PERTAMINA ==> Kapitasi");
        $sheet->setCellValue('E215', "105.02.300");
        $sheet->setCellValue('D216', "TOTAL PIUTANG HUBUNGAN ISTIMEWA (ICT)");
        $sheet->getStyle('D216:I216')->applyFromArray($hijau);


        $sheet->getStyle('D216')->getFont()->setBold(true);
        $sheet->setCellValue('C217', "A3.1.2");
        $sheet->setCellValue('D217', "PIUTANG PIHAK YANG BERELASI");
        $sheet->getStyle('D217')->getFont()->setBold(true);
        $sheet->setCellValue('D218', "Piutang Asosiasi, Joint Venture dan Afiliasi ==> FFS");
        $sheet->setCellValue('E218', "105.01.400");
        $sheet->setCellValue('D219', "Piutang Asosiasi, Joint Venture dan Afiliasi ==> Kapitasi");
        $sheet->setCellValue('E219', "105.02.400");
        $sheet->setCellValue('D220', "Piutang Entitas yang Berelasi dengan BUMN ==> FFS");
        $sheet->setCellValue('E220', '105.01.700');
        $sheet->setCellValue('D221', "Piutang Entitas yang Berelasi dengan Pemerintah ==> FFS");
        $sheet->setCellValue('E221', "105.01.701");
        $sheet->setCellValue('D222', "Piutang Entitas yang Berelasi dengan Pemerintah ==> Kapitasi");
        $sheet->setCellValue('E222', "105.02.700");
        $sheet->setCellValue('D223', "Piutang Entitas yang Berelasi dengan BPJS ==> FFS");
        $sheet->setCellValue('E223', "105.01.900");
        $sheet->setCellValue('D224', "Piutang Entitas yang Berelasi dengan BPJS ==> Kapitasi");
        $sheet->setCellValue('E224', "105.02.900");
        $sheet->setCellValue('D225', "Piutang Entitas yang Berelasi Lainnya (Others) ==> FFS");
        $sheet->setCellValue('E225', "105.01.800");
        $sheet->setCellValue('D226', "Piutang Entitas yang Berelasi Lainnya (Others) ==> Kapitasi");
        $sheet->setCellValue('E226', "105.02.800");
        $sheet->setCellValue('D227', "TOTAL PIUTANG PIHAK YANG BERELASI");
        $sheet->getStyle('D227:I227')->applyFromArray($hijau);

        $sheet->setCellValue('C228', "A3.1.3");
        $sheet->setCellValue('D228', "PIUTANG PIHAK KETIGA");
        $sheet->getStyle('D228')->getFont()->setBold(true);
        $sheet->setCellValue('D229', "Piutang Pihak Ketiga ==> FFS");
        $sheet->setCellValue('E229', "105.01.500");
        $sheet->setCellValue('D230', "Piutang Pihak Ketiga ==> Kapitasi");
        $sheet->setCellValue('E230', "105.02.500");
        $sheet->setCellValue('D231', "Piutang Perorangan");
        $sheet->setCellValue('E231', "105.01.600");
        $sheet->setCellValue('D232', "TOTAL PIUTANG PIHAK KE III");
        $sheet->getStyle('D232:I232')->applyFromArray($hijau);

        $sheet->setCellValue('D233', "TOTAL PIUTANG USAHA (sebelum Penyisihan)");
        $sheet->getStyle('D233:I233')->applyFromArray($hijau);

        $sheet->setCellValue('B235', "A3.2");
        $sheet->getStyle('B235')->getFont()->setBold(true);
        $sheet->setCellValue('C235', "PENYISIHAN PIUTANG");
        $sheet->getStyle('C235')->getFont()->setBold(true);
        $sheet->setCellValue('D236', "PERTAMINA (Persero) - Kantor Pusat");
        $sheet->setCellValue('E236', "r");
        $sheet->setCellValue('D237', "PERTAMINA (Persero) - Unit Wilayah");
        $sheet->setCellValue('E237', "175.01.200");
        $sheet->setCellValue('D238', "Anak Perusahaan PERTAMINA");
        $sheet->setCellValue('E238', "175.01.300");
        $sheet->setCellValue('D239', "Piutang Asosiasi, Joint Venture dan Afiliasi");
        $sheet->setCellValue('E239', "175.01.400");
        $sheet->setCellValue('D240', "Piutang Entitas yang Berelasi dengan BUMN");
        $sheet->setCellValue('E240', "175.01.700");
        $sheet->setCellValue('D241', "Piutang Entitas yang Berelasi dengan Pemerintah");
        $sheet->setCellValue('E241', "175.01.701");
        $sheet->setCellValue('D242', "Piutang Entitas yang Berelasi dengan BPJS");
        $sheet->setCellValue('E242', "175.01.900");
        $sheet->setCellValue('D243', "Piutang Entitas yang Berelasi Lainnya (Others)");
        $sheet->setCellValue('E243', "175.01.800");
        $sheet->setCellValue('D244', "Piutang Pihak Ketiga");
        $sheet->setCellValue('E244', "175.01.500");
        $sheet->setCellValue('D245', "Piutang Perorangan");
        $sheet->setCellValue('E245', "175.01.600");
        $sheet->setCellValue('D246', "Total Penyisihan Piutang");
        $sheet->getStyle('D246:I246')->applyFromArray($hijau);

        $sheet->setCellValue('B248', "A3.3");
        $sheet->getStyle('B248')->getFont()->setBold(true);
        $sheet->setCellValue('C248', "PIUTANG UNBILL");
        $sheet->getStyle('C248')->getFont()->setBold(true);
        $sheet->setCellValue('C249', "A3.3.1");
        $sheet->setCellValue('D249', "PIUTANG UNBILL – HUBUNGAN ISTIMEWA (ICT)");
        $sheet->getStyle('D249')->getFont()->setBold(true);
        $sheet->setCellValue('D250', "PERTAMINA (Persero) - Kantor Pusat");
        $sheet->setCellValue('E250', "105.03.100");
        $sheet->setCellValue('D251', "PERTAMINA (Persero) - Unit Wilayah");
        $sheet->setCellValue('E251', "105.03.200");
        $sheet->setCellValue('D252', "Anak Perusahaan PERTAMINA");
        $sheet->setCellValue('E252', "105.03.300");
        $sheet->setCellValue('D253', "TOTAL PIUTANG UNBILL – HUBUNGAN ISTIMEWA (ICT)");
        $sheet->getStyle('D253:I253')->applyFromArray($hijau);

        $sheet->setCellValue('C254', "A3.3.2");
        $sheet->setCellValue('D254', "PIUTANG UNBILL – PIHAK YANG BERELASI");
        $sheet->getStyle('D254')->getFont()->setBold(true);
        $sheet->setCellValue('D255', "Piutang Asosiasi, Joint Venture dan Afiliasi");
        $sheet->setCellValue('E255', "105.03.400");
        $sheet->setCellValue('D256', "Piutang Entitas yang Berelasi dengan BUMN");
        $sheet->setCellValue('E256', "105.03.700");
        $sheet->setCellValue('D257', "Piutang Entitas yang Berelasi dengan Pemerintah");
        $sheet->setCellValue('E257', "105.03.701");
        $sheet->setCellValue('D258', "Piutang Entitas yang Berelasi dengan BPJS");
        $sheet->setCellValue('E258', "105.03.900");
        $sheet->setCellValue('D259', "Piutang Entitas yang Berelasi Others");
        $sheet->setCellValue('E259', "105.03.800");
        $sheet->setCellValue('C260', "A3.3.3");
        $sheet->setCellValue('D260', "TOTAL PIUTANG UNBILL – PIHAK YANG BERELASI");
        $sheet->getStyle('D260:I260')->applyFromArray($hijau);

        $sheet->setCellValue('D261', "PIUTANG UNBILL – PIHAK KETIGA");
        $sheet->getStyle('D261')->getFont()->setBold(true);
        $sheet->setCellValue('D262', "Piutang Pihak Ketiga");
        $sheet->setCellValue('E262', "105.03.500");
        $sheet->setCellValue('D263', "Piutang Perorangan");
        $sheet->setCellValue('E263', "105.03.600");
        $sheet->setCellValue('C264', "A3.3.4");
        $sheet->setCellValue('D264', "TOTAL PIUTANG UNBILL – PIHAK KE III");
        $sheet->getStyle('D264:I264')->applyFromArray($hijau);

        $sheet->setCellValue('D265', "TOTAL PIUTANG UNBILL");
        $sheet->getStyle('D265:I265')->applyFromArray($hijau);

        $sheet->setCellValue('C267', "TOTAL PIUTANG USAHA (NET)");
        $sheet->getStyle('C267:I267')->applyFromArray($jingga);

        $sheet->setCellValue('A269', "A4");
        $sheet->getStyle('A269')->getFont()->setBold(true);
        $sheet->setCellValue('C269', "PENDAPATAN YANG MASIH AKAN DITERIMA");
        $sheet->getStyle('C269')->getFont()->setBold(true);
        $sheet->setCellValue('D270', "Pendapatan yang masih akan diterima");
        $sheet->setCellValue('E270', "113.01.000");
        $sheet->setCellValue('D271', "Pendapatan yang masih akan diterima Cut Off Layanan");
        $sheet->setCellValue('E271', "113.02.000");
        $sheet->setCellValue('D272', "Pendapatan yang masih akan diterima lainnya");
        $sheet->setCellValue('E272', "113.03.000");
        $sheet->setCellValue('C273', "TOTAL PENDAPATAN YANG MASIH AKAN DITERIMA");
        $sheet->getStyle('C273:I273')->applyFromArray($jingga);

        $sheet->setCellValue('A275', "A5");
        $sheet->getStyle('A275')->getFont()->setBold(true);
        $sheet->setCellValue('C275', "PIUTANG LAIN-LAIN");
        $sheet->getStyle('C275')->getFont()->setBold(true);
        $sheet->setCellValue('B276', "A5.1");
        $sheet->getStyle('B276')->getFont()->setBold(true);
        $sheet->setCellValue('C276', "PIUTANG LAIN-LAIN");
        $sheet->getStyle('C276')->getFont()->setBold(true);
        $sheet->setCellValue('D277', "Piutang Pekerja");
        $sheet->setCellValue('E277', "106.01.000");
        $sheet->setCellValue('D278', "Piutang STIKES");
        $sheet->setCellValue('E278', "107.05.000");
        $sheet->setCellValue('D279', "Piutang Lain-lain");
        $sheet->setCellValue('E279', "107.99.000");
        $sheet->setCellValue('C280', "TOTAL PIUTANG LAIN-LAIN");
        $sheet->getStyle('C280:I280')->applyFromArray($jingga);

        $sheet->setCellValue('B282', "A5.2");
        $sheet->getStyle('B276')->getFont()->setBold(true);
        $sheet->setCellValue('C282', "PENYISIHAN PIUTANG LAIN-LAIN (PSAK 71)");
        $sheet->getStyle('C282')->getFont()->setBold(true);
        $sheet->setCellValue('D283', "Piutang Pekerja");
        $sheet->setCellValue('E283', "176.01.000");
        $sheet->setCellValue('D284', "Piutang STIKES");
        $sheet->setCellValue('E284', "177.05.000");
        $sheet->setCellValue('D285', "Piutang Lain-lain");
        $sheet->setCellValue('E285', "177.99.000");
        $sheet->setCellValue('C286', "TOTAL PENYISIHAN PIUTANG LAIN-LAIN");
        $sheet->getStyle('C286')->getFont()->setBold(true);
        $sheet->getStyle('C286:I286')->applyFromArray($jingga);
        $sheet->setCellValue('C288', "TOTAL PIUTANG LAIN-LAIN (NET)");
        $sheet->getStyle('C288:I288')->applyFromArray($jingga);

        $sheet->setCellValue('A290', "A6");
        $sheet->getStyle('A290')->getFont()->setBold(true);
        $sheet->setCellValue('C290', "PERSEDIAAN");
        $sheet->getStyle('C290')->getFont()->setBold(true);
        $sheet->setCellValue('B291', "A6.1");
        $sheet->getStyle('B291')->getFont()->setBold(true);
        $sheet->setCellValue('C291', "PERSEDIAAN OBAT & ALKES");
        $sheet->getStyle('C291')->getFont()->setBold(true);
        $sheet->setCellValue('D292', "Persediaan Obat Jadi");
        $sheet->setCellValue('E292', "109.01.000");
        $sheet->setCellValue('D293', "Persediaan Bahan Obat");
        $sheet->setCellValue('E293', "109.02.000");
        $sheet->setCellValue('D294', "Persediaan Medical supplies");
        $sheet->setCellValue('E294', "109.03.000");
        $sheet->setCellValue('D295', "TOTAL PERSEDIAAN OBAT & ALKES");
        $sheet->getStyle('D295:I295')->applyFromArray($hijau);

        $sheet->setCellValue('B297', "A6.2");
        $sheet->getStyle('B297')->getFont()->setBold(true);
        $sheet->setCellValue('C297', "PERSEDIAAN BARANG UMUM");
        $sheet->getStyle('C297')->getFont()->setBold(true);
        $sheet->setCellValue('D298', "Persediaan Barang Umum");
        $sheet->setCellValue('E298', "109.04.000");
        $sheet->setCellValue('D299', "Persediaan Barang Teknik");
        $sheet->setCellValue('E299', "109.05.000");
        $sheet->setCellValue('D300', "Persediaan Komputer Supplies");
        $sheet->setCellValue('E300', "109.06.000");
        $sheet->setCellValue('D301', "Persediaan Lainnya");
        $sheet->setCellValue('E301', "109.99.000");
        $sheet->setCellValue('D302', "TOTAL PERSEDIAAN BARANG UMUM");
        $sheet->getStyle('D302:I302')->applyFromArray($hijau);

        $sheet->setCellValue('B304', "A6.3");
        $sheet->getStyle('B304')->getFont()->setBold(true);
        $sheet->setCellValue('C304', "SELISIH PERHITUNGAN PERSEDIAAN");
        $sheet->getStyle('C304')->getFont()->setBold(true);
        $sheet->setCellValue('D305', "Rekening Sementara Selisih Perhitungan Obat Jadi ");
        $sheet->setCellValue('E305', "303.11.000");
        $sheet->setCellValue('D306', "Rekening Sementara Selisih Perhitungan Bahan Obat");
        $sheet->setCellValue('E306', "303.12.000");
        $sheet->setCellValue('D307', "Rekening Sementara Selisih Perhitungan Medical Supplies");
        $sheet->setCellValue('E307', "303.13.000");
        $sheet->setCellValue('D308', "Rekening Sementara Selisih Perhitungan Barang Umum");
        $sheet->setCellValue('E308', "303.14.000");
        $sheet->setCellValue('D309', "Rekening Sementara Selisih Perhitungan Barang Teknik");
        $sheet->setCellValue('E309', "303.15.000");
        $sheet->setCellValue('D310', "Rekening Sementara Selisih Perhitungan Komputer");
        $sheet->setCellValue('E310', "303.16.000");
        $sheet->setCellValue('D311', "TOTAL SELISIH PERHITUNGAN PERSEDIAAN");
        $sheet->getStyle('D311:I311')->applyFromArray($hijau);

        $sheet->setCellValue('C313', "TOTAL PERSEDIAAN");
        $sheet->getStyle('C313:I313')->applyFromArray($jingga);

        $sheet->setCellValue('A315', "A7");
        $sheet->getStyle('A315')->getFont()->setBold(true);
        $sheet->setCellValue('C315', "UANG MUKA / PANJAR KERJA");
        $sheet->getStyle('C315')->getFont()->setBold(true);
        $sheet->setCellValue('D316', "Perjalanan Dinas");
        $sheet->setCellValue('E316', "108.01.000");
        $sheet->setCellValue('D317', "Operasional");
        $sheet->setCellValue('E317', "108.02.000");
        $sheet->setCellValue('D318', "Layanan Kesehatan");
        $sheet->setCellValue('E318', "108.03.000");
        $sheet->setCellValue('D319', "Survey, Study & Pengembangan");
        $sheet->setCellValue('E319', "108.04.000");
        $sheet->setCellValue('D320', "Pendidikan");
        $sheet->setCellValue('E320', "108.05.000");
        $sheet->setCellValue('D321', "Perawatan /Pekerjaan Teknik");
        $sheet->setCellValue('E321', "108.06.000");
        $sheet->setCellValue('D322', "Perijinan");
        $sheet->setCellValue('E322', "108.07.000 ");
        $sheet->setCellValue('D323', "Lain-lain");
        $sheet->setCellValue('E323', "108.99.000");
        $sheet->setCellValue('C324', "TOTAL UANG MUKA / PANJAR KERJA");
        $sheet->getStyle('C324:I324')->applyFromArray($jingga);

        $sheet->setCellValue('A326', "A8");
        $sheet->getStyle('A326')->getFont()->setBold(true);
        $sheet->setCellValue('C326', "BEBAN DIBAYAR DIMUKA");
        $sheet->getStyle('C326')->getFont()->setBold(true);
        $sheet->setCellValue('D327', "Biaya Pegawai");
        $sheet->setCellValue('E327', "112.01.000");
        $sheet->setCellValue('D328', "Biaya Operasional");
        $sheet->setCellValue('E328', "112.02.000");
        $sheet->setCellValue('D329', "Biaya Pemeliharaan");
        $sheet->setCellValue('E329', "112.03.000");
        $sheet->setCellValue('D330', "Biaya Asuransi");
        $sheet->setCellValue('E330', "112.04.000");
        $sheet->setCellValue('D331', "Biaya Sewa");
        $sheet->setCellValue('E331', "112.05.000");
        $sheet->setCellValue('D332', "Biaya Administrasi");
        $sheet->setCellValue('E332', "112.06.000");
        $sheet->setCellValue('D333', "Biaya Umum");
        $sheet->setCellValue('E333', "112.07.000");
        $sheet->setCellValue('D334', "Biaya lainnya");
        $sheet->setCellValue('E334', "112.99.000");
        $sheet->setCellValue('C335', "TOTAL BEBAN DIBAYAR DIMUKA");
        $sheet->getStyle('C335:I335')->applyFromArray($jingga);

        $sheet->setCellValue('A337', "A9");
        $sheet->getStyle('A337')->getFont()->setBold(true);
        $sheet->setCellValue('C337', "PAJAK DIBAYAR DIMUKA");
        $sheet->getStyle('C337')->getFont()->setBold(true);
        $sheet->setCellValue('D338', "PPH Pasal 21");
        $sheet->setCellValue('E338', "110.01.000");
        $sheet->setCellValue('D339', "PPH Pasal 22");
        $sheet->setCellValue('E339', "110.02.000");
        $sheet->setCellValue('D340', "PPH Pasal 23/ 26");
        $sheet->setCellValue('E340', "110.03.000");
        $sheet->setCellValue('D341', "PPH Pasal 25");
        $sheet->setCellValue('E341', "110.04.000");
        $sheet->setCellValue('D342', "PPH Pasal 4 (2)");
        $sheet->setCellValue('E342', "110.06.000");
        $sheet->setCellValue('D343', "Prepaid PPN Wapu");
        $sheet->setCellValue('E343', "110.07.000");
        $sheet->setCellValue('D344', "PPN Dibebaskan");
        $sheet->setCellValue('E344', "110.08.000");
        $sheet->setCellValue('D345', "PPN Masukan Yang Dikreditkan (Tukar Faktur)");
        $sheet->setCellValue('E345', "111.01.000");
        $sheet->setCellValue('D346', "PPN Masukan Yang Dikreditkan Non Faktur");
        $sheet->setCellValue('E346', "111.02.000");
        $sheet->setCellValue('C347', "TOTAL PAJAK DIBAYAR DIMUKA");
        $sheet->getStyle('C347:I347')->applyFromArray($jingga);

        $sheet->setCellValue('C349', "TOTAL ASET LANCAR");
        $sheet->getStyle('C349:I349')->applyFromArray($biru);

        $sheet->setCellValue('A351', "B");
        $sheet->getStyle('A351')->getFont()->setBold(true);
        $sheet->setCellValue('C351', "ASET TIDAK LANCAR");
        $sheet->getStyle('C351')->getFont()->setBold(true);
        $sheet->setCellValue('A352', "B1");
        $sheet->getStyle('A352')->getFont()->setBold(true);
        $sheet->setCellValue('C352', "INVESTASI PADA ENTITAS ASOSIASI / SUBSIDIARY");
        $sheet->getStyle('C352')->getFont()->setBold(true);
        $sheet->setCellValue('D353', "Investasi pada  Entitas Asosiasi / Subsidiary");
        $sheet->setCellValue('E353', "311.01.000");
        $sheet->setCellValue('D354', "Investasi pada Entitas Asosiasi / Subsidiary");
        $sheet->setCellValue('E354', "311.02.000");
        $sheet->setCellValue('C355', "TOTAL INVESTASI PADA ENTITAS ASOSIASI / SUBSIDIARY");
        $sheet->getStyle('C355:I355')->applyFromArray($jingga);

        $sheet->setCellValue('A357', "B2");
        $sheet->getStyle('A357')->getFont()->setBold(true);
        $sheet->setCellValue('C357', "PIUTANG LAIN-LAIN JANGKA PANJANG");
        $sheet->getStyle('C357')->getFont()->setBold(true);
        $sheet->setCellValue('D358', "Piutang Jangka Panjang");
        $sheet->setCellValue('E358', "309.01.000");
        $sheet->setCellValue('D359', "Wesel Tagih Jangka Panjang");
        $sheet->setCellValue('E359', "309.02.000");
        $sheet->setCellValue('C360', "TOTAL PIUTANG LAIN-LAIN JANGKA PANJANG");
        $sheet->getStyle('C360:I360')->applyFromArray($jingga);

        $sheet->setCellValue('A362', "B3");
        $sheet->getStyle('A362')->getFont()->setBold(true);
        $sheet->setCellValue('C362', "PROPERTI INVESTASI");
        $sheet->getStyle('C362')->getFont()->setBold(true);
        $sheet->setCellValue('B363', "B3.1");
        $sheet->getStyle('B363')->getFont()->setBold(true);
        $sheet->setCellValue('C363', "PROPERTI INVESTASI - HARGA PEROLEHAN");
        $sheet->getStyle('C363')->getFont()->setBold(true);
        $sheet->setCellValue('D364', "Properti Investasi - Tanah");
        $sheet->setCellValue('E364', "203.01.000");
        $sheet->setCellValue('D365', "Properti Investasi - Gedung dan Bangunan");
        $sheet->setCellValue('E365', "203.02.000");
        $sheet->setCellValue('D366', "TOTAL PROPERTI INVESTASI - HARGA PEROLEHAN");
        $sheet->getStyle('D366:I366')->applyFromArray($hijau);

        $sheet->setCellValue('B368', "B3.2");
        $sheet->getStyle('B368')->getFont()->setBold(true);
        $sheet->setCellValue('C368', "PROPERTI INVESTASI - AKUMULASI PENYUSUTAN");
        $sheet->getStyle('C368')->getFont()->setBold(true);
        $sheet->setCellValue('D369', "Properti Investasi - Gedung dan Bangunan");
        $sheet->setCellValue('E369', "243.01.000");
        $sheet->setCellValue('D370', "TOTAL PROPERTI INVESTASI - AKUMULASI PENYUSUTAN");
        $sheet->getStyle('D370:I370')->applyFromArray($hijau);

        $sheet->setCellValue('C372', "TOTAL NILAI BUKU PROPERTI INVESTASI");
        $sheet->getStyle('C372:I372')->applyFromArray($jingga);

        $sheet->setCellValue('A374', "B4");
        $sheet->getStyle('A374')->getFont()->setBold(true);
        $sheet->setCellValue('C374', "ASET TETAP");
        $sheet->getStyle('C374')->getFont()->setBold(true);
        $sheet->setCellValue('B375', "B4.1");
        $sheet->getStyle('B375')->getFont()->setBold(true);
        $sheet->setCellValue('C375', "ASET TETAP - HARGA PEROLEHAN");
        $sheet->getStyle('C375')->getFont()->setBold(true);
        $sheet->setCellValue('D376', "Tanah");
        $sheet->setCellValue('E376', "201.01.000");
        $sheet->setCellValue('D377', "Gedung dan Bangunan");
        $sheet->setCellValue('E377', "201.02.000");
        $sheet->setCellValue('D378', "Kendaraan dan Ambulance");
        $sheet->setCellValue('E378', "201.03.000");
        $sheet->setCellValue('D379', "Alat Telekomunikasi");
        $sheet->setCellValue('E379', "201.04.000");
        $sheet->setCellValue('D380', "Peralatan Kantor");
        $sheet->setCellValue('E380', "201.05.000");
        $sheet->setCellValue('D381', "Komputer");
        $sheet->setCellValue('E381', "201.06.000");
        $sheet->setCellValue('D382', "Alat Listrik");
        $sheet->setCellValue('E382', "201.07.000");
        $sheet->setCellValue('D383', "Alat Mekanik");
        $sheet->setCellValue('E383', "201.08.000");
        $sheet->setCellValue('D384', "Alat AC");
        $sheet->setCellValue('E384', "201.09.000");
        $sheet->setCellValue('D385', "Alat Lift");
        $sheet->setCellValue('E385', "201.10.000");
        $sheet->setCellValue('D386', "Alat Medis");
        $sheet->setCellValue('E386', "201.11.000");
        $sheet->setCellValue('D387', "TOTAL ASET TETAP - HARGA PEROLEHAN");
        $sheet->getStyle('D387:I387')->applyFromArray($hijau);

        $sheet->setCellValue('B389', "B4.2");
        $sheet->getStyle('B389')->getFont()->setBold(true);
        $sheet->setCellValue('C389', "ASET TETAP - AKUMULASI PENYUSUTAN");
        $sheet->getStyle('C389')->getFont()->setBold(true);
        $sheet->setCellValue('D390', "Gedung dan Bangunan");
        $sheet->setCellValue('E390', "241.02.000");
        $sheet->setCellValue('D391', "Kendaraan dan Ambulance");
        $sheet->setCellValue('E391', "241.03.000");
        $sheet->setCellValue('D392', "Alat Telekomunikasi");
        $sheet->setCellValue('E392', "241.04.000");
        $sheet->setCellValue('D393', "Peralatan Kantor");
        $sheet->setCellValue('E393', "241.05.000");
        $sheet->setCellValue('D394', "Komputer");
        $sheet->setCellValue('E394', "241.06.000");
        $sheet->setCellValue('D395', "Alat Listrik");
        $sheet->setCellValue('E395', "241.07.000");
        $sheet->setCellValue('D396', "Alat Mekanik");
        $sheet->setCellValue('E396', "241.08.000");
        $sheet->setCellValue('D397', "Alat AC");
        $sheet->setCellValue('E397', "241.09.000");
        $sheet->setCellValue('D398', "Alat Lift");
        $sheet->setCellValue('E398', "241.10.000");
        $sheet->setCellValue('D399', "Alat Medis");
        $sheet->setCellValue('E398', "241.11.000");
        $sheet->setCellValue('D400', "TOTAL ASET TETAP - AKUMULASI PENYUSUTAN");
        $sheet->getStyle('D400:I400')->applyFromArray($hijau);

        $sheet->setCellValue('D401', "TOTAL NILAI BUKU ASET TETAP");
        $sheet->getStyle('D401:I401')->applyFromArray($hijau);

        $sheet->setCellValue('D402', "STATUS (Aktiva Tetap)");
        $sheet->getStyle('D402')->getFont()->setBold(true);
        $sheet->setCellValue('B403', "B4.3");
        $sheet->getStyle('B403')->getFont()->setBold(true);
        $sheet->setCellValue('C403', "ASET TETAP LEASING - HARGA PEROLEHAN");
        $sheet->getStyle('C403')->getFont()->setBold(true);
        $sheet->setCellValue('D404', "Aktiva Leasing - Tanah");
        $sheet->setCellValue('E404', "202.01.000");
        $sheet->setCellValue('D405', "Aktiva Leasing - Gedung dan Bangunan");
        $sheet->setCellValue('E405', "202.02.000");
        $sheet->setCellValue('D406', "Aktiva Leasing - Kendaraan dan Ambulance");
        $sheet->setCellValue('E406', "202.03.000");
        $sheet->setCellValue('D407', "Aktiva Leasing - Alat Telekomunikasi");
        $sheet->setCellValue('E407', "202.04.000");
        $sheet->setCellValue('D408', "Aktiva Leasing - Peralatan Kantor");
        $sheet->setCellValue('E408', "202.05.000");
        $sheet->setCellValue('D409', "Aktiva Leasing - Komputer");
        $sheet->setCellValue('E409', "202.06.000");
        $sheet->setCellValue('D410', "Aktiva Leasing - Alat Listrik");
        $sheet->setCellValue('E410', "202.07.000");
        $sheet->setCellValue('D411', "Aktiva Leasing - Alat Mekanik");
        $sheet->setCellValue('E411', "202.08.000");
        $sheet->setCellValue('D412', "Aktiva Leasing - Alat AC");
        $sheet->setCellValue('E412', "202.09.000");
        $sheet->setCellValue('D413', "Aktiva Leasing - Alat Lift");
        $sheet->setCellValue('E413', "202.10.000");
        $sheet->setCellValue('D414', "Aktiva Leasing - Alat Medis");
        $sheet->setCellValue('E414', "202.11.000");
        $sheet->setCellValue('D415', "TOTAL ASET TETAP LEASING - HARGA PEROLEHAN");
        $sheet->getStyle('D415:I415')->applyFromArray($hijau);

        $sheet->setCellValue('B417', "B4.4");
        $sheet->getStyle('B417')->getFont()->setBold(true);
        $sheet->setCellValue('C417', "ASET TETAP LEASING - AKUMULASI PENYUSUTAN");
        $sheet->getStyle('C417')->getFont()->setBold(true);
        $sheet->setCellValue('D418', "Aktiva Leasing - Tanah");
        $sheet->setCellValue('E418', "242.01.000");
        $sheet->setCellValue('D419', "Aktiva Leasing - Gedung dan Bangunan");
        $sheet->setCellValue('E419', "242.02.000");
        $sheet->setCellValue('D420', "Aktiva Leasing - Kendaraan dan Ambulance");
        $sheet->setCellValue('E420', "242.03.000");
        $sheet->setCellValue('D421', "Aktiva Leasing - Alat Telekomunikasi");
        $sheet->setCellValue('E421', "242.04.000");
        $sheet->setCellValue('D422', "Aktiva Leasing - Peralatan Kantor");
        $sheet->setCellValue('E422', "242.05.000");
        $sheet->setCellValue('D423', "Aktiva Leasing - Komputer");
        $sheet->setCellValue('E423', "242.06.000");
        $sheet->setCellValue('D424', "Aktiva Leasing - Alat Listrik");
        $sheet->setCellValue('E424', "242.07.000");
        $sheet->setCellValue('D425', "Aktiva Leasing - Alat Mekanik");
        $sheet->setCellValue('E425', "242.08.000");
        $sheet->setCellValue('D426', "Aktiva Leasing - Alat AC");
        $sheet->setCellValue('E426', "242.09.000");
        $sheet->setCellValue('D427', "Aktiva Leasing - Alat Lift");
        $sheet->setCellValue('E427', "242.10.000");
        $sheet->setCellValue('D428', "Aktiva Leasing - Alat Medis");
        $sheet->setCellValue('E428', "242.11.000");
        $sheet->setCellValue('D429', "TOTAL ASET TETAP LEASING - HARGA PEROLEHAN");
        $sheet->getStyle('D429:I429')->applyFromArray($hijau);

        $sheet->setCellValue('D430', "TOTAL NILAI BUKU ASET LEASING");
        $sheet->getStyle('D430:I430')->applyFromArray($hijau);

        $sheet->setCellValue('B432', "B4.5");
        $sheet->getStyle('B432')->getFont()->setBold(true);
        $sheet->setCellValue('C432', " ASET TETAP DALAM PENYELESAIAN");
        $sheet->getStyle('C432')->getFont()->setBold(true);
        $sheet->setCellValue('D433', " Gedung dan Bangunan");
        $sheet->setCellValue('E433', " 301.01.000");
        $sheet->setCellValue('D434', " Kendaraan dan Ambulance");
        $sheet->setCellValue('E434', " 301.02.000");
        $sheet->setCellValue('D435', " Alat Telekomunikasi");
        $sheet->setCellValue('E435', " 301.03.000");
        $sheet->setCellValue('D436', " Peralatan Kantor ");
        $sheet->setCellValue('E436', " 301.04.000 ");
        $sheet->setCellValue('D437', " Komputer ");
        $sheet->setCellValue('E437', " 301.05.000 ");
        $sheet->setCellValue('D438', " Alat Listrik");
        $sheet->setCellValue('E438', " 301.06.000 ");
        $sheet->setCellValue('D439', " Alat Mekanik");
        $sheet->setCellValue('E439', " 301.07.000 ");
        $sheet->setCellValue('D440', " Alat AC");
        $sheet->setCellValue('E440', " 301.08.000 ");
        $sheet->setCellValue('D441', " Alat Lift");
        $sheet->setCellValue('E441', " 301.09.000 ");
        $sheet->setCellValue('D442', " Alat Medis");
        $sheet->setCellValue('E442', " 301.10.000 ");
        $sheet->setCellValue('D443', " TOTAL ASET TETAP DALAM PENYELESAIAN");
        $sheet->getStyle('D443:I443')->applyFromArray($hijau);

        $sheet->setCellValue('B445', "B4.6");
        $sheet->getStyle('B445')->getFont()->setBold(true);
        $sheet->setCellValue('C445', " ASET TETAP DICADANGKAN (IMPAIRMENT)");
        $sheet->getStyle('C445')->getFont()->setBold(true);
        $sheet->setCellValue('D446', " Tanah");
        $sheet->setCellValue('E446', " 271.01.000");
        $sheet->setCellValue('D447', " Gedung dan Bangunan");
        $sheet->setCellValue('E447', "271.02.000");
        $sheet->setCellValue('D448', " Kendaraan dan Ambulance");
        $sheet->setCellValue('E448', "271.03.000");
        $sheet->setCellValue('D449', "Alat Telekomunikasi");
        $sheet->setCellValue('E449', "271.04.000");
        $sheet->setCellValue('D450', "Peralatan Kantor");
        $sheet->setCellValue('E450', "271.05.000");
        $sheet->setCellValue('D451', "Komputer");
        $sheet->setCellValue('E451', "271.06.000");
        $sheet->setCellValue('D452', "Alat Listrik");
        $sheet->setCellValue('E452', "271.07.000");
        $sheet->setCellValue('D453', "Alat Mekanik");
        $sheet->setCellValue('E453', "271.08.000");
        $sheet->setCellValue('D454', "Alat AC");
        $sheet->setCellValue('E454', "271.09.000");
        $sheet->setCellValue('D455', "Alat Lift");
        $sheet->setCellValue('E455', "271.10.000");
        $sheet->setCellValue('D456', "Alat Medis");
        $sheet->setCellValue('E456', "271.11.000");
        $sheet->setCellValue('D457', "TOTAL ASET TETAP DICADANGKAN (IMPAIRMENT)");
        $sheet->getStyle('D457:I457')->applyFromArray($hijau);

        $sheet->setCellValue('C459', " TOTAL ASET TETAP");
        $sheet->getStyle('C459:I459')->applyFromArray($jingga);

        $sheet->setCellValue('A461', "B5");
        $sheet->getStyle('B432')->getFont()->setBold(true);
        $sheet->setCellValue('C432', " ASET PAJAK TANGGUHAN");
        $sheet->getStyle('C432')->getFont()->setBold(true);
        $sheet->setCellValue('D462', " Aset Pajak Tangguhan");
        $sheet->setCellValue('E462', " 305.01.000");
        $sheet->setCellValue('C463', " TOTAL ASET PAJAK TANGGUHAN");
        $sheet->getStyle('C463:I463')->applyFromArray($jingga);

        $sheet->setCellValue('A465', "B6");
        $sheet->getStyle('A465')->getFont()->setBold(true);
        $sheet->setCellValue('C465', " ASET YANG DIBATASI PENGGUNAANNYA");
        $sheet->getStyle('C465')->getFont()->setBold(true);
        $sheet->setCellValue('D466', " Aset Yang Dibatasi Penggunaanya - Bank Mandiri");
        $sheet->setCellValue('E466', " 310.01.100");
        $sheet->setCellValue('D467', "Aset Yang Dibatasi Penggunaanya - Bank Mandiri");
        $sheet->setCellValue('E467', " 310.01.101");
        $sheet->setCellValue('D468', "Aset Yang Dibatasi Penggunaanya - Bank BNI");
        $sheet->setCellValue('E468', " 310.01.200");
        $sheet->setCellValue('D469', "Aset Yang Dibatasi Penggunaanya - Bank BRI AGRO");
        $sheet->setCellValue('E469', " 310.01.300");
        $sheet->setCellValue('D470', "Aset Yang Dibatasi Penggunaanya - Bank Syariah Mandiri (J.A PBM-PELNI)");
        $sheet->setCellValue('E470', "310.01.400");
        $sheet->setCellValue('D471', "Aset Yang Dibatasi Penggunaanya - Deposito");
        $sheet->setCellValue('E471', " 310.02.100");
        $sheet->setCellValue('D472', "Aset Yang Dibatasi Penggunaanya - Obligasi ");
        $sheet->setCellValue('E472', " 310.03.100");
        $sheet->setCellValue('C473', " TOTAL ASET YANG DIBATASI PENGGUNAANNYA");
        $sheet->getStyle('C473:I473')->applyFromArray($jingga);

        $sheet->setCellValue('A475', "B7");
        $sheet->getStyle('A475')->getFont()->setBold(true);
        $sheet->setCellValue('C475', " ASET TIDAK LANCAR LAINNYA");
        $sheet->getStyle('C475')->getFont()->setBold(true);
        $sheet->setCellValue('D476', "Biaya yang ditangguhkan ");
        $sheet->setCellValue('E476', "304.01.000");
        $sheet->setCellValue('D477', "Aset Tak Berwujud ");
        $sheet->setCellValue('E477', "306.01.000");
        $sheet->setCellValue('D478', "Amortisasi Aset Tak Berwujud ");
        $sheet->setCellValue('E478', "346.01.000");
        $sheet->setCellValue('D479', "Bank Garansi ");
        $sheet->setCellValue('E479', "308.01.000");
        $sheet->setCellValue('D480', "Aset Lainnya - Penyesuaian Kurs Translasi ");
        $sheet->setCellValue('E480', "399.01.000");
        $sheet->setCellValue('C481', " TOTAL ASET TIDAK LANCAR LAINNYA");
        $sheet->getStyle('C481:I481')->applyFromArray($jingga);

        $sheet->setCellValue('A483', "B8");
        $sheet->getStyle('A483')->getFont()->setBold(true);
        $sheet->setCellValue('C483', "TAKSIRAN TAGIHAN PAJAK PENGHASILAN");
        $sheet->getStyle('C483')->getFont()->setBold(true);
        $sheet->setCellValue('D484', "PPH Badan (lebih bayar) ");
        $sheet->setCellValue('E484', "110.05.000");
        $sheet->setCellValue('C485', "TOTAL TAKSIRAN TAGIHAN PAJAK PENGHASILAN");
        $sheet->getStyle('C485:I485')->applyFromArray($jingga);

        $sheet->setCellValue('C487', "TOTAL ASET TIDAK LANCAR");
        $sheet->getStyle('C487:I487')->applyFromArray($biru);

        $sheet->setCellValue('C488', "TOTAL ASET");
        $sheet->getStyle('C488:I488')->applyFromArray($merah);

        $sheet->setCellValue('A490', "C");
        $sheet->getStyle('A490')->getFont()->setBold(true);
        $sheet->setCellValue('C490', "LIABILITAS JANGKA PENDEK");
        $sheet->getStyle('C490')->getFont()->setBold(true);
        $sheet->setCellValue('A491', "C1");
        $sheet->getStyle('A491')->getFont()->setBold(true);
        $sheet->setCellValue('C491', "UTANG USAHA");
        $sheet->getStyle('C491')->getFont()->setBold(true);
        $sheet->setCellValue('D492', "Utang Obat dan Medical supplies");
        $sheet->setCellValue('E492', "401.01.000");
        $sheet->setCellValue('D493', "Utang Kontrak");
        $sheet->setCellValue('E493', "401.02.000");
        $sheet->setCellValue('D494', "Utang Material/ Umum");
        $sheet->setCellValue('E494', "401.03.000");
        $sheet->setCellValue('D495', "Utang HBM");
        $sheet->setCellValue('E495', "401.04.000");
        $sheet->setCellValue('D496', "Utang Usaha lainnya");
        $sheet->setCellValue('E496', "401.05.000");
        $sheet->setCellValue('D497', "Utang Hubungan Istimewa Lainnya (khusus ICT)");
        $sheet->setCellValue('E497', "419.02.000");
        $sheet->setCellValue('C498', "TOTAL UTANG USAHA");
        $sheet->getStyle('C498:I498')->applyFromArray($jingga);

        $sheet->setCellValue('A500', "C2");
        $sheet->getStyle('A500')->getFont()->setBold(true);
        $sheet->setCellValue('C500', "UTANG LAIN-LAIN");
        $sheet->getStyle('C500')->getFont()->setBold(true);
        $sheet->setCellValue('B501', "C2.1");
        $sheet->getStyle('B501')->getFont()->setBold(true);
        $sheet->setCellValue('C501', "UANG TITIPAN");
        $sheet->getStyle('C501')->getFont()->setBold(true);
        $sheet->setCellValue('D502', "Potongan BDI (Badan Dakwah Islam)");
        $sheet->setCellValue('E502', "404.01.000");
        $sheet->setCellValue('D503', "Potongan PWP (Persatuan Wanita Patra)");
        $sheet->setCellValue('E503', "404.02.000");
        $sheet->setCellValue('D504', "Potongan Koperasi Karyawan");
        $sheet->setCellValue('E504', "404.03.000");
        $sheet->setCellValue('D505', "WKP (Wadah Komunikasi Pekerja)");
        $sheet->setCellValue('E505', "404.04.000");
        $sheet->setCellValue('D506', "KPR (Kredit Pemilikan Rumah)");
        $sheet->setCellValue('E506', "404.05.000");
        $sheet->setCellValue('D507', "Pertamina Dana Ventura (PDV)");
        $sheet->setCellValue('E507', "404.06.000");
        $sheet->setCellValue('D508', "Potongan Hari Proporsional");
        $sheet->setCellValue('E508', "404.07.000");
        $sheet->setCellValue('D509', "Potongan Gaji lainnya");
        $sheet->setCellValue('E509', "404.08.000");
        $sheet->setCellValue('D510', "Sisa Bulan Berjalan");
        $sheet->setCellValue('E510', "404.09.000");
        $sheet->setCellValue('E511', "Dana Kesehatan Pensiun PERTAMEDIKA");
        $sheet->setCellValue('E511', "404.10.000");
        $sheet->setCellValue('E512', "Lainnya");
        $sheet->setCellValue('E512', "404.99.000");
        $sheet->setCellValue('D513', "TOTAL UANG TITIPAN");
        $sheet->getStyle('D513:I513')->applyFromArray($hijau);

        $sheet->setCellValue('B515', "C2.2");
        $sheet->getStyle('B515')->getFont()->setBold(true);
        $sheet->setCellValue('D515', "UTANG DANA JAMINAN");
        $sheet->getStyle('D515')->getFont()->setBold(true);
        $sheet->setCellValue('D516', "DPLK (Pensiun)");
        $sheet->setCellValue('E516', "411.01.000");
        $sheet->setCellValue('D517', "BPJS Ketenagakerjaan");
        $sheet->setCellValue('E517', "411.02.000");
        $sheet->setCellValue('D518', "BPJS Kesehatan");
        $sheet->setCellValue('E518', "411.03.000");
        $sheet->setCellValue('D519', "TOTAL UTANG DANA JAMINAN");
        $sheet->getStyle('D519:I519')->applyFromArray($hijau);

        $sheet->setCellValue('B521', "C2.3");
        $sheet->getStyle('B521')->getFont()->setBold(true);
        $sheet->setCellValue('C521', "UTANG PEKERJA");
        $sheet->getStyle('C521')->getFont()->setBold(true);
        $sheet->setCellValue('D522', "Utang Jasa Produksi (Bonus)");
        $sheet->setCellValue('E522', "406.01.000");
        $sheet->setCellValue('D523', "Utang Gaji");
        $sheet->setCellValue('E523', "415.01.000");
        $sheet->setCellValue('D524', "Utang Imbalan Jasa Dokter");
        $sheet->setCellValue('E524', "415.02.000");
        $sheet->setCellValue('D525', "TOTAL UTANG PEKERJA");
        $sheet->getStyle('D525:I525')->applyFromArray($hijau);

        $sheet->setCellValue('B527', "C2.4");
        $sheet->getStyle('B527')->getFont()->setBold(true);
        $sheet->setCellValue('C527', "UTANG HUBUNGAN ISTIMEWA");
        $sheet->getStyle('C527')->getFont()->setBold(true);
        $sheet->setCellValue('D528', "Deviden");
        $sheet->setCellValue('E528', "418.01.000");
        $sheet->setCellValue('D529', "Sewa Kelola Aset ");
        $sheet->setCellValue('E529', "419.01.000");
        $sheet->setCellValue('D530', "TOTAL UTANG HUBUNGAN ISTIMEWA");
        $sheet->getStyle('D530:I530')->applyFromArray($hijau);

        $sheet->setCellValue('C532', "TOTAL UTANG LAIN-LAIN");
        $sheet->getStyle('C532:I532')->applyFromArray($jingga);

        $sheet->setCellValue('A534', "C3");
        $sheet->getStyle('A534')->getFont()->setBold(true);
        $sheet->setCellValue('C535', "UTANG PAJAK");
        $sheet->getStyle('C535')->getFont()->setBold(true);
        $sheet->setCellValue('B535', "C3.1");
        $sheet->getStyle('B535')->getFont()->setBold(true);
        $sheet->setCellValue('C535', "PAJAK PENGHASILAN BADAN");
        $sheet->getStyle('C535')->getFont()->setBold(true);
        $sheet->setCellValue('D536', "Utang Pajak Penghasilan Badan");
        $sheet->setCellValue('E536', "408.01.000");
        $sheet->setCellValue('D537', "TOTAL UTANG PAJAK PENGHASILAN BADAN");
        $sheet->getStyle('D537:I537')->applyFromArray($hijau);

        $sheet->setCellValue('B539', "C3.2");
        $sheet->getStyle('B539')->getFont()->setBold(true);
        $sheet->setCellValue('C539', "PPN KELUARAN");
        $sheet->getStyle('C539')->getFont()->setBold(true);
        $sheet->setCellValue('D540', "PPN Keluaran (Obat Non Wapu)");
        $sheet->setCellValue('E540', "409.01.000");
        $sheet->setCellValue('D541', "PPN Keluaran (Obat Wapu dan Tidak Dipungut)");
        $sheet->setCellValue('E541', "409.02.000");
        $sheet->setCellValue('D542', "PPN Keluaran (Lainnya Non Wapu)");
        $sheet->setCellValue('E542', "409.03.000");
        $sheet->setCellValue('D543', "PPN Keluaran (Lainnya Wapu dan Tidak Dipungut)");
        $sheet->setCellValue('E543', "409.04.000");
        $sheet->setCellValue('D544', "PPN Keluaran Dibebaskan");
        $sheet->setCellValue('E544', "409.05.000");
        $sheet->setCellValue('D545', "TOTAL PPN KELUARAN");
        $sheet->getStyle('D545:I545')->applyFromArray($hijau);


        $sheet->setCellValue('B547', "C3.2");
        $sheet->getStyle('B547')->getFont()->setBold(true);
        $sheet->setCellValue('C547', "UTANG PAJAK LAINNYA");
        $sheet->getStyle('C547')->getFont()->setBold(true);
        $sheet->setCellValue('D548', "PPH Pasal 21");
        $sheet->setCellValue('E548', "410.01.000");
        $sheet->setCellValue('D549', "PPH Pasal 23");
        $sheet->setCellValue('E549', "410.02.000");
        $sheet->setCellValue('D550', "PPH Pasal 26");
        $sheet->setCellValue('E550', "410.03.000");
        $sheet->setCellValue('D551', "Pajak Bumi dan Bangunan");
        $sheet->setCellValue('E551', "410.04.000");
        $sheet->setCellValue('D552', "PPH Pasal 4 ayat 2");
        $sheet->setCellValue('E552', "410.05.000");
        $sheet->setCellValue('D553', "PPH Pasal 29 (ganti keterangan dari sebelumnya Pasal 25)");
        $sheet->setCellValue('E553', "410.06.000");
        $sheet->setCellValue('D554', "Utang Pajak Lainnya");
        $sheet->setCellValue('E554', "410.99.000");
        $sheet->setCellValue('D555', "TOTAL UTANG PAJAK LAINNYA");
        $sheet->getStyle('D555:I555')->applyFromArray($hijau);

        $sheet->setCellValue('C557', "TOTAL UTANG PAJAK");
        $sheet->getStyle('C557:I557')->applyFromArray($jingga);

        $sheet->setCellValue('A559', "C4");
        $sheet->getStyle('A559')->getFont()->setBold(true);
        $sheet->setCellValue('C559', "BIAYA YANG MASIH HARUS DIBAYAR");
        $sheet->getStyle('C559')->getFont()->setBold(true);
        $sheet->setCellValue('D560', "Biaya Pekerja");
        $sheet->setCellValue('E560', "412.01.000");
        $sheet->setCellValue('D561', "Biaya Operasional");
        $sheet->setCellValue('E561', "412.02.000");
        $sheet->setCellValue('D562', "Biaya Pemeliharaan");
        $sheet->setCellValue('E562', "412.03.000");
        $sheet->setCellValue('D563', "Biaya Asuransi");
        $sheet->setCellValue('E563', "412.04.000");
        $sheet->setCellValue('D564', "Biaya sewa");
        $sheet->setCellValue('E564', "412.05.000");
        $sheet->setCellValue('D565', "Biaya Administrasi");
        $sheet->setCellValue('E565', "412.06.000");
        $sheet->setCellValue('D566', "Biaya Umum");
        $sheet->setCellValue('E566', "412.07.000");
        $sheet->setCellValue('D567', "Biaya Pengelolaan Aset");
        $sheet->setCellValue('E567', "412.08.000");
        $sheet->setCellValue('D568', "Biaya Bunga");
        $sheet->setCellValue('E568', "412.09.000");
        $sheet->setCellValue('D569', "Termin Invoice Aset Tetap");
        $sheet->setCellValue('E569', "412.10.000");
        $sheet->setCellValue('D570', "Biaya Lainnya");
        $sheet->setCellValue('E570', "412.99.000");
        $sheet->setCellValue('C571', "TOTAL BIAYA YANG MASIH HARUS DIBAYAR");
        $sheet->getStyle('C571:I571')->applyFromArray($jingga);

        $sheet->setCellValue('A573', "C5");
        $sheet->getStyle('A573')->getFont()->setBold(true);
        $sheet->setCellValue('C573', "PENDAPATAN DITERIMA DI MUKA & DEPOSIT PASIEN");
        $sheet->getStyle('C573')->getFont()->setBold(true);
        $sheet->setCellValue('D574', "Deposit / Panjar Pasien");
        $sheet->setCellValue('E574', "403.01.000");
        $sheet->setCellValue('D575', "Pendapatan Yang Diterima Dimuka Kapitasi");
        $sheet->setCellValue('E575', "413.01.000");
        $sheet->setCellValue('D576', "Pendapatan yang diterima dimuka lainnya");
        $sheet->setCellValue('E576', "413.02.000");
        $sheet->setCellValue('D577', "Pendapatan Yang Diterima Dimuka Sewa");
        $sheet->setCellValue('E577', "413.03.000");
        $sheet->setCellValue('D578', "Pendapatan Yang Diterima Dimuka Donasi");
        $sheet->setCellValue('E578', "413.04.000");
        $sheet->setCellValue('C579', "TOTAL PENDAPATAN DITERIMA DI MUKA & DEPOSIT PASIEN");
        $sheet->getStyle('C579:I579')->applyFromArray($jingga);

        $sheet->setCellValue('A581', "C6");
        $sheet->getStyle('A581')->getFont()->setBold(true);
        $sheet->setCellValue('C581', "UTANG PINJAMAN JANGKA PENDEK");
        $sheet->getStyle('C581')->getFont()->setBold(true);
        $sheet->setCellValue('D582', " Utang Bank Jangka Pendek");
        $sheet->setCellValue('E582', " 421.01.000");
        $sheet->setCellValue('D583', "Utang Non Bank Jangka Pendek");
        $sheet->setCellValue('E583', " 421.02.000");
        $sheet->setCellValue('C584', "TOTAL UTANG PINJAMAN JANGKA PENDEK");
        $sheet->getStyle('C584:I584')->applyFromArray($jingga);

        $sheet->setCellValue('A586', "C7");
        $sheet->getStyle('A586')->getFont()->setBold(true);
        $sheet->setCellValue('C586', "BAGIAN LIABILITAS JANGKA PANJANG YANG JATUH TEMPO DALAM WAKTU 1 TAHUN");
        $sheet->getStyle('C586')->getFont()->setBold(true);
        $sheet->setCellValue('B587', "C7.1");
        $sheet->getStyle('B587')->getFont()->setBold(true);
        $sheet->setCellValue('C587', "PIHAK KETIGA");
        $sheet->getStyle('C587')->getFont()->setBold(true);
        $sheet->setCellValue('D588', "Utang Pertamina Jangka Panjang yang akan jatuh tempo");
        $sheet->setCellValue('E588', "405.01.000");
        $sheet->setCellValue('D589', "Utang Non Bank Jangka Panjang yang akan jatuh tempo - Investasi");
        $sheet->setCellValue('E589', "405.02.100");
        $sheet->setCellValue('D590', "Utang Non Bank Jangka Panjang yang akan jatuh tempo - Non Investasi");
        $sheet->setCellValue('E590', "405.02.200");
        $sheet->setCellValue('D591', "Utang Bank Jangka Panjang yang akan jatuh tempo – Investasi");
        $sheet->setCellValue('E591', "405.03.100");
        $sheet->setCellValue('D592', "Utang Bank Jangka Panjang yang akan jatuh tempo - Non Investasi");
        $sheet->setCellValue('E592', "405.03.200");
        $sheet->setCellValue('D593', "Utang Leasing Jangka Panjang yang akan jatuh tempo");
        $sheet->setCellValue('E593', "405.04.000");
        $sheet->setCellValue('D594', "Wesel Bayar");
        $sheet->setCellValue('E594', "480.01.000");
        $sheet->setCellValue('D595', "TOTAL PIHAK KETIGA");
        $sheet->getStyle('D595:I595')->applyFromArray($hijau);

        $sheet->setCellValue('B597', "C7.2");
        $sheet->getStyle('B597')->getFont()->setBold(true);
        $sheet->setCellValue('C597', "IMBALAN PASKA KERJA - PSAK 24");
        $sheet->getStyle('C597')->getFont()->setBold(true);
        $sheet->setCellValue('D598', "Utang Imbalan Kerja Jangka Pendek - Pesangon");
        $sheet->setCellValue('E598', "416.01.000");
        $sheet->setCellValue('D599', "Utang Imbalan Kerja Jangka Pendek - Kesehatan");
        $sheet->setCellValue('E599', "416.02.000");
        $sheet->setCellValue('D600', "Utang Imbalan Kerja Jangka Pendek - Cuti Besar");
        $sheet->setCellValue('E600', "416.03.000");
        $sheet->setCellValue('D601', "TOTAL IMBALAN PASKA KERJA - PSAK 24");
        $sheet->getStyle('D601:I601')->applyFromArray($hijau);

        $sheet->setCellValue('B603', "C7.3");
        $sheet->getStyle('B603')->getFont()->setBold(true);
        $sheet->setCellValue('C603', "PENDAPATAN BUNGA TANGGUHAN (PSAK 73)");
        $sheet->getStyle('C603')->getFont()->setBold(true);
        $sheet->setCellValue('D604', "Pendapatan Bunga Tangguhan yang akan Jatuh tempo");
        $sheet->setCellValue('E604', "420.01.000");
        $sheet->setCellValue('D605', "TOTAL PENDAPATAN BUNGA TANGGUHAN");
        $sheet->getStyle('D605:I605')->applyFromArray($hijau);

        $sheet->setCellValue('C607', "TOTAL BAGIAN LIABILITAS JANGKA PANJANG YANG JATUH TEMPO DALAM WAKTU 1 TAHUN");
        $sheet->getStyle('C607:I607')->applyFromArray($jingga);

        $sheet->setCellValue('C609', "TOTAL LIABILITAS JANGKA PENDEK");
        $sheet->getStyle('C609:I609')->applyFromArray($biru);

        $sheet->setCellValue('A611', "D");
        $sheet->getStyle('A611')->getFont()->setBold(true);
        $sheet->setCellValue('C611', "LIABILITAS JANGKA PANJANG");
        $sheet->getStyle('C611')->getFont()->setBold(true);
        $sheet->setCellValue('A612', "D1");
        $sheet->getStyle('A612')->getFont()->setBold(true);
        $sheet->setCellValue('C612', "LIABILITAS JANGKA PANJANG SETELAH DIKURANGI BAGIAN YANG JATUH TEMPO DALAM WAKTU 1 TAHUN");
        $sheet->getStyle('C612')->getFont()->setBold(true);
        $sheet->setCellValue('B613', "D1.1");
        $sheet->getStyle('B613')->getFont()->setBold(true);
        $sheet->setCellValue('C613', "PIHAK KETIGA");
        $sheet->getStyle('C613')->getFont()->setBold(true);
        $sheet->setCellValue('D614', "Utang Non Bank Jangka Panjang - Investasi");
        $sheet->setCellValue('E614', "502.01.100");
        $sheet->setCellValue('D615', "Utang Non Bank Jangka Panjang - Non Investasi");
        $sheet->setCellValue('E615', "502.01.200");
        $sheet->setCellValue('D616', "Utang Bank Jangka Panjang - Investasi");
        $sheet->setCellValue('E616', "503.01.100");
        $sheet->setCellValue('D617', "Utang Bank Jangka Panjang - Non Investasi");
        $sheet->setCellValue('E617', "503.01.200");
        $sheet->setCellValue('D618', "Utang Leasing");
        $sheet->setCellValue('E618', "516.01.000");
        $sheet->setCellValue('D619', "Wesel Bayar Jangka Panjang");
        $sheet->setCellValue('E619', "580.01.000");
        $sheet->setCellValue('D620', "TOTAL PIHAK KETIGA");
        $sheet->getStyle('D620:I620')->applyFromArray($hijau);

        $sheet->setCellValue('B622', "D1.2");
        $sheet->getStyle('B622')->getFont()->setBold(true);
        $sheet->setCellValue('C622', "IMBALAN PASKA KERJA - PSAK 24");
        $sheet->getStyle('C622')->getFont()->setBold(true);
        $sheet->setCellValue('D623', "Utang Imbalan Kerja Jangka Panjang");
        $sheet->setCellValue('E623', "517.01.000");
        $sheet->setCellValue('D624', "Utang Imbalan Kerja Jangka Panjang - Pesangon");
        $sheet->setCellValue('E624', "517.01.100");
        $sheet->setCellValue('D625', "Utang Imbalan Kerja Jangka Panjang - Cuti Besar");
        $sheet->setCellValue('E625', "517.01.200");
        $sheet->setCellValue('D626', "Utang Imbalan Kerja Jangka Panjang - Kesehatan");
        $sheet->setCellValue('E626', "517.01.300");
        $sheet->setCellValue('D627', "TOTAL IMBALAN PASKA KERJA - PSAK 24");
        $sheet->getStyle('D627:I627')->applyFromArray($hijau);

        $sheet->setCellValue('A629', "D1.3");
        $sheet->getStyle('A629')->getFont()->setBold(true);
        $sheet->setCellValue('C629', "PENDAPATAN BUNGA TANGGUHAN (PSAK 73)");
        $sheet->getStyle('C629')->getFont()->setBold(true);
        $sheet->setCellValue('D630', "Pendapatan Bunga Tangguhan Jangka Panjang");
        $sheet->setCellValue('E630', "504.01.000");
        $sheet->setCellValue('D631', "TOTAL PENDAPATAN BUNGA TANGGUHAN");
        $sheet->getStyle('D631:I631')->applyFromArray($hijau);

        $sheet->setCellValue('C632', "TOTAL LIABILITAS JANGKA PANJANG SETELAH DIKURANGI BAGIAN YANG JATUH TEMPO DALAM WAKTU 1 TAHUN");
        $sheet->getStyle('C632:I632')->applyFromArray($jingga);

        $sheet->setCellValue('A634', "D2");
        $sheet->getStyle('A634')->getFont()->setBold(true);
        $sheet->setCellValue('C634', "UTANG PAJAK TANGGUHAN");
        $sheet->getStyle('C634')->getFont()->setBold(true);
        $sheet->setCellValue('D635', "Utang Pajak Tangguhan");
        $sheet->setCellValue('E635', "417.01.000");
        $sheet->setCellValue('C636', "TOTAL UTANG PAJAK TANGGUHAN");
        $sheet->getStyle('C636:I636')->applyFromArray($jingga);

        $sheet->setCellValue('A638', "D3");
        $sheet->getStyle('A638')->getFont()->setBold(true);
        $sheet->setCellValue('C638', "UTANG LAINNYA");
        $sheet->getStyle('C638')->getFont()->setBold(true);
        $sheet->setCellValue('D639', "Penyesuaian Kurs Translasi");
        $sheet->setCellValue('E639', "590.01.000");
        $sheet->setCellValue('C640', "TOTAL UTANG LAINNYA");
        $sheet->getStyle('C640:I640')->applyFromArray($jingga);

        $sheet->setCellValue('C642', "TOTAL LIABILITAS JANGKA PANJANG");
        $sheet->getStyle('C642:I642')->applyFromArray($biru);

        $sheet->setCellValue('A643', "E");
        $sheet->getStyle('A643')->getFont()->setBold(true);
        $sheet->setCellValue('C643', "EKUITAS");
        $sheet->getStyle('C643')->getFont()->setBold(true);
        $sheet->setCellValue('D644', "Modal Saham ");
        $sheet->setCellValue('E644', "601.02.000");
        $sheet->setCellValue('D645', "Modal Saham Belum Disetor");
        $sheet->setCellValue('E645', "601.03.000");
        $sheet->setCellValue('D646', "Modal Donasi ");
        $sheet->setCellValue('E646', "602.01.000");
        $sheet->setCellValue('D647', "Cadangan Umum ");
        $sheet->setCellValue('E647', "603.01.000");
        $sheet->setCellValue('D648', "Cadangan Khusus (Ditentukan Penggunaannya)");
        $sheet->setCellValue('E648', "603.02.000");
        $sheet->setCellValue('D649', "Tambahan Modal Disetor ");
        $sheet->setCellValue('E649', "604.01.000");
        $sheet->setCellValue('D650', "Tambahan Modal Disetor ");
        $sheet->setCellValue('E650', "604.02.000");
        $sheet->setCellValue('D651', "Selisih lebih/ (kurang) setoran modal ke anak perusahaan");
        // $sheet->setCellValue('A652', "BANGKE");
        // $sheet->getStyle('A652')->getFont()->setBold(true);
        $sheet->setCellValue('D652', "Laba Tahun Berjalan ");
        $sheet->setCellValue('E652', "605.01.000");
        $sheet->setCellValue('D653', "Dividen");
        $sheet->setCellValue('D654', "Laba Ditahan ");
        $sheet->setCellValue('E654', "605.02.000");
        $sheet->setCellValue('D655', "Other Comprehensive Income");
        $sheet->setCellValue('E655', "606.01.000");
        $sheet->setCellValue('D656', "OCI - Selisih Revaluasi Aset Tetap");
        $sheet->setCellValue('E656', "606.01.100");
        $sheet->setCellValue('D657', "OCI - Pengukuran Kembali Program Imbalan Pasti");
        $sheet->setCellValue('E657', "606.01.200");
        $sheet->setCellValue('D658', "OCI - Laba Rugi dampak dari Penjabaran Laporan Keuangan");
        $sheet->setCellValue('E658', "606.01.300");
        $sheet->setCellValue('D659', "OCI - Perubahan Nilai Investasi Available For Sale");
        $sheet->setCellValue('E659', "606.01.400");
        $sheet->setCellValue('D660', "OCI - Bagian Efektif dari Keuntungan Lindung Nilai Arus Kas");
        $sheet->setCellValue('E660', "606.01.500");
        $sheet->setCellValue('D661', "OCI - Selisih Nilai Wajar Saham Penyertaan Langsung");
        $sheet->setCellValue('E661', "606.01.600");
        $sheet->setCellValue('D662', "OCI - Serap Pendapatan OCI dari Anak Perusahaan");
        $sheet->setCellValue('D663', "OCI - Tahun berjalan");
        $sheet->setCellValue('D664', "OCI - Selisih Revaluasi Aset Tetap");
        $sheet->setCellValue('E664', "606.01.100");
        $sheet->setCellValue('D665', "OCI - Pengukuran Kembali Program Imbalan Pasti");
        $sheet->setCellValue('E665', "606.01.200");
        $sheet->setCellValue('D666', "OCI - Laba Rugi dampak dari Penjabaran Laporan Keuangan");
        $sheet->setCellValue('E666', "606.01.300");
        $sheet->setCellValue('D667', "OCI - Perubahan Nilai Investasi Available For Sale");
        $sheet->setCellValue('E667', "606.01.400");
        $sheet->setCellValue('D668', "OCI - Bagian Efektif dari Keuntungan Lindung Nilai Arus Kas");
        $sheet->setCellValue('E668', "606.01.500");
        $sheet->setCellValue('D669', "OCI - Selisih Nilai Wajar Saham Penyertaan Langsung");
        $sheet->setCellValue('E669', "606.01.600");
        $sheet->setCellValue('D670', "Selisih Transaksi Restrukturisasi Entitas Sepengendali");
        $sheet->getStyle('D670')->getFont()->setBold(true);
        $sheet->setCellValue('D671', "NCI - Laba Tahun Berjalan - Kepentingan Non Pengendali");
        $sheet->setCellValue('E671', "606.01.501");
        $sheet->setCellValue('D672', "NCI - Laba Ditahan - Kepentingan Non Pengendali");
        $sheet->setCellValue('E672', "606.01.502");
        $sheet->setCellValue('D673', "NCI - Deviden - Kepentingan Non Pengendali");
        $sheet->setCellValue('E673', "607.01.300");
        $sheet->setCellValue('D674', "NCI - Ekuitas selain Laba tahun berjalan");
        $sheet->setCellValue('E674', "607.01.400");
        $sheet->setCellValue('D675', "NCI - Laba Tahun Berjalan - Kepentingan Non Pengendali Yang Dipisah dari Laba Konsolidasi");
        $sheet->setCellValue('E675', "607.01.101");
        $sheet->setCellValue('D676', "NCI (Awal) Tahun");
        $sheet->setCellValue('D677', "NCI (Akhir) Tahun");
        $sheet->setCellValue('D678', "NCI - OCI awal Tahun");
        $sheet->setCellValue('D679', "NCI - OCI akhir Tahun");
        $sheet->setCellValue('D680', "NCI - OCI tahun berjalan");
        $sheet->setCellValue('C681', "TOTAL EKUITAS");
        $sheet->getStyle('C681:I681')->applyFromArray($biru);

        $sheet->setCellValue('A683', "F");
        $sheet->getStyle('A683')->getFont()->setBold(true);
        $sheet->setCellValue('C683', "R/K ANTAR UNIT USAHA");
        $sheet->getStyle('C683')->getFont()->setBold(true);
        $sheet->setCellValue('D684', "R/K Antar Unit Usaha Korporat BTM");
        $sheet->setCellValue('E684', "950.00.000");
        $sheet->setCellValue('D685', "R/K Antar Unit Usaha – RSBT Pangkalpinang");
        $sheet->setCellValue('E685', "950.01.000");
        $sheet->setCellValue('D686', "R/K Antar Unit Usaha – RSBT Sungailiat");
        $sheet->setCellValue('E686', "950.02.000");
        $sheet->setCellValue('D687', "R/K Antar Unit Usaha – RSBT Karimun");
        $sheet->setCellValue('E687', "950.03.000");
        $sheet->setCellValue('D688', "R/K Antar Unit Usaha – RSBT Muntok");
        $sheet->setCellValue('E688', "950.04.000");
        $sheet->setCellValue('D689', "R/K Antar Unit Usaha – MCC");
        $sheet->setCellValue('E688', "950.05.000");
        $sheet->setCellValue('D689', "R/K Antar Unit Usaha – Klinik Jebus");
        $sheet->setCellValue('E689', "950.06.000");
        $sheet->setCellValue('D690', "R/K Antar Unit Usaha – Klinik Toboali");
        $sheet->setCellValue('E690', "950.07.000");
        $sheet->setCellValue('D691', "R/K Antar Unit Usaha – Klinik Tanjung Pandan");
        $sheet->setCellValue('E691', "950.08.000");
        $sheet->setCellValue('D692', "R/K Antar Unit Usaha – Klinik Belinyu");
        $sheet->setCellValue('E692', "950.09.000");
        $sheet->setCellValue('D693', "R/K Antar Unit Usaha – FKTP PKL Balam");
        $sheet->setCellValue('E693', "950.10.000");
        $sheet->setCellValue('D694', "R/K Antar Unit Usaha – FKTP KS Tubun");
        $sheet->setCellValue('E694', "950.11.000");
        $sheet->setCellValue('D695', "R/K Antar Unit Usaha – FKTP Kundur");
        $sheet->setCellValue('E695', "950.12.000");
        $sheet->setCellValue('D696', "R/K Antar Unit Usaha – FKTP Manggar");
        $sheet->setCellValue('E696', "950.13.000");
        $sheet->setCellValue('D697', "R/K Antar Unit Usaha – PT BTSM");
        $sheet->setCellValue('E697', "950.14.000");

        $sheet->setCellValue('C698', "TOTAL R/K ANTAR UNIT USAHA");
        $sheet->getStyle('C698:I698')->applyFromArray($biru);

        $sheet->setCellValue('A700', "TOTAL LIABILITAS & EKUITAS");
        $sheet->getStyle('A700:I700')->applyFromArray($merah);

        $sheet->setCellValue('A701', "KONTROL BALANCE");
        $sheet->getStyle('A701:I701')->applyFromArray($merah);

        $sheet->setCellValue('A703', "G");
        $sheet->getStyle('A703')->getFont()->setBold(true);
        $sheet->setCellValue('C703', "PENDAPATAN USAHA");
        $sheet->getStyle('C703')->getFont()->setBold(true);
        $sheet->mergeCells('C703:D703');
        $sheet->setCellValue('A704', "G1");
        $sheet->getStyle('A704')->getFont()->setBold(true);
        $sheet->setCellValue('C704', "PENDAPATAN USAHA PER KELOMPOK PELANGGAN");
        $sheet->getStyle('C704')->getFont()->setBold(true);
        $sheet->mergeCells('C704:D704');
        $sheet->setCellValue('D705', "PERTAMINA (Persero) - Kantor Pusat ==> FFS");
        $sheet->setCellValue('D706', "PERTAMINA (Persero) - Wilayah ==> FFS");
        $sheet->setCellValue('D707', "Pendapatan Anak Perusahaan");
        $sheet->setCellValue('D708', "Pendapatan Selisih Rekonsiliasi ICT Pertamina Group");
        $sheet->setCellValue('D709', "Pendapatan Entitas Asosiasi, Joint Venture dan Afiliasi ");
        $sheet->setCellValue('D710', "Pendapatan Entitas Asosiasi, Joint Venture dan Afiliasi - FFS");
        $sheet->setCellValue('D711', "Pendapatan Entitas Asosiasi, Joint Venture dan Afiliasi - KAPITASI");
        $sheet->setCellValue('D712', "Pendapatan Entitas yang Berelasi dengan BUMN");
        $sheet->setCellValue('D713', "Pendapatan Entitas yang Berelasi dengan Pemerintah");
        $sheet->setCellValue('D714', "Pendapatan Entitas yang Berelasi BPJS Kesehatan");
        $sheet->setCellValue('D715', "Pendapatan Entitas yang Berelasi Others");
        $sheet->setCellValue('D716', "Pendapatan Pihak ke III");
        $sheet->setCellValue('D717', "Pendapatan Cash");
        $sheet->setCellValue('D718', "Pendapatan Inter Segmen (PAU)");
        $sheet->setCellValue('D719', "Selisih Kapitasi");
        $sheet->setCellValue('D720', "Selisih BPJS (Kesehatan)");
        $sheet->setCellValue('D721', "Selisih BPJS (Covid-19)");
        $sheet->setCellValue('D722', "Reduksi Pendapatan (Discount)");
        $sheet->getStyle('D714:D717')->applyFromArray($jingga);
        $sheet->setCellValue('C723', "TOTAL PENDAPATAN USAHA PER KELOMPOK PELANGGAN");
        $sheet->getStyle('C723')->getFont()->setBold(true);
        $sheet->mergeCells('C723:D723');
        $sheet->getStyle('C723:I723')->applyFromArray($biru);
        $sheet->setCellValue('A725', "G2");
        $sheet->getStyle('A725')->getFont()->setBold(true);
        $sheet->setCellValue('C725', "PENDAPATAN USAHA PER KELOMPOK PELANGGAN (NET)");
        $sheet->getStyle('C725')->getFont()->setBold(true);
        $sheet->mergeCells('C725:D725');
        $sheet->setCellValue('D726', "PERTAMINA (Persero) - Kantor Pusat ==> FFS");
        $sheet->setCellValue('D727', "PERTAMINA (Persero) - Wilayah ==> FFS");
        $sheet->setCellValue('D728', "Pendapatan Anak Perusahaan");
        $sheet->setCellValue('D729', "Pendapatan Selisih Rekonsiliasi ICT Pertamina Group");
        $sheet->setCellValue('D730', "Pendapatan Entitas Asosiasi, Joint Venture dan Afiliasi ");
        $sheet->setCellValue('D731', "Pendapatan Entitas Asosiasi, Joint Venture dan Afiliasi - FFS");
        $sheet->setCellValue('D732', "Pendapatan Entitas Asosiasi, Joint Venture dan Afiliasi - KAPITASI");
        $sheet->setCellValue('D733', "Pendapatan Entitas yang Berelasi dengan BUMN");
        $sheet->setCellValue('D734', "Pendapatan Entitas yang Berelasi dengan Pemerintah");
        $sheet->setCellValue('D735', "Pendapatan Entitas yang Berelasi BPJS Kesehatan");
        $sheet->setCellValue('D736', "Pendapatan Entitas yang Berelasi Others");
        $sheet->setCellValue('D737', "Pendapatan Pihak ke III");
        $sheet->setCellValue('D738', "Pendapatan Cash");
        $sheet->setCellValue('D739', "Pendapatan Inter Segmen (PAU)");
        $sheet->setCellValue('D740', "Selisih Kapitasi");
        $sheet->setCellValue('D741', "Selisih BPJS (Kesehatan)");
        $sheet->setCellValue('D742', "Selisih BPJS (Covid-19)");
        $sheet->getStyle('D735:D738')->applyFromArray($jingga);
        $sheet->setCellValue('C743', "TOTAL PENDAPATAN USAHA PER KELOMPOK PELANGGAN(NET)");
        $sheet->getStyle('C743')->getFont()->setBold(true);
        $sheet->mergeCells('C743:D743');
        $sheet->getStyle('B743:I743')->applyFromArray($biru);
        $sheet->setCellValue('A744', "KONTROL PENDAPATAN USAHA");
        $sheet->getStyle('A744:I744')->applyFromArray($merah);
        $sheet->mergeCells('A744:D744');
        $sheet->setCellValue('A746', "G3");
        $sheet->getStyle('A746')->getFont()->setBold(true);
        $sheet->setCellValue('C746', "PENDAPATAN USAHA PER KELOMPOK LAYANAN");
        $sheet->getStyle('C746')->getFont()->setBold(true);
        $sheet->mergeCells('C746:D746');
        $sheet->setCellValue('D747', "Layanan Rawat Jalan");
        $sheet->setCellValue('E747', "701.xx.xxx");
        $sheet->setCellValue('D748', "Reduksi (Discount) Layanan Rawat Jalan ");
        $sheet->setCellValue('E748', "721.xx.xxx");
        $sheet->setCellValue('D749', "Layanan Rawat Inap");
        $sheet->setCellValue('E749', "702.xx.xxx");
        $sheet->setCellValue('D750', "Reduksi (Discount) Layanan Rawat Inap ");
        $sheet->setCellValue('E750', "722.xx.xxx");
        $sheet->setCellValue('D751', "Layanan Penunjang Medis");
        $sheet->setCellValue('E751', "703.xx.xxx");
        $sheet->setCellValue('D752', "Reduksi (Discount) Layanan Penunjang Medis");
        $sheet->setCellValue('E752', "723.xx.xxx");
        $sheet->setCellValue('D753', "Layanan Farmasi");
        $sheet->setCellValue('E753', "704.xx.xxx");
        $sheet->setCellValue('D754', "Reduksi (Discount) Layanan Farmasi");
        $sheet->setCellValue('E754', "724.xx.xxx");
        $sheet->setCellValue('D755', "Pendapatan Umum Lainnya");
        $sheet->setCellValue('E755', "705.xx.xxx");
        $sheet->setCellValue('D756', "Reduksi (Discount) Pendapatan Umum Lainnya");
        $sheet->setCellValue('E756', "725.xx.xxx");
        $sheet->setCellValue('D757', "Pendapatan Kapitasi");
        $sheet->setCellValue('E757', "706.xx.xxx");
        $sheet->setCellValue('D758', "Selisih Kapitasi");
        $sheet->setCellValue('E758', "707.xx.xxx");
        $sheet->setCellValue('D759', "Selisih BPJS (Kesehatan)");
        $sheet->setCellValue('E759', "707 02 040");
        $sheet->setCellValue('D760', "Selisih BPJS (Covid-19)");
        $sheet->setCellValue('E760', "707 02 966");
        $sheet->setCellValue('D761', "Diluar Rumah Sakit");
        $sheet->setCellValue('E761', "708.xx.xxx");
        $sheet->setCellValue('D762', "Reduksi (Discount) Diluar Rumah Sakit");
        $sheet->setCellValue('E762', "728.xx.xxx");
        $sheet->setCellValue('D763', "Pendapatan Managed Care");
        $sheet->setCellValue('E763', "740.xx.xxx");
        $sheet->setCellValue('C764', "TOTAL PENDAPATAN USAHA PER KELOMPOK LAYANAN");
        $sheet->getStyle('C764')->getFont()->setBold(true);
        $sheet->getStyle('C764:I764')->applyFromArray($biru);
        $sheet->mergeCells('C764:D764');
        $sheet->setCellValue('A766', "G4");
        $sheet->getStyle('A766')->getFont()->setBold(true);
        $sheet->setCellValue('C766', "PENDAPATAN USAHA PER JENIS PENDAPATAN");
        $sheet->getStyle('C766')->getFont()->setBold(true);
        $sheet->mergeCells('C766:D766');
        $sheet->setCellValue('B767', "G4.1");
        $sheet->getStyle('B767')->getFont()->setBold(true);
        $sheet->setCellValue('D767', "MANAGED CARE & KAPITASI");
        $sheet->getStyle('D767')->getFont()->setBold(true);
        $sheet->setCellValue('D768', "Kapitasi");
        $sheet->setCellValue('E768', "7xx.xx.010");
        $sheet->setCellValue('D769', "Selisih Kapitasi");
        $sheet->setCellValue('E769', "7xx.xx.040");
        $sheet->setCellValue('D770', "ASO");
        $sheet->setCellValue('E770', "7xx.xx.030");
        $sheet->setCellValue('D771', "Selisih BPJS (Kesehatan)");
        $sheet->setCellValue('E771', "7xx.xx.040");
        $sheet->setCellValue('D772', "Selisih BPJS (Covid-19)");
        $sheet->setCellValue('E772', "7xx.xx.966");
        $sheet->setCellValue('D773', "TOTAL MANAGED CARE & KAPITASI");
        $sheet->getStyle('D773')->getFont()->setBold(true);
        $sheet->getStyle('C773:I773')->applyFromArray($hijau);
        $sheet->setCellValue('B775', "G4.1");
        $sheet->getStyle('B775')->getFont()->setBold(true);
        $sheet->setCellValue('D775', "KONSULTASI, VISITE & TINDAKAN");
        $sheet->getStyle('D775')->getFont()->setBold(true);
        $sheet->setCellValue('D776', "Konsul Rawat Jalan - Jasa Dokter");
        $sheet->setCellValue('E776', "7xx.xx.110");
        $sheet->setCellValue('D777', "Konsul Rawat Inap - Jasa Dokter");
        $sheet->setCellValue('E777', "7xx.xx.111");
        $sheet->setCellValue('D778', "Visite Rawat Jalan - Jasa Dokter");
        $sheet->setCellValue('E778', "7xx.xx.120");
        $sheet->setCellValue('D779', "Visite Rawat Inap - Jasa Dokter");
        $sheet->setCellValue('E779', "7xx.xx.121");
        $sheet->setCellValue('D780', "Tindakan Rawat Jalan - Jasa Dokter");
        $sheet->setCellValue('E780', "7xx.xx.130");
        $sheet->getStyle('D780')->applyFromArray($jingga);
        $sheet->setCellValue('D781', "Tindakan Rawat Inap - Jasa Dokter");
        $sheet->setCellValue('E781', "7xx.xx.131");
        $sheet->setCellValue('D782', "Pemeriksaan Rawat Jalan");
        $sheet->setCellValue('E782', "7xx.xx.140");
        $sheet->setCellValue('D783', "Pemeriksaan Rawat Inap");
        $sheet->setCellValue('E783', "7xx.xx.141");
        $sheet->setCellValue('D784', "Konsul Luar Rawat Jalan");
        $sheet->setCellValue('E784', "7xx.xx.150");
        $sheet->setCellValue('D785', "Konsul Luar Rawat Inap");
        $sheet->setCellValue('E785', "7xx.xx.151");
        $sheet->setCellValue('D786', "Tindakan Penunjang Rawat Jalan");
        $sheet->setCellValue('E786', "7xx.xx.160");
        $sheet->setCellValue('D787', "Tindakan Penunjang Rawat Inap");
        $sheet->setCellValue('E787', "7xx.xx.161");
        $sheet->setCellValue('D788', "Konsul Rawat Jalan - Jasa Sarana");
        $sheet->setCellValue('E788', "7xx.xx.170");
        $sheet->setCellValue('D789', "Konsul Rawat Inap - Jasa Sarana");
        $sheet->setCellValue('E789', "7xx.xx.171");
        $sheet->setCellValue('D790', "Visite Rawat Jalan - Jasa Sarana");
        $sheet->setCellValue('E790', "7xx.xx.172");
        $sheet->setCellValue('D791', "Visite Rawat Inap - Jasa Sarana");
        $sheet->setCellValue('E791', "7xx.xx.173");
        $sheet->setCellValue('D792', "Tindakan Rawat Jalan - Jasa Sarana");
        $sheet->setCellValue('E792', "7xx.xx.174");
        $sheet->setCellValue('D793', "Tindakan Rawat Inap - Jasa Sarana");
        $sheet->setCellValue('E793', "7xx.xx.175");
        $sheet->setCellValue('D794', "Pemeriksaan Rawat Jalan - Jasa Sarana");
        $sheet->setCellValue('E794', "7xx.xx.176");
        $sheet->setCellValue('D795', "Pemeriksaan Rawat Inap - Jasa Sarana");
        $sheet->setCellValue('E795', "7xx.xx.177");
        $sheet->setCellValue('D796', "Tindakan Penunjang Rawat Jalan - Jasa Sarana");
        $sheet->setCellValue('E796', "7xx.xx.178");
        $sheet->setCellValue('D797', "Tindakan Penunjang Rawat Inap - Jasa Sarana");
        $sheet->setCellValue('E797', "7xx.xx.179");
        $sheet->setCellValue('D798', "TOTAL KONSULTASI, VISITE & TINDAKAN");
        $sheet->getStyle('D798')->getFont()->setBold(true);
        $sheet->getStyle('C798:I798')->applyFromArray($hijau);
        $sheet->setCellValue('B800', "G4.3");
        $sheet->getStyle('B800')->getFont()->setBold(true);
        $sheet->setCellValue('D800', "SEWA KAMAR");
        $sheet->getStyle('D800')->getFont()->setBold(true);
        $sheet->setCellValue('D801', "Sewa Kamar Perawatan");
        $sheet->setCellValue('E801', "7xx.xx.210");
        $sheet->setCellValue('D802', "Sewa Kamar Bedah Rawat Jalan");
        $sheet->setCellValue('E802', "7xx.xx.220");
        $sheet->setCellValue('D803', "Sewa Kamar Bedah Rawat Inap");
        $sheet->setCellValue('E803', "7xx.xx.221");
        $sheet->setCellValue('D804', "Sewa Kamar Bersalin");
        $sheet->setCellValue('E804', "7xx.xx.230");
        $sheet->setCellValue('D805', "One Day Care");
        $sheet->setCellValue('E805', "7xx.xx.240");
        $sheet->setCellValue('D806', "ICU/ICCU/NICU/PICU");
        $sheet->setCellValue('E806', "7xx.xx.250");
        $sheet->setCellValue('D807', "TOTAL SEWA KAMAR");
        $sheet->getStyle('D807')->getFont()->setBold(true);
        $sheet->getStyle('C807:I807')->applyFromArray($hijau);
        $sheet->setCellValue('B809', "G4.4");
        $sheet->getStyle('B809')->getFont()->setBold(true);
        $sheet->setCellValue('D809', "SEWA ALAT");
        $sheet->getStyle('D809')->getFont()->setBold(true);
        $sheet->setCellValue('D810', "Sewa Alat Rawat Jalan ");
        $sheet->setCellValue('E810', "7xx.xx.410");
        $sheet->setCellValue('D811', "Sewa Alat Rawat Inap ");
        $sheet->setCellValue('E811', "7xx.xx.411");
        $sheet->setCellValue('D812', "TOTAL SEWA ALAT");
        $sheet->getStyle('D812')->getFont()->setBold(true);
        $sheet->getStyle('C812:I812')->applyFromArray($hijau);
        $sheet->setCellValue('B814', "G4.5");
        $sheet->getStyle('B814')->getFont()->setBold(true);
        $sheet->setCellValue('D814', "OBAT-OBATAN");
        $sheet->getStyle('D814')->getFont()->setBold(true);
        $sheet->setCellValue('D815', "Obat Farmasi Rawat Jalan");
        $sheet->setCellValue('E815', "7xx.xx.420");
        $sheet->setCellValue('D816', "Obat Farmasi Rawat Inap ");
        $sheet->setCellValue('E816', "7xx.xx.421");
        $sheet->setCellValue('D817', "Obat produksi Rawat Jalan ");
        $sheet->setCellValue('E817', "7xx.xx.422");
        $sheet->setCellValue('D818', "Obat produksi Rawat Inap ");
        $sheet->setCellValue('E818', "7xx.xx.423");
        $sheet->setCellValue('D819', "Apotik Luar");
        $sheet->setCellValue('E819', "7xx.xx.440");
        $sheet->setCellValue('D820', "Obat Non Resep Rawat Jalan");
        $sheet->setCellValue('E820', "7xx.xx.510");
        $sheet->setCellValue('D821', "Obat Non Resep Rawat Inap ");
        $sheet->setCellValue('E821', "7xx.xx.511");
        $sheet->getStyle('D821')->applyFromArray($jingga);
        $sheet->setCellValue('D822', "TOTAL OBAT-OBATAN");
        $sheet->getStyle('D822')->getFont()->setBold(true);
        $sheet->getStyle('C822:I822')->applyFromArray($hijau);
        $sheet->setCellValue('B824', "G4.6");
        $sheet->getStyle('B824')->getFont()->setBold(true);
        $sheet->setCellValue('D824', "MEDICAL SUPPLY");
        $sheet->getStyle('D824')->getFont()->setBold(true);
        $sheet->setCellValue('D825', "Medical supplies Rawat Jalan");
        $sheet->setCellValue('E825', "7xx.xx.430");
        $sheet->setCellValue('D826', "Medical supplies Rawat Inap");
        $sheet->setCellValue('E826', "7xx.xx.431");
        $sheet->setCellValue('D827', "Medical supplies Non Resep Rawat Jalan");
        $sheet->setCellValue('E827', "7xx.xx.520");
        $sheet->setCellValue('D828', "Medical supplies Non Resep Rawat Inap");
        $sheet->setCellValue('E828', "7xx.xx.521");
        $sheet->setCellValue('D829', "TOTAL MEDICAL SUPPLY");
        $sheet->getStyle('D829')->getFont()->setBold(true);
        $sheet->getStyle('C829:I829')->applyFromArray($hijau);
        $sheet->setCellValue('B831', "G4.7");
        $sheet->getStyle('B831')->getFont()->setBold(true);
        $sheet->setCellValue('D831', "PENUNJANG MEDIS");
        $sheet->getStyle('D831')->getFont()->setBold(true);
        $sheet->setCellValue('D832', "Fisioterapi Rawat Jalan");
        $sheet->setCellValue('E832', "7xx.xx.310");
        $sheet->setCellValue('D833', "Fisioterapi Rawat Inap");
        $sheet->setCellValue('E833', "7xx.xx.311");
        $sheet->setCellValue('D834', "Patologi/Sitologi Rawat Jalan");
        $sheet->setCellValue('E834', "7xx.xx.320");
        $sheet->setCellValue('D835', "Patologi/Sitologi Rawat Inap");
        $sheet->setCellValue('E835', "7xx.xx.321");
        $sheet->setCellValue('D836', "Kedokteran Nuklir Rawat Jalan");
        $sheet->setCellValue('E836', "7xx.xx.330");
        $sheet->setCellValue('D837', "Kedokteran Nuklir Rawat Inap");
        $sheet->setCellValue('E837', "7xx.xx.331");
        $sheet->setCellValue('D838', "Kedokteran Nuklir Luar");
        $sheet->setCellValue('E838', "7xx.xx.332");
        $sheet->setCellValue('D839', "MCU (insite)");
        $sheet->setCellValue('E839', "7xx.xx.340");
        $sheet->setCellValue('D840', "Haemodialisa");
        $sheet->setCellValue('E840', "7xx.xx.350");
        $sheet->setCellValue('D841', "Anaesthesi Rawat Jalan");
        $sheet->setCellValue('E841', "7xx.xx.530");
        $sheet->setCellValue('D842', "Anaesthesi Rawat Inap");
        $sheet->setCellValue('E842', "7xx.xx.531");
        $sheet->setCellValue('D843', "Radioterapi Rawat Jalan");
        $sheet->setCellValue('E843', "7xx.xx.710");
        $sheet->setCellValue('D844', "Radioterapi Rawat Inap");
        $sheet->setCellValue('E844', "7xx.xx.711");
        $sheet->setCellValue('D845', "Radioterapi Luar");
        $sheet->setCellValue('E845', "7xx.xx.712");
        $sheet->setCellValue('D846', "Radiodiagnostik Rawat Jalan");
        $sheet->setCellValue('E846', "7xx.xx.720");
        $sheet->setCellValue('D847', "Radiodiagnostik Rawat Inap");
        $sheet->setCellValue('E847', "7xx.xx.721");
        $sheet->setCellValue('D848', "Radiodiagnostik Luar");
        $sheet->setCellValue('E848', "7xx.xx.722");
        $sheet->setCellValue('D849', "MRI RJ");
        $sheet->setCellValue('E849', "7xx.xx.723");
        $sheet->setCellValue('D850', "MRI RI");
        $sheet->setCellValue('E850', "7xx.xx.724");
        $sheet->setCellValue('D851', "CT SCANNING RJ");
        $sheet->setCellValue('E851', "7xx.xx.725");
        $sheet->setCellValue('D852', "CT SCANNING RI");
        $sheet->setCellValue('E852', "7xx.xx.726");
        $sheet->setCellValue('D853', "USG RJ");
        $sheet->setCellValue('E853', "7xx.xx.727");
        $sheet->setCellValue('D854', "USG RI");
        $sheet->setCellValue('E854', "7xx.xx.728");
        $sheet->setCellValue('D855', "BONE MATERIAL DENSITOMETRI RJ");
        $sheet->setCellValue('E855', "7xx.xx.740");
        $sheet->setCellValue('D856', "BONE MATERIAL DENSITOMETRI RI");
        $sheet->setCellValue('E856', "7xx.xx.741");
        $sheet->setCellValue('D857', "Laboratorium klinik Rawat Jalan");
        $sheet->setCellValue('E857', "7xx.xx.810");
        $sheet->setCellValue('D858', "Laboratorium klinik Rawat Inap");
        $sheet->setCellValue('E858', "7xx.xx.811");
        $sheet->setCellValue('D859', "Bank Darah RJ");
        $sheet->setCellValue('E859', "7xx.xx.820");
        $sheet->setCellValue('D860', "Bank Darah RI");
        $sheet->setCellValue('E860', "7xx.xx.821");
        $sheet->setCellValue('D861', "Lab Rujukan/ Luar Rawat Jalan");
        $sheet->setCellValue('E861', "7xx.xx.830");
        $sheet->setCellValue('D862', "Lab Rujukan/ Luar Rawat Inap");
        $sheet->setCellValue('E862', "7xx.xx.831");
        $sheet->setCellValue('D863', "Laboratorium Patologi Anatomi R. Jalan");
        $sheet->setCellValue('E863', "7xx.xx.840");
        $sheet->setCellValue('D864', "Laboratorium Patologi Anatomi R. Inap");
        $sheet->setCellValue('E864', "7xx.xx.841");
        $sheet->getStyle('D859')->applyFromArray($jingga);
        $sheet->getStyle('D862')->applyFromArray($jingga);
        $sheet->setCellValue('D865', "TOTAL PENUNJANG MEDIS");
        $sheet->getStyle('D865')->getFont()->setBold(true);
        $sheet->getStyle('C865:I865')->applyFromArray($hijau);
        $sheet->setCellValue('B867', "G4.8");
        $sheet->getStyle('B867')->getFont()->setBold(true);
        $sheet->setCellValue('D867', "PENDAPATAN USAHA LAINNYA");
        $sheet->getStyle('D867')->getFont()->setBold(true);
        $sheet->setCellValue('D868', "Kamar Jenazah Rawat Jalan");
        $sheet->setCellValue('E868', "7xx.xx.610");
        $sheet->setCellValue('D869', "Kamar Jenazah Rawat Inap");
        $sheet->setCellValue('E869', "7xx.xx.611");
        $sheet->setCellValue('D870', "Ambulance Rawat Jalan");
        $sheet->setCellValue('E870', "7xx.xx.620");
        $sheet->setCellValue('D871', "Ambulance Rawat Inap");
        $sheet->setCellValue('E871', "7xx.xx.621");
        $sheet->setCellValue('D872', "Administrasi Medis Rawat Jalan");
        $sheet->setCellValue('E872', "7xx.xx.910");
        $sheet->setCellValue('D873', "Administrasi Medis Rawat Inap");
        $sheet->setCellValue('E873', "7xx.xx.911");
        $sheet->setCellValue('D874', "Extra fooding");
        $sheet->setCellValue('E874', "7xx.xx.920");
        $sheet->setCellValue('D875', "Oksigen Rawat Jalan");
        $sheet->setCellValue('E875', "7xx.xx.940");
        $sheet->setCellValue('D876', "Oksigen Rawat Inap");
        $sheet->setCellValue('E876', "7xx.xx.941");
        $sheet->setCellValue('D877', "Oksigen UGD");
        $sheet->setCellValue('E877', "7xx.xx.942");
        $sheet->setCellValue('D878', "Bakti Sosial (PKBL)");
        $sheet->setCellValue('E878', "7xx.xx.943");
        $sheet->setCellValue('D879', "Incenerator");
        $sheet->setCellValue('E879', "7xx.xx.957");
        $sheet->setCellValue('D880', "Laundry");
        $sheet->setCellValue('E880', "7xx.xx.972");
        $sheet->setCellValue('D881', "CSR (Corporate Social Responsibility)");
        $sheet->setCellValue('E881', "7xx.xx.947");
        $sheet->setCellValue('D882', "TOTAL PENDAPATAN USAHA LAINNYA");
        $sheet->getStyle('D882')->getFont()->setBold(true);
        $sheet->getStyle('C882:I882')->applyFromArray($hijau);
        $sheet->setCellValue('B884', "G4.9");
        $sheet->getStyle('B884')->getFont()->setBold(true);
        $sheet->setCellValue('D884', "PENDAPATAN USAHA DILUAR RUMAH SAKIT");
        $sheet->getStyle('D884')->getFont()->setBold(true);
        $sheet->setCellValue('D885', "MCU Onsite");
        $sheet->setCellValue('E885', "7xx.xx.341");
        $sheet->setCellValue('D886', "MCU Turn Around");
        $sheet->setCellValue('E886', "7xx.xx.342");
        $sheet->setCellValue('D887', "Daily Check Up");
        $sheet->setCellValue('E887', "7xx.xx.343");
        $sheet->setCellValue('D888', "Sewa Alat Onsite");
        $sheet->setCellValue('E888', "7xx.xx.412");
        $sheet->setCellValue('D889', "Obat Farmasi Onsite");
        $sheet->setCellValue('E889', "7xx.xx.424");
        $sheet->setCellValue('D890', "Ambulance Onsite");
        $sheet->setCellValue('E890', "7xx.xx.622");
        $sheet->setCellValue('D891', "Fooging");
        $sheet->setCellValue('E891', "7xx.xx.990");
        $sheet->setCellValue('D892', "Spraying");
        $sheet->setCellValue('E892', "7xx.xx.991");
        $sheet->setCellValue('D893', "Termite Kontrol");
        $sheet->setCellValue('E893', "7xx.xx.992");
        $sheet->setCellValue('D894', "Pest Kontrol");
        $sheet->setCellValue('E894', "7xx.xx.993");
        $sheet->setCellValue('D895', "Evakuasi Medis");
        $sheet->setCellValue('E895', "7xx.xx.946");
        $sheet->setCellValue('D896', "On Site Klinik");
        $sheet->setCellValue('E896', "7xx.xx.948");
        $sheet->setCellValue('D897', "Medical Onsite");
        $sheet->setCellValue('E897', "7xx.xx.949");
        $sheet->setCellValue('D898', "First Aid Trainning");
        $sheet->setCellValue('E898', "7xx.xx.994");
        $sheet->setCellValue('D899', "Health Risk Assessment (HRA)");
        $sheet->setCellValue('E899', "7xx.xx.995");
        $sheet->setCellValue('D900', "Promotif Program (Corporate Wellness Program)");
        $sheet->setCellValue('E900', "7xx.xx.996");
        $sheet->setCellValue('D901', "TOTAL PENDAPATAN USAHA LAINNYA");
        $sheet->getStyle('D901')->getFont()->setBold(true);
        $sheet->getStyle('C901:I901')->applyFromArray($hijau);
        $sheet->setCellValue('C903', "TOTAL PENDAPATAN USAHA PER JENIS PENDAPATAN)");
        $sheet->getStyle('C903')->getFont()->setBold(true);
        $sheet->mergeCells('C903:D903');
        $sheet->getStyle('B903:I903')->applyFromArray($biru);
        $sheet->setCellValue('A904', "KONTROL PENDAPATAN USAHA");
        $sheet->getStyle('A904:I904')->applyFromArray($merah);
        $sheet->mergeCells('A904:D904');
        $sheet->setCellValue('A905', "KONTROL PENDAPATAN USAHA (PENDAPATAN LAYANAN VS PELANGGAN)");
        $sheet->getStyle('A905:I905')->applyFromArray($merah);
        $sheet->mergeCells('A905:D905');

        $sheet->setCellValue('A907', "H");
        $sheet->getStyle('A907')->getFont()->setBold(true);
        $sheet->setCellValue('C907', "BEBAN USAHA");
        $sheet->getStyle('C907')->getFont()->setBold(true);
        $sheet->mergeCells('C907:D907');
        $sheet->setCellValue('A908', "H1");
        $sheet->getStyle('A908')->getFont()->setBold(true);
        $sheet->setCellValue('C908', "BEBAN USAHA PER KELOMPOK LAYANAN");
        $sheet->getStyle('C908')->getFont()->setBold(true);
        $sheet->mergeCells('C908:D908');
        $sheet->setCellValue('D909', "Layanan Rawat Jalan");
        $sheet->setCellValue('E909', "801.xx.xxx");
        $sheet->setCellValue('D910', "Layanan Rawat Inap");
        $sheet->setCellValue('E910', "802.xx.xxx");
        $sheet->setCellValue('D911', "Layanan Penunjang Medis");
        $sheet->setCellValue('E911', "803.xx.xxx");
        $sheet->setCellValue('D912', "Layanan Farmasi");
        $sheet->setCellValue('E912', "804.xx.xxx");
        $sheet->setCellValue('D913', "Beban Umum Lainnya");
        $sheet->setCellValue('E913', "805.xx.xxx");
        $sheet->setCellValue('D914', "Beban Kapitasi");
        $sheet->setCellValue('E914', "806.xx.xxx");
        $sheet->setCellValue('D915', "Beban Usaha Diluar RS");
        $sheet->setCellValue('E915', "807.xx.xxx");
        $sheet->setCellValue('D916', "Beban Pelayanan Keperawatan");
        $sheet->setCellValue('E916', "808.xx.xxx");
        $sheet->setCellValue('D917', "Beban Staf Medis Fungsional");
        $sheet->setCellValue('E917', "822.xx.xxx");
        $sheet->setCellValue('D918', "Beban Managed Care");
        $sheet->setCellValue('E918', "823.xx.xxx");
        $sheet->setCellValue('D919', "Beban Manajemen");
        $sheet->setCellValue('E919', "831.xx.xxx");
        $sheet->setCellValue('D920', "Beban Penunjang Operasional");
        $sheet->setCellValue('E920', "832.xx.xxx");
        $sheet->setCellValue('C921', "TOTAL BEBAN USAHA PER KELOMPOK LAYANAN");
        $sheet->getStyle('C921')->getFont()->setBold(true);
        $sheet->mergeCells('C921:D921');
        $sheet->getStyle('B921:I921')->applyFromArray($biru);
        $sheet->setCellValue('A923', "H2");
        $sheet->getStyle('A923')->getFont()->setBold(true);
        $sheet->setCellValue('C923', "BEBAN USAHA PER JENIS BIAYA");
        $sheet->getStyle('C923')->getFont()->setBold(true);
        $sheet->mergeCells('C923:D923');
        $sheet->setCellValue('B924', "H2.1  ");
        $sheet->getStyle('B924')->getFont()->setBold(true);
        $sheet->setCellValue('D924', "BIAYA PEKERJA");
        $sheet->getStyle('D924')->getFont()->setBold(true);
        $sheet->setCellValue('D925', "Upah tetap");
        $sheet->setCellValue('E925', "8xx.xx.101");
        $sheet->setCellValue('D926', "Upah PWT");
        $sheet->setCellValue('E926', "8xx.xx.102");
        $sheet->setCellValue('D927', "Tunjangan Jabatan ");
        $sheet->setCellValue('E927', "8xx.xx.103");
        $sheet->setCellValue('D928', "Tunjangan daerah");
        $sheet->setCellValue('E928', "8xx.xx.104");
        $sheet->setCellValue('D929', "Tunjangan hari raya ");
        $sheet->setCellValue('E929', "8xx.xx.105");
        $sheet->setCellValue('D930', "Tunjangan Perumahan Pekerja");
        $sheet->setCellValue('E930', "8xx.xx.106");
        $sheet->setCellValue('D931', "Tunjangan Fungsional ");
        $sheet->setCellValue('E931', "8xx.xx.107");
        $sheet->setCellValue('D932', "Tunjangan Radiasi ");
        $sheet->setCellValue('E932', "8xx.xx.108");
        $sheet->setCellValue('D933', "Tunjangan Dokter Jaga Ruangan");
        $sheet->setCellValue('E933', "8xx.xx.109");
        $sheet->setCellValue('D934', "Tunjangan Transport ");
        $sheet->setCellValue('E934', "8xx.xx.110");
        $sheet->setCellValue('D935', "Tunjangan Kasir");
        $sheet->setCellValue('E935', "8xx.xx.111");
        $sheet->setCellValue('D936', "Tunjangan Pajak Penghasilan ");
        $sheet->setCellValue('E936', "8xx.xx.112");
        $sheet->setCellValue('D937', "Honor Dokter ");
        $sheet->setCellValue('E937', "8xx.xx.113");
        $sheet->setCellValue('D938', "Insentif Praktek Sore ");
        $sheet->setCellValue('E938', "8xx.xx.114");
        $sheet->setCellValue('D939', "Imbalan Jasa Pelayanan ");
        $sheet->setCellValue('E939', "8xx.xx.115");
        $sheet->setCellValue('D940', "Imbalan Pasca Kerja ");
        $sheet->setCellValue('E940', "8xx.xx.116");
        $sheet->setCellValue('D941', "Iuran Jamsostek");
        $sheet->setCellValue('E941', "8xx.xx.117");
        $sheet->setCellValue('D942', "Iuran Dana Pensiun (DPLK)");
        $sheet->setCellValue('E942', "8xx.xx.118");
        $sheet->setCellValue('D943', "Bantuan Kehadiran");
        $sheet->setCellValue('E943', "8xx.xx.119");
        $sheet->setCellValue('D944', "Uang Shift");
        $sheet->setCellValue('E944', "8xx.xx.120");
        $sheet->setCellValue('D945', "Uang makan /On call");
        $sheet->setCellValue('E945', "8xx.xx.121");
        $sheet->setCellValue('D946', "Uang Lembur");
        $sheet->setCellValue('E946', "8xx.xx.122");
        $sheet->setCellValue('D947', "Uang Cuti");
        $sheet->setCellValue('E947', "8xx.xx.123");
        $sheet->setCellValue('D948', "Tabungan Kesehatan");
        $sheet->setCellValue('E948', "8xx.xx.124");
        $sheet->setCellValue('D949', "Magang Akper");
        $sheet->setCellValue('E949', "8xx.xx.125");
        $sheet->setCellValue('D950', "Jasa Produksi (Bonus)  ");
        $sheet->setCellValue('E950', "8xx.xx.126");
        $sheet->setCellValue('D951', "Biaya Pesangon");
        $sheet->setCellValue('E951', "8xx.xx.127");
        $sheet->setCellValue('D952', "Honor (all in)");
        $sheet->setCellValue('E952', "8xx.xx.128");
        $sheet->setCellValue('D953', "Ulang Tahun Dinas ");
        $sheet->setCellValue('E953', "8xx.xx.129");
        $sheet->setCellValue('D954', "Imbalan Jasa Dokter");
        $sheet->setCellValue('E954', "8xx.xx.130");
        $sheet->setCellValue('D955', "Tantiem");
        $sheet->setCellValue('E955', "8xx.xx.131");
        $sheet->setCellValue('D956', "Perjalanan Dinas ");
        $sheet->setCellValue('E956', "8xx.xx.812");
        $sheet->setCellValue('D957', "Pendidikan (Simposium/Training/Kursus)");
        $sheet->setCellValue('E957', "8xx.xx.813");
        $sheet->setCellValue('D958', "Pengobatan/Kacamata ");
        $sheet->setCellValue('E958', "8xx.xx.817");
        $sheet->getStyle('D934')->applyFromArray($jingga);
        $sheet->getStyle('D944')->applyFromArray($jingga);
        $sheet->setCellValue('D959', "TOTAL BIAYA PEKERJA");
        $sheet->getStyle('D959')->getFont()->setBold(true);
        $sheet->getStyle('C959:I959')->applyFromArray($hijau);
        $sheet->setCellValue('B961', "H2.2");
        $sheet->getStyle('B961')->getFont()->setBold(true);
        $sheet->setCellValue('D961', "BIAYA OPERASIONAL (MATERIAL OBAT)");
        $sheet->getStyle('D961')->getFont()->setBold(true);
        $sheet->setCellValue('D962', "Obat obatan jadi");
        $sheet->setCellValue('E962', "8xx.xx.208");
        $sheet->setCellValue('D963', "Bahan Obat");
        $sheet->setCellValue('E963', "8xx.xx.209");
        $sheet->setCellValue('D964', "Susu");
        $sheet->setCellValue('E964', "8xx.xx.210");
        $sheet->setCellValue('D965', "Sera /Vaksin");
        $sheet->setCellValue('E965', "8xx.xx.211");
        $sheet->setCellValue('D966', "Infuse");
        $sheet->setCellValue('E966', "8xx.xx.212");
        $sheet->setCellValue('D967', "Obat Produksi ");
        $sheet->setCellValue('E967', "8xx.xx.240");
        $sheet->setCellValue('D968', "Obat Inhealth ");
        $sheet->setCellValue('E968', "8xx.xx.241");
        $sheet->setCellValue('D969', "Obat BPJS");
        $sheet->setCellValue('E969', "8xx.xx.244");
        $sheet->setCellValue('D970', "TOTAL BIAYA OPERASIONAL (MATERIAL OBAT)");
        $sheet->getStyle('D970')->getFont()->setBold(true);
        $sheet->getStyle('C970:I970')->applyFromArray($hijau);
        $sheet->setCellValue('B972', "H2.3");
        $sheet->getStyle('B972')->getFont()->setBold(true);
        $sheet->setCellValue('D972', "BIAYA OPERASIONAL (MATERIAL ALAT KESEHATAN)");
        $sheet->getStyle('D972')->getFont()->setBold(true);
        $sheet->setCellValue('D973', "Embalage");
        $sheet->setCellValue('E973', "8xx.xx.205");
        $sheet->setCellValue('D974', "Alat Suntik");
        $sheet->setCellValue('E974', "8xx.xx.213");
        $sheet->setCellValue('D975', "Bahan Pembalut");
        $sheet->setCellValue('E975', "8xx.xx.214");
        $sheet->setCellValue('D976', "Benang bedah dan keperluan OK");
        $sheet->setCellValue('E976', "8xx.xx.215");
        $sheet->setCellValue('D977', "Glass ware");
        $sheet->setCellValue('E977', "8xx.xx.216");
        $sheet->setCellValue('D978', "Instrumen Kedokteran");
        $sheet->setCellValue('E978', "8xx.xx.217");
        $sheet->setCellValue('D979', "Barang keperluan gigi");
        $sheet->setCellValue('E979', "8xx.xx.218");
        $sheet->setCellValue('D980', "Barang keperluan orthopedi");
        $sheet->setCellValue('E980', "8xx.xx.219");
        $sheet->setCellValue('D981', "Bedah jantung & Pace maker");
        $sheet->setCellValue('E981', "8xx.xx.220");
        $sheet->setCellValue('D982', "Electrode, ECG Paper,Jelly");
        $sheet->setCellValue('E982', "8xx.xx.221");
        $sheet->setCellValue('D983', "Haemodialise");
        $sheet->setCellValue('E983', "8xx.xx.222");
        $sheet->setCellValue('D984', "X Ray Film");
        $sheet->setCellValue('E984', "8xx.xx.223");
        $sheet->setCellValue('D985', "Radio Isotop");
        $sheet->setCellValue('E985', "8xx.xx.224");
        $sheet->setCellValue('D986', "Kimia Laboratorium");
        $sheet->setCellValue('E986', "8xx.xx.225");
        $sheet->setCellValue('D987', "Alkes Inhealth");
        $sheet->setCellValue('E987', "8xx.xx.242");
        $sheet->setCellValue('D988', "Beras Organic");
        $sheet->setCellValue('E988', "8xx.xx.243");
        $sheet->setCellValue('D989', "Alkes BPJS");
        $sheet->setCellValue('E989', "8xx.xx.245");
        $sheet->getStyle('D982')->applyFromArray($jingga);
        $sheet->setCellValue('D990', "TOTAL BIAYA OPERASIONAL (MATERIAL ALAT KESEHATAN)");
        $sheet->getStyle('D990')->getFont()->setBold(true);
        $sheet->getStyle('C990:I990')->applyFromArray($hijau);
        $sheet->setCellValue('B992', "H2.4");
        $sheet->getStyle('B992')->getFont()->setBold(true);
        $sheet->setCellValue('D992', "BIAYA OPERASIONAL (MATERIAL UMUM LAINNYA)");
        $sheet->getStyle('D992')->getFont()->setBold(true);
        $sheet->setCellValue('D993', "Pakaian Bedah");
        $sheet->setCellValue('E993', "8xx.xx.201");
        $sheet->setCellValue('D994', "Pakaian Pasien");
        $sheet->setCellValue('E994', "8xx.xx.202");
        $sheet->setCellValue('D995', "Linen Perawatan/ Bed Cover");
        $sheet->setCellValue('E995', "8xx.xx.203");
        $sheet->setCellValue('D996', "Micro film");
        $sheet->setCellValue('E996', "8xx.xx.204");
        $sheet->setCellValue('D997', "Bahan Insektisida & Rodent Control");
        $sheet->setCellValue('E997', "8xx.xx.206");
        $sheet->setCellValue('D998', "Bahan makanan");
        $sheet->setCellValue('E998', "8xx.xx.207");
        $sheet->setCellValue('D999', "BBM Bensin, Solar & Pelumas");
        $sheet->setCellValue('E999', "8xx.xx.226");
        $sheet->setCellValue('D1000', "Gas Medis");
        $sheet->setCellValue('E1000', "8xx.xx.227");
        $sheet->setCellValue('D1001', "Bahan Kimia Pembersih");
        $sheet->setCellValue('E1001', "8xx.xx.228");
        $sheet->setCellValue('D1002', "Material K3 LL");
        $sheet->setCellValue('E1002', "8xx.xx.229");
        $sheet->setCellValue('D1003', "Material Pemasaran");
        $sheet->setCellValue('E1003', "8xx.xx.230");
        $sheet->setCellValue('D1004', "Komite Medik");
        $sheet->setCellValue('E1004', "8xx.xx.231");
        $sheet->setCellValue('D1005', "Komputer Supplies");
        $sheet->setCellValue('E1005', "8xx.xx.232");
        $sheet->setCellValue('D1006', "Barang Pecah Belah");
        $sheet->setCellValue('E1006', "8xx.xx.233");
        $sheet->setCellValue('D1007', "Rumah Tangga Kantor (RTK)");
        $sheet->setCellValue('E1007', "8xx.xx.234");
        $sheet->setCellValue('D1008', "Alat Tulis Kantor (ATK)");
        $sheet->setCellValue('E1008', "8xx.xx.235");
        $sheet->setCellValue('D1009', "Barang Tehnik Listrik & Mekanik");
        $sheet->setCellValue('E1009', "8xx.xx.236");
        $sheet->setCellValue('D1010', "Barang Tehnik Sipil");
        $sheet->setCellValue('E1010', "8xx.xx.237");
        $sheet->setCellValue('D1011', "Barang Tehnik Medical Equipment");
        $sheet->setCellValue('E1011', "8xx.xx.238");
        $sheet->setCellValue('D1012', "Barang Telekomunikasi dan elektronika");
        $sheet->setCellValue('E1012', "8xx.xx.239");
        $sheet->setCellValue('D1013', "Konsul Luar");
        $sheet->setCellValue('E1013', "8xx.xx.840");
        $sheet->setCellValue('D1014', "KLB (Covid-19)");
        $sheet->setCellValue('E1014', "8xx.xx.866");
        $sheet->setCellValue('D1015', "TOTAL BIAYA OPERASIONAL (MATERIAL UMUM LAINNYA)");
        $sheet->getStyle('D1015')->getFont()->setBold(true);
        $sheet->getStyle('C1015:I1015')->applyFromArray($hijau);
        $sheet->setCellValue('B1017', "H2.5");
        $sheet->getStyle('B1017')->getFont()->setBold(true);
        $sheet->setCellValue('D1017', "BIAYA KAPITASI");
        $sheet->getStyle('D1017')->getFont()->setBold(true);
        $sheet->setCellValue('D1018', "Biaya Pensiunan");
        $sheet->setCellValue('E1018', "8xx.xx.001");
        $sheet->setCellValue('D1019', "Biaya PISA");
        $sheet->setCellValue('E1019', "8xx.xx.002");
        $sheet->setCellValue('D1020', "TOTAL BIAYA KAPITASI");
        $sheet->getStyle('D1020')->getFont()->setBold(true);
        $sheet->getStyle('C1020:I1020')->applyFromArray($hijau);
        $sheet->setCellValue('B1022', "H2.6");
        $sheet->getStyle('B1022')->getFont()->setBold(true);
        $sheet->setCellValue('D1022', "BIAYA PEMELIHARAAN");
        $sheet->getStyle('D1022')->getFont()->setBold(true);
        $sheet->setCellValue('D1023', "Gedung & Bangunan");
        $sheet->setCellValue('E1023', "8xx.xx.301");
        $sheet->setCellValue('D1024', "Kendaraan dan Ambulance");
        $sheet->setCellValue('E1024', "8xx.xx.302");
        $sheet->setCellValue('D1025', "Alat Telekomunikasi");
        $sheet->setCellValue('E1025', "8xx.xx.303");
        $sheet->setCellValue('D1026', "Perlengkapan Kantor ");
        $sheet->setCellValue('E1026', "8xx.xx.304");
        $sheet->setCellValue('D1027', "Komputer");
        $sheet->setCellValue('E1027', "8xx.xx.305");
        $sheet->setCellValue('D1028', "Alat Listrik");
        $sheet->setCellValue('E1028', "8xx.xx.306");
        $sheet->setCellValue('D1029', "Alat Mekanik");
        $sheet->setCellValue('E1029', "8xx.xx.307");
        $sheet->setCellValue('D1030', "Alat AC");
        $sheet->setCellValue('E1030', "8xx.xx.308");
        $sheet->setCellValue('D1031', "Alat Lift");
        $sheet->setCellValue('E1031', "8xx.xx.309");
        $sheet->setCellValue('D1032', "Alat Medis");
        $sheet->setCellValue('E1032', "8xx.xx.310");
        $sheet->setCellValue('D1033', "Alat Rumah Tangga");
        $sheet->setCellValue('E1033', "8xx.xx.311");
        $sheet->setCellValue('D1034', "Kebersihan gedung & halaman");
        $sheet->setCellValue('E1034', "8xx.xx.312");
        $sheet->setCellValue('D1035', "Barang K3 LL");
        $sheet->setCellValue('E1035', "8xx.xx.313");
        $sheet->getStyle('D1032')->applyFromArray($jingga);
        $sheet->setCellValue('D1036', "TOTAL BIAYA PEMELIHARAAN");
        $sheet->getStyle('D1036')->getFont()->setBold(true);
        $sheet->getStyle('C1036:I1036')->applyFromArray($hijau);
        $sheet->setCellValue('B1038', "H2.7");
        $sheet->getStyle('B1038')->getFont()->setBold(true);
        $sheet->setCellValue('D1038', "BIAYA PENYUSUTAN & AMORTISASI");
        $sheet->getStyle('D1038')->getFont()->setBold(true);
        $sheet->setCellValue('D1039', "Tanah");
        $sheet->setCellValue('E1039', "8xx.xx.401");
        $sheet->setCellValue('D1040', "Gedung dan Bangunan");
        $sheet->setCellValue('E1040', "8xx.xx.402");
        $sheet->setCellValue('D1041', "Kendaraan dan Ambulance");
        $sheet->setCellValue('E1041', "8xx.xx.403");
        $sheet->setCellValue('D1042', "Alat Telekomunikasi");
        $sheet->setCellValue('E1042', "8xx.xx.404");
        $sheet->setCellValue('D1043', "Peralatan Kantor");
        $sheet->setCellValue('E1043', "8xx.xx.405");
        $sheet->setCellValue('D1044', "Komputer");
        $sheet->setCellValue('E1044', "8xx.xx.406");
        $sheet->setCellValue('D1045', "Alat Listrik");
        $sheet->setCellValue('E1045', "8xx.xx.407");
        $sheet->setCellValue('D1046', "Alat Mekanik");
        $sheet->setCellValue('E1046', "8xx.xx.408");
        $sheet->setCellValue('D1047', "Alat AC");
        $sheet->setCellValue('E1047', "8xx.xx.409");
        $sheet->setCellValue('D1048', "Alat Lift");
        $sheet->setCellValue('E1048', "8xx.xx.410");
        $sheet->setCellValue('D1049', "Alat Medis");
        $sheet->setCellValue('E1049', "8xx.xx.411");
        $sheet->setCellValue('D1050', "Tanah - sewa");
        $sheet->setCellValue('E1050', "8xx.xx.421");
        $sheet->setCellValue('D1051', "Gedung dan Bangunan - sewa");
        $sheet->setCellValue('E1051', "8xx.xx.422");
        $sheet->setCellValue('D1052', "Kendaraan dan Ambulance - sewa");
        $sheet->setCellValue('E1052', "8xx.xx.423");
        $sheet->setCellValue('D1053', "Alat Telekomunikasi - sewa");
        $sheet->setCellValue('E1053', "8xx.xx.424");
        $sheet->setCellValue('D1054', "Peralatan Kantor - sewa");
        $sheet->setCellValue('E1054', "8xx.xx.425");
        $sheet->setCellValue('D1055', "Komputer - sewa");
        $sheet->setCellValue('E1055', "8xx.xx.426");
        $sheet->setCellValue('D1056', "Alat Listrik - sewa");
        $sheet->setCellValue('E1056', "8xx.xx.427");
        $sheet->setCellValue('D1057', "Alat Mekanik - sewa");
        $sheet->setCellValue('E1057', "8xx.xx.428");
        $sheet->setCellValue('D1058', "Alat AC - sewa");
        $sheet->setCellValue('E1058', "8xx.xx.429");
        $sheet->setCellValue('D1059', "Alat Lift - sewa");
        $sheet->setCellValue('E1059', "8xx.xx.430");
        $sheet->setCellValue('D1060', "Alat Medis - sewa");
        $sheet->setCellValue('E1060', "8xx.xx.431");
        $sheet->setCellValue('D1061', "Aktiva Tidak Berwujud");
        $sheet->setCellValue('E1061', "8xx.xx.413");
        $sheet->setCellValue('D1062', "Property Investasi -Tanah");
        $sheet->setCellValue('E1062', "8xx.xx.441");
        $sheet->setCellValue('D1063', "Property Investasi - Gedung & Bangunan");
        $sheet->setCellValue('E1063', "8xx.xx.442");
        $sheet->setCellValue('D1064', "TOTAL BIAYA PENYUSUTAN & AMORTISASI");
        $sheet->getStyle('D1064')->getFont()->setBold(true);
        $sheet->getStyle('C1064:I1064')->applyFromArray($hijau);
        $sheet->setCellValue('B1066', "H2.8");
        $sheet->getStyle('B1066')->getFont()->setBold(true);
        $sheet->setCellValue('D1066', "BIAYA ASURANSI");
        $sheet->getStyle('D1066')->getFont()->setBold(true);
        $sheet->setCellValue('D1067', "Asuransi Profesi");
        $sheet->setCellValue('E1067', "8xx.xx.501");
        $sheet->setCellValue('D1068', "Gedung & Bangunan ");
        $sheet->setCellValue('E1068', "8xx.xx.511");
        $sheet->setCellValue('D1069', "Kendaraan dan Ambulance");
        $sheet->setCellValue('E1069', "8xx.xx.512");
        $sheet->setCellValue('D1070', "Alat Telekomunikasi ");
        $sheet->setCellValue('E1070', "8xx.xx.513");
        $sheet->setCellValue('D1071', "Alat Kantor & Komputer ");
        $sheet->setCellValue('E1071', "8xx.xx.514");
        $sheet->setCellValue('D1072', "Alat Listrik ");
        $sheet->setCellValue('E1072', "8xx.xx.515");
        $sheet->setCellValue('D1073', "Alat mekanik ");
        $sheet->setCellValue('E1073', "8xx.xx.516");
        $sheet->setCellValue('D1074', "Alat AC ");
        $sheet->setCellValue('E1074', "8xx.xx.517");
        $sheet->setCellValue('D1075', "Alat Lift ");
        $sheet->setCellValue('E1075', "8xx.xx.518");
        $sheet->setCellValue('D1076', "Alat Medis ");
        $sheet->setCellValue('E1076', "8xx.xx.519");
        $sheet->setCellValue('D1077', "TOTAL BIAYA ASURANSI");
        $sheet->getStyle('D1077')->getFont()->setBold(true);
        $sheet->getStyle('C1077:I1077')->applyFromArray($hijau);
        $sheet->setCellValue('B1079', "H2.9");
        $sheet->getStyle('B1079')->getFont()->setBold(true);
        $sheet->setCellValue('D1079', "BIAYA SEWA/KONTRAK");
        $sheet->getStyle('D1079')->getFont()->setBold(true);
        $sheet->setCellValue('D1080', "Sewa Gedung/ Lahan");
        $sheet->setCellValue('E1080', "8xx.xx.601");
        $sheet->setCellValue('D1081', "Sewa Kendaraan ");
        $sheet->setCellValue('E1081', "8xx.xx.602");
        $sheet->setCellValue('D1082', "Sewa Komputer & Perlengkapannya");
        $sheet->setCellValue('E1082', "8xx.xx.603");
        $sheet->setCellValue('D1083', "Sewa Medical supplies ");
        $sheet->setCellValue('E1083', "8xx.xx.604");
        $sheet->setCellValue('D1084', "Sewa Telekomunikasi & Elektronika");
        $sheet->setCellValue('E1084', "8xx.xx.605");
        $sheet->setCellValue('D1085', "Sewa Kelola Aset Pertamina");
        $sheet->setCellValue('E1085', "8xx.xx.606");
        $sheet->setCellValue('D1086', "Sewa Tabung Oksigen");
        $sheet->setCellValue('E1086', "8xx.xx.607");
        $sheet->setCellValue('D1087', "Sewa Alat Kantor (ATK)");
        $sheet->setCellValue('E1087', "8xx.xx.608");
        $sheet->setCellValue('D1088', "Sewa Rumah Tangga Kantor (RTK)");
        $sheet->setCellValue('E1088', "8xx.xx.609");
        $sheet->setCellValue('D1089', "Kontrak Micro Film ");
        $sheet->setCellValue('E1089', "8xx.xx.610");
        $sheet->setCellValue('D1090', "Penyajian Cucian (Laundry)");
        $sheet->setCellValue('E1090', "8xx.xx.611");
        $sheet->setCellValue('D1091', "Kontrak Pengemudi");
        $sheet->setCellValue('E1091', "8xx.xx.612");
        $sheet->setCellValue('D1092', "Kontrak Keamanan");
        $sheet->setCellValue('E1092', "8xx.xx.613");
        $sheet->setCellValue('D1093', "Kontrak Kebersihan");
        $sheet->setCellValue('E1093', "8xx.xx.614");
        $sheet->setCellValue('D1094', "Kontrak Nurse Aid");
        $sheet->setCellValue('E1094', "8xx.xx.615");
        $sheet->setCellValue('D1095', "Kontrak Operator");
        $sheet->setCellValue('E1095', "8xx.xx.616");
        $sheet->setCellValue('D1096', "Kontrak Administrasi");
        $sheet->setCellValue('E1096', "8xx.xx.617");
        $sheet->setCellValue('D1097', "Kontrak Kerja Sama Layanan Kesehatan");
        $sheet->setCellValue('E1097', "8xx.xx.618");
        $sheet->setCellValue('D1098', "Kontrak Pemasaran");
        $sheet->setCellValue('E1098', "8xx.xx.619");
        $sheet->setCellValue('D1099', "Kontrak Resepsionis");
        $sheet->setCellValue('E1099', "8xx.xx.620");
        $sheet->setCellValue('D1100', "Penyajian Makanan Pasien");
        $sheet->setCellValue('E1100', "8xx.xx.621");
        $sheet->setCellValue('D1101', "Penyajian Makanan Pekerja");
        $sheet->setCellValue('E1101', "8xx.xx.622");
        $sheet->setCellValue('D1102', "Kontrak Kerja Sama (KSO/ KBH)");
        $sheet->setCellValue('E1102', "8xx.xx.623");
        $sheet->setCellValue('D1103', "Kontrak Konsultan");
        $sheet->setCellValue('E1103', "8xx.xx.624");
        $sheet->setCellValue('D1104', "Kontrak Parkir");
        $sheet->setCellValue('E1104', "8xx.xx.625");
        $sheet->setCellValue('D1105', "TOTAL BIAYA SEWA/KONTRAK");
        $sheet->getStyle('D1105')->getFont()->setBold(true);
        $sheet->getStyle('C1105:I1105')->applyFromArray($hijau);
        $sheet->setCellValue('B1107', "H2.10");
        $sheet->getStyle('B1107')->getFont()->setBold(true);
        $sheet->setCellValue('D1107', "BIAYA SEWA/KONTRAK");
        $sheet->getStyle('D1107')->getFont()->setBold(true);
        $sheet->setCellValue('D1108', "Pos, Materai, Perangko, Telex, Iuran TV");
        $sheet->setCellValue('E1108', "8xx.xx.701");
        $sheet->setCellValue('D1109', "Biaya Keuangan(Premi,Dll)");
        $sheet->setCellValue('E1109', "8xx.xx.702");
        $sheet->setCellValue('D1110', "Perijinan, Dokumentasi, Rapat dll");
        $sheet->setCellValue('E1110', "8xx.xx.703");
        $sheet->setCellValue('D1111', "Perpustakaan (Buku,Majalah/Koran)");
        $sheet->setCellValue('E1111', "8xx.xx.704");
        $sheet->setCellValue('D1112', "TOTAL ADMINISTRASI KANTOR");
        $sheet->getStyle('D1112')->getFont()->setBold(true);
        $sheet->getStyle('C1112:I1112')->applyFromArray($hijau);
        $sheet->setCellValue('D1114', "BIAYA UMUM");
        $sheet->getStyle('D1114')->getFont()->setBold(true);
        $sheet->setCellValue('D1115', "Pengembangan Sistem ");
        $sheet->setCellValue('E1115', "8xx.xx.801");
        $sheet->setCellValue('D1116', "Alat Rumah tangga");
        $sheet->setCellValue('E1116', "8xx.xx.802");
        $sheet->setCellValue('D1117', "Reproduksi");
        $sheet->setCellValue('E1117', "8xx.xx.803");
        $sheet->setCellValue('D1118', "Biaya Managemen & Jasa");
        $sheet->setCellValue('E1118', "8xx.xx.804");
        $sheet->setCellValue('D1119', "Civic Mission");
        $sheet->setCellValue('E1119', "8xx.xx.805");
        $sheet->setCellValue('D1120', "Riset");
        $sheet->setCellValue('E1120', "8xx.xx.806");
        $sheet->setCellValue('D1121', "Bagian Umum");
        $sheet->setCellValue('E1121', "8xx.xx.807");
        $sheet->setCellValue('D1122', "Pemeriksaan Air");
        $sheet->setCellValue('E1122', "8xx.xx.808");
        $sheet->setCellValue('D1123', "TQC/GKM ");
        $sheet->setCellValue('E1123', "8xx.xx.809");
        $sheet->setCellValue('D1124', "Promosi /Pemasaran ");
        $sheet->setCellValue('E1124', "8xx.xx.810");
        $sheet->setCellValue('D1125', "Rumah Dinas");
        $sheet->setCellValue('E1125', "8xx.xx.811");
        $sheet->setCellValue('D1126', "Pakaian dinas ");
        $sheet->setCellValue('E1126', "8xx.xx.814");
        $sheet->setCellValue('D1127', "Bina Karyawan ");
        $sheet->setCellValue('E1127', "8xx.xx.815");
        $sheet->setCellValue('D1128', "Biaya Penagihan");
        $sheet->setCellValue('E1128', "8xx.xx.816");
        $sheet->setCellValue('D1129', "Tiket Perjalanan");
        $sheet->setCellValue('E1129', "8xx.xx.818");
        $sheet->setCellValue('D1130', "Pelayanan Ambulance ");
        $sheet->setCellValue('E1130', "8xx.xx.819");
        $sheet->setCellValue('D1131', "Listrik (PLN)");
        $sheet->setCellValue('E1131', "8xx.xx.820");
        $sheet->setCellValue('D1132', "Air (PAM)");
        $sheet->setCellValue('E1132', "8xx.xx.821");
        $sheet->setCellValue('D1133', "Pulsa Telephone");
        $sheet->setCellValue('E1133', "8xx.xx.822");
        $sheet->setCellValue('D1134', "Pemondokan/ Makan Perawat");
        $sheet->setCellValue('E1134', "8xx.xx.828");
        $sheet->setCellValue('D1135', "Dewan Penyantun");
        $sheet->setCellValue('E1135', "8xx.xx.829");
        $sheet->setCellValue('D1136', "Perjalanan Tahunan/ Haji");
        $sheet->setCellValue('E1136', "8xx.xx.830");
        $sheet->setCellValue('D1137', "Pemasaran & Humas");
        $sheet->setCellValue('E1137', "8xx.xx.831");
        $sheet->setCellValue('D1138', "Penyisihan Piutang");
        $sheet->setCellValue('E1138', "8xx.xx.832");
        $sheet->setCellValue('D1139', "K3 LL");
        $sheet->setCellValue('E1139', "8xx.xx.833");
        $sheet->setCellValue('D1140', "Hukum");
        $sheet->setCellValue('E1140', "8xx.xx.834");
        $sheet->setCellValue('D1141', "PBB (Pajak Bumi & Bangunan)");
        $sheet->setCellValue('E1141', "8xx.xx.838");
        $sheet->setCellValue('D1142', "Biaya Tes Kesehatan");
        $sheet->setCellValue('E1142', "8xx.xx.839");
        $sheet->setCellValue('D1143', "Transport (Tol, parkir dll)");
        $sheet->setCellValue('E1143', "8xx.xx.841");
        $sheet->setCellValue('D1144', "Fogging");
        $sheet->setCellValue('E1144', "8xx.xx.842");
        $sheet->setCellValue('D1145', "Spraying");
        $sheet->setCellValue('E1145', "8xx.xx.843");
        $sheet->setCellValue('D1146', "Termite Kontrol");
        $sheet->setCellValue('E1146', "8xx.xx.844");
        $sheet->setCellValue('D1147', "Pest Kontrol");
        $sheet->setCellValue('E1147', "8xx.xx.845");
        $sheet->setCellValue('D1148', "Barang Hilang");
        $sheet->setCellValue('E1148', "8xx.xx.846");
        $sheet->setCellValue('D1149', "Barang Rusak");
        $sheet->setCellValue('E1149', "8xx.xx.847");
        $sheet->setCellValue('D1150', "Barang Kadaluarsa");
        $sheet->setCellValue('E1150', "8xx.xx.848");
        $sheet->setCellValue('D1151', "Biaya Bakti Sosial / PKBL");
        $sheet->setCellValue('E1151', "8xx.xx.849");
        $sheet->setCellValue('D1152', "Biaya CSR (Corporate Social Responsibility)");
        $sheet->setCellValue('E1152', "8xx.xx.850");
        $sheet->setCellValue('D1153', "Biaya Pengelolaan RS KSO");
        $sheet->setCellValue('E1153', "8xx.xx.851");
        $sheet->setCellValue('D1154', "Pengobatan Pensiunan PERTAMEDIKA");
        $sheet->setCellValue('E1154', "8xx.xx.852");
        $sheet->setCellValue('D1155', "Biaya Internet");
        $sheet->setCellValue('E1155', "8xx.xx.856");
        $sheet->setCellValue('D1156', "Biaya Referral");
        $sheet->setCellValue('E1156', "8xx.xx.857");
        $sheet->setCellValue('D1157', "TOTAL BIAYA UMUM");
        $sheet->getStyle('D1157')->getFont()->setBold(true);
        $sheet->getStyle('C1157:I1157')->applyFromArray($hijau);
        $sheet->setCellValue('C1159', "TOTAL BEBAN USAHA PER JENIS BIAYA");
        $sheet->getStyle('C1159')->getFont()->setBold(true);
        $sheet->mergeCells('C1159:D1159');
        $sheet->getStyle('B1159:I1159')->applyFromArray($biru);
        $sheet->setCellValue('A1160', "KONTROL BEBAN USAHA");
        $sheet->getStyle('A1160:I1160')->applyFromArray($merah);
        $sheet->mergeCells('A1160:D1160');
        $sheet->setCellValue('A1162', "I");
        $sheet->getStyle('A1162')->getFont()->setBold(true);
        $sheet->setCellValue('C1162', "(LABA) / RUGI USAHA");
        $sheet->getStyle('C1162')->getFont()->setBold(true);
        $sheet->mergeCells('C1162:D1162');
        $sheet->getStyle('B1162:I1162')->applyFromArray($biru);
        $sheet->setCellValue('A1164', "J");
        $sheet->getStyle('A1164')->getFont()->setBold(true);
        $sheet->setCellValue('C1164', "PENDAPATAN DILUAR USAHA");
        $sheet->getStyle('C1164')->getFont()->setBold(true);
        $sheet->setCellValue('D1165', "Telephone");
        $sheet->setCellValue('E1165', "8xx.xx.930");
        $sheet->setCellValue('D1166', "Management & Branding Fee");
        $sheet->setCellValue('E1166', "8xx.xx.944");
        $sheet->setCellValue('D1167', "Profit Sharing");
        $sheet->setCellValue('E1167', "8xx.xx.945");
        $sheet->setCellValue('D1168', "Jasa Giro");
        $sheet->setCellValue('E1168', "8xx.xx.951");
        $sheet->setCellValue('D1169', "Bunga Deposito");
        $sheet->setCellValue('E1169', "8xx.xx.952");
        $sheet->setCellValue('D1170', "Deviden/ Investasi");
        $sheet->setCellValue('E1170', "8xx.xx.953");
        $sheet->setCellValue('D1171', "Denda Material");
        $sheet->setCellValue('E1171', "8xx.xx.954");
        $sheet->setCellValue('D1172', "Denda keterlambatan Investasi");
        $sheet->setCellValue('E1172', "8xx.xx.955");
        $sheet->setCellValue('D1173', "Sewa");
        $sheet->setCellValue('E1173', "8xx.xx.956");
        $sheet->setCellValue('D1174', "Selisih Kurs");
        $sheet->setCellValue('E1174', "8xx.xx.958");
        $sheet->setCellValue('D1175', "Bunga Obligasi / Surat Berharga");
        $sheet->setCellValue('E1175', "8xx.xx.959");
        $sheet->setCellValue('D1176', "Laba/Rugi Penyertaan Investasi");
        $sheet->setCellValue('E1176', "8xx.xx.961");
        $sheet->setCellValue('D1177', "Laba/Rugi Penjualan Asset");
        $sheet->setCellValue('E1177', "8xx.xx.962");
        $sheet->setCellValue('D1178', "Pendapatan KSO - Graha ");
        $sheet->setCellValue('E1178', "8xx.xx.963");
        $sheet->setCellValue('D1179', "Pendapatan KSO - Parkir");
        $sheet->setCellValue('E1179', "8xx.xx.964");
        $sheet->setCellValue('D1180', "Laba (Rugi) Penjualan Saham Penyertaan Langsung");
        $sheet->setCellValue('E1180', "8xx.xx.965");
        $sheet->setCellValue('D1181', "Pendapatan IT (Software/Sistem)");
        $sheet->setCellValue('E1181', "8xx.xx.967");
        $sheet->setCellValue('D1182', "(Laba)/Rugi Selisih Modifikasi");
        $sheet->setCellValue('E1182', "8xx.xx.968");
        $sheet->setCellValue('D1183', "Pendapatan Bunga STL");
        $sheet->setCellValue('E1183', "8xx.xx.969");
        $sheet->setCellValue('D1184', "Discount");
        $sheet->setCellValue('E1184', "8xx.xx.970");
        $sheet->setCellValue('D1185', "(Laba)/Rugi Impairment Aktiva Tetap");
        $sheet->setCellValue('E1185', "8xx.xx.971");
        $sheet->setCellValue('D1186', "Donasi");
        $sheet->setCellValue('E1186', "8xx.xx.997");
        $sheet->setCellValue('D1187', "Laba/Rugi Penyertaan Investasi di Anak Perusahaan");
        $sheet->setCellValue('E1187', "8xx.xx.998");
        $sheet->setCellValue('D1188', "Lain Lain");
        $sheet->setCellValue('E1188', "8xx.xx.999");
        $sheet->setCellValue('C1189', "TOTAL PENDAPATAN DILUAR USAHA");
        $sheet->getStyle('C1189')->getFont()->setBold(true);
        $sheet->mergeCells('C1189:D1189');
        $sheet->getStyle('B1189:I1189')->applyFromArray($biru);
        $sheet->setCellValue('A1191', "K");
        $sheet->getStyle('A1191')->getFont()->setBold(true);
        $sheet->setCellValue('C1191', "BIAYA DILUAR USAHA");
        $sheet->getStyle('C1191')->getFont()->setBold(true);
        $sheet->setCellValue('D1192', "Kartu Kredit");
        $sheet->setCellValue('E1192', "8xx.xx.823");
        $sheet->setCellValue('D1193', "Biaya Bank");
        $sheet->setCellValue('E1193', "8xx.xx.824");
        $sheet->setCellValue('D1194', "Pajak Bunga deposito");
        $sheet->setCellValue('E1194', "8xx.xx.825");
        $sheet->setCellValue('D1195', "Pajak Jasa giro");
        $sheet->setCellValue('E1195', "8xx.xx.826");
        $sheet->setCellValue('D1196', "Biaya Pajak");
        $sheet->setCellValue('E1196', "8xx.xx.835");
        $sheet->setCellValue('D1197', "Pajak Tangguhan");
        $sheet->setCellValue('E1197', "xxx.xx.836");
        $sheet->setCellValue('D1198', "Denda Pajak");
        $sheet->setCellValue('E1198', "8xx.xx.837");
        $sheet->setCellValue('D1199', "Bunga Pinjaman Dari Long Term Loan (LTL)");
        $sheet->setCellValue('E1199', "8xx.xx.827");
        $sheet->setCellValue('D1200', "Bunga Dari Aset Leasing");
        $sheet->setCellValue('E1200', "8xx.xx.858");
        $sheet->setCellValue('D1201', "Bunga Dari Short Term Loan (STL)");
        $sheet->setCellValue('E1201', "8xx.xx.859");
        $sheet->setCellValue('D1202', "Bunga Obligasi (Bonds)");
        $sheet->setCellValue('E1202', "8xx.xx.860");
        $sheet->setCellValue('D1203', "Bunga Obligasi Konversi (Convertible Bonds)");
        $sheet->setCellValue('E1203', "8xx.xx.861");
        $sheet->setCellValue('C1204', "TOTAL BIAYA DILUAR USAHA");
        $sheet->getStyle('C1204')->getFont()->setBold(true);
        $sheet->mergeCells('C1204:D1204');
        $sheet->getStyle('B1204:I1204')->applyFromArray($biru);

        $sheet->setCellValue('A1206', "L");
        $sheet->getStyle('A1206')->getFont()->setBold(true);
        $sheet->setCellValue('C1206', "(LABA) / RUGI SEBELUM PAJAK");
        $sheet->getStyle('C1206')->getFont()->setBold(true);
        $sheet->mergeCells('C1206:D1206');
        $sheet->getStyle('B1206:I1206')->applyFromArray($biru);
        $sheet->setCellValue('A1208', "M");
        $sheet->getStyle('A1208')->getFont()->setBold(true);
        $sheet->setCellValue('C1208', "PAJAK");
        $sheet->getStyle('C1208')->getFont()->setBold(true);
        $sheet->setCellValue('D1209', "Pajak Kini");
        $sheet->setCellValue('E1209', "8xx.xx.890");
        $sheet->setCellValue('D1210', "(Lebih)/ Kurang pengakuan pajak tahun sebelumnya");
        $sheet->setCellValue('E1210', "8xx.xx.891");
        $sheet->setCellValue('D1211', "Beban Pajak Tangguhan");
        $sheet->setCellValue('E1211', "8xx.xx.836");
        $sheet->setCellValue('D1212', "Manfaat Pajak Tangguhan");
        $sheet->setCellValue('E1212', "8xx.xx.860");
        $sheet->setCellValue('C1213', "TOTAL PAJAK");
        $sheet->getStyle('C1213')->getFont()->setBold(true);
        $sheet->mergeCells('C1213:D1213');
        $sheet->getStyle('B1213:I1213')->applyFromArray($biru);
        $sheet->setCellValue('A1215', "(LABA) / RUGI SETELAH PAJAK");
        $sheet->getStyle('A1215:I1215')->applyFromArray($merah);
        $sheet->mergeCells('A1215:D1215');
        $sheet->setCellValue('A1216', "KONTROL LABA");
        $sheet->getStyle('A1216:I1216')->applyFromArray($merah);
        $sheet->mergeCells('A1216:D1216');



        ///////////////////SET VALUE FROM DATABASE///////////////////////////////////////////////

        $page_data = $this->M_Laporan_Jurnal->trial_balance($mulai, $akhir);
        $page_data1 = $this->M_Laporan_Jurnal->pendapatan_layanan($mulai, $akhir);
        $page_data2 = $this->M_Laporan_Jurnal->pendapatan_jenis($mulai, $akhir);
        $gabungan_data = array_merge($page_data, $page_data1, $page_data2);
        // print_arr($gabungan_data);


        $page_data3 = $this->M_Laporan_Jurnal->pendapatan_kelompok_net($mulai, $akhir);
        $page_data4 = $this->M_Laporan_Jurnal->pendapatan_kelompok($mulai, $akhir);
        $page_data5 = $this->M_Laporan_Jurnal->reduksi($mulai, $akhir);
        $gabungan_pendapatan = array_merge($page_data4, $page_data5);

        $highestRow = $sheet->getHighestRow();
        for ($row = 8; $row <= $highestRow; $row++) {
            $rekening = $sheet->getCell('E' . $row)->getValue();
            $keterangan = $sheet->getCell('D' . $row)->getValue();

            if ($rekening == '' && !($row >= 705 && $row <= 722) && !($row >= 726 && $row <= 742)) {
                $sheet->setCellValue('F' . $row, '');
                $sheet->setCellValue('G' . $row, '');
                $sheet->setCellValue('H' . $row, '');
                $sheet->setCellValue('I' . $row, '');
            } else {

                $filtered_list = array_filter($gabungan_data, function ($data_jurnal) use ($rekening) {
                    return $data_jurnal['rekening'] == $rekening;
                });
                $filtered_data = reset($filtered_list);

                if (!empty($filtered_data)) {
                    $data = $filtered_data;
                    $sheet->setCellValue('F' . $row, ($data['saldo_awal']));
                    $sheet->setCellValue('G' . $row, ($data['debet']));
                    $sheet->setCellValue('H' . $row, ($data['kredit']));
                    $sheet->setCellValue('I' . $row, ($data['saldo_akhir']));
                } else {

                    $data = null;
                    $sheet->setCellValue('F' . $row, 0);
                    $sheet->setCellValue('G' . $row, 0);
                    $sheet->setCellValue('H' . $row, 0);
                    $sheet->setCellValue('I' . $row, 0);
                }
                if ($row >= 705 && $row <= 722) {
                    $list1 = array_filter($gabungan_pendapatan, function ($data_jurnal1) use ($keterangan) {
                        return $data_jurnal1['kelompok_LAI'] == $keterangan;
                    });
                    $filtered_data_1 = reset($list1);
                    if (!empty($filtered_data_1)) {
                        $data1 = $filtered_data_1;
                        $sheet->setCellValue('F' . $row, ($data1['saldo_awal']));
                        $sheet->setCellValue('G' . $row, ($data1['debet']));
                        $sheet->setCellValue('H' . $row, ($data1['kredit']));
                        $sheet->setCellValue('I' . $row, ($data1['saldo_akhir']));
                    }
                }
                if ($row >= 726 && $row <= 739) {
                    $list2 = array_filter($page_data3, function ($data_jurnal2) use ($keterangan) {
                        return $data_jurnal2['kelompok_LAI'] == $keterangan;
                    });
                    $filtered_data_2 = reset($list2);
                    if (!empty($filtered_data_2)) {
                        $data2 = $filtered_data_2;
                        $sheet->setCellValue('F' . $row, ($data2['saldo_awal']));
                        $sheet->setCellValue('G' . $row, ($data2['debet']));
                        $sheet->setCellValue('H' . $row, ($data2['kredit']));
                        $sheet->setCellValue('I' . $row, ($data2['saldo_akhir']));
                    }
                }
            }
        }


        $startColumn = 'F';
        $endColumn = 'I';

        $columnCount = PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($endColumn) - PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + 1;

        $this->generateFormulaSum($sheet, '8', '13', '14');
        $this->generateFormulaSum($sheet, '17', '157', '158');
        $this->generateFormulaSum($sheet, '161', '182', '183');
        $this->generateFormulaSum($sheet, '186', '188', '189');

        // Iterate through each column
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "14+" . $column . "158+" . $column . "183+" . $column . "189)";
            $sheet->setCellValue($column . '190', $formula);
        }

        $this->generateFormulaSum($sheet, '192', '194', '195');

        // Iterate through each column
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "195+" . $column . "190)";
            $sheet->setCellValue($column . '197', $formula);
        }

        $this->generateFormulaSum($sheet, '200', '204', '205');
        $this->generateFormulaSum($sheet, '210', '215', '216');
        $this->generateFormulaSum($sheet, '218', '226', '227');
        $this->generateFormulaSum($sheet, '218', '226', '227');
        $this->generateFormulaSum($sheet, '229', '231', '232');


        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "216+" . $column . "227+" . $column . "232)";
            $sheet->setCellValue($column . '233', $formula);
        }

        $this->generateFormulaSum($sheet, '236', '245', '246');
        $this->generateFormulaSum($sheet, '250', '252', '253');
        $this->generateFormulaSum($sheet, '255', '259', '260');
        $this->generateFormulaSum($sheet, '262', '263', '264');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "253+" . $column . "260+" . $column . "264)";
            $sheet->setCellValue($column . '265', $formula);
        }

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "233+" . $column . "246+" . $column . "265)";
            $sheet->setCellValue($column . '267', $formula);
        }


        $this->generateFormulaSum($sheet, '270', '272', '273');
        $this->generateFormulaSum($sheet, '277', '279', '280');
        $this->generateFormulaSum($sheet, '283', '285', '286');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "286+" . $column . "280)";
            $sheet->setCellValue($column . '288', $formula);
        }

        $this->generateFormulaSum($sheet, '292', '294', '295');
        $this->generateFormulaSum($sheet, '298', '301', '302');
        $this->generateFormulaSum($sheet, '305', '310', '311');


        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "295+" . $column . "302+" . $column . "311)";
            $sheet->setCellValue($column . '313', $formula);
        }

        $this->generateFormulaSum($sheet, '316', '323', '324');
        $this->generateFormulaSum($sheet, '327', '334', '335');
        $this->generateFormulaSum($sheet, '338', '346', '347');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "190+" . $column . "205+" . $column . "267+" . $column . "273+" . $column . "280+" . $column . "286+" . $column . "313+" . $column . "324+" . $column . "335+" . $column . "347)";
            $sheet->setCellValue($column . '349', $formula);
        }

        $this->generateFormulaSum($sheet, '353', '354', '355');
        $this->generateFormulaSum($sheet, '358', '359', '360');
        $this->generateFormulaSum($sheet, '364', '365', '366');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "369)";
            $sheet->setCellValue($column . '370', $formula);
        }

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "366+" . $column . "370)";
            $sheet->setCellValue($column . '372', $formula);
        }

        $this->generateFormulaSum($sheet, '376', '386', '387');
        $this->generateFormulaSum($sheet, '390', '399', '400');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "387+" . $column . "400)";
            $sheet->setCellValue($column . '401', $formula);
        }

        $this->generateFormulaSum($sheet, '404', '414', '415');
        $this->generateFormulaSum($sheet, '418', '428', '429');


        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "415+" . $column . "429)";
            $sheet->setCellValue($column . '430', $formula);
        }

        $this->generateFormulaSum($sheet, '433', '442', '443');
        $this->generateFormulaSum($sheet, '446', '456', '457');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "401+" . $column . "430+" . $column . "443+" . $column . "457)";
            $sheet->setCellValue($column . '459', $formula);
        }

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "462)";
            $sheet->setCellValue($column . '463', $formula);
        }

        $this->generateFormulaSum($sheet, '466', '472', '473');
        $this->generateFormulaSum($sheet, '476', '480', '481');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "484)";
            $sheet->setCellValue($column . '485', $formula);
        }

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "355+" . $column . "360+" . $column . "372+" . $column . "459+" . $column . "463+" . $column . "473+" . $column . "481+" . $column . "485)";
            $sheet->setCellValue($column . '487', $formula);
        }

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "349+" . $column . "487)";
            $sheet->setCellValue($column . '488', $formula);
        }

        $this->generateFormulaSum($sheet, '492', '497', '498');
        $this->generateFormulaSum($sheet, '502', '512', '513');
        $this->generateFormulaSum($sheet, '516', '518', '519');
        $this->generateFormulaSum($sheet, '522', '524', '525');
        $this->generateFormulaSum($sheet, '528', '529', '530');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "513+" . $column . "519+" . $column . "525+" . $column . "530)";
            $sheet->setCellValue($column . '532', $formula);
        }
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "536)";
            $sheet->setCellValue($column . '537', $formula);
        }

        $this->generateFormulaSum($sheet, '540', '544', '545');
        $this->generateFormulaSum($sheet, '548', '554', '555');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "537+" . $column . "545+" . $column . "555)";
            $sheet->setCellValue($column . '557', $formula);
        }

        $this->generateFormulaSum($sheet, '560', '570', '571');
        $this->generateFormulaSum($sheet, '574', '578', '579');
        $this->generateFormulaSum($sheet, '581', '583', '584');
        $this->generateFormulaSum($sheet, '588', '594', '595');
        $this->generateFormulaSum($sheet, '598', '600', '601');
        $this->generateFormulaSum($sheet, '604', '604', '605');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "595+" . $column . "601+" . $column . "605)";
            $sheet->setCellValue($column . '607', $formula);
        }
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "498+" . $column . "532+" . $column . "557+" . $column . "571+" . $column . "579+" . $column . "607+" . $column . "584)";
            $sheet->setCellValue($column . '609', $formula);
        }

        $this->generateFormulaSum($sheet, '614', '619', '620');
        $this->generateFormulaSum($sheet, '623', '626', '627');
        $this->generateFormulaSum($sheet, '629', '629', '631');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "620+" . $column . "627+" . $column . "631)";
            $sheet->setCellValue($column . '632', $formula);
        }

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "635)";
            $sheet->setCellValue($column . '636', $formula);
        }

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "639)";
            $sheet->setCellValue($column . '640', $formula);
        }

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "632+" . $column . "636+" . $column . "640)";
            $sheet->setCellValue($column . '642', $formula);
        }
        $this->generateFormulaSum($sheet, '644', '680', '681');
        $this->generateFormulaSum($sheet, '684', '697', '698');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "609+" . $column . "642+" . $column . "681+" . $column . "698)";
            $sheet->setCellValue($column . '700', $formula);
        }
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "488+" . $column . "700)";
            $sheet->setCellValue($column . '701', $formula);
        }
       
        //////////////////////////////////////////////////////////////////////////
        $this->generateFormulaSum($sheet, '705', '722', '723');
        $this->generateFormulaSum($sheet, '726', '742', '743');
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "723-" . $column . "743)";
            $sheet->setCellValue($column . '744', $formula);
        }
        $this->generateFormulaSum($sheet, '747', '763', '764');
        $this->generateFormulaSum($sheet, '768', '772', '773');
        $this->generateFormulaSum($sheet, '776', '797', '798');
        $this->generateFormulaSum($sheet, '801', '806', '807');
        $this->generateFormulaSum($sheet, '810', '811', '812');
        $this->generateFormulaSum($sheet, '815', '821', '822');
        $this->generateFormulaSum($sheet, '825', '828', '829');
        $this->generateFormulaSum($sheet, '832', '864', '865');
        $this->generateFormulaSum($sheet, '868', '881', '882');
        $this->generateFormulaSum($sheet, '885', '900', '901');
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "773+" . $column . "798+". $column . "807+". $column . "812+". $column . "822+". $column . "829+". $column . "865+". $column . "882+". $column . "901)";
            $sheet->setCellValue($column . '903', $formula);
        }
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "764-" . $column . "903)";
            $sheet->setCellValue($column . '904', $formula);
        }
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "903-" . $column . "743)";
            $sheet->setCellValue($column . '905', $formula);
        }
        $this->generateFormulaSum($sheet, '909', '920', '921');
        $this->generateFormulaSum($sheet, '925', '958', '959');
        $this->generateFormulaSum($sheet, '962', '969', '970');
        $this->generateFormulaSum($sheet, '973', '989', '990');
        $this->generateFormulaSum($sheet, '993', '1014', '1015');
        $this->generateFormulaSum($sheet, '1018', '1019', '1020');
        $this->generateFormulaSum($sheet, '1023', '1035', '1036');
        $this->generateFormulaSum($sheet, '1039', '1063', '1064');
        $this->generateFormulaSum($sheet, '1067', '1076', '1077');
        $this->generateFormulaSum($sheet, '1080', '1104', '1105');
        $this->generateFormulaSum($sheet, '1108', '1111', '1112');
        $this->generateFormulaSum($sheet, '1115', '1156', '1157');
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "959+" . $column . "970+". $column . "990+". $column . "1015+". $column . "1020+". $column . "1036+". $column . "1064+". $column . "1077+" . $column . "1105+". $column . "1112+". $column . "1157)";
            $sheet->setCellValue($column . '1159', $formula);
        }
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "921-" . $column . "1159)";
            $sheet->setCellValue($column . '1160', $formula);
        }
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "903+" . $column . "1159)";
            $sheet->setCellValue($column . '1162', $formula);
        }
        $this->generateFormulaSum($sheet, '1165', '1188', '1189');
        $this->generateFormulaSum($sheet, '1192', '1203', '1204');

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "1162+". $column . "1189+" . $column . "1204)";
            $sheet->setCellValue($column . '1206', $formula);
        }
        $this->generateFormulaSum($sheet, '1209', '1212', '1213');
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "1206+" . $column . "1213)";
            $sheet->setCellValue($column . '1215', $formula);
        }
        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=(" . $column . "652-" . $column . "1215)";
            $sheet->setCellValue($column . '1216', $formula);
        }

        $spreadsheet->getActiveSheet()->getStyle('F8:I1216')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_ACCOUNTING);

        /////////////////////////////////////////////////////////////////////////////////////////
        // Set width kolom
        $sheet->getDefaultColumnDimension()->setWidth(-1); // Set width kolom A
        // $sheet->getColumnDimension('B')->setWidth(15); // Set width kolom B
        // $sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
        // $sheet->getColumnDimension('D')->setWidth(20); // Set width kolom D
        // $sheet->getColumnDimension('E')->setWidth(30); // Set width kolom E
        $sheet->getStyle('A1:I1216')->applyFromArray(['borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, // Ganti dengan jenis border yang diinginkan
                'color' => ['argb' => '000000'] // Ganti dengan warna border yang diinginkan
            ],
        ],]);


        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Trial Balance");

        // Membuat sheet kedua
        $spreadsheet->createSheet();
        $this->export_neraca($spreadsheet, $akhir);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Trial Balance.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function export_neraca($spreadsheet, $akhir)
    {

        // $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->setActiveSheetIndex(1);
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel

        $sheet->setCellValue('A1', "PT BAKTI TIMAH MEDIKA");
        $sheet->setCellValue('A2', "Laporan Posisi Keuangan(Neraca)");
        $sheet->setCellValue('A3', "Rp 000,000");

        $sheet->getStyle('A1:A2')->getFont()->setBold(true);
        $sheet->setCellValue('A4', "Uraian");
        $sheet->mergeCells('A4:C6');
        $sheet->getStyle('A4')->getFont()->setBold(true);
        $text = "Audited " . (date('Y', strtotime($akhir)) - 1);
        $sheet->setCellValue('D4', $text); //tahun saldo tahun sebelumnya
        $sheet->mergeCells('D4:D6');
        $sheet->getStyle('D4')->getFont()->setBold(true);
        $text2 = "s.d " . bulan(date('m', strtotime($akhir . '-01'))) . " " . date('Y', strtotime($akhir . '-01'));
        $sheet->setCellValue('E4', $text2); //tahun dan bulan yang ditarik data nya
        $sheet->mergeCells('E4:E6');
        $sheet->getStyle('E4')->getFont()->setBold(true);

        $sheet->setCellValue('A7', "Aset");
        $sheet->setCellValue('A8', "Aset Lancar");
        $sheet->setCellValue('B9', "Kas & Setara Kas");
        $sheet->setCellValue('B10', "Aset Keuangan tersedia untuk dijual");
        $sheet->setCellValue('B11', "Piutang Usaha");
        $sheet->setCellValue('B12', "Pendapatan yang masih harus diterima");
        $sheet->setCellValue('B13', "Piutang Lain-lain");
        $sheet->setCellValue('B14', "Persediaan");
        $sheet->setCellValue('B15', "Uang Muka & Beban dibayar dimuka");
        $sheet->setCellValue('B16', "Pajak dibayar dimuka");
        $sheet->setCellValue('A17', "Total Aset Lancar");
        $sheet->getStyle('A17')->getFont()->setBold(true);
        $sheet->setCellValue('A18', "Aset Tidak Lancar");
        $sheet->setCellValue('B19', "Investasi pada entitas asosiasi");
        $sheet->setCellValue('B20', "Piutang Lain-lain");
        $sheet->setCellValue('B21', "Properti Investasi");
        $sheet->setCellValue('B22', "Aset Tetap");
        $sheet->setCellValue('B23', "Aset Tetap dalam Penyelesaian");
        $sheet->setCellValue('B24', "Aset Pajak Tangguhan");
        $sheet->setCellValue('B25', "Aset yang dibatasi penggunaannya");
        $sheet->setCellValue('B26', "Aset tidak lancar lainnya");
        $sheet->setCellValue('B27', "Taksiran tagihan pajak penghasilan");
        $sheet->setCellValue('A28', "Total Aset Tidak Lancar");
        $sheet->getStyle('A28')->getFont()->setBold(true);
        $sheet->setCellValue('A29', "Total Aset");
        $sheet->getStyle('A29')->getFont()->setBold(true);
        $sheet->setCellValue('A30', "Liabilitas & Ekuitas");
        $sheet->setCellValue('A31', "Liabilitas Jangka Pendek");
        $sheet->setCellValue('B32', "Utang Pinjaman Jangka Pendek");
        $sheet->setCellValue('B33', "Utang Usaha");
        $sheet->setCellValue('B34', "Utang Usaha");
        $sheet->setCellValue('B35', "Utang Usaha");
        $sheet->setCellValue('C36', "PPh Badan");
        $sheet->setCellValue('C37', "PPh lainnya");
        $sheet->setCellValue('B38', "Beban yang masih harus dibayar");
        $sheet->setCellValue('B39', "Pend. diterima dimuka & deposit pasien");
        $sheet->setCellValue('B40', "Liabilitas jangka panjang yg jatuh tempo");
        $sheet->setCellValue('C41', "Non Bank");
        $sheet->setCellValue('C42', "Bank");
        $sheet->setCellValue('C43', "Sewa Pembiayaan");
        $sheet->setCellValue('C44', "Imbalan Paska Kerja");
        $sheet->setCellValue('C45', "Lainnya");
        $sheet->setCellValue('A46', "Total Liabilitas Jangka Pendek");
        $sheet->getStyle('A46')->getFont()->setBold(true);
        $sheet->setCellValue('A47', "Liabilitas Jangka Panjang");
        $sheet->setCellValue('B48', "Liabilitas jk panjang yg belum jatuh tempo");
        $sheet->setCellValue('C49', "Non Bank");
        $sheet->setCellValue('C50', "Bank");
        $sheet->setCellValue('C51', "Sewa Pembiayaan");
        $sheet->setCellValue('C52', "Lainnya");
        $sheet->setCellValue('B53', "Imbalan Paska Kerja");
        $sheet->setCellValue('A54', "Total Liabilitas Jangka Panjang");
        $sheet->getStyle('A54')->getFont()->setBold(true);
        $sheet->setCellValue('A55', "Total Liabilitas");
        $sheet->getStyle('A55')->getFont()->setBold(true);
        $sheet->setCellValue('A56', "Ekuitas");
        $sheet->setCellValue('B57', "Modal Saham ");
        $sheet->setCellValue('B58', "Modal Donasi ");
        $sheet->setCellValue('B59', "Cadangan Umum ");
        $sheet->setCellValue('B60', "Cadangan Khusus ");
        $sheet->setCellValue('B61', "Tambahan Modal Disetor ");
        $sheet->setCellValue('B62', "OCI");
        $sheet->setCellValue('B63', "NCI");
        $sheet->setCellValue('B64', "Laba Ditahan");
        $sheet->setCellValue('B65', "Laba Tahun Berjalan");
        $sheet->setCellValue('A66', "Total Ekuitas");
        $sheet->setCellValue('A67', "R/K Antar Unit Usaha");
        $sheet->setCellValue('A68', "Total Liabilitas & Ekuitas");
        $sheet->getStyle('A68')->getFont()->setBold(true);
        $sheet->setCellValue('A69', "Kontrol Balance");

        $styleArray = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ];
        $styleArray_top = [
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ];
        $sheet->getStyle('A4:E68')->applyFromArray($styleArray);
        $sheet->getStyle('E4:E68')->applyFromArray($styleArray);
        $sheet->getStyle('D4:D68')->applyFromArray($styleArray);
        $sheet->getStyle('A4:E6')->applyFromArray($styleArray);
        $sheet->getStyle('A17:E17')->applyFromArray($styleArray);
        $sheet->getStyle('A28:E28')->applyFromArray($styleArray);
        $sheet->getStyle('A29:E29')->applyFromArray($styleArray);
        $sheet->getStyle('A46:E46')->applyFromArray($styleArray);
        $sheet->getStyle('A54:E54')->applyFromArray($styleArray);
        $sheet->getStyle('A55:E55')->applyFromArray($styleArray);
        $sheet->getStyle('D66:E66')->applyFromArray($styleArray_top);
        $sheet->getStyle('A68:E68')->applyFromArray($styleArray);

        $sheet->getColumnDimension('A')->setWidth(3);
        $sheet->getColumnDimension('B')->setWidth(3);
        $sheet->getColumnDimension('C')->setWidth(36);
        $sheet->getColumnDimension('D')->setWidth(13);
        $sheet->getColumnDimension('E')->setWidth(13);
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        ////////////SET NILAI UNTUK EXCEL SHEET 2///////////////////////////////////////////////////////////////////////////////////////////


        // Ambil nilai dari sel A1 pada sheet "Sheet2"
        // $cellValue = $sheet1->getCell('A1')->getValue();
        $sheet->setCellValue('D9', "='Trial Balance'!F197/1000000");
        $sheet->setCellValue('E9', "='Trial Balance'!I197/1000000");
        $sheet->setCellValue('D10', "='Trial Balance'!F205/1000000");
        $sheet->setCellValue('E10', "='Trial Balance'!I205/1000000");
        $sheet->setCellValue('D11', "='Trial Balance'!F267/1000000");
        $sheet->setCellValue('E11', "='Trial Balance'!I267/1000000");
        $sheet->setCellValue('D12', "='Trial Balance'!F273/1000000");
        $sheet->setCellValue('E12', "='Trial Balance'!I273/1000000");
        $sheet->setCellValue('D13', "='Trial Balance'!F288/1000000");
        $sheet->setCellValue('E13', "='Trial Balance'!I288/1000000");
        $sheet->setCellValue('D14', "='Trial Balance'!F313/1000000");
        $sheet->setCellValue('E14', "='Trial Balance'!I313/1000000");
        $sheet->setCellValue('D15', "=('Trial Balance'!F324+'Trial Balance'!F335)/1000000");
        $sheet->setCellValue('E15', "=('Trial Balance'!I324+'Trial Balance'!I335)/1000000");
        $sheet->setCellValue('D16', "='Trial Balance'!F347/1000000");
        $sheet->setCellValue('E16', "='Trial Balance'!I347/1000000");

        $this-> generateFormula($sheet, 'D' ,'E', '9', '16', '17');

        $sheet->setCellValue('D19', "='Trial Balance'!F355/1000000");
        $sheet->setCellValue('E19', "='Trial Balance'!I355/1000000");
        $sheet->setCellValue('D20', "='Trial Balance'!F360/1000000");
        $sheet->setCellValue('E20', "='Trial Balance'!I360/1000000");
        $sheet->setCellValue('D21', "='Trial Balance'!F372/1000000");
        $sheet->setCellValue('E21', "='Trial Balance'!I372/1000000");
        $sheet->setCellValue('D22', "=('Trial Balance'!F401+'Trial Balance'!F430)/1000000");
        $sheet->setCellValue('E22', "=('Trial Balance'!I401+'Trial Balance'!I430)/1000000");
        $sheet->setCellValue('D23', "='Trial Balance'!F443/1000000");
        $sheet->setCellValue('E23', "='Trial Balance'!I443/1000000");
        $sheet->setCellValue('D24', "='Trial Balance'!F463/1000000");
        $sheet->setCellValue('E24', "='Trial Balance'!I463/1000000");
        $sheet->setCellValue('D25', "='Trial Balance'!F473/1000000");
        $sheet->setCellValue('E25', "='Trial Balance'!I473/1000000");
        $sheet->setCellValue('D26', "='Trial Balance'!F481/1000000");
        $sheet->setCellValue('E26', "='Trial Balance'!I481/1000000");
        $sheet->setCellValue('D27', "='Trial Balance'!F485/1000000");
        $sheet->setCellValue('E27', "='Trial Balance'!I485/1000000");

        $this-> generateFormula($sheet, 'D' ,'E', '19', '27', '28');

        $sheet->setCellValue('D29', "=D17+D28");
        $sheet->setCellValue('E29', "=E17+E28");
        $sheet->setCellValue('D32', 0);
        $sheet->setCellValue('E32', 0);

        $sheet->setCellValue('D33', "=-('Trial Balance'!F498)/1000000");
        $sheet->setCellValue('E33', "=-('Trial Balance'!I498)/1000000");
        $sheet->setCellValue('D34', "=-('Trial Balance'!F532)/1000000");
        $sheet->setCellValue('E34', "=-('Trial Balance'!I532)/1000000");
        $sheet->setCellValue('D36', "=-('Trial Balance'!F537)/1000000");
        $sheet->setCellValue('E36', "=-('Trial Balance'!I537)/1000000");
        $sheet->setCellValue('D37', "=-('Trial Balance'!F557)/1000000-'Neraca'!F36");
        $sheet->setCellValue('E37', "=-('Trial Balance'!I557)/1000000-'Neraca'!I36");
        $sheet->setCellValue('D38', "=-('Trial Balance'!F571)/1000000");
        $sheet->setCellValue('E38', "=-('Trial Balance'!I571)/1000000");
        $sheet->setCellValue('D39', "=-('Trial Balance'!F579)/1000000");
        $sheet->setCellValue('E39', "=-('Trial Balance'!I579)/1000000");
        $sheet->setCellValue('D41', "=-('Trial Balance'!F589+'Trial Balance'!F590)/1000000");
        $sheet->setCellValue('E41', "=-('Trial Balance'!I589+'Trial Balance'!I590)/1000000");
        $sheet->setCellValue('D42', "=-('Trial Balance'!F591+'Trial Balance'!F592)/1000000");
        $sheet->setCellValue('E42', "=-('Trial Balance'!I591+'Trial Balance'!I592)/1000000");
        $sheet->setCellValue('D43', "=-('Trial Balance'!F593)/1000000");
        $sheet->setCellValue('E43', "=-('Trial Balance'!I593)/1000000");
        $sheet->setCellValue('D44', "=-('Trial Balance'!F601)/1000000");
        $sheet->setCellValue('E44', "=-('Trial Balance'!I601)/1000000");
        $sheet->setCellValue('D45', 0);
        $sheet->setCellValue('E45', 0);
        $this-> generateFormula($sheet, 'D' ,'E', '32', '45', '46');
        $sheet->setCellValue('D49', "=-('Trial Balance'!F614+'Trial Balance'!F615)/1000000");
        $sheet->setCellValue('E49', "=-('Trial Balance'!I614+'Trial Balance'!I615)/1000000");
        $sheet->setCellValue('D50', "=-('Trial Balance'!F616+'Trial Balance'!F617)/1000000");
        $sheet->setCellValue('E50', "=-('Trial Balance'!I616+'Trial Balance'!I617)/1000000");
        $sheet->setCellValue('D51', "=-('Trial Balance'!F618)/1000000");
        $sheet->setCellValue('E51', "=-('Trial Balance'!I618)/1000000");
        $sheet->setCellValue('D52', 0);
        $sheet->setCellValue('E52', 0);
        $sheet->setCellValue('D53', "=-('Trial Balance'!F627)/1000000");
        $sheet->setCellValue('E53', "=-('Trial Balance'!I627)/1000000");
        $this-> generateFormula($sheet, 'D' ,'E', '49', '53', '54');
        $sheet->setCellValue('D55', "=D46+D54");
        $sheet->setCellValue('E55', "=E46+E54");
        $sheet->setCellValue('D57', "=-('Trial Balance'!F644)/1000000");
        $sheet->setCellValue('E57', "=-('Trial Balance'!I644)/1000000");
        $sheet->setCellValue('D58', "=-('Trial Balance'!F646)/1000000");
        $sheet->setCellValue('E58', "=-('Trial Balance'!I646)/1000000");
        $sheet->setCellValue('D59', "=-('Trial Balance'!F647)/1000000");
        $sheet->setCellValue('E59', "=-('Trial Balance'!I647)/1000000");
        $sheet->setCellValue('D60', "=-('Trial Balance'!F648)/1000000");
        $sheet->setCellValue('E60', "=-('Trial Balance'!I648)/1000000");
        $sheet->setCellValue('D61', "=-('Trial Balance'!F650)/1000000");
        $sheet->setCellValue('E61', "=-('Trial Balance'!I650)/1000000");
        $sheet->setCellValue('D62', "=-SUM('Trial Balance'!F664:F669)/1000000");
        $sheet->setCellValue('E62', "=-SUM('Trial Balance'!I664:I669)/1000000");
        $sheet->setCellValue('D63', "=-('Trial Balance'!F671+'Trial Balance'!F674)/1000000");
        $sheet->setCellValue('E63', "=-('Trial Balance'!I671+'Trial Balance'!I674)/1000000");
        $sheet->setCellValue('D64', "=-('Trial Balance'!F654)/1000000");
        $sheet->setCellValue('E64', "=-('Trial Balance'!I654)/1000000");
        $sheet->setCellValue('D65', "=-('Trial Balance'!F652)/1000000");
        $sheet->setCellValue('E65', "=-('Trial Balance'!I652)/1000000");
        $this-> generateFormula($sheet, 'D' ,'E', '57', '65', '66');
        $sheet->setCellValue('D67', "=-('Trial Balance'!F698)/1000000");
        $sheet->setCellValue('E67', "=-('Trial Balance'!I698)/1000000");
        $sheet->setCellValue('D68', "=D55+D66+D67");
        $sheet->setCellValue('E68', "=E55+E66+E67");
        $sheet->setCellValue('D69', "=D29-D68");
        $sheet->setCellValue('E69', "=E29-E68");






        $spreadsheet->getActiveSheet(1)->getStyle('D9:E69')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

        //////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Neraca");
        // Proses file excel

    }

    function generateFormulaSum($sheet, $startRow, $endRow, $cellset)
    {
        $startColumn = 'F';
        $endColumn = 'I';

        $columnCount = PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($endColumn) - PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + 1;

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=SUM(" . $column . $startRow . ":" . $column . $endRow . ")";
            $sheet->setCellValue($column . $cellset, $formula);
        }
    }
    function generateFormula($sheet, $startColumn ,$endColumn, $startRow, $endRow, $cellset)
    {
       
        $columnCount = PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($endColumn) - PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + 1;

        for ($i = 0; $i < $columnCount; $i++) {
            $column = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startColumn) + $i);
            $formula = "=SUM(" . $column . $startRow . ":" . $column . $endRow . ")";
            $sheet->setCellValue($column . $cellset, $formula);
        }
    }

    public function kunci_saldo_bulan($bulan)
    {
        $vbulan = date("m", strtotime($bulan)); //format bulan 
        $vtahun = date('Y', strtotime($bulan)); //format tahun 

        $page_data = $this->M_Laporan_Jurnal->trial_balance_bulan($bulan);

        $check = $this->db->get_where('trial_balance', ['bulan' => $vbulan, 'tahun' => $vtahun])->result();
        if (count($check) < 0) {
            foreach ($page_data as $row) {
                $data = [
                    'rekening' => $row['rekening'],
                    'saldo_awal' => $row['saldo_awal'],
                    'debet' => $row['debet'],
                    'kredit' => $row['kredit'],
                    'saldo_akhir' => $row['saldo_akhir'],
                    'bulan' => $vbulan,
                    'tahun' => $vtahun,
                ];
                $this->M_Laporan_Jurnal->insert($data, 'trial_balance');
            }
        } else {
            $this->M_Laporan_Jurnal->delete(['bulan' => $vbulan, 'tahun' => $vtahun], 'trial_balance');
            foreach ($page_data as $row) {
                $data = [
                    'rekening' => $row['rekening'],
                    'saldo_awal' => $row['saldo_awal'],
                    'debet' => $row['debet'],
                    'kredit' => $row['kredit'],
                    'saldo_akhir' => $row['saldo_akhir'],
                    'bulan' => $vbulan,
                    'tahun' => $vtahun,
                ];
                $this->M_Laporan_Jurnal->insert($data, 'trial_balance');
            }
        }
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
