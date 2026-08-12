<<<<<<< HEAD
<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PELAYANAN TAMBAHAN</span></h6>
        </div>
        <div align="right">

            <div class="btn btn-primary btn-anim btn-sm " onclick="tambahPermintaan()"><i class="icon-rocket"></i><span class="btn-text">TAMBAH FORM PERMINTAAN</span></div>
            <div class="btn btn-success btn-anim btn-sm " onclick="tambah_master()"><i class="icon-rocket"></i><span class="btn-text">TAMBAH MASTER</span></div>

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
                                <tr>
                                    <th>NO</th>
                                    <th>TINDAKAN</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL</th>
                                    <th>HAPUS</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="bg-success">
                                <tr>
                                    <th>NO</th>
                                    <th>TINDAKAN</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL</th>
                                    <th>HAPUS</th>
                                </tr>
                            </tfoot>
                        </table>
                        <span id="hasil"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_tambah" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> PELAYANAN TAMBAHAN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>PELAYANAN TAMBAHAN</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control rounded-input" autocomplete="off" placeholder="NAMA" id="inNama">

                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>
                        <div class="form-actions mt-10">
                            <div class="form-actions mt-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn btn-success btn-rounded mr-10" onclick="insert()">Submit</button>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
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
</div>

<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_tambah_master" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TAMBAH MASTER TINDAKAN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>MASTER TINDAKAN</h6>
                            <hr>
                            <form id="master">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control rounded-input" autocomplete="off" placeholder="NAMA" id="nama_master">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">HARGA</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control rounded-input" autocomplete="off" placeholder="HARGA" id="harga_master">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">HARGA COST</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control rounded-input" autocomplete="off" placeholder="HARGA COST" id="harga_cost_master">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">TIPE</label>
                                            <div class="col-md-9">
                                                <select class="form-control filled-input rounded-input select2" id="tipe_master">
                                                    <option value="-">-</option>
                                                    <?php
                                                    $tipe = $this->db->query('SELECT DISTINCT tipe from list_tindakan_umum')->result_array();
                                                    foreach ($tipe as $row) {

                                                    ?>
                                                        <option value="<?php echo $row["tipe"]; ?>"><?php echo strtoupper($row["tipe"]); ?></option>
                                                    <?php }  ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>

                        </div>
                        <div class="form-actions mt-10">
                            <div class="form-actions mt-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn btn-success btn-rounded mr-10" onclick="insert_master()">Submit</button>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
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
</div>

<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_tindakan" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> PELAYANAN TAMBAHAN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO TINDAKAN</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA TINDAKAN</label>
                                        <div class="col-md-9" onchange="pilihTindakan()">

                                            <select class="form-control filled-input rounded-input select2" id="inTindakan">
                                                <option value="-">-</option>
                                                <?php

                                                foreach ($pelayanan as $row) {

                                                ?>
                                                    <option value="<?php echo $row["id_list_tindakan"] . "|" . $row['harga'] . "|" . $row['tipe']; ?>"><?php echo $row["nama"]; ?></option>
                                                <?php }  ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control rounded-input" id="inJumlah" placeholder="jumlah" oninput="hargaTotal()">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control rounded-input" oninput="hargaTotal1()" id="outBiayaTindakan">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">TOTAL HARGA</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control rounded-input" disabled="" id="outTotal">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions mt-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <input type="hidden" id="inPel">
                                            <div type="submit" class="btn btn-success btn-rounded mr-10" onclick="insertTindakan()">Submit</div>

                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body mt-30">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                        <hr width="95%">
                        <div class="table-wrap" style="width: 100%; margin: auto ">
                            <div class="table-responsive">
                                <table class="table table-hover display  pb-60" id="tabletindakan">
                                    <thead>
                                        <tr class="bg-success">
                                            <th>NAMA TINDAKAN</th>
                                            <th>BIAYA TINDAKAN </th>
                                            <th>JUMLAH TINDAKAN</th>
                                            <th>TOTAL BIAYA</th>
                                            <th>HAPUS</th>
                                        </tr>
                                    </thead>
                                    <tbody style="color: black">
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3" style="text-align:right; font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;">Total:</th>
                                            <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <center>
                            <div style="margin-top: 20px; " type="submit" class="btn btn-success btn-rounded mr-10" onclick="cetak()">CETAK</div>
                        </center>

                    </div>
                </div>
            </div>
            <!-- /Row -->
        </div>
        <!-- /formbody -->
    </div>
