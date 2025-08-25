<body onload="myFunction()">
    <div class="panel panel-default card-view">
        <div class="panel-heading">
            <table>
                <tr>
                    <td> <a><img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" width="100px" alt="logo" /></a></td>
                    <td> <a><img src="<?= base_url('assets/dist/img/alamat.jpg'); ?>" width="200px" alt="logoa" /></a></td>

                </tr>
            </table>
        </div>
        <div class="panel-heading">
            <table>
                <tr>

                    <td> <?php
                            echo "NAMA : " . $pasien['nama_pasien'];
                            echo "<br>NO HP: " . $pasien['no_telp'];
                            echo "<br>JENIS KELAMIN : " . $pasien['jenis_kelamin'];
                            ?></td>
                </tr>
            </table>
        </div>
        <div class="panel-wrapper collapse in ">
            <div class="panel-body" style="float: right;">
                <div class="kolom">
                    <div class="row ">
                        <div class="col-sm-12">


                            <h4 class="panel-title txt-dark"> TINDAKAN KAMAR JENAZAH</h4>
                            <table id="datable_1" class="table table-hover display  pb-30">
                                <thead>
                                    <tr>
                                        <th>NAMA TINDAKAN</th>
                                        <th>HARGA SATUAN</th>
                                        <th>FREK</th>
                                        <th>TOTAL HARGA</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $tindakan = 0;
                                    foreach ($data as $row) {
                                    ?>
                                        <tr class="txt-dark">
                                            <td width="70%"><?php echo $row['nama_tindakan'];   ?></td>

                                            <td width="10%"><?php

                                                            // $harga = $row['total'] / $row['frek'];
                                                            echo "Rp " . number_format($row['harga'], 0, ',', '.');   ?></td>
                                            <td width="10%"><?php echo $row['frek'];   ?></td>
                                            <td width="10%"><?php echo "Rp " . number_format($row['total'], 0, ',', '.');   ?></td>
                                        </tr>
                                    <?php

                                        $tindakan += $row['total'];
                                    }
                                    ?>


                                </tbody>
                            </table>
                            <?php
                            if (count($obat) > 0) { ?>

                                <h4 class="panel-title txt-dark"> APOTIK</h4>
                                <table id="datable_1" class="table table-hover display  pb-30">
                                    <thead>
                                        <tr>
                                            <th>NAMA TINDAKAN</th>
                                            <th>HARGA SATUAN</th>
                                            <th>FREK</th>
                                            <th>TOTAL HARGA</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $apotik = 0;
                                        $apotikppn = 0;
                                        $ppn = 0;
                                        foreach ($obat as $row) {
                                        ?>
                                            <tr class="txt-dark">
                                                <td width="70%"><?php echo $row['nama'];   ?></td>

                                                <td width="10%"><?php

                                                                $harga = $row['total'] / $row['frek'];
                                                                echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                <td width="10%"><?php echo $row['frek'];   ?></td>
                                                <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                            </tr>
                                        <?php

                                            $apotik += $harga * $row['frek'];
                                        }
                                        $ppn = $apotik * 0.11;
                                        $apotikppn = $apotik + $ppn;
                                        ?>
                                        <tr class="txt-dark">
                                            <td> </td>
                                            <td> </td>
                                            <td>Subtotal</td>
                                            <td><?php echo "<b>Rp " . number_format($apotik, 0, ',', '.') . "</b>";   ?></td>
                                        </tr>
                                        <tr class="txt-dark">
                                            <td> </td>
                                            <td> </td>
                                            <td>PPN Keluaran</td>
                                            <td><?php echo "<b>Rp " . number_format($ppn, 0, ',', '.') . "</b>";   ?></td>
                                        </tr>
                                        <tr class="txt-dark">
                                            <td> </td>
                                            <td> </td>
                                            <td>Total</td>
                                            <td><?php echo "<b>Rp " . number_format($apotikppn, 0, ',', '.') . "</b>";   ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                $apotikppn = 0;
                            } ?>

                            <div class="panel-heading">
                                <div class="pull-left">
                                    <!-- <h4 class="panel-title txt-dark">Total</h4> -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body" style="float: right;">
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table id="datable_1" class="table table-hover display  pb-30">

                                                <tbody>
                                                    <?php
                                                    $total = $tindakan + $apotikppn;
                                                    ?>
                                                    <tr class="txt-dark" width="30%">
                                                        <td> </td>
                                                        <td> </td>
                                                        <td> </td>
                                                        <td>Total Bayar </td>
                                                        <td><?php echo "<b>Rp " . number_format($total, 0, ',', '.') . "</b>";   ?>
                                                        </td>
                                                    </tr>
                                                    <tr class="txt-dark" width="30%">
                                                        <td> </td>
                                                        <td> </td>
                                                        <td> </td>
                                                        <td>DISC </td>
                                                        <td><?php echo "<b>Rp " . number_format($diskon, 0, ',', '.') . "</b>";   ?>
                                                        </td>
                                                    </tr>

                                                    <tr class="txt-dark" width="30%">
                                                        <td> </td>
                                                        <td> </td>
                                                        <td> </td>
                                                        <td>TOTAL BAYAR </td>
                                                        <input type="hidden" id="outTotal" value="<?php echo round(($total - $diskon) / 500) * 500; ?>">
                                                        <input type="hidden" id="outTotalAwal" value="<?php echo round($total / 500) * 500;  ?>">
                                                        <input type="hidden" id="inPel" value="<?php echo $inMcu; ?>">
                                                        <input type="hidden" id="diskon" value="<?php echo $diskon; ?>">
                                                        <input type="hidden" id="tgl_keluar" value="<?php echo $tgl_keluar; ?>">
                                                        <td><?php echo "<b>Rp " . number_format(($total - $diskon), 0, ',', '.') . "</b>";   ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="panel panel-default card-view"> -->
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h5> No NPWP : 71.785.977.1-304.000 </h5>
                                    <h4 class="panel-title txt-dark">PETUGAS KASIR</h4>
                                    <?php $staff = $this->session->userdata('data_auth');
                                    echo $staff->nama;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- <style>
    .kolom {
        -webkit-column-count: 2;
        /* Chrome, Safari, Opera */
        -moz-column-count: 2;
        /* Firefox */
        column-count: 2;
        -moz-column-fill: auto;
        column-fill: auto;

    }
</style> -->
<script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    window.onafterprint = function(e) {

        closePrintView();
    };

    function myFunction() {
        id_pelayanan = $('#inPel').val();
        total_semua = $('#outTotal').val();
        total = $('#outTotalAwal').val();
        diskon = $('#diskon').val();
        tgl_keluar = $('#tgl_keluar').val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Kasir/insert_pembayaran_Hc') ?>",
            dataType: "JSON",
            data: {
                id_pelayanan: id_pelayanan,
                total_bayar: total_semua,
                total_harga: total,

                diskon: diskon,
                tgl_keluar: tgl_keluar
            },
            success: function(data) {
                if (data.status == 'success') {
                    window.print();
                }

            }
        });

    }


    function closePrintView() {
        window.location.href = 'javascript:history.go(-1)';
    }
</script>