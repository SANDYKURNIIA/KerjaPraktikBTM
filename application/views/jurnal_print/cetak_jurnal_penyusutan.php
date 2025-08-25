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
        <strong>
            <h3>
                <center>JURNAL PENYUSUTAN</center>
            </h3>
        </strong>
        <font>
            <center>Periode : <?= strtoupper($tgl); ?></center>
        </font>
        <br>
        <br>

        <!-- <table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid white; margin-left: 50px;">
            <tr>
                <td width="70%">Dibuat Oleh:</td>
                <td width="50%">Disetujui Oleh:</td>
            </tr>
            <tr>
                <td ><?= $staff ?></td>
                <td ></td></td>
            </tr>

        </table> -->
        <table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid white; margin-left: 50px;">

            <!-- <tr>
                <td colspan="3"></td>

                <td width="10%">JK</td>
                <td>:</td>
                <td width="35%"><?= $jk; ?></td>
            </tr> -->
            <tr>
                <td width="10%">No. Jurnal</td>
                <td>:</td>
                <td width="35%"><?= $no_jurnal; ?></td>
                <td width="10%">JK</td>
                <td>:</td>
                <td width="35%"><?= $jk; ?></td>


            </tr>

        </table>

        <table class="b-rtable" border="1" style="border-collapse: collapse; width: 100%; border: 1px solid black;">
            <thead>
                <tr class="b-rtable__row">
                    <!-- <th class="b-rtable__cell -header">NO</th> -->
                    <th class="b-rtable__cell -header">LAP</th>
                    <th class="b-rtable__cell -header">REKENING</th>
                    <th class="b-rtable__cell -header">PK</th>
                    <th class="b-rtable__cell -header" width="5%">JP/JB</th>
                    <th class="b-rtable__cell -header" width="5%">CF</th>
                    <th class="b-rtable__cell -header">DEBET(Rp)</th>
                    <th class="b-rtable__cell -header">KREDIT(Rp)</th>
                    <th class="b-rtable__cell -header" width="30%">DESKRIPSI</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $jdebet = 0;
                $jkredit = 0;
                $nomor = 0;
                foreach ($data as $row) {
                    $nomor = $nomor + 1; ?>
                    <tr class="b-rtable__row -primary">

                        <td align="center"><?php echo $row['lap']; ?></td>
                        <td align="center"><?php echo $row['rekening']; ?></td>
                        <td align="center"><?php echo $row['pk']; ?></td>
                        <td align="center"><?php echo $row['jb']; ?></td>
                        <td align="center"><?php echo ($jk != 10 && $jk !=11)?0:$row['cj']; ?></td>
                        <td align="right"><?php echo  number_format($row['debet'], 2, ',', '.'); ?></td>
                        <td align="right"><?php echo  number_format($row['kredit'], 2, ',', '.'); ?></td>
                        <td align="left"><?php echo $row['deskripsi']; ?></td>

                    </tr>
                <?php

                    $jdebet += $row['debet'];
                    $jkredit += $row['kredit'];
                }
                ?>
            </tbody>
            <tr>
                <td colspan="5" align="right">Total (Rp)&nbsp;&nbsp;&nbsp;</td>
                <td align="right"><?php echo number_format($jdebet, 2, ',', '.'); ?></td>
                <td align="right"><?php echo number_format($jkredit, 2, ',', '.'); ?></td>
                <td></td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <br>

        <br>
        <br>
        <br>
        <table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid white; margin-left: 50px;">
            <tr>
                <td width="40%">Dibuat Oleh:</td>
                <td width="40%">Diperiksa Oleh:</td>
                <td width="40%">Disetujui Oleh:</td>
            </tr>
            <tr>
                <td height="100px"><?= $staff ?></td>
                <td height="100px">tes</td>
                <td height="100px">tes</td>
            </tr>

        </table>
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
        page-break-before: avoid;

    }

    .b-rtable {
        width: 100%;
        border-collapse: collapse;
        font-size: 16px;
        line-height: 20px;
    }

    .b-rtable__data.-s4,
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
    }

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
        page-break-inside: avoid;
    }

    .b-rtable__container {
        height: 100%;
        width: 100%;
        padding: 2px;
    }

    .b-rtable__row,
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