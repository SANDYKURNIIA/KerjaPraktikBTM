<<<<<<< HEAD
<div class="panel panel-default card-view mt-20 ">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">DAFTAR PASIEN RAWAT INAP</span></h6>
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
								<th>NO</th>
								<th>TOTAL BIAYA</th>
								<th>LUAR TANGGUNGAN</th>
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
								<th>DOKTER DPJP</th>
						</thead>


					</table>
				</div>
			</div>
		</div>
	</div>
	<div id="div_result" style="display: none;"></div>

</div>
<!-- modal edit data -->
<div class="modal fade bs-example-modal-lg" id="modal_edit_data" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO TINDAKAN
				</h5>
			</div>

			<div class="modal-body">

				<div class="form-wrap">
					<!-- /formbody -->
					<div class="form-body">

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<span class="help-block"></span>
									<label class="control-label col-md-3">NO RM</label>
									<div class="col-md-9 has-success">
										<input type="text" style="margin-top:-0.8em;" class="form-control" disabled="" id="no_rm">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">NAMA PASIEN</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" disabled="" id="nama">
									</div>
								</div>
							</div>

						</div>
						<div class="modal-body mt-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>DATA KAMAR</h6>
							<hr width="95%">
							<div class="table-wrap" style="width: 100%; margin: auto ">
								<div class="table-responsive">
									<table class="table table-hover display  pb-60" id="tablekamar">
										<thead>
											<tr class="bg-success">
												<th>NO</th>
												<th>KELAS</th>
												<th>KAMAR</th>
												<th>TANGGAL MASUK</th>
												<th>TANGGAL KELUAR</th>
												<th>STATUS</th>
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
			<div class="modal-body mt-10" style="margin-bottom:-2em;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>INFO TINDAKAN</h6>
				<hr width="95%">
			</div>

			<div class="modal-body">

				<div class="form-wrap">
					<!-- /formbody -->
					<div class="form-body">

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<span class="help-block"></span>
									<label class="control-label col-md-3">TIPE KAMAR</label>
									<div class="col-md-9 has-success">

										<select class="form-control filled-input select2" placeholder="KAMAR" style="border: 1px solid lightgreen;" id="inTipeKamar" name="TipeKamar">
											<option value="-">
												-</option>
											<?php
											foreach ($data_tipe_kamar as $row) :
											?>
												<option value="<?php echo $row->nama; ?>">
													<?php echo $row->nama; ?></option>
											<?php endforeach; ?>
											>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-success">

										<select class="form-control filled-input select2" placeholder="PILIH TINDAKAN" style="border: 1px solid lightgreen;" id="outTipeKamar" onchange="pilihTindakan(this)">

										</select>
									</div>
								</div>
							</div>

						</div>
						<span class=" help-block"></span>
						<!-- /Row -->

						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">JUMLAH TINDAKAN</label>
									<div class="col-md-9">
										<input type="number" class="form-control " id="inJumlah" value="1" placeholder="jumlah" oninput="hargaTotal()">

									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">BIAYA TINDAKAN</label>
									<div class="col-md-9">
										<input type="text" class="form-control" disabled="" id="outBiayaTindakan">
										<input type="hidden" class="form-control " disabled="" id="idPelayanan">
									</div>
								</div>
							</div>
						</div>
						<br>
						<!-- /Row -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">NAMA DOKTER</label>
									<div class="col-md-9 has-success">
										<select class="form-control filled-input select2" placeholder="PILIH KATEGORI" style="border: 1px solid lightgreen;" id="inDPJP" name="NAMA DOKTER">

											<?php
											foreach ($data_dokter as $row) :
											?>
												<option value="<?php echo $row->id_dokter; ?>">
													<?php echo $row->nama; ?></option>
											<?php endforeach; ?>
											>
										</select>
										<span class="help-block"></span>
									</div>
								</div>
							</div>


							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">TOTAL HARGA</label>
									<div class="col-md-9">
										<input type="text" va class="form-control " disabled="" id="outTotal">

									</div>
								</div>
							</div>

						</div>


					</div>

				</div>
			</div>
			<div class="modal-footer">
				<button onclick="insert_tindakan()" class="btn btn-success btn-anim  btn-sm mr-20"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
			</div>
			<div class="modal-body mt-30">
				<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
				<hr width="95%">
				<div class="table-wrap" style="width: 95%; margin: auto ">
					<div class="table-responsive">
						<table class="table table-hover display  pb-60" id="tabletindakan">
							<thead>
								<tr class="bg-success">
									<th>NO</th>
									<th>NAMA TINDAKAN</th>
									<th>TIPE KAMAR</th>
									<th>BIAYA TINDAKAN </th>
									<th>JUMLAH TINDAKAN</th>
									<th>TOTAL BIAYA</th>
									<th>DOKTER</th>
									<th>NAMA STAFF</th>
									<th>HAPUS</th>
								</tr>
							</thead>
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
						<div class="table-responsive ">
							<table class="table table-hover display " id="outTotalHarga">
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

