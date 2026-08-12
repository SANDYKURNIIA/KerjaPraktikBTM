<<<<<<< HEAD
<!-- <div id="content"> -->
<div class="panel panel-default card-view">

    <div class="panel-heading">

        <table>
            <tr>
                <td>
                    <div style="display: block;"><img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" height="35px" /></div>
                </td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>
                    <font size=4% style="font-family: helvetica;"><b>RS. BAKTI TIMAH PANGKALPINANG</b></font><br>
                    <font size=2%>Jl. Bukit Baru No.1 Pangkalpinang 33121 Kep. Bangka Belitung, Telp. (0717) 421091 Fax. (0717) 424212</font><br>
                </td>
            </tr>
        </table>
        <hr>
    </div>



    <div class="panel-body">
        <strong><u>
                <h3>
                    <center>K W I T A N S I</center>
                </h3>
            </u>
        </strong>

        <font>
            <center>No . <?= strtoupper($pk); ?></center>
        </font>
        <br>
        <br>

        <table style="width: 95%; margin-left: 50px;">
            <tr>
                <td width="15%">Sudah Terima Dari</td>
                <td width="2%">:</td>
                <td><?= $jurnal->cara_klaim ?></td>
            </tr>
            <tr>
                <td>Uang Sejumlah </td>
                <td>:</td>
                <td id="rcorners2" style="font-style: italic;"># <?= Terbilang(round($jurnal->debet)) ?> Rupiah #</td>
            </tr>
            <tr>
                <td>Untuk Pembayaran </td>
                <td>:</td>
                <td>Biaya <?= ($jurnal->jenis_jurnal == 'RANAP') ? 'Rawat Inap' : 'Rawat Jalan' ?> tanggungan <?= $jurnal->cara_klaim ?> di RSBT Pangkalpinang periode <?= indo_date2($pasien->minn) ?> s.d <?= indo_date2($pasien->maxx) ?></td>
            </tr>

        </table>
        <br>
        <table style="width: 100%;margin-left: 50px;">

            <td width="40%">
                <!-- <div id="rcorners2"> -->
                <table id="rcorners2" style="width: 100%; margin-left: 5px;">
                    <tr>
                        <td width="25%">Jumlah (Rp)</td>
                        <td width="60%" align="right"><?= number_format(round($jurnal->debet), 2, ',', '.') ?></td>
                        <td>&nbsp;&nbsp;</td>

                    </tr>

                </table>
                <br>
                <table id="rcorners2" style="width: 100%; margin-left: 5px;">
                    <tr>
                        <td>RSBT Pangkalpinang </td>
                    </tr>
                    <?php $bank = $this->db->get_where('daftar_bank', ['no_rek!=' => ''])->result();
                    foreach ($bank as $row) { ?>
                        <tr>
                            <td><?= $row->no_rek ?></td>
                        </tr>
                    <?php } ?>

                </table>
                <!-- </div> -->
            </td>
            <td width="60%">
                <table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid white; margin-left: 50px;">
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>Pangkal Pinang, <?php echo indo_date2(date('Y-m-d')) ?></td>

                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td width="70%">Chief Treasury</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td height="100px"><?php $db_staff = $this->db->get_where("staff", ['nama' => 'keuangan'])->row(); ?>
                            <!-- <img src="</?php echo base_url() . 'assets/ttd_qr/' . $db_staff->qr_code; ?>" width="100px"> -->
                        </td>
                       
                    </tr>
                    <tr class="garisbawah">
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td width="70%">Halimah Tusakdiah</td>
                    </tr>
                </table>
            </td>

        </table>
        <br>
        <br>
        <br>
        <br>

        <br>
        <br>
        <br>
        <!-- <table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid white; margin-left: 50px;">
            <tr>
                <td width="70%">Dibuat Oleh:</td>
                <td width="50%">Diperiksa Oleh:</td>
            </tr>
            <tr>
                <td height="100px"><?= $staff ?></td>
                <td height="100px">tes</td>
            </tr>

        </table> -->
    </div>
</div>

<script type="text/javascript">
    window.onafterprint = function(e) {
        closePrintView();
    };

    function closePrintView() {
        window.close();
    }
</script>
<style>
    html,
    body {
        margin: 15pt;
        padding: auto;
    }

    #rcorners2 {
        border-radius: 10px;
        border: 1px solid black;
        padding-left: 10px;
        width: 800px;
        height: 50px;
    }

    @media print {
        @page {
            size: landscape;
            margin: 25pt;
            padding: auto;

            /* @bottom-center {
                content: counter(page) " of "counter(pages);
            } */
        }


    }
