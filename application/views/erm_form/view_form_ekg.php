<?php

/** @var string $id_pelayanan */
/** @var string $id_history */
/** @var object $selectPasien */
/** @var object $list_penolong */
/** @var object $dokter */
/** @var object $ruangan */
/** @var object $ruangan_pasien */
/** @var object $url_back */

?>
<div class="row">
    <div class="col-sm-12">
        <div id="top"></div>
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title"
                        style="display:inline-block; background:#3cb878; color:white; padding:5px 12px;">
                        FORM EKG
                    </h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php if ($this->session->flashdata('success')): ?>
                <script>
                    alert("<?= $this->session->flashdata('success'); ?>");
                </script>
            <?php endif; ?>
            <form method="post" id="form_ekg" action="<?= base_url('Erm_form_ekg/simpan') ?>">
                <input type="hidden" id="url_back" value="<?= $url_back ?>">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">

                        <div class="form-group">
                            <input type="hidden" name="id_pelayanan" value="<?= $id_pelayanan ?>">
                            <input type="hidden" name="id_history" value="<?= $id_history ?>">

                            <input type="hidden" id="mode" value="<?= !empty($ekg) ? 'update' : 'simpan' ?>">

                            <div class="col-md-2 mt-10">
                                <label class="control-label mb-10 text-left">Nomor RM</label>
                                <div class="has-success">
                                    <input type="text" class="form-control" id="inNoRM" value="<?= $selectPasien->no_rm ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-3 mt-10">
                                <label class="control-label mb-10 text-left">Nama Pasien</label>
                                <div class="has-success">
                                    <input type="text" class="form-control" id="inNamapasien" value="<?= $selectPasien->nama ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-2 mt-10">
                                <label class="control-label mb-10 text-left">Tanggal Lahir</label>
                                <div class="has-success">
                                    <input type="date" class="form-control" id="inTanggallahir" value="<?= $selectPasien->tgl_lahir ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-2 mt-10">
                                <label class="control-label mb-10 text-left">Cara Bayar</label>
                                <div class="has-success">
                                    <input type="text" class="form-control" id="inNama" value="<?= $cara_bayar->nama ?? '' ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 mt-10">
                                <label class="control-label mb-10 text-left">Tanggal Pemeriksaan</label>
                                <div class="has-success">
                                    <input type="datetime-local" class="form-control" id="tanggal" name="tanggal"
                                        value="<?=
                                                !empty($ekg->tanggal_pemeriksaan)
                                                    ? date('Y-m-d\TH:i', strtotime($ekg->tanggal_pemeriksaan))
                                                    : date('Y-m-d\TH:i', strtotime($selectPasien->tgl_masuk))
                                                ?>">
                                    <span id="tanggal_error" class="text-danger"></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <?php
                            $irama_val = '';
                            if (isset($ekg) && $ekg != null) {
                                $split = explode(',', $ekg->irama);
                                $irama_val = trim($split[0]);
                            }
                            ?>
                            <div class="form-group">
                                <div class="col-md-1 mt-30">
                                    <label class="control-label text-left">Irama</label>
                                </div>
                                <div class="col-md-1 mt-30" style="text-align: right;">:</div>
                                <div class="col-md-2 mt-30">
                                    <label class="custom-radio">
                                        <input type="radio" name="irama" value="Teratur"
                                            <?= ($irama_val == 'Teratur') ? 'checked' : '' ?>>
                                        <span class="checkmark"></span>
                                        Teratur
                                    </label>
                                </div>
                                <div class="col-md-2 mt-30">
                                    <label class="custom-radio">
                                        <input type="radio" name="irama" value="Tidak Teratur"
                                            <?= ($irama_val == 'Tidak Teratur') ? 'checked' : '' ?>>
                                        <span class="checkmark"></span>
                                        Tidak Teratur
                                    </label>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <?php
                            $gelombangp_val = '';
                            if (isset($ekg) && $ekg != null) {
                                $split = explode(',', $ekg->gelombang_p);
                                $gelombangp_val = trim($split[0]);
                            }
                            ?>
                            <div class="form-group">
                                <div class="col-md-1 mt-20 mb">
                                    <label class="control-label text-left" style="white-space: nowrap;">
                                        Gelombang P
                                    </label>
                                </div>
                                <div class="col-md-1 mt-20" style="text-align: right;">:</div>
                                <div class="col-md-2 mt-20">
                                    <label class="custom-radio">
                                        <input type="radio" name="gelombang_p" value="Normal"
                                            <?= ($gelombangp_val == 'Normal') ? 'checked' : '' ?>>
                                        <span class="checkmark"></span>
                                        Normal
                                    </label>
                                </div>
                                <div class="col-md-2 mt-20">
                                    <label class="custom-radio">
                                        <input type="radio" name="gelombang_p" value="Pulmonal"
                                            <?= ($gelombangp_val == 'Pulmonal') ? 'checked' : '' ?>>
                                        <span class="checkmark"></span>
                                        Pulmonal
                                    </label>
                                </div>
                                <div class="col-md-3 mt-20">
                                    <label class="custom-radio">
                                        <input type="radio" name="gelombang_p" value="Mitral"
                                            <?= ($gelombangp_val == 'Mitral') ? 'checked' : '' ?>>
                                        <span class="checkmark"></span>
                                        Mitral
                                    </label>
                                </div>
                                <span id="gelombangp_error" class="text-danger"></span>
                                <div class="clearfix"></div>
                            </div>

                            <!-- PR INTERVAL -->
                            <?php
                            $printerval_val = '';
                            $printerval_ket = '';

                            if (isset($ekg) && $ekg != null && $ekg->pr_interval != '') {
                                $split = explode(',', $ekg->pr_interval);
                                $printerval_val = trim($split[0]);
                                if (count($split) > 1) {
                                    $printerval_ket = trim($split[1]);
                                }
                            }
                            ?>
                            <div class="form-group">
                                <div class="col-md-1 mt-20 mb-10">
                                    <label class="control-label text-left" style="white-space: nowrap;">
                                        PR Interval
                                    </label>
                                </div>
                                <div class="col-md-1 mt-20" style="text-align: right;">:</div>
                                <div class="col-md-2 mt-20">
                                    <label class="custom-radio">
                                        <input type="radio" name="pr_interval" value="Normal"
                                            <?= ($printerval_val == 'Normal') ? 'checked' : '' ?>>
                                        <span class="checkmark"></span>
                                        Normal
                                    </label>
                                </div>
                                <div class="col-md-2 mt-20">
                                    <label class="custom-radio">
                                        <input type="radio" name="pr_interval" value="Abnormal"
                                            <?= ($printerval_val == 'Abnormal') ? 'checked' : '' ?>>
                                        <span class="checkmark"></span>
                                        Abnormal
                                    </label>
                                </div>
                                <div class="has-success col-md-3 mt-20" id="wrap_pr_interval" style="display: none;">
                                    <input type="text"
                                        value="<?= $printerval_ket ?>"
                                        class="form-control"
                                        name="abnormal_ket1"
                                        id="abnormal_ket1"
                                        placeholder="Masukkan keterangan"
                                        style="width: 490px; margin-left:-100px; margin-top:-12px;">
                                </div>
                                <span id="printerval_error" class="text-danger"></span>
                                <div class="clearfix"></div>
                            </div>

                            <!-- KOMPLEKS QRS -->
                            <?php
                            $kompleksqrs_val = '';
                            $kompleksqrs_ket = '';

                            if (isset($ekg) && $ekg != null && $ekg->kompleks_qrs != '') {
                                $split = explode(',', $ekg->kompleks_qrs);
                                $kompleksqrs_val = trim($split[0]);
                                if (count($split) > 1) {
                                    $kompleksqrs_ket = trim($split[1]);
                                }
                            }
                            ?>
                            <div class="form-group">
                                <div class="col-md-1 mt-20 mb-10">
                                    <label class="control-label text-left" style="white-space: nowrap;">
                                        Kompleks QRS
                                    </label>
                                </div>
                                <div class="col-md-1 mt-20" style="text-align: right;">:</div>
                                <div class="col-md-2 mt-20">
                                    <label class="custom-radio">
                                        <input type="radio" name="kompleks_qrs" value="Normal"
                                            <?= ($kompleksqrs_val == 'Normal') ? 'checked' : '' ?>>
                                        <span class="checkmark"></span>
                                        Normal
                                    </label>
                                </div>
                                <div class="col-md-2 mt-20">
                                    <label class="custom-radio">
                                        <input type="radio" name="kompleks_qrs" value="Abnormal"
                                            <?= ($kompleksqrs_val == 'Abnormal') ? 'checked' : '' ?>>
                                        <span class="checkmark"></span>
                                        Abnormal
                                    </label>
                                </div>
                                <div class="has-success col-md-3 mt-20" id="wrap_kompleks_qrs" style="display: none;">
                                    <input type="text"
                                        value="<?= $kompleksqrs_ket ?>"
                                        class="form-control"
                                        name="abnormal_ket2"
                                        id="abnormal_ket2"
                                        placeholder="Masukkan keterangan"
                                        style="width: 490px; margin-left:-100px; margin-top:-12px;">
                                </div>
                                <span id="kompleksqrs_error" class="text-danger"></span>
                                <div class="clearfix"></div>
                            </div>

                            <!-- Q PATHOLOGIS -->
                            <?php
                            $qpathologis_val = '';
                            $qpathologis_ket = '';

                            if (isset($ekg) && $ekg != null && $ekg->q_pathologis != '') {
                                $split = explode(',', $ekg->q_pathologis);
                                $qpathologis_val = trim($split[0]);
                                if (count($split) > 1) {
                                    $qpathologis_ket = trim($split[1]);
                                }
                            }
                            ?>
                            <div class="form-group">
                                <div class="col-md-1 mt-20 mb-10">
                                    <label class="control-label text-left" style="white-space: nowrap;">
                                        Q Pathologis
                                    </label>
                                </div>
                                <div class="col-md-1 mt-20" style="text-align: right;">:</div>
                                <div class="col-md-2 mt-20">
                                    <label class="custom-radio">
                                        <input type="radio" name="q_pathologis" value="Tidak Ada"
                                            <?= ($qpathologis_val == 'Tidak Ada') ? 'checked' : '' ?>>
                                        <span class="checkmark"></span>
                                        Tidak Ada
                                    </label>
                                </div>
                                <div class="col-md-2 mt-20">
                                    <label class="custom-radio">
                                        <input type="radio" name="q_pathologis" value="Ada"
                                            <?= ($qpathologis_val == 'Ada') ? 'checked' : '' ?>>
                                        <span class="checkmark"></span>
                                        Ada, Lead
                                    </label>
                                </div>
                                <div class="has-success col-md-3 mt-20" id="wrap_q_pathologis" style="display: none;">
                                    <input type="text"
                                        value="<?= $qpathologis_ket ?>"
                                        class="form-control"
                                        name="ada_ket1"
                                        id="ada_ket1"
                                        placeholder="Masukkan keterangan"
                                        style="width: 490px; margin-left:-100px; margin-top:-12px;">
                                </div>
                                <span id="qpathologis_error" class="text-danger"></span>
                                <div class="clearfix"></div>
                            </div>

                            <!-- ST SEGMEN -->
                            <?php
                            $stsegmen_val = '';
                            $stsegmen_ket = '';

                            if (isset($ekg) && $ekg != null && $ekg->st_segmen != '') {
                                $split = explode(',', $ekg->st_segmen);
                                $stsegmen_val = trim($split[0]);
                                if (count($split) > 1) {
                                    $stsegmen_ket = trim($split[1]);
                                }
                            }
                            ?>
                            <div class="form-group">
                                <div class="col-md-1 mt-20 mb-10">
                                    <label class="control-label text-left" style="white-space: nowrap;">
                                        ST Segmen
                                    </label>
                                </div>
                                <div class="col-md-1 mt-20" style="text-align: right;">:</div>
                                <div class="col-md-2 mt-20">
                                    <label class="custom-radio">
                                        <input type="radio" name="st_segmen" value="Isoelektris"
                                            <?= ($stsegmen_val == 'Isoelektris') ? 'checked' : '' ?>>
                                        <span class="checkmark"></span>
                                        Isoelektris
                                    </label>
                                </div>
                                <div class="col-md-2 mt-20">
                                    <label class="custom-radio">
                                        <input type="radio" name="st_segmen" value="Elevasi/Depresi"
                                            <?= ($stsegmen_val == 'Elevasi/Depresi') ? 'checked' : '' ?>>
                                        <span class="checkmark"></span>
                                        Elevasi/Depresi*, Lead
                                    </label>
                                </div>
                                <div class="has-success col-md-3 mt-20" id="wrap_st_segmen" style="display: none;">
                                    <input type="text"
                                        value="<?= $stsegmen_ket ?>"
                                        class="form-control"
                                        name="elevasi_ket"
                                        id="elevasi_ket"
                                        placeholder="Masukkan keterangan"
                                        style="width: 409px; margin-left:-20px; margin-top:-12px;">
                                </div>
                                <span id="stsegmen_error" class="text-danger"></span>
                                <div class="clearfix"></div>
                            </div>

                            <!-- T Inverted -->
                            <?php
                            $tinverted_val = '';
                            $tinverted_ket = '';

                            if (isset($ekg) && $ekg != null && $ekg->t_inverted != '') {
                                $split = explode(',', $ekg->t_inverted);
                                $tinverted_val = trim($split[0]);
                                if (count($split) > 1) {
                                    $tinverted_ket = trim($split[1]);
                                }
                            }
                            ?>
                            <div class="form-group">
                                <div class="col-md-1 mt-20 mb-10">
                                    <label class="control-label text-left" style="white-space: nowrap;">
                                        T Inverted
                                    </label>
                                </div>
                                <div class="col-md-1 mt-20" style="text-align: right;">:</div>
                                <div class="col-md-2 mt-20">
                                    <label class="custom-radio">
                                        <input type="radio" name="t_inverted" value="Tidak Ada"
                                            <?= ($tinverted_val == 'Tidak Ada') ? 'checked' : '' ?>>
                                        <span class="checkmark"></span>
                                        Tidak Ada
                                    </label>
                                </div>
                                <div class="col-md-2 mt-20">
                                    <label class="custom-radio">
                                        <input type="radio" name="t_inverted" value="Ada"
                                            <?= ($tinverted_val == 'Ada') ? 'checked' : '' ?>>
                                        <span class="checkmark"></span>
                                        Ada, Lead
                                    </label>
                                </div>
                                <div class="has-success col-md-3 mt-20" id="wrap_t_inverted" style="display: none;">
                                    <input type="text"
                                        value="<?= $tinverted_ket ?>"
                                        class="form-control"
                                        name="ada_ket2"
                                        id="ada_ket2"
                                        placeholder="Masukkan keterangan"
                                        style="width: 490px; margin-left:-100px; margin-top:-12px;">
                                </div>
                                <span id="tinverted_error" class="text-danger"></span>
                                <div class="clearfix"></div>
                            </div>

                            <?php
                            $kesimpulan_val = '';
                            if (isset($ekg) && $ekg != null) {
                                $split = explode(',', $ekg->kesimpulan);
                                $kesimpulan_val = trim($split[0]);
                            }
                            ?>
                            <div class="form-group">
                                <div class="col-md-1 mt-20 mb-10">
                                    <label class="control-label text-left" style="white-space: nowrap;">
                                        Kesimpulan
                                    </label>
                                </div>
                                <div class="col-md-1 mt-20" style="text-align: right;">:</div>
                                <div class="has-success col-md-1 mt-30">
                                    <textarea
                                        class="form-control"
                                        name="kesimpulan"
                                        id="kesimpulan"
                                        placeholder="Masukkan keterangan"
                                        style="width: 810px; margin-left:-1px; margin-top:-20px; height:120px; resize:none;"><?= $kesimpulan_val ?></textarea>
                                </div>
                                <span id="kesimpulan_error" class="text-danger"></span>
                                <div class="clearfix"></div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 mt-20 text-right">
                                    <a href="javascript:history.back()" class="btn btn-default" style="margin-right:10px;">Kembali</a>
                                    <?php if (!empty($ekg)) : ?>
                                        <button type="button" id="btnSimpan" style="margin-right:10px;" onclick="simpan()" class="btn btn-warning">
                                            Update
                                        </button>
                                    <?php else : ?>
                                        <button type="button" id="btnSimpan" style="margin-right:10px;" onclick="simpan()" class="btn btn-success">
                                            Simpan
                                        </button>
                                    <?php endif; ?>

                                    <button type="button" class="btn btn-primary" style="margin-right:10px;" onclick="cetak()">Cetak</button>
                                </div>
                            </div>

                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>

