<<<<<<< HEAD
<div class="panel panel-success card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h3 style="color:white">SEP - <?= $pasien ?> (<?= sprintf('%06d', $pasien) ?>)</h3>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">

            <div class="form-actions">
                <div class="row">

                    <a class="btn btn-default btn-anim" href="javascript: history.go(-1)" style="margin-right: 5px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>


                    <a class="btn btn-primary btn-anim" href="<?= base_url('SEP/Get_SEP/') . $kartu . '/' . $id_pel . '/' . $history; ?>"><i class="icon-rocket"></i><span class="btn-text">HISTORY SEP</span></a>
                </div>
                <br>

            </div>
        </div>
    </div>

</div>
<div class="panel panel-success card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h5 style="color:white">FORM <?= $judul ?> - <?= $pasien ?> (<?= $no_rm ?>)
            </h5>
        </div>
        <div class="clearfix"></div>
    </div>
    <h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">NO KARTU </label>
                        <div class="input-group col-md-9 has-success">
                            <input type="text" autocomplete="off" class="form-control" placeholder="" name="inTglSEP" id="inNoKartu" value="<?= $kartu ?>" readonly>

                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <?php if ($judul != 'SPRI') { ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">NO SEP </label>
                            <div class="input-group col-md-9 has-success">


                                <input type="text" autocomplete="off" class="form-control" placeholder="" name="inTglSEP" id="inNoSep" value="<?= $sep ?>">

                            </div>
                            <span class="help-block"></span>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">POLI TUJUAN</label>
                        <div class="input-group col-md-9 has-success">

                            <input type="text" autocomplete="off" class="form-control" name="inPoli" id="inPoli" value="" placeholder="Masukkan min 3 karakter">

                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">DPJP LAYANAN</label>
                        <div class="input-group col-md-9 has-success">

                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inDPJP" name="inDPJP">
                                <option value="-">-</option>
                                <?php
                                foreach ($dokter as $row) {

                                ?>
                                    <option value="<?php echo $row["id_dokter"]; ?>" <?php if ($dpjp == $row["id_dokter"]) echo "selected"; ?>>
                                        <?php echo  $row["nama"]; ?></option>
                                <?php }  ?>
                            </select>
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Tanggal SPRI / Rencana Kontrol</label>
                        <div class="input-group col-md-9 has-success">
                            <input type="date" class="form-control" placeholder="TANGGAL" id="inTanggalKunjugan" name="inTanggalKunjugan" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                    echo date("Y-m-d"); ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>

                <br>
                <div align="right">

                    <input type="hidden" id="inNoSurat">
                    <span class="help-block"></span>
                    <a class="btn btn-default btn-anim" href="javascript: history.go(-1)" style="margin-right: 5px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                    <button class="btn btn-success btn-anim" onclick="insertSPRI()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-print"></i><span class="btn-text">SIMPAN</span>
                        <button class="btn btn-info btn-anim" onclick="updateSPRI()" type="submit" style="display:none;" id="editKunjungan"><i class="icon-print"></i><span class="btn-text">EDIT</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h1 class="panel-title txt-dark"><span class="label label-success font-weight-1000">LIST DATA SPRI / RENCANA KONTROL</span>
            </h1>
        </div>
        <div class="clearfix"></div>
    </div>
    <h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="row">

        <div class="clearfix"></div>
        <hr>
        <div class="row mt-30">
            <div class="col-md-6">

                <div class="col-md-2">
                    <label class="mt-0 txt-dark">BULAN</label>

                </div>
                <div class="col-md-10">

                    <input type="month" autocomplete="off" id="inBulan" class="form-control">
                </div>


            </div>
            <div class="col-md-6">

                <div class="col-md-2">
                    <label class="mt-0 txt-dark">FILTER</label>

                </div>
                <div class="col-md-10">

                    <div class="radio-list">
                        <div class="radio-inline pl-0">
                            <span class="radio radio-info">
                                <input type="radio" value="1" name="inFilter" id="inFilter1" checked>
                                <label class="control-label" for="inFilter1">Tanggal Entri</label>
                            </span>
                        </div>
                        <div class="radio-inline pl-0">
                            <span class="radio radio-info">
                                <input type="radio" value="2" name="inFilter" id="inFilter2">
                                <label class="control-label" for="inFilter2">Tanggal SPRI / Rencana Kontrol </label>
                            </span>
                        </div>
                    </div>
                </div>


            </div>
            <br>
            <br>
            <div class="form-group">
                <div class="col-md-3 ">
                    <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilBulan();" style="margin-left: 30px;"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
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

                                <!-- <th>SEP</th> -->
                                <th>AKSI</th>
                                <th>CETAK</th>
                                <th>NO SURAT</th>
                                <th>JENIS SURAT</th>
                                <th>DOKTER</th>
                                <th>POLI</th>
                                <th>TANGGAL KONTROL</th>
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
    $(document).ready(function() {

        $('#inPoli').autocomplete({
            source: function(query, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>Vclaim_bpjs/cari_poli",
                    method: "POST",
                    data: {
                        query: query,
                    },
                    minLength: 3,
                    dataType: "json",
                    cache: false,
                    success: function(data) {
                        response($.map(data, function(item) {
                            return item.kode + ' | ' + item.nama;
                        }));

                    }
                });
            },
            //appendTo: "#vclaim_sep"
        });

    });

    function edit_kontrol(no_surat) {
        document.getElementById('simpanKunjungan').style.display = 'none';
        $('#editKunjungan').show();
        $('#inNoSurat').val(no_surat);

        $.ajax({
            url: "<?php echo base_url(); ?>Vclaim_bpjs/getRencanaKontrol",
            method: "post",
            dataType: 'json',
            data: {
                no: no_surat,
            },
            success: function(data) {
                if (data.metaData['code'] == 200) {
                    $('#inPoli').val(data.data['poliTujuan'] + ' | ' + data.data['namaPoliTujuan']);
                    getDokter(data.data['kodeDokter']);
                    $('#inTanggalKunjugan').val(data.data['tglRencanaKontrol']).change();

                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: data.metaData['message'],
                        confirmButtonColor: "#3cb878",
                    });

                }

            }
        });
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    function getDokter(kode_dokter) {
        $.ajax({
            url: "<?php echo base_url(); ?>SEP/getDokter",
            method: "post",
            dataType: 'json',
            data: {
                kode_dokter: kode_dokter,
            },
            success: function(data) {
                $('#inDPJP').val(data).change();

            }
        });
    }

    function insertSPRI() {
        no_sep = $('#inNoSep').val();
        no_kartu = $('#inNoKartu').val();
        tgl = $('#inTanggalKunjugan').val();

        dpjp = $('#inDPJP').val();
        poli = $('#inPoli').val();

        splitPoli = poli.split(' | ');
        poliTuj = splitPoli[0];

        $.ajax({
            url: "<?php echo $action ?>",
            method: "POST",
            data: {
                noKartu: no_kartu,
                noSEP: no_sep,
                poliKontrol: poliTuj,
                tglRencanaKontrol: tgl,
                dpjp: dpjp,
            },
            dataType: 'json',
            success: function(response) {
                if (response.status == 'success') {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil dinput",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#datable').DataTable().ajax.reload();
                    location.reload();

                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: response.data['message'],
                        confirmButtonColor: "#3cb878",
                    });
                }
            }
        });
    }

    function updateSPRI() {
        no_surat = $('#inNoSurat').val();
        no_sep = $('#inNoSep').val();
        no_kartu = $('#inNoKartu').val();
        tgl = $('#inTanggalKunjugan').val();

        dpjp = $('#inDPJP').val();
        poli = $('#inPoli').val();

        splitPoli = poli.split(' | ');
        poliTuj = splitPoli[0];

        $.ajax({
            url: "<?php echo $action1 ?>",
            method: "POST",
            data: {
                noSurat: no_surat,
                noKartu: no_kartu,
                noSEP: no_sep,
                poliKontrol: poliTuj,
                tglRencanaKontrol: tgl,
                dpjp: dpjp,
            },
            dataType: 'json',
            success: function(response) {
                if (response.status == 'success') {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil dinput",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#datable').DataTable().ajax.reload();
                    location.reload();

                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: response.data['message'],
                        confirmButtonColor: "#3cb878",
                    });
                }
            }
        });
    }

    function delete_ranap(no) {
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
                    url: "<?php echo base_url() ?>Vclaim_bpjs/hapus_kontrol",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        no: no,
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
                "url": '<?php echo base_url('Vclaim_bpjs/getSPRIByKartu'); ?>',
                "type": 'POST',
                "data": {
                    nomor: '<?= $kartu ?>',
                    history: '<?= $id_his ?>',
                    bulan: 'now',
                    filter: '1',

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

    function tampilBulan() {
        $('#datable').DataTable().destroy();
        var bulan = $("#inBulan").val();
        var filter = $('input[name="inFilter"]:checked').val();

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
                "url": '<?= base_url('Vclaim_bpjs/getSPRIByKartu'); ?>',
                "type": 'POST',
                "data": {
                    nomor: '<?= $kartu ?>',
                    history: '<?= $id_his ?>',
                    bulan: bulan,
                    filter: filter
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
<div class="panel panel-success card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h3 style="color:white">SEP - <?= $pasien ?> (<?= sprintf('%06d', $pasien) ?>)</h3>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">

            <div class="form-actions">
                <div class="row">

                    <a class="btn btn-default btn-anim" href="javascript: history.go(-1)" style="margin-right: 5px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>


                    <a class="btn btn-primary btn-anim" href="<?= base_url('SEP/Get_SEP/') . $kartu . '/' . $id_pel . '/' . $history; ?>"><i class="icon-rocket"></i><span class="btn-text">HISTORY SEP</span></a>
                </div>
                <br>

            </div>
        </div>
    </div>

</div>
<div class="panel panel-success card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h5 style="color:white">FORM <?= $judul ?> - <?= $pasien ?> (<?= $no_rm ?>)
            </h5>
        </div>
        <div class="clearfix"></div>
    </div>
    <h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">NO KARTU </label>
                        <div class="input-group col-md-9 has-success">
                            <input type="text" autocomplete="off" class="form-control" placeholder="" name="inTglSEP" id="inNoKartu" value="<?= $kartu ?>" readonly>

                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <?php if ($judul != 'SPRI') { ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">NO SEP </label>
                            <div class="input-group col-md-9 has-success">


                                <input type="text" autocomplete="off" class="form-control" placeholder="" name="inTglSEP" id="inNoSep" value="<?= $sep ?>">

                            </div>
                            <span class="help-block"></span>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">POLI TUJUAN</label>
                        <div class="input-group col-md-9 has-success">

                            <input type="text" autocomplete="off" class="form-control" name="inPoli" id="inPoli" value="" placeholder="Masukkan min 3 karakter">

                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">DPJP LAYANAN</label>
                        <div class="input-group col-md-9 has-success">

                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inDPJP" name="inDPJP">
                                <option value="-">-</option>
                                <?php
                                foreach ($dokter as $row) {

                                ?>
                                    <option value="<?php echo $row["id_dokter"]; ?>" <?php if ($dpjp == $row["id_dokter"]) echo "selected"; ?>>
                                        <?php echo  $row["nama"]; ?></option>
                                <?php }  ?>
                            </select>
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Tanggal SPRI / Rencana Kontrol</label>
                        <div class="input-group col-md-9 has-success">
                            <input type="date" class="form-control" placeholder="TANGGAL" id="inTanggalKunjugan" name="inTanggalKunjugan" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                    echo date("Y-m-d"); ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>

                <br>
                <div align="right">

                    <input type="hidden" id="inNoSurat">
                    <span class="help-block"></span>
                    <a class="btn btn-default btn-anim" href="javascript: history.go(-1)" style="margin-right: 5px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                    <button class="btn btn-success btn-anim" onclick="insertSPRI()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-print"></i><span class="btn-text">SIMPAN</span>
                        <button class="btn btn-info btn-anim" onclick="updateSPRI()" type="submit" style="display:none;" id="editKunjungan"><i class="icon-print"></i><span class="btn-text">EDIT</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h1 class="panel-title txt-dark"><span class="label label-success font-weight-1000">LIST DATA SPRI / RENCANA KONTROL</span>
            </h1>
        </div>
        <div class="clearfix"></div>
    </div>
    <h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="row">

        <div class="clearfix"></div>
        <hr>
        <div class="row mt-30">
            <div class="col-md-6">

                <div class="col-md-2">
                    <label class="mt-0 txt-dark">BULAN</label>

                </div>
                <div class="col-md-10">

                    <input type="month" autocomplete="off" id="inBulan" class="form-control">
                </div>


            </div>
            <div class="col-md-6">

                <div class="col-md-2">
                    <label class="mt-0 txt-dark">FILTER</label>

                </div>
                <div class="col-md-10">

                    <div class="radio-list">
                        <div class="radio-inline pl-0">
                            <span class="radio radio-info">
                                <input type="radio" value="1" name="inFilter" id="inFilter1" checked>
                                <label class="control-label" for="inFilter1">Tanggal Entri</label>
                            </span>
                        </div>
                        <div class="radio-inline pl-0">
                            <span class="radio radio-info">
                                <input type="radio" value="2" name="inFilter" id="inFilter2">
                                <label class="control-label" for="inFilter2">Tanggal SPRI / Rencana Kontrol </label>
                            </span>
                        </div>
                    </div>
                </div>


            </div>
            <br>
            <br>
            <div class="form-group">
                <div class="col-md-3 ">
                    <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilBulan();" style="margin-left: 30px;"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
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

                                <!-- <th>SEP</th> -->
                                <th>AKSI</th>
                                <th>CETAK</th>
                                <th>NO SURAT</th>
                                <th>JENIS SURAT</th>
                                <th>DOKTER</th>
                                <th>POLI</th>
                                <th>TANGGAL KONTROL</th>
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
    $(document).ready(function() {

        $('#inPoli').autocomplete({
            source: function(query, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>Vclaim_bpjs/cari_poli",
                    method: "POST",
                    data: {
                        query: query,
                    },
                    minLength: 3,
                    dataType: "json",
                    cache: false,
                    success: function(data) {
                        response($.map(data, function(item) {
                            return item.kode + ' | ' + item.nama;
                        }));

                    }
                });
            },
            //appendTo: "#vclaim_sep"
        });

    });

    function edit_kontrol(no_surat) {
        document.getElementById('simpanKunjungan').style.display = 'none';
        $('#editKunjungan').show();
        $('#inNoSurat').val(no_surat);

        $.ajax({
            url: "<?php echo base_url(); ?>Vclaim_bpjs/getRencanaKontrol",
            method: "post",
            dataType: 'json',
            data: {
                no: no_surat,
            },
            success: function(data) {
                if (data.metaData['code'] == 200) {
                    $('#inPoli').val(data.data['poliTujuan'] + ' | ' + data.data['namaPoliTujuan']);
                    getDokter(data.data['kodeDokter']);
                    $('#inTanggalKunjugan').val(data.data['tglRencanaKontrol']).change();

                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: data.metaData['message'],
                        confirmButtonColor: "#3cb878",
                    });

                }

            }
        });
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    function getDokter(kode_dokter) {
        $.ajax({
            url: "<?php echo base_url(); ?>SEP/getDokter",
            method: "post",
            dataType: 'json',
            data: {
                kode_dokter: kode_dokter,
            },
            success: function(data) {
                $('#inDPJP').val(data).change();

            }
        });
    }

    function insertSPRI() {
        no_sep = $('#inNoSep').val();
        no_kartu = $('#inNoKartu').val();
        tgl = $('#inTanggalKunjugan').val();

        dpjp = $('#inDPJP').val();
        poli = $('#inPoli').val();

        splitPoli = poli.split(' | ');
        poliTuj = splitPoli[0];

        $.ajax({
            url: "<?php echo $action ?>",
            method: "POST",
            data: {
                noKartu: no_kartu,
                noSEP: no_sep,
                poliKontrol: poliTuj,
                tglRencanaKontrol: tgl,
                dpjp: dpjp,
            },
            dataType: 'json',
            success: function(response) {
                if (response.status == 'success') {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil dinput",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#datable').DataTable().ajax.reload();
                    location.reload();

                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: response.data['message'],
                        confirmButtonColor: "#3cb878",
                    });
                }
            }
        });
    }

    function updateSPRI() {
        no_surat = $('#inNoSurat').val();
        no_sep = $('#inNoSep').val();
        no_kartu = $('#inNoKartu').val();
        tgl = $('#inTanggalKunjugan').val();

        dpjp = $('#inDPJP').val();
        poli = $('#inPoli').val();

        splitPoli = poli.split(' | ');
        poliTuj = splitPoli[0];

        $.ajax({
            url: "<?php echo $action1 ?>",
            method: "POST",
            data: {
                noSurat: no_surat,
                noKartu: no_kartu,
                noSEP: no_sep,
                poliKontrol: poliTuj,
                tglRencanaKontrol: tgl,
                dpjp: dpjp,
            },
            dataType: 'json',
            success: function(response) {
                if (response.status == 'success') {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil dinput",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#datable').DataTable().ajax.reload();
                    location.reload();

                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: response.data['message'],
                        confirmButtonColor: "#3cb878",
                    });
                }
            }
        });
    }

    function delete_ranap(no) {
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
                    url: "<?php echo base_url() ?>Vclaim_bpjs/hapus_kontrol",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        no: no,
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
                "url": '<?php echo base_url('Vclaim_bpjs/getSPRIByKartu'); ?>',
                "type": 'POST',
                "data": {
                    nomor: '<?= $kartu ?>',
                    history: '<?= $id_his ?>',
                    bulan: 'now',
                    filter: '1',

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

    function tampilBulan() {
        $('#datable').DataTable().destroy();
        var bulan = $("#inBulan").val();
        var filter = $('input[name="inFilter"]:checked').val();

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
                "url": '<?= base_url('Vclaim_bpjs/getSPRIByKartu'); ?>',
                "type": 'POST',
                "data": {
                    nomor: '<?= $kartu ?>',
                    history: '<?= $id_his ?>',
                    bulan: bulan,
                    filter: filter
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