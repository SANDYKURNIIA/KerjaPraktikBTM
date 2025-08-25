<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>
<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">RUJUKAN INTERNAL</span>
			</h6>
		</div>
		<div class="clearfix"></div>
	</div>
	<h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="table-wrap">
				<div class="table-responsive">
					<table id="datable" class="table table-hover display  pb-30">
						<thead>
							<tr class="bg-success">
								<th>No</th>
								<?php if ($izinAkses == "admin") { ?>
									<th>Hapus</th>
								<?php } ?>
								<th>Aksi</th>
								<th>No. RM</th>
								<th>Nama Pasien</th>
								<th>Tanggal Masuk</th>
								<th>Jam Masuk</th>
								<!-- <th>Jenis Pelayanan</th> -->
								<th>Jenis Kelamin</th>
								<th>Tanggal Lahir</th>
								<th>Umur</th>
								<th>Agama</th>
								<th>JENIS KLAIM</th>
								<th>Diagnosa</th>
								<th>No. Sep</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>No</th>
								<?php if ($izinAkses == "admin") { ?>
									<th>Hapus</th>
								<?php } ?>
								<th>Aksi</th>
								<th>No. RM</th>
								<th>Nama Pasien</th>
								<th>Tanggal Masuk</th>
								<th>Jam Masuk</th>
								<!-- <th>Jenis Pelayanan</th> -->
								<th>Jenis Kelamin</th>
								<th>Tanggal Lahir</th>
								<th>Umur</th>
								<th>Agama</th>
								<th>JENIS KLAIM</th>
								<th>Diagnosa</th>
								<th>No. Sep</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal edit -->
