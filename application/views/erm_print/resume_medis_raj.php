<<<<<<< HEAD
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

        
        .table_pemeriksaan {
            color: black;
            width: 65%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }


        .data-pemeriksaan {
            display: flex;
            align-items: start;
            color: black;
            margin-bottom: 4px;
        }

        .data-pemeriksaan p {
            margin: 0;
        }

        .data-pemeriksaan li{
            width: auto;
            border: none;
            padding: 0;
        }
        
        .data-pemeriksaan ul {
            display: flex;
            flex-direction: column;
            margin: 0;
            padding-left: 5px;
            gap: 3px;
            width: auto;
            border: none;
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
            <!-- BAGIAN 1 -->
            <tr>
                <td colspan="5" style="padding: 10; margin: 0;">
                    1. Anamnesa:
                    <div style="margin-left: 20px; margin-top: 0;">
                        <table style="border-collapse: collapse; margin: 0; padding: 0;">
                            <tr>
                                <td style="padding: 0;">a. Keluhan Utama:</td>
                                <td style="padding-left: 5px;"><?= $data['keluhan_utama'] ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 0;">b. Riwayat Penyakit Dahulu:</td>
                                <td style="padding-left: 5px;"><?= $data['penyakit_past'] ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 0;">c. Riwayat Penyakit Sekarang:</td>
                                <td style="padding-left: 5px;"><?= $data['alloanamnesa'] ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 0;">d. Riwayat Penyakit Keluarga:</td>
                                <td style="padding-left: 5px;"><?= $data['penyakit_keluarga'] ?></td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>

            <!-- SPASI ANTAR BAGIAN -->
            <tr>
                <td colspan="5" style="height: 8px;"></td>
            </tr>

            <!-- BAGIAN 2 -->
            <tr>
                <td colspan="5" style="padding: 10; margin: 0;">
                    2. Riwayat Singkat Dan Pemeriksaan Fisik:
                    <div style="margin-left: 20px; margin-top: 0;">
                        <table style="border-collapse: collapse; margin: 0; padding: 0;">
                            <tr>
                                <td colspan="2" style="padding: 0;">a. Tanda Vital:</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 15px; width: 160px;">Tekanan darah :</td>
                                <td><?= $data['tekanan_darah'] ?> MmHg</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 15px; width: 160px;">Suhu :</td>
                                <td><?= $data['suhu'] ?> &deg;C</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 15px; width: 160px;">Nadi :</td>
                                <td><?= $data['frequensi_nadi'] ?> x/menit</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 15px; width: 160px;">Pernafasan :</td>
                                <td><?= $data['frequensi_nafas'] ?> x/menit</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 15px; width: 160px;">Skala Nyeri :</td>
                                <td><?= $data['skala_nyeri'] ?></td>
                            </tr>
                        </table>

                        <table style="border-collapse: collapse; margin-top: 4px;">
                            <tr>
                                <td style="padding: 0;">b. Pemeriksaan Fisik:</td>
                                <?php if (
                                    $data['kepala'] == "Dalam Batas Normal" &&
                                    $data['hidung'] == "Dalam Batas Normal" &&
                                    $data['mulut'] == "Dalam Batas Normal" &&
                                    $data['leher'] == "Dalam Batas Normal" &&
                                    $data['thorax'] == "Dalam Batas Normal" &&
                                    $data['jantung'] == "Dalam Batas Normal" &&
                                    $data['paru'] == "Dalam Batas Normal" &&
                                    $data['andomen'] == "Dalam Batas Normal" &&
                                    $data['punggung'] == "Dalam Batas Normal" &&
                                    $data['ekstremitas'] == "Dalam Batas Normal"
                                ) { ?>
                                    <td>Dalam Batas Normal</td>
                                <?php } ?>
                            </tr>

                            <?php if ($data['kepala'] != "Dalam Batas Normal") { ?>
                                <tr>
                                    <td style="padding-left: 15px; width: 160px;">Kepala :</td>
                                    <td><?= $data['kepala'] ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ($data['hidung'] != "Dalam Batas Normal") { ?>
                                <tr>
                                    <td style="padding-left: 15px; width: 160px;">Hidung :</td>
                                    <td><?= $data['hidung'] ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ($data['mulut'] != "Dalam Batas Normal") { ?>
                                <tr>
                                    <td style="padding-left: 15px; width: 160px;">Mulut :</td>
                                    <td><?= $data['mulut'] ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ($data['leher'] != "Dalam Batas Normal") { ?>
                                <tr>
                                    <td style="padding-left: 15px; width: 160px;">Leher :</td>
                                    <td><?= $data['leher'] ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ($data['thorax'] != "Dalam Batas Normal") { ?>
                                <tr>
                                    <td style="padding-left: 15px; width: 160px;">Thorax :</td>
                                    <td><?= $data['thorax'] ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ($data['jantung'] != "Dalam Batas Normal") { ?>
                                <tr>
                                    <td style="padding-left: 15px; width: 160px;">Jantung :</td>
                                    <td><?= $data['jantung'] ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ($data['paru'] != "Dalam Batas Normal") { ?>
                                <tr>
                                    <td style="padding-left: 15px; width: 160px;">Paru :</td>
                                    <td><?= $data['paru'] ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ($data['andomen'] != "Dalam Batas Normal") { ?>
                                <tr>
                                    <td style="padding-left: 15px; width: 160px;">Andomen :</td>
                                    <td><?= $data['andomen'] ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ($data['punggung'] != "Dalam Batas Normal") { ?>
                                <tr>
                                    <td style="padding-left: 15px; width: 160px;">Punggung :</td>
                                    <td><?= $data['punggung'] ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ($data['ekstremitas'] != "Dalam Batas Normal") { ?>
                                <tr>
                                    <td style="padding-left: 15px; width: 160px;">Ekstremitas :</td>
                                    <td><?= $data['ekstremitas'] ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </td>
            </tr>

            <!-- SPASI ANTAR BAGIAN -->
            <tr>
                <td colspan="5" style="height: 8px;"></td>
            </tr>

            <!-- BAGIAN 3 -->
            <tr>
                <td colspan="5" style="padding: 10; margin: 0;">
                    3. Pemeriksaan Penunjang/Diagnostik:
                </td>
            </tr>

            <tr>
                <td height="10" colspan=10 style="padding: 0px 15px;">
                    <div class="data-pemeriksaan">
                        <p class="">
                            A. Tindakan Poli :
                        </p>
                        <ul id="list_tindakan_poli">
                            <?php if (!empty($tindakan_poli)) : ?>
                                <?php
                                foreach ($tindakan_poli as $item) : ?>
                                    <li><?=$item->nama_tindakan;?></li>
                                <?php endforeach; ?>
                            <?php else : ?>
                                Tidak ada data
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="data-pemeriksaan">
                        <p class="">
                            B. Radiologi :
                        </p>
                        <ul id="list_radiologi">
                            <?php if (!empty($radiologi)) : ?>
                                <?php
                                foreach ($radiologi as $item) : ?>
                                    <li>
                                        <?= $item->nama; ?>
                                    </li>
                                <?php endforeach; ?>
                            <?php else : ?>
                                Tidak ada data
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="data-pemeriksaan">
                        <p class="">
                            C. Labor :
                        </p>
                        <ul id="list_radiologi">
                            <?php if (!empty($labor)) : ?>
                                <?php
                                foreach ($labor as $item) : ?>
                                <li>
                                    <?= $item->nama_tindakan; ?>
                                </li>
                                <?php endforeach; ?>
                            <?php else : ?>
                                Tidak ada data
                            <?php endif; ?>
                        </ul>
                    </div>
                </td>
            </tr>

            <!-- SPASI ANTAR BAGIAN -->
            <tr>
                <td colspan="5" style="height: 8px;"></td>
            </tr>

            <!-- BAGIAN 4 -->
            <tr>
                <td colspan="5" style="padding: 10; margin: 0;">
                    4. Diagnosa Utama: <?= $data['nama_diagnosa'] ?>
                </td>
            </tr>

            <tr>
                <td height="10" colspan="5">
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
                    <p><?= $data['prosedur_tindakan'] ?? "-" ?> </p>
                </td>
            </tr>

            <tr>
                <td colspan="5" style="padding-top:8px;">7. Ringkasan Keluar :</td>
            </tr>

            <tr>
                <td colspan="5" style="padding-left:20px;">Keadaan Waktu Pulang : <?= !empty($data['keadaan_pulang']) ? $data['keadaan_pulang'] : '-' ?></td>
            </tr>

            <tr>
                <td colspan="5" style="padding-left:20px;">Alasan Pulang : <?= !empty($data['tindak_lanjut']) ? $data['tindak_lanjut'] : '-' ?></td>
            </tr>

            <tr>
                <td colspan="5" style="padding-left:20px;">
                    Hari / Tanggal Kontrol Ke RS :
                    <?php if (!empty($data['tgl_masuk'])) echo date('d-m-Y', strtotime($data['tgl_masuk']));
                    else echo '-'; ?>
                </td>
            </tr>

            <tr>
                <td colspan="5" style="padding-left:20px;">
                    Jam :
                    <?php if (!empty($data['tgl_masuk'])) echo date('H:i:s', strtotime($data['tgl_masuk']));
                    else echo '-'; ?>
                </td>
            </tr>

            <tr>
                <td colspan="5" style="padding-left:20px;">Poliklinik : <?= !empty($data['konsul']) ? $data['konsul'] : '-' ?></td>
            </tr>

            <tr>
                <td colspan="5" style="height:6px;"></td>
            </tr>

            <tr>
                <td colspan="5" style="padding-left:20px;">Edukasi Yang Telah Diberikan :</td>
            </tr>

            <tr>
                <td colspan="5" style="padding-left:20px;">Terapi :</td>
            </tr>


            <!--table baru-->
        </table>
        <table width=100% class="table1" cellspacing=0>
            <tr class="garisbawah" height="60">
                <td class=gariskanan>
                    <center>Nama Obat</center>
                </td>
                <td class=gariskanan>
                    <center>Jumlah</center>
                </td>
                <td class=gariskanan>
                    <center>Signa</center>
                </td>
                <td width="90" class=gariskanan>
                    <center>Cara Pemberian</center>
                </td>

            </tr>
            <?php if (count($terapi) > 0) {
                foreach ($terapi as $row) { ?>
                    <tr width="90">
                        <td class="gariskanan" style="text-align: left; padding-left: 8px;">
                            <?= $row->nama ?>
                        </td>
                        <td class="gariskanan" style="text-align: left; padding-left: 8px;">
                            <?= $row->frek ?>
                        </td>
                        <td class="gariskanan" style="text-align: left; padding-left: 8px;">
                            <?= $row->tindakan ?>
                        </td>
                        <td width="90" class="gariskanan" style="text-align: left; padding-left: 8px;">
                            <?= $row->cara_pemakaian ?>
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

        <table width="100%" class="table1" cellspacing="0" style="margin-top: 20px;">
            <tr>
                <td style="text-align: right; padding-right: 60px;">
                    Pangkal Pinang, <?php echo date('d-m-Y') ?> jam: <?php echo date('H:i:s') ?> WIB
                </td>
            </tr>

            <tr>
                <td style="text-align: right; padding-right: 60px;">
                    Dokter Penanggung Jawab Pelayanan
                </td>
            </tr>

            <tr>
                <td style="text-align: right; padding-right: 60px;">
                    <img src="<?php echo base_url() . 'assets/ttd/cap_rsbt.png'; ?>" width="100px">
                    <img src="<?php echo $ttd; ?>" width="100px">
                </td>
            </tr>

            <tr>
                <td style="text-align: right; padding-right: 60px;">
                    <?= $data['dpjp'] ?>
                </td>
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

=======
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

        
        .table_pemeriksaan {
            color: black;
            width: 65%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }


        .data-pemeriksaan {
            display: flex;
            align-items: start;
            color: black;
            margin-bottom: 4px;
        }

        .data-pemeriksaan p {
            margin: 0;
        }

        .data-pemeriksaan li{
            width: auto;
            border: none;
            padding: 0;
        }
        
        .data-pemeriksaan ul {
            display: flex;
            flex-direction: column;
            margin: 0;
            padding-left: 5px;
            gap: 3px;
            width: auto;
            border: none;
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
            <!-- BAGIAN 1 -->
            <tr>
                <td colspan="5" style="padding: 10; margin: 0;">
                    1. Anamnesa:
                    <div style="margin-left: 20px; margin-top: 0;">
                        <table style="border-collapse: collapse; margin: 0; padding: 0;">
                            <tr>
                                <td style="padding: 0;">a. Keluhan Utama:</td>
                                <td style="padding-left: 5px;"><?= $data['keluhan_utama'] ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 0;">b. Riwayat Penyakit Dahulu:</td>
                                <td style="padding-left: 5px;"><?= $data['penyakit_past'] ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 0;">c. Riwayat Penyakit Sekarang:</td>
                                <td style="padding-left: 5px;"><?= $data['alloanamnesa'] ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 0;">d. Riwayat Penyakit Keluarga:</td>
                                <td style="padding-left: 5px;"><?= $data['penyakit_keluarga'] ?></td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>

            <!-- SPASI ANTAR BAGIAN -->
            <tr>
                <td colspan="5" style="height: 8px;"></td>
            </tr>

            <!-- BAGIAN 2 -->
            <tr>
                <td colspan="5" style="padding: 10; margin: 0;">
                    2. Riwayat Singkat Dan Pemeriksaan Fisik:
                    <div style="margin-left: 20px; margin-top: 0;">
                        <table style="border-collapse: collapse; margin: 0; padding: 0;">
                            <tr>
                                <td colspan="2" style="padding: 0;">a. Tanda Vital:</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 15px; width: 160px;">Tekanan darah :</td>
                                <td><?= $data['tekanan_darah'] ?> MmHg</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 15px; width: 160px;">Suhu :</td>
                                <td><?= $data['suhu'] ?> &deg;C</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 15px; width: 160px;">Nadi :</td>
                                <td><?= $data['frequensi_nadi'] ?> x/menit</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 15px; width: 160px;">Pernafasan :</td>
                                <td><?= $data['frequensi_nafas'] ?> x/menit</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 15px; width: 160px;">Skala Nyeri :</td>
                                <td><?= $data['skala_nyeri'] ?></td>
                            </tr>
                        </table>

                        <table style="border-collapse: collapse; margin-top: 4px;">
                            <tr>
                                <td style="padding: 0;">b. Pemeriksaan Fisik:</td>
                                <?php if (
                                    $data['kepala'] == "Dalam Batas Normal" &&
                                    $data['hidung'] == "Dalam Batas Normal" &&
                                    $data['mulut'] == "Dalam Batas Normal" &&
                                    $data['leher'] == "Dalam Batas Normal" &&
                                    $data['thorax'] == "Dalam Batas Normal" &&
                                    $data['jantung'] == "Dalam Batas Normal" &&
                                    $data['paru'] == "Dalam Batas Normal" &&
                                    $data['andomen'] == "Dalam Batas Normal" &&
                                    $data['punggung'] == "Dalam Batas Normal" &&
                                    $data['ekstremitas'] == "Dalam Batas Normal"
                                ) { ?>
                                    <td>Dalam Batas Normal</td>
                                <?php } ?>
                            </tr>

                            <?php if ($data['kepala'] != "Dalam Batas Normal") { ?>
                                <tr>
                                    <td style="padding-left: 15px; width: 160px;">Kepala :</td>
                                    <td><?= $data['kepala'] ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ($data['hidung'] != "Dalam Batas Normal") { ?>
                                <tr>
                                    <td style="padding-left: 15px; width: 160px;">Hidung :</td>
                                    <td><?= $data['hidung'] ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ($data['mulut'] != "Dalam Batas Normal") { ?>
                                <tr>
                                    <td style="padding-left: 15px; width: 160px;">Mulut :</td>
                                    <td><?= $data['mulut'] ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ($data['leher'] != "Dalam Batas Normal") { ?>
                                <tr>
                                    <td style="padding-left: 15px; width: 160px;">Leher :</td>
                                    <td><?= $data['leher'] ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ($data['thorax'] != "Dalam Batas Normal") { ?>
                                <tr>
                                    <td style="padding-left: 15px; width: 160px;">Thorax :</td>
                                    <td><?= $data['thorax'] ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ($data['jantung'] != "Dalam Batas Normal") { ?>
                                <tr>
                                    <td style="padding-left: 15px; width: 160px;">Jantung :</td>
                                    <td><?= $data['jantung'] ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ($data['paru'] != "Dalam Batas Normal") { ?>
                                <tr>
                                    <td style="padding-left: 15px; width: 160px;">Paru :</td>
                                    <td><?= $data['paru'] ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ($data['andomen'] != "Dalam Batas Normal") { ?>
                                <tr>
                                    <td style="padding-left: 15px; width: 160px;">Andomen :</td>
                                    <td><?= $data['andomen'] ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ($data['punggung'] != "Dalam Batas Normal") { ?>
                                <tr>
                                    <td style="padding-left: 15px; width: 160px;">Punggung :</td>
                                    <td><?= $data['punggung'] ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ($data['ekstremitas'] != "Dalam Batas Normal") { ?>
                                <tr>
                                    <td style="padding-left: 15px; width: 160px;">Ekstremitas :</td>
                                    <td><?= $data['ekstremitas'] ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </td>
            </tr>

            <!-- SPASI ANTAR BAGIAN -->
            <tr>
                <td colspan="5" style="height: 8px;"></td>
            </tr>

            <!-- BAGIAN 3 -->
            <tr>
                <td colspan="5" style="padding: 10; margin: 0;">
                    3. Pemeriksaan Penunjang/Diagnostik:
                </td>
            </tr>

            <tr>
                <td height="10" colspan=10 style="padding: 0px 15px;">
                    <div class="data-pemeriksaan">
                        <p class="">
                            A. Tindakan Poli :
                        </p>
                        <ul id="list_tindakan_poli">
                            <?php if (!empty($tindakan_poli)) : ?>
                                <?php
                                foreach ($tindakan_poli as $item) : ?>
                                    <li><?=$item->nama_tindakan;?></li>
                                <?php endforeach; ?>
                            <?php else : ?>
                                Tidak ada data
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="data-pemeriksaan">
                        <p class="">
                            B. Radiologi :
                        </p>
                        <ul id="list_radiologi">
                            <?php if (!empty($radiologi)) : ?>
                                <?php
                                foreach ($radiologi as $item) : ?>
                                    <li>
                                        <?= $item->nama; ?>
                                    </li>
                                <?php endforeach; ?>
                            <?php else : ?>
                                Tidak ada data
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="data-pemeriksaan">
                        <p class="">
                            C. Labor :
                        </p>
                        <ul id="list_radiologi">
                            <?php if (!empty($labor)) : ?>
                                <?php
                                foreach ($labor as $item) : ?>
                                <li>
                                    <?= $item->nama_tindakan; ?>
                                </li>
                                <?php endforeach; ?>
                            <?php else : ?>
                                Tidak ada data
                            <?php endif; ?>
                        </ul>
                    </div>
                </td>
            </tr>

            <!-- SPASI ANTAR BAGIAN -->
            <tr>
                <td colspan="5" style="height: 8px;"></td>
            </tr>

            <!-- BAGIAN 4 -->
            <tr>
                <td colspan="5" style="padding: 10; margin: 0;">
                    4. Diagnosa Utama: <?= $data['nama_diagnosa'] ?>
                </td>
            </tr>

            <tr>
                <td height="10" colspan="5">
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
                    <p><?= $data['prosedur_tindakan'] ?? "-" ?> </p>
                </td>
            </tr>

            <tr>
                <td colspan="5" style="padding-top:8px;">7. Ringkasan Keluar :</td>
            </tr>

            <tr>
                <td colspan="5" style="padding-left:20px;">Keadaan Waktu Pulang : <?= !empty($data['keadaan_pulang']) ? $data['keadaan_pulang'] : '-' ?></td>
            </tr>

            <tr>
                <td colspan="5" style="padding-left:20px;">Alasan Pulang : <?= !empty($data['tindak_lanjut']) ? $data['tindak_lanjut'] : '-' ?></td>
            </tr>

            <tr>
                <td colspan="5" style="padding-left:20px;">
                    Hari / Tanggal Kontrol Ke RS :
                    <?php if (!empty($data['tgl_masuk'])) echo date('d-m-Y', strtotime($data['tgl_masuk']));
                    else echo '-'; ?>
                </td>
            </tr>

            <tr>
                <td colspan="5" style="padding-left:20px;">
                    Jam :
                    <?php if (!empty($data['tgl_masuk'])) echo date('H:i:s', strtotime($data['tgl_masuk']));
                    else echo '-'; ?>
                </td>
            </tr>

            <tr>
                <td colspan="5" style="padding-left:20px;">Poliklinik : <?= !empty($data['konsul']) ? $data['konsul'] : '-' ?></td>
            </tr>

            <tr>
                <td colspan="5" style="height:6px;"></td>
            </tr>

            <tr>
                <td colspan="5" style="padding-left:20px;">Edukasi Yang Telah Diberikan :</td>
            </tr>

            <tr>
                <td colspan="5" style="padding-left:20px;">Terapi :</td>
            </tr>


            <!--table baru-->
        </table>
        <table width=100% class="table1" cellspacing=0>
            <tr class="garisbawah" height="60">
                <td class=gariskanan>
                    <center>Nama Obat</center>
                </td>
                <td class=gariskanan>
                    <center>Jumlah</center>
                </td>
                <td class=gariskanan>
                    <center>Signa</center>
                </td>
                <td width="90" class=gariskanan>
                    <center>Cara Pemberian</center>
                </td>

            </tr>
            <?php if (count($terapi) > 0) {
                foreach ($terapi as $row) { ?>
                    <tr width="90">
                        <td class="gariskanan" style="text-align: left; padding-left: 8px;">
                            <?= $row->nama ?>
                        </td>
                        <td class="gariskanan" style="text-align: left; padding-left: 8px;">
                            <?= $row->frek ?>
                        </td>
                        <td class="gariskanan" style="text-align: left; padding-left: 8px;">
                            <?= $row->tindakan ?>
                        </td>
                        <td width="90" class="gariskanan" style="text-align: left; padding-left: 8px;">
                            <?= $row->cara_pemakaian ?>
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

        <table width="100%" class="table1" cellspacing="0" style="margin-top: 20px;">
            <tr>
                <td style="text-align: right; padding-right: 60px;">
                    Pangkal Pinang, <?php echo date('d-m-Y') ?> jam: <?php echo date('H:i:s') ?> WIB
                </td>
            </tr>

            <tr>
                <td style="text-align: right; padding-right: 60px;">
                    Dokter Penanggung Jawab Pelayanan
                </td>
            </tr>

            <tr>
                <td style="text-align: right; padding-right: 60px;">
                    <img src="<?php echo base_url() . 'assets/ttd/cap_rsbt.png'; ?>" width="100px">
                    <img src="<?php echo $ttd; ?>" width="100px">
                </td>
            </tr>

            <tr>
                <td style="text-align: right; padding-right: 60px;">
                    <?= $data['dpjp'] ?>
                </td>
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

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
