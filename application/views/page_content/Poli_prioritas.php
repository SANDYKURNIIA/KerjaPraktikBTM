<<<<<<< HEAD
<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">DATA PASIEN POLI PRIORITAS</span></h6>
		</div>
		<div class="clearfix"></div>
		<div align="right">
			<button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target=".modal-pendaftaranakun"><i class="icon-plus"></i><span class="btn-text">TAMBAH PASIEN</span>
			</button>
		</div>
	</div>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="table-wrap">
				<div class="table-responsive">
					<table id="datable" class="table table-hover display  pb-30">
						<thead>
							<tr class="bg-success">
								<th>NO</th>
								<th>HAPUS</th>
								<th>TINDAKAN</th>
								<th>OBAT</th>
								<th>RADIOLOGI</th>
								<th>LABOR</th>
								<th>KASIR</th>
								<th>STATUS BAYAR</th>
								<th>NAMA PASIEN</th>
								<th>TANGGAL</th>
								<th>JENIS LAYANAN</th>
								<th>DPJP</th>
								<th>JENIS KELAMIN</th>
								<th>KETERANGAN</th>
								<th>TGL LAHIR</th>
								<th>NO HP</th>
								<th>ALAMAT</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>HAPUS</th>
								<th>TINDAKAN</th>
								<th>OBAT</th>
								<th>RADIOLOGI</th>
								<th>LABOR</th>
								<th>KASIR</th>
								<th>STATUS BAYAR</th>
								<th>NAMA PASIEN</th>
								<th>TANGGAL</th>
								<th>JENIS LAYANAN</th>
								<th>DPJP</th>
								<th>JENIS KELAMIN</th>
								<th>KETERANGAN</th>
								<th>TGL LAHIR</th>
								<th>NO HP</th>
								<th>ALAMAT</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<!-- sample modal content -->

			<div class="modal fade modal-pendaftaranakun" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<p>TINDAKAN MCU</p>
							<p><i class="icon-people mr-10"></i>INPUT TINDAKAN</p>

						</div>
						<div class="modal-body">
							<!-- Form body  -->

							<div class="form-body mt-20">

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">NAMA PASIEN</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" placeholder="NAMA PASIEN" id="inNama" name="nama"></input>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
									<!-- span -->
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3 pt-5">TANGGAL LAHIR</label>
											<div class="col-md-9 has-success">
												<input type="date" class="form-control" id="inDateofbirth">
												<p id="datebirth" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3 pt-5">NO HP</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inOccupation">
												<p id="occupation" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">JENIS KELAMIN</label>
											<div class="col-md-9">
												<div class="radio-button radio-button-primary col-md-6">
													<input type="radio" name="sex" value="Laki-laki" id="sex1"> <label class="control-label" for="sex1">Laki-laki</label>
												</div>
												<div class="radio-button radio-button-primary col-md-6">
													<input type="radio" name="sex" value="Perempuan" id="sex2"> <label class="control-label" for="sex2">Perempuan </label>
												</div>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3 pt-5">ALAMAT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inAlamat">
												<p id="badgeno" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3 mt-10">JENIS LAYANAN</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" id="inLayanan">
													<option value="INTERNIS">POLI INTERNIS</option>
													<option value="OBGYNE">POLI OBGYNE</option>
													<option value="BEDAH UMUM">POLI BEDAH UMUM</option>
												</select>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
									&nbsp;&nbsp;
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3 ">KETE RANGAN </label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inKet">
												<span class="help-block"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3 mt-10">DPJP</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" id="inDpjp">
													<option value="-">-</option>
													<?php
													foreach ($dokter as $row) : ?>
														<option value="<?php echo $row['id_dokter']; ?>">
															<?php echo $row['nama']; ?></option>
													<?php endforeach ?>
												</select>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="modal-footer mb-10 mr-15">

								<button onclick="insert_pasien()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">Submit</span></button>

							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
			</div>
		</div>
	</div>
	<!-- TINDAKAN --------------------------------------------------------------------------------------------->
	<div class="modal fade bs-example-modal-lg" id="modal_tindakan" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> </button>
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST MCU
					</h5>
				</div>
				<div class="modal-body">
					<div class="form-wrap">

						<span class="help-block"></span>
						<div class="form-body mt-10">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<!-- <div align="right">
								<button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" onclick="edit_tindakan_mcu()"><i class="icon-plus"></i><span class="btn-text">TAMBAH TINDAKAN</span>
								</button>
							</div> -->
							<hr width="95%">

						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">TINDAKAN POLI</label>
									<div class="col-md-9 has-success" onchange="pilihTindakanMcu()">
										<select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inTindakanMcu" id="inTindakanMcu">

										</select>
									</div>
								</div>
							</div>
							<!--/span-->

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">JUMLAH TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control " id="inJumlahMcu" placeholder="jumlah" oninput="hargaTotalMcu()">
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>
						<span class="help-block"></span>

						<div class="row">

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">DPJP</label>
									<div class="col-md-9 has-success">
										<select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inPerawat" id="inPerawat">

											<?php
											foreach ($dokter as $row) : ?>
												<option value="<?php echo $row['id_dokter']; ?>">
													<?php echo $row['nama']; ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">BIAYA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" disabled id="outBiayaTindakanMcu">
										<input type="hidden" class="form-control" disabled id="id_mcu">
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">TOTAL HARGA</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control " disabled id="outTotalMcu">
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>
						<span class="help-block"></span>

						<div class="row">
							<div class="col-md-8">
								<div class="form-group pull-right">
									<input type="hidden" class="form-control " id="inJenisPel">
									<button onclick="insert_mcu()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
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
							<table class="table table-hover display  pb-60" id="tablemcu">
								<thead>
									<tr class="bg-success">
										<th>NO</th>
										<th>HAPUS</th>
										<!-- <th>STATUS</th> -->
										<th>NAMA TINDAKAN</th>
										<th>TANGGAL TINDAKAN</th>
										<th>BIAYA TINDAKAN </th>
										<th>JUMLAH TINDAKAN</th>
										<th>DPJP</th>
										<th>STAFF REQUEST</th>
										<!-- <th>STAFF KONFIRMASI</th> -->
									</tr>
								</thead>
								<tfoot>
									<tr class="bg-success">
										<th>NO</th>
										<th>HAPUS</th>
										<!-- <th>STATUS</th> -->
										<th>NAMA TINDAKAN</th>
										<th>TANGGAL TINDAKAN</th>
										<th>BIAYA TINDAKAN </th>
										<th>JUMLAH TINDAKAN</th>
										<th>DPJP</th>
										<th>STAFF REQUEST</th>
										<!-- <th>STAFF KONFIRMASI</th>> -->
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
								<table class="table table-hover display " id="outTotalHargaMcu">
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
	<!-- OBAT -->
	<div class="modal fade bs-example-modal-lg" id="modal_edit_resep" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> </button>
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> OBAT
					</h5>
				</div>
				<div class="modal-body">
					<div class="form-wrap">
						<!-- /formbody -->

						<div class="form-body">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO OBAT
							</h6>
							<hr width="95%">
							<form id="formObat">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">DEPO</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" id="inDepo">

													<option value="RANAP">RANAP</option>
													<option value="APOTIK">APOTIK</option>
													<option value="IGD">IGD</option>

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
														<option value="<?php echo $row["id_logistik"] . '|' . $row["harga_cost"] . '|' . $row["margin"] . '|' . $row["kadaluarsa"] . '|' . $row["stok"]. '|' . $row["ppn"]; ?>"><?php echo $row["nama"]; ?></option>
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
												<input type="number" class="form-control " id="inJumlahObat" placeholder="jumlah" value="1" oninput="setHarga()">
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

									</div>
									<div class="col-md-6">
										<label class="control-label col-md-3">CARA PAKAI OBAT</label>
										<div class="col-md-9 has-success" id="the-basics1">

											<input class="typeahead form-control filled-input" type="text" placeholder="Cara Pakai Obat" id="inCaraPakai" name="inCaraPakai" style="width: 284.17px;">

										</div>
									</div>
								</div>
							</form>
						</div>

						<input type="hidden" class="form-control" id="inPelObat">
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
						</hr>
					</div>


				</div>

			</div>

		</div>


	</div>
	<!-- RADIOLOGI -------------------------------------------------------------------->
	<div class="modal fade bs-example-modal-lg" id="modal_radiologi" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
											<input type="hidden" class="form-control" disabled id="id_tindakan_radiologi_mcu">
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
                                    <th>HAPUS</th>
                                    <!-- <th>AKSI</th> -->
                                    <th>EXPERTISE</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>STAFF KONFIRMASI</th>
                                    <th>DIAGNOSA</th>
                                    <th>GAMBAR</th>
                                    <!-- <th>KETERANGAN</th> -->
                                    <th>STATUS</th>
									</tr>
								</thead>
								<tfoot>
									<tr class="bg-success">
									<th>NO</th>
                                    <th>HAPUS</th>
                                    <!-- <th>AKSI</th> -->
                                    <th>EXPERTISE</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>STAFF KONFIRMASI</th>
                                    <th>DIAGNOSA</th>
                                    <th>GAMBAR</th>
                                    <!-- <th>KETERANGAN</th> -->
                                    <th>STATUS</th>
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

	<!-- LABOR ---------------------------------------------------------------------------->
	<div class="modal fade bs-example-modal-lg" id="modal_labor" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST LABOR
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
											<input type="hidden" class="form-control" disabled id="id_mcu">
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

						</div>
					</div>
				</div>

				<div class="modal-body mt-10">
					<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
					<hr width="95%">
					<div class="table-wrap" style="width: 100%; margin: auto ">
						<div class="table-responsive">
							<table class="table table-hover display  pb-60" id="tablelabor">
								<thead>
									<tr class="bg-success">
										<th>NO</th>
										<th>HAPUS</th>
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
										<th>HAPUS</th>
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
		</div>
	</div>