=======
<!-- <div id="content"> -->
<div class="panel panel-default card-view">

    <div class="panel-heading">

        <table>
            <tr>
                <td>
                    <div style="display: block;"><img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" height="35px" /></div>
                </td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>
                    <font size=4% style="font-family: helvetica;"><b>RS. BAKTI TIMAH PANGKALPINANG</b></font><br>
                    <font size=2%>Jl. Bukit Baru No.1 Pangkalpinang 33121 Kep. Bangka Belitung, Telp. (0717) 421091 Fax. (0717) 424212</font><br>
                </td>
            </tr>
        </table>
        <hr>
    </div>



    <div class="panel-body">
        <strong><u>
                <h3>
                    <center>K W I T A N S I</center>
                </h3>
            </u>
        </strong>

        <font>
            <center>No . <?= strtoupper($pk); ?></center>
        </font>
        <br>
        <br>

        <table style="width: 95%; margin-left: 50px;">
            <tr>
                <td width="15%">Sudah Terima Dari</td>
                <td width="2%">:</td>
                <td><?= $jurnal->cara_klaim ?></td>
            </tr>
            <tr>
                <td>Uang Sejumlah </td>
                <td>:</td>
                <td id="rcorners2" style="font-style: italic;"># <?= Terbilang(round($jurnal->debet)) ?> Rupiah #</td>
            </tr>
            <tr>
                <td>Untuk Pembayaran </td>
                <td>:</td>
                <td>Biaya <?= ($jurnal->jenis_jurnal == 'RANAP') ? 'Rawat Inap' : 'Rawat Jalan' ?> tanggungan <?= $jurnal->cara_klaim ?> di RSBT Pangkalpinang periode <?= indo_date2($pasien->minn) ?> s.d <?= indo_date2($pasien->maxx) ?></td>
            </tr>

        </table>
        <br>
        <table style="width: 100%;margin-left: 50px;">

            <td width="40%">
                <!-- <div id="rcorners2"> -->
                <table id="rcorners2" style="width: 100%; margin-left: 5px;">
                    <tr>
                        <td width="25%">Jumlah (Rp)</td>
                        <td width="60%" align="right"><?= number_format(round($jurnal->debet), 2, ',', '.') ?></td>
                        <td>&nbsp;&nbsp;</td>

                    </tr>

                </table>
                <br>
                <table id="rcorners2" style="width: 100%; margin-left: 5px;">
                    <tr>
                        <td>RSBT Pangkalpinang </td>
                    </tr>
                    <?php $bank = $this->db->get_where('daftar_bank', ['no_rek!=' => ''])->result();
                    foreach ($bank as $row) { ?>
                        <tr>
                            <td><?= $row->no_rek ?></td>
                        </tr>
                    <?php } ?>

                </table>
                <!-- </div> -->
            </td>
            <td width="60%">
                <table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid white; margin-left: 50px;">
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>Pangkal Pinang, <?php echo indo_date2(date('Y-m-d')) ?></td>

                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td width="70%">Chief Treasury</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td height="100px"><?php $db_staff = $this->db->get_where("staff", ['nama' => 'keuangan'])->row(); ?>
                            <!-- <img src="</?php echo base_url() . 'assets/ttd_qr/' . $db_staff->qr_code; ?>" width="100px"> -->
                        </td>
                       
                    </tr>
                    <tr class="garisbawah">
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td width="70%">Halimah Tusakdiah</td>
                    </tr>
                </table>
            </td>

        </table>
        <br>
        <br>
        <br>
        <br>

        <br>
        <br>
        <br>
        <!-- <table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid white; margin-left: 50px;">
            <tr>
                <td width="70%">Dibuat Oleh:</td>
                <td width="50%">Diperiksa Oleh:</td>
            </tr>
            <tr>
                <td height="100px"><?= $staff ?></td>
                <td height="100px">tes</td>
            </tr>

        </table> -->
    </div>
</div>

<script type="text/javascript">
    window.onafterprint = function(e) {
        closePrintView();
    };

    function closePrintView() {
        window.close();
    }
</script>
<style>
    html,
    body {
        margin: 15pt;
        padding: auto;
    }

    #rcorners2 {
        border-radius: 10px;
        border: 1px solid black;
        padding-left: 10px;
        width: 800px;
        height: 50px;
    }

    @media print {
        @page {
            size: landscape;
            margin: 25pt;
            padding: auto;

            /* @bottom-center {
                content: counter(page) " of "counter(pages);
            } */
        }


    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</style>