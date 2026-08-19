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

        h4 {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 4px;
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
            min-height: 80px;
            border: 1px solid #000;
            padding: 8px;
            border-radius: 4px;
            margin-bottom: 8px;
            font-size: 13px;
        }

        .footer {
            margin-top: 30px;
            text-align: right;
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
    </style>
</head>

<body>

    <div class="logo-container">
        <img src="<?= base_url('assets/dist/img/rsbt_ihc.png');  ?>" alt="Logo RSBT" style="width: 200px;">
    </div>

    <h4>Rawat Jalan</h4>
    <hr>

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
            <td class="label">Tanggal
                td>
            <td>: <?= !empty($soap->tanggal) ? date('d-m-Y', strtotime($soap->tanggal)) : '-' ?>
        </td>

        </tr>
        <!-- ini ya bang -->
        <tr>
            <td class="label">Status</td>
            <td>: <?= ucfirst($soap->status_kunjungan ?? '-') ?></td>
        </tr>
         <!-- ini ya bang -->
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
        <p>Tempat: ..................., Tanggal: ...................</p>
        <br><br><br>
        <b>(<?= $dokter->nama_dokter ?? 'Dokter Penanggung Jawab' ?>)</b>
    </div>
        
    <script>
        window.onload = function () {
            window.print();
        };
    </script>


</body>
</html>