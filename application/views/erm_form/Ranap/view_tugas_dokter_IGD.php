<<<<<<< HEAD
<!-- Row -->
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h2 class="panel-title txt-dark"><strong>FORMULIR PELAKSANAAN TUGAS DOKTER PENANGGUNG JAWAB
							PELAYANAN UNIT GAWAT DARURAT</strong></h2>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<div class="table-responsive">
							<h4 class="panel-title txt-dark"><b><strong>1. DATA PRIBADI</strong></b></h4>
							<div class="row mt-20">
								<div class="col-md-6" style="margin-top:5px;">
									<input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPelayanan">
									<input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHistory">
									<div class="form-group">
										<label class="control-label col-md-3 pt-5">Tanggal</label>
										<div class="col-md-6 has-success">
											<input type="text" class="form-control" id="tgl_input" disabled="" value="<?php setlocale(LC_ALL, 'id_ID');
																														date_default_timezone_set('Asia/Jakarta');
																														$time = strtotime($tgl_input);
																														$date = strftime(" %d %B %Y ", $time);
																														echo $date ?>">
											<input type="hidden" id="tgl_input">

										</div>
									</div>
								</div>

								<div class="col-md-6" style="margin-top:5px;">
									<div class="form-group">
										<label class="control-label col-md-3 pt-5">No. RM</label>
										<div class="col-md-6 has-success">
											<input type="text" class="form-control" id="inbadge" disabled="" value="<?= $no_rm ?>" id="inNoRM">
											<p id="badgeno" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6" style="margin-top:5px;">
									<div class="form-group">
										<label class="control-label col-md-3 pt-5">Pukul Konsul</label>
										<div class="col-md-6 has-success">
											<input type="text" class="form-control" id="jam_konsul" disabled="" value="<?php
																														setlocale(LC_ALL, 'id_ID');

																														date_default_timezone_set('Asia/Jakarta');
																														$time = strtotime($tgl_input);
																														$date = strftime(" %d %B %Y ", $time);
																														$waktu = strftime("%H:%M WIB", $time);
																														echo $waktu ?>">
											<input type="hidden" id="result_sex">
										</div>
									</div>
								</div>

								<div class="col-md-6" style="margin-top:5px;">
									<div class="form-group">
										<label class="control-label col-md-3 pt-5">Nama Pasien</label>
										<div class="col-md-6 has-success">
											<input type="text" class="form-control" id="result_blood" disabled="" value="<?= $nama ?>" <p id="resultblood"=="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6" style="margin-top:5px;">
									<div class="form-group">
										<label class="control-label col-md-3 pt-5">Jenis Kelamin</label>
										<div class="col-md-6 has-success">
											<input type="text" class="form-control" id="jenis_kelamin" disabled="" value="<?= $jenis_kelamin ?>">
											<input type="hidden" id="result_sex">
										</div>
									</div>
								</div>

								<div class="col-md-6" style="margin-top:5px;">
									<div class="form-group">
										<label class="control-label col-md-3 pt-5">Tanggal lahir</label>
										<div class="col-md-6 has-success">
											<input type="text" class="form-control" id="inName" disabled="" value="<?= $tgl_lahir ?>" <p id="namefull" style="font-size:12px; margin-top:5px;"></p>
											<input type="hidden" id="intanggalinput" value="<?php echo date('Y-m-d H:i:s'); ?>">
										</div>
									</div>
								</div>

								<div class="col-md-6" style="margin-top:5px;">
									<div class="form-group">
										<label class="control-label col-md-3 pt-5">Nama Dokter</label>
										<div class="col-md-6 has-success">
											<input type="text" class="form-control" id="inOccupation" disabled="" value="<?= $dokter ?>" <p id="occupation" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

							</div>
							<br>
							<br>
							<table class="table display product-overview mb-30" id="support_table">
								<thead>
									<tr>
										<th width="10px">No</th>
										<th width="500px">
											<center>Pertanyaan</center>
										</th>
										<th width="100px">
											<center>Ya</center>
										</th>
										<th width="100px">
											<center>Tidak</center>
										</th>
										<th>
											<center>Keterangan</center>
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>PENJELASAN PENYAKIT
										</td>
										<td>
											<center>
												<input type="radio" name="pen_sakit" id="rad33" value="Ya" class="rad33" />
											</center>
										</td>
										<td>
											<center>
												<input type="radio" name="pen_sakit" id="rad33" value="Tidak" class="rad33" />
											</center>
										</td>
										<td>
											<textarea rows="4" cols="80" id="rad33" name="ket_sakit"></textarea>
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td>DIAGNOSA SEMENTARA UGD
										</td>
										<td>
											<center>
												<input type="radio" name="diag_ugd" id="rad34" value="Ya" class="rad34" />
											</center>
										</td>
										<td>
											<center>
												<input type="radio" name="diag_ugd" id="rad34" value="Tidak" class="rad34" />
											</center>
										</td>
										<td>
											<textarea rows="4" cols="80" id="rad34" name="ket_diag"></textarea>
						</div>
						</td>
						</tr>
						<tr>
							<td>3</td>
							<td>PEMERIKSAAN PENUNJANG YANG DILAKUKAN
							</td>
							<td>
								<center>
									<input type="radio" name="pem_penunjangan" id="rad36" value="Ya" class="rad36" />
								</center>
							</td>
							<td>
								<center>
									<input type="radio" name="pem_penunjangan" id="rad36" value="Tidak" class="rad36" />
								</center>
							</td>
							<td>
								<textarea rows="4" cols="80" id="rad36" name="ket_penunjang"></textarea>
					</div>
					</td>
					</tr>
					<tr>
						<td>4</td>
						<td>PENGOBATAN / TERAPI SEMENTARA
						</td>
						<td>
							<center>
								<input type="radio" name="obat_terapi" id="rad37" value="Ya" class="rad37" />
							</center>
						</td>
						<td>
							<center>
								<input type="radio" name="obat_terapi" id="rad37" value="Tidak" class="rad37" />
							</center>
						</td>
						<td>
							<textarea rows="4" cols="80" id="rad37" name="ket_terapi"></textarea>
				</div>
				</td>
				</tr>
				<tr>
					<td>5</td>
					<td>TINDAK LANJUT:</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td>KONSUL SPESIALIS
					</td>
					<td>
						<center>
							<input type="radio" name="konsul_spesialis" id="rad3" value="Ya" class="rad3" />
						</center>
					</td>
					<td>
						<center>
							<input type="radio" name="konsul_spesialis" id="rad3" value="Tidak" class="rad3" />
						</center>
					</td>
					<td>
						<textarea rows="4" cols="80" id="rad3" name="ket_konsul"></textarea>
			</div>
			</td>
			</tr>
			<tr>
				<td></td>
				<td>DIRAWAT
				</td>
				<td>
					<center>
						<input type="radio" name="dirawat" id="rad4" value="Ya" class="rad4" />
					</center>
				</td>
				<td>
					<center>
						<input type="radio" name="dirawat" id="rad4" value="Tidak" class="rad4" />
					</center>
				</td>
				<td>
					<textarea rows="4" cols="80" id="rad4" name="ket_dirawat"></textarea>
		</div>
		</td>
		</tr>

		</tbody>
		</table>

		<div class="col-md-12">
			<label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
		</div>
		<div class="form-group">
			<div class="col-md-4">
				<label class="control-label">Yang menyatakan</label>
				<div class="row">
					<button data-toggle="modal" data-target="#modal_ttd" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN</span></button>
					<button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
					<canvas id="can" width="300" height="300" style="display: none;"></canvas>
					<div class="form-group">
						<div class="modal fade" id="modal_ttd" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="newPeternakModallabel">TANDA TANGAN</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>

									<div class="modal-body">
										<div class="form-group row" style="margin-left: 30px;">

											<div class="row">
												<div class="col-md-12">
													<canvas id="ttd" width="300" height="300">
													</canvas>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
													<button class="btn btn-default" id="sig-clearBtn1">Clear Signature</button>
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
</div>
</div>
</div>

