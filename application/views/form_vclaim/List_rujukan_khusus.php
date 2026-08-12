<<<<<<< HEAD
<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>

<div class="panel panel-success card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h1 class="panel-title txt-dark"><span class="label label-success font-weight-1000">LIST DATA RUJUKAN KHUSUS</span>
            </h1>
        </div>
        <div class="clearfix"></div>
    </div>
    <h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="row">

        <div class="clearfix"></div>
        <hr>
        <div class="row mt-30">
            <div class="col-md-12">
                <div class="col-md-6">

                    <div class="col-md-2">
                        <label class="mt-0 txt-dark">BULAN</label>

                    </div>
                    <div class="col-md-10">

                        <input type="month" autocomplete="off" id="inBulan" class="form-control">
                    </div>


                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
                </div>
            </div>
        </div>
        <!-- <div class="row mt-30">
            <div class="form-group">
                <div class="col-md-3 ">
                    <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilBulan();" style="margin-left: 30px;"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
                </div>
            </div>
        </div> -->
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display  pb-30">
                        <thead>
                            <tr class="bg-success">

                                <th>NO</th>
                                <th>CETAK</th>
                                <th>AKSI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                <th>NO RUJUKAN</th>
                                <th>NO KARTU</th>
                                <th>NAMA</th>
                                <th>DIAGNOSA</th>
                                <th>TANGGAL RUJUKAN</th>
                                <th>BATAS TANGGAL RUJUKAN</th>
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
<link rel="stylesheet" href="<?php echo base_url('assets/dist/jquery-ui.css'); ?>">
<script src="<?php echo base_url('assets/dist/jquery-ui.min.js'); ?>"></script>

<script type="text/javascript">
    function delete_ranap(no,idrujukan) {
        // nama = $("#NamaPasien").val();
        swal({
            title: "Apakah kamu yakin akan !",
            text: "Menghapus data ini ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Vclaim_bpjs/hapus_rujukan_khusus",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        no: no,
                        id: idrujukan,
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
                                text: data.data['message'],
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

        $('#datable').DataTable({
            pageLength: 5,
            lengthMenu: [
                [5, 10, 20, -1],
                [5, 10, 20, 'All']
            ],
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
                "url": '<?php echo base_url('Vclaim_bpjs/listRujukanKhusus'); ?>',
                "type": 'POST',
                "data": {
                    bulan: '<?= date('Y-m-d') ?>',
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
                "url": '<?= base_url('Vclaim_bpjs/listRujukanKhusus'); ?>',
                "type": 'POST',
                "data": {
                    bulan: '<?= date('Y-m-d') ?>',
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

    function tampilRangePermit() {
        $('#datable').DataTable().destroy();
        var bulan = $("#inBulan").val();


        $('#datable').DataTable({
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
                "url": '<?= base_url('Vclaim_bpjs/listRujukanKhusus'); ?>',
                "type": 'POST',
                "data": {
                    bulan: bulan,

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
<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>

<div class="panel panel-success card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h1 class="panel-title txt-dark"><span class="label label-success font-weight-1000">LIST DATA RUJUKAN KHUSUS</span>
            </h1>
        </div>
        <div class="clearfix"></div>
    </div>
    <h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="row">

        <div class="clearfix"></div>
        <hr>
        <div class="row mt-30">
            <div class="col-md-12">
                <div class="col-md-6">

                    <div class="col-md-2">
                        <label class="mt-0 txt-dark">BULAN</label>

                    </div>
                    <div class="col-md-10">

                        <input type="month" autocomplete="off" id="inBulan" class="form-control">
                    </div>


                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
                </div>
            </div>
        </div>
        <!-- <div class="row mt-30">
            <div class="form-group">
                <div class="col-md-3 ">
                    <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilBulan();" style="margin-left: 30px;"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
                </div>
            </div>
        </div> -->
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display  pb-30">
                        <thead>
                            <tr class="bg-success">

                                <th>NO</th>
                                <th>CETAK</th>
                                <th>AKSI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                <th>NO RUJUKAN</th>
                                <th>NO KARTU</th>
                                <th>NAMA</th>
                                <th>DIAGNOSA</th>
                                <th>TANGGAL RUJUKAN</th>
                                <th>BATAS TANGGAL RUJUKAN</th>
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
<link rel="stylesheet" href="<?php echo base_url('assets/dist/jquery-ui.css'); ?>">
<script src="<?php echo base_url('assets/dist/jquery-ui.min.js'); ?>"></script>

<script type="text/javascript">
    function delete_ranap(no,idrujukan) {
        // nama = $("#NamaPasien").val();
        swal({
            title: "Apakah kamu yakin akan !",
            text: "Menghapus data ini ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Vclaim_bpjs/hapus_rujukan_khusus",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        no: no,
                        id: idrujukan,
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
                                text: data.data['message'],
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

        $('#datable').DataTable({
            pageLength: 5,
            lengthMenu: [
                [5, 10, 20, -1],
                [5, 10, 20, 'All']
            ],
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
                "url": '<?php echo base_url('Vclaim_bpjs/listRujukanKhusus'); ?>',
                "type": 'POST',
                "data": {
                    bulan: '<?= date('Y-m-d') ?>',
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
                "url": '<?= base_url('Vclaim_bpjs/listRujukanKhusus'); ?>',
                "type": 'POST',
                "data": {
                    bulan: '<?= date('Y-m-d') ?>',
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

    function tampilRangePermit() {
        $('#datable').DataTable().destroy();
        var bulan = $("#inBulan").val();


        $('#datable').DataTable({
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
                "url": '<?= base_url('Vclaim_bpjs/listRujukanKhusus'); ?>',
                "type": 'POST',
                "data": {
                    bulan: bulan,

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