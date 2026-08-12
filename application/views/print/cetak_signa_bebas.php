<<<<<<< HEAD
<body onload="myFunction()">
    
    <style type="text/css">
        .kotak {
            box-shadow: 0 0 0 2px black;
            border-radius: 5px;
            padding-left: 10px;
        }
    </style>
    <table>
        <?php foreach ($signa as $row) { ?>
            <td align="center" style="font-size: 10px;">INSTALASI FARMASI <br>RS. BAKTI TIMAH PANGKALPINANG</td>
            <tbody class="kotak">
                <tr>
                <!-- <td width="70%"  style="font-size: 12px;">RM : </?php echo sprintf('%06d',$pasien['id_obat_bebas']);   ?></td> -->

                </tr>
                <tr>
                    
                    <!-- <td width="40%"><?php echo "NAMA LENGKAP (NO RM)";   ?></td>
                    <td>:</td> -->
                    <td width="70%" style="font-size: 12px;"><?php echo $pasien['nama'];   ?></td>
                </tr>
                <tr>
                    <!-- <td width="40%"><?php echo "TANGGAL LAHIR";   ?></td>
                    <td>:</td> -->
                    <td width="70%" style="font-size: 12px;"><?php
                    $date = (new DateTime ($pasien['tanggal']));
                    
                    
                    echo 'Tanggal : '. $date->format('d-M-Y');   ?></td>
                </tr>

            </tbody>
            <tr style="height: 10px"> </tr>
            <tbody class="kotak">
                <tr>
                    <!-- <td width="30%"><?php echo "NAMA OBAT";   ?></td>
                    <td>:</td> -->
                    <td colspan="3" style="font-size: 12px;"><?php echo $row['obat'] ;   ?></td>
                </tr>
            </tbody>
            <tbody class="kotak">
                <tr>
                    <td width="10%"><?php echo "JUMLAH : ".$row['frek']. " " . $row['tipe'];   ?></td>
                    <!-- <td>:</td> -->
                    <!-- <td width="90%"><?php echo $row['frek'] . " " . $row['tipe'];  ?></td> -->
                </tr>
                <tr>
                    <!-- <td width="30%"><?php echo "CARA PAKAI";   ?></td>
                    <td>:</td> -->
                    <td colspan="3"><?php echo $row['id_signa'] . " <br> " . $row['id_cara_pakai'];  ?></td>
                </tr>


            </tbody>
            <td align="center" style="font-size: 10px;">Kesembuhan dari Allah SWT, <br>Berdoalah sebelum minum obat</td>
            <tr style="height: 20px"> </tr>
        <?php } ?>
    </table>
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
=======
<body onload="myFunction()">
    
    <style type="text/css">
        .kotak {
            box-shadow: 0 0 0 2px black;
            border-radius: 5px;
            padding-left: 10px;
        }
    </style>
    <table>
        <?php foreach ($signa as $row) { ?>
            <td align="center" style="font-size: 10px;">INSTALASI FARMASI <br>RS. BAKTI TIMAH PANGKALPINANG</td>
            <tbody class="kotak">
                <tr>
                <!-- <td width="70%"  style="font-size: 12px;">RM : </?php echo sprintf('%06d',$pasien['id_obat_bebas']);   ?></td> -->

                </tr>
                <tr>
                    
                    <!-- <td width="40%"><?php echo "NAMA LENGKAP (NO RM)";   ?></td>
                    <td>:</td> -->
                    <td width="70%" style="font-size: 12px;"><?php echo $pasien['nama'];   ?></td>
                </tr>
                <tr>
                    <!-- <td width="40%"><?php echo "TANGGAL LAHIR";   ?></td>
                    <td>:</td> -->
                    <td width="70%" style="font-size: 12px;"><?php
                    $date = (new DateTime ($pasien['tanggal']));
                    
                    
                    echo 'Tanggal : '. $date->format('d-M-Y');   ?></td>
                </tr>

            </tbody>
            <tr style="height: 10px"> </tr>
            <tbody class="kotak">
                <tr>
                    <!-- <td width="30%"><?php echo "NAMA OBAT";   ?></td>
                    <td>:</td> -->
                    <td colspan="3" style="font-size: 12px;"><?php echo $row['obat'] ;   ?></td>
                </tr>
            </tbody>
            <tbody class="kotak">
                <tr>
                    <td width="10%"><?php echo "JUMLAH : ".$row['frek']. " " . $row['tipe'];   ?></td>
                    <!-- <td>:</td> -->
                    <!-- <td width="90%"><?php echo $row['frek'] . " " . $row['tipe'];  ?></td> -->
                </tr>
                <tr>
                    <!-- <td width="30%"><?php echo "CARA PAKAI";   ?></td>
                    <td>:</td> -->
                    <td colspan="3"><?php echo $row['id_signa'] . " <br> " . $row['id_cara_pakai'];  ?></td>
                </tr>


            </tbody>
            <td align="center" style="font-size: 10px;">Kesembuhan dari Allah SWT, <br>Berdoalah sebelum minum obat</td>
            <tr style="height: 20px"> </tr>
        <?php } ?>
    </table>
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>