<div class="modal-footer mb-5 mr-5 mt-10">

	<button onclick="insertData()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
	<button style="display: none;" id="cetak" type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
	<hr>
</div>

<style>
	td {
		color: black;
	}
</style>

<?php $this->load->view('assets/signature2') ?>
<style>
	canvas {
		cursor: crosshair;
		border: 1px solid #000000;
	}
</style>

<!--<script type="text/javascript">
								$(function () {
									$(":radio.rad3").click(function () {
										if ($("[name='konsul_spesialis']:checked").val() == "Ya") {
											$("#text3").show();
										} else {
											$("#text3").hide();
										}
									});
								});
								$(function () {
									$(":radio.rad4").click(function () {
										if ($("[name='dirawat']:checked").val() == "Ya") {
											$("#text4").show();
										} else {
											$("#text4").hide();
										}
									});
								});
								$(function () {
									$(":radio.rad33").click(function () {
										if ($("[name='pen_sakit']:checked").val() == "Ya") {
											$("#text33").show();
										} else {
											$("#text33").hide();
										}
									});
								});
								$(function () {
									$(":radio.rad34").click(function () {
										if ($("[name='diag_ugd']:checked").val() == "Ya") {
											$("#text34").show();
										} else {
											$("#text34").hide();
										}
									});
								});
								$(function () {
									$(":radio.rad36").click(function () {
										if ($("[name='pem_penunjangan']:checked").val() == "Ya") {
											$("#text36").show();
										} else {
											$("#text36").hide();
										}
									});
								});
								$(function () {
									$(":radio.rad37").click(function () {
										if ($("[name='obat_terapi']:checked").val() == "Ya") {
											$("#text37").show();
										} else {
											$("#text37").hide();
										}
									});
								});
							</script> -->

