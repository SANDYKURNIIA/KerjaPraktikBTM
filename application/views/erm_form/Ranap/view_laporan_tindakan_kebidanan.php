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
        <div class="panel panel-default card-view">
            <div id="topForm"></div>
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title"
                        style="display:inline-block; background:#3cb878; color:white; padding:5px 12px;">
                        FORM LAPORAN TINDAKAN KEBIDANAN
                    </h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php if ($this->session->flashdata('success')): ?>
                <script>
                    alert("<?= $this->session->flashdata('success'); ?>");
                </script>
            <?php endif; ?>
            <form method="post" id="formlaporankebidanan" action="<?= base_url('Erm_laporan_tindakan_kebidanan/simpan') ?>">
                <input type="hidden" id="url_back" value="<?= $url_back ?>">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-group">
                            <input type="hidden" name="id_pelayanan" value="<?= $id_pelayanan ?>">
                            <input type="hidden" name="id_history" value="<?= $id_history ?>">

                            <div class="col-md-3 mt-10">
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
                            <div class="col-md-3 mt-10">
                                <label class="control-label mb-10 text-left">Tanggal Lahir</label>
                                <div class="has-success">
                                    <input type="date" class="form-control" id="inTanggallahir" value="<?= $selectPasien->tgl_lahir ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-3 mt-10">
                                <label class="control-label mb-10 text-left">Alamat</label>
                                <div class="has-success">
                                    <input type="text" class="form-control" id="inAlamat" value="<?= $selectPasien->alamat ?>" disabled>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 mt-10">
                                <label class="control-label mb-10 text-left">Jenis Persalinan</label>
                                <div class="has-success">
                                    <input type="text" class="form-control" name="jenis_persalinan" id="inJenispersalinan"
                                        value="<?= isset($laporan->jenis_persalinan) ? $laporan->jenis_persalinan : '' ?>" placeholder="Masukkan jenis persalinan">
                                    <small class="text-danger error-jenis_persalinan"></small>
                                </div>
                            </div>
                            <div class="col-md-5 mt-10">
                                <label class="control-label mb-10 text-left">Penolong</label>
                                <div class="has-success">
                                    <select class="form-control select2" name="penolong" required>
                                        <option value="">-- PILIH PENOLONG --</option>
                                        <?php foreach ($list_penolong as $p): ?>
                                            <option value="<?= $p->id_staff ?>"
                                                <?= (isset($laporan->penolong) && $laporan->penolong == $p->nama) ? 'selected' : '' ?>>
                                                <?= $p->nama ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="text-danger error-penolong"></small>
                                </div>
                            </div>
                            <div class="col-md-4 mt-10">
                                <label class="control-label mb-10 text-left">Asisten</label>
                                <div class="has-success">
                                    <select class="form-control select2" name="asisten" required>
                                        <option value="">-- PILIH ASISTEN --</option>
                                        <?php foreach ($list_penolong as $p): ?>
                                            <option value="<?= $p->id_staff ?>"
                                                <?= (isset($laporan->asisten) && $laporan->asisten == $p->nama) ? 'selected' : '' ?>>
                                                <?= $p->nama ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="text-danger error-asisten"></small>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3 mt-10">
                                <label class="control-label mb-10 text-left">Tanggal & Waktu</label>
                                <div class="has-success">
                                    <input type="datetime-local" class="form-control" name="tanggal"
                                        value="<?=
                                                isset($laporan->tanggal)
                                                    ? date('Y-m-d\TH:i', strtotime($laporan->tanggal))
                                                    : date('Y-m-d\TH:i')
                                                ?>" required>
                                    <small class="text-danger error-tanggal"></small>
                                </div>
                            </div>
                            <div class="col-md-9 mt-10">
                                <label class="control-label mb-10 text-left">Jalannya Persalinan/Tindakan</label>
                                <div class="has-success">
                                    <textarea class="form-control" name="jalannya_persalinan" rows="3"
                                        placeholder="Masukkan jalannya persalinan/tindakan"><?= isset($laporan->jalannya_persalinan) ? $laporan->jalannya_persalinan : '' ?></textarea></textarea>
                                </div>
                                <small class="text-danger error-jalannya_persalinan"></small>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 mt-20 text-right">
                                <a href="javascript:history.back()" class="btn btn-default" style="margin-right:10px;">Kembali</a>
                                <?php if (!empty($laporan)) : ?>
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
    // SIMPAN
    function simpan() {
        console.log("=== SIMPAN DIJALANKAN ===");

        let form = $('#formlaporankebidanan');

        let tanggal = form.find('[name="tanggal"]').val();
        let penolong = form.find('[name="penolong"]').val();
        let asisten = form.find('[name="asisten"]').val();

        console.log("tanggal:", tanggal);
        console.log("penolong:", penolong);
        console.log("asisten:", asisten);

        $('.text-danger').html('');
        $('.form-control').removeClass('is-invalid');

        let isValid = true;

        if (!tanggal) {
            $('.error-tanggal').html('*Tanggal & waktu wajib diisi');
            $('[name="tanggal"]').addClass('is-invalid');
            isValid = false;
        }

        if (!penolong) {
            $('.error-penolong').html('*Pilih penolong');
            $('[name="penolong"]').addClass('is-invalid');
            isValid = false;
        }

        if (!asisten) {
            $('.error-asisten').html('*Pilih asisten');
            $('[name="asisten"]').addClass('is-invalid');
            isValid = false;
        }

        let jenis = form.find('[name="jenis_persalinan"]').val();
        if (!jenis) {
            $('.error-jenis_persalinan').html('*Jenis persalinan wajib diisi');
            $('[name="jenis_persalinan"]').addClass('is-invalid');
            isValid = false;
        }

        let jalan = form.find('[name="jalannya_persalinan"]').val();
        if (!jalan) {
            $('.error-jalannya_persalinan').html('*Jalannya persalinan wajib diisi');
            $('[name="jalannya_persalinan"]').addClass('is-invalid');
            isValid = false;
        }

        if (!isValid) {
            return;
        }

        let btn = $('#btnSimpan');

        btn.prop('disabled', true).text('Menyimpan...');

        $.ajax({
            url: "<?= base_url('Erm_laporan_tindakan_kebidanan/simpan') ?>",
            type: "POST",
            data: form.serialize(),
            dataType: "json",

            beforeSend: function() {
                console.log("Mengirim data...");
            },

            // MODAL SIMPAN
            success: function(res) {

                console.log("Response:", res);

                if (res.status === 'success') {

                    swal({
                        title: "Berhasil!",
                        text: res.message,
                        type: "success",
                        showCancelButton: true,
                        confirmButtonColor: "#3cb878",
                        cancelButtonColor: "#f7ad68",
                        confirmButtonText: "OKE",
                        cancelButtonText: "Keluar"
                    }, function(isConfirm) {

                        if (!isConfirm) {
                            var urlBack = document.getElementById('url_back').value;
                            if (urlBack) {
                                window.location.href = urlBack;
                            }
                        } else {
                            location.reload();
                        }

                    });

                } else {
                    swal({
                        title: "Gagal!",
                        text: res.message,
                        type: "warning"
                    });
                }

            },

            error: function(xhr) {
                console.log("ERROR:", xhr.responseText);
                alert('Terjadi kesalahan pada server!');
            },

            complete: function() {
                btn.prop('disabled', false).text('Simpan');
                console.log("=== SELESAI ===");
            }
        });
    }

    // CEK DATA
    function cekLaporanKebidanan() {
        console.log("ID JS:", "<?= $id_pelayanan ?>");
        $.ajax({
            url: "<?= base_url('Erm_laporan_tindakan_kebidanan/cek_laporan') ?>",
            type: "POST",
            dataType: "json",
            data: {
                id_pelayanan: "<?= $id_pelayanan ?>"
            },
            success: function(data) {

                let btn = $('.laporan_tindakan_kebidanan');

                if (data.status === "found") {
                    btn.removeClass('btn-success').addClass('btn-danger');
                } else {
                    btn.removeClass('btn-danger').addClass('btn-success');
                }
            }
        });
    }

    // CETAK LAPORAN
    function cetak() {
        let id = "<?= $id_pelayanan ?>";
        window.open("<?= base_url('Erm_laporan_tindakan_kebidanan/cetak/') ?>" + id, '_blank');
    }
</script>