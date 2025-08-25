<div class="container-fluid">

	<!-- Row -->
	<div class="panel-wrapper collapse in">
		<!-- search rm -->
		<div class="container-fluid">
			<div class="container-fluid">
				<!-- /Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">LIST ANTRIAN</span></h6>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="row mt-30">
								<div class="col-md-12">
									<div class="col-md-3">
										<label class="mt-0 txt-dark">Tanggal Mulai : </label>
										<input type="date" autocomplete="off" id="inTglMulai" class="form-control">
									</div>
									<div class="col-md-3">
										<label class="mt-0 txt-dark">Tanggal Akhir : </label>
										<input type="date" autocomplete="off" id="inTglAkhir" class="form-control">
									</div>
									<div class="col-md-3 mt-20">
										<button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
									</div>
								</div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="tabledata" width="100%" class="table table-hover table-responsive mb-10">
												<thead>
													<tr class="bg-success">
														<th>NO ANTRIAN</th>
														<th>TANGGAL</th>
														<th>JAM</th>
														<th>NO RM</th>
														<th>NAMA</th>
														<th>CARA BAYAR</th>
														<th>STATUS</th>
														<th>SELESAI</th>
														<th>PANGGIL</th>
														<th>FINISH</th>
													</tr>
												</thead>
												<tfoot>
													<tr class="bg-success">
														<th>NO ANTRIAN</th>
														<th>TANGGAL</th>
														<th>JAM</th>
														<th>NO RM</th>
														<th>NAMA</th>
														<th>CARA BAYAR</th>
														<th>STATUS</th>
														<th>SELESAI</th>
														<th>PANGGIL</th>
														<th>FINISH</th>
													</tr>
												</tfoot>
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
<!-- End -->

<style>
	td {
		color: black;
	}
</style>

<script type="text/javascript">
	$(document).ready(function() {
		no_antrian = $('#no_antrian').val();

		if (no_antrian == 'l0') {
			$(".peringatan").show();
		} else {
			$(".peringatan").hide();
		}

		$('#tabledata').DataTable({
			"fnRowCallback": function(nRow, aData, iDisplayIndex) {
				// if (iDisplayIndex == 0) {
				// 	$(nRow).css('font-weight', 'bold');
				// }
			},
			"language": {
				"sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
				"sProcessing": "Sedang memproses...",
				"sLengthMenu": "Tampilkan _MENU_ entri",
				"sZeroRecords": "Tidak ditemukan data yang sesuai",
				"sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
				"sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
				"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
				"sInfoPostFix": "",
				"sSearch": "Pencarian:",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext": "Selanjutnya",
					"sLast": "Terakhir"
				},
			},
			"ajax": '<?php echo base_url('Apotik/tampilAntrian'); ?>',
			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
		});
	});


	function req(id_resep, id_pelayanan, tipe) {
		$.ajax({
			url: "<?= base_url() . 'Apotik/request_selesai' ?>",
			method: "POST",
			dataType: 'json',
			data: {
				id_resep: id_resep,
				id_pelayanan: id_pelayanan,
				tipe: tipe
			},
			success: function(data) {
				if (data.status == "success") {
					$.toast({
						heading: 'Success!',
						text: 'Tindakan ini telah ditambah',
						showHideTransition: 'fade',
						icon: 'success'
					});
					// $('#tableresep').DataTable().ajax.reload();
					$('#tabledata').DataTable().ajax.reload();
					//$('#tableobat').DataTable().ajax.reload();
					//$('#tableRacikan').DataTable().ajax.reload();

				} else if (data.status == "error") {
					swal({
						title: "Tindakan Belum Diisi",
						type: "warning",
						text: "Silahkan isi tindakan terlebih dahulu",
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
	}

	function playTableSuara(no_antri, nama, jenis, id_resep, inisial) {
		$.ajax({
			url: "<?= base_url() ?>Apotik/playSuara",
			method: "POST",
			dataType: 'json',
			data: {
				inisial: inisial,
				no_antri: no_antri,
				jenis: jenis,
				nama: nama,
				id_resep: id_resep
			},
			success: function(data) {
				if (data.status == "success") {
					$('#tabledata').DataTable().ajax.reload();
				} else {
					swal({
						title: "Gagal!",
						type: "warning",
						text: "Maaf terjadi kesalahan",
						confirmButtonColor: "#3cb878",
					});
				}
			}
		});
	}

	function done(id_resep) {
		$.ajax({
			url: "<?= base_url() ?>Apotik/done",
			method: "POST",
			dataType: 'json',
			data: {
				id_resep: id_resep
			},
			success: function(data) {
				if (data.status == "success") {
					$('#tabledata').DataTable().ajax.reload();
				} else {
					swal({
						title: "Gagal!",
						type: "warning",
						text: "Maaf terjadi kesalahan",
						confirmButtonColor: "#3cb878",
					});
				}
			}
		});
	}


	function skip_data(id_antrian) {
		$.ajax({
			url: "<?= base_url() ?>Apotik/updateskip",
			method: 'POST',
			dataType: 'json',
			data: {
				id_antrian: id_antrian,
			},
			success: function(data) {
				if (data.status == "success") {
					$('#tabledata').DataTable().ajax.reload();
				} else {
					swal({
						title: "Gagal!",
						type: "warning",
						text: "Maaf terjadi kesalahan",
						confirmButtonColor: "#3cb878",
					});
				}
			}
		});
	}

	function nextAntrian() {
		id_antrian = $('#id_antrian').val();
		$.ajax({
			url: "<?= base_url() ?>Apotik/updatenext",
			method: "POST",
			dataType: 'json',
			data: {
				id_antrian: id_antrian,
			},
			success: function(data) {
				if (data.status == "success") {
					location.reload();
				} else {
					swal({
						title: "Gagal!",
						type: "warning",
						text: "Maaf terjadi kesalahan",
						confirmButtonColor: "#3cb878",
					});
				}
			}
		});
	}

	function playSuara(no_antri, nama, jenis, id_resep) {
		nomor = "t" + no_antri;
		$.ajax({
			url: "<?= base_url() ?>Apotik/playSuara",
			method: "POST",
			dataType: 'json',
			data: {
				nomor: nomor,
				nama: nama,
				jenis: jenis,
				id_resep: id_resep
			},
			success: function(data) {
				if (data.status == "success") {
					location.reload();
				} else {
					swal({
						title: "Gagal!",
						type: "warning",
						text: "Maaf terjadi kesalahan",
						confirmButtonColor: "#3cb878",
					});
				}
			}
		});
	}

	function tampilRangePermit(mulai, akhir) {
		$('#tabledata').DataTable().destroy();
		mulai = $("#inTglMulai").val();
		akhir = $("#inTglAkhir").val();
		$('#tabledata').DataTable({
			"retrieve": true,
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
			"ajax": {
				"url": '<?= base_url('Apotik/tampilAntrian'); ?>',
				"type": 'POST',
				"data": {
					mulai: mulai,
					akhir: akhir
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