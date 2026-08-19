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
        <table class="a" style="width: 100%">
            <tr>
                <td>
                <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 150px;">
                </td>



                <td>
                    <h6>
                        <p><b>RS. Bakti Timah</b></p>
                        <p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                        <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                        <p>Telp. 0717 9100844, Fax. 0715 32165</p>
                    </h6>

                </td>

                <td width="90">
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                </td>
                <td>
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                </td>
                <td width="100">
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                </td>
            </tr>

        </table>



        <center><b>FORMULIR TRANSFER/RUJUK PASIEN ANTAR RUMAH SAKIT</b></center>
        <center>RINGKASAN PASIEN YANG DILAKUKAN TRANSFER / RUJUKAN KE RUMAH SAKIT LAIN</center>
        <hr>
        <!--table 1-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td colspan="2"><b>IDENTITAS PASIEN</b></td>
            </tr>
            <tr>
                <td>Nama Pasien : <?= $data['nama'] ?></td>
                <td>DPJP : <?= $data['dpjp'] ?></td>
            </tr>

            <tr>
                <td>Tanggal Lahir / Umur : <?= date('d-M-Y', strtotime($data['tgl_lahir'])) ?> / <?php
                                                                                                    $tanggal = new DateTime($data['tgl_lahir']);
                                                                                                    $today = new DateTime();
                                                                                                    $y = $today->diff($tanggal)->y;
                                                                                                    $m = $today->diff($tanggal)->m;
                                                                                                    $d = $today->diff($tanggal)->d;
                                                                                                    echo  $y . " tahun ";  ?></td>
                <td>Ruangan/kelas dirawat : </td>
            </tr>

            <tr>
                <td>Tanggal Masuk RS : <?= date('d-M-Y', strtotime($data['tgl_masuk'])) ?></td>
                <td>Rumah Sakit Tujuan : <?= $data['rs_tujuan'] ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
            </tr>

        </table>

        <!--end table 1-->

        <!--table2-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td colspan="2">Staf yang melakukan kontak</td>
                <td>tgl/jam</td>
                <td><?= date('d-M-Y', strtotime($data['tanggal'])) ?> / <?= date('H:i', strtotime($data['tanggal'])) ?></td>
                <td colspan="3">Staf yang menerima kontak</td>
            </tr>
            <tr>
                <td>Nama : </td>
                </td>
                <td colspan="3"><?= $data['staff'] ?></td>
                <td>Nama : </td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td>Berangkat dari RS Bakti Timah Pangkal Pinang Jam : </td>
                </td>
                <td colspan="3"><?= $data['jam_brgkt'] ?></td>
                <td>Tiba di RS Tujuam Jam : </td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="7"><b>ALASAN MERUJUK</b></td>
            </tr>

        </table>
        <!--end table 2-->

        <!--table bonus-->

        <table width=100% class="table1" cellspacing=0>

            <tr>
                <td width=15%>
                    &nbsp; Klinikal
                </td>
                <td>
                    :
                </td>
                <td>
                    <?= $data['klinikal'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp; Non Klinikal
                </td>
                <td>
                    :
                </td>
                <td>
                    <?= $data['non_klinik'] ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>

        </table>
        <!--end table bonus-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td width=30%><b>DIAGNOSA MEDIS : </b></td>
                <td colspan="3">
                    <?= $data['diagnosis'] ?>
                </td>
            </tr>
            <tr>
                <td width=30%><b>DOKTER YANG MERUJUK : </b></td>
                <td colspan="3">
                    <?= $data['dok_rujuk'] ?>
                </td>
            </tr>
        </table>
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="4"><b>CATATAN KLINIK </b></td>
            </tr>
            <tr>
                <td width=30%><b>1. Riwayat Alergi </b></td>
                <td><?php if ($data['riwayat_alergi'] == 'Tidak') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?>Tidak</td>
                <td><?php if ($data['riwayat_alergi'] != 'Tidak') { ?><span>&#10004;</span><?php echo 'Ada : ' . $data['riwayat_alergi'];
                                                                                        } else { ?><span>__</span>Ada : <?php } ?></td>
            </tr>
            <tr>
                <td width=30%><b>2. Riwayat Penyakit </b></td>
                <td colspan="3">
                    <?= $data['riwayat_penyakit'] ?>
                </td>
            </tr>
            <tr>
                <td width=30%><b>3. Intake Oral Terakhir </b></td>
                <td colspan="3">
                    <?= $data['inTakeOral'] ?>
                </td>
            </tr>
            <tr>
                <td colspan="4"><b>4. Pengobatan </b></td>
            </tr>
        </table>
        <table width=100% class="table2" cellspacing=0>


            <tr class=garisbawah>
                <td class=gariskanan>
                    <center>Nama Obat</center>
                </td>
                <td width="150" class=gariskanan>
                    <center>Frekuensi</center>
                </td>
                <td>
                    <center>Jam</center>
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
                            <center><?= $row->frek ?></center>
                        </td>
                        <td class=gariskanan>
                            <center><?= $row->tanggal ?></center>
                        </td>
                    </tr>

                <?php }
            } else { ?>

                <tr width="90">
                    <td colspan="3" class=gariskanan>
                        <center>Tidak ada data</center>
                    </td>
                </tr>
            <?php } ?>

        </table>
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td width=30%><b>5. Pemeriksaan Penunjang </b></td>
                <td colspan="3"><?= $data['periksa'] ?></td>
            </tr>
            <tr>
                <td colspan="4"><b>6. Tindakan Yang Telah Dilakukan </b></td>
            </tr>
            <tr>
                <td colspan="4"><?= $data['tindakan'] ?></td>
            </tr>
        </table>
        <!--table 3-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="4"><b>KONDISI PASIEN SAAT AKAN DIRUJUK</b></td>
            </tr>
            <tr>
                <td width="50"><b>Kesadaran:</b>&nbsp;&nbsp;&nbsp;</td>
                <td>GCS : <?= $data['gcs'] ?></td>
                <td>E : <?= $data['kes_e'] ?> </td>
                <td>M : <?= $data['kes_m'] ?></td>
                <td>V : <?= $data['kes_v'] ?></td>
            </tr>
            <tr>
                <td width="50"><b>TTV : </b>&nbsp;&nbsp;&nbsp;</td>
                <td>TD : <?= $data['td'] ?> mmHg</td>
                <td>Suhu : <?= $data['suhu'] ?> °C </td>
                <td> Nadi : <?= $data['nadi'] ?> x/mnt</td>
                <td> RR : <?= $data['rr'] ?> x/mnt</td>
            </tr>
        </table>


        <!--end table 3-->

        <!--table bonus-->

        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>
            <tr>
                <td width=32%><b>Pasien Memakai Peralatan Medis : </b></td>
                <td colspan="4"><?= $data['alat'] ?></td>
            </tr>
        </table>
        <!--end table bonus-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>
            <tr>
                <td width=32%><b>Pasien Memakai Peralatan Medis : </b></td>
                <td colspan="4"><?= $data['alat'] ?></td>
            </tr>
        </table>
        <!--table bonus lagi-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>
            <tr>
                <td><b>PERAWATAN LANJUT YANG DIBUTUHKAN : </b></td>
            </tr>
            <tr>
                <td colspan="4"><?= $data['perawatan_lanjut'] ?></td>
            </tr>

        </table>
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>
            <tr>
                <td><b>KEJADIAN KLINIS SAAT DILAKUKAN TRANSFER : </b></td>
            </tr>
            <tr>
                <td colspan="4"><?= $data['kejadian'] ?></td>
            </tr>

        </table>
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>
            <tr>
                <td><b>TANGGAL DAN JAM SERAH TERIMA PASIEN : </b></td>
                <!-- <td colspan="4"><?= $data['kejadian'] ?></td> -->
            </tr>
            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>

        </table>



        <!--end table akhir-->

        <!--table untuk ttd-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td colspan="2">
                    <center>Staff Yang Merujuk Pasien</center>
                </td>
                <td colspan="2">
                    <center>Staff Yang Menerima Pasien</center>
                </td>
            </tr>
            <tr height="150">
                <td>
                    <center>(..........................)</center>
                </td>
                <td>
                    <center>(..........................)</center>
                </td>
                <td>
                    <center>(..........................)</center>
                </td>
                <td>
                    <center>(..........................)</center>
                </td>
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
            window.location.href = 'javascript:history.go(-1)';
        }
    </script>
</body>

</html>