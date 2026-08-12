<<<<<<< HEAD
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_tambah_kunjungan" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i>TAMBAH DATA KUNJUNGAN</h5>
                    </div>
                    <div class="modal-body">
                        <!-- <div class="col-md-12" style="text-align:right;">
							<div id="btn_edit" class="col-md-12"></div>
						</div> -->
                        <div class="clearfix"></div>
                        <div class="form-body mt-20">
                            <hr>
                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">TIPE
											MASUK</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inTipeMasuk" name="inTipeMasuk">
												<option value="-">-</option>
												<?php

												foreach ($tipe_masuk as $row) {

												?>
													<option value="<?php echo $row['id_tipe_masuk'] . "|" . $row['biaya_admin']; ?>">
														<?php echo $row['nama_tipe_masuk']; ?></option>
												<?php }  ?>
											</select>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">TANGGAL
											KUNJUNGAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control filled-input" placeholder="TANGGAL" id="inTanggalKunjugan" name="inTanggalKunjugan" value="<?php date_default_timezone_set('Asia/Jakarta');
																																												echo date("Y-m-d H:i:s"); ?>">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>
							<span class="help-block"></span>
							<!-- /Row -->

							<!-- /Row -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">ASAL
											PASIEN</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inAsalPasien" name="inAsalPasien">
												<?php

												foreach ($asal_pasien as $row) {

												?>
													<option value="<?php echo $row['id_asal_pasien']; ?>">
														<?php echo $row['nama']; ?></option>
												<?php }  ?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="help-block"></span>
										<label class="control-label col-md-3">NO SEP /
											SLIP</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control filled-input" placeholder="NO SEP" name="inNoSEP" id="inNoSEP">

										</div>
									</div>
								</div>
							</div>
							<span class="help-block"></span>
							<!-- /Row -->

							<!-- row -->
							<div class="row">
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<span class="help-block"></span>
										<label class="control-label col-md-3">DIAGNOSA</label>
										<div class="col-md-9 has-success" id="the-basics">

											<input class="typeahead form-control filled-input" type="text" placeholder="Diagnosa" id="inDiagnosa" name="inDiagnosa" style="width: 284.17px;">

										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">KETERANGAN
											PASIEN</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control filled-input" placeholder="KETERANGAN" name="inKeterangan" id="inKeterangan">

										</div>
									</div>
								</div>
							</div>
							<span class="help-block"></span>
							<div class="data_hide data_hide_2">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">POLI
												TUJUAN</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inJenisPoli" name="inJenisPoli">
												</select>
											</div>
										</div>
									</div>
									<!--/span-->
								</div>
								<span class="help-block"></span>
							</div>
							<!-- /Row -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">NAMA DOKTER
											(DPJP)</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inDPJP" name="inDPJP">

											</select>
											<span id="dpjp_error" class="text-danger"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6 collapse" id="cb_hide">
									<div class="form-group">
										<label class="control-label col-md-3">CARA
											BAYAR</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inCaraBayar" name="inCaraBayar">
												<option value="-">-</option>
												<?php
												foreach ($cara_bayar as $row) {

												?>
													<option value="<?php echo $row["id_cara_bayar"]; ?>">
														<?php echo  $row["nama"]; ?></option>
												<?php }  ?>
											</select>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>

							<div class="data_hide data_hide_3">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">KELAS</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inKelasRuangan" name="inKelasRuangan">
													<option value="-">-</option>
													<?php
													foreach ($kelas as $row) {

													?>
														<option value="<?php echo $row["kelas_ruangan"]; ?>">
															<?php echo $row["kelas_ruangan"]; ?>
														</option>
													<?php }  ?>
												</select>
											</div>
										</div>
									</div>

									<span class="help-block"></span>
									<!-- /Row -->

									<div class="col-md-6" id="outTempatTidur">
										<div class="form-group">
											<label class="control-label col-md-3">NO TEMPAT
												TIDUR</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inTempatTidur" id="inTempatTidur">
													<!-- 																									 <option value="-">-</option> -->
												</select>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<input type="hidden" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inBiayaAdm" name="inBiayaAdm">
							<input type="hidden" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inBiayaDok" name="inBiayaDok">
							<input type="hidden" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inBiayaRS" name="inBiayaRS">

							<div class="row mt-25">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">TOTAL BIAYA</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inTotal" name="inTotal">
										</div>
									</div>
								</div>
								<div class="data_hide data_hide_2">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">NO ANTRIAN</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inAntrian" disabled>
											</div>
											<div class="btn btn-success btn-icon-anim btn-circle" onclick="refresh()"><i class="icon-refresh"></i></div>
										</div>
									</div>
								</div>
							</div>

                            <br>

                            <!-- /Row -->
                            <div class="row" style="margin-left:120px;">
                                <div class="col-md-3">
                                    <!-- <span class="help-block"></span> -->
                                    <button class="btn btn-success btn-anim  btn-sm" onclick="Kunjungan()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="clearfix"></div>
                        <div class="form-body collapse" id="vclaim_sep">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>SEP</h6>
                            <hr>
                            <!-- <div align="center">
								<div class="btn-group">
									<button type="button" class="btn btn-success" id="ruj" style="width:390px;">Rujukan
									</button>
									<button type="button" class="btn btn-default" id="rum" style="width:390px;">Rujukan Manual
									</button>
								</div>
							</div> -->
                            <span class="help-block"></span>
                            <input type="hidden" class="form-control filled-input" id="inJnsPelayanan">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">TANGGAL SEP<span class="text-danger">*</span></label>
                                        <div class="col-md-9 has-error">
                                            <input type="date" class="form-control filled-input" placeholder="TANGGAL" id="inTglSEP" name="inTanggalKunjugan" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                                        echo date("Y-m-d"); ?>">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">PPK Asal Pasien<span class="text-danger">*</span></label>
                                        <div class="col-md-9 has-error" id="basic1">
                                            <input type="text" class="form-control filled-input typeahead1" placeholder="Masukkan min 3 karakter" id="inPPKAsal" name="inTanggalKunjugan">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">TANGGAL RUJUKAN<span class="text-danger">*</span></label>
                                        <div class="col-md-9 has-error">
                                            <input type="date" class="form-control filled-input" placeholder="TANGGAL" id="inTglRujuk" name="inTanggalKunjugan" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                                        echo date("Y-m-d"); ?>">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">No. Rujukan<span class="text-danger">*</span></label>
                                        <div class="col-md-9 has-error">
                                            <input type="text" class="form-control filled-input" id="inNoRujuk">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Spesialis Dokter<span class="text-danger">*</span></label>
                                        <div class="col-md-9 has-error">
                                            <input type="text" class="form-control filled-input " placeholder="Masukkan min 3 karakter" id="inPoli" name="inTanggalKunjugan">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Dokter<span class="text-danger">*</span></label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inDokBPJS" name="inDPJP">

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">No. Surat Kontrol/SKDP<span class="text-danger">*</span></label>
                                        <div class="col-md-9 has-error" id="basic1">
                                            <input type="text" class="form-control filled-input typeahead1" id="inSKDP" name="inTanggalKunjugan">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAgama" id="inLaka">
                                                <option value="0">Tidak</option>
                                                <option value="1">Ya</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>LAKALANTAS</h6>
                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Tanggal Kejadian</label>
                                        <div class="col-md-9 has-error">
                                            <input type="date" class="form-control filled-input" placeholder="TANGGAL" id="inTglLaka" name="inTanggalKunjugan" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                                        echo date("Y-m-d"); ?>">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Keterangan</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control filled-input" placeholder="Keterangan Kecelakaan" name="inKetLaka" id="inKetLaka">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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
                                            <input type="text" class="form-control filled-input" placeholder="Keterangan Kecelakaan" name="inKetLaka" id="inNoSuplesi">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Provinsi Lakalantas</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAgama" id="inProvLaka">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Kabupaten Lakalantas</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAgama" id="inKabLaka">

                                            </select>
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
                            <span class="help-block"></span>

                            <br>
                            <div align="right">


                                <span class="help-block"></span>
                                <button class="btn btn-primary btn-anim  btn-sm" onclick="insertSEP()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-print"></i><span class="btn-text">CETAK SEP</span>
                            </div>
                            <!-- /Row -->

                        </div>
                    </div>




                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</div>
