<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">IGD</span></h6>
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
								<th>OBAT</th>
								<th>RADIOLOGI</th>
								<th>LABOR</th>
								<th>ERM</th>
								<th>KASIR</th>
								<th>TANGGAL PELAYANAN</th>
								<th>JAM PELAYANAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>RAWAT INAP</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>CARA BAYAR</th>
								<th>DIAGNOSA</th>
								<th>DPJP</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>TINDAKAN</th>
								<th>OBAT</th>
								<th>RADIOLOGI</th>
								<th>LABOR</th>
								<th>ERM</th>
								<th>KASIR</th>
								<th>TANGGAL PELAYANAN</th>
								<th>JAM PELAYANAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>RAWAT INAP</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>CARA BAYAR</th>
								<th>DIAGNOSA</th>
								<th>DPJP</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade bs-example-modal-lg" id="modal_edit_data" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">Ã—</button>
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN
					</h5>
				</div>
				<div class="modal-body">
					<div class="form-wrap">
						<!-- /formbody -->
						<div class="form-body mt-10">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>TINDAKAN</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-success" onchange="pilihTindakan()">
											<select class=" form-control filled-input select2" placeholder="PILIH CARA BAYAR" style="border: 1px solid lightgreen;" tabindex="1" id="inTindakan" name="inTindakan">
												<option value="-">-</option>
												<?php
												foreach ($data_tindakan as $row) :
													$harga = $row['harga_sarana'] + $row['harga_jasa'];
												?>
													<option value="<?php echo $row['id_tindakan_igd'] . "|" . $harga . "|" .  $row['nama_bayar']; ?>">
														<?php echo $row['nama_bayar']; ?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">JUMLAH TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="number" class="form-control " id="inJumlah" min="1" value="1" placeholder="jumlah" oninput="hargaTotal()">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>
							<span class="help-block"></span>
							<!-- /Row -->

							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">Biaya Tindakan</label>
										<div class="col-md-9 has-error">

											<input type="text" class="form-control t" disabled="" id="outBiayaTindakan">
											<input type="hidden" class="form-control " disabled="" id="idPelayanan">
											<input type="hidden" class="form-control " disabled="" id="idHis">
											<span class="help-block"></span>
										</div>
									</div>
								</div>


								<div class="col-md-6 ">
									<div class="form-group">
										<label class="control-label col-md-3">Total Harga</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control " disabled="" id="outTotal">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>

							<span class="help-block"></span>
							<!-- /Row -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">NAMA DOKTER (DPJP)</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="PILIH NAMA DOKTER" style="border: 1px solid lightgreen;" tabindex="1" id="inDPJP" name="namaDPJP">
												<?php
												foreach ($data_dokter as $row) :
												?>
													<option value="<?php echo $row->id_dokter; ?>">
														<?php echo $row->nama; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_tindakan()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
											<!-- <button onclick="insert_na_tindakan()" class="btn btn-warning btn-anim  btn-sm ml-20 mt-5" id="na_tindakan"><i class="icon-rocket"></i><span class="btn-text">N/A</span> -->
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>


				<div class="modal-body mt-30">
					<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
					<hr width="95%">
					<div class="table-wrap" style="width: 95%; margin: auto ">
						<div class="table-responsive">
							<table class="table table-hover display  pb-60" id="tabletindakan">
								<thead>
									<tr class="bg-success">
										<th>ID TINDAKAN</th>
										<th>NAMA TINDAKAN</th>
										<th>BIAYA TINDAKAN </th>
										<th>JUMLAH TINDAKAN</th>
										<th>TOTAL BIAYA</th>
										<th>DOKTER</th>
										<th>NAMA STAFF</th>
										<th>HAPUS</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-8">
					</div>
					<div class="col-md-4 pull-right mt-20">

						<div class="table-wrap" style="width: 85%; margin-bottom:40px;">
							<!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->
							<div class="table-responsive ">
								<table class="table table-hover display " id="outTotalHarga">
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
		</div>
	</div>




	<!-- Edit Radiologi -->
	<div class="modal fade bs-example-modal-lg" id="modal_radiologi" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">Ã—</button>
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST RADIOLOGI
					</h5>
				</div>
				<div class="modal-body">
					<div class="form-wrap">
						<!-- /formbody -->
						<div class="form-body mt-10">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
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
											<input type="text" class="form-control " id="inJumlahRadiologi" disabled placeholder="jumlah" oninput="hargaTotalRadiologi()">
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
											<input type="hidden" class="form-control" disabled id="id_his_rad">
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
								<div class="col-md-8">
									<div class="form-group pull-right">
										<button onclick="insert_radiologi()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
											<!-- <button onclick="insert_na_radio()" class="btn btn-warning btn-anim  btn-sm ml-20 mt-5" id="na_radio"><i class="icon-rocket"></i><span class="btn-text">N/A</span> -->
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="modal-body mt-10">
					<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
					<hr width="95%">
					<div class="table-wrap" style="width: 100%; margin: auto ">
						<div class="table-responsive">
							<table class="table table-hover display  pb-60" id="tableradiologi">
								<thead>
									<tr class="bg-success">
										<th>NO</th>
										<th>EXPERTISE</th>
										<th>NAMA</th>
										<th>TANGGAL TINDAKAN</th>
										<th>BIAYA TINDAKAN </th>
										<th>JUMLAH TINDAKAN</th>
										<th>STAFF REQUEST</th>
										<th>STAFF KONFIRMASI</th>
										<th>GAMBAR</th>
										<th>KETERANGAN</th>
										<th>STATUS</th>
										<th>HAPUS</th>
									</tr>
								</thead>
								<tfoot>
									<tr class="bg-success">
										<th>NO</th>
										<th>EXPERTISE</th>
										<th>NAMA</th>
										<th>TANGGAL TINDAKAN</th>
										<th>BIAYA TINDAKAN </th>
										<th>JUMLAH TINDAKAN</th>
										<th>STAFF REQUEST</th>
										<th>STAFF KONFIRMASI</th>
										<th>GAMBAR</th>
										<th>KETERANGAN</th>
										<th>STATUS</th>
										<th>HAPUS</th>
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
							<!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->
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
		</div>
	</div>
	<!-- End -->


	<!-- Edit Labor  -->
	<div class="modal fade bs-example-modal-lg" id="modal_labor" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">Ã—</button>
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST LABOR
					</h5>
				</div>
				<div class="modal-body">
					<div class="form-wrap">
						<!-- /formbody -->
						<div class="form-body mt-10 collapse" id="collapse_tindakan_labor">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">TINDAKAN LABOR</label>
										<div class="col-md-9 has-success" onchange="pilihTindakanLabor()">
											<select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inTindakanLabor" id="inTindakanLabor">
												<option value="-">-</option>
												<?php
												foreach ($tindakan_labor as $row) :
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
											<input type="text" class="form-control " id="inJumlahLabor" disabled placeholder="jumlah" oninput="hargaTotalLabor()">
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
											<input type="text" class="form-control" disabled id="outBiayaTindakanLabor">
											<input type="hidden" class="form-control" disabled id="id_pel_lab">
											<input type="hidden" class="form-control" disabled id="id_his_lab">
											<input type="hidden" class="form-control" disabled id="id_form_lab">
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">TOTAL HARGA</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control " disabled id="outTotalLabor">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>
							<span class="help-block"></span>

							<div class="row">
								<div class="col-md-8">
									<div class="form-group pull-right">
										<button onclick="insert_labor()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
											<!-- <button onclick="insert_na_lab()" class="btn btn-warning btn-anim  btn-sm ml-20 mt-5" id="na_lab"><i class="icon-rocket"></i><span class="btn-text">N/A</span> -->
									</div>
								</div>
							</div>
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
							<hr width="95%">
							<div class="table-wrap" style="width: 100%; margin: auto ">
								<div class="table-responsive">
									<table class="table table-hover display  pb-60" id="tablelabor">
										<thead>
											<tr class="bg-success">
												<th>NO</th>
												<!-- <th>HAPUS</th> -->
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
												<!-- <th>HAPUS</th> -->
												<th>STATUS</th>
												<th>NAMA TINDAKAN</th>
												<th>TANGGAL TINDAKAN</th>
												<th>BIAYA TINDAKAN </th>
												<th>JUMLAH TINDAKAN</th>
												<th>STAFF REQUEST</th>
												<th>STAFF KONFIRMASI</th>
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
										<!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->
										<div class="table-responsive ">
											<table class="table table-hover display " id="outTotalHargaLabor">
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
						<div class="form-body mt-10 collapse" id="collapse_form_labor">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO RESEP
							</h6>
							<hr width="95%">
							<form id="formLabor">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">TANGGAL</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="labTgl" disabled value="<?php date_default_timezone_set('Asia/Jakarta');
																													echo date("Y-m-d H:i:s"); ?>">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">DIAGNOSA</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="labDiagnosa" placeholder="Diagnosa">
												<span class="help-block"></span>
												<input type="hidden" class="form-control" disabled id="inPelLab">
												<input type="hidden" class="form-control" disabled id="inHisLab">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">RINGKASAN</label>
											<div class="col-md-9 has-success">
												<textarea class="form-control" id="labRingkasan" placeholder="Ringkasan" cols="30" rows="5"></textarea>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">KETERANGAN</label>
											<div class="col-md-9 has-success">
												<textarea class="form-control" id="labKet" placeholder="Keterangan" cols="30" rows="5"></textarea>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
								</div>
							</form>
							<!-- <input type="hidden" class="form-control" id="inPelLab">
							<input type="hidden" class="form-control" id="inHisResep"> -->
							<span class="help-block"></span>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<button onclick="insert_form_labor()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
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
					<button class="btn btn-primary btn-anim ml-20 mb-20" onclick="show_form()"><i class="icon-plus"></i><span class="btn-text">TAMBAH FORM</span></button>
					<div class="table-wrap" style="width: 100%; margin: auto ">
						<div class="table-responsive">
							<table class="table table-hover display  pb-60" id="tableFormLabor">
								<thead>
									<tr class="bg-success">
										<th>NO</th>
										<th>REQUEST</th>
										<th>TINDAKAN</th>
										<th>HAPUS</th>
										<th>TANGGAL</th>
										<th>JAM</th>
										<th>DIAGNOSA</th>
										<th>RINGKASAN</th>
										<th>KETERANGAN</th>

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
	</div>
