<<<<<<< HEAD
<!--  -->

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
                            <p>Kabupaten Bangka, Prov.Kepulauan Bangka Belitung - Indonesia</p>
                            <p>Telp. +62(717)421091,+62(717)433027, Fax+62(717)424212</p>
                            </font>
                        </td>
                    </tr>
                </table>
                <h3 style="margin-top:-10px" class="center">
                    <b><u>
                            <br>
                            <br>
                            <center>PEMERIKSAAN EKG</center>
                            
                    </b></u>
                    <br>
                </h3>
                <table style="margin-left:40px" cellspacing=0>
                    <tr height=10px>

                    </tr>
                    <tr height=10px>
                        <td width=265px>
                            NAMA
                        </td>
                        <td>: <?php echo $nama_pasien; ?></td>
                    </tr>
                    <tr height=10px>
                        <td>
                            UMUR
                        </td>
                        <td>: <?php setlocale(LC_ALL, 'id_ID');
                            date_default_timezone_set('Asia/Jakarta');
                            $time = strtotime($tgl_lahir);
                            $date = strftime(" %d %B %Y ", $time);
                            echo getAge($date) ?></td>
                    </tr>
                    <tr height=10px>
                        <td>
                            PEKERJAAN
                        </td>
                        <td>: <?php echo $occupation; ?></td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td>
                <table style="margin-left:40px" cellspacing=0>
                    <tr height=50px>

                    </tr>
                    <tr height=20px>
                        <td width=265px>
                            RITHME
                        </td>
                        <td>: <?php echo $rithme; ?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            Q.PATHOLOGIS
                        </td>
                        <td>: <?php echo $pathologis?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            ST.DEPRESI
                        </td>
                        <td>: <?php echo $depresi; ?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            T.INVERTED
                        </td>
                        <td>: <?php echo $inverted; ?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            DIAGNOSA EKG
                        </td>
                        <td>: <?php echo $diagnosa; ?></td>
                    </tr>
                    <tr height=50px>
                        <td> <strong>
                            SARAN
                            </strong>
                        </td>
                        <td>: <?php echo $saran ?></td>
                    </tr>

                </table>

            </td>
        </tr>
        
        <tr>
            <td>
                <table style="float: left; margin-left:40px" cellpadding="5">
                    <tbody>
                        <tr height=50px></tr>
                        <tr class="txt-dark" width="30%">
                            <td></td>
                            <td width="350px"></td>
                            <td>Pangkal Pinang, <?= indo_date2($tgl_periksa) ?> </td>
                        </tr>
                        <tr class="txt-dark" width="30%">
                            <td></td>
                            <td></td>
                            <td>Dokter yang memeriksa, </td>
                        </tr>
                        <tr height=60px></tr>
                        <tr class="txt-dark" width="30%">
                            <td></td>
                            <td></td>
                            <td>(__________________)</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>


</div>
<script type="text/javascript">
    window.onafterprint = function (e) {
        closePrintView();
    };

    function closePrintView() {
        window.location.href = 'javascript:history.go(-1)';
    }
=======
<!--  -->

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
                            <p>Kabupaten Bangka, Prov.Kepulauan Bangka Belitung - Indonesia</p>
                            <p>Telp. +62(717)421091,+62(717)433027, Fax+62(717)424212</p>
                            </font>
                        </td>
                    </tr>
                </table>
                <h3 style="margin-top:-10px" class="center">
                    <b><u>
                            <br>
                            <br>
                            <center>PEMERIKSAAN EKG</center>
                            
                    </b></u>
                    <br>
                </h3>
                <table style="margin-left:40px" cellspacing=0>
                    <tr height=10px>

                    </tr>
                    <tr height=10px>
                        <td width=265px>
                            NAMA
                        </td>
                        <td>: <?php echo $nama_pasien; ?></td>
                    </tr>
                    <tr height=10px>
                        <td>
                            UMUR
                        </td>
                        <td>: <?php setlocale(LC_ALL, 'id_ID');
                            date_default_timezone_set('Asia/Jakarta');
                            $time = strtotime($tgl_lahir);
                            $date = strftime(" %d %B %Y ", $time);
                            echo getAge($date) ?></td>
                    </tr>
                    <tr height=10px>
                        <td>
                            PEKERJAAN
                        </td>
                        <td>: <?php echo $occupation; ?></td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td>
                <table style="margin-left:40px" cellspacing=0>
                    <tr height=50px>

                    </tr>
                    <tr height=20px>
                        <td width=265px>
                            RITHME
                        </td>
                        <td>: <?php echo $rithme; ?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            Q.PATHOLOGIS
                        </td>
                        <td>: <?php echo $pathologis?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            ST.DEPRESI
                        </td>
                        <td>: <?php echo $depresi; ?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            T.INVERTED
                        </td>
                        <td>: <?php echo $inverted; ?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            DIAGNOSA EKG
                        </td>
                        <td>: <?php echo $diagnosa; ?></td>
                    </tr>
                    <tr height=50px>
                        <td> <strong>
                            SARAN
                            </strong>
                        </td>
                        <td>: <?php echo $saran ?></td>
                    </tr>

                </table>

            </td>
        </tr>
        
        <tr>
            <td>
                <table style="float: left; margin-left:40px" cellpadding="5">
                    <tbody>
                        <tr height=50px></tr>
                        <tr class="txt-dark" width="30%">
                            <td></td>
                            <td width="350px"></td>
                            <td>Pangkal Pinang, <?= indo_date2($tgl_periksa) ?> </td>
                        </tr>
                        <tr class="txt-dark" width="30%">
                            <td></td>
                            <td></td>
                            <td>Dokter yang memeriksa, </td>
                        </tr>
                        <tr height=60px></tr>
                        <tr class="txt-dark" width="30%">
                            <td></td>
                            <td></td>
                            <td>(__________________)</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>


</div>
<script type="text/javascript">
    window.onafterprint = function (e) {
        closePrintView();
    };

    function closePrintView() {
        window.location.href = 'javascript:history.go(-1)';
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>