<div class="dada">
    <label class="control-label" style="margin-top:30px;"><strong>
            <h5>DADA</h5>
        </strong></label>
    <div class="col-md-12">
        <table border=0 width=100% class="table display mb-30">
            <tbody>
                <tr>
                    <td width="300px">Bentuk</td>
                    <td width="300px">
                        <input type="radio" name="bentuk" id="bentuk1" value="Simetris" class="rad1" checked />
                        <label for="bentuk1">Simetris</label>
                    </td>
                    <td>
                        <input type="radio" name="bentuk" id="bentuk2" value="Asimetris" class="rad1" />
                        <label for="bentuk2">Asimetris</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Pembuluh Darah Melebar</td>
                    <td width="300px">
                        <input type="radio" name="pembuluh_darah_melebar" id="pembuluh_darah_melebar1" value="Tidak Ada" class="rad1" checked />
                        <label for="pembuluh_darah_melebar1">Tidak Ada</label>
                    </td>
                    <td>
                        <input type="radio" name="pembuluh_darah_melebar" id="pembuluh_darah_melebar2" value="Ada" class="rad1" />
                        <label for="pembuluh_darah_melebar2">Ada</label>
                    </td>
                </tr>
                <tr>
                    <td width="300px">Buah Dada</td>
                    <td width="300px">
                        <input type="radio" name="buah_dada" id="buah_dada1" value="Normal" class="rad1" checked />
                        <label for="buah_dada1">Normal</label>
                    </td>
                    <td>
                        <input type="radio" name="buah_dada" id="buah_dada2" value="Kelainan" class="rad1" />
                        <label for="buah_dada2">Kelainan</label>
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
                <button onclick="insertDada()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function insertDada() {

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/cetak_dada",
                method: "POST",
                dataType: 'json',
                data: {
                    bentuk: $('input[name="bentuk"]:checked').val(),
                    pembuluh_darah_melebar: $('input[name="pembuluh_darah_melebar"]:checked').val(),
                    buah_dada: $('input[name="buah_dada"]:checked').val(),
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
                table: 'pemeriksaan_dada_mcu',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    // Bentuk
                    $('input[name="bentuk"][value="' + data.bentuk + '"]').prop("checked", true);

                    // Pembuluh Darah Melebar
                    $('input[name="pembuluh_darah_melebar"][value="' + data.pembuluh_darah_melebar + '"]').prop("checked", true);

                    // Buah Dada
                    $('input[name="buah_dada"][value="' + data.buah_dada + '"]').prop("checked", true);
                    $('#catatan').val(data.catatan);
                    $('#dokter_periksa').val(data.dokter_periksa);

                }
            }

        });
    });
</script>