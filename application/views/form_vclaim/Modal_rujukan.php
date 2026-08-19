<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>
<?php $this->load->view('form_vclaim/Modal_cari_sep'); ?>

<div class="panel panel-success card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h1 class="panel-title txt-light">FORM <?= $judul ?>
            </h1>
        </div>
        <div class="clearfix"></div>
    </div>
    <h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">No Kartu </label>
                        <div class="input-group col-md-9 has-success">
                            <input type="text" autocomplete="off" class="form-control" placeholder="" name="inNoKartu" id="inNoKartu" value="<?= $kartu ?>" readonly>

                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">No SEP </label>
                        <div class="input-group col-md-9 has-success">
                            <input type="text" autocomplete="off" class="form-control" placeholder="" name="inNoSep" id="inNoSep" value="<?= $sep ?>">

                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Tanggal Rujukan</label>
                        <div class="input-group col-md-9 has-success">
                            <input type="date" class="form-control" placeholder="TANGGAL" id="inTanggalRujuk" name="inTanggalRujuk" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                            echo date("Y-m-d"); ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Tanggal Rencana Kunjungan</label>
                        <div class="input-group col-md-9 has-success">
                            <input type="date" class="form-control" placeholder="TANGGAL" id="inTanggalKunjugan" name="inTanggalKunjugan" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                    echo date("Y-m-d"); ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Faskes<span class="text-danger">*</span></label>
                        <div class="input-group col-md-9 has-success">
                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAsal" id="inAsal">
                                <option value="1">FASKES 1</option>
                                <option value="2" selected>FASKES 2</option>
                            </select>

                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">PPK Dirujuk<span class="text-danger">*</span></label>
                        <div class="input-group col-md-9 has-success">
                            <!-- <input type="text" autocomplete="off" class="form-control" name="inNama" id="inNama" value="<?= $ppk_asal['kode'] ?>" readonly> -->
                            <!-- <span class="input-group-btn" style="width:0px;"></span> -->
                            <input type="text" autocomplete="off" class="form-control" name="inPPKRujuk" id="inPPKRujuk" value="" placeholder="Masukkan min 3 karakter">

                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Jenis Pelayanan<span class="text-danger">*</span></label>
                        <div class="input-group col-md-9 has-success">
                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inJnsPelayanan" id="inJnsPelayanan">
                                <option value="1" <?php echo ($jenis_pelayanan == "RAWAT INAP")?'selected':''; ?>>RAWAT INAP</option>
                                <option value="2" <?php echo ($jenis_pelayanan != "RAWAT INAP")?'selected':''; ?>>RAWAT JALAN</option>
                            </select>

                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Poli Tujuan</label>
                        <div class="input-group col-md-9 has-success">

                            <input type="text" autocomplete="off" class="form-control" name="inPoli" id="inPoli" value="" placeholder="Masukkan min 3 karakter">

                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Tipe Rujukan<span class="text-danger">*</span></label>
                        <div class="input-group col-md-9 has-success">
                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inTipe" id="inTipe">
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
                            <input type="text" autocomplete="off" class="form-control" name="inNama" id="inDiagnosa" value="" placeholder="Masukkan min 3 karakter">
                            <span class="help-block"></span>
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Catatan </label>
                        <div class="input-group col-md-9 has-success">
                            <textarea class="form-control" id="inKeterangan" rows="2" cols="5"></textarea>
                            <span class="help-block"></span>
                        </div>

                    </div>
                </div>
                <br>
                <div align="right">
                    <!-- <input type="hidden" autocomplete="off" class="form-control" id="inJnsPelayanan" value="</?php
                                                                                                            echo ($jenis_pelayanan != "RAWAT INAP") ? "2" : "1"
                                                                                                            ?>" readonly> -->
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

<!-- <div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h1 class="panel-title txt-dark"><span class="label label-success font-weight-1000">LIST DATA RUJUKAN </span>
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
       
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display  pb-30">
                        <thead>
                            <tr class="bg-success">

                                <th>CETAK</th>
                                <th>AKSI</th>
                                <th>NO RUJUKAN</th>
                                <th>JENIS RUJUKAN</th>
                                <th>POLI</th>
                                <th>PPK DIRUJUK</th>
                                <th>TANGGAL RUJUKAN</th>
                                <th>TANGGAL RENCANA KUNJUNGAN</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>

    </div>
</div> -->

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
            //appendTo: "#vclaim_sep"
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
                    alert('Tidak Ada');

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
        tglRujukan = $('#inTanggalRujuk').val();
        tglRencanaKunjungan = $('#inTanggalKunjugan').val();
        jnsPelayanan = $('#inJnsPelayanan').val();
        tipeRujukan = $('#inTipe').val();
        catatan = $('#inKeterangan').val();

        poli = $('#inPoli').val();

        splitPoli = poli.split(' | ');
        poliTuj = splitPoli[0];

        ppk = $('#inPPKRujuk').val();
        splitPpk = ppk.split(' | ');
        ppkDirujuk = splitPpk[0];

        diagnosa = $('#inDiagnosa').val();
        splitDiagnosa = diagnosa.split(' - ');
        diagRujukan = splitDiagnosa[0];
        $.ajax({
            url: "<?php echo $action ?>",
            method: "POST",
            data: {
                noSep: no_sep,
                tglRujukan: tglRujukan,
                tglRencanaKunjungan: tglRencanaKunjungan,
                ppkDirujuk: ppkDirujuk,
                jnsPelayanan: jnsPelayanan,
                catatan: catatan,
                diagRujukan: diagRujukan,
                tipeRujukan: tipeRujukan,
                poliKontrol: poliTuj,

            },
            dataType: 'json',
            success: function(response) {
                if (response.status == 'success') {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "No rujukan : " + response.data['rujukan']['noRujukan'],
                        confirmButtonColor: "#3cb878",
                    });
                    // location.reload();
                    // $('#datable').DataTable().ajax.reload();

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
                "url": '<?php echo base_url('Vclaim_bpjs/getKontrolByKartu'); ?>',
                "type": 'POST',
                "data": {
                    tipe: 'now',
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
                "url": '<?= base_url('Vclaim_bpjs/getKontrolByKartu'); ?>',
                "type": 'POST',
                "data": {
                    tipe: 'range',
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
</script>