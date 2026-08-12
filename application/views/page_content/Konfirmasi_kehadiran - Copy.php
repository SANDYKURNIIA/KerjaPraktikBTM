<<<<<<< HEAD
	<!-- Row -->
	<div class="panel panel-default card-view mt-20">
		<div class="panel-heading">
			<div class="pull-left">
				<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">KONFIRMASI
						KEHADIRAN</span>
				</h6>
			</div>
			<div class="clearfix"></div>
		</div>
		<h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
		<div class="panel-wrapper collapse in">
			<div class="panel-body">
				<div class="table-wrap">
					<div class="table-responsive">
						<table id="datable" class="table table-hover display pb-30">
							<thead>
								<tr class="bg-success">
									<th>NO.</th>
									<th>UBAH</th>
									<th>BATAL</th>
									<th>KONFIRMASI</th>
									<th>STATUS</th>
									<th>NO RM</th>
									<th>NAMA PASIEN</th>
									<th>TANGGAL MASUK</th>
									<th>JAM MASUK</th>
									<th>NO ANTRIAN</th>
									<th>JENIS KELAMIN</th>
									<th>TANGGAL LAHIR</th>
									<th>UMUR</th>
									<th>AGAMA</th>
									<th>CARA MASUK</th>
									<th>POLIKLINIK/RUANG</th>
									<th>DPJP</th>
									<th>CARA BAYAR</th>
									<th>DIAGNOSA</th>
									<th>KETERANGAN</th>
									<th>NO SEP</th>
									<th>NAMA AKUN</th>
									<th>TELP</th>
								</tr>
							</thead>
							<tfoot>
								<tr class="bg-success">
									<th>NO.</th>
									<th>UBAH</th>
									<th>BATAL</th>
									<th>KONFIRMASI</th>
									<th>STATUS</th>
									<th>NO RM</th>
									<th>NAMA PASIEN</th>
									<th>TANGGAL MASUK</th>
									<th>JAM MASUK</th>
									<th>NO ANTRIAN</th>
									<th>JENIS KELAMIN</th>
									<th>TANGGAL LAHIR</th>
									<th>UMUR</th>
									<th>AGAMA</th>
									<th>CARA MASUK</th>
									<th>POLIKLINIK/RUANG</th>
									<th>DPJP</th>
									<th>CARA BAYAR</th>
									<th>DIAGNOSA</th>
									<th>KETERANGAN</th>
									<th>NO SEP</th>
									<th>NAMA AKUN</th>
									<th>TELP</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal Ubah -->

	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<!-- sample modal content -->
			<div class="modal fade " id="ModalUbah" role="dialog" aria-labelledby="myLargeModalLabel"
				aria-hidden="true" style="display: none;">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT
								KUNJUNGAN</h5>
						</div>
						<div class="modal-body">
							<!-- Form body  -->
							<div class="form-body mt-20">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">TIPE
												MASUK</label>
											<div class="col-md-9 has-success">
												<select class="form-control txt-dark filled-input select2"
													placeholder="Choose a Category"  id="inTipeMasuk"
													name="inTipeMasuk">
													<option value="0">-</option>
													<option value="1">UGD</option>
													<option value="2">POLI</option>
													<option value="3">RAWAT INAP</option>
												</select>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">TANGGAL
												KUNJUNGAN</label>
											<div class="col-md-9 has-error">
												<input type="text" class="form-control filled-input" placeholder="TANGGAL"
													id="inTanggalKunjugan"  value="<?php date_default_timezone_set('Asia/Jakarta');
													echo date("Y-m-d H:i:s"); ?>">
												<span class="help-block"></span>
											</div>
										</div>
									</div>
								</div>
								<span class="help-block"></span>
								<!-- /Row -->

								<!-- /Row -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">ASAL PASIEN</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2"
													placeholder="Choose a Category"  id="asalUbah">
													<?php
															foreach ($asal_pasien as $row) {
													?>
													<option value="<?php echo $row['id_asal_pasien']; ?>">
														<?php echo $row['nama']; ?></option>
													<?php }  ?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">CARA BAYAR</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2"
													placeholder="Choose a Category"  id="bayarUbah">
													<?php
															foreach ($cara_bayar as $row) {
													?>
													<option value="<?php echo $row["id_cara_bayar"]; ?>">
														<?php echo $row["nama"]; ?></option>
													<?php }  ?>
												</select>
											</div>
										</div>
									</div>
								</div>
								<span class="help-block"></span>
								<!-- /Row -->

								<!-- row -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="help-block"></span>
											<label class="control-label col-md-3">NO SEP /
												SLIP</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control filled-input" placeholder="NO SEP"
													name="inNoSEP" id="inNoSEP">

											</div>
										</div>
									</div>
									<!--/span-->
									<div class="col-md-6">
										<div class="form-group">
											<span class="help-block"></span>
											<label class="control-label col-md-3">DIAGNOSA</label>
											<div class="col-md-9 has-success" id="the-basics">
												<input class="form-control filled-input" type="text" placeholder="Diagnosa"
													id="inDiagnosa" name="inDiagnosa">

											</div>
										</div>
									</div>
								</div>
								<span class="help-block"></span>
								<div class="data_hide data_hide_2">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">POLI
													TUJUAN</label>
												<div class="col-md-9 has-success">
													<select class="form-control filled-input select2"
														placeholder="Choose a Category"  id="inJenisPoli"
														name="inJenisPoli">
													</select>
												</div>
											</div>
										</div>
										<!--/span-->
									</div>
									<span class="help-block"></span>
								</div>
								<!-- /Row -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">NAMA DOKTER
												(DPJP)</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2"
													placeholder="Choose a Category"  id="inDPJP" name="inDPJP">
													<?php
																		foreach ($nama_dpjp as $row) {

																		?>
													<option value="<?php echo $row["id_dokter"]; ?>">
														<?php echo $row["nama"]; ?></option>
													<?php }  ?>
												</select>
											</div>
										</div>
									</div>
									<!--/span-->
									<div class="col-md-6">
										<div class="form-group">

											<label class="control-label col-md-3">KETERANGAN
												PASIEN</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control filled-input"
													placeholder="KETERANGAN" name="inKeterangan" id="inKeterangan">

											</div>
										</div>
									</div>
								</div>

								<div class="data_hide data_hide_3">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">KELAS</label>
												<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" placeholder="Choose a Category"  id="id_kamar" name="id_kamar">
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

										<span class="help-block"></span>
										<!-- /Row -->

										<div class="col-md-6" id="outTempatTidur">
											<div class="form-group">
												<label class="control-label col-md-3">NO TEMPAT
													TIDUR</label>
												<div class="col-md-9 has-success">
													<select class="form-control filled-input select2"
														placeholder="Choose a Category"  name="inTempatTidur"
														id="inTempatTidur">
														<!-- 																									 <option value="-">-</option> -->
													</select>
													<span class="help-block"></span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End -->
						</div>
						<div class="modal-footer mb-10 mr-15">

							<button onclick="update_data();" class="btn btn-success btn-anim  btn-sm"><i
									class="icon-rocket"></i><span class="btn-text">SIMPAN</span>

						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
		</div>
	</div>

	<!--  Akhir ModalTutup -->

	<style>
		td {
			color: black;
		}

	</style>



	<!-- js -->
	<script type="text/javascript">
							$(document).ready(function () {

								$('#datable').DataTable({
								"language": {
            					"sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
    							"sProcessing":   "Sedang memproses...",
    							"sLengthMenu":   "Tampilkan _MENU_ entri",
    							"sZeroRecords":  "Tidak ditemukan data yang sesuai",
    							"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    							"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
    							"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
    							"sInfoPostFix":  "",
    							"sSearch":       "Cari:",
    							"sUrl":          "",
								"oPaginate": {
        						"sFirst":    "Pertama",
        						"sPrevious": "Sebelumnya",
        						"sNext":     "Selanjutnya",
        						"sLast":     "Terakhir"
    					},
							},		
									"ajax": '<?php echo base_url('Pasien_online/tampil_konfirmasi_kehadiran'); ?>',	
									"deferRender": true,
									"processing": true,
									"order": [], 
									"columnDefs": [
            						{ 
                					"targets": [ 0 ], 
                					"orderable": false, 
            						},
            						],
								});
							});

						</script>

	<script type="text/javascript">

		function update_data() {
			nama = $("#idNama").val();
			id_pelayanan = $('#idUbah').val();
		    idHis = $('#idHis').val();
			asalUbah = $('#asalUbah').val();
			sepUbah = $('#sepUbah').val();
			bayarUbah = $('#bayarUbah').val();
			diagnoUbah = $('#diagnoUbah').val();
			dokterUbah = $('#dokterUbah').val();
			poliUbah = $('#poliUbah').val();
			swal({   
            	title: "Info!",   
            	text: "Apakah kamu yakin merubah data kunjungan Pasien : " +nama+ "",
            	type: "info",   
            	showCancelButton: true,   
            	confirmButtonColor: "#3cb878",   
            	confirmButtonText: "Yakin",   
            	cancelButtonText: "Batal",   
            	closeOnConfirm: false 
        	}, function(){   
				$().ready(function(){                                        
					$.ajax({  
						url : "<?php echo base_url() ?>Pasien_online/update_data",
						method: "POST",
						dataType: 'json',
						data : {
							id_pelayanan: id_pelayanan,
							idHis:idHis,
							asalUbah:asalUbah,
							sepUbah:sepUbah,
							bayarUbah:bayarUbah,
							diagnoUbah:diagnoUbah,
							dokterUbah:dokterUbah,
							poliUbah:poliUbah
						},  
						success: function(data){
							if(data.status=="success"){
								swal({   
									title: "good job!",   
									type: "success", 
									text: "Pasien "+nama+" berhasil di rubah tujuan kunjungan nya",
									confirmButtonColor: "#3cb878",   
								});
								$('#datable').DataTable().ajax.reload();
								$("#ModalUbah").modal('hide');
							}else{
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

		function edit_modalkonfirmasi(id_pelayanan,nama) {
			swal({   
            	title: "Info!",   
            	text: "Anda akan konfirmasi kehadiran Pasien : " +nama+ "",
            	type: "warning",   
            	showCancelButton: true,   
            	confirmButtonColor: "#3cb878",   
            	confirmButtonText: "Yakin",   
            	cancelButtonText: "Batal",   
            	closeOnConfirm: false 
        	}, function(){   
				$().ready(function(){                                        
					$.ajax({  
						url : "<?php echo base_url() ?>Pasien_online/konfirmasi_hadir",
						method: "POST",
						dataType: 'json',
						data : {
							id_pelayanan: id_pelayanan,
						},  
						success: function(data){
							if(data.status=="success"){
								swal({   
									title: "good job!",   
									type: "success", 
									text: "Pasien "+nama+" berhasil di konfirmasi kehadiran nya",
									confirmButtonColor: "#3cb878",   
								});
								$('#datable').DataTable().ajax.reload();
							}else{
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


		function edit_modaldelete(id_pelayanan,nama) {
			swal({   
            	title: "Warning!",   
            	text: "Anda akan membatalkan kehadiran Pasien : " +nama+ "",
            	type: "warning",   
            	showCancelButton: true,   
            	confirmButtonColor: "#3cb878",   
            	confirmButtonText: "Yakin",   
            	cancelButtonText: "Batal",   
            	closeOnConfirm: false 
        	}, function(){   
				$().ready(function(){                                        
					$.ajax({  
						url : "<?php echo base_url() ?>Pasien_online/batal_hadir",
						method: "POST",
						dataType: 'json',
						data : {
							id_pelayanan: id_pelayanan,
						},  
						success: function(data){
							if(data.status=="success"){
								swal({   
									title: "good job!",   
									type: "success", 
									text: "Pasien "+nama+" berhasil dibatalkan kehadiran nya",
									confirmButtonColor: "#3cb878",   
								});
								$('#datable').DataTable().ajax.reload();
							}else{
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
		</script>


<script type="text/javascript">
	$(document).ready(function() {


$('.data_hide').addClass('collapse');

$('#inTipeMasuk').change(function() {

	var selector = '.data_hide_' + $(this).val();

	$('.data_hide').collapse('hide');

	$(selector).collapse('show');
});


$('.data_tam').addClass('collapse');

$('#inTipeMasuk1').change(function() {

	var selector = '.hide_' + $(this).val();

	$('.data_tam').collapse('hide');

	$(selector).collapse('show');
});
});

		$('#id_kamar').change(function() {
				var kelas = $('#id_kamar').val();
				if (kelas != '') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getKamar",
						method: "POST",
						data: {
							kelas: kelas
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value="-">-</option>' +
									'<option value=' + data[i].tipe + '>' + data[i].tipe + '</option>';
							}
							$('#id_tempat_tidur').html(html);
						}
					});
				} else {
					$('#id_tempat_tidur').html('<option value="-">-</option>');
				}
			});

// pilih tindakan
			$('#inTipeMasuk').change(function() {
				var tipe_masuk = $('#inTipeMasuk').val();
				var poli = $('#inJenisPoli').val();
				if (tipe_masuk == '1') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							tipe_masuk: tipe_masuk
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (tipe_masuk == '2') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getNamaPoli",
						method: "POST",
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_list_poli + '>' + data[i].nama_panjang + '</option>';
							}
							$('#inJenisPoli').html(html);
						}
					});
				} else if (tipe_masuk == '3') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							tipe_masuk: tipe_masuk
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				}
			});

			$('#inJenisPoli').change(function() {
				var poli = $('#inJenisPoli').val();
				if (poli == '111111') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == '146582') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == '15487956') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == '24QRNLX29R') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == '2JZ09X4K22') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == '6E975PL694') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'AX1520L18') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'E00RX703') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'HLGI4176K8') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'I9NXY5VNQG') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'MWK205D30K') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'O782EGU4PR') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'ODI8643C27') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'RZE28J1098') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'UQ81K76373') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				}
			});

		function edit_modalubah(id_pelayanan) {
			$.ajax({
				url: "<?= base_url().'Pasien_online/getdata_ubahkonfirm'?>",
				data: {
					id_pelayanan: id_pelayanan,
				},
				type: 'POST',
				dataType: 'json',
				success: function (data) {
					if (data.status_dt == "found") {
						$("#idNama").val(data.nama);
						$("#idUbah").val(data.id_pelayanan);
						$("#idHis").val(data.id_history);
						$("#masukUbah").val(data.jenis_pelayanan);
						$("#tglUbah").val(data.tgl_masuk);
						$("#poliUbah").val(data.poli);
						$("#bayarUbah").val(data.id_cara_bayar).change();
						$("#dokterUbah").val(data.dpjp).change();
						$("#diagnoUbah").val(data.diagnosa);
						$("#asalUbah").val(data.id_asal_pasien).change();
						$("#sepUbah").val(data.no_sep);
					
						$("#ModalUbah").modal('show');

					} else {
						alert("data tidak ditemukan");
					}
				}
			});
		}
=======
	<!-- Row -->
	<div class="panel panel-default card-view mt-20">
		<div class="panel-heading">
			<div class="pull-left">
				<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">KONFIRMASI
						KEHADIRAN</span>
				</h6>
			</div>
			<div class="clearfix"></div>
		</div>
		<h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
		<div class="panel-wrapper collapse in">
			<div class="panel-body">
				<div class="table-wrap">
					<div class="table-responsive">
						<table id="datable" class="table table-hover display pb-30">
							<thead>
								<tr class="bg-success">
									<th>NO.</th>
									<th>UBAH</th>
									<th>BATAL</th>
									<th>KONFIRMASI</th>
									<th>STATUS</th>
									<th>NO RM</th>
									<th>NAMA PASIEN</th>
									<th>TANGGAL MASUK</th>
									<th>JAM MASUK</th>
									<th>NO ANTRIAN</th>
									<th>JENIS KELAMIN</th>
									<th>TANGGAL LAHIR</th>
									<th>UMUR</th>
									<th>AGAMA</th>
									<th>CARA MASUK</th>
									<th>POLIKLINIK/RUANG</th>
									<th>DPJP</th>
									<th>CARA BAYAR</th>
									<th>DIAGNOSA</th>
									<th>KETERANGAN</th>
									<th>NO SEP</th>
									<th>NAMA AKUN</th>
									<th>TELP</th>
								</tr>
							</thead>
							<tfoot>
								<tr class="bg-success">
									<th>NO.</th>
									<th>UBAH</th>
									<th>BATAL</th>
									<th>KONFIRMASI</th>
									<th>STATUS</th>
									<th>NO RM</th>
									<th>NAMA PASIEN</th>
									<th>TANGGAL MASUK</th>
									<th>JAM MASUK</th>
									<th>NO ANTRIAN</th>
									<th>JENIS KELAMIN</th>
									<th>TANGGAL LAHIR</th>
									<th>UMUR</th>
									<th>AGAMA</th>
									<th>CARA MASUK</th>
									<th>POLIKLINIK/RUANG</th>
									<th>DPJP</th>
									<th>CARA BAYAR</th>
									<th>DIAGNOSA</th>
									<th>KETERANGAN</th>
									<th>NO SEP</th>
									<th>NAMA AKUN</th>
									<th>TELP</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal Ubah -->

	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<!-- sample modal content -->
			<div class="modal fade " id="ModalUbah" role="dialog" aria-labelledby="myLargeModalLabel"
				aria-hidden="true" style="display: none;">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT
								KUNJUNGAN</h5>
						</div>
						<div class="modal-body">
							<!-- Form body  -->
							<div class="form-body mt-20">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">TIPE
												MASUK</label>
											<div class="col-md-9 has-success">
												<select class="form-control txt-dark filled-input select2"
													placeholder="Choose a Category"  id="inTipeMasuk"
													name="inTipeMasuk">
													<option value="0">-</option>
													<option value="1">UGD</option>
													<option value="2">POLI</option>
													<option value="3">RAWAT INAP</option>
												</select>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">TANGGAL
												KUNJUNGAN</label>
											<div class="col-md-9 has-error">
												<input type="text" class="form-control filled-input" placeholder="TANGGAL"
													id="inTanggalKunjugan"  value="<?php date_default_timezone_set('Asia/Jakarta');
													echo date("Y-m-d H:i:s"); ?>">
												<span class="help-block"></span>
											</div>
										</div>
									</div>
								</div>
								<span class="help-block"></span>
								<!-- /Row -->

								<!-- /Row -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">ASAL PASIEN</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2"
													placeholder="Choose a Category"  id="asalUbah">
													<?php
															foreach ($asal_pasien as $row) {
													?>
													<option value="<?php echo $row['id_asal_pasien']; ?>">
														<?php echo $row['nama']; ?></option>
													<?php }  ?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">CARA BAYAR</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2"
													placeholder="Choose a Category"  id="bayarUbah">
													<?php
															foreach ($cara_bayar as $row) {
													?>
													<option value="<?php echo $row["id_cara_bayar"]; ?>">
														<?php echo $row["nama"]; ?></option>
													<?php }  ?>
												</select>
											</div>
										</div>
									</div>
								</div>
								<span class="help-block"></span>
								<!-- /Row -->

								<!-- row -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="help-block"></span>
											<label class="control-label col-md-3">NO SEP /
												SLIP</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control filled-input" placeholder="NO SEP"
													name="inNoSEP" id="inNoSEP">

											</div>
										</div>
									</div>
									<!--/span-->
									<div class="col-md-6">
										<div class="form-group">
											<span class="help-block"></span>
											<label class="control-label col-md-3">DIAGNOSA</label>
											<div class="col-md-9 has-success" id="the-basics">
												<input class="form-control filled-input" type="text" placeholder="Diagnosa"
													id="inDiagnosa" name="inDiagnosa">

											</div>
										</div>
									</div>
								</div>
								<span class="help-block"></span>
								<div class="data_hide data_hide_2">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">POLI
													TUJUAN</label>
												<div class="col-md-9 has-success">
													<select class="form-control filled-input select2"
														placeholder="Choose a Category"  id="inJenisPoli"
														name="inJenisPoli">
													</select>
												</div>
											</div>
										</div>
										<!--/span-->
									</div>
									<span class="help-block"></span>
								</div>
								<!-- /Row -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">NAMA DOKTER
												(DPJP)</label>
											<div class="col-md-9 has-success">
												<select class="form-control filled-input select2"
													placeholder="Choose a Category"  id="inDPJP" name="inDPJP">
													<?php
																		foreach ($nama_dpjp as $row) {

																		?>
													<option value="<?php echo $row["id_dokter"]; ?>">
														<?php echo $row["nama"]; ?></option>
													<?php }  ?>
												</select>
											</div>
										</div>
									</div>
									<!--/span-->
									<div class="col-md-6">
										<div class="form-group">

											<label class="control-label col-md-3">KETERANGAN
												PASIEN</label>
											<div class="col-md-9 has-success">
												<input type="text" class="form-control filled-input"
													placeholder="KETERANGAN" name="inKeterangan" id="inKeterangan">

											</div>
										</div>
									</div>
								</div>

								<div class="data_hide data_hide_3">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">KELAS</label>
												<div class="col-md-9 has-success">
												<select class="form-control filled-input select2" placeholder="Choose a Category"  id="id_kamar" name="id_kamar">
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

										<span class="help-block"></span>
										<!-- /Row -->

										<div class="col-md-6" id="outTempatTidur">
											<div class="form-group">
												<label class="control-label col-md-3">NO TEMPAT
													TIDUR</label>
												<div class="col-md-9 has-success">
													<select class="form-control filled-input select2"
														placeholder="Choose a Category"  name="inTempatTidur"
														id="inTempatTidur">
														<!-- 																									 <option value="-">-</option> -->
													</select>
													<span class="help-block"></span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End -->
						</div>
						<div class="modal-footer mb-10 mr-15">

							<button onclick="update_data();" class="btn btn-success btn-anim  btn-sm"><i
									class="icon-rocket"></i><span class="btn-text">SIMPAN</span>

						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
		</div>
	</div>

	<!--  Akhir ModalTutup -->

	<style>
		td {
			color: black;
		}

	</style>



	<!-- js -->
	<script type="text/javascript">
							$(document).ready(function () {

								$('#datable').DataTable({
								"language": {
            					"sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
    							"sProcessing":   "Sedang memproses...",
    							"sLengthMenu":   "Tampilkan _MENU_ entri",
    							"sZeroRecords":  "Tidak ditemukan data yang sesuai",
    							"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    							"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
    							"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
    							"sInfoPostFix":  "",
    							"sSearch":       "Cari:",
    							"sUrl":          "",
								"oPaginate": {
        						"sFirst":    "Pertama",
        						"sPrevious": "Sebelumnya",
        						"sNext":     "Selanjutnya",
        						"sLast":     "Terakhir"
    					},
							},		
									"ajax": '<?php echo base_url('Pasien_online/tampil_konfirmasi_kehadiran'); ?>',	
									"deferRender": true,
									"processing": true,
									"order": [], 
									"columnDefs": [
            						{ 
                					"targets": [ 0 ], 
                					"orderable": false, 
            						},
            						],
								});
							});

						</script>

	<script type="text/javascript">

		function update_data() {
			nama = $("#idNama").val();
			id_pelayanan = $('#idUbah').val();
		    idHis = $('#idHis').val();
			asalUbah = $('#asalUbah').val();
			sepUbah = $('#sepUbah').val();
			bayarUbah = $('#bayarUbah').val();
			diagnoUbah = $('#diagnoUbah').val();
			dokterUbah = $('#dokterUbah').val();
			poliUbah = $('#poliUbah').val();
			swal({   
            	title: "Info!",   
            	text: "Apakah kamu yakin merubah data kunjungan Pasien : " +nama+ "",
            	type: "info",   
            	showCancelButton: true,   
            	confirmButtonColor: "#3cb878",   
            	confirmButtonText: "Yakin",   
            	cancelButtonText: "Batal",   
            	closeOnConfirm: false 
        	}, function(){   
				$().ready(function(){                                        
					$.ajax({  
						url : "<?php echo base_url() ?>Pasien_online/update_data",
						method: "POST",
						dataType: 'json',
						data : {
							id_pelayanan: id_pelayanan,
							idHis:idHis,
							asalUbah:asalUbah,
							sepUbah:sepUbah,
							bayarUbah:bayarUbah,
							diagnoUbah:diagnoUbah,
							dokterUbah:dokterUbah,
							poliUbah:poliUbah
						},  
						success: function(data){
							if(data.status=="success"){
								swal({   
									title: "good job!",   
									type: "success", 
									text: "Pasien "+nama+" berhasil di rubah tujuan kunjungan nya",
									confirmButtonColor: "#3cb878",   
								});
								$('#datable').DataTable().ajax.reload();
								$("#ModalUbah").modal('hide');
							}else{
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

		function edit_modalkonfirmasi(id_pelayanan,nama) {
			swal({   
            	title: "Info!",   
            	text: "Anda akan konfirmasi kehadiran Pasien : " +nama+ "",
            	type: "warning",   
            	showCancelButton: true,   
            	confirmButtonColor: "#3cb878",   
            	confirmButtonText: "Yakin",   
            	cancelButtonText: "Batal",   
            	closeOnConfirm: false 
        	}, function(){   
				$().ready(function(){                                        
					$.ajax({  
						url : "<?php echo base_url() ?>Pasien_online/konfirmasi_hadir",
						method: "POST",
						dataType: 'json',
						data : {
							id_pelayanan: id_pelayanan,
						},  
						success: function(data){
							if(data.status=="success"){
								swal({   
									title: "good job!",   
									type: "success", 
									text: "Pasien "+nama+" berhasil di konfirmasi kehadiran nya",
									confirmButtonColor: "#3cb878",   
								});
								$('#datable').DataTable().ajax.reload();
							}else{
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


		function edit_modaldelete(id_pelayanan,nama) {
			swal({   
            	title: "Warning!",   
            	text: "Anda akan membatalkan kehadiran Pasien : " +nama+ "",
            	type: "warning",   
            	showCancelButton: true,   
            	confirmButtonColor: "#3cb878",   
            	confirmButtonText: "Yakin",   
            	cancelButtonText: "Batal",   
            	closeOnConfirm: false 
        	}, function(){   
				$().ready(function(){                                        
					$.ajax({  
						url : "<?php echo base_url() ?>Pasien_online/batal_hadir",
						method: "POST",
						dataType: 'json',
						data : {
							id_pelayanan: id_pelayanan,
						},  
						success: function(data){
							if(data.status=="success"){
								swal({   
									title: "good job!",   
									type: "success", 
									text: "Pasien "+nama+" berhasil dibatalkan kehadiran nya",
									confirmButtonColor: "#3cb878",   
								});
								$('#datable').DataTable().ajax.reload();
							}else{
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
		</script>


<script type="text/javascript">
	$(document).ready(function() {


$('.data_hide').addClass('collapse');

$('#inTipeMasuk').change(function() {

	var selector = '.data_hide_' + $(this).val();

	$('.data_hide').collapse('hide');

	$(selector).collapse('show');
});


$('.data_tam').addClass('collapse');

$('#inTipeMasuk1').change(function() {

	var selector = '.hide_' + $(this).val();

	$('.data_tam').collapse('hide');

	$(selector).collapse('show');
});
});

		$('#id_kamar').change(function() {
				var kelas = $('#id_kamar').val();
				if (kelas != '') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getKamar",
						method: "POST",
						data: {
							kelas: kelas
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value="-">-</option>' +
									'<option value=' + data[i].tipe + '>' + data[i].tipe + '</option>';
							}
							$('#id_tempat_tidur').html(html);
						}
					});
				} else {
					$('#id_tempat_tidur').html('<option value="-">-</option>');
				}
			});

// pilih tindakan
			$('#inTipeMasuk').change(function() {
				var tipe_masuk = $('#inTipeMasuk').val();
				var poli = $('#inJenisPoli').val();
				if (tipe_masuk == '1') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							tipe_masuk: tipe_masuk
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (tipe_masuk == '2') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getNamaPoli",
						method: "POST",
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_list_poli + '>' + data[i].nama_panjang + '</option>';
							}
							$('#inJenisPoli').html(html);
						}
					});
				} else if (tipe_masuk == '3') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							tipe_masuk: tipe_masuk
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				}
			});

			$('#inJenisPoli').change(function() {
				var poli = $('#inJenisPoli').val();
				if (poli == '111111') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == '146582') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == '15487956') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == '24QRNLX29R') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == '2JZ09X4K22') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == '6E975PL694') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'AX1520L18') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'E00RX703') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'HLGI4176K8') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'I9NXY5VNQG') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'MWK205D30K') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'O782EGU4PR') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'ODI8643C27') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'RZE28J1098') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				} else if (poli == 'UQ81K76373') {
					$.ajax({
						url: "<?php echo base_url(); ?>Pasien_online/getDokter",
						method: "POST",
						data: {
							poli: poli
						},
						dataType: 'json',
						success: function(data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<option value=' + data[i].id_dokter + '>' + data[i].nama + '</option>';
							}
							$('#inDPJP').html(html);
						}
					});
				}
			});

		function edit_modalubah(id_pelayanan) {
			$.ajax({
				url: "<?= base_url().'Pasien_online/getdata_ubahkonfirm'?>",
				data: {
					id_pelayanan: id_pelayanan,
				},
				type: 'POST',
				dataType: 'json',
				success: function (data) {
					if (data.status_dt == "found") {
						$("#idNama").val(data.nama);
						$("#idUbah").val(data.id_pelayanan);
						$("#idHis").val(data.id_history);
						$("#masukUbah").val(data.jenis_pelayanan);
						$("#tglUbah").val(data.tgl_masuk);
						$("#poliUbah").val(data.poli);
						$("#bayarUbah").val(data.id_cara_bayar).change();
						$("#dokterUbah").val(data.dpjp).change();
						$("#diagnoUbah").val(data.diagnosa);
						$("#asalUbah").val(data.id_asal_pasien).change();
						$("#sepUbah").val(data.no_sep);
					
						$("#ModalUbah").modal('show');

					} else {
						alert("data tidak ditemukan");
					}
				}
			});
		}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
	</script>