<<<<<<< HEAD
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">PRODUSEN OBAT</span></h6>
        </div>



        <div class="clearfix"></div>
    </div>

    <div align="right">
        <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target=".modal-pendaftaranakun"><i class="icon-plus"></i><span class="btn-text">TAMBAH PRODUSEN</span>
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

       



                <!-- <div class="form-group">

        </div> -->

            



            <div class="table-wrap">
                <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

                <div class="table-responsive">
                    <table class="table table-hover display  pb-30" id="datable">
                        <thead>
                            <tr class="bg-success">
                                <th>EDIT</th>
                                <th>HAPUS</th>
                                <th>NO</th>
                                <th>NAMA PRODUSEN</th>
                                <th>KOTA</th>
                                <th>NEGARA</th>
                            </tr>
                        </thead>
                        <tfoot class="bg-success">
                        		<th>EDIT</th>
                                <th>HAPUS</th>
                                <th>NO</th>
                                <th>NAMA PRODUSEN</th>
                                <th>KOTA</th>
                                <th>NEGARA</th>
                        </tfoot>
                        <tbody style="color: black">

                            <!--percobaan nampilin data-->



                            <!--end percobaan penampilan data-->

                        </tbody>
                    </table>
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
                        <p>PRODUSEN</p>
                        <p><i class="icon-people mr-10"></i>INPUT PRODUSEN</p>

                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->

                        <div class="form-body mt-20">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NAMA PRODUSEN</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="NAMA PRODUSEN"  id="nama" name="nama" ></input>
                                        </div>
                                    </div>
                                </div>

                                <!-- span -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">KOTA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="KOTA"  id="kota" name="kota" ></input>
                                        </div>
                                    </div>
                                </div>


                                
                                <!--/span-->
                            </div>

                            <p class="mt-15">
                                <!-- /Row -->

                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NEGARA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="NEGARA"  id="negara" name="negara" ></input>
                                        </div>
                                    </div>
                                </div>

                                
                                    


                                    <p class="mt-15">
                                </div>


                                <!-- /Row -->
                        </div>
                        <!-- End -->
                    </div>
                    <div class="modal-footer mb-10 mr-15">

                        <button onclick="insertProdusen()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">Submit</span></button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--akhir modal yang akan dipakai-->

        <div class="modal fade bs-example-modal-lg" id="modal_edit_vendor" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT DATA PRODUSEN
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-wrap">
                        <!-- /formbody -->
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA PRODUSEN</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control " autocomplete="off" placeholder="NAMA DISTRIBUTOR" id="upNama">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3 mt-10">KOTA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" autocomplete="off" placeholder="ALAMAT" id="upKota">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3 mt-10">NEGARA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" autocomplete="off" placeholder="NEGARA" id="upNegara">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions mt-10 mb-20">
                            <div class="form-actions mt-10">
                                <div class="row">
                                    <div class="col-md-6"> </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                            <input type="hidden" class="form-control " autocomplete="off" id="upId">
                                                <button type="submit" class="btn btn-success mr-10" onclick="updateProdusen()">SIMPAN</button>
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

<!--ajax-->

