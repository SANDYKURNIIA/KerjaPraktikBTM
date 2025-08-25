<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN POLIFISIO</span></h6>
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
								<!-- <th>CHECK OUT</th> -->
								<th>TANGGAL PELAYANAN</th>
								<th>JAM PELAYANAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>RUANGAN</th>
								<!-- <th>POLIKLINIK/RUANG</th> -->
								<th>CARA BAYAR</th>
								<th>DIAGNOSA</th>
								<th>DPJP</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>TINDAKAN</th>
								<!-- <th>CHECK OUT</th> -->
								<th>TANGGAL PELAYANAN</th>
								<th>JAM PELAYANAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>RUANGAN</th>
								<!-- <th>POLIKLINIK/RUANG</th> -->
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
	<div class="modal fade bs-example-modal-lg" id="modal_fisio" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST REHAB
					</h5>
				</div>
				<div class="modal-body">
					<div class="form-wrap">
						<!-- /formbody -->
						<div class="form-body mt-10">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">TIPE KAMAR</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="KAMAR" style="border: 1px solid lightgreen;" id="inTipeKamarFisio" name="inTipeKamarFisio">
												<option value="-">
													-</option>
												<?php
												foreach ($data_tipe_kamar as $row) :
												?>
													<option value="<?php echo $row->nama ?>">
														<?php echo $row->nama; ?>
													</option>
												<?php endforeach; ?>

											</select>
											<span class="help-block"></span>

										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">TINDAKAN</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="PILIH TINDAKAN" style="border: 1px solid lightgreen;" id="outTindakanFisio" onchange="pilihTindakanFisio(this)">
												<option value="-">-</option>

											</select>
											<span class="help-block"></span>

										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">TOTAL TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="number" class="form-control" id="outJumlahTindakan" oninput="hargaTotalFisio()">
											<input type="hidden" class="form-control" disabled id="id_pelayanan">
											<input type="hidden" class="form-control" disabled id="id_history">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<!--/span-->


								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">BIAYA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="outBiayaTindakan" disabled>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">TOTAL HARGA</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control " disabled id="outTotalfisio">
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA DOKTER</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="PILIH DOKTER" style="border: 1px solid lightgreen;" id="inDPJP">
												<option value="-">-</option>
												<?php
												foreach ($dokter as $row) : ?>
													<option value="<?php echo $row['id_dokter']; ?>">
														<?php echo $row['nama']; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block"></span>

							<div class="row">
								<div class="col-md-8">
									<div class="form-group pull-right">
										<button onclick="insert_fisio()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
											<!-- <button onclick="insert_na_radio()" class="btn btn-warning btn-anim  btn-sm ml-20 mt-5" id="na_radio"><i class="icon-rocket"></i><span class="btn-text">N/A</span> -->
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="modal-body mt-10">
					<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
					<hr width="95%">
					<div class="table-wrap" style="width: 95%; margin: auto ">
						<div class="table-responsive">
							<table class="table table-hover display  pb-60" id="tablefisio">
								<thead>
									<tr class="bg-success">
										<th>NO</th>
										<!-- <th>AKSI</th> -->
										<!-- <th>EXPERTISE</th> -->
										<th>NAMA</th>
										<th>TANGGAL TINDAKAN</th>
										<th>JUMLAH TINDAKAN</th>
										<th>BIAYA TINDAKAN </th>
										<th>DPJP</th>
										<!-- <th>STAFF KONFIRMASI</th> -->
										<!-- <th>GAMBAR</th> -->
										<!-- <th>KETERANGAN</th> -->
										<th>STAFF REQUEST</th>
										<th>HAPUS</th>
									</tr>
								</thead>
								<tbody style="color: black">
								</tbody>
								<tfoot>
									<tr class="bg-success">
										<th>NO</th>
										<!-- <th>AKSI</th> -->
										<!-- <th>EXPERTISE</th> -->
										<th>NAMA</th>
										<th>TANGGAL TINDAKAN</th>
										<th>JUMLAH TINDAKAN</th>
										<th>BIAYA TINDAKAN </th>
										<th>DPJP</th>
										<!-- <th>STAFF KONFIRMASI</th> -->
										<!-- <th>GAMBAR</th> -->
										<!-- <th>KETERANGAN</th> -->
										<th>STAFF REQUEST</th>
										<th>HAPUS</th>
									</tr>
								</tfoot>
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
</div>



