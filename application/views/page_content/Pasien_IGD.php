<<<<<<< HEAD
<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>
<div class="panel panel-default card-view mt-20 ">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">DAFTAR PASIEN IGD</span></h6>
		</div>

		<div class="clearfix"></div>
	</div>
	<h6 class="panel-title txt-dark mt-10"><?= $this->session->flashdata('alert'); ?></h6>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="table-wrap">
				<div class="table-responsive">
					<table id="datable" class="table table-hover display pb-30">
						<thead>
							<tr class="bg-success">
								<th>NO</th>
								<th>CETAK</th>
								<?php if ($izinAkses == "admin") { ?>
									<th>HAPUS</th>
								<?php } ?>
								<th>EDIT</th>
								<th>SEP</th>
								<th>NO RM</th>

								<th>NAMA PASIEN</th>
								<th>TANGGAL MASUK</th>
								<th>JAM MASUK</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>

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
								<?php if ($izinAkses == "admin") { ?>
									<th>HAPUS</th>
								<?php } ?>
								<th>EDIT</th>
								<th>SEP</th>
								<th>NO RM</th>

								<th>NAMA PASIEN</th>
								<th>TANGGAL MASUK</th>
								<th>JAM MASUK</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>

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
	<!-- modal edit data -->
	<div class="modal fade bs-example-modal-lg" id="modal_edit_data" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT KUNJUNGAN
					</h5>
				</div>

				<div class="modal-body">

					<div class="form-wrap">
						<!-- /formbody -->
						<div class="form-body">

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="help-block"></span>
										<label class="control-label col-md-3">TIPE MASUK</label>
										<div class="col-md-9 has-success" id="the-basics">
											<select class="form-control filled-input select2" placeholder="Choose a Category" id="tipe_masuk" name="inTipeMasuk" disabled>
												<option class="active">-</option>
												<?php

												foreach ($tipe_masuk as $row) {

												?>
													<option value="<?php echo $row['id_tipe_masuk']; ?>">
														<?php echo $row['nama_tipe_masuk']; ?></option>
												<?php }  ?>
											</select>
											<?php
											foreach ($data_pasien_rawat_jalan as $d) :
											?>
												<input type="hidden" class="form-control filled-input" id="NamaPasien" name="NamaPasien" value="<?php echo $d->nama; ?>">
											<?php endforeach ?>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">TANGGAL KUNJUNGAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control filled-input" placeholder="TANGGAL KUNJUNGAN" disabled="" id="inTanggalKunjugan" name="TanggalKunjugan">
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

											<select class="form-control filled-input select2" placeholder="PILIH NAMA DOKTER" style="border: 1px solid lightgreen;" id="inDPJP" name="namaDPJP">
												<?php
												foreach ($data_dokter as $row) :
												?>
													<option value="<?php echo $row['id_dokter'] ?>">
														<?php echo $row['nama'] ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">JENIS KLAIM</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="PILIH JENIS KLAIM" style="border: 1px solid lightgreen;" id="inCaraBayar" name="CaraBayar">

												<?php
												foreach ($data_cara_bayar as $row) :
												?>
													<option value="<?php echo $row->id_cara_bayar; ?>">
														<?php echo $row->nama_bayar; ?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<br>
							<!-- /Row -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">ASAL PASIEN</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="PILIH KATEGORI" style="border: 1px solid lightgreen;" id="inAsalPasien" name="AsalPasien">
												<?php
												foreach ($data_asal_pasien as $row) :
												?>
													<option value="<?php echo $row->id_asal_pasien; ?>">
														<?php echo $row->nama_asal; ?></option>
												<?php endforeach; ?>
												>
											</select>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6" style="margin-top:-1em;">
									<div class="form-group">
										<span class="help-block"></span>
										<label class="control-label col-md-3 pt-10">DIAGNOSA</label>
										<div class="col-md-9 has-success" id="the-basics">
											<input class="typeahead form-control filled-input" type="text" placeholder="Diagnosa" id="inDiagnosa" name="inDiagnosa" style="width: 284.17px;">
											<input type="hidden" id="idPelayanan" name="idPelayanan">
											<input type="hidden" id="idHis" name="idHis">
											<!-- <input type="hidden" id="inTotal" name="inTotal"> -->
											<input type="hidden" id="inBiayaRS" name="inBiayaRS">
											<input type="hidden" id="inBiayaDok" name="inBiayaDok">
											<input type="hidden" id="inBiayaAdm" name="inBiayaAdm">
											<input type="hidden" id="inTipe" name="inTipe">
											<input type="hidden" id="jenis_pasien" name="jenis_pasien">

										</div>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
							<!-- /Row -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="help-block"></span>
										<label class="control-label col-md-3">NO SEP / SLIP</label>
										<div class="col-md-9 has-success">
											<input type="text" style="border: 1px solid lightgreen;" autocomplete="off" class="form-control filled-input" placeholder="NO SEP" name="NoSEP" id="inNoSEP">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<!--/span-->
								<!-- <div class="col-md-6">
									<div class="form-group">
										<span class="help-block"></span>

										<label class="control-label col-md-3">TOTAL BIAYA</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inTotal" name="inTotal">
										</div>
									</div>
								</div> -->
							</div>
						</div>
					</div>
					<div class="modal-footer mt-10">
						<button type="button" class="btn btn-default btn-anim  btn-sm" data-dismiss="modal"><i class="icon-rocket"></i><span class="btn-text">BATAL</span></button>
						<button onclick="edit_rawat_jalan()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>

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
	$('#inCaraBayar').change(function() {
		var cara_bayar = $('#inCaraBayar').val();
		dpjp = $('#inDPJP').val();
		var jenis_pasien = $('#jenis_pasien').val();
		$.ajax({
			url: "<?= base_url() . 'Pasien/get_dokter' ?>",
			data: {
				id_dokter: dpjp,
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				// alert(cara_bayar);
				if (cara_bayar == '30') { //bpjs
					if (jenis_pasien == 'baru') {
						$('#inBiayaAdm').val(10000);
						var c = 10000;
					} else {
						$('#inBiayaAdm').val(0);
						var c = 0;
					}
					$("#inBiayaRS").val(data.rs_bpjs);
					$('#inBiayaDok').val(data.jasmed_bpjs_pagi);

					var a = data.rs_bpjs;
					var b = data.jasmed_bpjs_pagi;
					var total = Number(a) + Number(b) + Number(c);
					$("#inTotal").val(total);
				} else if (cara_bayar == '42') { //pp
					if (jenis_pasien == 'baru') {
						$('#inBiayaAdm').val(10000);
						var c = 10000;
					} else {
						$('#inBiayaAdm').val(0);
						var c = 0;
					}
					$('#inBiayaDok').val(data.jasmed_pp_pagi);
					$("#inBiayaRS").val(data.rs_pp_pagi);

					var a = data.rs_pp_pagi;
					var b = data.jasmed_pp_pagi;
					var total = Number(a) + Number(b) + Number(c);
					$("#inTotal").val(total);
				}  else { //asuransi
					if (jenis_pasien == 'baru') {
						$('#inBiayaAdm').val(10000);
						var c = 10000;
					} else {
						$('#inBiayaAdm').val(0);
						var c = 0;
					}
				
					$("#inBiayaRS").val(data.rs_asuransi_pagi);
					$('#inBiayaDok').val(data.jasmed_asuransi_pagi);

					var a = data.rs_asuransi_pagi;
					var b = data.jasmed_asuransi_pagi;
					var total = Number(a) + Number(b) + Number(c);
					$("#inTotal").val(total);


				}
			}
		});


	});
