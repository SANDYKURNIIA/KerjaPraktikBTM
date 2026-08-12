<<<<<<< HEAD
<!-- Row -->
<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN RAWAT JALAN /
					UGD</span></h6>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="table-wrap">
				<div class="table-responsive">
					<table id="datable" class="table table-hover display  pb-30">
						<thead>
							<tr class="bg-success">
								<th>NO</th>
								<th>TINDAKAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>TANGGAL MASUK</th>
								<th>JAM MASUK</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLIKLINIK / RUANG</th>
								<th>DPJP</th>
								<th>JENIS KLAIM</th>
								<th>KETERANGAN</th>
								<th>NO SEP</th>
								<th>DIAGNOSA</th>
								<th>AGAMA</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>TINDAKAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>TANGGAL MASUK</th>
								<th>JAM MASUK</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLIKLINIK / RUANG</th>
								<th>DPJP</th>
								<th>JENIS KLAIM</th>
								<th>KETERANGAN</th>
								<th>NO SEP</th>
								<th>DIAGNOSA</th>
								<th>AGAMA</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- POLI THT -->
	<div class="modal fade bs-example-modal-lg" id="modal_edit_tht" role="dialog" aria-labelledby="myLargeModalLabel"
		aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN LABOR
						RAWAT JALAN | POLI THT
					</h5>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6 mb-20 mt-10">
							<div class="form-group ">
								<label class="control-label col-md-3">NAMA PASIEN</label>
								<div class="col-md-9 has-success">
									<input type="text" class="form-control" disabled id="inNamaPasien">
								</div>
							</div>
						</div>

						<div class="col-md-6 mb-20 mt-10">
							<div class="form-group ">
								<label class="control-label col-md-3">UMUR PASIEN</label>
								<div class="col-md-9 has-success">
									<input type="text" class="form-control" disabled id="inUmurPasien">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="modal-body mt-5">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
							<hr width="95%">
							<div class="table-wrap" style="width: 95%; margin: auto ">
								<div class="table-responsive">
									<table class="table table-hover display pb-60" id="tablelabor">
										<thead>
											<tr class="bg-success">
												<th>NO</th>
												<th>AKSI</th>
												<th>STATUS</th>
												<th>NAMA TINDAKAN</th>
												<th>TANGGAL TINDAKAN</th>
												<th>BIAYA TINDAKAN </th>
												<th>JUMLAH TINDAKAN</th>
												<th>STAFF REQUEST</th>
												<th>STAFF KONFIRMASI</th>
											</tr>
										</thead>
										<tfoot>
											<tr class="bg-success">
												<th>NO</th>
												<th>AKSI</th>
												<th>STATUS</th>
												<th>NAMA TINDAKAN</th>
												<th>TANGGAL TINDAKAN</th>
												<th>BIAYA TINDAKAN </th>
												<th>JUMLAH TINDAKAN</th>
												<th>STAFF REQUEST</th>
												<th>STAFF KONFIRMASI</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-8">
							</div>
							<div class="col-md-4 pull-right mt-20">
								<div class="table-wrap" style="width: 85%; margin-bottom:40px;">
									<div class="table-responsive ">
										<table class="table table-hover display " id="outTotalHargaRadiologi">
											<thead>
												<tr class="bg-success">
													<th style="font-weight:bold;">Total Keseluruhan</th>
												</tr>
											</thead>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Darah Rutin -->
					<div class="collapse" id="isiDarahRutin">
						<div class="form-body mb-30">
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<h6 class="txt-dark capitalize-font pl-15">NAMA TINDAKAN </h6>
												<div class="col-md-9 has-error">
													<input type="text" class="form-control" id="inNama" disabled>
													<input type="hidden" class="form-control" id="id_tindakan_laborDarahRutin" disabled>
												</div>
											</div>
										</div>
									<div class="col-md-6 has-success">
										<h6 class="txt-dark capitalize-font pl-5">FROM JENIS UMUR</h6>
										<select class="pull-left form-control has-success" placeholder="Choose a Category" id="inTipeMasukDarah">
												<option value="0">-</option>
												<option value="1">Normal</option>
												<option value="2">Anak | 1 Tahun - 16 Tahun</option>
												<option value="3">Bayi | 40 Hari - 12 Bulan</option>
												<option value="4">Bayi | 1 Hari - 31 Hari</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<h6 class="txt-dark capitalize-font pl-15 mt-15">UMUR</h6>
												<div class="col-md-9 has-error">
													<input type="text" class="form-control" id="inNama" disabled>
												</div>
											</div>
										</div>
								</div>
								
							</div>
						</div>

						<div class="data_hide_darah data_hide_darah_1"> <!-- FORM DARAH RUTIN NORMAL -->
							<div class="form-body mb-30">
								<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
								</h6>
								<hr width="95%">

								<div class="row mt-10">
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">HB</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inHB">
												<p id="notifinHB" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">LEUKOSIT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inLEUKOSIT">
												<p id="notifinLEUKOSIT" style="font-size:12px; margin-top:5px;">
												</p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">TROMBOSIT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inTROMBOSIT">
												<p id="notifinTROMBOSIT"
													style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">HEMATOKRIT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inHEMATOKRIT">
												<p id="notifinHEMATOKRIT"
													style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
								</div>
								<span class="help-block"></span>


								<div class="row">
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">ERITROSIT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inERITROSIT">
												<p id="notifinERITROSIT"
													style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">MCV</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inMCV">
												<p id="notifinMCV" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6 mt-10">
										<div class="form-group ">
											<label class="control-label col-md-3">MCH</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inMCH">
												<p id="notifinMCH" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6 mt-10">
										<div class="form-group ">
											<label class="control-label col-md-3">MCHC</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inMCHC">
												<p id="notifinMCHC" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6 mt-10">
										<div class="form-group ">
											<label class="control-label col-md-3">RDW-CV</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inRDW-CV">
												<p id="notifinRDW-CV" style="font-size:12px; margin-top:5px;">
												</p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6 mt-10">
										<div class="form-group ">
											<label class="control-label col-md-3">RDW-SD</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inRDW-SD">
												<p id="notifinRDW-SD" style="font-size:12px; margin-top:5px;">
												</p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

								</div>

								<div class="row">
									<div class="col-md-6 mt-20">
										<label class="control-label col-md-3 pt-20">HITUNG JENIS</label>
										<div class="form-group ">
											<div class="col-md-9 has-success">
												<div class="row">
													<div class="col-md-6">
														<label class="control-label col-md-3"
															style="color:black">BAS</label>
														<input type="text" class="form-control" id="inBAS">
														<p id="notifinBAS"
															style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>

														<label class="control-label col-md-3"
															style="color:black">EOS</label>
														<input type="text" class="form-control" id="inEOS">
														<p id="notifinEOS"
															style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>
													</div>
													<div class="col-md-6">
														<label class="control-label col-md-3"
															style="color:black">MONO</label>
														<input type="text" class="form-control" id="inMONO">
														<p id="notifinMONO"
															style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>

														<label class="control-label col-md-3"
															style="color:black">SEGMEN</label>
														<input type="text" class="form-control" id="inSEGMEN">
														<p id="notifinSEGMEN"
															style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>
													</div>
													<div class="col-md-6">
														<label class="control-label col-md-3"
															style="color:black">LYMPO</label>
														<input type="text" class="form-control" id="inLYMPO">
														<p id="notifinLYMPO"
															style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6 mt-40">
										<div class="form-group">
											<button onclick="insert_darah_rutin()"
												class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
													class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="data_hide_darah data_hide_darah_2"> <!-- FORM DARAH RUTIN Anak | 1 Tahun - 16 Tahun -->
							<div class="form-body mb-30">
								<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
								</h6>
								<hr width="95%">

								<div class="row mt-10">
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">HB</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inHB">
												<p id="notifinHB" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">LEUKOSIT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inLEUKOSIT">
												<p id="notifinLEUKOSIT" style="font-size:12px; margin-top:5px;">
												</p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">TROMBOSIT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inTROMBOSIT">
												<p id="notifinTROMBOSIT"
													style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">HEMATOKRIT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inHEMATOKRIT">
												<p id="notifinHEMATOKRIT"
													style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
								</div>
								<span class="help-block"></span>


								<div class="row">
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">ERITROSIT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inERITROSIT">
												<p id="notifinERITROSIT"
													style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">MCV</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inMCV">
												<p id="notifinMCV" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6 mt-10">
										<div class="form-group ">
											<label class="control-label col-md-3">MCH</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inMCH">
												<p id="notifinMCH" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6 mt-10">
										<div class="form-group ">
											<label class="control-label col-md-3">MCHC</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inMCHC">
												<p id="notifinMCHC" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6 mt-10">
										<div class="form-group ">
											<label class="control-label col-md-3">RDW-CV</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inRDW-CV">
												<p id="notifinRDW-CV" style="font-size:12px; margin-top:5px;">
												</p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6 mt-10">
										<div class="form-group ">
											<label class="control-label col-md-3">RDW-SD</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inRDW-SD">
												<p id="notifinRDW-SD" style="font-size:12px; margin-top:5px;">
												</p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

								</div>

								<div class="row">
									<div class="col-md-6 mt-20">
										<label class="control-label col-md-3 pt-20">HITUNG JENIS</label>
										<div class="form-group ">
											<div class="col-md-9 has-success">
												<div class="row">
													<div class="col-md-6">
														<label class="control-label col-md-3"
															style="color:black">BAS</label>
														<input type="text" class="form-control" id="inBAS">
														<p id="notifinBAS"
															style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>

														<label class="control-label col-md-3"
															style="color:black">EOS</label>
														<input type="text" class="form-control" id="inEOS">
														<p id="notifinEOS"
															style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>
													</div>
													<div class="col-md-6">
														<label class="control-label col-md-3"
															style="color:black">MONO</label>
														<input type="text" class="form-control" id="inMONO">
														<p id="notifinMONO"
															style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>

														<label class="control-label col-md-3"
															style="color:black">SEGMEN</label>
														<input type="text" class="form-control" id="inSEGMEN">
														<p id="notifinSEGMEN"
															style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>
													</div>
													<div class="col-md-6">
														<label class="control-label col-md-3"
															style="color:black">LYMPO</label>
														<input type="text" class="form-control" id="inLYMPO">
														<p id="notifinLYMPO"
															style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6 mt-40">
										<div class="form-group">
											<button onclick="insert_darah_rutin()"
												class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
													class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
					<!-- End Darah Rutin -->

					<!-- Darah GOL DARAH -->
					<div class="collapse" id="isiGOL-DARAH">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaDarah" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborGOL-DARAH" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">GOLONGAN DARAH</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inGOLDARAH">
											<p id="notifinGOLDARAH" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_gol_darah()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>

						</div>
					</div>
					<!-- End GOL DARAH -->

					<!-- LED -->
					<div class="collapse" id="isiLED">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaLED" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborLED" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">LED</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inLED">
											<p id="notifinLED" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_led()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End LED -->

					<!-- RHESUS -->
					<div class="collapse" id="isiRHESUS">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaRHESUS" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborRHESUS" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">RHESUS</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inRHESUS">
											<p id="notifinRHESUS" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_rhesus()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End RHESUS -->

					<!-- BLT -->
					<div class="collapse" id="isiBLT">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaBLT" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborBLT" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">BLT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inBLT">
											<p id="notifinBLT" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_blt()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End BLT -->

					<!-- CLT -->
					<div class="collapse" id="isiCLT">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaCLT" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborCLT" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">CLT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inCLT">
											<p id="notifinCLT" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_clt()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End CLT -->

					<!-- APTT -->
					<div class="collapse" id="isiAPTT">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaAPTT" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborAPTT" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">APTT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inAPTT">
											<p id="notifinAPTT" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_aptt()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End APTT -->

					<!-- PT (LUAR) -->
					<div class="collapse" id="isiPT">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaPT" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborPT" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_pt()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End PT -->

					<!-- GULDARAH -->
					<div class="collapse" id="isiGULDARAH">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaGULDARAH" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborGULDARAH" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>
							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">PUASA</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inPUASA">
											<p id="notifinPUASA" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">2 JAM PP</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="in2JAMPP">
											<p id="notifin2JAMPP" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>
							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">SEWAKTU</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inSEWAKTU">
											<p id="notifinSEWAKTU" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
										<div class="form-group">
											<button onclick="insert_guldarah()"
												class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
													class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										</div>
								</div>
							</div>
						</div>
						<!-- End GULDARAH -->
					</div>

					<!-- HBA -->
					<div class="collapse" id="isiHBA">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaHBA" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborHBA" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">HBA</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inHBA">
											<p id="notifinHBA" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_hba()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End HBA -->

					<!-- URIC ACID-->
					<div class="collapse" id="isiURIC">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaURIC" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborURIC" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">URIC ACID</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inURIC">
											<p id="notifinURIC" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_uric()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End URIC ACID -->

					<!-- TRIGLYSERIDE -->
					<div class="collapse" id="isiTRIGLYSERIDE">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaTRIGLYSERIDE" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborTRIGLYSERIDE" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">TRIGLYSERIDE</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inTRIGLYSERIDE">
											<p id="notifinTRIGLYSERIDE" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_trigiseride()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End URIC ACID -->

					<!-- CHO -->
					<div class="collapse" id="isiCHO">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaCHO" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborCHO" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">CHO</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inCHO">
											<p id="notifinCHO" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_cho()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End CHO -->

					<!-- HDL -->
					<div class="collapse" id="isiHDL">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaHDL" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborHDL" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">HDL</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inHDL">
											<p id="notifinHDL" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_hdl()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End HDL -->

					<!-- LDL -->
					<div class="collapse" id="isiLDL">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaLDL" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborLDL" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">LDL</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inLDL">
											<p id="notifinLDL" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_ldl()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End LDL -->

					<!-- UREUM -->
					<div class="collapse" id="isiUREUM">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaUREUM" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborUREUM" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">UREUM</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inUREUM">
											<p id="notifinUREUM" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_ureum()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End UREUM -->

					<!-- CREATININ -->
					<div class="collapse" id="isiCREATININ">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaCREATININ" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborCREATININ" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">CREATININ</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inCREATININ">
											<p id="notifinCREATININ" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_creatinin()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End CREATININ -->

					<!-- BIL.DIREK -->
					<div class="collapse" id="isiBILDIREK">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaBILDIREK" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborBILDIREK" disabled>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
									<button onclick="insert_bil_direk()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>
						</div>
					</div>
					<!-- End BIL.DIREK -->

					<!-- BIL.TOTAL -->
					<div class="collapse" id="isiBILTOTAL">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaBILTOTAL" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborBILTOTAL" disabled>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_bil_total()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>
						</div>
					</div>
					<!-- End BIL.TOTAL -->

					<!-- SGOT -->
					<div class="collapse" id="isiSGOT">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaSGOT" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborSGOT" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">SGOT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inSGOT">
											<p id="notifinSGOT" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_sgot()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End SGOT -->

					<!-- SGPT -->
					<div class="collapse" id="isiSGPT">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaSGPT" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborSGPT" disabled>
										</div>
									</div>
								</div>

								<div class="col-md-5">
									<div class="col-md-12 has-success">
										<select style="border: 1px solid lightgreen;" class="form-control  filled-input select2" placeholder="Choose a Category" id="inTipeMasuk" name="inTipeMasuk">
												<option value="0">-</option>
												<option value="1" class="active">12-60 Thn</option>
												<option value="2">60-90 Thn</option>
										</select>
									</div>
								</div>
							</div>
							<span class="help-block mb-30"></span>
							<div class="row mb-40">
								<div class="col-md-6">
									<div class="data_hide data_hide_1">
										<div class="row mt-10" >
											<div class="col-md-12">
												<div class="form-group ">
													<label class="control-label col-md-4 pt-5">SGPT UMUR 12-60 Tahun</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inSGPT1260">
														<p id="notifinSGPT1260" style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_hide data_hide_2">
										<div class="row mt-10">
											<div class="col-md-12">
												<div class="form-group ">
													<label class="control-label col-md-4 pt-5">SGPT UMUR 60-90 Tahun</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inSGPT6090">
														<p id="notifinSGPT6090" style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 mb-2 pt-10">
									<button onclick="insert_sgpt()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
					<!-- End SGOT -->

					<!-- GGT -->
					<div class="collapse" id="isiGGT">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaGGT" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborGGT" disabled>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_bil_ggt()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>
						</div>
					</div>
					<!-- End GGT -->

					<!-- ALP -->
					<div class="collapse" id="isiALP">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaALP" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborALP" disabled>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_bil_alp()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>
						</div>
					</div>
					<!-- End ALP -->

					<!-- ELEKTROLIT -->
					<div class="collapse" id="isiELEKTROLIT">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaELEKTROLIT" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborELEKTROLIT" disabled>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-20">
								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">NA :</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inNA">
											<p id="notifinNA" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group mt-20">
										<label class="control-label col-md-3 pt-10">K :</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inK">
											<p id="notifinK" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mt-20">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">CL :</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inCL">
											<p id="notifinCL" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">Ca :</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inCa">
											<p id="notifinCa" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 mt-30">
											<div class="form-group">
												<button onclick="insert_bil_elektrolit()"
													class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
														class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<span class="help-block mb-20"></span>
						</div>
					</div>
					<!-- End ELEKTROLIT -->

					<!-- SPUTUMBTAI -->
					<div class="collapse" id="isiSPUTUMBTAI">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaSPUTUMBTAI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborSPUTUMBTAI" disabled>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-20">
								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">SPUTUM BTA I :</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inNA">
											<p id="notifinNA" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-12">
											<div class="form-group">
												<button onclick="insert_bil_sputumbtai()"
													class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
														class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										
										</div>
								</div>
							</div>
							<span class="help-block mb-20"></span>
						</div>
					</div>
					<!-- End SPUTUM BTA I -->

					<!-- SPUTUMBTAII -->
					<div class="collapse" id="isiSPUTUMBTAII">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaSPUTUMBTAII" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborSPUTUMBTAII" disabled>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-20">
								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">SPUTUM BTA II </label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inSPUTUMBTAII">
											<p id="notifinSPUTUMBTAII" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-12">
											<div class="form-group">
												<button onclick="insert_bil_sputumbtaii()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
											</div>
								</div>
							</div>
							<span class="help-block mb-20"></span>
						</div>
					</div>
					<!-- End SPUTUM BTA II -->

					<!-- SPUTUMBTAIII -->
					<div class="collapse" id="isiSPUTUMBTAIII">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaSPUTUMBTAIII" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborSPUTUMBTAIII" disabled>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-20">
								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">SPUTUM BTA III :</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inSPUTUMBTAIII">
											<p id="notifinSPUTUMBTAIII" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-12">
										<div class="form-group">
												<button onclick="insert_bil_sputumbtaiii()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										</div>
								</div>
							</div>
							<span class="help-block mb-20"></span>
						</div>
					</div>
					<!-- End SPUTUM BTA III -->

					<!-- End Everything -->
				</div>
			</div>
		</div>
	</div>
	<!-- End -->

