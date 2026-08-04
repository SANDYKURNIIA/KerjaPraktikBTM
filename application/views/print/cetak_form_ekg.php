<?php

/** @var string $id_pelayanan */
/** @var string $id_history */
/** @var object $selectPasien */
/** @var object $list_penolong */
/** @var object $dokter */
/** @var object $ruangan */
/** @var object $ruangan_pasien */
/** @var object $url_back */
/** @var object $pasien */
/** @var object $ekg */

?>

<!DOCTYPE html>
<html>

<head>
    <title>Cetak EKG</title>
    <style>
        @page {
            size: A4;
            margin: 5px;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 5px;
        }

        .container {
            width: 210mm;
            height: 297mm;
            margin: auto;
            border: 1px solid #000;
            padding: 10px;
            box-sizing: border-box;
        }

        .title {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin: 20px 0;
        }

        .section {
            margin-bottom: 15px;
        }

        .row {
            display: flex;
            align-items: center;
            margin: 30px 0;
        }

        .row1 {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }

        .label {
            width: 200px;
            margin-left: 50px;
        }

        .option {
            display: inline-flex;
            align-items: center;
            margin: 0 20px;
        }

        .option1 {
            display: inline-flex;
            align-items: center;
            margin: 0 30px;
        }

        .option2 {
            display: inline-flex;
            align-items: center;
            margin: 0 10px;
        }

        .checkbox {
            width: 14px;
            height: 14px;
            border: 1px solid black;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 6px;
            font-size: 12px;
        }

        .checked::after {
            content: "✓";
            font-weight: bold;
        }

        .dotline1 {
            border-bottom: 1px dotted black;
            min-width: 250px;
            margin-left: 10px;
            display: inline-block;
        }

        .dotline2 {
            border-bottom: 1px dotted black;
            min-width: 288px;
            margin-left: 10px;
            display: inline-block;
        }

        .dotline3 {
            border-bottom: 1px dotted black;
            min-width: 215px;
            margin-left: 10px;
            display: inline-block;
        }

        .dotline4 {
            border-bottom: 1px dotted black;
            min-width: 287px;
            margin-left: 10px;
            display: inline-block;
        }

        .dotline5 {
            border-bottom: 1px dotted black;
            display: inline-block;
            min-width: 400px;
            margin-left: 20px;
            /* 🔥 ini jarak kiri yang lu mau */
        }

        .double-line {
            border-top: 3px double black;
            margin: 15px 0;
        }

        .footer {
            margin: 80px 40px;
            text-align: right;
        }

        .ttd {
            margin-top: 100px;
        }

        .grid-2 {
            display: flex;
            flex-wrap: wrap;
        }

        .grid-2 .item {
            width: 50%;
            /* 🔥 ini bikin 2 kolom */
            margin-bottom: 10px;
            display: flex;
        }

        .label1 {
            width: 120px;
            margin-left: 50px;
        }

        .value {
            margin-left: 10px;
        }

        .title-ekg {
            text-align: center;
            font-family: Arial, sans-serif;
            font-weight: bold;
            font-size: 20px;
            margin: 50px 0;
        }
    </style>
</head>