<!-- SEP -->
<script type="text/javascript">
    $(document).ready(function() {
        // var div = $('#modal_tambah_kunjungan').dialog({
        // 	modal: true
        // });
        $('#inPPKAsal').autocomplete({
            source: function(query, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>Vclaim_bpjs/cari_ppk",
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
        $('#inLaka').change(function() {
            var laka = $('#inLaka').val();
            if (laka == 1) {
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
        $('#inPoli').change(function() {
            c = $('#inPoli').val();
            splitDiagC = c.split("|");
            poli = splitDiagC[0];
            jnsPelayanan = $('#inJnsPelayanan').val();
            if (poli != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>Vclaim_bpjs/getDokter",
                    method: "POST",
                    data: {
                        poli: poli,
                        jnsPelayanan: jnsPelayanan
                    },
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html = '<option value="-">Pilih Dokter</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].kode + '>' + data[i].nama + '</option>';
                        }
                        $('#inDokBPJS').html(html);
                    }
                });
            } else {
                $('#inDokBPJS').html('<option value="-">Pilih Dokter</option>');
            }
        });
    });



    function insertSEP() {
        tgl_sep = $('#inTglSEP').val();
        no_kartu = $('#inNoBPJS').val();
        noTelp = $('#inNoHp1').val();
        jnsPelayanan = $('#inJnsPelayanan').val();
        noMr = $('#no_rm').val();
        tglRujukan = $('#inTglRujuk').val();
        noRujukan = $('#inNoRujuk').val();
        ppk = $('#inPPKAsal').val();
        splitPpk = ppk.split(' | ');
        ppkRujukan = splitPpk[0];
        catatan = $('#inKeterangan').val();
        diagnosa = $('#inDiagnosa').val();
        splitDiagnosa = diagnosa.split(' | ');
        diagAwal = splitDiagnosa[0];
        if (jnsPelayanan == 1) {
            poli = '-';
        } else {
            poli = $('#inPoli').val();
        }

        splitPoli = poli.split(' | ');
        poliTuj = splitPoli[0];
        cob = $('#inCOB').val();
        katarak = $('#inKatarak').val();
        lakaLantas = $('#inLaka').val();
        if (lakaLantas == 0) {
            tglKejadian = '-';
            penjamin = '-';
            kdPropinsi = '-';
            kdKabupaten = '-';
            kdKecamatan = '-';
        } else {
            tglKejadian = $('#inTglLaka').val();
            penjamin = '2';
            kdPropinsi = $('#inProvLaka').val();
            kdKabupaten = $('#inKabLaka').val();
            kdKecamatan = $('#inKecLaka').val();
        }
        keterangan = $('#inKetLaka').val();
        suplesi = $('#inSuplesi').val();
        if (suplesi == 0) {
            noSepSuplesi = 0;
        } else {
            noSepSuplesi = $('#inNoSuplesi').val();
        }

        noSurat = $('#inSKDP').val();
        kodeDPJP = $('#inDokBPJS').val();
        if (jnsPelayanan == 2) {
            klsRawat = '-';
        } else {
            kamar = $('#inTempatTidur').val();
            splitKamar = kamar.split(' | ');
            klsRawat = splitKamar[1];
        }
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
                catatan: catatan,
                diagAwal: diagAwal,
                poliTuj: poliTuj,
                cob: cob,
                katarak: katarak,
                lakaLantas: lakaLantas,
                tglKejadian: tglKejadian,
                keterangan: keterangan,
                suplesi: suplesi,
                noSepSuplesi: noSepSuplesi,
                kdPropinsi: kdPropinsi,
                kdKabupaten: kdKabupaten,
                kdKecamatan: kdKecamatan,
                noSurat: noSurat,
                kodeDPJP: kodeDPJP,
                klsRawat: klsRawat,
                noTelp: noTelp,
                penjamin: penjamin
            },
            dataType: 'json',
            success: function(response) {

            }
        });
    }
