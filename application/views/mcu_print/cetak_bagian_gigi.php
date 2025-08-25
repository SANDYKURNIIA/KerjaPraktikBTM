

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
                <br>
                <br>
                <h3 style="margin-top:-10px; text-align: center;">
                    <b><u>PEMERIKSAAN GIGI</u></b>
                </h3>

                <table style="margin-left:5px" cellspacing=0>
                    <tr height=10px>
                        <td width=285px>
                            Nama Lengkap
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
                    <tr height=20px>
                        <td>
                            Pekerjaan
                        </td>
                        <td>: <?php echo $occupation; ?></td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- <h4 style="margin-top:-10px" class="center">
                    <b><u>
                            <br>
                            <br>
                            PEMERIKSAAN MULUT DAN GIGI
                    </b></u>
                </h4> -->

        <tr>
            <table>
                <tbody>
                    <?php

                        ?>

                    <br>
                    <tr class="txt-dark" width="30%">
                        <td style="padding: 0;">
                            <h5 style="margin: 0;">1. Pemeriksaan Kebersihan :</h5>
                            <br>
                            <h5 style="margin: 0;">2. Caries ( O ) Missing ( X )</h5>
                        </td>
                        <td>: <?php echo $pemeriksaan_kebersihan; ?></td>
                    </tr>

                    <td colspan="5" style="margin-bottom: 10px;">
                    <img src="<?= base_url() . $gambar_gigi ?>" style="width: 300px; margin-bottom: 10px;">
                </td>

                                </tr>

                                <tr height="50px">
                                    <td width="285px">
                                        <h5>3. Lain-lain</h5>
                                    </td>
                                    <td>: <?php echo $lain_lain_gigi; ?></td>
                                </tr>

                                <tr height="10px">
                                    <td width="285px">
                                        <strong>KESIMPULAN</strong> 
                                    </td>
                                    <td>: <?php echo $kesimpulan_gigi; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </tr>
                    <!-- <tr height=10px>
                        <td width=265px>
                            Aukultasi
                            (S1 S2 Normal, Regular, Mur - Mur)
                        </td>
                        <td>: <?php echo $aukultasi; ?></td>
                    </tr>
                    <br><br><br><br><br><br><br> -->

                    <table style="float: left; margin-left:40px" cellpading="5">
                        <tbody>
                            <tr height=50px></tr>
                            <tr class="txt-dark" width="30%">
                                <td></td>
                                <td width="350px"></td>
                                <td>Pangkal Pinang, <?= indo_date2($tgl_periksaG) ?> </td>
                            </tr>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
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
                    </table>

</div>
<script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    window.onafterprint = function (e) {
        closePrintView();
    };

    function closePrintView() {
        window.location.href = 'javascript:history.go(-1)';
    }
</script>