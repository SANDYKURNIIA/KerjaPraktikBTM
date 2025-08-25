<!DOCTYPE html>
<html>

<head>
    <title>RESUME PASIEN PULANG</title>
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
            border: 1px solid;

        }


        .table3 {
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
    <div class="content" style="display: block;">

        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td>
                    <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 150px;">
                <td width="800">
                    <strong>
                        <center style="font-size: 18px;">RINGKASAN PASIEN PULANG (DISCHARGE SUMMARY)</center>
                    </strong>
                </td>
                </td>
            </tr>
        </table>
<?php print_arr($pasien);?>
        <table width=100% class="table2" cellspacing=0 height="100">
            <tr>
                <td width="390" class=gariskanan>
                    <p>Ruang : <?= $pasien->nama_ruangan ?> </p>
                    <p>Kelas : <?= $pasien->kelas ?></p>
                    <p>Jenis Kelamin : <?= $pasien->jenis_kelamin ?></p>
                </td>

                <td width="390" class=gariskanan>
                    <p>No.RM : <?= $pasien->no_rm ?></p>
                    <p>Nama Pasien : <?= $pasien->nama ?></p>
                    <p>Tanggal Lahir : <?= strftime("%d %B %Y ", strtotime($pasien->tgl_lahir)); ?></p>
                </td>
            </tr>
        </table>

        <table width=100% class="table2" cellspacing=0 height="100">
            <tr>
                <td width=20%>Agama</td>
                <td width=1%>:</td>
                <td><?= $pasien->agama ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Status Perkawinan</td>
                <td width=1%>:</td>
                <td><?= $pasien->perkawinan ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Alamat Pasien</td>
                <td width=1%>:</td>
                <td><?= $pasien->alamat ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Dokter</td>
                <td width=1%>:</td>
                <td><strong><?= $pasien->nama_dokter ?> </strong> </td>
                </td>
            </tr>

        </table>


        <table width=100% class="table2" cellspacing=0 height="100">
            <tr>
                <td width="220" class=gariskanan>
                    <center> <strong> Dokter : </strong> </center>
                </td>
                <td width="220" class=gariskanan>
                    <center> <strong> Tanggal Masuk : </strong></center>
                </td>
                <td width="220" class=gariskanan>
                    <center> <strong> Tgl. Keluar : </strong> </center>
                </td>
            </tr>
            <tr>
                <td width="220" class=gariskanan>
                    <center> <strong> <?= $pasien->nama_dokter ?> </strong></center>
                </td>
                <td width="220" class=gariskanan>
                    <center> <strong> <?= indo_date_1($pasien->tgl_masuk) ?> </strong> </center>
                </td>
                <td width="220" class=gariskanan>
                    <center> <strong> <?= is_null($pasien->keluar_kamar) ? '-' : indo_date_1($pasien->keluar_kamar) ?> </strong></center>
                </td>
            </tr>


            <table width=100% class="table2" cellspacing=0 height="100">

                <tr>
                    <td width=42%>Alasan/Indikasi Masuk RS </td>
                    <td width=1%>:</td>
                    <td>
                        <div id="keluhan_utama"></div>
                    </td>
                </tr>

            </table>

            <table width="100%" class="table2" cellspacing=0>
                <tr>
                    <td>
                        <b>
                            <font style="font-size: 18px; ">RINGKASAN RIWAYAT PENYAKIT DAN PENEMUAN FISIK PENTING</font>
                        </b>
                    </td>
                </tr>

                <tr>
                    <td>Riwayat : <font id="riwayat"></font>
                    </td>

                </tr>
                <tr>
                    <td>Pemeriksaan Fisik :</td>

                </tr>
                <tr>
                    <td>
                        <div id="p_fisik"></div>
                    </td>
                </tr>
                <tr>
                    <td>Hasil Pemeriksaan Penunjang :</td>

                </tr>
                <tr>
                    <td>Diagnosa Saat Masuk : <font id="diagnosa"></font>
                    </td>

                </tr>
                <tr>
                    <td>Diagnosa Utama Yang Ditegakkan : <font id="diagnosa_utama"></font>
                    </td>


                </tr>
                <tr>
                    <td>Diagnosa Sekunder :</td>

                </tr>
                <tr>
                    <td>
                        <table width=100% class="table1" cellspacing=0>
                            <tr class="garisbawah" height="60">
                                <td class=gariskanan>
                                    <center>Kode</center>
                                </td>
                                <td class=gariskanan>
                                    <center>Nama</center>
                                </td>


                            </tr>
                            <?php if (count($diagnosa_sekunder) > 0) {
                                foreach ($diagnosa_sekunder as $row1) { ?>
                                    <tr width="90">
                                        <td class=gariskanan>
                                            <center><?= $row1->kode ?></center>
                                        </td>
                                        <td class=gariskanan>
                                            <center><?= $row1->nama_diagnosa ?></center>
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
                    </td>
                </tr>
                <tr height='30px'>
                    <td></td>
                </tr>
                <tr>
                    <td>Prosedur Terapi & Tindakan Yang Telah Dikerjakan : <font id="prosedure_terapi"></font>
                    </td>
                </tr>

                <tr>
                    <td>Terapi Obat-obatan Yang Diberikan Termasuk Obat Setelah Pasien Pulang :</td>

                </tr>
                <tr>
                    <td>
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
                    </td>
                </tr>
                <tr>
                    <td>Edukasi Yang Sudah Diberikan : <font id="edukasi"></font>
                    </td>
                </tr>
                <tr>
                    <td>Keadaan Pasien Saat Pulang : <?= $pasien->ket_keluar ?></td>

                </tr>

            </table>

            <table width="100%" class="table2" cellspacing=0>

                <tr width="30%">
                    <td></td>
                    <td style="text-align: right;">Dokter Yang Merawat,</td>
                </tr>
                <tr height=60px></tr>
                <tr width="30%">
                    <td></td>
                    <td style="text-align: right;"><strong><?= $pasien->nama_dokter ?></td>
                </tr>
                <!-- <tr width="30%">
                        <td></td>
                        <td></td>
                        <td style="text-align: right; font-size: smaller;">Tanda Tangan & Nama Jelas</td>
                    </tr> -->
            </table>

            <td width="100">
                <strong>
                    <right style="font-size: smaller; font-style: italic;"> *Resume Dibuat Apabila Pasien Keluar Rumah Sakit, Dilampirkan Surat Pengantar</right>
                </strong>
            </td>


        </table>

    </div>

</body>
<!-- <script src="<?= base_url(); ?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url: "<?php echo base_url() ?>Erm_resume_pulang/get_data_resume",
            method: "POST",
            dataType: 'json',
            data: {
                id: '<?= $id_pelayanan ?>',
                id_history: '<?= $id_history ?>',
            },
            success: function(data) {

                $('#keluhan_utama').html(data.alasan);
                $('#riwayat').html(data.resume['riwayat_sekarang']);
                $('#diagnosa').html(data.diagnosa);
                $('#diagnosa_utama').html(data.resume['diagnosa_utama']);
                $('#prosedure_terapi').html(data.resume['terapi']);
                $('#edukasi').html(data.konsul);
                var html = "<table id='t_fisik'>" +
                    "<tr><td>a. Tanda Vital: </td></tr>" +
                    "<tr>" +
                    "<td>GCS : " + data.resume['gcs'] + " </td>" +
                    "<td>E : " + data.resume['e'] + " </td>" +
                    "<td>M : " + data.resume['m'] + " </td>" +
                    "<td>V : " + data.resume['v'] + " </td>" +
                    "</tr>" +
                    "<tr>" +
                    "<td>Tekanan darah : " + data.resume['tekanan_darah'] + " MmHg</td>" +
                    "<td>Suhu : " + data.resume['suhu'] + " &deg;C</td>" +
                    "<td>Nadi : " + data.resume['frequensi_nadi'] + " x/menit</td>" +
                    "<td>Pernafasan : " + data.resume['frequensi_nafas'] + " x/menit</td>" +
                    "</tr>" +
                    "<tr>" +
                    "<td>SPO2 : " + data.resume['spo2'] + " </td>" +
                    "<td>Berat Badan : " + data.resume['berat_badan'] + " kg</td>" +
                    "<td>Tinggi Badan : " + data.resume['tinggi_badan'] + " cm</td>" +
                    "<td></td>" +
                    "</tr>" +
                    "</table>";
                $('#p_fisik').html(html).attr("style", "color:black");
                $('.content').show();
            }

        });
    });
</script>

</html>