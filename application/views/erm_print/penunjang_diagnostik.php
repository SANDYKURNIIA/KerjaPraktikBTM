<<<<<<< HEAD
<!DOCTYPE html>
<html>

<head>
    <title>Print out <?= $page_title ?></title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="content">
        <table style="width: 100%">
            <tr>
                <td>
                <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 150px;">
                </td>
                <td>
                    <p><b>RS. Bakti Timah</b></p>
					<p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
					<p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
					<p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>
            </tr>
        </table>
        <hr>
        <h2 class="center">
            HASIL BACA PENUNJANG DIAGNOSTIK
        </h2>

        <table style="margin-left:40px" class="table1" cellspacing=0>
            <tr height=30px>
                <td width=200px>
                    Nama
                </td>
                <td>: <?= $data['pasien'] ?></td>
            </tr>
            <tr height=30px>
                <td>
                    No RM
                </td>
                <td>: <?= $data['no_rm'] ?></td>
            </tr>
            <tr height=30px>
                <td>
                    Umur / Jenis Kelamin
                </td>
                <td>: <?php
                        $tanggal = new DateTime($data['tgl_lahir']);
                        $today = new DateTime();
                        $y = $today->diff($tanggal)->y;
                        echo  $y . " tahun, " . $data['jenis_kelamin'];  ?></td>
            </tr>
            <tr height=30px>
                <td>
                    Tanggal
                </td>
                <td>: <?= $data['tanggal'] ?> </td>
            </tr>
            <tr height=30px>
                <td>
                    Pemeriksaan
                </td>
                <td>: <?= $data['periksa'] ?> </td>
            </tr>
            <tr height=30px>
                <td>
                    Nama Dokter
                </td>
                <td>: <?= $data['dpjp'] ?> </td>
            </tr>
            <tr height=30px>
                <td>
                    Keterangan
                </td>
                <td>: <?= $data['ket'] ?> </td>
            </tr>
        </table>
        <?php
        $gambar = null;
        foreach (explode(',', $data['file']) as $image) { // 1, 2, 3
            echo $gambar = "<center><img src='" . base_url() . "assets/images/" . $image . "'width='500px'></center><br>";
        }
        ?>




    </div>
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
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="content">
        <table style="width: 100%">
            <tr>
                <td>
                <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 150px;">
                </td>
                <td>
                    <p><b>RS. Bakti Timah</b></p>
					<p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
					<p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
					<p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>
            </tr>
        </table>
        <hr>
        <h2 class="center">
            HASIL BACA PENUNJANG DIAGNOSTIK
        </h2>

        <table style="margin-left:40px" class="table1" cellspacing=0>
            <tr height=30px>
                <td width=200px>
                    Nama
                </td>
                <td>: <?= $data['pasien'] ?></td>
            </tr>
            <tr height=30px>
                <td>
                    No RM
                </td>
                <td>: <?= $data['no_rm'] ?></td>
            </tr>
            <tr height=30px>
                <td>
                    Umur / Jenis Kelamin
                </td>
                <td>: <?php
                        $tanggal = new DateTime($data['tgl_lahir']);
                        $today = new DateTime();
                        $y = $today->diff($tanggal)->y;
                        echo  $y . " tahun, " . $data['jenis_kelamin'];  ?></td>
            </tr>
            <tr height=30px>
                <td>
                    Tanggal
                </td>
                <td>: <?= $data['tanggal'] ?> </td>
            </tr>
            <tr height=30px>
                <td>
                    Pemeriksaan
                </td>
                <td>: <?= $data['periksa'] ?> </td>
            </tr>
            <tr height=30px>
                <td>
                    Nama Dokter
                </td>
                <td>: <?= $data['dpjp'] ?> </td>
            </tr>
            <tr height=30px>
                <td>
                    Keterangan
                </td>
                <td>: <?= $data['ket'] ?> </td>
            </tr>
        </table>
        <?php
        $gambar = null;
        foreach (explode(',', $data['file']) as $image) { // 1, 2, 3
            echo $gambar = "<center><img src='" . base_url() . "assets/images/" . $image . "'width='500px'></center><br>";
        }
        ?>




    </div>
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