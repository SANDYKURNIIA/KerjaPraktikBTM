<<<<<<< HEAD
<div class="form_jantung">
    <label class="control-label" style="margin-top:30px;"><strong>
            <h5>JANTUNG</h5>
        </strong></label>
    <div class="col-md-12">
        <table border=0 width=100% class="table display mb-30">
            <tbody>
                <tr>
                    <td width="300px">Irama</td>
                    <td width="300px">
                        <input type="radio" name="irama" id="irama1" value="Normal" class="rad1" checked />
                        <label for="irama1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="irama" id="irama2" value="Kelainan" class="rad1" />
                        <label for="irama2">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Bunyi Jantung</td>
                    <td width="300px">
                        <input type="radio" name="bunyi_jantung" id="bunyi_jantung1" value="Normal" class="rad1" checked />
                        <label for="bunyi_jantung1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="bunyi_jantung" id="bunyi_jantung2" value="Kelainan" class="rad1" />
                        <label for="bunyi_jantung2">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Heart Rate</td>
                    <td width="300px">
                        <input type="radio" name="heart_rate" id="heart_rate1" value="Normal" class="rad1" checked />
                        <label for="heart_rate1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="heart_rate" id="heart_rate2" value="Kelainan" class="rad1" />
                        <label for="heart_rate2">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Bising</td>
                    <td width="300px">
                        <input type="radio" name="bising" id="bising1" value="Tidak Ada" class="rad1" checked />
                        <label for="bising1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="bising" id="bising2" value="Ada" class="rad1" />
                        <label for="bising2">Ada</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Galop</td>
                    <td width="300px">
                        <input type="radio" name="galop" id="galop1" value="Tidak Ada" class="rad1" checked />
                        <label for="galop1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="galop" id="galop2" value="Ada" class="rad1" />
                        <label for="galop2">Ada</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Besar Jantung</td>
                    <td width="300px">
                        <input type="radio" name="besar_jantung" id="besar_jantung1" value="Normal" class="rad1" checked />
                        <label for="besar_jantung1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="besar_jantung" id="besar_jantung2" value="Melewati 1/2 Garis Midcav" class="rad1" />
                        <label for="besar_jantung2">Melewati 1/2 Garis Midcav</label>
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
                <button onclick="insertDataBagianJantung()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function insertDataBagianJantung() {

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/cetak_bagian_jantung",
                method: "POST",
                dataType: 'json',
                data: {
                    irama: $('input[name="irama"]:checked').val(),
                    bunyi_jantung: $('input[name="bunyi_jantung"]:checked').val(),
                    heart_rate: $('input[name="heart_rate"]:checked').val(),
                    bising: $('input[name="bising"]:checked').val(),
                    galop: $('input[name="galop"]:checked').val(),
                    besar_jantung: $('input[name="besar_jantung"]:checked').val(),
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
                table: 'penyakit_jantung',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    // Irama
                    $('input[name="irama"][value="' + data.irama + '"]').prop("checked", true);

                    // Bunyi Jantung
                    $('input[name="bunyi_jantung"][value="' + data.bunyi_jantung + '"]').prop("checked", true);

                    // Heart Rate
                    $('input[name="heart_rate"][value="' + data.heart_rate + '"]').prop("checked", true);

                    // Bising
                    $('input[name="bising"][value="' + data.bising + '"]').prop("checked", true);

                    // Galop
                    $('input[name="galop"][value="' + data.galop + '"]').prop("checked", true);

                    // Besar Jantung
                    $('input[name="besar_jantung"][value="' + data.besar_jantung + '"]').prop("checked", true);

                    $('#catatan').val(data.catatan);
                    $('#dokter_periksa').val(data.dokter_periksa);

                }
            }

        });
    });
=======
<div class="form_jantung">
    <label class="control-label" style="margin-top:30px;"><strong>
            <h5>JANTUNG</h5>
        </strong></label>
    <div class="col-md-12">
        <table border=0 width=100% class="table display mb-30">
            <tbody>
                <tr>
                    <td width="300px">Irama</td>
                    <td width="300px">
                        <input type="radio" name="irama" id="irama1" value="Normal" class="rad1" checked />
                        <label for="irama1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="irama" id="irama2" value="Kelainan" class="rad1" />
                        <label for="irama2">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Bunyi Jantung</td>
                    <td width="300px">
                        <input type="radio" name="bunyi_jantung" id="bunyi_jantung1" value="Normal" class="rad1" checked />
                        <label for="bunyi_jantung1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="bunyi_jantung" id="bunyi_jantung2" value="Kelainan" class="rad1" />
                        <label for="bunyi_jantung2">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Heart Rate</td>
                    <td width="300px">
                        <input type="radio" name="heart_rate" id="heart_rate1" value="Normal" class="rad1" checked />
                        <label for="heart_rate1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="heart_rate" id="heart_rate2" value="Kelainan" class="rad1" />
                        <label for="heart_rate2">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Bising</td>
                    <td width="300px">
                        <input type="radio" name="bising" id="bising1" value="Tidak Ada" class="rad1" checked />
                        <label for="bising1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="bising" id="bising2" value="Ada" class="rad1" />
                        <label for="bising2">Ada</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Galop</td>
                    <td width="300px">
                        <input type="radio" name="galop" id="galop1" value="Tidak Ada" class="rad1" checked />
                        <label for="galop1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="galop" id="galop2" value="Ada" class="rad1" />
                        <label for="galop2">Ada</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Besar Jantung</td>
                    <td width="300px">
                        <input type="radio" name="besar_jantung" id="besar_jantung1" value="Normal" class="rad1" checked />
                        <label for="besar_jantung1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="besar_jantung" id="besar_jantung2" value="Melewati 1/2 Garis Midcav" class="rad1" />
                        <label for="besar_jantung2">Melewati 1/2 Garis Midcav</label>
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
                <button onclick="insertDataBagianJantung()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function insertDataBagianJantung() {

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/cetak_bagian_jantung",
                method: "POST",
                dataType: 'json',
                data: {
                    irama: $('input[name="irama"]:checked').val(),
                    bunyi_jantung: $('input[name="bunyi_jantung"]:checked').val(),
                    heart_rate: $('input[name="heart_rate"]:checked').val(),
                    bising: $('input[name="bising"]:checked').val(),
                    galop: $('input[name="galop"]:checked').val(),
                    besar_jantung: $('input[name="besar_jantung"]:checked').val(),
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
                table: 'penyakit_jantung',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    // Irama
                    $('input[name="irama"][value="' + data.irama + '"]').prop("checked", true);

                    // Bunyi Jantung
                    $('input[name="bunyi_jantung"][value="' + data.bunyi_jantung + '"]').prop("checked", true);

                    // Heart Rate
                    $('input[name="heart_rate"][value="' + data.heart_rate + '"]').prop("checked", true);

                    // Bising
                    $('input[name="bising"][value="' + data.bising + '"]').prop("checked", true);

                    // Galop
                    $('input[name="galop"][value="' + data.galop + '"]').prop("checked", true);

                    // Besar Jantung
                    $('input[name="besar_jantung"][value="' + data.besar_jantung + '"]').prop("checked", true);

                    $('#catatan').val(data.catatan);
                    $('#dokter_periksa').val(data.dokter_periksa);

                }
            }

        });
    });
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>