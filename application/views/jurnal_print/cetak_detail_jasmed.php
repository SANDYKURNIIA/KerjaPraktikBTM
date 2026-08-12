<<<<<<< HEAD
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
                <center><?= $judul ?></center>
            </h3>
        </strong>
        <font>

            <?php $staff = $this->session->userdata('data_auth'); ?>
            <?php if ($staff->ruangan == 'jasmed') { ?>
                <center>Tanggal: <?php echo ($first_date == $second_date) ? strtoupper(indo_date2($first_date)) : strtoupper(indo_date2($first_date)) . ' - ' . strtoupper(indo_date2($second_date)); ?></center>
            <?php } else { ?>
                <center>Tanggal Realisasi: <?php echo ($first_date == $second_date) ? strtoupper(indo_date2($first_date)) : strtoupper(indo_date2($first_date)) . ' - ' . strtoupper(indo_date2($second_date)); ?></center>
            <?php } ?>
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
                    <th class="b-rtable__cell -header">Tgl Masuk</th>
                    <th class="b-rtable__cell -header">Tgl Pulang</th>
                    <th class="b-rtable__cell -header">No MedRec</th>
                    <th class="b-rtable__cell -header">Nama</th>
                    <th class="b-rtable__cell -header">Jenis Pelayanan</th>
                    <th class="b-rtable__cell -header">Jenis Klaim</th>
                    <th class="b-rtable__cell -header">Tindakan</th>
                    <th class="b-rtable__cell -header">Dokter</th>
                    <th class="b-rtable__cell -header">Jasa Dokter</th>
                    <th width="5%" class="b-rtable__cell -header">Frek</th>
                    <th class="b-rtable__cell -header">Total Jasa Dokter</th>
                </tr>
            </thead>

            <body>
                <?php

                $nomor = 0;
                $stotal = 0;
                $sFrek = 0;
                $sJasa = 0;
                foreach ($data as $pelayanan => $key) {
                    foreach ($key as  $row) {
                        $nomor = $nomor + 1;

                ?>
                        <tr class="b-rtable__row -primary">

                            <td align="center" class="font-12"><?php echo $nomor; ?></td>
                            <td align="center" class="font-12"><?php echo indo_date2($row->tgl_masuk); ?></td>
                            <td align="center" class="font-12"><?php echo indo_date2($row->tgl_keluar); ?></td>
                            <td align="center" class="font-12"><?php echo sprintf('%06d', $row->no_rm); ?></td>
                            <td align="center" class="font-12" style="width: 300px; word-break:break-all; word-wrap:break-word;"><?php echo $row->pasien; ?></td>
                            <td align="center" class="font-12" style="width: 300px; word-break:break-all; word-wrap:break-word;"><?php echo ($row->cara_bayar == 'TIMAH PRIORITAS') ? 'POLI PRIORITAS' : $row->jenis_pelayanan; ?></td>
                            <td align="center" class="font-12" style="width: 300px; word-break:break-all; word-wrap:break-word;"><?php echo  $row->cara_bayar; ?></td>
                            <td align="center" class="font-12" style="width: 300px; word-break:break-all; word-wrap:break-word;"><?php echo $row->tindakan; ?></td>
                            <td align="center" class="font-12" style="width: 300px; word-break:break-all; word-wrap:break-word;"><?php echo $row->dokter; ?></td>

                            <td align="right" class="font-12"><?php echo number_format(round($row->jasa_dokter), 2, ',', '.') ?></td>
                            <td align="right" class="font-12"><?php echo number_format(round($row->frek), 2, ',', '.') ?></td>

                            <?php
                            $tindakan = $row->tindakan;
                            $cara_bayar = $row->cara_bayar;
                            $jasa_dokter = $row->jasa_dokter;

                            if ($row->jenis_pelayanan == 'OK') {
                                if (preg_match('/BPJS/i', $cara_bayar)) {
                                    if (preg_match('/operator/i', $tindakan)) { //operator 
                                        $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                                    } else if (preg_match('/anasthesi/i', $tindakan) || preg_match('/anesthesi/i', $tindakan) || preg_match('/anestesi/i', $tindakan)) { //anestesi 
                                        $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                                    } else if (preg_match('/pendamping/i', $tindakan)) { //pendamping 
                                        $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                                    } else {
                                        $jumlah = $jasa_dokter * $row->frek; //dokter
                                    }
                                } else {
                                    $jumlah = $jasa_dokter * $row->frek; //dokter
                                }
                            } else {
                                if (preg_match('/BPJS/i', $cara_bayar)) {
                                    if (preg_match('/konsultasi/i', $tindakan)) { //konsul 

                                        $jumlah = ($row->dokter_spes == 'UMU') ? 30000 : 50000; //dokter
                                    } else { ///tindakan
                                        // $jumlah = ($row->dokter_spes == 'UMU') ? (10000 * $row->frek) : (50000 * $row->frek); //dokter
                                        $jumlah = 5000; //dokter
                                    }
                                } else if ($cara_bayar == 'TIMAH REGULER') {

                                    if (preg_match('/konsultasi/i', $tindakan)) { //konsul 
                                        $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter

                                    } else { ///tindakan
                                        $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter
                                    }
                                } else {

                                    if (preg_match('/visite/i', $tindakan) || preg_match('/konsultasi/i', $tindakan)) { //konsul 
                                        if ($cara_bayar == 'TIMAH PRIORITAS') {
                                            $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                                        } else if ($row->jenis_pelayanan == 'POLI PRIORITAS') {
                                            if (preg_match('/BAYAR SENDIRI/i', $cara_bayar)) {
                                                $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                                            } else {
                                                $jumlah = ($row->dokter_spes == 'UMU') ? ($jasa_dokter * $row->frek) * (64 / 100) : ($jasa_dokter * $row->frek) * (67 / 100); //dokter
                                            }
                                        } else {
                                            $jumlah = ($jasa_dokter * $row->frek) * (72 / 100); //dokter
                                        }
                                    } else { ///tindakan
                                        $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                                    }
                                }
                            } ?>
                            <td align="right" class="font-12"><?php echo number_format(round($jumlah), 2, ',', '.') ?></td>

                        </tr>
                <?php

                        $sJasa += round($row->jasa_dokter);
                        $sFrek += round($row->frek);
                        $stotal += round($jumlah);
                    }
                }
                ?>
            </body>
            <tr>
                <td colspan="9" align="right">Total (Rp)&nbsp;&nbsp;&nbsp;</td>

                <td align="right" class="font-12"><?php echo number_format($sJasa, 2, ',', '.'); ?></td>
                <td align="right" class="font-12"><?php echo number_format($sFrek, 2, ',', '.'); ?></td>
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
=======
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
                <center><?= $judul ?></center>
            </h3>
        </strong>
        <font>

            <?php $staff = $this->session->userdata('data_auth'); ?>
            <?php if ($staff->ruangan == 'jasmed') { ?>
                <center>Tanggal: <?php echo ($first_date == $second_date) ? strtoupper(indo_date2($first_date)) : strtoupper(indo_date2($first_date)) . ' - ' . strtoupper(indo_date2($second_date)); ?></center>
            <?php } else { ?>
                <center>Tanggal Realisasi: <?php echo ($first_date == $second_date) ? strtoupper(indo_date2($first_date)) : strtoupper(indo_date2($first_date)) . ' - ' . strtoupper(indo_date2($second_date)); ?></center>
            <?php } ?>
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
                    <th class="b-rtable__cell -header">Tgl Masuk</th>
                    <th class="b-rtable__cell -header">Tgl Pulang</th>
                    <th class="b-rtable__cell -header">No MedRec</th>
                    <th class="b-rtable__cell -header">Nama</th>
                    <th class="b-rtable__cell -header">Jenis Pelayanan</th>
                    <th class="b-rtable__cell -header">Jenis Klaim</th>
                    <th class="b-rtable__cell -header">Tindakan</th>
                    <th class="b-rtable__cell -header">Dokter</th>
                    <th class="b-rtable__cell -header">Jasa Dokter</th>
                    <th width="5%" class="b-rtable__cell -header">Frek</th>
                    <th class="b-rtable__cell -header">Total Jasa Dokter</th>
                </tr>
            </thead>

            <body>
                <?php

                $nomor = 0;
                $stotal = 0;
                $sFrek = 0;
                $sJasa = 0;
                foreach ($data as $pelayanan => $key) {
                    foreach ($key as  $row) {
                        $nomor = $nomor + 1;

                ?>
                        <tr class="b-rtable__row -primary">

                            <td align="center" class="font-12"><?php echo $nomor; ?></td>
                            <td align="center" class="font-12"><?php echo indo_date2($row->tgl_masuk); ?></td>
                            <td align="center" class="font-12"><?php echo indo_date2($row->tgl_keluar); ?></td>
                            <td align="center" class="font-12"><?php echo sprintf('%06d', $row->no_rm); ?></td>
                            <td align="center" class="font-12" style="width: 300px; word-break:break-all; word-wrap:break-word;"><?php echo $row->pasien; ?></td>
                            <td align="center" class="font-12" style="width: 300px; word-break:break-all; word-wrap:break-word;"><?php echo ($row->cara_bayar == 'TIMAH PRIORITAS') ? 'POLI PRIORITAS' : $row->jenis_pelayanan; ?></td>
                            <td align="center" class="font-12" style="width: 300px; word-break:break-all; word-wrap:break-word;"><?php echo  $row->cara_bayar; ?></td>
                            <td align="center" class="font-12" style="width: 300px; word-break:break-all; word-wrap:break-word;"><?php echo $row->tindakan; ?></td>
                            <td align="center" class="font-12" style="width: 300px; word-break:break-all; word-wrap:break-word;"><?php echo $row->dokter; ?></td>

                            <td align="right" class="font-12"><?php echo number_format(round($row->jasa_dokter), 2, ',', '.') ?></td>
                            <td align="right" class="font-12"><?php echo number_format(round($row->frek), 2, ',', '.') ?></td>

                            <?php
                            $tindakan = $row->tindakan;
                            $cara_bayar = $row->cara_bayar;
                            $jasa_dokter = $row->jasa_dokter;

                            if ($row->jenis_pelayanan == 'OK') {
                                if (preg_match('/BPJS/i', $cara_bayar)) {
                                    if (preg_match('/operator/i', $tindakan)) { //operator 
                                        $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                                    } else if (preg_match('/anasthesi/i', $tindakan) || preg_match('/anesthesi/i', $tindakan) || preg_match('/anestesi/i', $tindakan)) { //anestesi 
                                        $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                                    } else if (preg_match('/pendamping/i', $tindakan)) { //pendamping 
                                        $jumlah = ($jasa_dokter * $row->frek) * (20 / 100); //dokter
                                    } else {
                                        $jumlah = $jasa_dokter * $row->frek; //dokter
                                    }
                                } else {
                                    $jumlah = $jasa_dokter * $row->frek; //dokter
                                }
                            } else {
                                if (preg_match('/BPJS/i', $cara_bayar)) {
                                    if (preg_match('/konsultasi/i', $tindakan)) { //konsul 

                                        $jumlah = ($row->dokter_spes == 'UMU') ? 30000 : 50000; //dokter
                                    } else { ///tindakan
                                        // $jumlah = ($row->dokter_spes == 'UMU') ? (10000 * $row->frek) : (50000 * $row->frek); //dokter
                                        $jumlah = 5000; //dokter
                                    }
                                } else if ($cara_bayar == 'TIMAH REGULER') {

                                    if (preg_match('/konsultasi/i', $tindakan)) { //konsul 
                                        $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter

                                    } else { ///tindakan
                                        $jumlah = ($jasa_dokter * $row->frek) * (50 / 100); //dokter
                                    }
                                } else {

                                    if (preg_match('/visite/i', $tindakan) || preg_match('/konsultasi/i', $tindakan)) { //konsul 
                                        if ($cara_bayar == 'TIMAH PRIORITAS') {
                                            $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                                        } else if ($row->jenis_pelayanan == 'POLI PRIORITAS') {
                                            if (preg_match('/BAYAR SENDIRI/i', $cara_bayar)) {
                                                $jumlah = ($jasa_dokter * $row->frek) * (60 / 100); //dokter
                                            } else {
                                                $jumlah = ($row->dokter_spes == 'UMU') ? ($jasa_dokter * $row->frek) * (64 / 100) : ($jasa_dokter * $row->frek) * (67 / 100); //dokter
                                            }
                                        } else {
                                            $jumlah = ($jasa_dokter * $row->frek) * (72 / 100); //dokter
                                        }
                                    } else { ///tindakan
                                        $jumlah = ($jasa_dokter * $row->frek) * (80 / 100); //dokter
                                    }
                                }
                            } ?>
                            <td align="right" class="font-12"><?php echo number_format(round($jumlah), 2, ',', '.') ?></td>

                        </tr>
                <?php

                        $sJasa += round($row->jasa_dokter);
                        $sFrek += round($row->frek);
                        $stotal += round($jumlah);
                    }
                }
                ?>
            </body>
            <tr>
                <td colspan="9" align="right">Total (Rp)&nbsp;&nbsp;&nbsp;</td>

                <td align="right" class="font-12"><?php echo number_format($sJasa, 2, ',', '.'); ?></td>
                <td align="right" class="font-12"><?php echo number_format($sFrek, 2, ',', '.'); ?></td>
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</style>