<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">JURNAL SALDO AWAL</span></h6>
        </div>



        <div class="clearfix"></div>
    </div>


    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <!-- <form id="form-filter" class="form-horizontal"> -->


            <!-- Form body  -->

            <div class="form-body mt-20">

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal</label>
                            <div class="col-md-9 has-success">
                                <input type="date" placeholder="TANGGAL MASUK" value="<?php echo date("Y-m-d"); ?>" id="tgl_faktur" name="tgl_faktur" class="form-control" onchange="getNoDokumen()"></input>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <span class="help-block"></span>
                    </div>
                    <!-- span -->
                    <div class="col-md-6 mt-10">
                        <div class="form-group ">
                            <label class="control-label col-md-3">JENIS KLAIM</label>
                            <div class="col-md-9 has-success ">
                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inTipe" id="inTipe" onchange="pilihKlaim(this.value)">

                                    <option value="-" selected>-</option>
                                    <?php foreach ($pelayanan as $row) {
                                    ?>
                                        <option value="<?= $row['cara_klaim'] ?>"><?= $row['cara_klaim'] ?></option>

                                    <?php }
                                    ?>

                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-10">
                        <div class="form-group ">
                            <label class="control-label col-md-3">INVOICE</label>
                            <div class="col-md-9 has-success ">
                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inVendor" id="inVendor" onchange="getTotalInv(this.value)">

                                    <option value="-" selected>-</option>


                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-10">
                        <div class="form-group ">
                            <label class="control-label col-md-3 mt-10">NILAI YANG DIBAYAR</label>
                            <div class="col-md-9 has-success">

                                <input type="text" class="form-control" id="inHarga1">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="row" style="margin-top: 20px;margin-bottom:20px;">
                    <div class="col-md-6"> </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button onclick="simpan_bundle()" class="btn btn-primary mr-20 btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">SIMPAN SEMUA PEMBAYARAN</span></button>
                                <button onclick="cari()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="fa fa-search"></i><span class="btn-text">CARI</span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row collapse" id="collap_vendor">
                    <div class="col-sm-12">
                        <div class="panel-wrapper collapse in">
                            <div class="collapse" id="collap_obat_faktur1">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">FORM PEMBAYARAN</h6>
                                </div>
                                <div class="clearfix"></div>
                                <div id="formObat">
                                    <div class="row">
                                        <div class="col-md-6 mt-10">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3 mt-10">NILAI</label>
                                                <div class="col-md-9 has-success">

                                                    <input type="text" class="form-control" id="inTotal" disabled>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-10">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3 mt-10">NILAI YANG DIBAYAR</label>
                                                <div class="col-md-9 has-success">

                                                    <input type="text" class="form-control" id="inHarga">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6"> </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">

                                                    <input type="hidden" class="form-control " autocomplete="off" id="upId">

                                                    <button class="btn btn-primary mr-10" onclick="insertObatFaktur()">SIMPAN</button>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">LIST HUTANG</h6>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row mr-20 ml-20">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <div class="row mt-30 pull-right">
                                            <div class="col-md-12 ">
                                            </div>
                                        </div>
                                        <table id="table_vendor" class="table table-striped  table-hover display pb-30" width="100%">
                                            <thead>
                                                <tr class="bg-success">
                                                    <!-- <th><label for="check_all"><input id="check_all" type="checkbox" onClick="toggle(this)"> All</label></br></th> -->
                                                    <th>AKSI</th>
                                                    <th>NO RM</th>
                                                    <th>NAMA</th>
                                                    <th>TANGGAL PELAYANAN</th>
                                                    <th>NILAI OUT STANDING</th>
                                                    <th>NILAI YANG DIBAYAR</th>
                                                </tr>
                                            </thead>

                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20 mb-20" style="margin-left: 10px;">
                                <div class="col-md-6">

                                    <button onclick="simpan_bukti()" class="btn btn-primary btn-anim  btn-lg" type="button"><i class="icon-rocket"></i><span class="btn-text">SIMPAN </span></button>

                                </div>
                                <div class="col-md-6">
                                    <div class="table-responsive ">
                                        <table class="table table-hover display " id="outTotalHarga">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th style="font-weight:bold;">Total Pembayaran Piutang</th>
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

        </div>
    </div>
</div>


<style>
    td {
        color: black;
    }