<style>
	td {
		color: black;
	}
</style>

<script type="text/javascript">
	function reload_data_tindakan(id_pelayanan) {
		$('#tablefisio').dataTable().fnClearTable();
		$('#tablefisio').dataTable().fnDestroy();
		$('#tablefisio').DataTable({
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
				"url": '<?php echo base_url('Poli/tampil_list_tindakan'); ?>',
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


	//fisio
	function tindakan_fisio(id_pelayanan, id_history, jenis_pelayanan) {
		$.ajax({
			url: "<?= base_url() . 'Rawatinap/getdata_ranap' ?>",
			data: {
				pelayanan: id_pelayanan,
				history: id_history
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				$("#modal_fisio").modal('show');
				reload_data_tindakan(id_pelayanan);
				$('#id_pelayanan').val(id_pelayanan);
				$('#id_history').val(id_history);
				$('#inTipeKamarFisio').val(data.kelas).change();

				// if (data.status_dt == "found") {
				//     // if (data.countTin == 0) {
				//     // 	$("#na_radio").show();
				//     // } else {
				//     // 	$("#na_radio").hide();
				//     // }
				//     $("#id_pelayanan").val(data.data['id_pelayanan']);
				//     $("#id_his_rad").val(id_history);
				//     reload_data_fisio(id_pelayanan);
				//     $("#modal_fisio").modal('show');

				// } else {
				//     alert("data tidak ditemukan");
				// }
			}
		});
	}
	$(document).ready(function() {
		$('#inTipeKamarFisio').change(function() {
			var tipe_kamar = $('#inTipeKamarFisio').val();

			$.ajax({
				url: "<?php echo base_url(); ?>Rawatinap/getTindakanByTipeKamarFisio",
				method: "POST",
				data: {
					tipe_kamar: tipe_kamar
				},
				dataType: 'json',
				success: function(data) {
					var html = '';
					var i;
					html += '<option value=' + '-' + '>' + '-' + '</option>';
					for (i = 0; i < data.length; i++) {

						html += '<option value="' + data[i].id_list_tindakan + '|' + data[i].harga_sarana + '|' + data[i].harga_jasa + '|' + data[i].nama + '">' + data[i].nama + '</option>';
					}
					$('#outTindakanFisio').html(html);
				}
			});

		});
	});

	//reload data
	function reload_data_fisio(id_pel_lab) {
		$('#tablefisio').dataTable().fnClearTable();
		$('#tablefisio').dataTable().fnDestroy();
		$('#tablefisio').DataTable({
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
				"url": '<?php echo base_url('Poli/tampil_list_fisio'); ?>',
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

	function hapus_data_tindakan(id_tindakan_igd, id_pelayanan) { //
		swal({
			title: "Warning?",
			text: "Apakah kamu yakin menghapus data ID Tindakan :" + id_tindakan_igd + "?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Poli/hapus_data_tindakan",
					method: "POST",
					dataType: 'json',
					data: {
						id_tindakan: id_tindakan_igd,
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Id diagnosa" + id_tindakan_igd + " Berhasil dihapus",
								confirmButtonColor: "#3cb878",
							});
							reload_data_tindakan(id_pelayanan);
							reload_table(id_pelayanan);
							$('#outTotalHarga').DataTable().ajax.reload();
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


	// check out
	function check_out(id_pelayanan, id_history) {
		swal({
			title: "Warning?",
			text: "Apakah kamu yakin ingin check out pasien " + id_pelayanan + "?",
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

				});
				$('#datable').DataTable().ajax.reload();
				reload_table(id_pelayanan);
			});
		});
		return false;
	}
</script>

<script type="text/javascript">
	function insert_tindakan() {
		a = $("#inTindakan").val();
		dokter = $("#inDPJP").val();
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]);
		frek = parseFloat($("#inJumlah").val());
		total = harga * frek;
		var ID = Math.random().toString(36).substr(2, 16);
		idPelayanan = $('#idPelayanan').val();
		id_list_tindakan = $('#id_tindakan_igd').val();
		id_history = $("#idHis").val();
        nama_dokter = $.trim($("#inDPJP").children("option:selected").text()); 

		dataString = 'id_tindakan_igd=' + ID + '&harga=' + harga +
			'&idPelayanan=' + idPelayanan + '&id_list_tindakan=' + splitDiag[0] +
			'&frek=' + frek + '&total=' + total +
			'&dokter=' + dokter + '&id_history=' + id_history +
			'&nama_dokter=' + nama_dokter + '&nama_tindakan=' + splitDiag[2];
		$.ajax({
			url: "<?= base_url() . 'IGD/insert_tindakan' ?>",
			method: "POST",
			dataType: 'json',
			data: dataString,
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Data Tindakan berhasil ditambahkan!",
						confirmButtonColor: "#3cb878",
					});
					reload_data_tindakan(idPelayanan);
					reload_data_fisio(idPelayanan);
					$('#outTotalHarga').DataTable().ajax.reload();
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
				"url": '<?php echo base_url('Pasien/tampil_data_fisioranap'); ?>',
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
			"ajax": '<?php echo base_url('Pasien/tampil_data_fisioranap'); ?>',
			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],

		});

	});
