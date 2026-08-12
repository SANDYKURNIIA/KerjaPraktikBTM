<<<<<<< HEAD
<div class="dada">
    <label class="control-label" style="margin-top:30px;"><strong>
            <h5>ANUS & UROGENITAL</h5>
        </strong></label>
    <div class="col-md-12">
        <table border=0 width=100% class="table display mb-30">
            <tbody>

                <tr>
                    <td width="300px">Kekuatan</td>
                    <td width="300px">
                        <input type="radio" name="kekuatan" id="kekuatan1" value="Normal" class="rad1" checked />
                        <label for="kekuatan1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="kekuatan" id="kekuatan2" value="Kelainan" class="rad1" />
                        <label for="kekuatan2">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Refleks Fisiologis</td>
                    <td width="300px">
                        <input type="radio" name="refleks_fisiologis" id="refleks_fisiologis1" value="Normal" class="rad1" checked />
                        <label for="refleks_fisiologis1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="refleks_fisiologis" id="refleks_fisiologis2" value="Tidak" class="rad1" />
                        <label for="refleks_fisiologis2">Tidak</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Refleks Patologis</td>
                    <td width="300px">
                        <input type="radio" name="refleks_patologis" id="refleks_patologis1" value="Tidak Ada" class="rad1" checked />
                        <label for="refleks_patologis1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="refleks_patologis" id="refleks_patologis2" value="Kelainan" class="rad1" />
                        <label for="refleks_patologis2">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Tremor</td>
                    <td width="300px">
                        <input type="radio" name="tremor" id="tremor1" value="Tidak Ada" class="rad1" checked />
                        <label for="tremor1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="tremor" id="tremor2" value="Ada" class="rad1" />
                        <label for="tremor2">Ada</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Motorik Kasar</td>
                    <td width="300px">
                        <input type="radio" name="motorik_kasar" id="motorik_kasar1" value="Normal" class="rad1" checked />
                        <label for="motorik_kasar1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="motorik_kasar" id="motorik_kasar2" value="Kelainan" class="rad1" />
                        <label for="motorik_kasar2">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Motorik Halus</td>
                    <td width="300px">
                        <input type="radio" name="motorik_halus" id="motorik_halus1" value="Normal" class="rad1" checked />
                        <label for="motorik_halus1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="motorik_halus" id="motorik_halus2" value="Kelainan" class="rad1" />
                        <label for="motorik_halus2">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Varices</td>
                    <td width="300px">
                        <input type="radio" name="varices" id="varices1" value="Tidak Ada" class="rad1" checked />
                        <label for="varices1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="varices" id="varices2" value="Ada" class="rad1" />
                        <label for="varices2">Ada</label>
                    </td>
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
                <button onclick="insertAnggotaGerak()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function insertAnggotaGerak() {

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/cetak_anggota_gerak",
                method: "POST",
                dataType: 'json',
                data: {
                    kekuatan: $('input[name="kekuatan"]:checked').val(),
                    refleks_fisiologis: $('input[name="refleks_fisiologis"]:checked').val(),
                    refleks_patologis: $('input[name="refleks_patologis"]:checked').val(),
                    tremor: $('input[name="tremor"]:checked').val(),
                    motorik_kasar: $('input[name="motorik_kasar"]:checked').val(),
                    motorik_halus: $('input[name="motorik_halus"]:checked').val(),
                    varices: $('input[name="varices"]:checked').val(),
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
                table: 'anggota_gerak_mcu',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    // Kekuatan
                    $('input[name="kekuatan"][value="' + data.kekuatan + '"]').prop("checked", true);

                    // Refleks Fisiologis
                    $('input[name="refleks_fisiologis"][value="' + data.refleks_fisiologis + '"]').prop("checked", true);

                    // Refleks Patologis
                    $('input[name="refleks_patologis"][value="' + data.refleks_patologis + '"]').prop("checked", true);

                    // Tremor
                    $('input[name="tremor"][value="' + data.tremor + '"]').prop("checked", true);

                    // Motorik Kasar
                    $('input[name="motorik_kasar"][value="' + data.motorik_kasar + '"]').prop("checked", true);

                    // Motorik Halus
                    $('input[name="motorik_halus"][value="' + data.motorik_halus + '"]').prop("checked", true);

                    // Varices
                    $('input[name="varices"][value="' + data.varices + '"]').prop("checked", true);

                    $('#catatan').val(data.catatan);
                    $('#dokter_periksa').val(data.dokter_periksa);

                }
            }

        });
    });
