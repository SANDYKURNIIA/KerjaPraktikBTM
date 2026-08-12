<<<<<<< HEAD
<!-- modal edit data -->
<div class="modal fade bs-example-modal-lg" id="modal_makan" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO TINDAKAN MAKAN
                </h5>
            </div>

            <div class="modal-body">

                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">NAMA TINDAKAN</label>
                                    <div class="col-md-9 has-success">

                                        <select class="form-control filled-input select2" disabled placeholder="PILIH TINDAKAN" style="border: 1px solid lightgreen;" id="inTindakanMakan" name="inTindakanMakan" onchange="pilihTindakanMakan()">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                    <div class="col-md-9 has-error">
                                        <input type="number" class="form-control" id="inHargaMakan" name="inHargaMakan">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                    <div class="col-md-9 has-error">
                                        <input type="number" class="form-control" id="inFrekmakan" name="inFrekmakan" value="1" oninput="pilihTindakanMakan()">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div> -->
                            <input type="hidden" class="form-control" value=1 name="inFrekMakan" disabled id="inFrekMakan">

                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">TOTAL HARGA</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control " disabled id="outTotalKia">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-md-6" id="pembayaran_transport">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">PEMBAYARAN</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inPembayaranTransport" id="inPembayaranTransport">
                                            <option value="ditanggung" >DITANGGUNG ASURANSI</option>
                                            <option value="tidak" selected>TIDAK DITANGGUNG ASURANSI</option>

                                        </select>
                                    </div>
                                </div>
                            </div> -->
                            <input type="hidden" class="form-control" disabled id="id_pel_makan">
                            <input type="hidden" class="form-control" disabled id="id_his_makan">
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="insert_tindakan_makan()" class="btn btn-success btn-anim  btn-sm mr-20"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
            </div>
            <div class="modal-body mt-30">
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                <hr width="95%">
                <div class="table-wrap" style="width: 95%; margin: auto ">
                    <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tablemakan">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>HAPUS</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>TOTAL BIAYA</th>
                                    <th>TANGGAL</th>
                                    <th>NAMA STAFF</th>
                                </tr>
                            </thead>
                            <tbody style="color: black">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                </div>
                <div class="col-md-4 pull-right mt-20">
                    <div class="table-wrap" style="width: 85%; margin-bottom:40px;">
                        <div class="table-responsive ">
                            <table class="table table-hover display " id="outTotalHargamakan">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="font-weight:bold;">Total Keseluruhan</th>
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
</div>

