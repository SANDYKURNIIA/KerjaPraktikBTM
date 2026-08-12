<<<<<<< HEAD
<div class="form_obgyne">
    <div class="row">
        <table border=1 class="table table-bordered display product-overview mb-30" id="support_table">
            <tbody>

                <tr>
                    <td width="300px">Keadaan Umum</td>
                    <td width="300px">
                        <input type="radio" name="keadaan_umum" id="keadaan_umum1" value="Baik" class="rad1" checked /><label for="keadaan_umum1"> Baik</label>
                    </td>
                    <td width="300px">
                        <input type="radio" name="keadaan_umum" id="keadaan_umum2" value="Sedang" class="rad2" /><label for="keadaan_umum2">
                            Sedang</label>
                    </td>
                    <td width="300px">
                        <input type="radio" name="keadaan_umum" id="keadaan_umum3" value="Buruk" class="rad5" /><label for="keadaan_umum3">
                            Buruk</label>
                    </td>
                </tr>
                <tr>
                    <td width="100px">Kesadaran</td>
                    <td width="300px">
                        <input type="radio" name="kesadaran" id="kesadaran1" value="Kompos Mentis" class="rad1" checked /><label for="kesadaran1"> Kompos Mentis</label>
                    </td>
                    <td width="300px">
                        <input type="radio" name="kesadaran" id="kesadaran2" value="Lain-lain" class="rad2" /><label for="kesadaran2">
                            Lain-lain</label>
                    </td>
                </tr>
                <tr>
                    <td width="100px">Gizi</td>
                    <td width="300px">
                        <input type="radio" name="gizi" id="gizi1" value="Baik" checked /><label for="gizi1"> Baik</label>
                    </td>
                    <td width="300px">
                        <input type="radio" name="gizi" id="gizi2" value="Sedang" /><label for="gizi2">
                            Sedang</label>
                    </td>
                    <td width="300px">
                        <input type="radio" name="gizi" id="gizi3" value="Buruk" /><label for="gizi3">
                            Buruk</label>
                    </td>
                </tr>
                <tr>
                    <td width="100px">Sesak Nafas</td>
                    <td width="300px">
                        <input type="radio" name="sesak_nafas" id="sesak_nafas1" value="Tidak" class="rad1" checked /><label for="sesak_nafas1"> Tidak</label>
                    </td>
                    <td width="300px">
                        <input type="radio" name="sesak_nafas" id="sesak_nafas2" value="Ada" class="rad2" /><label for="sesak_nafas2"> Ada</label>
                    </td>
                </tr>
                <tr>
                    <td width="100px">Cyanosis</td>
                    <td width="300px">
                        <input type="radio" name="cyanosis" id="cyanosis1" value="Tidak" class="rad1" checked /><label for="cyanosis1"> Tidak</label>
                    </td>
                    <td width="300px">
                        <input type="radio" name="cyanosis" id="cyanosis2" value="Ada" class="rad2" /><label for="cyanosis2"> Ada</label>
                    </td>
                </tr>
                <tr>
                    <td width="100px">Kulit</td>
                    <td width="300px">
                        <input type="radio" name="kulit" id="kulit1" value="Tidak Ada Kelainan" class="rad1" checked /><label for="kulit1"> Tidak Ada Kelainan</label>
                    </td>
                    <td width="300px">
                        <input type="radio" name="kulit" id="kulit2" value="Kelainan Dengan Isian" class="rad2" /><label for="kulit2"> Kelainan Dengan Isian</label>
                    </td>
                </tr>
                <tr>
                    <td width="100px">Kepala</td>
                    <td width="300px">
                        <input type="radio" name="kepala" id="kepala1" value="Normal" class="rad1" checked /><label for="kepala1"> Normal </label>
                    </td>
                    <td width="300px">
                        <input type="radio" name="kepala" id="kepala2" value="Kelainan" class="rad2" /><label for="kepala2"> Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="200px">Catatan</td>
                    <td width="900px" colspan=3>
                        <textarea rows="4" cols="40" id="catatan"></textarea>
                    </td>
                </tr>

            </tbody>
        </table>
        <div class="col-md-8">
            <div class="form-group pull-right">
                <button onclick="insertKeadaanUmum()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function insertKeadaanUmum() {


        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/cetak_keadaan_umum",
                method: "POST",
                dataType: 'json',
                data: {
                    keadaan_umum: $('input[name="keadaan_umum"]:checked').val(),
                    kesadaran: $('input[name="kesadaran"]:checked').val(),
                    gizi: $('input[name="gizi"]:checked').val(),
                    sesak_nafas: $('input[name="sesak_nafas"]:checked').val(),
                    cyanosis: $('input[name="cyanosis"]:checked').val(),
                    kulit: $('input[name="kulit"]:checked').val(),
                    kepala: $('input[name="kepala"]:checked').val(),
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
                table: 'keadaan_umum_mcu',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    $('input[name="keadaan_umum"][value="' + data.keadaan_umum + '"]').prop("checked", true);
                    $('input[name="kesadaran"][value="' + data.kesadaran + '"]').prop("checked", true);
                    $('input[name="gizi"][value="' + data.gizi + '"]').prop("checked", true);
                    $('input[name="sesak_nafas"][value="' + data.sesak_nafas + '"]').prop("checked", true);
                    $('input[name="cyanosis"][value="' + data.cyanosis + '"]').prop("checked", true);
                    $('input[name="kulit"][value="' + data.kulit + '"]').prop("checked", true);
                    $('input[name="kepala"][value="' + data.kepala + '"]').prop("checked", true);
                    $('#catatan').val(data.catatan);
                    $('#dokter_periksa').val(data.dokter_periksa);

                }
            }

        });
    });
