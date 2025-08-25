<!-- Row -->

<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">LAPORAN KARTU STOK</span></h6>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<form id="form-filter" class="form-horizontal">

				<div class="form-group">
					<label for="tanggal_keluar" class="col-sm-2 control-label">Tanggal Mulai :</label>
					<div class="col-md-6 has-success">
						<input type="date" class="form-control" id="inTglMulai">
					</div>
				</div>
				<div class="form-group">
					<label for="tanggal_keluar" class="col-sm-2 control-label">Tanggal Akhir :</label>
					<div class="col-md-6 has-success">
						<input type="date" class="form-control" id="inTglAkhir">
					</div>
				</div>
				<div class="form-group">
					<label for="tanggal_keluar" class="col-sm-2 control-label mt-15">Nama Obat :</label>
					<div class="col-md-6 has-success">
						<select class="form-control select2" placeholder="Choose a Category" name="inNamaObat" id="inNamaObat">
						<option value="">-</option>	
						<?php foreach ($obat as $row) { ?>
								<option value="<?=$row->id_logistik?>"><?=$row->nama?></option>
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="tanggal_keluar" class="col-sm-2 control-label mt-15"></label>
					<div class="col-md-6 has-success">
						<button type="button" onClick="this.value='Submitting..';" id="btn-filter" class="btn btn-primary mr-20">Cari</button>
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
								<th>NO</th>
								<th>TANGGAL</th>
								<th>NAMA OBAT</th>
								<th>AWAL</th>
								<th>MASUK</th>
								<th>KELUAR</th>
								<th>SALDO</th>
								<th>ASAL/TUJUAN</th>
								<th>KETERANGAN</th>
								<th>STAFF</th>
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
				"url": "<?php echo base_url('Logistik_farmasi/Tampil_laporan_stok'); ?>",
				"type": "POST",
				"data": function(data) {
					data.awal = $('#inTglMulai').val();
					data.akhir = $('#inTglAkhir').val();
					data.id_logistik = $('#inNamaObat').val();

				}

			},

			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
		});
		$('#btn-filter').click(function() { //button filter event click
			datable.ajax.reload(); //just reload datable
		});
		$('#btn-reset').click(function() { //button reset event click
			$('#form-filter')[0].reset();
			$('#inNamaObat').val("").change();
			$("#btn-filter").attr("disabled", false);
			datable.ajax.reload(); //just reload table
		});
	});
</script>