<!-- Modal pembayaran -->
<div class="panel-wrapper collapse in">
	<div class="panel-body">
		<!-- sample modal content -->
		<div class="modal fade" id="modal_edit_kasir" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT DATA KUNJUNGAN
						</h5>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" action="<?php echo base_url('Kasir/print_kasir_ranap') ?>" method="post" enctype="multipart/form-data" role="form" target="_blank">
							<input type="hidden" id="inPel" name="inPel">
							<input type="hidden" id="inHis" name="inHis">
							<div class="form-body">
								<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO KASIR</h6>
								<hr>


								<input type="hidden" class="form-control rounded-input" autocomplete="off" id="inDiskon" name="inDiskon" value="0">


								<input type="hidden" class="form-control rounded-input" autocomplete="off" placeholder="jumlah" id="inDp" name="inDp" value="0">


								<div class="row">
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">TANGGAL PULANG</label>
											<div class="col-md-9">
												<input type="datetime-local" class="form-control rounded-input" autocomplete="off" id="inTglKeluar" name="inTglKeluar" value="<?php date_default_timezone_set('Asia/Jakarta');
																																												echo date("Y-m-dTH:i"); ?>">
												<span class="help-block"></span>

											</div>
										</div>
									</div>

									<input type="hidden" class="form-control rounded-input" autocomplete="off" placeholder="jumlah" id="inSelisih" name="inSelisih" value="0">



									<textarea style="display: none;" class="form-control" rows="5" cols="30" autocomplete="off" id="inNote" name="inNote"></textarea>


								</div>
							</div>
							<input type="hidden" class="form-control rounded-input" autocomplete="off" placeholder="jumlah" id="opsi_bayar" name="opsi_bayar" value="asuransi">
							<input type="hidden" class="form-control" autocomplete="off" id="totalkeseluruhan" name="totalkeseluruhan">
							<input type="hidden" class="form-control" autocomplete="off" id="totalbayar" name="totalbayar">



							<div class="row">
								<center>
									
									<button class="btn btn-warning btn-anim btn-rounded mr-10" type="submit" name="action" value="cetak_penata"><i class="icon-printer"></i><span class="btn-text">CETAK DETAIL</span></button>
									<button class="btn btn-default btn-anim btn-rounded mr-10" type="submit" name="action" value="cetak"><i class="icon-printer"></i><span class="btn-text">CETAK</span></button>

									
								</center>


							</div>


						</form>
						<br>
						<br>
						
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
	function error() {
		swal({
			title: "Gagal!",
			type: "warning",
			text: "Pasien Belum Di Checkout Dari Ruangan",
			confirmButtonColor: "#3cb878",
		});
	}

	function total_biaya(id_pelayanan, id_history) {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('Kasir/getDpDisc') ?>",
			dataType: "JSON",
			data: {
				id_pelayanan: id_pelayanan,
				id_history: id_history,
			},
			success: function(data) {

				$("#modal_edit_kasir").modal('show');
				$('#inPel').val(id_pelayanan);
				$('#inHis').val(id_history);

				if (data.status_dt == 'found') {
					var total_semua = data.total - Number(data.diskon) - Number(data.dp) - Number(data.selisih);
					$('#totalkeseluruhan').val(total_semua);
					$('#inDiskon').val(data.diskon);
					$('#inDp').val(data.dp);
				} else {
					$('#totalkeseluruhan').val(data.total);
					$('#inDiskon').val(0);
					$('#inDp').val(0);
				}
				if (data.tgl_keluar_kamar != 'nothing') {

					document.getElementById('inTglKeluar').value = data.tgl_keluar_kamar;
					$('#checkout').show();
					$('#checkout_1').hide();

				} else {
					document.getElementById('inTglKeluar').value = currentDateTime();
					$('#checkout').hide();
					$('#checkout_1').show();

				}
			}
		});
	}

	function tindakan_apelkes(id_pelayanan, id_history) {
		$.ajax({
			url: "<?= base_url() . 'Apelkes/getApelkesByIdPelayanan' ?>",
			data: {
				pelayanan: id_pelayanan,
				history: id_history
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status_dt == "found") {
					$("#tipe_masuk").val(data.jenis_pelayanan);
					$("#no_rm").val(data.no_rm);
					$("#nama").val(data.nama);
					$("#inTanggalKunjugan").val(data.tgl_masuk);
					$("#idPelayanan").val(data.id_pelayanan);
					$("#idHis").val(data.id_history);
					$("#inNoSEP").val(data.no_sep);
					$("#inDiagnosa").val(data.diagnosa);
					$("#outTipeKamar").val(data.dpjp).change();
					$("#inTipeKamar").val(data.nama_poli).change();
					$("#NamaPasien").val(data.nama).change();
					$("#inAsalPasien").val(data.asal_pasien).change();
					$("#inCaraBayar").val(data.id_cara_bayar).change();
					$("#modal_edit_data").modal('show');
					reload_data_tindakan(id_pelayanan);
					reload_total_harga(id_pelayanan);
					reload_data_kamar(id_pelayanan);
				} else {
					alert("data tidak ditemukan");
				}
			}
		});
	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#inTipeKamar').change(function() {
			var tipe_kamar = $('#inTipeKamar').val();

			$.ajax({
				url: "<?php echo base_url(); ?>Apelkes/getTindakanByTipeKamar",
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
						html += '<option value=' + data[i].id_list_tindakan_apelkes + '|' + data[i].harga_sarana + '|' + data[i].harga_jasa + '|' + data[i].harga_nama + '>' + data[i].nama + '</option>';
					}
					$('#outTipeKamar').html(html);
				}
			});

		});
	});
