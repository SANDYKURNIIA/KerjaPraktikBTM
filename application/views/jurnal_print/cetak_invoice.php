<<<<<<< HEAD
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
        <strong><u>
                <h3>
                    <center>I N V O I C E</center>
                </h3>
            </u>
        </strong>
        <br>
        <font>
            <left>Pangkal Pinang, <?php echo indo_date2(date('Y-m-d')) ?></left>
        </font>
        <br>
        <table style="width: 100%; margin-left: 0px;">
            <tr>
                <td width="10%">Nomor</td>
                <td width="2%">:</td>
                <td><?= $pk ?></td>
            </tr>
            <tr>
                <td>Lampiran </td>
                <td>:</td>
                <td>Terlampir</td>
            </tr>
            <tr>
                <td>Perihal </td>
                <td>:</td>
                <td>Tagihan Pengobatan Pasien</td>
            </tr>

        </table>
        <br>
        <table style="width: 100%; margin-left: 0px;">
            <tr>
                <td>Kepada Yth,</td>
            </tr>
            <tr>
                <td><b><?php $cara_bayar = $this->db->get_where("cara_bayar", ['kode_pelanggan' => $jurnal->id_vendor])->row();  
                echo $cara_bayar->nama ?></b></td>
            </tr>
            <tr>
                <td><?php 
                echo $cara_bayar->alamat;
                ?></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td>Sebelumnya kami ucapkan terima kasih atas kerja sama yang terjalin ini khusus nya dalam hal pelayanan kesehatan.</td>
            </tr>
            <tr>
                <td>Berikut kami sampaikan tagihan <b>Pengobatan pasien <?= ($jurnal->jenis_jurnal == 'RANAP') ? 'Rawat Inap' : 'Rawat Jalan' ?>
                        tanggungan <?= $cara_bayar->nama ?> di Rumah Sakit Bakti Timah Pangkalpinang bulan<?php (indo_date3($pasien->minn) == indo_date3($pasien->maxx))?indo_date3($pasien->maxx):indo_date3($pasien->minn) .' s.d '.indo_date3($pasien->maxx) ?>
                        sbb: </td>
            </tr>
            <tr>
                <td><br></td>
            </tr>

        </table>
        <table class="b-rtable" border="1" style="width: 100%;margin-left: 0px;border:1px solid black;">
            <tr>
                <td width='50%'> Pengobatan pasien <?= ($jurnal->jenis_jurnal == 'RANAP') ? 'Rawat Inap' : 'Rawat Jalan' ?> tanggungan
                    <?= $cara_bayar->nama ?>
                    Periode <?= indo_date2($pasien->minn) ?> s.d <?= indo_date2($pasien->maxx) ?>
                </td>
                <td>Rp. <?= number_format($jurnal->debet, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <td>TOTAL</td>
                <td>Rp. <?= number_format($jurnal->debet, 0, ',', '.') ?></td>
            </tr>
        </table>
        <table style="width: 100%; margin-left: 0px;">

            <tr>
                <td><b>Terbilang: <?= Terbilang(round($jurnal->debet)) ?> Rupiah</b></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
        </table>
        <table style="width: 100%; margin-left: 0px;">

            <tr>
                <td>Pembayaran dapat ditransfer langsung ke :</td>
            </tr>
        </table>
        <table style="width: 100%;margin-left: 0px;">
            <?php $bank = $this->db->get_where('daftar_bank', ['no_rek!=' => ''])->result();
            foreach ($bank as $row) { ?>
                <tr align="left">
                    <td><?= $row->no_rek ?></td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <table style="width: 100%; margin-left: 0px;">

            <tr>
                <td>Demikian atas perhatian dan kerjasamanya kami ucapkan terima kasih.</td>
            </tr>

        </table>
        <br>
        <table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid white; margin-left: 0px;">
            <tr>
                <td>RSBT Pangkalpinang</td>
            </tr>
            <tr>
                <td width="70%">Chief Treasury</td>
            </tr>
            <tr>
                <td height="100px"><?php $db_staff = $this->db->get_where("staff", ['nama' => 'keuangan'])->row(); ?>
                    <!-- <img src="</?php echo base_url() . 'assets/ttd_qr/' . $db_staff->qr_code; ?>" width="100px"> -->
                </td>
            </tr>
            <tr>
                <td>Halimah Tusakdiah</td>
            </tr>
        </table>
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
    html,
    body {
        margin: 15pt;
        padding: auto;
    }

    #rcorners2 {
        border-radius: 10px;
        border: 1px solid black;
        padding-left: 10px;
        width: 800px;
        height: 50px;
    }

    .b-rtable {
        width: 100%;
        border-collapse: collapse;
        font-size: 16px;
        line-height: 20px;
    }

    @media print {
        @page {
            size: portrait;
            margin: 25pt;
            padding: auto;

            /* @bottom-center {
                content: counter(page) " of "counter(pages);
            } */
        }


    }
=======
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
        <strong><u>
                <h3>
                    <center>I N V O I C E</center>
                </h3>
            </u>
        </strong>
        <br>
        <font>
            <left>Pangkal Pinang, <?php echo indo_date2(date('Y-m-d')) ?></left>
        </font>
        <br>
        <table style="width: 100%; margin-left: 0px;">
            <tr>
                <td width="10%">Nomor</td>
                <td width="2%">:</td>
                <td><?= $pk ?></td>
            </tr>
            <tr>
                <td>Lampiran </td>
                <td>:</td>
                <td>Terlampir</td>
            </tr>
            <tr>
                <td>Perihal </td>
                <td>:</td>
                <td>Tagihan Pengobatan Pasien</td>
            </tr>

        </table>
        <br>
        <table style="width: 100%; margin-left: 0px;">
            <tr>
                <td>Kepada Yth,</td>
            </tr>
            <tr>
                <td><b><?php $cara_bayar = $this->db->get_where("cara_bayar", ['kode_pelanggan' => $jurnal->id_vendor])->row();  
                echo $cara_bayar->nama ?></b></td>
            </tr>
            <tr>
                <td><?php 
                echo $cara_bayar->alamat;
                ?></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td>Sebelumnya kami ucapkan terima kasih atas kerja sama yang terjalin ini khusus nya dalam hal pelayanan kesehatan.</td>
            </tr>
            <tr>
                <td>Berikut kami sampaikan tagihan <b>Pengobatan pasien <?= ($jurnal->jenis_jurnal == 'RANAP') ? 'Rawat Inap' : 'Rawat Jalan' ?>
                        tanggungan <?= $cara_bayar->nama ?> di Rumah Sakit Bakti Timah Pangkalpinang bulan<?php (indo_date3($pasien->minn) == indo_date3($pasien->maxx))?indo_date3($pasien->maxx):indo_date3($pasien->minn) .' s.d '.indo_date3($pasien->maxx) ?>
                        sbb: </td>
            </tr>
            <tr>
                <td><br></td>
            </tr>

        </table>
        <table class="b-rtable" border="1" style="width: 100%;margin-left: 0px;border:1px solid black;">
            <tr>
                <td width='50%'> Pengobatan pasien <?= ($jurnal->jenis_jurnal == 'RANAP') ? 'Rawat Inap' : 'Rawat Jalan' ?> tanggungan
                    <?= $cara_bayar->nama ?>
                    Periode <?= indo_date2($pasien->minn) ?> s.d <?= indo_date2($pasien->maxx) ?>
                </td>
                <td>Rp. <?= number_format($jurnal->debet, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <td>TOTAL</td>
                <td>Rp. <?= number_format($jurnal->debet, 0, ',', '.') ?></td>
            </tr>
        </table>
        <table style="width: 100%; margin-left: 0px;">

            <tr>
                <td><b>Terbilang: <?= Terbilang(round($jurnal->debet)) ?> Rupiah</b></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
        </table>
        <table style="width: 100%; margin-left: 0px;">

            <tr>
                <td>Pembayaran dapat ditransfer langsung ke :</td>
            </tr>
        </table>
        <table style="width: 100%;margin-left: 0px;">
            <?php $bank = $this->db->get_where('daftar_bank', ['no_rek!=' => ''])->result();
            foreach ($bank as $row) { ?>
                <tr align="left">
                    <td><?= $row->no_rek ?></td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <table style="width: 100%; margin-left: 0px;">

            <tr>
                <td>Demikian atas perhatian dan kerjasamanya kami ucapkan terima kasih.</td>
            </tr>

        </table>
        <br>
        <table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid white; margin-left: 0px;">
            <tr>
                <td>RSBT Pangkalpinang</td>
            </tr>
            <tr>
                <td width="70%">Chief Treasury</td>
            </tr>
            <tr>
                <td height="100px"><?php $db_staff = $this->db->get_where("staff", ['nama' => 'keuangan'])->row(); ?>
                    <!-- <img src="</?php echo base_url() . 'assets/ttd_qr/' . $db_staff->qr_code; ?>" width="100px"> -->
                </td>
            </tr>
            <tr>
                <td>Halimah Tusakdiah</td>
            </tr>
        </table>
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
    html,
    body {
        margin: 15pt;
        padding: auto;
    }

    #rcorners2 {
        border-radius: 10px;
        border: 1px solid black;
        padding-left: 10px;
        width: 800px;
        height: 50px;
    }

    .b-rtable {
        width: 100%;
        border-collapse: collapse;
        font-size: 16px;
        line-height: 20px;
    }

    @media print {
        @page {
            size: portrait;
            margin: 25pt;
            padding: auto;

            /* @bottom-center {
                content: counter(page) " of "counter(pages);
            } */
        }


    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</style>