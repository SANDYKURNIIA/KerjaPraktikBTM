<<<<<<< HEAD
<body onload="myFunction()" style="margin-top: 50px;">
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
            <br>
            <?php
            
            date_default_timezone_set('Asia/Jakarta');
            date("Y-m-d");
            $noValid =  sprintf('%04d', $tglStruk['index_dok'], 'dyhtdyu');
            $noDok = $noValid . "/" . "NPB/FARM-RSBT/" . numtor(date("m", strtotime($tglStruk['tgl_buat']))) . "/" . date("Y", strtotime($tglStruk['tgl_buat']));
            ?>
            <table>
                <tr>
                    <td>TANGGAL/JAM</td>
                    <td>:</td>
                    <td><?php echo date("d-m-Y", strtotime($tglStruk['tgl_buat'])) . date(" H:i:s", strtotime($tglStruk['tgl_buat'])); ?></td>
                    <td width="10%">NO PENERIMAAN</td>
                    <td>:</td>
                    <td width="35%"><?php echo $noDok; ?></td>
                </tr>
                <tr>
                    <td width="10%">NO FAKTUR</td>
                    <td>:</td>
                    <td width="35%"><?php echo $tglStruk['no_faktur']; ?></td>
                    <td width="10%">TANGGAL FAKTUR</td>
                    <td>:</td>
                    <td width="35%"><?php echo date("d-m-Y", strtotime($tglStruk['tgl_struk'])); ?></td>

                </tr>
                <tr>
                    <td width="10%">NO PO</td>
                    <td>:</td>
                    <td width="35%"><?php echo $po['no_dokumen']; ?></td>
                    <td width="10%">VENDOR</td>
                    <td>:</td>
                    <td width="35%"><?php echo $tglStruk['id_produsen']; ?></td>
                </tr>

                <tr>
                    <td width="10%">TANGGAL PO</td>
                    <td>:</td>
                    <td width="35%"><?php echo date("d-m-Y",strtotime($po['tgl_faktur'])); ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            </table>

            <table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid black;">
                <tr>
                    <td align="center">NO</td>
                    <td align="center">NAMA BARANG</td>
                    <td align="center">PRODUK</td>
                    <td align="center">SATUAN</td>
                    <td align="center">PC</td>
                    <td align="center">SUDAH DITERIMA</td>
                    <td align="center">SUHU</td>
                    <td align="center">LENGKAP</td>
                    <!-- <td align="center">SESUAI</td> -->
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
                        <td><?php echo $row['suhu']; ?></td>
                        <td><?php echo $lengkap = ($row['status'] == '0') ? "TIDAK" : "YA"; ?></td>
                        <!-- <td>YA / TIDAK</td> -->
                    </tr>
                <?php
                    $nomor++;
                }
                ?>

            </table>
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
        // id_faktur = $("#id_faktur").val();
        // no_dokumen = $("#no_dokumen").val();
        // faktur_nomor = $("#faktur_nomor").val();
        // no_dist = $("#no_dist").val();
        // no_dist = $("#no_dist").val();
        // var str = no_dist + "";
        // no_index = str.substring(0, 4);
        // distributor = $("#distributor").val();
        // jumlah = $("#jumlah").val();
        // harga = $("#harga").val();
        // diskon = $("#diskon").val();
        // total = $("#total").val();
        // beaongkir = $("#beaongkir").val();
        // ppn = $("#ppn").val();
        // total_kes = $("#total_kes").val();
        // //no_index = $("#no_index").val();
        // tgl_terima = $("#tgl_terima").val();
        // ket = $("#ket").val();
        // alldiskon = $("#alldiskon").val();
        // $.ajax({
        //     type: "POST",
        //     url: "<?php echo base_url('Pembelian_obat/insert_cetakDp') ?>",
        //     dataType: "JSON",
        //     data: {
        //         id_faktur: id_faktur,
        //         no_dokumen: no_dokumen,
        //         faktur_nomor: faktur_nomor,
        //         no_dist: no_dist,
        //         distributor: distributor,
        //         jumlah: jumlah,
        //         harga: harga,
        //         diskon: diskon,
        //         total: total,
        //         beaongkir: beaongkir,
        //         alldiskon: alldiskon,
        //         ppn: ppn,
        //         total_kes: total_kes,
        //         no_index: no_index,
        //         tgl_terima: tgl_terima,
        //         ket: ket,
        //     },
        //     success: function(data) {
        //         if (data.status == 'success') {
        window.print();
        //         }

        //     }
        // });
    }


    function closePrintView() {
        // window.location.href = 'javascript:history.go(-1)';
        history.back()
    }
