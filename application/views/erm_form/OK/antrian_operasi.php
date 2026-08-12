<<<<<<< HEAD
<!-- Antrian Operasi -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_antrian" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">ANTRIAN OPERASI</h6>
                        </div>
                        <div class="clearfix"></div>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="ti-layout-media-right-alt mr-10"></i> FORM ANTRIAN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <form id="formAntrian">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left">NOMOR KARTU</label>
                                            <input type="text" class="form-control" placeholder="NOMOR KARTU" name="nomorkartu" id="nomorkartu">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left">POLI </label>
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" id="kodepoli" name="kodepoli">
                                                <!-- <?php

                                                        foreach ($poli as $row) {

                                                        ?>
                                                    <option value="<?php echo $row['kdpoli_bpjs']; ?>">
                                                        <?php echo $row['nama_panjang']; ?></option>
                                                <?php }  ?> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left">TANGGAL OPERASI</label>
                                            <input type="date" class="form-control" placeholder="TANGGAL OPERASI" name="tanggal_op" id="tanggal_op" value="<?= date('Y-m-d') ?>">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left">JENIS TINDAKAN</label>
                                            <input type="text" class="form-control" placeholder="JENIS TINDAKAN" name="jenis_tindakan" id="jenis_tindakan">
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="inPelAntri">

                                    <div type="submit" class="btn btn-success mr-10" onclick="insert_antrian()">SIMPAN</div>
                                </div>
                            </form>
                            <div class="table-wrap mt-0">
                                <div class="table-responsive mt-0">
                                    <table id="table_antrian" class="table table-hover display pb-30 mt-10" width="100%">
                                        <thead>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>HAPUS</th>
                                                <th>POLI</th>
                                                <th>TANGGAL OP</th>
                                                <th>JENIS TINDAKAN</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>HAPUS</th>
                                                <th>POLI</th>
                                                <th>TANGGAL OP</th>
                                                <th>JENIS TINDAKAN</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Row -->
            </div>
            <!-- /formbody -->
        </div>
    </div>
