<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">DAFTAR FAKTUR OBAT</h6>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target="#modal_tambahstok"><i class="icon-plus"></i><span class="btn-text">TAMBAH/KURANG
								STOK</span></button>

					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">




						<div class="table-wrap">
							<!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

							<div class="table-responsive">
								<table class="table table-hover display  pb-30" id="datable">
									<thead>
										<tr class="bg-success">
											<th>NO</th>
											<th>NAMA OBAT</th>
											<th>HARGA</th>
											<!-- <th>TANGGAL EXPIRED</th> -->
											<th>GOLONGAN OBAT</th>
											<th>PRODUSEN</th>
											<th>SISA STOK</th>
											<th>TIPE</th>
											<th>DETAIL</th>
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


			<!-- Datatables -->

			<!-- Modal -->

			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<!-- sample modal content -->

					<div class="modal fade " id="modal_tambahstok" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">


						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								</div>

								<!--modal 1-->

								<div class="modal-body">
									<!-- Form body  -->
									<form class="form-horizontal">
										<div class="form-body mt-20">

											<div class="row">
												<div class="col-md-12">
													<div class="panel panel-default card-view">
														<div class="panel-heading">
															<div class="pull-left">
																<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO
																	STOK</h6>
															</div>
															<div class="clearfix"></div>
														</div>
														<div class="panel-wrapper collapse in">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-12 col-xs-12">
																		<div class="form-wrap">


																			<div class="form-body">

																				<hr>
																				<div class="row">

																					<div class="col-md-6">
																						<div class="form-group ">
																							<label class="control-label col-md-3">NAMA
																								BARANG</label>
																							<div class="col-md-9 has-success">
																								<select class="form-control filled-input select2" onchange="tampilStok()" id="inLogistik">
																									<option value="-">-</option>

																									<?php foreach ($obat as $row) { ?>
																										<option value="<?php echo $row["id_logistik"] . "|" . $row["stok"] . "|" . $row["nama"]; ?>">
																											<?php echo $row["nama"]; ?>
																										</option>

																									<?php } ?>

																								</select>

																							</div>
																						</div>
																					</div>

																					<!--/span-->

																					<div class="col-md-6">
																						<div class="form-group">
																							<label class="control-label col-md-3">STOK
																								ASLI</label>
																							<div class="col-md-9 has-success">
																								<input type="number" class="form-control " placeholder="JUMLAH" id="StokAsli" value="0">

																							</div>
																						</div>
																					</div>

																					<div class="col-md-6">
																						<div class="form-group">
																							<label class="control-label col-md-3">TANGGAL
																								EXPIRED</label>
																							<div class="col-md-9 has-success">
																								<input type="date" class="form-control txt-dark" data-toggle="datepicker" placeholder="JUMLAH" autocomplete="off" id="inTglExp">

																							</div>
																						</div>
																					</div>
																					<!--/span-->
																				</div>
																				<!-- /Row -->
																				<div class="form-actions mt-10">
																					<button onclick="insertStok()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">Tambah</span></button>
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

					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<!-- sample modal content -->

							<div class="modal fade" id="modal_edit" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">


								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">

											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>


										</div>



										<!--modal 1-->
										<div class="modal-body">
											<!-- Form body  -->
											<form class="form-horizontal">
												<div class="form-body mt-20">

													<div class="row">
														<div class="col-md-12">
															<div class="panel panel-default card-view">

																<div class="panel-wrapper collapse in">
																	<div class="panel-body">
																		<div class="row">
																			<div class="col-sm-12 col-xs-12">
																				<div class="form-wrap">


																					<div class="form-body">
																						<div id="editDetailStok" class="collapse">
																							<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO
																								OBAT</h6>
																							<hr>
																							<div class="row">
																								<div class="col-sm-12 col-xs-12">
																									<div class="form-wrap">


																										<div class="form-body">

																											<hr>
																											<div class="row">

																												<div class="col-md-6">
																													<div class="form-group ">
																														<label class="control-label col-md-3">NAMA BARANG</label>
																														<div class="col-md-9 has-error">
																															<input type="hidden" class="form-control filled-input" placeholder="" name="id_logistik" id="id_logistik">
																															<input type="text" class="form-control " placeholder="JUMLAH" id="inBarang" disabled="">

																														</div>
																													</div>
																												</div>

																												<!--/span-->
																												<div class="col-md-6">
																													<div class="form-group ">
																														<label class="control-label col-md-3">STOK
																															TERSEDIA</label>
																														<div class="col-md-9 has-error">
																															<input type="text" class="form-control " id="inTersedia" disabled="">

																														</div>
																													</div>
																												</div>
																												<!-- /Row -->
																												<div class="col-md-6">
																													<div class="form-group">
																														<label class="control-label col-md-3">STOK
																															ASLI</label>
																														<div class="col-md-9 has-success">
																															<input type="number" class="form-control " placeholder="JUMLAH" id="inStokAsli" oninput="tampilSelisih()" value="0">

																														</div>
																													</div>
																												</div>
																												<div class="col-md-6">
																													<div class="form-group ">
																														<label class="control-label col-md-3">SELISIH</label>
																														<div class="col-md-9 has-error">
																															<input type="text" class="form-control " id="inSelisih" disabled="" value="0">

																														</div>
																													</div>
																												</div>

																												<div class="col-md-6">
																													<div class="form-group">
																														<label class="control-label col-md-3">TANGGAL EXPIRED</label>
																														<div class="col-md-9 has-error">
																															<input type="date" class="form-control " id="inKadaluarsa" value="0">

																														</div>
																													</div>
																												</div>
																												<!--/span-->
																											</div>
																											<!-- /Row -->
																											<div class="form-actions mt-10">
																												<button onclick="insertStok2()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">Tambah</span></button>
																											</div>
																										</div>
																									</div>
																								</div>
																							</div>


																							<div class="seprator-block"></div>
																						</div>
																						<div class="panel-heading">
																							<div class="pull-left">
																								<h6 class="panel-title txt-dark">DETAIL STOK OBAT</h6>
																							</div>
																							<div class="clearfix"></div>
																						</div>

																						<div class="panel-wrapper collapse in">
																							<div class="panel-body">
																								<div class="table-wrap">
																									<div class="table-responsive">
																										<table id="datablestok" class="table table-hover display  pb-30">
																											<thead>
																												<tr>
																													<th>NO</th>
																													<th>NAMA OBAT</th>
																													<th>TANGGAL EXPIRED</th>
																													<th>STOK</th>
																													<th>EDIT STOK</th>
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
																	</div>
																</div>
															</div>
														</div>
													</div>
													<!-- /.modal-content -->
												</div>
												<!-- /.modal-dialog -->
										</div>
										<!--end modal-->
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>
	<!-- End -->







	<div class="seprator-block"></div>
	<!--end of coba-->



	<script type="text/javascript">
		// function insertStok() {

		// 	idFaktur = $("#idStruk").val();
		// 	a = $("#inLogistik").val();
		// 	splitDiag = a.split("|");
		// 	idLogistik = splitDiag[0];
		// 	stok = parseFloat($("#inTersedia").val());
		// 	nama = splitDiag[2];
		// 	frek = $("#StokAsli").val();
		// 	tglExp = $("#inTglExp").val();
		// 	asli = parseFloat($("#StokAsli").val());
		// 	total = stok + (asli);
		// 	var ID = Math.random(0.).toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50);
		// 	var ID2 = Math.random().toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50);
		// 	dataString =
		// 		'frek=' + frek + '&id_logistik=' + idLogistik +
		// 		'&id=' + ID + '&tglExp=' + tglExp;
		// 	// 		  alert(dataString);
		// 	$.ajax({
		// 		type: "POST",
		// 		url: "<?php echo base_url() ?>Tambah_stok_logistik/insertUpdateStok",
		// 		data: dataString,
		// 		success: function() {

		// 			alert("STOK " + nama + " MENJADI " + total);
		// 			// echo "<meta http-equiv='refresh' content='0'>";
		// 			// window.location.reload(true); 
		// 			// tampilTambahFaktur();

		// 			$('#datable').DataTable().ajax.reload();
		// 			$("#modal_tambahstok").modal('hide');

		// 		}
		// 	})
		// }

		function insertStok() {

			idFaktur = $("#idStruk").val();
			a = $("#inLogistik").val();
			splitDiag = a.split("|");
			idLogistik = splitDiag[0];
			stok = parseFloat($("#inTersedia").val());
			nama = splitDiag[2];
			frek = $("#StokAsli").val();
			tglExp = $("#inTglExp").val();

			var ID = Math.random().toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50);
			var ID2 = Math.random().toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50);
			dataString =
				'frek=' + frek + '&id_logistik=' + idLogistik +
				'&id=' + ID + '&tglExp=' + tglExp;
			// 		  alert(dataString);
			swal({
				title: "Apakah kamu yakin?",
				text: "Menambah stok ini?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3cb878",
				confirmButtonText: "Yakin",
				cancelButtonText: "Batal",
				closeOnConfirm: false
			}, function() {
				$().ready(function() {
					$.ajax({
						url: "<?php echo base_url() ?>Tambah_stok_logistik/insertUpdateStok",
						method: "POST",
						dataType: 'json',
						data: {
							frek: frek,
							id_logistik: idLogistik,
							tglExp: tglExp,
							id: ID,


						},
						success: function(data) {
							if (data.status == "success") {
								swal({
									title: "good job!",
									type: "success",
									text: "Berhasil ditambah " + frek,
									confirmButtonColor: "#3cb878",
								});
								$("#inLogistik").val("-").change();
								$("#idStruk").val("");
								$("#inTersedia").val(0);
								$("#StokAsli").val(0);
								$('#datable').DataTable().ajax.reload();
								$("#modal_tambahstok").modal('hide');

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

		function insertStok2() {

			idFaktur = $("#idStruk").val();
			a = $("#inBarang").val();
			splitDiag = a.split("|");
			idLogistik = $("#id_logistik").val();
			stok = parseFloat($("#inTersedia").val());
			nama = splitDiag[2];
			frek = $("#inSelisih").val();
			tglExp = $("#inKadaluarsa").val();
			asli = parseFloat($("#inStokAsli").val());
			var ID = Math.random(0.).toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50);
			var ID2 = Math.random().toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50);

			// 		  alert(dataString);
			swal({
				title: "Apakah kamu yakin?",
				text: "Mengubah data ini?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3cb878",
				confirmButtonText: "Yakin",
				cancelButtonText: "Batal",
				closeOnConfirm: false
			}, function() {
				$().ready(function() {
					$.ajax({
						url: "<?php echo base_url() ?>Tambah_stok_logistik/insertUpdateStok",
						method: "POST",
						dataType: 'json',
						data: {
							frek: frek,
							id_logistik: idLogistik,
							tglExp: tglExp,
							id: ID,


						},
						success: function(data) {
							if (data.status == "success") {
								swal({
									title: "good job!",
									type: "success",
									text: "Berhasil diubah menjadi " + asli,
									confirmButtonColor: "#3cb878",
								});

								//$("#idStruk").val("");
								//$("#id_logistik").val("");
								//$("#inKadaluarsa").val("");
								$("#inTersedia").val(0);
								$("#inStokAsli").val(0);
								$("#inSelisih").val(0);
								$("#editDetailStok").collapse('hide');
								$('#datablestok').DataTable().ajax.reload();
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

		/* function updateStok() {
	    
        frek=$("#inStokAsli").val();
		id_stok=$("#id_stok").val();
    swal({
					title: "Apakah kamu yakin?",
					text: "Mengubah data ini?",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#3cb878",
					confirmButtonText: "Yakin",
					cancelButtonText: "Batal",
					closeOnConfirm: false
				}, function() {
					$().ready(function() {
						$.ajax({
							url: "<?php echo base_url() ?>Tambah_stok_logistik/updateStok",
							method: "POST",
							dataType: 'json',
							data: {
								frek: frek,
								id_stok: id_stok,
							},
							success: function(data) {
								if (data.status == "success") {
									swal({
										title: "good job!",
										type: "success",
										text: "Berhasil diubah menjadi "+frek,
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

    
*/
		function tampilStok() {
			a = $("#inLogistik").val();
			splitDiag = a.split("|");
			idBarang = splitDiag[0];
			stok = splitDiag[1];
			$("#inTersedia").val(stok);
			$("#inSelisih").val(stok * -1);
		}

		function editStokLogistik(id_stok, id_logistik, nama, id_stok, kadaluarsa, frek) {
			$("#id_stok").val(id_stok);
			$("#inBarang").val(nama);
			$("#id_logistik").val(id_logistik);
			$("#inKadaluarsa").val(kadaluarsa);
			$("#inTersedia").val(frek);
		}

		function tampilSelisih() {
			tersedia = parseFloat($("#inTersedia").val());
			asli = parseFloat($("#inStokAsli").val());
			selisih = asli - tersedia;
			$("#inSelisih").val(selisih);
		}
	</script>
	<!--  -->

	<!--tampil data-->

	<script type="text/javascript">
		function edit_detail(id_logistik) {
			$("#ModalDetailStok").modal('show');
			$('#datablestok').dataTable().fnClearTable();
			$('#datablestok').dataTable().fnDestroy();
			$('#datablestok').DataTable({
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
				"ajax": {
					"url": '<?php echo base_url('Tambah_stok_logistik/tampil_detail'); ?>',
					"type": 'POST',
					"data": {
						id_logistik: id_logistik
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
	<!--  -->

	<!--tampil data-->

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
				"ajax": '<?php echo base_url('Tambah_stok_logistik/tampil_stok_obat'); ?>',
				"deferRender": true,
				"processing": true,
				"order": [],
				"columnDefs": [{
					"targets": [0],
					"orderable": false,
				}, ],
			});
		});
		// Make to collapse hidden
		$('.data_hide').addClass('collapse');
	</script>

	<!--end tampil data-->