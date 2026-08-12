<<<<<<< HEAD
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">LEMBAR POLIKLINIK</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">No RM<span class="help"></span></label>
                                <input type="text" class="form-control" value="<?= $no_rm ?>" id="inNoRM" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                <input type="text" class="form-control" value="<?= $nama ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                <input type="text" class="form-control" value="<?= $jenis_kelamin ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Tgl Lahir<span class="help"></span></label>
                                <input type="text" class="form-control" value="<?= $tgl_lahir ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Umur :<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?php
                                                                                        $tanggal = new DateTime($tgl_lahir);
                                                                                        $today = new DateTime();
                                                                                        $y = $today->diff($tanggal)->y;
                                                                                        $m = $today->diff($tanggal)->m;
                                                                                        $d = $today->diff($tanggal)->d;
                                                                                        echo  $y . " tahun " . $m . " bulan " . $d . " hari";  ?>">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h5 style="margin-top: 30px;">
                                <strong>
                                    <label class="control-label mb-10 text-left">
                                        Anamnesa Poliklinik
                                        <span class="help"></span>
                                    </label>
                                </strong>
                            </h5>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                    <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#newPeternakModal">Tambah</a>
                                    <!-- <button type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button> -->
                                </div>
                            </div>

                            <div class="modal fade" id="newPeternakModal" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="newPeternakModallabel">Tambah Anamnesa Poliklinik</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="row">


                                                    <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                                                    <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                                                    <div class="col-md-6">
                                                        <label class="control-label mb-10 text-left"><b>Riwayat Penyakit, Diagnosis dan Konsultasi : <b /><span class="help"></span></label>
                                                        <span id="diagnosis_error" class="text-danger"></span>
                                                        <div class="has-success">
                                                            <textarea class="form-control" name="" id="diagnosis" cols="30" rows="5"></textarea>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="control-label mb-10 text-left"><b>Terapi : <b /><span class="help"></span></label>
                                                        <span id="terap_error" class="text-danger"></span>
                                                        <div class="has-success">
                                                            <textarea class="form-control" name="" id="terapi" cols="30" rows="5"></textarea>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer mb-5 mr-5 mt-10">
                                            <button class="btn btn-success btn-anim  btn-sm" onclick="simpan()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="edit" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="newPeternakModallabel">Edit Anamnesa Poliklinik</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="row">
                                                    
                                                        <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                                                        <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                                                        <input type="hidden" class="form-control" id="id_form">
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left"><b>Riwayat Penyakit, Diagnosis dan Konsultasi :<b /><span class="help"></span></label>
                                                            <span id="diagnosis_error" class="text-danger"></span>
                                                            <div class="has-success">
                                                                <textarea class="form-control" name="" id="diagnosis_up" cols="30" rows="5"></textarea>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left"><b>Terapi : <b /><span class="help"></span></label>
                                                            <span id="terapi_error" class="text-danger"></span>
                                                            <div class="has-success">
                                                                <textarea class="form-control" name="" id="terapi_up" cols="30" rows="5"></textarea>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer mb-5 mr-5 mt-10">
                                            <button class="btn btn-success btn-anim  btn-sm" onclick="edit()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
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
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table table-hover display  pb-30" id="tabel_terapi">
                                <thead>
                                    <tr class="bg-success">
                                        <th>NO</th>
                                        <th>EDIT</th>
                                        <th>HAPUS</th>
                                        <th>TANGGAL & JAM</th>
                                        <th>DIAGNOSIS</th>
                                        <th>TERAPI</th>
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
<script type="text/javascript">
    $(document).ready(function(e) {
        id_history = $('#inHis').val();
        reload_data_id_pel(id_history);
    });

    function pilih(id) {
        $('#id_form').val(id);
        $.ajax({
            url: "<?php echo base_url() ?>Erm_lembar_anam_poliklinik/get_lembar_anam",
            method: "POST",
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                $('#diagnosis_up').val(data.diagnosis);
                $('#terapi_up').val(data.terapi);
                $("#edit").modal('show');
                $('#tabel_terapi').DataTable().ajax.reload();

            }

        });
        return false;
    }

    function simpan() {
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();

        diagnosis = $('#diagnosis').val();
        terapi = $('#terapi').val();

        dataString = '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
            '&diagnosis=' + diagnosis + '&terapi=' + terapi;


        $.ajax({
            url: "<?php echo base_url() ?>Erm_lembar_anam_poliklinik/insert_lembar_anam",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil ditambah",
                        confirmButtonColor: "#3cb878",
                    });

                    $("#newPeternakModal").modal('hide');
                    $('#tabel_terapi').DataTable().ajax.reload();
                } else if (data.error) {
                    if (data.kesadaran != '') {
                        $('#diagnosis_error').html(data.diagnosis);
                    } else {
                        $('#diagnosis_error').html('');
                    }
                    if (data.tensi != '') {
                        $('#terapi_error').html(data.terapi);
                    } else {
                        $('#terapi_error').html('');
                    }
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
        return false;
    }

    function edit() {
        id_form = $('#id_form').val();
        diagnosis = $('#diagnosis_up').val();
        terapi = $('#terapi_up').val();
        

        dataString = 'id_form=' + id_form + '&diagnosis=' + diagnosis + '&terapi=' + terapi ;


        $.ajax({
            url: "<?php echo base_url() ?>Erm_lembar_anam_poliklinik/edit_lembar_anam",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil diedit",
                        confirmButtonColor: "#3cb878",
                    });

                    $("#edit").modal('hide');
                    $('#tabel_terapi').DataTable().ajax.reload();
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
        return false;
    }

    function hapus_tindakan(id) { //utk hapus diagnosa pasien
        swal({
            title: "Warning?",
            text: "Apakah kamu yakin menghapus data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Erm_lembar_anam_poliklinik/hapus_tindakan_anam",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#tabel_terapi').DataTable().ajax.reload();
                        } else {
                            swal({
                                title: "Gagal!",
                                type: "warning",
                                confirmButtonColor: "#3cb878",
                            });
                        }
                    }
                });
            });
        });
        return false;
    }

    function reload_data_id_pel(id_history) { //utk reload data diagnosa pasien jika berhasil
        $('#tabel_terapi').dataTable().fnClearTable();
        $('#tabel_terapi').dataTable().fnDestroy();
        $('#tabel_terapi').DataTable({
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
                    "sLast": "Terakhir",
                }
            },
            "ajax": {
                "url": '<?php echo base_url('Erm_lembar_anam_poliklinik/tampil_list_anamnesa'); ?>',
                "type": 'POST',
                "data": {
                    id_history: id_history
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

    function cetak() {
        id = $('#inHis').val();
        id_pelayanan = $('#inPel').val();
        window.location.href = "<?php echo base_url('Erm_igd_edit/print_peng_khusus/') ?>" + id + '/' + id_pelayanan;
    }
=======
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">LEMBAR POLIKLINIK</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">No RM<span class="help"></span></label>
                                <input type="text" class="form-control" value="<?= $no_rm ?>" id="inNoRM" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                <input type="text" class="form-control" value="<?= $nama ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                <input type="text" class="form-control" value="<?= $jenis_kelamin ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Tgl Lahir<span class="help"></span></label>
                                <input type="text" class="form-control" value="<?= $tgl_lahir ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Umur :<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?php
                                                                                        $tanggal = new DateTime($tgl_lahir);
                                                                                        $today = new DateTime();
                                                                                        $y = $today->diff($tanggal)->y;
                                                                                        $m = $today->diff($tanggal)->m;
                                                                                        $d = $today->diff($tanggal)->d;
                                                                                        echo  $y . " tahun " . $m . " bulan " . $d . " hari";  ?>">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h5 style="margin-top: 30px;">
                                <strong>
                                    <label class="control-label mb-10 text-left">
                                        Anamnesa Poliklinik
                                        <span class="help"></span>
                                    </label>
                                </strong>
                            </h5>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                    <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#newPeternakModal">Tambah</a>
                                    <!-- <button type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button> -->
                                </div>
                            </div>

                            <div class="modal fade" id="newPeternakModal" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="newPeternakModallabel">Tambah Anamnesa Poliklinik</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="row">


                                                    <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                                                    <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                                                    <div class="col-md-6">
                                                        <label class="control-label mb-10 text-left"><b>Riwayat Penyakit, Diagnosis dan Konsultasi : <b /><span class="help"></span></label>
                                                        <span id="diagnosis_error" class="text-danger"></span>
                                                        <div class="has-success">
                                                            <textarea class="form-control" name="" id="diagnosis" cols="30" rows="5"></textarea>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="control-label mb-10 text-left"><b>Terapi : <b /><span class="help"></span></label>
                                                        <span id="terap_error" class="text-danger"></span>
                                                        <div class="has-success">
                                                            <textarea class="form-control" name="" id="terapi" cols="30" rows="5"></textarea>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer mb-5 mr-5 mt-10">
                                            <button class="btn btn-success btn-anim  btn-sm" onclick="simpan()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="edit" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="newPeternakModallabel">Edit Anamnesa Poliklinik</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="row">
                                                    
                                                        <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                                                        <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                                                        <input type="hidden" class="form-control" id="id_form">
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left"><b>Riwayat Penyakit, Diagnosis dan Konsultasi :<b /><span class="help"></span></label>
                                                            <span id="diagnosis_error" class="text-danger"></span>
                                                            <div class="has-success">
                                                                <textarea class="form-control" name="" id="diagnosis_up" cols="30" rows="5"></textarea>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left"><b>Terapi : <b /><span class="help"></span></label>
                                                            <span id="terapi_error" class="text-danger"></span>
                                                            <div class="has-success">
                                                                <textarea class="form-control" name="" id="terapi_up" cols="30" rows="5"></textarea>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer mb-5 mr-5 mt-10">
                                            <button class="btn btn-success btn-anim  btn-sm" onclick="edit()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
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
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table table-hover display  pb-30" id="tabel_terapi">
                                <thead>
                                    <tr class="bg-success">
                                        <th>NO</th>
                                        <th>EDIT</th>
                                        <th>HAPUS</th>
                                        <th>TANGGAL & JAM</th>
                                        <th>DIAGNOSIS</th>
                                        <th>TERAPI</th>
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
<script type="text/javascript">
    $(document).ready(function(e) {
        id_history = $('#inHis').val();
        reload_data_id_pel(id_history);
    });

    function pilih(id) {
        $('#id_form').val(id);
        $.ajax({
            url: "<?php echo base_url() ?>Erm_lembar_anam_poliklinik/get_lembar_anam",
            method: "POST",
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                $('#diagnosis_up').val(data.diagnosis);
                $('#terapi_up').val(data.terapi);
                $("#edit").modal('show');
                $('#tabel_terapi').DataTable().ajax.reload();

            }

        });
        return false;
    }

    function simpan() {
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();

        diagnosis = $('#diagnosis').val();
        terapi = $('#terapi').val();

        dataString = '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
            '&diagnosis=' + diagnosis + '&terapi=' + terapi;


        $.ajax({
            url: "<?php echo base_url() ?>Erm_lembar_anam_poliklinik/insert_lembar_anam",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil ditambah",
                        confirmButtonColor: "#3cb878",
                    });

                    $("#newPeternakModal").modal('hide');
                    $('#tabel_terapi').DataTable().ajax.reload();
                } else if (data.error) {
                    if (data.kesadaran != '') {
                        $('#diagnosis_error').html(data.diagnosis);
                    } else {
                        $('#diagnosis_error').html('');
                    }
                    if (data.tensi != '') {
                        $('#terapi_error').html(data.terapi);
                    } else {
                        $('#terapi_error').html('');
                    }
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
        return false;
    }

    function edit() {
        id_form = $('#id_form').val();
        diagnosis = $('#diagnosis_up').val();
        terapi = $('#terapi_up').val();
        

        dataString = 'id_form=' + id_form + '&diagnosis=' + diagnosis + '&terapi=' + terapi ;


        $.ajax({
            url: "<?php echo base_url() ?>Erm_lembar_anam_poliklinik/edit_lembar_anam",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil diedit",
                        confirmButtonColor: "#3cb878",
                    });

                    $("#edit").modal('hide');
                    $('#tabel_terapi').DataTable().ajax.reload();
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
        return false;
    }

    function hapus_tindakan(id) { //utk hapus diagnosa pasien
        swal({
            title: "Warning?",
            text: "Apakah kamu yakin menghapus data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Erm_lembar_anam_poliklinik/hapus_tindakan_anam",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#tabel_terapi').DataTable().ajax.reload();
                        } else {
                            swal({
                                title: "Gagal!",
                                type: "warning",
                                confirmButtonColor: "#3cb878",
                            });
                        }
                    }
                });
            });
        });
        return false;
    }

    function reload_data_id_pel(id_history) { //utk reload data diagnosa pasien jika berhasil
        $('#tabel_terapi').dataTable().fnClearTable();
        $('#tabel_terapi').dataTable().fnDestroy();
        $('#tabel_terapi').DataTable({
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
                    "sLast": "Terakhir",
                }
            },
            "ajax": {
                "url": '<?php echo base_url('Erm_lembar_anam_poliklinik/tampil_list_anamnesa'); ?>',
                "type": 'POST',
                "data": {
                    id_history: id_history
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

    function cetak() {
        id = $('#inHis').val();
        id_pelayanan = $('#inPel').val();
        window.location.href = "<?php echo base_url('Erm_igd_edit/print_peng_khusus/') ?>" + id + '/' + id_pelayanan;
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>