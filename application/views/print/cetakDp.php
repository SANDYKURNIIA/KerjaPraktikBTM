<body onload="myFunction()">
    <div class="panel panel-default card-view">
        <div class="panel-heading">
            <strong>
                <h3>
                    <center>RUMAH SAKIT BAKTI TIMAH</center>
                </h3>
            </strong>
            <!-- <p> -->
            <center>FORMULIR PENGECEKAN BARANG</center>
            <br>
            <?php

            date_default_timezone_set('Asia/Jakarta');
            date("Y-m-d");
            $noValid =  sprintf('%04d', $tglStruk['index_dok'], 'dyhtdyu');
            $noDok = $noValid . "/" . "NPB/FARM-RSBT/" . numtor(date("m", strtotime($tglStruk['tgl_buat']))) . "/" . date("Y", strtotime($tglStruk['tgl_buat']));
            ?>
            <table>
                <tr>
                    <td width="30%">NO PENERIMAAN</td>
                    <td>:</td>
                    <td width="35%"><?php echo $noDok; ?></td>
                    <td width="5%"></td>
                    <td>TANGGAL/JAM</td>
                    <td>:</td>
                    <!-- <td><?php echo date("d-m-Y") ?></td> -->
                    <td><?php echo date("d-m-Y", strtotime($tglStruk['tgl_buat'])) . date(" H:i:s", strtotime($tglStruk['tgl_buat'])); ?></td>
                </tr>
                <tr>
                    <td height="15px;"></td>
                </tr>
                <tr>
                    <td>DEBET KEPADA</td>
                    <td>:</td>
                    <td><?php echo $tglStruk['id_produsen']; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td height="30px;"></td>
                </tr>
                <tr>
                    <td colspan="7">UNTUK PEMBAYARAN PEMBELIAN BARANG FARMASI RS. BAKTI TIMAH PANGKALPINANG, DENGAN RINCIAN :</td>
                </tr>
                <tr>
                    <td height="15px;"></td>
                </tr>

                <tr>
                    <td height="15px;"></td>
                </tr>
                <tr>
                    <td width="30%">FAKTUR NOMOR</td>
                    <td>:</td>
                    <td width="35%"><?= $tglStruk['no_faktur']; ?></td>
                    <td width="5%"></td>
                    <td>TANGGAL</td>
                    <td>:</td>
                    <td><?php
                        echo  date("d-m-Y", strtotime($tglStruk['tgl_struk'])); ?></td>

                </tr>
                <tr>
                    <td width="30%">NOMOR PO</td>
                    <td>:</td>
                    <td width="35%"><?= $po['no_dokumen']; ?></td>
                    <td width="5%"></td>
                    <td>TANGGAL PO</td>
                    <td>:</td>
                    <td><?php
                        echo date("d-m-Y", strtotime($po['tgl_faktur'])); ?></td>

                </tr>
                <tr>
                    <td height="20px;"></td>
                </tr>
            </table>

            <table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid black;">
                <tr>
                    <td rowspan="2" align="center">NO</td>
                    <td rowspan="2" align="center">NAMA BARANG</td>
                    <td rowspan="2" align="center">PABRIK</td>
                    <td colspan="4" align="center">BANYAKNYA</td>

                    <td rowspan="2" align="center">HNA</td>
                    <td rowspan="2" align="center">DISC (%)</td>
                    <td rowspan="2" align="center">DISCOUNT (Rp)</td>
                    <td rowspan="2" align="center">JUMLAH</td>
                    <td rowspan="2" align="center">TANGGAL TERIMA BARANG</td>
                    <td rowspan="2" align="center">SUHU</td>
                    <td rowspan="2" align="center">STANDAR</td>
                    <td rowspan="2" align="center">LENGKAP</td>
                </tr>
                <tr>
                    <td align="center">SATUAN</td>
                    <td align="center">PP</td>
                    <td align="center">TERIMA</td>
                    <td align="center">SISA</td>
                </tr>
                <?php
                $ndp = 0;
                $dsk = 0;
                $jfek = 0;
                $jharga = 0;
                $nomor = 1;
                foreach ($data as $row) { ?>
                    <tr align="center">
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['id_prod_obat']; ?></td>
                        <td><?php echo $row['satuan']; ?></td>
                        <td><?php echo $row['pc']; ?></td>
                        <td><?php echo $row['frek']; ?></td>
                        <td><?php $sisa = (is_null($row['sisa'])) ? $row['pc'] - $row['frek'] : $row['sisa'];
                            echo $sisa;
                            ?></td>
                        <td><?php echo number_format($row['harga'], 2, ',', '.'); ?></td>
                        <td><?php echo $row['diskon_rs'] . '%'; ?></td>
                        <td><?php $disss = (($row['diskon_rs'] / 100) * $row['harga'] * $row['frek']);
                            echo number_format($disss, 2, ',', '.') ?></td>

                        <td><?php $jum = $row['harga'] * $row['frek'];
                            echo number_format($jum, 2, ',', '.') ?></td>
                        <td><?php
                            echo  strftime("%d-%m-%Y", strtotime($tglStruk['tgl_masuk'])); ?></td>

                        <td><?php echo $row['suhu']; ?></td>
                        <td><?php echo $row['standar']; ?></td>
                        <td><?php echo $lengkap = ($sisa != 0) ? "TIDAK" : "YA";  ?></td>
                    </tr>
                <?php
                    $ndp += $jum;
                    $dsk += $disss;
                    $jfek += $row['frek'];
                    $jharga += $row['harga_beli'];
                    $nomor++;
                }
                ?>
                <tr align="right">
                    <td colspan="9">NILAI DP</td>
                    <td></td><?php for ($j = 0; $j < 1; $j++) { ?>
                        <td><?php $nilaidp = $data_t[$j]->nilaidp;
                                    echo number_format($ndp, 2, ',', '.') ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                </tr>



                <tr align="right">
                    <td colspan="9">DISKON</td>



                    <td><?php
                                    echo number_format($dsk, 2, ',', '.') ?></td> <?php } ?>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>

                <tr align="right">
                    <td colspan="9">NILAI FAKTUR</td>
                    <td></td>
                    <td><?php $nilai_fak = $ndp - $dsk;
                        echo number_format($nilai_fak, 2, ',', '.') ?></td>
                    <!-- <td><?php $nilai_fak = $row['harga'] * $row['frek'];
                                echo number_format($nilai_fak, 2, ',', '.') ?></td> -->
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr align="right">
                    <td colspan="9">PPN</td>
                    <td></td>
                    <td><?php $jppn = $data[0]['ppn'] / 100;
                        // $jum2 = ($row['harga'] * $row['frek']) * $jppn;
                        $jum2 = ($ndp - $dsk) * $jppn;
                        echo number_format($jum2, 2, ',', '.'); ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>


                <tr align="right">
                    <td colspan="9">TOTAL NILAI FAKTUR</td>
                    <td></td>

                    <td><?php $tot = ($ndp - $dsk) + $jum2;
                        echo number_format($tot, 2, ',', '.') ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>


                <!-- <tr align="right">
                    <td colspan="9">SELISIH</td>
                    <td></td>
                    <td></?php echo 0 ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr> -->
            </table>
            <table>
                <tr>
                    <td height="20px"></td>
                </tr>
                <tr>
                    <td>Terbilang :</td>
                </tr>
                <tr>
                    <td align="right" style="font-style: italic;"><?php echo Terbilang($tot) . " Rupiah"; ?></td>
                </tr>
            </table>
            <hr>
            <p>Keputusan* :</p>
            <p>OK/NOK</p>
            <p>Catatan :</p>
            <br>
            <br>
            <br>
            <table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid white; margin-left: 50px;">
                <tr>
                    <td>Chief Pharmacy Installation</td>
                    <td>UP</td>
                </tr>
                <tr>
                    <td height="100px">Ursula, Apt</td>
                    <td height="100px">Panti Arini</td>
                </tr>

            </table>
        </div>
    </div>
</body>

<script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    window.onafterprint = function(e) {

        closePrintView();
    };

    function myFunction() {

        window.print();

    }


    function closePrintView() {
        window.location.href = 'javascript:history.go(-1)';
    }
</script>