<div class="panel-wrapper collapse in">
	<div class="panel-body">
		<!-- sample modal content -->
		<div class="modal fade" id="modal_edit_pelayanan" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
						<h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT DATA KUNJUNGAN
						</h5>
					</div>
					<div class="modal-body">

						<!-- /formbody -->
						<div class="form-body mt-20" style="margin-left:-1em">

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">TIPE
											MASUK</label>
										<div class="col-md-9 has-success">
											<input type="hidden" id="id_pelayanan" name="id_pelayanan">
											<input type="hidden" id="inCaraBayar" name="inCaraBayar">
											<select style="border: 1px solid lightgreen;" class="form-control  filled-input select2" placeholder="Choose a Category" id="inTipeMasuk" name="inTipeMasuk">
												<option value="0">-</option>
												<option value="1">UGD</option>
												<option value="2">POLI</option>
												<option value="3">RAWAT INAP
												</option>
												<option value="5">ONE DAY CARE (ODC)</option>
												<option value="4">POLI PRIORITAS</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6 ">
									<div class="form-group">
										<label class="control-label col-md-3">TANGGAL
											KUNJUNGAN</label>
										<div class="col-md-9 has-success">
											<input type="text" class="form-control filled-input" placeholder="TANGGAL" disabled="" id="inTanggalKunjugan" name="inTanggalKunjugan" value="<?php date_default_timezone_set('Asia/Jakarta');
																																															echo date("Y-m-d H:i:s"); ?>">
										</div>
									</div>
								</div>
							</div>
							<!--
								<div class="col-md-6 collapse" id="cb_hide">
									<div class="form-group">
										<label class="control-label col-md-3">JENIS KLAIM</label><span id="cara_bayar_error" class="text-danger"></span>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inCaraBayar" name="inCaraBayar">
												<option value="-">-</option>
												<?php
												foreach ($cara_bayar as $row) {

												?>
													<option value="<?php echo $row["id_cara_bayar"]; ?>">
														<?php echo  $row["nama"]; ?></option>
												<?php }  ?>
											</select>
										</div>
									</div>
								</div> -->
							<!-- /Row -->
							<div class="data_hide data_hide_2">
								<!-- /Row -->
								<div class="row mt-10">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">POLI
												TUJUAN
											</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" placeholder="Choose a Category" id="inPoliTuj" name="inPoliTuj">

												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Row -->
							<!-- /Row -->
							<div class="data_hide data_hide_5">
								<!-- /Row -->
								<div class="row mt-10">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">POLI TUJUAN
											</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" placeholder="Choose a Category" id="inPoliTuj2" name="inPoliTuj2">

												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="data_hide data_hide_4">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">POLI TUJUAN</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inJenisPoliPrioritas" name="inJenisPoliPrioritas">
												</select>
											</div>
										</div>
									</div>
									<!--/span-->
								</div>
								<span class="help-block"></span>
							</div>
							<!-- /Row -->
							<div class="row mt-25">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">NAMA DOKTER
											(DPJP)</label>
										<div class="col-md-9 has-success">
											<select style="border: 1px solid lightgreen;" class="form-control filled-input select2" placeholder="Choose a Category" id="inDPJP" name="inDPJP">

											</select>
										</div>
									</div>
								</div>
							</div>



							<div class="data_hide data_hide_3">
								<!-- /Row -->
								<div class="row mt-10">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">KELAS
											</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" placeholder="Choose a Category" id="id_kamar" name="id_kamar">
													<option value="-">-</option>
													<?php
													foreach ($kelas as $row) {

													?>
														<option value="<?php echo $row["kelas_ruangan"]; ?>">
															<?php echo $row["kelas_ruangan"]; ?>
														</option>
													<?php }  ?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">NO TEMPAT
												TIDUR
											</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" placeholder="Choose a Category" id="id_tempat_tidur" name="id_tempat_tidur">


												</select>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">STATUS
											</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" placeholder="Choose a Category" id="status" name="status">
													<option value="AKTIF">AKTIF</option>
													<option value="TITIP">TITIP</option>

												</select>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="data_hide data_hide_5">
								<!-- /Row -->
								<div class="row mt-10">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">KELAS
											</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" placeholder="Choose a Category" id="id_kamar2" name="id_kamar2">
													<option value="-">-</option>
													<?php
													foreach ($kelas as $row) {

													?>
														<option value="<?php echo $row["kelas_ruangan"]; ?>">
															<?php echo $row["kelas_ruangan"]; ?>
														</option>
													<?php }  ?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">NO TEMPAT
												TIDUR
											</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" placeholder="Choose a Category" id="id_tempat_tidur2" name="id_tempat_tidur2">


												</select>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">STATUS
											</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" placeholder="Choose a Category" id="status" name="status">
													<option value="AKTIF">AKTIF</option>
													<option value="TITIP">TITIP</option>

												</select>
											</div>
										</div>
									</div>

								</div>
							</div>


							<div class="modal-footer mb-5 mr-5 mt-10">
								<input type="hidden" id="inBiayaDok" name="inBiayaDok">
								<button onclick="insertData()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
							</div>
						</div>

					</div>
					<!-- /Row -->
				</div>
				<!-- /formbody -->
			</div>
		</div>

	</div>
</div>

<style>
	td {
		color: black;
	}
</style>
<!-- Js -->
<script type="text/javascript">
	function delete_pasien(id_pelayanan, tipe) {
		// nama = $("#NamaPasien").val();
		swal({
			title: "Apakah kamu yakin akan !",
			text: "Menghapus data ini ?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Pelayanan_masuk/delete_pasien",
					method: "POST",
					dataType: 'json',
					data: {
						id_pelayanan: id_pelayanan,
						tipe: tipe,
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Pasien Rawat Jalan Berhasil dihapus",
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
			});
		});
		return false;
	}
</script>
<script type="text/javascript">
	function edit_data_pelayanan(id_pelayanan) {
		$.ajax({
			url: "<?= base_url() . 'Pelayanan_masuk/getdata_pelayanan' ?>",
			data: {
				pelayanan: id_pelayanan,
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {

				if (data.status_dt == "found") {
					//disini set datanya ke modal
					$("#id_pelayanan").val(data.id_pelayanan);
					$("#id_kamar").val(data.id_kamar).change();
					$("#inPoliTuj").val(data.nama_poli).change();
					$("#inTipeMasuk").val(data.jenis_pelayanan);
					$("#inTanggalKunjugan").val(data.tgl_masuk);
					$("#inDPJP").val(data.nama_dokter);
					$("#inCaraBayar").val(data.id_cara_bayar);



					$("#modal_edit_pelayanan").modal('show');
				} else {
					alert("data tidak ditemukan");
				}
			}
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
				"sSearch": "Pencarian:",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext": "Selanjutnya",
					"sLast": "Terakhir"
				},
			},
			"ajax": '<?php echo base_url('Pelayanan_masuk/tampil_pelayanan_masuk'); ?>',
			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
		});
	});
	// Make to collapse hidden
	$('.data_hide').addClass('collapse');

	$('#inTipeMasuk').change(function() {

		var selector = '.data_hide_' + $(this).val();

		$('.data_hide').collapse('hide');

		$(selector).collapse('show');
	});
