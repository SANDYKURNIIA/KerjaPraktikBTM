<!-- <div id="content"> -->
<div class="panel panel-default card-view">

    <div class="panel-heading">

        <!-- <table>
            <tr>
                <td> <img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" height="70px" /></td>
                <td class="garistebal"></td>
                <td> <a>&emsp;&emsp;<img src="<?= base_url('assets/dist/img/alamat.jpg'); ?>" width="380px" alt="logoa" /></a></td>
            </tr>
        </table> -->
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
        <u>
            <strong>
                <h3>
                    <center>LAPORAN FEE DOKTER KONSULEN</center>
                </h3>
            </strong>
        </u>
        <br>
        <br>


        <table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid white; margin-left: 50px;">

            <tr>
                <td width="10%">Periode</td>
                <td>:</td>
                <td width="35%"><?= date('d/m/Y', strtotime($mulai)); ?> sampai dengan <?= date('d/m/Y', strtotime($akhir)); ?></td>
            </tr>
            <tr>
                <td width="10%">Dokter</td>
                <td>:</td>
                <td width="35%"><?= $dokter; ?></td>
                <td width="10%">Layanan</td>
                <td>:</td>
                <td width="35%"><?= $jenis; ?></td>

            </tr>


        </table>

        <table class="b-rtable" border="1" style="border-collapse: collapse; width: 100%; border: 1px solid black;padding: 10px;page-break-inside:auto;">
            <thead>
                <tr class="b-rtable__row">
                    <th class="b-rtable__cell -header">No</th>
                    <th class="b-rtable__cell -header">No Reg</th>
                    <th class="b-rtable__cell -header">Nama</th>
                    <th class="b-rtable__cell -header">Tanggal</th>
                    <th class="b-rtable__cell -header">Pemeriksaan</th>
                    <th class="b-rtable__cell -header">Nama Poli</th>
                    <th class="b-rtable__cell -header">Tipe Pasien</th>
                    <th class="b-rtable__cell -header">Biaya</th>
                    <th class="b-rtable__cell -header">Jml</th>
                    <th class="b-rtable__cell -header">Fee</th>
                    <!-- <th class="b-rtable__cell -header">RSPPBM</th>
                    <th class="b-rtable__cell -header">RS Lain</th> -->
                    <th class="b-rtable__cell -header">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $biaya = 0;
                $fee = 0;
                $rsppbm = 0;
                $rs_lain = 0;
                $jumlah = 0;
                $nomor = 0;
                // print_arr($data);
                foreach ($data as $row) {

                    $nomor = $nomor + 1;


                ?>
                    <tr class="b-rtable__row -primary">

                        <td align="center"><?php echo  $nomor; ?></td>
                        <td align="center"><?php $arr = explode("_", $row->id_pelayanan);
                                            echo 'RS01' . $arr[1]; ?></td>
                        <td align="center"><?php echo $row->nama; ?></td>
                        <td align="center" width=8%><?php echo date('d-m-Y', strtotime($row->tgl)); ?></td>
                        <td align="center"><?php echo $row->tindakan; ?></td>
                        <td align="center"><?php echo $row->poli; ?></td>
                        <td align="center"><?php echo $row->tipe_pasien; ?></td>
                        <td align="right"><?php echo $row->biaya; ?></td>
                        <td align="center"><?php echo $row->frek; ?></td>
                        <td align="right"><?php echo $row->biaya; ?></td>
                        <!-- <td align="center"><?php $rsppbm = 0;
                                                echo $rsppbm; ?></td>
                        <td align="center"><?php $rs_lain = 0;
                                            echo $rs_lain; ?></td> -->
                        <td align="right"><?php $jumlah = $row->biaya;
                                            echo $jumlah; ?></td>

                    </tr>
                <?php
                    $biaya += $row->biaya;
                    $fee += $fee;
                    $rsppbm += $rsppbm;
                    $rs_lain += $rs_lain;
                    $jumlah += $jumlah;
                }

                ?>
            </tbody>
            <tr>
                <td colspan="7" align="right">Total (Rp)&nbsp;&nbsp;&nbsp;</td>
                <td align="right"><?php echo number_format($biaya, 2, ',', '.'); ?></td>
                <td></td>
                <td align="right"><?php echo number_format($biaya, 2, ',', '.'); ?></td>
                <!-- <td><?php echo number_format($rsppbm, 2, ',', '.'); ?></td>
                <td><?php echo number_format($rs_lain, 2, ',', '.'); ?></td> -->
                <td align="right"><?php echo number_format($biaya, 2, ',', '.'); ?></td>
            </tr>
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
                <td height="100px"><?= $data[0]->staff_verifikasi ?></td>
                <td height="100px">tes</td>
            </tr>

        </table> -->
    </div>
</div>
<!-- </div> -->


<!-- 
<script type="text/javascript">
    window.onload = addPageNumbers;

    function addPageNumbers() {
        var totalPages = Math.ceil(document.body.scrollHeight / 1123); //842px A4 pageheight for 72dpi, 1123px A4 pageheight for 96dpi, 
        for (var i = 1; i <= totalPages; i++) {
            var pageNumberDiv = document.createElement("div");
            var pageNumber = document.createTextNode("Page " + i + " of " + totalPages);
            pageNumberDiv.style.position = "absolute";
            pageNumberDiv.style.top = "calc((" + 1 + " * (297mm)) - 20px)"; //297mm A4 pageheight; 0,5px unknown needed necessary correction value; additional wanted 40px margin from bottom(own element height included)
            pageNumberDiv.style.height = "16px";
            pageNumberDiv.appendChild(pageNumber);
            document.body.insertBefore(pageNumberDiv, document.getElementById("content"));
            pageNumberDiv.style.left = "calc(100% - (" + pageNumberDiv.offsetWidth + "px + 50px))";
        }
    }
</script> -->
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
            /* -webkit-print-color-adjust: exact; */
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
        } */

        /* .b-rtable__data.-postfix,
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
        }

        .b-rtable__row.-primary {
            page-break-before: auto !important;
        } */
        .b-rtable__row.-primary {
            page-break-before: auto !important;
        }

        /* .b-rtable {
            page-break-after: avoid !important;
        } */

        .garisbawah {
            border-bottom: 1px solid;
        }

        .garisatas {
            border-top: 1px solid;
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
                /* size: A4; */
                size: landscape;
                margin: 30pt;

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