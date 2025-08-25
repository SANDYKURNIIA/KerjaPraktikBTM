<body onload="myFunction()">
    <div class="panel panel-default card-view">
        <div class="panel-heading">
            <center>REKENING DAFTAR PENERIMAAN BARANG FARMASI</center><p></p>
            <br>
            <table>
                <tr>
                    <td width="30%">NO</td>
                    <td>:</td> <?php for ($i=0; $i < 1; $i++) { 
                        $ppn = $data2[$i]->ppn;
                        ?>
                    <td width="35%"><?php echo $data2[$i]->no_distributor; ?></td>
                    <td width="5%"></td>
                    <td>TANGGAL</td>
                    <td>:</td>
                    <td><?php $tanggal = strtotime($data2[$i]->tgl_input);
            echo $tgl = strftime("%d-%m-%Y", $tanggal); ?></td>
                </tr>
                <tr>
                    <td height="15px;"></td>
                </tr>
                <tr>
                    <td>DEBET KEPADA</td>
                    <td>:</td>
                    <td><?php echo $data2[$i]->distributor; ?></td>
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
            <td colspan="7">UNTUK PEMBAYARAN PEMBELIAN BARANG FARMASI RS. BAKTI TIMAH, DENGAN RINCIAN :</td>
        </tr>
        <tr>
            <td height="15px;"></td>
        </tr>
        <tr>
            <td width="30%">NO</td>
            <td>:</td>
            <td width="35%"><?php echo $data2[$i]->no_dokumen; ?></td>
            <td width="5%"></td>
            <td>TANGGAL</td>
            <td>:</td>
            <td><?php $time = strtotime($data2[$i]->tgl_faktur);
            echo $tgl_faktur = strftime("%d-%m-%Y", $time); ?></td><?php } ?>
        </tr>
        <tr>
            <td height="15px;"></td>
        </tr>
        <tr>
            <td width="30%">FAKTUR NOMOR</td>
            <td>:</td><?php for ($ii=0; $ii <1 ; $ii++) { ?>
            <td width="35%"><?php echo $data2[$ii]->faktur_nomor_dp ?></td>
            <td width="5%"></td>
            <td>TANGGAL</td>
            <td>:</td>
            <td><?php $terima = strtotime($data2[$ii]->tgl_terima); echo  strftime("%d-%m-%Y",$terima); ?></td><?php } ?>
            
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
            <td rowspan="2" align="center">DISCOUNT (%)</td>
            <td rowspan="2" align="center">JUMLAH</td>
            <td rowspan="2" align="center">TANGGAL TERIMA BARANG</td>
            <td rowspan="2" align="center">KET</td>
        </tr>
        <tr>
            <td  align="center">SATUAN</td>
            <td align="center">PP</td>
            <td align="center">TERIMA</td>
            <td align="center">SISA</td>            
        </tr>
        <?php 
            $hna = 0;
            $ndp = 0;
            $dsk = 0;
            $ppp = 0;
            $nomor =1;
            foreach ($data1 as $row) { ?>
        <tr align="center">
            <td><?php echo $nomor; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['id_prod_obat']; ?></td>
            <td><?php echo $row['ppn']; ?></td>
            <td><?php echo $row['frek']; ?></td>
            <td><?php echo $row['frek']; ?></td>
            <td><?php echo $row['frek'] - $row['frek']; ?></td>
            <td><?php $hna = $row['harga_beli']; echo number_format($hna, 2, ',', '.'); ?></td>
            <td><?php $disss = (($row['diskon_rs']/100)*$hna*$row['frek']); echo number_format($disss, 2, ',', '.') ?></td>
            <td><?php $jum = $hna *$row['frek']; echo number_format($jum, 2, ',', '.') ?></td>
            <td><?php echo  strftime("%d-%m-%Y",$terima); ?></td>
            <td><?php echo "-"; ?></td>
        </tr>
        <?php
        $nomor++;
        $ndp += $jum;
        $dsk += $disss;
        $ppp += $row['total'] - $jum;
            }
         ?>
        <tr align="right">
            <td colspan="8">NILAI DP</td>
            <td></td><?php for ($j=0; $j <1 ; $j++) { ?>
            <td><?php $nilaidp = $data_t[$j]->ndp; echo number_format($ndp, 2, ',', '.') ?></td>
            <td></td>
            <td></td>
        </tr>

        

        <tr align="right">
            <td colspan="8">POT</td>

                
           
            <td><?php $pot = $data_t[$j]->diskontotal; echo number_format($dsk, 2, ',', '.') ?></td> <?php } ?>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr align="right">
            <td colspan="8">NILAI FAKTUR</td>
            <td></td>
            <td><?php $nilai_fak = $ndp - $dsk; echo number_format($nilai_fak, 2, ',', '.') ?></td>
            <td></td>
            <td></td>
        </tr>

        <tr align="right">
            <td colspan="8">PPN</td>
            <td></td>
            <td><?php $jum2 = $ppn; echo number_format($jum2, 2, ',', '.'); ?></td>
            <!-- <td><?php echo number_format($ppp, 2, ',', '.'); ?></td>
            <?php for ($jj=0; $jj <1 ; $jj++) { ?> -->
            <!-- <td><?php echo number_format($data_t[$jj]->ppp, 2, ',', '.'); ?></td> -->
            <td></td>
            <td></td>
        </tr>

        <tr align="right">
            <td colspan="8">BEA MATERAI + ONGKOS KIRIM</td>
            <td></td>
            <td><?php echo number_format($data2[$jj]->beaongkir, 2, ',', '.'); ?></td><?php } ?>
            <td></td>
            <td></td>
        </tr>

        <tr align="right">
            <td colspan="8">TOTAL NILAI FAKTUR</td>
            <td></td><?php for ($k=0; $k <1 ; $k++) { ?>
            <td><?php $tot = $data2[$k]->total_keseluruhan; echo number_format($tot, 2, ',', '.') ?></td><?php } ?>
            <!-- <td><?php $tot = $nilai_fak + $jum2 + $beaongkir; echo number_format($tot, 2, ',', '.') ?></td> -->
            <td></td>
            <td></td>
        </tr>
        <!-- <tr align="right">
            <td colspan="8">POTONGAN (PEMBULATAN DP)</td>
            <td></td>
            <td><?php $potongan = $tot - $hargafaktur; echo number_format($potongan, 2, ',', '.') ?></td>
            <td></td>
            <td></td>
        </tr> -->

        <tr align="right">
            <td colspan="8">SELISIH</td>
            <td></td>
            <td><?php echo 0 ?></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <table>
        <tr>
            <td height="20px"></td>
        </tr>
        <tr>
            <td>Terbilang :</td>
        </tr>
        <tr><?php for ($ki=0; $ki<1 ; $ki++) { ?>
            <td align="right" style="font-style: italic;"><?php echo Terbilang($data2[$ki]->total_keseluruhan) ." Rupiah"; ?></td><?php } ?>
        </tr>
    </table>
    <hr>
    <table>
        <tr>
            <td colspan="2" height="20px"></td>
        </tr>
        <tr>
            <td colspan="2">Mengetahui :</td>
        </tr>
        <tr>
            <td height="30px" colspan="2"></td>
        </tr>
        <tr>
            <td colspan="2">RUMAH SAKIT BAKTI TIMAH</td>
        </tr>
        <tr>
            <td width="78%">Direktur</td>
            <td width="30%">Ka. Instalasi Farmasi</td>
        </tr>
    </table>
    <table>
        <tr>
            <td height="70px" colspan="2"></td>
        </tr>
        <tr>
            <td width="76%">Dr. Yuni Fitriani</td>
            <td >Kartika Sari, S.Farm, Apt</td>
        </tr>
        <!-- <input type="hidden" id="id_faktur" value="<?php echo $id_faktur; ?>">
        <input type="hidden" id="no_dokumen" value="<?php echo $no_dokumen; ?>">
        <input type="hidden" id="faktur_nomor" value="<?php echo $nofaktur; ?>">
        <input type="hidden" id="no_dist" value="<?php echo $no; ?>">
        <input type="hidden" id="distributor" value="<?php echo $distributor; ?>">
        <input type="hidden" id="beaongkir" value="<?php echo $beaongkir; ?>">
        <input type="hidden" id="jumlah" value="<?php echo $row['frek']; ?>">
        <input type="hidden" id="harga" value="<?php echo $row['harga']; ?>">
        <input type="hidden" id="diskon" value="<?php echo $pot; ?>">
        <input type="hidden" id="total" value="<?php echo $nilai_fak; ?>">
        <input type="hidden" id="ppn" value="<?php echo $jum2 ?>">
        <input type="hidden" id="total_kes" value="<?php echo $hargafaktur; ?>">
        <input type="hidden" id="no_index" value="<?php echo $no_index; ?>">
        <input type="hidden" id="tgl_terima" value="<?php echo $tgl_terima; ?> ?>">
        <input type="hidden" id="ket" value="<?php echo "-"; ?>"> -->
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

