<div class="form_spirometri">
    <div class="row">
        <input type="hidden" class="form-control" id="tgl_sekarang" name="tgl_sekarang" value="<?= date('Y-m-d'); ?>">
        <div class="col-md-12">
            <div class="form-group ">
                <label class="control-label col-md-3">PIHAK</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-success">
                    <input type="text" class="form-control" id="inPihak" name="inPihak" value="<?php echo empty($data_spirometri['pihak']) ? '' : $data_spirometri['pihak']; ?>">
                    <span class="help-block"></span>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group ">
                <label class="control-label col-md-3">TANGGAL PERIKSA</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-success">
                    <input type="date" class="form-control" id="tgl_periksaS" name="tgl_periksaS" value="<?php echo empty($data_spirometri['tgl_periksa']) ? '' : $data_spirometri['tgl_periksa']; ?>">
                    <span class="help-block"></span>
                </div>
            </div>
        </div>

        <center><label class="control-label" style="margin-top:30px;"><strong>
                    <h5>PEMERIKSAAN SPIROMETRI</h5>
                </strong></label></center>

        <div class="clearfix">&nbsp;</div>
        <div class="col-md-12 " style="margin-top:30px;">
            <div class="form-group ">
                <label class="control-label col-md-3">KESIMPULAN</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea style="text-align: justify; padding: 5px; border: 3px solid #999999" class="form-control" rows="7" cols="90" id="kesimpulan" name="kesimpulan" value=0><?php echo empty($data_spirometri['kesimpulan']) ? '' : $data_spirometri['kesimpulan']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top:20px">
            <div class="form-group ">
                <label class="control-label col-md-3">SARAN</label>
                <label class="control-label col-md-1">:</label>
                <div class="col-md-6 has-succes">
                    <textarea style="text-align: justify; padding: 5px; border: 3px solid #999999" class="form-control" rows="7" cols="90" id="saranS" name="saranS"><?php echo empty($data_spirometri['saran']) ? '' : $data_spirometri['saran']; ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group pull-right">
            <button onclick="insertDataSpirometri()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">Cetak</span>
            </button>
        </div>
    </div>
</div>
<script>
    function insertDataSpirometri() {
        id_mcu = $('#id_mcu_form').val();
        pihak = $('#inPihak').val();
        kesimpulan = $('#kesimpulan').val();
        saran = $('#saranS').val();
        tgl_periksa = $('#tgl_periksaS').val();
        tgl_sekarang = $('#tgl_sekarang').val();

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Surat_mcu/cetak_bagian_spirometri",
                method: "POST",
                dataType: 'html',
                data: {
                    id_mcu: id_mcu,
                    pihak: pihak,
                    kesimpulan: kesimpulan,
                    saran: saran,
                    tgl_periksa: tgl_periksa,
                    tgl_sekarang: tgl_sekarang,
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