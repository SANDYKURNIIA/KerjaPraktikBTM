<body onload="myFunction()">
    <center>RS. Bakti Timah</center>
    <center>APOTIK</center>
    <center><?php date_default_timezone_set('Asia/Jakarta');
            setlocale(LC_TIME, 'IND');
            echo date(" d M Y ");  ?></center>

    <?php

    echo "<br>NO. FAKTUR : " . $nota;
    echo "<br>NAMA : " . $pasien['nama'];
    // echo "<br>NO RM : " . $pasien['id_obat_bebas'];
    echo "<br>CARA BAYAR :" . $pasien['cara_bayar'];
    echo "<br>CARA MASUK : DATANG SENDIRI";
    echo "<br>DPJP : " . $pasien['dpjp'];
    ?>
    <hr>
    <!-- <h3 align="center" width="95%"> KWITANSI </h3> -->
    </hr>
    <table>


        <tbody>
            <?php
            $sum = 0;
            $ppn = 0;
            $sumppn = 0;
            foreach ($resep as $row) {

            ?>
                <tr>
                    <td></td>
                    <td width="40%"><?php echo $row['obat'];   ?></td>
                    <td width="20%"><?php echo "Rp " . number_format(($row['total'] / $row['frek']), 0, ',', '.');   ?></td>
                    <td width="10%"><?php echo $row['frek'];
                                    $sum += $row['total'];   ?></td>
                    <td width="20%"><?php echo "Rp " . number_format($row['total'], 0, ',', '.');  ?></td>


                </tr>
            <?php }


            ?>

        </tbody>
    </table>
    <?php
    $staff = $this->session->userdata('data_auth');
    echo "<br>TOTAL : " . "Rp " . number_format($sum, 0, ',', '.');
    ?>
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
        window.location.href = 'javascript:history.go(-1)';
    }
</script>