=======
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_tambah_kunjungan" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i>TAMBAH DATA KUNJUNGAN</h5>
                    </div>
                    <div class="modal-body">
                        <!-- <div class="col-md-12" style="text-align:right;">
							<div id="btn_edit" class="col-md-12"></div>
						</div> -->
                        <div class="clearfix"></div>
                        <div class="form-body mt-20">
                            <hr>
                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">TIPE
											MASUK</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inTipeMasuk" name="inTipeMasuk">
												<option value="-">-</option>
												<?php

												foreach ($tipe_masuk as $row) {

												?>
													<option value="<?php echo $row['id_tipe_masuk'] . "|" . $row['biaya_admin']; ?>">
														<?php echo $row['nama_tipe_masuk']; ?></option>
												<?php }  ?>
											</select>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">TANGGAL
											KUNJUNGAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control filled-input" placeholder="TANGGAL" id="inTanggalKunjugan" name="inTanggalKunjugan" value="<?php date_default_timezone_set('Asia/Jakarta');
																																												echo date("Y-m-d H:i:s"); ?>">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>
							<span class="help-block"></span>
							<!-- /Row -->

							<!-- /Row -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">ASAL
											PASIEN</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inAsalPasien" name="inAsalPasien">
												<?php

												foreach ($asal_pasien as $row) {

												?>
													<option value="<?php echo $row['id_asal_pasien']; ?>">
														<?php echo $row['nama']; ?></option>
												<?php }  ?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="help-block"></span>
										<label class="control-label col-md-3">NO SEP /
											SLIP</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control filled-input" placeholder="NO SEP" name="inNoSEP" id="inNoSEP">

										</div>
									</div>
								</div>
							</div>
							<span class="help-block"></span>
							<!-- /Row -->

							<!-- row -->
							<div class="row">
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<span class="help-block"></span>
										<label class="control-label col-md-3">DIAGNOSA</label>
										<div class="col-md-9 has-success" id="the-basics">

											<input class="typeahead form-control filled-input" type="text" placeholder="Diagnosa" id="inDiagnosa" name="inDiagnosa" style="width: 284.17px;">

										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">KETERANGAN
											PASIEN</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control filled-input" placeholder="KETERANGAN" name="inKeterangan" id="inKeterangan">

										</div>
									</div>
								</div>
							</div>
							<span class="help-block"></span>
							<div class="data_hide data_hide_2">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">POLI
												TUJUAN</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inJenisPoli" name="inJenisPoli">
												</select>
											</div>
										</div>
									</div>
									<!--/span-->
								</div>
								<span class="help-block"></span>
							</div>
							<!-- /Row -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">NAMA DOKTER
											(DPJP)</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inDPJP" name="inDPJP">

											</select>
											<span id="dpjp_error" class="text-danger"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6 collapse" id="cb_hide">
									<div class="form-group">
										<label class="control-label col-md-3">CARA
											BAYAR</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inCaraBayar" name="inCaraBayar">
												<option value="-">-</option>
												<?php
												foreach ($cara_bayar as $row) {

												?>
													<option value="<?php echo $row["id_cara_bayar"]; ?>">
														<?php echo  $row["nama"]; ?></option>
												<?php }  ?>
											</select>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>

							<div class="data_hide data_hide_3">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">KELAS</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inKelasRuangan" name="inKelasRuangan">
													<option value="-">-</option>
													<?php
													foreach ($kelas as $row) {

													?>
														<option value="<?php echo $row["kelas_ruangan"]; ?>">
															<?php echo $row["kelas_ruangan"]; ?>
														</option>
													<?php }  ?>
												</select>
											</div>
										</div>
									</div>

									<span class="help-block"></span>
									<!-- /Row -->

									<div class="col-md-6" id="outTempatTidur">
										<div class="form-group">
											<label class="control-label col-md-3">NO TEMPAT
												TIDUR</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inTempatTidur" id="inTempatTidur">
													<!-- 																									 <option value="-">-</option> -->
												</select>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<input type="hidden" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inBiayaAdm" name="inBiayaAdm">
							<input type="hidden" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inBiayaDok" name="inBiayaDok">
							<input type="hidden" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inBiayaRS" name="inBiayaRS">

							<div class="row mt-25">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">TOTAL BIAYA</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inTotal" name="inTotal">
										</div>
									</div>
								</div>
								<div class="data_hide data_hide_2">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">NO ANTRIAN</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inAntrian" disabled>
											</div>
											<div class="btn btn-success btn-icon-anim btn-circle" onclick="refresh()"><i class="icon-refresh"></i></div>
										</div>
									</div>
								</div>
							</div>

                            <br>

                            <!-- /Row -->
                            <div class="row" style="margin-left:120px;">
                                <div class="col-md-3">
                                    <!-- <span class="help-block"></span> -->
                                    <button class="btn btn-success btn-anim  btn-sm" onclick="Kunjungan()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="clearfix"></div>
                        <div class="form-body collapse" id="vclaim_sep">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>SEP</h6>
                            <hr>
                            <!-- <div align="center">
								<div class="btn-group">
									<button type="button" class="btn btn-success" id="ruj" style="width:390px;">Rujukan
									</button>
									<button type="button" class="btn btn-default" id="rum" style="width:390px;">Rujukan Manual
									</button>
								</div>
							</div> -->
                            <span class="help-block"></span>
                            <input type="hidden" class="form-control filled-input" id="inJnsPelayanan">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">TANGGAL SEP<span class="text-danger">*</span></label>
                                        <div class="col-md-9 has-error">
                                            <input type="date" class="form-control filled-input" placeholder="TANGGAL" id="inTglSEP" name="inTanggalKunjugan" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                                        echo date("Y-m-d"); ?>">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">PPK Asal Pasien<span class="text-danger">*</span></label>
                                        <div class="col-md-9 has-error" id="basic1">
                                            <input type="text" class="form-control filled-input typeahead1" placeholder="Masukkan min 3 karakter" id="inPPKAsal" name="inTanggalKunjugan">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">TANGGAL RUJUKAN<span class="text-danger">*</span></label>
                                        <div class="col-md-9 has-error">
                                            <input type="date" class="form-control filled-input" placeholder="TANGGAL" id="inTglRujuk" name="inTanggalKunjugan" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                                        echo date("Y-m-d"); ?>">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">No. Rujukan<span class="text-danger">*</span></label>
                                        <div class="col-md-9 has-error">
                                            <input type="text" class="form-control filled-input" id="inNoRujuk">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Spesialis Dokter<span class="text-danger">*</span></label>
                                        <div class="col-md-9 has-error">
                                            <input type="text" class="form-control filled-input " placeholder="Masukkan min 3 karakter" id="inPoli" name="inTanggalKunjugan">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Dokter<span class="text-danger">*</span></label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inDokBPJS" name="inDPJP">

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">No. Surat Kontrol/SKDP<span class="text-danger">*</span></label>
                                        <div class="col-md-9 has-error" id="basic1">
                                            <input type="text" class="form-control filled-input typeahead1" id="inSKDP" name="inTanggalKunjugan">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAgama" id="inLaka">
                                                <option value="0">Tidak</option>
                                                <option value="1">Ya</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>LAKALANTAS</h6>
                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Tanggal Kejadian</label>
                                        <div class="col-md-9 has-error">
                                            <input type="date" class="form-control filled-input" placeholder="TANGGAL" id="inTglLaka" name="inTanggalKunjugan" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                                        echo date("Y-m-d"); ?>">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Keterangan</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control filled-input" placeholder="Keterangan Kecelakaan" name="inKetLaka" id="inKetLaka">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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
                                            <input type="text" class="form-control filled-input" placeholder="Keterangan Kecelakaan" name="inKetLaka" id="inNoSuplesi">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Provinsi Lakalantas</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAgama" id="inProvLaka">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Kabupaten Lakalantas</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAgama" id="inKabLaka">

                                            </select>
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
                            <span class="help-block"></span>

                            <br>
                            <div align="right">


                                <span class="help-block"></span>
                                <button class="btn btn-primary btn-anim  btn-sm" onclick="insertSEP()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-print"></i><span class="btn-text">CETAK SEP</span>
                            </div>
                            <!-- /Row -->

                        </div>
                    </div>




                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</div>
