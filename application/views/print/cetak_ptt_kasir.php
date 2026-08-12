<<<<<<< HEAD
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
                    <td>
                        <?php
                        echo "NAMA : " . $pasien['nama'];
                        if ($pasien['no_rm'] != 'BEBAS') {
                            echo "<br>NO RM : " . $pasien['no_rm'];
                        }
                        echo "<br>JENIS KLAIM : " . $pasien['cara_bayar'];
                        echo "<br>CARA MASUK : " . $pasien['asal'];
                        echo "<br>DPJP : " . $pasien['dokter'];
                        // echo $inPel;
                        $ppn = 0;
                        ?></td>
                </tr>
            </table>
        </div>
        <hr>
        <h3 align="center" width="95%"> KWITANSI </h3>
        </hr>
        <div class="panel-wrapper collapse in ">
            <div class="panel-body" style="float: right;">
                <div class="kolom">
                    <div class="row ">
                        <div class="col-sm-12">

                            <?php
                            if (count($data_labor) > 0) { ?>
                                <h6 class="panel-title txt-dark">LABORATORIUM</h6>
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
                                        <?php $labor = 0;
                                        foreach ($data_labor as $row) { ?>
                                            <tr class="txt-dark">
                                                <td width="70%"><?php echo $row['nama'];   ?></td>
                                                <td width="10%"><?php

                                                                $harga = $row['total'] / $row['frek'];
                                                                echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                <td width="10%"><?php echo $row['frek'];   ?></td>
                                                <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                            </tr>
                                        <?php $labor += $harga * $row['frek'];
                                        }
                                        ?>

                                        <tr class="txt-dark">
                                            <td> </td>
                                            <td> </td>
                                            <td>Total</td>
                                            <td><?php echo "<b>Rp " . number_format($labor, 0, ',', '.') . "</b>";   ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                $labor = 0;
                            }
                            if (count($data_radio) > 0) {
                            ?>
                                <h6 class="panel-title txt-dark">RADIOLOGI</h6>
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
                                        <?php $radio = 0;
                                        foreach ($data_radio as $row) {

                                        ?>

                                            <tr class="txt-dark">
                                                <td width="60%"><?php echo $row['nama'];   ?></td>

                                                <td width="10%"><?php

                                                                $harga = $row['total'] / $row['frek'];
                                                                echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                <td width="10%"><?php echo $row['frek'];   ?></td>
                                                <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                            </tr>
                                        <?php $radio += $harga * $row['frek'];
                                        }
                                        ?>

                                        <tr class="txt-dark">
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td>Total</td>
                                            <td><?php echo "<b>Rp " . number_format($radio, 0, ',', '.') . "</b>";   ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                $radio = 0;
                            }
                            if (count($data_transportasi) > 0) {
                            ?>
                                <h6 class="panel-title txt-dark">TRANSPORTASI</h6>
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
                                        <?php $trasnportasi = 0;
                                        foreach ($data_transportasi as $row) {

                                        ?>

                                            <tr class="txt-dark">
                                                <td width="60%"><?php echo $row['nama'];   ?></td>

                                                <td width="10%"><?php

                                                                $harga = $row['total'] / $row['frek'];
                                                                echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                <td width="10%"><?php echo $row['frek'];   ?></td>
                                                <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                            </tr>
                                        <?php $trasnportasi += $harga * $row['frek'];
                                        }
                                        ?>

                                        <tr class="txt-dark">
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td>Total</td>
                                            <td><?php echo "<b>Rp " . number_format($trasnportasi, 0, ',', '.') . "</b>";   ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                $trasnportasi = 0;
                            } ?>

                            <?php
                            if ($data_obat != 0) { ?>
                                <h6 class="panel-title txt-dark">APOTIK</h6>
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
                                        <?php $obat = 0;
                                        $ppn = 0;
                                        $apotikppn = 0;
                                        foreach ($data_obat as $row) { ?>
                                            <tr class="txt-dark">
                                                <td width="70%"><?php echo $row['obat'];   ?></td>
                                                <td width="10%"><?php

                                                                $harga = $row['total'] / $row['frek'];
                                                                echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                <td width="10%"><?php echo $row['frek'];   ?></td>
                                                <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                            </tr>
                                        <?php $obat += $harga * $row['frek'];
                                        }
                                        ?>
                                        <?php
                                        $poli = $this->db->query("SELECT * from obat_bebas where id_obat_bebas ='$inPel' and unit='APOTIK'")->result();
                                        if (count($poli) > 0) {
                                            $ppn = $obat * 0.11;
                                            $apotikppn = $obat + $ppn;

                                        ?>
                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Subtotal</td>
                                                <td><?php echo "<b>Rp " . number_format($obat, 0, ',', '.') . "</b>";   ?></td>
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
                                        <?php } else { ?>
                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($obat, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php } else {
                                $obat = 0;
                            }
                            ?>
                            <?php

                            if (count($tindakan_poli) > 0) {
                            ?>
                                <table id="datable_1" class="table table-hover display  pb-30">
                                    <tbody>
                                        <?php
                                        $group = array();
                                        $total_poli_all = 0;

                                        foreach ($tindakan_poli as $row) {
                                            $group[$row['nama_poli']][] = $row;
                                        }
                                        foreach ($group as $nama_poli => $value) {
                                            $total_poli = 0;

                                        ?>
                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <th align="left" colspan="4"><?= $nama_poli ?></th>
                                            </tr>
                                            <tr>
                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                            <?php
                                            foreach ($value as $k) {

                                            ?>

                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $k['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $k['total'] / $k['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $k['frek'];   ?></td>
                                                    <td width="10%" class="font_angka"><?php echo "Rp " . number_format($harga * $k['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $total_poli += $harga * $k['frek'];
                                            }
                                            ?>
                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td class="font_angka"><?php echo "<b>Rp " . number_format($total_poli, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        <?php
                                            $total_poli_all += $total_poli;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <?php } else {
                                $total_poli_all = 0;
                            }
                            ?>
                            <?php
                            if (count($penunjang_lain) > 0) {
                            ?>
                                <h6 class="panel-title txt-dark">PENUNJANG LAIN</h6>
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
                                        <?php $penunjang = 0;
                                        foreach ($penunjang_lain as $row) {

                                        ?>

                                            <tr class="txt-dark">
                                                <td width="60%"><?php echo $row['nama'];   ?></td>

                                                <td width="10%"><?php

                                                                $harga = $row['total'] / $row['frek'];
                                                                echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                <td width="10%"><?php echo $row['frek'];   ?></td>
                                                <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                            </tr>
                                        <?php $penunjang += $harga * $row['frek'];
                                        }
                                        ?>

                                        <tr class="txt-dark">
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td>Total</td>
                                            <td><?php echo "<b>Rp " . number_format($penunjang, 0, ',', '.') . "</b>";   ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                $penunjang = 0;
                            } ?>

                             <?php
                            if (count($data_apelkes) > 0) {
                            ?>
                                <h6 class="panel-title txt-dark">BIAYA RUANGAN</h6>
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
                                        <?php $apelkes = 0;
                                        foreach ($data_apelkes as $row) {

                                        ?>

                                            <tr class="txt-dark">
                                                <td width="60%"><?php echo $row['nama'];   ?></td>

                                                <td width="10%"><?php

                                                                $harga = $row['total'] / $row['frek'];
                                                                echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                <td width="10%"><?php echo $row['frek'];   ?></td>
                                                <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                            </tr>
                                        <?php $apelkes += $harga * $row['frek'];
                                        }
                                        ?>

                                        <tr class="txt-dark">
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td>Total</td>
                                            <td><?php echo "<b>Rp " . number_format($apelkes, 0, ',', '.') . "</b>";   ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                $apelkes = 0;
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
                                                    $total =  $radio + $labor + $trasnportasi + $obat + $ppn + $penunjang + $apelkes + $total_poli_all;
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
                                                        <td>TOTAL BAYAR </td>
                                                        <!-- <input type="hidden" id="outTotal" value="<?php echo round(($total - $diskon) / 500) * 500; ?>">
                                                        <input type="hidden" id="outTotalAwal" value="<?php echo round($total / 500) * 500;  ?>">
                                                        <input type="hidden" id="inPel" value="<?php echo $inMcu; ?>">
                                                        <input type="hidden" id="diskon" value="<?php echo $diskon; ?>">
                                                        <input type="hidden" id="tgl_keluar" value="<?php echo $tgl_keluar; ?>"> -->
                                                        <td><?php echo "<b>Rp " . number_format(($total), 0, ',', '.') . "</b>";   ?>
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
        // id_pelayanan = $('#inPel').val();
        // total_semua = $('#outTotal').val();
        // total = $('#outTotalAwal').val();
        // diskon = $('#diskon').val();
        // tgl_keluar = $('#tgl_keluar').val();
        // $.ajax({
        //     type: "POST",
        //     url: "</?php echo base_url('Kasir_pp/insert_pembayaran_Hc') ?>",
        //     dataType: "JSON",
        //     data: {
        //         id_pelayanan: id_pelayanan,
        //         total_bayar: total_semua,
        //         total_harga: total,

        //         diskon: diskon,
        //         tgl_keluar: tgl_keluar
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
=======
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
                    <td>
                        <?php
                        echo "NAMA : " . $pasien['nama'];
                        if ($pasien['no_rm'] != 'BEBAS') {
                            echo "<br>NO RM : " . $pasien['no_rm'];
                        }
                        echo "<br>JENIS KLAIM : " . $pasien['cara_bayar'];
                        echo "<br>CARA MASUK : " . $pasien['asal'];
                        echo "<br>DPJP : " . $pasien['dokter'];
                        // echo $inPel;
                        $ppn = 0;
                        ?></td>
                </tr>
            </table>
        </div>
        <hr>
        <h3 align="center" width="95%"> KWITANSI </h3>
        </hr>
        <div class="panel-wrapper collapse in ">
            <div class="panel-body" style="float: right;">
                <div class="kolom">
                    <div class="row ">
                        <div class="col-sm-12">

                            <?php
                            if (count($data_labor) > 0) { ?>
                                <h6 class="panel-title txt-dark">LABORATORIUM</h6>
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
                                        <?php $labor = 0;
                                        foreach ($data_labor as $row) { ?>
                                            <tr class="txt-dark">
                                                <td width="70%"><?php echo $row['nama'];   ?></td>
                                                <td width="10%"><?php

                                                                $harga = $row['total'] / $row['frek'];
                                                                echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                <td width="10%"><?php echo $row['frek'];   ?></td>
                                                <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                            </tr>
                                        <?php $labor += $harga * $row['frek'];
                                        }
                                        ?>

                                        <tr class="txt-dark">
                                            <td> </td>
                                            <td> </td>
                                            <td>Total</td>
                                            <td><?php echo "<b>Rp " . number_format($labor, 0, ',', '.') . "</b>";   ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                $labor = 0;
                            }
                            if (count($data_radio) > 0) {
                            ?>
                                <h6 class="panel-title txt-dark">RADIOLOGI</h6>
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
                                        <?php $radio = 0;
                                        foreach ($data_radio as $row) {

                                        ?>

                                            <tr class="txt-dark">
                                                <td width="60%"><?php echo $row['nama'];   ?></td>

                                                <td width="10%"><?php

                                                                $harga = $row['total'] / $row['frek'];
                                                                echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                <td width="10%"><?php echo $row['frek'];   ?></td>
                                                <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                            </tr>
                                        <?php $radio += $harga * $row['frek'];
                                        }
                                        ?>

                                        <tr class="txt-dark">
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td>Total</td>
                                            <td><?php echo "<b>Rp " . number_format($radio, 0, ',', '.') . "</b>";   ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                $radio = 0;
                            }
                            if (count($data_transportasi) > 0) {
                            ?>
                                <h6 class="panel-title txt-dark">TRANSPORTASI</h6>
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
                                        <?php $trasnportasi = 0;
                                        foreach ($data_transportasi as $row) {

                                        ?>

                                            <tr class="txt-dark">
                                                <td width="60%"><?php echo $row['nama'];   ?></td>

                                                <td width="10%"><?php

                                                                $harga = $row['total'] / $row['frek'];
                                                                echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                <td width="10%"><?php echo $row['frek'];   ?></td>
                                                <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                            </tr>
                                        <?php $trasnportasi += $harga * $row['frek'];
                                        }
                                        ?>

                                        <tr class="txt-dark">
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td>Total</td>
                                            <td><?php echo "<b>Rp " . number_format($trasnportasi, 0, ',', '.') . "</b>";   ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                $trasnportasi = 0;
                            } ?>

                            <?php
                            if ($data_obat != 0) { ?>
                                <h6 class="panel-title txt-dark">APOTIK</h6>
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
                                        <?php $obat = 0;
                                        $ppn = 0;
                                        $apotikppn = 0;
                                        foreach ($data_obat as $row) { ?>
                                            <tr class="txt-dark">
                                                <td width="70%"><?php echo $row['obat'];   ?></td>
                                                <td width="10%"><?php

                                                                $harga = $row['total'] / $row['frek'];
                                                                echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                <td width="10%"><?php echo $row['frek'];   ?></td>
                                                <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                            </tr>
                                        <?php $obat += $harga * $row['frek'];
                                        }
                                        ?>
                                        <?php
                                        $poli = $this->db->query("SELECT * from obat_bebas where id_obat_bebas ='$inPel' and unit='APOTIK'")->result();
                                        if (count($poli) > 0) {
                                            $ppn = $obat * 0.11;
                                            $apotikppn = $obat + $ppn;

                                        ?>
                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Subtotal</td>
                                                <td><?php echo "<b>Rp " . number_format($obat, 0, ',', '.') . "</b>";   ?></td>
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
                                        <?php } else { ?>
                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($obat, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php } else {
                                $obat = 0;
                            }
                            ?>
                            <?php

                            if (count($tindakan_poli) > 0) {
                            ?>
                                <table id="datable_1" class="table table-hover display  pb-30">
                                    <tbody>
                                        <?php
                                        $group = array();
                                        $total_poli_all = 0;

                                        foreach ($tindakan_poli as $row) {
                                            $group[$row['nama_poli']][] = $row;
                                        }
                                        foreach ($group as $nama_poli => $value) {
                                            $total_poli = 0;

                                        ?>
                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <th align="left" colspan="4"><?= $nama_poli ?></th>
                                            </tr>
                                            <tr>
                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                            <?php
                                            foreach ($value as $k) {

                                            ?>

                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $k['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $k['total'] / $k['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $k['frek'];   ?></td>
                                                    <td width="10%" class="font_angka"><?php echo "Rp " . number_format($harga * $k['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $total_poli += $harga * $k['frek'];
                                            }
                                            ?>
                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td class="font_angka"><?php echo "<b>Rp " . number_format($total_poli, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        <?php
                                            $total_poli_all += $total_poli;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <?php } else {
                                $total_poli_all = 0;
                            }
                            ?>
                            <?php
                            if (count($penunjang_lain) > 0) {
                            ?>
                                <h6 class="panel-title txt-dark">PENUNJANG LAIN</h6>
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
                                        <?php $penunjang = 0;
                                        foreach ($penunjang_lain as $row) {

                                        ?>

                                            <tr class="txt-dark">
                                                <td width="60%"><?php echo $row['nama'];   ?></td>

                                                <td width="10%"><?php

                                                                $harga = $row['total'] / $row['frek'];
                                                                echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                <td width="10%"><?php echo $row['frek'];   ?></td>
                                                <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                            </tr>
                                        <?php $penunjang += $harga * $row['frek'];
                                        }
                                        ?>

                                        <tr class="txt-dark">
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td>Total</td>
                                            <td><?php echo "<b>Rp " . number_format($penunjang, 0, ',', '.') . "</b>";   ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                $penunjang = 0;
                            } ?>

                             <?php
                            if (count($data_apelkes) > 0) {
                            ?>
                                <h6 class="panel-title txt-dark">BIAYA RUANGAN</h6>
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
                                        <?php $apelkes = 0;
                                        foreach ($data_apelkes as $row) {

                                        ?>

                                            <tr class="txt-dark">
                                                <td width="60%"><?php echo $row['nama'];   ?></td>

                                                <td width="10%"><?php

                                                                $harga = $row['total'] / $row['frek'];
                                                                echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                <td width="10%"><?php echo $row['frek'];   ?></td>
                                                <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                            </tr>
                                        <?php $apelkes += $harga * $row['frek'];
                                        }
                                        ?>

                                        <tr class="txt-dark">
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td>Total</td>
                                            <td><?php echo "<b>Rp " . number_format($apelkes, 0, ',', '.') . "</b>";   ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                $apelkes = 0;
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
                                                    $total =  $radio + $labor + $trasnportasi + $obat + $ppn + $penunjang + $apelkes + $total_poli_all;
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
                                                        <td>TOTAL BAYAR </td>
                                                        <!-- <input type="hidden" id="outTotal" value="<?php echo round(($total - $diskon) / 500) * 500; ?>">
                                                        <input type="hidden" id="outTotalAwal" value="<?php echo round($total / 500) * 500;  ?>">
                                                        <input type="hidden" id="inPel" value="<?php echo $inMcu; ?>">
                                                        <input type="hidden" id="diskon" value="<?php echo $diskon; ?>">
                                                        <input type="hidden" id="tgl_keluar" value="<?php echo $tgl_keluar; ?>"> -->
                                                        <td><?php echo "<b>Rp " . number_format(($total), 0, ',', '.') . "</b>";   ?>
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
        // id_pelayanan = $('#inPel').val();
        // total_semua = $('#outTotal').val();
        // total = $('#outTotalAwal').val();
        // diskon = $('#diskon').val();
        // tgl_keluar = $('#tgl_keluar').val();
        // $.ajax({
        //     type: "POST",
        //     url: "</?php echo base_url('Kasir_pp/insert_pembayaran_Hc') ?>",
        //     dataType: "JSON",
        //     data: {
        //         id_pelayanan: id_pelayanan,
        //         total_bayar: total_semua,
        //         total_harga: total,

        //         diskon: diskon,
        //         tgl_keluar: tgl_keluar
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>