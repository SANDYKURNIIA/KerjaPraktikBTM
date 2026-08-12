<<<<<<< HEAD
<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">VERIFIKASI <?= strtoupper($tipe) ?> FARMASI</span></h6>
        </div>
    </div>
    <div class="panel-body">
        <div class="clearfix"></div>
        <div class="row mt-30">
            
            <h6 class="txt-dark capitalize-font"><i class="icon-money mr-10 mt-20"></i>PERIODE</h6>
            <hr>
            <div class="col-md-12">

                <div class="col-md-4">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Tanggal Mulai</label>
                        <div class="col-md-9 has-success">
                            <input type="date" class="form-control " id="inTglMulai">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Tanggal Akhir</label>
                        <div class="col-md-9 has-success">
                            <input type="date" class="form-control " id="inTglAkhir">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Tanggal Verifikasi</label>
                        <div class="col-md-9 has-success">
                            <input type="date" class="form-control " id="inTglVerifikasi">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row mt-30">
            <div class="col-md-12 mt-20">
                <button class="btn btn-primary btn-anim btn-sm1 mr-10" onclick="setJurnal();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span></button>
                <button class="btn btn-info btn-anim btn-sm1 mr-10" onclick="verifikasi();"><i class="icon-rocket"></i><span class="btn-text">VERIFIKASI</span></button>
                <!-- <button class="btn btn-success btn-anim btn-sm1 mr-10" onclick="cetak();"><i class="icon-printer"></i><span class="btn-text">CETAK</span></button> -->

            </div>
        </div>

    </div>

    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <div class="row mt-30 pull-right">
                        <div class="col-md-12 ">


                        </div>
                    </div>
                    <table id="datable" class="table table-hover display pb-30" width="100%">
                        <thead>
                            <tr class="bg-success">
                                <th><label for="check_all"><input id="check_all" type="checkbox" onClick="toggle(this)"> All</label></br></th>
                                <th>No</th>
                                <?php if ($tipe == "persediaan") { ?>
                                    <th>No Faktur</th>
                                    <th>No PO</th>
                                    <th>No NPB</th>
                                    <th>Tanggal Faktur</th>
                                    <th>Tanggal PO</th>
                                    <th>Vendor</th>
                                    <th>Jumlah</th>
                                <?php } else { ?>
                                    <th>No Jurnal</th>
                                    <th>No PO</th>
                                    <th>No Faktur</th>
                                    <th>No NPB</th>
                                    <th>Vendor</th>
                                    <th>Tanggal Jurnal</th>
                                    <th>Jumlah</th>
                                <?php } ?>
                            </tr>
                        </thead>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<div id="div_result" style="display: none;"></div>

<style>
    td {
        color: black;
    }
</style>

