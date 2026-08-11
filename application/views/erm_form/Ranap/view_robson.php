<!-- view_robson.php - Versi Terbaru dengan Tabel -->
<style>
    /* Semua label dan teks judul menjadi hitam pekat */
    label,
    .control-label,
    .txt-dark,
    strong,
    .panel-title,
    .form-group label,
    .radio-inline label,
    .has-success label {
        color: #000 !important;
    }

    /* Opsi default "-- Pilih --" pada select tampil abu-abu seperti placeholder */
    select.form-control:invalid,
    select.form-control option[value=""] {
        color: #999 !important;
    }

    /* Setelah dipilih (value tidak kosong), teks kembali hitam */
    select.form-control option:not([value=""]) {
        color: #000 !important;
    }

    /* Teks input dan textarea hitam */
    .form-control {
        color: #000 !important;
    }

    .form-control::placeholder {
        color: #999;
    }

    textarea.form-control {
        resize: vertical;
    }

    /* Untuk radio button label (jika ada) */
    .radio-inline,
    .radio-inline label {
        color: #000 !important;
    }

    /* Style tambahan untuk tabel */
    .table-robson td {
        vertical-align: middle !important;
        color: #000 !important;
    }

    .table-robson .radio-inline {
        margin-right: 10px;
    }

    .table-robson input[type="text"] {
        width: 100%;
        min-width: 150px;
    }
