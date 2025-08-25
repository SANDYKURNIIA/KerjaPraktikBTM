<div class="telinga">
    <div class="col-md-12">
        <table border=0 width=100% class="table display mb-30">
            <tbody>
                <tr>
                    <td width="300px">Telinga</td>
                    <td width="100px">
                        <input type="radio" name="telinga" id="telinga1" value="Normal" class="rad1" checked />
                        <label for="telinga1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="telinga" id="telinga2" value="Kelainan" class="rad1" />
                        <label for="telinga2">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Hidung</td>
                    <td width="100px">
                        <input type="radio" name="hidung" id="hidung1" value="Normal" class="rad1" checked />
                        <label for="hidung1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="hidung" id="hidung2" value="Kelainan" class="rad1" />
                        <label for="hidung2">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Gigi</td>
                    <td width="100px">
                        <input type="radio" name="gigi" id="gigi1" value="Normal" class="rad1" checked />
                        <label for="gigi1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="gigi" id="gigi2" value="Kelainan" class="rad1" />
                        <label for="gigi2">Kelainan</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Mulut dan Tenggorokan</td>
                    <td width="100px">
                        <input type="radio" name="mulut" id="mulut1" value="Normal" class="rad1" checked />
                        <label for="mulut1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="mulut" id="mulut2" value="Kelainan" class="rad1" />
                        <label for="mulut2">Kelainan</label>
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
                <button onclick="insertTHT()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function insertTHT() {

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/cetak_tht",
                method: "POST",
                dataType: 'json',
                data: {
                    telinga: $('input[name="telinga"]:checked').val(),
                    hidung: $('input[name="hidung"]:checked').val(),
                    gigi: $('input[name="gigi"]:checked').val(),
                    mulut: $('input[name="mulut"]:checked').val(),
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
                table: 'pemeriksaan_tht_mcu',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    // Telinga
                    $('input[name="telinga"][value="' + data.telinga + '"]').prop("checked", true);

                    // Hidung
                    $('input[name="hidung"][value="' + data.hidung + '"]').prop("checked", true);

                    // Gigi
                    $('input[name="gigi"][value="' + data.gigi + '"]').prop("checked", true);

                    // Mulut dan Tenggorokan
                    $('input[name="mulut"][value="' + data.mulut + '"]').prop("checked", true);
                    $('#catatan').val(data.catatan);
                    $('#dokter_periksa').val(data.dokter_periksa);

                }
            }

        });
    });
</script>