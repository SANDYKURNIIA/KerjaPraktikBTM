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
            <center>No . <?= date('YmdHis'); ?></center>
        </font>
        <br>
        <br>

        <table style="width: 95%; margin-left: 50px;">
            <tr>
                <td width="15%">Sudah Terima Dari</td>
                <td width="2%">:</td>
                <td><?= $pasien['nama'] .' ('. sprintf('%06d', $pasien['no_rm']).')'; ?></td>
            </tr>
            <tr>
                <td>Uang Sejumlah </td>
                <td>:</td>
                <td id="rcorners2" style="font-style: italic;"># <?= Terbilang($jurnal->total_harga - $jurnal->total_bayar) ?> #</td>
            </tr>
            <tr>
                <td>Untuk Pembayaran </td>
                <td>:</td>
                <td>Biaya Rawat Inap/Rawat Jalan di RSBT Pangkalpinang pada tanggal <?php echo indo_date2(date('Y-m-d', strtotime($jurnal->tanggal))) ?></td>
            </tr>

        </table>
        <br>
        <table style="width: 100%;margin-left: 50px;">

            <td width="40%">
                <!-- <div id="rcorners2"> -->
                <table id="rcorners2" style="width: 100%; margin-left: 5px;">
                    <tr>
                        <td width="25%">Jumlah (Rp)</td>
                        <td width="60%" align="right"><?= number_format($jurnal->total_harga - $jurnal->total_bayar, 2, ',', '.') ?></td>
                        <td>&nbsp;&nbsp;</td>

                    </tr>

                </table>
                <br>
                <!-- <table id="rcorners2" style="width: 100%; margin-left: 5px;">
                    <tr>
                        <td>RSBT Pangkalpinang </td>
                    </tr>
                    </?php $bank = $this->db->get_where('daftar_bank', ['no_rek!=' => ''])->result();
                    foreach ($bank as $row) { ?>
                        <tr>
                            <td></?= $row->no_rek ?></td>
                        </tr>
                    </?php } ?>

                </table> -->
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
                        <td width="70%">Petugas Kasir</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td height="100px">
                            <?php $db_staff = $this->session->userdata("data_auth");
                                            echo $db_staff->nama;
                                            ?>
                            <!-- <img src="</?php echo base_url() . 'assets/ttd_qr/' . $db_staff->qr_code; ?>" width="100px"> -->
                       <br>
                       <font style="font-size:12px;"><b>No NPWP : 71.785.977.1-304.000</b></font>
                        </td>

                    </tr>
                   
                    <tr class="garisbawah">
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td width="70%"></td>
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
</style>