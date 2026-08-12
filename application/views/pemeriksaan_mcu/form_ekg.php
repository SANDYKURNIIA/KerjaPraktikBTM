<<<<<<< HEAD
<div class="form_ekg">

    <div class="row">
        <div class="col-md-12">
            <div class="form-group ">
                <label class="control-label col-md-3">TANGGAL PERIKSA</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-success">
                    <input type="date" class="form-control" id="tgl_periksaE" name="tgl_periksaE" value="<?= date('Y-m-d'); ?>">
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
        <center><label class="control-label" style="margin-top:30px;"><strong>
                    <h5>PEMERIKSAAN EKG</h5>
                </strong></label></center>

        <div class="clearfix">&nbsp;</div>
        <div class="col-md-12 " style="margin-top:30px;">
            <div class="form-group ">
                <label class="control-label col-md-3">1. RITHME</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea solid=#00ff00 class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="rithme" name="rithme" value="0"><?php echo empty($data_EKG['rithme']) ? '' : $data_EKG['rithme']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>



        <div class="col-md-12" style="margin-top:20px">
            <div class="form-group ">
                <label class="control-label col-md-3">Q.PATHOLOGIS</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="pathologis" name="pathologis" value="0"><?php echo empty($data_EKG['pathologis']) ? '' : $data_EKG['pathologis']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top:20px">
            <div class="form-group ">
                <label class="control-label col-md-3">ST.DEPRESI</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="depresi" name="depresi" value="0"><?php echo empty($data_EKG['depresi']) ? '' : $data_EKG['depresi']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top:20px">
            <div class="form-group ">
                <label class="control-label col-md-3">T.INVERTED</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="inverted" name="inverted" value="0"><?php echo empty($data_EKG['inverted']) ? '' : $data_EKG['inverted']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>

        <div class="col-md-12" style="margin-top:20px">
            <div class="form-group ">
                <label class="control-label col-md-3">DIAGNOSA EKG</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="diagnosa" name="diagnosa" value="0"><?php echo empty($data_EKG['diagnosa']) ? '' : $data_EKG['diagnosa']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top:20px">
            <div class="form-group ">
                <label class="control-label col-md-3"><strong>SARAN</strong></label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="saranE" name="saranE" value="0"><?php echo empty($data_EKG['saran']) ? '' : $data_EKG['saran']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group pull-right">
                <button onclick="insertDataEkg()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">Cetak</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function insertDataEkg() {
        id_mcu = $('#id_mcu_form').val();
        rithme = $('#rithme').val();
        pathologis = $('#pathologis').val();
        depresi = $('#depresi').val();
        inverted = $('#inverted').val();
        diagnosa = $('#diagnosa').val();
        saran = $('#saranE').val();
        tgl_periksa = $('#tgl_periksaE').val();

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Surat_mcu/cetak_periksa_ekg",
                method: "POST",
                dataType: 'html',
                data: {
                    id_mcu: id_mcu,
                    rithme: rithme,
                    pathologis: pathologis,
                    depresi: depresi,
                    inverted: inverted,
                    diagnosa: diagnosa,
                    saran: saran,
                    tgl_periksa: tgl_periksa,
                },
                success: function(data) {
                    // if (data.status == "success") {
                    //     swal({
                    //         title: "good job!",
                    //         type: "success",
                    //         text: "Data Medical Check Up Pasien ini telah disimpan",
                    //         confirmButtonColor: "#3cb878",

                    //     });

                    //     $('#datable').DataTable().ajax.reload();
                    //     window.location.href = 'javascript:history.go(-1)';
                    $("#div_result").html(data);
                    var divContents = document.getElementById("div_result").innerHTML;
                    // var a = window.open('', '', 'height=500, width=500');
                    var a = window.open();
                    a.document.write('<html>');
                    // a.document.write('<head><style type="text/css"> @page {size: A5;margin: 0;} body { margin: 0; } </style> </head>');
                    a.document.write('<body >');
                    a.document.write(divContents);
                    a.document.write('</body>');
                    a.document.write('</html>');
                    setTimeout(function() { // wait until all resources loaded 
                        a.document.close(); // necessary for IE >= 10
                        a.focus(); // necessary for IE >= 10
                        a.print(); // change window to winPrint
                        a.close(); // change window to winPrint
                    }, 500);
                    // } else {
                    //     swal({
                    //         title: "Gagal!",
                    //         type: "warning",
                    //         text: data.status,
                    //         confirmButtonColor: "#3cb878",
                    //     });
                    // }
                }
            });
        });

        return false;
    }
