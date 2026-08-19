<!DOCTYPE html>
<html>

<head>
   <h1 align="center"> KARTU PASIEN</h1> 
   <h3 align="center"> RS.BAKTI TIMAH PANGKAL PINANG</h3>

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
            <td style="width: 800px;">
                <strong>
                        <font>
                        No RM: <?php echo $cetak_pasien['no_rm'] ?>
                        </font>
                    </strong> 
                    <br>
                <strong>
                    <font color="000000">
                        NAMA: <?php echo $cetak_pasien['nama'] ?>
                    </font>
                </strong>
                <br>
                <strong>
                <font color="000000">
                        JENIS KELAMIN <?php echo $cetak_pasien['jenis_kelamin'] ?>
                    </font>
                </strong>
                <br>
                <strong>
                <font color="000000">
                        TANGGAL LAHIR: <?php echo $cetak_pasien['tgl_lahir'] ?>
                    </font>
                </strong>
                <br>
                <strong>
                <font color="000000">
                        ALAMAT: <?php echo $cetak_pasien['alamat'] ?>
                    </font>
                <br>
                <br>
                
                <font color="000000">
                <p align="right"> KOTA PANGKAL PINANG, 
                    </font>
                <br>
                    <strong>
                        <font color="000000">
                            <?php
                            date_default_timezone_set('Asia/Jakarta');
                            setlocale(LC_TIME, 'IND');
                            echo date(" d M Y ");
                            ?>
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