<script>
    // RADIO + KETERANGAN
    $(document).ready(function() {
        $('input[name="pr_interval"]').on('change', function() {
            if ($(this).val() === 'Abnormal') {
                $('#wrap_pr_interval').show();
            } else {
                $('#wrap_pr_interval').hide();
                $('#wrap_pr_interval input').val('');
            }
        });

        $('input[name="kompleks_qrs"]').on('change', function() {
            if ($(this).val() === 'Abnormal') {
                $('#wrap_kompleks_qrs').show();
            } else {
                $('#wrap_kompleks_qrs').hide();
                $('#wrap_kompleks_qrs input').val('');
            }
        });

        $('input[name="q_pathologis"]').on('change', function() {
            if ($(this).val() === 'Ada') {
                $('#wrap_q_pathologis').show();
            } else {
                $('#wrap_q_pathologis').hide();
                $('#wrap_q_pathologis input').val('');
            }
        });

        $('input[name="st_segmen"]').on('change', function() {
            if ($(this).val() === 'Elevasi/Depresi') {
                $('#wrap_st_segmen').show();
            } else {
                $('#wrap_st_segmen').hide();
                $('#wrap_st_segmen input').val('');
            }
        });

        $('input[name="t_inverted"]').on('change', function() {
            if ($(this).val() === 'Ada') {
                $('#wrap_t_inverted').show();
            } else {
                $('#wrap_t_inverted').hide();
                $('#wrap_t_inverted input').val('');
            }
        });
    });

    $(document).ready(function() {

        let el = document.getElementById('tanggal');

        if (!el) return;

        let lastValidValue = el.value;

        el.addEventListener('change', function() {

            let selected = new Date(this.value);
            let now = new Date();

            // reset jam menit detik
            selected.setHours(0, 0, 0, 0);
            now.setHours(0, 0, 0, 0);

            if (selected > now) {

                swal({
                    title: "Tidak valid!",
                    text: "Tanggal tidak boleh melebihi waktu sekarang",
                    type: "warning",
                    confirmButtonColor: "#f7ad68",
                    confirmButtonText: "OK"
                }, () => {
                    el.value = lastValidValue;
                });

            } else {
                lastValidValue = this.value;
            }

        });

    });

    function simpan() {

        let btn = $('#btnSimpan');
        let formData = $('#form_ekg').serialize();
        let mode = $('#mode').val();

        let url = (mode === 'update') ?
            "<?= base_url('Erm_form_ekg/update') ?>" :
            "<?= base_url('Erm_form_ekg/simpan') ?>";

        let isValid = true;

        if (!$('input[name="irama"]:checked').val()) isValid = false;
        if (!$('input[name="gelombang_p"]:checked').val()) isValid = false;
        if (!$('input[name="pr_interval"]:checked').val()) isValid = false;
        if (!$('input[name="kompleks_qrs"]:checked').val()) isValid = false;
        if (!$('input[name="q_pathologis"]:checked').val()) isValid = false;
        if (!$('input[name="st_segmen"]:checked').val()) isValid = false;
        if (!$('input[name="t_inverted"]:checked').val()) isValid = false;

        let kesimpulan = $('#kesimpulan').val();
        if (kesimpulan.trim() === '') isValid = false;

        if (!isValid) {
            swal({
                title: "Form Belum Lengkap",
                text: "Semua field wajib dipilih!",
                type: "warning"
            });
            return;
        }

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            dataType: "json",

            beforeSend: function() {
                btn.prop('disabled', true).text('Menyimpan...');
            },

            //MODAL SIMPAN/UPDATE
            success: function(res) {

                if (res.status === 'success') {

                    let pesan = (mode === 'update') ?
                        "Data berhasil diupdate" :
                        "Data berhasil disimpan";

                    swal({
                        title: "Berhasil!",
                        text: pesan,
                        type: "success",
                        confirmButtonText: "Oke",
                        confirmButtonColor: "#3ac66b"
                    }, function() {

                        //AUTO SCROLL
                        window.scrollTo(0, 0);

                        setTimeout(function() {
                            location.reload();
                        }, 50);

                    });
                } else {
                    swal({
                        title: "Gagal!",
                        text: res.message,
                        type: "warning"
                    });
                }
            },

            complete: function() {
                btn.prop('disabled', false).text(mode === 'update' ? 'Update' : 'Simpan');
            }
        });
    }

    function validateRadio(name, errorId) {
        let checked = $('input[name="' + name + '"]:checked').val();

        if (!checked) {
            $('#' + errorId).text('wajib pilih');
            return false;
        } else {
            $('#' + errorId).text('');
            return true;
        }
    }

    //TAMPIL DATA
    $(document).ready(function() {

        function toggleField(name, wrapId) {
            let val = $('input[name="' + name + '"]:checked').val();

            if (val === 'Abnormal' || val === 'Ada' || val === 'Elevasi/Depresi') {
                $('#' + wrapId).show();
            } else {
                $('#' + wrapId).hide();
            }
        }

        toggleField('pr_interval', 'wrap_pr_interval');
        toggleField('kompleks_qrs', 'wrap_kompleks_qrs');
        toggleField('q_pathologis', 'wrap_q_pathologis');
        toggleField('st_segmen', 'wrap_st_segmen');
        toggleField('t_inverted', 'wrap_t_inverted');

        $('input[type="radio"]').change(function() {
            toggleField('pr_interval', 'wrap_pr_interval');
            toggleField('kompleks_qrs', 'wrap_kompleks_qrs');
            toggleField('q_pathologis', 'wrap_q_pathologis');
            toggleField('st_segmen', 'wrap_st_segmen');
            toggleField('t_inverted', 'wrap_t_inverted');
        });

    });

    //AUTO SCROLL
    $(document).ready(function() {
        if (window.location.hash === "#top") {
            setTimeout(function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'instant'
                });
            }, 200);
        }
    });

    function setMaxDateTime() {
        let now = new Date();

        let year = now.getFullYear();
        let month = String(now.getMonth() + 1).padStart(2, '0');
        let day = String(now.getDate()).padStart(2, '0');
        let hours = String(now.getHours()).padStart(2, '0');
        let minutes = String(now.getMinutes()).padStart(2, '0');

        let maxDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;

        document.getElementById('tanggal').setAttribute('max', maxDateTime);
    }

    // jalan saat load
    setMaxDateTime();

    // update terus biar real-time (optional tapi bagus)
    setInterval(setMaxDateTime, 60000); // tiap 1 menit

    function cetak() {
        let id_pelayanan = document.querySelector('input[name="id_pelayanan"]').value;
        let id_history = document.querySelector('input[name="id_history"]').value;

        let url = "<?= base_url('Erm_form_ekg/cetak/') ?>" + id_pelayanan + "/" + id_history;

        window.open(url, '_blank');
    }
</script>

<style>
    .custom-radio {
        display: inline-flex;
        align-items: center;
        cursor: pointer;
        gap: 8px;
    }

    .custom-radio input {
        display: none;
        /* sembunyikan radio asli */
    }

    .checkmark {
        width: 18px;
        height: 18px;
        border: 2px solid #555;
        border-radius: 4px;
        /* bikin kotak */
        display: inline-block;
        position: relative;
    }

    /* ceklis muncul saat dipilih */
    .custom-radio input:checked+.checkmark::after {
        content: "✔";
        position: absolute;
        top: -2px;
        left: 2px;
        font-size: 14px;
        color: green;
    }

    .custom-radio {
        color: #000 !important;
        /* biar hitam pekat */
        opacity: 1 !important;
        /* hilangin efek transparan */
        font-weight: 500;
        /* agak ditebelin */
    }

    .custom-radio span,
    .custom-radio label {
        color: #000 !important;
    }

    .divider {
        width: 100%;
        /* biar nggak full, jadi keliatan center */
        height: 1px;
        background-color: #ccc;
        margin: 50px auto;
        /* 20px atas bawah, auto kiri kanan = center */
    }
</style>