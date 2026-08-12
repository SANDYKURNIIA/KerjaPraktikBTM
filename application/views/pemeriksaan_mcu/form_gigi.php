<<<<<<< HEAD
<div class="form_gigi">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group ">
                <label class="control-label col-md-3">TANGGAL PERIKSA</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-success">
                    <input type="date" class="form-control" id="tgl_periksaG" name="tgl_periksaG" value="<?= date('Y-m-d'); ?>">
                    <span class="help-block"></span>
                </div>
            </div>
        </div>

        <center><label class="control-label" style="margin-top:50px;"><strong>
                    <h5>PEMERIKSAAN GIGI</h5>
                </strong></label></center>

        <div class="clearfix">&nbsp;</div>
        <div class="col-md-12" style="margin-top:30px;">
            <div class="form-group">
                <label class="control-label col-md-3">1. Pemeriksaan Kebersihan</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="radio" name="pemeriksaan_kebersihan" id="rad1" value="Baik" class="rad1" /> Baik
                        </div>
                        <div class="col-md-4">
                            <input type="radio" name="pemeriksaan_kebersihan" id="rad2" value="Sedang" class="rad2" /> Sedang
                        </div>
                        <div class="col-md-4">
                            <input type="radio" name="pemeriksaan_kebersihan" id="rad5" value="Buruk" class="rad5" /> Buruk
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="col-md-12" style="margin-top:20px">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">2. Caries</label>
                                                <label class="control-label col-md-1">( O )</label>
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="margin-top:20px">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">3. Missing</label>
                                                <label class="control-label col-md-1">( X )</label>
                                            </div>
                                        </div> -->

        <div class="col-md-12" style="margin-top:50px">
            <label class="control-label col-md-3">2. Caries ( O ) and Missing ( X )</label>
            <br />
            <div class="row">
                <button data-toggle="modal" data-target="#modal_gambar" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">GAMBAR GIGI</span></button>
                <button class="btn btn-default" id="sig-clearBtn">CLEAR</button>
                <canvas id="can" width="800" height="300" style="display: none;"></canvas>
                <div class="form-group">
                    <div class="modal fade" id="modal_gambar" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newPeternakModallabel">GIGI</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row" style="margin-left: 30px;">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <canvas id="can1" width="800" height="300">
                                                </canvas>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-primary" id="sig-submitBtn1">Selesai</button>
                                                <button class="btn btn-default" id="sig-clearBtn1">Clear</button>
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


        <div class="col-md-12" style="margin-top:50px">
            <div class="form-group ">
                <label class="control-label col-md-3">3. Lain-lain</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="lain_lain_gigi" name="lain_lain_gigi" value="0"><?php echo empty($data_lain['lain_lain']) ? '' : $data_lain['lain_lain']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top:20px">
            <div class="form-group ">
                <label class="control-label col-md-3"><strong>KESIMPULAN</strong></label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="kesimpulan_gigi" name="kesimpulan_gigi" value="0"><?php echo empty($data_kesimpulan['kesimpulan']) ? '' : $data_kesimpulan['kesimpulan']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group pull-right">
                <button onclick="insertDataPeriksaGigi()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">Cetak</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function insertDataPeriksaGigi() {
        id_mcu = $('#id_mcu_form').val();
        pemeriksaan_kebersihan = $("[name='pemeriksaan_kebersihan']:checked").val();
        gambar_gigi = $('#gambar_gigi').val();
        lain_lain_gigi = $('#lain_lain_gigi').val();
        kesimpulan_gigi = $('#kesimpulan_gigi').val();
        tgl_periksaG = $('#tgl_periksaG').val();
        canvas = document.getElementById('can');
        gambar_gigi = canvas.toDataURL("image/png");

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Surat_mcu/cetak_bagian_gigi",
                method: "POST",
                dataType: 'html',
                data: {
                    id_mcu: id_mcu,
                    pemeriksaan_kebersihan: pemeriksaan_kebersihan,
                    gambar_gigi: gambar_gigi,
                    lain_lain_gigi: lain_lain_gigi,
                    kesimpulan_gigi: kesimpulan_gigi,
                    tgl_periksaG: tgl_periksaG,
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
<div class="form_gigi">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group ">
                <label class="control-label col-md-3">TANGGAL PERIKSA</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-success">
                    <input type="date" class="form-control" id="tgl_periksaG" name="tgl_periksaG" value="<?= date('Y-m-d'); ?>">
                    <span class="help-block"></span>
                </div>
            </div>
        </div>

        <center><label class="control-label" style="margin-top:50px;"><strong>
                    <h5>PEMERIKSAAN GIGI</h5>
                </strong></label></center>

        <div class="clearfix">&nbsp;</div>
        <div class="col-md-12" style="margin-top:30px;">
            <div class="form-group">
                <label class="control-label col-md-3">1. Pemeriksaan Kebersihan</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="radio" name="pemeriksaan_kebersihan" id="rad1" value="Baik" class="rad1" /> Baik
                        </div>
                        <div class="col-md-4">
                            <input type="radio" name="pemeriksaan_kebersihan" id="rad2" value="Sedang" class="rad2" /> Sedang
                        </div>
                        <div class="col-md-4">
                            <input type="radio" name="pemeriksaan_kebersihan" id="rad5" value="Buruk" class="rad5" /> Buruk
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="col-md-12" style="margin-top:20px">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">2. Caries</label>
                                                <label class="control-label col-md-1">( O )</label>
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="margin-top:20px">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">3. Missing</label>
                                                <label class="control-label col-md-1">( X )</label>
                                            </div>
                                        </div> -->

        <div class="col-md-12" style="margin-top:50px">
            <label class="control-label col-md-3">2. Caries ( O ) and Missing ( X )</label>
            <br />
            <div class="row">
                <button data-toggle="modal" data-target="#modal_gambar" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">GAMBAR GIGI</span></button>
                <button class="btn btn-default" id="sig-clearBtn">CLEAR</button>
                <canvas id="can" width="800" height="300" style="display: none;"></canvas>
                <div class="form-group">
                    <div class="modal fade" id="modal_gambar" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newPeternakModallabel">GIGI</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row" style="margin-left: 30px;">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <canvas id="can1" width="800" height="300">
                                                </canvas>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-primary" id="sig-submitBtn1">Selesai</button>
                                                <button class="btn btn-default" id="sig-clearBtn1">Clear</button>
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


        <div class="col-md-12" style="margin-top:50px">
            <div class="form-group ">
                <label class="control-label col-md-3">3. Lain-lain</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="lain_lain_gigi" name="lain_lain_gigi" value="0"><?php echo empty($data_lain['lain_lain']) ? '' : $data_lain['lain_lain']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top:20px">
            <div class="form-group ">
                <label class="control-label col-md-3"><strong>KESIMPULAN</strong></label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="kesimpulan_gigi" name="kesimpulan_gigi" value="0"><?php echo empty($data_kesimpulan['kesimpulan']) ? '' : $data_kesimpulan['kesimpulan']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group pull-right">
                <button onclick="insertDataPeriksaGigi()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">Cetak</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function insertDataPeriksaGigi() {
        id_mcu = $('#id_mcu_form').val();
        pemeriksaan_kebersihan = $("[name='pemeriksaan_kebersihan']:checked").val();
        gambar_gigi = $('#gambar_gigi').val();
        lain_lain_gigi = $('#lain_lain_gigi').val();
        kesimpulan_gigi = $('#kesimpulan_gigi').val();
        tgl_periksaG = $('#tgl_periksaG').val();
        canvas = document.getElementById('can');
        gambar_gigi = canvas.toDataURL("image/png");

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Surat_mcu/cetak_bagian_gigi",
                method: "POST",
                dataType: 'html',
                data: {
                    id_mcu: id_mcu,
                    pemeriksaan_kebersihan: pemeriksaan_kebersihan,
                    gambar_gigi: gambar_gigi,
                    lain_lain_gigi: lain_lain_gigi,
                    kesimpulan_gigi: kesimpulan_gigi,
                    tgl_periksaG: tgl_periksaG,
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