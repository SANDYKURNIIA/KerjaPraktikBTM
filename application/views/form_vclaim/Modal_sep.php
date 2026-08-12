<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>
<?php $this->load->view('form_vclaim/Modal_cari_sep'); ?>

<div class="panel panel-success card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h1 class="panel-title txt-light">DATA BUAT SEP
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
                        <label class="control-label col-md-3">TANGGAL SEP </label>
                        <div class="input-group col-md-9 has-success">
                            <input type="date" autocomplete="off" class="form-control" placeholder="NAMA PASIEN" name="inTglSEP" id="inTglSEP" value="<?= date('Y-m-d') ?>">

                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">JENIS PELAYANAN </label>
                        <div class="input-group col-md-9 has-success">
                            <input type="text" autocomplete="off" class="form-control" name="inNama" id="inNama" value="<?= $pelayanan['nama'] ?>" readonly>
                            <input type="hidden" autocomplete="off" class="form-control" name="inNama" id="inNoBPJS" value="<?= $peserta['noKartu'] ?>">
                            <input type="hidden" autocomplete="off" class="form-control" name="inNama" id="inHakKelas" value="<?= $peserta['hakKelas']['kode'] ?>">
                            <input type="hidden" autocomplete="off" class="form-control" name="inNama" id="no_rm" value="<?= $no_rm ?>">
                            <input type="hidden" autocomplete="off" class="form-control" name="inNama" id="inNoHp" value="<?= $peserta['mr']['noTelepon'] != null ? $peserta['mr']['noTelepon'] : $pasien['no_hp'] ?>">
                            <input type="hidden" autocomplete="off" class="form-control" name="inNama" id="inJnsPelayanan" value="<?php
                                                                                                                                    echo ($pelayanan['nama'] == "Rawat Jalan") ? "2" : "1"
                                                                                                                                    ?>" readonly>

                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">ASAL RUJUKAN<span class="text-danger">*</span></label>
                        <div class="input-group col-md-9 has-success">
                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAsal" id="inAsal">
                                <option value="1" <?php if ($asal == 1) echo "selected"; ?>>FASKES 1</option>
                                <option value="2" <?php if ($asal == 2) echo "selected"; ?>>FASKES 2</option>
                            </select>

                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">PPK ASAL RUJUKAN<span class="text-danger">*</span></label>
                        <div class="input-group col-md-9 has-success">
                            <!-- <input type="text" autocomplete="off" class="form-control" name="inNama" id="inNama" value="<?= $ppk_asal['kode'] ?>" readonly> -->
                            <!-- <span class="input-group-btn" style="width:0px;"></span> -->
                            <input type="text" autocomplete="off" class="form-control" name="inPPKAsal" id="inPPKAsal" value="<?= $ppk_asal['kode'] . " | " . $ppk_asal['nama'] ?>" readonly>

                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">TANGGAL RUJUKAN<span class="text-danger">*</span></label>
                        <div class="input-group col-md-9 has-success">
                            <input type="date" autocomplete="off" class="form-control" placeholder="NAMA PASIEN" name="inTglRujuk" id="inTglRujuk" value="<?= $tglKunjungan ?>" readonly>

                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">NO RUJUKAN </label>
                        <div class="input-group col-md-9 has-success">
                            <input type="text" autocomplete="off" class="form-control" placeholder="NO RUJUKAN" name="inNoRujuk" id="inNoRujuk" value="<?= $noKunjungan ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row" id="rajal" style="display: none;">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">POLI TUJUAN</label>
                        <div class="input-group col-md-9 has-success">
                            <!-- <input type="hidden" autocomplete="off" class="form-control" name="inNama" id="inNama" value="<?= $poliRujukan['kode'] ?>" readonly> -->
                            <!-- <span class="input-group-btn" style="width:0px;"></span> -->
                            <input type="text" autocomplete="off" class="form-control" name="inPoli" id="inPoli" value="<?= $poliRujukan['kode'] . " | " . $poliRujukan['nama'] ?>">

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
                                <option value="-">-</option>
                                <?php
                                foreach ($dokter as $row) {

                                ?>
                                    <option value="<?php echo $row["id_dokter"]; ?>" <?php if ($dpjp == $row["id_dokter"]) echo "selected"; ?>>
                                        <?php echo  $row["nama"]; ?></option>
                                <?php }  ?>
                            </select>
                            <input type="hidden" id="kodeDPJP">
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">DIAGNOSA </label>
                        <div class="input-group col-md-9 has-success">
                            <!-- <input type="text" autocomplete="off" class="form-control" name="inNama" id="inNama" value="<?= $diagnosa['kode'] ?>" readonly>
                            <span class="input-group-btn" style="width:0px;"></span> -->
                            <input type="text" autocomplete="off" class="form-control" name="inNama" id="inDiagnosa" value="<?= $diagnosa['kode'] . " - " . $diagnosa['nama'] ?>">

                            <span class="help-block"></span>
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">NO. SURAT KONTROL / SKDP<span class="text-danger">*</span></label>
                        <div class="input-group col-md-9 has-success">
                            <input type="text" class="form-control" id="inSKDP" name="inTanggalKunjugan" id="inSKDP" placeholder="NO. SURAT KONTROL / SKDP">
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">TUJUAN KUNJUNGAN</label>
                        <div class="input-group col-md-9 has-success">
                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inTuj" id="inTuj">
                                <option value="0">Normal</option>
                                <option value="1">Prosedur</option>
                                <option value="2">Konsul Dokter</option>
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
                <!-- <div class="collapse" id="kunjungan"> -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">PROSEDUR</label>
                        <div class="input-group col-md-9 has-success">
                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inFlag" id="inFlag">
                                <option value="">-</option>
                                <option value="0">Prosedur Tidak Berkelanjutan</option>
                                <option value="1">Prosedur dan Terapi Berkelanjutan</option>

                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">PENUNJANG</label>
                        <div class="input-group col-md-9 has-success">
                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inPenunjang" id="inPenunjang">
                                <option value="">-</option>
                                <option value="1">Radioterapi</option>
                                <option value="2">Kemoterapi</option>
                                <option value="3">Rehabilitasi Medik</option>
                                <option value="4">Rehabilitasi Psikososial</option>
                                <option value="5">Transfusi Darah</option>
                                <option value="6">Pelayanan Gigi</option>
                                <option value="7">Laboratorium</option>
                                <option value="8">USG</option>
                                <option value="9">Farmasi</option>
                                <option value="10">Lain-Lain</option>
                                <option value="11">MRI</option>
                                <option value="12">HEMODIALISA</option>

                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">ASESMEN</label>
                        <div class="input-group col-md-9 has-success">
                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAssesmen" id="inAssesmen">
                                <option value="">-</option>
                                <option value="1">Poli spesialis tidak tersedia pada hari sebelumnya</option>
                                <option value="2">Jam Poli telah berakhir pada hari sebelumnya</option>
                                <option value="3">Dokter Spesialis yang dimaksud tidak praktek pada hari sebelumnya</option>
                                <option value="4">Atas Instruksi RS</option>
                                <option value="5">Tujuan Kontrol</option>
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>

            <br>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-4">COB<span class="text-danger">*</span></label>
                        <div class="col-md-6 has-error" id="basic1">
                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inCOB" id="inCOB">
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
                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inKatarak" id="inKatarak">
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
                                <input type="date" class="form-control" placeholder="TANGGAL" id="inTglLaka" name="inTanggalKunjugan" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                echo date("Y-m-d"); ?>">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Keterangan</label>
                            <div class="col-md-9 has-success">
                                <input type="text" class="form-control" placeholder="Keterangan Kecelakaan" name="inKetLaka" id="inKetLaka">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Suplesi</label>
                            <div class="col-md-9 has-success">
                                <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAgama" id="inSuplesi">
                                    <option value="0">Tidak</option>
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
                                <input type="text" class="form-control" placeholder="No SEP Suplesi" name="inKetLaka" id="inNoSuplesi">

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
                <button class="btn btn-success btn-anim" onclick="insertSEP()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-print"></i><span class="btn-text">BUAT SEP</span>
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
        $.ajax({

            url: "<?php echo base_url(); ?>Vclaim_bpjs/getJumlahSEPRujukan",
            method: "POST",
            data: {
                no: "<?= $noRujukan; ?>",

            },
            dataType: 'json',
            success: function(data) {
                var span = document.getElementById("jumlahSEP");
                if (data.metaData['code'] == 200) {

                    span.textContent = data.data['jumlahSEP'];

                } else {
                    span.textContent = data.metaData['message'];
                    span.style.color += "red";

                }

                var span1 = document.getElementById("jumlahSEP1");
                if (data.metaData1['code'] == 200) {

                    span1.textContent = data.data1['jumlahSEP'];
                    reload_sep();
                    reload_sep1();
                } else {
                    span1.textContent = data.metaData1['message'];
                    span1.style.color += "red";

                }
            }
        });

    });
    $(document).ready(function() {
        $('#jumSep').show();

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


    });
    $(document).ready(function() {
        $('#inTuj').change(function() {
            if ($('#inTuj').val() != 0) {
                $('#kunjungan').collapse('show');
            } else {
                $('#kunjungan').collapse('hide');

            }
        });
        if ($('#inJnsPelayanan').val() == 2) {
            $('#rajal').show();
            $('#ranap').hide();
        } else {
            $('#rajal').hide();
            $('#ranap').show();
        }

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

        $('#inLaka').change(function() {
            var laka = $('#inLaka').val();
            if (laka == 1) {
                $('#col_kll').collapse('toggle');
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
        $('#kodeDPJP').val('<?php echo $this->db->get_where('dokter', ['id_dokter' => $dpjp])->row()->kode_dokter; ?>');
        $('#inDPJP').change(function() {
            c = $('#inDPJP').val();
            if (c != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>SEP/getDokterById",
                    method: "POST",
                    data: {
                        kode_dokter: c,
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#kodeDPJP').val(data);
                    }
                });
            } else {
                alert('Data No Found');
            }
        });
        // $('#inPoli').change(function() {
        //     c = $('#inPoli').val();
        //     splitDiagC = c.split("|");
        //     poli = splitDiagC[0];
        //     jnsPelayanan = $('#inJnsPelayanan').val();
        //     if (poli != '') {
        //         $.ajax({
        //             url: "<?php echo base_url(); ?>Vclaim_bpjs/getDokter",
        //             method: "POST",
        //             data: {
        //                 poli: poli,
        //                 jnsPelayanan: jnsPelayanan
        //             },
        //             dataType: 'json',
        //             success: function(data) {
        //                 var html = '';
        //                 var i;
        //                 html = '<option value="-">Pilih Dokter</option>';
        //                 for (i = 0; i < data.length; i++) {
        //                     html += '<option value=' + data[i].kode + '>' + data[i].nama + '</option>';
        //                 }
        //                 $('#inDokBPJS').html(html);
        //             }
        //         });
        //     } else {
        //         $('#inDokBPJS').html('<option value="-">Pilih Dokter</option>');
        //     }
        // });
    });



    function insertSEP() {
        tgl_sep = $('#inTglSEP').val();
        no_kartu = $('#inNoBPJS').val();
        noTelp = $('#inNoHp').val();
        jnsPelayanan = $('#inJnsPelayanan').val();
        noMr = $('#no_rm').val();
        tglRujukan = $('#inTglRujuk').val();
        noRujukan = $('#inNoRujuk').val();
        asalRujukan = $('#inAsal').val();
        ppk = $('#inPPKAsal').val();
        splitPpk = ppk.split(' | ');
        ppkRujukan = splitPpk[0];
        dpjp = $('#inDPJP').val();
        catatan = $('#inKeterangan').val();
        diagnosa = $('#inDiagnosa').val();
        splitDiagnosa = diagnosa.split(' - ');
        diagAwal = splitDiagnosa[0];
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


        noSurat = $('#inSKDP').val();
        kodeDPJP = $('#kodeDPJP').val();

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

        tujuanKunj = $('#inTuj').val();
        if (tujuanKunj == 0) {
            flagProcedure = "";
            kdPenunjang = "";
            assesmentPel = "";
        } else {
            flagProcedure = $('#inFlag').val();
            kdPenunjang = $('#inPenunjang').val();
            assesmentPel = $('#inAssesmen').val();
        }
        if (lakaLantas != 0 && ($("#inNoLP").val() == "" || $("#inNoLP").val() == null)) {
            swal({
                title: "Gagal!",
                type: "warning",
                text: "No LP tidak Boleh Kosong",
                confirmButtonColor: "#3cb878",
            });
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>Vclaim_bpjs/insert_SEP",
                method: "POST",
                data: {
                    no_kartu: no_kartu,
                    noMr: noMr,
                    jnsPelayanan: jnsPelayanan,
                    tgl_sep: tgl_sep,
                    tglRujukan: tglRujukan,
                    noRujukan: noRujukan,
                    ppkRujukan: ppkRujukan,
                    asalRujukan: asalRujukan,
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
                    noSurat: noSurat,
                    kodeDPJP: kodeDPJP,
                    klsRawatHak: klsRawatHak,
                    klsRawatNaik: klsRawatNaik,
                    pembiayaan: pembiayaan,
                    penanggungJawab: penanggungJawab,
                    noTelp: noTelp,
                    eksekutif: layanan_poli,
                    tujuanKunj: tujuanKunj,
                    flagProcedure: flagProcedure,
                    kdPenunjang: kdPenunjang,
                    assesmentPel: assesmentPel,
                    id_pel: "<?= $id_pel ?>",
                    jenis_kunjungan: "<?= $jenis_sep ?>",

                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == 'success') {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data Berhasil dinput. NO SEP : " + response.data['sep']['noSep'],
                            confirmButtonColor: "#3cb878",
                        }, function() {
                            $().ready(function() {
                                window.location.href = '<?php echo base_url() ?>SEP/cetak_sep/' + response.data['sep']['noSep'];
                            });
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
    }
</script>