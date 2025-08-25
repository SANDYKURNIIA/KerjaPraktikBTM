<div class="dada">
    <label class="control-label" style="margin-top:30px;"><strong>
            <h5>ANUS & UROGENITAL</h5>
        </strong></label>
    <div class="col-md-12">
        <table border=0 width=100% class="table display mb-30">
            <tbody>

                <tr>
                    <td width="300px">Hemoroid</td>
                    <td width="300px">
                        <input type="radio" name="hemoroid" id="hemoroid1" value="Tidak Ada" class="rad1" checked />
                        <label for="hemoroid1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="hemoroid" id="hemoroid2" value="Ada" class="rad1" />
                        <label for="hemoroid2">Ada</label>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td width="300px">Nyeri Ketok CVA</td>
                    <td width="300px">
                        <input type="radio" name="nyeri_ketok_cva" id="nyeri_ketok_cva1" value="Tidak Ada" class="rad1" checked />
                        <label for="nyeri_ketok_cva1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="nyeri_ketok_cva" id="nyeri_ketok_cva2" value="Ada" class="rad1" />
                        <label for="nyeri_ketok_cva2">Ada</label>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td width="300px">Kelenjar Getah Bening</td>
                    <td width="300px">
                        <input type="radio" name="kelenjar_getah_bening" id="kelenjar_getah_bening1" value="Tidak Ada" class="rad1" checked />
                        <label for="kelenjar_getah_bening1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="kelenjar_getah_bening" id="kelenjar_getah_bening2" value="Ada" class="rad1" />
                        <label for="kelenjar_getah_bening2">Ada</label>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td width="300px">Alat Kelamin</td>
                    <td width="300px">
                        <input type="radio" name="alat_kelamin" id="alat_kelamin1" value="Tidak Diperiksa" class="rad1" checked />
                        <label for="alat_kelamin1">Tidak Diperiksa</label>
                    </td>
                    <td>
                        <input type="radio" name="alat_kelamin" id="alat_kelamin2" value="Normal" class="rad1" />
                        <label for="alat_kelamin2">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="alat_kelamin" id="alat_kelamin3" value="Kelainan" class="rad1" />
                        <label for="alat_kelamin3">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Hernia</td>
                    <td width="300px">
                        <input type="radio" name="hernia" id="hernia1" value="Tidak Ada" class="rad1" checked />
                        <label for="hernia1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="hernia" id="hernia2" value="Ada" class="rad1" />
                        <label for="hernia2">Ada</label>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>Catatan</td>
                    <td colspan="3">
                        <textarea rows="4" cols="40" id="catatan"></textarea>

                    </td>

                </tr>
            </tbody>
        </table>
        <div class="col-md-8">
            <div class="form-group pull-right">
                <button onclick="insertUrogenital()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function insertUrogenital() {

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/cetak_urogenital",
                method: "POST",
                dataType: 'json',
                data: {
                    hemoroid: $('input[name="hemoroid"]:checked').val(),
                    nyeri_ketok_cva: $('input[name="nyeri_ketok_cva"]:checked').val(),
                    kelenjar_getah_bening: $('input[name="kelenjar_getah_bening"]:checked').val(),
                    alat_kelamin: $('input[name="alat_kelamin"]:checked').val(),
                    hernia: $('input[name="hernia"]:checked').val(),
                    catatan: $('#catatan').val(),
                    id_mcu: $('#id_mcu_form').val(),
                    dokter_periksa: $('#dokter_periksa').val(),
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "Good job!",
                            type: "success",
                            text: "Data Medical Check Up Pasien ini telah disimpan",
                            confirmButtonColor: "#3cb878",
                        }, function() {
                            location.reload();
                        });

                    } else {
                        swal({
                            title: "Gagal!",
                            type: "warning",
                            text: data.status,
                            confirmButtonColor: "#3cb878",
                        });
                    }
                }
            });
        });

        return false;
    }

    $(document).ready(function() {
        id_pelayanan = $('#id_mcu_form').val();
        $.ajax({
            url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/get_data_pemeriksaan",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_pelayanan,
                table: 'urogenital_mcu',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    // Hemoroid
                    $('input[name="hemoroid"][value="' + data.hemoroid + '"]').prop("checked", true);

                    // Nyeri Ketok CVA
                    $('input[name="nyeri_ketok_cva"][value="' + data.nyeri_ketok_cva + '"]').prop("checked", true);

                    // Kelenjar Getah Bening
                    $('input[name="kelenjar_getah_bening"][value="' + data.kelenjar_getah_bening + '"]').prop("checked", true);

                    // Alat Kelamin
                    $('input[name="alat_kelamin"][value="' + data.alat_kelamin + '"]').prop("checked", true);

                    // Hernia
                    $('input[name="hernia"][value="' + data.hernia + '"]').prop("checked", true);

                    $('#catatan').val(data.catatan);
                    $('#dokter_periksa').val(data.dokter_periksa);

                }
            }

        });
    });
</script>