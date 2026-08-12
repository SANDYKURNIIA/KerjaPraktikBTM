<<<<<<< HEAD
<div class="dada">
    <label class="control-label" style="margin-top:30px;"><strong>
            <h5>RONGGA PERUT</h5>
        </strong></label>
    <div class="col-md-12">
        <table border=0 width=100% class="table display mb-30">
            <tbody>
                <tr>
                    <td width="300px">Bentuk</td>
                    <td width="300px">
                        <input type="radio" name="Bentuk" id="Bentuk1" value="Supel" class="rad1" checked />
                        <label for="Bentuk1">Supel</label>
                    </td>
                    <td>
                        <input type="radio" name="Bentuk" id="Bentuk2" value="Kelainan" class="rad1" />
                        <label for="Bentuk2">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Hati</td>
                    <td width="300px">
                        <input type="radio" name="hati" id="hati1" value="Tidak Teraba" class="rad1" checked />
                        <label for="hati1">Tidak Teraba</label>
                    </td>
                    <td>
                        <input type="radio" name="hati" id="hati2" value="Teraba" class="rad1" />
                        <label for="hati2">Teraba</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Limpa</td>
                    <td width="300px">
                        <input type="radio" name="limpa" id="limpa1" value="Tidak Teraba" class="rad1" checked />
                        <label for="limpa1">Tidak Teraba</label>
                    </td>
                    <td>
                        <input type="radio" name="limpa" id="limpa2" value="Teraba" class="rad1" />
                        <label for="limpa2">Teraba</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Asites</td>
                    <td width="300px">
                        <input type="radio" name="asites" id="asites1" value="Tidak Ada" class="rad1" checked />
                        <label for="asites1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="asites" id="asites2" value="Ada" class="rad1" />
                        <label for="asites2">Ada</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Vena Melebar</td>
                    <td width="300px">
                        <input type="radio" name="vena_melebar" id="vena_melebar1" value="Tidak Ada" class="rad1" checked />
                        <label for="vena_melebar1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="vena_melebar" id="vena_melebar2" value="Ada" class="rad1" />
                        <label for="vena_melebar2">Ada</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Peristaltik Usus</td>
                    <td width="300px">
                        <input type="radio" name="peristaltik_usus" id="peristaltik_usus1" value="Normal" class="rad1" checked />
                        <label for="peristaltik_usus1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="peristaltik_usus" id="peristaltik_usus2" value="Kelainan" class="rad1" />
                        <label for="peristaltik_usus2">Kelainan</label>
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
                <button onclick="insertRonggaPerut()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function insertRonggaPerut() {


        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/cetak_rongga_perut",
                method: "POST",
                dataType: 'json',
                data: {
                    Bentuk: $('input[name="Bentuk"]:checked').val(),
                    hati: $('input[name="hati"]:checked').val(),
                    limpa: $('input[name="limpa"]:checked').val(),
                    asites: $('input[name="asites"]:checked').val(),
                    vena_melebar: $('input[name="vena_melebar"]:checked').val(),
                    peristaltik_usus: $('input[name="peristaltik_usus"]:checked').val(),
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
                table: 'rongga_perut_mcu',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    // Bentuk
                    $('input[name="Bentuk"][value="' + data.bentuk + '"]').prop("checked", true);

                    // Hati
                    $('input[name="hati"][value="' + data.hati + '"]').prop("checked", true);

                    // Limpa
                    $('input[name="limpa"][value="' + data.limpa + '"]').prop("checked", true);

                    // Asites
                    $('input[name="asites"][value="' + data.asites + '"]').prop("checked", true);

                    // Vena Melebar
                    $('input[name="vena_melebar"][value="' + data.vena_melebar + '"]').prop("checked", true);

                    // Peristaltik Usus
                    $('input[name="peristaltik_usus"][value="' + data.peristaltik_usus + '"]').prop("checked", true);
                    $('#catatan').val(data.catatan);
                    $('#dokter_periksa').val(data.dokter_periksa);

                }
            }

        });
    });
