<<<<<<< HEAD
<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>

<div class="panel panel-success card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-light">MONITORING KUNJUNGAN</h6>
        </div>
        <div class="clearfix"></div>
    </div>
    <h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="row">

        <div class="clearfix"></div>
        <hr>
        <div class="row mt-30">
            <div class="col-md-12">

                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Jenis : </label>
                    <select class="form-control select2" placeholder="Choose a Category" tabindex="1" name="inJenis" id="inJenis">
                        <option value="2">R. Jalan</option>
                        <option value="1">R. Inap</option>
                    </select>
                    <span class="help-block"></span>
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal SEP : </label>
                    <input type="date" autocomplete="off" id="inTglSEP" class="form-control">
                </div>
                <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">CARI</span>
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
                                <th>NO KARTU</th>
                                <th>NAMA PASIEN</th>
                                <th>NO SEP</th>
                                <th>NO RUJUKAN</th>
                                <th>JENIS PELAYANAN</th>
                                <th>POLI</th>
                                <th>KELAS RAWAT</th>
                                <th>TANGGAL SEP</th>
                                <th>TANGGAL PULANG</th>
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
    function tampilRangePermit() {
        $('#datable').DataTable().destroy();
        jenis = $("#inJenis").val();
        tgl = $("#inTglSEP").val();

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
                "url": '<?= base_url('Vclaim_bpjs/getMonitoring'); ?>',
                "type": 'POST',
                "data": {
                    jenis: jenis,
                    tgl: tgl,
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
            <h6 class="panel-title txt-light">MONITORING KUNJUNGAN</h6>
        </div>
        <div class="clearfix"></div>
    </div>
    <h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="row">

        <div class="clearfix"></div>
        <hr>
        <div class="row mt-30">
            <div class="col-md-12">

                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Jenis : </label>
                    <select class="form-control select2" placeholder="Choose a Category" tabindex="1" name="inJenis" id="inJenis">
                        <option value="2">R. Jalan</option>
                        <option value="1">R. Inap</option>
                    </select>
                    <span class="help-block"></span>
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal SEP : </label>
                    <input type="date" autocomplete="off" id="inTglSEP" class="form-control">
                </div>
                <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">CARI</span>
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
                                <th>NO KARTU</th>
                                <th>NAMA PASIEN</th>
                                <th>NO SEP</th>
                                <th>NO RUJUKAN</th>
                                <th>JENIS PELAYANAN</th>
                                <th>POLI</th>
                                <th>KELAS RAWAT</th>
                                <th>TANGGAL SEP</th>
                                <th>TANGGAL PULANG</th>
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
    function tampilRangePermit() {
        $('#datable').DataTable().destroy();
        jenis = $("#inJenis").val();
        tgl = $("#inTglSEP").val();

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
                "url": '<?= base_url('Vclaim_bpjs/getMonitoring'); ?>',
                "type": 'POST',
                "data": {
                    jenis: jenis,
                    tgl: tgl,
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