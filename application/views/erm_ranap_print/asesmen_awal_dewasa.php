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
            ASESMEN AWAL JATUH DEWASA
        </h2>
        <br/>
				<table width=100% class="table1" cellspacing=0>
                    <tr>
                        <th class="gariskanan garisbawah"> Faktor Resiko </th>
                        <th class="gariskanan garisbawah"> Skala </th>
                        <th class="gariskanan garisbawah"> Skor </th>
                        <th class="gariskanan garisbawah"> Skor Pasien </th>
                    </tr>
                    <tr>
                        <?php
                            $skor_jatuh = $data['riwayat_jatuh'];
                            if ($skor_jatuh == "Tidak") {
                                $nilai_jatuh = 0;
                            } else if ($skor_jatuh == "Ya") {
                                $nilai_jatuh = 25;
                            }
                        ?>
                        <td class="gariskanan garisbawah" width="30%" rowspan="2">Riwayat Jatuh</td>
						<td class="gariskanan garisbawah" width="30%">Tidak</td>
                        <td class="gariskanan garisbawah">0</td>
                        <td class="gariskanan garisbawah" rowspan="2"><center><?php echo $nilai_jatuh ?></center></td>
                    </tr>    
                    <tr>
                        <td class="gariskanan garisbawah" width="30%">Ya</td>
                        <td class="gariskanan garisbawah">25</td>                   
                    <tr>
                        <?php
                            $skor_diagnosa = $data['diagnosa_sekunder'];
                            if ($skor_diagnosa == "Tidak") {
                                $nilai_diagnosa = 0;
                            } else if ($skor_diagnosa == "Ya") {
                                $nilai_diagnosa = 15;
                            }
                        ?>
                        <td class="gariskanan garisbawah" width="30%" rowspan="2">Diagnosa Sekunder</td>
						<td class="gariskanan garisbawah" width="30%">Tidak</td>
                        <td class="gariskanan garisbawah">0</td>
                        <td class="gariskanan garisbawah" rowspan="2"><center><?php echo $nilai_diagnosa ?></center></td>
                    </tr>
                    <tr>    
                        <td class="gariskanan garisbawah" width="30%">Ya</td>
                        <td class="gariskanan garisbawah">15</td>
                    </tr>    
                    <tr>
                        <?php
                            $skor_bantu = $data['alat_bantu'];
                            if ($skor_bantu == "Tidak Ada") {
                                $nilai_bantu = 0;
                            } else if ($skor_bantu == "Tongkat") {
                                $nilai_bantu = 15;
                            } else if ($skor_bantu == "Kursi") {
                                $nilai_bantu = 30;
                            }
                        ?>
                        <td class="gariskanan garisbawah" width="30%" rowspan="3">Menggunakan Alat-alat bantu</td>
                        <td class="gariskanan garisbawah" width="30%">Tidak Ada/Bedrest/Dibantu</td>
                        <td class="gariskanan garisbawah">0</td>
                        <td class="gariskanan garisbawah" rowspan="3 "><center><?php echo $nilai_bantu ?></center></td>
                    </tr>
                    <tr>
                        <td class="gariskanan garisbawah" width="30%">Kruk/Tongkat</td>
                        <td class="gariskanan garisbawah">15</td>
                    </tr>
                    <tr>
                        <td class="gariskanan garisbawah" width="30%">Kursi_Perabot</td>
                        <td class="gariskanan garisbawah">30</td>
                    </tr>
                    <tr>
                        <?php
                            $skor_infus = $data['infus'];
                            if ($skor_infus == "Tidak") {
                                $nilai_infus = 0;
                            } else if ($skor_infus == "Ya") {
                                $nilai_infus = 20;
                            }
                        ?>
                        <td class="gariskanan garisbawah" width="30%" rowspan="2">Menggunakan Infus/Heparin/Pengencer Darah</td>
						<td class="gariskanan garisbawah" width="30%">Tidak</td>
                        <td class="gariskanan garisbawah">0</td>
                        <td class="gariskanan garisbawah" rowspan="2"><center><?php echo $nilai_infus ?></center></td>
                    </tr>
                    <tr>
                        <td class="gariskanan garisbawah" width="30%">Ya</td>
                        <td class="gariskanan garisbawah">20</td>
                    </tr>
                    <tr>
                        <?php
                            $skor_jalan = $data['gaya_jalan'];
                            if ($skor_jalan == "Normal") {
                                $nilai_jalan = 0;
                            } else if ($skor_jalan == "Lemah") {
                                $nilai_jalan = 10;
                            } else if ($skor_jalan == "Terganggu") {
                                $nilai_jalan = 20;
                            }
                        ?>
                        <td class="gariskanan garisbawah" width="30%" rowspan="3">Gaya Berjalan</td>
						<td class="gariskanan garisbawah" width="30%">Normal/Bedrest/Kursi Roda</td>
                        <td class="gariskanan garisbawah">0</td>
                        <td class="gariskanan garisbawah" rowspan="3"><center><?php echo $nilai_jalan ?></center></td>
                    </tr>
                    <tr>
                        <td class="gariskanan garisbawah" width="30%">Lemah</td>
                        <td class="gariskanan garisbawah">10</td>
                    </tr>
                    <tr>
                        
                        <td class="gariskanan garisbawah" width="30%">Terganggu</td>
                        <td class="gariskanan garisbawah">20</td>
                    </tr>
                    <tr>
                    <?php
                            $skor_mental = $data['status_mental'];
                            if ($skor_mental == "Menyadari") {
                                $nilai_mental = 0;
                            } else if ($skor_mental == "Pelupa") {
                                $nilai_mental = 15;
                            }
                        ?>
                        <td class="gariskanan garisbawah" width="30%" rowspan="2">Status Mental</td>
						<td class="gariskanan garisbawah" width="30%">Menyadari Kemampuan</td>
                        <td class="gariskanan garisbawah">0</td>
                        <td class="gariskanan garisbawah" rowspan="2"><center><?php echo $nilai_mental ?></center></td>
                    </tr>
                    <tr>
                        <td class="gariskanan garisbawah" width="30%">Lupa akan keterbatasan</td>
                        <td class="gariskanan garisbawah">15</td>
                    </tr>    
                    <tr>
                        <td class="gariskanan garisbawah" width="30%">Skor Total</td>
						<td class="gariskanan garisbawah" colspan="3"><center><?= $data['skor_total']?></center></td>
                    </tr>
                    <tr>
                        <?php
                            $skor_total = $data['skor_total'];
                            if ($skor_total >= 0 && $skor_total <=24 ) {
                                $kategori = "Risiko Rendah";
                            } else if ($skor_total >= 25 && $skor_total <=44) {
                                $kategori = "Risiko Rendah";
                            } else if($skor_total >= 45){
                                $kategori = "Risiko Tinggi";
                            }
                        ?>
                        <td class="gariskanan garisbawah" width="30%">Kategori</td>
						<td class="gariskanan garisbawah" colspan="3"><center><?php echo $kategori?></center></td>
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