<script type="text/javascript">
    function insertProdusen() {

        nama = $('#nama').val();
        kota = $('#kota').val();
        negara = $('#negara').val();
        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Po_obat/insertProdusen",
                method: "POST",
                dataType: 'json',
                data: {
                    nama: nama,
                    kota: kota,
                    negara: negara,
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "PRODUSEN " + nama + " Berhasil ditambahkan",
                            confirmButtonColor: "#3cb878",
                        });
                        nama = $('#nama').val("");
                        kota = $('#kota').val("");
                        negara = $('#negara').val("");

                        //$('#username_result').html("");

                        $('#datable').DataTable().ajax.reload();
                        location.reload();
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
        return false;
    }

    function edit_produsen(id_pro_obat){
            $.ajax({
				url: "<?php echo base_url() ?>Po_obat/getDataProdusen",
				data: {
					id_pro_obat: id_pro_obat,
				},
				type: 'POST',
				dataType: 'json',
				success: function(data) {
					if (data.status_dt == "found") {
                        $("#upId").val(data.id_pro_obat);
                        $("#upNama").val(data.nama);
                        $("#upKota").val(data.kota);
                        $("#upNegara").val(data.negara);
                        $("#modal_edit_vendor").modal('show');
					} else {
						alert("data tidak ditemukan");
					}
				}
			});
        }


        function updateProdusen(){
            id = $("#upId").val();
            nama = ($("#upNama").val());
            kota = ($("#upKota").val());
            negara = ($("#upNegara").val());
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>Po_obat/edit_produsen",
                dataType: 'json',
                data: {
                    id: id,
                    nama: nama,
                    kota: kota,
                    negara: negara,
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data Berhasil ditambahkan",
                            confirmButtonColor: "#3cb878",
                        });
                        $("#upNama").val("");
                        $("#upKota").val("");
                        $("#upNegara").val("");

                        $("#modal_edit_vendor").modal('hide');
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

    function hapus_produsen(id_pro_obat) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + id_pro_obat + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Po_obat/hapus_produsen",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_pro_obat: id_pro_obat,
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
    $(document).ready(function () {


                $('#datable').DataTable({
                        "language": {
                        "sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
                        "sProcessing":   "Sedang memproses...",
                        "sLengthMenu":   "Tampilkan _MENU_ entri",
                        "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                        "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix":  "",
                        "sSearch":  "Pencarian :",
                        "sUrl":          "",
                        "oPaginate": {
                        "sFirst":    "Pertama",
                        "sPrevious": "Sebelumnya",
                        "sNext":     "Selanjutnya",
                        "sLast":     "Terakhir"
                        },
                             },     
                            "ajax": '<?php echo base_url('Po_obat/tampil_produsen'); ?>',    
                            "deferRender": true,
                            "processing": true,
                            "order": [], 
                            "columnDefs": [
                            { 
                            "targets": [ 0 ], 
                            "orderable": false, 
                            },
                        ],
                });
            });
</script>

<!--end ajax-->

=======
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">PRODUSEN OBAT</span></h6>
        </div>



        <div class="clearfix"></div>
    </div>

    <div align="right">
        <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target=".modal-pendaftaranakun"><i class="icon-plus"></i><span class="btn-text">TAMBAH PRODUSEN</span>
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

       



                <!-- <div class="form-group">

        </div> -->

            



            <div class="table-wrap">
                <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

                <div class="table-responsive">
                    <table class="table table-hover display  pb-30" id="datable">
                        <thead>
                            <tr class="bg-success">
                                <th>EDIT</th>
                                <th>HAPUS</th>
                                <th>NO</th>
                                <th>NAMA PRODUSEN</th>
                                <th>KOTA</th>
                                <th>NEGARA</th>
                            </tr>
                        </thead>
                        <tfoot class="bg-success">
                        		<th>EDIT</th>
                                <th>HAPUS</th>
                                <th>NO</th>
                                <th>NAMA PRODUSEN</th>
                                <th>KOTA</th>
                                <th>NEGARA</th>
                        </tfoot>
                        <tbody style="color: black">

                            <!--percobaan nampilin data-->



                            <!--end percobaan penampilan data-->

                        </tbody>
                    </table>
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
                        <p>PRODUSEN</p>
                        <p><i class="icon-people mr-10"></i>INPUT PRODUSEN</p>

                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->

                        <div class="form-body mt-20">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NAMA PRODUSEN</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="NAMA PRODUSEN"  id="nama" name="nama" ></input>
                                        </div>
                                    </div>
                                </div>

                                <!-- span -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">KOTA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="KOTA"  id="kota" name="kota" ></input>
                                        </div>
                                    </div>
                                </div>


                                
                                <!--/span-->
                            </div>

                            <p class="mt-15">
                                <!-- /Row -->

                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NEGARA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="NEGARA"  id="negara" name="negara" ></input>
                                        </div>
                                    </div>
                                </div>

                                
                                    


                                    <p class="mt-15">
                                </div>


                                <!-- /Row -->
                        </div>
                        <!-- End -->
                    </div>
                    <div class="modal-footer mb-10 mr-15">

                        <button onclick="insertProdusen()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">Submit</span></button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--akhir modal yang akan dipakai-->

        <div class="modal fade bs-example-modal-lg" id="modal_edit_vendor" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT DATA PRODUSEN
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-wrap">
                        <!-- /formbody -->
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA PRODUSEN</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control " autocomplete="off" placeholder="NAMA DISTRIBUTOR" id="upNama">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3 mt-10">KOTA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" autocomplete="off" placeholder="ALAMAT" id="upKota">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3 mt-10">NEGARA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" autocomplete="off" placeholder="NEGARA" id="upNegara">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions mt-10 mb-20">
                            <div class="form-actions mt-10">
                                <div class="row">
                                    <div class="col-md-6"> </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                            <input type="hidden" class="form-control " autocomplete="off" id="upId">
                                                <button type="submit" class="btn btn-success mr-10" onclick="updateProdusen()">SIMPAN</button>
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

