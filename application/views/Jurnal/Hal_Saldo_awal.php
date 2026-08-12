<<<<<<< HEAD
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">JURNAL SALDO AWAL</span></h6>
        </div>



        <div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-md-3" align="left">
            <button class="btn btn-default btn-anim" onclick="window.location.href='javascript:history.go(-1)';" type="submit" style="margin-left: 40px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></button>
        </div>
        <div class="col-md-9" align="right">
            <button class="btn btn-info btn-anim mr-10" data-toggle="modal" onclick="verifikasi()"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
            <!-- <button class="btn btn-primary btn-anim mr-10" data-toggle="modal" onclick="cetak()"><i class="icon-printer"></i><span class="btn-text">CETAK</span></button> -->
            <a href="<?php echo base_url('Jurnal_manual/export_saldo_awal/') . $id . '/' . $tahun ?>" class="btn btn-primary btn-anim btn-sm1" target="_blank"><i class="fas fa fa-print"></i><span class="btn-text">EXCEL</span></a>

            <button class="btn btn-success btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" onclick="tambah_obat_faktur()"><i class="icon-plus"></i><span class="btn-text">TAMBAH AYAT</span></button>
        </div>
    </div>

    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <!-- <form id="form-filter" class="form-horizontal"> -->

            <div class="table-wrap">
                <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

                <div class="table-responsive">
                    <table class="table table-hover display  pb-30" id="datable">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>REKENING</th>
                                <th>NILAI</th>
                                <th>DESKRIPSI REKENING</th>
                                <th>EDIT</th>
                                <th>HAPUS</th>
                            </tr>
                        </thead>
                        <tbody style="color: black">

                        </tbody>

                    </table>
                </div>
            </div>
            <div class="row mt-20" style="margin-left: 10px;">
                <div class="col-md-6">


                </div>
                <div class="col-md-6">
                    <div class="table-responsive ">
                        <table class="table table-hover display " id="outTotalHarga">
                            <thead>
                                <tr class="bg-success">
                                    <th style="font-weight:bold;">Total</th>
                                </tr>
                            </thead>
                            <tbody style="color: black">
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="row mb-20" style="margin-left: 10px;">
                <div class="col-md-6">


                </div>
                <div class="col-md-6">
                    <div class="table-responsive ">

                        <table class="table table-hover display " id="outTotalHarga1">
                            <thead>
                                <tr class="bg-success">
                                    <th style="font-weight:bold;">Total Debit</th>
                                    <th style="font-weight:bold;">Total Kredit</th>

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
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->

        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <!-- sample modal content -->
                <div class="modal fade" id="modalTambahObatFaktur" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO JURNAL
                                </h5>
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="panel-heading">
                                            <div class="pull-left">
                                                <h6 class="panel-title txt-dark">LIST JURNAL</h6>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="row">

                                            <div class="form-wrap">

                                                <input type="hidden" class="form-control " autocomplete="off" id="inFaktur" value="<?= $id ?>">

                                                <div class="row">
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">KATEGORI</label>
                                                            <div class="col-md-9 has-success ">
                                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inKategori" id="inKategori">

                                                                    <option value="">PILIH</option>

                                                                </select>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">TIPE</label>
                                                            <div class="col-md-9 has-success ">
                                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inTipe" id="inTipe">

                                                                    <option value="-" selected>-</option>
                                                                    <option value="DEBIT">DEBIT</option>
                                                                    <option value="KREDIT">KREDIT</option>

                                                                </select>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3 mt-10">NILAI</label>
                                                            <div class="col-md-9 has-success">
                                                                <input type="number" class="form-control" autocomplete="off" value="" id="inNilai">

                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row" style="margin-top: 20px;">
                                                    <div class="col-md-6"> </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" style="display: block;" class="btn btn-success mr-10" onclick="insertObatFaktur()">TAMBAH AYAT JURNAL</button>
                                                                <!-- <button type="submit" style="display: none;" class="btn btn-warning mr-10" onclick="insertObatFaktur()">EDIT</button> -->
                                                                <span></span>
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
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->

        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <!-- sample modal content -->
                <div class="modal fade" id="modal_edit" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO JURNAL
                                </h5>
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="panel-heading">
                                            <div class="pull-left">
                                                <h6 class="panel-title txt-dark">LIST JURNAL</h6>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="row">

                                            <div class="form-wrap">

                                                <!-- <input type="hidden" class="form-control " autocomplete="off" id="inFaktur" value="</?= $id ?>"> -->
                                                <input type="hidden" class="form-control " autocomplete="off" id="upId">

                                                <div class="row">


                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3 mt-10">NILAI</label>
                                                            <div class="col-md-9 has-success">
                                                                <input type="number" class="form-control" autocomplete="off" value="" id="upNilai">

                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row" style="margin-top: 20px;">
                                                    <div class="col-md-6"> </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" style="display: block;" class="btn btn-success mr-10" onclick="updateObatFaktur()">EDIT AYAT JURNAL</button>
                                                                <!-- <button type="submit" style="display: none;" class="btn btn-warning mr-10" onclick="insertObatFaktur()">EDIT</button> -->
                                                                <span></span>
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
                </div>
            </div>
        </div>
    </div>
