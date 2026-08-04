<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view shadow-sm" style="border-radius: 8px; border: 1px solid #e0e0e0;">
            <div class="panel-heading" style="background-color: #f8f9fa; border-bottom: 1px solid #eee; padding: 20px;">
                <div class="pull-left">
                    <h5 class="panel-title txt-dark" style="font-weight: 700; letter-spacing: 0.5px;">
                        <i class="fa fa-exchange text-success mr-10"></i> RUJUKAN INTERNAL ANTAR DPJP
                    </h5>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="panel-wrapper collapse in">
                <div class="panel-body" style="padding: 30px;">
                    <div class="form-wrap">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label mb-10"><strong>Poli Tujuan:</strong></label>
                                    <div class="has-success">
                                        <select class="form-control select2" id="id_list_poli" name="id_list_poli">
                                            <option value="">-- PILIH POLI TUJUAN --</option>
                                            <?php foreach ($list_poli as $p): ?>
                                                <option value="<?= $p->id_list_poli; ?>"
                                                    data-spes="<?= htmlspecialchars($p->kdpoli_bpjs); ?>">
                                                    <?= $p->nama_panjang; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label mb-10"><strong>Kepada Yth. TS. Dokter:</strong></label>
                                    <div class="has-success">
                                        <select class="form-control select2" id="id_dokter" name="id_dokter">
                                            <option value="" disabled selected>-- PILIH DOKTER --</option>
                                            <?php foreach ($dokter as $d): ?>
                                                <option value="<?= $d->id_dokter; ?>" data-spes="<?= $d->dokter_spes; ?>">
                                                    <?= $d->nama; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="light-grey-hr">

                        <div class="alert"
                            style="background-color: #f1faf5; border-left: 5px solid #48bb78; color: #2f855a; padding: 20px;">
                            <i class="fa fa-user mr-10" style="color: #48bb78;"></i>
                            <strong style="color: #276749;">Informasi Pasien:</strong> Mohon konsultasi pasien berikut:
                        </div>

                        <div class="row mb-20">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Nama Pasien</label>
                                    <input type="text" disabled class="form-control" value="<?= $nama ?>"
                                        style="font-weight: 600;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Umur</label>
                                    <input type="text" disabled class="form-control" value="<?php
                                                                                            $tanggal = new DateTime($tgl_lahir);
                                                                                            $today = new DateTime();
                                                                                            echo $today->diff($tanggal)->y . ' Tahun';
                                                                                            ?>" style="font-weight: 600;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">No. RM</label>
                                    <input type="text" disabled class="form-control" value="<?= $no_rm ?>"
                                        style="font-weight: 600;">
                                </div>
                            </div>
                        </div>

                        <input type="hidden" id="inPel" value="<?= $id_pelayanan ?>">
                        <input type="hidden" id="inHis" value="<?= $id_history ?>">
                        <input type="hidden" id="inNoRM" value="<?= $no_rm ?>">
                        <input type="hidden" id="inIdFormRujukan">

                        <div class="form-group">
                            <label class="control-label mb-10">
                                <strong>Diagnosis Utama (ICD-10)</strong>
                            </label>
                            <input type="text" id="diagnosis" class="form-control" readonly
                                style="cursor: not-allowed; background-color: #eee;">
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label class="control-label mb-10">Keluhan Utama</label>
                                    <div class="has-success">
                                        <textarea id="keluhan" class="form-control" rows="4"
                                            placeholder="Tuliskan keluhan utama pasien..."></textarea>
                                    </div>
                                    <small id="error_keluhan" class="text-danger"></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label mb-10">Terapi Yang Telah Diberikan</label>
                                    <div class="has-success">
                                        <textarea id="terapi" class="form-control" rows="4"
                                            placeholder="Daftar obat atau tindakan..."></textarea>
                                    </div>
                                    <small id="error_terapi" class="text-danger"></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label mb-10">Riwayat Penyakit</label>
                                    <div class="has-success">
                                        <textarea id="riwayat_penyakit" class="form-control" rows="4"
                                            placeholder="Riwayat penyakit terdahulu..."></textarea>
                                    </div>
                                    <small id="error_riwayat" class="text-danger"></small>
                                </div>
                            </div>
                        </div>

                        <p class="mt-10 mb-20 text-muted"><em>* Mohon konsul dan penanganan selanjutnya. Terima kasih
                                atas bantuan dan kerja samanya.</em></p>

                        <?php if ($is_dokter): ?>
                            <div id="respon_section" class="well" style="background: #fdfdfd; border: 1px dashed #22af47; display: none;">
                                <div class="form-group">
                                    <label class="control-label mb-10"><strong>Tanggapan Dokter Penerima:</strong></label>
                                    <div class="radio-list">
                                        <label class="radio-inline"><input type="radio" name="respon_dokter" value="terima" id="rd_terima"> Terima </label>
                                        <label class="radio-inline"><input type="radio" name="respon_dokter" value="tolak" id="rd_tolak"> Tolak </label>
                                    </div>
                                </div>
                                <div class="form-group mb-0" id="balasan_wrapper">
                                    <label class="control-label mb-10">Catatan Balasan</label>
                                    <div class="has-success">
                                        <textarea id="balasan" name="balasan" class="form-control" rows="3" placeholder="Masukkan balasan atau instruksi dokter..."></textarea>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>

                        <hr class="light-grey-hr">

                        <div class="form-actions">
                            <a href="javascript:history.back()" class="btn btn-default btn-outline btn-anim">
                                <i class="fa fa-arrow-left"></i><span class="btn-text">Kembali</span>
                            </a>

                            <?php if (!$is_dokter): ?>
                                <button type="button" class="btn btn-success btn-anim pull-right" onclick="simpan()">
                                    <i class="fa fa-save"></i><span class="btn-text">SIMPAN RUJUKAN</span>
                                </button>
                            <?php else: ?>
                                <button type="button" class="btn btn-primary btn-anim pull-right"
                                    onclick="kirim_balasan()" disabled id="btnKirim" style="display: none;">
                                    <i class="fa fa-paper-plane"></i><span class="btn-text">KIRIM BALASAN</span>
                                </button>
                            <?php endif; ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-heading" style="background-color: #fcfcfc; border-top: 1px solid #eee;">
                <h6 class="panel-title txt-dark"><i class="fa fa-history mr-10"></i> RIWAYAT RUJUKAN PASIEN</h6>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="tabel_terapi" class="table table-hover table-bordered display pb-30">
                                <thead>
                                    <tr class="bg-success">
                                        <th class="text-white"><?= $is_dokter ? 'PILIH' : 'HAPUS' ?></th>
                                        <th class="text-white">CETAK</th>
                                        <th class="text-white">PASIEN</th>
                                        <th class="text-white">WAKTU</th>
                                        <th class="text-white">DOKTER</th>
                                        <th class="text-white">POLI</th>
                                        <th class="text-white">DIAGNOSA</th>
                                        <th class="text-white">KELUHAN</th>
                                        <th class="text-white">STATUS</th>
                                        <th class="text-white">BALASAN</th>
                                    </tr>
                                </thead>
                                <tbody style="color: #333;"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?php echo base_url('assets/dist/jquery-ui.css'); ?>">
