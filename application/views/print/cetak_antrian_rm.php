<<<<<<< HEAD
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
                            <?php echo $cetak['nama'] ?>
                        </font>
                    </strong> </h1>

                <strong>
                    <font color="000000">
                        <h1>
                            <font>RM : <?php echo $cetak['no_rm'] ?></font>
                        </h1>
                        Nama : <?php echo $cetak['pasien'] ?><br>
                        Nama Dokter : <?php echo $cetak['nama_dokter'] ?><br>
                        Jenis Klaim : <?php echo $cetak['klaim'] ?><br>
                        Jumlah Sisa Antrian: <?php echo $sisa_antrian['no_antri'] - 1 ?>
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
                                        echo rupiah($total); ?>
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
                            $inisial = $cetak['inisial'];
                            $no_antri = $cetak['no_antri'];
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
    <table width=100% cellspacing=0>
        <tr>
            <td>
                <div style="width: 30%; text-align: left; float: left;">Petugas :</div><br>
            </td>
        </tr>

        <tr>
            <td>

                <div style="width: 20%; text-align: left; float: left;"><?php
                                                                        $data_staff = $this->session->userdata('data_auth');
                                                                        // echo ($staff == 'APM') ? $data_staff->nama : $staff; 
                                                                        echo $staff; 
                                                                        ?></div><br>
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
        window.location.href = 'javascript:history.go(-1)';
    }
</script>

=======
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
                            <?php echo $cetak['nama'] ?>
                        </font>
                    </strong> </h1>

                <strong>
                    <font color="000000">
                        <h1>
                            <font>RM : <?php echo $cetak['no_rm'] ?></font>
                        </h1>
                        Nama : <?php echo $cetak['pasien'] ?><br>
                        Nama Dokter : <?php echo $cetak['nama_dokter'] ?><br>
                        Jenis Klaim : <?php echo $cetak['klaim'] ?><br>
                        Jumlah Sisa Antrian: <?php echo $sisa_antrian['no_antri'] - 1 ?>
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
                                        echo rupiah($total); ?>
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
                            $inisial = $cetak['inisial'];
                            $no_antri = $cetak['no_antri'];
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
    <table width=100% cellspacing=0>
        <tr>
            <td>
                <div style="width: 30%; text-align: left; float: left;">Petugas :</div><br>
            </td>
        </tr>

        <tr>
            <td>

                <div style="width: 20%; text-align: left; float: left;"><?php
                                                                        $data_staff = $this->session->userdata('data_auth');
                                                                        // echo ($staff == 'APM') ? $data_staff->nama : $staff; 
                                                                        echo $staff; 
                                                                        ?></div><br>
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
        window.location.href = 'javascript:history.go(-1)';
    }
</script>

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</html>