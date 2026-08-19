<!DOCTYPE html>
<html>

<head>
    <title>ANAMNESIS DAN PEMERIKSAAN FISIK</title>
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
                <td class=gariskanan>
                    <img src="<?= base_url() ?>resources/img/rsbt_logo.jpg" style="width: 150px;">
                </td>
                <td>
                    <p><b>RS. Bakti Timah</b></p>
					<p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
					<p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
					<p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>

            </tr>
        </table>
        <hr>
        <center>
            <h1>ANAMNESIS DAN PEMERIKSAAN FISIK</h1>
        </center>


        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td colspan="3" width="200">Nama Pasien : <?= $data['nama'] ?></td>
                <td colspan="2" class=gariskanan>Jenis Kelamin : <?= $data['jenis_kelamin']; ?></td>
            </tr>

            <tr class="garisbawah ">
                <td colspan="3" width="200">Tanggal Lahir : <?= strftime("%d %B %Y ", strtotime($data['tgl_lahir'])); ?></td>
                <td colspan="2" class=gariskanan>Umur : <?php
                                            $tanggal = new DateTime($data['tgl_lahir']);
                                            $today = new DateTime();
                                            $y = $today->diff($tanggal)->y;
                                            echo  $y . " tahun";  ?></td>
            </tr>


            <!--batas-->

            <tr>
                <td colspan="2">T.Darah= <?= $data['tekanan_darah'] ?> mmHg</td>
                <td>Nadi = <?= $data['frequensi_nadi'] ?> x/menit</td>
                <td class=gariskanan>Pernafasan = <?= $data['frequensi_nafas'] ?> x/menit</td>
                <!-- <td colspan="2" class=gariskanan></td> -->
            </tr>
            <tr class="garisbawah ">

                <td colspan="2">Suhu = <?= $data['suhu'] ?> &deg;C</td>
                <td>T.Badan = <?= $data['tinggi_badan'] ?> cm</td>
                <td class=gariskanan>B.Badan = <?= $data['berat_badan'] ?> kg</td>
                <!-- <td  class=gariskanan></td> -->
            </tr>
            <tr>
                <td colspan=5>
                    1. Keluhan Utama :
                </td>
            </tr>
            <tr>
                <td height="20" colspan=5>
                    <p><?= $data['keluhan'] ?> </p>
                </td>
            </tr>


            </tr>
            <tr>
                <td colspan=5>
                    2. Riwayat Penyakit Sekarang :
                </td>
            </tr>

            <tr>
                <td height="20" colspan=5>
                    <p><?= $data['riwayat'] ?> </p>
                </td>
            </tr>
            <tr>
                <td colspan=5>
                    3. Riwayat Penyakit Yang Pernah Diderita :
                </td>
            </tr>

            <tr>
                <td height="20" colspan=5>
                    <p><?= $data['riwayat_dulu'] ?> </p>
                </td>
            </tr>
            <tr>
                <td colspan=5>
                    4. Riwayat Alergi :
                </td>
            </tr>

            <tr>
                <td height="20" colspan=5>
                    <p><?= $data['riwayat_alergi'] ?> </p>
                </td>
            </tr>
            <tr>
                <td colspan=5>
                    5. Keadaan Sosial :
                </td>
            </tr>

            <tr>
                <td height="20" colspan=5>
                    <p><?= $data['ham_sos'] ?> </p>
                </td>
            </tr>
            <tr>
                <td height="10" colspan=5>
                    <p> </p>
                </td>
            </tr>
            <tr>
                <td colspan="5">6. PEMERIKSAAN FISIK</td>

            </tr>
            <tr>
                <td height="10" colspan=5>
                    <p> </p>
                </td>
            </tr>
            <tr>
                <td colspan="3"><b>KEPALA</b></td>
                <td colspan="2" rowspan="14">
                    <img src="<?= base_url() . $data['gambar'] ?>" style="width: 300px; ">
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><?= $data['kepala'] ?></td>
            </tr>

            <tr>
                <td colspan="3"><b>HIDUNG</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><?= $data['hidung'] ?></td>
            </tr>
            <tr>
                <td colspan="3"><b>MULUT</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><?= $data['mulut'] ?></td>
            </tr>
            <tr>
                <td colspan="3"><b>LEHER</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><?= $data['leher'] ?></td>
            </tr>
            <tr>
                <td colspan="3"><b>THORAX</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><?= $data['thorax'] ?></td>
            </tr>
            <tr>
                <td colspan="3"><b>JANTUNG</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><?= $data['jantung'] ?></td>
            </tr>
            <tr>
                <td colspan="3"><b>PARU</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><?= $data['paru'] ?></td>
            </tr>
            <tr>
                <td height="10" colspan=5>
                    <p> </p>
                </td>
            </tr>
            <tr>
                <td colspan=5>
                    7 .Diagnosa Saat Masuk : <?= $data['diagnosa'] ?>
                </td>
            </tr>

            <tr>
                <td height="10" colspan=5>
                    <p> </p>
                </td>
            </tr>

            <tr>
                <td colspan=5>
                    8 .Diagnosa Utama : <?= $data['nama_diagnosa'] ?>
                </td>
            </tr>

            <tr>
                <td height="10" colspan=5>
                    <p> </p>
                </td>
            </tr>

            <tr>
                <td colspan=5>
                    9 .Diagnosa Sekunder :
                </td>
            </tr>

        </table>
        <table width=100% class="table1" cellspacing=0>
            <tr class="garisbawah" height="60">
                <td class=gariskanan>
                    <center>Kode</center>
                </td>
                <td class=gariskanan>
                    <center>Nama</center>
                </td>
            </tr>
            <?php $db = $this->db->get_where('erm_diagnosa_dokter', ['id_pelayanan' => $data['id_pelayanan']])->result_array();
            if (count($db) > 0) {
                foreach ($db as $row) { ?>
                    <tr class="garisbawah" height="60">
                        <td class=gariskanan>
                            <center><?= $row['kode'] ?></center>
                        </td>
                        <td class=gariskanan>
                            <center><?= $row['nama_diagnosa'] ?></center>
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
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td width="300"><b>TERAPI / INSTRUKSI :</b></td>
                <td class="gariskanan"><b>Jam : </b> <?= date('H:i', strtotime($data['tanggal'])) ?></td>
                <td width="300"><b>KONSUL :</b></td>
                <td><b>Jam : </b> <?= date('H:i', strtotime($data['tanggal'])) ?></td>
            </tr>

            <tr height="200">
                <td width="300"><?= $data['terapi'] ?></td>
                <td class="gariskanan"><b></b></td>
                <td width="300"><?= $data['konsul'] ?></td>
                <td><b></b></td>
            </tr>
        </table>
        

        <!--tabel akhir-->
        <table width=100% class="table1" cellspacing=0>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>Dokter Penanggung Jawab Pelayanan</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><img src="<?php echo base_url() . 'assets/ttd/' . $data['foto']; ?>" width="100px" height="100px"></td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><?= $data['dpjp'] ?></td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

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