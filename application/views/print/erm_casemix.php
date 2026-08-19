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

        .clsFirstImg {

            position: relative;
            float: left;
        }

        .clsSecondImg {

            position: absolute;
            top: 300px;
            right: 150px;

        }
    </style>
</head>

<body>

    <?php if ($cara_masuk == 'ugd') { ?>
        <div class="content" id="resume_med_igd" style="page-break-after:always;">
            <table class="a" style="width: 100%">
                <tr>
                    <td>
                        <img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" width="100px" alt="logo" style="width: 150px;" />
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
                    <td height="20" colspan=5>
                        <p><?= $data['keluhan'] ?> </p>
                    </td>
                </tr>


                </tr>
                <tr>
                    <td colspan=5>
                        2. Riwayat Singkat Dan Pemeriksaan Fisik :
                    </td>
                </tr>

                <tr>
                    <td height="20" colspan=5>
                        <p><?= $data['riwayat'] ?> </p>
                    </td>
                </tr>

                <tr>
                    <td colspan=5>
                        3 .Pemeriksaan Penunjang/Diagnostik :
                    </td>
                </tr>

                <tr>
                    <td colspan=5>
                        4 .Diagnosa Saat Masuk : <?= $data['diagnosa'] ?>
                    </td>
                </tr>

                <tr>
                    <td height="10" colspan=5>
                        <p> </p>
                    </td>
                </tr>

                <tr>
                    <td colspan=5>
                        5 .Diagnosa Utama : <?= $data['nama_diagnosa'] ?>
                    </td>
                </tr>

                <tr>
                    <td height="10" colspan=5>
                        <p> </p>
                    </td>
                </tr>

                <tr>
                    <td colspan=5>
                        6 .Diagnosa Sekunder :
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
                        7 .Prosedur Pembedahan/Tindakan :
                    </td>
                </tr>

                <tr>
                    <td height="10" colspan=5>
                        <p><?= $data['terapi'] ?> </p>
                    </td>
                </tr>

                <tr>
                    <td colspan=5>
                        8 .Ringkasan Keluar :
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
                                <?= $row['nama'] ?>
                            </td>
                            <td class=gariskanan>
                                <center><?= $row['signa'] ?></center>
                            </td>
                            <td class=gariskanan>
                                <center><?= $row['frek'] ?></center>
                            </td>
                            <td width="90" class=gariskanan>
                                <center><?= $row['cara_pemakaian'] ?></center>
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
                    <td><img class="clsFirstImg " src="<?php echo base_url() . 'assets/ttd/cap_igd.png'; ?>" width="100px">
                        <img src="<?php echo base_url() . 'assets/ttd/' . $data['foto']; ?>" width="100px">
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
    <?php } else if ($cara_masuk == 'his') { ?>
        <div class="content" id="resume_med_poli" style="page-break-after:always;">
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
                            <?php
                            $skala = 0;
                            if (isset($data['skor_nyeri']) && $data['skor_nyeri'] !== '') {
                                $skala = intval($data['skor_nyeri']);
                            } elseif (isset($data['skala_nyeri']) && is_numeric($data['skala_nyeri'])) {
                                $skala = intval($data['skala_nyeri']);
                            } elseif (isset($data['skala_nyeri']) && is_string($data['skala_nyeri'])) {
                                $label = strtolower(trim($data['skala_nyeri']));
                                if (strpos($label, 'tidak') !== false) {
                                    $skala = 0;
                                } elseif (strpos($label, 'ringan') !== false) {
                                    $skala = 2;
                                } elseif (strpos($label, 'sedang') !== false) {
                                    $skala = 4;
                                } elseif (strpos($label, 'mengganggu') !== false) {
                                    $skala = 6;
                                } elseif (strpos($label, 'berat') !== false) {
                                    $skala = 8;
                                } elseif (strpos($label, 'sangat berat') !== false) {
                                    $skala = 10;
                                }
                            }

                            switch ($skala) {
                                case 0:
                                    $gambar = "tidak_nyeri.png";
                                    $status = "Tidak Nyeri";
                                    break;
                                case 1:
                                case 2:
                                    $gambar = "nyeri_ringan.png";
                                    $status = "Nyeri Ringan";
                                    break;
                                case 3:
                                case 4:
                                    $gambar = "nyeri_sedang.png";
                                    $status = "Nyeri Sedang";
                                    break;
                                case 5:
                                case 6:
                                    $gambar = "nyeri_sedang1.png";
                                    $status = "Nyeri Mengganggu";
                                    break;
                                case 7:
                                case 8:
                                    $gambar = "nyeri_berat.png";
                                    $status = "Nyeri Berat";
                                    break;
                                case 9:
                                case 10:
                                    $gambar = "nyeri_sangat_berat.png";
                                    $status = "Nyeri Sangat Berat";
                                    break;
                                default:
                                    $gambar = "tidak_nyeri.png";
                                    $status = "-";
                            }
                            ?>
                            <tr>
                                <td>Skala Nyeri : </td>
                                <td>
                                    <img src="<?= base_url('assets/dist/img/' . $gambar); ?>" style="width:40px;">
                                    <br>
                                    <strong><?= $skala ?></strong>
                                    <br>
                                    <?= $status ?>
                                </td>
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
                    <td width="50" class=gariskanan>
                        <center>Cara Pemberian</center>
                    </td>

                </tr>
                <?php if (count($terapi) > 0) {
                    foreach ($terapi as $row) { ?>
                        <tr width="90">
                            <td class=gariskanan>
                                <?= $row['nama'] ?>
                            </td>
                            <td class=gariskanan>
                                <center><?= $row['signa'] ?></center>
                            </td>
                            <td class=gariskanan>
                                <center><?= $row['frek'] ?></center>
                            </td>
                            <td width="50" class=gariskanan>
                                <center><?= $row['cara_pemakaian'] ?></center>
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
                        <img src="<?php echo base_url() . 'assets/ttd/' . $data['foto']; ?>" width="100px">
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
        </div>
    <?php } else if ($cara_masuk == 'ranap') { ?>
        <div class="content" id="resume_med_ranap" style="page-break-after:always;">
            <?php
            $data_ranap['pasien'] = $pasien_ranap;
            $data_ranap['resume'] = $resume;
            $data_ranap['id_pelayanan'] = $inPel;
            $data_ranap['id_history'] = $inHis;
            $data_ranap['diagnosa_sekunder'] = $this->M_Erm->selectDataDiagnosaByIdPel($inHis);
            $data_ranap['terapi'] = $terapi_ranap;
            // print_arr($data_ranap);
            $this->load->view('erm_print/view_resume_pulang_print', $data_ranap);

            ?>
        </div>
    <?php } ?>
    <div class="content" id="labor" style="page-break-after:always;">

        <?php if (count($labor1) > 0) {
            foreach ($labor1 as $data2) {

                $param = array('ono' => 'A' . $data2['id_form_labor']);
                $labor = json_decode($this->curl->simple_get("http://192.168.87.2:8181/" . 'RESULTS', $param));

                if ($labor != "") {
                    $data['labor'] = $labor;
        ?>
                    <div class="content" id="labor_data" style="page-break-after:always;">

                        <?php
                        $this->load->view('print/cetak_hasil_labor', $data);
                        ?>
                    </div>
                <?php
                } else { ?>
                    <!-- <script type="text/javascript">
                        document.getElementById('labor').style.display = 'none';
                    </script> -->
                <?php }
                ?>

            <?php }
        } else { ?>
            <script type="text/javascript">
                document.getElementById('labor').style.display = 'none';
            </script>
        <?php } ?>




    </div>
    <!-- <div class="content" id="expertise" style="page-break-after:always;">

        <h2 class="center">
            EXPERTISE
        </h2>
        <hr>
        </?php if (count($radio1) > 0) {
            foreach ($radio1 as $data3) {
        ?>
                <table width=100% class="table1" cellspacing=0>
                    </?php
                    $gambar2 = null;
                    foreach (explode(',', $data3['keterangan']) as $image) { // 1, 2, 3
                        echo $gambar2 = "<center><img src='" . base_url() . "assets/images/" . $image . "'width='500px'></center><br>";
                    }

                    ?>
                </table>
            </?php
            }
        } else { ?>
            <script type="text/javascript">
                document.getElementById('expertise').style.display = 'none';
            </script>
        </?php } ?>




    </div> -->
    <div class="content" id="kuitansi" style="page-break-after:always;">

        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <table>
                    <tr>
                        <td> <a><img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" width="100px" alt="logo" /></a></td>
                        <td> <a><img src="<?= base_url('assets/dist/img/alamat.jpg'); ?>" width="200px" alt="logoa" /></a></td>

                    </tr>
                </table>
            </div>
            <div class="panel-heading">
                <table>
                    <tr>
                        <td>
                            <?php
                            echo "NAMA : " . $pasien['nama']  . ' ' . sprintf('%06d', $pasien['no_rm']);
                            // echo "<br>NO RM : " . sprintf('%06d', $pasien['no_rm']);
                            echo "<br>CARA BAYAR : " . $pasien['cara_bayar'];
                            // echo "<br>CARA MASUK : " . $pasien['asal'];
                            echo "<br>DPJP : " . $pasien['nama_dokter'];
                            echo "<br>TANGGAL MASUK : " . date("d M Y", strtotime($pasien['tgl_masuk'])) . ' - ' . str_replace('T', ' ', $pasien['tgl_keluar']);
                            // echo "<br>TANGGAL KELUAR : " . $pasien['tgl_keluar'];
                            // echo "<br>TANGGAL KELUAR : " .  str_replace('T', ' ', $tgl_keluar_rajal);
                            ?></td>
                    </tr>
                </table>
            </div>
            <hr>
            <h3 align="center" width="95%"> KWITANSI </h3>
            </hr>
            <div class="panel-wrapper collapse in ">
                <div class="panel-body">
                    <div class="kolom">
                        <div class="row ">
                            <div class="col-sm-12">


                                <h4 class="panel-title txt-dark"> PELAYANAN</h4>
                                <table id="datable_1" class="table table-hover display  pb-30">
                                    <thead>
                                        <tr>
                                            <th>NAMA TINDAKAN</th>
                                            <th>TOTAL HARGA</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr class="txt-dark">
                                            <td width="70%">KONSULTASI & ADMINISTRASI</td>
                                            <td width="10%"><?php $harga = round($data_pelayanan['total'] / 500) * 500;
                                                            $adm = round($data_pelayanan['biaya_admin'] / 500) * 500;
                                                            $total_pelayanan = $harga + $adm;
                                                            echo "Rp " . number_format($total_pelayanan, 0, ',', '.');   ?></td>
                                        </tr>


                                    </tbody>
                                </table>
                                <?php
                                if (count($data_apotik) > 0) { ?>

                                    <h4 class="panel-title txt-dark"> APOTIK</h4>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>
                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $apotik = 0;
                                            $ppn = 0;
                                            $apotikppn = 0;
                                            foreach ($data_apotik as $row) {
                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php

                                                $apotik += $harga * $row['frek'];
                                            }

                                            $poli = $this->db->query("SELECT count(*) from history_pelayanan where id_pelayanan ='$inPel' and id_pelayanan not in(
                                            SELECT id_pelayanan from history_pelayanan_ranap) and id_pelayanan not in(SELECT id_pelayanan from history_pelayanan_ugd)")->result();
                                            if ($poli > 0) {
                                                $ppn = $apotik * 0.11;
                                                $apotikppn = $apotik + $ppn;

                                            ?>
                                                <tr class="txt-dark">
                                                    <td> </td>
                                                    <td> </td>
                                                    <td>Subtotal</td>
                                                    <td><?php echo "<b>Rp " . number_format($apotik, 0, ',', '.') . "</b>";   ?></td>
                                                </tr>
                                                <tr class="txt-dark">
                                                    <td> </td>
                                                    <td> </td>
                                                    <td>PPN Keluaran</td>
                                                    <td><?php echo "<b>Rp " . number_format($ppn, 0, ',', '.') . "</b>";   ?></td>
                                                </tr>
                                                <tr class="txt-dark">
                                                    <td> </td>
                                                    <td> </td>
                                                    <td>Total</td>
                                                    <td><?php echo "<b>Rp " . number_format($apotikppn, 0, ',', '.') . "</b>";   ?></td>
                                                </tr>
                                            <?php } else { ?>
                                                <tr class="txt-dark">
                                                    <td> </td>
                                                    <td> </td>
                                                    <td>Total</td>
                                                    <td><?php echo "<b>Rp " . number_format($apotik, 0, ',', '.') . "</b>";   ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $apotik = 0;
                                    $ppn = 0;
                                    $apotikppn = 0;
                                }
                                if (count($data_operasi) > 0) { ?>
                                    <h4 class="panel-title txt-dark"> OBAT OPERASI</h4>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>
                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $obatok = 0;
                                            foreach ($data_operasi as $row) { ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>
                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php
                                                $obatok += $harga * $row['frek'];
                                            } ?>
                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($obatok, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                <?php } else {
                                    $obatok = 0;
                                }
                                if (count($data_igd) > 0) { ?>

                                    <h6 class="panel-title txt-dark"> IGD</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>
                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $igd = 0;
                                            foreach ($data_igd as $row) { ?>

                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'] . " " . $row['dokter'];   ?></td>
                                                    <td width="10%"><?php
                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $igd += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($igd, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                <?php } else {
                                    $igd = 0;
                                }
                                if (count($data_labor) > 0) { ?>
                                    <h6 class="panel-title txt-dark">LABORATORIUM</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>
                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $labor = 0;
                                            foreach ($data_labor as $row) { ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>
                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $labor += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($labor, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $labor = 0;
                                }
                                if (count($data_radio) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">RADIOLOGI</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>

                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $radio = 0;
                                            foreach ($data_radio as $row) {

                                            ?>

                                                <tr class="txt-dark">
                                                    <td width="60%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $radio += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($radio, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $radio = 0;
                                }
                                if (count($data_anak) > 0) { ?>
                                    <h6 class="panel-title txt-dark">POLI ANAK</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $anak = 0;
                                            foreach ($data_anak as $row) {

                                            ?>

                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $anak += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($anak, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $anak = 0;
                                }  ?>
                                <?php
                                if (count($data_apelkes) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">APELKES</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $apelkes = 0;
                                            foreach ($data_apelkes as $row) {

                                            ?>

                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama']    ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $apelkes += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($apelkes, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $apelkes = 0;
                                }   ?>

                                <?php
                                if (count($data_internis) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI PENYAKIT DALAM</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $internis = 0;
                                            foreach ($data_internis as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $internis += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($internis, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $internis = 0;
                                }
                                ?>
                                <?php
                                if (count($data_bedah) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI BEDAH</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $bedah = 0;
                                            foreach ($data_bedah as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $bedah += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($bedah, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $bedah = 0;
                                }
                                if (count($data_fisio) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI REHABILITASI MEDIC</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $fisio = 0;
                                            foreach ($data_fisio as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $fisio += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($fisio, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $fisio = 0;
                                }
                                if (count($data_gigi) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI GIGI</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $gigi = 0;
                                            foreach ($data_gigi as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $gigi += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($gigi, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $gigi = 0;
                                }
                                if (count($data_jantung) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI JANTUNG</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $jantung = 0;
                                            foreach ($data_jantung as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php
                                                                    if ($row['total'] / $row['frek'] < 300) {
                                                                        $harga_satuan = 300;
                                                                    } else {
                                                                        $harga_satuan = $row['total'] / $row['frek'];
                                                                    }
                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $jantung += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($jantung, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $jantung = 0;
                                }
                                if (count($data_kulit) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI KULIT</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $kulit = 0;
                                            foreach ($data_kulit as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $kulit += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($kulit, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $kulit = 0;
                                }
                                if (count($data_mata) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI MATA</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $mata = 0;
                                            foreach ($data_mata as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $mata += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($mata, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $mata = 0;
                                }
                                if (count($data_obgyne) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI OBGYNE</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $obgyne = 0;
                                            foreach ($data_obgyne as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $obgyne += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($obgyne, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $obgyne = 0;
                                }
                                if (count($data_ok) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">KAMAR OPERASI</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $ok = 0;
                                            foreach ($data_ok as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $ok += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($ok, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $ok = 0;
                                }
                                if (count($data_tht) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI THT</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $tht = 0;
                                            foreach ($data_tht as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $tht += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($tht, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $tht = 0;
                                }
                                if (count($data_umum) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI UMUM</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $umum = 0;
                                            foreach ($data_umum as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $umum += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($umum, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $umum = 0;
                                }

                                if (count($data_akp) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI AKUPUNTUR MEDIK</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $akp = 0;
                                            foreach ($data_akp as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $akp += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($akp, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $akp = 0;
                                }

                                if (count($data_bdm) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI BEDAH UMUM</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $bdm = 0;
                                            foreach ($data_bdm as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $bdm += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($bdm, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $bdm = 0;
                                }

                                if (count($data_jiwa) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI KESEHATAN JIWA</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $jiwa = 0;
                                            foreach ($data_jiwa as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $jiwa += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($jiwa, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $jiwa = 0;
                                }

                                if (count($data_ort) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI ORTHOPEDI</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $ort = 0;
                                            foreach ($data_ort as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $ort += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($ort, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $ort = 0;
                                }

                                if (count($data_paru) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI PARU</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $paru = 0;
                                            foreach ($data_paru as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $paru += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($paru, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $paru = 0;
                                }

                                if (count($data_hd) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI HEMODIALISA</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $hd = 0;
                                            foreach ($data_hd as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $hd += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($hd, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $hd = 0;
                                }

                                if (count($data_saraf) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI SARAF</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $saraf = 0;
                                            foreach ($data_saraf as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $saraf += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($hd, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $saraf = 0;
                                }

                                if (count($data_uro) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI UROLOGI</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $uro = 0;
                                            foreach ($data_uro as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $uro += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($uro, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $uro = 0;
                                }

                                if (count($data_ginjal) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI GINJAL</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $ginjal = 0;
                                            foreach ($data_ginjal as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $ginjal += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($ginjal, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $ginjal = 0;
                                }

                                if (count($data_pnm) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI PENYAKIT MULUT</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $pnm = 0;
                                            foreach ($data_pnm as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $pnm += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($pnm, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $pnm = 0;
                                }

                                if (count($data_rehab) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI REHABILITASI MEDIK</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>
                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $rehab = 0;
                                            foreach ($data_rehab as $row) {

                                            ?>
                                                <tr class="txt-dark">
                                                    <td width="70%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $rehab += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($rehab, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $rehab = 0;
                                }
                                if (count($data_transportasi) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">TRANSPORTASI</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>

                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $trasnportasi = 0;
                                            foreach ($data_transportasi as $row) {

                                            ?>

                                                <tr class="txt-dark">
                                                    <td width="60%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $trasnportasi += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($trasnportasi, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $trasnportasi = 0;
                                }
                                if (count($data_kia) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">POLI KIA</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>

                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $kia = 0;
                                            foreach ($data_kia as $row) {

                                            ?>

                                                <tr class="txt-dark">
                                                    <td width="60%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $kia += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($kia, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $kia = 0;
                                }
                                if (count($data_kemo) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">KEMOTERAPI</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>KETERANGAN</th>

                                                <th>HARGA SATUAN</th>
                                                <th>QTY</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $kemo = 0;
                                            foreach ($data_kemo as $row1) {

                                            ?>

                                                <tr class="txt-dark">
                                                    <td width="60%"><?php echo $row1['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row1['total'] / $row1['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row1['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row1['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $kemo += $harga * $row1['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($kemo, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $kemo = 0;
                                }
                                if (count($data_lain) > 0) {
                                ?>
                                    <h6 class="panel-title txt-dark">PENUNJANG LAINNYA</h6>
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>

                                                <th>NAMA TINDAKAN</th>

                                                <th>HARGA SATUAN</th>
                                                <th>FREK</th>
                                                <th>TOTAL HARGA</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $lain = 0;
                                            foreach ($data_lain as $row) {

                                            ?>

                                                <tr class="txt-dark">
                                                    <td width="60%"><?php echo $row['nama'];   ?></td>

                                                    <td width="10%"><?php

                                                                    $harga = $row['total'] / $row['frek'];
                                                                    echo "Rp " . number_format($harga, 0, ',', '.');   ?></td>
                                                    <td width="10%"><?php echo $row['frek'];   ?></td>
                                                    <td width="10%"><?php echo "Rp " . number_format($harga * $row['frek'], 0, ',', '.');   ?></td>
                                                </tr>
                                            <?php $lain += $harga * $row['frek'];
                                            }
                                            ?>

                                            <tr class="txt-dark">
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td>Total</td>
                                                <td><?php echo "<b>Rp " . number_format($lain, 0, ',', '.') . "</b>";   ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    $lain = 0;
                                }

                                ?>
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h4 class="panel-title txt-dark">Total</h4>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body" style="float: right;">
                                        <div class="table-wrap">
                                            <div class="table-responsive">
                                                <table id="datable_1" class="table table-hover display  pb-30">

                                                    <tbody>
                                                        <?php
                                                        $total_semua = $total_pelayanan + $apotikppn + $obatok + $igd + $labor + $radio + $anak
                                                            + $apelkes + $bedah + $fisio + $gigi + $mata + $obgyne + $ok + $tht + $kulit + $jantung
                                                            + $internis + $umum + $akp + $bdm + $jiwa + $ort + $paru + $hd + $saraf + $uro + $ginjal
                                                            + $pnm + $rehab + $trasnportasi;
                                                        if (count($kasir) > 0) {
                                                            foreach ($kasir as $kasir) {
                                                                $diskon = $kasir['diskon'];
                                                                $dp =  $kasir['dp'];
                                                                $staff =  $kasir['staff'];
                                                            }
                                                        } else {
                                                            $diskon = 0;
                                                            $dp =  0;
                                                            $staff = $staff = $this->session->userdata('data_auth')->nama;
                                                        }
                                                        ?>
                                                        <tr class="txt-dark" width="30%">
                                                            <td> </td>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td>Total Bayar </td>
                                                            <td><?php echo "<b>Rp " . number_format($total_semua, 0, ',', '.') . "</b>";   ?>
                                                            </td>
                                                        </tr>
                                                        <tr class="txt-dark" width="30%">
                                                            <td> </td>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td>DISC </td>
                                                            <td><?php echo "<b>Rp " . number_format($diskon, 0, ',', '.') . "</b>";   ?>
                                                            </td>
                                                        </tr>
                                                        <tr class="txt-dark" width="30%">
                                                            <td> </td>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td>DP </td>
                                                            <td><?php echo "<b>Rp " . number_format($dp, 0, ',', '.') . "</b>";   ?>
                                                            </td>
                                                        </tr>
                                                        <!-- <tr class="txt-dark" width="30%">
                                                        <td> </td>
                                                        <td> </td>
                                                        <td> </td>
                                                        <td>PPN KELUARAN </td>
                                                        <td><?php
                                                            $ppn = $apotik * 0.11;
                                                            echo "<b>Rp " . number_format($ppn, 0, ',', '.') . "</b>";   ?>
                                                        </td>
                                                    </tr> -->
                                                        <tr class="txt-dark" width="30%">
                                                            <td> </td>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td>TOTAL BAYAR </td>

                                                            <td><?php echo "<b>Rp " . number_format(($total_semua - $dp - $diskon), 0, ',', '.') . "</b>";   ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="panel panel-default card-view"> -->
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h5> No NPWP : 71.785.977.1-304.000 </h5>
                                        <h4 class="panel-title txt-dark">PETUGAS KASIR</h4>
                                        <?php
                                        echo $staff;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content" id="sep" style="page-break-after:always;">

        <?php if (preg_match('/BPJS/i', $pasien['cara_bayar']) && $pasien['cara_bayar'] != 'BPJSTK') { ?>
            <?php
            $id = $pasien['no_sep'];
            $headers = generate_headers();
            $key = generate_key();
            $url = base_vclaim() . "SEP/" . $id;
            $sep = get($url, $headers);
            //print_arr($data['metaData']);
            if ($sep['metaData']['code'] == 200) {

                $decript = stringDecrypt($key, $sep['response']);
                //print_arr($decript);

                $response = json_decode(decompress($decript), true);

                if (($response['noRujukan'] != null || $response['noRujukan'] != "") && $response['jnsPelayanan'] != "Rawat Inap") {
                    $url1 = base_vclaim() . "Rujukan/" . $response['noRujukan'];
                    $url3 = base_vclaim() . "Rujukan/RS/" . $response['noRujukan'];
                    $sep1 = get($url1, $headers);
                    $sep3 = get($url3, $headers);
                    // print_arr($data1['metaData']);
                    if ($sep1['metaData']['code'] == 200) {
                        $decript1 = stringDecrypt($key, $sep1['response']);
                        // print_arr($decript);

                        $response1 = json_decode(decompress($decript1), true);
                        $sep_data['rujukan'] = $response1['rujukan']['provPerujuk']['nama'];
                    } else if ($sep3['metaData']['code'] == 200) {

                        $decript3 = stringDecrypt($key, $sep3['response']);
                        $response3 = json_decode(decompress($decript3), true);
                        $sep_data['rujukan'] = $response3['rujukan']['provPerujuk']['nama'];
                    } else {
                        $sep_data['rujukan'] = "RS BAKTI TIMAH - KAB. TJ BALAI KARIMUN";
                    }
                } else {
                    $sep_data['rujukan'] = "RS BAKTI TIMAH - KAB. TJ BALAI KARIMUN";
                }

                $url2 = base_vclaim() . "/Peserta/nokartu/" . $response['peserta']['noKartu'] . "/tglSEP/" . $response['tglSep'];
                $sep2 = get($url2, $headers);
                if ($sep2['metaData']['code'] == 200) {
                    $decript2 = stringDecrypt($key, $sep2['response']);
                    $response2 = json_decode(decompress($decript2), true);
                    $sep_data['noTelepon'] = $response2['peserta']['mr']['noTelepon'];
                    $sep_data['hakKelas'] = $response2['peserta']['hakKelas']['keterangan'];
                    $sep_data['prb'] = $response2['peserta']['informasi']['prolanisPRB'];
                }
                $sep_data['data'] = $response;


                $this->load->view('print/cetak_sep_bpjs', $sep_data);
            }
            ?>
        <?php } else { ?>
            <script type="text/javascript">
                document.getElementById('sep').style.display = 'none';
            </script>
        <?php } ?>
    </div>
    <!-- <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script> -->
    <script type="text/javascript">
        $(document).ready(function() {
            window.myFunction = function() {};
            let ajaxCount = 1; // Jumlah permintaan AJAX
            let successCount = 0;

            function checkAndPrint() {
                successCount++;
                if (successCount === ajaxCount) {
                    window.print();
                }
            }

            $.ajax({
                url: "<?php echo base_url() ?>Erm_resume_pulang/get_data_resume",
                success: checkAndPrint
            });
            // window.print();
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