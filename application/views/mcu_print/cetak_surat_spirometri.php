<style>
td {
    width: "300px";
}
</style>
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
                            <center>PEMERIKSAAN SPIROMETRI</center>

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
                            TGL.LAHIR
                        </td>
                        <td>: <?= indo_date2($tgl_lahir) ?></td>
                    </tr>
                    <tr height=10px>
                        <td>
                            PIHAK
                        </td>
                        <td>: <?php echo $pihak; ?></td>
                    </tr>
                    <tr height=10px>
                        <td>
                            TGL.PEMERIKSAAN
                        </td>
                        <td>: <?= indo_date2($tgl_periksa) ?></td>
                    </tr>
                </table>
            </td>
        </tr>


        <tr>
            <td>
                <table style="margin-left:40px" cellspacing="0">
                    <tr height="40px"></tr>
                    <tr height="50px">
                        <td width="150px">
                            KESIMPULAN
                        </td>
                        <td>: <?php echo $kesimpulan; ?></td>
                    </tr>
                    <tr height="50px">
                        <td width="150px">
                            SARAN
                        </td>
                        <td>: <?php echo $saran ?></td>
                    </tr>
                </table>
            </td>
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
                        <td width="400px"></td>
                        <td><br><br><br><br><br><br><br><br>Pangkal Pinang, <?= indo_date2($tgl_sekarang) ?> </td>
                    </tr>
                    <tr class="txt-dark" width="30%">
                        <td></td>
                        <td></td>
                        <td>Dokter yang memeriksa, </td>
                    </tr>
                    <tr height=150px></tr>
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
window.onafterprint = function(e) {
    closePrintView();
};

function closePrintView() {
    window.location.href = 'javascript:history.go(-1)';
}
</script>