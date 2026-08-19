<div class="panel panel-default card-view mt-20" id="identitas_pasien">

	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">IDENTITAS PASIEN</span></h6>
		</div>
		<a class="btn btn-warning btn-anim pull-right mr-30" data-toggle="modal" data-target="#edit_pasien"><i class="icon-rocket"></i><span class="btn-text">EDIT PASIEN</span></a>
		<br>
		<div class="clearfix"></div>
	</div>
	<div class="form-body">
		<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>IDENTITAS</h6>
		<hr>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">NO RM:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="no_rm" class="form-control filled-input" disabled="" id="no_rm" value="<?= $data['no_rm'] ?>">
						<span class="help-block"></span>

					</div>

				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">NAMA:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="inNamaPasien" class="form-control filled-input" disabled="" id="inNamaPasien" value="<?= $data['nama'] ?>">

						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<!--/span-->
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">UMUR:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="inUmur1" class="form-control filled-input" disabled="" id="inUmur1" value="<?php
																															$birthDate = $data['tgl_lahir'];
																															date_default_timezone_set('Asia/Jakarta');

																															$date = new DateTime($birthDate);
																															$now = new DateTime();
																															$interval = $now->diff($date);

																															echo  $interval->y . " Tahun, " . $interval->m . " Bulan"; ?>">

						<span class="help-block"></span>
					</div>

				</div>
			</div>
			<!--/span-->

		</div>
		<!-- row -->

		<!-- /Row -->
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">NO KTP:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="inKtp" class="form-control filled-input" disabled="" id="inKtp" value="<?= $data['no_ktp']; ?>">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<!--/span-->
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">TANGGAL LAHIR:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="inTglLahir1" class="form-control filled-input" disabled="" id="inTglLahir1" value="<?php
																																	setlocale(LC_ALL, 'id_ID');

																																	date_default_timezone_set('Asia/Jakarta');
																																	$time = strtotime($data['tgl_lahir']);

																																	$date = strftime(" %d %B %Y ", $time);

																																	echo $date ?>">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<!--/span-->
		</div>
		<!-- /Row -->
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">NAMA KEPALA KEL:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="inKepalaKeluarga" class="form-control filled-input" disabled="" id="inKepalaKeluarga" value="<?= $data['nama_kepala_keluarga']; ?>">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<!--/span-->
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">AGAMA:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="inAgama1" class="form-control filled-input" disabled="" id="inAgama1" value="<?= $data['agama']; ?>">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<!--/span-->
		</div>
		<!-- row -->
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">PENDIDIKAN:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="inPendidikan1" class="form-control filled-input" disabled="" id="inPendidikan1" value="<?= $data['pendidikan']; ?>">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<!--/span-->
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">STATUS:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="status" class="form-control filled-input" disabled="" id="status" value="<?= $data['status']; ?>">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<!--/span-->
		</div>
		<!-- row -->
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">TELEPON / HP:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="inNoHp1" class="form-control filled-input" disabled="" id="inNoHp1" value="<?= $data['no_hp']; ?>">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<!--/span-->
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">TELEPON / HP:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="inTelp1" class="form-control filled-input" disabled="" id="inTelp1" value="<?= $data['telp']; ?>">
						<span class="help-block"></span>
					</div>
				</div>
			</div>

			<!--/span-->
		</div>
		<!-- row -->
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">PEKERJAAN:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="inPekerjaan1" class="form-control filled-input" disabled="" id="inPekerjaan1" value="<?= $data['pekerjaan']; ?>">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">JENIS KELAMIN :</label>
					<div class="col-md-9 has-error">
						<input type="text" name="inJK" class="form-control filled-input" disabled="" id="inJK" value="<?= $data['jenis_kelamin']; ?>">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
		</div>
		<h6 class="txt-dark capitalize-font"><i class="icon-notebook mr-10"></i>ALAMAT</h6>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">ALAMAT:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="inAlamat1" class="form-control filled-input" disabled="" id="inAlamat1" value="<?= $data['alamat']; ?>">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">KELURAHAN:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="inKel1" class="form-control filled-input" disabled="" id="inKel1" value="<?= $data['kelurahan']; ?>">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">KOTA:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="inKota1" class="form-control filled-input" disabled="" id="inKota1" value="<?= $data['kota']; ?>">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<!--/span-->
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">PROVINSI:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="inProv1" class="form-control filled-input" disabled="" id="inProv1" value="<?= $data['provinsi']; ?>">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<!--/span-->
		</div>
		<div class="row">
			<!--/span-->
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">KECAMATAN:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="inKec1" class="form-control filled-input" disabled="" id="inKec1" value="<?= $data['kecamatan']; ?>">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<!--/span-->
		</div>
		<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>ASURANSI</h6>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">NO BPJS:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="inNoBPJS" class="form-control filled-input" disabled="" id="inNoBPJS" value="<?= $data['no_bpjs']; ?>">
						<span class="help-block"></span>

					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">NO KARTU ASURANSI LAIN:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="inNoBPJS" class="form-control filled-input" disabled="" id="inNoIdLain1" value="<?= $data['no_id_lain']; ?>">
						<span class="help-block"></span>

					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">PENANGGUNG JAWAB:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="inNamaIbu1" class="form-control filled-input" disabled="" id="inNamaIbu1" value="<?= $data['nama_ibu']; ?>">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<!--/span-->
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">STATUS TANGGUNGAN:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="inNamaAyah1" class="form-control filled-input" disabled="" id="inNamaAyah1" value="<?= $data['nama_ayah']; ?>">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<!--/span-->
		</div>
		<!-- /Row -->
		<div class="row">

			<!--/span-->
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">KUNJUNGAN:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="tgl_masuk" class="form-control filled-input" disabled="" id="inTglMasuk" value="<?php
																																	if (empty($tgl_masuk['tgl_masuk'])) {
																																		echo "-";
																																	} else {
																																		echo $tgl_masuk['tgl_masuk'];
																																	} ?>" />
					</div>
				</div>
			</div>
			<!--/span-->
		</div>
	</div>
	<span class="help-block"></span>
	<br>
	<div class="form-actions">
		<div class="row">
			<a class="btn btn-default btn-anim  btn-sm" id="back" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
			<a class="btn btn-danger btn-anim btn-sm" data-toggle="modal" onclick="riwayat()" style="margin-right: 20px;"><i class="icon-rocket"></i><span class="btn-text">RIWAYAT KUNJUNGAN</span></a>
			<!-- <button data-toggle="modal" data-target="#modal_tambah_kunjungan" aria-expanded="false" aria-controls="tambah_kunjungan" class="btn btn-success btn-anim btn-sm" style="margin-right: 20px;"><i class="icon-rocket"></i><span class="btn-text">+ KUNJUNGAN</span></button> -->
			<button onclick="tambah_kunjungan()" class="btn btn-success btn-anim btn-sm" style="margin-right: 20px;"><i class="icon-rocket"></i><span class="btn-text">+ KUNJUNGAN</span></button>
			<button data-toggle="modal" data-target="#modal_poli_sore" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">+ POLI SORE</span></button>
			<a class="btn btn-primary btn-anim btn-sm" id="gecon" href="<?= base_url('Erm_general_concern/identitas_pasien/') . $data['no_rm'] ?>"><i class="icon-rocket"></i><span class="btn-text">GENERAL CONSENT</span></a>
			<a class="btn btn-danger btn-anim btn-sm" id="gecon" href="<?= base_url('Erm_general_concern/identitas_pasien/') . $data['no_rm'] ?>"><i class="icon-rocket"></i><span class="btn-text">GENERAL BARU TESTING</span></a>
		</div>
	</div>
