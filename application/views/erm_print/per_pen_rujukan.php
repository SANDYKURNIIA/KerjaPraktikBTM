<<<<<<< HEAD
<!DOCTYPE html>
<html>

<head>
    <title>Print out <?= $page_title ?></title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .table1 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid;

        }


        .garisbawah {
            border-bottom: 1px solid;
        }

        .garisatas {
            border-top: 2px solid;
        }

        .gariskanan {
            border-right: 1px solid;
        }

        .gariskiri {
            border-left: 1px solid;
        }

        .box {
            border-bottom: 1px solid;
            width: 1px;
            height: 1px;

        }


        .block,

        li {
            border: 1px solid black;
            padding: .1em;
            width: 29px;
        }

        hr {
            border: 1px solid black;
        }

        .block {
            display: block;
        }

        span,
        ul {
            border: 1px solid black;
            padding: .1em;
            width: 50px;

        }


        ul {
            display: inline-flex;
            list-style: none;
            padding: 0;
        }

        .inline {
            display: inline;
        }
    </style>
</head>

<body>
    <div class="content">
        <table class="a" style="width: 100%">
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

        <center>
            <h3>PERSETUJUAN/PENOLAKAN* RUJUKAN</h3>
        </center>

        <!--Atas-->

        <!--Akhir Atas-->

        <!--table baru 1-->

        <table width=100% class="table1" cellspacing=0>
            <tr height="40" class=garisbawah>
                <td colspan="2" class=gariskanan>Pemberi informasi</td>
                <td colspan="2" class=gariskanan><?= $data['pemberi_info'] ?></td>
            </tr>
            <tr height="40" class=garisbawah>
                <td colspan="2" class=gariskanan>Penerima Informasi / pemberi persetujuan **</td>
                <td colspan="2" class=gariskanan><?= $data['penerima_info'] ?></td>
            </tr>

            <tr height="40" class="garisbawah garisatas" align="center">
                <td class=gariskanan><b>No</b></td>
                <td class=gariskanan><b>Jenis Informasi</b></td>
                <td width="290" class=gariskanan><b>Isi Informasi</b></td>
                <td width="150" class=gariskanan><b>Tandai (√)</b></td>
            </tr>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>1</td>
                <td class=gariskanan>Diagnosis dan terapi dan/atau tindakan medis yang diperlukan</td>
                <td width="290" class=gariskanan><?= $data['diagnosis'] ?></td>
                <td width="150" class=gariskanan align="center"><?php if ($data['td_diagnosis'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>2</td>
                <td class=gariskanan>Alasan dan tujuan dilakukan rujukan</td>
                <td width="290" class=gariskanan><?= $data['alasan'] ?></td>
                <td width="150" class=gariskanan align="center"><?php if ($data['td_alasan'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>3</td>
                <td class=gariskanan>Risiko yang dapat timbul apabila rujukan tidak dilakukan</td>
                <td width="290" class=gariskanan><?= $data['risiko'] ?></td>
                <td width="150" class=gariskanan align="center"><?php if ($data['td_risiko'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>4</td>
                <td class=gariskanan>Transportasi rujukan</td>
                <td width="290" class=gariskanan><?= $data['transport'] ?></td>
                <td width="150" class=gariskanan align="center"><?php if ($data['td_transport'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>5</td>
                <td class=gariskanan>Risiko atau penyulit yang dapat timbul selama dalam perjalanan</td>
                <td width="290" class=gariskanan><?= $data['hambatan'] ?></td>
                <td width="150" class=gariskanan align="center"><?php if ($data['td_hambatan'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

        </table>

        <!--akhir table baru 1-->

        <!--table ketiga -->
        <table width=100% class="table1" cellspacing=0>

            <tr height="60" class=garisbawah>
                <td class=gariskanan>
                    Dengan ini menyatakan bahwa saya telah menerangkan hal-hal di atas secara benar dan jelas <br>
                    dan memberikan kesempatan untuk bertanya dan/atau berdiskusi
                </td>
                <td width="150" class=gariskanan align="center">&nbsp;<br>
                    &nbsp;<br>
                    <?php if ($data['ttd_pemberi_info'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr height="60" class=garisbawah>
                <td class=gariskanan>
                    Dengan ini menyatakan bahwa saya telah menerima informasi sebagaimana di atas yang saya <br>
                    beri tanda/paraf di kolom kanannya, dan telah memahaminya
                </td>
                <td width="150" class=gariskanan align="center">&nbsp;<br>
                    &nbsp;<br>
                    <?php if ($data['ttd_penerima_info'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>


        </table>

        <table width=100% class="table1" cellspacing=0>
            <tr height="40" class=garisbawah>
                <td>
                    *Bila pasien tidak kompeten atau tidak mau menerima informasi, maka penerima informasi adalah wali keluarga terdekat.
                </td>
            </tr>

        </table>

        <!--akhir table tiga-->
        <table width=100% class="table1" cellspacing=0>
            <tr height="40" class="garisbawah" align="center">
                <td>
                    <b>PERSETUJUAN/PENOLAKAN RUJUKAN*</b>
                </td>
            </tr>
        </table>
        <!--table satu kecil-->
        <table width=100% class="gariskanan gariskiri" cellspacing=0>

            <tr height="60">
                <td>
                    Yang bertandatangan di bawah ini, saya nama <b><?= $data['nama'] ?></b>, umur <b><?= $data['umur'] ?></b> tahun,
                    <b><?= $data['jk'] ?></b>, alamat <b><?= $data['alamat'] ?></b> ,
                    dengan ini menyatakan persetujuan/penolakan untuk dilakukannya rujukan terhadap <b><?= $data['ghubungan'] ?></b>*
                    bernama <b><?= $data['pasien'] ?></b> , umur <b><?php
                                                                    $tanggal = new DateTime($data['tgl_lahir']);
                                                                    $today = new DateTime();
                                                                    $y = $today->diff($tanggal)->y;
                                                                    echo  $y; ?></b> tahun, <b><?= $data['jenis_kelamin'] ?></b>,
                    tanggal lahir <b><?= strftime('%d %B %Y', strtotime($data['tgl_lahir'])) ?></b>,
                    alamat <b><?= $data['almt'] . ', ' . $data['kelurahan'] . ', ' . $data['kecamatan'] . ', ' . $data['provinsi'] ?></b> <br>
                    Saya memahami perlunya dan manfaat rujukan tersebut sebagaimana telah dijelaskan seperti di atas kepada saya,<br>
                    termasuk risiko dan komplikasi yang mungkin timbul.<br>
                </td>
            </tr>

            <tr>
                <td height="30">
                    Pangkal Pinang, tanggal <?= strftime('%d %B %Y', strtotime($data['tanggal'])) ?> pukul <?= date('H:i:s', strtotime($data['tanggal'])) ?>
                </td>
            </tr>

        </table>
        <table width=100% class="gariskanan gariskiri garisbawah" cellspacing=0>
            <tr>
                <td>
                    <center>Yang menyatakan*</center>
                </td>
                <td>
                    <center>Saksi 1</center>
                </td>
                <td>
                    <center>Saksi 2</center>
                </td>
            </tr>
            <tr>
                <td>
                    <center><img src="<?= base_url() . $data['ttd'] ?>" style="width: 200px;height:200px; "></center>
                </td>
                <td>
                    <center><img src="<?= base_url() . $data['ttd1'] ?>" style="width: 200px;height:200px; "></center>
                </td>
                <td>
                    <center><img src="<?= base_url() . $data['ttd2'] ?>" style="width: 200px;height:200px; "></center>
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
    <style type="text/css">
        .table1 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid;

        }


        .garisbawah {
            border-bottom: 1px solid;
        }

        .garisatas {
            border-top: 2px solid;
        }

        .gariskanan {
            border-right: 1px solid;
        }

        .gariskiri {
            border-left: 1px solid;
        }

        .box {
            border-bottom: 1px solid;
            width: 1px;
            height: 1px;

        }


        .block,

        li {
            border: 1px solid black;
            padding: .1em;
            width: 29px;
        }

        hr {
            border: 1px solid black;
        }

        .block {
            display: block;
        }

        span,
        ul {
            border: 1px solid black;
            padding: .1em;
            width: 50px;

        }


        ul {
            display: inline-flex;
            list-style: none;
            padding: 0;
        }

        .inline {
            display: inline;
        }
    </style>
</head>

<body>
    <div class="content">
        <table class="a" style="width: 100%">
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

        <center>
            <h3>PERSETUJUAN/PENOLAKAN* RUJUKAN</h3>
        </center>

        <!--Atas-->

        <!--Akhir Atas-->

        <!--table baru 1-->

        <table width=100% class="table1" cellspacing=0>
            <tr height="40" class=garisbawah>
                <td colspan="2" class=gariskanan>Pemberi informasi</td>
                <td colspan="2" class=gariskanan><?= $data['pemberi_info'] ?></td>
            </tr>
            <tr height="40" class=garisbawah>
                <td colspan="2" class=gariskanan>Penerima Informasi / pemberi persetujuan **</td>
                <td colspan="2" class=gariskanan><?= $data['penerima_info'] ?></td>
            </tr>

            <tr height="40" class="garisbawah garisatas" align="center">
                <td class=gariskanan><b>No</b></td>
                <td class=gariskanan><b>Jenis Informasi</b></td>
                <td width="290" class=gariskanan><b>Isi Informasi</b></td>
                <td width="150" class=gariskanan><b>Tandai (√)</b></td>
            </tr>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>1</td>
                <td class=gariskanan>Diagnosis dan terapi dan/atau tindakan medis yang diperlukan</td>
                <td width="290" class=gariskanan><?= $data['diagnosis'] ?></td>
                <td width="150" class=gariskanan align="center"><?php if ($data['td_diagnosis'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>2</td>
                <td class=gariskanan>Alasan dan tujuan dilakukan rujukan</td>
                <td width="290" class=gariskanan><?= $data['alasan'] ?></td>
                <td width="150" class=gariskanan align="center"><?php if ($data['td_alasan'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>3</td>
                <td class=gariskanan>Risiko yang dapat timbul apabila rujukan tidak dilakukan</td>
                <td width="290" class=gariskanan><?= $data['risiko'] ?></td>
                <td width="150" class=gariskanan align="center"><?php if ($data['td_risiko'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>4</td>
                <td class=gariskanan>Transportasi rujukan</td>
                <td width="290" class=gariskanan><?= $data['transport'] ?></td>
                <td width="150" class=gariskanan align="center"><?php if ($data['td_transport'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>5</td>
                <td class=gariskanan>Risiko atau penyulit yang dapat timbul selama dalam perjalanan</td>
                <td width="290" class=gariskanan><?= $data['hambatan'] ?></td>
                <td width="150" class=gariskanan align="center"><?php if ($data['td_hambatan'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

        </table>

        <!--akhir table baru 1-->

        <!--table ketiga -->
        <table width=100% class="table1" cellspacing=0>

            <tr height="60" class=garisbawah>
                <td class=gariskanan>
                    Dengan ini menyatakan bahwa saya telah menerangkan hal-hal di atas secara benar dan jelas <br>
                    dan memberikan kesempatan untuk bertanya dan/atau berdiskusi
                </td>
                <td width="150" class=gariskanan align="center">&nbsp;<br>
                    &nbsp;<br>
                    <?php if ($data['ttd_pemberi_info'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr height="60" class=garisbawah>
                <td class=gariskanan>
                    Dengan ini menyatakan bahwa saya telah menerima informasi sebagaimana di atas yang saya <br>
                    beri tanda/paraf di kolom kanannya, dan telah memahaminya
                </td>
                <td width="150" class=gariskanan align="center">&nbsp;<br>
                    &nbsp;<br>
                    <?php if ($data['ttd_penerima_info'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>


        </table>

        <table width=100% class="table1" cellspacing=0>
            <tr height="40" class=garisbawah>
                <td>
                    *Bila pasien tidak kompeten atau tidak mau menerima informasi, maka penerima informasi adalah wali keluarga terdekat.
                </td>
            </tr>

        </table>

        <!--akhir table tiga-->
        <table width=100% class="table1" cellspacing=0>
            <tr height="40" class="garisbawah" align="center">
                <td>
                    <b>PERSETUJUAN/PENOLAKAN RUJUKAN*</b>
                </td>
            </tr>
        </table>
        <!--table satu kecil-->
        <table width=100% class="gariskanan gariskiri" cellspacing=0>

            <tr height="60">
                <td>
                    Yang bertandatangan di bawah ini, saya nama <b><?= $data['nama'] ?></b>, umur <b><?= $data['umur'] ?></b> tahun,
                    <b><?= $data['jk'] ?></b>, alamat <b><?= $data['alamat'] ?></b> ,
                    dengan ini menyatakan persetujuan/penolakan untuk dilakukannya rujukan terhadap <b><?= $data['ghubungan'] ?></b>*
                    bernama <b><?= $data['pasien'] ?></b> , umur <b><?php
                                                                    $tanggal = new DateTime($data['tgl_lahir']);
                                                                    $today = new DateTime();
                                                                    $y = $today->diff($tanggal)->y;
                                                                    echo  $y; ?></b> tahun, <b><?= $data['jenis_kelamin'] ?></b>,
                    tanggal lahir <b><?= strftime('%d %B %Y', strtotime($data['tgl_lahir'])) ?></b>,
                    alamat <b><?= $data['almt'] . ', ' . $data['kelurahan'] . ', ' . $data['kecamatan'] . ', ' . $data['provinsi'] ?></b> <br>
                    Saya memahami perlunya dan manfaat rujukan tersebut sebagaimana telah dijelaskan seperti di atas kepada saya,<br>
                    termasuk risiko dan komplikasi yang mungkin timbul.<br>
                </td>
            </tr>

            <tr>
                <td height="30">
                    Pangkal Pinang, tanggal <?= strftime('%d %B %Y', strtotime($data['tanggal'])) ?> pukul <?= date('H:i:s', strtotime($data['tanggal'])) ?>
                </td>
            </tr>

        </table>
        <table width=100% class="gariskanan gariskiri garisbawah" cellspacing=0>
            <tr>
                <td>
                    <center>Yang menyatakan*</center>
                </td>
                <td>
                    <center>Saksi 1</center>
                </td>
                <td>
                    <center>Saksi 2</center>
                </td>
            </tr>
            <tr>
                <td>
                    <center><img src="<?= base_url() . $data['ttd'] ?>" style="width: 200px;height:200px; "></center>
                </td>
                <td>
                    <center><img src="<?= base_url() . $data['ttd1'] ?>" style="width: 200px;height:200px; "></center>
                </td>
                <td>
                    <center><img src="<?= base_url() . $data['ttd2'] ?>" style="width: 200px;height:200px; "></center>
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