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
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">NAMA IBU:</label>
					<div class="col-md-9 has-error">
						<input type="text" name="inNamaIbu1" class="form-control filled-input" disabled="" id="inNamaIbu1" value="<?= $data['nama_ibu']; ?>">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<!--/span-->
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-md-3">NAMA AYAH:</label>
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
			<button data-toggle="modal" data-target="#modal_tambah_kunjungan" aria-expanded="false" aria-controls="tambah_kunjungan" class="btn btn-success btn-anim btn-sm" style="margin-right: 20px;"><i class="icon-rocket"></i><span class="btn-text">+ KUNJUNGAN</span></button>
			<button data-toggle="modal" data-target="#modal_poli_sore" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">+ POLI SORE</span></button>
			<button data-toggle="modal" data-target="#modal_gecon" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">GENERAL CONSENT</span></button>
			<button data-toggle="modal" data-target="#modal_vclaim" aria-expanded="false" aria-controls="poli_sore" class="btn btn-danger btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">CEK KEPESERTAAN</span></button>
			<button data-toggle="modal" onclick="cari_sep()" aria-expanded="false" aria-controls="poli_sore" class="btn btn-danger btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">SEP</span></button>
		</div>
	</div>
</div>


<!-- Modal Tambah Kunjungan -->
<?php $this->load->view('page_content/Modal_kunjungan_rm');?>
<!-- Poli Sore -->
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
											<label class="control-label col-md-3">POLI
												TUJUAN</label>
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
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inDPJP2" name="inDPJP">

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
<!-- Riwayat Pasien -->
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
															<th>CARA BAYAR</th>
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
															<th>CARA BAYAR</th>
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
<!-- Gecon -->
<div class="panel-wrapper collapse in">
	<div class="panel-body">
		<!-- sample modal content -->
		<div class="modal fade" id="modal_gecon" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i>GENERAL CONSENT</h5>
					</div>
					<div class="modal-body mt-20">
						<div class="clearfix"></div>
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<div class="form-wrap">
									<div class="form-body">
										<div class="col-md-12">
											<label class="control-label mb-10 text-left">Saya yang bertanda tangan di bawah ini :<span class="help"></span></label>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-3">Nama<span class="help"></span></label>
														<input type="text" class="form-control" disabled="" value="<?= $data['nama'] . " (" . $data['jenis_kelamin'] . ")" ?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-3">Alamat<span class="help"></span></label>
														<input type="text" class="form-control" disabled="" value="<?= $data['alamat'] . "," . $data['kelurahan'] . "," . $data['kecamatan'] . "," . $data['kota'] . "," . $data['provinsi'] ?>">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Telpon<span class="help"></span></label>
														<input type="text" class="form-control" disabled="" value="<?= $data['no_hp'] ?>">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="form-body mt-20">
										<div class="form-group">
											<label class="control-label col-md-3">Hubungan dengan pasien</label>
											<div class="col-md-12 has-success">
												<div class="radio-list">
													<div class="col-md-3">
														<div class="row">
															<div class="radio-inline pl-0">
																<span class="radio radio-info">
																	<input type="radio" value="Saya Sendiri" name="inSS" id="inSS">
																	<label style="color: black;">Saya Sendiri</label>
																</span>
															</div>
														</div>
														<div class="row">
															<div class="radio-inline pl-0">
																<span class="radio radio-info">
																	<input type="radio" value="Suami Istri" name="inSI" id="inSI">
																	<label style="color: black;">Suami Istri</label>
																</span>
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<div class="row">
															<div class="radio-inline pl-0">
																<span class="radio radio-info">
																	<input type="radio" value="Orang Tua Kandung" name="inOTK" id="inOTK">
																	<label style="color: black;">Orang Tua Kandung</label>
																</span>
															</div>
														</div>
														<div class="row">
															<div class="radio-inline pl-0">
																<span class="radio radio-info">
																	<input type="radio" value="Anak Kandung" name="inAK" id="inAK">
																	<label style="color: black;">Anak Kandung</label>
																</span>
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="radio-inline pl-0">
															<span class="radio radio-info">
																<input type="radio">
																<label style="color: black;">Lain-lain</label>
																<input type="text" autocomplete="off" class="form-control col-md-2" name="inLL" id="inLL">
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="form-body mt-20">
										<div class="col-md-12">
											<label class="control-label mb-10 text-left">Karena kondisi medis pasien, saya dengan ini memberikan persetujuan sebagai wakil dari pasien<span class="help"></span></label>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-3">Nama<span class="help"></span></label>
														<div class="col-md-9 has-success">
															<input type="text" class="form-control" id="inNama2">
															<span class="help-block"></span>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<div class="col-md-9 has-success">
															<div class="radio-list">
																<div class="radio-inline pl-0">
																	<span class="radio radio-info">
																		<input type="radio" value="LAKI-LAKI" name="inJkLk" id="inJkLk2">
																		<label style="color: black;">L</label>
																	</span>
																</div>
																<div class="radio-inline pl-0">
																	<span class="radio radio-info">
																		<input type="radio" value="PEREMPUAN" name="inJkPr" id="inJkPr2">
																		<label style="color: black;">P</label>
																	</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-3">Alamat<span class="help"></span></label>
														<div class="col-md-9 has-success">
															<input type="text" class="form-control" id="inAlamat2">
															<span class="help-block"></span>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-3">Telpon<span class="help"></span></label>
														<div class="col-md-9 has-success">
															<input type="text" class="form-control" id="inHP">
															<span class="help-block"></span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="form-body mt-20">
										<label class="control-label mb-10 text-left">Dengan ini saya: </label>
										<ol style="color: black;">
											<li>Mengetahui bahwa saya memiliki kondisi yang membutuhkan perawatan medis, saya mengizinkan dokter dan profesional kesehatan lainnya untuk melakukan prosedur diagnostik dan untuk memberikan pengobatan medis seperti yang diperlukan dalam penilaian profesional mereka. Prosedur diagnostik dan perawatan medis termasuk termasuk tetapi tidak terbatas pada electrocardiograms, x-ray, tes darah, terapi fisik dan pemberian obat.
											</li>
											<br>
											<li>
												Sadar bahwa praktik kedokteran dan bedah bukanlah ilmu pasti dan saya mengakui bahwa tidak ada jaminan atas hasil apapun, terhadap perawatan prosedur atau pemeriksaan apapun yang dilakukan kepada saya.
											</li>
											<br>
											<dl>
												<li>
													<dt>Mengerti dan memahami bahwa :</dt>
												</li>
												<dd>a. Saya memiliki hak untuk mengajukan pertanyaan tentang pengobatan yang diusulkan (termasuk identitas setiap orang yang memberikan atau mengamati pengobatan) setiap saat.</dd>
												<br>
												<dd>b. Saya mengerti dan memahami bahwa saya memiliki hak untuk persetujuan atau menolak persetujuan untuk setiap prosedur/terapi.</dd>
												<br>
												<dd>c. Saya mengerti bahwa banyak dokter pada staf medis RS yang bukan karyawan tetapi staf mitra yang telah diberikan hak untuk menggunakan fasilitas untuk perawatan dan pengobatan pasien mereka.</dd>
												<br>
												<dd>d. Jika diperlukan RS, saya akan berpartisipasi dalam pemilihan dokter yang akan bertanggung jawab untuk perawatan saya selama saya dalam perawatan di RS.</dd>
											</dl>
											<br>
											<li>
												Memahami informasi yang ada didalam diri saya, termasuk diagnosis, hasil laboratorium dan hasil tes diagnostik yang akan digunakan untuk perawatan medis, RS akan menjamin kerahasiaannya.
											</li>
											<br>
											<li>
												Memberi wewenang kepada RS untuk memberikan informasi tentang diagnosis, hasil pelayanan dan pengobatan, bila diperlukan untuk memproses klaim jaminan asuransi/perusahaan dan atau jaminan lembaga pemerintah.
											</li>
											<br>
											<li>
												Memberi wewenang kepada RS untuk memberikan informasi tentang diagnosis, hasil pelayanan dan pengobatan saya kepada anggota keluarga saya kepada :
												<div class="has-success"><input type="textarea" class="form-control" id=""></div>
											</li>
											<br>
											<li>
												<dl>
													<dt>Memberi kuasa kepada RS untuk menjaga privasi dan kerahasiaan diagnosa saya selama dalam perawatan, mencakup :</dt>
													<dd>a. Tidak mengambil dokumentasi berupa foto, rekaman wawancara diluar kepentingan keperawatan dan pengobatan tanpa seizin saya.</dd>
													<dd>b. Tidak memberikan informasi tentang diagnosa saya kepada siapapun tanpa seizin saya baik terhadap keluarga (orang tua kandung/ suami/ istri/ kakak/ adik) kecuali saya dalam kondisi tidak sadar.</dd>
													<dd>c. Saya tidak ingin identitas saya diketahui oleh publik</dd>
													<dd>d. Identitas Asli (Nama Asli) : <strong><?= $data['nama'] ?></strong> disamarkan menjadi <input type="text" size="8" id="inSamaran"></dd>
												</dl>
											</li>
											<br>
											<li>
												Memahami tentang informasi biaya pengobatan atau biaya tindakan yang dijelaskan oleh petugas RS.
											</li>
											<br>
											<li>
												Memahami bahwa kegiatan merekam baik secara audio maupun visual segala kegiatan, aktivitas, dan tindakan medis yang dilakukan oleh tenaga medis di Rumah Sakit Bakti Timah harus sepengetahuan dan ijin dari Dokter penanggung jawab pasien atau tenaga medis.
											</li>
											<br>
											<li>
												Memahami tentang “Hak dan Kewajiban Pasien” yang telah dijelaskan oleh petugas RS.
											</li>
											<br>
										</ol>
										<label class="control-label mb-10 text-left">Dengan ini saya menyatakan bahwa saya telah membaca, memahami dan menyetujui semua isi Persetujuan Umum (General Consent).</label>
									</div>
									<div class="clearfix"></div>
									<div class="form-body mt-20">
										<div class="col-md-12">
											<label class="control-label">Pasien:</label>
											<br />
											<div id="sig"></div>
											<br />
											<button id="clear">Clear</button>

											<textarea id="signature" name="signed" style="display: none"></textarea>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="form-actions">
										<div align="right">
										<span class="help-block"></span>
										<button class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
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
<!-- Cek kepesertaan -->
<?php $this->load->view('page_content/Modal_cek_kepesertaan');?>

