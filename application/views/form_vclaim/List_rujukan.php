<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>

<div class="panel panel-success card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h1 class="panel-title txt-dark"><span class="label label-success font-weight-1000">LIST DATA RUJUKAN
                </span>
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
                <div class="col-md-3 mt-20 pl-5">
                    <button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();"><i
                            class="icon-rocket"></i><span class="btn-text">HARI INI </span>
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
                    <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePermit();"><i
                            class="icon-rocket"></i><span class="btn-text">PILIH</span>
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
                                <th>NAMA PASIEN</th>
                                <th>NO RUJUKAN</th>
                                <th>JENIS PELAYANAN</th>
                                <th>PPK DIRUJUK</th>
                                <th>TANGGAL RUJUKAN</th>
                            </tr>
                        </thead>

                    </table>

                    <div class="modal fade" id="modalListRujukan" role="dialog" aria-labelledby="newPeternakModallabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newPeternakModallabel">
                                        LIST DATA RUJUKAN</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="hidden" class="form-control" value="" id="noRujukan">
                                                <input type="hidden" class="form-control" id="id_form">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">No Kartu </label>
                                                        <div class="input-group col-md-9 has-success">
                                                            <input type="text" autocomplete="off" class="form-control"
                                                                placeholder="" name="inNoKartu" id="inNoKartu" value=""
                                                                readonly>

                                                        </div>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">No SEP </label>
                                                        <div class="input-group col-md-9 has-success">
                                                            <input type="text" autocomplete="off" class="form-control"
                                                                placeholder="" name="inNoSep" id="inNoSep" value="" readonly>

                                                        </div>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Tanggal Rujukan</label>
                                                        <div class="input-group col-md-9 has-success">
                                                            <input type="date" class="form-control"
                                                                placeholder="TANGGAL" id="inTanggalRujuk"
                                                                name="inTanggalRujuk" value="">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Tanggal Rencana
                                                            Kunjungan</label>
                                                        <div class="input-group col-md-9 has-success">
                                                            <input type="date" class="form-control"
                                                                placeholder="TANGGAL" id="inTanggalKunjugan"
                                                                name="inTanggalKunjugan" value="">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Faskes<span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group col-md-9 has-success">
                                                            <select class="form-control filled-input select2"
                                                                placeholder="Choose a Category" tabindex="1"
                                                                name="inAsal" id="inAsal">
                                                                <option value="1">FASKES 1</option>
                                                                <option value="2" selected>FASKES 2</option>
                                                            </select>

                                                        </div>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">PPK Dirujuk<span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group col-md-9 has-success">
                                                            <!-- <input type="text" autocomplete="off" class="form-control" name="inNama" id="inNama" value="<?= $ppk_asal['kode'] ?>" readonly> -->
                                                            <!-- <span class="input-group-btn" style="width:0px;"></span> -->
                                                            <input type="text" autocomplete="off" class="form-control"
                                                                name="inPPKRujuk" id="inPPKRujuk" value=""
                                                                placeholder="Masukkan min 3 karakter">

                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Poli Tujuan</label>
                                                        <div class="input-group col-md-9 has-success">

                                                            <input type="text" autocomplete="off" class="form-control"
                                                                name="inPoli" id="inPoli" value=""
                                                                placeholder="Masukkan min 3 karakter">

                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Tipe Rujukan<span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group col-md-9 has-success">
                                                            <select class="form-control filled-input select2"
                                                                placeholder="Choose a Category" tabindex="1"
                                                                name="inTipe" id="inTipe">
                                                                <option value="0" selected>PENUH</option>
                                                                <option value="1">PARTIAL</option>
                                                                <option value="2">RUJUK BALIK (NON PRB)</option>
                                                            </select>

                                                        </div>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Diagnosa </label>
                                                        <div class="input-group col-md-9 has-success">
                                                            <!-- <input type="text" autocomplete="off" class="form-control" name="inNama" id="inNama" value="<?= $diagnosa['kode'] ?>" readonly>
                            <span class="input-group-btn" style="width:0px;"></span> -->
                                                            <input type="text" autocomplete="off" class="form-control"
                                                                name="inNama" id="inDiagnosa" value=""
                                                                placeholder="Masukkan min 3 karakter">
                                                            <span class="help-block"></span>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Catatan </label>
                                                        <div class="input-group col-md-9 has-success">
                                                            <textarea class="form-control" id="inKeterangan" rows="2"
                                                                cols="5"></textarea>
                                                            <span class="help-block"></span>
                                                        </div>

                                                    </div>
                                                </div>
                                                <br>
                                                <div align="right">
                                                    <input type="hidden" autocomplete="off" class="form-control"
                                                        id="inNoSurat" value="" readonly>

                                                    <span class="help-block"></span>
                                                    <button class="btn btn-success btn-anim"
                                                        onclick="updateListRujukan()" type="submit"
                                                        style="margin-right: 40px;" id="updaterujukan"><i
                                                            class="icon-print"></i><span class="btn-text">SIMPAN</span>

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

