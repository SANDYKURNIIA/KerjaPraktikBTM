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
                    <img src="<?= base_url() ?>resources/img/rsbt_logo.jpg" style="width: 150px;">
                </td>
                <td>
                <p><b>RS. Bakti Timah</b></p>
                    <p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                    <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                    <p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>
                <td>
                    <p style="margin-left:-9em">NRM : <?= $data['no_rm'] ?></p>
                    <p style="margin-left:-9em">Nama :<?= $data['pasien'] ?></p>
                    <p style="margin-left:-9em">Jenis Kelamin :<?= $data['jenis_kelamin'] ?></p>
                    <p style="margin-left:-9em">Tanggal Lahir :<?= strftime('%d %B %Y', strtotime($data['tgl_lahir'])) ?></p>
                    <p style="margin-left:-9em">(Mohon diisi stiker jika ada)</p>

                </td>
            </tr>
        </table>
        <hr>
        <h2 class="center">
            PELAKSANAAN INISIASI MENYUSI DINI/ASI EKSLUSIF
        </h2>

        <table style="margin-left:40px" class="table1" cellspacing=0>
            <tr height=30px>
                <td width=250px>
                    Nama Ibu
                </td>
                <td>: <?= $data['pasien'] ?></td>
            </tr>
            <tr height=30px>
                <td>
                    Tanggal Lahir
                </td>
                <td>: <?= strftime('%d %B %Y', strtotime($data['tgl_lahir'])) ?></td>
            </tr>
            <tr height=30px>
                <td>
                    Jenis Persalinan
                </td>
                <td>: <?= $data['jenis_persalinan'] ?></td>
            </tr>
            <tr height=20px>
                <td>
                    &nbsp; &nbsp; &nbsp;Pervagina
                </td>
                <td>: <?= $data['pervagina'] ?></td>
            </tr>
            <tr height=20px>
                <td>
                    &nbsp; &nbsp; &nbsp;Caesaria
                </td>
                <td>: <?= $data['caesaria'] ?></td>
            </tr>
            <tr height=30px>
                <td>
                    Kontak kulit dengan kulit
                </td>
                <td>: <?= $data['kontak_kulit'] ?> </td>
            </tr>
            <tr height=30px>
                <td>
                    Waktu Mulai
                </td>
                <td>: <?= $data['waktu_mulai'] ?> </td>
            </tr>
            <tr height=30px>
                <td>
                    Waktu Terakhir
                </td>
                <td>: <?= $data['waktu_selesai'] ?> </td>
            </tr>
            <tr height=30px>
                <td>
                    Lama Kontak
                </td>
                <td>: <?= $data['lama_kontak'] ?> </td>
            </tr>
            <tr height=30px>
                <td>
                    Saat bayi menyusu pertama kali
                </td>
                <td>: <?= $data['bayi_menyusui'] ?> </td>
            </tr>
            <tr height=30px>
                <td>
                    Tanggal dan Jam Menyusui Kedua
                </td>
                <td>: <?= $data['menolong'] ?> </td>
            </tr>
            <tr height=30px>
                <td>
                    Bila Tidak Dilakukan Beri Alasan
                </td>
                <td>: <?= $data['alasan'] ?> </td>
            </tr>
            <tr height=30px>
                <td>
                    Catatan
                </td>
                <td>: <?= $data['catatan'] ?> </td>
            </tr>
        </table>
        <br/>
        <br/>
        <table width=100% class="gariskanan gariskiri garisbawah" cellspacing=0>
            <tr>
                <td colspan="3">
                    PangkalPinang, tanggal <?= strftime('%d %B %Y', strtotime($data['tanggal'])) ?> pukul <?= date('H:i:s', strtotime($data['tanggal'])) ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                   &nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    <center>Perawat</center>
                </td>
                <td>
                    <center>Orang Tua</center>
                </td>
            </tr>
            <tr>
                <td>
                    <center><img src="<?= base_url() . $data['ttd'] ?>" style="width: 200px;height:200px; "></center>
                </td>
                <td>
                    <center><img src="<?= base_url() . $data['ttd1'] ?>" style="width: 200px;height:200px; "></center>
                </td>
            </tr>

        </table>




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
                    <img src="<?= base_url() ?>resources/img/rsbt_logo.jpg" style="width: 150px;">
                </td>
                <td>
                <p><b>RS. Bakti Timah</b></p>
                    <p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                    <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                    <p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>
                <td>
                    <p style="margin-left:-9em">NRM : <?= $data['no_rm'] ?></p>
                    <p style="margin-left:-9em">Nama :<?= $data['pasien'] ?></p>
                    <p style="margin-left:-9em">Jenis Kelamin :<?= $data['jenis_kelamin'] ?></p>
                    <p style="margin-left:-9em">Tanggal Lahir :<?= strftime('%d %B %Y', strtotime($data['tgl_lahir'])) ?></p>
                    <p style="margin-left:-9em">(Mohon diisi stiker jika ada)</p>

                </td>
            </tr>
        </table>
        <hr>
        <h2 class="center">
            PELAKSANAAN INISIASI MENYUSI DINI/ASI EKSLUSIF
        </h2>

        <table style="margin-left:40px" class="table1" cellspacing=0>
            <tr height=30px>
                <td width=250px>
                    Nama Ibu
                </td>
                <td>: <?= $data['pasien'] ?></td>
            </tr>
            <tr height=30px>
                <td>
                    Tanggal Lahir
                </td>
                <td>: <?= strftime('%d %B %Y', strtotime($data['tgl_lahir'])) ?></td>
            </tr>
            <tr height=30px>
                <td>
                    Jenis Persalinan
                </td>
                <td>: <?= $data['jenis_persalinan'] ?></td>
            </tr>
            <tr height=20px>
                <td>
                    &nbsp; &nbsp; &nbsp;Pervagina
                </td>
                <td>: <?= $data['pervagina'] ?></td>
            </tr>
            <tr height=20px>
                <td>
                    &nbsp; &nbsp; &nbsp;Caesaria
                </td>
                <td>: <?= $data['caesaria'] ?></td>
            </tr>
            <tr height=30px>
                <td>
                    Kontak kulit dengan kulit
                </td>
                <td>: <?= $data['kontak_kulit'] ?> </td>
            </tr>
            <tr height=30px>
                <td>
                    Waktu Mulai
                </td>
                <td>: <?= $data['waktu_mulai'] ?> </td>
            </tr>
            <tr height=30px>
                <td>
                    Waktu Terakhir
                </td>
                <td>: <?= $data['waktu_selesai'] ?> </td>
            </tr>
            <tr height=30px>
                <td>
                    Lama Kontak
                </td>
                <td>: <?= $data['lama_kontak'] ?> </td>
            </tr>
            <tr height=30px>
                <td>
                    Saat bayi menyusu pertama kali
                </td>
                <td>: <?= $data['bayi_menyusui'] ?> </td>
            </tr>
            <tr height=30px>
                <td>
                    Tanggal dan Jam Menyusui Kedua
                </td>
                <td>: <?= $data['menolong'] ?> </td>
            </tr>
            <tr height=30px>
                <td>
                    Bila Tidak Dilakukan Beri Alasan
                </td>
                <td>: <?= $data['alasan'] ?> </td>
            </tr>
            <tr height=30px>
                <td>
                    Catatan
                </td>
                <td>: <?= $data['catatan'] ?> </td>
            </tr>
        </table>
        <br/>
        <br/>
        <table width=100% class="gariskanan gariskiri garisbawah" cellspacing=0>
            <tr>
                <td colspan="3">
                    PangkalPinang, tanggal <?= strftime('%d %B %Y', strtotime($data['tanggal'])) ?> pukul <?= date('H:i:s', strtotime($data['tanggal'])) ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                   &nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    <center>Perawat</center>
                </td>
                <td>
                    <center>Orang Tua</center>
                </td>
            </tr>
            <tr>
                <td>
                    <center><img src="<?= base_url() . $data['ttd'] ?>" style="width: 200px;height:200px; "></center>
                </td>
                <td>
                    <center><img src="<?= base_url() . $data['ttd1'] ?>" style="width: 200px;height:200px; "></center>
                </td>
            </tr>

        </table>




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