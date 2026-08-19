<!-- Modal tindakan -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_tindakan" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">TINDAKAN DOKTER</h6>
                        </div>
                        <div class="clearfix"></div>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="ti-layout-media-right-alt mr-10"></i> INFO TINDAKAN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <!-- /formbody -->
                        <div class="form-body" id="form_tindakan" style="margin-left:-1em">
                            <div class="row">
                                <div class="col-md-6 mt-10">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 pt-10">OPERASI</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12 ">
                                            <select class="form-control filled-input rounded-input select2" id="inTipe">
                                                <option value="-">-</option>
                                                <?php
                                                foreach ($operasi as $row) {
                                                ?>
                                                    <option value="<?php echo $row["tipe"]; ?>"><?php echo $row["tipe"]; ?></option>
                                                <?php }  ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6 mt-10">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 pt-10">TIPE</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12 ">
                                            <select class="form-control filled-input rounded-input select2" id="inKeterangan">
                                                <option value="-">-</option>
                                                <?php
                                                foreach ($tipe as $row) {
                                                ?>
                                                    <option value="<?php echo $row["keterangan"]; ?>"><?php echo $row["keterangan"]; ?></option>
                                                <?php }  ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->

                                <!-- <div class="row"> -->

                                <!--/span-->
                                <!-- <div class="col-md-6 mt-10">
                                    <div class="form-group">
                                        <label class="control-label  col-md-3">JENIS OPERASI</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12 ">
                                            <select class="form-control filled-input rounded-input select2" id="inJenis">
                                                <option>ELEKTIF</option>
                                                <option>EMERGENSI</option>
                                              

                                            </select>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-md-6 mt-10">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">KAMAR PASIEN</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12 ">
                                            <select class="form-control filled-input rounded-input select2" id="inTipeKamar">
                                                <option value="-">-</option>
                                                <?php
                                                foreach ($kamar as $row) {
                                                ?>
                                                    <option value="<?php echo $row["tipe_kamar"]; ?>"><?php echo $row["tipe_kamar"]; ?></option>
                                                <?php }  ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group">
                                        <label class="control-label  col-md-3">JENIS KLAIM</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12 ">
                                            <select class="form-control filled-input rounded-input select2" id="inCaraBayar">
                                                <option value="BPJS">BPJS</option>
                                                <option value="BPJSTK">BPJSTK</option>
                                                <option value="NON BPJS">NON BPJS</option>


                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row mt-20 mb-40">
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <div class="btn btn-success btn-square btn-sm pt-10" onclick="cariTindakan()"><i class="ti-search"></i> CARI</div>
                                </div>
                            </div>

                            <span class="help-block"></span>
                            <div class="row">
                                <div class="col-md-6" id="outTampilTindakan">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">TINDAKAN OPERASI</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12">
                                            <select class="form-control filled-input rounded-input select2" id="inTindakan" onchange="tampilHarga()">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3 pt-10">HARGA</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" autocomplete="off" id="outHarga" disabled="">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3 pt-10">JUMLAH</label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control " autocomplete="off" onkeyup="tampilHarga()" id="inJumlah" value="1">
                                            <span class="help-block"></span>
                                            <input type="hidden" class="form-control rounded-input" id="id_pelayanan">

                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3 pt-10">TOTAL</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" autocomplete="off" id="outTotal">
                                            <span class="help-block"></span>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- dOKTER -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NAMA DOKTER</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12 ">
                                            <select class="form-control filled-input rounded-input select2" id="inDokter2">
                                                <option value="-">-</option>
                                                <?php
                                                foreach ($data_dokter as $d) : ?>
                                                    <option value="<?php echo $d->id_dokter; ?>">
                                                        <?php echo $d->nama; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <input type="hidden" class="form-control" id="idPelayanan">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-10">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                    <div class="btn btn-success btn-square btn-sm" onclick="insertTindakan()">SUBMIT</div>
                                </div>
                            </div>
                        </div>
                        <!-- /Row -->

                    </div>
                    <div class="modal-body mt-30">

                        <h6 class="txt-dark capitalize-font"><i class="icon-list mr-10"></i>LIST DETAIL TINDAKAN</h6>
                        <hr width="100%">
                        <div class="table-wrap" style="width: 100%; margin: auto">
                            <div class="table-responsive">
                                <table class="table table-hover display  pb-60" id="tabletindakan">
                                    <thead>
                                        <tr class="bg-success">
                                            <th>NO</th>
                                            <th>HAPUS</th>
                                            <th>NAMA TINDAKAN</th>
                                            <th>OPERASI</th>
                                            <th>TIPE</th>
                                            <th>JENIS OPERASI</th>
                                            <th>TIPE KAMAR</th>
                                            <th>BIAYA TINDAKAN </th>
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
                                            <th>OPERASI</th>
                                            <th>TIPE</th>
                                            <th>JENIS OPERASI</th>
                                            <th>TIPE KAMAR</th>
                                            <th>BIAYA TINDAKAN </th>
                                            <th>JUMLAH TINDAKAN</th>
                                            <th>TOTAL BIAYA</th>
                                            <th>NAMA STAFF</th>
                                            <th>DOKTER</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-30">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-4 pull-right">
                                <div class="table-wrap" style="width: 100%; margin-bottom:40px;">
                                    <div class="table-responsive ">
                                        <table class="table table-hover display " id="outTotalHarga">
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
                <!-- /Row -->
            </div>
            <!-- /formbody -->
        </div>
    </div>
