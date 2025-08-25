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
                <td>Seperti Dimaksud</td>
            </tr>
            <tr>
                <td>Perihal </td>
                <td>:</td>
                <td>Tagihan Biaya <?= ($jurnal->jenis_jurnal == 'RANAP') ? 'Rawat Inap' : 'Rawat Jalan' ?></td>
            </tr>

        </table>
        <br>
        <table style="width: 100%; margin-left: 0px;">
            <tr>
                <td>Kepada Yth,</td>
            </tr>
            <tr>
                <td>Keuangan <?= $jurnal->cara_klaim ?></td>
            </tr>
            <tr>
                <td><?php $cara_bayar = $this->db->get_where("cara_bayar", ['kode_pelanggan' => $jurnal->id_vendor])->row(); 
                echo $cara_bayar->alamat;
                ?></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td>Dengan Hormat,</td>
            </tr>
            <tr>
                <td>Terlampir Kami kirimkan rincian biaya <?= ($jurnal->jenis_jurnal == 'RANAP') ? 'Rawat Inap' : 'Rawat Jalan' ?>
                    tanggungan <?= $jurnal->cara_klaim ?> di RSBT Pangkalpinang periode <?= indo_date2($pasien->minn) ?> s.d <?= indo_date2($pasien->maxx) ?>
                    sebesar Rp. <?= number_format($jurnal->debet, 0, ',', '.') ?>,- (<?= Terbilang(round($jurnal->debet)) ?> Rupiah).</td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td>RSBT Pangkalpinang</td>
            </tr>
        </table>
        <table style="width: 100%;margin-left: 0px;">
            <?php $bank = $this->db->get_where('daftar_bank', ['no_rek!=' => ''])->result();
            foreach ($bank as $row) { ?>
                <tr align="center">
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
                            <!-- <img src="</?php echo base_url() . 'assets/ttd_qr/' . $db_staff->qr_code; ?>" width="100px"></td> -->
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
</style>