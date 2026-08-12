<<<<<<< HEAD
<div class="panel panel-default card-view mt-20" id="pencarian_pasien">

	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PENCARIAN PASIEN</span>
			</h6>
		</div>
		<button class="btn btn-primary btn-anim pull-right mr-30" data-toggle="modal" data-target=".modal-pendaftaranakun" onclick="check_rm()"><i class="icon-plus"></i><span class="btn-text">PASIEN
				BARU</span></button>


		<div class="clearfix"></div>
	</div>

	<div class="row ">
		<div class="col-md-9 mb-10" style="margin-top:30px;">
			<div class="form-group ">
				<label class="control-label col-md-3">NOMOR RM , NAMA, TGL LAHIR / NO BPJS / NO KTP</label>
				<div class="col-md-9 has-success mb-10">
					<input type="text" id="cari_data" class="form-control">
					<input type="hidden" name="usernameAkun" id="usernameAkun" class="form-control">
				</div>
				<p id="notifnorm" style="color: red;font-style:italic; margin-left:400px;"></p>
			</div>
		</div>
		<div class="col-md-3" style="margin-top:30px; margin-left:-3em">
			<div class="form-group ">
				<div class="col-md-12 has-success">
					<a class="btn btn-success" id="btn_find_rm"><i class="glyphicon glyphicon-refresh"></i> Refresh</a>
				</div>
			</div>
		</div>

	</div>

	<h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="table-wrap">
				<div class="table-responsive">
					<table id="datable" class="table table-hover display pb-30">
						<thead>
							<tr class="bg-success">
								<th>NO</th>
								<th>PILIH</th>
								<th>NO RM</th>
								<th>NO RM LAMA</th>
								<th>NAMA PASIEN</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>NO BPJS</th>
								<th>NO KTP</th>
								<th>UMUR</th>
								<th>KOTA</th>
								<th>ALAMAT</th>

							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>PILIH</th>
								<th>NO RM</th>
								<th>NO RM LAMA</th>
								<th>NAMA PASIEN</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>NO BPJS</th>
								<th>NO KTP</th>
								<th>UMUR</th>
								<th>KOTA</th>
								<th>ALAMAT</th>

							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>


	<!-- /Modal Tambah Pasien-->
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<!-- sample modal content -->
			<div class="modal fade modal-pendaftaranakun" id="modal_edit_pelayanan" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
							<h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> IDENTITAS
								PASIEN BARU</h5>
						</div>

						<div class="modal-body mt-20">
							<!-- Form body  -->
							<div id="pasien_baru">
								<!-- identitas -->
								<div class="form-body">
									<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10 mt-20"></i>IDENTITAS
										DIRI</h6>
									<hr>
									<div class="row">

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">NAMA </label>
												<div class="col-md-9 has-success">
													<input type="text" autocomplete="off" class="form-control" placeholder="NAMA PASIEN" name="inNama" id="inNama">
													<span class="help-block"></span>
													<span id="name_error" class="text-danger"></span>
												</div>
											</div>
										</div>

										<!-- span -->

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">NO KTP</label>
												<div class="col-md-9 has-error">
													<input type="number" autocomplete="off" class="form-control  " placeholder="NO KTP" name="inNoKtp" id="inNoKtp">
													<span class="help-block"></span>
													<span id="ktp_error" class="text-danger"></span>
												</div>
											</div>
										</div>

										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">JENIS KELAMIN</label>
												<div class="col-md-9 has-success">
													<div class="radio-list">
														<div class="radio-inline pl-0">
															<span class="radio radio-info">
																<input type="radio" value="LAKI-LAKI" name="inJkLk" id="inJkLk">
																<label for="inJkLk">LAKI-LAKI</label>
															</span>
														</div>
														<div class="radio-inline pl-0">
															<span class="radio radio-info">
																<input type="radio" value="PEREMPUAN" name="inJkPr" id="inJkPr">
																<label for="inJkPr">PEREMPUAN</label>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>


									<!-- /Row -->
									<!-- <div class="row">
										
									</div> -->
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">NAMA KEPALA KELUARGA</label>
												<div class="col-md-9 has-success">
													<input type="text" autocomplete="off" class="form-control  " placeholder="NAMA" name="inNamaKK" id="inNamaKK">
													<span class="help-block"> </span>
												</div>
											</div>
										</div>

									</div>
									<!-- /Row -->
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">TANGGAL LAHIR</label>
												<div class="col-md-9 has-success">
													<input type="date" autocomplete="off" placeholder="TANGGAL LAHIR" id="inTglLahir" name="inTglLahir" data-toggle="datepicker" class="form-control" onchange="tampilUmur(this)">
													<span class="help-block"></span>
													<span id="tgl_error" class="text-danger"></span>
												</div>
											</div>
										</div>

										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">PENDIDIKAN</label>
												<div class="col-md-9 has-success">
													<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inPendidikan" id="inPendidikan">
														<?php
														foreach ($pendidikan as $row) {

														?>
															<option value="<?php echo $row["nama"]; ?>"><?php echo $row["nama"]; ?>
															</option>
														<?php }  ?>
														<span class="help-block"> </span>
													</select>
												</div>
											</div>
										</div>
										<!--/span-->
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">AGAMA</label>
												<div class="col-md-9 has-success">
													<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAgama" id="inAgama">
														<option value="ISLAM">ISLAM</option>
														<option value="KRISTEN">KRISTEN</option>
														<option value="KATOLIK">KATOLIK</option>
														<option value="HINDU">HINDU</option>
														<option value="BUDHA">BUDHA</option>
														<option value="BUDHA">PROTESTAN</option>
														<option value="BUDHA">KHONGHUCU</option>
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
													<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inPekerjaan" id="inPekerjaan">
														<?php
														foreach ($pekerjaan as $row) {

														?>
															<option value="<?php echo $row["nama"]; ?>"><?php echo $row["nama"]; ?>
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
													<select class="form-control filled-input select2" name="inStatus" id="inStatus">
														<option value="MENIKAH">MENIKAH</option>
														<option value="BELUM MENIKAH">BELUM MENIKAH</option>
														<option value="JANDA">JANDA</option>
														<option value="DUDA">DUDA</option>
													</select>
													<span class="help-block"> </span>
												</div>
											</div>
										</div>

										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">NO HP 2</label>
												<div class="col-md-9 has-success">
													<input type="number" autocomplete="off" class="form-control  " placeholder="NO TLP" name="inTelp" id="inTelp">
													<span class="help-block"> </span>
												</div>
											</div>
										</div>
									</div>

									<!-- /Row -->
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">NO HP</label>
												<div class="col-md-9 has-success">
													<input type="number" autocomplete="off" class="form-control  " placeholder="NO HP" name="inNoHp" id="inNoHp">
													<span class="help-block"> </span>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">UMUR</label>
												<div class="col-md-9 has-success">
													<input type="text" class="form-control  " placeholder="UMUR" disabled="" id="inUmur">
													<span class="help-block"> </span>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- /formbody -->

								<!-- alamat -->
								<div class="form-body mt-20">

									<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10 mt-20"></i>ALAMAT</h6>
									<hr><!-- /Row -->
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">PROVINSI</label>
												<div class="col-md-9 has-success">
													<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inProv" id="inProv">
														<?php
														foreach ($prov as $row) {

														?>
															<option value="<?php echo $row["nm_prov"]; ?>">
																<?php echo $row["nm_prov"]; ?></option>
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

													<select class="form-control filled-input select2" placeholder="Pilih Kota" tabindex="1" name="inKota" id="inKota" required>


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
													<select class="form-control filled-input select2" placeholder="Pilih Kecamatan" tabindex="1" name="inKec" id="inKec">


													</select>
													<span class="help-block"> </span>
												</div>
											</div>
										</div>
										<div class="col-md-6" id="outKel">
											<div class="form-group">
												<label class="control-label col-md-3">KELURAHAN</label>
												<div class="col-md-9 has-success">
													<select class="form-control filled-input select2" placeholder="Pilih Kelurahan" tabindex="1" name="inKel" id="inKel">


													</select>
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
												<label class="control-label col-md-3">ALAMAT</label>
												<div class="col-md-9 has-success">
													<input type="text" autocomplete="off" class="form-control" name="inAlamat" id="inAlamat">

													<span class="help-block"> </span>
												</div>
											</div>
										</div>

									</div>
									<!-- /Row -->
								</div>


								<!-- asuransi -->
								<div class="form-body mt-20">
									<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>ASURANSI</h6>
									<hr>
									<!--/row-->
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">NO BPJS / KIS</label>
												<div class="col-md-9 has-error">
													<input type="number" autocomplete="off" class="form-control  " placeholder="NO BPJS / KIS" name="inNoBpjs" id="inNoBpjs">
													<span class="help-block"> </span>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">NO KARTU</label>
												<div class="col-md-9 has-success">
													<input type="text" autocomplete="off" class="form-control  " placeholder="NO KARTU" name="inNoIdLain" id="inNoIdLain">
													<span class="help-block"> </span>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">PENANGGUNG JAWAB</label>
												<div class="col-md-9 has-success">
													<input type="text" autocomplete="off" class="form-control  " placeholder="NAMA PENANGGUNG JAWAB" name="inNamaIbu" id="inNamaIbu" required>
													<span class="help-block"> </span>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">STATUS TANGGUNGAN</label>
												<div class="col-md-9 has-success">
													<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inNamaAyah" id="inNamaAyah">

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

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">JENIS PASIEN</label>
												<div class="col-md-9 has-success">
													<select class="form-control filled-input select2" placeholder="Choose a Category" name="inKetPs" id="inKetPs">
														<option value="BARU" selected>PASIEN BARU</option>
														<option value="LAMA">PASIEN LAMA</option>
													</select>
													<span class="help-block"> </span>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<?php
												$max = $no_rm['max'];
												?>
												<label class="control-label col-md-3">NO RM</label>
												<div class="col-md-9 has-error">
													<input type="text" class="form-control " placeholder="NO RM" name="inNoRm" id="inNoRm" value="<?php echo $max + 1; ?>" disabled>
													<div class="btn btn-success btn-icon-anim btn-circle" onclick="refresh_rm()"><i class="icon-refresh"></i></div>
													<span class="help-block"></span>
													<span id="noRM_error" class="text-danger"></span>
													<div class="mt-10" id="rm_result"></div>

												</div>

											</div>
										</div>
										<!-- span -->
									</div>
								</div>
								<!-- close asuransi -->
							</div>
						</div>

						<div class="row" style="margin-left:120px;">
							<div class="col-md-3">
								<!-- <span class="help-block"></span> -->
								<a class="btn btn-success btn-anim  btn-sm" type="submit" onclick="tambah_pasien()" id="tambah_pasien"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></a>
							</div>
							<div class="col-md-3 mt-4" id="berhasil">

							</div>
						</div>

						<!-- modal kunjungan pasien baru -->
						<div class="modal-footer mb-10 mr-15">
							<div class="row">
								<div class="col-md-12">
									<div class="form-wrap">

										<div class="collapse" id="tambah_kunjungan">

											<!-- /formbody -->
											<div class="form-body">
												<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>KUNJUNGAN</h6>
												<hr>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">TIPE MASUK</label>
															<div class="col-md-9 has-success">
																<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inTipeMasuk1" name="inTipeMasuk">
																	<option value="-">-</option>
																	<option value="1">UGD</option>
																	<option value="2">POLI</option>
																	<option value="3">RAWAT INAP</option>
																</select>
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">TANGGAL
																KUNJUNGAN</label>
															<div class="col-md-9 has-error">
																<input type="text" class="form-control filled-input" placeholder="TANGGAL" id="inTanggalKunjugan1" name="inTanggalKunjugan" value="<?php date_default_timezone_set('Asia/Jakarta');
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
															<label class="control-label col-md-3">ASAL PASIEN</label>
															<div class="col-md-9 has-success">
																<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inAsalPasien1" name="inAsalPasien">
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
															<label class="control-label col-md-3">JENIS KLAIM</label>
															<div class="col-md-9 has-success">
																<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inCaraBayar1" name="inCaraBayar">
																	<option>-</option>
																	<?php
																	foreach ($cara_bayar as $row) {

																	?>
																		<option value="<?php echo $row["id_cara_bayar"]; ?>">
																			<?php echo $row["nama"]; ?></option>
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
															<label class="control-label col-md-3">NO SEP / SLIP</label>
															<div class="col-md-9 has-success">
																<input type="text" class="form-control filled-input" placeholder="NO SEP" name="inNoSEP" id="inNoSEP1">

															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<span class="help-block"></span>
															<label class="control-label col-md-3">DIAGNOSA</label>
															<div class="col-md-9 has-success" id="the-basics">
																<input class="typeahead form-control filled-input" type="text" placeholder="Diagnosa" id="inDiagnosa1" name="inDiagnosa" style="width: 284.17px;">

															</div>
														</div>
													</div>
												</div>
												<span class="help-block"></span>
												<div class="data_tam hide_2">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label col-md-3">POLI
																	TUJUAN</label>
																<div class="col-md-9 has-success">
																	<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inJenisPoli1" name="inJenisPoli">

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
																<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inDPJP1" name="inDPJP">

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
																<input type="text" class="form-control filled-input" placeholder="KETERANGAN" name="inKeterangan" id="inKeterangan1">

															</div>
														</div>
													</div>
												</div>

												<div class="data_tam hide_3">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label col-md-3">KELAS</label>
																<div class="col-md-9 has-success">
																	<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inKelasRuangan1" name="inKelasRuangan">
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
																	<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inTempatTidur" id="inTempatTidur1">
																		<!-- 																									 <option value="-">-</option> -->
																	</select>
																	<span class="help-block"></span>
																</div>
															</div>
														</div>
													</div>
												</div>


												<input type="hidden" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inBiayaAdm1" name="inBiayaAdm">
												<input type="hidden" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inBiayaDok1" name="inBiayaDok">
												<input type="hidden" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inBiayaRS1" name="inBiayaRS">

												<div class="row mt-25">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">TOTAL BIAYA</label>
															<div class="col-md-9 has-success">
																<input type="text" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inTotal1" name="inTotal">
															</div>
														</div>
													</div>
													<div class="data_tam hide_2">
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label col-md-3">NO ANTRIAN</label>
																<div class="col-md-9 has-success">
																	<input type="text" class="form-control" id="inAntrian1" disabled>
																</div>
																<div class="btn btn-success btn-icon-anim btn-circle" onclick="refresh()"><i class="icon-refresh"></i></div>
															</div>
														</div>
													</div>
												</div>

												<br>
												<div align="right">

													<!--/span-->
													<span class="help-block"></span>
													<button class="btn btn-success btn-anim  btn-sm" onclick="insertData1()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
												</div>
												<!-- /Row -->

											</div>
											<!-- /formbody -->

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
			<!-- /.modal -->
		</div>
	</div>
</div>

<!-- End -->

<style>
	td {
		color: black;
	}
</style>

<script type="text/javascript">
	function tampilUmur(elem) {
		a = new Date(elem.value);
		var diff_ms = Date.now() - a.getTime();
		var age_dt = new Date(diff_ms);
		document.getElementById("inUmur").value = Math.abs(age_dt.getUTCFullYear() - 1970) + " Tahun";

	}





	function editPasien() {
		$().ready(function() {
			$("#ModalEditPasien").modal('hide');
			$("#edit_pasien").modal('show');
		});
	}

	function tambah_pasien() {
		nama = $('#inNama').val();
		no_ktp = $('#inNoKtp').val();
		jk = $('input#inJkLk:checked').val() ? 'LAKI-LAKI' : 'PEREMPUAN';
		nama_ibu = $('#inNamaIbu').val();
		nama_ayah = $('#inNamaAyah').val();
		tgl_lahir = $('#inTglLahir').val();
		namaKK = $('#inNamaKK').val();
		agama = $('#inAgama').val();
		pendidikan = $('#inPendidikan').val();
		status = $('#inStatus').val();
		pekerjaan = $('#inPekerjaan').val();
		no_hp = $('#inNoHp').val();
		telp = $('#inTelp').val();
		umur = $('#inUmur').val();
		prov = $('#inProv').val();
		kota = $('#inKota').val();
		kec = $('#inKec').val();
		kel = $('#inKel').val();
		alamat = $('#inAlamat').val();
		no_bpjs = $('#inNoBpjs').val();
		no_id_lain = $('#inNoIdLain').val();
		no_rm = $('#inNoRm').val();
		ket = $('#inKetPs').val();


		$.ajax({
			url: "<?= base_url() . 'Pencarian_pasien/tambah_pasien' ?>",
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
				ket: ket,
			},
			method: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Pasien " + nama + " berhasil ditambahkan",
						confirmButtonColor: "#3cb878",
					});
					html = '<button data-toggle="collapse" data-target="#tambah_kunjungan" aria-expanded="false" aria-controls="tambah_kunjungan" class="btn btn-success btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">+ KUNJUNGAN</span>'
					$('#berhasil').html(html);
					$('#modal_edit_pelayanan').modal('hide');
					window.location.href = '<?php echo base_url(); ?>Pencarian_pasien/';
				} else if (data.status = "error") {

					swal({
						title: "No RM " + no_rm + " sudah dipakai",
						type: "warning",
						text: "Silahkan tekan tombol refresh terlebih dahulu",
						confirmButtonColor: "#3cb878",
					});
				} else if (data.error) {
					if (data.name_error != '') {
						$('#name_error').html(data.name_error);
					} else {
						$('#name_error').html('');
					}
					if (data.ktp_error != '') {
						$('#ktp_error').html(data.ktp_error);
					} else {
						$('#ktp_error').html('');
					}
					if (data.tgl_error != '') {
						$('#tgl_error').html(data.tgl_error);
					} else {
						$('#tgl_error').html('');
					}
					if (data.noRM_error != '') {
						$('#noRM_error').html(data.noRM_error);
					} else {
						$('#noRM_error').html('');
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

	}
</script>

<script type="text/javascript">
	function edit_pasien(no_rm) {
		window.location.href = '<?php echo base_url(); ?>Pencarian_pasien/identitas_pasien/' + no_rm;
	}

	function insertData1() {
		no_rm = $('#inNoRm').val();
		b = $('#inTipeMasuk1').val();
		splitDiagB = b.split("|");
		jenis_pelayanan = splitDiagB[0];
		tgl_masuk = $('#inTanggalKunjugan1').val();
		asal_pasien = $('#inAsalPasien1').val();
		cara_bayar = $('#inCaraBayar1').val();
		no_sep = $('#inNoSEP1').val();
		diagnosa = $('#inDiagnosa1').val();
		keterangan = $('#inKeterangan1').val();
		a = $("#inDPJP1").val();
		splitDiag = a.split("|");
		dpjp = splitDiag[0];
		nama_poli = $('#inJenisPoli1').val();
		kelas = $('#inKelasRuangan1').val();
		tempat_tidur = $('#inTempatTidur1').val();
		biaya_jasa = $('#inBiayaDok1').val();
		biaya_rs = $('#inBiayaRS1').val();
		biaya_admin = $('#inBiayaAdm1').val();
		antrian = $('#inAntrian1').val();
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
				kelas: kelas,
				tempat_tidur: tempat_tidur,
				biaya_jasa: biaya_jasa,
				biaya_rs: biaya_rs,
				biaya_admin: biaya_admin,
				antrian: antrian,
			},
			success: function(data) {
				if (data.status == "success") {
					if (jenis_pelayanan == '2') {
						swal({
							title: "SELAMAT!",
							type: "success",
							text: "Silahkan Menuju Rekam Medis",
							confirmButtonColor: "#3cb878",
							confirmButtonText: "OK",
						}, function() {
							$().ready(function() {
								window.location.href = '<?php echo base_url() ?>Pencarian_pasien/cetak_antrian/' + antrian + '/' + nama_poli + '/' + total;
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
					$("#pencarian_pasien").load(location.href + "#pencarian_pasien");
					// $("#tambah_kunjungan").load(location.href +  "#tambah_kunjungan");
					nama = $('#inNama').val("");
					no_ktp = $('#inNoKtp').val("");
					if ($('#inJkLk').checked) {
						jk = $('#inJkLk').val("");
					} else {
						jk = $('#inJkPr').val("");
					}

					$('#inNama').val("");
					$('#inNoKtp').val("");
					$('#inJkLk').val("");
					$('#inJkPr').val("");
					$('#inNamaIbu').val("");
					$('#inNamaAyah').val("");
					$('#inTglLahir').val("");
					$('#inNamaKK').val("");
					$('#inAgama').val("");
					$('#inPendidikan').val("");
					$('#inStatus').val("");
					$('#inPekerjaan').val("");
					$('#inNoHp').val("");
					$('#inTelp').val("");
					$('#inUmur').val("");
					$('#inProv').val("");
					$('#inKota').val("");
					$('#inKec').val("");
					$('#inKel').val("");
					$('#inAlamat').val("");
					$('#inNoBpjs').val("");
					$('#inNoIdLain').val("");
					$('#inNoRm').val("");
					$('#inNoSEP1').val("");
					$('#inDiagnosa1').val("");
					$('#inKeterangan1').val("");
					$('#inDPJP1').val("");
					$('#inTanggalKunjugan1').val("");
					$('#inAsalPasien1').val("");
					$('#inCaraBayar1').val("");
					$('#inJenisPoli1').val("");
					$('#inKelasRuangan1').val("");
					$('#inTempatTidur1').val("");
					$('#inBiayaDok1').val("");
					$('#inBiayaRS1').val("");
					$('#inBiayaAdm1').val("");
					$('#inAntrian1').val("");
					$('#inTipeMasuk1').val("");
					$('#inTotal1').val("");

					$('#berhasil').html('');
					$("#tambah_kunjungan").collapse('hide');
					$("#modal_edit_pelayanan").modal('hide');
					$("#modal_edit_pelayanan").reload();
					$('#datable').DataTable().ajax.reload();

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
</script>

<script type="text/javascript">
	function check_rm() {
		urm = $('#inNoRm').val();
		console.log(urm);
		if (urm != '') {
			$.ajax({
				url: "<?php echo base_url(); ?>Pencarian_pasien/check_rm",
				method: "POST",
				data: {
					no_rm: urm
				},
				success: function(data) {
					$('#rm_result').html(data);
				}
			});
		}
	}
	$(document).ready(function() {
		$('#inKetPs').change(function() {
			var ket = $('#inKetPs').val();
			// alert(ket);
			if (ket == 'LAMA') {
				$("#inNoRm").removeAttr('disabled');
				$('#inNoRm').val("");
			} else {
				$('#inNoRm').attr("disabled", true);
				$('#inNoRm').val("<?php echo $max + 1; ?>");

			}
		});
		$('#inNoRm').ready(function() {
			urm = $('#inNoRm').val();
			console.log(urm);
			if (urm != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/check_rm",
					method: "POST",
					data: {
						no_rm: urm
					},
					success: function(data) {
						$('#rm_result').html(data);
					}
				});
			}
		});

		$('#inProv').change(function() {
			var prov = $('#inProv').val();
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
						$('#inKota').html(html);
						$('#inKec').html('<option value="">Pilih Kecamatan</option>');
						$('#inKel').html('<option value="">Pilih Kelurahan</option>');

					}
				});
			} else {
				$('#inKota').html('<option value="">Pilih Kota</option>');
				$('#inKec').html('<option value="">Pilih Kecamatan</option>');
				$('#inKel').html('<option value="">Pilih Kelurahan</option>');
			}
		});

		$('#inKota').change(function() {
			var kota = $('#inKota').val();
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
							html += '<option value="' + data[i].nm_kec + '">' + data[i].nm_kec + '</option>';
						}
						$('#inKec').html(html);
						$('#inKel').html('<option value="">Pilih Kelurahan</option>');
					}
				});
			} else {
				$('#inKec').html('<option value="">Pilih Kecamatan</option>');
				$('#inKel').html('<option value="">Pilih Kelurahan</option>');
			}
		});
		$('#inKec').change(function() {
			var kec = $('#inKec').val();
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
							html += '<option value="' + data[i].nm_desa + '">' + data[i].nm_desa + '</option>';
						}
						$('#inKel').html(html);
					}
				});
			} else {
				$('#inKel').html('<option value="">Pilih Kelurahan</option>');
			}
		});





		// pilih tindakan kunjungan pasien



		// pilih tindakan kunjungan pasien baru
		$('#inTipeMasuk1').change(function() {
			b = $('#inTipeMasuk1').val();
			splitDiagB = b.split("|");
			var tipe_masuk = splitDiagB[0];
			var poli = $('#inJenisPoli1').val();
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
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

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
						$('#inJenisPoli1').html(html);
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
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else {
				$('#inDPJP1').html('<option>-</option>');
				$('#inJenisPoli1').html('<option>-</option>');

			}
		});
		$('#inJenisPoli1').change(function() {
			var poli = $('#inJenisPoli1').val();
			if (poli == '111111') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == '146582') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == '15487956') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == '24QRNLX29R') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == '2JZ09X4K22') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == '6E975PL694') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == 'AX1520L18') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == 'E00RX703') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == 'HLGI4176K8') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == 'I9NXY5VNQG') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == 'MWK205D30K') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == 'O782EGU4PR') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == 'ODI8643C27') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == 'RZE28J1098') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == 'UQ81K76373') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);
					}

				});

			} else {
				$('#inDPJP1').html('<option>-</option>');
			}


		});

		$('#inCaraBayar').change(function() {
			var cara_bayar = $('#inCaraBayar').val();
			var a = $("#inDPJP").val();
			splitDiag = a.split("|");

			if (cara_bayar == '30') { //bpjs
				$("#inBiayaRS").val(0);
				$('#inBiayaDok').val(splitDiag[3]);
				var a = $("#inBiayaRS").val();
				var b = parseInt(splitDiag[3]);
				var c = $('#inBiayaAdm').val();
				var total = Number(a) + Number(b) + Number(c);
				$("#inTotal").val(total);
			} else if (cara_bayar == '42') { //pp
				$("#inBiayaRS").val(splitDiag[4]);
				$('#inBiayaDok').val(splitDiag[1]);
				var a = parseInt(splitDiag[4]);
				var b = parseInt(splitDiag[1]);
				var c = $('#inBiayaAdm').val();
				var total = Number(a) + Number(b) + Number(c);
				$("#inTotal").val(total);
			} else { //asuransi
				$("#inBiayaRS").val(splitDiag[5]);
				$('#inBiayaDok').val(splitDiag[2]);
				var a = parseInt(splitDiag[5]);
				var b = parseInt(splitDiag[2]);
				var c = $('#inBiayaAdm').val();
				var total = Number(a) + Number(b) + Number(c);
				$("#inTotal").val(total);
			}

		});
		$('#inCaraBayar1').change(function() {
			var cara_bayar = $('#inCaraBayar1').val();
			var a = $("#inDPJP1").val();
			splitDiag = a.split("|");

			if (cara_bayar == '30') { //bpjs
				$("#inBiayaRS1").val(0);
				$('#inBiayaDok1').val(splitDiag[3]);
				var a = $("#inBiayaRS1").val();
				var b = parseInt(splitDiag[3]);
				var c = $("#inBiayaAdm1").val();
				var total = Number(a) + Number(b) + Number(c);
				$("#inTotal1").val(total);
			} else if (cara_bayar == '42') { //pp
				$("#inBiayaRS1").val(splitDiag[4]);
				$('#inBiayaDok1').val(splitDiag[1]);
				var a = parseInt(splitDiag[4]);
				var b = parseInt(splitDiag[1]);
				var c = $("#inBiayaAdm1").val();
				var total = Number(a) + Number(b) + Number(c);
				$("#inTotal1").val(total);
			} else { //asuransi
				$("#inBiayaRS1").val(splitDiag[5]);
				$('#inBiayaDok1').val(splitDiag[2]);
				var a = parseInt(splitDiag[5]);
				var b = parseInt(splitDiag[2]);
				var c = $("#inBiayaAdm1").val();
				var total = Number(a) + Number(b) + Number(c);
				$("#inTotal1").val(total);
			}
		});
		$('#inKelasRuangan1').change(function() {
			var kelas = $('#inKelasRuangan1').val();
			if (prov != '') {
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
						$('#inTempatTidur1').html(html);
					}
				});
			} else {
				$('#inTempatTidur1').html('<option value="">Pilih Kamar</option>');
			}
		});


	});