<script type="text/javascript">
    $(document).ready(function() {




    });

    function edit_makan(id_pelayanan, id_history) {
        $.ajax({
            url: "<?php echo base_url(); ?>Tindakan_makan/getListMakan",
            method: "GET",
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {

                    html += '<option value=' + data[i].id_list_tindakan_apelkes+ '>' + data[i].nama + '</option>';
                }
                $('#inTindakanMakan').html(html);
            }
        });
        // $.ajax({
        //     url: "<?= base_url() . 'Poli/getdata' ?>",
        //     data: {
        //         id_pelayanan: id_pelayanan,
        //     },
        //     type: 'POST',
        //     dataType: 'json',
        //     success: function(data) {
        //         if (data.status_dt == "found") {
        //             if (data.data.cara_bayar == '30') {
        //                 $('#pembayaran_transport').collapse('show');
        //             } else {
        //                 $('#pembayaran_transport').collapse('hide');

        //             }
        //         } else {
        //             swal({
        //                 title: "Gagal!",
        //                 type: "warning",
        //                 text: "Maaf, Data tidak ditemukan",
        //                 confirmButtonColor: "#3cb878",
        //             });
        //         }
        //     }
        // });
        $("#id_pel_makan").val(id_pelayanan);
        $("#id_his_makan").val(id_history);
        $("#modal_makan").modal('show');
        reload_data_makan(id_pelayanan);
        reload_total_harga_makan(id_pelayanan);

    }

    /* function pilihTindakanMakan() {
        a = $("#inTindakanMakan").val();
        splitDiag = a.split("|");
        // alert(splitDiag[1]);

        hargaSarana = parseFloat(splitDiag[1]);
        hargaJasa = parseFloat(splitDiag[2]);
        harga = hargaSarana + hargaJasa;
        $("#inHargaMakan").val(convertToRupiah(harga));
        frek = $("#inFrekmakan").val();
         document.getElementById("outTotalmakan").value = convertToRupiah(harga * frek); 
    } */

    function insert_tindakan_makan() {
        a = $("#inTindakanMakan").val();
        splitDiag = a.split("|");
        harga = $("#inHargaMakan").val();
        frek = 1;
        total = harga * frek;
        id_pel_rad = $('#id_pel_makan').val();
        id_his_rad = $('#id_his_makan').val();
        // status_pembayaran = $('#inPembayaranTransport').val();

        dataString = 'harga=' + harga +
            '&id_pel_rad=' + id_pel_rad + '&id_his_rad=' + id_his_rad + '&id_list_tindakan=' + splitDiag[0] +
            '&frek=' + frek + '&total=' + total ;
        $.ajax({
            url: "<?= base_url() . 'Tindakan_makan/insert' ?>",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });
                    $('#outTotalmakan').val('');
                    $('#inFrekmakan').val('1');
                    $('#inHargaMakan').val('');
                    // $('#inPembayaranTransport').val('ditanggung').change();
                    $('#tablemakan').DataTable().ajax.reload();
                    $('#outTotalHargamakan').DataTable().ajax.reload();
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

    function hapus_makan(id_tindakan_apelkes, id_pelayanan,nama) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data "+nama+" ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Tindakan_makan/hapus",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_tindakan_apelkes: id_tindakan_apelkes,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#tablemakan').DataTable().ajax.reload();
                            $('#outTotalHargamakan').DataTable().ajax.reload();
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

    function reload_data_makan(id_mcu) {
        $('#tablemakan').dataTable().fnClearTable();
        $('#tablemakan').dataTable().fnDestroy();
        $('#tablemakan').DataTable({
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
                "url": '<?php echo base_url('Tindakan_makan/tampil_list_tindakan'); ?>',
                "type": 'POST',
                "data": {
                    id: id_mcu
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

    function reload_total_harga_makan(id_pelayanan) {
        $('#outTotalHargamakan').dataTable().fnClearTable();
        $('#outTotalHargamakan').dataTable().fnDestroy();
        $('#outTotalHargamakan').DataTable({
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
                "url": '<?php echo base_url('Tindakan_makan/tampil_total_harga'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pelayanan
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
=======
<!-- modal edit data -->
<div class="modal fade bs-example-modal-lg" id="modal_makan" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO TINDAKAN MAKAN
                </h5>
            </div>

            <div class="modal-body">

                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">NAMA TINDAKAN</label>
                                    <div class="col-md-9 has-success">

                                        <select class="form-control filled-input select2" disabled placeholder="PILIH TINDAKAN" style="border: 1px solid lightgreen;" id="inTindakanMakan" name="inTindakanMakan" onchange="pilihTindakanMakan()">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                    <div class="col-md-9 has-error">
                                        <input type="number" class="form-control" id="inHargaMakan" name="inHargaMakan">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                    <div class="col-md-9 has-error">
                                        <input type="number" class="form-control" id="inFrekmakan" name="inFrekmakan" value="1" oninput="pilihTindakanMakan()">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div> -->
                            <input type="hidden" class="form-control" value=1 name="inFrekMakan" disabled id="inFrekMakan">

                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">TOTAL HARGA</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control " disabled id="outTotalKia">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-md-6" id="pembayaran_transport">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">PEMBAYARAN</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inPembayaranTransport" id="inPembayaranTransport">
                                            <option value="ditanggung" >DITANGGUNG ASURANSI</option>
                                            <option value="tidak" selected>TIDAK DITANGGUNG ASURANSI</option>

                                        </select>
                                    </div>
                                </div>
                            </div> -->
                            <input type="hidden" class="form-control" disabled id="id_pel_makan">
                            <input type="hidden" class="form-control" disabled id="id_his_makan">
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="insert_tindakan_makan()" class="btn btn-success btn-anim  btn-sm mr-20"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
            </div>
            <div class="modal-body mt-30">
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                <hr width="95%">
                <div class="table-wrap" style="width: 95%; margin: auto ">
                    <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tablemakan">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>HAPUS</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>TOTAL BIAYA</th>
                                    <th>TANGGAL</th>
                                    <th>NAMA STAFF</th>
                                </tr>
                            </thead>
                            <tbody style="color: black">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                </div>
                <div class="col-md-4 pull-right mt-20">
                    <div class="table-wrap" style="width: 85%; margin-bottom:40px;">
                        <div class="table-responsive ">
                            <table class="table table-hover display " id="outTotalHargamakan">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="font-weight:bold;">Total Keseluruhan</th>
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
</div>

<script type="text/javascript">
    $(document).ready(function() {




    });

    function edit_makan(id_pelayanan, id_history) {
        $.ajax({
            url: "<?php echo base_url(); ?>Tindakan_makan/getListMakan",
            method: "GET",
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {

                    html += '<option value=' + data[i].id_list_tindakan_apelkes+ '>' + data[i].nama + '</option>';
                }
                $('#inTindakanMakan').html(html);
            }
        });
        // $.ajax({
        //     url: "<?= base_url() . 'Poli/getdata' ?>",
        //     data: {
        //         id_pelayanan: id_pelayanan,
        //     },
        //     type: 'POST',
        //     dataType: 'json',
        //     success: function(data) {
        //         if (data.status_dt == "found") {
        //             if (data.data.cara_bayar == '30') {
        //                 $('#pembayaran_transport').collapse('show');
        //             } else {
        //                 $('#pembayaran_transport').collapse('hide');

        //             }
        //         } else {
        //             swal({
        //                 title: "Gagal!",
        //                 type: "warning",
        //                 text: "Maaf, Data tidak ditemukan",
        //                 confirmButtonColor: "#3cb878",
        //             });
        //         }
        //     }
        // });
        $("#id_pel_makan").val(id_pelayanan);
        $("#id_his_makan").val(id_history);
        $("#modal_makan").modal('show');
        reload_data_makan(id_pelayanan);
        reload_total_harga_makan(id_pelayanan);

    }

    /* function pilihTindakanMakan() {
        a = $("#inTindakanMakan").val();
        splitDiag = a.split("|");
        // alert(splitDiag[1]);

        hargaSarana = parseFloat(splitDiag[1]);
        hargaJasa = parseFloat(splitDiag[2]);
        harga = hargaSarana + hargaJasa;
        $("#inHargaMakan").val(convertToRupiah(harga));
        frek = $("#inFrekmakan").val();
         document.getElementById("outTotalmakan").value = convertToRupiah(harga * frek); 
    } */

    function insert_tindakan_makan() {
        a = $("#inTindakanMakan").val();
        splitDiag = a.split("|");
        harga = $("#inHargaMakan").val();
        frek = 1;
        total = harga * frek;
        id_pel_rad = $('#id_pel_makan').val();
        id_his_rad = $('#id_his_makan').val();
        // status_pembayaran = $('#inPembayaranTransport').val();

        dataString = 'harga=' + harga +
            '&id_pel_rad=' + id_pel_rad + '&id_his_rad=' + id_his_rad + '&id_list_tindakan=' + splitDiag[0] +
            '&frek=' + frek + '&total=' + total ;
        $.ajax({
            url: "<?= base_url() . 'Tindakan_makan/insert' ?>",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });
                    $('#outTotalmakan').val('');
                    $('#inFrekmakan').val('1');
                    $('#inHargaMakan').val('');
                    // $('#inPembayaranTransport').val('ditanggung').change();
                    $('#tablemakan').DataTable().ajax.reload();
                    $('#outTotalHargamakan').DataTable().ajax.reload();
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

    function hapus_makan(id_tindakan_apelkes, id_pelayanan,nama) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data "+nama+" ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Tindakan_makan/hapus",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_tindakan_apelkes: id_tindakan_apelkes,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#tablemakan').DataTable().ajax.reload();
                            $('#outTotalHargamakan').DataTable().ajax.reload();
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

    function reload_data_makan(id_mcu) {
        $('#tablemakan').dataTable().fnClearTable();
        $('#tablemakan').dataTable().fnDestroy();
        $('#tablemakan').DataTable({
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
                "url": '<?php echo base_url('Tindakan_makan/tampil_list_tindakan'); ?>',
                "type": 'POST',
                "data": {
                    id: id_mcu
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

    function reload_total_harga_makan(id_pelayanan) {
        $('#outTotalHargamakan').dataTable().fnClearTable();
        $('#outTotalHargamakan').dataTable().fnDestroy();
        $('#outTotalHargamakan').DataTable({
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
                "url": '<?php echo base_url('Tindakan_makan/tampil_total_harga'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pelayanan
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>