<<<<<<< HEAD
<body onload="myFunction()">
    <div class="content-block">
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
                                            <td width="10%"><?php $harga = round($data_pelayanan['total'] / 500) * 500;
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
                                                    <td width="10%"><?php $harga_jasa = round($row['biaya_jasa'] / 500) * 500;
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
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php
                                                $obatok += $harga * $row['frek'];
                                            } ?>
                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($obatok, 0, ',', '.') . "</b>";   ?></td>
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
                                if (count($data_anak) > 0) { ?>
                                    <h6 class="panel-title txt-dark">POLI ANAK</h6>
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
                                            $anak = 0;
                                            foreach ($data_anak as $row) {

                                            ?>

                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $anak += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($anak, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $anak = 0;
                                }  ?>
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
                                <?php } else {
                                    $apelkes = 0;
                                }   ?>

                                <?php
                                if (count($data_internis) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI PENYAKIT DALAM</h6>
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
                                            $internis = 0;
                                            foreach ($data_internis as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $internis += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($internis, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $internis = 0;
                                }
                                ?>
                                <?php
                                if (count($data_bedah) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI BEDAH</h6>
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
                                            $bedah = 0;
                                            foreach ($data_bedah as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $bedah += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($bedah, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $bedah = 0;
                                }
                                if (count($data_fisio) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">FISIOTERAPI</h6>
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
                                            $fisio = 0;
                                            foreach ($data_fisio as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $fisio += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($fisio, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $fisio = 0;
                                }
                                if (count($data_gigi) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI GIGI</h6>
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
                                            $gigi = 0;
                                            foreach ($data_gigi as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $gigi += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($gigi, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $gigi = 0;
                                }
                                if (count($data_jantung) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI JANTUNG</h6>
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
                                            $jantung = 0;
                                            foreach ($data_jantung as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php
                                                                    if ($row['total'] / $row['frek'] < 300) {
                                                                        $harga_satuan = 300;
                                                                    } else {
                                                                        $harga_satuan = $row['total'] / $row['frek'];
                                                                    }
                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $jantung += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($jantung, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $jantung = 0;
                                }
                                if (count($data_kulit) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI KULIT</h6>
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
                                            $kulit = 0;
                                            foreach ($data_kulit as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $kulit += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($kulit, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $kulit = 0;
                                }
                                if (count($data_mata) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI MATA</h6>
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
                                            $mata = 0;
                                            foreach ($data_mata as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $mata += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($mata, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $mata = 0;
                                }
                                if (count($data_obgyne) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI OBGYNE</h6>
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
                                            $obgyne = 0;
                                            foreach ($data_obgyne as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $obgyne += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($obgyne, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $obgyne = 0;
                                }
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
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $ok += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($ok, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $ok = 0;
                                }
                                if (count($data_tht) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI THT</h6>
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
                                            $tht = 0;
                                            foreach ($data_tht as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $tht += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($tht, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $tht = 0;
                                }
                                if (count($data_umum) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI UMUM</h6>
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
                                            $umum = 0;
                                            foreach ($data_umum as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $umum += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($umum, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $umum = 0;
                                }

                                if (count($data_akp) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI AKUPUNTUR MEDIK</h6>
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
                                            $akp = 0;
                                            foreach ($data_akp as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $akp += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($akp, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $akp = 0;
                                }

                                if (count($data_bdm) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI BEDAH UMUM</h6>
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
                                            $bdm = 0;
                                            foreach ($data_bdm as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $bdm += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($bdm, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $bdm = 0;
                                }

                                if (count($data_jiwa) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI KESEHATAN JIWA</h6>
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
                                            $jiwa = 0;
                                            foreach ($data_jiwa as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $jiwa += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($jiwa, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $jiwa = 0;
                                }

                                if (count($data_ort) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI ORTHOPEDI</h6>
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
                                            $ort = 0;
                                            foreach ($data_ort as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $ort += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($ort, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $ort = 0;
                                }

                                if (count($data_paru) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI PARU</h6>
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
                                            $paru = 0;
                                            foreach ($data_paru as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $paru += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($paru, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $paru = 0;
                                }

                                if (count($data_hd) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI HEMODIALISA</h6>
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
                                            $hd = 0;
                                            foreach ($data_hd as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $hd += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($hd, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $hd = 0;
                                }

                                if (count($data_saraf) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI SARAF</h6>
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
                                            $saraf = 0;
                                            foreach ($data_saraf as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $saraf += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($hd, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $saraf = 0;
                                }

                                if (count($data_uro) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI UROLOGI</h6>
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
                                            $uro = 0;
                                            foreach ($data_uro as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $uro += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($uro, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $uro = 0;
                                }

                                if (count($data_ginjal) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI GINJAL</h6>
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
                                            $ginjal = 0;
                                            foreach ($data_ginjal as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $ginjal += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($ginjal, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $ginjal = 0;
                                }

                                if (count($data_pnm) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI PENYAKIT MULUT</h6>
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
                                            $pnm = 0;
                                            foreach ($data_pnm as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $pnm += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($pnm, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $pnm = 0;
                                }

                                if (count($data_rehab) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI REHABILITASI MEDIK</h6>
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
                                            $rehab = 0;
                                            foreach ($data_rehab as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $rehab += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($rehab, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $rehab = 0;
                                }
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
                                                        $total_semua = $total_pelayanan + $biaya_jasa_his + $apotik + $obatok + $igd + $labor + $radio + $anak
                                                            + $apelkes + $bedah + $fisio + $gigi + $mata + $obgyne + $ok + $tht + $kulit + $jantung
                                                            + $internis + $umum + $akp + $bdm + $jiwa + $ort + $paru + $hd + $saraf + $uro + $ginjal
                                                            + $pnm + $rehab + $trasnportasi;
                                                        ?>
                                                        <tr class="txt-dark" width="30%">
                                                            <td> </td>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td>TOTAL BIAYA </td>
                                                            <td><?php echo "<b>Rp " . number_format($total_semua, 0, ',', '.') . "</b>";   ?>
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
                                                            <td>YANG SUDAH DIBAYAR </td>
                                                            <td><?php
                                                                echo "<b>Rp " . number_format($dp, 0, ',', '.') . "</b>";   ?>
                                                            </td>
                                                        </tr>
                                                        <tr class="txt-dark" width="30%">
                                                            <td> </td>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td>PEMBAYARAN SELISIH </td>
                                                            <td><?php echo "<b>Rp " . number_format($selisih, 0, ',', '.') . "</b>";   ?>
                                                            </td>
                                                        </tr>
                                                        <tr class="txt-dark" width="30%">
                                                            <td> </td>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td>YANG MASIH HARUS DIBAYAR </td>
                                                            <input type="hidden" id="outTotal" value="<?php echo round($total_semua - $dp - $diskon - $selisih); ?>">
                                                            <input type="hidden" id="outTotalAwal" value="<?php echo round($total_semua);  ?>">
                                                            <input type="hidden" id="inPel" value="<?php echo $inPel; ?>">
                                                            <input type="hidden" id="diskon" value="<?php echo $diskon; ?>">
                                                            <input type="hidden" id="dp" value="<?php echo $dp; ?>">
                                                            <input type="hidden" id="tgl_keluar" value="<?php echo $tgl_keluar_rajal; ?>">
                                                            <td><?php echo "<b>Rp " . number_format(($total_semua - $dp - $diskon - $selisih), 0, ',', '.') . "</b>";   ?>
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
    </div>
    <footer>
        <?php
        echo ($staff->tipe == 'keuangan') ? $pasien['nama'] : ''; ?>
    </footer>
</body>
<style>
    @media print {
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
    }
</style>
<script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    window.onafterprint = function(e) {

        closePrintView();
    };

    function myFunction() {
        var action = '<?= $action ?>';
        var opsi = '<?= $opsi ?>';
        if (opsi == 'asuransi') {

            id_pelayanan = $('#inPel').val();
            total_semua = $('#outTotal').val();
            total = $('#outTotalAwal').val();
            dp = $('#dp').val();
            diskon = $('#diskon').val();
            tgl_keluar = $('#tgl_keluar').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Kasir/insert_pembayaran') ?>",
                dataType: "JSON",
                data: {
                    id_pelayanan: id_pelayanan,
                    total_bayar: total_semua,
                    total_harga: total,
                    dp: dp,
                    diskon: diskon,
                    selisih: '<?= $selisih ?>',
                    note: '<?= $note ?>',
                    tgl_keluar: tgl_keluar,
                    opsi: '<?= $opsi ?>',
                    // totalbayarkasir: '</?= $totalbayarkasir ?>',
                    // totalkeseluruhan: '</?= $totalkeseluruhan ?>',
                    totalbayarkasir: total,
                    totalkeseluruhan: total,
                    jenis_bank: '',
                    action: action,
                },
                success: function(data) {
                    if (data.status == 'success') {
                        window.print();
                    }

                }
            });
        } else {
            window.print();
        }
    }


    function closePrintView() {
        // window.close();
        // window.location.href = 'javascript:history.go(-1)';
    }
=======
<body onload="myFunction()">
    <div class="content-block">
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
                                            <td width="10%"><?php $harga = round($data_pelayanan['total'] / 500) * 500;
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
                                                    <td width="10%"><?php $harga_jasa = round($row['biaya_jasa'] / 500) * 500;
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
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php
                                                $obatok += $harga * $row['frek'];
                                            } ?>
                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($obatok, 0, ',', '.') . "</b>";   ?></td>
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
                                if (count($data_anak) > 0) { ?>
                                    <h6 class="panel-title txt-dark">POLI ANAK</h6>
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
                                            $anak = 0;
                                            foreach ($data_anak as $row) {

                                            ?>

                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $anak += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($anak, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $anak = 0;
                                }  ?>
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
                                <?php } else {
                                    $apelkes = 0;
                                }   ?>

                                <?php
                                if (count($data_internis) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI PENYAKIT DALAM</h6>
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
                                            $internis = 0;
                                            foreach ($data_internis as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $internis += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($internis, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $internis = 0;
                                }
                                ?>
                                <?php
                                if (count($data_bedah) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI BEDAH</h6>
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
                                            $bedah = 0;
                                            foreach ($data_bedah as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $bedah += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($bedah, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $bedah = 0;
                                }
                                if (count($data_fisio) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">FISIOTERAPI</h6>
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
                                            $fisio = 0;
                                            foreach ($data_fisio as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $fisio += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($fisio, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $fisio = 0;
                                }
                                if (count($data_gigi) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI GIGI</h6>
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
                                            $gigi = 0;
                                            foreach ($data_gigi as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $gigi += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($gigi, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $gigi = 0;
                                }
                                if (count($data_jantung) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI JANTUNG</h6>
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
                                            $jantung = 0;
                                            foreach ($data_jantung as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php
                                                                    if ($row['total'] / $row['frek'] < 300) {
                                                                        $harga_satuan = 300;
                                                                    } else {
                                                                        $harga_satuan = $row['total'] / $row['frek'];
                                                                    }
                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $jantung += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($jantung, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $jantung = 0;
                                }
                                if (count($data_kulit) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI KULIT</h6>
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
                                            $kulit = 0;
                                            foreach ($data_kulit as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $kulit += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($kulit, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $kulit = 0;
                                }
                                if (count($data_mata) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI MATA</h6>
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
                                            $mata = 0;
                                            foreach ($data_mata as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $mata += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($mata, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $mata = 0;
                                }
                                if (count($data_obgyne) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI OBGYNE</h6>
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
                                            $obgyne = 0;
                                            foreach ($data_obgyne as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $obgyne += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($obgyne, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $obgyne = 0;
                                }
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
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $ok += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($ok, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $ok = 0;
                                }
                                if (count($data_tht) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI THT</h6>
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
                                            $tht = 0;
                                            foreach ($data_tht as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $tht += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($tht, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $tht = 0;
                                }
                                if (count($data_umum) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI UMUM</h6>
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
                                            $umum = 0;
                                            foreach ($data_umum as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $umum += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($umum, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $umum = 0;
                                }

                                if (count($data_akp) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI AKUPUNTUR MEDIK</h6>
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
                                            $akp = 0;
                                            foreach ($data_akp as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $akp += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($akp, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $akp = 0;
                                }

                                if (count($data_bdm) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI BEDAH UMUM</h6>
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
                                            $bdm = 0;
                                            foreach ($data_bdm as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $bdm += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($bdm, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $bdm = 0;
                                }

                                if (count($data_jiwa) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI KESEHATAN JIWA</h6>
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
                                            $jiwa = 0;
                                            foreach ($data_jiwa as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $jiwa += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($jiwa, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $jiwa = 0;
                                }

                                if (count($data_ort) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI ORTHOPEDI</h6>
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
                                            $ort = 0;
                                            foreach ($data_ort as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $ort += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($ort, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $ort = 0;
                                }

                                if (count($data_paru) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI PARU</h6>
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
                                            $paru = 0;
                                            foreach ($data_paru as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $paru += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($paru, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $paru = 0;
                                }

                                if (count($data_hd) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI HEMODIALISA</h6>
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
                                            $hd = 0;
                                            foreach ($data_hd as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $hd += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($hd, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $hd = 0;
                                }

                                if (count($data_saraf) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI SARAF</h6>
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
                                            $saraf = 0;
                                            foreach ($data_saraf as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $saraf += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($hd, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $saraf = 0;
                                }

                                if (count($data_uro) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI UROLOGI</h6>
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
                                            $uro = 0;
                                            foreach ($data_uro as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $uro += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($uro, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $uro = 0;
                                }

                                if (count($data_ginjal) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI GINJAL</h6>
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
                                            $ginjal = 0;
                                            foreach ($data_ginjal as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $ginjal += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($ginjal, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $ginjal = 0;
                                }

                                if (count($data_pnm) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI PENYAKIT MULUT</h6>
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
                                            $pnm = 0;
                                            foreach ($data_pnm as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $pnm += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($pnm, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $pnm = 0;
                                }

                                if (count($data_rehab) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI REHABILITASI MEDIK</h6>
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
                                            $rehab = 0;
                                            foreach ($data_rehab as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $rehab += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($rehab, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $rehab = 0;
                                }
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
                                                        $total_semua = $total_pelayanan + $biaya_jasa_his + $apotik + $obatok + $igd + $labor + $radio + $anak
                                                            + $apelkes + $bedah + $fisio + $gigi + $mata + $obgyne + $ok + $tht + $kulit + $jantung
                                                            + $internis + $umum + $akp + $bdm + $jiwa + $ort + $paru + $hd + $saraf + $uro + $ginjal
                                                            + $pnm + $rehab + $trasnportasi;
                                                        ?>
                                                        <tr class="txt-dark" width="30%">
                                                            <td> </td>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td>TOTAL BIAYA </td>
                                                            <td><?php echo "<b>Rp " . number_format($total_semua, 0, ',', '.') . "</b>";   ?>
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
                                                            <td>YANG SUDAH DIBAYAR </td>
                                                            <td><?php
                                                                echo "<b>Rp " . number_format($dp, 0, ',', '.') . "</b>";   ?>
                                                            </td>
                                                        </tr>
                                                        <tr class="txt-dark" width="30%">
                                                            <td> </td>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td>PEMBAYARAN SELISIH </td>
                                                            <td><?php echo "<b>Rp " . number_format($selisih, 0, ',', '.') . "</b>";   ?>
                                                            </td>
                                                        </tr>
                                                        <tr class="txt-dark" width="30%">
                                                            <td> </td>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td>YANG MASIH HARUS DIBAYAR </td>
                                                            <input type="hidden" id="outTotal" value="<?php echo round($total_semua - $dp - $diskon - $selisih); ?>">
                                                            <input type="hidden" id="outTotalAwal" value="<?php echo round($total_semua);  ?>">
                                                            <input type="hidden" id="inPel" value="<?php echo $inPel; ?>">
                                                            <input type="hidden" id="diskon" value="<?php echo $diskon; ?>">
                                                            <input type="hidden" id="dp" value="<?php echo $dp; ?>">
                                                            <input type="hidden" id="tgl_keluar" value="<?php echo $tgl_keluar_rajal; ?>">
                                                            <td><?php echo "<b>Rp " . number_format(($total_semua - $dp - $diskon - $selisih), 0, ',', '.') . "</b>";   ?>
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
    </div>
    <footer>
        <?php
        echo ($staff->tipe == 'keuangan') ? $pasien['nama'] : ''; ?>
    </footer>
</body>
<style>
    @media print {
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
    }
</style>
<script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    window.onafterprint = function(e) {

        closePrintView();
    };

    function myFunction() {
        var action = '<?= $action ?>';
        var opsi = '<?= $opsi ?>';
        if (opsi == 'asuransi') {

            id_pelayanan = $('#inPel').val();
            total_semua = $('#outTotal').val();
            total = $('#outTotalAwal').val();
            dp = $('#dp').val();
            diskon = $('#diskon').val();
            tgl_keluar = $('#tgl_keluar').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Kasir/insert_pembayaran') ?>",
                dataType: "JSON",
                data: {
                    id_pelayanan: id_pelayanan,
                    total_bayar: total_semua,
                    total_harga: total,
                    dp: dp,
                    diskon: diskon,
                    selisih: '<?= $selisih ?>',
                    note: '<?= $note ?>',
                    tgl_keluar: tgl_keluar,
                    opsi: '<?= $opsi ?>',
                    // totalbayarkasir: '</?= $totalbayarkasir ?>',
                    // totalkeseluruhan: '</?= $totalkeseluruhan ?>',
                    totalbayarkasir: total,
                    totalkeseluruhan: total,
                    jenis_bank: '',
                    action: action,
                },
                success: function(data) {
                    if (data.status == 'success') {
                        window.print();
                    }

                }
            });
        } else {
            window.print();
        }
    }


    function closePrintView() {
        // window.close();
        // window.location.href = 'javascript:history.go(-1)';
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>