<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="span span-success">TINDAKAN SIGNA OBAT</span></h6>
		</div>



		<div class="clearfix"></div>
	</div>

	<div align="right">
		<button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target="#modal_homecare"><i class="icon-plus"></i><span class="btn-text">TAMBAH TINDAKAN</span>
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

									<th>TINDAKAN</th>
								</tr>
							</thead>
							<tfoot class="bg-success">
								<th>NO</th>
								<th>EDIT</th>
								<th>HAPUS</th>

								<th>TINDAKAN</th>
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
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TAMBAH SIGNA OBAT

					</h5>
				</div>
				<div class="modal-body">
					<div class="form-wrap">
						<!-- /formbody -->
						<div class="form-body">
							<div class="row">
								<div class="col-md-6 mt-10">
									<div class="form-group ">
										<label class="control-label col-md-3">SIGNA OBAT</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control " autocomplete="off" placeholder="NAMA SIGNA" id="inTindakan">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<div class="form-actions mt-10 mb-20">
									<div class="form-actions mt-10">
										<div class="row">
											<div class="col-md-6"> </div>
											<div class="col-md-6">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" class="btn btn-success mr-10" onclick="insertTindakan()">SIMPAN</button>
														<span></span>
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

	<div class="modal fade bs-example-modal-lg" id="modal_edit_homecare" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT
						TINDAKAN SIGNA OBAT
					</h5>
				</div>
				<div class="modal-body">
					<div class="form-wrap">
						<!-- /formbody -->
						<div class="form-body">
							<div class="row">
								<div class="col-md-6 mt-10">
									<div class="form-group ">
										<label class="control-label col-md-3">TINDAKAN</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control " autocomplete="off" placeholder="NAMA TINDAKAN" id="upTindakan">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-actions mt-10 mb-20">
							<div class="form-actions mt-10">
								<div class="row">
									<div class="col-md-6"> </div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<input type="hidden" class="form-control " autocomplete="off" id="upId">
												<button type="submit" class="btn btn-success mr-10" onclick="updateTindakan()">SIMPAN</button>
												<span></span>
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
<!--akhir modal yang akan dipakai-->
<!--ajax-->
<script type="text/javascript">
	function insertTindakan() {
		nama = ($("#inTindakan").val());
		// biaya_sarana = ($("#inBiayaSarana").val());
		// jasa = ($("#inJasa").val());
		// status = ($("#inStatus").val());

		$.ajax({
			type: "POST",
			url: "<?php echo base_url() ?>Apotik/insert_tindakan_signaobat",
			dataType: 'json',
			data: {
				nama: nama,
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
					$("#inTindakan").val("");
					// $("#inBiayaSarana").val("");
					// $("#inJasa").val("");
					// $("#inTotal").val("");
					// $("#inStatus").val("");

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

	function edit_tindakan_signaobat(id_list_tindakan) {
		$.ajax({
			url: "<?php echo base_url() ?>Apotik/getDataTindakansignaobat",
			data: {
				id_list_tindakan: id_list_tindakan,
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status_dt == "found") {
					$("#upId").val(data.id_signa);
					$("#upTindakan").val(data.tindakan);
					$("#modal_edit_homecare ").modal('show');
				} else {
					alert("data tidak ditemukan");
				}
			}
		});
	}

	function hapus_form_signa(id_signa) {
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
					url: "<?= base_url() . 'Apotik/hapus_signa_obat' ?>",
					method: "POST",
					dataType: 'json',
					data: {
						id_signa: id_signa,
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Permintaan Sudah Dihapus",
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


	function updateTindakan() {
		id = $("#upId").val();
		nama = ($("#upTindakan").val());

		$.ajax({
			type: "POST",
			url: "<?php echo base_url() ?>Apotik/edit_tindakan_signaobat",
			dataType: 'json',
			data: {
				id: id,
				nama: nama,
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
			"ajax": '<?php echo base_url('Apotik/tampil_tindakan_signaobat'); ?>',
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



<!--end of ajax-->