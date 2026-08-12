<body onload="myFunction()">
    <!-- <center>RUMAH SAKIT BAKTI TIMAH PANGKALPINANG</center> -->
    <!-- <center><?php date_default_timezone_set('Asia/Jakarta');
                    setlocale(LC_TIME, 'IND');
                    echo date(" d M Y "); ?></center> -->


    <style type="text/css">
        .kotak {
            box-shadow: 0 0 0 1px black;
            border-radius: 1px;
            padding-left: 10px;
        }
    </style>
    <table>
        <?php foreach ($signa as $row) { ?>
            <td align="center" style="font-size: 10px;">INSTALASI FARMASI <br>RS. BAKTI TIMAH PANGKALPINANG</td>
            <tbody class="kotak">
                <tr>


                    <td width="70%" style="font-size: 12px;">Nama : <?php echo $pasien['nama'];   ?></td>
                </tr>
                <tr>

                    <td width="70%" style="font-size: 12px;"><?php
                                                                            $date = (new DateTime($pasien['tgl_lahir']));


                                                                            echo 'Tanggal Lahir : ' . $date->format('d-m-Y');   ?></td>
                </tr>
                <tr>
                    <td width="70%" style="font-size: 12px;">No RM : <?php echo sprintf('%06d', $pasien['no_rm']);   ?></td>

                </tr>



                <tr>
                    <td style="font-size: 12px;">Tanggal Cetak : <?php echo date('d-m-Y'); ?></td>
                </tr>
            </tbody>
            <tr style="height: 2px"> </tr>
            <tbody class="kotak">
                <tr>
                    <!-- <td width="30%"><?php echo "NAMA OBAT";   ?></td>
                    <td>:</td> -->
                    <td colspan="3" style="font-size: 12px;"><?php echo $row['obat'];   ?></td>
                </tr>
            </tbody>
            <tbody class="kotak">
                <tr>
                    <td width="10%"><?php echo "JUMLAH : " . $row['frek'] . " " . $row['tipe'];   ?></td>
                    <!-- <td>:</td> -->
                    <!-- <td width="90%"><?php echo $row['frek'] . " " . $row['tipe'];  ?></td> -->
                </tr>
                <tr>
                    <!-- <td width="30%"><?php echo "CARA PAKAI";   ?></td>
                    <td>:</td> -->
                    <td colspan="3"><?php echo $row['id_signa'] . " <br> " . $row['id_cara_pakai'];  ?></td>
                </tr>


            </tbody>
            <tr>
                <td align="center" style="font-size: 10px;">Kesembuhan dari Allah SWT, <br>Berdoalah sebelum minum obat</td>
            </tr>
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
</script>