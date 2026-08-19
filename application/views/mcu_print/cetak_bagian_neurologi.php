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
                            <center>PEMERIKSAAN NEUROLOGI</center>
                            
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
                        <td>
                            MOTORIK KEKUATAN 
                        </td>
                        <td>: <?php echo $motorik_neu ?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            SENSORIK 
                        </td>
                        <td>: <?php echo $sensorik_neu ?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            KOORDINASI 
                        </td>
                        <td>: <?php echo $koordinasi_neu ?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            REFLEK FISIOLOGIS 
                        </td>
                        <td>: <?php echo $reflek_fisiologis ?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            REFLEK PATOLOGIS 
                        </td>
                        <td>: <?php echo $reflek_patologis ?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            FUNGSI LEHER 
                        </td>
                        <td>: <?php echo $fungsi_leher ?></td>
                    </tr>
                    <tr height=50px>
                        <td>
                            KETERANGAN LAIN - LAIN 
                        </td>
                        <td>: <?php echo $keterangan_neu ?></td>
                    </tr>
                    <tr height=50px>
                        <td>
                            <h4>KESAN NEUROLOGIS  </h4>
                        </td>
                        <td>: <?php echo $kesan_neu ?></td>
                    </tr>
                </table>

            </td>
        </tr>

        <tr>
            <td>
                <table style="float: left; margin-left:40px" cellpadding="5">
                    <tbody>
                        <tr></tr>
                        <tr class="txt-dark" width="30%">
                            <td></td>
                            <td width="350px"></td>
                            <td>Pangkal Pinang, <?= indo_date2($tgl_periksad) ?> </td>
                        </tr>
                        <tr class="txt-dark" width="30%">
                            <td></td>
                            <td></td>
                            <td>Dokter yang memeriksa, </td>
                        </tr>
                        <tr height=90px></tr>
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
</script>