<body>

    <div class="container">
        <td width="65%">
            <table style="margin-bottom: 15px; margin-top: 20px; margin-left: 20px;">
                <tr>
                    <td width="90" style="vertical-align: middle;">
                        <img src="<?= base_url('assets/dist/img/rsbt_ihc.png') ?>"
                            alt="Logo RSBT"
                            style="width:150px; margin-top: 10px; margin-right: 30px;">
                    </td>
                    <td>
                        <strong style="font-size:16px;">IHC</strong><br>
                        <strong style="font-size:16px;">RUMAH SAKIT BAKTI TIMAH PANGKALPINANG</strong><br>
                        <span style="font-size:13px;">
                            Jalan Jendral Sudirman No. 3, Sungailiat <br>
                            Prov. Kepulauan Bangka Belitung, Indonesia 33211 <br>
                            Telepon: +62 (717) 95837, Fax: +62 (717) 93335
                        </span>
                    </td>
                </tr>
            </table>
        </td>

        <div class="title-ekg">INTERPRETASI EKG</div>

        <div class="section grid-2">

            <div class="item">
                <span class="label1">Nama</span>:
                <span class="value"><?= $pasien->nama ?></span>
            </div>

            <div class="item">
                <span class="label1">Tgl Lahir</span>:
                <span class="value"><?= $pasien->tgl_lahir ?></span>
            </div>

            <div class="item">
                <span class="label1">No RM</span>:
                <span class="value"><?= $pasien->no_rm ?></span>
            </div>

            <div class="item">
                <span class="label1">Tgl Pemeriksaan</span>:
                <span class="value"><?= date('d-m-Y H:i', strtotime($ekg->tanggal_pemeriksaan)) ?></span>
            </div>

        </div>

        <div class="double-line"></div>

        <?php
        function split_val($text)
        {
            $val = '';
            $ket = '';

            if (!empty($text)) {
                $split = explode(',', $text);
                $val = trim($split[0]);
                if (count($split) > 1) {
                    $ket = trim($split[1]);
                }
            }

            return [$val, $ket];
        }

        list($pr_val, $pr_ket) = split_val($ekg->pr_interval);
        list($qrs_val, $qrs_ket) = split_val($ekg->kompleks_qrs);
        list($q_val, $q_ket) = split_val($ekg->q_pathologis);
        list($st_val, $st_ket) = split_val($ekg->st_segmen);
        list($t_val, $t_ket) = split_val($ekg->t_inverted);
        ?>

        <div class="section">

            <!-- IRAMA -->
            <div class="row">
                <div class="label">IRAMA</div>:
                <div class="option">
                    <div class="checkbox <?= ($ekg->irama == 'Teratur') ? 'checked' : '' ?>"></div> Teratur
                </div>
                <div class="option1">
                    <div class="checkbox <?= ($ekg->irama == 'Tidak Teratur') ? 'checked' : '' ?>"></div> Tidak Teratur
                </div>
            </div>

            <!-- GELOMBANG P -->
            <div class="row">
                <div class="label">GELOMBANG P</div>:
                <div class="option">
                    <div class="checkbox <?= ($ekg->gelombang_p == 'Normal') ? 'checked' : '' ?>"></div> Normal
                </div>
                <div class="option1">
                    <div class="checkbox <?= ($ekg->gelombang_p == 'Pulmonal') ? 'checked' : '' ?>"></div> Pulmonal
                </div>
                <div class="option">
                    <div class="checkbox <?= ($ekg->gelombang_p == 'Mitral') ? 'checked' : '' ?>"></div> Mitral
                </div>
            </div>

            <!-- PR INTERVAL -->
            <div class="row">
                <div class="label">PR INTERVAL</div>:
                <div class="option">
                    <div class="checkbox <?= ($pr_val == 'Normal') ? 'checked' : '' ?>"></div> Normal
                </div>
                <div class="option1">
                    <div class="checkbox <?= ($pr_val == 'Abnormal') ? 'checked' : '' ?>"></div> Abnormal
                    <?php if ($pr_val == 'Abnormal'): ?>
                        <span class="dotline1"><?= $pr_ket ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <!-- QRS -->
            <div class="row">
                <div class="label">KOMPLEKS QRS</div>:
                <div class="option">
                    <div class="checkbox <?= ($qrs_val == 'Normal') ? 'checked' : '' ?>"></div> Normal
                </div>
                <div class="option1">
                    <div class="checkbox <?= ($qrs_val == 'Abnormal') ? 'checked' : '' ?>"></div> Abnormal
                    <?php if ($qrs_val == 'Abnormal'): ?>
                        <span class="dotline1"><?= $qrs_ket ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Q PATHOLOGIS -->
            <div class="row">
                <div class="label">Q PATHOLOGIS</div>:
                <div class="option">
                    <div class="checkbox <?= ($q_val == 'Tidak Ada') ? 'checked' : '' ?>"></div> Tidak Ada
                </div>
                <div class="option2">
                    <div class="checkbox <?= ($q_val == 'Ada') ? 'checked' : '' ?>"></div> Ada
                    <?php if ($q_val == 'Ada'): ?>
                        <span class="dotline2"><?= $q_ket ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <!-- ST SEGMENT -->
            <div class="row">
                <div class="label">ST SEGMEN</div>:
                <div class="option">
                    <div class="checkbox <?= ($st_val == 'Isoelektris') ? 'checked' : '' ?>"></div> Isoelektris
                </div>
                <div class="option2">
                    <div class="checkbox <?= ($st_val == 'Elevasi/Depresi') ? 'checked' : '' ?>"></div> Elevasi/Depresi
                    <?php if ($st_val == 'Elevasi/Depresi'): ?>
                        <span class="dotline3"><?= $st_ket ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <!-- T INVERTED -->
            <div class="row">
                <div class="label">T INVERTED</div>:
                <div class="option">
                    <div class="checkbox <?= ($t_val == 'Tidak Ada') ? 'checked' : '' ?>"></div> Tidak Ada
                </div>
                <div class="option2">
                    <div class="checkbox <?= ($t_val == 'Ada') ? 'checked' : '' ?>"></div> Ada
                    <?php if ($t_val == 'Ada'): ?>
                        <span class="dotline4"><?= $t_ket ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <!-- KESIMPULAN -->
            <div class="row" style="margin-top:20px;">
                <div class="label">KESIMPULAN</div>:
                <span class="dotline5"><?= $ekg->kesimpulan ?></span>
            </div>

        </div>

        <div class="footer">
            Sungailiat, <?= date('d-m-Y') ?><br><br>
            DOKTER PEMERIKSA

            <div style="height:20px;">
                <img src="<?= base_url('assets/ttd/' . $pasien->foto_dokter) ?>" width="120">
            </div>

            <div class="ttd">
                <?= isset($pasien->nama_dokter) ? $pasien->nama_dokter : 'dr. __________________' ?>
            </div>
        </div>

</body>

</html>

<script>
    window.print();

    window.onafterprint = function() {
        window.close();
    }
</script>