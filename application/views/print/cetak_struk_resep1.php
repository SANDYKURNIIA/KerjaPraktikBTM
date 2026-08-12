<<<<<<< HEAD
<body onload="myFunction()">
    <center>RS. Bakti Timah</center>
    <center>APOTIK</center>
    <center><?php date_default_timezone_set('Asia/Jakarta');
            setlocale(LC_TIME, 'IND');
            echo date(" d M Y ");  ?></center>

    <?php


    echo "<br>NO. FAKTUR : " . $nota->no_nota;
    echo "<br>NAMA : " . $pasien['nama'];
    echo "<br>NO RM : " . $pasien['no_rm'];
    echo "<br>CARA BAYAR : " . $pasien['cara_bayar'];
    echo "<br>CARA MASUK : " . $pasien['asal'];
    echo "<br>DPJP : " . $pasien['dokter'];
    // echo "<br>RUANGAN : " . $pasien['tipe'];
    ?>
    <hr>
    <!-- <h3 align="center" width="95%"> KWITANSI </h3> -->
    </hr>
    <table>


        <tbody>
            <?php
            $sum = 0;
            foreach ($resep as $row) {

            ?>
                <tr>
                    <td></td>
                    <td width="40%"><?php echo $row['obat'];   ?></td>
                    <td width="20%"><?php $harga = $row['total'] / $row['frek'];
                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                    <td width="10%"><?php echo $row['frek'];
                                    ?></td>
                    <td width="20%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');  ?></td>
                    <td width="20%"><?php echo $row['keterangan'];  ?></td>

                </tr>
            <?php $sum += $harga * $row['frek'];
            }


            ?>

        </tbody>
    </table>
    <?php
    $staff = $this->db->get_where('staff',['id_staff'=>$nota->staff])->row();
    $ppn = $sum * 0.11;
    $sumppn = $sum + $ppn;

    if ($staff->tipe == "apotik") {
        echo "<br>SUBTOTAL : " . "Rp " . number_format($sum, 0, ',', '.');
        echo "<br>PPN KELUARAN : " . "Rp " . number_format($ppn, 0, ',', '.');
        echo "<br>TOTAL : " . "Rp " . number_format($sumppn, 0, ',', '.');
    } else { ?>

    <?php echo "<br>TOTAL : " . "Rp " . number_format($sum, 0, ',', '.');
    } ?>
    <div class="panel-heading">
        <div class="pull-left">
            <h5> No NPWP : 71.785.977.1-304.000 </h5>
            <?php
            echo $staff->nama;
            ?>
        </div>
    </div>
    <center>TERIMA KASIH</center>
</body>
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
=======
<body onload="myFunction()">
    <center>RS. Bakti Timah</center>
    <center>APOTIK</center>
    <center><?php date_default_timezone_set('Asia/Jakarta');
            setlocale(LC_TIME, 'IND');
            echo date(" d M Y ");  ?></center>

    <?php


    echo "<br>NO. FAKTUR : " . $nota->no_nota;
    echo "<br>NAMA : " . $pasien['nama'];
    echo "<br>NO RM : " . $pasien['no_rm'];
    echo "<br>CARA BAYAR : " . $pasien['cara_bayar'];
    echo "<br>CARA MASUK : " . $pasien['asal'];
    echo "<br>DPJP : " . $pasien['dokter'];
    // echo "<br>RUANGAN : " . $pasien['tipe'];
    ?>
    <hr>
    <!-- <h3 align="center" width="95%"> KWITANSI </h3> -->
    </hr>
    <table>


        <tbody>
            <?php
            $sum = 0;
            foreach ($resep as $row) {

            ?>
                <tr>
                    <td></td>
                    <td width="40%"><?php echo $row['obat'];   ?></td>
                    <td width="20%"><?php $harga = $row['total'] / $row['frek'];
                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                    <td width="10%"><?php echo $row['frek'];
                                    ?></td>
                    <td width="20%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');  ?></td>
                    <td width="20%"><?php echo $row['keterangan'];  ?></td>

                </tr>
            <?php $sum += $harga * $row['frek'];
            }


            ?>

        </tbody>
    </table>
    <?php
    $staff = $this->db->get_where('staff',['id_staff'=>$nota->staff])->row();
    $ppn = $sum * 0.11;
    $sumppn = $sum + $ppn;

    if ($staff->tipe == "apotik") {
        echo "<br>SUBTOTAL : " . "Rp " . number_format($sum, 0, ',', '.');
        echo "<br>PPN KELUARAN : " . "Rp " . number_format($ppn, 0, ',', '.');
        echo "<br>TOTAL : " . "Rp " . number_format($sumppn, 0, ',', '.');
    } else { ?>

    <?php echo "<br>TOTAL : " . "Rp " . number_format($sum, 0, ',', '.');
    } ?>
    <div class="panel-heading">
        <div class="pull-left">
            <h5> No NPWP : 71.785.977.1-304.000 </h5>
            <?php
            echo $staff->nama;
            ?>
        </div>
    </div>
    <center>TERIMA KASIH</center>
</body>
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>