<<<<<<< HEAD
<!DOCTYPE html>
<html>

<head>

    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
        body {
            -webkit-print-color-adjust: exact;
        }

        .table1 {
            color: #232323;
            border-collapse: collapse;
            border: 2px solid;

        }

        p.thick {
            font-weight: bold;
        }

        .table1,
        tr {
            vertical-align: text-top;
        }

        .garisbawah {
            border-bottom: 2px solid;
        }

        .garisatas {
            border-top: 2px solid;
        }

        .gariskiri {
            border-left: 2px solid;
        }

        .gariskanan {
            border-right: 2px solid;
        }

        .garistebal {
            border-right: 3px solid;
        }

        .black {
            background-color: black;
        }
    </style>
</head>

<body onload="myFunction()">
    <div class="panel panel-default card-view">
        <div class="panel-heading">

            <table>
                <tr>
                    <td> <a><img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" height="70px" alt="logo" />&emsp;&emsp;</a></td>
                    <td class="garistebal"></td>
                    <td> <a>&emsp;&emsp;<img src="<?= base_url('assets/dist/img/alamat.jpg'); ?>" width="380px" alt="logoa" /></a></td>
                </tr>
            </table>
            <hr>
        </div>
        <div class="content">
            <label style="display:block; width:x; height:y;text-align: center;"><b>RESEP RACIKAN</b></label>
            <!-- <label style="display:block; width:x; height:y;text-align: right;">Pangkal Pinang, <?php date_default_timezone_set('Asia/Jakarta');
                                                                                                    setlocale(LC_TIME, 'IND');
                                                                                                    echo indo_date2(date('Y-m-d')); ?></label> -->
            <table width=100%>
                <td width=60%>
                    <table>
                        <tr>
                            <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                Status Pembiayaan
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?= $pasien['cara_bayar'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Asal Resep
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?= $pasien['ruang'] ?>
                            </td>
                        </tr>
                        <tr></tr>
                    </table>
                <!-- </td></td> -->
                <td>
                    <table>
                        <tr>
                            <td colspan="3">
                                Pangkal Pinang, <?php date_default_timezone_set('Asia/Jakarta');
                                                setlocale(LC_TIME, 'IND');
                                                echo indo_date2(date('Y-m-d', strtotime($pasien['tanggal']))); ?>
                            </td>


                        </tr>
                        <tr>
                            <td>
                                Riwayat alergi obat :
                            </td>
                            <td>
                                
                            </td>
                            <td>

                              
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="tidak" name="tidak">
                                <label for="tidak">Tidak</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="ya" name="ya">
                                <label for="ya">Ya, Sebutkan :</label>
                            </td>

                        </tr>

                    </table>
                </td>
            </table>
            <table width=100%>
                <tr>
                    <td>
                        <table>

                            <tr>
                                <td>
                                    Nomor RM
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    <?= $pasien['no_rm'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Nama Pasien
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    <?= $pasien['nama'] ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tgl. Lahir & Umur
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    <?= indo_date2($pasien['tgl_lahir']) ?> <?php
                                                                            $tanggal = new DateTime($pasien['tgl_lahir']);
                                                                            $today = new DateTime();
                                                                            $y = $today->diff($tanggal)->y;
                                                                            $m = $today->diff($tanggal)->m;
                                                                            $d = $today->diff($tanggal)->d;
                                                                            echo " (" . $y . " tahun )";  ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Alamat
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    <?= $pasien['alamat'] ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Jenis Kelamin
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    <?= $pasien['jenis_kelamin'] ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Berat Badan
                                </td>
                                <td>
                                    :
                                </td>

                                <td>
                                    <?= $berat_badan ?> kg
                                </td>

                            </tr>
                        </table>

                    </td>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    Dokter
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    <?= $pasien['dokter'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Diagnosa
                                </td>
                                <td>
                                    :
                                </td>
                                <td>

                                    <?= $diagnosa ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tinggi Badan
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    <?= $tinggi_badan ?>
                                </td>

                            </tr>

                        </table>
                    </td>

                </tr>
            </table>
            <table width=100% cellspacing=2>
                <td width=60%>
                    <table width=100% cellspacing=0>
                        <tr>
                            <td>

                                <table width=100%>
                                    <tr>
                                        <td class="garisatas" style="width: 80%; text-align: center; float: center;" colspan="5">
                                            <h12> RINCIAN SEDIAAN FARMASI, ALAT KESEHATAN, & BMHP</h12>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="garisbawah " width=0%> No
                                        </td>
                                        <td class="garisbawah " width=30%> Nama
                                        </td>
                                        <td class="garisbawah " width=20%> Jumlah
                                        </td>
                                        <td class="garisbawah " width=20%> Satuan
                                        </td>
                                        <td class="garisbawah " width=20%> Aturan Pakai
                                        </td>
                                    </tr>
                                    <?php
                                    $sum = 0;
                                    $no = 1;
                                    foreach ($resep as $row) {

                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td width="40%"><?php echo $row->resep;   ?></td>

                                            <td width="10%"></td>
                                            <td width="10%"></td>
                                            <td width="20%"><?php echo $row->tindakan . ', ' . $row->cara_pemakaian;  ?></td>

                                        </tr>
                                    <?php
                                    }


                                    ?>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td width=40%>
                    <table width=100% class="" cellspacing=0>
                        <p>PENGKAJIAN RESEP</p>
                        <tr class=" ">
                            <th class="gariskanan gariskiri garisatas">NO</th>
                            <th class="gariskanan garisatas">
                                <center>ASPEK TELAAH</center>
                            </th>
                            <th class="garisbawah garisatas">
                                <center>Telaah </center>
                            </th>
                            <th class="gariskanan garisbawah garisatas">
                                <center>Resep</center>
                            </th>
                            <th class="garisbawah garisatas">
                                <center>Telaah </center>
                            </th>
                            <th class="gariskanan garisbawah garisatas">
                                <center> Obat</center>
                            </th>
                            <!-- <td class="garisbawah">
                            </td> -->
                        </tr>
                        <tr class="garisbawah">
                            <th class="gariskanan gariskiri garisbawah"></th>
                            <th class="gariskanan garisbawah">

                            </th>
                            <th class="gariskana garisbawah">
                                <center>Ya</center>
                            </th>
                            <th class="gariskanan garisbawah">
                                <center>Tidak</center>
                            </th>
                            <th class="gariskanan garisbawah">
                                <center>Ya</center>
                            </th>
                            <th class="gariskanan garisbawah">
                                <center>Tidak</center>
                            </th>
                        </tr>
                        <tr>
                            <td class="gariskanan garisbawah gariskiri">
                                <center>1</center>
                            </td>
                            <td class="gariskanan garisbawah">&nbsp;Penulisan Jelas</td>
                            <td class="gariskanan garisbawah">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="gariskanan garisbawah black"></td>
                        </tr>
                        <tr>
                            <td class="gariskanan garisbawah gariskiri">
                                <center>2</center>
                            </td>
                            <td class="gariskanan garisbawah">&nbsp;Benar Administrasi</td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah black"></td>
                            <td class="gariskanan garisbawah black"></td>
                        </tr>
                        <tr>
                            <td class="gariskanan garisbawah gariskiri">
                                <center>3</center>
                            </td>
                            <td class="gariskanan garisbawah">&nbsp;Benar Pasien</td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                        </tr>
                        <tr>
                            <td class="gariskanan garisbawah gariskiri">
                                <center>4</center>
                            </td>
                            <td class="gariskanan garisbawah">&nbsp;Benar Obat</td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                        </tr>
                        <tr>
                            <td class="gariskanan garisbawah gariskiri">
                                <center>5</center>
                            </td>
                            <td class="gariskanan garisbawah">&nbsp;Benar Dosis</td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                        </tr>
                        <tr>
                            <td class="gariskanan garisbawah gariskiri">
                                <center>6</center>
                            </td>
                            <td class="gariskanan garisbawah">&nbsp;Benar Jumlah</td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                        </tr>
                        <tr>
                            <td class="gariskanan garisbawah gariskiri">
                                <center>7</center>
                            </td>
                            <td class="gariskanan garisbawah">&nbsp;Benar Rute</td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                        </tr>
                        <tr>
                            <td class="gariskanan garisbawah gariskiri">
                                <center>8</center>
                            </td>
                            <td class="gariskanan garisbawah">&nbsp;Benar Waktu & Frekuensi Pemberian</td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                        </tr>
                        <tr>
                            <td class="gariskanan garisbawah gariskiri">
                                <center>9</center>
                            </td>
                            <td class="gariskanan garisbawah">&nbsp;Ada Duplikasi Obat</td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah black"></td>
                            <td class="gariskanan garisbawah black"></td>
                        </tr>
                        <tr>
                            <td class="gariskanan garisbawah gariskiri">
                                <center>10</center>
                            </td>
                            <td class="gariskanan garisbawah">&nbsp;Ada Interaksi Obat</td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah black"></td>
                            <td class="gariskanan garisbawah black"></td>
                        </tr>
                        <tr>
                            <td class="gariskanan garisbawah gariskiri">
                                <center>11</center>
                            </td>
                            <td class="gariskanan garisbawah">&nbsp;Ada Kontraindikasi</td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah black"></td>
                            <td class="gariskanan garisbawah black"></td>
                        </tr>


                    </table>
                    <br>
                    <table width=100% class="table1" cellspacing=0>
                        <tr class="garisbawah">
                            <th class="garisatas">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            <th class="garisatas gariskanan">PARAF PETUGAS DISPENSING :</th>

                        </tr>

                        <tr class="garisbawah">
                            <th class="gariskanan">
                                <center>H</center>
                            </th>
                            <th class="gariskanan"></th>
                        </tr>
                        <tr class="garisbawah">
                            <th class="gariskanan">
                                <center>E</center>
                            </th>
                            <th class="gariskanan"></th>
                        </tr>
                        <tr class="garisbawah">
                            <th class="gariskanan">
                                <center>R</center>
                            </th>
                            <th class="gariskanan"></th>
                        </tr>
                        <tr class="garisbawah">
                            <th class="gariskanan">
                                <center>K</center>
                            </th>
                            <th class="gariskanan"></th>
                        </tr>
                        <tr class="garisbawah">
                            <th class="gariskanan">
                                <center>S</center>
                            </th>
                            <th class="gariskanan">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                    </table>
                    <br>
                    <table width=100% class="table1" cellspacing=0>
                        <tr class="garisbawah">
                            <td class="garisatas ">
                                <center> &nbsp;&nbsp;&nbsp;&nbsp;KLARIFIKASI </center>
                            </td>
                            <td class="gariskanan garisatas "> DAN KONFIRMASI</td>
                        </tr>
                        <tr class="garisbawah" height="60">
                            <td class="garisatas "> &nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="garisatas gariskanan"> &nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr class="garisbawah" height="70">
                            <td class="gariskanan">
                                <center>Petugas Farmasi</center>
                            </td>
                            <td class="gariskanan">
                                <center>Komunikasi Langsung/ Telpon</center>
                                <br>

                                <p>Jam :</p>
                            </td>
                        </tr>

                    </table>
                </td>
            </table>

            <table width=88%>
                <tr>
                    <td>
                        <div class="garisatas" style="width: 55%; text-align: left; float: left;">Catatan :</div><br>
                    </td>
                </tr>

            </table>
            <br>





            <table width=100%>
                <tr>
                    <td align="center"><img src="<?php echo base_url() . 'assets/ttd/' . $pasien['foto']; ?>" height="50px" style=" text-align: left; float: left;"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div style="width: 100%; text-align: left; float: left;"><u><?= $pasien['dokter']; ?></u></div><br>
                    </td>
                    <td>
                        <div style="width: 100%; text-align: right; float: right;"><?php
                                                                                    $data = $this->session->userdata('data_auth');
                                                                                    $db = $this->db->get_where('staff', ['id_staff' => $data->id_staff])->row_array();
                                                                                    echo $db['nama'];
                                                                                    ?></div><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="width: 20%; text-align: left; float: left;">Dokter</div><br>
                    </td>
                    <td>
                    <div style="width: 100%; text-align: right; float: right;"><?php echo date('H:i:s') ?></div>
                    </td>
                </tr>



            </table>
            <br>
        </div>
    </div>
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
</body>

=======
<!DOCTYPE html>
<html>

<head>

    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
        body {
            -webkit-print-color-adjust: exact;
        }

        .table1 {
            color: #232323;
            border-collapse: collapse;
            border: 2px solid;

        }

        p.thick {
            font-weight: bold;
        }

        .table1,
        tr {
            vertical-align: text-top;
        }

        .garisbawah {
            border-bottom: 2px solid;
        }

        .garisatas {
            border-top: 2px solid;
        }

        .gariskiri {
            border-left: 2px solid;
        }

        .gariskanan {
            border-right: 2px solid;
        }

        .garistebal {
            border-right: 3px solid;
        }

        .black {
            background-color: black;
        }
    </style>
</head>

<body onload="myFunction()">
    <div class="panel panel-default card-view">
        <div class="panel-heading">

            <table>
                <tr>
                    <td> <a><img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" height="70px" alt="logo" />&emsp;&emsp;</a></td>
                    <td class="garistebal"></td>
                    <td> <a>&emsp;&emsp;<img src="<?= base_url('assets/dist/img/alamat.jpg'); ?>" width="380px" alt="logoa" /></a></td>
                </tr>
            </table>
            <hr>
        </div>
        <div class="content">
            <label style="display:block; width:x; height:y;text-align: center;"><b>RESEP RACIKAN</b></label>
            <!-- <label style="display:block; width:x; height:y;text-align: right;">Pangkal Pinang, <?php date_default_timezone_set('Asia/Jakarta');
                                                                                                    setlocale(LC_TIME, 'IND');
                                                                                                    echo indo_date2(date('Y-m-d')); ?></label> -->
            <table width=100%>
                <td width=60%>
                    <table>
                        <tr>
                            <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                Status Pembiayaan
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?= $pasien['cara_bayar'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Asal Resep
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?= $pasien['ruang'] ?>
                            </td>
                        </tr>
                        <tr></tr>
                    </table>
                <!-- </td></td> -->
                <td>
                    <table>
                        <tr>
                            <td colspan="3">
                                Pangkal Pinang, <?php date_default_timezone_set('Asia/Jakarta');
                                                setlocale(LC_TIME, 'IND');
                                                echo indo_date2(date('Y-m-d', strtotime($pasien['tanggal']))); ?>
                            </td>


                        </tr>
                        <tr>
                            <td>
                                Riwayat alergi obat :
                            </td>
                            <td>
                                
                            </td>
                            <td>

                              
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="tidak" name="tidak">
                                <label for="tidak">Tidak</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="ya" name="ya">
                                <label for="ya">Ya, Sebutkan :</label>
                            </td>

                        </tr>

                    </table>
                </td>
            </table>
            <table width=100%>
                <tr>
                    <td>
                        <table>

                            <tr>
                                <td>
                                    Nomor RM
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    <?= $pasien['no_rm'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Nama Pasien
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    <?= $pasien['nama'] ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tgl. Lahir & Umur
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    <?= indo_date2($pasien['tgl_lahir']) ?> <?php
                                                                            $tanggal = new DateTime($pasien['tgl_lahir']);
                                                                            $today = new DateTime();
                                                                            $y = $today->diff($tanggal)->y;
                                                                            $m = $today->diff($tanggal)->m;
                                                                            $d = $today->diff($tanggal)->d;
                                                                            echo " (" . $y . " tahun )";  ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Alamat
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    <?= $pasien['alamat'] ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Jenis Kelamin
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    <?= $pasien['jenis_kelamin'] ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Berat Badan
                                </td>
                                <td>
                                    :
                                </td>

                                <td>
                                    <?= $berat_badan ?> kg
                                </td>

                            </tr>
                        </table>

                    </td>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    Dokter
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    <?= $pasien['dokter'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Diagnosa
                                </td>
                                <td>
                                    :
                                </td>
                                <td>

                                    <?= $diagnosa ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tinggi Badan
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    <?= $tinggi_badan ?>
                                </td>

                            </tr>

                        </table>
                    </td>

                </tr>
            </table>
            <table width=100% cellspacing=2>
                <td width=60%>
                    <table width=100% cellspacing=0>
                        <tr>
                            <td>

                                <table width=100%>
                                    <tr>
                                        <td class="garisatas" style="width: 80%; text-align: center; float: center;" colspan="5">
                                            <h12> RINCIAN SEDIAAN FARMASI, ALAT KESEHATAN, & BMHP</h12>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="garisbawah " width=0%> No
                                        </td>
                                        <td class="garisbawah " width=30%> Nama
                                        </td>
                                        <td class="garisbawah " width=20%> Jumlah
                                        </td>
                                        <td class="garisbawah " width=20%> Satuan
                                        </td>
                                        <td class="garisbawah " width=20%> Aturan Pakai
                                        </td>
                                    </tr>
                                    <?php
                                    $sum = 0;
                                    $no = 1;
                                    foreach ($resep as $row) {

                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td width="40%"><?php echo $row->resep;   ?></td>

                                            <td width="10%"></td>
                                            <td width="10%"></td>
                                            <td width="20%"><?php echo $row->tindakan . ', ' . $row->cara_pemakaian;  ?></td>

                                        </tr>
                                    <?php
                                    }


                                    ?>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td width=40%>
                    <table width=100% class="" cellspacing=0>
                        <p>PENGKAJIAN RESEP</p>
                        <tr class=" ">
                            <th class="gariskanan gariskiri garisatas">NO</th>
                            <th class="gariskanan garisatas">
                                <center>ASPEK TELAAH</center>
                            </th>
                            <th class="garisbawah garisatas">
                                <center>Telaah </center>
                            </th>
                            <th class="gariskanan garisbawah garisatas">
                                <center>Resep</center>
                            </th>
                            <th class="garisbawah garisatas">
                                <center>Telaah </center>
                            </th>
                            <th class="gariskanan garisbawah garisatas">
                                <center> Obat</center>
                            </th>
                            <!-- <td class="garisbawah">
                            </td> -->
                        </tr>
                        <tr class="garisbawah">
                            <th class="gariskanan gariskiri garisbawah"></th>
                            <th class="gariskanan garisbawah">

                            </th>
                            <th class="gariskana garisbawah">
                                <center>Ya</center>
                            </th>
                            <th class="gariskanan garisbawah">
                                <center>Tidak</center>
                            </th>
                            <th class="gariskanan garisbawah">
                                <center>Ya</center>
                            </th>
                            <th class="gariskanan garisbawah">
                                <center>Tidak</center>
                            </th>
                        </tr>
                        <tr>
                            <td class="gariskanan garisbawah gariskiri">
                                <center>1</center>
                            </td>
                            <td class="gariskanan garisbawah">&nbsp;Penulisan Jelas</td>
                            <td class="gariskanan garisbawah">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="gariskanan garisbawah black"></td>
                        </tr>
                        <tr>
                            <td class="gariskanan garisbawah gariskiri">
                                <center>2</center>
                            </td>
                            <td class="gariskanan garisbawah">&nbsp;Benar Administrasi</td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah black"></td>
                            <td class="gariskanan garisbawah black"></td>
                        </tr>
                        <tr>
                            <td class="gariskanan garisbawah gariskiri">
                                <center>3</center>
                            </td>
                            <td class="gariskanan garisbawah">&nbsp;Benar Pasien</td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                        </tr>
                        <tr>
                            <td class="gariskanan garisbawah gariskiri">
                                <center>4</center>
                            </td>
                            <td class="gariskanan garisbawah">&nbsp;Benar Obat</td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                        </tr>
                        <tr>
                            <td class="gariskanan garisbawah gariskiri">
                                <center>5</center>
                            </td>
                            <td class="gariskanan garisbawah">&nbsp;Benar Dosis</td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                        </tr>
                        <tr>
                            <td class="gariskanan garisbawah gariskiri">
                                <center>6</center>
                            </td>
                            <td class="gariskanan garisbawah">&nbsp;Benar Jumlah</td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                        </tr>
                        <tr>
                            <td class="gariskanan garisbawah gariskiri">
                                <center>7</center>
                            </td>
                            <td class="gariskanan garisbawah">&nbsp;Benar Rute</td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                        </tr>
                        <tr>
                            <td class="gariskanan garisbawah gariskiri">
                                <center>8</center>
                            </td>
                            <td class="gariskanan garisbawah">&nbsp;Benar Waktu & Frekuensi Pemberian</td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                        </tr>
                        <tr>
                            <td class="gariskanan garisbawah gariskiri">
                                <center>9</center>
                            </td>
                            <td class="gariskanan garisbawah">&nbsp;Ada Duplikasi Obat</td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah black"></td>
                            <td class="gariskanan garisbawah black"></td>
                        </tr>
                        <tr>
                            <td class="gariskanan garisbawah gariskiri">
                                <center>10</center>
                            </td>
                            <td class="gariskanan garisbawah">&nbsp;Ada Interaksi Obat</td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah black"></td>
                            <td class="gariskanan garisbawah black"></td>
                        </tr>
                        <tr>
                            <td class="gariskanan garisbawah gariskiri">
                                <center>11</center>
                            </td>
                            <td class="gariskanan garisbawah">&nbsp;Ada Kontraindikasi</td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah"></td>
                            <td class="gariskanan garisbawah black"></td>
                            <td class="gariskanan garisbawah black"></td>
                        </tr>


                    </table>
                    <br>
                    <table width=100% class="table1" cellspacing=0>
                        <tr class="garisbawah">
                            <th class="garisatas">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            <th class="garisatas gariskanan">PARAF PETUGAS DISPENSING :</th>

                        </tr>

                        <tr class="garisbawah">
                            <th class="gariskanan">
                                <center>H</center>
                            </th>
                            <th class="gariskanan"></th>
                        </tr>
                        <tr class="garisbawah">
                            <th class="gariskanan">
                                <center>E</center>
                            </th>
                            <th class="gariskanan"></th>
                        </tr>
                        <tr class="garisbawah">
                            <th class="gariskanan">
                                <center>R</center>
                            </th>
                            <th class="gariskanan"></th>
                        </tr>
                        <tr class="garisbawah">
                            <th class="gariskanan">
                                <center>K</center>
                            </th>
                            <th class="gariskanan"></th>
                        </tr>
                        <tr class="garisbawah">
                            <th class="gariskanan">
                                <center>S</center>
                            </th>
                            <th class="gariskanan">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                    </table>
                    <br>
                    <table width=100% class="table1" cellspacing=0>
                        <tr class="garisbawah">
                            <td class="garisatas ">
                                <center> &nbsp;&nbsp;&nbsp;&nbsp;KLARIFIKASI </center>
                            </td>
                            <td class="gariskanan garisatas "> DAN KONFIRMASI</td>
                        </tr>
                        <tr class="garisbawah" height="60">
                            <td class="garisatas "> &nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="garisatas gariskanan"> &nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr class="garisbawah" height="70">
                            <td class="gariskanan">
                                <center>Petugas Farmasi</center>
                            </td>
                            <td class="gariskanan">
                                <center>Komunikasi Langsung/ Telpon</center>
                                <br>

                                <p>Jam :</p>
                            </td>
                        </tr>

                    </table>
                </td>
            </table>

            <table width=88%>
                <tr>
                    <td>
                        <div class="garisatas" style="width: 55%; text-align: left; float: left;">Catatan :</div><br>
                    </td>
                </tr>

            </table>
            <br>





            <table width=100%>
                <tr>
                    <td align="center"><img src="<?php echo base_url() . 'assets/ttd/' . $pasien['foto']; ?>" height="50px" style=" text-align: left; float: left;"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div style="width: 100%; text-align: left; float: left;"><u><?= $pasien['dokter']; ?></u></div><br>
                    </td>
                    <td>
                        <div style="width: 100%; text-align: right; float: right;"><?php
                                                                                    $data = $this->session->userdata('data_auth');
                                                                                    $db = $this->db->get_where('staff', ['id_staff' => $data->id_staff])->row_array();
                                                                                    echo $db['nama'];
                                                                                    ?></div><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="width: 20%; text-align: left; float: left;">Dokter</div><br>
                    </td>
                    <td>
                    <div style="width: 100%; text-align: right; float: right;"><?php echo date('H:i:s') ?></div>
                    </td>
                </tr>



            </table>
            <br>
        </div>
    </div>
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
</body>

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</html>