</div>

<style>
	td {
		color: black;
	}

</style>


<script type="text/javascript">
                    $(document).ready(function () {
					$('#datable').DataTable({
									"language": {
            					"sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
    							"sProcessing":   "Sedang memproses...",
    							"sLengthMenu":   "Tampilkan _MENU_ entri",
    							"sZeroRecords":  "Tidak ditemukan data yang sesuai",
    							"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    							"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
    							"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
    							"sInfoPostFix":  "",
    							"sSearch":  "Pencarian :",
    							"sUrl":          "",
								"oPaginate": {
        						"sFirst":    "Pertama",
        						"sPrevious": "Sebelumnya",
        						"sNext":     "Selanjutnya",
        							"sLast":     "Terakhir"
    					        },
							        },		
									"ajax": '<?php echo base_url('Labor/tampil_datarajal'); ?>',	
									"deferRender": true,
									"processing": true,
									"order": [], 
									"columnDefs": [
            						{ 
                					"targets": [ 0 ], 
                					"orderable": false, 
            						},
            						],
							});
					});

					function reload_data_labor(id_pelayanan) {    
                        $('#tablelabor').dataTable().fnClearTable();
                        $('#tablelabor').dataTable().fnDestroy();
                        $('#tablelabor').DataTable({
                            "pageLength": 10,
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
                                    "sLast": "Terakhir",
                                }
                            },
                            "ajax": {
                                "url": '<?php echo base_url('Labor/tampil_rajal_labor'); ?>',
                                "type": 'POST',
                                "data": {
                                    id_pelayanan: id_pelayanan
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

					function reload_total_labor(id_pelayanan) {
                        $('#outTotalHargaRadiologi').dataTable().fnClearTable();
                        $('#outTotalHargaRadiologi').dataTable().fnDestroy();
                        $('#outTotalHargaRadiologi').DataTable({
                            "pageLength": 10,
                            "searching": false,
                            "lengthChange": false,
                            "bInfo": false,
                            "paging": false,
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
                                    "sLast": "Terakhir",
                                }
                            },
                            "ajax": {
                                "url": '<?php echo base_url('Labor/tampil_total_labor'); ?>',
                                "type": 'POST',
                                "data": {
                                    id_pelayanan: id_pelayanan
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

// Kondisi Display Modal Per-poli

		// POLI TTH
		function edit_data_tindakan(id_pelayanan, id_history, poli, nama, umur) {
				$('.data_hide_darah').addClass('collapse');
						$('#inTipeMasukDarah').change(function() {
						var selector = '.data_hide_darah_' + $(this).val();
						$('.data_hide_darah').collapse('hide');
						$(selector).collapse('show');
				});

                if(poli == 'THT'){
                	$("#idPelayanan").val(id_pelayanan);
                	$("#inNamaPasien").val(nama);
                    $("#inUmurPasien").val(umur);
                    $("#modal_edit_tht").modal('show');
                    reload_data_labor(id_pelayanan);
                    reload_total_labor(id_pelayanan);
                }else{
                    alert('tidak ketemu');
                }
        }

        function aksi_labor(id_tindakan_labor,id_pelayanan){
            $.ajax({
                url : "<?= base_url(). 'Labor/getLaborById'?>",
                data:{
                    tindakan:id_tindakan_labor,
					pelayanan:id_pelayanan,
                },
                type:'POST',
                dataType: 'json',
                success:function(data){
                    if(data.status_dt == "found"){
						if(data.nama == " Darah Rutin "){
							// Darah Rutin
							$("#inNama").val(data.nama);
							$('#isiDarahRutin').collapse('toggle');
							$('#isiLED').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiHDL').collapse('hide');
							$("#id_tindakan_laborDarahRutin").val(data.id_tindakan_labor);
						}else if(data.nama == " GOL DARAH "){
							// GOL DARAH
							$("#inNamaDarah").val(data.nama);
							$('#isiGOL-DARAH').collapse('toggle');
							$('#isiLED').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiHDL').collapse('hide');
							$("#id_tindakan_laborGOL-DARAH").val(data.id_tindakan_labor);
						}else if(data.nama == " LED "){
							// LED
							$("#inNamaLED").val(data.nama);
							$('#isiLED').collapse('toggle');
							$('#isiAPTT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$("#id_tindakan_laborLED").val(data.id_tindakan_labor);
						}else if(data.nama == "RHESUS"){
							// RHESUS
							$("#inNamaRHESUS").val(data.nama);
							$('#isiRHESUS').collapse('toggle');
							$('#isiSGOT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiHDL').collapse('hide');
							$("#id_tindakan_laborRHESUS").val(data.id_tindakan_labor);
						}else if(data.nama == " BLT "){
							// BLT
							$("#inNamaBLT").val(data.nama);
							$('#isiBLT').collapse('toggle');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiHDL').collapse('hide');
							$("#id_tindakan_laborBLT").val(data.id_tindakan_labor);
						}else if(data.nama == " CLT "){
							// CLT
							$("#inNamaCLT").val(data.nama);
							$('#isiCLT').collapse('toggle');
							$('#isiAPTT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$("#id_tindakan_laborCLT").val(data.id_tindakan_labor);
						}else if(data.nama == "APTT"){
							// APTT
							$("#inNamaAPTT").val(data.nama);
							$('#isiAPTT').collapse('toggle');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborAPTT").val(data.id_tindakan_labor);
						}else if(data.nama == "(LUAR) PT"){
							// PT
							$("#inNamaPT").val(data.nama);
							$('#isiPT').collapse('toggle');
							$('#isiAPTT').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$("#id_tindakan_laborPT").val(data.id_tindakan_labor);
						}else if(data.nama == " GULA DARAH "){
							// GULA DARAH
							$("#inNamaGULDARAH").val(data.nama);
							$('#isiGULDARAH').collapse('toggle');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborGULDARAH").val(data.id_tindakan_labor);
						}else if(data.nama == "HBA 1 C (A 1 C)"){
							// HBA 1 C (A 1 C)
							$("#inNamaHBA").val(data.nama);
							$('#isiHBA').collapse('toggle');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborHBA").val(data.id_tindakan_labor);
						}else if(data.nama == "URIC ACID"){
							// URIC ACID
							$("#inNamaURIC").val(data.nama);
							$('#isiURIC').collapse('toggle');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$("#id_tindakan_laborURIC").val(data.id_tindakan_labor);
						}else if(data.nama == "TRIGLYSERIDE"){
							// TRIGLYSERIDE
							$("#inNamaTRIGLYSERIDE").val(data.nama);
							$('#isiTRIGLYSERIDE').collapse('toggle');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiHDL').collapse('hide');
							$("#id_tindakan_laborTRIGLYSERIDE").val(data.id_tindakan_labor);
						}else if(data.nama == "CHO"){
							// CHO
							$("#inNamaCHO").val(data.nama);
							$('#isiCHO').collapse('toggle');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiHDL').collapse('hide');
							$("#id_tindakan_laborCHO").val(data.id_tindakan_labor);
						}else if(data.nama == "HDL"){
							// HDL
							$("#inNamaHDL").val(data.nama);
							$('#isiHDL').collapse('toggle');
							$('#isiLDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborHDL").val(data.id_tindakan_labor);
						}else if(data.nama == "LDL"){
							// LDL
							$("#inNamaLDL").val(data.nama);
							$('#isiLDL').collapse('toggle');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborLDL").val(data.id_tindakan_labor);
						}else if(data.nama == "UREUM"){
							// UREUM
							$("#inNamaUREUM").val(data.nama);
							$('#isiUREUM').collapse('toggle');
							$('#isiLDL').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborUREUM").val(data.id_tindakan_labor);
						}else if(data.nama == "CREATININ"){
							// CREATININ
							$("#inNamaCREATININ").val(data.nama);
							$('#isiCREATININ').collapse('toggle');
							$('#isiUREUM').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$("#id_tindakan_laborCREATININ").val(data.id_tindakan_labor);
						}else if(data.nama == "BIL.DIREK (LUAR)"){
							// BIL.DIREK (LUAR)
							$("#inNamaBILDIREK").val(data.nama);
							$('#isiBILDIREK').collapse('toggle');
							$('#isiCREATININ').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$("#id_tindakan_laborBILDIREK").val(data.id_tindakan_labor);
						}else if(data.nama == "BIL.TOTAL (LUAR)"){
							// BIL.TOTAL (LUAR)
							$("#inNamaBILTOTAL").val(data.nama);
							$('#isiBILTOTAL').collapse('toggle');
							$('#isiBILDIREK').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborBILTOTAL").val(data.id_tindakan_labor);
						}else if(data.nama == "SGOT"){
							// SGOT
							$("#inNamaSGOT").val(data.nama);
							$('#isiSGOT').collapse('toggle');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$("#id_tindakan_laborSGOT").val(data.id_tindakan_labor);
						}else if(data.nama == "SGPT"){
							// SGPT
							$("#inNamaSGPT").val(data.nama);
							$('#isiSGPT').collapse('toggle');
							$('.data_hide').addClass('collapse');
							$('#inTipeMasuk').change(function() {
								var selector = '.data_hide_' + $(this).val();
								$('.data_hide').collapse('hide');
								$(selector).collapse('show');
							});
							$('#isiALP').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborSGPT").val(data.id_tindakan_labor);
						}else if(data.nama == "GGT (LUAR)"){
							// GGT
							$("#inNamaGGT").val(data.nama);
							$('#isiGGT').collapse('toggle');
							$('#isiSGPT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborGGT").val(data.id_tindakan_labor);
						}else if(data.nama == "ALP (LUAR)"){
							// ALP
							$("#inNamaALP").val(data.nama);
							$('#isiALP').collapse('toggle');
							$('#isiGGT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$("#id_tindakan_laborALP").val(data.id_tindakan_labor);
						}else if(data.nama == "ELEKTROLIT "){
							// ELEKTROLIT
							$("#inNamaELEKTROLIT").val(data.nama);
							$('#isiELEKTROLIT').collapse('toggle');
							$('#isiALP').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$("#id_tindakan_laborELEKTROLIT").val(data.id_tindakan_labor);
						}else if(data.nama == " Sputum B T A I"){
							// SPUTUMBTAI
							$("#inNamaSPUTUMBTAI").val(data.nama);
							$('#isiSPUTUMBTAI').collapse('toggle');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborSPUTUMBTAI").val(data.id_tindakan_labor);
						}else if(data.nama == " Sputum B T A II"){
							// SPUTUMBTAII
							$("#inNamaSPUTUMBTAII").val(data.nama);
							$('#isiSPUTUMBTAII').collapse('toggle');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborSPUTUMBTAII").val(data.id_tindakan_labor);
						}else if(data.nama == " Sputum B T A III"){
							// SPUTUMBTAIII
							$("#inNamaSPUTUMBTAIII").val(data.nama);
							$('#isiSPUTUMBTAIII').collapse('toggle');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborSPUTUMBTAIII").val(data.id_tindakan_labor);
						}else{
							swal({   
								title: "DATA TIDAK DITEMUKAN",   
								text: "Silahkan periksa pilihan aksi Anda",
								type: "warning",   
								confirmButtonColor: "#3cb878",   
							});
						}
                    }else{
                        alert("data tidak ditemukan");
                    }
                }
            });

			// KeyUP HB
			$('#inHB').keyup(function() {
				$('#notifinHB').html('');
				a = $('#inHB').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHB').html(html);
				}else if (a >= 11.3 && a <= 15.7) {
					html = '<b style="color:blue">HB NORMAL PRIA DEWASA</b>';
					$('#notifinHB').html(html);
				}else if (a >= 9.3 && a <= 13.6) {
				html = '<b style="color:blue">HB NORMAL WANITA DEWASA</b>';
				$('#notifinHB').html(html);
				} else{
					html = '<b style="color:red">HB TIDAK NORMAL</b>';
					$('#notifinHB').html(html);
				}
			});

			// KeyUP LEUKOSIT
			$('#inLEUKOSIT').keyup(function() {
				$('#notifinLEUKOSIT').html('');
				a = $('#inLEUKOSIT').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEUKOSIT').html(html);
				}else if (a >= 4000 && a <= 10000) {
					html = '<b style="color:blue">LEUKOSIT NORMAL</b>';
					$('#notifinLEUKOSIT').html(html);
				} else{
					html = '<b style="color:red">LEUKOSIT TIDAK NORMAL</b>';
					$('#notifinLEUKOSIT').html(html);
				}
			});

			// KeyUP TROMBOSIT
			$('#inTROMBOSIT').keyup(function() {
				$('#notifinTROMBOSIT').html('');
				a = $('#inTROMBOSIT').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTROMBOSIT').html(html);
				}else if (a >= 150000 && a <= 400000) {
					html = '<b style="color:blue">TROMBOSIT NORMAL</b>';
					$('#notifinTROMBOSIT').html(html);
				} else{
					html = '<b style="color:red">TROMBOSIT TIDAK NORMAL</b>';
					$('#notifinTROMBOSIT').html(html);
				}
			});

			// KeyUP HEMATOKRIT				
			$('#inHEMATOKRIT').keyup(function() {
				$('#notifinHEMATOKRIT').html('');
				a = $('#inHEMATOKRIT').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHEMATOKRIT').html(html);
				}else if (a >= 40 && a <= 52) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL PRIA DEWASA</b>';
					$('#notifinHEMATOKRIT').html(html);
				}else if (a >= 35 && a <= 47) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL WANITA DEWASA</b>';
					$('#notifinHEMATOKRIT').html(html);
				} else{
					html = '<b style="color:red">HEMATOKRIT TIDAK NORMAL</b>';
					$('#notifinHEMATOKRIT').html(html);
				}
			});

			// KeyUP ERITROSIT				
			$('#inERITROSIT').keyup(function() {
				$('#notifinERITROSIT').html('');
				a = $('#inERITROSIT').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinERITROSIT').html(html);
				}else if (a >= 4.5 && a <= 5.9) {
					html = '<b style="color:blue">ERITROSIT NORMAL PRIA DEWASA</b>';
					$('#notifinERITROSIT').html(html);
				}else if (a >= 4.1 && a <= 5.1) {
					html = '<b style="color:blue">ERITROSIT NORMAL WANITA DEWASA</b>';
					$('#notifinERITROSIT').html(html);
				} else{
					html = '<b style="color:red">ERITROSIT TIDAK NORMAL</b>';
					$('#notifinERITROSIT').html(html);
				}
			});

			// KeyUP BAS			
			$('#inBAS').keyup(function() {
				$('#notifinBAS').html('');
				a = $('#inBAS').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBAS').html(html);
				}else if (a >= 0 && a <= 1) {
					html = '<b style="color:blue">BAS NORMAL</b>';
					$('#notifinBAS').html(html);
				} else{
					html = '<b style="color:red">BAS TIDAK NORMAL</b>';
					$('#notifinBAS').html(html);
				}
			});

			// KeyUP EOS			
			$('#inEOS').keyup(function() {
				$('#notifinEOS').html('');
				a = $('#inEOS').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinEOS').html(html);
				}else if (a >= 2 && a <= 4) {
					html = '<b style="color:blue">EOS NORMAL</b>';
					$('#notifinEOS').html(html);
				} else{
					html = '<b style="color:red">EOS TIDAK NORMAL</b>';
					$('#notifinEOS').html(html);
				}
			});

			// KeyUP MONO		
			$('#inMONO').keyup(function() {
				$('#notifinMONO').html('');
				a = $('#inMONO').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMONO').html(html);
				}else if (a >= 2 && a <= 8) {
					html = '<b style="color:blue">MONO NORMAL</b>';
					$('#notifinMONO').html(html);
				} else{
					html = '<b style="color:red">MONO TIDAK NORMAL</b>';
					$('#notifinMONO').html(html);
				}
			});

			// KeyUP SEGMEN		
			$('#inSEGMEN').keyup(function() {
				$('#notifinSEGMEN').html('');
				a = $('#inSEGMEN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSEGMEN').html(html);
				}else if (a >= 50 && a <= 70) {
					html = '<b style="color:blue">SEGMEN NORMAL</b>';
					$('#notifinSEGMEN').html(html);
				} else{
					html = '<b style="color:red">SEGMEN TIDAK NORMAL</b>';
					$('#notifinSEGMEN').html(html);
				}
			});

			// KeyUP LYMPO		
			$('#inLYMPO').keyup(function() {
				$('#notifinLYMPO').html('');
				a = $('#inLYMPO').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLYMPO').html(html);
				}else if (a >= 25 && a <= 40) {
					html = '<b style="color:blue">LYMPO NORMAL</b>';
					$('#notifinLYMPO').html(html);
				} else{
					html = '<b style="color:red">LYMPO TIDAK NORMAL</b>';
					$('#notifinLYMPO').html(html);
				}
			});

			// KeyUP MCV	
			$('#inMCV').keyup(function() {
				$('#notifinMCV').html('');
				a = $('#inMCV').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCV').html(html);
				}else if (a >= 80 && a <= 96) {
					html = '<b style="color:blue">MCV NORMAL</b>';
					$('#notifinMCV').html(html);
				} else{
					html = '<b style="color:red">MCV TIDAK NORMAL</b>';
					$('#notifinMCV').html(html);
				}
			});

			// KeyUP MCH	
			$('#inMCH').keyup(function() {
				$('#notifinMCH').html('');
				a = $('#inMCH').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCH').html(html);
				}else if (a >= 28 && a <= 33) {
					html = '<b style="color:blue">MCH NORMAL</b>';
					$('#notifinMCH').html(html);
				} else{
					html = '<b style="color:red">MCH TIDAK NORMAL</b>';
					$('#notifinMCH').html(html);
				}
			});

			// KeyUP MCHC
			$('#inMCHC').keyup(function() {
				$('#notifinMCHC').html('');
				a = $('#inMCHC').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCHC').html(html);
				}else if (a >= 33 && a <= 36) {
					html = '<b style="color:blue">MCHC NORMAL</b>';
					$('#notifinMCHC').html(html);
				} else{
					html = '<b style="color:red">MCHC TIDAK NORMAL</b>';
					$('#notifinMCHC').html(html);
				}
			});

			// KeyUP RDW-CV
			$('#inRDW-CV').keyup(function() {
				$('#notifinRDW-CV').html('');
				a = $('#inRDW-CV').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinRDW-CV').html(html);
				}else if (a >= 11.0 && a <= 16.0) {
					html = '<b style="color:blue">RDW-CV NORMAL</b>';
					$('#notifinRDW-CV').html(html);
				} else{
					html = '<b style="color:red">RDW-CV TIDAK NORMAL</b>';
					$('#notifinRDW-CV').html(html);
				}
			});

			// KeyUP RDW-SD
			$('#inRDW-SD').keyup(function() {
				$('#notifinRDW-SD').html('');
				a = $('#inRDW-SD').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinRDW-SD').html(html);
				}else if (a >= 35.0 && a <= 56.0) {
					html = '<b style="color:blue">RDW-SD NORMAL</b>';
					$('#notifinRDW-SD').html(html);
				} else{
					html = '<b style="color:red">RDW-SD TIDAK NORMAL</b>';
					$('#notifinRDW-SD').html(html);
				}
			});

			// KeyUP LED
			$('#inLED').keyup(function() {
				$('#notifinLED').html('');
				a = $('#inLED').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLED').html(html);
				}else if (a >= 0 && a <= 10) {
					html = '<b style="color:blue">LED NORMAL PRIA DEWASA</b>';
					$('#notifinLED').html(html);
				}else if (a >= 0 && a <= 15) {
					html = '<b style="color:blue">LED NORMAL WANITA DEWASA</b>';
					$('#notifinLED').html(html);
				} else{
					html = '<b style="color:red">LED TIDAK NORMAL</b>';
					$('#notifinLED').html(html);
				}
			});

			// KeyUP RHESUS
			$('#inRHESUS').keyup(function() {
				$('#notifinRHESUS').html('');
				a = $('#inRHESUS').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinRHESUS').html(html);
				}
			});

			// KeyUP BLT
			$('#inBLT').keyup(function() {
				$('#notifinBLT').html('');
				a = $('#inBLT').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBLT').html(html);
				}else if( a >= 1 && a <= 6){
					html = '<b style="color:blue">BLT NORMAL</b>';
					$('#notifinBLT').html(html);
				}else{
					html = '<b style="color:red">BLT TIDAK NORMAL</b>';
					$('#notifinBLT').html(html);
				}
			});

			// KeyUP CLT
			$('#inCLT').keyup(function() {
				$('#notifinCLT').html('');
				a = $('#inCLT').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCLT').html(html);
				}else if( a >= 2 && a <= 6){
					html = '<b style="color:blue">CLT NORMAL</b>';
					$('#notifinCLT').html(html);
				}else{
					html = '<b style="color:red">CLT TIDAK NORMAL</b>';
					$('#notifinCLT').html(html);
				}
			});

			// KeyUP APTT
			$('#inAPTT').keyup(function() {
				$('#notifinAPTT').html('');
				a = $('#inAPTT').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinAPTT').html(html);
				}else if( a >= 25 && a <= 40){
					html = '<b style="color:blue">APTT NORMAL</b>';
					$('#notifinAPTT').html(html);
				}else{
					html = '<b style="color:red">APTT TIDAK NORMAL</b>';
					$('#notifinAPTT').html(html);
				}
			});

			// KeyUP PUASA
			$('#inPUASA').keyup(function() {
				$('#notifinPUASA').html('');
				a = $('#inPUASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPUASA').html(html);
				}else if( a >= 76 && a <= 110){
					html = '<b style="color:blue">PUASA NORMAL</b>';
					$('#notifinPUASA').html(html);
				}else{
					html = '<b style="color:red">PUASA TIDAK NORMAL</b>';
					$('#notifinPUASA').html(html);
				}
			});

			// KeyUP 2 JAM PP
			$('#in2JAMPP').keyup(function() {
				$('#notifin2JAMPP').html('');
				a = $('#in2JAMPP').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifin2JAMPP').html(html);
				}else if( a < 150){
					html = '<b style="color:blue">2 JAM PP NORMAL</b>';
					$('#notifin2JAMPP').html(html);
				}else{
					html = '<b style="color:red">2 JAM PP TIDAK NORMAL</b>';
					$('#notifin2JAMPP').html(html);
				}
			});

			// KeyUP SEWAKTU
			$('#inSEWAKTU').keyup(function() {
				$('#notifinSEWAKTU').html('');
				a = $('#inSEWAKTU').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSEWAKTU').html(html);
				}else if( a >= 110 && a <= 150){
					html = '<b style="color:blue">SEWAKTU NORMAL</b>';
					$('#notifinSEWAKTU').html(html);
				}else{
					html = '<b style="color:red">SEWAKTU TIDAK NORMAL</b>';
					$('#notifinSEWAKTU').html(html);
				}
			});

			// KeyUP HBA
			$('#inHBA').keyup(function() {
				$('#notifinHBA').html('');
				a = $('#inHBA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHBA').html(html);
				}else if( a >= 4 && a <= 5.6){
					html = '<b style="color:blue">HBA1C NORMAL</b>';
					$('#notifinHBA').html(html);
				}else{
					html = '<b style="color:red">HBA1C TIDAK NORMAL</b>';
					$('#notifinHBA').html(html);
				}
			});

			// KeyUP URIC
			$('#inURIC').keyup(function() {
				$('#notifinURIC').html('');
				a = $('#inURIC').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinURIC').html(html);
				}else if( a >= 2.6 && a <= 6.0){
					html = '<b style="color:blue">URIC ACID NORMAL WANITA</b>';
					$('#notifinURIC').html(html);
				}else if( a >= 3.4 && a <= 7.2){
					html = '<b style="color:blue">URIC ACID NORMAL PRIA</b>';
					$('#notifinURIC').html(html);
				}else{
					html = '<b style="color:red">URIC ACID TIDAK NORMAL</b>';
					$('#notifinURIC').html(html);
				}
			});
			
			// KeyUP TRIGLYSERIDE
			$('#inTRIGLYSERIDE').keyup(function() {
				$('#notifinTRIGLYSERIDE').html('');
				a = $('#inTRIGLYSERIDE').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTRIGLYSERIDE').html(html);
				}else if( a >= 60 && a <= 150){
					html = '<b style="color:blue">TRIGLISERIDA NORMAL</b>';
					$('#notifinTRIGLYSERIDE').html(html);
				}else{
					html = '<b style="color:red">TRIGLISERIDA TIDAK NORMAL</b>';
					$('#notifinTRIGLYSERIDE').html(html);
				}
			});

			// KeyUP TRIGLYSERIDE
			$('#inTRIGLYSERIDE').keyup(function() {
				$('#notifinTRIGLYSERIDE').html('');
				a = $('#inTRIGLYSERIDE').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTRIGLYSERIDE').html(html);
				}else if( a >= 60 && a <= 150){
					html = '<b style="color:blue">TRIGLISERIDA NORMAL</b>';
					$('#notifinTRIGLYSERIDE').html(html);
				}else{
					html = '<b style="color:red">TRIGLISERIDA TIDAK NORMAL</b>';
					$('#notifinTRIGLYSERIDE').html(html);
				}
			});

			// KeyUP CHO
			$('#inCHO').keyup(function() {
				$('#notifinCHO').html('');
				a = $('#inCHO').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCHO').html(html);
				}else if( a >= 120 && a <= 200){
					html = '<b style="color:blue">CHO NORMAL</b>';
					$('#notifinCHO').html(html);
				}else{
					html = '<b style="color:red">CHO TIDAK NORMAL</b>';
					$('#notifinCHO').html(html);
				}
			});

			// KeyUP HDL
			$('#inHDL').keyup(function() {
				$('#notifinHDL').html('');
				a = $('#inHDL').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHDL').html(html);
				}else if( a >= 35 && a <= 60){
					html = '<b style="color:blue">HDL NORMAL</b>';
					$('#notifinHDL').html(html);
				}else{
					html = '<b style="color:red">HDL TIDAK NORMAL</b>';
					$('#notifinHDL').html(html);
				}
			});

			// KeyUP LDL
			$('#inLDL').keyup(function() {
				$('#notifinLDL').html('');
				a = $('#inLDL').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLDL').html(html);
				}else if( a < 150){
					html = '<b style="color:blue">LDL NORMAL</b>';
					$('#notifinLDL').html(html);
				}else{
					html = '<b style="color:red">LDL TIDAK NORMAL</b>';
					$('#notifinLDL').html(html);
				}
			});

			// KeyUP UREUM
			$('#inUREUM').keyup(function() {
				$('#notifinUREUM').html('');
				a = $('#inUREUM').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinUREUM').html(html);
				}else if( a >= 10 && a <= 50){
					html = '<b style="color:blue">UREUM NORMAL</b>';
					$('#notifinUREUM').html(html);
				}else{
					html = '<b style="color:red">UREUM TIDAK NORMAL</b>';
					$('#notifinUREUM').html(html);
				}
			});

			// KeyUP CREATININ
			$('#inCREATININ').keyup(function() {
				$('#notifinCREATININ').html('');
				a = $('#inCREATININ').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCREATININ').html(html);
				}else if (a >= 0.6 && a <= 1.1) {
					html = '<b style="color:blue">CREATININ NORMAL PRIA DEWASA</b>';
					$('#notifinCREATININ').html(html);
				}else if (a >= 0.5 && a <= 1.5) {
					html = '<b style="color:blue">CREATININ NORMAL WANITA DEWASA</b>';
					$('#notifinCREATININ').html(html);
				} else{
					html = '<b style="color:red">CREATININ TIDAK NORMAL</b>';
					$('#notifinCREATININ').html(html);
				}
			});
			
			// KeyUP SGOT
			$('#inSGOT').keyup(function() {
				$('#notifinSGOT').html('');
				a = $('#inSGOT').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSGOT').html(html);
				}else if( a >= 13 && a <= 35){
					html = '<b style="color:blue">SGOT NORMAL WANITA</b>';
					$('#notifinSGOT').html(html);
				}else if( a >= 15 && a <= 40){
					html = '<b style="color:blue">SGOT NORMAL PRIA</b>';
					$('#notifinSGOT').html(html);
				}else{
					html = '<b style="color:red">SGOT TIDAK NORMAL</b>';
					$('#notifinSGOT').html(html);
				}
			});

			// KeyUP SGPT
			$('#inSGPT1260').keyup(function() {
				$('#notifinSGPT1260').html('');
				a = $('#iSGPT1260').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSGPT1260').html(html);
				}else if( a >= 7 && a <= 35){
					html = '<b style="color:blue">SGPT UMUR 12-60 NORMAL WANITA</b>';
					$('#notifinSGPT1260').html(html);
				}else if( a >= 10 && a <= 40){
					html = '<b style="color:blue">SGPT UMUR 12-60 NORMAL PRIA</b>';
					$('#notifinSGPT1260').html(html);
				}else{
					html = '<b style="color:red">SGPT TIDAK NORMAL</b>';
					$('#notifinSGPT1260').html(html);
				}
			});

			$('#inSGPT6090').keyup(function() {
				$('#notifinSGPT6090').html('');
				a = $('#inSGPT6090').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSGPT6090').html(html);
				}else if( a >= 10 && a <= 28){
					html = '<b style="color:blue">SGPT UMUR 60-90 NORMAL WANITA</b>';
					$('#notifinSGPT6090').html(html);
				}else if( a >= 13 && a <= 40){
					html = '<b style="color:blue">SGPT UMUR 60-90 NORMAL PRIA</b>';
					$('#notifinSGPT6090').html(html);
				}else{
					html = '<b style="color:red">SGPT TIDAK NORMAL</b>';
					$('#notifinSGPT6090').html(html);
				}
			});
			// End

			// KeyUP ELEKTROLIT
			$('#inNA').keyup(function() {
				$('#notifinNA').html('');
				a = $('#inNA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinNA').html(html);
				}else if( a >= 128 && a <= 138){
					html = '<b style="color:blue">NA NORMAL</b>';
					$('#notifinNA').html(html);
				}else{
					html = '<b style="color:red">NA TIDAK NORMAL</b>';
					$('#notifinNA').html(html);
				}
			});


			$('#inK').keyup(function() {
				$('#notifinK').html('');
				a = $('#inK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinK').html(html);
				}else if( a >= 3.9 && a <= 4.9){
					html = '<b style="color:blue">K NORMAL</b>';
					$('#notifinK').html(html);
				}else{
					html = '<b style="color:red">K TIDAK NORMAL</b>';
					$('#notifinK').html(html);
				}
			});

			$('#inCL').keyup(function() {
				$('#notifinCL').html('');
				a = $('#inCL').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCL').html(html);
				}else if( a >= 88 && a <= 100){
					html = '<b style="color:blue">CL NORMAL</b>';
					$('#notifinCL').html(html);
				}else{
					html = '<b style="color:red">CL TIDAK NORMAL</b>';
					$('#notifinCL').html(html);
				}
			});

			$('#inCa').keyup(function() {
				$('#notifinCa').html('');
				a = $('#inCa').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCa').html(html);
				}else if( a >= 0.99 && a <= 1.29){
					html = '<b style="color:blue">Ca NORMAL</b>';
					$('#notifinCa').html(html);
				}else{
					html = '<b style="color:red">Ca TIDAK NORMAL</b>';
					$('#notifinCa').html(html);
				}
			});
			// End


        }

