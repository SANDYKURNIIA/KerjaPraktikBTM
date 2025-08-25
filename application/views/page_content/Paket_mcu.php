<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">PAKET MCU</span></h6>
        </div>



        <div class="clearfix"></div>
    </div>

    <div align="right">
        <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" onclick="show_tambah()"><i class="icon-plus"></i><span class="btn-text">TAMBAH PAKET</span>
        </button>
    </div>

    <div align="right" class="col-md-12 has-error">
        <label for="tanggal_masuk1" class="col-sm-2 control-label">
            <p>&nbsp;</p>
        </label>
    </div>

    <div class="panel-wrapper collapse in">
        <div class="panel-body">
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
                                    <th>NAMA PAKET</th>
                                    <th>HARGA PAKET</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tfoot class="bg-success">
                                <th>NO</th>
                                <th>EDIT</th>
                                <th>HAPUS</th>
                                <th>NAMA PAKET</th>
                                <th>HARGA PAKET</th>
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
                                        <label class="control-label col-md-3">NAMA PAKET</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="NAMA PAKET" id="upTindakan" name="nama"></input>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div id="form_tindakan" style="display: block;">
                            <div class="form-body mt-20">
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">MASTER TINDAKAN</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="pilihMaster">
                                                    <option value="list_tindakan_mcu">MCU</option>
                                                    <option value="list_tindakan_labor">LABORATORIUM</option>
                                                    <option value="list_tindakan_radiologi_mcu">RADIOLOGI</option>
                                                </select>
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">NAMA TINDAKAN</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" onchange="tampilStok()" id="inTindakan">

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">HARGA</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control " placeholder="" disabled id="inHarga" value="0">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="form-actions mt-10">
                                <input type="hidden" class="form-control " placeholder="" id="inId" value="<?= uniqid() ?>">

                                <button onclick="insertStok()" class="btn btn-success btn-anim  btn-sm" style="margin-left: 120px;" type="button"><i class="icon-rocket"></i><span class="btn-text">TAMBAH</span></button>

                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table id="datableracikan" class="table table-hover display  pb-30">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>NAMA TINDAKAN</th>
                                                        <th>HARGA</th>
                                                        <th>HAPUS</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="color: black" id="show_data">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">TOTAL</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control " placeholder="" id="total" readonly>
                                                <input type="hidden" class="form-control " placeholder="" id="inTotal" value="0" readonly>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-actions mt-10">

                                <button onclick="insertPaket()" class="btn btn-primary btn-anim " style="margin-left: 120px;" type="button"><i class="icon-rocket"></i><span class="btn-text">SIMPAN PAKET</span></button>

                            </div>
                        </div>
                        <!-- End -->
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>

</div>
<!--akhir modal yang akan dipakai-->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->

        <div class="modal fade " id="modal_edit_mcu" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>EDIT PAKET</p>
                        <p><i class="icon-people mr-10"></i>INPUT TINDAKAN</p>

                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->

                        <div class="form-body mt-20">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NAMA PAKET</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="NAMA PAKET" id="upNama" name="nama" readonly></input>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div id="form_tindakan" style="display: block;">
                            <div class="form-body mt-20">
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">MASTER TINDAKAN</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="upMaster">
                                                    <option value="list_tindakan_mcu">MCU</option>
                                                    <option value="list_tindakan_labor_mcu">LABORATORIUM</option>
                                                    <option value="list_tindakan_radiologi_mcu">RADIOLOGI</option>
                                                </select>
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">NAMA TINDAKAN</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" onchange="tampilStok1()" id="upTindk">

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">HARGA</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control " placeholder="" disabled id="upHarga" value="0">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="form-actions mt-10">
                                <input type="hidden" class="form-control " placeholder="" id="upId">

                                <button onclick="updateTindakan()" class="btn btn-success btn-anim  btn-sm" style="margin-left: 120px;" type="button"><i class="icon-rocket"></i><span class="btn-text">Tambah</span></button>

                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table id="datableracikan1" class="table table-hover display  pb-30">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>NAMA TINDAKAN</th>
                                                        <th>HARGA</th>
                                                        <th>HAPUS</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="color: black" id="show_data1">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                        </div>
                                        <div class="col-md-4 pull-right mt-20">

                                            <div class="table-wrap" style="width: 85%; margin-bottom:40px;">
                                                <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->
                                                <div class="table-responsive ">
                                                    <table class="table table-hover display " id="outTotalHargaPaket">
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
                        <!-- End -->
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>