</div>

</div>
</div>

<style>
    td {
        color: black;
    }
</style>



<script type="text/javascript">
    function cetak() {
        id_pelayanan = $('#inPel').val();
        window.location.href = '<?php echo base_url() ?>Kasir/print_tambahan/' + id_pelayanan;
    }

    function tambahPermintaan() {
        $("#modal_tambah").modal('show');
    }

    function tambah_master() {
        $("#modal_tambah_master").modal('show');
    }

    function tampilTindakanFarmasi(id_pelayanan) {
        $("#inPel").val(id_pelayanan);
        reload_data_tindakan(id_pelayanan)
        $("#modal_tindakan").modal('show');
    }

    function pilihTindakan() {
        a = $("#inTindakan").val();
        splitDiag = a.split("|");
        // alert(splitDiag[1]);

        harga = parseFloat(splitDiag[1]);
        $("#outBiayaTindakan").val((harga));
        document.getElementById("inJumlah").value = "1";
        document.getElementById("outTotal").value = convertToRupiah(harga);
    }

    function hargaTotal() {
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlah").val());
        total = harga * frek;


        $("#outTotal").val(convertToRupiah(total));

    }

    function hargaTotal1() {
        harga = parseFloat($("#outBiayaTindakan").val());
        frek = parseFloat($("#inJumlah").val());
        total = harga * frek;


        $("#outTotal").val(convertToRupiah(total));

    }

    function insert() {
        nama = $('#inNama').val();
        $.ajax({
            url: "<?= base_url() . 'Kasir/insert_pelayanan' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                nama: nama,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });

                    $("#inNama").val('');
                    $("#modal_tambah").modal('hide');
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

    function insert_master() {
        nama = $('#nama_master').val();
        harga = $('#harga_master').val();
        harga_cost = $('#harga_cost_master').val();
        tipe = $('#tipe_master').val();
        $.ajax({
            url: "<?= base_url() . 'Kasir/insert_master' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                nama: nama,
                harga: harga,
                harga_cost: harga_cost,
                tipe: tipe,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });

                    $("#master")[0].reset();
                    $("#modal_tambah_master").modal('hide');
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

    function insertTindakan() {
        a = $("#inTindakan").val();
        splitDiag = a.split("|");
        id_tindakan = splitDiag[0];
        harga = parseFloat($("#outBiayaTindakan").val());
        frek = parseFloat($("#inJumlah").val());
        total = harga * frek;

        idPelayanan = $("#inPel").val();
        $.ajax({
            url: "<?= base_url() . 'Kasir/insert_tindakan_pelayanan' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                harga: harga,
                frek: frek,
                total: total,
                idPelayanan: idPelayanan,
                id_tindakan: id_tindakan,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });

                    $("#inTindakan").val('-').change();
                    $("#outBiayaTindakan").val('');
                    $("#inJumlah").val('');
                    $("#outTotal").val('');
                    $('#tabletindakan').DataTable().ajax.reload();
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

    function hapus(id_pelayanan) {
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
                    url: "<?php echo base_url() ?>Kasir/hapus_pelayanan",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_pelayanan: id_pelayanan,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $('#datable').DataTable().ajax.reload();
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

    function hapus_list(id_pelayanan) {
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
                    url: "<?php echo base_url() ?>Kasir/hapus_list_pelayanan",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_pelayanan: id_pelayanan,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $('#tabletindakan').DataTable().ajax.reload();
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

    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp.' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    function reload_data_tindakan(id_pelayanan) {
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
                "url": '<?php echo base_url('Kasir/tampil_list_pelayanan'); ?>',
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
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total over this page
                pageTotal = api
                    .column(3, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(3).footer()).html(
                    convertToRupiah(pageTotal)
                );

            },
        });
    }
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
            "ajax": '<?php echo base_url('Kasir/tampil_pelayanan_tambahan'); ?>',
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
            "ajax": '<?php echo base_url('Kasir/tampil_pelayanan_tambahan'); ?>',
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
                "url": '<?= base_url('Kasir/selectRangePelayananTambahan'); ?>',
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
=======
<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PELAYANAN TAMBAHAN</span></h6>
        </div>
        <div align="right">

            <div class="btn btn-primary btn-anim btn-sm " onclick="tambahPermintaan()"><i class="icon-rocket"></i><span class="btn-text">TAMBAH FORM PERMINTAAN</span></div>
            <div class="btn btn-success btn-anim btn-sm " onclick="tambah_master()"><i class="icon-rocket"></i><span class="btn-text">TAMBAH MASTER</span></div>

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
                                <tr>
                                    <th>NO</th>
                                    <th>TINDAKAN</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL</th>
                                    <th>HAPUS</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="bg-success">
                                <tr>
                                    <th>NO</th>
                                    <th>TINDAKAN</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL</th>
                                    <th>HAPUS</th>
                                </tr>
                            </tfoot>
                        </table>
                        <span id="hasil"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_tambah" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> PELAYANAN TAMBAHAN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>PELAYANAN TAMBAHAN</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control rounded-input" autocomplete="off" placeholder="NAMA" id="inNama">

                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>
                        <div class="form-actions mt-10">
                            <div class="form-actions mt-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn btn-success btn-rounded mr-10" onclick="insert()">Submit</button>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
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
</div>

<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_tambah_master" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TAMBAH MASTER TINDAKAN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>MASTER TINDAKAN</h6>
                            <hr>
                            <form id="master">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control rounded-input" autocomplete="off" placeholder="NAMA" id="nama_master">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">HARGA</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control rounded-input" autocomplete="off" placeholder="HARGA" id="harga_master">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">HARGA COST</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control rounded-input" autocomplete="off" placeholder="HARGA COST" id="harga_cost_master">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">TIPE</label>
                                            <div class="col-md-9">
                                                <select class="form-control filled-input rounded-input select2" id="tipe_master">
                                                    <option value="-">-</option>
                                                    <?php
                                                    $tipe = $this->db->query('SELECT DISTINCT tipe from list_tindakan_umum')->result_array();
                                                    foreach ($tipe as $row) {

                                                    ?>
                                                        <option value="<?php echo $row["tipe"]; ?>"><?php echo strtoupper($row["tipe"]); ?></option>
                                                    <?php }  ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>

                        </div>
                        <div class="form-actions mt-10">
                            <div class="form-actions mt-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn btn-success btn-rounded mr-10" onclick="insert_master()">Submit</button>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
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
</div>

<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_tindakan" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> PELAYANAN TAMBAHAN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO TINDAKAN</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA TINDAKAN</label>
                                        <div class="col-md-9" onchange="pilihTindakan()">

                                            <select class="form-control filled-input rounded-input select2" id="inTindakan">
                                                <option value="-">-</option>
                                                <?php

                                                foreach ($pelayanan as $row) {

                                                ?>
                                                    <option value="<?php echo $row["id_list_tindakan"] . "|" . $row['harga'] . "|" . $row['tipe']; ?>"><?php echo $row["nama"]; ?></option>
                                                <?php }  ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control rounded-input" id="inJumlah" placeholder="jumlah" oninput="hargaTotal()">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control rounded-input" oninput="hargaTotal1()" id="outBiayaTindakan">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">TOTAL HARGA</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control rounded-input" disabled="" id="outTotal">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions mt-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <input type="hidden" id="inPel">
                                            <div type="submit" class="btn btn-success btn-rounded mr-10" onclick="insertTindakan()">Submit</div>

                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body mt-30">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                        <hr width="95%">
                        <div class="table-wrap" style="width: 100%; margin: auto ">
                            <div class="table-responsive">
                                <table class="table table-hover display  pb-60" id="tabletindakan">
                                    <thead>
                                        <tr class="bg-success">
                                            <th>NAMA TINDAKAN</th>
                                            <th>BIAYA TINDAKAN </th>
                                            <th>JUMLAH TINDAKAN</th>
                                            <th>TOTAL BIAYA</th>
                                            <th>HAPUS</th>
                                        </tr>
                                    </thead>
                                    <tbody style="color: black">
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3" style="text-align:right; font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;">Total:</th>
                                            <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <center>
                            <div style="margin-top: 20px; " type="submit" class="btn btn-success btn-rounded mr-10" onclick="cetak()">CETAK</div>
                        </center>

                    </div>
                </div>
            </div>
            <!-- /Row -->
        </div>
        <!-- /formbody -->
    </div>
</div>

</div>
</div>

<style>
    td {
        color: black;
    }
</style>



<script type="text/javascript">
    function cetak() {
        id_pelayanan = $('#inPel').val();
        window.location.href = '<?php echo base_url() ?>Kasir/print_tambahan/' + id_pelayanan;
    }

    function tambahPermintaan() {
        $("#modal_tambah").modal('show');
    }

    function tambah_master() {
        $("#modal_tambah_master").modal('show');
    }

    function tampilTindakanFarmasi(id_pelayanan) {
        $("#inPel").val(id_pelayanan);
        reload_data_tindakan(id_pelayanan)
        $("#modal_tindakan").modal('show');
    }

    function pilihTindakan() {
        a = $("#inTindakan").val();
        splitDiag = a.split("|");
        // alert(splitDiag[1]);

        harga = parseFloat(splitDiag[1]);
        $("#outBiayaTindakan").val((harga));
        document.getElementById("inJumlah").value = "1";
        document.getElementById("outTotal").value = convertToRupiah(harga);
    }

    function hargaTotal() {
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlah").val());
        total = harga * frek;


        $("#outTotal").val(convertToRupiah(total));

    }

    function hargaTotal1() {
        harga = parseFloat($("#outBiayaTindakan").val());
        frek = parseFloat($("#inJumlah").val());
        total = harga * frek;


        $("#outTotal").val(convertToRupiah(total));

    }

    function insert() {
        nama = $('#inNama').val();
        $.ajax({
            url: "<?= base_url() . 'Kasir/insert_pelayanan' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                nama: nama,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });

                    $("#inNama").val('');
                    $("#modal_tambah").modal('hide');
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

    function insert_master() {
        nama = $('#nama_master').val();
        harga = $('#harga_master').val();
        harga_cost = $('#harga_cost_master').val();
        tipe = $('#tipe_master').val();
        $.ajax({
            url: "<?= base_url() . 'Kasir/insert_master' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                nama: nama,
                harga: harga,
                harga_cost: harga_cost,
                tipe: tipe,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });

                    $("#master")[0].reset();
                    $("#modal_tambah_master").modal('hide');
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

    function insertTindakan() {
        a = $("#inTindakan").val();
        splitDiag = a.split("|");
        id_tindakan = splitDiag[0];
        harga = parseFloat($("#outBiayaTindakan").val());
        frek = parseFloat($("#inJumlah").val());
        total = harga * frek;

        idPelayanan = $("#inPel").val();
        $.ajax({
            url: "<?= base_url() . 'Kasir/insert_tindakan_pelayanan' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                harga: harga,
                frek: frek,
                total: total,
                idPelayanan: idPelayanan,
                id_tindakan: id_tindakan,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });

                    $("#inTindakan").val('-').change();
                    $("#outBiayaTindakan").val('');
                    $("#inJumlah").val('');
                    $("#outTotal").val('');
                    $('#tabletindakan').DataTable().ajax.reload();
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

    function hapus(id_pelayanan) {
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
                    url: "<?php echo base_url() ?>Kasir/hapus_pelayanan",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_pelayanan: id_pelayanan,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $('#datable').DataTable().ajax.reload();
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

    function hapus_list(id_pelayanan) {
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
                    url: "<?php echo base_url() ?>Kasir/hapus_list_pelayanan",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_pelayanan: id_pelayanan,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $('#tabletindakan').DataTable().ajax.reload();
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

    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp.' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    function reload_data_tindakan(id_pelayanan) {
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
                "url": '<?php echo base_url('Kasir/tampil_list_pelayanan'); ?>',
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
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total over this page
                pageTotal = api
                    .column(3, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(3).footer()).html(
                    convertToRupiah(pageTotal)
                );

            },
        });
    }
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
            "ajax": '<?php echo base_url('Kasir/tampil_pelayanan_tambahan'); ?>',
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
            "ajax": '<?php echo base_url('Kasir/tampil_pelayanan_tambahan'); ?>',
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
                "url": '<?= base_url('Kasir/selectRangePelayananTambahan'); ?>',
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>