<div class="form_obgyne">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group ">
                <label class="control-label col-md-3">TANGGAL PERIKSA</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-success">
                    <input type="date" class="form-control" id="tgl_periksak" name="tgl_periksak" value="<?= date('Y-m-d'); ?>">
                    <span class="help-block"></span>
                </div>
            </div>
        </div>

        <div class="clearfix">&nbsp;</div>
        <div class="col-md-12 " style="margin-top:30px;">
            <div class="form-group ">
                <label class="control-label col-md-3">1. ANAMNESA</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea solid=#00ff00 class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="anamnesa" name="anamnesa" value="0"><?php echo empty($data_kandungan['anamnesa']) ? '' : $data_kandungan['anamnesa']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>



        <div class="col-md-12" style="margin-top:20px">
            <div class="form-group ">
                <label class="control-label col-md-3">2. PEMERIKSAAN
                    GYNECOLOGI</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="per_gyne" name="per_gyne" value="0"><?php echo empty($data_kandungan['per_gyne']) ? '' : $data_kandungan['per_gyne']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top:20px">
            <div class="form-group ">
                <label class="control-label col-md-3">3. PENUNJANG</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="penunjank" name="penunjank" value="0"><?php echo empty($data_kandungan['penunjang']) ? '' : $data_kandungan['penunjang']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>

        <div class="col-md-12" style="margin-top:50px">
            <div class="form-group ">
                <label class="control-label col-md-3"><strong>KESAN</strong></label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="kesanD" name="kesanD" value="0"><?php echo empty($data_kandungan['kesan']) ? '' : $data_kandungan['kesan']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top:20px">
            <div class="form-group ">
                <label class="control-label col-md-3"><strong>SARAN</strong></label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="saranD" name="saranD" value="0"><?php echo empty($data_kandungan['saran']) ? '' : $data_kandungan['saran']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group pull-right">
                <button onclick="insertDataPeriksaKandungan()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">Cetak</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
       function insertDataPeriksaKandungan() {
        id_mcu = $('#id_mcu_form').val();
        anamnesa = $('#anamnesa').val();
        per_gyne = $('#per_gyne').val();
        penunjang = $('#penunjank').val();
        kesan = $('#kesanD').val();
        saran = $('#saranD').val();
        tgl_periksa = $('#tgl_periksak').val();

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Surat_mcu/cetak_periksa_kandungan",
                method: "POST",
                dataType: 'html',
                data: {
                    id_mcu: id_mcu,
                    anamnesa: anamnesa,
                    per_gyne: per_gyne,
                    penunjang: penunjang,
                    kesan: kesan,
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
                    // a.document.write('<head><style type="text/css"> @page {size: A4;margin: 0;} body { margin: 0; } </style> </head>');
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

</script>