</div>
<!-- End -->
<!-- Resep -->
<div class="modal fade bs-example-modal-lg" id="modal_edit_resep" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">Ã—</button>
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
							<form id="formObat">
								<div id="tambah_obat">
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
													<span class="help-block"></span>
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
															<option value="<?php echo $row["id_logistik"] . '|' . $row["harga_cost"] . '|' . $row["margin"] . '|' . $row["kadaluarsa"] . '|' . $row["stok"]; ?>"><?php echo $row["nama"]; ?></option>
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
											<div class="col-md-9 has-success" id="the-basics">

												<input class="typeahead form-control filled-input" type="text" placeholder="Signa Obat" id="inSigna" name="inSigna" style="width: 284.17px;">

											</div>
											<input type="hidden" class="form-control" id="inResObat1">
											<div class="col-md-offset-3 col-md-9">
												<span></span>
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">CARA PAKAI OBAT</label>
											<div class="col-md-9 has-success" id="the-basics1">

												<input class="typeahead form-control filled-input" type="text" placeholder="Cara Pakai Obat" id="inCaraPakai" name="inCaraPakai" style="width: 284.17px;">

											</div>
											
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
							</form>
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
												<div id="batalFarmasi" onclick="batalFarmasi()" class="btn btn-danger ">BATAL</div>

												<span></span>
											</div>
										</div>
									</div>
									<div class="col-md-6"> </div>
								</div>

							</div>
							<br><br>
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
											<div id="batalFarmasi" onclick="batalFarmasi()" class="btn btn-danger ">BATAL</div>
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
</style>