<style>
td {
    color: black;
}
</style>
<link rel="stylesheet" href="<?php echo base_url('assets/dist/jquery-ui.css'); ?>">
<script src="<?php echo base_url('assets/dist/jquery-ui.min.js'); ?>"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#inPPKRujuk').autocomplete({
        source: function(query, response) {
            jenis = $('#inAsal').val();
            $.ajax({
                url: "<?php echo base_url(); ?>Vclaim_bpjs/cari_ppk",
                method: "POST",
                data: {
                    query: query,
                    jenis: jenis
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
        appendTo: "#modalListRujukan"
    });
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
        appendTo: "#modalListRujukan"
    });
    $('#inDiagnosa').autocomplete({

        source: function(query, response) {
            $.ajax({
                url: "<?php echo base_url(); ?>Vclaim_bpjs/getDiagnosa",
                method: "POST",
                data: {
                    query: query,
                },
                minLength: 3,
                dataType: "json",
                cache: false,
                success: function(data) {
                    response($.map(data.slice(0, 5), function(item) {
                        return item.nama;
                    }));

                }
            });
        },
        appendTo: "#modalListRujukan"
    });

});

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
                url: "<?php echo base_url() ?>Vclaim_bpjs/hapus_rujukan",
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
            "url": '<?php echo base_url('Vclaim_bpjs/listRujukanKeluar'); ?>',
            "type": 'POST',
            "data": {
                mulai: '<?= date('Y-m-d') ?>',
                akhir: '<?= date('Y-m-d') ?>',
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
            "url": '<?= base_url('Vclaim_bpjs/listRujukanKeluar'); ?>',
            "type": 'POST',
            "data": {
                mulai: '<?= date('Y-m-d') ?>',
                akhir: '<?= date('Y-m-d') ?>',
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
    mulai = $("#inTglMulai").val();
    akhir = $("#inTglAkhir").val();

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
            "url": '<?= base_url('Vclaim_bpjs/listRujukanKeluar'); ?>',
            "type": 'POST',
            "data": {
                mulai: mulai,
                akhir: akhir,
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

function edit_kontrol(noSurat) {
    $('#id_form').val(noSurat);
    $.ajax({
        url: "<?php echo base_url() ?>Vclaim_bpjs/getListRujukan",
        method: "POST",
        dataType: 'json',
        data: {
            noSurat: noSurat
        },
        success: function(data) {
            console.log(data);
            $("#id_form").val(noSurat);
            $("#inNoKartu").val(data.data['noKartu']);
            $("#inNoSep").val(data.data['noSep']);
            $("#inTanggalRujuk").val(data.data['tglRujukan']);
            $("#inTanggalKunjugan").val(data.data['tglRencanaKunjungan']);
            $("#inAsal").val(data.data['jnsPelayanan']).trigger('change');
            $("#inPPKRujuk").val(data.data['ppkDirujuk'] + ' | ' + data.data['namaPpkDirujuk']);
            $("#inPoli").val(data.data['poliRujukan'] + ' | ' + data.data['namaPoliRujukan']);
            $("#inTipe").val(data.data['tipeRujukan']).trigger('change');
            $("#inDiagnosa").val(data.data['diagRujukan'] + ' | ' + data.data['namaDiagRujukan']);
            $("#inKeterangan").val(data.data['catatan']);
            $("#inNoSurat").val(data.data['noRujukan']);
            $("#modalListRujukan").modal('show');
        }
    });
    return false;
}

function updateListRujukan() {
    no_kartu = $('#inNoKartu').val();
    no_surat = $('#inNoSurat').val();
    tgl = $('#inTanggalKunjugan').val();
    tglrujukan = $('#inTanggalRujuk').val();
    jenisPel = $('#inAsal').val();

    ppkRujuk = $('#inPPKRujuk').val();
    splitPPK = ppkRujuk.split(' | ');
    asalPPkRujuk = splitPPK[0];

    poli = $('#inPoli').val();
    splitPoli = poli.split(' | ');
    poliTuj = splitPoli[0];

    tipeRujukan = $('#inTipe').val();

    diagnosa = $('#inDiagnosa').val();
    splitdiag = diagnosa.split(' | ');
    diagTuj = splitdiag[0];

    keterangan = $('#inKeterangan').val();
    $.ajax({
        url: "<?php echo base_url() ?>Vclaim_bpjs/update_rujukan",
        method: "POST",
        dataType: 'json',
        data: {
            noRujukan: no_surat,
            tglRujukan: tglrujukan,
            tglRencanaKunjungan: tgl,
            ppkDirujuk: asalPPkRujuk,
            jnsPelayanan: jenisPel,
            catatan: keterangan,
            diagRujukan: diagTuj,
            tipeRujukan: tipeRujukan,
            poliRujukan: poliTuj,
        },
        success: function(response) {
            if (response.status == 'success') {
                swal({
                    title: "good job!",
                    type: "success",
                    text: "Data Berhasil dinput",
                    confirmButtonColor: "#3cb878",
                });
                $("#modalListRujukan").modal('hide');
                $('#datable').DataTable().ajax.reload();

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



</script>