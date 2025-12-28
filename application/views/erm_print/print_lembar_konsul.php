<!DOCTYPE html>
<html>

<head>
    <title>Cetak Lembar Konsul</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 10mm 40mm;
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 13px;
            color: #000;
            background: #fff;
            margin: 0;
        }

        .kop-rs td {
            vertical-align: top;
            line-height: 1.3;
        }

        .kop-rs img {
            width: 120px;
        }

        h2 {
            text-align: center;
            text-transform: uppercase;
            font-size: 15px;
            margin: 10px 0;
            text-decoration: underline;
        }

        .line-double {
            border-top: 3px double #000;
            margin: 5px 0 15px 0;
        }

        /* === TABEL === */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 6px;
        }

        th,
        td {
            vertical-align: top;
            padding: 5px;
            font-size: 13px;
        }

        .label {
            width: 150px;
            font-weight: bold;
        }

        .pasien {
            margin-left: 30px;
        }

        /* === ISI === */
        .recipient-box {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .recipient-box p {
            margin: 0;
            line-height: 1.5;
        }

        .content-area {
            line-height: 1.5;
            margin-bottom: 20px;
        }

        /* === TANDA TANGAN === */
        .signature-area {
            margin-top: 30px;
            text-align: right;
        }

        .signature-area table {
            width: auto;
            margin-left: auto;
        }

        .signature-area .date-line {
            padding-bottom: 5px;
        }

        .signature-area .dr-name {
            padding-top: 40px;
            border-bottom: 1px solid #000;
            font-weight: bold;
            text-align: center;
        }

        .signature-area img {
            display: block;
            margin: 10px auto 0 auto;
        }
    </style>
</head>

<body onload="window.print()">

    <table class="kop-rs">
        <tr>
            <td width="120px">
                <img src="<?= base_url('assets/dist/img/rsbt_ihc.png') ?>" alt="Logo RSBT">
            </td>
            <td>
                <strong style="font-size:16px;">IHC</strong><br>
                <strong style="font-size:16px;">RUMAH SAKIT BAKTI TIMAH PANGKALPINANG</strong><br>
                <span style="font-size:13px;">
                    Jalan Bukit Baru No.1, Pangkalpinang, Taman Bunga, Kec. Gerunggang<br>
                    Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia
                </span>
            </td>
        </tr>
    </table>

    <div class="line-double"></div>

    <h2>RUJUKAN INTERN</h2>

    <div class="recipient-box">
        <p>Kepada Yth</p>
        <p><?= $lembar_konsul->dokter_tujuan ?></p>
        <p>(Ahli penyakit di <?= $lembar_konsul->nama_poli ?>)</p>
        <p>di -</p>
        <p>Tempat</p>
    </div>

    <!-- PEMBUKA -->
    <div class="content-area">
        <p>Salam sejawat,</p>
        <p>Bersama surat ini saya konsultasikan pasien :</p>
    </div>

    <!-- DATA PASIEN -->
    <?php
    $tanggal_lahir = new DateTime($lembar_konsul->tgl_lahir);
    $today = new DateTime();
    $usia = $today->diff($tanggal_lahir)->y;
    ?>

    <table class="pasien">
        <tr>
            <td class="label">Nama</td>
            <td>: <?= $lembar_konsul->nama_pasien ?></td>
        </tr>
        <tr>
            <td class="label">Usia</td>
            <td>: <?= $usia ?> tahun</td>
        </tr>
        <tr>
            <td class="label">Keluhan Utama</td>
            <td>: <?= nl2br($lembar_konsul->keluhan) ?></td>
        </tr>
        <tr>
            <td class="label">Riwayat</td>
            <td>: <?= nl2br($lembar_konsul->riwayat_penyakit) ?></td>
        </tr>
        <tr>
            <td class="label">Diagnosa Kerja</td>
            <td>: <?= nl2br($lembar_konsul->diagnosis) ?></td>
        </tr>
        <tr>
            <td class="label">Tanggal Konsul</td>
            <td>: <?= date('d M Y', strtotime($lembar_konsul->tanggal)) ?></td>
        </tr>
    </table>

    <!-- PENUTUP -->
    <div class="content-area">
        <p>Untuk pengobatan dan perawatan selanjutnya, terima kasih.</p>
    </div>

    <!-- TANDA TANGAN -->
    <div class="signature-area">
        <table>
            <tr>
                <td class="date-line">
                    Pangkalpinang, <?= date('d M Y', strtotime($lembar_konsul->tanggal)) ?>
                </td>
            </tr>
            <tr>
                <td class="date-line">Salam sejawat</td>
            </tr>

            <?php if (!empty($lembar_konsul->ttd_dokter_pengirim)) : ?>
            <tr>
                <td>
                    <img src="<?= base_url('assets/ttd/' . $lembar_konsul->ttd_dokter_pengirim) ?>" width="60" height="60">
                </td>
            </tr>
            <?php endif; ?>

            <tr>
                <td class="dr-name">(<?= $lembar_konsul->dokter_pengirim ?>)</td>
            </tr>
        </table>
    </div>

</body>
</html>