<script>
    $(document).ready(function() {
        $('#datable').DataTable({

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
                "url": '<?= base_url('Jurnal_farmasi/tampil_data_verifikasi_farmasi'); ?>',
                "type": 'POST',
                "data": {
                    tipe: '<?= $tipe ?>',
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

    function setJurnal() {
        $('#datable').DataTable().destroy();
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        $('#datable').DataTable({
            "retrieve": true,
            "dom": 'Bfrtip',
            "buttons": ['csv', 'excel', 'pdf'],
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
                "url": '<?= base_url('Jurnal_farmasi/tampil_data_verifikasi_farmasi'); ?>',
                "type": 'POST',
                "data": {
                    mulai: mulai,
                    akhir: akhir,
                    tipe: '<?= $tipe ?>',


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
    function toggle(source) {
        if ($('#check_all').is(":checked")) {
            $('input[name="check[]"]').prop("checked", true);
        } else {
            $('input[name="check[]"]').prop("checked", false);

        }
    }

    function verifikasi() {
        var fav = [];
        $.each($("input[name='check[]']:checked"), function() {
            fav.push($(this).val());
        });
        tgl_verif = $("#inTglVerifikasi").val();

        // alert(fav);
        // fav = $('#fav').val();
        $.ajax({
            url: "<?= base_url() . 'Jurnal_farmasi/setVerifikasi_farmasi' ?>",
            data: {
                req: fav,
                tgl_verif: tgl_verif,
                tipe:'<?=$tipe?>'
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data berhasil diverifikasi",
                        confirmButtonColor: "#3cb878",
                    });
                    // $("#modal_edit_data").modal('hide');
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

    function cetak() {
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();

        $.ajax({
            type: 'POST',
            url: "<?= base_url() . 'Jurnal_farmasi/cetak_verifikasi' ?>",
            data: {
                mulai: mulai,
                akhir: akhir,
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
                a.document.close();
                // a.print();

            }
        });

    }

   
=======
<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">VERIFIKASI <?= strtoupper($tipe) ?> FARMASI</span></h6>
        </div>
    </div>
    <div class="panel-body">
        <div class="clearfix"></div>
        <div class="row mt-30">
            
            <h6 class="txt-dark capitalize-font"><i class="icon-money mr-10 mt-20"></i>PERIODE</h6>
            <hr>
            <div class="col-md-12">

                <div class="col-md-4">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Tanggal Mulai</label>
                        <div class="col-md-9 has-success">
                            <input type="date" class="form-control " id="inTglMulai">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Tanggal Akhir</label>
                        <div class="col-md-9 has-success">
                            <input type="date" class="form-control " id="inTglAkhir">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Tanggal Verifikasi</label>
                        <div class="col-md-9 has-success">
                            <input type="date" class="form-control " id="inTglVerifikasi">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row mt-30">
            <div class="col-md-12 mt-20">
                <button class="btn btn-primary btn-anim btn-sm1 mr-10" onclick="setJurnal();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span></button>
                <button class="btn btn-info btn-anim btn-sm1 mr-10" onclick="verifikasi();"><i class="icon-rocket"></i><span class="btn-text">VERIFIKASI</span></button>
                <!-- <button class="btn btn-success btn-anim btn-sm1 mr-10" onclick="cetak();"><i class="icon-printer"></i><span class="btn-text">CETAK</span></button> -->

            </div>
        </div>

    </div>

    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <div class="row mt-30 pull-right">
                        <div class="col-md-12 ">


                        </div>
                    </div>
                    <table id="datable" class="table table-hover display pb-30" width="100%">
                        <thead>
                            <tr class="bg-success">
                                <th><label for="check_all"><input id="check_all" type="checkbox" onClick="toggle(this)"> All</label></br></th>
                                <th>No</th>
                                <?php if ($tipe == "persediaan") { ?>
                                    <th>No Faktur</th>
                                    <th>No PO</th>
                                    <th>No NPB</th>
                                    <th>Tanggal Faktur</th>
                                    <th>Tanggal PO</th>
                                    <th>Vendor</th>
                                    <th>Jumlah</th>
                                <?php } else { ?>
                                    <th>No Jurnal</th>
                                    <th>No PO</th>
                                    <th>No Faktur</th>
                                    <th>No NPB</th>
                                    <th>Vendor</th>
                                    <th>Tanggal Jurnal</th>
                                    <th>Jumlah</th>
                                <?php } ?>
                            </tr>
                        </thead>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<div id="div_result" style="display: none;"></div>

<style>
    td {
        color: black;
    }
</style>

<script>
    $(document).ready(function() {
        $('#datable').DataTable({

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
                "url": '<?= base_url('Jurnal_farmasi/tampil_data_verifikasi_farmasi'); ?>',
                "type": 'POST',
                "data": {
                    tipe: '<?= $tipe ?>',
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

    function setJurnal() {
        $('#datable').DataTable().destroy();
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        $('#datable').DataTable({
            "retrieve": true,
            "dom": 'Bfrtip',
            "buttons": ['csv', 'excel', 'pdf'],
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
                "url": '<?= base_url('Jurnal_farmasi/tampil_data_verifikasi_farmasi'); ?>',
                "type": 'POST',
                "data": {
                    mulai: mulai,
                    akhir: akhir,
                    tipe: '<?= $tipe ?>',


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
    function toggle(source) {
        if ($('#check_all').is(":checked")) {
            $('input[name="check[]"]').prop("checked", true);
        } else {
            $('input[name="check[]"]').prop("checked", false);

        }
    }

    function verifikasi() {
        var fav = [];
        $.each($("input[name='check[]']:checked"), function() {
            fav.push($(this).val());
        });
        tgl_verif = $("#inTglVerifikasi").val();

        // alert(fav);
        // fav = $('#fav').val();
        $.ajax({
            url: "<?= base_url() . 'Jurnal_farmasi/setVerifikasi_farmasi' ?>",
            data: {
                req: fav,
                tgl_verif: tgl_verif,
                tipe:'<?=$tipe?>'
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data berhasil diverifikasi",
                        confirmButtonColor: "#3cb878",
                    });
                    // $("#modal_edit_data").modal('hide');
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

    function cetak() {
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();

        $.ajax({
            type: 'POST',
            url: "<?= base_url() . 'Jurnal_farmasi/cetak_verifikasi' ?>",
            data: {
                mulai: mulai,
                akhir: akhir,
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
                a.document.close();
                // a.print();

            }
        });

    }

   
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>