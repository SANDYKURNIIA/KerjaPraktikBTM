<<<<<<< HEAD
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">LAPORAN DP</span></h6>
        </div>

        <div class="clearfix"></div>
        <div class="row mt-30">
            <div class="col-md-12">
                <div class="col-md-3 mt-20 pl-5">
                    <button class="btn btn-primary btn-anim btn-md" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Mulai : </label>
                    <input type="date" autocomplete="off" id="inTglMulai" class="form-control" style="cursor:pointer">
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Akhir : </label>
                    <input type="date" autocomplete="off" id="inTglAkhir" class="form-control" style="cursor:pointer">
                </div>
                <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
                </div>
            </div>
        </div>
    </div>
    <!--button-->


    <!--button-->

    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">

                <div class="table-responsive">
                    <table class="table table-hover display  pb-30" id="datable">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>CETAK</th>
                                <th>PILIH</th>
                                <th>EDIT</th>
                                <th>HAPUS</th>
                                <th>TANGGAL INPUT</th>
                                <th>JAM INPUT</th>
                                <th>NO DP</th>
                                <th>NO DISTRIBUTOR</th>
                                <th>DISTRIBUTOR</th>
                                <th>NO DOKUMEN</th>
                                <th>NO FAKTUR DP</th>
                                <th>TANGGAL TERIMA</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>CETAK</th>
                                <th>PILIH</th>
                                <th>EDIT</th>
                                <th>HAPUS</th>
                                <th>TANGGAL INPUT</th>
                                <th>JAM INPUT</th>
                                <th>NO DP</th>
                                <th>NO DISTRIBUTOR</th>
                                <th>DISTRIBUTOR</th>
                                <th>NO DOKUMEN</th>
                                <th>NO FAKTUR DP</th>
                                <th>TANGGAL TERIMA</th>
                                <th>TOTAL</th>
                            </tr>
                        </tfoot>
                        <tbody style="color: black">
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modalDetailInvoice" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-notebook mr-10"></i> INFO INVOICE
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">DATA FAKTUR</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    
                                    <label class="control-label col-md-3">FAKTUR NOMOR</label>
                                    <div class="col-md-9 has-success">
                                        <input type="hidden" name="id_cetak" id="id_cetak">
                                        <input type="text" class="form-control " autocomplete="off"  name="nofaktur" id="nofaktur">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">NO DOKUMEN</label>
                                    <div class="col-md-9 has-success">
                                        <input type="text" class="form-control " autocomplete="off"  name="no_dokumen" id="no_dokumen" readonly>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">DATA DISTRIBUTOR</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">NO</label>
                                    <div class="col-md-9 has-success">
                                        <input type="text" class="form-control " autocomplete="off"  name="no" id="no" readonly>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">DEBET KEPADA</label>
                                    <div class="col-md-9 has-success">
                                        <input type="text" class="form-control " autocomplete="off"  name="distributor" id="distributor" readonly>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">NO INDEX</label>
                                    <div class="col-md-9 has-success">
                                        <input type="text" class="form-control " autocomplete="off"  name="no_index" id="no_index" readonly>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">TANGGAL DITERIMA</label>
                                    <div class="col-md-9 has-success">
                                        <input type="date" placeholder="TANGGAL TERIMA" id="tgl_terima" name="tgl_terima" class="form-control filled-input" autocomplete="off">
                                            <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">HARGA FAKTUR</label>
                                    <div class="col-md-9 has-success">
                                        <input type="number" class="form-control " autocomplete="off"  name="hargafaktur" id="hargafaktur" value="0">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">PPN (Rp)</label>
                                    <div class="col-md-9 has-success">
                                        <input type="number" class="form-control " autocomplete="off"  name="ppndp" id="ppndp" placeholder="0">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">BEA MATERAI + ONGKOS KIRIM</label>
                                    <div class="col-md-9 has-success">
                                        <input type="number" class="form-control " autocomplete="off"  name="beaongkir" id="beaongkir" value="0">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /formbody -->
                       
                        <div class="modal-footer">
                            <button type="submit" name="update" id="update" onclick="edit_dp()" class="btn btn-success btn-anim btn-sm"><i class="icon-printer"></i><span class="btn-text">UPDATE</span></button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="isiDataDP" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-notebook mr-10"></i> DETAIL DP
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">DATA FAKTUR</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NO FAKTUR</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" disabled="" id="nomor">
                                                <input type="hidden" class="form-control " autocomplete="off"  name="id_faktur" id="id_faktur">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NO DOKUMEN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control " autocomplete="off"  name="no_dokumen_isi" id="no_dokumen_isi" readonly="">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <!--done--> 
                            <div class="panel-wrapper collapse in">

                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="isiFaktur" class="table table-hover display  pb-30">
                                    <thead>
                                        <!-- <tr class="bg-success">
                                            <th>NO</th>
                                            <th>NAMA OBAT</th>
                                            <th>HARGA SATUAN</th>
                                            <th>JUMLAH OBAT</th>
                                            <th>TOTAL HARGA</th>
                                            <th>NO BATCH</th>
                                            <th>TANGGAL EXPIRED</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="bg-success">
                                        <th>NO</th>
                                        <th>NAMA OBAT</th>
                                        <th>HARGA SATUAN</th>
                                        <th>JUMLAH OBAT</th>
                                        <th>TOTAL HARGA</th>
                                        <th>NO BATCH</th>
                                        <th>TANGGAL EXPIRED</th>
                                        </tr>
                                    </tfoot> -->
                                    <tr class="bg-success">
                                        <th>NO FAKTUR</th>
                                        <th>KODE PBM IHC</th>
                                        <th>KETERAGAN</th>
                                        <th>DISTRIBUTOR</th>
                                        <th>NAMA BARANG</th>
                                        <th>NO BATCH</th>
                                        <th>PABRIK</th>
                                        <th>SATUAN</th>
                                        <th>GOLONGAN OBAT</th>
                                        <th>PP</th>
                                        <th>TERIMA</th>
                                        <th>SISA</th>
                                        <th>HNA </th>
                                        <th>DISC NOMINAL </th>
                                        <th>DISC </th>
                                        <th>PPN </th>
                                        <th>TOTAL</th>
                                        <th>TGL TERIMA</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="bg-success">
                                        <th>NO FAKTUR</th>
                                        <th>KODE PBM IHC</th>
                                        <th>KETERAGAN</th>
                                        <th>DISTRIBUTOR</th>
                                        <th>NAMA BARANG</th>
                                        <th>NO BATCH</th>
                                        <th>PABRIK</th>
                                        <th>SATUAN</th>
                                        <th>GOLONGAN OBAT</th>
                                        <th>PP</th>
                                        <th>TERIMA</th>
                                        <th>SISA</th>
                                        <th>HNA </th>
                                        <th>DISC NOMINAL </th>
                                        <th>DISC </th>
                                        <th>PPN </th>
                                        <th>TOTAL</th>
                                        <th>TGL TERIMA</th>
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
    </div>
