<<<<<<< HEAD
<div class="paru">
    <label class="control-label" style="margin-top:30px;"><strong>
            <h5>PARU</h5>
        </strong></label>
    <div class="col-md-12">
        <table border=0 width=100% class="table display mb-30">
            <tbody>
                <tr>
                    <td width="300px">Suara Perkusi</td>
                    <td width="300px">
                        <input type="radio" name="suara_perkusi" id="suara_perkusi1" value="Normal" class="rad1" checked />
                        <label for="suara_perkusi1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="suara_perkusi" id="suara_perkusi2" value="Kelainan" class="rad1" />
                        <label for="suara_perkusi2">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Rhonkhi</td>
                    <td width="300px">
                        <input type="radio" name="rhonkhi" id="rhonkhi1" value="Tidak Ada" class="rad1" checked />
                        <label for="rhonkhi1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="rhonkhi" id="rhonkhi2" value="Ada" class="rad1" />
                        <label for="rhonkhi2">Ada</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Wheezing</td>
                    <td width="300px">
                        <input type="radio" name="wheezing" id="wheezing1" value="Tidak Ada" class="rad1" checked />
                        <label for="wheezing1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="wheezing" id="wheezing2" value="Ada" class="rad1" />
                        <label for="wheezing2">Ada</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Krepitas</td>
                    <td width="300px">
                        <input type="radio" name="krepitas" id="krepitas1" value="Tidak Ada" class="rad1" checked />
                        <label for="krepitas1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="krepitas" id="krepitas2" value="Ada" class="rad1" />
                        <label for="krepitas2">Ada</label>
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
                <button onclick="insertDataBagianParu()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function insertDataBagianParu() {

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/cetak_bagian_paru",
                method: "POST",
                dataType: 'json',
                data: {
                    suara_perkusi: $('input[name="suara_perkusi"]:checked').val(),
                    rhonkhi: $('input[name="rhonkhi"]:checked').val(),
                    wheezing: $('input[name="wheezing"]:checked').val(),
                    krepitas: $('input[name="krepitas"]:checked').val(),
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
                table: 'penyakit_paru',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    // Suara Perkusi
                    $('input[name="suara_perkusi"][value="' + data.suara_perkusi + '"]').prop("checked", true);

                    // Rhonkhi
                    $('input[name="rhonkhi"][value="' + data.rhonkhi + '"]').prop("checked", true);

                    // Wheezing
                    $('input[name="wheezing"][value="' + data.wheezing + '"]').prop("checked", true);

                    // Krepitas
                    $('input[name="krepitas"][value="' + data.krepitas + '"]').prop("checked", true);
                    $('#catatan').val(data.catatan);
                    $('#dokter_periksa').val(data.dokter_periksa);

                }
            }

        });
    });
=======
<div class="paru">
    <label class="control-label" style="margin-top:30px;"><strong>
            <h5>PARU</h5>
        </strong></label>
    <div class="col-md-12">
        <table border=0 width=100% class="table display mb-30">
            <tbody>
                <tr>
                    <td width="300px">Suara Perkusi</td>
                    <td width="300px">
                        <input type="radio" name="suara_perkusi" id="suara_perkusi1" value="Normal" class="rad1" checked />
                        <label for="suara_perkusi1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="suara_perkusi" id="suara_perkusi2" value="Kelainan" class="rad1" />
                        <label for="suara_perkusi2">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Rhonkhi</td>
                    <td width="300px">
                        <input type="radio" name="rhonkhi" id="rhonkhi1" value="Tidak Ada" class="rad1" checked />
                        <label for="rhonkhi1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="rhonkhi" id="rhonkhi2" value="Ada" class="rad1" />
                        <label for="rhonkhi2">Ada</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Wheezing</td>
                    <td width="300px">
                        <input type="radio" name="wheezing" id="wheezing1" value="Tidak Ada" class="rad1" checked />
                        <label for="wheezing1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="wheezing" id="wheezing2" value="Ada" class="rad1" />
                        <label for="wheezing2">Ada</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Krepitas</td>
                    <td width="300px">
                        <input type="radio" name="krepitas" id="krepitas1" value="Tidak Ada" class="rad1" checked />
                        <label for="krepitas1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="krepitas" id="krepitas2" value="Ada" class="rad1" />
                        <label for="krepitas2">Ada</label>
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
                <button onclick="insertDataBagianParu()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function insertDataBagianParu() {

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/cetak_bagian_paru",
                method: "POST",
                dataType: 'json',
                data: {
                    suara_perkusi: $('input[name="suara_perkusi"]:checked').val(),
                    rhonkhi: $('input[name="rhonkhi"]:checked').val(),
                    wheezing: $('input[name="wheezing"]:checked').val(),
                    krepitas: $('input[name="krepitas"]:checked').val(),
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
                table: 'penyakit_paru',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    // Suara Perkusi
                    $('input[name="suara_perkusi"][value="' + data.suara_perkusi + '"]').prop("checked", true);

                    // Rhonkhi
                    $('input[name="rhonkhi"][value="' + data.rhonkhi + '"]').prop("checked", true);

                    // Wheezing
                    $('input[name="wheezing"][value="' + data.wheezing + '"]').prop("checked", true);

                    // Krepitas
                    $('input[name="krepitas"][value="' + data.krepitas + '"]').prop("checked", true);
                    $('#catatan').val(data.catatan);
                    $('#dokter_periksa').val(data.dokter_periksa);

                }
            }

        });
    });
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>