<<<<<<< HEAD
<!-- DEWASA -->
<div class="modal fade bs-example-modal-lg" id="modal_edit_DEWASA" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST LABOR
				</h5>
			</div>
			<div class="form-body mt-10 collapse" id="collapse_tindakan_labor">


				<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
				<hr width="95%">
				<div class="table-wrap" style="width: 100%; margin: auto ">
					<div class="table-responsive">
						<table class="table table-hover display  pb-60" id="tablelabor">
							<thead>
								<tr class="bg-success">
									<th>NO</th>
									<th>AKSI</th>
									<th>NAMA TINDAKAN</th>
									<th>TANGGAL TINDAKAN</th>
									<th>BIAYA TINDAKAN </th>
									<th>JUMLAH TINDAKAN</th>
									<th>STAFF REQUEST</th>
									<th>STAFF KONFIRMASI</th>
									<th>RINGKASAN</th>
									<th>KETERANGAN</th>
								</tr>
							</thead>
							<tfoot>
								<tr class="bg-success">
									<th>NO</th>
									<th>AKSI</th>
									<th>NAMA TINDAKAN</th>
									<th>TANGGAL TINDAKAN</th>
									<th>BIAYA TINDAKAN </th>
									<th>JUMLAH TINDAKAN</th>
									<th>STAFF REQUEST</th>
									<th>STAFF KONFIRMASI</th>
									<th>RINGKASAN</th>
									<th>KETERANGAN</th>
								</tr>
							</tfoot>
							<tbody style="color: black">
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
					</div>
					<div class="col-md-4 pull-right mt-20">
						<div class="table-wrap" style="width: 85%; margin-bottom:40px;">
							<div class="table-responsive ">
								<table class="table table-hover display " id="outTotalHargaLabor">
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

			<div class="form-body mt-10 collapse" id="tindakan_labor">
				<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
				</h6>
				<hr width="95%">
				<form id="formlabor">
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
									5 mb, dan hanya berformat .jpg |.png |</p>
							</div>
						</div>
						<!--/span-->
					</div>

					<div class="row">
						<div class="col-md-8">
							<div class="form-group pull-right">
								<button class="btn btn-success btn-anim  btn-sm ml-20 mt-5" id="btn_upload" type="submit"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									<button class="btn btn-primary btn-anim  btn-sm ml-20 mt-5" onclick="print_labor()" class="icon-rocket"></i><span class="btn-text">CETAK</span>
							</div>
						</div>
					</div>

				</form>


			</div>
			<div class="collapse" id="detailTindakanLabor">
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
									<input type="text" class="form-control" disabled id="outNama">
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group ">
								<label class="control-label col-md-3">TANGGAL TINDAKAN</label>
								<div class="col-md-9 has-error">
									<input type="text" class="form-control" id="outTanggal" disabled>
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
									<input type="text" class="form-control" disabled id="outHarga">
									<span class="help-block"></span>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group ">
								<label class="control-label col-md-3">JUMLAH TINDAKAN</label>
								<div class="col-md-9 has-error">
									<input type="text" class="form-control" id="outFrek" disabled>
									<span class="help-block"></span>
								</div>
							</div>
						</div>
					</div>
					<span class="help-block"></span>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group ">
								<label class="control-label col-md-3">RINGKASAN</label>
								<div class="col-md-9 has-error">
									<textarea class="form-control" id="outRing" rows="13" style="max-width:95%; "></textarea>
									<span class="help-block"></span>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group ">
								<label class="control-label col-md-3">KETERANGAN</label>
								<div class="col-md-9 has-error">
									<textarea class="form-control" id="outKeta" rows="13" style="max-width:95%; "></textarea>
									<span class="help-block"></span>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- End -->

			</div>






			<div class="modal-body mt-30">
				<!-- <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDsdfAKAN</h6>
				<hr width="95%"> -->
				<div class="table-wrap" style="width: 100%; margin: auto ">
					<div class="table-responsive">
						<table class="table table-hover display  pb-60" id="tableFormLabor">
							<thead>
							<tr class="bg-success">
									<th>NO</th>
									<th>PILIH</th>
									<th>TINDAKAN</th>
									<th>AKSI</th>
									<th>HAPUS</th>
									<th>TANGGAL</th>
									<th>JAM</th>
									<th>DIAGNOSA</th>
									<th>RINGKASAN</th>
									<th>KETERANGAN</th>

								</tr>
							</thead>
							<tbody style="color: black">
							</tbody>
						</table>
					</div>
					<!-- </div> -->
					<!-- <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<button onclick="cetak_antrian()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">CETAK ANTRIAN APOTIK</span>
								</div>
							</div>
						</div> -->
					<!-- </div>

				</div>
			</div>
		</div> -->

				</div>
			</div>
		</div>
		<!-- End -->


		<style>
			td {
				color: black;
			}
		</style>
		<script type="text/javascript">
			// Labor


			function print_labor() {

				id = $('#id_form').val();
				window.location.href = '<?php echo base_url("Apelkes/print_labor/") ?>' + id;
			}

			function detail_tindakan_labor(id_tindakan_labor) {
				$.ajax({
					url: "<?= base_url() . 'Poli/getdata_formById_Labor' ?>",
					data: {
						tindakan: id_tindakan_labor,
					},
					type: 'POST',
					dataType: 'json',
					success: function(data) {
						if (data.status_dt == "found") {
							$('#detailTindakanLabor').collapse('toggle');
							$("#outNama").val(data.nama);
							$("#outFrek").val(data.frek);
							$("#outTanggal").val(data.tanggal_req);
							$("#outHarga").val(data.harga);
							$("#outRing").val(data.ringkasan);
							$("#outKeta").val(data.keterangan);
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


			function reload_data_total(id_pelayanan) {
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
						"sSearch": "Cari Tindakan:",
						"sUrl": "",
						"oPaginate": {
							"sFirst": "Pertama",
							"sPrevious": "Sebelumnya",
							"sNext": "Selanjutnya",
							"sLast": "Terakhir",
						}
					},
					"ajax": {
						"url": '<?php echo base_url('IGD/tampil_list_total'); ?>',
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

			function reload_data_tindakan(id_pelayanan) {
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
						"sSearch": "Cari Tindakan:",
						"sUrl": "",
						"oPaginate": {
							"sFirst": "Pertama",
							"sPrevious": "Sebelumnya",
							"sNext": "Selanjutnya",
							"sLast": "Terakhir",
						}
					},
					"ajax": {
						"url": '<?php echo base_url('IGD/tampil_list_tindakan'); ?>',
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

			function edit_data_igd(id_pelayanan, id_history) {
				$.ajax({
					url: "<?= base_url() . 'IGD/getdata_igd' ?>",
					data: {
						pelayanan: id_pelayanan,
						history: id_history
					},
					type: 'POST',
					dataType: 'json',
					success: function(data) {
						if (data.status_dt == "found") {
							// if (data.countTin == 0) {
							// 	$("#na_tindakan").show();
							// } else {
							// 	$("#na_tindakan").hide();
							// }
							//disini set datanya ke modal
							$("#tipe_masuk").val(data.data['jenis_pelayanan']);
							$("#inTanggalKunjugan").val(data.data['tgl_masuk']);
							$("#idPelayanan").val(data.data['id_pelayanan']);
							$("#idHis").val(id_history);
							$("#inNoSEP").val(data.data['no_sep']);
							$("#inDiagnosa").val(data.data['diagnosa']);
							$("#inDPJP").val(data.data['dpjp']).change();
							$("#NamaPasien").val(data.data['nama']).change();
							$("#inAsalPasien").val(data.data['id_asal_pasien']).change();
							$("#inCaraBayar").val(data.data['id_cara_bayar']).change();
							$("#inNaPol").val(data.data['id_kamar']).change();
							$("#modal_edit_data").modal('show');
							reload_data_tindakan(id_pelayanan);
							reload_data_total(id_pelayanan);
						} else {
							alert("data tidak ditemukan");
						}
					}
				});
			}

			function hapus_data_tindakan(id_tindakan_igd, id_pelayanan) { //utk hapus diagnosa pasien
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
							url: "<?php echo base_url() ?>IGD/hapus_data_tindakan",
							method: "POST",
							dataType: 'json',
							data: {
								id_tindakan_igd: id_tindakan_igd,
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

				dataString = 'id_tindakan_igd=' + ID + '&harga=' + harga +
					'&idPelayanan=' + idPelayanan + '&id_list_tindakan=' + splitDiag[0] +
					'&frek=' + frek + '&total=' + total
					//copy ini 3
					+
					'&dokter=' + dokter + '&id_history=' + id_history;
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
							$("#inTindakan").val('-').change();
							$("#inJumlah").val(1);
							$("#outTotal").val('0');
							reload_data_tindakan(idPelayanan);
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
			$('#modal_edit_data').on('hidden.bs.modal', function() {
				$("#inTindakan").val('-').change();
				$("#inJumlah").val(1);
				$("#outTotal").val('0');
				$("#outBiayaTindakan").val('0');
				$('#outTotalHarga').DataTable().ajax.reload();
				$('#tabletindakan').DataTable().ajax.reload();
			})

			function pilihTindakan() {
				a = $("#inTindakan").val();
				splitDiag = a.split("|");

				harga = parseFloat(splitDiag[1]);
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
			// Radiologi
			function insert_radiologi() {
				a = $("#inTindakanRadiologi").val();
				splitDiag = a.split("|");
				harga = parseFloat(splitDiag[1]);
				frek = parseFloat($("#inJumlahRadiologi").val());
				total = harga * frek;
				id_pel_rad = $('#id_pel_rad').val();
				id_his_rad = $('#id_his_rad').val();
				id_list_tindakan = $('#id_daftar_tindakan').val();
				nama = $('#nama').val();
				var ID = Math.random().toString(36).substr(2, 16);

				dataString = 'id=' + ID + '&harga=' + harga +
					'&id_pel_rad=' + id_pel_rad + '&id_his_rad=' + id_his_rad + '&id_list_tindakan=' + splitDiag[0] +
					'&frek=' + frek + '&total=' + total;
				$.ajax({
					url: "<?= base_url() . 'IGD/insert_radiologi' ?>",
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
							$("#inTindakanRadiologi").val('-').change();
							$('#outBiayaTindakanRadiologi').val('0');
							$('#inJumlahRadiologi').val('1');
							$('#outTotalRadiologi').val('0');
							$('#tableradiologi').DataTable().ajax.reload();
							$('#outTotalHargaRadiologi').DataTable().ajax.reload();

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
			$('#modal_radiologi').on('hidden.bs.modal', function() {
				$("#inTindakanRadiologi").val('-').change();
				$('#outBiayaTindakanRadiologi').val('0');
				$('#inJumlahRadiologi').val('1');
				$('#outTotalRadiologi').val('0');
				$('#tableradiologi').DataTable().ajax.reload();
				$('#outTotalHargaRadiologi').DataTable().ajax.reload();
			})

			function pilihTindakanRadiologi() {
				a = $("#inTindakanRadiologi").val();
				splitDiag = a.split("|");

				harga = parseFloat(splitDiag[1]);
				$("#outBiayaTindakanRadiologi").val(convertToRupiah(harga));
				document.getElementById("inJumlahRadiologi").value = "1";
				document.getElementById("outTotalRadiologi").value = convertToRupiah(harga);
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

			// Tindakan Labor

			$(document).ready(function() {
				$('#formlabor').submit(function(e) {
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

								$('#collapse_tindakan_labor').collapse('hide');
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

			function edit_radiologi(id_pelayanan, id_history) {
				$.ajax({
					url: "<?= base_url() . 'IGD/get_radiologi' ?>",
					data: {
						pelayanan: id_pelayanan,
						history: id_history
					},
					type: 'POST',
					dataType: 'json',
					success: function(data) {
						if (data.status_dt == "found") {
							// if (data.countTin == 0) {
							// 	$("#na_radio").show();
							// } else {
							// 	$("#na_radio").hide();
							// }
							$("#id_pel_rad").val(data.data['id_pelayanan']);
							$("#id_his_rad").val(id_history);
							$("#modal_radiologi").modal('show');
							reload_data_radiologi(id_pelayanan);
							reload_total_radiologi(id_pelayanan);
						} else {
							alert("data tidak ditemukan");
						}
					}
				});
			}

			function hapus_radiologi(id_tindakan_radiologi, id_pelayanan, nama) {
				swal({
					title: "Apakah kamu yakin?",
					text: "Menghapus data " + nama + "?",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#3cb878",
					confirmButtonText: "Yakin",
					cancelButtonText: "Batal",
					closeOnConfirm: false
				}, function() {
					$().ready(function() {
						$.ajax({
							url: "<?php echo base_url() ?>Radiologi/hapus_data_radiologi",
							method: "POST",
							dataType: 'json',
							data: {
								id_tindakan_radiologi: id_tindakan_radiologi,
							},
							success: function(data) {
								if (data.status == "success") {
									swal({
										title: "good job!",
										type: "success",
										text: "Data Berhasil dihapus",
										confirmButtonColor: "#3cb878",
									});
									$('#tableradiologi').DataTable().ajax.reload();
									$('#outTotalHargaRadiologi').DataTable().ajax.reload();
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

			function hargaTotalRadiologi() {
				splitDiag = a.split("|");
				harga = parseFloat(splitDiag[1]);
				frek = parseFloat($("#inJumlahRadiologi").val());
				total = harga * frek;

				$("#outTotalRadiologi").val(convertToRupiah(total));
			}

			// End





			// Labor
			function insert_form_labor() {
				diagnosa = $('#labDiagnosa').val();
				ringkasan = $('#labRingkasan').val();
				keterangan = $('#labKet').val();
				id_pelayanan = $('#inPelLab').val();
				id_history = $('#inHisLab').val();
				$.ajax({
					url: "<?= base_url() . 'Poli/insert_form_labor' ?>",
					method: "POST",
					dataType: 'json',
					data: {
						diagnosa: diagnosa,
						ringkasan: ringkasan,
						keterangan: keterangan,
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
							$('#formLabor')[0].reset();
							$("#collapse_tindakan_labor").collapse('hide');
							$("#collapse_form_labor").collapse('hide');
							$('#tableFormLabor').DataTable().ajax.reload();
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
			$('#modal_labor').on('hidden.bs.modal', function() {
				$('#formLabor')[0].reset();
				$('#tableFormLabor').DataTable().ajax.reload();
				$("#inTindakanLabor").val('-').change();
				$('#outBiayaTindakanLabor').val('0');
				$('#inJumlahLabor').val('1');
			})

			function pilih_labor(id) {

				$('#id_form').val(id);
				$("#collapse_tindakan_labor").collapse('toggle');
				reload_data_labor(id);
				reload_total_labor(id);
			}

			function show_form() {
				$("#collapse_form_labor").collapse('toggle');
			}

			function insert_labor() {
				a = $("#inTindakanLabor").val();
				splitDiag = a.split("|");
				harga = parseFloat(splitDiag[1]);
				frek = parseFloat($("#inJumlahLabor").val());
				total = harga * frek;
				id_pel_lab = $('#id_pel_lab').val();
				id_his_lab = $('#id_his_lab').val();
				id_form = $('#id_form').val();
				id_list_tindakan = $('#id_daftar_tindakan').val();
				nama = $('#nama').val();
				var ID = Math.random().toString(36).substr(2, 16);

				dataString = 'id=' + ID + '&harga=' + harga +
					'&id_pel_lab=' + id_pel_lab + '&id_his_lab=' + id_his_lab + '&id_list_tindakan=' + splitDiag[0] +
					'&frek=' + frek + '&total=' + total + '&id_form=' + id_form;
				$.ajax({
					url: "<?= base_url() . 'IGD/insert_labor' ?>",
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
							$('#outBiayaTindakanLabor').val('');
							$('#inJumlahLabor').val('');
							$('#outTotalLabor').val('');
							$('#tablelabor').DataTable().ajax.reload();
							$('#outTotalHargaLabor').DataTable().ajax.reload();

							$("#collapse_form_labor").collapse('hide');
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

			// function request_labor(id) {
			// 	$.ajax({
			// 		url: "</?= base_url() . 'Poli/req_form_labor' ?>",
			// 		method: "POST",
			// 		dataType: 'json',
			// 		data: {
			// 			id: id,
			// 		},
			// 		success: function(data) {
			// 			if (data.status == "success") {
			// 				swal({
			// 					title: "good job!",
			// 					type: "success",
			// 					text: "Permintaan Sedang Diproses",
			// 					confirmButtonColor: "#3cb878",
			// 				});
			// 				$('#tableFormLabor').DataTable().ajax.reload();
			// 			} else if (data.status == "error") {
			// 				swal({
			// 					title: "Tindakan Belum Diisi",
			// 					type: "warning",
			// 					text: "Silahkan isi tindakan terlebih dahulu",
			// 					confirmButtonColor: "#3cb878",
			// 				});

			// 			} else {
			// 				swal({
			// 					title: "Gagal!",
			// 					type: "warning",
			// 					text: data.status,
			// 					confirmButtonColor: "#3cb878",
			// 				});
			// 			}
			// 		}
			// 	});
			// }

			function hapus_form_labor(id) {
				swal({
					title: "Apakah kamu yakin?",
					text: "Menghapus data ?",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#3cb878",
					confirmButtonText: "Yakin",
					cancelButtonText: "Batal",
					closeOnConfirm: false
				}, function() {
					$().ready(function() {
						$.ajax({
							url: "<?= base_url() . 'Poli/hapus_form_labor' ?>",
							method: "POST",
							dataType: 'json',
							data: {
								id: id,
							},
							success: function(data) {
								if (data.status == "success") {
									swal({
										title: "good job!",
										type: "success",
										text: "Permintaan Sudah Dihapus",
										confirmButtonColor: "#3cb878",
									});
									$('#tableFormLabor').DataTable().ajax.reload();
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
			}

			function reload_data_labor(id_pel_lab) {
				$('#tablelabor').dataTable().fnClearTable();
				$('#tablelabor').dataTable().fnDestroy();
				$('#tablelabor').DataTable({
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
						"url": '<?php echo base_url('Poli/tampil_list_labor'); ?>',
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

			function reload_data_form_labor(id_pel_lab) {
				$('#tableFormLabor').dataTable().fnClearTable();
				$('#tableFormLabor').dataTable().fnDestroy();
				$('#tableFormLabor').DataTable({
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
						"url": '<?php echo base_url('Labor/tampil_form_labor'); ?>',
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

			function aksi_labor_dewasa(id) {

				$('#tindakan_labor').collapse('toggle');
				$('#id_form').val(id);
			}

			function pilihTindakanLabor() {
				a = $("#inTindakanLabor").val();
				splitDiag = a.split("|");

				harga = parseFloat(splitDiag[1]);
				$("#outBiayaTindakanLabor").val(convertToRupiah(harga));
				document.getElementById("inJumlahLabor").value = "1";
				document.getElementById("outTotalLabor").value = convertToRupiah(harga);
			}

			function reload_total_labor(id_pelayanan) {
				$('#outTotalHargaLabor').dataTable().fnClearTable();
				$('#outTotalHargaLabor').dataTable().fnDestroy();
				$('#outTotalHargaLabor').DataTable({
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
						"url": '<?php echo base_url('IGD/tampil_total_labor'); ?>',
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

			function edit_labor(id_pelayanan, id_history) {

				$("#id_pel_lab").val(id_pelayanan);
				$("#id_his_lab").val(id_history);
				$("#inPelLab").val(id_pelayanan);
				$("#inHisLab").val(id_history);
				$("#modal_labor").modal('show');
				reload_data_form_labor(id_pelayanan);


			}

			function hapus_labor(id_tindakan_labor, id_pelayanan, nama) {
				swal({
					title: "Apakah kamu yakin?",
					text: "Menghapus data " + nama + "?",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#3cb878",
					confirmButtonText: "Yakin",
					cancelButtonText: "Batal",
					closeOnConfirm: false
				}, function() {
					$().ready(function() {
						$.ajax({
							url: "<?php echo base_url() ?>Labor/hapus_data_labor",
							method: "POST",
							dataType: 'json',
							data: {
								id_tindakan_labor: id_tindakan_labor,
							},
							success: function(data) {
								if (data.status == "success") {
									swal({
										title: "good job!",
										type: "success",
										text: "Data Berhasil dihapus",
										confirmButtonColor: "#3cb878",
									});
									$('#tablelabor').DataTable().ajax.reload();
									$('#outTotalHargaLabor').DataTable().ajax.reload();
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

			function hargaTotalLabor() {
				splitDiag = a.split("|");
				harga = parseFloat(splitDiag[1]);
				frek = parseFloat($("#inJumlahLabor").val());
				total = harga * frek;

				$("#outTotalLabor").val(convertToRupiah(total));
			}







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
					$("#collap_racikan").collapse('toggle');
					$("#collap_nonracikan").collapse('hide');
					reload_data_racikan(idResep);
				} else {
					$('#cara_bayar').val(cara_bayar);
					$('#tipe_resep').val(tipe);
					$('#inResObat').val(idResep);
					$("#collap_nonracikan").collapse('toggle');
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
				harga = parseFloat(splitDiag[1]);
				// hargaMargin = parseFloat(splitDiag[1]) * parseFloat(splitDiag[2]);

				frek = parseFloat($("#inJumlahObat").val());
				disc = parseFloat($("#inDisc").val());
				expire = (splitDiag[3]);
				jumlahKurang = frek * -1;

				if ((caraBayar == "WA14BJ84" && tipe == "1") || (caraBayar == "WA14BJ84" && tipe == "2")) {
					total = harga * frek;
				} else if (caraBayar == "WA14BJ84" && tipe == "3") {
					total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
				} else {
					total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
				}
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
						cara_pakai: cara_pakai
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Tindakan ini Telah di Simpan!",
								confirmButtonColor: "#3cb878",
							});
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
			$('#modal_edit_resep').on('hidden.bs.modal', function() {
				$('#inDepo').val('APOTIK').change();
				$('#inObat').val('-').change();
				$('#inTglExp').val('').change();
				$("#inKeteranganObat").removeData();
				$("#inJumlahObat").val('1');
				$("#inDisc").val(0);
				$("#outBiayaTindakanObat").val('0');
				$("#outBiayaMarginObat").val('0');
				$("#outStok").val('0');
				$("#outTotalObat").val('0');
				$('#inSigna').val('-').change();
				$('#inCaraPakai').val('-').change();
				$('#inResep').val('');
				$('#inJenisResep').val(1).change();
				$('#inNamaResep').val('');
			})

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

			function cetakSigna(id, id_resep) {
				id_tindakan = id;
				window.location.href = '<?php echo base_url() ?>Apotik/print_signa/' + id_tindakan;
			}

			function hapus_resep(id_resep, nama) {
				swal({
					title: "Apakah kamu yakin?",
					text: "Menghapus data " + nama + "?",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#3cb878",
					confirmButtonText: "Yakin",
					cancelButtonText: "Batal",
					closeOnConfirm: false
				}, function() {
					$().ready(function() {
						$.ajax({
							url: "<?php echo base_url() ?>Poli/hapus_resep",
							method: "POST",
							dataType: 'json',
							data: {
								id_resep: id_resep,
							},
							success: function(data) {
								if (data.status == "success") {
									$('#tableresep').DataTable().ajax.reload();
									swal({
										title: "good job!",
										type: "success",
										text: "Data Berhasil dihapus",
										confirmButtonColor: "#3cb878",
									});

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

			function hapus_obat(id, nama, depo) {
				swal({
					title: "Apakah kamu yakin?",
					text: "Menghapus data " + nama + "?",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#3cb878",
					confirmButtonText: "Yakin",
					cancelButtonText: "Batal",
					closeOnConfirm: false
				}, function() {
					$().ready(function() {
						$.ajax({
							url: "<?php echo base_url() ?>Poli/hapus_obat",
							method: "POST",
							dataType: 'json',
							data: {
								id: id,
								depo: depo
							},
							success: function(data) {
								if (data.status == "success") {
									$('#tableobat').DataTable().ajax.reload();
									swal({
										title: "good job!",
										type: "success",
										text: "Data Berhasil dihapus",
										confirmButtonColor: "#3cb878",
									});

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

			function hapus_racikan(id_racikan) {
				swal({
					title: "Apakah kamu yakin?",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#3cb878",
					confirmButtonText: "Yakin",
					cancelButtonText: "Batal",
					closeOnConfirm: false
				}, function() {
					$().ready(function() {
						$.ajax({
							url: "<?php echo base_url() ?>Poli/hapus_racikan",
							method: "POST",
							dataType: 'json',
							data: {
								id_racikan: id_racikan
							},
							success: function(data) {
								if (data.status == "success") {
									$('#tableRacikan').DataTable().ajax.reload();
									swal({
										title: "good job!",
										type: "success",
										text: "Data Berhasil dihapus",
										confirmButtonColor: "#3cb878",
									});

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

			// function request(id_resep, jenis_resep) {
			// 	$.ajax({
			// 		url: "</?= base_url() . 'Poli/request_resep' ?>",
			// 		method: "POST",
			// 		dataType: 'json',
			// 		data: {
			// 			id_resep: id_resep,
			// 			jenis_resep: jenis_resep
			// 		},
			// 		success: function(data) {
			// 			if (data.status == "success") {
			// 				swal({
			// 					title: "good job!",
			// 					type: "success",
			// 					text: "Tindakan ini Telah di Simpan!",
			// 					confirmButtonColor: "#3cb878",
			// 				});
			// 				$('#tableresep').DataTable().ajax.reload();
			// 			} else if (data.status == "error") {
			// 				swal({
			// 					title: "Tindakan Belum Diisi",
			// 					type: "warning",
			// 					text: "Silahkan isi tindakan terlebih dahulu",
			// 					confirmButtonColor: "#3cb878",
			// 				});

			// 			} else {
			// 				swal({
			// 					title: "Gagal!",
			// 					type: "warning",
			// 					text: data.status,
			// 					confirmButtonColor: "#3cb878",
			// 				});
			// 			}
			// 		}
			// 	});
			// }
			$(document).ready(function() {
				$('#inDepo').change(function() {

					var depo = $('#inDepo').val();
					if (depo != '') {
						$.ajax({
							url: "<?php echo base_url(); ?>Poli/getNamaObat",
							method: "POST",
							data: {
								depo: depo
							},
							dataType: 'json',
							success: function(data) {
								var html = '';
								var i;
								html = '<option value="">-</option>';
								for (i = 0; i < data.length; i++) {
									html += '<option value=' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + data[i].margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + '>' + data[i].nama + '</option>';
								}
								$('#inObat').html(html);
							}
						});
					} else {
						$('#inObat').html('<option value="">-</option>');
					}
				});
				$('#inObat').change(function() {
					obat = $('#inObat').val();
					splitDiag = obat.split("|");
					tgl = splitDiag[3];
					$('#inTglExp').val(tgl);
					stok = splitDiag[4];
					$("#outStok").val(stok);
				});
			});

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


				harga = parseFloat(splitDiag[1]);
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
				if ((caraBayar == "WA14BJ84" && tipe == "1") || (caraBayar == "WA14BJ84" && tipe == "2")) {
					total = harga * frek;
				} else if (caraBayar == "WA14BJ84" && tipe == "3") {
					total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
				} else {
					total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
				}

				$("#outTotalObat").val(convertToRupiah(total.toFixed(0)));

			}
=======
<!-- DEWASA -->
<div class="modal fade bs-example-modal-lg" id="modal_edit_DEWASA" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST LABOR
				</h5>
			</div>
			<div class="form-body mt-10 collapse" id="collapse_tindakan_labor">


				<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
				<hr width="95%">
				<div class="table-wrap" style="width: 100%; margin: auto ">
					<div class="table-responsive">
						<table class="table table-hover display  pb-60" id="tablelabor">
							<thead>
								<tr class="bg-success">
									<th>NO</th>
									<th>AKSI</th>
									<th>NAMA TINDAKAN</th>
									<th>TANGGAL TINDAKAN</th>
									<th>BIAYA TINDAKAN </th>
									<th>JUMLAH TINDAKAN</th>
									<th>STAFF REQUEST</th>
									<th>STAFF KONFIRMASI</th>
									<th>RINGKASAN</th>
									<th>KETERANGAN</th>
								</tr>
							</thead>
							<tfoot>
								<tr class="bg-success">
									<th>NO</th>
									<th>AKSI</th>
									<th>NAMA TINDAKAN</th>
									<th>TANGGAL TINDAKAN</th>
									<th>BIAYA TINDAKAN </th>
									<th>JUMLAH TINDAKAN</th>
									<th>STAFF REQUEST</th>
									<th>STAFF KONFIRMASI</th>
									<th>RINGKASAN</th>
									<th>KETERANGAN</th>
								</tr>
							</tfoot>
							<tbody style="color: black">
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
					</div>
					<div class="col-md-4 pull-right mt-20">
						<div class="table-wrap" style="width: 85%; margin-bottom:40px;">
							<div class="table-responsive ">
								<table class="table table-hover display " id="outTotalHargaLabor">
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

			<div class="form-body mt-10 collapse" id="tindakan_labor">
				<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
				</h6>
				<hr width="95%">
				<form id="formlabor">
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
									5 mb, dan hanya berformat .jpg |.png |</p>
							</div>
						</div>
						<!--/span-->
					</div>

					<div class="row">
						<div class="col-md-8">
							<div class="form-group pull-right">
								<button class="btn btn-success btn-anim  btn-sm ml-20 mt-5" id="btn_upload" type="submit"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									<button class="btn btn-primary btn-anim  btn-sm ml-20 mt-5" onclick="print_labor()" class="icon-rocket"></i><span class="btn-text">CETAK</span>
							</div>
						</div>
					</div>

				</form>


			</div>
			<div class="collapse" id="detailTindakanLabor">
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
									<input type="text" class="form-control" disabled id="outNama">
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group ">
								<label class="control-label col-md-3">TANGGAL TINDAKAN</label>
								<div class="col-md-9 has-error">
									<input type="text" class="form-control" id="outTanggal" disabled>
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
									<input type="text" class="form-control" disabled id="outHarga">
									<span class="help-block"></span>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group ">
								<label class="control-label col-md-3">JUMLAH TINDAKAN</label>
								<div class="col-md-9 has-error">
									<input type="text" class="form-control" id="outFrek" disabled>
									<span class="help-block"></span>
								</div>
							</div>
						</div>
					</div>
					<span class="help-block"></span>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group ">
								<label class="control-label col-md-3">RINGKASAN</label>
								<div class="col-md-9 has-error">
									<textarea class="form-control" id="outRing" rows="13" style="max-width:95%; "></textarea>
									<span class="help-block"></span>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group ">
								<label class="control-label col-md-3">KETERANGAN</label>
								<div class="col-md-9 has-error">
									<textarea class="form-control" id="outKeta" rows="13" style="max-width:95%; "></textarea>
									<span class="help-block"></span>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- End -->

			</div>






			<div class="modal-body mt-30">
				<!-- <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDsdfAKAN</h6>
				<hr width="95%"> -->
				<div class="table-wrap" style="width: 100%; margin: auto ">
					<div class="table-responsive">
						<table class="table table-hover display  pb-60" id="tableFormLabor">
							<thead>
							<tr class="bg-success">
									<th>NO</th>
									<th>PILIH</th>
									<th>TINDAKAN</th>
									<th>AKSI</th>
									<th>HAPUS</th>
									<th>TANGGAL</th>
									<th>JAM</th>
									<th>DIAGNOSA</th>
									<th>RINGKASAN</th>
									<th>KETERANGAN</th>

								</tr>
							</thead>
							<tbody style="color: black">
							</tbody>
						</table>
					</div>
					<!-- </div> -->
					<!-- <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<button onclick="cetak_antrian()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">CETAK ANTRIAN APOTIK</span>
								</div>
							</div>
						</div> -->
					<!-- </div>

				</div>
			</div>
		</div> -->

				</div>
			</div>
		</div>
		<!-- End -->


		<style>
			td {
				color: black;
			}
		</style>
		<script type="text/javascript">
			// Labor


			function print_labor() {

				id = $('#id_form').val();
				window.location.href = '<?php echo base_url("Apelkes/print_labor/") ?>' + id;
			}

			function detail_tindakan_labor(id_tindakan_labor) {
				$.ajax({
					url: "<?= base_url() . 'Poli/getdata_formById_Labor' ?>",
					data: {
						tindakan: id_tindakan_labor,
					},
					type: 'POST',
					dataType: 'json',
					success: function(data) {
						if (data.status_dt == "found") {
							$('#detailTindakanLabor').collapse('toggle');
							$("#outNama").val(data.nama);
							$("#outFrek").val(data.frek);
							$("#outTanggal").val(data.tanggal_req);
							$("#outHarga").val(data.harga);
							$("#outRing").val(data.ringkasan);
							$("#outKeta").val(data.keterangan);
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


			function reload_data_total(id_pelayanan) {
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
						"sSearch": "Cari Tindakan:",
						"sUrl": "",
						"oPaginate": {
							"sFirst": "Pertama",
							"sPrevious": "Sebelumnya",
							"sNext": "Selanjutnya",
							"sLast": "Terakhir",
						}
					},
					"ajax": {
						"url": '<?php echo base_url('IGD/tampil_list_total'); ?>',
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

			function reload_data_tindakan(id_pelayanan) {
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
						"sSearch": "Cari Tindakan:",
						"sUrl": "",
						"oPaginate": {
							"sFirst": "Pertama",
							"sPrevious": "Sebelumnya",
							"sNext": "Selanjutnya",
							"sLast": "Terakhir",
						}
					},
					"ajax": {
						"url": '<?php echo base_url('IGD/tampil_list_tindakan'); ?>',
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

			function edit_data_igd(id_pelayanan, id_history) {
				$.ajax({
					url: "<?= base_url() . 'IGD/getdata_igd' ?>",
					data: {
						pelayanan: id_pelayanan,
						history: id_history
					},
					type: 'POST',
					dataType: 'json',
					success: function(data) {
						if (data.status_dt == "found") {
							// if (data.countTin == 0) {
							// 	$("#na_tindakan").show();
							// } else {
							// 	$("#na_tindakan").hide();
							// }
							//disini set datanya ke modal
							$("#tipe_masuk").val(data.data['jenis_pelayanan']);
							$("#inTanggalKunjugan").val(data.data['tgl_masuk']);
							$("#idPelayanan").val(data.data['id_pelayanan']);
							$("#idHis").val(id_history);
							$("#inNoSEP").val(data.data['no_sep']);
							$("#inDiagnosa").val(data.data['diagnosa']);
							$("#inDPJP").val(data.data['dpjp']).change();
							$("#NamaPasien").val(data.data['nama']).change();
							$("#inAsalPasien").val(data.data['id_asal_pasien']).change();
							$("#inCaraBayar").val(data.data['id_cara_bayar']).change();
							$("#inNaPol").val(data.data['id_kamar']).change();
							$("#modal_edit_data").modal('show');
							reload_data_tindakan(id_pelayanan);
							reload_data_total(id_pelayanan);
						} else {
							alert("data tidak ditemukan");
						}
					}
				});
			}

			function hapus_data_tindakan(id_tindakan_igd, id_pelayanan) { //utk hapus diagnosa pasien
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
							url: "<?php echo base_url() ?>IGD/hapus_data_tindakan",
							method: "POST",
							dataType: 'json',
							data: {
								id_tindakan_igd: id_tindakan_igd,
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

				dataString = 'id_tindakan_igd=' + ID + '&harga=' + harga +
					'&idPelayanan=' + idPelayanan + '&id_list_tindakan=' + splitDiag[0] +
					'&frek=' + frek + '&total=' + total
					//copy ini 3
					+
					'&dokter=' + dokter + '&id_history=' + id_history;
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
							$("#inTindakan").val('-').change();
							$("#inJumlah").val(1);
							$("#outTotal").val('0');
							reload_data_tindakan(idPelayanan);
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
			$('#modal_edit_data').on('hidden.bs.modal', function() {
				$("#inTindakan").val('-').change();
				$("#inJumlah").val(1);
				$("#outTotal").val('0');
				$("#outBiayaTindakan").val('0');
				$('#outTotalHarga').DataTable().ajax.reload();
				$('#tabletindakan').DataTable().ajax.reload();
			})

			function pilihTindakan() {
				a = $("#inTindakan").val();
				splitDiag = a.split("|");

				harga = parseFloat(splitDiag[1]);
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
			// Radiologi
			function insert_radiologi() {
				a = $("#inTindakanRadiologi").val();
				splitDiag = a.split("|");
				harga = parseFloat(splitDiag[1]);
				frek = parseFloat($("#inJumlahRadiologi").val());
				total = harga * frek;
				id_pel_rad = $('#id_pel_rad').val();
				id_his_rad = $('#id_his_rad').val();
				id_list_tindakan = $('#id_daftar_tindakan').val();
				nama = $('#nama').val();
				var ID = Math.random().toString(36).substr(2, 16);

				dataString = 'id=' + ID + '&harga=' + harga +
					'&id_pel_rad=' + id_pel_rad + '&id_his_rad=' + id_his_rad + '&id_list_tindakan=' + splitDiag[0] +
					'&frek=' + frek + '&total=' + total;
				$.ajax({
					url: "<?= base_url() . 'IGD/insert_radiologi' ?>",
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
							$("#inTindakanRadiologi").val('-').change();
							$('#outBiayaTindakanRadiologi').val('0');
							$('#inJumlahRadiologi').val('1');
							$('#outTotalRadiologi').val('0');
							$('#tableradiologi').DataTable().ajax.reload();
							$('#outTotalHargaRadiologi').DataTable().ajax.reload();

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
			$('#modal_radiologi').on('hidden.bs.modal', function() {
				$("#inTindakanRadiologi").val('-').change();
				$('#outBiayaTindakanRadiologi').val('0');
				$('#inJumlahRadiologi').val('1');
				$('#outTotalRadiologi').val('0');
				$('#tableradiologi').DataTable().ajax.reload();
				$('#outTotalHargaRadiologi').DataTable().ajax.reload();
			})

			function pilihTindakanRadiologi() {
				a = $("#inTindakanRadiologi").val();
				splitDiag = a.split("|");

				harga = parseFloat(splitDiag[1]);
				$("#outBiayaTindakanRadiologi").val(convertToRupiah(harga));
				document.getElementById("inJumlahRadiologi").value = "1";
				document.getElementById("outTotalRadiologi").value = convertToRupiah(harga);
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

			// Tindakan Labor

			$(document).ready(function() {
				$('#formlabor').submit(function(e) {
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

								$('#collapse_tindakan_labor').collapse('hide');
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

			function edit_radiologi(id_pelayanan, id_history) {
				$.ajax({
					url: "<?= base_url() . 'IGD/get_radiologi' ?>",
					data: {
						pelayanan: id_pelayanan,
						history: id_history
					},
					type: 'POST',
					dataType: 'json',
					success: function(data) {
						if (data.status_dt == "found") {
							// if (data.countTin == 0) {
							// 	$("#na_radio").show();
							// } else {
							// 	$("#na_radio").hide();
							// }
							$("#id_pel_rad").val(data.data['id_pelayanan']);
							$("#id_his_rad").val(id_history);
							$("#modal_radiologi").modal('show');
							reload_data_radiologi(id_pelayanan);
							reload_total_radiologi(id_pelayanan);
						} else {
							alert("data tidak ditemukan");
						}
					}
				});
			}

			function hapus_radiologi(id_tindakan_radiologi, id_pelayanan, nama) {
				swal({
					title: "Apakah kamu yakin?",
					text: "Menghapus data " + nama + "?",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#3cb878",
					confirmButtonText: "Yakin",
					cancelButtonText: "Batal",
					closeOnConfirm: false
				}, function() {
					$().ready(function() {
						$.ajax({
							url: "<?php echo base_url() ?>Radiologi/hapus_data_radiologi",
							method: "POST",
							dataType: 'json',
							data: {
								id_tindakan_radiologi: id_tindakan_radiologi,
							},
							success: function(data) {
								if (data.status == "success") {
									swal({
										title: "good job!",
										type: "success",
										text: "Data Berhasil dihapus",
										confirmButtonColor: "#3cb878",
									});
									$('#tableradiologi').DataTable().ajax.reload();
									$('#outTotalHargaRadiologi').DataTable().ajax.reload();
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

			function hargaTotalRadiologi() {
				splitDiag = a.split("|");
				harga = parseFloat(splitDiag[1]);
				frek = parseFloat($("#inJumlahRadiologi").val());
				total = harga * frek;

				$("#outTotalRadiologi").val(convertToRupiah(total));
			}

			// End





			// Labor
			function insert_form_labor() {
				diagnosa = $('#labDiagnosa').val();
				ringkasan = $('#labRingkasan').val();
				keterangan = $('#labKet').val();
				id_pelayanan = $('#inPelLab').val();
				id_history = $('#inHisLab').val();
				$.ajax({
					url: "<?= base_url() . 'Poli/insert_form_labor' ?>",
					method: "POST",
					dataType: 'json',
					data: {
						diagnosa: diagnosa,
						ringkasan: ringkasan,
						keterangan: keterangan,
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
							$('#formLabor')[0].reset();
							$("#collapse_tindakan_labor").collapse('hide');
							$("#collapse_form_labor").collapse('hide');
							$('#tableFormLabor').DataTable().ajax.reload();
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
			$('#modal_labor').on('hidden.bs.modal', function() {
				$('#formLabor')[0].reset();
				$('#tableFormLabor').DataTable().ajax.reload();
				$("#inTindakanLabor").val('-').change();
				$('#outBiayaTindakanLabor').val('0');
				$('#inJumlahLabor').val('1');
			})

			function pilih_labor(id) {

				$('#id_form').val(id);
				$("#collapse_tindakan_labor").collapse('toggle');
				reload_data_labor(id);
				reload_total_labor(id);
			}

			function show_form() {
				$("#collapse_form_labor").collapse('toggle');
			}

			function insert_labor() {
				a = $("#inTindakanLabor").val();
				splitDiag = a.split("|");
				harga = parseFloat(splitDiag[1]);
				frek = parseFloat($("#inJumlahLabor").val());
				total = harga * frek;
				id_pel_lab = $('#id_pel_lab').val();
				id_his_lab = $('#id_his_lab').val();
				id_form = $('#id_form').val();
				id_list_tindakan = $('#id_daftar_tindakan').val();
				nama = $('#nama').val();
				var ID = Math.random().toString(36).substr(2, 16);

				dataString = 'id=' + ID + '&harga=' + harga +
					'&id_pel_lab=' + id_pel_lab + '&id_his_lab=' + id_his_lab + '&id_list_tindakan=' + splitDiag[0] +
					'&frek=' + frek + '&total=' + total + '&id_form=' + id_form;
				$.ajax({
					url: "<?= base_url() . 'IGD/insert_labor' ?>",
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
							$('#outBiayaTindakanLabor').val('');
							$('#inJumlahLabor').val('');
							$('#outTotalLabor').val('');
							$('#tablelabor').DataTable().ajax.reload();
							$('#outTotalHargaLabor').DataTable().ajax.reload();

							$("#collapse_form_labor").collapse('hide');
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

			// function request_labor(id) {
			// 	$.ajax({
			// 		url: "</?= base_url() . 'Poli/req_form_labor' ?>",
			// 		method: "POST",
			// 		dataType: 'json',
			// 		data: {
			// 			id: id,
			// 		},
			// 		success: function(data) {
			// 			if (data.status == "success") {
			// 				swal({
			// 					title: "good job!",
			// 					type: "success",
			// 					text: "Permintaan Sedang Diproses",
			// 					confirmButtonColor: "#3cb878",
			// 				});
			// 				$('#tableFormLabor').DataTable().ajax.reload();
			// 			} else if (data.status == "error") {
			// 				swal({
			// 					title: "Tindakan Belum Diisi",
			// 					type: "warning",
			// 					text: "Silahkan isi tindakan terlebih dahulu",
			// 					confirmButtonColor: "#3cb878",
			// 				});

			// 			} else {
			// 				swal({
			// 					title: "Gagal!",
			// 					type: "warning",
			// 					text: data.status,
			// 					confirmButtonColor: "#3cb878",
			// 				});
			// 			}
			// 		}
			// 	});
			// }

			function hapus_form_labor(id) {
				swal({
					title: "Apakah kamu yakin?",
					text: "Menghapus data ?",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#3cb878",
					confirmButtonText: "Yakin",
					cancelButtonText: "Batal",
					closeOnConfirm: false
				}, function() {
					$().ready(function() {
						$.ajax({
							url: "<?= base_url() . 'Poli/hapus_form_labor' ?>",
							method: "POST",
							dataType: 'json',
							data: {
								id: id,
							},
							success: function(data) {
								if (data.status == "success") {
									swal({
										title: "good job!",
										type: "success",
										text: "Permintaan Sudah Dihapus",
										confirmButtonColor: "#3cb878",
									});
									$('#tableFormLabor').DataTable().ajax.reload();
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
			}

			function reload_data_labor(id_pel_lab) {
				$('#tablelabor').dataTable().fnClearTable();
				$('#tablelabor').dataTable().fnDestroy();
				$('#tablelabor').DataTable({
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
						"url": '<?php echo base_url('Poli/tampil_list_labor'); ?>',
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

			function reload_data_form_labor(id_pel_lab) {
				$('#tableFormLabor').dataTable().fnClearTable();
				$('#tableFormLabor').dataTable().fnDestroy();
				$('#tableFormLabor').DataTable({
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
						"url": '<?php echo base_url('Labor/tampil_form_labor'); ?>',
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

			function aksi_labor_dewasa(id) {

				$('#tindakan_labor').collapse('toggle');
				$('#id_form').val(id);
			}

			function pilihTindakanLabor() {
				a = $("#inTindakanLabor").val();
				splitDiag = a.split("|");

				harga = parseFloat(splitDiag[1]);
				$("#outBiayaTindakanLabor").val(convertToRupiah(harga));
				document.getElementById("inJumlahLabor").value = "1";
				document.getElementById("outTotalLabor").value = convertToRupiah(harga);
			}

			function reload_total_labor(id_pelayanan) {
				$('#outTotalHargaLabor').dataTable().fnClearTable();
				$('#outTotalHargaLabor').dataTable().fnDestroy();
				$('#outTotalHargaLabor').DataTable({
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
						"url": '<?php echo base_url('IGD/tampil_total_labor'); ?>',
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

			function edit_labor(id_pelayanan, id_history) {

				$("#id_pel_lab").val(id_pelayanan);
				$("#id_his_lab").val(id_history);
				$("#inPelLab").val(id_pelayanan);
				$("#inHisLab").val(id_history);
				$("#modal_labor").modal('show');
				reload_data_form_labor(id_pelayanan);


			}

			function hapus_labor(id_tindakan_labor, id_pelayanan, nama) {
				swal({
					title: "Apakah kamu yakin?",
					text: "Menghapus data " + nama + "?",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#3cb878",
					confirmButtonText: "Yakin",
					cancelButtonText: "Batal",
					closeOnConfirm: false
				}, function() {
					$().ready(function() {
						$.ajax({
							url: "<?php echo base_url() ?>Labor/hapus_data_labor",
							method: "POST",
							dataType: 'json',
							data: {
								id_tindakan_labor: id_tindakan_labor,
							},
							success: function(data) {
								if (data.status == "success") {
									swal({
										title: "good job!",
										type: "success",
										text: "Data Berhasil dihapus",
										confirmButtonColor: "#3cb878",
									});
									$('#tablelabor').DataTable().ajax.reload();
									$('#outTotalHargaLabor').DataTable().ajax.reload();
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

			function hargaTotalLabor() {
				splitDiag = a.split("|");
				harga = parseFloat(splitDiag[1]);
				frek = parseFloat($("#inJumlahLabor").val());
				total = harga * frek;

				$("#outTotalLabor").val(convertToRupiah(total));
			}







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
					$("#collap_racikan").collapse('toggle');
					$("#collap_nonracikan").collapse('hide');
					reload_data_racikan(idResep);
				} else {
					$('#cara_bayar').val(cara_bayar);
					$('#tipe_resep').val(tipe);
					$('#inResObat').val(idResep);
					$("#collap_nonracikan").collapse('toggle');
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
				harga = parseFloat(splitDiag[1]);
				// hargaMargin = parseFloat(splitDiag[1]) * parseFloat(splitDiag[2]);

				frek = parseFloat($("#inJumlahObat").val());
				disc = parseFloat($("#inDisc").val());
				expire = (splitDiag[3]);
				jumlahKurang = frek * -1;

				if ((caraBayar == "WA14BJ84" && tipe == "1") || (caraBayar == "WA14BJ84" && tipe == "2")) {
					total = harga * frek;
				} else if (caraBayar == "WA14BJ84" && tipe == "3") {
					total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
				} else {
					total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
				}
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
						cara_pakai: cara_pakai
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Tindakan ini Telah di Simpan!",
								confirmButtonColor: "#3cb878",
							});
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
			$('#modal_edit_resep').on('hidden.bs.modal', function() {
				$('#inDepo').val('APOTIK').change();
				$('#inObat').val('-').change();
				$('#inTglExp').val('').change();
				$("#inKeteranganObat").removeData();
				$("#inJumlahObat").val('1');
				$("#inDisc").val(0);
				$("#outBiayaTindakanObat").val('0');
				$("#outBiayaMarginObat").val('0');
				$("#outStok").val('0');
				$("#outTotalObat").val('0');
				$('#inSigna').val('-').change();
				$('#inCaraPakai').val('-').change();
				$('#inResep').val('');
				$('#inJenisResep').val(1).change();
				$('#inNamaResep').val('');
			})

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

			function cetakSigna(id, id_resep) {
				id_tindakan = id;
				window.location.href = '<?php echo base_url() ?>Apotik/print_signa/' + id_tindakan;
			}

			function hapus_resep(id_resep, nama) {
				swal({
					title: "Apakah kamu yakin?",
					text: "Menghapus data " + nama + "?",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#3cb878",
					confirmButtonText: "Yakin",
					cancelButtonText: "Batal",
					closeOnConfirm: false
				}, function() {
					$().ready(function() {
						$.ajax({
							url: "<?php echo base_url() ?>Poli/hapus_resep",
							method: "POST",
							dataType: 'json',
							data: {
								id_resep: id_resep,
							},
							success: function(data) {
								if (data.status == "success") {
									$('#tableresep').DataTable().ajax.reload();
									swal({
										title: "good job!",
										type: "success",
										text: "Data Berhasil dihapus",
										confirmButtonColor: "#3cb878",
									});

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

			function hapus_obat(id, nama, depo) {
				swal({
					title: "Apakah kamu yakin?",
					text: "Menghapus data " + nama + "?",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#3cb878",
					confirmButtonText: "Yakin",
					cancelButtonText: "Batal",
					closeOnConfirm: false
				}, function() {
					$().ready(function() {
						$.ajax({
							url: "<?php echo base_url() ?>Poli/hapus_obat",
							method: "POST",
							dataType: 'json',
							data: {
								id: id,
								depo: depo
							},
							success: function(data) {
								if (data.status == "success") {
									$('#tableobat').DataTable().ajax.reload();
									swal({
										title: "good job!",
										type: "success",
										text: "Data Berhasil dihapus",
										confirmButtonColor: "#3cb878",
									});

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

			function hapus_racikan(id_racikan) {
				swal({
					title: "Apakah kamu yakin?",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#3cb878",
					confirmButtonText: "Yakin",
					cancelButtonText: "Batal",
					closeOnConfirm: false
				}, function() {
					$().ready(function() {
						$.ajax({
							url: "<?php echo base_url() ?>Poli/hapus_racikan",
							method: "POST",
							dataType: 'json',
							data: {
								id_racikan: id_racikan
							},
							success: function(data) {
								if (data.status == "success") {
									$('#tableRacikan').DataTable().ajax.reload();
									swal({
										title: "good job!",
										type: "success",
										text: "Data Berhasil dihapus",
										confirmButtonColor: "#3cb878",
									});

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

			// function request(id_resep, jenis_resep) {
			// 	$.ajax({
			// 		url: "</?= base_url() . 'Poli/request_resep' ?>",
			// 		method: "POST",
			// 		dataType: 'json',
			// 		data: {
			// 			id_resep: id_resep,
			// 			jenis_resep: jenis_resep
			// 		},
			// 		success: function(data) {
			// 			if (data.status == "success") {
			// 				swal({
			// 					title: "good job!",
			// 					type: "success",
			// 					text: "Tindakan ini Telah di Simpan!",
			// 					confirmButtonColor: "#3cb878",
			// 				});
			// 				$('#tableresep').DataTable().ajax.reload();
			// 			} else if (data.status == "error") {
			// 				swal({
			// 					title: "Tindakan Belum Diisi",
			// 					type: "warning",
			// 					text: "Silahkan isi tindakan terlebih dahulu",
			// 					confirmButtonColor: "#3cb878",
			// 				});

			// 			} else {
			// 				swal({
			// 					title: "Gagal!",
			// 					type: "warning",
			// 					text: data.status,
			// 					confirmButtonColor: "#3cb878",
			// 				});
			// 			}
			// 		}
			// 	});
			// }
			$(document).ready(function() {
				$('#inDepo').change(function() {

					var depo = $('#inDepo').val();
					if (depo != '') {
						$.ajax({
							url: "<?php echo base_url(); ?>Poli/getNamaObat",
							method: "POST",
							data: {
								depo: depo
							},
							dataType: 'json',
							success: function(data) {
								var html = '';
								var i;
								html = '<option value="">-</option>';
								for (i = 0; i < data.length; i++) {
									html += '<option value=' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + data[i].margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + '>' + data[i].nama + '</option>';
								}
								$('#inObat').html(html);
							}
						});
					} else {
						$('#inObat').html('<option value="">-</option>');
					}
				});
				$('#inObat').change(function() {
					obat = $('#inObat').val();
					splitDiag = obat.split("|");
					tgl = splitDiag[3];
					$('#inTglExp').val(tgl);
					stok = splitDiag[4];
					$("#outStok").val(stok);
				});
			});

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


				harga = parseFloat(splitDiag[1]);
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
				if ((caraBayar == "WA14BJ84" && tipe == "1") || (caraBayar == "WA14BJ84" && tipe == "2")) {
					total = harga * frek;
				} else if (caraBayar == "WA14BJ84" && tipe == "3") {
					total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
				} else {
					total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
				}

				$("#outTotalObat").val(convertToRupiah(total.toFixed(0)));

			}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
		</script>