</div>



<div id="div_result" style="display: none;"></div>
<!--end modal edit-->
<script type="text/javascript">
    $(document).ready(function() {


    });
</script>
<script type="text/javascript">
    function tambah_obat_faktur() {
        $.ajax({
            url: "<?= base_url() . 'Jurnal_manual/get_akun_saldo' ?>",
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html = '<option>-</option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value="' + data[i].kode + "|" + data[i].deskripsi + '">' + data[i].deskripsi + ' (' + data[i].kode + ')</option>';
                }
                $('#inKategori').html(html);
            }
        });
        $("#modalTambahObatFaktur").modal('show');
    }

    //end


    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    //end uang


    //insert data 

    function insertObatFaktur() {

        a = $('#inKategori').val();
        var splitDiag = a.split('|');
        kategori = splitDiag[0];
        deskripsi = splitDiag[1];
        tipe = $("#inTipe").val();
        nilai = $("#inNilai").val();
        id_jurnal = $("#inFaktur").val();
        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Jurnal_manual/insert_detail_saldo_awal",
                method: "POST",
                dataType: 'json',
                data: {
                    id_jurnal: id_jurnal,
                    akun: kategori,
                    deskripsi: deskripsi,
                    nilai: nilai,
                    tipe: tipe,

                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data Berhasil ditambahkan",
                            confirmButtonColor: "#3cb878",
                        });
                        $("#modalTambahObatFaktur").modal('hide');

                        $("#inKategori").val('').change();
                        $("#inDesk").val('');
                        $("#inNilai").val('');
                        $("#inTipe").val('-').change();

                        $('#datable').DataTable().ajax.reload();
                        $('#outTotalHarga').DataTable().ajax.reload();
                        $('#outTotalHarga1').DataTable().ajax.reload();

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

    function updateObatFaktur() {

        nilai = $("#upNilai").val();
        id_detail = $("#upId").val();
        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Jurnal_manual/edit_detail_saldo_awal",
                method: "POST",
                dataType: 'json',
                data: {
                    id_detail: id_detail,
                    nilai: nilai,

                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data Berhasil ditambahkan",
                            confirmButtonColor: "#3cb878",
                        });
                        $("#modal_edit").modal('hide');

                        $("#upNilai").val('');
                        $("#upId").val('');

                        $('#datable').DataTable().ajax.reload();
                        $('#outTotalHarga').DataTable().ajax.reload();
                        $('#outTotalHarga1').DataTable().ajax.reload();

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

    function edit_faktur($id,$nama) {

        $("#modal_edit").modal('toggle');

        $("#upNilai").val($nama);
        $("#upId").val($id);
    }

    function hapus_list_faktur(id_detail) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Jurnal_manual/hapus_detail_saldo_awal",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_detail: id_detail,
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
                            $('#outTotalHarga').DataTable().ajax.reload();
                            $('#outTotalHarga1').DataTable().ajax.reload();

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
<!--percobaan1-->
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
                "url": '<?= base_url('Jurnal_manual/tampil_detail_saldo_awal'); ?>',
                "type": 'POST',
                "data": {
                    idFaktur: '<?= $id ?>'
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
                    "sLast": "Terakhir"
                },
            },
            "ajax": {
                "url": '<?= base_url('Jurnal_manual/tampil_total_saldo_awal'); ?>',
                "type": 'POST',
                "data": {
                    idFaktur: '<?= $id ?>'
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
        $('#outTotalHarga1').DataTable({
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
                    "sLast": "Terakhir"
                },
            },
            "ajax": {
                "url": '<?= base_url('Jurnal_manual/tampil_total_saldo_awal_dk'); ?>',
                "type": 'POST',
                "data": {
                    idFaktur: '<?= $id ?>'
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



    //end tampil range data
</script>
<script type="text/javascript">
    function verifikasi() {

        $.ajax({
            url: "<?= base_url() . 'Jurnal_manual/simpan_saldo_awal' ?>",
            data: {
                no_jurnal: <?= $id ?>,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Jurnal Saldo Awal Berhasil Disimpan",
                        confirmButtonColor: "#3cb878",
                        confirmButtonText: "OK",
                    }, function() {
                        $().ready(function() {
                            window.location.href = '<?php echo base_url('Jurnal_manual/Saldo_awal') ?>';
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

    function cetak() {

        $.ajax({
            type: 'POST',
            url: "<?= base_url() . 'Jurnal_manual/cetak_saldo_awal' ?>",
            data: {
                no_jurnal: <?= $id ?>,
            },
            dataType: "html",
            success: function(msg) {
                $("#div_result").html(msg);
                var divContents = document.getElementById("div_result").innerHTML;
                // var a = window.open('', '', 'height=500, width=500');
                var a = window.open();
                a.document.write('<html>');
                // a.document.write('<head><style type="text/css"> @page {size: A4;margin: 0;} body { margin: 0; } </style> </head>');
                a.document.write('<body >');
                a.document.write(divContents);
                a.document.write('</body>');
                a.document.write('</html>');
                setTimeout(function() { // wait until all resources loaded 
                    a.document.close(); // necessary for IE >= 10
                    a.focus(); // necessary for IE >= 10
                    // a.print(); // change window to winPrint
                    // a.close(); // change window to winPrint
                }, 100);
            }
        });
    }
</script>

=======
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">JURNAL SALDO AWAL</span></h6>
        </div>



        <div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-md-3" align="left">
            <button class="btn btn-default btn-anim" onclick="window.location.href='javascript:history.go(-1)';" type="submit" style="margin-left: 40px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></button>
        </div>
        <div class="col-md-9" align="right">
            <button class="btn btn-info btn-anim mr-10" data-toggle="modal" onclick="verifikasi()"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
            <!-- <button class="btn btn-primary btn-anim mr-10" data-toggle="modal" onclick="cetak()"><i class="icon-printer"></i><span class="btn-text">CETAK</span></button> -->
            <a href="<?php echo base_url('Jurnal_manual/export_saldo_awal/') . $id . '/' . $tahun ?>" class="btn btn-primary btn-anim btn-sm1" target="_blank"><i class="fas fa fa-print"></i><span class="btn-text">EXCEL</span></a>

            <button class="btn btn-success btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" onclick="tambah_obat_faktur()"><i class="icon-plus"></i><span class="btn-text">TAMBAH AYAT</span></button>
        </div>
    </div>

    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <!-- <form id="form-filter" class="form-horizontal"> -->

            <div class="table-wrap">
                <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

                <div class="table-responsive">
                    <table class="table table-hover display  pb-30" id="datable">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>REKENING</th>
                                <th>NILAI</th>
                                <th>DESKRIPSI REKENING</th>
                                <th>EDIT</th>
                                <th>HAPUS</th>
                            </tr>
                        </thead>
                        <tbody style="color: black">

                        </tbody>

                    </table>
                </div>
            </div>
            <div class="row mt-20" style="margin-left: 10px;">
                <div class="col-md-6">


                </div>
                <div class="col-md-6">
                    <div class="table-responsive ">
                        <table class="table table-hover display " id="outTotalHarga">
                            <thead>
                                <tr class="bg-success">
                                    <th style="font-weight:bold;">Total</th>
                                </tr>
                            </thead>
                            <tbody style="color: black">
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="row mb-20" style="margin-left: 10px;">
                <div class="col-md-6">


                </div>
                <div class="col-md-6">
                    <div class="table-responsive ">

                        <table class="table table-hover display " id="outTotalHarga1">
                            <thead>
                                <tr class="bg-success">
                                    <th style="font-weight:bold;">Total Debit</th>
                                    <th style="font-weight:bold;">Total Kredit</th>

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
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->

        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <!-- sample modal content -->
                <div class="modal fade" id="modalTambahObatFaktur" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO JURNAL
                                </h5>
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="panel-heading">
                                            <div class="pull-left">
                                                <h6 class="panel-title txt-dark">LIST JURNAL</h6>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="row">

                                            <div class="form-wrap">

                                                <input type="hidden" class="form-control " autocomplete="off" id="inFaktur" value="<?= $id ?>">

                                                <div class="row">
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">KATEGORI</label>
                                                            <div class="col-md-9 has-success ">
                                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inKategori" id="inKategori">

                                                                    <option value="">PILIH</option>

                                                                </select>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">TIPE</label>
                                                            <div class="col-md-9 has-success ">
                                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inTipe" id="inTipe">

                                                                    <option value="-" selected>-</option>
                                                                    <option value="DEBIT">DEBIT</option>
                                                                    <option value="KREDIT">KREDIT</option>

                                                                </select>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3 mt-10">NILAI</label>
                                                            <div class="col-md-9 has-success">
                                                                <input type="number" class="form-control" autocomplete="off" value="" id="inNilai">

                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row" style="margin-top: 20px;">
                                                    <div class="col-md-6"> </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" style="display: block;" class="btn btn-success mr-10" onclick="insertObatFaktur()">TAMBAH AYAT JURNAL</button>
                                                                <!-- <button type="submit" style="display: none;" class="btn btn-warning mr-10" onclick="insertObatFaktur()">EDIT</button> -->
                                                                <span></span>
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
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->

        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <!-- sample modal content -->
                <div class="modal fade" id="modal_edit" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO JURNAL
                                </h5>
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="panel-heading">
                                            <div class="pull-left">
                                                <h6 class="panel-title txt-dark">LIST JURNAL</h6>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="row">

                                            <div class="form-wrap">

                                                <!-- <input type="hidden" class="form-control " autocomplete="off" id="inFaktur" value="</?= $id ?>"> -->
                                                <input type="hidden" class="form-control " autocomplete="off" id="upId">

                                                <div class="row">


                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3 mt-10">NILAI</label>
                                                            <div class="col-md-9 has-success">
                                                                <input type="number" class="form-control" autocomplete="off" value="" id="upNilai">

                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row" style="margin-top: 20px;">
                                                    <div class="col-md-6"> </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" style="display: block;" class="btn btn-success mr-10" onclick="updateObatFaktur()">EDIT AYAT JURNAL</button>
                                                                <!-- <button type="submit" style="display: none;" class="btn btn-warning mr-10" onclick="insertObatFaktur()">EDIT</button> -->
                                                                <span></span>
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
                </div>
            </div>
        </div>
    </div>
</div>



<div id="div_result" style="display: none;"></div>
<!--end modal edit-->
<script type="text/javascript">
    $(document).ready(function() {


    });
</script>
<script type="text/javascript">
    function tambah_obat_faktur() {
        $.ajax({
            url: "<?= base_url() . 'Jurnal_manual/get_akun_saldo' ?>",
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html = '<option>-</option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value="' + data[i].kode + "|" + data[i].deskripsi + '">' + data[i].deskripsi + ' (' + data[i].kode + ')</option>';
                }
                $('#inKategori').html(html);
            }
        });
        $("#modalTambahObatFaktur").modal('show');
    }

    //end


    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    //end uang


    //insert data 

    function insertObatFaktur() {

        a = $('#inKategori').val();
        var splitDiag = a.split('|');
        kategori = splitDiag[0];
        deskripsi = splitDiag[1];
        tipe = $("#inTipe").val();
        nilai = $("#inNilai").val();
        id_jurnal = $("#inFaktur").val();
        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Jurnal_manual/insert_detail_saldo_awal",
                method: "POST",
                dataType: 'json',
                data: {
                    id_jurnal: id_jurnal,
                    akun: kategori,
                    deskripsi: deskripsi,
                    nilai: nilai,
                    tipe: tipe,

                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data Berhasil ditambahkan",
                            confirmButtonColor: "#3cb878",
                        });
                        $("#modalTambahObatFaktur").modal('hide');

                        $("#inKategori").val('').change();
                        $("#inDesk").val('');
                        $("#inNilai").val('');
                        $("#inTipe").val('-').change();

                        $('#datable').DataTable().ajax.reload();
                        $('#outTotalHarga').DataTable().ajax.reload();
                        $('#outTotalHarga1').DataTable().ajax.reload();

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

    function updateObatFaktur() {

        nilai = $("#upNilai").val();
        id_detail = $("#upId").val();
        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Jurnal_manual/edit_detail_saldo_awal",
                method: "POST",
                dataType: 'json',
                data: {
                    id_detail: id_detail,
                    nilai: nilai,

                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data Berhasil ditambahkan",
                            confirmButtonColor: "#3cb878",
                        });
                        $("#modal_edit").modal('hide');

                        $("#upNilai").val('');
                        $("#upId").val('');

                        $('#datable').DataTable().ajax.reload();
                        $('#outTotalHarga').DataTable().ajax.reload();
                        $('#outTotalHarga1').DataTable().ajax.reload();

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

    function edit_faktur($id,$nama) {

        $("#modal_edit").modal('toggle');

        $("#upNilai").val($nama);
        $("#upId").val($id);
    }

    function hapus_list_faktur(id_detail) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Jurnal_manual/hapus_detail_saldo_awal",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_detail: id_detail,
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
                            $('#outTotalHarga').DataTable().ajax.reload();
                            $('#outTotalHarga1').DataTable().ajax.reload();

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
<!--percobaan1-->
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
                "url": '<?= base_url('Jurnal_manual/tampil_detail_saldo_awal'); ?>',
                "type": 'POST',
                "data": {
                    idFaktur: '<?= $id ?>'
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
                    "sLast": "Terakhir"
                },
            },
            "ajax": {
                "url": '<?= base_url('Jurnal_manual/tampil_total_saldo_awal'); ?>',
                "type": 'POST',
                "data": {
                    idFaktur: '<?= $id ?>'
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
        $('#outTotalHarga1').DataTable({
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
                    "sLast": "Terakhir"
                },
            },
            "ajax": {
                "url": '<?= base_url('Jurnal_manual/tampil_total_saldo_awal_dk'); ?>',
                "type": 'POST',
                "data": {
                    idFaktur: '<?= $id ?>'
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



    //end tampil range data
</script>
<script type="text/javascript">
    function verifikasi() {

        $.ajax({
            url: "<?= base_url() . 'Jurnal_manual/simpan_saldo_awal' ?>",
            data: {
                no_jurnal: <?= $id ?>,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Jurnal Saldo Awal Berhasil Disimpan",
                        confirmButtonColor: "#3cb878",
                        confirmButtonText: "OK",
                    }, function() {
                        $().ready(function() {
                            window.location.href = '<?php echo base_url('Jurnal_manual/Saldo_awal') ?>';
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

    function cetak() {

        $.ajax({
            type: 'POST',
            url: "<?= base_url() . 'Jurnal_manual/cetak_saldo_awal' ?>",
            data: {
                no_jurnal: <?= $id ?>,
            },
            dataType: "html",
            success: function(msg) {
                $("#div_result").html(msg);
                var divContents = document.getElementById("div_result").innerHTML;
                // var a = window.open('', '', 'height=500, width=500');
                var a = window.open();
                a.document.write('<html>');
                // a.document.write('<head><style type="text/css"> @page {size: A4;margin: 0;} body { margin: 0; } </style> </head>');
                a.document.write('<body >');
                a.document.write(divContents);
                a.document.write('</body>');
                a.document.write('</html>');
                setTimeout(function() { // wait until all resources loaded 
                    a.document.close(); // necessary for IE >= 10
                    a.focus(); // necessary for IE >= 10
                    // a.print(); // change window to winPrint
                    // a.close(); // change window to winPrint
                }, 100);
            }
        });
    }
</script>

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
<!--end tampil data-->