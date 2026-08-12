<<<<<<< HEAD
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">PERAWAT HOME CARE</span></h6>
        </div>



        <div class="clearfix"></div>
    </div>

    <div align="right">
        <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target=".modal-pendaftaranakun"><i class="icon-plus"></i><span class="btn-text">TAMBAH PERAWAT</span>
        </button>
    </div>

    <div align="right" class="col-md-12 has-error">
        <label for="tanggal_masuk1" class="col-sm-2 control-label">
            <p>&nbsp;</p>
        </label>
    </div>

    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <!-- <form id="form-filter" class="form-horizontal"> -->
            <div class="form-group">
                <div class="row mt-30">
                    <div class="col-md-12">

                    </div>
                </div>

                <div class="table-wrap">
                    <div class="table-responsive">
                        <table class="table table-hover display  pb-30" id="datable">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>EDIT</th>
                                    <th>HAPUS</th>
                                    <th>NAMA</th>
                                    <th>JENIS LAYANAN</th>
                                </tr>
                            </thead>
                            <tfoot class="bg-success">
                                <th>NO</th>
                                <th>EDIT</th>
                                <th>HAPUS</th>
                                <th>NAMA</th>
                                <th>JENIS LAYANAN</th>
                            </tfoot>
                            <tbody style="color: black">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--data table-->

<!--modal yang akan dipakai-->

<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->

        <div class="modal fade modal-pendaftaranakun" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>TINDAKAN MCU</p>
                        <p><i class="icon-people mr-10"></i>INPUT TINDAKAN</p>

                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->

                        <div class="form-body mt-20">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NAMA PERAWAT</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="NAMA PERAWAT" id="inNama" name="nama"></input>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">JENIS LAYANAN</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="JENIS LAYANAN" id="inJenis" name="biaya"></input>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer mb-10 mr-15">

                            <button onclick="insert_perawat()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">Submit</span></button>

                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
        <div class="modal fade bs-example-modal-lg" id="modal_edit_mcu" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT TINDAKAN MCU
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-wrap">
                            <!-- /formbody -->
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">NAMA PERAWAT</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="NAMA PERAWAT" id="upNama" name="nama"></input>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">JENIS LAYANAN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="JENIS LAYANAN" id="upJenis" name="biaya"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6 mt-10">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3 mt-10">STATUS</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" autocomplete="off" placeholder="STATUS" id="upStatus">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div> -->

                                </div>

                            </div>
                            <div class="form-actions mt-10 mb-20">
                                <div class="form-actions mt-10">
                                    <div class="row">
                                        <!-- <div class="col-md-6"> </div> -->
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <input type="hidden" class="form-control " autocomplete="off" id="upId">
                                                    <button type="submit" class="btn btn-success mr-10" onclick="update_perawat()">SIMPAN</button>
                                                    <span></span>
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
        </div>
    </div>
</div>
<!--akhir modal yang akan dipakai-->