<!-- SEP -->
<script type="text/javascript">
    $(document).ready(function() {
        // var div = $('#modal_tambah_kunjungan').dialog({
        // 	modal: true
        // });
        $('#inPPKAsal').autocomplete({
            source: function(query, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>Vclaim_bpjs/cari_ppk",
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
        $('#inLaka').change(function() {
            var laka = $('#inLaka').val();
            if (laka == 1) {
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
        $('#inPoli').change(function() {
            c = $('#inPoli').val();
            splitDiagC = c.split("|");
            poli = splitDiagC[0];
            jnsPelayanan = $('#inJnsPelayanan').val();
            if (poli != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>Vclaim_bpjs/getDokter",
                    method: "POST",
                    data: {
                        poli: poli,
                        jnsPelayanan: jnsPelayanan
                    },
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html = '<option value="-">Pilih Dokter</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].kode + '>' + data[i].nama + '</option>';
                        }
                        $('#inDokBPJS').html(html);
                    }
                });
            } else {
                $('#inDokBPJS').html('<option value="-">Pilih Dokter</option>');
            }
        });
    });



    function insertSEP() {
        tgl_sep = $('#inTglSEP').val();
        no_kartu = $('#inNoBPJS').val();
        noTelp = $('#inNoHp1').val();
        jnsPelayanan = $('#inJnsPelayanan').val();
        noMr = $('#no_rm').val();
        tglRujukan = $('#inTglRujuk').val();
        noRujukan = $('#inNoRujuk').val();
        ppk = $('#inPPKAsal').val();
        splitPpk = ppk.split(' | ');
        ppkRujukan = splitPpk[0];
        catatan = $('#inKeterangan').val();
        diagnosa = $('#inDiagnosa').val();
        splitDiagnosa = diagnosa.split(' | ');
        diagAwal = splitDiagnosa[0];
        if (jnsPelayanan == 1) {
            poli = '-';
        } else {
            poli = $('#inPoli').val();
        }

        splitPoli = poli.split(' | ');
        poliTuj = splitPoli[0];
        cob = $('#inCOB').val();
        katarak = $('#inKatarak').val();
        lakaLantas = $('#inLaka').val();
        if (lakaLantas == 0) {
            tglKejadian = '-';
            penjamin = '-';
            kdPropinsi = '-';
            kdKabupaten = '-';
            kdKecamatan = '-';
        } else {
            tglKejadian = $('#inTglLaka').val();
            penjamin = '2';
            kdPropinsi = $('#inProvLaka').val();
            kdKabupaten = $('#inKabLaka').val();
            kdKecamatan = $('#inKecLaka').val();
        }
        keterangan = $('#inKetLaka').val();
        suplesi = $('#inSuplesi').val();
        if (suplesi == 0) {
            noSepSuplesi = 0;
        } else {
            noSepSuplesi = $('#inNoSuplesi').val();
        }

        noSurat = $('#inSKDP').val();
        kodeDPJP = $('#inDokBPJS').val();
        if (jnsPelayanan == 2) {
            klsRawat = '-';
        } else {
            kamar = $('#inTempatTidur').val();
            splitKamar = kamar.split(' | ');
            klsRawat = splitKamar[1];
        }
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
                catatan: catatan,
                diagAwal: diagAwal,
                poliTuj: poliTuj,
                cob: cob,
                katarak: katarak,
                lakaLantas: lakaLantas,
                tglKejadian: tglKejadian,
                keterangan: keterangan,
                suplesi: suplesi,
                noSepSuplesi: noSepSuplesi,
                kdPropinsi: kdPropinsi,
                kdKabupaten: kdKabupaten,
                kdKecamatan: kdKecamatan,
                noSurat: noSurat,
                kodeDPJP: kodeDPJP,
                klsRawat: klsRawat,
                noTelp: noTelp,
                penjamin: penjamin
            },
            dataType: 'json',
            success: function(response) {

            }
        });
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>