<!-- Row -->

<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN RADIOLOGI</span>
			</h6>
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
								<!-- <th>OBAT</th>
								<th>KASIR</th> -->
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
								<!-- <th>OBAT</th>
								<th>KASIR</th> -->
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
</div>

<!-- POLI  -->
<div class="modal fade bs-example-modal-lg" id="modal_edit_data" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
				<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN RADIOLOGI
					RAWAT JALAN
				</h5>
			</div>
			<div class="modal-body">
				<div class="row mt-20">
					<div class="col-md-6 mb-20 mt-10">
						<div class="form-group ">
							<label class="control-label col-md-3">NAMA PASIEN</label>
							<div class="col-md-9 has-success">
								<input type="text" class="form-control" disabled id="inNamaPasien">
							</div>
						</div>
					</div>
				</div>

				<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
				<hr width="95%">
				<div class="table-wrap" style="width: 95%; margin: auto ">
					<div class="table-responsive">
						<table class="table table-hover display pb-60" id="tableradiologi">
							<thead>
								<tr class="bg-success">
									<th>NO</th>
									<th>AKSI</th>
									<th>DETAIL</th>
									<th>EDIT</th>
									<th>STATUS</th>
									<th>NAMA TINDAKAN</th>
									<th>JUMLAH TINDAKAN</th>
									<th>BIAYA</th>
									<th>DOKTER</th>
									<th>GAMBAR</th>
									<th>STAFF REQUEST</th>
									<th>STAFF KONFIRMASI</th>
									<th>KETERANGAN</th>
									<th>DIAGNOSA</th>
								</tr>
							</thead>
							<tfoot>
								<tr class="bg-success">
									<th>NO</th>
									<th>AKSI</th>
									<th>DETAIL</th>
									<th>EDIT</th>
									<th>STATUS</th>
									<th>NAMA TINDAKAN</th>
									<th>JUMLAH TINDAKAN</th>
									<th>BIAYA</th>
									<th>DOKTER</th>
									<th>GAMBAR</th>
									<th>STAFF REQUEST</th>
									<th>STAFF KONFIRMASI</th>
									<th>KETERANGAN</th>
									<th>DIAGNOSA</th>
								</tr>
							</tfoot>
							<tbody style="color: black">
							</tbody>
						</table>
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
									<tbody style="color: black">
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>


				<!-- /formbody -->
				<div class="collapse" id="infoTindakan">
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
						</h6>
						<hr width="95%">
						<form class="form-horizontal" id="formdata">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" name="inNama" disabled id="inNama">
										</div>
									</div>
								</div>
								<!--/span-->

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">JUMLAH TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" name="inJumlah" id="inJumlah" disabled>
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
											<input type="text" class="form-control" name="inBiaya" disabled id="inBiaya">
											<input type="hidden" class="form-control" disabled id="idPelayanan" name="idPelayanan">
											<input type="hidden" class="form-control" disabled id="id_tindakan_radiologi" name="id_tindakan_radiologi">
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">DOKTER PEMBACA</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" name="inDPJP" placeholder="PILIH NAMA DOKTER" style="border: 1px solid lightgreen;" tabindex="1" id="inDPJP">
												<option value="-">-</option>
												<?php
												foreach ($dokter as $row) : ?>
													<option value="<?php echo $row['nama']; ?>">
														<?php echo $row['nama']; ?>
													</option>
												<?php endforeach; ?>
											</select><br>
										</div>
									</div>
								</div>

							</div>

							<div class="row">
								<div class="col-md-6">
								</div>

								<div class="col-md-6">
									<div class="form-group pl-15">
										<label class="control-label">UPLOAD FILE</label>
										<div class="panel-body" style="margin-left:-1em;">
											<div class="mt-5">
												<input type="file" id="file_input" name="files[]" multiple />
											</div>
											<div class="pt-20" style="color:#e84a5f;">*File tidak boleh lebih besar
												dari
												5 mb, dan hanya berformat .jpg |.png |.jpeg |</div>
										</div>
									</div>
								</div>
							</div>

							<span class="help-block"></span>


							<span class="help-block"></span>
							<div class="row">
								<div class="col-md-6">
								</div>
								<div class="col-md-6" style="margin-top:-1em;">
									<div class="form-group pull-right" style="margin-right:20px;">
										<button id="btn_upload" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>

						</form>
					</div>

				</div>

				<div class="collapse" id="gambar">
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
						</h6>
						<hr width="95%">
						<form class="form-horizontal" id="formedit">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" disabled id="outNama">
										</div>
									</div>
								</div>
								<!--/span-->

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">JUMLAH TINDAKAN</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" id="outFrek" disabled>
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
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" disabled id="outHarga">
										</div>
										<input type="hidden" class="form-control" disabled id="idPelayanan" name="idPelayanan">
										<input type="hidden" class="form-control" disabled id="id_tindakan_radiologi" name="id_tindakan_radiologi">
										<span class="help-block"></span>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">DOKTER PEMBACA</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" disabled id="outDokter">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
								</div>

								<div class="col-md-6">
									<div class="form-group pl-15">
										<label class="control-label">UPLOAD FILE</label>
										<div class="panel-body" style="margin-left:-1em;">
											<div class="mt-5">
												<input type="file" id="file_input1" name="files1[]" multiple />
											</div>
											<div class="pt-20" style="color:#e84a5f;">*File tidak boleh lebih besar
												dari
												5 mb, dan hanya berformat .jpg |.pdf |.png |.gif |</div>
										</div>
									</div>
								</div>
							</div>

							<span class="help-block"></span>

							<span class="help-block"></span>
							<div class="row">
								<div class="col-md-6">
								</div>
								<div class="col-md-6" style="margin-top:-1em;">
									<div class="form-group pull-right" style="margin-right:20px;">
										<button id="btn_upload" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
					</div>
					</form>
				</div>
				<div class="collapse" id="gambar1">
					<div class="form-body mb-30">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>EXPERTISE
							RADIOLOGI
						</h6>
						<hr width="95%">
						<!-- <form class="form-horizontal" id="formexpert"> -->

						<div class="row">
							<div class="col-md-12">
								<div class="form-group pl-15">
									<strong><label class="control-label">INPUT PASIEN</label></strong>
									<div class="panel-body" style="margin-left:-1em;">


										<div class="col-md-6">
											<div class="form-group ">
												<label class="control-label col-md-3">NAMA</label>
												<div class="col-md-9">
													<input type="text" class="form-control" disabled id="inNamaPasien2">
													<span class="help-block"></span>
												</div>
											</div>
										</div>


										<div class="col-md-6">
											<div class="form-group ">
												<label class="control-label col-md-3">DOKTER PENGIRIM</label>
												<div class="col-md-9">
													<input type="text" class="form-control" disabled id="nama_dokter">
													<span class="help-block"></span>
												</div>
											</div>
										</div>



										<div class="col-md-6">
											<div class="form-group ">
												<label class="control-label col-md-3">TGL.LAHIR/ UMUR</label>
												<div class="col-md-9">
													<input type="text" class="form-control" disabled id="tgl_lahir">
													<span class="help-block"></span>
												</div>
											</div>
										</div>


										<div class="col-md-6">
											<div class="form-group ">
												<label class="control-label col-md-3">NO. RM</label>
												<div class="col-md-9">
													<input type="text" class="form-control" disabled id="no_rm">
													<span class="help-block"></span>
												</div>
											</div>
										</div>


										<div class="col-md-6">
											<div class="form-group ">
												<label class="control-label col-md-3">NAMA POLI</label>
												<div class="col-md-9">
													<input type="text" class="form-control" disabled id="nama_poli">
													<span class="help-block"></span>
												</div>
											</div>
										</div>


										<form id="form_expertise">
											<div class="col-md-6">
												<div class="form-group ">
													<label class="control-label col-md-3">NO SEP</label>
													<div class="col-md-9 has-success">
														<input type="text" class="form-control" placeholder=" NO SEP ... ." id="no_sep">
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</form>


										<form id="text_expertise">
											<!-- Row -->
											<div class="row">
												<div class="col-md-12">
													<div class="panel panel-default card-view">
														<div class="panel-heading">
															<div class="pull-left">

																<h6 class="panel-title txt-dark">YTH. TEMAN SEJAWAT,
																</h6>

																<br>
																<h6 class="panel-title txt-dark">HASIL PEMERIKSAAN
																	RADIOGRAFI BNO :</>
																</h6>


																</br>
															</div>
															<div class="clearfix"></div>
														</div>
														<div class="panel-wrapper collapse in">
															<div class="panel-body">
																<div> <textarea class="summernote x" id="hasil_pemeriksaan"> </textarea></div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- /Row -->



											<!-- Row -->
											<div class="row">
												<div class="col-md-12">
													<div class="panel panel-default card-view">
														<div class="panel-heading">
															<div class="pull-left">

																<h6 class="panel-title txt-dark">KESIMPULAN :</h6>

															</div>
															<div class="clearfix"></div>
														</div>
														<div class="panel-wrapper collapse in">
															<div class="panel-body">
																<div> <textarea class="summernote" id="kesimpulan"> </textarea></div>
															</div>
														</div>
													</div>
												</div>
											</div>
									</div>
									</form>



									<div class="row">
										<div class="col-md-8" style="margin-top:0em;">
											<div class="form-group pull-right" style="margin-right:20px;">
												<button type="button" data-dismiss="modal" onclick="insert_radiologi2()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
												<button onclick="reset_form()" class="btn btn-default btn-anim  btn-sm ml-20 mt-5"><i class="icon-trash"></i><span class="btn-text">CLEAR
														FORM</span></button>
											</div>
										</div>

									</div>

								</div>
							</div>


							<div class="collapse" id="listTindakan">
								<div class="form-wrap">
									<!-- /formbody -->
									<div class="form-body mt-10">
										<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
											TINDAKAN
										</h6>
										<hr width="95%">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group ">
													<label class="control-label col-md-3">TINDAKAN RADIOLOGI</label>
													<div class="col-md-9 has-success" onchange="pilihTindakanRadiologi()">
														<select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inTindakanRadiologi" id="inTindakanRadiologi">
															<option value="-">-</option>
															<?php
															foreach ($tindakan_radiologi as $row) :
																$harga = $row['harga']; ?>
																<option value="<?php echo $row['id_daftar_tindakan'] . "|" . $harga . "|" . $row['nama']; ?>">
																	<?php echo $row['nama']; ?>
																</option>
															<?php endforeach ?>
														</select>
													</div>
												</div>
											</div>
											<!--/span-->

											<div class="col-md-6">
												<div class="form-group ">
													<label class="control-label col-md-3">JUMLAH TINDAKAN</label>
													<div class="col-md-9 has-error">
														<input type="text" class="form-control " id="outJumlahRadiologi" disabled placeholder="jumlah">
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
														<input type="text" class="form-control" disabled id="outBiayaTindakanRadiologi">
														<input type="hidden" class="form-control" disabled id="id_pel_rad">
														<input type="hidden" class="form-control" disabled id="id_tin_rad">
														<span class="help-block"></span>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label col-md-3">TOTAL HARGA</label>
													<div class="col-md-9 has-error">
														<input type="text" class="form-control " disabled id="outTotalRadiologi">
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
										<span class="help-block"></span>

										<div class="row">
											<div class="col-md-6">
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label col-md-3">GAMBAR</label>
													<div class="col-md-9 has-error">
														<input type="text" class="form-control " disabled id="outGambar">
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>

										<div class="row" style="margin-top:10px;">
											<div class="col-md-12">
												<div class="form-group">
													<div class="row" style="margin-bottom:15px;">
														<div class="col-md-12 pull-left">
															<label class="control-label col-md-3">KETERANGAN</label>

														</div>
													</div>
													<div class="col-md-12 has-success">
														<textarea class="form-control" id="outKet" name="outKet" rows="13" style="max-width:100%; "></textarea>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<button onclick="update_radiologi()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN
															PERUBAHAN</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Detail Tindakan -->
							<div class="collapse" id="detailTindakan">
								<div class="form-body mb-30">
									<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>DETAIL
										TINDAKAN
									</h6>
									<hr width="95%">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group ">
												<label class="control-label col-md-3">NAMA TINDAKAN</label>
												<div class="col-md-9 has-success">
													<input type="text" class="form-control" disabled id="outNama">
												</div>
											</div>
										</div>
										<!--/span-->

										<div class="col-md-6">
											<div class="form-group ">
												<label class="control-label col-md-3">JUMLAH TINDAKAN</label>
												<div class="col-md-9 has-success">
													<input type="text" class="form-control" id="outFrek" disabled>
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
												<div class="col-md-9 has-success">
													<input type="text" class="form-control" disabled id="outHarga">
													<span class="help-block"></span>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group ">
												<label class="control-label col-md-3">DOKTER PEMBACA</label>
												<div class="col-md-9 has-success">
													<input type="text" class="form-control" disabled id="outDokter">
													<span class="help-block"></span>
												</div>
											</div>
										</div>
									</div>

									<span class="help-block"></span>

									<!-- <div class="row mt-10">
										<div class="col-md-12">
											<div class="form-group">
												<div class="row" style="margin-bottom:15px; margin-top:10px;">
													<div class="col-md-12">
														<label class="control-label col-md-3">KETERANGAN</label>
													</div>
												</div>
												<div class="col-md-12 has-success">
													<textarea class="form-control" id="outKeterangan" rows="13" style="max-width:100%; " disabled></textarea>
													<span class="help-block"></span>
												</div>
											</div>
										</div>
									</div> -->
								</div>
								<!-- End -->

								<div class="col-xs-7 text-center data-wrap-right" id="outRadiologi" style="display: none">
									<br>
									<table class="table table-hover display pb-60">
										<tr>
											<td style="border-top: none !important;"><img src="<?php base_url(); ?>../assets/logo-rsbt.png"></td>
											<td style="border-top: none !important;">
												<h5>RUMAH SAKIT BAKTI TIMAH </h5>
												<p style="font-size:12px; line-height:18px">Jalan Bukit Baru No. 1,
													Pangkalpinang, Taman Bunga, Kec. Gerunggang<br>
													Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia<br>
													Telp. 0717 9100844, Fax. 0715 32165
												</p>
											</td>
										</tr>
									</table>
									<strong>
										<font color="000000" size="5%" style="margin-left:10px"> EXPERTISE RADIOLOGI
										</font>
										<input type="hidden" class="form-control" disabled id="inNamaPasien">
										<input type="hidden" class="form-control" disabled id="tgl_lahir">
										<input type="hidden" class="form-control" disabled id="no_rm">
										<input type="hidden" class="form-control" disabled id="inDokterPengirim">
										<input type="hidden" class="form-control" disabled id="cara_bayar">
										<input type="hidden" class="form-control" disabled id="ruang">
									</strong>

									<table class="table pb-0" style="margin-top:10px">
										<tbody style="color: black;">
											<tr>
												<td style="font-size:12px; width:23%; padding:10px; border:0px">NO RM
												</td>
												<td style="font-size:12px; padding:10px; border:0px">: &nbsp;
													<font id="noRm" />
												</td>
												<td style="font-size:12px; padding:10px; border:0px">TANGGAL PEMERIKSAAN
												</td>
												<td style="font-size:12px; padding:10px; border:0px">: &nbsp;
													<font id="tanggall" />
												</td>
											</tr>

											<tr>
												<td style="font-size:12px; width:23%; padding:10px; border:0px">JENIS
													KLAIM</td>
												<td style="font-size:12px; padding:10px; border:0px">: &nbsp;
													<font id="caraBayar" />
												</td>
												<td style="font-size:12px; padding:10px; border:0px">NAMA PASIEN</td>
												<td style="font-size:12px; padding:10px; border:0px">: &nbsp;
													<font id="namaPemeriksaan" />
												</td>

											</tr>

											<tr>
												<td style="font-size:12px; width:23%; padding:10px; border:0px">NAMA
													PEMERIKSAAN </td>
												<td style="font-size:12px; padding:10px; border:0px">: &nbsp;
													<font id="namaa" />
												</td>
												<td style="font-size:12px; padding:10px; border:0px">RUANG</td>
												<td style="font-size:12px; padding:10px; border:0px">: &nbsp;
													<font id="ruangg" />
												</td>

											</tr>

											<tr>
												<td style="font-size:12px; width:23%; padding:10px; border:0px"></td>
												<td style="font-size:12px; padding:10px; border:0px"></td>
												<td style="font-size:12px; padding:10px; border:0px">TANGGAL LAHIR</td>
												<td style="font-size:12px; padding:10px; border:0px">: &nbsp;
													<font id="tanggalLahir" />
												</td>
											</tr>
										</tbody>
									</table>

									<div class="row" style="margin-bottom:80px;">
										<div class="col-md-12" style="margin-left:10px;">
											<b>KETERANGAN :</b>
											<font id="keterangann">
										</div>
									</div>

									<table class="table">
										<tr>
											<th style="width: 55%;border-top: none"></th>
											<th style="border-top: none; font-size:12px ">DOKTER PEMBACA HASIL,</th>
										</tr>
										<tr>
											<td style="width: 55%; border-top: none"></td>
											<td style="border-top: none; "><img style="margin-left:40px; margin-top:-2em; margin-bottom:-4em;" src="<?php base_url(); ?>../assets/ttd-rad.png"></td>
										</tr>
										<tr>
											<td style="width: 55%; border-top: none"></td>
											<td style="border-top: none">dr. Yustiana Heriwinarsi., Sp.Rad</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End -->
			</div>
		</div>
	</div>