</div>

<script type="text/javascript">
    function show_tambah() {
        $('#pilihMaster').val('list_tindakan_mcu').change();
        $('.modal-pendaftaranakun').modal('toggle');

    }
    $(document).ready(function() {
        $('#pilihMaster').change(function() {

            var depo = $('#pilihMaster').val();
            if (depo != '-') {
                $.ajax({
                    url: "<?php echo base_url(); ?>Data_mcu/getNamaTindakan",
                    method: "POST",
                    data: {
                        depo: depo
                    },
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html = '<option value="">-</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i].id_daftar_tindakan + '|' + data[i].harga + '|' + data[i].nama + '">' + data[i].nama + '</option>';
                        }
                        $('#inTindakan').html(html);
                    }
                });
            } else {
                $('#inTindakan').html('<option value="">-</option>');
            }
        });
        $('#upMaster').change(function() {

            var depo = $('#upMaster').val();
            if (depo != '-') {
                $.ajax({
                    url: "<?php echo base_url(); ?>Data_mcu/getNamaTindakan",
                    method: "POST",
                    data: {
                        depo: depo
                    },
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html = '<option value="">-</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i].id_daftar_tindakan + '|' + data[i].harga + '|' + data[i].nama + '">' + data[i].nama + '</option>';
                        }
                        $('#upTindk').html(html);
                    }
                });
            } else {
                $('#upTindk').html('<option value="">-</option>');
            }
        });

    });

    function tampilStok() {
        a = $("#inTindakan").val();
        splitDiag = a.split("|");
        idBarang = splitDiag[0];
        harga = splitDiag[1];
        $("#inHarga").val(harga);
    }

    function tampilStok1() {
        a = $("#upTindk").val();
        splitDiag = a.split("|");
        idBarang = splitDiag[0];
        harga = splitDiag[1];
        $("#upHarga").val(harga);
    }
</script>
<script type="text/javascript">
    function insertPaket() {
        upTindakan = $('#upTindakan').val();
        harga = $('#inTotal').val();
        id = $('#inId').val();

        $.ajax({
            url: "<?= base_url() . 'Mcu/insert_paket' ?>",
            method: "POST",
            dataType: 'json',
            cache: true,
            data: {
                id: id,
                upTindakan: upTindakan,
                harga: harga,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "Good Job!",
                        type: "success",
                        text: "Data " + upTindakan + " berhasil ditambahkan",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#pilihMaster').val('list_tindakan_mcu').change();
                    $('.modal-pendaftaranakun').modal('hide');
                    $('#datable').DataTable().ajax.reload();
                    location.reload();

                    // $('#form_tindakan').show();

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

    function insertStok() {

        depo = $("#pilihMaster").val();
        a = $("#inTindakan").val();
        splitDiag = a.split("|");
        idLogistik = splitDiag[0];
        nama = splitDiag[2];
        harga = parseFloat(splitDiag[1]);

        var uid = (new Date().getTime()).toString(36);
        // var ID = Math.random().toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50) + uid;
        id = $("#inId").val();
        dataString =
            'id_list_tindakan=' + idLogistik + '&nama=' + nama +
            '&id=' + id + '&tipe=' + depo + '&harga=' + harga;
        // 		  alert(dataString);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Data_mcu/insertDetail",
            data: dataString,
            dataType: "json",
            success: function(data) {
                // $('#form_obat')[0].reset();
                if (data.status == "success") {
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });
                    $("#pilihMaster").val('list_tindakan_mcu').change();
                    reload_racikan(id);
                } else {
                    alert('tidak bisa insert');
                }
            }
        })
    }

    function edit_tindakan_mcu(id_paket, nama) {
        reload_racikan1(id_paket);
        reload_total_paket(id_paket);
        $("#upNama").val(nama);
        $("#upId").val(id_paket);
        $('#upMaster').val('list_tindakan_mcu').change();

        $("#modal_edit_mcu").modal('show');

    }


    function updateTindakan() {
        id = $("#upId").val();
        depo = $("#upMaster").val();
        a = $("#upTindk").val();
        splitDiag = a.split("|");
        idLogistik = splitDiag[0];
        nama = splitDiag[2];
        harga = parseFloat(splitDiag[1]);

        dataString =
            'id_list_tindakan=' + idLogistik + '&nama=' + nama +
            '&id=' + id + '&tipe=' + depo + '&harga=' + harga;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Data_mcu/insertDetail",
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
                    $("#upMaster").val('list_tindakan_mcu').change();
                    reload_racikan1(id);
                    reload_total_paket(id);
                } else {
                    alert('tidak bisa insert');
                }

            }
        })
    }

    function hapus_paket(id, nama) {

        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + nama + " ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url(); ?>Mcu/hapus_paket",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        //alert(data);
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Paket " + nama + " berhasil dihapus",
                            confirmButtonColor: "#3cb878",
                        });
                        $('#datable').DataTable().ajax.reload();

                    }
                });
            });
        });
        return false;
    }