<script type="text/javascript">
	function insertData() {
		var sakit_pen = "";
		var ugd_diag = "";
		var penunjangan_pem = "";
		var terapi_obat = "";
		var spesialis_konsul = "";
		var rawatdi = "";
		var sakit_ket = "";
		var diag_ket = "";
		var penunjang_ket = "";
		var terapi_ket = "";
		var konsul_ket = "";
		var dirawat_ket = "";

		id_pelayanan = $('#inPelayanan').val();
		id_history = $('#inHistory').val();
		pen_sakit = $("[name='pen_sakit']:checked").val();
		diag_ugd = $("[name='diag_ugd']:checked").val();
		pem_penunjangan = $("[name='pem_penunjangan']:checked").val();
		obat_terapi = $("[name='obat_terapi']:checked").val();
		konsul_spesialis = $("[name='konsul_spesialis']:checked").val();
		dirawat = $("[name='dirawat']:checked").val();
		ket_sakit = $("[name='ket_sakit']").val();
		ket_diag = $("[name='ket_diag']").val();
		ket_penunjang = $("[name='ket_penunjang']").val();
		ket_terapi = $("[name='ket_terapi']").val();
		ket_konsul = $("[name='ket_konsul']").val();
		ket_dirawat = $("[name='ket_dirawat']").val();
		canvas = document.getElementById('can');
		gambar = canvas.toDataURL("image/png");

		id_pel = "<?php echo urlencode(base64_encode($id_pelayanan)); ?>";
		id_his = "<?php echo urlencode(base64_encode($id_history)); ?>";

		// canvas = document.getElementById('can');
		// ttd = canvas.toDataURL("image/png");


		swal({
			title: "Apakah kamu yakin ingin !",
			text: "Menyimpan Data  ini ?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Erm_pelaksanaan_tugas_dokter/simpan_form_tugas_dokter",
					method: "POST",
					dataType: 'json',
					data: {
						id_pelayanan: id_pelayanan,
						id_history: id_history,
						pen_sakit: pen_sakit,
						diag_ugd: diag_ugd,
						pem_penunjangan: pem_penunjangan,
						obat_terapi: obat_terapi,
						konsul_spesialis: konsul_spesialis,
						dirawat: dirawat,
						ket_sakit: ket_sakit,
						ket_diag: ket_diag,
						ket_penunjang: ket_penunjang,
						ket_terapi: ket_terapi,
						ket_konsul: ket_konsul,
						ket_dirawat: ket_dirawat,
						gambar : gambar,

					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Data Berhasil dinput",
								confirmButtonColor: "#3cb878",
							});
							window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pel + '/' + id_his;

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

	function cetak() {
		id = $('#inPelayanan').val();
    window.location.href = "<?php echo base_url('Erm_igd_edit/print_tugas_dokter/') ?>" + id;
  }
</script>


</body>

=======
<!-- Row -->
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h2 class="panel-title txt-dark"><strong>FORMULIR PELAKSANAAN TUGAS DOKTER PENANGGUNG JAWAB
							PELAYANAN UNIT GAWAT DARURAT</strong></h2>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<div class="table-responsive">
							<h4 class="panel-title txt-dark"><b><strong>1. DATA PRIBADI</strong></b></h4>
							<div class="row mt-20">
								<div class="col-md-6" style="margin-top:5px;">
									<input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPelayanan">
									<input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHistory">
									<div class="form-group">
										<label class="control-label col-md-3 pt-5">Tanggal</label>
										<div class="col-md-6 has-success">
											<input type="text" class="form-control" id="tgl_input" disabled="" value="<?php setlocale(LC_ALL, 'id_ID');
																														date_default_timezone_set('Asia/Jakarta');
																														$time = strtotime($tgl_input);
																														$date = strftime(" %d %B %Y ", $time);
																														echo $date ?>">
											<input type="hidden" id="tgl_input">

										</div>
									</div>
								</div>

								<div class="col-md-6" style="margin-top:5px;">
									<div class="form-group">
										<label class="control-label col-md-3 pt-5">No. RM</label>
										<div class="col-md-6 has-success">
											<input type="text" class="form-control" id="inbadge" disabled="" value="<?= $no_rm ?>" id="inNoRM">
											<p id="badgeno" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6" style="margin-top:5px;">
									<div class="form-group">
										<label class="control-label col-md-3 pt-5">Pukul Konsul</label>
										<div class="col-md-6 has-success">
											<input type="text" class="form-control" id="jam_konsul" disabled="" value="<?php
																														setlocale(LC_ALL, 'id_ID');

																														date_default_timezone_set('Asia/Jakarta');
																														$time = strtotime($tgl_input);
																														$date = strftime(" %d %B %Y ", $time);
																														$waktu = strftime("%H:%M WIB", $time);
																														echo $waktu ?>">
											<input type="hidden" id="result_sex">
										</div>
									</div>
								</div>

								<div class="col-md-6" style="margin-top:5px;">
									<div class="form-group">
										<label class="control-label col-md-3 pt-5">Nama Pasien</label>
										<div class="col-md-6 has-success">
											<input type="text" class="form-control" id="result_blood" disabled="" value="<?= $nama ?>" <p id="resultblood"=="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

								<div class="col-md-6" style="margin-top:5px;">
									<div class="form-group">
										<label class="control-label col-md-3 pt-5">Jenis Kelamin</label>
										<div class="col-md-6 has-success">
											<input type="text" class="form-control" id="jenis_kelamin" disabled="" value="<?= $jenis_kelamin ?>">
											<input type="hidden" id="result_sex">
										</div>
									</div>
								</div>

								<div class="col-md-6" style="margin-top:5px;">
									<div class="form-group">
										<label class="control-label col-md-3 pt-5">Tanggal lahir</label>
										<div class="col-md-6 has-success">
											<input type="text" class="form-control" id="inName" disabled="" value="<?= $tgl_lahir ?>" <p id="namefull" style="font-size:12px; margin-top:5px;"></p>
											<input type="hidden" id="intanggalinput" value="<?php echo date('Y-m-d H:i:s'); ?>">
										</div>
									</div>
								</div>

								<div class="col-md-6" style="margin-top:5px;">
									<div class="form-group">
										<label class="control-label col-md-3 pt-5">Nama Dokter</label>
										<div class="col-md-6 has-success">
											<input type="text" class="form-control" id="inOccupation" disabled="" value="<?= $dokter ?>" <p id="occupation" style="font-size:12px; margin-top:5px;"></p>
										</div>
									</div>
								</div>

							</div>
							<br>
							<br>
							<table class="table display product-overview mb-30" id="support_table">
								<thead>
									<tr>
										<th width="10px">No</th>
										<th width="500px">
											<center>Pertanyaan</center>
										</th>
										<th width="100px">
											<center>Ya</center>
										</th>
										<th width="100px">
											<center>Tidak</center>
										</th>
										<th>
											<center>Keterangan</center>
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>PENJELASAN PENYAKIT
										</td>
										<td>
											<center>
												<input type="radio" name="pen_sakit" id="rad33" value="Ya" class="rad33" />
											</center>
										</td>
										<td>
											<center>
												<input type="radio" name="pen_sakit" id="rad33" value="Tidak" class="rad33" />
											</center>
										</td>
										<td>
											<textarea rows="4" cols="80" id="rad33" name="ket_sakit"></textarea>
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td>DIAGNOSA SEMENTARA UGD
										</td>
										<td>
											<center>
												<input type="radio" name="diag_ugd" id="rad34" value="Ya" class="rad34" />
											</center>
										</td>
										<td>
											<center>
												<input type="radio" name="diag_ugd" id="rad34" value="Tidak" class="rad34" />
											</center>
										</td>
										<td>
											<textarea rows="4" cols="80" id="rad34" name="ket_diag"></textarea>
						</div>
						</td>
						</tr>
						<tr>
							<td>3</td>
							<td>PEMERIKSAAN PENUNJANG YANG DILAKUKAN
							</td>
							<td>
								<center>
									<input type="radio" name="pem_penunjangan" id="rad36" value="Ya" class="rad36" />
								</center>
							</td>
							<td>
								<center>
									<input type="radio" name="pem_penunjangan" id="rad36" value="Tidak" class="rad36" />
								</center>
							</td>
							<td>
								<textarea rows="4" cols="80" id="rad36" name="ket_penunjang"></textarea>
					</div>
					</td>
					</tr>
					<tr>
						<td>4</td>
						<td>PENGOBATAN / TERAPI SEMENTARA
						</td>
						<td>
							<center>
								<input type="radio" name="obat_terapi" id="rad37" value="Ya" class="rad37" />
							</center>
						</td>
						<td>
							<center>
								<input type="radio" name="obat_terapi" id="rad37" value="Tidak" class="rad37" />
							</center>
						</td>
						<td>
							<textarea rows="4" cols="80" id="rad37" name="ket_terapi"></textarea>
				</div>
				</td>
				</tr>
				<tr>
					<td>5</td>
					<td>TINDAK LANJUT:</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td>KONSUL SPESIALIS
					</td>
					<td>
						<center>
							<input type="radio" name="konsul_spesialis" id="rad3" value="Ya" class="rad3" />
						</center>
					</td>
					<td>
						<center>
							<input type="radio" name="konsul_spesialis" id="rad3" value="Tidak" class="rad3" />
						</center>
					</td>
					<td>
						<textarea rows="4" cols="80" id="rad3" name="ket_konsul"></textarea>
			</div>
			</td>
			</tr>
			<tr>
				<td></td>
				<td>DIRAWAT
				</td>
				<td>
					<center>
						<input type="radio" name="dirawat" id="rad4" value="Ya" class="rad4" />
					</center>
				</td>
				<td>
					<center>
						<input type="radio" name="dirawat" id="rad4" value="Tidak" class="rad4" />
					</center>
				</td>
				<td>
					<textarea rows="4" cols="80" id="rad4" name="ket_dirawat"></textarea>
		</div>
		</td>
		</tr>

		</tbody>
		</table>

		<div class="col-md-12">
			<label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
		</div>
		<div class="form-group">
			<div class="col-md-4">
				<label class="control-label">Yang menyatakan</label>
				<div class="row">
					<button data-toggle="modal" data-target="#modal_ttd" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN</span></button>
					<button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
					<canvas id="can" width="300" height="300" style="display: none;"></canvas>
					<div class="form-group">
						<div class="modal fade" id="modal_ttd" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="newPeternakModallabel">TANDA TANGAN</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>

									<div class="modal-body">
										<div class="form-group row" style="margin-left: 30px;">

											<div class="row">
												<div class="col-md-12">
													<canvas id="ttd" width="300" height="300">
													</canvas>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
													<button class="btn btn-default" id="sig-clearBtn1">Clear Signature</button>
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
</div>
</div>
</div>

<div class="modal-footer mb-5 mr-5 mt-10">

	<button onclick="insertData()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
	<button style="display: none;" id="cetak" type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
	<hr>
</div>

<style>
	td {
		color: black;
	}
</style>

<?php $this->load->view('assets/signature2') ?>
<style>
	canvas {
		cursor: crosshair;
		border: 1px solid #000000;
	}
</style>

<!--<script type="text/javascript">
								$(function () {
									$(":radio.rad3").click(function () {
										if ($("[name='konsul_spesialis']:checked").val() == "Ya") {
											$("#text3").show();
										} else {
											$("#text3").hide();
										}
									});
								});
								$(function () {
									$(":radio.rad4").click(function () {
										if ($("[name='dirawat']:checked").val() == "Ya") {
											$("#text4").show();
										} else {
											$("#text4").hide();
										}
									});
								});
								$(function () {
									$(":radio.rad33").click(function () {
										if ($("[name='pen_sakit']:checked").val() == "Ya") {
											$("#text33").show();
										} else {
											$("#text33").hide();
										}
									});
								});
								$(function () {
									$(":radio.rad34").click(function () {
										if ($("[name='diag_ugd']:checked").val() == "Ya") {
											$("#text34").show();
										} else {
											$("#text34").hide();
										}
									});
								});
								$(function () {
									$(":radio.rad36").click(function () {
										if ($("[name='pem_penunjangan']:checked").val() == "Ya") {
											$("#text36").show();
										} else {
											$("#text36").hide();
										}
									});
								});
								$(function () {
									$(":radio.rad37").click(function () {
										if ($("[name='obat_terapi']:checked").val() == "Ya") {
											$("#text37").show();
										} else {
											$("#text37").hide();
										}
									});
								});
							</script> -->

<script type="text/javascript">
	function insertData() {
		var sakit_pen = "";
		var ugd_diag = "";
		var penunjangan_pem = "";
		var terapi_obat = "";
		var spesialis_konsul = "";
		var rawatdi = "";
		var sakit_ket = "";
		var diag_ket = "";
		var penunjang_ket = "";
		var terapi_ket = "";
		var konsul_ket = "";
		var dirawat_ket = "";

		id_pelayanan = $('#inPelayanan').val();
		id_history = $('#inHistory').val();
		pen_sakit = $("[name='pen_sakit']:checked").val();
		diag_ugd = $("[name='diag_ugd']:checked").val();
		pem_penunjangan = $("[name='pem_penunjangan']:checked").val();
		obat_terapi = $("[name='obat_terapi']:checked").val();
		konsul_spesialis = $("[name='konsul_spesialis']:checked").val();
		dirawat = $("[name='dirawat']:checked").val();
		ket_sakit = $("[name='ket_sakit']").val();
		ket_diag = $("[name='ket_diag']").val();
		ket_penunjang = $("[name='ket_penunjang']").val();
		ket_terapi = $("[name='ket_terapi']").val();
		ket_konsul = $("[name='ket_konsul']").val();
		ket_dirawat = $("[name='ket_dirawat']").val();
		canvas = document.getElementById('can');
		gambar = canvas.toDataURL("image/png");

		id_pel = "<?php echo urlencode(base64_encode($id_pelayanan)); ?>";
		id_his = "<?php echo urlencode(base64_encode($id_history)); ?>";

		// canvas = document.getElementById('can');
		// ttd = canvas.toDataURL("image/png");


		swal({
			title: "Apakah kamu yakin ingin !",
			text: "Menyimpan Data  ini ?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Erm_pelaksanaan_tugas_dokter/simpan_form_tugas_dokter",
					method: "POST",
					dataType: 'json',
					data: {
						id_pelayanan: id_pelayanan,
						id_history: id_history,
						pen_sakit: pen_sakit,
						diag_ugd: diag_ugd,
						pem_penunjangan: pem_penunjangan,
						obat_terapi: obat_terapi,
						konsul_spesialis: konsul_spesialis,
						dirawat: dirawat,
						ket_sakit: ket_sakit,
						ket_diag: ket_diag,
						ket_penunjang: ket_penunjang,
						ket_terapi: ket_terapi,
						ket_konsul: ket_konsul,
						ket_dirawat: ket_dirawat,
						gambar : gambar,

					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Data Berhasil dinput",
								confirmButtonColor: "#3cb878",
							});
							window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pel + '/' + id_his;

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

	function cetak() {
		id = $('#inPelayanan').val();
    window.location.href = "<?php echo base_url('Erm_igd_edit/print_tugas_dokter/') ?>" + id;
  }
</script>


</body>

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</html>