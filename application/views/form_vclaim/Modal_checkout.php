<<<<<<< HEAD
<!-- CHECKOUT -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <div class="modal fade" id="modal_checkout" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display:none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">
                                CHECKOUT PASIEN </span>
                            </h6>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div style="margin-left:1-em" class="form-body mt-20">
                            <form action="" id="formCheckout">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">NO SEP</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control " placeholder="NO SEP" id="idHisto" name="idHisto" >
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">TANGGAL PULANG</label>
                                            <div class="col-md-9 has-success">
                                                <input type="date" class="form-control " placeholder="TANGGAL" id="tglPulang" name="tglPulang" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                        echo date("Y-m-d"); ?>">
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="control-label col-md-3">KETERANGAN</label>
                                        <div class="col-md-9 has-success">
                                            <select name="ketKeluar" class='form-control select2' id="ketKeluar">
                                                <option value="1">Atas Persetujuan Dokter</option>
                                                <option value="3">Atas Permintaan Sendiri</option>
                                                <option value="4">Meninggal</option>
                                                <option value="5">Lain-lain</option>
                                            </select>
                                            <span class="help-block"></span>

                                        </div>
                                    </div>
                                    <div class="ket_meninggal" style="display: none;">
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">NO SURAT MENINGGAL</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="text" class="form-control " placeholder="No Surat Meninggal" id="noSuratMeninggal" name="noSuratMeninggal" value="">
                                                    <span class="help-block"></span>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">TANGGAL MENINGGAL</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="date" class="form-control " placeholder="TANGGAL MENINGGAL" id="tglMeninggal" name="tglMeninggal" value="">
                                                    <span class="help-block"></span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">NO LP MANUAL</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control " placeholder="No LP Manual" id="noLPManual" name="noLPManual" value="">
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="clearfix">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <button type="submit" class="btn btn-success btn-square" onclick="btnYakin();" id="btnYakin">CHECK OUT</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#ketKeluar').change(function() {
            var ket = $('#ketKeluar').val();
            if (ket == '4') {
                $(".ket_meninggal").show();
            } else {
                $(".ket_meninggal").hide();
            }
        });
    });

    function btnYakin() {
        idHistory = $("#idHisto").val();
        $("#modal_checkout").modal('hide');
        check_out_yang_asli(idHistory);
    }

    function check_out_yang_asli(id_history) {
        keterangan = $("#ketKeluar").val();
        tglPulang = $("#tglPulang").val();
        noSuratMeninggal = $("#noSuratMeninggal").val();
        tglMeninggal = $("#tglMeninggal").val();
        noLPManual = $("#noLPManual").val();
        swal({
            title: "Apakah kamu yakin?",
            text: "Check-out pasien ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Vclaim_bpjs/update_tgl_pulang",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        noSep: id_history,
                        statusPulang: keterangan,
                        noSuratMeninggal: noSuratMeninggal,
                        tglMeninggal: tglMeninggal,
                        tglPulang: tglPulang,
                        noLPManual: noLPManual,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Pasien Berhasil check out",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#datable').DataTable().ajax.reload();
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

        });
        return false;
    }

    function check_out(id_history) {
        $("#idHisto").val(id_history);
        $("#modal_checkout").modal('show');

        // $.ajax({
        // 	url: "<?= base_url() . 'Vclaim_bpjs/cari_sep' ?>",
        // 	data: {
        // 		sep: id_history,
        // 	},
        // 	type: 'POST',
        // 	dataType: 'json',
        // 	success: function(data) {
        // 		if (data.status == 'success') {
        // 			$("#noLPManual").val(data.);

        // 		}

        // 	}
        // });
    }
=======
<!-- CHECKOUT -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <div class="modal fade" id="modal_checkout" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display:none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">
                                CHECKOUT PASIEN </span>
                            </h6>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div style="margin-left:1-em" class="form-body mt-20">
                            <form action="" id="formCheckout">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">NO SEP</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control " placeholder="NO SEP" id="idHisto" name="idHisto" >
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">TANGGAL PULANG</label>
                                            <div class="col-md-9 has-success">
                                                <input type="date" class="form-control " placeholder="TANGGAL" id="tglPulang" name="tglPulang" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                        echo date("Y-m-d"); ?>">
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="control-label col-md-3">KETERANGAN</label>
                                        <div class="col-md-9 has-success">
                                            <select name="ketKeluar" class='form-control select2' id="ketKeluar">
                                                <option value="1">Atas Persetujuan Dokter</option>
                                                <option value="3">Atas Permintaan Sendiri</option>
                                                <option value="4">Meninggal</option>
                                                <option value="5">Lain-lain</option>
                                            </select>
                                            <span class="help-block"></span>

                                        </div>
                                    </div>
                                    <div class="ket_meninggal" style="display: none;">
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">NO SURAT MENINGGAL</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="text" class="form-control " placeholder="No Surat Meninggal" id="noSuratMeninggal" name="noSuratMeninggal" value="">
                                                    <span class="help-block"></span>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">TANGGAL MENINGGAL</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="date" class="form-control " placeholder="TANGGAL MENINGGAL" id="tglMeninggal" name="tglMeninggal" value="">
                                                    <span class="help-block"></span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">NO LP MANUAL</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control " placeholder="No LP Manual" id="noLPManual" name="noLPManual" value="">
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="clearfix">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <button type="submit" class="btn btn-success btn-square" onclick="btnYakin();" id="btnYakin">CHECK OUT</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#ketKeluar').change(function() {
            var ket = $('#ketKeluar').val();
            if (ket == '4') {
                $(".ket_meninggal").show();
            } else {
                $(".ket_meninggal").hide();
            }
        });
    });

    function btnYakin() {
        idHistory = $("#idHisto").val();
        $("#modal_checkout").modal('hide');
        check_out_yang_asli(idHistory);
    }

    function check_out_yang_asli(id_history) {
        keterangan = $("#ketKeluar").val();
        tglPulang = $("#tglPulang").val();
        noSuratMeninggal = $("#noSuratMeninggal").val();
        tglMeninggal = $("#tglMeninggal").val();
        noLPManual = $("#noLPManual").val();
        swal({
            title: "Apakah kamu yakin?",
            text: "Check-out pasien ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Vclaim_bpjs/update_tgl_pulang",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        noSep: id_history,
                        statusPulang: keterangan,
                        noSuratMeninggal: noSuratMeninggal,
                        tglMeninggal: tglMeninggal,
                        tglPulang: tglPulang,
                        noLPManual: noLPManual,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Pasien Berhasil check out",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#datable').DataTable().ajax.reload();
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

        });
        return false;
    }

    function check_out(id_history) {
        $("#idHisto").val(id_history);
        $("#modal_checkout").modal('show');

        // $.ajax({
        // 	url: "<?= base_url() . 'Vclaim_bpjs/cari_sep' ?>",
        // 	data: {
        // 		sep: id_history,
        // 	},
        // 	type: 'POST',
        // 	dataType: 'json',
        // 	success: function(data) {
        // 		if (data.status == 'success') {
        // 			$("#noLPManual").val(data.);

        // 		}

        // 	}
        // });
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>