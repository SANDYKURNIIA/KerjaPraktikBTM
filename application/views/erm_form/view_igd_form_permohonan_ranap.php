<?php

/** @var string $id_pelayanan */
/** @var string $id_history */
/** @var object $selectPasien */
/** @var object $list_poli */
/** @var object $dokter */
/** @var object $ruangan */
/** @var object $ruangan_pasien */
/** @var object $url_back */

?>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div id="topForm"></div>
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title"
                        style="display:inline-block; background:#3cb878; color:white; padding:5px 12px;">
                        FORM PERMOHONAN RAWAT INAP
                    </h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php if ($this->session->flashdata('success')): ?>
                <script>
                    alert("<?= $this->session->flashdata('success'); ?>");
                </script>
            <?php endif; ?>

            <form method="post" id="formRanap" action="<?= base_url('Erm_igd_form_permohonan_ranap/simpan') ?>">
                <input type="hidden" id="url_back" value="<?= $url_back ?>">
                <input type="hidden" id="modeForm" value="create">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap">

                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>
                                        <label class="control-label mb-10 text-left">Yang bertanda di bawah ini: <span class="help"></span></label>
                                    </strong>
                                </div>
                            </div>

                            <input type="hidden" name="id_pelayanan" value="<?= $id_pelayanan ?>">
                            <input type="hidden" name="id_history" value="<?= $id_history ?>">

                            <!-- BARIS 1 -->
                            <div class="form-group">

                                <div class="col-md-4 mt-10">
                                    <label class="control-label mb-10 text-left">Nama</label>
                                    <div class="has-success">
                                        <input type="text" class="form-control" id="inNama" name="nama_pemohon" placeholder="Masukkan nama">
                                    </div>
                                    <span id="nama_error" class="text-danger"></span>
                                </div>

                                <div class="col-md-4 mt-10">
                                    <label class="control-label mb-10 text-left">Tanggal Lahir</label>
                                    <div class="has-success">
                                        <input type="date" class="form-control" id="inTanggal" name="tgl_lahir_pemohon">
                                    </div>
                                    <span id="tanggal_error" class="text-danger"></span>
                                </div>

                                <div class="clearfix"></div>

                            </div>

                            <!-- BARIS 2 -->
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Alamat</label>
                                    <div class="has-success">
                                        <textarea class="form-control" id="inAlamat" name="alamat_pemohon" rows="3" placeholder="Masukkan alamat"></textarea>
                                    </div>
                                    <span id="alamat_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                    <div class="radio-button radio-button-primary">
                                        <input id="inLakilaki" name="jenkel_pemohon" type="radio" value="LAKI-LAKI">
                                        <label class="control-label" for="inLakilaki">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="radio-button radio-button-primary">
                                        <input id="inPerempuan" name="jenkel_pemohon" type="radio" value="PEREMPUAN">
                                        <label class="control-label" for="inPerempuan">
                                            Perempuan
                                        </label>
                                    </div>
                                    <span id="jenkel_error" class="text-danger"></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 mt-10">
                                    <label class="control-label mb-10 text-left">Hubungan dengan yang di rawat inap</label>

                                    <div class="radio-button radio-button-primary">
                                        <input id="inSayasendiri" name="hubungan" type="radio" value="Saya Sendiri">
                                        <label class="control-label" for="inSayasendiri">Saya Sendiri</label>
                                    </div>

                                    <div class="radio-button radio-button-primary">
                                        <input id="inAnakkandung" name="hubungan" type="radio" value="Anak Kandung">
                                        <label class="control-label" for="inAnakkandung">Anak Kandung</label>
                                    </div>

                                    <div class="radio-button radio-button-primary">
                                        <input id="inSuamiistri" name="hubungan" type="radio" value="Suami/Istri">
                                        <label class="control-label" for="inSuamiistri">Suami/Istri</label>
                                    </div>

                                    <div class="radio-button radio-button-primary">
                                        <input id="inOrtukandung" name="hubungan" type="radio" value="Orang Tua Kandung">
                                        <label class="control-label" for="inOrtukandung">Orang Tua Kandung</label>
                                    </div>

                                    <div class="radio-button radio-button-primary">
                                        <input id="radio_lainnya" name="hubungan" type="radio" value="Lainnya">
                                        <label class="control-label" for="radio_lainnya">Lainnya</label>
                                    </div>

                                    <div class="has-success mt-10" id="wrap_lainnya" style="display: none;">
                                        <input type="text" class="form-control" name="hubungan_lainnya" id="input_lainnya" placeholder="Masukkan hubungan">
                                    </div>

                                    <span id="hubungan_error" class="text-danger"></span>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="form-group" style="margin-top:30px; margin-bottom:10px;">
                                <div class="col-md-12">
                                    <strong>
                                        <label class="control-label mb-10 text-left">Mohon perawatan rawat inap atas nama: <span class="help"></span></label>
                                    </strong>
                                </div>
                            </div>

                            <!-- BARIS 1 -->
                            <div class="form-group">

                                <div class="col-md-3 mt-10">
                                    <label class="control-label mb-10 text-left">Nomor RM</label>
                                    <div class="has-success">
                                        <input type="text" class="form-control" id="inNamapasien"
                                            value="<?= $selectPasien->no_rm ?>"
                                            disabled>
                                    </div>
                                    <span id="namapasien_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-3 mt-10">
                                    <label class="control-label mb-10 text-left">Nama Pasien</label>
                                    <div class="has-success">
                                        <input type="text" class="form-control" id="inNamapasien"
                                            value="<?= $selectPasien->nama ?>"
                                            disabled>
                                    </div>
                                    <span id="namapasien_error" class="text-danger"></span>
                                </div>

                                <div class="col-md-3 mt-10">
                                    <label class="control-label mb-10 text-left">Tanggal Lahir</label>
                                    <div class="has-success">
                                        <input type="date" class="form-control" id="inTanggallahir"
                                            value="<?= $selectPasien->tgl_lahir ?>"
                                            disabled>
                                    </div>
                                    <span id="tanggallahir_error" class="text-danger"></span>
                                </div>

                                <div class="col-md-3 mt-10">
                                    <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                    <div class="has-success">
                                        <input type="text" class="form-control" id="inJenkel"
                                            value="<?= $selectPasien->jenis_kelamin ?>"
                                            disabled>
                                    </div>
                                    <span id="jenkel_error" class="text-danger"></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="control-label mb-10 text-left">Alamat</label>
                                    <div class="has-success">
                                        <textarea class="form-control" id="inAlamat" rows="3" disabled><?= $selectPasien->alamat ?></textarea>
                                    </div>
                                    <span id="alamat_error" class="text-danger"></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label mb-10 text-left">Diagnosa sementara</label>
                                    <div class="has-success">
                                        <textarea class="form-control" id="inDiagnosa" name="diagnosa" rows="3" placeholder="Masukkan diagnosa"></textarea>
                                    </div>
                                    <span id="diagnosa_error" class="text-danger"></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="form-group ">
                                <div class="col-md-6">
                                    <label class="control-label mb-10">Spesialis:</label>
                                    <div class="has-success">
                                        <select class="form-control select2" id="id_list_poli" name="id_list_poli">
                                            <option value="">-- PILIH SPESIALIS --</option>
                                            <?php foreach ($list_poli as $p): ?>
                                                <option value="<?= $p->id_list_poli; ?>"
                                                    data-spes="<?= htmlspecialchars($p->kdpoli_bpjs); ?>">
                                                    <?= $p->nama_panjang; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label mb-10">DPJP:</label>
                                    <div class="has-success">
                                        <select class="form-control select2" id="id_dokter" name="id_dokter" disabled>
                                            <option value="" disabled selected>-- PILIH DOKTER --</option>
                                            <?php foreach ($dokter as $d): ?>
                                                <option value="<?= $d->id_dokter; ?>" data-spes="<?= $d->dokter_spes; ?>">
                                                    <?= $d->nama; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="control-label mb-10 text-left">Ruang Rawat/Kelas</label>
                                    <div class="has-success">
                                        <select class="form-control select2" id="inRuangranap" name="id_ruangan">
                                            <option value="">-- PILIH RUANGAN --</option>
                                            <?php foreach ($ruangan as $r): ?>
                                                <option value="<?= $r->id_ruangan; ?>">

                                                    <?= $r->nama_ruangan . ' - ' . $r->tipe; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span id="inRuangrawat" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label mb-10 text-left">Cara Bayar</label>
                                    <span id="nama_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <input type="text" class="form-control" id="inNama"
                                            value="<?= $cara_bayar->nama ?? '' ?>" readonly>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 mt-10">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTTD">Tanda Tangan</button>
                                    <div id="hasil_ttd" style="margin-top:10px;"></div>
                                    <button type="button" class="btn btn-danger mt-10" id="hapus_ttd" style="display:none;">
                                        Hapus Tanda Tangan
                                    </button>
                                    <span class="text-danger" id="ttd_error"></span>
                                    <input type="hidden" name="ttd_digital" id="ttd_digital">
                                </div>
                            </div>

                            <div class="modal fade" id="modalTTD" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title">Tanda Tangan</h5>
                                        </div>

                                        <div class="modal-body">
                                            <div style="border:1px solid #ccc;">
                                                <canvas id="signature-pad" width="450" height="200"></canvas>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" id="clear-signature">Clear</button>
                                            <button type="button" class="btn btn-success" id="save-signature">Simpan</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 mt-20 text-center">
                                    <a href="javascript:history.back()" class="btn btn-default" style="margin-right:10px;">Kembali</a>
                                    <button type="button" class="btn btn-success" style="margin-right:10px;" onclick="simpan()">Simpan</button>
                                    <button type="button" class="btn btn-primary" style="margin-right:10px;" onclick="cetak()">Cetak</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('input[name="hubungan"]').on('change', function() {
            if ($(this).val() === 'Lainnya') {
                $('#wrap_lainnya').show();
            } else {
                $('#wrap_lainnya').hide();
                $('#input_lainnya').val('');
            }
        });
    });

    $(document).ready(function() {

        var id_pelayanan = "<?= $id_pelayanan ?>";

        $.ajax({
            url: "<?= base_url('Erm_igd_form_permohonan_ranap/cek_permohonan') ?>",
            method: "POST",
            dataType: "json",
            data: {
                id_pelayanan: id_pelayanan
            },
            success: function(data) {

                if (data.permohonan == "found") {

                    $('.penundaan') // class tombol lu
                        .removeClass('btn-success')
                        .addClass('btn-warning');

                    $('.penundaan').attr(
                        'href',
                        "<?= base_url('Erm_igd_form_permohonan_ranap/form/') . $id_pelayanan . '/' . $id_history; ?>"
                    );

                }

            }
        });

    });

    $('#id_list_poli').on('change', function() {
        let id_poli = $(this).val();
        if (id_poli !== '') {
            $('#id_dokter').prop('disabled', false);
            $('#id_dokter').val('');
            $('#id_dokter option').each(function() {
                let poli = $(this).data('poli');

                if ($(this).val() === '') {
                    $(this).show();
                } else if (poli == id_poli) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

        } else {
            $('#id_dokter').prop('disabled', true);
            $('#id_dokter').val('');
        }
    });
</script>


<script>
    $(document).ready(function() {
        function normalize(text) {
            return text.toString().toLowerCase().replace(/\s+/g, '').trim();
        }

        let allDokterOptions = $('#id_dokter option').clone();

        $('#id_dokter').prop('disabled', true);
        $('#id_list_poli').on('change', function() {
            const selectedPoli = $(this).find(':selected');

            let spesPoli = selectedPoli.data('spes');
            $('#id_dokter').html('').prop('disabled', true);

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


<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>


<script>
    $(document).ready(function() {

        var canvas = document.getElementById('signature-pad');
        var signaturePad = new SignaturePad(canvas);

        $('#modalTTD').on('show.bs.modal', function() {
            signaturePad.clear();
        });

        $('#clear-signature').click(function() {
            signaturePad.clear();
        });

        $('#save-signature').click(function() {
            if (signaturePad.isEmpty()) {
                alert('Tanda tangan masih kosong!');
                return;
            }

            var dataURL = signaturePad.toDataURL();
            $('#hasil_ttd').html('<img src="' + dataURL + '" style="max-width:100%; border:1px solid #ccc;">');
            $('#ttd_digital').val(dataURL);
            $('#hapus_ttd').show();

            var modal = $('#modalTTD');
            modal.modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        });

        $('#hapus_ttd').click(function() {
            $('#hasil_ttd').html('');
            $('#ttd_digital').val('');
            $(this).hide();

            signaturePad.clear();
        });
    });
</script>


<script type="text/javascript">
    function simpan() {
        let valid = true;
        $('#nama_error').text('');
        $('#tanggal_error').text('');
        $('#alamat_error').text('');
        $('#jenkel_error').text('');
        $('#hubungan_error').text('');
        $('#diagnosa_error').text('');
        $('#ttd_error').text('');

        $('#inNama, #inTanggal, #inAlamat, #inDiagnosa').removeClass('input-error');

        if ($('#inNama').val().trim() === '') {
            $('#nama_error').text('*Nama wajib diisi');
            $('#inNama').addClass('input-error');
            valid = false;
        }

        if ($('#inTanggal').val() === '') {
            $('#tanggal_error').text('*Tanggal wajib diisi');
            $('#inTanggal').addClass('input-error');
            valid = false;
        }

        if ($('#inAlamat').val().trim() === '') {
            $('#alamat_error').text('*Alamat wajib diisi');
            $('#inAlamat').addClass('input-error');
            valid = false;
        }

        if ($('input[name="jenkel_pemohon"]:checked').length === 0) {
            $('#jenkel_error').text('*Pilih jenis kelamin terlebih dahulu');
            valid = false;
        }

        if ($('input[name="hubungan"]:checked').length === 0) {
            $('#hubungan_error').text('*Pilih hubungan terlebih dauhulu');
            valid = false;
        }

        if ($('#inDiagnosa').val().trim() === '') {
            $('#diagnosa_error').text('*Diagnosa wajib diisi');
            $('#inDiagnosa').addClass('input-error');
            valid = false;
        }

        if ($('#id_list_poli').val() === '') {
            swal({
                title: "Peringatan!",
                type: "warning",
                text: "Silahkan pilih poli terlebih dahulu",
                confirmButtonColor: "#f7ad68",
            });
            if ($('#id_dokter').val() === '') {
                swal({
                    title: "Peringatan!",
                    type: "warning",
                    text: "Silahkan pilih dokter terlebih dahulu",
                    confirmButtonColor: "#f7ad68",
                });
                return;
            }
            setTimeout(function() {
                $('html, body').animate({
                    scrollTop: $('#id_list_poli').offset().top - 120
                }, 300);
            }, 200);

            return;
        }

        if (!valid) {
            let firstError = $('.input-error:first');
            if (firstError.length) {
                $('html, body').animate({
                    scrollTop: firstError.offset().top - 120
                }, 300);
                firstError.focus();
            }
            return;
        }

        var mode = $('#modeForm').val();

        if (mode === 'edit') {

            swal({
                title: "Konfirmasi",
                text: "Yakin ingin menyimpan perubahan?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3cb878",
                confirmButtonText: "Ya",
                cancelButtonText: "Batal"
            }, function(isConfirm) {

                if (!isConfirm) return;

                kirimAjax();
            });

        } else {
            kirimAjax();
        }
    }


    function editData() {

        var id_pelayanan = $('input[name="id_pelayanan"]').val();

        $.ajax({
            url: "<?= base_url('Erm_igd_form_permohonan_ranap/get_data') ?>",
            method: "POST",
            dataType: "json",
            data: {
                id_pelayanan: id_pelayanan
            },

            success: function(res) {

                $('#inNama').val(res.nama_pemohon);
                $('#inTanggal').val(res.tgl_lahir_pemohon);
                $('#inAlamat').val(res.alamat_pemohon);
                $('#inDiagnosa').val(res.diagnosa);

                $('input[name="jenkel_pemohon"][value="' + res.jenkel_pemohon + '"]').prop('checked', true);
                $('input[name="hubungan"][value="' + res.hubungan + '"]').prop('checked', true);
                $('#inRuangranap').val(res.id_ruangan).trigger('change');
                $('#id_dokter').val(res.id_dokter).trigger('change');
                if (res.ttd_digital) {
                    $('#hasil_ttd').html('<img src="' + res.ttd_digital + '" style="max-width:100%;">');
                    $('#ttd_digital').val(res.ttd_digital);
                    $('#hapus_ttd').show();
                }

                window.scrollTo(0, 0);

                $('#modeForm').val('edit');
            }
        });
    }

    function kirimAjax() {
        var formData = $('#formRanap').serialize();

        $.ajax({
            url: "<?= base_url('Erm_igd_form_permohonan_ranap/simpan') ?>",
            method: "POST",
            dataType: 'json',
            data: formData,

            success: function(data) {

                if (data.status == "success") {

                    swal({
                        title: "Berhasil!",
                        text: "Data berhasil disimpan",
                        type: "success",
                        showCancelButton: true,
                        confirmButtonColor: "#3cb878",
                        cancelButtonColor: "#f7ad68",
                        confirmButtonText: "OKE",
                        cancelButtonText: "Keluar"
                    }, function(isConfirm) {

                        if (isConfirm) {
                            setTimeout(function() {
                                document.documentElement.scrollTop = 0;
                                document.body.scrollTop = 0;
                            }, 200);




                        } else {

                            var urlBack = document.getElementById('url_back').value;

                            if (urlBack) {
                                window.location.href = urlBack;
                            }
                        }

                    });

                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: data.message
                    });
                }
            }
        });
    }


    $(document).ready(function() {
        var id_pelayanan = $('input[name="id_pelayanan"]').val();
        console.log('ID:', id_pelayanan); // debug

        if (!id_pelayanan) return;

        $.ajax({
            url: "<?= base_url('Erm_igd_form_permohonan_ranap/get_data') ?>",
            method: "POST",
            dataType: "json",
            data: {
                id_pelayanan: id_pelayanan
            },

            success: function(res) {

                console.log('HASIL:', res); // debug

                if (!res || !res.id_pelayanan) return;

                $('#inNama').val(res.nama_pemohon);
                $('#inTanggal').val(res.tgl_lahir_pemohon);
                $('#inAlamat').val(res.alamat_pemohon);
                $('#inDiagnosa').val(res.diagnosa);

                // jenkel
                $('input[name="jenkel_pemohon"][value="' + res.jenkel_pemohon + '"]').prop('checked', true);

                // hubungan
                $('input[name="hubungan"][value="' + res.hubungan + '"]').prop('checked', true);

                // ruangan
                $('#inRuangranap').val(res.id_ruangan).trigger('change');

                // ambil spes dari dokter yang sudah tersimpan
                var dokterOption = $('#id_dokter option[value="' + res.id_dokter + '"]');
                var spes = dokterOption.data('spes');

                // set poli berdasarkan spes
                $('#id_list_poli option').each(function() {
                    if ($(this).data('spes') == spes) {
                        $('#id_list_poli').val($(this).val()).trigger('change');
                    }
                });

                // dokter
                $('#id_dokter').val(res.id_dokter).trigger('change');

                // tanda tangan
                if (res.ttd_digital) {
                    $('#hasil_ttd').html('<img src="' + res.ttd_digital + '" style="max-width:100%;">');
                    $('#ttd_digital').val(res.ttd_digital);
                    $('#hapus_ttd').show();
                }

                // 🔥 SET MODE EDIT
                $('#modeForm').val('edit');

            }
        });

    });
</script>

<script>
    function cetak() {
        var id_pelayanan = $('input[name="id_pelayanan"]').val();

        if (!id_pelayanan) {
            alert('Data belum tersedia untuk dicetak');
            return;
        }

        var url = "<?= base_url('Erm_igd_form_permohonan_ranap/cetak/') ?>" + id_pelayanan;

        window.open(url, '_blank');
    }
</script>