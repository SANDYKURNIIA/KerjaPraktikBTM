<<<<<<< HEAD
<!DOCTYPE html>
<html>

<head>
    <title>CETAK KAMAR KARTU - RS. BAKTI TIMAH PANGKALPINANG </title>
    <meta http-equiv="refresh" content="1" />
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

<?php if ($status!=0): ?>
<meta http-equiv="refresh" content="1" />
<!-- <body> -->
<body onload="myFunction()">
<?php else: ?>
<meta http-equiv="refresh" content="1" />
<body>
<?php endif ?>
<?php if (isset($cetak_tracer_poli)): ?>
 <?php foreach ($cetak_tracer_poli as $cetak_tracer): ?>
    <table style="width: 100%; padding-top: 15px;">
        <tr>
            <td colspan="3" align="center">

                    <strong>
                        <font style="font-size: 28px;"> &nbsp;&nbsp;
                            <?php echo $cetak_tracer->nama ?>
                        </font>
                    </strong> 

            </td>
        </tr>
        <tr>
            <td colspan="3" align="center"  style="padding-bottom: 15px;">
                <strong style="font-size: 18px;"><?php echo $cetak_tracer->nama_dokter ?></strong>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                    <strong>
                        <font>No Antrian</font><br>
                        <font style="font-size: 28px;">
                            <?php
                            $inisial = $cetak_tracer->inisial;
                            $no_antri = $cetak_tracer->no_antri;
                            echo strtoupper($inisial . $no_antri); ?>
                        </font>
                    </strong>
                <strong><br>
                <font color="000000" style="font-size: 14px;">
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        setlocale(LC_TIME, 'IND');
                        echo date_indo(date('Y-m-d'));
                        ?>
                    </font>
                </strong>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center"><h1><font>RM : <?php echo (sprintf("%06s",$cetak_tracer->no_rm)) ?></font></h1></td>
        </tr>
        <tr>
            <td>Nama Pasien</td>
            <td>:</td>
            <td><?php echo $cetak_tracer->pasien ?></td>
        </tr>
        <tr>
            <td>Jenis Klaim</td>
            <td>:</td>
            <td><?php echo $cetak_tracer->klaim ?></td>
        </tr>
    </table>
---------------------------------------------
 <?php endforeach ?>
<?php endif ?>
<?php if (isset($cetak_tracer_ugd)): ?>
 <?php foreach ($cetak_tracer_ugd as $cetak_tracer_ugd): ?>
    <table style="width: 100%; padding-top: 15px;">
        <tr>
            <td colspan="3" align="center">

                    <strong>
                        <font style="font-size: 28px;"> &nbsp;&nbsp;
                            <?php echo $cetak_tracer_ugd->jenis_pelayanan ?>
                        </font>
                    </strong> 

            </td>
        </tr>
        <tr>
            <td colspan="3" align="center"  style="padding-bottom: 15px;">
                <strong style="font-size: 18px;"><?php echo $cetak_tracer_ugd->nama_dokter ?></strong>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                    <!-- <strong>
                        <font>No Antrian</font><br>
                        <font style="font-size: 28px;">
                            <?php
                            $inisial = $cetak_tracer_ugd->inisial;
                            $no_antri = $cetak_tracer_ugd->no_antri;
                            echo strtoupper($inisial . $no_antri); ?>
                        </font>
                    </strong> -->
                    <font color="000000" style="font-size: 14px;">
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        setlocale(LC_TIME, 'IND');
                        echo date_indo(date('Y-m-d'));
                        ?>
                    </font>
                </strong>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center"><h1><font>RM : <?php echo (sprintf("%0s",$cetak_tracer_ugd->no_rm)) ?></font></h1></td>
        </tr>
        <tr>
            <td>Nama Pasien</td>
            <td>:</td>
            <td><?php echo $cetak_tracer_ugd->pasien ?></td>
        </tr>
        <tr>
            <td>Jenis Klaim</td>
            <td>:</td>
            <td><?php echo $cetak_tracer_ugd->klaim ?></td>
        </tr>
    </table>
---------------------------------------------
 <?php endforeach ?>
<?php endif ?>
<?php if (isset($getTracerRanap)): ?>
    <strong>cetak Tracer Ranap Belum Tersedia</strong>
<?php endif ?>
</body>
<script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    window.onafterprint = function(e) {
        closePrintView();
    };

    function myFunction() {
        window.print();
        window.location.href = '<?php echo base_url() ?>Pasien/update_tracer_auto';
    }

    function closePrintView() {
        window.location.href = 'javascript:history.go(-1)';
    }
