<<<<<<< HEAD
<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="span span-success">MASTER STAFF</span></h6>
		</div>



		<div class="clearfix"></div>
	</div>

	<div align="right">
		<button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target="#modal_homecare"><i class="icon-plus"></i><span class="btn-text">TAMBAH MASTER STAFF</span>
		</button>
	</div>



	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<!-- <form id="form-filter" class="form-horizontal"> -->
			<div class="form-group">



				<div class="row mt-30">
					<div class="col-md-12">

					</div>
				</div>




				<!-- <div class="form-group">

        </div> -->





				<div class="table-wrap">
					<!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

					<div class="table-responsive">
						<table class="table table-hover display  pb-30" id="datable">
							<thead>
								<tr class="bg-success">
									<th>NO</th>
									<th>EDIT</th>
									<th>HAPUS</th>

									<th>USERNAME</th>
									<th>PASSWORD</th>
									<th>NAMA</th>
									<th>TIPE</th>
									<th>STATUS</th>
								</tr>
							</thead>
							<tfoot class="bg-success">
								<th>NO</th>
								<th>EDIT</th>
								<th>HAPUS</th>

								<th>USERNAME</th>
								<th>PASSWORD</th>
								<th>NAMA</th>
								<th>TIPE</th>
								<th>STATUS</th>

							</tfoot>
							<tbody style="color: black">

								<!--percobaan nampilin data-->



								<!--end percobaan penampilan data-->

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!--data table-->

<!--modal yang akan dipakai-->
<div class="panel-wrapper collapse in">
	<div class="modal fade bs-example-modal-lg" id="modal_homecare" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TAMBAH MASTER STAFF</h5>
				</div>
				<div class="modal-body">
					<div class="form-wrap">
						<!-- /formbody -->
						<div class="form-body">
							<!-- Row 1: Username & Password -->
							<div class="row">
								<div class="col-md-6 mt-10">
									<div class="form-group">
										<label class="control-label col-md-3">USERNAME</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" autocomplete="off" placeholder="Username" id="inUsername">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6 mt-10">
									<div class="form-group">
										<label class="control-label col-md-3">PASSWORD</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" autocomplete="off" placeholder="Password" id="inPassword">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>



							<!-- Row 2: Nama & Tipe -->
							<div class="row">
								<div class="col-md-6 mt-10">
									<div class="form-group">
										<label class="control-label col-md-3">NAMA</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" autocomplete="off" placeholder="Nama" id="inNama">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6 mt-10">
									<div class="form-group">
										<label class="control-label col-md-3">TIPE</label>
										<div class="col-md-9 has-success">
											<select class="form-control" id="inTipe">
												<option value="" disabled selected>Pilih Tipe</option>
												<?php foreach ($tipe as $type): ?>
													<option value="<?= htmlspecialchars($type->tipe); ?>"><?= htmlspecialchars($type->tipe); ?></option>
												<?php endforeach; ?>
											</select>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

							</div>

							<!-- Row 3: Status -->
							<div class="row">
								<div class="col-md-6 mt-10">
									<div class="form-group">
										<label class="control-label col-md-3">STATUS</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" autocomplete="off" placeholder="Status" id="inStatus">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>

							<!-- Save Button -->
							<div class="form-actions mt-10 mb-20">
								<div class="row">
									<div class="col-md-6"></div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<button type="button" class="btn btn-success mr-10" onclick="insertMasterStaff()">SIMPAN</button>
												<span></span>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div> <!-- /form-body -->
					</div> <!-- /form-wrap -->
				</div> <!-- /modal-body -->
			</div> <!-- /modal-content -->
		</div> <!-- /modal-dialog -->
	</div> <!-- /modal -->
</div> <!-- /panel-wrapper -->

