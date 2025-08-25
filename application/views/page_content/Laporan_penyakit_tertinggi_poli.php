	<!-- Row -->
	<div class="panel panel-default card-view mt-20">
		<div class="panel-heading">
			<div class="pull-left">
				<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">LAPORAN PENYAKIT TERTINGGI POLI</span>
				</h6>

			</div>
			<div class="clearfix"></div>
		</div>

		<div class="panel-wrapper collapse in">
			<div class="panel-body">
				<form id="form-filter" class="form-horizontal">
					<div class="form-group">
						<label for="tanggal_masuk" class="col-sm-2 control-label">Dari Tanggal :</label>
						<div class="col-md-2 has-success">
							<input type="date" class="form-control" id="tanggal_masuk">
						</div>

					</div>
					<div class="form-group">
						<label for="tanggal_keluar" class="col-sm-2 control-label">Sampai Tanggal :</label>
						<div class="col-md-2 has-success">
							<input type="date" class="form-control" id="tanggal_keluar">
						</div>
					</div>
					<div class="form-group">
						<label for="tanggal_keluar" class="col-sm-2 control-label mt-15"></label>
						<div class="col-md-6 has-success">
							<button type="button" onClick="this.value='Submitting..';this.disabled=true;" id="btn-filter" class="btn btn-primary mr-20">Cari</button>
							<button type="button" id="btn-reset" class="btn btn-default">Reset</button>
						</div>
					</div>
				</form>

				<div class="table-wrap">
					<!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->
					<div class="table-responsive">
						<table class="table table-hover display  pb-30" id="datable">
							<thead>
								<tr class="bg-success">
									<th rowspan="2">NO</th>
									<th rowspan="2">KODE</th>
									<th rowspan="2">DIAGNOSA</th>
									<th rowspan="2">KODE DTD</th>
									<th colspan="2">0-28 hr</th>
									<th colspan="2">28<1 th</th> <th colspan="2">1-4 th</th>
									<th colspan="2">5-14 th</th>
									<th colspan="2">15-24 th</th>
									<th colspan="2">25-44 th</th>
									<th colspan="2">45-64 th</th>
									<th colspan="2">65+</th>
									<th rowspan="2">JUMLAH</th>
								</tr>
								<tr class="bg-success">
									<th>lk</th>
									<th>pr</th>
									<th>lk</th>
									<th>pr</th>
									<th>lk</th>
									<th>pr</th>
									<th>lk</th>
									<th>pr</th>
									<th>lk</th>
									<th>pr</th>
									<th>lk</th>
									<th>pr</th>
									<th>lk</th>
									<th>pr</th>
									<th>lk</th>
									<th>pr</th>
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



	<div class="modal fade" id="ModalEditPasien" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="ModalLabel">Apakah anda yakin untuk
						men-onakitfkan?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post">
					<div class="modal-body">
						<input type="hidden" name="username" value="">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Yakin</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!--  Akhir ModalTutup -->
	<style>
		td {
			color: black;
		}
	</style>

	<script type="text/javascript">
		$(document).ready(function() {
			datable = $('#datable').DataTable({
				"processing": true, //Feature control the processing indicator.
				// "serverSide": true, //Feature control DataTables' server-side processing mode.
				"order": [], //Initial no order.
				"dom": 'Bfrtip',
				"buttons": ['csv', 'excel', 'pdf', 'print'],
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
					"url": "<?php echo base_url('Laporan/tampil_data_pasien_pt_poli'); ?>",
					"type": "POST",
					"data": function(data) {
						data.tanggal_masuk = $('#tanggal_masuk').val();
						data.tanggal_keluar = $('#tanggal_keluar').val();

					}

				},



			});
			$('#btn-filter').click(function() { //button filter event click
				datable.ajax.reload(); //just reload datable
			});
			$('#btn-reset').click(function() { //button reset event click
				$('#form-filter')[0].reset();
				$("#btn-filter").attr("disabled", false);
				datable.ajax.reload(); //just reload table
			});
		});
	</script>