// End Dewsa //

        function update_tindakan(){
            a = $("#inNama").val();
            b = $("#idPelayanan").val();
            c = $("#inJumlah").val();
            d = $("#gambar").val();
            e = $("#id_tindakan_labor").val();
            f = $("#inDPJP").val();
            g = $("#inBiaya").val();
            h = $("#inKet").val();
           
            swal({
                title: "Info!",
                text:"Anda akan menyimpan tindakan " +a+ "",
                type: "info",
                showCancelButton:true,
                confirmButtonColor: "#3cb878",
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal",
                closeOnConfirm:false
            }, 
            function(){   
				$().ready(function(){                                        
					$.ajax({  
						url : "<?php echo base_url() ?>Labor/update_tht",
						method: "POST",
						dataType: 'json',
						data : {
							idPelayanan:b,
							inJumlah:c,
						    gambar:d,
							id_tindakan_labor:e,
							inDPJP:f,
							inBiaya:g,
                            inKet:h
						},  
						success: function(data){
							if(data.status=="success"){
								swal({   
									title: "good job!",   
									type: "success", 
									text: "Data berhasil disimpan",
									confirmButtonColor: "#3cb878",   
								});
								 $("#inNama").val('');
								 $("#inJumlah").val('');
								 $("#gambar").val('');
								 $("#inBiaya").val('');
								 $("#inKet").val('');
           
								$('#tablelabor').DataTable().ajax.reload();
								$('#outTotalHargaRadiologi').DataTable().ajax.reload();
							}else{
								swal({   
									title: "Gagal!",   
									type: "warning", 
									text: data.status,
									confirmButtonColor: "#3cb878",   
								});
							}
						}              
					});                    
				});   
			});
        }
    </script>

    <script type="text/javascript">
                function convertToRupiah(angka) {
                    var rupiah = '';
                    var angkarev = angka.toString().split('').reverse().join('');
                    for (var i = 0; i < angkarev.length; i++)
                        if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
                    return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
                }
     </script>
