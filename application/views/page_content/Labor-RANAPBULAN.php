<<<<<<< HEAD
<!-- BULAN -->
<div class="modal fade bs-example-modal-lg" id="modal_edit_BULAN" role="dialog" aria-labelledby="myLargeModalLabel"aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN LABOR
					RAWAT INAP
				</h5>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="modal-body mt-5">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
						<hr width="95%">
						<a id="cetak_semua_bulan" class="btn btn-primary ml-20 mb-20"><i class='icon-printer'></i>&nbsp; CETAK SEMUA DATA LABOR</a> 
						<div class="table-wrap" style="width: 95%; margin: auto ">
							<div class="table-responsive">
								<table class="table table-hover display pb-60" id="tablelaborBULAN">
									<thead>
										<tr class="bg-success">
											<th>NO</th>
											<th>AKSI</th>
											<th>STATUS</th>
											<th>NAMA TINDAKAN</th>
											<th>TANGGAL TINDAKAN</th>
											<th>WAKTU TINDAKAN</th>
											<th>BIAYA TINDAKAN </th>
											<th>JUMLAH TINDAKAN</th>
											<th>STAFF REQUEST</th>
											<th>STAFF KONFIRMASI</th>
											<th>RINGKASAN</th>
											<th>KETERANGAN</th>
											<th>HAPUS</th>
										</tr>
									</thead>
									<tfoot>
										<tr class="bg-success">
											<th>NO</th>
											<th>AKSI</th>
											<th>STATUS</th>
											<th>NAMA TINDAKAN</th>
											<th>TANGGAL TINDAKAN</th>
											<th>WAKTU TINDAKAN</th>
											<th>BIAYA TINDAKAN </th>
											<th>JUMLAH TINDAKAN</th>
											<th>STAFF REQUEST</th>
											<th>STAFF KONFIRMASI</th>
											<th>RINGKASAN</th>
											<th>KETERANGAN</th>
											<th>HAPUS</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>

								<!-- Detail Tindakan -->
					<div class="collapse" id="detailTindakanLaborBULAN">
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>DETAIL
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" disabled id="outNamaBULAN">
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">TANGGAL TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="outTanggalBULAN" disabled>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								
							</div>
							<span class="help-block"></span>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">BIAYA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" disabled id="outHargaBULAN">
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">JUMLAH TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="outFrekBULAN" disabled>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>
							<span class="help-block"></span>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">RINGKASAN KLINIS</label>
										<div class="col-md-9 has-error">
										<textarea class="form-control" id="outRingBULAN" disabled rows="13"
													style="max-width:95%; "></textarea>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">KETERANGAN</label>
										<div class="col-md-9 has-error">
										<textarea class="form-control" id="outKetaBULAN" disabled rows="13"
													style="max-width:95%; "></textarea>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End -->
					</div>	

					<div class="row">
						<div class="col-md-8"></div>
						<div class="col-md-4 pull-right mt-20">
							<div class="table-wrap" style="width: 85%; margin-bottom:40px;">
								<div class="table-responsive ">
									<table class="table table-hover display " id="outTotalHargaBULAN">
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

					<div class="row">
						<div class="col-md-12">
							<div class="col-md-6 mb-20 mt-10">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA PASIEN :</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" disabled id="inNamaPasienBULAN">
									</div>
								</div>
							</div>

							<div class="col-md-6 mb-20 mt-10">
								<div class="form-group ">
									<label class="control-label col-md-3">UMUR PASIEN :</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" disabled id="inUmurPasienBULAN">
									</div>
								</div>
								<div class="row mt-20">
									<div class="col-md-12 mb-20 mt-20">
										<div class="form-group ">
											<label class="control-label col-md-3">JENIS KELAMIN :</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" disabled
													id="inJenisPasienBULAN">
												<input type="hidden" class="form-control" disabled
												id="inMasukBULAN">
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>

				<!-- Darah DARAH SAMAR -->
				<div class="collapse" id="isiDARAHSAMARBULAN">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaDARAHSAMARBULAN" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborDARAHSAMARBULAN"
												disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">DARAH SAMAR</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inDARAHSAMARBULAN">
											<p id="notifinDARAHSAMARBULAN" style="font-size:12px; margin-top:5px;">
											</p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_bulan_darahsamar()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				<!-- End DARAH SAMAR -->

			<!-- Start -->
			<div class="row">
				<div class="col-md-12">
					<!-- Darah Rutin -->
					<div class="collapse" id="isiDARAHBULAN">
						<!-- FORM DARAH RUTIN NORMAL -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaDARAHBULAN" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborDARAHBULAN"
												disabled>
											<input type="hidden" class="form-control" id="Harga_Darah_Rutin_Bulan"
												disabled>
											<input type="hidden" class="form-control"
												id="id_pelayanan_Darah_Rutin_Bulan" disabled>
											<input type="hidden" class="form-control"
												id="id_list_tindakan_Darah_Rutin_Bulan" disabled>
											<input type="hidden" class="form-control" id="total_Darah_Rutin_Bulan"
												disabled>
											<input type="hidden" class="form-control" id="tanggal_Darah_Rutin_Bulan"
												disabled>
											<input type="hidden" class="form-control" id="id_staff_Darah_Rutin_Bulan"
												disabled>
										</div>
									</div>
								</div>
							</div>


							<div class="row mt-20">
								<div class="col-md-6">
									<div class="col-md-2">
										<label class="control-label col-md-3 mt-10">HB</label>
									</div>
									<div class="col-md-10 has-success">
										<select style="border: 1px solid lightgreen;"
											class="form-control  filled-input select2" placeholder="Choose a Category"
											id="inTipeMasukHBBULAN">
											<option value="0">-</option>
											<option value="1">HB UMUR 40 - 50 Hari</option>
											<option value="2">HB UMUR >50 Hari - 2.5 Bulan</option>
											<option value="3">HB UMUR 2.6 - 3.5 Bulan</option>
											<option value="4">HB UMUR 4 - 7 Bulan</option>
											<option value="5">HB UMUR 8 Bulan - 12 Bulan</option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="data_hide data_hide_1">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group ">
													<label class="control-label col-md-4 pt-5">HB UMUR 40 - 50
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inHB4050BULAN">
														<p id="notifinHB4050BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_hide data_hide_2">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group ">
													<label class="control-label col-md-4 pt-5">HB UMUR >50 Hari - 2.5
														Bulan
													</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inHB5025BULAN">
														<p id="notifinHB5025BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_hide data_hide_3">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group ">
													<label class="control-label col-md-4 pt-5">HB UMUR 2.6 - 3.5
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inHB2635BULAN">
														<p id="notifinHB2635BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_hide data_hide_4">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group ">
													<label class="control-label col-md-4 pt-5">HB UMUR 4 - 7
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inHB47BULAN">
														<p id="notifinHB47BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_hide data_hide_5">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group ">
													<label class="control-label col-md-4 pt-5">HB UMUR 8 - 12
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inHB812BULAN">
														<p id="notifinHB812BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


							<div class="row mt-20">
								<div class="col-md-6">
									<div class="col-md-2">
										<label class="control-label col-md-2">HEMA
											TOKRIT </label>
									</div>
									<div class="col-md-10 has-success">
										<select style="border: 1px solid lightgreen;"
											class="form-control  filled-input select2" placeholder="Choose a Category"
											id="inTipeMasukHEMATOKRITBULAN">
											<option value="0">-</option>
											<option value="1">HEMATOKRIT UMUR 40 - 50 Hari</option>
											<option value="2">HEMATOKRIT UMUR >50 Hari - 2.5 Bulan</option>
											<option value="3">HEMATOKRIT UMUR 2.6 - 3.5 Bulan</option>
											<option value="4">HEMATOKRIT UMUR 4 - 7 Bulan</option>
											<option value="5">HEMATOKRIT UMUR 8 Bulan - 12 Bulan</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="data_hema data_hema_1">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">HEMATOKRIT UMUR 40 - 50
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control"
															id="inHEMATOKRIT4050BULAN">
														<p id="notifinHEMATOKRIT4050BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_hema data_hema_2">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">HEMATOKRIT UMUR >50 Hari
														- 2.5
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control"
															id="inHEMATOKRIT5025BULAN">
														<p id="notifinHEMATOKRIT5025BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_hema data_hema_3">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">HEMATOKRIT UMUR 2.6 -
														3.5 Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control"
															id="inHEMATOKRIT2635BULAN">
														<p id="notifinHEMATOKRIT2635BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_hema data_hema_4">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">HEMATOKRIT UMUR 4 -
														7 Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control"
															id="inHEMATOKRIT47BULAN">
														<p id="notifinHEMATOKRIT47BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_hema data_hema_5">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">HEMATOKRIT UMUR 8 -
														12 Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control"
															id="inHEMATOKRIT812BULAN">
														<p id="notifinHEMATOKRIT812BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-20">
								<div class="col-md-6">
									<div class="col-md-2 mt-10">
										<label class="control-label col-md-2">MCV </label>
									</div>
									<div class="col-md-10 has-success">
										<select style="border: 1px solid lightgreen;"
											class="form-control  filled-input select2" placeholder="Choose a Category"
											id="inTipeMasukMCVBULAN">
											<option value="0">-</option>
											<option value="1">MCV UMUR 37 Hari</option>
											<option value="2">MCV UMUR 1.5 - 2.5 Bulan</option>
											<option value="3">MCV UMUR 2.6 - 3.5 Bulan</option>
											<option value="4">MCV UMUR 3.5 - 7 Bulan</option>
											<option value="5">MCV UMUR 7 - 12 Bulan</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="data_mcv data_mcv_1">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCV UMUR 37
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCV37BULAN">
														<p id="notifinMCV37BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_mcv data_mcv_2">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCV UMUR 1.5 - 2.5
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCV1525BULAN">
														<p id="notifinMCV1525BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_mcv data_mcv_3">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCV UMUR 2.6 - 3.5
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCV2635BULAN">
														<p id="notifinMCV2635BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_mcv data_mcv_4">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCV UMUR 3.5 - 7
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCV357BULAN">
														<p id="notifinMCV357BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_mcv data_mcv_5">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCV UMUR 7 - 12
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCV712BULAN">
														<p id="notifinMCV712BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-20">
								<div class="col-md-6">
									<div class="col-md-2 mt-10">
										<label class="control-label col-md-2">MCH </label>
									</div>
									<div class="col-md-10 has-success">
										<select style="border: 1px solid lightgreen;"
											class="form-control  filled-input select2" placeholder="Choose a Category"
											id="inTipeMasukMCHBULAN">
											<option value="0">-</option>
											<option value="1">MCH UMUR 37 Hari</option>
											<option value="2">MCH UMUR 1 - 1.5 Bulan</option>
											<option value="3">MCH UMUR 2 - 2.5 Bulan</option>
											<option value="4">MCH UMUR 2.6 - 3.5 Bulan</option>
											<option value="5">MCH UMUR 3.6 - 10 Bulan</option>
											<option value="6">MCH 11 Bulan - 5 Tahun</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="data_mch data_mch_1">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCH UMUR 37
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCH37BULAN">
														<p id="notifinMCH37BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_mch data_mch_2">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCH UMUR 1 - 1.5
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCH15BULAN">
														<p id="notifinMCH15BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_mch data_mch_3">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCH UMUR 2 - 2.5
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCH225BULAN">
														<p id="notifinMCH225BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_mch data_mch_4">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCH UMUR 2.6 - 3.5
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCH2635BULAN">
														<p id="notifinMCH2635BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_mch data_mch_5">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCH UMUR 3.6 - 10
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCH3610BULAN">
														<p id="notifinMCH3610BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_mch data_mch_6">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCH UMUR 11 Bulan - 5
														Tahun</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCH115BULAN">
														<p id="notifinMCH115BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-20">
								<div class="col-md-6">
									<div class="col-md-2 mt-10">
										<label class="control-label col-md-2">MCHC </label>
									</div>
									<div class="col-md-10 has-success">
										<select style="border: 1px solid lightgreen;"
											class="form-control  filled-input select2" placeholder="Choose a Category"
											id="inTipeMasukMCHCBULAN">
											<option value="0">-</option>
											<option value="1">MCHC UMUR 37 Hari</option>
											<option value="2">MCHC UMUR 40 Hari - 7 Bulan</option>
											<option value="3">MCHC UMUR 8 - 12 Bulan</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="data_mchc data_mchc_1">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCHC UMUR 37
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCHC37BULAN">
														<p id="notifinMCHC37BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_mchc data_mchc_2">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCHC UMUR 40 Hari - 7
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCHC407BULAN">
														<p id="notifinMCHC407BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_mchc data_mchc_3">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCHC UMUR 8 - 12
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCHC812BULAN">
														<p id="notifinMCHC812BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-20">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">LEUKOSIT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inLEUKOSITBULAN">
											<p id="notifinLEUKOSITBULAN" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">TROMBOSIT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inTROMBOSITBULAN">
											<p id="notifinTROMBOSITBULAN" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">LED</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inLEDBULAN">
											<p id="notifinLEDBULAN" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">RDW-SD</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inRDW-SDBULAN">
											<p id="notifinRDW-SDBULAN" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">RDW-CV</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inRDW-CVBULAN">
											<p id="notifinRDW-CVBULAN" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
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
													<input type="text" class="form-control" id="inBASBULAN">
													<p id="notifinBASBULAN" style="font-size:12px; margin-top:5px;">
													</p>
													<span class="help-block"></span>

													<label class="control-label col-md-3"
														style="color:black">EOS</label>
													<input type="text" class="form-control" id="inEOSBULAN">
													<p id="notifinEOSBULAN" style="font-size:12px; margin-top:5px;">
													</p>
													<span class="help-block"></span>
												</div>
												<div class="col-md-6">
													<label class="control-label col-md-3"
														style="color:black">MONO</label>
													<input type="text" class="form-control" id="inMONOBULAN">
													<p id="notifinMONOBULAN" style="font-size:12px; margin-top:5px;">
													</p>
													<span class="help-block"></span>

													<label class="control-label col-md-3"
														style="color:black">SEGMEN</label>
													<input type="text" class="form-control" id="inSEGMENBULAN">
													<p id="notifinSEGMENBULAN" style="font-size:12px; margin-top:5px;">
													</p>
													<span class="help-block"></span>
												</div>
												<div class="col-md-6">
													<label class="control-label col-md-3"
														style="color:black">LYMPO</label>
													<input type="text" class="form-control" id="inLYMPOBULAN">
													<p id="notifinLYMPOBULAN" style="font-size:12px; margin-top:5px;">
													</p>
													<span class="help-block"></span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 mt-40">
									<div class="form-group">
										<button onclick="insert_bulan_darah()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End Darah Rutin -->


					<!-- Darah GOL DARAH -->
					<div class="collapse" id="isiGOL-DARAHBULAN">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaGOLBULAN" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborGOLBULAN"
												disabled>
											<input type="hidden" class="form-control"
												id="Harga_golongan_darah_baby_bulan" disabled>
											<input type="hidden" class="form-control"
												id="Frek_golongan_darah_baby_bulan" disabled>
											<input type="hidden" class="form-control"
												id="id_pelayanan_golongan_darah_baby_bulan" disabled>
											<input type="hidden" class="form-control"
												id="id_list_tindakan_golongan_darah_baby_bulan" disabled>
											<input type="hidden" class="form-control"
												id="total_golongan_darah_baby_bulan" disabled>
											<input type="hidden" class="form-control"
												id="tanggal_golongan_darah_baby_bulan" disabled>
											<input type="hidden" class="form-control"
												id="id_staff_golongan_darah_baby_bulan" disabled>
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
											<input type="text" class="form-control" id="inGOLDARAHBULAN">
											<p id="notifinGOLDARAHBULAN" style="font-size:12px; margin-top:5px;">
											</p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_gol_darah_baby_bulan()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End GOL DARAH -->


					<!-- RHESUS -->
					<div class="collapse" id="isiRHESUSBULAN">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaRHESUSBULAN" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborRHESUSBULAN"
												disabled>
											<input type="hidden" class="form-control" id="Harga_golongan_bulan_rhesus"
												disabled>
											<input type="hidden" class="form-control" id="Frek_bulan_rhesus" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_bulan_rhesus"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_bulan_rhesus"
												disabled>
											<input type="hidden" class="form-control" id="total_bulan_rhesus" disabled>
											<input type="hidden" class="form-control" id="tanggal_bulan_rhesus"
												disabled>
											<input type="hidden" class="form-control" id="id_staff_bulan_rhesus"
												disabled>
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
											<input type="text" class="form-control" id="inRHESUSBULAN">
											<p id="notifinRHESUSBULAN" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_bulan_rhesus()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End RHESUS -->

					<!-- APTT -->
					<div class="collapse" id="isiAPTTBULAN">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaAPTTBULAN" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborAPTTBULAN"
												disabled>
											<input type="hidden" class="form-control" id="Harga_aptt_bulan" disabled>
											<input type="hidden" class="form-control" id="Frek_aptt_bulan" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_aptt_bulan"
												disabled>
											<input type="hidden" class="form-control" id="total_aptt_bulan" disabled>
											<input type="hidden" class="form-control" id="tanggal_aptt_bulan" disabled>
											<input type="hidden" class="form-control" id="id_staff_aptt_bulan" disabled>
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
											<input type="text" class="form-control" id="inAPTTBULAN">
											<p id="notifinAPTTBULAN" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_bulan_aptt()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End APTT -->

					<!-- PT -->
					<div class="collapse" id="isiPTBULAN">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaPTBULAN" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborPTBULAN"
												disabled>
											<input type="hidden" class="form-control" id="Harga_pt_bulan" disabled>
											<input type="hidden" class="form-control" id="Frek_pt_bulan" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_pt_bulan"
												disabled>
											<input type="hidden" class="form-control" id="total_pt_bulan" disabled>
											<input type="hidden" class="form-control" id="tanggal_pt_bulan" disabled>
											<input type="hidden" class="form-control" id="id_staff_pt_bulan" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">PT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inPTBULAN">
											<p id="notifinPTBULAN" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">INR</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inINRBULAN">
											<p id="notifinINRBULAN" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-10">
								<div class="col-md-6">
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_bulan_pt()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End PT -->

					<!-- PT/APTT -->
					<div class="collapse" id="isiPTAPTTBULAN">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaPTAPTTBULAN" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborPTAPTTBULAN"
												disabled>
											<input type="hidden" class="form-control" id="Harga_ptaptt_bulan" disabled>
											<input type="hidden" class="form-control" id="Frek_ptaptt_bulan" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_ptaptt_bulan"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_ptaptt_bulan"
												disabled>
											<input type="hidden" class="form-control" id="total_ptaptt_bulan" disabled>
											<input type="hidden" class="form-control" id="tanggal_ptaptt_bulan"
												disabled>
											<input type="hidden" class="form-control" id="id_staff_ptaptt_bulan"
												disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">PT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inPTAPTTBULAN">
											<p id="notifinPTAPTTBULAN" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">INR</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inINRPTAPTTBULAN">
											<p id="notifinINRPTAPTTBULAN" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">APTT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inAPTTPTAPTTBULAN">
											<p id="notifinAPTTPTAPTTBULAN" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_bulan_ptaptt()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End PT/APTT -->

					<!-- GULDARAH -->
					<div class="collapse" id="isiGULDARAHBULAN">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaGULDARAHBULAN" disabled>
											<input type="hidden" class="form-control"
												id="id_tindakan_laborGULDARAHBULAN" disabled>
											<input type="hidden" class="form-control" id="Harga_guldarah_bulan"
												disabled>
											<input type="hidden" class="form-control" id="Frek_guldarah_bulan" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_guldarah_bulan"
												disabled>
											<input type="hidden" class="form-control"
												id="id_list_tindakan_guldarah_bulan" disabled>
											<input type="hidden" class="form-control" id="total_guldarah_bulan"
												disabled>
											<input type="hidden" class="form-control" id="tanggal_guldarah_bulan"
												disabled>
											<input type="hidden" class="form-control" id="id_staff_guldarah_bulan"
												disabled>

										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>
							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">GULA DARAH</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inGULDARAHBULAN">
											<p id="notifinGULDARAHBULAN" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_bulan_guldarah()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
						<!-- End GULDARAH -->
					</div>

					<!-- HBA -->
					<div class="collapse" id="isiHBABULAN">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaHBABULAN" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborHBABULAN"
												disabled>
											<input type="hidden" class="form-control" id="Harga_hba_bulan" disabled>
											<input type="hidden" class="form-control" id="Frek_hba_bulan" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_hba_bulan"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_hba_bulan"
												disabled>
											<input type="hidden" class="form-control" id="total_hba_bulan" disabled>
											<input type="hidden" class="form-control" id="tanggal_hba_bulan" disabled>
											<input type="hidden" class="form-control" id="id_staff_hba_bulan" disabled>
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
											<input type="text" class="form-control" id="inHBABULAN">
											<p id="notifinHBABULAN" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_bulan_hba()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End HBA -->

					<!-- URIC ACID-->
					<div class="collapse" id="isiURICBULAN">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaURICBULAN" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborURICBULAN"
												disabled>
											<input type="hidden" class="form-control" id="Harga_uric_bulan" disabled>
											<input type="hidden" class="form-control" id="Frek_uric_bulan" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_uric_bulan"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_uric_bulan"
												disabled>
											<input type="hidden" class="form-control" id="total_uric_bulan" disabled>
											<input type="hidden" class="form-control" id="tanggal_uric_bulan" disabled>
											<input type="hidden" class="form-control" id="id_staff_uric_bulan" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">URIC ACID < 12 Tahun</label> <div
												class="col-md-9 has-success">
												<input type="text" class="form-control" id="inURICBULAN">
												<p id="notifinURICBULAN" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_bulan_uric()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End URIC ACID -->

				<!-- TRIGLYSERIDE -->
				<div class="collapse" id="isiTRIGLYSERIDEBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaTRIGLYSERIDEBULAN" disabled>
										<input type="hidden" class="form-control"
											id="id_tindakan_laborTRIGLYSERIDEBULAN" disabled>
										<input type="hidden" class="form-control" id="Harga_trigiseride_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_trigiseride_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_trigiseride_bulan"
											disabled>
										<input type="hidden" class="form-control"
											id="id_list_tindakan_trigiseride_bulan" disabled>
										<input type="hidden" class="form-control" id="total_trigiseride_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_trigiseride_bulan"
											disabled>
										<input type="hidden" class="form-control" id="id_staff_trigiseride_bulan"
											disabled>
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
										<input type="text" class="form-control" id="inTRIGLYSERIDEBULAN">
										<p id="notifinTRIGLYSERIDEBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_bulan_triglyseride()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End URIC ACID -->

				<!-- CHO -->
				<div class="collapse" id="isiCHOBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaCHOBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborCHOBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_CHO_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_CHO_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_CHO_bulan" disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_CHO_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_CHO_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_CHO_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_CHO_bulan" disabled>
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
										<input type="text" class="form-control" id="inCHOBULAN">
										<p id="notifinCHOBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_bulan_cho()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End CHO -->

				<!-- HDL -->
				<div class="collapse" id="isiHDLBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaHDLBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborHDLBULAN"
											disabled>
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
										<input type="text" class="form-control" id="inHDLBULAN">
										<p id="notifinHDLBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_bulan_hdl()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End HDL -->

				<!-- LDL -->
				<div class="collapse" id="isiLDLBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaLDLBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborLDLBULAN"
											disabled>
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
										<input type="text" class="form-control" id="inLDLBULAN">
										<p id="notifinLDLBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_bulan_ldl()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End LDL -->

				<!-- UREUM -->
				<div class="collapse" id="isiUREUMBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaUREUMBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborUREUMBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_ureum_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_ureum_bulan" disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_ureum_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_ureum_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_ureum_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_ureum_bulan" disabled>
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
										<input type="text" class="form-control" id="inUREUMBULAN">
										<p id="notifinUREUMBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_bulan_ureum()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End UREUM -->

				<!-- CREATININ -->
				<div class="collapse" id="isiCREATININBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaCREATININBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborCREATININBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_creatinin_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_creatinin_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_creatinin_bulan"
											disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_creatinin_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_creatinin_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_creatinin_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_creatinin_bulan"
											disabled>
									</div>
								</div>
							</div>
						</div>
						<span class="help-block mb-30"></span>
						<div class="row mb-40">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">CREATININ </label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inCREATININBULAN">
										<p id="notifinCREATININBULAN" style="font-size:12px; margin-top:5px;"> </p>
									</div>
								</div>
							</div>
							<div class="col-md-6 mb-2 pt-10">
								<button onclick="insert_bulan_creatinin()"
									class="btn btn-success btn-anim btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span
										class="btn-text">SIMPAN</span>
							</div>
						</div>
					</div>
				</div>
				<!-- End CREATININ -->

				<!-- PROTEIN -->
				<div class="collapse" id="isiPROTEINBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaPROTEINBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborPROTEINBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_protein_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_protein_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_protein_bulan"
											disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_protein_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_protein_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_protein_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_protein_bulan" disabled>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<span class="help-block mb-20"></span>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">PROTEIN</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inPROTEINBULAN">
										<p id="notifinPROTEINBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_bulan_protein()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End PROTEIN -->

				<!-- SGOT -->
				<div class="collapse" id="isiSGOTBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaSGOTBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborSGOTBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_sgot_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_sgot_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_sgot_bulan" disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_sgot_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_sgot_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_sgot_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_sgot_bulan" disabled>
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
										<input type="text" class="form-control" id="inSGOTBULAN">
										<p id="notifinSGOTBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_bulan_sgot()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End SGOT -->

				<!-- CRP -->
				<div class="collapse" id="isiCRPBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaCRPBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborCRPBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_crp_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_crp_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_crp_bulan" disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_crp_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_crp_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_crp_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_crp_bulan" disabled>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<span class="help-block mb-20"></span>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">CRP</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inCRPBULAN">
										<p id="notifinCRPBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_bulan_crp()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End CRP -->

				<!-- SGPT -->
				<div class="collapse" id="isiSGPTBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaSGPTBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborSGPTBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_sgpt_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_sgpt_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_sgpt_bulan" disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_sgpt_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_sgpt_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_sgpt_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_sgpt_bulan" disabled>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<span class="help-block mb-20"></span>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">SGPT</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSGPTBULAN">
										<p id="notifinSGPTBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_bulan_sgpt()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End SGPT -->

				<!-- ALBUMIN-->
				<div class="collapse" id="isiALBUMINBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaALBUMINBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborALBUMINBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_albumin_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_albumin_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_albumin_bulan"
											disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_albumin_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_albumin_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_albumin_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_albumin_bulan" disabled>
									</div>
								</div>
							</div>
						</div>
						<span class="help-block mb-30"></span>
						<div class="row mb-40">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">ALBUMIN </label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inALBUMINBULAN">
										<p id="notifinALBUMINBULAN" style="font-size:12px; margin-top:5px;"> </p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
							<div class="col-md-6 mb-2">
								<button onclick="insert_bulan_albumin()"
									class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span
										class="btn-text">SIMPAN</span>
							</div>
						</div>
					</div>
				</div>
				<!-- End ALBUMIN -->

				<!-- ELEKTROLIT -->
				<div class="collapse" id="isiELEKTROLITBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaELEKTROLITBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborELEKTROLITBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_elektrolit_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_elektrolit_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_elektrolit_bulan"
											disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_elektrolit_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_elektrolit_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_elektrolit_bulan"
											disabled>
										<input type="hidden" class="form-control" id="id_staff_elektrolit_bulan"
											disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-20">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">NA :</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inNABULAN">
										<p id="notifinNABULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mt-20">
									<label class="control-label col-md-3 pt-10">K :</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inKBULAN">
										<p id="notifinKBULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">CL :</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inCLBULAN">
										<p id="notifinCLBULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">Ca :</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inCaBULAN">
										<p id="notifinCaBULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 mt-30">
										<div class="form-group">
											<button onclick="insert_bulan_elektrolit()"
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
				<div class="collapse" id="isiSPUTUMBTAIBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaSPUTUMBTAIBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborSPUTUMBTAIBULAN"
											disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-20">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">SPUTUM BTA I :</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSPUTUMBTAIBULAN">
										<p id="notifinSPUTUMBTAIBULAN" style="font-size:12px; margin-top:5px;">
										</p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_sputumbtai()"
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
				<div class="collapse" id="isiSPUTUMBTAIIBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaSPUTUMBTAIIBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborSPUTUMBTAIIBULAN"
											disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-20">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">SPUTUM BTA II </label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSPUTUMBTAIIBULAN">
										<p id="notifinSPUTUMBTAIIBULAN" style="font-size:12px; margin-top:5px;">
										</p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_sputumbtaii()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End SPUTUM BTA II -->

				<!-- SPUTUMBTAIII -->
				<div class="collapse" id="isiSPUTUMBTAIIIBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaSPUTUMBTAIIIBULAN" disabled>
										<input type="hidden" class="form-control"
											id="id_tindakan_laborSPUTUMBTAIIIBULAN" disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-20">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">SPUTUM BTA III :</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSPUTUMBTAIIIBULAN">
										<p id="notifinSPUTUMBTAIIIBULAN" style="font-size:12px; margin-top:5px;">
										</p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_sputumbtaiii()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End SPUTUM BTA III -->

				<!-- MALARIA -->
				<div class="collapse" id="isiMALARIABULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaMALARIABULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborMALARIABULAN"
											disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">MALARIA</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inMALARIABULAN">
										<p id="notifinMALARIABULAN" style="font-size:12px; margin-top:5px;">
										</p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_malaria()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End MALARIA -->

				<!-- WIDAL -->
				<div class="collapse" id="isiWIDALBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaWIDALBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborWIDALBULAN"
											disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">WIDAL</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inWIDALBULAN">
										<p id="notifinWIDALBULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_widal()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End WIDAL -->

				<!-- TROPONIN -->
				<div class="collapse" id="isiTROPONINBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaTROPONINBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborTROPONINBULAN"
											disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">TROPONIN</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inTROPONINBULAN">
										<p id="notifinTROPONINBULAN" style="font-size:12px; margin-top:5px;">
										</p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_troponin()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End TROPONIN -->

				<!-- NS1 -->
				<div class="collapse" id="isiNS1BULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaNS1BULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborNS1BULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_ns1_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_ns1_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_ns1_bulan" disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_ns1_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_ns1_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_ns1_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_ns1_bulan" disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">NS1</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inNS1BULAN">
										<p id="notifinNS1BULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_ns1()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End NS1 -->

				<!-- HBSAG -->
				<div class="collapse" id="isiHBSAGBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaHBSAGBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborHBSAGBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_hbsag_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_hbsag_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_hbsag_bulan"
											disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_hbsag_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_hbsag_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_hbsag_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_hbsag_bulan" disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">HBSAG</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inHBSAGBULAN">
										<p id="notifinHBSAGBULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_hbsag()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End HBSAG -->

				<!-- HBSAB -->
				<div class="collapse" id="isiHBSABBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaHBSABBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborHBSABBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_hbsab_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_hbsab_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_hbsab_bulan"
											disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_hbsab_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_hbsab_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_hbsab_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_hbsab_bulan" disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">HBSAB</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inHBSABBULAN">
										<p id="notifinHBSABBULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_hbsab()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End HBSAB -->

				<!-- B20 -->
				<div class="collapse" id="isiB20BULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaB20BULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborB20BULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_b20_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_b20_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_b20_bulan" disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_b20_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_b20_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_b20_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_b20_bulan" disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">B20</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inB20BULAN">
										<p id="notifinB20BULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_b20()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End B20 -->

				<!-- VDRL -->
				<div class="collapse" id="isiVDRLBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaVDRLBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborVDRLBULAN"
											disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">VDRL</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inVDRLBULAN">
										<p id="notifinVDRLBULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_vdrl()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End VDRL -->

				<!-- PLANO -->
				<div class="collapse" id="isiPLANOBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaPLANOBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborPLANOBULAN"
											disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">PLANO TEST</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inPLANOBULAN">
										<p id="notifinPLANOBULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_plano()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End PLANO -->

				<!-- SALMONELLA -->
				<div class="collapse" id="isiSALMONELLABULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaSALMONELLABULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborSALMONELLABULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_salmonella_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_salmonella_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_salmonella_bulan"
											disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_salmonella_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_salmonella_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_salmonella_bulan"
											disabled>
										<input type="hidden" class="form-control" id="id_staff_salmonella_bulan"
											disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">SALMONELLA</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSALMONELLABULAN">
										<p id="notifinSALMONELLABULAN" style="font-size:12px; margin-top:5px;">
										</p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_salmonella()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End SALMONELLA -->

				<!-- DENGUE -->
				<div class="collapse" id="isiDENGUEBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaDENGUEBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborDENGUEBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_dengue_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_dengue_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_dengue_bulan"
											disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_dengue_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_dengue_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_dengue_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_dengue_bulan" disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">DENGUE</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inDENGUEBULAN">
										<p id="notifinDENGUEBULAN" style="font-size:12px; margin-top:5px;">
										</p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_dengue()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End DENGUE -->

				<!-- AGD -->
				<div class="collapse" id="isiAGDBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaAGDBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborAGDBULAN"
											disabled>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-20">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">PH</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inPHBULAN">
										<p id="notifinPHBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">PCO2</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inPCO2BULAN">
										<p id="notifinPCO2BULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">PO2</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inPO2BULAN">
										<p id="notifinPO2BULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">HCO3</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inHCO3BULAN">
										<p id="notifinHCO3BULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">BE</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inBEBULAN">
										<p id="notifinBEBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">SO2</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSO2BULAN">
										<p id="notifinSO2BULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">SUHU</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSUHUBULAN">
										<p id="notifinSUHUBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">OKSIGEN</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inOKSIGENBULAN">
										<p id="notifinOKSIGENBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">SATURASI</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSATURASIBULAN">
										<p id="notifinSATURASIBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_bulan_agd()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End AGD -->

				<!-- URINE -->
				<div class="collapse" id="isiURINEBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaURINEBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborURINEBULAN"
											disabled>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label class="control-label col-md-3 mt-30" style="font-weight:bold;">MAKROSKOPIS :
								</label>
							</div>
						</div>

						<div class="row mt-20">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">WARNA</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inWARNABULAN">
										<p id="notifinWARNABULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">KEJERNIHAN</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inKEJERNIHANBULAN">
										<p id="notifinKEJERNIHANBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 mt-30">
								<label class="control-label col-md-3" style="font-weight:bold;">MIKROSKOPIS :
								</label>
							</div>
						</div>
						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">ERITROSIT</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inERITROSITURINEBULAN">
										<p id="notifinERITROSITURINEBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">LEUKOSIT</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inLEUKOSITURINEBULAN">
										<p id="notifinLEUKOSITURINEBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">SEL EPITEL</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSELBULAN">
										<p id="notifinSELBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">SILINDER</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSILINDERBULAN">
										<p id="notifinSILINDERBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">KRISTAL</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inKRISTALBULAN">
										<p id="notifinKRISTALBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">BAKTERI</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inBAKTERIBULAN">
										<p id="notifinBAKTERIBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>


						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">JAMUR</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inJAMURBULAN">
										<p id="notifinJAMURBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 mt-30">
								<label class="control-label col-md-3 pt-10" style="font-weight:bold;">KIMIA URIN
									:</label>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">ERITROSIT</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inERITROSITKIMIABULAN">
										<p id="notifinERITROSITKIMIABULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">GLUKOSA</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inGLUKOSABULAN">
										<p id="notifinGLUKOSABULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">PROTEIN</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inPROTEINKIMIABULAN">
										<p id="notifinPROTEINKIMIABULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">BILIRUBIN</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inBILIRUBINBULAN">
										<p id="notifinBILIRUBINBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">UROBILIN
										OGEN</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inUROBILINOGENBULAN">
										<p id="notifinUROBILINOGENBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">PH</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inPHKIMIABULAN">
										<p id="notifinPHKIMIABULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">BERAT JENIS</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inBERATBULAN">
										<p id="notifinBERATBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">KETON</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inKETONBULAN">
										<p id="notifinKETONBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">NITRIT</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inNITRITBULAN">
										<p id="notifinNITRITBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">LEUKOSIT</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inLEUKOSITKIMIABULAN">
										<p id="notifinLEUKOSITKIMIABULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-10">
							<div class="col-md-6">
							</div>
							<div class="col-md-6">
								<div class="form-group pull-left">
									<button onclick="insert_data_urine()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End URINE -->

				<!-- ANALISA SPERMA -->
				<div class="collapse" id="isiSPERMABULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaSPERMABULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborSPERMABULAN"
											disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">ANALISA SPERMA</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSPERMABULAN">
										<p id="notifinSPERMABULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_sperma()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End ANALISA SPERMA -->

				<!-- FESES -->
				<div class="collapse" id="isiFESESBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaFESESBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborFESESBULAN"
											disabled>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label class="control-label col-md-3 mt-30" style="font-weight:bold;">MAKROSKOPIS :
								</label>
							</div>
						</div>

						<div class="row mt-20">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">DARAH</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inDARAHFESESBULAN">
										<p id="notifinDARAHFESESBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">LENDIR</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inLENDIRBULAN">
										<p id="notifinLENDIRBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-20">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">BAU</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inBAUBULAN">
										<p id="notifinBAUBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">KONSISTENSI</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inKONSISTENSIBULAN">
										<p id="notifinKONSISTENSIBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-20">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">WARNA</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inWARNAFESESBULAN">
										<p id="notifinWARNAFESESBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">PARASIT</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inPARASITBULAN">
										<p id="notifinPARASITBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 mt-30">
								<label class="control-label col-md-3" style="font-weight:bold;">MIKROSKOPIS :
								</label>
							</div>
						</div>
						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">LEUKOSIT</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inLEUKOSITFESESBULAN">
										<p id="notifinLEUKOSITFESESBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">ERITROSIT</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inERITROSITFESESBULAN">
										<p id="notifinERITROSITFESESBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">SEL EPITEL</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSELFESESBULAN">
										<p id="notifinSELFESESBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">SILIDER</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSILIDERBULAN">
										<p id="notifinSILIDERBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">TELUR CACING</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inTELURBULAN">
										<p id="notifinTELURBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">AMOEBA</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inAMOEBABULAN">
										<p id="notifinAMOEBABULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>


						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">BAKTERI</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inBAKTERIFESESBULAN">
										<p id="notifinBAKTERIFESESBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group pull-left">
									<button onclick="insert_data_feses()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End FESES -->


				<!-- End Everything -->
			</div>
		</div>
	</div>