</div>

<script>
$(document).ready(function() {

        table = $('#datable').DataTable({
            "retrieve": true,
            "dom": 'Bfrtip',
            "buttons": ['csv', 'excel', 'pdf'],
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entries",
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
                "url": "<?php echo base_url('Logistik_farmasi/tampil_laporan_dp'); ?>",
                "type": "POST",
                "data": function(data) {



                }
            },
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
            "ajax": '<?php echo base_url('Logistik_farmasi/tampil_laporan_dp'); ?>',
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
                "url": '<?= base_url('Logistik_farmasi/tampil_laporan_dp'); ?>',
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

    function edit_cetak_dp(id_cetak, faktur_nomor_dp, no_dokumen, no_distributor, distributor, total, ppn)
    {
        $("#modalDetailInvoice").modal('show');
        $("#id_cetak").val(id_cetak);
        $("#nofaktur").val(faktur_nomor_dp);
        $("#no_dokumen").val(no_dokumen);
        $("#no").val(no_distributor);
        $("#distributor").val(distributor);
        $("#hargafaktur").val(total);
        $("#ppndp").val(ppn);
    }

    function edit_dp()
    {
        id_cetak = $("#id_cetak").val();
        no_dokumen = $("#no_dokumen").val();
        no = $("#no").val();
        distributor = $("#distributor").val();
        tgl_terima = $("#tgl_terima").val();
        nofaktur = $("#nofaktur").val();
        hargafaktur = $("#hargafaktur").val();
        ppn = $("#ppndp").val();
        beaongkir = $("#beaongkir").val();
        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Logistik_farmasi/updateDP",
                method: "POST",
                dataType: 'json',
                data: {
                    id_cetak: id_cetak,
                    no_dokumen: no_dokumen,
                    no_distributor: no,
                    distributor: distributor,
                    tgl_terima: tgl_terima,
                    nofaktur: nofaktur,
                    ppn: ppn,
                    hargafaktur: hargafaktur,
                    beaongkir: beaongkir
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "DP " + no_dokumen + " Berhasil di UPDATE",
                            confirmButtonColor: "#3cb878",
                        });
                        $("#id_cetak").val("");
                        $("#no_dokumen").val("");
                        $("#no").val("");
                        $("#distributor").val("");
                        $("#tgl_terima").val("");
                        $("#nofaktur").val("");
                        $("#hargafaktur").val(0);
                        $("#ppndp").val(0);
                        $("#beaongkir").val(0);
                        $("#modalDetailInvoice").modal('hide');
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
        return false;
    }

    function hapus(id_cetak,no_distributor) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + no_distributor + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Logistik_farmasi/delete_dp",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_cetak: id_cetak,
                        no_distributor: no_distributor
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

    function tampil_isi_dp(id_faktur, no_dokumen, no_faktur) {
        $("#id_faktur").val(id_faktur);
        $("#no_dokumen_isi").val(no_dokumen);
        $("#isiDataDP").modal('show');
        var str = $("#no_dokumen_isi").val() + "";
        no_index = str.substring(0, 4);
        $("#nomor").val(no_faktur);
        nomor = $("#nomor").val();

        reload_list_faktur(id_faktur, no_dokumen, nomor);
    }

    function reload_list_faktur(id_faktur, no_dokumen, nomor) {
                $('#isiFaktur').dataTable().fnClearTable();
                $('#isiFaktur').dataTable().fnDestroy();
                $('#isiFaktur').DataTable({
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
                        "url": '<?php echo base_url('Logistik_farmasi/tampil_isi_dp'); ?>',
                        "type": 'POST',
                        "data": {
                            id_faktur: id_faktur,
                            no_dokumen: no_dokumen,
                            nomor: nomor
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
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">LAPORAN DP</span></h6>
        </div>

        <div class="clearfix"></div>
        <div class="row mt-30">
            <div class="col-md-12">
                <div class="col-md-3 mt-20 pl-5">
                    <button class="btn btn-primary btn-anim btn-md" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Mulai : </label>
                    <input type="date" autocomplete="off" id="inTglMulai" class="form-control" style="cursor:pointer">
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Akhir : </label>
                    <input type="date" autocomplete="off" id="inTglAkhir" class="form-control" style="cursor:pointer">
                </div>
                <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
                </div>
            </div>
        </div>
    </div>
    <!--button-->


    <!--button-->

    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">

                <div class="table-responsive">
                    <table class="table table-hover display  pb-30" id="datable">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>CETAK</th>
                                <th>PILIH</th>
                                <th>EDIT</th>
                                <th>HAPUS</th>
                                <th>TANGGAL INPUT</th>
                                <th>JAM INPUT</th>
                                <th>NO DP</th>
                                <th>NO DISTRIBUTOR</th>
                                <th>DISTRIBUTOR</th>
                                <th>NO DOKUMEN</th>
                                <th>NO FAKTUR DP</th>
                                <th>TANGGAL TERIMA</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>CETAK</th>
                                <th>PILIH</th>
                                <th>EDIT</th>
                                <th>HAPUS</th>
                                <th>TANGGAL INPUT</th>
                                <th>JAM INPUT</th>
                                <th>NO DP</th>
                                <th>NO DISTRIBUTOR</th>
                                <th>DISTRIBUTOR</th>
                                <th>NO DOKUMEN</th>
                                <th>NO FAKTUR DP</th>
                                <th>TANGGAL TERIMA</th>
                                <th>TOTAL</th>
                            </tr>
                        </tfoot>
                        <tbody style="color: black">
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modalDetailInvoice" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-notebook mr-10"></i> INFO INVOICE
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">DATA FAKTUR</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    
                                    <label class="control-label col-md-3">FAKTUR NOMOR</label>
                                    <div class="col-md-9 has-success">
                                        <input type="hidden" name="id_cetak" id="id_cetak">
                                        <input type="text" class="form-control " autocomplete="off"  name="nofaktur" id="nofaktur">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">NO DOKUMEN</label>
                                    <div class="col-md-9 has-success">
                                        <input type="text" class="form-control " autocomplete="off"  name="no_dokumen" id="no_dokumen" readonly>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">DATA DISTRIBUTOR</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">NO</label>
                                    <div class="col-md-9 has-success">
                                        <input type="text" class="form-control " autocomplete="off"  name="no" id="no" readonly>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">DEBET KEPADA</label>
                                    <div class="col-md-9 has-success">
                                        <input type="text" class="form-control " autocomplete="off"  name="distributor" id="distributor" readonly>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">NO INDEX</label>
                                    <div class="col-md-9 has-success">
                                        <input type="text" class="form-control " autocomplete="off"  name="no_index" id="no_index" readonly>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">TANGGAL DITERIMA</label>
                                    <div class="col-md-9 has-success">
                                        <input type="date" placeholder="TANGGAL TERIMA" id="tgl_terima" name="tgl_terima" class="form-control filled-input" autocomplete="off">
                                            <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">HARGA FAKTUR</label>
                                    <div class="col-md-9 has-success">
                                        <input type="number" class="form-control " autocomplete="off"  name="hargafaktur" id="hargafaktur" value="0">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">PPN (Rp)</label>
                                    <div class="col-md-9 has-success">
                                        <input type="number" class="form-control " autocomplete="off"  name="ppndp" id="ppndp" placeholder="0">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">BEA MATERAI + ONGKOS KIRIM</label>
                                    <div class="col-md-9 has-success">
                                        <input type="number" class="form-control " autocomplete="off"  name="beaongkir" id="beaongkir" value="0">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /formbody -->
                       
                        <div class="modal-footer">
                            <button type="submit" name="update" id="update" onclick="edit_dp()" class="btn btn-success btn-anim btn-sm"><i class="icon-printer"></i><span class="btn-text">UPDATE</span></button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="isiDataDP" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-notebook mr-10"></i> DETAIL DP
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">DATA FAKTUR</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NO FAKTUR</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" disabled="" id="nomor">
                                                <input type="hidden" class="form-control " autocomplete="off"  name="id_faktur" id="id_faktur">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NO DOKUMEN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control " autocomplete="off"  name="no_dokumen_isi" id="no_dokumen_isi" readonly="">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <!--done--> 
                            <div class="panel-wrapper collapse in">

                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="isiFaktur" class="table table-hover display  pb-30">
                                    <thead>
                                        <!-- <tr class="bg-success">
                                            <th>NO</th>
                                            <th>NAMA OBAT</th>
                                            <th>HARGA SATUAN</th>
                                            <th>JUMLAH OBAT</th>
                                            <th>TOTAL HARGA</th>
                                            <th>NO BATCH</th>
                                            <th>TANGGAL EXPIRED</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="bg-success">
                                        <th>NO</th>
                                        <th>NAMA OBAT</th>
                                        <th>HARGA SATUAN</th>
                                        <th>JUMLAH OBAT</th>
                                        <th>TOTAL HARGA</th>
                                        <th>NO BATCH</th>
                                        <th>TANGGAL EXPIRED</th>
                                        </tr>
                                    </tfoot> -->
                                    <tr class="bg-success">
                                        <th>NO FAKTUR</th>
                                        <th>KODE PBM IHC</th>
                                        <th>KETERAGAN</th>
                                        <th>DISTRIBUTOR</th>
                                        <th>NAMA BARANG</th>
                                        <th>NO BATCH</th>
                                        <th>PABRIK</th>
                                        <th>SATUAN</th>
                                        <th>GOLONGAN OBAT</th>
                                        <th>PP</th>
                                        <th>TERIMA</th>
                                        <th>SISA</th>
                                        <th>HNA </th>
                                        <th>DISC NOMINAL </th>
                                        <th>DISC </th>
                                        <th>PPN </th>
                                        <th>TOTAL</th>
                                        <th>TGL TERIMA</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="bg-success">
                                        <th>NO FAKTUR</th>
                                        <th>KODE PBM IHC</th>
                                        <th>KETERAGAN</th>
                                        <th>DISTRIBUTOR</th>
                                        <th>NAMA BARANG</th>
                                        <th>NO BATCH</th>
                                        <th>PABRIK</th>
                                        <th>SATUAN</th>
                                        <th>GOLONGAN OBAT</th>
                                        <th>PP</th>
                                        <th>TERIMA</th>
                                        <th>SISA</th>
                                        <th>HNA </th>
                                        <th>DISC NOMINAL </th>
                                        <th>DISC </th>
                                        <th>PPN </th>
                                        <th>TOTAL</th>
                                        <th>TGL TERIMA</th>
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
    </div>
</div>

<script>
$(document).ready(function() {

        table = $('#datable').DataTable({
            "retrieve": true,
            "dom": 'Bfrtip',
            "buttons": ['csv', 'excel', 'pdf'],
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entries",
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
                "url": "<?php echo base_url('Logistik_farmasi/tampil_laporan_dp'); ?>",
                "type": "POST",
                "data": function(data) {



                }
            },
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
            "ajax": '<?php echo base_url('Logistik_farmasi/tampil_laporan_dp'); ?>',
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
                "url": '<?= base_url('Logistik_farmasi/tampil_laporan_dp'); ?>',
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

    function edit_cetak_dp(id_cetak, faktur_nomor_dp, no_dokumen, no_distributor, distributor, total, ppn)
    {
        $("#modalDetailInvoice").modal('show');
        $("#id_cetak").val(id_cetak);
        $("#nofaktur").val(faktur_nomor_dp);
        $("#no_dokumen").val(no_dokumen);
        $("#no").val(no_distributor);
        $("#distributor").val(distributor);
        $("#hargafaktur").val(total);
        $("#ppndp").val(ppn);
    }

    function edit_dp()
    {
        id_cetak = $("#id_cetak").val();
        no_dokumen = $("#no_dokumen").val();
        no = $("#no").val();
        distributor = $("#distributor").val();
        tgl_terima = $("#tgl_terima").val();
        nofaktur = $("#nofaktur").val();
        hargafaktur = $("#hargafaktur").val();
        ppn = $("#ppndp").val();
        beaongkir = $("#beaongkir").val();
        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Logistik_farmasi/updateDP",
                method: "POST",
                dataType: 'json',
                data: {
                    id_cetak: id_cetak,
                    no_dokumen: no_dokumen,
                    no_distributor: no,
                    distributor: distributor,
                    tgl_terima: tgl_terima,
                    nofaktur: nofaktur,
                    ppn: ppn,
                    hargafaktur: hargafaktur,
                    beaongkir: beaongkir
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "DP " + no_dokumen + " Berhasil di UPDATE",
                            confirmButtonColor: "#3cb878",
                        });
                        $("#id_cetak").val("");
                        $("#no_dokumen").val("");
                        $("#no").val("");
                        $("#distributor").val("");
                        $("#tgl_terima").val("");
                        $("#nofaktur").val("");
                        $("#hargafaktur").val(0);
                        $("#ppndp").val(0);
                        $("#beaongkir").val(0);
                        $("#modalDetailInvoice").modal('hide');
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
        return false;
    }

    function hapus(id_cetak,no_distributor) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + no_distributor + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Logistik_farmasi/delete_dp",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_cetak: id_cetak,
                        no_distributor: no_distributor
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

    function tampil_isi_dp(id_faktur, no_dokumen, no_faktur) {
        $("#id_faktur").val(id_faktur);
        $("#no_dokumen_isi").val(no_dokumen);
        $("#isiDataDP").modal('show');
        var str = $("#no_dokumen_isi").val() + "";
        no_index = str.substring(0, 4);
        $("#nomor").val(no_faktur);
        nomor = $("#nomor").val();

        reload_list_faktur(id_faktur, no_dokumen, nomor);
    }

    function reload_list_faktur(id_faktur, no_dokumen, nomor) {
                $('#isiFaktur').dataTable().fnClearTable();
                $('#isiFaktur').dataTable().fnDestroy();
                $('#isiFaktur').DataTable({
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
                        "url": '<?php echo base_url('Logistik_farmasi/tampil_isi_dp'); ?>',
                        "type": 'POST',
                        "data": {
                            id_faktur: id_faktur,
                            no_dokumen: no_dokumen,
                            nomor: nomor
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