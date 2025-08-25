	<!-- ANAK -->
	<div class="modal fade bs-example-modal-lg" id="modal_edit_ANAK" role="dialog" aria-labelledby="myLargeModalLabel"
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
							<a id="cetak_semua_anak" class="btn btn-primary ml-20 mb-20"><i class='icon-printer'></i>&nbsp; CETAK SEMUA DATA LABOR</a> 
							<div class="table-wrap" style="width: 95%; margin: auto ">
								<div class="table-responsive">
									<table class="table table-hover display pb-60" id="tablelaborANAK">
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
					<div class="collapse" id="detailTindakanLaborANAK">
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
											<input type="text" class="form-control" disabled id="outNamaANAK">
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">TANGGAL TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="outTanggalANAK" disabled>
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
											<input type="text" class="form-control" disabled id="outHargaANAK">
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">JUMLAH TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="outFrekANAK" disabled>
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
										<textarea class="form-control" id="outRingANAK" disabled rows="13"
													style="max-width:95%; "></textarea>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">KETERANGAN</label>
										<div class="col-md-9 has-error">
										<textarea class="form-control" id="outKetaANAK" disabled rows="13"
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
										<table class="table table-hover display " id="outTotalHargaANAK">
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
											<input type="text" class="form-control" disabled id="inNamaPasienANAK">
										</div>
									</div>
								</div>

								<div class="col-md-6 mb-20 mt-10">
									<div class="form-group ">
										<label class="control-label col-md-3">UMUR PASIEN :</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" disabled id="inUmurPasienANAK">
										</div>
									</div>
									<div class="row mt-20">
										<div class="col-md-12 mb-20 mt-20">
											<div class="form-group ">
												<label class="control-label col-md-3">JENIS KELAMIN :</label>
												<div class="col-md-9 has-success">
													<input type="text" class="form-control" disabled
														id="inJenisPasienANAK">
													<input type="hidden" class="form-control" disabled
													id="inMasukANAK">
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
						<div class="collapse" id="isiDARAHANAK">
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
												<input type="text" class="form-control" id="inNamaDARAHANAK" disabled>
												<input type="hidden" class="form-control" id="id_tindakan_laborDARAHANAK"
													disabled>
												<input type="hidden" class="form-control" id="Harga_darah_rutin_anak"
													disabled>
												<input type="hidden" class="form-control" id="Frek_darah_rutin_anak"
													disabled>
												<input type="hidden" class="form-control"
													id="id_pelayanan_darah_rutin_anak" disabled>
												<input type="hidden" class="form-control"
													id="id_list_tindakan_darah_rutin_anak" disabled>
												<input type="hidden" class="form-control" id="total_darah_rutin_anak"
													disabled>
												<input type="hidden" class="form-control" id="tanggal_darah_rutin_anak"
													disabled>
												<input type="hidden" class="form-control" id="id_staff_darah_rutin_anak"
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
												id="inTipeMasukHBANAK">
												<option value="0">-</option>
												<option value="1">HB UMUR 1 - 1.5 Tahun</option>
												<option value="2">HB UMUR 1.5 - 3 Tahun</option>
												<option value="3">HB UMUR 3 - 16 Tahun</option>
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="data_hide data_hide_1">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group ">
														<label class="control-label col-md-4 pt-5">HB UMUR 1 - 1.5
															Tahun</label>
														<div class="col-md-8 has-success">
															<input type="text" class="form-control" id="inHB115ANAK">
															<p id="notifinHB115ANAK"
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
														<label class="control-label col-md-4 pt-5">HB UMUR 1.5 - 3 Tahun
														</label>
														<div class="col-md-8 has-success">
															<input type="text" class="form-control" id="inHB153ANAK">
															<p id="notifinHB153ANAK"
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
														<label class="control-label col-md-4 pt-5">HB UMUR 3 - 16
															Tahun</label>
														<div class="col-md-8 has-success">
															<input type="text" class="form-control" id="inHB316ANAK">
															<p id="notifinHB316ANAK"
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
												id="inTipeMasukHEMATOKRITANAK">
												<option value="0">-</option>
												<option value="1">HEMATOKRIT UMUR 1 - 3 Tahun</option>
												<option value="2">HEMATOKRIT UMUR 3 - 5 Tahun</option>
												<option value="3">HEMATOKRIT UMUR 5 - 10 Tahun</option>
												<option value="4">HEMATOKRIT UMUR 10 - 16 Tahun</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="data_hema data_hema_1">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label col-md-4 pt-5">HEMATOKRIT UMUR 1 - 3
															Tahun</label>
														<div class="col-md-8 has-success">
															<input type="text" class="form-control"
																id="inHEMATOKRIT13ANAK">
															<p id="notifinHEMATOKRIT13ANAK"
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
														<label class="control-label col-md-4 pt-5">HEMATOKRIT UMUR 3 - 5
															Tahun</label>
														<div class="col-md-8 has-success">
															<input type="text" class="form-control"
																id="inHEMATOKRIT35ANAK">
															<p id="notifinHEMATOKRIT35ANAK"
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
														<label class="control-label col-md-4 pt-5">HEMATOKRIT UMUR 5 -
															10 Tahun</label>
														<div class="col-md-8 has-success">
															<input type="text" class="form-control"
																id="inHEMATOKRIT510ANAK">
															<p id="notifinHEMATOKRIT510ANAK"
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
														<label class="control-label col-md-4 pt-5">HEMATOKRIT UMUR 10 -
															16 Tahun</label>
														<div class="col-md-8 has-success">
															<input type="text" class="form-control"
																id="inHEMATOKRIT1016ANAK">
															<p id="notifinHEMATOKRIT1016ANAK"
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
												id="inTipeMasukMCVANAK">
												<option value="0">-</option>
												<option value="1">MCV UMUR 1 - 1.5 Tahun</option>
												<option value="2">MCV UMUR 1.5 - 3 Tahun</option>
												<option value="3">MCV UMUR 3 - 5 Tahun</option>
												<option value="4">MCV UMUR 5 - 10 Tahun</option>
												<option value="5">MCV >10 Tahun</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="data_mcv data_mcv_1">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label col-md-4 pt-5">MCV UMUR 1 - 1.5
															Tahun</label>
														<div class="col-md-8 has-success">
															<input type="text" class="form-control" id="inMCV115ANAK">
															<p id="notifinMCV115ANAK"
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
														<label class="control-label col-md-4 pt-5">MCV UMUR 1.5 - 3
															Tahun</label>
														<div class="col-md-8 has-success">
															<input type="text" class="form-control" id="inMCV153ANAK">
															<p id="notifinMCV153ANAK"
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
														<label class="control-label col-md-4 pt-5">MCV UMUR 3 - 5
															Tahun</label>
														<div class="col-md-8 has-success">
															<input type="text" class="form-control" id="inMCV35ANAK">
															<p id="notifinMCV35ANAK"
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
														<label class="control-label col-md-4 pt-5">MCV UMUR 5 - 10
															Tahun</label>
														<div class="col-md-8 has-success">
															<input type="text" class="form-control" id="inMCV510ANAK">
															<p id="notifinMCV510ANAK"
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
														<label class="control-label col-md-4 pt-5">MCV UMUR >10
															Tahun</label>
														<div class="col-md-8 has-success">
															<input type="text" class="form-control" id="inMCV10ANAK">
															<p id="notifinMCV10ANAK"
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
												id="inTipeMasukMCHANAK">
												<option value="0">-</option>
												<option value="1">MCH UMUR 1 - 5 Tahun</option>
												<option value="2">MCH UMUR 5 - 10 Tahun</option>
												<option value="3">MCH >10 Tahun</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="data_mch data_mch_1">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label col-md-4 pt-5">MCH UMUR 1 - 5
															Tahun</label>
														<div class="col-md-8 has-success">
															<input type="text" class="form-control" id="inMCH15ANAK">
															<p id="notifinMCH15ANAK"
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
														<label class="control-label col-md-4 pt-5">MCH UMUR 5 - 10
															Tahun</label>
														<div class="col-md-8 has-success">
															<input type="text" class="form-control" id="inMCH510ANAK">
															<p id="notifinMCH510ANAK"
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
														<label class="control-label col-md-4 pt-5">MCH UMUR >10
															Tahun</label>
														<div class="col-md-8 has-success">
															<input type="text" class="form-control" id="inMCH10ANAK">
															<p id="notifinMCH10ANAK"
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
												id="inTipeMasukMCHCANAK">
												<option value="0">-</option>
												<option value="1">MCHC UMUR 1 - 1.5 Tahun</option>
												<option value="2">MCHC UMUR 1.5 - 5 Tahun</option>
												<option value="3">MCHC UMUR 3 - 10 Tahun</option>
												<option value="4">MCHC UMUR >10 Tahun</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="data_mchc data_mchc_1">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label col-md-4 pt-5">MCHC UMUR 1 - 1.5
															Tahun</label>
														<div class="col-md-8 has-success">
															<input type="text" class="form-control" id="inMCHC115ANAK">
															<p id="notifinMCHC115ANAK"
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
														<label class="control-label col-md-4 pt-5">MCHC UMUR 1.5 - 3
															Tahun</label>
														<div class="col-md-8 has-success">
															<input type="text" class="form-control" id="inMCHC153ANAK">
															<p id="notifinMCHC153ANAK"
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
														<label class="control-label col-md-4 pt-5">MCHC UMUR 3 - 10
															Tahun</label>
														<div class="col-md-8 has-success">
															<input type="text" class="form-control" id="inMCHC310ANAK">
															<p id="notifinMCHC310ANAK"
																style="font-size:12px; margin-top:5px;"> </p>
															<span class="help-block"></span>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="data_mchc data_mchc_4">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label col-md-4 pt-5">MCHC UMUR >10
															Tahun</label>
														<div class="col-md-8 has-success">
															<input type="text" class="form-control" id="inMCHC10ANAK">
															<p id="notifinMCHC10ANAK"
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
												<input type="text" class="form-control" id="inLEUKOSITANAK">
												<p id="notifinLEUKOSITANAK" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3 pt-10">TROMBOSIT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inTROMBOSITANAK">
												<p id="notifinTROMBOSITANAK" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
								</div>

								<div class="row mt-10">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3 pt-10">ERITROSIT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inERITROSITANAK">
												<p id="notifinERITROSITANAK" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3 pt-10">LED</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inLEDANAK">
												<p id="notifinLEDANAK" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
								</div>

								<div class="row mt-10">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">RDW-CV</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inRDW_CVANAK">
												<p id="notifinRDW-CVANAK" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">RDW-SD</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inRDW_SDANAK">
												<p id="notifinRDW-SDANAK" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
								</div>

								<div class="row mt-10">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3 pt-10">BLT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inBLTANAK">
												<p id="notifinBLTANAK" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3 pt-10">CLT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inCLTANAK">
												<p id="notifinCLTANAK" style="font-size:12px; margin-top:5px;"></p>
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
														<input type="text" class="form-control" id="inBASANAK">
														<p id="notifinBASANAK" style="font-size:12px; margin-top:5px;">
														</p>
														<span class="help-block"></span>

														<label class="control-label col-md-3"
															style="color:black">EOS</label>
														<input type="text" class="form-control" id="inEOSANAK">
														<p id="notifinEOSANAK" style="font-size:12px; margin-top:5px;">
														</p>
														<span class="help-block"></span>
													</div>
													<div class="col-md-6">
														<label class="control-label col-md-3"
															style="color:black">MONO</label>
														<input type="text" class="form-control" id="inMONOANAK">
														<p id="notifinMONOANAK" style="font-size:12px; margin-top:5px;">
														</p>
														<span class="help-block"></span>

														<label class="control-label col-md-3"
															style="color:black">SEGMEN</label>
														<input type="text" class="form-control" id="inSEGMENANAK">
														<p id="notifinSEGMENANAK" style="font-size:12px; margin-top:5px;">
														</p>
														<span class="help-block"></span>
													</div>
													<div class="col-md-6">
														<label class="control-label col-md-3"
															style="color:black">LYMPO</label>
														<input type="text" class="form-control" id="inLYMPOANAK">
														<p id="notifinLYMPOANAK" style="font-size:12px; margin-top:5px;">
														</p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6 mt-40">
										<div class="form-group">
											<button onclick="insert_anak_darah()"
												class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
													class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Darah Rutin -->


						<!-- Darah GOL DARAH -->
						<div class="collapse" id="isiGOLANAK">
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
												<input type="text" class="form-control" id="inNamaGOLANAK" disabled>
												<input type="hidden" class="form-control" id="id_tindakan_laborGOLANAK"
													disabled>
												<input type="hidden" class="form-control" id="Harga_goldar_anak" disabled>
												<input type="hidden" class="form-control" id="Frek_goldar_anak" disabled>
												<input type="hidden" class="form-control" id="id_pelayanan_goldar_anak"
													disabled>
												<input type="hidden" class="form-control" id="id_list_tindakan_goldar_anak"
													disabled>
												<input type="hidden" class="form-control" id="total_goldar_anak" disabled>
												<input type="hidden" class="form-control" id="tanggal_goldar_anak"
													disabled>
												<input type="hidden" class="form-control" id="id_staff_goldar_anak"
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
												<input type="text" class="form-control" id="inGOLDARAHANAK">
												<p id="notifinGOLDARAHANAK" style="font-size:12px; margin-top:5px;">
												</p>
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


						<!-- RHESUS -->
						<div class="collapse" id="isiRHESUSANAK">
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
												<input type="text" class="form-control" id="inNamaRHESUSANAK" disabled>
												<input type="hidden" class="form-control" id="id_tindakan_laborRHESUSANAK"
													disabled>
												<input type="hidden" class="form-control" id="Harga_rhesus_anak" disabled>
												<input type="hidden" class="form-control" id="Frek_rhesus_anak" disabled>
												<input type="hidden" class="form-control" id="id_pelayanan_rhesus_anak"
													disabled>
												<input type="hidden" class="form-control" id="id_list_tindakan_rhesus_anak"
													disabled>
												<input type="hidden" class="form-control" id="total_rhesus_anak" disabled>
												<input type="hidden" class="form-control" id="tanggal_rhesus_anak"
													disabled>
												<input type="hidden" class="form-control" id="id_staff_rhesus_anak"
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
												<input type="text" class="form-control" id="inRHESUSANAK">
												<p id="notifinRHESUSANAK" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<button onclick="insert_anak_rhesus()"
												class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
													class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End RHESUS -->

						<!-- APTT -->
						<div class="collapse" id="isiAPTTANAK">
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
												<input type="text" class="form-control" id="inNamaAPTTANAK" disabled>
												<input type="hidden" class="form-control" id="id_tindakan_laborAPTTANAK"
													disabled>
												<input type="hidden" class="form-control" id="Harga_aptt_anak" disabled>
												<input type="hidden" class="form-control" id="Frek_aptt_anak" disabled>
												<input type="hidden" class="form-control" id="id_pelayanan_aptt_anak"
													disabled>
												<input type="hidden" class="form-control" id="id_list_tindakan_aptt_anak"
													disabled>
												<input type="hidden" class="form-control" id="total_aptt_anak" disabled>
												<input type="hidden" class="form-control" id="tanggal_aptt_anak" disabled>
												<input type="hidden" class="form-control" id="id_staff_aptt_anak" disabled>
											</div>
										</div>
									</div>
									<!--/span-->
								</div>
								<span class="help-block mb-20"></span>

								<div class="row mt-10">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3 pt-10">APTT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inAPTTANAK">
												<p id="notifinAPTTANAK" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<button onclick="insert_anak_aptt()"
												class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
													class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End APTT -->

						<!-- PT -->
						<div class="collapse" id="isiPTANAK">
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
												<input type="text" class="form-control" id="inNamaPTANAK" disabled>
												<input type="hidden" class="form-control" id="id_tindakan_laborPTANAK"
													disabled>
												<input type="hidden" class="form-control" id="Harga_pt_anak" disabled>
												<input type="hidden" class="form-control" id="Frek_pt_anak" disabled>
												<input type="hidden" class="form-control" id="id_pelayanan_pt_anak"
													disabled>
												<input type="hidden" class="form-control" id="id_list_tindakan_pt_anak"
													disabled>
												<input type="hidden" class="form-control" id="total_pt_anak" disabled>
												<input type="hidden" class="form-control" id="tanggal_pt_anak" disabled>
												<input type="hidden" class="form-control" id="id_staff_pt_anak" disabled>
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
												<input type="text" class="form-control" id="inPTANAK">
												<p id="notifinPTANAK" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3 pt-10">INR</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inINRANAK">
												<p id="notifinINRANAK" style="font-size:12px; margin-top:5px;"></p>
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
											<button onclick="insert_anak_pt()"
												class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
													class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End PT -->

						<!-- PT/APTT -->
						<div class="collapse" id="isiPTAPTTANAK">
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
												<input type="text" class="form-control" id="inNamaPTAPTTANAK" disabled>
												<input type="hidden" class="form-control" id="id_tindakan_laborPTAPTTANAK"
													disabled>
												<input type="hidden" class="form-control" id="Harga_ptaptt_anak" disabled>
												<input type="hidden" class="form-control" id="Frek_ptaptt_anak" disabled>
												<input type="hidden" class="form-control" id="id_pelayanan_ptaptt_anak"
													disabled>
												<input type="hidden" class="form-control" id="id_list_tindakan_ptaptt_anak"
													disabled>
												<input type="hidden" class="form-control" id="total_ptaptt_anak" disabled>
												<input type="hidden" class="form-control" id="tanggal_ptaptt_anak"
													disabled>
												<input type="hidden" class="form-control" id="id_staff_ptaptt_anak"
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
												<input type="text" class="form-control" id="inPTAPTTANAK">
												<p id="notifinPTAPTTANAK" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3 pt-10">INR</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inINRPTAPTTANAK">
												<p id="notifinINRPTAPTTANAK" style="font-size:12px; margin-top:5px;"></p>
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
												<input type="text" class="form-control" id="inAPTTPTAPTTANAK">
												<p id="notifinAPTTPTAPTTANAK" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<button onclick="insert_anak_ptaptt()"
												class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
													class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End PT/APTT -->

						<!-- GULDARAH -->
						<div class="collapse" id="isiGULDARAHANAK">
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
												<input type="text" class="form-control" id="inNamaGULDARAHANAK" disabled>
												<input type="hidden" class="form-control"
													id="id_tindakan_laborGULDARAHANAK" disabled>
												<input type="hidden" class="form-control" id="Harga_gula_darah_anak"
													disabled>
												<input type="hidden" class="form-control" id="Frek_gula_darah_anak"
													disabled>
												<input type="hidden" class="form-control" id="id_pelayanan_gula_darah_anak"
													disabled>
												<input type="hidden" class="form-control"
													id="id_list_tindakan_gula_darah_anak" disabled>
												<input type="hidden" class="form-control" id="total_gula_darah_anak"
													disabled>
												<input type="hidden" class="form-control" id="tanggal_gula_darah_anak"
													disabled>
												<input type="hidden" class="form-control" id="id_staff_gula_darah_anak"
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
											<label class="control-label col-md-3 pt-10">PUASA</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inPUASAANAK">
												<p id="notifinPUASAANAK" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3 pt-10">2 JAM PP</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="in2JAMPPANAK">
												<p id="notifin2JAMPPANAK" style="font-size:12px; margin-top:5px;"></p>
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
												<input type="text" class="form-control" id="inSEWAKTUANAK">
												<p id="notifinSEWAKTUANAK" style="font-size:12px; margin-top:5px;">
												</p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<button onclick="insert_anak_guldarah()"
												class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
													class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										</div>
									</div>
								</div>
							</div>
							<!-- End GULDARAH -->
						</div>

						<!-- HBA -->
						<div class="collapse" id="isiHBAANAK">
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
												<input type="text" class="form-control" id="inNamaHBAANAK" disabled>
												<input type="hidden" class="form-control" id="id_tindakan_laborHBAANAK"
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
											<label class="control-label col-md-3 pt-10">HBA</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inHBAANAK">
												<p id="notifinHBAANAK" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<button onclick="insert_anak_hba()"
												class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
													class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End HBA -->

						<!-- CHO -->
						<div class="collapse" id="isiCHOANAK">
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
												<input type="text" class="form-control" id="inNamaCHOANAK" disabled>
												<input type="hidden" class="form-control" id="id_tindakan_laborCHO"
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
											<label class="control-label col-md-3 pt-10">CHO</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inCHOANAK">
												<p id="notifinCHOANAK" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<button onclick="insert_anak_cho()"
												class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
													class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End CHO -->

						<!-- HDL -->
						<div class="collapse" id="isiHDLANAK">
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
												<input type="text" class="form-control" id="inNamaHDLANAK" disabled>
												<input type="hidden" class="form-control" id="id_tindakan_laborHDLANAK"
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
												<input type="text" class="form-control" id="inHDLANAK">
												<p id="notifinHDLANAK" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<button onclick="insert_anak_hdl()"
												class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
													class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End HDL -->

						<!-- LDL -->
						<div class="collapse" id="isiLDLANAK">
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
												<input type="text" class="form-control" id="inNamaLDLANAK" disabled>
												<input type="hidden" class="form-control" id="id_tindakan_laborLDLANAK"
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
												<input type="text" class="form-control" id="inLDLANAK">
												<p id="notifinLDLANAK" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<button onclick="insert_anak_ldl()"
												class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
													class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End LDL -->

						<!-- UREUM -->
						<div class="collapse" id="isiUREUMANAK">
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
												<input type="text" class="form-control" id="inNamaUREUMANAK" disabled>
												<input type="hidden" class="form-control" id="id_tindakan_laborUREUMANAK"
													disabled>
												<input type="hidden" class="form-control" id="Harga_ureum_anak" disabled>
												<input type="hidden" class="form-control" id="Frek_ureum_anak" disabled>
												<input type="hidden" class="form-control" id="id_pelayanan_ureum_anak"
													disabled>
												<input type="hidden" class="form-control" id="id_list_tindakan_ureum_anak"
													disabled>
												<input type="hidden" class="form-control" id="total_ureum_anak" disabled>
												<input type="hidden" class="form-control" id="tanggal_ureum_anak" disabled>
												<input type="hidden" class="form-control" id="id_staff_ureum_anak"
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
												<input type="text" class="form-control" id="inUREUMANAK">
												<p id="notifinUREUMANAK" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<button onclick="insert_anak_ureum()"
												class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
													class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End UREUM -->

						<!-- CREATININ -->
						<div class="collapse" id="isiCREATININANAK">
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
												<input type="text" class="form-control" id="inNamaCREATININANAK" disabled>
												<input type="hidden" class="form-control"
													id="id_tindakan_laborCREATININANAK" disabled>
												<input type="hidden" class="form-control" id="Harga_creatinin_anak"
													disabled>
												<input type="hidden" class="form-control" id="Frek_creatinin_anak"
													disabled>
												<input type="hidden" class="form-control" id="id_pelayanan_creatinin_anak"
													disabled>
												<input type="hidden" class="form-control"
													id="id_list_tindakan_creatinin_anak" disabled>
												<input type="hidden" class="form-control" id="total_creatinin_anak"
													disabled>
												<input type="hidden" class="form-control" id="tanggal_creatinin_anak"
													disabled>
												<input type="hidden" class="form-control" id="id_staff_creatinin_anak"
													disabled>
											</div>
										</div>
									</div>

									<div class="col-md-5">
										<div class="col-md-12 has-success">
											<select style="border: 1px solid lightgreen;"
												class="form-control  filled-input select2" placeholder="Choose a Category"
												id="inTipeCREATININ" name="inTipeCREATININ">
												<option value="0">-</option>
												<option value="1" class="active">CREATININ UMUR 11-15 Tahun</option>
												<option value="2">CREATININ UMUR 15-18 Tahun</option>
											</select>
										</div>
									</div>
								</div>
								<span class="help-block mb-30"></span>
								<div class="row mb-40">
									<div class="col-md-6">
										<div class="data_hide data_hide_1">
											<div class="row mt-10">
												<div class="col-md-12">
													<div class="form-group ">
														<label class="control-label col-md-4 pt-5">CREATININ UMUR 11-15
															Tahun </label>
														<div class="col-md-8 has-success">
															<input type="text" class="form-control"
																id="inCREATININ115ANAK">
															<p id="notifinCREATININ115ANAK"
																style="font-size:12px; margin-top:5px;"> </p>
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
														<label class="control-label col-md-4 pt-5">CREATININ UMUR 15-18
															Tahun </label>
														<div class="col-md-8 has-success">
															<input type="text" class="form-control"
																id="inCREATININ1518ANAK">
															<p id="notifinCREATININ1518ANAK"
																style="font-size:12px; margin-top:5px;"> </p>
															<span class="help-block"></span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6 mb-2 pt-10">
										<button onclick="insert_anak_creatinin()"
											class="btn btn-success btn-anim btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
						<!-- End CREATININ -->

						<!-- PROTEIN -->
						<div class="collapse" id="isiPROTEINANAK">
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
												<input type="text" class="form-control" id="inNamaPROTEINANAK" disabled>
												<input type="hidden" class="form-control" id="id_tindakan_laborPROTEINANAK"
													disabled>
												<input type="hidden" class="form-control" id="Harga_protein_anak" disabled>
												<input type="hidden" class="form-control" id="Frek_protein_anak" disabled>
												<input type="hidden" class="form-control" id="id_pelayanan_protein_anak"
													disabled>
												<input type="hidden" class="form-control"
													id="id_list_tindakan_protein_anak" disabled>
												<input type="hidden" class="form-control" id="total_protein_anak" disabled>
												<input type="hidden" class="form-control" id="tanggal_protein_anak"
													disabled>
												<input type="hidden" class="form-control" id="id_staff_protein_anak"
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
											<label class="control-label col-md-3 pt-10">PROTEIN</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inPROTEINANAK">
												<p id="notifinPROTEINANAK" style="font-size:12px; margin-top:5px;">
												</p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<button onclick="insert_anak_protein()"
												class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
													class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End PROTEIN -->

						<!-- SGOT -->
						<div class="collapse" id="isiSGOTANAK">
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
												<input type="text" class="form-control" id="inNamaSGOTANAK" disabled>
												<input type="hidden" class="form-control" id="id_tindakan_laborSGOTANAK"
													disabled>
												<input type="hidden" class="form-control" id="Harga_sgot_anak" disabled>
												<input type="hidden" class="form-control" id="Frek_sgot_anak" disabled>
												<input type="hidden" class="form-control" id="id_pelayanan_sgot_anak"
													disabled>
												<input type="hidden" class="form-control" id="id_list_tindakan_sgot_anak"
													disabled>
												<input type="hidden" class="form-control" id="total_sgot_anak" disabled>
												<input type="hidden" class="form-control" id="tanggal_sgot_anak" disabled>
												<input type="hidden" class="form-control" id="id_staff_sgot_anak" disabled>
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
												<input type="text" class="form-control" id="inSGOTANAK">
												<p id="notifinSGOTANAK" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<button onclick="insert_anak_sgot()"
												class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
													class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End SGOT -->

						<!-- CRP -->
						<div class="collapse" id="isiCRPANAK">
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
												<input type="text" class="form-control" id="inNamaCRPANAK" disabled>
												<input type="hidden" class="form-control" id="id_tindakan_laborCRPANAK"
													disabled>
												<input type="hidden" class="form-control" id="Harga_crp_anak" disabled>
												<input type="hidden" class="form-control" id="Frek_crp_anak" disabled>
												<input type="hidden" class="form-control" id="id_pelayanan_crp_anak"
													disabled>
												<input type="hidden" class="form-control" id="id_list_tindakan_crp_anak"
													disabled>
												<input type="hidden" class="form-control" id="total_crp_anak" disabled>
												<input type="hidden" class="form-control" id="tanggal_crp_anak" disabled>
												<input type="hidden" class="form-control" id="id_staff_crp_anak" disabled>
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
												<input type="text" class="form-control" id="inCRPANAK">
												<p id="notifinCRPANAK" style="font-size:12px; margin-top:5px;">
												</p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<button onclick="insert_anak_crp()"
												class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
													class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End CRP -->

						<!-- SGPT -->
						<div class="collapse" id="isiSGPTANAK">
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
												<input type="text" class="form-control" id="inNamaSGPTANAK" disabled>
												<input type="hidden" class="form-control" id="id_tindakan_laborSGPTANAK"
													disabled>
												<input type="hidden" class="form-control" id="Harga_sgpt_anak" disabled>
												<input type="hidden" class="form-control" id="Frek_sgpt_anak" disabled>
												<input type="hidden" class="form-control" id="id_pelayanan_sgpt_anak"
													disabled>
												<input type="hidden" class="form-control" id="id_list_tindakan_sgpt_anak"
													disabled>
												<input type="hidden" class="form-control" id="total_sgpt_anak" disabled>
												<input type="hidden" class="form-control" id="tanggal_sgpt_anak" disabled>
												<input type="hidden" class="form-control" id="id_staff_sgpt_anak" disabled>
											</div>
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
											<input type="text" class="form-control" id="inSGPTANAK">
											<p id="notifinSGPTANAK" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_anak_sgpt()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End SGPT -->

					<!-- ALBUMIN-->
					<div class="collapse" id="isiALBUMINANAK">
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
											<input type="text" class="form-control" id="inNamaALBUMINANAK" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborALBUMINANAK"
												disabled>
											<input type="hidden" class="form-control" id="Harga_albumin_anak" disabled>
											<input type="hidden" class="form-control" id="Frek_albumin_anak" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_albumin_anak"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_albumin_anak"
												disabled>
											<input type="hidden" class="form-control" id="total_albumin_anak" disabled>
											<input type="hidden" class="form-control" id="tanggal_albumin_anak" disabled>
											<input type="hidden" class="form-control" id="id_staff_albumin_anak" disabled>
										</div>
									</div>
								</div>

								<div class="col-md-5">
									<div class="col-md-12 has-success">
										<select style="border: 1px solid lightgreen;"
											class="form-control  filled-input select2" placeholder="Choose a Category"
											id="inTipeMasukALBUMINANAK">
											<option value="0">-</option>
											<option value="1">ALBUMIN 4 Hari - 14 Tahun</option>
											<option value="2">ALBUMIN 14 - 18 Tahun</option>
											<option value="3">ALBUMIN 18 - 60 Tahun</option>
										</select>
									</div>
								</div>
							</div>
							<span class="help-block mb-30"></span>
							<div class="row mb-40">
								<div class="col-md-6">
									<div class="data_hide data_hide_1">
										<div class="row mt-10">
											<div class="col-md-12">
												<div class="form-group ">
													<label class="control-label col-md-4 pt-5">ALBUMIN 4 Hari - 14
														Tahun </label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inALBUMIN414ANAK">
														<p id="notifinALBUMIN414ANAK"
															style="font-size:12px; margin-top:5px;">
														</p>
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
													<label class="control-label col-md-4 pt-5">ALBUMIN UMUR 14 - 18
														Tahun </label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inALBUMIN1418ANAK">
														<p id="notifinALBUMIN1418ANAK"
															style="font-size:12px; margin-top:5px;">
														</p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="data_hide data_hide_3">
										<div class="row mt-10">
											<div class="col-md-12">
												<div class="form-group ">
													<label class="control-label col-md-4 pt-5">ALBUMIN UMUR 18 - 60
														Tahun </label>
													<div class="col-md-8 has-success">
														<input type="text" class="form-control" id="inALBUMIN1860ANAK">
														<p id="notifinALBUMIN1860ANAK"
															style="font-size:12px; margin-top:5px;">
														</p>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 mb-2 pt-10">
									<button onclick="insert_anak_albumin()"
										class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
											class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
								</div>
							</div>
						</div>
					</div>
					<!-- End ALBUMIN -->

					<!-- ELEKTROLIT -->
					<div class="collapse" id="isiELEKTROLITANAK">
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
											<input type="text" class="form-control" id="inNamaELEKTROLITANAK" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborELEKTROLITANAK"
												disabled>
											<input type="hidden" class="form-control" id="Harga_elektrolit_anak" disabled>
											<input type="hidden" class="form-control" id="Frek_elektrolit_anak" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_elektrolit_anak"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_elektrolit_anak"
												disabled>
											<input type="hidden" class="form-control" id="total_elektrolit_anak" disabled>
											<input type="hidden" class="form-control" id="tanggal_elektrolit_anak"
												disabled>
											<input type="hidden" class="form-control" id="id_staff_elektrolit_anak"
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
											<input type="text" class="form-control" id="inNAANAK">
											<p id="notifinNAANAK" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group mt-20">
										<label class="control-label col-md-3 pt-10">K :</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inKANAK">
											<p id="notifinKANAK" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mt-20">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">CL :</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inCLANAK">
											<p id="notifinCLANAK" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">Ca :</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inCaANAK">
											<p id="notifinCaANAK" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 mt-30">
											<div class="form-group">
												<button onclick="insert_anak_elektrolit()"
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
					<div class="collapse" id="isiSPUTUMBTAIANAK">
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
											<input type="text" class="form-control" id="inNamaSPUTUMBTAIANAK" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborSPUTUMBTAIANAK"
												disabled>
											<input type="hidden" class="form-control" id="Harga_sputumbtai_anak" disabled>
											<input type="hidden" class="form-control" id="Frek_sputumbtai_anak" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_sputumbtai_anak"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_sputumbtai_anak"
												disabled>
											<input type="hidden" class="form-control" id="total_sputumbtai_anak" disabled>
											<input type="hidden" class="form-control" id="tanggal_sputumbtai_anak"
												disabled>
											<input type="hidden" class="form-control" id="id_staff_sputumbtai_anak"
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
											<input type="text" class="form-control" id="inSPUTUMBTIANAK">
											<p id="notifinSPUTUMBTAIANAK" style="font-size:12px; margin-top:5px;">
											</p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<button onclick="insert_anak_sputumbtai()"
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
					<div class="collapse" id="isiSPUTUMBTAIIANAK">
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
											<input type="text" class="form-control" id="inNamaSPUTUMBTAIIANAK" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborSPUTUMBTAIIANAK"
												disabled>
											<input type="hidden" class="form-control" id="Harga_sputumbtaii_anak" disabled>
											<input type="hidden" class="form-control" id="Frek_sputumbtaii_anak" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_sputumbtaii_anak"
												disabled>
											<input type="hidden" class="form-control"
												id="id_list_tindakan_sputumbtaii_anak" disabled>
											<input type="hidden" class="form-control" id="total_sputumbtaii_anak" disabled>
											<input type="hidden" class="form-control" id="tanggal_sputumbtaii_anak"
												disabled>
											<input type="hidden" class="form-control" id="id_staff_sputumbtaii_anak"
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
											<input type="text" class="form-control" id="inSPUTUMBTAIIANAK">
											<p id="notifinSPUTUMBTAIIANAK" style="font-size:12px; margin-top:5px;">
											</p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<button onclick="insert_anak_sputumbtaii()"
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
					<div class="collapse" id="isiSPUTUMBTAIIIANAK">
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
											<input type="text" class="form-control" id="inNamaSPUTUMBTAIIIANAK" disabled>
											<input type="hidden" class="form-control"
												id="id_tindakan_laborSPUTUMBTAIIIANAK" disabled>
											<input type="hidden" class="form-control" id="Harga_sputumbtaiii_anak"
												disabled>
											<input type="hidden" class="form-control" id="Frek_sputumbtaiii_anak" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_sputumbtaiii_anak"
												disabled>
											<input type="hidden" class="form-control"
												id="id_list_tindakan_sputumbtaiii_anak" disabled>
											<input type="hidden" class="form-control" id="total_sputumbtaiii_anak"
												disabled>
											<input type="hidden" class="form-control" id="tanggal_sputumbtaiii_anak"
												disabled>
											<input type="hidden" class="form-control" id="id_staff_sputumbtaiii_anak"
												disabled>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-20">
								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">SPUTUM BTA III :</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inSPUTUMBTAIIIANAK">
											<p id="notifinSPUTUMBTAIIIANAK" style="font-size:12px; margin-top:5px;">
											</p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<button onclick="insert_anak_sputumbtaiii()"
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
					<div class="collapse" id="isiMALARIAANAK">
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
											<input type="text" class="form-control" id="inNamaMALARIAANAK" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborMALARIAANAK"
												disabled>
											<input type="hidden" class="form-control" id="Harga_malaria_anak" disabled>
											<input type="hidden" class="form-control" id="Frek_malaria_anak" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_malaria_anak"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_malaria_anak"
												disabled>
											<input type="hidden" class="form-control" id="total_malaria_anak" disabled>
											<input type="hidden" class="form-control" id="tanggal_malaria_anak" disabled>
											<input type="hidden" class="form-control" id="id_staff_malaria_anak" disabled>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">MALARIA</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inMALARIAANAK">
											<p id="notifinMALARIAANAK" style="font-size:12px; margin-top:5px;">
											</p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<button onclick="insert_anak_malaria()"
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
					<div class="collapse" id="isiWIDALANAK">
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
											<input type="text" class="form-control" id="inNamaWIDALANAK" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborWIDALANAK"
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
											<input type="text" class="form-control" id="inWIDALANAK">
											<p id="notifinWIDALANAK" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<button onclick="insert_anak_widal()"
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
					<div class="collapse" id="isiTROPONINANAK">
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
											<input type="text" class="form-control" id="inNamaTROPONINANAK" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborTROPONINANAK"
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
											<input type="text" class="form-control" id="inTROPONINANAK">
											<p id="notifinTROPONINANAK" style="font-size:12px; margin-top:5px;">
											</p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<button onclick="insert_anak_troponin()"
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
					<div class="collapse" id="isiNS1ANAK">
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
											<input type="text" class="form-control" id="inNamaNS1ANAK" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborNS1ANAK"
												disabled>
											<input type="hidden" class="form-control" id="Harga_ns1_anak" disabled>
											<input type="hidden" class="form-control" id="Frek_ns1_anak" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_ns1_anak" disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_ns1_anak"
												disabled>
											<input type="hidden" class="form-control" id="total_ns1_anak" disabled>
											<input type="hidden" class="form-control" id="tanggal_ns1_anak" disabled>
											<input type="hidden" class="form-control" id="id_staff_ns1_anak" disabled>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">NS1</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inNS1ANAK">
											<p id="notifinNS1ANAK" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<button onclick="insert_anak_ns1()"
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
					<div class="collapse" id="isiHBSAGANAK">
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
											<input type="text" class="form-control" id="inNamaHBSAGANAK" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborHBSAGANAK"
												disabled>
											<input type="hidden" class="form-control" id="Harga_hbsag_anak" disabled>
											<input type="hidden" class="form-control" id="Frek_hbsag_anak" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_hbsag_anak"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_hbsag_anak"
												disabled>
											<input type="hidden" class="form-control" id="total_hbsag_anak" disabled>
											<input type="hidden" class="form-control" id="tanggal_hbsag_anak" disabled>
											<input type="hidden" class="form-control" id="id_staff_hbsag_anak" disabled>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">HBSAG</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inHBSAGANAK">
											<p id="notifinHBSAGANAK" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<button onclick="insert_anak_hbsag()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
							<span class="help-block mb-20"></span>
						</div>
					</div>
					<!-- End HBSAG -->

					<!-- B20 -->
					<div class="collapse" id="isiB20ANAK">
						<!-- /formbody -->
						<div class="form-body mb-30">
							<div class="col-md-12 mb-30">
								<div class="col-md-12 mb-30">
									<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
										TINDAKAN
									</h6>
									<hr width="95%">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group ">
												<label class="control-label col-md-3">NAMA TINDAKAN</label>
												<div class="col-md-9 has-error">
													<input type="text" class="form-control" id="inNamaB20ANAK" disabled>
													<input type="hidden" class="form-control" id="id_tindakan_laborB20ANAK"
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
												<label class="control-label col-md-3 pt-10">B20</label>
												<div class="col-md-9 has-success">
													<input type="text" class="form-control" id="inB20ANAK">
													<p id="notifinB20ANAK" style="font-size:12px; margin-top:5px;"></p>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<button onclick="insert_anak_b20()"
													class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
														class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End B20 -->


					<!-- HBSAB -->
					<div class="collapse" id="isiHBSABANAK">
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
											<input type="text" class="form-control" id="inNamaHBSABANAK" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborHBSABANAK"
												disabled>
											<input type="hidden" class="form-control" id="Harga_hbsab_anak" disabled>
											<input type="hidden" class="form-control" id="Frek_hbsab_anak" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_hbsab_anak"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_hbsab_anak"
												disabled>
											<input type="hidden" class="form-control" id="total_hbsab_anak" disabled>
											<input type="hidden" class="form-control" id="tanggal_hbsab_anak" disabled>
											<input type="hidden" class="form-control" id="id_staff_hbsab_anak" disabled>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">HBSAB</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inHBSABANAK">
											<p id="notifinHBSABANAK" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<button onclick="insert_anak_hbsab()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
							<span class="help-block mb-20"></span>
						</div>
					</div>
					<!-- End HBSAB -->


					<!-- VDRL -->
					<div class="collapse" id="isiVDRLANAK">
						<!-- /formbody -->
						<div class="form-body mb-30">
						<div class="col-md-12 mb-30">
						<div class="col-md-12 mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inNamaVDRLANAK" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborVDRLANAK"
												disabled>
											<input type="hidden" class="form-control" id="Harga_vdrl_anak" disabled>
											<input type="hidden" class="form-control" id="Frek_vdrl_anak" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_vdrl_anak" disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_vdrl_anak"
												disabled>
											<input type="hidden" class="form-control" id="total_vdrl_anak" disabled>
											<input type="hidden" class="form-control" id="tanggal_vdrl_anak" disabled>
											<input type="hidden" class="form-control" id="id_staff_vdrl_anak" disabled>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">VDRL</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inVDRLANAK">
											<p id="notifinVDRLANAK" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<button onclick="insert_anak_vdrl()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
							<span class="help-block mb-20"></span>
						</div>
						</div>
						</div>
					</div>
					<!-- End VDRL -->

					<!-- PLANO -->
					<div class="collapse" id="isiPLANOANAK">
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
											<input type="text" class="form-control" id="inNamaPLANOANAK" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborPLANOANAK"
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
											<input type="text" class="form-control" id="inPLANOANAK">
											<p id="notifinPLANOANAK" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<button onclick="insert_anak_plano()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
							<span class="help-block mb-20"></span>
						</div>
					</div>
					<!-- End PLANO -->

					<!-- DARAH SAMAR -->
					<div class="collapse" id="isiSAMARANAK">
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
											<input type="text" class="form-control" id="inNamaSAMARANAK" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborSAMARANAK"
												disabled>
											<input type="hidden" class="form-control" id="Harga_samar_anak" disabled>
											<input type="hidden" class="form-control" id="Frek_samar_anak" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_samar_anak"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_samar_anak"
												disabled>
											<input type="hidden" class="form-control" id="total_samar_anak" disabled>
											<input type="hidden" class="form-control" id="tanggal_samar_anak" disabled>
											<input type="hidden" class="form-control" id="id_staff_samar_anak" disabled>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mt-20">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">DARAH SAMAR</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inSAMARANAK">
											<p id="notifinSAMARANAK" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<button onclick="insert_anak_samar()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
							<span class="help-block mb-20"></span>
						</div>
					</div>
					<!-- End DARAH SAMAR -->

					<!-- SALMONELLA -->
					<div class="collapse" id="isiSALMONELLAANAK">
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
											<input type="text" class="form-control" id="inNamaSALMONELLAANAK" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborSALMONELLAANAK"
												disabled>
											<input type="hidden" class="form-control" id="Harga_salmonella_anak" disabled>
											<input type="hidden" class="form-control" id="Frek_salmonella_anak" disabled>
											<input type="hidden" class="form-control" id="id_pelayanan_salmonella_anak"
												disabled>
											<input type="hidden" class="form-control" id="id_list_tindakan_salmonella_anak"
												disabled>
											<input type="hidden" class="form-control" id="total_salmonella_anak" disabled>
											<input type="hidden" class="form-control" id="tanggal_salmonella_anak"
												disabled>
											<input type="hidden" class="form-control" id="id_staff_salmonella_anak"
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
											<input type="text" class="form-control" id="inSALMONELLAANAK">
											<p id="notifinSALMONELLAANAK" style="font-size:12px; margin-top:5px;">
											</p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<button onclick="insert_anak_salmonella()"
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
					<div class="collapse" id="isiDENGUENAK">
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
											<input type="text" class="form-control" id="inNamaDENGUEANAK" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborDENGUEANAK"
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
											<input type="text" class="form-control" id="inDENGUEANAK">
											<p id="notifinDENGUEANAK" style="font-size:12px; margin-top:5px;">
											</p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<button onclick="insert_anak_dengue()"
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
					<div class="collapse" id="isiAGDANAK">
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
											<input type="text" class="form-control" id="inNamaAGDANAK" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborAGDANAK"
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
											<input type="text" class="form-control" id="inPHANAK">
											<p id="notifinPHANAK" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">PCO2</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inPCO2ANAK">
											<p id="notifinPCO2ANAK" style="font-size:12px; margin-top:5px;"></p>
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
											<input type="text" class="form-control" id="inPO2ANAK">
											<p id="notifinPO2ANAK" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">HCO3</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inHCO3ANAK">
											<p id="notifinHCO3ANAK" style="font-size:12px; margin-top:5px;"></p>
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
											<input type="text" class="form-control" id="inBEANAK">
											<p id="notifinBEANAK" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">SO2</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inSO2ANAK">
											<p id="notifinSO2ANAK" style="font-size:12px; margin-top:5px;"></p>
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
											<input type="text" class="form-control" id="inSUHUANAK">
											<p id="notifinSUHUANAK" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">OKSIGEN</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inOKSIGENANAK">
											<p id="notifinOKSIGENANAK" style="font-size:12px; margin-top:5px;">
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
											<input type="text" class="form-control" id="inSATURASIANAK">
											<p id="notifinSATURASIANAK" style="font-size:12px; margin-top:5px;">
											</p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_anak_agd()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End AGD -->

					<!-- URINE -->
					<div class="collapse" id="isiURINEANAK">
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
											<input type="text" class="form-control" id="inNamaURINEANAK" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborURINEANAK"
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
											<input type="text" class="form-control" id="inWARNAANAK">
											<p id="notifinWARNAANAK" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">KEJERNIHAN</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inKEJERNIHANANAK">
											<p id="notifinKEJERNIHANANAK" style="font-size:12px; margin-top:5px;">
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
											<input type="text" class="form-control" id="inERITROSITURINEANAK">
											<p id="notifinERITROSITURINEANAK" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">LEUKOSIT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inLEUKOSITURINEANAK">
											<p id="notifinLEUKOSITURINEANAK" style="font-size:12px; margin-top:5px;"></p>
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
											<input type="text" class="form-control" id="inSELANAK">
											<p id="notifinSELANAK" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">SILINDER</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inSILINDERANAK">
											<p id="notifinSILINDERANAK" style="font-size:12px; margin-top:5px;">
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
											<input type="text" class="form-control" id="inKRISTALANAK">
											<p id="notifinKRISTALANAK" style="font-size:12px; margin-top:5px;">
											</p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">BAKTERI</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inBAKTERIANAK">
											<p id="notifinBAKTERIANAK" style="font-size:12px; margin-top:5px;">
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
											<input type="text" class="form-control" id="inJAMURANAK">
											<p id="notifinJAMURANAK" style="font-size:12px; margin-top:5px;"></p>
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
											<input type="text" class="form-control" id="inERITROSITKIMIAANAK">
											<p id="notifinERITROSITKIMIAANAK" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">GLUKOSA</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inGLUKOSAANAK">
											<p id="notifinGLUKOSAANAK" style="font-size:12px; margin-top:5px;">
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
											<input type="text" class="form-control" id="inPROTEINKIMIAANAK">
											<p id="notifinPROTEINKIMIAANAK" style="font-size:12px; margin-top:5px;">
											</p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">BILIRUBIN</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inBILIRUBINANAK">
											<p id="notifinBILIRUBINANAK" style="font-size:12px; margin-top:5px;">
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
											<input type="text" class="form-control" id="inUROBILINOGENANAK">
											<p id="notifinUROBILINOGENANAK" style="font-size:12px; margin-top:5px;">
											</p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">PH</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inPHKIMIAANAK">
											<p id="notifinPHKIMIAANAK" style="font-size:12px; margin-top:5px;">
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
											<input type="text" class="form-control" id="inBERATANAK">
											<p id="notifinBERATANAK" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">KETON</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inKETONANAK">
											<p id="notifinKETONANAK" style="font-size:12px; margin-top:5px;"></p>
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
											<input type="text" class="form-control" id="inNITRITANAK">
											<p id="notifinNITRITANAK" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">LEUKOSIT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inLEUKOSITKIMIAANAK">
											<p id="notifinLEUKOSITKIMIAANAK" style="font-size:12px; margin-top:5px;"></p>
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
										<button onclick="insert_anak_urine()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End URINE -->

					<!-- ANALISA SPERMA -->
					<div class="collapse" id="isiSPERMAANAK">
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
											<input type="text" class="form-control" id="inNamaSPERMAANAK" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborSPERMAANAK"
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
											<input type="text" class="form-control" id="inSPERMAANAK">
											<p id="notifinSPERMAANAK" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6 mt-20">
									<div class="form-group">
										<button onclick="insert_anak_sperma()"
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
					<div class="collapse" id="isiFESESANAK">
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
											<input type="text" class="form-control" id="inNamaFESESANAK" disabled>
											<input type="hidden" class="form-control" id="id_tindakan_laborFESESANAK"
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
											<input type="text" class="form-control" id="inDARAHFESESANAK">
											<p id="notifinDARAHFESESANAK" style="font-size:12px; margin-top:5px;">
											</p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">LENDIR</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inLENDIRANAK">
											<p id="notifinLENDIRANAK" style="font-size:12px; margin-top:5px;"></p>
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
											<input type="text" class="form-control" id="inBAUANAK">
											<p id="notifinBAUANAK" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">KONSISTENSI</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inKONSISTENSIANAK">
											<p id="notifinKONSISTENSIANAK" style="font-size:12px; margin-top:5px;">
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
											<input type="text" class="form-control" id="inWARNAFESESANAK">
											<p id="notifinWARNAFESESANAK" style="font-size:12px; margin-top:5px;">
											</p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">PARASIT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inPARASITANAK">
											<p id="notifinPARASITANAK" style="font-size:12px; margin-top:5px;">
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
											<input type="text" class="form-control" id="inLEUKOSITFESESANAK">
											<p id="notifinLEUKOSITFESESANAK" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3 pt-10">ERITROSIT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inERITROSITFESESANAK">
											<p id="notifinERITROSITFESESANAK" style="font-size:12px; margin-top:5px;"></p>
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
											<input type="text" class="form-control" id="inSELFESESANAK">
											<p id="notifinSELFESESANAK" style="font-size:12px; margin-top:5px;">
											</p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">SILIDER</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inSILIDERANAK">
											<p id="notifinSILIDERANAK" style="font-size:12px; margin-top:5px;">
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
											<input type="text" class="form-control" id="inTELURANAK">
											<p id="notifinTELURANAK" style="font-size:12px; margin-top:5px;"></p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3 pt-10">AMOEBA</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="inAMOEBAANAK">
											<p id="notifinAMOEBAANAK" style="font-size:12px; margin-top:5px;"></p>
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
											<input type="text" class="form-control" id="inBAKTERIFESESANAK">
											<p id="notifinBAKTERIFESESANAK" style="font-size:12px; margin-top:5px;">
											</p>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group pull-left">
										<button onclick="insert_anak_feses()"
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