<script src="<?php echo base_url('assets/dist/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/jquery-ui.js'); ?>"></script>
<script>
    $(document).ready(function() {

        function normalize(text) {
            return text
                .toString()
                .toLowerCase()
                .replace(/\s+/g, '')
                .trim();
        }

        let allDokterOptions = $('#id_dokter option').clone();

        $('#id_dokter').prop('disabled', true);

        $('#id_list_poli').on('change', function() {

            const selectedPoli = $(this).find(':selected');
            let spesPoli = selectedPoli.data('spes');

            $('#id_dokter')
                .html('')
                .prop('disabled', true);

            if (!spesPoli) return;

            spesPoli = normalize(spesPoli);

            let found = false;

            allDokterOptions.each(function() {

                let spesDokter = $(this).data('spes');
                if (!spesDokter) return;

                spesDokter = normalize(spesDokter);

                if (spesDokter.includes(spesPoli) || spesPoli.includes(spesDokter)) {

                    $('#id_dokter').append($(this));
                    found = true;
                }
            });

            if (found) {
                $('#id_dokter').prop('disabled', false);
            }

            let dokterOptions = $('#id_dokter option');

            if (dokterOptions.length > 1) {
                let firstVal = dokterOptions.eq(1).val();
                $('#id_dokter').val(firstVal).trigger('change');
            }
        });

    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#balasan').on('input', function() {
            if ($(this).val().trim().length > 0) {
                $('#btnKirim').prop('disabled', false);
            } else {
                $('#btnKirim').prop('disabled', true);
            }
        });

        $('input[name="respon_dokter"]').on('change', function() {
            $('#balasan_wrapper').fadeIn();
        });

        id = $('#inHis').val();
        id_pelayanan = $('#inPel').val();

        reload_data_id_pel(id_pelayanan);

        $.ajax({
            url: "<?php echo base_url() ?>Erm_dpjp/get_data_awal",
            method: "POST",
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                if (data.status == 'found') {
                    $('#terapi').val(data.terapi || '-');
                    $('#riwayat_penyakit').val(data.riwayat_penyakit || '-');
                    $('#keluhan').val(data.keluhan_utama || '-');
                    $('#diagnosis').val(
                        (data.kode ? data.kode : '') + ' - ' + (data.nama_diagnosa ? data.nama_diagnosa : '')
                    );
                }
            }
        });
        $.ajax({
            url: "<?php echo base_url() ?>Erm_dpjp/get_all_diagnosa",
            method: "GET",
            dataType: 'json',
            success: function(data) {
                let diagnosaList = [];

                $.each(data, function(i, val) {
                    diagnosaList.push({
                        label: val.id_diagnosa + ' | ' + val.nama_diagnosa,
                        value: val.id_diagnosa + ' | ' + val.nama_diagnosa
                    });
                });

                $("#diagnosis").autocomplete({
                    source: diagnosaList,
                    minLength: 2,
                    autoFocus: true,
                    select: function(event, ui) {
                        $("#diagnosis").val(ui.item.value);
                        return false;
                    }
                });
            }
        });
    });

    function toggleButtonLoading(btnSelector, isLoading, originalText) {
        const btn = $(btnSelector);
        if (isLoading) {
            btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Memproses...');
        } else {
            btn.prop('disabled', false).html(originalText);
        }
    }

    function select_konsul(id_lembar_konsul) {
        $.ajax({
            url: "<?= base_url() ?>Erm_dpjp/get_lembar_konsul",
            method: "POST",
            dataType: "json",
            data: {
                id: id_lembar_konsul
            },
            success: function(data) {
                $('#respon_section').fadeIn(600);
                $('#btnKirim').fadeIn(600);

                $('html, body').animate({
                    scrollTop: $("#respon_section").offset().top - 500
                }, 600);

                setTimeout(() => $('#balasan').focus(), 800);

                const {
                    id_form_lembar_rujukan,
                    terapi,
                    riwayat_penyakit,
                    keluhan,
                    diagnosis,
                    verifikasi,
                    balasan,
                    id_dokter,
                    id_list_poli
                } = data.lembar_konsul;

                $('#terapi').val(terapi).prop('readonly', true);
                $('#riwayat_penyakit').val(riwayat_penyakit).prop('readonly', true);
                $('#keluhan').val(keluhan).prop('readonly', true);
                $('#diagnosis').val(diagnosis).prop('readonly', true);
                $('#balasan').val(balasan);

                $('input[name="respon_dokter"]').prop('checked', false);

                if (verifikasi === 'terima' || verifikasi === '1' || verifikasi === 1) {
                    $('input[name="respon_dokter"][value="terima"]').prop('checked', true);
                } else if (verifikasi === 'tolak' || verifikasi === '0' || verifikasi === 0) {
                    $('input[name="respon_dokter"][value="tolak"]').prop('checked', true);
                }

                $('#inIdFormRujukan').val(id_form_lembar_rujukan);

                $('#id_dokter').val(id_dokter).trigger('change').prop('disabled', true);

                $('#id_list_poli').val(id_list_poli).trigger('change').prop('disabled', true);

                // Biar tetap terkirim saat submit
                if (!$('#hidden_id_dokter').length) {
                    $('<input>').attr({
                        type: 'hidden',
                        id: 'hidden_id_dokter',
                        name: 'id_dokter',
                        value: id_dokter
                    }).appendTo('form');
                } else {
                    $('#hidden_id_dokter').val(id_dokter);
                }

                if (!$('#hidden_id_list_poli').length) {
                    $('<input>').attr({
                        type: 'hidden',
                        id: 'hidden_id_list_poli',
                        name: 'id_list_poli',
                        value: id_list_poli
                    }).appendTo('form');
                } else {
                    $('#hidden_id_list_poli').val(id_list_poli);
                }
            }
        });
    }

    function kirim_balasan() {
        const balasan = $('#balasan').val().trim();
        const respon = $('input[name="respon_dokter"]:checked').val();
        const id_history = $('#inHis').val();
        const id_pelayanan = $('#inPel').val();
        const no_rm = $('#inNoRM').val();
        const id_form_lembar_rujukan = $('#inIdFormRujukan').val();

        const id_dokter = $('#hidden_id_dokter').val() || $('#id_dokter').val();
        const id_list_poli = $('#hidden_id_list_poli').val() || $('#id_list_poli').val();

        if (!respon) {
            alert("Pilih respon dokter (Terima / Tidak)");
            return;
        }

        if (balasan.length === 0) {
            alert("Balasan wajib diisi.");
            return;
        }

        $('#btnKirim')
            .prop('disabled', true)

        swal({
            title: "Apakah kamu yakin?",
            text: "Kirim balasan konsultasi",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            showLoaderOnConfirm: true,
            closeOnConfirm: false
        }, function(isConfirm) {

            if (!isConfirm) {
                $('#btnKirim').prop('disabled', false).html(`
                <i class="icon-rocket"></i>
                <span class="btn-text">KIRIM BALASAN</span>
            `);
                return;
            }

            $.ajax({
                url: "<?= base_url() ?>Erm_dpjp/kirim_balasan",
                method: "POST",
                dataType: "json",
                data: {
                    id_form_lembar_rujukan: id_form_lembar_rujukan,
                    id_history: id_history,
                    id_pelayanan: id_pelayanan,
                    id_dokter: id_dokter,
                    id_list_poli: id_list_poli,
                    no_rm: no_rm,
                    respon_dokter: respon,
                    balasan: balasan
                },
                success: function(res) {

                    if (res.status === "success") {
                        swal("Sukses", "Balasan berhasil dikirim", "success");

                        reload_data_id_pel(id_pelayanan);
                        select_konsul(id_form_lembar_rujukan);

                        // reset form
                        $('#balasan').val('');
                        $('input[name="respon_dokter"]').prop('checked', false);

                        // button dikunci lagi
                        $('#btnKirim')
                            .prop('disabled', true)
                            .html(`
                            <i class="icon-rocket"></i>
                            <span class="btn-text">KIRIM BALASAN</span>
                        `);

                        // $('#balasan_wrapper').hide();
                        // $('#respon_wrapper').hide();

                    } else {
                        swal("Gagal", res.message || "Gagal mengirim balasan", "error");

                        $('#btnKirim')
                            .prop('disabled', false)
                            .html(`
                            <i class="icon-rocket"></i>
                            <span class="btn-text">KIRIM BALASAN</span>
                        `);
                    }
                },
                error: function() {
                    swal("Error", "Terjadi kesalahan server", "error");

                    $('#btnKirim')
                        .prop('disabled', false)
                        .html(`
                        <i class="icon-rocket"></i>
                        <span class="btn-text">KIRIM BALASAN</span>
                    `);
                }
            });
        });
    }

    function reload_data_id_pel(id_pelayanan) {
        $('#tabel_terapi').dataTable().fnClearTable();
        $('#tabel_terapi').dataTable().fnDestroy();

        $('#tabel_terapi').DataTable({
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sSearch": "Cari:",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                }
            },
            "ajax": {
                "url": "<?php echo base_url('Erm_dpjp/tampil_list'); ?>",
                "type": "POST",
                "data": {
                    id_pelayanan: id_pelayanan
                },
                "dataSrc": function(json) {
                    if (!json || !json.data) {
                        console.warn('DataTables: tidak ada data yang dikembalikan.');
                        return [];
                    }
                    return json.data;
                },
                "error": function(xhr, error, thrown) {
                    $('#tabel_terapi').html(
                        '<tr><td colspan="10" class="text-center text-danger">Gagal memuat data. Silakan coba lagi.</td></tr>'
                    );
                }
            },
            "deferRender": true,
            "processing": true,
            "order": [4],
            "columnDefs": [{
                "targets": [0, 1],
                "orderable": false
            }],
        });
    }

    function hapus_lembar_konsul(id_lembar_konsul) {
        swal({
            title: "Batalkan Rujukan?",
            text: "Berikan alasan pembatalan medis atau administrasi:",
            type: "input",
            placeholder: "Contoh: Salah pilih dokter / Pasien pulang APS",
            showCancelButton: true,
            confirmButtonColor: "#d9534f",
            confirmButtonText: "Batalkan Rujukan",
            cancelButtonText: "Batal",
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }, function(keterangan) {

            if (keterangan === false) return false;

            if (!keterangan || keterangan.trim() === "") {
                swal.showInputError("Keterangan wajib diisi!");
                return false;
            }

            $.ajax({
                url: "<?php echo base_url() ?>Erm_dpjp/hapus_lembar_konsul/" + id_lembar_konsul,
                method: "POST",
                dataType: "json",
                data: {
                    id_lembar_konsul: id_lembar_konsul,
                    keterangan: keterangan
                },

                success: function(data) {
                    if (data.status === "success") {
                        swal({
                            title: "Berhasil!",
                            type: "success",
                            text: "Data berhasil dihapus",
                            confirmButtonColor: "#3cb878"
                        });
                        $('#tabel_terapi').DataTable().ajax.reload();
                    }
                },

                error: function() {
                    swal({
                        title: "Error!",
                        type: "error",
                        text: "Tidak dapat menghapus data",
                        confirmButtonColor: "#3cb878"
                    });
                }
            });

        });

        return false;
    }

    function print_lembar_konsul(id_lembar_konsul) {
        swal({
            title: "Cetak Lembar Rujukan?",
            text: "Apakah kamu yakin ingin mencetak?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Ya, Cetak",
            cancelButtonText: "Batal",
            closeOnConfirm: true
        }, function(isConfirm) {
            if (isConfirm) {
                window.open("<?php echo base_url('Erm_dpjp/print_lembar_konsul/'); ?>" + id_lembar_konsul, "_blank");
            }
        });
    }

    function isEmpty(val) {
        if (!val) return true;

        let v = val.trim();

        return v === '';
    }

    function simpan() {

        let id_pelayanan = $('#inPel').val();
        let id_history = $('#inHis').val();
        let no_rm = $('#inNoRM').val();
        let id_dokter = $('#id_dokter').val();
        let id_list_poli = $('#id_list_poli').val();

        let diagnosis = $('#diagnosis').val();
        let terapi = $('#terapi').val();
        let keluhan = $('#keluhan').val();
        let riwayat_penyakit = $('#riwayat_penyakit').val();

        // 🔥 RESET ERROR
        $('#error_terapi').text('');
        $('#error_keluhan').text('');
        $('#error_riwayat').text('');

        let isValid = true;

        // 🔥 VALIDASI POLI (POPUP)
        if (!id_list_poli || id_list_poli === '') {
            swal({
                title: "Peringatan!",
                text: "Silahkan pilih poli terlebih dahulu!!",
                type: "warning",
                confirmButtonColor: "#f0ad4e"
            });
            return;
        }

        if (!keluhan || keluhan.trim() === '') {
            $('#error_keluhan').text('*keluhan utama wajib diisi');
            isValid = false;
        }

        if (!terapi || terapi.trim() === '') {
            $('#error_terapi').text('*terapi yang telah diberikan wajib diisi');
            isValid = false;
        }

        if (!riwayat_penyakit || riwayat_penyakit.trim() === '') {
            $('#error_riwayat').text('*riwayat penyakit wajib diisi');
            isValid = false;
        }

        if (!isValid) return;

        swal({
            title: "Apakah kamu yakin?",
            text: "Menambahkan lembar rujukan baru",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            showLoaderOnConfirm: true,
            closeOnConfirm: false
        }, function(isConfirm) {

            if (!isConfirm) return false;

            toggleButtonLoading('button[onclick="simpan()"]', true, '<i class="fa fa-save"></i> SIMPAN RUJUKAN');

            $.ajax({
                url: "<?php echo base_url() ?>Erm_dpjp/insert_lembar_rujukan",
                method: "POST",
                dataType: 'json',
                data: {
                    no_rm: no_rm,
                    id_pelayanan: id_pelayanan,
                    id_dokter: id_dokter,
                    id_list_poli: id_list_poli,
                    id_history: id_history,
                    diagnosis: diagnosis,
                    terapi: terapi,
                    riwayat_penyakit: riwayat_penyakit,
                    keluhan: keluhan
                },
                success: function(data) {
                    if (data.status === "success") {
                        swal("Berhasil!", "Rujukan telah dikirim ke dokter tujuan.", "success");
                        reload_data_id_pel(id_pelayanan);
                    }
                    toggleButtonLoading('button[onclick="simpan()"]', false, '<i class="fa fa-save"></i> SIMPAN RUJUKAN');
                },
                error: function() {
                    swal({
                        title: "Error!",
                        text: "Tidak dapat terhubung ke server.",
                        type: "error",
                        confirmButtonColor: "#3cb878"
                    });
                }
            });
        });

        return false;
    }
</script>