</div>


<!-- Modal Tambah Kunjungan -->
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
						<div class="col-md-12" style="text-align:right;">
							<div id="btn_edit" class="col-md-12"></div>
						</div>
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
																																												echo date("Y-m-d H:i:s"); ?>" disabled>
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
											<label class="control-label col-md-3">POLI TUJUAN</label>
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

							<!-- prioritas -->
							<div class="data_hide data_hide_4">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">POLI TUJUAN</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inJenisPoliPrioritas" name="inJenisPoliPrioritas">
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
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inDPJP" name="inDPJP" onchange="pilihCaraBayar()">

											</select>
											<span id="dpjp_error" class="text-danger"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6 collapse" id="cb_hide">
									<div class="form-group">
										<label class="control-label col-md-3">JENIS KLAIM</label><span id="cara_bayar_error" class="text-danger"></span>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inCaraBayar" name="inCaraBayar" onchange="pilihCaraBayar()">
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
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">STATUS
											</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" placeholder="Choose a Category" id="status_kamar" name="status">
													<option value="AKTIF">AKTIF</option>
													<option value="TITIP">TITIP</option>

												</select>
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

								<!-- <div class="data_hide data_hide_4">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">NO ANTRIAN</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inAntrianPrioritas" disabled>
											</div>
											<div class="btn btn-success btn-icon-anim btn-circle" onclick="refreshPrioritas()"><i class="icon-refresh"></i></div>
										</div>
									</div>
								</div> -->
							</div>

							<br>

							<!-- /Row -->
						</div>
					</div>
					<div class="modal-footer mb-5 mr-5 mt-10">
						<button class="btn btn-success btn-anim  btn-sm" onclick="insertData()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
					</div>


				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
	</div>
</div>
<!-- Modal Tambah Kunjungan sore -->
<div class="panel-wrapper collapse in">
	<div class="panel-body">
		<!-- sample modal content -->
		<div class="modal fade" id="modal_poli_sore" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i>TAMBAH DATA KUNJUNGAN</h5>
					</div>
					<div class="modal-body">
						<div class="col-md-12" style="text-align:right;">
							<div id="btn_edit" class="col-md-12"></div>
						</div>
						<div class="clearfix"></div>
						<div class="form-body mt-20">
							<h6 class="txt-dark capitalize-font "><i class="icon-user mr-10"></i>TAMBAH DATA KUNJUNGAN POLI SORE</h6>
							<hr>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">TIPE
											MASUK</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inTipeMasuk2" name="inTipeMasuk">
												<option class="active">-</option>
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
											<input type="text" class="form-control filled-input" placeholder="TANGGAL" id="inTanggalKunjugan2" name="inTanggalKunjugan" value="<?php date_default_timezone_set('Asia/Jakarta');
																																												echo date("Y-m-d H:i:s"); ?>" disabled>
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
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inAsalPasien2" name="inAsalPasien">

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
										<label class="control-label col-md-3">CARA
											BAYAR</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inCaraBayar2" name="inCaraBayar">
												<option>-</option>
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
							</div>
							<span class="help-block"></span>
							<!-- /Row -->

							<!-- row -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="help-block"></span>
										<label class="control-label col-md-3">NO SEP /
											SLIP</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control filled-input" placeholder="NO SEP" name="inNoSEP" id="inNoSEP2">

										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<span class="help-block"></span>
										<label class="control-label col-md-3">DIAGNOSA</label>
										<div class="col-md-9 has-success" id="the-basics">

											<input class="typeahead form-control filled-input" type="text" placeholder="Diagnosa" id="inDiagnosa2" name="inDiagnosa" style="width: 284.17px;">

										</div>
									</div>
								</div>
							</div>
							<span class="help-block"></span>
							<div class="data_poli poli_2">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">POLI TUJUAN</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inJenisPoli2" name="inJenisPoli">
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
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inDPJP2" name="inDPJP2">

											</select>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">

										<label class="control-label col-md-3">KETERANGAN
											PASIEN</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control filled-input" placeholder="KETERANGAN" name="inKeterangan" id="inKeterangan2">

										</div>
									</div>
								</div>
							</div>

							<div class="data_poli poli_3">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">KELAS</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inKelasRuangan2" name="inKelasRuangan2">
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
												<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inTempatTidur2" id="inTempatTidur2">
													<!-- 																									 <option value="-">-</option> -->
												</select>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<input type="hidden" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inBiayaAdm2" name="inBiayaAdm2">

							<input type="hidden" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inBiayaDok2" name="inBiayaDok">
							<input type="hidden" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inBiayaRS2" name="inBiayaRS">

							<div class="row mt-25">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">TOTAL BIAYA</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inTotal2" name="inTotal">
										</div>
									</div>
								</div>
								<div class="data_poli poli_2">
									<div class="col-md-6">
										<div class="form-group">
										</div>
									</div>
								</div>

								<br>
								<div align="right">

									<!--/span-->
									<span class="help-block"></span>
									<button class="btn btn-success btn-anim  btn-sm" onclick="insertPoliSore()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>

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
</div>
<!-- Modal riwayat Kunjungan -->
<div class="panel-wrapper collapse in">
	<div class="panel-body">
		<!-- sample modal content -->
		<div class="modal fade" id="modal_riwayat" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i>TAMBAH DATA KUNJUNGAN</h5>
					</div>
					<div class="modal-body">
						<div class="col-md-12" style="text-align:right;">
							<div id="btn_edit" class="col-md-12"></div>
						</div>
						<div class="clearfix"></div>
						<div class="form-body mt-20">
							<h6 class="txt-dark capitalize-font "><i class="icon-user mr-10"></i>RIWAYAT KUNJUNGAN</h6>
							<hr>

							<div class="row">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<form id="form-filter" class="form-horizontal">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group ">
														<label class="control-label col-md-3">NO RM</label>
														<div class="col-md-8 has-error">
															<input type="text" class="form-control" id="no_riwayat" disabled="" value="<?= $data['no_rm'] ?>">
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group ">
														<label class="control-label col-md-3">NAMA PASIEN</label>
														<div class="col-md-8 has-error">
															<input type="text" class="form-control" disabled="" id="inNamaPasienRiwayat" value="<?= $data['nama'] ?>">

														</div>
													</div>
												</div>
											</div>
											<label for="tanggal_keluar" class="col-sm-2 control-label">Jenis Pelayanan</label>
											<div class="col-md-2 has-success">
												<select class="form-control   select2" placeholder="Choose a Category" tabindex="1" name="jenis_pel" id="jenis_pel">
													<option>-</option>
													<option value="POLI">POLI</option>
													<option value="UGD">UGD</option>
													<option value="RANAP">RAWAT INAP</option>
												</select>
											</div>
											<div class="form-group">


												<div class="form-group">
													<label for="LastName" class="col-sm-6 control-label"></label>
													<label for="LastName" class="col-sm-6 control-label"></label>
													<label for="LastName" class="col-sm-6 control-label"></label>
													<label for="LastName" class="col-sm-6 control-label"></label>
													<label for="LastName" class="col-sm-6 control-label"></label>
													<label for="LastName" class="col-sm-6 control-label"></label>

													<div class="col-sm-6">
														<button type="button" id="btn-filter" class="btn btn-primary">Cari</button>
														<button type="button" id="btn-reset" class="btn btn-default">Reset</button>
													</div>
												</div>

										</form>
										<div class="table-wrap">
											<div class="table-responsive ">
												<table id="tb_riwayat" class="table table-hover display">
													<thead>
														<tr class="bg-success">
															<th>NO</th>
															<th>TANGGAL MASUK</th>
															<th>JAM</th>
															<th>TANGGAL KELUAR</th>
															<th>UNIT</th>
															<th>DOKTER</th>
															<th>TIPE</th>
															<th>JENIS KLAIM</th>
															<th>DIAGNOSA</th>
															<th>STATUS</th>
														</tr>
													</thead>
													<tfoot>
														<tr class="bg-success">
															<th>NO</th>
															<th>TANGGAL MASUK</th>
															<th>JAM</th>
															<th>TANGGAL KELUAR</th>
															<th>UNIT</th>
															<th>DOKTER</th>
															<th>TIPE</th>
															<th>JENIS KLAIM</th>
															<th>DIAGNOSA</th>
															<th>STATUS</th>
														</tr>
													</tfoot>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>

				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
	</div>
