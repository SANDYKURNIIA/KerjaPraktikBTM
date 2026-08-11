<!DOCTYPE html>
<html>

<head>
    <title>Cetak Formulir Robson</title>
    <style>
        @page {
            size: A4;
            margin: 10mm;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 11px;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            border: 1px solid #000;
            padding: 10px;
            margin: 0 auto;
        }

        .box {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
            page-break-inside: avoid;
            break-inside: avoid;
        }

        .box td,
        .box th {
            border: 1px solid #000;
            padding: 4px 6px;
            vertical-align: top;
        }

        .judul {
            font-weight: bold;
            background-color: #f5f5f5;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .box-no-inner {
            border: 1px solid #000;
        }

        .box-no-inner td {
            border: none;
            padding: 4px 6px;
        }

        .tbl-kriteria th {
            background: #eeeeee;
            text-align: center;
        }

        .tbl-kriteria td.ket {
            font-size: 10.5px;
        }

        .tbl-kriteria td.chk {
            font-size: 13px;
            font-weight: bold;
        }

        .section-kesimpulan {
            margin-top: 15px;
            page-break-inside: avoid;
            break-inside: avoid;
        }

        .ttd-container {
            margin-top: 20px;
            page-break-inside: avoid;
            break-inside: avoid;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Kop Surat -->
        <table width="100%" style="margin-bottom: 15px;">
            <tr>
                <td width="110" style="vertical-align: middle; border: none;">
                    <img src="<?= base_url('assets/dist/img/rsbt_ihc.png') ?>" alt="Logo RSBT" style="width:100px;">
                </td>
                <td style="border: none;">
                    <strong style="font-size:15px;">IHC</strong><br>
                    <strong style="font-size:15px;">RUMAH SAKIT BAKTI TIMAH PANGKALPINANG</strong><br>
                    <span style="font-size:11px;">
                        Jalan Jendral Sudirman No. 3, Sungailiat <br>
                        Prov. Kepulauan Bangka Belitung, Indonesia 33211 <br>
                        Telepon: +62 (717) 95837, Fax: +62 (717) 93335
                    </span>
                </td>
            </tr>
        </table>

        <div style="margin-bottom: 8px; font-weight: bold;">
            CHECKLIST PENILAIAN SECTIO CAESAREA ()
        </div>

        <!-- Header Identitas Pasien -->
        <table class="box">
            <tr>
                <td width="30%">
                    <div style="margin: 4px 0;">
                        <b>FORMULIR KLASIFIKASI ROBSON</b>
                    </div>
                </td>
                <td width="35%">
                    <div style="margin: 4px 0;">
                        Nama : <?= isset($pasien->nama) ? $pasien->nama : '-' ?><br>
                        Jenis Kelamin : <?= isset($pasien->jenis_kelamin) ? $pasien->jenis_kelamin : '-' ?>
                    </div>
                </td>
                <td width="35%">
                    <div style="margin: 4px 0;">
                        No. RM : <?= isset($pasien->no_rm) ? $pasien->no_rm : '-' ?><br>
                        Tgl. Lahir :
                        <?= isset($pasien->tgl_lahir) ? date('d-m-Y', strtotime($pasien->tgl_lahir)) : '-' ?>
                    </div>
                </td>
            </tr>
        </table>

        <!-- Tanggal Masuk & DPJP -->
        <table width="100%" class="box box-no-inner">
            <tr>
                <td width="25%">Tanggal Masuk</td>
                <td>: <?= isset($pasien->tgl_masuk) ? date('d-m-Y', strtotime($pasien->tgl_masuk)) : '-' ?></td>
            </tr>
            <tr>
                <td>DPJP</td>
                <td>: <?= isset($pasien->nama_dokter) ? $pasien->nama_dokter : '-' ?></td>
            </tr>
        </table>

        <!-- A. Identitas Pasien -->
        <table width="100%" class="box">
            <tr>
                <td colspan="4" class="judul">A. IDENTITAS PASIEN</td>
            </tr>
            <tr>
                <td width="25%">Gravida / Paritas / Abortus (GPA)</td>
                <td width="25%">
                    G = <?= isset($robson['gravida']) && $robson['gravida'] !== '' ? $robson['gravida'] : '-' ?>
                </td>
                <td width="25%">
                    P = <?= isset($robson['paritas']) && $robson['paritas'] !== '' ? $robson['paritas'] : '-' ?>
                </td>
                <td width="25%">
                    A = <?= isset($robson['abortus']) && $robson['abortus'] !== '' ? $robson['abortus'] : '-' ?>
                </td>
            </tr>
            <tr>
                <td>Usia Kehamilan: </td>
                <td>
                    <?= isset($robson['usia_kehamilan']) && $robson['usia_kehamilan'] !== '' ? $robson['usia_kehamilan'] . ' minggu' : '-' ?>
                </td>
                <td>Jumlah/Letak Janin: </td>
                <td><?= isset($robson['letak_janin']) ? $robson['letak_janin'] : '-' ?></td>
            </tr>
            <tr>
                <td>Riwayat SC Sebelumnya: </td>
                <td><?= isset($robson['riwayat_sc_sebelumnya']) ? $robson['riwayat_sc_sebelumnya'] : '-' ?></td>
                <td>Tanggal Tindakan: </td>
                <td>
                    <?= isset($robson['tanggal_tindakan']) && $robson['tanggal_tindakan'] != ''
                        ? date('d-m-Y', strtotime($robson['tanggal_tindakan']))
                        : '-' ?>
                </td>
            </tr>
            <tr>
                <td>Indikasi Medis SC Saat Ini: </td>
                <td colspan="3"><?= isset($robson['indikasi_medis_sc']) ? $robson['indikasi_medis_sc'] : '-' ?></td>
            </tr>
            <tr>
                <td>DPJP Operator: </td>
                <td colspan="3"><?= isset($robson['dpjp_operator']) ? $robson['dpjp_operator'] : '-' ?></td>
            </tr>
        </table>

        <!-- B. Klasifikasi Robson -->
        <table width="100%" class="box tbl-kriteria">
            <tr>
                <th colspan="5">B. KLASIFIKASI ROBSON GROUP</th>
            </tr>
            <tr>
                <th width="6%">No</th>
                <th width="48%">Kriteria</th>
                <th width="8%">Ya</th>
                <th width="8%">Tidak</th>
                <th width="30%">Keterangan</th>
            </tr>
            <?php
            $robson_groups = [
                1 => 'Nullipara, tunggal, cephalic, ≥37 mg, persalinan spontan',
                2 => 'Nullipara, tunggal, cephalic, ≥37 mg, induksi atau SC sebelum persalinan',
                3 => 'Multipara tanpa luka uterus, tunggal, cephalic, ≥37 mg, persalinan spontan',
                4 => 'Multipara tanpa luka uterus, tunggal, cephalic, ≥37 mg, induksi/SC sebelum persalinan',
                5 => 'Multipara dengan luka uterus sebelumnya, tunggal, cephalic, ≥37 mg',
                6 => 'Nullipara, tunggal, sungsang',
                7 => 'Multipara, tunggal, sungsang (termasuk bekas SC)',
                8 => 'Semua kehamilan ganda (kembar), termasuk dengan bekas SC',
                9 => 'Semua kehamilan tunggal, posisi lintang/oblique (termasuk bekas SC)',
                10 => 'Semua wanita dengan kehamilan tunggal cephalic, <37 mg (termasuk bekas SC)',
            ];
            for ($i = 1; $i <= 10; $i++):
                $val_b = isset($robson['b' . $i . '_ya']) ? $robson['b' . $i . '_ya'] : '';
                ?>
                <tr>
                    <td class="text-center"><?= $i ?></td>
                    <td class="ket"><?= $robson_groups[$i] ?></td>
                    <td class="text-center chk"><?= $val_b === 'Ya' ? '&#10003;' : '' ?></td>
                    <td class="text-center chk"><?= $val_b === 'Tidak' ? '&#10003;' : '' ?></td>
                    <td class="ket">
                        <?= isset($robson['b' . $i . '_keterangan']) && $robson['b' . $i . '_keterangan'] !== '' ? $robson['b' . $i . '_keterangan'] : '-' ?>
                    </td>
                </tr>
            <?php endfor; ?>
        </table>

        <!-- C. Indikasi SC -->
        <table width="100%" class="box tbl-kriteria">
            <tr>
                <th colspan="5">C. INDIKASI SC Lainnya</th>
            </tr>
            <tr>
                <th width="6%">No</th>
                <th width="48%">Indikasi</th>
                <th width="8%">Ya</th>
                <th width="8%">Tidak</th>
                <th width="30%">Keterangan</th>
            </tr>
            <?php
            $sc_indications = [
                1 => 'Pecah Ketuban > 24 jam',
                2 => 'Post SC (bukan indikasi tunggal, pertimbangkan persalinan spontan)',
                3 => 'Plasenta previa / abruptio',
                4 => 'Fetal distress (DJJ abnormal, gawat janin)',
                5 => 'Disproporsi sefalopelvik',
                6 => 'Kelainan letak (sungsang/lintang)',
                7 => 'Preeklampsia / eklampsia',
                8 => 'Kehamilan kembar',
                9 => 'Ketuban pecah dini dengan gawat janin',
                10 => 'Indikasi lain (sebutkan)',
            ];
            for ($i = 1; $i <= 10; $i++):
                $val_c = isset($robson['c' . $i . '_ya']) ? $robson['c' . $i . '_ya'] : '';
                ?>
                <tr>
                    <td class="text-center"><?= $i ?></td>
                    <td class="ket"><?= $sc_indications[$i] ?></td>
                    <td class="text-center chk"><?= $val_c === 'Ya' ? '&#10003;' : '' ?></td>
                    <td class="text-center chk"><?= $val_c === 'Tidak' ? '&#10003;' : '' ?></td>
                    <td class="ket">
                        <?= isset($robson['c' . $i . '_keterangan']) && $robson['c' . $i . '_keterangan'] !== '' ? $robson['c' . $i . '_keterangan'] : '-' ?>
                    </td>
                </tr>
            <?php endfor; ?>
        </table>

        <!-- D. Kesimpulan -->
        <div class="section-kesimpulan">
            <table width="100%" class="box box-no-inner">
                <tr>
                    <td colspan="2" class="judul">D. KESIMPULAN</td>
                </tr>
                <tr>
                    <td width="25%">Kelompok Robson</td>
                    <td>: <?= isset($robson['kelompok_robson']) ? $robson['kelompok_robson'] : '-' ?></td>
                </tr>
                <tr>
                    <td>Indikasi SC</td>
                    <td>: <?= isset($robson['indikasi_sc']) ? $robson['indikasi_sc'] : '-' ?></td>
                </tr>
                <tr>
                    <td>Catatan Tambahan</td>
                    <td>: <?= isset($robson['catatan_tambahan']) ? $robson['catatan_tambahan'] : '-' ?></td>
                </tr>
            </table>
        </div>

        <!-- Tanda Tangan -->
        <div class="ttd-container">
            <table width="100%" style="border: none;">
                <tr>
                    <td width="60%" style="border: none;"></td>
                    <td class="text-right" style="border: none;">
                        Pangkalpinang, <?= date('d F Y') ?>
                        <div style="height: 70px;"></div>
                        ( _____________________ )
                    </td>
                </tr>
            </table>
        </div>

    </div>

</body>

</html>

<script>
    window.onload = function () {
        window.print();
    }
</script>