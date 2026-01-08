<!DOCTYPE html>
<html>

<head>
    <title>PENILAIAN PEDIATRIC EARLY WARNING SYSTEM (PEWS)</title>
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
                            
                            <div id="display_jam_lama" style="display:none; margin-bottom: 5px;">
                                <span class="label label-info">Jam tersimpan: <b id="text_jam_lama"></b></span>
                            </div>

                            <div class="has-success">
                                <input type="time" class="form-control" id="jam" name="jam">
                                <small class="help-block">Isi kembali jika ingin mengubah jam.</small>
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
                    </form>
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
                                                <table id="table_riwayat" class="table table-hover display pb-60">
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
                                                    <tbody style="color: black;">
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
    <script type="text/javascript">
        $(document).ready(function() {
            const id_pelayanan = $("#id_pelayanan").val();
            
            // Inisialisasi awal
            $("#btnEdit").hide();
            if(id_pelayanan) reload_data_pews(id_pelayanan);

            // FUNGSI RELOAD DATATABLE
            function reload_data_pews(id_pel) {
                $('#table_riwayat').dataTable().fnClearTable();
                $('#table_riwayat').dataTable().fnDestroy();
                $('#table_riwayat').DataTable({
                    "language": {
                        "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                        "sProcessing": "Sedang memproses.",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sSearch": "Cari:",
                        "oPaginate": {
                            "sFirst": "Pertama", "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya", "sLast": "Terakhir"
                        }
                    },
                    "ajax": {
                        "url": '<?= base_url('Pews_anak/get_riwayat_ajax') ?>',
                        "type": 'POST',
                        "data": { id_pelayanan: id_pel }
                    },
                    "deferRender": true,
                    "processing": true,
                    "order": [],
                    "columnDefs": [
                        { "targets": [0, 1, 2], "orderable": false },
                        { "targets": [6], "className": "text-center" }
                    ],
                    "createdRow": function(row, data, dataIndex) {
                        let score = parseInt(data[6]);
                        let cls = "";
                        if (score >= 6) cls = "ews-merah";
                        else if (score == 5) cls = "ews-oranye";
                        else if (score >= 3) cls = "ews-kuning";
                        else if (score >= 0) cls = "ews-hijau";
                        
                        $('td', row).eq(6).addClass(cls);
                    }
                });
            }

            // SIMPAN DATA (INSERT)
            $("#btnSimpan").on("click", function(e) {
                e.preventDefault();
                let $form = $("#formPewsAnak");
                let id_pelayanan = $("#id_pelayanan").val(); // Pastikan ID ini tersedia

                $.ajax({
                    url: $form.attr("action"),
                    type: "POST",
                    data: $form.serialize(),
                    success: function() {
                        swal({
                            title: "Berhasil!",
                            text: "Data PEWS berhasil disimpan!",
                            type: "success"
                        }, function() {
                            // Panggil reload datatable agar data baru muncul
                            reload_data_pews(id_pelayanan); 
                            $form[0].reset();
                            // Reset manual skor tampilan jika perlu
                            $('#inTotal').val(0);
                        });
                    },
                    error: function(xhr, s, err) {
                        swal("Gagal!", "Terjadi kesalahan: " + (err || ""), "error");
                    }
                });
            });

            // UPDATE DATA
           $("#btnEdit").on("click", function(e) {
                e.preventDefault();
                $.ajax({
                    url: "<?= base_url('Pews_anak/update') ?>",
                    type: "POST",
                    data: $("#formPewsAnak").serialize(),
                    dataType: "json",
                    success: function(res) {
                        if (res.status === "success") {
                            // Sintaks swal v1: swal(title, text, type, callback)
                            swal({
                                title: "Berhasil!",
                                text: "Data diperbarui!",
                                type: "success"
                            }, function() {
                                location.reload();
                            });
                        } else {
                            swal("Gagal!", res.message, "error");
                        }
                    },
                    error: function() {
                        swal("Error!", "Terjadi kesalahan pada server", "error");
                    }
                });
            });
        });

                // FUNGSI HAPUS
        function hapus_pws(id) {
            swal({
                title: "Hapus data?",
                text: "Data tidak dapat dikembalikan!",
                type: "warning", // v1 menggunakan 'type', bukan 'icon'
                showCancelButton: true,
                confirmButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!",
                closeOnConfirm: false // Agar swal tidak langsung tertutup sebelum proses selesai
            }, function(isConfirm) {
                if (isConfirm) {
                    $.post("<?= base_url('Pews_anak/hapus') ?>", { id_pws: id }, function(res) {
                        let data = JSON.parse(res);
                        if (data.status === 'success') {
                            swal("Terhapus!", data.message, "success");
                            // Refresh tabel tanpa reload halaman penuh
                            $('#table_riwayat').DataTable().ajax.reload();
                        } else {
                            swal("Gagal!", data.message, "error");
                        }
                    });
                }
            });
        }

        // FUNGSI SELECT DATA UNTUK EDIT
        function select_pws(id) {
            $.ajax({
                url: "<?= base_url('Pews_anak/get_data_pws') ?>",
                method: "POST",
                dataType: "json",
                data: { id: id },
                success: function(response) {
                    const data = response.data;
                    $("#id_pws").val(data.id);
                    $("#inTotal, #skorHidden").val(data.skor);

                   if (data.jam) {
                        $("#text_jam_lama").text(data.jam.substring(0, 5));
                        $("#display_jam_lama").show();
                    }
                    
                    // Set Radio Buttons
                    $(`input[name='perilaku'][value='${data.perilaku}']`).prop("checked", true);
                    $(`input[name='kardiovaskular'][value='${data.kardiovaskular}']`).prop("checked", true);
                    $(`input[name='respirasi'][value='${data.respirasi}']`).prop("checked", true);

                    // UI Changes
                    $("#btnSimpan").hide();
                    $("#btnEdit").show();
                    window.scrollTo(0,0);
                    sumScore();
                }
            });
        }

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
</body>
</html>