</script>
<script type="text/javascript">
	function edit_data_kunjungan(id_pelayanan, id_history) {
		$.ajax({
			url: "<?= base_url() . 'Pasien/getddata_Igd' ?>",
			data: {
				pelayanan: id_pelayanan,
				history: id_history
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status_dt == "found") {
					//disini set datanya ke modal
					getPasienBaru(data.no_rm);
					$("#tipe_masuk").val('1').change();

					$("#inTanggalKunjugan").val(data.tgl_masuk);
					$("#idPelayanan").val(data.id_pelayanan);
					$("#idHis").val(data.id_history);
					$("#inNoSEP").val(data.no_sep);
					$("#inDiagnosa").val(data.diagnosa);
					$("#inDPJP").val(data.dpjp).change();
					$("#inNaPol").val(data.nama_poli).change();
					$("#NamaPasien").val(data.nama).change();
					$("#inAsalPasien").val(data.asal_pasien).change();
					$("#inCaraBayar").val(data.id_cara_bayar).change();
					$("#modal_edit_data").modal('show');
				} else {
					alert("data tidak ditemukan");
				}
			}
		});
	}

	function getPasienBaru(no_rm) {
		$.ajax({
			url: "<?php echo base_url(); ?>Pencarian_pasien/getPasienBaru",

			method: "POST",
			data: {
				id_pasien: no_rm,
			},
			dataType: 'json',
			success: function(data) {
				$("#jenis_pasien").val(data.status);
			}
		});

	}
