<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">TINDAKAN JENAZAH</span></h6>
        </div>

        <div class="clearfix"></div>
    </div>

    <div align="right">
        <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target="#modal_jenazah"><i class="icon-plus"></i><span class="btn-text">TAMBAH TINDAKAN</span>
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
                                    <th>NO</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>BIAYA SARANA</th>
                                    <th>JASA TRANSPORT</th>
                                    <th>TOTAL</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tfoot class="bg-success">
                                <th>EDIT</th>
                                <th>NO</th>
                                <th>NAMA TINDAKAN</th>
                                <th>BIAYA SARANA</th>
                                <th>JASA TRANSPORT</th>
                                <th>TOTAL</th>
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
    </div>


    <!--data table-->

    <!--modal yang akan dipakai-->

    <div class="panel-wrapper collapse in">
        <div class="modal fade bs-example-modal-lg" id="modal_jenazah" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TAMBAH TINDAKAN JENAZAH
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-wrap">
                            <!-- /formbody -->
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 mt-10">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA TINDAKAN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control " autocomplete="off" placeholder="NAMA TINDAKAN" id="inTindakan">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-10">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3 mt-10">BIAYA SARANA</label>
                                            <div class="col-md-9 has-success">
                                                <input type="number" class="form-control" autocomplete="off" placeholder="BIAYA SARANA" id="inBiayaSarana" oninput="setTotal()">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-10">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3 mt-10">JASA TRANSPORTASI</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" autocomplete="off" placeholder="JASA TRANSPORTASI" id="inJasa" oninput="setTotal()">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-10">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3 mt-10">STATUS</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="inStatus">
                                                    <option value="AKTIF">AKTIF</option>
                                                    <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-10">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3 mt-10">TOTAL</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" autocomplete="off" disabled="" placeholder="STATUS" id="inTotal">
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
                                                    <button type="submit" class="btn btn-success mr-10" onclick="insertTindakan()">SIMPAN</button>
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

        <div class="modal fade bs-example-modal-lg" id="modal_edit_jenazah" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT TINDAKAN JENAZAH
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-wrap">
                            <!-- /formbody -->
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 mt-10">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA TINDAKAN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control " autocomplete="off" placeholder="NAMA TINDAKAN" id="upTindakan">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-10">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3 mt-10">BIAYA SARANA</label>
                                            <div class="col-md-9 has-success">
                                                <input type="number" class="form-control" autocomplete="off" placeholder="BIAYA SARANA" id="upBiayaSarana" oninput="setTotal1()">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-10">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3 mt-10">JASA TRANSPORTASI</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" autocomplete="off" placeholder="JASA TRANSPORTASI" id="upJasa" oninput="setTotal1()">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-10">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3 mt-10">STATUS</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="upStatus">
                                                    <option value="AKTIF">AKTIF</option>
                                                    <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-10">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3 mt-10">TOTAL</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" autocomplete="off" disabled="" placeholder="STATUS" id="upTotal">
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
                                                    <button type="submit" class="btn btn-success mr-10" onclick="updateTindakan()">SIMPAN</button>
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
        <!--akhir modal yang akan dipakai-->
    </div>
</div>
<!--ajax-->
<script type="text/javascript">
    function insertTindakan() {
        nama = ($("#inTindakan").val());
        biaya_sarana = ($("#inBiayaSarana").val());
        jasa = ($("#inJasa").val());
        status = ($("#inStatus").val());

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Homecare/insert_tindakan_jasa_jenazah",
            dataType: 'json',
            data: {
                nama: nama,
                biaya_sarana: biaya_sarana,
                jasa: jasa,
                status: status,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil ditambahkan",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#inTindakan").val("");
                    $("#inBiayaSarana").val("");
                    $("#inJasa").val("");
                    $("#inTotal").val("");
                    $("#inStatus").val("");

                    $("#modal_jenazah").modal('hide');
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

    function setTotal() {

        biaya_sarana = $('#inBiayaSarana').val();
        jasa = $('#inJasa').val();
        total = Number(biaya_sarana) + Number(jasa);
        $("#inTotal").val(total.toFixed(0));
    }

    function setTotal1() {

        biaya_sarana = $('#upBiayaSarana').val();
        jasa = $('#upJasa').val();
        total = Number(biaya_sarana) + Number(jasa);
        $("#upTotal").val(total.toFixed(0));

    }

    function edit_tindakan_jenazah(id_list_tindakan) {
        $.ajax({
            url: "<?php echo base_url() ?>Homecare/getDataTindakanJasaJenazah",
            data: {
                id_list_tindakan: id_list_tindakan,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    $("#upId").val(data.id_list_tindakan);
                    $("#upTindakan").val(data.nama_tindakan);
                    $("#upBiayaSarana").val(data.biaya_sarana);
                    $("#upJasa").val(data.jasa_transport);
                    $("#upTotal").val(data.total);
                    $("#upStatus").val(data.status);
                    $("#modal_edit_jenazah ").modal('show');
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }


    function updateTindakan() {
        id = $("#upId").val();
        nama = ($("#upTindakan").val());
        biaya_sarana = ($("#upBiayaSarana").val());
        jasa = ($("#upJasa").val());
        total = ($("#upTotal").val());
        status = ($("#upStatus").val());

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Homecare/edit_tindakan_jasa_jenazah",
            dataType: 'json',
            data: {
                id: id,
                nama: nama,
                biaya_sarana: biaya_sarana,
                jasa: jasa,
                total: total,
                status: status,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil diedit",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#inTindakan").val("");
                    $("#inBiayaSarana").val("");
                    $("#inJasa").val("");
                    $("#inTotal").val("");
                    $("#inStatus").val("");

                    $("#modal_edit_jenazah").modal('hide');
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

    // function hapus_obat(id_logistik) {
    //     swal({
    //         title: "Apakah kamu yakin?",
    //         text: "Menghapus data " + id_logistik + "?",
    //         type: "warning",
    //         showCancelButton: true,
    //         confirmButtonColor: "#3cb878",
    //         confirmButtonText: "Yakin",
    //         cancelButtonText: "Batal",
    //         closeOnConfirm: false
    //     }, function() {
    //         $().ready(function() {
    //             $.ajax({
    //                 url: "<?php echo base_url() ?>Po_obat/hapus_obat",
    //                 method: "POST",
    //                 dataType: 'json',
    //                 data: {
    //                     id_logistik: id_logistik,
    //                 },
    //                 success: function(data) {
    //                     if (data.status == "success") {
    //                         swal({
    //                             title: "good job!",
    //                             type: "success",
    //                             text: "Data Berhasil dihapus",
    //                             confirmButtonColor: "#3cb878",
    //                         });
    //                         //$("#modalTambahObatFaktur").modal('show');
    //                         //$('#isiFaktur').DataTable().ajax.reload();
    //                         $('#datable').DataTable().ajax.reload();
    //                     } else {
    //                         swal({
    //                             title: "Gagal!",
    //                             type: "warning",
    //                             text: data.status,
    //                             confirmButtonColor: "#3cb878",
    //                         });
    //                     }
    //                 }
    //             });
    //         });

    //     });
    //     return false;
    // }
</script>

<script type="text/javascript">
    $(document).ready(function() {


        $('#datable').DataTable({
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan MENU entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan START sampai END dari TOTAL entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari MAX entri keseluruhan)",
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
            "ajax": '<?php echo base_url('Homecare/tampil_jasa_tindakan_jenazah'); ?>',
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

<!--end of ajax-->