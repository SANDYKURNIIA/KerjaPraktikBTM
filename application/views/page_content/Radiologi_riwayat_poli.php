<!-- Row -->
<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">RIWAYAT PASIEN RADIOLOGI</span></h6>
		</div>
		<div class="clearfix"></div>

		<div class="row mt-30">
			<div class="col-md-12">
				<div class="col-md-3 mt-20 pl-5">
					<button class="btn btn-primary btn-anim btn-md" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
				</div>
				<div class="col-md-3">
					<label class="mt-0 txt-dark">Tanggal Mulai : </label>
					<input type="date" autocomplete="off" id="inTglMulai" class="form-control" style="cursor:pointer;">
				</div>
				<div class="col-md-3">
					<label class="mt-0 txt-dark">Tanggal Akhir : </label>
					<input type="date" autocomplete="off" id="inTglAkhir" class="form-control" style="cursor:pointer;">
				</div>
				<div class="col-md-3 mt-20">
					<button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="table-wrap">
				<div class="table-responsive">
					<table id="datable" class="table table-hover display pb-30" width="100%">
						<thead>
							<tr class="bg-success">
								<th>NO</th>
								<th>TINDAKAN</th>
								<th>TANGGAL PELAYANAN</th>
								<th>JAM PELAYANAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLIKLINIK / RUANG</th>
								<th>JENIS KLAIM</th>
								<th>DIAGNOSA</th>
								<th>DOKTER DPJP</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>TINDAKAN</th>
								<th>TANGGAL PELAYANAN</th>
								<th>JAM PELAYANAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLIKLINIK / RUANG</th>
								<th>JENIS KLAIM</th>
								<th>DIAGNOSA</th>
								<th>DOKTER DPJP</th>
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
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
				<div class="row">
					<div class="modal-body mt-5">
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
														<?php echo $row['nama']; ?></option>
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

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<div class="row" style="margin-top:-3em; margin-bottom:15px;">
											<div class="col-md-12 pull-left">

												<label class="control-label col-md-3" style="margin-left:-6em;">KETERANGAN</label>

											</div>
										</div>
										<div class="col-md-12 has-success" style="margin-left:19px;">
											<textarea class="form-control" id="inKet" name="inKet" rows="13" style="max-width:95%; "></textarea>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>
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
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>EXPERTISE RADIOLOGI
						</h6>
						<hr width="95%">
						<form class="form-horizontal" id="formexpert">

							<div class="row">
								<div class="col-md-6">
									<div class="form-group pl-15">
										<label class="control-label">UPLOAD FILE</label>
										<div class="panel-body" style="margin-left:-1em;">
											<div class="mt-5">
												<input type="file" id="file_input2" name="files2[]" multiple />
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
													<option value="<?php echo $row['id_daftar_tindakan'] . "|" . $harga . "|" .  $row['nama']; ?>">
														<?php echo $row['nama']; ?></option>
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

						<div class="row mt-10">
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
						</div>
					</div>
					<!-- End -->

					<div class="col-xs-7 text-center data-wrap-right" id="outRadiologi" style="display: none">
						<br>
						<table class="table table-hover display pb-60">
							<tr>
								<td style="border-top: none !important;"><img src="<?php base_url(); ?>../assets/logo-rsbt.png"></td>
								<td style="border-top: none !important;">
									<h5>RUMAH SAKIT BAKTI TIMAH </h5>
									<p style="font-size:12px; line-height:18px">Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang<br>
												Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia<br>
												Telp. 0717 9100844, Fax. 0715 32165
									</p>
								</td>
							</tr>
						</table>
						<strong>
							<font color="000000" size="5%" style="margin-left:10px"> EXPERTISE RADIOLOGI</font>
							<input type="hidden" class="form-control" disabled id="inNamaPasien">
							<input type="hidden" class="form-control" disabled id="tgl_lahir">
							<input type="hidden" class="form-control" disabled id="no_rm">
							<input type="hidden" class="form-control" disabled id="cara_bayar">
							<input type="hidden" class="form-control" disabled id="ruang">
						</strong>

						<table class="table pb-0" style="margin-top:10px">
							<tbody style="color: black;">
								<tr>
									<td style="font-size:12px; width:23%; padding:10px; border:0px">NO RM</td>
									<td style="font-size:12px; padding:10px; border:0px">: &nbsp;
										<font id="noRm" />
									</td>
									<td style="font-size:12px; padding:10px; border:0px">TANGGAL PEMERIKSAAN</td>
									<td style="font-size:12px; padding:10px; border:0px">: &nbsp;
										<font id="tanggall" />
									</td>
								</tr>

								<tr>
									<td style="font-size:12px; width:23%; padding:10px; border:0px">JENIS KLAIM</td>
									<td style="font-size:12px; padding:10px; border:0px">: &nbsp;
										<font id="caraBayar" />
									</td>
									<td style="font-size:12px; padding:10px; border:0px">NAMA PASIEN</td>
									<td style="font-size:12px; padding:10px; border:0px">: &nbsp;
										<font id="namaPemeriksaan" />
									</td>

								</tr>

								<tr>
									<td style="font-size:12px; width:23%; padding:10px; border:0px">NAMA PEMERIKSAAN </td>
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
<style>
	td {
		color: black;
	}
</style>


<script type="text/javascript">
	function edit_data_tindakan(id_pelayanan, id_history) {
		$.ajax({
			url: "<?= base_url() . 'Apelkes/getdata_radiologiALL' ?>",
			data: {
				pelayanan: id_pelayanan,
				history: id_history
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status_dt == "found") {
					$("#idPelayanan").val(data.id_pelayanan);
					$("#tgl_lahir").val(data.tgl_lahir);
					$("#ruang").val(data.poli);
					$("#no_rm").val(data.no_rm);
					$("#cara_bayar").val(data.cara_bayar);
					$("#inNamaPasien").val(data.nama);
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
	$(document).ready(function() {

		$('#datable').DataTable({
			"retrieve": true,
			"dom": 'Bfrtip',
			"buttons": ['csv', 'excel', 'pdf'],
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
			"ajax": {
				"url": '<?= base_url('apelkes/tampil_Radio_pulang'); ?>',
				"type": 'POST',
				"data": {
					tipe: 'today',

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
	});

	function tampilHariIni() {
		$('#datable').DataTable().destroy();
		$('#datable').DataTable({
			"retrieve": true,
			"dom": 'Bfrtip',
			"buttons": ['csv', 'excel', 'pdf'],
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
			"ajax": '<?php echo base_url('apelkes/tampil_Radio_pulang'); ?>',
			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
		});
	}

	function tampilRangePermit(mulai, akhir) {
		$('#datable').DataTable().destroy();
		mulai = $("#inTglMulai").val();
		akhir = $("#inTglAkhir").val();
		$('#datable').DataTable({
			"retrieve": true,
			"dom": 'Bfrtip',
			"buttons": ['csv', 'excel', 'pdf'],
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
			"ajax": {
				"url": '<?= base_url('apelkes/tampil_Radio_pulang'); ?>',
				"type": 'POST',
				"data": {
					tipe: 'range',
					mulai: mulai,
					akhir: akhir
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
</script>