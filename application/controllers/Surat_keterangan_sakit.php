<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );


// require 'application/third_party/dompdf/autoload.inc.php';

// use Dompdf\Dompdf;
require_once APPPATH . 'libraries/dompdf-master/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

class Surat_keterangan_sakit extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set( 'Asia/Jakarta' );
		$this->load->model('M_mcu');
        $this->load->library('email');
        $this->load->helper(['url', 'form']);
        // $this->load->library('dompdf_gen');


    }

    public function cetak_surat_sakit()
    {
 
        // Ambil input dari form
        $inTanggalAwal = $this->input->post('surat_inTanggalAwal');
        $noRM = $this->input->post('surat_no_rm');
        $inTanggalAkhir = $this->input->post('surat_inTanggalAkhir');
        $id_dokter = $this->input->post('surat_dokter_id');
        $instansi = $this->input->post('surat_instansi');
        $id_mcu = $this->input->post('surat_id_mcu');

        // Ambil data pasien
        $this->db->where('no_rm', $noRM);
        $query = $this->db->get('pasien');
        $result = $query->row(); 

        // Ambil data dokter
        $dokter = $this->M_mcu->selectNamaDokterById($id_dokter);

        // Data yang akan disimpan ke database
        $dataInsert = [
            'id_dokter' => $id_dokter,
            'tanggal_awal_istirahat' => $inTanggalAwal,
            'tanggal_akhir_istirahat' => $inTanggalAkhir,
            'kepada_instansi' => $instansi,
            'id_mcu' => $id_mcu,
            'noRM' => $noRM
        ];

        // Simpan ke database
        $idSurat = $this->M_mcu->insertSurat($dataInsert);

        // Simpan data ke session sementara (flashdata)
        $this->session->set_flashdata('data_cetak', [
            'pasien' => $result,
            'tanggalAwalIstirahat' => $inTanggalAwal,
            'tanggalAkhirIstirahat' => $inTanggalAkhir,
            'instansi' => $instansi,
            'dokter' => $dokter
        ]);

        // Redirect ke halaman cetak (GET)
        redirect('Surat_keterangan_sakit/lihat_cetak_surat_sakit/' . $idSurat);
    }


    public function insert_data_kirim()
    {
        // Ambil input dari form
        $inTanggalAwal = $this->input->post('surat_inTanggalAwal');
        $noRM = $this->input->post('surat_no_rm');
        $inTanggalAkhir = $this->input->post('surat_inTanggalAkhir');
        $id_dokter = $this->input->post('surat_dokter_id');
        $instansi = $this->input->post('surat_instansi');
        $email = $this->input->post('surat_email');
        $id_mcu = $this->input->post('surat_id_mcu');

        // Ambil data pasien
        $this->db->where('no_rm', $noRM);
        $query = $this->db->get('pasien');
        $result = $query->row(); 

        // Ambil data dokter
        $dokter = $this->M_mcu->selectNamaDokterById($id_dokter);

        // Data yang akan disimpan ke database
        $dataInsert = [
            'id_dokter' => $id_dokter,
            'tanggal_awal_istirahat' => $inTanggalAwal,
            'tanggal_akhir_istirahat' => $inTanggalAkhir,
            'kepada_instansi' => $instansi,
            'id_mcu' => $id_mcu,
            'noRM' => $noRM
        ];

        // Simpan ke database
        $idSurat = $this->M_mcu->insertSurat($dataInsert);


        // Simpan data ke session sementara (flashdata)
        $this->session->set_flashdata('data_cetak', [
            'pasien' => $result,
            'tanggalAwalIstirahat' => $inTanggalAwal,
            'tanggalAkhirIstirahat' => $inTanggalAkhir,
            'instansi' => $instansi,
            'dokter' => $dokter
        ]);

        // Redirect ke halaman cetak (GET)
        redirect('Surat_keterangan_sakit/bikinPdfSuratSakit/' . $id_mcu . '/' . urlencode($email) . '/' .$idSurat);
    }

    public function lihat_cetak_surat_sakit( $id_surat)
    {
            $data = $this->M_mcu->selectDataSuratKeteranganSakitByIdSurat($id_surat);

            // Ambil data pasien
            $this->db->where('no_rm', $data->noRM);
            $query = $this->db->get('pasien');
            $result = $query->row(); 

            // Ambil data dokter
            $dokter = $this->M_mcu->selectNamaDokterById($data->id_dokter);

            $id_surat = $data->id_surat;
            $pasien = $result;
            $tanggalAwalIstirahat = $data->tanggal_awal_istirahat;
            $tanggalAkhirIstirahat = $data->tanggal_akhir_istirahat;
            $instansi = $data->kepada_instansi;
            $dokter = $dokter;

            $lahir = new DateTime($pasien->tgl_lahir);
            $sekarang = new DateTime();
            $umur = $lahir->diff($sekarang)->y;

            $awal = new DateTime($tanggalAwalIstirahat);
            $akhir = new DateTime($tanggalAkhirIstirahat);
            $berapaHariIstirahat = $awal->diff($akhir)->days;

            if($berapaHariIstirahat === 0){
                $berapaHariIstirahat = 1;
            }

            $angkaKeTeks = [
                1 => 'satu',
                2 => 'dua',
                3 => 'tiga',
                4 => 'empat',
                5 => 'lima',
                6 => 'enam',
                7 => 'tujuh',
                8 => 'delapan',
                9 => 'sembilan',
                10 => 'sepuluh',
                11 => 'sebelas',
                12 => 'dua belas',
                13 => 'tiga belas',
                14 => 'empat belas',
                15 => 'lima belas',
                16 => 'enam belas',
                17 => 'tujuh belas',
                18 => 'delapan belas',
                19 => 'sembilan belas',
                20 => 'dua puluh'
            ];

            $berapaHariIstirahatString = isset($angkaKeTeks[$berapaHariIstirahat])
                ? $angkaKeTeks[$berapaHariIstirahat]
                : $berapaHariIstirahat;

                $page_data = [
                    'id_surat' => $data->id_surat,
                    'pasien' => $result,
                    'tanggalAwalIstirahat' => $data->tanggal_awal_istirahat,
                    'tanggalAkhirIstirahat' => $data->tanggal_akhir_istirahat,
                    'instansi' => $data->kepada_instansi,
                    'dokter' => $dokter,
                    'umur' => $umur,
                    'berapaHariIstirahat' => $berapaHariIstirahat,
                    'berapaHariIstirahatString' => $berapaHariIstirahatString,
                ];

            
            $this->load->view('mcu_print/cetak_surat_keterangan_sakit', $page_data);
    }

    public function bikinPdfSuratSakit($id_mcu, $email , $id_surat)
    {
            $data = $this->M_mcu->selectDataSuratKeteranganSakitByIdSurat($id_surat);
            $email = urldecode($email);
            $isStartWithPL = false;

            if (substr($data->id_mcu, 0, 2) === 'pl') {
                $isStartWithPL = true;
            }

            $data_history = "";
            if ($isStartWithPL) {
                $query = $this->db->get_where('history_pelayanan_ugd', ['id_pelayanan' => $id_mcu]);
                $data_history = $query->row();   
              
            }

            $this->db->where('no_rm', $data->noRM);
            $query = $this->db->get('pasien');
            $result = $query->row(); 

            // Ambil data dokter
            $dokter = $this->M_mcu->selectNamaDokterById($data->id_dokter);

            $id_surat = $data->id_surat;
            $pasien = $result;
            $tanggalAwalIstirahat = $data->tanggal_awal_istirahat;
            $tanggalAkhirIstirahat = $data->tanggal_akhir_istirahat;
            $instansi = $data->kepada_instansi;
            $dokter = $dokter;

            $lahir = new DateTime($pasien->tgl_lahir);
            $sekarang = new DateTime();
            $umur = $lahir->diff($sekarang)->y;

            $awal = new DateTime($tanggalAwalIstirahat);
            $akhir = new DateTime($tanggalAkhirIstirahat);
            $berapaHariIstirahat = $awal->diff($akhir)->days;

            if($berapaHariIstirahat === 0){
                $berapaHariIstirahat = 1;
            }

            $angkaKeTeks = [
                1 => 'satu',
                2 => 'dua',
                3 => 'tiga',
                4 => 'empat',
                5 => 'lima',
                6 => 'enam',
                7 => 'tujuh',
                8 => 'delapan',
                9 => 'sembilan',
                10 => 'sepuluh',
                11 => 'sebelas',
                12 => 'dua belas',
                13 => 'tiga belas',
                14 => 'empat belas',
                15 => 'lima belas',
                16 => 'enam belas',
                17 => 'tujuh belas',
                18 => 'delapan belas',
                19 => 'sembilan belas',
                20 => 'dua puluh'
            ];

            $berapaHariIstirahatString = isset($angkaKeTeks[$berapaHariIstirahat])
                ? $angkaKeTeks[$berapaHariIstirahat]
                : $berapaHariIstirahat;

            

           $html = '
                    <!DOCTYPE html>
                    <html lang="id">
                    <head>
                        <meta charset="UTF-8">
                        <title>Surat Keterangan Sakit</title>
                        <style>
                            @page {
                                size: A4 landscape;
                                margin: 15mm 20mm 15mm 20mm;
                            }
                            body {
                                font-family: "Times New Roman", Times, serif;
                                margin: 0;
                                font-size: 13px;
                                line-height: 1.5;
                            }
                            .header {
                                display: flex;
                                align-items: center;
                                border-bottom: 2px solid #000;
                                padding-bottom: 8px;
                            }
                            .header img {
                                width: 200px;
                                margin-right: 15px;
                                transform: translateY(50px);
                            }
                            .header .info {
                                text-align: center;
                                flex: 1;
                                font-size: 13px;
                                line-height: 1.4;
                            }
                            .center {
                                text-align: center;
                                margin-top: 15px;
                            }
                            table {
                                width: 100%;
                                border-collapse: collapse;
                                margin-top: 10px;
                            }
                            td {
                                vertical-align: top;
                                padding: 3px 0;
                            }
                            .footer {
                                margin-top: 40px;
                                text-align: center;
                                width: 300px;
                                margin-left: auto;
                                font-size: 13px;
                            }
                            h3 {
                                margin: 0;
                                font-size: 16px;
                            }
                        </style>
                    </head>
                    <body>

                        <div class="header">
                            <img src="'.base_url('assets/dist/img/rsbt_ihc.png').'" alt="Logo RS Bakti Timah">
                            <div class="info">
                                <strong>RUMAH SAKIT BAKTI TIMAH</strong><br>
                                Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang<br>
                                Kabupaten Bangka, Prov. Kepulauan Bangka Belitung - Indonesia<br>
                                Telp. +62(717)421091, +62(717)433027, Fax. +62(717)424212
                            </div>
                        </div>

                        <div class="center">
                            <h3><u>SURAT KETERANGAN SAKIT</u></h3>
                            <b><p>RSBT-'.$id_surat.'</p></b>
                        </div>

                        <p>Yang bertanda tangan di bawah ini menerangkan bahwa:</p>

                        <table>
                            <tr>
                                <td style="width: 180px;">Nama Pasien</td>
                                <td>: '.$pasien->nama.'</td>
                            </tr>
                            <tr>
                                <td>Umur</td>
                                <td>: '.$umur.' Th</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>: '.$pasien->jenis_kelamin.'</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan / Instansi</td>
                                <td>: '.$instansi.'</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: '.$pasien->alamat.'</td>
                            </tr>
                            <tr>
                                <td valign="top">Keterangan</td>
                                <td>: Memerlukan istirahat selama 
                                    <b>('.$berapaHariIstirahat.') '.strtoupper($berapaHariIstirahatString).'</b> hari karena sakit,<br>
                                    &nbsp; terhitung mulai tanggal <b>'.$tanggalAwalIstirahat.'</b> 
                                    sampai dengan <b>'.$tanggalAkhirIstirahat.'</b>.
                                </td>
                            </tr>
                        </table>

                        <p>Demikian surat keterangan ini dibuat agar dapat dipergunakan sebagaimana mestinya.</p>

                        <div class="footer">
                            <p>Pangkalpinang, '.date('d F Y').'</p>
                            <p>Dokter Pemeriksa,</p>
                            <br><br>
                            <p><b><u>'.strtoupper($dokter->nama).'</u></b></p>
                        </div>

                    </body>
                    </html>';

            


            $dompdf = new Dompdf();
            $dompdf->set_option('isRemoteEnabled', true);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();

            $pdf_output = $dompdf->output();

            // ==== 2. Konfigurasi SMTP ====
            $config = [
                'protocol' => 'smtp',
                'smtp_host' => "ssl://smtp.gmail.com",
                'smtp_user' => "bkkmuda044@gmail.com",
                'smtp_pass' => "irsd hnam ucpq eten",
                'smtp_port' => 465,
                'mailtype' => 'html',
                'charset' => 'utf-8',
            ];

            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
            $this->email->set_crlf("\r\n");

            // ==== 3. Kirim email ====
            $this->email->from('bkkmuda044@gmail.com', 'RS. BAKTI TIMAH PANGKALPINANG');
            $this->email->to($email);
            $this->email->subject('Surat Keterangan Sakit - RS. Bakti Timah Pangkalpinang');

            $this->email->message('
                <html>
                <body style="font-family: Arial, sans-serif; font-size: 14px; color: #333;">
                    <p>Kepada Yth,</p>
                    <p><b>Bapak/Ibu '.$pasien->nama.'</b></p>
                    <p>Dengan hormat,</p>

                    <p>
                        Bersama email ini kami lampirkan <b>Surat Keterangan Sakit</b> atas nama 
                        <b>'.$pasien->nama.'</b> yang telah diperiksa oleh dokter kami di 
                        <b>RS. Bakti Timah Pangkalpinang</b>.
                    </p>

                    <p>
                        Surat ini diterbitkan secara resmi oleh Rumah Sakit Bakti Timah dan dapat digunakan 
                        sebagai dokumen pendukung untuk keperluan administrasi.
                    </p>

                    <p>Terima kasih atas perhatian dan kerja samanya.</p>

                    <br>
                    <p>Hormat kami,</p>
                    <p><b>Manajemen Rumah Sakit Bakti Timah Pangkalpinang</b></p>
                    <p style="font-size: 13px; color: #666;">
                        Jalan Bukit Baru No. 1, Pangkalpinang<br>
                        Telp. +62(717)421091, +62(717)433027<br>
                        Email: <a href="mailto:rsbtpnp@gmail.com">rsbtpnp@gmail.com</a>
                    </p>
                    <hr style="border: 0; border-top: 1px solid #ddd; margin-top: 20px;">
                    <p style="font-size: 12px; color: #888;">
                        Email ini dikirim secara otomatis oleh sistem RSBT. Mohon tidak membalas langsung ke alamat ini.
                    </p>
                </body>
                </html>
            ');

            // Lampirkan PDF langsung dari memory
            $this->email->attach($pdf_output, 'attachment', 'Surat Keterangan Sakit - RS. Bakti Timah Pangkalpinang.pdf', 'application/pdf');

            $this->session->set_flashdata('swal', [
                'type' => 'error',
                'title' => 'Gagal Mengirim!',
                'text'  => 'Terjadi kesalahan saat mengirim email.<br>' . $this->email->print_debugger()
            ]);

            if ($this->email->send()) {
                $this->session->set_flashdata('swal', [
                    'type' => 'success',
                    'title' => 'Berhasil!',
                    'text'  => 'Email berhasil dikirim dengan lampiran PDF.'
                ]);
            }

            if ($isStartWithPL) {
                $id_mcu     = base64_encode($id_mcu);
                $id_history = base64_encode($data_history->id_history);
                redirect("erm_igd/form/" . urlencode($id_mcu) . "/" . urlencode($id_history));
            }
 
            redirect('Data_mcu/form/' . $id_mcu);
    }






    // public function index()
    // {
    //     $this->load->view( 'assets/_header' );
    //     $page_data['page_content'] = 'page_content/Erm';
    //     $this->load->view( 'Main', $page_data );
    //     $this->load->view( 'assets/_footer' );
    // }


}
