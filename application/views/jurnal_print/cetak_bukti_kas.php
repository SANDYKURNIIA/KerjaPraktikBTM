
    <table>
        <tr>
            <td>
                <div style="display: block;"><img src="<?= base_url('assets/dist/img/btm_ihc.png'); ?>" height="100px" /></div>
            </td>
            <!-- <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> -->
            <td>
                <font size=4% style="font-family: helvetica;"><b>RS. BAKTI TIMAH PANGKALPINANG</b></font><br>
                <font size=2%>Jl. Bukit Baru No.1 Pangkalpinang 33121 Kep. Bangka Belitung, Telp. (0717) 421091 Fax. (0717) 424212</font><br>
            </td>
        </tr>
    </table>

    <hr>



    <strong>
        <h3>
            <center>BUKTI <?=$judul?> KELUAR</center>
        </h3>
    </strong>
    <font>
        <center>No. <?= strtoupper($no_dokumen); ?></center>
    </font>
    <br>
    <br>

    <table style="width: 95%; margin-left: 50px;">
        <tr>
            <td width="15%">Dibayarkan Kepada</td>
            <td width="2%">:</td>
            <td><?php $vendor = $this->db->get_where('produsen', ['kode' => $jurnal->vendor])->row();
                if(isset($vendor)){
                    echo $vendor->nama_produsen;
                }else{
                    echo $jurnal->vendor;
                }
                ?></td>
        </tr>
        <tr>
            <td>Uang Sejumlah </td>
            <td>:</td>
            <td id="rcorners2" style="font-style: italic;"># <?= Terbilang($jurnal->total - $jurnal->kredit) ?> Rupiah #</td>
        </tr>


    </table>

    <table class="b-rtable" border="1" style="border-collapse: collapse; width: 100%; border: 1px solid black;page-break-inside:auto;">
        <thead>
            <tr class="b-rtable__row">
                <!-- <th class="b-rtable__cell -header">NO</th> -->
                <th class="b-rtable__cell -header">RINCIAN</th>
                <th class="b-rtable__cell -header">NO PO</th>
                <th class="b-rtable__cell -header">TOTAL (Rp)</th>
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

                    <td align="center"><?php echo $row->deskripsi; ?></td>
                    <td align="center"><?php echo $row->pk; ?></td>
                    <td align="right"><?php if ($row->kredit != 0) {
                                            echo "(" . number_format($row->debet + $row->kredit, 2, ',', '.') . ")";
                                        } else {
                                            echo  number_format($row->debet + $row->kredit, 2, ',', '.');
                                        }; ?></td>

                </tr>
            <?php

                $jdebet += $row->debet;
            }
            ?>
        </tbody>
        <tr>
            <td colspan="2" align="right">Total (Rp)&nbsp;&nbsp;&nbsp;</td>
            <td align="right"><?php 
            $total = $jurnal->total - $jurnal->kredit;
            if($total < 0){
                echo '('.number_format($total * -1,2, ',', '.').')'; 
            }else{
                echo number_format($total, 2, ',', '.'); 
            }
           ?></td>
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
            <td width="30%">Pemohon:</td>
            <td width="30%">Diperiksa Oleh:</td>
            <td width="30%">Disetujui Oleh:</td>
        </tr>
        <tr>
            <td height="100px"><?php $direktur = $this->db->get_where('staff', ['tipe' => 'direktur', 'status' => 'aktif', 'username !=' => 'direktur'])->row();
                                $db_staff = $this->db->get_where("staff", ['nama' => $direktur->nama])->row(); ?>
                <img src="<?php echo base_url() . 'assets/ttd_qr/' . $db_staff->qr_code; ?>" width="100px">
            </td>
            <!-- <td height="100px">tes</td> -->
            <td height="100px"><?php if ($jurnal->staff != '') {
                                    $db_staff1 = $this->db->get_where("staff", ['nama' => $jurnal->staff])->row(); ?>
                    <img src="<?php echo base_url() . 'assets/ttd_qr/' . $db_staff1->qr_code; ?>" width="100px"><?php } ?>
            </td>
            <td height="100px"><?php if ($jurnal->staff_verifikasi != '') {
                                    $db_staff2 = $this->db->get_where("staff", ['nama' => $jurnal->staff_verifikasi])->row(); ?>
                    <img src="<?php echo base_url() . 'assets/ttd_qr/' . $db_staff2->qr_code; ?>" width="100px"><?php } ?>
            </td>
        </tr>
        <tr>
            <td ><?php
                                echo $direktur->nama; ?></td>
            <td ><?= $jurnal->staff ?></td>
            <td ><?= $jurnal->staff_verifikasi ?></td>
        </tr>

    </table>

  
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
