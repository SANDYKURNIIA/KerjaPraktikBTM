<!DOCTYPE html>
<html>

<head>
    <title>PERMINTAAN OBAT</title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .table1 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid;
            margin: auto;
        }


        .garisbawah {
            border-bottom: 1px solid;
        }

        .gariskanan {
            border-right: 1px solid;
        }

        .box {
            border-bottom: 1px solid;
            width: 1px;
            height: 1px;

        }


        .block,

        li {
            border: 1px solid black;
            padding: .1em;
            width: 29px;
        }

        .block {
            display: block;
        }

        span,
        ul {
            border: 1px solid black;
            padding: .1em;
            width: 50px;

        }


        ul {
            display: inline-flex;
            list-style: none;
            padding: 0;
        }

        .inline {
            display: inline;
        }
    </style>
</head>

<body>
    <div class="content">
        <table class="a" style="width: 100%">
            <tr>
                <td>
                    <img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" style="width: 150px;">
                </td>

                <td>
                    <h3>PERMINTAAN OBAT </h3>
                </td>
            </tr>
        </table>
        <hr>
        <?php
        if (strlen($unit['indeks']) >= 6) {
            $no_pesan = "PSN-" . $unit['indeks'];
        } else {
            $no_pesan =  "PSN-" . sprintf('%06d', $unit['indeks']);
        }

        ?>
        <table>
                <tr>
                    <td width="10%">NOMOR</td>
                    <td>:</td>
                    <td width="35%"><?php echo $no_pesan; ?></td>
                    <td width="10%">TANGGAL</td>
                    <td>:</td>
                    <td width="35%"><?php echo date('d-m-Y H:i:s',strtotime($unit['tanggal'])); ?></td>
                </tr>
                <tr>
                    <td>NAMA</td>
                    <td>:</td>
                    <td><?php echo $unit['nama']; ?></td>
                    <td width="10%">UNIT</td>
                    <td>:</td>
                    <td width="35%"><?php echo  $unit['tipe']; ?></td>

                </tr>
                <tr>
                    <td>KETERANGAN</td>
                    <td>:</td>
                    <td><?php echo $unit['keterangan']; ?></td>
                    

                </tr>

            </table>
        <br>
        <br>
        <table width=100% class="table1" cellspacing=0>
            <tr class="garisbawah" height="60">
                <td class=gariskanan>
                    <center>NO</center>
                </td>
                <td class=gariskanan>
                    <center>NAMA OBAT</center>
                </td>
                <td width="90" class=gariskanan>
                    <center>JUMLAH PERMINTAAN</center>
                </td>
                <td width="90" class=gariskanan>
                    <center>SATUAN</center>
                </td>
                <td class=gariskanan>
                    <center>PRODUSEN</center>
                </td>
                <td class=gariskanan>
                    <center>DISTRIBUTOR</center>
                </td>

                <td class=gariskanan>
                    <center>EXPIRED</center>
                </td>
                <!-- <td width="90" class=gariskanan>
                    <center>STOK</center>
                </td> -->
            </tr>
            <?php
            $no = 0;
            if (count($data) > 0) {
                foreach ($data as $row) {
                    $no = $no + 1; ?>
                    <tr width="90" class="garisbawah">
                        <td class=gariskanan>
                            <center><?= $no ?></center>
                        </td>
                        <td class=gariskanan>
                            <center><?= $row->nama ?></center>
                        </td>
                        <td class=gariskanan>
                            <center><?= $row->jml_req ?></center>
                        </td>
                        <td class=gariskanan>
                            <center><?= $row->satuan_terkecil ?></center>
                        </td>
                        <td class=gariskanan>
                            <center><?= $row->produsen ?></center>
                        </td>
                        <td class=gariskanan>
                            <center><?= $row->distributor ?></center>
                        </td>

                        <td class=gariskanan>
                            <center><?= $row->tgl_exp ?></center>
                        </td>

                    </tr>



                <?php }
            } else { ?>

                <tr width="90">
                    <td colspan="7" class=gariskanan>
                        <center>Tidak ada data</center>
                    </td>
                </tr>
            <?php } ?>

        </table>

        <br>
            <br>
            <br>
            <table border="1" style="border-collapse: collapse; width: 100%; border: 1px solid white; margin-left: 50px;">
                <tr>
                    <td width="35%">Diserahkan Oleh:</td>
                    <td width="40%">Didistribusikan Oleh:</td>
                    <td width="50%">Diterima Oleh:</td>
                </tr>
                <!-- <tr>
                    <td height="100px">Panti Arini</td>
                    <td height="100px">Ursula, Apt</td>
                </tr> -->

            </table>
        <!--end of table akhir-->
    </div>
    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            window.print();
        });
        window.onafterprint = function(e) {
            closePrintView();
        };

        function closePrintView() {
            window.location.href = 'javascript:history.go(-1)';
        }
    </script>
</body>

</html>