</script>

=======
<!DOCTYPE html>
<html>

<head>
    <title>CETAK KAMAR KARTU - RS. BAKTI TIMAH PANGKALPINANG </title>
    <meta http-equiv="refresh" content="1" />
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

<?php if ($status!=0): ?>
<meta http-equiv="refresh" content="1" />
<!-- <body> -->
<body onload="myFunction()">
<?php else: ?>
<meta http-equiv="refresh" content="1" />
<body>
<?php endif ?>
<?php if (isset($cetak_tracer_poli)): ?>
 <?php foreach ($cetak_tracer_poli as $cetak_tracer): ?>
    <table style="width: 100%; padding-top: 15px;">
        <tr>
            <td colspan="3" align="center">

                    <strong>
                        <font style="font-size: 28px;"> &nbsp;&nbsp;
                            <?php echo $cetak_tracer->nama ?>
                        </font>
                    </strong> 

            </td>
        </tr>
        <tr>
            <td colspan="3" align="center"  style="padding-bottom: 15px;">
                <strong style="font-size: 18px;"><?php echo $cetak_tracer->nama_dokter ?></strong>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                    <strong>
                        <font>No Antrian</font><br>
                        <font style="font-size: 28px;">
                            <?php
                            $inisial = $cetak_tracer->inisial;
                            $no_antri = $cetak_tracer->no_antri;
                            echo strtoupper($inisial . $no_antri); ?>
                        </font>
                    </strong>
                <strong><br>
                <font color="000000" style="font-size: 14px;">
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        setlocale(LC_TIME, 'IND');
                        echo date_indo(date('Y-m-d'));
                        ?>
                    </font>
                </strong>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center"><h1><font>RM : <?php echo (sprintf("%06s",$cetak_tracer->no_rm)) ?></font></h1></td>
        </tr>
        <tr>
            <td>Nama Pasien</td>
            <td>:</td>
            <td><?php echo $cetak_tracer->pasien ?></td>
        </tr>
        <tr>
            <td>Jenis Klaim</td>
            <td>:</td>
            <td><?php echo $cetak_tracer->klaim ?></td>
        </tr>
    </table>
---------------------------------------------
 <?php endforeach ?>
<?php endif ?>
<?php if (isset($cetak_tracer_ugd)): ?>
 <?php foreach ($cetak_tracer_ugd as $cetak_tracer_ugd): ?>
    <table style="width: 100%; padding-top: 15px;">
        <tr>
            <td colspan="3" align="center">

                    <strong>
                        <font style="font-size: 28px;"> &nbsp;&nbsp;
                            <?php echo $cetak_tracer_ugd->jenis_pelayanan ?>
                        </font>
                    </strong> 

            </td>
        </tr>
        <tr>
            <td colspan="3" align="center"  style="padding-bottom: 15px;">
                <strong style="font-size: 18px;"><?php echo $cetak_tracer_ugd->nama_dokter ?></strong>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                    <!-- <strong>
                        <font>No Antrian</font><br>
                        <font style="font-size: 28px;">
                            <?php
                            $inisial = $cetak_tracer_ugd->inisial;
                            $no_antri = $cetak_tracer_ugd->no_antri;
                            echo strtoupper($inisial . $no_antri); ?>
                        </font>
                    </strong> -->
                    <font color="000000" style="font-size: 14px;">
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        setlocale(LC_TIME, 'IND');
                        echo date_indo(date('Y-m-d'));
                        ?>
                    </font>
                </strong>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center"><h1><font>RM : <?php echo (sprintf("%0s",$cetak_tracer_ugd->no_rm)) ?></font></h1></td>
        </tr>
        <tr>
            <td>Nama Pasien</td>
            <td>:</td>
            <td><?php echo $cetak_tracer_ugd->pasien ?></td>
        </tr>
        <tr>
            <td>Jenis Klaim</td>
            <td>:</td>
            <td><?php echo $cetak_tracer_ugd->klaim ?></td>
        </tr>
    </table>
---------------------------------------------
 <?php endforeach ?>
<?php endif ?>
<?php if (isset($getTracerRanap)): ?>
    <strong>cetak Tracer Ranap Belum Tersedia</strong>
<?php endif ?>
</body>
<script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    window.onafterprint = function(e) {
        closePrintView();
    };

    function myFunction() {
        window.print();
        window.location.href = '<?php echo base_url() ?>Pasien/update_tracer_auto';
    }

    function closePrintView() {
        window.location.href = 'javascript:history.go(-1)';
    }
</script>

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</html>