=======
<div class="form_obgyne">
    <div class="row">
        <table border=1 class="table table-bordered display product-overview mb-30" id="support_table">
            <tbody>

                <tr>
                    <td width="300px">Keadaan Umum</td>
                    <td width="300px">
                        <input type="radio" name="keadaan_umum" id="keadaan_umum1" value="Baik" class="rad1" checked /><label for="keadaan_umum1"> Baik</label>
                    </td>
                    <td width="300px">
                        <input type="radio" name="keadaan_umum" id="keadaan_umum2" value="Sedang" class="rad2" /><label for="keadaan_umum2">
                            Sedang</label>
                    </td>
                    <td width="300px">
                        <input type="radio" name="keadaan_umum" id="keadaan_umum3" value="Buruk" class="rad5" /><label for="keadaan_umum3">
                            Buruk</label>
                    </td>
                </tr>
                <tr>
                    <td width="100px">Kesadaran</td>
                    <td width="300px">
                        <input type="radio" name="kesadaran" id="kesadaran1" value="Kompos Mentis" class="rad1" checked /><label for="kesadaran1"> Kompos Mentis</label>
                    </td>
                    <td width="300px">
                        <input type="radio" name="kesadaran" id="kesadaran2" value="Lain-lain" class="rad2" /><label for="kesadaran2">
                            Lain-lain</label>
                    </td>
                </tr>
                <tr>
                    <td width="100px">Gizi</td>
                    <td width="300px">
                        <input type="radio" name="gizi" id="gizi1" value="Baik" checked /><label for="gizi1"> Baik</label>
                    </td>
                    <td width="300px">
                        <input type="radio" name="gizi" id="gizi2" value="Sedang" /><label for="gizi2">
                            Sedang</label>
                    </td>
                    <td width="300px">
                        <input type="radio" name="gizi" id="gizi3" value="Buruk" /><label for="gizi3">
                            Buruk</label>
                    </td>
                </tr>
                <tr>
                    <td width="100px">Sesak Nafas</td>
                    <td width="300px">
                        <input type="radio" name="sesak_nafas" id="sesak_nafas1" value="Tidak" class="rad1" checked /><label for="sesak_nafas1"> Tidak</label>
                    </td>
                    <td width="300px">
                        <input type="radio" name="sesak_nafas" id="sesak_nafas2" value="Ada" class="rad2" /><label for="sesak_nafas2"> Ada</label>
                    </td>
                </tr>
                <tr>
                    <td width="100px">Cyanosis</td>
                    <td width="300px">
                        <input type="radio" name="cyanosis" id="cyanosis1" value="Tidak" class="rad1" checked /><label for="cyanosis1"> Tidak</label>
                    </td>
                    <td width="300px">
                        <input type="radio" name="cyanosis" id="cyanosis2" value="Ada" class="rad2" /><label for="cyanosis2"> Ada</label>
                    </td>
                </tr>
                <tr>
                    <td width="100px">Kulit</td>
                    <td width="300px">
                        <input type="radio" name="kulit" id="kulit1" value="Tidak Ada Kelainan" class="rad1" checked /><label for="kulit1"> Tidak Ada Kelainan</label>
                    </td>
                    <td width="300px">
                        <input type="radio" name="kulit" id="kulit2" value="Kelainan Dengan Isian" class="rad2" /><label for="kulit2"> Kelainan Dengan Isian</label>
                    </td>
                </tr>
                <tr>
                    <td width="100px">Kepala</td>
                    <td width="300px">
                        <input type="radio" name="kepala" id="kepala1" value="Normal" class="rad1" checked /><label for="kepala1"> Normal </label>
                    </td>
                    <td width="300px">
                        <input type="radio" name="kepala" id="kepala2" value="Kelainan" class="rad2" /><label for="kepala2"> Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="200px">Catatan</td>
                    <td width="900px" colspan=3>
                        <textarea rows="4" cols="40" id="catatan"></textarea>
                    </td>
                </tr>

            </tbody>
        </table>
        <div class="col-md-8">
            <div class="form-group pull-right">
                <button onclick="insertKeadaanUmum()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function insertKeadaanUmum() {


        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/cetak_keadaan_umum",
                method: "POST",
                dataType: 'json',
                data: {
                    keadaan_umum: $('input[name="keadaan_umum"]:checked').val(),
                    kesadaran: $('input[name="kesadaran"]:checked').val(),
                    gizi: $('input[name="gizi"]:checked').val(),
                    sesak_nafas: $('input[name="sesak_nafas"]:checked').val(),
                    cyanosis: $('input[name="cyanosis"]:checked').val(),
                    kulit: $('input[name="kulit"]:checked').val(),
                    kepala: $('input[name="kepala"]:checked').val(),
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
                table: 'keadaan_umum_mcu',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    $('input[name="keadaan_umum"][value="' + data.keadaan_umum + '"]').prop("checked", true);
                    $('input[name="kesadaran"][value="' + data.kesadaran + '"]').prop("checked", true);
                    $('input[name="gizi"][value="' + data.gizi + '"]').prop("checked", true);
                    $('input[name="sesak_nafas"][value="' + data.sesak_nafas + '"]').prop("checked", true);
                    $('input[name="cyanosis"][value="' + data.cyanosis + '"]').prop("checked", true);
                    $('input[name="kulit"][value="' + data.kulit + '"]').prop("checked", true);
                    $('input[name="kepala"][value="' + data.kepala + '"]').prop("checked", true);
                    $('#catatan').val(data.catatan);
                    $('#dokter_periksa').val(data.dokter_periksa);

                }
            }

        });
    });
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>