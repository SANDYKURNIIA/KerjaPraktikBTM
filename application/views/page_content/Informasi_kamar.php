<div class="panel panel-default card-view mt-20">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">ADMIN KAMAR</span>
			</h6>

		</div>
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
								<th>NAMA KAMAR</th>
								<th>LANTAI</th>
								<th>KAPASITAS</th>
								<th>TERSEDIA</th>
								<th>DIPAKAI (PRIA)</th>
								<th>DIPAKAI (WANITA)</th>

							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO.</th>
								<th>NAMA KAMAR</th>
								<th>LANTAI</th>
								<th>KAPASITAS</th>
								<th>TERSEDIA</th>
								<th>DIPAKAI (PRIA)</th>
								<th>DIPAKAI (WANITA)</th>

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

			"ajax": '<?php echo base_url('Admin_kamar/tampil_ruangan'); ?>',
		});

	});
</script>