<script type="text/javascript">
	function reload_data_total(id_pelayanan) {
		$('#outTotalHarga').dataTable().fnClearTable();
		$('#outTotalHarga').dataTable().fnDestroy();
		$('#outTotalHarga').DataTable({
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
				"sSearch": "Cari Tindakan:",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext": "Selanjutnya",
					"sLast": "Terakhir",
				}
			},
			"ajax": {
				"url": '<?php echo base_url('IGD/tampil_list_total'); ?>',
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

	function reload_data_tindakan(id_pelayanan) {
		$('#tabletindakan').dataTable().fnClearTable();
		$('#tabletindakan').dataTable().fnDestroy();
		$('#tabletindakan').DataTable({
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
				"sSearch": "Cari Tindakan:",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext": "Selanjutnya",
					"sLast": "Terakhir",
				}
			},
			"ajax": {
				"url": '<?php echo base_url('IGD/tampil_list_tindakan'); ?>',
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

	function edit_data_igd(id_pelayanan, id_history) {
		$.ajax({
			url: "<?= base_url() . 'IGD/getdata_igd' ?>",
			data: {
				pelayanan: id_pelayanan,
				history: id_history
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status_dt == "found") {
					// if (data.countTin == 0) {
					// 	$("#na_tindakan").show();
					// } else {
					// 	$("#na_tindakan").hide();
					// }
					//disini set datanya ke modal
					$("#tipe_masuk").val(data.data['jenis_pelayanan']);
					$("#inTanggalKunjugan").val(data.data['tgl_masuk']);
					$("#idPelayanan").val(data.data['id_pelayanan']);
					$("#idHis").val(id_history);
					$("#inNoSEP").val(data.data['no_sep']);
					$("#inDiagnosa").val(data.data['diagnosa']);
					$("#inDPJP").val(data.data['dpjp']).change();
					$("#NamaPasien").val(data.data['nama']).change();
					$("#inAsalPasien").val(data.data['id_asal_pasien']).change();
					$("#inCaraBayar").val(data.data['id_cara_bayar']).change();
					$("#inNaPol").val(data.data['id_kamar']).change();
					$("#modal_edit_data").modal('show');
					reload_data_tindakan(id_pelayanan);
					reload_data_total(id_pelayanan);
				} else {
					alert("data tidak ditemukan");
				}
			}
		});
	}

	function hapus_data_tindakan(id_tindakan_igd, id_pelayanan) { //utk hapus diagnosa pasien
		swal({
			title: "Warning?",
			text: "Apakah kamu yakin menghapus data ID Tindakan :" + id_tindakan_igd + "?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>IGD/hapus_data_tindakan",
					method: "POST",
					dataType: 'json',
					data: {
						id_tindakan_igd: id_tindakan_igd,
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Id diagnosa" + id_tindakan_igd + " Berhasil dihapus",
								confirmButtonColor: "#3cb878",
							});
							reload_data_tindakan(id_pelayanan);
							$('#outTotalHarga').DataTable().ajax.reload();
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
	function insert_tindakan() {
		a = $("#inTindakan").val();
		dokter = $("#inDPJP").val();
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]);
		frek = parseFloat($("#inJumlah").val());
		total = harga * frek;
		var ID = Math.random().toString(36).substr(2, 16);
		idPelayanan = $('#idPelayanan').val();
		id_list_tindakan = $('#id_tindakan_igd').val();
		id_history = $("#idHis").val();

		dataString = 'id_tindakan_igd=' + ID + '&harga=' + harga +
			'&idPelayanan=' + idPelayanan + '&id_list_tindakan=' + splitDiag[0] +
			'&frek=' + frek + '&total=' + total
			//copy ini 3
			+
			'&dokter=' + dokter + '&id_history=' + id_history;
		$.ajax({
			url: "<?= base_url() . 'IGD/insert_tindakan' ?>",
			method: "POST",
			dataType: 'json',
			data: dataString,
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Data Tindakan berhasil ditambahkan!",
						confirmButtonColor: "#3cb878",
					});
					reload_data_tindakan(idPelayanan);
					$('#outTotalHarga').DataTable().ajax.reload();
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
	$(document).ready(function() {
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
				"sSearch": "Cari:",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext": "Selanjutnya",
					"sLast": "Terakhir"
				},

			},
			"ajax": '<?php echo base_url('IGD/tampil_data_igd'); ?>',
			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],

		});

	});
