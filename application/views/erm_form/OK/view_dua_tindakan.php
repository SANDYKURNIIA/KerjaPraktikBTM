<<<<<<< HEAD
<!-- MOdal DUA TINDAKAN -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_Duatindakan" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark"> TINDAKAN PASIEN</h6>
                        </div>
                        <div class="clearfix"></div>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-equalizer mr-10"></i> DUA TINDAKAN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body mt-20" style="margin-left:-1em">
                            <div class="row">

                                <div class="row">
                                    <br>
                                    <div class="col-md-6" id="outTampilTindakan">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">TINDAKAN OPERASI</label>
                                            <div class="col-md-9 col-sm-12 col-xs-12">
                                                <select class="form-control filled-input rounded-input select2" id="in2Tindakan">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <label for="" class="control-label col-md-3">JUMLAH</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12">
                                            <input type="number" class="form-control" id="jmlDuaTindakan" name="jmlDuaTindakan">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <label for="" class="control-label col-md-3">HARGA</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12">
                                            <input type="number" class="form-control" id="hargaDuaTindakan" name="hargaDuaTindakan">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <br>
                                        <label class="control-label col-md-3">NAMA DOKTER</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12 ">
                                            <select class="form-control filled-input rounded-input select2" id="inDokterDua">
                                                <?php
                                                foreach ($data_dokter as $d) : ?>
                                                    <option value="<?php echo $d->id_dokter; ?>">
                                                        <?php echo $d->nama; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <input type="hidden" class="form-control" id="idPelayanan">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <label for="" class="control-label col-md-3">TOTAL</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12">
                                            <input type="text" class="form-control" id="totalHargaDua" name="totalHargaDua" disabled>
                                            <br><br>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="clearfix">&nbsp;</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="btn btn-success btn-square" onclick="insert_Dua_tindakan()">SUBMIT</div>
                                    </div>
                                </div>

                                <div class="panel-wrapper collapse in mb-20 mt-20" id="outListTindakanApelkes">
                                    <h6 class="txt-dark capitalize-font pl-20 mb-0"><i class="icon-list mr-10"></i>LIST DETAIL</h6>
                                    <hr width="95% mb-0">
                                    <div class="panel-body mt-0">
                                        <div class="table-wrap mt-0">
                                            <div class="table-responsive mt-0">
                                                <table id="table_dua_tindakan" class="table table-hover display pb-30 mt-10" width="100%">
                                                    <thead>
                                                        <tr class="bg-success">
                                                            <th>NO</th>
                                                            <th>HAPUS</th>
                                                            <th>NAMA TINDAKAN</th>
                                                            <!-- <th>TIPE</th> -->
                                                            <th>BIAYA TINDAKAN</th>
                                                            <th>JUMLAH TINDAKAN</th>
                                                            <th>TOTAL BIAYA</th>
                                                            <th>NAMA STAFF</th>
                                                            <th>DOKTER</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr class="bg-success">
                                                            <th>NO</th>
                                                            <th>HAPUS</th>
                                                            <th>NAMA TINDAKAN</th>
                                                            <!-- <th>TIPE</th> -->
                                                            <th>BIAYA TINDAKAN</th>
                                                            <th>JUMLAH TINDAKAN</th>
                                                            <th>TOTAL BIAYA</th>
                                                            <th>NAMA STAFF</th>
                                                            <th>DOKTER</th>
                                                        </tr>
                                                    </tfoot>
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
        </div>
    </div>
    <script>
        function listDuaTindakan(id_pelayanan, id_history) {
            $('#modal_Duatindakan').modal('show');
            $("#id_pelayanan").val(id_pelayanan);
            $('#table_dua_tindakan').dataTable().fnClearTable();
            $('#table_dua_tindakan').dataTable().fnDestroy();
            $('#table_dua_tindakan').DataTable({
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
                    "sSearch": "Cari Tindakan:",
                    "oPaginate": {
                        "sFirst": "Pertama",
                        "sPrevious": "Sebelumnya",
                        "sNext": "Selanjutnya",
                        "sLast": "Terakhir"
                    }
                },
                "ajax": {
                    "url": '<?php echo base_url('OK_Pasien/viewDataDuaTindakan'); ?>',
                    "type": 'POST',
                    "data": {
                        idPelayanan: id_pelayanan
                    },
                },
                "deferRender": true,
                "processing": true,
                "order": [],
                "columnDefs": [{
                    "targets": [0],
                    "orderable": false
                }, ],
            });
        }

        $(document).ready(function() {
            $.ajax({
                url: "<?= base_url() . 'OK_Pasien/getAllTIndakan' ?>",
                type: 'GET',
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    html = '<option value=0>-</option>';
                    for (i = 0; i < data.length; i++) {
                        var harga1 = Number(data[i].harga_sarana);
                        var harga2 = Number(data[i].harga_jasa);
                        var harga = harga1 + harga2;
                        html +=
                            '<option value="' + data[i].id_list_kamar_ok + '|' + harga + '">' + data[i].nama + '</option>';
                    }
                    $('#in2Tindakan').html(html);
                }
            });

            $('#jmlDuaTindakan').val(0);
            $('#hargaDuaTindakan').val(0);
        });

        $("#jmlDuaTindakan").on("input", function() {
            $("#totalHargaDua").val($('#jmlDuaTindakan').val() * $('#hargaDuaTindakan').val());
        });
        $("#hargaDuaTindakan").on("input", function() {
            $("#totalHargaDua").val($('#jmlDuaTindakan').val() * $('#hargaDuaTindakan').val());
        });

        function insert_Dua_tindakan() {
            id_pelayanan = $("#id_pelayanan").val();
            a = $("#in2Tindakan").val();
            splitDiag = a.split("|");
            tipe = $("#tipeDuaTindakan").val();
            harga = $("#hargaDuaTindakan").val();
            jumlah = $("#jmlDuaTindakan").val();
            total = $("#totalHargaDua").val();
            dokter = $("#inDokterDua").val();
            id_list_tindakan = splitDiag[0];
            var ID = Math.random().toString(36).substr(2, 16);
            if (splitDiag[1] > 0 && dokter == '-') {
                swal({
                    title: "Gagal!",
                    type: "warning",
                    text: "Nama Dokter harus dipilih",
                    confirmButtonColor: "#3cb878",
                });
            } else {
                $.ajax({
                    url: "<?= base_url() . 'OK_Pasien/insertTindakanOk' ?>",
                    data: {
                        id_list_tindakan: id_list_tindakan,
                        id_tindakan_labor: ID,
                        harga: harga,
                        frek: jumlah,
                        total: total,
                        id_pelayanan: id_pelayanan,
                        id_dokter: dokter,
                        jenis: 2

                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        if (data.status == "success") {
                            listDuaTindakan(id_pelayanan, '');
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil ditambahkan",
                                confirmButtonColor: "#3cb878",
                            });


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
                return false;
            }
        }

        function hapus_dua_tindakan(nama, nm_tindakan) {
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
                        url: "<?php echo base_url() ?>OK_Pasien/hapus_data_tindakan",
                        method: "POST",
                        dataType: 'json',
                        data: {
                            id_tindakan_ok: nm_tindakan,
                        },
                        success: function(data) {
                            if (data.status == "success") {
                                $('#table_dua_tindakan').DataTable().ajax.reload();
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Data Berhasil dihapus",
                                    confirmButtonColor: "#3cb878",
                                });

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

        $('#jmlDuaTindakan').keypress(function(event) {
            if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
                event.preventDefault(); //stop character from entering input
            }
        });

        $('#hargaDuaTindakan').keypress(function(event) {
            if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
                event.preventDefault(); //stop character from entering input
            }
        });

        function tampilHarga2tindakan() {
            a = $("#in2Tindakan").val();
            splitDiag = a.split("|");

            harga = parseFloat(splitDiag[1]);
            frek = parseFloat($("#jmlDuaTindakan").val());

            total = harga * frek;

            $("#hargaDuaTindakan").val(harga);
            $("#totalHargaDua").val(total);
        }
=======
<!-- MOdal DUA TINDAKAN -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_Duatindakan" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark"> TINDAKAN PASIEN</h6>
                        </div>
                        <div class="clearfix"></div>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-equalizer mr-10"></i> DUA TINDAKAN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body mt-20" style="margin-left:-1em">
                            <div class="row">

                                <div class="row">
                                    <br>
                                    <div class="col-md-6" id="outTampilTindakan">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">TINDAKAN OPERASI</label>
                                            <div class="col-md-9 col-sm-12 col-xs-12">
                                                <select class="form-control filled-input rounded-input select2" id="in2Tindakan">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <label for="" class="control-label col-md-3">JUMLAH</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12">
                                            <input type="number" class="form-control" id="jmlDuaTindakan" name="jmlDuaTindakan">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <label for="" class="control-label col-md-3">HARGA</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12">
                                            <input type="number" class="form-control" id="hargaDuaTindakan" name="hargaDuaTindakan">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <br>
                                        <label class="control-label col-md-3">NAMA DOKTER</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12 ">
                                            <select class="form-control filled-input rounded-input select2" id="inDokterDua">
                                                <?php
                                                foreach ($data_dokter as $d) : ?>
                                                    <option value="<?php echo $d->id_dokter; ?>">
                                                        <?php echo $d->nama; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <input type="hidden" class="form-control" id="idPelayanan">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <label for="" class="control-label col-md-3">TOTAL</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12">
                                            <input type="text" class="form-control" id="totalHargaDua" name="totalHargaDua" disabled>
                                            <br><br>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="clearfix">&nbsp;</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="btn btn-success btn-square" onclick="insert_Dua_tindakan()">SUBMIT</div>
                                    </div>
                                </div>

                                <div class="panel-wrapper collapse in mb-20 mt-20" id="outListTindakanApelkes">
                                    <h6 class="txt-dark capitalize-font pl-20 mb-0"><i class="icon-list mr-10"></i>LIST DETAIL</h6>
                                    <hr width="95% mb-0">
                                    <div class="panel-body mt-0">
                                        <div class="table-wrap mt-0">
                                            <div class="table-responsive mt-0">
                                                <table id="table_dua_tindakan" class="table table-hover display pb-30 mt-10" width="100%">
                                                    <thead>
                                                        <tr class="bg-success">
                                                            <th>NO</th>
                                                            <th>HAPUS</th>
                                                            <th>NAMA TINDAKAN</th>
                                                            <!-- <th>TIPE</th> -->
                                                            <th>BIAYA TINDAKAN</th>
                                                            <th>JUMLAH TINDAKAN</th>
                                                            <th>TOTAL BIAYA</th>
                                                            <th>NAMA STAFF</th>
                                                            <th>DOKTER</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr class="bg-success">
                                                            <th>NO</th>
                                                            <th>HAPUS</th>
                                                            <th>NAMA TINDAKAN</th>
                                                            <!-- <th>TIPE</th> -->
                                                            <th>BIAYA TINDAKAN</th>
                                                            <th>JUMLAH TINDAKAN</th>
                                                            <th>TOTAL BIAYA</th>
                                                            <th>NAMA STAFF</th>
                                                            <th>DOKTER</th>
                                                        </tr>
                                                    </tfoot>
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
        </div>
    </div>
    <script>
        function listDuaTindakan(id_pelayanan, id_history) {
            $('#modal_Duatindakan').modal('show');
            $("#id_pelayanan").val(id_pelayanan);
            $('#table_dua_tindakan').dataTable().fnClearTable();
            $('#table_dua_tindakan').dataTable().fnDestroy();
            $('#table_dua_tindakan').DataTable({
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
                    "sSearch": "Cari Tindakan:",
                    "oPaginate": {
                        "sFirst": "Pertama",
                        "sPrevious": "Sebelumnya",
                        "sNext": "Selanjutnya",
                        "sLast": "Terakhir"
                    }
                },
                "ajax": {
                    "url": '<?php echo base_url('OK_Pasien/viewDataDuaTindakan'); ?>',
                    "type": 'POST',
                    "data": {
                        idPelayanan: id_pelayanan
                    },
                },
                "deferRender": true,
                "processing": true,
                "order": [],
                "columnDefs": [{
                    "targets": [0],
                    "orderable": false
                }, ],
            });
        }

        $(document).ready(function() {
            $.ajax({
                url: "<?= base_url() . 'OK_Pasien/getAllTIndakan' ?>",
                type: 'GET',
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    html = '<option value=0>-</option>';
                    for (i = 0; i < data.length; i++) {
                        var harga1 = Number(data[i].harga_sarana);
                        var harga2 = Number(data[i].harga_jasa);
                        var harga = harga1 + harga2;
                        html +=
                            '<option value="' + data[i].id_list_kamar_ok + '|' + harga + '">' + data[i].nama + '</option>';
                    }
                    $('#in2Tindakan').html(html);
                }
            });

            $('#jmlDuaTindakan').val(0);
            $('#hargaDuaTindakan').val(0);
        });

        $("#jmlDuaTindakan").on("input", function() {
            $("#totalHargaDua").val($('#jmlDuaTindakan').val() * $('#hargaDuaTindakan').val());
        });
        $("#hargaDuaTindakan").on("input", function() {
            $("#totalHargaDua").val($('#jmlDuaTindakan').val() * $('#hargaDuaTindakan').val());
        });

        function insert_Dua_tindakan() {
            id_pelayanan = $("#id_pelayanan").val();
            a = $("#in2Tindakan").val();
            splitDiag = a.split("|");
            tipe = $("#tipeDuaTindakan").val();
            harga = $("#hargaDuaTindakan").val();
            jumlah = $("#jmlDuaTindakan").val();
            total = $("#totalHargaDua").val();
            dokter = $("#inDokterDua").val();
            id_list_tindakan = splitDiag[0];
            var ID = Math.random().toString(36).substr(2, 16);
            if (splitDiag[1] > 0 && dokter == '-') {
                swal({
                    title: "Gagal!",
                    type: "warning",
                    text: "Nama Dokter harus dipilih",
                    confirmButtonColor: "#3cb878",
                });
            } else {
                $.ajax({
                    url: "<?= base_url() . 'OK_Pasien/insertTindakanOk' ?>",
                    data: {
                        id_list_tindakan: id_list_tindakan,
                        id_tindakan_labor: ID,
                        harga: harga,
                        frek: jumlah,
                        total: total,
                        id_pelayanan: id_pelayanan,
                        id_dokter: dokter,
                        jenis: 2

                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        if (data.status == "success") {
                            listDuaTindakan(id_pelayanan, '');
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil ditambahkan",
                                confirmButtonColor: "#3cb878",
                            });


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
                return false;
            }
        }

        function hapus_dua_tindakan(nama, nm_tindakan) {
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
                        url: "<?php echo base_url() ?>OK_Pasien/hapus_data_tindakan",
                        method: "POST",
                        dataType: 'json',
                        data: {
                            id_tindakan_ok: nm_tindakan,
                        },
                        success: function(data) {
                            if (data.status == "success") {
                                $('#table_dua_tindakan').DataTable().ajax.reload();
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Data Berhasil dihapus",
                                    confirmButtonColor: "#3cb878",
                                });

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

        $('#jmlDuaTindakan').keypress(function(event) {
            if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
                event.preventDefault(); //stop character from entering input
            }
        });

        $('#hargaDuaTindakan').keypress(function(event) {
            if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
                event.preventDefault(); //stop character from entering input
            }
        });

        function tampilHarga2tindakan() {
            a = $("#in2Tindakan").val();
            splitDiag = a.split("|");

            harga = parseFloat(splitDiag[1]);
            frek = parseFloat($("#jmlDuaTindakan").val());

            total = harga * frek;

            $("#hargaDuaTindakan").val(harga);
            $("#totalHargaDua").val(total);
        }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
    </script>