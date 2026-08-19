<body onload="myFunction()">
    <div class="panel panel-default card-view">
        <div class="panel-heading">
            <table>
                <tr>
                    <td> <a><img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" width="200px" alt="logo" /></a></td>
                    <td> <a><img src="<?= base_url('assets/dist/img/alamat.jpg'); ?>" alt="logoa" /></a></td>
                    <td> <?php
                            echo "NAMA : " . $pasien['nama'];
                            echo "<br>NO RM : " . sprintf('%06d', $pasien['no_rm']);
                            echo "<br>CARA BAYAR : " . $pasien['cara_bayar'];
                            echo "<br>CARA MASUK : " . $pasien['asal'];
                            echo "<br>DPJP IGD : " . $dokterIGD;
                            echo "<br>DPJP POLI : " . $dokterPoli;
                            echo "<br>DPJP RANAP : " . $pasien['nama_dokter'];
                            echo "<br>TANGGAL MASUK : " . $pasien['tgl_masuk'];
                            // echo "<br>TANGGAL KELUAR : " . $pasien['tgl_keluar'];
                            echo "<br>TANGGAL KELUAR : " .  str_replace('T', ' ', $tgl_keluar_ranap);
                            ?></td>
                </tr>
            </table>
        </div>
        <div class="panel-wrapper collapse in ">
            <div class="panel-body">
                <div class="kolom">
                    <div class="row ">
                        <div class="col-sm-12">


                            <h4 class="panel-title txt-dark"> PELAYANAN</h4>
                            <table id="datable_1" class="table table-hover display  pb-30">
                                <thead>
                                    <tr>
                                        <th>NAMA TINDAKAN</th>
                                        <th>TOTAL HARGA</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="txt-dark">
                                        <td width="70%">KONSULTASI</td>
                                        <td width="10%"><?php $harga = round($data_pelayanan['total'] / 500) * 500;
                                                        $adm = round($data_pelayanan['biaya_admin'] / 500) * 500;
                                                        $total_pelayanan = $harga;
                                                        echo "Rp " . number_format($total_pelayanan, 0, ',', '.');   ?></td>
                                    </tr>
                                    <!-- <tr class="txt-dark">
                                        <td width="70%">ADMINISTRASI</td>
                                        <td width="10%"><?php $adm = round($data_pelayanan['biaya_admin'] / 500) * 500;
                                                        echo "Rp " . number_format($adm, 0, ',', '.');   ?></td>
                                    </tr>
                                    <tr class="txt-dark">
                                        <td> </td>
                                        <td> </td>
                                        <td>Total</td>
                                        <td><?php $total_pelayanan = $harga + $adm;
                                            echo "<b>Rp " . number_format($total_pelayanan, 0, ',', '.') . "</b>";   ?></td>
                                    </tr> -->

                                </tbody>
                            </table>
                            <?php
                            if (count($data_apotik) > 0) { ?>

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
                                        foreach ($data_apotik as $row) {
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
                                            <th>NAMA TINDAKAN</th>
                                            <th>HARGA SATUAN</th>
                                            <th>FREK</th>
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
                                            <th>NAMA TINDAKAN</th>
                                            <th>HARGA SATUAN</th>
                                            <th>FREK</th>
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
                            if (count($data_anak) > 0) { ?>
                                <h6 class="panel-title txt-dark">POLI ANAK</h6>
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
                                        <?php $anak = $harga * $row['frek'];
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

                                            <th>NAMA TINDAKAN</th>
                                            <th>HARGA SATUAN</th>
                                            <th>FREK</th>
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

                                            <th>NAMA TINDAKAN</th>
                                            <th>HARGA SATUAN</th>
                                            <th>FREK</th>
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

                                            <th>NAMA TINDAKAN</th>
                                            <th>HARGA SATUAN</th>
                                            <th>FREK</th>
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
                                <h6 class="panel-title txt-dark">POLI REHABILITASI MEDIC</h6>
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

                                            <th>NAMA TINDAKAN</th>
                                            <th>HARGA SATUAN</th>
                                            <th>FREK</th>
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

                                            <th>NAMA TINDAKAN</th>
                                            <th>HARGA SATUAN</th>
                                            <th>FREK</th>
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

                                            <th>NAMA TINDAKAN</th>
                                            <th>HARGA SATUAN</th>
                                            <th>FREK</th>
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

                                            <th>NAMA TINDAKAN</th>
                                            <th>HARGA SATUAN</th>
                                            <th>FREK</th>
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

                                            <th>NAMA TINDAKAN</th>
                                            <th>HARGA SATUAN</th>
                                            <th>FREK</th>
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

                                            <th>NAMA TINDAKAN</th>
                                            <th>HARGA SATUAN</th>
                                            <th>FREK</th>
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

                                            <th>NAMA TINDAKAN</th>
                                            <th>HARGA SATUAN</th>
                                            <th>FREK</th>
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

                                            <th>NAMA TINDAKAN</th>
                                            <th>HARGA SATUAN</th>
                                            <th>FREK</th>
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

                            ?>
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h4 class="panel-title txt-dark">Total</h4>
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
                                                    $total_semua = $total_pelayanan + $apotik + $obatok + $igd + $labor + $radio + $anak + $apelkes + $bedah + $fisio + $gigi + $mata + $obgyne + $ok + $tht + $kulit + $jantung + $internis + $umum;
                                                    ?>
                                                    <tr class="txt-dark" width="30%">
                                                        <td> </td>
                                                        <td> </td>
                                                        <td> </td>
                                                        <td>Total Bayar </td>
                                                        <td><?php echo "<b>Rp " . number_format($total_semua, 0, ',', '.') . "</b>";   ?>
                                                        </td>
                                                    </tr>
                                                    <tr class="txt-dark" width="30%">
                                                        <td> </td>
                                                        <td> </td>
                                                        <td> </td>
                                                        <td>ADMINISTRASI </td>
                                                        <td><?php $adm = ($total_semua * 0.01);
                                                            echo "<b>Rp " . number_format($adm, 0, ',', '.') . "</b>";   ?>
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
                                                        <td>DP </td>
                                                        <td><?php echo "<b>Rp " . number_format($dp, 0, ',', '.') . "</b>";   ?>
                                                        </td>
                                                    </tr>
                                                    <tr class="txt-dark" width="30%">
                                                        <td> </td>
                                                        <td> </td>
                                                        <td> </td>
                                                        <td>TOTAL BAYAR </td>
                                                        <input type="hidden" id="outTotal" value="<?php echo round((($total_semua + $adm) - $dp - $diskon) / 500) * 500; ?>">
                                                        <input type="hidden" id="outTotalAwal" value="<?php echo round($total_semua / 500) * 500;  ?>">
                                                        <input type="hidden" id="inPel" value="<?php echo $inPel; ?>">
                                                        <input type="hidden" id="diskon" value="<?php echo $diskon; ?>">
                                                        <input type="hidden" id="dp" value="<?php echo $dp; ?>">
                                                        <input type="hidden" id="tgl_keluar" value="<?php echo $tgl_keluar_ranap; ?>">
                                                        <td><?php echo "<b>Rp " . number_format((($total_semua + $adm) - $dp - $diskon), 0, ',', '.') . "</b>";   ?>
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

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<style>
    .kolom {
        -webkit-column-count: 2;
        /* Chrome, Safari, Opera */
        -moz-column-count: 2;
        /* Firefox */
        column-count: 2;
        -moz-column-fill: auto;
        column-fill: auto;

    }
</style>
<script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    window.onafterprint = function(e) {

        closePrintView();
    };

    function myFunction() {
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