<<<<<<< HEAD
<!-- Row -->

<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">TINDAKAN LABOR SENDIRI</span></h6>
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
								<th>TINDAKAN</th>
								<!-- <th>N/A</th> -->
								<th>KASIR</th>
								<th>TANGGAL PELAYANAN</th>
								<th>CARA MASUK</th>
								<th>JAM PELAYANAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>POLIKLINIK / RUANG</th>
								<th>DIAGNOSA</th>
								<th>CARA BAYAR</th>
								<th>DPJP</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>TINDAKAN</th>
								<!-- <th>N/A</th> -->
								<th>KASIR</th>
								<th>TANGGAL PELAYANAN</th>
								<th>JAM PELAYANAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLIKLINIK / RUANG</th>
								<th>CARA BAYAR</th>
								<th>DIAGNOSA</th>
								<th>DPJP</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- End -->

	<!-- Dewasa -->
	<?php $this->load->view('page_content/Labor-PASIENDEWASA'); ?>
	<!-- End -->

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
			"ajax": '<?php echo base_url('Penunjang_RM/tampil_datalabor'); ?>',
			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
		});
	});

	function aksi_data_tindakan(id_pelayanan, id_history, nama, umr, umur, jenis_kelamin) {
		$("#id_pel_lab").val(id_pelayanan);
		$("#id_his_lab").val(id_history);
		$("#inPelLab").val(id_pelayanan);
		$("#inHisLab").val(id_history);
		$("#inNamaPasienDEWASA").val(nama);
		$("#inJenisPasienDEWASA").val(jenis_kelamin);
		$("#inUmurPasienDEWASA").val(umur);
		$("#modal_edit_DEWASA").modal('show');
		reload_data_form_labor(id_pelayanan);
		reload_total_labor_DEWASA(id_pelayanan);
		$.ajax({
			url: "<?= base_url() . 'Poli/getdata' ?>",
			data: {
				id_pelayanan: id_pelayanan,
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status_dt == "found") {
					if (data.data.cara_bayar == '30') {
						$('#pembayaran').collapse('show');
					} else {
						$('#pembayaran').collapse('hide');

					}
				} else {
					swal({
						title: "Gagal!",
						type: "warning",
						text: "Maaf, Data tidak ditemukan",
						confirmButtonColor: "#3cb878",
					});
				}
			}
		});
	}

	// 	function edit_na(id_pelayanan, id_history) {
	// 	$.ajax({
	// 		url: "</?= base_url() . 'Poli/insert_na_lab' ?>",
	// 		data: {
	// 			id_pelayanan: id_pelayanan,
	// 			id_history: id_history
	// 		},
	// 		type: 'POST',
	// 		dataType: 'json',
	// 		success: function(data) {
	// 			if (data.status == "success") {
	// 				swal({
	// 					title: "good job!",
	// 					type: "success",
	// 					text: "Data berhasil ditambahkan",
	// 					confirmButtonColor: "#3cb878",
	// 				});
	// 				$("#na_radio").hide();
	// 				$('#datable').DataTable().ajax.reload();
	// 			} else {
	// 				swal({
	// 					title: "Gagal!",
	// 					type: "warning",
	// 					text: data.status,
	// 					confirmButtonColor: "#3cb878",
	// 				});
	// 			}
	// 		}
	// 	});
	// }
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
</script>


<?php $this->load->view('page_content/Labor-PASIENHARI-JS'); ?>
<?php $this->load->view('page_content/Labor-PASIENBULAN-JS'); ?>
<?php $this->load->view('page_content/Labor-PASIENANAK-JS'); ?>
=======
<!-- Row -->

<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">TINDAKAN LABOR SENDIRI</span></h6>
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
								<th>TINDAKAN</th>
								<!-- <th>N/A</th> -->
								<th>KASIR</th>
								<th>TANGGAL PELAYANAN</th>
								<th>CARA MASUK</th>
								<th>JAM PELAYANAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>POLIKLINIK / RUANG</th>
								<th>DIAGNOSA</th>
								<th>CARA BAYAR</th>
								<th>DPJP</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>TINDAKAN</th>
								<!-- <th>N/A</th> -->
								<th>KASIR</th>
								<th>TANGGAL PELAYANAN</th>
								<th>JAM PELAYANAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLIKLINIK / RUANG</th>
								<th>CARA BAYAR</th>
								<th>DIAGNOSA</th>
								<th>DPJP</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- End -->

	<!-- Dewasa -->
	<?php $this->load->view('page_content/Labor-PASIENDEWASA'); ?>
	<!-- End -->

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
			"ajax": '<?php echo base_url('Penunjang_RM/tampil_datalabor'); ?>',
			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
		});
	});

	function aksi_data_tindakan(id_pelayanan, id_history, nama, umr, umur, jenis_kelamin) {
		$("#id_pel_lab").val(id_pelayanan);
		$("#id_his_lab").val(id_history);
		$("#inPelLab").val(id_pelayanan);
		$("#inHisLab").val(id_history);
		$("#inNamaPasienDEWASA").val(nama);
		$("#inJenisPasienDEWASA").val(jenis_kelamin);
		$("#inUmurPasienDEWASA").val(umur);
		$("#modal_edit_DEWASA").modal('show');
		reload_data_form_labor(id_pelayanan);
		reload_total_labor_DEWASA(id_pelayanan);
		$.ajax({
			url: "<?= base_url() . 'Poli/getdata' ?>",
			data: {
				id_pelayanan: id_pelayanan,
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status_dt == "found") {
					if (data.data.cara_bayar == '30') {
						$('#pembayaran').collapse('show');
					} else {
						$('#pembayaran').collapse('hide');

					}
				} else {
					swal({
						title: "Gagal!",
						type: "warning",
						text: "Maaf, Data tidak ditemukan",
						confirmButtonColor: "#3cb878",
					});
				}
			}
		});
	}

	// 	function edit_na(id_pelayanan, id_history) {
	// 	$.ajax({
	// 		url: "</?= base_url() . 'Poli/insert_na_lab' ?>",
	// 		data: {
	// 			id_pelayanan: id_pelayanan,
	// 			id_history: id_history
	// 		},
	// 		type: 'POST',
	// 		dataType: 'json',
	// 		success: function(data) {
	// 			if (data.status == "success") {
	// 				swal({
	// 					title: "good job!",
	// 					type: "success",
	// 					text: "Data berhasil ditambahkan",
	// 					confirmButtonColor: "#3cb878",
	// 				});
	// 				$("#na_radio").hide();
	// 				$('#datable').DataTable().ajax.reload();
	// 			} else {
	// 				swal({
	// 					title: "Gagal!",
	// 					type: "warning",
	// 					text: data.status,
	// 					confirmButtonColor: "#3cb878",
	// 				});
	// 			}
	// 		}
	// 	});
	// }
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
</script>


<?php $this->load->view('page_content/Labor-PASIENHARI-JS'); ?>
<?php $this->load->view('page_content/Labor-PASIENBULAN-JS'); ?>
<?php $this->load->view('page_content/Labor-PASIENANAK-JS'); ?>
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
<?php $this->load->view('page_content/Labor-PASIENDEWASA-JS'); ?>