=======
<div class="dada">
    <label class="control-label" style="margin-top:30px;"><strong>
            <h5>ANUS & UROGENITAL</h5>
        </strong></label>
    <div class="col-md-12">
        <table border=0 width=100% class="table display mb-30">
            <tbody>

                <tr>
                    <td width="300px">Kekuatan</td>
                    <td width="300px">
                        <input type="radio" name="kekuatan" id="kekuatan1" value="Normal" class="rad1" checked />
                        <label for="kekuatan1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="kekuatan" id="kekuatan2" value="Kelainan" class="rad1" />
                        <label for="kekuatan2">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Refleks Fisiologis</td>
                    <td width="300px">
                        <input type="radio" name="refleks_fisiologis" id="refleks_fisiologis1" value="Normal" class="rad1" checked />
                        <label for="refleks_fisiologis1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="refleks_fisiologis" id="refleks_fisiologis2" value="Tidak" class="rad1" />
                        <label for="refleks_fisiologis2">Tidak</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Refleks Patologis</td>
                    <td width="300px">
                        <input type="radio" name="refleks_patologis" id="refleks_patologis1" value="Tidak Ada" class="rad1" checked />
                        <label for="refleks_patologis1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="refleks_patologis" id="refleks_patologis2" value="Kelainan" class="rad1" />
                        <label for="refleks_patologis2">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Tremor</td>
                    <td width="300px">
                        <input type="radio" name="tremor" id="tremor1" value="Tidak Ada" class="rad1" checked />
                        <label for="tremor1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="tremor" id="tremor2" value="Ada" class="rad1" />
                        <label for="tremor2">Ada</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Motorik Kasar</td>
                    <td width="300px">
                        <input type="radio" name="motorik_kasar" id="motorik_kasar1" value="Normal" class="rad1" checked />
                        <label for="motorik_kasar1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="motorik_kasar" id="motorik_kasar2" value="Kelainan" class="rad1" />
                        <label for="motorik_kasar2">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Motorik Halus</td>
                    <td width="300px">
                        <input type="radio" name="motorik_halus" id="motorik_halus1" value="Normal" class="rad1" checked />
                        <label for="motorik_halus1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="motorik_halus" id="motorik_halus2" value="Kelainan" class="rad1" />
                        <label for="motorik_halus2">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Varices</td>
                    <td width="300px">
                        <input type="radio" name="varices" id="varices1" value="Tidak Ada" class="rad1" checked />
                        <label for="varices1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="varices" id="varices2" value="Ada" class="rad1" />
                        <label for="varices2">Ada</label>
                    </td>
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
                <button onclick="insertAnggotaGerak()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function insertAnggotaGerak() {

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/cetak_anggota_gerak",
                method: "POST",
                dataType: 'json',
                data: {
                    kekuatan: $('input[name="kekuatan"]:checked').val(),
                    refleks_fisiologis: $('input[name="refleks_fisiologis"]:checked').val(),
                    refleks_patologis: $('input[name="refleks_patologis"]:checked').val(),
                    tremor: $('input[name="tremor"]:checked').val(),
                    motorik_kasar: $('input[name="motorik_kasar"]:checked').val(),
                    motorik_halus: $('input[name="motorik_halus"]:checked').val(),
                    varices: $('input[name="varices"]:checked').val(),
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
                table: 'anggota_gerak_mcu',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    // Kekuatan
                    $('input[name="kekuatan"][value="' + data.kekuatan + '"]').prop("checked", true);

                    // Refleks Fisiologis
                    $('input[name="refleks_fisiologis"][value="' + data.refleks_fisiologis + '"]').prop("checked", true);

                    // Refleks Patologis
                    $('input[name="refleks_patologis"][value="' + data.refleks_patologis + '"]').prop("checked", true);

                    // Tremor
                    $('input[name="tremor"][value="' + data.tremor + '"]').prop("checked", true);

                    // Motorik Kasar
                    $('input[name="motorik_kasar"][value="' + data.motorik_kasar + '"]').prop("checked", true);

                    // Motorik Halus
                    $('input[name="motorik_halus"][value="' + data.motorik_halus + '"]').prop("checked", true);

                    // Varices
                    $('input[name="varices"][value="' + data.varices + '"]').prop("checked", true);

                    $('#catatan').val(data.catatan);
                    $('#dokter_periksa').val(data.dokter_periksa);

                }
            }

        });
    });
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>