</script>

<script type="text/javascript">
	function pilihTindakan() {
		a = $("#inTindakan").val();
		splitDiag = a.split("|");

		harga = parseFloat(splitDiag[1]);
		jasa = parseFloat(splitDiag[2]);
		$("#outBiayaTindakan").val(convertToRupiah(harga));
		document.getElementById("inJumlah").value = "1";
		document.getElementById("outTotal").value = convertToRupiah(harga);
	}

	function convertToRupiah(angka) {
		var rupiah = '';
		var angkarev = angka.toString().split('').reverse().join('');
		for (var i = 0; i < angkarev.length; i++)
			if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
		return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
	}

	function hargaTotal() {
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]);
		frek = parseFloat($("#inJumlah").val());
		total = harga * frek;


		$("#outTotal").val(convertToRupiah(total));

	}
</script>
<script type="text/javascript">
	//Obat
	function convertToRupiah(angka) {
		var rupiah = '';
		var angkarev = angka.toString().split('').reverse().join('');
		for (var i = 0; i < angkarev.length; i++)
			if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
		return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
	}

	function reload_data_resep(id_pelayanan, id_history) {
		$('#tableresep').dataTable().fnClearTable();
		$('#tableresep').dataTable().fnDestroy();
		$('#tableresep').DataTable({
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
				"url": '<?php echo base_url('Poli/tampil_resep'); ?>',
				"type": 'POST',
				"data": {
					id_pelayanan: id_pelayanan,
					id_history: id_history
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

	function reload_data_racikan(id_resep) {
		$('#tableRacikan').dataTable().fnClearTable();
		$('#tableRacikan').dataTable().fnDestroy();
		$('#tableRacikan').DataTable({
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
				"url": '<?php echo base_url('Poli/tampil_racikan'); ?>',
				"type": 'POST',
				"data": {
					id_resep: id_resep
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

	function reload_data_obat(id_resep) {
		$('#tableobat').dataTable().fnClearTable();
		$('#tableobat').dataTable().fnDestroy();
		$('#tableobat').DataTable({
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
				"url": '<?php echo base_url('Poli/tampil_obat'); ?>',
				"type": 'POST',
				"data": {
					id_resep: id_resep,
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

	function cetak_antrian() {
		id_pelayanan = $('#inPelResep').val();
		$.ajax({
			url: "<?php echo base_url() ?>Poli/insertAntrian",
			method: "POST",
			data: {
				id_pelayanan: id_pelayanan,
			},

			success: function() {
				window.location.href = '<?php echo base_url() ?>Poli/print_antrian_apotik';

			}
		})

	}

	function edit_obat(idPel, idHis) {
		id_pelayanan = idPel;
		$.ajax({
			url: "<?php echo base_url() ?>IGD/cekTindakanObat",
			method: "POST",
			data: {
				id_pelayanan: id_pelayanan,
			},

			success: function(data) {
				// if (data == 0) {
				// 	$("#na_obat").show();
				// } else {
				// 	$("#na_obat").hide();
				// }
				$('#inPelResep').val(idPel);
				$('#inHisResep').val(idHis);
				$("#modal_edit_resep").modal('show');
				$("#collap_nonracikan").collapse('hide');
				$("#collap_racikan").collapse('hide');
				reload_data_resep(idPel, idHis);

			}
		})

	}

	function pilih_obat(idResep, tipe, cara_bayar) {
		if (tipe == 2) {
			$('#inResObat').val(idResep);
			$('#tipe_resep').val(tipe);
			$("#collap_racikan").collapse('show');
			$("#collap_nonracikan").collapse('hide');
			reload_data_racikan(idResep);
		} else {
			$('#cara_bayar').val(cara_bayar);
			$('#tipe_resep').val(tipe);
			$('#inResObat').val(idResep);
			$("#collap_nonracikan").collapse('show');
			$("#collap_racikan").collapse('hide');
			reload_data_obat(idResep);
		}
	}

	function batalFarmasi() {
		$("#collap_nonracikan").collapse('hide');
		$("#collap_racikan").collapse('hide');
	}

	function insert_resep() {
		jenis_resep = $('#inJenisResep').val();
		nama_resep = $('#inNamaResep').val();
		id_pelayanan = $('#inPelResep').val();
		id_history = $('#inHisResep').val();
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_resep' ?>",
			method: "POST",
			dataType: 'json',
			data: {
				jenis_resep: jenis_resep,
				nama_resep: nama_resep,
				id_pelayanan: id_pelayanan,
				id_history: id_history
			},
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Tindakan ini Telah di Simpan!",
						confirmButtonColor: "#3cb878",
					});
					$('#inJenisResep').val(1).change();
					$('#inNamaResep').val('');
					$("#collap_nonracikan").collapse('hide');
					$("#collap_racikan").collapse('hide');
					$('#tableresep').DataTable().ajax.reload();
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

	function insert_resep_racikan() {
		resep = $('#inResep').val();
		id_resep = $('#inResObat').val();
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_resep_racikan' ?>",
			method: "POST",
			dataType: 'json',
			data: {
				resep: resep,
				id_resep: id_resep,
			},
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Tindakan ini Telah di Simpan!",
						confirmButtonColor: "#3cb878",
					});

					$('#inResep').val('');
					$("#collap_nonracikan").collapse('hide');
					$("#collap_racikan").collapse('show');
					$('#tableRacikan').DataTable().ajax.reload();
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

	function insert_Obat() {
		id_pelayanan = $('#inPelResep').val();
		id_history = $('#inHisResep').val();
		id_resep = $('#inResObat').val();
		caraBayar = $('#cara_bayar').val();
		tipe = $('#tipe_resep').val();
		a = $("#inObat").val();
		depo = $("#inDepo").val();
		splitDiag = a.split("|");
		margin = parseFloat(splitDiag[2]);
		ket = $("#inKeteranganObat").val();
		id_list_tindakan = splitDiag[0];
		ppn = parseFloat(splitDiag[1]) * (parseFloat(splitDiag[5]) / 100);
		harga = parseFloat(splitDiag[1]) + ppn;
		// hargaMargin = parseFloat(splitDiag[1]) * parseFloat(splitDiag[2]);

		frek = parseFloat($("#inJumlahObat").val());
		disc = parseFloat($("#inDisc").val());
		expire = (splitDiag[3]);
		jumlahKurang = frek * -1;

		// if ((caraBayar == "WA14BJ84" && tipe == "1") || (caraBayar == "WA14BJ84" && tipe == "2")) {
		// 	total = harga * frek;
		// } else if (caraBayar == "WA14BJ84" && tipe == "3") {
		// 	total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
		// } else {
		total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
		//}
		signa = $('#inSigna').val();
		cara_pakai = $('#inCaraPakai').val();

		$.ajax({
			url: "<?= base_url() . 'IGD/insert_obat' ?>",
			method: "POST",
			dataType: 'json',
			cache: true,
			data: {
				id_pelayanan: id_pelayanan,
				id_history: id_history,
				id_resep: id_resep,
				depo: depo,
				margin: margin,
				ket: ket,
				harga: harga,
				frek: frek,
				disc: disc,
				expire: expire,
				jumlahKurang: jumlahKurang,
				total: total,
				id_list_tindakan: id_list_tindakan,
				signa: signa,
				cara_pakai: cara_pakai,
				jenis_pelayanan: 'IGD'
			},
			success: function(data) {
				if (data.status == "success") {
					$.toast({
						heading: 'Success!',
						text: 'Tindakan ini telah ditambah',
						showHideTransition: 'fade',
						icon: 'success'
					})
					$('#formObat')[0].reset();
					$("#collap_nonracikan").collapse('show');

					$("#collap_racikan").collapse('hide');
					$('#tableobat').DataTable().ajax.reload();
					$('#inDepo').val('APOTIK').change();
					$('#inObat').val('-').change();
					$('#inTglExp').val('');
					$("#inKeteranganObat").removeData();
					$("#inJumlahObat").val('1');
					$("#inDisc").val(0);
					$("#outBiayaTindakanObat").val('');
					$("#outBiayaMarginObat").val('');
					$("#outStok").val('0');
					$("#outTotalObat").val('');
					$('#inSigna').val('-').change();
					$('#inCaraPakai').val('-').change();
					$('#datable').DataTable().ajax.reload();
				} else {
					$.toast({
						heading: 'Error!',
						text: data.status,
						showHideTransition: 'fade',
						icon: 'error'
					})
				}
			}
		});
	}

	function cetakSigna1() {
		// id_resep = $('#inResObat').val();
		id_tindakan = $('#inResObat1').val();
		signa = $('#inSigna').val();
		cara_pakai = $('#inCaraPakai').val();
		$.ajax({
			url: "<?php echo base_url() ?>Apotik/cetak_signa",
			method: "POST",
			dataType: 'json',
			data: {
				signa: signa,
				cara_pakai: cara_pakai,
				id_tindakan: id_tindakan
			},
			success: function(data) {
				if (data.status == "success") {
					window.location.href = '<?php echo base_url() ?>Apotik/print_signa/' + id_tindakan;

				} else {
					swal({
						title: "Gagal!",
						text: data.error,
						type: "warning",
						confirmButtonColor: "#3cb878",
					});
				}
			}

		});
		return false;
	}





	// tindakan fisio
	function pilihTindakanFisio() {
		a = $("#outTindakanFisio").val();
		splitDiag = a.split("|");

		harga = parseFloat(splitDiag[1]);
		jasa = parseFloat(splitDiag[2]);
		harga1 = harga + jasa
		total = (harga + jasa)
		document.getElementById("outJumlahTindakan").value = "1";
		document.getElementById("outBiayaTindakan").value = convertToRupiah(harga1);
		document.getElementById("outTotalfisio").value = convertToRupiah(total);
	}

	// insert data fisio
	function insert_fisio() {
		a = $("#outTindakanFisio").val();
		dokter = $("#inDPJP").val();
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]);
		jasa = parseFloat(splitDiag[2]);
		id_pelayanan = $('#id_pelayanan').val();
		id_history = $('#id_history').val();
		frek = parseFloat($("#outJumlahTindakan").val());
		total = (jasa + harga) * frek;
		id_list_tindakan = $('#id_list_tindakan').val();
		nama = $('#nama').val();
		var ID = Math.random().toString(36).substr(2, 16);
        nama_dokter = $.trim($("#inDPJP").children("option:selected").text()); 

		dataString = 'id=' + ID +
			'&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history + '&id_list_tindakan=' + splitDiag[0] +
			'&frek=' + frek + '&dokter=' + dokter + '&total=' + total + '&jenis_pelayanan=' + 'RAWAT INAP' +
			'&nama_dokter=' + nama_dokter + '&nama_tindakan=' + splitDiag[3];
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_fisio' ?>",
			method: "POST",
			dataType: 'json',
			data: dataString,
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Tindakan ini Telah di Simpan!",
						confirmButtonColor: "#3cb878",
					});
					$('#outTindakanFisio').val('');
					$('#outJumlahTindakan').val('');
					$("#tipeKamar").val("KELAS I").trigger('change');
					$('#outTotalfisio').val('');
					$('#tablefisio').DataTable().ajax.reload();
					// $('#outTotalfisio').DataTable().ajax.reload();
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

	function hargaTotalFisio() {
		a = $("#outTindakanFisio").val();
		splitDiag = a.split("|");
		harga_sarana = parseFloat(splitDiag[1]);
		harga_jasa = parseFloat(splitDiag[2]);
		frek = parseFloat($("#outJumlahTindakan").val());
		total = (harga + jasa) * frek

		$("#outTotalfisio").val(convertToRupiah(total));
	}

	function setHarga() {

		caraBayar = $('#cara_bayar').val();
		tipe = $('#tipe_resep').val();
		obat = $('#inObat').val();
		splitDiag = obat.split("|");
		stok = (splitDiag[4]);
		disc = parseFloat($("#inDisc").val());
		if (disc > 35) {
			disc = 35;
		}
		if (caraBayar == "WA14BJ84") {
			disc = 0;
		}

		$("#inDisc").val(disc);


		$("#outStok").val(stok);


		ppn = parseFloat(splitDiag[1]) * (parseFloat(splitDiag[5]) / 100);
		harga = parseFloat(splitDiag[1]) + ppn;
		hargaMargin = harga * parseFloat(splitDiag[2]);
		$("#outBiayaTindakanObat").val(convertToRupiah(harga.toFixed(0)));
		$("#outBiayaMarginObat").val(convertToRupiah(hargaMargin.toFixed(0)));

		frek = parseFloat($("#inJumlahObat").val());
		if (frek > stok) {
			$("#inJumlahObat").val(stok);
		} else if (frek < 0) {
			$("#inJumlahObat").val(1);
		}
		frek = parseFloat($("#inJumlahObat").val());

		// 		  if (document.getElementById('inRadioCost').checked ) {
		// if ((caraBayar == "WA14BJ84" && tipe == "1") || (caraBayar == "WA14BJ84" && tipe == "2")) {
		// 	total = harga * frek;
		// } else if (caraBayar == "WA14BJ84" && tipe == "3") {
		// 	total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
		// } else {
		total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
		//}

		$("#outTotalObat").val(convertToRupiah(total.toFixed(0)));

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
</script>
<script type="text/javascript">
	/*Typeahead Init*/

	$(function() {
		"use strict";

		/*Basic*/

		var substringMatcher = function(strs) {
			return function findMatches(q, cb) {
				var matches, substringRegex;

				// an array that will be populated with substring matches
				matches = [];

				// regex used to determine if a string contains the substring `q`
				var substrRegex = new RegExp(q, 'i');

				// iterate through the pool of strings and for any string that
				// contains the substring `q`, add it to the `matches` array
				$.each(strs, function(i, str) {
					if (substrRegex.test(str)) {
						matches.push(str);
					}
				});

				cb(matches);
			};
		};

		var states = [
			<?php

			foreach ($signa as $row) {


				echo ",'" .  $row["tindakan"] . "'";
			}  ?>
		];
		var states1 = [
			<?php

			foreach ($cara_pemakaian_obat as $row) {


				echo ",'" .  $row["cara_pemakaian"] . "'";
			}  ?>
		];


		$('#the-basics .typeahead').typeahead({
			hint: true,
			highlight: true,
			minLength: 1
		}, {
			name: 'states',
			source: substringMatcher(states)
		});

		$('#the-basics1 .typeahead').typeahead({
			hint: true,
			highlight: true,
			minLength: 1
		}, {
			name: 'states1',
			source: substringMatcher(states1)
		});


	});
</script>