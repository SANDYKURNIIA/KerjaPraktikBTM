<<<<<<< HEAD
<!DOCTYPE html>
<html>

<head>
    <title>Print out <?= $page_title ?></title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css">
</head>

<body>
    <table width=100% class="table1" cellspacing=0>
        <tr>
            <td width="220" class=gariskanan>
            <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 150px;">
            </td>

            <td class=gariskanan>
                    <p><b>RS. Bakti Timah</b></p>
					<p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
					<p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
					<p>Telp. 0717 9100844, Fax. 0715 32165</p>
            </td>

            <td class=gariskanan>
                <p>No. RM : <?= $data->no_rm ?></p>
                <p>Nama : <?= $data->nama ?></p>
                <p>Jenis Kelamin : <?= $data->jenis_kelamin ?></p>
                <p>Tgl Lahir : <?= date('d-M-Y', strtotime($data->tgl_lahir)) ?></p>

            </td>


        </tr>
    </table>
    <table style="width: 100%">
        <tr>
            <td colspan="16">
                <center><br>
                    <h2><b>PENGAWASAN KHUSUS</b></h2>
                </center>
            </td>
        </tr>

    </table>
    <table style="width: 100%" border="1">
        <tbody>

            <tr>
                <td rowspan="3">Tgl dan Jam</td>
                <td colspan="6" align="center">Observasi</td>
                <td colspan="7" align="center">Keseimbangan cairan</td>
                <td rowspan="3">
                    <center>Keterangan</center>
                </td>
                <td rowspan="3">
                    <center>TTD & Nama Jelas</center>
                </td>
            </tr>

            <tr>
                <td rowspan="2">
                    <center>Kesadaran</center>
                </td>
                <td rowspan="2">
                    <center>Tensi</center>
                </td>
                <td rowspan="2">
                    <center>Nadi</center>
                </td>
                <td rowspan="2">
                    <center>Pernapasan</center>
                </td>
                <td rowspan="2">
                    <center>Suhu</center>
                </td>
                <td rowspan="2">
                    <center>Skala Nyeri</center>
                </td>
                <td colspan="3">
                    <center>Masuk</center>
                </td>
                <td colspan="4">
                    <center>Keluar</center>
                </td>
            </tr>

            <tr>
                <td height="20" width="20">Oral</td>
                <td>
                    <center>Infus</center>
                </td>
                <td>
                    <center>Jumlah</center>
                </td>
                <td>
                    <center>Urin</center>
                </td>
                <td>
                    <center>Muntah</center>
                </td>
                <td>
                    <center>Drainage/BAB</center>
                </td>
                <td>
                    <center>Jumlah</center>
                </td>
            </tr>

            <?php
            if (count($db) > 0) {
                foreach ($db as $row) { ?>
                    <tr>
                        <td height="20" width="20"><?= $row->tanggal ?></td>
                        <td height="20" width="20"><?= $row->kesadaran ?></td>
                        <td height="20" width="20"><?= $row->tensi ?></td>
                        <td height="20" width="20"><?= $row->nadi ?></td>
                        <td height="20" width="20"><?= $row->nafas ?></td>
                        <td height="20" width="20"><?= $row->suhu ?></td>
                        <td height="20" width="20"><?= $row->nyeri ?></td>
                        <td height="20" width="20"><?= $row->oral ?></td>
                        <td height="20" width="20"><?= $row->infus ?></td>
                        <td height="20" width="20"><?= $row->jumlah_masuk ?></td>
                        <td height="20" width="20"><?= $row->urin ?></td>
                        <td height="20" width="20"><?= $row->muntah ?></td>
                        <td height="20" width="20"><?= $row->bab ?></td>
                        <td height="20" width="20"><?= $row->jumlah_keluar ?></td>
                        <td height="20" width="20"><?= $row->keterangan ?></td>
                        <td height="20" width="20"></td>
                    </tr>

                <?php }
            } else { ?>

                <tr width="90">
                    <td colspan="15" class=gariskanan>
                        <center>Tidak ada data</center>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
    <table style="width: 100%">
        <tr>
            <td width="1200px"></td><br><br><br>
            <td>RSBT_RM/097/XII/A/2016</td>
        </tr>
    </table>

    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            window.print();
        });
        window.onafterprint = function(e) {
            closePrintView();
        };

        function closePrintView() {
            window.location.href = 'javascript:history.go(-1)';
        }
    </script>
