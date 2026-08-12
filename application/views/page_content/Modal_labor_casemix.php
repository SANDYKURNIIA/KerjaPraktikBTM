<<<<<<< HEAD
<!-- DEWASA -->
<div class="modal fade bs-example-modal-lg" id="modal_edit_DEWASA" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN LABOR
					RAWAT JALAN
				</h5>
			</div>
		
			<div class="modal-body mt-30">
				<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
				<hr width="95%">
				<div class="table-wrap" style="width: 100%; margin: auto ">
					<div class="table-responsive">
						<table class="table table-hover display  pb-60" id="tableFormLabor">
							<thead>
								<tr class="bg-success">
									<th>NO</th>
									<th>PILIH</th>
									<!-- <th>TINDAKAN</th> -->
									<th>TANGGAL</th>
									<th>JAM</th>
									<th>DIAGNOSA</th>
									<th>RINGKASAN</th>
									<th>KETERANGAN</th>
									<!-- <th>HAPUS</th> -->
								</tr>
							</thead>
							<tbody style="color: black">
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-body">
				<div class="row collapse" id="collapse_tindakan_labor">
					<div class="modal-body mt-5">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
						<hr width="95%">
						<a id="cetak_semua_dewasa" class="btn btn-primary ml-20 mb-20"><i class='icon-printer'></i>&nbsp; CETAK SEMUA DATA LABOR</a>
						<div class="table-wrap" style="width: 95%; margin: auto">
							<div class="table-responsive">
								<table class="table table-hover display pb-60" id="tablelaborDEWASA">
									<thead>
										<tr class="bg-success">
											<th>NO</th>
											<th>NAMA TINDAKAN</th>
											<th>TANGGAL TINDAKAN</th>
											<th>WAKTU TINDAKAN</th>
											<th>BIAYA TINDAKAN </th>
											<th>JUMLAH TINDAKAN</th>
											<th>STAFF REQUEST</th>
											<th>STAFF KONFIRMASI</th>
											<th>RINGKASAN</th>
											<th>KETERANGAN</th>
											<!-- <th>HAPUS</th> -->
										</tr>
									</thead>
									<tfoot>
										<tr class="bg-success">
											<th>NO</th>
											<th>NAMA TINDAKAN</th>
											<th>TANGGAL TINDAKAN</th>
											<th>WAKTU TINDAKAN</th>
											<th>BIAYA TINDAKAN </th>
											<th>JUMLAH TINDAKAN</th>
											<th>STAFF REQUEST</th>
											<th>STAFF KONFIRMASI</th>
											<th>RINGKASAN</th>
											<th>KETERANGAN</th>
											<!-- <th>HAPUS</th> -->
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>

					<!-- Detail Tindakan -->
					<div class="collapse" id="detailTindakanLaborDEWASA">
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>DETAIL
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" disabled id="outNamaDEWASA">
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">TANGGAL TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="outTanggalDEWASA" disabled>
											<span class="help-block"></span>
										</div>
									</div>
								</div>


							</div>
							<span class="help-block"></span>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">BIAYA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" disabled id="outHargaDEWASA">
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">JUMLAH TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="outFrekDEWASA" disabled>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>
							<span class="help-block"></span>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">RINGKASAN KLINIS</label>
										<div class="col-md-9 has-error">
											<textarea class="form-control" id="outRingDEWASA" disabled rows="13" style="max-width:95%; "></textarea>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">KETERANGAN</label>
										<div class="col-md-9 has-error">
											<textarea class="form-control" id="outKetaDEWASA" disabled rows="13" style="max-width:95%; "></textarea>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End -->
					</div>



					<div class="row">
						<div class="col-md-8"></div>
						<div class="col-md-4 pull-right mt-20">
							<div class="table-wrap" style="width: 85%; margin-bottom:40px;">
								<div class="table-responsive ">
									<table class="table table-hover display " id="outTotalHargaDEWASA">
										<thead>
											<tr class="bg-success">
												<th style="font-weight:bold;">Total Keseluruhan</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- Darah Rutin -->
					<div class="collapse" id="isiDARAHDEWASA">
						<!-- FORM DARAH RUTIN NORMAL -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<form id="formTindakan">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">JAM PEMERIKSAAN</label>
											<div class="col-md-9 has-success">
												<input type="time" class="form-control" id="jam_periksa" name="jam_periksa">
												<input type="hidden" class="form-control" id="id_form" name="id_form">
												<span class="help-block"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">JAM SAMPLE</label>
											<div class="col-md-9 has-success">
												<input type="time" class="form-control" id="jam_sample" name="jam_sample">
												<span class="help-block"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">KETERANGAN</label>
											<div class="col-md-9 has-success">
												<textarea class="form-control" id="keterangan" name="keterangan" rows="5"></textarea>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">UPLOAD</label>
											<div class="col-md-9 has-success">
												<input type="file" class="form-control" id="file_input" name="files[]" multiple></input>
												<span class="help-block"></span>
											</div>
											<p style="color:#e84a5f;">*File tidak boleh lebih besar
												dari
												5 mb, dan hanya berformat .jpg |.pdf |.png |.gif |</p>
										</div>
									</div>
									<!--/span-->
								</div>
							
							<div class="row">
								<div class="col-md-8">
									<div class="form-group pull-right">
										<button class="btn btn-success btn-anim  btn-sm ml-20 mt-5" id="btn_upload" type="submit"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- End -->
