<<<<<<< HEAD
<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">JURNAL <?= strtoupper($tipe) ?> FARMASI</span></h6>
        </div>
        <div class="clearfix"></div>
        <div class="row mt-30">
            <div class="col-md-12">
                <!-- <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
                </div> -->

                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Mulai : </label>
                    <input type="date" autocomplete="off" id="inTglMulai" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Akhir : </label>
                    <input type="date" autocomplete="off" id="inTglAkhir" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Jurnal : </label>
                    <input type="date" autocomplete="off" id="inTglJurnal" class="form-control" value="<?= date('Y-m-d') ?>">
                </div>
                <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm1 mr-10" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
                        <button class="btn btn-info btn-anim btn-sm1 " onclick="setJurnal();"><i class="icon-rocket"></i><span class="btn-text">Buat Jurnal</span>


                </div>
                <div class="col-md-3 mt-20">
                </div>
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
                                <th>NO</th>
                                <?php if ($tipe == "hutang") { ?>
                                    <th>NO JURNAL</th>
                                <?php } ?>
                                <th>REKENING</th>
                                <th>NAMA</th>
                                <th>VENDOR</th>
                                <th>NO NPB</th>
                                <th>NO FAKTUR</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>

                    </table>

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
    function toggle(source) {
        if ($('#check_all').is(":checked")) {
            $('input[name="check[]"]').prop("checked", true);
        } else {
            $('input[name="check[]"]').prop("checked", false);

        }
    }

    function setJurnal() {
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        var fav = [];
        $.each($("input[name='check[]']:checked"), function() {
            fav.push($(this).val());
        });
        tgl = $("#inTglJurnal").val();
        if (Date.parse(tgl) < Date.parse(akhir)) {
            swal({
                title: "Gagal!",
                type: "warning",
                text: "Tanggal Jurnal Tidak Boleh Kurang Dari Tanggal Akhir Pilihan",
                confirmButtonColor: "#3cb878",
            });
        } else {

            var teks = "Melakukan jurnal pada tgl " + indo_date_js(new Date(tgl)) + " ?";

            swal({
                title: "Apakah kamu yakin?",
                text: teks,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3cb878",
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal",
                closeOnConfirm: false
            }, function() {
                $().ready(function() {

                    $.ajax({
                        url: "<?= base_url() . 'Jurnal_farmasi/setJurnalFarmasi' ?>",
                        data: {
                            mulai: mulai,
                            akhir: akhir,
                            req: fav,
                            tgl: tgl,
                            tipe: '<?= $tipe ?>'
                        },
                        type: 'POST',
                        dataType: 'json',
                        success: function(data) {
                            if (data.status == "success") {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Data berhasil ditambahkan",
                                    confirmButtonColor: "#3cb878",
                                });
                                // $("#na_tindakan").hide();
                                $('#datable').DataTable().ajax.reload();
                            } else {
                                swal({
                                    title: "Gagal!",
                                    type: "warning",
                                    text: data.message,
                                    confirmButtonColor: "#3cb878",
                                });
                            }
                        }
                    });
                });
            });
        }
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datable').DataTable({
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
                "url": '<?= base_url('Jurnal_farmasi/tampil_jurnal_farmasi'); ?>',
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

    function tampilHariIni() {
        $('#datable').DataTable().destroy();
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
                "url": '<?= base_url('Jurnal_farmasi/tampil_jurnal_farmasi'); ?>',
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
    }

    function tampilRangePermit(mulai, akhir, jenis_klaim) {
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
                "url": '<?= base_url('Jurnal_farmasi/tampil_jurnal_farmasi'); ?>',
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
=======
<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">JURNAL <?= strtoupper($tipe) ?> FARMASI</span></h6>
        </div>
        <div class="clearfix"></div>
        <div class="row mt-30">
            <div class="col-md-12">
                <!-- <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
                </div> -->

                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Mulai : </label>
                    <input type="date" autocomplete="off" id="inTglMulai" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Akhir : </label>
                    <input type="date" autocomplete="off" id="inTglAkhir" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Jurnal : </label>
                    <input type="date" autocomplete="off" id="inTglJurnal" class="form-control" value="<?= date('Y-m-d') ?>">
                </div>
                <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm1 mr-10" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
                        <button class="btn btn-info btn-anim btn-sm1 " onclick="setJurnal();"><i class="icon-rocket"></i><span class="btn-text">Buat Jurnal</span>


                </div>
                <div class="col-md-3 mt-20">
                </div>
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
                                <th>NO</th>
                                <?php if ($tipe == "hutang") { ?>
                                    <th>NO JURNAL</th>
                                <?php } ?>
                                <th>REKENING</th>
                                <th>NAMA</th>
                                <th>VENDOR</th>
                                <th>NO NPB</th>
                                <th>NO FAKTUR</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>

                    </table>

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
    function toggle(source) {
        if ($('#check_all').is(":checked")) {
            $('input[name="check[]"]').prop("checked", true);
        } else {
            $('input[name="check[]"]').prop("checked", false);

        }
    }

    function setJurnal() {
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        var fav = [];
        $.each($("input[name='check[]']:checked"), function() {
            fav.push($(this).val());
        });
        tgl = $("#inTglJurnal").val();
        if (Date.parse(tgl) < Date.parse(akhir)) {
            swal({
                title: "Gagal!",
                type: "warning",
                text: "Tanggal Jurnal Tidak Boleh Kurang Dari Tanggal Akhir Pilihan",
                confirmButtonColor: "#3cb878",
            });
        } else {

            var teks = "Melakukan jurnal pada tgl " + indo_date_js(new Date(tgl)) + " ?";

            swal({
                title: "Apakah kamu yakin?",
                text: teks,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3cb878",
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal",
                closeOnConfirm: false
            }, function() {
                $().ready(function() {

                    $.ajax({
                        url: "<?= base_url() . 'Jurnal_farmasi/setJurnalFarmasi' ?>",
                        data: {
                            mulai: mulai,
                            akhir: akhir,
                            req: fav,
                            tgl: tgl,
                            tipe: '<?= $tipe ?>'
                        },
                        type: 'POST',
                        dataType: 'json',
                        success: function(data) {
                            if (data.status == "success") {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Data berhasil ditambahkan",
                                    confirmButtonColor: "#3cb878",
                                });
                                // $("#na_tindakan").hide();
                                $('#datable').DataTable().ajax.reload();
                            } else {
                                swal({
                                    title: "Gagal!",
                                    type: "warning",
                                    text: data.message,
                                    confirmButtonColor: "#3cb878",
                                });
                            }
                        }
                    });
                });
            });
        }
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datable').DataTable({
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
                "url": '<?= base_url('Jurnal_farmasi/tampil_jurnal_farmasi'); ?>',
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

    function tampilHariIni() {
        $('#datable').DataTable().destroy();
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
                "url": '<?= base_url('Jurnal_farmasi/tampil_jurnal_farmasi'); ?>',
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
    }

    function tampilRangePermit(mulai, akhir, jenis_klaim) {
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
                "url": '<?= base_url('Jurnal_farmasi/tampil_jurnal_farmasi'); ?>',
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>