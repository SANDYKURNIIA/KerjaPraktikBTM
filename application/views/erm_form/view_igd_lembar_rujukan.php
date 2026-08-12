<<<<<<< HEAD
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Lembar Rujukan</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">

                <div class="panel-body">
                    <div class="form-wrap">


                        <div class="form-group">
                            <div class="col-md-4">
                                <strong>
                                    <label class="control-label mb-10 text-left">Kepada Yth. TS. Di - <span class="help"></span></label>
                                </strong>
                                <span id="tempat_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="text" class="form-control" value="" id="tempat">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">Dengan Hormat, <span class="help"></span></label>
                                </strong>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">Bersama ini kami kirimkan kepada teman sejawat, <span class="help"></span></label>
                                </strong>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                        <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                        <input type="hidden" class="form-control" value="<?= $no_rm ?>" id="inNoRM">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?= $nama ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Tgl Lahir<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?= $tgl_lahir ?>">
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

                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Pekerjaan<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?= $pekerjaan ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Alamat<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?= $alamat ?>">
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

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Diagnosa<span class="help"></span></label>
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
                                    <input type="text" class="form-control" value="" id="terapi">
                                </div>
                            </div>
                        </div>

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
                            <div class="col-md-12">
                                <hr />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">Lembar Jawaban Konsul <span class="help"></span></label>
                                </strong>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                <input type="text" class="form-control" value="<?= $nama ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <strong>
                                    <label class="control-label mb-10 text-left">Kepada Yth. TS. Di - <span class="help"></span></label>
                                </strong>
                                <span id="tempat1_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="text" class="form-control" value="" id="tempat1">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Hasil Pemeriksaan<span class="help"></span></label>
                                <span id="hasil_periksa_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="text" class="form-control" id="hasil_periksa">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Teraphy<span class="help"></span></label>
                                <span id="terapi1_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="text" class="form-control" value="" id="terapi1">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Saran<span class="help"></span></label>
                                <span id="saran_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="text" class="form-control" value="" id="saran">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">Terima Kasih atas konsultasi ini. <span class="help"></span></label>
                                </strong>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                <button type="submit" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function simpan() {
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();
        no_rm = $('#inNoRM').val();
        tempat = $('#tempat').val();
        riwayat_penyakit = $('#riwayat_penyakit').val();
        diagnosis = $('#diagnosis').val();
        tempat1 = $('#tempat1').val();
        hasil_periksa = $('#hasil_periksa').val();
        terapi1 = $('#terapi1').val();
        terapi = $('#terapi').val();
        saran = $('#saran').val();


        dataString = 'no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
            '&tempat=' + tempat + '&riwayat_penyakit=' + riwayat_penyakit + '&diagnosis=' + diagnosis + '&tempat1=' + tempat1 +
            '&hasil_periksa=' + hasil_periksa + '&terapi=' + terapi + '&hasil_periksa=' + hasil_periksa +
            '&terapi1=' + terapi1 + '&saran=' + saran;

            id_pel = "<?php echo urlencode(base64_encode($id_pelayanan));?>";
    id_his = "<?php echo urlencode(base64_encode($id_history));?>";
        $.ajax({
            url: "<?php echo base_url() ?>Erm_igd_lembar_rujukan/insert_lembar_rujukan",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pel + '/' + id_his;
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
                    <h6 class="panel-title txt-dark">Lembar Rujukan</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">

                <div class="panel-body">
                    <div class="form-wrap">


                        <div class="form-group">
                            <div class="col-md-4">
                                <strong>
                                    <label class="control-label mb-10 text-left">Kepada Yth. TS. Di - <span class="help"></span></label>
                                </strong>
                                <span id="tempat_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="text" class="form-control" value="" id="tempat">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">Dengan Hormat, <span class="help"></span></label>
                                </strong>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">Bersama ini kami kirimkan kepada teman sejawat, <span class="help"></span></label>
                                </strong>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                        <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                        <input type="hidden" class="form-control" value="<?= $no_rm ?>" id="inNoRM">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?= $nama ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Tgl Lahir<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?= $tgl_lahir ?>">
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

                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Pekerjaan<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?= $pekerjaan ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Alamat<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?= $alamat ?>">
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

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Diagnosa<span class="help"></span></label>
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
                                    <input type="text" class="form-control" value="" id="terapi">
                                </div>
                            </div>
                        </div>

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
                            <div class="col-md-12">
                                <hr />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">Lembar Jawaban Konsul <span class="help"></span></label>
                                </strong>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                <input type="text" class="form-control" value="<?= $nama ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <strong>
                                    <label class="control-label mb-10 text-left">Kepada Yth. TS. Di - <span class="help"></span></label>
                                </strong>
                                <span id="tempat1_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="text" class="form-control" value="" id="tempat1">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Hasil Pemeriksaan<span class="help"></span></label>
                                <span id="hasil_periksa_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="text" class="form-control" id="hasil_periksa">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Teraphy<span class="help"></span></label>
                                <span id="terapi1_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="text" class="form-control" value="" id="terapi1">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Saran<span class="help"></span></label>
                                <span id="saran_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="text" class="form-control" value="" id="saran">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">Terima Kasih atas konsultasi ini. <span class="help"></span></label>
                                </strong>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                <button type="submit" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function simpan() {
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();
        no_rm = $('#inNoRM').val();
        tempat = $('#tempat').val();
        riwayat_penyakit = $('#riwayat_penyakit').val();
        diagnosis = $('#diagnosis').val();
        tempat1 = $('#tempat1').val();
        hasil_periksa = $('#hasil_periksa').val();
        terapi1 = $('#terapi1').val();
        terapi = $('#terapi').val();
        saran = $('#saran').val();


        dataString = 'no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
            '&tempat=' + tempat + '&riwayat_penyakit=' + riwayat_penyakit + '&diagnosis=' + diagnosis + '&tempat1=' + tempat1 +
            '&hasil_periksa=' + hasil_periksa + '&terapi=' + terapi + '&hasil_periksa=' + hasil_periksa +
            '&terapi1=' + terapi1 + '&saran=' + saran;

            id_pel = "<?php echo urlencode(base64_encode($id_pelayanan));?>";
    id_his = "<?php echo urlencode(base64_encode($id_history));?>";
        $.ajax({
            url: "<?php echo base_url() ?>Erm_igd_lembar_rujukan/insert_lembar_rujukan",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pel + '/' + id_his;
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