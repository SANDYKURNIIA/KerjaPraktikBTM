<!DOCTYPE html>
<html>

<head>



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

        .content1 {
            max-width: 22cm;
            max-height: 11cm;
            margin-left: 10mm;
            margin-right: 10mm;
            margin-top: 3mm;
            margin-bottom: 0mm;
        }

        .center {
            text-align: center;
        }

        /* p {
            margin: 0px;
            padding: 0px;
        } */

        td.myfontsize {
            font-size: 9px;
        }
    </style>

</head>

<body onload="myFunction()">

    <div class="content1">
        <!-- <div class="panel panel-default card-view"> -->

        <!-- <div class="panel-heading"> -->


        <!-- <hr> -->
        <!-- </div> -->
        <!-- <br> -->
        <!-- <div class="panel-body"> -->
        <table>
            <tr>
                <td>
                    <div style="display: block;"><img src="<?= base_url('assets/dist/img/bpjs.png'); ?>" alt="logo" height="30" style="margin-top: 10px;" /></div>
                </td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td width=60%>
                    <font size=4% style="font-family: helvetica;"><b>SURAT ELEGIBILITAS PESERTA</b></font><br>
                    <font size=4%>RS BAKTI TIMAH PANGKALPINANG</font><br>
                </td>

            </tr>
            <tr>

                <td colspan="3" align="right"><?php echo  $prb ?></td>
            </tr>
        </table>
        <table width=80% cellspacing=0 border="0" style="font-size: 9px;margin-top:0px" class="myfontsize">
            <tr>
                <td>

                    <table>
                        <tr>
                            <td width=20%>
                                No. SEP
                            </td>
                            <td width=2%>
                                :
                            </td>
                            <td align="left">
                                <?php echo  $data['noSep'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tgl. SEP
                            </td>
                            <td>
                                :
                            </td>
                            <td align="left">
                                <?php echo  $data['tglSep'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                No.Kartu
                            </td>
                            <td>
                                :
                            </td>
                            <td align="left">
                                <?php echo $data['peserta']['noKartu'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                No.MR
                            </td>
                            <td>
                                :
                            </td>
                            <td align="left">
                                <?php echo $data['peserta']['noMr'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nama Peserta
                            </td>
                            <td>
                                :
                            </td>
                            <td align="left">
                                <?php echo $data['peserta']['nama'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tgl.Lahir
                            </td>
                            <td>
                                :
                            </td>
                            <td align="left" width=50%>
                                <?php echo date('d/m/Y', strtotime($data['peserta']['tglLahir'])) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                No. Telepon
                            </td>
                            <td>
                                :
                            </td>
                            <td align="left" width=50%>
                                <?php echo $noTelepon ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jns.Kelamin
                            </td>
                            <td>
                                :
                            </td>
                            <td align="left" width=50%>
                                <?php echo $data['peserta']['kelamin'] ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Poli Tujuan
                            </td>
                            <td>
                                :
                            </td>
                            <td align="left" width=50%>
                                <?php echo  $data['poli'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Dokter
                            </td>
                            <td>
                                :
                            </td>
                            <td align="left" width=50%>
                                <?php echo ($data['jnsPelayanan'] == 'Rawat Inap') ? $data['kontrol']['nmDokter'] : $data['dpjp']['nmDPJP'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Faskes Perujuk
                            </td>
                            <td>
                                :
                            </td>
                            <td align="left" width=50%>
                                <?php echo   $rujukan ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Diagnosa Awal
                            </td>
                            <td>
                                :
                            </td>
                            <td align="left" width=50%>
                                <?php echo   $data['diagnosa'] ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Catatan
                            </td>
                            <td>
                                :
                            </td>
                            <td align="left" width=50%>
                                <?php echo   $data['catatan'] ?>
                            </td>
                        </tr>


                    </table>

                </td>
                <td>
                    <table>
                        <tr>
                            <td>
                                Peserta
                            </td>
                            <td>
                                : &nbsp;
                            </td>
                            <td width=50%>
                                <?php echo  $data['peserta']['jnsPeserta'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                COB
                            </td>
                            <td>
                                : &nbsp;
                            </td>
                            <td>

                                <?php echo $data['cob']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jns.Rawat
                            </td>
                            <td>
                                : &nbsp;
                            </td>
                            <td>
                                <?php echo $data['jnsPelayanan']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Kls.Rawat
                            </td>
                            <td>
                                : &nbsp;
                            </td>
                            <td>
                                <?php echo  $data['klsRawat']['klsRawatHak'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Kls.Hak
                            </td>
                            <td>
                                : &nbsp;
                            </td>
                            <td>
                                <?php echo  $hakKelas ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Penjamin
                            </td>
                            <td>
                                : &nbsp;
                            </td>
                            <td>
                                <?php echo  $data['penjamin'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tanggal Cetak
                            </td>
                            <td>
                                : &nbsp;
                            </td>
                            <td width=50%>
                                <?php
                                date_default_timezone_set('Asia/Jakarta');
                                echo  date("d/m/Y H:i") ?>

                            </td>
                        </tr>
                    </table>
            </tr>
        </table>
        <!-- 

                <br> -->
        <table width=100% cellspacing=0 style="margin-top: 0px;" class="myfontsize">
            <tr>
                <td width=90%>
                    <table>
                        <tr>
                            <td>
                                <div style="width: 90%; text-align: left; float: left;">
                                    <font size='1px'>*Saya menyetujui BPJS kesehatan menggunakan informasi medis pasien jika di perlukan.</font>
                                </div><br>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="width: 90%; text-align: left; float: left;">
                                    <font size='1px'>*SEP Bukan sebagai bukti penjamin peserta.</font>
                                </div><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="width: 90%; text-align: left; float: left;">
                                    <font size='1px'>**Dengan tampilnya luaran SEP elektronik ini merupakan hasil validasi terhadap eligibilats Pasien secara elektronik
                                        (validasi fingerprint atau biometrik / sistem validasi lain) dan selanjutnya Pasien dapat mengakses pelayanan kesehatan untuk rujukan sesuai ketentuan berlaku.
                                        <br>
                                        Kebenaran dan keaslian atas informasi data Pasien menjadi tanggung jawab penuh FKRTL
                                    </font>
                                </div><br>
                            </td>
                        </tr>
                        <?php
                        if ($data['kdStatusKecelakaan'] != 0) { ?>
                            <tr>
                                <td>
                                    <div style="width: 90%; text-align: left; float: left;">
                                        <font size='1px'>*Peserta Mengalami Kecelakaan lalu lintas,penjamin akan dikoordinasikan RS dengan Jasa Raharja PT terlebih dahulu.</font>
                                    </div><br>
                                </td>
                            </tr>
                        <?php   }
                        ?>
                    </table>
                </td>

                <td>
                    <table class="myfontsize" width="90%">
                        <tr>

                            <td>
                                <div style="width: 35%; float: left;">Pasien/Keluarga Pasien</div>
                            </td>
                        </tr>

                        <tr>
                            <td>


                                <div id="gambar" style=" text-align: left; "></div><br>
                                <?= $data['peserta']['nama'] ?>

                            </td>
                        </tr>

                    </table>
                </td>
            </tr>

        </table>
        <!-- </div> -->
        <!-- </div> -->
    </div>
    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/dist/js/jquery.qrcode.min.js"></script>
    <div id="output" style="display: none;"></div>
    <script>
        jQuery(function() {
            jQuery('#output').qrcode("<?= $data['peserta']['noKartu'] ?>");

            // the lib generate a canvas under target, you should get that canvas, not #output
            // And put the code here would ensure that you can get the canvas, and canvas has the image.
            var canvas = document.querySelector("#output canvas");
            var img = canvas.toDataURL("image/png");
            $(canvas).on('click', function() {
                // Create an anchor, and set its href and download.
                var dl = document.createElement('a');
                dl.setAttribute('href', img);
                dl.setAttribute('download', 'qrcode.png');
                // simulate a click will start download the image, and name is qrcode.png.
                dl.click();
            });

            // Note this will overwrite any current content.
            $('#gambar').html('<img src="' + img + '" width="50px"/>');
        })
    </script>
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

</html>