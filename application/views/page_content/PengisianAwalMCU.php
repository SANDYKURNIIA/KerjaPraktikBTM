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
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <div class="title control-label">Pengisian Awal MCU</div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap">

                            <form id="formOneDayCare" action="<?= base_url('PengisianAwalMCU/simpan') ?>" method="post">
                                <input type="hidden" name="no_rm" value="<?= $data->no_rm ?? '' ?>">
                                <input type="hidden" name="id_pelayanan" id="id_pelayanan" value="<?= $id_pelayanan ?? '' ?>">
                                <input type="hidden" id="id_history" value="<?= $id_history ?? '' ?>">

                                <!-- Identitas Pasien -->
                                <div class="form-group row ">
                                    <div class="col-md-3 mb-10">
                                        <label class="control-label mb-10 text-left">Nama Pasien</label>
                                        <input type="text" class="form-control" value="<?= $data->nama ?? '-' ?>" disabled>
                                    </div>
                                    <div class="col-md-3 mb-10">
                                        <label class="control-label mb-10 text-left">No. RM</label>
                                        <input type="text" class="form-control" value="<?= $data->no_rm ?? '-' ?>" disabled>
                                    </div>
                                    <div class="col-md-3 mb-10">
                                        <label class="control-label mb-10 text-left">Umur</label>
                                        <input type="text" class="form-control" value="<?= $data->umur ?? '-' ?>" disabled>
                                    </div>
                                    <div class="col-md-3 mb-10">
                                        <label class="control-label mb-10 text-left">Asal Masuk</label>
                                        <input type="text" class="form-control" value="<?= $data->asal_masuk ?? '-' ?>" disabled>
                                    </div>
                                    <div class="col-md-3 mb-10">
                                        <label class="control-label mb-10 text-left">Hari Perawatan</label>
                                        <input type="text" class="form-control" value="<?= $data->hari_perawatan ?? '-' ?>" disabled>
                                    </div>
                                    <div class="col-md-3 mb-10">
                                        <label class="control-label mb-10 text-left">Gol. Darah</label>
                                        <input type="text" class="form-control" value="<?= $data->goldar ?? '-' ?>" disabled>
                                    </div>
                                    <div class="col-md-3 mb-10">
                                        <label class="control-label mb-10 text-left">SAPS II</label>
                                        <input type="text" class="form-control" value="<?= $data->saps_II ?? '-' ?>" disabled>
                                    </div>
                                    <div class="col-md-6 mb-10">
                                        <label class="control-label mb-10 text-left">Catatan Khusus</label>
                                        <textarea class="form-control" name="catatan_khusus"><?= $data->catatan_khusus ?? '' ?></textarea>
                                    </div>
                                </div>

                                <div class=" mt-20 text-center">
                                    <h5>Alat Invasive Yang Terpasang</h5>
                                </div>
                                <!-- Dokter & Vena sejajar -->
                                <div class="row mt-20">
                                    <!-- Kolom Dokter -->
                                    <div class="col-md-3">
                                        <div class="form-group dokter-group">
                                            <label class="control-label mb-10 text-left">Nama Dokter 1</label>
                                            <select class="form-control select2" id="dokter1" name="dokter1" style="border: 1px solid lightgreen;">
                                                <option value="-">-</option>
                                                <?php foreach ($data_dokter as $row): ?>
                                                    <option value="<?= $row->id_dokter; ?>"
                                                        <?= set_select('dokter1', $row->id_dokter, (isset($data->dokter1) && $data->dokter1 == $row->id_dokter)); ?>>
                                                        <?= $row->nama; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="form-group dokter-group">
                                            <label class="control-label mb-10 text-left">Nama Dokter 2</label>
                                            <select class="form-control select2" id="dokter2" name="dokter2" style="border: 1px solid lightgreen;">
                                                <option value="-">-</option>
                                                <?php foreach ($data_dokter as $row): ?>
                                                    <option value="<?= $row->id_dokter; ?>"
                                                        <?= set_select('dokter2', $row->id_dokter, (isset($data->dokter2) && $data->dokter2 == $row->id_dokter)); ?>>
                                                        <?= $row->nama; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="form-group dokter-group">
                                            <label class="control-label mb-10 text-left">Nama Dokter 3</label>
                                            <select class="form-control select2" id="dokter3" name="dokter3" style="border: 1px solid lightgreen;">
                                                <option value="-">-</option>
                                                <?php foreach ($data_dokter as $row): ?>
                                                    <option value="<?= $row->id_dokter; ?>"
                                                        <?= set_select('dokter3', $row->id_dokter, (isset($data->dokter3) && $data->dokter3 == $row->id_dokter)); ?>>
                                                        <?= $row->nama; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="form-group dokter-group">
                                            <label class="control-label mb-10 text-left">Nama Dokter 4</label>
                                            <select class="form-control select2" id="dokter4" name="dokter4" style="border: 1px solid lightgreen;">
                                                <option value="-">-</option>
                                                <?php foreach ($data_dokter as $row): ?>
                                                    <option value="<?= $row->id_dokter; ?>"
                                                        <?= set_select('dokter4', $row->id_dokter, (isset($data->dokter4) && $data->dokter4 == $row->id_dokter)); ?>>
                                                        <?= $row->nama; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                    </div>

                                    <!-- Kolom Vena Perifer 1 - WSD -->
                                    <div class="col-md-3">
                                        <div class="form-group mb-20">
                                            <label class="control-label mb-10 text-left"><b>Vena Perifer 1</b></label>
                                            <input type="text" class="form-control" name="vena_perifer1" value="<?= $data->vena_perifer1 ?? '' ?>">
                                        </div>

                                        <div class="form-group mb-20">
                                            <label class="control-label mb-10 text-left"><b>Vena Perifer 2</b></label>
                                            <input type="text" class="form-control" name="vena_perifer2" value="<?= $data->vena_perifer2 ?? '' ?>">
                                        </div>

                                        <div class="form-group mb-20">
                                            <label class="control-label mb-10 text-left"><b>CVC</b></label>
                                            <input type="text" class="form-control" name="cvc" value="<?= $data->cvc ?? '' ?>">
                                        </div>

                                        <div class="form-group mb-20">
                                            <label class="control-label mb-10 text-left"><b>Trakeal Tube</b></label>
                                            <input type="text" class="form-control" name="trakeal_tube" value="<?= $data->trakeal_tube ?? '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">

                                        <div class="form-group mb-20">
                                            <label class="control-label mb-10 text-left"><b>Katheter Urine</b></label>
                                            <input type="text" class="form-control" name="katheter_urine" value="<?= $data->katheter_urine ?? '' ?>">
                                        </div>

                                        <div class="form-group mb-20">
                                            <label class="control-label mb-10 text-left"><b>Urine Bag</b></label>
                                            <input type="text" class="form-control" name="urine_bag" value="<?= $data->urine_bag ?? '' ?>">
                                        </div>

                                        <div class="form-group mb-20">
                                            <label class="control-label mb-10 text-left"><b>NGT</b></label>
                                            <input type="text" class="form-control" name="ngt" value="<?= $data->ngt ?? '' ?>">
                                        </div>

                                        <div class="form-group mb-20">
                                            <label class="control-label mb-10 text-left"><b>WSD</b></label>
                                            <input type="text" class="form-control" name="wsd" value="<?= $data->wsd ?? '' ?>">
                                        </div>
                                    </div>
                                </div>

                                <!-- Catatan & Pemeriksaan -->
                                <div class="form-group row mt-20">

                                    <div class="col-md-12 mb-20">
                                        <label class="control-label mb-10 text-left">Masalah Medis</label>
                                        <textarea style="width: 100%; height: 150px;" class="form-control" name="masalah_medis"><?= $data->masalah_medis ?? '' ?></textarea>
                                    </div>
                                    <div class="col-md-4 mb-20">
                                        <label class="control-label mb-10 text-left">Enteral</label>
                                        <textarea style="width: 100%; height: 100px;" class="form-control" name="enteral"><?= $data->enteral ?? '' ?></textarea>
                                    </div>
                                    <div class="col-md-4 mb-20">
                                        <label class="control-label mb-10 text-left">Parenteral</label>
                                        <textarea style="width: 100%; height: 100px;" class="form-control" name="parenteral"><?= $data->parenteral ?? '' ?></textarea>
                                    </div>
                                    <div class="col-md-4 mb-20">
                                        <label class="control-label mb-10 text-left">Pemeriksaan</label>
                                        <textarea style="width: 100%; height: 100px;" class="form-control" name="pemeriksaan"><?= $data->pemeriksaan ?? '' ?></textarea>
                                    </div>
                                </div>

                                <!-- Tombol -->
                                <div class="col-md-12 mt-20">
                                    <a class="btn btn-default btn-anim btn-sm"
                                        onclick="javascript:history.go(-1)"
                                        style="margin-right: 20px; margin-left: 30px;">
                                        <i class="fa fa-arrow-left"></i>
                                        <span class="btn-text">KEMBALI</span>
                                    </a>

                                    <button type="button" class="btn btn-success mb-4" id="btnSimpan">
                                        Simpan
                                    </button>

                                    <a href="<?= base_url('OneDayCare/cetak/' . $id_pelayanan . '/' . $id_history) ?>"
                                        target="_blank" class="btn btn-primary mb-4">
                                        <i class="fa fa-print"></i> Cetak
                                    </a>
                                </div>

                            </form>

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
                var $form = $("#formOneDayCare");
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

</body>

</html>