<!--ajax-->
<script type="text/javascript">
    function insert_perawat() {
        nama = $('#inNama').val();
        jenis = $('#inJenis').val();

        $.ajax({
            url: "<?= base_url() . 'Homecare/insert_perawat' ?>",
            method: "POST",
            dataType: 'json',
            cache: true,
            data: {
                nama: nama,
                jenis: jenis,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data "+ nama +" Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#inNama').val('');
                    $('#inJenis').val('');
                    $(".modal-pendaftaranakun").modal('hide');
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
    }

    function edit_perawat(id_list_tindakan_mcu) {
        $.ajax({
            url: "<?php echo base_url() ?>Homecare/getDataPerawat",
            data: {
                id_list_tindakan_mcu: id_list_tindakan_mcu,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    $("#upId").val(data.id_perawat);
                    $("#upNama").val(data.nama_perawat);
                    $("#upJenis").val(data.jenis_layanan);
                    $("#modal_edit_mcu").modal('show');
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }


    function update_perawat() {
        id = $("#upId").val();
        nama = ($("#upNama").val());
        jenis = ($("#upJenis").val());

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Homecare/edit_perawat",
            dataType: 'json',
            data: {
                id: id,
                nama: nama,
                jenis: jenis,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil diedit",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#upId").val("");
                    $("#upNama").val("");
                    $("#upJenis").val("");

                    $("#modal_edit_mcu").modal('hide');
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
        })
    }

    function hapus(id_logistik) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + id_logistik + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Homecare/hapus_perawat",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_logistik: id_logistik,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            //$("#modalTambahObatFaktur").modal('show');
                            //$('#isiFaktur').DataTable().ajax.reload();
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
</script>

<script type="text/javascript">
    $(document).ready(function() {


        $('#datable').DataTable({
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Pencarian :",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },
            },
            "ajax": '<?php echo base_url('Homecare/tampil_perawat'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    });
</script>



=======
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">PERAWAT HOME CARE</span></h6>
        </div>



        <div class="clearfix"></div>
    </div>

    <div align="right">
        <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target=".modal-pendaftaranakun"><i class="icon-plus"></i><span class="btn-text">TAMBAH PERAWAT</span>
        </button>
    </div>

    <div align="right" class="col-md-12 has-error">
        <label for="tanggal_masuk1" class="col-sm-2 control-label">
            <p>&nbsp;</p>
        </label>
    </div>

    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <!-- <form id="form-filter" class="form-horizontal"> -->
            <div class="form-group">
                <div class="row mt-30">
                    <div class="col-md-12">

                    </div>
                </div>

                <div class="table-wrap">
                    <div class="table-responsive">
                        <table class="table table-hover display  pb-30" id="datable">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>EDIT</th>
                                    <th>HAPUS</th>
                                    <th>NAMA</th>
                                    <th>JENIS LAYANAN</th>
                                </tr>
                            </thead>
                            <tfoot class="bg-success">
                                <th>NO</th>
                                <th>EDIT</th>
                                <th>HAPUS</th>
                                <th>NAMA</th>
                                <th>JENIS LAYANAN</th>
                            </tfoot>
                            <tbody style="color: black">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--data table-->

<!--modal yang akan dipakai-->

<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->

        <div class="modal fade modal-pendaftaranakun" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>TINDAKAN MCU</p>
                        <p><i class="icon-people mr-10"></i>INPUT TINDAKAN</p>

                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->

                        <div class="form-body mt-20">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NAMA PERAWAT</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="NAMA PERAWAT" id="inNama" name="nama"></input>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">JENIS LAYANAN</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="JENIS LAYANAN" id="inJenis" name="biaya"></input>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer mb-10 mr-15">

                            <button onclick="insert_perawat()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">Submit</span></button>

                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
        <div class="modal fade bs-example-modal-lg" id="modal_edit_mcu" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT TINDAKAN MCU
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-wrap">
                            <!-- /formbody -->
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">NAMA PERAWAT</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="NAMA PERAWAT" id="upNama" name="nama"></input>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">JENIS LAYANAN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="JENIS LAYANAN" id="upJenis" name="biaya"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6 mt-10">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3 mt-10">STATUS</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" autocomplete="off" placeholder="STATUS" id="upStatus">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div> -->

                                </div>

                            </div>
                            <div class="form-actions mt-10 mb-20">
                                <div class="form-actions mt-10">
                                    <div class="row">
                                        <!-- <div class="col-md-6"> </div> -->
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <input type="hidden" class="form-control " autocomplete="off" id="upId">
                                                    <button type="submit" class="btn btn-success mr-10" onclick="update_perawat()">SIMPAN</button>
                                                    <span></span>
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
        </div>
    </div>
</div>
<!--akhir modal yang akan dipakai-->

<!--ajax-->
<script type="text/javascript">
    function insert_perawat() {
        nama = $('#inNama').val();
        jenis = $('#inJenis').val();

        $.ajax({
            url: "<?= base_url() . 'Homecare/insert_perawat' ?>",
            method: "POST",
            dataType: 'json',
            cache: true,
            data: {
                nama: nama,
                jenis: jenis,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data "+ nama +" Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#inNama').val('');
                    $('#inJenis').val('');
                    $(".modal-pendaftaranakun").modal('hide');
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
    }

    function edit_perawat(id_list_tindakan_mcu) {
        $.ajax({
            url: "<?php echo base_url() ?>Homecare/getDataPerawat",
            data: {
                id_list_tindakan_mcu: id_list_tindakan_mcu,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    $("#upId").val(data.id_perawat);
                    $("#upNama").val(data.nama_perawat);
                    $("#upJenis").val(data.jenis_layanan);
                    $("#modal_edit_mcu").modal('show');
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }


    function update_perawat() {
        id = $("#upId").val();
        nama = ($("#upNama").val());
        jenis = ($("#upJenis").val());

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Homecare/edit_perawat",
            dataType: 'json',
            data: {
                id: id,
                nama: nama,
                jenis: jenis,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil diedit",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#upId").val("");
                    $("#upNama").val("");
                    $("#upJenis").val("");

                    $("#modal_edit_mcu").modal('hide');
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
        })
    }

    function hapus(id_logistik) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + id_logistik + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Homecare/hapus_perawat",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_logistik: id_logistik,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            //$("#modalTambahObatFaktur").modal('show');
                            //$('#isiFaktur').DataTable().ajax.reload();
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
</script>

<script type="text/javascript">
    $(document).ready(function() {


        $('#datable').DataTable({
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Pencarian :",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },
            },
            "ajax": '<?php echo base_url('Homecare/tampil_perawat'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    });
</script>



>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
<!--end of ajax-->