</div>




<!-- Eidt Pasien -->
<div class="panel-wrapper">
	<div class="panel-body">
		<!-- sample modal content -->
		<div class="modal fade bs-example-modal-lg" id="edit_pasien" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="overflow : auto !important;">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i>EDIT IDENTITAS PASIEN</h5>
					</div>
					<div class="modal-body">
						<div class="clearfix"></div>
						<div class="form-body">
							<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>IDENTITAS</h6>
							<hr>
							<div class="row">

								<div class="col-md-6">
									<div class="form-group">

										<label class="control-label col-md-3">NO
											RM</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control filled-input" placeholder="NO RM" name="inNoRm" id="upNoRm" value="<?= $data['no_rm'] ?>">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<!-- span -->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">NAMA
										</label>
										<div class="col-md-9 has-success">
											<input type="text" autocomplete="off" class="form-control filled-input" placeholder="NAMA" name="inNama" id="upNama" value="<?= $data['nama'] ?>">

											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<!-- span -->

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">NO
											KTP</label>
										<div class="col-md-9 has-success">
											<input type="text" autocomplete="off" class="form-control filled-input" placeholder="NO KTP" name="inNoKtp" id="upNoKtp" value="<?= $data['no_ktp'] ?>">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">JENIS
											KELAMIN</label>
										<div class="col-md-9 has-success">
											<div class="radio-list">
												<div class="radio-inline pl-0">
													<span class="radio radio-info">

														<input type="radio" value="LAKI-LAKI" name="upJk" id="upJkLk" <?php echo ($data['jenis_kelamin'] == 'LAKI-LAKI' ? ' checked' : ''); ?>>
														<label for="radio_9">LAKI-LAKI</label>
													</span>
												</div>
												<div class="radio-inline pl-0">
													<span class="radio radio-info">
														<input type="radio" value="PEREMPUAN" name="upJk" id="upJkPr" <?php echo ($data['jenis_kelamin'] == 'PEREMPUAN' ? ' checked' : ''); ?>>
														<label for="radio_9">PEREMPUAN</label>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


							<!-- /Row -->

							<!-- /Row -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">TANGGAL
											LAHIR</label>
										<div class="col-md-9 has-success">
											<input type="date" autocomplete="off" placeholder="TANGGAL LAHIR" id="upTglLahir" name="inTglLahir1" data-toggle="datepicker" class="form-control filled-input" value="<?php echo date('Y-m-d', strtotime($data['tgl_lahir'])); ?>">
										</div>
									</div>
								</div>

								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">NAMA
											KEPALA KELUARGA</label>
										<div class="col-md-9 has-success">
											<input type="text" autocomplete="off" class="form-control filled-input" placeholder="NAMA" name="inNamaKK" id="upNamaKK" value="<?= $data['nama_kepala_keluarga']; ?>">
											<span class="help-block"> </span>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!-- /Row -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">AGAMA</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAgama" id="upAgama">
												<option value="<?php echo $data['agama']; ?>"><?php echo $data['agama']; ?></option>
												<option value="ISLAM">ISLAM
												</option>
												<option value="KRISTEN">KRISTEN
												</option>
												<option value="KATOLIK">KATOLIK
												</option>
												<option value="HINDU">HINDU
												</option>
												<option value="BUDHA">BUDHA
												</option>
											</select>
											<span class="help-block"> </span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">PENDIDIKAN</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inPendidikan" id="upPendidikan">
												<?php
												foreach ($pendidikan as $row) {

												?>
													<option value="<?php echo $row["nama"] ?>" <?= $row["nama"] == $data["pendidikan"] ? 'selected' : ''; ?>>
														<?php echo $row["nama"]; ?>
													</option>
												<?php }  ?>

												<span class="help-block"> </span>
											</select>
										</div>
									</div>
								</div>
							</div>
							<!-- /Row -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">STATUS</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" name="inStatus" id="upStatus">
												<option value="<?php echo $data['status']; ?>"><?php echo $data['status']; ?></option>
												<option value="MENIKAH">MENIKAH
												</option>
												<option value="BELUM MENIKAH">BELUM
													MENIKAH</option>
											</select>
											<span class="help-block"> </span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">PEKERJAAN</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inPekerjaan" id="upPekerjaan">
												<?php
												foreach ($pekerjaan as $row) {

												?>
													<option value="<?php echo $row["nama"]; ?>" <?= $row["nama"] == $data["pekerjaan"] ? 'selected' : ''; ?>>
														<?php echo $row["nama"]; ?>
													</option>
												<?php }  ?>

												<span class="help-block"> </span>
											</select>
										</div>
									</div>
								</div>
							</div>
							<!-- /Row -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">NO HP
										</label>
										<div class="col-md-9 has-success">
											<input type="text" autocomplete="off" class="form-control filled-input" placeholder="NO HP" name="inTelp" id="upNoHp" value="<?= $data['no_hp']; ?>">
											<span class="help-block"> </span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">NO
											HP 2</label>
										<div class="col-md-9 has-success">
											<input type="text" autocomplete="off" class="form-control filled-input" placeholder="NO TLP" name="inNoHp" id="upTelp" value="<?= $data['telp']; ?>">
											<span class="help-block"> </span>
										</div>
									</div>
								</div>
							</div>
							<!-- /Row -->

						</div>

						<!-- /formbody -->
						<div class="form-body">
							<h6 class="txt-dark capitalize-font"><i class="icon-notebook mr-10"></i>ALAMAT</h6>
							<hr>
							<!-- /Row -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">PROVINSI</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inProv" id="upProv">
												<?php
												foreach ($prov as $row) {

												?>
													<option value="<?php echo $row["nm_prov"]; ?>" <?= $row["nm_prov"] == $data["provinsi"] ? 'selected' : ''; ?>>
														<?php echo $row["nm_prov"]; ?>
													</option>
												<?php }  ?>

												<span class="help-block"> </span>
											</select>
										</div>
									</div>
								</div>

								<!--/span-->
								<div class="col-md-6" id="outKota">
									<div class="form-group">
										<label class="control-label col-md-3">KOTA</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="upKota" name="upKota">
												<option value="<?php echo $data["kota"]; ?>" <?= $data["kota"] == $data["kota"] ? 'selected' : ''; ?>>
													<?php echo $data["kota"]; ?>
												</option>
												<span class="help-block"> </span>
											</select>
											<span class="help-block"> </span>
										</div>
									</div>
								</div>

								<!-- /Row -->
							</div>
							<!-- /Row -->
							<div class="row">
								<div class="col-md-6" id="outKec">
									<div class="form-group">
										<label class="control-label col-md-3">KECAMATAN</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="upKec" name="upKec">
												<option value="<?php echo $data["kecamatan"]; ?>" <?= $data["kecamatan"] == $data["kecamatan"] ? 'selected' : ''; ?>>
													<?php echo $data["kecamatan"]; ?>
												</option>
												<span class="help-block"> </span>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6" id="outKel">
									<div class="form-group">
										<label class="control-label col-md-3">KELURAHAN</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="upKel" name="upKel">

												<option value="<?php echo $data["kelurahan"]; ?>" <?= $data["kelurahan"] == $data["kelurahan"] ? 'selected' : ''; ?>>
													<?php echo $data["kelurahan"]; ?>
												</option>
												<span class="help-block"> </span>
											</select>
										</div>
									</div>
								</div>
								<!--/span-->

							</div>
							<!-- /Row -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">ALAMAT</label>
										<div class="col-md-9 has-success">
											<input type="text" autocomplete="off" class="form-control filled-input" name="inAlamat" id="upAlamat" value="<?= $data['alamat']; ?>">

											<span class="help-block"> </span>
										</div>
									</div>
								</div>
								<!--/span-->

							</div>
							<!-- /Row -->
						</div>
						<div class="form-body">
							<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>ASURANSI</h6>
							<hr>
							<!--/row-->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">NO
											BPJS /
											KIS</label>
										<div class="col-md-9 has-success">
											<input type="text" autocomplete="off" class="form-control filled-input" placeholder="NO BPJS / KIS" name="inNoBpjs" id="upNoBpjs" value="<?= $data['no_bpjs']; ?>">
											<span class="help-block"> </span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">NO KARTU</label>
										<div class="col-md-9 has-success">
											<input type="text" autocomplete="off" class="form-control filled-input" placeholder="NO KARTU" name="inNoIdLain" id="upNoIdLain" value="<?= $data['no_id_lain']; ?>">
											<span class="help-block"> </span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">PENANGGUNG JAWAB</label>
										<div class="col-md-9 has-success">
											<input type="text" autocomplete="off" class="form-control filled-input" placeholder="PENANGGUNG JAWAB" name="inNamaIbu" id="upNamaIbu" value="<?= $data['nama_ibu']; ?>">
											<span class="help-block"> </span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">STATUS TANGGUNGAN</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="upNamaAyah" id="upNamaAyah">

												<option value="-">-</option>
												<option value="Suami">Suami</option>
												<option value="Istri">Istri</option>
												<option value="Anak">Anak</option>
												<option value="Karyawan">Karyawan</option>

											</select>
											<span class="help-block"> </span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer mb-5 mr-5 mt-10">
						<button type="submit" class="btn btn-success btn-anim  pull-right mr-30" onclick="update_pasien()" style="margin-right: 40px;"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- <?php $this->load->view('assets/signature2') ?> -->
