<<<<<<< HEAD
<div class="spesialis_bedah">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group ">
                <label class="control-label col-md-3">TANGGAL PERIKSA</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-success">
                    <input type="date" class="form-control" id="tgl_periksad" name="tgl_periksad" value="<?= date('Y-m-d'); ?>">
                    <span class="help-block"></span>
                </div>
            </div>
        </div>

        <center><label class="control-label" style="margin-top:30px;"><strong>
                    <h5>PEMERIKSAAN DOKTER SPESIALIS BEDAH</h5>
                </strong></label></center>
        <div class="col-md-12">
            <div class="form-group ">
                <label class="control-label col-md-4">PEMERIKSAAN RECTAL
                    TOECHER</label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group ">
                <hr>
                <label class="control-label col-md-4">Dengan Hasil:</label>
                <label class="control-label col-md-2">:</label>
                <div class="clearfix">&nbsp;</div>
                <div class="col-md-6 has-succes">
                    <textarea style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="hasil_rec" name="hasil_rec"><?php echo empty($data_doktersb['hasil_rec']) ? '' : $data_doktersb['hasil_rec']; ?></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group pull-right">
                    <button onclick="insertDataDokterSpesialis()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">Cetak</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function insertDataDokterSpesialis() {
        id_mcu = $('#id_mcu_form').val();
        hasil_rec = $('#hasil_rec').val();
        tgl_periksad = $('#tgl_periksad').val();

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Surat_mcu/cetak_dokter_spesialis",
                method: "POST",
                dataType: 'html',
                data: {
                    id_mcu: id_mcu,
                    hasil_rec: hasil_rec,
                    tgl_periksad: tgl_periksad,
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
<div class="spesialis_bedah">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group ">
                <label class="control-label col-md-3">TANGGAL PERIKSA</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-success">
                    <input type="date" class="form-control" id="tgl_periksad" name="tgl_periksad" value="<?= date('Y-m-d'); ?>">
                    <span class="help-block"></span>
                </div>
            </div>
        </div>

        <center><label class="control-label" style="margin-top:30px;"><strong>
                    <h5>PEMERIKSAAN DOKTER SPESIALIS BEDAH</h5>
                </strong></label></center>
        <div class="col-md-12">
            <div class="form-group ">
                <label class="control-label col-md-4">PEMERIKSAAN RECTAL
                    TOECHER</label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group ">
                <hr>
                <label class="control-label col-md-4">Dengan Hasil:</label>
                <label class="control-label col-md-2">:</label>
                <div class="clearfix">&nbsp;</div>
                <div class="col-md-6 has-succes">
                    <textarea style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="hasil_rec" name="hasil_rec"><?php echo empty($data_doktersb['hasil_rec']) ? '' : $data_doktersb['hasil_rec']; ?></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group pull-right">
                    <button onclick="insertDataDokterSpesialis()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">Cetak</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function insertDataDokterSpesialis() {
        id_mcu = $('#id_mcu_form').val();
        hasil_rec = $('#hasil_rec').val();
        tgl_periksad = $('#tgl_periksad').val();

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Surat_mcu/cetak_dokter_spesialis",
                method: "POST",
                dataType: 'html',
                data: {
                    id_mcu: id_mcu,
                    hasil_rec: hasil_rec,
                    tgl_periksad: tgl_periksad,
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