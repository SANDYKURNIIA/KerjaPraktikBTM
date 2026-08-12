<<<<<<< HEAD
<!DOCTYPE html>
<html>

<head>
    <title>CETAK EXPERTISE - RSBT PANGKAL PINANG </title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="content">


        <table>
            <tr>
                <td> <a><img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" width="250px" alt="logo" /></a></td>
                <td> <a><img src="<?= base_url('assets/dist/img/alamat.jpg'); ?>" width="500px" alt="logoa" /></a></td>

            </tr>
        </table>


        <table class="info-table" style="margin-top: 25px; font-size: 20px;">
            <tr style="padding-bottom: 10px;">
                <td style="padding: 10px 0;">NAMA</td>
                <td style="padding: 10px 0;">:</td>
                <td style="padding: 10px 0;"><?= $pasien['nama']; ?></td>
            </tr>
            <tr>
                <td style="padding: 10px 0;">Tgl. Lahir/Umur</td>
                <td style="padding: 10px 0;">:</td>
                <td style="padding: 10px 0;"><?= $pasien['tgl_lahir']; ?></td>
            </tr>
            <tr>
                <td style="padding: 10px 0;">No. RM</td>
                <td style="padding: 10px 0;">:</td>
                <td style="padding: 10px 0;"><?= $pasien['no_rm']; ?></td>
            </tr>
            <tr>
                <td style="padding: 10px 0;">Dokter Pengirim</td>
                <td style="padding: 10px 0;">:</td>
                <td style="padding: 10px 0;"><?= $radio['dokter_pengirim']; ?></td>
            </tr>
            <tr>
                <td style="padding: 10px 0;">No Sep</td>
                <td style="padding: 10px 0;">:</td>
                <td style="padding: 10px 0;"><?= $pelayanan['no_sep']; ?></td>
            </tr>
            <tr>
                <td style="padding: 10px 0;">Yth, Teman Sejawat</td>
                <td style="padding: 10px 0;">:</td>
            </tr>
        </table>

        <table>
            <tr>
                <td colspan="3" style="padding-top: 10px; text-align: justify; max-width: 600px; word-wrap: break-word; margin: auto; font-size: 20px; line-height: 1.6;"><?= nl2br($radio['hasil_pemeriksaan']); ?></td>
            </tr>
        </table>
    </div>
    <!-- <br> -->
    <table width=100% cellspacing=0>

        <tr>
            <td>
                <div style="width: 30%; text-align: center; float: right;">Terimakasih atas kerjasamanya,<br>
                Salam Sejawat
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div style="width: 30%; text-align: left; float: right;"><img src="<?php
                                                                                    $dbdokter = $this->db->get_where('dokter', ['nama' => $tindakan_radiologi['dokter']])->row();
                                                                                    echo base_url() . 'assets/ttd/' . $dbdokter->foto; ?>" width="150px"></div><br>
            </td>
        </tr>

        <tr>
            <td>
                <div style="width: 30%; text-align: left; float: right;"><?= $tindakan_radiologi['dokter'] ?></div><br>
            </td>
        </tr>

    </table>

    <script>
        function nl2br(str) {
            return str.preg_replace(/(?:\r\n|\r|\n)/g, '<br>');
        }
    </script>

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
    <title>CETAK EXPERTISE - RSBT PANGKAL PINANG </title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="content">


        <table>
            <tr>
                <td> <a><img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" width="250px" alt="logo" /></a></td>
                <td> <a><img src="<?= base_url('assets/dist/img/alamat.jpg'); ?>" width="500px" alt="logoa" /></a></td>

            </tr>
        </table>


        <table class="info-table" style="margin-top: 25px; font-size: 20px;">
            <tr style="padding-bottom: 10px;">
                <td style="padding: 10px 0;">NAMA</td>
                <td style="padding: 10px 0;">:</td>
                <td style="padding: 10px 0;"><?= $pasien['nama']; ?></td>
            </tr>
            <tr>
                <td style="padding: 10px 0;">Tgl. Lahir/Umur</td>
                <td style="padding: 10px 0;">:</td>
                <td style="padding: 10px 0;"><?= $pasien['tgl_lahir']; ?></td>
            </tr>
            <tr>
                <td style="padding: 10px 0;">No. RM</td>
                <td style="padding: 10px 0;">:</td>
                <td style="padding: 10px 0;"><?= $pasien['no_rm']; ?></td>
            </tr>
            <tr>
                <td style="padding: 10px 0;">Dokter Pengirim</td>
                <td style="padding: 10px 0;">:</td>
                <td style="padding: 10px 0;"><?= $radio['dokter_pengirim']; ?></td>
            </tr>
            <tr>
                <td style="padding: 10px 0;">No Sep</td>
                <td style="padding: 10px 0;">:</td>
                <td style="padding: 10px 0;"><?= $pelayanan['no_sep']; ?></td>
            </tr>
            <tr>
                <td style="padding: 10px 0;">Yth, Teman Sejawat</td>
                <td style="padding: 10px 0;">:</td>
            </tr>
        </table>

        <table>
            <tr>
                <td colspan="3" style="padding-top: 10px; text-align: justify; max-width: 600px; word-wrap: break-word; margin: auto; font-size: 20px; line-height: 1.6;"><?= nl2br($radio['hasil_pemeriksaan']); ?></td>
            </tr>
        </table>
    </div>
    <!-- <br> -->
    <table width=100% cellspacing=0>

        <tr>
            <td>
                <div style="width: 30%; text-align: center; float: right;">Terimakasih atas kerjasamanya,<br>
                Salam Sejawat
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div style="width: 30%; text-align: left; float: right;"><img src="<?php
                                                                                    $dbdokter = $this->db->get_where('dokter', ['nama' => $tindakan_radiologi['dokter']])->row();
                                                                                    echo base_url() . 'assets/ttd/' . $dbdokter->foto; ?>" width="150px"></div><br>
            </td>
        </tr>

        <tr>
            <td>
                <div style="width: 30%; text-align: left; float: right;"><?= $tindakan_radiologi['dokter'] ?></div><br>
            </td>
        </tr>

    </table>

    <script>
        function nl2br(str) {
            return str.preg_replace(/(?:\r\n|\r|\n)/g, '<br>');
        }
    </script>

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