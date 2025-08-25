<body onload="myFunction()">
    <table>
        <tr>
            <td> <a><img src="<?= base_url('assets/dist/img/bumn.jpg'); ?>" alt="logo" /></a></td>
            <td> <a><img src="<?= base_url('assets/dist/img/alamat.jpg'); ?>" alt="logoa" /></a></td>
            <td> <a><img src="<?= base_url('assets/dist/img/RSBTK.jpg'); ?>" alt="logo" /></a></td>
            <td> <a><img src="<?= base_url('assets/dist/img/ihc1.jpg'); ?>" alt="logo" /></a></td>
        </tr>
        <tr></tr>
    </table>
    <hr style="height: 5px;">
    <table>
        <td></td>
        <td></td>
        <td></td>
        <td width="25%">
            <?php
            date_default_timezone_set('Asia/Jakarta');
            setlocale(LC_TIME, 'IND');

            echo "<br>TANGGAL : " . date(" d M Y ");
            echo "<br>DPJP : " . $pasien['nama_dokter'];
            ?>
        </td>

    </table>

    <table>

        <?php
        $sum = 0;
        foreach ($riwayat as $row) {

        ?>
            <tr>
                <td>
                    <font style="font-size: 50px;font-style: italic;">R/ </font>
                </td>
                <td width="50%"><?php echo $row['obat'];   ?></td>

                <td width="100%"><?php echo $row['frek'];
                                    ?></td>
            </tr>
            <tr class="border_bottom">
                <td></td>
                <td width="50%">
                    <font style="font-style: bold;font-size: 30px;">S </font>
                    <font style="font-style: bold;font-size: 20px;"><?php echo $row['signa'];   ?></font>
                </td>

                <td width="100%"><?php echo $row['cara_pemakaian'];
                                    ?></td>
            </tr>
            <tr></tr>
        <?php
        }


        ?>


    </table>

    <?php


    echo "<br>NAMA : " . $pasien['nama'];
    echo "<br>NO RM : " . $pasien['no_rm'];
    $tgl = strtotime($pasien['tgl_lahir']);
    echo "<br>TANGGAL LAHIR : " . strftime(" %d %B %Y", $tgl);
    echo "<br>ALAMAT : " . $pasien['alamat'];
    echo "<br>CARA BAYAR : " . $pasien['cara_bayar'];
    ?>
    <table width=100% class="table1" cellspacing=0>
        <tr height="20">
            <td></td>
            <td width=50% align="center">Tanda Tangan</td>
        </tr>
        <tr>
            <td></td>
            <td align="center"><img src="<?php if ($pasien['foto'] == null) {
                                                echo '-';
                                            } else {
                                                echo base_url() . 'assets/ttd/' . $pasien['foto'];
                                            } ?>" width="100px" height="100px"></td>
        </tr>

        <tr>
            <td></td>
            <td align="center">(<?= $pasien['nama_dokter']; ?>)</td>
        </tr>

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