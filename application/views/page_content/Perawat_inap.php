<<<<<<< HEAD
<div class="panel panel-default card-view mt-20 ">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">DAFTAR PERAWAT RAWAT
                    INAP</span></h6>
        </div>

        <div class="clearfix"></div>
    </div>
    <h6 class="panel-title txt-dark mt-10"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display pb-30">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>EDIT</th>
                                <th>NAMA PERAWAT</th>
                                <th>TIPE</th>
                                <th>RUANGAN</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>EDIT</th>
                                <th>NAMA PERAWAT</th>
                                <th>TIPE</th>
                                <th>RUANGAN</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- modal edit data -->
    <div class="modal fade bs-example-modal-lg" id="modal_edit_data" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" style="display: none;">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO RUANGAN PERAWAT
                    </h5>
                </div>

                <div class="modal-body">

                    <div class="form-wrap">
                        <!-- /formbody -->
                        <div class="form-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="help-block"></span>
                                        <label class="control-label col-md-3">NAMA PERAWAT</label>
                                        <div class="col-md-9 has-success">

                                            <input type="text" class="form-control" disabled="" id="nama" name="nama">
                                            <input type="hidden" class="form-control" disabled="" id="in_id_staff" name="in_id_staff">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">TIPE</label>
                                        <div class="col-md-9 has-success">

                                            <input type="text" class="form-control" disabled="" id="in_tipe"
                                                name="in_tipe">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="help-block"></span>
                                        <label class="control-label col-md-3">RUANGAN</label>
                                        <div class="col-md-9 has-success">

                                            <select class="form-control filled-input select2" 
                                                style="border: 1px solid lightgreen;" id="ruangan" name="ruangan">
                                                <option value="-">
                                                    -</option>
                                                <?php
												foreach ($dataRuangan as $row) :
												?>
                                                <option value="<?php echo $row['nama_ruangan'] ?>">
                                                    <?php echo $row['nama_ruangan'] ?></option>
                                                <?php endforeach; ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button onclick="update_ruangan()" class="btn btn-success btn-anim  btn-sm"><i
                                        class="icon-rocket"></i><span class="btn-text">UBAH </span>
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

.zoom:active {
    position: relative;
    overflow: hidden;
    transition: all .3s ease-in-out;
    -webkit-transform: scale(6.5);
    transform: scale(6.5);
}
</style>
<script>
function edit_data_kunjungan(id_staff) {
    $.ajax({
        url: "<?= base_url() . 'Rawatinap/getdata_Perawat' ?>",
        data: {
            id_staff: id_staff,
            // history: id_history
        },
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            if (data.status_dt == "found") {
                //disini set datanya ke modal
                $("#in_id_staff").val(data.id_staff);
                $("#nama").val(data.nama);
                $("#in_tipe").val(data.tipe);
                $("#ruangan").val(data.ruangan).change();;
                // $("#inDiagnosa").val(data.diagnosa);
                // $("#inDPJP").val(data.dpjp).change();
                // $("#NamaPasien").val(data.nama).change();
                // $("#inAsalPasien").val(data.asal_pasien).change();
                // $("#inCaraBayar").val(data.id_cara_bayar).change();
                // $("#inNaPol").val(data.id_kamar).change();
                $("#modal_edit_data").modal('show');
            } else {
                alert("data tidak ditemukan");
            }
        }
    });
}