=======
<!-- Row -->
<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN RAWAT JALAN /
					UGD</span></h6>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="table-wrap">
				<div class="table-responsive">
					<table id="datable" class="table table-hover display  pb-30">
						<thead>
							<tr class="bg-success">
								<th>NO</th>
								<th>TINDAKAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>TANGGAL MASUK</th>
								<th>JAM MASUK</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLIKLINIK / RUANG</th>
								<th>DPJP</th>
								<th>JENIS KLAIM</th>
								<th>KETERANGAN</th>
								<th>NO SEP</th>
								<th>DIAGNOSA</th>
								<th>AGAMA</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>TINDAKAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>TANGGAL MASUK</th>
								<th>JAM MASUK</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLIKLINIK / RUANG</th>
								<th>DPJP</th>
								<th>JENIS KLAIM</th>
								<th>KETERANGAN</th>
								<th>NO SEP</th>
								<th>DIAGNOSA</th>
								<th>AGAMA</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- POLI THT -->
	<div class="modal fade bs-example-modal-lg" id="modal_edit_tht" role="dialog" aria-labelledby="myLargeModalLabel"
		aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN LABOR
						RAWAT JALAN | POLI THT
					</h5>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6 mb-20 mt-10">
							<div class="form-group ">
								<label class="control-label col-md-3">NAMA PASIEN</label>
								<div class="col-md-9 has-success">
									<input type="text" class="form-control" disabled id="inNamaPasien">
								</div>
							</div>
						</div>

						<div class="col-md-6 mb-20 mt-10">
							<div class="form-group ">
								<label class="control-label col-md-3">UMUR PASIEN</label>
								<div class="col-md-9 has-success">
									<input type="text" class="form-control" disabled id="inUmurPasien">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="modal-body mt-5">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
							<hr width="95%">
							<div class="table-wrap" style="width: 95%; margin: auto ">
								<div class="table-responsive">
									<table class="table table-hover display pb-60" id="tablelabor">
										<thead>
											<tr class="bg-success">
												<th>NO</th>
												<th>AKSI</th>
												<th>STATUS</th>
												<th>NAMA TINDAKAN</th>
												<th>TANGGAL TINDAKAN</th>
												<th>BIAYA TINDAKAN </th>
												<th>JUMLAH TINDAKAN</th>
												<th>STAFF REQUEST</th>
												<th>STAFF KONFIRMASI</th>
											</tr>
										</thead>
										<tfoot>
											<tr class="bg-success">
												<th>NO</th>
												<th>AKSI</th>
												<th>STATUS</th>
												<th>NAMA TINDAKAN</th>
												<th>TANGGAL TINDAKAN</th>
												<th>BIAYA TINDAKAN </th>
												<th>JUMLAH TINDAKAN</th>
												<th>STAFF REQUEST</th>
												<th>STAFF KONFIRMASI</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-8">
							</div>
							<div class="col-md-4 pull-right mt-20">
								<div class="table-wrap" style="width: 85%; margin-bottom:40px;">
									<div class="table-responsive ">
										<table class="table table-hover display " id="outTotalHargaRadiologi">
											<thead>
												<tr class="bg-success">
													<th style="font-weight:bold;">Total Keseluruhan</th>
												</tr>
											</thead>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Darah Rutin -->
					<div class="collapse" id="isiDarahRutin">
						<div class="form-body mb-30">
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<h6 class="txt-dark capitalize-font pl-15">NAMA TINDAKAN </h6>
												<div class="col-md-9 has-error">
													<input type="text" class="form-control" id="inNama" disabled>
													<input type="hidden" class="form-control" id="id_tindakan_laborDarahRutin" disabled>
												</div>
											</div>
										</div>
									<div class="col-md-6 has-success">
										<h6 class="txt-dark capitalize-font pl-5">FROM JENIS UMUR</h6>
										<select class="pull-left form-control has-success" placeholder="Choose a Category" id="inTipeMasukDarah">
												<option value="0">-</option>
												<option value="1">Normal</option>
												<option value="2">Anak | 1 Tahun - 16 Tahun</option>
												<option value="3">Bayi | 40 Hari - 12 Bulan</option>
												<option value="4">Bayi | 1 Hari - 31 Hari</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<h6 class="txt-dark capitalize-font pl-15 mt-15">UMUR</h6>
												<div class="col-md-9 has-error">
													<input type="text" class="form-control" id="inNama" disabled>
												</div>
											</div>
										</div>
								</div>
								
							</div>
						</div>

						<div class="data_hide_darah data_hide_darah_1"> <!-- FORM DARAH RUTIN NORMAL -->
							<div class="form-body mb-30">
								<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
								</h6>
								<hr width="95%">

								<div class="row mt-10">
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">HB</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inHB">
												<p id="notifinHB" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">LEUKOSIT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inLEUKOSIT">
												<p id="notifinLEUKOSIT" style="font-size:12px; margin-top:5px;">
												</p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">TROMBOSIT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inTROMBOSIT">
												<p id="notifinTROMBOSIT"
													style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">HEMATOKRIT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inHEMATOKRIT">
												<p id="notifinHEMATOKRIT"
													style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
								</div>
								<span class="help-block"></span>


								<div class="row">
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">ERITROSIT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inERITROSIT">
												<p id="notifinERITROSIT"
													style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">MCV</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inMCV">
												<p id="notifinMCV" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6 mt-10">
										<div class="form-group ">
											<label class="control-label col-md-3">MCH</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inMCH">
												<p id="notifinMCH" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6 mt-10">
										<div class="form-group ">
											<label class="control-label col-md-3">MCHC</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inMCHC">
												<p id="notifinMCHC" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6 mt-10">
										<div class="form-group ">
											<label class="control-label col-md-3">RDW-CV</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inRDW-CV">
												<p id="notifinRDW-CV" style="font-size:12px; margin-top:5px;">
												</p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6 mt-10">
										<div class="form-group ">
											<label class="control-label col-md-3">RDW-SD</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inRDW-SD">
												<p id="notifinRDW-SD" style="font-size:12px; margin-top:5px;">
												</p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

								</div>

								<div class="row">
									<div class="col-md-6 mt-20">
										<label class="control-label col-md-3 pt-20">HITUNG JENIS</label>
										<div class="form-group ">
											<div class="col-md-9 has-success">
												<div class="row">
													<div class="col-md-6">
														<label class="control-label col-md-3"
															style="color:black">BAS</label>
														<input type="text" class="form-control" id="inBAS">
														<p id="notifinBAS"
															style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>

														<label class="control-label col-md-3"
															style="color:black">EOS</label>
														<input type="text" class="form-control" id="inEOS">
														<p id="notifinEOS"
															style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>
													</div>
													<div class="col-md-6">
														<label class="control-label col-md-3"
															style="color:black">MONO</label>
														<input type="text" class="form-control" id="inMONO">
														<p id="notifinMONO"
															style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>

														<label class="control-label col-md-3"
															style="color:black">SEGMEN</label>
														<input type="text" class="form-control" id="inSEGMEN">
														<p id="notifinSEGMEN"
															style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>
													</div>
													<div class="col-md-6">
														<label class="control-label col-md-3"
															style="color:black">LYMPO</label>
														<input type="text" class="form-control" id="inLYMPO">
														<p id="notifinLYMPO"
															style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6 mt-40">
										<div class="form-group">
											<button onclick="insert_darah_rutin()"
												class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
													class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="data_hide_darah data_hide_darah_2"> <!-- FORM DARAH RUTIN Anak | 1 Tahun - 16 Tahun -->
							<div class="form-body mb-30">
								<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
								</h6>
								<hr width="95%">

								<div class="row mt-10">
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">HB</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inHB">
												<p id="notifinHB" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">LEUKOSIT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inLEUKOSIT">
												<p id="notifinLEUKOSIT" style="font-size:12px; margin-top:5px;">
												</p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">TROMBOSIT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inTROMBOSIT">
												<p id="notifinTROMBOSIT"
													style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">HEMATOKRIT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inHEMATOKRIT">
												<p id="notifinHEMATOKRIT"
													style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
								</div>
								<span class="help-block"></span>


								<div class="row">
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">ERITROSIT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inERITROSIT">
												<p id="notifinERITROSIT"
													style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">MCV</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inMCV">
												<p id="notifinMCV" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6 mt-10">
										<div class="form-group ">
											<label class="control-label col-md-3">MCH</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inMCH">
												<p id="notifinMCH" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6 mt-10">
										<div class="form-group ">
											<label class="control-label col-md-3">MCHC</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inMCHC">
												<p id="notifinMCHC" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6 mt-10">
										<div class="form-group ">
											<label class="control-label col-md-3">RDW-CV</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inRDW-CV">
												<p id="notifinRDW-CV" style="font-size:12px; margin-top:5px;">
												</p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6 mt-10">
										<div class="form-group ">
											<label class="control-label col-md-3">RDW-SD</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inRDW-SD">
												<p id="notifinRDW-SD" style="font-size:12px; margin-top:5px;">
												</p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

								</div>

								<div class="row">
									<div class="col-md-6 mt-20">
										<label class="control-label col-md-3 pt-20">HITUNG JENIS</label>
										<div class="form-group ">
											<div class="col-md-9 has-success">
												<div class="row">
													<div class="col-md-6">
														<label class="control-label col-md-3"
															style="color:black">BAS</label>
														<input type="text" class="form-control" id="inBAS">
														<p id="notifinBAS"
															style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>

														<label class="control-label col-md-3"
															style="color:black">EOS</label>
														<input type="text" class="form-control" id="inEOS">
														<p id="notifinEOS"
															style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>
													</div>
													<div class="col-md-6">
														<label class="control-label col-md-3"
															style="color:black">MONO</label>
														<input type="text" class="form-control" id="inMONO">
														<p id="notifinMONO"
															style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>

														<label class="control-label col-md-3"
															style="color:black">SEGMEN</label>
														<input type="text" class="form-control" id="inSEGMEN">
														<p id="notifinSEGMEN"
															style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>
													</div>
													<div class="col-md-6">
														<label class="control-label col-md-3"
															style="color:black">LYMPO</label>
														<input type="text" class="form-control" id="inLYMPO">
														<p id="notifinLYMPO"
															style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6 mt-40">
										<div class="form-group">
											<button onclick="insert_darah_rutin()"
												class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
													class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
					<!-- End Darah Rutin -->

					<!-- Darah GOL DARAH -->
					<div class="collapse" id="isiGOL-DARAH">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaDarah" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborGOL-DARAH" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">GOLONGAN DARAH</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inGOLDARAH">
											<p id="notifinGOLDARAH" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_gol_darah()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>

						</div>
					</div>
					<!-- End GOL DARAH -->

					<!-- LED -->
					<div class="collapse" id="isiLED">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaLED" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborLED" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">LED</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inLED">
											<p id="notifinLED" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_led()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End LED -->

					<!-- RHESUS -->
					<div class="collapse" id="isiRHESUS">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaRHESUS" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborRHESUS" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">RHESUS</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inRHESUS">
											<p id="notifinRHESUS" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_rhesus()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End RHESUS -->

					<!-- BLT -->
					<div class="collapse" id="isiBLT">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaBLT" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborBLT" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">BLT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inBLT">
											<p id="notifinBLT" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_blt()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End BLT -->

					<!-- CLT -->
					<div class="collapse" id="isiCLT">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaCLT" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborCLT" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">CLT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inCLT">
											<p id="notifinCLT" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_clt()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End CLT -->

					<!-- APTT -->
					<div class="collapse" id="isiAPTT">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaAPTT" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborAPTT" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">APTT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inAPTT">
											<p id="notifinAPTT" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_aptt()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End APTT -->

					<!-- PT (LUAR) -->
					<div class="collapse" id="isiPT">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaPT" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborPT" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_pt()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End PT -->

					<!-- GULDARAH -->
					<div class="collapse" id="isiGULDARAH">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaGULDARAH" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborGULDARAH" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>
							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">PUASA</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inPUASA">
											<p id="notifinPUASA" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">2 JAM PP</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="in2JAMPP">
											<p id="notifin2JAMPP" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>
							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">SEWAKTU</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inSEWAKTU">
											<p id="notifinSEWAKTU" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
										<div class="form-group">
											<button onclick="insert_guldarah()"
												class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
													class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										</div>
								</div>
							</div>
						</div>
						<!-- End GULDARAH -->
					</div>

					<!-- HBA -->
					<div class="collapse" id="isiHBA">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaHBA" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborHBA" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">HBA</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inHBA">
											<p id="notifinHBA" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_hba()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End HBA -->

					<!-- URIC ACID-->
					<div class="collapse" id="isiURIC">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaURIC" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborURIC" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">URIC ACID</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inURIC">
											<p id="notifinURIC" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_uric()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End URIC ACID -->

					<!-- TRIGLYSERIDE -->
					<div class="collapse" id="isiTRIGLYSERIDE">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaTRIGLYSERIDE" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborTRIGLYSERIDE" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">TRIGLYSERIDE</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inTRIGLYSERIDE">
											<p id="notifinTRIGLYSERIDE" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_trigiseride()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End URIC ACID -->

					<!-- CHO -->
					<div class="collapse" id="isiCHO">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaCHO" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborCHO" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">CHO</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inCHO">
											<p id="notifinCHO" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_cho()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End CHO -->

					<!-- HDL -->
					<div class="collapse" id="isiHDL">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaHDL" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborHDL" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">HDL</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inHDL">
											<p id="notifinHDL" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_hdl()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End HDL -->

					<!-- LDL -->
					<div class="collapse" id="isiLDL">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaLDL" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborLDL" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">LDL</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inLDL">
											<p id="notifinLDL" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_ldl()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End LDL -->

					<!-- UREUM -->
					<div class="collapse" id="isiUREUM">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaUREUM" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborUREUM" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">UREUM</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inUREUM">
											<p id="notifinUREUM" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_ureum()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End UREUM -->

					<!-- CREATININ -->
					<div class="collapse" id="isiCREATININ">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaCREATININ" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborCREATININ" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">CREATININ</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inCREATININ">
											<p id="notifinCREATININ" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_creatinin()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End CREATININ -->

					<!-- BIL.DIREK -->
					<div class="collapse" id="isiBILDIREK">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaBILDIREK" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborBILDIREK" disabled>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
									<button onclick="insert_bil_direk()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>
						</div>
					</div>
					<!-- End BIL.DIREK -->

					<!-- BIL.TOTAL -->
					<div class="collapse" id="isiBILTOTAL">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaBILTOTAL" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborBILTOTAL" disabled>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_bil_total()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>
						</div>
					</div>
					<!-- End BIL.TOTAL -->

					<!-- SGOT -->
					<div class="collapse" id="isiSGOT">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaSGOT" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborSGOT" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">SGOT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inSGOT">
											<p id="notifinSGOT" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_sgot()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End SGOT -->

					<!-- SGPT -->
					<div class="collapse" id="isiSGPT">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaSGPT" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborSGPT" disabled>
										</div>
									</div>
								</div>

								<div class="col-md-5">
									<div class="col-md-12 has-success">
										<select style="border: 1px solid lightgreen;" class="form-control  filled-input select2" placeholder="Choose a Category" id="inTipeMasuk" name="inTipeMasuk">
												<option value="0">-</option>
												<option value="1" class="active">12-60 Thn</option>
												<option value="2">60-90 Thn</option>
										</select>
									</div>
								</div>
							</div>
							<span class="help-block mb-30"></span>
							<div class="row mb-40">
								<div class="col-md-6">
									<div class="data_hide data_hide_1">
										<div class="row mt-10" >
											<div class="col-md-12">
												<div class="form-group ">
													<label class="control-label col-md-4 pt-5">SGPT UMUR 12-60 Tahun</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inSGPT1260">
														<p id="notifinSGPT1260" style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_hide data_hide_2">
										<div class="row mt-10">
											<div class="col-md-12">
												<div class="form-group ">
													<label class="control-label col-md-4 pt-5">SGPT UMUR 60-90 Tahun</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inSGPT6090">
														<p id="notifinSGPT6090" style="font-size:12px; margin-top:5px;"></p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 mb-2 pt-10">
									<button onclick="insert_sgpt()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
					<!-- End SGOT -->

					<!-- GGT -->
					<div class="collapse" id="isiGGT">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaGGT" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborGGT" disabled>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_bil_ggt()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>
						</div>
					</div>
					<!-- End GGT -->

					<!-- ALP -->
					<div class="collapse" id="isiALP">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaALP" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborALP" disabled>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_bil_alp()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>
						</div>
					</div>
					<!-- End ALP -->

					<!-- ELEKTROLIT -->
					<div class="collapse" id="isiELEKTROLIT">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaELEKTROLIT" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborELEKTROLIT" disabled>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-20">
								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">NA :</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inNA">
											<p id="notifinNA" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group mt-20">
										<label class="control-label col-md-3 pt-10">K :</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inK">
											<p id="notifinK" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mt-20">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">CL :</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inCL">
											<p id="notifinCL" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">Ca :</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inCa">
											<p id="notifinCa" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 mt-30">
											<div class="form-group">
												<button onclick="insert_bil_elektrolit()"
													class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
														class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<span class="help-block mb-20"></span>
						</div>
					</div>
					<!-- End ELEKTROLIT -->

					<!-- SPUTUMBTAI -->
					<div class="collapse" id="isiSPUTUMBTAI">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaSPUTUMBTAI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborSPUTUMBTAI" disabled>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-20">
								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">SPUTUM BTA I :</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inNA">
											<p id="notifinNA" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-12">
											<div class="form-group">
												<button onclick="insert_bil_sputumbtai()"
													class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
														class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										
										</div>
								</div>
							</div>
							<span class="help-block mb-20"></span>
						</div>
					</div>
					<!-- End SPUTUM BTA I -->

					<!-- SPUTUMBTAII -->
					<div class="collapse" id="isiSPUTUMBTAII">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaSPUTUMBTAII" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborSPUTUMBTAII" disabled>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-20">
								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">SPUTUM BTA II </label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inSPUTUMBTAII">
											<p id="notifinSPUTUMBTAII" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-12">
											<div class="form-group">
												<button onclick="insert_bil_sputumbtaii()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
											</div>
								</div>
							</div>
							<span class="help-block mb-20"></span>
						</div>
					</div>
					<!-- End SPUTUM BTA II -->

					<!-- SPUTUMBTAIII -->
					<div class="collapse" id="isiSPUTUMBTAIII">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaSPUTUMBTAIII" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborSPUTUMBTAIII" disabled>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-20">
								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">SPUTUM BTA III :</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inSPUTUMBTAIII">
											<p id="notifinSPUTUMBTAIII" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-12">
										<div class="form-group">
												<button onclick="insert_bil_sputumbtaiii()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										</div>
								</div>
							</div>
							<span class="help-block mb-20"></span>
						</div>
					</div>
					<!-- End SPUTUM BTA III -->

					<!-- End Everything -->
				</div>
			</div>
		</div>
	</div>
	<!-- End -->

