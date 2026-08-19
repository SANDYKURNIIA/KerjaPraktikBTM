<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">PO OBAT</span></h6>
        </div>
        <div class="clearfix"></div>
    </div>


    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <!-- <form id="form-filter" class="form-horizontal"> -->
            <div class="form-group">



                <div class="table-wrap">
                    <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

                    <div class="table-responsive">
                        <table class="table table-hover display  pb-30" id="datable">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>AKSI</th>
                                    <th>PILIH</th>
                                    <th>NO DOKUMENT</th>
                                    <th>TANGGAL INPUT</th>
                                    <th>TANGGAL PO</th>
                                    <th>DISTRIBUTOR</th>
                                    <th>STATUS</th>

                                </tr>
                            </thead>
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

<div class="modal fade modal-pendaftaranakun" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <p>RESPON KONFIRMASI</p>
            </div>
            <div class="modal-body">
                <!-- Form body  -->

                <div class="form-body mt-20">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3"></label>
                            <div class="col-md-9 has-success">

                                <select class="form-control filled-input select2" id="acc" name="acc">
                                    <option value="-">Pilih</option>
                                    <option value="DITERIMA">DITERIMA</option>
                                    <option value="DITOLAK">DITOLAK</option>
                                </select>
                                <span class="help-block"> </span>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">KETERANGAN</label>
                            <div class="col-md-9 has-success">
                                <textarea class="form-control" rows="5" style="resize: none;" id="ket">-</textarea>
                                <span class="help-block"> </span>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End -->
            </div>
            <div class="modal-footer mb-10 mr-15">
                <input type="hidden" id="id">
                <button onclick="update()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modalTambahObatFaktur" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO FAKTUR
                        </h5>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-sm-12">

                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">LIST FAKTUR</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NO DOKUMEN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" readonly id="no_dok">
                                                <input type="hidden" class="form-control " autocomplete="off" id="inFaktur">

                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->


                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3"></label>
                                            <div class="col-md-9 has-error">


                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="panel-wrapper collapse in">

                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table id="isiFaktur" class="table table-hover display  pb-30">
                                                <thead>
                                                    <tr class="bg-success">
                                                        <th>NO</th>
                                                        <th>NAMA OBAT</th>
                                                        <th>JUMLAH SATUAN TERKECIL</th>
                                                        <th>JUMLAH PESANAN</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr class="bg-success">
                                                        <th>NO</th>
                                                        <th>NAMA OBAT</th>
                                                        <th>JUMLAH SATUAN TERKECIL</th>
                                                        <th>JUMLAH PESANAN</th>
                                                    </tr>
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
                </div>
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /formbody -->
</div>


<script type="text/javascript">
    function tambah_obat_faktur(id_faktur, no_dokumen, id_usulan) {
        // alert(no_dokumen);
        $("#no_dok").val(no_dokumen);
        $("#inFaktur").val(id_faktur);
        //$("#idUsulan").val(id_usulan);
        $("#modalTambahObatFaktur").modal('show');
        // reload_list_faktur(id_usulan);
        reload_isi_list_faktur(id_faktur);
    }

    function edit_faktur(id_faktur) {
        // alert(no_dokumen);
        //$("#no_dok").val(no_dokumen);
        $("#id").val(id_faktur);
        // $("#no_dokumen1").val(no_dokumen);
        $(".modal-pendaftaranakun").modal('show');
    }

    function update() {

        ket = $('#ket').val();
        id_cuti = $('#id').val();
        acc = $('#acc').val();

        $.ajax({
            url: "<?= base_url() . 'Po_obat/konfirmasi' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_cuti,
                ket: ket,
                acc: acc
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Konfirmasi berhasil di update!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#datable').DataTable().ajax.reload();
                    $(".modal-pendaftaranakun").modal('hide');

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



    $('#verifikasi').on('shown.bs.modal', function() {
        $('#myInput').focus()
    })
    $('#verifikasi').on('hidden.bs.modal', function() {
        document.location.reload();
    })


    function reload_isi_list_faktur(idFaktur) {

        $('#isiFaktur').dataTable().fnClearTable();
        $('#isiFaktur').dataTable().fnDestroy();
        $('#isiFaktur').DataTable({
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },

            },
            "ajax": {
                "url": '<?php echo base_url('Po_obat/tampil_list_faktur'); ?>',
                "type": 'POST',
                "data": {
                    idFaktur: idFaktur
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

    //end tampil data 
</script>
<!--percobaan1-->
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
            "ajax": '<?php echo base_url('Po_obat/tampil_data_approve'); ?>',
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


<!--end tampil data-->