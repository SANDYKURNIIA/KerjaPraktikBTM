<<<<<<< HEAD
<!-- Row -->
<?php
$data = $this->session->userdata('data_auth');
$datatipe = $data->tipe;
$status = $data->status;
$izinAkses = $data->izin_akses;
?>
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PERMINTAAN OBAT</span></h6>
        </div>
        <div align="right">

            <div class="btn btn-primary btn-anim btn-sm " onclick="tambahFormFaktur()"><i class="icon-rocket"></i><span class="btn-text">TAMBAH FORM PERMINTAAN</span>
                <div></div>
            </div>
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
                                <!-- <th>REQUEST</th> -->
                                <th>LIST OBAT</th>
                                <th>HAPUS</th>
                                <th>NO PESANAN</th>
                                <th>TANGGAL PERMINTAAN</th>
                                <th>JAM PERMINTAAN</th>
                                <th>STAFF</th>
                                <th>TUJUAN</th>
                                <?php if ($datatipe == "rawatjalan") { ?>
                                    <th>KETERANGAN</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <!-- <th>REQUEST</th> -->
                                <th>LIST OBAT</th>
                                <th>HAPUS</th>
                                <th>NO PESANAN</th>
                                <th>TANGGAL PERMINTAAN</th>
                                <th>JAM PERMINTAAN</th>
                                <th>STAFF</th>
                                <th>TUJUAN</th>
                                <?php if ($datatipe == "rawatjalan") { ?>
                                    <th>KETERANGAN</th>
                                <?php } ?>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-lg" id="list_obat" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> PERMINTAAN OBAT
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap" id="form_obat" style="display: block;">
                    <!-- /formbody -->
                    <div class="form-body mt-10">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>FORM PERMINTAAN OBAT
                        </h6>
                        <hr width="95%">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">NAMA OBAT</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" id="inObat">
                                            <option value="-">-</option>
                                            <?php

                                            foreach ($obat as $row) {

                                            ?>
                                                <option value="<?php echo $row["id_logistik"]; ?>"><?php echo $row["nama"] . " (" . $row['produsen'] . ")"; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-md-6" id="outTglExp">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">TANGGAL KADALUARSA</label>
                                    <div class="col-md-9 has-success">
                                        <input type="text" class="form-control" disabled="" id="inTglExp">
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-md-6" id="outStokSelect">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">STOK TERSEDIA</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control" value="0" disabled="" id="outStok">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div> -->
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">JUMLAH PERMINTAAN</label>
                                    <div class="col-md-9 has-success">
                                        <input type="number" class="form-control " autocomplete="off" placeholder="JUMLAH PERMINTAAN" id="inJumlah" oninput="inputJumlah()">

                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <!--/span-->

                            <!--/span-->
                        </div>


                    </div>
                    <div class="form-actions mt-10">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <input type="hidden" class="form-control" disabled="" id="id_req">
                                        <div class="btn btn-success  mr-10" onclick="insertPermintaanObat()">Submit</div>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"> </div>
                        </div>
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
                                    <th>NO</th>
                                    <th>AKSI</th>
                                    <th>NAMA OBAT</th>
                                    <th>PRODUSEN</th>
                                    <th>JUMLAH PERMINTAAN</th>
                                    <th>JUMLAH TERIMA</th>
                                    <th>SATUAN</th>
                                    <th>STATUS</th>
                                    <th>KETERANGAN</th>
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

<div class="modal fade bs-example-modal-lg" id="form_baru" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> PERMINTAAN OBAT
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="form-body mt-10">
                        <form method="post" action="<?= base_url('Permintaan_obat/insertFormPermintaanObatBaru') ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">TUJUAN</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" id="inTuj" name="inTuj">
                                                <?php if ($datatipe == "labor" || $datatipe == "laboratorium") { ?>
                                                    <option value="depo">LOGISTIK FARMASI</option>
                                                    <option value="depo ranap">FARMASI RANAP</option>

                                                <?php } else { ?>
                                                    <option value="depo">LOGISTIK FARMASI</option>

                                                    <option value="unit">FARMASI RAJAL</option>

                                                    <option value="depo ranap">FARMASI RANAP</option>
                                                <?php } ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($datatipe == "rawatjalan") { ?>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">KETERANGAN</label>
                                            <div class="col-md-9 has-success">
                                                <textarea class="form-control" cols="30" rows="2" name="inKet" id="inKet" placeholder="-"></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="row" align="right">
                                <div class="col-md-6"> </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <input type="hidden" class="form-control" disabled="" id="id_req">
                                            <button type="submit" class="btn btn-success  mr-10">Submit</button>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

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


<script type="text/javascript">
    // function tambahFormFaktur() {

    //     $.ajax({
    //         method: "POST",
    //         dataType: 'json',
    //         url: "<?php echo base_url() ?>Permintaan_obat/insertFormPermintaanObatBaru",
    //         success: function(data) {
    //             if (data.status == "success") {
    //                 swal({
    //                     title: "good job!",
    //                     type: "success",
    //                     text: "Data Berhasil ditambahkan",
    //                     confirmButtonColor: "#3cb878",
    //                 });

    //                 $('#datable').DataTable().ajax.reload();
    //             } else {
    //                 swal({
    //                     title: "Gagal!",
    //                     type: "warning",
    //                     text: data.status,
    //                     confirmButtonColor: "#3cb878",
    //                 });
    //             }
    //         }
    //     })
    // }

    function tambahFormFaktur() {
        $("#form_baru").modal('show');

    }

    function tampilPermintaanObat(id_req, tipe, status) {

        // if(status =='diajukan'){
        //     $("#form_obat").hide();
        // }
        $("#list_obat").modal('show');
        $("#id_req").val(id_req);
        reload_data_tindakan(id_req);
        getObat(tipe);


    }

    function getObat(depo) {
        if (depo != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Permintaan_obat_unit/getNamaObat",
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
                        html += '<option value="' + data[i].id_logistik + '">' + data[i].nama + ' (' + data[i].produsen + ',' + Number(data[i].stok) + ',' + (data[i].satuan_terkecil) + ')' + '</option>';
                    }
                    $('#inObat').html(html);
                }
            });
        } else {
            $('#inObat').html('<option value="">-</option>');
        }
    }

    function inputJumlah() {
        // obat = $("#inObat").val();
        // splitDiag = tglExp.split("|");
        // alert(splitDiag[1]);

        stok = $("#outStok").val();

        // alert(splitDiag[1]);
        jml = parseFloat($("#inJumlah").val());

        if (jml < 0) {
            $("#inJumlah").val(0);
        } else if (jml > stok) {
            $("#inJumlah").val(stok);
        }

    }

    function insertPermintaanObat() {
        idReq = $("#id_req").val();
        obat = $("#inObat").val();
        // splitDiag = obat.split("|");
        // idObat = splitDiag[0];

        tgl = "";
        jml = parseFloat($("#inJumlah").val());
        $.ajax({
            method: "POST",
            dataType: 'json',
            url: "<?php echo base_url() ?>Permintaan_obat/insertPermintaanObatFarmasi",
            data: {
                idReq: idReq,
                idObat: obat,
                tgl: tgl,
                jml: jml
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil ditambahkan",
                        confirmButtonColor: "#3cb878",
                    });

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
        })
    }

    function hapusRequest(id_req, nama) {
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
                    url: "<?php echo base_url() ?>Permintaan_obat/hapus_request",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_req: id_req,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
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
            });
        });
        return false;
    }

    function hapusPermintaan(id_req, nama) {
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
                    url: "<?php echo base_url() ?>Permintaan_obat/hapus_permintaan",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_req: id_req,
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
    $(document).ready(function() {


        $('#inObat').change(function() {
            var obat = $('#inObat').val();
            splitDiag = obat.split('|');
            tgl = splitDiag[1];
            $('#inTglExp').val(tgl);
            stok = splitDiag[2];
            $("#outStok").val(stok);
        });


        // $('#outTglExp').addClass('collapse');
        // $('#outTglExp').collapse('hide');
        // $('#inObat').change(function() {

        //     $('#outTglExp').collapse('show');
        // });

        // $('#inTglExp').change(function() {
        //     tglExp = $("#inTglExp").val();
        //     splitDiag = tglExp.split("|");

        //     stok = splitDiag[1];
        //     $("#outStok").val(stok);
        // });

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
            "ajax": '<?php echo base_url('Permintaan_obat/Tampil_permintaan_obat'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    });

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
                "url": '<?php echo base_url('Permintaan_obat/tampil_list_tindakan'); ?>',
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
            "ajax": '<?php echo base_url('Permintaan_obat/Tampil_permintaan_obat'); ?>',
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
                "url": '<?= base_url('Permintaan_obat/Tampil_Range_Permintaan_obat'); ?>',
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
</script>
<script>
    function terimaLangsung(idRequest, idLogistik, exp, asal) {
        div = event.target.parentNode;
        td = div.closest('tr');
        jml = td.cells[5].innerHTML;
        $.ajax({
            method: "POST",
            dataType: 'json',
            url: "<?php echo base_url() ?>Permintaan_obat/updateTerima",
            data: {
                id_request: idRequest,
                idLogistik: idLogistik,
                tgl_exp: exp,
                jml_terima: jml,
                asal: asal,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Permintaan Diterima",
                        confirmButtonColor: "#3cb878",
                    });
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
        })
    }
=======
<!-- Row -->
<?php
$data = $this->session->userdata('data_auth');
$datatipe = $data->tipe;
$status = $data->status;
$izinAkses = $data->izin_akses;
?>
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PERMINTAAN OBAT</span></h6>
        </div>
        <div align="right">

            <div class="btn btn-primary btn-anim btn-sm " onclick="tambahFormFaktur()"><i class="icon-rocket"></i><span class="btn-text">TAMBAH FORM PERMINTAAN</span>
                <div></div>
            </div>
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
                                <!-- <th>REQUEST</th> -->
                                <th>LIST OBAT</th>
                                <th>HAPUS</th>
                                <th>NO PESANAN</th>
                                <th>TANGGAL PERMINTAAN</th>
                                <th>JAM PERMINTAAN</th>
                                <th>STAFF</th>
                                <th>TUJUAN</th>
                                <?php if ($datatipe == "rawatjalan") { ?>
                                    <th>KETERANGAN</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <!-- <th>REQUEST</th> -->
                                <th>LIST OBAT</th>
                                <th>HAPUS</th>
                                <th>NO PESANAN</th>
                                <th>TANGGAL PERMINTAAN</th>
                                <th>JAM PERMINTAAN</th>
                                <th>STAFF</th>
                                <th>TUJUAN</th>
                                <?php if ($datatipe == "rawatjalan") { ?>
                                    <th>KETERANGAN</th>
                                <?php } ?>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-lg" id="list_obat" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> PERMINTAAN OBAT
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap" id="form_obat" style="display: block;">
                    <!-- /formbody -->
                    <div class="form-body mt-10">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>FORM PERMINTAAN OBAT
                        </h6>
                        <hr width="95%">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">NAMA OBAT</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" id="inObat">
                                            <option value="-">-</option>
                                            <?php

                                            foreach ($obat as $row) {

                                            ?>
                                                <option value="<?php echo $row["id_logistik"]; ?>"><?php echo $row["nama"] . " (" . $row['produsen'] . ")"; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-md-6" id="outTglExp">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">TANGGAL KADALUARSA</label>
                                    <div class="col-md-9 has-success">
                                        <input type="text" class="form-control" disabled="" id="inTglExp">
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-md-6" id="outStokSelect">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">STOK TERSEDIA</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control" value="0" disabled="" id="outStok">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div> -->
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">JUMLAH PERMINTAAN</label>
                                    <div class="col-md-9 has-success">
                                        <input type="number" class="form-control " autocomplete="off" placeholder="JUMLAH PERMINTAAN" id="inJumlah" oninput="inputJumlah()">

                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <!--/span-->

                            <!--/span-->
                        </div>


                    </div>
                    <div class="form-actions mt-10">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <input type="hidden" class="form-control" disabled="" id="id_req">
                                        <div class="btn btn-success  mr-10" onclick="insertPermintaanObat()">Submit</div>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"> </div>
                        </div>
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
                                    <th>NO</th>
                                    <th>AKSI</th>
                                    <th>NAMA OBAT</th>
                                    <th>PRODUSEN</th>
                                    <th>JUMLAH PERMINTAAN</th>
                                    <th>JUMLAH TERIMA</th>
                                    <th>SATUAN</th>
                                    <th>STATUS</th>
                                    <th>KETERANGAN</th>
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

<div class="modal fade bs-example-modal-lg" id="form_baru" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> PERMINTAAN OBAT
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="form-body mt-10">
                        <form method="post" action="<?= base_url('Permintaan_obat/insertFormPermintaanObatBaru') ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">TUJUAN</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" id="inTuj" name="inTuj">
                                                <?php if ($datatipe == "labor" || $datatipe == "laboratorium") { ?>
                                                    <option value="depo">LOGISTIK FARMASI</option>
                                                    <option value="depo ranap">FARMASI RANAP</option>

                                                <?php } else { ?>
                                                    <option value="depo">LOGISTIK FARMASI</option>

                                                    <option value="unit">FARMASI RAJAL</option>

                                                    <option value="depo ranap">FARMASI RANAP</option>
                                                <?php } ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($datatipe == "rawatjalan") { ?>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">KETERANGAN</label>
                                            <div class="col-md-9 has-success">
                                                <textarea class="form-control" cols="30" rows="2" name="inKet" id="inKet" placeholder="-"></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="row" align="right">
                                <div class="col-md-6"> </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <input type="hidden" class="form-control" disabled="" id="id_req">
                                            <button type="submit" class="btn btn-success  mr-10">Submit</button>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

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


<script type="text/javascript">
    // function tambahFormFaktur() {

    //     $.ajax({
    //         method: "POST",
    //         dataType: 'json',
    //         url: "<?php echo base_url() ?>Permintaan_obat/insertFormPermintaanObatBaru",
    //         success: function(data) {
    //             if (data.status == "success") {
    //                 swal({
    //                     title: "good job!",
    //                     type: "success",
    //                     text: "Data Berhasil ditambahkan",
    //                     confirmButtonColor: "#3cb878",
    //                 });

    //                 $('#datable').DataTable().ajax.reload();
    //             } else {
    //                 swal({
    //                     title: "Gagal!",
    //                     type: "warning",
    //                     text: data.status,
    //                     confirmButtonColor: "#3cb878",
    //                 });
    //             }
    //         }
    //     })
    // }

    function tambahFormFaktur() {
        $("#form_baru").modal('show');

    }

    function tampilPermintaanObat(id_req, tipe, status) {

        // if(status =='diajukan'){
        //     $("#form_obat").hide();
        // }
        $("#list_obat").modal('show');
        $("#id_req").val(id_req);
        reload_data_tindakan(id_req);
        getObat(tipe);


    }

    function getObat(depo) {
        if (depo != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Permintaan_obat_unit/getNamaObat",
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
                        html += '<option value="' + data[i].id_logistik + '">' + data[i].nama + ' (' + data[i].produsen + ',' + Number(data[i].stok) + ',' + (data[i].satuan_terkecil) + ')' + '</option>';
                    }
                    $('#inObat').html(html);
                }
            });
        } else {
            $('#inObat').html('<option value="">-</option>');
        }
    }

    function inputJumlah() {
        // obat = $("#inObat").val();
        // splitDiag = tglExp.split("|");
        // alert(splitDiag[1]);

        stok = $("#outStok").val();

        // alert(splitDiag[1]);
        jml = parseFloat($("#inJumlah").val());

        if (jml < 0) {
            $("#inJumlah").val(0);
        } else if (jml > stok) {
            $("#inJumlah").val(stok);
        }

    }

    function insertPermintaanObat() {
        idReq = $("#id_req").val();
        obat = $("#inObat").val();
        // splitDiag = obat.split("|");
        // idObat = splitDiag[0];

        tgl = "";
        jml = parseFloat($("#inJumlah").val());
        $.ajax({
            method: "POST",
            dataType: 'json',
            url: "<?php echo base_url() ?>Permintaan_obat/insertPermintaanObatFarmasi",
            data: {
                idReq: idReq,
                idObat: obat,
                tgl: tgl,
                jml: jml
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil ditambahkan",
                        confirmButtonColor: "#3cb878",
                    });

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
        })
    }

    function hapusRequest(id_req, nama) {
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
                    url: "<?php echo base_url() ?>Permintaan_obat/hapus_request",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_req: id_req,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
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
            });
        });
        return false;
    }

    function hapusPermintaan(id_req, nama) {
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
                    url: "<?php echo base_url() ?>Permintaan_obat/hapus_permintaan",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_req: id_req,
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
    $(document).ready(function() {


        $('#inObat').change(function() {
            var obat = $('#inObat').val();
            splitDiag = obat.split('|');
            tgl = splitDiag[1];
            $('#inTglExp').val(tgl);
            stok = splitDiag[2];
            $("#outStok").val(stok);
        });


        // $('#outTglExp').addClass('collapse');
        // $('#outTglExp').collapse('hide');
        // $('#inObat').change(function() {

        //     $('#outTglExp').collapse('show');
        // });

        // $('#inTglExp').change(function() {
        //     tglExp = $("#inTglExp").val();
        //     splitDiag = tglExp.split("|");

        //     stok = splitDiag[1];
        //     $("#outStok").val(stok);
        // });

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
            "ajax": '<?php echo base_url('Permintaan_obat/Tampil_permintaan_obat'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    });

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
                "url": '<?php echo base_url('Permintaan_obat/tampil_list_tindakan'); ?>',
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
            "ajax": '<?php echo base_url('Permintaan_obat/Tampil_permintaan_obat'); ?>',
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
                "url": '<?= base_url('Permintaan_obat/Tampil_Range_Permintaan_obat'); ?>',
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
</script>
<script>
    function terimaLangsung(idRequest, idLogistik, exp, asal) {
        div = event.target.parentNode;
        td = div.closest('tr');
        jml = td.cells[5].innerHTML;
        $.ajax({
            method: "POST",
            dataType: 'json',
            url: "<?php echo base_url() ?>Permintaan_obat/updateTerima",
            data: {
                id_request: idRequest,
                idLogistik: idLogistik,
                tgl_exp: exp,
                jml_terima: jml,
                asal: asal,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Permintaan Diterima",
                        confirmButtonColor: "#3cb878",
                    });
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
        })
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>