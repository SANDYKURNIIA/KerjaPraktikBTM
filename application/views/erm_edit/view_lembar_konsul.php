<<<<<<< HEAD
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Lembar Konsul Antar DPJP</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">

                <div class="panel-body">
                    <div class="form-wrap">


                        <div class="form-group">
                            <div class="col-md-4">
                                <strong>
                                    <label class="control-label mb-10 text-left">Kepada Yth. TS. Dokter: <span class="help"></span></label>
                                </strong>
                                <span id="tempat_error" class="text-danger"></span>
                                <!-- <div class="has-success">
                                    <input type="text" class="form-control" value="" id="inDokter">
                                </div> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">Mohon konsultasi pasien berikut: <span class="help"></span></label>
                                </strong>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                        <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                        <input type="hidden" class="form-control" value="<?= $no_rm ?>" id="inNoRM">
                        <input type="hidden" class="form-control" id="inId">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?= $nama ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Umur<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?php
                                                                                        $tanggal = new DateTime($tgl_lahir);
                                                                                        $today = new DateTime();
                                                                                        $y = $today->diff($tanggal)->y;
                                                                                        echo  $y . " tahun ";  ?>">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">Dari hasil pemeriksaan kami, pasien tersebut dengan : <span class="help"></span></label>
                                </strong>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Diagnosis<span class="help"></span></label>
                                <span id="diagnosis_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="text" class="form-control" value="" id="diagnosis">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Terapi Yang Telah Diberikan<span class="help"></span></label>
                                <span id="terapi_error" class="text-danger"></span>
                                <div class="has-success">
                                    <textarea class="form-control" name="" id="terapi" cols="30" rows="5"></textarea>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Riwayat Penyakit<span class="help"></span></label>
                                <span id="riwayat_penyakit_error" class="text-danger"></span>
                                <div class="has-success">
                                    <textarea class="form-control" name="" cols="30" rows="5" id="riwayat_penyakit"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <!-- <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="tindak_lanjut5" type="checkbox" name="tindak_lanjut" value="5" >
                                    <label class="control-label" for="tindak_lanjut5">
                                        Hal penting yang perlu diperhatikan
                                    </label>
                                    <div class="has-success">
                                        <input type="text" class="form-control" id="kontrol" style="display: none;">
                                    </div>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="tindak_lanjut1" type="checkbox" name="tindak_lanjut" value="5">
                                    <label class="control-label" for="tindak_lanjut1">
                                        Mohon konsul dan tatalaksanan selanjutnya atas pasien tersebut
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="tindak_lanjut2" type="checkbox" name="tindak_lanjut" value="5">
                                    <label class="control-label" for="tindak_lanjut2">
                                        Mohon konsul, apakah ada kelainan di bagian TS atas pasien tersebut,
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="tindak_lanjut3" type="checkbox" name="tindak_lanjut" value="5">
                                    <label class="control-label" for="tindak_lanjut">
                                        Lainnya
                                    </label>
                                    <div class="has-success">
                                        <textarea class="form-control" name="" id="tindak_lanjut" cols="30" rows="5" style="display: none;"></textarea>

                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                        <div class="form-group" style="margin-top: 30px;">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">Mohon konsul dan penanganan selanjutnya, terima kasih atas bantuan dan kerja samanya. <span class="help"></span></label>
                                </strong>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-6">
                                <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                <button type="submit" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table table-hover display  pb-30" id="tabel_terapi">
                                <thead>
                                    <tr class="bg-success">
                                        <th>EDIT</th>
                                        <th>REPLY</th>
                                        <th>HAPUS</th>
                                        <th>TANGGAL & JAM</th>
                                        <th>DOKTER</th>
                                        <th>POLI</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="bg-success">
                                        <th>EDIT</th>
                                        <th>REPLY</th>
                                        <th>HAPUS</th>
                                        <th>TANGGAL & JAM</th>
                                        <th>DOKTER</th>
                                        <th>POLI</th>
                                    </tr>
                                </tfoot>
                                <tbody style="color: black">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $("#tindak_lanjut3").click(function() {
            if ($(this).is(":checked")) {
                $("#tindak_lanjut").show();
            } else {
                $("#tindak_lanjut").hide();
            }
        });

    });
    $(document).ready(function() {
        id = $('#inHis').val();
        id_pelayanan = $('#inPel').val();
        $.ajax({
            url: "<?php echo base_url() ?>Erm_dpjp/get_data",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_pelayanan
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    $('#diagnosis').val(data.diagnosis).attr('readonly', true);
                    $('#terapi').val(data.terapi);
                    $('#riwayat_penyakit').val(data.riwayat_penyakit);
                    $('#inId').val(data.id_form_lembar_rujukan).attr('readonly', true);
                }
            }

        })
        
    });


    function simpan() {
        id_pelayanan = $('#inPel').val();
        id = $('#inId').val();
        id_history = $('#inHis').val();
        no_rm = $('#inNoRM').val();

        diagnosis = $('#diagnosis').val();
        terapi = $('#terapi').val();
        riwayat_penyakit = $('#riwayat_penyakit').val();
        // var tindak_lanjut = [];
        // $('input[name="tindak_lanjut"]').each(function() {
        //     if ($(this).is(":checked")) {
        //         tindak_lanjut.push($(this).val());
        //     }
        // });
        // tindak_lanjut = $('#tindak_lanjut3').is(":checked") ? tindak_lanjut.toString() + ', ' + $('#tindak_lanjut').val() : tindak_lanjut.toString();


        dataString = 'no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
        '&diagnosis=' + diagnosis + '&terapi=' + terapi + '&riwayat_penyakit=' + riwayat_penyakit + '&id=' + id;

        $.ajax({
            url: "<?php echo base_url() ?>Erm_dpjp/update_lembar_rujukan",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    window.location.href = "<?=$url ?>";
                } else if (data.error) {
                    if (data.tempat != '') {
                        $('#tempat_error').html(data.tempat);
                    } else {
                        $('#tempat_error').html('');
                    }
                    if (data.riwayat_penyakit != '') {
                        $('#riwayat_penyakit_error').html(data.riwayat_penyakit);
                    } else {
                        $('#riwayat_penyakit_error').html('');
                    }
                    if (data.diagnosis != '') {
                        $('#diagnosis_error').html(data.diagnosis);
                    } else {
                        $('#diagnosis_error').html('');
                    }
                    if (data.terapi != '') {
                        $('#terapi_error').html(data.terapi);
                    } else {
                        $('#terapi_error').html('');
                    }
                    if (data.tempat1 != '') {
                        $('#tempat1_error').html(data.tempat1);
                    } else {
                        $('#tempat1_error').html('');
                    }
                    if (data.hasil_periksa != '') {
                        $('#hasil_periksa_error').html(data.hasil_periksa);
                    } else {
                        $('#hasil_periksa_error').html('');
                    }
                    if (data.terapi1 != '') {
                        $('#terapi1_error').html(data.terapi1);
                    } else {
                        $('#terapi1_error').html('');
                    }
                    if (data.saran != '') {
                        $('#saran_error').html(data.saran);
                    } else {
                        $('#saran_error').html('');
                    }

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
        return false;
    }
=======
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Lembar Konsul Antar DPJP</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">

                <div class="panel-body">
                    <div class="form-wrap">


                        <div class="form-group">
                            <div class="col-md-4">
                                <strong>
                                    <label class="control-label mb-10 text-left">Kepada Yth. TS. Dokter: <span class="help"></span></label>
                                </strong>
                                <span id="tempat_error" class="text-danger"></span>
                                <!-- <div class="has-success">
                                    <input type="text" class="form-control" value="" id="inDokter">
                                </div> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">Mohon konsultasi pasien berikut: <span class="help"></span></label>
                                </strong>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                        <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                        <input type="hidden" class="form-control" value="<?= $no_rm ?>" id="inNoRM">
                        <input type="hidden" class="form-control" id="inId">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?= $nama ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Umur<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?php
                                                                                        $tanggal = new DateTime($tgl_lahir);
                                                                                        $today = new DateTime();
                                                                                        $y = $today->diff($tanggal)->y;
                                                                                        echo  $y . " tahun ";  ?>">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">Dari hasil pemeriksaan kami, pasien tersebut dengan : <span class="help"></span></label>
                                </strong>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Diagnosis<span class="help"></span></label>
                                <span id="diagnosis_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="text" class="form-control" value="" id="diagnosis">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Terapi Yang Telah Diberikan<span class="help"></span></label>
                                <span id="terapi_error" class="text-danger"></span>
                                <div class="has-success">
                                    <textarea class="form-control" name="" id="terapi" cols="30" rows="5"></textarea>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Riwayat Penyakit<span class="help"></span></label>
                                <span id="riwayat_penyakit_error" class="text-danger"></span>
                                <div class="has-success">
                                    <textarea class="form-control" name="" cols="30" rows="5" id="riwayat_penyakit"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <!-- <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="tindak_lanjut5" type="checkbox" name="tindak_lanjut" value="5" >
                                    <label class="control-label" for="tindak_lanjut5">
                                        Hal penting yang perlu diperhatikan
                                    </label>
                                    <div class="has-success">
                                        <input type="text" class="form-control" id="kontrol" style="display: none;">
                                    </div>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="tindak_lanjut1" type="checkbox" name="tindak_lanjut" value="5">
                                    <label class="control-label" for="tindak_lanjut1">
                                        Mohon konsul dan tatalaksanan selanjutnya atas pasien tersebut
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="tindak_lanjut2" type="checkbox" name="tindak_lanjut" value="5">
                                    <label class="control-label" for="tindak_lanjut2">
                                        Mohon konsul, apakah ada kelainan di bagian TS atas pasien tersebut,
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="tindak_lanjut3" type="checkbox" name="tindak_lanjut" value="5">
                                    <label class="control-label" for="tindak_lanjut">
                                        Lainnya
                                    </label>
                                    <div class="has-success">
                                        <textarea class="form-control" name="" id="tindak_lanjut" cols="30" rows="5" style="display: none;"></textarea>

                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                        <div class="form-group" style="margin-top: 30px;">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">Mohon konsul dan penanganan selanjutnya, terima kasih atas bantuan dan kerja samanya. <span class="help"></span></label>
                                </strong>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-6">
                                <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                <button type="submit" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table table-hover display  pb-30" id="tabel_terapi">
                                <thead>
                                    <tr class="bg-success">
                                        <th>EDIT</th>
                                        <th>REPLY</th>
                                        <th>HAPUS</th>
                                        <th>TANGGAL & JAM</th>
                                        <th>DOKTER</th>
                                        <th>POLI</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="bg-success">
                                        <th>EDIT</th>
                                        <th>REPLY</th>
                                        <th>HAPUS</th>
                                        <th>TANGGAL & JAM</th>
                                        <th>DOKTER</th>
                                        <th>POLI</th>
                                    </tr>
                                </tfoot>
                                <tbody style="color: black">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $("#tindak_lanjut3").click(function() {
            if ($(this).is(":checked")) {
                $("#tindak_lanjut").show();
            } else {
                $("#tindak_lanjut").hide();
            }
        });

    });
    $(document).ready(function() {
        id = $('#inHis').val();
        id_pelayanan = $('#inPel').val();
        $.ajax({
            url: "<?php echo base_url() ?>Erm_dpjp/get_data",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_pelayanan
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    $('#diagnosis').val(data.diagnosis).attr('readonly', true);
                    $('#terapi').val(data.terapi);
                    $('#riwayat_penyakit').val(data.riwayat_penyakit);
                    $('#inId').val(data.id_form_lembar_rujukan).attr('readonly', true);
                }
            }

        })
        
    });


    function simpan() {
        id_pelayanan = $('#inPel').val();
        id = $('#inId').val();
        id_history = $('#inHis').val();
        no_rm = $('#inNoRM').val();

        diagnosis = $('#diagnosis').val();
        terapi = $('#terapi').val();
        riwayat_penyakit = $('#riwayat_penyakit').val();
        // var tindak_lanjut = [];
        // $('input[name="tindak_lanjut"]').each(function() {
        //     if ($(this).is(":checked")) {
        //         tindak_lanjut.push($(this).val());
        //     }
        // });
        // tindak_lanjut = $('#tindak_lanjut3').is(":checked") ? tindak_lanjut.toString() + ', ' + $('#tindak_lanjut').val() : tindak_lanjut.toString();


        dataString = 'no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
        '&diagnosis=' + diagnosis + '&terapi=' + terapi + '&riwayat_penyakit=' + riwayat_penyakit + '&id=' + id;

        $.ajax({
            url: "<?php echo base_url() ?>Erm_dpjp/update_lembar_rujukan",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    window.location.href = "<?=$url ?>";
                } else if (data.error) {
                    if (data.tempat != '') {
                        $('#tempat_error').html(data.tempat);
                    } else {
                        $('#tempat_error').html('');
                    }
                    if (data.riwayat_penyakit != '') {
                        $('#riwayat_penyakit_error').html(data.riwayat_penyakit);
                    } else {
                        $('#riwayat_penyakit_error').html('');
                    }
                    if (data.diagnosis != '') {
                        $('#diagnosis_error').html(data.diagnosis);
                    } else {
                        $('#diagnosis_error').html('');
                    }
                    if (data.terapi != '') {
                        $('#terapi_error').html(data.terapi);
                    } else {
                        $('#terapi_error').html('');
                    }
                    if (data.tempat1 != '') {
                        $('#tempat1_error').html(data.tempat1);
                    } else {
                        $('#tempat1_error').html('');
                    }
                    if (data.hasil_periksa != '') {
                        $('#hasil_periksa_error').html(data.hasil_periksa);
                    } else {
                        $('#hasil_periksa_error').html('');
                    }
                    if (data.terapi1 != '') {
                        $('#terapi1_error').html(data.terapi1);
                    } else {
                        $('#terapi1_error').html('');
                    }
                    if (data.saran != '') {
                        $('#saran_error').html(data.saran);
                    } else {
                        $('#saran_error').html('');
                    }

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
        return false;
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>