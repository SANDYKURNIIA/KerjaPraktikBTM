<!-- <div id="content"> -->
<div class="panel panel-default card-view">

    <div class="panel-heading">

        <table>
            <tr>
                <td>
                    <div style="display: block;"><img src="assets/dist/img/rsbt_ihc.png" height="35px" /></div>
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
                <center>LAPORAN JASA MEDIS</center>
            </h3>
        </strong>
        <font>
            <center>Tanggal Realisasi: <?php echo ($first_date == $second_date) ? strtoupper(indo_date2($first_date)) : strtoupper(indo_date2($first_date)) . ' - ' . strtoupper(indo_date2($second_date)); ?></center>
        </font>
        <br>
        <br>

        <!-- <table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid white; margin-left: 50px;">
            <tr>
                <td width="70%">Dibuat Oleh:</td>
                <td width="50%">Disetujui Oleh:</td>
            </tr>
            <tr>
                <td ></?= $staff ?></td>
                <td ></td></td>
            </tr>

        </table> -->


        <table class="b-rtable" border="1" style="border: 1px solid black;table-layout:fixed;">
            <thead>
                <tr class="b-rtable__row">
                    <th width="3%" class="b-rtable__cell -header">No</th>
                    <th class="b-rtable__cell -header">Dokter</th>
                    <th class="b-rtable__cell -header">Nilai</th>
                    <th class="b-rtable__cell -header">Diskon</th>
                    <th class="b-rtable__cell -header">Jumlah</th>
                    <th class="b-rtable__cell -header">Jasa Dokter</th>
                    <th class="b-rtable__cell -header">RS</th>
                    <th class="b-rtable__cell -header">Insentif</th>
                </tr>
            </thead>

            <body>
                <?php

                $nomor = 0;
                $stotal = 0;
                $sFrek = 0;
                $sJasa = 0;
                $sRS= 0;
                $sInsentif= 0;
               
                    foreach ($data as  $row) {
                        $nomor = $nomor + 1;

                ?>
                        <tr class="b-rtable__row -primary">

                            <td align="center" class="font-12"><?php echo $nomor; ?></td>
                            <td align="center" class="font-12" style="word-break:break-all; word-wrap:break-word;"><?php echo $row['dokter']; ?></td>

                            <td align="right" class="font-12"><?php echo number_format(round($row['total']), 2, ',', '.') ?></td>
                            <td align="right" class="font-12"><?php echo number_format(round($row['diskon']), 2, ',', '.') ?></td>
                            <td align="right" class="font-12"><?php echo number_format(round($row['total'] ), 2, ',', '.') ?></td>

                            
                            <td align="right" class="font-12"><?php echo number_format(round($row['jasmed']), 2, ',', '.') ?></td>
                            <td align="right" class="font-12"><?php echo number_format(round($row['rs']), 2, ',', '.') ?></td>
                            <td align="right" class="font-12"><?php echo number_format(round($row['karyawan']), 2, ',', '.') ?></td>

                        </tr>
                <?php

                        $sJasa += round($row['total']);
                        $sFrek += round($row['diskon']);
                        $stotal += round($row['jasmed']);
                        $sRS += round($row['rs']);
                        $sInsentif += round($row['karyawan']);
                    }
                
                ?>
            </body>
            <tr>
                <td colspan="2" align="right">Total (Rp)&nbsp;&nbsp;&nbsp;</td>

                <td align="right" class="font-12"><?php echo number_format($sJasa, 2, ',', '.'); ?></td>
                <td align="right" class="font-12"><?php echo number_format($sFrek, 2, ',', '.'); ?></td>
                <td align="right" class="font-12"><?php echo number_format($sJasa, 2, ',', '.'); ?></td>
                <td align="right" class="font-12"><?php echo number_format($stotal, 2, ',', '.'); ?></td>
                <td align="right" class="font-12"><?php echo number_format($sRS, 2, ',', '.'); ?></td>
                <td align="right" class="font-12"><?php echo number_format($sInsentif, 2, ',', '.'); ?></td>

            </tr>
        </table>
        <br>
        <!-- <br> -->

    </div>
</div>
<!-- </div> -->



<script type="text/javascript">
    window.onafterprint = function(e) {
        closePrintView();
    };

    function closePrintView() {
        window.close();
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
        /* font-size: 16px; */
        /* line-height: 20px; */
        /* transform: scale(.5); */
        transform-origin: left;
        /* page-break-inside: avoid; */
        padding-right: 10px;
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
        font-size: 12px;
        font-weight: bold;
        text-align: center;
        padding: 5px;

    }

    .b-rtable__row {
        border: 1px solid #000;
        height: 1px;
        /* padding: 20px; */
    }

    .b-rtable__row td {
        /* padding: 3px; */
    }

    .b-rtable__cell {
        text-align: left;
        vertical-align: top;
        padding: 1px;
        height: inherit;
        word-break: break-all;
        word-wrap: break-word;
        /* page-break-inside: avoid; */
    }

    .b-rtable__container {
        height: 100%;
        width: 100%;
        /* padding: 2px; */
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
    .font-12 {
        font-size: 12px;
        word-break: break-all;
        word-wrap: break-word;
    }

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
            /* margin: 20pt; */

            /* @bottom-center {
                content: counter(page) " of "counter(pages);
            } */
        }

        html,
        body {
            /* zoom: 20%; */
            margin: 20pt;
            /* width: 210mm; */
            /* height: 297mm; */
        }
    }
</style>