<script type="text/javascript">
	function detail_tindakan_labor_dewasa(id_tindakan_labor) {
		$.ajax({
			url: "<?= base_url() . 'Labor/getdata_formById_Labor' ?>",
			data: {
				tindakan: id_tindakan_labor,
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status_dt == "found") {
					$('#detailTindakanLaborDEWASA').collapse('toggle');
					$("#outNamaDEWASA").val(data.nama);
					$("#outFrekDEWASA").val(data.frek);
					$("#outTanggalDEWASA").val(data.tanggal_req);
					$("#outHargaDEWASA").val(data.harga);
					$("#outRingDEWASA").val(data.ringkasan);
					$("#outKetaDEWASA").val(data.keterangan);
				} else {
					swal({
						title: "Gagal!",
						type: "warning",
						text: "Maaf, Data tidak ditemukan",
						confirmButtonColor: "#3cb878",
					});
				}
			}
		});
	}
	// DEWASA

	function reload_total_labor_DEWASA(id_pelayanan) {
		$('#outTotalHargaDEWASA').dataTable().fnClearTable();
		$('#outTotalHargaDEWASA').dataTable().fnDestroy();
		$('#outTotalHargaDEWASA').DataTable({
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
				"url": '<?php echo base_url('Labor/tampil_total_labor'); ?>',
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
	// End
</script>
<script type="text/javascript">
	function aksi_labor_dewasa(id) {

		$('#isiDARAHDEWASA').collapse('toggle');
		$('#id_form').val(id);
	}

	function reload_data_labor_DEWASA(id_pelayanan) {
		var a = document.getElementById('cetak_semua_dewasa');
		a.href = "Labor_DEWASA_All_print/" + id_pelayanan

		$('#tablelaborDEWASA').dataTable().fnClearTable();
		$('#tablelaborDEWASA').dataTable().fnDestroy();
		$('#tablelaborDEWASA').DataTable({
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
				"url": '<?php echo base_url('Labor/tampil_all_labor_dewasa'); ?>',
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
	$(document).ready(function() {
		$('#formTindakan').submit(function(e) {
			e.preventDefault();
			if ($('#file_input').val() == '') {
				swal({
					title: "Gagal!",
					text: "Gambar belum di pilih",
					type: "warning",
					confirmButtonColor: "#3cb878",
				});
			}
			
			var formData = new FormData(this);
			$.ajax({
				url: '<?php echo base_url(); ?>Labor/post_labor_rajal',
				type: "POST",
				data: formData,
				processData: false,
				contentType: false,
				cache: false,
				dataType: 'JSON',
				success: function(data) {
					const success = data.status.success;
					const error = data.status.error;
					if (success > 0) {
						swal({
							title: "good job!",
							type: "success",
							text: "Data berhasil disimpan",
							confirmButtonColor: "#3cb878",
						});
						
						$('#isiDARAHDEWASA').collapse('hide');
						$('#modal_edit_DEWASA').modal('hide');
						$('#datable').DataTable().ajax.reload();
					} else if (error > 0) {
						swal({
							title: "Gagal!",
							text: "Data tidak terkirim, mohon cek inputan Anda kembali",
							type: "warning",
							confirmButtonColor: "#3cb878",
						});
					}
				}
			});
		})
	})
=======
<!-- DEWASA -->
<div class="modal fade bs-example-modal-lg" id="modal_edit_DEWASA" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN LABOR
					RAWAT JALAN
				</h5>
			</div>
		
			<div class="modal-body mt-30">
				<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
				<hr width="95%">
				<div class="table-wrap" style="width: 100%; margin: auto ">
					<div class="table-responsive">
						<table class="table table-hover display  pb-60" id="tableFormLabor">
							<thead>
								<tr class="bg-success">
									<th>NO</th>
									<th>PILIH</th>
									<!-- <th>TINDAKAN</th> -->
									<th>TANGGAL</th>
									<th>JAM</th>
									<th>DIAGNOSA</th>
									<th>RINGKASAN</th>
									<th>KETERANGAN</th>
									<!-- <th>HAPUS</th> -->
								</tr>
							</thead>
							<tbody style="color: black">
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-body">
				<div class="row collapse" id="collapse_tindakan_labor">
					<div class="modal-body mt-5">
						<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
						<hr width="95%">
						<a id="cetak_semua_dewasa" class="btn btn-primary ml-20 mb-20"><i class='icon-printer'></i>&nbsp; CETAK SEMUA DATA LABOR</a>
						<div class="table-wrap" style="width: 95%; margin: auto">
							<div class="table-responsive">
								<table class="table table-hover display pb-60" id="tablelaborDEWASA">
									<thead>
										<tr class="bg-success">
											<th>NO</th>
											<th>NAMA TINDAKAN</th>
											<th>TANGGAL TINDAKAN</th>
											<th>WAKTU TINDAKAN</th>
											<th>BIAYA TINDAKAN </th>
											<th>JUMLAH TINDAKAN</th>
											<th>STAFF REQUEST</th>
											<th>STAFF KONFIRMASI</th>
											<th>RINGKASAN</th>
											<th>KETERANGAN</th>
											<!-- <th>HAPUS</th> -->
										</tr>
									</thead>
									<tfoot>
										<tr class="bg-success">
											<th>NO</th>
											<th>NAMA TINDAKAN</th>
											<th>TANGGAL TINDAKAN</th>
											<th>WAKTU TINDAKAN</th>
											<th>BIAYA TINDAKAN </th>
											<th>JUMLAH TINDAKAN</th>
											<th>STAFF REQUEST</th>
											<th>STAFF KONFIRMASI</th>
											<th>RINGKASAN</th>
											<th>KETERANGAN</th>
											<!-- <th>HAPUS</th> -->
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>

					<!-- Detail Tindakan -->
					<div class="collapse" id="detailTindakanLaborDEWASA">
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>DETAIL
								TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" disabled id="outNamaDEWASA">
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">TANGGAL TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="outTanggalDEWASA" disabled>
											<span class="help-block"></span>
										</div>
									</div>
								</div>


							</div>
							<span class="help-block"></span>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">BIAYA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" disabled id="outHargaDEWASA">
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">JUMLAH TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="outFrekDEWASA" disabled>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>
							<span class="help-block"></span>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">RINGKASAN KLINIS</label>
										<div class="col-md-9 has-error">
											<textarea class="form-control" id="outRingDEWASA" disabled rows="13" style="max-width:95%; "></textarea>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">KETERANGAN</label>
										<div class="col-md-9 has-error">
											<textarea class="form-control" id="outKetaDEWASA" disabled rows="13" style="max-width:95%; "></textarea>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End -->
					</div>



					<div class="row">
						<div class="col-md-8"></div>
						<div class="col-md-4 pull-right mt-20">
							<div class="table-wrap" style="width: 85%; margin-bottom:40px;">
								<div class="table-responsive ">
									<table class="table table-hover display " id="outTotalHargaDEWASA">
										<thead>
											<tr class="bg-success">
												<th style="font-weight:bold;">Total Keseluruhan</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- Darah Rutin -->
					<div class="collapse" id="isiDARAHDEWASA">
						<!-- FORM DARAH RUTIN NORMAL -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
								TINDAKAN
							</h6>
							<hr width="95%">
							<form id="formTindakan">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">JAM PEMERIKSAAN</label>
											<div class="col-md-9 has-success">
												<input type="time" class="form-control" id="jam_periksa" name="jam_periksa">
												<input type="hidden" class="form-control" id="id_form" name="id_form">
												<span class="help-block"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">JAM SAMPLE</label>
											<div class="col-md-9 has-success">
												<input type="time" class="form-control" id="jam_sample" name="jam_sample">
												<span class="help-block"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">KETERANGAN</label>
											<div class="col-md-9 has-success">
												<textarea class="form-control" id="keterangan" name="keterangan" rows="5"></textarea>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">UPLOAD</label>
											<div class="col-md-9 has-success">
												<input type="file" class="form-control" id="file_input" name="files[]" multiple></input>
												<span class="help-block"></span>
											</div>
											<p style="color:#e84a5f;">*File tidak boleh lebih besar
												dari
												5 mb, dan hanya berformat .jpg |.pdf |.png |.gif |</p>
										</div>
									</div>
									<!--/span-->
								</div>
							
							<div class="row">
								<div class="col-md-8">
									<div class="form-group pull-right">
										<button class="btn btn-success btn-anim  btn-sm ml-20 mt-5" id="btn_upload" type="submit"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
							</div>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- End -->
<script type="text/javascript">
	function detail_tindakan_labor_dewasa(id_tindakan_labor) {
		$.ajax({
			url: "<?= base_url() . 'Labor/getdata_formById_Labor' ?>",
			data: {
				tindakan: id_tindakan_labor,
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status_dt == "found") {
					$('#detailTindakanLaborDEWASA').collapse('toggle');
					$("#outNamaDEWASA").val(data.nama);
					$("#outFrekDEWASA").val(data.frek);
					$("#outTanggalDEWASA").val(data.tanggal_req);
					$("#outHargaDEWASA").val(data.harga);
					$("#outRingDEWASA").val(data.ringkasan);
					$("#outKetaDEWASA").val(data.keterangan);
				} else {
					swal({
						title: "Gagal!",
						type: "warning",
						text: "Maaf, Data tidak ditemukan",
						confirmButtonColor: "#3cb878",
					});
				}
			}
		});
	}
	// DEWASA

	function reload_total_labor_DEWASA(id_pelayanan) {
		$('#outTotalHargaDEWASA').dataTable().fnClearTable();
		$('#outTotalHargaDEWASA').dataTable().fnDestroy();
		$('#outTotalHargaDEWASA').DataTable({
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
				"url": '<?php echo base_url('Labor/tampil_total_labor'); ?>',
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
	// End
</script>
<script type="text/javascript">
	function aksi_labor_dewasa(id) {

		$('#isiDARAHDEWASA').collapse('toggle');
		$('#id_form').val(id);
	}

	function reload_data_labor_DEWASA(id_pelayanan) {
		var a = document.getElementById('cetak_semua_dewasa');
		a.href = "Labor_DEWASA_All_print/" + id_pelayanan

		$('#tablelaborDEWASA').dataTable().fnClearTable();
		$('#tablelaborDEWASA').dataTable().fnDestroy();
		$('#tablelaborDEWASA').DataTable({
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
				"url": '<?php echo base_url('Labor/tampil_all_labor_dewasa'); ?>',
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
	$(document).ready(function() {
		$('#formTindakan').submit(function(e) {
			e.preventDefault();
			if ($('#file_input').val() == '') {
				swal({
					title: "Gagal!",
					text: "Gambar belum di pilih",
					type: "warning",
					confirmButtonColor: "#3cb878",
				});
			}
			
			var formData = new FormData(this);
			$.ajax({
				url: '<?php echo base_url(); ?>Labor/post_labor_rajal',
				type: "POST",
				data: formData,
				processData: false,
				contentType: false,
				cache: false,
				dataType: 'JSON',
				success: function(data) {
					const success = data.status.success;
					const error = data.status.error;
					if (success > 0) {
						swal({
							title: "good job!",
							type: "success",
							text: "Data berhasil disimpan",
							confirmButtonColor: "#3cb878",
						});
						
						$('#isiDARAHDEWASA').collapse('hide');
						$('#modal_edit_DEWASA').modal('hide');
						$('#datable').DataTable().ajax.reload();
					} else if (error > 0) {
						swal({
							title: "Gagal!",
							text: "Data tidak terkirim, mohon cek inputan Anda kembali",
							type: "warning",
							confirmButtonColor: "#3cb878",
						});
					}
				}
			});
		})
	})
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>