<!-- SEP -->
<?php $this->load->view('page_content/Modal_sep');?>

<!-- Edit Pasien -->
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
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">NAMA
											IBU
											KANDUNG</label>
										<div class="col-md-9 has-success">
											<input type="text" autocomplete="off" class="form-control filled-input" placeholder="NAMA IBU" name="inNamaIbu" id="upNamaIbu" value="<?= $data['nama_ibu']; ?>">
											<span class="help-block"> </span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">NAMA
											AYAH
											KANDUNG</label>
										<div class="col-md-9 has-success">
											<input type="text" autocomplete="off" class="form-control filled-input" placeholder="NAMA AYAH" name="inNamaAyah" id="upNamaAyah" value="<?= $data['nama_ayah']; ?>">

										</div>
									</div>
								</div>
							</div>
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
												<?php
												foreach ($kota as $row) {

												?>
													<option value="<?php echo $row["nm_kab"]; ?>" <?= $row["nm_kab"] == $data["kota"] ? 'selected' : ''; ?>>
														<?php echo $row["nm_kab"]; ?>
													</option>
												<?php }  ?>
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
												<?php
												foreach ($kec as $row) {

												?>
													<option value="<?php echo $row["nm_kec"]; ?>" <?= $row["nm_kec"] == $data["kecamatan"] ? 'selected' : ''; ?>>
														<?php echo $row["nm_kec"]; ?>
													</option>
												<?php }  ?>

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

												<?php
												foreach ($kel as $row) {

												?>
													<option value="<?php echo $row["nm_desa"]; ?>" <?= $row["nm_desa"] == $data["kelurahan"] ? 'selected' : ''; ?>>
														<?php echo $row["nm_desa"]; ?>
													</option>
												<?php }  ?>
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
										<label class="control-label col-md-3">NO
											IDENTITAS LAIN</label>
										<div class="col-md-9 has-success">
											<input type="text" autocomplete="off" class="form-control filled-input" placeholder="NO IDENTITAS" name="inNoIdLain" id="upNoIdLain" value="<?= $data['no_id_lain']; ?>">
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

<?php $this->load->view('page_content/Identitas_pasien_JS');?>