<body onload="myFunction()" style="margin-top: 50px;">
    <div class="panel panel-default card-view">
        <div class="panel-heading">
            <strong>
                <h3>
                    <center>RUMAH SAKIT BAKTI TIMAH</center>
                </h3>
            </strong>
            <!-- <p> -->
            <center>PENGELUARAN GUDANG FARMASI</center>
            <br>
            <br>
            <table>
                <tr>
                    <td>TANGGAL</td>
                    <td>:</td>
                    <td><?php echo date("d-m-Y") ?></td>
                </tr>
                <tr>
                    <td width="10%">NO TRANSAKSI</td>
                    <td>:</td>
                    <td width="35%"><?php echo $data->no_dokumen; ?></td>
                    <td width="10%">JAM</td>
                    <td>:</td>
                    <td width="35%"><?php echo  date("H:i:s"); ?></td>

                </tr>
                <tr>
                    <td width="10%">NO FAKTUR</td>
                    <td>:</td>
                    <td width="35%"><?php echo $data->no_faktur; ?></td>
                    <td width="10%">TUJUAN</td>
                    <td>:</td>
                    <td width="35%"><?php echo $data->id_vendor; ?></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            </table>

            <table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid black;">
                <tr>
                    <td align="center">NO</td>
                    <td align="center">NAMA BARANG</td>
                    <td align="center">PRODUSEN</td>
                    <td align="center">SATUAN</td>
                    <td align="center">QTY</td>
                    <td align="center">HARGA</td>
                    <td align="center">TOTAL</td>
                    <td align="center">KETERANGAN</td>
                </tr>

                <?php
                $ndp = 0;
                $dsk = 0;
                $jfek = 0;
                $jharga = 0;
                $nomor = 1;
                foreach ($list as $row) { ?>
                    <tr align="center">
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $row->nama; ?></td>
                        <td><?php echo $row->produsen; ?></td>
                        <td><?php echo $row->satuan_terkecil; ?></td>
                        <td><?php echo $row->frek; ?></td>
                        <td><?php echo $row->harga; ?></td>
                        <td><?php echo $row->total; ?></td>
                        <td><?php echo $row->ket; ?></td>
                    </tr>
                <?php
                    $nomor++;
                }
                ?>

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
        window.location.href = 'javascript:history.go(-1)';
    }
</script>

<?php

?>