=======
<div class="form_ekg">

    <div class="row">
        <div class="col-md-12">
            <div class="form-group ">
                <label class="control-label col-md-3">TANGGAL PERIKSA</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-success">
                    <input type="date" class="form-control" id="tgl_periksaE" name="tgl_periksaE" value="<?= date('Y-m-d'); ?>">
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
        <center><label class="control-label" style="margin-top:30px;"><strong>
                    <h5>PEMERIKSAAN EKG</h5>
                </strong></label></center>

        <div class="clearfix">&nbsp;</div>
        <div class="col-md-12 " style="margin-top:30px;">
            <div class="form-group ">
                <label class="control-label col-md-3">1. RITHME</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea solid=#00ff00 class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="rithme" name="rithme" value="0"><?php echo empty($data_EKG['rithme']) ? '' : $data_EKG['rithme']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>



        <div class="col-md-12" style="margin-top:20px">
            <div class="form-group ">
                <label class="control-label col-md-3">Q.PATHOLOGIS</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="pathologis" name="pathologis" value="0"><?php echo empty($data_EKG['pathologis']) ? '' : $data_EKG['pathologis']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top:20px">
            <div class="form-group ">
                <label class="control-label col-md-3">ST.DEPRESI</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="depresi" name="depresi" value="0"><?php echo empty($data_EKG['depresi']) ? '' : $data_EKG['depresi']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top:20px">
            <div class="form-group ">
                <label class="control-label col-md-3">T.INVERTED</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="inverted" name="inverted" value="0"><?php echo empty($data_EKG['inverted']) ? '' : $data_EKG['inverted']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>

        <div class="col-md-12" style="margin-top:20px">
            <div class="form-group ">
                <label class="control-label col-md-3">DIAGNOSA EKG</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="diagnosa" name="diagnosa" value="0"><?php echo empty($data_EKG['diagnosa']) ? '' : $data_EKG['diagnosa']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top:20px">
            <div class="form-group ">
                <label class="control-label col-md-3"><strong>SARAN</strong></label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="saranE" name="saranE" value="0"><?php echo empty($data_EKG['saran']) ? '' : $data_EKG['saran']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group pull-right">
                <button onclick="insertDataEkg()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">Cetak</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function insertDataEkg() {
        id_mcu = $('#id_mcu_form').val();
        rithme = $('#rithme').val();
        pathologis = $('#pathologis').val();
        depresi = $('#depresi').val();
        inverted = $('#inverted').val();
        diagnosa = $('#diagnosa').val();
        saran = $('#saranE').val();
        tgl_periksa = $('#tgl_periksaE').val();

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Surat_mcu/cetak_periksa_ekg",
                method: "POST",
                dataType: 'html',
                data: {
                    id_mcu: id_mcu,
                    rithme: rithme,
                    pathologis: pathologis,
                    depresi: depresi,
                    inverted: inverted,
                    diagnosa: diagnosa,
                    saran: saran,
                    tgl_periksa: tgl_periksa,
                },
                success: function(data) {
                    // if (data.status == "success") {
                    //     swal({
                    //         title: "good job!",
                    //         type: "success",
                    //         text: "Data Medical Check Up Pasien ini telah disimpan",
                    //         confirmButtonColor: "#3cb878",

                    //     });

                    //     $('#datable').DataTable().ajax.reload();
                    //     window.location.href = 'javascript:history.go(-1)';
                    $("#div_result").html(data);
                    var divContents = document.getElementById("div_result").innerHTML;
                    // var a = window.open('', '', 'height=500, width=500');
                    var a = window.open();
                    a.document.write('<html>');
                    // a.document.write('<head><style type="text/css"> @page {size: A5;margin: 0;} body { margin: 0; } </style> </head>');
                    a.document.write('<body >');
                    a.document.write(divContents);
                    a.document.write('</body>');
                    a.document.write('</html>');
                    setTimeout(function() { // wait until all resources loaded 
                        a.document.close(); // necessary for IE >= 10
                        a.focus(); // necessary for IE >= 10
                        a.print(); // change window to winPrint
                        a.close(); // change window to winPrint
                    }, 500);
                    // } else {
                    //     swal({
                    //         title: "Gagal!",
                    //         type: "warning",
                    //         text: data.status,
                    //         confirmButtonColor: "#3cb878",
                    //     });
                    // }
                }
            });
        });

        return false;
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>