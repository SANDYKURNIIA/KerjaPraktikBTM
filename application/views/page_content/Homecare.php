<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">DATA PASIEN HOME CARE</span></h6>
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
								<th>OBAT RUANGAN</th>
								<th>KASIR</th>
								<th>STATUS BAYAR</th>
								<th>NAMA PASIEN</th>
								<th>TANGGAL</th>
								<th>JENIS LAYANAN</th>
								<th>JENIS KELAMIN</th>
								<th>KETERANGAN</th>
								<th>CARA BAYAR</th>
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
								<th>OBAT RUANGAN</th>
								<th>KASIR</th>
								<th>STATUS BAYAR</th>
								<th>NAMA PASIEN</th>
								<th>TANGGAL</th>
								<th>JENIS LAYANAN</th>
								<th>JENIS KELAMIN</th>
								<th>KETERANGAN</th>
								<th>CARA BAYAR</th>
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
							<p>TINDAKAN HOMECARE</p>
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
													<option value="HOMECARE">HOMECARE</option>
													<option value="TELEMEDICINE">TELEMEDICINE</option>
													<option value="PENYEWAAN">PENYEWAAN</option>
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

								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">JENIS KLAIM</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" placeholder="PILIH JENIS KLAIM" style="border: 1px solid lightgreen;" id="inCaraBayar" name="CaraBayar">
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

						<!-- TINDAKAN HOMECARE -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">TINDAKAN HOMECARE</label>
									<div class="col-md-9 has-success" onchange="pilihTindakanMcu()">
										<select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inTindakanMcu" id="inTindakanMcu">
											<option value="-">-</option>
											<?php
											foreach ($tindakan_mcu as $row) :
												$harga = $row['biaya_sarana'] + $row['jasa_transport']; ?>
												<option value="<?php echo $row['id_list_tindakan'] . "|" . $harga . "|" . $row['jasa_transport'] . "|" . $row['nama_tindakan']; ?>">
													<?php echo $row['nama_tindakan']; ?></option>
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
									<label class="control-label col-md-3">PERAWAT</label>
									<div class="col-md-9 has-success">
										<select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inPerawat" id="inPerawat">

											<?php
											foreach ($perawat as $row) : ?>
												<option value="<?php echo $row['id_perawat']; ?>">
													<?php echo $row['nama_perawat']; ?></option>
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

							<!-- Total Harga -->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">TOTAL HARGA</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" disabled id="outTotalMcu">
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">NAMA DOKTER</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" style="border: 1px solid lightgreen;" id="inDPJP" name="NAMA DOKTER">
												<?php foreach ($data_dokter as $row) : ?>
													<option value="<?php echo $row->id_dokter; ?>">
														<?php echo $row->nama; ?>
													</option>
												<?php endforeach ?>
											</select>
											<input type="hidden" id="kodedpjp">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>

							<!-- Jasa Dokter -->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">JASA DOKTER</label>
									<div class="col-md-9 has-error">
										<input type="text" class="form-control" disabled id="jasaTransport">
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<!-- <div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">JASA DOKTER</label>
									<div class="col-md-9 has-success">
										<select class="form-control filled-input select2" style="border: 1px solid lightgreen;" id="inJasaDokter" name="inJasaDokter">
											<option value="-">-</option>
											<?php foreach ($data_dokter as $row) : ?>
												<option value="<?php echo $row->id_dokter; ?>">
													<?php echo $row->nama; ?>
												</option>
											<?php endforeach ?>
										</select>
										<span class="help-block"></span>
									</div>
								</div>
							</div> -->

							<div class="row">
								<div class="col-md-8">
									<div class="form-group pull-right">
										<button onclick="insert_mcu()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
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
										<th>PERAWAT</th>
										<th>DOKTER</th>
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
										<th>PERAWAT</th>
										<th>DOKTER</th>
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

	<!-- obat ruangan -->
	<div class="modal fade bs-example-modal-lg" id="modal_obat_ruang" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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

							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA OBAT</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" id="inObatRuang" onchange="setHarga1()">
												<option value="-">-</option>
												<?php

												foreach ($obatruang as $row) {

												?>
													<option value="<?php echo $row["id_logistik"] . '|' . $row["harga_cost"] . '|' . $row["margin"] . '|' . $row["kadaluarsa"] . '|' . $row["stok"] . '|' . $row["ppn"]; ?>"><?php echo $row["nama"]; ?></option>
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
											<input type="text" class="form-control " id="inTglExpR" disabled="">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">JUMLAH STOK</label>
										<div class="col-md-9 has-error">
											<input type="number" class="form-control " id="outStokR" value="0" disabled="">
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
											<input type="number" class="form-control " id="inJumlahObatR" placeholder="jumlah" value="1" min="1" oninput="setHarga1()">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">DISCOUNT</label>
										<div class="col-md-3 has-success">
											<input type="number" placeholder="Disc" max="35" class="form-control" id="inDiscR" value="0" oninput="setHarga1()">
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
											<input type="text" class="form-control" disabled="" id="outBiayaTindakanObatR">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">HARGA + MARGIN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" disabled="" id="outBiayaMarginObatR">
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
											<input type="text" class="form-control" disabled="" id="outTotalObatR">

										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">KETERANGAN</label>
										<div class="col-md-9 has-success">
											<textarea class="form-control" rows="2" style="resize:none" id="inKeteranganObatR">-</textarea>
										</div>
									</div>
								</div>

							</div>
							<div class="row" style="margin-top: 10px;" id="cetakSigna1">

								<div class="col-md-6">
									<label class="control-label col-md-3">SIGNA OBAT</label>
									<div class="col-md-9 has-success">
										<select class="form-control filled-input rounded-input select2" id="inSignaR">
											<?php
											foreach ($signaobat as $row) {

											?>
												<option value="<?php echo $row["id_signa"]; ?>"> <?php echo $row["tindakan"]; ?> </option>
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
										<select class="form-control filled-input rounded-input select2" id="inCaraPakaiR">
											<option value="-">-</option>
											<?php
											foreach ($cara_pemakaian_obat_biasa as $row) {

											?>
												<option value="<?php echo $row["id_cara_pemakaian"]; ?>"> <?php echo $row["cara_pemakaian"]; ?> </option>
											<?php
											}
											?>

										</select>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
							<input type="hidden" class="form-control" disabled="" id="cara_bayar">
							<input type="hidden" class="form-control" id="inPelObat">
							<input type="hidden" class="form-control" id="inHisObat">
							<div class="form-actions mt-10">
								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<div type="submit" class="btn btn-success mr-10" onclick="insert_ObatR()">SIMPAN</div>

												<span></span>
											</div>
										</div>
									</div>
									<div class="col-md-6"> </div>
								</div>
							</div>
							<div class="panel-wrapper collapse in mb-20 mt-20" id="outListTindakanApelkes">
								<h6 class="txt-dark capitalize-font pl-20 mb-0"><i class="icon-list mr-10"></i>TINDAKAN OBAT</h6>
								<hr width="95% mb-0">
								<div class="panel-body mt-0">
									<div class="table-wrap mt-0">
										<div class="table-responsive mt-0">
											<table id="tableobatR" class="table table-hover display pb-30 mt-10" width="100%">
												<thead>
													<tr class="bg-success">
														<th>NO</th>
														<th>NAMA OBAT</th>
														<th>EXPIRE DATE</th>
														<th>HARGA OBAT</th>
														<th>JUMLAH OBAT</th>
														<th>TOTAL BIAYA</th>
														<th>NAMA STAFF</th>
														<th>HAPUS</th>
														<!-- <th>SIGNA</th> -->
													</tr>
												</thead>
												<tbody style="color: black">
												</tbody>
												<tfoot>
													<th>NO</th>
													<th>NAMA OBAT</th>
													<th>EXPIRE DATE</th>
													<th>HARGA OBAT</th>
													<th>JUMLAH OBAT</th>
													<th>TOTAL BIAYA</th>
													<th>NAMA STAFF</th>
													<th>HAPUS</th>
												</tfoot>
											</table>
										</div>
									</div>
									<div class="row">
										<div class="col-md-8">
										</div>
										<div class="col-md-4 pull-right mt-20">

											<div class="table-wrap" style="width: 100%; margin-bottom:40px;">
												<!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->
												<div class="table-responsive ">
													<table class="table table-hover display " id="outTotalHarga1">
														<thead>
															<tr class="bg-success">
																<th style="font-weight:bold;">Total</th>
																<th style="font-weight:bold;">PPN Keluaran</th>
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

							<span class="help-block"></span>
							<div align="right">

								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<div id="cetakFarmasi" onclick="cetak_resep()" class="btn btn-success mr-10">CETAK RESEP</div>
												<div id="batalFarmasi" onclick="batalFarmasi()" class="btn btn-danger ">BATAL</div>

												<span></span>
											</div>
										</div>
									</div>
									<div class="col-md-6"> </div>
								</div>

							</div>
							<br>
							<br>
							</hr>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php $this->load->view('erm_form/Penunjang/view_tindakan_obat'); ?>

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
				"sSearch": "Pencarian : ",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext": "Selanjutnya",
					"sLast": "Terakhir"
				},

			},
			"ajax": '<?php echo base_url('Homecare/Data_MCU'); ?>',
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
		cara_bayar = $("#inCaraBayar").val();
		no_hp = $("#inOccupation").val();
		layanan = $("#inLayanan").val();
		var radios = document.getElementsByName("sex");
		for (var i = 0, length = radios.length; i < length; i++) {
			if (radios[i].checked) {
				sex = radios[i].value;
			}
		}

		$.ajax({
			url: "<?= base_url() . 'Homecare/insert_pasien' ?>",
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
				cara_bayar: cara_bayar,
				layanan: layanan,
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

	function insert_ObatR() {
		id_pelayanan = $('#inPelObat').val();
		a = $("#inObatRuang").val();
		splitDiag = a.split("|");
		margin = parseFloat(splitDiag[2]);
		ket = $("#inKeteranganObatR").val();
		id_list_tindakan = splitDiag[0];
		ppn = parseFloat(splitDiag[1]) * (parseFloat(splitDiag[5]) / 100);
		harga = parseFloat(splitDiag[1]) + ppn;
		hargaMargin = harga * parseFloat(splitDiag[2]);

		frek = parseFloat($("#inJumlahObatR").val());
		disc = parseFloat($("#inDiscR").val());
		expire = (splitDiag[3]);
		jumlahKurang = frek * -1;


		total = hargaMargin * frek * (1 - (disc * 0.01));

		signa = $('#inSigna').val();
		cara_pakai = $('#inCaraPakai').val();

		$.ajax({
			url: "<?= base_url() . 'Homecare/insert_obatR' ?>",
			method: "POST",
			dataType: 'json',
			cache: false,
			data: {
				id_pelayanan: id_pelayanan,
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

					$('#tableobatR').DataTable().ajax.reload();
					$('#outTotalHarga1').DataTable().ajax.reload();
					// reload_data_totalR(id_pelayanan);
					$('#inObatR').val('-').change();
					$('#inTglExpR').empty().trigger('change');
					$("#inJumlahObatR").val('1');
					$("#inDiscR").val(0);
					$("#outBiayaTindakanObatR").val('');
					$("#outBiayaMarginObatR").val('');
					$("#outStokR").val('0');
					$("#outTotalObatR").val('');
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

	function setHarga1() {

		// caraBayar = $('#cara_bayar').val();

		obat = $('#inObatRuang').val();
		splitDiag = obat.split("|");
		stok = (splitDiag[4]);

		$("#outStokR").val(stok);

		ppn = parseFloat(splitDiag[1]) * (parseFloat(splitDiag[5]) / 100);
		harga = parseFloat(splitDiag[1]) + ppn;
		hargaMargin = harga * parseFloat(splitDiag[2]);
		$("#outBiayaTindakanObatR").val(convertToRupiah(harga.toFixed(0)));
		$("#outBiayaMarginObatR").val(convertToRupiah(hargaMargin.toFixed(0)));

		frek = parseFloat($("#inJumlahObatR").val());
		if (frek > stok) {
			$("#inJumlahObatR").val(stok);
		} else if (frek < 0) {
			$("#inJumlahObatR").val(1);
		}


		disc = parseFloat($("#inDiscR").val());

		// if (document.getElementById('inRadioCost').checked) {
		//     total = harga * frek * (1 - (disc * 0.01));
		// } else {
		total = hargaMargin * frek * (1 - (disc * 0.01));
		// }

		$("#outTotalObatR").val(convertToRupiah(total.toFixed(0)));

	}
	$('#inObatRuang').change(function() {
		obat = $('#inObatRuang').val();
		splitDiag = obat.split("|");
		tgl = splitDiag[3];
		$('#inTglExpR').val(tgl);
		stok = splitDiag[4];
		$("#outStokR").val(stok);
	});

	function reload_data_obatR(id_resep) {
		$('#tableobatR').dataTable().fnClearTable();
		$('#tableobatR').dataTable().fnDestroy();
		$('#tableobatR').DataTable({
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
				"url": '<?php echo base_url('Homecare/tampil_obat1'); ?>',
				"type": 'POST',
				"data": {
					id_pelayanan: id_resep,
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

	function hapus_obat1(id) {
		swal({
			title: "Apakah kamu yakin?",
			text: "Menghapus obat ini?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Homecare/hapus_obat",
					method: "POST",
					dataType: 'json',
					data: {
						id: id,
					},
					success: function(data) {
						if (data.status == "success") {
							$('#tableobatR').DataTable().ajax.reload();
							$('#outTotalHarga1').DataTable().ajax.reload();

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

	function reload_data_total1(id_pelayanan) {
		$('#outTotalHarga1').dataTable().fnClearTable();
		$('#outTotalHarga1').dataTable().fnDestroy();
		$('#outTotalHarga1').DataTable({
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
				"url": '<?php echo base_url('Homecare/tampil_list_total_obat'); ?>',
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

	function insert_mcu() {
		a = $("#inTindakanMcu").val();
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]);
		frek = parseFloat($("#inJumlahMcu").val());
		nama_dokter = $("#inDPJP").val();
		total = harga * frek;
		id_list_tindakan = splitDiag[0];
		nama = $('#nama').val();
		perawat = $('#inPerawat').val();
		// nama_dokter = $('#inNamaDokter').val();
		// nama_dokter = $.trim($("#inDPJP").children("option:selected").text());
		id_mcu = $('#id_mcu').val();

		$.ajax({
			url: "<?= base_url() . 'Homecare/insert_mcu' ?>",
			method: "POST",
			dataType: 'json',
			cache: true,
			data: {
				nama: nama,
				harga: harga,
				id_list_tindakan: id_list_tindakan,
				total: total,
				id_mcu: id_mcu,
				frek: frek,
				perawat: perawat,
				nama_dokter: nama_dokter
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
					$('#jasaTransport').val('');
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

	function reload_data_tindakan(id_mcu) {
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
				"url": '<?php echo base_url('Homecare/tampil_list'); ?>',
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

	// function pilihTindakanMcu() {
	// 	a = $("#inTindakanMcu").val();
	// 	splitDiag = a.split("|");

	// 	harga = parseFloat(splitDiag[1]);
	// 	$("#outBiayaTindakanMcu").val(convertToRupiah(harga));
	// 	document.getElementById("inJumlahMcu").value = "1";
	// 	document.getElementById("outTotalMcu").value = convertToRupiah(harga);
	// }

	function pilihTindakanMcu() {
		var a = $("#inTindakanMcu").val();
		var splitDiag = a.split("|");

		// Ambil harga total dari kolom biaya
		var totalHarga = parseFloat(splitDiag[1]); // Harga dari biaya_sarana + jasa_transport
		var jasaTransport = parseFloat(splitDiag[2]); // Ambil nilai jasa_transport dari bagian ketiga

		// Isi field sesuai dengan nilai yang diambil
		$("#outBiayaTindakanMcu").val(convertToRupiah(totalHarga));
		$("#jasaTransport").val(convertToRupiah(jasaTransport)); // Isi nilai ke input Jasa Dokter

		document.getElementById("inJumlahMcu").value = "1";
		document.getElementById("outTotalMcu").value = convertToRupiah(totalHarga);
	}


	function reload_total_mcu(id_mcu) {
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
				"url": '<?php echo base_url('Homecare/tampil_total_mcu'); ?>',
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

	function edit_mcu(id_mcu) {
		$("#modal_tindakan").modal('show');
		$('#id_mcu').val(id_mcu);
		reload_data_tindakan(id_mcu);
		reload_total_mcu(id_mcu);
	}

	function hapus_mcu(id_tindakan_mcu, id_mcu, nama) {
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
					url: "<?php echo base_url() ?>Homecare/hapus_data_mcu",
					method: "POST",
					dataType: 'json',
					data: {
						id_tindakan_mcu: id_tindakan_mcu,
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
					url: "<?php echo base_url() ?>Homecare/hapus_mcu",
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
		splitDiag = harga.split("|");
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
			url: "<?= base_url() . 'Homecare/insert_req_kasir' ?>",
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
		$('#inPelResep').val(id);
		$('#inHisResep').val(id);
		$('#inDepo1').val('APOTIK').change();
		$("#modal_edit_resep").modal('show');
		$("#collap_nonracikan").collapse('hide');
		$("#collap_racikan").collapse('hide');
		reload_data_resep(id, id);
	}



	function edit_obat1(id) {
		$('#inPelObat').val(id);
		// $('#inHisResep').val(id);
		$("#modal_obat_ruang").modal('show');

		reload_data_obatR(id);
		reload_data_total1(id);
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

			foreach ($signaobat as $row) {


				echo ",'" .  $row["tindakan"] . "'";
			}  ?>
		];
		var states1 = [
			<?php

			foreach ($cara_pemakaian_obat_biasa as $row) {


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