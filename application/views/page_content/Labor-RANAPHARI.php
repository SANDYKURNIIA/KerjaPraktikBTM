<!-- HARI -->
<div class="modal fade bs-example-modal-lg" id="modal_edit_HARI" role="dialog" aria-labelledby="myLargeModalLabel"
	aria-hidden="true" style="display: none;">
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
						<a id="cetak_semua_hari" class="btn btn-primary ml-20 mb-20"><i class='icon-printer'></i>&nbsp; CETAK SEMUA DATA LABOR</a> 
						<div class="table-wrap" style="width: 95%; margin: auto ">
							<div class="table-responsive">
								<table class="table table-hover display pb-60" id="tablelaborHARI">
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
								<div class="collapse" id="detailTindakanLaborDEWASA">
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
											<input type="text" class="form-control" disabled id="outNamaDEWASA">
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">TANGGAL TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="outTanggalDEWASA" disabled>
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
											<input type="text" class="form-control" disabled id="outHargaDEWASA">
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">JUMLAH TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="outFrekDEWASA" disabled>
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
										<textarea class="form-control" id="outRingDEWASA" disabled rows="13"
													style="max-width:95%; "></textarea>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">KETERANGAN</label>
										<div class="col-md-9 has-error">
										<textarea class="form-control" id="outKetaDEWASA" disabled rows="13"
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
									<table class="table table-hover display " id="outTotalHargaHARI">
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
										<input type="text" class="form-control" disabled id="inNamaPasienHARI">
										<input type="hidden" class="form-control" disabled id="idPelayananHARI">
										<input type="hidden" class="form-control" disabled id="inTindakanHARI">
										<input type="hidden" class="form-control" disabled id="inTotalHARI">
										<input type="hidden" class="form-control" disabled id="inFrekHARI">
									</div>
								</div>
							</div>

							<div class="col-md-6 mb-20 mt-10">
								<div class="form-group ">
									<label class="control-label col-md-3">UMUR PASIEN :</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" disabled id="inUmurPasienHARI">
									</div>
								</div>
								<div class="row mt-20">
									<div class="col-md-12 mb-20 mt-20">
										<div class="form-group ">
											<label class="control-label col-md-3">JENIS KELAMIN :</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" disabled id="inJenisPasienHARI">
												<input type="hidden" class="form-control" disabled
													id="inMasukHARI">
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>

			<!-- Start -->
			<div class="row">
				<div class="col-md-12">
					<!-- Darah Rutin -->
					<div class="collapse" id="isiDARAHHARI">
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
											<input type="text" class="form-control" id="inNamaDARAHHARI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborDARAHHARI"
												disabled>
											<input type="hidden" class="form-control" id="Harga_Darah_Rutin_hari"
												disabled>
											<input type="hidden" class="form-control" id="Frek_Darah_Rutin_hari"
												disabled>
											<input type="hidden" class="form-control"
												id="id_pelayanan_Darah_Rutin_Rutin_hari" disabled>
											<input type="hidden" class="form-control"
												id="id_list_tindakan_Darah_Rutin_hari" disabled>
											<input type="hidden" class="form-control" id="total_Darah_Rutin_hari"
												disabled>
											<input type="hidden" class="form-control" id="tanggal_Darah_Rutin_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_staff_Darah_Rutin_hari"
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
											id="inTipeMasukHBHARI">
											<option value="0">-</option>
											<option value="1">HB UMUR 1 Hari</option>
											<option value="2">HB UMUR 2-6 Hari</option>
											<option value="3">HB UMUR 7 - 23 Hari</option>
											<option value="4">HB UMUR 24 - 37 Hari</option>
											<option value="5">HB UMUR 38 Hari - 1 Tahun</option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="data_hide data_hide_1">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group ">
													<label class="control-label col-md-4 pt-5">HB UMUR 1
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inHB1HARI">
														<p id="notifinHB1HARI" style="font-size:12px; margin-top:5px;">
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_hide data_hide_2">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group ">
													<label class="control-label col-md-4 pt-5">HB UMUR 2-6
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inHB26HARI">
														<p id="notifinHB26HARI" style="font-size:12px; margin-top:5px;">
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_hide data_hide_3">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group ">
													<label class="control-label col-md-4 pt-5">HB UMUR 7 - 23
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inHB723HARI">
														<p id="notifinHB723HARI"
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
													<label class="control-label col-md-4 pt-5">HB UMUR 24 - 37
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inHB2437HARI">
														<p id="notifinHB2437HARI"
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
													<label class="control-label col-md-4 pt-5">HB UMUR 38 HARI - 1
														Tahun</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inHB381HARI">
														<p id="notifinHB381HARI"
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
											id="inTipeMasukHEMATOKRITHARI">
											<option value="0">-</option>
											<option value="1">HEMATOKRIT UMUR 1 Hari</option>
											<option value="2">HEMATOKRIT UMUR 2 - 6 Hari</option>
											<option value="3">HEMATOKRIT UMUR 7 - 23 Hari</option>
											<option value="4">HEMATOKRIT UMUR 24 - 37 Hari</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="data_hema data_hema_1">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">HEMATOKRIT UMUR 1
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inHEMATOKRIT1HARI">
														<p id="notifinHEMATOKRIT1HARI"
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
													<label class="control-label col-md-4 pt-5">HEMATOKRIT UMUR 1 - 6
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inHEMATOKRIT16HARI">
														<p id="notifinHEMATOKRIT16HARI"
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
													<label class="control-label col-md-4 pt-5">HEMATOKRIT UMUR 7 -
														23 Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control"
															id="inHEMATOKRIT723HARI">
														<p id="notifinHEMATOKRIT723HARI"
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
													<label class="control-label col-md-4 pt-5">HEMATOKRIT UMUR 24 -
														37 Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control"
															id="inHEMATOKRIT2437HARI">
														<p id="notifinHEMATOKRIT2437HARI"
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
											id="inTipeMasukMCVHARI">
											<option value="0">-</option>
											<option value="1">MCV UMUR 1 Hari</option>
											<option value="2">MCV UMUR 2 - 6 Hari</option>
											<option value="3">MCV UMUR 7 - 23 Hari</option>
											<option value="4">MCV UMUR 24 - 37 Hari</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="data_mcv data_mcv_1">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCV UMUR 1
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCV1HARI">
														<p id="notifinMCV1HARI" style="font-size:12px; margin-top:5px;">
														</p>
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
													<label class="control-label col-md-4 pt-5">MCV UMUR 2 - 6
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCV26HARI">
														<p id="notifinMCV26HARI"
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
													<label class="control-label col-md-4 pt-5">MCV UMUR 7 - 23
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCV723HARI">
														<p id="notifinMCV723HARI"
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
													<label class="control-label col-md-4 pt-5">MCV UMUR 24 - 37
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCV2437HARI">
														<p id="notifinMCV2437HARI"
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
											id="inTipeMasukMCHHARI">
											<option value="0">-</option>
											<option value="1">MCH UMUR 1 Hari</option>
											<option value="2">MCH UMUR 2 - 6 Hari</option>
											<option value="3">MCH UMUR 7 - 23 HARI</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="data_mch data_mch_1">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCH UMUR 1
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCH1HARI">
														<p id="notifinMCH1HARI" style="font-size:12px; margin-top:5px;">
														</p>
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
													<label class="control-label col-md-4 pt-5">MCH UMUR 2 - 6
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCH26HARI">
														<p id="notifinMCH26HARI"
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
													<label class="control-label col-md-4 pt-5">MCH UMUR 7 - 23
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCH723HARI">
														<p id="notifinMCH723HARI"
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
											id="inTipeMasukMCHCHARI">
											<option value="0">-</option>
											<option value="1">MCHC UMUR 1 Hari</option>
											<option value="2">MCHC UMUR 2 - 6 Hari</option>
											<option value="3">MCHC UMUR 7 - 23 HARI</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="data_mchc data_mchc_1">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">MCHC UMUR 1
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCHC1HARI">
														<p id="notifinMCHC1HARI"
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
													<label class="control-label col-md-4 pt-5">MCHC UMUR 2 - 6
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCHC26HARI">
														<p id="notifinMCHC26HARI"
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
													<label class="control-label col-md-4 pt-5">MCHC UMUR 7 - 23
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inMCHC723HARI">
														<p id="notifinMCHC723HARI"
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
											<input type="text" class="form-control" id="inLEUKOSITHARI">
											<p id="notifinLEUKOSITHARI" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">TROMBOSIT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inTROMBOSITHARI">
											<p id="notifinTROMBOSITHARI" style="font-size:12px; margin-top:5px;">
											</p>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">LED</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inLEDHARI">
											<p id="notifinLEDHARI" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">RDW-SD</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inRDW_SDHARI">
											<p id="notifinRDW-SDHARI" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">RDW-CV</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inRDW_CVHARI">
											<p id="notifinRDW-CVHARI" style="font-size:12px; margin-top:5px;"></p>
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
													<input type="text" class="form-control" id="inBASHARI">
													<p id="notifinBASHARI" style="font-size:12px; margin-top:5px;">
													</p>
													<span class="help-block"></span>

													<label class="control-label col-md-3"
														style="color:black">EOS</label>
													<input type="text" class="form-control" id="inEOSHARI">
													<p id="notifinEOSHARI" style="font-size:12px; margin-top:5px;">
													</p>
													<span class="help-block"></span>
												</div>
												<div class="col-md-6">
													<label class="control-label col-md-3"
														style="color:black">MONO</label>
													<input type="text" class="form-control" id="inMONOHARI">
													<p id="notifinMONOHARI" style="font-size:12px; margin-top:5px;">
													</p>
													<span class="help-block"></span>

													<label class="control-label col-md-3"
														style="color:black">SEGMEN</label>
													<input type="text" class="form-control" id="inSEGMENHARI">
													<p id="notifinSEGMENHARI" style="font-size:12px; margin-top:5px;">
													</p>
													<span class="help-block"></span>
												</div>
												<div class="col-md-6">
													<label class="control-label col-md-3"
														style="color:black">LYMPO</label>
													<input type="text" class="form-control" id="inLYMPOHARI">
													<p id="notifinLYMPOHARI" style="font-size:12px; margin-top:5px;">
													</p>
													<span class="help-block"></span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 mt-40">
									<div class="form-group">
										<button onclick="insert_hari_darah()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End Darah Rutin -->

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
											<p id="notifinERITROSITURINEBULAN" style="font-size:12px; margin-top:5px;">
											</p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">LEUKOSIT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inLEUKOSITURINEBULAN">
											<p id="notifinLEUKOSITURINEBULAN" style="font-size:12px; margin-top:5px;">
											</p>
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
											<p id="notifinERITROSITKIMIABULAN" style="font-size:12px; margin-top:5px;">
											</p>
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
											<p id="notifinLEUKOSITKIMIABULAN" style="font-size:12px; margin-top:5px;">
											</p>
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
											<p id="notifinLEUKOSITFESESBULAN" style="font-size:12px; margin-top:5px;">
											</p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">ERITROSIT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inERITROSITFESESBULAN">
											<p id="notifinERITROSITFESESBULAN" style="font-size:12px; margin-top:5px;">
											</p>
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

					<!-- Darah GOL DARAH -->
					<div class="collapse" id="isiGOL-DARAHHARI">
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
											<input type="text" class="form-control" id="inNamaGOLHARI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborGOLHARI"
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
										<label class="control-label col-md-3">GOLONGAN DARAH</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inGOLDARAHHARI">
											<p id="notifinGOLDARAHHARI" style="font-size:12px; margin-top:5px;">
											</p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_gol_darah_hari()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End GOL DARAH -->


					<!-- Darah GOL DARAH -->
					<div class="collapse" id="isiLEDHARI">
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
											<input type="text" class="form-control" id="inNamaLEDHARI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborLEDHARI"
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
										<label class="control-label col-md-3">LED</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inLEDHARI">
											<p id="notifinLEDHARI" style="font-size:12px; margin-top:5px;">
											</p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_led_hari()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End LED -->

					<!-- Darah DARAH SAMAR -->
					<div class="collapse" id="isiDARAHSAMARHARI">
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
											<input type="text" class="form-control" id="inNamaDARAHSAMARHARI" disabled>
											<input type="hidden" class="form-control"
												id="id_tindakan_laborDARAHSAMARHARI" disabled>
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
											<input type="text" class="form-control" id="inDARAHSAMARHARI">
											<p id="notifinDARAHSAMARHARI" style="font-size:12px; margin-top:5px;">
											</p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_hari_darahsamar()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End DARAH SAMAR -->


					<!-- RHESUS -->
					<div class="collapse" id="isiRHESUSHARI">
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
											<input type="text" class="form-control" id="inNamaRHESUSHARI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborRHESUSHARI"
												disabled>
											<input type="hidden" class="form-control" id="Harga_rhesus_hari" disabled>
											<input type="hidden" class="form-control" id="Frek_rhesus_hari" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_rhesus_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_rhesus_hari"
												disabled>
											<input type="hidden" class="form-control" id="total_rhesus_hari" disabled>
											<input type="hidden" class="form-control" id="tanggal_rhesus_hari" disabled>
											<input type="hidden" class="form-control" id="id_staff_rhesus_hari"
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
											<input type="text" class="form-control" id="inRHESUSHARI">
											<p id="notifinRHESUSHARI" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_hari_rhesus()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End RHESUS -->

					<!-- APTT -->
					<div class="collapse" id="isiAPTTHARI">
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
											<input type="text" class="form-control" id="inNamaAPTTHARI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborAPTTHARI"
												disabled>
											<input type="hidden" class="form-control" id="Harga_aptt_hari" disabled>
											<input type="hidden" class="form-control" id="Frek_aptt_hari" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_aptt_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_aptt_hari"
												disabled>
											<input type="hidden" class="form-control" id="total_aptt_hari" disabled>
											<input type="hidden" class="form-control" id="tanggal_aptt_hari" disabled>
											<input type="hidden" class="form-control" id="id_staff_aptt_hari" disabled>

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
											<input type="text" class="form-control" id="inAPTTHARI">
											<p id="notifinAPTTHARI" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_hari_aptt()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End APTT -->

					<!-- MALARIA -->
					<div class="collapse" id="isiMALARIAHARI">
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
											<input type="text" class="form-control" id="inNamaMALARIAHARI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborMALARIAHARI"
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
										<label class="control-label col-md-3 pt-10">MALARIA</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inMALARIAHARI">
											<p id="notifinMALARIAHARI" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_hari_malaria()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End MALARIA -->

					<!-- PT -->
					<div class="collapse" id="isiPTHARI">
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
											<input type="text" class="form-control" id="inNamaPTHARI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborPTHARI"
												disabled>
											<input type="hidden" class="form-control" id="Harga_pt_hari" disabled>
											<input type="hidden" class="form-control" id="Frek_pt_hari" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_pt_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_pt_hari"
												disabled>
											<input type="hidden" class="form-control" id="total_pt_hari" disabled>
											<input type="hidden" class="form-control" id="tanggal_pt_hari" disabled>
											<input type="hidden" class="form-control" id="id_staff_pt_hari" disabled>
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
											<input type="text" class="form-control" id="inPTHARI">
											<p id="notifinPTHARI" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">INR</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inINRHARI">
											<p id="notifinINRHARI" style="font-size:12px; margin-top:5px;"></p>
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
										<button onclick="insert_hari_pt()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End PT -->

					<!-- PTAPTT -->
					<div class="collapse" id="isiPTAPTTHARI">
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
											<input type="text" class="form-control" id="inNamaPTAPTTHARI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborPTAPTTHARI"
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
											<input type="text" class="form-control" id="inPTAPTTHARI">
											<p id="notifinPTAPTTHARI" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_hari_ptaptt()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End PT/APTT -->

					<!-- GULDARAH -->
					<div class="collapse" id="isiGULDARAHHARI">
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
											<input type="text" class="form-control" id="inNamaGULDARAHHARI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborGULDARAHHARI"
												disabled>
											<input type="hidden" class="form-control" id="Harga_gula_darah_hari"
												disabled>
											<input type="hidden" class="form-control" id="Frek_gula_darah_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_gula_darah_hari"
												disabled>
											<input type="hidden" class="form-control"
												id="id_list_tindakan_gula_darah_hari" disabled>
											<input type="hidden" class="form-control" id="total_gula_darah_hari"
												disabled>
											<input type="hidden" class="form-control" id="tanggal_gula_darah_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_staff_gula_darah_hari"
												disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>
							<div class="row mt-10">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">PREMATURE</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inGULDARAHPREMATUREHARI">
											<p id="notifinGULDARAHPREMATUREHARI"
												style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">BAYI</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inGULDARAHBAYIHARI">
											<p id="notifinGULDARAHBAYIHARI" style="font-size:12px; margin-top:5px;">
											</p>
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
										<button onclick="insert_hari_guldarah()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
						<!-- End GULDARAH -->
					</div>

					<!-- UREUM -->
					<div class="collapse" id="isiUREUMHARI">
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
											<input type="text" class="form-control" id="inNamaUREUMHARI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborUREUMHARI"
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
										<label class="control-label col-md-3 pt-10">UREUM</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inUREUMHARI">
											<p id="notifinUREUMHARI" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_hari_ureum()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End UREUM -->

					<!-- CREATININ -->
					<div class="collapse" id="isiCREATININHARI">
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
											<input type="text" class="form-control" id="inNamaCREATININHARI" disabled>
											<input type="hidden" class="form-control"
												id="id_tindakan_laborCREATININHARI" disabled>
											<input type="hidden" class="form-control" id="Harga_creatinin_hari"
												disabled>
											<input type="hidden" class="form-control" id="Frek_creatinin_hari" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_creatinin_hari"
												disabled>
											<input type="hidden" class="form-control"
												id="id_list_tindakan_creatinin_hari" disabled>
											<input type="hidden" class="form-control" id="total_creatinin_hari"
												disabled>
											<input type="hidden" class="form-control" id="tanggal_creatinin_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_staff_creatinin_hari"
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
											<input type="text" class="form-control" id="inCREATININHARI">
											<p id="notifinCREATININHARI" style="font-size:12px; margin-top:5px;">
											</p>
										</div>
									</div>
								</div>
								<div class="col-md-6 mb-2 pt-10">
									<button onclick="insert_hari_creatinin()"
										class="btn btn-success btn-anim btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
					<!-- End CREATININ -->

					<!-- PROTEIN -->
					<div class="collapse" id="isiPROTEINHARI">
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
											<input type="text" class="form-control" id="inNamaPROTEINHARI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborPROTEINHARI"
												disabled>
											<input type="hidden" class="form-control" id="Harga_protein_hari" disabled>
											<input type="hidden" class="form-control" id="Frek_protein_hari" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_protein_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_protein_hari"
												disabled>
											<input type="hidden" class="form-control" id="total_protein_hari" disabled>
											<input type="hidden" class="form-control" id="tanggal_protein_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_staff_protein_hari"
												disabled>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="col-md-3">
										<label class="control-label">TOTAL PROTEIN</label>
									</div>
									<div class="col-md-9 has-success">
										<select style="border: 1px solid lightgreen;"
											class="form-control  filled-input select2" placeholder="Choose a Category"
											id="inTipeMasukPROTEINHARI">
											<option value="0">-</option>
											<option value="1">PROTEIN PREMATUR</option>
											<option value="2">PROTEIN 0-6 Hari</option>
											<option value="3">PROTEIN 1 Minggu</option>
											<option value="4">PROTEIN 7 Bulan - 1 Tahun</option>
										</select>
									</div>
								</div>
							</div>
							<span class="help-block mb-20"></span>

							<div class="row mt-10 mb-40">
								<div class="col-md-6">
									<div class="data_protein data_protein_1">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">PROTEIN
														PREMATUR</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control"
															id="inPROTEINPREMATURHARI">
														<p id="notifinPROTEINPREMATURHARI"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_protein data_protein_2">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">PROTEIN 0 - 6
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inPROTEIN06HARI">
														<p id="notifinPROTEIN06HARI"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_protein data_protein_3">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">PROTEIN 1
														Minggu</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inPROTEIN1HARI">
														<p id="notifinPROTEIN1HARI"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_protein data_protein_4">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">PROTEIN 7 BULAN - 1
														Tahun</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inPROTEIN71HARI">
														<p id="notifinPROTEIN71HARI"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_hari_protein()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End PROTEIN -->

					<!-- SGOT -->
					<div class="collapse" id="isiSGOTHARI">
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
											<input type="text" class="form-control" id="inNamaSGOTHARI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborSGOTHARI"
												disabled>
											<input type="hidden" class="form-control" id="Harga_sgot_hari" disabled>
											<input type="hidden" class="form-control" id="Frek_sgot_hari" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_sgot_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_sgot_hari"
												disabled>
											<input type="hidden" class="form-control" id="total_sgot_hari" disabled>
											<input type="hidden" class="form-control" id="tanggal_sgot_hari" disabled>
											<input type="hidden" class="form-control" id="id_staff_sgot_hari" disabled>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block mb-20"></span>
							<div class="row mt-10">
								<div class="col-md-6">
									<div class="col-md-2">
										<label class="control-label col-md-3 mt-10">SGOT</label>
									</div>
									<div class="col-md-10 has-success">
										<select style="border: 1px solid lightgreen;"
											class="form-control  filled-input select2" placeholder="Choose a Category"
											id="inTipeMasukSGOTHARI">
											<option value="0">-</option>
											<option value="1">SGOT UMUR 0 - 10 Hari</option>
											<option value="2">SGOT UMUR 10 HARI - 24 Bulan</option>
											<option value="3">SGOT UMUR 24 BULAN - 60 Tahun</option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="data_sgot data_sgot_1">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">SGOT UMUR 0 - 10
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inSGOT010HARI">
														<p id="notifinSGOT010HARI"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_sgot data_sgot_2">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">SGOT UMUR 10 HARI -
														24
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inSGOT1024HARI">
														<p id="notifinSGOT1024HARI"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_sgot data_sgot_3">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">SGOT UMUR 24 - 60
														Bulan</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inSGOT2460HARI">
														<p id="notifinSGOT2460HARI"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row mt-10">
								<div class="col-md-6">
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_hari_sgot()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End SGOT -->

					<!-- CRP -->
					<div class="collapse" id="isiCRPHARI">
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
											<input type="text" class="form-control" id="inNamaCRPHARI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborCRPHARI"
												disabled>
											<input type="hidden" class="form-control" id="Harga_crp_hari" disabled>
											<input type="hidden" class="form-control" id="Frek_crp_hari" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_crp_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_crp_hari"
												disabled>
											<input type="hidden" class="form-control" id="total_crp_hari" disabled>
											<input type="hidden" class="form-control" id="tanggal_crp_hari" disabled>
											<input type="hidden" class="form-control" id="id_staff_crp_hari" disabled>

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
											<input type="text" class="form-control" id="inCRPHARI">
											<p id="notifinCRPHARI" style="font-size:12px; margin-top:5px;">
											</p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_hari_crp()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End CRP -->

					<!-- SGPT -->
					<div class="collapse" id="isiSGPTHARI">
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
											<input type="text" class="form-control" id="inNamaSGPTHARI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborSGPTHARI"
												disabled>
											<input type="hidden" class="form-control" id="Harga_sgpt_hari" disabled>
											<input type="hidden" class="form-control" id="Frek_sgpt_hari" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_sgpt_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_sgpt_hari"
												disabled>
											<input type="hidden" class="form-control" id="total_sgpt_hari" disabled>
											<input type="hidden" class="form-control" id="tanggal_sgpt_hari" disabled>
											<input type="hidden" class="form-control" id="id_staff_sgpt_hari" disabled>

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
											<input type="text" class="form-control" id="inSGPTHARI">
											<p id="notifinSGPTHARI" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_hari_sgpt()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End SGPT -->

					<!-- ALBUMIN-->
					<div class="collapse" id="isiALBUMINHARI">
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
											<input type="text" class="form-control" id="inNamaALBUMINHARI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborALBUMINHARI"
												disabled>
											<input type="hidden" class="form-control" id="Harga_albumin_hari" disabled>
											<input type="hidden" class="form-control" id="Frek_albumin_hari" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_albumin_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_albumin_hari"
												disabled>
											<input type="hidden" class="form-control" id="total_albumin_hari" disabled>
											<input type="hidden" class="form-control" id="tanggal_albumin_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_staff_albumin_hari"
												disabled>

										</div>
									</div>
								</div>
							</div>
							<span class="help-block mb-30"></span>

							<div class="row mt-10">
								<div class="col-md-6">
									<div class="col-md-3">
										<label class="control-label mt-10 pull-left">ALBUMIN</label>
									</div>
									<div class="col-md-9 has-success">
										<select style="border: 1px solid lightgreen;"
											class="form-control  filled-input select2" placeholder="Choose a Category"
											id="inTipeMasukALBUMINHARI">
											<option value="0">-</option>
											<option value="1">ALBUMIN UMUR 0 - 10 Hari</option>
											<option value="2">ALBUMIN UMUR 4 Hari - 14 Tahun</option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="data_albu data_albu_1">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">ALBUMIN UMUR 0 - 4
														Hari</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inALBUMIN04HARI">
														<p id="notifinALBUMIN04HARI"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_albu data_albu_2">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label col-md-4 pt-5">ALBUMIN UMUR 4 Hari -
														14
														Tahun</label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inALBUMIN414HARI">
														<p id="notifinALBUMIN414HARI"
															style="font-size:12px; margin-top:5px;"> </p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row mb-50 mt-20">
								<div class="col-md-6">
								</div>
								<div class="col-md-6 mb-2">
									<button onclick="insert_hari_albumin()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5">
										<i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
					<!-- End ALBUMIN -->

					<!-- ELEKTROLIT -->
					<div class="collapse" id="isiELEKTROLITHARI">
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
											<input type="text" class="form-control" id="inNamaELEKTROLITHARI" disabled>
											<input type="hidden" class="form-control"
												id="id_tindakan_laborELEKTROLITHARI" disabled>
											<input type="hidden" class="form-control" id="Harga_elektrolit_hari"
												disabled>
											<input type="hidden" class="form-control" id="Frek_elektrolit_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_elektrolit_hari"
												disabled>
											<input type="hidden" class="form-control"
												id="id_list_tindakan_elektrolit_hari" disabled>
											<input type="hidden" class="form-control" id="total_elektrolit_hari"
												disabled>
											<input type="hidden" class="form-control" id="tanggal_elektrolit_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_staff_elektrolit_hari"
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
											<input type="text" class="form-control" id="inNAHARI">
											<p id="notifinNAHARI" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group mt-20">
										<label class="control-label col-md-3 pt-10">K :</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inKHARI">
											<p id="notifinKHARI" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mt-20">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">CL :</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inCLHARI">
											<p id="notifinCLHARI" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">Ca :</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inCaHARI">
											<p id="notifinCaHARI" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 mt-30">
											<div class="form-group">
												<button onclick="insert_hari_elektrolit()"
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

					<!-- NS1 -->
					<div class="collapse" id="isiNS1HARI">
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
											<input type="text" class="form-control" id="inNamaNS1HARI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborNS1HARI"
												disabled>
											<input type="hidden" class="form-control" id="Harga_ns1_hari" disabled>
											<input type="hidden" class="form-control" id="Frek_ns1_hari" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_ns1_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_ns1_hari"
												disabled>
											<input type="hidden" class="form-control" id="total_ns1_hari" disabled>
											<input type="hidden" class="form-control" id="tanggal_ns1_hari" disabled>
											<input type="hidden" class="form-control" id="id_staff_ns1_hari" disabled>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">NS1</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inNS1HARI">
											<p id="notifinNS1HARI" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<button onclick="insert_hari_ns1()"
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
					<div class="collapse" id="isiHBSAGHARI">
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
											<input type="text" class="form-control" id="inNamaHBSAGHARI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborHBSAGHARI"
												disabled>
											<input type="hidden" class="form-control" id="Harga_hbsag_hari" disabled>
											<input type="hidden" class="form-control" id="Frek_hbsag_hari" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_hbsag_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_hbsag_hari"
												disabled>
											<input type="hidden" class="form-control" id="total_hbsag_hari" disabled>
											<input type="hidden" class="form-control" id="tanggal_hbsag_hari" disabled>
											<input type="hidden" class="form-control" id="id_staff_hbsag_hari" disabled>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">HBSAG</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inHBSAGHARI">
											<p id="notifinHBSAGHARI" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<button onclick="insert_hari_hbsag()"
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
					<div class="collapse" id="isiHBSABHARI">
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
											<input type="text" class="form-control" id="inNamaHBSABHARI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborHBSABHARI"
												disabled>
											<input type="hidden" class="form-control" id="Harga_hbsab_hari" disabled>
											<input type="hidden" class="form-control" id="Frek_hbsab_hari" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_hbsab_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_hbsab_hari"
												disabled>
											<input type="hidden" class="form-control" id="total_hbsab_hari" disabled>
											<input type="hidden" class="form-control" id="tanggal_hbsab_hari" disabled>
											<input type="hidden" class="form-control" id="id_staff_hbsab_hari" disabled>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">HBSAB</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inHBSABHARI">
											<p id="notifinHBSABHARI" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<button onclick="insert_hari_hbsab()"
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
					<div class="collapse" id="isiB20HARI">
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
											<input type="text" class="form-control" id="inNamaB20HARI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborB20HARI"
												disabled>
											<input type="hidden" class="form-control" id="Harga_b20_hari" disabled>
											<input type="hidden" class="form-control" id="Frek_b20_hari" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_b20_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_b20_hari"
												disabled>
											<input type="hidden" class="form-control" id="total_b20_hari" disabled>
											<input type="hidden" class="form-control" id="tanggal_b20_hari" disabled>
											<input type="hidden" class="form-control" id="id_staff_b20_hari" disabled>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">B20</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inB20HARI">
											<p id="notifinB20HARI" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<button onclick="insert_hari_b20()"
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
					<div class="collapse" id="isiVDRLHARI">
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
											<input type="text" class="form-control" id="inNamaVDRLHARI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborVDRLHARI"
												disabled>
											<input type="hidden" class="form-control" id="Harga_vdrl_hari" disabled>
											<input type="hidden" class="form-control" id="Frek_vdrl_hari" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_vdrl_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_vdrl_hari"
												disabled>
											<input type="hidden" class="form-control" id="total_vdrl_hari" disabled>
											<input type="hidden" class="form-control" id="tanggal_vdrl_hari" disabled>
											<input type="hidden" class="form-control" id="id_staff_vdrl_hari" disabled>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">VDRL</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inVDRLHARI">
											<p id="notifinVDRLHARI" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<button onclick="insert_hari_vdrl()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
							<span class="help-block mb-20"></span>
						</div>
					</div>
					<!-- End VDRL -->

					<!-- SALMONELLA -->
					<div class="collapse" id="isiSALMONELLAHARI">
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
											<input type="text" class="form-control" id="inNamaSALMONELLAHARI" disabled>
											<input type="hidden" class="form-control"
												id="id_tindakan_laborSALMONELLAHARI" disabled>
											<input type="hidden" class="form-control" id="Harga_salmonella_hari"
												disabled>
											<input type="hidden" class="form-control" id="Frek_salmonella_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_salmonella_hari"
												disabled>
											<input type="hidden" class="form-control"
												id="id_list_tindakan_salmonella_hari" disabled>
											<input type="hidden" class="form-control" id="total_salmonella_hari"
												disabled>
											<input type="hidden" class="form-control" id="tanggal_salmonella_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_staff_salmonella_hari"
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
											<input type="text" class="form-control" id="inSALMONELLAHARI">
											<p id="notifinSALMONELLAHARI" style="font-size:12px; margin-top:5px;">
											</p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<button onclick="insert_hari_salmonella()"
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
					<div class="collapse" id="isiDENGUEHARI">
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
											<input type="text" class="form-control" id="inNamaDENGUEHARI" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborDENGUEHARI"
												disabled>
											<input type="hidden" class="form-control" id="Harga_dengue_hari" disabled>
											<input type="hidden" class="form-control" id="Frek_dengue_hari" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_dengue_hari"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_dengue_hari"
												disabled>
											<input type="hidden" class="form-control" id="total_dengue_hari" disabled>
											<input type="hidden" class="form-control" id="tanggal_dengue_hari" disabled>
											<input type="hidden" class="form-control" id="id_staff_dengue_hari"
												disabled>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">DENGUE</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inDENGUEHARI">
											<p id="notifinDENGUEHARI" style="font-size:12px; margin-top:5px;">
											</p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<button onclick="insert_hari_dengue()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
							<span class="help-block mb-20"></span>
						</div>
					</div>
					<!-- End DENGUE -->

					<!-- End Everything -->
				</div>
			</div>
		</div>
	</div>
</div>

<!-- End -->