=======
<div class="dada">
    <label class="control-label" style="margin-top:30px;"><strong>
            <h5>RONGGA PERUT</h5>
        </strong></label>
    <div class="col-md-12">
        <table border=0 width=100% class="table display mb-30">
            <tbody>
                <tr>
                    <td width="300px">Bentuk</td>
                    <td width="300px">
                        <input type="radio" name="Bentuk" id="Bentuk1" value="Supel" class="rad1" checked />
                        <label for="Bentuk1">Supel</label>
                    </td>
                    <td>
                        <input type="radio" name="Bentuk" id="Bentuk2" value="Kelainan" class="rad1" />
                        <label for="Bentuk2">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Hati</td>
                    <td width="300px">
                        <input type="radio" name="hati" id="hati1" value="Tidak Teraba" class="rad1" checked />
                        <label for="hati1">Tidak Teraba</label>
                    </td>
                    <td>
                        <input type="radio" name="hati" id="hati2" value="Teraba" class="rad1" />
                        <label for="hati2">Teraba</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Limpa</td>
                    <td width="300px">
                        <input type="radio" name="limpa" id="limpa1" value="Tidak Teraba" class="rad1" checked />
                        <label for="limpa1">Tidak Teraba</label>
                    </td>
                    <td>
                        <input type="radio" name="limpa" id="limpa2" value="Teraba" class="rad1" />
                        <label for="limpa2">Teraba</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Asites</td>
                    <td width="300px">
                        <input type="radio" name="asites" id="asites1" value="Tidak Ada" class="rad1" checked />
                        <label for="asites1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="asites" id="asites2" value="Ada" class="rad1" />
                        <label for="asites2">Ada</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Vena Melebar</td>
                    <td width="300px">
                        <input type="radio" name="vena_melebar" id="vena_melebar1" value="Tidak Ada" class="rad1" checked />
                        <label for="vena_melebar1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="vena_melebar" id="vena_melebar2" value="Ada" class="rad1" />
                        <label for="vena_melebar2">Ada</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Peristaltik Usus</td>
                    <td width="300px">
                        <input type="radio" name="peristaltik_usus" id="peristaltik_usus1" value="Normal" class="rad1" checked />
                        <label for="peristaltik_usus1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="peristaltik_usus" id="peristaltik_usus2" value="Kelainan" class="rad1" />
                        <label for="peristaltik_usus2">Kelainan</label>
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
                <button onclick="insertRonggaPerut()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function insertRonggaPerut() {


        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/cetak_rongga_perut",
                method: "POST",
                dataType: 'json',
                data: {
                    Bentuk: $('input[name="Bentuk"]:checked').val(),
                    hati: $('input[name="hati"]:checked').val(),
                    limpa: $('input[name="limpa"]:checked').val(),
                    asites: $('input[name="asites"]:checked').val(),
                    vena_melebar: $('input[name="vena_melebar"]:checked').val(),
                    peristaltik_usus: $('input[name="peristaltik_usus"]:checked').val(),
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
                table: 'rongga_perut_mcu',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    // Bentuk
                    $('input[name="Bentuk"][value="' + data.bentuk + '"]').prop("checked", true);

                    // Hati
                    $('input[name="hati"][value="' + data.hati + '"]').prop("checked", true);

                    // Limpa
                    $('input[name="limpa"][value="' + data.limpa + '"]').prop("checked", true);

                    // Asites
                    $('input[name="asites"][value="' + data.asites + '"]').prop("checked", true);

                    // Vena Melebar
                    $('input[name="vena_melebar"][value="' + data.vena_melebar + '"]').prop("checked", true);

                    // Peristaltik Usus
                    $('input[name="peristaltik_usus"][value="' + data.peristaltik_usus + '"]').prop("checked", true);
                    $('#catatan').val(data.catatan);
                    $('#dokter_periksa').val(data.dokter_periksa);

                }
            }

        });
    });
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>