</body>

=======
<!DOCTYPE html>
<html>

<head>
    <title>Print out <?= $page_title ?></title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css">
</head>

<body>
    <table width=100% class="table1" cellspacing=0>
        <tr>
            <td width="220" class=gariskanan>
            <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 150px;">
            </td>

            <td class=gariskanan>
                    <p><b>RS. Bakti Timah</b></p>
					<p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
					<p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
					<p>Telp. 0717 9100844, Fax. 0715 32165</p>
            </td>

            <td class=gariskanan>
                <p>No. RM : <?= $data->no_rm ?></p>
                <p>Nama : <?= $data->nama ?></p>
                <p>Jenis Kelamin : <?= $data->jenis_kelamin ?></p>
                <p>Tgl Lahir : <?= date('d-M-Y', strtotime($data->tgl_lahir)) ?></p>

            </td>


        </tr>
    </table>
    <table style="width: 100%">
        <tr>
            <td colspan="16">
                <center><br>
                    <h2><b>PENGAWASAN KHUSUS</b></h2>
                </center>
            </td>
        </tr>

    </table>
    <table style="width: 100%" border="1">
        <tbody>

            <tr>
                <td rowspan="3">Tgl dan Jam</td>
                <td colspan="6" align="center">Observasi</td>
                <td colspan="7" align="center">Keseimbangan cairan</td>
                <td rowspan="3">
                    <center>Keterangan</center>
                </td>
                <td rowspan="3">
                    <center>TTD & Nama Jelas</center>
                </td>
            </tr>

            <tr>
                <td rowspan="2">
                    <center>Kesadaran</center>
                </td>
                <td rowspan="2">
                    <center>Tensi</center>
                </td>
                <td rowspan="2">
                    <center>Nadi</center>
                </td>
                <td rowspan="2">
                    <center>Pernapasan</center>
                </td>
                <td rowspan="2">
                    <center>Suhu</center>
                </td>
                <td rowspan="2">
                    <center>Skala Nyeri</center>
                </td>
                <td colspan="3">
                    <center>Masuk</center>
                </td>
                <td colspan="4">
                    <center>Keluar</center>
                </td>
            </tr>

            <tr>
                <td height="20" width="20">Oral</td>
                <td>
                    <center>Infus</center>
                </td>
                <td>
                    <center>Jumlah</center>
                </td>
                <td>
                    <center>Urin</center>
                </td>
                <td>
                    <center>Muntah</center>
                </td>
                <td>
                    <center>Drainage/BAB</center>
                </td>
                <td>
                    <center>Jumlah</center>
                </td>
            </tr>

            <?php
            if (count($db) > 0) {
                foreach ($db as $row) { ?>
                    <tr>
                        <td height="20" width="20"><?= $row->tanggal ?></td>
                        <td height="20" width="20"><?= $row->kesadaran ?></td>
                        <td height="20" width="20"><?= $row->tensi ?></td>
                        <td height="20" width="20"><?= $row->nadi ?></td>
                        <td height="20" width="20"><?= $row->nafas ?></td>
                        <td height="20" width="20"><?= $row->suhu ?></td>
                        <td height="20" width="20"><?= $row->nyeri ?></td>
                        <td height="20" width="20"><?= $row->oral ?></td>
                        <td height="20" width="20"><?= $row->infus ?></td>
                        <td height="20" width="20"><?= $row->jumlah_masuk ?></td>
                        <td height="20" width="20"><?= $row->urin ?></td>
                        <td height="20" width="20"><?= $row->muntah ?></td>
                        <td height="20" width="20"><?= $row->bab ?></td>
                        <td height="20" width="20"><?= $row->jumlah_keluar ?></td>
                        <td height="20" width="20"><?= $row->keterangan ?></td>
                        <td height="20" width="20"></td>
                    </tr>

                <?php }
            } else { ?>

                <tr width="90">
                    <td colspan="15" class=gariskanan>
                        <center>Tidak ada data</center>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
    <table style="width: 100%">
        <tr>
            <td width="1200px"></td><br><br><br>
            <td>RSBT_RM/097/XII/A/2016</td>
        </tr>
    </table>

    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            window.print();
        });
        window.onafterprint = function(e) {
            closePrintView();
        };

        function closePrintView() {
            window.location.href = 'javascript:history.go(-1)';
        }
    </script>
</body>

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</html>