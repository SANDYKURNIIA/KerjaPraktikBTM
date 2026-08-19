<!DOCTYPE html>
<html>

<head>
    <title>Cetak Permohonan Ranap</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 14px;
        }

        .container {
            width: 800px;
            margin: auto;
        }

        .title {
            text-align: center;
            font-weight: bold;
            margin: 20px 0;
            font-size: 18px;
        }

        table {
            width: 100%;
        }

        td {
            padding: 5px;
            vertical-align: top;
        }

        .ttd {
            margin-top: 60px;
            display: flex;
            justify-content: space-between;
            text-align: center;
        }

        .ttd img {
            height: 80px;
            margin-top: 10px;
        }

        .garis {
            border-top: 1px solid #000;
            margin-top: 5px;
            margin-bottom: 5px;
            width: 200px;
            margin-left: auto;
            margin-right: auto;
        }

        .kop-rs {
            width: 100%;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .kop-rs td {
            vertical-align: top;
        }

        .box-pasien {
            border: 1px solid #000;
            border-radius: 10px;
            padding: 8px 12px;
            font-size: 12px;
            display: inline-block;
        }

        .box-pasien table td {
            padding: 2px 4px;
        }

        .box-pasien td:first-child {
            width: 110px;
        }

        .tagline {
            margin-top: 50px;
            text-align: center;
            font-family: "Brush Script MT", cursive;
            font-size: 22px;
        }

        @font-face {
            font-family: 'BRS';
            src: url('https://static.wfonts.com/data/2015/05/30/brush-script/BRS.ttf') format('truetype');
            font-display: swap;
        }

        .tagline {
            margin-top: 50px;
            text-align: center;
            font-family: 'BRS', cursive;
            font-size: 24px;
        }

        .pernyataan {
            margin-top: 40px;
            margin-bottom: 30px;
        }
    </style>

</head>

<body onload="window.print()">
    <div class="container">

        <table class="kop-rs">
            <tr>
                <td width="65%">
                    <table>
                        <tr>
                            <td width="90" style="vertical-align: middle;">
                                <img src="<?= base_url('assets/dist/img/rsbt_ihc.png') ?>"
                                    alt="Logo RSBT"
                                    style="width:150px; margin-top: 10px;">
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

                <td width="25%" align="right">
                    <div class="box-pasien">
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?= isset($pasien->nama) ? $pasien->nama : '-' ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                                <td><?= isset($pasien->tgl_lahir)
                                        ? date('d-m-Y', strtotime($pasien->tgl_lahir))
                                        : '-' ?></td>
                            </tr>
                            <tr>
                                <td>Nomor RM</td>
                                <td>:</td>
                                <td><?= isset($pasien->no_rm) ? $pasien->no_rm : '-' ?></td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>

        <div class="title" style="margin: 40px 0 40px 0;">
            FORMULIR PERMOHONAN RAWAT INAP
        </div>

        <p>Yang bertanda tangan di bawah ini :</p>

        <table>
            <tr>
                <td width="200">Nama</td>
                <td>: <?= isset($data->nama_pemohon) ? $data->nama_pemohon : '-' ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>: <?= isset($data->tgl_lahir_pemohon) ? date('d-m-Y', strtotime($data->tgl_lahir_pemohon)) : '-' ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: <?= isset($data->jenkel_pemohon) ? $data->jenkel_pemohon : '-' ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <?= isset($data->alamat_pemohon) ? $data->alamat_pemohon : '-' ?></td>
            </tr>
            <tr>
                <td>Hubungan</td>
                <td>: <?= isset($data->hubungan) ? $data->hubungan : '-' ?></td>
            </tr>
        </table>

        <br>

        <p>Mohon perawatan rawat inap atas nama :</p>

        <table>
            <tr>
                <td width="200">Nama Pasien</td>
                <td>: <?= isset($pasien->nama) ? $pasien->nama : '-' ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>: <?= isset($pasien->tgl_lahir) ? date('d-m-Y', strtotime($pasien->tgl_lahir)) : '-' ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: <?= isset($pasien->jenis_kelamin) ? $pasien->jenis_kelamin : '-' ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <?= isset($pasien->alamat) ? $pasien->alamat : '-' ?></td>
            </tr>
        </table>

        <br>

        <table>
            <tr>
                <td width="200">Diagnosa</td>
                <td>: <?= isset($data->diagnosa) ? $data->diagnosa : '-' ?></td>
            </tr>
            <tr>
                <td>Bagian</td>
                <td>: <?= isset($poli->nama_panjang) ? $poli->nama_panjang : '-' ?></td>
            </tr>
            <tr>
                <td>DPJP</td>
                <td>: <?= isset($dokter->nama) ? $dokter->nama : '-' ?></td>
            </tr>
            <tr>
                <td>Ruang Rawat</td>
                <td>:<?= isset($ruangan->tipe) ? $ruangan->tipe : '-' ?></td>
            </tr>
        </table>

        <p class="pernyataan">
            Demikian surat permohonan ini dibuat dengan sebenarnya.
        </p>

        <div class="ttd">

            <div>
                Pasien / Keluarga<br>

                <?php if (!empty($data->ttd_digital)) : ?>
                    <img src="<?= $data->ttd_digital ?>">
                <?php else: ?>
                    <div style="height: 100px;"></div>
                <?php endif; ?>

                <div style="height: 25px;"></div>
                <div class="garis"></div>
                <?= isset($data->nama_pemohon) ? $data->nama_pemohon : '-' ?>
            </div>

            <div>
                Pangkalpinang, <?= isset($data->tanggal_input) ? date('d F Y', strtotime($data->tanggal_input)) : '-' ?><br>
                Dokter yang Meminta, <br>

                <?php if (!empty($dokter->foto)) : ?>
                    <img src="<?= base_url('assets/upload/dokter/' . $dokter->foto) ?>"
                        style="height:80px;"><br>
                <?php else: ?>
                    <div style="height: 100px;"></div>
                <?php endif; ?>
                <div class="garis"></div>
                <?= isset($dokter->nama) ? $dokter->nama : '-' ?>

            </div>
        </div>

        <div class="tagline">
            Melayani dengan Sepenuh Hati
        </div>
    </div>
</body>

</html>