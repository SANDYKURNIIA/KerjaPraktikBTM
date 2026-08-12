<<<<<<< HEAD
<!-- <div id="content"> -->
<div class="panel panel-default card-view cetak_panel">

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

        <font><?= $dokter ?></font>
        <table class="b-rtable" border="1" style="border: 1px solid black;">
            <thead>
                <tr class="b-rtable__row">
                    <th width="3%" class="b-rtable__cell -header">No</th>
                    <th class="b-rtable__cell -header">Tgl Masuk</th>
                    <th class="b-rtable__cell -header">Tgl Pulang</th>
                    <th class="b-rtable__cell -header">No MedRec</th>
                    <th class="b-rtable__cell -header">Pasien</th>
                    <th class="b-rtable__cell -header">Jenis Pelayanan</th>
                    <th class="b-rtable__cell -header">Nilai Konsultasi</th>
                    <th class="b-rtable__cell -header">Nilai Tindakan</th>
                    <th class="b-rtable__cell -header">Jumlah</th>
                    <th class="b-rtable__cell -header">Jasa Medis Konsultasi</th>
                    <th class="b-rtable__cell -header">Jasa Medis Tindakan</th>
                    <th class="b-rtable__cell -header">Diskon</th>
                    <th class="b-rtable__cell -header">Jasa Dokter</th>
                </tr>
            </thead>

            <body>
                <?php

                $nomor = 0;
                $stotal = 0;
                $sDiskon = 0;
                $sJasa = 0;
                $sKonsul = 0;
                $sBiaya = 0;
                $sJasmedKonsul = 0;
                $sJasmedTindakan = 0;
                
                foreach ($data as  $row) {
                    $nomor = $nomor + 1;

                ?>
                    <tr class="b-rtable__row -primary">

                        <td align="center" class="font-12"><?php echo $nomor; ?></td>
                        <td align="center" class="font-12"><?php echo indo_date2($row['tgl_masuk']); ?></td>
                        <td align="center" class="font-12"><?php echo indo_date2($row['tgl_keluar']); ?></td>
                        <td align="center" class="font-12"><?php echo sprintf('%06d', $row['no_rm']); ?></td>
                        <td align="center" class="font-12"><?php echo $row['pasien']; ?></td>
                        <td align="center" class="font-12"><?php echo ($row['cara_bayar'] == 'TIMAH PRIORITAS') ? 'POLI PRIORITAS' : $row['jenis_pelayanan']; ?></td>

                        <td align="right" class="font-12"><?php echo number_format(round($row['konsul']), 2, ',', '.') ?></td>
                        <td align="right" class="font-12"><?php echo number_format(round($row['biaya']), 2, ',', '.') ?></td>
                        <td align="right" class="font-12"><?php echo number_format(round($row['total']), 2, ',', '.') ?></td>
                        <td align="right" class="font-12"><?php echo number_format(round($row['jasmed_konsul']), 2, ',', '.') ?></td>
                        <td align="right" class="font-12"><?php echo number_format(round($row['jasmed_tindakan']), 2, ',', '.') ?></td>
                        <td align="right" class="font-12"><?php echo number_format(round($row['diskon']), 2, ',', '.') ?></td>

                        <td align="right" class="font-12"><?php echo number_format(round($row['jasmed']), 2, ',', '.') ?></td>

                    </tr>
                <?php

                    $sKonsul += round($row['konsul']);
                    $sBiaya += round($row['biaya']);
                    $sJasa += round($row['total']);

                    $sJasmedKonsul += round($row['jasmed_konsul']);
                    $sJasmedTindakan += round($row['jasmed_tindakan']);

                    $sDiskon += round($row['diskon']);
                    $stotal += round($row['jasmed']);
                }

                ?>
            </body>
            <tr>
                <td colspan="6" align="right">Total (Rp)&nbsp;&nbsp;&nbsp;</td>

                <td align="right" class="font-12"><?php echo number_format($sKonsul, 2, ',', '.'); ?></td>
                <td align="right" class="font-12"><?php echo number_format($sBiaya, 2, ',', '.'); ?></td>
                <td align="right" class="font-12"><?php echo number_format($sJasa, 2, ',', '.'); ?></td>

                <td align="right" class="font-12"><?php echo number_format($sJasmedKonsul, 2, ',', '.'); ?></td>
                <td align="right" class="font-12"><?php echo number_format($sJasmedTindakan, 2, ',', '.'); ?></td>

                <td align="right" class="font-12"><?php echo number_format($sDiskon, 2, ',', '.'); ?></td>
                <td align="right" class="font-12"><?php echo number_format($stotal, 2, ',', '.'); ?></td>

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
    .cetak_panel {
        /* page-break-before: avoid !important; */
        /* page-break-after: avoid !important; */
        /* page-break-inside: avoid; */

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
        /* transform-origin: left; */
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
        /* word-break: break-all;
        word-wrap: break-word; */
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
        /* word-break: break-all;
        word-wrap: break-word; */
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
=======
<!-- <div id="content"> -->
<div class="panel panel-default card-view cetak_panel">

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

        <font><?= $dokter ?></font>
        <table class="b-rtable" border="1" style="border: 1px solid black;">
            <thead>
                <tr class="b-rtable__row">
                    <th width="3%" class="b-rtable__cell -header">No</th>
                    <th class="b-rtable__cell -header">Tgl Masuk</th>
                    <th class="b-rtable__cell -header">Tgl Pulang</th>
                    <th class="b-rtable__cell -header">No MedRec</th>
                    <th class="b-rtable__cell -header">Pasien</th>
                    <th class="b-rtable__cell -header">Jenis Pelayanan</th>
                    <th class="b-rtable__cell -header">Nilai Konsultasi</th>
                    <th class="b-rtable__cell -header">Nilai Tindakan</th>
                    <th class="b-rtable__cell -header">Jumlah</th>
                    <th class="b-rtable__cell -header">Jasa Medis Konsultasi</th>
                    <th class="b-rtable__cell -header">Jasa Medis Tindakan</th>
                    <th class="b-rtable__cell -header">Diskon</th>
                    <th class="b-rtable__cell -header">Jasa Dokter</th>
                </tr>
            </thead>

            <body>
                <?php

                $nomor = 0;
                $stotal = 0;
                $sDiskon = 0;
                $sJasa = 0;
                $sKonsul = 0;
                $sBiaya = 0;
                $sJasmedKonsul = 0;
                $sJasmedTindakan = 0;
                
                foreach ($data as  $row) {
                    $nomor = $nomor + 1;

                ?>
                    <tr class="b-rtable__row -primary">

                        <td align="center" class="font-12"><?php echo $nomor; ?></td>
                        <td align="center" class="font-12"><?php echo indo_date2($row['tgl_masuk']); ?></td>
                        <td align="center" class="font-12"><?php echo indo_date2($row['tgl_keluar']); ?></td>
                        <td align="center" class="font-12"><?php echo sprintf('%06d', $row['no_rm']); ?></td>
                        <td align="center" class="font-12"><?php echo $row['pasien']; ?></td>
                        <td align="center" class="font-12"><?php echo ($row['cara_bayar'] == 'TIMAH PRIORITAS') ? 'POLI PRIORITAS' : $row['jenis_pelayanan']; ?></td>

                        <td align="right" class="font-12"><?php echo number_format(round($row['konsul']), 2, ',', '.') ?></td>
                        <td align="right" class="font-12"><?php echo number_format(round($row['biaya']), 2, ',', '.') ?></td>
                        <td align="right" class="font-12"><?php echo number_format(round($row['total']), 2, ',', '.') ?></td>
                        <td align="right" class="font-12"><?php echo number_format(round($row['jasmed_konsul']), 2, ',', '.') ?></td>
                        <td align="right" class="font-12"><?php echo number_format(round($row['jasmed_tindakan']), 2, ',', '.') ?></td>
                        <td align="right" class="font-12"><?php echo number_format(round($row['diskon']), 2, ',', '.') ?></td>

                        <td align="right" class="font-12"><?php echo number_format(round($row['jasmed']), 2, ',', '.') ?></td>

                    </tr>
                <?php

                    $sKonsul += round($row['konsul']);
                    $sBiaya += round($row['biaya']);
                    $sJasa += round($row['total']);

                    $sJasmedKonsul += round($row['jasmed_konsul']);
                    $sJasmedTindakan += round($row['jasmed_tindakan']);

                    $sDiskon += round($row['diskon']);
                    $stotal += round($row['jasmed']);
                }

                ?>
            </body>
            <tr>
                <td colspan="6" align="right">Total (Rp)&nbsp;&nbsp;&nbsp;</td>

                <td align="right" class="font-12"><?php echo number_format($sKonsul, 2, ',', '.'); ?></td>
                <td align="right" class="font-12"><?php echo number_format($sBiaya, 2, ',', '.'); ?></td>
                <td align="right" class="font-12"><?php echo number_format($sJasa, 2, ',', '.'); ?></td>

                <td align="right" class="font-12"><?php echo number_format($sJasmedKonsul, 2, ',', '.'); ?></td>
                <td align="right" class="font-12"><?php echo number_format($sJasmedTindakan, 2, ',', '.'); ?></td>

                <td align="right" class="font-12"><?php echo number_format($sDiskon, 2, ',', '.'); ?></td>
                <td align="right" class="font-12"><?php echo number_format($stotal, 2, ',', '.'); ?></td>

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
    .cetak_panel {
        /* page-break-before: avoid !important; */
        /* page-break-after: avoid !important; */
        /* page-break-inside: avoid; */

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
        /* transform-origin: left; */
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
        /* word-break: break-all;
        word-wrap: break-word; */
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
        /* word-break: break-all;
        word-wrap: break-word; */
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</style>