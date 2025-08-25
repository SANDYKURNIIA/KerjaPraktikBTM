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
                <h3 style="margin-top:-10px; text-align: center;">
                    <b><u>
                            <br>
                            <br>
                            PEMERIKSAAN BAGIAN PENYAKIT PARU
                    </b></u>
                </h3>
            </td>
        </tr>

        <tr>
            <td>
                <table cellspacing=0>
                    <tr height=70px>
                        <td width=200px colspan=2>
                            Yang bertanda tangan dibawah ini, Dokter Rumah Sakit Bakti Timah, dengan ini menerangkan
                            bahwa :
                        </td>
                    </tr>
                    <tr height=10px>
                        <td width=265px>
                            Nama Lengkap
                        </td>
                        <td>: <?php echo $nama_pasien; ?></td>
                    </tr>
                    <tr height=10px>
                        <td>
                            Umur
                        </td>
                        <td>: <?php setlocale(LC_ALL, 'id_ID');
                        date_default_timezone_set('Asia/Jakarta');
                        $time = strtotime($tgl_lahir);
                        $date = strftime(" %d %B %Y ", $time);
                        echo getAge($date) ?></td>
                    </tr>
                    <tr height=10px>
                        <td>
                            Tempat / Tgl. Lahir
                        </td>
                        <td>: <?php echo $tempat_lahir . ' / ' . indo_date2($tgl_lahir); ?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            Pekerjaan
                        </td>
                        <td>: <?php echo $occupation; ?></td>
                    </tr>


                    <tr height=20px>
                        <td colspan=2>
                            <br>

                            Telah melakukan pemeriksaan Paru kepada pasien tersebut dengan hasil :
                            <br>

                            Demikianlah surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
                            <br>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>


        <table cellspacing=0>
            <tbody>
                <tr class="txt-dark" width="30%">
                    <td>
                        <b>ANAMNESIS</b>
                    </td>
                    <td>: <?php echo $anamnesis; ?></td>
                </tr>
            </tbody>

            <tr height=10px>
                <td>
                    <b>PEMERIKSAAN FISIK</b>
                </td>
                <td>: <?php echo $pemeriksaan_fisik; ?></td>
            </tr>

            <tr class="txt-dark" width="30%">
                <td>
                </td>
                <hr>

            <tr height=10px>
                <td width=265px>
                <hr>
                    <div style="display: inline-block; vertical-align: middle;">
                        Inspeksi
                        (Ictus Cordis tak tampak)
                    </div>
                </td>
                <td>: <?php echo $inspeksi; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Palapasi
                    (ictus Cordis teraba di SIC 3-4 , LMCS)
                </td>
                <td>: <?php echo $palapasi; ?></td>
            </tr>
            <tr height=10px>
                <td width=265px>
                    Perkusi
                    (Batas Jantung tidak melebar)
                </td>
                <td>: <?php echo $perkusi; ?></td>
            </tr>
            <tr height=10px>
                <td width=265px>
                    Aukultasi
                    (S1 S2 Normal, Regular, Mur - Mur)
                </td>
                <td>: <?php echo $aukultasi; ?></td>
            </tr>
        </table>

        <table>
            <tbody>
                <tr height=10px>
                    <td width=265px>
                        <hr>
                        <b>PENUNJANG</b>
                    </td>
                    <td>: <?php echo $penunjang; ?></td>
            </tbody>
        </table>


        <table>
            <tbody>
                <td width=265px>
                    <b> K E S A N </b>
                </td>
                <td>: <?php echo $kesan; ?></td>
                <tr height=10px>
                    <td>
                        <b> S A R A N </b>
                    </td>
                    <td>: <?php echo $saran; ?></td>
                </tr>
            </tbody>
        </table>

        <table style="float: right; margin-right:40px" cellpading="5">
            <tbody>
                <tr height=50px></tr>
                <tr class="txt-dark" width="30%">
                    <td></td>
                    <td width="350px"></td>
                    <td><br>Pangkal Pinang, <?= indo_date2($tgl_periksad) ?> </td>
                </tr>
                <tr class="txt-dark" width="30%">
                    <td></td>
                    <td></td>
                    <td>Dokter yang memeriksa, </td>
                </tr>
                <tr height=100px></tr>
                <tr class="txt-dark" width="30%">
                    <td></td>
                    <td></td>
                    <td>(__________________)</td>
                </tr>
        </table>
    </table>
    </td>
    </tr>

    <style>
        .centered-table {
            margin-top: auto;
            margin-bottom: auto;
        }
    </style>

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