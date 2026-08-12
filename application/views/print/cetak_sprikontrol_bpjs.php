<<<<<<< HEAD
<!DOCTYPE html>
<html>

<head>



    <!-- <link href="</?= base_url() ?>resources/css/styles_print.css?p=</?= date('his') ?>" rel="stylesheet" type="text/css" /> -->
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

        td.myfontsize {
            font-size: 12px;
        }
    </style>

</head>

<body onload="myFunction()">

    <div class="content">
        <table>
            <tr>
                <td>
                    <div style="display: block;"><img src="<?= base_url('assets/dist/img/bpjs.png'); ?>" alt="logo" width="200px" style="margin-top: 10px; margin-right: 50px;" /></div>
                </td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td width=40%>
                    <font size=4% style="font-family: helvetica;"><b><?= $data['namaJnsKontrol'] == "Kontrol" ? "SURAT RENCANA KONTROL" : "SURAT PERINTAH RAWAT INAP" ?></b></font><br>
                    <font size=4%>RS BAKTI TIMAH PANGKALPINANG</font><br>
                </td>
                <td width=20%>

                    <center>
                        <font style=" margin-left: 50px;" size="5"> No.<?= $data['noSuratKontrol'] ?></font>
                    </center>

                </td>
            </tr>

        </table>
       
        <br>

        <table width=100% cellspacing=0 border="0" class="myfontsize">


            <tr>
                <td width=15%>
                    Kepada Yth
                </td>
                <td colspan="2">
                    <?php echo  $data['namaDokter'] ?>

                </td>

            </tr>
            <tr>
                <td width=15%>

                </td>
                <td colspan="2">
                    Sp./Sub. <?php echo  $data['namaPoliTujuan'] ?>

                </td>

            </tr>
            <tr>
                <td colspan="3">
                    Mohon Pemeriksaan dan Penanganan Lebih Lanjut :
                </td>

            </tr>
        </table>
        <table width=100% cellspacing=0 border="0"  class="myfontsize">
            <tr>
                <td width=15%>
                    No.Kartu
                </td>
                <td>
                    :
                </td>
                <td>
                    <?php echo $data['namaJnsKontrol'] == "Kontrol" ?  $data['sep']['peserta']['noKartu'] : $kartu['peserta']['noKartu'] ?>
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
                    <?php echo $data['namaJnsKontrol'] == "Kontrol" ? $data['sep']['peserta']['nama'] : $kartu['peserta']['nama'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Tgl.Lahir
                </td>
                <td>
                    :
                </td>
                <td>
                    <?php echo $data['namaJnsKontrol'] == "Kontrol" ? date('d/m/Y', strtotime($data['sep']['peserta']['tglLahir'])) : date('d/m/Y', strtotime($kartu['peserta']['tglLahir'])) ?>
                </td>
            </tr>


            <tr>
                <td>
                    Diagnosa Awal
                </td>
                <td>
                    :
                </td>
                <td>
                    <?php echo $data['sep']['diagnosa'] ?>
                </td>
            </tr>

            <tr>
                <td>
                    <?= $data['namaJnsKontrol'] == "Kontrol" ? "Rencana Kontrol" : "Rencana Inap" ?>
                </td>
                <td>
                    :
                </td>
                <td>
                    <?php echo   indo_date($data['tglRencanaKontrol']) ?>
                </td>
            </tr>



        </table>


        <br>
        <table width=100% cellspacing=0  class="myfontsize">
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>
                                <div style="width: 100%; text-align: left; float: left;">Demikian atas bantuannya,diucapkan banyak terima kasih.</div><br>
                            </td>
                        </tr>

                    </table>
                </td>

                <td>
                    <table>
                        <tr>

                            <td>
                                <div style=" text-align: left; ">Mengetahui DPJP,</div><br>
                            </td>
                            <!-- <td>
                                <div style="width: 30%; text-align: left;">Pasien/Keluarga Pasien</div><br>
                            </td> -->
                        </tr>

                        <tr>
                            <td>
                                <div style=" text-align: left; "><?= $data['namaDokter'] ?></div><br>
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



    <!-- <link href="</?= base_url() ?>resources/css/styles_print.css?p=</?= date('his') ?>" rel="stylesheet" type="text/css" /> -->
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

        td.myfontsize {
            font-size: 12px;
        }
    </style>

</head>

<body onload="myFunction()">

    <div class="content">
        <table>
            <tr>
                <td>
                    <div style="display: block;"><img src="<?= base_url('assets/dist/img/bpjs.png'); ?>" alt="logo" width="200px" style="margin-top: 10px; margin-right: 50px;" /></div>
                </td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td width=40%>
                    <font size=4% style="font-family: helvetica;"><b><?= $data['namaJnsKontrol'] == "Kontrol" ? "SURAT RENCANA KONTROL" : "SURAT PERINTAH RAWAT INAP" ?></b></font><br>
                    <font size=4%>RS BAKTI TIMAH PANGKALPINANG</font><br>
                </td>
                <td width=20%>

                    <center>
                        <font style=" margin-left: 50px;" size="5"> No.<?= $data['noSuratKontrol'] ?></font>
                    </center>

                </td>
            </tr>

        </table>
       
        <br>

        <table width=100% cellspacing=0 border="0" class="myfontsize">


            <tr>
                <td width=15%>
                    Kepada Yth
                </td>
                <td colspan="2">
                    <?php echo  $data['namaDokter'] ?>

                </td>

            </tr>
            <tr>
                <td width=15%>

                </td>
                <td colspan="2">
                    Sp./Sub. <?php echo  $data['namaPoliTujuan'] ?>

                </td>

            </tr>
            <tr>
                <td colspan="3">
                    Mohon Pemeriksaan dan Penanganan Lebih Lanjut :
                </td>

            </tr>
        </table>
        <table width=100% cellspacing=0 border="0"  class="myfontsize">
            <tr>
                <td width=15%>
                    No.Kartu
                </td>
                <td>
                    :
                </td>
                <td>
                    <?php echo $data['namaJnsKontrol'] == "Kontrol" ?  $data['sep']['peserta']['noKartu'] : $kartu['peserta']['noKartu'] ?>
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
                    <?php echo $data['namaJnsKontrol'] == "Kontrol" ? $data['sep']['peserta']['nama'] : $kartu['peserta']['nama'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Tgl.Lahir
                </td>
                <td>
                    :
                </td>
                <td>
                    <?php echo $data['namaJnsKontrol'] == "Kontrol" ? date('d/m/Y', strtotime($data['sep']['peserta']['tglLahir'])) : date('d/m/Y', strtotime($kartu['peserta']['tglLahir'])) ?>
                </td>
            </tr>


            <tr>
                <td>
                    Diagnosa Awal
                </td>
                <td>
                    :
                </td>
                <td>
                    <?php echo $data['sep']['diagnosa'] ?>
                </td>
            </tr>

            <tr>
                <td>
                    <?= $data['namaJnsKontrol'] == "Kontrol" ? "Rencana Kontrol" : "Rencana Inap" ?>
                </td>
                <td>
                    :
                </td>
                <td>
                    <?php echo   indo_date($data['tglRencanaKontrol']) ?>
                </td>
            </tr>



        </table>


        <br>
        <table width=100% cellspacing=0  class="myfontsize">
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>
                                <div style="width: 100%; text-align: left; float: left;">Demikian atas bantuannya,diucapkan banyak terima kasih.</div><br>
                            </td>
                        </tr>

                    </table>
                </td>

                <td>
                    <table>
                        <tr>

                            <td>
                                <div style=" text-align: left; ">Mengetahui DPJP,</div><br>
                            </td>
                            <!-- <td>
                                <div style="width: 30%; text-align: left;">Pasien/Keluarga Pasien</div><br>
                            </td> -->
                        </tr>

                        <tr>
                            <td>
                                <div style=" text-align: left; "><?= $data['namaDokter'] ?></div><br>
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