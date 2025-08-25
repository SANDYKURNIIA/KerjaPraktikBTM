<!DOCTYPE html>
<html>

<head>
    <title>Print out</title>
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

        .gariskanan {
            border-right: 1px solid;
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
        <table width=100% cellspacing=0>
            <tr>
                <td>
                    <table class="a" style="width: 100%">
                        <tr>
                            <td style="width: 25%">
                                <img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" style="width: 150px;">
                            </td>
                            <td>
                                <p>
                                    <font size=2.5><b>RUMAH SAKIT BAKTI TIMAH</b>
                                </p>
                                <p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                                <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                                <p>Telp. 0717 9100844, Fax. 0715 32165</p>
                                </font>
                            </td>

                        </tr>
                    </table>
                    <h3 style="margin-top:-10px" class="center">
                        <b><u>
                                <br>
                                <br>
                                SURAT KETERANGAN MANTOUX TEST
                        </b></u>
                    </h3>

                    <table style="margin-left:40px" cellspacing=0>
                        <tr height=10px>
                            <td width=200px colspan=2>
                                Yang bertanda tangan dibawah ini, Dokter Rumah Sakit Bakti Timah, dengan ini menerangkan bahwa :
                            </td>
                        </tr>
                        <tr height=10px>
                            <td width=265px>
                                Nama
                            </td>
                            <td>: <?php echo $nama_pasien; ?></td>
                        </tr>
                        <tr height=10px>
                            <td>
                                Tempat / Tgl. Lahir
                            </td>
                            <td>: <?php echo $tempat_lahir . ' / ' . indo_date2($tgl_lahir); ?></td>
                        </tr>
                        <tr height=10px>
                            <td>
                                Jenis Kelamin
                            </td>
                            <td>: <?php echo $sex; ?></td>
                        </tr>
                        <tr height=20px>
                            <td>
                                Alamat
                            </td>
                            <td>: <?php echo $alamat; ?></td>
                        </tr>

                        
                        <tr height=20px>
                            <td colspan=2>
                                <br>
                                <br>
                                Telah melakukan pemeriksaan Mantoux Test kepada pasien tersebut dengan hasil :
                                <br>
                                <br>
                                <center><b><?=$sehat?></b></center>
                                <br>
                                <br>
                                Demikianlah surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
                                <br><br><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <table style="float: right;" cellpadding="5">

                    <tbody>
                        <?php

                        ?>
                        <tr class="txt-dark" width="30%">
                            <td>Pangkal Pinang, <?= indo_date2($tgl_periksa) ?></td>

                        </tr>
                        <tr class="txt-dark" width="30%">
                            <td>Dokter yang memeriksa, </td>

                        </tr>
                        <tr>
                            <td><?php
                                $data = $this->db->query("SELECT foto from dokter where nama = '$dokter'")->row_array();
                                ?>
                                <img src="<?php echo base_url() . 'assets/ttd/' . $data['foto']; ?>" width="100px">
                            </td>
                        </tr>

                        <tr class="txt-dark" width="30%">
                            <td><?= $dokter; ?></td>
                        </tr>
                    </tbody>
                </table>
            </tr>

        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>


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

</html>