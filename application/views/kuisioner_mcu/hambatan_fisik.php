<div id="hambatan_fisik">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h1 class="panel-title txt-dark"><strong>SRQ-29 (Suspect)</strong></h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="form-wrap">
                                <span class="help-block"></span>
                                <div class="form-body">
                                    <table class="table table-bordered">
                                        <thead class="btn-success text-white">
                                            <tr>
                                                <th colspan="6" class="text-center bg-success">SRQ-29 (Suspect)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Membawa dan mengangkat belanjaan?</td>
                                                <td class="text-center"><input type="radio" name="terhambat_belanjaan" value="GME"> GME</td>
                                                <td class="text-center"><input type="radio" name="terhambat_belanjaan" value="PTSD"> PTSD</td>
                                                <td class="text-center"><input type="radio" name="terhambat_belanjaan" value="NAPZA"> NAPZA</td>
                                                <td class="text-center"><input type="radio" name="terhambat_belanjaan" value="Normal"> Normal</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                    <button class="btn btn-success" onclick="insertData()"><i class="fa fa-file"></i> Simpan</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    function insertData() {


        swal({
            title: "Apakah kamu yakin ingin !",
            text: "Menyimpan Data  ini ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>mcu/simpan_mcu",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        table:  '',
                        id_mcu:  $('#id_mcu').val(),
                        terhambat_belanjaan: $('input[name="terhambat_belanjaan"]:checked').val(),
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Pasien ini telah disimpan",
                                confirmButtonColor: "#3cb878",

                            });
                            $('#datable').DataTable().ajax.reload();
                            window.location.href = 'javascript:history.go(-1)';
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
</script>