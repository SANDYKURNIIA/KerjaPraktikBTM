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
        <table style="width: 100%">
            <tr>
                <td>
                    <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 110px;">
                </td>
                <td>
                <p><b>RS. Bakti Timah</b></p>
                    <p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                    <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                    <p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>
                <td>
                    <p style="margin-left:-9em">NRM : <?= $data['no_rm'] ?></p>
                    <p style="margin-left:-9em">Nama :<?= $data['pasien'] ?></p>
                    <p style="margin-left:-9em">Jenis Kelamin :<?= $data['jenis_kelamin'] ?></p>
                    <p style="margin-left:-9em">Tanggal Lahir :<?= strftime('%d %B %Y', strtotime($data['tgl_lahir'])) ?></p>
                    <p style="margin-left:-9em">(Mohon diisi stiker jika ada)</p>

                </td>
            </tr>
        </table>
        <hr>
        <h2 class="center">
            ASESMEN ULANG ONTARIO MODIFIED STRATIFY-SYDNEY SCORING UNTUK GERIATRI
        </h2>
        <br/>
				<table width=100% class="table1" cellspacing=0>
                    <tr>
                        <th class="gariskanan garisbawah"> Parameter </th>
                        <th class="gariskanan garisbawah"> Skrining </th>
                        <th class="gariskanan garisbawah"> Jawaban </th>
                        <th class="gariskanan garisbawah"> Keterangan Nilai </th>
                        <th class="gariskanan garisbawah"> Skor</th>
                    </tr>
                    <tr>
                        <?php
                            $jatuh1 = $data['jatuh1'];
                            $jatuh2 = $data['jatuh2'];
                            if ($jatuh1 == "Tidak") {
                                $nilai_jatuh1 = 0;
                            } else if ($jatuh1 == "Ya") {
                                $nilai_jatuh1 = 6;
                            }
                            if ($jatuh2 == "Tidak") {
                                $nilai_jatuh2 = 0;
                            } else if ($jatuh2 == "Ya") {
                                $nilai_jatuh2 = 6;
                            }
                            $nilai_jatuh = $nilai_jatuh1+$nilai_jatuh2;
                        ?>
                        <td class="gariskanan garisbawah" width="20%" rowspan="2">Riwayat Jatuh</td>
						<td class="gariskanan garisbawah" width="35%">Apakah pasien datang ke rumah sakit karena jatuh?</td>
                        <td class="gariskanan garisbawah"><?= $data['jatuh1']; ?></td>
                        <td class="gariskanan garisbawah" rowspan="2"><center>Salah satu jawaban ya = 6</td>
                        <td class="gariskanan garisbawah" rowspan="2"><?php echo $nilai_jatuh ?></td>
                    </tr>    
                    <tr>
                        <td class="gariskanan garisbawah" width="30%">Jika tidak, apakah pasien mengalami jatuh dalam 2 bulan terakhir?</td>
                        <td class="gariskanan garisbawah"><?= $data['jatuh2']; ?></td>
                    </tr>                       
                    <tr>
                        <?php
                            $mental1 = $data['delirium'];
                            $mental2 = $data['disorientasi'];
                            $mental3 = $data['agitasi'];
                            if ($mental1 == "Tidak") {
                                $nilai_mental1 = 0;
                            } else if ($mental1 == "Ya") {
                                $nilai_mental1 = 14;
                            }
                            if ($mental2 == "Tidak") {
                                $nilai_mental2 = 14;
                            } else if ($mental2 == "Ya") {
                                $nilai_mental2 = 14;
                            }
                            if ($mental3 == "Tidak") {
                                $nilai_mental3 = 14;
                            } else if ($mental3 == "Ya") {
                                $nilai_mental3 = 14;
                            }
                            $nilai_mental = $nilai_mental1+$nilai_mental2+$nilai_mental3;
                        ?>
                        <td class="gariskanan garisbawah" width="20%" rowspan="3">Status Mental</td>
                        <td class="gariskanan garisbawah" width="35%">Apakah pasien delirium?(tidak dapat membuat keputusan, pola pikir tidak teroganisir, gangguan daya ingat</td>
						<td class="gariskanan garisbawah"><?= $data['delirium']; ?></td>
                        <td class="gariskanan garisbawah" rowspan="3"><center>Salah satu jawaban ya = 14</td>
                        <td class="gariskanan garisbawah" rowspan="3"><?php echo $nilai_mental ?></td>
                    </tr>
                    <tr>    
                        <td class="gariskanan garisbawah" width="35%">Apakah pasien disorientasi? (salah menyebutkan waktu, tempat, atau orang)</td>
                        <td class="gariskanan garisbawah"><?= $data['disorientasi']; ?></td>
                    </tr>
                    <tr>
                        <td class="gariskanan garisbawah" width="35%">apakah pasien mengalami agitasi? (ketakutan, gelisah, dan cemas)</td>
                        <td class="gariskanan garisbawah"><?= $data['agitasi']; ?></td>
                    </tr>    
                    <tr>
                        <?php
                            $penglihatan1 = $data['kacamata'];
                            $penglihatan2 = $data['buram'];
                            if ($penglihatan1 == "Tidak") {
                                $nilai_penglihatan1 = 0;
                            } else if ($penglihatan1 == "Ya") {
                                $nilai_penglihatan1 = 1;
                            }
                            if ($penglihatan2 == "Tidak") {
                                $nilai_penglihatan2 = 0;
                            } else if ($penglihatan2 == "Ya") {
                                $nilai_penglihatan2 = 1;
                            }
                            $nilai_penglihatan = $nilai_penglihatan1+$nilai_penglihatan2;
                        ?>
                        <td class="gariskanan garisbawah" width="20%" rowspan="2">Penglihatan</td>
						<td class="gariskanan garisbawah" width="35%">Apakah pasien memakai kacamata?</td>
                        <td class="gariskanan garisbawah"><?= $data['kacamata']; ?></td>
                        <td class="gariskanan garisbawah" rowspan="2"><center>Salah satu jawaban ya = 1</td>
                        <td class="gariskanan garisbawah" rowspan="2"><?php echo $nilai_penglihatan ?></td>
                    </tr>    
                    <tr>
                        <td class="gariskanan garisbawah" width="30%">Apakah pasien mengeluh adanya penglihatan buram?</td>
                        <td class="gariskanan garisbawah"><?= $data['buram']; ?></td>
                    </tr> 
                    <tr>
                        <?php
                            $berkemih = $data['berkemih'];
                            if ($berkemih == "Tidak") {
                                $nilai_berkemih = 0;
                            } else if ($berkemih == "Ya") {
                                $nilai_berkemih = 2;
                            }
                        ?>
                        <td class="gariskanan garisbawah" width="30%">Kebiasaan Berkemih</td>
						<td class="gariskanan garisbawah" width="30%">Apakah terdapat perubahan perilaku berkemih? (frekuensi, urgensi, inkontinensia, nokturia)</td>
                        <td class="gariskanan garisbawah"><?= $data['berkemih']; ?></td>
                        <td class="gariskanan garisbawah"><center>Ya = 2</td>
                        <td class="gariskanan garisbawah"><center><?php echo $nilai_berkemih ?></center></td>
                    </tr>
                    <tr>
                        <?php
                            $transfer = $data['transfer'];
                            $mobilitas = $data['mobilitas'];
                            if ($transfer == "Mandiri") {
                                $nilai_tf = 0;
                            } else if ($transfer == "Bantuan1") {
                                $nilai_tf = 1;
                            } else if ($transfer == "Bantuan2") {
                                $nilai_tf = 2;
                            } else if ($transfer == "Seimbang") {
                                $nilai_tf = 3;
                            }
                            if ($mobilitas == "Mandiri") {
                                $nilai_mobilitas = 0;
                            } else if ($mobilitas == "Bantuan") {
                                $nilai_mobilitas = 1;
                            } else if ($mobilitas == "Kursi Roda") {
                                $nilai_mobilitas = 2;
                            } else if ($mobilitas == "Imobilisasi") {
                                $nilai_mobilitas = 3;
                            }
                            $nilai_total = $nilai_mobilitas+$nilai_tf;
                        ?>
                        <td class="gariskanan garisbawah" width="30%" rowspan="4">Transfer (dari tempat tidur ke kursi dan kembali ke tempat tidur)</td>
						<td class="gariskanan garisbawah" width="30%">Mandiri(boleh menggunakan alat bantu jalan)[0]</td>
                        <td class="gariskanan garisbawah" rowspan="4"><?php echo $nilai_tf ?></td>
                        <td class="gariskanan garisbawah" rowspan="8">Jumlahkan nilai transfer dan mobilitas. Jika nilai total 0-3, maka skor = 0. jika nilai total 4-6, maka skor = 7</td>
                        <td class="gariskanan garisbawah" rowspan="8"><?php echo $nilai_total ?></td>
                    </tr>
                    <tr>
                        <td class="gariskanan garisbawah" width="30%">Memerlukan sedikit bantuan (1 orang) / dalam pengawasan[1]</td>
                    </tr>
                    <tr>
                        
                        <td class="gariskanan garisbawah" width="30%">Memerlukan bantuan yang nyata (2 orang)[2]</td>
                    </tr>
                    <tr>
                        <td class="gariskanan garisbawah" width="30%">Tidak dapat duduk dengan seimbang, perlu bantuan total[3]</td>
                    </tr>
                    <tr>
                        <td class="gariskanan garisbawah" width="30%" rowspan="4">Mobilitas</td>
						<td class="gariskanan garisbawah" width="30%">Mandiri(boleh menggunakan alat bantu jalan)[0]</td>
                        <td class="gariskanan garisbawah" rowspan="4"><?php echo $nilai_tf ?></td>
                    </tr>
                    <tr>
                        <td class="gariskanan garisbawah" width="30%">Berjalan dengan bantuan 1 orang (verbal / fisik)[1]</td>
                    </tr>
                    <tr>
                        
                        <td class="gariskanan garisbawah" width="30%">Menggunakan kursi roda[2]</td>
                    </tr>
                    <tr>
                        <td class="gariskanan garisbawah" width="30%">Imobilisasi[3]</td>
                    </tr>
                    <tr>
                        <td class="gariskanan garisbawah" colspan="4">TOTAL SKOR</td>
                        <td class="gariskanan garisbawah"><?= $data['skor_total']; ?></td>
                    </tr>
                </table>   
                <br/>
                <!-- <table width=100% cellspacing=0>
            <tr>
                <td colspan="3">
                    Karimun, tanggal <?= strftime('%d %B %Y', strtotime($data['tanggal'])) ?> pukul <?= date('H : i : s', strtotime($data['tanggal'])) ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                   &nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    <center>Pasien</center>
                </td>
                <td>
                    <center>DPJP</center>
                </td>
            </tr>
            <tr>
                <td>
                    <center><img src="<?= base_url() . $data['ttd'] ?>" style="width: 200px;height:200px; "></center>
                </td>
                <td>
                    <center><img src="<?= base_url() . $data['ttd1'] ?>" style="width: 200px;height:200px; "></center>
                </td>
            </tr>

        </table>         -->
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