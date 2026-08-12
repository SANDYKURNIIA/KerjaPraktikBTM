<<<<<<< HEAD
<!DOCTYPE html>
<html>

<head>
    <title>Print out <?= $page_title ?></title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .table1 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid;

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

        hr {
            border: 1px solid black;
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
                    <img src="<?= base_url() ?>resources/img/rsbt_logo.jpg" style="width: 200px;">
                </td>
                <td>
                </td>
            </tr>
        </table>

        <center>
            <h3>LEMBARAN SEBAB KEMATIAN</h3>
        </center>
        <p align="left">
        <h3>NO RM<span>__</span><span>__</span>&nbsp; &nbsp;<span>__</span><span>__</span>&nbsp; &nbsp;<span>__</span><span>__</span></h3>
        </p>

        <!--table 1-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td>Nama : </td>
                <td><?= $data['nama'] ?></td>
                <td>Umur : </td>
                <td><?php
                    $birthDate = $data['tgl_lahir'];
                    date_default_timezone_set('Asia/Jakarta');

                    $date = new DateTime($birthDate);
                    $now = new DateTime();
                    $interval = $now->diff($date);

                    echo  $interval->y . " Tahun"; ?></td>
                <td>Jenis Kelamin :</td>
                <td><?= $data['jenis_kelamin'] ?></td>
            </tr>

            <tr>
                <td>Alamat :</td>
                <td colspan="5"><?= $data['alamat'] . ', ' . $data['kelurahan'] . ', ' . $data['kecamatan'] . ', ' . $data['provinsi'] ?></td>
            </tr>

        </table>

        <!--end table 1-->

        <!--table 2-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td class=gariskanan>&nbsp;</td>
                <td class=gariskanan>&nbsp;</td>
                <td class=gariskanan>&nbsp; </td>
            </tr>
            <tr>
                <td class=gariskanan>a.</td>
                <td class=gariskanan>a. …………………………………….</td>
                <td class=gariskanan> Lamanya (kira-kira) mulai sakit</td>
            </tr>
            <tr>
                <td class=gariskanan> Penyakit atau keadaan yang langsung</td>
                <td class=gariskanan> Penyakit tersebut dalam ruang a di-</td>
                <td class=gariskanan>hingga meninggal dunia</td>
            </tr>
            <tr>
                <td class=gariskanan> mengakibatkan kematian</td>
                <td class=gariskanan> disebabkan oleh (atau akibat dari) :</td>
                <td class="gariskanan" rowspan="2"><?=$data['lama_a'] ?></td>
            </tr>
            <tr>
                <td class=gariskanan></td>
                <td class=gariskanan> <?= $data['sebab_a'] ?></td>

            </tr>
            <tr>
                <td class=gariskanan>b.c</td>
                <td class=gariskanan> b. …………………………………….</td>
                <td class="gariskanan garisbawah" rowspan="6"><?=$data['lama_b'] ?></td>
            </tr>

            <tr>
                <td class=gariskanan>Penyakit-penyakit (bila ada) yang</td>
                <td class=gariskanan> Penyakit tersebut dalam ruang b di-</td>

            </tr>

            <tr>
                <td class=gariskanan>menjadi lantaran timbulnya sebab</td>
                <td class=gariskanan> disebabkan oleh (atau akibat dari) :</td>

            </tr>

            <tr >
                <td class=gariskanan>kematian tersebut pada a. dengan</td>

                <td class="gariskanan garisbawah" rowspan="3"> <?= $data['sebab_b'] ?></td>
            </tr>

            <tr>
                <td class=gariskanan>menyebutkan yang menjadi pokok</td>
                

            </tr>

            <tr class=garisbawah>
                <td class=gariskanan>pangkal terakhir.</td>

            </tr>

            <tr>
                <td class=gariskanan align="center">II</td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
            </tr>

            <tr>
                <td class=gariskanan>Penyakit-penyakit lain yang berarti</td>
                <td class=gariskanan rowspan="5"><?=$data['sebab_2'] ?></td>
                <td class=gariskanan rowspan="5"><?=$data['lama_2'] ?></td>
            </tr>

            <tr>
                <td class=gariskanan>dan mempengaruhi pula kematian itu</td>
                
            </tr>

            <tr>
                <td class=gariskanan>tetapi tidak ada hubungannya dengan</td>
            </tr>

            <tr>
                <td class=gariskanan>penyakit-penyakit tersebut dalam</td>
                
            </tr>

            <tr>
                <td class=gariskanan>I.a.b.c.</td>
                
            </tr>



        </table>



        <!--end table 2-->

        <!--table 3-->

        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td>Keterangan khusus untuk :</td>
                <td></td>
            </tr>
            <tr>
                <td>I. MATI KARENA RUPADAKSA (Violent Death) </td>
                <td></td>
            </tr>

            <tr>
                <td>a. Macam rudapaksa</td>
                <td><?=$data['ruda_paksa'] ?></td>
            </tr>

            <tr>
                <td>b. Cara kejadian rudapaksa</td>
                <td><?=$data['cara_rudapaksa'] ?></td>
            </tr>

            <tr>
                <td>c. Sifat jejas (kerusakan tubuh)</td>
                <td><?=$data['sifat_jejas'] ?></td>
            </tr>

            <tr>
                <td> II. KELAHIRAN MATI (Stillbirth)</td>
                <td></td>
            </tr>

            <tr>
                <td > a. Apakah ini janin lahir mati : </td>
                <td > <?=$data['janin_mati'] ?></td>
            </tr>

            <tr>
                <td> b. Sebab kelahiran mati : </td>
                <td > <?=$data['sebab_lahir_mati'] ?></td>
            </tr>

            <tr>
                <td colspan="2"> III. PERSALINAN, KEHAMILAN :</td>

            </tr>

            <tr>
                <td>a. Apakah ini peristiwa persalinan : </td>
                <td > <?=$data['persalinan'] ?></td>
            </tr>

            <tr>
                <td > b. Apakah ini peristiwa kehamilan :</td>
                <td > <?=$data['hamil'] ?></td>
            </tr>

            <tr>
                <td colspan="2">IV. OPERASI</td>

            </tr>

            <tr>
                <td> a. Apakah di sini dilakukan operasi :</td>
                <td > <?=$data['operasi'] ?></td>
            </tr>

            <tr>
                <td> b. Jenis Operasi : </td>
                <td > <?=$data['jenis_operasi'] ?></td>
            </tr>

            <tr height="60">
                <td colspan="2"></td>

            </tr>

            <tr>
                <td></td>
                <td>Pangkal Pinang,<?=strftime('%d %B %Y',strtotime($data['tanggal'])) ?></td>
            </tr>

            <tr>
                <td></td>
                <td>Yang memberi keterangan sebab kematian</td>
            </tr>

            <tr>
                <td></td>
                <td><img src="<?= base_url() . $data['gambar'] ?>" style="width: 200px;height: 200px; "></td>
            </tr>


            <tr>
                <td></td>
                <td> Nama terang : <?=$data['nama_terang'] ?></td>
            </tr>



        </table>


        <!--end table 3-->

        <!--table 4-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td>catatan :</td>
            </tr>

            <tr height="100">
                <td></td>
            </tr>
        </table>
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
            window.location.href = 'javascript:history.go(-2)';
        }
    </script>
