<?php ob_start(); ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Cetak | Label | Pasien</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

</head>
<?php $html = ob_get_clean(); ?>

<style>
    @page {
        size: 105mm 18mm;
        margin: 0.2mm !important;

    }

    @media print {

        table {

            page-break-before: always !important;
        }
    }

    /*body { background-image: url('image/qrcode_daftar/bg2.png');
    }*/

    p.judul {
        /*line-height: 80%;*/
        font-size: 10px;
        font-weight: bold;
    }

    .text-left {
        padding-top: 6px;
        text-align: left;
    }

    span.satu {
        font-size: 8px;
    }
</style>
<style>
    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    .table th {
        /* padding: 2px 2px; */
        border: 1px solid #000000;
        text-align: center;
    }

    .table td {
        /* padding: 3px 3px; */
        border: 1px solid #000000;
    }

    .notable th {
        padding: 5px 5px;
        border: 0px solid #000000;
        text-align: right;
        padding-right: 40px;
        font-weight: normal;
    }

    .notable td {
        padding: 3px 3px;
        border: 0px solid #000000;
    }

    .text-center {
        text-align: center;
    }

    .line-title {
        border: 0;
        border-style: inset;
        border-top: 1px solid #000;
    }

    .logo {
        margin-top: 30px;
        width: 50%;
        height: auto;
    }

    p.footer {
        margin-top: 20px;
        line-height: 25%;
        font-size: 8px;
    }

    p.noantre {
        line-height: 20%;
        font-size: 25px;
    }

    .qrcode {
        width: 45%;
        height: auto;
    }

    .barcode {
        width: 55%;
        height: auto;
    }
</style>
</head>

<body>
    <table style="padding-left: 10px;">
        <tr>
            <td style="padding-right: 8px;">
                <section class="text-left" style="font-size: 8px;">
                    <span class="satu"><br>NAMA :<?php echo $cetak_label['nama'] ?> &emsp; &emsp;
                        <br> TGL LAHIR : <?php if ($cetak_label['tgl_lahir']) {
                                                echo date("d-m-Y", strtotime($cetak_label['tgl_lahir']));
                                            } else {
                                                echo "-";
                                            } ?>
                        <br> NO RM : <?php echo " " . sprintf('%06d', $cetak_label['no_rm']); ?></span>
                </section>

            </td>
            <td style="padding-right: 8px;">
                <section class="text-left" style="font-size: 8px;">
                    <span class="satu"><br>NAMA :<?php echo $cetak_label['nama'] ?> &emsp; &emsp;
                        <br> TGL LAHIR : <?php if ($cetak_label['tgl_lahir']) {
                                                echo date("d-m-Y", strtotime($cetak_label['tgl_lahir']));
                                            } else {
                                                echo "-";
                                            } ?>
                        <br> NO RM : <?php echo " " . sprintf('%06d', $cetak_label['no_rm']); ?> </span>
                </section>

            </td>
            <td style="padding-right: 8px;">
                <section class="text-left" style="font-size: 8px;">
                    <span class="satu"><br>NAMA :<?php echo $cetak_label['nama'] ?> &emsp; &emsp;
                        <br> TGL LAHIR : <?php if ($cetak_label['tgl_lahir']) {
                                                echo date("d-m-Y", strtotime($cetak_label['tgl_lahir']));
                                            } else {
                                                echo "-";
                                            } ?>
                        <br> NO RM : <?php echo " " . sprintf('%06d', $cetak_label['no_rm']); ?> </span>
                </section>

            </td>
        </tr>
    </table>

    <!-- <pre>
    <?php var_dump($cetak_label) ?> 
  </pre> -->
    <?php ob_start(); ?>
</body>

</html>
<?php $html = ob_get_clean(); ?>