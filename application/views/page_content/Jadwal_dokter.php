<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success"> JADWAL DOKTER</span></h6>
        </div>



        <div class="clearfix"></div>
    </div>

    <div align="right">
        <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target="#modal_jadwal"><i class="icon-plus"></i><span class="btn-text">TAMBAH DATA DOKTER</span>
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
                    <!-- <div class="col-md-12">

                    </div> -->
                </div>




                <!-- <div class="form-group">

        </div> -->





                <div class="table-wrap">
                    <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

                    <div class="table-responsive">
                        <table class="table table-hover display  pb-30" id="datable">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>EDIT</th>
                                    <th>NAMA DOKTER</th>
                                    <th>SPESIALIS</th>
                                    <th>KODE SPESIALIS</th>
                                    <th>KODE DOKTER</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tfoot class="bg-success">
                                <th>NO</th>
                                <th>EDIT</th>
                                <th>NAMA DOKTER</th>
                                <th>SPESIALIS</th>
                                <th>KODE SPESIALIS</th>
                                <th>KODE DOKTER</th>
                                <th>STATUS</th>
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


        <!--data table-->

        <!--modal yang akan dipakai-->

        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <!-- sample modal content -->

                <div class="modal fade modal-pendaftaranakun" id="modal_jadwal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p>JADWAL DOKTER</p>
                                <p><i class="icon-people mr-10"></i>INPUT DATA DOKTER</p>
                            </div>
                            <div class="modal-body">
                                <!-- Form body  -->
                                <div class="form-body mt-20">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">NAMA DOKTER</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="text" class="form-control" placeholder="NAMA DOKTER" id="inNamaDokter" name="nama" required=""></input>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- span -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3"> SPESIA-LIS</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="text" class="form-control" placeholder="SPESIALIS" id="inSpes" name="spes"></input>
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
                                                <label class="control-label col-md-3">KODE DOKTER</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="text" class="form-control" placeholder="KODE DOKTER" required="" id="inKode" name="kode"></input>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">STATUS</label>
                                                <div class="col-md-9 has-success">
                                                    <select class="form-control filled-input select2" id="inStatusDokter">
                                                        <option value="AKTIF">AKTIF</option>
                                                        <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- span -->
                                </div>
                                <!-- /Row -->
                                <!-- End -->
                            </div>
                            <div class="modal-footer mb-10 mr-15">

                                <button onclick="insertDokter()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">Submit</span></button>

                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>


            <div class="panel-body">
                <!-- sample modal edit -->

                <div class="modal fade modal-pendaftaranakun" id="modal_edit_jadwal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <!-- <div class="modal-header">
                                <p>JADWAL DOKTER</p>
                                <p><i class="icon-people mr-10"></i>EDIT JADWAL DOKTER</p>

                            </div> -->
                            <div class="modal-body">
                                <!-- Form body  -->

                                <div class="form-body mt-20">
                                    <h6 class="txt-dark capitalize-font pl-20"><i class="icon-people mr-10"></i>TAMBAH JADWAL DOKTER
                                    </h6>
                                    <hr width="95%">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">NAMA DOKTER</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="text" class="form-control" placeholder="NAMA DOKTER" id="upNama" name="nama" required="" disabled></input>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- span -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3"> SPESIA-LIS</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="text" class="form-control" placeholder="SPESIALIS" id="upSpes" name="spes" disabled></input>
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
                                                <label class="control-label col-md-3">KODE DOKTER</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="text" class="form-control" placeholder="KODE DOKTER" required="" id="upKode" name="kode" disabled></input>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">STATUS</label>
                                                <div class="col-md-9 has-success">
                                                    <select class="form-control filled-input select2" id="upStatus">
                                                        <option value="AKTIF">AKTIF</option>
                                                        <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <input type="hidden" class="form-control " autocomplete="off" id="upId">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- span -->

                                    <!-- /Row -->

                                    <p class="mt-15">
                                        <!-- /Row -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">JAM MULAI</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="time" class="form-control" placeholder="JAM MULAI" required="" id="upMulai" name="mulai"></input>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">JAM SELESAI</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="time" class="form-control" placeholder="JAM SELESAI" required="" id="upSelesai" name="selesai"></input>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <p class="mt-15">
                                        <!-- /Row -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">HARI</label>
                                                <div class="col-md-9 has-success">
                                                    <select class="form-control filled-input select2" id="upHari">
                                                        <option value="-">-</option>
                                                        <option value="SENIN">SENIN</option>
                                                        <option value="SELASA">SELASA</option>
                                                        <option value="RABU">RABU</option>
                                                        <option value="KAMIS">KAMIS</option>
                                                        <option value="JUMAT">JUMAT</option>
                                                        <option value="SABTU">SABTU</option>
                                                        <option value="MINGGU">MINGGU</option>
                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">ID STAFF</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="text" class="form-control" placeholder="-" required="" id="upStaff" name="kode"></input>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>

                                </div>
                                <!-- End -->
                            </div>
                            <div class="modal-footer mb-10 mr-15">

                                <button onclick="insertJadwal()" class="btn btn-success btn-anim  btn-sm" type="submit"><i class="icon-rocket"></i><span class="btn-text">Tambah Jadwal</span></button>

                            </div>
                            <!-- Start Edit collapse -->
                            <div class="form-wrap">
                                <div class="form-body mt-10 collapse" id="collapse_jadwal_perdokter">
                                    <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>EDIT JADWAL DOKTER
                                    </h6>
                                    <hr width="95%">
                                    <form id="form_edit_jadwal_perdokter">

                                        <p class="mt-15">
                                            <!-- /Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">STATUS</label>
                                                    <div class="col-md-9 has-success">
                                                        <select class="form-control filled-input select2" id="upStatusEdit">
                                                            <option value="AKTIF">AKTIF</option>
                                                            <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                                                        </select>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">HARI</label>
                                                    <div class="col-md-9 has-success">
                                                        <select class="form-control filled-input select2" id="upHariEdit">
                                                            <option value="-">-</option>
                                                            <option value="SENIN">SENIN</option>
                                                            <option value="SELASA">SELASA</option>
                                                            <option value="RABU">RABU</option>
                                                            <option value="KAMIS">KAMIS</option>
                                                            <option value="JUMAT">JUMAT</option>
                                                            <option value="SABTU">SABTU</option>
                                                            <option value="MINGGU">MINGGU</option>
                                                        </select>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <input type="hidden" class="form-control " autocomplete="off" id="upIdEdit">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">JAM MULAI</label>
                                                    <div class="col-md-9 has-success">
                                                        <input type="time" class="form-control" placeholder="JAM MULAI" required="" id="upMulaiEdit" name="mulai"></input>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">JAM SELESAI</label>
                                                    <div class="col-md-9 has-success">
                                                        <input type="time" class="form-control" placeholder="JAM SELESAI" required="" id="upSelesaiEdit" name="selesai"></input>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </form>
                                    <div class="row">
                                        <div class="col-md-12" style="padding-right:45px;">
                                            <div class="form-group pull-right">
                                                <button type="submit" onclick="editJadwal()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN EDIT</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Edit collapse -->


                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>JADWAL</h6>
                            <hr width="95%">
                            <div class="table-wrap" style="width: 95%; margin: auto ">
                                <div class="table-responsive">
                                    <table class="table table-hover display pb-60" id="tablejadwaldokter">
                                        <thead>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>AKSI</th>
                                                <th>EDIT</th>
                                                <th>HARI</th>
                                                <th>JAM MULAI</th>
                                                <th>JAM SELESAI</th>
                                                <th>STATUS</th>
                                                <th>ID STAFF</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>AKSI</th>
                                                <th>EDIT</th>
                                                <th>HARI</th>
                                                <th>JAM MULAI</th>
                                                <th>JAM SELESAI</th>
                                                <th>STATUS</th>
                                                <th>ID STAFF</th>
                                            </tr>
                                        </tfoot>
                                        <tbody style="color: black">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>

        </div>
    </div>
    <!--akhir modal yang akan dipakai-->

    <!--ajax-->
    <script type="text/javascript">
        function insertDokter() {
            inNamaDokter = $('#inNamaDokter').val();
            inKode = $('#inKode').val();
            inSpes = $('#inSpes').val();
            inStatusDokter = $('#inStatusDokter').val();

            $.ajax({
                url: "<?= base_url() . 'Jadwal_dokter/insert_dokter' ?>",
                method: "POST",
                dataType: 'json',
                cache: true,
                data: {
                    nama: inNamaDokter,
                    kode_dokter: inKode,
                    dokter_spes: inSpes,
                    status: inStatusDokter,
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data ini Telah di Simpan!",
                            confirmButtonColor: "#3cb878",
                        });
                        $('#inNamaDokter').val('');
                        $('#inKode').val('');
                        $('#inSpes').val('');
                        $('#inStatusDokter').val('AKTIF').change();
                        $('#tablejadwal').DataTable().ajax.reload();
                        $('#outTotalHargaMcu').DataTable().ajax.reload();
                        $("#modal_jadwal").modal('hide');
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


        function insertJadwal() {
            upId = $('#upId').val();
            upHari = $('#upHari').val();
            upMulai = $('#upMulai').val();
            upSelesai = $('#upSelesai').val();
            upStatus = $('#upStatus').val();
            // staff = $('#upStaff').val();

            $.ajax({
                url: "<?= base_url() . 'Jadwal_dokter/insert_jadwal_perdokter' ?>",
                method: "POST",
                dataType: 'json',
                cache: true,
                data: {
                    id_dokter: upId,
                    hari: upHari,
                    jam_mulai: upMulai,
                    jam_selesai: upSelesai,
                    status: upStatus,
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data ini Telah di Simpan!",
                            confirmButtonColor: "#3cb878",
                        });

                        $('#upHari').val('-').change();
                        $('#upMulai').val('');
                        $('#upSelesai').val('');
                        $('#upStatus').val('AKTIF').change();
                        $('#tablejadwaldokter').DataTable().ajax.reload();
                        $('#outTotalHargaMcu').DataTable().ajax.reload();
                        // $("#modal_jadwal").modal('hide');
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

        function edit_jadwal_dokter(id_dokter) {
            $.ajax({
                url: "<?php echo base_url() ?>Jadwal_dokter/getDataJadwalDokter",
                data: {
                    id_dokter: id_dokter,
                },
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    if (data.status_dt == "found") {
                        $("#upId").val(data.id_dokter);
                        $("#upNama").val(data.nama);
                        $("#upKode").val(data.kode_dokter);
                        $("#upSpes").val(data.dokter_spes);
                        $("#upStatus").val(data.status);
                        reload_jadwal(id_dokter);
                        $("#modal_edit_jadwal").modal('show');
                    } else {
                        alert("data tidak ditemukan");
                    }
                }
            });
        }


        function delete_jadwal_dokter(id_jadwal) {
            // nama = $("#NamaPasien").val();
            swal({
                title: "Apakah kamu yakin akan !",
                text: "Menghapus data ini ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3cb878",
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal",
                closeOnConfirm: false
            }, function() {
                $().ready(function() {
                    $.ajax({
                        url: "<?php echo base_url() ?>Jadwal_dokter/delete_jadwal_perdokter",
                        method: "POST",
                        dataType: 'json',
                        data: {
                            id_jadwal: id_jadwal,
                        },
                        success: function(data) {
                            if (data.status == "success") {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Jadwal Dokter Berhasil dihapus",
                                    confirmButtonColor: "#3cb878",
                                });
                                $('#datable').DataTable().ajax.reload();
                                $('#tablejadwaldokter').DataTable().ajax.reload();
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

        function edit_data_jadwalPerDokter(id_jadwal) {
            // $('#id_jadwal').val(id);
            $("#collapse_jadwal_perdokter").collapse('toggle');

            $.ajax({
                url: "<?= base_url() . 'Jadwal_dokter/getDataJadwalPerDokter' ?>",
                data: {
                    id_jadwal: id_jadwal
                },
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    if (data.status_dt == "found") {

                        $('#upIdEdit').val(data.id_jadwal);
                        $('#upHariEdit').val(data.hari).change();
                        $('#upMulaiEdit').val(data.jam_mulai);
                        $('#upSelesaiEdit').val(data.jam_selesai);
                        $('#upStatusEdit').val(data.status).change();

                    } else {
                        alert("data tidak ditemukan");
                    }
                }
            });
        }

        function editJadwal() {
            upIdEdit = $('#upIdEdit').val();
            upHariEdit = $('#upHariEdit').val();
            upMulaiEdit = $('#upMulaiEdit').val();
            upSelesaiEdit = $('#upSelesaiEdit').val();
            upStatusEdit = $('#upStatusEdit').val();
            // staff = $('#upStaff').val();

            $.ajax({
                url: "<?= base_url() . 'Jadwal_dokter/update_jadwal_perdokter' ?>",
                method: "POST",
                dataType: 'json',
                cache: true,
                data: {
                    id_jadwal: upIdEdit,
                    hari: upHariEdit,
                    jam_mulai: upMulaiEdit,
                    jam_selesai: upSelesaiEdit,
                    status: upStatusEdit,
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data ini Telah di Simpan!",
                            confirmButtonColor: "#3cb878",
                        });

                        $('#upHari').val('-').change();
                        $('#upMulai').val('');
                        $('#upSelesai').val('');
                        $('#upStatus').val('');
                        $('#tablejadwaldokter').DataTable().ajax.reload();
                        $('#outTotalHargaMcu').DataTable().ajax.reload();
                        // $("#modal_jadwal").modal('hide');
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
                "ajax": '<?php echo base_url('Jadwal_dokter/tampil_jadwal_dokter'); ?>',
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

    <script type="text/javascript">
        function reload_jadwal(id_dokter) {
            $('#tablejadwaldokter').dataTable().fnClearTable();
            $('#tablejadwaldokter').dataTable().fnDestroy();
            $('#tablejadwaldokter').DataTable({
                "pageLength": 10,
                "searching": false,
                "lengthChange": false,
                "bInfo": false,
                "paging": false,
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
                        "sLast": "Terakhir",
                    }
                },
                "ajax": {
                    "url": '<?php echo base_url('Jadwal_dokter/tampil_jadwal_Perdokter'); ?>',
                    "type": 'POST',
                    "data": {
                        id_dokter: id_dokter
                    },
                },
                "deferRender": true,
                "processing": true,
                "order": [],
                "columnDefs": [{
                    "targets": [0],
                    "orderable": false,
                }, ],
            });
        }
    </script>



    <!--end of ajax-->