function update_ruangan() {
    id_staff = $('#in_id_staff').val();
    nama = $('#nama').val();
    ruangan = $('#ruangan').val();
    
    swal({
        title: "Apakah kamu yakin ingin !",
        text: "Mengubah Data " + nama + " ini?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3cb878",
        confirmButtonText: "Yakin",
        cancelButtonText: "Batal",
        closeOnConfirm: false
    }, function() {
        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Rawatinap/edit_ruangan",
                method: "POST",
                dataType: 'json',
                data: {
                    id_staff: id_staff,
                    ruangan: ruangan,
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Pasien Rawat Inap dengan Nama " + nama +
                                " Telah diubah",
                            confirmButtonColor: "#3cb878",
                        });
                        // nosep = $('#inNoSEP').val(nosep);
                        $('#datable').DataTable().ajax.reload();
                        $("#modal_edit_data").modal('hide');
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

function batal(){
    $("#modal_edit_data").modal('show');
}
</script>

<script type="text/javascript">
$(document).ready(function() {
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
            "sSearch": "Cari:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Pertama",
                "sPrevious": "Sebelumnya",
                "sNext": "Selanjutnya",
                "sLast": "Terakhir"
            },

        },
        "ajax": '<?php echo base_url('Rawatinap/tampil_data_perawat'); ?>',
        "deferRender": true,
        "processing": true,
        "order": [],
        "columnDefs": [{
            "targets": [0],
            "orderable": false,
        }, ],

    });
});
=======
<div class="panel panel-default card-view mt-20 ">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">DAFTAR PERAWAT RAWAT
                    INAP</span></h6>
        </div>

        <div class="clearfix"></div>
    </div>
    <h6 class="panel-title txt-dark mt-10"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display pb-30">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>EDIT</th>
                                <th>NAMA PERAWAT</th>
                                <th>TIPE</th>
                                <th>RUANGAN</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>EDIT</th>
                                <th>NAMA PERAWAT</th>
                                <th>TIPE</th>
                                <th>RUANGAN</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- modal edit data -->
    <div class="modal fade bs-example-modal-lg" id="modal_edit_data" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" style="display: none;">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO RUANGAN PERAWAT
                    </h5>
                </div>

                <div class="modal-body">

                    <div class="form-wrap">
                        <!-- /formbody -->
                        <div class="form-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="help-block"></span>
                                        <label class="control-label col-md-3">NAMA PERAWAT</label>
                                        <div class="col-md-9 has-success">

                                            <input type="text" class="form-control" disabled="" id="nama" name="nama">
                                            <input type="hidden" class="form-control" disabled="" id="in_id_staff" name="in_id_staff">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">TIPE</label>
                                        <div class="col-md-9 has-success">

                                            <input type="text" class="form-control" disabled="" id="in_tipe"
                                                name="in_tipe">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="help-block"></span>
                                        <label class="control-label col-md-3">RUANGAN</label>
                                        <div class="col-md-9 has-success">

                                            <select class="form-control filled-input select2" 
                                                style="border: 1px solid lightgreen;" id="ruangan" name="ruangan">
                                                <option value="-">
                                                    -</option>
                                                <?php
												foreach ($dataRuangan as $row) :
												?>
                                                <option value="<?php echo $row['nama_ruangan'] ?>">
                                                    <?php echo $row['nama_ruangan'] ?></option>
                                                <?php endforeach; ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button onclick="update_ruangan()" class="btn btn-success btn-anim  btn-sm"><i
                                        class="icon-rocket"></i><span class="btn-text">UBAH </span>
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

.zoom:active {
    position: relative;
    overflow: hidden;
    transition: all .3s ease-in-out;
    -webkit-transform: scale(6.5);
    transform: scale(6.5);
}
</style>
<script>
function edit_data_kunjungan(id_staff) {
    $.ajax({
        url: "<?= base_url() . 'Rawatinap/getdata_Perawat' ?>",
        data: {
            id_staff: id_staff,
            // history: id_history
        },
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            if (data.status_dt == "found") {
                //disini set datanya ke modal
                $("#in_id_staff").val(data.id_staff);
                $("#nama").val(data.nama);
                $("#in_tipe").val(data.tipe);
                $("#ruangan").val(data.ruangan).change();;
                // $("#inDiagnosa").val(data.diagnosa);
                // $("#inDPJP").val(data.dpjp).change();
                // $("#NamaPasien").val(data.nama).change();
                // $("#inAsalPasien").val(data.asal_pasien).change();
                // $("#inCaraBayar").val(data.id_cara_bayar).change();
                // $("#inNaPol").val(data.id_kamar).change();
                $("#modal_edit_data").modal('show');
            } else {
                alert("data tidak ditemukan");
            }
        }
    });
}


function update_ruangan() {
    id_staff = $('#in_id_staff').val();
    nama = $('#nama').val();
    ruangan = $('#ruangan').val();
    
    swal({
        title: "Apakah kamu yakin ingin !",
        text: "Mengubah Data " + nama + " ini?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3cb878",
        confirmButtonText: "Yakin",
        cancelButtonText: "Batal",
        closeOnConfirm: false
    }, function() {
        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Rawatinap/edit_ruangan",
                method: "POST",
                dataType: 'json',
                data: {
                    id_staff: id_staff,
                    ruangan: ruangan,
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Pasien Rawat Inap dengan Nama " + nama +
                                " Telah diubah",
                            confirmButtonColor: "#3cb878",
                        });
                        // nosep = $('#inNoSEP').val(nosep);
                        $('#datable').DataTable().ajax.reload();
                        $("#modal_edit_data").modal('hide');
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

function batal(){
    $("#modal_edit_data").modal('show');
}
</script>

<script type="text/javascript">
$(document).ready(function() {
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
            "sSearch": "Cari:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Pertama",
                "sPrevious": "Sebelumnya",
                "sNext": "Selanjutnya",
                "sLast": "Terakhir"
            },

        },
        "ajax": '<?php echo base_url('Rawatinap/tampil_data_perawat'); ?>',
        "deferRender": true,
        "processing": true,
        "order": [],
        "columnDefs": [{
            "targets": [0],
            "orderable": false,
        }, ],

    });
});
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>