</div>




<style>
	td {
		color: black;
	}
</style>

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
			"ajax": '<?php echo base_url('Poli_prio/Data_MCU'); ?>',
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
<!-- MCU --------------------------------------------------------->
<script>
	function edit_detail() {
		$.ajax({
			url: "<?= base_url() . 'MCU/detail_mcu' ?>",
		});
	}
</script>
<!-- TINDAKAN ------------------------------------------------->
<script>
	function insert_pasien() {
		nama = $("#inNama").val();
		keterangan = $("#inKet").val();
		birthday = $("#inDateofbirth").val();
		alamat = $("#inAlamat").val();
		no_hp = $("#inOccupation").val();
		layanan = $("#inLayanan").val();
		dpjp = $("#inDpjp").val();
		var radios = document.getElementsByName("sex");
		for (var i = 0, length = radios.length; i < length; i++) {
			if (radios[i].checked) {
				sex = radios[i].value;
			}
		}

		$.ajax({
			url: "<?= base_url() . 'Poli_prio/insert_pasien' ?>",
			method: "POST",
			dataType: 'json',
			cache: true,
			data: {
				nama: nama,
				keterangan: keterangan,
				birthday: birthday,
				alamat: alamat,
				no_hp: no_hp,
				sex: sex,
				layanan: layanan,
				dpjp: dpjp
			},
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Data Tindakan berhasil ditambahkan!",
						confirmButtonColor: "#3cb878",
					});
					$('#inNama').val('');
					$('#inDateofbirth').val('');
					$('#inKet').val('');
					$('#inOccupation').val('');
					$("#inAlamat").val('');
					$("#inLayanan").val('');
					$(".modal-pendaftaranakun").modal('hide');
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

	function insert_mcu() {
		a = $("#inTindakanMcu").val();
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]) + parseFloat(splitDiag[2]);
		frek = parseFloat($("#inJumlahMcu").val());
		total = harga * frek;
		id_list_tindakan = splitDiag[0];
		nama = $('#nama').val();
		perawat = $('#inPerawat').val();
		id_mcu = $('#id_mcu').val();
		jenis_layanan = $('#inJenisPel').val();

		$.ajax({
			url: "<?= base_url() . 'Poli_prio/insert_mcu' ?>",
			method: "POST",
			dataType: 'json',
			cache: true,
			data: {
				nama: nama,
				harga: harga,
				id_list_tindakan: id_list_tindakan,
				total: total,
				id_mcu: id_mcu,
				perawat: perawat,
				jenis_layanan:jenis_layanan
			},
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Tindakan ini Telah di Simpan!",
						confirmButtonColor: "#3cb878",
					});
					$('#outBiayaTindakanMcu').val('');
					$('#inJumlahMcu').val('');
					$('#outTotalMcu').val('');
					$('#tablemcu').DataTable().ajax.reload();
					$('#outTotalHargaMcu').DataTable().ajax.reload();
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

	function reload_data_tindakan(id_mcu,jenis_layanan) {
		$('#tablemcu').dataTable().fnClearTable();
		$('#tablemcu').dataTable().fnDestroy();
		$('#tablemcu').DataTable({
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
				"url": '<?php echo base_url('Poli_prio/tampil_list'); ?>',
				"type": 'POST',
				"data": {
					id_mcu: id_mcu,
					jenis_layanan:jenis_layanan
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

	function pilihTindakanMcu() {
		a = $("#inTindakanMcu").val();
		splitDiag = a.split("|");

		harga = parseFloat(splitDiag[1]) + parseFloat(splitDiag[2]);
		$("#outBiayaTindakanMcu").val(convertToRupiah(harga));
		document.getElementById("inJumlahMcu").value = "1";
		document.getElementById("outTotalMcu").value = convertToRupiah(harga);
	}

	function reload_total_mcu(id_mcu,jenis_layanan) {
		$('#outTotalHargaMcu').dataTable().fnClearTable();
		$('#outTotalHargaMcu').dataTable().fnDestroy();
		$('#outTotalHargaMcu').DataTable({
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
				"url": '<?php echo base_url('Poli_prio/tampil_total_mcu'); ?>',
				"type": 'POST',
				"data": {
					id_mcu: id_mcu,
					jenis_layanan:jenis_layanan
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

	function edit_mcu(id_mcu, dpjp, jenis_layanan) {
		$.ajax({
			url: "<?php echo base_url(); ?>Poli_prio/getTindakan",
			method: "POST",
			data: {
				jenis_layanan: jenis_layanan
			},
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i;
				html = '<option value="-">-</option>';
				for (i = 0; i < data.length; i++) {
					html += '<option value=' + data[i].id_list_tindakan + '|' + data[i].harga_sarana + '|' + data[i].harga_jasa + '>' + data[i].nama + '</option>';
				}
				$('#inTindakanMcu').html(html);
			}
		});
		$("#modal_tindakan").modal('show');
		$('#id_mcu').val(id_mcu);
		$('#inJenisPel').val(jenis_layanan);
		$('#inPerawat').val(dpjp).change();
		reload_data_tindakan(id_mcu,jenis_layanan);
		reload_total_mcu(id_mcu,jenis_layanan);
	}

	function hapus_mcu(id_tindakan_mcu, id_mcu, nama,tabel) {
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
					url: "<?php echo base_url() ?>Poli_prio/hapus_data_mcu",
					method: "POST",
					dataType: 'json',
					data: {
						id_tindakan_mcu: id_tindakan_mcu,
						tabel:tabel
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Data Berhasil dihapus",
								confirmButtonColor: "#3cb878",
							});
							$('#tablemcu').DataTable().ajax.reload();
							$('#outTotalHargaMcu').DataTable().ajax.reload();
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

	function delete_mcu(id_mcu, nama) {
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
					url: "<?php echo base_url() ?>Poli_prio/hapus_mcu",
					method: "POST",
					dataType: 'json',
					data: {
						id_tindakan_mcu: id_mcu,
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Data Berhasil dihapus",
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
			});

		});
		return false;
	}

	function hargaTotalMcu() {
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]);
		frek = parseFloat($("#inJumlahMcu").val());
		total = harga * frek;

		$("#outTotalMcu").val(convertToRupiah(total));
	}

	function convertToRupiah(angka) {
		var rupiah = '';
		var angkarev = angka.toString().split('').reverse().join('');
		for (var i = 0; i < angkarev.length; i++)
			if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
		return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
	}
</script>

<script>
	function insert_kasir(id_mcu) {
		$.ajax({
			url: "<?= base_url() . 'Poli_prio/insert_req_kasir' ?>",
			data: {
				id_mcu: id_mcu,
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

	function edit_obat(id) {
		$('#inPelObat').val(id);
		// $('#inHisResep').val(id);
		$("#modal_edit_resep").modal('show');

		reload_data_obat(id);
	}

	$('#modal_edit_resep').on('hidden.bs.modal', function() {
		$("#collap_nonracikan").collapse('hide');
		$("#collap_racikan").collapse('hide');
		$('#tableobat').DataTable().ajax.reload();
	})



	function insert_Obat() {
		id_pelayanan = $('#inPelObat').val();
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
			url: "<?= base_url() . 'Rawatinap/insert_obat' ?>",
			method: "POST",
			dataType: 'json',
			cache: true,
			data: {
				id_pelayanan: id_pelayanan,
				id_resep: '-',
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
					$('#inDepo').val('RANAP').change();
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
				} else if (data.status == "error") {
					$.toast({
						heading: 'Error!',
						text: 'Stok tidak sesuai dengan permintaan',
						showHideTransition: 'fade',
						icon: 'error'
					})
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
</script>
<script>
	function getNamaObat(depo) {
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
					html += '<option value=' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + data[i].margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + data[i].total + '|' + data[i].depo + '>' + data[i].nama + '</option>';
				}
				$('#inObat').html(html);
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
				"url": '<?php echo base_url('Poli_prio/tampil_obat'); ?>',
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


		ppn = parseFloat(splitDiag[1]) * (parseFloat(splitDiag[5]) / 100);
		harga = parseFloat(splitDiag[1])+ppn;
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
							// $('#tableobat1').DataTable().ajax.reload();
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
							html += '<option value=' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + data[i].margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + data[i].ppn + '|'  + '>' + data[i].nama + '</option>';
						}
						$('#inObat').html(html);
					}
				});
			} else {
				$('#inObat').html('<option value="">-</option>');
			}
		});
	});
