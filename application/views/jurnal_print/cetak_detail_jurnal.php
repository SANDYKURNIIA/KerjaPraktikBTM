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
                <center>REKAPITULASI PASIEN</center>
            </h3>
        </strong>
        <font>
            <center>Tanggal : <?= strtoupper(indo_date2($jurnal->tgl)); ?></center>
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
        <table style="border-collapse: collapse; width: 100%; margin-left: 50px;">

            <tr>
                <td width="10%">No. Jurnal</td>
                <td>:</td>
                <td width="35%"><?= $no_jurnal; ?></td>
                <td width="10%">PK</td>
                <td>:</td>
                <td width="35%"><?= $jurnal->pk; ?></td>


            </tr>

        </table>

        <table class="b-rtable" border="1" style="border-collapse: collapse; width: 100%; border: 1px solid black;">
            <thead>
                <tr class="b-rtable__row">
                    <th class="b-rtable__cell -header">No</th>
                    <th width="10%" class="b-rtable__cell -header">Tgl. Inv </th>
                    <th class="b-rtable__cell -header">No Reg</th>
                    <th class="b-rtable__cell -header">Tgl Reg</th>
                    <th class="b-rtable__cell -header">No MedRec</th>
                    <th class="b-rtable__cell -header">Nama</th>
                    <th class="b-rtable__cell -header">Sts</th>
                    <th class="b-rtable__cell -header">Penanggung</th>
                    <th class="b-rtable__cell -header">No. Pegawai</th>
                    <th class="b-rtable__cell -header">PPN Obat</th>
                    <th class="b-rtable__cell -header">Total(Rp)</th>
                </tr>
            </thead>

            <body>
                <?php

                $jtotal = 0;
                $ptotal = 0;
                $nomor = 0;
                foreach ($data as $row) {
                    $nomor = $nomor + 1;
                    $no_jurnal = $row['no_jurnal'];
                    $id_pel = $row['id_pelayanan'];
                    $ppn = $this->db->query("SELECT sum(total_akun) total 
                    from akun_tindakan 
                    where jenis_akun='PPN OBAT' and no_jurnal = '$no_jurnal' and id_pelayanan='$id_pel'
                    UNION ALL
                    SELECT sum(total_akun) total 
                    from akun_non_pelayanan 
                    where jenis_akun='PPN OBAT' and no_jurnal = '$no_jurnal' and id_pelayanan='$id_pel'
                    ")->row();
                ?>
                    <tr class="b-rtable__row -primary">

                        <td align="center"><?php echo $nomor; ?></td>
                        <td align="center"><?php echo date('d-m-Y', strtotime($row['tgl_keluar'])); ?></td>
                        <td align="center"><?php if (preg_match('/pl_/i', $row['id_pelayanan'])) {
                                                $arr = explode("_", $row['id_pelayanan']);
                                                $kode = $arr[1];
                                            } else {
                                                $kode = $row['id_pelayanan'];
                                            }
                                            echo 'RS01' . $kode; ?></td>
                        <td align="center"><?php echo indo_date2($row['tgl_masuk']); ?></td>
                        <td align="center"><?php echo sprintf('%06d', $row['no_rm']); ?></td>
                        <td align="center"><?php echo $row['nama']; ?></td>
                        <td align="center">-</td>
                        <td align="center">-</td>
                        <td align="center">-</td>
                        <td align="right"><?php echo number_format($ppn->total, 2, ',', '.') ?></td>
                        <td align="right"><?php echo  number_format(round($row['total']), 2, ',', '.'); ?></td>

                    </tr>
                <?php

                    $ptotal += $ppn->total;
                    $jtotal += round($row['total']);
                }
                ?>
            </body>
            <tr>
                <td colspan="9" align="right">Total (Rp)&nbsp;&nbsp;&nbsp;</td>
                <td align="right"><?php echo number_format($ptotal, 2, ',', '.'); ?></td>
                <td align="right"><?php echo number_format($jtotal, 2, ',', '.'); ?></td>

            </tr>
        </table>
        <br>
        <br>
        <br>
        <br>

        <br>
        <br>
        <br>
        <table style="border-collapse: collapse; width: 100%; margin-left: 50px;">
            <tr>
                <td width="70%">Dibuat Oleh:</td>
                <td width="50%">Diperiksa Oleh:</td>
            </tr>
            <tr>
                <td height="100px"><?php $db_staff = $this->db->get_where("staff", ['nama' => $jurnal->staff])->row(); ?>
                    <img src="<?php echo 'assets/ttd_qr/' . $db_staff->qr_code; ?>" width="100px">
                </td>
                <!-- <td height="100px">tes</td> -->
                <td height="100px"><?php if ($jurnal->staff_verifikasi != '') {
                                        $db_staff1 = $this->db->get_where("staff", ['nama' => $jurnal->staff_verifikasi])->row(); ?>
                        <img src="<?php echo 'assets/ttd_qr/' . $db_staff1->qr_code; ?>" width="100px"><?php } ?>
                </td>
            </tr>
            <tr>
                <td><?= $jurnal->staff ?></td>
                <td><?= $jurnal->staff_verifikasi ?></td>
            </tr>

        </table>
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