<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">RIWAYAT PERMINTAAN OBAT</span></h6>
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
                                <th>CETAK</th>
                                <th>RESPON</th>
                                <th>NO PESANAN</th>
                                <th>TANGGAL PERMINTAAN</th>
                                <th>JAM PERMINTAAN</th>
                                <th>UNIT</th>
                                <th>NAMA</th>
                                <th>KETERANGAN</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>CETAK</th>
                                <th>RESPON</th>
                                <th>NO PESANAN</th>
                                <th>TANGGAL PERMINTAAN</th>
                                <th>JAM PERMINTAAN</th>
                                <th>UNIT</th>
                                <th>NAMA</th>
                                <th>KETERANGAN</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-lg" id="list_permintaan" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> DAFTAR PERMINTAAN
                </h5>
            </div>

            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-wrap">
                            <div class="collapse" id="collap_tambah_kunjungan">
                                <div class="form-body">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">RESPON OBAT</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                    <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO KELUAR</h6>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">PEREQUEST</label>
                                                <div class="col-md-9 has-error">
                                                    <input type="text" class="form-control" id="inPerequest" disabled="">
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->

                                        <!--/span-->
                                    </div>
                                    <hr width="95%">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">NAMA OBAT</label>
                                                <div class="col-md-9 has-success">
                                                    <select class="form-control filled-input select2" id="idLogistik" onchange="getStok()">
                                                        <option value="-">-</option>
                                                        <?php

                                                        foreach ($obat as $row) {

                                                        ?>
                                                            <option value="<?php echo $row["id_logistik"]  ?>"><?php echo $row["nama"] . " (" . $row['produsen'] . ")"; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">TANGGAL EXPIRED</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="date" class="form-control " enabled="" id="inTglExp">
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">STOK TERSEDIA</label>
                                                <div class="col-md-9 has-error">
                                                    <input type="text" class="form-control " disabled="" id="outStok">
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">JUMLAH PERMINTAAN</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="number" class="form-control " enabled="" id="inJumlahPermintaan">
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">STOK DI BERIKAN</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="number" class="form-control " id="inJumlah" oninput="inputJumlah()">
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">KETERANGAN</label>
                                                <div class="col-md-9 has-success">
                                                    <textarea class="form-control" rows="5" style="resize: none;" id="inKeterangan">-</textarea>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                        </div>

                                        <!--/span-->
                                    </div>
                                    <!-- /Row -->

                                    <!--/span-->
                                </div>
                                <div class="form-actions mt-10">
                                    <div class="row">
                                        <input type="hidden" class="form-control " id="idRequest">
                                        <input type="hidden" class="form-control " id="idPerequest">
                                        <!-- <input type="hidden" class="form-control " id="idLogistik"> -->
                                        <div class="col-md-offset-3 col-md-9">
                                            <div type="submit" class="btn btn-success mr-10" onclick="terima()">TERIMA</div>
                                            <div type="button" class="btn btn-danger " onclick="tolak()">TOLAK</div>
                                            <div type="button" class="btn btn-warning " onclick="batal()">BATAL</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                <hr width="95%">
                <div class="table-wrap" style="width: 100%; margin: auto ">
                    <div class="table-responsive">
                        <table class="table table-hover" id="tabletindakan">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>TERIMA</th>
                                    <th>EDIT</th>
                                    <th>NAMA OBAT</th>
                                    <th>PRODUSEN</th>
                                    <th>EXPIRED DATE</th>
                                    <th>JUMLAH PERMINTAAN</th>
                                    <th>JUMLAH TERIMA</th>
                                    <th>STOK</th>
                                    <th>STATUS</th>
                                    <th>KETERANGAN</th>
                                    <th>HAPUS</th>
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
<style>
    td {
        color: black;
    }
</style>

<script type="text/javascript">
    function getStok() {

        var id_logistik = $('#idLogistik').val();
        if (id_logistik != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Logistik_farmasi/getObatById",
                method: "POST",
                data: {
                    id_logistik: id_logistik
                },
                dataType: 'json',
                success: function(data) {
                    //alert(data.stok)
                    $('#outStok').val(data.stok);
                    $("#inTglExp").val(data.kadaluarsa).change();

                }
            });
        } else {
            $('#outStok').val(0);
        }
    }

    function inputJumlah() {
        // tglExp=$("#inTglExp").val();
        // splitDiag = tglExp.split("|");
        // // alert(splitDiag[1]);

        // stok = splitDiag[1];
        stok = $("#outStok").val();

        // alert(splitDiag[1]);
        jml = parseFloat($("#inJumlah").val());

        // if (jml < 0) {
        //     $("#inJumlah").val(0);
        // } else if (jml > jml_req && stok > jml_req) { 
        //     $("#inJumlah").val(jml_req);
        // } else if (stok < jml_req && jml > stok) { 
        //     $("#inJumlah").val(stok);
        // }

        if (jml < 0) {
            $("#inJumlah").val(0);
        } else if (jml > stok) { 
            $("#inJumlah").val(stok);
        }

    }

    function terima() {
        idRequest = $("#idRequest").val();
        perequest = $("#inPerequest").val();
        Stok = $("#outStok").val();
        JumlahPermintaan = $("#inJumlahPermintaan").val();
        idPerequest = $("#idPerequest").val();;
        idLogistik = $("#idLogistik").val();
        keterangan = $("#inKeterangan").val();
        tglExp = $("#inTglExp").val();
        jml = parseFloat($("#inJumlah").val());

        $.ajax({
            method: "POST",
            dataType: 'json',
            url: "<?php echo base_url() ?>Logistik_farmasi/updateTerimaStokFarmasi",
            data: {
                id_request: idRequest,
                perequest: perequest,
                Stok: Stok,
                JumlahPermintaan: JumlahPermintaan,
                idLogistik: idLogistik,
                idPerequest: idPerequest,
                tgl_exp: tglExp,
                jml_terima: jml,
                keterangan: keterangan
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Permintaan Diterima",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#collap_tambah_kunjungan").collapse('hide');
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

    function tolak() {
        idRequest = $("#idRequest").val();
        keterangan = $("#inKeterangan").val();

        $.ajax({
            method: "POST",
            dataType: 'json',
            url: "<?php echo base_url() ?>Logistik_farmasi/updateTolakStokLogistik",
            data: {
                id_request: idRequest,
                keterangan: keterangan
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Permintaan Ditolak",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#collap_tambah_kunjungan").collapse('hide');
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
                    url: "<?php echo base_url() ?>Logistik_farmasi/hapus_request",
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


    function batal() {
        $("#collap_tambah_kunjungan").collapse('hide');
        $('#tabletindakan').DataTable().ajax.reload();
    }

    function tampilDetailRequest(id_req) {
        $("#list_permintaan").modal('show');
        // $("#id_req").val(id_req);
        reload_data_tindakan(id_req);
        $("#collap_tambah_kunjungan").collapse('hide');
    }

    function tampilKonfirmasi(idRequest, perequest, idLogistik, idPerequest) {
        div = event.target.parentNode;
        td = div.closest('tr');
        obat = td.cells[3].innerHTML;
        tglExp = td.cells[5].innerHTML;
        jml = td.cells[6].innerHTML;
        stok = td.cells[8].innerHTML;
        permintaan = 0;
        if (jml > stok) {
            permintaan = stok;
        } else {
            permintaan = jml;
        }
        //alert(idLogistik);
        $("#inPerequest").val(perequest);
        $("#inNamaObat").val(obat);
        $("#inTglExp").val(tglExp);
        $("#outStok").val(stok);
        $("#inJumlahPermintaan").val(jml);
        $("#inJumlah").val(permintaan);
        $("#idRequest").val(idRequest);
        $("#idLogistik").val(idLogistik).change();
        $("#idPerequest").val(idPerequest);
        $("#collap_tambah_kunjungan").collapse('show');


    }

    function terimaLangsung(idRequest, perequest, idLogistik) {
        div = event.target.parentNode;
        td = div.closest('tr');
        tglExp = td.cells[5].innerHTML;
        jml = td.cells[6].innerHTML;
        $.ajax({
            method: "POST",
            dataType: 'json',
            url: "<?php echo base_url() ?>Logistik_farmasi/updateTerimaStokFarmasi",
            data: {
                id_request: idRequest,
                perequest: perequest,
                idLogistik: idLogistik,
                tgl_exp: tglExp,
                jml_terima: jml,
                JumlahPermintaan: jml,
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
            "ajax": '<?php echo base_url('Logistik_farmasi/Tampil_riwayat_permintaan_unit'); ?>',
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
            "ajax": '<?php echo base_url('Logistik_farmasi/Tampil_riwayat_permintaan_unit'); ?>',
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
                "url": '<?= base_url('Logistik_farmasi/Tampil_riwayat_permintaan_unit'); ?>',
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
                "url": '<?php echo base_url('Logistik_farmasi/Tampil_list_riwayat_permintaan_obat_farmasi'); ?>',
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
</script>