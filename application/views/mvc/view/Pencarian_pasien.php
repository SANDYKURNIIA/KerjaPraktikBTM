	<!-- Row -->
	<div class="panel panel-default card-view mt-20">

		<div class="panel-heading">
			<div class="pull-left">
				<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PENCARIAN PASIEN</span>
				</h6>
			</div>
			<button class="btn btn-primary btn-anim pull-right mr-30" data-toggle="modal" data-target=".modal-pendaftaranakun"><i class="icon-plus"></i><span class="btn-text">PASIEN
					BARU</span></button>


			<div class="clearfix"></div>
		</div>

		<div class="row ">
			<div class="col-md-9 mb-10" style="margin-top:30px;">
				<div class="form-group ">
					<label class="control-label col-md-3">NOMOR RM , NAMA, TANGGAL LAHIR</label>
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
									<th scope="col">NO</th>
									<th scope="col">PILIH</th>
									<th scope="col">NO RM</th>
									<th scope="col">NAMA PASIEN</th>
									<th scope="col">JENIS KELAMIN</th>
									<th scope="col">TANGGAL LAHIR</th>
									<th scope="col">UMUR</th>
									<th scope="col">KOTA</th>
									<th scope="col">ALAMAT</th>

								</tr>
							</thead>
							<tfoot>
								<tr class="bg-success">
									<th scope="col">NO</th>
									<th scope="col">PILIH</th>
									<th scope="col">NO RM</th>
									<th scope="col">NAMA PASIEN</th>
									<th scope="col">JENIS KELAMIN</th>
									<th scope="col">TANGGAL LAHIR</th>
									<th scope="col">UMUR</th>
									<th scope="col">KOTA</th>
									<th scope="col">ALAMAT</th>

								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- /Modal Tambah Pasien-->
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<!-- sample modal content -->
			<div class="modal fade modal-pendaftaranakun" id="modal_edit_pelayanan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> IDENTITAS
								PASIEN BARU</h5>
						</div>

						<div class="modal-body mt-20">
							<!-- Form body  -->

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
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">NAMA IBU KANDUNG</label>
											<div class="col-md-9 has-success">
												<input type="text" autocomplete="off" class="form-control  " placeholder="NAMA IBU" name="inNamaIbu" id="inNamaIbu" required>
												<span class="help-block"> </span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">NAMA AYAH KANDUNG</label>
											<div class="col-md-9 has-success">
												<input type="text" autocomplete="off" class="form-control  " placeholder="NAMA AYAH" name="inNamaAyah" id="inNamaAyah" required>
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
											<label class="control-label col-md-3">NAMA KEPALA KELUARGA</label>
											<div class="col-md-9 has-success">
												<input type="text" autocomplete="off" class="form-control  " placeholder="NAMA" name="inNamaKK" id="inNamaKK" required>
												<span class="help-block"> </span>
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
												<select class="form-control   select2" placeholder="Choose a Category" tabindex="1" name="inAgama" id="inAgama">
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
											<label class="control-label col-md-3">PENDIDIKAN</label>
											<div class="col-md-9 has-success">
												<select class="form-control   select2" placeholder="Choose a Category" tabindex="1" name="inPendidikan" id="inPendidikan">
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
								</div>

								<!-- /Row -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">STATUS</label>
											<div class="col-md-9 has-success">
												<select class="form-control   select2" name="inStatus" id="inStatus" required>
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
											<label class="control-label col-md-3">PEKERJAAN</label>
											<div class="col-md-9 has-success">
												<select class="form-control   select2" placeholder="Choose a Category" tabindex="1" name="inPekerjaan" id="inPekerjaan" required>
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
											<label class="control-label col-md-3">NO HP</label>
											<div class="col-md-9 has-success">
												<input type="number" autocomplete="off" class="form-control  " placeholder="NO HP" name="inNoHp" id="inNoHp" required>
												<span class="help-block"> </span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">NO HP 2</label>
											<div class="col-md-9 has-success">
												<input type="number" autocomplete="off" class="form-control  " placeholder="NO TLP" name="inTelp" id="inTelp" required>
												<span class="help-block"> </span>
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
												<select class="form-control   select2" placeholder="Choose a Category" tabindex="1" name="inProv" id="inProv" required>
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

												<select class="form-control   select2" placeholder="Pilih Kota" tabindex="1" name="inKota" id="inKota" required>


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
												<select class="form-control   select2" placeholder="Pilih Kecamatan" tabindex="1" name="inKec" id="inKec">


												</select>
												<span class="help-block"> </span>
											</div>
										</div>
									</div>
									<div class="col-md-6" id="outKel">
										<div class="form-group">
											<label class="control-label col-md-3">KELURAHAN</label>
											<div class="col-md-9 has-success">
												<select class="form-control   select2" placeholder="Pilih Kelurahan" tabindex="1" name="inKel" id="inKel">


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
											<label class="control-label col-md-3">NO IDENTITAS LAIN</label>
											<div class="col-md-9 has-success">
												<input type="text" autocomplete="off" class="form-control  " placeholder="NO IDENTITAS" name="inNoIdLain" id="inNoIdLain">
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
											<div class="col-md-6 has-error">
												<input type="text" class="form-control " placeholder="NO RM" name="inNoRm" id="inNoRm" value="<?php echo $max + 1; ?>">
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
																	<option class="active">-</option>
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
															<label class="control-label col-md-3">CARA BAYAR</label>
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


												<input type="hidden" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inBiayaRS1" name="inBiayaAdm" value=25000>

												<input type="hidden" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inBiayaDok1" name="inBiayaDok">

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

		<!-- /Modal identitas Akun -->
		<div class="panel-wrapper collapse in">
			<div class="panel-body">
				<!-- sample modal content -->
				<div class="modal fade" id="ModalEditPasien" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i>IDENTITAS PASIEN</h5>
							</div>
							<div class="modal-body">
								<div class="col-md-12" style="text-align:right;">
									<div id="btn_edit" class="col-md-12"></div>
								</div>
								<div class="clearfix"></div>
								<div class="form-body">
									<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>IDENTITAS</h6>
									<hr>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">NO RM:</label>
												<div class="col-md-9 has-error">
													<input type="text" name="no_rm" class="form-control filled-input" disabled="" id="no_rm">
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
													<input type="text" name="inNamaPasien" class="form-control filled-input" disabled="" id="inNamaPasien">

													<span class="help-block"></span>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">UMUR:</label>
												<div class="col-md-9 has-error">
													<input type="text" name="inUmur1" class="form-control filled-input" disabled="" id="inUmur1">

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
													<input type="text" name="inNamaIbu1" class="form-control filled-input" disabled="" id="inNamaIbu1">
													<span class="help-block"></span>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">NAMA AYAH:</label>
												<div class="col-md-9 has-error">
													<input type="text" name="inNamaAyah1" class="form-control filled-input" disabled="" id="inNamaAyah1">
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
													<input type="text" name="inKtp" class="form-control filled-input" disabled="" id="inKtp">
													<span class="help-block"></span>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">TANGGAL LAHIR:</label>
												<div class="col-md-9 has-error">
													<input type="text" name="inTglLahir1" class="form-control filled-input" disabled="" id="inTglLahir1">
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
													<input type="text" name="inKepalaKeluarga" class="form-control filled-input" disabled="" id="inKepalaKeluarga">
													<span class="help-block"></span>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">AGAMA:</label>
												<div class="col-md-9 has-error">
													<input type="text" name="inAgama1" class="form-control filled-input" disabled="" id="inAgama1">
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
													<input type="text" name="inPendidikan1" class="form-control filled-input" disabled="" id="inPendidikan1">
													<span class="help-block"></span>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">STATUS:</label>
												<div class="col-md-9 has-error">
													<input type="text" name="status" class="form-control filled-input" disabled="" id="status">
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
													<input type="text" name="inNoHp1" class="form-control filled-input" disabled="" id="inNoHp1">
													<span class="help-block"></span>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">TELEPON / HP:</label>
												<div class="col-md-9 has-error">
													<input type="text" name="inTelp1" class="form-control filled-input" disabled="" id="inTelp1">
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
													<input type="text" name="inPekerjaan1" class="form-control filled-input" disabled="" id="inPekerjaan1">
													<span class="help-block"></span>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">JENIS KELAMIN :</label>
												<div class="col-md-9 has-error">
													<input type="text" name="inJK" class="form-control filled-input" disabled="" id="inJK">
													<span class="help-block"></span>
												</div>
											</div>
										</div>
									</div>
									<!-- </div> -->
									<!-- /Row -->
									<h6 class="txt-dark capitalize-font"><i class="icon-notebook mr-10"></i>ALAMAT</h6>
									<hr>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">ALAMAT:</label>
												<div class="col-md-9 has-error">
													<input type="text" name="inAlamat1" class="form-control filled-input" disabled="" id="inAlamat1">
													<span class="help-block"></span>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">KELURAHAN:</label>
												<div class="col-md-9 has-error">
													<input type="text" name="inKel1" class="form-control filled-input" disabled="" id="inKel1">
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
													<input type="text" name="inKota1" class="form-control filled-input" disabled="" id="inKota1">
													<span class="help-block"></span>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">PROVINSI:</label>
												<div class="col-md-9 has-error">
													<input type="text" name="inProv1" class="form-control filled-input" disabled="" id="inProv1">
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
												<label class="control-label col-md-3">KECAMATAN:</label>
												<div class="col-md-9 has-error">
													<input type="text" name="inKec1" class="form-control filled-input" disabled="" id="inKec1">
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
													<input type="text" name="inNoBPJS" class="form-control filled-input" disabled="" id="inNoBPJS">
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
													<input type="text" name="tgl_masuk" class="form-control filled-input" disabled="" id="inTglMasuk" />
												</div>
											</div>
										</div>
										<!--/span-->
									</div>
								</div>
								<div class="modal-footer">
									<div class="form-actions mt-18">
										<div class="row vertical-align-middle">
											<div id="riwayat" class="col-md-3"></div>
											<div id="tambah_kunjungan1" class="col-md-3"></div>
											<div id="poli_sore" class="col-md-3"></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-wrap ">
											<div class="collapse" id="collap_tambah_kunjungan">
												<!-- /formbody -->
												<div class="form-body mt-20">
													<h6 class="txt-dark capitalize-font "><i class="icon-user mr-10"></i>TAMBAH DATA KUNJUNGAN</h6>
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
																<label class="control-label col-md-3">CARA
																	BAYAR</label>
																<div class="col-md-9 has-success">
																	<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inCaraBayar" name="inCaraBayar">
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
																	<input type="text" class="form-control filled-input" placeholder="NO SEP" name="inNoSEP" id="inNoSEP">

																</div>
															</div>
														</div>
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
																</div>
															</div>
														</div>
														<!--/span-->
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
													<div align="right">

														<!--/span-->
														<span class="help-block"></span>
														<button class="btn btn-success btn-anim  btn-sm" onclick="insertData()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>

													</div>
													<!-- /Row -->
												</div>
												<!-- /formbody -->
											</div>
											<div class="collapse" id="collap_poli_sore">
												<!-- /formbody -->
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
																	<label class="control-label col-md-3">NO ANTRIAN</label>
																	<div class="col-md-9 has-success">
																		<input type="text" class="form-control" id="inAntrian2" disabled>
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
														<button class="btn btn-success btn-anim  btn-sm" onclick="insertPoliSore()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>

													</div>
													<!-- /Row -->
												</div>
												<!-- /formbody -->
											</div>
											<!-- Riwayat Kunjungan -->
											<div class="collapse" id="riwayat_kunjungan">
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
																				<div class="col-md-9 has-error">
																					<input type="text" class="form-control" id="no_riwayat" disabled="">
																				</div>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group ">
																				<label class="control-label col-md-3">NAMA PASIEN</label>
																				<div class="col-md-9 has-error">
																					<input type="text" class="form-control" disabled="" id="inNamaPasienRiwayat">

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
																	<div class="table-responsive table-s8">
																		<table id="tb_riwayat" class="table table-hover display">
																			<thead>
																				<tr class="bg-success">
																					<th>NO</th>
																					<th>TANGGAL MASUK</th>
																					<th>TANGGAL KELUAR</th>
																					<th>UNIT</th>
																					<th>CARA BAYAR</th>
																					<th>DIAGNOSA</th>
																					<th>STATUS</th>
																				</tr>
																			</thead>
																			<tfoot>
																				<tr class="bg-success">
																					<th>NO</th>
																					<th>TANGGAL MASUK</th>
																					<th>TANGGAL KELUAR</th>
																					<th>UNIT</th>
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

	</div>





	<!-- Modal Edit Pasien -->
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
												<input type="text" class="form-control filled-input" placeholder="NO RM" name="inNoRm" id="upNoRm">
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
												<input type="text" autocomplete="off" class="form-control filled-input" placeholder="NAMA" name="inNama" id="upNama">

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
												<input type="text" autocomplete="off" class="form-control filled-input" placeholder="NO KTP" name="inNoKtp" id="upNoKtp">
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

															<input type="radio" value="LAKI-LAKI" name="upJk" id="upJkLk">
															<label for="radio_9">LAKI-LAKI</label>
														</span>
													</div>
													<div class="radio-inline pl-0">
														<span class="radio radio-info">
															<input type="radio" value="PEREMPUAN" name="upJk" id="upJkPr">
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
												<input type="text" autocomplete="off" class="form-control filled-input" placeholder="NAMA IBU" name="inNamaIbu" id="upNamaIbu">
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
												<input type="text" autocomplete="off" class="form-control filled-input" placeholder="NAMA AYAH" name="inNamaAyah" id="upNamaAyah">

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
												<input type="date" autocomplete="off" placeholder="TANGGAL LAHIR" id="upTglLahir" name="inTglLahir1" data-toggle="datepicker" class="form-control filled-input">
											</div>
										</div>
									</div>

									<!--/span-->
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">NAMA
												KEPALA KELUARGA</label>
											<div class="col-md-9 has-success">
												<input type="text" autocomplete="off" class="form-control filled-input" placeholder="NAMA" name="inNamaKK" id="upNamaKK">
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
														<option value="<?php echo $row["nama"]; ?>">
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
														<option value="<?php echo $row["nama"]; ?>">
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
												2</label>
											<div class="col-md-9 has-success">
												<input type="text" autocomplete="off" class="form-control filled-input" placeholder="NO TLP" name="inTelp" id="upTelp">
												<span class="help-block"> </span>
											</div>
										</div>
									</div>
									<!--/span-->
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">NO
												HP</label>
											<div class="col-md-9 has-success">
												<input type="text" autocomplete="off" class="form-control filled-input" placeholder="NO HP" name="inNoHp" id="upNoHp">
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
														<option value="<?php echo $row["nm_prov"]; ?>">
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
														<option value="<?php echo $row["nm_kab"]; ?>">
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
														<option value="<?php echo $row["nm_kec"]; ?>">
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
														<option value="<?php echo $row["nm_desa"]; ?>">
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
												<input type="text" autocomplete="off" class="form-control filled-input" name="inAlamat" id="upAlamat">

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
												<input type="text" autocomplete="off" class="form-control filled-input" placeholder="NO BPJS / KIS" name="inNoBpjs" id="upNoBpjs">
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
												<input type="text" autocomplete="off" class="form-control filled-input" placeholder="NO IDENTITAS" name="inNoIdLain" id="upNoIdLain">
												<span class="help-block"> </span>
											</div>
										</div>
									</div>
								</div>
								<div align="right">

									<button type="submit" class="btn btn-success btn-anim  btn-sm" onclick="update_pasien()" style="margin-right: 40px;"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										<div></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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


		function riwayat() {
			$().ready(function() {
				reload_riwayat();
				$("#riwayat_kunjungan").collapse('show');
			});
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
			// if ($('#inJkLk').checked ) { 
			// 	jk="LAKI-LAKI";
			// }else { 
			// 	jk="PEREMPUAN";
			// }
			jk = $('input#inJkLk:checked').val() ? 'LAK-LAKI' : 'PEREMPUAN';
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
						$("#ModalEditPasien").modal('hide');
						$('#datable').DataTable().ajax.reload();
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
		function tampilUmur(elem) {
			a = new Date(elem.value);
			var diff_ms = Date.now() - a.getTime();
			var age_dt = new Date(diff_ms);
			document.getElementById("inUmur").value = Math.abs(age_dt.getUTCFullYear() - 1970) + " Tahun";
		}

		function edit_pasien(no_rm) {
			$.ajax({
				url: "<?= base_url() . 'Pencarian_pasien/getDataPasien' ?>",
				data: {
					pasien: no_rm,
				},
				type: 'POST',
				dataType: 'json',
				success: function(data) {
					if (data.status_dt == "found") {
						$("#no_rm").val(data.no_rm);
						// $("#jenis_pel").val(data.jenis_pelayanan);
						$("#no_riwayat").val(data.no_rm);
						$("#no_kunjungan").val(data.no_rm);
						$("#upNoRm").val(data.no_rm);
						$("#inNamaPasien").val(data.nama);
						$("#inNamaPasienRiwayat").val(data.nama);
						$("#upNama").val(data.nama);
						var dob = new Date(data.tgl_lahir);
						var today = new Date();
						var umur = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
						$("#inUmur1").val(umur);
						$("#upUmur").val(umur);
						$("#inNamaIbu1").val(data.nama_ibu);
						$("#upNamaIbu").val(data.nama_ibu);
						$("#inNamaAyah1").val(data.nama_ayah);
						$("#upNamaAyah").val(data.nama_ayah);
						$("#inKtp").val(data.no_ktp);
						$("#upNoKtp").val(data.no_ktp);
						var tgl_lahir = new Date(data.tgl_lahir),
							options = {
								// weekday: 'long',
								month: 'short',
								day: 'numeric',
								year: 'numeric'
							};
						var date = tgl_lahir.toLocaleString('id-ID', options);
						$("#inTglLahir1").val(date);
						$("#upTglLahir").val(data.tgl_lahir).change();
						$("#inKepalaKeluarga").val(data.nama_kepala_keluarga);
						$("#upNamaKK").val(data.nama_kepala_keluarga);
						$("#inAgama1").val(data.agama);
						$("#upAgama").val(data.agama).change();
						$("#inPendidikan1").val(data.pendidikan);
						$("#upPendidikan").val(data.pendidikan).change();
						$("#status").val(data.status);
						$("#upStatus").val(data.status).change();
						$("#inNoHp1").val(data.no_hp);
						$("#upNoHp").val(data.no_hp);
						$("#inTelp1").val(data.telp);
						$("#upTelp").val(data.telp);
						$("#inPekerjaan1").val(data.pekerjaan);
						$("#upPekerjaan").val(data.pekerjaan).change();
						// $('input:radio[name=upJK][value='+data.jenis_kelamin+']')[0].checked = true;
						if (data.jenis_kelamin == 'LAKI-LAKI') {
							$('#upJkLk').prop('checked', true);
						} else {
							$('#upJkPr').prop('checked', true);
						}
						// $('input#upJkLk:checked').val(data.jenis_kelamin) ? 'LAK-LAKI' : 'PEREMPUAN';
						
						$("#inAlamat1").val(data.alamat);
						$("#upAlamat").val(data.alamat);
						$("#inKel1").val(data.kelurahan);
						$("#upKel").val(data.kelurahan).change();
						$("#inKota1").val(data.kota);
						$("#upKota").val(data.kota).change();
						$("#inKec1").val(data.kecamatan);
						$("#upKec").val(data.kecamatan).change();
						$("#inProv1").val(data.provinsi);
						$("#upProv").val(data.provinsi).change();
						$("#inNoBPJS").val(data.no_bpjs);
						$("#upNoBPJS").val(data.no_bpjs);
						if (data.tgl_masuk != null) {
							$("#inTglMasuk").val(data.tgl_masuk);
						} else {
							$("#inTglMasuk").val("-");
						}
						no_rm = $("#no_rm").val();
						var html = '';
						var html1 = '';
						var html2 = '';

						html = '<button data-toggle="collapse" data-target="#collap_tambah_kunjungan" aria-expanded="false" aria-controls="tambah_kunjungan" class="btn btn-success btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">+ KUNJUNGAN</span>';
						html1 = '<a class="btn btn-danger btn-anim btn-sm" data-toggle="collapse" onclick="riwayat()" style="margin-right: 40px;"><i class="icon-rocket"></i><span class="btn-text">RIWAYAT KUNJUNGAN</span></a>';
						html2 = '<div class="btn btn-danger btn-icon-anim btn-square" data-toggle="modal" onclick="editPasien()" style="margin-right: 40px;"><i class="fa fa-pencil"></i>';
						html3 = '<button data-toggle="collapse" data-target="#collap_poli_sore" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">+ POLI SORE</span>';
						$('#tambah_kunjungan1').html(html);
						$('#poli_sore').html(html3);
						$('#btn_edit').html(html2);
						$('#riwayat').html(html1);

						$("#ModalEditPasien").modal('show');
					} else {
						alert("data tidak ditemukan");
					}
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
			kelas = $('#inKelasRuangan').val();
			tempat_tidur = $('#inTempatTidur').val();
			biaya_jasa = $('#inBiayaDok').val();
			biaya_rs = $('#inBiayaRS').val();
			biaya_admin = $('#inBiayaAdm').val();
			antrian = $('#inAntrian').val();
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
						swal({
							title: "good job!",
							type: "success",
							text: "Data Berhasil ditambahkan",
							confirmButtonColor: "#3cb878",
						});
						$("#collap_tambah_kunjungan").collapse('hide');
						$("#ModalEditPasien").modal('hide');
						$("#ModalEditPasien").reload();
						$('#datable').DataTable().ajax.reload();
						$('#inNoSEP').val("");
						$('#inDiagnosa').val("");
						$('#inKeterangan').val("");
						$('#inDPJP').val('-').change();
						$('#inAsalPasien').val('-').change();
						$('#inCaraBayar').val('-').change();
						$('#inJenisPoli').val('-').change();
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
						swal({
							title: "good job!",
							type: "success",
							text: "Data Berhasil ditambahkan",
							confirmButtonColor: "#3cb878",
						});
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
						swal({
							title: "good job!",
							type: "success",
							text: "Data Berhasil ditambahkan",
							confirmButtonColor: "#3cb878",
						});
						
						$('#inNoSEP2').val("");
						$('#inDiagnosa2').val("");
						$('#inKeterangan2').val("");
						$('#inDPJP2').val("");
						$('#inTanggalKunjugan2').val("");
						$('#inAsalPasien2').val("");
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

						$("#collap_tambah_kunjungan").collapse('hide');
						$("#collap_poli_sore").collapse('hide');
						$("#ModalEditPasien").modal('hide');
						$("#ModalEditPasien").reload();
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
		$(document).ready(function() {

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
								html += '<option value=' + data[i].nm_kab + '>' + data[i].nm_kab + '</option>';
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
								html += '<option value=' + data[i].nm_kec + '>' + data[i].nm_kec + '</option>';
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
								html += '<option value=' + data[i].nm_desa + '>' + data[i].nm_desa + '</option>';
							}
							$('#inKel').html(html);
						}
					});
				} else {
					$('#inKel').html('<option value="">Pilih Kelurahan</option>');
				}
			});



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
								html += '<option value=' + data[i].nm_kab + '>' + data[i].nm_kab + '</option>';
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

			// pilih tindakan kunjungan pasien

			$('#inTipeMasuk').change(function() {
				b = $('#inTipeMasuk').val();
				splitDiagB = b.split("|");
				var tipe_masuk = splitDiagB[0];
				var cara_bayar = $('#inCaraBayar').val();
				var poli = $('#inJenisPoli').val();
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
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
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
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else {
					$('#inDPJP').html('<option>-</option>');
					$('#inJenisPoli').html('<option>-</option>');

				}
			});


			//Poli tujuan
			$('#inJenisPoli').change(function() {
				var poli = $('#inJenisPoli').val();
				if (poli == '111111') {
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
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);

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
							cekAntrian(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);

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
							cekAntrian(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);

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
							cekAntrian(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);

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
							cekAntrian(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);

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
							cekAntrian(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);

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
							cekAntrian(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);

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
							cekAntrian(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);

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
							cekAntrian(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);

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
							cekAntrian(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);

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
							cekAntrian(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);

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
							cekAntrian(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);

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
							cekAntrian(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);

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
							cekAntrian(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);

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
							cekAntrian(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else {
					$('#inDPJP').html('<option>-</option>');
				}
			});

			$('#inCaraBayar').change(function() {
				var cara_bayar = $('#inCaraBayar').val();
				var a = $("#inDPJP").val();
				splitDiag = a.split("|");

				if (cara_bayar == 'WA14BJ84') { //bpjs
					$("#inBiayaRS").val(0);
					$('#inBiayaDok').val(splitDiag[3]);
					var a = $("#inBiayaRS").val();
					var b = parseInt(splitDiag[3]);
					var c = $('#inBiayaAdm').val();
					var total = Number(a) + Number(b) + Number(c);
					$("#inTotal").val(total);
				} else if (cara_bayar == '65AP55') { //pp
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


			$('#inCaraBayar1').change(function() {
				var cara_bayar = $('#inCaraBayar1').val();
				var a = $("#inDPJP1").val();
				splitDiag = a.split("|");

				if (cara_bayar == 'WA14BJ84') { //bpjs
					$("#inBiayaRS1").val(0);
					$('#inBiayaDok1').val(splitDiag[3]);
					var a = $("#inBiayaRS1").val();
					var b = parseInt(splitDiag[3]);
					var c = $("#inBiayaAdm1").val();
					var total = Number(a) + Number(b) + Number(c);
					$("#inTotal1").val(total);
				} else if (cara_bayar == '65AP55') { //pp
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
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
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
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
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
				if (poli == '111111') {
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
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP2').html(html);

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
							cekAntrian2(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP2').html(html);

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
							cekAntrian2(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP2').html(html);

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
							cekAntrian2(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP2').html(html);

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
							cekAntrian2(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP2').html(html);

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
							cekAntrian2(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP2').html(html);

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
							cekAntrian2(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP2').html(html);

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
							cekAntrian2(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP2').html(html);

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
							cekAntrian2(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP2').html(html);

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
							cekAntrian2(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP2').html(html);

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
							cekAntrian2(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP2').html(html);

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
							cekAntrian2(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP2').html(html);

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
							cekAntrian2(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP2').html(html);

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
							cekAntrian2(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP2').html(html);

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
							cekAntrian2(poli);
							var html = '';
							var i;
							html = '<option>-</option>';
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
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
					$("#inBiayaRS2").val(splitDiag[5]);
					$('#inBiayaDok2').val(splitDiag[2]);
					var a = parseInt(splitDiag[5]);
					var b = parseInt(splitDiag[2]);
					var c = $("#inBiayaAdm2").val();
					var total = Number(a) + Number(b) + Number(c);
					$("#inTotal2").val(total);
				}
			});
			$('#inKelasRuangan2').change(function() {
				var kelas = $('#inKelasRuangan2').val();
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
							$('#inTempatTidur2').html(html);
						}
					});
				} else {
					$('#inTempatTidur2').html('<option value="">Pilih Kamar</option>');
				}
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {


			$('.data_hide').addClass('collapse');

			$('#inTipeMasuk').change(function() {
				b = $('#inTipeMasuk').val();
				splitDiagB = b.split("|");

				var selector = '.data_hide_' + splitDiagB[0];

				$('.data_hide').collapse('hide');

				$(selector).collapse('show');
			});


			$('.data_tam').addClass('collapse');

			$('#inTipeMasuk1').change(function() {
				b = $('#inTipeMasuk1').val();
				splitDiagB = b.split("|");
				var selector = '.hide_' + splitDiagB[0];

				$('.data_tam').collapse('hide');

				$(selector).collapse('show');
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


	<script>
		function reload_riwayat() {
			// var table;
			$('#tb_riwayat').dataTable().fnClearTable();
			$('#tb_riwayat').dataTable().fnDestroy();
			// jenis_pelayanan = $('#jenis_pel').val();
			// alert(jenis_pelayanan);
			// jenis pelayanan nya ndak kelaur kak
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
			if (urm.length > 3) {
				find_rm(urm);
			} else {
				if (urm != "") {
					html = '<b>Pencarian minimal harus 4 karakter</b>';
					$('#notifnorm').html(html);
				}
			}
		});

		$('#cari_data').keyup(function() {
			$('#datable').dataTable().fnClearTable();
			$('#datable').dataTable().fnDestroy();
			$('#notifnorm').html('');
			urm = $('#cari_data').val();
			if (urm.length > 3) {
				find_rm(urm);
			} else {
				if (urm != "") {
					html = '<b>Pencarian minimal harus 4 karakter</b>';
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
				url: "<?php echo base_url(); ?>Kunjungan/getAntrian",
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