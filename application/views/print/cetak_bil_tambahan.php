<!DOCTYPE html>
<html>
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

<body onload="myFunction()">
    <div class="col-md-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <table>
                    <tr>
                        <td> <a><img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" width="100px" alt="logo" /></a></td>
                        <td> <a><img src="<?= base_url('assets/dist/img/alamat.jpg'); ?>" width="200px" alt="logoa" /></a></td>
                        <td class=gariskanan>

                        </td>

                    </tr>


                </table>
                <div class="panel-heading">
                    <table>
                        <tr>
                            <td> <?php



                                    echo "NAMA : " . $pasien['nama'];
                                    // 						echo "<br>NO RM : ". sprintf('%06d', $no_rm) ;
                                    // 						echo "<br>CARA BAYAR : ".$caraBayar;
                                    // 						echo "<br>CARA MASUK : ".$asal;
                                    // 						echo "<br>DPJP : ".$dokter;
                                    //                     echo "<br>TANGGAL MASUK : ".$masuk;
                                    //                     echo "<br>TANGGAL KELUAR : ".$keluar;

                                    ?></td>
                        </tr>
                    </table>
                    <hr>
                    <!-- <h3 align="center" width="95%"> KWITANSI </h3> -->
                    </hr>
                    <div>
                        <div>
                            <div>
                                <br>

                                <div>
                                    <h4>PELAYANAN TAMBAHAN</h4>
                                    <div class="kolom">
                                        <table>
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
                                                $totalTindakan = 0;
                                                foreach ($data as $row) {
                                                    $totalTindakan += $row['total'];
                                                ?>
                                                    <tr>
                                                        <td width="20%"><?php echo $row['tindakan'];   ?></td>
                                                        <td width="10%"><?php echo "Rp " . number_format($row['harga'], 0, ',', '.');   ?></td>
                                                        <td width="10%"><?php echo $row['frek'];   ?></td>
                                                        <td width="10%"><?php echo "Rp " . number_format($row['total'], 0, ',', '.');   ?></td>
                                                    </tr>
                                                <?php }

                                                ?>

                                                <tr>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td>Total</td>
                                                    <td><?php echo "<b>Rp " . number_format($totalTindakan, 0, ',', '.') . "</b>";   ?></td>
                                                </tr>

                                            </tbody>
                                        </table>

                                    </div>
                                    -------------------------------------------------------------------------------------------

                                    <div>
                                        <!-- <h5> No NPWP : 71.785.977.1-304.000 </h5> -->
                                        <h4>PETUGAS</h4>
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

        <script type="text/javascript">
            function myFunction() {
                window.print();
            }
            window.onafterprint = function(e) {
                closePrintView();
            };

            function closePrintView() {
                window.location.href = 'javascript:history.go(-1)';
            }
        </script>
</body>

</html>