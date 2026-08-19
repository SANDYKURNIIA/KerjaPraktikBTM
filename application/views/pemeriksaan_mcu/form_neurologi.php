<div class="form_neurologi">
    <label class="control-label" style="margin-top:30px;"><strong>
            <h5>NEUROLOGIS</h5>
        </strong></label>
    <div class="col-md-12">
        <table border=0 width=100% class="table display mb-30">
            <tbody>
                <tr>
                    <td width="300px">Sensibilitas</td>
                    <td width="300px">
                        <input type="radio" name="sensibilitas" id="sensibilitas1" value="Normal" class="rad1" checked />
                        <label for="sensibilitas1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="sensibilitas" id="sensibilitas2" value="Kelainan" class="rad1" />
                        <label for="sensibilitas2">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Romberg test</td>
                    <td width="300px">
                        <input type="radio" name="romberg" id="romberg2" value="Negatif" class="rad1" checked />
                        <label for="romberg2">Negatif</label>
                    </td>
                    <td>
                        <input type="radio" name="romberg" id="romberg1" value="Positif" class="rad1" />
                        <label for="romberg1">Positif</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Tinnel test</td>
                    <td width="300px">
                        <input type="radio" name="tinnel" id="tinnel2" value="Negatif" class="rad1" checked />
                        <label for="tinnel2">Negatif</label>
                    </td>
                    <td>
                        <input type="radio" name="tinnel" id="tinnel1" value="Positif" class="rad1" />
                        <label for="tinnel1">Positif</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Phalen test</td>
                    <td width="300px">
                        <input type="radio" name="phalen" id="phalen2" value="Negatif" class="rad1" checked />
                        <label for="phalen2">Negatif</label>
                    </td>
                    <td>
                        <input type="radio" name="phalen" id="phalen1" value="Positif" class="rad1" />
                        <label for="phalen1">Positif</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Laseque test</td>
                    <td width="300px">
                        <input type="radio" name="laseque" id="laseque2" value="Negatif" class="rad1" checked />
                        <label for="laseque2">Negatif</label>
                    </td>
                    <td>
                        <input type="radio" name="laseque" id="laseque1" value="Positif" class="rad1" />
                        <label for="laseque1">Positif</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Patrick test</td>
                    <td width="300px">
                        <input type="radio" name="patrick" id="patrick2" value="Negatif" class="rad1" checked />
                        <label for="patrick2">Negatif</label>
                    </td>
                    <td>
                        <input type="radio" name="patrick" id="patrick1" value="Positif" class="rad1" />
                        <label for="patrick1">Positif</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Finkelstein test</td>
                    <td width="300px">
                        <input type="radio" name="finkelstein" id="finkelstein2" value="Negatif" class="rad1" checked />
                        <label for="finkelstein2">Negatif</label>
                    </td>
                    <td>
                        <input type="radio" name="finkelstein" id="finkelstein1" value="Positif" class="rad1" />
                        <label for="finkelstein1">Positif</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Muskuloskeletal</td>
                    <td width="300px">
                        <input type="radio" name="muskuloskeletal" id="muskuloskeletal1" value="Normal" class="rad1" checked />
                        <label for="muskuloskeletal1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="muskuloskeletal" id="muskuloskeletal2" value="Kelainan" class="rad1" />
                        <label for="muskuloskeletal2">Kelainan</label>
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
                <button onclick="insertDataPemeriksaanNeurologi()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function insertDataPemeriksaanNeurologi() {

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/cetak_bagian_neurologi",
                method: "POST",
                dataType: 'json',
                data: {
                    sensibilitas: $('input[name="sensibilitas"]:checked').val(),
                    romberg: $('input[name="romberg"]:checked').val(),
                    tinnel: $('input[name="tinnel"]:checked').val(),
                    phalen: $('input[name="phalen"]:checked').val(),
                    laseque: $('input[name="laseque"]:checked').val(),
                    patrick: $('input[name="patrick"]:checked').val(),
                    finkelstein: $('input[name="finkelstein"]:checked').val(),
                    muskuloskeletal: $('input[name="muskuloskeletal"]:checked').val(),
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
                table: 'pemeriksaan_neurologi',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    // Sensibilitas
                    $('input[name="sensibilitas"][value="' + data.sensibilitas + '"]').prop("checked", true);

                    // Romberg test
                    $('input[name="romberg"][value="' + data.romberg + '"]').prop("checked", true);

                    // Tinnel test
                    $('input[name="tinnel"][value="' + data.tinnel + '"]').prop("checked", true);

                    // Phalen test
                    $('input[name="phalen"][value="' + data.phalen + '"]').prop("checked", true);

                    // Laseque test
                    $('input[name="laseque"][value="' + data.laseque + '"]').prop("checked", true);

                    // Patrick test
                    $('input[name="patrick"][value="' + data.patrick + '"]').prop("checked", true);

                    // Finkelstein test
                    $('input[name="finkelstein"][value="' + data.finkelstein + '"]').prop("checked", true);

                    // Muskuloskeletal
                    $('input[name="muskuloskeletal"][value="' + data.muskuloskeletal + '"]').prop("checked", true);

                    $('#catatan').val(data.catatan);
                    $('#dokter_periksa').val(data.dokter_periksa);

                }
            }

        });
    });
</script>