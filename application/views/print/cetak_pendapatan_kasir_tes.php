<!-- <div id="content"> -->
<div class="panel panel-default card-view">

    <div class="panel-heading">

        <table>
            <tr>
                <td>
                    <div style="display: block;"><img src="<?= base_url(); ?>assets/dist/img/rsbt_ihc.png" height="35px" /></div>
                </td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>
                    <div style="font-size: large;font-family: helvetica;"><label><b>RS. BAKTI TIMAH PANGKALPINANG</b></label></div>
                    <div style="font-size: small;padding-top:0px;"><label>Jl. Bukit Baru No.1 Pangkalpinang 33121 Kep. Bangka Belitung, Telp. (0717) 421091 Fax. (0717) 424212</label></div><br>
                </td>
            </tr>
        </table>
        <hr>
    </div>



    <div class="panel-body">
        <strong>
            <h3>
                <center>REKAPITULASI PENDAPATAN HARIAN</center>
            </h3>
        </strong>

        <br>
        <br>


        <table style="border-collapse: collapse; width: 100%; margin-left: 50px;">

            <tr>
                <td width="10%">Tanggal</td>
                <td>:</td>
                <td width="35%"><?= indo_date2($data[0]['tgl_input']); ?></td>
                <td width="10%">Staff</td>
                <td>:</td>
                <td width="35%"><?= $data[0]['staff']; ?></td>


            </tr>

        </table>

        <table class="b-rtable" border="1" style="border-collapse: collapse; width: 100%; border: 1px solid black;">

            <body>
                <?php
                $parent = array();
                $group = array();
                $total_all = 0;
                $nomor = 1;

                foreach ($data as $row) {
                    $parent[$row['tipe']][$row['grouper']][] = $row;
                }
                // print_arr($parent);
                foreach ($parent as $tipe => $val) {
                    foreach ($val as $keterangan => $value) {
                        // $group[$value['nama_bank']][] = $value;
                        $jtotal = 0;
                ?>
                        <tr>
                            <td colspan="5"><?= ($tipe=='RAJAL')?'RAWAT JALAN':'RAWAT INAP' ?></td>
                        </tr>
                        <tr>
                            <th>No</th>
                            <th>No MedRec</th>
                            <th>Nama</th>
                            <th>Opsi Bayar</th>
                            <th>Total(Rp)</th>
                        </tr>
                        <?php foreach ($value as $k) { ?>
                            <tr>

                                <td align="center"><?php echo $nomor++; ?></td>
                                <td align="center"><?php echo sprintf('%06d', $k['no_rm']); ?></td>
                                <td align="center"><?php echo $k['pasien']; ?></td>
                                <td align="center"><?php
                                                    $cara_bayar = ($k['keterangan'] == 'cash') ? strtoupper($k['keterangan']) : strtoupper($k['keterangan']) . ' ' . $k['nama_bank'];

                                                    echo $cara_bayar; ?></td>
                                <td align="right"><?php echo  number_format(round($k['total']), 2, ',', '.'); ?></td>

                            </tr>

                        <?php
                            $jtotal += round($k['total']);
                        } ?>
                        <tr>
                            <td colspan="4" align="right"><strong>Total (Rp)</strong>&nbsp;&nbsp;&nbsp;</td>
                            <td align="right"><strong><?php echo number_format($jtotal, 2, ',', '.'); ?></strong></td>
                        </tr>
                <?php
                        $total_all += $jtotal;
                    }
                } ?>
                <tr>
                    <td colspan="4" align="right"><strong>Total Semua(Rp)</strong>&nbsp;&nbsp;&nbsp;</td>
                    <td align="right"><strong><?php echo number_format($total_all, 2, ',', '.'); ?></strong></td>
                </tr>
            </body>

        </table>
        <br>

    </div>
</div>
<!-- </div> -->



<script type="text/javascript">
    window.onafterprint = function(e) {
        closePrintView();
    };

    function closePrintView() {
        // window.close();
    }
</script>
<style>
    body {
        page-break-before: avoid;

    }

    img {
        display: visible
    }

    .b-rtable {
        width: 100%;
        border-collapse: collapse;
        font-size: 16px;
        line-height: 20px;

    }

    /* .b-rtable__data.-s4,
    .b-rtable__sub.-s4 {
        font-size: 20px;
    }

    .b-rtable__data.-s2,
    .b-rtable__sub.-s2 {
        font-size: 14px;
    }

    .b-rtable__data.-s1,
    .b-rtable__sub.-s1 {
        font-size: 12px;
    }

    .b-rtable__data.-prefix,
    .b-rtable__sub.-prefix {
        margin-right: 5px;
    }

    .b-rtable__data.-postfix,
    .b-rtable__sub.-postfix {
        margin-left: 5px;
    }

    .b-rtable__container.-inline .b-rtable__data {
        display: inline;
    } */

    .b-rtable__cell.-header {
        font-size: 14px;
        font-weight: bold;
        text-align: center;
    }

    .b-rtable__row {
        border: 1px solid #000;
        height: 1px;
    }

    .b-rtable__cell {
        text-align: left;
        vertical-align: top;
        padding: 0;
        height: inherit;
        /* page-break-inside: avoid; */
    }

    .b-rtable__container {
        height: 100%;
        width: 100%;
        padding: 2px;
    }

    /* .b-rtable__row,
    .b-rtable__cell,
    .b-rtable__container {
        page-break-inside: avoid !important;
        page-break-before: avoid !important;
        page-break-after: avoid !important;
    }

    .b-rtable__container {
        page-break-inside: avoid !important;
    } */

    .b-rtable__row.-primary {
        page-break-before: avoid !important;
    }

    .b-rtable {
        page-break-after: avoid !important;
    }


    /* @page {
        size: A4;
        padding: auto;
        margin: 20pt; */

    /* 
        @bottom-center {
            content: counter(page) " of "counter(pages);
        } */
    /* } */

    @media print {
        @page {
            size: landscape;
            margin: 20pt;

            /* @bottom-center {
                content: counter(page) " of "counter(pages);
            } */
        }

        /* html,
        body {
            margin: 20pt;
            width: 210mm;
            height: 297mm;
        } */
    }
</style>