</div>

<style>
	td {
		color: black;
	}

</style>


<script type="text/javascript">
                    $(document).ready(function () {
					$('#datable').DataTable({
									"language": {
            					"sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
    							"sProcessing":   "Sedang memproses...",
    							"sLengthMenu":   "Tampilkan _MENU_ entri",
    							"sZeroRecords":  "Tidak ditemukan data yang sesuai",
    							"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    							"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
    							"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
    							"sInfoPostFix":  "",
    							"sSearch":  "Pencarian :",
    							"sUrl":          "",
								"oPaginate": {
        						"sFirst":    "Pertama",
        						"sPrevious": "Sebelumnya",
        						"sNext":     "Selanjutnya",
        							"sLast":     "Terakhir"
    					        },
							        },		
									"ajax": '<?php echo base_url('Labor/tampil_datarajal'); ?>',	
									"deferRender": true,
									"processing": true,
									"order": [], 
									"columnDefs": [
            						{ 
                					"targets": [ 0 ], 
                					"orderable": false, 
            						},
            						],
							});
					});

					function reload_data_labor(id_pelayanan) {    
                        $('#tablelabor').dataTable().fnClearTable();
                        $('#tablelabor').dataTable().fnDestroy();
                        $('#tablelabor').DataTable({
                            "pageLength": 10,
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
                                    "sLast": "Terakhir",
                                }
                            },
                            "ajax": {
                                "url": '<?php echo base_url('Labor/tampil_rajal_labor'); ?>',
                                "type": 'POST',
                                "data": {
                                    id_pelayanan: id_pelayanan
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

					function reload_total_labor(id_pelayanan) {
                        $('#outTotalHargaRadiologi').dataTable().fnClearTable();
                        $('#outTotalHargaRadiologi').dataTable().fnDestroy();
                        $('#outTotalHargaRadiologi').DataTable({
                            "pageLength": 10,
                            "searching": false,
                            "lengthChange": false,
                            "bInfo": false,
                            "paging": false,
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
                                    "sLast": "Terakhir",
                                }
                            },
                            "ajax": {
                                "url": '<?php echo base_url('Labor/tampil_total_labor'); ?>',
                                "type": 'POST',
                                "data": {
                                    id_pelayanan: id_pelayanan
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

// Kondisi Display Modal Per-poli

		// POLI TTH
		function edit_data_tindakan(id_pelayanan, id_history, poli, nama, umur) {
				$('.data_hide_darah').addClass('collapse');
						$('#inTipeMasukDarah').change(function() {
						var selector = '.data_hide_darah_' + $(this).val();
						$('.data_hide_darah').collapse('hide');
						$(selector).collapse('show');
				});

                if(poli == 'THT'){
                	$("#idPelayanan").val(id_pelayanan);
                	$("#inNamaPasien").val(nama);
                    $("#inUmurPasien").val(umur);
                    $("#modal_edit_tht").modal('show');
                    reload_data_labor(id_pelayanan);
                    reload_total_labor(id_pelayanan);
                }else{
                    alert('tidak ketemu');
                }
        }

        function aksi_labor(id_tindakan_labor,id_pelayanan){
            $.ajax({
                url : "<?= base_url(). 'Labor/getLaborById'?>",
                data:{
                    tindakan:id_tindakan_labor,
					pelayanan:id_pelayanan,
                },
                type:'POST',
                dataType: 'json',
                success:function(data){
                    if(data.status_dt == "found"){
						if(data.nama == " Darah Rutin "){
							// Darah Rutin
							$("#inNama").val(data.nama);
							$('#isiDarahRutin').collapse('toggle');
							$('#isiLED').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiHDL').collapse('hide');
							$("#id_tindakan_laborDarahRutin").val(data.id_tindakan_labor);
						}else if(data.nama == " GOL DARAH "){
							// GOL DARAH
							$("#inNamaDarah").val(data.nama);
							$('#isiGOL-DARAH').collapse('toggle');
							$('#isiLED').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiHDL').collapse('hide');
							$("#id_tindakan_laborGOL-DARAH").val(data.id_tindakan_labor);
						}else if(data.nama == " LED "){
							// LED
							$("#inNamaLED").val(data.nama);
							$('#isiLED').collapse('toggle');
							$('#isiAPTT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$("#id_tindakan_laborLED").val(data.id_tindakan_labor);
						}else if(data.nama == "RHESUS"){
							// RHESUS
							$("#inNamaRHESUS").val(data.nama);
							$('#isiRHESUS').collapse('toggle');
							$('#isiSGOT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiHDL').collapse('hide');
							$("#id_tindakan_laborRHESUS").val(data.id_tindakan_labor);
						}else if(data.nama == " BLT "){
							// BLT
							$("#inNamaBLT").val(data.nama);
							$('#isiBLT').collapse('toggle');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiHDL').collapse('hide');
							$("#id_tindakan_laborBLT").val(data.id_tindakan_labor);
						}else if(data.nama == " CLT "){
							// CLT
							$("#inNamaCLT").val(data.nama);
							$('#isiCLT').collapse('toggle');
							$('#isiAPTT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$("#id_tindakan_laborCLT").val(data.id_tindakan_labor);
						}else if(data.nama == "APTT"){
							// APTT
							$("#inNamaAPTT").val(data.nama);
							$('#isiAPTT').collapse('toggle');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborAPTT").val(data.id_tindakan_labor);
						}else if(data.nama == "(LUAR) PT"){
							// PT
							$("#inNamaPT").val(data.nama);
							$('#isiPT').collapse('toggle');
							$('#isiAPTT').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$("#id_tindakan_laborPT").val(data.id_tindakan_labor);
						}else if(data.nama == " GULA DARAH "){
							// GULA DARAH
							$("#inNamaGULDARAH").val(data.nama);
							$('#isiGULDARAH').collapse('toggle');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborGULDARAH").val(data.id_tindakan_labor);
						}else if(data.nama == "HBA 1 C (A 1 C)"){
							// HBA 1 C (A 1 C)
							$("#inNamaHBA").val(data.nama);
							$('#isiHBA').collapse('toggle');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborHBA").val(data.id_tindakan_labor);
						}else if(data.nama == "URIC ACID"){
							// URIC ACID
							$("#inNamaURIC").val(data.nama);
							$('#isiURIC').collapse('toggle');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$("#id_tindakan_laborURIC").val(data.id_tindakan_labor);
						}else if(data.nama == "TRIGLYSERIDE"){
							// TRIGLYSERIDE
							$("#inNamaTRIGLYSERIDE").val(data.nama);
							$('#isiTRIGLYSERIDE').collapse('toggle');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiHDL').collapse('hide');
							$("#id_tindakan_laborTRIGLYSERIDE").val(data.id_tindakan_labor);
						}else if(data.nama == "CHO"){
							// CHO
							$("#inNamaCHO").val(data.nama);
							$('#isiCHO').collapse('toggle');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiHDL').collapse('hide');
							$("#id_tindakan_laborCHO").val(data.id_tindakan_labor);
						}else if(data.nama == "HDL"){
							// HDL
							$("#inNamaHDL").val(data.nama);
							$('#isiHDL').collapse('toggle');
							$('#isiLDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborHDL").val(data.id_tindakan_labor);
						}else if(data.nama == "LDL"){
							// LDL
							$("#inNamaLDL").val(data.nama);
							$('#isiLDL').collapse('toggle');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborLDL").val(data.id_tindakan_labor);
						}else if(data.nama == "UREUM"){
							// UREUM
							$("#inNamaUREUM").val(data.nama);
							$('#isiUREUM').collapse('toggle');
							$('#isiLDL').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborUREUM").val(data.id_tindakan_labor);
						}else if(data.nama == "CREATININ"){
							// CREATININ
							$("#inNamaCREATININ").val(data.nama);
							$('#isiCREATININ').collapse('toggle');
							$('#isiUREUM').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$("#id_tindakan_laborCREATININ").val(data.id_tindakan_labor);
						}else if(data.nama == "BIL.DIREK (LUAR)"){
							// BIL.DIREK (LUAR)
							$("#inNamaBILDIREK").val(data.nama);
							$('#isiBILDIREK').collapse('toggle');
							$('#isiCREATININ').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$("#id_tindakan_laborBILDIREK").val(data.id_tindakan_labor);
						}else if(data.nama == "BIL.TOTAL (LUAR)"){
							// BIL.TOTAL (LUAR)
							$("#inNamaBILTOTAL").val(data.nama);
							$('#isiBILTOTAL').collapse('toggle');
							$('#isiBILDIREK').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborBILTOTAL").val(data.id_tindakan_labor);
						}else if(data.nama == "SGOT"){
							// SGOT
							$("#inNamaSGOT").val(data.nama);
							$('#isiSGOT').collapse('toggle');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$("#id_tindakan_laborSGOT").val(data.id_tindakan_labor);
						}else if(data.nama == "SGPT"){
							// SGPT
							$("#inNamaSGPT").val(data.nama);
							$('#isiSGPT').collapse('toggle');
							$('.data_hide').addClass('collapse');
							$('#inTipeMasuk').change(function() {
								var selector = '.data_hide_' + $(this).val();
								$('.data_hide').collapse('hide');
								$(selector).collapse('show');
							});
							$('#isiALP').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborSGPT").val(data.id_tindakan_labor);
						}else if(data.nama == "GGT (LUAR)"){
							// GGT
							$("#inNamaGGT").val(data.nama);
							$('#isiGGT').collapse('toggle');
							$('#isiSGPT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborGGT").val(data.id_tindakan_labor);
						}else if(data.nama == "ALP (LUAR)"){
							// ALP
							$("#inNamaALP").val(data.nama);
							$('#isiALP').collapse('toggle');
							$('#isiGGT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$("#id_tindakan_laborALP").val(data.id_tindakan_labor);
						}else if(data.nama == "ELEKTROLIT "){
							// ELEKTROLIT
							$("#inNamaELEKTROLIT").val(data.nama);
							$('#isiELEKTROLIT').collapse('toggle');
							$('#isiALP').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$("#id_tindakan_laborELEKTROLIT").val(data.id_tindakan_labor);
						}else if(data.nama == " Sputum B T A I"){
							// SPUTUMBTAI
							$("#inNamaSPUTUMBTAI").val(data.nama);
							$('#isiSPUTUMBTAI').collapse('toggle');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborSPUTUMBTAI").val(data.id_tindakan_labor);
						}else if(data.nama == " Sputum B T A II"){
							// SPUTUMBTAII
							$("#inNamaSPUTUMBTAII").val(data.nama);
							$('#isiSPUTUMBTAII').collapse('toggle');
							$('#isiSPUTUMBTAIII').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborSPUTUMBTAII").val(data.id_tindakan_labor);
						}else if(data.nama == " Sputum B T A III"){
							// SPUTUMBTAIII
							$("#inNamaSPUTUMBTAIII").val(data.nama);
							$('#isiSPUTUMBTAIII').collapse('toggle');
							$('#isiSPUTUMBTAII').collapse('hide');
							$('#isiSPUTUMBTAI').collapse('hide');
							$('#isiELEKTROLIT').collapse('hide');
							$('#isiALP').collapse('hide');
							$('#isiGGT').collapse('hide');
							$('#isiSGOT').collapse('hide');
							$('#isiBILTOTAL').collapse('hide');
							$('#isiSGPT').collapse('hide');
							$('#isiBILDIREK').collapse('hide');
							$('#isiCREATININ').collapse('hide');
							$('#isiUREUM').collapse('hide');
							$('#isiLDL').collapse('hide');
							$('#isiHDL').collapse('hide');
							$('#isiCHO').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiURIC').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiGULDARAH').collapse('hide');
							$('#isiPT').collapse('hide');
							$('#isiAPTT').collapse('hide');
							$('#isiCLT').collapse('hide');
							$('#isiBLT').collapse('hide');
							$('#isiRHESUS').collapse('hide');
							$('#isiLED').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiDarahRutin').collapse('hide');
							$("#id_tindakan_laborSPUTUMBTAIII").val(data.id_tindakan_labor);
						}else{
							swal({   
								title: "DATA TIDAK DITEMUKAN",   
								text: "Silahkan periksa pilihan aksi Anda",
								type: "warning",   
								confirmButtonColor: "#3cb878",   
							});
						}
                    }else{
                        alert("data tidak ditemukan");
                    }
                }
            });

			// KeyUP HB
			$('#inHB').keyup(function() {
				$('#notifinHB').html('');
				a = $('#inHB').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHB').html(html);
				}else if (a >= 11.3 && a <= 15.7) {
					html = '<b style="color:blue">HB NORMAL PRIA DEWASA</b>';
					$('#notifinHB').html(html);
				}else if (a >= 9.3 && a <= 13.6) {
				html = '<b style="color:blue">HB NORMAL WANITA DEWASA</b>';
				$('#notifinHB').html(html);
				} else{
					html = '<b style="color:red">HB TIDAK NORMAL</b>';
					$('#notifinHB').html(html);
				}
			});

			// KeyUP LEUKOSIT
			$('#inLEUKOSIT').keyup(function() {
				$('#notifinLEUKOSIT').html('');
				a = $('#inLEUKOSIT').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEUKOSIT').html(html);
				}else if (a >= 4000 && a <= 10000) {
					html = '<b style="color:blue">LEUKOSIT NORMAL</b>';
					$('#notifinLEUKOSIT').html(html);
				} else{
					html = '<b style="color:red">LEUKOSIT TIDAK NORMAL</b>';
					$('#notifinLEUKOSIT').html(html);
				}
			});

			// KeyUP TROMBOSIT
			$('#inTROMBOSIT').keyup(function() {
				$('#notifinTROMBOSIT').html('');
				a = $('#inTROMBOSIT').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTROMBOSIT').html(html);
				}else if (a >= 150000 && a <= 400000) {
					html = '<b style="color:blue">TROMBOSIT NORMAL</b>';
					$('#notifinTROMBOSIT').html(html);
				} else{
					html = '<b style="color:red">TROMBOSIT TIDAK NORMAL</b>';
					$('#notifinTROMBOSIT').html(html);
				}
			});

			// KeyUP HEMATOKRIT				
			$('#inHEMATOKRIT').keyup(function() {
				$('#notifinHEMATOKRIT').html('');
				a = $('#inHEMATOKRIT').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHEMATOKRIT').html(html);
				}else if (a >= 40 && a <= 52) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL PRIA DEWASA</b>';
					$('#notifinHEMATOKRIT').html(html);
				}else if (a >= 35 && a <= 47) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL WANITA DEWASA</b>';
					$('#notifinHEMATOKRIT').html(html);
				} else{
					html = '<b style="color:red">HEMATOKRIT TIDAK NORMAL</b>';
					$('#notifinHEMATOKRIT').html(html);
				}
			});

			// KeyUP ERITROSIT				
			$('#inERITROSIT').keyup(function() {
				$('#notifinERITROSIT').html('');
				a = $('#inERITROSIT').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinERITROSIT').html(html);
				}else if (a >= 4.5 && a <= 5.9) {
					html = '<b style="color:blue">ERITROSIT NORMAL PRIA DEWASA</b>';
					$('#notifinERITROSIT').html(html);
				}else if (a >= 4.1 && a <= 5.1) {
					html = '<b style="color:blue">ERITROSIT NORMAL WANITA DEWASA</b>';
					$('#notifinERITROSIT').html(html);
				} else{
					html = '<b style="color:red">ERITROSIT TIDAK NORMAL</b>';
					$('#notifinERITROSIT').html(html);
				}
			});

			// KeyUP BAS			
			$('#inBAS').keyup(function() {
				$('#notifinBAS').html('');
				a = $('#inBAS').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBAS').html(html);
				}else if (a >= 0 && a <= 1) {
					html = '<b style="color:blue">BAS NORMAL</b>';
					$('#notifinBAS').html(html);
				} else{
					html = '<b style="color:red">BAS TIDAK NORMAL</b>';
					$('#notifinBAS').html(html);
				}
			});

			// KeyUP EOS			
			$('#inEOS').keyup(function() {
				$('#notifinEOS').html('');
				a = $('#inEOS').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinEOS').html(html);
				}else if (a >= 2 && a <= 4) {
					html = '<b style="color:blue">EOS NORMAL</b>';
					$('#notifinEOS').html(html);
				} else{
					html = '<b style="color:red">EOS TIDAK NORMAL</b>';
					$('#notifinEOS').html(html);
				}
			});

			// KeyUP MONO		
			$('#inMONO').keyup(function() {
				$('#notifinMONO').html('');
				a = $('#inMONO').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMONO').html(html);
				}else if (a >= 2 && a <= 8) {
					html = '<b style="color:blue">MONO NORMAL</b>';
					$('#notifinMONO').html(html);
				} else{
					html = '<b style="color:red">MONO TIDAK NORMAL</b>';
					$('#notifinMONO').html(html);
				}
			});

			// KeyUP SEGMEN		
			$('#inSEGMEN').keyup(function() {
				$('#notifinSEGMEN').html('');
				a = $('#inSEGMEN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSEGMEN').html(html);
				}else if (a >= 50 && a <= 70) {
					html = '<b style="color:blue">SEGMEN NORMAL</b>';
					$('#notifinSEGMEN').html(html);
				} else{
					html = '<b style="color:red">SEGMEN TIDAK NORMAL</b>';
					$('#notifinSEGMEN').html(html);
				}
			});

			// KeyUP LYMPO		
			$('#inLYMPO').keyup(function() {
				$('#notifinLYMPO').html('');
				a = $('#inLYMPO').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLYMPO').html(html);
				}else if (a >= 25 && a <= 40) {
					html = '<b style="color:blue">LYMPO NORMAL</b>';
					$('#notifinLYMPO').html(html);
				} else{
					html = '<b style="color:red">LYMPO TIDAK NORMAL</b>';
					$('#notifinLYMPO').html(html);
				}
			});

			// KeyUP MCV	
			$('#inMCV').keyup(function() {
				$('#notifinMCV').html('');
				a = $('#inMCV').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCV').html(html);
				}else if (a >= 80 && a <= 96) {
					html = '<b style="color:blue">MCV NORMAL</b>';
					$('#notifinMCV').html(html);
				} else{
					html = '<b style="color:red">MCV TIDAK NORMAL</b>';
					$('#notifinMCV').html(html);
				}
			});

			// KeyUP MCH	
			$('#inMCH').keyup(function() {
				$('#notifinMCH').html('');
				a = $('#inMCH').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCH').html(html);
				}else if (a >= 28 && a <= 33) {
					html = '<b style="color:blue">MCH NORMAL</b>';
					$('#notifinMCH').html(html);
				} else{
					html = '<b style="color:red">MCH TIDAK NORMAL</b>';
					$('#notifinMCH').html(html);
				}
			});

			// KeyUP MCHC
			$('#inMCHC').keyup(function() {
				$('#notifinMCHC').html('');
				a = $('#inMCHC').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCHC').html(html);
				}else if (a >= 33 && a <= 36) {
					html = '<b style="color:blue">MCHC NORMAL</b>';
					$('#notifinMCHC').html(html);
				} else{
					html = '<b style="color:red">MCHC TIDAK NORMAL</b>';
					$('#notifinMCHC').html(html);
				}
			});

			// KeyUP RDW-CV
			$('#inRDW-CV').keyup(function() {
				$('#notifinRDW-CV').html('');
				a = $('#inRDW-CV').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinRDW-CV').html(html);
				}else if (a >= 11.0 && a <= 16.0) {
					html = '<b style="color:blue">RDW-CV NORMAL</b>';
					$('#notifinRDW-CV').html(html);
				} else{
					html = '<b style="color:red">RDW-CV TIDAK NORMAL</b>';
					$('#notifinRDW-CV').html(html);
				}
			});

			// KeyUP RDW-SD
			$('#inRDW-SD').keyup(function() {
				$('#notifinRDW-SD').html('');
				a = $('#inRDW-SD').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinRDW-SD').html(html);
				}else if (a >= 35.0 && a <= 56.0) {
					html = '<b style="color:blue">RDW-SD NORMAL</b>';
					$('#notifinRDW-SD').html(html);
				} else{
					html = '<b style="color:red">RDW-SD TIDAK NORMAL</b>';
					$('#notifinRDW-SD').html(html);
				}
			});

			// KeyUP LED
			$('#inLED').keyup(function() {
				$('#notifinLED').html('');
				a = $('#inLED').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLED').html(html);
				}else if (a >= 0 && a <= 10) {
					html = '<b style="color:blue">LED NORMAL PRIA DEWASA</b>';
					$('#notifinLED').html(html);
				}else if (a >= 0 && a <= 15) {
					html = '<b style="color:blue">LED NORMAL WANITA DEWASA</b>';
					$('#notifinLED').html(html);
				} else{
					html = '<b style="color:red">LED TIDAK NORMAL</b>';
					$('#notifinLED').html(html);
				}
			});

			// KeyUP RHESUS
			$('#inRHESUS').keyup(function() {
				$('#notifinRHESUS').html('');
				a = $('#inRHESUS').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinRHESUS').html(html);
				}
			});

			// KeyUP BLT
			$('#inBLT').keyup(function() {
				$('#notifinBLT').html('');
				a = $('#inBLT').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBLT').html(html);
				}else if( a >= 1 && a <= 6){
					html = '<b style="color:blue">BLT NORMAL</b>';
					$('#notifinBLT').html(html);
				}else{
					html = '<b style="color:red">BLT TIDAK NORMAL</b>';
					$('#notifinBLT').html(html);
				}
			});

			// KeyUP CLT
			$('#inCLT').keyup(function() {
				$('#notifinCLT').html('');
				a = $('#inCLT').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCLT').html(html);
				}else if( a >= 2 && a <= 6){
					html = '<b style="color:blue">CLT NORMAL</b>';
					$('#notifinCLT').html(html);
				}else{
					html = '<b style="color:red">CLT TIDAK NORMAL</b>';
					$('#notifinCLT').html(html);
				}
			});

			// KeyUP APTT
			$('#inAPTT').keyup(function() {
				$('#notifinAPTT').html('');
				a = $('#inAPTT').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinAPTT').html(html);
				}else if( a >= 25 && a <= 40){
					html = '<b style="color:blue">APTT NORMAL</b>';
					$('#notifinAPTT').html(html);
				}else{
					html = '<b style="color:red">APTT TIDAK NORMAL</b>';
					$('#notifinAPTT').html(html);
				}
			});

			// KeyUP PUASA
			$('#inPUASA').keyup(function() {
				$('#notifinPUASA').html('');
				a = $('#inPUASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPUASA').html(html);
				}else if( a >= 76 && a <= 110){
					html = '<b style="color:blue">PUASA NORMAL</b>';
					$('#notifinPUASA').html(html);
				}else{
					html = '<b style="color:red">PUASA TIDAK NORMAL</b>';
					$('#notifinPUASA').html(html);
				}
			});

			// KeyUP 2 JAM PP
			$('#in2JAMPP').keyup(function() {
				$('#notifin2JAMPP').html('');
				a = $('#in2JAMPP').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifin2JAMPP').html(html);
				}else if( a < 150){
					html = '<b style="color:blue">2 JAM PP NORMAL</b>';
					$('#notifin2JAMPP').html(html);
				}else{
					html = '<b style="color:red">2 JAM PP TIDAK NORMAL</b>';
					$('#notifin2JAMPP').html(html);
				}
			});

			// KeyUP SEWAKTU
			$('#inSEWAKTU').keyup(function() {
				$('#notifinSEWAKTU').html('');
				a = $('#inSEWAKTU').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSEWAKTU').html(html);
				}else if( a >= 110 && a <= 150){
					html = '<b style="color:blue">SEWAKTU NORMAL</b>';
					$('#notifinSEWAKTU').html(html);
				}else{
					html = '<b style="color:red">SEWAKTU TIDAK NORMAL</b>';
					$('#notifinSEWAKTU').html(html);
				}
			});

			// KeyUP HBA
			$('#inHBA').keyup(function() {
				$('#notifinHBA').html('');
				a = $('#inHBA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHBA').html(html);
				}else if( a >= 4 && a <= 5.6){
					html = '<b style="color:blue">HBA1C NORMAL</b>';
					$('#notifinHBA').html(html);
				}else{
					html = '<b style="color:red">HBA1C TIDAK NORMAL</b>';
					$('#notifinHBA').html(html);
				}
			});

			// KeyUP URIC
			$('#inURIC').keyup(function() {
				$('#notifinURIC').html('');
				a = $('#inURIC').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinURIC').html(html);
				}else if( a >= 2.6 && a <= 6.0){
					html = '<b style="color:blue">URIC ACID NORMAL WANITA</b>';
					$('#notifinURIC').html(html);
				}else if( a >= 3.4 && a <= 7.2){
					html = '<b style="color:blue">URIC ACID NORMAL PRIA</b>';
					$('#notifinURIC').html(html);
				}else{
					html = '<b style="color:red">URIC ACID TIDAK NORMAL</b>';
					$('#notifinURIC').html(html);
				}
			});
			
			// KeyUP TRIGLYSERIDE
			$('#inTRIGLYSERIDE').keyup(function() {
				$('#notifinTRIGLYSERIDE').html('');
				a = $('#inTRIGLYSERIDE').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTRIGLYSERIDE').html(html);
				}else if( a >= 60 && a <= 150){
					html = '<b style="color:blue">TRIGLISERIDA NORMAL</b>';
					$('#notifinTRIGLYSERIDE').html(html);
				}else{
					html = '<b style="color:red">TRIGLISERIDA TIDAK NORMAL</b>';
					$('#notifinTRIGLYSERIDE').html(html);
				}
			});

			// KeyUP TRIGLYSERIDE
			$('#inTRIGLYSERIDE').keyup(function() {
				$('#notifinTRIGLYSERIDE').html('');
				a = $('#inTRIGLYSERIDE').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTRIGLYSERIDE').html(html);
				}else if( a >= 60 && a <= 150){
					html = '<b style="color:blue">TRIGLISERIDA NORMAL</b>';
					$('#notifinTRIGLYSERIDE').html(html);
				}else{
					html = '<b style="color:red">TRIGLISERIDA TIDAK NORMAL</b>';
					$('#notifinTRIGLYSERIDE').html(html);
				}
			});

			// KeyUP CHO
			$('#inCHO').keyup(function() {
				$('#notifinCHO').html('');
				a = $('#inCHO').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCHO').html(html);
				}else if( a >= 120 && a <= 200){
					html = '<b style="color:blue">CHO NORMAL</b>';
					$('#notifinCHO').html(html);
				}else{
					html = '<b style="color:red">CHO TIDAK NORMAL</b>';
					$('#notifinCHO').html(html);
				}
			});

			// KeyUP HDL
			$('#inHDL').keyup(function() {
				$('#notifinHDL').html('');
				a = $('#inHDL').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHDL').html(html);
				}else if( a >= 35 && a <= 60){
					html = '<b style="color:blue">HDL NORMAL</b>';
					$('#notifinHDL').html(html);
				}else{
					html = '<b style="color:red">HDL TIDAK NORMAL</b>';
					$('#notifinHDL').html(html);
				}
			});

			// KeyUP LDL
			$('#inLDL').keyup(function() {
				$('#notifinLDL').html('');
				a = $('#inLDL').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLDL').html(html);
				}else if( a < 150){
					html = '<b style="color:blue">LDL NORMAL</b>';
					$('#notifinLDL').html(html);
				}else{
					html = '<b style="color:red">LDL TIDAK NORMAL</b>';
					$('#notifinLDL').html(html);
				}
			});

			// KeyUP UREUM
			$('#inUREUM').keyup(function() {
				$('#notifinUREUM').html('');
				a = $('#inUREUM').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinUREUM').html(html);
				}else if( a >= 10 && a <= 50){
					html = '<b style="color:blue">UREUM NORMAL</b>';
					$('#notifinUREUM').html(html);
				}else{
					html = '<b style="color:red">UREUM TIDAK NORMAL</b>';
					$('#notifinUREUM').html(html);
				}
			});

			// KeyUP CREATININ
			$('#inCREATININ').keyup(function() {
				$('#notifinCREATININ').html('');
				a = $('#inCREATININ').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCREATININ').html(html);
				}else if (a >= 0.6 && a <= 1.1) {
					html = '<b style="color:blue">CREATININ NORMAL PRIA DEWASA</b>';
					$('#notifinCREATININ').html(html);
				}else if (a >= 0.5 && a <= 1.5) {
					html = '<b style="color:blue">CREATININ NORMAL WANITA DEWASA</b>';
					$('#notifinCREATININ').html(html);
				} else{
					html = '<b style="color:red">CREATININ TIDAK NORMAL</b>';
					$('#notifinCREATININ').html(html);
				}
			});
			
			// KeyUP SGOT
			$('#inSGOT').keyup(function() {
				$('#notifinSGOT').html('');
				a = $('#inSGOT').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSGOT').html(html);
				}else if( a >= 13 && a <= 35){
					html = '<b style="color:blue">SGOT NORMAL WANITA</b>';
					$('#notifinSGOT').html(html);
				}else if( a >= 15 && a <= 40){
					html = '<b style="color:blue">SGOT NORMAL PRIA</b>';
					$('#notifinSGOT').html(html);
				}else{
					html = '<b style="color:red">SGOT TIDAK NORMAL</b>';
					$('#notifinSGOT').html(html);
				}
			});

			// KeyUP SGPT
			$('#inSGPT1260').keyup(function() {
				$('#notifinSGPT1260').html('');
				a = $('#iSGPT1260').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSGPT1260').html(html);
				}else if( a >= 7 && a <= 35){
					html = '<b style="color:blue">SGPT UMUR 12-60 NORMAL WANITA</b>';
					$('#notifinSGPT1260').html(html);
				}else if( a >= 10 && a <= 40){
					html = '<b style="color:blue">SGPT UMUR 12-60 NORMAL PRIA</b>';
					$('#notifinSGPT1260').html(html);
				}else{
					html = '<b style="color:red">SGPT TIDAK NORMAL</b>';
					$('#notifinSGPT1260').html(html);
				}
			});

			$('#inSGPT6090').keyup(function() {
				$('#notifinSGPT6090').html('');
				a = $('#inSGPT6090').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSGPT6090').html(html);
				}else if( a >= 10 && a <= 28){
					html = '<b style="color:blue">SGPT UMUR 60-90 NORMAL WANITA</b>';
					$('#notifinSGPT6090').html(html);
				}else if( a >= 13 && a <= 40){
					html = '<b style="color:blue">SGPT UMUR 60-90 NORMAL PRIA</b>';
					$('#notifinSGPT6090').html(html);
				}else{
					html = '<b style="color:red">SGPT TIDAK NORMAL</b>';
					$('#notifinSGPT6090').html(html);
				}
			});
			// End

			// KeyUP ELEKTROLIT
			$('#inNA').keyup(function() {
				$('#notifinNA').html('');
				a = $('#inNA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinNA').html(html);
				}else if( a >= 128 && a <= 138){
					html = '<b style="color:blue">NA NORMAL</b>';
					$('#notifinNA').html(html);
				}else{
					html = '<b style="color:red">NA TIDAK NORMAL</b>';
					$('#notifinNA').html(html);
				}
			});


			$('#inK').keyup(function() {
				$('#notifinK').html('');
				a = $('#inK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinK').html(html);
				}else if( a >= 3.9 && a <= 4.9){
					html = '<b style="color:blue">K NORMAL</b>';
					$('#notifinK').html(html);
				}else{
					html = '<b style="color:red">K TIDAK NORMAL</b>';
					$('#notifinK').html(html);
				}
			});

			$('#inCL').keyup(function() {
				$('#notifinCL').html('');
				a = $('#inCL').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCL').html(html);
				}else if( a >= 88 && a <= 100){
					html = '<b style="color:blue">CL NORMAL</b>';
					$('#notifinCL').html(html);
				}else{
					html = '<b style="color:red">CL TIDAK NORMAL</b>';
					$('#notifinCL').html(html);
				}
			});

			$('#inCa').keyup(function() {
				$('#notifinCa').html('');
				a = $('#inCa').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCa').html(html);
				}else if( a >= 0.99 && a <= 1.29){
					html = '<b style="color:blue">Ca NORMAL</b>';
					$('#notifinCa').html(html);
				}else{
					html = '<b style="color:red">Ca TIDAK NORMAL</b>';
					$('#notifinCa').html(html);
				}
			});
			// End


        }

