<!-- Cek peserta -->
<div class="panel-wrapper collapse in">
	<div class="panel-body">
		<!-- sample modal content -->
		<div class="modal fade" id="modal_vclaim" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i>DATA KEPESERTAAN PASIEN</h5>
					</div>
					<div class="modal-body">
						<div class="col-md-12" style="text-align:right;">
							<div id="btn_edit" class="col-md-12"></div>
						</div>
						<div class="clearfix"></div>
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
								<label for="tanggal_keluar" class="col-sm-4 control-label">Cek berdasarkan: </label>
								<div class="col-md-6 has-success">
									<select class="form-control   select2" placeholder="Choose a Category" tabindex="1" name="jenis_cek" id="jenis_cek">
										<option>-</option>
										<option value="kartu">No Kartu</option>
										<option value="nik">NIK</option>
									</select>
                                </div>
                                </div>
                            </div>
                            </div>
								<div class="col-sm-4">
									<button type="button" onclick="cek_peserta()" class="btn btn-primary">Cari</button>
									<button type="button" class="btn btn-default">Reset</button>
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
												<label class="control-label col-md-3">NO. KARTU:</label>
												<div class="col-md-9 has-error">
													<input type="text" name="inNamaPasien" class="form-control filled-input" disabled="" id="no_kartu">

													<span class="help-block"></span>
												</div>
											</div>
										</div>
										<div class="col-md-5">
											<div class="form-group">
												<label class="control-label col-md-3">JENIS KELAMIN:</label>
												<div class="col-md-9 has-error">
													<input type="text" name="inNamaPasien" class="form-control filled-input" disabled="" id="jenis_kelamin">

													<span class="help-block"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-5">
											<div class="form-group">
												<label class="control-label col-md-3">UMUR:</label>
												<div class="col-md-9 has-error">
													<input type="text" name="inNamaPasien" class="form-control filled-input" disabled="" id="umur">

													<span class="help-block"></span>
												</div>
											</div>
										</div>
										<div class="col-md-5">
											<div class="form-group">
												<label class="control-label col-md-3">TANGGAL LAHIR</label>
												<div class="col-md-9 has-error">
													<input type="text" name="inNamaPasien" class="form-control filled-input" disabled="" id="tgl_lahir">

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
												<label class="control-label col-md-3">JENIS PESERTA:</label>
												<div class="col-md-9 has-error">
													<input type="text" name="inNamaPasien" class="form-control filled-input" disabled="" id="jenisPeserta">

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
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
	</div>
</div>