</script>
<script type="text/javascript">
	$(document).ready(function() {

		$('.data_tam').addClass('collapse');

		$('#inTipeMasuk1').change(function() {
			b = $('#inTipeMasuk1').val();
			splitDiagB = b.split("|");
			var selector = '.hide_' + splitDiagB[0];

			$('.data_tam').collapse('hide');

			$(selector).collapse('show');
		});
	});
</script>


<script>
	$('#inNoRm').keyup(function() {
		urm = $('#inNoRm').val();
		console.log(urm);
		if (urm != '') {
			$.ajax({
				url: "<?php echo base_url(); ?>Pencarian_pasien/check_rm",
				method: "POST",
				data: {
					no_rm: urm
				},
				success: function(data) {
					$('#rm_result').html(data);
				}
			});
		}
	});

	// Cek Data Pasien
	$('#btn_find_rm').click(function() {
		$('#datable').dataTable().fnClearTable();
		$('#datable').dataTable().fnDestroy();
		$('#notifnorm').html('');
		urm = $('#cari_data').val();
		if (urm.length > 1) {
			find_rm(urm);
		} else {
			if (urm != "") {
				html = '<b>Pencarian minimal harus 2 karakter</b>';
				$('#notifnorm').html(html);
			}
		}
	});

	$('#cari_data').keyup(function() {
		$('#datable').dataTable().fnClearTable();
		$('#datable').dataTable().fnDestroy();
		$('#notifnorm').html('');
		urm = $('#cari_data').val();
		if (urm.length > 1) {
			find_rm(urm);
		} else {
			if (urm != "") {
				html = '<b>Pencarian minimal harus 2 karakter</b>';
				$('#notifnorm').html(html);
			}
		}
	});

	function find_rm(urm) {
		$('#datable').DataTable({
			"retrieve": true,
			// "paging": false,
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
				"url": '<?php echo base_url('Pencarian_pasien/check_data'); ?>',
				"type": 'POST',
				"data": {
					cari_data: urm
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

	function cekAntrian1(poli) {
		$.ajax({
			url: "<?php echo base_url(); ?>Pencarian_pasien/getAntrian",
			method: "POST",
			data: {
				poli: poli
			},
			dataType: 'json',
			success: function(data) {
				$("#inAntrian1").val(data);
			}
		});
	}

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

	function refresh_rm() {
		no_rm = $('#inNoRm').val();

		$.ajax({
			url: "<?php echo base_url(); ?>Pencarian_pasien/getNoRM",
			method: "POST",
			data: {
				no_rm: no_rm
			},
			dataType: 'json',
			success: function(data) {

				$("#inNoRm").val(Number(data.max) + 1);
			}
		});
	}
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
=======
<div class="panel panel-default card-view mt-20" id="pencarian_pasien">

	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PENCARIAN PASIEN</span>
			</h6>
		</div>
		<button class="btn btn-primary btn-anim pull-right mr-30" data-toggle="modal" data-target=".modal-pendaftaranakun" onclick="check_rm()"><i class="icon-plus"></i><span class="btn-text">PASIEN
				BARU</span></button>


		<div class="clearfix"></div>
	</div>

	<div class="row ">
		<div class="col-md-9 mb-10" style="margin-top:30px;">
			<div class="form-group ">
				<label class="control-label col-md-3">NOMOR RM , NAMA, TGL LAHIR / NO BPJS / NO KTP</label>
				<div class="col-md-9 has-success mb-10">
					<input type="text" id="cari_data" class="form-control">
					<input type="hidden" name="usernameAkun" id="usernameAkun" class="form-control">
				</div>
				<p id="notifnorm" style="color: red;font-style:italic; margin-left:400px;"></p>
			</div>
		</div>
		<div class="col-md-3" style="margin-top:30px; margin-left:-3em">
			<div class="form-group ">
				<div class="col-md-12 has-success">
					<a class="btn btn-success" id="btn_find_rm"><i class="glyphicon glyphicon-refresh"></i> Refresh</a>
				</div>
			</div>
		</div>

	</div>

	<h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="table-wrap">
				<div class="table-responsive">
					<table id="datable" class="table table-hover display pb-30">
						<thead>
							<tr class="bg-success">
								<th>NO</th>
								<th>PILIH</th>
								<th>NO RM</th>
								<th>NO RM LAMA</th>
								<th>NAMA PASIEN</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>NO BPJS</th>
								<th>NO KTP</th>
								<th>UMUR</th>
								<th>KOTA</th>
								<th>ALAMAT</th>

							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>PILIH</th>
								<th>NO RM</th>
								<th>NO RM LAMA</th>
								<th>NAMA PASIEN</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>NO BPJS</th>
								<th>NO KTP</th>
								<th>UMUR</th>
								<th>KOTA</th>
								<th>ALAMAT</th>

							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>


	<!-- /Modal Tambah Pasien-->
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<!-- sample modal content -->
			<div class="modal fade modal-pendaftaranakun" id="modal_edit_pelayanan" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
							<h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> IDENTITAS
								PASIEN BARU</h5>
						</div>

						<div class="modal-body mt-20">
							<!-- Form body  -->
							<div id="pasien_baru">
								<!-- identitas -->
								<div class="form-body">
									<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10 mt-20"></i>IDENTITAS
										DIRI</h6>
									<hr>
									<div class="row">

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">NAMA </label>
												<div class="col-md-9 has-success">
													<input type="text" autocomplete="off" class="form-control" placeholder="NAMA PASIEN" name="inNama" id="inNama">
													<span class="help-block"></span>
													<span id="name_error" class="text-danger"></span>
												</div>
											</div>
										</div>

										<!-- span -->

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">NO KTP</label>
												<div class="col-md-9 has-error">
													<input type="number" autocomplete="off" class="form-control  " placeholder="NO KTP" name="inNoKtp" id="inNoKtp">
													<span class="help-block"></span>
													<span id="ktp_error" class="text-danger"></span>
												</div>
											</div>
										</div>

										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">JENIS KELAMIN</label>
												<div class="col-md-9 has-success">
													<div class="radio-list">
														<div class="radio-inline pl-0">
															<span class="radio radio-info">
																<input type="radio" value="LAKI-LAKI" name="inJkLk" id="inJkLk">
																<label for="inJkLk">LAKI-LAKI</label>
															</span>
														</div>
														<div class="radio-inline pl-0">
															<span class="radio radio-info">
																<input type="radio" value="PEREMPUAN" name="inJkPr" id="inJkPr">
																<label for="inJkPr">PEREMPUAN</label>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>


									<!-- /Row -->
									<!-- <div class="row">
										
									</div> -->
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">NAMA KEPALA KELUARGA</label>
												<div class="col-md-9 has-success">
													<input type="text" autocomplete="off" class="form-control  " placeholder="NAMA" name="inNamaKK" id="inNamaKK">
													<span class="help-block"> </span>
												</div>
											</div>
										</div>

									</div>
									<!-- /Row -->
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">TANGGAL LAHIR</label>
												<div class="col-md-9 has-success">
													<input type="date" autocomplete="off" placeholder="TANGGAL LAHIR" id="inTglLahir" name="inTglLahir" data-toggle="datepicker" class="form-control" onchange="tampilUmur(this)">
													<span class="help-block"></span>
													<span id="tgl_error" class="text-danger"></span>
												</div>
											</div>
										</div>

										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">PENDIDIKAN</label>
												<div class="col-md-9 has-success">
													<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inPendidikan" id="inPendidikan">
														<?php
														foreach ($pendidikan as $row) {

														?>
															<option value="<?php echo $row["nama"]; ?>"><?php echo $row["nama"]; ?>
															</option>
														<?php }  ?>
														<span class="help-block"> </span>
													</select>
												</div>
											</div>
										</div>
										<!--/span-->
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">AGAMA</label>
												<div class="col-md-9 has-success">
													<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inAgama" id="inAgama">
														<option value="ISLAM">ISLAM</option>
														<option value="KRISTEN">KRISTEN</option>
														<option value="KATOLIK">KATOLIK</option>
														<option value="HINDU">HINDU</option>
														<option value="BUDHA">BUDHA</option>
														<option value="BUDHA">PROTESTAN</option>
														<option value="BUDHA">KHONGHUCU</option>
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
													<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inPekerjaan" id="inPekerjaan">
														<?php
														foreach ($pekerjaan as $row) {

														?>
															<option value="<?php echo $row["nama"]; ?>"><?php echo $row["nama"]; ?>
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
													<select class="form-control filled-input select2" name="inStatus" id="inStatus">
														<option value="MENIKAH">MENIKAH</option>
														<option value="BELUM MENIKAH">BELUM MENIKAH</option>
														<option value="JANDA">JANDA</option>
														<option value="DUDA">DUDA</option>
													</select>
													<span class="help-block"> </span>
												</div>
											</div>
										</div>

										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">NO HP 2</label>
												<div class="col-md-9 has-success">
													<input type="number" autocomplete="off" class="form-control  " placeholder="NO TLP" name="inTelp" id="inTelp">
													<span class="help-block"> </span>
												</div>
											</div>
										</div>
									</div>

									<!-- /Row -->
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">NO HP</label>
												<div class="col-md-9 has-success">
													<input type="number" autocomplete="off" class="form-control  " placeholder="NO HP" name="inNoHp" id="inNoHp">
													<span class="help-block"> </span>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">UMUR</label>
												<div class="col-md-9 has-success">
													<input type="text" class="form-control  " placeholder="UMUR" disabled="" id="inUmur">
													<span class="help-block"> </span>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- /formbody -->

								<!-- alamat -->
								<div class="form-body mt-20">

									<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10 mt-20"></i>ALAMAT</h6>
									<hr><!-- /Row -->
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">PROVINSI</label>
												<div class="col-md-9 has-success">
													<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inProv" id="inProv">
														<?php
														foreach ($prov as $row) {

														?>
															<option value="<?php echo $row["nm_prov"]; ?>">
																<?php echo $row["nm_prov"]; ?></option>
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

													<select class="form-control filled-input select2" placeholder="Pilih Kota" tabindex="1" name="inKota" id="inKota" required>


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
													<select class="form-control filled-input select2" placeholder="Pilih Kecamatan" tabindex="1" name="inKec" id="inKec">


													</select>
													<span class="help-block"> </span>
												</div>
											</div>
										</div>
										<div class="col-md-6" id="outKel">
											<div class="form-group">
												<label class="control-label col-md-3">KELURAHAN</label>
												<div class="col-md-9 has-success">
													<select class="form-control filled-input select2" placeholder="Pilih Kelurahan" tabindex="1" name="inKel" id="inKel">


													</select>
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
												<label class="control-label col-md-3">ALAMAT</label>
												<div class="col-md-9 has-success">
													<input type="text" autocomplete="off" class="form-control" name="inAlamat" id="inAlamat">

													<span class="help-block"> </span>
												</div>
											</div>
										</div>

									</div>
									<!-- /Row -->
								</div>


								<!-- asuransi -->
								<div class="form-body mt-20">
									<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>ASURANSI</h6>
									<hr>
									<!--/row-->
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">NO BPJS / KIS</label>
												<div class="col-md-9 has-error">
													<input type="number" autocomplete="off" class="form-control  " placeholder="NO BPJS / KIS" name="inNoBpjs" id="inNoBpjs">
													<span class="help-block"> </span>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">NO KARTU</label>
												<div class="col-md-9 has-success">
													<input type="text" autocomplete="off" class="form-control  " placeholder="NO KARTU" name="inNoIdLain" id="inNoIdLain">
													<span class="help-block"> </span>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">PENANGGUNG JAWAB</label>
												<div class="col-md-9 has-success">
													<input type="text" autocomplete="off" class="form-control  " placeholder="NAMA PENANGGUNG JAWAB" name="inNamaIbu" id="inNamaIbu" required>
													<span class="help-block"> </span>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">STATUS TANGGUNGAN</label>
												<div class="col-md-9 has-success">
													<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inNamaAyah" id="inNamaAyah">

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

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">JENIS PASIEN</label>
												<div class="col-md-9 has-success">
													<select class="form-control filled-input select2" placeholder="Choose a Category" name="inKetPs" id="inKetPs">
														<option value="BARU" selected>PASIEN BARU</option>
														<option value="LAMA">PASIEN LAMA</option>
													</select>
													<span class="help-block"> </span>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<?php
												$max = $no_rm['max'];
												?>
												<label class="control-label col-md-3">NO RM</label>
												<div class="col-md-9 has-error">
													<input type="text" class="form-control " placeholder="NO RM" name="inNoRm" id="inNoRm" value="<?php echo $max + 1; ?>" disabled>
													<div class="btn btn-success btn-icon-anim btn-circle" onclick="refresh_rm()"><i class="icon-refresh"></i></div>
													<span class="help-block"></span>
													<span id="noRM_error" class="text-danger"></span>
													<div class="mt-10" id="rm_result"></div>

												</div>

											</div>
										</div>
										<!-- span -->
									</div>
								</div>
								<!-- close asuransi -->
							</div>
						</div>

						<div class="row" style="margin-left:120px;">
							<div class="col-md-3">
								<!-- <span class="help-block"></span> -->
								<a class="btn btn-success btn-anim  btn-sm" type="submit" onclick="tambah_pasien()" id="tambah_pasien"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></a>
							</div>
							<div class="col-md-3 mt-4" id="berhasil">

							</div>
						</div>

						<!-- modal kunjungan pasien baru -->
						<div class="modal-footer mb-10 mr-15">
							<div class="row">
								<div class="col-md-12">
									<div class="form-wrap">

										<div class="collapse" id="tambah_kunjungan">

											<!-- /formbody -->
											<div class="form-body">
												<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>KUNJUNGAN</h6>
												<hr>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">TIPE MASUK</label>
															<div class="col-md-9 has-success">
																<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inTipeMasuk1" name="inTipeMasuk">
																	<option value="-">-</option>
																	<option value="1">UGD</option>
																	<option value="2">POLI</option>
																	<option value="3">RAWAT INAP</option>
																</select>
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">TANGGAL
																KUNJUNGAN</label>
															<div class="col-md-9 has-error">
																<input type="text" class="form-control filled-input" placeholder="TANGGAL" id="inTanggalKunjugan1" name="inTanggalKunjugan" value="<?php date_default_timezone_set('Asia/Jakarta');
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
															<label class="control-label col-md-3">ASAL PASIEN</label>
															<div class="col-md-9 has-success">
																<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inAsalPasien1" name="inAsalPasien">
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
															<label class="control-label col-md-3">JENIS KLAIM</label>
															<div class="col-md-9 has-success">
																<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inCaraBayar1" name="inCaraBayar">
																	<option>-</option>
																	<?php
																	foreach ($cara_bayar as $row) {

																	?>
																		<option value="<?php echo $row["id_cara_bayar"]; ?>">
																			<?php echo $row["nama"]; ?></option>
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
															<label class="control-label col-md-3">NO SEP / SLIP</label>
															<div class="col-md-9 has-success">
																<input type="text" class="form-control filled-input" placeholder="NO SEP" name="inNoSEP" id="inNoSEP1">

															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<span class="help-block"></span>
															<label class="control-label col-md-3">DIAGNOSA</label>
															<div class="col-md-9 has-success" id="the-basics">
																<input class="typeahead form-control filled-input" type="text" placeholder="Diagnosa" id="inDiagnosa1" name="inDiagnosa" style="width: 284.17px;">

															</div>
														</div>
													</div>
												</div>
												<span class="help-block"></span>
												<div class="data_tam hide_2">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label col-md-3">POLI
																	TUJUAN</label>
																<div class="col-md-9 has-success">
																	<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inJenisPoli1" name="inJenisPoli">

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
																<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inDPJP1" name="inDPJP">

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
																<input type="text" class="form-control filled-input" placeholder="KETERANGAN" name="inKeterangan" id="inKeterangan1">

															</div>
														</div>
													</div>
												</div>

												<div class="data_tam hide_3">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label col-md-3">KELAS</label>
																<div class="col-md-9 has-success">
																	<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inKelasRuangan1" name="inKelasRuangan">
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
																	<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inTempatTidur" id="inTempatTidur1">
																		<!-- 																									 <option value="-">-</option> -->
																	</select>
																	<span class="help-block"></span>
																</div>
															</div>
														</div>
													</div>
												</div>


												<input type="hidden" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inBiayaAdm1" name="inBiayaAdm">
												<input type="hidden" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inBiayaDok1" name="inBiayaDok">
												<input type="hidden" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inBiayaRS1" name="inBiayaRS">

												<div class="row mt-25">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">TOTAL BIAYA</label>
															<div class="col-md-9 has-success">
																<input type="text" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inTotal1" name="inTotal">
															</div>
														</div>
													</div>
													<div class="data_tam hide_2">
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label col-md-3">NO ANTRIAN</label>
																<div class="col-md-9 has-success">
																	<input type="text" class="form-control" id="inAntrian1" disabled>
																</div>
																<div class="btn btn-success btn-icon-anim btn-circle" onclick="refresh()"><i class="icon-refresh"></i></div>
															</div>
														</div>
													</div>
												</div>

												<br>
												<div align="right">

													<!--/span-->
													<span class="help-block"></span>
													<button class="btn btn-success btn-anim  btn-sm" onclick="insertData1()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
												</div>
												<!-- /Row -->

											</div>
											<!-- /formbody -->

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
			<!-- /.modal -->
		</div>
	</div>
</div>

<!-- End -->

<style>
	td {
		color: black;
	}
</style>

<script type="text/javascript">
	function tampilUmur(elem) {
		a = new Date(elem.value);
		var diff_ms = Date.now() - a.getTime();
		var age_dt = new Date(diff_ms);
		document.getElementById("inUmur").value = Math.abs(age_dt.getUTCFullYear() - 1970) + " Tahun";

	}





	function editPasien() {
		$().ready(function() {
			$("#ModalEditPasien").modal('hide');
			$("#edit_pasien").modal('show');
		});
	}

	function tambah_pasien() {
		nama = $('#inNama').val();
		no_ktp = $('#inNoKtp').val();
		jk = $('input#inJkLk:checked').val() ? 'LAKI-LAKI' : 'PEREMPUAN';
		nama_ibu = $('#inNamaIbu').val();
		nama_ayah = $('#inNamaAyah').val();
		tgl_lahir = $('#inTglLahir').val();
		namaKK = $('#inNamaKK').val();
		agama = $('#inAgama').val();
		pendidikan = $('#inPendidikan').val();
		status = $('#inStatus').val();
		pekerjaan = $('#inPekerjaan').val();
		no_hp = $('#inNoHp').val();
		telp = $('#inTelp').val();
		umur = $('#inUmur').val();
		prov = $('#inProv').val();
		kota = $('#inKota').val();
		kec = $('#inKec').val();
		kel = $('#inKel').val();
		alamat = $('#inAlamat').val();
		no_bpjs = $('#inNoBpjs').val();
		no_id_lain = $('#inNoIdLain').val();
		no_rm = $('#inNoRm').val();
		ket = $('#inKetPs').val();


		$.ajax({
			url: "<?= base_url() . 'Pencarian_pasien/tambah_pasien' ?>",
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
				ket: ket,
			},
			method: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Pasien " + nama + " berhasil ditambahkan",
						confirmButtonColor: "#3cb878",
					});
					html = '<button data-toggle="collapse" data-target="#tambah_kunjungan" aria-expanded="false" aria-controls="tambah_kunjungan" class="btn btn-success btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">+ KUNJUNGAN</span>'
					$('#berhasil').html(html);
					$('#modal_edit_pelayanan').modal('hide');
					window.location.href = '<?php echo base_url(); ?>Pencarian_pasien/';
				} else if (data.status = "error") {

					swal({
						title: "No RM " + no_rm + " sudah dipakai",
						type: "warning",
						text: "Silahkan tekan tombol refresh terlebih dahulu",
						confirmButtonColor: "#3cb878",
					});
				} else if (data.error) {
					if (data.name_error != '') {
						$('#name_error').html(data.name_error);
					} else {
						$('#name_error').html('');
					}
					if (data.ktp_error != '') {
						$('#ktp_error').html(data.ktp_error);
					} else {
						$('#ktp_error').html('');
					}
					if (data.tgl_error != '') {
						$('#tgl_error').html(data.tgl_error);
					} else {
						$('#tgl_error').html('');
					}
					if (data.noRM_error != '') {
						$('#noRM_error').html(data.noRM_error);
					} else {
						$('#noRM_error').html('');
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

	}
</script>

<script type="text/javascript">
	function edit_pasien(no_rm) {
		window.location.href = '<?php echo base_url(); ?>Pencarian_pasien/identitas_pasien/' + no_rm;
	}

	function insertData1() {
		no_rm = $('#inNoRm').val();
		b = $('#inTipeMasuk1').val();
		splitDiagB = b.split("|");
		jenis_pelayanan = splitDiagB[0];
		tgl_masuk = $('#inTanggalKunjugan1').val();
		asal_pasien = $('#inAsalPasien1').val();
		cara_bayar = $('#inCaraBayar1').val();
		no_sep = $('#inNoSEP1').val();
		diagnosa = $('#inDiagnosa1').val();
		keterangan = $('#inKeterangan1').val();
		a = $("#inDPJP1").val();
		splitDiag = a.split("|");
		dpjp = splitDiag[0];
		nama_poli = $('#inJenisPoli1').val();
		kelas = $('#inKelasRuangan1').val();
		tempat_tidur = $('#inTempatTidur1').val();
		biaya_jasa = $('#inBiayaDok1').val();
		biaya_rs = $('#inBiayaRS1').val();
		biaya_admin = $('#inBiayaAdm1').val();
		antrian = $('#inAntrian1').val();
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
				kelas: kelas,
				tempat_tidur: tempat_tidur,
				biaya_jasa: biaya_jasa,
				biaya_rs: biaya_rs,
				biaya_admin: biaya_admin,
				antrian: antrian,
			},
			success: function(data) {
				if (data.status == "success") {
					if (jenis_pelayanan == '2') {
						swal({
							title: "SELAMAT!",
							type: "success",
							text: "Silahkan Menuju Rekam Medis",
							confirmButtonColor: "#3cb878",
							confirmButtonText: "OK",
						}, function() {
							$().ready(function() {
								window.location.href = '<?php echo base_url() ?>Pencarian_pasien/cetak_antrian/' + antrian + '/' + nama_poli + '/' + total;
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
					$("#pencarian_pasien").load(location.href + "#pencarian_pasien");
					// $("#tambah_kunjungan").load(location.href +  "#tambah_kunjungan");
					nama = $('#inNama').val("");
					no_ktp = $('#inNoKtp').val("");
					if ($('#inJkLk').checked) {
						jk = $('#inJkLk').val("");
					} else {
						jk = $('#inJkPr').val("");
					}

					$('#inNama').val("");
					$('#inNoKtp').val("");
					$('#inJkLk').val("");
					$('#inJkPr').val("");
					$('#inNamaIbu').val("");
					$('#inNamaAyah').val("");
					$('#inTglLahir').val("");
					$('#inNamaKK').val("");
					$('#inAgama').val("");
					$('#inPendidikan').val("");
					$('#inStatus').val("");
					$('#inPekerjaan').val("");
					$('#inNoHp').val("");
					$('#inTelp').val("");
					$('#inUmur').val("");
					$('#inProv').val("");
					$('#inKota').val("");
					$('#inKec').val("");
					$('#inKel').val("");
					$('#inAlamat').val("");
					$('#inNoBpjs').val("");
					$('#inNoIdLain').val("");
					$('#inNoRm').val("");
					$('#inNoSEP1').val("");
					$('#inDiagnosa1').val("");
					$('#inKeterangan1').val("");
					$('#inDPJP1').val("");
					$('#inTanggalKunjugan1').val("");
					$('#inAsalPasien1').val("");
					$('#inCaraBayar1').val("");
					$('#inJenisPoli1').val("");
					$('#inKelasRuangan1').val("");
					$('#inTempatTidur1').val("");
					$('#inBiayaDok1').val("");
					$('#inBiayaRS1').val("");
					$('#inBiayaAdm1').val("");
					$('#inAntrian1').val("");
					$('#inTipeMasuk1').val("");
					$('#inTotal1').val("");

					$('#berhasil').html('');
					$("#tambah_kunjungan").collapse('hide');
					$("#modal_edit_pelayanan").modal('hide');
					$("#modal_edit_pelayanan").reload();
					$('#datable').DataTable().ajax.reload();

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
</script>

<script type="text/javascript">
	function check_rm() {
		urm = $('#inNoRm').val();
		console.log(urm);
		if (urm != '') {
			$.ajax({
				url: "<?php echo base_url(); ?>Pencarian_pasien/check_rm",
				method: "POST",
				data: {
					no_rm: urm
				},
				success: function(data) {
					$('#rm_result').html(data);
				}
			});
		}
	}
	$(document).ready(function() {
		$('#inKetPs').change(function() {
			var ket = $('#inKetPs').val();
			// alert(ket);
			if (ket == 'LAMA') {
				$("#inNoRm").removeAttr('disabled');
				$('#inNoRm').val("");
			} else {
				$('#inNoRm').attr("disabled", true);
				$('#inNoRm').val("<?php echo $max + 1; ?>");

			}
		});
		$('#inNoRm').ready(function() {
			urm = $('#inNoRm').val();
			console.log(urm);
			if (urm != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/check_rm",
					method: "POST",
					data: {
						no_rm: urm
					},
					success: function(data) {
						$('#rm_result').html(data);
					}
				});
			}
		});

		$('#inProv').change(function() {
			var prov = $('#inProv').val();
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
						$('#inKota').html(html);
						$('#inKec').html('<option value="">Pilih Kecamatan</option>');
						$('#inKel').html('<option value="">Pilih Kelurahan</option>');

					}
				});
			} else {
				$('#inKota').html('<option value="">Pilih Kota</option>');
				$('#inKec').html('<option value="">Pilih Kecamatan</option>');
				$('#inKel').html('<option value="">Pilih Kelurahan</option>');
			}
		});

		$('#inKota').change(function() {
			var kota = $('#inKota').val();
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
							html += '<option value="' + data[i].nm_kec + '">' + data[i].nm_kec + '</option>';
						}
						$('#inKec').html(html);
						$('#inKel').html('<option value="">Pilih Kelurahan</option>');
					}
				});
			} else {
				$('#inKec').html('<option value="">Pilih Kecamatan</option>');
				$('#inKel').html('<option value="">Pilih Kelurahan</option>');
			}
		});
		$('#inKec').change(function() {
			var kec = $('#inKec').val();
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
							html += '<option value="' + data[i].nm_desa + '">' + data[i].nm_desa + '</option>';
						}
						$('#inKel').html(html);
					}
				});
			} else {
				$('#inKel').html('<option value="">Pilih Kelurahan</option>');
			}
		});





		// pilih tindakan kunjungan pasien



		// pilih tindakan kunjungan pasien baru
		$('#inTipeMasuk1').change(function() {
			b = $('#inTipeMasuk1').val();
			splitDiagB = b.split("|");
			var tipe_masuk = splitDiagB[0];
			var poli = $('#inJenisPoli1').val();
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
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

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
						$('#inJenisPoli1').html(html);
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
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else {
				$('#inDPJP1').html('<option>-</option>');
				$('#inJenisPoli1').html('<option>-</option>');

			}
		});
		$('#inJenisPoli1').change(function() {
			var poli = $('#inJenisPoli1').val();
			if (poli == '111111') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == '146582') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == '15487956') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == '24QRNLX29R') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == '2JZ09X4K22') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == '6E975PL694') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == 'AX1520L18') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == 'E00RX703') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == 'HLGI4176K8') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == 'I9NXY5VNQG') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == 'MWK205D30K') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == 'O782EGU4PR') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == 'ODI8643C27') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == 'RZE28J1098') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);

					}
				});
			} else if (poli == 'UQ81K76373') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian1(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP1').html(html);
					}

				});

			} else {
				$('#inDPJP1').html('<option>-</option>');
			}


		});

		$('#inCaraBayar').change(function() {
			var cara_bayar = $('#inCaraBayar').val();
			var a = $("#inDPJP").val();
			splitDiag = a.split("|");

			if (cara_bayar == '30') { //bpjs
				$("#inBiayaRS").val(0);
				$('#inBiayaDok').val(splitDiag[3]);
				var a = $("#inBiayaRS").val();
				var b = parseInt(splitDiag[3]);
				var c = $('#inBiayaAdm').val();
				var total = Number(a) + Number(b) + Number(c);
				$("#inTotal").val(total);
			} else if (cara_bayar == '42') { //pp
				$("#inBiayaRS").val(splitDiag[4]);
				$('#inBiayaDok').val(splitDiag[1]);
				var a = parseInt(splitDiag[4]);
				var b = parseInt(splitDiag[1]);
				var c = $('#inBiayaAdm').val();
				var total = Number(a) + Number(b) + Number(c);
				$("#inTotal").val(total);
			} else { //asuransi
				$("#inBiayaRS").val(splitDiag[5]);
				$('#inBiayaDok').val(splitDiag[2]);
				var a = parseInt(splitDiag[5]);
				var b = parseInt(splitDiag[2]);
				var c = $('#inBiayaAdm').val();
				var total = Number(a) + Number(b) + Number(c);
				$("#inTotal").val(total);
			}

		});
		$('#inCaraBayar1').change(function() {
			var cara_bayar = $('#inCaraBayar1').val();
			var a = $("#inDPJP1").val();
			splitDiag = a.split("|");

			if (cara_bayar == '30') { //bpjs
				$("#inBiayaRS1").val(0);
				$('#inBiayaDok1').val(splitDiag[3]);
				var a = $("#inBiayaRS1").val();
				var b = parseInt(splitDiag[3]);
				var c = $("#inBiayaAdm1").val();
				var total = Number(a) + Number(b) + Number(c);
				$("#inTotal1").val(total);
			} else if (cara_bayar == '42') { //pp
				$("#inBiayaRS1").val(splitDiag[4]);
				$('#inBiayaDok1').val(splitDiag[1]);
				var a = parseInt(splitDiag[4]);
				var b = parseInt(splitDiag[1]);
				var c = $("#inBiayaAdm1").val();
				var total = Number(a) + Number(b) + Number(c);
				$("#inTotal1").val(total);
			} else { //asuransi
				$("#inBiayaRS1").val(splitDiag[5]);
				$('#inBiayaDok1').val(splitDiag[2]);
				var a = parseInt(splitDiag[5]);
				var b = parseInt(splitDiag[2]);
				var c = $("#inBiayaAdm1").val();
				var total = Number(a) + Number(b) + Number(c);
				$("#inTotal1").val(total);
			}
		});
		$('#inKelasRuangan1').change(function() {
			var kelas = $('#inKelasRuangan1').val();
			if (prov != '') {
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
						$('#inTempatTidur1').html(html);
					}
				});
			} else {
				$('#inTempatTidur1').html('<option value="">Pilih Kamar</option>');
			}
		});


	});
