<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">RIWAYAT PENARIKAN</h6>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target="#modal_tambahstok"><i class="icon-plus"></i><span class="btn-text">PENARIKAN OBAT</span></button>

                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>

                <div class="row mt-30">
                    <div class="col-md-12">
                        <div class="col-md-3 mt-20 pl-5">
                            <button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
                        </div>
                        <div class="col-md-3">
                            <label class="mt-0 txt-dark">Tanggal Mulai : </label>
                            <input type="date" autocomplete="off" id="inTglMulai" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="mt-0 txt-dark">Tanggal Akhir : </label>
                            <input type="date" autocomplete="off" id="inTglAkhir" class="form-control">
                        </div>
                        <div class="col-md-3 mt-20">
                            <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="datable" class="table table-hover display pb-30" width="100%">
                                <thead>
                                    <tr class="bg-success">
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>ED</th>
                                        <th>TANGGAL PENARIKAN</th>
                                        <th>UNIT</th>
                                        <th>JUMLAH</th>
                                        <th>STAFF</th>
                                        <th>HAPUS</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="bg-success">
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>ED</th>
                                        <th>TANGGAL PENARIKAN</th>
                                        <th>UNIT</th>
                                        <th>JUMLAH</th>
                                        <th>STAFF</th>
                                        <th>HAPUS</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            td {
                color: black;
            }
        </style>

        <div class="modal fade " id="modal_tambahstok" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">


            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>

                    <!--modal 1-->

                    <div class="modal-body">
                        <!-- Form body  -->
                        <form class="form-horizontal">
                            <div class="form-body mt-20">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default card-view">
                                            <div class="panel-heading">
                                                <div class="pull-left">
                                                    <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>PENARIKAN OBAT</h6>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xs-12">
                                                            <div class="form-wrap">


                                                                <div class="form-body">

                                                                    <hr>
                                                                    <div class="row">

                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">UNIT</label>
                                                                                <div class="col-md-9 has-success">

                                                                                    <select class="form-control filled-input select2" id="inUnit" name="unit">
                                                                                        <option value="">NAMA UNIT</option>

                                                                                        <?php foreach ($unit as $u) { ?>
                                                                                            <option value="<?= $u['unit']; ?>"><?= $u['nama']; ?></option>

                                                                                        <?php } ?>
                                                                                    </select>

                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <!--/span-->
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">OBAT</label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" id="inObat" name="obat">
                                                                                        <option value="-">NAMA OBAT</option>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- /Row -->
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">JUMLAH PENARIKAN</label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <input type="number" class="form-control " placeholder="JUMLAH" id="inJumlahPenarikan" value="0">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">TANGGAL KADALUARSA</label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" id="tglExp" name="tglExp">
                                                                                        <option value="-">TANGGAL EXP</option>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--/span-->
                                                                    </div>
                                                                    <!-- /Row -->
                                                                    <div class="form-actions mt-10">
                                                                        <button onclick="insertPenarikan()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">SUBMIT</span></button>
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
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datable').DataTable({
            "dom": 'Bfrtip',
            "buttons": ['csv', 'excel', 'pdf'],
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
            "ajax": '<?php echo base_url('Logistik_farmasi/Tampil_riwayat_penarikan'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    });

    function tampilHariIni() {
        $('#datable').DataTable().destroy();
        $('#datable').DataTable({
            "retrieve": true,
            "dom": 'Bfrtip',
            "buttons": ['csv', 'excel', 'pdf'],
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
            "ajax": '<?php echo base_url('Logistik_farmasi/Tampil_riwayat_penarikan'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    }

    function tampilRangePermit(mulai, akhir) {
        $('#datable').DataTable().destroy();
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        $('#datable').DataTable({
            "retrieve": true,
            "dom": 'Bfrtip',
            "buttons": ['csv', 'excel', 'pdf'],
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
            "ajax": {
                "url": '<?= base_url('Logistik_farmasi/Tampil_riwayat_penarikan'); ?>',
                "type": 'POST',
                "data": {
                    mulai: mulai,
                    akhir: akhir
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

    function reload_data_tindakan(id_req) {
        $('#tabletindakan').dataTable().fnClearTable();
        $('#tabletindakan').dataTable().fnDestroy();
        $('#tabletindakan').DataTable({
            "pageLength": 10,
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
                "url": '<?php echo base_url('Logistik_farmasi/Tampil_list_riwayat_penarikan_obat'); ?>',
                "type": 'POST',
                "data": {
                    id_req: id_req
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

    function insertPenarikan() {
        nama_unit = $('#inUnit').val();
        id_logistik = $('#inObat').val();
        jumlah_penarikan = $('#inJumlahPenarikan').val();
        tgl_kadaluarsa = $('#tglExp').val();

        $.ajax({
            method: "POST",
            dataType: 'json',
            url: "<?php echo base_url() ?>Logistik_farmasi/insertPenarikan",
            data: {
                nama_unit: nama_unit,
                id_logistik: id_logistik,
                jumlah_penarikan: jumlah_penarikan,
                tgl_kadaluarsa: tgl_kadaluarsa
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Insert Penarikan Berhasil",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#modal_tambahstok").modal('hide');
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

    $(document).ready(function() {
        // $('#inUnit').change(function(){
        //     var id_unit = $('#inUnit').val();
        //     $.ajax({
        //         type: "POST",
        //         url: "<?php echo base_url('Logistik_farmasi/getObatByUnit') ?>",
        //         dataType: "JSON",
        //         data: {
        //             id_unit: id_unit,
        //         },
        //         success: function(data) {
        //             var x = data.id_logistik;
        //             var b = document.getElementById("inObat");
        //             var i;
        //             for( i = 0; i < 600; i++){
        //                 var a = {};
        //                 a[i] = new Option(data.nama, data.id_logistik);
        //                 b.options.add(a[i]);
        //                 $('#inObat').html('<option value=' + data.id_logistik + '>' + data.nama + '</option>');
        //             }

        //         }

        //   });  

        // });
        $('#inUnit').change(function() {

            var id_unit = $('#inUnit').val();
            if (id_unit != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>Logistik_farmasi/getObatByUnit",
                    method: "POST",
                    data: {
                        id_unit: id_unit
                    },
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html = '<option value="">NAMA OBAT</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].id_logistik + '>' + data[i].nama + '</option>';
                        }
                        $('#inObat').html(html);
                    }
                });
            } else {
                $('#inObat').html('<option value="">-</option>');
            }
        });
    })

    $(document).ready(function() {
        // $('#inObat').change(function(){
        //     var id_obat = $('#inObat').val();
        //     $.ajax({
        //         type: "POST",
        //         url: "<?php echo base_url('Logistik_farmasi/getTglExp') ?>",
        //         dataType: "JSON",
        //         data: {
        //             id_logistik: id_obat,
        //         },
        //         success: function(data) {
        //                 $('#tglExp').html('<option value=->-</option><option value=' + data.kadaluarsa + '>' + data.kadaluarsa + '</option>');
        //         }

        //   });  
        // });
        $('#inObat').change(function() {

            var id_logistik = $('#inObat').val();
            var id_unit = $('#inUnit').val();
            if (id_logistik != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>Logistik_farmasi/getTglExp",
                    method: "POST",
                    data: {
                        id_unit: id_unit,
                        id_logistik: id_logistik
                    },
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html = '<option value="">TANGGAL KADALUARSA</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].kadaluarsa + '>' + data[i].kadaluarsa + '</option>';
                        }
                        $('#tglExp').html(html);
                    }
                });
            } else {
                $('#tglExp').html('<option value="">-</option>');
            }
        });
    })

    function hapus(id) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Logistik_farmasi/hapus_penarikan",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_faktur: id,
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