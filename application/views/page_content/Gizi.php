	<!-- Row -->
	<div class="panel panel-default card-view mt-20 ">
		<div class="panel-heading">
			<div class="pull-left">
				<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">DAFTAR PASIEN RAWAT
						INAP</span></h6>
			</div>
			<div class="clearfix"></div>
		</div>
		<h6 class="panel-title txt-dark mt-10"><?= $this->session->flashdata('alert'); ?></h6>
		<div class="panel-wrapper collapse in">
			<div class="panel-body">
				<div class="table-wrap">
					<div class="table-responsive">
						<table id="datable" class="table table-hover display pb-30">
							<thead>
								<tr class="bg-success">
									<th>NO</th>
									<th>TINDAKAN PASIEN</th>
									<th>TINDAKAN MAKANAN</th>
									<th>NO RM</th>
									<th>NAMA PASIEN</th>
									<th>JENIS KELAMIN</th>
									<th>TANGGAL LAHIR</th>
									<th>UMUR</th>
									<th>CARA MASUK</th>
									<th>RUANG INAP</th>
									<th>CARA BAYAR</th>
									<th>TANGGAL PELAYANAN</th>
									<th>JAM PELAYANAN</th>
									<th>DIAGNOSA</th>
									<th>DOKTER DPJP</th>
								</tr>
							</thead>
							<tfoot>
								<tr class="bg-success">
									<th>NO</th>
									<th>TINDAKAN PASIEN</th>
									<th>TINDAKAN MAKANAN</th>
									<th>NO RM</th>
									<th>NAMA PASIEN</th>
									<th>JENIS KELAMIN</th>
									<th>TANGGAL LAHIR</th>
									<th>UMUR</th>
									<th>CARA MASUK</th>
									<th>RUANG INAP</th>
									<th>CARA BAYAR</th>
									<th>TANGGAL PELAYANAN</th>
									<th>JAM PELAYANAN</th>
									<th>DIAGNOSA</th>
									<th>DOKTER DPJP</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- modal edit data -->
		<div class="modal fade bs-example-modal-lg" id="modal_edit_data" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-list mr-10"></i> INFO TINDAKAN
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
											<label class="control-label col-md-3">BENTUK MAKANAN</label>
											<div class="col-md-9 has-success" onchange="pilihTindakan()">
												<input type="hidden" id="idPelayanan1" name="idPelayanan">
												<input type="hidden" id="noRm1" name="noRm">
												<input type="hidden" id="idHis1" name="idHis">
												<input type="hidden" id="tgl_lahir1" name="tgl_lahir">
												<input type="hidden" id="nama1" name="nama">
												<input type="hidden" id="ruang1" name="ruang">
												<select class="form-control filled-input select2" placeholder="BENTUK MAKANAN" style="border: 1px solid lightgreen;" id="inBentukMakanan1" name="BentukMakanan">
													<option value="<?php echo 0 . "|" .  0; ?>">
														-</option>
													<?php
													foreach ($data_bentuk_tindakan as $row) :
													?>
														<option value="<?php echo $row['nama'] . "|" .  $row['harga']; ?>">

															<?php echo $row['nama']; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group pt-10">
											<label class="control-label col-md-3">JUMLAH TINDAKAN</label>
											<div class="col-md-9 has-error">
												<input type="number" class="form-control" id="inJumlah1" placeholder="jumlah" oninput="hargaTotal()">
												<span class="help-block"></span>
											</div>
										</div>
									</div>
								</div>
								<div class="row mt-10">
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label col-md-3">BIAYA TINDAKAN</label>
											<div class="col-md-9 has-error">
												<input type="text" class="form-control " disabled="" id="outBiayaTindakan1">
												<input type="hidden" class="form-control " disabled="" id="idPelayanan1">
												<span class="help-block"></span>
											</div>
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">TOTAL HARGA</label>
											<div class="col-md-9 has-error">
												<input type="text" class="form-control" disabled="" id="outTotal1">
												<span class="help-block"></span>
											</div>
										</div>
									</div>
								</div>
								<div class="row mt-10">
									<div class="col-md-6">
									</div>
									<div class="col-md-6">
									<button onclick="insertTambahTindakan()" class="btn btn-success btn-anim btn-md"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
								
								<div class="modal-body mt-30 mb-20">
									<h6 class="txt-dark capitalize-font"><i class="icon-list mr-10"></i>DATA MAKANAN</h6>
									<hr width="100%">
									<div class="table-wrap" style="width: 100%; margin: auto ">
										<div class="table-responsive">
											<table class="table table-hover display  pb-60" id="tableMakan">
												<thead>
													<tr class="bg-success">
														<th>NO</th>
														<th>PRINT</th>
														<th>BENTUK MAKANAN</th>
														<th>HARGA</th>
														<th>JUMLAH</th>
														<th>TOTAL HARGA</th>
														<th>TANGGAL MASUK</th>
														<th>HAPUS</th>
													</tr>
												</thead>
												<tfoot>
													<tr class="bg-success">
														<th>NO</th>
														<th>PRINT</th>
														<th>BENTUK MAKANAN</th>
														<th>HARGA</th>
														<th>JUMLAH</th>
														<th>TOTAL HARGA</th>
														<th>TANGGAL MASUK</th>
														<th>HAPUS</th>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
								<div class="col-xs-7 text-center data-wrap-right" id="outNoAntriUmum1" style="display: none">
									<table>
										<tbody>

											<tr>
												<td width="50%"><?php echo "NAMA LENGKAP";   ?></td>
												<td width="50%">
													<font id="nama_lengkap1">
												</td>
											</tr>
											<tr>
												<td width="50%"><?php echo "TANGGAL LAHIR";   ?></td>
												<td width="50%">
													<font id="tanggal_lahir1">
												</td>
											</tr>
											<tr>
												<td width="50%"><?php echo "NO REKAM MEDIS";   ?></td>
												<td width="50%">
													<font id="noRmm1">
												</td>
											</tr>
											<tr>
												<td width="50%"><?php echo "RUANG";   ?></td>
												<td width="50%">
													<font id="ruangg1">
												</td>
											</tr>
											<tr>
												<td width="50%"><?php echo "MAKANAN";   ?></td>
												<td width="25%">
													<font id="bentuk_makanann1">
												</td>
											</tr>
											<tr>
												<td width="50%"><?php echo "HARGA";   ?></td>
												<td width="50%">
													<font id="diet_makanan1">
												</td>
											</tr>
											<tr>
												<td width="50%"><?php echo "JUMLAH";   ?></td>
												<td width="50%">
													<font id="keterangan1">
												</td>
											</tr>
											<tr>
												<td width="50%"><?php echo "TOTAL HARGA";   ?></td>
												<td width="50%">
													<font id="ttl">
												</td>
											</tr>
										</tbody>
									</table>
									<br>
									<center>ALAT MAKAN DIAMBIL +- 1 JAM SETELAH MAKAN DIANTAR</center>
									<center>MAKANAN TIDAK DIJAMIN SEGAR SETELAH 1 JAM</center>
									<center>SELAMAT MENIKMATI</center>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="modal fade bs-example-modal-lg" id="modal_tindakan_makanan" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-list mr-10"></i> INFO TINDAKAN
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
											<label class="control-label col-md-3">BENTUK MAKANAN</label>
											<div class="col-md-9 has-success">
												<input type="hidden" id="idPelayanan" name="idPelayanan">
												<input type="hidden" id="noRm" name="noRm">
												<input type="hidden" id="idHis" name="idHis">
												<input type="hidden" id="id_tindakan_gizi" name="id_tindakan_gizi">
												<input type="hidden" id="tgl_lahir" name="tgl_lahir">
												<input type="hidden" id="nama" name="nama">
												<input type="hidden" id="ruang" name="ruang">
												<select class="form-control filled-input select2" placeholder="BENTUK MAKANAN" style="border: 1px solid lightgreen;" id="inBentukMakanan" name="BentukMakanan">
													<option value="-">
														-</option>
													<?php
													foreach ($data_bentuk_makanan as $row) :
													?>
														<option value="<?php echo $row['nama']; ?>">
															<?php echo $row['nama']; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<span class="help-block"></span>
											<label class="control-label col-md-3">DIET MAKANAN</label>
											<div class="col-md-9 has-success">

												<select class="select2 select2-multiple" multiple="multiple" data-placeholder="Choose" placeholder="DIET MAKANAN" style="border: 1px solid lightgreen;" id="inDietMakanan" name="DietMakanan">
													<option value="-">
														-</option>
													<?php
													foreach ($data_diet_makanan as $row) :
													?>
														<option value="<?php echo $row['nama']; ?>">
															<?php echo $row['nama']; ?></option>
													<?php endforeach; ?>

												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="row mt-10">
									<div class="col-md-6">
										<div class="form-group">
											<span class="help-block"></span>
											<label class="control-label col-md-3">KETERA-<br>NGAN</label>
											<div class="col-md-9 has-success">
												<textarea class="form-control" rows="5" style="resize:none" id="keteranganSekarang"></textarea>
											</div>
										</div>
									</div>
									<div class="col-md-6 mt-10">
										<button onclick="insertUpdateTambahGizi()" class="btn btn-success btn-anim  btn-md"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
									</div>
								</div>
								<div class="modal-body mt-30 mb-20">
									<h6 class="txt-dark capitalize-font"><i class="icon-list mr-10"></i>DATA MAKANAN</h6>
									<hr width="100%">
									<div class="table-wrap" style="width: 100%; margin: auto ">
										<div class="table-responsive">
											<table class="table table-hover display  pb-60" id="tableMakanan">
												<thead>
													<tr class="bg-success">
														<th>NO</th>
														<th>PRINT</th>
														<th>BENTUK MAKANAN</th>
														<th>DIET MAKANAN</th>
														<th>KETERANGAN</th>
														<th>TANGGAL MASUK</th>
														<th>HAPUS</th>
													</tr>
												</thead>
												<tfoot>
													<tr class="bg-success">
														<th>NO</th>
														<th>PRINT</th>
														<th>BENTUK MAKANAN</th>
														<th>DIET MAKANAN</th>
														<th>KETERANGAN</th>
														<th>TANGGAL MASUK</th>
														<th>HAPUS</th>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
								<div class="col-xs-7 text-center data-wrap-right" id="outNoAntriUmum" style="display: none">
									<table>
										<tbody>

											<tr>
												<td width="50%"><?php echo "NAMA LENGKAP";   ?></td>
												<td width="50%">
													<font id="nama_lengkap">
												</td>
											</tr>
											<tr>
												<td width="50%"><?php echo "TANGGAL LAHIR";   ?></td>
												<td width="50%">
													<font id="tanggal_lahir">
												</td>
											</tr>
											<tr>
												<td width="50%"><?php echo "NO REKAM MEDIS";   ?></td>
												<td width="50%">
													<font id="noRmm">
												</td>
											</tr>
											<tr>
												<td width="50%"><?php echo "RUANG";   ?></td>
												<td width="50%">
													<font id="ruangg">
												</td>
											</tr>
											<tr>
												<td width="50%"><?php echo "DIET";   ?></td>
												<td width="25%">
													<font id="bentuk_makanann">
												</td>
											</tr>
											<tr>
												<td width="50%"><?php echo " ";   ?></td>
												<td width="50%">
													<font id="diet_makanan">
												</td>
											</tr>
											<tr>
												<td width="50%"><?php echo " ";   ?></td>
												<td width="50%">
													<font id="keterangan">
												</td>
											</tr>
										</tbody>
									</table>
									<br>
									<center>ALAT MAKAN DIAMBIL +- 1 JAM SETELAH MAKAN DIANTAR</center>
									<center>MAKANAN TIDAK DIJAMIN SEGAR SETELAH 1 JAM</center>
									<center>SELAMAT MENIKMATI</center>
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
			function tambah_makanan(id_pelayanan, id_history, no_rm) {
				$.ajax({
					url: "<?= base_url() . 'Gizi/getMakanByNoRm' ?>",
					data: {
						pelayanan: id_pelayanan,
						history: id_history,
						no_rm: no_rm
					},
					type: 'POST',
					dataType: 'json',
					success: function(data) {
						if (data.status_dt == "found") {
							$("#tipe_masuk1").val(data.jenis_pelayanan);
							$("#noRm1").val(data.no_rm);
							$("#nama1").val(data.nama);
							$("#ruang1").val(data.poli);
							$("#inTanggalKunjugan1").val(data.tgl_masuk);
							$("#idPelayanan1").val(data.id_pelayanan);
							$("#idHis1").val(data.id_history);
							$("#id_tindakan_gizi1").val(data.id_tindakan);
							$("#tgl_lahir1").val(data.tgl_lahir);
							$("#NamaPasien1").val(data.nama).change();
							$("#inAsalPasien1").val(data.asal_pasien).change();
							$("#inCaraBayar1").val(data.id_cara_bayar).change();
							$("#modal_edit_data").modal('show');
							reload_data_makan(id_pelayanan, no_rm);
						} else {
							alert("data tidak ditemukan");
						}
					}
				});
			}

			function tambah_tindakan(id_pelayanan, id_history, no_rm) {
				$.ajax({
					url: "<?= base_url() . 'Gizi/getTindakannByNoRm' ?>",
					data: {
						pelayanan: id_pelayanan,
						history: id_history,
						no_rm: no_rm
					},
					type: 'POST',
					dataType: 'json',
					success: function(data) {
						if (data.status_dt == "found") {
							$("#tipe_masuk").val(data.jenis_pelayanan);
							$("#noRm").val(data.no_rm);
							$("#nama").val(data.nama);
							$("#ruang").val(data.poli);
							$("#inTanggalKunjugan").val(data.tgl_masuk);
							$("#idPelayanan").val(data.id_pelayanan);
							$("#idHis").val(data.id_history);
							$("#id_tindakan_gizi").val(data.id_tindakan);
							$("#tgl_lahir").val(data.tgl_lahir);
							$("#NamaPasien").val(data.nama).change();
							$("#inAsalPasien").val(data.asal_pasien).change();
							$("#inCaraBayar").val(data.id_cara_bayar).change();
							$("#modal_tindakan_makanan").modal('show');
							reload_data_makanan(id_pelayanan, no_rm);
						} else {
							alert("data tidak ditemukan");
						}
					}
				});
			}
		</script>
		<script type="text/javascript">
			function reload_data_makan(idPelayanan, no_rm) {
				$('#tableMakan').dataTable().fnClearTable();
				$('#tableMakan').dataTable().fnDestroy();
				$('#tableMakan').DataTable({
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
						"url": '<?php echo base_url('Gizi/tampil_list_makanan'); ?>',
						"type": 'POST',
						"data": {
							id_pelayanan: idPelayanan,
							no_rm: no_rm
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

			function reload_data_makanan(idPelayanan, no_rm) {
				$('#tableMakanan').dataTable().fnClearTable();
				$('#tableMakanan').dataTable().fnDestroy();
				$('#tableMakanan').DataTable({
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
						"url": '<?php echo base_url('Gizi/tampil_list_tindakan'); ?>',
						"type": 'POST',
						"data": {
							id_pelayanan: idPelayanan,
							no_rm: no_rm
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
					"ajax": '<?php echo base_url('Gizi/tampil_data_gizi'); ?>',
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
			function insertTambahTindakan() {
				idPelayanan = $("#idPelayanan1").val();
				no_rm = $("#noRm1").val();
				idHis = $("#idHis1").val();

				a = $("#inBentukMakanan1").val();
				splitDiag = a.split("|");

				bentuk_makanan = String(splitDiag[0]);
				a = $("#inBentukMakanan1").val();
				splitDiag = a.split("|");

				harga = parseFloat(splitDiag[1]);

				frek = parseFloat($("#inJumlah1").val());
				total = harga * frek;


				dataString = 'bentuk_makanan=' + bentuk_makanan +
					'&idPelayanan=' + idPelayanan + '&harga=' + harga + '&harga=' + harga + '&frek=' + frek + '&total=' + total;

				if (bentuk_makanan == null || bentuk_makanan == "-") {
					swal({
						title: "PILIH BENTUK MAKANAN DAHULU!",
						type: "warning",

						confirmButtonColor: "#3cb878",
					});
				} else {
					$.ajax({
						type: "POST",
						url: "<?= base_url() . 'Gizi/insertTindakanMakanan' ?>",
						data: dataString,
						success: function(data) {
							swal({
								title: "good job!",
								type: "success",
								text: "Tindakan ini Telah di Simpan!",
								confirmButtonColor: "#3cb878",
							});
							tambah_makanan(idPelayanan, idHis, no_rm)
							reload_data_makan(idPelayanan);
						}
					});
				}
			}

			function insertUpdateTambahGizi() {
				idPelayanan = $("#idPelayanan").val();
				idHis = $("#idHis").val();
				diet_makanan = $("#inDietMakanan").val();
				// bentuk_makanan = $("#inBentukMakanan").val();

				keterangan_gizi = $("#keteranganSekarang").val();
				no_rm = $("#noRm").val();
				idHis = $("#idHis").val();

				bentuk_makanan = $("#inBentukMakanan").val();

				dataString = 'keterangan_gizi=' + keterangan_gizi + '&diet_makanan=' + diet_makanan + '&bentuk_makanan=' + bentuk_makanan +
					'&idPelayanan=' + idPelayanan + '&idHis=' + idHis;
				// 		  alert(dataString);
				if (bentuk_makanan == null || bentuk_makanan == "-") {
					swal({
						title: "PILIH BENTUK MAKANAN DAHULU!",
						type: "warning",

						confirmButtonColor: "#3cb878",
					});
				} else if (diet_makanan == null || diet_makanan == "-") {
					swal({
						title: "PILIH DIET MAKANAN DAHULU!",
						type: "warning",

						confirmButtonColor: "#3cb878",
					});
				} else {
					$.ajax({
						type: "POST",
						url: "<?= base_url() . 'Gizi/insertTindakanGiziMakanan' ?>",
						data: dataString,
						success: function(data) {
							swal({
								title: "good job!",
								type: "success",
								text: "Tindakan ini Telah di Simpan!",
								confirmButtonColor: "#3cb878",
							});
							tambah_tindakan(idPelayanan, idHis, no_rm)
							reload_data_makanan(idPelayanan);
						}
					});
				}
			}

			function cetak(bentuk_makanan, diet_makanan, keterangan_gizi, id_tindakan_gizi) {
				idPelayanan = $("#idPelayanan").val();
				no_rm = $("#noRm").val();
				idHis = $("#idHis").val();
				tgl_lahir = $("#tgl_lahir").val();
				nama = $("#nama").val();
				ruang = $("#ruang").val();

				$.ajax({
					url: "<?= base_url() . 'Gizi/print_gizi' ?>",
					data: {
						idPelayanan: idPelayanan,
						diet_makanan: diet_makanan,
						id_tindakan_gizi: id_tindakan_gizi,
						bentuk_makanan: bentuk_makanan,
						keterangan_gizi: keterangan_gizi,
						idHis: idHis,
						tgl_lahir: tgl_lahir,
						nama: nama,
						no_rm: no_rm,
						ruang: ruang,

					},
					type: 'POST',
					dataType: 'json',
					success: function(html) {
						document.getElementById("nama_lengkap").innerHTML = html.nama;
						document.getElementById("ruangg").innerHTML = html.ruang;
						document.getElementById("tanggal_lahir").innerHTML = html.tgl_lahir;
						document.getElementById("noRmm").innerHTML = html.no_rm;
						document.getElementById("bentuk_makanann").innerHTML = html.bentuk_makanan;
						document.getElementById("diet_makanan").innerHTML = html.dietmakanan;
						document.getElementById("keterangan").innerHTML = html.keterangan_gizi;

						var printContents = document.getElementById("outNoAntriUmum").innerHTML;
						var originalContents = document.body.innerHTML;

						document.body.innerHTML = printContents;

						window.print();
						window.location.reload(true);
						// window.onmousemove = function() {
						// 	window.close();
						// }

						document.body.innerHTML = originalContents;

						// reload_data_makanan(idPelayanan);

					}
				});
			}



			function cetak1(bentuk_makanan, harga, frek, total, id_tindakan) {
				idPelayanan = $("#idPelayanan1").val();
				no_rm = $("#noRm1").val();
				idHis = $("#idHis1").val();
				tgl_lahir = $("#tgl_lahir1").val();
				nama = $("#nama1").val();
				ruang = $("#ruang1").val();

				$.ajax({
					url: "<?= base_url() . 'Gizi/print_gizi1' ?>",
					data: {
						idPelayanan: idPelayanan,
						bentuk_makanan: bentuk_makanan,
						harga: harga,
						frek: frek,
						total: total,
						idHis: idHis,
						tgl_lahir: tgl_lahir,
						nama: nama,
						no_rm: no_rm,
						ruang: ruang,
						id_tindakan: id_tindakan,

					},
					type: 'POST',
					dataType: 'json',
					success: function(html) {
						document.getElementById("nama_lengkap1").innerHTML = html.nama;
						document.getElementById("ruangg1").innerHTML = html.ruang;
						document.getElementById("tanggal_lahir1").innerHTML = html.tgl_lahir;
						document.getElementById("noRmm1").innerHTML = html.no_rm;
						document.getElementById("bentuk_makanann1").innerHTML = html.bentuk_makanan;
						document.getElementById("diet_makanan1").innerHTML = html.harga;
						document.getElementById("keterangan1").innerHTML = html.frek;
						document.getElementById("ttl").innerHTML = html.total;

						var printContents = document.getElementById("outNoAntriUmum1").innerHTML;
						var originalContents = document.body.innerHTML;

						document.body.innerHTML = printContents;

						window.print();
						window.location.reload();

						document.body.innerHTML = originalContents;

					}
				});
			}

			function hapus_tindakan(id_tindakan_gizi, bentuk_makanan) {
				swal({
					title: "Apakah kamu yakin?",
					text: "Menghapus bentuk makanan " + bentuk_makanan + "?",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#3cb878",
					confirmButtonText: "Yakin",
					cancelButtonText: "Batal",
					closeOnConfirm: false
				}, function() {
					$().ready(function() {
						$.ajax({
							url: "<?php echo base_url() ?>Gizi/hapus_data_tindakan",
							method: "POST",
							dataType: 'json',
							data: {
								id_tindakan_gizi: id_tindakan_gizi,
							},
							success: function(data) {
								if (data.status == "success") {
									swal({
										title: "good job!",
										type: "success",
										text: "Data Berhasil dihapus",
										confirmButtonColor: "#3cb878",
									});
									$('#tableMakanan').DataTable().ajax.reload();
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

			function hapus_tindakan1(id_tindakan_gizi, bentuk_makanan) {
				swal({
					title: "Apakah kamu yakin?",
					text: "Menghapus bentuk makanan " + bentuk_makanan + "?",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#3cb878",
					confirmButtonText: "Yakin",
					cancelButtonText: "Batal",
					closeOnConfirm: false
				}, function() {
					$().ready(function() {
						$.ajax({
							url: "<?php echo base_url() ?>Gizi/hapus_data_tindakan1",
							method: "POST",
							dataType: 'json',
							data: {
								id_tindakan_gizi: id_tindakan_gizi,
							},
							success: function(data) {
								if (data.status == "success") {
									swal({
										title: "good job!",
										type: "success",
										text: "Data Berhasil dihapus",
										confirmButtonColor: "#3cb878",
									});
									$('#tableMakan').DataTable().ajax.reload();
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
			function pilihTindakan() {
				a = $("#inBentukMakanan1").val();
				splitDiag = a.split("|");

				harga = parseFloat(splitDiag[1]);
				$("#outBiayaTindakan1").val(convertToRupiah(harga));
				document.getElementById("inJumlah1").value = "1";
				document.getElementById("outTotal1").value = convertToRupiah(harga);
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
				frek = parseFloat($("#inJumlah1").val());
				total = harga * frek;

				$("#outTotal1").val(convertToRupiah(total));

			}
		</script>