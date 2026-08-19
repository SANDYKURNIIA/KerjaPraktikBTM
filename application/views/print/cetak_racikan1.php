<body onload="myFunction()">
    <table>
        <tr>
            <td> <a><img src="<?= base_url('assets/dist/img/logo22.png'); ?>" alt="logo" /></a></td>
            <td> <a><img src="<?= base_url('assets/dist/img/alamat.jpg'); ?>" width="300px" alt="logoa" /></a></td>
            <!-- <td> <a><img src="<?= base_url('assets/dist/img/RSBTK.jpg'); ?>" alt="logo" /></a></td>
            <td> <a><img src="<?= base_url('assets/dist/img/ihc1.jpg'); ?>" alt="logo" /></a></td> -->
        </tr>
        <tr></tr>
    </table>
    <hr style="height: 5px;">
    <center>
        <h3>RESEP RACIKAN</h3>
    </center>
    <table>

        <td width="25%">
            <?php
            date_default_timezone_set('Asia/Jakarta');
            setlocale(LC_TIME, 'IND');

            echo "<br>NAMA : " . $pasien['nama'];
            echo "<br>NO RM : " . $pasien['no_rm'];
            echo "<br>POLI/RUANGAN : " . $pasien['ruang'];
            echo "<br>DPJP : " . $pasien['dokter'];
            echo "<br>TANGGAL : " . indo_date_1($pasien['tanggal']);
            ?>
        </td>

    </table>


    <table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid black;" cellpadding="7">
        <td align="center">NO</td>
        <td align="center">RACIKAN</td>
        <td align="center">SIGNA</td>
        <td align="center">CARA PAKAI</td>
        <?php
        $nomor = 1;
        foreach ($resep as $row) {

        ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td width="50%"><?php echo $row->resep;   ?></td>

                <td width="100%"><?php echo $row->tindakan; ?></td>
                <td width="100%"><?php echo $row->cara_pemakaian; ?></td>
            </tr>

        <?php
            $nomor++;
        } ?>


    </table>


</body>
<style>
    tr.border_bottom td {
        border-bottom: 1px solid black;
    }
</style>
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