</div>
<!-- RESEP OBAT  -->
<div class="modal fade bs-example-modal-lg" id="modal_edit_resep" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
				<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> OBAT
				</h5>
			</div>
			<div class="modal-body">
				<div class="form-wrap">
					<!-- /formbody -->
					<div class="collapse" id="collap_nonracikan">
						<div class="form-body">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO OBAT
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">DEPO</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" id="inDepo">
												<option value="APOTIK">APOTIK</option>
												<option value="IGD">IGD</option>
												<option value="RANAP">RANAP</option>
											</select>
											<!-- <span class="help-block"></span> -->
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA OBAT</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" id="inObat" onchange="setHarga()">
												<option value="-">-</option>
												<?php

												foreach ($obat as $row) {

												?>
													<option value="<?php echo $row["id_logistik"] . '|' . $row["harga_cost"] . '|' . $row["margin"] . '|' . $row["kadaluarsa"] . '|' . $row["stok"]; ?>">
														<?php echo $row["nama"]; ?>
													</option>
												<?php
												}
												?>

											</select>
											<span class="help-block"></span>
										</div>

									</div>
								</div>
								<!--/span-->
								<div class="col-md-6 " id="outTglExp">
									<div class="form-group ">
										<label class="control-label col-md-3">EXPIRED DATE</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control " id="inTglExp" disabled="">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">JUMLAH STOK</label>
										<div class="col-md-9 has-error">
											<input type="number" class="form-control " id="outStok" value="0" disabled="">
											<span class="help-block"></span>
										</div>
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">JUMLAH OBAT</label>
										<div class="col-md-9 has-success">
											<input type="number" class="form-control " id="inJumlahObat" placeholder="jumlah" value="1" min="1" oninput="setHarga()">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">DISCOUNT</label>
										<div class="col-md-3 has-success">
											<input type="number" placeholder="Disc" max="35" class="form-control" id="inDisc" value="0" oninput="setHarga()">
										</div>
										<div class="col-md-1">
											%
										</div>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">HARGA HNA+PPN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" disabled="" id="outBiayaTindakanObat">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">HARGA + MARGIN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" disabled="" id="outBiayaMarginObat">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>

							<!-- span -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">TOTAL HARGA</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" disabled="" id="outTotalObat">

										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">KETERANGAN</label>
										<div class="col-md-9 has-success">
											<textarea class="form-control" rows="2" style="resize:none" id="inKeteranganObat">-</textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="row" style="margin-top: 10px;" id="cetakSigna">

								<div class="col-md-6">
									<label class="control-label col-md-3">SIGNA OBAT</label>
									<div class="col-md-9 has-success">
										<select class="form-control filled-input rounded-input select2" id="inSigna">
											<?php
											foreach ($signa as $row) {

											?>
												<option value="<?php echo $row["id_signa"]; ?>">
													<?php echo $row["tindakan"]; ?>
												</option>
											<?php
											}
											?>

										</select>
										<span class="help-block"></span>
									</div>
									<input type="hidden" class="form-control" id="inResObat1">
									<div class="col-md-offset-3 col-md-9">
										<span></span>
									</div>
								</div>
								<div class="col-md-6">
									<label class="control-label col-md-3">CARA PAKAI OBAT</label>
									<div class="col-md-9 has-success">
										<select class="form-control filled-input rounded-input select2" id="inCaraPakai">
											<option value="-">-</option>
											<?php
											foreach ($cara_pemakaian_obat as $row) {

											?>
												<option value="<?php echo $row["id_cara_pemakaian"]; ?>">
													<?php echo $row["cara_pemakaian"]; ?>
												</option>
											<?php
											}
											?>

										</select>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
							<input type="hidden" class="form-control" disabled="" id="cara_bayar">
							<input type="hidden" class="form-control" disabled="" id="tipe_resep">
							<input type="hidden" class="form-control" id="inPelObat">
							<input type="hidden" class="form-control" id="inResObat">
							<div class="form-actions mt-10">
								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<div type="submit" class="btn btn-success mr-10" onclick="insert_Obat()">SIMPAN</div>

												<span></span>
											</div>
										</div>
									</div>
									<div class="col-md-6"> </div>
								</div>
							</div>
							<div class="row ">
								<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
								<hr width="95%">
								<div class="table-wrap" style="width: 100%; margin: auto ">
									<div class="table-responsive">
										<table class="table table-hover display  pb-60" id="tableobat">
											<thead>
												<tr class="bg-success">
													<th>NO</th>
													<th>NAMA OBAT</th>
													<th>EXPIRE DATE</th>
													<th>HARGA OBAT</th>
													<th>JUMLAH OBAT</th>
													<th>DEPO</th>
													<th>TOTAL BIAYA</th>
													<th>KETERANGAN</th>
													<th>NAMA STAFF</th>
													<th>HAPUS</th>
													<!-- <th>SIGNA</th> -->
												</tr>
											</thead>
											<tbody style="color: black">
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<span class="help-block"></span>
							<div align="right">

								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<div id="batalFarmasi" onclick="batalFarmasi()" class="btn btn-danger ">
													BATAL</div>

												<span></span>
											</div>
										</div>
									</div>
									<div class="col-md-6"> </div>
								</div>

							</div>
							<br>
							<br>
							<div class="collapse" id="collap_signa">

							</div>
							</hr>
						</div>

					</div>
					<div class="collapse" id="collap_racikan">
						<div class="form-body">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO RESEP
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label col-md-1">RESEP</label>
										<div class="col-md-11 has-success">
											<textarea class="form-control" id="inResep"></textarea>
										</div>
									</div>
								</div>
							</div>
							<span class="help-block"></span>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_resep_racikan()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
							<hr width="95%">
							<div class="table-wrap" style="width: 100%; margin: auto ">
								<div class="table-responsive">
									<table class="table table-hover display  pb-60" id="tableRacikan">
										<thead>
											<tr class="bg-success">
												<th>NO</th>
												<th>RESEP</th>
												<th>HAPUS</th>
											</tr>
										</thead>
										<tbody style="color: black">
										</tbody>
									</table>
								</div>
							</div>
							<!-- <div align="right"> -->
							<span class="help-block"></span>
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-offset-3 col-md-3">
											<div id="batalFarmasi" onclick="batalFarmasi()" class="btn btn-danger ">
												BATAL</div>
											<span></span>
										</div>
									</div>
								</div>
								<div class="col-md-6"> </div>
							</div>

							<!-- </div> -->
						</div>
					</div>
					<div class="form-body mt-10">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO RESEP
						</h6>
						<hr width="95%">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">JENIS RESEP</label>
									<div class="col-md-9 has-success">
										<select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inTindakan" id="inJenisResep">
											<option value="1">Non Racikan</option>
											<option value="2">Racikan</option>
											<option value="3">OTT</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">NAMA RESEP</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" id="inNamaResep" placeholder="Nama Resep">
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" class="form-control" id="inPelResep">
						<input type="hidden" class="form-control" id="inHisResep">
						<span class="help-block"></span>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<button onclick="insert_resep()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
										<!-- <button onclick="insert_na_obat()" class="btn btn-warning btn-anim  btn-sm ml-20 mt-5" id="na_obat"><i class="icon-rocket"></i><span class="btn-text">N/A</span> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="modal-body mt-30">
				<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
				<hr width="95%">
				<div class="table-wrap" style="width: 100%; margin: auto ">
					<div class="table-responsive">
						<table class="table table-hover display  pb-60" id="tableresep">
							<thead>
								<tr class="bg-success">
									<th>NO</th>
									<th>REQUEST</th>
									<th>TINDAKAN</th>
									<th>HAPUS</th>
									<th>NAMA RESEP</th>
									<th>JENIS RESEP</th>
								</tr>
							</thead>
							<tbody style="color: black">
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<button onclick="cetak_antrian()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">CETAK ANTRIAN APOTIK</span>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<style>
	td {
		color: black;
	}

	.zoom:active {
		position: relative;
		overflow: hidden;
		transition: all .3s ease-in-out;
		-webkit-transform: scale(6.5);
		transform: scale(6.5);
	}