</script>
<script type="text/javascript">
	function delete_rajal(id_history, tipe) {
		nama = $("#NamaPasien").val();
		swal({
			title: "Apakah kamu yakin akan !",
			text: "Menghapus data ini ?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Pasien/delete_pasien_Igd",
					method: "POST",
					dataType: 'json',
					data: {
						id_history: id_history,
						tipe: tipe,
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Pasien IGD Berhasil dihapus",
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
</script>

<script type="text/javascript">
	function edit_rawat_jalan() {
		tipe_masuk = $('#tipe_masuk').val();
		id_Layanan = $('#idPelayanan').val();
		id_History = $('#idHis').val();
		nama = $("#NamaPasien").val();
		nosep = $('#inNoSEP').val();
		carabayar = $('#inCaraBayar').val();
		Asalpasien = $('#inAsalPasien').val();
		diagnosa = $('#inDiagnosa').val();
		dpjp = $('#inDPJP').val();
		NaPol = $('#inNaPol').val();
		biaya_jasa = $('#inBiayaDok').val();
		biaya_rs = $('#inBiayaRS').val();
		biaya_admin = $('#inBiayaAdm').val();
		swal({
			title: "Apakah kamu yakin ingin !",
			text: "Mengubah Data " + nama + " ini?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Pasien/edit_Igd",
					method: "POST",
					dataType: 'json',
					data: {
						idPelayanan: id_Layanan,
						idHis: id_History,
						NoSEP: nosep,
						CaraBayar: carabayar,
						AsalPasien: Asalpasien,
						Diagnosa: diagnosa,
						namaDPJP: dpjp,
						NamaPoli: NaPol,
						tipe_masuk: tipe_masuk,
						biaya_jasa: biaya_jasa,
						biaya_rs: biaya_rs,
						biaya_admin: biaya_admin
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Pasien Rawat Jalan dengan Nama " + nama + " Telah diubah",
								confirmButtonColor: "#3cb878",
							});
							nosep = $('#inNoSEP').val(nosep);
							$("#modal_edit_data").modal('hide');
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
			"ajax": '<?php echo base_url('Pasien/tampil_dataIgd'); ?>',
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

			foreach ($diagnosa as $row) {


				echo ",'" . $row["id_diagnosa"] . " | " . $row["nama_diagnosa"] . "'";
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



	});
=======
<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>
<div class="panel panel-default card-view mt-20 ">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">DAFTAR PASIEN IGD</span></h6>
		</div>

		<div class="clearfix"></div>
	</div>
	<h6 class="panel-title txt-dark mt-10"><?= $this->session->flashdata('alert'); ?></h6>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="table-wrap">
				<div class="table-responsive">
					<table id="datable" class="table table-hover display pb-30">
						<thead>
							<tr class="bg-success">
								<th>NO</th>
								<th>CETAK</th>
								<?php if ($izinAkses == "admin") { ?>
									<th>HAPUS</th>
								<?php } ?>
								<th>EDIT</th>
								<th>SEP</th>
								<th>NO RM</th>

								<th>NAMA PASIEN</th>
								<th>TANGGAL MASUK</th>
								<th>JAM MASUK</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>

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
								<?php if ($izinAkses == "admin") { ?>
									<th>HAPUS</th>
								<?php } ?>
								<th>EDIT</th>
								<th>SEP</th>
								<th>NO RM</th>

								<th>NAMA PASIEN</th>
								<th>TANGGAL MASUK</th>
								<th>JAM MASUK</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>

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
	<!-- modal edit data -->
	<div class="modal fade bs-example-modal-lg" id="modal_edit_data" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT KUNJUNGAN
					</h5>
				</div>

				<div class="modal-body">

					<div class="form-wrap">
						<!-- /formbody -->
						<div class="form-body">

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="help-block"></span>
										<label class="control-label col-md-3">TIPE MASUK</label>
										<div class="col-md-9 has-success" id="the-basics">
											<select class="form-control filled-input select2" placeholder="Choose a Category" id="tipe_masuk" name="inTipeMasuk" disabled>
												<option class="active">-</option>
												<?php

												foreach ($tipe_masuk as $row) {

												?>
													<option value="<?php echo $row['id_tipe_masuk']; ?>">
														<?php echo $row['nama_tipe_masuk']; ?></option>
												<?php }  ?>
											</select>
											<?php
											foreach ($data_pasien_rawat_jalan as $d) :
											?>
												<input type="hidden" class="form-control filled-input" id="NamaPasien" name="NamaPasien" value="<?php echo $d->nama; ?>">
											<?php endforeach ?>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">TANGGAL KUNJUNGAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control filled-input" placeholder="TANGGAL KUNJUNGAN" disabled="" id="inTanggalKunjugan" name="TanggalKunjugan">
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

											<select class="form-control filled-input select2" placeholder="PILIH NAMA DOKTER" style="border: 1px solid lightgreen;" id="inDPJP" name="namaDPJP">
												<?php
												foreach ($data_dokter as $row) :
												?>
													<option value="<?php echo $row['id_dokter'] ?>">
														<?php echo $row['nama'] ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">JENIS KLAIM</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="PILIH JENIS KLAIM" style="border: 1px solid lightgreen;" id="inCaraBayar" name="CaraBayar">

												<?php
												foreach ($data_cara_bayar as $row) :
												?>
													<option value="<?php echo $row->id_cara_bayar; ?>">
														<?php echo $row->nama_bayar; ?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<br>
							<!-- /Row -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">ASAL PASIEN</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="PILIH KATEGORI" style="border: 1px solid lightgreen;" id="inAsalPasien" name="AsalPasien">
												<?php
												foreach ($data_asal_pasien as $row) :
												?>
													<option value="<?php echo $row->id_asal_pasien; ?>">
														<?php echo $row->nama_asal; ?></option>
												<?php endforeach; ?>
												>
											</select>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6" style="margin-top:-1em;">
									<div class="form-group">
										<span class="help-block"></span>
										<label class="control-label col-md-3 pt-10">DIAGNOSA</label>
										<div class="col-md-9 has-success" id="the-basics">
											<input class="typeahead form-control filled-input" type="text" placeholder="Diagnosa" id="inDiagnosa" name="inDiagnosa" style="width: 284.17px;">
											<input type="hidden" id="idPelayanan" name="idPelayanan">
											<input type="hidden" id="idHis" name="idHis">
											<!-- <input type="hidden" id="inTotal" name="inTotal"> -->
											<input type="hidden" id="inBiayaRS" name="inBiayaRS">
											<input type="hidden" id="inBiayaDok" name="inBiayaDok">
											<input type="hidden" id="inBiayaAdm" name="inBiayaAdm">
											<input type="hidden" id="inTipe" name="inTipe">
											<input type="hidden" id="jenis_pasien" name="jenis_pasien">

										</div>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
							<!-- /Row -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="help-block"></span>
										<label class="control-label col-md-3">NO SEP / SLIP</label>
										<div class="col-md-9 has-success">
											<input type="text" style="border: 1px solid lightgreen;" autocomplete="off" class="form-control filled-input" placeholder="NO SEP" name="NoSEP" id="inNoSEP">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<!--/span-->
								<!-- <div class="col-md-6">
									<div class="form-group">
										<span class="help-block"></span>

										<label class="control-label col-md-3">TOTAL BIAYA</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control filled-input" placeholder="BIAYA" disabled="" id="inTotal" name="inTotal">
										</div>
									</div>
								</div> -->
							</div>
						</div>
					</div>
					<div class="modal-footer mt-10">
						<button type="button" class="btn btn-default btn-anim  btn-sm" data-dismiss="modal"><i class="icon-rocket"></i><span class="btn-text">BATAL</span></button>
						<button onclick="edit_rawat_jalan()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>

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
	$('#inCaraBayar').change(function() {
		var cara_bayar = $('#inCaraBayar').val();
		dpjp = $('#inDPJP').val();
		var jenis_pasien = $('#jenis_pasien').val();
		$.ajax({
			url: "<?= base_url() . 'Pasien/get_dokter' ?>",
			data: {
				id_dokter: dpjp,
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				// alert(cara_bayar);
				if (cara_bayar == '30') { //bpjs
					if (jenis_pasien == 'baru') {
						$('#inBiayaAdm').val(10000);
						var c = 10000;
					} else {
						$('#inBiayaAdm').val(0);
						var c = 0;
					}
					$("#inBiayaRS").val(data.rs_bpjs);
					$('#inBiayaDok').val(data.jasmed_bpjs_pagi);

					var a = data.rs_bpjs;
					var b = data.jasmed_bpjs_pagi;
					var total = Number(a) + Number(b) + Number(c);
					$("#inTotal").val(total);
				} else if (cara_bayar == '42') { //pp
					if (jenis_pasien == 'baru') {
						$('#inBiayaAdm').val(10000);
						var c = 10000;
					} else {
						$('#inBiayaAdm').val(0);
						var c = 0;
					}
					$('#inBiayaDok').val(data.jasmed_pp_pagi);
					$("#inBiayaRS").val(data.rs_pp_pagi);

					var a = data.rs_pp_pagi;
					var b = data.jasmed_pp_pagi;
					var total = Number(a) + Number(b) + Number(c);
					$("#inTotal").val(total);
				}  else { //asuransi
					if (jenis_pasien == 'baru') {
						$('#inBiayaAdm').val(10000);
						var c = 10000;
					} else {
						$('#inBiayaAdm').val(0);
						var c = 0;
					}
				
					$("#inBiayaRS").val(data.rs_asuransi_pagi);
					$('#inBiayaDok').val(data.jasmed_asuransi_pagi);

					var a = data.rs_asuransi_pagi;
					var b = data.jasmed_asuransi_pagi;
					var total = Number(a) + Number(b) + Number(c);
					$("#inTotal").val(total);


				}
			}
		});


	});
</script>
<script type="text/javascript">
	function edit_data_kunjungan(id_pelayanan, id_history) {
		$.ajax({
			url: "<?= base_url() . 'Pasien/getddata_Igd' ?>",
			data: {
				pelayanan: id_pelayanan,
				history: id_history
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status_dt == "found") {
					//disini set datanya ke modal
					getPasienBaru(data.no_rm);
					$("#tipe_masuk").val('1').change();

					$("#inTanggalKunjugan").val(data.tgl_masuk);
					$("#idPelayanan").val(data.id_pelayanan);
					$("#idHis").val(data.id_history);
					$("#inNoSEP").val(data.no_sep);
					$("#inDiagnosa").val(data.diagnosa);
					$("#inDPJP").val(data.dpjp).change();
					$("#inNaPol").val(data.nama_poli).change();
					$("#NamaPasien").val(data.nama).change();
					$("#inAsalPasien").val(data.asal_pasien).change();
					$("#inCaraBayar").val(data.id_cara_bayar).change();
					$("#modal_edit_data").modal('show');
				} else {
					alert("data tidak ditemukan");
				}
			}
		});
	}

	function getPasienBaru(no_rm) {
		$.ajax({
			url: "<?php echo base_url(); ?>Pencarian_pasien/getPasienBaru",

			method: "POST",
			data: {
				id_pasien: no_rm,
			},
			dataType: 'json',
			success: function(data) {
				$("#jenis_pasien").val(data.status);
			}
		});

	}
</script>
<script type="text/javascript">
	function delete_rajal(id_history, tipe) {
		nama = $("#NamaPasien").val();
		swal({
			title: "Apakah kamu yakin akan !",
			text: "Menghapus data ini ?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Pasien/delete_pasien_Igd",
					method: "POST",
					dataType: 'json',
					data: {
						id_history: id_history,
						tipe: tipe,
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Pasien IGD Berhasil dihapus",
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
</script>

<script type="text/javascript">
	function edit_rawat_jalan() {
		tipe_masuk = $('#tipe_masuk').val();
		id_Layanan = $('#idPelayanan').val();
		id_History = $('#idHis').val();
		nama = $("#NamaPasien").val();
		nosep = $('#inNoSEP').val();
		carabayar = $('#inCaraBayar').val();
		Asalpasien = $('#inAsalPasien').val();
		diagnosa = $('#inDiagnosa').val();
		dpjp = $('#inDPJP').val();
		NaPol = $('#inNaPol').val();
		biaya_jasa = $('#inBiayaDok').val();
		biaya_rs = $('#inBiayaRS').val();
		biaya_admin = $('#inBiayaAdm').val();
		swal({
			title: "Apakah kamu yakin ingin !",
			text: "Mengubah Data " + nama + " ini?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Pasien/edit_Igd",
					method: "POST",
					dataType: 'json',
					data: {
						idPelayanan: id_Layanan,
						idHis: id_History,
						NoSEP: nosep,
						CaraBayar: carabayar,
						AsalPasien: Asalpasien,
						Diagnosa: diagnosa,
						namaDPJP: dpjp,
						NamaPoli: NaPol,
						tipe_masuk: tipe_masuk,
						biaya_jasa: biaya_jasa,
						biaya_rs: biaya_rs,
						biaya_admin: biaya_admin
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Pasien Rawat Jalan dengan Nama " + nama + " Telah diubah",
								confirmButtonColor: "#3cb878",
							});
							nosep = $('#inNoSEP').val(nosep);
							$("#modal_edit_data").modal('hide');
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
			"ajax": '<?php echo base_url('Pasien/tampil_dataIgd'); ?>',
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

			foreach ($diagnosa as $row) {


				echo ",'" . $row["id_diagnosa"] . " | " . $row["nama_diagnosa"] . "'";
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



	});
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>