<style>
	td {
		color: black;
	}
</style>
<style>
	#sig canvas {
		width: 100% !important;
		height: 100%;
	}

	canvas {
		cursor: crosshair;
		border: 1px solid #000000;
	}
</style>
<!-- JQuiery UI -->
<!-- <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> -->
<!-- <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/dist/css/jquery.signature.css"> -->
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.signature.min.js"></script> -->
<!-- [if lte IE 8]> -->
<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/excanvas.js"></script> -->
<script type="text/javascript">
	$(document).ready(function() {
		$("#kondisi_umum6").click(function() {
			if ($(this).is(":checked")) {
				$("#ghubungan").show();
			} else {
				$("#ghubungan").hide();
			}
		});

	});
</script>
<script>
	document.getElementById("back").onclick = function() {
		window.location.href = "<?php echo base_url('Pencarian_pasien') ?>";
	};

	function pilihCaraBayar() {
		var cara_bayar = $('#inCaraBayar').val();
		sp = $('#inTipeMasuk').val();
		splitDiagB = sp.split("|");
		var tipe_masuk = splitDiagB[0];
		no_rm = $('#no_rm').val();

		var a = $("#inDPJP").val();
		splitDiag = a.split("|");
		nama_poli = $('#inJenisPoli').val();
		nama = $('#inJenisPoliPrioritas').val();
		var poli = (tipe_masuk === 4) ? nama : nama_poli;
		$.ajax({
			url: "<?php echo base_url(); ?>Pencarian_pasien/getBiaya",
			method: "POST",
			data: {
				id_pasien: no_rm,
				cara_bayar: cara_bayar,
				dpjp: splitDiag[0],
				jenis_pelayanan: tipe_masuk,
				poli: poli,
			},
			dataType: 'json',
			success: function(data) {

				$("#inBiayaRS").val(data.biaya_rs);
				$('#inBiayaDok').val(data.biaya_jasa);
				$('#inBiayaAdm').val(data.biaya_admin);

				var total = Number(data.biaya_rs) + Number(data.biaya_jasa) + Number(data.biaya_admin);
				$("#inTotal").val(total);

			}
		});
	}

	function insertData() {
		no_rm = $('#no_rm').val();
		b = $('#inTipeMasuk').val();
		splitDiagB = b.split("|");
		jenis_pelayanan = splitDiagB[0];
		tgl_masuk = $('#inTanggalKunjugan').val();
		asal_pasien = $('#inAsalPasien').val();
		cara_bayar = $('#inCaraBayar').val();
		no_sep = $('#inNoSEP').val();
		diagnosa = $('#inDiagnosa').val();
		keterangan = $('#inKeterangan').val();

		a = $("#inDPJP").val();
		splitDiag = a.split("|");
		dpjp = splitDiag[0];
		nama_poli = $('#inJenisPoli').val();
		nama = $('#inJenisPoliPrioritas').val();
		kelas = $('#inKelasRuangan').val();
		tempat_tidur = $('#inTempatTidur').val();
		biaya_jasa = $('#inBiayaDok').val();
		biaya_rs = $('#inBiayaRS').val();
		biaya_admin = $('#inBiayaAdm').val();
		antrian = $('#inAntrian').val();
		status = $('#status_kamar').val();
		total = Number(biaya_jasa) + Number(biaya_rs) + Number(biaya_admin);

		jenis_klaim = $('#inCaraBayar option:selected').text();
		// console.log(jenis_klaim);

		if (dpjp == '-' || dpjp == null || dpjp == '') {
			swal({
				title: "Gagal!",
				text: "DPJP dipilih terlebih dahulu",
				type: "warning",
				confirmButtonColor: "#3cb878",
			});
		}
		else if (jenis_klaim.includes("TIMAH") && ($('#inNamaIbu1').val() === '' || $('#inNamaAyah1').val() === '' || $('#inNoIdLain1').val() === '')) {
			var text = ($('#inNamaIbu1').val() === '')?"Penanggung Jawabnya Tidak Boleh Kosong":(($('#inNamaAyah1').val() === '')?"Status Tanggungan Belum Dipilih":"No Kartu Asuransi Lain Tidak Boleh Kosong");
			swal({
				title: "Gagal!",
				text: text,
				type: "warning",
				confirmButtonColor: "#3cb878",
			});
		}
		else {
			swal({
				title: "Apakah kamu yakin?",
				text: "Menambahkan Pasien ini",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3cb878",
				confirmButtonText: "Yakin",
				cancelButtonText: "Batal",
				showLoaderOnConfirm: true,
				closeOnConfirm: false
			}, function(isConfirm) {
				if (isConfirm) {
					$.ajax({
						url: "<?php echo base_url() ?>Pencarian_pasien/tambah_kunjungan",
						method: "POST",
						dataType: 'json',
						data: {
							id_pasien: no_rm,
							jenis_pelayanan: jenis_pelayanan,
							tgl_masuk: tgl_masuk,
							asal_pasien: asal_pasien,
							cara_bayar: cara_bayar,
							no_sep: no_sep,
							diagnosa: diagnosa,
							keterangan: keterangan,
							dpjp: dpjp,
							nama_poli: nama_poli,
							nama: nama,
							kelas: kelas,
							tempat_tidur: tempat_tidur,
							// biaya_jasa: biaya_jasa,
							// biaya_rs: biaya_rs,
							// biaya_admin: biaya_admin,
							antrian: antrian,
							status: status
						},
						success: function(data) {
							if (data.status == "success") {
								// total_semua = Number(biaya_jasa) + Number(data.biaya_rs) + Number(biaya_admin);
								if (jenis_pelayanan == '2') {
									swal({
										title: "SELAMAT!",
										type: "success",
										text: "Silahkan Menuju Kasir",
										confirmButtonColor: "#3cb878",
										confirmButtonText: "OK",
									}, function() {
										$().ready(function() {
											window.location.href = '<?php echo base_url() ?>Pencarian_pasien/cetak_antrian/' + antrian + '/' + nama_poli + '/' + total;
										});
									});
								} else if (jenis_pelayanan == '1') {
									swal({
										title: "SELAMAT!",
										type: "success",
										text: "Silahkan Menuju Kasir",
										confirmButtonColor: "#3cb878",
										confirmButtonText: "OK",
									}, function() {
										$().ready(function() {
											window.location.href = '<?php echo base_url() ?>Pencarian_pasien/cetak_antrian_ugd/' + no_rm + '/' + cara_bayar + '/' + data.id_pelayanan;
										});
									});
								} else {
									swal({
										title: "good job!",
										type: "success",
										text: "",
										confirmButtonColor: "#3cb878",
									});
								}
								$("#modal_tambah_kunjungan").modal('hide');
								$("#identitas_pasien").load(location.href + " #identitas_pasien");
								$('#inNoSEP').val("");
								$('#inDiagnosa').val("");
								$('#inKeterangan').val("");
								$('#inDPJP').val('-').change();
								$('#inAsalPasien').val('69JW60').change();
								$('#inCaraBayar').val('-').change();
								$('#inJenisPoli').val('-').change();
								$('#inJenisPoliPrioritas').val('-').change();
								$('#inKelasRuangan').val('-').change();
								$('#inTempatTidur').val('-').change();
								$('#inBiayaDok').val("");
								$('#inBiayaRS').val("");
								$('#inBiayaAdm').val("");
								$('#inAntrian').val("");
								$('#inTipeMasuk').val('-').change();
								$('#inTotal').val("");



							} else if (data.status == "error") {
								swal({
									title: "Gagal!",
									text: "Nomor Antrian Telah dipakai, silahkan tekan tombol refresh",
									type: "warning",
									confirmButtonColor: "#3cb878",
								});
							} else if (data.status == 'failed') {
								if (data.error.dpjp != '') {
									$('#dpjp_error').html(data.error.dpjp);
								} else {
									$('#dpjp_error').html('');
								}
								if (data.error.cara_bayar != '') {
									$('#cara_bayar_error').html(data.error.cara_bayar);
								} else {
									$('#cara_bayar_error').html('');
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
			});
		}
	}


	// //test


	// function insertDataPrioritas() {
	// 	no_rm = $('#no_rm').val();
	// 	b = $('#inTipeMasuk').val();
	// 	splitDiagB = b.split("|");
	// 	jenis_pelayanan = splitDiagB[0];
	// 	tgl_masuk = $('#inTanggalKunjugan').val();
	// 	asal_pasien = $('#inAsalPasien').val();
	// 	cara_bayar = $('#inCaraBayar').val();
	// 	no_sep = $('#inNoSEP').val();
	// 	diagnosa = $('#inDiagnosa').val();
	// 	keterangan = $('#inKeterangan').val();

	// 	a = $("#inDPJP").val();
	// 	splitDiag = a.split("|");
	// 	dpjp = splitDiag[0];
	// 	nama_poli = $('#inJenisPoliPrioritas').val();
	// 	kelas = $('#inKelasRuangan').val();
	// 	tempat_tidur = $('#inTempatTidur').val();
	// 	biaya_jasa = $('#inBiayaDok').val();
	// 	biaya_rs = $('#inBiayaRS').val();
	// 	biaya_admin = $('#inBiayaAdm').val();
	// 	antrian = $('#inAntrian').val();
	// 	total = Number(biaya_jasa) + Number(biaya_rs) + Number(biaya_admin);
	// 	if (dpjp == '-' || dpjp == null || dpjp == '') {
	// 		swal({
	// 			title: "Gagal!",
	// 			text: "DPJP dipilih terlebih dahulu",
	// 			type: "warning",
	// 			confirmButtonColor: "#3cb878",
	// 		});
	// 	}
	// 	$.ajax({
	// 		url: "<?php echo base_url() ?>Pencarian_pasien/tambah_kunjungan",
	// 		method: "POST",
	// 		dataType: 'json',
	// 		data: {
	// 			id_pasien: no_rm,
	// 			jenis_pelayanan: jenis_pelayanan,
	// 			tgl_masuk: tgl_masuk,
	// 			asal_pasien: asal_pasien,
	// 			cara_bayar: cara_bayar,
	// 			no_sep: no_sep,
	// 			diagnosa: diagnosa,
	// 			keterangan: keterangan,
	// 			dpjp: dpjp,
	// 			nama_poli: nama_poli,
	// 			kelas: kelas,
	// 			tempat_tidur: tempat_tidur,
	// 			biaya_jasa: biaya_jasa,
	// 			biaya_rs: biaya_rs,
	// 			biaya_admin: biaya_admin,
	// 			antrian: antrian,
	// 		},
	// 		success: function(data) {
	// 			if (data.status == "success") {
	// 				if (jenis_pelayanan == '2') {
	// 					swal({
	// 						title: "SELAMAT!",
	// 						type: "success",
	// 						text: "Silahkan Menuju Rekam Medis",
	// 						confirmButtonColor: "#3cb878",
	// 						confirmButtonText: "OK",
	// 					}, function() {
	// 						$().ready(function() {
	// 							window.location.href = '<?php echo base_url() ?>Pencarian_pasien/cetak_antrian/' + antrian + '/' + nama_poli + '/' + total;
	// 						});
	// 					});
	// 				} else {
	// 					swal({
	// 						title: "good job!",
	// 						type: "success",
	// 						text: "Silahkan Menuju Rekam Medis",
	// 						confirmButtonColor: "#3cb878",
	// 					});
	// 				}
	// 				$("#modal_tambah_kunjungan").modal('hide');
	// 				$("#identitas_pasien").load(location.href + " #identitas_pasien");
	// 				$('#inNoSEP').val("");
	// 				$('#inDiagnosa').val("");
	// 				$('#inKeterangan').val("");
	// 				$('#inDPJP').val('-').change();
	// 				$('#inAsalPasien').val('-').change();
	// 				$('#inCaraBayar').val('-').change();
	// 				$('#inJenisPoliPrioritas').val('-').change();
	// 				$('#inKelasRuangan').val('-').change();
	// 				$('#inTempatTidur').val('-').change();
	// 				$('#inBiayaDok').val("");
	// 				$('#inBiayaRS').val("");
	// 				$('#inBiayaAdm').val("");
	// 				$('#inAntrian').val("");
	// 				$('#inTipeMasuk').val('-').change();
	// 				$('#inTotal').val("");



	// 			} else if (data.status == "error") {
	// 				swal({
	// 					title: "Gagal!",
	// 					text: "Nomor Antrian Telah dipakai, silahkan tekan tombol refresh",
	// 					type: "warning",
	// 					confirmButtonColor: "#3cb878",
	// 				});
	// 			} else if (data.status == 'failed') {
	// 				if (data.error.dpjp != '') {
	// 					$('#dpjp_error').html(data.error.dpjp);
	// 				} else {
	// 					$('#dpjp_error').html('');
	// 				}
	// 			} else {
	// 				swal({
	// 					title: "Gagal!",
	// 					type: "warning",
	// 					text: data.status,
	// 					confirmButtonColor: "#3cb878",
	// 				});
	// 			}
	// 		}

	// 	});
	// 	return false;
	// }






	function insertPoliSore() {
		no_rm = $('#no_rm').val();
		b = $('#inTipeMasuk2').val();
		splitDiagB = b.split("|");
		jenis_pelayanan = splitDiagB[0];
		tgl_masuk = $('#inTanggalKunjugan2').val();
		asal_pasien = $('#inAsalPasien2').val();
		cara_bayar = $('#inCaraBayar2').val();
		no_sep = $('#inNoSEP2').val();
		diagnosa = $('#inDiagnosa2').val();
		keterangan = $('#inKeterangan2').val();
		a = $("#inDPJP2").val();
		splitDiag = a.split("|");
		dpjp = splitDiag[0];
		nama_poli = $('#inJenisPoli2').val();
		kelas = $('#inKelasRuangan2').val();
		tempat_tidur = $('#inTempatTidur2').val();
		biaya_jasa = $('#inBiayaDok2').val();
		biaya_rs = $('#inBiayaRS2').val();
		biaya_admin = $('#inBiayaAdm2').val();
		antrian = $('#inAntrian2').val();
		total = Number(biaya_jasa) + Number(biaya_rs) + Number(biaya_admin);
		$.ajax({
			url: "<?php echo base_url() ?>Pencarian_pasien/tambah_kunjungan_sore",
			method: "POST",
			dataType: 'json',
			data: {
				id_pasien: no_rm,
				jenis_pelayanan: jenis_pelayanan,
				tgl_masuk: tgl_masuk,
				asal_pasien: asal_pasien,
				cara_bayar: cara_bayar,
				no_sep: no_sep,
				diagnosa: diagnosa,
				keterangan: keterangan,
				dpjp: dpjp,
				nama_poli: nama_poli,
				kelas: kelas,
				tempat_tidur: tempat_tidur,
				biaya_jasa: biaya_jasa,
				biaya_rs: biaya_rs,
				biaya_admin: biaya_admin,
				antrian: antrian,
			},
			success: function(data) {
				if (data.status == "success") {
					total_semua = Number(biaya_jasa) + Number(data.biaya_rs) + Number(biaya_admin);
					if (jenis_pelayanan == '2') {
						swal({
							title: "SELAMAT!",
							type: "success",
							text: "Silahkan Menuju Rekam Medis",
							confirmButtonColor: "#3cb878",
							confirmButtonText: "OK",
						}, function() {
							$().ready(function() {
								window.location.href = '<?php echo base_url() ?>Pencarian_pasien/cetak_antrian/' + antrian + '/' + nama_poli + '/' + total_semua;
							});
						});
					} else {
						swal({
							title: "good job!",
							type: "success",
							text: "Silahkan Menuju Rekam Medis",
							confirmButtonColor: "#3cb878",
						});
					}

					$('#inNoSEP2').val("");
					$('#inDiagnosa2').val("");
					$('#inKeterangan2').val("");
					$('#inDPJP2').val("");
					$('#inTanggalKunjugan2').val("");
					//$('#inAsalPasien2').val("");
					$('#inCaraBayar2').val("");
					$('#inJenisPoli2').val("");
					$('#inKelasRuangan2').val("");
					$('#inTempatTidur2').val("");
					$('#inBiayaDok2').val("");
					$('#inBiayaRS2').val("");
					$('#inBiayaAdm2').val("");
					$('#inAntrian2').val("");
					$('#inTipeMasuk2').val("");
					$('#inTotal2').val("");

					$("#modal_poli_sore").modal('hide');
					$("#identitas_pasien").load(location.href + " #identitas_pasien");

				} else if (data.status == "error") {
					swal({
						title: "Gagal!",
						text: "Nomor Antrian Telah dipakai, silahkan tekan tombol refresh",
						type: "warning",
						confirmButtonColor: "#3cb878",
					});
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

	function riwayat() {
		$().ready(function() {
			reload_riwayat();
			$("#modal_riwayat").modal('show');
		});
	}

	function reload_riwayat() {
		// var table;
		$('#tb_riwayat').dataTable().fnClearTable();
		$('#tb_riwayat').dataTable().fnDestroy();
		var table = $('#tb_riwayat').DataTable({
			"language": {
				"sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
				"sProcessing": "Sedang memproses...",
				"sLengthMenu": "Tampilkan _MENU_ entri",
				"sZeroRecords": "Tidak ditemukan data yang sesuai",
				"sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
				"sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
				"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
				"sInfoPostFix": "",
				"sSearch": "Pencarian : ",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext": "Selanjutnya",
					"sLast": "Terakhir"
				},

			},
			"ajax": {
				"url": '<?php echo base_url('Pencarian_pasien/tampil_riwayat_kunjungan'); ?>',
				"type": 'POST',
				"data": function(data) {
					data.no_rm = $('#no_riwayat').val();
					data.jenis_pelayanan = $('#jenis_pel').val();

				}
			},
			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],

		});
		$('#btn-filter').click(function() { //button filter event click
			table.ajax.reload(); //just reload table
		});
		$('#btn-reset').click(function() { //button reset event click
			$('#form-filter')[0].reset();
			table.ajax.reload(); //just reload table
		});
	}

	function update_pasien() {
		nama = $('#upNama').val();
		no_ktp = $('#upNoKtp').val();
		jk = $('input#upJkLk:checked').val() ? 'LAKI-LAKI' : 'PEREMPUAN';
		// jk = $('#inJkLk').val();
		nama_ibu = $('#upNamaIbu').val();
		nama_ayah = $('#upNamaAyah').val();
		tgl_lahir = $('#upTglLahir').val();
		namaKK = $('#upNamaKK').val();
		agama = $('#upAgama').val();
		pendidikan = $('#upPendidikan').val();
		status = $('#upStatus').val();
		pekerjaan = $('#upPekerjaan').val();
		no_hp = $('#upNoHp').val();
		telp = $('#upTelp').val();
		umur = $('#upUmur').val();
		prov = $('#upProv').val();
		kota = $('#upKota').val();
		kec = $('#upKec').val();
		kel = $('#upKel').val();
		alamat = $('#upAlamat').val();
		no_bpjs = $('#upNoBpjs').val();
		no_id_lain = $('#upNoIdLain').val();
		no_rm = $('#upNoRm').val();


		$.ajax({
			url: "<?= base_url() . 'Pencarian_pasien/edit_pasien' ?>",
			data: {
				nama: nama,
				no_ktp: no_ktp,
				jk: jk,
				nama_ibu: nama_ibu,
				nama_ayah: nama_ayah,
				tgl_lahir: tgl_lahir,
				namaKK: namaKK,
				agama: agama,
				pendidikan: pendidikan,
				status: status,
				pekerjaan: pekerjaan,
				no_hp: no_hp,
				telp: telp,
				umur: umur,
				prov: prov,
				kota: kota,
				kec: kec,
				kel: kel,
				alamat: alamat,
				no_bpjs: no_bpjs,
				no_id_lain: no_id_lain,
				no_rm: no_rm,
			},
			method: 'POST',
			dataType: 'json',
			success: function(data) {

				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Data Berhasil diubah",
						confirmButtonColor: "#3cb878",
					});

					$("#edit_pasien").modal('hide');
					$("#identitas_pasien").load(location.href + " #identitas_pasien");

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

	}

	function tampilUmur(elem) {
		a = new Date(elem.value);
		var diff_ms = Date.now() - a.getTime();
		var age_dt = new Date(diff_ms);
		document.getElementById("inUmur").value = Math.abs(age_dt.getUTCFullYear() - 1970) + " Tahun";
	}

	function cekAntrian(poli) {
		$.ajax({
			url: "<?php echo base_url(); ?>Pencarian_pasien/getAntrian",
			method: "POST",
			data: {
				poli: poli
			},
			dataType: 'json',
			success: function(data) {
				$("#inAntrian").val(data);
			}
		});
	}

	// function cekAntrianPrioritas(poli) {
	// 	$.ajax({
	// 		url: "<?php echo base_url(); ?>Pencarian_pasien/getAntrianPrioritas",
	// 		method: "POST",
	// 		data: {
	// 			poli: poli
	// 		},
	// 		dataType: 'json',
	// 		success: function(data) {
	// 			$("#inAntrianPrioritas").val(data);
	// 		}
	// 	});
	// }

	function cekAntrian2(poli) {
		$.ajax({
			url: "<?php echo base_url(); ?>Pencarian_pasien/getAntrian",
			method: "POST",
			data: {
				poli: poli
			},
			dataType: 'json',
			success: function(data) {
				$("#inAntrian2").val(data);
			}
		});
	}

	// function cekAntrian1(poli) {
	// 	$.ajax({
	// 		url: "<?php echo base_url(); ?>Pencarian_pasien/getAntrian",
	// 		method: "POST",
	// 		data: {
	// 			poli: poli
	// 		},
	// 		dataType: 'json',
	// 		success: function(data) {
	// 			$("#inAntrian1").val(data);
	// 		}
	// 	});
	// }

	function refresh() {
		poli = $('#inJenisPoli').val();

		$.ajax({
			url: "<?php echo base_url(); ?>Pencarian_pasien/getAntrian",
			method: "POST",
			data: {
				poli: poli
			},
			dataType: 'json',
			success: function(data) {
				$("#inAntrian").val(data);
			}
		});
	}

	function refreshPrioritas() {
		poli = $('#inJenisPoli').val();

		$.ajax({
			url: "<?php echo base_url(); ?>Pencarian_pasien/getAntrianPrioritas",
			method: "POST",
			data: {
				poli: poli
			},
			dataType: 'json',
			success: function(data) {
				$("#inAntrianPrioritas").val(data);
			}
		});
	}

	$(document).ready(function() {
		$('#upProv').change(function() {
			var prov = $('#upProv').val();
			if (prov != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getKota",
					method: "POST",
					data: {
						prov: prov
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option value="">Pilih Kota</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value="' + data[i].nm_kab + '">' + data[i].nm_kab + '</option>';
						}
						$('#upKota').html(html);
						$('#upKec').html('<option value="">Pilih Kecamatan</option>');
						$('#upKel').html('<option value="">Pilih Kelurahan</option>');

					}
				});
			} else {
				$('#upKota').html('<option value="">Pilih Kota</option>');
				$('#upKec').html('<option value="">Pilih Kecamatan</option>');
				$('#upKel').html('<option value="">Pilih Kelurahan</option>');
			}
		});

		$('#upKota').change(function() {
			var kota = $('#upKota').val();
			if (kota != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getKec",
					method: "POST",
					data: {
						kota: kota
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option value="">Pilih Kecamatan</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].nm_kec + '>' + data[i].nm_kec + '</option>';
						}
						$('#upKec').html(html);
						$('#upKel').html('<option value="">Pilih Kelurahan</option>');
					}
				});
			} else {
				$('#upKec').html('<option value="">Pilih Kecamatan</option>');
				$('#upKel').html('<option value="">Pilih Kelurahan</option>');
			}
		});
		$('#upKec').change(function() {
			var kec = $('#upKec').val();
			if (kec != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getKel",
					method: "POST",
					data: {
						kec: kec
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option value="">Pilih Kelurahan</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].nm_desa + '>' + data[i].nm_desa + '</option>';
						}
						$('#upKel').html(html);
					}
				});
			} else {
				$('#upKel').html('<option value="">Pilih Kelurahan</option>');
			}
		});

		$('#inTipeMasuk').change(function() {
			b = $('#inTipeMasuk').val();
			splitDiagB = b.split("|");
			var tipe_masuk = splitDiagB[0];
			var cara_bayar = $('#inCaraBayar').val();
			var poli = $('#inJenisPoli').val();
			// var poli = $('#inJenisPoliPrioritas').val();
			$('#inBiayaAdm').val(splitDiagB[1]);
			if (tipe_masuk == '1') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						tipe_masuk: tipe_masuk
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + data[i].jasmed_timah_pagi + '|' + data[i].rs_timah_pagi + '|' + data[i].rs_bpjs + '|' + '>' + data[i].nama + '(' + data[i].jam_mulai + '-' + data[i].jam_selesai + ') </option>';
						}
						$('#inDPJP').html(html);


					}
				});
			} else if (tipe_masuk == '5') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						tipe_masuk: tipe_masuk
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|0|0|0|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|0|' + data[i].rs_timah_pagi + '|' + data[i].rs_bpjs + '|' + '>' + data[i].nama + '(' + data[i].jam_mulai + '-' + data[i].jam_selesai + ') </option>';
						}
						$('#inDPJP').html(html);


					}
				});
			} else if (tipe_masuk == '2') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getNamaPoli",
					method: "POST",
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_list_poli + '>' + data[i].nama_panjang + '</option>';
						}
						$('#inJenisPoli').html(html);
					}
				});
			} else if (tipe_masuk == '3') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						tipe_masuk: tipe_masuk
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						// html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + data[i].jasmed_timah_pagi + '|' + data[i].rs_timah_pagi + '|' + data[i].rs_bpjs + '|' + '>' + data[i].nama + '(' + data[i].jam_mulai + '-' + data[i].jam_selesai + ') </option>';
						}
						$('#inDPJP').html(html);
					}
				});
			} else if (tipe_masuk == '4') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getNamaPoliPrioritas",
					method: "POST",
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_list_poli + '>' + data[i].nama_poli + '</option>';
						}
						$('#inJenisPoliPrioritas').html(html);

					}
				});
			} else {
				$('#inDPJP').html('<option>-</option>');
				$('#inJenisPoli').html('<option>-</option>');
				$('#inJenisPoliPrioritas').html('<option>-</option>');

			}
		});








		//Poli tujuan
		$('#inJenisPoli').change(function() {
			var poli = $('#inJenisPoli').val();
			if (poli != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + data[i].jasmed_timah_pagi + '|' + data[i].rs_timah_pagi + '|' + data[i].rs_bpjs + '|' + '>' + data[i].nama + '(' + data[i].jam_mulai + '-' + data[i].jam_selesai + ') </option>';
						}
						$('#inDPJP').html(html);

					}
				});
			} else {
				$('#inDPJP').html('<option>-</option>');
			}
		});





		//tes prioritas
		$('#inJenisPoliPrioritas').change(function() {
			var poli = $('#inJenisPoliPrioritas').val();
			if (poli != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokterPrioritas",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							jasmed_pp_pagi = 200000;
							rs_pp_pagi = 30000;
							html += '<option value=' + data[i].id_dokter + '|' + jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + data[i].jasmed_timah_pagi + '|' + data[i].rs_timah_pagi + '|' + data[i].rs_bpjs + '|' + '>' + data[i].nama + ' (' + data[i].jam_mulai + '-' + data[i].jam_selesai + ')</option>';
						}
						$('#inDPJP').html(html);

					}
				});
			} else {
				$('#inDPJP').html('<option>-</option>');
			}
		});
		//end tes


		// $('#inCaraBayar').change(function() {

		// });
		$('#inKelasRuangan').change(function() {
			var kelas = $('#inKelasRuangan').val();
			if (kelas != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getKamar",
					method: "POST",
					data: {
						kelas: kelas
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option value="">Pilih Kamar</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_ruangan + '>' + data[i].tipe + '</option>';
						}
						$('#inTempatTidur').html(html);
					}
				});
			} else {
				$('#inTempatTidur').html('<option value="">Pilih Kamar</option>');
			}
		});

		$('.data_hide').addClass('collapse');

		$('#inTipeMasuk').change(function() {
			b = $('#inTipeMasuk').val();
			splitDiagB = b.split("|");

			var selector = '.data_hide_' + splitDiagB[0];

			$('.data_hide').collapse('hide');

			$(selector).collapse('show');
		});

		$('#inDPJP').change(function() {


			$('#cb_hide').collapse('show');
		});

		//pilih tindakan poli sore
		$('#inTipeMasuk2').change(function() {
			b = $('#inTipeMasuk2').val();
			splitDiagB = b.split("|");

			var tipe_masuk = splitDiagB[0];
			var poli = $('#inJenisPoli2').val();
			$('#inBiayaAdm2').val(splitDiagB[1]);
			if (tipe_masuk == '1') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						tipe_masuk: tipe_masuk
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + data[i].jasmed_timah_sore + '|' + data[i].rs_timah_sore + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP2').html(html);
					}
				});
			} else if (tipe_masuk == '2') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getNamaPoli",
					method: "POST",
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_list_poli + '>' + data[i].nama_panjang + '</option>';
						}
						$('#inJenisPoli2').html(html);
					}
				});
			} else if (tipe_masuk == '3') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						tipe_masuk: tipe_masuk
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + data[i].jasmed_timah_sore + '|' + data[i].rs_timah_sore + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP2').html(html);

					}
				});
			} else {
				$('#inDPJP2').html('<option>-</option>');
				$('#inJenisPoli2').html('<option>-</option>');

			}
		});
		$('#inJenisPoli2').change(function() {
			var poli = $('#inJenisPoli2').val();
			if (poli != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian2(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + data[i].jasmed_timah_sore + '|' + data[i].rs_timah_sore + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP2').html(html);

					}
				});
			} else {
				$('#inDPJP2').html('<option>-</option>');
			}


		});

		$('#inCaraBayar2').change(function() {
			var cara_bayar = $('#inCaraBayar2').val();
			var a = $("#inDPJP2").val();
			splitDiag = a.split("|");

			if (cara_bayar == 'WA14BJ84') { //bpjs
				$("#inBiayaRS2").val(0);
				$('#inBiayaDok2').val(splitDiag[3]);
				var a = $("#inBiayaRS2").val();
				var b = parseInt(splitDiag[3]);
				var c = $("#inBiayaAdm2").val();
				var total = Number(a) + Number(b) + Number(c);
				$("#inTotal2").val(total);
			} else if (cara_bayar == '65AP55') { //pp
				$("#inBiayaRS2").val(splitDiag[4]);
				$('#inBiayaDok2').val(splitDiag[1]);
				var a = parseInt(splitDiag[4]);
				var b = parseInt(splitDiag[1]);
				var c = $("#inBiayaAdm2").val();
				var total = Number(a) + Number(b) + Number(c);
				$("#inTotal2").val(total);
			} else { //asuransi
				if ((cara_bayar == '333' && tipe_masuk == '4')) { //timah prioritas

					$("#inBiayaRS2").val(splitDiag[7]);
					$('#inBiayaDok2').val(splitDiag[6]);
					var a = parseInt(splitDiag[7]);
					var b = parseInt(splitDiag[6]);
					var c = $('#inBiayaAdm2').val();
					var total = Number(a) + Number(b) + Number(c);
					$("#inTotal2").val(total);

				} else {
					$("#inBiayaRS2").val(splitDiag[5]);
					$('#inBiayaDok2').val(splitDiag[2]);
					var a = parseInt(splitDiag[5]);
					var b = parseInt(splitDiag[2]);
					var c = $('#inBiayaAdm2').val();
					var total = Number(a) + Number(b) + Number(c);
					$("#inTotal2").val(total);
				}

			}
		});
		$('#inKelasRuangan2').change(function() {
			var kelas = $('#inKelasRuangan2').val();
			if (kelas != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getKamar",
					method: "POST",
					data: {
						kelas: kelas
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option value="">Pilih Kamar</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_ruangan + '>' + data[i].tipe + '</option>';
						}
						$('#inTempatTidur2').html(html);
					}
				});
			} else {
				$('#inTempatTidur2').html('<option value="">Pilih Kamar</option>');
			}
		});


		$('.data_poli').addClass('collapse');

		$('#inTipeMasuk2').change(function() {
			b = $('#inTipeMasuk2').val();
			splitDiagB = b.split("|");
			var selector = '.poli_' + splitDiagB[0];

			$('.data_poli').collapse('hide');

			$(selector).collapse('show');
		});
	});
