<!DOCTYPE html>
<html>

<head>
    <title>CETAK ANTRIAN - RS. Bakti Timah </title>
</head>
<!-- <style>
    @media print {
        @page {
            margin: 0;
        }

        body {
            margin: 1.6cm;
        }
    }
</style> -->

<body onload="myFunction()">
    <table>
        <tr>
            <td style="width: 400px;">
                <strong>
                    <font color="000000"> RS. Bakti Timah </font>
                </strong>
                <br>
                <h1> <strong>
                        <font> &nbsp;&nbsp;
                            <?php echo $cetak_antrian_pasien['nama'] ?>
                        </font>
                    </strong> </h1>

                <strong>
                    <font color="000000">
                        RM : <?php echo $cetak_antrian_pasien['no_rm'] ?><br>
                        Nama : <?php echo $cetak_antrian_pasien['pasien'] ?><br>
                        Jenis Klaim : <?php echo $cetak_antrian_pasien['klaim'] ?><br>
                        Jumlah Sisa Antrian: <?php echo $sisa_antrian_pasien['no_antri'] - 1 ?>
                    </font>
                </strong>
                <br>
                <strong>
                    <font color="000000">
                        Total Biaya: <?php
                                        function rupiah($angka)
                                        {

                                            $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
                                            return $hasil_rupiah;
                                        }
                                        echo rupiah($total2); ?>
                    </font>
                </strong>
                <br>
                <font color="000000"> Silahkan Menuju Kasir</font>
                </br>
            </td>
            <td style="width: 200px;">

                <strong>
                    <font color="000000"> No Antrian</font>
                </strong>

                <h1><strong>
                        <font>
                            <?php
                            $inisial = $cetak_antrian_pasien['inisial'];
                            $no_antri = $cetak_antrian_pasien['no_antri'];
                            echo strtoupper($inisial . $no_antri); ?>

                        </font>
                    </strong></h1>
                <div>
                    <strong>
                        <font color="000000">
                            <?php
                            date_default_timezone_set('Asia/Jakarta');
                            setlocale(LC_TIME, 'IND');
                            echo date(" d M Y ");
                            ?>
                        </font>
                    </strong>
                </div>
            </td>
        </tr>



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
        window.location.href = 'javascript:history.go(-2)';
    }
</script>

</html>