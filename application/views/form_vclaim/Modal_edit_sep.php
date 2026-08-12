<<<<<<< HEAD
<?php $this->load->view('form_vclaim/Modal_cari_sep'); ?>

<div class="panel panel-success card-view" id="sep_edit">
    <div class="panel-heading">
        <div class="pull-left">
            <h1 class="panel-title txt-light">DATA EDIT SEP
            </h1>
        </div>
        <div class="clearfix"></div>
    </div>


    <h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="clearfix"></div>
    <hr>
    <div class="row mt-30">
        <div class="col-md-12">
            <div class="col-md-3 mt-20 pl-5">
                <button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
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
                <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
            </div>
        </div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive ">
                    <table id="datable" class="table table-hover display">
                        <thead>
                            <tr class="bg-success">
                                <th>CETAK</th>
                                <th>AKSI</th>
                                <th>NO SEP</th>
                                <th>JENIS PELAYANAN</th>
                                <th>NO RUJUKAN</th>
                                <th>DIAGNOSA</th>
                                <th>POLI</th>
                                <th>TANGGAL</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>CETAK</th>
                                <th>AKSI</th>
                                <th>NO SEP</th>
                                <th>JENIS PELAYANAN</th>
                                <th>NO RUJUKAN</th>
                                <th>DIAGNOSA</th>
                                <th>POLI</th>
                                <th>TANGGAL</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-lg" id="modal_edit_data" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="form-body mt-10" id="vclaim_sep">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
                        </h6>
                        <hr width="95%">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">NO SEP </label>
                                    <div class="input-group col-md-9 has-success">
                                        <input type="text" autocomplete="off" class="form-control" placeholder="NAMA PASIEN" name="inTglSEP" id="inNoSEP" value="">
                                        <input type="hidden" id="inNoHp">
                                        <input type="hidden" id="no_rm">
                                        <input type="hidden" autocomplete="off" class="form-control" name="inHakKelas" id="inHakKelas">
                                        <input type="hidden" autocomplete="off" class="form-control" name="inJnsPelayanan" id="inJnsPelayanan">

                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>


                        </div>
                        <div class="row" id="rajal" style="display: none;">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">POLI TUJUAN</label>
                                    <div class="input-group col-md-9 has-success">
                                        <input type="hidden" autocomplete="off" class="form-control" name="inNama" id="inNama" value="" readonly>
                                        <!-- <span class="input-group-btn" style="width:0px;"></span> -->
                                        <input type="text" autocomplete="off" class="form-control" name="inPoli" id="inPoli" placeholder="Maksimal 3 karakter" value="">

                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">LAYANAN POLI </label>
                                    <div class="radio-list">
                                        <div class="radio-inline pl-0">
                                            <span class="radio radio-info">
                                                <input type="radio" value="0" name="inJk" id="inJkLk" checked>
                                                <label class="control-label" for="inJkLk">NON EKSEKUTIF</label>
                                            </span>
                                        </div>
                                        <div class="radio-inline pl-0">
                                            <span class="radio radio-info">
                                                <input type="radio" value="1" name="inJk" id="inJkPr">
                                                <label class="control-label" for="inJkPr">EKSEKUTIF</label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="ranap" style="display: none;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">NAIK KELAS</label>
                                    <div class="input-group col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inNaikKelas" id="inNaikKelas">

                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">PEMBIAYAAN </label>
                                    <div class="input-group col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inPembiayaan" id="inPembiayaan">
                                            <option value="">-</option>
                                            <option value="1">Pribadi</option>
                                            <option value="2">Pemberi Kerja</option>
                                            <option value="3">Asuransi Kesehatan Tambahan</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">PENANGGUNG JAWAB </label>
                                    <div class="input-group col-md-9 has-success">

                                        <input type="text" autocomplete="off" class="form-control" name="inPenanggungJawab" id="inPenanggungJawab" value="">

                                        <span class="help-block"></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">DPJP LAYANAN</label>
                                    <div class="input-group col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inDPJP" name="inDPJP">
                                            <?php
                                            foreach ($dokter as $row) {

                                            ?>
                                                <option value="<?php echo $row["id_dokter"]; ?>">
                                                    <?php echo  $row["nama"]; ?></option>
                                            <?php }  ?>
                                        </select>


                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">DIAGNOSA </label>
                                    <div class="input-group col-md-9 has-success">

                                        <input type="text" autocomplete="off" class="form-control" name="inDiagnosa" id="inDiagnosa" value="" placeholder="Maksimal 3 karakter">
                                        <span class="help-block"></span>
                                    </div>

                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">CATATAN </label>
                                    <div class="input-group col-md-9 has-success">
                                        <textarea class="form-control" id="inKeterangan" rows="2" cols="5"></textarea>
                                        <span class="help-block"></span>
                                    </div>

                                </div>
                            </div>




                        </div>

                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-4">COB<span class="text-danger">*</span></label>
                                    <div class="col-md-6 has-error" id="basic1">
                                        <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAgama" id="inCOB">
                                            <option value="0">Tidak</option>
                                            <option value="1">Ya</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Katarak<span class="text-danger">*</span></label>
                                    <div class="col-md-6 has-error" id="basic1">
                                        <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAgama" id="inKatarak">
                                            <option value="0">Tidak</option>
                                            <option value="1">Ya</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Kecelakaan<span class="text-danger">*</span></label>
                                    <div class="col-md-6 has-error" id="basic1">
                                        <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inLaka" id="inLaka">
                                            <option value="0">Tidak</option>
                                            <option value="1">Ya</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="collapse" id="col_kll">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>LAKALANTAS</h6>
                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">No LP</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="NO LP" name="inKetLaka" id="inNoLP">

                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Tanggal Kejadian</label>
                                        <div class="col-md-9 has-error">
                                            <input type="date" class="form-control " placeholder="TANGGAL" id="inTglLaka" name="inTanggalKunjugan" value="">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Keterangan</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control " placeholder="Keterangan Kecelakaan" name="inKetLaka" id="inKetLaka">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Suplesi</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAgama" id="inSuplesi">
                                                <option value="0" selected>Tidak</option>
                                                <option value="1">Ya</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">No SEP Suplesi</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control " placeholder="No SEP Suplesi" name="inKetLaka" id="inNoSuplesi" value="">

                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Provinsi Lakalantas</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inProvLaka" id="inProvLaka">

                                            </select>
                                            <span class="help-block"></span>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Kabupaten Lakalantas</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAgama" id="inKabLaka">

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Kecamatan Lakalantas</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAgama" id="inKecLaka">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div align="right">


                            <span class="help-block"></span>
                            <a class="btn btn-default btn-anim" href="javascript: history.go(-1)" style="margin-right: 5px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                            <button class="btn btn-info btn-anim" onclick="editSEP()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-print"></i><span class="btn-text">EDIT SEP</span>
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
                "url": '<?php echo base_url('Vclaim_bpjs/getMonitoringHistory'); ?>',
                "type": 'POST',
                "data": {
                    no: "<?= $kartu ?>",
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

    function tampilRangePermit() {
        $('#datable').DataTable().destroy();
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();

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
                "url": '<?= base_url('Vclaim_bpjs/getMonitoringHistory'); ?>',
                "type": 'POST',
                "data": {
                    no: "<?= $kartu ?>",
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



    function edit_sep(no_sep) {
        getKelas();
        $.ajax({
            url: "<?php echo base_url(); ?>Vclaim_bpjs/cari_sep",
            method: "post",
            dataType: 'json',
            data: {
                sep: no_sep,
            },
            success: function(data) {
                if (data.metaData['code'] == 200) {
                    $('#modal_edit_data').modal('toggle');
                    $('#inNoSEP').val(data.data['noSep']);
                    $('#inTglSEP').val(data.data['tglSep']).change();
                    $('#inNama').val(data.data['jnsPelayanan']);
                    $('#inHakKelas').val(data.data['klsRawat']['klsRawatHak']);
                    $('#no_rm').val(data.data['peserta']['noMr']);
                    $('#inJnsPelayanan').val(data.data['jnsPelayanan'] == 'Rawat Jalan' ? '2' : '1');
                    $('input[name="inJk"][value="' + data.data['poliEksekutif'] + '"]').prop("checked", true);
                    $('#inNaikKelas').val(data.data['klsRawat']['klsRawatNaik']).change();
                    $('#inPembiayaan').val(data.data['klsRawat']['pembiayaan']).change();
                    $('#inPenanggungJawab').val(data.data['klsRawat']['penanggungJawab']);
                    $('#inKeterangan').val(data.data['catatan']);
                    $('#inCOB').val(data.data['cob']).change();
                    $('#inKatarak').val(data.data['katarak']).change();
                    $('#inLaka').val(data.data['kdStatusKecelakaan']).change();
                    $('#inTglLaka').val(data.data['lokasiKejadian']['tglKejadian']).change();
                    $('#inKetLaka').val(data.data['lokasiKejadian']['ketKejadian']);
                    $('#inProvLaka').val(data.data['lokasiKejadian']['kdProp']).change();
                    $('#inKabLaka').val(data.data['lokasiKejadian']['kdKab']).change();
                    $('#inKecLaka').val(data.data['lokasiKejadian']['kdKec']).change();

                    getPeserta(data.data['peserta']['noKartu']);
                    getPoli(data.data['poli']);
                    getDiagnosa(data.data['diagnosa']);
                    getDokter(data.data['dpjp']['kdDPJP']);
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
    }

    function getPeserta(kartu) {
        $.ajax({
            url: "<?php echo base_url(); ?>Vclaim_bpjs/cek_peserta_by_kartu",
            method: "post",
            dataType: 'json',
            data: {
                kartu: kartu,
            },
            success: function(data) {
                if (data.status == 'success') {
                    if (data.data['mr']['noTelepon'] == null) {
                        $('#inNoHp').val('');
                    } else {
                        $('#inNoHp').val(data.data['mr']['noTelepon']);

                    }
                } else {
                    $('#inNoHp').val('');

                }

            }
        });
    }

    function getPoli(poli) {
        $.ajax({
            url: "<?php echo base_url(); ?>SEP/getPoli",
            method: "post",
            dataType: 'json',
            data: {
                poli: poli,
            },
            success: function(data) {

                $('#inPoli').val(data + ' | ' + poli);
            }
        });
    }

    function getDiagnosa(diagnosa) {
        $.ajax({
            url: "<?php echo base_url(); ?>SEP/getDiagnosa",
            method: "post",
            dataType: 'json',
            data: {
                diagnosa: diagnosa,
            },
            success: function(data) {

                $('#inDiagnosa').val(data + ' - ' + diagnosa);
            }
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

    function getKelas() {
        $.ajax({
            url: "<?php echo base_url(); ?>Vclaim_bpjs/getKelasRawat",
            method: "GET",
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html = '<option value="">-</option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].kode + '>' + data[i].nama + '</option>';
                }
                $('#inNaikKelas').html(html);
            }
        });
    }

    $(document).ready(function() {
        $('#inTuj').change(function() {
            if ($('#inTuj').val() != 0) {
                $('#kunjungan').collapse('show');
            } else {
                $('#kunjungan').collapse('hide');

            }
        });
        $('#inJnsPelayanan').change(function() {
            if ($('#inJnsPelayanan').val() == '2') {
                $('#rajal').show();
                $('#ranap').hide();
            } else {
                $('#rajal').hide();
                $('#ranap').show();
            }
        });

        $('#inPPKAsal').autocomplete({
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
            //appendTo: "#vclaim_sep"
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
            appendTo: "#vclaim_sep"
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
            appendTo: "#vclaim_sep"
        });



        $.ajax({
            url: "<?php echo base_url(); ?>Vclaim_bpjs/getProvinsi",
            method: "GET",
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html = '<option value="">Pilih Provinsi</option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].kode + '>' + data[i].nama + '</option>';
                }
                $('#inProvLaka').html(html);
            }
        });


        $('#inLaka').change(function() {
            var laka = $('#inLaka').val();

            if (laka == 1) {
                $('#col_kll').collapse('toggle');
            } else {
                $('#col_kll').collapse('hide');

                $('#inProvLaka').html('<option value="">Pilih Provinsi</option>');
            }

        });
        $('#inProvLaka').change(function() {
            var laka = $('#inProvLaka').val();
            if (laka != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>Vclaim_bpjs/getKab",
                    method: "POST",
                    data: {
                        prov: laka
                    },
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html = '<option value="-">Pilih Kabupaten/Kota</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].kode + '>' + data[i].nama + '</option>';
                        }
                        $('#inKabLaka').html(html);
                    }
                });
            } else {
                $('#inKabLaka').html('<option value="-">Pilih Kabupaten/Kota</option>');
            }
        });
        $('#inKabLaka').change(function() {
            var laka = $('#inKabLaka').val();
            if (laka != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>Vclaim_bpjs/getKec",
                    method: "POST",
                    data: {
                        kab: laka
                    },
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html = '<option value="-">Pilih Kecamatan</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].kode + '>' + data[i].nama + '</option>';
                        }
                        $('#inKecLaka').html(html);
                    }
                });
            } else {
                $('#inKecLaka').html('<option value="-">Pilih Kecamatan</option>');
            }
        });

    });

    function editSEP() {
        noSep = $('#inNoSEP').val();
        noTelp = $('#inNoHp').val();
        noMr = $('#no_rm').val();

        dpjp = $('#inDPJP').val();
        catatan = $('#inKeterangan').val();
        diagnosa = $('#inDiagnosa').val();
        splitDiagnosa = diagnosa.split(' - ');
        diagAwal = splitDiagnosa[0];
        jnsPelayanan = $('#inJnsPelayanan').val();

        if (jnsPelayanan == 1) {
            poli = "";
        } else {
            poli = $('#inPoli').val();
        }

        splitPoli = poli.split(' | ');
        poliTuj = splitPoli[0];
        layanan_poli = $('input[name="inJk"]').val();
        cob = $('#inCOB').val();
        katarak = $('#inKatarak').val();
        lakaLantas = $('#inLaka').val();
        suplesi = $('#inSuplesi').val();

        if (lakaLantas == 0) {
            noLP = "";
            tglKejadian = "";
            penjamin = "";
            kdPropinsi = "";
            kdKabupaten = "";
            kdKecamatan = "";
            noSepSuplesi = "";
            keterangan = "";
        } else {
            noLP = $('#inNoLP').val();
            tglKejadian = $('#inTglLaka').val();
            kdPropinsi = $('#inProvLaka').val();
            kdKabupaten = $('#inKabLaka').val();
            kdKecamatan = $('#inKecLaka').val();
            keterangan = $('#inKetLaka').val();

            if (suplesi == 0) {
                noSepSuplesi = 0;
            } else {
                noSepSuplesi = $('#inNoSuplesi').val();
            }
        }



        klsRawatHak = $('#inHakKelas').val();
        if (jnsPelayanan == 2) {
            klsRawatNaik = '';
            pembiayaan = '';
            penanggungJawab = '';
        } else {
            klsRawatNaik = $('#inNaikKelas').val();
            pembiayaan = $('#inPembiayaan').val();
            penanggungJawab = $('#inPenanggungJawab').val();
        }


        $.ajax({
            url: "<?php echo base_url(); ?>Vclaim_bpjs/update_sep",
            method: "POST",
            data: {
                noSep: noSep,
                noMr: noMr,

                catatan: catatan,
                diagAwal: diagAwal,
                poliTuj: poliTuj,
                cob: cob,
                katarak: katarak,
                lakaLantas: lakaLantas,

                noLP: noLP,
                tglKejadian: tglKejadian,
                keterangan: keterangan,
                suplesi: suplesi,
                noSepSuplesi: noSepSuplesi,
                kdPropinsi: kdPropinsi,
                kdKabupaten: kdKabupaten,
                kdKecamatan: kdKecamatan,

                dpjp: dpjp,
                klsRawatHak: klsRawatHak,
                klsRawatNaik: klsRawatNaik,
                pembiayaan: pembiayaan,
                penanggungJawab: penanggungJawab,
                noTelp: noTelp,
                eksekutif: layanan_poli,

                id_pel: "<?= $id_pel ?>"
            },
            dataType: 'json',
            success: function(response) {
                if (response.status == 'success') {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil diupdate",
                        confirmButtonColor: "#3cb878",
                    }, function() {
                        location.reload();
                    });
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

    function delete_sep(no) {
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
                    url: "<?php echo base_url() ?>Vclaim_bpjs/hapus_sep",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        sep: no,
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

                            // reload_sep();
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
=======
<?php $this->load->view('form_vclaim/Modal_cari_sep'); ?>

<div class="panel panel-success card-view" id="sep_edit">
    <div class="panel-heading">
        <div class="pull-left">
            <h1 class="panel-title txt-light">DATA EDIT SEP
            </h1>
        </div>
        <div class="clearfix"></div>
    </div>


    <h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="clearfix"></div>
    <hr>
    <div class="row mt-30">
        <div class="col-md-12">
            <div class="col-md-3 mt-20 pl-5">
                <button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
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
                <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
            </div>
        </div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive ">
                    <table id="datable" class="table table-hover display">
                        <thead>
                            <tr class="bg-success">
                                <th>CETAK</th>
                                <th>AKSI</th>
                                <th>NO SEP</th>
                                <th>JENIS PELAYANAN</th>
                                <th>NO RUJUKAN</th>
                                <th>DIAGNOSA</th>
                                <th>POLI</th>
                                <th>TANGGAL</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>CETAK</th>
                                <th>AKSI</th>
                                <th>NO SEP</th>
                                <th>JENIS PELAYANAN</th>
                                <th>NO RUJUKAN</th>
                                <th>DIAGNOSA</th>
                                <th>POLI</th>
                                <th>TANGGAL</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-lg" id="modal_edit_data" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="form-body mt-10" id="vclaim_sep">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
                        </h6>
                        <hr width="95%">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">NO SEP </label>
                                    <div class="input-group col-md-9 has-success">
                                        <input type="text" autocomplete="off" class="form-control" placeholder="NAMA PASIEN" name="inTglSEP" id="inNoSEP" value="">
                                        <input type="hidden" id="inNoHp">
                                        <input type="hidden" id="no_rm">
                                        <input type="hidden" autocomplete="off" class="form-control" name="inHakKelas" id="inHakKelas">
                                        <input type="hidden" autocomplete="off" class="form-control" name="inJnsPelayanan" id="inJnsPelayanan">

                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>


                        </div>
                        <div class="row" id="rajal" style="display: none;">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">POLI TUJUAN</label>
                                    <div class="input-group col-md-9 has-success">
                                        <input type="hidden" autocomplete="off" class="form-control" name="inNama" id="inNama" value="" readonly>
                                        <!-- <span class="input-group-btn" style="width:0px;"></span> -->
                                        <input type="text" autocomplete="off" class="form-control" name="inPoli" id="inPoli" placeholder="Maksimal 3 karakter" value="">

                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">LAYANAN POLI </label>
                                    <div class="radio-list">
                                        <div class="radio-inline pl-0">
                                            <span class="radio radio-info">
                                                <input type="radio" value="0" name="inJk" id="inJkLk" checked>
                                                <label class="control-label" for="inJkLk">NON EKSEKUTIF</label>
                                            </span>
                                        </div>
                                        <div class="radio-inline pl-0">
                                            <span class="radio radio-info">
                                                <input type="radio" value="1" name="inJk" id="inJkPr">
                                                <label class="control-label" for="inJkPr">EKSEKUTIF</label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="ranap" style="display: none;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">NAIK KELAS</label>
                                    <div class="input-group col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inNaikKelas" id="inNaikKelas">

                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">PEMBIAYAAN </label>
                                    <div class="input-group col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inPembiayaan" id="inPembiayaan">
                                            <option value="">-</option>
                                            <option value="1">Pribadi</option>
                                            <option value="2">Pemberi Kerja</option>
                                            <option value="3">Asuransi Kesehatan Tambahan</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">PENANGGUNG JAWAB </label>
                                    <div class="input-group col-md-9 has-success">

                                        <input type="text" autocomplete="off" class="form-control" name="inPenanggungJawab" id="inPenanggungJawab" value="">

                                        <span class="help-block"></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">DPJP LAYANAN</label>
                                    <div class="input-group col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inDPJP" name="inDPJP">
                                            <?php
                                            foreach ($dokter as $row) {

                                            ?>
                                                <option value="<?php echo $row["id_dokter"]; ?>">
                                                    <?php echo  $row["nama"]; ?></option>
                                            <?php }  ?>
                                        </select>


                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">DIAGNOSA </label>
                                    <div class="input-group col-md-9 has-success">

                                        <input type="text" autocomplete="off" class="form-control" name="inDiagnosa" id="inDiagnosa" value="" placeholder="Maksimal 3 karakter">
                                        <span class="help-block"></span>
                                    </div>

                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">CATATAN </label>
                                    <div class="input-group col-md-9 has-success">
                                        <textarea class="form-control" id="inKeterangan" rows="2" cols="5"></textarea>
                                        <span class="help-block"></span>
                                    </div>

                                </div>
                            </div>




                        </div>

                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-4">COB<span class="text-danger">*</span></label>
                                    <div class="col-md-6 has-error" id="basic1">
                                        <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAgama" id="inCOB">
                                            <option value="0">Tidak</option>
                                            <option value="1">Ya</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Katarak<span class="text-danger">*</span></label>
                                    <div class="col-md-6 has-error" id="basic1">
                                        <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAgama" id="inKatarak">
                                            <option value="0">Tidak</option>
                                            <option value="1">Ya</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Kecelakaan<span class="text-danger">*</span></label>
                                    <div class="col-md-6 has-error" id="basic1">
                                        <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inLaka" id="inLaka">
                                            <option value="0">Tidak</option>
                                            <option value="1">Ya</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="collapse" id="col_kll">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>LAKALANTAS</h6>
                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">No LP</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="NO LP" name="inKetLaka" id="inNoLP">

                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Tanggal Kejadian</label>
                                        <div class="col-md-9 has-error">
                                            <input type="date" class="form-control " placeholder="TANGGAL" id="inTglLaka" name="inTanggalKunjugan" value="">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Keterangan</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control " placeholder="Keterangan Kecelakaan" name="inKetLaka" id="inKetLaka">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Suplesi</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAgama" id="inSuplesi">
                                                <option value="0" selected>Tidak</option>
                                                <option value="1">Ya</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">No SEP Suplesi</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control " placeholder="No SEP Suplesi" name="inKetLaka" id="inNoSuplesi" value="">

                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Provinsi Lakalantas</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inProvLaka" id="inProvLaka">

                                            </select>
                                            <span class="help-block"></span>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Kabupaten Lakalantas</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAgama" id="inKabLaka">

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Kecamatan Lakalantas</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAgama" id="inKecLaka">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div align="right">


                            <span class="help-block"></span>
                            <a class="btn btn-default btn-anim" href="javascript: history.go(-1)" style="margin-right: 5px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                            <button class="btn btn-info btn-anim" onclick="editSEP()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-print"></i><span class="btn-text">EDIT SEP</span>
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
                "url": '<?php echo base_url('Vclaim_bpjs/getMonitoringHistory'); ?>',
                "type": 'POST',
                "data": {
                    no: "<?= $kartu ?>",
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

    function tampilRangePermit() {
        $('#datable').DataTable().destroy();
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();

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
                "url": '<?= base_url('Vclaim_bpjs/getMonitoringHistory'); ?>',
                "type": 'POST',
                "data": {
                    no: "<?= $kartu ?>",
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



    function edit_sep(no_sep) {
        getKelas();
        $.ajax({
            url: "<?php echo base_url(); ?>Vclaim_bpjs/cari_sep",
            method: "post",
            dataType: 'json',
            data: {
                sep: no_sep,
            },
            success: function(data) {
                if (data.metaData['code'] == 200) {
                    $('#modal_edit_data').modal('toggle');
                    $('#inNoSEP').val(data.data['noSep']);
                    $('#inTglSEP').val(data.data['tglSep']).change();
                    $('#inNama').val(data.data['jnsPelayanan']);
                    $('#inHakKelas').val(data.data['klsRawat']['klsRawatHak']);
                    $('#no_rm').val(data.data['peserta']['noMr']);
                    $('#inJnsPelayanan').val(data.data['jnsPelayanan'] == 'Rawat Jalan' ? '2' : '1');
                    $('input[name="inJk"][value="' + data.data['poliEksekutif'] + '"]').prop("checked", true);
                    $('#inNaikKelas').val(data.data['klsRawat']['klsRawatNaik']).change();
                    $('#inPembiayaan').val(data.data['klsRawat']['pembiayaan']).change();
                    $('#inPenanggungJawab').val(data.data['klsRawat']['penanggungJawab']);
                    $('#inKeterangan').val(data.data['catatan']);
                    $('#inCOB').val(data.data['cob']).change();
                    $('#inKatarak').val(data.data['katarak']).change();
                    $('#inLaka').val(data.data['kdStatusKecelakaan']).change();
                    $('#inTglLaka').val(data.data['lokasiKejadian']['tglKejadian']).change();
                    $('#inKetLaka').val(data.data['lokasiKejadian']['ketKejadian']);
                    $('#inProvLaka').val(data.data['lokasiKejadian']['kdProp']).change();
                    $('#inKabLaka').val(data.data['lokasiKejadian']['kdKab']).change();
                    $('#inKecLaka').val(data.data['lokasiKejadian']['kdKec']).change();

                    getPeserta(data.data['peserta']['noKartu']);
                    getPoli(data.data['poli']);
                    getDiagnosa(data.data['diagnosa']);
                    getDokter(data.data['dpjp']['kdDPJP']);
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
    }

    function getPeserta(kartu) {
        $.ajax({
            url: "<?php echo base_url(); ?>Vclaim_bpjs/cek_peserta_by_kartu",
            method: "post",
            dataType: 'json',
            data: {
                kartu: kartu,
            },
            success: function(data) {
                if (data.status == 'success') {
                    if (data.data['mr']['noTelepon'] == null) {
                        $('#inNoHp').val('');
                    } else {
                        $('#inNoHp').val(data.data['mr']['noTelepon']);

                    }
                } else {
                    $('#inNoHp').val('');

                }

            }
        });
    }

    function getPoli(poli) {
        $.ajax({
            url: "<?php echo base_url(); ?>SEP/getPoli",
            method: "post",
            dataType: 'json',
            data: {
                poli: poli,
            },
            success: function(data) {

                $('#inPoli').val(data + ' | ' + poli);
            }
        });
    }

    function getDiagnosa(diagnosa) {
        $.ajax({
            url: "<?php echo base_url(); ?>SEP/getDiagnosa",
            method: "post",
            dataType: 'json',
            data: {
                diagnosa: diagnosa,
            },
            success: function(data) {

                $('#inDiagnosa').val(data + ' - ' + diagnosa);
            }
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

    function getKelas() {
        $.ajax({
            url: "<?php echo base_url(); ?>Vclaim_bpjs/getKelasRawat",
            method: "GET",
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html = '<option value="">-</option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].kode + '>' + data[i].nama + '</option>';
                }
                $('#inNaikKelas').html(html);
            }
        });
    }

    $(document).ready(function() {
        $('#inTuj').change(function() {
            if ($('#inTuj').val() != 0) {
                $('#kunjungan').collapse('show');
            } else {
                $('#kunjungan').collapse('hide');

            }
        });
        $('#inJnsPelayanan').change(function() {
            if ($('#inJnsPelayanan').val() == '2') {
                $('#rajal').show();
                $('#ranap').hide();
            } else {
                $('#rajal').hide();
                $('#ranap').show();
            }
        });

        $('#inPPKAsal').autocomplete({
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
            //appendTo: "#vclaim_sep"
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
            appendTo: "#vclaim_sep"
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
            appendTo: "#vclaim_sep"
        });



        $.ajax({
            url: "<?php echo base_url(); ?>Vclaim_bpjs/getProvinsi",
            method: "GET",
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html = '<option value="">Pilih Provinsi</option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].kode + '>' + data[i].nama + '</option>';
                }
                $('#inProvLaka').html(html);
            }
        });


        $('#inLaka').change(function() {
            var laka = $('#inLaka').val();

            if (laka == 1) {
                $('#col_kll').collapse('toggle');
            } else {
                $('#col_kll').collapse('hide');

                $('#inProvLaka').html('<option value="">Pilih Provinsi</option>');
            }

        });
        $('#inProvLaka').change(function() {
            var laka = $('#inProvLaka').val();
            if (laka != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>Vclaim_bpjs/getKab",
                    method: "POST",
                    data: {
                        prov: laka
                    },
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html = '<option value="-">Pilih Kabupaten/Kota</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].kode + '>' + data[i].nama + '</option>';
                        }
                        $('#inKabLaka').html(html);
                    }
                });
            } else {
                $('#inKabLaka').html('<option value="-">Pilih Kabupaten/Kota</option>');
            }
        });
        $('#inKabLaka').change(function() {
            var laka = $('#inKabLaka').val();
            if (laka != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>Vclaim_bpjs/getKec",
                    method: "POST",
                    data: {
                        kab: laka
                    },
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html = '<option value="-">Pilih Kecamatan</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].kode + '>' + data[i].nama + '</option>';
                        }
                        $('#inKecLaka').html(html);
                    }
                });
            } else {
                $('#inKecLaka').html('<option value="-">Pilih Kecamatan</option>');
            }
        });

    });

    function editSEP() {
        noSep = $('#inNoSEP').val();
        noTelp = $('#inNoHp').val();
        noMr = $('#no_rm').val();

        dpjp = $('#inDPJP').val();
        catatan = $('#inKeterangan').val();
        diagnosa = $('#inDiagnosa').val();
        splitDiagnosa = diagnosa.split(' - ');
        diagAwal = splitDiagnosa[0];
        jnsPelayanan = $('#inJnsPelayanan').val();

        if (jnsPelayanan == 1) {
            poli = "";
        } else {
            poli = $('#inPoli').val();
        }

        splitPoli = poli.split(' | ');
        poliTuj = splitPoli[0];
        layanan_poli = $('input[name="inJk"]').val();
        cob = $('#inCOB').val();
        katarak = $('#inKatarak').val();
        lakaLantas = $('#inLaka').val();
        suplesi = $('#inSuplesi').val();

        if (lakaLantas == 0) {
            noLP = "";
            tglKejadian = "";
            penjamin = "";
            kdPropinsi = "";
            kdKabupaten = "";
            kdKecamatan = "";
            noSepSuplesi = "";
            keterangan = "";
        } else {
            noLP = $('#inNoLP').val();
            tglKejadian = $('#inTglLaka').val();
            kdPropinsi = $('#inProvLaka').val();
            kdKabupaten = $('#inKabLaka').val();
            kdKecamatan = $('#inKecLaka').val();
            keterangan = $('#inKetLaka').val();

            if (suplesi == 0) {
                noSepSuplesi = 0;
            } else {
                noSepSuplesi = $('#inNoSuplesi').val();
            }
        }



        klsRawatHak = $('#inHakKelas').val();
        if (jnsPelayanan == 2) {
            klsRawatNaik = '';
            pembiayaan = '';
            penanggungJawab = '';
        } else {
            klsRawatNaik = $('#inNaikKelas').val();
            pembiayaan = $('#inPembiayaan').val();
            penanggungJawab = $('#inPenanggungJawab').val();
        }


        $.ajax({
            url: "<?php echo base_url(); ?>Vclaim_bpjs/update_sep",
            method: "POST",
            data: {
                noSep: noSep,
                noMr: noMr,

                catatan: catatan,
                diagAwal: diagAwal,
                poliTuj: poliTuj,
                cob: cob,
                katarak: katarak,
                lakaLantas: lakaLantas,

                noLP: noLP,
                tglKejadian: tglKejadian,
                keterangan: keterangan,
                suplesi: suplesi,
                noSepSuplesi: noSepSuplesi,
                kdPropinsi: kdPropinsi,
                kdKabupaten: kdKabupaten,
                kdKecamatan: kdKecamatan,

                dpjp: dpjp,
                klsRawatHak: klsRawatHak,
                klsRawatNaik: klsRawatNaik,
                pembiayaan: pembiayaan,
                penanggungJawab: penanggungJawab,
                noTelp: noTelp,
                eksekutif: layanan_poli,

                id_pel: "<?= $id_pel ?>"
            },
            dataType: 'json',
            success: function(response) {
                if (response.status == 'success') {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil diupdate",
                        confirmButtonColor: "#3cb878",
                    }, function() {
                        location.reload();
                    });
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

    function delete_sep(no) {
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
                    url: "<?php echo base_url() ?>Vclaim_bpjs/hapus_sep",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        sep: no,
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

                            // reload_sep();
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>