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
    <div class="content">

        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td>
                <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 150px;">
                <td width="800">
                    <strong>
                        <center>RINGKASAN RESUME BAYI TABUNG (DISCHARGE SUMMARY)</center>
                    </strong>
                </td>
                </td>
            </tr>
        </table>

        <table width=100% class="table2" cellspacing=0>
            <tr>
                <td width="390" class=gariskanan>
                    <p>Ruang : <?= $data->nama_ruangan ?></p>
                    <p>Kelas : <?= $data->kelas ?></p>
                    <p>Jenis Kelamin : <?= $data->jenis_kelamin ?></p>
                </td>

                <td width="390" class=gariskanan>
                    <p>No.RM : <?= $data->no_rm ?></p>
                    <p>Nama Pasien : <?= $data->nama ?></p>
                    <p>Tanggal Lahir : <?= strftime("%d %B %Y ", strtotime($data->tgl_lahir)); ?></p>
                </td>
            </tr>
        </table>

        <table width=100% class="table2" cellspacing=0>
            <tr>
                <td width=10%>Agama</td>
                <td width=1%>:</td>
                <td><?= $data->agama ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Status Perkawinan</td>
                <td width=1%>:</td>
                <td><?= $data->status ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Alamat Pasien</td>
                <td width=1%>:</td>
                <td><?= $data->alamat ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Dokter</td>
                <td width=1%>:</td>
                <td><?= $data->nama_dokter ?></td>
                </td>
            </tr>
        </table>

        <table width=100% class="table2" cellspacing=0>
            <tr>
                <td width="220" class=gariskanan>
                    <center>Dokter :</center>
                </td>
                <td width="220" class=gariskanan>
                    <center>Tanggal Masuk :</center>
                </td>
                <td width="220" class=gariskanan>
                    <center>Tanggal Keluar :</center>
                </td>
            </tr>
            <tr>
                <td width="220" class=gariskanan>
                    <center><?= $data->nama_dokter ?></center>
                </td>
                <td width="220" class=gariskanan>
                    <center><?= $data->tgl_masuk ?></center>
                </td>
                <td width="220" class=gariskanan>
                    <center><?= $data->keluar_kamar ?></center>
                </td>
            </tr>
        </table>

        <table width=100% class="table2" cellspacing=0>
            <tr>
                <td width=61%>Riwayat Kelahiran/Anamnesa </td>
                <td width=2%>:</td>
                <td><?= $resume_bayi_tabung->riwayat_kelahiran ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Pemeriksaan Fisik </td>
                <td width=2%>:</td>
                <td><?= $resume_bayi_tabung->pemeriksaan_fisik ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Hasil Pemeriksaan Penunjang </td>
                <td width=2%>:</td>
                <td><?= $resume_bayi_tabung->hasil_pemeriksaan_penunjang ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Diagnosa Saat Masuk </td>
                <td width=2%>:</td>
                <td><?= $data->diagnosa ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Porsedur Terapi & Tindakan Yang Telah Di Kerjakan </td>
                <td width=2%>:</td>
                <td><?= $resume_bayi_tabung->prosedur_terapi ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Terapi Obat-obatan Yang Diberikan Termasuk Obat Setelah Pasien Pulang </td>
                <td width=2%>:</td>
                <td><?= $resume_bayi_tabung->terapi_obat_yang_diberikan ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Kondisi / Keadaan Pasien Saat Pulang </td>
                <td width=1%>:</td>
                <td><?= $resume_bayi_tabung->kondisi_pasien_saat_pulang ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Edukasi Yang Sudah Diberikan </td>
                <td width=1%>:</td>
                <td><?= $resume_bayi_tabung->edukasi_yang_sudah_diberikan ?></td>
                </td>
            </tr>
        </table>

        <table width="100%" class="table2" cellspacing=0>
            <tr width="30%">
                <td></td>
                <td width="350px"></td>
                <td>Tanggal & Pukul <?= $resume_bayi_tabung->created_at ?></td>
            </tr>
            <tr width="30%">
                <td></td>
                <td></td>
                <td>Operator</td>
            </tr>
            <tr height=60px></tr>
            <tr width="30%">
                <td></td>
                <td></td>
                <td><?= $data->nama_dokter ?></td>
            </tr>
            <tr width="30%">
                <td></td>
                <td></td>
                <td>Tanda Tangan & Nama Jelas</td>
            </tr>
        </table>

        <script type="text/javascript">
            function simpan() {
                id_pelayanan = $('#inPel').val();
                id_history = $('#inHis').val();
                no_rm = $('#inNoRM').val();
                riwayat_kelahiran = $('#riwayat_kelahiran').val();
                pemeriksaan_fisik = $('#pemeriksaan_fisik').val();
                hasil_pemeriksaan_penunjang = $('#hasil_pemeriksaan_penunjang').val();
                prosedur_terapi = $('#prosedur_terapi').val();
                kondisi_pasien_saat_pulang = $('#kondisi_pasien_saat_pulang').val();
                terapi_obat_yang_diberikan = $('#terapi_obat_yang_diberikan').val();
                edukasi_yang_sudah_diberikan = $('#edukasi_yang_sudah_diberikan').val();
                tanggal_kontrol_kembali = $('#tanggal_kontrol_kembali').val();
                staff = $('#staff').val();


                $.ajax({
                    url: "<?php echo base_url() ?>Erm_resume_bayi_tabung/store",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_pelayanan: id_pelayanan,
                        id_history: id_history,
                        no_rm: no_rm,
                        riwayat_kelahiran: riwayat_kelahiran,
                        pemeriksaan_fisik: pemeriksaan_fisik,
                        hasil_pemeriksaan_penunjang: hasil_pemeriksaan_penunjang,
                        prosedur_terapi: prosedur_terapi,
                        kondisi_pasien_saat_pulang: kondisi_pasien_saat_pulang,
                        terapi_obat_yang_diberikan: terapi_obat_yang_diberikan,
                        edukasi_yang_sudah_diberikan: edukasi_yang_sudah_diberikan,
                        tanggal_kontrol_kembali: tanggal_kontrol_kembali,
                        staff: staff,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            // alert('success');
                            window.location.href = "<?php echo base_url('erm_ranap/form/') ?>" +
                                '<?= urlencode(base64_encode($id_pelayanan)) ?>' +
                                '/' + '<?= urlencode(base64_encode($id_history)) ?>';
                        } else {
                            swal({
                                title: "Gagal!",
                                type: "warning",
                                text: data.status,
                                confirmButtonColor: "#3cb878",
                            });
                        }
                    }
                })
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
    <div class="content">

        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td>
                <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 150px;">
                <td width="800">
                    <strong>
                        <center>RINGKASAN RESUME BAYI TABUNG (DISCHARGE SUMMARY)</center>
                    </strong>
                </td>
                </td>
            </tr>
        </table>

        <table width=100% class="table2" cellspacing=0>
            <tr>
                <td width="390" class=gariskanan>
                    <p>Ruang : <?= $data->nama_ruangan ?></p>
                    <p>Kelas : <?= $data->kelas ?></p>
                    <p>Jenis Kelamin : <?= $data->jenis_kelamin ?></p>
                </td>

                <td width="390" class=gariskanan>
                    <p>No.RM : <?= $data->no_rm ?></p>
                    <p>Nama Pasien : <?= $data->nama ?></p>
                    <p>Tanggal Lahir : <?= strftime("%d %B %Y ", strtotime($data->tgl_lahir)); ?></p>
                </td>
            </tr>
        </table>

        <table width=100% class="table2" cellspacing=0>
            <tr>
                <td width=10%>Agama</td>
                <td width=1%>:</td>
                <td><?= $data->agama ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Status Perkawinan</td>
                <td width=1%>:</td>
                <td><?= $data->status ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Alamat Pasien</td>
                <td width=1%>:</td>
                <td><?= $data->alamat ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Dokter</td>
                <td width=1%>:</td>
                <td><?= $data->nama_dokter ?></td>
                </td>
            </tr>
        </table>

        <table width=100% class="table2" cellspacing=0>
            <tr>
                <td width="220" class=gariskanan>
                    <center>Dokter :</center>
                </td>
                <td width="220" class=gariskanan>
                    <center>Tanggal Masuk :</center>
                </td>
                <td width="220" class=gariskanan>
                    <center>Tanggal Keluar :</center>
                </td>
            </tr>
            <tr>
                <td width="220" class=gariskanan>
                    <center><?= $data->nama_dokter ?></center>
                </td>
                <td width="220" class=gariskanan>
                    <center><?= $data->tgl_masuk ?></center>
                </td>
                <td width="220" class=gariskanan>
                    <center><?= $data->keluar_kamar ?></center>
                </td>
            </tr>
        </table>

        <table width=100% class="table2" cellspacing=0>
            <tr>
                <td width=61%>Riwayat Kelahiran/Anamnesa </td>
                <td width=2%>:</td>
                <td><?= $resume_bayi_tabung->riwayat_kelahiran ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Pemeriksaan Fisik </td>
                <td width=2%>:</td>
                <td><?= $resume_bayi_tabung->pemeriksaan_fisik ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Hasil Pemeriksaan Penunjang </td>
                <td width=2%>:</td>
                <td><?= $resume_bayi_tabung->hasil_pemeriksaan_penunjang ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Diagnosa Saat Masuk </td>
                <td width=2%>:</td>
                <td><?= $data->diagnosa ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Porsedur Terapi & Tindakan Yang Telah Di Kerjakan </td>
                <td width=2%>:</td>
                <td><?= $resume_bayi_tabung->prosedur_terapi ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Terapi Obat-obatan Yang Diberikan Termasuk Obat Setelah Pasien Pulang </td>
                <td width=2%>:</td>
                <td><?= $resume_bayi_tabung->terapi_obat_yang_diberikan ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Kondisi / Keadaan Pasien Saat Pulang </td>
                <td width=1%>:</td>
                <td><?= $resume_bayi_tabung->kondisi_pasien_saat_pulang ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Edukasi Yang Sudah Diberikan </td>
                <td width=1%>:</td>
                <td><?= $resume_bayi_tabung->edukasi_yang_sudah_diberikan ?></td>
                </td>
            </tr>
        </table>

        <table width="100%" class="table2" cellspacing=0>
            <tr width="30%">
                <td></td>
                <td width="350px"></td>
                <td>Tanggal & Pukul <?= $resume_bayi_tabung->created_at ?></td>
            </tr>
            <tr width="30%">
                <td></td>
                <td></td>
                <td>Operator</td>
            </tr>
            <tr height=60px></tr>
            <tr width="30%">
                <td></td>
                <td></td>
                <td><?= $data->nama_dokter ?></td>
            </tr>
            <tr width="30%">
                <td></td>
                <td></td>
                <td>Tanda Tangan & Nama Jelas</td>
            </tr>
        </table>

        <script type="text/javascript">
            function simpan() {
                id_pelayanan = $('#inPel').val();
                id_history = $('#inHis').val();
                no_rm = $('#inNoRM').val();
                riwayat_kelahiran = $('#riwayat_kelahiran').val();
                pemeriksaan_fisik = $('#pemeriksaan_fisik').val();
                hasil_pemeriksaan_penunjang = $('#hasil_pemeriksaan_penunjang').val();
                prosedur_terapi = $('#prosedur_terapi').val();
                kondisi_pasien_saat_pulang = $('#kondisi_pasien_saat_pulang').val();
                terapi_obat_yang_diberikan = $('#terapi_obat_yang_diberikan').val();
                edukasi_yang_sudah_diberikan = $('#edukasi_yang_sudah_diberikan').val();
                tanggal_kontrol_kembali = $('#tanggal_kontrol_kembali').val();
                staff = $('#staff').val();


                $.ajax({
                    url: "<?php echo base_url() ?>Erm_resume_bayi_tabung/store",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_pelayanan: id_pelayanan,
                        id_history: id_history,
                        no_rm: no_rm,
                        riwayat_kelahiran: riwayat_kelahiran,
                        pemeriksaan_fisik: pemeriksaan_fisik,
                        hasil_pemeriksaan_penunjang: hasil_pemeriksaan_penunjang,
                        prosedur_terapi: prosedur_terapi,
                        kondisi_pasien_saat_pulang: kondisi_pasien_saat_pulang,
                        terapi_obat_yang_diberikan: terapi_obat_yang_diberikan,
                        edukasi_yang_sudah_diberikan: edukasi_yang_sudah_diberikan,
                        tanggal_kontrol_kembali: tanggal_kontrol_kembali,
                        staff: staff,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            // alert('success');
                            window.location.href = "<?php echo base_url('erm_ranap/form/') ?>" +
                                '<?= urlencode(base64_encode($id_pelayanan)) ?>' +
                                '/' + '<?= urlencode(base64_encode($id_history)) ?>';
                        } else {
                            swal({
                                title: "Gagal!",
                                type: "warning",
                                text: data.status,
                                confirmButtonColor: "#3cb878",
                            });
                        }
                    }
                })
            }
        </script>
</body>

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</html>