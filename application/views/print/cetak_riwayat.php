<body onload="myFunction()">
<center>RS. Bakti Timah</center>
<center>APOTIK</center>
<center><?php date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'IND');
        echo date(" d M Y "); ?></center>

<?php


echo "<br>NAMA : " . $pasien['nama'];
echo "<br>NO RM : " . $pasien['no_rm'];
echo "<br>CARA BAYAR : " . $pasien['cara_bayar'];
echo "<br>CARA MASUK : " . $pasien['asal'];
echo "<br>DPJP : " . $pasien['nama_dokter'];
?>
<table>


    <tbody>
        <?php
        $sum = 0;
        foreach ($riwayat as $row) {

        ?>
            <tr>
                <td></td>
                <td width="40%"><?php echo $row['obat'];   ?></td>
                <td width="20%"><?php   $harga = $row['total'] / $row['frek'];
                 echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                <td width="10%"><?php echo $row['frek'];
                                   ?></td>
                <td width="20%"><?php echo "Rp " . number_format($harga *$row['frek'], 0, ',', '.');  ?></td>
                <td width="20%"><?php echo $row['keterangan'];  ?></td>


            </tr>
        <?php $sum += $harga * $row['frek'];}


        ?>

    </tbody>
</table>
<?php echo "<br>TOTAL : " . "Rp " . number_format($sum, 0, ',', '.'); ?>
<center>TERIMA KASIH</center>
</body>
<script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
    window.onafterprint = function(e){
        closePrintView();
    };

    function myFunction(){
        window.print();
    }

    function closePrintView() {
        window.location.href = 'javascript:history.go(-1)';   
    }
    </script>