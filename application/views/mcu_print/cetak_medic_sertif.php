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
                                MEDICAL CERTIFICATE
                        </b></u>
                    </h3>

                    <table style="margin-left:40px" cellspacing=0>
                        <tr height=10px>
                            <td width=200px colspan=2>
                                The undersigned is doctor’s Bakti Timah Hospital with this explained :
                            </td>
                        </tr>
                        <tr height=10px>
                            <td width=265px>
                                Name
                            </td>
                            <td>: <?php echo $nama_pasien; ?></td>
                        </tr>
                        <tr height=10px>
                            <td>
                                Place / date of birth
                            </td>
                            <td>: <?php echo $tempat_lahir . ' / ' . indo_date2($tgl_lahir); ?></td>
                        </tr>
                        <tr height=10px>
                            <td>
                                Occuption
                            </td>
                            <td>: <?php echo $occupation; ?></td>
                        </tr>
                        <tr height=20px>
                            <td>
                                Current Address
                            </td>
                            <td>: <?php echo $alamat; ?></td>
                        </tr>

                        <tr height=20px>
                            <td>
                                Has been checked date
                            </td>
                            <td>: <?php

                                    echo indo_date2($tgl_periksa); ?> <i></i>

                            </td>
                        </tr>
                        <tr height=20px>
                            <td>
                                Stated health in the state of
                            </td>
                            <td>: <b><?= $sehat ?></b><i></i>

                            </td>
                        </tr>
                        <tr height=20px>
                            <td>
                            This certificate is required to
                            </td>
                            <td>: <b><?= $kebutuhan ?></b><i></i>

                            </td>
                        </tr>
                        
                    </table>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <table style=" margin-left:40px" cellspacing=0>

                    <tbody>
                        <?php

                        ?>
                        <tr class="txt-dark">
                            <td colspan="3"><b>The result of the examination :</b></td>

                        </tr>
                        <tr class="txt-dark" >
                            <td>Weight</td>
                            <td>:</td>
                            <td><?= $berat_badan ?> Kg</td>
                        </tr>
                        <tr class="txt-dark">
                            <td>Height</td>
                            <td>:</td>
                            <td><?= $tinggi_badan ?> Cm</td>
                        </tr>
                        <tr class="txt-dark" >
                            <td>Blood group</td>
                            <td>:</td>
                            <td><?= $blood_group ?></td>
                        </tr>
                        <tr class="txt-dark">
                            <td>Blood preasure</td>
                            <td>:</td>
                            <td><?= $tekanan_darah ?> mmHg</td>
                        </tr>
                        <tr class="txt-dark" >
                            <td>Color Blind</td>
                            <td>:</td>
                            <td><?= $blind ?></td>
                        </tr>
                        
                        <tr height=20px>
                            <td colspan=3>
                                
                                <br>
                                <br>
                                This a doctor’s certificate is created with the truth, to be used as needed
                                <br><br><br>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table style="float: right;" cellpadding="5">

                    <tbody>
                        <?php

                        ?>
                        <tr class="txt-dark" width="30%">
                            <td>Pangkal Pinang, <?php 
                             $time = strtotime($tgl_periksa);
                             $date2 = strftime("%d %B %Y ", $time);
                            echo $date2 ?></td>

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
                        <tr class="txt-dark" width="30%">
                            <td>Examining Doctor’s Signature</td>

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