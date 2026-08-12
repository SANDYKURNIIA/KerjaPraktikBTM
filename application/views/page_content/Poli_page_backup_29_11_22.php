<<<<<<< HEAD
<!-- Row -->

<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">POLI <?php echo $nama_poli; ?></span></h6>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="table-wrap">
				<div class="table-responsive">
					<table id="datable" class="table table-hover display  pb-30" width="100%">
						<thead>
							<tr class="bg-success">
								<th>NO</th>
								<th>ERM</th>
								<th>CHECKOUT PASIEN</th>
								<th>BATAL BEROBAT</th>
								<th>TANGGAL PELAYANAN</th>
								<th>JAM PELAYANAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<!-- <th>RAWAT INAP</th> -->
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<!-- <th>CARA MASUK</th> -->
								<!-- <th>POLIKLINIK / RUANG</th> -->
								<th>JENIS KLAIM</th>
								<th>DIAGNOSA</th>
								<th>DPJP</th>
								<th>JENIS PELAYANAN</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>ERM</th>
								<th>CHECKOUT PASIEN</th>
								<th>BATAL BEROBAT</th>
								<th>TANGGAL PELAYANAN</th>
								<th>JAM PELAYANAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<!-- <th>RAWAT INAP</th> -->
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<!-- <th>CARA MASUK</th> -->
								<!-- <th>POLIKLINIK / RUANG</th> -->
								<th>JENIS KLAIM</th>
								<th>DIAGNOSA</th>
								<th>DPJP</th>
								<th>JENIS PELAYANAN</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<style>
	td {
		color: black;
	}

	.zoom:active {
		position: relative;
		overflow: hidden;
		transition: all .3s ease-in-out;
		-webkit-transform: scale(6.5);
		transform: scale(6.5);
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
				"sSearch": "Pencarian :",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext": "Selanjutnya",
					"sLast": "Terakhir"
				},
			},
			"ajax": '<?php echo base_url('Poli/tampil_pasien'); ?>',
			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],

		});
	});

	function reload_table(id_pelayanan) {
		$('#datable').dataTable().fnClearTable();
		$('#datable').dataTable().fnDestroy();
		$('#datable').DataTable({
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
				"url": '<?php echo base_url('Poli/tampil_pasien'); ?>',
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




	function insert_na_tindakan() {
		idPelayanan = $('#idPelayanan').val();
		id_history = $('#idHistory').val();
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_na_tindakan' ?>",
			data: {
				id_pelayanan: idPelayanan,
				id_history: id_history
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
					$("#na_tindakan").hide();
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

	function insert_na_obat() {
		idPelayanan = $('#inPelResep').val();
		id_history = $('#inHisResep').val();
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_na_obat' ?>",
			data: {
				id_pelayanan: idPelayanan,
				id_history: id_history
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
					$("#na_obat").hide();
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

	function insert_na_lab() {
		idPelayanan = $('#id_pel_lab').val();
		id_history = $('#id_his_lab').val();
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_na_lab' ?>",
			data: {
				id_pelayanan: idPelayanan,
				id_history: id_history
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
					$("#na_lab").hide();
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

	function insert_na_radio() {
		idPelayanan = $('#id_pel_rad').val();
		id_history = $('#id_his_rad').val();
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_na_radio' ?>",
			data: {
				id_pelayanan: idPelayanan,
				id_history: id_history
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
					$("#na_radio").hide();
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

	function edit_kasir(id_pelayanan, id_history) {
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_req_kasir' ?>",
			data: {
				id_pelayanan: id_pelayanan,
				id_history: id_history
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

	function check_out(id_pelayanan, id_history, nama) {
		swal({
			title: "Warning?",
			text: "Apakah kamu yakin ingin check out pasien " + nama + "?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: true

		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Kasir/insertCheckOutFisio",
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
								text: "Data Pasien " + nama + " Telah Berhasil di Check Out",
								confirmButtonColor: "#3cb878",
							});
							$('#datable').DataTable().ajax.reload();
							reload_table(id_pelayanan);

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

	function batal_berobat(id_pelayanan, nama) {
		swal({
			title: "Warning?",
			text: "Apakah kamu yakin ingin menghapus pasien " + nama + "?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: true

		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Pelayanan_masuk/delete_pasien",
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
								text: "Data Pasien " + nama + " Telah Berhasil di Hapus",
								confirmButtonColor: "#3cb878",
							});
							$('#datable').DataTable().ajax.reload();
							reload_table(id_pelayanan);

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
=======
<!-- Row -->

<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">POLI <?php echo $nama_poli; ?></span></h6>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="table-wrap">
				<div class="table-responsive">
					<table id="datable" class="table table-hover display  pb-30" width="100%">
						<thead>
							<tr class="bg-success">
								<th>NO</th>
								<th>ERM</th>
								<th>CHECKOUT PASIEN</th>
								<th>BATAL BEROBAT</th>
								<th>TANGGAL PELAYANAN</th>
								<th>JAM PELAYANAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<!-- <th>RAWAT INAP</th> -->
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<!-- <th>CARA MASUK</th> -->
								<!-- <th>POLIKLINIK / RUANG</th> -->
								<th>JENIS KLAIM</th>
								<th>DIAGNOSA</th>
								<th>DPJP</th>
								<th>JENIS PELAYANAN</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>ERM</th>
								<th>CHECKOUT PASIEN</th>
								<th>BATAL BEROBAT</th>
								<th>TANGGAL PELAYANAN</th>
								<th>JAM PELAYANAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<!-- <th>RAWAT INAP</th> -->
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<!-- <th>CARA MASUK</th> -->
								<!-- <th>POLIKLINIK / RUANG</th> -->
								<th>JENIS KLAIM</th>
								<th>DIAGNOSA</th>
								<th>DPJP</th>
								<th>JENIS PELAYANAN</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<style>
	td {
		color: black;
	}

	.zoom:active {
		position: relative;
		overflow: hidden;
		transition: all .3s ease-in-out;
		-webkit-transform: scale(6.5);
		transform: scale(6.5);
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
				"sSearch": "Pencarian :",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext": "Selanjutnya",
					"sLast": "Terakhir"
				},
			},
			"ajax": '<?php echo base_url('Poli/tampil_pasien'); ?>',
			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],

		});
	});

	function reload_table(id_pelayanan) {
		$('#datable').dataTable().fnClearTable();
		$('#datable').dataTable().fnDestroy();
		$('#datable').DataTable({
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
				"url": '<?php echo base_url('Poli/tampil_pasien'); ?>',
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




	function insert_na_tindakan() {
		idPelayanan = $('#idPelayanan').val();
		id_history = $('#idHistory').val();
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_na_tindakan' ?>",
			data: {
				id_pelayanan: idPelayanan,
				id_history: id_history
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
					$("#na_tindakan").hide();
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

	function insert_na_obat() {
		idPelayanan = $('#inPelResep').val();
		id_history = $('#inHisResep').val();
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_na_obat' ?>",
			data: {
				id_pelayanan: idPelayanan,
				id_history: id_history
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
					$("#na_obat").hide();
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

	function insert_na_lab() {
		idPelayanan = $('#id_pel_lab').val();
		id_history = $('#id_his_lab').val();
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_na_lab' ?>",
			data: {
				id_pelayanan: idPelayanan,
				id_history: id_history
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
					$("#na_lab").hide();
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

	function insert_na_radio() {
		idPelayanan = $('#id_pel_rad').val();
		id_history = $('#id_his_rad').val();
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_na_radio' ?>",
			data: {
				id_pelayanan: idPelayanan,
				id_history: id_history
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
					$("#na_radio").hide();
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

	function edit_kasir(id_pelayanan, id_history) {
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_req_kasir' ?>",
			data: {
				id_pelayanan: id_pelayanan,
				id_history: id_history
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

	function check_out(id_pelayanan, id_history, nama) {
		swal({
			title: "Warning?",
			text: "Apakah kamu yakin ingin check out pasien " + nama + "?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: true

		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Kasir/insertCheckOutFisio",
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
								text: "Data Pasien " + nama + " Telah Berhasil di Check Out",
								confirmButtonColor: "#3cb878",
							});
							$('#datable').DataTable().ajax.reload();
							reload_table(id_pelayanan);

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

	function batal_berobat(id_pelayanan, nama) {
		swal({
			title: "Warning?",
			text: "Apakah kamu yakin ingin menghapus pasien " + nama + "?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: true

		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Pelayanan_masuk/delete_pasien",
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
								text: "Data Pasien " + nama + " Telah Berhasil di Hapus",
								confirmButtonColor: "#3cb878",
							});
							$('#datable').DataTable().ajax.reload();
							reload_table(id_pelayanan);

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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>