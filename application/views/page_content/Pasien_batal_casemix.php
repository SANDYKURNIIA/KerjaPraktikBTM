<<<<<<< HEAD
<!-- Row -->

<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN RAWAT INAP</span></h6>
		</div>

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
					<table id="datables" class="table table-hover display pb-30" width="100%">
						<thead>
							<tr class="bg-success">
								<th>NO</th>
								<th>APPROVE</th>
								<th>NO RM</th>
								<th>NAMA</th>
								<th>TANGGAL MASUK</th>
								<th>DPJP</th>
								<th>ALASAN</th>
								<th>CARA BAYAR</th>
								<th>STAFF</th>
								<th>STATUS</th>
								<th>TANGGAL REQUEST</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>APPROVE</th>
								<th>NO RM</th>
								<th>NAMA</th>
								<th>TANGGAL MASUK</th>
								<th>DPJP</th>
								<th>ALASAN</th>
								<th>CARA BAYAR</th>
								<th>STAFF</th>
								<th>STATUS</th>
								<th>TANGGAL REQUEST</th>
							</tr>
						</tfoot>
					</table>
					<span id="hasil"></span>
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
			$('#datables').DataTable({
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
				"ajax": '<?php echo base_url('Casemix/tampil_pasien_batal'); ?>',
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
			$('#datables').DataTable().destroy();
			let today = new Date();

			let tomorrow = new Date();

			tomorrow.setDate(today.getDate() + 1);
			mulai = today.toISOString().slice(0, 10);
			akhir = tomorrow.toISOString().slice(0, 10);
			$('#datables').DataTable({
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
					"url": '<?= base_url('casemix/tampil_pasien_batal') ?>',
					"type": 'POST',
					"data": {
						tipe: 'range',
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

		function tampilRangePermit(mulai, akhir) {
			$('#datables').DataTable().destroy();

			mulai = $("#inTglMulai").val();
			akhir = $("#inTglAkhir").val();
			$('#datables').DataTable({
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
					"url": '<?= base_url('casemix/tampil_pasien_batal') ?>',
					"type": 'POST',
					"data": {
						tipe: 'range',
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


		function approve(id, id_history) {
			swal({
				title: "Warning?",
				text: "Apakah kamu yakin menghapus data ini?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3cb878",
				confirmButtonText: "Yakin",
				cancelButtonText: "Batal",
				closeOnConfirm: false
			}, function() {
				$().ready(function() {
					$.ajax({
						url: "<?php echo base_url() ?>Pelayanan_masuk/delete_pasien_konfirm_batal",
						method: "POST",
						dataType: "json",
						data: {
							id_pelayanan: id,
							id_history: id_history,
							approve:'ya'
						},
						complete: function(res){
						if(res.status !== 200 ){
                                swal({
                                    title: "Gagal!\nStatus Code "+res.status,
                                    type: "warning",
                                    confirmButtonColor: "#3cb878",
                            });
                        }else{
                            swal({
								title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $.ajax({
                                url:"<?= base_url() ?>/Casemix/approve_batal",
                                method:"POST",
                                dataType:"json",
                                data:{
                                    id:id
                                }
                             });
                                $('#datables').DataTable().ajax.reload();
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
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN RAWAT INAP</span></h6>
		</div>

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
					<table id="datables" class="table table-hover display pb-30" width="100%">
						<thead>
							<tr class="bg-success">
								<th>NO</th>
								<th>APPROVE</th>
								<th>NO RM</th>
								<th>NAMA</th>
								<th>TANGGAL MASUK</th>
								<th>DPJP</th>
								<th>ALASAN</th>
								<th>CARA BAYAR</th>
								<th>STAFF</th>
								<th>STATUS</th>
								<th>TANGGAL REQUEST</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>APPROVE</th>
								<th>NO RM</th>
								<th>NAMA</th>
								<th>TANGGAL MASUK</th>
								<th>DPJP</th>
								<th>ALASAN</th>
								<th>CARA BAYAR</th>
								<th>STAFF</th>
								<th>STATUS</th>
								<th>TANGGAL REQUEST</th>
							</tr>
						</tfoot>
					</table>
					<span id="hasil"></span>
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
			$('#datables').DataTable({
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
				"ajax": '<?php echo base_url('Casemix/tampil_pasien_batal'); ?>',
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
			$('#datables').DataTable().destroy();
			let today = new Date();

			let tomorrow = new Date();

			tomorrow.setDate(today.getDate() + 1);
			mulai = today.toISOString().slice(0, 10);
			akhir = tomorrow.toISOString().slice(0, 10);
			$('#datables').DataTable({
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
					"url": '<?= base_url('casemix/tampil_pasien_batal') ?>',
					"type": 'POST',
					"data": {
						tipe: 'range',
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

		function tampilRangePermit(mulai, akhir) {
			$('#datables').DataTable().destroy();

			mulai = $("#inTglMulai").val();
			akhir = $("#inTglAkhir").val();
			$('#datables').DataTable({
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
					"url": '<?= base_url('casemix/tampil_pasien_batal') ?>',
					"type": 'POST',
					"data": {
						tipe: 'range',
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


		function approve(id, id_history) {
			swal({
				title: "Warning?",
				text: "Apakah kamu yakin menghapus data ini?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3cb878",
				confirmButtonText: "Yakin",
				cancelButtonText: "Batal",
				closeOnConfirm: false
			}, function() {
				$().ready(function() {
					$.ajax({
						url: "<?php echo base_url() ?>Pelayanan_masuk/delete_pasien_konfirm_batal",
						method: "POST",
						dataType: "json",
						data: {
							id_pelayanan: id,
							id_history: id_history,
							approve:'ya'
						},
						complete: function(res){
						if(res.status !== 200 ){
                                swal({
                                    title: "Gagal!\nStatus Code "+res.status,
                                    type: "warning",
                                    confirmButtonColor: "#3cb878",
                            });
                        }else{
                            swal({
								title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $.ajax({
                                url:"<?= base_url() ?>/Casemix/approve_batal",
                                method:"POST",
                                dataType:"json",
                                data:{
                                    id:id
                                }
                             });
                                $('#datables').DataTable().ajax.reload();
						}
					}
					});
				});
			});
			return false;
		}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
	</script>