</script>

<script type="text/javascript">
	function pilihTindakan() {
		a = $("#inTindakan").val();
		splitDiag = a.split("|");

		harga = parseFloat(splitDiag[1]);
		$("#outBiayaTindakan").val(convertToRupiah(harga));
		document.getElementById("inJumlah").value = "1";
		document.getElementById("outTotal").value = convertToRupiah(harga);
	}

	function convertToRupiah(angka) {
		var rupiah = '';
		var angkarev = angka.toString().split('').reverse().join('');
		for (var i = 0; i < angkarev.length; i++)
			if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
		return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
	}

	function hargaTotal() {
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]);
		frek = parseFloat($("#inJumlah").val());
		total = harga * frek;


		$("#outTotal").val(convertToRupiah(total));

	}
	// Radiologi
	function insert_radiologi() {
		a = $("#inTindakanRadiologi").val();
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]);
		frek = parseFloat($("#inJumlahRadiologi").val());
		total = harga * frek;
		id_pel_rad = $('#id_pel_rad').val();
		id_his_rad = $('#id_his_rad').val();
		id_list_tindakan = $('#id_daftar_tindakan').val();
		nama = $('#nama').val();
		var ID = Math.random().toString(36).substr(2, 16);

		dataString = 'id=' + ID + '&harga=' + harga +
			'&id_pel_rad=' + id_pel_rad + '&id_his_rad=' + id_his_rad + '&id_list_tindakan=' + splitDiag[0] +
			'&frek=' + frek + '&total=' + total;
		$.ajax({
			url: "<?= base_url() . 'IGD/insert_radiologi' ?>",
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

	function pilihTindakanRadiologi() {
		a = $("#inTindakanRadiologi").val();
		splitDiag = a.split("|");

		harga = parseFloat(splitDiag[1]);
		$("#outBiayaTindakanRadiologi").val(convertToRupiah(harga));
		document.getElementById("inJumlahRadiologi").value = "1";
		document.getElementById("outTotalRadiologi").value = convertToRupiah(harga);
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
				"url": '<?php echo base_url('IGD/tampil_total_radiologi'); ?>',
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

	function reload_data_radiologi(id_pel_rad) {
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
				"url": '<?php echo base_url('IGD/tampil_list_radiologi'); ?>',
				"type": 'POST',
				"data": {
					id_pelayanan: id_pel_rad
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

	function edit_radiologi(id_pelayanan, id_history) {
		$.ajax({
			url: "<?= base_url() . 'IGD/get_radiologi' ?>",
			data: {
				pelayanan: id_pelayanan,
				history: id_history
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status_dt == "found") {
					// if (data.countTin == 0) {
					// 	$("#na_radio").show();
					// } else {
					// 	$("#na_radio").hide();
					// }
					$("#id_pel_rad").val(data.data['id_pelayanan']);
					$("#id_his_rad").val(id_history);
					$("#modal_radiologi").modal('show');
					reload_data_radiologi(id_pelayanan);
					reload_total_radiologi(id_pelayanan);
				} else {
					alert("data tidak ditemukan");
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

	function hargaTotalRadiologi() {
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]);
		frek = parseFloat($("#inJumlahRadiologi").val());
		total = harga * frek;

		$("#outTotalRadiologi").val(convertToRupiah(total));
	}

	// End


	// Labor
	function insert_form_labor() {
		diagnosa = $('#labDiagnosa').val();
		ringkasan = $('#labRingkasan').val();
		keterangan = $('#labKet').val();
		id_pelayanan = $('#inPelLab').val();
		id_history = $('#inHisLab').val();
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_form_labor' ?>",
			method: "POST",
			dataType: 'json',
			data: {
				diagnosa: diagnosa,
				ringkasan: ringkasan,
				keterangan: keterangan,
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
					$('#formLabor')[0].reset();
					$("#collapse_tindakan_labor").collapse('hide');
					$("#collapse_form_labor").collapse('hide');
					$('#tableFormLabor').DataTable().ajax.reload();
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

	function pilih_labor(id) {

		$('#id_form_lab').val(id);
		$("#collapse_tindakan_labor").collapse('toggle');
		reload_data_labor(id);
		reload_total_labor(id);
	}

	function show_form() {
		$("#collapse_form_labor").collapse('toggle');
	}

	function insert_labor() {
		a = $("#inTindakanLabor").val();
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]);
		frek = parseFloat($("#inJumlahLabor").val());
		total = harga * frek;
		id_pel_lab = $('#id_pel_lab').val();
		id_his_lab = $('#id_his_lab').val();
		id_form_lab = $('#id_form_lab').val();
		id_list_tindakan = $('#id_daftar_tindakan').val();
		nama = $('#nama').val();
		var ID = Math.random().toString(36).substr(2, 16);

		dataString = 'id=' + ID + '&harga=' + harga +
			'&id_pel_lab=' + id_pel_lab + '&id_his_lab=' + id_his_lab + '&id_list_tindakan=' + splitDiag[0] +
			'&frek=' + frek + '&total=' + total + '&id_form_lab=' + id_form_lab;
		$.ajax({
			url: "<?= base_url() . 'IGD/insert_labor' ?>",
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
					$('#outBiayaTindakanLabor').val('');
					$('#inJumlahLabor').val('');
					$('#outTotalLabor').val('');
					$('#tablelabor').DataTable().ajax.reload();
					$('#outTotalHargaLabor').DataTable().ajax.reload();
					$('#datable').DataTable().ajax.reload();
					$("#collapse_form_labor").collapse('hide');
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

	function request_labor(id) {
		$.ajax({
			url: "<?= base_url() . 'Poli/req_form_labor' ?>",
			method: "POST",
			dataType: 'json',
			data: {
				id: id,
			},
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Permintaan Sedang Diproses",
						confirmButtonColor: "#3cb878",
					});
					$('#tableFormLabor').DataTable().ajax.reload();
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

	function hapus_form_labor(id) {
		swal({
			title: "Apakah kamu yakin?",
			text: "Menghapus data ?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?= base_url() . 'Poli/hapus_form_labor' ?>",
					method: "POST",
					dataType: 'json',
					data: {
						id: id,
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Permintaan Sudah Dihapus",
								confirmButtonColor: "#3cb878",
							});
							$('#tableFormLabor').DataTable().ajax.reload();
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
	}

	function reload_data_labor(id_pel_lab) {
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
				"url": '<?php echo base_url('IGD/tampil_list_labor'); ?>',
				"type": 'POST',
				"data": {
					id_pelayanan: id_pel_lab
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

	function reload_data_form_labor(id_pel_lab) {
		$('#tableFormLabor').dataTable().fnClearTable();
		$('#tableFormLabor').dataTable().fnDestroy();
		$('#tableFormLabor').DataTable({
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
				"url": '<?php echo base_url('Poli/tampil_form_labor'); ?>',
				"type": 'POST',
				"data": {
					id_pelayanan: id_pel_lab
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

	function pilihTindakanLabor() {
		a = $("#inTindakanLabor").val();
		splitDiag = a.split("|");

		harga = parseFloat(splitDiag[1]);
		$("#outBiayaTindakanLabor").val(convertToRupiah(harga));
		document.getElementById("inJumlahLabor").value = "1";
		document.getElementById("outTotalLabor").value = convertToRupiah(harga);
	}

	function reload_total_labor(id_pelayanan) {
		$('#outTotalHargaLabor').dataTable().fnClearTable();
		$('#outTotalHargaLabor').dataTable().fnDestroy();
		$('#outTotalHargaLabor').DataTable({
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
				"url": '<?php echo base_url('IGD/tampil_total_labor'); ?>',
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

	function edit_labor(id_pelayanan, id_history) {

		$("#id_pel_lab").val(id_pelayanan);
		$("#id_his_lab").val(id_history);
		$("#inPelLab").val(id_pelayanan);
		$("#inHisLab").val(id_history);
		$("#modal_labor").modal('show');
		reload_data_form_labor(id_pelayanan);


	}

	function hapus_labor(id_tindakan_labor, id_pelayanan, nama) {
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
					url: "<?php echo base_url() ?>Labor/hapus_data_labor",
					method: "POST",
					dataType: 'json',
					data: {
						id_tindakan_labor: id_tindakan_labor,
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Data Berhasil dihapus",
								confirmButtonColor: "#3cb878",
							});
							$('#tablelabor').DataTable().ajax.reload();
							$('#outTotalHargaLabor').DataTable().ajax.reload();
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

	function hargaTotalLabor() {
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]);
		frek = parseFloat($("#inJumlahLabor").val());
		total = harga * frek;

		$("#outTotalLabor").val(convertToRupiah(total));
	}
</script>
<script type="text/javascript">
	//Obat
	function convertToRupiah(angka) {
		var rupiah = '';
		var angkarev = angka.toString().split('').reverse().join('');
		for (var i = 0; i < angkarev.length; i++)
			if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
		return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
	}

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
			url: "<?php echo base_url() ?>IGD/cekTindakanObat",
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
			url: "<?= base_url() . 'IGD/insert_obat' ?>",
			method: "POST",
			dataType: 'json',
			cache: true,
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
					$.toast({
						heading: 'Success!',
						text: 'Tindakan ini telah ditambah',
						showHideTransition: 'fade',
						icon: 'success'
					})
					$('#formObat')[0].reset();
					$("#collap_nonracikan").collapse('show');

					$("#collap_racikan").collapse('hide');
					$('#tableobat').DataTable().ajax.reload();
					$('#inDepo').val('APOTIK').change();
					$('#inObat').val('-').change();
					$('#inTglExp').val('');
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
					$.toast({
						heading: 'Error!',
						text: data.status,
						showHideTransition: 'fade',
						icon: 'error'
					})
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

	function insert_na_tindakan() {
		idPelayanan = $('#idPelayanan').val();
		id_history = $('#idHis').val();
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_na_tindakan' ?>",
			data: {
				id_pelayanan: idPelayanan,
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
					$("#na_tindakan").hide();
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

	function insert_na_obat() {
		idPelayanan = $('#inPelResep').val();
		id_history = $('#inHisResep').val();
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_na_obat' ?>",
			data: {
				id_pelayanan: idPelayanan,
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
					$("#na_obat").hide();
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

	function insert_na_lab() {
		idPelayanan = $('#id_pel_lab').val();
		id_history = $('#id_his_lab').val();
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_na_lab' ?>",
			data: {
				id_pelayanan: idPelayanan,
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
					$("#na_lab").hide();
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

	function insert_na_radio() {
		idPelayanan = $('#id_pel_rad').val();
		id_history = $('#id_his_rad').val();
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_na_radio' ?>",
			data: {
				id_pelayanan: idPelayanan,
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
					$("#na_radio").hide();
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

			foreach ($signa as $row) {


				echo ",'" .  $row["tindakan"] . "'";
			}  ?>
		];
		var states1 = [
			<?php

			foreach ($cara_pemakaian_obat as $row) {


				echo ",'" .  $row["cara_pemakaian"] . "'";
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

		$('#the-basics1 .typeahead').typeahead({
			hint: true,
			highlight: true,
			minLength: 1
		}, {
			name: 'states1',
			source: substringMatcher(states1)
		});


	});
</script>