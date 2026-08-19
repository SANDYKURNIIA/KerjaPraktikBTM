<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">DAFTAR VENDOR</span></h6>
        </div>
        <div align="right">
            <div class="btn btn-primary btn-anim  btn-sm " data-toggle="modal" data-target="#modal_tambah_vendor" style="margin-right: 40px;"><i class="icon-rocket"></i><span class="btn-text">TAMBAH VENDOR</span>
                <div></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display  pb-30">
                        <thead>
                            <tr class="bg-success">
                                <th>EDIT</th>
                                <th>HAPUS</th>
                                <th>NO</th>
                                <th>NAMA VENDOR</th>
                                <th>ALAMAT</th>
                                <th>TELEPON</th>
                                <th>NAMA SALES</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>EDIT</th>
                                <th>HAPUS</th>
                                <th>NO</th>
                                <th>NAMA VENDOR</th>
                                <th>ALAMAT</th>
                                <th>TELEPON</th>
                                <th>NAMA SALES</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-lg" id="modal_tambah_vendor" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INPUT DISTRIBUTOR / VENDOR
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-wrap mt-10">
                        <!-- /formbody -->
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA DISTRIBUTOR</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control " autocomplete="off" placeholder="NAMA DISTRIBUTOR" id="inNama">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3 mt-10">ALAMAT</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" autocomplete="off" placeholder="ALAMAT" id="inAlamat">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3 mt-10">TELEPON</label>
                                        <div class="col-md-9 has-success">
                                            <input type="number" class="form-control" autocomplete="off" placeholder="TELEPON" id="inTelp">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA SALES</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" autocomplete="off" placeholder="NAMA SALES" id="inSales">
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
                                                <button type="submit" class="btn btn-success mr-10" onclick="tambahVendor()">Submit</button>
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
    <!-- End -->

    <div class="modal fade bs-example-modal-lg" id="modal_edit_vendor" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT DISTRIBUTOR / VENDOR
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-wrap">
                        <!-- /formbody -->
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA DISTRIBUTOR</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control " autocomplete="off" placeholder="NAMA DISTRIBUTOR" id="upNama">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3 mt-10">ALAMAT</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" autocomplete="off" placeholder="ALAMAT" id="upAlamat">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3 mt-10">TELEPON</label>
                                        <div class="col-md-9 has-success">
                                            <input type="number" class="form-control" autocomplete="off" placeholder="TELEPON" id="upTelp">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NAMA SALES</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" autocomplete="off" placeholder="NAMA SALES" id="upSales">
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
                                                <button type="submit" class="btn btn-success mr-10" onclick="updateVendor()">Submit</button>
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

    <style>
        td{
            color:black;
        }
    </style>

    <script type="text/javascript">
        function tambahVendor() {
            nama = ($("#inNama").val());
            alamat = ($("#inAlamat").val());
            telp = ($("#inTelp").val());
            sales = ($("#inSales").val());

            var ID = Math.random().toString(36).substr(2, 16);

            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>Logistik_umum/tambah_vendor",
                dataType: 'json',
                data: {
                    id: ID,
                    nama: nama,
                    alamat: alamat,
                    telp: telp,
                    sales: sales,
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data Berhasil ditambahkan",
                            confirmButtonColor: "#3cb878",
                        });
                        $("#inNama").val("");
                        $("#inAlamat").val("");
                        $("#inTelp").val("");
                        $("#inSales").val("");

                        $("#modal_tambah_vendor").modal('hide');
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
        function tampilEditVendor(id_vendor){
            $.ajax({
				url: "<?php echo base_url() ?>Logistik_umum/getDataVendor",
				data: {
					id_vendor: id_vendor,
				},
				type: 'POST',
				dataType: 'json',
				success: function(data) {
					if (data.status_dt == "found") {
                        $("#upId").val(data.id_vendor);
                        $("#upNama").val(data.nama);
                        $("#upAlamat").val(data.alamat);
                        $("#upTelp").val(data.telp);
                        $("#upSales").val(data.sales);
                        $("#modal_edit_vendor").modal('show');
					} else {
						alert("data tidak ditemukan");
					}
				}
			});
        }
        function updateVendor(){
            id = $("#upId").val();
            nama = ($("#upNama").val());
            alamat = ($("#upAlamat").val());
            telp = ($("#upTelp").val());
            sales = ($("#upSales").val());

            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>Logistik_umum/edit_vendor",
                dataType: 'json',
                data: {
                    id: id,
                    nama: nama,
                    alamat: alamat,
                    telp: telp,
                    sales: sales,
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
                        $("#upAlamat").val("");
                        $("#upTelp").val("");
                        $("#upSales").val("");

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
        function hapusVendor(id_vendor, nama){
            swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + nama + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Logistik_umum/hapus_vendor",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_vendor: id_vendor,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
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
                "ajax": '<?php echo base_url('Logistik_umum/tampil_data_vendor'); ?>',
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