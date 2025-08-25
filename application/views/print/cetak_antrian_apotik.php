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
                            <?php echo $nama ?>
                        </font>
                    </strong> </h1>
                </br>
                <strong>
                    <font color="000000"> Silahkan Menuju Loket Apotik </font>
                </strong>
                <br>
            </td>
            <td style="width: 200px;">
                <strong>
                    <font color="000000"> No Antrian Apotik</font>
                </strong>

                <h1><strong>
                        <font>
                            <?php
                            
                            echo strtoupper($inisial . $no_antri); ?>

                        </font>
                    </strong></h1>
                
                    <strong>
                        <font color="000000">
                            <?php
                            date_default_timezone_set('Asia/Jakarta');
                            setlocale(LC_TIME, 'IND');
                            echo date(" d M Y "); ?>
                        </font>

                    </strong>
               
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

</html>