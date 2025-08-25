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
                    echo "<br>CARA BAYAR : " . $pasien['cara_bayar'];
                    // echo "<br>CARA MASUK : " . $pasien['asal'];
                    echo "<br>DPJP : " . $pasien['nama_dokter'];
                    echo "<br>TANGGAL MASUK : " . date("d M Y", strtotime($pasien['tgl_masuk'])) . ' ' . date("H:i", strtotime($pasien['tgl_masuk'])) . ' - ' . date("d M Y", strtotime(str_replace('T', ' ', $tgl_keluar_rajal))) . ' ' . date("H:i", strtotime(str_replace('T', ' ', $tgl_keluar_rajal)));
                    // echo "<br>TANGGAL KELUAR : " . $pasien['tgl_keluar'];
                    // echo "<br>TANGGAL KELUAR : " .  str_replace('T', ' ', $tgl_keluar_rajal);
                    ?></td>
            </tr>
        </table>
    </div>
    <hr>
    <h3 align="center" width="95%"> KWITANSI </h3>
    </hr>
    <div class="panel-wrapper collapse in ">
        <div class="panel-body">
            <div class="kolom">
                <div class="row ">
                    <div class="col-sm-12">


                        <h4 class="panel-title txt-dark"> PELAYANAN</h4>
                        <table id="datable_1" class="table table-hover display  pb-30">
                            <thead>
                                <tr>
                                    <th>KETERANGAN</th>
                                    <th>TOTAL HARGA</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="txt-dark">
                                    <td width="70%">ADMINISTRASI</td>
                                    <td width="10%" class="font_angka"><?php $harga = round($data_pelayanan['total'] / 500) * 500;
                                                                        $adm = round($data_pelayanan['biaya_admin'] / 500) * 500;
                                                                        $total_pelayanan = $harga + $adm;
                                                                        echo "Rp " . number_format($total_pelayanan, 0, ',', '.');   ?></td>
                                </tr>
                                <?php
                                if (count($jasa_history) > 0) {
                                    $biaya_jasa_his = 0;
                                    foreach ($jasa_history as $row) {
                                ?>
                                        <tr class="txt-dark">
                                            <td width="70%">KONSULTASI <?= $row['poli'] ?></td>
                                            <td width="10%" class="font_angka"><?php $harga_jasa = round($row['biaya_jasa'] / 500) * 500;
                                                                                echo "Rp " . number_format($harga_jasa, 0, ',', '.');   ?></td>
                                        </tr>
                                <?php
                                        $biaya_jasa_his += $harga_jasa;
                                    }
                                } else {
                                    $biaya_jasa_his = 0;
                                } ?>

                            </tbody>
                        </table>
                        <?php
                        if (count($data_apotik) > 0) { ?>

                            <h4 class="panel-title txt-dark"> APOTIK</h4>
                            <table id="datable_1" class="table table-hover display  pb-30">
                                <thead>
                                    <tr>
                                        <th>KETERANGAN</th>
                                        <th>HARGA SATUAN</th>
                                        <th>QTY</th>
                                        <th>TOTAL HARGA</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $apotik = 0;
                                    foreach ($data_apotik as $row) {
                                    ?>
                                        <tr class="txt-dark">
                                            <td width="70%"><?php $jenis = preg_match('/RUANG/i', $row['jenis_resep']) ? ' (' . $row['jenis_resep'] . ')' : '';
                                                            echo $row['nama'] . $jenis;   ?></td>

                                            <td width="10%"><?php

                                                            $harga = $row['total'] / $row['frek'];
                                                            echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                            <td width="10%"><?php echo $row['frek'];   ?></td>
                                            <td width="10%" class="font_angka"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                        </tr>
                                    <?php

                                        $apotik += $harga * $row['frek'];
                                    }
                                    ?>
                                    <tr class="txt-dark">
                                        <td> </td>
                                        <td> </td>
                                        <td>Total</td>
                                        <td class="font_angka"><?php echo "<b>Rp " . number_format($apotik, 0, ',', '.') . "</b>";   ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        <?php } else {
                            $apotik = 0;
                        }
                        if (count($data_operasi) > 0) { ?>
                            <h4 class="panel-title txt-dark"> OBAT OPERASI</h4>
                            <table id="datable_1" class="table table-hover display  pb-30">
                                <thead>
                                    <tr>
                                        <th>KETERANGAN</th>
                                        <th>HARGA SATUAN</th>
                                        <th>QTY</th>
                                        <th>TOTAL HARGA</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $obatok = 0;
                                    foreach ($data_operasi as $row) { ?>
                                        <tr class="txt-dark">
                                            <td width="70%"><?php echo $row['nama'];   ?></td>
                                            <td width="10%"><?php

                                                            $harga = $row['total'] / $row['frek'];
                                                            echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                            <td width="10%"><?php echo $row['frek'];   ?></td>
                                            <td width="10%" class="font_angka"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                        </tr>
                                    <?php
                                        $obatok += $harga * $row['frek'];
                                    } ?>
                                    <tr class="txt-dark">
                                        <td> </td>
                                        <td> </td>
                                        <td>Total</td>
                                        <td class="font_angka"><?php echo "<b>Rp " . number_format($obatok, 0, ',', '.') . "</b>";   ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        <?php } else {
                            $obatok = 0;
                        }
                        if (count($data_igd) > 0) { ?>

                            <h6 class="panel-title txt-dark"> IGD</h6>
                            <table id="datable_1" class="table table-hover display  pb-30">
                                <thead>
                                    <tr>
                                        <th>KETERANGAN</th>
                                        <th>HARGA SATUAN</th>
                                        <th>QTY</th>
                                        <th>TOTAL HARGA</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $igd = 0;
                                    foreach ($data_igd as $row) { ?>

                                        <tr class="txt-dark">
                                            <td width="70%"><?php echo $row['nama'] . " " . $row['dokter'];   ?></td>
                                            <td width="10%"><?php
                                                            $harga = $row['total'] / $row['frek'];
                                                            echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                            <td width="10%"><?php echo $row['frek'];   ?></td>
                                            <td width="10%" class="font_angka"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                        </tr>
                                    <?php $igd += $harga * $row['frek'];
                                    }
                                    ?>

                                    <tr class="txt-dark">
                                        <td> </td>
                                        <td> </td>
                                        <td>Total</td>
                                        <td class="font_angka"><?php echo "<b>Rp " . number_format($igd, 0, ',', '.') . "</b>";   ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        <?php } else {
                            $igd = 0;
                        }
                        if (count($data_labor) > 0) { ?>
                            <h6 class="panel-title txt-dark">LABORATORIUM</h6>
                            <table id="datable_1" class="table table-hover display  pb-30">
                                <thead>
                                    <tr>
                                        <th>KETERANGAN</th>
                                        <th>HARGA SATUAN</th>
                                        <th>QTY</th>
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
                                            <td width="10%" class="font_angka"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                        </tr>
                                    <?php $labor += $harga * $row['frek'];
                                    }
                                    ?>

                                    <tr class="txt-dark">
                                        <td> </td>
                                        <td> </td>
                                        <td>Total</td>
                                        <td class="font_angka"><?php echo "<b>Rp " . number_format($labor, 0, ',', '.') . "</b>";   ?></td>
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

                                        <th>KETERANGAN</th>

                                        <th>HARGA SATUAN</th>
                                        <th>QTY</th>
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
                                            <td width="10%" class="font_angka"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                        </tr>
                                    <?php $radio += $harga * $row['frek'];
                                    }
                                    ?>

                                    <tr class="txt-dark">
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td>Total</td>
                                        <td class="font_angka"><?php echo "<b>Rp " . number_format($radio, 0, ',', '.') . "</b>";   ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } else {
                            $radio = 0;
                        }
                        ?>
                        <!-- DATA POLI -->
                        <?php

                        if (count($data_poli) > 0) {
                        ?>
                            <table id="datable_1" class="table table-hover display  pb-30">
                                <tbody>
                                    <?php
                                    $group = array();
                                    $total_poli_all = 0;

                                    foreach ($data_poli as $row) {
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
                        if (count($data_apelkes) > 0) {
                        ?>
                            <h6 class="panel-title txt-dark">APELKES</h6>
                            <table id="datable_1" class="table table-hover display  pb-30">
                                <thead>
                                    <tr>

                                        <th>KETERANGAN</th>
                                        <th>HARGA SATUAN</th>
                                        <th>QTY</th>
                                        <th>TOTAL HARGA</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $apelkes = 0;
                                    foreach ($data_apelkes as $row) {

                                    ?>

                                        <tr class="txt-dark">
                                            <td width="70%"><?php echo $row['nama']    ?></td>

                                            <td width="10%"><?php

                                                            $harga = $row['total'] / $row['frek'];
                                                            echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                            <td width="10%"><?php echo $row['frek'];   ?></td>
                                            <td width="10%" class="font_angka"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                        </tr>
                                    <?php $apelkes += $harga * $row['frek'];
                                    }
                                    ?>

                                    <tr class="txt-dark">
                                        <td> </td>
                                        <td> </td>
                                        <td>Total</td>
                                        <td class="font_angka"><?php echo "<b>Rp " . number_format($apelkes, 0, ',', '.') . "</b>";   ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } else {
                            $apelkes = 0;
                        }   ?>

                        <?php
                        if (count($data_ok) > 0) {
                        ?>
                            <h6 class="panel-title txt-dark">KAMAR OPERASI</h6>
                            <table id="datable_1" class="table table-hover display  pb-30">
                                <thead>
                                    <tr>

                                        <th>KETERANGAN</th>
                                        <th>HARGA SATUAN</th>
                                        <th>QTY</th>
                                        <th>TOTAL HARGA</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $ok = 0;
                                    foreach ($data_ok as $row) {

                                    ?>
                                        <tr class="txt-dark">
                                            <td width="70%"><?php echo $row['nama'];   ?></td>

                                            <td width="10%"><?php

                                                            $harga = $row['total'] / $row['frek'];
                                                            echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                            <td width="10%"><?php echo $row['frek'];   ?></td>
                                            <td width="10%" class="font_angka"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                        </tr>
                                    <?php $ok += $harga * $row['frek'];
                                    }
                                    ?>

                                    <tr class="txt-dark">
                                        <td> </td>
                                        <td> </td>
                                        <td>Total</td>
                                        <td class="font_angka"><?php echo "<b>Rp " . number_format($ok, 0, ',', '.') . "</b>";   ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } else {
                            $ok = 0;
                        }

                        ?>
                        <?php
                        if (count($data_gizi) > 0) {
                        ?>
                            <h6 class="panel-title txt-dark">POLI GIZI</h6>
                            <table id="datable_1" class="table table-hover display  pb-30">
                                <thead>
                                    <tr>

                                        <th>KETERANGAN</th>
                                        <th>HARGA SATUAN</th>
                                        <th>QTY</th>
                                        <th>TOTAL HARGA</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $gizi = 0;
                                    foreach ($data_gizi as $row) {

                                    ?>
                                        <tr class="txt-dark">
                                            <td width="70%"><?php echo $row['nama'];   ?></td>

                                            <td width="10%"><?php

                                                            $harga = $row['total'] / $row['frek'];
                                                            echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                            <td width="10%"><?php echo $row['frek'];   ?></td>
                                            <td width="10%" class="font_angka"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                        </tr>
                                    <?php $gizi += $harga * $row['frek'];
                                    }
                                    ?>

                                    <tr class="txt-dark">
                                        <td> </td>
                                        <td> </td>
                                        <td>Total</td>
                                        <td class="font_angka"><?php echo "<b>Rp " . number_format($gizi, 0, ',', '.') . "</b>";   ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } else {
                            $gizi = 0;
                        }

                        ?>
                        <?php

                        if (count($data_transportasi) > 0) {
                        ?>
                            <h6 class="panel-title txt-dark">TRANSPORTASI</h6>
                            <table id="datable_1" class="table table-hover display  pb-30">
                                <thead>
                                    <tr>

                                        <th>KETERANGAN</th>

                                        <th>HARGA SATUAN</th>
                                        <th>QTY</th>
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
                                            <td width="10%" class="font_angka"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                        </tr>
                                    <?php $trasnportasi += $harga * $row['frek'];
                                    }
                                    ?>

                                    <tr class="txt-dark">
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td>Total</td>
                                        <td class="font_angka"><?php echo "<b>Rp " . number_format($trasnportasi, 0, ',', '.') . "</b>";   ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } else {
                            $trasnportasi = 0;
                        }

                        if (count($data_lain) > 0) {
                        ?>
                            <h6 class="panel-title txt-dark">PENUNJANG LAINNYA</h6>
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
                                    <?php $lain = 0;
                                    foreach ($data_lain as $row) {

                                    ?>

                                        <tr class="txt-dark">
                                            <td width="60%"><?php echo $row['nama'];   ?></td>

                                            <td width="10%"><?php

                                                            $harga = $row['total'] / $row['frek'];
                                                            echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                            <td width="10%"><?php echo $row['frek'];   ?></td>
                                            <td width="10%" class="font_angka"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                        </tr>
                                    <?php $lain += $harga * $row['frek'];
                                    }
                                    ?>

                                    <tr class="txt-dark">
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td>Total</td>
                                        <td class="font_angka"><?php echo "<b>Rp " . number_format($lain, 0, ',', '.') . "</b>";   ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } else {
                            $lain = 0;
                        }


                        ?>
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h4 class="panel-title txt-dark">Total</h4>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <table id="datable_1" class="table table-hover display  pb-30">

                                            <tbody>
                                                <?php
                                                $total_semua = $total_pelayanan + $biaya_jasa_his + $apotik + $obatok + $igd + $labor + $radio + $apelkes + $ok
                                                    + $gizi + $trasnportasi + $total_poli_all;
                                                ?>
                                                <tr class="txt-dark" width="30%">
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td>TOTAL BIAYA </td>
                                                    <td class="font_angka"><?php echo "<b>Rp " . number_format($total_semua, 0, ',', '.') . "</b>";   ?>
                                                    </td>
                                                </tr>
                                                <tr class="txt-dark" width="30%">
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td>DISC </td>
                                                    <td class="font_angka"><?php
                                                                            //  if(preg_match('/INHEALTH/i',$pasien['cara_bayar'])){
                                                                            //     $diskon = $total_semua * (3/100);
                                                                            // }else{
                                                                            //     $diskon = $diskon;
                                                                            // }
                                                                            echo "<b>Rp " . number_format($diskon, 0, ',', '.') . "</b>";   ?>
                                                    </td>
                                                </tr>
                                                <?php $totalppn = ($total_semua - $diskon) * 0.11; ?>
                                                <tr class="txt-dark" width="30%">
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td>TOTAL DPP </td>
                                                    <td class="font_angka"><?php echo "<b>Rp " . number_format($total_semua - $diskon, 0, ',', '.') . "</b>";   ?>
                                                    </td>
                                                </tr>
                                                <tr class="txt-dark" width="30%">
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td>PPN </td>
                                                    <td class="font_angka"><?php echo "Rp " . number_format($totalppn, 0, ',', '.') . "";   ?>
                                                    </td>
                                                </tr>
                                                <tr class="txt-dark" width="30%">
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td>PPN DIBEBASKAN</td>
                                                    <td class="font_angka"><?php echo "(Rp " . number_format($totalppn, 0, ',', '.') . ")";   ?>
                                                    </td>
                                                </tr>
                                                <tr class="txt-dark" width="30%">
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td>PPN TERHUTANG </td>
                                                    <td class="font_angka"><?php echo "<b>Rp " . number_format(0, 0, ',', '.') . "</b>";   ?>
                                                    </td>
                                                </tr>
                                                <tr class="txt-dark" width="30%">
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td>TOTAL </td>
                                                    <td class="font_angka"><?php echo "<b>Rp " . number_format(($total_semua - $diskon), 0, ',', '.') . "</b>";   ?>
                                                    </td>
                                                </tr>
                                                <tr class="txt-dark" width="30%">
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td>DEPOSIT/YANG SUDAH DIBAYAR </td>
                                                    <td class="font_angka"><?php

                                                                            echo "<b>Rp " . number_format($dp, 0, ',', '.') . "</b>";   ?>
                                                    </td>
                                                </tr>
                                                <tr class="txt-dark" width="30%">
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td>PEMBAYARAN SELISIH </td>
                                                    <td class="font_angka"><?php echo "<b>Rp " . number_format($selisih, 0, ',', '.') . "</b>";   ?>
                                                    </td>
                                                </tr>

                                                <tr class="txt-dark" width="30%">
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td>YANG MASIH HARUS DIBAYAR </td>
                                                    <input type="hidden" id="outTotal" value="<?php echo intval((($total_semua - $diskon)) - $dp  - $selisih); ?>">
                                                    <input type="hidden" id="outTotalAwal" value="<?php echo intval($total_semua);  ?>">
                                                    <input type="hidden" id="inPel" value="<?php echo $inPel; ?>">
                                                    <input type="hidden" id="diskon" value="<?php echo $diskon; ?>">
                                                    <input type="hidden" id="dp" value="<?php echo $dp; ?>">
                                                    <input type="hidden" id="tgl_keluar" value="<?php echo $tgl_keluar_rajal; ?>">
                                                    <td class="font_angka"><?php echo "<b>Rp " . number_format(((($total_semua - $diskon)) - $dp - $selisih), 0, ',', '.') . "</b>";   ?>
                                                    </td>
                                                </tr>
                                                <tr class="txt-dark" width="30%">
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td>TERBILANG : </td>
                                                    <br><br>
                                                    <td colspan="4" class="font_angka" style="font-style: italic;"># <?= Terbilang(($total_semua - $diskon)) ?> #</td>
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
<br>
<br>
<br>
<br>
<div class="panel panel-default card-view">
    <div class="panel-heading">

        *Catatan: <?= $note ?>

    </div>
</div>
<style>
    footer {
        position: fixed;
        bottom: 0;
    }

    footer {
        font-size: 8px;
        /* color: #f00; */
        text-align: center;
    }

    .content-block {
        page-break-inside: avoid;
    }

    /* html,
    body {
        width: 210mm;
        height: 297mm;
    } */
    body {
        /* font-family: 'Times New Roman', serif; */
        font-size: 12px;
    }
</style>