</style>
<!--end modal edit-->
<script type="text/javascript">
    function tambah_detailx() {

        $(".modal-pendaftaranakun").modal('show');
    }

    function pilihKlaim(elem) {
        $.ajax({
            url: "<?= base_url() . 'Jurnal_utang_piutang/getVendor_piutang' ?>",
            type: 'POST',
            dataType: 'json',
            data: {
                klaim: elem,
            },
            success: function(data) {
                var html = '';
                var i;
                html = '<option>-</option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].no_jurnal + '|' + data[i].pk + '>' + data[i].pk + '</option>';
                }
                $('#inVendor').html(html);
            }
        });

    }

    function getTotalInv(elem) {
        a = $('#inVendor').val();
        var splitDiag = a.split('|');
        vendor = splitDiag[0];
        inv = splitDiag[1];
        $.ajax({
            url: "<?= base_url() . 'Jurnal_utang_piutang/getTotalInv' ?>",
            type: 'POST',
            dataType: 'json',
            data: {
                inv: inv,
            },
            success: function(data) {
                $('#inHarga1').val(data.total);
            }
        });

    }

    function cari() {
        a = $('#inVendor').val();
        var splitDiag = a.split('|');
        vendor = splitDiag[0];
        inv = splitDiag[1];

        $('#table_vendor').dataTable().fnClearTable();
        $('#table_vendor').dataTable().fnDestroy();
        $('#table_vendor').DataTable({
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
                "url": '<?php echo base_url('Jurnal_utang_piutang/tampil_pasien_by_inv'); ?>',
                "type": 'POST',
                "data": {
                    idFaktur: vendor
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
        $("#collap_vendor").collapse('toggle');
        reload_total_harga(inv);

    }

    function pilih_list_faktur(id_detail, total) {
        $("#upId").val(id_detail);
        $("#inTotal").val(total);
        $("#inHarga").val(total);
        $("#collap_obat_faktur1").collapse('toggle');
    }

    function insertObatFaktur() {
        id_faktur = $("#upId").val();
        harga = $("#inHarga").val();
        tipe = $('#inTipe').val();
        a = $('#inVendor').val();
        var splitDiag = a.split('|');
        vendor = splitDiag[0];
        inv = splitDiag[1];
        tgl_faktur = $("#tgl_faktur").val();
        // alert(total);

        dataString = 'idFaktur=' + id_faktur + '&harga=' + harga +
            '&no_dok=' + inv + '&vendor=' + tipe + '&no_jurnal=' + vendor + '&tgl_faktur=' + tgl_faktur;


        $.ajax({
            url: "<?= base_url() . 'Jurnal_utang_piutang/insertdetail_piutang' ?>",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "FAKTUR Berhasil ditambahkan",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#collap_obat_faktur1").collapse('hide');
                    $("#upId").val("");
                    $("#inHarga").val("");
                    $('#outTotalHarga').DataTable().ajax.reload();
                    $('#table_vendor').DataTable().ajax.reload();

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

    function simpan_bukti() {
        a = $('#inVendor').val();
        var splitDiag = a.split('|');
        vendor = splitDiag[0];
        inv = splitDiag[1];
        tipe = $("#inTipe").val();
        vendor = $("#inVendor").val();
        // alert(total);

        dataString = 'no_dok=' + inv + '&tipe=' + tipe + '&vendor=' + vendor + '&tgl_faktur=' + tgl_faktur;


        $.ajax({
            url: "<?= base_url() . 'Jurnal_utang_piutang/simpan_bukti' ?>",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Invoice " + inv + " Berhasil Disimpan",
                        confirmButtonColor: "#3cb878",
                        confirmButtonText: "OK",
                    }, function() {
                        $().ready(function() {
                            window.location.href = '<?php echo base_url() ?>Jurnal_utang_piutang/Pembayaran_piutang';
                        });
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
    }

    function simpan_bundle() {
        tgl_faktur = $("#tgl_faktur").val();
        tipe = $('#inTipe').val();
        a = $('#inVendor').val();
        var splitDiag = a.split('|');
        vendor = splitDiag[0];
        inv = splitDiag[1];
        harga = $("#inHarga1").val();
        // alert(total);

        dataString = 'no_dok=' + inv + '&vendor=' + tipe + '&harga=' + harga +
            '&no_jurnal=' + vendor + '&tgl_faktur=' + tgl_faktur;

        $.ajax({
            url: "<?= base_url() . 'Jurnal_utang_piutang/simpan_bundle_piutang' ?>",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Invoice " + inv + " Berhasil Disimpan",
                        confirmButtonColor: "#3cb878",
                        confirmButtonText: "OK",
                    }, function() {
                        $().ready(function() {
                            window.location.href = '<?php echo base_url() ?>Jurnal_utang_piutang/Pembayaran_piutang';
                        });
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
    }

    // function verifikasi(no_dokumen, status, tipe) {
    //     if (status == 99) {
    //         mess = "Dibatalkan";
    //     } else {
    //         mess = "Disimpan"
    //     }

    //     $.ajax({
    //         url: "<?= base_url() . 'Jurnal_farmasi/verifikasi' ?>",
    //         data: {
    //             no_dok: no_dokumen,
    //             status: status,
    //             tipe: tipe
    //         },
    //         type: 'POST',
    //         dataType: 'json',
    //         success: function(data) {
    //             if (data.status == "success") {
    //                 swal({
    //                     title: "good job!",
    //                     type: "success",
    //                     text: " " + no_dokumen + " Berhasil " + mess,
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
    //     });

    // }

    function reload_total_harga(id_faktur) {
        $('#outTotalHarga').dataTable().fnClearTable();
        $('#outTotalHarga').dataTable().fnDestroy();
        $('#outTotalHarga').DataTable({
           
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
                "url": '<?php echo base_url('Jurnal_utang_piutang/tampil_total_piutang'); ?>',
                "type": 'POST',
                "data": {
                    idFaktur: id_faktur
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

<!--end tampil data-->