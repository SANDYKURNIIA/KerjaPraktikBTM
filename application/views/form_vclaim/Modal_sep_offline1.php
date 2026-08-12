<<<<<<< HEAD
<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>
<?php $this->load->view('form_vclaim/Modal_cari_sep'); ?>

<div class="panel panel-success card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h1 class="panel-title txt-light">DATA BUAT SEP NON JARKOMDAT
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
                            <input type="text" autocomplete="off" class="form-control" name="inNama" id="inNama" value="<?php
                                                                                                                        echo ($jenis_pelayanan == "RAWAT INAP" || $jenis_surat == 'SPRI') ? "Rawat inap" : "Rawat Jalan"
                                                                                                                        ?>" readonly>
                            <input type="hidden" autocomplete="off" class="form-control" name="inNama" id="inNoBPJS" value="<?= $kartu ?>">
                            <input type="hidden" autocomplete="off" class="form-control" name="inNama" id="inHakKelas" value="">
                            <input type="hidden" autocomplete="off" class="form-control" name="inNama" id="no_rm" value="<?= $no_rm ?>">
                            <input type="hidden" autocomplete="off" class="form-control" name="inNama" id="inNoHp" value="">
                            <input type="hidden" autocomplete="off" class="form-control" name="inNama" id="inJnsPelayanan" value="<?php
                                                                                                                                    echo ($jenis_pelayanan == "RAWAT INAP" || $jenis_surat == 'SPRI') ? "1" : "2"
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
                                <option value="1">FASKES 1</option>
                                <option value="2" selected>FASKES 2</option>
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
                            <input type="text" autocomplete="off" class="form-control" name="inPPKAsal" id="inPPKAsal" value="0110R005 | RS BAKTI TIMAH - KOTA PANGKAL PINANG">

                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">TANGGAL RUJUKAN<span class="text-danger">*</span></label>
                        <div class="input-group col-md-9 has-success">
                            <input type="date" autocomplete="off" class="form-control" placeholder="NAMA PASIEN" name="inTglRujuk" id="inTglRujuk" value="<?= date('Y-m-d') ?>">

                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">NO RUJUKAN </label>
                        <div class="input-group col-md-9 has-success">
                            <input type="text" autocomplete="off" class="form-control" placeholder="NO RUJUKAN" name="inNoRujuk" id="inNoRujuk" value="">
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
                            <input type="text" autocomplete="off" class="form-control" name="inPoli" id="inPoli" placeholder="Maksimal 3 karakter" value="<?= (preg_match('/UGD/i', $jenis_pelayanan) && ($jenis_surat == '')) ? "IGD | INSTALASI GAWAT DARURAT" : ""; ?>">

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
                        <label class="control-label col-md-3">DPJP LAYANAN1</label>
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
                            <input type="text" autocomplete="off" class="form-control" name="inNama" id="inDiagnosa" value="" placeholder="Maksimal 3 karakter">
                            <span class="help-block"></span>
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">NO. SURAT KONTROL / SKDP<span class="text-danger">*</span></label>
                        <div class="input-group col-md-9 has-success">
                            <input type="text" class="form-control" id="inSKDP" name="inTanggalKunjugan" placeholder="NO. SURAT KONTROL / SKDP">
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
                <!-- <div  id="kunjungan"> -->
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
=======
<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>
<?php $this->load->view('form_vclaim/Modal_cari_sep'); ?>

<div class="panel panel-success card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h1 class="panel-title txt-light">DATA BUAT SEP NON JARKOMDAT
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
                            <input type="text" autocomplete="off" class="form-control" name="inNama" id="inNama" value="<?php
                                                                                                                        echo ($jenis_pelayanan == "RAWAT INAP" || $jenis_surat == 'SPRI') ? "Rawat inap" : "Rawat Jalan"
                                                                                                                        ?>" readonly>
                            <input type="hidden" autocomplete="off" class="form-control" name="inNama" id="inNoBPJS" value="<?= $kartu ?>">
                            <input type="hidden" autocomplete="off" class="form-control" name="inNama" id="inHakKelas" value="">
                            <input type="hidden" autocomplete="off" class="form-control" name="inNama" id="no_rm" value="<?= $no_rm ?>">
                            <input type="hidden" autocomplete="off" class="form-control" name="inNama" id="inNoHp" value="">
                            <input type="hidden" autocomplete="off" class="form-control" name="inNama" id="inJnsPelayanan" value="<?php
                                                                                                                                    echo ($jenis_pelayanan == "RAWAT INAP" || $jenis_surat == 'SPRI') ? "1" : "2"
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
                                <option value="1">FASKES 1</option>
                                <option value="2" selected>FASKES 2</option>
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
                            <input type="text" autocomplete="off" class="form-control" name="inPPKAsal" id="inPPKAsal" value="0110R005 | RS BAKTI TIMAH - KOTA PANGKAL PINANG">

                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">TANGGAL RUJUKAN<span class="text-danger">*</span></label>
                        <div class="input-group col-md-9 has-success">
                            <input type="date" autocomplete="off" class="form-control" placeholder="NAMA PASIEN" name="inTglRujuk" id="inTglRujuk" value="<?= date('Y-m-d') ?>">

                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">NO RUJUKAN </label>
                        <div class="input-group col-md-9 has-success">
                            <input type="text" autocomplete="off" class="form-control" placeholder="NO RUJUKAN" name="inNoRujuk" id="inNoRujuk" value="">
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
                            <input type="text" autocomplete="off" class="form-control" name="inPoli" id="inPoli" placeholder="Maksimal 3 karakter" value="<?= (preg_match('/UGD/i', $jenis_pelayanan) && ($jenis_surat == '')) ? "IGD | INSTALASI GAWAT DARURAT" : ""; ?>">

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
                        <label class="control-label col-md-3">DPJP LAYANAN1</label>
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
                            <input type="text" autocomplete="off" class="form-control" name="inNama" id="inDiagnosa" value="" placeholder="Maksimal 3 karakter">
                            <span class="help-block"></span>
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">NO. SURAT KONTROL / SKDP<span class="text-danger">*</span></label>
                        <div class="input-group col-md-9 has-success">
                            <input type="text" class="form-control" id="inSKDP" name="inTanggalKunjugan" placeholder="NO. SURAT KONTROL / SKDP">
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
                <!-- <div  id="kunjungan"> -->
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
                   