</div>
<!-- End -->
=======
<!-- BULAN -->
<div class="modal fade bs-example-modal-lg" id="modal_edit_BULAN" role="dialog" aria-labelledby="myLargeModalLabel"aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN LABOR
					RAWAT INAP
				</h5>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="modal-body mt-5">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
						<hr width="95%">
						<a id="cetak_semua_bulan" class="btn btn-primary ml-20 mb-20"><i class='icon-printer'></i>&nbsp; CETAK SEMUA DATA LABOR</a> 
						<div class="table-wrap" style="width: 95%; margin: auto ">
							<div class="table-responsive">
								<table class="table table-hover display pb-60" id="tablelaborBULAN">
									<thead>
										<tr class="bg-success">
											<th>NO</th>
											<th>AKSI</th>
											<th>STATUS</th>
											<th>NAMA TINDAKAN</th>
											<th>TANGGAL TINDAKAN</th>
											<th>WAKTU TINDAKAN</th>
											<th>BIAYA TINDAKAN </th>
											<th>JUMLAH TINDAKAN</th>
											<th>STAFF REQUEST</th>
											<th>STAFF KONFIRMASI</th>
											<th>RINGKASAN</th>
											<th>KETERANGAN</th>
											<th>HAPUS</th>
										</tr>
									</thead>
									<tfoot>
										<tr class="bg-success">
											<th>NO</th>
											<th>AKSI</th>
											<th>STATUS</th>
											<th>NAMA TINDAKAN</th>
											<th>TANGGAL TINDAKAN</th>
											<th>WAKTU TINDAKAN</th>
											<th>BIAYA TINDAKAN </th>
											<th>JUMLAH TINDAKAN</th>
											<th>STAFF REQUEST</th>
											<th>STAFF KONFIRMASI</th>
											<th>RINGKASAN</th>
											<th>KETERANGAN</th>
											<th>HAPUS</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>

								<!-- Detail Tindakan -->
					<div class="collapse" id="detailTindakanLaborBULAN">
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>DETAIL
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" disabled id="outNamaBULAN">
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">TANGGAL TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="outTanggalBULAN" disabled>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								
							</div>
							<span class="help-block"></span>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">BIAYA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" disabled id="outHargaBULAN">
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">JUMLAH TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="outFrekBULAN" disabled>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>
							<span class="help-block"></span>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">RINGKASAN KLINIS</label>
										<div class="col-md-9 has-error">
										<textarea class="form-control" id="outRingBULAN" disabled rows="13"
													style="max-width:95%; "></textarea>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">KETERANGAN</label>
										<div class="col-md-9 has-error">
										<textarea class="form-control" id="outKetaBULAN" disabled rows="13"
													style="max-width:95%; "></textarea>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End -->
					</div>	

					<div class="row">
						<div class="col-md-8"></div>
						<div class="col-md-4 pull-right mt-20">
							<div class="table-wrap" style="width: 85%; margin-bottom:40px;">
								<div class="table-responsive ">
									<table class="table table-hover display " id="outTotalHargaBULAN">
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

					<div class="row">
						<div class="col-md-12">
							<div class="col-md-6 mb-20 mt-10">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA PASIEN :</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" disabled id="inNamaPasienBULAN">
									</div>
								</div>
							</div>

							<div class="col-md-6 mb-20 mt-10">
								<div class="form-group ">
									<label class="control-label col-md-3">UMUR PASIEN :</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" disabled id="inUmurPasienBULAN">
									</div>
								</div>
								<div class="row mt-20">
									<div class="col-md-12 mb-20 mt-20">
										<div class="form-group ">
											<label class="control-label col-md-3">JENIS KELAMIN :</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" disabled
													id="inJenisPasienBULAN">
												<input type="hidden" class="form-control" disabled
												id="inMasukBULAN">
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>

				<!-- Darah DARAH SAMAR -->
				<div class="collapse" id="isiDARAHSAMARBULAN">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaDARAHSAMARBULAN" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborDARAHSAMARBULAN"
												disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">DARAH SAMAR</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inDARAHSAMARBULAN">
											<p id="notifinDARAHSAMARBULAN" style="font-size:12px; margin-top:5px;">
											</p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_bulan_darahsamar()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				<!-- End DARAH SAMAR -->

			<!-- Start -->
			<div class="row">
				<div class="col-md-12">
					<!-- Darah Rutin -->
					<div class="collapse" id="isiDARAHBULAN">
						<!-- FORM DARAH RUTIN NORMAL -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaDARAHBULAN" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborDARAHBULAN"
												disabled>
											<input type="hidden" class="form-control" id="Harga_Darah_Rutin_Bulan"
												disabled>
											<input type="hidden" class="form-control"
												id="id_pelayanan_Darah_Rutin_Bulan" disabled>
											<input type="hidden" class="form-control"
												id="id_list_tindakan_Darah_Rutin_Bulan" disabled>
											<input type="hidden" class="form-control" id="total_Darah_Rutin_Bulan"
												disabled>
											<input type="hidden" class="form-control" id="tanggal_Darah_Rutin_Bulan"
												disabled>
											<input type="hidden" class="form-control" id="id_staff_Darah_Rutin_Bulan"
												disabled>
										</div>
									</div>
								</div>
							</div>


							<div class="row mt-20">
								<div class="col-md-6">
									<div class="col-md-2">
										<label class="control-label col-md-3 mt-10">HB</label>
									</div>
									<div class="col-md-10 has-success">
										<select style="border: 1px solid lightgreen;"
											class="form-control  filled-input select2" placeholder="Choose a Category"
											id="inTipeMasukHBBULAN">
											<option value="0">-</option>
											<option value="1">HB UMUR 40 - 50 Hari</option>
											<option value="2">HB UMUR >50 Hari - 2.5 Bulan</option>
											<option value="3">HB UMUR 2.6 - 3.5 Bulan</option>
											<option value="4">HB UMUR 4 - 7 Bulan</option>
											<option value="5">HB UMUR 8 Bulan - 12 Bulan</option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="data_hide data_hide_1">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group ">
													<label class="control-label col-md-4 pt-5">HB UMUR 40 - 50
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inHB4050BULAN">
														<p id="notifinHB4050BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_hide data_hide_2">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group ">
													<label class="control-label col-md-4 pt-5">HB UMUR >50 Hari - 2.5
														Bulan
													</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inHB5025BULAN">
														<p id="notifinHB5025BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_hide data_hide_3">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group ">
													<label class="control-label col-md-4 pt-5">HB UMUR 2.6 - 3.5
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inHB2635BULAN">
														<p id="notifinHB2635BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_hide data_hide_4">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group ">
													<label class="control-label col-md-4 pt-5">HB UMUR 4 - 7
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inHB47BULAN">
														<p id="notifinHB47BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_hide data_hide_5">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group ">
													<label class="control-label col-md-4 pt-5">HB UMUR 8 - 12
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inHB812BULAN">
														<p id="notifinHB812BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


							<div class="row mt-20">
								<div class="col-md-6">
									<div class="col-md-2">
										<label class="control-label col-md-2">HEMA
											TOKRIT </label>
									</div>
									<div class="col-md-10 has-success">
										<select style="border: 1px solid lightgreen;"
											class="form-control  filled-input select2" placeholder="Choose a Category"
											id="inTipeMasukHEMATOKRITBULAN">
											<option value="0">-</option>
											<option value="1">HEMATOKRIT UMUR 40 - 50 Hari</option>
											<option value="2">HEMATOKRIT UMUR >50 Hari - 2.5 Bulan</option>
											<option value="3">HEMATOKRIT UMUR 2.6 - 3.5 Bulan</option>
											<option value="4">HEMATOKRIT UMUR 4 - 7 Bulan</option>
											<option value="5">HEMATOKRIT UMUR 8 Bulan - 12 Bulan</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="data_hema data_hema_1">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">HEMATOKRIT UMUR 40 - 50
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control"
															id="inHEMATOKRIT4050BULAN">
														<p id="notifinHEMATOKRIT4050BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_hema data_hema_2">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">HEMATOKRIT UMUR >50 Hari
														- 2.5
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control"
															id="inHEMATOKRIT5025BULAN">
														<p id="notifinHEMATOKRIT5025BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_hema data_hema_3">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">HEMATOKRIT UMUR 2.6 -
														3.5 Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control"
															id="inHEMATOKRIT2635BULAN">
														<p id="notifinHEMATOKRIT2635BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_hema data_hema_4">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">HEMATOKRIT UMUR 4 -
														7 Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control"
															id="inHEMATOKRIT47BULAN">
														<p id="notifinHEMATOKRIT47BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_hema data_hema_5">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">HEMATOKRIT UMUR 8 -
														12 Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control"
															id="inHEMATOKRIT812BULAN">
														<p id="notifinHEMATOKRIT812BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-20">
								<div class="col-md-6">
									<div class="col-md-2 mt-10">
										<label class="control-label col-md-2">MCV </label>
									</div>
									<div class="col-md-10 has-success">
										<select style="border: 1px solid lightgreen;"
											class="form-control  filled-input select2" placeholder="Choose a Category"
											id="inTipeMasukMCVBULAN">
											<option value="0">-</option>
											<option value="1">MCV UMUR 37 Hari</option>
											<option value="2">MCV UMUR 1.5 - 2.5 Bulan</option>
											<option value="3">MCV UMUR 2.6 - 3.5 Bulan</option>
											<option value="4">MCV UMUR 3.5 - 7 Bulan</option>
											<option value="5">MCV UMUR 7 - 12 Bulan</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="data_mcv data_mcv_1">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCV UMUR 37
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCV37BULAN">
														<p id="notifinMCV37BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_mcv data_mcv_2">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCV UMUR 1.5 - 2.5
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCV1525BULAN">
														<p id="notifinMCV1525BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_mcv data_mcv_3">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCV UMUR 2.6 - 3.5
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCV2635BULAN">
														<p id="notifinMCV2635BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_mcv data_mcv_4">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCV UMUR 3.5 - 7
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCV357BULAN">
														<p id="notifinMCV357BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_mcv data_mcv_5">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCV UMUR 7 - 12
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCV712BULAN">
														<p id="notifinMCV712BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-20">
								<div class="col-md-6">
									<div class="col-md-2 mt-10">
										<label class="control-label col-md-2">MCH </label>
									</div>
									<div class="col-md-10 has-success">
										<select style="border: 1px solid lightgreen;"
											class="form-control  filled-input select2" placeholder="Choose a Category"
											id="inTipeMasukMCHBULAN">
											<option value="0">-</option>
											<option value="1">MCH UMUR 37 Hari</option>
											<option value="2">MCH UMUR 1 - 1.5 Bulan</option>
											<option value="3">MCH UMUR 2 - 2.5 Bulan</option>
											<option value="4">MCH UMUR 2.6 - 3.5 Bulan</option>
											<option value="5">MCH UMUR 3.6 - 10 Bulan</option>
											<option value="6">MCH 11 Bulan - 5 Tahun</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="data_mch data_mch_1">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCH UMUR 37
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCH37BULAN">
														<p id="notifinMCH37BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_mch data_mch_2">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCH UMUR 1 - 1.5
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCH15BULAN">
														<p id="notifinMCH15BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_mch data_mch_3">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCH UMUR 2 - 2.5
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCH225BULAN">
														<p id="notifinMCH225BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_mch data_mch_4">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCH UMUR 2.6 - 3.5
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCH2635BULAN">
														<p id="notifinMCH2635BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_mch data_mch_5">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCH UMUR 3.6 - 10
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCH3610BULAN">
														<p id="notifinMCH3610BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_mch data_mch_6">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCH UMUR 11 Bulan - 5
														Tahun</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCH115BULAN">
														<p id="notifinMCH115BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-20">
								<div class="col-md-6">
									<div class="col-md-2 mt-10">
										<label class="control-label col-md-2">MCHC </label>
									</div>
									<div class="col-md-10 has-success">
										<select style="border: 1px solid lightgreen;"
											class="form-control  filled-input select2" placeholder="Choose a Category"
											id="inTipeMasukMCHCBULAN">
											<option value="0">-</option>
											<option value="1">MCHC UMUR 37 Hari</option>
											<option value="2">MCHC UMUR 40 Hari - 7 Bulan</option>
											<option value="3">MCHC UMUR 8 - 12 Bulan</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="data_mchc data_mchc_1">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCHC UMUR 37
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCHC37BULAN">
														<p id="notifinMCHC37BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_mchc data_mchc_2">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCHC UMUR 40 Hari - 7
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCHC407BULAN">
														<p id="notifinMCHC407BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_mchc data_mchc_3">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCHC UMUR 8 - 12
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCHC812BULAN">
														<p id="notifinMCHC812BULAN"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-20">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">LEUKOSIT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inLEUKOSITBULAN">
											<p id="notifinLEUKOSITBULAN" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">TROMBOSIT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inTROMBOSITBULAN">
											<p id="notifinTROMBOSITBULAN" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">LED</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inLEDBULAN">
											<p id="notifinLEDBULAN" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">RDW-SD</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inRDW-SDBULAN">
											<p id="notifinRDW-SDBULAN" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">RDW-CV</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inRDW-CVBULAN">
											<p id="notifinRDW-CVBULAN" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
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
													<input type="text" class="form-control" id="inBASBULAN">
													<p id="notifinBASBULAN" style="font-size:12px; margin-top:5px;">
													</p>
													<span class="help-block"></span>

													<label class="control-label col-md-3"
														style="color:black">EOS</label>
													<input type="text" class="form-control" id="inEOSBULAN">
													<p id="notifinEOSBULAN" style="font-size:12px; margin-top:5px;">
													</p>
													<span class="help-block"></span>
												</div>
												<div class="col-md-6">
													<label class="control-label col-md-3"
														style="color:black">MONO</label>
													<input type="text" class="form-control" id="inMONOBULAN">
													<p id="notifinMONOBULAN" style="font-size:12px; margin-top:5px;">
													</p>
													<span class="help-block"></span>

													<label class="control-label col-md-3"
														style="color:black">SEGMEN</label>
													<input type="text" class="form-control" id="inSEGMENBULAN">
													<p id="notifinSEGMENBULAN" style="font-size:12px; margin-top:5px;">
													</p>
													<span class="help-block"></span>
												</div>
												<div class="col-md-6">
													<label class="control-label col-md-3"
														style="color:black">LYMPO</label>
													<input type="text" class="form-control" id="inLYMPOBULAN">
													<p id="notifinLYMPOBULAN" style="font-size:12px; margin-top:5px;">
													</p>
													<span class="help-block"></span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 mt-40">
									<div class="form-group">
										<button onclick="insert_bulan_darah()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End Darah Rutin -->


					<!-- Darah GOL DARAH -->
					<div class="collapse" id="isiGOL-DARAHBULAN">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaGOLBULAN" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborGOLBULAN"
												disabled>
											<input type="hidden" class="form-control"
												id="Harga_golongan_darah_baby_bulan" disabled>
											<input type="hidden" class="form-control"
												id="Frek_golongan_darah_baby_bulan" disabled>
											<input type="hidden" class="form-control"
												id="id_pelayanan_golongan_darah_baby_bulan" disabled>
											<input type="hidden" class="form-control"
												id="id_list_tindakan_golongan_darah_baby_bulan" disabled>
											<input type="hidden" class="form-control"
												id="total_golongan_darah_baby_bulan" disabled>
											<input type="hidden" class="form-control"
												id="tanggal_golongan_darah_baby_bulan" disabled>
											<input type="hidden" class="form-control"
												id="id_staff_golongan_darah_baby_bulan" disabled>
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
											<input type="text" class="form-control" id="inGOLDARAHBULAN">
											<p id="notifinGOLDARAHBULAN" style="font-size:12px; margin-top:5px;">
											</p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_gol_darah_baby_bulan()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End GOL DARAH -->


					<!-- RHESUS -->
					<div class="collapse" id="isiRHESUSBULAN">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaRHESUSBULAN" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborRHESUSBULAN"
												disabled>
											<input type="hidden" class="form-control" id="Harga_golongan_bulan_rhesus"
												disabled>
											<input type="hidden" class="form-control" id="Frek_bulan_rhesus" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_bulan_rhesus"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_bulan_rhesus"
												disabled>
											<input type="hidden" class="form-control" id="total_bulan_rhesus" disabled>
											<input type="hidden" class="form-control" id="tanggal_bulan_rhesus"
												disabled>
											<input type="hidden" class="form-control" id="id_staff_bulan_rhesus"
												disabled>
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
											<input type="text" class="form-control" id="inRHESUSBULAN">
											<p id="notifinRHESUSBULAN" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_bulan_rhesus()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End RHESUS -->

					<!-- APTT -->
					<div class="collapse" id="isiAPTTBULAN">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaAPTTBULAN" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborAPTTBULAN"
												disabled>
											<input type="hidden" class="form-control" id="Harga_aptt_bulan" disabled>
											<input type="hidden" class="form-control" id="Frek_aptt_bulan" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_aptt_bulan"
												disabled>
											<input type="hidden" class="form-control" id="total_aptt_bulan" disabled>
											<input type="hidden" class="form-control" id="tanggal_aptt_bulan" disabled>
											<input type="hidden" class="form-control" id="id_staff_aptt_bulan" disabled>
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
											<input type="text" class="form-control" id="inAPTTBULAN">
											<p id="notifinAPTTBULAN" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_bulan_aptt()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End APTT -->

					<!-- PT -->
					<div class="collapse" id="isiPTBULAN">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaPTBULAN" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborPTBULAN"
												disabled>
											<input type="hidden" class="form-control" id="Harga_pt_bulan" disabled>
											<input type="hidden" class="form-control" id="Frek_pt_bulan" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_pt_bulan"
												disabled>
											<input type="hidden" class="form-control" id="total_pt_bulan" disabled>
											<input type="hidden" class="form-control" id="tanggal_pt_bulan" disabled>
											<input type="hidden" class="form-control" id="id_staff_pt_bulan" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">PT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inPTBULAN">
											<p id="notifinPTBULAN" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">INR</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inINRBULAN">
											<p id="notifinINRBULAN" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-10">
								<div class="col-md-6">
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_bulan_pt()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End PT -->

					<!-- PT/APTT -->
					<div class="collapse" id="isiPTAPTTBULAN">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaPTAPTTBULAN" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborPTAPTTBULAN"
												disabled>
											<input type="hidden" class="form-control" id="Harga_ptaptt_bulan" disabled>
											<input type="hidden" class="form-control" id="Frek_ptaptt_bulan" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_ptaptt_bulan"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_ptaptt_bulan"
												disabled>
											<input type="hidden" class="form-control" id="total_ptaptt_bulan" disabled>
											<input type="hidden" class="form-control" id="tanggal_ptaptt_bulan"
												disabled>
											<input type="hidden" class="form-control" id="id_staff_ptaptt_bulan"
												disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">PT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inPTAPTTBULAN">
											<p id="notifinPTAPTTBULAN" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">INR</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inINRPTAPTTBULAN">
											<p id="notifinINRPTAPTTBULAN" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">APTT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inAPTTPTAPTTBULAN">
											<p id="notifinAPTTPTAPTTBULAN" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_bulan_ptaptt()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End PT/APTT -->

					<!-- GULDARAH -->
					<div class="collapse" id="isiGULDARAHBULAN">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaGULDARAHBULAN" disabled>
											<input type="hidden" class="form-control"
												id="id_tindakan_laborGULDARAHBULAN" disabled>
											<input type="hidden" class="form-control" id="Harga_guldarah_bulan"
												disabled>
											<input type="hidden" class="form-control" id="Frek_guldarah_bulan" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_guldarah_bulan"
												disabled>
											<input type="hidden" class="form-control"
												id="id_list_tindakan_guldarah_bulan" disabled>
											<input type="hidden" class="form-control" id="total_guldarah_bulan"
												disabled>
											<input type="hidden" class="form-control" id="tanggal_guldarah_bulan"
												disabled>
											<input type="hidden" class="form-control" id="id_staff_guldarah_bulan"
												disabled>

										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>
							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">GULA DARAH</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inGULDARAHBULAN">
											<p id="notifinGULDARAHBULAN" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_bulan_guldarah()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
						<!-- End GULDARAH -->
					</div>

					<!-- HBA -->
					<div class="collapse" id="isiHBABULAN">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaHBABULAN" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborHBABULAN"
												disabled>
											<input type="hidden" class="form-control" id="Harga_hba_bulan" disabled>
											<input type="hidden" class="form-control" id="Frek_hba_bulan" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_hba_bulan"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_hba_bulan"
												disabled>
											<input type="hidden" class="form-control" id="total_hba_bulan" disabled>
											<input type="hidden" class="form-control" id="tanggal_hba_bulan" disabled>
											<input type="hidden" class="form-control" id="id_staff_hba_bulan" disabled>
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
											<input type="text" class="form-control" id="inHBABULAN">
											<p id="notifinHBABULAN" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_bulan_hba()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End HBA -->

					<!-- URIC ACID-->
					<div class="collapse" id="isiURICBULAN">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaURICBULAN" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborURICBULAN"
												disabled>
											<input type="hidden" class="form-control" id="Harga_uric_bulan" disabled>
											<input type="hidden" class="form-control" id="Frek_uric_bulan" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_uric_bulan"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_uric_bulan"
												disabled>
											<input type="hidden" class="form-control" id="total_uric_bulan" disabled>
											<input type="hidden" class="form-control" id="tanggal_uric_bulan" disabled>
											<input type="hidden" class="form-control" id="id_staff_uric_bulan" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">URIC ACID < 12 Tahun</label> <div
												class="col-md-9 has-success">
												<input type="text" class="form-control" id="inURICBULAN">
												<p id="notifinURICBULAN" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_bulan_uric()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End URIC ACID -->

				<!-- TRIGLYSERIDE -->
				<div class="collapse" id="isiTRIGLYSERIDEBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaTRIGLYSERIDEBULAN" disabled>
										<input type="hidden" class="form-control"
											id="id_tindakan_laborTRIGLYSERIDEBULAN" disabled>
										<input type="hidden" class="form-control" id="Harga_trigiseride_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_trigiseride_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_trigiseride_bulan"
											disabled>
										<input type="hidden" class="form-control"
											id="id_list_tindakan_trigiseride_bulan" disabled>
										<input type="hidden" class="form-control" id="total_trigiseride_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_trigiseride_bulan"
											disabled>
										<input type="hidden" class="form-control" id="id_staff_trigiseride_bulan"
											disabled>
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
										<input type="text" class="form-control" id="inTRIGLYSERIDEBULAN">
										<p id="notifinTRIGLYSERIDEBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_bulan_triglyseride()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End URIC ACID -->

				<!-- CHO -->
				<div class="collapse" id="isiCHOBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaCHOBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborCHOBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_CHO_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_CHO_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_CHO_bulan" disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_CHO_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_CHO_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_CHO_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_CHO_bulan" disabled>
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
										<input type="text" class="form-control" id="inCHOBULAN">
										<p id="notifinCHOBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_bulan_cho()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End CHO -->

				<!-- HDL -->
				<div class="collapse" id="isiHDLBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaHDLBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborHDLBULAN"
											disabled>
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
										<input type="text" class="form-control" id="inHDLBULAN">
										<p id="notifinHDLBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_bulan_hdl()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End HDL -->

				<!-- LDL -->
				<div class="collapse" id="isiLDLBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaLDLBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborLDLBULAN"
											disabled>
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
										<input type="text" class="form-control" id="inLDLBULAN">
										<p id="notifinLDLBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_bulan_ldl()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End LDL -->

				<!-- UREUM -->
				<div class="collapse" id="isiUREUMBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaUREUMBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborUREUMBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_ureum_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_ureum_bulan" disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_ureum_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_ureum_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_ureum_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_ureum_bulan" disabled>
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
										<input type="text" class="form-control" id="inUREUMBULAN">
										<p id="notifinUREUMBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_bulan_ureum()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End UREUM -->

				<!-- CREATININ -->
				<div class="collapse" id="isiCREATININBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaCREATININBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborCREATININBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_creatinin_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_creatinin_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_creatinin_bulan"
											disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_creatinin_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_creatinin_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_creatinin_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_creatinin_bulan"
											disabled>
									</div>
								</div>
							</div>
						</div>
						<span class="help-block mb-30"></span>
						<div class="row mb-40">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">CREATININ </label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inCREATININBULAN">
										<p id="notifinCREATININBULAN" style="font-size:12px; margin-top:5px;"> </p>
									</div>
								</div>
							</div>
							<div class="col-md-6 mb-2 pt-10">
								<button onclick="insert_bulan_creatinin()"
									class="btn btn-success btn-anim btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span
										class="btn-text">SIMPAN</span>
							</div>
						</div>
					</div>
				</div>
				<!-- End CREATININ -->

				<!-- PROTEIN -->
				<div class="collapse" id="isiPROTEINBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaPROTEINBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborPROTEINBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_protein_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_protein_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_protein_bulan"
											disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_protein_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_protein_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_protein_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_protein_bulan" disabled>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<span class="help-block mb-20"></span>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">PROTEIN</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inPROTEINBULAN">
										<p id="notifinPROTEINBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_bulan_protein()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End PROTEIN -->

				<!-- SGOT -->
				<div class="collapse" id="isiSGOTBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaSGOTBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborSGOTBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_sgot_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_sgot_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_sgot_bulan" disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_sgot_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_sgot_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_sgot_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_sgot_bulan" disabled>
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
										<input type="text" class="form-control" id="inSGOTBULAN">
										<p id="notifinSGOTBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_bulan_sgot()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End SGOT -->

				<!-- CRP -->
				<div class="collapse" id="isiCRPBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaCRPBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborCRPBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_crp_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_crp_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_crp_bulan" disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_crp_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_crp_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_crp_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_crp_bulan" disabled>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<span class="help-block mb-20"></span>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">CRP</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inCRPBULAN">
										<p id="notifinCRPBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_bulan_crp()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End CRP -->

				<!-- SGPT -->
				<div class="collapse" id="isiSGPTBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaSGPTBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborSGPTBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_sgpt_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_sgpt_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_sgpt_bulan" disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_sgpt_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_sgpt_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_sgpt_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_sgpt_bulan" disabled>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<span class="help-block mb-20"></span>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">SGPT</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSGPTBULAN">
										<p id="notifinSGPTBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_bulan_sgpt()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End SGPT -->

				<!-- ALBUMIN-->
				<div class="collapse" id="isiALBUMINBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaALBUMINBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborALBUMINBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_albumin_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_albumin_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_albumin_bulan"
											disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_albumin_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_albumin_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_albumin_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_albumin_bulan" disabled>
									</div>
								</div>
							</div>
						</div>
						<span class="help-block mb-30"></span>
						<div class="row mb-40">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">ALBUMIN </label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inALBUMINBULAN">
										<p id="notifinALBUMINBULAN" style="font-size:12px; margin-top:5px;"> </p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
							<div class="col-md-6 mb-2">
								<button onclick="insert_bulan_albumin()"
									class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span
										class="btn-text">SIMPAN</span>
							</div>
						</div>
					</div>
				</div>
				<!-- End ALBUMIN -->

				<!-- ELEKTROLIT -->
				<div class="collapse" id="isiELEKTROLITBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaELEKTROLITBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborELEKTROLITBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_elektrolit_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_elektrolit_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_elektrolit_bulan"
											disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_elektrolit_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_elektrolit_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_elektrolit_bulan"
											disabled>
										<input type="hidden" class="form-control" id="id_staff_elektrolit_bulan"
											disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-20">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">NA :</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inNABULAN">
										<p id="notifinNABULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mt-20">
									<label class="control-label col-md-3 pt-10">K :</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inKBULAN">
										<p id="notifinKBULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">CL :</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inCLBULAN">
										<p id="notifinCLBULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">Ca :</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inCaBULAN">
										<p id="notifinCaBULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 mt-30">
										<div class="form-group">
											<button onclick="insert_bulan_elektrolit()"
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
				<div class="collapse" id="isiSPUTUMBTAIBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaSPUTUMBTAIBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborSPUTUMBTAIBULAN"
											disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-20">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">SPUTUM BTA I :</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSPUTUMBTAIBULAN">
										<p id="notifinSPUTUMBTAIBULAN" style="font-size:12px; margin-top:5px;">
										</p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_sputumbtai()"
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
				<div class="collapse" id="isiSPUTUMBTAIIBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaSPUTUMBTAIIBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborSPUTUMBTAIIBULAN"
											disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-20">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">SPUTUM BTA II </label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSPUTUMBTAIIBULAN">
										<p id="notifinSPUTUMBTAIIBULAN" style="font-size:12px; margin-top:5px;">
										</p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_sputumbtaii()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End SPUTUM BTA II -->

				<!-- SPUTUMBTAIII -->
				<div class="collapse" id="isiSPUTUMBTAIIIBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaSPUTUMBTAIIIBULAN" disabled>
										<input type="hidden" class="form-control"
											id="id_tindakan_laborSPUTUMBTAIIIBULAN" disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-20">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">SPUTUM BTA III :</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSPUTUMBTAIIIBULAN">
										<p id="notifinSPUTUMBTAIIIBULAN" style="font-size:12px; margin-top:5px;">
										</p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_sputumbtaiii()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End SPUTUM BTA III -->

				<!-- MALARIA -->
				<div class="collapse" id="isiMALARIABULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaMALARIABULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborMALARIABULAN"
											disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">MALARIA</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inMALARIABULAN">
										<p id="notifinMALARIABULAN" style="font-size:12px; margin-top:5px;">
										</p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_malaria()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End MALARIA -->

				<!-- WIDAL -->
				<div class="collapse" id="isiWIDALBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaWIDALBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborWIDALBULAN"
											disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">WIDAL</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inWIDALBULAN">
										<p id="notifinWIDALBULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_widal()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End WIDAL -->

				<!-- TROPONIN -->
				<div class="collapse" id="isiTROPONINBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaTROPONINBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborTROPONINBULAN"
											disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">TROPONIN</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inTROPONINBULAN">
										<p id="notifinTROPONINBULAN" style="font-size:12px; margin-top:5px;">
										</p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_troponin()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End TROPONIN -->

				<!-- NS1 -->
				<div class="collapse" id="isiNS1BULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaNS1BULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborNS1BULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_ns1_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_ns1_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_ns1_bulan" disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_ns1_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_ns1_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_ns1_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_ns1_bulan" disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">NS1</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inNS1BULAN">
										<p id="notifinNS1BULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_ns1()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End NS1 -->

				<!-- HBSAG -->
				<div class="collapse" id="isiHBSAGBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaHBSAGBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborHBSAGBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_hbsag_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_hbsag_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_hbsag_bulan"
											disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_hbsag_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_hbsag_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_hbsag_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_hbsag_bulan" disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">HBSAG</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inHBSAGBULAN">
										<p id="notifinHBSAGBULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_hbsag()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End HBSAG -->

				<!-- HBSAB -->
				<div class="collapse" id="isiHBSABBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaHBSABBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborHBSABBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_hbsab_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_hbsab_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_hbsab_bulan"
											disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_hbsab_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_hbsab_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_hbsab_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_hbsab_bulan" disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">HBSAB</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inHBSABBULAN">
										<p id="notifinHBSABBULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_hbsab()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End HBSAB -->

				<!-- B20 -->
				<div class="collapse" id="isiB20BULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaB20BULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborB20BULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_b20_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_b20_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_b20_bulan" disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_b20_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_b20_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_b20_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_b20_bulan" disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">B20</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inB20BULAN">
										<p id="notifinB20BULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_b20()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End B20 -->

				<!-- VDRL -->
				<div class="collapse" id="isiVDRLBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaVDRLBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborVDRLBULAN"
											disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">VDRL</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inVDRLBULAN">
										<p id="notifinVDRLBULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_vdrl()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End VDRL -->

				<!-- PLANO -->
				<div class="collapse" id="isiPLANOBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaPLANOBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborPLANOBULAN"
											disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">PLANO TEST</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inPLANOBULAN">
										<p id="notifinPLANOBULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_plano()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End PLANO -->

				<!-- SALMONELLA -->
				<div class="collapse" id="isiSALMONELLABULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaSALMONELLABULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborSALMONELLABULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_salmonella_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_salmonella_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_salmonella_bulan"
											disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_salmonella_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_salmonella_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_salmonella_bulan"
											disabled>
										<input type="hidden" class="form-control" id="id_staff_salmonella_bulan"
											disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">SALMONELLA</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSALMONELLABULAN">
										<p id="notifinSALMONELLABULAN" style="font-size:12px; margin-top:5px;">
										</p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_salmonella()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End SALMONELLA -->

				<!-- DENGUE -->
				<div class="collapse" id="isiDENGUEBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaDENGUEBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborDENGUEBULAN"
											disabled>
										<input type="hidden" class="form-control" id="Harga_dengue_bulan" disabled>
										<input type="hidden" class="form-control" id="Frek_dengue_bulan" disabled>
										<input type="hidden" class="form-control" id="id_pelayanan_dengue_bulan"
											disabled>
										<input type="hidden" class="form-control" id="id_list_tindakan_dengue_bulan"
											disabled>
										<input type="hidden" class="form-control" id="total_dengue_bulan" disabled>
										<input type="hidden" class="form-control" id="tanggal_dengue_bulan" disabled>
										<input type="hidden" class="form-control" id="id_staff_dengue_bulan" disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">DENGUE</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inDENGUEBULAN">
										<p id="notifinDENGUEBULAN" style="font-size:12px; margin-top:5px;">
										</p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_dengue()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End DENGUE -->

				<!-- AGD -->
				<div class="collapse" id="isiAGDBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaAGDBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborAGDBULAN"
											disabled>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-20">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">PH</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inPHBULAN">
										<p id="notifinPHBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">PCO2</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inPCO2BULAN">
										<p id="notifinPCO2BULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">PO2</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inPO2BULAN">
										<p id="notifinPO2BULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">HCO3</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inHCO3BULAN">
										<p id="notifinHCO3BULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">BE</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inBEBULAN">
										<p id="notifinBEBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">SO2</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSO2BULAN">
										<p id="notifinSO2BULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">SUHU</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSUHUBULAN">
										<p id="notifinSUHUBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">OKSIGEN</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inOKSIGENBULAN">
										<p id="notifinOKSIGENBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">SATURASI</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSATURASIBULAN">
										<p id="notifinSATURASIBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_bulan_agd()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End AGD -->

				<!-- URINE -->
				<div class="collapse" id="isiURINEBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaURINEBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborURINEBULAN"
											disabled>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label class="control-label col-md-3 mt-30" style="font-weight:bold;">MAKROSKOPIS :
								</label>
							</div>
						</div>

						<div class="row mt-20">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">WARNA</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inWARNABULAN">
										<p id="notifinWARNABULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">KEJERNIHAN</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inKEJERNIHANBULAN">
										<p id="notifinKEJERNIHANBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 mt-30">
								<label class="control-label col-md-3" style="font-weight:bold;">MIKROSKOPIS :
								</label>
							</div>
						</div>
						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">ERITROSIT</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inERITROSITURINEBULAN">
										<p id="notifinERITROSITURINEBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">LEUKOSIT</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inLEUKOSITURINEBULAN">
										<p id="notifinLEUKOSITURINEBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">SEL EPITEL</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSELBULAN">
										<p id="notifinSELBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">SILINDER</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSILINDERBULAN">
										<p id="notifinSILINDERBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">KRISTAL</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inKRISTALBULAN">
										<p id="notifinKRISTALBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">BAKTERI</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inBAKTERIBULAN">
										<p id="notifinBAKTERIBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>


						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">JAMUR</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inJAMURBULAN">
										<p id="notifinJAMURBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 mt-30">
								<label class="control-label col-md-3 pt-10" style="font-weight:bold;">KIMIA URIN
									:</label>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">ERITROSIT</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inERITROSITKIMIABULAN">
										<p id="notifinERITROSITKIMIABULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">GLUKOSA</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inGLUKOSABULAN">
										<p id="notifinGLUKOSABULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">PROTEIN</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inPROTEINKIMIABULAN">
										<p id="notifinPROTEINKIMIABULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">BILIRUBIN</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inBILIRUBINBULAN">
										<p id="notifinBILIRUBINBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">UROBILIN
										OGEN</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inUROBILINOGENBULAN">
										<p id="notifinUROBILINOGENBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">PH</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inPHKIMIABULAN">
										<p id="notifinPHKIMIABULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">BERAT JENIS</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inBERATBULAN">
										<p id="notifinBERATBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">KETON</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inKETONBULAN">
										<p id="notifinKETONBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">NITRIT</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inNITRITBULAN">
										<p id="notifinNITRITBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">LEUKOSIT</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inLEUKOSITKIMIABULAN">
										<p id="notifinLEUKOSITKIMIABULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-10">
							<div class="col-md-6">
							</div>
							<div class="col-md-6">
								<div class="form-group pull-left">
									<button onclick="insert_data_urine()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End URINE -->

				<!-- ANALISA SPERMA -->
				<div class="collapse" id="isiSPERMABULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaSPERMABULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborSPERMABULAN"
											disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mt-20">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">ANALISA SPERMA</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSPERMABULAN">
										<p id="notifinSPERMABULAN" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>

							<div class="col-md-6 mt-20">
								<div class="form-group">
									<button onclick="insert_bulan_sperma()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
						<span class="help-block mb-20"></span>
					</div>
				</div>
				<!-- End ANALISA SPERMA -->

				<!-- FESES -->
				<div class="collapse" id="isiFESESBULAN">
					<!-- /formbody -->
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
							TINDAKAN
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" id="inNamaFESESBULAN" disabled>
										<input type="hidden" class="form-control" id="id_tindakan_laborFESESBULAN"
											disabled>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label class="control-label col-md-3 mt-30" style="font-weight:bold;">MAKROSKOPIS :
								</label>
							</div>
						</div>

						<div class="row mt-20">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">DARAH</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inDARAHFESESBULAN">
										<p id="notifinDARAHFESESBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">LENDIR</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inLENDIRBULAN">
										<p id="notifinLENDIRBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-20">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">BAU</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inBAUBULAN">
										<p id="notifinBAUBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">KONSISTENSI</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inKONSISTENSIBULAN">
										<p id="notifinKONSISTENSIBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-20">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">WARNA</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inWARNAFESESBULAN">
										<p id="notifinWARNAFESESBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">PARASIT</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inPARASITBULAN">
										<p id="notifinPARASITBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 mt-30">
								<label class="control-label col-md-3" style="font-weight:bold;">MIKROSKOPIS :
								</label>
							</div>
						</div>
						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">LEUKOSIT</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inLEUKOSITFESESBULAN">
										<p id="notifinLEUKOSITFESESBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">ERITROSIT</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inERITROSITFESESBULAN">
										<p id="notifinERITROSITFESESBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">SEL EPITEL</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSELFESESBULAN">
										<p id="notifinSELFESESBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">SILIDER</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inSILIDERBULAN">
										<p id="notifinSILIDERBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">TELUR CACING</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inTELURBULAN">
										<p id="notifinTELURBULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 pt-10">AMOEBA</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inAMOEBABULAN">
										<p id="notifinAMOEBABULAN" style="font-size:12px; margin-top:5px;"></p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>


						<div class="row mt-10">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3 pt-10">BAKTERI</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inBAKTERIFESESBULAN">
										<p id="notifinBAKTERIFESESBULAN" style="font-size:12px; margin-top:5px;">
										</p>
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group pull-left">
									<button onclick="insert_data_feses()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End FESES -->


				<!-- End Everything -->
			</div>
		</div>
	</div>
</div>
<!-- End -->
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
