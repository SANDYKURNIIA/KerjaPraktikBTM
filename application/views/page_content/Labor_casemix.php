<<<<<<< HEAD
<!-- Row -->
<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN LABOR</span></h6>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="table-wrap">
				<div class="table-responsive">
					<table id="datable" class="table table-hover display  pb-30">
						<thead>
							<tr class="bg-success">
								<th>NO</th>
								<th>TINDAKAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>ALAMAT</th>
								<th>TANGGAL MASUK</th>
								<th>JAM MASUK</th>
								<th>NO HP</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLIKLINIK / RUANG</th>
								<th>DPJP</th>
								<th>CARA BAYAR</th>
								<th>KETERANGAN</th>
								<th>NO SEP</th>
								<th>DIAGNOSA</th>
								<th>AGAMA</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>TINDAKAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>ALAMAT</th>
								<th>TANGGAL MASUK</th>
								<th>JAM MASUK</th>
								<th>NO HP</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLIKLINIK / RUANG</th>
								<th>DPJP</th>
								<th>CARA BAYAR</th>
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

	<!-- Dewasa -->
	<?php $this->load->view('page_content/Modal_labor_casemix'); ?>
	<!-- End -->


</div>

<!-- End -->

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
				"sSearch": "Pencarian :",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext": "Selanjutnya",
					"sLast": "Terakhir"
				},
			},
			"ajax": '<?php echo base_url('casemix/tampil_datarajal'); ?>',
			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
		});
	});


	function edit_data_tindakan(id) {
		$('#modal_edit_DEWASA').modal('show');
		reload_data_form_labor(id)
	}
	// End
	function reload_data_form_labor(id_pel_lab) {
		$('#tableFormLabor').dataTable().fnClearTable();
		$('#tableFormLabor').dataTable().fnDestroy();
		$('#tableFormLabor').DataTable({
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
				"url": '<?php echo base_url('casemix/tampil_form_labor'); ?>',
				"type": 'POST',
				"data": {
					id_pelayanan: id_pel_lab
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

	function pilih_labor(id) {

		$('#id_form_lab').val(id);
		$("#collapse_tindakan_labor").collapse('toggle');
		reload_data_labor_DEWASA(id)
		reload_total_labor_DEWASA(id)
	}
</script>

<script type="text/javascript">
	function convertToRupiah(angka) {
		var rupiah = '';
		var angkarev = angka.toString().split('').reverse().join('');
		for (var i = 0; i < angkarev.length; i++)
			if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
		return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
	}
</script>


=======
<!-- Row -->
<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN LABOR</span></h6>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="table-wrap">
				<div class="table-responsive">
					<table id="datable" class="table table-hover display  pb-30">
						<thead>
							<tr class="bg-success">
								<th>NO</th>
								<th>TINDAKAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>ALAMAT</th>
								<th>TANGGAL MASUK</th>
								<th>JAM MASUK</th>
								<th>NO HP</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLIKLINIK / RUANG</th>
								<th>DPJP</th>
								<th>CARA BAYAR</th>
								<th>KETERANGAN</th>
								<th>NO SEP</th>
								<th>DIAGNOSA</th>
								<th>AGAMA</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>TINDAKAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>ALAMAT</th>
								<th>TANGGAL MASUK</th>
								<th>JAM MASUK</th>
								<th>NO HP</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLIKLINIK / RUANG</th>
								<th>DPJP</th>
								<th>CARA BAYAR</th>
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

	<!-- Dewasa -->
	<?php $this->load->view('page_content/Modal_labor_casemix'); ?>
	<!-- End -->


</div>

<!-- End -->

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
				"sSearch": "Pencarian :",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext": "Selanjutnya",
					"sLast": "Terakhir"
				},
			},
			"ajax": '<?php echo base_url('casemix/tampil_datarajal'); ?>',
			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
		});
	});


	function edit_data_tindakan(id) {
		$('#modal_edit_DEWASA').modal('show');
		reload_data_form_labor(id)
	}
	// End
	function reload_data_form_labor(id_pel_lab) {
		$('#tableFormLabor').dataTable().fnClearTable();
		$('#tableFormLabor').dataTable().fnDestroy();
		$('#tableFormLabor').DataTable({
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
				"url": '<?php echo base_url('casemix/tampil_form_labor'); ?>',
				"type": 'POST',
				"data": {
					id_pelayanan: id_pel_lab
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

	function pilih_labor(id) {

		$('#id_form_lab').val(id);
		$("#collapse_tindakan_labor").collapse('toggle');
		reload_data_labor_DEWASA(id)
		reload_total_labor_DEWASA(id)
	}
</script>

<script type="text/javascript">
	function convertToRupiah(angka) {
		var rupiah = '';
		var angkarev = angka.toString().split('').reverse().join('');
		for (var i = 0; i < angkarev.length; i++)
			if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
		return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
	}
</script>


>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
