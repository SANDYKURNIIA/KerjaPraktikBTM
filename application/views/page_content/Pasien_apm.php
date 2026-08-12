<<<<<<< HEAD
<!-- Row -->
<div class="panel panel-default card-view mt-20 ">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">DAFTAR PASIEN ANJUNGAN PENDAFTARAN MANDIRI</span></h6>
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
								<th>EDIT</th>
								<th>NO RM</th>
								<th>NO ANTRIAN</th>
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
								<th>EDIT</th>
								<th>NO RM</th>
								<th>NO ANTRIAN</th>
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
	<!-- modal edit data -->
	<div class="modal fade bs-example-modal-lg" id="modal_edit_data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

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
											<input type="text" autocomplete="off" class="form-control filled-input" placeholder="TIPE MASUK" disabled="" name="tipe_masuk" id="tipe_masuk">
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

											<select class="form-control filled-input select2" placeholder="PILIH NAMA DOKTER" style="border: 1px solid lightgreen;" tabindex="1" id="inDPJP" name="namaDPJP">
											</select>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">JENIS KLAIM</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="PILIH JENIS KLAIM" style="border: 1px solid lightgreen;" tabindex="1" id="inCaraBayar" name="CaraBayar">

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
											<select class="form-control filled-input select2" placeholder="PILIH KATEGORI" style="border: 1px solid lightgreen;" tabindex="1" id="inAsalPasien" name="AsalPasien">
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
											<input type="text" style="border: 1px solid lightgreen;" class="form-control filled-input" placeholder="DIAGNOSA" id="inDiagnosa" name="Diagnosa">
											<input type="hidden" id="idPelayanan" name="idPelayanan">
											<input type="hidden" id="idHis" name="idHis">
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
								<div class="col-md-6">
									<div class="form-group">
										<span class="help-block"></span>
										<label class="control-label col-md-3">NAMA POLI</label>
										<div class="col-md-9 has-success">

											<select class="form-control filled-input select2" placeholder="NAMA POLI" style="border: 1px solid lightgreen;" tabindex="1" id="inNaPol" name="NamaPoli">
												<?php
												foreach ($data_nama_poli as $row) :
												?>
													<option value="<?php echo $row->id_list_poli; ?>">
														<?php echo $row->nama; ?></option>
												<?php endforeach; ?>
												>
											</select>
										</div>
									</div>
								</div>

							</div>

						</div>

					</div>
				</div>
				<div class="modal-footer">
					<button onclick="edit_rawat_jalan()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
						<button type="button" class="btn btn-danger text-left" data-dismiss="modal">Close</button>
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
		function edit_data_kunjungan(id_pelayanan) {
			$.ajax({
				url: "<?= base_url() . 'Pasien/konfirmasiPasienAPM' ?>",
				data: {
					pelayanan: id_pelayanan,
				},
				type: 'POST',
				dataType: 'json',
				success: function(data) {
					if (data.status == "success") {
						swal({
							title: "good job!",
							type: "success",
							text: "Data sudah dikonfirmasi",
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
		$(document).ready(function() {
			$('#inNaPol').change(function() {
				var poli = $('#inNaPol').val();
				if (poli == 'ODI8643C27') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == '111111') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'AX1520L18') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == '146582') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == '15487956') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == '24QRNLX29R') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == '2JZ09X4K22') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == '6E975PL694') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'E00RX703') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'HLGI4176K8') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'I9NXY5VNQG') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'MWK205D30K') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'RZE28J1098') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'UQ81K76373') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'O782EGU4PR') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				}
			});
		});
	</script>
	<script type="text/javascript">
		function delete_rajal(id_pelayanan) {
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
						url: "<?php echo base_url() ?>Pasien/delete_pasien_rajal",
						method: "POST",
						dataType: 'json',
						data: {
							pelayanan: id_pelayanan,
						},
						success: function(data) {
							if (data.status == "success") {
								swal({
									title: "good job!",
									type: "success",
									text: "Pasien Rawat Jalan Berhasil dihapus",
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
			id_Layanan = $('#idPelayanan').val();
			id_History = $('#idHis').val();
			nama = $("#NamaPasien").val();
			nosep = $('#inNoSEP').val();
			carabayar = $('#inCaraBayar').val();
			Asalpasien = $('#inAsalPasien').val();
			diagnosa = $('#inDiagnosa').val();
			DPJP = $('#inDPJP').val();
			NaPol = $('#inNaPol').val();
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
						url: "<?php echo base_url() ?>Pasien/edit_rawat_jalan",
						method: "POST",
						dataType: 'json',
						data: {
							idPelayanan: id_Layanan,
							idHis: id_History,
							NoSEP: nosep,
							CaraBayar: carabayar,
							AsalPasien: Asalpasien,
							Diagnosa: diagnosa,
							namaDPJP: DPJP,
							NamaPoli: NaPol,
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
					"sSearch": "Pencarian :",
					"sUrl": "",
					"oPaginate": {
						"sFirst": "Pertama",
						"sPrevious": "Sebelumnya",
						"sNext": "Selanjutnya",
						"sLast": "Terakhir"
					},

				},
				"ajax": '<?php echo base_url('Pasien/tampil_dataapm'); ?>',
				"deferRender": true,
				"processing": true,
				"order": [],
				"columnDefs": [{
					"targets": [0],
					"orderable": false,
				}, ],

			});
		});
=======
<!-- Row -->
<div class="panel panel-default card-view mt-20 ">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">DAFTAR PASIEN ANJUNGAN PENDAFTARAN MANDIRI</span></h6>
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
								<th>EDIT</th>
								<th>NO RM</th>
								<th>NO ANTRIAN</th>
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
								<th>EDIT</th>
								<th>NO RM</th>
								<th>NO ANTRIAN</th>
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
	<!-- modal edit data -->
	<div class="modal fade bs-example-modal-lg" id="modal_edit_data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

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
											<input type="text" autocomplete="off" class="form-control filled-input" placeholder="TIPE MASUK" disabled="" name="tipe_masuk" id="tipe_masuk">
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

											<select class="form-control filled-input select2" placeholder="PILIH NAMA DOKTER" style="border: 1px solid lightgreen;" tabindex="1" id="inDPJP" name="namaDPJP">
											</select>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">JENIS KLAIM</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="PILIH JENIS KLAIM" style="border: 1px solid lightgreen;" tabindex="1" id="inCaraBayar" name="CaraBayar">

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
											<select class="form-control filled-input select2" placeholder="PILIH KATEGORI" style="border: 1px solid lightgreen;" tabindex="1" id="inAsalPasien" name="AsalPasien">
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
											<input type="text" style="border: 1px solid lightgreen;" class="form-control filled-input" placeholder="DIAGNOSA" id="inDiagnosa" name="Diagnosa">
											<input type="hidden" id="idPelayanan" name="idPelayanan">
											<input type="hidden" id="idHis" name="idHis">
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
								<div class="col-md-6">
									<div class="form-group">
										<span class="help-block"></span>
										<label class="control-label col-md-3">NAMA POLI</label>
										<div class="col-md-9 has-success">

											<select class="form-control filled-input select2" placeholder="NAMA POLI" style="border: 1px solid lightgreen;" tabindex="1" id="inNaPol" name="NamaPoli">
												<?php
												foreach ($data_nama_poli as $row) :
												?>
													<option value="<?php echo $row->id_list_poli; ?>">
														<?php echo $row->nama; ?></option>
												<?php endforeach; ?>
												>
											</select>
										</div>
									</div>
								</div>

							</div>

						</div>

					</div>
				</div>
				<div class="modal-footer">
					<button onclick="edit_rawat_jalan()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
						<button type="button" class="btn btn-danger text-left" data-dismiss="modal">Close</button>
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
		function edit_data_kunjungan(id_pelayanan) {
			$.ajax({
				url: "<?= base_url() . 'Pasien/konfirmasiPasienAPM' ?>",
				data: {
					pelayanan: id_pelayanan,
				},
				type: 'POST',
				dataType: 'json',
				success: function(data) {
					if (data.status == "success") {
						swal({
							title: "good job!",
							type: "success",
							text: "Data sudah dikonfirmasi",
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
		$(document).ready(function() {
			$('#inNaPol').change(function() {
				var poli = $('#inNaPol').val();
				if (poli == 'ODI8643C27') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == '111111') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'AX1520L18') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == '146582') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == '15487956') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == '24QRNLX29R') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == '2JZ09X4K22') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == '6E975PL694') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'E00RX703') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'HLGI4176K8') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'I9NXY5VNQG') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'MWK205D30K') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'RZE28J1098') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'UQ81K76373') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'O782EGU4PR') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				}
			});
		});
	</script>
	<script type="text/javascript">
		function delete_rajal(id_pelayanan) {
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
						url: "<?php echo base_url() ?>Pasien/delete_pasien_rajal",
						method: "POST",
						dataType: 'json',
						data: {
							pelayanan: id_pelayanan,
						},
						success: function(data) {
							if (data.status == "success") {
								swal({
									title: "good job!",
									type: "success",
									text: "Pasien Rawat Jalan Berhasil dihapus",
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
			id_Layanan = $('#idPelayanan').val();
			id_History = $('#idHis').val();
			nama = $("#NamaPasien").val();
			nosep = $('#inNoSEP').val();
			carabayar = $('#inCaraBayar').val();
			Asalpasien = $('#inAsalPasien').val();
			diagnosa = $('#inDiagnosa').val();
			DPJP = $('#inDPJP').val();
			NaPol = $('#inNaPol').val();
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
						url: "<?php echo base_url() ?>Pasien/edit_rawat_jalan",
						method: "POST",
						dataType: 'json',
						data: {
							idPelayanan: id_Layanan,
							idHis: id_History,
							NoSEP: nosep,
							CaraBayar: carabayar,
							AsalPasien: Asalpasien,
							Diagnosa: diagnosa,
							namaDPJP: DPJP,
							NamaPoli: NaPol,
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
					"sSearch": "Pencarian :",
					"sUrl": "",
					"oPaginate": {
						"sFirst": "Pertama",
						"sPrevious": "Sebelumnya",
						"sNext": "Selanjutnya",
						"sLast": "Terakhir"
					},

				},
				"ajax": '<?php echo base_url('Pasien/tampil_dataapm'); ?>',
				"deferRender": true,
				"processing": true,
				"order": [],
				"columnDefs": [{
					"targets": [0],
					"orderable": false,
				}, ],

			});
		});
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
	</script>