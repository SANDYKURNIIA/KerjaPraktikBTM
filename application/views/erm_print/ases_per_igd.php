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

        .table2 {
            color: #232323;
            border-collapse: collapse;
            border: 0px solid;

        }


        .garisbawah {
            border-bottom: 1px solid;
        }

        .gariskanan {
            border-right: 1px solid;
        }
        .gariskiri {
            border-left: 1px solid;
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

        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td width="220" class="gariskanan" align="center">
                    <img src="<?= base_url() ?>resources/img/rsbt_logo.jpg" style="width: 200px;">
                </td>

                <td class=gariskanan>
                    <p><b>RS. Bakti Timah</b></p>
					<p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
					<p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
					<p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>

                <td class=gariskanan>
                    <p>No. RM : <?= $data['no_rm'] ?></p>
                    <p>Nama : <?= $data['nama'] ?></p>
                    <p>Tgl Lahir : <?= $data['tgl_lahir'] ?></p>
                    <p>Jenis Kelamin :<?= $data['jenis_kelamin'] ?></p>
                </td>


            </tr>
        </table>

        <!--table satu-->
        <table width=100% class="table1" cellspacing=0>
            <tr align="center">
                <td>
                    <b>PENGKAJIAN DOKTER</b>
                </td>

            </tr>

        </table>
        <!--end of table satu-->

        <!--table dua -->
        <table width=100% class="table1" cellspacing=0>

            <tr>
                <td>Jam/Tanggal Masuk</td>
                <td>:<?= $data['tgl_masuk'] ?></td>
                <td>&nbsp; &nbsp; &nbsp;Cara Bayar : <?= $data['cara_bayar'] ?>.</td>
            </tr>

            <tr height="15">
                <td colspan="3"></td>
            </tr>

            <tr>
                <td>Pasien Rujukan</td>
                <td colspan="2">:<?= ($data['pRujuk'] == 'Tidak') ? $data['pRujuk'] : "Ya, Rujukan dari " . $data['asal_rujuk'] ?></td>
            </tr>

        </table>

        <!--end of table dua-->

        <!--table tiga-->
        <table width=100% class="table1" cellspacing=0>
            <tr align="center">
                <td>
                    <b>KEADAAN UMUM</b>
                </td>

            </tr>

        </table>
        <!--end of table tiga-->

        <!--table empat-->
        <table width=100% class="table1" cellspacing=0>

            <tr>
                <td>Kesadaran :</td>
                <td colspan="3">GCS : <?= $data['gcs'] ?></td>

            </tr>

            <tr>
                <td>Kondisi Umum :</td>
                <td colspan="3"><?= $data['kondisi_umum'] ?></td>

            </tr>

            <tr>
                <td>Tekanan Darah :</td>
                <td colspan="1"> <?= $data['tekanan_darah'] ?> mmHg</td>
                <td>Suhu :</td>
                <td colspan="1"> <?= $data['suhu'] ?> &deg;C</td>
            </tr>

            <tr>
                <td>Frekuensi Nadi :</td>
                <td colspan="1"> <?= $data['frequensi_nadi'] ?> x/menit</td>
                <td>Berat Badan :</td>
                <td colspan="1"> <?= $data['berat_badan'] ?> kg</td>
            </tr>

            <tr>
                <td>Frekuensi Nafas :</td>
                <td colspan="1"> <?= $data['frequensi_nafas'] ?> x/menit</td>
                <td width='30%'>Tinggi Badan :</td>
                <td colspan="1"> <?= $data['tinggi_badan'] ?> cm</td>
            </tr>

            <tr>
                <td width='30%'>Kebutuhan Khusus :</td>
                <td colspan="3"><?= $data['kebutuhan_khusus'] ?></td>
            </tr>


            <!--end of table empat-->

            <!--table 5-->
            <table width=100% class="table1" cellspacing=0>
                <tr>
                    <td width='30%'><b>Asesmen Triase : </b></td>
                    <td> <?= $data['asesment_triase'] ?></td>
                </tr>

            </table>



            <!--end of table lima-->

            <!--table enam-->
            <table width=100% class="table1" cellspacing=0>
                <tr align="center">
                    <td>
                        <b>ASESMEN AWAL KEPERAWATAN/KEBIDANAN</b>
                    </td>

                </tr>

            </table>
            <!--end of table enam-->

            <!--table tujuh-->
            <table width=100% class="table1" cellspacing=0>

                <tr>
                    <td colspan="4"><b>Pengkajian Spritual</b></td>

                </tr>

                <tr>
                    <td colspan="4">Kemampuan Beribadah</td>

                </tr>

                <tr>
                    <td width='30%'>Wajib Ibadah :</td>
                    <td colspan="3"><?= $data['wajib_ibadah'] ?></td>
                </tr>

                <tr>
                    <td>Thaharoh :</td>
                    <td colspan="3"><?= $data['thaharah'] ?></td>
                </tr>

                <tr>
                    <td width='30%'>Sholat :</td>
                    <td colspan="3"><?= $data['sholat'] ?></td>
                </tr>

            </table>


            <!--end of table tujuh-->

            <!--table delapam-->
            <table width=100% class="table1" cellspacing=0>
                <tr align="center">
                    <td colspan="8"><b>Assesment Nyeri</b></td>
                </tr>

                <tr>
                    <td colspan="3">Faktor Pemberat Rasa Nyeri :</td>
                    <td colspan="5"><?= $data['faktor_nyeri'] ?></td>
                </tr>
                <tr>
                    <td colspan="3">Kualitas Nyeri :</td>
                    <td colspan="2"><?= $data['kualitas_nyeri'] ?></td>
                    <td colspan="3" rowspan="10"><img src="<?= base_url() ?>resources/img/happy.png" style="width: 200px; height: 100px;"></td>
                </tr>


                <tr>
                    <td colspan="3">Lokasi Nyeri :</td>
                    <td><?= $data['lokasi_nyeri'] ?></td>
                </tr>

                <tr>
                    <td colspan="3">Skala Nyeri :</td>
                    <td><?= $data['skala_nyeri'] ?></td>

                </tr>

                <tr>
                    <td colspan="3">Durasi :</td>
                    <td><?= $data['durasi'] ?></td>
                </tr>

                <tr class=garisbawah>
                    <td colspan="3">Efek Nyeri :</td>
                    <td><?= $data['efek_nyeri'] ?></td>

                </tr>

            </table>



            <!--end of table delapan-->
            <div id="dewasa" style="display: none;">
                <table width=100% class="table1" cellspacing=0>
                    <tr align="center">
                        <td>
                            <b>SKRINING GIZI AWAL DEWASA </b>(Malnutrition Screening Tools)
                        </td>

                    </tr>

                </table>

                <table width=100% class="table1" cellspacing=0>
                    <tr class=garisbawah>
                        <td colspan="2" class=gariskanan>
                            1. Apakah pasien mengalami penurunan berat badan yang tidak direncanakan/tidak <br>
                            &nbsp; &nbsp;diinginkan dalam 6 bulan terakhir?
                        </td>
                        <td width="100">Skor Pasien</td>
                    </tr>

                    <tr class=garisbawah>
                        <td colspan="2" class=gariskanan>
                            &#10004; <?= $data['penurunan_bb'] ?>
                        </td>
                        <td width="100"><?php $score = 0;
                                        if ($data['penurunan_bb'] == 'Tidak') {
                                            $score = 0;
                                        } else if ($data['penurunan_bb'] == 'Tidak yakin (ada tanda: baju menjadi longgar)') {
                                            $score = 2;
                                        } else if ($data['penurunan_bb'] == 'Ya, ada penurunan BB sebanyak 1-5 kg') {
                                            $score = 1;
                                        } else if ($data['penurunan_bb'] == 'Ya, ada penurunan BB sebanyak 6-10 kg') {
                                            $score = 2;
                                        } else if ($data['penurunan_bb'] == 'Ya, ada penurunan BB sebanyak 11-15 kg') {
                                            $score = 3;
                                        } else if ($data['penurunan_bb'] == 'Ya, ada penurunan BB sebanyak >15 kg') {
                                            $score = 4;
                                        } else if ($data['penurunan_bb'] == 'Tidak tahu berapa kg penurunannya') {
                                            $score = 2;
                                        }
                                        echo $score ?></td>
                    </tr>




                    <tr class=garisbawah>
                        <td colspan="2" class=gariskanan>
                            2. Apakah asupan makan pasien berkurang karena penurunan nafsu makan/kesulitan <br>
                            &nbsp; &nbsp;menerima makanan?
                        </td>
                        <td width="100">Skor Pasien</td>
                    </tr>

                    <tr class=garisbawah>
                        <td colspan="2" class=gariskanan>
                            &#10004; <?= $data['kurang_makan'] ?>
                        </td>
                        <td width="100"><?php $score1 = 0;
                                        if ($data['kurang_makan'] == 'Tidak') {
                                            $score1 = 0;
                                        } else if ($data['kurang_makan'] == 'Ya') {
                                            $score1 = 1;
                                        }
                                        echo $score1 ?></td>
                    </tr>

                    <tr class=garisbawah>
                        <td height="30" colspan="2" class=gariskanan>
                            Bila skor≥2, pasien berisiko malnutrisi, konsul ke Ahli Gizi
                        </td>

                        <td width="100"><b><?= $score + $score1; ?></b></td>
                    </tr>


                </table>
            </div>

            <div id="anak" style="display: none;">
                <table width=100% class="table1" cellspacing=0>
                    <tr align="center">
                        <td>
                            <b>ASESMEN GIZI AWAL ANAK</b>
                        </td>

                    </tr>
                </table>
                <table width=100% class="table1" cellspacing=0>

                    <tr class=garisbawah>
                        <td class=gariskanan width="30"><b>No</b></td>
                        <td colspan="2" class=gariskanan><b>PERTANYAAN</b></td>
                        <td width="120"><b>SKOR</b></td>
                    </tr>

                    <tr class=garisbawah>
                        <td class=gariskanan width="30">1</td>
                        <td colspan="2" class=gariskanan>
                            Apakah pasien tampak kurus: <?= $data['kurus'] ?>
                        </td>
                        <td width="120">
                            <?php $score1 = 0;
                            if ($data['kurus'] == 'Tidak') {
                                $score1 = 0;
                            } else if ($data['kurus'] == 'Ya') {
                                $score1 = 1;
                            }
                            echo $score1 ?>
                        </td>
                    </tr>

                    <tr class=garisbawah>
                        <td class=gariskanan width="30">2</td>
                        <td colspan="2" class=gariskanan>
                            Apakah ada penurunan BB selama 1 bulan terakhir? <?= $data['turun_bb'] ?><br>
                            *untuk bayi &#60;1 tahun BB tidak naik selama 3 bulan </td>
                        <td width="120"><?php $score2 = 0;
                                        if ($data['turun_bb'] == 'Tidak') {
                                            $score2 = 0;
                                        } else if ($data['turun_bb'] == 'Ya') {
                                            $score2 = 1;
                                        }
                                        echo $score2 ?>
                        </td>
                    </tr>

                    <tr class=garisbawah>
                        <td rowspan="3" class=gariskanan width="30">3</td>
                        <td colspan="2" class=gariskanan>
                            Apakah terdapat salah satu dari kondisi di bawah ini
                        </td>
                        <td width="120">

                        </td>
                    </tr>

                    <tr class=garisbawah>

                        <td colspan="2" class=gariskanan>
                            a. diare ≥ 5 kali/hari atau muntah >3 kali/hari dalam 1 minggu <br>
                            terakhir? <?= $data['diare'] ?>
                        </td>
                        <td width="120">
                            <?php $score3 = 0;
                            if ($data['diare'] == 'Tidak') {
                                $score3 = 0;
                            } else if ($data['diare'] == 'Ya') {
                                $score3 = 1;
                            }
                            echo $score3 ?>
                        </td>
                    </tr>

                    <tr class=garisbawah>

                        <td colspan="2" class=gariskanan>
                            b. asupan makan berkurang selama 1 mingu terakhir? <?= $data['makan_kurang'] ?>
                        </td>
                        <td width="120">
                            <?php $score4 = 0;
                            if ($data['makan_kurang'] == 'Tidak') {
                                $score4 = 0;
                            } else if ($data['makan_kurang'] == 'Ya') {
                                $score4 = 1;
                            }
                            echo $score4 ?>
                        </td>
                    </tr>

                    <tr class=garisbawah>
                        <td class=gariskanan width="30">4</td>
                        <td colspan="2" class=gariskanan>
                            Apakah terdapat penyakit atau keadaan yang <br>
                            mengakibatkan pasien beresiko malnutrisi? <?= $data['malnutrisi'] ?>
                        </td>
                        <td width="120">
                            <?php $score5 = 0;
                            if ($data['malnutrisi'] == 'Tidak') {
                                $score5 = 0;
                            } else if ($data['malnutrisi'] == 'Ya') {
                                $score5 = 2;
                            }
                            echo $score5 ?>
                        </td>
                    </tr>

                    <tr class=garisbawah>
                        <td colspan="3" class=gariskanan width="30">Total Skor : </td>
                        <td>
                            <b><?= $score1+$score2+$score3+$score4+$score5 ?></b>
                        </td>
                    </tr>

                    <tr class=garisbawah>
                        <td colspan="4" class=gariskanan width="30">Bila skor MST lebih dari > 2 dilakukan pengkajian lanjut oleh ahli gizi.</td>

                    </tr>



                </table>
            </div>


            <table width=100% class="table1" cellspacing=0>
                <tr class=garisbawah align="center">
                    <td colspan="3" class=gariskanan width="30"><b>Pengkajian Risiko Jatuh</b></td>

                </tr>
            </table>
            <!--table baru-->
            <table width=100% class="table1" cellspacing=0>
                <tr class=garisbawah>
                    <td width="20"></td>
                    <td align="center" class=gariskanan>Komponen Penilaian</td>
                    <td class=gariskanan width="90">Ya</td>
                    <td class=gariskanan width="90">Tidak</td>
                </tr>

                <tr class=garisbawah>
                    <td width="20">a.</td>
                    <td class=gariskanan>
                        Perhatikan cara berjalan saat ini akan duduk di kursi , Apakah pasien tampak tidak seimbang <br>
                        sempoyongan/ limbung)
                    </td>
                    <td class=gariskanan width="90" align="center"><?php if ($data['sempoyongan'] == 'Ya') { ?>&#10004;<?php } ?></td>
                    <td class=gariskanan width="90" align="center"><?php if ($data['sempoyongan'] == 'Tidak') { ?>&#10004;<?php } ?></td>
                </tr>

                <tr class=garisbawah>
                    <td width="20">b.</td>
                    <td class=gariskanan>
                        Apakah pasien memegang pinggiran kursi atau meja atau benda lain sebagai penopang saat akan <br>
                        duduk ?
                    </td>
                    <td class=gariskanan width="90" align="center"><?php if ($data['penopang'] == 'Ya') { ?>&#10004;<?php } ?></td>
                    <td class=gariskanan width="90" align="center"><?php if ($data['penopang'] == 'Tidak') { ?>&#10004;<?php } ?></td>
                </tr>



            </table>


            <!--end table baru-->

            <table width=100% class="table1" cellspacing=0>
                <tr>
                    <td><?php if ($data['penopang'] == 'Tidak' && $data['sempoyongan'] == 'Tidak') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Tidak Berisiko (tidak ditemukan a dan b) Bila risiko rendah : pasien diberi edukasi bronsur pencegahan risiko jatuh<br>
                            <?php if ($data['penopang'] == 'Ya' && $data['sempoyongan'] == 'Ya') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Risiko Tinggi (a dan b ditemukan) Bila risiko tinggi : pasien diberikan gelang warna kuning pada pergelangan<br>
                                <?php if ($data['penopang'] == 'Ya' || $data['sempoyongan'] == 'Ya') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Risiko Rendah (ditemukan a atau b) tangan pasien dan diberi bronsur pencegaan risiko jatuh

                    </td>

                    <td></td>

                </tr>


            </table>

            <table width=100% class="table1" cellspacing=0>
                <tr>
                    <td width="300"></td>
                    <td>Diberitahukan ke DPJP :<?php if ($data['info_dpjp'] == 'Ya') { ?><span>&#10004;</span>Ya, Jam : <?= $data['jam_info_dpjp'] ?><?php }else { ?><span>__</span> Ya, Jam :  <?php } ?></td>
                    <td><?php if ($data['info_dpjp'] == 'Tidak') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Tidak</td>
                </tr>

            </table>

            <table width=100% class="table1" cellspacing=0>
                <tr>
                    <td width="250">Frekuensi BAB :</td>
                    <td> <?php echo ($data['frek_bab'] != 'Tidak dapat dikaji') ? $data['frek_bab'] : '' ?>. x / hari </td>
                    <td><?php if ($data['frek_bab'] == 'Tidak dapat dikaji') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Tidak dapat dikaji</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td width="250">Keluhan BAB :</td>
                    <td colspan="5"><?= $data['keluhan_bab'] ?></td>
                </tr>

                <tr>
                    <td width="250">Karakteristik Faces :</td>
                    <td colspan="3"><?= $data['karakter_feces'] ?></td>
                    <td>Warna :</td>
                    <td><?= $data['warna_feces'] ?></td>
                </tr>

                <tr>
                    <td width="250">Frekuensi Bak :</td>
                    <td><?= $data['frek_bak'] ?> x/ hari</td>
                    <td>Warna : </td>
                    <td><?= $data['warna_feces'] ?></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr class=garisbawah>
                    <td width="250">Keluhan Baak :</td>
                    <td colspan="5"><?= $data['keluhan_bak'] ?></td>
                </tr>

                <tr class=garisbawah height="50">
                    <td>Masalah Keperawatan / Kebidanan :</td>
                    <td colspan="5"><?= $data['masalah'] ?></td>
                </tr>

                <tr class=garisbawah height="50">
                    <td>Rencana Asuhan :</td>
                    <td colspan="5"><?= $data['rencana'] ?></td>
                </tr>


            </table>

            <table width=100% class="table2" cellspacing=0>
                <tr>
                    <td></td>
                    <td width="300">Tanggal / Jam : <?= $data['tanggal'] ?></td>
                </tr>

                <tr>
                    <td></td>
                    <td width="300">Perawat/Bidan yang melakukan Pengkajian</td>
                </tr>
                <tr height=50>
                    <td></td>
                </tr>

                <tr>
                    <td></td>
                    <td width="300">(...........................................)</td>
                </tr>



            </table>
    </div>
    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var birth = new Date('<?= $data['tgl_lahir'] ?>');
            var check = new Date();

            var milliDay = 1000 * 60 * 60 * 24; // a day in milliseconds;


            var ageInDays = (check - birth) / milliDay;

            var years = Math.floor(ageInDays / 365);
            if (years > 15) {
                $("#dewasa").show();
                $("#anak").hide();
            } else {
                $("#anak").show();
                $("#dewasa").hide();
            }
            // alert(years);
        });
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