</script>

=======
<body onload="myFunction()" style="margin-top: 50px;">
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
            <br>
            <?php
            
            date_default_timezone_set('Asia/Jakarta');
            date("Y-m-d");
            $noValid =  sprintf('%04d', $tglStruk['index_dok'], 'dyhtdyu');
            $noDok = $noValid . "/" . "NPB/FARM-RSBT/" . numtor(date("m", strtotime($tglStruk['tgl_buat']))) . "/" . date("Y", strtotime($tglStruk['tgl_buat']));
            ?>
            <table>
                <tr>
                    <td>TANGGAL/JAM</td>
                    <td>:</td>
                    <td><?php echo date("d-m-Y", strtotime($tglStruk['tgl_buat'])) . date(" H:i:s", strtotime($tglStruk['tgl_buat'])); ?></td>
                    <td width="10%">NO PENERIMAAN</td>
                    <td>:</td>
                    <td width="35%"><?php echo $noDok; ?></td>
                </tr>
                <tr>
                    <td width="10%">NO FAKTUR</td>
                    <td>:</td>
                    <td width="35%"><?php echo $tglStruk['no_faktur']; ?></td>
                    <td width="10%">TANGGAL FAKTUR</td>
                    <td>:</td>
                    <td width="35%"><?php echo date("d-m-Y", strtotime($tglStruk['tgl_struk'])); ?></td>

                </tr>
                <tr>
                    <td width="10%">NO PO</td>
                    <td>:</td>
                    <td width="35%"><?php echo $po['no_dokumen']; ?></td>
                    <td width="10%">VENDOR</td>
                    <td>:</td>
                    <td width="35%"><?php echo $tglStruk['id_produsen']; ?></td>
                </tr>

                <tr>
                    <td width="10%">TANGGAL PO</td>
                    <td>:</td>
                    <td width="35%"><?php echo date("d-m-Y",strtotime($po['tgl_faktur'])); ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            </table>

            <table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid black;">
                <tr>
                    <td align="center">NO</td>
                    <td align="center">NAMA BARANG</td>
                    <td align="center">PRODUK</td>
                    <td align="center">SATUAN</td>
                    <td align="center">PC</td>
                    <td align="center">SUDAH DITERIMA</td>
                    <td align="center">SUHU</td>
                    <td align="center">LENGKAP</td>
                    <!-- <td align="center">SESUAI</td> -->
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
                        <td><?php echo $row['suhu']; ?></td>
                        <td><?php echo $lengkap = ($row['status'] == '0') ? "TIDAK" : "YA"; ?></td>
                        <!-- <td>YA / TIDAK</td> -->
                    </tr>
                <?php
                    $nomor++;
                }
                ?>

            </table>
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
        // id_faktur = $("#id_faktur").val();
        // no_dokumen = $("#no_dokumen").val();
        // faktur_nomor = $("#faktur_nomor").val();
        // no_dist = $("#no_dist").val();
        // no_dist = $("#no_dist").val();
        // var str = no_dist + "";
        // no_index = str.substring(0, 4);
        // distributor = $("#distributor").val();
        // jumlah = $("#jumlah").val();
        // harga = $("#harga").val();
        // diskon = $("#diskon").val();
        // total = $("#total").val();
        // beaongkir = $("#beaongkir").val();
        // ppn = $("#ppn").val();
        // total_kes = $("#total_kes").val();
        // //no_index = $("#no_index").val();
        // tgl_terima = $("#tgl_terima").val();
        // ket = $("#ket").val();
        // alldiskon = $("#alldiskon").val();
        // $.ajax({
        //     type: "POST",
        //     url: "<?php echo base_url('Pembelian_obat/insert_cetakDp') ?>",
        //     dataType: "JSON",
        //     data: {
        //         id_faktur: id_faktur,
        //         no_dokumen: no_dokumen,
        //         faktur_nomor: faktur_nomor,
        //         no_dist: no_dist,
        //         distributor: distributor,
        //         jumlah: jumlah,
        //         harga: harga,
        //         diskon: diskon,
        //         total: total,
        //         beaongkir: beaongkir,
        //         alldiskon: alldiskon,
        //         ppn: ppn,
        //         total_kes: total_kes,
        //         no_index: no_index,
        //         tgl_terima: tgl_terima,
        //         ket: ket,
        //     },
        //     success: function(data) {
        //         if (data.status == 'success') {
        window.print();
        //         }

        //     }
        // });
    }


    function closePrintView() {
        // window.location.href = 'javascript:history.go(-1)';
        history.back()
    }
</script>

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
