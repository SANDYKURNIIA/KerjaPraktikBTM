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
                <center>SALDO AWAL</center>
            </h3>
        </strong>
        <font>
            <center>Tanggal : <?= strtoupper($tgl); ?></center>
        </font>
        <br>
        <br>


        <table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid white; margin-left: 50px;">


        </table>

        <table class="b-rtable" border="1" style="border-collapse: collapse; width: 100%; border: 1px solid black;">
            <thead>
                <tr class="b-rtable__row">
                    <!-- <th class="b-rtable__cell -header">NO</th> -->
                    <th class="b-rtable__cell -header">KODE AKUN</th>
                    <th class="b-rtable__cell -header">NILAI</th>
                    <th class="b-rtable__cell -header">DESKRIPSI</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($data as $row) {

                ?>
                    <tr class="b-rtable__row -primary">

                        <td align="center"><?= $row['rekening'] ?></td>

                        <td align="right"><?php
                                            if ($row['d_k'] == 'KREDIT') {
                                                $debit = '(' . number_format($row['nilai'], 2, ',', '.') . ')';
                                            } else {
                                                $debit = number_format($row['nilai'], 2, ',', '.');
                                            }
                                            echo $debit; ?></td>
                        <td align="left"><?= $row['des_rek'] ?></td>

                    </tr>
                <?php
                }
                ?>
                <!-- <tr class="b-rtable__row -primary">
                    <td>Total</td>
                    <td align="right"></?php $debit = $this->db->query("SELECT ifnull(sum(nilai),0) debit from detail_jurnal_saldo_awal where id_jurnal='$jurnal' and d_k = 'DEBIT'")->row()->debit;
                        $kredit = $this->db->query("SELECT ifnull(sum(nilai),0) kredit from detail_jurnal_saldo_awal where id_jurnal='$jurnal' and d_k = 'KREDIT'")->row()->kredit;
                        echo number_format($debit - $kredit, 2, ',', '.'); ?></td>
                    <td></td>
                </tr> -->
            </tbody>

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