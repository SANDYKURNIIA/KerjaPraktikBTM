<!DOCTYPE html>
<html>

<head>
    <title>Print out</title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
    <style>
        .table1 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid;
            width: 100%;
            font-size: 12px;
        }

        .table1 th,
        .table1 td {
            border: 1px solid;
            padding: 4px;
            vertical-align: top;
        }

        .italic-text {
            font-style: italic;
        }
        @media print {
            body {
                margin: 10px;
            }

            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="content">
        <img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" style="width: 150px;">

        <table class="table1">
            <tr>
                <td align="center" width="30%">
                    <b>
                        <p>CATATAN PERKEMBANGAN</p>
                        <p>PASIEN</p>
                        <p>(TERINTEGRASI)</p>
                    </b>
                </td>
                <td>
                    <p>Nama Pasien: <?= $data[0]->nama ?> </p>
                    <p>No. RM: <?= $data[0]->no_rm ?> </p>
                    <p>Jenis Kelamin: <?= $data[0]->jenis_kelamin ?> </p>
                    <p>Nama DPJP: <?= $data[0]->nama_dokter ?> </p>
                </td>
            </tr>
        </table>

        <table class="table1">
            <thead>
                <tr>
                    <th width="10%">Tgl / Pukul</th>
                    <th width="20%">Dokter, Nakes Lain(Perawat/ Bidan / Nutrisionis / Farmasi)</th>
                    <th>Hasil Pemeriksaan, Analisis, Perencanaan (SOAP)</th>
                    <th width="15%">Instruksi</th>
                    <th width="10%">Staff</th>
                    <th width="15%">tanda tangan<p>DPJP</p></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td align="center">
                            <?= date('d-m-Y', strtotime($row->tanggal)) ?><br>
                            <?= $row->mulai_pukul ?>
                        </td>
                        <td align="center"><?= $row->nama_dokter ?></td>
                        <td>
                            <p><b>S:</b> <?= $row->S ?></p>
                            <p><b>O:</b> <?= $row->O ?></p>
                            <p><b>A:</b> <?= $row->A ?></p>
                            <p><b>P:</b> <?= $row->P ?></p>
                        </td>
                        <td align="center"><?= $row->instruksi ?></td>
                        <td align="center"><?= $row->nama_staff ?></td>
                        <td align="center">
                            <?php if (!empty($row->ttd)): ?>
                                <img src="<?= base_url('assets/ttd/' . $row->ttd); ?>" alt="TTD" width="100px">
                            <?php else: ?>
                                <p style="font-size:12px; color:gray;">tanda tangan belum tersedia</p>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <br>
        <p align="center"><b class="italic-text">MITRA TERPERCAYA LAYANAN KESEHATAN KELUARGA DAN MASYARAKAT</b></p>
    </div>

    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            window.print();
        });
        window.onafterprint = function() {
            window.history.back();
        };
    </script>
</body>
</html>