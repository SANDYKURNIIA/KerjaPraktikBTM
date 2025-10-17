<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        @page {
            size: A4;
            margin: 15mm 20mm;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 15px 20px;
            font-size: 13px;
            color: #000;
            line-height: 1.3;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 8px;
        }

        .logo-container img {
            width: 150px;
            height: auto;
        }

        h1 {
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
            text-align: right;
            margin: 0;
        }

        hr {
            border: 1px solid #000;
            margin: 8px 0 12px 0;
        }

        table.info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
        }

        table.info-table td {
            padding: 3px 4px;
            vertical-align: top;
        }

        table.info-table td.label {
            width: 30%;
            font-weight: bold;
        }

        /* Garis bawah di bawah tabel info */
        table.info-table tr:last-child td {
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
        }

        .section-title {
            font-weight: bold;
            margin-top: 12px;
            margin-bottom: 3px;
            text-transform: uppercase;
            font-size: 13px;
        }

        .isi {
            min-height: 70px;
            border: 1px solid #000;
            padding: 8px;
            border-radius: 4px;
            margin-bottom: 8px;
            font-size: 13px;
        }

        .footer {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            font-size: 13px;
        }

        .footer p {
            margin: 0;
        }

        @media print {
            .no-print {
                display: none;
            }
        }

        .title {
            font-weight: bold;
            text-size: 14px;
            text-align: center;
        }
    </style>
</head>

<body>

    <table style="width: 100%;">
        <tr>
            <td style="width: 20%;">
                <img src="<?= base_url('assets/dist/img/rsbt_ihc.png') ?>" alt="Logo RS" style="width: 180px;">
            </td>
            <td style="width: 80%; text-align: left;">
                <p><b>RS. Bakti Timah</b></p>
                <p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                <p>Telp. 0717 9100844, Fax. 0715 32165</p>
            </td>
        </tr>
    </table>

    <hr>

    <h3 class="title">Lembar Program Terapi/Pendampingan/Sebelum dan Sesudah Sesi Rehabilitas</h3>

    <br>
    
    <table class="info-table">
        <tr>
            <td class="label">Nomor Rekam Medis</td>
            <td>: <?= $soap->no_rm ?? '-' ?></td>
        </tr>
        <tr>
            <td class="label">Nama Pasien</td>
            <td>: <?= $pasien->nama_pasien ?? '-' ?></td>
        </tr>
        <tr>
            <td class="label">Jenis Kelamin</td>
            <td>: <?= $pasien->jenis_kelamin ?? '-' ?></td>
        </tr>
        <tr>
            <td class="label">Dokter DPJP</td>
            <td>: <?= $dokter->nama_dokter ?? '-' ?></td>
        </tr>
        <tr>
            <td class="label">Tanggal</td>
            <td>: <?= isset($pasien->tgl_masuk) ? date('d F Y', strtotime($pasien->tgl_masuk)) : '-' ?></td>
        </tr>
    </table>

    <div class="section-title">Subjective</div>
    <div class="isi"><?= nl2br($soap->S ?? '-') ?></div>

    <div class="section-title">Objective</div>
    <div class="isi"><?= nl2br($soap->O ?? '-') ?></div>

    <div class="section-title">Assessment</div>
    <div class="isi"><?= nl2br($soap->A ?? '-') ?></div>

    <div class="section-title">Planning</div>
    <div class="isi"><?= nl2br($soap->P ?? '-') ?></div>

    <div class="footer">
        <div>
            <p>Pangkalpinang, <?= isset($pasien->tgl_masuk) ? date('d F Y', strtotime($pasien->tgl_masuk)) : '-' ?>.</p>
            <br><br><br>
            <p>(Tandatangan Dokter)</p>
            <b>(<?= $dokter->nama_dokter ?? 'Dokter Penanggung Jawab' ?>)</b>
        </div>
        <div style="text-align: right;">
            <p>&nbsp;</p>
            <br><br><br>
            <p>(Tandatangan Tim Rehabilitas Medik)</p>
            <b>(<?= $this->session->userdata('data_auth')->nama ?? 'Petugas Rekam Medis' ?>)</b>
        </div>
    </div>

    <script>
        window.onload = function () {
            window.print();
        };
    </script>

</body>
</html>