<div class="panel-wrapper collapse in">

	<div class="modal fade bs-example-modal-lg" id="modal_edit_homecare" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: green;">×</button>
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10" style="color: green;"></i> EDIT MASTER STAFF</h5>
				</div>
				<div class="modal-body">
					<div class="form-wrap">
						<!-- /formbody -->
						<div class="form-body">
							<!-- Row 1: Username & Password -->
							<div class="row">
								<div class="col-md-6 mt-10">
									<div class="form-group">
										<label class="control-label col-md-3" style="color: black;">USERNAME</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" autocomplete="off" placeholder="Username" id="upUsername" style="border-color: green;">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6 mt-10">
									<div class="form-group">
										<label class="control-label col-md-3" style="color: black;">PASSWORD</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" autocomplete="off" placeholder="Password" id="upPassword" style="border-color: green;">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>

							<!-- Row 2: Nama & Tipe -->
							<div class="row">
								<div class="col-md-6 mt-10">
									<div class="form-group">
										<label class="control-label col-md-3" style="color: black;">NAMA</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" autocomplete="off" placeholder="Nama" id="upNama" style="border-color: green;">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6 mt-10">
									<div class="form-group">
										<label class="control-label col-md-3" style="color: black;">TIPE</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" autocomplete="off" placeholder="Tipe" id="upTipe" style="border-color: green;">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>

							<!-- Row 3: Status -->
							<div class="row">
								<div class="col-md-6 mt-10">
									<div class="form-group">
										<label class="control-label col-md-3" style="color: black;">STATUS</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" autocomplete="off" placeholder="Status" id="upStatus" style="border-color: green;">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>

							<!-- Save Button -->
							<div class="form-actions mt-10 mb-20">
								<div class="row">
									<div class="col-md-6"></div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<input type="hidden" class="form-control" autocomplete="off" id="upId_staff">
												<button type="submit" class="btn btn-success mr-10" onclick="updateMasterStaff()">SIMPAN</button>
												<span></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- /form-body -->
					</div> <!-- /form-wrap -->
				</div> <!-- /modal-body -->
			</div> <!-- /modal-content -->
		</div> <!-- /modal-dialog -->
	</div> <!-- /modal -->


	<!--akhir modal yang akan dipakai-->
	<!--ajax-->

	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1-crypto-js.js"></script> -->



	<script type="text/javascript">
		function insertMasterStaff() {

			username = ($("#inUsername").val());
			password = ($("#inPassword").val());
			nama = ($("#inNama").val());
			tipe = ($("#inTipe").val());
			status = ($("#inStatus").val());
			// biaya_sarana = ($("#inBiayaSarana").val());
			// jasa = ($("#inJasa").val());
			// status = ($("#inStatus").val());

			$.ajax({
				type: "POST",
				url: "<?php echo base_url() ?>	Master_staff/insert_master_staff",
				dataType: 'json',
				data: {
					//id_staff: id_staff,
					username: username,
					password: password,
					nama: nama,
					tipe: tipe,
					status: status,
					// biaya_sarana: biaya_sarana,
					// jasa: jasa,
					// status: status,
				},
				success: function(data) {
					if (data.status == "success") {
						swal({
							title: "good job!",
							type: "success",
							text: "Data Berhasil diedit",
							confirmButtonColor: "#3cb878",
						});
						$("#upTindakan").val("");
						$("#upUsername").val("");
						$("#upPassword").val("");
						$("#upNama").val("");
						$("#upTipe").val("");
						$("#upStatus").val("");


						$("#modal_homecare").modal('hide');
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
			})
		}



		function setTotal() {

			biaya_sarana = $('#inBiayaSarana').val();
			jasa = $('#inJasa').val();
			total = Number(biaya_sarana) + Number(jasa);
			$("#inTotal").val(total.toFixed(0));
		}

		function setTotal1() {

			biaya_sarana = $('#upBiayaSarana').val();
			jasa = $('#upJasa').val();
			total = Number(biaya_sarana) + Number(jasa);
			$("#upTotal").val(total.toFixed(0));

		}

		function edit_master_staff(id_staff) {
			$.ajax({
				url: "<?php echo base_url() ?>Master_staff/getDataMasterstaff",
				data: {
					id_staff: id_staff,
					// username: username,
					// password: password,
					// nama: nama,
					// tipe: tipe,
					// status: status,
				},
				type: 'POST',
				dataType: 'json',
				success: function(data) {
					if (data.status_dt == "found") {
						$("#upId_staff").val(data.id_staff);
						$("#upUsername").val(data.username);
						$("#upPassword").val(data.password);
						$("#upNama").val(data.nama);
						$("#upTipe").val(data.tipe);
						$("#upStatus").val(data.status);
						$("#modal_edit_homecare ").modal('show');
					} else {
						alert("data tidak ditemukan");
					}
				}
			});
		}

		function hapus_master_staff(id_staff, nama) {
			// Pastikan `nama` diterima sebagai parameter atau diambil dari elemen lain
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
				// Melakukan AJAX request untuk menghapus data
				$.ajax({
					url: "<?= base_url() . 'Master_staff/hapus_master_staff' ?>", // URL controller
					method: "POST",
					dataType: 'json',
					data: {
						id_staff: id_staff, // ID staff yang akan dihapus
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "Berhasil!",
								type: "success",
								text: "Data staff berhasil dihapus.",
								confirmButtonColor: "#3cb878",
							});
							$('#datable').DataTable().ajax.reload(); // Reload tabel DataTable
						} else {
							swal({
								title: "Gagal!",
								type: "warning",
								text: data.message || "Gagal menghapus data.",
								confirmButtonColor: "#3cb878",
							});
						}
					},
					error: function(xhr, status, error) {
						swal({
							title: "Terjadi kesalahan!",
							type: "error",
							text: "Ada masalah dalam penghapusan data.",
							confirmButtonColor: "#3cb878",
						});
					}
				});
			});
			return false;
		}



		function updateMasterStaff() {
			id_staff = $("#upId_staff").val();
			username = ($("#upUsername").val());
			password = ($("#upPassword").val());
			nama = ($("#upNama").val());
			tipe = ($("#upTipe").val());
			status = ($("#upStatus").val());

			$.ajax({
				type: "POST",
				url: "<?php echo base_url() ?>Master_staff/edit_master_staff",
				dataType: 'json',
				data: {
					id_staff: id_staff,
					username: username,
					password: password,
					nama: nama,
					tipe: tipe,
					status: status,
				},
				success: function(data) {
					if (data.status == "success") {
						swal({
							title: "good job!",
							type: "success",
							text: "Data Berhasil diedit",
							confirmButtonColor: "#3cb878",
						});

						$("#modal_edit_homecare").modal('hide');
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
			})
		}

		// function hapus_obat(id_logistik) {
		//     swal({
		//         title: "Apakah kamu yakin?",
		//         text: "Menghapus data " + id_logistik + "?",
		//         type: "warning",
		//         showCancelButton: true,
		//         confirmButtonColor: "#3cb878",
		//         confirmButtonText: "Yakin",
		//         cancelButtonText: "Batal",
		//         closeOnConfirm: false
		//     }, function() {
		//         $().ready(function() {
		//             $.ajax({
		//                 url: "<?php echo base_url() ?>Po_obat/hapus_obat",
		//                 method: "POST",
		//                 dataType: 'json',
		//                 data: {
		//                     id_logistik: id_logistik,
		//                 },
		//                 success: function(data) {
		//                     if (data.status == "success") {
		//                         swal({
		//                             title: "good job!",
		//                             type: "success",
		//                             text: "Data Berhasil dihapus",
		//                             confirmButtonColor: "#3cb878",
		//                         });
		//                         //$("#modalTambahObatFaktur").modal('show');
		//                         //$('#isiFaktur').DataTable().ajax.reload();
		//                         $('#datable').DataTable().ajax.reload();
		//                     } else {
		//                         swal({
		//                             title: "Gagal!",
		//                             type: "warning",
		//                             text: data.status,
		//                             confirmButtonColor: "#3cb878",
		//                         });
		//                     }
		//                 }
		//             });
		//         });

		//     });
		//     return false;
		// }
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
				"ajax": '<?php echo base_url('Master_staff/tampil_master_staff'); ?>',
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



=======
<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="span span-success">MASTER STAFF</span></h6>
		</div>



		<div class="clearfix"></div>
	</div>

	<div align="right">
		<button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target="#modal_homecare"><i class="icon-plus"></i><span class="btn-text">TAMBAH MASTER STAFF</span>
		</button>
	</div>



	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<!-- <form id="form-filter" class="form-horizontal"> -->
			<div class="form-group">



				<div class="row mt-30">
					<div class="col-md-12">

					</div>
				</div>




				<!-- <div class="form-group">

        </div> -->





				<div class="table-wrap">
					<!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

					<div class="table-responsive">
						<table class="table table-hover display  pb-30" id="datable">
							<thead>
								<tr class="bg-success">
									<th>NO</th>
									<th>EDIT</th>
									<th>HAPUS</th>

									<th>USERNAME</th>
									<th>PASSWORD</th>
									<th>NAMA</th>
									<th>TIPE</th>
									<th>STATUS</th>
								</tr>
							</thead>
							<tfoot class="bg-success">
								<th>NO</th>
								<th>EDIT</th>
								<th>HAPUS</th>

								<th>USERNAME</th>
								<th>PASSWORD</th>
								<th>NAMA</th>
								<th>TIPE</th>
								<th>STATUS</th>

							</tfoot>
							<tbody style="color: black">

								<!--percobaan nampilin data-->



								<!--end percobaan penampilan data-->

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!--data table-->

<!--modal yang akan dipakai-->
<div class="panel-wrapper collapse in">
	<div class="modal fade bs-example-modal-lg" id="modal_homecare" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TAMBAH MASTER STAFF</h5>
				</div>
				<div class="modal-body">
					<div class="form-wrap">
						<!-- /formbody -->
						<div class="form-body">
							<!-- Row 1: Username & Password -->
							<div class="row">
								<div class="col-md-6 mt-10">
									<div class="form-group">
										<label class="control-label col-md-3">USERNAME</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" autocomplete="off" placeholder="Username" id="inUsername">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6 mt-10">
									<div class="form-group">
										<label class="control-label col-md-3">PASSWORD</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" autocomplete="off" placeholder="Password" id="inPassword">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>



							<!-- Row 2: Nama & Tipe -->
							<div class="row">
								<div class="col-md-6 mt-10">
									<div class="form-group">
										<label class="control-label col-md-3">NAMA</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" autocomplete="off" placeholder="Nama" id="inNama">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6 mt-10">
									<div class="form-group">
										<label class="control-label col-md-3">TIPE</label>
										<div class="col-md-9 has-success">
											<select class="form-control" id="inTipe">
												<option value="" disabled selected>Pilih Tipe</option>
												<?php foreach ($tipe as $type): ?>
													<option value="<?= htmlspecialchars($type->tipe); ?>"><?= htmlspecialchars($type->tipe); ?></option>
												<?php endforeach; ?>
											</select>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

							</div>

							<!-- Row 3: Status -->
							<div class="row">
								<div class="col-md-6 mt-10">
									<div class="form-group">
										<label class="control-label col-md-3">STATUS</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" autocomplete="off" placeholder="Status" id="inStatus">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>

							<!-- Save Button -->
							<div class="form-actions mt-10 mb-20">
								<div class="row">
									<div class="col-md-6"></div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<button type="button" class="btn btn-success mr-10" onclick="insertMasterStaff()">SIMPAN</button>
												<span></span>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div> <!-- /form-body -->
					</div> <!-- /form-wrap -->
				</div> <!-- /modal-body -->
			</div> <!-- /modal-content -->
		</div> <!-- /modal-dialog -->
	</div> <!-- /modal -->
</div> <!-- /panel-wrapper -->

<div class="panel-wrapper collapse in">

	<div class="modal fade bs-example-modal-lg" id="modal_edit_homecare" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: green;">×</button>
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10" style="color: green;"></i> EDIT MASTER STAFF</h5>
				</div>
				<div class="modal-body">
					<div class="form-wrap">
						<!-- /formbody -->
						<div class="form-body">
							<!-- Row 1: Username & Password -->
							<div class="row">
								<div class="col-md-6 mt-10">
									<div class="form-group">
										<label class="control-label col-md-3" style="color: black;">USERNAME</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" autocomplete="off" placeholder="Username" id="upUsername" style="border-color: green;">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6 mt-10">
									<div class="form-group">
										<label class="control-label col-md-3" style="color: black;">PASSWORD</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" autocomplete="off" placeholder="Password" id="upPassword" style="border-color: green;">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>

							<!-- Row 2: Nama & Tipe -->
							<div class="row">
								<div class="col-md-6 mt-10">
									<div class="form-group">
										<label class="control-label col-md-3" style="color: black;">NAMA</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" autocomplete="off" placeholder="Nama" id="upNama" style="border-color: green;">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6 mt-10">
									<div class="form-group">
										<label class="control-label col-md-3" style="color: black;">TIPE</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" autocomplete="off" placeholder="Tipe" id="upTipe" style="border-color: green;">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>

							<!-- Row 3: Status -->
							<div class="row">
								<div class="col-md-6 mt-10">
									<div class="form-group">
										<label class="control-label col-md-3" style="color: black;">STATUS</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control" autocomplete="off" placeholder="Status" id="upStatus" style="border-color: green;">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>

							<!-- Save Button -->
							<div class="form-actions mt-10 mb-20">
								<div class="row">
									<div class="col-md-6"></div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<input type="hidden" class="form-control" autocomplete="off" id="upId_staff">
												<button type="submit" class="btn btn-success mr-10" onclick="updateMasterStaff()">SIMPAN</button>
												<span></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- /form-body -->
					</div> <!-- /form-wrap -->
				</div> <!-- /modal-body -->
			</div> <!-- /modal-content -->
		</div> <!-- /modal-dialog -->
	</div> <!-- /modal -->


	<!--akhir modal yang akan dipakai-->
	<!--ajax-->

	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1-crypto-js.js"></script> -->



	<script type="text/javascript">
		function insertMasterStaff() {

			username = ($("#inUsername").val());
			password = ($("#inPassword").val());
			nama = ($("#inNama").val());
			tipe = ($("#inTipe").val());
			status = ($("#inStatus").val());
			// biaya_sarana = ($("#inBiayaSarana").val());
			// jasa = ($("#inJasa").val());
			// status = ($("#inStatus").val());

			$.ajax({
				type: "POST",
				url: "<?php echo base_url() ?>	Master_staff/insert_master_staff",
				dataType: 'json',
				data: {
					//id_staff: id_staff,
					username: username,
					password: password,
					nama: nama,
					tipe: tipe,
					status: status,
					// biaya_sarana: biaya_sarana,
					// jasa: jasa,
					// status: status,
				},
				success: function(data) {
					if (data.status == "success") {
						swal({
							title: "good job!",
							type: "success",
							text: "Data Berhasil diedit",
							confirmButtonColor: "#3cb878",
						});
						$("#upTindakan").val("");
						$("#upUsername").val("");
						$("#upPassword").val("");
						$("#upNama").val("");
						$("#upTipe").val("");
						$("#upStatus").val("");


						$("#modal_homecare").modal('hide');
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
			})
		}



		function setTotal() {

			biaya_sarana = $('#inBiayaSarana').val();
			jasa = $('#inJasa').val();
			total = Number(biaya_sarana) + Number(jasa);
			$("#inTotal").val(total.toFixed(0));
		}

		function setTotal1() {

			biaya_sarana = $('#upBiayaSarana').val();
			jasa = $('#upJasa').val();
			total = Number(biaya_sarana) + Number(jasa);
			$("#upTotal").val(total.toFixed(0));

		}

		function edit_master_staff(id_staff) {
			$.ajax({
				url: "<?php echo base_url() ?>Master_staff/getDataMasterstaff",
				data: {
					id_staff: id_staff,
					// username: username,
					// password: password,
					// nama: nama,
					// tipe: tipe,
					// status: status,
				},
				type: 'POST',
				dataType: 'json',
				success: function(data) {
					if (data.status_dt == "found") {
						$("#upId_staff").val(data.id_staff);
						$("#upUsername").val(data.username);
						$("#upPassword").val(data.password);
						$("#upNama").val(data.nama);
						$("#upTipe").val(data.tipe);
						$("#upStatus").val(data.status);
						$("#modal_edit_homecare ").modal('show');
					} else {
						alert("data tidak ditemukan");
					}
				}
			});
		}

		function hapus_master_staff(id_staff, nama) {
			// Pastikan `nama` diterima sebagai parameter atau diambil dari elemen lain
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
				// Melakukan AJAX request untuk menghapus data
				$.ajax({
					url: "<?= base_url() . 'Master_staff/hapus_master_staff' ?>", // URL controller
					method: "POST",
					dataType: 'json',
					data: {
						id_staff: id_staff, // ID staff yang akan dihapus
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "Berhasil!",
								type: "success",
								text: "Data staff berhasil dihapus.",
								confirmButtonColor: "#3cb878",
							});
							$('#datable').DataTable().ajax.reload(); // Reload tabel DataTable
						} else {
							swal({
								title: "Gagal!",
								type: "warning",
								text: data.message || "Gagal menghapus data.",
								confirmButtonColor: "#3cb878",
							});
						}
					},
					error: function(xhr, status, error) {
						swal({
							title: "Terjadi kesalahan!",
							type: "error",
							text: "Ada masalah dalam penghapusan data.",
							confirmButtonColor: "#3cb878",
						});
					}
				});
			});
			return false;
		}



		function updateMasterStaff() {
			id_staff = $("#upId_staff").val();
			username = ($("#upUsername").val());
			password = ($("#upPassword").val());
			nama = ($("#upNama").val());
			tipe = ($("#upTipe").val());
			status = ($("#upStatus").val());

			$.ajax({
				type: "POST",
				url: "<?php echo base_url() ?>Master_staff/edit_master_staff",
				dataType: 'json',
				data: {
					id_staff: id_staff,
					username: username,
					password: password,
					nama: nama,
					tipe: tipe,
					status: status,
				},
				success: function(data) {
					if (data.status == "success") {
						swal({
							title: "good job!",
							type: "success",
							text: "Data Berhasil diedit",
							confirmButtonColor: "#3cb878",
						});

						$("#modal_edit_homecare").modal('hide');
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
			})
		}

		// function hapus_obat(id_logistik) {
		//     swal({
		//         title: "Apakah kamu yakin?",
		//         text: "Menghapus data " + id_logistik + "?",
		//         type: "warning",
		//         showCancelButton: true,
		//         confirmButtonColor: "#3cb878",
		//         confirmButtonText: "Yakin",
		//         cancelButtonText: "Batal",
		//         closeOnConfirm: false
		//     }, function() {
		//         $().ready(function() {
		//             $.ajax({
		//                 url: "<?php echo base_url() ?>Po_obat/hapus_obat",
		//                 method: "POST",
		//                 dataType: 'json',
		//                 data: {
		//                     id_logistik: id_logistik,
		//                 },
		//                 success: function(data) {
		//                     if (data.status == "success") {
		//                         swal({
		//                             title: "good job!",
		//                             type: "success",
		//                             text: "Data Berhasil dihapus",
		//                             confirmButtonColor: "#3cb878",
		//                         });
		//                         //$("#modalTambahObatFaktur").modal('show');
		//                         //$('#isiFaktur').DataTable().ajax.reload();
		//                         $('#datable').DataTable().ajax.reload();
		//                     } else {
		//                         swal({
		//                             title: "Gagal!",
		//                             type: "warning",
		//                             text: data.status,
		//                             confirmButtonColor: "#3cb878",
		//                         });
		//                     }
		//                 }
		//             });
		//         });

		//     });
		//     return false;
		// }
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
				"ajax": '<?php echo base_url('Master_staff/tampil_master_staff'); ?>',
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



>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
	<!--end of ajax-->