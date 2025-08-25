	<!-- Row -->
	<div class="panel panel-default card-view mt-20">
		<div class="panel-heading">
			<div class="pull-left">
				<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PENDAFTARAN AKUN</span>
				</h6>

			</div>
			<button class="btn btn-primary btn-anim pull-right mr-50" data-toggle="modal" data-target=".modal-pendaftaranakun"><i class="icon-plus"></i><span class="btn-text">AKUN
					BARU</span></button>
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
									<th>AKSI</th>
									<th>STATUS</th>
									<th>AKTIF/NON-AKTIF AKUN</th>
									<th>NAMA</th>
									<th>USERNAME</th>
									<th>PASSWORD</th>
									<th>EMAIL</th>
									<th>NO. HP</th>
									<th>TANGGAL DAFTAR</th>
								</tr>
							</thead>
							<tfoot>
								<tr class="bg-success">
									<th>NO.</th>
									<th>AKSI</th>
									<th>STATUS</th>
									<th>AKTIF/NON-AKTIF AKUN</th>
									<th>NAMA</th>
									<th>USERNAME</th>
									<th>PASSWORD</th>
									<th>EMAIL</th>
									<th>NO. HP</th>
									<th>TANGGAL DAFTAR</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- /Modal Pendaftaran Akun -->
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<!-- sample modal content -->
			<div class="modal fade modal-pendaftaranakun" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> IDENTITAS
								AKUN ONLINE</h5>
						</div>
						<div class="modal-body">
							<!-- Form body  -->
							<div class="form-body mt-20">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">NAMA </label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control" id="namaAk" placeholder="NAMA" required>
												<span class="help-block"></span>
												<span id="nama_error" class="text-danger"></span>
											</div>
										</div>
									</div>

									<!-- span -->

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">USERNAME</label>
											<div class="col-md-9 has-success " >
												<input type="text" autocomplete="off" class="form-control" placeholder="USERNAME" id="username"s>
												<div id="username_result"></div>
												<span id="username_error" class="text-danger"></span>
											</div>

										</div>
									</div>
									<!--/span-->
								</div>
								<p class="mt-15">
									<!-- /Row -->

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">PASSWORD</label>
												<div class="col-md-9 has-success">
													<input type="text" autocomplete="off" class="form-control" id="passwordAk" placeholder="PASSWORD" required>
													<span class="help-block"> </span>
													<span id="password_error" class="text-danger"></span>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">EMAIL</label>
												<div class="col-md-9 has-success">
													<input type="email" class="form-control" placeholder="EMAIL" id="emailAk" required>
													<span id="email_error" class="text-danger"></span>
												</div>
											</div>
										</div>

										<p class="mt-15">
									</div>

									<div class="row mb-30">
										<p class="mt-15">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label col-md-3">NO HP</label>
													<div class="col-md-9 has-success">
														<input type="number"  class="form-control" id="noAk" placeholder="NOMOR HP" required>
														<span id="nohp_error" class="text-danger"></span>
													</div>
												</div>
											</div>
											<div class="col-md-6 mt-5">
												<button onclick="insertAkun()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
											</div>
									</div>
									<!-- /Row -->
							</div>
							<!-- End -->
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
		</div>
	</div>

	<!-- /Modal Edit Akun -->
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<!-- sample modal content -->
			<div class="modal fade" id="modal_edit_pendaftaran" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> IDENTITAS
								AKUN ONLINE</h5>
						</div>

						<div class="modal-body">
							<!-- Form body  -->

							<div class="form-body mt-20">

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">NAMA </label>
											<div class="col-md-9 has-success">

												<input type="text" class="form-control filled-input" id="nama" placeholder="NAMA" name="nama" readonly>
												<span class="help-block"></span>
											</div>
										</div>
									</div>

									<!-- span -->
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">USERNAME</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control filled-input" placeholder="USERNAME" name="username" id="inUsername" readonly>

											</div>
										</div>
									</div>
									<!--/span-->
								</div>
								<p class="mt-15">
									<!-- /Row -->

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">EMAIL</label>
												<div class="col-md-9 has-success">
													<input type="email" class="form-control filled-input " placeholder="EMAIL" id="email" name="email" readonly>

												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">TGL DAFTAR</label>
												<div class="col-md-9 has-success">
													<input type="text" class="form-control filled-input " placeholder="TANGGAL DAFTAR" name="tgl_daftar" id="tgl_daftar" readonly>

												</div>
											</div>
										</div>

										<p class="mt-15"> </p>
									</div>

									<div class="row">
										<p class="mt-15">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label col-md-3">NO HP</label>
													<div class="col-md-9 has-success">
														<input type="number" class="form-control filled-input" placeholder="NOMOR HP" id="no_hp" name="no_hp" readonly>

													</div>
												</div>
											</div>

											<div class="col-md-2" style="margin-left:120px;">
												<span class="help-block"></span>


												<button data-toggle="collapse" data-target="#isiDataAkun" aria-expanded="false" aria-controls="isiDataAkun" class="btn btn-success btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">TAMBAH RM</span>

											</div>
									</div>
									<!-- /Row -->


							</div>
							<!-- End -->

						</div>


						<div class="modal-footer mb-10 mr-15">
							<div class="row">
								<div class="col-md-12">
									<div class="form-wrap">
										<!-- /formbody -->

										<div class="collapse" id="isiDataAkun">

											<div class="form-body">
												<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>DATA
													AKUN
												</h6>
												<hr>
												<ul role="tablist" class="nav nav-pills" id="myTabs_9">
													<li class="active" role="presentation"><a aria-expanded="true" data-toggle="tab" role="tab" id="home_tab_9" href="#list_rm">List Akun</a></li>
													<li role="presentation" class=""><a data-toggle="tab" id="profile_tab_9" role="tab" href="#reg_rm" aria-expanded="false">Pendaftaran Akun</a></li>
												</ul>

												<div class="tab-content" id="myTabContent_9">
													<p>&nbsp;</p>
													<div id="list_rm" class="tab-pane fade active in" role="tabpanel">
														<input type="hidden" class="form-control filled-input" id="id_akunoke">
														<div class="panel-wrapper collapse in">
															<div class="panel-body">
																<div class="table-wrap">
																	<div class="table-responsive" id="outList">
																		<table id="datable_list_rm" class="table table-hover display" style="width:100%">
																			<thead>
																				<tr class="bg-success">
																					<th>NO</th>
																					<th>NO RM</th>
																					<th>NAMA</th>
																					<th>TANGGAL LAHIR</th>
																					<th class="text-center">HAPUS</th>
																				</tr>
																			</thead>
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<!--  -->

													<div id="reg_rm" class="tab-pane fade" role="tabpanel">

														<div class="row">
															<div class="col-md-9 mt-20">
																<div class="form-group ">
																	<label class="control-label col-md-3">NOMOR RM</label>
																	<div class="col-md-9 has-success">
																		<input type="text" name="no_rm" id="no_rm" class="form-control">
																		<input type="hidden" name="usernameAkun" id="usernameAkun" class="form-control">
																	</div>
																	<p id="notifnorm" style="color: red;font-style:italic; margin-right:125px;"></p>
																</div>
															</div>
															<div class="col-md-3" style="margin-top:20px; margin-left:-4em">
																<div class="form-group ">
																	<div class="col-md-12 has-success">
																		<a class="btn btn-success" id="btn_find_rm"><i class="glyphicon glyphicon-refresh"></i> Refresh</a>
																	</div>
																</div>
															</div>


															<div class="col-sm-12 mt-30">
																<div class="panel-heading">
																	<div class="pull-left">
																		<h6 class="panel-title txt-dark">LIST AKUN</h6>
																	</div>
																	<div class="clearfix"></div>
																</div>
																<div class="panel-wrapper collapse in">
																	<div class="panel-body">
																		<div class="table-wrap">
																			<div class="table-responsive" id="outList">
																				<table id="datable_list_pasien" class="table table-hover display  pb-30">
																					<thead>
																						<tr class="bg-success">
																							<th>NO</th>
																							<th>NO RM</th>
																							<th>NAMA</th>
																							<th>TANGGAL LAHIR</th>
																							<th class="text-center">Aksi
																							</th>
																						</tr>
																					</thead>
																					<tfoot>
																						<tr class="bg-success">
																							<th>NO</th>
																							<th>NO RM</th>
																							<th>NAMA</th>
																							<th>TANGGAL LAHIR</th>
																							<th class="text-center">Aksi
																							</th>
																						</tr>
																					</tfoot>
																					<!-- <tbody id="show_rm">

																					</tbody> -->
																				</table>
																			</div>

																		</div>
																	</div>
																</div>
															</div>
															<!-- /Row -->
														</div>
													</div>


												</div>
												<!-- /formbody -->
											</div>
										</div>
									</div>
								</div>
							</div>


						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
		</div>
	</div>


	<!-- Modal Tutup -->

	<div class="modal fade" id="modal_tutup" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="ModalLabel">Apakah anda yakin untuk
						men-onakitfkan?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<input type="hidden" name="username" id="usernameTutup">
					<input type="hidden" name="nama" id="namaTutup">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Yakin</button>
				</div>

			</div>
		</div>
	</div>

	<!--  Akhir ModalTutup -->


	<!-- Modal Buka -->
	<div class="modal fade" id="modal_buka" tabindex="-1" role="dialog" aria-labelledby="poliModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="poliModalLabel">Apakah anda yakin untuk
						aktifkan akun?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<input type="hidden" name="username" id="usernameBuka">
					<input type="hidden" name="nama" id="namaBuka">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Yakin</button>
				</div>

			</div>
		</div>
	</div>
	<!--  Akhir Modal Buka -->


	<!-- /Row -->

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
				"ajax": '<?php echo base_url('Pasien_online/tampil_dataakun'); ?>',
				"deferRender": true,
				"processing": true,
				"order": [],
				"columnDefs": [{
					"targets": [0],
					"orderable": false,
				}, ],
			});

		});

		function reload_data_list_akun_rm(username) {
			$('#datable_list_rm').dataTable().fnClearTable();
			$('#datable_list_rm').dataTable().fnDestroy();
			$('#datable_list_rm').DataTable({
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
						"sLast": "Terakhir",
					}
				},
				"ajax": {
					"url": '<?php echo base_url('Pasien_online/tampil_list'); ?>',
					"type": 'POST',
					"data": {
						dt_username: username
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

		function simpan_data_rm(no_rm) {
			id_akun = $('#id_akunoke').val();
			usernameAkun = $('#usernameAkun').val();
			$.ajax({
				url: " <?= base_url() . 'Pasien_online/simpan_data_rm' ?>",
				method: "POST",
				dataType: 'json',
				data: {
					id_akun: id_akun,
					no_rm: no_rm,
				},
				success: function(data) {
					if (data.status == "success") {
						swal({
							title: "good job!",
							type: "success",
							text: "No RM" + no_rm + " Berhasil ditambahkan",
							confirmButtonColor: "#3cb878",
						});
						reload_data_list_akun_rm(usernameAkun);
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

		function hapus_data_rm(id_akun, no_rm) {
			usernameAkun = $('#usernameAkun').val();
			swal({
				title: "Apakah kamu yakin?",
				text: "Menghapus data NO RM " + no_rm + "?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3cb878",
				confirmButtonText: "Yakin",
				cancelButtonText: "Batal",
				closeOnConfirm: false
			}, function() {
				$().ready(function() {
					$.ajax({
						url: "<?php echo base_url() ?>Pasien_online/hapus_data_rmbyakun",
						method: "POST",
						dataType: 'json',
						data: {
							id_akun: id_akun,
							no_rm: no_rm,
						},
						success: function(data) {
							if (data.status == "success") {
								swal({
									title: "good job!",
									type: "success",
									text: "No RM" + no_rm + " Berhasil dihapus",
									confirmButtonColor: "#3cb878",
								});
								$('#datable_list_rm').DataTable().ajax.reload();
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

		function insertAkun() {
			email = $('#emailAk').val();
			username = $('#username').val();
			password = $('#passwordAk').val();
			nama = $('#namaAk').val();
			no_hp = $('#noAk').val();
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Pasien_online/insertAkun",
					method: "POST",
					dataType: 'json',
					data: {
						email: email,
						username: username,
						password: password,
						nama: nama,
						no_hp: no_hp,
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Akun " + username + " Berhasil ditambahkan",
								confirmButtonColor: "#3cb878",
							});
							email = $('#emailAk').val("");
							username = $('#username').val("");
							password = $('#passwordAk').val("");
							nama = $('#namaAk').val("");
							no_hp = $('#noAk').val("");
							$('#username_result').html("");

							$("#modal-pendaftaranakun").modal('show');
							$('#datable').DataTable().ajax.reload();
						} else if (data.error) {
							if (data.nama_error != '') {
								$('#nama_error').html(data.nama_error);
							} else {
								$('#nama_error').html('');
							}
							if (data.username_error != '') {
								$('#username_error').html(data.username_error);
							} else {
								$('#username_error').html('');
							}
							if (data.password_error != '') {
								$('#password_error').html(data.password_error);
							} else {
								$('#password_error').html('');
							}
							if (data.email_error != '') {
								$('#email_error').html(data.email_error);
							} else {
								$('#email_error').html('');
							}
							if (data.nohp_error != '') {
								$('#nohp_error').html(data.nohp_error);
							} else {
								$('#nohp_error').html('');
							}
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
			return false;
		}
	</script>


	<!-- Check -->


	<script type="text/javascript">
		$('#btn_find_rm').click(function() {
			$('#datable_list_pasien').dataTable().fnClearTable();
			$('#datable_list_pasien').dataTable().fnDestroy();
			$('#notifnorm').html('');
			urm = $('#no_rm').val();
			if (urm.length > 3) {
				find_rm(urm);
			} else {
				if (urm != "") {
					html = '<b>No Rm minimal harus 4 karakter</b>';
					$('#notifnorm').html(html);
				}
			}
		});
		$('#no_rm').keyup(function() {
			$('#datable_list_pasien').dataTable().fnClearTable();
			$('#datable_list_pasien').dataTable().fnDestroy();
			$('#notifnorm').html('');
			urm = $('#no_rm').val();
			if (urm.length > 3) {
				find_rm(urm);
			} else {
				if (urm != "") {
					html = '<b>No Rm minimal harus 4 karakter</b>';
					$('#notifnorm').html(html);
				}
			}
		});

		function find_rm(urm) {
			$('#datable_list_pasien').DataTable({
				"retrieve": true,
				// "paging": false,
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
						"sLast": "Terakhir",
					}
				},
				"ajax": {
					"url": '<?php echo base_url('Pasien_online/check_norm'); ?>',
					"type": 'POST',
					"data": {
						no_rm: urm
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


		function edit_buka(username) {
			swal({
				title: "Apakah kamu yakin?",
				text: "Mengaktifkan akun dengan username : " + username + "?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3cb878",
				confirmButtonText: "Yakin",
				cancelButtonText: "Batal",
				closeOnConfirm: false
			}, function() {
				$().ready(function() {
					$.ajax({
						url: "<?php echo base_url() ?>Pasien_online/buka_akunonline",
						method: "POST",
						dataType: 'json',
						data: {
							username: username,
						},
						success: function(data) {
							if (data.status == "success") {
								swal({
									title: "good job!",
									type: "success",
									text: "Username " + username + " telah aktif",
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


		function edit_tutup(username) {
			swal({
				title: "Apakah kamu yakin?",
				text: "Menonaktifkan akun dengan username : " + username + "?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3cb878",
				confirmButtonText: "Yakin",
				cancelButtonText: "Batal",
				closeOnConfirm: false
			}, function() {
				$().ready(function() {
					$.ajax({
						url: "<?php echo base_url() ?>Pasien_online/tutup_akunonline",
						method: "POST",
						dataType: 'json',
						data: {
							username: username,
						},
						success: function(data) {
							if (data.status == "success") {
								swal({
									title: "good job!",
									type: "success",
									text: "Username " + username + " dinon-aktifkan",
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

		function edit_data_pendaftaran(username) {
			$.ajax({
				url: "<?= base_url() . 'Pasien_online/getdata_pendaftaran' ?>",
				data: {
					username: username,
				},
				type: 'POST',
				dataType: 'json',
				success: function(data) {
					if (data.status_dt == "found") {
						$("#nama").val(data.nama);
						$("#namaAkun").val(data.nama);
						$("#namaBuka").val(data.nama);
						$("#id_akun").val(data.id_akun);
						$("#id_akunoke").val(data.id_akun);
						$("#inUsername").val(data.username);
						$("#usernameAkun").val(data.username);
						$("#usernameBuka").val(data.username);
						$("#email").val(data.email);
						$("#tgl_daftar").val(data.tgl_daftar);
						$("#no_hp").val(data.no_hp);
						$("#modal_edit_pendaftaran").modal('show');
						reload_data_list_akun_rm(username);
					} else {
						alert("data tidak ditemukan");
					}
				}
			});
		}

		$('#username').keyup(function() {
			uname = $('#username').val();
			console.log(uname);
			if (uname != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pasien_online/check_username",
					method: "POST",
					data: {
						username: uname
					},
					success: function(data) {
						$('#username_result').html(data);
					}
				});
			}
		});
	</script>