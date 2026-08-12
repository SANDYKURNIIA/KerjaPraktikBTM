<<<<<<< HEAD
<!DOCTYPE html>
<html lang="id">
<head>
    
    <meta charset="UTF-8">
    <title>Surat Keterangan Sakit</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 15mm 20mm 15mm 20mm; /* atas, kanan, bawah, kiri */
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
            width: 150px;
            margin-right: 15px;
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
    <script>
        window.onload = function() {
            window.print(); // langsung buka dialog print
        };

        // window.onafterprint = function() {
        //     window.history.back();
        // };
    </script>
</head>
<body>

    <div class="header">
        <img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" alt="Logo RS Bakti Timah">
        <div class="info">
            <strong>RUMAH SAKIT BAKTI TIMAH</strong><br>
            Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang<br>
            Kabupaten Bangka, Prov. Kepulauan Bangka Belitung - Indonesia<br>
            Telp. +62 (717) 9100844, +62 (0717) 433026
        </div>
    </div>

    <div class="center">
        <h3><u>SURAT KETERANGAN SAKIT</u></h3>
        <b><p>RSBT-<?= $id_surat ?></p></b>
    </div>

    <p>Yang bertanda tangan di bawah ini menerangkan bahwa:</p>

    <table>
        <tr>
            <td style="width: 180px;">Nama Pasien</td>
            <td>: <?= $pasien->nama ?></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>: <?= $umur ?> Th</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: <?= $pasien->jenis_kelamin ?></td>
        </tr>
        <tr>
            <td>Pekerjaan / Instansi</td>
            <td>: <?= $instansi ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: <?= $pasien->alamat ?></td>
        </tr>
        <tr>
            <td valign="top">Keterangan</td>
            <td>: Memerlukan istirahat selama 
                <b>(<?= $berapaHariIstirahat ?>) <?= strtoupper($berapaHariIstirahatString) ?></b> hari karena sakit,<br>
                &nbsp; terhitung mulai tanggal <b><?= $tanggalAwalIstirahat ?></b> 
                sampai dengan <b><?= $tanggalAkhirIstirahat ?></b>.
            </td>
        </tr>
    </table>

    <p>Demikian surat keterangan ini dibuat agar dapat dipergunakan sebagaimana mestinya.</p>

    <div class="footer">
        <p>Pangkalpinang, <?= date('d F Y'); ?></p>
        <p>Dokter yang pemeriksa,</p>
        <br><br><br>
        <p><b><u>(<?= strtoupper($dokter->nama); ?>)</u></b></p>
    </div>


</body>
</html>
=======
<!DOCTYPE html>
<html lang="id">
<head>
    
    <meta charset="UTF-8">
    <title>Surat Keterangan Sakit</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 15mm 20mm 15mm 20mm; /* atas, kanan, bawah, kiri */
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
            width: 150px;
            margin-right: 15px;
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
    <script>
        window.onload = function() {
            window.print(); // langsung buka dialog print
        };

        // window.onafterprint = function() {
        //     window.history.back();
        // };
    </script>
</head>
<body>

    <div class="header">
        <img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" alt="Logo RS Bakti Timah">
        <div class="info">
            <strong>RUMAH SAKIT BAKTI TIMAH</strong><br>
            Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang<br>
            Kabupaten Bangka, Prov. Kepulauan Bangka Belitung - Indonesia<br>
            Telp. +62 (717) 9100844, +62 (0717) 433026
        </div>
    </div>

    <div class="center">
        <h3><u>SURAT KETERANGAN SAKIT</u></h3>
        <b><p>RSBT-<?= $id_surat ?></p></b>
    </div>

    <p>Yang bertanda tangan di bawah ini menerangkan bahwa:</p>

    <table>
        <tr>
            <td style="width: 180px;">Nama Pasien</td>
            <td>: <?= $pasien->nama ?></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>: <?= $umur ?> Th</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: <?= $pasien->jenis_kelamin ?></td>
        </tr>
        <tr>
            <td>Pekerjaan / Instansi</td>
            <td>: <?= $instansi ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: <?= $pasien->alamat ?></td>
        </tr>
        <tr>
            <td valign="top">Keterangan</td>
            <td>: Memerlukan istirahat selama 
                <b>(<?= $berapaHariIstirahat ?>) <?= strtoupper($berapaHariIstirahatString) ?></b> hari karena sakit,<br>
                &nbsp; terhitung mulai tanggal <b><?= $tanggalAwalIstirahat ?></b> 
                sampai dengan <b><?= $tanggalAkhirIstirahat ?></b>.
            </td>
        </tr>
    </table>

    <p>Demikian surat keterangan ini dibuat agar dapat dipergunakan sebagaimana mestinya.</p>

    <div class="footer">
        <p>Pangkalpinang, <?= date('d F Y'); ?></p>
        <p>Dokter yang pemeriksa,</p>
        <br><br><br>
        <p><b><u>(<?= strtoupper($dokter->nama); ?>)</u></b></p>
    </div>


</body>
</html>
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
