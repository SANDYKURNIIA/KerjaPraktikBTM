	<!-- Row -->
	<div class="panel panel-default card-view mt-20">
		<div class="panel-heading">
			<div class="pull-left">
				<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">LAPORAN BOR</span>
				</h6>

			</div>
			<!-- <button class="btn btn-primary btn-anim pull-right mr-50" data-toggle="modal" data-target=".modal-pendaftaranakun"><i class="icon-plus"></i><span class="btn-text">AKUN
	                BARU</span></button> -->
			<div class="clearfix"></div>
		</div>
		<h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
		<div class="panel-wrapper collapse in">
			<div class="panel-body">
				<form id="form-filter" class="form-horizontal">

					<div class="form-group">
						<label for="tanggal_keluar" class="col-sm-2 control-label">TAHUN</label>
						<div class="col-md-2 has-success">
							<input type="text" class="form-control" id="tahun">
						</div>
					</div>
					<div class="form-group">
						<label for="LastName" class="col-sm-2 control-label"></label>
						<div class="col-sm-4">
							<button type="button" onClick="this.value='Submitting..';this.disabled=true;" id="btn-filter" class="btn btn-primary">Cari</button>
							<button type="button" id="btn-reset" class="btn btn-default">Reset</button>
						</div>
					</div>
				</form>

				<div class="table-wrap">
					<!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->
					<div class="table-responsive">
						<table class="table table-hover display  pb-30" id="datable">
							<thead>
								<tr>
									<!-- <th>TAHUN</th>
									<th>BULAN</th>
									<th>HP</th>
									<th>LAMA RAWAT</th>
									<th>PASIEN KELUAR</th>
									<th>PERIODE</th>
									<th>TT</th>
									<th>O</th>
									<th>Bor</th> -->
									<th rowspan="2">TAHUN</th>
									<th rowspan="2">BULAN</th>
									<th rowspan="2">KELAS</th>
									<th rowspan="2">RUANGAN</th>
									<th rowspan="2">HP</th>
									<th rowspan="2">LAMA RAWAT</th>
									<th rowspan="2">PASIEN KELUAR</th>
									<th colspan="2">PAS MENINGGAL</th>
									<th rowspan="2">PASIEN KELUAR (H+M)</th>
									<th rowspan="2">PERIODE</th>
									<th rowspan="2">TT</th>
									<!-- <th rowspan="2">O</th> -->
									<th colspan="6" style="text-align: center">INDIKATOR RAWAT INAP</th>


									<!-- <th>DIAGNOSA</th>
	                                <th>KODE DTD</th> -->
									<!-- <th colspan="2">0-28 hr</th>
	                                <th colspan="2">28 < 1 th</th> <th colspan="2">1-4 th</th>
	                                <th colspan="2">5-14 th</th>
	                                <th colspan="2">15-24 th</th>
	                                <th colspan="2">25-44 th</th>
	                                <th colspan="2">45-64 th</th>
	                                <th colspan="2">65+</th>
	                                <th rowspan="2">JUMLAH</th> -->
								</tr>
								<tr>
									<th>
										< 48 JAM</th> <th>> 48 JAM
									</th>

									<th>Bor</th>
									<th>AVLOS</th>
									<th>TOI</th>
									<th>BTO</th>
									<th>NDR</th>
									<th>GDR</th>


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
				"pageLength": 12,
				"bPaginate": false,
				"bLengthChange": false,
				"bFilter": true,
				"bInfo": false,
				"bAutoWidth": false,
				"dom": 'Bfrtip',
				"buttons": ['csv', 'excel', 'pdf', 'print'],
				// "buttons": [{
				// 		extend: 'print',
				// 		torientation: 'landscape',
				// 		title: 'LAPORAN SIBATIK',
				// 		exportOptions: {
				// 			columns: [0, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22],
				// 		}
				// 	},

				// 	{
				// 		extend: 'excelHtml5',
				// 		title: 'LAPORAN SIBATIK',
				// 		exportOptions: {
				// 			columns: [0, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22],
				// 		}
				// 	},

				// 	{
				// 		extend: 'pdfHtml5',
				// 		orientation: 'landscape',
				// 		title: 'LAPORAN SIBATIK',
				// 		customize: function(doc) {
				// 			doc.defaultStyle.fontSize = 8;
				// 			doc.styles.tableHeader.fontSize = 8;
				// 			doc.defaultStyle.alignment = 'center';
				// 			doc.pageMargins = [20, 20, 20, 20];
				// 		},
				// 		pageSize: 'LEGAL',
				// 		exportOptions: {
				// 			columns: [0, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22],
				// 		}
				// 	},

				// ],
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
					"url": "<?php echo base_url('Laporan/tampil_data_pasien_bor'); ?>",
					"type": "POST",
					"data": function(data) {
						data.tahun = $('#tahun').val();

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