<!--ajax-->

<script type="text/javascript">
    function insertProdusen() {

        nama = $('#nama').val();
        kota = $('#kota').val();
        negara = $('#negara').val();
        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Po_obat/insertProdusen",
                method: "POST",
                dataType: 'json',
                data: {
                    nama: nama,
                    kota: kota,
                    negara: negara,
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "PRODUSEN " + nama + " Berhasil ditambahkan",
                            confirmButtonColor: "#3cb878",
                        });
                        nama = $('#nama').val("");
                        kota = $('#kota').val("");
                        negara = $('#negara').val("");

                        //$('#username_result').html("");

                        $('#datable').DataTable().ajax.reload();
                        location.reload();
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
        return false;
    }

    function edit_produsen(id_pro_obat){
            $.ajax({
				url: "<?php echo base_url() ?>Po_obat/getDataProdusen",
				data: {
					id_pro_obat: id_pro_obat,
				},
				type: 'POST',
				dataType: 'json',
				success: function(data) {
					if (data.status_dt == "found") {
                        $("#upId").val(data.id_pro_obat);
                        $("#upNama").val(data.nama);
                        $("#upKota").val(data.kota);
                        $("#upNegara").val(data.negara);
                        $("#modal_edit_vendor").modal('show');
					} else {
						alert("data tidak ditemukan");
					}
				}
			});
        }


        function updateProdusen(){
            id = $("#upId").val();
            nama = ($("#upNama").val());
            kota = ($("#upKota").val());
            negara = ($("#upNegara").val());
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>Po_obat/edit_produsen",
                dataType: 'json',
                data: {
                    id: id,
                    nama: nama,
                    kota: kota,
                    negara: negara,
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data Berhasil ditambahkan",
                            confirmButtonColor: "#3cb878",
                        });
                        $("#upNama").val("");
                        $("#upKota").val("");
                        $("#upNegara").val("");

                        $("#modal_edit_vendor").modal('hide');
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

    function hapus_produsen(id_pro_obat) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + id_pro_obat + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Po_obat/hapus_produsen",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_pro_obat: id_pro_obat,
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
    $(document).ready(function () {


                $('#datable').DataTable({
                        "language": {
                        "sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
                        "sProcessing":   "Sedang memproses...",
                        "sLengthMenu":   "Tampilkan _MENU_ entri",
                        "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                        "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix":  "",
                        "sSearch":  "Pencarian :",
                        "sUrl":          "",
                        "oPaginate": {
                        "sFirst":    "Pertama",
                        "sPrevious": "Sebelumnya",
                        "sNext":     "Selanjutnya",
                        "sLast":     "Terakhir"
                        },
                             },     
                            "ajax": '<?php echo base_url('Po_obat/tampil_produsen'); ?>',    
                            "deferRender": true,
                            "processing": true,
                            "order": [], 
                            "columnDefs": [
                            { 
                            "targets": [ 0 ], 
                            "orderable": false, 
                            },
                        ],
                });
            });
</script>

<!--end ajax-->

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
