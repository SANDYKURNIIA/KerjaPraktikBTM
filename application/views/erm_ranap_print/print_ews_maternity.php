<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>MOEWS - RS Bakti Timah Sungailiat</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 5mm;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 8.5px;
            color: #000;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            margin: 0 auto;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 3px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 1.5px 3px;
            vertical-align: middle;
        }

        .doc-info {
            font-size: 8.5px;
            line-height: 1.3;
        }

        .bg-navy {
            background-color: #0c2340;
            color: #fff;
            font-weight: bold;
        }

        .bg-hdr-red {
            background-color: #dc2626 !important;
            color: #fff !important;
            font-weight: bold;
            text-align: center;
        }

        .bg-hdr-yellow {
            background-color: #eab308 !important;
            color: #000 !important;
            font-weight: bold;
            text-align: center;
        }

        .bg-hdr-green {
            background-color: #16a34a !important;
            color: #fff !important;
            font-weight: bold;
            text-align: center;
        }

        .bg-hdr-white {
            background-color: #ffffff !important;
            color: #000 !important;
            font-weight: bold;
            text-align: center;
        }

        .col-bg-1 {
            background-color: #fee2e2;
        }

        .col-bg-2 {
            background-color: #fef9c3;
        }

        .col-bg-3 {
            background-color: #dcfce7;
        }

        .col-bg-4 {
            background-color: #ffffff;
        }

        .col-bg-5 {
            background-color: #dcfce7;
        }

        .col-bg-6 {
            background-color: #fef9c3;
        }

        .col-bg-7 {
            background-color: #fee2e2;
        }

        .text-center {
            text-align: center;
        }

        .font-bold {
            font-weight: bold;
        }

        .param-cell {
            text-align: center;
            font-size: 8px;
            height: 24px;
            padding: 1px;
            position: relative;
            box-sizing: border-box;
        }

        .cell-label {
            font-size: 7.5px;
            line-height: 1;
            margin-bottom: 2px;
        }

        .radio-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 2px;
        }

        .radio-dot {
            width: 12px;
            height: 12px;
            border: 1px solid #000;
            border-radius: 50%;
            background-color: #ffffff;
            box-sizing: border-box;
            display: inline-block;
        }

        .radio-dot.active {
            background-color: #000000;
            border-color: #000000;
            box-shadow: inset 0 0 0 2px #ffffff;
        }

        td.param-cell.cell-selected-radio {
            font-weight: bold;
        }

        .identity-banner {
            background-color: #0c2340;
            color: #fff;
            font-weight: bold;
            text-align: center;
            writing-mode: vertical-lr;
            transform: rotate(180deg);
            width: 18px;
            font-size: 8.5px;
        }

        .red-alert-box {
            color: #dc2626;
            font-weight: bold;
            font-size: 8px;
            text-align: center;
            border: 1px solid #dc2626;
            padding: 2px;
            background-color: #fef2f2;
        }

        .total-skor-box {
            border: 2px solid #0c2340;
            background-color: #ffffff;
            color: #0c2340;
            font-size: 13px;
            font-weight: bold;
            text-align: center;
        }

        .action-box {
            font-size: 7.5px;
            line-height: 1.15;
            vertical-align: top;
        }

        .trigger-list {
            margin: 0;
            padding-left: 10px;
            font-size: 7.5px;
        }

        .trigger-list li {
            margin-bottom: 0.5px;
        }

        @media print {
            body {
                margin: 0;
            }

            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <?php
    $row = !empty($data) ? (is_object($data[0]) ? $data[0] : (object)$data[0]) : (object)[];

    $umur_pasien = '-';
    $tgl_lahir_val = $tgl_lahir ?? $row->tgl_lahir ?? null;
    if (!empty($tgl_lahir_val)) {
        $birthDate = new DateTime($tgl_lahir_val);
        $today = new DateTime('today');
        $y = $today->diff($birthDate)->y;
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;
        if ($y > 0) $umur_pasien = $y . ' tahun';
        elseif ($m > 0) $umur_pasien = $m . ' bulan';
        else $umur_pasien = $d . ' hari';
    }

    function map_score_to_col($score, $param_type)
    {
        if ($score === '' || $score === null) return 0;
        $s = (int)$score;

        if (in_array($param_type, ['respirasi', 'suhu', 'sistolik', 'diastolik', 'nadi'])) {
            if ($s === 3) return 7;
            if ($s === 2) return 6;
            if ($s === 1) return 5;
            if ($s === 0) return 4;
        }

        if ($param_type === 'saturasi') {
            if ($s === 3) return 1;
            if ($s === 2) return 2;
            if ($s === 0) return 4;
        }

        if ($param_type === 'obstetri') {
            if ($s === 3) return 1;
            if ($s === 2) return 2;
            if ($s === 1) return 3;
            if ($s === 0) return 4;
        }

        if ($param_type === 'ddj') {
            if ($s === 3) return 7;
            if ($s === 2) return 2;
            if ($s === 1) return 5;
            if ($s === 0) return 4;
        }

        return 0;
    }

    $resp_col = map_score_to_col($row->respirasi ?? $row->pernafasan ?? null, 'respirasi');
    $sat_col  = map_score_to_col($row->oksigen ?? null, 'saturasi');
    $suhu_col = map_score_to_col($row->suhu ?? null, 'suhu');
    $sis_col  = map_score_to_col($row->sistolik ?? null, 'sistolik');
    $dia_col  = map_score_to_col($row->diastolik ?? null, 'diastolik');
    $nadi_col = map_score_to_col($row->nadi ?? null, 'nadi');

    $kes_col  = map_score_to_col($row->kesadaran ?? null, 'obstetri');
    $urin_col = map_score_to_col($row->produksi_urin ?? $row->urin ?? null, 'obstetri');
    $nyeri_col = map_score_to_col($row->nyeri ?? null, 'obstetri');
    $lok_col  = map_score_to_col($row->lokia ?? $row->lochea ?? null, 'obstetri');
    $prot_col = map_score_to_col($row->protein_urin ?? $row->protein ?? null, 'obstetri');
    $per_col  = map_score_to_col($row->pendarahan_obstetri ?? $row->perdarahan ?? null, 'obstetri');

    $ddj_col  = map_score_to_col($row->ddj ?? $row->djj ?? null, 'ddj');

    // HELPER RENDER RADIO UNTUK SEMUA PARAMETER
    function render_cell_radio($label, $col_num, $active_col)
    {
        $is_active = ($active_col == $col_num);
        $selected_class = $is_active ? ' cell-selected-radio' : '';

        echo '<td class="param-cell col-bg-' . $col_num . $selected_class . '">';
        echo '<div class="cell-label">' . $label . '</div>';

        if ($label !== '-') {
            echo '<div class="radio-wrapper">';
            echo '<div class="radio-dot' . ($is_active ? ' active' : '') . '"></div>';
            echo '</div>';
        }
        echo '</td>';
    }

    function get_score($col)
    {
        if ($col == 1 || $col == 7) return 3;
        if ($col == 2 || $col == 6) return 2;
        if ($col == 3 || $col == 5) return 1;
        if ($col == 4) return 0;
        return '';
    }

    $tgl_str = !empty($row->tanggal) ? date('d-m-Y', strtotime($row->tanggal)) : (!empty($row->tgl_periksa) ? date('d-m-Y', strtotime($row->tgl_periksa)) : date('d-m-Y'));
    $jam_str = !empty($row->jam_periksa) ? date('H:i', strtotime($row->jam_periksa)) : (!empty($row->waktu) ? date('H:i', strtotime($row->waktu)) : date('H:i'));
    ?>

    <div class="container">
        <table>
            <tr>
                <td width="22%" class="text-center" style="padding: 3px;">
                    <img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" style="max-width: 125px; height: auto;" alt="Logo RSBT IHC">
                </td>
                <td width="53%" class="text-center">
                    <h2 style="margin: 0; font-size: 12px; font-weight: bold;">MODIFIED OBSTETRIC<br>EARLY WARNING SYSTEM (MOEWS)</h2>
                    <span style="font-size: 8px; font-style: italic;">Deteksi dini kegawatan maternal untuk tindakan cepat dan mencegah komplikasi</span>
                </td>
                <td width="25%" class="doc-info" style="padding: 3px;">
                    <b>No. Dokumen</b> : RM 7d/II/B/2026<br>
                    <b>Revisi</b> : 01<br>
                    <b>Tanggal Berlaku</b> : 02 Januari 2026
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td class="identity-banner" rowspan="4" width="3%">IDENTITAS PASIEN</td>
                <td width="13%"><b>Nama Pasien</b></td>
                <td width="30%">: <?= $nama ?? $row->nama_pasien ?? '-' ?></td>
                <td width="12%"><b>No RM</b></td>
                <td width="22%">: <?= $row->no_rm ?? $no_rm ?? '-' ?></td>
                <td width="8%"><b>Tanggal</b></td>
                <td width="12%">: <?= $tgl_str ?></td>
            </tr>
            <tr>
                <td><b>Umur</b></td>
                <td>: <?= $umur_pasien ?></td>
                <td><b>Ruangan</b></td>
                <td>: <?= $ruangan ?? $row->nama_ruangan ?? '-' ?></td>
                <td><b>Jam</b></td>
                <td>: <?= $jam_str ?> WIB</td>
            </tr>
            <tr>
                <td><b>Gravida/Para/A</b></td>
                <td>: G <?= $row->gravida ?? '-' ?> P <?= $row->para ?? '-' ?> A <?= $row->abortus ?? '-' ?></td>
                <td><b>Diagnosis</b></td>
                <td>: <?= $row->diagnosa ?? $diagnosa ?? '-' ?></td>
                <td colspan="2" class="red-alert-box" rowspan="2">
                    SATU PARAMETER MERAH<br>= WAJIB EVALUASI DOKTER
                </td>
            </tr>
            <tr>
                <td><b>Usia Kehamilan</b></td>
                <td>: <?= $row->minggu_kelahiran ?? '-' ?> minggu / <?= $row->hari_kelahiran ?? '-' ?> Hari</td>
                <td><b>DPJP / Dokter</b></td>
                <td>: <?= $dpjp ?? $row->nama_dokter ?? '-' ?></td>
            </tr>
        </table>

        <table>
            <thead>
                <tr class="bg-navy text-center">
                    <th width="26%">PARAMETER</th>
                    <th width="9%" class="bg-hdr-red">3<br>(MERAH)</th>
                    <th width="9%" class="bg-hdr-yellow">2<br>(KUNING)</th>
                    <th width="9%" class="bg-hdr-green">1<br>(HIJAU)</th>
                    <th width="9%" class="bg-hdr-white">0<br>(PUTIH)</th>
                    <th width="9%" class="bg-hdr-green">1<br>(HIJAU)</th>
                    <th width="9%" class="bg-hdr-yellow">2<br>(KUNING)</th>
                    <th width="9%" class="bg-hdr-red">3<br>(MERAH)</th>
                    <th width="11%">SKOR</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="font-bold">1. RESPIRASI (x/menit)</td>
                    <?php render_cell_radio('&lt; 10', 1, $resp_col); ?>
                    <?php render_cell_radio('10 – 11', 2, $resp_col); ?>
                    <?php render_cell_radio('-', 3, $resp_col); ?>
                    <?php render_cell_radio('12 – 19', 4, $resp_col); ?>
                    <?php render_cell_radio('20 – 24', 5, $resp_col); ?>
                    <?php render_cell_radio('25 – 29', 6, $resp_col); ?>
                    <?php render_cell_radio('&ge; 30', 7, $resp_col); ?>
                    <td class="text-center font-bold"><?= get_score($resp_col) ?></td>
                </tr>

                <tr>
                    <td class="font-bold">2. SATURASI OKSIGEN (%)</td>
                    <?php render_cell_radio('&lt; 92', 1, $sat_col); ?>
                    <?php render_cell_radio('92 – 95', 2, $sat_col); ?>
                    <?php render_cell_radio('-', 3, $sat_col); ?>
                    <?php render_cell_radio('&gt; 95', 4, $sat_col); ?>
                    <?php render_cell_radio('-', 5, $sat_col); ?>
                    <?php render_cell_radio('-', 6, $sat_col); ?>
                    <?php render_cell_radio('-', 7, $sat_col); ?>
                    <td class="text-center font-bold"><?= get_score($sat_col) ?></td>
                </tr>

                <tr>
                    <td class="font-bold">3. SUHU (&deg;C)</td>
                    <?php render_cell_radio('&le; 35,0', 1, $suhu_col); ?>
                    <?php render_cell_radio('35,1 – 35,9', 2, $suhu_col); ?>
                    <?php render_cell_radio('-', 3, $suhu_col); ?>
                    <?php render_cell_radio('36,0 – 37,4', 4, $suhu_col); ?>
                    <?php render_cell_radio('37,5 – 37,9', 5, $suhu_col); ?>
                    <?php render_cell_radio('38,0 – 38,9', 6, $suhu_col); ?>
                    <?php render_cell_radio('&ge; 39,0', 7, $suhu_col); ?>
                    <td class="text-center font-bold"><?= get_score($suhu_col) ?></td>
                </tr>

                <tr>
                    <td class="font-bold">4. TEKANAN DARAH SISTOLIK (mmHg)</td>
                    <?php render_cell_radio('&lt; 70', 1, $sis_col); ?>
                    <?php render_cell_radio('70 – 79', 2, $sis_col); ?>
                    <?php render_cell_radio('80 – 89', 3, $sis_col); ?>
                    <?php render_cell_radio('90 – 139', 4, $sis_col); ?>
                    <?php render_cell_radio('140 – 149', 5, $sis_col); ?>
                    <?php render_cell_radio('150 – 159', 6, $sis_col); ?>
                    <?php render_cell_radio('&ge; 160', 7, $sis_col); ?>
                    <td class="text-center font-bold"><?= get_score($sis_col) ?></td>
                </tr>

                <tr>
                    <td class="font-bold">5. TEKANAN DARAH DIASTOLIK (mmHg)</td>
                    <?php render_cell_radio('&le; 50', 1, $dia_col); ?>
                    <?php render_cell_radio('50 – 69', 2, $dia_col); ?>
                    <?php render_cell_radio('-', 3, $dia_col); ?>
                    <?php render_cell_radio('70 – 89', 4, $dia_col); ?>
                    <?php render_cell_radio('90 – 99', 5, $dia_col); ?>
                    <?php render_cell_radio('100 – 109', 6, $dia_col); ?>
                    <?php render_cell_radio('&ge; 110', 7, $dia_col); ?>
                    <td class="text-center font-bold"><?= get_score($dia_col) ?></td>
                </tr>

                <tr>
                    <td class="font-bold">6. NADI / DENYUT JANTUNG (x/menit)</td>
                    <?php render_cell_radio('&le; 40', 1, $nadi_col); ?>
                    <?php render_cell_radio('40 – 49', 2, $nadi_col); ?>
                    <?php render_cell_radio('-', 3, $nadi_col); ?>
                    <?php render_cell_radio('50 – 99', 4, $nadi_col); ?>
                    <?php render_cell_radio('100 – 109', 5, $nadi_col); ?>
                    <?php render_cell_radio('110 – 129', 6, $nadi_col); ?>
                    <?php render_cell_radio('&ge; 130', 7, $nadi_col); ?>
                    <td class="text-center font-bold"><?= get_score($nadi_col) ?></td>
                </tr>

                <tr class="bg-navy text-center">
                    <td colspan="9" style="font-size: 9px; padding: 2px;">PARAMETER OBSTETRI</td>
                </tr>

                <tr>
                    <td class="font-bold">7. TINGKAT KESADARAN (AVPU)</td>
                    <?php render_cell_radio('TIDAK RESPON', 1, $kes_col); ?>
                    <?php render_cell_radio('RESPON NYERI', 2, $kes_col); ?>
                    <?php render_cell_radio('RESPON SUARA', 3, $kes_col); ?>
                    <?php render_cell_radio('SADAR', 4, $kes_col); ?>
                    <?php render_cell_radio('-', 5, $kes_col); ?>
                    <?php render_cell_radio('-', 6, $kes_col); ?>
                    <?php render_cell_radio('-', 7, $kes_col); ?>
                    <td class="text-center font-bold"><?= get_score($kes_col) ?></td>
                </tr>

                <tr>
                    <td class="font-bold">8. PRODUKSI URIN (ml/jam)</td>
                    <?php render_cell_radio('&lt; 10', 1, $urin_col); ?>
                    <?php render_cell_radio('10 – 30', 2, $urin_col); ?>
                    <?php render_cell_radio('30 – 50', 3, $urin_col); ?>
                    <?php render_cell_radio('&gt; 50', 4, $urin_col); ?>
                    <?php render_cell_radio('-', 5, $urin_col); ?>
                    <?php render_cell_radio('-', 6, $urin_col); ?>
                    <?php render_cell_radio('-', 7, $urin_col); ?>
                    <td class="text-center font-bold"><?= get_score($urin_col) ?></td>
                </tr>

                <tr>
                    <td class="font-bold">9. NYERI</td>
                    <?php render_cell_radio('NYERI BERAT', 1, $nyeri_col); ?>
                    <?php render_cell_radio('NYERI SEDANG', 2, $nyeri_col); ?>
                    <?php render_cell_radio('NYERI RINGAN', 3, $nyeri_col); ?>
                    <?php render_cell_radio('NORMAL', 4, $nyeri_col); ?>
                    <?php render_cell_radio('-', 5, $nyeri_col); ?>
                    <?php render_cell_radio('-', 6, $nyeri_col); ?>
                    <?php render_cell_radio('-', 7, $nyeri_col); ?>
                    <td class="text-center font-bold"><?= get_score($nyeri_col) ?></td>
                </tr>

                <tr>
                    <td class="font-bold">10. LOCHEA / PERDARAHAN</td>
                    <?php render_cell_radio('ABNORMAL (BERAT)', 1, $lok_col); ?>
                    <?php render_cell_radio('ABNORMAL (SEDANG)', 2, $lok_col); ?>
                    <?php render_cell_radio('ABNORMAL (RINGAN)', 3, $lok_col); ?>
                    <?php render_cell_radio('NORMAL', 4, $lok_col); ?>
                    <?php render_cell_radio('-', 5, $lok_col); ?>
                    <?php render_cell_radio('-', 6, $lok_col); ?>
                    <?php render_cell_radio('-', 7, $lok_col); ?>
                    <td class="text-center font-bold"><?= get_score($lok_col) ?></td>
                </tr>

                <tr>
                    <td class="font-bold">11. PROTEINURIA</td>
                    <?php render_cell_radio('+++', 1, $prot_col); ?>
                    <?php render_cell_radio('++', 2, $prot_col); ?>
                    <?php render_cell_radio('+', 3, $prot_col); ?>
                    <?php render_cell_radio('NEGATIF', 4, $prot_col); ?>
                    <?php render_cell_radio('-', 5, $prot_col); ?>
                    <?php render_cell_radio('-', 6, $prot_col); ?>
                    <?php render_cell_radio('-', 7, $prot_col); ?>
                    <td class="text-center font-bold"><?= get_score($prot_col) ?></td>
                </tr>

                <tr>
                    <td class="font-bold">12. PERDARAHAN OBSTETRI</td>
                    <?php render_cell_radio('MASIF (&ge;1000 ml)', 1, $per_col); ?>
                    <?php render_cell_radio('SEDANG (500-999 ml)', 2, $per_col); ?>
                    <?php render_cell_radio('RINGAN (&lt;500 ml)', 3, $per_col); ?>
                    <?php render_cell_radio('TIDAK ADA', 4, $per_col); ?>
                    <?php render_cell_radio('-', 5, $per_col); ?>
                    <?php render_cell_radio('-', 6, $per_col); ?>
                    <?php render_cell_radio('-', 7, $per_col); ?>
                    <td class="text-center font-bold"><?= get_score($per_col) ?></td>
                </tr>

                <tr>
                    <td class="font-bold">13. DDJ / KONDISI JANIN (x/menit)</td>
                    <?php render_cell_radio('&lt; 100', 1, $ddj_col); ?>
                    <?php render_cell_radio('100 – 120', 2, $ddj_col); ?>
                    <?php render_cell_radio('-', 3, $ddj_col); ?>
                    <?php render_cell_radio('NORMAL', 4, $ddj_col); ?>
                    <?php render_cell_radio('121 – 159', 5, $ddj_col); ?>
                    <?php render_cell_radio('-', 6, $ddj_col); ?>
                    <?php render_cell_radio('&gt; 160', 7, $ddj_col); ?>
                    <td class="text-center font-bold"><?= get_score($ddj_col) ?></td>
                </tr>

                <tr>
                    <td colspan="8" class="bg-navy" style="padding: 3px 5px;">
                        <span style="font-size: 10px;">TOTAL SKOR</span>
                        <span style="color: #ffffff; font-style: italic; font-size: 8px; margin-left: 10px;">(Total dijumlahkan dari score)</span>
                    </td>
                    <td class="total-skor-box">
                        <?= $row->total_ews ?? '0' ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <table>
            <tr>
                <td width="20%" class="action-box" style="padding: 0;">
                    <table style="margin: 0; height: 100%;">
                        <tr class="bg-navy">
                            <td colspan="2" class="text-center">KUNCI SKOR</td>
                        </tr>
                        <tr class="bg-navy">
                            <td width="30%" class="text-center">SKOR</td>
                            <td class="text-center">WARNA</td>
                        </tr>
                        <tr>
                            <td class="text-center font-bold">0</td>
                            <td class="bg-hdr-white">PUTIH (NORMAL)</td>
                        </tr>
                        <tr>
                            <td class="text-center font-bold">1 - 4</td>
                            <td class="col-bg-3 font-bold">HIJAU (ABNORMAL RINGAN)</td>
                        </tr>
                        <tr>
                            <td class="text-center font-bold">5 - 6</td>
                            <td class="col-bg-2 font-bold">KUNING (WARNING)</td>
                        </tr>
                        <tr>
                            <td class="text-center font-bold">&ge; 7</td>
                            <td class="col-bg-1 font-bold">MERAH (GAWAT)</td>
                        </tr>
                    </table>
                </td>

                <td width="53%" class="action-box" style="padding: 0;">
                    <table style="margin: 0; height: 100%;">
                        <tr class="bg-navy">
                            <td colspan="4" class="text-center">TINDAKAN BERDASARKAN ZONA</td>
                        </tr>
                        <tr>
                            <td width="25%" class="text-center font-bold" style="background-color: #f5f5f5;">ZONA RUTIN<br><span style="font-weight:normal;">(Total Skor 0)</span></td>
                            <td width="25%" class="col-bg-3 font-bold text-center">ZONA HIJAU<br><span style="font-weight:normal;">(Total Skor 1 - 4)</span></td>
                            <td width="25%" class="col-bg-2 font-bold text-center">ZONA KUNING<br><span style="font-weight:normal;">(Total Skor 5 - 6)</span></td>
                            <td width="25%" class="col-bg-1 font-bold text-center">ZONA MERAH<br><span style="font-weight:normal;">(Total Skor &ge; 7 / 1 param merah)</span></td>
                        </tr>
                        <tr style="font-size: 7px; vertical-align: top;">
                            <td style="padding: 2px;">
                                &#10004; Observasi rutin tiap 8 jam.<br>
                                Manajemen nyeri, demam / distress; observasi peningkatan TTV & diskusikan dengan PJ Shift.
                            </td>
                            <td style="padding: 2px;">
                                Observasi ulang tiap 4–5 jam & diskusikan dengan PJ Shift.
                            </td>
                            <td style="padding: 2px;">
                                Observasi tiap 2–4 jam.<br>
                                Lapor DPJP / PJ Shift.
                            </td>
                            <td style="padding: 2px;">
                                Evaluasi segera! Pertimbangkan ICU/HCU.<br>
                                Aktivasi Respon Cepat.<br>
                                Lapor DPJP segera.
                            </td>
                        </tr>
                    </table>
                </td>

                <td width="27%" class="action-box" style="padding: 0;">
                    <table style="margin: 0; height: 100%;">
                        <tr class="bg-hdr-red">
                            <td class="text-center">TRIGGER MERAH (SEGERA EVALUASI)</td>
                        </tr>
                        <tr>
                            <td style="padding: 2px;">
                                <ul class="trigger-list">
                                    <li>Respirasi &lt; 10 atau &ge; 30 x/menit</li>
                                    <li>Saturasi O<sub>2</sub> &lt; 92%</li>
                                    <li>TD Sistolik &lt; 70 atau &ge; 160 mmHg</li>
                                    <li>Nadi &le; 40 atau &ge; 130 x/menit</li>
                                    <li>Penurunan kesadaran (respon nyeri / tidak respon)</li>
                                    <li>Produksi urin &lt; 10 ml/jam</li>
                                    <li>Perdarahan masif</li>
                                    <li>Nyeri hebat tidak tertahankan</li>
                                    <li>Lochea/perdarahan abnormal berat</li>
                                    <li>Proteinuria +++</li>
                                </ul>
                                <div class="red-alert-box" style="margin-top: 1px;">
                                    ! SATU PARAMETER MERAH = WAJIB EVALUASI DOKTER
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table>
            <tr class="bg-navy">
                <td colspan="2" class="text-center">OBSERVASI SERIAL</td>
            </tr>
            <tr>
                <td width="25%" class="font-bold">Tanggal / Jam</td>
                <td class="text-center"><?= $tgl_str . ' / ' . $jam_str ?> WIB</td>
            </tr>
            <tr>
                <td class="font-bold">Skor Total</td>
                <td class="text-center font-bold"><?= $row->total_ews ?? '0' ?></td>
            </tr>
            <tr>
                <td class="font-bold">Nama Staff</td>
                <!-- Mengambil nama staff dari JOIN tabel staff -->
                <td class="text-center font-bold"><?= $row->nama_staff ?? '-' ?></td>
            </tr>
        </table>

        <table>
            <tr>
                <td width="54%" style="vertical-align: top; font-size: 7.5px;">
                    <b>CATATAN PENTING:</b><br>
                    &bull; Nilai berdasarkan kondisi pasien saat ini.<br>
                    &bull; Ulangi observasi sesuai instruksi zona.<br>
                    &bull; Dokumentasikan setiap perubahan kondisi dan tindakan yang diberikan.
                </td>

                <!-- TTD STAFF -->
                <td width="23%" class="text-center" style="vertical-align: top; font-size: 7.5px;">
                    Diberitahukan oleh:<br>
                    Perawat/Bidan Tanggung Jawab<br>
                    <div style="height: 45px; margin: 3px 0;">
                        <?php
                        $ttd_staff = $row->ttd_staff ?? null;
                        if (!empty($ttd_staff)):
                        ?>
                            <!-- Sesuaikan folder tempat menyimpan gambar qr_code staff -->
                            <img src="<?= base_url('assets/ttd/' . $ttd_staff); ?>" width="100px" style="max-height: 45px; object-fit: contain;">
                        <?php else: ?>
                            <br><br>
                        <?php endif; ?>
                    </div>
                    ( <?= $row->nama_staff ?? '...........................................' ?> )
                </td>

                <!-- TTD DOKTER (FOTO DOKTER) -->
                <td width="23%" class="text-center" style="vertical-align: top; font-size: 7.5px;">
                    Mengetahui:<br>
                    DPJP / Dokter<br>
                    <div style="height: 45px; margin: 3px 0;">
                        <?php
                        $ttd_dokter = $row->ttd_dokter ?? null;
                        if (!empty($ttd_dokter)):
                        ?>
                            <img src="<?= base_url('assets/ttd/' . $ttd_dokter); ?>" width="100px" style="max-height: 45px; object-fit: contain;">
                        <?php else: ?>
                            <br><br>
                        <?php endif; ?>
                    </div>
                    ( <?= $row->nama_dokter ?? $dpjp ?? '...........................................' ?> )
                </td>
            </tr>
        </table>
    </div>

    <script>
        window.onload = function() {
            setTimeout(function() {
                window.print();
            }, 300);
        };
    </script>
</body>

</html>