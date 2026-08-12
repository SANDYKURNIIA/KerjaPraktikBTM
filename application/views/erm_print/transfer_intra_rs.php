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
            border: 0px solid;

        }

        .table2 {
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
        <table style="margin-top:-10px; font-size:11px" width=100%>
            <tr>
                <td width=150px>
                <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 150px;">
                </td>
                <td width="40%">
                    <p><b>RS. Bakti Timah</b></p>
					<p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
					<p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
					<p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>
                <td>
                    <table style="margin-right:-50px; font-size:14px" class="table2 right" width=100%>
                        <tr>
                            <td width=40%>NRM</td>
                            <td>:</td>
                            <td><?= $data['no_rm'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $data['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><?= $data['jenis_kelamin'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td><?= date('d-M-Y', strtotime($data['tgl_lahir'])) ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>



        <center><b>FORMULIR TRANSFER PASIEN INTRA RUMAH SAKIT</b></center>
        <table class="table2">
            <tr>
                <td>

                    <!--table 1-->
                    <table width=100% class="table1" cellspacing=0>
                        <tr>
                            <td width="17%">Tanggal Masuk </td>
                            <td>:<?= $data['tgl_masuk'] ?></td>
                            <td>Tanggal / Jam Pindah </td>
                            <td>: <?= $data['tglPindah'] ?></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td>Pindah ke Ruang / Kelas </td>
                            <td>: <?= $data['tuj_pindah'] ?></td>
                        </tr>

                        <tr>
                            <td>DPJP </td>
                            <td>: <?= $data['dpjp'] ?></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Diagnosis </td>
                            <td>: <?= $data['diagnosa'] ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Cara Transfer</td>
                            <td colspan="3">: <?= $data['cara_tf'] ?></td>
                        </tr>

                    </table>

                    <!--end table 1-->

                    <!--table2-->
                    <table width=100% class="table1" cellspacing=0>

                        <tr>
                            <td>&nbsp;</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td colspan="5"><b>I. PEMERIKSAAN FISIK</b></td>
                        </tr>

                    </table>
                    <!--end table 2-->

                    <!--table bonus-->

                    <table width=100% class="table1" cellspacing=0>

                        <tr>
                            <td width=25%>
                                &nbsp; a. Keadaan Umum
                            </td>
                            <td>: <?= $data['keadaan_umum'] ?></td>
                        </tr>
                        <tr>
                            <td>
                                &nbsp; b. Kesadaran
                            </td>
                            <td>: <?= $data['kesadaran'] ?></td>
                        </tr>

                        <tr>
                            <td>
                                &nbsp; c. Tanda Tanda Vital
                            </td>
                            <td>:</td>
                        </tr>
                    </table>
                    <!--end table bonus-->

                    <!--table 3-->
                    <table width=100% class="table1" cellspacing=0>

                        <tr>
                            <td width="5%"></td>
                            <td width="15%">TD : <?= $data['tekanan_darah'] ?> mmHg</td>
                            <td width="15%">Suhu : <?= $data['suhu'] ?> °C </td>
                            <td width="15%">Nadi : <?= $data['frequensi_nadi'] ?> x/mnt</td>
                            <td width="15%"> RR : <?= $data['rr'] ?> x/mnt</td>
                            <td width="15%"> Skala Nyeri : <?= $data['skala_nyeri'] ?></td>
                            <td width="15%"></td>
                        </tr>

                        <tr>
                            <td width="40"></td>
                            <td>Respiratori : Dada</td>
                            <td><?php if ($data['dada'] == 'Simetris') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Simetris</td>
                            <td><?php if ($data['dada'] == 'Asimetris') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Asimetris</td>
                            <td><?php if ($data['dada'] == 'Bernafas') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Bernafas</td>
                            <td><?php if ($data['dada'] == 'Nyeri') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Nyeri</td>
                            <td><?php if ($data['dada'] == 'Tidak Nyeri') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Tidak Nyeri</td>
                        </tr>

                        <tr>
                            <td width="40"></td>
                            <td> &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Bunyi paru</td>
                            <td><?php if ($data['paru'] == 'Ronkhi') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Ronkhi</td>
                            <td><?php if ($data['paru'] == 'Wheezing') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Wheezing</td>
                            <td><?php if ($data['paru'] == 'Vesikular') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Vesikular</td>
                            <td><?php if ($data['paru'] == 'Crackles') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Crackles</td>
                            <td></td>
                        </tr>

                        <tr>
                            <td width="40"></td>
                            <td>Sirkulasi :</td>
                            <td><?php if ($data['sirkulasi'] == 'Nyeri Dada') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Nyeri Dada</td>
                            <td><?php if ($data['sirkulasi'] == 'Sakit Kepala/Pusing') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Sakit Kepala/Pusing</td>
                            <td><?php if ($data['sirkulasi'] == 'Cyanosis') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Cyanosis</td>
                            <td><?php if ($data['sirkulasi'] == 'Berdebar') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Berdebar</td>
                            <td></td>
                        </tr>

                    </table>


                    <!--end table 3-->

                    <!--table bonus-->

                    <table width=100% class="table1" cellspacing=0>

                        <tr>
                            <td width=15%>
                                &nbsp; d. Keluhan
                            </td>
                            <td>:<?= $data['keluhan'] ?></td>
                        </tr>
                        <tr>
                            <td width=30%>
                                &nbsp; e. Riwayat Penyakit
                            </td>
                            <td>:<?= $data['riwayat_penyakit'] ?></td>
                        </tr>
                    </table>
                    <!--end table bonus-->

                    <!--table bonus lagi-->
                    <table width=100% class="table1" cellspacing=0>

                        <tr>
                            <td>
                                &nbsp; f. Riwayat Alergi
                            </td>
                            <td><?php if ($data['alergi'] == 'Tidak') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Tidak</td>
                            <td><?php if ($data['alergi'] != 'Tidak') { ?><span>&#10004;</span><?php echo 'Ada, Sebutkan : ' . $data['alergi'];
                                                                                            } else { ?><span>__</span>Ada, Sebutkan : <?php } ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </table>

                    <!--akhir table bonus-->
                    <!-- table empat-->
                    <br>
                    <table width=100% class="table1" cellspacing=0>
                        <tr>
                            <td><b>II. PEMERIKSAAN DIAGNOSIS YANG TELAH DILAKUKAN</b></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>




                    </table>

                    <!--end table empat-->
                    <table width=100% class="table1" cellspacing=0>

                        <tr>
                            <td>&nbsp; <?php if ($data['ekg'] == 'EKG') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>EKG</td>
                            <td><?php if ($data['hsg'] == 'HSG') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>HSG</td>
                            <td><?php if ($data['ctg'] == 'CTG') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>CTG</td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>&nbsp; <?php if ($data['usg'] == 'USG') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>USG</td>
                            <td><?php if ($data['appendicogram'] == 'Appendicogram') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Appendicogram</td>
                            <td><?php if ($data['bno'] == 'BNO') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>BNO</td>
                            <td></td>
                        </tr>


                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </table>


                    <br>
                    <!-- table empat-->
                    <table width=100% class="table1" cellspacing=0>
                        <tr>
                            <td><b>III.TINDAKAN MEDIS YANG SUDAH DILAKUKAN</b></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>




                    </table>

                    <!--end table empat-->

                    <!-- table empat-->
                    <table width=100% class="table1" cellspacing=0>
                        <tr>
                            <td>&nbsp; <?= $data['tindakan'] ?></td>
                        </tr>

                    </table>

                    <!--end table empat-->

                    <!-- table empat-->
                    <br>
                    <table width=100% class="table1" cellspacing=0>
                        <tr>
                            <td><b>IV. PEMBERIAN THERAPI</b></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>




                    </table>

                    <!--end table empat-->

                    <table width=100% class="table1" cellspacing=0>
                        <tr>
                            <td><b>&nbsp;Infus</b></td>
                        </tr>

                        <tr>
                            <td>&nbsp; <?= $data['infus'] ?></td>
                        </tr>
                        <tr>
                            <td>&nbsp; </td>
                        </tr>

                    </table>

                    <!--end table empat-->

                    <!--end table empat-->

                    <table width=100% class="table2" cellspacing=0>


                        <tr class=garisbawah>
                            <td class=gariskanan>
                                <center>Nama Obat</center>
                            </td>
                            <td width="150" class=gariskanan>
                                <center>Dosis</center>
                            </td>
                            <td>
                                <center>Cara Pemberian</center>
                            </td>

                        </tr>

                        <?php
                        if (count($terapi) > 0) {
                            foreach ($terapi as $row) { ?>
                                <tr class="garisbawah" height="60">
                                    <td class=gariskanan>
                                        <center><?= $row->nama ?></center>
                                    </td>
                                    <td class=gariskanan>
                                        <center><?= $row->tindakan ?></center>
                                    </td>
                                    <td class=gariskanan>
                                        <center><?= $row->cara_pemakaian ?></center>
                                    </td>
                                </tr>

                            <?php }
                        } else { ?>

                            <tr width="90">
                                <td colspan="4" class=gariskanan>
                                    <center>Tidak ada data</center>
                                </td>
                            </tr>
                        <?php } ?>

                    </table>

                    <!--end table empat-->

                    <!-- table empat-->
                    <br>
                    <table width=100% class="table1" cellspacing=0>
                        <tr>
                            <td><b>V. KONDISI PASIEN</b></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                    </table>

                    <!--end table empat-->

                    <!--table akhir-->
                    <table width=100% class="table1" cellspacing=0>
                        <tr>
                            <td width=20%>a. Saat transfer :</td>
                            <td colspan="4"><?= $data['kondisi_tf'] ?></td>
                        </tr>

                        <tr>
                            <td width=20%>b. Saat Serah Terima : </td>
                            <td colspan="4"><?= $data['kondisi_terima'] ?></td>
                        </tr>
                        <tr>
                            <td>&nbsp; &nbsp; Tanda-tanda vital</td>
                            <td>TD : <?= $data['tekanan_darah1'] ?> mmHg </td>
                            <td>Suhu : <?= $data['suhu1'] ?> °C</td>
                            <td>Nadi : <?= $data['frequensi_nadi1'] ?> x/mnt</td>
                            <td>RR : <?= $data['rr1'] ?> x/mnt</td>
                        </tr>

                        <tr>
                            <td></td>
                            <td colspan="4">Skala Nyeri : <?= $data['skala_nyeri1'] ?></td>

                        </tr>
                    </table>


                    <!--end table akhir-->

                    <!--table untuk ttd-->
                    <table width=100% class="table1" cellspacing=0>
                        <tr>
                            <td>
                                <center>Petugas Transfer</center>
                            </td>
                            <td>
                                <center>Petugas Yang Menerima</center>
                            </td>
                        </tr>
                        <tr height="150">
                            <td>
                                <center>(..........................)</center>
                            </td>
                            <td>
                                <center>(..........................)</center>
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>
        <!--end table untuk ttd-->

























        <!--batas-->





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
            border: 0px solid;

        }

        .table2 {
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
        <table style="margin-top:-10px; font-size:11px" width=100%>
            <tr>
                <td width=150px>
                <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 150px;">
                </td>
                <td width="40%">
                    <p><b>RS. Bakti Timah</b></p>
					<p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
					<p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
					<p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>
                <td>
                    <table style="margin-right:-50px; font-size:14px" class="table2 right" width=100%>
                        <tr>
                            <td width=40%>NRM</td>
                            <td>:</td>
                            <td><?= $data['no_rm'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $data['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><?= $data['jenis_kelamin'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td><?= date('d-M-Y', strtotime($data['tgl_lahir'])) ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>



        <center><b>FORMULIR TRANSFER PASIEN INTRA RUMAH SAKIT</b></center>
        <table class="table2">
            <tr>
                <td>

                    <!--table 1-->
                    <table width=100% class="table1" cellspacing=0>
                        <tr>
                            <td width="17%">Tanggal Masuk </td>
                            <td>:<?= $data['tgl_masuk'] ?></td>
                            <td>Tanggal / Jam Pindah </td>
                            <td>: <?= $data['tglPindah'] ?></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td>Pindah ke Ruang / Kelas </td>
                            <td>: <?= $data['tuj_pindah'] ?></td>
                        </tr>

                        <tr>
                            <td>DPJP </td>
                            <td>: <?= $data['dpjp'] ?></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Diagnosis </td>
                            <td>: <?= $data['diagnosa'] ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Cara Transfer</td>
                            <td colspan="3">: <?= $data['cara_tf'] ?></td>
                        </tr>

                    </table>

                    <!--end table 1-->

                    <!--table2-->
                    <table width=100% class="table1" cellspacing=0>

                        <tr>
                            <td>&nbsp;</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td colspan="5"><b>I. PEMERIKSAAN FISIK</b></td>
                        </tr>

                    </table>
                    <!--end table 2-->

                    <!--table bonus-->

                    <table width=100% class="table1" cellspacing=0>

                        <tr>
                            <td width=25%>
                                &nbsp; a. Keadaan Umum
                            </td>
                            <td>: <?= $data['keadaan_umum'] ?></td>
                        </tr>
                        <tr>
                            <td>
                                &nbsp; b. Kesadaran
                            </td>
                            <td>: <?= $data['kesadaran'] ?></td>
                        </tr>

                        <tr>
                            <td>
                                &nbsp; c. Tanda Tanda Vital
                            </td>
                            <td>:</td>
                        </tr>
                    </table>
                    <!--end table bonus-->

                    <!--table 3-->
                    <table width=100% class="table1" cellspacing=0>

                        <tr>
                            <td width="5%"></td>
                            <td width="15%">TD : <?= $data['tekanan_darah'] ?> mmHg</td>
                            <td width="15%">Suhu : <?= $data['suhu'] ?> °C </td>
                            <td width="15%">Nadi : <?= $data['frequensi_nadi'] ?> x/mnt</td>
                            <td width="15%"> RR : <?= $data['rr'] ?> x/mnt</td>
                            <td width="15%"> Skala Nyeri : <?= $data['skala_nyeri'] ?></td>
                            <td width="15%"></td>
                        </tr>

                        <tr>
                            <td width="40"></td>
                            <td>Respiratori : Dada</td>
                            <td><?php if ($data['dada'] == 'Simetris') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Simetris</td>
                            <td><?php if ($data['dada'] == 'Asimetris') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Asimetris</td>
                            <td><?php if ($data['dada'] == 'Bernafas') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Bernafas</td>
                            <td><?php if ($data['dada'] == 'Nyeri') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Nyeri</td>
                            <td><?php if ($data['dada'] == 'Tidak Nyeri') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Tidak Nyeri</td>
                        </tr>

                        <tr>
                            <td width="40"></td>
                            <td> &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Bunyi paru</td>
                            <td><?php if ($data['paru'] == 'Ronkhi') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Ronkhi</td>
                            <td><?php if ($data['paru'] == 'Wheezing') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Wheezing</td>
                            <td><?php if ($data['paru'] == 'Vesikular') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Vesikular</td>
                            <td><?php if ($data['paru'] == 'Crackles') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Crackles</td>
                            <td></td>
                        </tr>

                        <tr>
                            <td width="40"></td>
                            <td>Sirkulasi :</td>
                            <td><?php if ($data['sirkulasi'] == 'Nyeri Dada') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Nyeri Dada</td>
                            <td><?php if ($data['sirkulasi'] == 'Sakit Kepala/Pusing') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Sakit Kepala/Pusing</td>
                            <td><?php if ($data['sirkulasi'] == 'Cyanosis') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Cyanosis</td>
                            <td><?php if ($data['sirkulasi'] == 'Berdebar') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Berdebar</td>
                            <td></td>
                        </tr>

                    </table>


                    <!--end table 3-->

                    <!--table bonus-->

                    <table width=100% class="table1" cellspacing=0>

                        <tr>
                            <td width=15%>
                                &nbsp; d. Keluhan
                            </td>
                            <td>:<?= $data['keluhan'] ?></td>
                        </tr>
                        <tr>
                            <td width=30%>
                                &nbsp; e. Riwayat Penyakit
                            </td>
                            <td>:<?= $data['riwayat_penyakit'] ?></td>
                        </tr>
                    </table>
                    <!--end table bonus-->

                    <!--table bonus lagi-->
                    <table width=100% class="table1" cellspacing=0>

                        <tr>
                            <td>
                                &nbsp; f. Riwayat Alergi
                            </td>
                            <td><?php if ($data['alergi'] == 'Tidak') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Tidak</td>
                            <td><?php if ($data['alergi'] != 'Tidak') { ?><span>&#10004;</span><?php echo 'Ada, Sebutkan : ' . $data['alergi'];
                                                                                            } else { ?><span>__</span>Ada, Sebutkan : <?php } ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </table>

                    <!--akhir table bonus-->
                    <!-- table empat-->
                    <br>
                    <table width=100% class="table1" cellspacing=0>
                        <tr>
                            <td><b>II. PEMERIKSAAN DIAGNOSIS YANG TELAH DILAKUKAN</b></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>




                    </table>

                    <!--end table empat-->
                    <table width=100% class="table1" cellspacing=0>

                        <tr>
                            <td>&nbsp; <?php if ($data['ekg'] == 'EKG') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>EKG</td>
                            <td><?php if ($data['hsg'] == 'HSG') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>HSG</td>
                            <td><?php if ($data['ctg'] == 'CTG') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>CTG</td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>&nbsp; <?php if ($data['usg'] == 'USG') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>USG</td>
                            <td><?php if ($data['appendicogram'] == 'Appendicogram') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Appendicogram</td>
                            <td><?php if ($data['bno'] == 'BNO') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>BNO</td>
                            <td></td>
                        </tr>


                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </table>


                    <br>
                    <!-- table empat-->
                    <table width=100% class="table1" cellspacing=0>
                        <tr>
                            <td><b>III.TINDAKAN MEDIS YANG SUDAH DILAKUKAN</b></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>




                    </table>

                    <!--end table empat-->

                    <!-- table empat-->
                    <table width=100% class="table1" cellspacing=0>
                        <tr>
                            <td>&nbsp; <?= $data['tindakan'] ?></td>
                        </tr>

                    </table>

                    <!--end table empat-->

                    <!-- table empat-->
                    <br>
                    <table width=100% class="table1" cellspacing=0>
                        <tr>
                            <td><b>IV. PEMBERIAN THERAPI</b></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>




                    </table>

                    <!--end table empat-->

                    <table width=100% class="table1" cellspacing=0>
                        <tr>
                            <td><b>&nbsp;Infus</b></td>
                        </tr>

                        <tr>
                            <td>&nbsp; <?= $data['infus'] ?></td>
                        </tr>
                        <tr>
                            <td>&nbsp; </td>
                        </tr>

                    </table>

                    <!--end table empat-->

                    <!--end table empat-->

                    <table width=100% class="table2" cellspacing=0>


                        <tr class=garisbawah>
                            <td class=gariskanan>
                                <center>Nama Obat</center>
                            </td>
                            <td width="150" class=gariskanan>
                                <center>Dosis</center>
                            </td>
                            <td>
                                <center>Cara Pemberian</center>
                            </td>

                        </tr>

                        <?php
                        if (count($terapi) > 0) {
                            foreach ($terapi as $row) { ?>
                                <tr class="garisbawah" height="60">
                                    <td class=gariskanan>
                                        <center><?= $row->nama ?></center>
                                    </td>
                                    <td class=gariskanan>
                                        <center><?= $row->tindakan ?></center>
                                    </td>
                                    <td class=gariskanan>
                                        <center><?= $row->cara_pemakaian ?></center>
                                    </td>
                                </tr>

                            <?php }
                        } else { ?>

                            <tr width="90">
                                <td colspan="4" class=gariskanan>
                                    <center>Tidak ada data</center>
                                </td>
                            </tr>
                        <?php } ?>

                    </table>

                    <!--end table empat-->

                    <!-- table empat-->
                    <br>
                    <table width=100% class="table1" cellspacing=0>
                        <tr>
                            <td><b>V. KONDISI PASIEN</b></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                    </table>

                    <!--end table empat-->

                    <!--table akhir-->
                    <table width=100% class="table1" cellspacing=0>
                        <tr>
                            <td width=20%>a. Saat transfer :</td>
                            <td colspan="4"><?= $data['kondisi_tf'] ?></td>
                        </tr>

                        <tr>
                            <td width=20%>b. Saat Serah Terima : </td>
                            <td colspan="4"><?= $data['kondisi_terima'] ?></td>
                        </tr>
                        <tr>
                            <td>&nbsp; &nbsp; Tanda-tanda vital</td>
                            <td>TD : <?= $data['tekanan_darah1'] ?> mmHg </td>
                            <td>Suhu : <?= $data['suhu1'] ?> °C</td>
                            <td>Nadi : <?= $data['frequensi_nadi1'] ?> x/mnt</td>
                            <td>RR : <?= $data['rr1'] ?> x/mnt</td>
                        </tr>

                        <tr>
                            <td></td>
                            <td colspan="4">Skala Nyeri : <?= $data['skala_nyeri1'] ?></td>

                        </tr>
                    </table>


                    <!--end table akhir-->

                    <!--table untuk ttd-->
                    <table width=100% class="table1" cellspacing=0>
                        <tr>
                            <td>
                                <center>Petugas Transfer</center>
                            </td>
                            <td>
                                <center>Petugas Yang Menerima</center>
                            </td>
                        </tr>
                        <tr height="150">
                            <td>
                                <center>(..........................)</center>
                            </td>
                            <td>
                                <center>(..........................)</center>
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>
        <!--end table untuk ttd-->

























        <!--batas-->





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

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</html>