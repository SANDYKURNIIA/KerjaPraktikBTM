<!-- Cek peserta -->
<div class="panel panel-default card-view mt-20 ">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">DATA KEPESERTAAN PASIEN</span></h6>
		</div>

		<div class="clearfix"></div>
	</div>
	<h6 class="panel-title txt-dark mt-10"><?= $this->session->flashdata('alert'); ?></h6>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="form-body">

				<form id="form-peserta" class="form-horizontal">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Tanggal SEP</label>
								<div class="col-md-9 has-error">
									<input type="date" class="form-control filled-input" placeholder="TANGGAL" id="inCekTglSEP" name="inTanggalKunjugan" value="<?php date_default_timezone_set('Asia/Jakarta');
																																								echo date("Y-m-d"); ?>">
									<span class="help-block"></span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Cek berdasarkan: </label>
								<div class="col-md-9 has-success">
									<select class="form-control select2" placeholder="Choose a Category" tabindex="1" name="jenis_cek" id="jenis_cek">
										<option>-</option>
										<option value="kartu">No Kartu</option>
										<option value="nik">NIK</option>
									</select>
									<span class="help-block"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 cek_peserta kartu" style="display: none;">
								<div class="form-group">
									<label class="control-label col-md-3">NO BPJS :</label>
									<div class="col-md-9 has-success">
										<input type="text" name="inNoBPJS" class="form-control" id="inNoBPJS">
										<span class="help-block"></span>

									</div>
								</div>
							</div>
							<div class="col-md-6 cek_peserta nik" style="display: none;">
								<div class="form-group">
									<label class="control-label col-md-3">NIK :</label>
									<div class="col-md-9 has-success">
										<input type="text" name="inKtp" class="form-control" id="inKtp">
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="col-sm-4">
						<button type="button" onclick="cek_peserta()" class="btn btn-primary">Cari</button>
						<button type="button" class="btn btn-default" onclick="reset()">Reset</button>
					</div>
					<br>
					<br>
					<br>
					<div class="clearfix"></div>
					<div class="form-group collapse" id="peserta_bpjs">
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label class="control-label col-md-3">NAMA:</label>
									<div class="col-md-9 has-error">
										<input type="text" name="inNamaPasien" class="form-control filled-input" disabled="" id="bpjs_nama">

										<span class="help-block"></span>
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label class="control-label col-md-3">NIK:</label>
									<div class="col-md-9 has-error">
										<input type="text" name="inNamaPasien" class="form-control filled-input" disabled="" id="bpjs_nik">

										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
							<div class="form-group">
									<label class="control-label col-md-3">NO. Rekap Medis:</label>
									<div class="col-md-9 has-error">
										<input type="text" name="inRm" class="form-control filled-input" disabled="" id="rekapMedik">

										<span class="help-block"></span>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3">NO. KARTU:</label>
									<div class="col-md-9 has-error">
										<input type="text" name="inNamaPasien" class="form-control filled-input" disabled="" id="no_kartu">

										<span class="help-block"></span>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3">NO. ASURANSI:</label>
									<div class="col-md-9 has-error">
										<textarea type="text" name="inAsuransi" class="form-control filled-input" disabled="" id="noAsuransi">
										</textarea>
										<!-- <input type="text" name="inAsuransi" class="form-control filled-input" disabled="" id="noAsuransi"> -->

										<span class="help-block"></span>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3">NAMA ASURANSI:</label>
									<div class="col-md-9 has-error">
										<textarea type="text" name="inNamaAsuransi" class="form-control filled-input" disabled="" id="nmAsuransi"></textarea>
										<!-- <input type="text" name="inNamaAsuransi" class="form-control filled-input" disabled="" id="nmAsuransi"> -->

										<span class="help-block"></span>
									</div>
								</div>

								

								<div class="form-group">
									<label class="control-label col-md-3">Nomor SKTM</label>
									<div class="col-md-9 has-error">
										<input type="text" name="inSktm" class="form-control filled-input" disabled="" id="noSktm">
										</input>
										<!-- <input type="text" name="inAsuransi" class="form-control filled-input" disabled="" id="noAsuransi"> -->

										<span class="help-block"></span>
									</div>
								</div>

							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label class="control-label col-md-3">JENIS KELAMIN:</label>
									<div class="col-md-9 has-error">
										<input type="text" name="inJKPasien" class="form-control filled-input" disabled="" id="jenis_kelamin" 
										value="">
										

										<span class="help-block"></span>
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label class="control-label col-md-3">TANGGAL LAHIR</label>
									<div class="col-md-9 has-error">
										<input type="text" name="inNamaPasien" class="form-control filled-input" disabled="" id="tgl_lahir" >
										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-5">
								<div class="form-group">
									<label class="control-label col-md-3">UMUR: </label>
									<div class="col-md-9 has-error">
										<input type="text" name="inUmur" class="form-control filled-input" disabled="" id="umur">

										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-5" style="margin-top:10px">
								<div class="form-group">
									<label class="control-label col-md-3" >DINSOS</label>
									<div class="col-md-9 has-error">
										<input type="text" name="inDinsos" class="form-control filled-input" disabled="" id="dinsos">
										</input>
										<!-- <input type="text" name="inAsuransi" class="form-control filled-input" disabled="" id="noAsuransi"> -->

										<span class="help-block"></span>
									</div>
								</div>
							</div>
							
							<div class="col-md-5" style="margin-top:10px">
								<div class="form-group">
									<label class="control-label col-md-3">PROLANIS PRB</label>
									<div class="col-md-9 has-error">
										<input type="text" name="inProlanis" class="form-control filled-input" disabled="" id="prolanisPrb">
										</input>
										<!-- <input type="text" name="inAsuransi" class="form-control filled-input" disabled="" id="noAsuransi"> -->

										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label class="control-label col-md-3">STATUS:</label>
									<div class="col-md-9 has-error">
										<textarea type="text" name="inNamaPasien" class="form-control filled-input" disabled="" id="statusPeserta"></textarea>
										<!-- <input type="text" name="inNamaPasien" class="form-control filled-input" disabled="" id="statusPeserta"> -->

										<span class="help-block"></span>
									</div>
								</div>
							</div>

							<div class="col-md-5">
								<div class="form-group">
									<label class="control-label col-md-3">JENIS PESERTA:</label>
									<div class="col-md-9 has-error">
										<textarea type="text" name="inNamaPasien" class="form-control filled-input" disabled="" id="jenisPeserta"></textarea>
										<!-- <input type="text" name="inNamaPasien" class="form-control filled-input" disabled="" id="jenisPeserta"> -->

										<span class="help-block"></span>
									</div>
								</div>
							</div>
							
							
						</div>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label class="control-label col-md-3">HAK KELAS:</label>
									<div class="col-md-9 has-error">
										<input type="text" name="inNamaPasien" class="form-control filled-input" disabled="" id="hakKelas">

										<span class="help-block"></span>
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label class="control-label col-md-3">Nomor Telepon/HP:</label>
									<div class="col-md-9 has-error">
										<input type="text" name="inNotel" class="form-control filled-input" disabled="" id="noTelpon">

										<span class="help-block"></span>
									</div>
								</div>
							</div>
							
						</div>
					</div>

				</form>


			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function cek_peserta() {

		tgl_sep = $('#inCekTglSEP').val();
		no_kartu = $('#inNoBPJS').val();
		nik = $('#inKtp').val();
		jenis_cek = $('#jenis_cek').val();
		if (jenis_cek == 'kartu') {
			url = "<?php echo base_url(); ?>Vclaim_bpjs/cek_peserta_by_kartu";
		} else {
			url = "<?php echo base_url(); ?>Vclaim_bpjs/cek_peserta_by_nik";

		}
		$.ajax({
			url: url,
			method: "POST",
			data: {
				kartu: no_kartu,
				nik: nik,
				jenis_cek: jenis_cek,
				tgl: tgl_sep
			},
			dataType: 'json',
			success: function(response) {
				if (response.status == "success") {
					$('#peserta_bpjs').collapse('show');
					$('#bpjs_nama').val(response.data.nama);
					$('#bpjs_nik').val(response.data.nik);
					// $('#jenis_kelamin').val(response.data.sex);
					if (response.data.sex == "L") {
						$('#jenis_kelamin').val('LAKI-LAKI');
					} else {
						$('#jenis_kelamin').val('PEREMPUAN');
					}
					$('#no_kartu').val(response.data.noKartu);
					$('#hakKelas').val(response.data.hakKelas.keterangan);
					$('#jenisPeserta').val(response.data.jenisPeserta.keterangan);
					$('#statusPeserta').val(response.data.statusPeserta.keterangan);
					$('#tgl_lahir').val(response.data.tglLahir);
					$('#noTelpon').val(response.data.mr.noTelepon);
					$('#rekapMedik').val(response.data.mr.noMR);
					$('#umur').val(response.data.umur.umurSekarang);
					$('#noAsuransi').val(response.data.cob.noAsuransi);
					$('#nmAsuransi').val(response.data.cob.nmAsuransi);
					$('#dinsos').val(response.data.informasi.dinsos);
					$('#noSktm').val(response.data.informasi.noSKTM);
					$('#prolanisPrb').val(response.data.informasi.prolanisPRB);
				} else {
					swal({
						title: "Gagal!",
						type: "warning",
						text: response.status,
						confirmButtonColor: "#3cb878",
					});
				}
			}
		});
	}

	$(document).ready(function() {
		
		$('#jenis_cek').change(function() {
			b = $('#jenis_cek').val();
			var selector = '.' + b;

			$('.cek_peserta').hide();
			$(selector).show();
		});
	});
	function reset(){
		$('#jenis_cek').val('-').change();
		$('#inNoBPJS').val('').change();
		$('#inCekTglSEP').val('').change();
	}
</script>