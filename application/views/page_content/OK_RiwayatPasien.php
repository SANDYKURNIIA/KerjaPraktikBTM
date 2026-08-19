<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100"> RIWAYAT PASIEN</span></h6>
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
                    <table id="datable" class="table table-hover display  pb-30">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>TINDAKAN</th>
                                <th>LIST DOKTER</th>
                                <th>OBAT</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>CARA MASUK</th>
                                <th>POLIKLINIK / RUANG</th>
                                <th>CARA BAYAR</th>
                                <th>DIAGNOSA</th>
                                <th>DOKTER DPJP</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
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

<!-- MOdal Tindakan Dokter -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_tindakan_dokter" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">TINDAKAN PASIEN</h6>
                        </div>
                        <div class="clearfix"></div>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-equalizer mr-10"></i> LIST DOKTER
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body mt-20" style="margin-left:-1em">

                            <div class="panel-wrapper collapse in mb-20 mt-20" id="outListTindakanApelkes">
                                <h6 class="txt-dark capitalize-font pl-20 mb-0"><i class="icon-list mr-10"></i>LIST DETAIL</h6>
                                <hr width="95% mb-0">
                                <div class="panel-body mt-0">
                                    <div class="table-wrap mt-0">
                                        <div class="table-responsive mt-0">
                                            <table id="table_tindakan_dokter" class="table table-hover display pb-30 mt-10" width="100%">
                                                <thead>
                                                    <tr class="bg-success">
                                                        <th>NO</th>
                                                        <th>NAMA DOKTER</th>
                                                        <th>TIPE DOKTER</th>
                                                        <th>HAPUS</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr class="bg-success">
                                                        <th>NO</th>
                                                        <th>NAMA DOKTER</th>
                                                        <th>TIPE DOKTER</th>
                                                        <th>HAPUS</th>
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
<div class="modal fade bs-example-modal-lg" id="modal_obat" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> OBAT
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="form-body">
                       
                        <input type="hidden" class="form-control" disabled="" id="cara_bayar">
                        <input type="hidden" class="form-control" id="inPelObat">
                        <input type="hidden" class="form-control" id="inHisObat">
                        
                        <div class="panel-wrapper collapse in mb-20 mt-20" id="outListTindakanApelkes">
                            <h6 class="txt-dark capitalize-font pl-20 mb-0"><i class="icon-list mr-10"></i>TINDAKAN OBAT</h6>
                            <hr width="95% mb-0">
                            <div class="panel-body mt-0">
                                <div class="table-wrap mt-0">
                                    <div class="table-responsive mt-0">
                                        <table id="tableobat" class="table table-hover display pb-30 mt-10" width="100%">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th>NO</th>
                                                    <th>NAMA OBAT</th>
                                                    <th>EXPIRE DATE</th>
                                                    <th>HARGA OBAT</th>
                                                    <th>JUMLAH OBAT</th>
                                                    <th>TOTAL BIAYA</th>
                                                    <th>NAMA STAFF</th>
                                                    <th>HAPUS</th>
                                                    <!-- <th>SIGNA</th> -->
                                                </tr>
                                            </thead>
                                            <tbody style="color: black">
                                            </tbody>
                                            <tfoot>
                                                <th>NO</th>
                                                <th>NAMA OBAT</th>
                                                <th>EXPIRE DATE</th>
                                                <th>HARGA OBAT</th>
                                                <th>JUMLAH OBAT</th>
                                                <th>TOTAL BIAYA</th>
                                                <th>NAMA STAFF</th>
                                                <th>HAPUS</th>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <span class="help-block"></span>
                        <div align="right">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <div id="cetakFarmasi" onclick="cetak_resep()" class="btn btn-success mr-10">CETAK RESEP</div>
                                            <div id="batalFarmasi" onclick="batalFarmasi()" class="btn btn-danger ">BATAL</div>

                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"> </div>
                            </div>

                        </div>
                        <br>
                        <br>
                        </hr>
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
    function setHarga() {

        // caraBayar = $('#cara_bayar').val();

        obat = $('#inObat').val();
        splitDiag = obat.split("|");
        stok = (splitDiag[4]);

        $("#outStok").val(stok);

        harga = parseFloat(splitDiag[1]);
        hargaMargin = harga * parseFloat(splitDiag[2]);
        $("#outBiayaTindakanObat").val(convertToRupiah(harga.toFixed(0)));
        $("#outBiayaMarginObat").val(convertToRupiah(hargaMargin.toFixed(0)));

        frek = parseFloat($("#inJumlahObat").val());
        if (frek > stok) {
            $("#inJumlahObat").val(stok);
        } else if (frek < 0) {
            $("#inJumlahObat").val(1);
        }


        disc = parseFloat($("#inDisc").val());

        if (document.getElementById('inRadioCost').checked) {
            total = harga * frek * (1 - (disc * 0.01));
        } else {
            total = hargaMargin * frek * (1 - (disc * 0.01));
        }

        $("#outTotalObat").val(convertToRupiah(total.toFixed(0)));

    }
    $('#inObat').change(function() {
        obat = $('#inObat').val();
        splitDiag = obat.split("|");
        tgl = splitDiag[3];
        $('#inTglExp').val(tgl);
        stok = splitDiag[4];
        $("#outStok").val(stok);
    });

    function insert_Obat() {
        id_pelayanan = $('#inPelObat').val();
        a = $("#inObat").val();
        splitDiag = a.split("|");
        margin = parseFloat(splitDiag[2]);

        id_list_tindakan = splitDiag[0];
        harga = parseFloat(splitDiag[1]);
        hargaMargin = harga * parseFloat(splitDiag[2]);

        frek = parseFloat($("#inJumlahObat").val());
        disc = parseFloat($("#inDisc").val());
        expire = (splitDiag[3]);
        jumlahKurang = frek * -1;

        if (document.getElementById('inRadioCost').checked) {
            total = harga * frek * (1 - (disc * 0.01));
        } else {
            total = hargaMargin * frek * (1 - (disc * 0.01));
        }

        $.ajax({
            url: "<?= base_url() . 'ok_pasien/insert_obat' ?>",
            method: "POST",
            dataType: 'json',
            cache: false,
            data: {
                id_pelayanan: id_pelayanan,
                margin: margin,
                harga: harga,
                frek: frek,
                disc: disc,
                expire: expire,
                jumlahKurang: jumlahKurang,
                total: total,
                id_list_tindakan: id_list_tindakan,
            },
            success: function(data) {
                if (data.status == "success") {

                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    })

                    $('#tableobat').DataTable().ajax.reload();
                    $('#inObat').val('-').change();
                    $('#inTglExp').empty().trigger('change');
                    $("#inJumlahObat").val('1');
                    $("#inDisc").val(0);
                    $("#outBiayaTindakanObat").val('');
                    $("#outBiayaMarginObat").val('');
                    $("#outStok").val('0');
                    $("#outTotalObat").val('');
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

    function hapus_obat(id, nama) {
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
                    url: "<?php echo base_url() ?>ok_pasien/hapus_obat",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $('#tableobat').DataTable().ajax.reload();
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

    function cetak_resep() {
        id_pel = $('#inPelObat').val();
        id_his = $('#inHisObat').val();
        window.location.href = '<?php echo base_url('ok_pasien/print_resep/'); ?>' + id_pel + '/' + id_his;
    }

    function tampilTindakanFarmasi(id_pelayanan, id_history) {
        $.ajax({
            url: "<?= base_url() . 'OK_Pasien/getDataRiwayat' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {

                if (data.status_dt == "found") {
                    //disini set datanya ke modal
                    $("#id_pelayanan").val(data.id_pelayanan);
                    $("#modal_tindakan").modal('show');
                    reload_data_tindakan(id_pelayanan);
                    reload_total_harga(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }
    function tampilTindakanObat(id_pelayanan, id_history) {
        $.ajax({
            url: "<?= base_url() . 'OK_Pasien/getDataRiwayat' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {

                if (data.status_dt == "found") {
                    //disini set datanya ke modal
                    $("#inPelObat").val(id_pelayanan);
                    $("#inHisObat").val(id_history);
                    $("#modal_obat").modal('show');
                    reload_data_obat(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }
    $('#modal_obat').on('hidden.bs.modal', function() {
        $('#inObat').val('-').change();
        $('#inTglExp').empty().trigger('change');
        $("#inJumlahObat").val('1');
        $("#inDisc").val(0);
        $("#outBiayaTindakanObat").val('');
        $("#outBiayaMarginObat").val('');
        $("#outStok").val('0');
        $("#outTotalObat").val('');
        $('#datable').DataTable().ajax.reload();
    })
    function reload_data_obat(id_pelayanan) {
        $('#tableobat').dataTable().fnClearTable();
        $('#tableobat').dataTable().fnDestroy();
        $('#tableobat').DataTable({
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
                "url": '<?php echo base_url('Ok_pasien/tampil_obat'); ?>',
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
    function cariTindakan() {
        jenis = $("#inJenis").val();
        tipe = $("#inTipe").val();
        tipeKamar = $("#inTipeKamar").val();
        keterangan = $("#inKeterangan").val();
        $.ajax({
            url: "<?= base_url() . 'OK_Pasien/cariTindakan' ?>",
            data: {
                jenis: jenis,
                tipe: tipe,
                tipeKamar: tipeKamar,
                keterangan: keterangan,
            },
            type: 'POST',
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
                        '<option value=' + data[i].id_list_kamar_ok + '|' + harga + '|' + harga2 + '>' + data[i].nama + '</option>';
                }
                $('#inTindakan').html(html);
            }
        });
    }

    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    function tampilHarga() {
        a = $("#inTindakan").val();
        splitDiag = a.split("|");

        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlah").val());

        total = harga * frek;

        $("#outHarga").val(convertToRupiah(harga.toFixed(0)));
        $("#outTotal").val(convertToRupiah(total.toFixed(0)));
    }

    function insertTindakan() {
        a = $("#inTindakan").val();
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlah").val());
        total = harga * frek;
        id_list_tindakan = splitDiag[0];
        idPelayanan = $("#id_pelayanan").val();
        var ID = Math.random().toString(36).substr(2, 16);

        $.ajax({
            url: "OK_Pasien/insertTindakanOk",
            data: {
                id_list_tindakan: id_list_tindakan,
                id_tindakan_labor: ID,
                harga: harga,
                frek: frek,
                total: total,
                keterangan: keterangan,
                id_pelayanan: idPelayanan,
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

    function tampilTindakanDokter(id_pelayanan, id_history) {
        $.ajax({
            url: "<?= base_url() . 'OK_Pasien/getDataRiwayat' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {

                if (data.status_dt == "found") {
                    //disini set datanya ke modal
                    $("#idPelayanan").val(data.id_pelayanan);
                    $("#modal_tindakan_dokter").modal('show');
                    reload_data_tindakan_dokter(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }

    function insert_tindakan() {
        dokter = $("#inDokter").val();
        tipe = $("#inJenisDokter").val();
        var ID = Math.random().toString(36).substr(2, 16);
        idPelayanan = $('#idPelayanan').val();

        dataString = 'id=' + ID + '&dokter=' + dokter +
            '&idPelayanan=' + idPelayanan + '&tipe=' + tipe;
        $.ajax({
            url: "<?= base_url() . 'OK_Pasien/insert_tindakan' ?>",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#table_tindakan_dokter').DataTable().ajax.reload();
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

    function hapus_data_tindakan_dokter(id_list_dokter) { //utk hapus diagnosa pasien
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + id_list_dokter + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>OK_Pasien/hapus_data_tindakan_dokter",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_list_dokter: id_list_dokter,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#table_tindakan_dokter').DataTable().ajax.reload();
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
<script type="text/javascript">
    function reload_data_tindakan_dokter(idPelayanan) {
        $('#table_tindakan_dokter').dataTable().fnClearTable();
        $('#table_tindakan_dokter').dataTable().fnDestroy();
        $('#table_tindakan_dokter').DataTable({
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
                "url": '<?php echo base_url('OK_Pasien/tampil_list_tindakan_dokter'); ?>',
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
</script>
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
            "ajax": {
                "url": '<?= base_url('OK_Pasien/tampil_riwayat_pasien'); ?>',
                "type": 'POST',
                "data": {
                    tipe: 'today',
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
            "ajax": {
                "url": '<?= base_url('OK_Pasien/tampil_riwayat_pasien'); ?>',
                "type": 'POST',
                "data": {
                    tipe: 'today',
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
                "url": '<?= base_url('OK_Pasien/tampil_riwayat_pasien'); ?>',
                "type": 'POST',
                "data": {
                    tipe: 'range',
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