</body>

=======
<!DOCTYPE html>
<html>

<head>
    <title>Print out <?= $page_title ?></title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .table1 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid;

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

        hr {
            border: 1px solid black;
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
                    <img src="<?= base_url() ?>resources/img/rsbt_logo.jpg" style="width: 200px;">
                </td>
                <td>
                </td>
            </tr>
        </table>

        <center>
            <h3>LEMBARAN SEBAB KEMATIAN</h3>
        </center>
        <p align="left">
        <h3>NO RM<span>__</span><span>__</span>&nbsp; &nbsp;<span>__</span><span>__</span>&nbsp; &nbsp;<span>__</span><span>__</span></h3>
        </p>

        <!--table 1-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td>Nama : </td>
                <td><?= $data['nama'] ?></td>
                <td>Umur : </td>
                <td><?php
                    $birthDate = $data['tgl_lahir'];
                    date_default_timezone_set('Asia/Jakarta');

                    $date = new DateTime($birthDate);
                    $now = new DateTime();
                    $interval = $now->diff($date);

                    echo  $interval->y . " Tahun"; ?></td>
                <td>Jenis Kelamin :</td>
                <td><?= $data['jenis_kelamin'] ?></td>
            </tr>

            <tr>
                <td>Alamat :</td>
                <td colspan="5"><?= $data['alamat'] . ', ' . $data['kelurahan'] . ', ' . $data['kecamatan'] . ', ' . $data['provinsi'] ?></td>
            </tr>

        </table>

        <!--end table 1-->

        <!--table 2-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td class=gariskanan>&nbsp;</td>
                <td class=gariskanan>&nbsp;</td>
                <td class=gariskanan>&nbsp; </td>
            </tr>
            <tr>
                <td class=gariskanan>a.</td>
                <td class=gariskanan>a. …………………………………….</td>
                <td class=gariskanan> Lamanya (kira-kira) mulai sakit</td>
            </tr>
            <tr>
                <td class=gariskanan> Penyakit atau keadaan yang langsung</td>
                <td class=gariskanan> Penyakit tersebut dalam ruang a di-</td>
                <td class=gariskanan>hingga meninggal dunia</td>
            </tr>
            <tr>
                <td class=gariskanan> mengakibatkan kematian</td>
                <td class=gariskanan> disebabkan oleh (atau akibat dari) :</td>
                <td class="gariskanan" rowspan="2"><?=$data['lama_a'] ?></td>
            </tr>
            <tr>
                <td class=gariskanan></td>
                <td class=gariskanan> <?= $data['sebab_a'] ?></td>

            </tr>
            <tr>
                <td class=gariskanan>b.c</td>
                <td class=gariskanan> b. …………………………………….</td>
                <td class="gariskanan garisbawah" rowspan="6"><?=$data['lama_b'] ?></td>
            </tr>

            <tr>
                <td class=gariskanan>Penyakit-penyakit (bila ada) yang</td>
                <td class=gariskanan> Penyakit tersebut dalam ruang b di-</td>

            </tr>

            <tr>
                <td class=gariskanan>menjadi lantaran timbulnya sebab</td>
                <td class=gariskanan> disebabkan oleh (atau akibat dari) :</td>

            </tr>

            <tr >
                <td class=gariskanan>kematian tersebut pada a. dengan</td>

                <td class="gariskanan garisbawah" rowspan="3"> <?= $data['sebab_b'] ?></td>
            </tr>

            <tr>
                <td class=gariskanan>menyebutkan yang menjadi pokok</td>
                

            </tr>

            <tr class=garisbawah>
                <td class=gariskanan>pangkal terakhir.</td>

            </tr>

            <tr>
                <td class=gariskanan align="center">II</td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
            </tr>

            <tr>
                <td class=gariskanan>Penyakit-penyakit lain yang berarti</td>
                <td class=gariskanan rowspan="5"><?=$data['sebab_2'] ?></td>
                <td class=gariskanan rowspan="5"><?=$data['lama_2'] ?></td>
            </tr>

            <tr>
                <td class=gariskanan>dan mempengaruhi pula kematian itu</td>
                
            </tr>

            <tr>
                <td class=gariskanan>tetapi tidak ada hubungannya dengan</td>
            </tr>

            <tr>
                <td class=gariskanan>penyakit-penyakit tersebut dalam</td>
                
            </tr>

            <tr>
                <td class=gariskanan>I.a.b.c.</td>
                
            </tr>



        </table>



        <!--end table 2-->

        <!--table 3-->

        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td>Keterangan khusus untuk :</td>
                <td></td>
            </tr>
            <tr>
                <td>I. MATI KARENA RUPADAKSA (Violent Death) </td>
                <td></td>
            </tr>

            <tr>
                <td>a. Macam rudapaksa</td>
                <td><?=$data['ruda_paksa'] ?></td>
            </tr>

            <tr>
                <td>b. Cara kejadian rudapaksa</td>
                <td><?=$data['cara_rudapaksa'] ?></td>
            </tr>

            <tr>
                <td>c. Sifat jejas (kerusakan tubuh)</td>
                <td><?=$data['sifat_jejas'] ?></td>
            </tr>

            <tr>
                <td> II. KELAHIRAN MATI (Stillbirth)</td>
                <td></td>
            </tr>

            <tr>
                <td > a. Apakah ini janin lahir mati : </td>
                <td > <?=$data['janin_mati'] ?></td>
            </tr>

            <tr>
                <td> b. Sebab kelahiran mati : </td>
                <td > <?=$data['sebab_lahir_mati'] ?></td>
            </tr>

            <tr>
                <td colspan="2"> III. PERSALINAN, KEHAMILAN :</td>

            </tr>

            <tr>
                <td>a. Apakah ini peristiwa persalinan : </td>
                <td > <?=$data['persalinan'] ?></td>
            </tr>

            <tr>
                <td > b. Apakah ini peristiwa kehamilan :</td>
                <td > <?=$data['hamil'] ?></td>
            </tr>

            <tr>
                <td colspan="2">IV. OPERASI</td>

            </tr>

            <tr>
                <td> a. Apakah di sini dilakukan operasi :</td>
                <td > <?=$data['operasi'] ?></td>
            </tr>

            <tr>
                <td> b. Jenis Operasi : </td>
                <td > <?=$data['jenis_operasi'] ?></td>
            </tr>

            <tr height="60">
                <td colspan="2"></td>

            </tr>

            <tr>
                <td></td>
                <td>Pangkal Pinang,<?=strftime('%d %B %Y',strtotime($data['tanggal'])) ?></td>
            </tr>

            <tr>
                <td></td>
                <td>Yang memberi keterangan sebab kematian</td>
            </tr>

            <tr>
                <td></td>
                <td><img src="<?= base_url() . $data['gambar'] ?>" style="width: 200px;height: 200px; "></td>
            </tr>


            <tr>
                <td></td>
                <td> Nama terang : <?=$data['nama_terang'] ?></td>
            </tr>



        </table>


        <!--end table 3-->

        <!--table 4-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td>catatan :</td>
            </tr>

            <tr height="100">
                <td></td>
            </tr>
        </table>
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
            window.location.href = 'javascript:history.go(-2)';
        }
    </script>
</body>

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</html>