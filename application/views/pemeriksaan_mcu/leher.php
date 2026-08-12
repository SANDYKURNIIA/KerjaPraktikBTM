<<<<<<< HEAD
<div class="leher">
    <label class="control-label" style="margin-top:30px;"><strong>
            <h5>LEHER</h5>
        </strong></label>
    <div class="col-md-12">
        <table border=0 width=100% class="table display mb-30">
            <tbody>
                <tr>
                    <td width="300px">Kelenjar Limfe</td>
                    <td width="300px">
                        <input type="radio" name="kelenjar_limfe" id="kelenjar_limfe1" value="Tidak Teraba" class="rad1" checked />
                        <label for="kelenjar_limfe1">Tidak Teraba</label>
                    </td>
                    <td>
                        <input type="radio" name="kelenjar_limfe" id="kelenjar_limfe2" value="Teraba" class="rad1" />
                        <label for="kelenjar_limfe2">Teraba</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Kelenjar Gondok</td>
                    <td width="300px">
                        <input type="radio" name="kelenjar_gondok" id="kelenjar_gondok1" value="Normal" class="rad1" checked />
                        <label for="kelenjar_gondok1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="kelenjar_gondok" id="kelenjar_gondok2" value="Membesar" class="rad1" />
                        <label for="kelenjar_gondok2">Membesar</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">JVP</td>
                    <td width="300px">
                        <input type="radio" name="jvp" id="jvp1" value="Normal" class="rad1" checked />
                        <label for="jvp1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="jvp" id="jvp2" value="Meningkat" class="rad1" />
                        <label for="jvp2">Meningkat</label>
                    </td>
                </tr>

                <tr>
                    <td>Catatan</td>
                    <td colspan="2">
                        <textarea rows="4" cols="40" id="catatan"></textarea>

                    </td>

                </tr>
            </tbody>
        </table>
        <div class="col-md-8">
            <div class="form-group pull-right">
                <button onclick="insertLeher()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function insertLeher() {

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/cetak_leher",
                method: "POST",
                dataType: 'json',
                data: {
                    kelenjar_limfe: $('input[name="kelenjar_limfe"]:checked').val(),
                    kelenjar_gondok: $('input[name="kelenjar_gondok"]:checked').val(),
                    jvp: $('input[name="jvp"]:checked').val(),
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
                table: 'pemeriksaan_leher_mcu',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    // Kelenjar Limfe
                    $('input[name="kelenjar_limfe"][value="' + data.kelenjar_limfe + '"]').prop("checked", true);

                    // Kelenjar Gondok
                    $('input[name="kelenjar_gondok"][value="' + data.kelenjar_gondok + '"]').prop("checked", true);

                    // JVP
                    $('input[name="jvp"][value="' + data.jvp + '"]').prop("checked", true);
                    $('#catatan').val(data.catatan);
                    $('#dokter_periksa').val(data.dokter_periksa);

                }
            }

        });
    });
=======
<div class="leher">
    <label class="control-label" style="margin-top:30px;"><strong>
            <h5>LEHER</h5>
        </strong></label>
    <div class="col-md-12">
        <table border=0 width=100% class="table display mb-30">
            <tbody>
                <tr>
                    <td width="300px">Kelenjar Limfe</td>
                    <td width="300px">
                        <input type="radio" name="kelenjar_limfe" id="kelenjar_limfe1" value="Tidak Teraba" class="rad1" checked />
                        <label for="kelenjar_limfe1">Tidak Teraba</label>
                    </td>
                    <td>
                        <input type="radio" name="kelenjar_limfe" id="kelenjar_limfe2" value="Teraba" class="rad1" />
                        <label for="kelenjar_limfe2">Teraba</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Kelenjar Gondok</td>
                    <td width="300px">
                        <input type="radio" name="kelenjar_gondok" id="kelenjar_gondok1" value="Normal" class="rad1" checked />
                        <label for="kelenjar_gondok1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="kelenjar_gondok" id="kelenjar_gondok2" value="Membesar" class="rad1" />
                        <label for="kelenjar_gondok2">Membesar</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">JVP</td>
                    <td width="300px">
                        <input type="radio" name="jvp" id="jvp1" value="Normal" class="rad1" checked />
                        <label for="jvp1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="jvp" id="jvp2" value="Meningkat" class="rad1" />
                        <label for="jvp2">Meningkat</label>
                    </td>
                </tr>

                <tr>
                    <td>Catatan</td>
                    <td colspan="2">
                        <textarea rows="4" cols="40" id="catatan"></textarea>

                    </td>

                </tr>
            </tbody>
        </table>
        <div class="col-md-8">
            <div class="form-group pull-right">
                <button onclick="insertLeher()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function insertLeher() {

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/cetak_leher",
                method: "POST",
                dataType: 'json',
                data: {
                    kelenjar_limfe: $('input[name="kelenjar_limfe"]:checked').val(),
                    kelenjar_gondok: $('input[name="kelenjar_gondok"]:checked').val(),
                    jvp: $('input[name="jvp"]:checked').val(),
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
                table: 'pemeriksaan_leher_mcu',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    // Kelenjar Limfe
                    $('input[name="kelenjar_limfe"][value="' + data.kelenjar_limfe + '"]').prop("checked", true);

                    // Kelenjar Gondok
                    $('input[name="kelenjar_gondok"][value="' + data.kelenjar_gondok + '"]').prop("checked", true);

                    // JVP
                    $('input[name="jvp"][value="' + data.jvp + '"]').prop("checked", true);
                    $('#catatan').val(data.catatan);
                    $('#dokter_periksa').val(data.dokter_periksa);

                }
            }

        });
    });
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>