</script>
<script type="text/javascript">
	function reload_data_tindakan(idPelayanan) {
		$('#tabletindakan').dataTable().fnClearTable();
		$('#tabletindakan').dataTable().fnDestroy();
		$('#tabletindakan').DataTable({
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
				"url": '<?php echo base_url('Apelkes/tampil_list_tindakan'); ?>',
				"type": 'POST',
				"data": {
					id_pelayanan: idPelayanan
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

	function reload_data_kamar(idPelayanan) {
		$('#tablekamar').dataTable().fnClearTable();
		$('#tablekamar').dataTable().fnDestroy();
		$('#tablekamar').DataTable({
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
				"url": '<?php echo base_url('Apelkes/tampil_list_kamar'); ?>',
				"type": 'POST',
				"data": {
					id_pelayanan: idPelayanan
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

	function reload_total_harga(id_pelayanan) {
		$('#outTotalHarga').dataTable().fnClearTable();
		$('#outTotalHarga').dataTable().fnDestroy();
		$('#outTotalHarga').DataTable({
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
				"url": '<?php echo base_url('Apelkes/tampil_total_harga'); ?>',
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

	function hapus_data_tindakan(id_tindakan_apelkes, id_pelayanan) {
		swal({
			title: "Apakah kamu yakin?",
			text: "Menghapus data  ini?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Apelkes/hapus_data_tindakan",
					method: "POST",
					dataType: 'json',
					data: {
						id_tindakan_apelkes: id_tindakan_apelkes,
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Data Berhasil dihapus",
								confirmButtonColor: "#3cb878",
							});
							reload_data_tindakan(id_pelayanan);
							reload_total_harga(id_pelayanan);
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

	function insert_tindakan() {
		a = $("#outTipeKamar").val();
		dokter = $("#inDPJP").val();
		splitDiag = a.split("|");
		hargaSarana = parseFloat(splitDiag[1]);
		hargaJasa = parseFloat(splitDiag[2]);
		harga = hargaSarana + hargaJasa;
		frek = parseFloat($("#inJumlah").val());
		total = harga * frek;

		id_pelayanan = $('#idPelayanan').val();
		id_list_tindakan = $('#outTipeKamar').val();

		dataString = '&harga=' + harga +
			'&id_pelayanan=' + id_pelayanan + '&id_list_tindakan=' + splitDiag[0] +
			'&frek=' + frek + '&total=' + total +
			'&dokter=' + dokter;
		$.ajax({
			url: "<?= base_url() . 'Apelkes/insert_tindakan' ?>",
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
					reload_data_tindakan(id_pelayanan);
					reload_total_harga(id_pelayanan);

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
			"ajax": '<?php echo base_url('Apelkes/tampil_data_apelkes_ranap'); ?>',
			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],

		});
		$('#opsi_bayar').change(function() {
			if ($(this).val() == 'cash' || $(this).val() == 'asuransi') {
				if ($(this).val() == 'cash') {
					$('#tbh_distributor').collapse('show');
				}
				$('.data_hide_bank').collapse('hide');
			} else {
				$('#tbh_distributor').collapse('show');
				$('.data_hide_bank').collapse('show');
			}
		});

	});
</script>
<script type="text/javascript">
	function pilihTindakan(elem) {
		a = elem.value;
		splitDiag = a.split("|");
		// alert(splitDiag[1]);

		hargaSarana = parseFloat(splitDiag[1]);
		hargaJasa = parseFloat(splitDiag[2]);
		harga = hargaSarana + hargaJasa;
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
		// alert(splitDiag[1]);

		hargaSarana = parseFloat(splitDiag[1]);
		hargaJasa = parseFloat(splitDiag[2]);
		harga = hargaSarana + hargaJasa;
		frek = parseFloat($("#inJumlah").val());
		total = harga * frek;


		$("#outTotal").val(convertToRupiah(total));

	}


	function print_apelkes(jenis, id_pelayanan, id_history) {

		$.ajax({
			type: 'POST',
			url: "<?= base_url() . 'Apelkes/print_apelkes' ?>",
			data: {
				id_pelayanan: id_pelayanan,
				id_history: id_history,
				jenis: jenis,
			},
			dataType: "html",
			success: function(msg) {
				$("#div_result").html(msg);
				var divContents = document.getElementById("div_result").innerHTML;
				// var a = window.open('', '', 'height=500, width=500');
				var a = window.open();
				a.document.write('<html>');
				// a.document.write('<head><style type="text/css"> @page {size: A4;margin: 0;} body { margin: 0; } </style> </head>');
				a.document.write('<body >');
				a.document.write(divContents);
				a.document.write('</body>');
				a.document.write('</html>');
				setTimeout(function() { // wait until all resources loaded 
					a.document.close(); // necessary for IE >= 10
					a.focus(); // necessary for IE >= 10
					a.print(); // change window to winPrint
					// a.close(); // change window to winPrint
				}, 500);

			}
		});

	}

	function reload_riwayat() {
		// var table;
		$('.t_riwayat').collapse('show');

		$('#tb_riwayat').dataTable().fnClearTable();
		$('#tb_riwayat').dataTable().fnDestroy();
		var table = $('#tb_riwayat').DataTable({
			"language": {
				"sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
				"sProcessing": "Sedang memproses...",
				"sLengthMenu": "Tampilkan _MENU_ entri",
				"sZeroRecords": "Tidak ditemukan data yang sesuai",
				"sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
				"sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
				"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
				"sInfoPostFix": "",
				"sSearch": "Pencarian : ",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext": "Selanjutnya",
					"sLast": "Terakhir"
				},

			},
			"ajax": {
				"url": '<?php echo base_url('Kasir/tampil_riwayat_pembayaran'); ?>',
				"type": 'POST',
				"data": function(data) {
					data.id = $('#inPel').val();;

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
			table.ajax.reload(); //just reload table
		});
		$('#btn-reset').click(function() { //button reset event click
			$('#form-filter')[0].reset();
			table.ajax.reload(); //just reload table
		});
	}
=======
<div class="panel panel-default card-view mt-20 ">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">DAFTAR PASIEN RAWAT INAP</span></h6>
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
								<th>NO</th>
								<th>TOTAL BIAYA</th>
								<th>LUAR TANGGUNGAN</th>
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
								<th>DOKTER DPJP</th>
						</thead>


					</table>
				</div>
			</div>
		</div>
	</div>
	<div id="div_result" style="display: none;"></div>

</div>
<!-- modal edit data -->
<div class="modal fade bs-example-modal-lg" id="modal_edit_data" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO TINDAKAN
				</h5>
			</div>

			<div class="modal-body">

				<div class="form-wrap">
					<!-- /formbody -->
					<div class="form-body">

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<span class="help-block"></span>
									<label class="control-label col-md-3">NO RM</label>
									<div class="col-md-9 has-success">
										<input type="text" style="margin-top:-0.8em;" class="form-control" disabled="" id="no_rm">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">NAMA PASIEN</label>
									<div class="col-md-9 has-success">
										<input type="text" class="form-control" disabled="" id="nama">
									</div>
								</div>
							</div>

						</div>
						<div class="modal-body mt-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>DATA KAMAR</h6>
							<hr width="95%">
							<div class="table-wrap" style="width: 100%; margin: auto ">
								<div class="table-responsive">
									<table class="table table-hover display  pb-60" id="tablekamar">
										<thead>
											<tr class="bg-success">
												<th>NO</th>
												<th>KELAS</th>
												<th>KAMAR</th>
												<th>TANGGAL MASUK</th>
												<th>TANGGAL KELUAR</th>
												<th>STATUS</th>
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
			<div class="modal-body mt-10" style="margin-bottom:-2em;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>INFO TINDAKAN</h6>
				<hr width="95%">
			</div>

			<div class="modal-body">

				<div class="form-wrap">
					<!-- /formbody -->
					<div class="form-body">

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<span class="help-block"></span>
									<label class="control-label col-md-3">TIPE KAMAR</label>
									<div class="col-md-9 has-success">

										<select class="form-control filled-input select2" placeholder="KAMAR" style="border: 1px solid lightgreen;" id="inTipeKamar" name="TipeKamar">
											<option value="-">
												-</option>
											<?php
											foreach ($data_tipe_kamar as $row) :
											?>
												<option value="<?php echo $row->nama; ?>">
													<?php echo $row->nama; ?></option>
											<?php endforeach; ?>
											>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">NAMA TINDAKAN</label>
									<div class="col-md-9 has-success">

										<select class="form-control filled-input select2" placeholder="PILIH TINDAKAN" style="border: 1px solid lightgreen;" id="outTipeKamar" onchange="pilihTindakan(this)">

										</select>
									</div>
								</div>
							</div>

						</div>
						<span class=" help-block"></span>
						<!-- /Row -->

						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">JUMLAH TINDAKAN</label>
									<div class="col-md-9">
										<input type="number" class="form-control " id="inJumlah" value="1" placeholder="jumlah" oninput="hargaTotal()">

									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">BIAYA TINDAKAN</label>
									<div class="col-md-9">
										<input type="text" class="form-control" disabled="" id="outBiayaTindakan">
										<input type="hidden" class="form-control " disabled="" id="idPelayanan">
									</div>
								</div>
							</div>
						</div>
						<br>
						<!-- /Row -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">NAMA DOKTER</label>
									<div class="col-md-9 has-success">
										<select class="form-control filled-input select2" placeholder="PILIH KATEGORI" style="border: 1px solid lightgreen;" id="inDPJP" name="NAMA DOKTER">

											<?php
											foreach ($data_dokter as $row) :
											?>
												<option value="<?php echo $row->id_dokter; ?>">
													<?php echo $row->nama; ?></option>
											<?php endforeach; ?>
											>
										</select>
										<span class="help-block"></span>
									</div>
								</div>
							</div>


							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">TOTAL HARGA</label>
									<div class="col-md-9">
										<input type="text" va class="form-control " disabled="" id="outTotal">

									</div>
								</div>
							</div>

						</div>


					</div>

				</div>
			</div>
			<div class="modal-footer">
				<button onclick="insert_tindakan()" class="btn btn-success btn-anim  btn-sm mr-20"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
			</div>
			<div class="modal-body mt-30">
				<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
				<hr width="95%">
				<div class="table-wrap" style="width: 95%; margin: auto ">
					<div class="table-responsive">
						<table class="table table-hover display  pb-60" id="tabletindakan">
							<thead>
								<tr class="bg-success">
									<th>NO</th>
									<th>NAMA TINDAKAN</th>
									<th>TIPE KAMAR</th>
									<th>BIAYA TINDAKAN </th>
									<th>JUMLAH TINDAKAN</th>
									<th>TOTAL BIAYA</th>
									<th>DOKTER</th>
									<th>NAMA STAFF</th>
									<th>HAPUS</th>
								</tr>
							</thead>
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
						<div class="table-responsive ">
							<table class="table table-hover display " id="outTotalHarga">
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

<!-- Modal pembayaran -->
<div class="panel-wrapper collapse in">
	<div class="panel-body">
		<!-- sample modal content -->
		<div class="modal fade" id="modal_edit_kasir" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT DATA KUNJUNGAN
						</h5>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" action="<?php echo base_url('Kasir/print_kasir_ranap') ?>" method="post" enctype="multipart/form-data" role="form" target="_blank">
							<input type="hidden" id="inPel" name="inPel">
							<input type="hidden" id="inHis" name="inHis">
							<div class="form-body">
								<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO KASIR</h6>
								<hr>


								<input type="hidden" class="form-control rounded-input" autocomplete="off" id="inDiskon" name="inDiskon" value="0">


								<input type="hidden" class="form-control rounded-input" autocomplete="off" placeholder="jumlah" id="inDp" name="inDp" value="0">


								<div class="row">
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">TANGGAL PULANG</label>
											<div class="col-md-9">
												<input type="datetime-local" class="form-control rounded-input" autocomplete="off" id="inTglKeluar" name="inTglKeluar" value="<?php date_default_timezone_set('Asia/Jakarta');
																																												echo date("Y-m-dTH:i"); ?>">
												<span class="help-block"></span>

											</div>
										</div>
									</div>

									<input type="hidden" class="form-control rounded-input" autocomplete="off" placeholder="jumlah" id="inSelisih" name="inSelisih" value="0">



									<textarea style="display: none;" class="form-control" rows="5" cols="30" autocomplete="off" id="inNote" name="inNote"></textarea>


								</div>
							</div>
							<input type="hidden" class="form-control rounded-input" autocomplete="off" placeholder="jumlah" id="opsi_bayar" name="opsi_bayar" value="asuransi">
							<input type="hidden" class="form-control" autocomplete="off" id="totalkeseluruhan" name="totalkeseluruhan">
							<input type="hidden" class="form-control" autocomplete="off" id="totalbayar" name="totalbayar">



							<div class="row">
								<center>
									
									<button class="btn btn-warning btn-anim btn-rounded mr-10" type="submit" name="action" value="cetak_penata"><i class="icon-printer"></i><span class="btn-text">CETAK DETAIL</span></button>
									<button class="btn btn-default btn-anim btn-rounded mr-10" type="submit" name="action" value="cetak"><i class="icon-printer"></i><span class="btn-text">CETAK</span></button>

									
								</center>


							</div>


						</form>
						<br>
						<br>
						
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
	function error() {
		swal({
			title: "Gagal!",
			type: "warning",
			text: "Pasien Belum Di Checkout Dari Ruangan",
			confirmButtonColor: "#3cb878",
		});
	}

	function total_biaya(id_pelayanan, id_history) {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('Kasir/getDpDisc') ?>",
			dataType: "JSON",
			data: {
				id_pelayanan: id_pelayanan,
				id_history: id_history,
			},
			success: function(data) {

				$("#modal_edit_kasir").modal('show');
				$('#inPel').val(id_pelayanan);
				$('#inHis').val(id_history);

				if (data.status_dt == 'found') {
					var total_semua = data.total - Number(data.diskon) - Number(data.dp) - Number(data.selisih);
					$('#totalkeseluruhan').val(total_semua);
					$('#inDiskon').val(data.diskon);
					$('#inDp').val(data.dp);
				} else {
					$('#totalkeseluruhan').val(data.total);
					$('#inDiskon').val(0);
					$('#inDp').val(0);
				}
				if (data.tgl_keluar_kamar != 'nothing') {

					document.getElementById('inTglKeluar').value = data.tgl_keluar_kamar;
					$('#checkout').show();
					$('#checkout_1').hide();

				} else {
					document.getElementById('inTglKeluar').value = currentDateTime();
					$('#checkout').hide();
					$('#checkout_1').show();

				}
			}
		});
	}

	function tindakan_apelkes(id_pelayanan, id_history) {
		$.ajax({
			url: "<?= base_url() . 'Apelkes/getApelkesByIdPelayanan' ?>",
			data: {
				pelayanan: id_pelayanan,
				history: id_history
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status_dt == "found") {
					$("#tipe_masuk").val(data.jenis_pelayanan);
					$("#no_rm").val(data.no_rm);
					$("#nama").val(data.nama);
					$("#inTanggalKunjugan").val(data.tgl_masuk);
					$("#idPelayanan").val(data.id_pelayanan);
					$("#idHis").val(data.id_history);
					$("#inNoSEP").val(data.no_sep);
					$("#inDiagnosa").val(data.diagnosa);
					$("#outTipeKamar").val(data.dpjp).change();
					$("#inTipeKamar").val(data.nama_poli).change();
					$("#NamaPasien").val(data.nama).change();
					$("#inAsalPasien").val(data.asal_pasien).change();
					$("#inCaraBayar").val(data.id_cara_bayar).change();
					$("#modal_edit_data").modal('show');
					reload_data_tindakan(id_pelayanan);
					reload_total_harga(id_pelayanan);
					reload_data_kamar(id_pelayanan);
				} else {
					alert("data tidak ditemukan");
				}
			}
		});
	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#inTipeKamar').change(function() {
			var tipe_kamar = $('#inTipeKamar').val();

			$.ajax({
				url: "<?php echo base_url(); ?>Apelkes/getTindakanByTipeKamar",
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
						html += '<option value=' + data[i].id_list_tindakan_apelkes + '|' + data[i].harga_sarana + '|' + data[i].harga_jasa + '|' + data[i].harga_nama + '>' + data[i].nama + '</option>';
					}
					$('#outTipeKamar').html(html);
				}
			});

		});
	});
</script>
<script type="text/javascript">
	function reload_data_tindakan(idPelayanan) {
		$('#tabletindakan').dataTable().fnClearTable();
		$('#tabletindakan').dataTable().fnDestroy();
		$('#tabletindakan').DataTable({
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
				"url": '<?php echo base_url('Apelkes/tampil_list_tindakan'); ?>',
				"type": 'POST',
				"data": {
					id_pelayanan: idPelayanan
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

	function reload_data_kamar(idPelayanan) {
		$('#tablekamar').dataTable().fnClearTable();
		$('#tablekamar').dataTable().fnDestroy();
		$('#tablekamar').DataTable({
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
				"url": '<?php echo base_url('Apelkes/tampil_list_kamar'); ?>',
				"type": 'POST',
				"data": {
					id_pelayanan: idPelayanan
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

	function reload_total_harga(id_pelayanan) {
		$('#outTotalHarga').dataTable().fnClearTable();
		$('#outTotalHarga').dataTable().fnDestroy();
		$('#outTotalHarga').DataTable({
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
				"url": '<?php echo base_url('Apelkes/tampil_total_harga'); ?>',
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

	function hapus_data_tindakan(id_tindakan_apelkes, id_pelayanan) {
		swal({
			title: "Apakah kamu yakin?",
			text: "Menghapus data  ini?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Apelkes/hapus_data_tindakan",
					method: "POST",
					dataType: 'json',
					data: {
						id_tindakan_apelkes: id_tindakan_apelkes,
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Data Berhasil dihapus",
								confirmButtonColor: "#3cb878",
							});
							reload_data_tindakan(id_pelayanan);
							reload_total_harga(id_pelayanan);
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

	function insert_tindakan() {
		a = $("#outTipeKamar").val();
		dokter = $("#inDPJP").val();
		splitDiag = a.split("|");
		hargaSarana = parseFloat(splitDiag[1]);
		hargaJasa = parseFloat(splitDiag[2]);
		harga = hargaSarana + hargaJasa;
		frek = parseFloat($("#inJumlah").val());
		total = harga * frek;

		id_pelayanan = $('#idPelayanan').val();
		id_list_tindakan = $('#outTipeKamar').val();

		dataString = '&harga=' + harga +
			'&id_pelayanan=' + id_pelayanan + '&id_list_tindakan=' + splitDiag[0] +
			'&frek=' + frek + '&total=' + total +
			'&dokter=' + dokter;
		$.ajax({
			url: "<?= base_url() . 'Apelkes/insert_tindakan' ?>",
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
					reload_data_tindakan(id_pelayanan);
					reload_total_harga(id_pelayanan);

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
			"ajax": '<?php echo base_url('Apelkes/tampil_data_apelkes_ranap'); ?>',
			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],

		});
		$('#opsi_bayar').change(function() {
			if ($(this).val() == 'cash' || $(this).val() == 'asuransi') {
				if ($(this).val() == 'cash') {
					$('#tbh_distributor').collapse('show');
				}
				$('.data_hide_bank').collapse('hide');
			} else {
				$('#tbh_distributor').collapse('show');
				$('.data_hide_bank').collapse('show');
			}
		});

	});
</script>
<script type="text/javascript">
	function pilihTindakan(elem) {
		a = elem.value;
		splitDiag = a.split("|");
		// alert(splitDiag[1]);

		hargaSarana = parseFloat(splitDiag[1]);
		hargaJasa = parseFloat(splitDiag[2]);
		harga = hargaSarana + hargaJasa;
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
		// alert(splitDiag[1]);

		hargaSarana = parseFloat(splitDiag[1]);
		hargaJasa = parseFloat(splitDiag[2]);
		harga = hargaSarana + hargaJasa;
		frek = parseFloat($("#inJumlah").val());
		total = harga * frek;


		$("#outTotal").val(convertToRupiah(total));

	}


	function print_apelkes(jenis, id_pelayanan, id_history) {

		$.ajax({
			type: 'POST',
			url: "<?= base_url() . 'Apelkes/print_apelkes' ?>",
			data: {
				id_pelayanan: id_pelayanan,
				id_history: id_history,
				jenis: jenis,
			},
			dataType: "html",
			success: function(msg) {
				$("#div_result").html(msg);
				var divContents = document.getElementById("div_result").innerHTML;
				// var a = window.open('', '', 'height=500, width=500');
				var a = window.open();
				a.document.write('<html>');
				// a.document.write('<head><style type="text/css"> @page {size: A4;margin: 0;} body { margin: 0; } </style> </head>');
				a.document.write('<body >');
				a.document.write(divContents);
				a.document.write('</body>');
				a.document.write('</html>');
				setTimeout(function() { // wait until all resources loaded 
					a.document.close(); // necessary for IE >= 10
					a.focus(); // necessary for IE >= 10
					a.print(); // change window to winPrint
					// a.close(); // change window to winPrint
				}, 500);

			}
		});

	}

	function reload_riwayat() {
		// var table;
		$('.t_riwayat').collapse('show');

		$('#tb_riwayat').dataTable().fnClearTable();
		$('#tb_riwayat').dataTable().fnDestroy();
		var table = $('#tb_riwayat').DataTable({
			"language": {
				"sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
				"sProcessing": "Sedang memproses...",
				"sLengthMenu": "Tampilkan _MENU_ entri",
				"sZeroRecords": "Tidak ditemukan data yang sesuai",
				"sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
				"sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
				"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
				"sInfoPostFix": "",
				"sSearch": "Pencarian : ",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext": "Selanjutnya",
					"sLast": "Terakhir"
				},

			},
			"ajax": {
				"url": '<?php echo base_url('Kasir/tampil_riwayat_pembayaran'); ?>',
				"type": 'POST',
				"data": function(data) {
					data.id = $('#inPel').val();;

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
			table.ajax.reload(); //just reload table
		});
		$('#btn-reset').click(function() { //button reset event click
			$('#form-filter')[0].reset();
			table.ajax.reload(); //just reload table
		});
	}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>