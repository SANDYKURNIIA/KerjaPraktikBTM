<!-- Row -->
<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">RIWAYAT PASIEN RADIOLOGI</span></h6>
		</div>
		<div class="clearfix"></div>

		<div class="row mt-30">
			<div class="col-md-12">
				<div class="col-md-3 mt-20 pl-5">
					<button class="btn btn-primary btn-anim btn-md" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
				</div>
				<div class="col-md-3">
					<label class="mt-0 txt-dark">Tanggal Mulai : </label>
					<input type="date" autocomplete="off" id="inTglMulai" class="form-control" style="cursor:pointer;">
				</div>
				<div class="col-md-3">
					<label class="mt-0 txt-dark">Tanggal Akhir : </label>
					<input type="date" autocomplete="off" id="inTglAkhir" class="form-control" style="cursor:pointer;">
				</div>
				<div class="col-md-3 mt-20">
					<button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRange();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
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
								<th>TANGGAL PELAYANAN</th>
								<th>JAM PELAYANAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLIKLINIK / RUANG</th>
								<th>JENIS KLAIM</th>
								<th>DIAGNOSA</th>
								<th>DOKTER DPJP</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>TINDAKAN</th>
								<th>TANGGAL PELAYANAN</th>
								<th>JAM PELAYANAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLIKLINIK / RUANG</th>
								<th>JENIS KLAIM</th>
								<th>DIAGNOSA</th>
								<th>DOKTER DPJP</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade bs-example-modal-lg" id="modal_radiologi" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST RADIOLOGI
				</h5>
			</div>


			<div class="modal-body mt-10">
				<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
				<hr width="95%">
				<div class="table-wrap" style="width: 100%; margin: auto ">
					<div class="table-responsive">
						<table class="table table-hover display  pb-60" id="tableradiologi">
							<thead>
								<tr class="bg-success">
									<th>NO</th>
									<th>EXPERTISE</th>
									<th>NAMA</th>
									<th>TANGGAL TINDAKAN</th>
									<th>BIAYA TINDAKAN </th>
									<th>JUMLAH TINDAKAN</th>
									<th>STAFF REQUEST</th>
									<th>STAFF KONFIRMASI</th>
									<th>GAMBAR</th>
									<th>KETERANGAN</th>
									<th>STATUS</th>
									<th>HAPUS</th>
								</tr>
							</thead>
							<tfoot>
								<tr class="bg-success">
									<th>NO</th>
									<th>EXPERTISE</th>
									<th>NAMA</th>
									<th>TANGGAL TINDAKAN</th>
									<th>BIAYA TINDAKAN </th>
									<th>JUMLAH TINDAKAN</th>
									<th>STAFF REQUEST</th>
									<th>STAFF KONFIRMASI</th>
									<th>GAMBAR</th>
									<th>KETERANGAN</th>
									<th>STATUS</th>
									<th>HAPUS</th>
								</tr>
							</tfoot>
							<tbody style="color: black">
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-8">
				</div>
				<div class="col-md-4 pull-right mt-20">

					<div class="table-wrap" style="width: 85%; margin-bottom:40px;">
						<!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->
						<div class="table-responsive ">
							<table class="table table-hover display " id="outTotalHargaRadiologi">
								<thead>
									<tr class="bg-success">
										<th style="font-weight:bold;">Total Keseluruhan</th>
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
<style>
	td {
		color: black;
	}
</style>


<script type="text/javascript">
	$(document).ready(function() {
		$('#datable').DataTable({
			"dom": 'Bfrtip',
			"buttons": ['csv', 'excel', 'print'],
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
			"ajax": '<?php echo base_url('Radiologi/tampil_riwayat_pasien'); ?>',
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
			"buttons": ['csv', 'excel', 'print'],
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
			"ajax": '<?php echo base_url('Radiologi/tampil_riwayat_pasien'); ?>',
			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
		});
	}

	function tampilRange() {
		$('#datable').DataTable().destroy();
		mulai = $("#inTglMulai").val();
		akhir = $("#inTglAkhir").val();
		$('#datable').DataTable({
			"retrieve": true,
			"dom": 'Bfrtip',
			"buttons": ['csv', 'excel', 'print'],
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
				"url": '<?= base_url('Radiologi/tampil_range_riwayat_pasien'); ?>',
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

	function edit_data_tindakan(id_pelayanan, id_history) {

		$("#modal_radiologi").modal('show');
		reload_data_radiologi(id_pelayanan);
		reload_total_radiologi(id_pelayanan);
	}

	function reload_data_radiologi(id_pel_rad) {
		$('#tableradiologi').dataTable().fnClearTable();
		$('#tableradiologi').dataTable().fnDestroy();
		$('#tableradiologi').DataTable({
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
				"url": '<?php echo base_url('IGD/tampil_list_radiologi'); ?>',
				"type": 'POST',
				"data": {
					id_pelayanan: id_pel_rad
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

	function reload_total_radiologi(id_pelayanan) {
		$('#outTotalHargaRadiologi').dataTable().fnClearTable();
		$('#outTotalHargaRadiologi').dataTable().fnDestroy();
		$('#outTotalHargaRadiologi').DataTable({
			"pageLength": 10,
			"searching": false,
			"lengthChange": false,
			"bInfo": false,
			"paging": false,
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
				"url": '<?php echo base_url('IGD/tampil_total_radiologi'); ?>',
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
</script>