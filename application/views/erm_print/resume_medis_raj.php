<!DOCTYPE html>
<html>

<head>
    <title>RESUME MEDIS</title>
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
                <td>
                    <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 150px;">
                </td>
                <td>
                    <p><b>RS. Bakti Timah</b></p>
                    <p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                    <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                    <p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>
                <td>
                    <h1>RESUME MEDIS</h1>
                </td>
            </tr>
        </table>
        <hr>
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td width="220" class=gariskanan>Tanggal Masuk : <?= strftime("%d %B %Y ", strtotime($data['tgl_masuk'])); ?></td>
                <td width="200" class=gariskanan>No RM : <?= $data['no_rm'] ?></td>
                <td colspan="3" width="200">Nama Pasien : <?= $data['nama'] ?></td>

            </tr>

            <tr class="garisbawah ">
                <td class=gariskanan>Tanggal Keluar :</td>
                <td class=gariskanan>Tanggal Lahir : <?= strftime("%d %B %Y ", strtotime($data['tgl_lahir'])); ?></td>
                <td colspan="3">Riwayat Alergi : <?= ucwords($data['riwayat_alergi']) ?></td>
            </tr>


            <!--batas-->

            <tr>
                <td colspan=5>
                    1.Anamnesa :
                </td>
            </tr>

            <tr>
                <td height="20" colspan=5 style="padding: 15px;">
                    <table>
                        <tr>
                            <td>a. Keluhan Utama: </td>
                            <td><?= $data['keluhan_utama'] ?></td>
                        </tr>
                        <tr>
                            <td>b. Riwayat Penyakit Dahulu: </td>
                            <td><?= $data['penyakit_past'] ?> </td>
                        </tr>
                        <tr>
                            <td>c. Riwayat Penyakit Sekarang: </td>
                            <td><?= $data['alloanamnesa'] ?></td>
                        </tr>
                        <tr>
                            <td>d. Riwayat Penyakit Keluarga:</td>
                            <td><?= $data['penyakit_keluarga'] ?> </td>
                        </tr>
                    </table>

                </td>
            </tr>


            </tr>
            <tr>
                <td colspan=5>
                    2. Riwayat Singkat Dan Pemeriksaan Fisik :
                </td>
            </tr>

            <tr>
                <td height="20" colspan=5 style="padding: 15px;">
                    <table>
                        <tr>
                            <td>a. Tanda Vital: </td>
                        </tr>
                        <tr>
                            <td>Tekanan darah : </td>
                            <td><?= $data['tekanan_darah'] ?> MmHg</td>
                            <td>Suhu : </td>
                            <td><?= $data['suhu'] ?> &deg;C</td>
                            <td>Nadi : </td>
                            <td><?= $data['frequensi_nadi'] ?> x/menit</td>
                            <td>Pernafasan : </td>
                            <td><?= $data['frequensi_nafas'] ?> x/menit</td>

                        </tr>
                        <tr>
                            <td>Skala Nyeri : </td>
                            <td><?= $data['skala_nyeri'] ?></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>b. Pemeriksaan Fisik: </td>
                            <?php if ($data['kepala'] == "Dalam Batas Normal" && $data['hidung'] == "Dalam Batas Normal" && $data['mulut'] == "Dalam Batas Normal" && $data['leher'] == "Dalam Batas Normal" && $data['thorax'] == "Dalam Batas Normal" && $data['jantung'] == "Dalam Batas Normal" && $data['paru'] == "Dalam Batas Normal" && $data['andomen'] == "Dalam Batas Normal" && $data['punggung'] == "Dalam Batas Normal" && $data['ekstremitas'] == "Dalam Batas Normal") { ?>

                                <td>Dalam Batas Normal</td>

                            <?php } ?>
                        </tr>

                        <?php if ($data['kepala'] != "Dalam Batas Normal") { ?>
                            <tr>
                                <td>Kepala : </td>
                                <td><?= $data['kepala'] ?> </td>
                            </tr>
                        <?php } ?>
                        <?php if ($data['hidung'] != "Dalam Batas Normal") { ?>
                            <tr>
                                <td>Hidung : </td>
                                <td><?= $data['hidung'] ?> </td>
                            </tr>
                        <?php } ?>
                        <?php if ($data['mulut'] != "Dalam Batas Normal") { ?>
                            <tr>
                                <td>Mulut : </td>
                                <td><?= $data['mulut'] ?> </td>
                            </tr>
                        <?php } ?>
                        <?php if ($data['leher'] != "Dalam Batas Normal") { ?>
                            <tr>
                                <td>Leher : </td>
                                <td><?= $data['leher'] ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($data['thorax'] != "Dalam Batas Normal") { ?>
                            <tr>
                                <td>Thorax : </td>
                                <td><?= $data['thorax'] ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($data['jantung'] != "Dalam Batas Normal") { ?>
                            <tr>
                                <td>Jantung : </td>
                                <td><?= $data['jantung'] ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($data['paru'] != "Dalam Batas Normal") { ?>
                            <tr>
                                <td>Paru : </td>
                                <td><?= $data['paru'] ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($data['andomen'] != "Dalam Batas Normal") { ?>
                            <tr>
                                <td>Andomen : </td>
                                <td><?= $data['andomen'] ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($data['punggung'] != "Dalam Batas Normal") { ?>
                            <tr>
                                <td>Punggung : </td>
                                <td><?= $data['punggung'] ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($data['ekstremitas'] != "Dalam Batas Normal") { ?>
                            <tr>
                                <td>Ekstremitas : </td>
                                <td><?= $data['ekstremitas'] ?></td>
                            </tr>
                        <?php } ?>

                    </table>
                </td>
            </tr>

            <tr>
                <td colspan=5>
                    3 .Pemeriksaan Penunjang/Diagnostik :
                </td>
            </tr>


            
            <tr>
                <td colspan=5>
                    4 .Diagnosa Utama : <?= $data['nama_diagnosa'] ?>
                </td>
            </tr>

            <tr>
                <td height="10" colspan=5>
                    <p> </p>
                </td>
            </tr>

            <tr>
                <td colspan=5>
                    5 .Diagnosa Sekunder :
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
                <td colspan=5>
                    6 .Prosedur Pembedahan/Tindakan :
                </td>
            </tr>

            <tr>
                <td height="10" colspan=5>
                    <p><?= $data['terapi'] ?> </p>
                </td>
            </tr>

            <tr>
                <td colspan=5>
                    7 .Ringkasan Keluar :
                </td>
            </tr>



            <tr>
                <td height="10" colspan=5>
                    <p> </p>
                </td>
            </tr>



            <tr>
                <td width="200">&nbsp; &nbsp;Keadaan Waktu Pulang :</td>
                <td colspan="4" width="200"> <?= $data['keadaan_pulang'] ?> </td>
            </tr>



            <tr>
                <td width="200">&nbsp; &nbsp;Alasan Pulang :</td>
                <td colspan="4" width="200"> <?= $data['tindak_lanjut'] ?> </td>
            </tr>

            <tr>
                <td width="250">&nbsp; &nbsp;Hari / Tanggal Kontrol Ke RS : </td>
                <td width="200"><?php $date = strtotime($data['tgl_masuk']);
                                echo date('d-m-Y', $date) ?></td>
                <td width="100">Jam :</td>
                <td colspan="2"> <?php $date = strtotime($data['tgl_masuk']);
                                    echo date('h:i:s', $date) ?></td>
            </tr>
            <tr>
                <td width="200">&nbsp; &nbsp;Poliklinik :</td>
                <td colspan="4" width="200"> <?= $data['konsul'] ?> </td>
            </tr>
            <tr>
                <td height="20" colspan=5>
                    <p> </p>
                </td>
            </tr>

            <tr>
                <td width="200">&nbsp; &nbsp;Edukasi Yang Telah Diberikan </td>
                <td width="200"></td>
                <td width="100"></td>
                <td width="60"> </td>
                <td></td>
            </tr>

            <tr>
                <td height="20" colspan=5>
                    <p> </p>
                </td>
            </tr>

            <tr>
                <td colspan="5" width="200">Terapi</td>
            </tr>

            </td>
            </tr>

            <!--table baru-->
        </table>
        <table width=100% class="table1" cellspacing=0>
            <tr class="garisbawah" height="60">
                <td class=gariskanan>
                    <center>Nama Obat</center>
                </td>
                <td class=gariskanan>
                    <center>Dosis</center>
                </td>
                <td class=gariskanan>
                    <center>Frekuensi</center>
                </td>
                <td width="90" class=gariskanan>
                    <center>Cara Pemberian</center>
                </td>

            </tr>
            <?php if (count($terapi) > 0) {
                foreach ($terapi as $row) { ?>
                    <tr width="90">
                        <td class=gariskanan>
                            <center><?= $row->nama ?></center>
                        </td>
                        <td class=gariskanan>
                            <center><?= $row->frek ?></center>
                        </td>
                        <td class=gariskanan>
                            <center><?= $row->tindakan ?></center>
                        </td>
                        <td width="90" class=gariskanan>
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
        <!--end of table baru-->

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
                <td>Pangkal Pinang, <?php echo date('d-m-Y') ?> jam: <?php echo date('H:i:s') ?> WIB</td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>Dokter Penanggung Jawab Pelayanan</td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><img src="<?php echo base_url() . 'assets/ttd/cap_rsbt.png'; ?>" width="100px">
                    <img src="<?php echo $ttd; ?>" width="100px">
                </td>
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

            <tr>
                <td>Lembar Putih Penagihan</td>
                <td>Lembar Merah Muda Pasien</td>
                <td>Lembar Kuning - Arsip RM</td>
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