</script>
<script type="text/javascript">
	$(document).ready(function() {

		$('.data_tam').addClass('collapse');

		$('#inTipeMasuk1').change(function() {
			b = $('#inTipeMasuk1').val();
			splitDiagB = b.split("|");
			var selector = '.hide_' + splitDiagB[0];

			$('.data_tam').collapse('hide');

			$(selector).collapse('show');
		});
	});
</script>


<script>
	$('#inNoRm').keyup(function() {
		urm = $('#inNoRm').val();
		console.log(urm);
		if (urm != '') {
			$.ajax({
				url: "<?php echo base_url(); ?>Pencarian_pasien/check_rm",
				method: "POST",
				data: {
					no_rm: urm
				},
				success: function(data) {
					$('#rm_result').html(data);
				}
			});
		}
	});

	// Cek Data Pasien
	$('#btn_find_rm').click(function() {
		$('#datable').dataTable().fnClearTable();
		$('#datable').dataTable().fnDestroy();
		$('#notifnorm').html('');
		urm = $('#cari_data').val();
		if (urm.length > 1) {
			find_rm(urm);
		} else {
			if (urm != "") {
				html = '<b>Pencarian minimal harus 2 karakter</b>';
				$('#notifnorm').html(html);
			}
		}
	});

	$('#cari_data').keyup(function() {
		$('#datable').dataTable().fnClearTable();
		$('#datable').dataTable().fnDestroy();
		$('#notifnorm').html('');
		urm = $('#cari_data').val();
		if (urm.length > 1) {
			find_rm(urm);
		} else {
			if (urm != "") {
				html = '<b>Pencarian minimal harus 2 karakter</b>';
				$('#notifnorm').html(html);
			}
		}
	});

	function find_rm(urm) {
		$('#datable').DataTable({
			"retrieve": true,
			// "paging": false,
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
				"url": '<?php echo base_url('Pencarian_pasien/check_data'); ?>',
				"type": 'POST',
				"data": {
					cari_data: urm
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

	function cekAntrian1(poli) {
		$.ajax({
			url: "<?php echo base_url(); ?>Pencarian_pasien/getAntrian",
			method: "POST",
			data: {
				poli: poli
			},
			dataType: 'json',
			success: function(data) {
				$("#inAntrian1").val(data);
			}
		});
	}

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

	function refresh_rm() {
		no_rm = $('#inNoRm').val();

		$.ajax({
			url: "<?php echo base_url(); ?>Pencarian_pasien/getNoRM",
			method: "POST",
			data: {
				no_rm: no_rm
			},
			dataType: 'json',
			success: function(data) {

				$("#inNoRm").val(Number(data.max) + 1);
			}
		});
	}
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>