</div>
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
                                                <?php

                                                foreach ($poli as $row) {

                                                ?>
                                                    <option value="<?php echo $row['kdpoli_bpjs']; ?>">
                                                        <?php echo $row['nama_panjang']; ?></option>
                                                <?php }  ?>
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
                        </div>
                    </div>
                </div>
                <!-- /Row -->
            </div>
            <!-- /formbody -->
        </div>
    </div>
</div>

<script type="text/javascript">
    function tampilHarga() {
        a = $("#inTindakan").val();
        splitDiag = a.split("|");

        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlah").val());

        total = harga * frek;

        $("#outHarga").val(convertToRupiah(harga.toFixed(0)));
        $("#outTotal").val(total);
    }

    function insertTindakan() {
        a = $("#inTindakan").val();
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlah").val());
        //total = harga * frek;
        total = $("#outTotal").val();
        dokter = $("#inDokter2").val();

        id_list_tindakan = splitDiag[0];
        idPelayanan = $("#id_pelayanan").val();
        var ID = Math.random().toString(36).substr(2, 16);
        if (splitDiag[2] > 0 && dokter == '-') {
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
                    frek: frek,
                    total: total,
                    keterangan: keterangan,
                    id_pelayanan: idPelayanan,
                    id_dokter: dokter,

                },
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data Berhasil ditambahkan",
                            confirmButtonColor: "#3cb878",
                        });

                        $("#modal_tindakan").modal('show');
                        reload_data_tindakan(idPelayanan);
                        reload_total_harga(idPelayanan);
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
    }

    function hapusTindakan(id_tindakan_ok, nama, id_pelayanan) {
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
                            reload_data_tindakan(id_pelayanan);
                            $('#outTotalHarga').DataTable().ajax.reload();
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

    function reload_data_tindakan(idPelayanan) {
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
                "url": '<?php echo base_url('OK_Pasien/tampil_list_tindakan'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: idPelayanan
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

    function reload_total_harga(id_pelayanan) {
        $('#outTotalHarga').dataTable().fnClearTable();
        $('#outTotalHarga').dataTable().fnDestroy();
        $('#outTotalHarga').DataTable({
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
                "url": '<?php echo base_url('OK_Pasien/tampil_total_harga'); ?>',
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
</script>

<script type="text/javascript">
    function antrian(id_pelayanan, id_history) {
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
                    $("#modal_antrian").modal('hide');
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
</script>