</div>
<style>
    td {
        color: black;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url: "<?php echo base_url(); ?>Pelayanan_masuk/getNamaPoli",
            method: "GET",
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html = '<option>-</option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].kdpoli_bpjs + '>' + data[i].nama_panjang + '</option>';
                }
                $('#kodepoli').html(html);
            }
        });
    })

    function antrian_operasi(id_pelayanan, id_history) {
        $.ajax({
            url: "<?= base_url() . 'OK_Pasien/getDataPasien' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {

                if (data.status_dt == "found") {
                    //disini set datanya ke modal
                    $("#nomorkartu").val(data.no_bpjs.padStart(13, "0"));
                    $("#inPelAntri").val(id_pelayanan);
                    if (data.kdpoli_bpjs == 'RANAP') {
                        $("#kodepoli").val('BED').change();
                    } else {
                        $("#kodepoli").val(data.kdpoli_bpjs).change();
                    }
                    reload_antrian_operasi(id_pelayanan);
                    $("#modal_antrian").modal('show');
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }

    function insert_antrian() {
        id_pelayanan = $('#inPelAntri').val();
        nomorkartu = $('#nomorkartu').val();
        kodepoli = $('#kodepoli').val();
        jenis_tindakan = $('#jenis_tindakan').val();
        tanggal_op = $('#tanggal_op').val();

        $.ajax({
            url: "<?= base_url() . 'OK_Pasien/new_queueok' ?>",
            method: "POST",
            dataType: 'json',
            cache: false,
            data: {
                id_pelayanan: id_pelayanan,
                nomorkartu: nomorkartu,
                kodepoli: kodepoli,
                jenis_tindakan: jenis_tindakan,
                tanggal_op: tanggal_op,
                tipe : 'add'
            },
            success: function(data) {
                if (data.status == "success") {
                    $('#formAntrian')[0].reset();
                    swal({
                        title: "Good Job!",
                        type: "success",
                        text: "Antrian berhasil ditambahkan",
                        confirmButtonColor: "#3cb878",
                    });
                    // $("#modal_antrian").modal('hide');
                    $('#table_antrian').DataTable().ajax.reload();


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

    function update_antrian() {
        id_pelayanan = $('#inPelAntri').val();
        nomorkartu = $('#nomorkartu').val();
        kodepoli = $('#kodepoli').val();
        jenis_tindakan = $('#jenis_tindakan').val();
        tanggal_op = $('#tanggal_op').val();

        $.ajax({
            url: "<?= base_url() . 'OK_Pasien/new_queueok' ?>",
            method: "POST",
            dataType: 'json',
            cache: false,
            data: {
                id: id,
                id_pelayanan: id_pelayanan,
                nomorkartu: nomorkartu,
                kodepoli: kodepoli,
                jenis_tindakan: jenis_tindakan,
                tanggal_op: tanggal_op,
                tipe : 'edit'
            },
            success: function(data) {
                if (data.status == "success") {
                    $('#formAntrian')[0].reset();
                    swal({
                        title: "Good Job!",
                        type: "success",
                        text: "Antrian berhasil diedit",
                        confirmButtonColor: "#3cb878",
                    });
                    // $("#modal_antrian").modal('hide');
                    $('#table_antrian').DataTable().ajax.reload();


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

    function reload_antrian_operasi(id_pelayanan) {
        $('#table_antrian').dataTable().fnClearTable();
        $('#table_antrian').dataTable().fnDestroy();
        $('#table_antrian').DataTable({
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
                "url": '<?php echo base_url('OK_Pasien/list_jadwal_operasi_byId'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pelayanan,
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

    function hapus_antrian(id_tindakan_ok) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data antrian ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>OK_Pasien/hapus_data_antrian",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_tindakan_ok: id_tindakan_ok,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#table_antrian').DataTable().ajax.reload();
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


=======
<!-- Antrian Operasi -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_antrian" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">ANTRIAN OPERASI</h6>
                        </div>
                        <div class="clearfix"></div>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="ti-layout-media-right-alt mr-10"></i> FORM ANTRIAN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <form id="formAntrian">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left">NOMOR KARTU</label>
                                            <input type="text" class="form-control" placeholder="NOMOR KARTU" name="nomorkartu" id="nomorkartu">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left">POLI </label>
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" id="kodepoli" name="kodepoli">
                                                <!-- <?php

                                                        foreach ($poli as $row) {

                                                        ?>
                                                    <option value="<?php echo $row['kdpoli_bpjs']; ?>">
                                                        <?php echo $row['nama_panjang']; ?></option>
                                                <?php }  ?> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left">TANGGAL OPERASI</label>
                                            <input type="date" class="form-control" placeholder="TANGGAL OPERASI" name="tanggal_op" id="tanggal_op" value="<?= date('Y-m-d') ?>">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left">JENIS TINDAKAN</label>
                                            <input type="text" class="form-control" placeholder="JENIS TINDAKAN" name="jenis_tindakan" id="jenis_tindakan">
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="inPelAntri">

                                    <div type="submit" class="btn btn-success mr-10" onclick="insert_antrian()">SIMPAN</div>
                                </div>
                            </form>
                            <div class="table-wrap mt-0">
                                <div class="table-responsive mt-0">
                                    <table id="table_antrian" class="table table-hover display pb-30 mt-10" width="100%">
                                        <thead>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>HAPUS</th>
                                                <th>POLI</th>
                                                <th>TANGGAL OP</th>
                                                <th>JENIS TINDAKAN</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>HAPUS</th>
                                                <th>POLI</th>
                                                <th>TANGGAL OP</th>
                                                <th>JENIS TINDAKAN</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Row -->
            </div>
            <!-- /formbody -->
        </div>
    </div>
</div>
<style>
    td {
        color: black;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url: "<?php echo base_url(); ?>Pelayanan_masuk/getNamaPoli",
            method: "GET",
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html = '<option>-</option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].kdpoli_bpjs + '>' + data[i].nama_panjang + '</option>';
                }
                $('#kodepoli').html(html);
            }
        });
    })

    function antrian_operasi(id_pelayanan, id_history) {
        $.ajax({
            url: "<?= base_url() . 'OK_Pasien/getDataPasien' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {

                if (data.status_dt == "found") {
                    //disini set datanya ke modal
                    $("#nomorkartu").val(data.no_bpjs.padStart(13, "0"));
                    $("#inPelAntri").val(id_pelayanan);
                    if (data.kdpoli_bpjs == 'RANAP') {
                        $("#kodepoli").val('BED').change();
                    } else {
                        $("#kodepoli").val(data.kdpoli_bpjs).change();
                    }
                    reload_antrian_operasi(id_pelayanan);
                    $("#modal_antrian").modal('show');
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }

    function insert_antrian() {
        id_pelayanan = $('#inPelAntri').val();
        nomorkartu = $('#nomorkartu').val();
        kodepoli = $('#kodepoli').val();
        jenis_tindakan = $('#jenis_tindakan').val();
        tanggal_op = $('#tanggal_op').val();

        $.ajax({
            url: "<?= base_url() . 'OK_Pasien/new_queueok' ?>",
            method: "POST",
            dataType: 'json',
            cache: false,
            data: {
                id_pelayanan: id_pelayanan,
                nomorkartu: nomorkartu,
                kodepoli: kodepoli,
                jenis_tindakan: jenis_tindakan,
                tanggal_op: tanggal_op,
                tipe : 'add'
            },
            success: function(data) {
                if (data.status == "success") {
                    $('#formAntrian')[0].reset();
                    swal({
                        title: "Good Job!",
                        type: "success",
                        text: "Antrian berhasil ditambahkan",
                        confirmButtonColor: "#3cb878",
                    });
                    // $("#modal_antrian").modal('hide');
                    $('#table_antrian').DataTable().ajax.reload();


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

    function update_antrian() {
        id_pelayanan = $('#inPelAntri').val();
        nomorkartu = $('#nomorkartu').val();
        kodepoli = $('#kodepoli').val();
        jenis_tindakan = $('#jenis_tindakan').val();
        tanggal_op = $('#tanggal_op').val();

        $.ajax({
            url: "<?= base_url() . 'OK_Pasien/new_queueok' ?>",
            method: "POST",
            dataType: 'json',
            cache: false,
            data: {
                id: id,
                id_pelayanan: id_pelayanan,
                nomorkartu: nomorkartu,
                kodepoli: kodepoli,
                jenis_tindakan: jenis_tindakan,
                tanggal_op: tanggal_op,
                tipe : 'edit'
            },
            success: function(data) {
                if (data.status == "success") {
                    $('#formAntrian')[0].reset();
                    swal({
                        title: "Good Job!",
                        type: "success",
                        text: "Antrian berhasil diedit",
                        confirmButtonColor: "#3cb878",
                    });
                    // $("#modal_antrian").modal('hide');
                    $('#table_antrian').DataTable().ajax.reload();


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

    function reload_antrian_operasi(id_pelayanan) {
        $('#table_antrian').dataTable().fnClearTable();
        $('#table_antrian').dataTable().fnDestroy();
        $('#table_antrian').DataTable({
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
                "url": '<?php echo base_url('OK_Pasien/list_jadwal_operasi_byId'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pelayanan,
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

    function hapus_antrian(id_tindakan_ok) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data antrian ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>OK_Pasien/hapus_data_antrian",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_tindakan_ok: id_tindakan_ok,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#table_antrian').DataTable().ajax.reload();
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


>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>