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
        <div class="content" id="rekap" style="page-break-after:always;">
            <strong>
                <h3>
                    <center>REKAP PENYUSUTAN</center>
                </h3>
            </strong>

            <table class="b-rtable" border="1" style="border-collapse: collapse; width: 100%; border: 1px solid black;page-break-inside:auto;">
                <thead>
                    <tr class="b-rtable__row">
                        <!-- <th class="b-rtable__cell -header">NO</th> -->
                        <th class="b-rtable__cell -header">NO</th>
                        <th class="b-rtable__cell -header">NO ASSET</th>
                        <th class="b-rtable__cell -header">NAMA ASET</th>
                        <th class="b-rtable__cell -header">NO SERI</th>
                        <th class="b-rtable__cell -header">LOKASI</th>
                        <th class="b-rtable__cell -header">KONDISI</th>
                        <th class="b-rtable__cell -header">VENDOR</th>
                        <th class="b-rtable__cell -header">JENIS ASET</th>
                        <th class="b-rtable__cell -header">TANGGAL PEROLEHAN</th>
                        <th class="b-rtable__cell -header">HARGA PEROLEHAN</th>
                        <th class="b-rtable__cell -header">MASA MANFAAT</th>
                        <th class="b-rtable__cell -header">PENYUSUTAN PER BULAN</th>
                        <th class="b-rtable__cell -header">AKUMULASI DEPRESIASI</th>
                        <th class="b-rtable__cell -header">NILAI BUKU</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $jhargapenyusutan = 0;
                    $jakumulasi = 0;
                    $jnilai = 0;
                    $nomor = 0;
                    foreach ($data as $row) {
                        $nomor = $nomor + 1; ?>
                        <tr class="b-rtable__row -primary">

                            <td align="center"><?php echo $nomor; ?></td>
                            <td align="center"><?php echo $row->no_asset; ?></td>
                            <td align="left" style="padding-left: 5px;"><?php echo $row->item_asset; ?></td>
                            <td align="center"><?php echo $row->no_seri; ?></td>
                            <td align="center"><?php echo $row->lokasi; ?></td>
                            <td align="center"><?php echo $row->kondisi; ?></td>
                            <td align="center"><?php echo $row->vendor; ?></td>
                            <td align="center"><?php echo $row->jenis; ?></td>
                            <td align="center"><?php echo date('d-m-Y', strtotime($row->tgl)); ?></td>
                            <td align="right"><?php echo number_format($row->harga, 2, ',', '.'); ?></td>
                            <td align="center"><?php echo $row->masa; ?></td>
                            <td align="right"><?php if ($row->masa == 0) {
                                                    $hargapenyusutan = round($row->harga, 2);
                                                } else {
                                                    $hargapenyusutan = round($row->harga / $row->masa, 2);
                                                }
                                                echo number_format($hargapenyusutan, 2, ',', '.'); ?></td>
                            <td align="right"><?php $tgl1 = strtotime($row->tgl);
                                                $tgl2 = strtotime('now');
                                                $year1 = date('Y', $tgl1);
                                                $year2 = date('Y', $tgl2);

                                                $month1 = date('m', $tgl1);
                                                $month2 = date('m', $tgl2);

                                                $selisih = (($year2 - $year1) * 12) + ($month2 - $month1);
                                                $hargaakumulasi = $hargapenyusutan * $selisih;
                                                $harganilai = $row->harga - $hargaakumulasi;

                                                if ($harganilai < 0) {
                                                    $nilai = 0;
                                                } else {
                                                    $nilai = $harganilai;
                                                }

                                                if ($nilai == 0) {
                                                    $akumulasi = $row->harga;
                                                } else {
                                                    $akumulasi = $hargaakumulasi;
                                                }
                                                echo number_format($akumulasi, 2, ',', '.'); ?></td>
                            <td align="right"><?php

                                                echo number_format($nilai, 2, ',', '.'); ?></td>


                        </tr>
                    <?php

                        $jhargapenyusutan += $hargapenyusutan;
                        $jakumulasi += $akumulasi;
                        $jnilai += $nilai;
                    }
                    ?>
                </tbody>
                <tr>
                    <?php $total1 = $this->db->query("SELECT j.jenis,j.id,sum(p.harga) harga, sum(r.harga_penyusutan) harga_penyusutan,sum(r.akumulasi) akumulasi, sum(r.nilai_buku) nilai_buku
                        FROM list_asset p , list_kondisi_asset k, list_jenis_asset j,rekap_asset r
                        where p.kondisi = k.kode and p.jenis_asset = j.id and r.id = p.id
                        and r.nilai_buku !=0
                        ")->row();
                    ?>
                    <td colspan="9" align="right">Total (Rp)&nbsp;&nbsp;&nbsp;</td>
                    <td align="right"><?php echo number_format($total1->harga, 2, ',', '.'); ?></td>
                    <td></td>
                    <td align="right"><?php echo number_format($total1->harga_penyusutan, 2, ',', '.'); ?></td>
                    <td align="right"><?php echo number_format($total1->akumulasi, 2, ',', '.'); ?></td>
                    <td align="right"><?php echo number_format($total1->nilai_buku, 2, ',', '.'); ?></td>
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
                    <td height="100px"><?= $staff ?></td>
                    <td height="100px">tes</td>
                </tr>

            </table> -->
        </div>
        <div class="content" id="jenis" style="page-break-after:always;">
            <strong>
                <h3>
                    <center>REKAP PENYUSUTAN PER JENIS ASSET</center>
                </h3>
            </strong>

            <table class="b-rtable" border="1" style="border-collapse: collapse; width: 100%; border: 1px solid black;page-break-inside:auto;">
                <thead>
                    <tr class="b-rtable__row">
                        <!-- <th class="b-rtable__cell -header">NO</th> -->
                        <th class="b-rtable__cell -header">NO</th>
                        <th class="b-rtable__cell -header">JENIS ASSET</th>
                        <th class="b-rtable__cell -header">HARGA PEROLEHAN</th>
                        <th class="b-rtable__cell -header">PENYUSUTAN PER BULAN</th>
                        <th class="b-rtable__cell -header">AKUMULASI DEPRESIASI</th>
                        <th class="b-rtable__cell -header">NILAI BUKU</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $jtotal1 = 0;
                    $jhargapenyusutan1 = 0;
                    $jakumulasi1 = 0;
                    $jnilai1 = 0;
                    $nomor1 = 0;
                    // $data_jenis = $this->db->get_where('list_jenis_asset', ['id !=' => 1])->result();
                    $data_jenis = $this->db->get('list_jenis_asset')->result();
                    foreach ($data_jenis as $row) {
                        $nomor1 = $nomor1 + 1;
                        $total = $this->db->query("SELECT j.jenis,j.id,sum(p.harga) harga, sum(r.harga_penyusutan) harga_penyusutan,sum(r.akumulasi) akumulasi, sum(r.nilai_buku) nilai_buku
                        FROM list_asset p , list_kondisi_asset k, list_jenis_asset j,rekap_asset r
                        where p.kondisi = k.kode and p.jenis_asset = j.id and r.id = p.id
                        and r.jenis = '$row->id' and r.nilai_buku !=0
                        ")->row();
                    ?>
                        <tr class="b-rtable__row -primary">

                            <td align="center"><?php echo $nomor1; ?></td>
                            <td align="left" style="padding-left: 5px;"><?php echo $row->jenis; ?></td>
                            <td align="right"><?php

                                                echo number_format($total->harga, 2, ',', '.'); ?></td>
                            <td align="right"><?php

                                                echo number_format($total->harga_penyusutan, 2, ',', '.'); ?></td>
                            <td align="right"><?php
                                                echo number_format($total->akumulasi, 2, ',', '.'); ?></td>
                            <td align="right"><?php

                                                echo number_format($total->nilai_buku, 2, ',', '.'); ?></td>


                        </tr>
                    <?php

                        $jtotal1 += $total->harga;
                        $jhargapenyusutan1 += $total->harga_penyusutan;
                        $jakumulasi1 += $total->akumulasi;
                        $jnilai1 += $total->nilai_buku;
                    }
                    ?>
                </tbody>
                <tr>
                    <td colspan="2" align="right">Total (Rp)&nbsp;&nbsp;&nbsp;</td>
                    <td align="right"><?php echo number_format($jtotal1, 2, ',', '.'); ?></td>
                    <td align="right"><?php echo number_format($jhargapenyusutan1, 2, ',', '.'); ?></td>
                    <td align="right"><?php echo number_format($jakumulasi1, 2, ',', '.'); ?></td>
                    <td align="right"><?php echo number_format($jnilai1, 2, ',', '.'); ?></td>
                </tr>
            </table>
        </div>


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
<!-- <script type="text/javascript">
    window.onafterprint = function(e) {
        closePrintView();
    };

    function closePrintView() {
        window.close();
    }
</script> -->
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