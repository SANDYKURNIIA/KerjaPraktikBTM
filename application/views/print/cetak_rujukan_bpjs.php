<<<<<<< HEAD
<!DOCTYPE html>
<html>

<head>



    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .table1 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid;

        }


        .table1,
        tr {
            vertical-align: text-top;
        }

        .garisbawah {
            border-bottom: 2px solid;
        }

        .garisatas {
            border-top: 2px solid;
        }
    </style>

</head>

<body onload="myFunction()">

    <div class="content">
        <table>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>
                                <div style="display: block;"><img src="<?= base_url('assets/dist/img/bpjs.png'); ?>" alt="logo" height="35" style="margin-top: 10px;" /></div>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td width=50%>
                                <font size=4% style="font-family: helvetica;"><b>SURAT RUJUKAN</b></font><br>
                                <font size=4%>RS BAKTI TIMAH PANGKALPINANG</font><br>
                            </td>

                        </tr>
                    </table>
                </td>

                <td>
                    <table>
                        <tr>
                            <!-- <center> -->
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="5" style="text-align: right;"> No.<?php echo  $data['rujukan']['noRujukan'] ?> </font>
                            </p>
                            <!-- </center> -->
                        </tr>
                        <tr>
                            <!-- <center> -->
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="4">Tgl.<?= indo_date2($data['rujukan']['tglRencanaKunjungan']) ?></font>
                            <!-- </center> -->
                        </tr>
                    </table>
                </td>
        </table>
        <br>

        <table width=100% cellspacing=0 border="0">
            <tr>
                <td>

                    <table>
                        <tr>
                            <td>
                                Kepada Yth.
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo  $data['rujukan']['namaPoliRujukan'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php echo  $data['rujukan']['namaPpkDirujuk'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                Mohon Pemeriksaan dan Penanganan Lebih Lanjut :
                            </td>

                        </tr>
                        <tr>
                            <td>
                                No.Kartu
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo $data['rujukan']['noKartu'] ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Nama Peserta
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo $data['rujukan']['nama'] ?> (<?php echo $data['rujukan']['kelamin'] == "L" ? "Laki-Laki" : "Perempuan"; ?>)
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tgl.Lahir
                            </td>
                            <td>
                                :
                            </td>
                            <td width=40%>
                                <?php echo date('d/m/Y', strtotime($data['rujukan']['tglLahir'])) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Diagnosa
                            </td>
                            <td>
                                :
                            </td>
                            <td width=40%>
                                <?php echo   $data['rujukan']['namaDiagRujukan'] ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Keterangan
                            </td>
                            <td>
                                :
                            </td>
                            <td width=60%>
                                <?php echo   $data['rujukan']['catatan'] ?>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                Demikian atas bantuannya, diucapkan banyak terima kasih.
                            </td>

                        </tr>
                    </table>

                </td>
                <td>
                    <table>
                        <tr>
                            <td>
                                <span class="help-block"></span>
                            </td>

                        </tr>
                        <tr>

                            <td>

                                ==<?php echo $data['rujukan']['namaTipeRujukan']; ?>==
                            </td>
                        </tr>
                        <tr>
                            <td>

                                <?php echo $data['rujukan']['jnsPelayanan'] == 1 ? "Rawat Inap" : "Rawat Jalan"; ?>
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>


        <br>
        <table width=100% cellspacing=0>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>
                                <div style="width: 100%; text-align: left; float: left;">
                                    <?php
                                    $expire        =  date('Y-m-d', strtotime('+90 day', strtotime($data['rujukan']['tglRencanaKunjungan'])));; ?>
                                    *Rujukan Berlaku sampai Dengan <?= indo_date2($expire) ?>.</div><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="width: 100%; text-align: left; float: left;">*Tgl.Rencana Berkunjung <?= indo_date2($data['rujukan']['tglRencanaKunjungan']) ?>.</div><br>
                            </td>
                        </tr>
                    </table>
                </td>

                <td>
                    <table>
                        <tr>

                            <td>
                                <div style=" text-align: left; ">Pasien/Keluarga Pasien</div><br>
                            </td>
                            <!-- <td>
                                <div style="width: 30%; text-align: left;">Pasien/Keluarga Pasien</div><br>
                            </td> -->
                        </tr>

                        <tr>
                            <td>
                                <div style=" text-align: left; ">.........................................</div><br>
                            </td>
                            <!-- <td>
                                <div style="width: 30%; text-align: left;">Yan Irawan</div><br>
                            </td> -->
                        </tr>
                    </table>
                </td>
            </tr>

        </table>
    </div>
    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        window.onafterprint = function(e) {
            closePrintView();
        };

        function myFunction() {
            window.print();
        }

        function closePrintView() {
            window.location.href = 'javascript:history.go(-1)';
        }
    </script>
</body>

=======
<!DOCTYPE html>
<html>

<head>



    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .table1 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid;

        }


        .table1,
        tr {
            vertical-align: text-top;
        }

        .garisbawah {
            border-bottom: 2px solid;
        }

        .garisatas {
            border-top: 2px solid;
        }
    </style>

</head>

<body onload="myFunction()">

    <div class="content">
        <table>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>
                                <div style="display: block;"><img src="<?= base_url('assets/dist/img/bpjs.png'); ?>" alt="logo" height="35" style="margin-top: 10px;" /></div>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td width=50%>
                                <font size=4% style="font-family: helvetica;"><b>SURAT RUJUKAN</b></font><br>
                                <font size=4%>RS BAKTI TIMAH PANGKALPINANG</font><br>
                            </td>

                        </tr>
                    </table>
                </td>

                <td>
                    <table>
                        <tr>
                            <!-- <center> -->
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="5" style="text-align: right;"> No.<?php echo  $data['rujukan']['noRujukan'] ?> </font>
                            </p>
                            <!-- </center> -->
                        </tr>
                        <tr>
                            <!-- <center> -->
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="4">Tgl.<?= indo_date2($data['rujukan']['tglRencanaKunjungan']) ?></font>
                            <!-- </center> -->
                        </tr>
                    </table>
                </td>
        </table>
        <br>

        <table width=100% cellspacing=0 border="0">
            <tr>
                <td>

                    <table>
                        <tr>
                            <td>
                                Kepada Yth.
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo  $data['rujukan']['namaPoliRujukan'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php echo  $data['rujukan']['namaPpkDirujuk'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                Mohon Pemeriksaan dan Penanganan Lebih Lanjut :
                            </td>

                        </tr>
                        <tr>
                            <td>
                                No.Kartu
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo $data['rujukan']['noKartu'] ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Nama Peserta
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo $data['rujukan']['nama'] ?> (<?php echo $data['rujukan']['kelamin'] == "L" ? "Laki-Laki" : "Perempuan"; ?>)
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tgl.Lahir
                            </td>
                            <td>
                                :
                            </td>
                            <td width=40%>
                                <?php echo date('d/m/Y', strtotime($data['rujukan']['tglLahir'])) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Diagnosa
                            </td>
                            <td>
                                :
                            </td>
                            <td width=40%>
                                <?php echo   $data['rujukan']['namaDiagRujukan'] ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Keterangan
                            </td>
                            <td>
                                :
                            </td>
                            <td width=60%>
                                <?php echo   $data['rujukan']['catatan'] ?>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                Demikian atas bantuannya, diucapkan banyak terima kasih.
                            </td>

                        </tr>
                    </table>

                </td>
                <td>
                    <table>
                        <tr>
                            <td>
                                <span class="help-block"></span>
                            </td>

                        </tr>
                        <tr>

                            <td>

                                ==<?php echo $data['rujukan']['namaTipeRujukan']; ?>==
                            </td>
                        </tr>
                        <tr>
                            <td>

                                <?php echo $data['rujukan']['jnsPelayanan'] == 1 ? "Rawat Inap" : "Rawat Jalan"; ?>
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>


        <br>
        <table width=100% cellspacing=0>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>
                                <div style="width: 100%; text-align: left; float: left;">
                                    <?php
                                    $expire        =  date('Y-m-d', strtotime('+90 day', strtotime($data['rujukan']['tglRencanaKunjungan'])));; ?>
                                    *Rujukan Berlaku sampai Dengan <?= indo_date2($expire) ?>.</div><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="width: 100%; text-align: left; float: left;">*Tgl.Rencana Berkunjung <?= indo_date2($data['rujukan']['tglRencanaKunjungan']) ?>.</div><br>
                            </td>
                        </tr>
                    </table>
                </td>

                <td>
                    <table>
                        <tr>

                            <td>
                                <div style=" text-align: left; ">Pasien/Keluarga Pasien</div><br>
                            </td>
                            <!-- <td>
                                <div style="width: 30%; text-align: left;">Pasien/Keluarga Pasien</div><br>
                            </td> -->
                        </tr>

                        <tr>
                            <td>
                                <div style=" text-align: left; ">.........................................</div><br>
                            </td>
                            <!-- <td>
                                <div style="width: 30%; text-align: left;">Yan Irawan</div><br>
                            </td> -->
                        </tr>
                    </table>
                </td>
            </tr>

        </table>
    </div>
    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        window.onafterprint = function(e) {
            closePrintView();
        };

        function myFunction() {
            window.print();
        }

        function closePrintView() {
            window.location.href = 'javascript:history.go(-1)';
        }
    </script>
</body>

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</html>