</style>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark"><strong>LAPORAN ROBSON</strong></h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">
                        <!-- Wadah Notifikasi AJAX -->
                        <div id="alertMsg"></div>

                        <!-- Tambahkan ID 'formRobson' di Form Open -->
                        <?= form_open('Erm_robson/save', ['id' => 'formRobson']) ?>

                        <!-- Hidden Input untuk ID -->
                        <input type="hidden" name="id_pelayanan" value="<?= $id_pelayanan ?>">
                        <input type="hidden" name="id_histori" value="<?= $id_histori ?>">

                        <!-- Notifikasi Flashdata -->
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa fa-check-circle"></i> <?= $this->session->flashdata('success') ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fa fa-exclamation-circle"></i> <?= $this->session->flashdata('error') ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <!-- Data Pasien (untuk tampilan, tidak wajib diisi) -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>No. RM</label>
                                    <div class="has-success">
                                        <input type="text" class="form-control" value="<?= $no_rm ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama Pasien</label>
                                    <div class="has-success">
                                        <input type="text" class="form-control" value="<?= $nama ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <div class="has-success">
                                        <input type="text" class="form-control"
                                            value="<?= date('d M Y', strtotime($tgl_lahir)) ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- A. Identitas Pasien -->
                        <h5 class="txt-dark"><strong>A. IDENTITAS PASIEN</strong></h5>
                        <hr>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Gravida (G) <span class="text-danger">*</span></label>
                                    <div class="has-success">
                                        <input type="number" class="form-control" name="gravida"
                                            value="<?= set_value('gravida', @$robson['gravida']) ?>" required>
                                        <?= form_error('gravida', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Paritas (P) <span class="text-danger">*</span></label>
                                    <div class="has-success">
                                        <input type="number" class="form-control" name="paritas"
                                            value="<?= set_value('paritas', @$robson['paritas']) ?>" required>
                                        <?= form_error('paritas', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Abortus (A) <span class="text-danger">*</span></label>
                                    <div class="has-success">
                                        <input type="number" class="form-control" name="abortus"
                                            value="<?= set_value('abortus', @$robson['abortus']) ?>" required>
                                        <?= form_error('abortus', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Usia Kehamilan (minggu) <span class="text-danger">*</span></label>
                                    <div class="has-success">
                                        <input type="number" class="form-control" name="usia_kehamilan"
                                            value="<?= set_value('usia_kehamilan', @$robson['usia_kehamilan']) ?>"
                                            required>
                                        <?= form_error('usia_kehamilan', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Jumlah/Letak Janin <span class="text-danger">*</span></label>
                                    <div class="has-success">
                                        <input type="text" class="form-control" name="letak_janin"
                                            value="<?= set_value('letak_janin', @$robson['letak_janin']) ?>" required>
                                        <?= form_error('letak_janin', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Riwayat SC Sebelumnya <span class="text-danger">*</span></label>
                                    <div class="has-success">
                                        <input type="text" class="form-control" name="riwayat_sc_sebelumnya"
                                            value="<?= set_value('riwayat_sc_sebelumnya', @$robson['riwayat_sc_sebelumnya']) ?>"
                                            required>
                                        <?= form_error('riwayat_sc_sebelumnya', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Indikasi Medis SC Saat Ini <span class="text-danger">*</span></label>
                                    <div class="has-success">
                                        <input type="text" class="form-control" name="indikasi_medis_sc"
                                            value="<?= set_value('indikasi_medis_sc', @$robson['indikasi_medis_sc']) ?>"
                                            required>
                                        <?= form_error('indikasi_medis_sc', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class accesskey="form-group">
                                    <label>Tanggal Tindakan <span class="text-danger">*</span></label>
                                    <div class="has-success">
                                        <input type="date" class="form-control" name="tanggal_tindakan"
                                            value="<?= set_value('tanggal_tindakan', @$robson['tanggal_tindakan']) ?>"
                                            required>
                                        <?= form_error('tanggal_tindakan', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>DPJP Operator <span class="text-danger">*</span></label>
                                    <div class="has-success">
                                        <select class="form-control select2" name="dpjp_operator" required
                                            style="width: 100%;">
                                            <option value="">-- Pilih Dokter --</option>
                                            <?php foreach ($list_dpjp as $dokter): ?>
                                                <option value="<?= htmlspecialchars($dokter->nama) ?>"
                                                    <?= set_select('dpjp_operator', $dokter->nama, @$robson['dpjp_operator'] == $dokter->nama) ?>>
                                                    <?= htmlspecialchars($dokter->nama) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('dpjp_operator', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <h5 class="txt-dark"><strong>B. KLASIFIKASI ROBSON GROUP</strong></h5>
                            <hr>

                            <?php
                            // Definisi helper functions (dipindahkan ke atas agar tersedia)
                            function is_checked($field_name, $value, $robson_data)
                            {
                                if (isset($robson_data[$field_name]) && $robson_data[$field_name] == $value) {
                                    if (isset($robson_data[$field_name])) {
                                        return 'checked="checked"';
                                    }
                                }
                                return '';
                            }

                            function get_val($field_name, $robson_data)
                            {
                                return isset($robson_data[$field_name]) ? htmlspecialchars($robson_data[$field_name]) : '';
                            }

                            $robson_groups = [
                                1 => 'Nullipara, tunggal, cephalic, ≥37 mg, persalinan spontan',
                                2 => 'Nullipara, tunggal, cephalic, ≥37 mg, induksi / SC sebelum persalinan',
                                3 => 'Multipara tanpa luka uterus, tunggal, cephalic, ≥37 mg, persalinan spontan',
                                4 => 'Multipara tanpa luka uterus, tunggal, cephalic, ≥37 mg, induksi/SC sebelum persalinan',
                                5 => 'Multipara dengan luka uterus sebelumnya, tunggal, cephalic, ≥37 mg',
                                6 => 'Nullipara, tunggal, sungsang',
                                7 => 'Multipara, tunggal, sungsang (termasuk bekas SC)',
                                8 => 'Semua kehamilan ganda (kembar), termasuk dengan bekas SC',
                                9 => 'Semua kehamilan tunggal, posisi lintang/oblique (termasuk bekas SC)',
                                10 => 'Semua wanita dengan kehamilan tunggal cephalic, <37 mg (termasuk bekas SC)'
                            ];
                            ?>

                            <div class="table-responsive">
                                <table class="table table-bordered table-robson">
                                    <thead>
                                        <tr>
                                            <th style="width:5%">No</th>
                                            <th style="width:45%">Kelompok Robson</th>
                                            <th style="width:20%; text-align:center;">Pilihan</th>
                                            <th style="width:30%">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($robson_groups as $num => $label): ?>
                                            <tr>
                                                <td><?= $num ?></td>
                                                <td><?= $label ?></td>
                                                <td class="text-center">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="b<?= $num ?>_ya" value="Ya"
                                                            <?= is_checked('b' . $num . '_ya', 'Ya', $robson) ?>> Ya
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="b<?= $num ?>_ya" value="Tidak"
                                                            <?= is_checked('b' . $num . '_ya', 'Tidak', $robson) ?>> Tidak
                                                    </label>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="b<?= $num ?>_keterangan"
                                                        value="<?= get_val('b' . $num . '_keterangan', $robson) ?>"
                                                        placeholder="Keterangan">
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <hr>

                            <!-- ============================================================ -->
                            <!-- C. INDIKASI SC LAINNYA (dalam bentuk tabel)                   -->
                            <!-- ============================================================ -->
                            <h5 class="txt-dark"><strong>C. INDIKASI SC LAINNYA</strong></h5>
                            <hr>

                            <?php
                            $sc_indications = [
                                1 => 'Pecah Ketuban > 24 jam',
                                2 => 'Post SC (bukan indikasi tunggal, pertimbangkan persalinan spontan)',
                                3 => 'Plasenta previa / abruptio',
                                4 => 'Fetal distress (DJJ abnormal, gawat janin)',
                                5 => 'Disproporsi sefalopelvik',
                                6 => 'Kelainan letak (sungsang/lintang)',
                                7 => 'Preeklampsia / eklampsia',
                                8 => 'Kehamilan kembar',
                                9 => 'Ketuban pecah dini dengan gawat janin',
                                10 => 'Indikasi lain (sebutkan):'
                            ];
                            ?>

                            <div class="table-responsive">
                                <table class="table table-bordered table-robson">
                                    <thead>
                                        <tr>
                                            <th style="width:5%">No</th>
                                            <th style="width:45%">Indikasi SC</th>
                                            <th style="width:20%; text-align:center;">Pilihan</th>
                                            <th style="width:30%">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($sc_indications as $num => $label): ?>
                                            <tr>
                                                <td><?= $num ?></td>
                                                <td><?= $label ?></td>
                                                <td class="text-center">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="c<?= $num ?>_ya" value="Ya"
                                                            <?= is_checked('c' . $num . '_ya', 'Ya', $robson) ?>> Ya
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="c<?= $num ?>_ya" value="Tidak"
                                                            <?= is_checked('c' . $num . '_ya', 'Tidak', $robson) ?>> Tidak
                                                    </label>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="c<?= $num ?>_keterangan"
                                                        value="<?= get_val('c' . $num . '_keterangan', $robson) ?>"
                                                        placeholder="Keterangan">
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <hr>

                            <!-- D. Kesimpulan -->
                            <h5 class="txt-dark"><strong>D. KESIMPULAN</strong></h5>
                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Indikasi SC</label>
                                        <div class="has-success">
                                            <input type="text" class="form-control" name="indikasi_sc"
                                                value="<?= set_value('indikasi_sc', @$robson['indikasi_sc']) ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kelompok Robson</label>
                                        <div class="has-success">
                                            <input type="text" class="form-control" name="kelompok_robson"
                                                value="<?= set_value('kelompok_robson', @$robson['kelompok_robson']) ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Catatan Tambahan</label>
                                        <div class="has-success">
                                            <textarea class="form-control" name="catatan_tambahan" rows="3"
                                                style="resize: both;"><?= set_value('catatan_tambahan', @$robson['catatan_tambahan']) ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <!-- Tombol -->
                            <div class="form-group text-center" style="margin-top: 30px;">
                                <div class="col-md-12">
                                    <a class="btn btn-default btn-anim" href="<?= $url_kembali ?>"
                                        style="margin: 0 5px;">
                                        <i class="fa fa-arrow-left"></i><span class="btn-text"> Kembali</span>
                                    </a>
                                    <button type="submit" class="btn btn-success" style="margin: 0 5px;">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>
                                    <button type="button" class="btn btn-primary" onclick="cetak()"
                                        style="margin: 0 5px;">
                                        <i class="fa fa-print"></i> Cetak
                                    </button>
                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 CSS & JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            $('#formRobson').on('submit', function (e) {
                e.preventDefault(); // Mencegah submit bawaan browser

                var form = $(this);

                // 1. Tampilkan Pop-up Konfirmasi Sebelum Simpan
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Data pemeriksaan Robson akan disimpan ke sistem.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Simpan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {

                        // Tampilkan loading saat proses menyimpan
                        Swal.fire({
                            title: 'Memproses...',
                            text: 'Mohon tunggu sebentar',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        // 2. Kirim Data via AJAX
                        $.ajax({
                            url: form.attr('action'),
                            type: 'POST',
                            data: form.serialize(),
                            dataType: 'JSON',
                            success: function (response) {
                                if (response.status) {
                                    // 3. Tampilkan Alert Berhasil, lalu tetap di page ini
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: response.message,
                                        timer: 2000,
                                        showConfirmButton: false
                                    });
                                } else {
                                    // 4. Tampilkan Alert Gagal / Validasi
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal Menyimpan!',
                                        html: response.message
                                    });
                                }
                            },
                            error: function (xhr, status, error) {
                                // Tampilkan Alert Error Server
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Terjadi Kesalahan Server',
                                    text: 'Silakan periksa koneksi atau coba beberapa saat lagi.'
                                });
                                console.log(xhr.responseText);
                            }
                        });
                    }
                });
            });
        });
    </script>

    <script>
        function cetak() {
            var id_pelayanan = '<?= $id_pelayanan ?>';
            var id_histori = '<?= $id_histori ?>';
            window.open(
                '<?= base_url('erm_robson/cetak/') ?>' + id_pelayanan + '/' + id_histori,
                '_blank'
            );
        }
    </script>