<<<<<<< HEAD
<!-- Row -->

<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">LAPORAN TINDAKAN FISIO</span></h6>
		</div>
		<div class="clearfix"></div>

		<div class="row mt-30">
			<div class="col-md-12">
				<div class="col-md-3 mt-20 pl-5">
					<button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
				</div>
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
	</div>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="table-wrap">
				<div class="table-responsive">
					<table id="datable" class="table table-hover display pb-30" width="100%">
						<thead>
							<tr class="bg-success">
								<th>NO</th>
								<th>TINDAKAN</th>
								<!-- <th>KELAS</th> -->
								<th>JUMLAH</th>
								<!-- <th>BIAYA</th> -->
								<!-- <th>TOTAL</th> -->
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
                                <th>NO</th>
								<th>TINDAKAN</th>
								<!-- <th>KELAS</th> -->
								<th>JUMLAH</th>
								<!-- <th>BIAYA</th> -->
								<!-- <th>TOTAL</th> -->
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
</style>


<script type="text/javascript">
	$(document).ready(function() {
		$('#datable').DataTable({
			"dom": 'Bfrtip',
			"buttons": ['csv', 'excel', 'pdf'],
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
			"ajax": '<?php echo base_url('Laporan/tampil_laporan_fisio'); ?>',
			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
		});
	});

	function tampilHariIni() {
		$('#datable').DataTable().destroy();
		$('#datable').DataTable({
			"retrieve": true,
			"dom": 'Bfrtip',
			"buttons": ['csv', 'excel', 'pdf'],
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
			"ajax": '<?php echo base_url('Laporan/tampil_laporan_fisio'); ?>',
			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
		});
	}

	function tampilRangePermit(mulai, akhir) {
		$('#datable').DataTable().destroy();
		mulai = $("#inTglMulai").val();
		akhir = $("#inTglAkhir").val();
		$('#datable').DataTable({
			"retrieve": true,
			"dom": 'Bfrtip',
			"buttons": ['csv', 'excel', 'pdf'],
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
				"url": '<?= base_url('Laporan/tampil_laporan_fisio'); ?>',
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
=======
<!-- Row -->

<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">LAPORAN TINDAKAN FISIO</span></h6>
		</div>
		<div class="clearfix"></div>

		<div class="row mt-30">
			<div class="col-md-12">
				<div class="col-md-3 mt-20 pl-5">
					<button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
				</div>
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
	</div>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="table-wrap">
				<div class="table-responsive">
					<table id="datable" class="table table-hover display pb-30" width="100%">
						<thead>
							<tr class="bg-success">
								<th>NO</th>
								<th>TINDAKAN</th>
								<!-- <th>KELAS</th> -->
								<th>JUMLAH</th>
								<!-- <th>BIAYA</th> -->
								<!-- <th>TOTAL</th> -->
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
                                <th>NO</th>
								<th>TINDAKAN</th>
								<!-- <th>KELAS</th> -->
								<th>JUMLAH</th>
								<!-- <th>BIAYA</th> -->
								<!-- <th>TOTAL</th> -->
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
</style>


<script type="text/javascript">
	$(document).ready(function() {
		$('#datable').DataTable({
			"dom": 'Bfrtip',
			"buttons": ['csv', 'excel', 'pdf'],
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
			"ajax": '<?php echo base_url('Laporan/tampil_laporan_fisio'); ?>',
			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
		});
	});

	function tampilHariIni() {
		$('#datable').DataTable().destroy();
		$('#datable').DataTable({
			"retrieve": true,
			"dom": 'Bfrtip',
			"buttons": ['csv', 'excel', 'pdf'],
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
			"ajax": '<?php echo base_url('Laporan/tampil_laporan_fisio'); ?>',
			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
		});
	}

	function tampilRangePermit(mulai, akhir) {
		$('#datable').DataTable().destroy();
		mulai = $("#inTglMulai").val();
		akhir = $("#inTglAkhir").val();
		$('#datable').DataTable({
			"retrieve": true,
			"dom": 'Bfrtip',
			"buttons": ['csv', 'excel', 'pdf'],
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
				"url": '<?= base_url('Laporan/tampil_laporan_fisio'); ?>',
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>