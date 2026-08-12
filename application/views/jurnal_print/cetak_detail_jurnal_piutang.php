<<<<<<< HEAD
<div id="content">
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
                    <td width="10%">No. Invoice</td>
                    <td>:</td>
                    <td width="35%"><?= $jurnal->pk; ?></td>


                </tr>

            </table>

            <div class="isi">
                <table class="b-rtable" border="1" style="border: 1px solid black;table-layout:fixed;">
                    <thead>
                        <tr class="b-rtable__row">
                            <th width="2%" class="b-rtable__cell -header">No</th>
                            <th width="5%" class="b-rtable__cell -header">Tgl. Inv </th>
                            <th width="5%" class="b-rtable__cell -header">No Reg</th>
                            <th class="b-rtable__cell -header">Tgl Reg</th>
                            <th width="4%" class="b-rtable__cell -header">No MedRec</th>
                            <th class="b-rtable__cell -header">Nama</th>
                            <th width="4%" class="b-rtable__cell -header">Sts</th>
                            <th width="4%" class="b-rtable__cell -header">Penanggung</th>
                            <th width="4%" class="b-rtable__cell -header">No. Pegawai</th>
                            <th class="b-rtable__cell -header">Dokter</th>
                            <th class="b-rtable__cell -header">Poli</th>
                            <th class="b-rtable__cell -header">Administrasi</th>
                            <th class="b-rtable__cell -header">Konsultasi</th>
                            <th class="b-rtable__cell -header">Visite</th>
                            <th class="b-rtable__cell -header">Tindakan</th>
                            <th class="b-rtable__cell -header">Radiologi</th>
                            <th class="b-rtable__cell -header">Laboratorium</th>
                            <th class="b-rtable__cell -header">Obat & BMHP RAJAL</th>
                            <th class="b-rtable__cell -header">Obat & BMHP NON RAJAL</th>
                            <th class="b-rtable__cell -header">PPN Obat</th>
                            <th class="b-rtable__cell -header">Total</th>
                            <th class="b-rtable__cell -header">Selisih Bayar/Deposit</th>
                            <th class="b-rtable__cell -header">Total Billing</th>
                            <th class="b-rtable__cell -header">Diskon</th>
                            <th class="b-rtable__cell -header">Tagihan</th>


                        </tr>
                    </thead>

                    <body>
                        <?php

                        $stotal = 0;
                        $treduksi = 0;
                        $tpiutang = 0;
                        $tadm = 0;
                        $tkonsul = 0;
                        $tvisite = 0;
                        $ttindakan = 0;
                        $tradiologi = 0;
                        $tlabor = 0;
                        $tobat = 0;
                        $tobatIGD = 0;
                        $tppn = 0;
                        $jtotal = 0;
                        $jtotalbil = 0;
                        $ptotal = 0;
                        $nomor = 0;
                        foreach ($data as $row) {
                            $nomor = $nomor + 1;
                            $no_jurnal = $row['no_jurnal'];
                            $id_pel = $row['id_pelayanan'];
                            $piutang = round($row['total']) - round($row['selisih']) - ($row['reduksi']);

                        ?>
                            <tr class="b-rtable__row -primary">

                                <td align="center" class="font-12"><?php echo $nomor; ?></td>
                                <td align="left" class="font-12"><?php echo indo_date2($row['tgl_keluar']); ?></td>
                                <td align="left" class="font-12"><?php if (preg_match('/pl_/i', $row['id_pelayanan'])) {
                                                                        $arr = explode("_", $row['id_pelayanan']);
                                                                        $kode = $arr[1];
                                                                    } else {
                                                                        $kode = $row['id_pelayanan'];
                                                                    }
                                                                    echo 'RS01' . $kode; ?></td>
                                <td align="center" class="font-12"><?php echo indo_date2($row['tgl_masuk']); ?></td>
                                <td align="center" class="font-12"><?php echo sprintf('%06d', $row['no_rm']); ?></td>
                                <td align="center" class="font-12" style="width: 300px; word-break:break-all; word-wrap:break-word;"><?php echo $row['nama']; ?></td>
                                <td align="center" class="font-12"><?php echo $row['nama_ayah']; ?></td>
                                <td align="center" class="font-12"><?php echo $row['nama_ibu']; ?></td>
                                <td align="center" class="font-12"><?php echo $row['no_id_lain']; ?></td>
                                <td align="center" class="font-12"><?php echo $row['dokter']; ?></td>
                                <td align="center" class="font-12"><?php echo $row['poli']; ?></td>

                                <td align="right" class="font-12"><?php echo number_format(round($row['adm']), 2, ',', '.') ?></td>
                                <td align="right" class="font-12"><?php echo number_format(round($row['konsul']), 2, ',', '.') ?></td>
                                <td align="right" class="font-12"><?php echo number_format(round($row['visite']), 2, ',', '.') ?></td>
                                <td align="right" class="font-12"><?php echo number_format(round($row['tindakan']), 2, ',', '.') ?></td>
                                <td align="right" class="font-12"><?php echo number_format(round($row['radiologi']), 2, ',', '.') ?></td>
                                <td align="right" class="font-12"><?php echo number_format(round($row['labor']), 2, ',', '.') ?></td>
                                <td align="right" class="font-12"><?php echo number_format(round($row['obat']), 2, ',', '.') ?></td>
                                <td align="right" class="font-12"><?php echo number_format(round($row['obat_ranap']), 2, ',', '.') ?></td>
                                <td align="right" class="font-12"><?php echo number_format(round($row['ppn_obat']), 2, ',', '.') ?></td>
                                <td align="right" class="font-12"><?php echo  number_format(round($row['total']), 2, ',', '.'); ?></td>
                                <td align="right" class="font-12"><?php echo number_format(round($row['selisih']), 2, ',', '.') ?></td>
                                <td align="right" class="font-12"><?php echo  number_format(($row['total']) - ($row['selisih']), 2, ',', '.'); ?></td>
                                <td align="right" class="font-12"><?php echo number_format(($row['reduksi']), 2, ',', '.') ?></td>
                                <td align="right" class="font-12"><?php echo number_format($piutang, 2, ',', '.') ?></td>
                            </tr>
                        <?php

                            $stotal += round($row['selisih']);
                            $treduksi += round($row['reduksi']);
                            $tpiutang += $piutang;
                            $tadm += round($row['adm']);
                            $tkonsul += round($row['konsul']);
                            $tvisite += round($row['visite']);
                            $ttindakan += round($row['tindakan']);
                            $tradiologi += round($row['radiologi']);
                            $tlabor += round($row['labor']);
                            $tobat += round($row['obat']);
                            $tobatIGD += round($row['obat_ranap']);
                            $tppn += round($row['ppn_obat']);
                            $jtotal += round($row['total']);
                            $jtotalbil += (round($row['total']) - round($row['selisih']));
                        }
                        ?>
                    </body>
                    <tr>
                        <td colspan="11" align="right">Total (Rp)&nbsp;&nbsp;&nbsp;</td>

                        <td align="right" class="font-12"><?php echo number_format($tadm, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($tkonsul, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($tvisite, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($ttindakan, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($tradiologi, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($tlabor, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($tobat, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($tobatIGD, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($tppn, 2, ',', '.'); ?></td>
                        <!-- <td align="right"><?php echo number_format($ptotal, 2, ',', '.'); ?></td> -->
                        <td align="right" class="font-12"><?php echo number_format($jtotal, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($stotal, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($jtotalbil, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($treduksi, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($tpiutang, 2, ',', '.'); ?></td>
                    </tr>
                </table>
                <br>
                <!-- <br> -->
                <!-- <br>
        <br> -->
                <!-- 
        <br>
        <br>
        <br> -->
                <table style="border-collapse: collapse; width: 100%; margin-left: 50px;">
                    <tr>
                        <td width="70%">Dibuat Oleh:</td>
                        <td width="50%">Diperiksa Oleh:</td>
                    </tr>
                    <tr>
                        <td height="80px"><?php $db_staff = $this->db->get_where("staff", ['nama' => $jurnal->staff])->row(); ?>
                            <!-- <img src="<?php echo 'assets/ttd_qr/' . $db_staff->qr_code; ?>" width="100px"> -->
                        </td>
                        <!-- <td height="100px">tes</td> -->
                        <td height="0px"><?php if ($jurnal->staff_verifikasi != '') {
                                                $db_staff1 = $this->db->get_where("staff", ['nama' => $jurnal->staff_verifikasi])->row(); ?>
                                <!-- <img src="<?php echo 'assets/ttd_qr/' . $db_staff1->qr_code; ?>" width="100px"><?php } ?> -->
                        </td>
                    </tr>
                    <tr>
                        <td><?= $jurnal->staff ?></td>
                        <td><?= $jurnal->staff_verifikasi ?></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    window.onafterprint = function(e) {
        closePrintView();
    };

    function closePrintView() {
        window.close();
    }
</script>
<style>
    /* body {
        page-break-before: avoid;

    } */

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

    /* .isi {
        page-break-inside: avoid;
        display: inline;
    } */

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
    } */

    /* .b-rtable__container.-inline .b-rtable__data {
        display: inline;
    } */

    .b-rtable__cell.-header {
        font-size: 9px;
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
    .font-12 {
        font-size: 8px;
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
<div id="content">
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
                    <td width="10%">No. Invoice</td>
                    <td>:</td>
                    <td width="35%"><?= $jurnal->pk; ?></td>


                </tr>

            </table>

            <div class="isi">
                <table class="b-rtable" border="1" style="border: 1px solid black;table-layout:fixed;">
                    <thead>
                        <tr class="b-rtable__row">
                            <th width="2%" class="b-rtable__cell -header">No</th>
                            <th width="5%" class="b-rtable__cell -header">Tgl. Inv </th>
                            <th width="5%" class="b-rtable__cell -header">No Reg</th>
                            <th class="b-rtable__cell -header">Tgl Reg</th>
                            <th width="4%" class="b-rtable__cell -header">No MedRec</th>
                            <th class="b-rtable__cell -header">Nama</th>
                            <th width="4%" class="b-rtable__cell -header">Sts</th>
                            <th width="4%" class="b-rtable__cell -header">Penanggung</th>
                            <th width="4%" class="b-rtable__cell -header">No. Pegawai</th>
                            <th class="b-rtable__cell -header">Dokter</th>
                            <th class="b-rtable__cell -header">Poli</th>
                            <th class="b-rtable__cell -header">Administrasi</th>
                            <th class="b-rtable__cell -header">Konsultasi</th>
                            <th class="b-rtable__cell -header">Visite</th>
                            <th class="b-rtable__cell -header">Tindakan</th>
                            <th class="b-rtable__cell -header">Radiologi</th>
                            <th class="b-rtable__cell -header">Laboratorium</th>
                            <th class="b-rtable__cell -header">Obat & BMHP RAJAL</th>
                            <th class="b-rtable__cell -header">Obat & BMHP NON RAJAL</th>
                            <th class="b-rtable__cell -header">PPN Obat</th>
                            <th class="b-rtable__cell -header">Total</th>
                            <th class="b-rtable__cell -header">Selisih Bayar/Deposit</th>
                            <th class="b-rtable__cell -header">Total Billing</th>
                            <th class="b-rtable__cell -header">Diskon</th>
                            <th class="b-rtable__cell -header">Tagihan</th>


                        </tr>
                    </thead>

                    <body>
                        <?php

                        $stotal = 0;
                        $treduksi = 0;
                        $tpiutang = 0;
                        $tadm = 0;
                        $tkonsul = 0;
                        $tvisite = 0;
                        $ttindakan = 0;
                        $tradiologi = 0;
                        $tlabor = 0;
                        $tobat = 0;
                        $tobatIGD = 0;
                        $tppn = 0;
                        $jtotal = 0;
                        $jtotalbil = 0;
                        $ptotal = 0;
                        $nomor = 0;
                        foreach ($data as $row) {
                            $nomor = $nomor + 1;
                            $no_jurnal = $row['no_jurnal'];
                            $id_pel = $row['id_pelayanan'];
                            $piutang = round($row['total']) - round($row['selisih']) - ($row['reduksi']);

                        ?>
                            <tr class="b-rtable__row -primary">

                                <td align="center" class="font-12"><?php echo $nomor; ?></td>
                                <td align="left" class="font-12"><?php echo indo_date2($row['tgl_keluar']); ?></td>
                                <td align="left" class="font-12"><?php if (preg_match('/pl_/i', $row['id_pelayanan'])) {
                                                                        $arr = explode("_", $row['id_pelayanan']);
                                                                        $kode = $arr[1];
                                                                    } else {
                                                                        $kode = $row['id_pelayanan'];
                                                                    }
                                                                    echo 'RS01' . $kode; ?></td>
                                <td align="center" class="font-12"><?php echo indo_date2($row['tgl_masuk']); ?></td>
                                <td align="center" class="font-12"><?php echo sprintf('%06d', $row['no_rm']); ?></td>
                                <td align="center" class="font-12" style="width: 300px; word-break:break-all; word-wrap:break-word;"><?php echo $row['nama']; ?></td>
                                <td align="center" class="font-12"><?php echo $row['nama_ayah']; ?></td>
                                <td align="center" class="font-12"><?php echo $row['nama_ibu']; ?></td>
                                <td align="center" class="font-12"><?php echo $row['no_id_lain']; ?></td>
                                <td align="center" class="font-12"><?php echo $row['dokter']; ?></td>
                                <td align="center" class="font-12"><?php echo $row['poli']; ?></td>

                                <td align="right" class="font-12"><?php echo number_format(round($row['adm']), 2, ',', '.') ?></td>
                                <td align="right" class="font-12"><?php echo number_format(round($row['konsul']), 2, ',', '.') ?></td>
                                <td align="right" class="font-12"><?php echo number_format(round($row['visite']), 2, ',', '.') ?></td>
                                <td align="right" class="font-12"><?php echo number_format(round($row['tindakan']), 2, ',', '.') ?></td>
                                <td align="right" class="font-12"><?php echo number_format(round($row['radiologi']), 2, ',', '.') ?></td>
                                <td align="right" class="font-12"><?php echo number_format(round($row['labor']), 2, ',', '.') ?></td>
                                <td align="right" class="font-12"><?php echo number_format(round($row['obat']), 2, ',', '.') ?></td>
                                <td align="right" class="font-12"><?php echo number_format(round($row['obat_ranap']), 2, ',', '.') ?></td>
                                <td align="right" class="font-12"><?php echo number_format(round($row['ppn_obat']), 2, ',', '.') ?></td>
                                <td align="right" class="font-12"><?php echo  number_format(round($row['total']), 2, ',', '.'); ?></td>
                                <td align="right" class="font-12"><?php echo number_format(round($row['selisih']), 2, ',', '.') ?></td>
                                <td align="right" class="font-12"><?php echo  number_format(($row['total']) - ($row['selisih']), 2, ',', '.'); ?></td>
                                <td align="right" class="font-12"><?php echo number_format(($row['reduksi']), 2, ',', '.') ?></td>
                                <td align="right" class="font-12"><?php echo number_format($piutang, 2, ',', '.') ?></td>
                            </tr>
                        <?php

                            $stotal += round($row['selisih']);
                            $treduksi += round($row['reduksi']);
                            $tpiutang += $piutang;
                            $tadm += round($row['adm']);
                            $tkonsul += round($row['konsul']);
                            $tvisite += round($row['visite']);
                            $ttindakan += round($row['tindakan']);
                            $tradiologi += round($row['radiologi']);
                            $tlabor += round($row['labor']);
                            $tobat += round($row['obat']);
                            $tobatIGD += round($row['obat_ranap']);
                            $tppn += round($row['ppn_obat']);
                            $jtotal += round($row['total']);
                            $jtotalbil += (round($row['total']) - round($row['selisih']));
                        }
                        ?>
                    </body>
                    <tr>
                        <td colspan="11" align="right">Total (Rp)&nbsp;&nbsp;&nbsp;</td>

                        <td align="right" class="font-12"><?php echo number_format($tadm, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($tkonsul, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($tvisite, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($ttindakan, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($tradiologi, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($tlabor, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($tobat, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($tobatIGD, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($tppn, 2, ',', '.'); ?></td>
                        <!-- <td align="right"><?php echo number_format($ptotal, 2, ',', '.'); ?></td> -->
                        <td align="right" class="font-12"><?php echo number_format($jtotal, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($stotal, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($jtotalbil, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($treduksi, 2, ',', '.'); ?></td>
                        <td align="right" class="font-12"><?php echo number_format($tpiutang, 2, ',', '.'); ?></td>
                    </tr>
                </table>
                <br>
                <!-- <br> -->
                <!-- <br>
        <br> -->
                <!-- 
        <br>
        <br>
        <br> -->
                <table style="border-collapse: collapse; width: 100%; margin-left: 50px;">
                    <tr>
                        <td width="70%">Dibuat Oleh:</td>
                        <td width="50%">Diperiksa Oleh:</td>
                    </tr>
                    <tr>
                        <td height="80px"><?php $db_staff = $this->db->get_where("staff", ['nama' => $jurnal->staff])->row(); ?>
                            <!-- <img src="<?php echo 'assets/ttd_qr/' . $db_staff->qr_code; ?>" width="100px"> -->
                        </td>
                        <!-- <td height="100px">tes</td> -->
                        <td height="0px"><?php if ($jurnal->staff_verifikasi != '') {
                                                $db_staff1 = $this->db->get_where("staff", ['nama' => $jurnal->staff_verifikasi])->row(); ?>
                                <!-- <img src="<?php echo 'assets/ttd_qr/' . $db_staff1->qr_code; ?>" width="100px"><?php } ?> -->
                        </td>
                    </tr>
                    <tr>
                        <td><?= $jurnal->staff ?></td>
                        <td><?= $jurnal->staff_verifikasi ?></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    window.onafterprint = function(e) {
        closePrintView();
    };

    function closePrintView() {
        window.close();
    }
</script>
<style>
    /* body {
        page-break-before: avoid;

    } */

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

    /* .isi {
        page-break-inside: avoid;
        display: inline;
    } */

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
    } */

    /* .b-rtable__container.-inline .b-rtable__data {
        display: inline;
    } */

    .b-rtable__cell.-header {
        font-size: 9px;
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
    .font-12 {
        font-size: 8px;
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