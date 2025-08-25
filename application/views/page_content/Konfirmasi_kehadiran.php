	<!-- Row -->


	<div class="panel panel-default card-view mt-20">
		<div class="panel-heading">
			<div class="pull-left">
				<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">KONFIRMASI
						KEHADIRAN</span>
				</h6>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="panel-wrapper collapse in">
			<div class="panel-body">
				<div class="table-wrap">
					<div class="table-responsive">
						<table id="datable" class="table table-hover display pb-30">
							<thead>
								<tr class="bg-success">
									<th>NO.</th>
									<th>UBAH</th>
									<th>BATAL</th>
									<th>KONFIRMASI</th>
									<th>STATUS</th>
									<th>NO RM</th>
									<th>NAMA PASIEN</th>
									<th>TANGGAL MASUK</th>
									<th>JAM MASUK</th>
									<th>NO ANTRIAN</th>
									<th>JENIS KELAMIN</th>
									<th>TANGGAL LAHIR</th>
									<th>UMUR</th>
									<th>AGAMA</th>
									<th>CARA MASUK</th>
									<th>POLIKLINIK/RUANG</th>
									<th>DPJP</th>
									<th>CARA BAYAR</th>
									<th>DIAGNOSA</th>
									<th>KETERANGAN</th>
									<!-- <th>STATUS DATA</th> -->
									<th>NO SEP</th>
									<th>NAMA AKUN</th>
									<th>TELP</th>
								</tr>
							</thead>
							<tfoot>
								<tr class="bg-success">
									<th>NO.</th>
									<th>UBAH</th>
									<th>BATAL</th>
									<th>KONFIRMASI</th>
									<th>STATUS</th>
									<th>NO RM</th>
									<th>NAMA PASIEN</th>
									<th>TANGGAL MASUK</th>
									<th>JAM MASUK</th>
									<th>NO ANTRIAN</th>
									<th>JENIS KELAMIN</th>
									<th>TANGGAL LAHIR</th>
									<th>UMUR</th>
									<th>AGAMA</th>
									<th>CARA MASUK</th>
									<th>POLIKLINIK/RUANG</th>
									<th>DPJP</th>
									<th>CARA BAYAR</th>
									<th>DIAGNOSA</th>
									<th>KETERANGAN</th>
									<!-- <th>STATUS DATA</th> -->
									<th>NO SEP</th>
									<th>NAMA AKUN</th>
									<th>TELP</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal Ubah -->

	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<!-- sample modal content -->
			<div class="modal fade " id="ModalUbah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT KUNJUNGAN</h5>
						</div>
						<div class="modal-body">
							<!-- Form body  -->
							<div class="form-body mt-20">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">TIPE MASUK </label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control filled-input" id="masukUbah" name="masukUbah">
												<input type="hidden" id="idNama">
												<input type="hidden" class="form-control filled-input" id="idUbah" name="idUbah">
												<input type="hidden" class="form-control filled-input" id="idHis" name="idHis">
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<!-- span -->
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">TANGGAL KUNJUNGAN</label>
											<div class="col-md-9 has-success">
												<input type="text" autocomplete="off" class="form-control filled-input" name="tglUbah" id="tglUbah">
											</div>
										</div>
									</div>
									<!--/span -->
								</div>
								<p class="mt-15">
									<!-- /Row -->

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">NAMA POLI</label>
												<div class="col-md-9 has-success">

													<select class="form-control filled-input select2" placeholder="NAMA POLI" style="border: 1px solid lightgreen;" tabindex="1" id="poliUbah" name="poliUbah">
														<?php
														foreach ($data_nama_poli as $row) :
														?>
															<option value="<?php echo $row->id_list_poli; ?>">
																<?php echo $row->nama; ?></option>
														<?php endforeach; ?>
														>
													</select>
													<span class="help-block"> </span>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">CARA BAYAR</label>
												<div class="col-md-9 has-success">
													<select class="form-control filled-input select2" placeholder="PILIH CARA BAYAR" style="border: 1px solid lightgreen;" tabindex="1" id="bayarUbah" name="bayarUbah">
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

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">NAMA DOKTER (DPJP)</label>
												<div class="col-md-9 has-success">
													<select class="form-control filled-input select2" placeholder="PILIH NAMA DOKTER" style="border: 1px solid lightgreen;" tabindex="1" id="dokterUbah" name="dokterUbah">
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
												<label class="control-label col-md-3">DIAGNOSA</label>
												<div class="col-md-9 has-success" id="the-basics">
													<input class="typeahead form-control filled-input" type="text" placeholder="Diagnosa" id="diagnoUbah" name="diagnoUbah" style="width: 284.17px;">
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">ASAL PASIEN</label>
												<div class="col-md-9 has-success">
													<select class="form-control filled-input select2" placeholder="PILIH KATEGORI" style="border: 1px solid lightgreen;" tabindex="1" id="asalUbah" name="asalUbah">
														<?php
														foreach ($data_asal_pasien as $row) :
														?>
															<option value="<?php echo $row->id_asal_pasien; ?>">
																<?php echo $row->nama_asal; ?></option>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">NO SEP</label>
												<div class="col-md-9 has-success">
													<input type="text" class="form-control filled-input" name="sepUbah" id="sepUbah">
												</div>
											</div>
										</div>
									</div>

									<!-- /Row -->
							</div>
							<!-- End -->
						</div>
						<div class="modal-footer mb-10 mr-15">

							<button onclick="update_data();" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>

						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
		</div>
	</div>

	<!--  Akhir ModalTutup -->

	<style>
		td {
			color: black;
		}
	</style>

	<!-- js -->
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
				"ajax": '<?php echo base_url('Pasien_online/tampil_konfirmasi_kehadiran'); ?>',
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
		function update_data() {
			nama = $("#idNama").val();
			id_pelayanan = $('#idUbah').val();
			idHis = $('#idHis').val();
			asalUbah = $('#asalUbah').val();
			sepUbah = $('#sepUbah').val();
			bayarUbah = $('#bayarUbah').val();
			diagnoUbah = $('#diagnoUbah').val();
			dokterUbah = $('#dokterUbah').val();
			poliUbah = $('#poliUbah').val();
			swal({
				title: "Info!",
				text: "Apakah kamu yakin merubah data kunjungan Pasien : " + nama + "",
				type: "info",
				showCancelButton: true,
				confirmButtonColor: "#3cb878",
				confirmButtonText: "Yakin",
				cancelButtonText: "Batal",
				closeOnConfirm: false
			}, function() {
				$().ready(function() {
					$.ajax({
						url: "<?php echo base_url() ?>Pasien_online/update_data",
						method: "POST",
						dataType: 'json',
						data: {
							id_pelayanan: id_pelayanan,
							idHis: idHis,
							asalUbah: asalUbah,
							sepUbah: sepUbah,
							bayarUbah: bayarUbah,
							diagnoUbah: diagnoUbah,
							dokterUbah: dokterUbah,
							poliUbah: poliUbah
						},
						success: function(data) {
							if (data.status == "success") {
								swal({
									title: "good job!",
									type: "success",
									text: "Pasien " + nama + " berhasil di rubah tujuan kunjungan nya",
									confirmButtonColor: "#3cb878",
								});
								$('#datable').DataTable().ajax.reload();
								$("#ModalUbah").modal('hide');
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

		function edit_modalkonfirmasi(id_pelayanan, nama) {
			swal({
				title: "Info!",
				text: "Anda akan konfirmasi kehadiran Pasien : " + nama + "",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3cb878",
				confirmButtonText: "Yakin",
				cancelButtonText: "Batal",
				closeOnConfirm: false
			}, function() {
				$().ready(function() {
					$.ajax({
						url: "<?php echo base_url() ?>Pasien_online/konfirmasi_hadir",
						method: "POST",
						dataType: 'json',
						data: {
							id_pelayanan: id_pelayanan,
						},
						success: function(data) {
							if (data.status == "success") {
								swal({
									title: "good job!",
									type: "success",
									text: "Pasien " + nama + " berhasil di konfirmasi kehadiran nya",
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
		}


		function edit_modaldelete(id_pelayanan, nama) {
			swal({
				title: "Warning!",
				text: "Anda akan membatalkan kehadiran Pasien : " + nama + "",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3cb878",
				confirmButtonText: "Yakin",
				cancelButtonText: "Batal",
				closeOnConfirm: false
			}, function() {
				$().ready(function() {
					$.ajax({
						url: "<?php echo base_url() ?>Pasien_online/batal_hadir",
						method: "POST",
						dataType: 'json',
						data: {
							id_pelayanan: id_pelayanan,
						},
						success: function(data) {
							if (data.status == "success") {
								swal({
									title: "good job!",
									type: "success",
									text: "Pasien " + nama + " berhasil dibatalkan kehadiran nya",
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
		}
	</script>


	<script type="text/javascript">
		function edit_modalubah(id_pelayanan) {
			$.ajax({
				url: "<?= base_url() . 'Pasien_online/getdata_ubahkonfirm' ?>",
				data: {
					id_pelayanan: id_pelayanan,
				},
				type: 'POST',
				dataType: 'json',
				success: function(data) {
					if (data.status_dt == "found") {
						$("#idNama").val(data.nama);
						$("#idUbah").val(data.id_pelayanan);
						$("#idHis").val(data.id_history);
						$("#masukUbah").val(data.jenis_pelayanan);
						$("#tglUbah").val(data.tgl_masuk);
						$("#poliUbah").val(data.nama_poli).change();
						$("#bayarUbah").val(data.id_cara_bayar).change();
						$("#dokterUbah").val(data.dpjp).change();
						$("#diagnoUbah").val(data.diagnosa);
						$("#asalUbah").val(data.id_asal_pasien).change();
						$("#sepUbah").val(data.no_sep);

						$("#ModalUbah").modal('show');

					} else {
						alert("data tidak ditemukan");
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
		</script>