</script>
<!-- RADIOLOGI --------------------------------------------------------------->
<script>
	function convertToRupiah(angka) {
		var rupiah = '';
		var angkarev = angka.toString().split('').reverse().join('');
		for (var i = 0; i < angkarev.length; i++)
			if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
		return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
	}

	function insert_radiologi() {
		a = $("#inTindakanRadiologi").val();
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]);
		frek = parseFloat($("#inJumlahRadiologi").val());
		total = harga * frek;
		id_list_tindakan = splitDiag[0];
		nama = $('#nama').val();
		id_tindakan_radiologi = $('#id_tindakan_radiologi_mcu').val();

		$.ajax({
			url: "<?= base_url() . 'Poli_prio/insert_radiologi' ?>",
			method: "POST",
			dataType: 'json',
			cache: true,
			data: {
				nama: nama,
				harga: harga,
				id_list_tindakan: id_list_tindakan,
				total: total,
				id_tindakan_radiologi: id_tindakan_radiologi,
			},
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

	function reload_total_radiologi(id_mcu) {
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
				"url": '<?php echo base_url('Poli_prio/tampil_total_radiologi'); ?>',
				"type": 'POST',
				"data": {
					id_mcu: id_mcu
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

	function reload_data_radiologi(id_mcu) {
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
				"url": '<?php echo base_url('Poli_prio/tampil_list_radiologi'); ?>',
				"type": 'POST',
				"data": {
					id_mcu: id_mcu
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

	function edit_radiologi(id_mcu) {
		
		$("#modal_radiologi").modal('show');
		$('#id_tindakan_radiologi_mcu').val(id_mcu);
		reload_data_radiologi(id_mcu);
		reload_total_radiologi(id_mcu);
	}

	function hapus_radiologi(id_tindakan_radiologi, id_mcu, nama) {
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
					url: "<?php echo base_url() ?>Poli_prio/hapus_data_radiologi",
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
</script>
<!-- LABOR ------------------------------------------------------------------->
<script>
	function insert_labor() {
		a = $("#inTindakanLabor").val();
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]);
		frek = parseFloat($("#inJumlahLabor").val());
		total = harga * frek;
		id_list_tindakan = splitDiag[0];
		nama = $('#nama').val();
		id_mcu = $('#id_mcu').val();

		$.ajax({
			url: "<?= base_url() . 'Poli_prio/insert_labor' ?>",
			method: "POST",
			dataType: 'json',
			cache: true,
			data: {
				nama: nama,
				harga: harga,
				id_list_tindakan: id_list_tindakan,
				total: total,
				id_mcu: id_mcu,
			},
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

	function reload_data_labor(id_mcu) {
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
				"url": '<?php echo base_url('Poli_prio/tampil_list_labor'); ?>',
				"type": 'POST',
				"data": {
					id_mcu: id_mcu
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

	function reload_total_labor(id_mcu) {
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
				"url": '<?php echo base_url('Poli_prio/tampil_total_labor'); ?>',
				"type": 'POST',
				"data": {
					id_mcu: id_mcu
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

	function edit_labor(id_mcu) {
		// $.ajax({
		// 	url: "<?= base_url() . 'MCU/get_labor' ?>",
		// 	data: {
		// 		id_mcu:id_mcu
		// 	},
		// 	type: 'POST',
		// 	dataType: 'json',
		// 	success: function(data) {
		// 		if (data.status_dt == "found") {
		// 			$("#modal_labor").modal('show');
		// 			$('#id_mcu').val(id_mcu);
		// 			reload_data_labor(id_mcu);
		// 			reload_total_labor(id_mcu);
		// 		} else {
		// 			alert("data tidak ditemukan");
		// 		}
		// 	}
		// });
		$("#modal_labor").modal('show');
		$('#id_mcu').val(id_mcu);
		reload_data_labor(id_mcu);
		reload_total_labor(id_mcu);
	}

	function hapus_labor(id_tindakan_labor, id_mcu, nama) {
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
					url: "<?php echo base_url() ?>Poli_prio/hapus_data_labor",
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
=======
<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">DATA PASIEN POLI PRIORITAS</span></h6>
		</div>
		<div class="clearfix"></div>
		<div align="right">
			<button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target=".modal-pendaftaranakun"><i class="icon-plus"></i><span class="btn-text">TAMBAH PASIEN</span>
			</button>
		</div>
	</div>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="table-wrap">
				<div class="table-responsive">
					<table id="datable" class="table table-hover display  pb-30">
						<thead>
							<tr class="bg-success">
								<th>NO</th>
								<th>HAPUS</th>
								<th>TINDAKAN</th>
								<th>OBAT</th>
								<th>RADIOLOGI</th>
								<th>LABOR</th>
								<th>KASIR</th>
								<th>STATUS BAYAR</th>
								<th>NAMA PASIEN</th>
								<th>TANGGAL</th>
								<th>JENIS LAYANAN</th>
								<th>DPJP</th>
								<th>JENIS KELAMIN</th>
								<th>KETERANGAN</th>
								<th>TGL LAHIR</th>
								<th>NO HP</th>
								<th>ALAMAT</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>HAPUS</th>
								<th>TINDAKAN</th>
								<th>OBAT</th>
								<th>RADIOLOGI</th>
								<th>LABOR</th>
								<th>KASIR</th>
								<th>STATUS BAYAR</th>
								<th>NAMA PASIEN</th>
								<th>TANGGAL</th>
								<th>JENIS LAYANAN</th>
								<th>DPJP</th>
								<th>JENIS KELAMIN</th>
								<th>KETERANGAN</th>
								<th>TGL LAHIR</th>
								<th>NO HP</th>
								<th>ALAMAT</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<!-- sample modal content -->

			<div class="modal fade modal-pendaftaranakun" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<p>TINDAKAN MCU</p>
							<p><i class="icon-people mr-10"></i>INPUT TINDAKAN</p>

						</div>
						<div class="modal-body">
							<!-- Form body  -->

							<div class="form-body mt-20">

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">NAMA PASIEN</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" placeholder="NAMA PASIEN" id="inNama" name="nama"></input>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
									<!-- span -->
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3 pt-5">TANGGAL LAHIR</label>
											<div class="col-md-9 has-success">
												<input type="date" class="form-control" id="inDateofbirth">
												<p id="datebirth" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3 pt-5">NO HP</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inOccupation">
												<p id="occupation" style="font-size:12px; margin-top:5px;"></p>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">JENIS KELAMIN</label>
											<div class="col-md-9">
												<div class="radio-button radio-button-primary col-md-6">
													<input type="radio" name="sex" value="Laki-laki" id="sex1"> <label class="control-label" for="sex1">Laki-laki</label>
												</div>
												<div class="radio-button radio-button-primary col-md-6">
													<input type="radio" name="sex" value="Perempuan" id="sex2"> <label class="control-label" for="sex2">Perempuan </label>
												</div>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3 pt-5">ALAMAT</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inAlamat">
												<p id="badgeno" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3 mt-10">JENIS LAYANAN</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" id="inLayanan">
													<option value="INTERNIS">POLI INTERNIS</option>
													<option value="OBGYNE">POLI OBGYNE</option>
													<option value="BEDAH UMUM">POLI BEDAH UMUM</option>
												</select>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
									&nbsp;&nbsp;
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3 ">KETE RANGAN </label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="inKet">
												<span class="help-block"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3 mt-10">DPJP</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" id="inDpjp">
													<option value="-">-</option>
													<?php
													foreach ($dokter as $row) : ?>
														<option value="<?php echo $row['id_dokter']; ?>">
															<?php echo $row['nama']; ?></option>
													<?php endforeach ?>
												</select>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="modal-footer mb-10 mr-15">

								<button onclick="insert_pasien()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">Submit</span></button>

							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
			</div>
		</div>
	</div>
	<!-- TINDAKAN --------------------------------------------------------------------------------------------->
	<div class="modal fade bs-example-modal-lg" id="modal_tindakan" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> </button>
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST MCU
					</h5>
				</div>
				<div class="modal-body">
					<div class="form-wrap">

						<span class="help-block"></span>
						<div class="form-body mt-10">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<!-- <div align="right">
								<button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" onclick="edit_tindakan_mcu()"><i class="icon-plus"></i><span class="btn-text">TAMBAH TINDAKAN</span>
								</button>
							</div> -->
							<hr width="95%">

						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">TINDAKAN POLI</label>
									<div class="col-md-9 has-success" onchange="pilihTindakanMcu()">
										<select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inTindakanMcu" id="inTindakanMcu">

										</select>
									</div>
								</div>
							</div>
							<!--/span-->

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">JUMLAH TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control " id="inJumlahMcu" placeholder="jumlah" oninput="hargaTotalMcu()">
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>
						<span class="help-block"></span>

						<div class="row">

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">DPJP</label>
									<div class="col-md-9 has-success">
										<select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inPerawat" id="inPerawat">

											<?php
											foreach ($dokter as $row) : ?>
												<option value="<?php echo $row['id_dokter']; ?>">
													<?php echo $row['nama']; ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">BIAYA TINDAKAN</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" disabled id="outBiayaTindakanMcu">
										<input type="hidden" class="form-control" disabled id="id_mcu">
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">TOTAL HARGA</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control " disabled id="outTotalMcu">
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>
						<span class="help-block"></span>

						<div class="row">
							<div class="col-md-8">
								<div class="form-group pull-right">
									<input type="hidden" class="form-control " id="inJenisPel">
									<button onclick="insert_mcu()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
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
							<table class="table table-hover display  pb-60" id="tablemcu">
								<thead>
									<tr class="bg-success">
										<th>NO</th>
										<th>HAPUS</th>
										<!-- <th>STATUS</th> -->
										<th>NAMA TINDAKAN</th>
										<th>TANGGAL TINDAKAN</th>
										<th>BIAYA TINDAKAN </th>
										<th>JUMLAH TINDAKAN</th>
										<th>DPJP</th>
										<th>STAFF REQUEST</th>
										<!-- <th>STAFF KONFIRMASI</th> -->
									</tr>
								</thead>
								<tfoot>
									<tr class="bg-success">
										<th>NO</th>
										<th>HAPUS</th>
										<!-- <th>STATUS</th> -->
										<th>NAMA TINDAKAN</th>
										<th>TANGGAL TINDAKAN</th>
										<th>BIAYA TINDAKAN </th>
										<th>JUMLAH TINDAKAN</th>
										<th>DPJP</th>
										<th>STAFF REQUEST</th>
										<!-- <th>STAFF KONFIRMASI</th>> -->
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
								<table class="table table-hover display " id="outTotalHargaMcu">
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
	<!-- OBAT -->
	<div class="modal fade bs-example-modal-lg" id="modal_edit_resep" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> </button>
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> OBAT
					</h5>
				</div>
				<div class="modal-body">
					<div class="form-wrap">
						<!-- /formbody -->

						<div class="form-body">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO OBAT
							</h6>
							<hr width="95%">
							<form id="formObat">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">DEPO</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" id="inDepo">

													<option value="RANAP">RANAP</option>
													<option value="APOTIK">APOTIK</option>
													<option value="IGD">IGD</option>

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
														<option value="<?php echo $row["id_logistik"] . '|' . $row["harga_cost"] . '|' . $row["margin"] . '|' . $row["kadaluarsa"] . '|' . $row["stok"]. '|' . $row["ppn"]; ?>"><?php echo $row["nama"]; ?></option>
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
												<input type="number" class="form-control " id="inJumlahObat" placeholder="jumlah" value="1" oninput="setHarga()">
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

									</div>
									<div class="col-md-6">
										<label class="control-label col-md-3">CARA PAKAI OBAT</label>
										<div class="col-md-9 has-success" id="the-basics1">

											<input class="typeahead form-control filled-input" type="text" placeholder="Cara Pakai Obat" id="inCaraPakai" name="inCaraPakai" style="width: 284.17px;">

										</div>
									</div>
								</div>
							</form>
						</div>

						<input type="hidden" class="form-control" id="inPelObat">
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
						</hr>
					</div>


				</div>

			</div>

		</div>


	</div>
	<!-- RADIOLOGI -------------------------------------------------------------------->
	<div class="modal fade bs-example-modal-lg" id="modal_radiologi" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
											<input type="hidden" class="form-control" disabled id="id_tindakan_radiologi_mcu">
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
                                    <th>HAPUS</th>
                                    <!-- <th>AKSI</th> -->
                                    <th>EXPERTISE</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>STAFF KONFIRMASI</th>
                                    <th>DIAGNOSA</th>
                                    <th>GAMBAR</th>
                                    <!-- <th>KETERANGAN</th> -->
                                    <th>STATUS</th>
									</tr>
								</thead>
								<tfoot>
									<tr class="bg-success">
									<th>NO</th>
                                    <th>HAPUS</th>
                                    <!-- <th>AKSI</th> -->
                                    <th>EXPERTISE</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>STAFF KONFIRMASI</th>
                                    <th>DIAGNOSA</th>
                                    <th>GAMBAR</th>
                                    <!-- <th>KETERANGAN</th> -->
                                    <th>STATUS</th>
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

	<!-- LABOR ---------------------------------------------------------------------------->
	<div class="modal fade bs-example-modal-lg" id="modal_labor" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST LABOR
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
											<input type="hidden" class="form-control" disabled id="id_mcu">
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

						</div>
					</div>
				</div>

				<div class="modal-body mt-10">
					<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
					<hr width="95%">
					<div class="table-wrap" style="width: 100%; margin: auto ">
						<div class="table-responsive">
							<table class="table table-hover display  pb-60" id="tablelabor">
								<thead>
									<tr class="bg-success">
										<th>NO</th>
										<th>HAPUS</th>
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
										<th>HAPUS</th>
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
		</div>
	</div>
</div>




<style>
	td {
		color: black;
	}
</style>

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
			"ajax": '<?php echo base_url('Poli_prio/Data_MCU'); ?>',
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
<!-- MCU --------------------------------------------------------->
<script>
	function edit_detail() {
		$.ajax({
			url: "<?= base_url() . 'MCU/detail_mcu' ?>",
		});
	}
</script>
<!-- TINDAKAN ------------------------------------------------->
<script>
	function insert_pasien() {
		nama = $("#inNama").val();
		keterangan = $("#inKet").val();
		birthday = $("#inDateofbirth").val();
		alamat = $("#inAlamat").val();
		no_hp = $("#inOccupation").val();
		layanan = $("#inLayanan").val();
		dpjp = $("#inDpjp").val();
		var radios = document.getElementsByName("sex");
		for (var i = 0, length = radios.length; i < length; i++) {
			if (radios[i].checked) {
				sex = radios[i].value;
			}
		}

		$.ajax({
			url: "<?= base_url() . 'Poli_prio/insert_pasien' ?>",
			method: "POST",
			dataType: 'json',
			cache: true,
			data: {
				nama: nama,
				keterangan: keterangan,
				birthday: birthday,
				alamat: alamat,
				no_hp: no_hp,
				sex: sex,
				layanan: layanan,
				dpjp: dpjp
			},
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Data Tindakan berhasil ditambahkan!",
						confirmButtonColor: "#3cb878",
					});
					$('#inNama').val('');
					$('#inDateofbirth').val('');
					$('#inKet').val('');
					$('#inOccupation').val('');
					$("#inAlamat").val('');
					$("#inLayanan").val('');
					$(".modal-pendaftaranakun").modal('hide');
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

	function insert_mcu() {
		a = $("#inTindakanMcu").val();
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]) + parseFloat(splitDiag[2]);
		frek = parseFloat($("#inJumlahMcu").val());
		total = harga * frek;
		id_list_tindakan = splitDiag[0];
		nama = $('#nama').val();
		perawat = $('#inPerawat').val();
		id_mcu = $('#id_mcu').val();
		jenis_layanan = $('#inJenisPel').val();

		$.ajax({
			url: "<?= base_url() . 'Poli_prio/insert_mcu' ?>",
			method: "POST",
			dataType: 'json',
			cache: true,
			data: {
				nama: nama,
				harga: harga,
				id_list_tindakan: id_list_tindakan,
				total: total,
				id_mcu: id_mcu,
				perawat: perawat,
				jenis_layanan:jenis_layanan
			},
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Tindakan ini Telah di Simpan!",
						confirmButtonColor: "#3cb878",
					});
					$('#outBiayaTindakanMcu').val('');
					$('#inJumlahMcu').val('');
					$('#outTotalMcu').val('');
					$('#tablemcu').DataTable().ajax.reload();
					$('#outTotalHargaMcu').DataTable().ajax.reload();
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

	function reload_data_tindakan(id_mcu,jenis_layanan) {
		$('#tablemcu').dataTable().fnClearTable();
		$('#tablemcu').dataTable().fnDestroy();
		$('#tablemcu').DataTable({
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
				"url": '<?php echo base_url('Poli_prio/tampil_list'); ?>',
				"type": 'POST',
				"data": {
					id_mcu: id_mcu,
					jenis_layanan:jenis_layanan
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

	function pilihTindakanMcu() {
		a = $("#inTindakanMcu").val();
		splitDiag = a.split("|");

		harga = parseFloat(splitDiag[1]) + parseFloat(splitDiag[2]);
		$("#outBiayaTindakanMcu").val(convertToRupiah(harga));
		document.getElementById("inJumlahMcu").value = "1";
		document.getElementById("outTotalMcu").value = convertToRupiah(harga);
	}

	function reload_total_mcu(id_mcu,jenis_layanan) {
		$('#outTotalHargaMcu').dataTable().fnClearTable();
		$('#outTotalHargaMcu').dataTable().fnDestroy();
		$('#outTotalHargaMcu').DataTable({
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
				"url": '<?php echo base_url('Poli_prio/tampil_total_mcu'); ?>',
				"type": 'POST',
				"data": {
					id_mcu: id_mcu,
					jenis_layanan:jenis_layanan
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

	function edit_mcu(id_mcu, dpjp, jenis_layanan) {
		$.ajax({
			url: "<?php echo base_url(); ?>Poli_prio/getTindakan",
			method: "POST",
			data: {
				jenis_layanan: jenis_layanan
			},
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i;
				html = '<option value="-">-</option>';
				for (i = 0; i < data.length; i++) {
					html += '<option value=' + data[i].id_list_tindakan + '|' + data[i].harga_sarana + '|' + data[i].harga_jasa + '>' + data[i].nama + '</option>';
				}
				$('#inTindakanMcu').html(html);
			}
		});
		$("#modal_tindakan").modal('show');
		$('#id_mcu').val(id_mcu);
		$('#inJenisPel').val(jenis_layanan);
		$('#inPerawat').val(dpjp).change();
		reload_data_tindakan(id_mcu,jenis_layanan);
		reload_total_mcu(id_mcu,jenis_layanan);
	}

	function hapus_mcu(id_tindakan_mcu, id_mcu, nama,tabel) {
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
					url: "<?php echo base_url() ?>Poli_prio/hapus_data_mcu",
					method: "POST",
					dataType: 'json',
					data: {
						id_tindakan_mcu: id_tindakan_mcu,
						tabel:tabel
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Data Berhasil dihapus",
								confirmButtonColor: "#3cb878",
							});
							$('#tablemcu').DataTable().ajax.reload();
							$('#outTotalHargaMcu').DataTable().ajax.reload();
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

	function delete_mcu(id_mcu, nama) {
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
					url: "<?php echo base_url() ?>Poli_prio/hapus_mcu",
					method: "POST",
					dataType: 'json',
					data: {
						id_tindakan_mcu: id_mcu,
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Data Berhasil dihapus",
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
			});

		});
		return false;
	}

	function hargaTotalMcu() {
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]);
		frek = parseFloat($("#inJumlahMcu").val());
		total = harga * frek;

		$("#outTotalMcu").val(convertToRupiah(total));
	}

	function convertToRupiah(angka) {
		var rupiah = '';
		var angkarev = angka.toString().split('').reverse().join('');
		for (var i = 0; i < angkarev.length; i++)
			if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
		return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
	}
</script>

<script>
	function insert_kasir(id_mcu) {
		$.ajax({
			url: "<?= base_url() . 'Poli_prio/insert_req_kasir' ?>",
			data: {
				id_mcu: id_mcu,
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

	function edit_obat(id) {
		$('#inPelObat').val(id);
		// $('#inHisResep').val(id);
		$("#modal_edit_resep").modal('show');

		reload_data_obat(id);
	}

	$('#modal_edit_resep').on('hidden.bs.modal', function() {
		$("#collap_nonracikan").collapse('hide');
		$("#collap_racikan").collapse('hide');
		$('#tableobat').DataTable().ajax.reload();
	})



	function insert_Obat() {
		id_pelayanan = $('#inPelObat').val();
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
			url: "<?= base_url() . 'Rawatinap/insert_obat' ?>",
			method: "POST",
			dataType: 'json',
			cache: true,
			data: {
				id_pelayanan: id_pelayanan,
				id_resep: '-',
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
					$('#inDepo').val('RANAP').change();
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
				} else if (data.status == "error") {
					$.toast({
						heading: 'Error!',
						text: 'Stok tidak sesuai dengan permintaan',
						showHideTransition: 'fade',
						icon: 'error'
					})
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
</script>
<script>
	function getNamaObat(depo) {
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
					html += '<option value=' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + data[i].margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + data[i].total + '|' + data[i].depo + '>' + data[i].nama + '</option>';
				}
				$('#inObat').html(html);
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
				"url": '<?php echo base_url('Poli_prio/tampil_obat'); ?>',
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


		ppn = parseFloat(splitDiag[1]) * (parseFloat(splitDiag[5]) / 100);
		harga = parseFloat(splitDiag[1])+ppn;
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
							// $('#tableobat1').DataTable().ajax.reload();
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
							html += '<option value=' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + data[i].margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + data[i].ppn + '|'  + '>' + data[i].nama + '</option>';
						}
						$('#inObat').html(html);
					}
				});
			} else {
				$('#inObat').html('<option value="">-</option>');
			}
		});
	});
</script>
<!-- RADIOLOGI --------------------------------------------------------------->
<script>
	function convertToRupiah(angka) {
		var rupiah = '';
		var angkarev = angka.toString().split('').reverse().join('');
		for (var i = 0; i < angkarev.length; i++)
			if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
		return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
	}

	function insert_radiologi() {
		a = $("#inTindakanRadiologi").val();
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]);
		frek = parseFloat($("#inJumlahRadiologi").val());
		total = harga * frek;
		id_list_tindakan = splitDiag[0];
		nama = $('#nama').val();
		id_tindakan_radiologi = $('#id_tindakan_radiologi_mcu').val();

		$.ajax({
			url: "<?= base_url() . 'Poli_prio/insert_radiologi' ?>",
			method: "POST",
			dataType: 'json',
			cache: true,
			data: {
				nama: nama,
				harga: harga,
				id_list_tindakan: id_list_tindakan,
				total: total,
				id_tindakan_radiologi: id_tindakan_radiologi,
			},
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

	function reload_total_radiologi(id_mcu) {
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
				"url": '<?php echo base_url('Poli_prio/tampil_total_radiologi'); ?>',
				"type": 'POST',
				"data": {
					id_mcu: id_mcu
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

	function reload_data_radiologi(id_mcu) {
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
				"url": '<?php echo base_url('Poli_prio/tampil_list_radiologi'); ?>',
				"type": 'POST',
				"data": {
					id_mcu: id_mcu
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

	function edit_radiologi(id_mcu) {
		
		$("#modal_radiologi").modal('show');
		$('#id_tindakan_radiologi_mcu').val(id_mcu);
		reload_data_radiologi(id_mcu);
		reload_total_radiologi(id_mcu);
	}

	function hapus_radiologi(id_tindakan_radiologi, id_mcu, nama) {
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
					url: "<?php echo base_url() ?>Poli_prio/hapus_data_radiologi",
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
</script>
<!-- LABOR ------------------------------------------------------------------->
<script>
	function insert_labor() {
		a = $("#inTindakanLabor").val();
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]);
		frek = parseFloat($("#inJumlahLabor").val());
		total = harga * frek;
		id_list_tindakan = splitDiag[0];
		nama = $('#nama').val();
		id_mcu = $('#id_mcu').val();

		$.ajax({
			url: "<?= base_url() . 'Poli_prio/insert_labor' ?>",
			method: "POST",
			dataType: 'json',
			cache: true,
			data: {
				nama: nama,
				harga: harga,
				id_list_tindakan: id_list_tindakan,
				total: total,
				id_mcu: id_mcu,
			},
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

	function reload_data_labor(id_mcu) {
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
				"url": '<?php echo base_url('Poli_prio/tampil_list_labor'); ?>',
				"type": 'POST',
				"data": {
					id_mcu: id_mcu
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

	function reload_total_labor(id_mcu) {
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
				"url": '<?php echo base_url('Poli_prio/tampil_total_labor'); ?>',
				"type": 'POST',
				"data": {
					id_mcu: id_mcu
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

	function edit_labor(id_mcu) {
		// $.ajax({
		// 	url: "<?= base_url() . 'MCU/get_labor' ?>",
		// 	data: {
		// 		id_mcu:id_mcu
		// 	},
		// 	type: 'POST',
		// 	dataType: 'json',
		// 	success: function(data) {
		// 		if (data.status_dt == "found") {
		// 			$("#modal_labor").modal('show');
		// 			$('#id_mcu').val(id_mcu);
		// 			reload_data_labor(id_mcu);
		// 			reload_total_labor(id_mcu);
		// 		} else {
		// 			alert("data tidak ditemukan");
		// 		}
		// 	}
		// });
		$("#modal_labor").modal('show');
		$('#id_mcu').val(id_mcu);
		reload_data_labor(id_mcu);
		reload_total_labor(id_mcu);
	}

	function hapus_labor(id_tindakan_labor, id_mcu, nama) {
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
					url: "<?php echo base_url() ?>Poli_prio/hapus_data_labor",
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>