<body onload="myFunction()">
    <center>RUMAH SAKIT BHAKTI TIMAH</center>
    <center><?php date_default_timezone_set('Asia/Jakarta');
            setlocale(LC_TIME, 'IND');
            echo date(" d M Y "); ?></center>


    <style type="text/css">
        .kotak {
            box-shadow: 0 0 0 2px black;
            border-radius: 5px;
            padding-left: 10px;
        }
    </style>

    <div class="content">
        <table>


            <tbody class="kotak">

                <tr>
                    <td width="40%"><?php echo "NAMA LENGKAP (NO RM)";   ?></td>
                    <td>:</td>
                    <td width="70%"><?php echo $pasien . " (" . sprintf('%06d', $no_rm) . ")";   ?></td>
                </tr>
                <tr>
                    <td width="40%"><?php echo "TANGGAL LAHIR";   ?></td>
                    <td>:</td>
                    <td width="70%"><?php echo date("d-m-Y",strtotime($tgl_lahir))   ?></td>
                </tr>

            </tbody>

            <tr style="height: 10px"> </tr>

            <tbody class="kotak">
                <tr>
                    <td width="30%"><?php echo "RUANGAN";   ?></td>
                    <td>:</td>
                    <td width="70%"><?php echo $kamar;   ?></td>
                </tr>
                <tr>
                    <td width="30%"><?php echo "DIET";   ?></td>
                    <td>:</td>
                    <td width="70%"><?php echo $diet;   ?></td>
                </tr>
                <tr>
                    <td width="30%"><?php echo "Baik dikonsumsi sebelum jam:";   ?></td>
                    <td>:</td>
                    <td width="70%"><?php echo $waktu;  ?></td>
                </tr>

                <!-- <tr>
            <td colspan="3" align="center"><?php echo "CARA PAKAI :";   ?></td>

        </tr>
        <tr>
            <td colspan="3" style="padding-left: 10px;
												padding-left: 10px;">
                <?php echo $signa['id_signa'] . " ( " . $signa['id_cara_pakai'] . " )";  ?></td>
        </tr>
 -->

            </tbody>
        </table>

    </div>
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