</script>

<script type="text/javascript">
    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    function reload_racikan(id) {

        stok = $('#inStokAsli').val();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url('Data_mcu/tampil_list_paket'); ?>',
            async: false,
            dataType: 'json',
            data: {
                id: id,
            },
            success: function(data) {
                var html = '';
                var sum = 0;
                var frek = 0;
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td>' + Number(i + 1) + '</td>' +
                        '<td>' + data[i].nama + '</td>' +
                        '<td>' + convertToRupiah(data[i].harga) + '</td>' +
                        '<td><button class="btn btn-danger btn-icon-anim btn-square delete" type="button" name="delete" id="' + data[i].id_detail_paket + '" ><i class="fa fa-trash"></i></button></td>' +
                        '</tr>';

                    sum = Number(sum) + Number(data[i].harga);
                }
                $('#show_data').html(html);
                $('#total').val(convertToRupiah(sum));
                $('#inTotal').val(sum);
            }

        });

    }

    function reload_racikan1(id) {
        $('#datableracikan1').dataTable().fnClearTable();
        $('#datableracikan1').dataTable().fnDestroy();
        $('#datableracikan1').DataTable({
            "pageLength": 5,
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
                "url": '<?php echo base_url('Data_mcu/tampil_list_paket1'); ?>',
                "type": 'POST',
                "data": {
                    id: id
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

    $(document).ready(function() {
        $(document).on('click', '.delete', function() {
            var user_id = $(this).attr("id");
            var id = $('#id').val();
            var upId = $('#upId').val();
            swal({
                title: "Apakah kamu yakin?",
                text: "Menghapus data ini?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3cb878",
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal",
                closeOnConfirm: false
            }, function() {
                $().ready(function() {
                    $.ajax({
                        url: "<?php echo base_url(); ?>Data_mcu/hapus_list",
                        method: "POST",
                        data: {
                            id: user_id,
                            id_paket: id,
                            id_paket1: upId,
                        },
                        success: function(data) {
                            //alert(data);
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            reload_racikan(id);
                            reload_racikan1(upId);
                            reload_total_paket(upId);
                            //$('#modal_tambahstok').modal('show');
                            // } else {
                            //     swal({
                            //         title: "Gagal!",
                            //         type: "warning",
                            //         text: data.status,
                            //         confirmButtonColor: "#3cb878",
                            //     });
                            // }
                        }
                    });
                });
            });
            return false;
        });
    });
    function reload_total_paket(id_paket) {
        $('#outTotalHargaPaket').dataTable().fnClearTable();
        $('#outTotalHargaPaket').dataTable().fnDestroy();
        $('#outTotalHargaPaket').DataTable({
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
                "url": '<?php echo base_url('Mcu/tampil_total_paket'); ?>',
                "type": 'POST',
                "data": {
                    id_paket: id_paket
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
            "ajax": '<?php echo base_url('mcu/tampil_paket_mcu'); ?>',
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