</style>



<script type="text/javascript">
	$(document).ready(function() {
		$('#formdata').submit(function(e) {
			e.preventDefault();
			if ($('#file_input').val() == '') {
				swal({
					title: "Gagal!",
					text: "Gambar belum di pilih",
					type: "warning",
					confirmButtonColor: "#3cb878",
				});
			}
			var a = $('#idPelayanan').val();
			var b = $('#inJumlah').val();
			var c = $('#inBiaya').val();
			var d = $('#id_tindakan_radiologi').val();

			var formData = new FormData(this);
			formData.append('inPelayanan', a);
			formData.append('inJumlah', b);
			formData.append('inBiaya', c);
			formData.append('id_tindakan_radiologi', d);
			$.ajax({
				url: '<?php echo base_url(); ?>Radiologi/post_radiologi_rajal',
				type: "POST",
				data: formData,
				processData: false,
				contentType: false,
				cache: false,
				dataType: 'JSON',
				success: function(data) {
					const success = data.status.success;
					const error = data.status.error;
					if (success > 0) {
						swal({
							title: "good job!",
							type: "success",
							text: "Data berhasil disimpan",
							confirmButtonColor: "#3cb878",
						});
						$("#inNama").val('');
						$("#inJumlah").val('');
						$("#file_input").val(null);
						$("#inBiaya").val('');
						$("#inKet").val('');
						$('#infoTindakan').collapse('hide');
						$('#detailTindakan').collapse('hide');
						$('#listTindakan').collapse('hide');
						$('#tableradiologi').DataTable().ajax.reload();
						$('#outTotalHargaRadiologi').DataTable().ajax.reload();
					} else if (error > 0) {
						swal({
							title: "Gagal!",
							text: "Data tidak terkirim, mohon cek inputan Anda kembali",
							type: "warning",
							confirmButtonColor: "#3cb878",
						});
					}
				}
			});
		})
		$('#formedit').submit(function(e) {
			e.preventDefault();
			if ($('#file_input1').val() == '') {
				swal({
					title: "Gagal!",
					text: "Gambar belum di pilih",
					type: "warning",
					confirmButtonColor: "#3cb878",
				});
			}
			var a = $('#idPelayanan').val();
			var b = $('#inJumlah').val();
			var c = $('#inBiaya').val();
			var d = $('#id_tindakan_radiologi').val();

			var formData = new FormData(this);
			formData.append('inPelayanan', a);
			formData.append('inJumlah', b);
			formData.append('inBiaya', c);
			formData.append('id_tindakan_radiologi', d);
			$.ajax({
				url: '<?php echo base_url(); ?>Radiologi/update_foto',
				type: "POST",
				data: formData,
				processData: false,
				contentType: false,
				cache: false,
				dataType: 'JSON',
				success: function(data) {
					const success = data.status.success;
					const error = data.status.error;
					if (success > 0) {
						swal({
							title: "good job!",
							type: "success",
							text: "Data berhasil disimpan",
							confirmButtonColor: "#3cb878",
						});

						$("#file_input1").val(null);
						$('#infoTindakan').collapse('hide');
						$('#detailTindakan').collapse('hide');
						$('#listTindakan').collapse('hide');
						$('#gambar').collapse('hide');
						$('#tableradiologi').DataTable().ajax.reload();
						$('#outTotalHargaRadiologi').DataTable().ajax.reload();
					} else if (error > 0) {
						swal({
							title: "Gagal!",
							text: "Data tidak terkirim, mohon cek inputan Anda kembali",
							type: "warning",
							confirmButtonColor: "#3cb878",
						});
					}
				}
			});
		})
		// $('#formexpert').submit(function(e) {
		// 	e.preventDefault();
		// 	if ($('#file_input2').val() == '') {
		// 		swal({
		// 			title: "Gagal!",
		// 			text: "Gambar belum di pilih",
		// 			type: "warning",
		// 			confirmButtonColor: "#3cb878",
		// 		});
		// 	}
		// 	var a = $('#idPelayanan').val();
		// 	var b = $('#inJumlah').val();
		// 	var c = $('#inBiaya').val();
		// 	var d = $('#id_tindakan_radiologi').val();

		// 	var formData = new FormData(this);
		// 	formData.append('inPelayanan', a);
		// 	formData.append('inJumlah', b);
		// 	formData.append('inBiaya', c);
		// 	formData.append('id_tindakan_radiologi', d);
		// 	$.ajax({
		// 		url: '<?php echo base_url(); ?>Radiologi/upload_expertise',
		// 		type: "POST",
		// 		data: formData,
		// 		processData: false,
		// 		contentType: false,
		// 		cache: false,
		// 		dataType: 'JSON',
		// 		success: function(data) {
		// 			const success = data.status.success;
		// 			const error = data.status.error;
		// 			if (success > 0) {
		// 				swal({
		// 					title: "good job!",
		// 					type: "success",
		// 					text: "Data berhasil disimpan",
		// 					confirmButtonColor: "#3cb878",
		// 				});

		// 				$("#file_input2").val(null);

		// 				$('#gambar1').collapse('hide');
		// 				$('#tableradiologi').DataTable().ajax.reload();
		// 				$('#outTotalHargaRadiologi').DataTable().ajax.reload();
		// 				$("#modal_edit_data").modal('hide');
		// 				$('#datable').DataTable().ajax.reload();
		// 			} else if (error > 0) {
		// 				swal({
		// 					title: "Gagal!",
		// 					text: "Data tidak terkirim, mohon cek inputan Anda kembali",
		// 					type: "warning",
		// 					confirmButtonColor: "#3cb878",
		// 				});
		// 			}
		// 		}
		// 	});
		// })

		$('#datable').DataTable({
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
					"sLast": "Terakhir"
				},
			},
			"ajax": '<?php echo base_url('Radiologi/tampil_pasien_radiologi'); ?>',
			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
		});
	});

	function pindah_data(id_pelayanan, id_tindakan_radiologi) {
		var postData = {
			id_pelayanan: id_pelayanan,
			id_tindakan_radiologi: id_tindakan_radiologi,
		};
		$.ajax({
			type: 'POST',
			url: '<?= base_url('Radiologi/postPindahData') ?>',
			contentType: 'application/json',
			dataType: 'json',
			data: JSON.stringify(postData),
			success: function(data) {
				if (data.status == "success") {
					$("#idPelayanan").val(data.id_pelayanan);
					$("#inJumlah").val(data.inJumlah);
					$("#data").val(data.data);
					$("#inTindakan").val(data.inTindakan);
					$("#inDPJP").val(data.inDPJP);
					$("inDPJP").val();
					$("#inStaff").val(data.inStaff);
					$("#outKet").val(data.outKet);

					$("inNama").val();
					$("inBiaya").val('');
					$("inJumlah").val('');
					$("file_input").val(null);
					$("inBiaya").val('');
					$("inKet").val('');
					$("infoTindakan").val('hide');
					$("detailTindakan").val('hide');
					$("listTindakan").val('hide');
					$("tableRadiologi").DataTable().ajax.reload();
					$("outTableHargaRadiologi").DataTable().ajax.reload();
					reload_data_radiologi(data.id_pelayanan);
					reload_total_radiologi(data.id_pelayanan);
					swal({
						title: "Berhasil!",
						type: "success",
						text: "Data Berhasil Diinputkan",
						confirmButtonColor: "#3cb878",
					});
				} else {
					swal({
						title: "Gagal!!",
						type: "warning",
						text: "Maaf, Data Tidak Ditemukan",
						confirmButtonColor: "#3cb878",
					});
				}
			},
			error: function(error) {
				console.error(error);
				alert('Kesalahan saat menyimpan data. Silakan coba lagi.');
			}
		});
	}

	function reload_data_radiologi(id_pelayanan) {
		$('#tableradiologi').dataTable().fnClearTable();
		$('#tableradiologi').dataTable().fnDestroy();
		$('#tableradiologi').DataTable({
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
				"url": '<?php echo base_url('Radiologi/tampil_rajal_radiologi'); ?>',
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


	function reload_total_radiologi(id_pelayanan) {
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
				"url": '<?php echo base_url('Radiologi/tampil_total_radiologi'); ?>',
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
	function edit_data_tindakan(id_pelayanan, id_history) {
		$.ajax({
			url: "<?= base_url() . 'Radiologi/getdata_radiologi' ?>",
			data: {
				pelayanan: id_pelayanan,
				history: id_history
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status_dt == "found") {
					$("#idPelayanan").val(data.id_pelayanan);
					$("#id_pel_rad").val(data.id_pelayanan);
					$("#tgl_lahir").val(data.tgl_lahir);
					$("#ruang").val(data.poli);
					$("#no_rm").val(data.no_rm);
					$("#cara_bayar").val(data.cara_bayar);
					$("#inNamaPasien").val(data.nama);
					$("#inNamaPasien2").val(data.nama);
					$("#nama_poli").val(data.nama_poli);
					$("#nama_dokter").val(data.nama_dokter);
					$("#modal_edit_data").modal('show');
					reload_data_radiologi(id_pelayanan);
					reload_total_radiologi(id_pelayanan);
				} else {
					swal({
						title: "Gagal!",
						type: "warning",
						text: "Maaf, Data tidak ditemukan",
						confirmButtonColor: "#3cb878",
					});
				}
			}
		});
	}


	function edit_tindakan_radiologi(id_pelayanan, id_tindakan_radiologi) {
		$.ajax({
			url: "<?= base_url() . 'Radiologi/getdata_formById' ?>",
			data: {
				pelayanan: id_pelayanan,
				tindakan: id_tindakan_radiologi,
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status_dt == "found") {
					$("#inTindakanRadiologi").val(data.nama);
					$('#listTindakan').collapse('toggle');
					$('#detailTindakan').collapse('hide');
					$('#infoTindakan').collapse('hide');
					$("#outTotalRadiologi").val(data.total);
					$("#outJumlahRadiologi").val(data.frek);
					$("#outKet").val(data.keterangan);
					$("#outGambar").val(data.gambar);
					$("#outBiayaTindakanRadiologi").val(data.harga);
					$("#id_tin_rad").val(data.id_tindakan_radiologi);
					$("#id_pel_rad").val(data.id_pelayanan);

				} else {
					swal({
						title: "Gagal!",
						type: "warning",
						text: "Maaf, Data tidak ditemukan",
						confirmButtonColor: "#3cb878",
					});
				}
			}
		});
	}

	function edit_gambar_radiologi(id_pelayanan, id_tindakan_radiologi) {
		$.ajax({
			url: "<?= base_url() . 'Radiologi/getdata_formById' ?>",
			data: {
				pelayanan: id_pelayanan,
				tindakan: id_tindakan_radiologi,
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status_dt == "found") {
					$('#idPelayanan').val(id_pelayanan);
					$('#id_tindakan_radiologi').val(id_tindakan_radiologi);
					$('#gambar').collapse('toggle');
					$('#listTindakan').collapse('hide');
					$('#infoTindakan').collapse('hide');
					$("#outNama").val(data.nama);
					$("#outFrek").val(data.frek);
					$("#outHarga").val(data.harga);
					$("#outDokter").val(data.dokter);
					$("#outKeterangan").val(data.keterangan);
				} else {
					swal({
						title: "Gagal!",
						type: "warning",
						text: "Maaf, Data tidak ditemukan",
						confirmButtonColor: "#3cb878",
					});
				}
			}
		});
	}

	function detail_radiologi(id_pelayanan, id_tindakan_radiologi) {
		$.ajax({
			url: "<?= base_url() . 'Radiologi/getdata_formById' ?>",
			data: {
				pelayanan: id_pelayanan,
				tindakan: id_tindakan_radiologi,
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status_dt == "found") {
					$('#detailTindakan').collapse('toggle');
					$('#listTindakan').collapse('hide');
					$('#infoTindakan').collapse('hide');
					$("#outNama").val(data.nama);
					$("#outFrek").val(data.frek);
					$("#outHarga").val(data.harga);
					$("#outDokter").val(data.dokter);
					$("#outKeterangan").val(data.keterangan);
				} else {
					swal({
						title: "Gagal!",
						type: "warning",
						text: "Maaf, Data tidak ditemukan",
						confirmButtonColor: "#3cb878",
					});
				}
			}
		});
	}

	function pilihTindakanRadiologi() {
		a = $("#inTindakanRadiologi").val();
		splitDiag = a.split("|");

		harga = parseFloat(splitDiag[1]);
		$("#outBiayaTindakanRadiologi").val(convertToRupiah(harga));
		document.getElementById("outJumlahRadiologi").value = "1";
		document.getElementById("outTotalRadiologi").value = convertToRupiah(harga);
	}

	function update_radiologi() {
		a = $("#inTindakanRadiologi").val();
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]);
		frek = parseFloat($("#outJumlahRadiologi").val());
		total = harga * frek;
		id_pel_rad = $('#id_pel_rad').val();
		id_tin_rad = $('#id_tin_rad').val();
		nama = $('#nama').val();

		dataString = 'id_tin_rad=' + id_tin_rad + '&harga=' + harga +
			'&id_pel_rad=' + id_pel_rad + '&id_list_tindakan=' + splitDiag[0] +
			'&frek=' + frek + '&total=' + total;
		$.ajax({
			url: "<?= base_url() . 'Radiologi/update_tindakan_radiologi' ?>",
			method: "POST",
			dataType: 'json',
			data: dataString,
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Perubahan Tindakan ini Telah di Simpan!",
						confirmButtonColor: "#3cb878",
					});
					$("#outTotalRadiologi").val("");
					$("#outJumlahRadiologi").val("");
					$("#outBiayaTindakanRadiologi").val("");
					$('#infoTindakan').collapse('hide');
					$('#detailTindakan').collapse('hide');
					$('#listTindakan').collapse('hide');
					$('#tableradiologi').DataTable().ajax.reload();
					$('#outTotalHargaRadiologi').DataTable().ajax.reload();
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

	function aksi_radiologi(id_pelayanan, id_tindakan_radiologi) {
		$.ajax({
			url: "<?= base_url() . 'Radiologi/getdata_formById' ?>",
			data: {
				pelayanan: id_pelayanan,
				tindakan: id_tindakan_radiologi,
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status_dt == "found") {
					$('#infoTindakan').collapse('toggle');
					$('#detailTindakan').collapse('hide');
					$('#listTindakan').collapse('hide');
					$("#inNama").val(data.nama);
					$("#inBiaya").val(data.total);
					$("#inJumlah").val(data.frek);
					$("#id_tindakan_radiologi").val(data.id_tindakan_radiologi);
				} else {
					swal({
						title: "Gagal!",
						type: "warning",
						text: "Maaf, Data tidak ditemukan",
						confirmButtonColor: "#3cb878",
					});
				}
			}
		});
	}





	function hapus_radiologi(id_tindakan_radiologi, id_pelayanan, nama) {
		swal({
			title: "Apakah kamu yakin?",
			text: "Menghapus data " + nama + "?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Radiologi/hapus_data_radiologi",
					method: "POST",
					dataType: 'json',
					data: {
						id_tindakan_radiologi: id_tindakan_radiologi,
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Data Berhasil dihapus",
								confirmButtonColor: "#3cb878",
							});
							$('#tableradiologi').DataTable().ajax.reload();
							$('#outTotalHargaRadiologi').DataTable().ajax.reload();
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
			});

		});
		return false;
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

	function verifikasi(id_tindakan_radiologi) {
		$.ajax({
			url: '<?php echo base_url(); ?>Radiologi/verifikasi',
			method: "POST",
			data: {
				id: id_tindakan_radiologi
			},
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (data.status == 'success') {
					swal({
						title: "good job!",
						type: "success",
						text: "Data berhasil disimpan",
						confirmButtonColor: "#3cb878",
					});

					$("#modal_edit_data").modal('hide');
					$('#datable').DataTable().ajax.reload();
				} else {
					swal({
						title: "Gagal!",
						text: "Data tidak terkirim, mohon cek inputan Anda kembali",
						type: "warning",
						confirmButtonColor: "#3cb878",
					});
				}
			}
		});
	}







	function print_radiologi(id_pelayanan, id_tindakan_radiologi) {
		$('#gambar1').collapse('toggle');
		$('#id_tindakan_radiologi').val(id_tindakan_radiologi);

	}


	function insert_radiologi() {
		a = $("#inTindakanRadiologi").val();
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]);
		frek = parseFloat($("#inJumlahRadiologi").val());
		total = harga * frek;
		id_pel_rad = $('#id_pel_rad').val();
		id_list_tindakan = $('#id_daftar_tindakan').val();
		nama = $('#nama').val();
		var ID = Math.random().toString(36).substr(2, 16);

		dataString = 'id=' + ID + '&harga=' + harga +
			'&id_pel_rad=' + id_pel_rad + '&id_list_tindakan=' + splitDiag[0] +
			'&frek=' + frek + '&total=' + total + '&jenis_pelayanan=' + "RADIOLOGI";
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_radiologi' ?>",
			method: "POST",
			dataType: 'json',
			data: dataString,
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Tindakan ini Telah di Simpan!",
						confirmButtonColor: "#3cb878",
					});
					$('#outBiayaTindakanRadiologi').val('');
					$('#inJumlahRadiologi').val('');
					$('#outTotalRadiologi').val('');
					$('#tableradiologi').DataTable().ajax.reload();
					$('#outTotalHargaRadiologi').DataTable().ajax.reload();
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


	function insert_radiologi2() {
		id_expertise = $('#id_expertise').val();
		no_rm = $('#no_rm').val();
		nama = $('#nama').val();
		tgl_lahir = $('#tgl_lahir').val();
		dokter_pengirim = $('#nama_dokter').val();
		nama_poli = $('#nama_poli').val();
		// ruang_poliklinik = $('#ruang_poliklinik').val();
		no_sep = $('#no_sep').val();
		hasil_pemeriksaan = $('#hasil_pemeriksaan').val();
		kesimpulan = $('#kesimpulan').val();
		id_tindakan_radiologi = $('#id_tindakan_radiologi').val();


		dataString = 'id_expertise=' + id_expertise +
			'&no_rm=' + no_rm + '&nama=' + nama +
			'&tgl_lahir=' + tgl_lahir +
			'&dokter_pengirim=' + dokter_pengirim +
			'&nama_poli=' + nama_poli +
			// '&ruang_poliklinik=' + ruang_poliklinik +
			'&no_sep=' + no_sep +
			'&hasil_pemeriksaan=' + hasil_pemeriksaan +
			'&kesimpulan=' + kesimpulan + '&id_tindakan_radiologi=' + id_tindakan_radiologi;

		$.ajax({
			url: "<?= base_url() . 'Radiologi/insert_radiologi2' ?>",
			method: "POST",
			dataType: 'json',
			data: dataString,
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Tindakan ini Telah di Simpan!",
						confirmButtonColor: "#3cb878",
					});
					$('#id_expertise').val('');
					$('#no_rm').val('');
					$('#nama').val('');
					$('#tgl_lahir').val('');
					$('#dokter_pengirim').val('');
					$('#nama_poli').val('');
					// $('#ruang_poliklinik').val('');
					$('#no_sep').val('');
					$('#hasil_pemeriksaan').summernote('reset');
					$('#kesimpulan').summernote('reset');

					$('#table_expertise').DataTable().ajax.reload();
					// $('#table_radiologi').DataTable().ajax.reload();
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







	////OBAT
	function reload_data_resep(id_pelayanan, id_history) {
		$('#tableresep').dataTable().fnClearTable();
		$('#tableresep').dataTable().fnDestroy();
		$('#tableresep').DataTable({
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
				"url": '<?php echo base_url('Poli/tampil_resep'); ?>',
				"type": 'POST',
				"data": {
					id_pelayanan: id_pelayanan,
					id_history: id_history
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

	function reload_data_racikan(id_resep) {
		$('#tableRacikan').dataTable().fnClearTable();
		$('#tableRacikan').dataTable().fnDestroy();
		$('#tableRacikan').DataTable({
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
				"url": '<?php echo base_url('Poli/tampil_racikan'); ?>',
				"type": 'POST',
				"data": {
					id_resep: id_resep
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

	function reload_data_obat(id_resep) {
		$('#tableobat').dataTable().fnClearTable();
		$('#tableobat').dataTable().fnDestroy();
		$('#tableobat').DataTable({
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
				"url": '<?php echo base_url('Poli/tampil_obat'); ?>',
				"type": 'POST',
				"data": {
					id_resep: id_resep,
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

	function cetak_antrian() {
		id_pelayanan = $('#inPelResep').val();
		$.ajax({
			url: "<?php echo base_url() ?>Poli/insertAntrian",
			method: "POST",
			data: {
				id_pelayanan: id_pelayanan,
			},

			success: function() {
				window.location.href = '<?php echo base_url() ?>Poli/print_antrian_apotik';

			}
		})

	}

	function edit_obat(idPel, idHis) {
		id_pelayanan = idPel;
		$.ajax({
			url: "<?php echo base_url() ?>Poli/cekTindakanObat",
			method: "POST",
			data: {
				id_pelayanan: id_pelayanan,
			},

			success: function(data) {
				// if (data == 0) {
				// 	$("#na_obat").show();
				// } else {
				// 	$("#na_obat").hide();
				// }
				$('#inPelResep').val(idPel);
				$('#inHisResep').val(idHis);
				$("#modal_edit_resep").modal('show');
				$("#collap_nonracikan").collapse('hide');
				$("#collap_racikan").collapse('hide');
				reload_data_resep(idPel, idHis);

			}
		})

	}

	function pilih_obat(idResep, tipe, cara_bayar) {
		if (tipe == 2) {
			$('#inResObat').val(idResep);
			$("#collap_racikan").collapse('show');
			$("#collap_nonracikan").collapse('hide');
			reload_data_racikan(idResep);
		} else {
			$('#cara_bayar').val(cara_bayar);
			$('#tipe_resep').val(tipe);
			$('#inResObat').val(idResep);
			$("#collap_nonracikan").collapse('show');
			$("#collap_racikan").collapse('hide');
			reload_data_obat(idResep);
		}
	}

	function batalFarmasi() {
		$("#collap_nonracikan").collapse('hide');
		$("#collap_racikan").collapse('hide');
	}

	function insert_resep() {
		jenis_resep = $('#inJenisResep').val();
		nama_resep = $('#inNamaResep').val();
		id_pelayanan = $('#inPelResep').val();
		id_history = $('#inHisResep').val();
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_resep' ?>",
			method: "POST",
			dataType: 'json',
			data: {
				jenis_resep: jenis_resep,
				nama_resep: nama_resep,
				id_pelayanan: id_pelayanan,
				id_history: id_history
			},
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Tindakan ini Telah di Simpan!",
						confirmButtonColor: "#3cb878",
					});
					$('#inJenisResep').val(1).change();
					$('#inNamaResep').val('');
					$("#collap_nonracikan").collapse('hide');
					$("#collap_racikan").collapse('hide');
					$('#tableresep').DataTable().ajax.reload();
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

	function insert_resep_racikan() {
		resep = $('#inResep').val();
		id_resep = $('#inResObat').val();
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_resep_racikan' ?>",
			method: "POST",
			dataType: 'json',
			data: {
				resep: resep,
				id_resep: id_resep,
			},
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Tindakan ini Telah di Simpan!",
						confirmButtonColor: "#3cb878",
					});

					$('#inResep').val('');
					$("#collap_nonracikan").collapse('hide');
					$("#collap_racikan").collapse('show');
					$('#tableRacikan').DataTable().ajax.reload();
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

	function insert_Obat() {
		id_pelayanan = $('#inPelResep').val();
		id_history = $('#inHisResep').val();
		id_resep = $('#inResObat').val();
		caraBayar = $('#cara_bayar').val();
		tipe = $('#tipe_resep').val();
		a = $("#inObat").val();
		depo = $("#inDepo").val();
		splitDiag = a.split("|");
		margin = parseFloat(splitDiag[2]);
		ket = $("#inKeteranganObat").val();
		id_list_tindakan = splitDiag[0];
		harga = parseFloat(splitDiag[1]);
		// hargaMargin = parseFloat(splitDiag[1]) * parseFloat(splitDiag[2]);

		frek = parseFloat($("#inJumlahObat").val());
		disc = parseFloat($("#inDisc").val());
		expire = (splitDiag[3]);
		jumlahKurang = frek * -1;

		if ((caraBayar == "WA14BJ84" && tipe == "1") || (caraBayar == "WA14BJ84" && tipe == "2")) {
			total = harga * frek;
		} else if (caraBayar == "WA14BJ84" && tipe == "3") {
			total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
		} else {
			total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
		}
		signa = $('#inSigna').val();
		cara_pakai = $('#inCaraPakai').val();
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_obat' ?>",
			method: "POST",
			dataType: 'json',
			cache: false,
			data: {
				id_pelayanan: id_pelayanan,
				id_history: id_history,
				id_resep: id_resep,
				depo: depo,
				margin: margin,
				ket: ket,
				harga: harga,
				frek: frek,
				disc: disc,
				expire: expire,
				jumlahKurang: jumlahKurang,
				total: total,
				id_list_tindakan: id_list_tindakan,
				signa: signa,
				cara_pakai: cara_pakai
			},
			success: function(data) {
				if (data.status == "success") {
					// swal({
					// 	title: "good job!",
					// 	type: "success",
					// 	text: "Tindakan ini Telah di Simpan!",
					// 	confirmButtonColor: "#3cb878",
					// });
					$.toast({
						heading: 'Success!',
						text: 'Tindakan ini telah ditambah',
						showHideTransition: 'fade',
						icon: 'success'
					})

					$("#collap_nonracikan").collapse('show');

					$("#collap_racikan").collapse('hide');
					$('#tableobat').DataTable().ajax.reload();
					$('#inDepo').val('APOTIK').change();
					$('#inObat').val('-').change();
					$('#inTglExp').empty().trigger('change');
					$("#inKeteranganObat").removeData();
					$("#inJumlahObat").val('1');
					$("#inDisc").val(0);
					$("#outBiayaTindakanObat").val('');
					$("#outBiayaMarginObat").val('');
					$("#outStok").val('0');
					$("#outTotalObat").val('');
					$('#inSigna').val('-').change();
					$('#inCaraPakai').val('-').change();
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



	function hapus_resep(id_resep, nama) {
		swal({
			title: "Apakah kamu yakin?",
			text: "Menghapus data " + nama + "?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Poli/hapus_resep",
					method: "POST",
					dataType: 'json',
					data: {
						id_resep: id_resep,
					},
					success: function(data) {
						if (data.status == "success") {
							$('#tableresep').DataTable().ajax.reload();
							swal({
								title: "good job!",
								type: "success",
								text: "Data Berhasil dihapus",
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
			});
		});
		return false;
	}

	function hapus_obat(id, nama, depo) {
		swal({
			title: "Apakah kamu yakin?",
			text: "Menghapus data " + nama + "?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Poli/hapus_obat",
					method: "POST",
					dataType: 'json',
					data: {
						id: id,
						depo: depo
					},
					success: function(data) {
						if (data.status == "success") {
							$('#tableobat').DataTable().ajax.reload();
							swal({
								title: "good job!",
								type: "success",
								text: "Data Berhasil dihapus",
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
			});
		});
		return false;
	}

	function hapus_racikan(id_racikan) {
		swal({
			title: "Apakah kamu yakin?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Poli/hapus_racikan",
					method: "POST",
					dataType: 'json',
					data: {
						id_racikan: id_racikan
					},
					success: function(data) {
						if (data.status == "success") {
							$('#tableRacikan').DataTable().ajax.reload();
							swal({
								title: "good job!",
								type: "success",
								text: "Data Berhasil dihapus",
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
			});
		});
		return false;
	}

	function request(id_resep, jenis_resep) {
		$.ajax({
			url: "<?= base_url() . 'Poli/request_resep' ?>",
			method: "POST",
			dataType: 'json',
			data: {
				id_resep: id_resep,
				jenis_resep: jenis_resep
			},
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Tindakan ini Telah di Simpan!",
						confirmButtonColor: "#3cb878",
					});
					$('#tableresep').DataTable().ajax.reload();
				} else if (data.status == "error") {
					swal({
						title: "Tindakan Belum Diisi",
						type: "warning",
						text: "Silahkan isi tindakan terlebih dahulu",
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
	}

	function cetakSigna1() {
		// id_resep = $('#inResObat').val();
		id_tindakan = $('#inResObat1').val();
		signa = $('#inSigna').val();
		cara_pakai = $('#inCaraPakai').val();
		$.ajax({
			url: "<?php echo base_url() ?>Apotik/cetak_signa",
			method: "POST",
			dataType: 'json',
			data: {
				signa: signa,
				cara_pakai: cara_pakai,
				id_tindakan: id_tindakan
			},
			success: function(data) {
				if (data.status == "success") {
					window.location.href = '<?php echo base_url() ?>Apotik/print_signa/' + id_tindakan;

				} else {
					swal({
						title: "Gagal!",
						text: data.error,
						type: "warning",
						confirmButtonColor: "#3cb878",
					});
				}
			}

		});
		return false;
	}

	function cetakSigna(id, id_resep) {
		id_tindakan = id;
		window.location.href = '<?php echo base_url() ?>Apotik/print_signa/' + id_tindakan;

	}
	$(document).ready(function() {
		$('#inDepo').change(function() {

			var depo = $('#inDepo').val();
			if (depo != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>Poli/getNamaObat",
					method: "POST",
					data: {
						depo: depo
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option value="">-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + data[i].margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inObat').html(html);
					}
				});
			} else {
				$('#inObat').html('<option value="">-</option>');
			}
		});
		$('#inObat').change(function() {
			obat = $('#inObat').val();
			splitDiag = obat.split("|");
			tgl = splitDiag[3];
			$('#inTglExp').val(tgl);
			stok = splitDiag[4];
			$("#outStok").val(stok);
		});
	});

	function setHarga() {

		caraBayar = $('#cara_bayar').val();
		tipe = $('#tipe_resep').val();
		obat = $('#inObat').val();
		splitDiag = obat.split("|");
		stok = (splitDiag[4]);
		disc = parseFloat($("#inDisc").val());
		if (disc > 35) {
			disc = 35;
		}
		if (caraBayar == "WA14BJ84") {
			disc = 0;
		}

		$("#inDisc").val(disc);


		$("#outStok").val(stok);


		harga = parseFloat(splitDiag[1]);
		hargaMargin = harga * parseFloat(splitDiag[2]);
		$("#outBiayaTindakanObat").val(convertToRupiah(harga.toFixed(0)));
		$("#outBiayaMarginObat").val(convertToRupiah(hargaMargin.toFixed(0)));

		frek = parseFloat($("#inJumlahObat").val());
		if (frek > stok) {
			$("#inJumlahObat").val(stok);
		} else if (frek < 0) {
			$("#inJumlahObat").val(1);
		}
		frek = parseFloat($("#inJumlahObat").val());

		// 		  if (document.getElementById('inRadioCost').checked ) {
		if ((caraBayar == "WA14BJ84" && tipe == "1") || (caraBayar == "WA14BJ84" && tipe == "2")) {
			total = harga * frek;
		} else if (caraBayar == "WA14BJ84" && tipe == "3") {
			total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
		} else {
			total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
		}
		$("#outTotalObat").val(convertToRupiah(total.toFixed(0)));

	}

	function edit_kasir(id_pelayanan, id_history) {
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_req_kasir' ?>",
			data: {
				id_pelayanan: id_pelayanan,
				id_history: id_history
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Data berhasil ditambahkan",
						confirmButtonColor: "#3cb878",
					});

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



	// RESET FORM

	function reset_form() {
		document.getElementById("form_expertise").reset();
	}


	// RESET TEXT AREA
</script>