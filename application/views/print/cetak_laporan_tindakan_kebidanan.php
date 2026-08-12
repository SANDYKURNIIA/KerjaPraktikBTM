<!DOCTYPE html>
<html>

<head>
    <title>Cetak Laporan Kebidanan</title>
    <style>
        @page {
            size: A4;
            margin: 10mm;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
        }

        .container {
            width: 210mm;
            height: 297mm;
            margin: auto;
            border: 1px solid #000;
            padding: 10px;
            box-sizing: border-box;
        }

        .box {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
            border: 1px solid #ffffff;
        }

        .box td {
            border: 1px solid #000;
            padding: 5px;
            vertical-align: top;
        }

        /* 🔥 INI KUNCI BIAR MIRIP FORM */
        .box-tinggi {
            height: 50px;
            /* lu bisa adjust */
        }

        .judul {
            font-weight: bold;
        }

        .text-right {
            text-align: right;
        }

        .box-no-inner {
            border: 1px solid #000;
            /* garis luar */
        }

        .box-no-inner td {
            border: 1px solid #fff;
            /* garis dalam jadi putih */
        }

        .box.box-no-inner td {
            border-top: none;
            border-bottom: none;
            border-left: none;
            border-right: none;
        }

        /* 🔥 kembalikan garis LUAR */
        .box.box-no-inner tr:first-child td {
            border-top: 1px solid #000;
        }

        .box.box-no-inner tr:last-child td {
            border-bottom: 1px solid #000;
        }

        .box.box-no-inner td:first-child {
            border-left: 1px solid #000;
        }

        .box.box-no-inner td:last-child {
            border-right: 1px solid #000;
        }

        /* jarak atas (baris pertama) */
        .box.box-no-inner tr:first-child td {
            padding-top: 12px;
        }

        /* jarak bawah (baris terakhir) */
        .box.box-no-inner tr:last-child td {
            padding-bottom: 12px;
        }
    </style>
</head>

<body>

    <div class="container">
        <td width="65%">
            <table style="margin-bottom: 40px;">
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

        <div class="header" style="margin-bottom: 10px;">
            <b>BAGIAN KEBIDANAN DAN PENY KANDUNGAN</b>
        </div>

        <table class="box box-tinggi">
            <tr>
                <td width="20%">
                    <div style="margin-bottom: 8px; margin-top: 8px;">
                        <b>LAPORAN TINDAKAN PERSALINAN</b>
                    </div>
                </td>
                <td width="50%">
                    <div style="margin-bottom: 8px; margin-top: 8px;">
                        Nama : <?= isset($pasien->nama) ? $pasien->nama : '-' ?><br>
                        Alamat : <?= isset($pasien->nama) ? $pasien->alamat : '-' ?>
                </td>
                <td width="50%">
                    <div style="margin-bottom: 8px; margin-top: 8px;">
                        No. RM :<?= isset($pasien->no_rm) ? $pasien->no_rm : '-' ?><br>
                        Tgl. Lahir : <?= isset($pasien->tgl_lahir)
                                            ? date('d-m-Y', strtotime($pasien->tgl_lahir))
                                            : '-' ?>
                </td>
            </tr>
        </table>

        <table width="100%" class="box box-no-inner">
            <tr>
                <td width="20%">Jenis Persalinan</td>
                <td>: <?= isset($data->jenis_persalinan) ? $data->jenis_persalinan : '-' ?></td>
            </tr>
            <tr>
                <td>Penolong</td>
                <td>: <?= isset($data->penolong) ? $data->penolong : '-' ?></td>
            </tr>
            <tr>
                <td>Asisten</td>
                <td>: <?= isset($data->asisten) ? $data->asisten : '-' ?></td>
            </tr>
        </table>

        <table width="100%" class="box">
            <tr>
                <td width="20%"><b>Tanggal / Jam</b></td>
                <td><b>Jalannya Persalinan / Tindakan</b></td>
            </tr>
            <tr>
                <td style="height: 740px;">
                    <?= isset($data->tanggal)
                        ? date('d-m-Y H:i', strtotime($data->tanggal))
                        : '-' ?>
                </td>
                <td>
                    <?= isset($data->jalannya_persalinan) ? $data->jalannya_persalinan : '-' ?>
                </td>
            </tr>
        </table>

        <br><br>

      <!---  <table width="100%" class="no-border">
            <div style="margin-top: 50px;"></div>
            <tr>
                <td width="70%"></td>
                <td class="text-right">
                    Pangkalpinang, <?= date('d F Y', strtotime($laporan->tanggal_input ?? date('Y-m-d'))) ?> <div style="height: 100px;"></div>
                    ( _____________________ )
                </td>
            </tr>
        </table>

    </div>

</body>

</html>

<script>
    window.onload = function() {
        window.print();
    }
</script>