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
                                SURAT KETERANGAN BEBAS NARKOBA
                        </b></u>
                    </h3>
                    <h5  style="margin-top:-10px" class="center">
                    ...../PT.BTM/SK..../20....
                    </h5>
                    <table cellpadding="5" cellspacing="0" border="0" style="width: 100%;">
                        <tr height=10px>
                            <td width=200px colspan=2>
                                Yang bertanda tangan dibawah ini, Dokter Medical Check Up Rumah Sakit Bakti Timah Pangkalpinang menerangkan :
                            </td>
                        </tr>
                        <tr>
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
                        <tr>
                            <td>
                                Tinggi Badan / Berat Badan
                            </td>
                            <td>
                                :<?= $tinggi_badan ." cm " . " / " . $berat_badan . " kg" ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tekanan Darah / Nadi</td>
                            <td>
                            :<?= $tekanan_darah ." mmHg " . " / " . $nadi . " x/m" ?>
                            </td>
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
                                Dengan hasil pemeriksaan Urine sebagai berikut :
                                <br>
                                <br>
                                <table cellpadding="5" cellspacing="0" border="0" style="width: 100%; border-collapse: collapse;">
                                    <tr>
                                        <td>Metamphetamine</td>
                                        <td>: <b><?=$metamphetamine?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Morphine</td>
                                        <td>: <b><?=$morphine?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Benzodiazepam</td>
                                        <td>: <b><?=$benzodiazepam?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Marijuana</td>
                                        <td>: <b><?=$marijuana?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Cocain</td>
                                        <td>: <b><?=$cocain?></b></td>
                                    </tr>

                                </table>
                               
                                <br>
                                
                                <br>
                                <br>
                                <div style="text-align: center;">
                                Pada pemeriksaan tanggal <b><?= indo_date2($tgl_periksa) ?></b> jenis tersebut diatas <b>(* tidak dijumpai/dijumpai *)</b> tanda - tanda ketergantungan narkoba. Demikian surat keterangan Bebas Narkoba ini dibuat untuk dapat dipegunakan sebagaimana mestinya
                                <br><br><br>
                                </div>
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