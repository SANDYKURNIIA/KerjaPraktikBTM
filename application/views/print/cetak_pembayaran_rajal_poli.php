<body onload="myFunction()">
    <div class="panel panel-default card-view">
        <div class="panel-heading">
            <table>
                <tr>
                    <td> <a><img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" width="100px" alt="logo" /></a></td>
                    <td> <a><img src="<?= base_url('assets/dist/img/alamat.jpg'); ?>" width="200px" alt="logoa" /></a></td>
                    <td> <?php
                            echo "NAMA : " . $pasien['nama'];
                            echo "<br>NO RM : " . sprintf('%06d', $pasien['no_rm']);
                            echo "<br>CARA BAYAR : " . $pasien['cara_bayar'];
                            echo "<br>CARA MASUK : " . $pasien['asal'];
                            echo "<br>DPJP : " . $pasien['nama_dokter'];
                            echo "<br>TANGGAL MASUK : " . $pasien['tgl_masuk'];
                            echo "<br>TANGGAL KELUAR : " .  str_replace('T', ' ', $tgl_keluar);
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
                                        <th>NAMA TINDAKAN</th>
                                        <th>TOTAL HARGA</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="txt-dark">
                                        <td width="70%">KONSULTASI & ADMINISTRASI</td>
                                        <td width="10%"><?php $harga = round($data_pelayanan['total'] / 500) * 500;
                                                        $adm = round($data_pelayanan['biaya_admin'] / 500) * 500;
                                                        $total_pelayanan = $harga + $adm;
                                                        echo "Rp " . number_format($total_pelayanan, 0, ',', '.');   ?></td>
                                    </tr>


                                </tbody>
                            </table>
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
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $k['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $total_poli += $harga * $k['frek'];
                                            }
                                            ?>
                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($total_poli, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        <?php
                                        $total_poli_all +=$total_poli;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <?php } else {
                                $total_poli_all = 0;
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
                                                    $total_semua = $total_pelayanan + $total_poli_all;
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
                                                    <!-- <tr class="txt-dark" width="30%">
                                                        <td> </td>
                                                        <td> </td>
                                                        <td> </td>
                                                        <td>PPN KELUARAN </td>
                                                        <td><?php
                                                            $ppn = $apotik * 0.11;
                                                            echo "<b>Rp " . number_format($ppn, 0, ',', '.') . "</b>";   ?>
                                                        </td>
                                                    </tr> -->
                                                    <tr class="txt-dark" width="30%">
                                                        <td> </td>
                                                        <td> </td>
                                                        <td> </td>
                                                        <td>TOTAL BAYAR </td>
                                                        <input type="hidden" id="outTotal" value="<?php echo round(($total_semua - $dp - $diskon) / 500) * 500; ?>">
                                                        <input type="hidden" id="outTotalAwal" value="<?php echo round($total_semua / 500) * 500;  ?>">
                                                        <input type="hidden" id="inPel" value="<?php echo $inPel; ?>">
                                                        <input type="hidden" id="diskon" value="<?php echo $diskon; ?>">
                                                        <input type="hidden" id="dp" value="<?php echo $dp; ?>">
                                                        <input type="hidden" id="tgl_keluar" value="<?php echo $tgl_keluar_rajal; ?>">
                                                        <td><?php echo "<b>Rp " . number_format(($total_semua - $dp - $diskon), 0, ',', '.') . "</b>";   ?>
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

        window.print();
    }


    function closePrintView() {
        // window.location.href = 'javascript:history.go(-1)';
    }
</script>