<?php
function Terbilang($nilai) {
        $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        if($nilai==0){
            return "";
        }elseif ($nilai < 12&$nilai!=0) {
            return "" . $huruf[$nilai];
        } elseif ($nilai < 20) {
            return Terbilang($nilai - 10) . " Belas ";
        } elseif ($nilai < 100) {
            return Terbilang($nilai / 10) . " Puluh " . Terbilang($nilai % 10);
        } elseif ($nilai < 200) {
            return " Seratus " . Terbilang($nilai - 100);
        } elseif ($nilai < 1000) {
            return Terbilang($nilai / 100) . " Ratus " . Terbilang($nilai % 100);
        } elseif ($nilai < 2000) {
            return " Seribu " . Terbilang($nilai - 1000);
        } elseif ($nilai < 1000000) {
            return Terbilang($nilai / 1000) . " Ribu " . Terbilang($nilai % 1000);
        } elseif ($nilai < 1000000000) {
            return Terbilang($nilai / 1000000) . " Juta " . Terbilang($nilai % 1000000);
        }elseif ($nilai < 1000000000000) {
            return Terbilang($nilai / 1000000000) . " Milyar " . Terbilang($nilai % 1000000000);
        }elseif ($nilai < 100000000000000) {
            return Terbilang($nilai / 1000000000000) . " Trilyun " . Terbilang($nilai % 1000000000000);
        }elseif ($nilai <= 100000000000000) {
            return "Maaf Tidak Dapat di Prose Karena Jumlah nilai Terlalu Besar ";
        }
    }
?>