</script>
<script type="text/javascript">
	/*Typeahead Init*/

	$(function() {
		"use strict";

		/*Basic*/

		var substringMatcher = function(strs) {
			return function findMatches(q, cb) {
				var matches, substringRegex;

				// an array that will be populated with substring matches
				matches = [];

				// regex used to determine if a string contains the substring `q`
				var substrRegex = new RegExp(q, 'i');

				// iterate through the pool of strings and for any string that
				// contains the substring `q`, add it to the `matches` array
				$.each(strs, function(i, str) {
					if (substrRegex.test(str)) {
						matches.push(str);
					}
				});

				cb(matches);
			};
		};

		var states = [
			<?php

			foreach ($diagnosa as $row) {


				echo ",'" . $row["id_diagnosa"] . " | " . $row["nama_diagnosa"] . "'";
			}  ?>
		];


		$('#the-basics .typeahead').typeahead({
			hint: true,
			highlight: true,
			minLength: 1
		}, {
			name: 'states',
			source: substringMatcher(states)
		});



	});
</script>

<script type="text/javascript">
	// $(document).ready(function() {
	// 	no_rm = $('#no_rm').val();
	// 	$.ajax({
	// 		url: "<?php echo base_url() ?>Erm_general_concern/get_gencon",
	// 		method: "POST",
	// 		dataType: 'json',
	// 		data: {
	// 			id: no_rm
	// 		},
	// 		success: function(data) {
	// 			if (data.status_dt == 'found') {
	// 				$('#gecon').attr('disabled', true);
	// 			}
	// 		}

	// 	});
	// });

	function tambah_kunjungan() {
		no_rm = $('#no_rm').val();
		$.ajax({
			url: "<?php echo base_url() ?>Erm_general_concern/get_gencon",
			method: "POST",
			dataType: 'json',
			data: {
				id: no_rm
			},
			success: function(data) {
				if (data.status_dt == 'found') {
					$('#modal_tambah_kunjungan').modal('show')
				} else {
					swal({
						title: "Form General Concent Kosong",
						text: "Form General Concent Diisi Terlebih Dahulu",
						type: "warning",
						confirmButtonColor: "#3cb878",
					});
				}
			}

		});
	}
</script>