</script>

<script type="text/javascript">
	function insertData() {
		id_pelayanan = $('#id_pelayanan').val();
		jenis_pelayanan = $('#inTipeMasuk').val();
		tgl_masuk = $('#inTanggalKunjugan').val();
		dpjp = $('#inDPJP').val();
		nama_poli = $('#inPoliTuj').val();
		nama_poli2 = $('#inPoliTuj2').val();
		nama = $('#inJenisPoliPrioritas').val();
		id_tempat_tidur = $('#id_tempat_tidur').val();
		id_tempat_tidur2 = $('#id_tempat_tidur2').val();
		id_kamar = $('#id_kamar').val();
		id_kamar2 = $('#id_kamar2').val();
		status = $('#status').val();
		biaya_jasa = $('#inBiayaDok').val();
		if (dpjp == "" || dpjp == 'null' || dpjp == null) {
			swal({
				title: "Gagal!",
				type: "warning",
				text: "Dokter dipilih terlebih dahulu",
				confirmButtonColor: "#3cb878",
			});
		} else {
			$.ajax({
				url: "<?php echo base_url() ?>Pelayanan_masuk/tambah_kunjungan",
				method: "POST",
				dataType: 'json',
				data: {
					id_pelayanan: id_pelayanan,
					jenis_pelayanan: jenis_pelayanan,
					tgl_masuk: tgl_masuk,
					dpjp: dpjp,
					nama: nama,
					nama_poli: nama_poli,
					nama_poli2: nama_poli2,
					id_tempat_tidur: id_tempat_tidur,
					id_tempat_tidur2: id_tempat_tidur2,
					id_kamar: id_kamar,
					id_kamar2: id_kamar2,
					status: status,
					biaya_jasa: biaya_jasa,
				},
				success: function(data) {
					if (data.status == "success") {
						if (jenis_pelayanan == '2') {
							swal({
								title: "good job!",
								type: "success",
								text: "Silahkan Menuju Kasir",
								confirmButtonColor: "#3cb878",
								confirmButtonText: "OK",
							}, function() {
								$().ready(function() {
									window.location.href = '<?php echo base_url() ?>Pencarian_pasien/cetak_antrian_pasien/' + data.id_antrian + '/poli';
								});
							});
						} else {
							swal({
								title: "good job!",
								type: "success",
								text: "Data Berhasil ditambahkan",
								confirmButtonColor: "#3cb878",
							});

						}
						id_pelayanan = $('#id_pelayanan').val("");
						jenis_pelayanan = $('#inTipeMasuk').val("0").change();
						tgl_masuk = $('#inTanggalKunjugan').val("");
						dpjp = $('#inDPJP').val("").change();
						nama_poli = $('#inPoliTuj').val("");
						nama = $('#inJenisPoliPrioritas').val('-').change();
						nama_poli2 = $('#inPoliTuj2').val("");
						id_kamar = $('#id_kamar').val("");
						id_kamar2 = $('#id_kamar2').val("");

						$("#modal_edit_pelayanan").modal('hide');
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
			return false;
		}
	}
</script>
<script type="text/javascript">
	$(document).ready(function() {


		$('#id_kamar').change(function() {
			var kelas = $('#id_kamar').val();
			if (kelas != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pelayanan_masuk/getKamar",
					method: "POST",
					data: {
						kelas: kelas
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_ruangan + '>' + data[i].tipe + '</option>';
						}
						$('#id_tempat_tidur').html(html);
					}
				});
			} else {
				$('#id_tempat_tidur').html('<option value="-">-</option>');
			}
		});

		//Kamar ODC
		$('#id_kamar2').change(function() {
			var kelas = $('#id_kamar2').val();
			if (kelas != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pelayanan_masuk/getKamar",
					method: "POST",
					data: {
						kelas: kelas
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_ruangan + '>' + data[i].tipe + '</option>';
						}
						$('#id_tempat_tidur2').html(html);
					}
				});
			} else {
				$('#id_tempat_tidur2').html('<option value="-">-</option>');
			}
		});

		// pilih tindakan
		$('#inTipeMasuk').change(function() {
			var tipe_masuk = $('#inTipeMasuk').val();
			var poli = $('#inPoliTuj').val();
			if (tipe_masuk == '1') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pelayanan_masuk/getDokter",
					method: "POST",
					data: {
						tipe_masuk: tipe_masuk
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP').html(html);
					}
				});
			} else if (tipe_masuk == '2') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pelayanan_masuk/getNamaPoli",
					method: "POST",
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_list_poli + '>' + data[i].nama_panjang + '</option>';
						}
						$('#inPoliTuj').html(html);
					}
				});
			} else if (tipe_masuk == '3') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pelayanan_masuk/getDokter",
					method: "POST",
					data: {
						tipe_masuk: tipe_masuk
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP').html(html);
					}
				});
			} else if (tipe_masuk == '5') { //if ODC
				$.ajax({
					url: "<?php echo base_url(); ?>Pelayanan_masuk/getNamaPoliODC",
					method: "POST",
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_list_poli + '>' + data[i].nama_panjang + '</option>';
						}
						$('#inPoliTuj2').html(html);
					}
				});
			} else if (tipe_masuk == '4') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getNamaPoliPrioritas",
					method: "POST",
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_list_poli + '>' + data[i].nama_poli + '</option>';
						}
						$('#inJenisPoliPrioritas').html(html);

					}
				});
			}
		});
		$('#inPoliTuj').change(function() {
			var poli = $('#inPoliTuj').val();
			if (poli != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pelayanan_masuk/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP').html(html);

					}
				});
			} else {
				$('#inDPJP').html('<option value="-">-</option>');
			}
		});
		//tes prioritas
		$('#inJenisPoliPrioritas').change(function() {
			var poli = $('#inJenisPoliPrioritas').val();
			if (poli != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokterPrioritas",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP').html(html);

					}
				});
			} else {
				$('#inDPJP').html('<option>-</option>');
			}
		});
		//end tes

		//poli tujuan ODC
		$('#inPoliTuj2').change(function() {
			var poli = $('#inPoliTuj2').val();
			if (poli != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pelayanan_masuk/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP').html(html);

					}
				});
			} else {
				$('#inDPJP').html('<option value="-">-</option>');
			}
		});

		$('#inDPJP').change(function() {
			var cara_bayar = $('#inCaraBayar').val();
			dpjp = $('#inDPJP').val();
			tipe = $('#inTipeMasuk').val();
			$.ajax({
				url: "<?= base_url() . 'Pasien/get_dokter' ?>",
				data: {
					id_dokter: dpjp,
				},
				type: 'POST',
				dataType: 'json',
				success: function(data) {
					// alert(cara_bayar);

					if (cara_bayar == '30') { //bpjs
						$('#inBiayaDok').val(data.jasmed_bpjs_pagi).change();

					} else if (cara_bayar == '42') { //pp
						if (tipe == '4') {
							$('#inBiayaDok').val(200000);
						} else {
							$('#inBiayaDok').val(data.jasmed_pp_pagi);

						}

					} else if ((cara_bayar == '32' || cara_bayar == '41' || cara_bayar == '41PR') && tipe_masuk == '4') { //PLN prioritas

						$('#inBiayaDok').val(150000);
					} else if (cara_bayar == '333') { //timah
						if (tipe == '4') {
							$('#inBiayaDok').val(data.jasmed_timah_pagi);
						} else {
							$('#inBiayaDok').val(data.jasmed_asuransi_pagi);
						}

					} else { //asuransi
						if (tipe == '4') {
							$('#inBiayaDok').val(200000);
						} else {
							$('#inBiayaDok').val(data.jasmed_asuransi_pagi);
						}


					}
				}
			});


		});
	});
</script>