<?php
$hobi_checked       = !empty($data_hoby['hobi']) ? (is_array($data_hoby['hobi']) ? $data_hoby['hobi'] : json_decode($data_hoby['hobi'], true)) : [];
$kebiasaan_checked  = !empty($data_hoby['kebiasaan']) ? (is_array($data_hoby['kebiasaan']) ? $data_hoby['kebiasaan'] : json_decode($data_hoby['kebiasaan'], true)) : [];
$hobi_lain_val      = !empty($data_hoby['hobi_lain']) ? $data_hoby['hobi_lain'] : '';
$kebiasaan_lain_val = !empty($data_hoby['kebiasaan_lain']) ? $data_hoby['kebiasaan_lain'] : '';
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h1 class="panel-title txt-dark"><strong>Hobi dan Kebiasaan</strong></h1>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="form-wrap">
                            <div class="form-body">

                                <form id="form_hoby_kebiasaan">
                                    <input type="hidden" id="id_mcu_form" name="id_mcu" value="<?= isset($id_mcu) ? $id_mcu : '' ?>">

                                    <!-- Bagian Hobi -->
                                    <table class="table table-bordered">
                                        <thead class="btn-success text-white">
                                            <tr>
                                                <th colspan="2" class="text-center bg-success">Hobi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="checkbox" name="hobi[]" value="musik_keras" <?= in_array("musik_keras", $hobi_checked) ? "checked" : "" ?>> Mendengarkan / main musik keras / rock</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="hobi[]" value="tempat_bising" <?= in_array("tempat_bising", $hobi_checked) ? "checked" : "" ?>> Mengunjungi tempat bising</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="hobi[]" value="headset" <?= in_array("headset", $hobi_checked) ? "checked" : "" ?>> Mendengarkan headset</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="hobi[]" value="balap" <?= in_array("balap", $hobi_checked) ? "checked" : "" ?>> Balap motor / mobil</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="hobi[]" value="menembak" <?= in_array("menembak", $hobi_checked) ? "checked" : "" ?>> Menembak atau berburu</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" id="hobi_lain_cb" name="hobi[]" value="lainnya"
                                                        <?= !empty($hobi_lain_val) ? "checked" : "" ?>>
                                                    <span>Lainnya</span>
                                                    <input type="text" id="hobi_lain_input" name="hobi_lain"
                                                        class="form-control mt-1"
                                                        value="<?= $hobi_lain_val ?>">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <!-- Bagian Kebiasaan -->
                                    <table class="table table-bordered">
                                        <thead class="btn-success text-white">
                                            <tr>
                                                <th colspan="2" class="text-center bg-success">Kebiasaan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="checkbox" name="kebiasaan[]" value="merokok" <?= in_array("merokok", $kebiasaan_checked) ? "checked" : "" ?>> Merokok</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="kebiasaan[]" value="kopi" <?= in_array("kopi", $kebiasaan_checked) ? "checked" : "" ?>> Minum kopi</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="kebiasaan[]" value="alkohol" <?= in_array("alkohol", $kebiasaan_checked) ? "checked" : "" ?>> Minum alkohol</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="kebiasaan[]" value="jamu" <?= in_array("jamu", $kebiasaan_checked) ? "checked" : "" ?>> Minum jamu-jamuan</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="kebiasaan[]" value="asam" <?= in_array("asam", $kebiasaan_checked) ? "checked" : "" ?>> Makanan asam</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" id="kebiasaan_lain_cb" name="kebiasaan[]" value="lainnya"
                                                        <?= !empty($kebiasaan_lain_val) ? "checked" : "" ?>>
                                                    <span>Lainnya</span>
                                                    <input type="text" id="kebiasaan_lain_input" name="kebiasaan_lain"
                                                        class="form-control mt-1"
                                                        value="<?= $kebiasaan_lain_val ?>">
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <div class="mb-5 mr-5 mt-10">
                                        <button type="button" onclick="insertData()" class="btn btn-success btn-anim btn-sm">
                                            <i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                        </button>
                                        <hr>
                                    </div>
                                </form>

                                <!-- jQuery AJAX -->
                                <script>
                                    $(document).ready(function() {
                                        function toggleInput(cbSelector, inputSelector) {
                                            if ($(cbSelector).is(":checked")) {
                                                $(inputSelector).show();
                                            } else {
                                                $(inputSelector).hide();
                                            }
                                        }

                                        // pasang listener
                                        $("#hobi_lain_cb").on("change", function() {
                                            toggleInput(this, "#hobi_lain_input");
                                        });

                                        $("#kebiasaan_lain_cb").on("change", function() {
                                            toggleInput(this, "#kebiasaan_lain_input");
                                        });

                                        // 🚀 jalankan sekali saat awal load
                                        toggleInput("#hobi_lain_cb", "#hobi_lain_input");
                                        toggleInput("#kebiasaan_lain_cb", "#kebiasaan_lain_input");
                                    });

                                    $(document).ready(function() {
                                        let id_mcu = $("#id_mcu_form").val();

                                        $.ajax({
                                            url: "<?= base_url('Quitioners/get_hoby_kebiasaan/') ?>" + id_mcu,
                                            type: "GET",
                                            dataType: "json",
                                            success: function(res) {
                                                if (res.status === 'success' && res.data) {
                                                    if (res.data.hobi && Array.isArray(res.data.hobi)) {
                                                        res.data.hobi.forEach(function(val) {
                                                            $("input[name='hobi[]'][value='" + val + "']").prop("checked", true);
                                                        });
                                                    }

                                                    if (res.data.hobi_lain) {
                                                        $("input[name='hobi_lain']").val(res.data.hobi_lain);
                                                        $("input[name='hobi[]'][value='lainnya']").prop("checked", true);
                                                        $('#hobi_lain_input').show();
                                                    }

                                                    if (res.data.kebiasaan && Array.isArray(res.data.kebiasaan)) {
                                                        res.data.kebiasaan.forEach(function(val) {
                                                            $("input[name='kebiasaan[]'][value='" + val + "']").prop("checked", true);
                                                        });
                                                    }

                                                    if (res.data.kebiasaan_lain) {
                                                        $("input[name='kebiasaan_lain']").val(res.data.kebiasaan_lain);
                                                        $("input[name='kebiasaan[]'][value='lainnya']").prop("checked", true);
                                                        $('#kebiasaan_lain_input').show();
                                                    }
                                                }
                                            },
                                            error: function(xhr) {
                                                console.error(xhr.responseText);
                                                alert("Terjadi kesalahan saat mengambil data.");
                                            }
                                        });

                                    });

                                    function insertData() {
                                        let id_mcu = $('#id_mcu_form').val();

                                        // ambil nilai
                                        let hobiLainChecked = $("#hobi_lain_cb").is(":checked");
                                        let hobiLainVal = $("#hobi_lain_input").val().trim();

                                        let kebiasaanLainChecked = $("#kebiasaan_lain_cb").is(":checked");
                                        let kebiasaanLainVal = $("#kebiasaan_lain_input").val().trim();

                                        // 🚨 validasi: kalau checkbox dicentang tapi input kosong
                                        if (hobiLainChecked && hobiLainVal === "") {
                                            Swal.fire({
                                                title: "Peringatan!",
                                                text: "Harap isi kolom Hobi Lainnya sebelum menyimpan.",
                                                icon: "warning"
                                            });
                                            return; // stop submit
                                        }

                                        if (kebiasaanLainChecked && kebiasaanLainVal === "") {
                                            Swal.fire({
                                                title: "Peringatan!",
                                                text: "Harap isi kolom Kebiasaan Lainnya sebelum menyimpan.",
                                                icon: "warning"
                                            });
                                            return; // stop submit
                                        }

                                        // kalau lolos validasi, baru kirim AJAX
                                        $.ajax({
                                            url: "<?= base_url('Quitioners/simpan_hoby_kebiasaan/') ?>" + id_mcu,
                                            type: "POST",
                                            data: $("#form_hoby_kebiasaan").serialize(),
                                            dataType: "json",
                                            success: function() {
                                                Swal.fire({
                                                    title: "Good job!",
                                                    text: "Hobi dan Kebiasaan berhasil disimpan!",
                                                    icon: "success"
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
                                    }
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>