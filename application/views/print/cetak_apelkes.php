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
                        echo "NAMA : " . $pasien['nama'] . ' ' . sprintf('%06d', $pasien['no_rm']);
                        // echo "<br>NO RM : " . sprintf('%06d', $pasien['no_rm']);
                        echo "<br>KLAIM : " . $pasien['cara_bayar'];
                        // echo "<br>CARA MASUK : " . $pasien['asal'];
                        echo "<br>DPJP IGD : " . $dokterIGD;
                        echo "<br>DPJP POLI : " . $dokterPoli;
                        echo "<br>DPJP RANAP : " . $pasien['nama_dokter'];
                        echo "<br>TANGGAL MASUK : " . date("d M Y", strtotime($pasien['tgl_masuk'])) . ' ' . date("H:i", strtotime($pasien['tgl_masuk']));
                        // echo "<br>TANGGAL KELUAR : " . $pasien['tgl_keluar'];
                        // echo "<br>TANGGAL KELUAR : " .  str_replace('T', ' ', $tgl_keluar_ranap);
                        $dpjp = ($dokterIGD != '-') ? $dokterIGD : $dokterPoli;
                        $jenpel = ($dokterIGD != '-') ? 'IGD' : 'POLI';

                        ?></td>
                </tr>
            </table>
        </div>
        <hr>
        </hr>
        <div class="panel-wrapper collapse in ">
            <div class="panel-body">
                <div class="kolom">
                    <div class="row ">
                        <div class="col-sm-12">

                            <?php
                            if ($jenis == 'igd') { ?>
                                <!-- <h3 align="center" width="95%"> KWITANSI </h3> -->

                                <h4 align="center" class="panel-title txt-dark">TINDAKAN IGD</h4>
                                <table id="datable_1" class="table table-hover display  pb-30">


                                    <tbody>
                                        <?php $igd = 0;
                                        $date = false;
                                        if (count($data_igd) > 0) {
                                            foreach ($data_igd as $row) {
                                                if ($row['tanggal'] != $date) {
                                                    $date = $row['tanggal']; ?>

                                                    <tr>
                                                        <th align="left" colspan="4"><?php echo indo_date2($date);   ?></th>
                                                    </tr>

                                                    <tr>
                                                        <th>NAMA TINDAKAN</th>
                                                        <th>HARGA SATUAN</th>
                                                        <th>FREK</th>
                                                        <th>TOTAL HARGA</th>
                                                    </tr>

                                                <?php }
                                                ?>

                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'] . " " . $row['dokter'];   ?></td>
                                                    <td width="10%"><?php
                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%" align="center"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $igd += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($igd, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        <?php } else { ?>
                                            <!-- <tr width="90">
                                                <td colspan="4" class=gariskanan>
                                                    <center>Tidak ada data</center>
                                                </td>
                                            </tr> -->
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php } ?>
                            <?php if ($jenis == 'obatigd') { ?>

                                <h4 align="center" class="panel-title txt-dark"> OBAT RUANGAN IGD</h4>
                                <table id="datable_1" class="table table-hover display  pb-30">


                                    <tbody>
                                        <?php $apotik_igd = 0;
                                        $date = false;
                                        if (count($data_apotik_igd) > 0) {
                                            foreach ($data_apotik_igd as $row) {
                                                if ($row['tanggal'] != $date) {
                                                    $date = $row['tanggal']; ?>

                                                    <tr>
                                                        <th align="left" colspan="4"><?php echo indo_date2($date);   ?></th>
                                                    </tr>

                                                    <tr>
                                                        <th>NAMA TINDAKAN</th>
                                                        <th>HARGA SATUAN</th>
                                                        <th>FREK</th>
                                                        <th>TOTAL HARGA</th>
                                                    </tr>

                                                <?php }
                                                ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php $jenis = preg_match('/RUANG/i', $row['jenis_resep']) ? ' - ' . $row['jenis_resep'] . '' : ' - FARMASI';
                                                                    echo $row['nama'] . $jenis;   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%" align="center"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php

                                                $apotik_igd += $harga * $row['frek'];
                                            }
                                            ?>
                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($apotik_igd, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        <?php } else { ?>
                                            <!-- <tr width="90">
                                                <td colspan="4" class=gariskanan>
                                                    <center>Tidak ada data</center>
                                                </td>
                                            </tr> -->
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php } ?>
                            <?php
                            if ($jenis == 'ranap') { ?>
                                <!-- <h3 align="center" width="95%"> KWITANSI </h3> -->

                                <h4 align='center' class="panel-title txt-dark">BIAYA RAWATINAP</h4>
                                <table id="datable_1" class="table table-hover display  pb-30">


                                    <tbody>
                                        <?php
                                        $apelkes = 0;
                                        $date = false;
                                        foreach ($data_apelkes as $row) {

                                            if ($row['tanggal'] != $date) {
                                                $date = $row['tanggal']; ?>

                                                <tr>
                                                    <th align="left" colspan="4"><?php echo indo_date2($date);   ?></th>
                                                </tr>

                                                <tr>
                                                    <th>NAMA TINDAKAN</th>
                                                    <th>HARGA SATUAN</th>
                                                    <th>FREK</th>
                                                    <th>TOTAL HARGA</th>
                                                </tr>

                                            <?php }
                                            ?>

                                            <tr class="txt-dark">
                                                <td width="70%"><?php echo $row['nama']    ?></td>

                                                <td width="10%"><?php
                                                                if ($row['total'] == 0) {
                                                                    $harga = 0;
                                                                } else {
                                                                    $harga = $row['total'] / $row['frek'];
                                                                }
                                                                echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                <td width="10%" align="center"><?php echo $row['frek'];   ?></td>
                                                <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                            </tr>
                                        <?php $apelkes += $harga * $row['frek'];
                                        }
                                        ?>

                                        <tr class="txt-dark">
                                            <td> </td>
                                            <td> </td>
                                            <td>Total</td>
                                            <td><?php echo "<b>Rp " . number_format($apelkes, 0, ',', '.') . "</b>";   ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } ?>
                            <?php
                            if ($jenis == 'obatranap') { ?>

                                <h4 align="center" class="panel-title txt-dark"> OBAT RUANGAN RANAP</h4>
                                <table id="datable_1" class="table table-hover display  pb-30">


                                    <tbody>
                                        <?php $apotik_ranap = 0;
                                        $date = false;
                                        if (count($data_apotik_ranap) > 0) {
                                            foreach ($data_apotik_ranap as $row) {
                                                if ($row['tanggal'] != $date) {
                                                    $date = $row['tanggal']; ?>

                                                    <tr>
                                                        <th align="left" colspan="4"><?php echo indo_date2($date);   ?></th>
                                                    </tr>

                                                    <tr>
                                                        <th>NAMA TINDAKAN</th>
                                                        <th>HARGA SATUAN</th>
                                                        <th>FREK</th>
                                                        <th>TOTAL HARGA</th>
                                                    </tr>

                                                <?php }
                                                ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php $jenis = preg_match('/RUANG/i', $row['jenis_resep']) ? ' - ' . $row['jenis_resep'] . '' : ' - FARMASI';
                                                                    echo $row['nama'] . $jenis;   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%" align="center"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php

                                                $apotik_ranap += $harga * $row['frek'];
                                            }
                                            ?>
                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($apotik_ranap, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        <?php } else { ?>
                                            <!-- <tr width="90">
                                                <td colspan="4" class=gariskanan>
                                                    <center>Tidak ada data</center>
                                                </td>
                                            </tr> -->
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php }  ?>
                            <?php
                            if ($jenis == 'farmasi') { ?>

                                <h4 align="center" class="panel-title txt-dark"> OBAT APOTIK</h4>
                                <table id="datable_1" class="table table-hover display  pb-30">


                                    <tbody>
                                        <?php $apotik = 0;
                                        $date = false;
                                        foreach ($data_apotik as $row) {
                                            if ($row['tanggal'] != $date) {
                                                $date = $row['tanggal']; ?>

                                                <tr>
                                                    <th align="left" colspan="4"><?php echo indo_date2($date);   ?></th>
                                                </tr>

                                                <tr>
                                                    <th>NAMA TINDAKAN</th>
                                                    <th>HARGA SATUAN</th>
                                                    <th>FREK</th>
                                                    <th>TOTAL HARGA</th>
                                                </tr>

                                            <?php }
                                            ?>
                                            <tr class="txt-dark">
                                                <td width="70%"><?php $jenis = preg_match('/RUANG/i', $row['jenis_resep']) ? ' - ' . $row['jenis_resep'] . '' : ' - FARMASI';
                                                                echo $row['nama'] . $jenis;   ?></td>

                                                <td width="10%"><?php

                                                                if ($row['total'] == 0) {
                                                                    $harga = 0;
                                                                } else {
                                                                    $harga = $row['total'] / $row['frek'];
                                                                }
                                                                echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                <td width="10%" align="center"><?php echo $row['frek'];   ?></td>
                                                <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                            </tr>
                                        <?php

                                            $apotik += $harga * $row['frek'];
                                        }
                                        ?>
                                        <tr class="txt-dark">
                                            <td> </td>
                                            <td> </td>
                                            <td>Total</td>
                                            <td><?php echo "<b>Rp " . number_format($apotik, 0, ',', '.') . "</b>";   ?></td>
                                        </tr>

                                    </tbody>
                                </table>
                            <?php }  ?>
                            <!-- <div class="panel panel-default card-view"> -->
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h5> No NPWP : 71.785.977.1-304.000 </h5>
                                    <h4 class="panel-title txt-dark">PETUGAS</h4>
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


    // function closePrintView() {
    //     window.location.href = 'javascript:history.go(-1)';
    // }
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
                        echo "NAMA : " . $pasien['nama'] . ' ' . sprintf('%06d', $pasien['no_rm']);
                        // echo "<br>NO RM : " . sprintf('%06d', $pasien['no_rm']);
                        echo "<br>KLAIM : " . $pasien['cara_bayar'];
                        // echo "<br>CARA MASUK : " . $pasien['asal'];
                        echo "<br>DPJP IGD : " . $dokterIGD;
                        echo "<br>DPJP POLI : " . $dokterPoli;
                        echo "<br>DPJP RANAP : " . $pasien['nama_dokter'];
                        echo "<br>TANGGAL MASUK : " . date("d M Y", strtotime($pasien['tgl_masuk'])) . ' ' . date("H:i", strtotime($pasien['tgl_masuk']));
                        // echo "<br>TANGGAL KELUAR : " . $pasien['tgl_keluar'];
                        // echo "<br>TANGGAL KELUAR : " .  str_replace('T', ' ', $tgl_keluar_ranap);
                        $dpjp = ($dokterIGD != '-') ? $dokterIGD : $dokterPoli;
                        $jenpel = ($dokterIGD != '-') ? 'IGD' : 'POLI';

                        ?></td>
                </tr>
            </table>
        </div>
        <hr>
        </hr>
        <div class="panel-wrapper collapse in ">
            <div class="panel-body">
                <div class="kolom">
                    <div class="row ">
                        <div class="col-sm-12">

                            <?php
                            if ($jenis == 'igd') { ?>
                                <!-- <h3 align="center" width="95%"> KWITANSI </h3> -->

                                <h4 align="center" class="panel-title txt-dark">TINDAKAN IGD</h4>
                                <table id="datable_1" class="table table-hover display  pb-30">


                                    <tbody>
                                        <?php $igd = 0;
                                        $date = false;
                                        if (count($data_igd) > 0) {
                                            foreach ($data_igd as $row) {
                                                if ($row['tanggal'] != $date) {
                                                    $date = $row['tanggal']; ?>

                                                    <tr>
                                                        <th align="left" colspan="4"><?php echo indo_date2($date);   ?></th>
                                                    </tr>

                                                    <tr>
                                                        <th>NAMA TINDAKAN</th>
                                                        <th>HARGA SATUAN</th>
                                                        <th>FREK</th>
                                                        <th>TOTAL HARGA</th>
                                                    </tr>

                                                <?php }
                                                ?>

                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'] . " " . $row['dokter'];   ?></td>
                                                    <td width="10%"><?php
                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%" align="center"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $igd += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($igd, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        <?php } else { ?>
                                            <!-- <tr width="90">
                                                <td colspan="4" class=gariskanan>
                                                    <center>Tidak ada data</center>
                                                </td>
                                            </tr> -->
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php } ?>
                            <?php if ($jenis == 'obatigd') { ?>

                                <h4 align="center" class="panel-title txt-dark"> OBAT RUANGAN IGD</h4>
                                <table id="datable_1" class="table table-hover display  pb-30">


                                    <tbody>
                                        <?php $apotik_igd = 0;
                                        $date = false;
                                        if (count($data_apotik_igd) > 0) {
                                            foreach ($data_apotik_igd as $row) {
                                                if ($row['tanggal'] != $date) {
                                                    $date = $row['tanggal']; ?>

                                                    <tr>
                                                        <th align="left" colspan="4"><?php echo indo_date2($date);   ?></th>
                                                    </tr>

                                                    <tr>
                                                        <th>NAMA TINDAKAN</th>
                                                        <th>HARGA SATUAN</th>
                                                        <th>FREK</th>
                                                        <th>TOTAL HARGA</th>
                                                    </tr>

                                                <?php }
                                                ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php $jenis = preg_match('/RUANG/i', $row['jenis_resep']) ? ' - ' . $row['jenis_resep'] . '' : ' - FARMASI';
                                                                    echo $row['nama'] . $jenis;   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%" align="center"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php

                                                $apotik_igd += $harga * $row['frek'];
                                            }
                                            ?>
                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($apotik_igd, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        <?php } else { ?>
                                            <!-- <tr width="90">
                                                <td colspan="4" class=gariskanan>
                                                    <center>Tidak ada data</center>
                                                </td>
                                            </tr> -->
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php } ?>
                            <?php
                            if ($jenis == 'ranap') { ?>
                                <!-- <h3 align="center" width="95%"> KWITANSI </h3> -->

                                <h4 align='center' class="panel-title txt-dark">BIAYA RAWATINAP</h4>
                                <table id="datable_1" class="table table-hover display  pb-30">


                                    <tbody>
                                        <?php
                                        $apelkes = 0;
                                        $date = false;
                                        foreach ($data_apelkes as $row) {

                                            if ($row['tanggal'] != $date) {
                                                $date = $row['tanggal']; ?>

                                                <tr>
                                                    <th align="left" colspan="4"><?php echo indo_date2($date);   ?></th>
                                                </tr>

                                                <tr>
                                                    <th>NAMA TINDAKAN</th>
                                                    <th>HARGA SATUAN</th>
                                                    <th>FREK</th>
                                                    <th>TOTAL HARGA</th>
                                                </tr>

                                            <?php }
                                            ?>

                                            <tr class="txt-dark">
                                                <td width="70%"><?php echo $row['nama']    ?></td>

                                                <td width="10%"><?php
                                                                if ($row['total'] == 0) {
                                                                    $harga = 0;
                                                                } else {
                                                                    $harga = $row['total'] / $row['frek'];
                                                                }
                                                                echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                <td width="10%" align="center"><?php echo $row['frek'];   ?></td>
                                                <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                            </tr>
                                        <?php $apelkes += $harga * $row['frek'];
                                        }
                                        ?>

                                        <tr class="txt-dark">
                                            <td> </td>
                                            <td> </td>
                                            <td>Total</td>
                                            <td><?php echo "<b>Rp " . number_format($apelkes, 0, ',', '.') . "</b>";   ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } ?>
                            <?php
                            if ($jenis == 'obatranap') { ?>

                                <h4 align="center" class="panel-title txt-dark"> OBAT RUANGAN RANAP</h4>
                                <table id="datable_1" class="table table-hover display  pb-30">


                                    <tbody>
                                        <?php $apotik_ranap = 0;
                                        $date = false;
                                        if (count($data_apotik_ranap) > 0) {
                                            foreach ($data_apotik_ranap as $row) {
                                                if ($row['tanggal'] != $date) {
                                                    $date = $row['tanggal']; ?>

                                                    <tr>
                                                        <th align="left" colspan="4"><?php echo indo_date2($date);   ?></th>
                                                    </tr>

                                                    <tr>
                                                        <th>NAMA TINDAKAN</th>
                                                        <th>HARGA SATUAN</th>
                                                        <th>FREK</th>
                                                        <th>TOTAL HARGA</th>
                                                    </tr>

                                                <?php }
                                                ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php $jenis = preg_match('/RUANG/i', $row['jenis_resep']) ? ' - ' . $row['jenis_resep'] . '' : ' - FARMASI';
                                                                    echo $row['nama'] . $jenis;   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%" align="center"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php

                                                $apotik_ranap += $harga * $row['frek'];
                                            }
                                            ?>
                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($apotik_ranap, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        <?php } else { ?>
                                            <!-- <tr width="90">
                                                <td colspan="4" class=gariskanan>
                                                    <center>Tidak ada data</center>
                                                </td>
                                            </tr> -->
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php }  ?>
                            <?php
                            if ($jenis == 'farmasi') { ?>

                                <h4 align="center" class="panel-title txt-dark"> OBAT APOTIK</h4>
                                <table id="datable_1" class="table table-hover display  pb-30">


                                    <tbody>
                                        <?php $apotik = 0;
                                        $date = false;
                                        foreach ($data_apotik as $row) {
                                            if ($row['tanggal'] != $date) {
                                                $date = $row['tanggal']; ?>

                                                <tr>
                                                    <th align="left" colspan="4"><?php echo indo_date2($date);   ?></th>
                                                </tr>

                                                <tr>
                                                    <th>NAMA TINDAKAN</th>
                                                    <th>HARGA SATUAN</th>
                                                    <th>FREK</th>
                                                    <th>TOTAL HARGA</th>
                                                </tr>

                                            <?php }
                                            ?>
                                            <tr class="txt-dark">
                                                <td width="70%"><?php $jenis = preg_match('/RUANG/i', $row['jenis_resep']) ? ' - ' . $row['jenis_resep'] . '' : ' - FARMASI';
                                                                echo $row['nama'] . $jenis;   ?></td>

                                                <td width="10%"><?php

                                                                if ($row['total'] == 0) {
                                                                    $harga = 0;
                                                                } else {
                                                                    $harga = $row['total'] / $row['frek'];
                                                                }
                                                                echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                <td width="10%" align="center"><?php echo $row['frek'];   ?></td>
                                                <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                            </tr>
                                        <?php

                                            $apotik += $harga * $row['frek'];
                                        }
                                        ?>
                                        <tr class="txt-dark">
                                            <td> </td>
                                            <td> </td>
                                            <td>Total</td>
                                            <td><?php echo "<b>Rp " . number_format($apotik, 0, ',', '.') . "</b>";   ?></td>
                                        </tr>

                                    </tbody>
                                </table>
                            <?php }  ?>
                            <!-- <div class="panel panel-default card-view"> -->
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h5> No NPWP : 71.785.977.1-304.000 </h5>
                                    <h4 class="panel-title txt-dark">PETUGAS</h4>
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


    // function closePrintView() {
    //     window.location.href = 'javascript:history.go(-1)';
    // }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>