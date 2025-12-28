<!DOCTYPE html>
<html>

<head>
    <title>One Day Care & One Day Surgery</title>

    <!-- jQuery + SweetAlert2 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .mt-10 {
            margin-top: 10px;
        }

        .mt-20 {
            margin-top: 20px;
        }

        .mb-10 {
            margin-bottom: 10px;
        }

        .mb-20 {
            margin-bottom: 20px;
        }

        textarea,
        input[type="text"] {
            width: 100%;
        }

        .dokter-group {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <style>
        /* Warna zona total EWS */
        .ews-merah {
            background-color: #e74c3c;
            color: #fff;
            font-weight: bold;
            text-align: center;
        }

        .ews-oranye {
            background-color: #e67e22;
            color: #fff;
            font-weight: bold;
            text-align: center;
        }

        .ews-kuning {
            background-color: #f1c40f;
            color: #fff;
            font-weight: bold;
            text-align: center;
        }

        .ews-hijau {
            background-color: #1abc9c;
            color: #fff;
            font-weight: bold;
            text-align: center;
        }
    </style>

    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default card-view">

                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">PENILAIAN PEDIATRIC EARLY WARNING SYSTEM (PEWS)</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-wrapper collapse in">
                    <div class="panel-body">

                        <div class="form-wrap">
                            <form id="formPewsAnak" action="<?= base_url('pews_anak/simpan') ?>" method="POST">

                                <input type="hidden" name="id_pelayanan" id="id_pelayanan" value="<?= $id_pelayanan ?? '' ?>">
                                <input type="hidden" name="id_history" id="id_history" value="<?= $id_history ?? '' ?>">
                                <input type="hidden" name="no_rm" value="<?= $data->no_rm ?? '' ?>">
                                <input type="hidden" id="id_pws" name="id_pws">


                                <input type="hidden" name="skor" id="skorHidden">
                                <input type="hidden" name="tipe_resiko" id="tipeResikoHidden">


                                <!-- Identitas Pasien -->
                                <div class="form-group">

                                    <div class="col-md-3 mb-10">
                                        <label class="control-label">No. RM</label>
                                        <input type="text" class="form-control" value="<?= $data->no_rm ?? '-' ?>" disabled>
                                    </div>

                                    <div class="col-md-3 mb-10">
                                        <label class="control-label">Nama Pasien</label>
                                        <input type="text" class="form-control" value="<?= $data->nama ?? '-' ?>" disabled>
                                    </div>

                                    <div class="col-md-3 mb-10">
                                        <label class="control-label text-left">Umur</label>
                                        <input type="text" class="form-control" value="<?= $data->umur ?? '-' ?>" disabled>
                                    </div>

                                    <div class="col-md-3 mb-10">
                                        <label class="control-label">Jenis Kelamin</label>
                                        <input type="text" class="form-control" value="<?= $data->jenis_kelamin ?? '-' ?>" disabled>
                                    </div>

                                </div>
                        </div>

                        <!-- a. Perilaku -->
                        <div class="form-group col-md-8">
                            <div class="col-md-8">
                                <label class="control-label mb-4 text-left row">a. Perilaku</label>
                                <span id="jatuh_error" class="text-danger"></span>

                                <div class="radio-button radio-button-primary">
                                    <input id="perilaku1" type="radio" name="perilaku" value="Bermain / Aktivitas sesuai usia" data-exclude="true">
                                    <label class="control-label" for="perilaku1">Bermain / Aktivitas sesuai usia (0)</label>
                                </div>

                                <div class="radio-button radio-button-primary">
                                    <input id="perilaku2" type="radio" name="perilaku" value="Rewel, Mudah ditenangkan" data-exclude="true">
                                    <label class="control-label" for="perilaku2">Rewel, Mudah ditenangkan (1)</label>
                                </div>

                                <div class="radio-button radio-button-primary">
                                    <input id="perilaku3" type="radio" name="perilaku" value="Rewel, Sulit ditenangkan" data-exclude="true">
                                    <label class="control-label" for="perilaku3">Rewel, Sulit ditenangkan (2)</label>
                                </div>

                                <div class="radio-button radio-button-primary">
                                    <input id="perilaku4" type="radio" name="perilaku" value="Letargis" data-exclude="true">
                                    <label class="control-label" for="perilaku4">Letargis (3)</label>
                                </div>
                            </div>
                        </div>

                        <!-- b. Kardiovaskular -->
                        <div class="form-group col-md-8">
                            <div class="col-md-10">
                                <label class="control-label mb-4 text-left row">b. Kardiovaskular</label>
                                <span id="jatuh_error" class="text-danger"></span>

                                <div class="radio-button radio-button-primary">
                                    <input id="kardiovaskular1" type="radio" name="kardiovaskular" value="Merah, Waktu Pengisian kapiler(CRT) < 2 Detik" data-exclude="true">
                                    <label class="control-label" for="kardiovaskular1">Merah, Waktu Pengisian kapiler(CRT) < 2 Detik (0)</label>
                                </div>

                                <div class="radio-button radio-button-primary">
                                    <input id="kardiovaskular2" type="radio" name="kardiovaskular" value="Pucat, atau CRT > 3 detik, atau Nadi >= di atas normal" data-exclude="true">
                                    <label class="control-label" for="kardiovaskular2">Pucat, atau CRT > 3 detik, atau Nadi >= di atas normal (1)</label>
                                </div>

                                <div class="radio-button radio-button-primary">
                                    <input id="kardiovaskular3" type="radio" name="kardiovaskular" value="Pucat, atau CRT > 4 detik, atau Nadi >= 20 di atas normal, atau Diaforesis" data-exclude="true">
                                    <label class="control-label" for="kardiovaskular3">Pucat, atau CRT > 4 detik, atau Nadi >= 20 di atas normal, atau Diaforesis (2)</label>
                                </div>

                                <div class="radio-button radio-button-primary">
                                    <input id="kardiovaskular4" type="radio" name="kardiovaskular" value="Kulit marmorata, atau CRT > 5 detik, atau Nadi >= 30 di atas normal, atau Bradikardia" data-exclude="true">
                                    <label class="control-label" for="kardiovaskular4">Kulit marmorata, atau CRT > 5 detik, atau Nadi >= 30 di atas normal, atau Bradikardia (3)</label>
                                </div>
                            </div>
                        </div>

                        <!-- c. Respirasi -->
                        <div class="form-group col-md-8">
                            <div class="col-md-12">
                                <label class="control-label mb-4 text-left row">c. Respirasi</label>
                                <span id="jatuh_error" class="text-danger"></span>

                                <div class="radio-button radio-button-primary">
                                    <input id="respirasi1" type="radio" name="respirasi" value="Laju dan usaha napas normal, Saturasi O² norma" data-exclude="true">
                                    <label class="control-label" for="respirasi1">Laju dan usaha napas normal, Saturasi O² norma (0)</label>
                                </div>

                                <div class="radio-button radio-button-primary">
                                    <input id="respirasi2" type="radio" name="respirasi" value="Retraski ringan" data-exclude="true">
                                    <label class="control-label" for="respirasi2">Retraski ringan (1)</label>
                                </div>

                                <div class="radio-button radio-button-primary">
                                    <input id="respirasi3" type="radio" name="respirasi" value="Laju napas >= 20 di atas normal atau saturasi O² di bawah 5 poin normal, atau retraksi sedang" data-exclude="true">
                                    <label class="control-label" for="respirasi3">Laju napas >= 20 di atas normal atau saturasi O² di bawah 5 poin normal, atau retraksi sedang (2)</label>
                                </div>

                                <div class="radio-button radio-button-primary">
                                    <input id="respirasi4" type="radio" name="respirasi" value="Laju napas di bawah normal, atau saturasi O² di bawah 5 poin normal, atau Retraksi berat, merintih" data-exclude="true">
                                    <label class="control-label" for="respirasi4">Laju napas di bawah normal, atau saturasi O² di bawah 5 poin normal, atau Retraksi berat, merintih (3)</label>
                                </div>
                            </div>
                        </div>

                        <!-- Jam -->
                        <div class="form-group col-md-8">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Jam : <span class="help"></span></label>
                                <span id="jam" class="text-danger"></span>

                                <div class="has-success">
                                    <input type="time" class="form-control" id="jam" name="jam">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Skor -->
                        <div class="col-md-6">
                            <button type="button" class="btn btn-success mb-4" onclick="sumScore()">Skor Risiko</button>

                            <div class="col-md-3">
                                <input type="text" class="form-control" disabled id="inTotal">
                                <input type="hidden" id="tipeResikoHidden" name="tipe_resiko">
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="form-group text-center" style="margin-top: 30px;">

                            <div class="col-md-12">
                                <label class="control-label mb-10 text-left">
                                    &nbsp;<span class="help"></span>
                                </label>
                            </div>

                            <div class="col-md-6">

                                <a class="btn btn-default btn-anim btn-sm"
                                    onclick="javascript:history.go(-1)"
                                    style="margin-right: 20px; margin-left: 30px;">
                                    <i class="fa fa-arrow-left"></i>
                                    <span class="btn-text">KEMBALI</span>
                                </a>

                                <button type="submit" class="btn btn-success mb-4" id="btnSimpan">Simpan</button>
                                <button id="btnEdit" type="button" class="btn btn-warning mb-4">Edit</button>

                            </div>

                            <canvas id="can" style="display:none;"></canvas>
                        </div>
                    </div>
                        <h3 class="text-center">Penatalaksanaan Berdasarkan Zona</h3>
                        <div class="panel-body">
                            <div class="panel-wrapper collapse in" style="padding: 10px;">
                                <div style="
                        display: grid; 
                        grid-template-columns: repeat(4, 1fr); 
                        gap: 15px;
                        font-family: Arial, sans-serif;
                        color: #fff;
                        font-weight: bold;
                    ">
                                    <div style="background-color:#e74c3c; padding: 20px; border-radius: 8px;">
                                        Evaluasi tiap 20 menit, Rawat ICU, Konsultasi DPJP (>=6)
                                    </div>
                                    <div style="background-color:#e67e22; padding: 20px; border-radius: 8px;">
                                        Evaluasi tiap 30 menit, Rawat HCU, Konsultasi DPJP (5)
                                    </div>
                                    <div style="background-color:#f1c40f; padding: 20px; border-radius: 8px;">
                                        Evaluasi tiap 1 jam, Rawat inap, Konsultasi DPJP (3-4)
                                    </div>
                                    <div style="background-color:#1abc9c; padding: 20px; border-radius: 8px;">
                                        Evaluasi tiap 4 jam, Tata laksana sesuai penyakit (0-2)
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- Tabel -->
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left"></div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="table-wrap">
                                            <div class="table-responsive">
                                                <table class="table table-hover display pb-60">
                                                    <thead>
                                                        <tr class="bg-success">
                                                            <th style="width: 5%">NO</th>
                                                            <th style="width: 10%">PILIH</th>
                                                            <th style="width: 10%">HAPUS</th>
                                                            <th style="width: 30%">TANGGAL</th>
                                                            <th style="width: 20%">JAM</th>
                                                            <th style="width: 20%">STAFF</th>
                                                            <th style="width: 5%">SKOR</th>
                                                        </tr>
                                                    </thead>

                                                    <tfoot>
                                                        <tr class="bg-success">
                                                            <th>NO</th>
                                                            <th>PILIH</th>
                                                            <th>HAPUS</th>
                                                            <th>TANGGAL</th>
                                                            <th>JAM</th>
                                                            <th>STAFF</th>
                                                            <th>SKOR</th>
                                                        </tr>
                                                    </tfoot>

                                                    <tbody style="color: black;">
                                                        <?php if (!empty($riwayat)) : ?>
                                                            <?php $no = 1; ?>
                                                            <?php foreach ($riwayat as $row) : ?>
                                                                <tr>
                                                                    <td><?= $no++; ?></td>

                                                                    <!-- Tombol Edit & Hapus -->
                                                                    <td style="text-align: start;">
                                                                        <button class="btn btn-primary btn-sm btn-icon-anim"
                                                                            type="button" onclick="select_pws(<?= $row->id ?>)">
                                                                            <i class="icon-pencil"></i>
                                                                        </button>

                                                                    </td>
                                                                    <td style="text-align: start;">
                                                                        <button class="btn btn-danger btn-sm btn-icon-anim"
                                                                            type="button" onclick="hapus_pws(<?= $row->id ?>)">
                                                                            <i class="icon-trash"></i>
                                                                        </button>
                                                                    </td>

                                                                    <td style="text-align: start;"><?= date('d-m-Y', strtotime($row->tanggal)) ?></td>
                                                                    <td style="text-align: start;"><?= $row->jam ?></td>
                                                                    <td style="text-align: start;"><?= $row->nama_staff ?></td>
                                                                    <td><?= $row->skor ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>

                                                        <?php else : ?>
                                                            <tr>
                                                                <td colspan="6" class="text-center">Belum ada riwayat PEWS</td>
                                                            </tr>
                                                        <?php endif; ?>
                                                    </tbody>

                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- AJAX + SweetAlert2 -->
    <script>
        function buildBackUrl() {
            var idPel = document.getElementById('id_pelayanan').value || '';
            var idHis = document.getElementById('id_history').value || '';
            if (idPel && idHis) {
                return "<?= base_url('erm_ranap/form/') ?>" + btoa(idPel) + "/" + btoa(idHis);
            }
            return "";
        }

        $(function() {
            $("#btnSimpan").on("click", function(e) {
                e.preventDefault();
                var $form = $("#formPewsAnak");
                $.ajax({
                    url: $form.attr("action"),
                    type: "POST",
                    data: $form.serialize(),
                    success: function() {
                        Swal.fire({
                            title: "Good job!",
                            text: "Data Pengisian Awal MCU berhasil disimpan!",
                            icon: "success"
                        }).then(() => {

                            history.go(-1);
                        });
                    },
                    error: function(xhr, s, err) {
                        Swal.fire({
                            title: "Gagal!",
                            text: "Terjadi kesalahan saat menyimpan. " + (err || ""),
                            icon: "error"
                        });
                    }
                });
            });
        });


        function hapus_pws(id) {
            Swal.fire({
                title: "Hapus Data?",
                text: "Data PEWS akan dihapus permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Hapus",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post("<?= base_url('Pews_anak/hapus') ?>", {
                        id_pws: id
                    }, function(res) {
                        let data = JSON.parse(res);
                        if (data.status === 'success') {
                            Swal.fire("Berhasil!", data.message, "success")
                                .then(() => location.reload());
                        } else {
                            Swal.fire("Gagal!", data.message, "error");
                        }
                    });
                }
            });
        }


        function select_pws(id) {
            $.ajax({
                url: "<?= base_url() ?>Pews_anak/get_data_pws",
                method: "POST",
                dataType: "json",
                data: {
                    id: id
                },
                success: function(response) {

                    const data = response.data;

                    $("#id_pws").val(data.id);
                    // Perilaku
                    $("input[name='perilaku']").each(function() {
                        if ($(this).val() === data.perilaku) {
                            $(this).prop("checked", true);
                        }
                    });

                    // Kardiovaskular
                    $("input[name='kardiovaskular']").each(function() {
                        if ($(this).val() === data.kardiovaskular) {
                            $(this).prop("checked", true);
                        }
                    });

                    // Respirasi
                    $("input[name='respirasi']").each(function() {
                        if ($(this).val() === data.respirasi) {
                            $(this).prop("checked", true);
                        }
                    });

                    // Jam
                    $("#jam").val(data.jam);

                    // Skor + tampilkan pada input total skor
                    $("#inTotal").val(data.skor);
                    $("#skorHidden").val(data.skor);

                    // Hitung ulang tipe resiko
                    let tipe_resiko = "";
                    if (data.skor <= 2) tipe_resiko = "Rendah";
                    else if (data.skor <= 4) tipe_resiko = "Sedang";
                    else tipe_resiko = "Tinggi";

                    $("#tipeResikoHidden").val(tipe_resiko);

                    // Set ID jika mau edit
                    $("#id_history").val(data.id_history);
                    $("#id_pelayanan").val(data.id_pelayanan);

                    // Tampilkan tombol "Edit"
                    $("#btnSimpan").hide();
                    $("#btnEdit").show();
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {

            $("#btnEdit").hide();

            // AJAX EDIT
            $("#btnEdit").on("click", function(e) {
                e.preventDefault();

                var $form = $("#formPewsAnak");

                $.ajax({
                    url: "<?= base_url('Pews_anak/update') ?>",
                    type: "POST",
                    data: $form.serialize(),
                    dataType: "json",
                    success: function(res) {

                        if (res.status === "success") {
                            Swal.fire({
                                title: "Berhasil!",
                                text: "Data PEWS berhasil diperbarui!",
                                icon: "success"
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal!",
                                text: res.message,
                                icon: "error"
                            });
                        }

                    },
                    error: function(xhr, s, err) {
                        Swal.fire({
                            title: "Error!",
                            text: "Terjadi kesalahan saat update: " + (err || ""),
                            icon: "error"
                        });
                    }
                });

            });

        });
    </script>

    <?php if ($this->session->flashdata('success')): ?>
        <script>
            Swal.fire({
                title: "Good job!",
                text: "<?= $this->session->flashdata('success'); ?>",
                icon: "success"
            });
        </script>
    <?php endif; ?>

    <!-- Perhitungan Skor -->
    <script type="text/javascript">
        function sumScore() {

            var score = 0,
                score1 = 0,
                score2 = 0;

            // Perilaku
            if ($('#perilaku1').is(":checked")) score = 0;
            else if ($('#perilaku2').is(":checked")) score = 1;
            else if ($('#perilaku3').is(":checked")) score = 2;
            else if ($('#perilaku4').is(":checked")) score = 3;

            // Kardiovaskular
            if ($('#kardiovaskular1').is(":checked")) score1 = 0;
            else if ($('#kardiovaskular2').is(":checked")) score1 = 1;
            else if ($('#kardiovaskular3').is(":checked")) score1 = 2;
            else if ($('#kardiovaskular4').is(":checked")) score1 = 3;

            // Respirasi
            if ($('#respirasi1').is(":checked")) score2 = 0;
            else if ($('#respirasi2').is(":checked")) score2 = 1;
            else if ($('#respirasi3').is(":checked")) score2 = 2;
            else if ($('#respirasi4').is(":checked")) score2 = 3;

            var sum = score + score1 + score2;

            // tampilkan
            $('#inTotal').val(sum);

            // masukkan ke hidden untuk POST
            $('#skorHidden').val(sum);

            // tentukan resiko
            var tipe_resiko = '';

            if (sum <= 2) tipe_resiko = 'Rendah';
            else if (sum <= 4) tipe_resiko = 'Sedang';
            else tipe_resiko = 'Tinggi';

            $('#tipeResikoHidden').val(tipe_resiko);
        }
    </script>
    <script>
        $(document).ready(function() {
            $("table tbody tr").each(function() {

                let cell = $(this).find("td").eq(6); // kolom skor
                let score = parseInt(cell.text());

                if (!isNaN(score)) {

                    if (score >= 6) {
                        cell.addClass("ews-merah");
                    } else if (score >= 5 && score <= 5) {
                        cell.addClass("ews-oranye");
                    } else if (score >= 3 && score <= 4) {
                        cell.addClass("ews-kuning");
                    } else if (score >= 0 && score <= 2) {
                        cell.addClass("ews-hijau");
                    }
                }
            });
        });
    </script>
    </form>
</body>
</html>