// End Dewsa //

        function update_tindakan(){
            a = $("#inNama").val();
            b = $("#idPelayanan").val();
            c = $("#inJumlah").val();
            d = $("#gambar").val();
            e = $("#id_tindakan_labor").val();
            f = $("#inDPJP").val();
            g = $("#inBiaya").val();
            h = $("#inKet").val();
           
            swal({
                title: "Info!",
                text:"Anda akan menyimpan tindakan " +a+ "",
                type: "info",
                showCancelButton:true,
                confirmButtonColor: "#3cb878",
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal",
                closeOnConfirm:false
            }, 
            function(){   
				$().ready(function(){                                        
					$.ajax({  
						url : "<?php echo base_url() ?>Labor/update_tht",
						method: "POST",
						dataType: 'json',
						data : {
							idPelayanan:b,
							inJumlah:c,
						    gambar:d,
							id_tindakan_labor:e,
							inDPJP:f,
							inBiaya:g,
                            inKet:h
						},  
						success: function(data){
							if(data.status=="success"){
								swal({   
									title: "good job!",   
									type: "success", 
									text: "Data berhasil disimpan",
									confirmButtonColor: "#3cb878",   
								});
								 $("#inNama").val('');
								 $("#inJumlah").val('');
								 $("#gambar").val('');
								 $("#inBiaya").val('');
								 $("#inKet").val('');
           
								$('#tablelabor').DataTable().ajax.reload();
								$('#outTotalHargaRadiologi').DataTable().ajax.reload();
							}else{
								swal({   
									title: "Gagal!",   
									type: "warning", 
									text: data.status,
									confirmButtonColor: "#3cb878",   
								});
							}
						}              
					});                    
				});   
			});
        }
    </script>

    <script type="text/javascript">
                function convertToRupiah(angka) {
                    var rupiah = '';
                    var angkarev = angka.toString().split('').reverse().join('');
                    for (var i = 0; i < angkarev.length; i++)
                        if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
                    return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
                }
     </script>
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
