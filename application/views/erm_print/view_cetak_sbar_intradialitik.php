<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak SBAR - Intradialitik</title>
    <style>
        /* CSS KHUSUS CETAK */
        @page {
            size: A4 landscape;
            margin: 10mm;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            -webkit-print-color-adjust: exact;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }

        .header h2 {
            margin: 0;
            font-size: 18px;
            text-transform: uppercase;
        }

        .header p {
            margin: 2px 0;
            font-size: 12px;
        }

        .info-pasien {
            width: 100%;
            margin-bottom: 15px;
        }

        .info-pasien td {
            padding: 3px;
            vertical-align: top;
        }

        .label {
            font-weight: bold;
            width: 120px;
        }

        table.grid {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table.grid th,
        table.grid td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
        }

        table.grid th {
            background-color: #eee;
            font-weight: bold;
        }

        table.grid td.left {
            text-align: left;
            padding-left: 10px;
        }


        .footer-title {
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 10px;
            display: block;
        }

        .list-item {
            margin-bottom: 5px;
        }

        /* Hapus tombol saat diprint */
        @media print {
            .no-print {
                display: none;
            }
        }

        .footer-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            margin-top: 25px;
        }

        /* KIRI */
        .footer-section {
            width: 60%;
        }

        /* KANAN (TTD) */
        .ttd-table {
            width: 40%;
            border-collapse: collapse;
            border-collapse: separate;
            border-spacing: 60px 0; /* horizontal | vertical */
        }

        .ttd-table td {
            text-align: center;
            vertical-align: top;
            padding-top: 10px;
        }

        .ttd-name {
            border-top: 1px solid #000;
            display: inline-block;
            padding-top: 5px;
            min-width: 200px;
            font-weight: bold;
        }


    </style>
</head>

<body onload="window.print()">
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
    <hr size="5px">

    <table class="info-pasien">
        <tr>
            <td class="label">Nama Pasien</td>
            <td>: <?= $pasien->nama_pasien ?? $pasien->nama ?? '-' ?></td>
            <td class="label">No. RM</td>
            <td>: <?= $pasien->no_rm ?? '-' ?></td>
        </tr>
        <tr>
            <td class="label">Tanggal Lahir</td>
            <td>: <?= isset($pasien->tgl_lahir) ? date('d-m-Y', strtotime($pasien->tgl_lahir)) : '-' ?> (<?= $umur ?? '-' ?> Thn)</td>
            <td class="label">Tanggal HD</td>
            <td>: <?= isset($pasien->created_at) ? date('d-m-Y', strtotime($pasien->created_at)) : date('d-m-Y') ?></td>
        </tr>
    </table>

    <table class="grid">
        <thead>
            <tr>
                <th rowspan="2" style="width: 150px;">PARAMETER</th>
                <th rowspan="2" style="width: 60px;">Pre HD</th>
                <th colspan="8">PEMANTAUAN JAM KE-</th>
                <th rowspan="2" style="width: 60px;">Post HD</th>
            </tr>
            <tr>
                <?php for ($i = 1; $i <= 8; $i++): ?><th><?= $i ?></th><?php endfor; ?>
            </tr>
        </thead>
        <tbody>
            <?php
            // Definisi Baris (Sama kayak di form input)
            $rows = [
                'jam_wib' => 'Jam (WIB)',
                'keluhan' => 'Keluhan',
                'bb_kg' => 'BB (Kg)',
                'kesadaran' => 'Kesadaran',
                'tekanan_darah_mmhg' => 'Tensi (mmHg)',
                'nadi_x_menit' => 'Nadi (x/mnt)',
                'suhu_c' => 'Suhu (°C)',
                'qd_ml_menit' => 'Qd (mL/mnt)',
                'qb_ml_menit' => 'Qb (mL/mnt)',
                'tekanan_vena_mmhg' => 'Tek. Vena',
                'tmp_mmhg' => 'TMP',
                'volume_yang_ditarik_ml' => 'Vol Ditarik',
                'asesmen_intervensi_keterangan' => 'Asesmen/Intervensi',
                'nama_dan_paraf_perawat' => 'Paraf Perawat'
            ];

            foreach ($rows as $slug => $label):
            ?>
                <tr>
                    <td class="left"><b><?= $label ?></b></td>

                    <td><?= $grid[$slug]['pre'] ?? '-' ?></td>

                    <?php for ($i = 1; $i <= 8; $i++):
                        $val = $grid[$slug]['jam' . $i] ?? '-';
                    ?>
                        <td><?= $val ?></td>
                    <?php endfor; ?>

                    <td><?= $grid[$slug]['post'] ?? '-' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

   <div class="footer-wrapper">

    <!-- KIRI -->
    <div class="footer-section">
        <span class="footer-title">PERENCANAAN PULANG (DISCHARGE PLANNING)</span>
        <div class="list-item">1. Tindakan HD berikutnya : <b><?= $db['tindakan_next'] ?? '-' ?></b></div>
        <div class="list-item">2. Edukasi : <b><?= $db['edukasi'] ?? '-' ?></b></div>
        <div class="list-item">3. Rencana Konsultasi : <b><?= $db['konsultasi'] ?? '-' ?></b></div>
        <div class="list-item">4. Rencana Pemeriksaan Penunjang : <b><?= $db['penunjang'] ?? '-' ?></b></div>
        <div class="list-item">5. Lain-lain : <b><?= $db['lain_lain'] ?? '-' ?></b></div>
    </div>

    <!-- KANAN -->
    <table class="ttd-table">
        <tr>
            <td>
                <div class="ttd-title">Perawat Penanggung Jawab</div>
                <?php if($ttd_perawat): ?>
                    <img width="80" height="80" src="<?= base_url('assets/ttd/' . $ttd_perawat) ?>" alt="">
                <?php else: ?>
                    <div style="margin-bottom : 60px;"></div>
                <?php endif; ?>
                <div class="ttd-name">
                    <?= $nama_perawat ?? ' ' ?>
                </div>
            </td>

            <td>
                <div class="ttd-title">Dokter Penanggung Jawab</div>
                <?php if($ttd_dokter): ?>
                    <img width="80" height="80" src="<?= base_url('assets/ttd/' . $ttd_dokter) ?>" alt="">
                <?php else: ?>
                    <div style="margin-bottom : 60px;"></div>
                <?php endif; ?>
                <div class="ttd-name">
                    <?= $nama_dokter ?? ' ' ?>
                </div>
            </td>
        </tr>
    </table>

</div>


</body>

</html>