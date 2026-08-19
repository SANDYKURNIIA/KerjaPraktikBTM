<div class="penyakit_dalam">
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
                    <h5>PEMERIKSAAN BAGIAN PENYAKIT DALAM</h5>
                </strong></label></center>

        <div class="clearfix">&nbsp;</div>
        <div class="col-md-12 " style="margin-top:30px;">
            <div class="form-group ">
                <label class="control-label col-md-3">1. ANAMNESIS</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea style="text-align: justify; padding: 5px; border: 3px solid #999999" class="form-control" rows="5" cols="90" id="anamnesis" name="anamnesis" value=0><?php echo empty($data_penyakit['anamnesis']) ? '' : $data_penyakit['anamnesis']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>



        <div class="col-md-12" style="margin-top:20px">
            <div class="form-group ">
                <label class="control-label col-md-3">2. PEMERIKSAAN
                    FISIK</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea style="text-align: justify; padding: 5px; border: 3px solid #999999" class="form-control" rows="5" cols="90" id="per_fisik" name="per_fisik"><?php echo empty($data_penyakit['per_fisik']) ? '' : $data_penyakit['per_fisik']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top:20px">
            <div class="form-group ">
                <label class="control-label col-md-3">3. PENUNJANG</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="penunjangD" name="penunjangD"><?php echo empty($data_penyakit['penunjang']) ? '' : $data_penyakit['penunjang']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12" style="margin-top:50px">
        <div class="form-group ">
            <label class="control-label col-md-3"><strong>KESAN</strong></label>
            <label class="control-label col-md-1">:</label>
            <div class="col-md-6 has-succes">
                <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="kesan" name="kesan" value="0"><?php echo empty($data_penyakit['kesan']) ? '' : $data_penyakit['kesan']; ?></textarea>
                <span class="help-block"></span>
            </div>
        </div>
    </div>
    <div class="col-md-12" style="margin-top:20px">
        <div class="form-group ">
            <label class="control-label col-md-3"><strong>SARAN</strong></label>
            <label class="control-label col-md-1">:</label>
            <div class="col-md-6 has-succes">
                <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="saran" name="saran" value="0"><?php echo empty($data_penyakit['saran']) ? '' : $data_penyakit['saran']; ?></textarea>
                <span class="help-block"></span>
            </div>
        </div>
    </div>


    <div class="col-md-8">
        <div class="form-group pull-right">
            <button onclick="insertDataPenyakitDalam()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">Cetak</span>
            </button>
        </div>
    </div>
</div>
<script>
      function insertDataPenyakitDalam() {
        id_mcu = $('#id_mcu_form').val();
        anamnesis = $('#anamnesis').val();
        per_fisik = $('#per_fisik').val();
        penunjang = $('#penunjangD').val();
        kesan = $('#kesan').val();
        saran = $('#saran').val();
        tgl_periksad = $('#tgl_periksad').val();

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Surat_mcu/cetak_penyakit_dalam",
                method: "POST",
                dataType: 'html',
                data: {
                    id_mcu: id_mcu,
                    anamnesis: anamnesis,
                    per_fisik: per_fisik,
                    penunjang: penunjang,
                    kesan: kesan,
                    saran: saran,
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
</script>