<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Vars:
 * $no_rm,$nama,$tgl_lahir,$alamat,$telepon,$jenis_kelamin,
 * $tgl_pemeriksaan,$dpjp_nama,$diagnosis_fungsional,$diagnosis_medis,
 * $id_pelayanan,$id_history,$lembar,$sudah_isi
 */
$instrumen   = isset($lembar->instrumen) ? $lembar->instrumen : '';
$hasil       = isset($lembar->hasil) ? $lembar->hasil : '';
$kesimpulan  = isset($lembar->kesimpulan) ? $lembar->kesimpulan : '';
$rekomendasi = isset($lembar->rekomendasi) ? $lembar->rekomendasi : '';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Uji Fungsi Setelah Rehab</h6>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="panel-wrapper collapse in">
                <div class="panel-body">

                    <form id="formUjiFungsi" method="post">
                        <input type="hidden" name="id_pelayanan" value="<?= html_escape($id_pelayanan) ?>">
                        <input type="hidden" name="id_history" value="<?= html_escape($id_history) ?>">
                        <input type="hidden" name="no_rm" value="<?= html_escape($no_rm) ?>">

                        <h6 class="txt-dark mb-10">Data Pasien</h6>
                        <div class="row mb-3">
                            <div class="form-group col-md-4">
                                <label>No.RM</label>
                                <input type="text" class="form-control" value="<?= html_escape($no_rm) ?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Nama</label>
                                <input type="text" class="form-control" value="<?= html_escape($nama) ?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Jenis Kelamin</label>
                                <input type="text" class="form-control" value="<?= html_escape($jenis_kelamin) ?>" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="form-group col-md-6">
                                <label>Tanggal Lahir / Usia</label>
                                <input type="text" class="form-control" value="<?php
                                if (!empty($tgl_lahir)) {
                                    $date = new DateTime($tgl_lahir);
                                    $now = new DateTime();
                                    $interval = $now->diff($date);
                                    echo date('d-m-Y', strtotime($tgl_lahir)) . ' / ' . $interval->y . ' Tahun';
                                }
                                ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Alamat</label>
                                <input type="text" class="form-control" value="<?= html_escape($alamat) ?>" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="form-group col-md-6">
                                <label>No.HP</label>
                                <input type="text" class="form-control" value="<?= html_escape($telepon) ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tanggal Pemeriksaan</label>
                                <input type="text" class="form-control"
                                    value="<?= !empty($tgl_pemeriksaan) ? date('d-m-Y', strtotime($tgl_pemeriksaan)) : '' ?>"
                                    disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <label>Dokter Pelaksana Tindakan (DPJP)</label>
                                <input type="text" class="form-control" value="<?= html_escape($dpjp_nama) ?>" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="form-group col-md-6">
                                <label>Diagnosis Fungsional</label>
                                <textarea class="form-control" rows="3" disabled><?= html_escape($diagnosis_fungsional) ?></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Diagnosis Medis</label>
                                <textarea class="form-control" rows="3" disabled><?= html_escape($diagnosis_medis) ?></textarea>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="form-group col-md-6">
                                <label>Instrumen Uji Fungsi / Prosedur KFR</label>
                                <textarea class="form-control form-control-sm" rows="2" name="instrumen" id="instrumen"><?= html_escape($instrumen) ?></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Hasil yang Didapat</label>
                                <textarea class="form-control form-control-sm" rows="2" name="hasil" id="hasil"><?= html_escape($hasil) ?></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="form-group col-md-6">
                                <label>Kesimpulan</label>
                                <textarea class="form-control form-control-sm" rows="2" name="kesimpulan" id="kesimpulan"><?= html_escape($kesimpulan) ?></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Rekomendasi</label>
                                <textarea class="form-control form-control-sm" rows="2" name="rekomendasi" id="rekomendasi"><?= html_escape($rekomendasi) ?></textarea>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12 d-flex">
                                <button type="button" onclick="history.back()" class="btn btn-default btn-anim btn-sm me-2" style="min-width:100px;height:36px;">
                                    <i class="fa fa-arrow-left"></i> <span class="btn-text">KEMBALI</span>
                                </button>
                                <button type="submit" id="btnSimpan" class="btn btn-success btn-sm" style="min-width:100px;height:36px;">
                                    <i class="fa fa-save"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </form>

                    <div id="ajax-alert-area" class="mt-3"></div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
(function ($) {
    $(function () {
        $('#formUjiFungsi').on('submit', function (e) {
            e.preventDefault();
            // $('#btnSimpan').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Menyimpan...');
            $('#ajax-alert-area').empty();

            $.ajax({
                url: "<?= site_url('Lembar_uji_fungsi/simpan') ?>",
                type: "POST",
                data: $(this).serialize(),
                dataType: "json",
              success: function (res) {
    if (res && res.status === 'success') {
        // Menampilkan SweetAlert
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: res.message || 'Berhasil menyimpan.',
            confirmButtonText: 'OK'
        }).then(function() {
            // Redirect setelah OK pada popup
            if (document.referrer) {
                window.location.href = document.referrer;
            } else {
                history.back();
            }
        });

        // set flag ke session supaya dashboard tahu tombol harus merah
        <?php if (isset($id_pelayanan) && isset($id_history)) : ?>
        sessionStorage.setItem('lembar_ujifungsi_<?= $id_pelayanan ?>', '1');
        <?php endif; ?>
    } else {
        var msg = (res && res.message) ? res.message : 'Gagal menyimpan data.';
        popup('error', msg);
    }
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

,
                error: function (xhr, st, err) {
                    var msg = 'Error AJAX: ' + (err || 'unknown');
                    if (xhr && xhr.responseText) {
                        msg += ' • ' + xhr.responseText.substring(0, 200);
                    }
                    popup('error', msg);
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                },
                complete: function () {
                    $('#btnSimpan').prop('disabled', false).html('<i class="fa fa-save"></i> Simpan');
                }
            });
        });

        // Popup sederhana (fallback jika tidak ada SweetAlert)
        function popup(type, text) {
            if (window.Swal && Swal.fire) {
                Swal.fire({
                    icon: (type === 'success' ? 'success' : 'error'),
                    title: (type === 'success' ? 'Berhasil' : 'Gagal'),
                    text: text,
                    confirmButtonText: 'OK'
                });
            } else {
                var html = '<div class="alert alert-' + (type === 'success' ? 'success' : 'danger') + ' alert-dismissible fade show" role="alert">'
                    + '<strong>' + (type === 'success' ? 'Berhasil! ' : 'Error: ') + '</strong>' + escapeHtml(text)
                    + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
                    + '</div>';
                $('#ajax-alert-area').html(html);
            }
        }

        function escapeHtml(text) {
            if (!text) return '';
            return text.replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }
    });
})(jQuery);
</script>